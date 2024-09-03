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

namespace com\bydan\contabilidad\estimados\consignacion_detalle\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\estimados\consignacion_detalle\business\entity\consignacion_detalle;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;
use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;
use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;

//REL


class consignacion_detalle_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='consignacion_detalle';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='estimados.consignacion_detalles';
	/*'Mantenimientoconsignacion_detalle.jsf';*/
	public static string $STR_MODULO_OPCION='estimados';
	public static string $STR_NOMBRE_CLASE='Mantenimientoconsignacion_detalle.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='consignacion_detallePersistenceName';
	/*.consignacion_detalle_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='consignacion_detalle_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='consignacion_detalle_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='consignacion_detalle_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Consignacion Detalles';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Consignacion Detalle';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $ESTIMADOS='estimados';
	public static string $STR_PREFIJO_TABLE='est_';
	public static string $STR_TABLE_NAME='consignacion_detalle';
	public static string $CONSIGNACION_DETALLE='est_consignacion_detalle';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.consignacion_detalle';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_consignacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_bodega,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_unidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sub_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.recibido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto2_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto2_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cotizacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.moneda from '.consignacion_detalle_util::$SCHEMA.'.'.consignacion_detalle_util::$TABLENAME;*/
	
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
	//public $consignacion_detalleConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_CONSIGNACION='id_consignacion';
    public static string $ID_BODEGA='id_bodega';
    public static string $ID_PRODUCTO='id_producto';
    public static string $ID_UNIDAD='id_unidad';
    public static string $CANTIDAD='cantidad';
    public static string $PRECIO='precio';
    public static string $DESCUENTO_PORCIENTO='descuento_porciento';
    public static string $DESCUENTO_MONTO='descuento_monto';
    public static string $SUB_TOTAL='sub_total';
    public static string $IVA_PORCIENTO='iva_porciento';
    public static string $IVA_MONTO='iva_monto';
    public static string $TOTAL='total';
    public static string $RECIBIDO='recibido';
    public static string $OBSERVACION='observacion';
    public static string $IMPUESTO2_PORCIENTO='impuesto2_porciento';
    public static string $IMPUESTO2_MONTO='impuesto2_monto';
    public static string $COTIZACION='cotizacion';
    public static string $MONEDA='moneda';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_CONSIGNACION='Consignacion';
    public static string $LABEL_ID_BODEGA='Bodega';
    public static string $LABEL_ID_PRODUCTO='Producto';
    public static string $LABEL_ID_UNIDAD='Unidad';
    public static string $LABEL_CANTIDAD='Cantidad';
    public static string $LABEL_PRECIO='Precio';
    public static string $LABEL_DESCUENTO_PORCIENTO='Descto %';
    public static string $LABEL_DESCUENTO_MONTO='Descto';
    public static string $LABEL_SUB_TOTAL='Sub Total';
    public static string $LABEL_IVA_PORCIENTO='Iva %';
    public static string $LABEL_IVA_MONTO='Iva';
    public static string $LABEL_TOTAL='Total';
    public static string $LABEL_RECIBIDO='No Recibidos';
    public static string $LABEL_OBSERVACION='Observacion';
    public static string $LABEL_IMPUESTO2_PORCIENTO='Impuesto2 %';
    public static string $LABEL_IMPUESTO2_MONTO='Impuesto2 Monto';
    public static string $LABEL_COTIZACION='Cotizacion';
    public static string $LABEL_MONEDA='Moneda';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->consignacion_detalleConstantesFuncionesAdditional=new $consignacion_detalleConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $consignacion_detalles,int $iIdNuevoconsignacion_detalle) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($consignacion_detalles as $consignacion_detalleAux) {
			if($consignacion_detalleAux->getId()==$iIdNuevoconsignacion_detalle) {
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
	
	public static function getIndiceActual(array $consignacion_detalles,consignacion_detalle $consignacion_detalle,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($consignacion_detalles as $consignacion_detalleAux) {
			if($consignacion_detalleAux->getId()==$consignacion_detalle->getId()) {
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
	public static function getconsignacion_detalleDescripcion(?consignacion_detalle $consignacion_detalle) : string {//consignacion_detalle NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($consignacion_detalle !=null) {
			/*&& consignacion_detalle->getId()!=0*/
			
			if($consignacion_detalle->getId()!=null) {
				$sDescripcion=(string)$consignacion_detalle->getId();
			}
			
			/*consignacion_detalle;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setconsignacion_detalleDescripcion(?consignacion_detalle $consignacion_detalle,string $sValor) {			
		if($consignacion_detalle !=null) {
			
			/*consignacion_detalle;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $consignacion_detalles) : array {
		$consignacion_detallesForeignKey=array();
		
		foreach ($consignacion_detalles as $consignacion_detalleLocal) {
			$consignacion_detallesForeignKey[$consignacion_detalleLocal->getId()]=consignacion_detalle_util::getconsignacion_detalleDescripcion($consignacion_detalleLocal);
		}
			
		return $consignacion_detallesForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_consignacion() : string  { return 'Consignacion'; }
    public static function getColumnLabelid_bodega() : string  { return 'Bodega'; }
    public static function getColumnLabelid_producto() : string  { return 'Producto'; }
    public static function getColumnLabelid_unidad() : string  { return 'Unidad'; }
    public static function getColumnLabelcantidad() : string  { return 'Cantidad'; }
    public static function getColumnLabelprecio() : string  { return 'Precio'; }
    public static function getColumnLabeldescuento_porciento() : string  { return 'Descto %'; }
    public static function getColumnLabeldescuento_monto() : string  { return 'Descto'; }
    public static function getColumnLabelsub_total() : string  { return 'Sub Total'; }
    public static function getColumnLabeliva_porciento() : string  { return 'Iva %'; }
    public static function getColumnLabeliva_monto() : string  { return 'Iva'; }
    public static function getColumnLabeltotal() : string  { return 'Total'; }
    public static function getColumnLabelrecibido() : string  { return 'No Recibidos'; }
    public static function getColumnLabelobservacion() : string  { return 'Observacion'; }
    public static function getColumnLabelimpuesto2_porciento() : string  { return 'Impuesto2 %'; }
    public static function getColumnLabelimpuesto2_monto() : string  { return 'Impuesto2 Monto'; }
    public static function getColumnLabelcotizacion() : string  { return 'Cotizacion'; }
    public static function getColumnLabelmoneda() : string  { return 'Moneda'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $consignacion_detalles) {		
		try {
			
			$consignacion_detalle = new consignacion_detalle();
			
			foreach($consignacion_detalles as $consignacion_detalle) {
				
				$consignacion_detalle->setid_consignacion_Descripcion(consignacion_detalle_util::getconsignacionDescripcion($consignacion_detalle->getconsignacion()));
				$consignacion_detalle->setid_bodega_Descripcion(consignacion_detalle_util::getbodegaDescripcion($consignacion_detalle->getbodega()));
				$consignacion_detalle->setid_producto_Descripcion(consignacion_detalle_util::getproductoDescripcion($consignacion_detalle->getproducto()));
				$consignacion_detalle->setid_unidad_Descripcion(consignacion_detalle_util::getunidadDescripcion($consignacion_detalle->getunidad()));
			}
			
			if($consignacion_detalle!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(consignacion_detalle $consignacion_detalle) {		
		try {
			
			
				$consignacion_detalle->setid_consignacion_Descripcion(consignacion_detalle_util::getconsignacionDescripcion($consignacion_detalle->getconsignacion()));
				$consignacion_detalle->setid_bodega_Descripcion(consignacion_detalle_util::getbodegaDescripcion($consignacion_detalle->getbodega()));
				$consignacion_detalle->setid_producto_Descripcion(consignacion_detalle_util::getproductoDescripcion($consignacion_detalle->getproducto()));
				$consignacion_detalle->setid_unidad_Descripcion(consignacion_detalle_util::getunidadDescripcion($consignacion_detalle->getunidad()));
							
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
		} else if($sNombreIndice=='FK_Idbodega') {
			$sNombreIndice='Tipo=  Por Bodega';
		} else if($sNombreIndice=='FK_Idconsignacion') {
			$sNombreIndice='Tipo=  Por Consignacion';
		} else if($sNombreIndice=='FK_Idproducto') {
			$sNombreIndice='Tipo=  Por Producto';
		} else if($sNombreIndice=='FK_Idunidad') {
			$sNombreIndice='Tipo=  Por Unidad';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idbodega(int $id_bodega) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Bodega='+$id_bodega; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idconsignacion(int $id_consignacion) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Consignacion='+$id_consignacion; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idproducto(int $id_producto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Producto='+$id_producto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idunidad(int $id_unidad) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Unidad='+$id_unidad; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return consignacion_detalle_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return consignacion_detalle_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_ID_CONSIGNACION);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_ID_CONSIGNACION.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_ID_BODEGA);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_ID_BODEGA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_ID_PRODUCTO);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_ID_PRODUCTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_ID_UNIDAD);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_ID_UNIDAD.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_CANTIDAD);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_CANTIDAD);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_PRECIO);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_PRECIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_DESCUENTO_PORCIENTO);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_DESCUENTO_PORCIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_DESCUENTO_MONTO);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_DESCUENTO_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_SUB_TOTAL);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_SUB_TOTAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_IVA_PORCIENTO);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_IVA_PORCIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_IVA_MONTO);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_IVA_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_TOTAL);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_TOTAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_RECIBIDO);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_RECIBIDO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_OBSERVACION);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_OBSERVACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_IMPUESTO2_PORCIENTO);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_IMPUESTO2_PORCIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_IMPUESTO2_MONTO);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_IMPUESTO2_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_COTIZACION);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_COTIZACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(consignacion_detalle_util::$LABEL_MONEDA);
			$reporte->setsDescripcion(consignacion_detalle_util::$LABEL_MONEDA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=consignacion_detalle_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(consignacion::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(unidad::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==consignacion::$class) {
						$classes[]=new Classe(consignacion::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==bodega::$class) {
						$classes[]=new Classe(bodega::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==unidad::$class) {
						$classes[]=new Classe(unidad::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==consignacion::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(consignacion::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==bodega::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(bodega::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==producto::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(producto::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==unidad::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(unidad::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_ID, consignacion_detalle_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_ID_CONSIGNACION, consignacion_detalle_util::$ID_CONSIGNACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_ID_BODEGA, consignacion_detalle_util::$ID_BODEGA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_ID_PRODUCTO, consignacion_detalle_util::$ID_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_ID_UNIDAD, consignacion_detalle_util::$ID_UNIDAD,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_CANTIDAD, consignacion_detalle_util::$CANTIDAD,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_PRECIO, consignacion_detalle_util::$PRECIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_DESCUENTO_PORCIENTO, consignacion_detalle_util::$DESCUENTO_PORCIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_DESCUENTO_MONTO, consignacion_detalle_util::$DESCUENTO_MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_SUB_TOTAL, consignacion_detalle_util::$SUB_TOTAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_IVA_PORCIENTO, consignacion_detalle_util::$IVA_PORCIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_IVA_MONTO, consignacion_detalle_util::$IVA_MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_TOTAL, consignacion_detalle_util::$TOTAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_RECIBIDO, consignacion_detalle_util::$RECIBIDO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_OBSERVACION, consignacion_detalle_util::$OBSERVACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_IMPUESTO2_PORCIENTO, consignacion_detalle_util::$IMPUESTO2_PORCIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_IMPUESTO2_MONTO, consignacion_detalle_util::$IMPUESTO2_MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_COTIZACION, consignacion_detalle_util::$COTIZACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,consignacion_detalle_util::$LABEL_MONEDA, consignacion_detalle_util::$MONEDA,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Consignacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Consignacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Bodega',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Bodega',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Unidad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Unidad',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descto %',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descto %',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sub Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sub Total',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Iva %',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva %',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Iva',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Total',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('No Recibidos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('No Recibidos',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Observacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Observacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',consignacion_detalle $consignacion_detalle,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Consignacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($consignacion_detalle->getid_consignacion_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Bodega',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($consignacion_detalle->getid_bodega_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($consignacion_detalle->getid_producto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Unidad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($consignacion_detalle->getid_unidad_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($consignacion_detalle->getcantidad(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($consignacion_detalle->getprecio(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descto %',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($consignacion_detalle->getdescuento_porciento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($consignacion_detalle->getdescuento_monto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sub Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($consignacion_detalle->getsub_total(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Iva %',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($consignacion_detalle->getiva_porciento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Iva',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($consignacion_detalle->getiva_monto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($consignacion_detalle->gettotal(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('No Recibidos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($consignacion_detalle->getrecibido(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Observacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($consignacion_detalle->getobservacion(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getconsignacionDescripcion(?consignacion $consignacion) : string {
		$sDescripcion='none';
		if($consignacion!==null) {
			$sDescripcion=consignacion_util::getconsignacionDescripcion($consignacion);
		}
		return $sDescripcion;
	}	
	
	public static function getbodegaDescripcion(?bodega $bodega) : string {
		$sDescripcion='none';
		if($bodega!==null) {
			$sDescripcion=bodega_util::getbodegaDescripcion($bodega);
		}
		return $sDescripcion;
	}	
	
	public static function getproductoDescripcion(?producto $producto) : string {
		$sDescripcion='none';
		if($producto!==null) {
			$sDescripcion=producto_util::getproductoDescripcion($producto);
		}
		return $sDescripcion;
	}	
	
	public static function getunidadDescripcion(?unidad $unidad) : string {
		$sDescripcion='none';
		if($unidad!==null) {
			$sDescripcion=unidad_util::getunidadDescripcion($unidad);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface consignacion_detalle_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $consignacion_detalles,int $iIdNuevoconsignacion_detalle) : int;	
		public static function getIndiceActual(array $consignacion_detalles,consignacion_detalle $consignacion_detalle,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getconsignacion_detalleDescripcion(?consignacion_detalle $consignacion_detalle) : string {;	
		public static function setconsignacion_detalleDescripcion(?consignacion_detalle $consignacion_detalle,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $consignacion_detalles) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $consignacion_detalles);	
		public static function refrescarFKDescripcion(consignacion_detalle $consignacion_detalle);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',consignacion_detalle $consignacion_detalle,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

