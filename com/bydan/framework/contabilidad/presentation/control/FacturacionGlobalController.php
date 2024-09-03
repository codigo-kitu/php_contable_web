<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\control;

use com\bydan\contabilidad\facturacion\devolucion_factura\presentation\control\devolucion_factura_control;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\presentation\control\devolucion_factura_detalle_control;
use com\bydan\contabilidad\facturacion\factura\presentation\control\factura_control;
use com\bydan\contabilidad\facturacion\factura_detalle\presentation\control\factura_detalle_control;
use com\bydan\contabilidad\facturacion\factura_lote\presentation\control\factura_lote_control;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\presentation\control\factura_lote_detalle_control;
use com\bydan\contabilidad\facturacion\factura_modelo\presentation\control\factura_modelo_control;
use com\bydan\contabilidad\facturacion\imagen_factura\presentation\control\imagen_factura_control;
use com\bydan\contabilidad\facturacion\impuesto\presentation\control\impuesto_control;
use com\bydan\contabilidad\facturacion\otro_impuesto\presentation\control\otro_impuesto_control;
use com\bydan\contabilidad\facturacion\parametro_facturacion\presentation\control\parametro_facturacion_control;
use com\bydan\contabilidad\facturacion\retencion\presentation\control\retencion_control;
use com\bydan\contabilidad\facturacion\retencion_fuente\presentation\control\retencion_fuente_control;
use com\bydan\contabilidad\facturacion\retencion_ica\presentation\control\retencion_ica_control;
use com\bydan\contabilidad\facturacion\vendedor\presentation\control\vendedor_control;
		

class FacturacionGlobalController {
	
