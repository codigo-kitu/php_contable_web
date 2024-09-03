<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\control;

use com\bydan\contabilidad\general\archivo\presentation\control\archivo_control;
use com\bydan\contabilidad\general\comentario_documento\presentation\control\comentario_documento_control;
use com\bydan\contabilidad\general\empresa\presentation\control\empresa_control;
use com\bydan\contabilidad\general\estado\presentation\control\estado_control;
use com\bydan\contabilidad\general\log_actividad\presentation\control\log_actividad_control;
use com\bydan\contabilidad\general\otro_documento\presentation\control\otro_documento_control;
use com\bydan\contabilidad\general\otro_parametro\presentation\control\otro_parametro_control;
use com\bydan\contabilidad\general\parametro_auxiliar\presentation\control\parametro_auxiliar_control;
use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\presentation\control\parametro_auxiliar_facturacion_control;
use com\bydan\contabilidad\general\parametro_general\presentation\control\parametro_general_control;
use com\bydan\contabilidad\general\parametro_generico\presentation\control\parametro_generico_control;
use com\bydan\contabilidad\general\parametro_sql\presentation\control\parametro_sql_control;
use com\bydan\contabilidad\general\propiedad_empresa\presentation\control\propiedad_empresa_control;
use com\bydan\contabilidad\general\reporte_monica\presentation\control\reporte_monica_control;
use com\bydan\contabilidad\general\sucursal\presentation\control\sucursal_control;
use com\bydan\contabilidad\general\tabla\presentation\control\tabla_control;
use com\bydan\contabilidad\general\tipo_costeo_kardex\presentation\control\tipo_costeo_kardex_control;
use com\bydan\contabilidad\general\tipo_forma_pago\presentation\control\tipo_forma_pago_control;
use com\bydan\contabilidad\general\tipo_persona\presentation\control\tipo_persona_control;
use com\bydan\contabilidad\general\tipo_termino_pago\presentation\control\tipo_termino_pago_control;
		

class GeneralGlobalController {
	
