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

namespace com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_param_return;


use com\bydan\framework\contabilidad\util\Connexion;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\ParameterDbType;



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

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\entity\beneficiario_ocacional_cheque;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\data\beneficiario_ocacional_cheque_data;

//FK


//REL


use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\entity\cheque_cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\data\cheque_cuenta_corriente_data;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\business\logic\cheque_cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;

//REL DETALLES




interface beneficiario_ocacional_cheque_logicI {	
	
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
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?beneficiario_ocacional_cheque;	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='');	
	public function getEntityWithFinalQuery(string $strFinalQuery='');	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?beneficiario_ocacional_cheque;
	
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
	public static function SaveStatic(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,Connexion $connexion);	
	public function savesWithConnection();	
	public function saves();	
	public static function SavesStatic(array $beneficiario_ocacional_cheques,Connexion $connexion);
	
	public function quitarEliminados();	
	public function updateToGetsAuxiliar(array &$beneficiario_ocacional_cheques);
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription();
	
	/*CARGAR FKs*/
		
	
	public function deleteCascade();	
	public function deleteCascadeWithConnection();	
	public function deleteCascades();	
	public function deleteCascadesWithConnection();
	
	/*PROCESAR ACCIONES*/
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $beneficiario_ocacional_cheques,beneficiario_ocacional_cheque_param_return $beneficiario_ocacional_chequeParameterGeneral) : beneficiario_ocacional_cheque_param_return;	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $beneficiario_ocacional_cheques,beneficiario_ocacional_cheque_param_return $beneficiario_ocacional_chequeParameterGeneral) : beneficiario_ocacional_cheque_param_return;
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $beneficiario_ocacional_cheques,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,beneficiario_ocacional_cheque_param_return $beneficiario_ocacional_chequeParameterGeneral,bool $isEsNuevobeneficiario_ocacional_cheque,array $clases) : beneficiario_ocacional_cheque_param_return;		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $beneficiario_ocacional_cheques,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,beneficiario_ocacional_cheque_param_return $beneficiario_ocacional_chequeParameterGeneral,bool $isEsNuevobeneficiario_ocacional_cheque,array $clases) : beneficiario_ocacional_cheque_param_return;
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $beneficiario_ocacional_cheques,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,beneficiario_ocacional_cheque_param_return $beneficiario_ocacional_chequeParameterGeneral,bool $isEsNuevobeneficiario_ocacional_cheque,array $clases) : beneficiario_ocacional_cheque_param_return;	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $beneficiario_ocacional_cheques,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,beneficiario_ocacional_cheque_param_return $beneficiario_ocacional_chequeParameterGeneral,bool $isEsNuevobeneficiario_ocacional_cheque,array $clases) : beneficiario_ocacional_cheque_param_return;
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,string $strUsuarioPC,string $strNamePC,string $strIPPC);	
	public static function registrarAuditoriaDetalles(Connexion $connexion,beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,auditoria $auditoriaObj);
	
	
	/*DEEP*/
	
	public function cargarArchivosPaquetesRelaciones(string $paqueteTipo);
	
	
	public function deepLoad(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,bool $isDeep,string $deepLoadType,array $clases);	
	public function deepSave(beneficiario_ocacional_cheque $beneficiario_ocacional_cheque,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false);		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje);	
	public function deepLoadsWithConnection(bool $isDeep,string $deepLoadType, array $clases,string $strTituloMensaje);	
	public function deepLoads(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje);
		
	public function deepSaveWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje);	
	public function deepSavesWithConnection(bool $isDeep,string $deepLoadType, array $clases,string $strTituloMensaje);	
	public function deepSaves(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje);
	
	public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array;	
	public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array;
	
	
	
		
		
	
	
	public function getbeneficiario_ocacional_cheque() : ?beneficiario_ocacional_cheque;		
	public function setbeneficiario_ocacional_cheque(beneficiario_ocacional_cheque $newbeneficiario_ocacional_cheque);	
	public function getbeneficiario_ocacional_cheques() : array;
		
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia();
	
	
}
?>
