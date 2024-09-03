<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\control;

use com\bydan\contabilidad\contabilidad\asiento\presentation\control\asiento_control;
use com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\control\asiento_automatico_control;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\presentation\control\asiento_automatico_detalle_control;
use com\bydan\contabilidad\contabilidad\asiento_detalle\presentation\control\asiento_detalle_control;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\control\asiento_predefinido_control;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\presentation\control\asiento_predefinido_detalle_control;
use com\bydan\contabilidad\contabilidad\cambio_dolar\presentation\control\cambio_dolar_control;
use com\bydan\contabilidad\contabilidad\centro_costo\presentation\control\centro_costo_control;
use com\bydan\contabilidad\contabilidad\cierre_contable\presentation\control\cierre_contable_control;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\presentation\control\cierre_contable_detalle_control;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\presentation\control\contador_auxiliar_control;
use com\bydan\contabilidad\contabilidad\cuenta\presentation\control\cuenta_control;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\control\cuenta_predefinida_control;
use com\bydan\contabilidad\contabilidad\documento_contable\presentation\control\documento_contable_control;
use com\bydan\contabilidad\contabilidad\ejercicio\presentation\control\ejercicio_control;
use com\bydan\contabilidad\contabilidad\fuente\presentation\control\fuente_control;
use com\bydan\contabilidad\contabilidad\imagen_asiento\presentation\control\imagen_asiento_control;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\presentation\control\libro_auxiliar_control;
use com\bydan\contabilidad\contabilidad\moneda\presentation\control\moneda_control;
use com\bydan\contabilidad\contabilidad\parametro_contabilidad\presentation\control\parametro_contabilidad_control;
use com\bydan\contabilidad\contabilidad\periodo\presentation\control\periodo_control;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\control\saldo_cuenta_control;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\presentation\control\tipo_cuenta_control;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\presentation\control\tipo_cuenta_predefinida_control;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\presentation\control\tipo_nivel_cuenta_control;


class ContabilidadGlobalController {
	
