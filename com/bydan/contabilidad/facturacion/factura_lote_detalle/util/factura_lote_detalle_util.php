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

namespace com\bydan\contabilidad\facturacion\factura_lote_detalle\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\facturacion\factura_lote_detalle\business\entity\factura_lote_detalle;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\facturacion\factura_lote\business\entity\factura_lote;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;
use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;
use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;

//REL


class factura_lote_detalle_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='factura_lote_detalle';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='facturacion.factura_lote_detalles';
	/*'Mantenimientofactura_lote_detalle.jsf';*/
	public static string $STR_MODULO_OPCION='facturacion';
	public static string $STR_NOMBRE_CLASE='Mantenimientofactura_lote_detalle.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='factura_lote_detallePersistenceName';
	/*.factura_lote_detalle_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='factura_lote_detalle_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='factura_lote_detalle_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='factura_lote_detalle_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Factura Lote Detalles';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Factura Lote Detalle';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $FACTURACION='facturacion';
	public static string $STR_PREFIJO_TABLE='fac_';
	public static string $STR_TABLE_NAME='factura_lote_detalle';
	public static string $FACTURA_LOTE_DETALLE='fac_factura_lote_detalle';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.factura_lote_detalle';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_factura_lote,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_bodega,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_unidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sub_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.recibido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto2_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto2_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cotizacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.moneda from '.factura_lote_detalle_util::$SCHEMA.'.'.factura_lote_detalle_util::$TABLENAME;*/
	
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
	//public $factura_lote_detalleConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_FACTURA_LOTE='id_factura_lote';
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
	
    public static string $LABEL_ID_FACTURA_LOTE=' Factura Lote';
    public static string $LABEL_ID_BODEGA=' Bodega';
    public static string $LABEL_ID_PRODUCTO=' Producto';
    public static string $LABEL_ID_UNIDAD=' Unidad';
    public static string $LABEL_CANTIDAD='Cantidad';
    public static string $LABEL_PRECIO='Precio';
    public static string $LABEL_DESCUENTO_PORCIENTO='Descuento Porciento';
    public static string $LABEL_DESCUENTO_MONTO='Descuento Monto';
    public static string $LABEL_SUB_TOTAL='Sub Total';
    public static string $LABEL_IVA_PORCIENTO='Iva Porciento';
    public static string $LABEL_IVA_MONTO='Iva Monto';
    public static string $LABEL_TOTAL='Total';
    public static string $LABEL_RECIBIDO='No Recibidos';
    public static string $LABEL_OBSERVACION='Observacion';
    public static string $LABEL_IMPUESTO2_PORCIENTO='Impuesto2 Porciento';
    public static string $LABEL_IMPUESTO2_MONTO='Impuesto2 Monto';
    public static string $LABEL_COTIZACION='Cotizacion';
    public static string $LABEL_MONEDA='Moneda';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->factura_lote_detalleConstantesFuncionesAdditional=new $factura_lote_detalleConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $factura_lote_detalles,int $iIdNuevofactura_lote_detalle) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($factura_lote_detalles as $factura_lote_detalleAux) {
			if($factura_lote_detalleAux->getId()==$iIdNuevofactura_lote_detalle) {
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
	
	public static function getIndiceActual(array $factura_lote_detalles,factura_lote_detalle $factura_lote_detalle,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($factura_lote_detalles as $factura_lote_detalleAux) {
			if($factura_lote_detalleAux->getId()==$factura_lote_detalle->getId()) {
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
	public static function getfactura_lote_detalleDescripcion(?factura_lote_detalle $factura_lote_detalle) : string {//factura_lote_detalle NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($factura_lote_detalle !=null) {
			/*&& factura_lote_detalle->getId()!=0*/
			
			if($factura_lote_detalle->getId()!=null) {
				$sDescripcion=(string)$factura_lote_detalle->getId();
			}
			
			/*factura_lote_detalle;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setfactura_lote_detalleDescripcion(?factura_lote_detalle $factura_lote_detalle,string $sValor) {			
		if($factura_lote_detalle !=null) {
			
			/*factura_lote_detalle;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $factura_lote_detalles) : array {
		$factura_lote_detallesForeignKey=array();
		
		foreach ($factura_lote_detalles as $factura_lote_detalleLocal) {
			$factura_lote_detallesForeignKey[$factura_lote_detalleLocal->getId()]=factura_lote_detalle_util::getfactura_lote_detalleDescripcion($factura_lote_detalleLocal);
		}
			
		return $factura_lote_detallesForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_factura_lote() : string  { return ' Factura Lote'; }
    public static function getColumnLabelid_bodega() : string  { return ' Bodega'; }
    public static function getColumnLabelid_producto() : string  { return ' Producto'; }
    public static function getColumnLabelid_unidad() : string  { return ' Unidad'; }
    public static function getColumnLabelcantidad() : string  { return 'Cantidad'; }
    public static function getColumnLabelprecio() : string  { return 'Precio'; }
    public static function getColumnLabeldescuento_porciento() : string  { return 'Descuento Porciento'; }
    public static function getColumnLabeldescuento_monto() : string  { return 'Descuento Monto'; }
    public static function getColumnLabelsub_total() : string  { return 'Sub Total'; }
    public static function getColumnLabeliva_porciento() : string  { return 'Iva Porciento'; }
    public static function getColumnLabeliva_monto() : string  { return 'Iva Monto'; }
    public static function getColumnLabeltotal() : string  { return 'Total'; }
    public static function getColumnLabelrecibido() : string  { return 'No Recibidos'; }
    public static function getColumnLabelobservacion() : string  { return 'Observacion'; }
    public static function getColumnLabelimpuesto2_porciento() : string  { return 'Impuesto2 Porciento'; }
    public static function getColumnLabelimpuesto2_monto() : string  { return 'Impuesto2 Monto'; }
    public static function getColumnLabelcotizacion() : string  { return 'Cotizacion'; }
    public static function getColumnLabelmoneda() : string  { return 'Moneda'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $factura_lote_detalles) {		
		try {
			
			$factura_lote_detalle = new factura_lote_detalle();
			
			foreach($factura_lote_detalles as $factura_lote_detalle) {
				
				$factura_lote_detalle->setid_factura_lote_Descripcion(factura_lote_detalle_util::getfactura_loteDescripcion($factura_lote_detalle->getfactura_lote()));
				$factura_lote_detalle->setid_bodega_Descripcion(factura_lote_detalle_util::getbodegaDescripcion($factura_lote_detalle->getbodega()));
				$factura_lote_detalle->setid_producto_Descripcion(factura_lote_detalle_util::getproductoDescripcion($factura_lote_detalle->getproducto()));
				$factura_lote_detalle->setid_unidad_Descripcion(factura_lote_detalle_util::getunidadDescripcion($factura_lote_detalle->getunidad()));
			}
			
			if($factura_lote_detalle!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(factura_lote_detalle $factura_lote_detalle) {		
		try {
			
			
				$factura_lote_detalle->setid_factura_lote_Descripcion(factura_lote_detalle_util::getfactura_loteDescripcion($factura_lote_detalle->getfactura_lote()));
				$factura_lote_detalle->setid_bodega_Descripcion(factura_lote_detalle_util::getbodegaDescripcion($factura_lote_detalle->getbodega()));
				$factura_lote_detalle->setid_producto_Descripcion(factura_lote_detalle_util::getproductoDescripcion($factura_lote_detalle->getproducto()));
				$factura_lote_detalle->setid_unidad_Descripcion(factura_lote_detalle_util::getunidadDescripcion($factura_lote_detalle->getunidad()));
							
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
			$sNombreIndice='Tipo=  Por  Bodega';
		} else if($sNombreIndice=='FK_Idfactura_lote') {
			$sNombreIndice='Tipo=  Por  Factura Lote';
		} else if($sNombreIndice=='FK_Idproducto') {
			$sNombreIndice='Tipo=  Por  Producto';
		} else if($sNombreIndice=='FK_Idunidad') {
			$sNombreIndice='Tipo=  Por  Unidad';
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
		$sDetalleIndice.=' Código Único de  Bodega='+$id_bodega; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idfactura_lote(int $id_factura_lote) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Factura Lote='+$id_factura_lote; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idproducto(int $id_producto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Producto='+$id_producto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idunidad(int $id_unidad) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Unidad='+$id_unidad; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return factura_lote_detalle_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return factura_lote_detalle_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_ID_FACTURA_LOTE);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_ID_FACTURA_LOTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_ID_BODEGA);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_ID_BODEGA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_ID_PRODUCTO);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_ID_PRODUCTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_ID_UNIDAD);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_ID_UNIDAD.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_CANTIDAD);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_CANTIDAD);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_PRECIO);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_PRECIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_DESCUENTO_PORCIENTO);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_DESCUENTO_PORCIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_DESCUENTO_MONTO);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_DESCUENTO_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_SUB_TOTAL);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_SUB_TOTAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_IVA_PORCIENTO);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_IVA_PORCIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_IVA_MONTO);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_IVA_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_TOTAL);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_TOTAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_RECIBIDO);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_RECIBIDO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_OBSERVACION);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_OBSERVACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_IMPUESTO2_PORCIENTO);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_IMPUESTO2_PORCIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_IMPUESTO2_MONTO);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_IMPUESTO2_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_COTIZACION);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_COTIZACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(factura_lote_detalle_util::$LABEL_MONEDA);
			$reporte->setsDescripcion(factura_lote_detalle_util::$LABEL_MONEDA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=factura_lote_detalle_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(factura_lote::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(unidad::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==factura_lote::$class) {
						$classes[]=new Classe(factura_lote::$class);
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
					if($clas==factura_lote::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(factura_lote::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_ID, factura_lote_detalle_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_ID_FACTURA_LOTE, factura_lote_detalle_util::$ID_FACTURA_LOTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_ID_BODEGA, factura_lote_detalle_util::$ID_BODEGA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_ID_PRODUCTO, factura_lote_detalle_util::$ID_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_ID_UNIDAD, factura_lote_detalle_util::$ID_UNIDAD,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_CANTIDAD, factura_lote_detalle_util::$CANTIDAD,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_PRECIO, factura_lote_detalle_util::$PRECIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_DESCUENTO_PORCIENTO, factura_lote_detalle_util::$DESCUENTO_PORCIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_DESCUENTO_MONTO, factura_lote_detalle_util::$DESCUENTO_MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_SUB_TOTAL, factura_lote_detalle_util::$SUB_TOTAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_IVA_PORCIENTO, factura_lote_detalle_util::$IVA_PORCIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_IVA_MONTO, factura_lote_detalle_util::$IVA_MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_TOTAL, factura_lote_detalle_util::$TOTAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_RECIBIDO, factura_lote_detalle_util::$RECIBIDO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_OBSERVACION, factura_lote_detalle_util::$OBSERVACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_IMPUESTO2_PORCIENTO, factura_lote_detalle_util::$IMPUESTO2_PORCIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_IMPUESTO2_MONTO, factura_lote_detalle_util::$IMPUESTO2_MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_COTIZACION, factura_lote_detalle_util::$COTIZACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,factura_lote_detalle_util::$LABEL_MONEDA, factura_lote_detalle_util::$MONEDA,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy(' Factura Lote',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Factura Lote',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Bodega',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Bodega',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Unidad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Unidad',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Precio',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descuento Porciento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento Porciento',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descuento Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento Monto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sub Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sub Total',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Iva Porciento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva Porciento',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Iva Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva Monto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
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
	
	public static function getDataReportRow(string $tipo='NORMAL',factura_lote_detalle $factura_lote_detalle,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy(' Factura Lote',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote_detalle->getid_factura_lote_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Bodega',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote_detalle->getid_bodega_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote_detalle->getid_producto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Unidad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote_detalle->getid_unidad_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote_detalle->getcantidad(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote_detalle->getprecio(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descuento Porciento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote_detalle->getdescuento_porciento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descuento Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote_detalle->getdescuento_monto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sub Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote_detalle->getsub_total(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Iva Porciento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote_detalle->getiva_porciento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Iva Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote_detalle->getiva_monto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote_detalle->gettotal(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('No Recibidos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote_detalle->getrecibido(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Observacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($factura_lote_detalle->getobservacion(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getfactura_loteDescripcion(?factura_lote $factura_lote) : string {
		$sDescripcion='none';
		if($factura_lote!==null) {
			$sDescripcion=factura_lote_util::getfactura_loteDescripcion($factura_lote);
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
	
	interface factura_lote_detalle_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $factura_lote_detalles,int $iIdNuevofactura_lote_detalle) : int;	
		public static function getIndiceActual(array $factura_lote_detalles,factura_lote_detalle $factura_lote_detalle,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getfactura_lote_detalleDescripcion(?factura_lote_detalle $factura_lote_detalle) : string {;	
		public static function setfactura_lote_detalleDescripcion(?factura_lote_detalle $factura_lote_detalle,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $factura_lote_detalles) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $factura_lote_detalles);	
		public static function refrescarFKDescripcion(factura_lote_detalle $factura_lote_detalle);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',factura_lote_detalle $factura_lote_detalle,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