    public static function CargarEjecutarController(string $controllerParaEjecutar,string $sub_moduloParaVisualizar='',mixed $post1) {
		
		if($sub_moduloParaVisualizar==null || $sub_moduloParaVisualizar=='') {
            
		    if($controllerParaEjecutar=='archivo') {  
			//include_once('com/bydan/contabilidad/general/archivo/presentation/control/archivo_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/archivo_control;

			$archivo_control=new archivo_control();
			$archivo_control->inicializarParametrosQueryString($post1);
			$archivo_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='comentario_documento') {  
			//include_once('com/bydan/contabilidad/general/comentario_documento/presentation/control/comentario_documento_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/comentario_documento_control;

			$comentario_documento_control=new comentario_documento_control();
			$comentario_documento_control->inicializarParametrosQueryString($post1);
			$comentario_documento_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='empresa') {  
			//include_once('com/bydan/contabilidad/general/empresa/presentation/control/empresa_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/empresa_control;

			$empresa_control=new empresa_control();
			$empresa_control->inicializarParametrosQueryString($post1);
			$empresa_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='estado') {  
			//include_once('com/bydan/contabilidad/general/estado/presentation/control/estado_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/estado_control;

			$estado_control=new estado_control();
			$estado_control->inicializarParametrosQueryString($post1);
			$estado_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='log_actividad') {  
			//include_once('com/bydan/contabilidad/general/log_actividad/presentation/control/log_actividad_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/log_actividad_control;

			$log_actividad_control=new log_actividad_control();
			$log_actividad_control->inicializarParametrosQueryString($post1);
			$log_actividad_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='otro_documento') {  
			//include_once('com/bydan/contabilidad/general/otro_documento/presentation/control/otro_documento_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/otro_documento_control;

			$otro_documento_control=new otro_documento_control();
			$otro_documento_control->inicializarParametrosQueryString($post1);
			$otro_documento_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='otro_parametro') {  
			//include_once('com/bydan/contabilidad/general/otro_parametro/presentation/control/otro_parametro_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/otro_parametro_control;

			$otro_parametro_control=new otro_parametro_control();
			$otro_parametro_control->inicializarParametrosQueryString($post1);
			$otro_parametro_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='parametro_auxiliar') {  
			//include_once('com/bydan/contabilidad/general/parametro_auxiliar/presentation/control/parametro_auxiliar_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/parametro_auxiliar_control;

			$parametro_auxiliar_control=new parametro_auxiliar_control();
			$parametro_auxiliar_control->inicializarParametrosQueryString($post1);
			$parametro_auxiliar_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='parametro_auxiliar_facturacion') {  
			//include_once('com/bydan/contabilidad/general/parametro_auxiliar_facturacion/presentation/control/parametro_auxiliar_facturacion_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/parametro_auxiliar_facturacion_control;

			$parametro_auxiliar_facturacion_control=new parametro_auxiliar_facturacion_control();
			$parametro_auxiliar_facturacion_control->inicializarParametrosQueryString($post1);
			$parametro_auxiliar_facturacion_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='parametro_general') {  
			//include_once('com/bydan/contabilidad/general/parametro_general/presentation/control/parametro_general_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/parametro_general_control;

			$parametro_general_control=new parametro_general_control();
			$parametro_general_control->inicializarParametrosQueryString($post1);
			$parametro_general_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='parametro_generico') {  
			//include_once('com/bydan/contabilidad/general/parametro_generico/presentation/control/parametro_generico_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/parametro_generico_control;

			$parametro_generico_control=new parametro_generico_control();
			$parametro_generico_control->inicializarParametrosQueryString($post1);
			$parametro_generico_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='parametro_sql') {  
			//include_once('com/bydan/contabilidad/general/parametro_sql/presentation/control/parametro_sql_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/parametro_sql_control;

			$parametro_sql_control=new parametro_sql_control();
			$parametro_sql_control->inicializarParametrosQueryString($post1);
			$parametro_sql_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='propiedad_empresa') {  
			//include_once('com/bydan/contabilidad/general/propiedad_empresa/presentation/control/propiedad_empresa_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/propiedad_empresa_control;

			$propiedad_empresa_control=new propiedad_empresa_control();
			$propiedad_empresa_control->inicializarParametrosQueryString($post1);
			$propiedad_empresa_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='reporte_monica') {  
			//include_once('com/bydan/contabilidad/general/reporte_monica/presentation/control/reporte_monica_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/reporte_monica_control;

			$reporte_monica_control=new reporte_monica_control();
			$reporte_monica_control->inicializarParametrosQueryString($post1);
			$reporte_monica_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='sucursal') {  
			//include_once('com/bydan/contabilidad/general/sucursal/presentation/control/sucursal_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/sucursal_control;

			$sucursal_control=new sucursal_control();
			$sucursal_control->inicializarParametrosQueryString($post1);
			$sucursal_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='tabla') {  
			//include_once('com/bydan/contabilidad/general/tabla/presentation/control/tabla_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/tabla_control;

			$tabla_control=new tabla_control();
			$tabla_control->inicializarParametrosQueryString($post1);
			$tabla_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='tipo_costeo_kardex') {  
			//include_once('com/bydan/contabilidad/general/tipo_costeo_kardex/presentation/control/tipo_costeo_kardex_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/tipo_costeo_kardex_control;

			$tipo_costeo_kardex_control=new tipo_costeo_kardex_control();
			$tipo_costeo_kardex_control->inicializarParametrosQueryString($post1);
			$tipo_costeo_kardex_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='tipo_forma_pago') {  
			//include_once('com/bydan/contabilidad/general/tipo_forma_pago/presentation/control/tipo_forma_pago_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/tipo_forma_pago_control;

			$tipo_forma_pago_control=new tipo_forma_pago_control();
			$tipo_forma_pago_control->inicializarParametrosQueryString($post1);
			$tipo_forma_pago_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='tipo_persona') {  
			//include_once('com/bydan/contabilidad/general/tipo_persona/presentation/control/tipo_persona_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/tipo_persona_control;

			$tipo_persona_control=new tipo_persona_control();
			$tipo_persona_control->inicializarParametrosQueryString($post1);
			$tipo_persona_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='tipo_termino_pago') {  
			//include_once('com/bydan/contabilidad/general/tipo_termino_pago/presentation/control/tipo_termino_pago_control.php');
			//PHP5.3-use com/bydan/contabilidad/generalpresentation/control/tipo_termino_pago_control;

			$tipo_termino_pago_control=new tipo_termino_pago_control();
			$tipo_termino_pago_control->inicializarParametrosQueryString($post1);
			$tipo_termino_pago_control->ejecutarParametrosQueryString();
		}

		} else if($sub_moduloParaVisualizar=='report') {
			
		}
	}
}
?>