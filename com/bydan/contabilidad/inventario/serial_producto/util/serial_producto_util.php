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

namespace com\bydan\contabilidad\inventario\serial_producto\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\inventario\serial_producto\business\entity\serial_producto;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

//REL


class serial_producto_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='serial_producto';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='inventario.serial_productos';
	/*'Mantenimientoserial_producto.jsf';*/
	public static string $STR_MODULO_OPCION='inventario';
	public static string $STR_NOMBRE_CLASE='Mantenimientoserial_producto.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='serial_productoPersistenceName';
	/*.serial_producto_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='serial_producto_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='serial_producto_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='serial_producto_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Seriales Producto';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='';
	public static string $STR_CLASS_WEB_TITULO='Seriales Producto';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $INVENTARIO='inventario';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $STR_TABLE_NAME='serial_producto';
	public static string $SERIAL_PRODUCTO='inv_serial_producto';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.serial_producto';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_serial,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ingresado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.proveedor_mid,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.modulo_ingreso,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_documento_ingreso,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.salida,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cliente_mid,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.modulo_salida,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_bodega,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_item,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_documento_salida,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_items from '.serial_producto_util::$SCHEMA.'.'.serial_producto_util::$TABLENAME;*/
	
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
	//public $serial_productoConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_PRODUCTO='id_producto';
    public static string $NRO_SERIAL='nro_serial';
    public static string $INGRESADO='ingresado';
    public static string $PROVEEDOR_MID='proveedor_mid';
    public static string $MODULO_INGRESO='modulo_ingreso';
    public static string $NRO_DOCUMENTO_INGRESO='nro_documento_ingreso';
    public static string $SALIDA='salida';
    public static string $CLIENTE_MID='cliente_mid';
    public static string $MODULO_SALIDA='modulo_salida';
    public static string $ID_BODEGA='id_bodega';
    public static string $NRO_ITEM='nro_item';
    public static string $NRO_DOCUMENTO_SALIDA='nro_documento_salida';
    public static string $NRO_ITEMS='nro_items';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_PRODUCTO='Producto';
    public static string $LABEL_NRO_SERIAL='Nro Serial';
    public static string $LABEL_INGRESADO='Ingresado';
    public static string $LABEL_PROVEEDOR_MID='Proveedor Mid';
    public static string $LABEL_MODULO_INGRESO='Modulo Ingreso';
    public static string $LABEL_NRO_DOCUMENTO_INGRESO='Nro Documento Ingreso';
    public static string $LABEL_SALIDA='Salida';
    public static string $LABEL_CLIENTE_MID='Cliente Mid';
    public static string $LABEL_MODULO_SALIDA='Modulo Salida';
    public static string $LABEL_ID_BODEGA='Bodega';
    public static string $LABEL_NRO_ITEM='Nro Item';
    public static string $LABEL_NRO_DOCUMENTO_SALIDA='Nro Documento Salida';
    public static string $LABEL_NRO_ITEMS='Nro Items';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->serial_productoConstantesFuncionesAdditional=new $serial_productoConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $serial_productos,int $iIdNuevoserial_producto) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($serial_productos as $serial_productoAux) {
			if($serial_productoAux->getId()==$iIdNuevoserial_producto) {
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
	
	public static function getIndiceActual(array $serial_productos,serial_producto $serial_producto,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($serial_productos as $serial_productoAux) {
			if($serial_productoAux->getId()==$serial_producto->getId()) {
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
	public static function getserial_productoDescripcion(?serial_producto $serial_producto) : string {//serial_producto NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($serial_producto !=null) {
			/*&& serial_producto->getId()!=0*/
			
			$sDescripcion=$serial_producto->getnro_serial();
			
			/*serial_producto;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setserial_productoDescripcion(?serial_producto $serial_producto,string $sValor) {			
		if($serial_producto !=null) {
			$serial_producto->setnro_serial($sValor);
			/*serial_producto;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $serial_productos) : array {
		$serial_productosForeignKey=array();
		
		foreach ($serial_productos as $serial_productoLocal) {
			$serial_productosForeignKey[$serial_productoLocal->getId()]=serial_producto_util::getserial_productoDescripcion($serial_productoLocal);
		}
			
		return $serial_productosForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_producto() : string  { return 'Producto'; }
    public static function getColumnLabelnro_serial() : string  { return 'Nro Serial'; }
    public static function getColumnLabelingresado() : string  { return 'Ingresado'; }
    public static function getColumnLabelproveedor_mid() : string  { return 'Proveedor Mid'; }
    public static function getColumnLabelmodulo_ingreso() : string  { return 'Modulo Ingreso'; }
    public static function getColumnLabelnro_documento_ingreso() : string  { return 'Nro Documento Ingreso'; }
    public static function getColumnLabelsalida() : string  { return 'Salida'; }
    public static function getColumnLabelcliente_mid() : string  { return 'Cliente Mid'; }
    public static function getColumnLabelmodulo_salida() : string  { return 'Modulo Salida'; }
    public static function getColumnLabelid_bodega() : string  { return 'Bodega'; }
    public static function getColumnLabelnro_item() : string  { return 'Nro Item'; }
    public static function getColumnLabelnro_documento_salida() : string  { return 'Nro Documento Salida'; }
    public static function getColumnLabelnro_items() : string  { return 'Nro Items'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $serial_productos) {		
		try {
			
			$serial_producto = new serial_producto();
			
			foreach($serial_productos as $serial_producto) {
				
				$serial_producto->setid_producto_Descripcion(serial_producto_util::getproductoDescripcion($serial_producto->getproducto()));
				$serial_producto->setid_bodega_Descripcion(serial_producto_util::getbodegaDescripcion($serial_producto->getbodega()));
			}
			
			if($serial_producto!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(serial_producto $serial_producto) {		
		try {
			
			
				$serial_producto->setid_producto_Descripcion(serial_producto_util::getproductoDescripcion($serial_producto->getproducto()));
				$serial_producto->setid_bodega_Descripcion(serial_producto_util::getbodegaDescripcion($serial_producto->getbodega()));
							
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
		} else if($sNombreIndice=='FK_Idproducto') {
			$sNombreIndice='Tipo=  Por Producto';
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

	public static function getDetalleIndiceFK_Idproducto(int $id_producto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Producto='+$id_producto; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return serial_producto_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return serial_producto_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(serial_producto_util::$LABEL_ID_PRODUCTO);
			$reporte->setsDescripcion(serial_producto_util::$LABEL_ID_PRODUCTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(serial_producto_util::$LABEL_NRO_SERIAL);
			$reporte->setsDescripcion(serial_producto_util::$LABEL_NRO_SERIAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(serial_producto_util::$LABEL_INGRESADO);
			$reporte->setsDescripcion(serial_producto_util::$LABEL_INGRESADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(serial_producto_util::$LABEL_PROVEEDOR_MID);
			$reporte->setsDescripcion(serial_producto_util::$LABEL_PROVEEDOR_MID);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(serial_producto_util::$LABEL_MODULO_INGRESO);
			$reporte->setsDescripcion(serial_producto_util::$LABEL_MODULO_INGRESO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(serial_producto_util::$LABEL_NRO_DOCUMENTO_INGRESO);
			$reporte->setsDescripcion(serial_producto_util::$LABEL_NRO_DOCUMENTO_INGRESO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(serial_producto_util::$LABEL_SALIDA);
			$reporte->setsDescripcion(serial_producto_util::$LABEL_SALIDA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(serial_producto_util::$LABEL_CLIENTE_MID);
			$reporte->setsDescripcion(serial_producto_util::$LABEL_CLIENTE_MID);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(serial_producto_util::$LABEL_MODULO_SALIDA);
			$reporte->setsDescripcion(serial_producto_util::$LABEL_MODULO_SALIDA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(serial_producto_util::$LABEL_ID_BODEGA);
			$reporte->setsDescripcion(serial_producto_util::$LABEL_ID_BODEGA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(serial_producto_util::$LABEL_NRO_ITEM);
			$reporte->setsDescripcion(serial_producto_util::$LABEL_NRO_ITEM);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(serial_producto_util::$LABEL_NRO_DOCUMENTO_SALIDA);
			$reporte->setsDescripcion(serial_producto_util::$LABEL_NRO_DOCUMENTO_SALIDA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(serial_producto_util::$LABEL_NRO_ITEMS);
			$reporte->setsDescripcion(serial_producto_util::$LABEL_NRO_ITEMS);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=serial_producto_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
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
				
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(bodega::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==bodega::$class) {
						$classes[]=new Classe(bodega::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

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
					if($clas==bodega::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(bodega::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,serial_producto_util::$LABEL_ID, serial_producto_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,serial_producto_util::$LABEL_ID_PRODUCTO, serial_producto_util::$ID_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,serial_producto_util::$LABEL_NRO_SERIAL, serial_producto_util::$NRO_SERIAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,serial_producto_util::$LABEL_INGRESADO, serial_producto_util::$INGRESADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,serial_producto_util::$LABEL_PROVEEDOR_MID, serial_producto_util::$PROVEEDOR_MID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,serial_producto_util::$LABEL_MODULO_INGRESO, serial_producto_util::$MODULO_INGRESO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,serial_producto_util::$LABEL_NRO_DOCUMENTO_INGRESO, serial_producto_util::$NRO_DOCUMENTO_INGRESO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,serial_producto_util::$LABEL_SALIDA, serial_producto_util::$SALIDA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,serial_producto_util::$LABEL_CLIENTE_MID, serial_producto_util::$CLIENTE_MID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,serial_producto_util::$LABEL_MODULO_SALIDA, serial_producto_util::$MODULO_SALIDA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,serial_producto_util::$LABEL_ID_BODEGA, serial_producto_util::$ID_BODEGA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,serial_producto_util::$LABEL_NRO_ITEM, serial_producto_util::$NRO_ITEM,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,serial_producto_util::$LABEL_NRO_DOCUMENTO_SALIDA, serial_producto_util::$NRO_DOCUMENTO_SALIDA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,serial_producto_util::$LABEL_NRO_ITEMS, serial_producto_util::$NRO_ITEMS,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Serial',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Serial',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ingresado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ingresado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Proveedor Mid',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Proveedor Mid',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modulo Ingreso',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modulo Ingreso',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Documento Ingreso',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Documento Ingreso',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Salida',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Salida',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cliente Mid',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cliente Mid',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modulo Salida',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Modulo Salida',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Bodega',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Bodega',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Item',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Item',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Documento Salida',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Documento Salida',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Items',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Items',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',serial_producto $serial_producto,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($serial_producto->getid_producto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Serial',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($serial_producto->getnro_serial(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ingresado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($serial_producto->getingresado(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Proveedor Mid',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($serial_producto->getproveedor_mid(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modulo Ingreso',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($serial_producto->getmodulo_ingreso(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Documento Ingreso',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($serial_producto->getnro_documento_ingreso(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Salida',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($serial_producto->getsalida(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cliente Mid',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($serial_producto->getcliente_mid(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Modulo Salida',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($serial_producto->getmodulo_salida(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Bodega',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($serial_producto->getid_bodega_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Item',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($serial_producto->getnro_item(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Documento Salida',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($serial_producto->getnro_documento_salida(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Items',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($serial_producto->getnro_items(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getproductoDescripcion(?producto $producto) : string {
		$sDescripcion='none';
		if($producto!==null) {
			$sDescripcion=producto_util::getproductoDescripcion($producto);
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
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface serial_producto_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $serial_productos,int $iIdNuevoserial_producto) : int;	
		public static function getIndiceActual(array $serial_productos,serial_producto $serial_producto,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getserial_productoDescripcion(?serial_producto $serial_producto) : string {;	
		public static function setserial_productoDescripcion(?serial_producto $serial_producto,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $serial_productos) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $serial_productos);	
		public static function refrescarFKDescripcion(serial_producto $serial_producto);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',serial_producto $serial_producto,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

