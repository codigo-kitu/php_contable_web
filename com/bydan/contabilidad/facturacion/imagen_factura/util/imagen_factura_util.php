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

namespace com\bydan\contabilidad\facturacion\imagen_factura\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\facturacion\imagen_factura\business\entity\imagen_factura;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;

//REL


class imagen_factura_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='imagen_factura';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='facturacion.imagen_facturas';
	/*'Mantenimientoimagen_factura.jsf';*/
	public static string $STR_MODULO_OPCION='facturacion';
	public static string $STR_NOMBRE_CLASE='Mantenimientoimagen_factura.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='imagen_facturaPersistenceName';
	/*.imagen_factura_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='imagen_factura_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='imagen_factura_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='imagen_factura_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Imagenes Facturases';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='es';
	public static string $STR_CLASS_WEB_TITULO='Imagenes Facturas';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $FACTURACION='facturacion';
	public static string $STR_PREFIJO_TABLE='fac_';
	public static string $STR_TABLE_NAME='imagen_factura';
	public static string $IMAGEN_FACTURA='fac_imagen_factura';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.imagen_factura';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_imagen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.imagen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_factura from '.imagen_factura_util::$SCHEMA.'.'.imagen_factura_util::$TABLENAME;*/
	
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
	//public $imagen_facturaConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_FACTURA='id_factura';
    public static string $ID_IMAGEN='id_imagen';
    public static string $IMAGEN='imagen';
    public static string $NRO_FACTURA='nro_factura';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_FACTURA=' Factura';
    public static string $LABEL_ID_IMAGEN='Imagen';
    public static string $LABEL_IMAGEN='Imagen';
    public static string $LABEL_NRO_FACTURA='Nro Factura';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_facturaConstantesFuncionesAdditional=new $imagen_facturaConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $imagen_facturas,int $iIdNuevoimagen_factura) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($imagen_facturas as $imagen_facturaAux) {
			if($imagen_facturaAux->getId()==$iIdNuevoimagen_factura) {
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
	
	public static function getIndiceActual(array $imagen_facturas,imagen_factura $imagen_factura,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($imagen_facturas as $imagen_facturaAux) {
			if($imagen_facturaAux->getId()==$imagen_factura->getId()) {
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
	public static function getimagen_facturaDescripcion(?imagen_factura $imagen_factura) : string {//imagen_factura NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($imagen_factura !=null) {
			/*&& imagen_factura->getId()!=0*/
			
			if($imagen_factura->getId()!=null) {
				$sDescripcion=(string)$imagen_factura->getId();
			}
			
			/*imagen_factura;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setimagen_facturaDescripcion(?imagen_factura $imagen_factura,string $sValor) {			
		if($imagen_factura !=null) {
			
			/*imagen_factura;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $imagen_facturas) : array {
		$imagen_facturasForeignKey=array();
		
		foreach ($imagen_facturas as $imagen_facturaLocal) {
			$imagen_facturasForeignKey[$imagen_facturaLocal->getId()]=imagen_factura_util::getimagen_facturaDescripcion($imagen_facturaLocal);
		}
			
		return $imagen_facturasForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_factura() : string  { return ' Factura'; }
    public static function getColumnLabelid_imagen() : string  { return 'Imagen'; }
    public static function getColumnLabelimagen() : string  { return 'Imagen'; }
    public static function getColumnLabelnro_factura() : string  { return 'Nro Factura'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $imagen_facturas) {		
		try {
			
			$imagen_factura = new imagen_factura();
			
			foreach($imagen_facturas as $imagen_factura) {
				
				$imagen_factura->setid_factura_Descripcion(imagen_factura_util::getfacturaDescripcion($imagen_factura->getfactura()));
			}
			
			if($imagen_factura!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(imagen_factura $imagen_factura) {		
		try {
			
			
				$imagen_factura->setid_factura_Descripcion(imagen_factura_util::getfacturaDescripcion($imagen_factura->getfactura()));
							
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
		} else if($sNombreIndice=='FK_Idfactura') {
			$sNombreIndice='Tipo=  Por  Factura';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idfactura(int $id_factura) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Factura='+$id_factura; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return imagen_factura_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return imagen_factura_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(imagen_factura_util::$LABEL_ID_FACTURA);
			$reporte->setsDescripcion(imagen_factura_util::$LABEL_ID_FACTURA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(imagen_factura_util::$LABEL_ID_IMAGEN);
			$reporte->setsDescripcion(imagen_factura_util::$LABEL_ID_IMAGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(imagen_factura_util::$LABEL_IMAGEN);
			$reporte->setsDescripcion(imagen_factura_util::$LABEL_IMAGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(imagen_factura_util::$LABEL_NRO_FACTURA);
			$reporte->setsDescripcion(imagen_factura_util::$LABEL_NRO_FACTURA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=imagen_factura_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(factura::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==factura::$class) {
						$classes[]=new Classe(factura::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==factura::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(factura::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,imagen_factura_util::$LABEL_ID, imagen_factura_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,imagen_factura_util::$LABEL_ID_FACTURA, imagen_factura_util::$ID_FACTURA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,imagen_factura_util::$LABEL_ID_IMAGEN, imagen_factura_util::$ID_IMAGEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,imagen_factura_util::$LABEL_IMAGEN, imagen_factura_util::$IMAGEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,imagen_factura_util::$LABEL_NRO_FACTURA, imagen_factura_util::$NRO_FACTURA,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy(' Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Factura',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Imagen',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Imagen',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Factura',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',imagen_factura $imagen_factura,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy(' Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($imagen_factura->getid_factura_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($imagen_factura->getid_imagen(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Imagen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($imagen_factura->getimagen(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($imagen_factura->getnro_factura(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getfacturaDescripcion(?factura $factura) : string {
		$sDescripcion='none';
		if($factura!==null) {
			$sDescripcion=factura_util::getfacturaDescripcion($factura);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface imagen_factura_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $imagen_facturas,int $iIdNuevoimagen_factura) : int;	
		public static function getIndiceActual(array $imagen_facturas,imagen_factura $imagen_factura,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getimagen_facturaDescripcion(?imagen_factura $imagen_factura) : string {;	
		public static function setimagen_facturaDescripcion(?imagen_factura $imagen_factura,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $imagen_facturas) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $imagen_facturas);	
		public static function refrescarFKDescripcion(imagen_factura $imagen_factura);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',imagen_factura $imagen_factura,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

