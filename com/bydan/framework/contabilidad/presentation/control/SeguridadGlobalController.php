<?php declare(strict_types = 1);

namespace com\bydan\framework\contabilidad\presentation\control;

use com\bydan\contabilidad\seguridad\accion\presentation\control\accion_control;
use com\bydan\contabilidad\seguridad\auditoria\presentation\control\auditoria_control;
use com\bydan\contabilidad\seguridad\auditoria_detalle\presentation\control\auditoria_detalle_control;
use com\bydan\contabilidad\seguridad\campo\presentation\control\campo_control;
use com\bydan\contabilidad\seguridad\ciudad\presentation\control\ciudad_control;
use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\control\dato_general_usuario_control;
use com\bydan\contabilidad\seguridad\grupo_opcion\presentation\control\grupo_opcion_control;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\presentation\control\historial_cambio_clave_control;
use com\bydan\contabilidad\seguridad\modulo\presentation\control\modulo_control;
use com\bydan\contabilidad\seguridad\municipio\presentation\control\municipio_control;
use com\bydan\contabilidad\seguridad\opcion\presentation\control\opcion_control;
use com\bydan\contabilidad\seguridad\pais\presentation\control\pais_control;
use com\bydan\contabilidad\seguridad\paquete\presentation\control\paquete_control;
use com\bydan\contabilidad\seguridad\parametro_general_sg\presentation\control\parametro_general_sg_control;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\presentation\control\parametro_general_usuario_control;
use com\bydan\contabilidad\seguridad\perfil\presentation\control\perfil_control;
use com\bydan\contabilidad\seguridad\perfil_accion\presentation\control\perfil_accion_control;
use com\bydan\contabilidad\seguridad\perfil_campo\presentation\control\perfil_campo_control;
use com\bydan\contabilidad\seguridad\perfil_opcion\presentation\control\perfil_opcion_control;
use com\bydan\contabilidad\seguridad\perfil_usuario\presentation\control\perfil_usuario_control;
use com\bydan\contabilidad\seguridad\provincia\presentation\control\provincia_control;
use com\bydan\contabilidad\seguridad\resumen_usuario\presentation\control\resumen_usuario_control;
use com\bydan\contabilidad\seguridad\sistema\presentation\control\sistema_control;
use com\bydan\contabilidad\seguridad\tipo_fondo\presentation\control\tipo_fondo_control;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\presentation\control\tipo_tecla_mascara_control;
use com\bydan\contabilidad\seguridad\usuario\presentation\control\usuario_control;
		

class SeguridadGlobalController {
	
