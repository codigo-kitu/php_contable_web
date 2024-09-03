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

namespace com\bydan\contabilidad\cuentascobrar\cliente\presentation\control;

use Exception;

include_once('com/bydan/framework/contabilidad/util/Constantes.php');
use com\bydan\framework\contabilidad\util\Constantes;

include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/Funciones.php');
use com\bydan\framework\contabilidad\util\Funciones;

use com\bydan\framework\contabilidad\util\FuncionesWebArbol;

include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/PaqueteTipo.php');
use com\bydan\framework\contabilidad\util\PaqueteTipo;

use com\bydan\framework\contabilidad\util\ControlTipo;
use com\bydan\framework\contabilidad\util\DeepLoadType;
use com\bydan\framework\contabilidad\util\EventoTipo;
use com\bydan\framework\contabilidad\util\EventoSubTipo;
use com\bydan\framework\contabilidad\util\EventoGlobalTipo;
use com\bydan\framework\contabilidad\util\FuncionesObject;
use com\bydan\framework\contabilidad\util\Connexion;

use com\bydan\framework\contabilidad\util\excel\ExcelHelper;
use com\bydan\framework\contabilidad\util\pdf\FpdfHelper;

use com\bydan\framework\contabilidad\business\entity\Classe;
use com\bydan\framework\contabilidad\business\entity\Mensajes;
use com\bydan\framework\contabilidad\business\entity\SelectItem;

//use com\bydan\framework\contabilidad\business\entity\DatoGeneralMinimo;
//use com\bydan\framework\contabilidad\business\logic\DatosDeep;

use com\bydan\framework\contabilidad\business\entity\Reporte;
use com\bydan\framework\contabilidad\business\entity\ConexionController;

use com\bydan\framework\contabilidad\business\data\ModelBase;

use com\bydan\framework\contabilidad\business\logic\DatosCliente;
use com\bydan\framework\contabilidad\business\logic\Pagination;

use com\bydan\framework\contabilidad\presentation\report\CellReport;
use com\bydan\framework\contabilidad\presentation\templating\Template;

use com\bydan\framework\contabilidad\presentation\web\control\ControllerBase;

use com\bydan\framework\contabilidad\presentation\web\SessionBase;
use com\bydan\framework\contabilidad\presentation\web\PaginationLink;
use com\bydan\framework\contabilidad\presentation\web\HistoryWeb;

use com\bydan\framework\contabilidad\business\entity\MaintenanceType;
use com\bydan\framework\contabilidad\business\entity\ParameterDivSecciones;
//use com\bydan\framework\contabilidad\business\entity\Classe;
//use com\bydan\framework\contabilidad\presentation\web\SessionBase;

use com\bydan\framework\globales\seguridad\logic\GlobalSeguridad;

use com\bydan\contabilidad\seguridad\usuario\business\entity\usuario;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_param_return;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_param_return;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic_add;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic_add;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cliente/util/cliente_carga.php');
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_param_return;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_persona\business\entity\tipo_persona;
use com\bydan\contabilidad\general\tipo_persona\business\logic\tipo_persona_logic;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_carga;
use com\bydan\contabilidad\general\tipo_persona\util\tipo_persona_util;

use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\entity\categoria_cliente;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\logic\categoria_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\util\categoria_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\util\categoria_cliente_util;

use com\bydan\contabilidad\inventario\tipo_precio\business\entity\tipo_precio;
use com\bydan\contabilidad\inventario\tipo_precio\business\logic\tipo_precio_logic;
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_carga;
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_util;

use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\entity\giro_negocio_cliente;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\business\logic\giro_negocio_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\giro_negocio_cliente\util\giro_negocio_cliente_util;

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\provincia\business\logic\provincia_logic;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_carga;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_carga;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;
use com\bydan\contabilidad\facturacion\impuesto\business\logic\impuesto_logic;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_carga;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;

use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;
use com\bydan\contabilidad\facturacion\retencion\business\logic\retencion_logic;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;

use com\bydan\contabilidad\facturacion\retencion_fuente\business\entity\retencion_fuente;
use com\bydan\contabilidad\facturacion\retencion_fuente\business\logic\retencion_fuente_logic;
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_carga;
use com\bydan\contabilidad\facturacion\retencion_fuente\util\retencion_fuente_util;

use com\bydan\contabilidad\facturacion\retencion_ica\business\entity\retencion_ica;
use com\bydan\contabilidad\facturacion\retencion_ica\business\logic\retencion_ica_logic;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_carga;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_util;

use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\logic\otro_impuesto_logic;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;

//REL


use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;
use com\bydan\contabilidad\facturacion\devolucion_factura\presentation\session\devolucion_factura_session;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\presentation\session\cuenta_cobrar_session;

use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_util;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\presentation\session\documento_cliente_session;

use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;
use com\bydan\contabilidad\estimados\estimado\presentation\session\estimado_session;

use com\bydan\contabilidad\cuentascobrar\imagen_cliente\util\imagen_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\util\imagen_cliente_util;
use com\bydan\contabilidad\cuentascobrar\imagen_cliente\presentation\session\imagen_cliente_session;

use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;
use com\bydan\contabilidad\facturacion\factura\presentation\session\factura_session;

use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;
use com\bydan\contabilidad\estimados\consignacion\presentation\session\consignacion_session;

use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_carga;
use com\bydan\contabilidad\inventario\lista_cliente\util\lista_cliente_util;
use com\bydan\contabilidad\inventario\lista_cliente\presentation\session\lista_cliente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentascobrar/cliente/presentation/control/cliente_init_control.php');
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\control\cliente_init_control;

include_once('com/bydan/contabilidad/cuentascobrar/cliente/presentation/control/cliente_base_control.php');
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\control\cliente_base_control;

class cliente_control extends cliente_base_control {	
	
	public function inicializarParametrosQueryString(mixed $post1=null) {
		$post=null;			
		
		if($_POST) {
			$post=$_POST;	
			
		} else if($_GET) {
			$post=$_GET;
		
		} else if($post1) {
			$post=$post1;
		}
		
		if($_POST || $_GET) {
			
			if($post!=null && count($post)>0) {
				
				$this->inicializarParametrosQueryStringBase($post);
				
				/*TIENE PARAMETROS DE MANTENIMIENTO DE DATOS*/			
				if($this->tieneParametrosMantenimientoDatos()) {
					
					
				if($this->data['activo']==null) {$this->data['activo']=false;} else {if($this->data['activo']=='on') {$this->data['activo']=true;}}
					
				if($this->data['aplica_impuesto_ventas']==null) {$this->data['aplica_impuesto_ventas']=false;} else {if($this->data['aplica_impuesto_ventas']=='on') {$this->data['aplica_impuesto_ventas']=true;}}
					
				if($this->data['aplica_retencion_impuesto']==null) {$this->data['aplica_retencion_impuesto']=false;} else {if($this->data['aplica_retencion_impuesto']=='on') {$this->data['aplica_retencion_impuesto']=true;}}
					
				if($this->data['aplica_retencion_fuente']==null) {$this->data['aplica_retencion_fuente']=false;} else {if($this->data['aplica_retencion_fuente']=='on') {$this->data['aplica_retencion_fuente']=true;}}
					
				if($this->data['aplica_retencion_ica']==null) {$this->data['aplica_retencion_ica']=false;} else {if($this->data['aplica_retencion_ica']=='on') {$this->data['aplica_retencion_ica']=true;}}
					
				if($this->data['aplica_2do_impuesto']==null) {$this->data['aplica_2do_impuesto']=false;} else {if($this->data['aplica_2do_impuesto']=='on') {$this->data['aplica_2do_impuesto']=true;}}
				}
			}
		
		} else {
			$this->data = $post;
		}
		
		$this->cargarParametrosReporte();
		
		$this->cargarParamsPostAccion();
		
		$this->cargarParamsPaginar();
		
		$this->cargarParametrosEventosTabla();
	}

