<?php declare(strict_types = 1);
 /*
*AVISO LEGAL
(C) Copyright
*Este programa esta protegido por la ley de derechos de autor.
*La reproduccion o distribucion ilicita de este programa o de cualquiera de
*sus partes esta penado por la ley con severas sanciones civiles y penales,
*y seran objeto de todas las sanciones legales que correspondan.

*Su contenido no puede copiarse para fines comerciales o de otras,
*ni puede mostrarse, incluso en una version modificada, en otros sitios Web.
Solo esta permitido colocar hipervinculos al sitio web.
*/

namespace com\bydan\contabilidad\contabilidad\saldo_cuenta\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_carga;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_param_return;

use com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\session\saldo_cuenta_session;

use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\ParameterDbType;


use com\bydan\framework\contabilidad\util\ParameterType;
use com\bydan\framework\contabilidad\util\ParameterTypeOperator;
use com\bydan\framework\contabilidad\business\logic\ParameterSelectionGeneral;

use com\bydan\framework\contabilidad\util\PaqueteTipo;
use com\bydan\framework\contabilidad\util\DeepLoadType;
use com\bydan\framework\contabilidad\util\EventoTipo;
use com\bydan\framework\contabilidad\util\EventoSubTipo;
use com\bydan\framework\contabilidad\util\ControlTipo;
use com\bydan\framework\contabilidad\util\EventoGlobalTipo;
use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
use com\bydan\framework\contabilidad\business\logic\DatosCliente;
use com\bydan\framework\contabilidad\business\logic\DatosDeep;
use com\bydan\framework\contabilidad\business\logic\Pagination;
use com\bydan\framework\contabilidad\business\logic\QueryWhereSelectParameters;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\business\entity\parametro_general_usuario;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;

use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_util;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\entity\saldo_cuenta;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\data\saldo_cuenta_data;

//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\data\empresa_data;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\data\ejercicio_data;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\data\periodo_data;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\data\tipo_cuenta_data;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\logic\tipo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


//REL DETALLES




interface saldo_cuenta_logicI {	
	
	public function inicializarLogicAdditional();
			
	/*----------------------------- EXECUTE QUERIES -------------------------------*/
	public function executeQueryWithConnection(string $sQueryExecute);	
	public function executeQuery(string $sQueryExecute);	
	public function executeQueryValorWithConnection(string $sQueryExecute,string $sNombreCampo);	
	public function executeQueryValor(string $sQueryExecute,string $sNombreCampo);
	
	public function getTodos(string $strFinalQuery,Pagination $pagination);	
	public function getTodosWithConnection(string $strFinalQuery,Pagination $pagination);
	
	/*TRAER UN OBJETO*/
	public function getEntityWithConnection(?int $id);	
	public function getEntity(?int $id);	
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?saldo_cuenta;	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='');	
	public function getEntityWithFinalQuery(string $strFinalQuery='');	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?saldo_cuenta;
	
	/*TRAER LISTA*/
	public function getEntitiesWithConnection(QueryWhereSelectParameters $queryWhereSelectParameters);	
	public function getEntities(QueryWhereSelectParameters $queryWhereSelectParameters);	
	public function getEntitiesWithFinalQueryWithConnection(string $strFinalQuery);	
	public function getEntitiesWithFinalQuery(string $strFinalQuery);	
	public static function GetEntitiesWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : array;	
	public function getEntitiesWithQuerySelectWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters);	
	public function getEntitiesWithQuerySelectWithFinalQuery(string $strQuerySelect,string $strFinalQuery);	
	public function getEntitiesWithQuerySelectWithFinalQueryWithConnection(string $strQuerySelect,string $strFinalQuery);	
	public function getEntitiesWithQuerySelect(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters);		
	public function getEntitiesSimpleQueryBuildWithConnection(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters);	
	public function getEntitiesSimpleQueryBuild(string $strQuerySelect,QueryWhereSelectParameters $queryWhereSelectParameters);
	
	/*MANTENIMIENTO*/
	public function saveWithConnection();	
	public function save();	
	public static function SaveStatic(saldo_cuenta $saldo_cuenta,Connexion $connexion);	
	public function savesWithConnection();	
	public function saves();	
	public static function SavesStatic(array $saldo_cuentas,Connexion $connexion);
	
	public function quitarEliminados();	
	public function updateToGetsAuxiliar(array &$saldo_cuentas);
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription();
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$saldo_cuenta_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo);
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$saldo_cuenta_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo);
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$saldo_cuenta_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection);
		
		
	
	
	/*PROCESAR ACCIONES*/
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $saldo_cuentas,saldo_cuenta_param_return $saldo_cuentaParameterGeneral) : saldo_cuenta_param_return;	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $saldo_cuentas,saldo_cuenta_param_return $saldo_cuentaParameterGeneral) : saldo_cuenta_param_return;
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $saldo_cuentas,saldo_cuenta $saldo_cuenta,saldo_cuenta_param_return $saldo_cuentaParameterGeneral,bool $isEsNuevosaldo_cuenta,array $clases) : saldo_cuenta_param_return;		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $saldo_cuentas,saldo_cuenta $saldo_cuenta,saldo_cuenta_param_return $saldo_cuentaParameterGeneral,bool $isEsNuevosaldo_cuenta,array $clases) : saldo_cuenta_param_return;
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $saldo_cuentas,saldo_cuenta $saldo_cuenta,saldo_cuenta_param_return $saldo_cuentaParameterGeneral,bool $isEsNuevosaldo_cuenta,array $clases) : saldo_cuenta_param_return;	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $saldo_cuentas,saldo_cuenta $saldo_cuenta,saldo_cuenta_param_return $saldo_cuentaParameterGeneral,bool $isEsNuevosaldo_cuenta,array $clases) : saldo_cuenta_param_return;
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,saldo_cuenta $saldo_cuenta,string $strUsuarioPC,string $strNamePC,string $strIPPC);	
	public static function registrarAuditoriaDetalles(Connexion $connexion,saldo_cuenta $saldo_cuenta,auditoria $auditoriaObj);
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo);
	
	
	
	public function deepLoad(saldo_cuenta $saldo_cuenta,bool $isDeep,string $deepLoadType,array $clases);	
	public function deepSave(saldo_cuenta $saldo_cuenta,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false);		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje);	
	public function deepLoadsWithConnection(bool $isDeep,string $deepLoadType, array $clases,string $strTituloMensaje);	
	public function deepLoads(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje);
		
	public function deepSaveWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje);	
	public function deepSavesWithConnection(bool $isDeep,string $deepLoadType, array $clases,string $strTituloMensaje);	
	public function deepSaves(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje);
	
	public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array;	
	public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array;
	
	
	
		
		
	
	
	public function getsaldo_cuenta() : ?saldo_cuenta;		
	public function setsaldo_cuenta(saldo_cuenta $newsaldo_cuenta);	
	public function getsaldo_cuentas() : array;
		
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia();
	
	
}
?>
