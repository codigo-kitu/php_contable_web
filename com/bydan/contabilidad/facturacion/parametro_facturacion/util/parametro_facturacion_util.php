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

namespace com\bydan\contabilidad\facturacion\parametro_facturacion\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\facturacion\parametro_facturacion\business\entity\parametro_facturacion;


use com\bydan\framework\contabilidad\business\entity\GeneralEntityConstantesFunciones;

//FK

use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

//REL


class parametro_facturacion_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='parametro_facturacion';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='facturacion.parametro_facturacions';
	/*'Mantenimientoparametro_facturacion.jsf';*/
	public static string $STR_MODULO_OPCION='facturacion';
	public static string $STR_NOMBRE_CLASE='Mantenimientoparametro_facturacion.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='parametro_facturacionPersistenceName';
	/*.parametro_facturacion_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='parametro_facturacion_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='parametro_facturacion_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='parametro_facturacion_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Parametro Facturacions';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Parametro Facturacion';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $FACTURACION='facturacion';
	public static string $STR_PREFIJO_TABLE='fac_';
	public static string $STR_TABLE_NAME='parametro_facturacion';
	public static string $PARAMETRO_FACTURACION='fac_parametro_facturacion';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.parametro_facturacion';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento_factura,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.solo_costo_producto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_factura_lote,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento_factura_lote,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_devolucion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento_devolucion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_termino_pago_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_estimado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_estimado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento_estimado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.solo_costo_producto_estimado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_consignacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_consignacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento_consignacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.solo_costo_producto_consignacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_recibo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.nombre_recibo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero_recibo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.incremento_recibo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.con_impuesto_recibo from '.parametro_facturacion_util::$SCHEMA.'.'.parametro_facturacion_util::$TABLENAME;*/
	
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
	//public $parametro_facturacionConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $NOMBRE_FACTURA='nombre_factura';
    public static string $NUMERO_FACTURA='numero_factura';
    public static string $INCREMENTO_FACTURA='incremento_factura';
    public static string $SOLO_COSTO_PRODUCTO='solo_costo_producto';
    public static string $NUMERO_FACTURA_LOTE='numero_factura_lote';
    public static string $INCREMENTO_FACTURA_LOTE='incremento_factura_lote';
    public static string $NUMERO_DEVOLUCION='numero_devolucion';
    public static string $INCREMENTO_DEVOLUCION='incremento_devolucion';
    public static string $ID_TERMINO_PAGO_CLIENTE='id_termino_pago_cliente';
    public static string $NOMBRE_ESTIMADO='nombre_estimado';
    public static string $NUMERO_ESTIMADO='numero_estimado';
    public static string $INCREMENTO_ESTIMADO='incremento_estimado';
    public static string $SOLO_COSTO_PRODUCTO_ESTIMADO='solo_costo_producto_estimado';
    public static string $NOMBRE_CONSIGNACION='nombre_consignacion';
    public static string $NUMERO_CONSIGNACION='numero_consignacion';
    public static string $INCREMENTO_CONSIGNACION='incremento_consignacion';
    public static string $SOLO_COSTO_PRODUCTO_CONSIGNACION='solo_costo_producto_consignacion';
    public static string $CON_RECIBO='con_recibo';
    public static string $NOMBRE_RECIBO='nombre_recibo';
    public static string $NUMERO_RECIBO='numero_recibo';
    public static string $INCREMENTO_RECIBO='incremento_recibo';
    public static string $CON_IMPUESTO_RECIBO='con_impuesto_recibo';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_NOMBRE_FACTURA='Nombre Factura';
    public static string $LABEL_NUMERO_FACTURA='Numero Factura';
    public static string $LABEL_INCREMENTO_FACTURA='Incremento Factura';
    public static string $LABEL_SOLO_COSTO_PRODUCTO='Solo Costo Producto';
    public static string $LABEL_NUMERO_FACTURA_LOTE='Numero Factura Lote';
    public static string $LABEL_INCREMENTO_FACTURA_LOTE='Incremento Factura Lote';
    public static string $LABEL_NUMERO_DEVOLUCION='Numero Devolucion';
    public static string $LABEL_INCREMENTO_DEVOLUCION='Incremento Devolucion';
    public static string $LABEL_ID_TERMINO_PAGO_CLIENTE=' Termino Pago';
    public static string $LABEL_NOMBRE_ESTIMADO='Nombre Estimado';
    public static string $LABEL_NUMERO_ESTIMADO='Numero Estimado';
    public static string $LABEL_INCREMENTO_ESTIMADO='Incremento Estimado';
    public static string $LABEL_SOLO_COSTO_PRODUCTO_ESTIMADO='Solo Costo Producto Estimado';
    public static string $LABEL_NOMBRE_CONSIGNACION='Nombre Consignacion';
    public static string $LABEL_NUMERO_CONSIGNACION='Numero Consignacion';
    public static string $LABEL_INCREMENTO_CONSIGNACION='Incremento Consignacion';
    public static string $LABEL_SOLO_COSTO_PRODUCTO_CONSIGNACION='Solo Costo Producto Consignacion';
    public static string $LABEL_CON_RECIBO='Con Recibo';
    public static string $LABEL_NOMBRE_RECIBO='Nombre Recibo';
    public static string $LABEL_NUMERO_RECIBO='Numero Recibo';
    public static string $LABEL_INCREMENTO_RECIBO='Incremento Recibos';
    public static string $LABEL_CON_IMPUESTO_RECIBO='Con Impuesto Recibo';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_facturacionConstantesFuncionesAdditional=new $parametro_facturacionConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $parametro_facturacions,int $iIdNuevoparametro_facturacion) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($parametro_facturacions as $parametro_facturacionAux) {
			if($parametro_facturacionAux->getId()==$iIdNuevoparametro_facturacion) {
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
	
	public static function getIndiceActual(array $parametro_facturacions,parametro_facturacion $parametro_facturacion,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($parametro_facturacions as $parametro_facturacionAux) {
			if($parametro_facturacionAux->getId()==$parametro_facturacion->getId()) {
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
	public static function getparametro_facturacionDescripcion(?parametro_facturacion $parametro_facturacion) : string {//parametro_facturacion NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($parametro_facturacion !=null) {
			/*&& parametro_facturacion->getId()!=0*/
			
			$sDescripcion=$parametro_facturacion->getnombre_factura();
			
			/*parametro_facturacion;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setparametro_facturacionDescripcion(?parametro_facturacion $parametro_facturacion,string $sValor) {			
		if($parametro_facturacion !=null) {
			$parametro_facturacion->setnombre_factura($sValor);
			/*parametro_facturacion;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $parametro_facturacions) : array {
		$parametro_facturacionsForeignKey=array();
		
		foreach ($parametro_facturacions as $parametro_facturacionLocal) {
			$parametro_facturacionsForeignKey[$parametro_facturacionLocal->getId()]=parametro_facturacion_util::getparametro_facturacionDescripcion($parametro_facturacionLocal);
		}
			
		return $parametro_facturacionsForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelnombre_factura() : string  { return 'Nombre Factura'; }
    public static function getColumnLabelnumero_factura() : string  { return 'Numero Factura'; }
    public static function getColumnLabelincremento_factura() : string  { return 'Incremento Factura'; }
    public static function getColumnLabelsolo_costo_producto() : string  { return 'Solo Costo Producto'; }
    public static function getColumnLabelnumero_factura_lote() : string  { return 'Numero Factura Lote'; }
    public static function getColumnLabelincremento_factura_lote() : string  { return 'Incremento Factura Lote'; }
    public static function getColumnLabelnumero_devolucion() : string  { return 'Numero Devolucion'; }
    public static function getColumnLabelincremento_devolucion() : string  { return 'Incremento Devolucion'; }
    public static function getColumnLabelid_termino_pago_cliente() : string  { return ' Termino Pago'; }
    public static function getColumnLabelnombre_estimado() : string  { return 'Nombre Estimado'; }
    public static function getColumnLabelnumero_estimado() : string  { return 'Numero Estimado'; }
    public static function getColumnLabelincremento_estimado() : string  { return 'Incremento Estimado'; }
    public static function getColumnLabelsolo_costo_producto_estimado() : string  { return 'Solo Costo Producto Estimado'; }
    public static function getColumnLabelnombre_consignacion() : string  { return 'Nombre Consignacion'; }
    public static function getColumnLabelnumero_consignacion() : string  { return 'Numero Consignacion'; }
    public static function getColumnLabelincremento_consignacion() : string  { return 'Incremento Consignacion'; }
    public static function getColumnLabelsolo_costo_producto_consignacion() : string  { return 'Solo Costo Producto Consignacion'; }
    public static function getColumnLabelcon_recibo() : string  { return 'Con Recibo'; }
    public static function getColumnLabelnombre_recibo() : string  { return 'Nombre Recibo'; }
    public static function getColumnLabelnumero_recibo() : string  { return 'Numero Recibo'; }
    public static function getColumnLabelincremento_recibo() : string  { return 'Incremento Recibos'; }
    public static function getColumnLabelcon_impuesto_recibo() : string  { return 'Con Impuesto Recibo'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getsolo_costo_productoDescripcion($parametro_facturacion) {
		$sDescripcion='Verdadero';
		if(!$parametro_facturacion->getsolo_costo_producto()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getsolo_costo_producto_estimadoDescripcion($parametro_facturacion) {
		$sDescripcion='Verdadero';
		if(!$parametro_facturacion->getsolo_costo_producto_estimado()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getsolo_costo_producto_consignacionDescripcion($parametro_facturacion) {
		$sDescripcion='Verdadero';
		if(!$parametro_facturacion->getsolo_costo_producto_consignacion()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_reciboDescripcion($parametro_facturacion) {
		$sDescripcion='Verdadero';
		if(!$parametro_facturacion->getcon_recibo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
		
	public static function getcon_impuesto_reciboDescripcion($parametro_facturacion) {
		$sDescripcion='Verdadero';
		if(!$parametro_facturacion->getcon_impuesto_recibo()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $parametro_facturacions) {		
		try {
			
			$parametro_facturacion = new parametro_facturacion();
			
			foreach($parametro_facturacions as $parametro_facturacion) {
				
				$parametro_facturacion->setid_empresa_Descripcion(parametro_facturacion_util::getempresaDescripcion($parametro_facturacion->getempresa()));
				$parametro_facturacion->setid_termino_pago_cliente_Descripcion(parametro_facturacion_util::gettermino_pago_clienteDescripcion($parametro_facturacion->gettermino_pago_cliente()));
			}
			
			if($parametro_facturacion!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(parametro_facturacion $parametro_facturacion) {		
		try {
			
			
				$parametro_facturacion->setid_empresa_Descripcion(parametro_facturacion_util::getempresaDescripcion($parametro_facturacion->getempresa()));
				$parametro_facturacion->setid_termino_pago_cliente_Descripcion(parametro_facturacion_util::gettermino_pago_clienteDescripcion($parametro_facturacion->gettermino_pago_cliente()));
							
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
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por Empresa';
		} else if($sNombreIndice=='FK_Idtermino_pago') {
			$sNombreIndice='Tipo=  Por  Termino Pago';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idempresa(int $id_empresa) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Empresa='+$id_empresa; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtermino_pago(int $id_termino_pago_cliente) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de  Termino Pago='+$id_termino_pago_cliente; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return parametro_facturacion_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return parametro_facturacion_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_NOMBRE_FACTURA);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_NOMBRE_FACTURA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_NUMERO_FACTURA);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_NUMERO_FACTURA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_INCREMENTO_FACTURA);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_INCREMENTO_FACTURA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_SOLO_COSTO_PRODUCTO);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_SOLO_COSTO_PRODUCTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_NUMERO_FACTURA_LOTE);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_NUMERO_FACTURA_LOTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_INCREMENTO_FACTURA_LOTE);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_INCREMENTO_FACTURA_LOTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_NUMERO_DEVOLUCION);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_NUMERO_DEVOLUCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_INCREMENTO_DEVOLUCION);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_INCREMENTO_DEVOLUCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_ID_TERMINO_PAGO_CLIENTE);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_ID_TERMINO_PAGO_CLIENTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_NOMBRE_ESTIMADO);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_NOMBRE_ESTIMADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_NUMERO_ESTIMADO);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_NUMERO_ESTIMADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_INCREMENTO_ESTIMADO);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_INCREMENTO_ESTIMADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_SOLO_COSTO_PRODUCTO_ESTIMADO);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_SOLO_COSTO_PRODUCTO_ESTIMADO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_NOMBRE_CONSIGNACION);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_NOMBRE_CONSIGNACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_NUMERO_CONSIGNACION);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_NUMERO_CONSIGNACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_INCREMENTO_CONSIGNACION);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_INCREMENTO_CONSIGNACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_SOLO_COSTO_PRODUCTO_CONSIGNACION);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_SOLO_COSTO_PRODUCTO_CONSIGNACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_CON_RECIBO);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_CON_RECIBO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_NOMBRE_RECIBO);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_NOMBRE_RECIBO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_NUMERO_RECIBO);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_NUMERO_RECIBO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_INCREMENTO_RECIBO);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_INCREMENTO_RECIBO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(parametro_facturacion_util::$LABEL_CON_IMPUESTO_RECIBO);
			$reporte->setsDescripcion(parametro_facturacion_util::$LABEL_CON_IMPUESTO_RECIBO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=parametro_facturacion_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==parametro_facturacion_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=parametro_facturacion_util::$ID_EMPRESA;
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
				$classes[]=new Classe(termino_pago_cliente::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==empresa::$class) {
						$classes[]=new Classe(empresa::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==termino_pago_cliente::$class) {
						$classes[]=new Classe(termino_pago_cliente::$class);
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
					if($clas==termino_pago_cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(termino_pago_cliente::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_ID, parametro_facturacion_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_ID_EMPRESA, parametro_facturacion_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_NOMBRE_FACTURA, parametro_facturacion_util::$NOMBRE_FACTURA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_NUMERO_FACTURA, parametro_facturacion_util::$NUMERO_FACTURA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_INCREMENTO_FACTURA, parametro_facturacion_util::$INCREMENTO_FACTURA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_SOLO_COSTO_PRODUCTO, parametro_facturacion_util::$SOLO_COSTO_PRODUCTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_NUMERO_FACTURA_LOTE, parametro_facturacion_util::$NUMERO_FACTURA_LOTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_INCREMENTO_FACTURA_LOTE, parametro_facturacion_util::$INCREMENTO_FACTURA_LOTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_NUMERO_DEVOLUCION, parametro_facturacion_util::$NUMERO_DEVOLUCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_INCREMENTO_DEVOLUCION, parametro_facturacion_util::$INCREMENTO_DEVOLUCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_ID_TERMINO_PAGO_CLIENTE, parametro_facturacion_util::$ID_TERMINO_PAGO_CLIENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_NOMBRE_ESTIMADO, parametro_facturacion_util::$NOMBRE_ESTIMADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_NUMERO_ESTIMADO, parametro_facturacion_util::$NUMERO_ESTIMADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_INCREMENTO_ESTIMADO, parametro_facturacion_util::$INCREMENTO_ESTIMADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_SOLO_COSTO_PRODUCTO_ESTIMADO, parametro_facturacion_util::$SOLO_COSTO_PRODUCTO_ESTIMADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_NOMBRE_CONSIGNACION, parametro_facturacion_util::$NOMBRE_CONSIGNACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_NUMERO_CONSIGNACION, parametro_facturacion_util::$NUMERO_CONSIGNACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_INCREMENTO_CONSIGNACION, parametro_facturacion_util::$INCREMENTO_CONSIGNACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_SOLO_COSTO_PRODUCTO_CONSIGNACION, parametro_facturacion_util::$SOLO_COSTO_PRODUCTO_CONSIGNACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_CON_RECIBO, parametro_facturacion_util::$CON_RECIBO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_NOMBRE_RECIBO, parametro_facturacion_util::$NOMBRE_RECIBO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_NUMERO_RECIBO, parametro_facturacion_util::$NUMERO_RECIBO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_INCREMENTO_RECIBO, parametro_facturacion_util::$INCREMENTO_RECIBO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,parametro_facturacion_util::$LABEL_CON_IMPUESTO_RECIBO, parametro_facturacion_util::$CON_IMPUESTO_RECIBO,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy('Nombre Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Factura',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Factura',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento Factura',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Solo Costo Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Solo Costo Producto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Factura Lote',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Factura Lote',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento Factura Lote',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento Factura Lote',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Devolucion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Devolucion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento Devolucion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento Devolucion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Termino Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(' Termino Pago',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Estimado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Estimado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Estimado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Estimado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento Estimado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento Estimado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Solo Costo Producto Estimado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Solo Costo Producto Estimado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Consignacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Consignacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Consignacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Consignacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento Consignacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento Consignacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Solo Costo Producto Consignacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Solo Costo Producto Consignacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Recibo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Recibo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Recibo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Nombre Recibo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Recibo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero Recibo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento Recibos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Incremento Recibos',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Impuesto Recibo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Con Impuesto Recibo',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',parametro_facturacion $parametro_facturacion,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnombre_factura(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnumero_factura(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento Factura',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getincremento_factura(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Solo Costo Producto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_facturacion->getsolo_costo_producto()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Factura Lote',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnumero_factura_lote(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento Factura Lote',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getincremento_factura_lote(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Devolucion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnumero_devolucion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento Devolucion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getincremento_devolucion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy(' Termino Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getid_termino_pago_cliente_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Estimado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnombre_estimado(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Estimado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnumero_estimado(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento Estimado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getincremento_estimado(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Solo Costo Producto Estimado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_facturacion->getsolo_costo_producto_estimado()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Consignacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnombre_consignacion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Consignacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnumero_consignacion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento Consignacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getincremento_consignacion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Solo Costo Producto Consignacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_facturacion->getsolo_costo_producto_consignacion()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Recibo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_facturacion->getcon_recibo()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Nombre Recibo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnombre_recibo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero Recibo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getnumero_recibo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Incremento Recibos',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($parametro_facturacion->getincremento_recibo(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Con Impuesto Recibo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($parametro_facturacion->getcon_impuesto_recibo()),40,6,1); $row[]=$cellReport;
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
	
	public static function gettermino_pago_clienteDescripcion(?termino_pago_cliente $termino_pago_cliente) : string {
		$sDescripcion='none';
		if($termino_pago_cliente!==null) {
			$sDescripcion=termino_pago_cliente_util::gettermino_pago_clienteDescripcion($termino_pago_cliente);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface parametro_facturacion_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $parametro_facturacions,int $iIdNuevoparametro_facturacion) : int;	
		public static function getIndiceActual(array $parametro_facturacions,parametro_facturacion $parametro_facturacion,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getparametro_facturacionDescripcion(?parametro_facturacion $parametro_facturacion) : string {;	
		public static function setparametro_facturacionDescripcion(?parametro_facturacion $parametro_facturacion,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $parametro_facturacions) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $parametro_facturacions);	
		public static function refrescarFKDescripcion(parametro_facturacion $parametro_facturacion);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',parametro_facturacion $parametro_facturacion,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

