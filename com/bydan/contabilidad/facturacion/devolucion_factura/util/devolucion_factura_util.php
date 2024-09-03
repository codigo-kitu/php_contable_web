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

namespace com\bydan\contabilidad\facturacion\devolucion_factura\util;

use Exception;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\DeepLoadType;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\OrderBy;
use com\bydan\framework\contabilidad\business\data\ConstantesSql;
use com\bydan\framework\contabilidad\presentation\report\CellReport;

use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;


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
use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;
use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;
use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\util\estado_util;
use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_util;
use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;

//REL

use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\entity\devolucion_factura_detalle;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_util;

class devolucion_factura_util extends GeneralEntityConstantesFunciones  {
	/*CONTROL_INICIO*/
			
	/*GENERAL*/
	public static string $STR_CLASS_NAME='devolucion_factura';
	public static string $STR_FINAL_QUERY='';	
	public static string $STR_NOMBRE_OPCION='facturacion.devolucion_facturas';
	/*'Mantenimientodevolucion_factura.jsf';*/
	public static string $STR_MODULO_OPCION='facturacion';
	public static string $STR_NOMBRE_CLASE='Mantenimientodevolucion_factura.jsf';	
	public static string $STR_PATH_OPCION='';	
	public static string $STR_PERSISTENCE_CONTEXT_NAME='';
	public static string $STR_PERSISTENCE_NAME='devolucion_facturaPersistenceName';
	/*.devolucion_factura_util::$SPERSISTENCECONTEXTNAME.Constantes::$SPERSISTENCECONTEXTNAME;*/
	public static string $STR_SESSION_NAME='devolucion_factura_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_SESSION_CONTROLLER_NAME='devolucion_factura_control_session';
	/*.Constantes$::SSESSIONBEAN;*/
	public static string $STR_CONTROLLER_NAME='devolucion_factura_control';
	public static string $STR_CLASS_NAME_TITULO_REPORTES='Devolucion Facturas';
	public static string $STR_RELATIVE_PATH='../';
	public static string $STR_CLASS_PLURAL='s';
	public static string $STR_CLASS_WEB_TITULO='Devolucion Factura';
	public static int $INT_NUMERO_PAGINACION=10;	
	
	/*PARA FORMAR QUERYS*/
	public static string $STR_SCHEMA='';	
	public static string $FACTURACION='facturacion';
	public static string $STR_PREFIJO_TABLE='fac_';
	public static string $STR_TABLE_NAME='devolucion_factura';
	public static string $DEVOLUCION_FACTURA='fac_devolucion_factura';	
	public static string $STR_QUERY_SELECT='select * from 2017_contabilidad0.devolucion_factura';
	public static string $STR_QUERY_SELECT_NATIVE='';
	/*'select '.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.created_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.updated_at,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_empresa,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_sucursal,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_ejercicio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_periodo,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_usuario,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.numero,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.ruc,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.referencia_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_emision,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_vendedor,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_termino_pago_cliente,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.fecha_vence,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_moneda,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.cotizacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_estado,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.direccion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.enviar_a,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.observacion,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.impuesto_en_precio,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.sub_total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.descuento_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.iva_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_fuente_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_fuente_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_iva_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_iva_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.total,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.otro_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.hora,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_ica_porciento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.retencion_ica_monto,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_asiento,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_documento_cuenta_cobrar,'.Constantes::$STR_PREFIJO_SCHEMA.self::$SCHEMA.'.'.self::$TABLE_NAME.'.id_kardex from '.devolucion_factura_util::$SCHEMA.'.'.devolucion_factura_util::$TABLENAME;*/
	
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
	//public $devolucion_facturaConstantesFuncionesAdditional;
	
	/*CAMPOS*/
    public static string $ID_EMPRESA='id_empresa';
    public static string $ID_SUCURSAL='id_sucursal';
    public static string $ID_EJERCICIO='id_ejercicio';
    public static string $ID_PERIODO='id_periodo';
    public static string $ID_USUARIO='id_usuario';
    public static string $NUMERO='numero';
    public static string $ID_CLIENTE='id_cliente';
    public static string $RUC='ruc';
    public static string $REFERENCIA_CLIENTE='referencia_cliente';
    public static string $FECHA_EMISION='fecha_emision';
    public static string $ID_VENDEDOR='id_vendedor';
    public static string $ID_TERMINO_PAGO_CLIENTE='id_termino_pago_cliente';
    public static string $FECHA_VENCE='fecha_vence';
    public static string $ID_MONEDA='id_moneda';
    public static string $COTIZACION='cotizacion';
    public static string $ID_ESTADO='id_estado';
    public static string $DIRECCION='direccion';
    public static string $ENVIAR_A='enviar_a';
    public static string $OBSERVACION='observacion';
    public static string $IMPUESTO_EN_PRECIO='impuesto_en_precio';
    public static string $SUB_TOTAL='sub_total';
    public static string $DESCUENTO_MONTO='descuento_monto';
    public static string $DESCUENTO_PORCIENTO='descuento_porciento';
    public static string $IVA_MONTO='iva_monto';
    public static string $IVA_PORCIENTO='iva_porciento';
    public static string $RETECION_FUENTE_MONTO='retencion_fuente_monto';
    public static string $RETENCION_FUENTE_PORCIENTO='retencion_fuente_porciento';
    public static string $RETENCION_IVA_MONTO='retencion_iva_monto';
    public static string $RETENCION_IVA_PORCIENTO='retencion_iva_porciento';
    public static string $TOTAL='total';
    public static string $OTRO_MONTO='otro_monto';
    public static string $OTRO_PORCIENTO='otro_porciento';
    public static string $HORA='hora';
    public static string $RETENCION_ICA_PORCIENTO='retencion_ica_porciento';
    public static string $RETENCION_ICA_MONTO='retencion_ica_monto';
    public static string $ID_ASIENTO='id_asiento';
    public static string $ID_DOCUMENTO_CUENTA_COBRAR='id_documento_cuenta_cobrar';
    public static string $ID_KARDEX='id_kardex';
	
