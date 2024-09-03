<?php declare(strict_types  =  1);

namespace com\bydan\framework\contabilidad\util;

class Modulo {
    
    /*KEY NAMESPACE*/
    public static string $CONTABILIDAD = 'contabilidad';
    public static string $CUENTAS_COBRAR = 'cuentascobrar';
    public static string $CUENTAS_CORRIENTES = 'cuentascorrientes';
    public static string $CUENTAS_PAGAR = 'cuentaspagar';
    public static string $ESTIMADOS = 'estimados';
    public static string $FACTURACION = 'facturacion';
    public static string $GENERAL = 'general';
    public static string $INVENTARIO = 'inventario';
    public static string $SEGURIDAD = 'seguridad';
        
    /*ID MODULO*/
    public static int $ID_CONTABILIDAD = 1;
    public static int $ID_CUENTAS_COBRAR = 2;
    public static int $ID_CUENTAS_CORRIENTES = 3;
    public static int $ID_CUENTAS_PAGAR = 4;
    public static int $ID_ESTIMADOS = 10;
    public static int $ID_FACTURACION = 5;
    public static int $ID_GENERAL = 11;
    public static int $ID_INVENTARIO = 7;
    public static int $ID_SEGURIDAD = 8;
}

?>