    public static function CargarEjecutarController(string $controllerParaEjecutar,string $sub_moduloParaVisualizar='',mixed $post1) {
		
		if($sub_moduloParaVisualizar==null || $sub_moduloParaVisualizar=='') {

			if($controllerParaEjecutar=='accion') {  
			//include_once('com/bydan/contabilidad/seguridad/accion/presentation/control/accion_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/accion_control;

			$accion_control=new accion_control();
			$accion_control->inicializarParametrosQueryString($post1);
			$accion_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='auditoria') {  
			//include_once('com/bydan/contabilidad/seguridad/auditoria/presentation/control/auditoria_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/auditoria_control;

			$auditoria_control=new auditoria_control();
			$auditoria_control->inicializarParametrosQueryString($post1);
			$auditoria_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='auditoria_detalle') {  
			//include_once('com/bydan/contabilidad/seguridad/auditoria_detalle/presentation/control/auditoria_detalle_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/auditoria_detalle_control;

			$auditoria_detalle_control=new auditoria_detalle_control();
			$auditoria_detalle_control->inicializarParametrosQueryString($post1);
			$auditoria_detalle_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='campo') {  
			//include_once('com/bydan/contabilidad/seguridad/campo/presentation/control/campo_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/campo_control;

			$campo_control=new campo_control();
			$campo_control->inicializarParametrosQueryString($post1);
			$campo_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='ciudad') {  
			//include_once('com/bydan/contabilidad/seguridad/ciudad/presentation/control/ciudad_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/ciudad_control;

			$ciudad_control=new ciudad_control();
			$ciudad_control->inicializarParametrosQueryString($post1);
			$ciudad_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='dato_general_usuario') {  
			//include_once('com/bydan/contabilidad/seguridad/dato_general_usuario/presentation/control/dato_general_usuario_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/dato_general_usuario_control;

			$dato_general_usuario_control=new dato_general_usuario_control();
			$dato_general_usuario_control->inicializarParametrosQueryString($post1);
			$dato_general_usuario_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='grupo_opcion') {  
			//include_once('com/bydan/contabilidad/seguridad/grupo_opcion/presentation/control/grupo_opcion_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/grupo_opcion_control;

			$grupo_opcion_control=new grupo_opcion_control();
			$grupo_opcion_control->inicializarParametrosQueryString($post1);
			$grupo_opcion_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='historial_cambio_clave') {  
			//include_once('com/bydan/contabilidad/seguridad/historial_cambio_clave/presentation/control/historial_cambio_clave_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/historial_cambio_clave_control;

			$historial_cambio_clave_control=new historial_cambio_clave_control();
			$historial_cambio_clave_control->inicializarParametrosQueryString($post1);
			$historial_cambio_clave_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='modulo') {  
			//include_once('com/bydan/contabilidad/seguridad/modulo/presentation/control/modulo_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/modulo_control;

			$modulo_control=new modulo_control();
			$modulo_control->inicializarParametrosQueryString($post1);
			$modulo_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='municipio') {  
			//include_once('com/bydan/contabilidad/seguridad/municipio/presentation/control/municipio_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/municipio_control;

			$municipio_control=new municipio_control();
			$municipio_control->inicializarParametrosQueryString($post1);
			$municipio_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='opcion') {  
			//include_once('com/bydan/contabilidad/seguridad/opcion/presentation/control/opcion_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/opcion_control;

			$opcion_control=new opcion_control();
			$opcion_control->inicializarParametrosQueryString($post1);
			$opcion_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='pais') {  
			//include_once('com/bydan/contabilidad/seguridad/pais/presentation/control/pais_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/pais_control;

			$pais_control=new pais_control();
			$pais_control->inicializarParametrosQueryString($post1);
			$pais_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='paquete') {  
			//include_once('com/bydan/contabilidad/seguridad/paquete/presentation/control/paquete_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/paquete_control;

			$paquete_control=new paquete_control();
			$paquete_control->inicializarParametrosQueryString($post1);
			$paquete_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='parametro_general_sg') {  
			//include_once('com/bydan/contabilidad/seguridad/parametro_general_sg/presentation/control/parametro_general_sg_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/parametro_general_sg_control;

			$parametro_general_sg_control=new parametro_general_sg_control();
			$parametro_general_sg_control->inicializarParametrosQueryString($post1);
			$parametro_general_sg_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='parametro_general_usuario') {  
			//include_once('com/bydan/contabilidad/seguridad/parametro_general_usuario/presentation/control/parametro_general_usuario_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/parametro_general_usuario_control;

			$parametro_general_usuario_control=new parametro_general_usuario_control();
			$parametro_general_usuario_control->inicializarParametrosQueryString($post1);
			$parametro_general_usuario_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='perfil') {  
			//include_once('com/bydan/contabilidad/seguridad/perfil/presentation/control/perfil_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/perfil_control;

			$perfil_control=new perfil_control();
			$perfil_control->inicializarParametrosQueryString($post1);
			$perfil_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='perfil_accion') {  
			//include_once('com/bydan/contabilidad/seguridad/perfil_accion/presentation/control/perfil_accion_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/perfil_accion_control;

			$perfil_accion_control=new perfil_accion_control();
			$perfil_accion_control->inicializarParametrosQueryString($post1);
			$perfil_accion_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='perfil_campo') {  
			//include_once('com/bydan/contabilidad/seguridad/perfil_campo/presentation/control/perfil_campo_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/perfil_campo_control;

			$perfil_campo_control=new perfil_campo_control();
			$perfil_campo_control->inicializarParametrosQueryString($post1);
			$perfil_campo_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='perfil_opcion') {  
			//include_once('com/bydan/contabilidad/seguridad/perfil_opcion/presentation/control/perfil_opcion_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/perfil_opcion_control;

			$perfil_opcion_control=new perfil_opcion_control();
			$perfil_opcion_control->inicializarParametrosQueryString($post1);
			$perfil_opcion_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='perfil_usuario') {  
			//include_once('com/bydan/contabilidad/seguridad/perfil_usuario/presentation/control/perfil_usuario_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/perfil_usuario_control;

			$perfil_usuario_control=new perfil_usuario_control();
			$perfil_usuario_control->inicializarParametrosQueryString($post1);
			$perfil_usuario_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='provincia') {  
			//include_once('com/bydan/contabilidad/seguridad/provincia/presentation/control/provincia_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/provincia_control;

			$provincia_control=new provincia_control();
			$provincia_control->inicializarParametrosQueryString($post1);
			$provincia_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='resumen_usuario') {  
			//include_once('com/bydan/contabilidad/seguridad/resumen_usuario/presentation/control/resumen_usuario_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/resumen_usuario_control;

			$resumen_usuario_control=new resumen_usuario_control();
			$resumen_usuario_control->inicializarParametrosQueryString($post1);
			$resumen_usuario_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='sistema') {  
			//include_once('com/bydan/contabilidad/seguridad/sistema/presentation/control/sistema_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/sistema_control;

			$sistema_control=new sistema_control();
			$sistema_control->inicializarParametrosQueryString($post1);
			$sistema_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='tipo_fondo') {  
			//include_once('com/bydan/contabilidad/seguridad/tipo_fondo/presentation/control/tipo_fondo_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/tipo_fondo_control;

			$tipo_fondo_control=new tipo_fondo_control();
			$tipo_fondo_control->inicializarParametrosQueryString($post1);
			$tipo_fondo_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='tipo_tecla_mascara') {  
			//include_once('com/bydan/contabilidad/seguridad/tipo_tecla_mascara/presentation/control/tipo_tecla_mascara_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/tipo_tecla_mascara_control;

			$tipo_tecla_mascara_control=new tipo_tecla_mascara_control();
			$tipo_tecla_mascara_control->inicializarParametrosQueryString($post1);
			$tipo_tecla_mascara_control->ejecutarParametrosQueryString();
		}
		else if($controllerParaEjecutar=='usuario') {  
			//include_once('com/bydan/contabilidad/seguridad/usuario/presentation/control/usuario_control.php');
			//PHP5.3-use com/bydan/contabilidad/seguridadpresentation/control/usuario_control;

			$usuario_control=new usuario_control();
			$usuario_control->inicializarParametrosQueryString($post1);
			$usuario_control->ejecutarParametrosQueryString();
		}

		} else if($sub_moduloParaVisualizar=='report') {
			
		}
	}
}

?>