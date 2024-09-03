<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\control;

use com\bydan\contabilidad\cuentascorrientes\banco\presentation\control\banco_control;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\presentation\control\beneficiario_ocacional_cheque_control;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\presentation\control\categoria_cheque_control;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\control\cheque_cuenta_corriente_control;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\control\clasificacion_cheque_control;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\presentation\control\cuenta_corriente_control;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\presentation\control\cuenta_corriente_detalle_control;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\presentation\control\deposito_cuenta_corriente_control;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\presentation\control\estado_cuentas_corrientes_control;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\presentation\control\estado_deposito_retiro_control;
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\presentation\control\instrumento_pago_control;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\presentation\control\retiro_cuenta_corriente_control;
		
class CuentasCorrientesGlobalController {
	
    public static function CargarEjecutarController(string $controllerParaEjecutar,string $sub_moduloParaVisualizar='',mixed $post1) {
		if($sub_moduloParaVisualizar==null || $sub_moduloParaVisualizar=='') {
			if($controllerParaEjecutar=='banco') {  
			//include_once('com/bydan/contabilidad/cuentascorrientes/banco/presentation/control/banco_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/banco_control;

			$banco_control=new banco_control();
			$banco_control->inicializarParametrosQueryString($post1);
			$banco_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='beneficiario_ocacional_cheque') {  
			//include_once('com/bydan/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/presentation/control/beneficiario_ocacional_cheque_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/beneficiario_ocacional_cheque_control;

			$beneficiario_ocacional_cheque_control=new beneficiario_ocacional_cheque_control();
			$beneficiario_ocacional_cheque_control->inicializarParametrosQueryString($post1);
			$beneficiario_ocacional_cheque_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='categoria_cheque') {  
			//include_once('com/bydan/contabilidad/cuentascorrientes/categoria_cheque/presentation/control/categoria_cheque_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/categoria_cheque_control;

			$categoria_cheque_control=new categoria_cheque_control();
			$categoria_cheque_control->inicializarParametrosQueryString($post1);
			$categoria_cheque_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='cheque_cuenta_corriente') {  
			//include_once('com/bydan/contabilidad/cuentascorrientes/cheque_cuenta_corriente/presentation/control/cheque_cuenta_corriente_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/cheque_cuenta_corriente_control;

			$cheque_cuenta_corriente_control=new cheque_cuenta_corriente_control();
			$cheque_cuenta_corriente_control->inicializarParametrosQueryString($post1);
			$cheque_cuenta_corriente_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='clasificacion_cheque') {  
			//include_once('com/bydan/contabilidad/cuentascorrientes/clasificacion_cheque/presentation/control/clasificacion_cheque_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/clasificacion_cheque_control;

			$clasificacion_cheque_control=new clasificacion_cheque_control();
			$clasificacion_cheque_control->inicializarParametrosQueryString($post1);
			$clasificacion_cheque_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='cuenta_corriente') {  
			//include_once('com/bydan/contabilidad/cuentascorrientes/cuenta_corriente/presentation/control/cuenta_corriente_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/cuenta_corriente_control;

			$cuenta_corriente_control=new cuenta_corriente_control();
			$cuenta_corriente_control->inicializarParametrosQueryString($post1);
			$cuenta_corriente_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='cuenta_corriente_detalle') {  
			//include_once('com/bydan/contabilidad/cuentascorrientes/cuenta_corriente_detalle/presentation/control/cuenta_corriente_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/cuenta_corriente_detalle_control;

			$cuenta_corriente_detalle_control=new cuenta_corriente_detalle_control();
			$cuenta_corriente_detalle_control->inicializarParametrosQueryString($post1);
			$cuenta_corriente_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='deposito_cuenta_corriente') {  
			//include_once('com/bydan/contabilidad/cuentascorrientes/deposito_cuenta_corriente/presentation/control/deposito_cuenta_corriente_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/deposito_cuenta_corriente_control;

			$deposito_cuenta_corriente_control=new deposito_cuenta_corriente_control();
			$deposito_cuenta_corriente_control->inicializarParametrosQueryString($post1);
			$deposito_cuenta_corriente_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='estado_cuentas_corrientes') {  
			//include_once('com/bydan/contabilidad/cuentascorrientes/estado_cuentas_corrientes/presentation/control/estado_cuentas_corrientes_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/estado_cuentas_corrientes_control;

			$estado_cuentas_corrientes_control=new estado_cuentas_corrientes_control();
			$estado_cuentas_corrientes_control->inicializarParametrosQueryString($post1);
			$estado_cuentas_corrientes_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='estado_deposito_retiro') {  
			//include_once('com/bydan/contabilidad/cuentascorrientes/estado_deposito_retiro/presentation/control/estado_deposito_retiro_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/estado_deposito_retiro_control;

			$estado_deposito_retiro_control=new estado_deposito_retiro_control();
			$estado_deposito_retiro_control->inicializarParametrosQueryString($post1);
			$estado_deposito_retiro_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='instrumento_pago') {  
			//include_once('com/bydan/contabilidad/cuentascorrientes/instrumento_pago/presentation/control/instrumento_pago_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/instrumento_pago_control;

			$instrumento_pago_control=new instrumento_pago_control();
			$instrumento_pago_control->inicializarParametrosQueryString($post1);
			$instrumento_pago_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='retiro_cuenta_corriente') {  
			//include_once('com/bydan/contabilidad/cuentascorrientes/retiro_cuenta_corriente/presentation/control/retiro_cuenta_corriente_control.php');
			//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/retiro_cuenta_corriente_control;

			$retiro_cuenta_corriente_control=new retiro_cuenta_corriente_control();
			$retiro_cuenta_corriente_control->inicializarParametrosQueryString($post1);
			$retiro_cuenta_corriente_control->ejecutarParametrosQueryString();
		}

		} else if($sub_moduloParaVisualizar=='report') {
			
			/*
		    if($controllerParaEjecutar=='transacciones_cuenta') {
		        //include_once('com/bydan/contabilidad/cuentascorrientes/presentation/control/report/transacciones_cuenta_control.php');
		        //PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/report/transacciones_cuenta_control;		       
		        $transacciones_cuentaController=new transacciones_cuenta_control();
		        $transacciones_cuentaController->inicializarParametrosQueryString($post1);
		        $transacciones_cuentaController->ejecutarParametrosQueryString();
		    }
		    */
		    /*
			if($controllerParaEjecutar=='categorias') {
				//include_once('com/bydan/contabilidad/cuentascorrientes/presentation/control/report/categorias_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/report/categorias_control;
			
				$categoriasController=new categorias_control();
				$categoriasController->inicializarParametrosQueryString($post1);
				$categoriasController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='cheques_categoria') {
				//include_once('com/bydan/contabilidad/cuentascorrientes/presentation/control/report/cheques_categoria_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/report/cheques_categoria_control;
			
				$cheques_categoriaController=new cheques_categoria_control();
				$cheques_categoriaController->inicializarParametrosQueryString($post1);
				$cheques_categoriaController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='cheques_empresa') {
				//include_once('com/bydan/contabilidad/cuentascorrientes/presentation/control/report/cheques_empresa_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/report/cheques_empresa_control;
			
				$cheques_empresaController=new cheques_empresa_control();
				$cheques_empresaController->inicializarParametrosQueryString($post1);
				$cheques_empresaController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='cuentas_pagar') {
				//include_once('com/bydan/contabilidad/cuentascorrientes/presentation/control/report/cuentas_pagar_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/report/cuentas_pagar_control;
			
				$cuentas_pagarController=new cuentas_pagar_control();
				$cuentas_pagarController->inicializarParametrosQueryString($post1);
				$cuentas_pagarController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='cuentas_porcobrar') {
				//include_once('com/bydan/contabilidad/cuentascorrientes/presentation/control/report/cuentas_porcobrar_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/report/cuentas_porcobrar_control;
			
				$cuentas_porcobrarController=new cuentas_porcobrar_control();
				$cuentas_porcobrarController->inicializarParametrosQueryString($post1);
				$cuentas_porcobrarController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='sp_consulta_cheques1') {
				//include_once('com/bydan/contabilidad/cuentascorrientes/presentation/control/report/sp_consulta_cheques1_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/report/sp_consulta_cheques1_control;
			
				$sp_consulta_cheques1Controller=new sp_consulta_cheques1_control();
				$sp_consulta_cheques1Controller->inicializarParametrosQueryString($post1);
				$sp_consulta_cheques1Controller->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='sp_consulta_cheques2') {
				//include_once('com/bydan/contabilidad/cuentascorrientes/presentation/control/report/sp_consulta_cheques2_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/report/sp_consulta_cheques2_control;
			
				$sp_consulta_cheques2Controller=new sp_consulta_cheques2_control();
				$sp_consulta_cheques2Controller->inicializarParametrosQueryString($post1);
				$sp_consulta_cheques2Controller->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='sp_consulta_cheques3') {
				//include_once('com/bydan/contabilidad/cuentascorrientes/presentation/control/report/sp_consulta_cheques3_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/report/sp_consulta_cheques3_control;
			
				$sp_consulta_cheques3Controller=new sp_consulta_cheques3_control();
				$sp_consulta_cheques3Controller->inicializarParametrosQueryString($post1);
				$sp_consulta_cheques3Controller->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='sp_consulta_cheques4') {
				//include_once('com/bydan/contabilidad/cuentascorrientes/presentation/control/report/sp_consulta_cheques4_control.php');
				//PHP5.3-use com/bydan/contabilidad/cuentascorrientespresentation/control/report/sp_consulta_cheques4_control;
			
				$sp_consulta_cheques4Controller=new sp_consulta_cheques4_control();
				$sp_consulta_cheques4Controller->inicializarParametrosQueryString($post1);
				$sp_consulta_cheques4Controller->ejecutarParametrosQueryString();
			}
			*/
		}
	}
}
?>