<?php declare(strict_types = 1);
 /*
*AVISO LEGAL
(C) Copyright
*Este programa esta protegido por la ley de derechos de autor.
*La reproduccion o distribucion ilicita de este programa o de cualquiera de
*sus partes esta penado por la ley con severas sanciones civiles y penales,
*y seran objeto de todas las sanciones legales que correspondan.

*Su contenido no puede copiarse para fines comerciales o de otras,
*ni puede mostrarse, incluso en una version modificada, en otros sitios Web.
Solo esta permitido colocar hipervinculos al sitio web.
*/

namespace com\bydan\contabilidad\cuentascobrar\cliente\util;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\PaqueteTipo;

//FK

use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_carga;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\util\categoria_cliente_carga;
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_carga;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_carga;
use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_carga;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_carga;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_carga;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_carga;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;

//REL

use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;//1-M,M-M
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;//1-M,M-M
use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_carga;//1-M,M-M
use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;//1-M,M-M
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\util\imagen_cliente_carga;//1-M,M-M
use com\bydan\contabilidad\facturacion\factura\util\factura_carga;//1-M,M-M
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;//1-M,M-M
use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_carga;//1-M,M-M

//SEGURIDAD GENERAL

use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_carga;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_carga;
use com\bydan\contabilidad\seguridad\accion\util\accion_carga;
use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;

use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_carga;
use com\bydan\contabilidad\seguridad\parametro_general_usuario\util\parametro_general_usuario_carga;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;
use com\bydan\contabilidad\seguridad\parametro_general_sg\util\parametro_general_sg_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_carga;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_carga;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_carga;


class cliente_carga {
		
	function __construct() {			
	
    } 
	
	/*PARAMETROS*/
	public static bool $DATA_ACCESS=false;
	public static bool $ENTITIES=false;
	public static bool $INTERFACE=false;
	public static bool $LOGIC=false;
	public static bool $CONSTANTES_FUNCIONES=false;
	public static bool $CONTROLLER=false;
	public static bool $WEB=false;
	public static bool $WEB_SESSION=false;
	public static bool $REPORTE=false;
		
	public static function cargarArchivosFrameworkBase(string $paqueteTipo='CONTROLLER') {
		Funciones::cargarArchivosFrameworkBase($paqueteTipo);
	}
	