    public static function CargarEjecutarController(string $controllerParaEjecutar,string $sub_moduloParaVisualizar='',mixed $post1) {
		
		if($sub_moduloParaVisualizar==null || $sub_moduloParaVisualizar=='') {

			if($controllerParaEjecutar=='devolucion_factura') {  
			//include_once('com/bydan/contabilidad/facturacion/devolucion_factura/presentation/control/devolucion_factura_control.php');
			//PHP5.3-use com/bydan/contabilidad/facturacionpresentation/control/devolucion_factura_control;

			$devolucion_factura_control=new devolucion_factura_control();
			$devolucion_factura_control->inicializarParametrosQueryString($post1);
			$devolucion_factura_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='devolucion_factura_detalle') {  
			//include_once('com/bydan/contabilidad/facturacion/devolucion_factura_detalle/presentation/control/devolucion_factura_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/facturacionpresentation/control/devolucion_factura_detalle_control;

			$devolucion_factura_detalle_control=new devolucion_factura_detalle_control();
			$devolucion_factura_detalle_control->inicializarParametrosQueryString($post1);
			$devolucion_factura_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='factura') {  
			//include_once('com/bydan/contabilidad/facturacion/factura/presentation/control/factura_control.php');
			//PHP5.3-use com/bydan/contabilidad/facturacionpresentation/control/factura_control;

			$factura_control=new factura_control();
			$factura_control->inicializarParametrosQueryString($post1);
			$factura_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='factura_detalle') {  
			//include_once('com/bydan/contabilidad/facturacion/factura_detalle/presentation/control/factura_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/facturacionpresentation/control/factura_detalle_control;

			$factura_detalle_control=new factura_detalle_control();
			$factura_detalle_control->inicializarParametrosQueryString($post1);
			$factura_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='factura_lote') {  
			//include_once('com/bydan/contabilidad/facturacion/factura_lote/presentation/control/factura_lote_control.php');
			//PHP5.3-use com/bydan/contabilidad/facturacionpresentation/control/factura_lote_control;

			$factura_lote_control=new factura_lote_control();
			$factura_lote_control->inicializarParametrosQueryString($post1);
			$factura_lote_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='factura_lote_detalle') {  
			//include_once('com/bydan/contabilidad/facturacion/factura_lote_detalle/presentation/control/factura_lote_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/facturacionpresentation/control/factura_lote_detalle_control;

			$factura_lote_detalle_control=new factura_lote_detalle_control();
			$factura_lote_detalle_control->inicializarParametrosQueryString($post1);
			$factura_lote_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='factura_modelo') {  
			//include_once('com/bydan/contabilidad/facturacion/factura_modelo/presentation/control/factura_modelo_control.php');
			//PHP5.3-use com/bydan/contabilidad/facturacionpresentation/control/factura_modelo_control;

			$factura_modelo_control=new factura_modelo_control();
			$factura_modelo_control->inicializarParametrosQueryString($post1);
			$factura_modelo_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='imagen_factura') {  
			//include_once('com/bydan/contabilidad/facturacion/imagen_factura/presentation/control/imagen_factura_control.php');
			//PHP5.3-use com/bydan/contabilidad/facturacionpresentation/control/imagen_factura_control;

			$imagen_factura_control=new imagen_factura_control();
			$imagen_factura_control->inicializarParametrosQueryString($post1);
			$imagen_factura_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='impuesto') {  
			//include_once('com/bydan/contabilidad/facturacion/impuesto/presentation/control/impuesto_control.php');
			//PHP5.3-use com/bydan/contabilidad/facturacionpresentation/control/impuesto_control;

			$impuesto_control=new impuesto_control();
			$impuesto_control->inicializarParametrosQueryString($post1);
			$impuesto_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='otro_impuesto') {  
			//include_once('com/bydan/contabilidad/facturacion/otro_impuesto/presentation/control/otro_impuesto_control.php');
			//PHP5.3-use com/bydan/contabilidad/facturacionpresentation/control/otro_impuesto_control;

			$otro_impuesto_control=new otro_impuesto_control();
			$otro_impuesto_control->inicializarParametrosQueryString($post1);
			$otro_impuesto_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='parametro_facturacion') {  
			//include_once('com/bydan/contabilidad/facturacion/parametro_facturacion/presentation/control/parametro_facturacion_control.php');
			//PHP5.3-use com/bydan/contabilidad/facturacionpresentation/control/parametro_facturacion_control;

			$parametro_facturacion_control=new parametro_facturacion_control();
			$parametro_facturacion_control->inicializarParametrosQueryString($post1);
			$parametro_facturacion_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='retencion') {  
			//include_once('com/bydan/contabilidad/facturacion/retencion/presentation/control/retencion_control.php');
			//PHP5.3-use com/bydan/contabilidad/facturacionpresentation/control/retencion_control;

			$retencion_control=new retencion_control();
			$retencion_control->inicializarParametrosQueryString($post1);
			$retencion_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='retencion_fuente') {  
			//include_once('com/bydan/contabilidad/facturacion/retencion_fuente/presentation/control/retencion_fuente_control.php');
			//PHP5.3-use com/bydan/contabilidad/facturacionpresentation/control/retencion_fuente_control;

			$retencion_fuente_control=new retencion_fuente_control();
			$retencion_fuente_control->inicializarParametrosQueryString($post1);
			$retencion_fuente_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='retencion_ica') {  
			//include_once('com/bydan/contabilidad/facturacion/retencion_ica/presentation/control/retencion_ica_control.php');
			//PHP5.3-use com/bydan/contabilidad/facturacionpresentation/control/retencion_ica_control;

			$retencion_ica_control=new retencion_ica_control();
			$retencion_ica_control->inicializarParametrosQueryString($post1);
			$retencion_ica_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='vendedor') {  
			//include_once('com/bydan/contabilidad/facturacion/vendedor/presentation/control/vendedor_control.php');
			//PHP5.3-use com/bydan/contabilidad/facturacionpresentation/control/vendedor_control;

			$vendedor_control=new vendedor_control();
			$vendedor_control->inicializarParametrosQueryString($post1);
			$vendedor_control->ejecutarParametrosQueryString();
		}

		} else if($sub_moduloParaVisualizar=='report') {
			
		}
	}
}
?>