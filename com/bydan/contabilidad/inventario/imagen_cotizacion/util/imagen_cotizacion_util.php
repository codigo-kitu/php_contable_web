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

namespace com\bydan\contabilidad\inventario\imagen_cotizacion\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\inventario\imagen_cotizacion\business\entity\imagen_cotizacion;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK


//REL


class imagen_cotizacion_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='imagen_cotizacion';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='inventario.imagen_cotizacions';
	/*'Mantenimientoimagen_cotizacion.jsf';*/
	public static string $STR_MODULO_OPCION='inventario';
	public static string $STR_NOMBRE_CLASE='Mantenimientoimagen_cotizacion.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='imagen_cotizacionPersistenceName';
	/*.imagen_cotizacion_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='imagen_cotizacion_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='imagen_cotizacion_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='imagen_cotizacion_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Imagenes Cotizaciones';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Imagenes Cotizacion';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $INVENTARIO='inventario';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $STR_TABLE_NAME='imagen_cotizacion';
	public static string $IMAGEN_COTIZACION='inv_imagen_cotizacion';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.imagen_cotizacion';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.imagen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_cotizacion from '.imagen_cotizacion_util::$SCHEMA.'.'.imagen_cotizacion_util::$TABLENAME;*/
	
	/*PARAMETROS
	AUDITORIA*/
	public static bool $BIT_CON_AUDITORIA=false;	
	public static bool $BIT_CON_AUDITORIA_DETALLE=true;	
	
	/*WEB PAGINA FORMULARIO*/
	public static bool $CON_PAGINA_FORM=true;		
	
	/*GLOBAL*/
	public static string $ID='id';
	public static string $VERSIONROW='updated_at';
	
	/*AUXILIAR*/
	//public $imagen_cotizacionConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $IMAGEN='imagen';
    public static string $NRO_COTIZACION='nro_cotizacion';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_IMAGEN='Imagen';
    public static string $LABEL_NRO_COTIZACION='Nro Cotizacion';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_cotizacionConstantesFuncionesAdditional=new $imagen_cotizacionConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $imagen_cotizacions,int $iIdNuevoimagen_cotizacion) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($imagen_cotizacions as $imagen_cotizacionAux) {
			if($imagen_cotizacionAux->getId()==$iIdNuevoimagen_cotizacion) {
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
	
	public static function getIndiceActual(array $imagen_cotizacions,imagen_cotizacion $imagen_cotizacion,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($imagen_cotizacions as $imagen_cotizacionAux) {
			if($imagen_cotizacionAux->getId()==$imagen_cotizacion->getId()) {
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
	public static function getimagen_cotizacionDescripcion(?imagen_cotizacion $imagen_cotizacion) : string {//imagen_cotizacion NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($imagen_cotizacion !=null) {
			/*&& imagen_cotizacion->getId()!=0*/
			
			$sDescripcion=$imagen_cotizacion->getnro_cotizacion();
			
			/*imagen_cotizacion;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setimagen_cotizacionDescripcion(?imagen_cotizacion $imagen_cotizacion,string $sValor) {			
		if($imagen_cotizacion !=null) {
			$imagen_cotizacion->setnro_cotizacion($sValor);
			/*imagen_cotizacion;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $imagen_cotizacions) : array {
		$imagen_cotizacionsForeignKey=array();
		
		foreach ($imagen_cotizacions as $imagen_cotizacionLocal) {
			$imagen_cotizacionsForeignKey[$imagen_cotizacionLocal->getId()]=imagen_cotizacion_util::getimagen_cotizacionDescripcion($imagen_cotizacionLocal);
		}
			
		return $imagen_cotizacionsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelimagen() : string  { return 'Imagen'; }
    public static function getColumnLabelnro_cotizacion() : string  { return 'Nro Cotizacion'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $imagen_cotizacions) {		
		try {
			
			$imagen_cotizacion = new imagen_cotizacion();
			
			foreach($imagen_cotizacions as $imagen_cotizacion) {
				
			}
			
			if($imagen_cotizacion!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(imagen_cotizacion $imagen_cotizacion) {		
		try {
			
			
							
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
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return imagen_cotizacion_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return imagen_cotizacion_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(imagen_cotizacion_util::$LABEL_IMAGEN);
			$reporte->setsDescripcion(imagen_cotizacion_util::$LABEL_IMAGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(imagen_cotizacion_util::$LABEL_NRO_COTIZACION);
			$reporte->setsDescripcion(imagen_cotizacion_util::$LABEL_NRO_COTIZACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=imagen_cotizacion_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		
		
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
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
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
				
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,imagen_cotizacion_util::$LABEL_ID, imagen_cotizacion_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,imagen_cotizacion_util::$LABEL_IMAGEN, imagen_cotizacion_util::$IMAGEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,imagen_cotizacion_util::$LABEL_NRO_COTIZACION, imagen_cotizacion_util::$NRO_COTIZACION,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Imagen',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Cotizacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Cotizacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',imagen_cotizacion $imagen_cotizacion,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($imagen_cotizacion->getimagen(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Cotizacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($imagen_cotizacion->getnro_cotizacion(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface imagen_cotizacion_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $imagen_cotizacions,int $iIdNuevoimagen_cotizacion) : int;	
		public static function getIndiceActual(array $imagen_cotizacions,imagen_cotizacion $imagen_cotizacion,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getimagen_cotizacionDescripcion(?imagen_cotizacion $imagen_cotizacion) : string {;	
		public static function setimagen_cotizacionDescripcion(?imagen_cotizacion $imagen_cotizacion,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $imagen_cotizacions) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $imagen_cotizacions);	
		public static function refrescarFKDescripcion(imagen_cotizacion $imagen_cotizacion);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',imagen_cotizacion $imagen_cotizacion,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