	public static function CargarEjecutarController(string $controllerParaEjecutar,string $sub_moduloParaVisualizar='',mixed $post1) {
		
		if($sub_moduloParaVisualizar==null || $sub_moduloParaVisualizar=='') {

			if($controllerParaEjecutar=='asiento') {  
			//include_once('com/bydan/contabilidad/contabilidad/asiento/presentation/control/asiento_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/asiento_control;

			$asiento_control=new asiento_control();
			$asiento_control->inicializarParametrosQueryString($post1);
			$asiento_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='asiento_automatico') {  
			//include_once('com/bydan/contabilidad/contabilidad/asiento_automatico/presentation/control/asiento_automatico_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/asiento_automatico_control;

			$asiento_automatico_control=new asiento_automatico_control();
			$asiento_automatico_control->inicializarParametrosQueryString($post1);
			$asiento_automatico_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='asiento_automatico_detalle') {  
			//include_once('com/bydan/contabilidad/contabilidad/asiento_automatico_detalle/presentation/control/asiento_automatico_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/asiento_automatico_detalle_control;

			$asiento_automatico_detalle_control=new asiento_automatico_detalle_control();
			$asiento_automatico_detalle_control->inicializarParametrosQueryString($post1);
			$asiento_automatico_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='asiento_detalle') {  
			//include_once('com/bydan/contabilidad/contabilidad/asiento_detalle/presentation/control/asiento_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/asiento_detalle_control;

			$asiento_detalle_control=new asiento_detalle_control();
			$asiento_detalle_control->inicializarParametrosQueryString($post1);
			$asiento_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='asiento_predefinido') {  
			//include_once('com/bydan/contabilidad/contabilidad/asiento_predefinido/presentation/control/asiento_predefinido_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/asiento_predefinido_control;

			$asiento_predefinido_control=new asiento_predefinido_control();
			$asiento_predefinido_control->inicializarParametrosQueryString($post1);
			$asiento_predefinido_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='asiento_predefinido_detalle') {  
			//include_once('com/bydan/contabilidad/contabilidad/asiento_predefinido_detalle/presentation/control/asiento_predefinido_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/asiento_predefinido_detalle_control;

			$asiento_predefinido_detalle_control=new asiento_predefinido_detalle_control();
			$asiento_predefinido_detalle_control->inicializarParametrosQueryString($post1);
			$asiento_predefinido_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='cambio_dolar') {  
			//include_once('com/bydan/contabilidad/contabilidad/cambio_dolar/presentation/control/cambio_dolar_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/cambio_dolar_control;

			$cambio_dolar_control=new cambio_dolar_control();
			$cambio_dolar_control->inicializarParametrosQueryString($post1);
			$cambio_dolar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='centro_costo') {  
			//include_once('com/bydan/contabilidad/contabilidad/centro_costo/presentation/control/centro_costo_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/centro_costo_control;

			$centro_costo_control=new centro_costo_control();
			$centro_costo_control->inicializarParametrosQueryString($post1);
			$centro_costo_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='cierre_contable') {  
			//include_once('com/bydan/contabilidad/contabilidad/cierre_contable/presentation/control/cierre_contable_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/cierre_contable_control;

			$cierre_contable_control=new cierre_contable_control();
			$cierre_contable_control->inicializarParametrosQueryString($post1);
			$cierre_contable_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='cierre_contable_detalle') {  
			//include_once('com/bydan/contabilidad/contabilidad/cierre_contable_detalle/presentation/control/cierre_contable_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/cierre_contable_detalle_control;

			$cierre_contable_detalle_control=new cierre_contable_detalle_control();
			$cierre_contable_detalle_control->inicializarParametrosQueryString($post1);
			$cierre_contable_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='contador_auxiliar') {  
			//include_once('com/bydan/contabilidad/contabilidad/contador_auxiliar/presentation/control/contador_auxiliar_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/contador_auxiliar_control;

			$contador_auxiliar_control=new contador_auxiliar_control();
			$contador_auxiliar_control->inicializarParametrosQueryString($post1);
			$contador_auxiliar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='cuenta') {  
			//include_once('com/bydan/contabilidad/contabilidad/cuenta/presentation/control/cuenta_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/cuenta_control;

			$cuenta_control=new cuenta_control();
			$cuenta_control->inicializarParametrosQueryString($post1);
			$cuenta_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='cuenta_predefinida') {  
			//include_once('com/bydan/contabilidad/contabilidad/cuenta_predefinida/presentation/control/cuenta_predefinida_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/cuenta_predefinida_control;

			$cuenta_predefinida_control=new cuenta_predefinida_control();
			$cuenta_predefinida_control->inicializarParametrosQueryString($post1);
			$cuenta_predefinida_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='documento_contable') {  
			//include_once('com/bydan/contabilidad/contabilidad/documento_contable/presentation/control/documento_contable_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/documento_contable_control;

			$documento_contable_control=new documento_contable_control();
			$documento_contable_control->inicializarParametrosQueryString($post1);
			$documento_contable_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='ejercicio') {  
			//include_once('com/bydan/contabilidad/contabilidad/ejercicio/presentation/control/ejercicio_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/ejercicio_control;

			$ejercicio_control=new ejercicio_control();
			$ejercicio_control->inicializarParametrosQueryString($post1);
			$ejercicio_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='fuente') {  
			//include_once('com/bydan/contabilidad/contabilidad/fuente/presentation/control/fuente_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/fuente_control;

			$fuente_control=new fuente_control();
			$fuente_control->inicializarParametrosQueryString($post1);
			$fuente_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='imagen_asiento') {  
			//include_once('com/bydan/contabilidad/contabilidad/imagen_asiento/presentation/control/imagen_asiento_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/imagen_asiento_control;

			$imagen_asiento_control=new imagen_asiento_control();
			$imagen_asiento_control->inicializarParametrosQueryString($post1);
			$imagen_asiento_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='libro_auxiliar') {  
			//include_once('com/bydan/contabilidad/contabilidad/libro_auxiliar/presentation/control/libro_auxiliar_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/libro_auxiliar_control;

			$libro_auxiliar_control=new libro_auxiliar_control();
			$libro_auxiliar_control->inicializarParametrosQueryString($post1);
			$libro_auxiliar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='moneda') {  
			//include_once('com/bydan/contabilidad/contabilidad/moneda/presentation/control/moneda_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/moneda_control;

			$moneda_control=new moneda_control();
			$moneda_control->inicializarParametrosQueryString($post1);
			$moneda_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='parametro_contabilidad') {  
			//include_once('com/bydan/contabilidad/contabilidad/parametro_contabilidad/presentation/control/parametro_contabilidad_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/parametro_contabilidad_control;

			$parametro_contabilidad_control=new parametro_contabilidad_control();
			$parametro_contabilidad_control->inicializarParametrosQueryString($post1);
			$parametro_contabilidad_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='periodo') {  
			//include_once('com/bydan/contabilidad/contabilidad/periodo/presentation/control/periodo_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/periodo_control;

			$periodo_control=new periodo_control();
			$periodo_control->inicializarParametrosQueryString($post1);
			$periodo_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='saldo_cuenta') {  
			//include_once('com/bydan/contabilidad/contabilidad/saldo_cuenta/presentation/control/saldo_cuenta_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/saldo_cuenta_control;

			$saldo_cuenta_control=new saldo_cuenta_control();
			$saldo_cuenta_control->inicializarParametrosQueryString($post1);
			$saldo_cuenta_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='tipo_cuenta') {  
			//include_once('com/bydan/contabilidad/contabilidad/tipo_cuenta/presentation/control/tipo_cuenta_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/tipo_cuenta_control;

			$tipo_cuenta_control=new tipo_cuenta_control();
			$tipo_cuenta_control->inicializarParametrosQueryString($post1);
			$tipo_cuenta_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='tipo_cuenta_predefinida') {  
			//include_once('com/bydan/contabilidad/contabilidad/tipo_cuenta_predefinida/presentation/control/tipo_cuenta_predefinida_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/tipo_cuenta_predefinida_control;

			$tipo_cuenta_predefinida_control=new tipo_cuenta_predefinida_control();
			$tipo_cuenta_predefinida_control->inicializarParametrosQueryString($post1);
			$tipo_cuenta_predefinida_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='tipo_nivel_cuenta') {  
			//include_once('com/bydan/contabilidad/contabilidad/tipo_nivel_cuenta/presentation/control/tipo_nivel_cuenta_control.php');
			//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/tipo_nivel_cuenta_control;

			$tipo_nivel_cuenta_control=new tipo_nivel_cuenta_control();
			$tipo_nivel_cuenta_control->inicializarParametrosQueryString($post1);
			$tipo_nivel_cuenta_control->ejecutarParametrosQueryString();
		}


		} else if($sub_moduloParaVisualizar=='report') {

		    /*
			if($controllerParaEjecutar=='auxiliar_documento') {
				//include_once('com/bydan/contabilidad/contabilidad/presentation/control/report/auxiliar_documento_control.php');
				//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/report/auxiliar_documento_control;
			
				$auxiliar_documentoController=new auxiliar_documento_control();
				$auxiliar_documentoController->inicializarParametrosQueryString($post1);
				$auxiliar_documentoController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='auxiliar_porcuenta') {
				//include_once('com/bydan/contabilidad/contabilidad/presentation/control/report/auxiliar_porcuenta_control.php');
				//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/report/auxiliar_porcuenta_control;
			
				$auxiliar_porcuentaController=new auxiliar_porcuenta_control();
				$auxiliar_porcuentaController->inicializarParametrosQueryString($post1);
				$auxiliar_porcuentaController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='auxiliar_porfuente') {
				//include_once('com/bydan/contabilidad/contabilidad/presentation/control/report/auxiliar_porfuente_control.php');
				//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/report/auxiliar_porfuente_control;
			
				$auxiliar_porfuenteController=new auxiliar_porfuente_control();
				$auxiliar_porfuenteController->inicializarParametrosQueryString($post1);
				$auxiliar_porfuenteController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='auxiliar_tercero') {
				//include_once('com/bydan/contabilidad/contabilidad/presentation/control/report/auxiliar_tercero_control.php');
				//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/report/auxiliar_tercero_control;
			
				$auxiliar_terceroController=new auxiliar_tercero_control();
				$auxiliar_terceroController->inicializarParametrosQueryString($post1);
				$auxiliar_terceroController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='beneficiario_porcuenta') {
				//include_once('com/bydan/contabilidad/contabilidad/presentation/control/report/beneficiario_porcuenta_control.php');
				//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/report/beneficiario_porcuenta_control;
			
				$beneficiario_porcuentaController=new beneficiario_porcuenta_control();
				$beneficiario_porcuentaController->inicializarParametrosQueryString($post1);
				$beneficiario_porcuentaController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='consecutivo_documentos') {
				//include_once('com/bydan/contabilidad/contabilidad/presentation/control/report/consecutivo_documentos_control.php');
				//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/report/consecutivo_documentos_control;
			
				$consecutivo_documentosController=new consecutivo_documentos_control();
				$consecutivo_documentosController->inicializarParametrosQueryString($post1);
				$consecutivo_documentosController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='cuentas_centro_costo') {
				//include_once('com/bydan/contabilidad/contabilidad/presentation/control/report/cuentas_centro_costo_control.php');
				//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/report/cuentas_centro_costo_control;
			
				$cuentas_centro_costoController=new cuentas_centro_costo_control();
				$cuentas_centro_costoController->inicializarParametrosQueryString($post1);
				$cuentas_centro_costoController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='libro_diario') {
				//include_once('com/bydan/contabilidad/contabilidad/presentation/control/report/libro_diario_control.php');
				//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/report/libro_diario_control;
			
				$libro_diarioController=new libro_diario_control();
				$libro_diarioController->inicializarParametrosQueryString($post1);
				$libro_diarioController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='libro_mayor') {
				//include_once('com/bydan/contabilidad/contabilidad/presentation/control/report/libro_mayor_control.php');
				//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/report/libro_mayor_control;
			
				$libro_mayorController=new libro_mayor_control();
				$libro_mayorController->inicializarParametrosQueryString($post1);
				$libro_mayorController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='reporte_porbases') {
				//include_once('com/bydan/contabilidad/contabilidad/presentation/control/report/reporte_porbases_control.php');
				//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/report/reporte_porbases_control;
			
				$reporte_porbasesController=new reporte_porbases_control();
				$reporte_porbasesController->inicializarParametrosQueryString($post1);
				$reporte_porbasesController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='resumen_gastos') {
				//include_once('com/bydan/contabilidad/contabilidad/presentation/control/report/resumen_gastos_control.php');
				//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/report/resumen_gastos_control;
			
				$resumen_gastosController=new resumen_gastos_control();
				$resumen_gastosController->inicializarParametrosQueryString($post1);
				$resumen_gastosController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='resumen_portercero') {
				//include_once('com/bydan/contabilidad/contabilidad/presentation/control/report/resumen_portercero_control.php');
				//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/report/resumen_portercero_control;
			
				$resumen_porterceroController=new resumen_portercero_control();
				$resumen_porterceroController->inicializarParametrosQueryString($post1);
				$resumen_porterceroController->ejecutarParametrosQueryString();
			}
			else if($controllerPphp_eclipseraEjecutar=='saldos_cuentas_caja') {
				//include_once('com/bydan/contabilidad/contabilidad/presentation/control/report/saldos_cuentas_caja_control.php');
				//PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/report/saldos_cuentas_caja_control;
			
				$saldos_cuentas_cajaController=new saldos_cuentas_caja_control();
				$saldos_cuentas_cajaController->inicializarParametrosQueryString($post1);
				$saldos_cuentas_cajaController->ejecutarParametrosQueryString();
				
			} else if($controllerParaEjecutar=='tipo_cuenta_predefinida') {
				    //include_once('com/bydan/contabilidad/contabilidad/presentation/control/tipo_cuenta_predefinida_control.php');
				    //PHP5.3-use com/bydan/contabilidad/contabilidadpresentation/control/tipo_cuenta_predefinida_control;
				    
				    $tipo_cuenta_predefinidaController=new tipo_cuenta_predefinida_control();
				    $tipo_cuenta_predefinidaController->inicializarParametrosQueryString($post1);
				    $tipo_cuenta_predefinidaController->ejecutarParametrosQueryString();
			}
			*/
		}
	}
}
?>