	/*GENERAL*/
	public static function cargarArchivosPaquetesBase(string $paqueteTipo='CONTROLLER') {
		
		if($paqueteTipo==PaqueteTipo::$CONTROLLER || $paqueteTipo==PaqueteTipo::$LOGIC) {
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/util/cliente_util.php');			
			
			
			/*include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/util/clienteParameterGeneral.php');*/
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/util/cliente_param_return.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/business/entity/cliente.php');						
			/*include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/business/entity/clienteForeignKey.php');*/
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/business/data/cliente_dataI.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/business/data/cliente_data.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/business/logic/cliente_logicI.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/business/logic/cliente_logic.php');
		}
		
		if($paqueteTipo==PaqueteTipo::$CONTROLLER) {
			
			
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/presentation/session/cliente_session.php');
						
			/*SEGURIDAD*/
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/perfil_usuario/util/perfil_usuario_carga.php');
			perfil_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/perfil_opcion/util/perfil_opcion_carga.php');
			perfil_opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/accion/util/accion_carga.php');
			accion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/perfil_accion/util/perfil_accion_carga.php');
			perfil_accion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/usuario/util/usuario_carga.php');
			usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
			/*ENTITIES*/
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/resumen_usuario/util/resumen_usuario_carga.php');
			resumen_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/parametro_general_usuario/util/parametro_general_usuario_carga.php');
			parametro_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$ENTITIES);
			parametro_general_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/parametro_general_sg/util/parametro_general_sg_carga.php');
			parametro_general_sg_carga::cargarArchivosPaquetesBase(PaqueteTipo::$ENTITIES);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/resumen_usuario/util/resumen_usuario_carga.php');
			resumen_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$ENTITIES);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/modulo/util/modulo_carga.php');
			modulo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$ENTITIES);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/opcion/util/opcion_carga.php');
			opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$ENTITIES);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/sistema/util/sistema_carga.php');
			sistema_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
			sistema_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/opcion/util/opcion_carga.php');
			opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$LOGIC);
			/*SEGURIDAD_FIN*/
			
		} else if($paqueteTipo==PaqueteTipo::$ENTITIES) {
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/business/entity/cliente.php');
		
		} else if($paqueteTipo==PaqueteTipo::$CONSTANTES_FUNCIONES) {
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/util/cliente_util.php');
			
						
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/util/cliente_param_return.php');
			
		} else if($paqueteTipo==PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS) {
			
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/util/cliente_util.php');		
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/business/entity/cliente.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/business/data/cliente_dataI.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/business/data/cliente_data.php');
			
		
		} else if($paqueteTipo==PaqueteTipo::$ENTITIES.PaqueteTipo::$WEB_SESSION) {

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/util/cliente_util.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/business/entity/cliente.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/presentation/session/cliente_session.php');		
		
		} else if($paqueteTipo==PaqueteTipo::$WEB) {
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/presentation/view/cliente_web.php');
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/parametro_general_usuario/business/entity/parametro_general_usuario.php');
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/modulo/business/entity/modulo.php');
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/usuario/business/entity/usuario.php');
		}
		
		Funciones::cargarArchivosPaquetesBase($paqueteTipo);
	}
	
	/*AUXILIAR*/
	public static function cargarArchivosPaquetes(array $arrPaquetesTipos=array()) {
		
		if(!Constantes::$BIT_CONCARGA_INICIAL) {
			
			foreach($arrPaquetesTipos as $sPaqueteTipo) {
				
				if($sPaqueteTipo==PaqueteTipo::$ENTITIES) {
					if((!cliente_carga::$ENTITIES && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/business/entity/cliente.php');				
						cliente_carga::$ENTITIES=true;
						continue;
					}    			    			
				} else if($sPaqueteTipo==PaqueteTipo::$DATA_ACCESS) {
					if((!cliente_carga::$DATA_ACCESS && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/business/data/cliente_dataI.php');
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/business/data/cliente_data.php');
						cliente_carga::$DATA_ACCESS=true;
						continue;
					}    			
				} else if($sPaqueteTipo==PaqueteTipo::$INTERFACE) {
					if((!cliente_carga::$INTERFACE && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						continue;
					}    			
				} else if($sPaqueteTipo==PaqueteTipo::$LOGIC) {
					if((!cliente_carga::$LOGIC && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/business/logic/cliente_logic.php');
						cliente_carga::$LOGIC=true;
						continue;
					}
				} else if($sPaqueteTipo==PaqueteTipo::$CONSTANTES_FUNCIONES) {
					if((!cliente_carga::$CONSTANTES_FUNCIONES && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/util/cliente_util.php');
						cliente_carga::$CONSTANTES_FUNCIONES=true;
						continue;
					}
				} else if($sPaqueteTipo==PaqueteTipo::$CONTROLLER) {
					/* && Constantes::$CON_CONTROL_CARGAR
					Es Raiz de todo
					*/
					continue;
					
				} else if($sPaqueteTipo==PaqueteTipo::$REPORTE) {
					/* && Constantes::$CON_CONTROL_CARGAR
					Esta en controller
					*/
					continue;
					
				} else if($sPaqueteTipo==PaqueteTipo::$WEB) {
					/* && Constantes::$CON_CONTROL_CARGAR
					Esta en controller y es Html
					*/
					continue;
					
				} else if($sPaqueteTipo==PaqueteTipo::$WEB_SESSION) {
					if((!cliente_carga::$WEB_SESSION && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/presentation/session/cliente_session.php');
						cliente_carga::$WEB_SESSION=true;
						continue;
					}
				}
			}
		}
		
		Funciones::cargarArchivosPaquetes($arrPaquetesTipos);
	}
	
	/*FKs*/
	public static function cargarArchivosPaquetesForeignKeys(string $paqueteTipo='LOGIC') {
		

		include_once('com/bydan/contabilidad/general/empresa/util/empresa_carga.php');
		empresa_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/general/tipo_persona/util/tipo_persona_carga.php');
		tipo_persona_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentascobrar/categoria_cliente/util/categoria_cliente_carga.php');
		categoria_cliente_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/inventario/tipo_precio/util/tipo_precio_carga.php');
		tipo_precio_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentascobrar/giro_negocio_cliente/util/giro_negocio_cliente_carga.php');
		giro_negocio_cliente_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/seguridad/pais/util/pais_carga.php');
		pais_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/seguridad/provincia/util/provincia_carga.php');
		provincia_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/seguridad/ciudad/util/ciudad_carga.php');
		ciudad_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/facturacion/vendedor/util/vendedor_carga.php');
		vendedor_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentascobrar/termino_pago_cliente/util/termino_pago_cliente_carga.php');
		termino_pago_cliente_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/contabilidad/cuenta/util/cuenta_carga.php');
		cuenta_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/facturacion/impuesto/util/impuesto_carga.php');
		impuesto_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/facturacion/retencion/util/retencion_carga.php');
		retencion_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/facturacion/retencion_fuente/util/retencion_fuente_carga.php');
		retencion_fuente_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/facturacion/retencion_ica/util/retencion_ica_carga.php');
		retencion_ica_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/facturacion/otro_impuesto/util/otro_impuesto_carga.php');
		otro_impuesto_carga::cargarArchivosPaquetesBase($paqueteTipo);
		
		Funciones::cargarArchivosPaquetesForeignKeys($paqueteTipo);
		
	}
	
	/*RELACIONES*/
	public static function cargarArchivosPaquetesRelaciones(string $paqueteTipo='LOGIC') {
		
		include_once('com/bydan/contabilidad/facturacion/devolucion_factura/util/devolucion_factura_carga.php');
		devolucion_factura_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/facturacion/devolucion_factura/presentation/session/devolucion_factura_session.php');
		//use com\bydan\contabilidad\facturacion\devolucion_factura\presentation\session\devolucion_factura_session;

		include_once('com/bydan/contabilidad/cuentascobrar/cuenta_cobrar/util/cuenta_cobrar_carga.php');
		cuenta_cobrar_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentascobrar/cuenta_cobrar/presentation/session/cuenta_cobrar_session.php');
		//use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\presentation\session\cuenta_cobrar_session;

		include_once('com/bydan/contabilidad/cuentascobrar/documento_cliente/util/documento_cliente_carga.php');
		documento_cliente_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentascobrar/documento_cliente/presentation/session/documento_cliente_session.php');
		//use com\bydan\contabilidad\cuentascobrar\documento_cliente\presentation\session\documento_cliente_session;

		include_once('com/bydan/contabilidad/estimados/estimado/util/estimado_carga.php');
		estimado_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/estimados/estimado/presentation/session/estimado_session.php');
		//use com\bydan\contabilidad\estimados\estimado\presentation\session\estimado_session;

		include_once('com/bydan/contabilidad/cuentascobrar/imagen_cliente/util/imagen_cliente_carga.php');
		imagen_cliente_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentascobrar/imagen_cliente/presentation/session/imagen_cliente_session.php');
		//use com\bydan\contabilidad\cuentascobrar\imagen_cliente\presentation\session\imagen_cliente_session;

		include_once('com/bydan/contabilidad/facturacion/factura/util/factura_carga.php');
		factura_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/facturacion/factura/presentation/session/factura_session.php');
		//use com\bydan\contabilidad\facturacion\factura\presentation\session\factura_session;

		include_once('com/bydan/contabilidad/estimados/consignacion/util/consignacion_carga.php');
		consignacion_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/estimados/consignacion/presentation/session/consignacion_session.php');
		//use com\bydan\contabilidad\estimados\consignacion\presentation\session\consignacion_session;

		include_once('com/bydan/contabilidad/inventario/lista_cliente/util/lista_cliente_carga.php');
		lista_cliente_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/inventario/lista_cliente/presentation/session/lista_cliente_session.php');
		//use com\bydan\contabilidad\inventario\lista_cliente\presentation\session\lista_cliente_session;

		
		Funciones::cargarArchivosPaquetesRelaciones($paqueteTipo);
	}
	
	/*
	interface cliente_carga {
		public static function cargarArchivosFrameworkBase(string $paqueteTipo='CONTROLLER');
		public static function cargarArchivosPaquetesBase(string $paqueteTipo='CONTROLLER');
		public static function cargarArchivosPaquetes(array $arrPaquetesTipos=array());
		public static function cargarArchivosPaquetesForeignKeys(string $paqueteTipo='LOGIC');
		public static function cargarArchivosPaquetesRelaciones(string $paqueteTipo='LOGIC');
	}
	*/
}
?>
