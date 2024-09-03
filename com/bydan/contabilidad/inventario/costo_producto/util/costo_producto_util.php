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

namespace com\bydan\contabilidad\inventario\costo_producto\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\inventario\costo_producto\business\entity\costo_producto;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;
use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;
use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;
use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;
use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\general\tabla\business\entity\tabla;
use com\bydan\contabilidad\general\tabla\util\tabla_util;

//REL


class costo_producto_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='costo_producto';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='inventario.costo_productos';
	/*'Mantenimientocosto_producto.jsf';*/
	public static string $STR_MODULO_OPCION='inventario';
	public static string $STR_NOMBRE_CLASE='Mantenimientocosto_producto.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='costo_productoPersistenceName';
	/*.costo_producto_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='costo_producto_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='costo_producto_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='costo_producto_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Costo Productos';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Costo Producto';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $INVENTARIO='inventario';
	public static string $STR_PREFIJO_TABLE='inv_';
	public static string $STR_TABLE_NAME='costo_producto';
	public static string $COSTO_PRODUCTO='inv_costo_producto';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.costo_producto';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_tabla,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.idn_origen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.idn_detalle_origen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nro_documento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.costo_unitario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.costo_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cantidad_origen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.costo_unitario_origen,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.costo_total_origen from '.costo_producto_util::$SCHEMA.'.'.costo_producto_util::$TABLENAME;*/
	
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
	//public $costo_productoConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_SUCURSAL='id_sucursal';
    public static string $ID_EJERCICIO='id_ejercicio';
    public static string $ID_PERIODO='id_periodo';
    public static string $ID_USUARIO='id_usuario';
    public static string $ID_PRODUCTO='id_producto';
    public static string $ID_TABLA='id_tabla';
    public static string $IDN_ORIGEN='idn_origen';
    public static string $IDN_DETALLE_ORIGEN='idn_detalle_origen';
    public static string $NRO_DOCUMENTO='nro_documento';
    public static string $FECHA='fecha';
    public static string $CANTIDAD='cantidad';
    public static string $COSTO_UNITARIO='costo_unitario';
    public static string $COSTO_TOTAL='costo_total';
    public static string $CANTIDAD_ORIGEN='cantidad_origen';
    public static string $COSTO_UNITARIO_ORIGEN='costo_unitario_origen';
    public static string $COSTO_TOTAL_ORIGEN='costo_total_origen';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_ID_SUCURSAL='Sucursal';
    public static string $LABEL_ID_EJERCICIO='Ejercicio';
    public static string $LABEL_ID_PERIODO='Periodo';
    public static string $LABEL_ID_USUARIO='Usuario';
    public static string $LABEL_ID_PRODUCTO=' Producto';
    public static string $LABEL_ID_TABLA='Tabla';
    public static string $LABEL_IDN_ORIGEN='Id Origen';
    public static string $LABEL_IDN_DETALLE_ORIGEN='Idn Detalle Origen';
    public static string $LABEL_NRO_DOCUMENTO='Nro Documento';
    public static string $LABEL_FECHA='Fecha';
    public static string $LABEL_CANTIDAD='Cantidad';
    public static string $LABEL_COSTO_UNITARIO='Costo Unitario';
    public static string $LABEL_COSTO_TOTAL='Costo Total';
    public static string $LABEL_CANTIDAD_ORIGEN='Cantidad Origen';
    public static string $LABEL_COSTO_UNITARIO_ORIGEN='Costo Unitario Origen';
    public static string $LABEL_COSTO_TOTAL_ORIGEN='Costo Total Origen';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->costo_productoConstantesFuncionesAdditional=new $costo_productoConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $costo_productos,int $iIdNuevocosto_producto) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($costo_productos as $costo_productoAux) {
			if($costo_productoAux->getId()==$iIdNuevocosto_producto) {
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
	
	public static function getIndiceActual(array $costo_productos,costo_producto $costo_producto,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($costo_productos as $costo_productoAux) {
			if($costo_productoAux->getId()==$costo_producto->getId()) {
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
	public static function getcosto_productoDescripcion(?costo_producto $costo_producto) : string {//costo_producto NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($costo_producto !=null) {
			/*&& costo_producto->getId()!=0*/
			
			if($costo_producto->getId()!=null) {
				$sDescripcion=(string)$costo_producto->getId();
			}
			
			/*costo_producto;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setcosto_productoDescripcion(?costo_producto $costo_producto,string $sValor) {			
		if($costo_producto !=null) {
			
			/*costo_producto;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $costo_productos) : array {
		$costo_productosForeignKey=array();
		
		foreach ($costo_productos as $costo_productoLocal) {
			$costo_productosForeignKey[$costo_productoLocal->getId()]=costo_producto_util::getcosto_productoDescripcion($costo_productoLocal);
		}
			
		return $costo_productosForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelid_sucursal() : string  { return 'Sucursal'; }
    public static function getColumnLabelid_ejercicio() : string  { return 'Ejercicio'; }
    public static function getColumnLabelid_periodo() : string  { return 'Periodo'; }
    public static function getColumnLabelid_usuario() : string  { return 'Usuario'; }
    public static function getColumnLabelid_producto() : string  { return ' Producto'; }
    public static function getColumnLabelid_tabla() : string  { return 'Tabla'; }
    public static function getColumnLabelidn_origen() : string  { return 'Id Origen'; }
    public static function getColumnLabelidn_detalle_origen() : string  { return 'Idn Detalle Origen'; }
    public static function getColumnLabelnro_documento() : string  { return 'Nro Documento'; }
    public static function getColumnLabelfecha() : string  { return 'Fecha'; }
    public static function getColumnLabelcantidad() : string  { return 'Cantidad'; }
    public static function getColumnLabelcosto_unitario() : string  { return 'Costo Unitario'; }
    public static function getColumnLabelcosto_total() : string  { return 'Costo Total'; }
    public static function getColumnLabelcantidad_origen() : string  { return 'Cantidad Origen'; }
    public static function getColumnLabelcosto_unitario_origen() : string  { return 'Costo Unitario Origen'; }
    public static function getColumnLabelcosto_total_origen() : string  { return 'Costo Total Origen'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $costo_productos) {		
		try {
			
			$costo_producto = new costo_producto();
			
			foreach($costo_productos as $costo_producto) {
				
				$costo_producto->setid_empresa_Descripcion(costo_producto_util::getempresaDescripcion($costo_producto->getempresa()));
				$costo_producto->setid_sucursal_Descripcion(costo_producto_util::getsucursalDescripcion($costo_producto->getsucursal()));
				$costo_producto->setid_ejercicio_Descripcion(costo_producto_util::getejercicioDescripcion($costo_producto->getejercicio()));
				$costo_producto->setid_periodo_Descripcion(costo_producto_util::getperiodoDescripcion($costo_producto->getperiodo()));
				$costo_producto->setid_usuario_Descripcion(costo_producto_util::getusuarioDescripcion($costo_producto->getusuario()));
				$costo_producto->setid_producto_Descripcion(costo_producto_util::getproductoDescripcion($costo_producto->getproducto()));
				$costo_producto->setid_tabla_Descripcion(costo_producto_util::gettablaDescripcion($costo_producto->gettabla()));
			}
			
			if($costo_producto!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(costo_producto $costo_producto) {		
		try {
			
			
				$costo_producto->setid_empresa_Descripcion(costo_producto_util::getempresaDescripcion($costo_producto->getempresa()));
				$costo_producto->setid_sucursal_Descripcion(costo_producto_util::getsucursalDescripcion($costo_producto->getsucursal()));
				$costo_producto->setid_ejercicio_Descripcion(costo_producto_util::getejercicioDescripcion($costo_producto->getejercicio()));
				$costo_producto->setid_periodo_Descripcion(costo_producto_util::getperiodoDescripcion($costo_producto->getperiodo()));
				$costo_producto->setid_usuario_Descripcion(costo_producto_util::getusuarioDescripcion($costo_producto->getusuario()));
				$costo_producto->setid_producto_Descripcion(costo_producto_util::getproductoDescripcion($costo_producto->getproducto()));
				$costo_producto->setid_tabla_Descripcion(costo_producto_util::gettablaDescripcion($costo_producto->gettabla()));
							
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
		} else if($sNombreIndice=='FK_Idejercicio') {
			$sNombreIndice='Tipo=  Por Ejercicio';
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por Empresa';
		} else if($sNombreIndice=='FK_Idperiodo') {
			$sNombreIndice='Tipo=  Por Periodo';
		} else if($sNombreIndice=='FK_Idproducto') {
			$sNombreIndice='Tipo=  Por  Producto';
		} else if($sNombreIndice=='FK_Idsucursal') {
			$sNombreIndice='Tipo=  Por Sucursal';
		} else if($sNombreIndice=='FK_Idtabla') {
			$sNombreIndice='Tipo=  Por Tabla';
		} else if($sNombreIndice=='FK_Idusuario') {
			$sNombreIndice='Tipo=  Por Usuario';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idejercicio(int $id_ejercicio) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Ejercicio='+$id_ejercicio; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idperiodo(int $id_periodo) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Periodo='+$id_periodo; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idproducto(int $id_producto) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Producto='+$id_producto; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idsucursal(int $id_sucursal) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Sucursal='+$id_sucursal; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtabla(int $id_tabla) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Tabla='+$id_tabla; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idusuario(int $id_usuario) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Usuario='+$id_usuario; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return costo_producto_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return costo_producto_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_ID_SUCURSAL);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_ID_SUCURSAL.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_ID_EJERCICIO);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_ID_EJERCICIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_ID_PERIODO);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_ID_PERIODO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_ID_USUARIO);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_ID_USUARIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_ID_PRODUCTO);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_ID_PRODUCTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_ID_TABLA);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_ID_TABLA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_IDN_ORIGEN);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_IDN_ORIGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_IDN_DETALLE_ORIGEN);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_IDN_DETALLE_ORIGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_NRO_DOCUMENTO);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_NRO_DOCUMENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_FECHA);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_FECHA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_CANTIDAD);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_CANTIDAD);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_COSTO_UNITARIO);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_COSTO_UNITARIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_COSTO_TOTAL);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_COSTO_TOTAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_CANTIDAD_ORIGEN);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_CANTIDAD_ORIGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_COSTO_UNITARIO_ORIGEN);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_COSTO_UNITARIO_ORIGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(costo_producto_util::$LABEL_COSTO_TOTAL_ORIGEN);
			$reporte->setsDescripcion(costo_producto_util::$LABEL_COSTO_TOTAL_ORIGEN);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=costo_producto_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==costo_producto_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=costo_producto_util::$ID_EMPRESA;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==costo_producto_util::$ID_SUCURSAL) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=costo_producto_util::$ID_SUCURSAL;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==costo_producto_util::$ID_EJERCICIO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=costo_producto_util::$ID_EJERCICIO;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==costo_producto_util::$ID_PERIODO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=costo_producto_util::$ID_PERIODO;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==costo_producto_util::$ID_USUARIO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=costo_producto_util::$ID_USUARIO;
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
				
				$classes[]=new Classe(empresa::$class);
				$classes[]=new Classe(sucursal::$class);
				$classes[]=new Classe(ejercicio::$class);
				$classes[]=new Classe(periodo::$class);
				$classes[]=new Classe(usuario::$class);
				$classes[]=new Classe(producto::$class);
				$classes[]=new Classe(tabla::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==sucursal::$class) {
						$classes[]=new Classe(sucursal::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==ejercicio::$class) {
						$classes[]=new Classe(ejercicio::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==periodo::$class) {
						$classes[]=new Classe(periodo::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==usuario::$class) {
						$classes[]=new Classe(usuario::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==producto::$class) {
						$classes[]=new Classe(producto::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==tabla::$class) {
						$classes[]=new Classe(tabla::$class);
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {					
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(empresa::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==sucursal::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(sucursal::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==ejercicio::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(ejercicio::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==periodo::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(periodo::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==usuario::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(usuario::$class);
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
					if($clas==tabla::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(tabla::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_ID, costo_producto_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_ID_EMPRESA, costo_producto_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_ID_SUCURSAL, costo_producto_util::$ID_SUCURSAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_ID_EJERCICIO, costo_producto_util::$ID_EJERCICIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_ID_PERIODO, costo_producto_util::$ID_PERIODO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_ID_USUARIO, costo_producto_util::$ID_USUARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_ID_PRODUCTO, costo_producto_util::$ID_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_ID_TABLA, costo_producto_util::$ID_TABLA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_IDN_ORIGEN, costo_producto_util::$IDN_ORIGEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_IDN_DETALLE_ORIGEN, costo_producto_util::$IDN_DETALLE_ORIGEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_NRO_DOCUMENTO, costo_producto_util::$NRO_DOCUMENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_FECHA, costo_producto_util::$FECHA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_CANTIDAD, costo_producto_util::$CANTIDAD,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_COSTO_UNITARIO, costo_producto_util::$COSTO_UNITARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_COSTO_TOTAL, costo_producto_util::$COSTO_TOTAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_CANTIDAD_ORIGEN, costo_producto_util::$CANTIDAD_ORIGEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_COSTO_UNITARIO_ORIGEN, costo_producto_util::$COSTO_UNITARIO_ORIGEN,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,costo_producto_util::$LABEL_COSTO_TOTAL_ORIGEN, costo_producto_util::$COSTO_TOTAL_ORIGEN,false,""); $arrOrderBy[]=$orderBy;
		
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
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Empresa',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sucursal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sucursal',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ejercicio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ejercicio',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Periodo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Periodo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Usuario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tabla',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Tabla',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Id Origen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Id Origen',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Idn Detalle Origen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Idn Detalle Origen',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Documento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nro Documento',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Costo Unitario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Costo Unitario',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Costo Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Costo Total',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad Origen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cantidad Origen',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Costo Unitario Origen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Costo Unitario Origen',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Costo Total Origen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Costo Total Origen',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',costo_producto $costo_producto,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sucursal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getid_sucursal_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ejercicio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getid_ejercicio_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Periodo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getid_periodo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getid_usuario_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getid_producto_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Tabla',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getid_tabla_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Id Origen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getidn_origen(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Idn Detalle Origen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getidn_detalle_origen(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nro Documento',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getnro_documento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getfecha(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getcantidad(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Costo Unitario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getcosto_unitario(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Costo Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getcosto_total(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cantidad Origen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getcantidad_origen(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Costo Unitario Origen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getcosto_unitario_origen(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Costo Total Origen',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($costo_producto->getcosto_total_origen(),40,6,1); $row[]=$cellReport;
		}
		
		return $row;
	}		
	
	/*XML DESCRIPCION*/
	
	public static function getempresaDescripcion(?empresa $empresa) : string {
		$sDescripcion='none';
		if($empresa!==null) {
			$sDescripcion=empresa_util::getempresaDescripcion($empresa);
		}
		return $sDescripcion;
	}	
	
	public static function getsucursalDescripcion(?sucursal $sucursal) : string {
		$sDescripcion='none';
		if($sucursal!==null) {
			$sDescripcion=sucursal_util::getsucursalDescripcion($sucursal);
		}
		return $sDescripcion;
	}	
	
	public static function getejercicioDescripcion(?ejercicio $ejercicio) : string {
		$sDescripcion='none';
		if($ejercicio!==null) {
			$sDescripcion=ejercicio_util::getejercicioDescripcion($ejercicio);
		}
		return $sDescripcion;
	}	
	
	public static function getperiodoDescripcion(?periodo $periodo) : string {
		$sDescripcion='none';
		if($periodo!==null) {
			$sDescripcion=periodo_util::getperiodoDescripcion($periodo);
		}
		return $sDescripcion;
	}	
	
	public static function getusuarioDescripcion(?usuario $usuario) : string {
		$sDescripcion='none';
		if($usuario!==null) {
			$sDescripcion=usuario_util::getusuarioDescripcion($usuario);
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
	
	public static function gettablaDescripcion(?tabla $tabla) : string {
		$sDescripcion='none';
		if($tabla!==null) {
			$sDescripcion=tabla_util::gettablaDescripcion($tabla);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface costo_producto_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $costo_productos,int $iIdNuevocosto_producto) : int;	
		public static function getIndiceActual(array $costo_productos,costo_producto $costo_producto,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getcosto_productoDescripcion(?costo_producto $costo_producto) : string {;	
		public static function setcosto_productoDescripcion(?costo_producto $costo_producto,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $costo_productos) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $costo_productos);	
		public static function refrescarFKDescripcion(costo_producto $costo_producto);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',costo_producto $costo_producto,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

