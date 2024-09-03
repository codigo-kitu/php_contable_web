<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\control;

use com\bydan\contabilidad\cuentascobrar\categoria_cliente\presentation\control\categoria_cliente_control;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\control\cliente_control;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\presentation\control\credito_cuenta_cobrar_control;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\presentation\control\cuenta_cobrar_control;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\presentation\control\cuenta_cobrar_detalle_control;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\presentation\control\debito_cuenta_cobrar_control;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\presentation\control\documento_cliente_control;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\presentation\control\documento_cuenta_cobrar_control;
use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\presentation\control\estado_cuentas_cobrar_control;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\presentation\control\forma_pago_cliente_control;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\presentation\control\giro_negocio_cliente_control;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\presentation\control\imagen_cliente_control;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\presentation\control\imagen_documento_cuenta_cobrar_control;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\presentation\control\pago_cuenta_cobrar_control;
use com\bydan\contabilidad\cuentascobrar\parametro_cuenta_cobrar\presentation\control\parametro_cuenta_cobrar_control;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\presentation\control\termino_pago_cliente_control;
		

class CuentasCobrarGlobalController {
	
    public static function CargarEjecutarController(string $controllerParaEjecutar,string $sub_moduloParaVisualizar='',mixed $post1) {
		
		if($sub_moduloParaVisualizar==null || $sub_moduloParaVisualizar=='') {

			if($controllerParaEjecutar=='categoria_cliente') {  
			//include_once('com/bydan/contabilidad/cuentascobrar/categoria_cliente/presentation/control/categoria_cliente_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/categoria_cliente_control;

			$categoria_cliente_control=new categoria_cliente_control();
			$categoria_cliente_control->inicializarParametrosQueryString($post1);
			$categoria_cliente_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='cliente') {  
			//include_once('com/bydan/contabilidad/cuentascobrar/cliente/presentation/control/cliente_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/cliente_control;

			$cliente_control=new cliente_control();
			$cliente_control->inicializarParametrosQueryString($post1);
			$cliente_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='credito_cuenta_cobrar') {  
			//include_once('com/bydan/contabilidad/cuentascobrar/credito_cuenta_cobrar/presentation/control/credito_cuenta_cobrar_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/credito_cuenta_cobrar_control;

			$credito_cuenta_cobrar_control=new credito_cuenta_cobrar_control();
			$credito_cuenta_cobrar_control->inicializarParametrosQueryString($post1);
			$credito_cuenta_cobrar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='cuenta_cobrar') {  
			//include_once('com/bydan/contabilidad/cuentascobrar/cuenta_cobrar/presentation/control/cuenta_cobrar_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/cuenta_cobrar_control;

			$cuenta_cobrar_control=new cuenta_cobrar_control();
			$cuenta_cobrar_control->inicializarParametrosQueryString($post1);
			$cuenta_cobrar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='cuenta_cobrar_detalle') {  
			//include_once('com/bydan/contabilidad/cuentascobrar/cuenta_cobrar_detalle/presentation/control/cuenta_cobrar_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/cuenta_cobrar_detalle_control;

			$cuenta_cobrar_detalle_control=new cuenta_cobrar_detalle_control();
			$cuenta_cobrar_detalle_control->inicializarParametrosQueryString($post1);
			$cuenta_cobrar_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='debito_cuenta_cobrar') {  
			//include_once('com/bydan/contabilidad/cuentascobrar/debito_cuenta_cobrar/presentation/control/debito_cuenta_cobrar_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/debito_cuenta_cobrar_control;

			$debito_cuenta_cobrar_control=new debito_cuenta_cobrar_control();
			$debito_cuenta_cobrar_control->inicializarParametrosQueryString($post1);
			$debito_cuenta_cobrar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='documento_cliente') {  
			//include_once('com/bydan/contabilidad/cuentascobrar/documento_cliente/presentation/control/documento_cliente_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/documento_cliente_control;

			$documento_cliente_control=new documento_cliente_control();
			$documento_cliente_control->inicializarParametrosQueryString($post1);
			$documento_cliente_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='documento_cuenta_cobrar') {  
			//include_once('com/bydan/contabilidad/cuentascobrar/documento_cuenta_cobrar/presentation/control/documento_cuenta_cobrar_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/documento_cuenta_cobrar_control;

			$documento_cuenta_cobrar_control=new documento_cuenta_cobrar_control();
			$documento_cuenta_cobrar_control->inicializarParametrosQueryString($post1);
			$documento_cuenta_cobrar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='estado_cuentas_cobrar') {  
			//include_once('com/bydan/contabilidad/cuentascobrar/estado_cuentas_cobrar/presentation/control/estado_cuentas_cobrar_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/estado_cuentas_cobrar_control;

			$estado_cuentas_cobrar_control=new estado_cuentas_cobrar_control();
			$estado_cuentas_cobrar_control->inicializarParametrosQueryString($post1);
			$estado_cuentas_cobrar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='forma_pago_cliente') {  
			//include_once('com/bydan/contabilidad/cuentascobrar/forma_pago_cliente/presentation/control/forma_pago_cliente_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/forma_pago_cliente_control;

			$forma_pago_cliente_control=new forma_pago_cliente_control();
			$forma_pago_cliente_control->inicializarParametrosQueryString($post1);
			$forma_pago_cliente_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='giro_negocio_cliente') {  
			//include_once('com/bydan/contabilidad/cuentascobrar/giro_negocio_cliente/presentation/control/giro_negocio_cliente_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/giro_negocio_cliente_control;

			$giro_negocio_cliente_control=new giro_negocio_cliente_control();
			$giro_negocio_cliente_control->inicializarParametrosQueryString($post1);
			$giro_negocio_cliente_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='imagen_cliente') {  
			//include_once('com/bydan/contabilidad/cuentascobrar/imagen_cliente/presentation/control/imagen_cliente_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/imagen_cliente_control;

			$imagen_cliente_control=new imagen_cliente_control();
			$imagen_cliente_control->inicializarParametrosQueryString($post1);
			$imagen_cliente_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='imagen_documento_cuenta_cobrar') {  
			//include_once('com/bydan/contabilidad/cuentascobrar/imagen_documento_cuenta_cobrar/presentation/control/imagen_documento_cuenta_cobrar_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/imagen_documento_cuenta_cobrar_control;

			$imagen_documento_cuenta_cobrar_control=new imagen_documento_cuenta_cobrar_control();
			$imagen_documento_cuenta_cobrar_control->inicializarParametrosQueryString($post1);
			$imagen_documento_cuenta_cobrar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='pago_cuenta_cobrar') {  
			//include_once('com/bydan/contabilidad/cuentascobrar/pago_cuenta_cobrar/presentation/control/pago_cuenta_cobrar_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/pago_cuenta_cobrar_control;

			$pago_cuenta_cobrar_control=new pago_cuenta_cobrar_control();
			$pago_cuenta_cobrar_control->inicializarParametrosQueryString($post1);
			$pago_cuenta_cobrar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='parametro_cuenta_cobrar') {  
			//include_once('com/bydan/contabilidad/cuentascobrar/parametro_cuenta_cobrar/presentation/control/parametro_cuenta_cobrar_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/parametro_cuenta_cobrar_control;

			$parametro_cuenta_cobrar_control=new parametro_cuenta_cobrar_control();
			$parametro_cuenta_cobrar_control->inicializarParametrosQueryString($post1);
			$parametro_cuenta_cobrar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='termino_pago_cliente') {  
			//include_once('com/bydan/contabilidad/cuentascobrar/termino_pago_cliente/presentation/control/termino_pago_cliente_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/termino_pago_cliente_control;

			$termino_pago_cliente_control=new termino_pago_cliente_control();
			$termino_pago_cliente_control->inicializarParametrosQueryString($post1);
			$termino_pago_cliente_control->ejecutarParametrosQueryString();
		}
		} else if($sub_moduloParaVisualizar=='report') {
		    
		    
			if($controllerParaEjecutar=='clientes_por_vendedor') {
				//include_once('com/bydan/contabilidad/cuentascobrar/presentation/control/report/clientes_por_vendedor_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/report/clientes_por_vendedor_control;
					
				$clientes_por_vendedorController=new clientes_por_vendedor_control();
				$clientes_por_vendedorController->inicializarParametrosQueryString($post1);
				$clientes_por_vendedorController->ejecutarParametrosQueryString();
			
			} else if($controllerParaEjecutar=='transacciones_cuenta_cobrar') {
			    //include_once('com/bydan/contabilidad/cuentascobrar/presentation/control/report/transacciones_cuenta_cobrar_control.php');
			    //PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/report/transacciones_cuenta_control;
			    $transacciones_cuenta_cobrarController=new transacciones_cuenta_cobrar_control();
			    $transacciones_cuenta_cobrarController->inicializarParametrosQueryString($post1);
			    $transacciones_cuenta_cobrarController->ejecutarParametrosQueryString();
			    
			}
			
			/*
			else if($controllerParaEjecutar=='balance_declientes') {  
				//include_once('com/bydan/contabilidad/cuentascobrar/presentation/control/report/balance_declientes_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/report/balance_declientes_control;
	
				$balance_declientesController=new balance_declientes_control();
				$balance_declientesController->inicializarParametrosQueryString($post1);
				$balance_declientesController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='clientes_sinactividad') {  
				//include_once('com/bydan/contabilidad/cuentascobrar/presentation/control/report/clientes_sinactividad_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/report/clientes_sinactividad_control;
	
				$clientes_sinactividadController=new clientes_sinactividad_control();
				$clientes_sinactividadController->inicializarParametrosQueryString($post1);
				$clientes_sinactividadController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='creditos_asignados') {  
				//include_once('com/bydan/contabilidad/cuentascobrar/presentation/control/report/creditos_asignados_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentascobrarpresentation/control/report/creditos_asignados_control;
	
				$creditos_asignadosController=new creditos_asignados_control();
				$creditos_asignadosController->inicializarParametrosQueryString($post1);
				$creditos_asignadosController->ejecutarParametrosQueryString();
			}
			*/
		}
	}
}
?>