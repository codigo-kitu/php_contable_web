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

namespace com\bydan\contabilidad\inventario\orden_compra_detalle\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\inventario\orden_compra_detalle\business\entity\orden_compra_detalle;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;
use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;

//REL


class orden_compra_detalle_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='orden_compra_detalle';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='inventario.orden_compra_detalles';
	/*'Mantenimientoorden_compra_detalle.jsf';*/
	public static string $STR_MODULO_OPCION='inventario';
	public static string $STR_NOMBRE_CLASE='Mantenimientoorden_compra_detalle.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='orden_compra_detallePersistenceName';
	/*.orden_compra_detalle_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='orden_compra_detalle_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='orden_compra_detalle_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='orden_compra_detalle_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Compras Detalles';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Compras Detalle';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $INVENTARIO='inventario';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $STR_TABLE_NAME='orden_compra_detalle';
	public static string $ORDEN_COMPRA_DETALLE='inv_orden_compra_detalle';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.orden_compra_detalle';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_orden_compra,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_bodega,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_unidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.precio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sub_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.recibido,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto2_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto2_monto from '.orden_compra_detalle_util::$SCHEMA.'.'.orden_compra_detalle_util::$TABLENAME;*/
	
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
	//public $orden_compra_detalleConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_ORDEN_COMPRA='id_orden_compra';
    public static string $ID_BODEGA='id_bodega';
    public static string $ID_PRODUCTO='id_producto';
    public static string $ID_UNIDAD='id_unidad';
    public static string $CANTIDAD='cantidad';
    public static string $PRECIO='precio';
    public static string $SUB_TOTAL='sub_total';
    public static string $DESCUENTO_PORCIENTO='descuento_porciento';
    public static string $DESCUENTO_MONTO='descuento_monto';
    public static string $IVA_PORCIENTO='iva_porciento';
    public static string $IVA_MONTO='iva_monto';
    public static string $TOTAL='total';
    public static string $OBSERVACION='observacion';
    public static string $RECIBIDO='recibido';
    public static string $IMPUESTO2_PORCIENTO='impuesto2_porciento';
    public static string $IMPUESTO2_MONTO='impuesto2_monto';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_ORDEN_COMPRA='Orden Compra';
    public static string $LABEL_ID_BODEGA='Bodega';
    public static string $LABEL_ID_PRODUCTO='Producto';
    public static string $LABEL_ID_UNIDAD='Unidad';
    public static string $LABEL_CANTIDAD='Cantidad';
    public static string $LABEL_PRECIO='Precio';
    public static string $LABEL_SUB_TOTAL='Sub Total';
    public static string $LABEL_DESCUENTO_PORCIENTO='Descuento %';
    public static string $LABEL_DESCUENTO_MONTO='Descuento';
    public static string $LABEL_IVA_PORCIENTO='Iva %';
    public static string $LABEL_IVA_MONTO='Iva';
    public static string $LABEL_TOTAL='Total';
    public static string $LABEL_OBSERVACION='Observacion';
    public static string $LABEL_RECIBIDO='Recibido';
    public static string $LABEL_IMPUESTO2_PORCIENTO='Impuesto2 %';
    public static string $LABEL_IMPUESTO2_MONTO='Impuesto2 Monto';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->orden_compra_detalleConstantesFuncionesAdditional=new $orden_compra_detalleConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $orden_compra_detalles,int $iIdNuevoorden_compra_detalle) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($orden_compra_detalles as $orden_compra_detalleAux) {
			if($orden_compra_detalleAux->getId()==$iIdNuevoorden_compra_detalle) {
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
	
	public static function getIndiceActual(array $orden_compra_detalles,orden_compra_detalle $orden_compra_detalle,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($orden_compra_detalles as $orden_compra_detalleAux) {
			if($orden_compra_detalleAux->getId()==$orden_compra_detalle->getId()) {
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
	public static function getorden_compra_detalleDescripcion(?orden_compra_detalle $orden_compra_detalle) : string {//orden_compra_detalle NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($orden_compra_detalle !=null) {
			/*&& orden_compra_detalle->getId()!=0*/
			
			if($orden_compra_detalle->getId()!=null) {
				$sDescripcion=(string)$orden_compra_detalle->getId();
			}
			
			/*orden_compra_detalle;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setorden_compra_detalleDescripcion(?orden_compra_detalle $orden_compra_detalle,string $sValor) {			
		if($orden_compra_detalle !=null) {
			
			/*orden_compra_detalle;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $orden_compra_detalles) : array {
		$orden_compra_detallesForeignKey=array();
		
		foreach ($orden_compra_detalles as $orden_compra_detalleLocal) {
			$orden_compra_detallesForeignKey[$orden_compra_detalleLocal->getId()]=orden_compra_detalle_util::getorden_compra_detalleDescripcion($orden_compra_detalleLocal);
		}
			
		return $orden_compra_detallesForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_orden_compra() : string  { return 'Orden Compra'; }
    public static function getColumnLabelid_bodega() : string  { return 'Bodega'; }
    public static function getColumnLabelid_producto() : string  { return 'Producto'; }
    public static function getColumnLabelid_unidad() : string  { return 'Unidad'; }
    public static function getColumnLabelcantidad() : string  { return 'Cantidad'; }
    public static function getColumnLabelprecio() : string  { return 'Precio'; }
    public static function getColumnLabelsub_total() : string  { return 'Sub Total'; }
    public static function getColumnLabeldescuento_porciento() : string  { return 'Descuento %'; }
    public static function getColumnLabeldescuento_monto() : string  { return 'Descuento'; }
    public static function getColumnLabeliva_porciento() : string  { return 'Iva %'; }
    public static function getColumnLabeliva_monto() : string  { return 'Iva'; }
    public static function getColumnLabeltotal() : string  { return 'Total'; }
    public static function getColumnLabelobservacion() : string  { return 'Observacion'; }
    public static function getColumnLabelrecibido() : string  { return 'Recibido'; }
    public static function getColumnLabelimpuesto2_porciento() : string  { return 'Impuesto2 %'; }
    public static function getColumnLabelimpuesto2_monto() : string  { return 'Impuesto2 Monto'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $orden_compra_detalles) {		
		try {
			
			$orden_compra_detalle = new orden_compra_detalle();
			
			foreach($orden_compra_detalles as $orden_compra_detalle) {
				
				$orden_compra_detalle->setid_orden_compra_Descripcion(orden_compra_detalle_util::getorden_compraDescripcion($orden_compra_detalle->getorden_compra()));
				$orden_compra_detalle->setid_bodega_Descripcion(orden_compra_detalle_util::getbodegaDescripcion($orden_compra_detalle->getbodega()));
				$orden_compra_detalle->setid_producto_Descripcion(orden_compra_detalle_util::getproductoDescripcion($orden_compra_detalle->getproducto()));
				$orden_compra_detalle->setid_unidad_Descripcion(orden_compra_detalle_util::getunidadDescripcion($orden_compra_detalle->getunidad()));
			}
			
			if($orden_compra_detalle!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(orden_compra_detalle $orden_compra_detalle) {		
		try {
			
			
				$orden_compra_detalle->setid_orden_compra_Descripcion(orden_compra_detalle_util::getorden_compraDescripcion($orden_compra_detalle->getorden_compra()));
				$orden_compra_detalle->setid_bodega_Descripcion(orden_compra_detalle_util::getbodegaDescripcion($orden_compra_detalle->getbodega()));
				$orden_compra_detalle->setid_producto_Descripcion(orden_compra_detalle_util::getproductoDescripcion($orden_compra_detalle->getproducto()));
				$orden_compra_detalle->setid_unidad_Descripcion(orden_compra_detalle_util::getunidadDescripcion($orden_compra_detalle->getunidad()));
							
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
		} else if($sNombreIndice=='FK_Idorden_compra') {
			$sNombreIndice='Tipo=  Por Orden Compra';
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

	public static function getDetalleIndiceFK_Idorden_compra(int $id_orden_compra) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Orden Compra='+$id_orden_compra; 

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
		return orden_compra_detalle_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return orden_compra_detalle_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(orden_compra_detalle_util::$LABEL_ID_ORDEN_COMPRA);
			$reporte->setsDescripcion(orden_compra_detalle_util::$LABEL_ID_ORDEN_COMPRA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(orden_compra_detalle_util::$LABEL_ID_BODEGA);
			$reporte->setsDescripcion(orden_compra_detalle_util::$LABEL_ID_BODEGA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(orden_compra_detalle_util::$LABEL_ID_PRODUCTO);
			$reporte->setsDescripcion(orden_compra_detalle_util::$LABEL_ID_PRODUCTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(orden_compra_detalle_util::$LABEL_ID_UNIDAD);
			$reporte->setsDescripcion(orden_compra_detalle_util::$LABEL_ID_UNIDAD.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(orden_compra_detalle_util::$LABEL_CANTIDAD);
			$reporte->setsDescripcion(orden_compra_detalle_util::$LABEL_CANTIDAD);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(orden_compra_detalle_util::$LABEL_PRECIO);
			$reporte->setsDescripcion(orden_compra_detalle_util::$LABEL_PRECIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(orden_compra_detalle_util::$LABEL_SUB_TOTAL);
			$reporte->setsDescripcion(orden_compra_detalle_util::$LABEL_SUB_TOTAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(orden_compra_detalle_util::$LABEL_DESCUENTO_PORCIENTO);
			$reporte->setsDescripcion(orden_compra_detalle_util::$LABEL_DESCUENTO_PORCIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(orden_compra_detalle_util::$LABEL_DESCUENTO_MONTO);
			$reporte->setsDescripcion(orden_compra_detalle_util::$LABEL_DESCUENTO_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(orden_compra_detalle_util::$LABEL_IVA_PORCIENTO);
			$reporte->setsDescripcion(orden_compra_detalle_util::$LABEL_IVA_PORCIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(orden_compra_detalle_util::$LABEL_IVA_MONTO);
			$reporte->setsDescripcion(orden_compra_detalle_util::$LABEL_IVA_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(orden_compra_detalle_util::$LABEL_TOTAL);
			$reporte->setsDescripcion(orden_compra_detalle_util::$LABEL_TOTAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(orden_compra_detalle_util::$LABEL_OBSERVACION);
			$reporte->setsDescripcion(orden_compra_detalle_util::$LABEL_OBSERVACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(orden_compra_detalle_util::$LABEL_RECIBIDO);
			$reporte->setsDescripcion(orden_compra_detalle_util::$LABEL_RECIBIDO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(orden_compra_detalle_util::$LABEL_IMPUESTO2_PORCIENTO);
			$reporte->setsDescripcion(orden_compra_detalle_util::$LABEL_IMPUESTO2_PORCIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(orden_compra_detalle_util::$LABEL_IMPUESTO2_MONTO);
			$reporte->setsDescripcion(orden_compra_detalle_util::$LABEL_IMPUESTO2_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=orden_compra_detalle_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(orden_compra::$class);
				$classes[]=new Classe(bodega::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(unidad::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==orden_compra::$class) {
						$classes[]=new Classe(orden_compra::$class);
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
					if($clas==orden_compra::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(orden_compra::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_ID, orden_compra_detalle_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_ID_ORDEN_COMPRA, orden_compra_detalle_util::$ID_ORDEN_COMPRA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_ID_BODEGA, orden_compra_detalle_util::$ID_BODEGA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_ID_PRODUCTO, orden_compra_detalle_util::$ID_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_ID_UNIDAD, orden_compra_detalle_util::$ID_UNIDAD,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_CANTIDAD, orden_compra_detalle_util::$CANTIDAD,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_PRECIO, orden_compra_detalle_util::$PRECIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_SUB_TOTAL, orden_compra_detalle_util::$SUB_TOTAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_DESCUENTO_PORCIENTO, orden_compra_detalle_util::$DESCUENTO_PORCIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_DESCUENTO_MONTO, orden_compra_detalle_util::$DESCUENTO_MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_IVA_PORCIENTO, orden_compra_detalle_util::$IVA_PORCIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_IVA_MONTO, orden_compra_detalle_util::$IVA_MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_TOTAL, orden_compra_detalle_util::$TOTAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_OBSERVACION, orden_compra_detalle_util::$OBSERVACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_RECIBIDO, orden_compra_detalle_util::$RECIBIDO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_IMPUESTO2_PORCIENTO, orden_compra_detalle_util::$IMPUESTO2_PORCIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,orden_compra_detalle_util::$LABEL_IMPUESTO2_MONTO, orden_compra_detalle_util::$IMPUESTO2_MONTO,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Orden Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Orden Compra',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
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

		if(Funciones::existeCadenaArrayOrderBy('Sub Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sub Total',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descuento %',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento %',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descuento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
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

		if(Funciones::existeCadenaArrayOrderBy('Observacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Observacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Recibido',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Recibido',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',orden_compra_detalle $orden_compra_detalle,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Orden Compra',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getid_orden_compra_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Bodega',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getid_bodega_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getid_producto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Unidad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getid_unidad_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getcantidad(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Precio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getprecio(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sub Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getsub_total(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descuento %',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getdescuento_porciento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descuento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getdescuento_monto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Iva %',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getiva_porciento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Iva',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getiva_monto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->gettotal(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Observacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getobservacion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Recibido',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($orden_compra_detalle->getrecibido(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getorden_compraDescripcion(?orden_compra $orden_compra) : string {
		$sDescripcion='none';
		if($orden_compra!==null) {
			$sDescripcion=orden_compra_util::getorden_compraDescripcion($orden_compra);
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
	
	interface orden_compra_detalle_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $orden_compra_detalles,int $iIdNuevoorden_compra_detalle) : int;	
		public static function getIndiceActual(array $orden_compra_detalles,orden_compra_detalle $orden_compra_detalle,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getorden_compra_detalleDescripcion(?orden_compra_detalle $orden_compra_detalle) : string {;	
		public static function setorden_compra_detalleDescripcion(?orden_compra_detalle $orden_compra_detalle,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $orden_compra_detalles) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $orden_compra_detalles);	
		public static function refrescarFKDescripcion(orden_compra_detalle $orden_compra_detalle);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',orden_compra_detalle $orden_compra_detalle,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

