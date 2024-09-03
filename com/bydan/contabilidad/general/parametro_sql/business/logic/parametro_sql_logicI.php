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

namespace com\bydan\contabilidad\general\parametro_sql\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\general\parametro_sql\util\parametro_sql_carga;
use com\bydan\contabilidad\general\parametro_sql\util\parametro_sql_param_return;


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

use com\bydan\contabilidad\general\parametro_sql\util\parametro_sql_util;
use com\bydan\contabilidad\general\parametro_sql\business\entity\parametro_sql;
use com\bydan\contabilidad\general\parametro_sql\business\data\parametro_sql_data;

//FK


//REL


//REL DETALLES




interface parametro_sql_logicI {	
	
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
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?parametro_sql;	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='');	
	public function getEntityWithFinalQuery(string $strFinalQuery='');	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?parametro_sql;
	
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
	public static function SaveStatic(parametro_sql $parametro_sql,Connexion $connexion);	
	public function savesWithConnection();	
	public function saves();	
	public static function SavesStatic(array $parametro_sqls,Connexion $connexion);
	
	public function quitarEliminados();	
	public function updateToGetsAuxiliar(array &$parametro_sqls);
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription();
	
	/*CARGAR FKs*/
		
	
	
	/*PROCESAR ACCIONES*/
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $parametro_sqls,parametro_sql_param_return $parametro_sqlParameterGeneral) : parametro_sql_param_return;	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $parametro_sqls,parametro_sql_param_return $parametro_sqlParameterGeneral) : parametro_sql_param_return;
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_sqls,parametro_sql $parametro_sql,parametro_sql_param_return $parametro_sqlParameterGeneral,bool $isEsNuevoparametro_sql,array $clases) : parametro_sql_param_return;		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_sqls,parametro_sql $parametro_sql,parametro_sql_param_return $parametro_sqlParameterGeneral,bool $isEsNuevoparametro_sql,array $clases) : parametro_sql_param_return;
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_sqls,parametro_sql $parametro_sql,parametro_sql_param_return $parametro_sqlParameterGeneral,bool $isEsNuevoparametro_sql,array $clases) : parametro_sql_param_return;	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $parametro_sqls,parametro_sql $parametro_sql,parametro_sql_param_return $parametro_sqlParameterGeneral,bool $isEsNuevoparametro_sql,array $clases) : parametro_sql_param_return;
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,parametro_sql $parametro_sql,string $strUsuarioPC,string $strNamePC,string $strIPPC);	
	public static function registrarAuditoriaDetalles(Connexion $connexion,parametro_sql $parametro_sql,auditoria $auditoriaObj);
	
	
	/*DEEP*/
	
	
	
	public function deepLoad(parametro_sql $parametro_sql,bool $isDeep,string $deepLoadType,array $clases);	
	public function deepSave(parametro_sql $parametro_sql,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false);		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje);	
	public function deepLoadsWithConnection(bool $isDeep,string $deepLoadType, array $clases,string $strTituloMensaje);	
	public function deepLoads(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje);
		
	public function deepSaveWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje);	
	public function deepSavesWithConnection(bool $isDeep,string $deepLoadType, array $clases,string $strTituloMensaje);	
	public function deepSaves(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje);
	
	public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array;	
	public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array;
	
	
	
		
		
	
	
	public function getparametro_sql() : ?parametro_sql;		
	public function setparametro_sql(parametro_sql $newparametro_sql);	
	public function getparametro_sqls() : array;
		
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia();
	
	
}
?>
