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

namespace com\bydan\contabilidad\inventario\lista_producto\business\logic;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\business\entity\GeneralEntityLogic;

use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_param_return;

use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;

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

use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;
use com\bydan\contabilidad\inventario\lista_producto\business\entity\lista_producto;
use com\bydan\contabilidad\inventario\lista_producto\business\data\lista_producto_data;

//FK


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\data\producto_data;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\business\data\unidad_data;
use com\bydan\contabilidad\inventario\unidad\business\logic\unidad_logic;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;

use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;
use com\bydan\contabilidad\inventario\categoria_producto\business\data\categoria_producto_data;
use com\bydan\contabilidad\inventario\categoria_producto\business\logic\categoria_producto_logic;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_util;

use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\data\sub_categoria_producto_data;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\logic\sub_categoria_producto_logic;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_util;

use com\bydan\contabilidad\inventario\tipo_producto\business\entity\tipo_producto;
use com\bydan\contabilidad\inventario\tipo_producto\business\data\tipo_producto_data;
use com\bydan\contabilidad\inventario\tipo_producto\business\logic\tipo_producto_logic;
use com\bydan\contabilidad\inventario\tipo_producto\util\tipo_producto_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\data\bodega_data;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\data\cuenta_data;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;
use com\bydan\contabilidad\inventario\otro_suplidor\business\data\otro_suplidor_data;
use com\bydan\contabilidad\inventario\otro_suplidor\business\logic\otro_suplidor_logic;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;

use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\business\data\impuesto_data;
use com\bydan\contabilidad\facturacion\impuesto\business\logic\impuesto_logic;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\data\otro_impuesto_data;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\logic\otro_impuesto_logic;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;

use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\business\data\retencion_data;
use com\bydan\contabilidad\facturacion\retencion\business\logic\retencion_logic;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;

//REL


//REL DETALLES




interface lista_producto_logicI {	
	
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
	public static function GetEntityStatic(?int $id,Connexion $connexion) : ?lista_producto;	
	public function getEntityWithFinalQueryWithConnection(string $strFinalQuery='');	
	public function getEntityWithFinalQuery(string $strFinalQuery='');	
	public static function GetEntityWithFinalQueryStatic(string $strFinalQuery='',Connexion $connexion) : ?lista_producto;
	
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
	public static function SaveStatic(lista_producto $lista_producto,Connexion $connexion);	
	public function savesWithConnection();	
	public function saves();	
	public static function SavesStatic(array $lista_productos,Connexion $connexion);
	
	public function quitarEliminados();	
	public function updateToGetsAuxiliar(array &$lista_productos);
	
	/*FKs DESCRIPCION*/
	public function loadFKsDescription();
	
	/*CARGAR FKs*/
	public function cargarCombosLoteFK(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$lista_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo);
	
	public function cargarCombosLoteFKWithConnection(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$lista_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo);
	
	public function cargarCombosLoteFKBase(
											string $strRecargarFkTipos='',string $strRecargarFkQuery='',string $strRecargarFkColumna='',int $intRecargarFkIdPadre=0,string $strRecargarFkTiposNinguno=''
											,$lista_producto_session,parametro_general_usuario $parametroGeneralUsuarioActual,modulo $moduloActual,array $arrDatoGeneral,array $arrDatoGeneralNo,bool $conWithConnection);
		
		
	
	
	/*PROCESAR ACCIONES*/
	public function procesarAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $sProceso,array $lista_productos,lista_producto_param_return $lista_productoParameterGeneral) : lista_producto_param_return;	
	public function procesarAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $modulo,opcion $opcion,usuario $usuario,string $strProceso,array $lista_productos,lista_producto_param_return $lista_productoParameterGeneral) : lista_producto_param_return;
	
	/*PROCESAR EVENTOS*/
	public function procesarEventos(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lista_productos,lista_producto $lista_producto,lista_producto_param_return $lista_productoParameterGeneral,bool $isEsNuevolista_producto,array $clases) : lista_producto_param_return;		
	public function procesarEventosWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lista_productos,lista_producto $lista_producto,lista_producto_param_return $lista_productoParameterGeneral,bool $isEsNuevolista_producto,array $clases) : lista_producto_param_return;
	
	/*PROCESAR POST ACCION*/
	public function procesarPostAccions(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lista_productos,lista_producto $lista_producto,lista_producto_param_return $lista_productoParameterGeneral,bool $isEsNuevolista_producto,array $clases) : lista_producto_param_return;	
	public function procesarPostAccionsWithConnection(parametro_general_usuario $parametroGeneralUsuario,modulo $moduloActual,opcion $opcionActual,usuario $usuarioActual,string $eventoGlobalTipo,string $controlTipo,string $eventoTipo,string $eventoSubTipo,string $sTipo,array $lista_productos,lista_producto $lista_producto,lista_producto_param_return $lista_productoParameterGeneral,bool $isEsNuevolista_producto,array $clases) : lista_producto_param_return;
	
	/*AUDITORIA*/
	public static function registrarAuditoria(Connexion $connexion,int $idUsuario,lista_producto $lista_producto,string $strUsuarioPC,string $strNamePC,string $strIPPC);	
	public static function registrarAuditoriaDetalles(Connexion $connexion,lista_producto $lista_producto,auditoria $auditoriaObj);
	
	
	/*DEEP*/
	public function cargarArchivosPaquetesForeignKeys(string $paqueteTipo);
	
	
	
	public function deepLoad(lista_producto $lista_producto,bool $isDeep,string $deepLoadType,array $clases);	
	public function deepSave(lista_producto $lista_producto,bool $isDeep,string $deepLoadType,array $clases,bool $paraDeleteCascade=false);		
	public function deepLoadWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje);	
	public function deepLoadsWithConnection(bool $isDeep,string $deepLoadType, array $clases,string $strTituloMensaje);	
	public function deepLoads(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje);
		
	public function deepSaveWithConnection(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje);	
	public function deepSavesWithConnection(bool $isDeep,string $deepLoadType, array $clases,string $strTituloMensaje);	
	public function deepSaves(bool $isDeep,string $deepLoadType,array $clases,string $strTituloMensaje);
	
	public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array;	
	public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array;
	
	
	
		
		
	
	
	public function getlista_producto() : ?lista_producto;		
	public function setlista_producto(lista_producto $newlista_producto);	
	public function getlista_productos() : array;
		
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia();
	
	
}
?>
