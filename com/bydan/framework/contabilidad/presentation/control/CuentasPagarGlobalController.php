<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\control;

use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\presentation\control\categoria_proveedor_control;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\presentation\control\credito_cuenta_pagar_control;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\control\cuenta_pagar_control;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar_detalle\presentation\control\cuenta_pagar_detalle_control;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\presentation\control\debito_cuenta_pagar_control;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\presentation\control\documento_cuenta_pagar_control;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\presentation\control\documento_proveedor_control;
use com\bydan\contabilidad\cuentaspagar\estado_cuentas_pagar\presentation\control\estado_cuentas_pagar_control;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\presentation\control\forma_pago_proveedor_control;
use com\bydan\contabilidad\cuentaspagar\giro_negocio_proveedor\presentation\control\giro_negocio_proveedor_control;
use com\bydan\contabilidad\cuentaspagar\imagen_documento_cuenta_pagar\presentation\control\imagen_documento_cuenta_pagar_control;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\presentation\control\imagen_proveedor_control;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\presentation\control\pago_cuenta_pagar_control;
use com\bydan\contabilidad\cuentaspagar\parametro_cuenta_pagar\presentation\control\parametro_cuenta_pagar_control;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\control\proveedor_control;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\control\termino_pago_proveedor_control;
		
class CuentasPagarGlobalController {
	