	/*LABELS CAMPOS*/
	public static string $LABEL_ID='Id';
	public static string $LABEL_VERSIONROW='Updated At';
	
    public static string $LABEL_ID_EMPRESA='Empresa';
    public static string $LABEL_ID_SUCURSAL='Sucursal';
    public static string $LABEL_ID_EJERCICIO='Ejercicio';
    public static string $LABEL_ID_PERIODO='Periodo';
    public static string $LABEL_ID_USUARIO='Usuario';
    public static string $LABEL_NUMERO='Numero';
    public static string $LABEL_ID_CLIENTE='Cliente';
    public static string $LABEL_RUC='Ruc';
    public static string $LABEL_REFERENCIA_CLIENTE='Referencia Cliente';
    public static string $LABEL_FECHA_EMISION='Fecha Emision';
    public static string $LABEL_ID_VENDEDOR='Vendedor';
    public static string $LABEL_ID_TERMINO_PAGO_CLIENTE='Terminos Pago';
    public static string $LABEL_FECHA_VENCE='Fecha Vence';
    public static string $LABEL_ID_MONEDA='Moneda';
    public static string $LABEL_COTIZACION='Cotizacion';
    public static string $LABEL_ID_ESTADO='Estado';
    public static string $LABEL_DIRECCION='Direccion';
    public static string $LABEL_ENVIAR_A='Enviar a';
    public static string $LABEL_OBSERVACION='Observacion';
    public static string $LABEL_IMPUESTO_EN_PRECIO='Impuesto En Precio';
    public static string $LABEL_SUB_TOTAL='Sub Total';
    public static string $LABEL_DESCUENTO_MONTO='Descuento Monto';
    public static string $LABEL_DESCUENTO_PORCIENTO='Descuento %';
    public static string $LABEL_IVA_MONTO='Iva';
    public static string $LABEL_IVA_PORCIENTO='Iva %';
    public static string $LABEL_RETECION_FUENTE_MONTO='Ret.Fuente Monto';
    public static string $LABEL_RETENCION_FUENTE_PORCIENTO='Ret.Fuente %';
    public static string $LABEL_RETENCION_IVA_MONTO='Ret.Iva Monto';
    public static string $LABEL_RETENCION_IVA_PORCIENTO='Ret.Iva %';
    public static string $LABEL_TOTAL='Total';
    public static string $LABEL_OTRO_MONTO='Miscel';
    public static string $LABEL_OTRO_PORCIENTO='Miscel %';
    public static string $LABEL_HORA='Hora';
    public static string $LABEL_RETENCION_ICA_PORCIENTO='Ret.Ica %';
    public static string $LABEL_RETENCION_ICA_MONTO='Ret.Ica Monto';
    public static string $LABEL_ID_ASIENTO='Asiento';
    public static string $LABEL_ID_DOCUMENTO_CUENTA_COBRAR='Docs Cc';
    public static string $LABEL_ID_KARDEX='Kardex';
	
	
	function __construct (){
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->devolucion_facturaConstantesFuncionesAdditional=new $devolucion_facturaConstantesFuncionesAdditional();*/
	}
	
