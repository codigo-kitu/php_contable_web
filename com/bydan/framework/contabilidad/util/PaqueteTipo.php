<?php declare(strict_types  =  1);

namespace com\bydan\framework\contabilidad\util;

class PaqueteTipo {		
	
	public static string $DATA_ACCESS = 'DATA_ACCESS';
	public static string $ENTITIES = 'ENTITIES';
	public static string $INTERFACE = 'INTERFACE';
	public static string $LOGIC = 'LOGIC';
	public static string $CONSTANTES_FUNCIONES = 'CONSTANTES_FUNCIONES';
	public static string $CONTROLLER = 'CONTROLLER';
	public static string $WEB = 'WEB';
	public static string $WEB_SESSION = 'WEB_SESSION';
	public static string $REPORTE = 'REPORTE';
	
	function __construct() {
	    
    } 
}

?>