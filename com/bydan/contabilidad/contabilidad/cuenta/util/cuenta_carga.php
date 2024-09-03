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

namespace com\bydan\contabilidad\contabilidad\cuenta\util;

use com\bydan\framework\contabilidad\util\Constantes;
use com\bydan\framework\contabilidad\util\Funciones;
use com\bydan\framework\contabilidad\util\PaqueteTipo;

//FK

use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_carga;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_carga;

//REL

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_carga;//1-M,M-M
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;//1-M,M-M
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_carga;//1-M,M-M
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;//1-M,M-M
use com\bydan\contabilidad\inventario\producto\util\producto_carga;//1-M,M-M
use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\util\instrumento_pago_carga;//1-M,M-M
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;//1-M,M-M
use com\bydan\contabilidad\contabilidad\asiento_detalle\util\asiento_detalle_carga;//1-M,M-M
use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;//1-M,M-M
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_carga;//1-M,M-M
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;//1-M,M-M
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_carga;//1-M,M-M
use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_carga;//1-M,M-M
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;//1-M,M-M
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_carga;//1-M,M-M
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_carga;//1-M,M-M
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;//1-M,M-M
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_carga;//1-M,M-M
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_carga;//1-M,M-M
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;//1-M,M-M

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


class cuenta_carga {
		
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
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/util/cuenta_util.php');			
			
			
			/*include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/util/cuentaParameterGeneral.php');*/
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/util/cuenta_param_return.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/business/entity/cuenta.php');						
			/*include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/business/entity/cuentaForeignKey.php');*/
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/business/data/cuenta_dataI.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/business/data/cuenta_data.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/business/logic/cuenta_logicI.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/business/logic/cuenta_logic.php');
		}
		
		if($paqueteTipo==PaqueteTipo::$CONTROLLER) {
			
			
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/presentation/session/cuenta_session.php');
						
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
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/business/entity/cuenta.php');
		
		} else if($paqueteTipo==PaqueteTipo::$CONSTANTES_FUNCIONES) {
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/util/cuenta_util.php');
			
						
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/util/cuenta_param_return.php');
			
		} else if($paqueteTipo==PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS) {
			
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/util/cuenta_util.php');		
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/business/entity/cuenta.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/business/data/cuenta_dataI.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/business/data/cuenta_data.php');
			
		
		} else if($paqueteTipo==PaqueteTipo::$ENTITIES.PaqueteTipo::$WEB_SESSION) {

			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/util/cuenta_util.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/business/entity/cuenta.php');
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/presentation/session/cuenta_session.php');		
		
		} else if($paqueteTipo==PaqueteTipo::$WEB) {
			
			include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/presentation/view/cuenta_web.php');
			
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
					if((!cuenta_carga::$ENTITIES && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/business/entity/cuenta.php');				
						cuenta_carga::$ENTITIES=true;
						continue;
					}    			    			
				} else if($sPaqueteTipo==PaqueteTipo::$DATA_ACCESS) {
					if((!cuenta_carga::$DATA_ACCESS && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/business/data/cuenta_dataI.php');
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/business/data/cuenta_data.php');
						cuenta_carga::$DATA_ACCESS=true;
						continue;
					}    			
				} else if($sPaqueteTipo==PaqueteTipo::$INTERFACE) {
					if((!cuenta_carga::$INTERFACE && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						continue;
					}    			
				} else if($sPaqueteTipo==PaqueteTipo::$LOGIC) {
					if((!cuenta_carga::$LOGIC && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/business/logic/cuenta_logic.php');
						cuenta_carga::$LOGIC=true;
						continue;
					}
				} else if($sPaqueteTipo==PaqueteTipo::$CONSTANTES_FUNCIONES) {
					if((!cuenta_carga::$CONSTANTES_FUNCIONES && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/util/cuenta_util.php');
						cuenta_carga::$CONSTANTES_FUNCIONES=true;
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
					if((!cuenta_carga::$WEB_SESSION && Constantes::$CON_CONTROL_CARGAR) || !Constantes::$CON_CONTROL_CARGAR) {
						include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta/presentation/session/cuenta_session.php');
						cuenta_carga::$WEB_SESSION=true;
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

		include_once('com/bydan/contabilidad/contabilidad/tipo_cuenta/util/tipo_cuenta_carga.php');
		tipo_cuenta_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/contabilidad/tipo_nivel_cuenta/util/tipo_nivel_cuenta_carga.php');
		tipo_nivel_cuenta_carga::cargarArchivosPaquetesBase($paqueteTipo);
		
		Funciones::cargarArchivosPaquetesForeignKeys($paqueteTipo);
		
	}
	
	/*RELACIONES*/
	public static function cargarArchivosPaquetesRelaciones(string $paqueteTipo='LOGIC') {
		
		include_once('com/bydan/contabilidad/cuentascorrientes/categoria_cheque/util/categoria_cheque_carga.php');
		categoria_cheque_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentascorrientes/categoria_cheque/presentation/session/categoria_cheque_session.php');
		//use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\presentation\session\categoria_cheque_session;

		include_once('com/bydan/contabilidad/facturacion/otro_impuesto/util/otro_impuesto_carga.php');
		otro_impuesto_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/facturacion/otro_impuesto/presentation/session/otro_impuesto_session.php');
		//use com\bydan\contabilidad\facturacion\otro_impuesto\presentation\session\otro_impuesto_session;

		include_once('com/bydan/contabilidad/facturacion/impuesto/util/impuesto_carga.php');
		impuesto_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/facturacion/impuesto/presentation/session/impuesto_session.php');
		//use com\bydan\contabilidad\facturacion\impuesto\presentation\session\impuesto_session;

		include_once('com/bydan/contabilidad/cuentascorrientes/cuenta_corriente/util/cuenta_corriente_carga.php');
		cuenta_corriente_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentascorrientes/cuenta_corriente/presentation/session/cuenta_corriente_session.php');
		//use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\presentation\session\cuenta_corriente_session;

		include_once('com/bydan/contabilidad/inventario/producto/util/producto_carga.php');
		producto_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/inventario/producto/presentation/session/producto_session.php');
		//use com\bydan\contabilidad\inventario\producto\presentation\session\producto_session;

		include_once('com/bydan/contabilidad/cuentascorrientes/instrumento_pago/util/instrumento_pago_carga.php');
		instrumento_pago_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentascorrientes/instrumento_pago/presentation/session/instrumento_pago_session.php');
		//use com\bydan\contabilidad\cuentascorrientes\instrumento_pago\presentation\session\instrumento_pago_session;

		include_once('com/bydan/contabilidad/inventario/lista_producto/util/lista_producto_carga.php');
		lista_producto_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/inventario/lista_producto/presentation/session/lista_producto_session.php');
		//use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;

		include_once('com/bydan/contabilidad/contabilidad/asiento_detalle/util/asiento_detalle_carga.php');
		asiento_detalle_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/contabilidad/asiento_detalle/presentation/session/asiento_detalle_session.php');
		//use com\bydan\contabilidad\contabilidad\asiento_detalle\presentation\session\asiento_detalle_session;

		include_once('com/bydan/contabilidad/facturacion/retencion/util/retencion_carga.php');
		retencion_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/facturacion/retencion/presentation/session/retencion_session.php');
		//use com\bydan\contabilidad\facturacion\retencion\presentation\session\retencion_session;

		include_once('com/bydan/contabilidad/facturacion/retencion_fuente/util/retencion_fuente_carga.php');
		retencion_fuente_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/facturacion/retencion_fuente/presentation/session/retencion_fuente_session.php');
		//use com\bydan\contabilidad\facturacion\retencion_fuente\presentation\session\retencion_fuente_session;

		include_once('com/bydan/contabilidad/cuentaspagar/proveedor/util/proveedor_carga.php');
		proveedor_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentaspagar/proveedor/presentation/session/proveedor_session.php');
		//use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;

		include_once('com/bydan/contabilidad/cuentascobrar/forma_pago_cliente/util/forma_pago_cliente_carga.php');
		forma_pago_cliente_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentascobrar/forma_pago_cliente/presentation/session/forma_pago_cliente_session.php');
		//use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\presentation\session\forma_pago_cliente_session;

		include_once('com/bydan/contabilidad/contabilidad/saldo_cuenta/util/saldo_cuenta_carga.php');
		saldo_cuenta_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/contabilidad/saldo_cuenta/presentation/session/saldo_cuenta_session.php');
		//use com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\session\saldo_cuenta_session;

		include_once('com/bydan/contabilidad/cuentaspagar/termino_pago_proveedor/util/termino_pago_proveedor_carga.php');
		termino_pago_proveedor_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentaspagar/termino_pago_proveedor/presentation/session/termino_pago_proveedor_session.php');
		//use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\session\termino_pago_proveedor_session;

		include_once('com/bydan/contabilidad/facturacion/retencion_ica/util/retencion_ica_carga.php');
		retencion_ica_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/facturacion/retencion_ica/presentation/session/retencion_ica_session.php');
		//use com\bydan\contabilidad\facturacion\retencion_ica\presentation\session\retencion_ica_session;

		include_once('com/bydan/contabilidad/contabilidad/asiento_predefinido_detalle/util/asiento_predefinido_detalle_carga.php');
		asiento_predefinido_detalle_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/contabilidad/asiento_predefinido_detalle/presentation/session/asiento_predefinido_detalle_session.php');
		//use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\presentation\session\asiento_predefinido_detalle_session;

		include_once('com/bydan/contabilidad/cuentascobrar/cliente/util/cliente_carga.php');
		cliente_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentascobrar/cliente/presentation/session/cliente_session.php');
		//use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

		include_once('com/bydan/contabilidad/contabilidad/asiento_automatico_detalle/util/asiento_automatico_detalle_carga.php');
		asiento_automatico_detalle_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/contabilidad/asiento_automatico_detalle/presentation/session/asiento_automatico_detalle_session.php');
		//use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\presentation\session\asiento_automatico_detalle_session;

		include_once('com/bydan/contabilidad/cuentaspagar/forma_pago_proveedor/util/forma_pago_proveedor_carga.php');
		forma_pago_proveedor_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentaspagar/forma_pago_proveedor/presentation/session/forma_pago_proveedor_session.php');
		//use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\presentation\session\forma_pago_proveedor_session;

		include_once('com/bydan/contabilidad/cuentascobrar/termino_pago_cliente/util/termino_pago_cliente_carga.php');
		termino_pago_cliente_carga::cargarArchivosPaquetesBase($paqueteTipo);

		include_once('com/bydan/contabilidad/cuentascobrar/termino_pago_cliente/presentation/session/termino_pago_cliente_session.php');
		//use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\presentation\session\termino_pago_cliente_session;

		
		Funciones::cargarArchivosPaquetesRelaciones($paqueteTipo);
	}
	
	/*
	interface cuenta_carga {
		public static function cargarArchivosFrameworkBase(string $paqueteTipo='CONTROLLER');
		public static function cargarArchivosPaquetesBase(string $paqueteTipo='CONTROLLER');
		public static function cargarArchivosPaquetes(array $arrPaquetesTipos=array());
		public static function cargarArchivosPaquetesForeignKeys(string $paqueteTipo='LOGIC');
		public static function cargarArchivosPaquetesRelaciones(string $paqueteTipo='LOGIC');
	}
	*/
}
?>