	public function ejecutarParametrosQueryString() {
		/*$post=$_POST;*/	
		$action='';
		$return_json=true;
		
		$bitEsPopup=false;
		
		/*
		if(count($_GET) > 1) {
			$post=$_GET;
		}
		*/
		
		
		$action = $this->getDataAction();
			
		if($action!=null) {
			
			$this->action=$action;
			
			$this->bitEsAndroid=false;
				
			$this->bitEsAndroid = $this->getDataEsAndroid();

			/*NO SE GUARDA EN SESSION PERO SIEMPRE SE INICIALIZA DEFECTO
			INICIALIZA VARIABLES PARA QUE RECARGE TODOS COMBOS*/
			$this->setstrRecargarFkInicializar();
				
			if($action=='load' || $action=='index') {
				$this->loadIndex();				
				
			} else if($action=='indexRecargarRelacionado') {
				$this->indexRecargarRelacionado();								
				
			} else if($action=='unload') {
				$this->eliminarVariablesDeSesion();
				
			} else if($action=='recargarInformacion') {
				$this->recargarInformacionAction();								
				
			} else if($action=='buscarPorIdGeneral') {
				$this->buscarPorIdGeneralAction();	
				
			} else if($action=='anteriores') {
				$this->anterioresAction();				
				
			} else if($action=='siguientes') {
				$this->siguientesAction();	
				
			} else if($action=='recargarUltimaInformacion') {
				$this->recargarUltimaInformacionAction();								
				
			} else if($action=='seleccionarLoteFk') {
				$this->seleccionarLoteFkAction();								
				
			} else if($action=='nuevo') {
				$this->nuevoAction();				
				
			} else if($action=='actualizar') {
				$this->actualizarAction();				
				
			} else if($action=='eliminar') {
				$this->eliminarAction();			
				
			} else if($action=='cancelar') {
				$this->cancelarAction();				
				
			} else if($action=='guardarCambios') {
				$this->guardarCambiosAction();				
				
			} else if($action=='duplicar') {
				$this->duplicarAction();				
				
			}  else if($action=='copiar') {
				$this->copiarAction();				
				
			} else if($action=='nuevoPreparar') {//Para Pagina con Formulario											
				$this->nuevoPrepararAction();
				
			} else if($action=='nuevoPrepararPaginaForm') {
				$this->nuevoPrepararPaginaFormAction();							
				
			} else if($action=='nuevoPrepararAbrirPaginaForm') {//Para Pagina Formulario
				$this->nuevoPrepararAbrirPaginaFormAction();														
				
			} else if($action=='nuevoTablaPreparar') {
				$this->nuevoTablaPrepararAction();				
				
			} else if($action=='seleccionarActual') {
				$this->seleccionarActualAction();	
				
			} else if($action=='seleccionarActualPaginaForm') {
				$this->seleccionarActualPaginaFormAction();
									
			} else if($action=='seleccionarActualAbrirPaginaForm') {
				$this->seleccionarActualAbrirPaginaFormAction();
				
			} else if($action=='editarTablaDatos') {
				$this->editarTablaDatosAction();				
				
			}
			else if($action=='eliminarCascada' ) {
				$this->eliminarCascadaAction();
				
			} 
			else if($action=='eliminarTabla' ) {
				$this->eliminarTablaAction();	
				
			} else if($action=='quitarElementosTabla' ) {
				$this->quitarElementosTablaAction();
				
			} 
			else if($action=='recargarReferencias' ) {
				$this->recargarReferenciasAction();
				
			}
			else if($action=='manejarEventos' ) {
				$this->manejarEventosAction();
			}
			else if($action=='recargarFormularioGeneral' ) {
				$this->recargarFormularioGeneralAction();
			} 
			
			else if($action=='mostrarEjecutarAccionesRelaciones' ) {
				$this->mostrarEjecutarAccionesRelacionesAction();
			}
			
			else if($action=='generarFpdf') {		
				$this->generarFpdfAction();
				
			} else if($action=='generarHtmlReporte') {
				$this->generarHtmlReporteAction();
				
			} else if($action=='generarHtmlFormReporte') {
				$this->generarHtmlFormReporteAction();
				
			} else if($action=='generarHtmlRelacionesReporte') {
				$this->generarHtmlRelacionesReporteAction();
				
			} else if($action=='quitarRelacionesReporte') {
				$this->quitarRelacionesReporte();
				
			} else if($action=='generarReporteConPhpExcel') {
				$return_json=$this->generarReporteConPhpExcelAction();
				
			} else if($action=='generarReporteConPhpExcelVertical') {
				$return_json=$this->generarReporteConPhpExcelVerticalAction();
				
			} else if($action=='generarReporteConPhpExcelRelaciones') {
				$return_json=$this->generarReporteConPhpExcelRelacionesAction();
				
			} 
			else if($action=='registrarSesionParadevolucion_facturas' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idclienteActual=$this->getDataId();
				$this->registrarSesionParadevolucion_facturas($idclienteActual);
			}
			else if($action=='registrarSesionParacuenta_cobrars' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idclienteActual=$this->getDataId();
				$this->registrarSesionParacuenta_cobrars($idclienteActual);
			}
			else if($action=='registrarSesionParadocumento_clientees' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idclienteActual=$this->getDataId();
				$this->registrarSesionParadocumento_clientees($idclienteActual);
			}
			else if($action=='registrarSesionParaestimados' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idclienteActual=$this->getDataId();
				$this->registrarSesionParaestimados($idclienteActual);
			}
			else if($action=='registrarSesionParaimagen_clientes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idclienteActual=$this->getDataId();
				$this->registrarSesionParaimagen_clientes($idclienteActual);
			}
			else if($action=='registrarSesionParafacturas' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idclienteActual=$this->getDataId();
				$this->registrarSesionParafacturas($idclienteActual);
			}
			else if($action=='registrarSesionParaconsignaciones' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idclienteActual=$this->getDataId();
				$this->registrarSesionParaconsignaciones($idclienteActual);
			}
			else if($action=='registrarSesionParalista_clientes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idclienteActual=$this->getDataId();
				$this->registrarSesionParalista_clientes($idclienteActual);
			} 
			
			
			else if($action=="FK_Idcategoria_cliente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcategoria_clienteParaProcesar();
			}
			else if($action=="FK_Idciudad"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdciudadParaProcesar();
			}
			else if($action=="FK_Idcuenta"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdcuentaParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idgiro_negocio"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idgiro_negocioParaProcesar();
			}
			else if($action=="FK_Idimpuesto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdimpuestoParaProcesar();
			}
			else if($action=="FK_Idotro_impuesto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idotro_impuestoParaProcesar();
			}
			else if($action=="FK_Idpais"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdpaisParaProcesar();
			}
			else if($action=="FK_Idprovincia"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdprovinciaParaProcesar();
			}
			else if($action=="FK_Idretencion"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdretencionParaProcesar();
			}
			else if($action=="FK_Idretencion_fuente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idretencion_fuenteParaProcesar();
			}
			else if($action=="FK_Idretencion_ica"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idretencion_icaParaProcesar();
			}
			else if($action=="FK_Idtermino_pago"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtermino_pagoParaProcesar();
			}
			else if($action=="FK_Idtipo_persona"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_personaParaProcesar();
			}
			else if($action=="FK_Idtipo_precio"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_precioParaProcesar();
			}
			else if($action=="FK_Idvendedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdvendedorParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclienteActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idclienteActual
			}
			else if($action=='abrirBusquedaParatipo_persona') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclienteActual=$this->getDataId();
				$this->abrirBusquedaParatipo_persona();//$idclienteActual
			}
			else if($action=='abrirBusquedaParacategoria_cliente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclienteActual=$this->getDataId();
				$this->abrirBusquedaParacategoria_cliente();//$idclienteActual
			}
			else if($action=='abrirBusquedaParatipo_precio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclienteActual=$this->getDataId();
				$this->abrirBusquedaParatipo_precio();//$idclienteActual
			}
			else if($action=='abrirBusquedaParagiro_negocio_cliente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclienteActual=$this->getDataId();
				$this->abrirBusquedaParagiro_negocio_cliente();//$idclienteActual
			}
			else if($action=='abrirBusquedaParapais') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclienteActual=$this->getDataId();
				$this->abrirBusquedaParapais();//$idclienteActual
			}
			else if($action=='abrirBusquedaParaprovincia') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclienteActual=$this->getDataId();
				$this->abrirBusquedaParaprovincia();//$idclienteActual
			}
			else if($action=='abrirBusquedaParaciudad') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclienteActual=$this->getDataId();
				$this->abrirBusquedaParaciudad();//$idclienteActual
			}
			else if($action=='abrirBusquedaParavendedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclienteActual=$this->getDataId();
				$this->abrirBusquedaParavendedor();//$idclienteActual
			}
			else if($action=='abrirBusquedaParatermino_pago_cliente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclienteActual=$this->getDataId();
				$this->abrirBusquedaParatermino_pago_cliente();//$idclienteActual
			}
			else if($action=='abrirBusquedaParacuenta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclienteActual=$this->getDataId();
				$this->abrirBusquedaParacuenta();//$idclienteActual
			}
			else if($action=='abrirBusquedaParaimpuesto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclienteActual=$this->getDataId();
				$this->abrirBusquedaParaimpuesto();//$idclienteActual
			}
			else if($action=='abrirBusquedaPararetencion') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclienteActual=$this->getDataId();
				$this->abrirBusquedaPararetencion();//$idclienteActual
			}
			else if($action=='abrirBusquedaPararetencion_fuente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclienteActual=$this->getDataId();
				$this->abrirBusquedaPararetencion_fuente();//$idclienteActual
			}
			else if($action=='abrirBusquedaPararetencion_ica') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclienteActual=$this->getDataId();
				$this->abrirBusquedaPararetencion_ica();//$idclienteActual
			}
			else if($action=='abrirBusquedaParaotro_impuesto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclienteActual=$this->getDataId();
				$this->abrirBusquedaParaotro_impuesto();//$idclienteActual
			}
			
			else {
				/*ACCIONES ADDITIONAL*/
				
				$this->strProceso=$action;
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				
				$return_json=$this->procesarAccionJson($return_json,$action);				
			}
			
			
			$this->setTipoAction($action);
			
			//$this->setActualizarParameterDivSecciones();
			
			
			if($return_json==true) {
				
				if(!$this->bitEsAndroid) {
					
					$clienteController = new cliente_control();
					
					$clienteController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($clienteController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$clienteController = new cliente_control();
						$clienteController = $this;
						
						$jsonResponse = json_encode($clienteController->clientes);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->clienteReturnGeneral==null) {
					$this->clienteReturnGeneral=new cliente_param_return();
				}
				
				echo($this->clienteReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$clienteController=new cliente_control();
		
		$clienteController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$clienteController->usuarioActual=new usuario();
		
		$clienteController->usuarioActual->setId($this->usuarioActual->getId());
		$clienteController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$clienteController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$clienteController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$clienteController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$clienteController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$clienteController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$clienteController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $clienteController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadcliente= $this->getDataGeneralString('strTypeOnLoadcliente');
		$strTipoPaginaAuxiliarcliente= $this->getDataGeneralString('strTipoPaginaAuxiliarcliente');
		$strTipoUsuarioAuxiliarcliente= $this->getDataGeneralString('strTipoUsuarioAuxiliarcliente');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadcliente,$strTipoPaginaAuxiliarcliente,$strTipoUsuarioAuxiliarcliente,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadcliente!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('cliente','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
			
			Funciones::logShowExceptionMessages($e);
			throw $e;
		}
	}
	
	public function indexRecargarRelacionado() {
		$this->cargarParametrosPagina();
									
		$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);
		
		$this->saveGetSessionControllerAndPageAuxiliar(false);
		
		//SE DUPLICA
		//$this->getHtmlTablaDatos(false);
		
		$this->returnHtml(true);
	}
	
	public function recargarInformacionAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
		$this->recargarInformacion();
	}
	
	public function buscarPorIdGeneralAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
				
		$idActual=$this->getDataId();
		
		$this->buscarPorIdGeneral($idActual);
	}
	
	public function anterioresAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
		$this->anteriores();
	}
		
	public function siguientesAction() {	
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);			
		$this->siguientes();
	}
	
	public function recargarUltimaInformacionAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
		$this->recargarUltimaInformacion();
	}
	
	public function seleccionarLoteFkAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);				
		$this->seleccionarLoteFk();
	}
	
	public function nuevoAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->nuevo();
	}
	
	public function actualizarAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->actualizar();
	}
	
	public function eliminarAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
					
		$idActual=$this->getDataId();
					
		$this->eliminar($idActual);	
	}
	
	public function cancelarAction() {
		$this->setCargarParameterDivSecciones(false,false,false,true,true,false,false,true,false,false,false,false);
		$this->cancelar();
	}
	
	public function guardarCambiosAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->guardarCambios();
	}
	
	public function duplicarAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->duplicar();
	}
	
	public function copiarAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
		$this->copiar();
	}
	
	public function nuevoPrepararAction() {
		$this->setCargarParameterDivSecciones(false,false,false,true,true,false,false,true,false,false,false,false);
				
		$this->nuevoPreparar();
	}
	
	public function nuevoPrepararPaginaFormAction() {
		$this->cargarParametrosPagina();
									
		//TALVEZ ELIMINAR, TALVEZ MISMA PAGINA FORM
		$this->setCargarParameterDivSecciones(false,false,true,true,true,false,false,true,false,false,false,true);
				
		$this->nuevoPreparar();
	}
	
	public function nuevoPrepararAbrirPaginaFormAction() {
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);										
					
		//Se llama desde Load de Javascript a nuevoPrepararPaginaForm
		//$this->nuevoPreparar();
					
		if($this->Session->read('opcionActual')!=null) {
			$this->opcionActual=unserialize($this->Session->read('opcionActual'));
		}
					
		$this->bitEsAbrirVentanaAuxiliarUrl=true;
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
		$this->strAuxiliarTipo='POPUP';
	}
	
	public function nuevoTablaPrepararAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
				
		$this->nuevoTablaPreparar();
	}
	
	public function seleccionarActualAction() {
		$this->setCargarParameterDivSecciones(false,false,false,true,true,false,false,true,false,false,false,false);
		$idActual=$this->getDataId();
					
		$this->seleccionarActual($idActual);
	}
	
	public function seleccionarActualPaginaFormAction() {
		$this->cargarParametrosPagina();
									
		$this->setCargarParameterDivSecciones(false,false,true,true,true,false,false,true,false,false,false,true);
					
		$idActual=$this->getDataId();
					
		$this->seleccionarActual($idActual);
	}
	
	public function seleccionarActualAbrirPaginaFormAction() {
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);										
					
		$idActual=$this->getDataId();
					
		//Se llama desde Load de Javascript a seleccionarActualPaginaForm
		//$this->seleccionarActual($idActual);
					
		if($this->Session->read('opcionActual')!=null) {
			$this->opcionActual=$this->Session->unserialize('opcionActual');
		}
		
		$this->bitEsAbrirVentanaAuxiliarUrl=true;
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
		$this->strAuxiliarUrlPagina=$this->strAuxiliarUrlPagina.'&id='.$idActual;
		$this->strAuxiliarTipo='POPUP';
	}
	
	public function editarTablaDatosAction() {
		$this->setCargarParameterDivSecciones(false,true,false,false,true,false,false,false,false,false,false,false);
		$this->editarTablaDatos();
	}
	
	public function eliminarTablaAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);			
					
		$idActual=$this->getDataId();
		
		$this->eliminarTabla($idActual);
	}
	
	public function quitarElementosTablaAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);								
					
		$this->quitarElementosTabla();
	}
	
	public function generarFpdfAction() {
		$return_json=false;
		$this->generarFpdf();
	}
	
	public function generarHtmlReporteAction() {
		//$return_json=false;
					
		$htmlReporteAuxiliar='';
		
		//$htmlReporteIniAuxiliar='';
		//$htmlReporteFinAuxiliar='';				
		
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,true,false,false,false);
		
		$this->htmlTablaReporteAuxiliars='';
		
		$this->generarHtmlReporte();
		
		$htmlReporteAuxiliar=$this->htmlTablaReporteAuxiliars;
		
		//$htmlReporteIniAuxiliar=$this->getHtmlReporteIniAuxiliar();
		
		//$htmlReporteFinAuxiliar=$this->getHtmlReporteFinAuxiliar();								
		
		/*HTML FINAL*/
		//$this->htmlTablaReporteAuxiliars=$htmlReporteIniAuxiliar;
		$this->htmlTablaReporteAuxiliars=$htmlReporteAuxiliar;
		//$this->htmlTablaReporteAuxiliars.=$htmlReporteFinAuxiliar;				
		
		//echo($this->htmlTablaReporteAuxiliars);
		
		//ABRIR PAGINA Report con SessionStorage
		$this->clienteReturnGeneral=new cliente_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->clienteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->clienteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->clienteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->clienteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->clienteReturnGeneral);
	}
	
	public function generarHtmlFormReporteAction() {
		//$return_json=false;
					
		$htmlReporteAuxiliar='';
		//$htmlReporteIniAuxiliar='';
		//$htmlReporteFinAuxiliar='';								
		
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,true,false,false,false);
		
		$this->htmlTablaReporteAuxiliars='';
		
		$this->generarHtmlFormReporte();
				
		$htmlReporteAuxiliar=$this->htmlTablaReporteAuxiliars;
		
		//$htmlReporteIniAuxiliar=$this->getHtmlReporteIniAuxiliar();
		
		//$htmlReporteFinAuxiliar=$this->getHtmlReporteFinAuxiliar();
		
		/*HTML FINAL*/
			//$this->htmlTablaReporteAuxiliars=$htmlReporteIniAuxiliar;
		//$this->htmlTablaReporteAuxiliars=$htmlReporteAuxiliar;
			//$this->htmlTablaReporteAuxiliars.=$htmlReporteFinAuxiliar;
		
		//echo($this->htmlTablaReporteAuxiliars);
		
		//ABRIR PAGINA Report con SessionStorage
		$this->clienteReturnGeneral=new cliente_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->clienteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->clienteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->clienteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->clienteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->clienteReturnGeneral);
	}
	
	public function generarHtmlRelacionesReporteAction() {
		//$return_json=false;
					
		$htmlReporteAuxiliar='';
		//$htmlReporteIniAuxiliar='';
		//$htmlReporteFinAuxiliar='';								
		
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,true,false,false,false);
		
		$this->htmlTablaReporteAuxiliars='';
		
		$this->generarHtmlRelacionesReporte();
				
		$htmlReporteAuxiliar=$this->htmlTablaReporteAuxiliars;
		
		//$htmlReporteIniAuxiliar=$this->getHtmlReporteIniAuxiliar();
		
		//$htmlReporteFinAuxiliar=$this->getHtmlReporteFinAuxiliar();
		
		/*HTML FINAL*/
			//$this->htmlTablaReporteAuxiliars=$htmlReporteIniAuxiliar;
		//$this->htmlTablaReporteAuxiliars=$htmlReporteAuxiliar;
			//$this->htmlTablaReporteAuxiliars.=$htmlReporteFinAuxiliar;
		
		//echo($this->htmlTablaReporteAuxiliars);
		
		//ABRIR PAGINA Report con SessionStorage
		$this->clienteReturnGeneral=new cliente_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->clienteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->clienteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->clienteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->clienteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->clienteReturnGeneral);
	}
	
	public function eliminarCascadaAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
					
		$this->eliminarCascada();
	}
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			/*CARGA VARIABLES PARA TALVEZ RECARGAR POR PARTES*/
			$this->getDataRecargarPartes();
			/*CARGA VARIABLES PARA TALVEZ RECARGAR POR PARTES_FIN*/
			
			$bitDivsEsCargarFKsAjaxWebPart=false;
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			
			if($this->strRecargarFkTipos!='NINGUNO') {
				$bitDivsEsCargarFKsAjaxWebPart=true;
				
				/*$this->setCargarParameterDivSecciones(false,false,false,false,true,false,false,false,false,false,false,true);*/
				
				$this->cargarCombosFK(false);					
			} else {
				/*$bitDivEsCargarMantenimientosAjaxWebPart=true;				
				$this->setCargarParameterDivSecciones(false,false,false,false,true,false,false,false,false,false,false,false);*/
			}
											
			$sTipoControl='';
			$sTipoEvento='';
			
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
			
			
			$this->clienteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->clienteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->clienteReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->clienteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->clienteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->clienteReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->clienteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->clienteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->clienteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->clienteReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->clienteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->clienteReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->clienteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->clienteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->clienteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->clienteReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->clienteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->clienteReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
	
			$this->manejarRetornarExcepcion($e);
		}	
	}
	
	
	
	public function mostrarEjecutarAccionesRelacionesAction() {
		$this->setCargarParameterDivSecciones(false,false,false,false,true,false,false,false,false,false,true,false);			
		$idActual=$this->getDataId();
					
		$this->mostrarEjecutarAccionesRelaciones($idActual);						
	}	
	
	public function generarReporteConPhpExcelAction() {
		$tipo_reporte=$this->getDataTipoReporte();				
		$this->generarReporteConPhpExcel($tipo_reporte);				
		return false;			
	}
	
	public function generarReporteConPhpExcelVerticalAction() {
		$tipo_reporte=$this->getDataTipoReporte();				
		$this->generarReporteConPhpExcelVertical($tipo_reporte);				
		return false;						
	}
	
	public function generarReporteConPhpExcelRelacionesAction() {
		$tipo_reporte=$this->getDataTipoReporte();				
		$this->generarReporteConPhpExcelRelaciones($tipo_reporte);				
		return false;
	}

	function __construct () {
		
		parent::__construct();
		
		$this->clienteLogic=new cliente_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->cliente=new cliente();
		
		$this->strTypeOnLoadcliente='onload';
		$this->strTipoPaginaAuxiliarcliente='none';
		$this->strTipoUsuarioAuxiliarcliente='none';	

		$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
		
		$this->clienteModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->clienteControllerAdditional=new cliente_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(cliente_session $cliente_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($cliente_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadcliente='',?string $strTipoPaginaAuxiliarcliente='',?string $strTipoUsuarioAuxiliarcliente='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadcliente=$strTypeOnLoadcliente;
			$this->strTipoPaginaAuxiliarcliente=$strTipoPaginaAuxiliarcliente;
			$this->strTipoUsuarioAuxiliarcliente=$strTipoUsuarioAuxiliarcliente;
	
			if($strTipoUsuarioAuxiliarcliente=='webroot' || $strFuncionBusquedaRapida=='webroot') {
				return ;
			}
			
			/*$this->activarSession();*/
									
	
	
			/*ACTUALIZAR VALORES*/
			$this->bitEsPopup=$bitEsPopup;
			$this->bitConBusquedaRapida=$bitConBusquedaRapida;
			
			$this->indexBase($bitEsPopup,$bitConBusquedaRapida);			
			
			
			$this->strTipoView=$strTipoView;			
			$this->strValorBusquedaRapida=$strValorBusquedaRapida;
			$this->strFuncionBusquedaRapida=$strFuncionBusquedaRapida;
			
			$this->cliente=new cliente();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Clientes';
			
			
			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));
							
			if($cliente_session==null) {
				$cliente_session=new cliente_session();
				
				/*$this->Session->write('cliente_session',$cliente_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($cliente_session->strFuncionJsPadre!=null && $cliente_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$cliente_session->strFuncionJsPadre;
				
				$cliente_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($cliente_session);
			
			if($strTypeOnLoadcliente!=null && $strTypeOnLoadcliente=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$cliente_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$cliente_session->setPaginaPopupVariables(true);
				}
				
				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,cliente_util::$STR_SESSION_NAME,'cuentascobrar');																
			
			} else if($strTypeOnLoadcliente!=null && $strTypeOnLoadcliente=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$cliente_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;*/
				
				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarcliente!=null && $strTipoPaginaAuxiliarcliente=='none') {
				/*$cliente_session->strStyleDivHeader='display:table-row';*/
				
				/*$cliente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarcliente!=null && $strTipoPaginaAuxiliarcliente=='iframe') {
					/*
					$cliente_session->strStyleDivArbol='display:none';
					$cliente_session->strStyleDivHeader='display:none';
					$cliente_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$cliente_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->clienteClase=new cliente();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=cliente_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(cliente_util::getTiposSeleccionar(true) as $reporte) {
				$this->tiposColumnasSelect[]=$reporte;
			}			
			
			/*RELACIONES*/
			$this->tiposRelaciones[]=Reporte::NewReporte(Constantes::$STR_RELACIONES,Constantes::$STR_RELACIONES);
			
			foreach($this->getTiposRelacionesReporte() as $reporte) {
				$this->tiposRelaciones[]=$reporte;
			}
			
			/*FORMULARIO*/
			$this->tiposRelacionesFormulario[]=Reporte::NewReporte(Constantes::$STR_RELACIONES,Constantes::$STR_RELACIONES);
			
			foreach($this->getTiposRelacionesReporte() as $reporte) {
				$this->tiposRelacionesFormulario[]=$reporte;
			}
			/*RELACIONES*/
						
			$this->sistemaLogicAdditional=new sistema_logic_add();
			$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
			
			$this->sistemaLogicAdditional->setConnexion($this->clienteLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->clienteLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$documentocuentacobrarLogic=new documento_cuenta_cobrar_logic();
			//$devolucionfacturaLogic=new devolucion_factura_logic();
			//$kardexLogic=new kardex_logic();
			//$imagenclienteLogic=new imagen_cliente_logic();
			//$documentoclienteLogic=new documento_cliente_logic();
			//$cuentacorrientedetalleLogic=new cuenta_corriente_detalle_logic();
			//$estimadoLogic=new estimado_logic();
			//$cuentacobrarLogic=new cuenta_cobrar_logic();
			//$facturamodeloLogic=new factura_modelo_logic();
			//$facturaLogic=new factura_logic();
			//$chequecuentacorrienteLogic=new cheque_cuenta_corriente_logic();
			//$facturaloteLogic=new factura_lote_logic();
			//$consignacionLogic=new consignacion_logic();
			//$listaclienteLogic=new lista_cliente_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->clienteLogic=new cliente_logic();*/
			
			
			$this->clientesModel=null;
			/*new ListDataModel();*/
			
			/*$this->clientesModel.setWrappedData(clienteLogic->getclientes());*/
						
			$this->clientes= array();
			$this->clientesEliminados=array();
			$this->clientesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= cliente_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= cliente_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->cliente= new cliente();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcategoria_cliente='display:table-row';
			$this->strVisibleFK_Idciudad='display:table-row';
			$this->strVisibleFK_Idcuenta='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idgiro_negocio='display:table-row';
			$this->strVisibleFK_Idimpuesto='display:table-row';
			$this->strVisibleFK_Idotro_impuesto='display:table-row';
			$this->strVisibleFK_Idpais='display:table-row';
			$this->strVisibleFK_Idprovincia='display:table-row';
			$this->strVisibleFK_Idretencion='display:table-row';
			$this->strVisibleFK_Idretencion_fuente='display:table-row';
			$this->strVisibleFK_Idretencion_ica='display:table-row';
			$this->strVisibleFK_Idtermino_pago='display:table-row';
			$this->strVisibleFK_Idtipo_persona='display:table-row';
			$this->strVisibleFK_Idtipo_precio='display:table-row';
			$this->strVisibleFK_Idvendedor='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarcliente!=null && $strTipoUsuarioAuxiliarcliente!='none' && $strTipoUsuarioAuxiliarcliente!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcliente);
																
					if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
						$usuarioLogic->getEntity($idUsuarioAutomatico);/*WithConnection*/
						
					} else if(Constantes::$BIT_USA_WEBSERVICE) {
											
					}					
												
					$this->usuarioActual=$usuarioLogic->getUsuario();								
														
					if($this->usuarioActual!=null && $this->usuarioActual->getId()>0) {
						$this->Session->write('usuarioActual',serialize($this->usuarioActual));
					}
				}
			} else {
				if($strTipoUsuarioAuxiliarcliente!=null && $strTipoUsuarioAuxiliarcliente!='none' && $strTipoUsuarioAuxiliarcliente!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcliente);
																
					if($idUsuarioAutomatico>0) {
						$this->usuarioActual=new usuario();
						
						$this->usuarioActual->setId($idUsuarioAutomatico);
						
						$this->Session->write('usuarioActual',serialize($this->usuarioActual));
					}																	
				}
			}
			
			/*SI NO EXISTE SEGURIDAD*/
			//if($this->Session->read('usuarioActual')==null) {
			//	$this->usuarioActual=new usuario();
			//	$this->Session->write('usuarioActual',serialize($this->usuarioActual));
			//}
			
			if($this->Session->read('usuarioActual')!=null) {
				$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));
				
				if($this->usuarioActual!=null) {
					$this->bigIdUsuarioSesion=$this->usuarioActual->getId();	
				}
			
			} else {	
				if($strTipoUsuarioAuxiliarcliente==null || $strTipoUsuarioAuxiliarcliente=='none' || $strTipoUsuarioAuxiliarcliente=='undefined') {
					throw new Exception("Reinicie la sesion");
				}				
			}
			
			/*VALIDAR CARGAR SESION USUARIO*/			
			$this->sistemaReturnGeneral=new sistema_param_return();
			$this->arrNombresClasesRelacionadas=array();
			$bigIdOpcion=$this->bigIdOpcion;
			
			$this->arrNombresClasesRelacionadas=$this->getClasesRelacionadas();
			
			if(!Constantes::$CON_LLAMADA_SIMPLE) {
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					
					/*SI ES RELACIONADO, FORZAR PERMISOS*/
					if($this->bitEsRelacionado) {
						$bigIdOpcion=0;
					}
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarcliente,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cliente_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
					$this->opcionActual=$this->sistemaReturnGeneral->getOpcionActual();
					
					//SI ES RELACIONADO, SE MANTENGA PANTALLA PRINCIPAL RELACIONES COMO opcionActual
					if(!$this->bitEsRelacionado) {						
						$this->Session->write('opcionActual',serialize($this->opcionActual));
					}
					/*$this->sistemaReturnGeneral->settiene_permisos_paginaweb(true);*/
					
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
			}
			/*VALIDAR CARGAR SESION USUARIO*/
			
			
			/*ACTUALIZAR SESION USUARIO*/
			if($this->sistemaReturnGeneral->getUsuarioActual()->getId()!=$this->usuarioActual->getId()) {
				$this->Session->write('usuarioActual',serialize($this->sistemaReturnGeneral->getUsuarioActual()));
			}
			/*ACTUALIZAR SESION USUARIO*/
			
			
			
			/*VALIDACION_LICENCIA*/		
			$sUsuarioPCCliente=array_key_exists(Constantes::$REMOTE_USER,$_SERVER)? $_SERVER[Constantes::$REMOTE_USER]:''; 
			$sNamePCCliente=array_key_exists(Constantes::$REMOTE_USER,$_SERVER)? $_SERVER[Constantes::$REMOTE_HOST]:''; 
			$sIPPCCliente=array_key_exists(Constantes::$REMOTE_USER,$_SERVER)? $_SERVER[Constantes::$REMOTE_ADDR]:'';
			$sMacAddressPCCliente=array_key_exists(Constantes::$REMOTE_USER,$_SERVER)? $_SERVER[Constantes::$REMOTE_ADDR]:''; 
			$dFechaServer=date('Y-m-d');
			$idUsuario=$this->usuarioActual->getId();
			$sNombreModuloActual='';
			
			if($this->moduloActual!=null) {
				$sNombreModuloActual=$this->moduloActual->getnombre();
				/*'INVENTARIO';*/
			}
						
			$sNombreUsuarioActual=$this->usuarioActual->getuser_name();
			/*'ADMIN';*/
			
			/*if($sUsuarioPCCliente=='') {
				$sUsuarioPCCliente=$sNombreUsuarioActual;
			}*/
			
			if(!GlobalSeguridad::validarLicenciaCliente($sUsuarioPCCliente, $sNamePCCliente, $sIPPCCliente, $sMacAddressPCCliente, $dFechaServer, $idUsuario, $sNombreModuloActual, $sNombreUsuarioActual)) {
				throw new Exception(Mensajes::$SERROR_LICENCIA);
			}
			/*VALIDACION_LICENCIA_FIN*/
			
			
			/*VALIDACION_RESUMEN_USUARIO*/
			$validar_resumen_usuario=true;
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$validar_resumen_usuario=$this->resumenUsuarioLogicAdditional->validarResumenUsuarioController($this->usuarioActual,$this->resumenUsuarioActual);	/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
			} else {
				$validar_resumen_usuario=$this->sistemaReturnGeneral->getvalidar_resumen_usuario();
			}
			
			if($validar_resumen_usuario==false) {
				throw new Exception('Usuario ingresado mas de una vez, debe reingresar al sistema');
			}
			/*VALIDACION_RESUMEN_USUARIO_FIN*/
			
						
			
			/*VALIDACION_PAGINA*/
			$tiene_permisos_paginaweb=true;
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cliente_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina cliente');
			}
			/*VALIDACION_PAGINA_FIN*/
									
			
			
			$this->inicializarPermisos();
						
			$this->setPermisosUsuario();
			
			$this->inicializarSetPermisosUsuarioClasesRelacionadas();
			
			/*ACCIONES*/
			$this->setAccionesUsuario();
			
			if($this->bitEsPopup || $this->bitEsSubPagina) {
				$this->strPermisoPopup='table-row';
			}
			
			
			$this->inicializarFKsDefault();
			
			
			
			$this->cargarCombosFK(false);
			
			
			//$existe_history=false;
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($cliente_session);
			
			$this->getSetBusquedasSesionConfig($cliente_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteclientes($this->strAccionBusqueda,$this->clienteLogic->getclientes());*/
				} else if($this->strGenerarReporte=='Html')	{
					$cliente_session->strServletGenerarHtmlReporte='clienteServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($cliente_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarcliente!=null && $strTipoUsuarioAuxiliarcliente=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($cliente_session);
			}
								
			$this->set(cliente_util::$STR_SESSION_NAME, $cliente_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($cliente_session);
			
			/*
			$this->cliente->recursive = 0;
			
			$this->clientes=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('clientes', $this->clientes);
			
			$this->set(cliente_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->clienteActual =$this->clienteClase;
			
			/*$this->clienteActual =$this->migrarModelcliente($this->clienteClase);*/
			
			$this->returnHtml(false);
			
			$this->set(cliente_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=cliente_util::$STR_NOMBRE_OPCION;
				
			if(cliente_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=cliente_util::$STR_MODULO_OPCION.cliente_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));
			/*GUARDAR SESSION*/
			
			/*$this->strAuxiliarMensajeAlert=Funciones::mostrarMemoriaActual();*/
			
			$this->render('/'.Constantes::$STR_CARPETA_VIEWS.'/'.$strNombreViewIndex.'/'.$this->strTipoView);
		}
		catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function seleccionar() {
		try {
			/*$clienteClase= (cliente) clientesModel.getRowData();*/
			
			$this->clienteClase->setId($this->cliente->getId());	
			$this->clienteClase->setVersionRow($this->cliente->getVersionRow());	
			$this->clienteClase->setVersionRow($this->cliente->getVersionRow());	
			$this->clienteClase->setid_empresa($this->cliente->getid_empresa());	
			$this->clienteClase->setid_tipo_persona($this->cliente->getid_tipo_persona());	
			$this->clienteClase->setid_categoria_cliente($this->cliente->getid_categoria_cliente());	
			$this->clienteClase->setid_tipo_precio($this->cliente->getid_tipo_precio());	
			$this->clienteClase->setid_giro_negocio_cliente($this->cliente->getid_giro_negocio_cliente());	
			$this->clienteClase->setcodigo($this->cliente->getcodigo());	
			$this->clienteClase->setruc($this->cliente->getruc());	
			$this->clienteClase->setprimer_apellido($this->cliente->getprimer_apellido());	
			$this->clienteClase->setsegundo_apellido($this->cliente->getsegundo_apellido());	
			$this->clienteClase->setprimer_nombre($this->cliente->getprimer_nombre());	
			$this->clienteClase->setsegundo_nombre($this->cliente->getsegundo_nombre());	
			$this->clienteClase->setnombre_completo($this->cliente->getnombre_completo());	
			$this->clienteClase->setdireccion($this->cliente->getdireccion());	
			$this->clienteClase->settelefono($this->cliente->gettelefono());	
			$this->clienteClase->settelefono_movil($this->cliente->gettelefono_movil());	
			$this->clienteClase->sete_mail($this->cliente->gete_mail());	
			$this->clienteClase->sete_mail2($this->cliente->gete_mail2());	
			$this->clienteClase->setcomentario($this->cliente->getcomentario());	
			$this->clienteClase->setimagen($this->cliente->getimagen());	
			$this->clienteClase->setactivo($this->cliente->getactivo());	
			$this->clienteClase->setid_pais($this->cliente->getid_pais());	
			$this->clienteClase->setid_provincia($this->cliente->getid_provincia());	
			$this->clienteClase->setid_ciudad($this->cliente->getid_ciudad());	
			$this->clienteClase->setcodigo_postal($this->cliente->getcodigo_postal());	
			$this->clienteClase->setfax($this->cliente->getfax());	
			$this->clienteClase->setcontacto($this->cliente->getcontacto());	
			$this->clienteClase->setid_vendedor($this->cliente->getid_vendedor());	
			$this->clienteClase->setmaximo_credito($this->cliente->getmaximo_credito());	
			$this->clienteClase->setmaximo_descuento($this->cliente->getmaximo_descuento());	
			$this->clienteClase->setinteres_anual($this->cliente->getinteres_anual());	
			$this->clienteClase->setbalance($this->cliente->getbalance());	
			$this->clienteClase->setid_termino_pago_cliente($this->cliente->getid_termino_pago_cliente());	
			$this->clienteClase->setid_cuenta($this->cliente->getid_cuenta());	
			$this->clienteClase->setfacturar_con($this->cliente->getfacturar_con());	
			$this->clienteClase->setaplica_impuesto_ventas($this->cliente->getaplica_impuesto_ventas());	
			$this->clienteClase->setid_impuesto($this->cliente->getid_impuesto());	
			$this->clienteClase->setaplica_retencion_impuesto($this->cliente->getaplica_retencion_impuesto());	
			$this->clienteClase->setid_retencion($this->cliente->getid_retencion());	
			$this->clienteClase->setaplica_retencion_fuente($this->cliente->getaplica_retencion_fuente());	
			$this->clienteClase->setid_retencion_fuente($this->cliente->getid_retencion_fuente());	
			$this->clienteClase->setaplica_retencion_ica($this->cliente->getaplica_retencion_ica());	
			$this->clienteClase->setid_retencion_ica($this->cliente->getid_retencion_ica());	
			$this->clienteClase->setaplica_2do_impuesto($this->cliente->getaplica_2do_impuesto());	
			$this->clienteClase->setid_otro_impuesto($this->cliente->getid_otro_impuesto());	
			$this->clienteClase->setcreado($this->cliente->getcreado());	
			$this->clienteClase->setmonto_ultima_transaccion($this->cliente->getmonto_ultima_transaccion());	
			$this->clienteClase->setfecha_ultima_transaccion($this->cliente->getfecha_ultima_transaccion());	
			$this->clienteClase->setdescripcion_ultima_transaccion($this->cliente->getdescripcion_ultima_transaccion());	
		
			/*$this->Session->write('clienteVersionRowActual', cliente.getVersionRow());*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function seleccionarActual(int $id = null) {
		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			$this->idActual=$id;
			
			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));
						
			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('cliente', $this->cliente->read(null, $id));
	
			
			$this->cliente->recursive = 0;
			
			$this->clientes=$this->paginate();
			
			$this->set('clientes', $this->clientes);
	
			if (empty($this->data)) {
				$this->data = $this->cliente->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->clienteLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->clienteClase);
			
			$this->clienteActual=$this->clienteClase;
			
			/*$this->clienteActual =$this->migrarModelcliente($this->clienteClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->clienteLogic->getclientes(),$this->clienteActual);
			
			$this->actualizarControllerConReturnGeneral($this->clienteReturnGeneral);
			
			//$this->clienteReturnGeneral=$this->clienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->clienteLogic->getclientes(),$this->clienteActual,$this->clienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));
						
			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevocliente', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->clienteClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->clienteClase);
			
			$this->clienteActual =$this->clienteClase;
			
			/*$this->clienteActual =$this->migrarModelcliente($this->clienteClase);*/
			
			$this->setclienteFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->clienteLogic->getclientes(),$this->cliente);
			
			$this->actualizarControllerConReturnGeneral($this->clienteReturnGeneral);
			
			//this->clienteReturnGeneral=$this->clienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->clienteLogic->getclientes(),$this->cliente,$this->clienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->clienteReturnGeneral->getcliente()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idtipo_personaDefaultFK!=null && $this->idtipo_personaDefaultFK > -1) {
				$this->clienteReturnGeneral->getcliente()->setid_tipo_persona($this->idtipo_personaDefaultFK);
			}

			if($this->idcategoria_clienteDefaultFK!=null && $this->idcategoria_clienteDefaultFK > -1) {
				$this->clienteReturnGeneral->getcliente()->setid_categoria_cliente($this->idcategoria_clienteDefaultFK);
			}

			if($this->idtipo_precioDefaultFK!=null && $this->idtipo_precioDefaultFK > -1) {
				$this->clienteReturnGeneral->getcliente()->setid_tipo_precio($this->idtipo_precioDefaultFK);
			}

			if($this->idgiro_negocio_clienteDefaultFK!=null && $this->idgiro_negocio_clienteDefaultFK > -1) {
				$this->clienteReturnGeneral->getcliente()->setid_giro_negocio_cliente($this->idgiro_negocio_clienteDefaultFK);
			}

			if($this->idpaisDefaultFK!=null && $this->idpaisDefaultFK > -1) {
				$this->clienteReturnGeneral->getcliente()->setid_pais($this->idpaisDefaultFK);
			}

			if($this->idprovinciaDefaultFK!=null && $this->idprovinciaDefaultFK > -1) {
				$this->clienteReturnGeneral->getcliente()->setid_provincia($this->idprovinciaDefaultFK);
			}

			if($this->idciudadDefaultFK!=null && $this->idciudadDefaultFK > -1) {
				$this->clienteReturnGeneral->getcliente()->setid_ciudad($this->idciudadDefaultFK);
			}

			if($this->idvendedorDefaultFK!=null && $this->idvendedorDefaultFK > -1) {
				$this->clienteReturnGeneral->getcliente()->setid_vendedor($this->idvendedorDefaultFK);
			}

			if($this->idtermino_pago_clienteDefaultFK!=null && $this->idtermino_pago_clienteDefaultFK > -1) {
				$this->clienteReturnGeneral->getcliente()->setid_termino_pago_cliente($this->idtermino_pago_clienteDefaultFK);
			}

			if($this->idcuentaDefaultFK!=null && $this->idcuentaDefaultFK > -1) {
				$this->clienteReturnGeneral->getcliente()->setid_cuenta($this->idcuentaDefaultFK);
			}

			if($this->idimpuestoDefaultFK!=null && $this->idimpuestoDefaultFK > -1) {
				$this->clienteReturnGeneral->getcliente()->setid_impuesto($this->idimpuestoDefaultFK);
			}

			if($this->idretencionDefaultFK!=null && $this->idretencionDefaultFK > -1) {
				$this->clienteReturnGeneral->getcliente()->setid_retencion($this->idretencionDefaultFK);
			}

			if($this->idretencion_fuenteDefaultFK!=null && $this->idretencion_fuenteDefaultFK > -1) {
				$this->clienteReturnGeneral->getcliente()->setid_retencion_fuente($this->idretencion_fuenteDefaultFK);
			}

			if($this->idretencion_icaDefaultFK!=null && $this->idretencion_icaDefaultFK > -1) {
				$this->clienteReturnGeneral->getcliente()->setid_retencion_ica($this->idretencion_icaDefaultFK);
			}

			if($this->idotro_impuestoDefaultFK!=null && $this->idotro_impuestoDefaultFK > -1) {
				$this->clienteReturnGeneral->getcliente()->setid_otro_impuesto($this->idotro_impuestoDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->clienteReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->clienteReturnGeneral->getcliente(),$this->clienteActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeycliente($this->clienteReturnGeneral->getcliente());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariocliente($this->clienteReturnGeneral->getcliente());*/
			}
			
			if($this->clienteReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->clienteReturnGeneral->getcliente(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualcliente($this->cliente,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->clientesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->clientesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->clientesAuxiliar=array();
			}
			
			if(count($this->clientesAuxiliar)==2) {
				$clienteOrigen=$this->clientesAuxiliar[0];
				$clienteDestino=$this->clientesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($clienteOrigen,$clienteDestino,true,false,false);
				
				$this->actualizarLista($clienteDestino,$this->clientes);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->clientesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->clientesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->clientesAuxiliar=array();
			}
			
			if(count($this->clientesAuxiliar) > 0) {
				foreach ($this->clientesAuxiliar as $clienteSeleccionado) {
					$this->cliente=new cliente();
					
					$this->setCopiarVariablesObjetos($clienteSeleccionado,$this->cliente,true,true,false);
						
					$this->clientes[]=$this->cliente;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->clientesEliminados as $clienteEliminado) {
				$this->clienteLogic->clientes[]=$clienteEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->cliente=new cliente();
							
				$this->clientes[]=$this->cliente;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function editarTablaDatos() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);						
			
			if($this->bitConEditar) {
				$this->bitConAltoMaximoTabla=true;
			}
			
			$this->getHtmlTablaDatos(false);
															
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	function guardarCambiosTablas() {
		$indice=0;
		$maxima_fila=0;
		
		if($this->existDataTabla('t'.$this->strSufijo)) {
			$maxima_fila=$this->getDataMaximaFila();
		}
		
		$clienteActual=new cliente();
		
		if($maxima_fila!=null && $maxima_fila>0) {
			for($i=1;$i<=$maxima_fila;$i++) {
				/*CUANDO NO EXISTE DATOS TABLA*/
				if($this->existDataCampoFormTabla('cel_'.$i.'_0','t'.$this->strSufijo)) {
					if($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_0')==null) {
						break;	
					}
				} else {
					break;
				}
				
				$indice=$i-1;								
				
				$clienteActual=$this->clientes[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $clienteActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $clienteActual->setid_tipo_persona((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $clienteActual->setid_categoria_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $clienteActual->setid_tipo_precio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $clienteActual->setid_giro_negocio_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $clienteActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $clienteActual->setruc($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $clienteActual->setprimer_apellido($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $clienteActual->setsegundo_apellido($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $clienteActual->setprimer_nombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $clienteActual->setsegundo_nombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $clienteActual->setnombre_completo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $clienteActual->setdireccion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $clienteActual->settelefono($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $clienteActual->settelefono_movil($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $clienteActual->sete_mail($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $clienteActual->sete_mail2($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $clienteActual->setcomentario($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $clienteActual->setimagen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $clienteActual->setactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_22')));  } else { $clienteActual->setactivo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $clienteActual->setid_pais((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $clienteActual->setid_provincia((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $clienteActual->setid_ciudad((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $clienteActual->setcodigo_postal($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $clienteActual->setfax($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_27'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $clienteActual->setcontacto($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $clienteActual->setid_vendedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $clienteActual->setmaximo_credito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $clienteActual->setmaximo_descuento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $clienteActual->setinteres_anual((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_32'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_33','t'.$this->strSufijo)) {  $clienteActual->setbalance((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_33'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_34','t'.$this->strSufijo)) {  $clienteActual->setid_termino_pago_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_34'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_35','t'.$this->strSufijo)) {  $clienteActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_35'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_36','t'.$this->strSufijo)) {  $clienteActual->setfacturar_con((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_36'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_37','t'.$this->strSufijo)) {  $clienteActual->setaplica_impuesto_ventas(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_37')));  } else { $clienteActual->setaplica_impuesto_ventas(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_38','t'.$this->strSufijo)) {  $clienteActual->setid_impuesto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_38'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_39','t'.$this->strSufijo)) {  $clienteActual->setaplica_retencion_impuesto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_39')));  } else { $clienteActual->setaplica_retencion_impuesto(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_40','t'.$this->strSufijo)) {  $clienteActual->setid_retencion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_40'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_41','t'.$this->strSufijo)) {  $clienteActual->setaplica_retencion_fuente(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_41')));  } else { $clienteActual->setaplica_retencion_fuente(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_42','t'.$this->strSufijo)) {  $clienteActual->setid_retencion_fuente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_42'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_43','t'.$this->strSufijo)) {  $clienteActual->setaplica_retencion_ica(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_43')));  } else { $clienteActual->setaplica_retencion_ica(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_44','t'.$this->strSufijo)) {  $clienteActual->setid_retencion_ica((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_44'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_45','t'.$this->strSufijo)) {  $clienteActual->setaplica_2do_impuesto(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_45')));  } else { $clienteActual->setaplica_2do_impuesto(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_46','t'.$this->strSufijo)) {  $clienteActual->setid_otro_impuesto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_46'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_47','t'.$this->strSufijo)) {  $clienteActual->setcreado(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_47')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_48','t'.$this->strSufijo)) {  $clienteActual->setmonto_ultima_transaccion((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_48'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_49','t'.$this->strSufijo)) {  $clienteActual->setfecha_ultima_transaccion(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_49')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_50','t'.$this->strSufijo)) {  $clienteActual->setdescripcion_ultima_transaccion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_50'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->clientesAuxiliar=array();		 
		/*$this->clientesEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->clientesAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->clientesAuxiliar=array();
		}
			
		if(count($this->clientesAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->clientesAuxiliar as $clienteAuxLocal) {				
				
				foreach($this->clientes as $clienteLocal) {
					if($clienteLocal->getId()==$clienteAuxLocal->getId()) {
						$clienteLocal->setIsDeleted(true);
						
						/*$this->clientesEliminados[]=$clienteLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->clienteLogic->setclientes($this->clientes);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}	
	
	
	
	
	public function cancelarAccionesRelaciones() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			$this->strVisibleTablaAccionesRelaciones='none';	
			
			$this->strAuxiliarCssMensaje =Constantes::$STR_MENSAJE_INFO;
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function recargarInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadcliente='',string $strTipoPaginaAuxiliarcliente='',string $strTipoUsuarioAuxiliarcliente='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadcliente,$strTipoPaginaAuxiliarcliente,$strTipoUsuarioAuxiliarcliente,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->clientes) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=cliente_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=cliente_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=cliente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
		$finalQueryGlobal=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,!$esBusqueda,$esBusqueda,$arrColumnasGlobales);
		
		
		/*QUERY GLOBAL GLOBAL + SELECCIONAR_LOTE + ORDER_QUERY
		SELECCIONAR_LOTE*/
		if($this->strFinalQuerySeleccionarLote!='') {			
			$finalQueryPaginacion=$finalQueryPaginacion.$this->strFinalQuerySeleccionarLote;
		}
		
		/*GLOBAL*/
		if($finalQueryGlobal!='') {
			$finalQueryPaginacion=$finalQueryGlobal.$finalQueryPaginacion;
		}
				
		/*ORDER_QUERY*/
		if($this->orderByQuery!='') {
			$finalQueryPaginacion=$finalQueryPaginacion.$this->orderByQuery;
		}	
		
		/*QUERY GLOBAL GLOBAL + SELECCIONAR_LOTE + ORDER_QUERY*/
		
		try {				
			
			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));
						
			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}
			
			/*$this->cargarParametrosReporte();
			
			$this->cargarParamsPostAccion();*/
			
			$this->inicializarVariables('NORMAL');
			
			if($this->strTipoPaginacion!='TODOS' && $this->strTipoPaginacion!='') { //Combo Paginacion 5-10-15
				$this->intNumeroPaginacion=(int)$this->strTipoPaginacion;				
			} else {
				if($this->strTipoPaginacion=='TODOS') {
					$this->pagination->setBlnConNumeroMaximo(true);
				} else {
					/*$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;*/
					
					if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
					}
				}
			}
			
			$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
			$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
			/*$this->pagination->setBlnConNumeroMaximo(true);*/
						
			/*
			//DESHABILITADO AQUI, LA PAGINACION EN DATAACCESS
			if($this->intNumeroPaginacion!=null && $this->intNumeroPaginacionPagina!=null){ 						
				$finalQueryPaginacion=' LIMIT '.$this->intNumeroPaginacion.','.$this->intNumeroPaginacionPagina;
			}
			*/
			
			$this->clientesEliminados=array();
			
			/*$this->clienteLogic->setConnexion($connexion);*/
			
			$this->clienteLogic->setIsConDeep(true);
			
			$this->clienteLogic->getclienteDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_persona');$classes[]=$class;
			$class=new Classe('categoria_cliente');$classes[]=$class;
			$class=new Classe('tipo_precio');$classes[]=$class;
			$class=new Classe('giro_negocio_cliente');$classes[]=$class;
			$class=new Classe('pais');$classes[]=$class;
			$class=new Classe('provincia');$classes[]=$class;
			$class=new Classe('ciudad');$classes[]=$class;
			$class=new Classe('vendedor');$classes[]=$class;
			$class=new Classe('termino_pago_cliente');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			$class=new Classe('impuesto');$classes[]=$class;
			$class=new Classe('retencion');$classes[]=$class;
			$class=new Classe('retencion_fuente');$classes[]=$class;
			$class=new Classe('retencion_ica');$classes[]=$class;
			$class=new Classe('otro_impuesto');$classes[]=$class;
			
			$this->clienteLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->clienteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->clienteLogic->getclientes()==null|| count($this->clienteLogic->getclientes())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->clientes=$this->clienteLogic->getclientes();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->clienteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->clientesReporte=$this->clienteLogic->getclientes();
									
						/*$this->generarReportes('Todos',$this->clienteLogic->getclientes());*/
					
						$this->clienteLogic->setclientes($this->clientes);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->clienteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->clienteLogic->getclientes()==null|| count($this->clienteLogic->getclientes())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->clientes=$this->clienteLogic->getclientes();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->clienteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->clientesReporte=$this->clienteLogic->getclientes();
									
						/*$this->generarReportes('Todos',$this->clienteLogic->getclientes());*/
					
						$this->clienteLogic->setclientes($this->clientes);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idcliente=0;*/
				
				if($cliente_session->bitBusquedaDesdeFKSesionFK!=null && $cliente_session->bitBusquedaDesdeFKSesionFK==true) {
					if($cliente_session->bigIdActualFK!=null && $cliente_session->bigIdActualFK!=0)	{
						$this->idcliente=$cliente_session->bigIdActualFK;	
					}
					
					$cliente_session->bitBusquedaDesdeFKSesionFK=false;
					
					$cliente_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idcliente=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idcliente=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->clienteLogic->getEntity($this->idcliente);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*clienteLogicAdditional::getDetalleIndicePorId($idcliente);*/

				
				if($this->clienteLogic->getcliente()!=null) {
					$this->clienteLogic->setclientes(array());
					$this->clienteLogic->clientes[]=$this->clienteLogic->getcliente();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcategoria_cliente')
			{

				if($cliente_session->bigidcategoria_clienteActual!=null && $cliente_session->bigidcategoria_clienteActual!=0)
				{
					$this->id_categoria_clienteFK_Idcategoria_cliente=$cliente_session->bigidcategoria_clienteActual;
					$cliente_session->bigidcategoria_clienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idcategoria_cliente($finalQueryPaginacion,$this->pagination,$this->id_categoria_clienteFK_Idcategoria_cliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clienteLogicAdditional::getDetalleIndiceFK_Idcategoria_cliente($this->id_categoria_clienteFK_Idcategoria_cliente);


					if($this->clienteLogic->getclientes()==null || count($this->clienteLogic->getclientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clientes=$this->clienteLogic->getclientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idcategoria_cliente('',$this->pagination,$this->id_categoria_clienteFK_Idcategoria_cliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clientesReporte=$this->clienteLogic->getclientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclientes("FK_Idcategoria_cliente",$this->clienteLogic->getclientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clienteLogic->setclientes($clientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idciudad')
			{

				if($cliente_session->bigidciudadActual!=null && $cliente_session->bigidciudadActual!=0)
				{
					$this->id_ciudadFK_Idciudad=$cliente_session->bigidciudadActual;
					$cliente_session->bigidciudadActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idciudad($finalQueryPaginacion,$this->pagination,$this->id_ciudadFK_Idciudad);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clienteLogicAdditional::getDetalleIndiceFK_Idciudad($this->id_ciudadFK_Idciudad);


					if($this->clienteLogic->getclientes()==null || count($this->clienteLogic->getclientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clientes=$this->clienteLogic->getclientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idciudad('',$this->pagination,$this->id_ciudadFK_Idciudad);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clientesReporte=$this->clienteLogic->getclientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclientes("FK_Idciudad",$this->clienteLogic->getclientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clienteLogic->setclientes($clientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta')
			{

				if($cliente_session->bigidcuentaActual!=null && $cliente_session->bigidcuentaActual!=0)
				{
					$this->id_cuentaFK_Idcuenta=$cliente_session->bigidcuentaActual;
					$cliente_session->bigidcuentaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idcuenta($finalQueryPaginacion,$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clienteLogicAdditional::getDetalleIndiceFK_Idcuenta($this->id_cuentaFK_Idcuenta);


					if($this->clienteLogic->getclientes()==null || count($this->clienteLogic->getclientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clientes=$this->clienteLogic->getclientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idcuenta('',$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clientesReporte=$this->clienteLogic->getclientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclientes("FK_Idcuenta",$this->clienteLogic->getclientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clienteLogic->setclientes($clientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($cliente_session->bigidempresaActual!=null && $cliente_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$cliente_session->bigidempresaActual;
					$cliente_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clienteLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->clienteLogic->getclientes()==null || count($this->clienteLogic->getclientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clientes=$this->clienteLogic->getclientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clientesReporte=$this->clienteLogic->getclientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclientes("FK_Idempresa",$this->clienteLogic->getclientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clienteLogic->setclientes($clientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idgiro_negocio')
			{

				if($cliente_session->bigidgiro_negocio_clienteActual!=null && $cliente_session->bigidgiro_negocio_clienteActual!=0)
				{
					$this->id_giro_negocio_clienteFK_Idgiro_negocio=$cliente_session->bigidgiro_negocio_clienteActual;
					$cliente_session->bigidgiro_negocio_clienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idgiro_negocio($finalQueryPaginacion,$this->pagination,$this->id_giro_negocio_clienteFK_Idgiro_negocio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clienteLogicAdditional::getDetalleIndiceFK_Idgiro_negocio($this->id_giro_negocio_clienteFK_Idgiro_negocio);


					if($this->clienteLogic->getclientes()==null || count($this->clienteLogic->getclientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clientes=$this->clienteLogic->getclientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idgiro_negocio('',$this->pagination,$this->id_giro_negocio_clienteFK_Idgiro_negocio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clientesReporte=$this->clienteLogic->getclientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclientes("FK_Idgiro_negocio",$this->clienteLogic->getclientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clienteLogic->setclientes($clientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idimpuesto')
			{

				if($cliente_session->bigidimpuestoActual!=null && $cliente_session->bigidimpuestoActual!=0)
				{
					$this->id_impuestoFK_Idimpuesto=$cliente_session->bigidimpuestoActual;
					$cliente_session->bigidimpuestoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idimpuesto($finalQueryPaginacion,$this->pagination,$this->id_impuestoFK_Idimpuesto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clienteLogicAdditional::getDetalleIndiceFK_Idimpuesto($this->id_impuestoFK_Idimpuesto);


					if($this->clienteLogic->getclientes()==null || count($this->clienteLogic->getclientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clientes=$this->clienteLogic->getclientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idimpuesto('',$this->pagination,$this->id_impuestoFK_Idimpuesto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clientesReporte=$this->clienteLogic->getclientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclientes("FK_Idimpuesto",$this->clienteLogic->getclientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clienteLogic->setclientes($clientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idotro_impuesto')
			{

				if($cliente_session->bigidotro_impuestoActual!=null && $cliente_session->bigidotro_impuestoActual!=0)
				{
					$this->id_otro_impuestoFK_Idotro_impuesto=$cliente_session->bigidotro_impuestoActual;
					$cliente_session->bigidotro_impuestoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idotro_impuesto($finalQueryPaginacion,$this->pagination,$this->id_otro_impuestoFK_Idotro_impuesto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clienteLogicAdditional::getDetalleIndiceFK_Idotro_impuesto($this->id_otro_impuestoFK_Idotro_impuesto);


					if($this->clienteLogic->getclientes()==null || count($this->clienteLogic->getclientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clientes=$this->clienteLogic->getclientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idotro_impuesto('',$this->pagination,$this->id_otro_impuestoFK_Idotro_impuesto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clientesReporte=$this->clienteLogic->getclientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclientes("FK_Idotro_impuesto",$this->clienteLogic->getclientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clienteLogic->setclientes($clientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idpais')
			{

				if($cliente_session->bigidpaisActual!=null && $cliente_session->bigidpaisActual!=0)
				{
					$this->id_paisFK_Idpais=$cliente_session->bigidpaisActual;
					$cliente_session->bigidpaisActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idpais($finalQueryPaginacion,$this->pagination,$this->id_paisFK_Idpais);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clienteLogicAdditional::getDetalleIndiceFK_Idpais($this->id_paisFK_Idpais);


					if($this->clienteLogic->getclientes()==null || count($this->clienteLogic->getclientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clientes=$this->clienteLogic->getclientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idpais('',$this->pagination,$this->id_paisFK_Idpais);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clientesReporte=$this->clienteLogic->getclientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclientes("FK_Idpais",$this->clienteLogic->getclientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clienteLogic->setclientes($clientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idprovincia')
			{

				if($cliente_session->bigidprovinciaActual!=null && $cliente_session->bigidprovinciaActual!=0)
				{
					$this->id_provinciaFK_Idprovincia=$cliente_session->bigidprovinciaActual;
					$cliente_session->bigidprovinciaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idprovincia($finalQueryPaginacion,$this->pagination,$this->id_provinciaFK_Idprovincia);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clienteLogicAdditional::getDetalleIndiceFK_Idprovincia($this->id_provinciaFK_Idprovincia);


					if($this->clienteLogic->getclientes()==null || count($this->clienteLogic->getclientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clientes=$this->clienteLogic->getclientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idprovincia('',$this->pagination,$this->id_provinciaFK_Idprovincia);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clientesReporte=$this->clienteLogic->getclientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclientes("FK_Idprovincia",$this->clienteLogic->getclientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clienteLogic->setclientes($clientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idretencion')
			{

				if($cliente_session->bigidretencionActual!=null && $cliente_session->bigidretencionActual!=0)
				{
					$this->id_retencionFK_Idretencion=$cliente_session->bigidretencionActual;
					$cliente_session->bigidretencionActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idretencion($finalQueryPaginacion,$this->pagination,$this->id_retencionFK_Idretencion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clienteLogicAdditional::getDetalleIndiceFK_Idretencion($this->id_retencionFK_Idretencion);


					if($this->clienteLogic->getclientes()==null || count($this->clienteLogic->getclientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clientes=$this->clienteLogic->getclientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idretencion('',$this->pagination,$this->id_retencionFK_Idretencion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clientesReporte=$this->clienteLogic->getclientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclientes("FK_Idretencion",$this->clienteLogic->getclientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clienteLogic->setclientes($clientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idretencion_fuente')
			{

				if($cliente_session->bigidretencion_fuenteActual!=null && $cliente_session->bigidretencion_fuenteActual!=0)
				{
					$this->id_retencion_fuenteFK_Idretencion_fuente=$cliente_session->bigidretencion_fuenteActual;
					$cliente_session->bigidretencion_fuenteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idretencion_fuente($finalQueryPaginacion,$this->pagination,$this->id_retencion_fuenteFK_Idretencion_fuente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clienteLogicAdditional::getDetalleIndiceFK_Idretencion_fuente($this->id_retencion_fuenteFK_Idretencion_fuente);


					if($this->clienteLogic->getclientes()==null || count($this->clienteLogic->getclientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clientes=$this->clienteLogic->getclientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idretencion_fuente('',$this->pagination,$this->id_retencion_fuenteFK_Idretencion_fuente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clientesReporte=$this->clienteLogic->getclientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclientes("FK_Idretencion_fuente",$this->clienteLogic->getclientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clienteLogic->setclientes($clientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idretencion_ica')
			{

				if($cliente_session->bigidretencion_icaActual!=null && $cliente_session->bigidretencion_icaActual!=0)
				{
					$this->id_retencion_icaFK_Idretencion_ica=$cliente_session->bigidretencion_icaActual;
					$cliente_session->bigidretencion_icaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idretencion_ica($finalQueryPaginacion,$this->pagination,$this->id_retencion_icaFK_Idretencion_ica);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clienteLogicAdditional::getDetalleIndiceFK_Idretencion_ica($this->id_retencion_icaFK_Idretencion_ica);


					if($this->clienteLogic->getclientes()==null || count($this->clienteLogic->getclientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clientes=$this->clienteLogic->getclientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idretencion_ica('',$this->pagination,$this->id_retencion_icaFK_Idretencion_ica);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clientesReporte=$this->clienteLogic->getclientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclientes("FK_Idretencion_ica",$this->clienteLogic->getclientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clienteLogic->setclientes($clientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtermino_pago')
			{

				if($cliente_session->bigidtermino_pago_clienteActual!=null && $cliente_session->bigidtermino_pago_clienteActual!=0)
				{
					$this->id_termino_pago_clienteFK_Idtermino_pago=$cliente_session->bigidtermino_pago_clienteActual;
					$cliente_session->bigidtermino_pago_clienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idtermino_pago($finalQueryPaginacion,$this->pagination,$this->id_termino_pago_clienteFK_Idtermino_pago);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clienteLogicAdditional::getDetalleIndiceFK_Idtermino_pago($this->id_termino_pago_clienteFK_Idtermino_pago);


					if($this->clienteLogic->getclientes()==null || count($this->clienteLogic->getclientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clientes=$this->clienteLogic->getclientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idtermino_pago('',$this->pagination,$this->id_termino_pago_clienteFK_Idtermino_pago);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clientesReporte=$this->clienteLogic->getclientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclientes("FK_Idtermino_pago",$this->clienteLogic->getclientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clienteLogic->setclientes($clientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_persona')
			{

				if($cliente_session->bigidtipo_personaActual!=null && $cliente_session->bigidtipo_personaActual!=0)
				{
					$this->id_tipo_personaFK_Idtipo_persona=$cliente_session->bigidtipo_personaActual;
					$cliente_session->bigidtipo_personaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idtipo_persona($finalQueryPaginacion,$this->pagination,$this->id_tipo_personaFK_Idtipo_persona);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clienteLogicAdditional::getDetalleIndiceFK_Idtipo_persona($this->id_tipo_personaFK_Idtipo_persona);


					if($this->clienteLogic->getclientes()==null || count($this->clienteLogic->getclientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clientes=$this->clienteLogic->getclientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idtipo_persona('',$this->pagination,$this->id_tipo_personaFK_Idtipo_persona);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clientesReporte=$this->clienteLogic->getclientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclientes("FK_Idtipo_persona",$this->clienteLogic->getclientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clienteLogic->setclientes($clientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_precio')
			{

				if($cliente_session->bigidtipo_precioActual!=null && $cliente_session->bigidtipo_precioActual!=0)
				{
					$this->id_tipo_precioFK_Idtipo_precio=$cliente_session->bigidtipo_precioActual;
					$cliente_session->bigidtipo_precioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idtipo_precio($finalQueryPaginacion,$this->pagination,$this->id_tipo_precioFK_Idtipo_precio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clienteLogicAdditional::getDetalleIndiceFK_Idtipo_precio($this->id_tipo_precioFK_Idtipo_precio);


					if($this->clienteLogic->getclientes()==null || count($this->clienteLogic->getclientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clientes=$this->clienteLogic->getclientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idtipo_precio('',$this->pagination,$this->id_tipo_precioFK_Idtipo_precio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clientesReporte=$this->clienteLogic->getclientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclientes("FK_Idtipo_precio",$this->clienteLogic->getclientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clienteLogic->setclientes($clientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idvendedor')
			{

				if($cliente_session->bigidvendedorActual!=null && $cliente_session->bigidvendedorActual!=0)
				{
					$this->id_vendedorFK_Idvendedor=$cliente_session->bigidvendedorActual;
					$cliente_session->bigidvendedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idvendedor($finalQueryPaginacion,$this->pagination,$this->id_vendedorFK_Idvendedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clienteLogicAdditional::getDetalleIndiceFK_Idvendedor($this->id_vendedorFK_Idvendedor);


					if($this->clienteLogic->getclientes()==null || count($this->clienteLogic->getclientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clientes=$this->clienteLogic->getclientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clienteLogic->getsFK_Idvendedor('',$this->pagination,$this->id_vendedorFK_Idvendedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clientesReporte=$this->clienteLogic->getclientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclientes("FK_Idvendedor",$this->clienteLogic->getclientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clienteLogic->setclientes($clientes);
					}
				//}

			} 
		
		$cliente_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cliente_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->clienteLogic->loadForeignsKeysDescription();*/
		
		$this->clientes=$this->clienteLogic->getclientes();
		
		if($this->clientesEliminados==null) {
			$this->clientesEliminados=array();
		}
		
		$this->Session->write(cliente_util::$STR_SESSION_NAME.'Lista',serialize($this->clientes));
		$this->Session->write(cliente_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->clientesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idcliente=$idGeneral;
			
			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}
			
			
			if($this->intNumeroPaginacionPagina - $this->intNumeroPaginacion < $this->intNumeroPaginacion) {
				$this->intNumeroPaginacionPagina=0;		
			} else {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina - $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if(count($this->clientes) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Idcategoria_clienteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_categoria_clienteFK_Idcategoria_cliente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcategoria_cliente','cmbid_categoria_cliente');

			$this->strAccionBusqueda='FK_Idcategoria_cliente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdciudadParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ciudadFK_Idciudad=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idciudad','cmbid_ciudad');

			$this->strAccionBusqueda='FK_Idciudad';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdcuentaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuentaFK_Idcuenta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta','cmbid_cuenta');

			$this->strAccionBusqueda='FK_Idcuenta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdempresaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idgiro_negocioParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_giro_negocio_clienteFK_Idgiro_negocio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idgiro_negocio','cmbid_giro_negocio_cliente');

			$this->strAccionBusqueda='FK_Idgiro_negocio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdimpuestoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_impuestoFK_Idimpuesto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idimpuesto','cmbid_impuesto');

			$this->strAccionBusqueda='FK_Idimpuesto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idotro_impuestoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_otro_impuestoFK_Idotro_impuesto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idotro_impuesto','cmbid_otro_impuesto');

			$this->strAccionBusqueda='FK_Idotro_impuesto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdpaisParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_paisFK_Idpais=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idpais','cmbid_pais');

			$this->strAccionBusqueda='FK_Idpais';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdprovinciaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_provinciaFK_Idprovincia=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idprovincia','cmbid_provincia');

			$this->strAccionBusqueda='FK_Idprovincia';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdretencionParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_retencionFK_Idretencion=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idretencion','cmbid_retencion');

			$this->strAccionBusqueda='FK_Idretencion';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idretencion_fuenteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_retencion_fuenteFK_Idretencion_fuente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idretencion_fuente','cmbid_retencion_fuente');

			$this->strAccionBusqueda='FK_Idretencion_fuente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idretencion_icaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_retencion_icaFK_Idretencion_ica=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idretencion_ica','cmbid_retencion_ica');

			$this->strAccionBusqueda='FK_Idretencion_ica';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtermino_pagoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_termino_pago_clienteFK_Idtermino_pago=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtermino_pago','cmbid_termino_pago_cliente');

			$this->strAccionBusqueda='FK_Idtermino_pago';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_personaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_personaFK_Idtipo_persona=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_persona','cmbid_tipo_persona');

			$this->strAccionBusqueda='FK_Idtipo_persona';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_precioParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_precioFK_Idtipo_precio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_precio','cmbid_tipo_precio');

			$this->strAccionBusqueda='FK_Idtipo_precio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdvendedorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_vendedorFK_Idvendedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idvendedor','cmbid_vendedor');

			$this->strAccionBusqueda='FK_Idvendedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcategoria_cliente($strFinalQuery,$id_categoria_cliente)
	{
		try
		{

			$this->clienteLogic->getsFK_Idcategoria_cliente($strFinalQuery,new Pagination(),$id_categoria_cliente);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idciudad($strFinalQuery,$id_ciudad)
	{
		try
		{

			$this->clienteLogic->getsFK_Idciudad($strFinalQuery,new Pagination(),$id_ciudad);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcuenta($strFinalQuery,$id_cuenta)
	{
		try
		{

			$this->clienteLogic->getsFK_Idcuenta($strFinalQuery,new Pagination(),$id_cuenta);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idempresa($strFinalQuery,$id_empresa)
	{
		try
		{

			$this->clienteLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idgiro_negocio($strFinalQuery,$id_giro_negocio_cliente)
	{
		try
		{

			$this->clienteLogic->getsFK_Idgiro_negocio($strFinalQuery,new Pagination(),$id_giro_negocio_cliente);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idimpuesto($strFinalQuery,$id_impuesto)
	{
		try
		{

			$this->clienteLogic->getsFK_Idimpuesto($strFinalQuery,new Pagination(),$id_impuesto);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idotro_impuesto($strFinalQuery,$id_otro_impuesto)
	{
		try
		{

			$this->clienteLogic->getsFK_Idotro_impuesto($strFinalQuery,new Pagination(),$id_otro_impuesto);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idpais($strFinalQuery,$id_pais)
	{
		try
		{

			$this->clienteLogic->getsFK_Idpais($strFinalQuery,new Pagination(),$id_pais);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idprovincia($strFinalQuery,$id_provincia)
	{
		try
		{

			$this->clienteLogic->getsFK_Idprovincia($strFinalQuery,new Pagination(),$id_provincia);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idretencion($strFinalQuery,$id_retencion)
	{
		try
		{

			$this->clienteLogic->getsFK_Idretencion($strFinalQuery,new Pagination(),$id_retencion);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idretencion_fuente($strFinalQuery,$id_retencion_fuente)
	{
		try
		{

			$this->clienteLogic->getsFK_Idretencion_fuente($strFinalQuery,new Pagination(),$id_retencion_fuente);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idretencion_ica($strFinalQuery,$id_retencion_ica)
	{
		try
		{

			$this->clienteLogic->getsFK_Idretencion_ica($strFinalQuery,new Pagination(),$id_retencion_ica);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtermino_pago($strFinalQuery,$id_termino_pago_cliente)
	{
		try
		{

			$this->clienteLogic->getsFK_Idtermino_pago($strFinalQuery,new Pagination(),$id_termino_pago_cliente);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_persona($strFinalQuery,$id_tipo_persona)
	{
		try
		{

			$this->clienteLogic->getsFK_Idtipo_persona($strFinalQuery,new Pagination(),$id_tipo_persona);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_precio($strFinalQuery,$id_tipo_precio)
	{
		try
		{

			$this->clienteLogic->getsFK_Idtipo_precio($strFinalQuery,new Pagination(),$id_tipo_precio);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idvendedor($strFinalQuery,$id_vendedor)
	{
		try
		{

			$this->clienteLogic->getsFK_Idvendedor($strFinalQuery,new Pagination(),$id_vendedor);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	
		
	
	function cargarCombosFK(bool $cargarControllerDesdeSession=true) {		
		
		try {
			
			if($cargarControllerDesdeSession) {
				/*SOLO SI ES NECESARIO*/
				$this->saveGetSessionControllerAndPageAuxiliar(false);
			}
			
			
			$clienteForeignKey=new cliente_param_return(); //clienteForeignKey();
			
			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));
						
			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$clienteForeignKey=$this->clienteLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$cliente_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$clienteForeignKey->empresasFK;
				$this->idempresaDefaultFK=$clienteForeignKey->idempresaDefaultFK;
			}

			if($cliente_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_persona',$this->strRecargarFkTipos,',')) {
				$this->tipo_personasFK=$clienteForeignKey->tipo_personasFK;
				$this->idtipo_personaDefaultFK=$clienteForeignKey->idtipo_personaDefaultFK;
			}

			if($cliente_session->bitBusquedaDesdeFKSesiontipo_persona) {
				$this->setVisibleBusquedasParatipo_persona(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_categoria_cliente',$this->strRecargarFkTipos,',')) {
				$this->categoria_clientesFK=$clienteForeignKey->categoria_clientesFK;
				$this->idcategoria_clienteDefaultFK=$clienteForeignKey->idcategoria_clienteDefaultFK;
			}

			if($cliente_session->bitBusquedaDesdeFKSesioncategoria_cliente) {
				$this->setVisibleBusquedasParacategoria_cliente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_precio',$this->strRecargarFkTipos,',')) {
				$this->tipo_preciosFK=$clienteForeignKey->tipo_preciosFK;
				$this->idtipo_precioDefaultFK=$clienteForeignKey->idtipo_precioDefaultFK;
			}

			if($cliente_session->bitBusquedaDesdeFKSesiontipo_precio) {
				$this->setVisibleBusquedasParatipo_precio(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_giro_negocio_cliente',$this->strRecargarFkTipos,',')) {
				$this->giro_negocio_clientesFK=$clienteForeignKey->giro_negocio_clientesFK;
				$this->idgiro_negocio_clienteDefaultFK=$clienteForeignKey->idgiro_negocio_clienteDefaultFK;
			}

			if($cliente_session->bitBusquedaDesdeFKSesiongiro_negocio_cliente) {
				$this->setVisibleBusquedasParagiro_negocio_cliente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_pais',$this->strRecargarFkTipos,',')) {
				$this->paissFK=$clienteForeignKey->paissFK;
				$this->idpaisDefaultFK=$clienteForeignKey->idpaisDefaultFK;
			}

			if($cliente_session->bitBusquedaDesdeFKSesionpais) {
				$this->setVisibleBusquedasParapais(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_provincia',$this->strRecargarFkTipos,',')) {
				$this->provinciasFK=$clienteForeignKey->provinciasFK;
				$this->idprovinciaDefaultFK=$clienteForeignKey->idprovinciaDefaultFK;
			}

			if($cliente_session->bitBusquedaDesdeFKSesionprovincia) {
				$this->setVisibleBusquedasParaprovincia(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ciudad',$this->strRecargarFkTipos,',')) {
				$this->ciudadsFK=$clienteForeignKey->ciudadsFK;
				$this->idciudadDefaultFK=$clienteForeignKey->idciudadDefaultFK;
			}

			if($cliente_session->bitBusquedaDesdeFKSesionciudad) {
				$this->setVisibleBusquedasParaciudad(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_vendedor',$this->strRecargarFkTipos,',')) {
				$this->vendedorsFK=$clienteForeignKey->vendedorsFK;
				$this->idvendedorDefaultFK=$clienteForeignKey->idvendedorDefaultFK;
			}

			if($cliente_session->bitBusquedaDesdeFKSesionvendedor) {
				$this->setVisibleBusquedasParavendedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_cliente',$this->strRecargarFkTipos,',')) {
				$this->termino_pago_clientesFK=$clienteForeignKey->termino_pago_clientesFK;
				$this->idtermino_pago_clienteDefaultFK=$clienteForeignKey->idtermino_pago_clienteDefaultFK;
			}

			if($cliente_session->bitBusquedaDesdeFKSesiontermino_pago_cliente) {
				$this->setVisibleBusquedasParatermino_pago_cliente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$this->strRecargarFkTipos,',')) {
				$this->cuentasFK=$clienteForeignKey->cuentasFK;
				$this->idcuentaDefaultFK=$clienteForeignKey->idcuentaDefaultFK;
			}

			if($cliente_session->bitBusquedaDesdeFKSesioncuenta) {
				$this->setVisibleBusquedasParacuenta(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_impuesto',$this->strRecargarFkTipos,',')) {
				$this->impuestosFK=$clienteForeignKey->impuestosFK;
				$this->idimpuestoDefaultFK=$clienteForeignKey->idimpuestoDefaultFK;
			}

			if($cliente_session->bitBusquedaDesdeFKSesionimpuesto) {
				$this->setVisibleBusquedasParaimpuesto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion',$this->strRecargarFkTipos,',')) {
				$this->retencionsFK=$clienteForeignKey->retencionsFK;
				$this->idretencionDefaultFK=$clienteForeignKey->idretencionDefaultFK;
			}

			if($cliente_session->bitBusquedaDesdeFKSesionretencion) {
				$this->setVisibleBusquedasPararetencion(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion_fuente',$this->strRecargarFkTipos,',')) {
				$this->retencion_fuentesFK=$clienteForeignKey->retencion_fuentesFK;
				$this->idretencion_fuenteDefaultFK=$clienteForeignKey->idretencion_fuenteDefaultFK;
			}

			if($cliente_session->bitBusquedaDesdeFKSesionretencion_fuente) {
				$this->setVisibleBusquedasPararetencion_fuente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_retencion_ica',$this->strRecargarFkTipos,',')) {
				$this->retencion_icasFK=$clienteForeignKey->retencion_icasFK;
				$this->idretencion_icaDefaultFK=$clienteForeignKey->idretencion_icaDefaultFK;
			}

			if($cliente_session->bitBusquedaDesdeFKSesionretencion_ica) {
				$this->setVisibleBusquedasPararetencion_ica(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_otro_impuesto',$this->strRecargarFkTipos,',')) {
				$this->otro_impuestosFK=$clienteForeignKey->otro_impuestosFK;
				$this->idotro_impuestoDefaultFK=$clienteForeignKey->idotro_impuestoDefaultFK;
			}

			if($cliente_session->bitBusquedaDesdeFKSesionotro_impuesto) {
				$this->setVisibleBusquedasParaotro_impuesto(true);
			}
			
			/*CARGA INICIAL O RECARGAR COMBOS*/
			
			
			/*//RECARGAR COMBOS SIN ELEMENTOS
			if($this->strRecargarFkTiposNinguno!=null && $this->strRecargarFkTiposNinguno!='NINGUNO' && $this->strRecargarFkTiposNinguno!='') {*/
			/*}*/
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	function cargarCombosFKFromReturnGeneral($clienteReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$clienteReturnGeneral->strRecargarFkTipos;
			
			


			if($clienteReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$clienteReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$clienteReturnGeneral->idempresaDefaultFK;
			}


			if($clienteReturnGeneral->con_tipo_personasFK==true) {
				$this->tipo_personasFK=$clienteReturnGeneral->tipo_personasFK;
				$this->idtipo_personaDefaultFK=$clienteReturnGeneral->idtipo_personaDefaultFK;
			}


			if($clienteReturnGeneral->con_categoria_clientesFK==true) {
				$this->categoria_clientesFK=$clienteReturnGeneral->categoria_clientesFK;
				$this->idcategoria_clienteDefaultFK=$clienteReturnGeneral->idcategoria_clienteDefaultFK;
			}


			if($clienteReturnGeneral->con_tipo_preciosFK==true) {
				$this->tipo_preciosFK=$clienteReturnGeneral->tipo_preciosFK;
				$this->idtipo_precioDefaultFK=$clienteReturnGeneral->idtipo_precioDefaultFK;
			}


			if($clienteReturnGeneral->con_giro_negocio_clientesFK==true) {
				$this->giro_negocio_clientesFK=$clienteReturnGeneral->giro_negocio_clientesFK;
				$this->idgiro_negocio_clienteDefaultFK=$clienteReturnGeneral->idgiro_negocio_clienteDefaultFK;
			}


			if($clienteReturnGeneral->con_paissFK==true) {
				$this->paissFK=$clienteReturnGeneral->paissFK;
				$this->idpaisDefaultFK=$clienteReturnGeneral->idpaisDefaultFK;
			}


			if($clienteReturnGeneral->con_provinciasFK==true) {
				$this->provinciasFK=$clienteReturnGeneral->provinciasFK;
				$this->idprovinciaDefaultFK=$clienteReturnGeneral->idprovinciaDefaultFK;
			}


			if($clienteReturnGeneral->con_ciudadsFK==true) {
				$this->ciudadsFK=$clienteReturnGeneral->ciudadsFK;
				$this->idciudadDefaultFK=$clienteReturnGeneral->idciudadDefaultFK;
			}


			if($clienteReturnGeneral->con_vendedorsFK==true) {
				$this->vendedorsFK=$clienteReturnGeneral->vendedorsFK;
				$this->idvendedorDefaultFK=$clienteReturnGeneral->idvendedorDefaultFK;
			}


			if($clienteReturnGeneral->con_termino_pago_clientesFK==true) {
				$this->termino_pago_clientesFK=$clienteReturnGeneral->termino_pago_clientesFK;
				$this->idtermino_pago_clienteDefaultFK=$clienteReturnGeneral->idtermino_pago_clienteDefaultFK;
			}


			if($clienteReturnGeneral->con_cuentasFK==true) {
				$this->cuentasFK=$clienteReturnGeneral->cuentasFK;
				$this->idcuentaDefaultFK=$clienteReturnGeneral->idcuentaDefaultFK;
			}


			if($clienteReturnGeneral->con_impuestosFK==true) {
				$this->impuestosFK=$clienteReturnGeneral->impuestosFK;
				$this->idimpuestoDefaultFK=$clienteReturnGeneral->idimpuestoDefaultFK;
			}


			if($clienteReturnGeneral->con_retencionsFK==true) {
				$this->retencionsFK=$clienteReturnGeneral->retencionsFK;
				$this->idretencionDefaultFK=$clienteReturnGeneral->idretencionDefaultFK;
			}


			if($clienteReturnGeneral->con_retencion_fuentesFK==true) {
				$this->retencion_fuentesFK=$clienteReturnGeneral->retencion_fuentesFK;
				$this->idretencion_fuenteDefaultFK=$clienteReturnGeneral->idretencion_fuenteDefaultFK;
			}


			if($clienteReturnGeneral->con_retencion_icasFK==true) {
				$this->retencion_icasFK=$clienteReturnGeneral->retencion_icasFK;
				$this->idretencion_icaDefaultFK=$clienteReturnGeneral->idretencion_icaDefaultFK;
			}


			if($clienteReturnGeneral->con_otro_impuestosFK==true) {
				$this->otro_impuestosFK=$clienteReturnGeneral->otro_impuestosFK;
				$this->idotro_impuestoDefaultFK=$clienteReturnGeneral->idotro_impuestoDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(cliente_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));
		
		if($cliente_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($cliente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($cliente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_persona_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_persona';
			}
			else if($cliente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==categoria_cliente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='categoria_cliente';
			}
			else if($cliente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_precio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_precio';
			}
			else if($cliente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==giro_negocio_cliente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='giro_negocio_cliente';
			}
			else if($cliente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==pais_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='pais';
			}
			else if($cliente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==provincia_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='provincia';
			}
			else if($cliente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ciudad_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ciudad';
			}
			else if($cliente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==vendedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='vendedor';
			}
			else if($cliente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==termino_pago_cliente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='termino_pago_cliente';
			}
			else if($cliente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			else if($cliente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==impuesto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='impuesto';
			}
			else if($cliente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==retencion_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='retencion';
			}
			else if($cliente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==retencion_fuente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='retencion_fuente';
			}
			else if($cliente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==retencion_ica_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='retencion_ica';
			}
			else if($cliente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==otro_impuesto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='otro_impuesto';
			}
			
			$cliente_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}						
			
			$this->clientesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->clientesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->clientesAuxiliar=array();
			}
			
			if(count($this->clientesAuxiliar) > 0) {
				
				foreach ($this->clientesAuxiliar as $clienteSeleccionado) {
					$this->eliminarTablaBase($clienteSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function getTiposRelacionesReporte() : array {
		$arrTiposRelacionesReportes=array();
				
		$tipoRelacionReporte=new Reporte();
		
		/*$tipoRelacionReporte->setsCodigo(PerfilConstantesFunciones::$LABEL_IDSISTEMA);
		$tipoRelacionReporte->setsDescripcion(PerfilConstantesFunciones::$LABEL_IDSISTEMA);

		$arrTiposRelacionesReportes[]=$tipoRelacionReporte;*/
		
		if(!$this->bitEsRelaciones) {
			


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('consignacion');
			$tipoRelacionReporte->setsDescripcion('Consignaciones');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('cuenta_cobrar');
			$tipoRelacionReporte->setsDescripcion('Cuenta Cobrars');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('devolucion_factura');
			$tipoRelacionReporte->setsDescripcion('Devolucion Facturas');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('documento_cliente');
			$tipoRelacionReporte->setsDescripcion('Documentos ses');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('estimado');
			$tipoRelacionReporte->setsDescripcion('Estimados');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('factura');
			$tipoRelacionReporte->setsDescripcion('Facturas');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('imagen_cliente');
			$tipoRelacionReporte->setsDescripcion('Imagenes s');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('lista_cliente');
			$tipoRelacionReporte->setsDescripcion('Lista s');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=devolucion_factura_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=cuenta_cobrar_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=documento_cliente_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=estimado_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=imagen_cliente_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=factura_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=consignacion_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=lista_cliente_util::$STR_NOMBRE_CLASE;
		
		return $arrNombresClasesRelacionadasLocal;
	}
	
	
	public function setstrRecargarFkInicializar() {
		$this->setstrRecargarFk('TODOS','NINGUNO',0,'');		
	}
	
	
	
	public function getempresasFKListSelectItem() 
	{
		$empresasList=array();

		$item=null;

		foreach($this->empresasFK as $empresa)
		{
			$item=new SelectItem();
			$item->setLabel($empresa->getnombre());
			$item->setValue($empresa->getId());
			$empresasList[]=$item;
		}

		return $empresasList;
	}


	public function gettipo_personasFKListSelectItem() 
	{
		$tipo_personasList=array();

		$item=null;

		foreach($this->tipo_personasFK as $tipo_persona)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_persona->getnombre());
			$item->setValue($tipo_persona->getId());
			$tipo_personasList[]=$item;
		}

		return $tipo_personasList;
	}


	public function getcategoria_clientesFKListSelectItem() 
	{
		$categoria_clientesList=array();

		$item=null;

		foreach($this->categoria_clientesFK as $categoria_cliente)
		{
			$item=new SelectItem();
			$item->setLabel($categoria_cliente->getnombre());
			$item->setValue($categoria_cliente->getId());
			$categoria_clientesList[]=$item;
		}

		return $categoria_clientesList;
	}


	public function gettipo_preciosFKListSelectItem() 
	{
		$tipo_preciosList=array();

		$item=null;

		foreach($this->tipo_preciosFK as $tipo_precio)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_precio->getnombre());
			$item->setValue($tipo_precio->getId());
			$tipo_preciosList[]=$item;
		}

		return $tipo_preciosList;
	}


	public function getgiro_negocio_clientesFKListSelectItem() 
	{
		$giro_negocio_clientesList=array();

		$item=null;

		foreach($this->giro_negocio_clientesFK as $giro_negocio_cliente)
		{
			$item=new SelectItem();
			$item->setLabel($giro_negocio_cliente->getnombre());
			$item->setValue($giro_negocio_cliente->getId());
			$giro_negocio_clientesList[]=$item;
		}

		return $giro_negocio_clientesList;
	}


	public function getpaissFKListSelectItem() 
	{
		$paissList=array();

		$item=null;

		foreach($this->paissFK as $pais)
		{
			$item=new SelectItem();
			$item->setLabel($pais->getcodigo());
			$item->setValue($pais->getId());
			$paissList[]=$item;
		}

		return $paissList;
	}


	public function getprovinciasFKListSelectItem() 
	{
		$provinciasList=array();

		$item=null;

		foreach($this->provinciasFK as $provincia)
		{
			$item=new SelectItem();
			$item->setLabel($provincia->getcodigo());
			$item->setValue($provincia->getId());
			$provinciasList[]=$item;
		}

		return $provinciasList;
	}


	public function getciudadsFKListSelectItem() 
	{
		$ciudadsList=array();

		$item=null;

		foreach($this->ciudadsFK as $ciudad)
		{
			$item=new SelectItem();
			$item->setLabel($ciudad->getcodigo());
			$item->setValue($ciudad->getId());
			$ciudadsList[]=$item;
		}

		return $ciudadsList;
	}


	public function getvendedorsFKListSelectItem() 
	{
		$vendedorsList=array();

		$item=null;

		foreach($this->vendedorsFK as $vendedor)
		{
			$item=new SelectItem();
			$item->setLabel($vendedor->getnombre());
			$item->setValue($vendedor->getId());
			$vendedorsList[]=$item;
		}

		return $vendedorsList;
	}


	public function gettermino_pago_clientesFKListSelectItem() 
	{
		$termino_pago_clientesList=array();

		$item=null;

		foreach($this->termino_pago_clientesFK as $termino_pago_cliente)
		{
			$item=new SelectItem();
			$item->setLabel($termino_pago_cliente->getdescripcion());
			$item->setValue($termino_pago_cliente->getId());
			$termino_pago_clientesList[]=$item;
		}

		return $termino_pago_clientesList;
	}


	public function getcuentasFKListSelectItem() 
	{
		$cuentasList=array();

		$item=null;

		foreach($this->cuentasFK as $cuenta)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta->getcodigo());
			$item->setValue($cuenta->getId());
			$cuentasList[]=$item;
		}

		return $cuentasList;
	}


	public function getimpuestosFKListSelectItem() 
	{
		$impuestosList=array();

		$item=null;

		foreach($this->impuestosFK as $impuesto)
		{
			$item=new SelectItem();
			$item->setLabel($impuesto->getdescripcion());
			$item->setValue($impuesto->getId());
			$impuestosList[]=$item;
		}

		return $impuestosList;
	}


	public function getretencionsFKListSelectItem() 
	{
		$retencionsList=array();

		$item=null;

		foreach($this->retencionsFK as $retencion)
		{
			$item=new SelectItem();
			$item->setLabel($retencion->getcodigo());
			$item->setValue($retencion->getId());
			$retencionsList[]=$item;
		}

		return $retencionsList;
	}


	public function getretencion_fuentesFKListSelectItem() 
	{
		$retencion_fuentesList=array();

		$item=null;

		foreach($this->retencion_fuentesFK as $retencion_fuente)
		{
			$item=new SelectItem();
			$item->setLabel($retencion_fuente->getcodigo());
			$item->setValue($retencion_fuente->getId());
			$retencion_fuentesList[]=$item;
		}

		return $retencion_fuentesList;
	}


	public function getretencion_icasFKListSelectItem() 
	{
		$retencion_icasList=array();

		$item=null;

		foreach($this->retencion_icasFK as $retencion_ica)
		{
			$item=new SelectItem();
			$item->setLabel($retencion_ica->getcodigo());
			$item->setValue($retencion_ica->getId());
			$retencion_icasList[]=$item;
		}

		return $retencion_icasList;
	}


	public function getotro_impuestosFKListSelectItem() 
	{
		$otro_impuestosList=array();

		$item=null;

		foreach($this->otro_impuestosFK as $otro_impuesto)
		{
			$item=new SelectItem();
			$item->setLabel($otro_impuesto->getcodigo());
			$item->setValue($otro_impuesto->getId());
			$otro_impuestosList[]=$item;
		}

		return $otro_impuestosList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			*/
			
			/*$this->strNombreCampoBusqueda*/
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				
			} else {
				
			}
			
			$IdsFksSeleccionados=$this->getIdsFksSeleccionados($maxima_fila);
			$strQueryIn='';
			$esPrimero=true;
			
			foreach($IdsFksSeleccionados as $idFkSeleccionado) {
				
				if(!$esPrimero) {
					$strQueryIn.=',';
				} else {
					$esPrimero=false;	
				}
				
				$strQueryIn.=$idFkSeleccionado;
			}
			
			$this->strFinalQuerySeleccionarLote=' and '.$this->strNombreCampoBusqueda.' in('.$strQueryIn.')';
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			$this->validarCargarSeleccionarLoteFk($IdsFksSeleccionados);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->commitNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->rollbackNewConnexionToDeep();
				$this->clienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$clientesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->clientes as $clienteLocal) {
				if($clienteLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->cliente=new cliente();
				
				$this->cliente->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->clientes[]=$this->cliente;*/
				
				$clientesNuevos[]=$this->cliente;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_persona');$classes[]=$class;
				$class=new Classe('categoria_cliente');$classes[]=$class;
				$class=new Classe('tipo_precio');$classes[]=$class;
				$class=new Classe('giro_negocio_cliente');$classes[]=$class;
				$class=new Classe('pais');$classes[]=$class;
				$class=new Classe('provincia');$classes[]=$class;
				$class=new Classe('ciudad');$classes[]=$class;
				$class=new Classe('vendedor');$classes[]=$class;
				$class=new Classe('termino_pago_cliente');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				$class=new Classe('impuesto');$classes[]=$class;
				$class=new Classe('retencion');$classes[]=$class;
				$class=new Classe('retencion_fuente');$classes[]=$class;
				$class=new Classe('retencion_ica');$classes[]=$class;
				$class=new Classe('otro_impuesto');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clienteLogic->setclientes($clientesNuevos);
					
				$this->clienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($clientesNuevos as $clienteNuevo) {
					$this->clientes[]=$clienteNuevo;
				}
				
				/*$this->clientes[]=$clientesNuevos;*/
				
				$this->clienteLogic->setclientes($this->clientes);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($clientesNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionempresa!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=empresa_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalempresa=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalempresa=Funciones::GetFinalQueryAppend($finalQueryGlobalempresa, '');
				$finalQueryGlobalempresa.=empresa_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalempresa.$strRecargarFkQuery;		

				$empresaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosempresasFK($empresaLogic->getempresas());

		} else {
			$this->setVisibleBusquedasParaempresa(true);


			if($cliente_session->bigidempresaActual!=null && $cliente_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cliente_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=cliente_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostipo_personasFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_personaLogic= new tipo_persona_logic();
		$pagination= new Pagination();
		$this->tipo_personasFK=array();

		$tipo_personaLogic->setConnexion($connexion);
		$tipo_personaLogic->gettipo_personaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesiontipo_persona!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_persona_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_persona=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_persona=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_persona, '');
				$finalQueryGlobaltipo_persona.=tipo_persona_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_persona.$strRecargarFkQuery;		

				$tipo_personaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_personasFK($tipo_personaLogic->gettipo_personas());

		} else {
			$this->setVisibleBusquedasParatipo_persona(true);


			if($cliente_session->bigidtipo_personaActual!=null && $cliente_session->bigidtipo_personaActual > 0) {
				$tipo_personaLogic->getEntity($cliente_session->bigidtipo_personaActual);//WithConnection

				$this->tipo_personasFK[$tipo_personaLogic->gettipo_persona()->getId()]=cliente_util::gettipo_personaDescripcion($tipo_personaLogic->gettipo_persona());
				$this->idtipo_personaDefaultFK=$tipo_personaLogic->gettipo_persona()->getId();
			}
		}
	}

	public function cargarComboscategoria_clientesFK($connexion=null,$strRecargarFkQuery=''){
		$categoria_clienteLogic= new categoria_cliente_logic();
		$pagination= new Pagination();
		$this->categoria_clientesFK=array();

		$categoria_clienteLogic->setConnexion($connexion);
		$categoria_clienteLogic->getcategoria_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesioncategoria_cliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=categoria_cliente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcategoria_cliente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcategoria_cliente=Funciones::GetFinalQueryAppend($finalQueryGlobalcategoria_cliente, '');
				$finalQueryGlobalcategoria_cliente.=categoria_cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcategoria_cliente.$strRecargarFkQuery;		

				$categoria_clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscategoria_clientesFK($categoria_clienteLogic->getcategoria_clientes());

		} else {
			$this->setVisibleBusquedasParacategoria_cliente(true);


			if($cliente_session->bigidcategoria_clienteActual!=null && $cliente_session->bigidcategoria_clienteActual > 0) {
				$categoria_clienteLogic->getEntity($cliente_session->bigidcategoria_clienteActual);//WithConnection

				$this->categoria_clientesFK[$categoria_clienteLogic->getcategoria_cliente()->getId()]=cliente_util::getcategoria_clienteDescripcion($categoria_clienteLogic->getcategoria_cliente());
				$this->idcategoria_clienteDefaultFK=$categoria_clienteLogic->getcategoria_cliente()->getId();
			}
		}
	}

	public function cargarCombostipo_preciosFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_precioLogic= new tipo_precio_logic();
		$pagination= new Pagination();
		$this->tipo_preciosFK=array();

		$tipo_precioLogic->setConnexion($connexion);
		$tipo_precioLogic->gettipo_precioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesiontipo_precio!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_precio_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_precio=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_precio=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_precio, '');
				$finalQueryGlobaltipo_precio.=tipo_precio_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_precio.$strRecargarFkQuery;		

				$tipo_precioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_preciosFK($tipo_precioLogic->gettipo_precios());

		} else {
			$this->setVisibleBusquedasParatipo_precio(true);


			if($cliente_session->bigidtipo_precioActual!=null && $cliente_session->bigidtipo_precioActual > 0) {
				$tipo_precioLogic->getEntity($cliente_session->bigidtipo_precioActual);//WithConnection

				$this->tipo_preciosFK[$tipo_precioLogic->gettipo_precio()->getId()]=cliente_util::gettipo_precioDescripcion($tipo_precioLogic->gettipo_precio());
				$this->idtipo_precioDefaultFK=$tipo_precioLogic->gettipo_precio()->getId();
			}
		}
	}

	public function cargarCombosgiro_negocio_clientesFK($connexion=null,$strRecargarFkQuery=''){
		$giro_negocio_clienteLogic= new giro_negocio_cliente_logic();
		$pagination= new Pagination();
		$this->giro_negocio_clientesFK=array();

		$giro_negocio_clienteLogic->setConnexion($connexion);
		$giro_negocio_clienteLogic->getgiro_negocio_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesiongiro_negocio_cliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=giro_negocio_cliente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalgiro_negocio_cliente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalgiro_negocio_cliente=Funciones::GetFinalQueryAppend($finalQueryGlobalgiro_negocio_cliente, '');
				$finalQueryGlobalgiro_negocio_cliente.=giro_negocio_cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalgiro_negocio_cliente.$strRecargarFkQuery;		

				$giro_negocio_clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosgiro_negocio_clientesFK($giro_negocio_clienteLogic->getgiro_negocio_clientes());

		} else {
			$this->setVisibleBusquedasParagiro_negocio_cliente(true);


			if($cliente_session->bigidgiro_negocio_clienteActual!=null && $cliente_session->bigidgiro_negocio_clienteActual > 0) {
				$giro_negocio_clienteLogic->getEntity($cliente_session->bigidgiro_negocio_clienteActual);//WithConnection

				$this->giro_negocio_clientesFK[$giro_negocio_clienteLogic->getgiro_negocio_cliente()->getId()]=cliente_util::getgiro_negocio_clienteDescripcion($giro_negocio_clienteLogic->getgiro_negocio_cliente());
				$this->idgiro_negocio_clienteDefaultFK=$giro_negocio_clienteLogic->getgiro_negocio_cliente()->getId();
			}
		}
	}

	public function cargarCombospaissFK($connexion=null,$strRecargarFkQuery=''){
		$paisLogic= new pais_logic();
		$pagination= new Pagination();
		$this->paissFK=array();

		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionpais!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=pais_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalpais=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalpais=Funciones::GetFinalQueryAppend($finalQueryGlobalpais, '');
				$finalQueryGlobalpais.=pais_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalpais.$strRecargarFkQuery;		

				$paisLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombospaissFK($paisLogic->getpaiss());

		} else {
			$this->setVisibleBusquedasParapais(true);


			if($cliente_session->bigidpaisActual!=null && $cliente_session->bigidpaisActual > 0) {
				$paisLogic->getEntity($cliente_session->bigidpaisActual);//WithConnection

				$this->paissFK[$paisLogic->getpais()->getId()]=cliente_util::getpaisDescripcion($paisLogic->getpais());
				$this->idpaisDefaultFK=$paisLogic->getpais()->getId();
			}
		}
	}

	public function cargarCombosprovinciasFK($connexion=null,$strRecargarFkQuery=''){
		$provinciaLogic= new provincia_logic();
		$pagination= new Pagination();
		$this->provinciasFK=array();

		$provinciaLogic->setConnexion($connexion);
		$provinciaLogic->getprovinciaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionprovincia!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=provincia_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalprovincia=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalprovincia=Funciones::GetFinalQueryAppend($finalQueryGlobalprovincia, '');
				$finalQueryGlobalprovincia.=provincia_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalprovincia.$strRecargarFkQuery;		

				$provinciaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosprovinciasFK($provinciaLogic->getprovincias());

		} else {
			$this->setVisibleBusquedasParaprovincia(true);


			if($cliente_session->bigidprovinciaActual!=null && $cliente_session->bigidprovinciaActual > 0) {
				$provinciaLogic->getEntity($cliente_session->bigidprovinciaActual);//WithConnection

				$this->provinciasFK[$provinciaLogic->getprovincia()->getId()]=cliente_util::getprovinciaDescripcion($provinciaLogic->getprovincia());
				$this->idprovinciaDefaultFK=$provinciaLogic->getprovincia()->getId();
			}
		}
	}

	public function cargarCombosciudadsFK($connexion=null,$strRecargarFkQuery=''){
		$ciudadLogic= new ciudad_logic();
		$pagination= new Pagination();
		$this->ciudadsFK=array();

		$ciudadLogic->setConnexion($connexion);
		$ciudadLogic->getciudadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionciudad!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=ciudad_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalciudad=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalciudad=Funciones::GetFinalQueryAppend($finalQueryGlobalciudad, '');
				$finalQueryGlobalciudad.=ciudad_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalciudad.$strRecargarFkQuery;		

				$ciudadLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosciudadsFK($ciudadLogic->getciudads());

		} else {
			$this->setVisibleBusquedasParaciudad(true);


			if($cliente_session->bigidciudadActual!=null && $cliente_session->bigidciudadActual > 0) {
				$ciudadLogic->getEntity($cliente_session->bigidciudadActual);//WithConnection

				$this->ciudadsFK[$ciudadLogic->getciudad()->getId()]=cliente_util::getciudadDescripcion($ciudadLogic->getciudad());
				$this->idciudadDefaultFK=$ciudadLogic->getciudad()->getId();
			}
		}
	}

	public function cargarCombosvendedorsFK($connexion=null,$strRecargarFkQuery=''){
		$vendedorLogic= new vendedor_logic();
		$pagination= new Pagination();
		$this->vendedorsFK=array();

		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionvendedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=vendedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalvendedor=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalvendedor=Funciones::GetFinalQueryAppend($finalQueryGlobalvendedor, '');
				$finalQueryGlobalvendedor.=vendedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalvendedor.$strRecargarFkQuery;		

				$vendedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosvendedorsFK($vendedorLogic->getvendedors());

		} else {
			$this->setVisibleBusquedasParavendedor(true);


			if($cliente_session->bigidvendedorActual!=null && $cliente_session->bigidvendedorActual > 0) {
				$vendedorLogic->getEntity($cliente_session->bigidvendedorActual);//WithConnection

				$this->vendedorsFK[$vendedorLogic->getvendedor()->getId()]=cliente_util::getvendedorDescripcion($vendedorLogic->getvendedor());
				$this->idvendedorDefaultFK=$vendedorLogic->getvendedor()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_clientesFK($connexion=null,$strRecargarFkQuery=''){
		$termino_pago_clienteLogic= new termino_pago_cliente_logic();
		$pagination= new Pagination();
		$this->termino_pago_clientesFK=array();

		$termino_pago_clienteLogic->setConnexion($connexion);
		$termino_pago_clienteLogic->gettermino_pago_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesiontermino_pago_cliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=termino_pago_cliente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltermino_pago_cliente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltermino_pago_cliente=Funciones::GetFinalQueryAppend($finalQueryGlobaltermino_pago_cliente, '');
				$finalQueryGlobaltermino_pago_cliente.=termino_pago_cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltermino_pago_cliente.$strRecargarFkQuery;		

				$termino_pago_clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostermino_pago_clientesFK($termino_pago_clienteLogic->gettermino_pago_clientes());

		} else {
			$this->setVisibleBusquedasParatermino_pago_cliente(true);


			if($cliente_session->bigidtermino_pago_clienteActual!=null && $cliente_session->bigidtermino_pago_clienteActual > 0) {
				$termino_pago_clienteLogic->getEntity($cliente_session->bigidtermino_pago_clienteActual);//WithConnection

				$this->termino_pago_clientesFK[$termino_pago_clienteLogic->gettermino_pago_cliente()->getId()]=cliente_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLogic->gettermino_pago_cliente());
				$this->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLogic->gettermino_pago_cliente()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery=''){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$this->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesioncuenta!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcuenta=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta, '');
				$finalQueryGlobalcuenta.=cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta.$strRecargarFkQuery;		

				$cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscuentasFK($cuentaLogic->getcuentas());

		} else {
			$this->setVisibleBusquedasParacuenta(true);


			if($cliente_session->bigidcuentaActual!=null && $cliente_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($cliente_session->bigidcuentaActual);//WithConnection

				$this->cuentasFK[$cuentaLogic->getcuenta()->getId()]=cliente_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$this->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarCombosimpuestosFK($connexion=null,$strRecargarFkQuery=''){
		$impuestoLogic= new impuesto_logic();
		$pagination= new Pagination();
		$this->impuestosFK=array();

		$impuestoLogic->setConnexion($connexion);
		$impuestoLogic->getimpuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionimpuesto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=impuesto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalimpuesto=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalimpuesto=Funciones::GetFinalQueryAppend($finalQueryGlobalimpuesto, '');
				$finalQueryGlobalimpuesto.=impuesto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalimpuesto.$strRecargarFkQuery;		

				$impuestoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosimpuestosFK($impuestoLogic->getimpuestos());

		} else {
			$this->setVisibleBusquedasParaimpuesto(true);


			if($cliente_session->bigidimpuestoActual!=null && $cliente_session->bigidimpuestoActual > 0) {
				$impuestoLogic->getEntity($cliente_session->bigidimpuestoActual);//WithConnection

				$this->impuestosFK[$impuestoLogic->getimpuesto()->getId()]=cliente_util::getimpuestoDescripcion($impuestoLogic->getimpuesto());
				$this->idimpuestoDefaultFK=$impuestoLogic->getimpuesto()->getId();
			}
		}
	}

	public function cargarCombosretencionsFK($connexion=null,$strRecargarFkQuery=''){
		$retencionLogic= new retencion_logic();
		$pagination= new Pagination();
		$this->retencionsFK=array();

		$retencionLogic->setConnexion($connexion);
		$retencionLogic->getretencionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionretencion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=retencion_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalretencion=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalretencion=Funciones::GetFinalQueryAppend($finalQueryGlobalretencion, '');
				$finalQueryGlobalretencion.=retencion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalretencion.$strRecargarFkQuery;		

				$retencionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosretencionsFK($retencionLogic->getretencions());

		} else {
			$this->setVisibleBusquedasPararetencion(true);


			if($cliente_session->bigidretencionActual!=null && $cliente_session->bigidretencionActual > 0) {
				$retencionLogic->getEntity($cliente_session->bigidretencionActual);//WithConnection

				$this->retencionsFK[$retencionLogic->getretencion()->getId()]=cliente_util::getretencionDescripcion($retencionLogic->getretencion());
				$this->idretencionDefaultFK=$retencionLogic->getretencion()->getId();
			}
		}
	}

	public function cargarCombosretencion_fuentesFK($connexion=null,$strRecargarFkQuery=''){
		$retencion_fuenteLogic= new retencion_fuente_logic();
		$pagination= new Pagination();
		$this->retencion_fuentesFK=array();

		$retencion_fuenteLogic->setConnexion($connexion);
		$retencion_fuenteLogic->getretencion_fuenteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionretencion_fuente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=retencion_fuente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalretencion_fuente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalretencion_fuente=Funciones::GetFinalQueryAppend($finalQueryGlobalretencion_fuente, '');
				$finalQueryGlobalretencion_fuente.=retencion_fuente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalretencion_fuente.$strRecargarFkQuery;		

				$retencion_fuenteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosretencion_fuentesFK($retencion_fuenteLogic->getretencion_fuentes());

		} else {
			$this->setVisibleBusquedasPararetencion_fuente(true);


			if($cliente_session->bigidretencion_fuenteActual!=null && $cliente_session->bigidretencion_fuenteActual > 0) {
				$retencion_fuenteLogic->getEntity($cliente_session->bigidretencion_fuenteActual);//WithConnection

				$this->retencion_fuentesFK[$retencion_fuenteLogic->getretencion_fuente()->getId()]=cliente_util::getretencion_fuenteDescripcion($retencion_fuenteLogic->getretencion_fuente());
				$this->idretencion_fuenteDefaultFK=$retencion_fuenteLogic->getretencion_fuente()->getId();
			}
		}
	}

	public function cargarCombosretencion_icasFK($connexion=null,$strRecargarFkQuery=''){
		$retencion_icaLogic= new retencion_ica_logic();
		$pagination= new Pagination();
		$this->retencion_icasFK=array();

		$retencion_icaLogic->setConnexion($connexion);
		$retencion_icaLogic->getretencion_icaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionretencion_ica!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=retencion_ica_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalretencion_ica=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalretencion_ica=Funciones::GetFinalQueryAppend($finalQueryGlobalretencion_ica, '');
				$finalQueryGlobalretencion_ica.=retencion_ica_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalretencion_ica.$strRecargarFkQuery;		

				$retencion_icaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosretencion_icasFK($retencion_icaLogic->getretencion_icas());

		} else {
			$this->setVisibleBusquedasPararetencion_ica(true);


			if($cliente_session->bigidretencion_icaActual!=null && $cliente_session->bigidretencion_icaActual > 0) {
				$retencion_icaLogic->getEntity($cliente_session->bigidretencion_icaActual);//WithConnection

				$this->retencion_icasFK[$retencion_icaLogic->getretencion_ica()->getId()]=cliente_util::getretencion_icaDescripcion($retencion_icaLogic->getretencion_ica());
				$this->idretencion_icaDefaultFK=$retencion_icaLogic->getretencion_ica()->getId();
			}
		}
	}

	public function cargarCombosotro_impuestosFK($connexion=null,$strRecargarFkQuery=''){
		$otro_impuestoLogic= new otro_impuesto_logic();
		$pagination= new Pagination();
		$this->otro_impuestosFK=array();

		$otro_impuestoLogic->setConnexion($connexion);
		$otro_impuestoLogic->getotro_impuestoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		if($cliente_session->bitBusquedaDesdeFKSesionotro_impuesto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=otro_impuesto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalotro_impuesto=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalotro_impuesto=Funciones::GetFinalQueryAppend($finalQueryGlobalotro_impuesto, '');
				$finalQueryGlobalotro_impuesto.=otro_impuesto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalotro_impuesto.$strRecargarFkQuery;		

				$otro_impuestoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosotro_impuestosFK($otro_impuestoLogic->getotro_impuestos());

		} else {
			$this->setVisibleBusquedasParaotro_impuesto(true);


			if($cliente_session->bigidotro_impuestoActual!=null && $cliente_session->bigidotro_impuestoActual > 0) {
				$otro_impuestoLogic->getEntity($cliente_session->bigidotro_impuestoActual);//WithConnection

				$this->otro_impuestosFK[$otro_impuestoLogic->getotro_impuesto()->getId()]=cliente_util::getotro_impuestoDescripcion($otro_impuestoLogic->getotro_impuesto());
				$this->idotro_impuestoDefaultFK=$otro_impuestoLogic->getotro_impuesto()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=cliente_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombostipo_personasFK($tipo_personas){

		foreach ($tipo_personas as $tipo_personaLocal ) {
			if($this->idtipo_personaDefaultFK==0) {
				$this->idtipo_personaDefaultFK=$tipo_personaLocal->getId();
			}

			$this->tipo_personasFK[$tipo_personaLocal->getId()]=cliente_util::gettipo_personaDescripcion($tipo_personaLocal);
		}
	}

	public function prepararComboscategoria_clientesFK($categoria_clientes){

		foreach ($categoria_clientes as $categoria_clienteLocal ) {
			if($this->idcategoria_clienteDefaultFK==0) {
				$this->idcategoria_clienteDefaultFK=$categoria_clienteLocal->getId();
			}

			$this->categoria_clientesFK[$categoria_clienteLocal->getId()]=cliente_util::getcategoria_clienteDescripcion($categoria_clienteLocal);
		}
	}

	public function prepararCombostipo_preciosFK($tipo_precios){

		foreach ($tipo_precios as $tipo_precioLocal ) {
			if($this->idtipo_precioDefaultFK==0) {
				$this->idtipo_precioDefaultFK=$tipo_precioLocal->getId();
			}

			$this->tipo_preciosFK[$tipo_precioLocal->getId()]=cliente_util::gettipo_precioDescripcion($tipo_precioLocal);
		}
	}

	public function prepararCombosgiro_negocio_clientesFK($giro_negocio_clientes){

		foreach ($giro_negocio_clientes as $giro_negocio_clienteLocal ) {
			if($this->idgiro_negocio_clienteDefaultFK==0) {
				$this->idgiro_negocio_clienteDefaultFK=$giro_negocio_clienteLocal->getId();
			}

			$this->giro_negocio_clientesFK[$giro_negocio_clienteLocal->getId()]=cliente_util::getgiro_negocio_clienteDescripcion($giro_negocio_clienteLocal);
		}
	}

	public function prepararCombospaissFK($paiss){

		foreach ($paiss as $paisLocal ) {
			if($this->idpaisDefaultFK==0) {
				$this->idpaisDefaultFK=$paisLocal->getId();
			}

			$this->paissFK[$paisLocal->getId()]=cliente_util::getpaisDescripcion($paisLocal);
		}
	}

	public function prepararCombosprovinciasFK($provincias){

		foreach ($provincias as $provinciaLocal ) {
			if($this->idprovinciaDefaultFK==0) {
				$this->idprovinciaDefaultFK=$provinciaLocal->getId();
			}

			$this->provinciasFK[$provinciaLocal->getId()]=cliente_util::getprovinciaDescripcion($provinciaLocal);
		}
	}

	public function prepararCombosciudadsFK($ciudads){

		foreach ($ciudads as $ciudadLocal ) {
			if($this->idciudadDefaultFK==0) {
				$this->idciudadDefaultFK=$ciudadLocal->getId();
			}

			$this->ciudadsFK[$ciudadLocal->getId()]=cliente_util::getciudadDescripcion($ciudadLocal);
		}
	}

	public function prepararCombosvendedorsFK($vendedors){

		foreach ($vendedors as $vendedorLocal ) {
			if($this->idvendedorDefaultFK==0) {
				$this->idvendedorDefaultFK=$vendedorLocal->getId();
			}

			$this->vendedorsFK[$vendedorLocal->getId()]=cliente_util::getvendedorDescripcion($vendedorLocal);
		}
	}

	public function prepararCombostermino_pago_clientesFK($termino_pago_clientes){

		foreach ($termino_pago_clientes as $termino_pago_clienteLocal ) {
			if($this->idtermino_pago_clienteDefaultFK==0) {
				$this->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLocal->getId();
			}

			$this->termino_pago_clientesFK[$termino_pago_clienteLocal->getId()]=cliente_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLocal);
		}
	}

	public function prepararComboscuentasFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuentaDefaultFK==0) {
				$this->idcuentaDefaultFK=$cuentaLocal->getId();
			}

			$this->cuentasFK[$cuentaLocal->getId()]=cliente_util::getcuentaDescripcion($cuentaLocal);
		}
	}

	public function prepararCombosimpuestosFK($impuestos){

		foreach ($impuestos as $impuestoLocal ) {
			if($this->idimpuestoDefaultFK==0) {
				$this->idimpuestoDefaultFK=$impuestoLocal->getId();
			}

			$this->impuestosFK[$impuestoLocal->getId()]=cliente_util::getimpuestoDescripcion($impuestoLocal);
		}
	}

	public function prepararCombosretencionsFK($retencions){

		foreach ($retencions as $retencionLocal ) {
			if($this->idretencionDefaultFK==0) {
				$this->idretencionDefaultFK=$retencionLocal->getId();
			}

			$this->retencionsFK[$retencionLocal->getId()]=cliente_util::getretencionDescripcion($retencionLocal);
		}
	}

	public function prepararCombosretencion_fuentesFK($retencion_fuentes){

		foreach ($retencion_fuentes as $retencion_fuenteLocal ) {
			if($this->idretencion_fuenteDefaultFK==0) {
				$this->idretencion_fuenteDefaultFK=$retencion_fuenteLocal->getId();
			}

			$this->retencion_fuentesFK[$retencion_fuenteLocal->getId()]=cliente_util::getretencion_fuenteDescripcion($retencion_fuenteLocal);
		}
	}

	public function prepararCombosretencion_icasFK($retencion_icas){

		foreach ($retencion_icas as $retencion_icaLocal ) {
			if($this->idretencion_icaDefaultFK==0) {
				$this->idretencion_icaDefaultFK=$retencion_icaLocal->getId();
			}

			$this->retencion_icasFK[$retencion_icaLocal->getId()]=cliente_util::getretencion_icaDescripcion($retencion_icaLocal);
		}
	}

	public function prepararCombosotro_impuestosFK($otro_impuestos){

		foreach ($otro_impuestos as $otro_impuestoLocal ) {
			if($this->idotro_impuestoDefaultFK==0) {
				$this->idotro_impuestoDefaultFK=$otro_impuestoLocal->getId();
			}

			$this->otro_impuestosFK[$otro_impuestoLocal->getId()]=cliente_util::getotro_impuestoDescripcion($otro_impuestoLocal);
		}
	}

	
	
	public function cargarDescripcionempresaFK($idempresa,$connexion=null){
		$empresaLogic= new empresa_logic();
		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$strDescripcionempresa='';

		if($idempresa!=null && $idempresa!='' && $idempresa!='null') {
			if($connexion!=null) {
				$empresaLogic->getEntity($idempresa);//WithConnection
			} else {
				$empresaLogic->getEntityWithConnection($idempresa);//
			}

			$strDescripcionempresa=cliente_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripciontipo_personaFK($idtipo_persona,$connexion=null){
		$tipo_personaLogic= new tipo_persona_logic();
		$tipo_personaLogic->setConnexion($connexion);
		$tipo_personaLogic->gettipo_personaDataAccess()->isForFKData=true;
		$strDescripciontipo_persona='';

		if($idtipo_persona!=null && $idtipo_persona!='' && $idtipo_persona!='null') {
			if($connexion!=null) {
				$tipo_personaLogic->getEntity($idtipo_persona);//WithConnection
			} else {
				$tipo_personaLogic->getEntityWithConnection($idtipo_persona);//
			}

			$strDescripciontipo_persona=cliente_util::gettipo_personaDescripcion($tipo_personaLogic->gettipo_persona());

		} else {
			$strDescripciontipo_persona='null';
		}

		return $strDescripciontipo_persona;
	}

	public function cargarDescripcioncategoria_clienteFK($idcategoria_cliente,$connexion=null){
		$categoria_clienteLogic= new categoria_cliente_logic();
		$categoria_clienteLogic->setConnexion($connexion);
		$categoria_clienteLogic->getcategoria_clienteDataAccess()->isForFKData=true;
		$strDescripcioncategoria_cliente='';

		if($idcategoria_cliente!=null && $idcategoria_cliente!='' && $idcategoria_cliente!='null') {
			if($connexion!=null) {
				$categoria_clienteLogic->getEntity($idcategoria_cliente);//WithConnection
			} else {
				$categoria_clienteLogic->getEntityWithConnection($idcategoria_cliente);//
			}

			$strDescripcioncategoria_cliente=cliente_util::getcategoria_clienteDescripcion($categoria_clienteLogic->getcategoria_cliente());

		} else {
			$strDescripcioncategoria_cliente='null';
		}

		return $strDescripcioncategoria_cliente;
	}

	public function cargarDescripciontipo_precioFK($idtipo_precio,$connexion=null){
		$tipo_precioLogic= new tipo_precio_logic();
		$tipo_precioLogic->setConnexion($connexion);
		$tipo_precioLogic->gettipo_precioDataAccess()->isForFKData=true;
		$strDescripciontipo_precio='';

		if($idtipo_precio!=null && $idtipo_precio!='' && $idtipo_precio!='null') {
			if($connexion!=null) {
				$tipo_precioLogic->getEntity($idtipo_precio);//WithConnection
			} else {
				$tipo_precioLogic->getEntityWithConnection($idtipo_precio);//
			}

			$strDescripciontipo_precio=cliente_util::gettipo_precioDescripcion($tipo_precioLogic->gettipo_precio());

		} else {
			$strDescripciontipo_precio='null';
		}

		return $strDescripciontipo_precio;
	}

	public function cargarDescripciongiro_negocio_clienteFK($idgiro_negocio_cliente,$connexion=null){
		$giro_negocio_clienteLogic= new giro_negocio_cliente_logic();
		$giro_negocio_clienteLogic->setConnexion($connexion);
		$giro_negocio_clienteLogic->getgiro_negocio_clienteDataAccess()->isForFKData=true;
		$strDescripciongiro_negocio_cliente='';

		if($idgiro_negocio_cliente!=null && $idgiro_negocio_cliente!='' && $idgiro_negocio_cliente!='null') {
			if($connexion!=null) {
				$giro_negocio_clienteLogic->getEntity($idgiro_negocio_cliente);//WithConnection
			} else {
				$giro_negocio_clienteLogic->getEntityWithConnection($idgiro_negocio_cliente);//
			}

			$strDescripciongiro_negocio_cliente=cliente_util::getgiro_negocio_clienteDescripcion($giro_negocio_clienteLogic->getgiro_negocio_cliente());

		} else {
			$strDescripciongiro_negocio_cliente='null';
		}

		return $strDescripciongiro_negocio_cliente;
	}

	public function cargarDescripcionpaisFK($idpais,$connexion=null){
		$paisLogic= new pais_logic();
		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$strDescripcionpais='';

		if($idpais!=null && $idpais!='' && $idpais!='null') {
			if($connexion!=null) {
				$paisLogic->getEntity($idpais);//WithConnection
			} else {
				$paisLogic->getEntityWithConnection($idpais);//
			}

			$strDescripcionpais=cliente_util::getpaisDescripcion($paisLogic->getpais());

		} else {
			$strDescripcionpais='null';
		}

		return $strDescripcionpais;
	}

	public function cargarDescripcionprovinciaFK($idprovincia,$connexion=null){
		$provinciaLogic= new provincia_logic();
		$provinciaLogic->setConnexion($connexion);
		$provinciaLogic->getprovinciaDataAccess()->isForFKData=true;
		$strDescripcionprovincia='';

		if($idprovincia!=null && $idprovincia!='' && $idprovincia!='null') {
			if($connexion!=null) {
				$provinciaLogic->getEntity($idprovincia);//WithConnection
			} else {
				$provinciaLogic->getEntityWithConnection($idprovincia);//
			}

			$strDescripcionprovincia=cliente_util::getprovinciaDescripcion($provinciaLogic->getprovincia());

		} else {
			$strDescripcionprovincia='null';
		}

		return $strDescripcionprovincia;
	}

	public function cargarDescripcionciudadFK($idciudad,$connexion=null){
		$ciudadLogic= new ciudad_logic();
		$ciudadLogic->setConnexion($connexion);
		$ciudadLogic->getciudadDataAccess()->isForFKData=true;
		$strDescripcionciudad='';

		if($idciudad!=null && $idciudad!='' && $idciudad!='null') {
			if($connexion!=null) {
				$ciudadLogic->getEntity($idciudad);//WithConnection
			} else {
				$ciudadLogic->getEntityWithConnection($idciudad);//
			}

			$strDescripcionciudad=cliente_util::getciudadDescripcion($ciudadLogic->getciudad());

		} else {
			$strDescripcionciudad='null';
		}

		return $strDescripcionciudad;
	}

	public function cargarDescripcionvendedorFK($idvendedor,$connexion=null){
		$vendedorLogic= new vendedor_logic();
		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$strDescripcionvendedor='';

		if($idvendedor!=null && $idvendedor!='' && $idvendedor!='null') {
			if($connexion!=null) {
				$vendedorLogic->getEntity($idvendedor);//WithConnection
			} else {
				$vendedorLogic->getEntityWithConnection($idvendedor);//
			}

			$strDescripcionvendedor=cliente_util::getvendedorDescripcion($vendedorLogic->getvendedor());

		} else {
			$strDescripcionvendedor='null';
		}

		return $strDescripcionvendedor;
	}

	public function cargarDescripciontermino_pago_clienteFK($idtermino_pago_cliente,$connexion=null){
		$termino_pago_clienteLogic= new termino_pago_cliente_logic();
		$termino_pago_clienteLogic->setConnexion($connexion);
		$termino_pago_clienteLogic->gettermino_pago_clienteDataAccess()->isForFKData=true;
		$strDescripciontermino_pago_cliente='';

		if($idtermino_pago_cliente!=null && $idtermino_pago_cliente!='' && $idtermino_pago_cliente!='null') {
			if($connexion!=null) {
				$termino_pago_clienteLogic->getEntity($idtermino_pago_cliente);//WithConnection
			} else {
				$termino_pago_clienteLogic->getEntityWithConnection($idtermino_pago_cliente);//
			}

			$strDescripciontermino_pago_cliente=cliente_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLogic->gettermino_pago_cliente());

		} else {
			$strDescripciontermino_pago_cliente='null';
		}

		return $strDescripciontermino_pago_cliente;
	}

	public function cargarDescripcioncuentaFK($idcuenta,$connexion=null){
		$cuentaLogic= new cuenta_logic();
		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$strDescripcioncuenta='';

		if($idcuenta!=null && $idcuenta!='' && $idcuenta!='null') {
			if($connexion!=null) {
				$cuentaLogic->getEntity($idcuenta);//WithConnection
			} else {
				$cuentaLogic->getEntityWithConnection($idcuenta);//
			}

			$strDescripcioncuenta=cliente_util::getcuentaDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	public function cargarDescripcionimpuestoFK($idimpuesto,$connexion=null){
		$impuestoLogic= new impuesto_logic();
		$impuestoLogic->setConnexion($connexion);
		$impuestoLogic->getimpuestoDataAccess()->isForFKData=true;
		$strDescripcionimpuesto='';

		if($idimpuesto!=null && $idimpuesto!='' && $idimpuesto!='null') {
			if($connexion!=null) {
				$impuestoLogic->getEntity($idimpuesto);//WithConnection
			} else {
				$impuestoLogic->getEntityWithConnection($idimpuesto);//
			}

			$strDescripcionimpuesto=cliente_util::getimpuestoDescripcion($impuestoLogic->getimpuesto());

		} else {
			$strDescripcionimpuesto='null';
		}

		return $strDescripcionimpuesto;
	}

	public function cargarDescripcionretencionFK($idretencion,$connexion=null){
		$retencionLogic= new retencion_logic();
		$retencionLogic->setConnexion($connexion);
		$retencionLogic->getretencionDataAccess()->isForFKData=true;
		$strDescripcionretencion='';

		if($idretencion!=null && $idretencion!='' && $idretencion!='null') {
			if($connexion!=null) {
				$retencionLogic->getEntity($idretencion);//WithConnection
			} else {
				$retencionLogic->getEntityWithConnection($idretencion);//
			}

			$strDescripcionretencion=cliente_util::getretencionDescripcion($retencionLogic->getretencion());

		} else {
			$strDescripcionretencion='null';
		}

		return $strDescripcionretencion;
	}

	public function cargarDescripcionretencion_fuenteFK($idretencion_fuente,$connexion=null){
		$retencion_fuenteLogic= new retencion_fuente_logic();
		$retencion_fuenteLogic->setConnexion($connexion);
		$retencion_fuenteLogic->getretencion_fuenteDataAccess()->isForFKData=true;
		$strDescripcionretencion_fuente='';

		if($idretencion_fuente!=null && $idretencion_fuente!='' && $idretencion_fuente!='null') {
			if($connexion!=null) {
				$retencion_fuenteLogic->getEntity($idretencion_fuente);//WithConnection
			} else {
				$retencion_fuenteLogic->getEntityWithConnection($idretencion_fuente);//
			}

			$strDescripcionretencion_fuente=cliente_util::getretencion_fuenteDescripcion($retencion_fuenteLogic->getretencion_fuente());

		} else {
			$strDescripcionretencion_fuente='null';
		}

		return $strDescripcionretencion_fuente;
	}

	public function cargarDescripcionretencion_icaFK($idretencion_ica,$connexion=null){
		$retencion_icaLogic= new retencion_ica_logic();
		$retencion_icaLogic->setConnexion($connexion);
		$retencion_icaLogic->getretencion_icaDataAccess()->isForFKData=true;
		$strDescripcionretencion_ica='';

		if($idretencion_ica!=null && $idretencion_ica!='' && $idretencion_ica!='null') {
			if($connexion!=null) {
				$retencion_icaLogic->getEntity($idretencion_ica);//WithConnection
			} else {
				$retencion_icaLogic->getEntityWithConnection($idretencion_ica);//
			}

			$strDescripcionretencion_ica=cliente_util::getretencion_icaDescripcion($retencion_icaLogic->getretencion_ica());

		} else {
			$strDescripcionretencion_ica='null';
		}

		return $strDescripcionretencion_ica;
	}

	public function cargarDescripcionotro_impuestoFK($idotro_impuesto,$connexion=null){
		$otro_impuestoLogic= new otro_impuesto_logic();
		$otro_impuestoLogic->setConnexion($connexion);
		$otro_impuestoLogic->getotro_impuestoDataAccess()->isForFKData=true;
		$strDescripcionotro_impuesto='';

		if($idotro_impuesto!=null && $idotro_impuesto!='' && $idotro_impuesto!='null') {
			if($connexion!=null) {
				$otro_impuestoLogic->getEntity($idotro_impuesto);//WithConnection
			} else {
				$otro_impuestoLogic->getEntityWithConnection($idotro_impuesto);//
			}

			$strDescripcionotro_impuesto=cliente_util::getotro_impuestoDescripcion($otro_impuestoLogic->getotro_impuesto());

		} else {
			$strDescripcionotro_impuesto='null';
		}

		return $strDescripcionotro_impuesto;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(cliente $clienteClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$clienteClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParaempresa($isParaempresa){
		$strParaVisibleempresa='display:table-row';
		$strParaVisibleNegacionempresa='display:none';

		if($isParaempresa) {
			$strParaVisibleempresa='display:table-row';
			$strParaVisibleNegacionempresa='display:none';
		} else {
			$strParaVisibleempresa='display:none';
			$strParaVisibleNegacionempresa='display:table-row';
		}


		$strParaVisibleNegacionempresa=trim($strParaVisibleNegacionempresa);

		$this->strVisibleFK_Idcategoria_cliente=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idgiro_negocio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionempresa;
	}

	public function setVisibleBusquedasParatipo_persona($isParatipo_persona){
		$strParaVisibletipo_persona='display:table-row';
		$strParaVisibleNegaciontipo_persona='display:none';

		if($isParatipo_persona) {
			$strParaVisibletipo_persona='display:table-row';
			$strParaVisibleNegaciontipo_persona='display:none';
		} else {
			$strParaVisibletipo_persona='display:none';
			$strParaVisibleNegaciontipo_persona='display:table-row';
		}


		$strParaVisibleNegaciontipo_persona=trim($strParaVisibleNegaciontipo_persona);

		$this->strVisibleFK_Idcategoria_cliente=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idgiro_negocio=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idpais=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibletipo_persona;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegaciontipo_persona;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegaciontipo_persona;
	}

	public function setVisibleBusquedasParacategoria_cliente($isParacategoria_cliente){
		$strParaVisiblecategoria_cliente='display:table-row';
		$strParaVisibleNegacioncategoria_cliente='display:none';

		if($isParacategoria_cliente) {
			$strParaVisiblecategoria_cliente='display:table-row';
			$strParaVisibleNegacioncategoria_cliente='display:none';
		} else {
			$strParaVisiblecategoria_cliente='display:none';
			$strParaVisibleNegacioncategoria_cliente='display:table-row';
		}


		$strParaVisibleNegacioncategoria_cliente=trim($strParaVisibleNegacioncategoria_cliente);

		$this->strVisibleFK_Idcategoria_cliente=$strParaVisiblecategoria_cliente;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacioncategoria_cliente;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacioncategoria_cliente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncategoria_cliente;
		$this->strVisibleFK_Idgiro_negocio=$strParaVisibleNegacioncategoria_cliente;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacioncategoria_cliente;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacioncategoria_cliente;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacioncategoria_cliente;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacioncategoria_cliente;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacioncategoria_cliente;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacioncategoria_cliente;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacioncategoria_cliente;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacioncategoria_cliente;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacioncategoria_cliente;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegacioncategoria_cliente;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacioncategoria_cliente;
	}

	public function setVisibleBusquedasParatipo_precio($isParatipo_precio){
		$strParaVisibletipo_precio='display:table-row';
		$strParaVisibleNegaciontipo_precio='display:none';

		if($isParatipo_precio) {
			$strParaVisibletipo_precio='display:table-row';
			$strParaVisibleNegaciontipo_precio='display:none';
		} else {
			$strParaVisibletipo_precio='display:none';
			$strParaVisibleNegaciontipo_precio='display:table-row';
		}


		$strParaVisibleNegaciontipo_precio=trim($strParaVisibleNegaciontipo_precio);

		$this->strVisibleFK_Idcategoria_cliente=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idgiro_negocio=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idpais=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibletipo_precio;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegaciontipo_precio;
	}

	public function setVisibleBusquedasParagiro_negocio_cliente($isParagiro_negocio_cliente){
		$strParaVisiblegiro_negocio_cliente='display:table-row';
		$strParaVisibleNegaciongiro_negocio_cliente='display:none';

		if($isParagiro_negocio_cliente) {
			$strParaVisiblegiro_negocio_cliente='display:table-row';
			$strParaVisibleNegaciongiro_negocio_cliente='display:none';
		} else {
			$strParaVisiblegiro_negocio_cliente='display:none';
			$strParaVisibleNegaciongiro_negocio_cliente='display:table-row';
		}


		$strParaVisibleNegaciongiro_negocio_cliente=trim($strParaVisibleNegaciongiro_negocio_cliente);

		$this->strVisibleFK_Idcategoria_cliente=$strParaVisibleNegaciongiro_negocio_cliente;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegaciongiro_negocio_cliente;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegaciongiro_negocio_cliente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciongiro_negocio_cliente;
		$this->strVisibleFK_Idgiro_negocio=$strParaVisiblegiro_negocio_cliente;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegaciongiro_negocio_cliente;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegaciongiro_negocio_cliente;
		$this->strVisibleFK_Idpais=$strParaVisibleNegaciongiro_negocio_cliente;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegaciongiro_negocio_cliente;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegaciongiro_negocio_cliente;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegaciongiro_negocio_cliente;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegaciongiro_negocio_cliente;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegaciongiro_negocio_cliente;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegaciongiro_negocio_cliente;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegaciongiro_negocio_cliente;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegaciongiro_negocio_cliente;
	}

	public function setVisibleBusquedasParapais($isParapais){
		$strParaVisiblepais='display:table-row';
		$strParaVisibleNegacionpais='display:none';

		if($isParapais) {
			$strParaVisiblepais='display:table-row';
			$strParaVisibleNegacionpais='display:none';
		} else {
			$strParaVisiblepais='display:none';
			$strParaVisibleNegacionpais='display:table-row';
		}


		$strParaVisibleNegacionpais=trim($strParaVisibleNegacionpais);

		$this->strVisibleFK_Idcategoria_cliente=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idgiro_negocio=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idpais=$strParaVisiblepais;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionpais;
	}

	public function setVisibleBusquedasParaprovincia($isParaprovincia){
		$strParaVisibleprovincia='display:table-row';
		$strParaVisibleNegacionprovincia='display:none';

		if($isParaprovincia) {
			$strParaVisibleprovincia='display:table-row';
			$strParaVisibleNegacionprovincia='display:none';
		} else {
			$strParaVisibleprovincia='display:none';
			$strParaVisibleNegacionprovincia='display:table-row';
		}


		$strParaVisibleNegacionprovincia=trim($strParaVisibleNegacionprovincia);

		$this->strVisibleFK_Idcategoria_cliente=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idgiro_negocio=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idprovincia=$strParaVisibleprovincia;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionprovincia;
	}

	public function setVisibleBusquedasParaciudad($isParaciudad){
		$strParaVisibleciudad='display:table-row';
		$strParaVisibleNegacionciudad='display:none';

		if($isParaciudad) {
			$strParaVisibleciudad='display:table-row';
			$strParaVisibleNegacionciudad='display:none';
		} else {
			$strParaVisibleciudad='display:none';
			$strParaVisibleNegacionciudad='display:table-row';
		}


		$strParaVisibleNegacionciudad=trim($strParaVisibleNegacionciudad);

		$this->strVisibleFK_Idcategoria_cliente=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idciudad=$strParaVisibleciudad;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idgiro_negocio=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionciudad;
	}

	public function setVisibleBusquedasParavendedor($isParavendedor){
		$strParaVisiblevendedor='display:table-row';
		$strParaVisibleNegacionvendedor='display:none';

		if($isParavendedor) {
			$strParaVisiblevendedor='display:table-row';
			$strParaVisibleNegacionvendedor='display:none';
		} else {
			$strParaVisiblevendedor='display:none';
			$strParaVisibleNegacionvendedor='display:table-row';
		}


		$strParaVisibleNegacionvendedor=trim($strParaVisibleNegacionvendedor);

		$this->strVisibleFK_Idcategoria_cliente=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idgiro_negocio=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idvendedor=$strParaVisiblevendedor;
	}

	public function setVisibleBusquedasParatermino_pago_cliente($isParatermino_pago_cliente){
		$strParaVisibletermino_pago_cliente='display:table-row';
		$strParaVisibleNegaciontermino_pago_cliente='display:none';

		if($isParatermino_pago_cliente) {
			$strParaVisibletermino_pago_cliente='display:table-row';
			$strParaVisibleNegaciontermino_pago_cliente='display:none';
		} else {
			$strParaVisibletermino_pago_cliente='display:none';
			$strParaVisibleNegaciontermino_pago_cliente='display:table-row';
		}


		$strParaVisibleNegaciontermino_pago_cliente=trim($strParaVisibleNegaciontermino_pago_cliente);

		$this->strVisibleFK_Idcategoria_cliente=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idgiro_negocio=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idpais=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibletermino_pago_cliente;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegaciontermino_pago_cliente;
	}

	public function setVisibleBusquedasParacuenta($isParacuenta){
		$strParaVisiblecuenta='display:table-row';
		$strParaVisibleNegacioncuenta='display:none';

		if($isParacuenta) {
			$strParaVisiblecuenta='display:table-row';
			$strParaVisibleNegacioncuenta='display:none';
		} else {
			$strParaVisiblecuenta='display:none';
			$strParaVisibleNegacioncuenta='display:table-row';
		}


		$strParaVisibleNegacioncuenta=trim($strParaVisibleNegacioncuenta);

		$this->strVisibleFK_Idcategoria_cliente=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idcuenta=$strParaVisiblecuenta;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idgiro_negocio=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacioncuenta;
	}

	public function setVisibleBusquedasParaimpuesto($isParaimpuesto){
		$strParaVisibleimpuesto='display:table-row';
		$strParaVisibleNegacionimpuesto='display:none';

		if($isParaimpuesto) {
			$strParaVisibleimpuesto='display:table-row';
			$strParaVisibleNegacionimpuesto='display:none';
		} else {
			$strParaVisibleimpuesto='display:none';
			$strParaVisibleNegacionimpuesto='display:table-row';
		}


		$strParaVisibleNegacionimpuesto=trim($strParaVisibleNegacionimpuesto);

		$this->strVisibleFK_Idcategoria_cliente=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idgiro_negocio=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleimpuesto;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegacionimpuesto;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionimpuesto;
	}

	public function setVisibleBusquedasPararetencion($isPararetencion){
		$strParaVisibleretencion='display:table-row';
		$strParaVisibleNegacionretencion='display:none';

		if($isPararetencion) {
			$strParaVisibleretencion='display:table-row';
			$strParaVisibleNegacionretencion='display:none';
		} else {
			$strParaVisibleretencion='display:none';
			$strParaVisibleNegacionretencion='display:table-row';
		}


		$strParaVisibleNegacionretencion=trim($strParaVisibleNegacionretencion);

		$this->strVisibleFK_Idcategoria_cliente=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idgiro_negocio=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idretencion=$strParaVisibleretencion;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegacionretencion;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionretencion;
	}

	public function setVisibleBusquedasPararetencion_fuente($isPararetencion_fuente){
		$strParaVisibleretencion_fuente='display:table-row';
		$strParaVisibleNegacionretencion_fuente='display:none';

		if($isPararetencion_fuente) {
			$strParaVisibleretencion_fuente='display:table-row';
			$strParaVisibleNegacionretencion_fuente='display:none';
		} else {
			$strParaVisibleretencion_fuente='display:none';
			$strParaVisibleNegacionretencion_fuente='display:table-row';
		}


		$strParaVisibleNegacionretencion_fuente=trim($strParaVisibleNegacionretencion_fuente);

		$this->strVisibleFK_Idcategoria_cliente=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idgiro_negocio=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleretencion_fuente;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegacionretencion_fuente;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionretencion_fuente;
	}

	public function setVisibleBusquedasPararetencion_ica($isPararetencion_ica){
		$strParaVisibleretencion_ica='display:table-row';
		$strParaVisibleNegacionretencion_ica='display:none';

		if($isPararetencion_ica) {
			$strParaVisibleretencion_ica='display:table-row';
			$strParaVisibleNegacionretencion_ica='display:none';
		} else {
			$strParaVisibleretencion_ica='display:none';
			$strParaVisibleNegacionretencion_ica='display:table-row';
		}


		$strParaVisibleNegacionretencion_ica=trim($strParaVisibleNegacionretencion_ica);

		$this->strVisibleFK_Idcategoria_cliente=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idgiro_negocio=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleretencion_ica;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegacionretencion_ica;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionretencion_ica;
	}

	public function setVisibleBusquedasParaotro_impuesto($isParaotro_impuesto){
		$strParaVisibleotro_impuesto='display:table-row';
		$strParaVisibleNegacionotro_impuesto='display:none';

		if($isParaotro_impuesto) {
			$strParaVisibleotro_impuesto='display:table-row';
			$strParaVisibleNegacionotro_impuesto='display:none';
		} else {
			$strParaVisibleotro_impuesto='display:none';
			$strParaVisibleNegacionotro_impuesto='display:table-row';
		}


		$strParaVisibleNegacionotro_impuesto=trim($strParaVisibleNegacionotro_impuesto);

		$this->strVisibleFK_Idcategoria_cliente=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idgiro_negocio=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idimpuesto=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idotro_impuesto=$strParaVisibleotro_impuesto;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idretencion=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idretencion_fuente=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idretencion_ica=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idtermino_pago=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idtipo_persona=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegacionotro_impuesto;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionotro_impuesto;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idclienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclienteActual=$idclienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcliente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_persona() {//$idclienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclienteActual=$idclienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_persona_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_persona(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_persona_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_persona(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_persona_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcliente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacategoria_cliente() {//$idclienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclienteActual=$idclienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.categoria_cliente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_categoria_cliente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',categoria_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_categoria_cliente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(categoria_cliente_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcliente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_precio() {//$idclienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclienteActual=$idclienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_precio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_precio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_precio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_precio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_precio_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcliente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParagiro_negocio_cliente() {//$idclienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclienteActual=$idclienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.giro_negocio_cliente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_giro_negocio_cliente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',giro_negocio_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_giro_negocio_cliente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(giro_negocio_cliente_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcliente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParapais() {//$idclienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclienteActual=$idclienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.pais_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_pais(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',pais_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_pais(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(pais_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcliente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaprovincia() {//$idclienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclienteActual=$idclienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.provincia_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_provincia(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',provincia_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_provincia(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(provincia_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcliente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaciudad() {//$idclienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclienteActual=$idclienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ciudad_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ciudad(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ciudad_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ciudad(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ciudad_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcliente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParavendedor() {//$idclienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclienteActual=$idclienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.vendedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_vendedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',vendedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_vendedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(vendedor_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcliente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatermino_pago_cliente() {//$idclienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclienteActual=$idclienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.termino_pago_cliente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_termino_pago_cliente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',termino_pago_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_termino_pago_cliente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_cliente_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcliente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta() {//$idclienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclienteActual=$idclienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcliente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaimpuesto() {//$idclienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclienteActual=$idclienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.impuesto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_impuesto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',impuesto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_impuesto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(impuesto_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcliente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaPararetencion() {//$idclienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclienteActual=$idclienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.retencion_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retencion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcliente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaPararetencion_fuente() {//$idclienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclienteActual=$idclienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.retencion_fuente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion_fuente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retencion_fuente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion_fuente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_fuente_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcliente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaPararetencion_ica() {//$idclienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclienteActual=$idclienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.retencion_ica_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion_ica(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retencion_ica_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_retencion_ica(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_ica_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcliente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaotro_impuesto() {//$idclienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclienteActual=$idclienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.otro_impuesto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_otro_impuesto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',otro_impuesto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_otro_impuesto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(otro_impuesto_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcliente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParadevolucion_facturas(int $idclienteActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idclienteActual=$idclienteActual;

		$bitPaginaPopupdevolucion_factura=false;

		try {

			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}

			$devolucion_factura_session=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME));

			if($devolucion_factura_session==null) {
				$devolucion_factura_session=new devolucion_factura_session();
			}

			$devolucion_factura_session->strUltimaBusqueda='FK_Idcliente';
			$devolucion_factura_session->strPathNavegacionActual=$cliente_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.devolucion_factura_util::$STR_CLASS_WEB_TITULO;
			$devolucion_factura_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupdevolucion_factura=$devolucion_factura_session->bitPaginaPopup;
			$devolucion_factura_session->setPaginaPopupVariables(true);
			$bitPaginaPopupdevolucion_factura=$devolucion_factura_session->bitPaginaPopup;
			$devolucion_factura_session->bitPermiteNavegacionHaciaFKDesde=false;
			$devolucion_factura_session->strNombrePaginaNavegacionHaciaFKDesde=cliente_util::$STR_NOMBRE_OPCION;
			$devolucion_factura_session->bitBusquedaDesdeFKSesioncliente=true;
			$devolucion_factura_session->bigidclienteActual=$this->idclienteActual;

			$cliente_session->bitBusquedaDesdeFKSesionFK=true;
			$cliente_session->bigIdActualFK=$this->idclienteActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"devolucion_factura"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cliente_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"devolucion_factura"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));
			$this->Session->write(devolucion_factura_util::$STR_SESSION_NAME,serialize($devolucion_factura_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupdevolucion_factura!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',devolucion_factura_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(devolucion_factura_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',devolucion_factura_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(devolucion_factura_util::$STR_CLASS_NAME,'cuentascobrar','','NO-POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParacuenta_cobrars(int $idclienteActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idclienteActual=$idclienteActual;

		$bitPaginaPopupcuenta_cobrar=false;

		try {

			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}

			$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

			if($cuenta_cobrar_session==null) {
				$cuenta_cobrar_session=new cuenta_cobrar_session();
			}

			$cuenta_cobrar_session->strUltimaBusqueda='FK_Idcliente';
			$cuenta_cobrar_session->strPathNavegacionActual=$cliente_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
			$cuenta_cobrar_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcuenta_cobrar=$cuenta_cobrar_session->bitPaginaPopup;
			$cuenta_cobrar_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcuenta_cobrar=$cuenta_cobrar_session->bitPaginaPopup;
			$cuenta_cobrar_session->bitPermiteNavegacionHaciaFKDesde=false;
			$cuenta_cobrar_session->strNombrePaginaNavegacionHaciaFKDesde=cliente_util::$STR_NOMBRE_OPCION;
			$cuenta_cobrar_session->bitBusquedaDesdeFKSesioncliente=true;
			$cuenta_cobrar_session->bigidclienteActual=$this->idclienteActual;

			$cliente_session->bitBusquedaDesdeFKSesionFK=true;
			$cliente_session->bigIdActualFK=$this->idclienteActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"cuenta_cobrar"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cliente_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"cuenta_cobrar"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));
			$this->Session->write(cuenta_cobrar_util::$STR_SESSION_NAME,serialize($cuenta_cobrar_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcuenta_cobrar!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_cobrar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_cobrar_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_cobrar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_cobrar_util::$STR_CLASS_NAME,'cuentascobrar','','NO-POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParadocumento_clientees(int $idclienteActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idclienteActual=$idclienteActual;

		$bitPaginaPopupdocumento_cliente=false;

		try {

			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}

			$documento_cliente_session=unserialize($this->Session->read(documento_cliente_util::$STR_SESSION_NAME));

			if($documento_cliente_session==null) {
				$documento_cliente_session=new documento_cliente_session();
			}

			$documento_cliente_session->strUltimaBusqueda='FK_Idcliente';
			$documento_cliente_session->strPathNavegacionActual=$cliente_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.documento_cliente_util::$STR_CLASS_WEB_TITULO;
			$documento_cliente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupdocumento_cliente=$documento_cliente_session->bitPaginaPopup;
			$documento_cliente_session->setPaginaPopupVariables(true);
			$bitPaginaPopupdocumento_cliente=$documento_cliente_session->bitPaginaPopup;
			$documento_cliente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$documento_cliente_session->strNombrePaginaNavegacionHaciaFKDesde=cliente_util::$STR_NOMBRE_OPCION;
			$documento_cliente_session->bitBusquedaDesdeFKSesioncliente=true;
			$documento_cliente_session->bigidclienteActual=$this->idclienteActual;

			$cliente_session->bitBusquedaDesdeFKSesionFK=true;
			$cliente_session->bigIdActualFK=$this->idclienteActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"documento_cliente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cliente_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"documento_cliente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));
			$this->Session->write(documento_cliente_util::$STR_SESSION_NAME,serialize($documento_cliente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupdocumento_cliente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',documento_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(documento_cliente_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',documento_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(documento_cliente_util::$STR_CLASS_NAME,'cuentascobrar','','NO-POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaestimados(int $idclienteActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idclienteActual=$idclienteActual;

		$bitPaginaPopupestimado=false;

		try {

			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}

			$estimado_session=unserialize($this->Session->read(estimado_util::$STR_SESSION_NAME));

			if($estimado_session==null) {
				$estimado_session=new estimado_session();
			}

			$estimado_session->strUltimaBusqueda='FK_Idcliente';
			$estimado_session->strPathNavegacionActual=$cliente_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.estimado_util::$STR_CLASS_WEB_TITULO;
			$estimado_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupestimado=$estimado_session->bitPaginaPopup;
			$estimado_session->setPaginaPopupVariables(true);
			$bitPaginaPopupestimado=$estimado_session->bitPaginaPopup;
			$estimado_session->bitPermiteNavegacionHaciaFKDesde=false;
			$estimado_session->strNombrePaginaNavegacionHaciaFKDesde=cliente_util::$STR_NOMBRE_OPCION;
			$estimado_session->bitBusquedaDesdeFKSesioncliente=true;
			$estimado_session->bigidclienteActual=$this->idclienteActual;

			$cliente_session->bitBusquedaDesdeFKSesionFK=true;
			$cliente_session->bigIdActualFK=$this->idclienteActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"estimado"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cliente_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"estimado"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));
			$this->Session->write(estimado_util::$STR_SESSION_NAME,serialize($estimado_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupestimado!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',estimado_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(estimado_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',estimado_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(estimado_util::$STR_CLASS_NAME,'cuentascobrar','','NO-POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaimagen_clientes(int $idclienteActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idclienteActual=$idclienteActual;

		$bitPaginaPopupimagen_cliente=false;

		try {

			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}

			$imagen_cliente_session=unserialize($this->Session->read(imagen_cliente_util::$STR_SESSION_NAME));

			if($imagen_cliente_session==null) {
				$imagen_cliente_session=new imagen_cliente_session();
			}

			$imagen_cliente_session->strUltimaBusqueda='FK_Idcliente';
			$imagen_cliente_session->strPathNavegacionActual=$cliente_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.imagen_cliente_util::$STR_CLASS_WEB_TITULO;
			$imagen_cliente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupimagen_cliente=$imagen_cliente_session->bitPaginaPopup;
			$imagen_cliente_session->setPaginaPopupVariables(true);
			$bitPaginaPopupimagen_cliente=$imagen_cliente_session->bitPaginaPopup;
			$imagen_cliente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$imagen_cliente_session->strNombrePaginaNavegacionHaciaFKDesde=cliente_util::$STR_NOMBRE_OPCION;
			$imagen_cliente_session->bitBusquedaDesdeFKSesioncliente=true;
			$imagen_cliente_session->bigidclienteActual=$this->idclienteActual;

			$cliente_session->bitBusquedaDesdeFKSesionFK=true;
			$cliente_session->bigIdActualFK=$this->idclienteActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"imagen_cliente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cliente_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"imagen_cliente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));
			$this->Session->write(imagen_cliente_util::$STR_SESSION_NAME,serialize($imagen_cliente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupimagen_cliente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',imagen_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(imagen_cliente_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',imagen_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(imagen_cliente_util::$STR_CLASS_NAME,'cuentascobrar','','NO-POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParafacturas(int $idclienteActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idclienteActual=$idclienteActual;

		$bitPaginaPopupfactura=false;

		try {

			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}

			$factura_session=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME));

			if($factura_session==null) {
				$factura_session=new factura_session();
			}

			$factura_session->strUltimaBusqueda='FK_Idcliente';
			$factura_session->strPathNavegacionActual=$cliente_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.factura_util::$STR_CLASS_WEB_TITULO;
			$factura_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupfactura=$factura_session->bitPaginaPopup;
			$factura_session->setPaginaPopupVariables(true);
			$bitPaginaPopupfactura=$factura_session->bitPaginaPopup;
			$factura_session->bitPermiteNavegacionHaciaFKDesde=false;
			$factura_session->strNombrePaginaNavegacionHaciaFKDesde=cliente_util::$STR_NOMBRE_OPCION;
			$factura_session->bitBusquedaDesdeFKSesioncliente=true;
			$factura_session->bigidclienteActual=$this->idclienteActual;

			$cliente_session->bitBusquedaDesdeFKSesionFK=true;
			$cliente_session->bigIdActualFK=$this->idclienteActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"factura"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cliente_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"factura"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));
			$this->Session->write(factura_util::$STR_SESSION_NAME,serialize($factura_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupfactura!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',factura_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(factura_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',factura_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(factura_util::$STR_CLASS_NAME,'cuentascobrar','','NO-POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaconsignaciones(int $idclienteActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idclienteActual=$idclienteActual;

		$bitPaginaPopupconsignacion=false;

		try {

			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}

			$consignacion_session=unserialize($this->Session->read(consignacion_util::$STR_SESSION_NAME));

			if($consignacion_session==null) {
				$consignacion_session=new consignacion_session();
			}

			$consignacion_session->strUltimaBusqueda='FK_Idcliente';
			$consignacion_session->strPathNavegacionActual=$cliente_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.consignacion_util::$STR_CLASS_WEB_TITULO;
			$consignacion_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupconsignacion=$consignacion_session->bitPaginaPopup;
			$consignacion_session->setPaginaPopupVariables(true);
			$bitPaginaPopupconsignacion=$consignacion_session->bitPaginaPopup;
			$consignacion_session->bitPermiteNavegacionHaciaFKDesde=false;
			$consignacion_session->strNombrePaginaNavegacionHaciaFKDesde=cliente_util::$STR_NOMBRE_OPCION;
			$consignacion_session->bitBusquedaDesdeFKSesioncliente=true;
			$consignacion_session->bigidclienteActual=$this->idclienteActual;

			$cliente_session->bitBusquedaDesdeFKSesionFK=true;
			$cliente_session->bigIdActualFK=$this->idclienteActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"consignacion"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cliente_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"consignacion"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));
			$this->Session->write(consignacion_util::$STR_SESSION_NAME,serialize($consignacion_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupconsignacion!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',consignacion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(consignacion_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',consignacion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(consignacion_util::$STR_CLASS_NAME,'cuentascobrar','','NO-POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParalista_clientes(int $idclienteActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idclienteActual=$idclienteActual;

		$bitPaginaPopuplista_cliente=false;

		try {

			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}

			$lista_cliente_session=unserialize($this->Session->read(lista_cliente_util::$STR_SESSION_NAME));

			if($lista_cliente_session==null) {
				$lista_cliente_session=new lista_cliente_session();
			}

			$lista_cliente_session->strUltimaBusqueda='FK_Idcliente';
			$lista_cliente_session->strPathNavegacionActual=$cliente_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.lista_cliente_util::$STR_CLASS_WEB_TITULO;
			$lista_cliente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopuplista_cliente=$lista_cliente_session->bitPaginaPopup;
			$lista_cliente_session->setPaginaPopupVariables(true);
			$bitPaginaPopuplista_cliente=$lista_cliente_session->bitPaginaPopup;
			$lista_cliente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$lista_cliente_session->strNombrePaginaNavegacionHaciaFKDesde=cliente_util::$STR_NOMBRE_OPCION;
			$lista_cliente_session->bitBusquedaDesdeFKSesioncliente=true;
			$lista_cliente_session->bigidclienteActual=$this->idclienteActual;

			$cliente_session->bitBusquedaDesdeFKSesionFK=true;
			$cliente_session->bigIdActualFK=$this->idclienteActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"lista_cliente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cliente_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"lista_cliente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));
			$this->Session->write(lista_cliente_util::$STR_SESSION_NAME,serialize($lista_cliente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopuplista_cliente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',lista_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(lista_cliente_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',lista_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(lista_cliente_util::$STR_CLASS_NAME,'cuentascobrar','','NO-POPUP',$this->strTipoPaginaAuxiliarcliente,$this->strTipoUsuarioAuxiliarcliente,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(cliente_util::$STR_SESSION_NAME,cliente_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$cliente_session=$this->Session->read(cliente_util::$STR_SESSION_NAME);
				
		if($cliente_session==null) {
			$cliente_session=new cliente_session();		
			//$this->Session->write('cliente_session',$cliente_session);							
		}
		*/
		
		$cliente_session=new cliente_session();
    	$cliente_session->strPathNavegacionActual=cliente_util::$STR_CLASS_WEB_TITULO;
    	$cliente_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));		
	}	
	
	public function getSetBusquedasSesionConfig(cliente_session $cliente_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($cliente_session->bitBusquedaDesdeFKSesionFK!=null && $cliente_session->bitBusquedaDesdeFKSesionFK==true) {
			if($cliente_session->bigIdActualFK!=null && $cliente_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$cliente_session->bigIdActualFKParaPosibleAtras=$cliente_session->bigIdActualFK;*/
			}
				
			$cliente_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$cliente_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(cliente_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($cliente_session->bitBusquedaDesdeFKSesionempresa!=null && $cliente_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($cliente_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(cliente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cliente_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($cliente_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cliente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cliente_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cliente_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;

				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			else if($cliente_session->bitBusquedaDesdeFKSesiontipo_persona!=null && $cliente_session->bitBusquedaDesdeFKSesiontipo_persona==true)
			{
				if($cliente_session->bigidtipo_personaActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_persona';

					$existe_history=HistoryWeb::ExisteElemento(cliente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cliente_session->bigidtipo_personaActualDescripcion);
						$historyWeb->setIdActual($cliente_session->bigidtipo_personaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cliente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cliente_session->bigidtipo_personaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cliente_session->bitBusquedaDesdeFKSesiontipo_persona=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;

				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			else if($cliente_session->bitBusquedaDesdeFKSesioncategoria_cliente!=null && $cliente_session->bitBusquedaDesdeFKSesioncategoria_cliente==true)
			{
				if($cliente_session->bigidcategoria_clienteActual!=0) {
					$this->strAccionBusqueda='FK_Idcategoria_cliente';

					$existe_history=HistoryWeb::ExisteElemento(cliente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cliente_session->bigidcategoria_clienteActualDescripcion);
						$historyWeb->setIdActual($cliente_session->bigidcategoria_clienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cliente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cliente_session->bigidcategoria_clienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cliente_session->bitBusquedaDesdeFKSesioncategoria_cliente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;

				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			else if($cliente_session->bitBusquedaDesdeFKSesiontipo_precio!=null && $cliente_session->bitBusquedaDesdeFKSesiontipo_precio==true)
			{
				if($cliente_session->bigidtipo_precioActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_precio';

					$existe_history=HistoryWeb::ExisteElemento(cliente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cliente_session->bigidtipo_precioActualDescripcion);
						$historyWeb->setIdActual($cliente_session->bigidtipo_precioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cliente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cliente_session->bigidtipo_precioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cliente_session->bitBusquedaDesdeFKSesiontipo_precio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;

				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			else if($cliente_session->bitBusquedaDesdeFKSesiongiro_negocio_cliente!=null && $cliente_session->bitBusquedaDesdeFKSesiongiro_negocio_cliente==true)
			{
				if($cliente_session->bigidgiro_negocio_clienteActual!=0) {
					$this->strAccionBusqueda='FK_Idgiro_negocio_cliente';

					$existe_history=HistoryWeb::ExisteElemento(cliente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cliente_session->bigidgiro_negocio_clienteActualDescripcion);
						$historyWeb->setIdActual($cliente_session->bigidgiro_negocio_clienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cliente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cliente_session->bigidgiro_negocio_clienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cliente_session->bitBusquedaDesdeFKSesiongiro_negocio_cliente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;

				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			else if($cliente_session->bitBusquedaDesdeFKSesionpais!=null && $cliente_session->bitBusquedaDesdeFKSesionpais==true)
			{
				if($cliente_session->bigidpaisActual!=0) {
					$this->strAccionBusqueda='FK_Idpais';

					$existe_history=HistoryWeb::ExisteElemento(cliente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cliente_session->bigidpaisActualDescripcion);
						$historyWeb->setIdActual($cliente_session->bigidpaisActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cliente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cliente_session->bigidpaisActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cliente_session->bitBusquedaDesdeFKSesionpais=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;

				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			else if($cliente_session->bitBusquedaDesdeFKSesionprovincia!=null && $cliente_session->bitBusquedaDesdeFKSesionprovincia==true)
			{
				if($cliente_session->bigidprovinciaActual!=0) {
					$this->strAccionBusqueda='FK_Idprovincia';

					$existe_history=HistoryWeb::ExisteElemento(cliente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cliente_session->bigidprovinciaActualDescripcion);
						$historyWeb->setIdActual($cliente_session->bigidprovinciaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cliente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cliente_session->bigidprovinciaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cliente_session->bitBusquedaDesdeFKSesionprovincia=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;

				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			else if($cliente_session->bitBusquedaDesdeFKSesionciudad!=null && $cliente_session->bitBusquedaDesdeFKSesionciudad==true)
			{
				if($cliente_session->bigidciudadActual!=0) {
					$this->strAccionBusqueda='FK_Idciudad';

					$existe_history=HistoryWeb::ExisteElemento(cliente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cliente_session->bigidciudadActualDescripcion);
						$historyWeb->setIdActual($cliente_session->bigidciudadActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cliente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cliente_session->bigidciudadActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cliente_session->bitBusquedaDesdeFKSesionciudad=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;

				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			else if($cliente_session->bitBusquedaDesdeFKSesionvendedor!=null && $cliente_session->bitBusquedaDesdeFKSesionvendedor==true)
			{
				if($cliente_session->bigidvendedorActual!=0) {
					$this->strAccionBusqueda='FK_Idvendedor';

					$existe_history=HistoryWeb::ExisteElemento(cliente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cliente_session->bigidvendedorActualDescripcion);
						$historyWeb->setIdActual($cliente_session->bigidvendedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cliente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cliente_session->bigidvendedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cliente_session->bitBusquedaDesdeFKSesionvendedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;

				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			else if($cliente_session->bitBusquedaDesdeFKSesiontermino_pago_cliente!=null && $cliente_session->bitBusquedaDesdeFKSesiontermino_pago_cliente==true)
			{
				if($cliente_session->bigidtermino_pago_clienteActual!=0) {
					$this->strAccionBusqueda='FK_Idtermino_pago_cliente';

					$existe_history=HistoryWeb::ExisteElemento(cliente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cliente_session->bigidtermino_pago_clienteActualDescripcion);
						$historyWeb->setIdActual($cliente_session->bigidtermino_pago_clienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cliente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cliente_session->bigidtermino_pago_clienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cliente_session->bitBusquedaDesdeFKSesiontermino_pago_cliente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;

				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			else if($cliente_session->bitBusquedaDesdeFKSesioncuenta!=null && $cliente_session->bitBusquedaDesdeFKSesioncuenta==true)
			{
				if($cliente_session->bigidcuentaActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta';

					$existe_history=HistoryWeb::ExisteElemento(cliente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cliente_session->bigidcuentaActualDescripcion);
						$historyWeb->setIdActual($cliente_session->bigidcuentaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cliente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cliente_session->bigidcuentaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cliente_session->bitBusquedaDesdeFKSesioncuenta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;

				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			else if($cliente_session->bitBusquedaDesdeFKSesionimpuesto!=null && $cliente_session->bitBusquedaDesdeFKSesionimpuesto==true)
			{
				if($cliente_session->bigidimpuestoActual!=0) {
					$this->strAccionBusqueda='FK_Idimpuesto';

					$existe_history=HistoryWeb::ExisteElemento(cliente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cliente_session->bigidimpuestoActualDescripcion);
						$historyWeb->setIdActual($cliente_session->bigidimpuestoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cliente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cliente_session->bigidimpuestoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cliente_session->bitBusquedaDesdeFKSesionimpuesto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;

				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			else if($cliente_session->bitBusquedaDesdeFKSesionretencion!=null && $cliente_session->bitBusquedaDesdeFKSesionretencion==true)
			{
				if($cliente_session->bigidretencionActual!=0) {
					$this->strAccionBusqueda='FK_Idretencion';

					$existe_history=HistoryWeb::ExisteElemento(cliente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cliente_session->bigidretencionActualDescripcion);
						$historyWeb->setIdActual($cliente_session->bigidretencionActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cliente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cliente_session->bigidretencionActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cliente_session->bitBusquedaDesdeFKSesionretencion=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;

				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			else if($cliente_session->bitBusquedaDesdeFKSesionretencion_fuente!=null && $cliente_session->bitBusquedaDesdeFKSesionretencion_fuente==true)
			{
				if($cliente_session->bigidretencion_fuenteActual!=0) {
					$this->strAccionBusqueda='FK_Idretencion_fuente';

					$existe_history=HistoryWeb::ExisteElemento(cliente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cliente_session->bigidretencion_fuenteActualDescripcion);
						$historyWeb->setIdActual($cliente_session->bigidretencion_fuenteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cliente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cliente_session->bigidretencion_fuenteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cliente_session->bitBusquedaDesdeFKSesionretencion_fuente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;

				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			else if($cliente_session->bitBusquedaDesdeFKSesionretencion_ica!=null && $cliente_session->bitBusquedaDesdeFKSesionretencion_ica==true)
			{
				if($cliente_session->bigidretencion_icaActual!=0) {
					$this->strAccionBusqueda='FK_Idretencion_ica';

					$existe_history=HistoryWeb::ExisteElemento(cliente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cliente_session->bigidretencion_icaActualDescripcion);
						$historyWeb->setIdActual($cliente_session->bigidretencion_icaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cliente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cliente_session->bigidretencion_icaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cliente_session->bitBusquedaDesdeFKSesionretencion_ica=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;

				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			else if($cliente_session->bitBusquedaDesdeFKSesionotro_impuesto!=null && $cliente_session->bitBusquedaDesdeFKSesionotro_impuesto==true)
			{
				if($cliente_session->bigidotro_impuestoActual!=0) {
					$this->strAccionBusqueda='FK_Idotro_impuesto';

					$existe_history=HistoryWeb::ExisteElemento(cliente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cliente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cliente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cliente_session->bigidotro_impuestoActualDescripcion);
						$historyWeb->setIdActual($cliente_session->bigidotro_impuestoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cliente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cliente_session->bigidotro_impuestoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cliente_session->bitBusquedaDesdeFKSesionotro_impuesto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;

				if($cliente_session->intNumeroPaginacion==cliente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cliente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$cliente_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));
		
		if($cliente_session==null) {
			$cliente_session=new cliente_session();
		}
		
		$cliente_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$cliente_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cliente_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcategoria_cliente') {
			$cliente_session->id_categoria_cliente=$this->id_categoria_clienteFK_Idcategoria_cliente;	

		}
		else if($this->strAccionBusqueda=='FK_Idciudad') {
			$cliente_session->id_ciudad=$this->id_ciudadFK_Idciudad;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta') {
			$cliente_session->id_cuenta=$this->id_cuentaFK_Idcuenta;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$cliente_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idgiro_negocio') {
			$cliente_session->id_giro_negocio_cliente=$this->id_giro_negocio_clienteFK_Idgiro_negocio;	

		}
		else if($this->strAccionBusqueda=='FK_Idimpuesto') {
			$cliente_session->id_impuesto=$this->id_impuestoFK_Idimpuesto;	

		}
		else if($this->strAccionBusqueda=='FK_Idotro_impuesto') {
			$cliente_session->id_otro_impuesto=$this->id_otro_impuestoFK_Idotro_impuesto;	

		}
		else if($this->strAccionBusqueda=='FK_Idpais') {
			$cliente_session->id_pais=$this->id_paisFK_Idpais;	

		}
		else if($this->strAccionBusqueda=='FK_Idprovincia') {
			$cliente_session->id_provincia=$this->id_provinciaFK_Idprovincia;	

		}
		else if($this->strAccionBusqueda=='FK_Idretencion') {
			$cliente_session->id_retencion=$this->id_retencionFK_Idretencion;	

		}
		else if($this->strAccionBusqueda=='FK_Idretencion_fuente') {
			$cliente_session->id_retencion_fuente=$this->id_retencion_fuenteFK_Idretencion_fuente;	

		}
		else if($this->strAccionBusqueda=='FK_Idretencion_ica') {
			$cliente_session->id_retencion_ica=$this->id_retencion_icaFK_Idretencion_ica;	

		}
		else if($this->strAccionBusqueda=='FK_Idtermino_pago') {
			$cliente_session->id_termino_pago_cliente=$this->id_termino_pago_clienteFK_Idtermino_pago;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_persona') {
			$cliente_session->id_tipo_persona=$this->id_tipo_personaFK_Idtipo_persona;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_precio') {
			$cliente_session->id_tipo_precio=$this->id_tipo_precioFK_Idtipo_precio;	

		}
		else if($this->strAccionBusqueda=='FK_Idvendedor') {
			$cliente_session->id_vendedor=$this->id_vendedorFK_Idvendedor;	

		}
		
		$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(cliente_session $cliente_session) {
		
		if($cliente_session==null) {
			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));
		}
		
		if($cliente_session==null) {
		   $cliente_session=new cliente_session();
		}
		
		if($cliente_session->strUltimaBusqueda!=null && $cliente_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$cliente_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$cliente_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$cliente_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcategoria_cliente') {
				$this->id_categoria_clienteFK_Idcategoria_cliente=$cliente_session->id_categoria_cliente;
				$cliente_session->id_categoria_cliente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idciudad') {
				$this->id_ciudadFK_Idciudad=$cliente_session->id_ciudad;
				$cliente_session->id_ciudad=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta') {
				$this->id_cuentaFK_Idcuenta=$cliente_session->id_cuenta;
				$cliente_session->id_cuenta=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$cliente_session->id_empresa;
				$cliente_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idgiro_negocio') {
				$this->id_giro_negocio_clienteFK_Idgiro_negocio=$cliente_session->id_giro_negocio_cliente;
				$cliente_session->id_giro_negocio_cliente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idimpuesto') {
				$this->id_impuestoFK_Idimpuesto=$cliente_session->id_impuesto;
				$cliente_session->id_impuesto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idotro_impuesto') {
				$this->id_otro_impuestoFK_Idotro_impuesto=$cliente_session->id_otro_impuesto;
				$cliente_session->id_otro_impuesto=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idpais') {
				$this->id_paisFK_Idpais=$cliente_session->id_pais;
				$cliente_session->id_pais=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idprovincia') {
				$this->id_provinciaFK_Idprovincia=$cliente_session->id_provincia;
				$cliente_session->id_provincia=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idretencion') {
				$this->id_retencionFK_Idretencion=$cliente_session->id_retencion;
				$cliente_session->id_retencion=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idretencion_fuente') {
				$this->id_retencion_fuenteFK_Idretencion_fuente=$cliente_session->id_retencion_fuente;
				$cliente_session->id_retencion_fuente=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idretencion_ica') {
				$this->id_retencion_icaFK_Idretencion_ica=$cliente_session->id_retencion_ica;
				$cliente_session->id_retencion_ica=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idtermino_pago') {
				$this->id_termino_pago_clienteFK_Idtermino_pago=$cliente_session->id_termino_pago_cliente;
				$cliente_session->id_termino_pago_cliente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_persona') {
				$this->id_tipo_personaFK_Idtipo_persona=$cliente_session->id_tipo_persona;
				$cliente_session->id_tipo_persona=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_precio') {
				$this->id_tipo_precioFK_Idtipo_precio=$cliente_session->id_tipo_precio;
				$cliente_session->id_tipo_precio=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idvendedor') {
				$this->id_vendedorFK_Idvendedor=$cliente_session->id_vendedor;
				$cliente_session->id_vendedor=-1;

			}
		}
		
		$cliente_session->strUltimaBusqueda='';
		//$cliente_session->intNumeroPaginacion=10;
		$cliente_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));		
	}
	
	public function clientesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idtipo_personaDefaultFK = 0;
		$this->idcategoria_clienteDefaultFK = 0;
		$this->idtipo_precioDefaultFK = 0;
		$this->idgiro_negocio_clienteDefaultFK = 0;
		$this->idpaisDefaultFK = 0;
		$this->idprovinciaDefaultFK = 0;
		$this->idciudadDefaultFK = 0;
		$this->idvendedorDefaultFK = 0;
		$this->idtermino_pago_clienteDefaultFK = 0;
		$this->idcuentaDefaultFK = 0;
		$this->idimpuestoDefaultFK = 0;
		$this->idretencionDefaultFK = 0;
		$this->idretencion_fuenteDefaultFK = 0;
		$this->idretencion_icaDefaultFK = 0;
		$this->idotro_impuestoDefaultFK = 0;
	}
	
	public function setclienteFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_persona',$this->idtipo_personaDefaultFK);
		$this->setExistDataCampoForm('form','id_categoria_cliente',$this->idcategoria_clienteDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_precio',$this->idtipo_precioDefaultFK);
		$this->setExistDataCampoForm('form','id_giro_negocio_cliente',$this->idgiro_negocio_clienteDefaultFK);
		$this->setExistDataCampoForm('form','id_pais',$this->idpaisDefaultFK);
		$this->setExistDataCampoForm('form','id_provincia',$this->idprovinciaDefaultFK);
		$this->setExistDataCampoForm('form','id_ciudad',$this->idciudadDefaultFK);
		$this->setExistDataCampoForm('form','id_vendedor',$this->idvendedorDefaultFK);
		$this->setExistDataCampoForm('form','id_termino_pago_cliente',$this->idtermino_pago_clienteDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta',$this->idcuentaDefaultFK);
		$this->setExistDataCampoForm('form','id_impuesto',$this->idimpuestoDefaultFK);
		$this->setExistDataCampoForm('form','id_retencion',$this->idretencionDefaultFK);
		$this->setExistDataCampoForm('form','id_retencion_fuente',$this->idretencion_fuenteDefaultFK);
		$this->setExistDataCampoForm('form','id_retencion_ica',$this->idretencion_icaDefaultFK);
		$this->setExistDataCampoForm('form','id_otro_impuesto',$this->idotro_impuestoDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		empresa::$class;
		empresa_carga::$CONTROLLER;

		tipo_persona::$class;
		tipo_persona_carga::$CONTROLLER;

		categoria_cliente::$class;
		categoria_cliente_carga::$CONTROLLER;

		tipo_precio::$class;
		tipo_precio_carga::$CONTROLLER;

		giro_negocio_cliente::$class;
		giro_negocio_cliente_carga::$CONTROLLER;

		pais::$class;
		pais_carga::$CONTROLLER;

		provincia::$class;
		provincia_carga::$CONTROLLER;

		ciudad::$class;
		ciudad_carga::$CONTROLLER;

		vendedor::$class;
		vendedor_carga::$CONTROLLER;

		termino_pago_cliente::$class;
		termino_pago_cliente_carga::$CONTROLLER;

		cuenta::$class;
		cuenta_carga::$CONTROLLER;

		impuesto::$class;
		impuesto_carga::$CONTROLLER;

		retencion::$class;
		retencion_carga::$CONTROLLER;

		retencion_fuente::$class;
		retencion_fuente_carga::$CONTROLLER;

		retencion_ica::$class;
		retencion_ica_carga::$CONTROLLER;

		otro_impuesto::$class;
		otro_impuesto_carga::$CONTROLLER;
		
		//REL
		

		devolucion_factura_carga::$CONTROLLER;
		devolucion_factura_util::$STR_SCHEMA;
		devolucion_factura_session::class;

		cuenta_cobrar_carga::$CONTROLLER;
		cuenta_cobrar_util::$STR_SCHEMA;
		cuenta_cobrar_session::class;

		documento_cliente_carga::$CONTROLLER;
		documento_cliente_util::$STR_SCHEMA;
		documento_cliente_session::class;

		estimado_carga::$CONTROLLER;
		estimado_util::$STR_SCHEMA;
		estimado_session::class;

		imagen_cliente_carga::$CONTROLLER;
		imagen_cliente_util::$STR_SCHEMA;
		imagen_cliente_session::class;

		factura_carga::$CONTROLLER;
		factura_util::$STR_SCHEMA;
		factura_session::class;

		consignacion_carga::$CONTROLLER;
		consignacion_util::$STR_SCHEMA;
		consignacion_session::class;

		lista_cliente_carga::$CONTROLLER;
		lista_cliente_util::$STR_SCHEMA;
		lista_cliente_session::class;
    }
		
	public function irPagina(int $paginacion_pagina=0){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			$this->intNumeroPaginacionPagina=$paginacion_pagina;
						
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	/*
		interface cliente_controlI {	
		
		public function inicializarParametrosQueryString(mixed $post1=null);
		public function ejecutarParametrosQueryString();	
		public function getBuildControllerResponse();
		
		public function loadIndex();	
		public function indexRecargarRelacionado();	
		public function recargarInformacionAction();
		
		public function buscarPorIdGeneralAction();	
		public function anterioresAction();		
		public function siguientesAction();	
		public function recargarUltimaInformacionAction();	
		public function seleccionarLoteFkAction();
		
		public function nuevoAction();	
		public function actualizarAction();	
		public function eliminarAction();	
		public function cancelarAction();	
		public function guardarCambiosAction();
		
		public function duplicarAction();	
		public function copiarAction();	
		public function nuevoPrepararAction();	
		public function nuevoPrepararPaginaFormAction();	
		public function nuevoPrepararAbrirPaginaFormAction();	
		public function nuevoTablaPrepararAction();
		
		public function seleccionarActualAction();	
		public function seleccionarActualPaginaFormAction();	
		public function seleccionarActualAbrirPaginaFormAction();
		
		public function editarTablaDatosAction();	
		public function eliminarTablaAction();	
		public function quitarElementosTablaAction();
		
		public function generarFpdfAction();	
		public function generarHtmlReporteAction();	
		public function generarHtmlFormReporteAction();	
		public function generarHtmlRelacionesReporteAction();
		
		public function eliminarCascadaAction();
		
		public function recargarReferenciasAction();
		
		
		public function manejarEventosAction();
		public function recargarFormularioGeneralAction();
		
		
		public function mostrarEjecutarAccionesRelacionesAction();
		
		public function generarReporteConPhpExcelAction();	
		public function generarReporteConPhpExcelVerticalAction();	
		public function generarReporteConPhpExcelRelacionesAction();
		
		public function onLoad(cliente_session $cliente_session=null);	
		function index(?string $strTypeOnLoadcliente='',?string $strTipoPaginaAuxiliarcliente='',?string $strTipoUsuarioAuxiliarcliente='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
		public function seleccionar();	
		public function seleccionarActual(int $id = null);
		
		
		public function nuevoPreparar();	
		public function copiar();	
		public function duplicar();	
		public function guardarCambios();	
		public function nuevoTablaPreparar();	
		public function editarTablaDatos();	
		function guardarCambiosTablas();
		
		function eliminarCascadas();
			
		public function eliminarCascada();
		
		public function cancelarAccionesRelaciones();	
		public function recargarInformacion();	
		public function search(string $strTypeOnLoadcliente='',string $strTipoPaginaAuxiliarcliente='',string $strTipoUsuarioAuxiliarcliente='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($clienteReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(cliente $clienteClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(cliente_session $cliente_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(cliente_session $cliente_session);	
		public function clientesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setclienteFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