    public static function CargarEjecutarController(string $controllerParaEjecutar,string $sub_moduloParaVisualizar='',mixed $post1) {
		
		if($sub_moduloParaVisualizar==null || $sub_moduloParaVisualizar=='') {

			if($controllerParaEjecutar=='categoria_proveedor') {  
			//include_once('com/bydan/contabilidad/cuentaspagar/categoria_proveedor/presentation/control/categoria_proveedor_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/categoria_proveedor_control;

			$categoria_proveedor_control=new categoria_proveedor_control();
			$categoria_proveedor_control->inicializarParametrosQueryString($post1);
			$categoria_proveedor_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='credito_cuenta_pagar') {  
			//include_once('com/bydan/contabilidad/cuentaspagar/credito_cuenta_pagar/presentation/control/credito_cuenta_pagar_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/credito_cuenta_pagar_control;

			$credito_cuenta_pagar_control=new credito_cuenta_pagar_control();
			$credito_cuenta_pagar_control->inicializarParametrosQueryString($post1);
			$credito_cuenta_pagar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='cuenta_pagar') {  
			//include_once('com/bydan/contabilidad/cuentaspagar/cuenta_pagar/presentation/control/cuenta_pagar_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/cuenta_pagar_control;

			$cuenta_pagar_control=new cuenta_pagar_control();
			$cuenta_pagar_control->inicializarParametrosQueryString($post1);
			$cuenta_pagar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='cuenta_pagar_detalle') {  
			//include_once('com/bydan/contabilidad/cuentaspagar/cuenta_pagar_detalle/presentation/control/cuenta_pagar_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/cuenta_pagar_detalle_control;

			$cuenta_pagar_detalle_control=new cuenta_pagar_detalle_control();
			$cuenta_pagar_detalle_control->inicializarParametrosQueryString($post1);
			$cuenta_pagar_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='debito_cuenta_pagar') {  
			//include_once('com/bydan/contabilidad/cuentaspagar/debito_cuenta_pagar/presentation/control/debito_cuenta_pagar_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/debito_cuenta_pagar_control;

			$debito_cuenta_pagar_control=new debito_cuenta_pagar_control();
			$debito_cuenta_pagar_control->inicializarParametrosQueryString($post1);
			$debito_cuenta_pagar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='documento_cuenta_pagar') {  
			//include_once('com/bydan/contabilidad/cuentaspagar/documento_cuenta_pagar/presentation/control/documento_cuenta_pagar_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/documento_cuenta_pagar_control;

			$documento_cuenta_pagar_control=new documento_cuenta_pagar_control();
			$documento_cuenta_pagar_control->inicializarParametrosQueryString($post1);
			$documento_cuenta_pagar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='documento_proveedor') {  
			//include_once('com/bydan/contabilidad/cuentaspagar/documento_proveedor/presentation/control/documento_proveedor_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/documento_proveedor_control;

			$documento_proveedor_control=new documento_proveedor_control();
			$documento_proveedor_control->inicializarParametrosQueryString($post1);
			$documento_proveedor_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='estado_cuentas_pagar') {  
			//include_once('com/bydan/contabilidad/cuentaspagar/estado_cuentas_pagar/presentation/control/estado_cuentas_pagar_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/estado_cuentas_pagar_control;

			$estado_cuentas_pagar_control=new estado_cuentas_pagar_control();
			$estado_cuentas_pagar_control->inicializarParametrosQueryString($post1);
			$estado_cuentas_pagar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='forma_pago_proveedor') {  
			//include_once('com/bydan/contabilidad/cuentaspagar/forma_pago_proveedor/presentation/control/forma_pago_proveedor_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/forma_pago_proveedor_control;

			$forma_pago_proveedor_control=new forma_pago_proveedor_control();
			$forma_pago_proveedor_control->inicializarParametrosQueryString($post1);
			$forma_pago_proveedor_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='giro_negocio_proveedor') {  
			//include_once('com/bydan/contabilidad/cuentaspagar/giro_negocio_proveedor/presentation/control/giro_negocio_proveedor_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/giro_negocio_proveedor_control;

			$giro_negocio_proveedor_control=new giro_negocio_proveedor_control();
			$giro_negocio_proveedor_control->inicializarParametrosQueryString($post1);
			$giro_negocio_proveedor_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='imagen_documento_cuenta_pagar') {  
			//include_once('com/bydan/contabilidad/cuentaspagar/imagen_documento_cuenta_pagar/presentation/control/imagen_documento_cuenta_pagar_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/imagen_documento_cuenta_pagar_control;

			$imagen_documento_cuenta_pagar_control=new imagen_documento_cuenta_pagar_control();
			$imagen_documento_cuenta_pagar_control->inicializarParametrosQueryString($post1);
			$imagen_documento_cuenta_pagar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='imagen_proveedor') {  
			//include_once('com/bydan/contabilidad/cuentaspagar/imagen_proveedor/presentation/control/imagen_proveedor_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/imagen_proveedor_control;

			$imagen_proveedor_control=new imagen_proveedor_control();
			$imagen_proveedor_control->inicializarParametrosQueryString($post1);
			$imagen_proveedor_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='pago_cuenta_pagar') {  
			//include_once('com/bydan/contabilidad/cuentaspagar/pago_cuenta_pagar/presentation/control/pago_cuenta_pagar_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/pago_cuenta_pagar_control;

			$pago_cuenta_pagar_control=new pago_cuenta_pagar_control();
			$pago_cuenta_pagar_control->inicializarParametrosQueryString($post1);
			$pago_cuenta_pagar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='parametro_cuenta_pagar') {  
			//include_once('com/bydan/contabilidad/cuentaspagar/parametro_cuenta_pagar/presentation/control/parametro_cuenta_pagar_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/parametro_cuenta_pagar_control;

			$parametro_cuenta_pagar_control=new parametro_cuenta_pagar_control();
			$parametro_cuenta_pagar_control->inicializarParametrosQueryString($post1);
			$parametro_cuenta_pagar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='proveedor') {  
			//include_once('com/bydan/contabilidad/cuentaspagar/proveedor/presentation/control/proveedor_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/proveedor_control;

			$proveedor_control=new proveedor_control();
			$proveedor_control->inicializarParametrosQueryString($post1);
			$proveedor_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='termino_pago_proveedor') {  
			//include_once('com/bydan/contabilidad/cuentaspagar/termino_pago_proveedor/presentation/control/termino_pago_proveedor_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/termino_pago_proveedor_control;

			$termino_pago_proveedor_control=new termino_pago_proveedor_control();
			$termino_pago_proveedor_control->inicializarParametrosQueryString($post1);
			$termino_pago_proveedor_control->ejecutarParametrosQueryString();
		}


		} else if($sub_moduloParaVisualizar=='report') {

			/*
		    if($controllerParaEjecutar=='transacciones_cuenta_pagar') {
		        //include_once('com/bydan/contabilidad/cuentaspagar/presentation/control/report/transacciones_cuenta_pagar_control.php');
		        //PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/report/transacciones_cuenta_control;
		        $transacciones_cuenta_pagarController=new transacciones_cuenta_pagar_control();
		        $transacciones_cuenta_pagarController->inicializarParametrosQueryString($post1);
		        $transacciones_cuenta_pagarController->ejecutarParametrosQueryString();
		        
		    }
		    */
		    /*
			if($controllerParaEjecutar=='balance_proveedor') {
				//include_once('com/bydan/contabilidad/cuentaspagar/presentation/control/report/balance_proveedor_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/report/balance_proveedor_control;
			
				$balance_proveedorController=new balance_proveedor_control();
				$balance_proveedorController->inicializarParametrosQueryString($post1);
				$balance_proveedorController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='compras_porproveedores') {
				//include_once('com/bydan/contabilidad/cuentaspagar/presentation/control/report/compras_porproveedores_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/report/compras_porproveedores_control;
			
				$compras_porproveedoresController=new compras_porproveedores_control();
				$compras_porproveedoresController->inicializarParametrosQueryString($post1);
				$compras_porproveedoresController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='creditos_cubiertos') {
				//include_once('com/bydan/contabilidad/cuentaspagar/presentation/control/report/creditos_cubiertos_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/report/creditos_cubiertos_control;
			
				$creditos_cubiertosController=new creditos_cubiertos_control();
				$creditos_cubiertosController->inicializarParametrosQueryString($post1);
				$creditos_cubiertosController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='debitos_asignados') {
				//include_once('com/bydan/contabilidad/cuentaspagar/presentation/control/report/debitos_asignados_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/report/debitos_asignados_control;
			
				$debitos_asignadosController=new debitos_asignados_control();
				$debitos_asignadosController->inicializarParametrosQueryString($post1);
				$debitos_asignadosController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='docs_porfecha') {
				//include_once('com/bydan/contabilidad/cuentaspagar/presentation/control/report/docs_porfecha_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/report/docs_porfecha_control;
			
				$docs_porfechaController=new docs_porfecha_control();
				$docs_porfechaController->inicializarParametrosQueryString($post1);
				$docs_porfechaController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='docs_porproveedor') {
				//include_once('com/bydan/contabilidad/cuentaspagar/presentation/control/report/docs_porproveedor_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/report/docs_porproveedor_control;
			
				$docs_porproveedorController=new docs_porproveedor_control();
				$docs_porproveedorController->inicializarParametrosQueryString($post1);
				$docs_porproveedorController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='efectividad_pagos') {
				//include_once('com/bydan/contabilidad/cuentaspagar/presentation/control/report/efectividad_pagos_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/report/efectividad_pagos_control;
			
				$efectividad_pagosController=new efectividad_pagos_control();
				$efectividad_pagosController->inicializarParametrosQueryString($post1);
				$efectividad_pagosController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='pagos_efectuados') {
				//include_once('com/bydan/contabilidad/cuentaspagar/presentation/control/report/pagos_efectuados_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/report/pagos_efectuados_control;
			
				$pagos_efectuadosController=new pagos_efectuados_control();
				$pagos_efectuadosController->inicializarParametrosQueryString($post1);
				$pagos_efectuadosController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='resumen_pagos') {
				//include_once('com/bydan/contabilidad/cuentaspagar/presentation/control/report/resumen_pagos_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentaspagarpresentation/control/report/resumen_pagos_control;
			
				$resumen_pagosController=new resumen_pagos_control();
				$resumen_pagosController->inicializarParametrosQueryString($post1);
				$resumen_pagosController->ejecutarParametrosQueryString();
			}
			*/
			
				
		}
	}
}
?>