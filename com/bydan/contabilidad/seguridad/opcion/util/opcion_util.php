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

namespace com\bydan\contabilidad\seguridad\opcion\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_util;
use com\bydan\contabilidad\seguridad\grupo_opcion\business\entity\grupo_opcion;
use com\bydan\contabilidad\seguridad\grupo_opcion\util\grupo_opcion_util;
use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

//REL

use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;
use com\bydan\contabilidad\seguridad\accion\business\entity\accion;
use com\bydan\contabilidad\seguridad\accion\util\accion_util;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_util;
use com\bydan\contabilidad\seguridad\campo\business\entity\campo;
use com\bydan\contabilidad\seguridad\campo\util\campo_util;

class opcion_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='opcion';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='seguridad.opcions';
	/*'Mantenimientoopcion.jsf';*/
	public static string $STR_MODULO_OPCION='seguridad';
	public static string $STR_NOMBRE_CLASE='Mantenimientoopcion.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='opcionPersistenceName';
	/*.opcion_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='opcion_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='opcion_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='opcion_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Opciones';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Opcion';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $SEGURIDAD='seguridad';
	public static string $STR_PREFIJO_TABLE='seg_';
	public static string $STR_TABLE_NAME='opcion';
	public static string $OPCION='seg_opcion';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.opcion';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sistema,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_opcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_grupo_opcion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_modulo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.codigo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.posicion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.icon_name,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_clase,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.modulo0,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sub_modulo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.paquete,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.es_para_menu,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.es_guardar_relaciones,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_mostrar_acciones_campo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.estado from '.opcion_util::$SCHEMA.'.'.opcion_util::$TABLENAME;*/
	
	/*PARAMETROS
	AUDITORIA*/
	public static bool $BIT_CON_AUDITORIA=true;	
	public static bool $BIT_CON_AUDITORIA_DETALLE=true;	
	
	/*WEB PAGINA FORMULARIO*/
	public static bool $CON_PAGINA_FORM=true;		
	
	/*GLOBAL*/
	public static string $ID='id';
	public static string $VERSIONROW='updated_at';
	
	/*AUXILIAR*/
	//public $opcionConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_SISTEMA='id_sistema';
    public static string $ID_OPCION='id_opcion';
    public static string $ID_GRUPO_OPCION='id_grupo_opcion';
    public static string $ID_MODULO='id_modulo';
    public static string $CODIGO='codigo';
    public static string $NOMBRE='nombre';
    public static string $POSICION='posicion';
    public static string $ICON_NAME='icon_name';
    public static string $NOMBRE_CLASE='nombre_clase';
    public static string $MODULO0='modulo0';
    public static string $SUB_MODULO='sub_modulo';
    public static string $PAQUETE='paquete';
    public static string $ES_PARA_MENU='es_para_menu';
    public static string $ES_GUARDAR_RELACIONES='es_guardar_relaciones';
    public static string $CON_MOSTRAR_ACCIONES_CAMPO='con_mostrar_acciones_campo';
    public static string $ESTADO='estado';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='A';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_SISTEMA='Sistema';
    public static string $LABEL_ID_OPCION='Opcion';
    public static string $LABEL_ID_GRUPO_OPCION='Grupo Opcion';
    public static string $LABEL_ID_MODULO='Modulo';
    public static string $LABEL_CODIGO='Codigo';
    public static string $LABEL_NOMBRE='Nombre';
    public static string $LABEL_POSICION='Posicion';
    public static string $LABEL_ICON_NAME='Path Del Icono';
    public static string $LABEL_NOMBRE_CLASE='Nombre De Clase';
    public static string $LABEL_MODULO0='Modulo 0';
    public static string $LABEL_SUB_MODULO='Sub Modulo';
    public static string $LABEL_PAQUETE='Paquete';
    public static string $LABEL_ES_PARA_MENU='Es Para Menu';
    public static string $LABEL_ES_GUARDAR_RELACIONES='Es Guardar Relaciones';
    public static string $LABEL_CON_MOSTRAR_ACCIONES_CAMPO='Mostrar Acciones Campo';
    public static string $LABEL_ESTADO='Estado';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->opcionConstantesFuncionesAdditional=new $opcionConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $opcions,int $iIdNuevoopcion) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($opcions as $opcionAux) {
			if($opcionAux->getId()==$iIdNuevoopcion) {
				$existe=true;
				break;
			}
				
			$iIndice++;
		}

		if(!$existe) {
			/*SI NO EXISTE TOMA LA ULTIMA FILA*/
			$iIndice=$iIndice-1;
		}
		
		return $iIndice;
	}
	
	public static function getIndiceActual(array $opcions,opcion $opcion,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($opcions as $opcionAux) {
			if($opcionAux->getId()==$opcion->getId()) {
				$existe=true;
				break;
			}
				
			$iIndice++;
		}		
	
		if(!$existe) {
			/*SI NO EXISTE TOMA LA ULTIMA FILA*/
			$iIndice=$iIndiceActual;
		}
		
		return $iIndice;
	}
	
	/*DESCRIPCION*/
	public static function getopcionDescripcion(?opcion $opcion) : string {//opcion NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($opcion !=null) {
			/*&& opcion->getId()!=0*/
			
			$sDescripcion=($opcion->getcodigo());
			
			/*opcion;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setopcionDescripcion(?opcion $opcion,string $sValor) {			
		if($opcion !=null) {
			$opcion->setcodigo($sValor);;
			/*opcion;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $opcions) : array {
		$opcionsForeignKey=array();
		
		foreach ($opcions as $opcionLocal) {
			$opcionsForeignKey[$opcionLocal->getId()]=opcion_util::getopcionDescripcion($opcionLocal);
		}
			
		return $opcionsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_sistema() : string  { return 'Sistema'; }
    public static function getColumnLabelid_opcion() : string  { return 'Opcion'; }
    public static function getColumnLabelid_grupo_opcion() : string  { return 'Grupo Opcion'; }
    public static function getColumnLabelid_modulo() : string  { return 'Modulo'; }
    public static function getColumnLabelcodigo() : string  { return 'Codigo'; }
    public static function getColumnLabelnombre() : string  { return 'Nombre'; }
    public static function getColumnLabelposicion() : string  { return 'Posicion'; }
    public static function getColumnLabelicon_name() : string  { return 'Path Del Icono'; }
    public static function getColumnLabelnombre_clase() : string  { return 'Nombre De Clase'; }
    public static function getColumnLabelmodulo0() : string  { return 'Modulo 0'; }
    public static function getColumnLabelsub_modulo() : string  { return 'Sub Modulo'; }
    public static function getColumnLabelpaquete() : string  { return 'Paquete'; }
    public static function getColumnLabeles_para_menu() : string  { return 'Es Para Menu'; }
    public static function getColumnLabeles_guardar_relaciones() : string  { return 'Es Guardar Relaciones'; }
    public static function getColumnLabelcon_mostrar_acciones_campo() : string  { return 'Mostrar Acciones Campo'; }
    public static function getColumnLabelestado() : string  { return 'Estado'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getes_para_menuDescripcion($opcion) {
		$sDescripcion='Verdadero';
		if(!$opcion->getes_para_menu()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getes_guardar_relacionesDescripcion($opcion) {
		$sDescripcion='Verdadero';
		if(!$opcion->getes_guardar_relaciones()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_mostrar_acciones_campoDescripcion($opcion) {
		$sDescripcion='Verdadero';
		if(!$opcion->getcon_mostrar_acciones_campo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getestadoDescripcion($opcion) {
		$sDescripcion='Verdadero';
		if(!$opcion->getestado()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $opcions) {		
		try {
			
			$opcion = new opcion();
			
			foreach($opcions as $opcion) {
				
				$opcion->setid_sistema_Descripcion(opcion_util::getsistemaDescripcion($opcion->getsistema()));
				$opcion->setid_opcion_Descripcion(opcion_util::getopcionDescripcion($opcion->getopcion()));
				$opcion->setid_grupo_opcion_Descripcion(opcion_util::getgrupo_opcionDescripcion($opcion->getgrupo_opcion()));
				$opcion->setid_modulo_Descripcion(opcion_util::getmoduloDescripcion($opcion->getmodulo()));
			}
			
			if($opcion!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(opcion $opcion) {		
		try {
			
			
				$opcion->setid_sistema_Descripcion(opcion_util::getsistemaDescripcion($opcion->getsistema()));
				$opcion->setid_opcion_Descripcion(opcion_util::getopcionDescripcion($opcion->getopcion()));
				$opcion->setid_grupo_opcion_Descripcion(opcion_util::getgrupo_opcionDescripcion($opcion->getgrupo_opcion()));
				$opcion->setid_modulo_Descripcion(opcion_util::getmoduloDescripcion($opcion->getmodulo()));
							
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}		 
	
	/*FKs LISTA*/
			
	
	/*INDICES LABEL*/
	
	public static function getNombreIndice(string $sNombreIndice) : string {
		if($sNombreIndice=='Todos') {
			$sNombreIndice='Tipo=Todos';
		} else if($sNombreIndice=='PorId') {
			$sNombreIndice='Tipo=Por Id';
		} else if($sNombreIndice=='BusquedaPorIdSistemaPorIdOpcion') {
			$sNombreIndice='Tipo=  Por Sistema Por Opcion';
		} else if($sNombreIndice=='BusquedaPorIdSistemaPorNombre') {
			$sNombreIndice='Tipo=  Por Sistema Por Nombre';
		} else if($sNombreIndice=='FK_Idgrupo_opcion') {
			$sNombreIndice='Tipo=  Por Grupo Opcion';
		} else if($sNombreIndice=='FK_Idmodulo') {
			$sNombreIndice='Tipo=  Por Modulo';
		} else if($sNombreIndice=='FK_Idopcion') {
			$sNombreIndice='Tipo=  Por Opcion';
		} else if($sNombreIndice=='FK_Idsistema') {
			$sNombreIndice='Tipo=  Por Sistema';
		} else if($sNombreIndice=='PorIdSistemaPorIdOpcionPorNombre') {
			$sNombreIndice='Tipo=  Por Sistema Por Opcion Por Nombre';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceBusquedaPorIdSistemaPorIdOpcion(int $id_sistema,?int $id_opcion) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Sistema='+$id_sistema;
		$sDetalleIndice.=' Código Único de Opcion='+$id_opcion; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceBusquedaPorIdSistemaPorNombre(int $id_sistema,string $nombre) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Sistema='+$id_sistema;
		$sDetalleIndice.=' Nombre='+$nombre; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idgrupo_opcion(int $id_grupo_opcion) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Grupo Opcion='+$id_grupo_opcion; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idmodulo(int $id_modulo) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Modulo='+$id_modulo; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idopcion(?int $id_opcion) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Opcion='+$id_opcion; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idsistema(int $id_sistema) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Sistema='+$id_sistema; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndicePorIdSistemaPorIdOpcionPorNombre(int $id_sistema,?int $id_opcion,string $nombre) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Sistema='+$id_sistema;
		$sDetalleIndice.=' Código Único de Opcion='+$id_opcion;
		$sDetalleIndice.=' Nombre='+$nombre; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return opcion_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return opcion_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(opcion_util::$LABEL_ID_SISTEMA);
			$reporte->setsDescripcion(opcion_util::$LABEL_ID_SISTEMA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(opcion_util::$LABEL_ID_OPCION);
			$reporte->setsDescripcion(opcion_util::$LABEL_ID_OPCION.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(opcion_util::$LABEL_ID_GRUPO_OPCION);
			$reporte->setsDescripcion(opcion_util::$LABEL_ID_GRUPO_OPCION.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(opcion_util::$LABEL_ID_MODULO);
			$reporte->setsDescripcion(opcion_util::$LABEL_ID_MODULO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(opcion_util::$LABEL_CODIGO);
			$reporte->setsDescripcion(opcion_util::$LABEL_CODIGO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(opcion_util::$LABEL_NOMBRE);
			$reporte->setsDescripcion(opcion_util::$LABEL_NOMBRE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(opcion_util::$LABEL_POSICION);
			$reporte->setsDescripcion(opcion_util::$LABEL_POSICION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(opcion_util::$LABEL_ICON_NAME);
			$reporte->setsDescripcion(opcion_util::$LABEL_ICON_NAME);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(opcion_util::$LABEL_NOMBRE_CLASE);
			$reporte->setsDescripcion(opcion_util::$LABEL_NOMBRE_CLASE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(opcion_util::$LABEL_MODULO0);
			$reporte->setsDescripcion(opcion_util::$LABEL_MODULO0);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(opcion_util::$LABEL_SUB_MODULO);
			$reporte->setsDescripcion(opcion_util::$LABEL_SUB_MODULO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(opcion_util::$LABEL_PAQUETE);
			$reporte->setsDescripcion(opcion_util::$LABEL_PAQUETE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(opcion_util::$LABEL_ES_PARA_MENU);
			$reporte->setsDescripcion(opcion_util::$LABEL_ES_PARA_MENU);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(opcion_util::$LABEL_ES_GUARDAR_RELACIONES);
			$reporte->setsDescripcion(opcion_util::$LABEL_ES_GUARDAR_RELACIONES);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(opcion_util::$LABEL_CON_MOSTRAR_ACCIONES_CAMPO);
			$reporte->setsDescripcion(opcion_util::$LABEL_CON_MOSTRAR_ACCIONES_CAMPO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(opcion_util::$LABEL_ESTADO);
			$reporte->setsDescripcion(opcion_util::$LABEL_ESTADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=opcion_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==opcion_util::$ID_MODULO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=opcion_util::$ID_MODULO;
		}
		
		return $arrColumnasGlobales;
	}
	
	public static function getArrayColumnasGlobalesNo(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		
		
		return $arrColumnasGlobales;
	}
	
	/*DEEP CLASSES*/
	public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array {
		try {
			$classes=array();	
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				$classes[]=new Classe(sistema::$class);
				$classes[]=new Classe(opcion::$class);
				$classes[]=new Classe(grupo_opcion::$class);
				$classes[]=new Classe(modulo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==sistema::$class) {
						$classes[]=new Classe(sistema::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==opcion::$class) {
						$classes[]=new Classe(opcion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==grupo_opcion::$class) {
						$classes[]=new Classe(grupo_opcion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==modulo::$class) {
						$classes[]=new Classe(modulo::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==sistema::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sistema::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==opcion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(opcion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==grupo_opcion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(grupo_opcion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==modulo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(modulo::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array {
		try {
			$classes=array();			
			
			if($deepLoadType==DeepLoadType::$NONE) {
				
				$classes[]=new Classe(perfil::$class);
				$classes[]=new Classe(opcion::$class);
				$classes[]=new Classe(accion::$class);
				$classes[]=new Classe(perfil_opcion::$class);
				$classes[]=new Classe(campo::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==perfil::$class) {
						$classes[]=new Classe(perfil::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==opcion::$class) {
						$classes[]=new Classe(opcion::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==accion::$class) {
						$classes[]=new Classe(accion::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==perfil_opcion::$class) {
						$classes[]=new Classe(perfil_opcion::$class); break;
					}
				}

				foreach($classesP as $clas) {
					if($clas==campo::$class) {
						$classes[]=new Classe(campo::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==perfil::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(perfil::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==opcion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(opcion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==accion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(accion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==perfil_opcion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(perfil_opcion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==campo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(campo::$class);
				}

			}
			
			return $classes;
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	/*ORDER*/
	public static function getOrderByLista() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_ID, opcion_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_ID_SISTEMA, opcion_util::$ID_SISTEMA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_ID_OPCION, opcion_util::$ID_OPCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_ID_GRUPO_OPCION, opcion_util::$ID_GRUPO_OPCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_ID_MODULO, opcion_util::$ID_MODULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_CODIGO, opcion_util::$CODIGO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_NOMBRE, opcion_util::$NOMBRE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_POSICION, opcion_util::$POSICION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_ICON_NAME, opcion_util::$ICON_NAME,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_NOMBRE_CLASE, opcion_util::$NOMBRE_CLASE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_MODULO0, opcion_util::$MODULO0,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_SUB_MODULO, opcion_util::$SUB_MODULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_PAQUETE, opcion_util::$PAQUETE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_ES_PARA_MENU, opcion_util::$ES_PARA_MENU,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_ES_GUARDAR_RELACIONES, opcion_util::$ES_GUARDAR_RELACIONES,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_CON_MOSTRAR_ACCIONES_CAMPO, opcion_util::$CON_MOSTRAR_ACCIONES_CAMPO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$LABEL_ESTADO, opcion_util::$ESTADO,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,opcion_util::$STR_CLASS_WEB_TITULO, opcion_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,accion_util::$STR_CLASS_WEB_TITULO, accion_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,perfil_opcion_util::$STR_CLASS_WEB_TITULO, perfil_opcion_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,campo_util::$STR_CLASS_WEB_TITULO, campo_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		if($orderBy!=null);
		
		return $arrOrderBy;
	}
	
	/*REPORTES*/
		
	
	/*REPORTES CODIGO*/
	public static function getHeaderReportRow(string $tipo='NORMAL',array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$header=array();
		$cellReport=new CellReport();
		$blnFill=false;
		
		if($tipo=='RELACIONADO') {
			$blnFill=true;
			
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,7,1); $cellReport->setblnFill($blnFill); $header[]=$cellReport;			
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sistema',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Opcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Opcion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Grupo Opcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Grupo Opcion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modulo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modulo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Codigo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Posicion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Posicion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Path Del Icono',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Path Del Icono',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre De Clase',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre De Clase',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modulo 0',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modulo 0',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sub Modulo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sub Modulo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Paquete',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Paquete',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Es Para Menu',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Es Para Menu',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Es Guardar Relaciones',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Es Guardar Relaciones',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mostrar Acciones Campo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Mostrar Acciones Campo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Estado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',opcion $opcion,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Sistema',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getid_sistema_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Opcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getid_opcion_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Grupo Opcion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getid_grupo_opcion_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modulo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getid_modulo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Codigo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getcodigo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getnombre(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Posicion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getposicion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Path Del Icono',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->geticon_name(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre De Clase',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getnombre_clase(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modulo 0',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getmodulo0(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sub Modulo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getsub_modulo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Paquete',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($opcion->getpaquete(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Es Para Menu',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($opcion->getes_para_menu()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Es Guardar Relaciones',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($opcion->getes_guardar_relaciones()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Mostrar Acciones Campo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($opcion->getcon_mostrar_acciones_campo()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($opcion->getestado()),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getsistemaDescripcion(?sistema $sistema) : string {
		$sDescripcion='none';
		if($sistema!==null) {
			$sDescripcion=sistema_util::getsistemaDescripcion($sistema);
		}
		return $sDescripcion;
	}	
		
	
	public static function getgrupo_opcionDescripcion(?grupo_opcion $grupo_opcion) : string {
		$sDescripcion='none';
		if($grupo_opcion!==null) {
			$sDescripcion=grupo_opcion_util::getgrupo_opcionDescripcion($grupo_opcion);
		}
		return $sDescripcion;
	}	
	
	public static function getmoduloDescripcion(?modulo $modulo) : string {
		$sDescripcion='none';
		if($modulo!==null) {
			$sDescripcion=modulo_util::getmoduloDescripcion($modulo);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface opcion_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $opcions,int $iIdNuevoopcion) : int;	
		public static function getIndiceActual(array $opcions,opcion $opcion,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getopcionDescripcion(?opcion $opcion) : string {;	
		public static function setopcionDescripcion(?opcion $opcion,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $opcions) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $opcions);	
		public static function refrescarFKDescripcion(opcion $opcion);
				
		//SELECCIONAR
		public static function getTiposSeleccionar(bool $conFk) : array;	
		public static function getTiposSeleccionar2() : array;	
		public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array;
		
		//GLOBAL
		public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array;	
		public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array;	
		public static function getArrayColumnasGlobalesNo(array $arrDatoGeneral) : array;
		
		//DEEP CLASSES
		public static function getClassesFKsOf(array $classesP,string $deepLoadType) : array;
		
		
		public static function getClassesRelsOf(array $classesP,string $deepLoadType) : array;
		
		
		//ORDER
		public static function getOrderByLista() : array;	
		public static function getOrderByListaRel() : array;	
		
		//REPORTES CODIGO
		public static function getHeaderReportRow(string $tipo='NORMAL',array $arrOrderBy,bool $bitParaReporteOrderBy) : array;	
		public static function getDataReportRow(string $tipo='NORMAL',opcion $opcion,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

