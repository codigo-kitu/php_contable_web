<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\control;

use com\bydan\contabilidad\estimados\consignacion\presentation\control\consignacion_control;
use com\bydan\contabilidad\estimados\consignacion_detalle\presentation\control\consignacion_detalle_control;
use com\bydan\contabilidad\estimados\estimado\presentation\control\estimado_control;
use com\bydan\contabilidad\estimados\estimado_detalle\presentation\control\estimado_detalle_control;
use com\bydan\contabilidad\estimados\imagen_consignacion\presentation\control\imagen_consignacion_control;
use com\bydan\contabilidad\estimados\imagen_estimado\presentation\control\imagen_estimado_control;
		
class EstimadosGlobalController {
	
    public static function CargarEjecutarController(string $controllerParaEjecutar,string $sub_moduloParaVisualizar='',mixed $post1) {
		
		if($sub_moduloParaVisualizar==null || $sub_moduloParaVisualizar=='') {

			if($controllerParaEjecutar=='consignacion') {  
			//include_once('com/bydan/contabilidad/estimados/consignacion/presentation/control/consignacion_control.php');
			//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/consignacion_control;

			$consignacion_control=new consignacion_control();
			$consignacion_control->inicializarParametrosQueryString($post1);
			$consignacion_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='consignacion_detalle') {  
			//include_once('com/bydan/contabilidad/estimados/consignacion_detalle/presentation/control/consignacion_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/consignacion_detalle_control;

			$consignacion_detalle_control=new consignacion_detalle_control();
			$consignacion_detalle_control->inicializarParametrosQueryString($post1);
			$consignacion_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='estimado') {  
			//include_once('com/bydan/contabilidad/estimados/estimado/presentation/control/estimado_control.php');
			//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/estimado_control;

			$estimado_control=new estimado_control();
			$estimado_control->inicializarParametrosQueryString($post1);
			$estimado_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='estimado_detalle') {  
			//include_once('com/bydan/contabilidad/estimados/estimado_detalle/presentation/control/estimado_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/estimado_detalle_control;

			$estimado_detalle_control=new estimado_detalle_control();
			$estimado_detalle_control->inicializarParametrosQueryString($post1);
			$estimado_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='imagen_consignacion') {  
			//include_once('com/bydan/contabilidad/estimados/imagen_consignacion/presentation/control/imagen_consignacion_control.php');
			//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/imagen_consignacion_control;

			$imagen_consignacion_control=new imagen_consignacion_control();
			$imagen_consignacion_control->inicializarParametrosQueryString($post1);
			$imagen_consignacion_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='imagen_estimado') {  
			//include_once('com/bydan/contabilidad/estimados/imagen_estimado/presentation/control/imagen_estimado_control.php');
			//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/imagen_estimado_control;

			$imagen_estimado_control=new imagen_estimado_control();
			$imagen_estimado_control->inicializarParametrosQueryString($post1);
			$imagen_estimado_control->ejecutarParametrosQueryString();
		}

		} else if($sub_moduloParaVisualizar=='report') {
			
			/*
		    if($controllerParaEjecutar=='estimados_porfechas_porbodegas') {
		        
		        //include_once('com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porbodegas_control.php');
		        //PHP5.3-use com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porbodegas_control;
		        
		        $estimados_porfechas_porbodegasController=new estimados_porfechas_porbodegas_control();
		        $estimados_porfechas_porbodegasController->inicializarParametrosQueryString($post1);
		        $estimados_porfechas_porbodegasController->ejecutarParametrosQueryString();
		        
		    }
		    */

		    /*
			if($controllerParaEjecutar=='estimados_pornumero') {
			
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/estimados_pornumero_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimados/presentation/control/report/estimados_pornumero_control;
					
				$estimados_pornumeroController=new estimados_pornumero_control();
				$estimados_pornumeroController->inicializarParametrosQueryString($post1);
				$estimados_pornumeroController->ejecutarParametrosQueryString();
				
			} else if($controllerParaEjecutar=='estimados_porfechas_porclientes') {
			
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porclientes_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porclientes_control;
					
				$estimados_porfechas_porclientesController=new estimados_porfechas_porclientes_control();
				$estimados_porfechas_porclientesController->inicializarParametrosQueryString($post1);
				$estimados_porfechas_porclientesController->ejecutarParametrosQueryString();
			
			} else if($controllerParaEjecutar=='estimados_porfechas_porcliente') {
			
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porcliente_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porcliente_control;
					
				$estimados_porfechas_porclienteController=new estimados_porfechas_porcliente_control();
				$estimados_porfechas_porclienteController->inicializarParametrosQueryString($post1);
				$estimados_porfechas_porclienteController->ejecutarParametrosQueryString();
			
			} else if($controllerParaEjecutar=='estimados_porfechas_porproductos') {
			
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porproductos_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porproductos_control;
					
				$estimados_porfechas_porproductosController=new estimados_porfechas_porproductos_control();
				$estimados_porfechas_porproductosController->inicializarParametrosQueryString($post1);
				$estimados_porfechas_porproductosController->ejecutarParametrosQueryString();
			
			} else if($controllerParaEjecutar=='estimados_porfechas_porproducto') {
			
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porproducto_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porproducto_control;
					
				$estimados_porfechas_porproductoController=new estimados_porfechas_porproducto_control();
				$estimados_porfechas_porproductoController->inicializarParametrosQueryString($post1);
				$estimados_porfechas_porproductoController->ejecutarParametrosQueryString();
			
			} else if($controllerParaEjecutar=='estimados_porfechas_porvendedores') {
			
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porvendedores_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porvendedores_control;
					
				$estimados_porfechas_porvendedoresController=new estimados_porfechas_porvendedores_control();
				$estimados_porfechas_porvendedoresController->inicializarParametrosQueryString($post1);
				$estimados_porfechas_porvendedoresController->ejecutarParametrosQueryString();
			
			} else if($controllerParaEjecutar=='estimados_porfechas_porvendedor') {
			
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porvendedor_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porvendedor_control;
					
				$estimados_porfechas_porvendedorController=new estimados_porfechas_porvendedor_control();
				$estimados_porfechas_porvendedorController->inicializarParametrosQueryString($post1);
				$estimados_porfechas_porvendedorController->ejecutarParametrosQueryString();
				
			} else if($controllerParaEjecutar=='estimados_porfechas_porreferenciac') {
			
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porreferenciac_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porreferenciac_control;
					
				$estimados_porfechas_porreferenciacController=new estimados_porfechas_porreferenciac_control();
				$estimados_porfechas_porreferenciacController->inicializarParametrosQueryString($post1);
				$estimados_porfechas_porreferenciacController->ejecutarParametrosQueryString();
			
			} else if($controllerParaEjecutar=='estimados_porfechas_porclientes_porproductos') {
			
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porclientes_porproductos_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimados/presentation/control/report/estimados_porfechas_porclientes_porproductos_control;
					
				$estimados_porfechas_porclientes_porproductosController=new estimados_porfechas_porclientes_porproductos_control();
				$estimados_porfechas_porclientes_porproductosController->inicializarParametrosQueryString($post1);
				$estimados_porfechas_porclientes_porproductosController->ejecutarParametrosQueryString();
			
			} else if($controllerParaEjecutar=='consignaciones_porfechas_facturadas') {  
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/consignaciones_porfechas_facturadas_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/report/consignaciones_porfechas_facturadas_control;
	
				$consignaciones_porfechas_facturadasController=new consignaciones_porfechas_facturadas_control();
				$consignaciones_porfechas_facturadasController->inicializarParametrosQueryString($post1);
				$consignaciones_porfechas_facturadasController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='consignaciones_porfechas_porcliente') {  
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/consignaciones_porfechas_porcliente_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/report/consignaciones_porfechas_porcliente_control;
	
				$consignaciones_porfechas_porclienteController=new consignaciones_porfechas_porcliente_control();
				$consignaciones_porfechas_porclienteController->inicializarParametrosQueryString($post1);
				$consignaciones_porfechas_porclienteController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='consignaciones_porfechas_porclientes') {  
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/consignaciones_porfechas_porclientes_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/report/consignaciones_porfechas_porclientes_control;
	
				$consignaciones_porfechas_porclientesController=new consignaciones_porfechas_porclientes_control();
				$consignaciones_porfechas_porclientesController->inicializarParametrosQueryString($post1);
				$consignaciones_porfechas_porclientesController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='consignaciones_porfechas_porclientes_porproductos') {  
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/consignaciones_porfechas_porclientes_porproductos_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/report/consignaciones_porfechas_porclientes_porproductos_control;
	
				$consignaciones_porfechas_porclientes_porproductosController=new consignaciones_porfechas_porclientes_porproductos_control();
				$consignaciones_porfechas_porclientes_porproductosController->inicializarParametrosQueryString($post1);
				$consignaciones_porfechas_porclientes_porproductosController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='consignaciones_porfechas_porproducto') {  
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/consignaciones_porfechas_porproducto_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/report/consignaciones_porfechas_porproducto_control;
	
				$consignaciones_porfechas_porproductoController=new consignaciones_porfechas_porproducto_control();
				$consignaciones_porfechas_porproductoController->inicializarParametrosQueryString($post1);
				$consignaciones_porfechas_porproductoController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='consignaciones_porfechas_porproductos') {  
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/consignaciones_porfechas_porproductos_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/report/consignaciones_porfechas_porproductos_control;
	
				$consignaciones_porfechas_porproductosController=new consignaciones_porfechas_porproductos_control();
				$consignaciones_porfechas_porproductosController->inicializarParametrosQueryString($post1);
				$consignaciones_porfechas_porproductosController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='consignaciones_porfechas_porreferenciac') {  
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/consignaciones_porfechas_porreferenciac_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/report/consignaciones_porfechas_porreferenciac_control;
	
				$consignaciones_porfechas_porreferenciacController=new consignaciones_porfechas_porreferenciac_control();
				$consignaciones_porfechas_porreferenciacController->inicializarParametrosQueryString($post1);
				$consignaciones_porfechas_porreferenciacController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='consignaciones_porfechas_porterminos') {  
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/consignaciones_porfechas_porterminos_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/report/consignaciones_porfechas_porterminos_control;
	
				$consignaciones_porfechas_porterminosController=new consignaciones_porfechas_porterminos_control();
				$consignaciones_porfechas_porterminosController->inicializarParametrosQueryString($post1);
				$consignaciones_porfechas_porterminosController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='consignaciones_porfechas_porvendedor') {  
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/consignaciones_porfechas_porvendedor_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/report/consignaciones_porfechas_porvendedor_control;
	
				$consignaciones_porfechas_porvendedorController=new consignaciones_porfechas_porvendedor_control();
				$consignaciones_porfechas_porvendedorController->inicializarParametrosQueryString($post1);
				$consignaciones_porfechas_porvendedorController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='consignaciones_porfechas_porvendedores') {  
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/consignaciones_porfechas_porvendedores_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/report/consignaciones_porfechas_porvendedores_control;
	
				$consignaciones_porfechas_porvendedoresController=new consignaciones_porfechas_porvendedores_control();
				$consignaciones_porfechas_porvendedoresController->inicializarParametrosQueryString($post1);
				$consignaciones_porfechas_porvendedoresController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='consignaciones_porfechas_vencidas') {  
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/consignaciones_porfechas_vencidas_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/report/consignaciones_porfechas_vencidas_control;
	
				$consignaciones_porfechas_vencidasController=new consignaciones_porfechas_vencidas_control();
				$consignaciones_porfechas_vencidasController->inicializarParametrosQueryString($post1);
				$consignaciones_porfechas_vencidasController->ejecutarParametrosQueryString();
			}
			else if($controllerParaEjecutar=='consignaciones_pornumero') {  
				//include_once('com/bydan/contabilidad/estimados/presentation/control/report/consignaciones_pornumero_control.php');
				//PHP5.3-use com/bydan/contabilidad/estimadospresentation/control/report/consignaciones_pornumero_control;
	
				$consignaciones_pornumeroController=new consignaciones_pornumero_control();
				$consignaciones_pornumeroController->inicializarParametrosQueryString($post1);
				$consignaciones_pornumeroController->ejecutarParametrosQueryString();
			}
			*/
		}
	}
}
?>