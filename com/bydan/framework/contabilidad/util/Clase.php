<?php declare(strict_types  =  1);

namespace com\bydan\framework\contabilidad\util;

class Clase {
    
    //CUENTAS CORRIENTES
    public static string $CUENTA_CORRIENTE = 'cuenta_corriente';
    public static string $DEPOSITO_CUENTA_CORRIENTE = 'deposito_cuenta_corriente';
    public static string $RETIRO_CUENTA_CORRIENTE = 'retiro_cuenta_corriente';
    public static string $CHEQUE_CUENTA_CORRIENTE = 'cheque_cuenta_corriente';
    public static string $ESTADO_DEPOSITO_RETIRO = 'estado_deposito_retiro';
	
	//CUENTAS COBRAR
	public static string $CUENTA_COBRAR = 'cuenta_cobrar';
	public static string $DEBITO_CUENTA_COBRAR = 'debito_cuenta_cobrar';
	public static string $CREDITO_CUENTA_COBRAR = 'credito_cuenta_cobrar';
	public static string $PAGO_CUENTA_COBRAR = 'pago_cuenta_cobrar';
	public static string $ESTADO_CUENTAS_COBRAR = 'estado_cuentas_cobrar';
	public static string $PARAMETRO_CUENTA_COBRAR = 'parametro_cuenta_cobrar';		
	public static string $CLIENTE = 'cliente';
	
	//CUENTAS PAGAR
	public static string $CUENTA_PAGAR = 'cuenta_pagar';
	public static string $DEBITO_CUENTA_PAGAR = 'debito_cuenta_pagar';
	public static string $CREDITO_CUENTA_PAGAR = 'credito_cuenta_pagar';
	public static string $PAGO_CUENTA_PAGAR = 'pago_cuenta_pagar';
	public static string $ESTADO_CUENTAS_PAGAR = 'estado_cuentas_pagar';
	public static string $PARAMETRO_CUENTA_PAGAR = 'parametro_cuenta_pagar';
	public static string $PROVEEDOR = 'proveedor';
	
	//INVENTARIO
	public static string $COSTO_PRODUCTO = 'costo_producto';
	public static string $PRODUCTO = 'producto';
	public static string $PRODUCTO_BODEGA = 'producto_bodega';
	public static string $PARAMETRO_INVENTARIO = 'parametro_inventario';
	public static string $COTIZACION_DETALLE = 'cotizacion_detalle';
	public static string $TIPO_KARDEX = 'tipo_kardex';
	public static string $KARDEX = 'kardex';
	public static string $KARDEX_DETALLE = 'kardex_detalle';
	public static string $ORDEN_COMPRA_DETALLE = 'orden_compra_detalle';
	public static string $DEVOLUCION_DETALLE = 'devolucion_detalle';
	
	//FACTURACION
	public static string $FACTURA = 'factura';
	public static string $FACTURA_DETALLE = 'factura_detalle';
	public static string $PARAMETRO_FACTURACION = 'parametro_facturacion';
	public static string $IMPUESTO = 'impuesto';
	
	//GENERAL
	public static string $PARAMETRO_GENERAL = 'parametro_general';
	public static string $ESTADO = 'estado';
	
	//ESTIMADOS
	public static string $ESTIMADO_DETALLE = 'estimado_detalle';
	
	//CONTABILIDAD
	public static string $PARAMETRO_CONTABILIDAD = 'parametro_contabilidad';
	public static string $ASIENTO_DETALLE = 'asiento_detalle';
}

?>