	/*LISTA INDICE*/
	public static function getIndiceNuevo(array $devolucion_facturas,int $iIdNuevodevolucion_factura) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($devolucion_facturas as $devolucion_facturaAux) {
			if($devolucion_facturaAux->getId()==$iIdNuevodevolucion_factura) {
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
	
	public static function getIndiceActual(array $devolucion_facturas,devolucion_factura $devolucion_factura,int $iIndiceActual) : int {
		$iIndice=0;
		$existe=false;
		
		foreach($devolucion_facturas as $devolucion_facturaAux) {
			if($devolucion_facturaAux->getId()==$devolucion_factura->getId()) {
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
	public static function getdevolucion_facturaDescripcion(?devolucion_factura $devolucion_factura) : string {//devolucion_factura NO USAR CLASE, PARA NULOS SE DANA
		$sDescripcion=Constantes::$STR_NONE;
			
		if($devolucion_factura !=null) {
			/*&& devolucion_factura->getId()!=0*/
			
			if($devolucion_factura->getId()!=null) {
				$sDescripcion=(string)$devolucion_factura->getId();
			}
			
			/*devolucion_factura;*/
		}
			
		return $sDescripcion;
	}
	
	public static function setdevolucion_facturaDescripcion(?devolucion_factura $devolucion_factura,string $sValor) {			
		if($devolucion_factura !=null) {
			
			/*devolucion_factura;*/
		}		
	}
	
	/*PREPARAR FOREIGNKEYS*/
	public static function prepararCombosFK(array $devolucion_facturas) : array {
		$devolucion_facturasForeignKey=array();
		
		foreach ($devolucion_facturas as $devolucion_facturaLocal) {
			$devolucion_facturasForeignKey[$devolucion_facturaLocal->getId()]=devolucion_factura_util::getdevolucion_facturaDescripcion($devolucion_facturaLocal);
		}
			
		return $devolucion_facturasForeignKey;
	}
	
	/*LABEL CAMPOS*/
    public static function getColumnLabelid_empresa() : string  { return 'Empresa'; }
    public static function getColumnLabelid_sucursal() : string  { return 'Sucursal'; }
    public static function getColumnLabelid_ejercicio() : string  { return 'Ejercicio'; }
    public static function getColumnLabelid_periodo() : string  { return 'Periodo'; }
    public static function getColumnLabelid_usuario() : string  { return 'Usuario'; }
    public static function getColumnLabelnumero() : string  { return 'Numero'; }
    public static function getColumnLabelid_cliente() : string  { return 'Cliente'; }
    public static function getColumnLabelruc() : string  { return 'Ruc'; }
    public static function getColumnLabelreferencia_cliente() : string  { return 'Referencia Cliente'; }
    public static function getColumnLabelfecha_emision() : string  { return 'Fecha Emision'; }
    public static function getColumnLabelid_vendedor() : string  { return 'Vendedor'; }
    public static function getColumnLabelid_termino_pago_cliente() : string  { return 'Terminos Pago'; }
    public static function getColumnLabelfecha_vence() : string  { return 'Fecha Vence'; }
    public static function getColumnLabelid_moneda() : string  { return 'Moneda'; }
    public static function getColumnLabelcotizacion() : string  { return 'Cotizacion'; }
    public static function getColumnLabelid_estado() : string  { return 'Estado'; }
    public static function getColumnLabeldireccion() : string  { return 'Direccion'; }
    public static function getColumnLabelenviar_a() : string  { return 'Enviar a'; }
    public static function getColumnLabelobservacion() : string  { return 'Observacion'; }
    public static function getColumnLabelimpuesto_en_precio() : string  { return 'Impuesto En Precio'; }
    public static function getColumnLabelsub_total() : string  { return 'Sub Total'; }
    public static function getColumnLabeldescuento_monto() : string  { return 'Descuento Monto'; }
    public static function getColumnLabeldescuento_porciento() : string  { return 'Descuento %'; }
    public static function getColumnLabeliva_monto() : string  { return 'Iva'; }
    public static function getColumnLabeliva_porciento() : string  { return 'Iva %'; }
    public static function getColumnLabelretecion_fuente_monto() : string  { return 'Ret.Fuente Monto'; }
    public static function getColumnLabelretencion_fuente_porciento() : string  { return 'Ret.Fuente %'; }
    public static function getColumnLabelretencion_iva_monto() : string  { return 'Ret.Iva Monto'; }
    public static function getColumnLabelretencion_iva_porciento() : string  { return 'Ret.Iva %'; }
    public static function getColumnLabeltotal() : string  { return 'Total'; }
    public static function getColumnLabelotro_monto() : string  { return 'Miscel'; }
    public static function getColumnLabelotro_porciento() : string  { return 'Miscel %'; }
    public static function getColumnLabelhora() : string  { return 'Hora'; }
    public static function getColumnLabelretencion_ica_porciento() : string  { return 'Ret.Ica %'; }
    public static function getColumnLabelretencion_ica_monto() : string  { return 'Ret.Ica Monto'; }
    public static function getColumnLabelid_asiento() : string  { return 'Asiento'; }
    public static function getColumnLabelid_documento_cuenta_cobrar() : string  { return 'Docs Cc'; }
    public static function getColumnLabelid_kardex() : string  { return 'Kardex'; }

	/*DESCRIPCION CAMPOS BOOLEAN*/
		
	public static function getimpuesto_en_precioDescripcion($devolucion_factura) {
		$sDescripcion='Verdadero';
		if(!$devolucion_factura->getimpuesto_en_precio()) { $sDescripcion='Falso'; }
		return $sDescripcion;
	}	
	
	/*DESCRIPCION FKs*/
	public static function refrescarFKDescripciones(array $devolucion_facturas) {		
		try {
			
			$devolucion_factura = new devolucion_factura();
			
			foreach($devolucion_facturas as $devolucion_factura) {
				
				$devolucion_factura->setid_empresa_Descripcion(devolucion_factura_util::getempresaDescripcion($devolucion_factura->getempresa()));
				$devolucion_factura->setid_sucursal_Descripcion(devolucion_factura_util::getsucursalDescripcion($devolucion_factura->getsucursal()));
				$devolucion_factura->setid_ejercicio_Descripcion(devolucion_factura_util::getejercicioDescripcion($devolucion_factura->getejercicio()));
				$devolucion_factura->setid_periodo_Descripcion(devolucion_factura_util::getperiodoDescripcion($devolucion_factura->getperiodo()));
				$devolucion_factura->setid_usuario_Descripcion(devolucion_factura_util::getusuarioDescripcion($devolucion_factura->getusuario()));
				$devolucion_factura->setid_cliente_Descripcion(devolucion_factura_util::getclienteDescripcion($devolucion_factura->getcliente()));
				$devolucion_factura->setid_vendedor_Descripcion(devolucion_factura_util::getvendedorDescripcion($devolucion_factura->getvendedor()));
				$devolucion_factura->setid_termino_pago_cliente_Descripcion(devolucion_factura_util::gettermino_pago_clienteDescripcion($devolucion_factura->gettermino_pago_cliente()));
				$devolucion_factura->setid_moneda_Descripcion(devolucion_factura_util::getmonedaDescripcion($devolucion_factura->getmoneda()));
				$devolucion_factura->setid_estado_Descripcion(devolucion_factura_util::getestadoDescripcion($devolucion_factura->getestado()));
				$devolucion_factura->setid_asiento_Descripcion(devolucion_factura_util::getasientoDescripcion($devolucion_factura->getasiento()));
				$devolucion_factura->setid_documento_cuenta_cobrar_Descripcion(devolucion_factura_util::getdocumento_cuenta_cobrarDescripcion($devolucion_factura->getdocumento_cuenta_cobrar()));
				$devolucion_factura->setid_kardex_Descripcion(devolucion_factura_util::getkardexDescripcion($devolucion_factura->getkardex()));
			}
			
			if($devolucion_factura!=null);
			
		}  catch(Exception $e) {		
			Funciones::logShowExceptionMessages($e);
			throw $e;
			
  		}
	}
	
	public static function refrescarFKDescripcion(devolucion_factura $devolucion_factura) {		
		try {
			
			
				$devolucion_factura->setid_empresa_Descripcion(devolucion_factura_util::getempresaDescripcion($devolucion_factura->getempresa()));
				$devolucion_factura->setid_sucursal_Descripcion(devolucion_factura_util::getsucursalDescripcion($devolucion_factura->getsucursal()));
				$devolucion_factura->setid_ejercicio_Descripcion(devolucion_factura_util::getejercicioDescripcion($devolucion_factura->getejercicio()));
				$devolucion_factura->setid_periodo_Descripcion(devolucion_factura_util::getperiodoDescripcion($devolucion_factura->getperiodo()));
				$devolucion_factura->setid_usuario_Descripcion(devolucion_factura_util::getusuarioDescripcion($devolucion_factura->getusuario()));
				$devolucion_factura->setid_cliente_Descripcion(devolucion_factura_util::getclienteDescripcion($devolucion_factura->getcliente()));
				$devolucion_factura->setid_vendedor_Descripcion(devolucion_factura_util::getvendedorDescripcion($devolucion_factura->getvendedor()));
				$devolucion_factura->setid_termino_pago_cliente_Descripcion(devolucion_factura_util::gettermino_pago_clienteDescripcion($devolucion_factura->gettermino_pago_cliente()));
				$devolucion_factura->setid_moneda_Descripcion(devolucion_factura_util::getmonedaDescripcion($devolucion_factura->getmoneda()));
				$devolucion_factura->setid_estado_Descripcion(devolucion_factura_util::getestadoDescripcion($devolucion_factura->getestado()));
				$devolucion_factura->setid_asiento_Descripcion(devolucion_factura_util::getasientoDescripcion($devolucion_factura->getasiento()));
				$devolucion_factura->setid_documento_cuenta_cobrar_Descripcion(devolucion_factura_util::getdocumento_cuenta_cobrarDescripcion($devolucion_factura->getdocumento_cuenta_cobrar()));
				$devolucion_factura->setid_kardex_Descripcion(devolucion_factura_util::getkardexDescripcion($devolucion_factura->getkardex()));
							
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
		} else if($sNombreIndice=='FK_Idasiento') {
			$sNombreIndice='Tipo=  Por Asiento';
		} else if($sNombreIndice=='FK_Idcliente') {
			$sNombreIndice='Tipo=  Por Cliente';
		} else if($sNombreIndice=='FK_Iddocumento_cuenta_cobrar') {
			$sNombreIndice='Tipo=  Por Docs Cc';
		} else if($sNombreIndice=='FK_Idejercicio') {
			$sNombreIndice='Tipo=  Por Ejercicio';
		} else if($sNombreIndice=='FK_Idempresa') {
			$sNombreIndice='Tipo=  Por Empresa';
		} else if($sNombreIndice=='FK_Idestado') {
			$sNombreIndice='Tipo=  Por Estado';
		} else if($sNombreIndice=='FK_Idkardex') {
			$sNombreIndice='Tipo=  Por Kardex';
		} else if($sNombreIndice=='FK_Idmoneda') {
			$sNombreIndice='Tipo=  Por Moneda';
		} else if($sNombreIndice=='FK_Idperiodo') {
			$sNombreIndice='Tipo=  Por Periodo';
		} else if($sNombreIndice=='FK_Idsucursal') {
			$sNombreIndice='Tipo=  Por Sucursal';
		} else if($sNombreIndice=='FK_Idtermino_pago') {
			$sNombreIndice='Tipo=  Por Terminos Pago';
		} else if($sNombreIndice=='FK_Idusuario') {
			$sNombreIndice='Tipo=  Por Usuario';
		} else if($sNombreIndice=='FK_Idvendedor') {
			$sNombreIndice='Tipo=  Por Vendedor';
		}

		return $sNombreIndice;
	}
	
	/*INDICES PARAMETROS LABEL*/
	

	public static function getDetalleIndicePorId(int $id) : string 
	{
		return 'Parámetros -> Porid='.$id;
	}

	public static function getDetalleIndiceFK_Idasiento(?int $id_asiento) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Asiento='+$id_asiento; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idcliente(int $id_cliente) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Cliente='+$id_cliente; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Iddocumento_cuenta_cobrar(?int $id_documento_cuenta_cobrar) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Docs Cc='+$id_documento_cuenta_cobrar; 

		return $sDetalleIndice;
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

	public static function getDetalleIndiceFK_Idestado(int $id_estado) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Estado='+$id_estado; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idkardex(?int $id_kardex) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Kardex='+$id_kardex; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idmoneda(int $id_moneda) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Moneda='+$id_moneda; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idperiodo(int $id_periodo) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Periodo='+$id_periodo; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idsucursal(int $id_sucursal) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Sucursal='+$id_sucursal; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idtermino_pago(int $id_termino_pago_cliente) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Terminos Pago='+$id_termino_pago_cliente; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idusuario(int $id_usuario) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Usuario='+$id_usuario; 

		return $sDetalleIndice;
	}

	public static function getDetalleIndiceFK_Idvendedor(int $id_vendedor) : string {
		$sDetalleIndice=' Parámetros -> ';
		$sDetalleIndice.=' Código Único de Vendedor='+$id_vendedor; 

		return $sDetalleIndice;
	}
	
	/*ACCIONES*/
		 
			
	/*SELECCIONAR*/
	public static function getTiposSeleccionar(bool $conFk) : array {
		return devolucion_factura_util::getTiposSeleccionar3($conFk,true,true,true,true);
	}
	
	public static function getTiposSeleccionar2() : array {
		return devolucion_factura_util::getTiposSeleccionar3(false,true,true,true,true);
	}
	
	public static function getTiposSeleccionar3(bool $conFk,bool $conStringColumn,bool $conValorColumn,bool $conFechaColumn,bool $conBitColumn) : array {
		$arrTiposSeleccionarTodos=array();
		$reporte=new Reporte();
		
		
		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_ID_EMPRESA);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_ID_EMPRESA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_ID_SUCURSAL);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_ID_SUCURSAL.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_ID_EJERCICIO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_ID_EJERCICIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_ID_PERIODO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_ID_PERIODO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_ID_USUARIO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_ID_USUARIO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_NUMERO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_NUMERO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_ID_CLIENTE);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_ID_CLIENTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_RUC);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_RUC);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_REFERENCIA_CLIENTE);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_REFERENCIA_CLIENTE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_FECHA_EMISION);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_FECHA_EMISION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_ID_VENDEDOR);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_ID_VENDEDOR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_ID_TERMINO_PAGO_CLIENTE);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_ID_TERMINO_PAGO_CLIENTE.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_FECHA_VENCE);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_FECHA_VENCE);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_ID_MONEDA);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_ID_MONEDA.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_COTIZACION);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_COTIZACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_ID_ESTADO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_ID_ESTADO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_DIRECCION);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_DIRECCION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_ENVIAR_A);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_ENVIAR_A);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conStringColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_OBSERVACION);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_OBSERVACION);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conBitColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_IMPUESTO_EN_PRECIO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_IMPUESTO_EN_PRECIO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_SUB_TOTAL);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_SUB_TOTAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_DESCUENTO_MONTO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_DESCUENTO_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_DESCUENTO_PORCIENTO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_DESCUENTO_PORCIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_IVA_MONTO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_IVA_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_IVA_PORCIENTO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_IVA_PORCIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_RETECION_FUENTE_MONTO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_RETECION_FUENTE_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_RETENCION_FUENTE_PORCIENTO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_RETENCION_FUENTE_PORCIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_RETENCION_IVA_MONTO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_RETENCION_IVA_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_RETENCION_IVA_PORCIENTO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_RETENCION_IVA_PORCIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_TOTAL);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_TOTAL);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_OTRO_MONTO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_OTRO_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_OTRO_PORCIENTO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_OTRO_PORCIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFechaColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_HORA);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_HORA);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_RETENCION_ICA_PORCIENTO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_RETENCION_ICA_PORCIENTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conValorColumn) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_RETENCION_ICA_MONTO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_RETENCION_ICA_MONTO);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_ID_ASIENTO);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_ID_ASIENTO.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_ID_DOCUMENTO_CUENTA_COBRAR);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_ID_DOCUMENTO_CUENTA_COBRAR.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		if($conFk) {
			$reporte=new Reporte();
			$reporte->setsCodigo(devolucion_factura_util::$LABEL_ID_KARDEX);
			$reporte->setsDescripcion(devolucion_factura_util::$LABEL_ID_KARDEX.'-->'.Constantes::$STR_RELACION_LABEL_FK);
			$arrTiposSeleccionarTodos[]=$reporte;
		}

		
		return $arrTiposSeleccionarTodos;
	}
	
	/*GLOBAL*/
	public static function getArrayColumnasGlobales(array $arrDatoGeneral) : array {
		$arrColumnasGlobales=array();
		
		$arrColumnasGlobales=devolucion_factura_util::getArrayColumnasGlobalesConNoColumnas($arrDatoGeneral,array());
		
		return $arrColumnasGlobales;
	}		
	
	public static function getArrayColumnasGlobalesConNoColumnas(array $arrDatoGeneral,array $arrColumnasGlobalesNo) : array {
		$arrColumnasGlobales=array();
		//$noExiste=false;
		
		

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==devolucion_factura_util::$ID_EMPRESA) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=devolucion_factura_util::$ID_EMPRESA;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==devolucion_factura_util::$ID_SUCURSAL) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=devolucion_factura_util::$ID_SUCURSAL;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==devolucion_factura_util::$ID_EJERCICIO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=devolucion_factura_util::$ID_EJERCICIO;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==devolucion_factura_util::$ID_PERIODO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=devolucion_factura_util::$ID_PERIODO;
		}

		$noExiste=false;
		foreach($arrColumnasGlobalesNo as $sColumnaGlobalNo) {
			if($sColumnaGlobalNo==devolucion_factura_util::$ID_USUARIO) {
				$noExiste=true;
			}
		}

		if(!$noExiste) {
			$arrColumnasGlobales[]=devolucion_factura_util::$ID_USUARIO;
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
				$classes[]=new Classe(cliente::$class);
				$classes[]=new Classe(vendedor::$class);
				$classes[]=new Classe(termino_pago_cliente::$class);
				$classes[]=new Classe(moneda::$class);
				$classes[]=new Classe(estado::$class);
				$classes[]=new Classe(asiento::$class);
				$classes[]=new Classe(documento_cuenta_cobrar::$class);
				$classes[]=new Classe(kardex::$class);
				
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
					if($clas==cliente::$class) {
						$classes[]=new Classe(cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==vendedor::$class) {
						$classes[]=new Classe(vendedor::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==termino_pago_cliente::$class) {
						$classes[]=new Classe(termino_pago_cliente::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==moneda::$class) {
						$classes[]=new Classe(moneda::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==estado::$class) {
						$classes[]=new Classe(estado::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==asiento::$class) {
						$classes[]=new Classe(asiento::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==documento_cuenta_cobrar::$class) {
						$classes[]=new Classe(documento_cuenta_cobrar::$class);
					}
				}

				foreach($classesP as $clas) {
					if($clas==kardex::$class) {
						$classes[]=new Classe(kardex::$class);
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
					if($clas==cliente::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(cliente::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==vendedor::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(vendedor::$class);
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

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==moneda::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(moneda::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==estado::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(estado::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==asiento::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(asiento::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==documento_cuenta_cobrar::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(documento_cuenta_cobrar::$class);
				}

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==kardex::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(kardex::$class);
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
				
				$classes[]=new Classe(devolucion_factura_detalle::$class);
				
			} else if($deepLoadType==DeepLoadType::$INCLUDE) {
				
				foreach($classesP as $clas) {
					if($clas==devolucion_factura_detalle::$class) {
						$classes[]=new Classe(devolucion_factura_detalle::$class); break;
					}
				}

				
			} else if($deepLoadType==DeepLoadType::$EXCLUDE) {		
				
				$existe=false;

				$existe=false;

				foreach($classesP as $clas) {
					if($clas==devolucion_factura_detalle::$class) {
						$existe=true;
						break;
					}
				}

				if(!$existe) {
					$classes[]=new Classe(devolucion_factura_detalle::$class);
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
		
		
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_ID, devolucion_factura_util::$ID,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_ID_EMPRESA, devolucion_factura_util::$ID_EMPRESA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_ID_SUCURSAL, devolucion_factura_util::$ID_SUCURSAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_ID_EJERCICIO, devolucion_factura_util::$ID_EJERCICIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_ID_PERIODO, devolucion_factura_util::$ID_PERIODO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_ID_USUARIO, devolucion_factura_util::$ID_USUARIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_NUMERO, devolucion_factura_util::$NUMERO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_ID_CLIENTE, devolucion_factura_util::$ID_CLIENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_RUC, devolucion_factura_util::$RUC,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_REFERENCIA_CLIENTE, devolucion_factura_util::$REFERENCIA_CLIENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_FECHA_EMISION, devolucion_factura_util::$FECHA_EMISION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_ID_VENDEDOR, devolucion_factura_util::$ID_VENDEDOR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_ID_TERMINO_PAGO_CLIENTE, devolucion_factura_util::$ID_TERMINO_PAGO_CLIENTE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_FECHA_VENCE, devolucion_factura_util::$FECHA_VENCE,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_ID_MONEDA, devolucion_factura_util::$ID_MONEDA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_COTIZACION, devolucion_factura_util::$COTIZACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_ID_ESTADO, devolucion_factura_util::$ID_ESTADO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_DIRECCION, devolucion_factura_util::$DIRECCION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_ENVIAR_A, devolucion_factura_util::$ENVIAR_A,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_OBSERVACION, devolucion_factura_util::$OBSERVACION,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_IMPUESTO_EN_PRECIO, devolucion_factura_util::$IMPUESTO_EN_PRECIO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_SUB_TOTAL, devolucion_factura_util::$SUB_TOTAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_DESCUENTO_MONTO, devolucion_factura_util::$DESCUENTO_MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_DESCUENTO_PORCIENTO, devolucion_factura_util::$DESCUENTO_PORCIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_IVA_MONTO, devolucion_factura_util::$IVA_MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_IVA_PORCIENTO, devolucion_factura_util::$IVA_PORCIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_RETECION_FUENTE_MONTO, devolucion_factura_util::$RETECION_FUENTE_MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_RETENCION_FUENTE_PORCIENTO, devolucion_factura_util::$RETENCION_FUENTE_PORCIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_RETENCION_IVA_MONTO, devolucion_factura_util::$RETENCION_IVA_MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_RETENCION_IVA_PORCIENTO, devolucion_factura_util::$RETENCION_IVA_PORCIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_TOTAL, devolucion_factura_util::$TOTAL,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_OTRO_MONTO, devolucion_factura_util::$OTRO_MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_OTRO_PORCIENTO, devolucion_factura_util::$OTRO_PORCIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_HORA, devolucion_factura_util::$HORA,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_RETENCION_ICA_PORCIENTO, devolucion_factura_util::$RETENCION_ICA_PORCIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_RETENCION_ICA_MONTO, devolucion_factura_util::$RETENCION_ICA_MONTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_ID_ASIENTO, devolucion_factura_util::$ID_ASIENTO,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_ID_DOCUMENTO_CUENTA_COBRAR, devolucion_factura_util::$ID_DOCUMENTO_CUENTA_COBRAR,false,""); $arrOrderBy[]=$orderBy;
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_util::$LABEL_ID_KARDEX, devolucion_factura_util::$ID_KARDEX,false,""); $arrOrderBy[]=$orderBy;
		
		$arrOrderBy = OrderBy::ActualizarInformacion($arrOrderBy);
		
		return $arrOrderBy;
	}
	
	public static function getOrderByListaRel() : array {
		$arrOrderBy=array();
		$orderBy=new OrderBy();
		
		
		$orderBy=OrderBy::NewOrderBy(false,devolucion_factura_detalle_util::$STR_CLASS_WEB_TITULO, devolucion_factura_detalle_util::$STR_CLASS_WEB_TITULO,false,""); $arrOrderBy[]=$orderBy;
		
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

		if(Funciones::existeCadenaArrayOrderBy('Numero',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Numero',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cliente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ruc',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ruc',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Referencia Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Referencia Cliente',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Emision',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Vendedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Vendedor',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Terminos Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Terminos Pago',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Vence',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Fecha Vence',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Moneda',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Moneda',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cotizacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Cotizacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Estado',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Direccion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Enviar a',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Enviar a',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Observacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Observacion',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto En Precio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Impuesto En Precio',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sub Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Sub Total',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descuento Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento Monto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descuento %',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Descuento %',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Iva',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Iva %',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Iva %',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ret.Fuente Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Fuente Monto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ret.Fuente %',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Fuente %',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ret.Iva Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Iva Monto',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ret.Iva %',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Ret.Iva %',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('Total',40,7,1);$cellReport->setblnFill($blnFill); $header[]=$cellReport;
		}
		
		return $header;
	}
	
	public static function getDataReportRow(string $tipo='NORMAL',devolucion_factura $devolucion_factura,array $arrOrderBy,bool $bitParaReporteOrderBy) : array {
		$row=array();
		
		if($tipo=='RELACIONADO') {
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine('',40,6,1); $row[]=$cellReport;
		}
		
		

		if(Funciones::existeCadenaArrayOrderBy('Empresa',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_empresa_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sucursal',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_sucursal_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ejercicio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_ejercicio_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Periodo',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_periodo_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Usuario',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_usuario_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Numero',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getnumero(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_cliente_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ruc',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getruc(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Referencia Cliente',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getreferencia_cliente(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Emision',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getfecha_emision(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Vendedor',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_vendedor_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Terminos Pago',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_termino_pago_cliente_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Fecha Vence',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getfecha_vence(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Moneda',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_moneda_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Cotizacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getcotizacion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Estado',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getid_estado_Descripcion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Direccion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getdireccion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Enviar a',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getenviar_a(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Observacion',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getobservacion(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Impuesto En Precio',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine(Funciones::getBitDescription($devolucion_factura->getimpuesto_en_precio()),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Sub Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getsub_total(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descuento Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getdescuento_monto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Descuento %',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getdescuento_porciento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Iva',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getiva_monto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Iva %',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getiva_porciento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ret.Fuente Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getretencion_fuente_monto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ret.Fuente %',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getretencion_fuente_porciento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ret.Iva Monto',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getretencion_iva_monto(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Ret.Iva %',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->getretencion_iva_porciento(),40,6,1); $row[]=$cellReport;
		}

		if(Funciones::existeCadenaArrayOrderBy('Total',$arrOrderBy,$bitParaReporteOrderBy)){
			$cellReport=new CellReport(); $cellReport->inicializarTextWidthHeightLine($devolucion_factura->gettotal(),40,6,1); $row[]=$cellReport;
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
	
	public static function getclienteDescripcion(?cliente $cliente) : string {
		$sDescripcion='none';
		if($cliente!==null) {
			$sDescripcion=cliente_util::getclienteDescripcion($cliente);
		}
		return $sDescripcion;
	}	
	
	public static function getvendedorDescripcion(?vendedor $vendedor) : string {
		$sDescripcion='none';
		if($vendedor!==null) {
			$sDescripcion=vendedor_util::getvendedorDescripcion($vendedor);
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
	
	public static function getmonedaDescripcion(?moneda $moneda) : string {
		$sDescripcion='none';
		if($moneda!==null) {
			$sDescripcion=moneda_util::getmonedaDescripcion($moneda);
		}
		return $sDescripcion;
	}	
	
	public static function getestadoDescripcion(?estado $estado) : string {
		$sDescripcion='none';
		if($estado!==null) {
			$sDescripcion=estado_util::getestadoDescripcion($estado);
		}
		return $sDescripcion;
	}	
	
	public static function getasientoDescripcion(?asiento $asiento) : string {
		$sDescripcion='none';
		if($asiento!==null) {
			$sDescripcion=asiento_util::getasientoDescripcion($asiento);
		}
		return $sDescripcion;
	}	
	
	public static function getdocumento_cuenta_cobrarDescripcion(?documento_cuenta_cobrar $documento_cuenta_cobrar) : string {
		$sDescripcion='none';
		if($documento_cuenta_cobrar!==null) {
			$sDescripcion=documento_cuenta_cobrar_util::getdocumento_cuenta_cobrarDescripcion($documento_cuenta_cobrar);
		}
		return $sDescripcion;
	}	
	
	public static function getkardexDescripcion(?kardex $kardex) : string {
		$sDescripcion='none';
		if($kardex!==null) {
			$sDescripcion=kardex_util::getkardexDescripcion($kardex);
		}
		return $sDescripcion;
	}	
		
	
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $classe=new Classe();
        
        if($classe!=null);                        
    }
	
	/*
	
	interface devolucion_factura_util extends GeneralEntityConstantesFunciones  {
		
		//LISTA INDICE
		public static function getIndiceNuevo(array $devolucion_facturas,int $iIdNuevodevolucion_factura) : int;	
		public static function getIndiceActual(array $devolucion_facturas,devolucion_factura $devolucion_factura,int $iIndiceActual) : int;
		
		//DESCRIPCION
		public static function getdevolucion_facturaDescripcion(?devolucion_factura $devolucion_factura) : string {;	
		public static function setdevolucion_facturaDescripcion(?devolucion_factura $devolucion_factura,string $sValor);
		
		//PREPARAR FOREIGNKEYS
		public static function prepararCombosFK(array $devolucion_facturas) : array;	
		
		//DESCRIPCION FKs
		public static function refrescarFKDescripciones(array $devolucion_facturas);	
		public static function refrescarFKDescripcion(devolucion_factura $devolucion_factura);
				
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
		public static function getDataReportRow(string $tipo='NORMAL',devolucion_factura $devolucion_factura,array $arrOrderBy,bool $bitParaReporteOrderBy) : array;		
			
		
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();
	}

	*/	
}
?>

