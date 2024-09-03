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

namespace com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/documento_cuenta_cobrar/util/documento_cuenta_cobrar_carga.php');
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_carga;

use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_param_return;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\logic\documento_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\presentation\session\documento_cuenta_cobrar_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\entity\forma_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\business\logic\forma_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\forma_pago_cliente\util\forma_pago_cliente_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

//REL


use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;
use com\bydan\contabilidad\facturacion\factura\presentation\session\factura_session;

use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util\imagen_documento_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util\imagen_documento_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\presentation\session\imagen_documento_cuenta_cobrar_session;

use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;
use com\bydan\contabilidad\facturacion\factura_lote\presentation\session\factura_lote_session;

use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;
use com\bydan\contabilidad\facturacion\devolucion_factura\presentation\session\devolucion_factura_session;


/*CARGA ARCHIVOS FRAMEWORK*/
documento_cuenta_cobrar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
documento_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
documento_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentascobrar/documento_cuenta_cobrar/presentation/control/documento_cuenta_cobrar_init_control.php');
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\presentation\control\documento_cuenta_cobrar_init_control;

include_once('com/bydan/contabilidad/cuentascobrar/documento_cuenta_cobrar/presentation/control/documento_cuenta_cobrar_base_control.php');
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\presentation\control\documento_cuenta_cobrar_base_control;

class documento_cuenta_cobrar_control extends documento_cuenta_cobrar_base_control {	
	
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
			else if($action=='registrarSesionParafacturas' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$iddocumento_cuenta_cobrarActual=$this->getDataId();
				$this->registrarSesionParafacturas($iddocumento_cuenta_cobrarActual);
			}
			else if($action=='registrarSesionParaimagen_documento_cuenta_cobrares' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$iddocumento_cuenta_cobrarActual=$this->getDataId();
				$this->registrarSesionParaimagen_documento_cuenta_cobrares($iddocumento_cuenta_cobrarActual);
			}
			else if($action=='registrarSesionParafactura_lotees' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$iddocumento_cuenta_cobrarActual=$this->getDataId();
				$this->registrarSesionParafactura_lotees($iddocumento_cuenta_cobrarActual);
			}
			else if($action=='registrarSesionParadevolucion_facturas' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$iddocumento_cuenta_cobrarActual=$this->getDataId();
				$this->registrarSesionParadevolucion_facturas($iddocumento_cuenta_cobrarActual);
			} 
			
			
			else if($action=="FK_Idcliente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdclienteParaProcesar();
			}
			else if($action=="FK_Idcuenta_corriente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcuenta_corrienteParaProcesar();
			}
			else if($action=="FK_Idejercicio"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdejercicioParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idforma_pago_cliente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idforma_pago_clienteParaProcesar();
			}
			else if($action=="FK_Idperiodo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdperiodoParaProcesar();
			}
			else if($action=="FK_Idsucursal"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdsucursalParaProcesar();
			}
			else if($action=="FK_Idusuario"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdusuarioParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddocumento_cuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$iddocumento_cuenta_cobrarActual
			}
			else if($action=='abrirBusquedaParasucursal') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddocumento_cuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParasucursal();//$iddocumento_cuenta_cobrarActual
			}
			else if($action=='abrirBusquedaParaejercicio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddocumento_cuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParaejercicio();//$iddocumento_cuenta_cobrarActual
			}
			else if($action=='abrirBusquedaParaperiodo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddocumento_cuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParaperiodo();//$iddocumento_cuenta_cobrarActual
			}
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddocumento_cuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$iddocumento_cuenta_cobrarActual
			}
			else if($action=='abrirBusquedaParacliente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddocumento_cuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParacliente();//$iddocumento_cuenta_cobrarActual
			}
			else if($action=='abrirBusquedaParaforma_pago_cliente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddocumento_cuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParaforma_pago_cliente();//$iddocumento_cuenta_cobrarActual
			}
			else if($action=='abrirBusquedaParacuenta_corriente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddocumento_cuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_corriente();//$iddocumento_cuenta_cobrarActual
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
					
					$documento_cuenta_cobrarController = new documento_cuenta_cobrar_control();
					
					$documento_cuenta_cobrarController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($documento_cuenta_cobrarController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$documento_cuenta_cobrarController = new documento_cuenta_cobrar_control();
						$documento_cuenta_cobrarController = $this;
						
						$jsonResponse = json_encode($documento_cuenta_cobrarController->documento_cuenta_cobrars);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->documento_cuenta_cobrarReturnGeneral==null) {
					$this->documento_cuenta_cobrarReturnGeneral=new documento_cuenta_cobrar_param_return();
				}
				
				echo($this->documento_cuenta_cobrarReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$documento_cuenta_cobrarController=new documento_cuenta_cobrar_control();
		
		$documento_cuenta_cobrarController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$documento_cuenta_cobrarController->usuarioActual=new usuario();
		
		$documento_cuenta_cobrarController->usuarioActual->setId($this->usuarioActual->getId());
		$documento_cuenta_cobrarController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$documento_cuenta_cobrarController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$documento_cuenta_cobrarController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$documento_cuenta_cobrarController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$documento_cuenta_cobrarController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$documento_cuenta_cobrarController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$documento_cuenta_cobrarController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $documento_cuenta_cobrarController;
	}
	
	public function loadIndex() {
		$strTypeOnLoaddocumento_cuenta_cobrar= $this->getDataGeneralString('strTypeOnLoaddocumento_cuenta_cobrar');
		$strTipoPaginaAuxiliardocumento_cuenta_cobrar= $this->getDataGeneralString('strTipoPaginaAuxiliardocumento_cuenta_cobrar');
		$strTipoUsuarioAuxiliardocumento_cuenta_cobrar= $this->getDataGeneralString('strTipoUsuarioAuxiliardocumento_cuenta_cobrar');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoaddocumento_cuenta_cobrar,$strTipoPaginaAuxiliardocumento_cuenta_cobrar,$strTipoUsuarioAuxiliardocumento_cuenta_cobrar,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoaddocumento_cuenta_cobrar!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('documento_cuenta_cobrar','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(documento_cuenta_cobrar_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliardocumento_cuenta_cobrar,$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(documento_cuenta_cobrar_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliardocumento_cuenta_cobrar,$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->documento_cuenta_cobrarReturnGeneral=new documento_cuenta_cobrar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->documento_cuenta_cobrarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->documento_cuenta_cobrarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->documento_cuenta_cobrarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->documento_cuenta_cobrarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->documento_cuenta_cobrarReturnGeneral);
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
		$this->documento_cuenta_cobrarReturnGeneral=new documento_cuenta_cobrar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->documento_cuenta_cobrarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->documento_cuenta_cobrarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->documento_cuenta_cobrarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->documento_cuenta_cobrarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->documento_cuenta_cobrarReturnGeneral);
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
		$this->documento_cuenta_cobrarReturnGeneral=new documento_cuenta_cobrar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->documento_cuenta_cobrarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->documento_cuenta_cobrarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->documento_cuenta_cobrarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->documento_cuenta_cobrarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->documento_cuenta_cobrarReturnGeneral);
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
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
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
			
			
			$this->documento_cuenta_cobrarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->documento_cuenta_cobrarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->documento_cuenta_cobrarReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->documento_cuenta_cobrarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->documento_cuenta_cobrarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->documento_cuenta_cobrarReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->documento_cuenta_cobrarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->documento_cuenta_cobrarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->documento_cuenta_cobrarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->documento_cuenta_cobrarReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->documento_cuenta_cobrarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->documento_cuenta_cobrarReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->documento_cuenta_cobrarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->documento_cuenta_cobrarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->documento_cuenta_cobrarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->documento_cuenta_cobrarReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->documento_cuenta_cobrarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->documento_cuenta_cobrarReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
		
		$this->documento_cuenta_cobrarLogic=new documento_cuenta_cobrar_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->documento_cuenta_cobrar=new documento_cuenta_cobrar();
		
		$this->strTypeOnLoaddocumento_cuenta_cobrar='onload';
		$this->strTipoPaginaAuxiliardocumento_cuenta_cobrar='none';
		$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar='none';	

		$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
		
		$this->documento_cuenta_cobrarModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->documento_cuenta_cobrarControllerAdditional=new documento_cuenta_cobrar_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(documento_cuenta_cobrar_session $documento_cuenta_cobrar_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($documento_cuenta_cobrar_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoaddocumento_cuenta_cobrar='',?string $strTipoPaginaAuxiliardocumento_cuenta_cobrar='',?string $strTipoUsuarioAuxiliardocumento_cuenta_cobrar='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoaddocumento_cuenta_cobrar=$strTypeOnLoaddocumento_cuenta_cobrar;
			$this->strTipoPaginaAuxiliardocumento_cuenta_cobrar=$strTipoPaginaAuxiliardocumento_cuenta_cobrar;
			$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar=$strTipoUsuarioAuxiliardocumento_cuenta_cobrar;
	
			if($strTipoUsuarioAuxiliardocumento_cuenta_cobrar=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->documento_cuenta_cobrar=new documento_cuenta_cobrar();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Documentos Cuentas por Cobrares';
			
			
			$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));
							
			if($documento_cuenta_cobrar_session==null) {
				$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
				
				/*$this->Session->write('documento_cuenta_cobrar_session',$documento_cuenta_cobrar_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($documento_cuenta_cobrar_session->strFuncionJsPadre!=null && $documento_cuenta_cobrar_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$documento_cuenta_cobrar_session->strFuncionJsPadre;
				
				$documento_cuenta_cobrar_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($documento_cuenta_cobrar_session);
			
			if($strTypeOnLoaddocumento_cuenta_cobrar!=null && $strTypeOnLoaddocumento_cuenta_cobrar=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$documento_cuenta_cobrar_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$documento_cuenta_cobrar_session->setPaginaPopupVariables(true);
				}
				
				if($documento_cuenta_cobrar_session->intNumeroPaginacion==documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$documento_cuenta_cobrar_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,documento_cuenta_cobrar_util::$STR_SESSION_NAME,'cuentascobrar');																
			
			} else if($strTypeOnLoaddocumento_cuenta_cobrar!=null && $strTypeOnLoaddocumento_cuenta_cobrar=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$documento_cuenta_cobrar_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;*/
				
				if($documento_cuenta_cobrar_session->intNumeroPaginacion==documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$documento_cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliardocumento_cuenta_cobrar!=null && $strTipoPaginaAuxiliardocumento_cuenta_cobrar=='none') {
				/*$documento_cuenta_cobrar_session->strStyleDivHeader='display:table-row';*/
				
				/*$documento_cuenta_cobrar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliardocumento_cuenta_cobrar!=null && $strTipoPaginaAuxiliardocumento_cuenta_cobrar=='iframe') {
					/*
					$documento_cuenta_cobrar_session->strStyleDivArbol='display:none';
					$documento_cuenta_cobrar_session->strStyleDivHeader='display:none';
					$documento_cuenta_cobrar_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$documento_cuenta_cobrar_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->documento_cuenta_cobrarClase=new documento_cuenta_cobrar();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=documento_cuenta_cobrar_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(documento_cuenta_cobrar_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->documento_cuenta_cobrarLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->documento_cuenta_cobrarLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$facturaLogic=new factura_logic();
			//$imagendocumentocuentacobrarLogic=new imagen_documento_cuenta_cobrar_logic();
			//$facturaloteLogic=new factura_lote_logic();
			//$devolucionfacturaLogic=new devolucion_factura_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->documento_cuenta_cobrarLogic=new documento_cuenta_cobrar_logic();*/
			
			
			$this->documento_cuenta_cobrarsModel=null;
			/*new ListDataModel();*/
			
			/*$this->documento_cuenta_cobrarsModel.setWrappedData(documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());*/
						
			$this->documento_cuenta_cobrars= array();
			$this->documento_cuenta_cobrarsEliminados=array();
			$this->documento_cuenta_cobrarsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= documento_cuenta_cobrar_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= documento_cuenta_cobrar_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->documento_cuenta_cobrar= new documento_cuenta_cobrar();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcliente='display:table-row';
			$this->strVisibleFK_Idcuenta_corriente='display:table-row';
			$this->strVisibleFK_Idejercicio='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idforma_pago_cliente='display:table-row';
			$this->strVisibleFK_Idperiodo='display:table-row';
			$this->strVisibleFK_Idsucursal='display:table-row';
			$this->strVisibleFK_Idusuario='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliardocumento_cuenta_cobrar!=null && $strTipoUsuarioAuxiliardocumento_cuenta_cobrar!='none' && $strTipoUsuarioAuxiliardocumento_cuenta_cobrar!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliardocumento_cuenta_cobrar);
																
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
				if($strTipoUsuarioAuxiliardocumento_cuenta_cobrar!=null && $strTipoUsuarioAuxiliardocumento_cuenta_cobrar!='none' && $strTipoUsuarioAuxiliardocumento_cuenta_cobrar!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliardocumento_cuenta_cobrar);
																
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
				if($strTipoUsuarioAuxiliardocumento_cuenta_cobrar==null || $strTipoUsuarioAuxiliardocumento_cuenta_cobrar=='none' || $strTipoUsuarioAuxiliardocumento_cuenta_cobrar=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliardocumento_cuenta_cobrar,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, documento_cuenta_cobrar_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, documento_cuenta_cobrar_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina documento_cuenta_cobrar');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($documento_cuenta_cobrar_session);
			
			$this->getSetBusquedasSesionConfig($documento_cuenta_cobrar_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportedocumento_cuenta_cobrars($this->strAccionBusqueda,$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());*/
				} else if($this->strGenerarReporte=='Html')	{
					$documento_cuenta_cobrar_session->strServletGenerarHtmlReporte='documento_cuenta_cobrarServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($documento_cuenta_cobrar_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliardocumento_cuenta_cobrar!=null && $strTipoUsuarioAuxiliardocumento_cuenta_cobrar=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($documento_cuenta_cobrar_session);
			}
								
			$this->set(documento_cuenta_cobrar_util::$STR_SESSION_NAME, $documento_cuenta_cobrar_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($documento_cuenta_cobrar_session);
			
			/*
			$this->documento_cuenta_cobrar->recursive = 0;
			
			$this->documento_cuenta_cobrars=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('documento_cuenta_cobrars', $this->documento_cuenta_cobrars);
			
			$this->set(documento_cuenta_cobrar_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->documento_cuenta_cobrarActual =$this->documento_cuenta_cobrarClase;
			
			/*$this->documento_cuenta_cobrarActual =$this->migrarModeldocumento_cuenta_cobrar($this->documento_cuenta_cobrarClase);*/
			
			$this->returnHtml(false);
			
			$this->set(documento_cuenta_cobrar_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION;
				
			if(documento_cuenta_cobrar_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=documento_cuenta_cobrar_util::$STR_MODULO_OPCION.documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(documento_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($documento_cuenta_cobrar_session));
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
			/*$documento_cuenta_cobrarClase= (documento_cuenta_cobrar) documento_cuenta_cobrarsModel.getRowData();*/
			
			$this->documento_cuenta_cobrarClase->setId($this->documento_cuenta_cobrar->getId());	
			$this->documento_cuenta_cobrarClase->setVersionRow($this->documento_cuenta_cobrar->getVersionRow());	
			$this->documento_cuenta_cobrarClase->setVersionRow($this->documento_cuenta_cobrar->getVersionRow());	
			$this->documento_cuenta_cobrarClase->setid_empresa($this->documento_cuenta_cobrar->getid_empresa());	
			$this->documento_cuenta_cobrarClase->setid_sucursal($this->documento_cuenta_cobrar->getid_sucursal());	
			$this->documento_cuenta_cobrarClase->setid_ejercicio($this->documento_cuenta_cobrar->getid_ejercicio());	
			$this->documento_cuenta_cobrarClase->setid_periodo($this->documento_cuenta_cobrar->getid_periodo());	
			$this->documento_cuenta_cobrarClase->setid_usuario($this->documento_cuenta_cobrar->getid_usuario());	
			$this->documento_cuenta_cobrarClase->setnumero($this->documento_cuenta_cobrar->getnumero());	
			$this->documento_cuenta_cobrarClase->setid_cliente($this->documento_cuenta_cobrar->getid_cliente());	
			$this->documento_cuenta_cobrarClase->settipo($this->documento_cuenta_cobrar->gettipo());	
			$this->documento_cuenta_cobrarClase->setfecha_emision($this->documento_cuenta_cobrar->getfecha_emision());	
			$this->documento_cuenta_cobrarClase->setdescripcion($this->documento_cuenta_cobrar->getdescripcion());	
			$this->documento_cuenta_cobrarClase->setmonto($this->documento_cuenta_cobrar->getmonto());	
			$this->documento_cuenta_cobrarClase->setmonto_parcial($this->documento_cuenta_cobrar->getmonto_parcial());	
			$this->documento_cuenta_cobrarClase->setmoneda($this->documento_cuenta_cobrar->getmoneda());	
			$this->documento_cuenta_cobrarClase->setfecha_vence($this->documento_cuenta_cobrar->getfecha_vence());	
			$this->documento_cuenta_cobrarClase->setnumero_de_pagos($this->documento_cuenta_cobrar->getnumero_de_pagos());	
			$this->documento_cuenta_cobrarClase->setbalance($this->documento_cuenta_cobrar->getbalance());	
			$this->documento_cuenta_cobrarClase->setnumero_pagado($this->documento_cuenta_cobrar->getnumero_pagado());	
			$this->documento_cuenta_cobrarClase->setid_pagado($this->documento_cuenta_cobrar->getid_pagado());	
			$this->documento_cuenta_cobrarClase->setmodulo_origen($this->documento_cuenta_cobrar->getmodulo_origen());	
			$this->documento_cuenta_cobrarClase->setid_origen($this->documento_cuenta_cobrar->getid_origen());	
			$this->documento_cuenta_cobrarClase->setmodulo_destino($this->documento_cuenta_cobrar->getmodulo_destino());	
			$this->documento_cuenta_cobrarClase->setid_destino($this->documento_cuenta_cobrar->getid_destino());	
			$this->documento_cuenta_cobrarClase->setnombre_pc($this->documento_cuenta_cobrar->getnombre_pc());	
			$this->documento_cuenta_cobrarClase->sethora($this->documento_cuenta_cobrar->gethora());	
			$this->documento_cuenta_cobrarClase->setmonto_mora($this->documento_cuenta_cobrar->getmonto_mora());	
			$this->documento_cuenta_cobrarClase->setinteres_mora($this->documento_cuenta_cobrar->getinteres_mora());	
			$this->documento_cuenta_cobrarClase->setdias_gracia_mora($this->documento_cuenta_cobrar->getdias_gracia_mora());	
			$this->documento_cuenta_cobrarClase->setinstrumento_pago($this->documento_cuenta_cobrar->getinstrumento_pago());	
			$this->documento_cuenta_cobrarClase->settipo_cambio($this->documento_cuenta_cobrar->gettipo_cambio());	
			$this->documento_cuenta_cobrarClase->setnumero_cliente($this->documento_cuenta_cobrar->getnumero_cliente());	
			$this->documento_cuenta_cobrarClase->setclase_registro($this->documento_cuenta_cobrar->getclase_registro());	
			$this->documento_cuenta_cobrarClase->setestado_registro($this->documento_cuenta_cobrar->getestado_registro());	
			$this->documento_cuenta_cobrarClase->setmotivo_anulacion($this->documento_cuenta_cobrar->getmotivo_anulacion());	
			$this->documento_cuenta_cobrarClase->setimpuesto_1($this->documento_cuenta_cobrar->getimpuesto_1());	
			$this->documento_cuenta_cobrarClase->setimpuesto_2($this->documento_cuenta_cobrar->getimpuesto_2());	
			$this->documento_cuenta_cobrarClase->setimpuesto_incluido($this->documento_cuenta_cobrar->getimpuesto_incluido());	
			$this->documento_cuenta_cobrarClase->setobservaciones($this->documento_cuenta_cobrar->getobservaciones());	
			$this->documento_cuenta_cobrarClase->setgrupo_pago($this->documento_cuenta_cobrar->getgrupo_pago());	
			$this->documento_cuenta_cobrarClase->settermino_idpv($this->documento_cuenta_cobrar->gettermino_idpv());	
			$this->documento_cuenta_cobrarClase->setid_forma_pago_cliente($this->documento_cuenta_cobrar->getid_forma_pago_cliente());	
			$this->documento_cuenta_cobrarClase->setnro_pago($this->documento_cuenta_cobrar->getnro_pago());	
			$this->documento_cuenta_cobrarClase->setref_pago($this->documento_cuenta_cobrar->getref_pago());	
			$this->documento_cuenta_cobrarClase->setfecha_hora($this->documento_cuenta_cobrar->getfecha_hora());	
			$this->documento_cuenta_cobrarClase->setid_base($this->documento_cuenta_cobrar->getid_base());	
			$this->documento_cuenta_cobrarClase->setid_cuenta_corriente($this->documento_cuenta_cobrar->getid_cuenta_corriente());	
			$this->documento_cuenta_cobrarClase->setncf($this->documento_cuenta_cobrar->getncf());	
		
			/*$this->Session->write('documento_cuenta_cobrarVersionRowActual', documento_cuenta_cobrar.getVersionRow());*/
			
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
			
			$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));
						
			if($documento_cuenta_cobrar_session==null) {
				$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('documento_cuenta_cobrar', $this->documento_cuenta_cobrar->read(null, $id));
	
			
			$this->documento_cuenta_cobrar->recursive = 0;
			
			$this->documento_cuenta_cobrars=$this->paginate();
			
			$this->set('documento_cuenta_cobrars', $this->documento_cuenta_cobrars);
	
			if (empty($this->data)) {
				$this->data = $this->documento_cuenta_cobrar->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->documento_cuenta_cobrarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->documento_cuenta_cobrarClase);
			
			$this->documento_cuenta_cobrarActual=$this->documento_cuenta_cobrarClase;
			
			/*$this->documento_cuenta_cobrarActual =$this->migrarModeldocumento_cuenta_cobrar($this->documento_cuenta_cobrarClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars(),$this->documento_cuenta_cobrarActual);
			
			$this->actualizarControllerConReturnGeneral($this->documento_cuenta_cobrarReturnGeneral);
			
			//$this->documento_cuenta_cobrarReturnGeneral=$this->documento_cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars(),$this->documento_cuenta_cobrarActual,$this->documento_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));
						
			if($documento_cuenta_cobrar_session==null) {
				$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevodocumento_cuenta_cobrar', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->documento_cuenta_cobrarClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->documento_cuenta_cobrarClase);
			
			$this->documento_cuenta_cobrarActual =$this->documento_cuenta_cobrarClase;
			
			/*$this->documento_cuenta_cobrarActual =$this->migrarModeldocumento_cuenta_cobrar($this->documento_cuenta_cobrarClase);*/
			
			$this->setdocumento_cuenta_cobrarFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars(),$this->documento_cuenta_cobrar);
			
			$this->actualizarControllerConReturnGeneral($this->documento_cuenta_cobrarReturnGeneral);
			
			//this->documento_cuenta_cobrarReturnGeneral=$this->documento_cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars(),$this->documento_cuenta_cobrar,$this->documento_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idsucursalDefaultFK!=null && $this->idsucursalDefaultFK > -1) {
				$this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar()->setid_sucursal($this->idsucursalDefaultFK);
			}

			if($this->idejercicioDefaultFK!=null && $this->idejercicioDefaultFK > -1) {
				$this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar()->setid_ejercicio($this->idejercicioDefaultFK);
			}

			if($this->idperiodoDefaultFK!=null && $this->idperiodoDefaultFK > -1) {
				$this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar()->setid_periodo($this->idperiodoDefaultFK);
			}

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar()->setid_usuario($this->idusuarioDefaultFK);
			}

			if($this->idclienteDefaultFK!=null && $this->idclienteDefaultFK > -1) {
				$this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar()->setid_cliente($this->idclienteDefaultFK);
			}

			if($this->idforma_pago_clienteDefaultFK!=null && $this->idforma_pago_clienteDefaultFK > -1) {
				$this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar()->setid_forma_pago_cliente($this->idforma_pago_clienteDefaultFK);
			}

			if($this->idcuenta_corrienteDefaultFK!=null && $this->idcuenta_corrienteDefaultFK > -1) {
				$this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar()->setid_cuenta_corriente($this->idcuenta_corrienteDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->documento_cuenta_cobrarReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar(),$this->documento_cuenta_cobrarActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeydocumento_cuenta_cobrar($this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariodocumento_cuenta_cobrar($this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar());*/
			}
			
			if($this->documento_cuenta_cobrarReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->documento_cuenta_cobrarReturnGeneral->getdocumento_cuenta_cobrar(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualdocumento_cuenta_cobrar($this->documento_cuenta_cobrar,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->documento_cuenta_cobrarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->documento_cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->documento_cuenta_cobrarsAuxiliar=array();
			}
			
			if(count($this->documento_cuenta_cobrarsAuxiliar)==2) {
				$documento_cuenta_cobrarOrigen=$this->documento_cuenta_cobrarsAuxiliar[0];
				$documento_cuenta_cobrarDestino=$this->documento_cuenta_cobrarsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($documento_cuenta_cobrarOrigen,$documento_cuenta_cobrarDestino,true,false,false);
				
				$this->actualizarLista($documento_cuenta_cobrarDestino,$this->documento_cuenta_cobrars);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->documento_cuenta_cobrarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->documento_cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->documento_cuenta_cobrarsAuxiliar=array();
			}
			
			if(count($this->documento_cuenta_cobrarsAuxiliar) > 0) {
				foreach ($this->documento_cuenta_cobrarsAuxiliar as $documento_cuenta_cobrarSeleccionado) {
					$this->documento_cuenta_cobrar=new documento_cuenta_cobrar();
					
					$this->setCopiarVariablesObjetos($documento_cuenta_cobrarSeleccionado,$this->documento_cuenta_cobrar,true,true,false);
						
					$this->documento_cuenta_cobrars[]=$this->documento_cuenta_cobrar;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->documento_cuenta_cobrarsEliminados as $documento_cuenta_cobrarEliminado) {
				$this->documento_cuenta_cobrarLogic->documento_cuenta_cobrars[]=$documento_cuenta_cobrarEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->documento_cuenta_cobrar=new documento_cuenta_cobrar();
							
				$this->documento_cuenta_cobrars[]=$this->documento_cuenta_cobrar;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
		
		$documento_cuenta_cobrarActual=new documento_cuenta_cobrar();
		
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
				
				$documento_cuenta_cobrarActual=$this->documento_cuenta_cobrars[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->settipo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setmonto_parcial((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setmoneda($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setnumero_de_pagos((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setbalance((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setnumero_pagado($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_pagado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setmodulo_origen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_origen((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setmodulo_destino($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_destino((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setnombre_pc($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->sethora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setmonto_mora((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_27'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setinteres_mora((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_29','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setdias_gracia_mora((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_29'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_30','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setinstrumento_pago($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_30'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_31','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->settipo_cambio((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_31'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_32','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setnumero_cliente($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_32'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_33','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setclase_registro($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_33'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_34','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setestado_registro($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_34'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_35','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setmotivo_anulacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_35'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_36','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setimpuesto_1((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_36'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_37','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setimpuesto_2((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_37'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_38','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setimpuesto_incluido($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_38'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_39','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setobservaciones($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_39'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_40','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setgrupo_pago($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_40'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_41','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->settermino_idpv((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_41'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_42','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_forma_pago_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_42'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_43','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setnro_pago($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_43'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_44','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setref_pago($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_44'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_45','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setfecha_hora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_45')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_46','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_base((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_46'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_47','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setid_cuenta_corriente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_47'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_48','t'.$this->strSufijo)) {  $documento_cuenta_cobrarActual->setncf($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_48'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->documento_cuenta_cobrarsAuxiliar=array();		 
		/*$this->documento_cuenta_cobrarsEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->documento_cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->documento_cuenta_cobrarsAuxiliar=array();
		}
			
		if(count($this->documento_cuenta_cobrarsAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->documento_cuenta_cobrarsAuxiliar as $documento_cuenta_cobrarAuxLocal) {				
				
				foreach($this->documento_cuenta_cobrars as $documento_cuenta_cobrarLocal) {
					if($documento_cuenta_cobrarLocal->getId()==$documento_cuenta_cobrarAuxLocal->getId()) {
						$documento_cuenta_cobrarLocal->setIsDeleted(true);
						
						/*$this->documento_cuenta_cobrarsEliminados[]=$documento_cuenta_cobrarLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($this->documento_cuenta_cobrars);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoaddocumento_cuenta_cobrar='',string $strTipoPaginaAuxiliardocumento_cuenta_cobrar='',string $strTipoUsuarioAuxiliardocumento_cuenta_cobrar='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoaddocumento_cuenta_cobrar,$strTipoPaginaAuxiliardocumento_cuenta_cobrar,$strTipoUsuarioAuxiliardocumento_cuenta_cobrar,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->documento_cuenta_cobrars) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=documento_cuenta_cobrar_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=documento_cuenta_cobrar_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=documento_cuenta_cobrar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));
						
			if($documento_cuenta_cobrar_session==null) {
				$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
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
					/*$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;*/
					
					if($documento_cuenta_cobrar_session->intNumeroPaginacion==documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$documento_cuenta_cobrar_session->intNumeroPaginacion;
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
			
			$this->documento_cuenta_cobrarsEliminados=array();
			
			/*$this->documento_cuenta_cobrarLogic->setConnexion($connexion);*/
			
			$this->documento_cuenta_cobrarLogic->setIsConDeep(true);
			
			$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrarDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('forma_pago_cliente');$classes[]=$class;
			$class=new Classe('cuenta_corriente');$classes[]=$class;
			
			$this->documento_cuenta_cobrarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->documento_cuenta_cobrarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars()==null|| count($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->documento_cuenta_cobrarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->documento_cuenta_cobrarsReporte=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
									
						/*$this->generarReportes('Todos',$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());*/
					
						$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($this->documento_cuenta_cobrars);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->documento_cuenta_cobrarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars()==null|| count($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->documento_cuenta_cobrarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->documento_cuenta_cobrarsReporte=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
									
						/*$this->generarReportes('Todos',$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());*/
					
						$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($this->documento_cuenta_cobrars);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->iddocumento_cuenta_cobrar=0;*/
				
				if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK!=null && $documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK==true) {
					if($documento_cuenta_cobrar_session->bigIdActualFK!=null && $documento_cuenta_cobrar_session->bigIdActualFK!=0)	{
						$this->iddocumento_cuenta_cobrar=$documento_cuenta_cobrar_session->bigIdActualFK;	
					}
					
					$documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK=false;
					
					$documento_cuenta_cobrar_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					iddocumento_cuenta_cobrar=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					iddocumento_cuenta_cobrar=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->documento_cuenta_cobrarLogic->getEntity($this->iddocumento_cuenta_cobrar);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*documento_cuenta_cobrarLogicAdditional::getDetalleIndicePorId($iddocumento_cuenta_cobrar);*/

				
				if($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()!=null) {
					$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars(array());
					$this->documento_cuenta_cobrarLogic->documento_cuenta_cobrars[]=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcliente')
			{

				if($documento_cuenta_cobrar_session->bigidclienteActual!=null && $documento_cuenta_cobrar_session->bigidclienteActual!=0)
				{
					$this->id_clienteFK_Idcliente=$documento_cuenta_cobrar_session->bigidclienteActual;
					$documento_cuenta_cobrar_session->bigidclienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_cuenta_cobrarLogic->getsFK_Idcliente($finalQueryPaginacion,$this->pagination,$this->id_clienteFK_Idcliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//documento_cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idcliente($this->id_clienteFK_Idcliente);


					if($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars()==null || count($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$documento_cuenta_cobrars=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_cuenta_cobrarLogic->getsFK_Idcliente('',$this->pagination,$this->id_clienteFK_Idcliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->documento_cuenta_cobrarsReporte=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedocumento_cuenta_cobrars("FK_Idcliente",$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($documento_cuenta_cobrars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta_corriente')
			{

				if($documento_cuenta_cobrar_session->bigidcuenta_corrienteActual!=null && $documento_cuenta_cobrar_session->bigidcuenta_corrienteActual!=0)
				{
					$this->id_cuenta_corrienteFK_Idcuenta_corriente=$documento_cuenta_cobrar_session->bigidcuenta_corrienteActual;
					$documento_cuenta_cobrar_session->bigidcuenta_corrienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_cuenta_cobrarLogic->getsFK_Idcuenta_corriente($finalQueryPaginacion,$this->pagination,$this->id_cuenta_corrienteFK_Idcuenta_corriente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//documento_cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idcuenta_corriente($this->id_cuenta_corrienteFK_Idcuenta_corriente);


					if($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars()==null || count($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$documento_cuenta_cobrars=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_cuenta_cobrarLogic->getsFK_Idcuenta_corriente('',$this->pagination,$this->id_cuenta_corrienteFK_Idcuenta_corriente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->documento_cuenta_cobrarsReporte=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedocumento_cuenta_cobrars("FK_Idcuenta_corriente",$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($documento_cuenta_cobrars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idejercicio')
			{

				if($documento_cuenta_cobrar_session->bigidejercicioActual!=null && $documento_cuenta_cobrar_session->bigidejercicioActual!=0)
				{
					$this->id_ejercicioFK_Idejercicio=$documento_cuenta_cobrar_session->bigidejercicioActual;
					$documento_cuenta_cobrar_session->bigidejercicioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_cuenta_cobrarLogic->getsFK_Idejercicio($finalQueryPaginacion,$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//documento_cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idejercicio($this->id_ejercicioFK_Idejercicio);


					if($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars()==null || count($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$documento_cuenta_cobrars=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_cuenta_cobrarLogic->getsFK_Idejercicio('',$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->documento_cuenta_cobrarsReporte=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedocumento_cuenta_cobrars("FK_Idejercicio",$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($documento_cuenta_cobrars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($documento_cuenta_cobrar_session->bigidempresaActual!=null && $documento_cuenta_cobrar_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$documento_cuenta_cobrar_session->bigidempresaActual;
					$documento_cuenta_cobrar_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_cuenta_cobrarLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//documento_cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars()==null || count($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$documento_cuenta_cobrars=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_cuenta_cobrarLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->documento_cuenta_cobrarsReporte=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedocumento_cuenta_cobrars("FK_Idempresa",$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($documento_cuenta_cobrars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idforma_pago_cliente')
			{

				if($documento_cuenta_cobrar_session->bigidforma_pago_clienteActual!=null && $documento_cuenta_cobrar_session->bigidforma_pago_clienteActual!=0)
				{
					$this->id_forma_pago_clienteFK_Idforma_pago_cliente=$documento_cuenta_cobrar_session->bigidforma_pago_clienteActual;
					$documento_cuenta_cobrar_session->bigidforma_pago_clienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_cuenta_cobrarLogic->getsFK_Idforma_pago_cliente($finalQueryPaginacion,$this->pagination,$this->id_forma_pago_clienteFK_Idforma_pago_cliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//documento_cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idforma_pago_cliente($this->id_forma_pago_clienteFK_Idforma_pago_cliente);


					if($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars()==null || count($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$documento_cuenta_cobrars=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_cuenta_cobrarLogic->getsFK_Idforma_pago_cliente('',$this->pagination,$this->id_forma_pago_clienteFK_Idforma_pago_cliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->documento_cuenta_cobrarsReporte=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedocumento_cuenta_cobrars("FK_Idforma_pago_cliente",$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($documento_cuenta_cobrars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperiodo')
			{

				if($documento_cuenta_cobrar_session->bigidperiodoActual!=null && $documento_cuenta_cobrar_session->bigidperiodoActual!=0)
				{
					$this->id_periodoFK_Idperiodo=$documento_cuenta_cobrar_session->bigidperiodoActual;
					$documento_cuenta_cobrar_session->bigidperiodoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_cuenta_cobrarLogic->getsFK_Idperiodo($finalQueryPaginacion,$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//documento_cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idperiodo($this->id_periodoFK_Idperiodo);


					if($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars()==null || count($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$documento_cuenta_cobrars=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_cuenta_cobrarLogic->getsFK_Idperiodo('',$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->documento_cuenta_cobrarsReporte=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedocumento_cuenta_cobrars("FK_Idperiodo",$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($documento_cuenta_cobrars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsucursal')
			{

				if($documento_cuenta_cobrar_session->bigidsucursalActual!=null && $documento_cuenta_cobrar_session->bigidsucursalActual!=0)
				{
					$this->id_sucursalFK_Idsucursal=$documento_cuenta_cobrar_session->bigidsucursalActual;
					$documento_cuenta_cobrar_session->bigidsucursalActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_cuenta_cobrarLogic->getsFK_Idsucursal($finalQueryPaginacion,$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//documento_cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idsucursal($this->id_sucursalFK_Idsucursal);


					if($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars()==null || count($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$documento_cuenta_cobrars=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_cuenta_cobrarLogic->getsFK_Idsucursal('',$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->documento_cuenta_cobrarsReporte=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedocumento_cuenta_cobrars("FK_Idsucursal",$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($documento_cuenta_cobrars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($documento_cuenta_cobrar_session->bigidusuarioActual!=null && $documento_cuenta_cobrar_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$documento_cuenta_cobrar_session->bigidusuarioActual;
					$documento_cuenta_cobrar_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_cuenta_cobrarLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//documento_cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars()==null || count($this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$documento_cuenta_cobrars=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_cuenta_cobrarLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->documento_cuenta_cobrarsReporte=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedocumento_cuenta_cobrars("FK_Idusuario",$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($documento_cuenta_cobrars);
					}
				//}

			} 
		
		$documento_cuenta_cobrar_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$documento_cuenta_cobrar_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->documento_cuenta_cobrarLogic->loadForeignsKeysDescription();*/
		
		$this->documento_cuenta_cobrars=$this->documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars();
		
		if($this->documento_cuenta_cobrarsEliminados==null) {
			$this->documento_cuenta_cobrarsEliminados=array();
		}
		
		$this->Session->write(documento_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista',serialize($this->documento_cuenta_cobrars));
		$this->Session->write(documento_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->documento_cuenta_cobrarsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(documento_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($documento_cuenta_cobrar_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->iddocumento_cuenta_cobrar=$idGeneral;
			
			$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
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
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if(count($this->documento_cuenta_cobrars) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdclienteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_clienteFK_Idcliente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcliente','cmbid_cliente');

			$this->strAccionBusqueda='FK_Idcliente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idcuenta_corrienteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_corrienteFK_Idcuenta_corriente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_corriente','cmbid_cuenta_corriente');

			$this->strAccionBusqueda='FK_Idcuenta_corriente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdejercicioParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ejercicioFK_Idejercicio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idejercicio','cmbid_ejercicio');

			$this->strAccionBusqueda='FK_Idejercicio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idforma_pago_clienteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_forma_pago_clienteFK_Idforma_pago_cliente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idforma_pago_cliente','cmbid_forma_pago_cliente');

			$this->strAccionBusqueda='FK_Idforma_pago_cliente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdperiodoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_periodoFK_Idperiodo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperiodo','cmbid_periodo');

			$this->strAccionBusqueda='FK_Idperiodo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdsucursalParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sucursalFK_Idsucursal=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsucursal','cmbid_sucursal');

			$this->strAccionBusqueda='FK_Idsucursal';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdusuarioParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcliente($strFinalQuery,$id_cliente)
	{
		try
		{

			$this->documento_cuenta_cobrarLogic->getsFK_Idcliente($strFinalQuery,new Pagination(),$id_cliente);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcuenta_corriente($strFinalQuery,$id_cuenta_corriente)
	{
		try
		{

			$this->documento_cuenta_cobrarLogic->getsFK_Idcuenta_corriente($strFinalQuery,new Pagination(),$id_cuenta_corriente);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idejercicio($strFinalQuery,$id_ejercicio)
	{
		try
		{

			$this->documento_cuenta_cobrarLogic->getsFK_Idejercicio($strFinalQuery,new Pagination(),$id_ejercicio);
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

			$this->documento_cuenta_cobrarLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idforma_pago_cliente($strFinalQuery,$id_forma_pago_cliente)
	{
		try
		{

			$this->documento_cuenta_cobrarLogic->getsFK_Idforma_pago_cliente($strFinalQuery,new Pagination(),$id_forma_pago_cliente);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idperiodo($strFinalQuery,$id_periodo)
	{
		try
		{

			$this->documento_cuenta_cobrarLogic->getsFK_Idperiodo($strFinalQuery,new Pagination(),$id_periodo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idsucursal($strFinalQuery,$id_sucursal)
	{
		try
		{

			$this->documento_cuenta_cobrarLogic->getsFK_Idsucursal($strFinalQuery,new Pagination(),$id_sucursal);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idusuario($strFinalQuery,$id_usuario)
	{
		try
		{

			$this->documento_cuenta_cobrarLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
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
			
			
			$documento_cuenta_cobrarForeignKey=new documento_cuenta_cobrar_param_return(); //documento_cuenta_cobrarForeignKey();
			
			$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));
						
			if($documento_cuenta_cobrar_session==null) {
				$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$documento_cuenta_cobrarForeignKey=$this->documento_cuenta_cobrarLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$documento_cuenta_cobrar_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$documento_cuenta_cobrarForeignKey->empresasFK;
				$this->idempresaDefaultFK=$documento_cuenta_cobrarForeignKey->idempresaDefaultFK;
			}

			if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$this->strRecargarFkTipos,',')) {
				$this->sucursalsFK=$documento_cuenta_cobrarForeignKey->sucursalsFK;
				$this->idsucursalDefaultFK=$documento_cuenta_cobrarForeignKey->idsucursalDefaultFK;
			}

			if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionsucursal) {
				$this->setVisibleBusquedasParasucursal(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$this->strRecargarFkTipos,',')) {
				$this->ejerciciosFK=$documento_cuenta_cobrarForeignKey->ejerciciosFK;
				$this->idejercicioDefaultFK=$documento_cuenta_cobrarForeignKey->idejercicioDefaultFK;
			}

			if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionejercicio) {
				$this->setVisibleBusquedasParaejercicio(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$this->strRecargarFkTipos,',')) {
				$this->periodosFK=$documento_cuenta_cobrarForeignKey->periodosFK;
				$this->idperiodoDefaultFK=$documento_cuenta_cobrarForeignKey->idperiodoDefaultFK;
			}

			if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionperiodo) {
				$this->setVisibleBusquedasParaperiodo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$documento_cuenta_cobrarForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$documento_cuenta_cobrarForeignKey->idusuarioDefaultFK;
			}

			if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionusuario) {
				$this->setVisibleBusquedasParausuario(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$this->strRecargarFkTipos,',')) {
				$this->clientesFK=$documento_cuenta_cobrarForeignKey->clientesFK;
				$this->idclienteDefaultFK=$documento_cuenta_cobrarForeignKey->idclienteDefaultFK;
			}

			if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesioncliente) {
				$this->setVisibleBusquedasParacliente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_forma_pago_cliente',$this->strRecargarFkTipos,',')) {
				$this->forma_pago_clientesFK=$documento_cuenta_cobrarForeignKey->forma_pago_clientesFK;
				$this->idforma_pago_clienteDefaultFK=$documento_cuenta_cobrarForeignKey->idforma_pago_clienteDefaultFK;
			}

			if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionforma_pago_cliente) {
				$this->setVisibleBusquedasParaforma_pago_cliente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_corriente',$this->strRecargarFkTipos,',')) {
				$this->cuenta_corrientesFK=$documento_cuenta_cobrarForeignKey->cuenta_corrientesFK;
				$this->idcuenta_corrienteDefaultFK=$documento_cuenta_cobrarForeignKey->idcuenta_corrienteDefaultFK;
			}

			if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesioncuenta_corriente) {
				$this->setVisibleBusquedasParacuenta_corriente(true);
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
	
	function cargarCombosFKFromReturnGeneral($documento_cuenta_cobrarReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$documento_cuenta_cobrarReturnGeneral->strRecargarFkTipos;
			
			


			if($documento_cuenta_cobrarReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$documento_cuenta_cobrarReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$documento_cuenta_cobrarReturnGeneral->idempresaDefaultFK;
			}


			if($documento_cuenta_cobrarReturnGeneral->con_sucursalsFK==true) {
				$this->sucursalsFK=$documento_cuenta_cobrarReturnGeneral->sucursalsFK;
				$this->idsucursalDefaultFK=$documento_cuenta_cobrarReturnGeneral->idsucursalDefaultFK;
			}


			if($documento_cuenta_cobrarReturnGeneral->con_ejerciciosFK==true) {
				$this->ejerciciosFK=$documento_cuenta_cobrarReturnGeneral->ejerciciosFK;
				$this->idejercicioDefaultFK=$documento_cuenta_cobrarReturnGeneral->idejercicioDefaultFK;
			}


			if($documento_cuenta_cobrarReturnGeneral->con_periodosFK==true) {
				$this->periodosFK=$documento_cuenta_cobrarReturnGeneral->periodosFK;
				$this->idperiodoDefaultFK=$documento_cuenta_cobrarReturnGeneral->idperiodoDefaultFK;
			}


			if($documento_cuenta_cobrarReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$documento_cuenta_cobrarReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$documento_cuenta_cobrarReturnGeneral->idusuarioDefaultFK;
			}


			if($documento_cuenta_cobrarReturnGeneral->con_clientesFK==true) {
				$this->clientesFK=$documento_cuenta_cobrarReturnGeneral->clientesFK;
				$this->idclienteDefaultFK=$documento_cuenta_cobrarReturnGeneral->idclienteDefaultFK;
			}


			if($documento_cuenta_cobrarReturnGeneral->con_forma_pago_clientesFK==true) {
				$this->forma_pago_clientesFK=$documento_cuenta_cobrarReturnGeneral->forma_pago_clientesFK;
				$this->idforma_pago_clienteDefaultFK=$documento_cuenta_cobrarReturnGeneral->idforma_pago_clienteDefaultFK;
			}


			if($documento_cuenta_cobrarReturnGeneral->con_cuenta_corrientesFK==true) {
				$this->cuenta_corrientesFK=$documento_cuenta_cobrarReturnGeneral->cuenta_corrientesFK;
				$this->idcuenta_corrienteDefaultFK=$documento_cuenta_cobrarReturnGeneral->idcuenta_corrienteDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));
		
		if($documento_cuenta_cobrar_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($documento_cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($documento_cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sucursal_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sucursal';
			}
			else if($documento_cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ejercicio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ejercicio';
			}
			else if($documento_cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==periodo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='periodo';
			}
			else if($documento_cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			else if($documento_cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cliente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cliente';
			}
			else if($documento_cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==forma_pago_cliente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='forma_pago_cliente';
			}
			else if($documento_cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_corriente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta_corriente';
			}
			
			$documento_cuenta_cobrar_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}						
			
			$this->documento_cuenta_cobrarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->documento_cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->documento_cuenta_cobrarsAuxiliar=array();
			}
			
			if(count($this->documento_cuenta_cobrarsAuxiliar) > 0) {
				
				foreach ($this->documento_cuenta_cobrarsAuxiliar as $documento_cuenta_cobrarSeleccionado) {
					$this->eliminarTablaBase($documento_cuenta_cobrarSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('devolucion_factura');
			$tipoRelacionReporte->setsDescripcion('Devolucion Facturas');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('factura');
			$tipoRelacionReporte->setsDescripcion('Facturas');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('factura_lote');
			$tipoRelacionReporte->setsDescripcion('Facturas Loteses');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('imagen_documento_cuenta_cobrar');
			$tipoRelacionReporte->setsDescripcion('Imagenes es');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=factura_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=imagen_documento_cuenta_cobrar_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=factura_lote_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=devolucion_factura_util::$STR_NOMBRE_CLASE;
		
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


	public function getsucursalsFKListSelectItem() 
	{
		$sucursalsList=array();

		$item=null;

		foreach($this->sucursalsFK as $sucursal)
		{
			$item=new SelectItem();
			$item->setLabel($sucursal->getnombre());
			$item->setValue($sucursal->getId());
			$sucursalsList[]=$item;
		}

		return $sucursalsList;
	}


	public function getejerciciosFKListSelectItem() 
	{
		$ejerciciosList=array();

		$item=null;

		foreach($this->ejerciciosFK as $ejercicio)
		{
			$item=new SelectItem();
			$item->setLabel($ejercicio->getId());
			$item->setValue($ejercicio->getId());
			$ejerciciosList[]=$item;
		}

		return $ejerciciosList;
	}


	public function getperiodosFKListSelectItem() 
	{
		$periodosList=array();

		$item=null;

		foreach($this->periodosFK as $periodo)
		{
			$item=new SelectItem();
			$item->setLabel($periodo->getnombre());
			$item->setValue($periodo->getId());
			$periodosList[]=$item;
		}

		return $periodosList;
	}


	public function getusuariosFKListSelectItem() 
	{
		$usuariosList=array();

		$item=null;

		foreach($this->usuariosFK as $usuario)
		{
			$item=new SelectItem();
			$item->setLabel($usuario->getuser_name());
			$item->setValue($usuario->getId());
			$usuariosList[]=$item;
		}

		return $usuariosList;
	}


	public function getclientesFKListSelectItem() 
	{
		$clientesList=array();

		$item=null;

		foreach($this->clientesFK as $cliente)
		{
			$item=new SelectItem();
			$item->setLabel($cliente->getnombre_completo());
			$item->setValue($cliente->getId());
			$clientesList[]=$item;
		}

		return $clientesList;
	}


	public function getforma_pago_clientesFKListSelectItem() 
	{
		$forma_pago_clientesList=array();

		$item=null;

		foreach($this->forma_pago_clientesFK as $forma_pago_cliente)
		{
			$item=new SelectItem();
			$item->setLabel($forma_pago_cliente->getcodigo());
			$item->setValue($forma_pago_cliente->getId());
			$forma_pago_clientesList[]=$item;
		}

		return $forma_pago_clientesList;
	}


	public function getcuenta_corrientesFKListSelectItem() 
	{
		$cuenta_corrientesList=array();

		$item=null;

		foreach($this->cuenta_corrientesFK as $cuenta_corriente)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta_corriente->getId());
			$item->setValue($cuenta_corriente->getId());
			$cuenta_corrientesList[]=$item;
		}

		return $cuenta_corrientesList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
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
				$this->documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$documento_cuenta_cobrarsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->documento_cuenta_cobrars as $documento_cuenta_cobrarLocal) {
				if($documento_cuenta_cobrarLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->documento_cuenta_cobrar=new documento_cuenta_cobrar();
				
				$this->documento_cuenta_cobrar->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->documento_cuenta_cobrars[]=$this->documento_cuenta_cobrar;*/
				
				$documento_cuenta_cobrarsNuevos[]=$this->documento_cuenta_cobrar;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('forma_pago_cliente');$classes[]=$class;
				$class=new Classe('cuenta_corriente');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($documento_cuenta_cobrarsNuevos);
					
				$this->documento_cuenta_cobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($documento_cuenta_cobrarsNuevos as $documento_cuenta_cobrarNuevo) {
					$this->documento_cuenta_cobrars[]=$documento_cuenta_cobrarNuevo;
				}
				
				/*$this->documento_cuenta_cobrars[]=$documento_cuenta_cobrarsNuevos;*/
				
				$this->documento_cuenta_cobrarLogic->setdocumento_cuenta_cobrars($this->documento_cuenta_cobrars);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($documento_cuenta_cobrarsNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($documento_cuenta_cobrar_session->bigidempresaActual!=null && $documento_cuenta_cobrar_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($documento_cuenta_cobrar_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=documento_cuenta_cobrar_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery=''){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$this->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionsucursal!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=sucursal_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalsucursal=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsucursal=Funciones::GetFinalQueryAppend($finalQueryGlobalsucursal, '');
				$finalQueryGlobalsucursal.=sucursal_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsucursal.$strRecargarFkQuery;		

				$sucursalLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombossucursalsFK($sucursalLogic->getsucursals());

		} else {
			$this->setVisibleBusquedasParasucursal(true);


			if($documento_cuenta_cobrar_session->bigidsucursalActual!=null && $documento_cuenta_cobrar_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($documento_cuenta_cobrar_session->bigidsucursalActual);//WithConnection

				$this->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=documento_cuenta_cobrar_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$this->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery=''){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$this->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionejercicio!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=ejercicio_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalejercicio=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalejercicio=Funciones::GetFinalQueryAppend($finalQueryGlobalejercicio, '');
				$finalQueryGlobalejercicio.=ejercicio_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalejercicio.$strRecargarFkQuery;		

				$ejercicioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosejerciciosFK($ejercicioLogic->getejercicios());

		} else {
			$this->setVisibleBusquedasParaejercicio(true);


			if($documento_cuenta_cobrar_session->bigidejercicioActual!=null && $documento_cuenta_cobrar_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($documento_cuenta_cobrar_session->bigidejercicioActual);//WithConnection

				$this->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=documento_cuenta_cobrar_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$this->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery=''){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$this->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionperiodo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=periodo_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalperiodo=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalperiodo=Funciones::GetFinalQueryAppend($finalQueryGlobalperiodo, '');
				$finalQueryGlobalperiodo.=periodo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalperiodo.$strRecargarFkQuery;		

				$periodoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosperiodosFK($periodoLogic->getperiodos());

		} else {
			$this->setVisibleBusquedasParaperiodo(true);


			if($documento_cuenta_cobrar_session->bigidperiodoActual!=null && $documento_cuenta_cobrar_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($documento_cuenta_cobrar_session->bigidperiodoActual);//WithConnection

				$this->periodosFK[$periodoLogic->getperiodo()->getId()]=documento_cuenta_cobrar_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$this->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery=''){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$this->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionusuario!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=usuario_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalusuario=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalusuario=Funciones::GetFinalQueryAppend($finalQueryGlobalusuario, '');
				$finalQueryGlobalusuario.=usuario_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalusuario.$strRecargarFkQuery;		

				$usuarioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosusuariosFK($usuarioLogic->getusuarios());

		} else {
			$this->setVisibleBusquedasParausuario(true);


			if($documento_cuenta_cobrar_session->bigidusuarioActual!=null && $documento_cuenta_cobrar_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($documento_cuenta_cobrar_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=documento_cuenta_cobrar_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery=''){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$this->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesioncliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cliente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcliente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcliente=Funciones::GetFinalQueryAppend($finalQueryGlobalcliente, '');
				$finalQueryGlobalcliente.=cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcliente.$strRecargarFkQuery;		

				$clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosclientesFK($clienteLogic->getclientes());

		} else {
			$this->setVisibleBusquedasParacliente(true);


			if($documento_cuenta_cobrar_session->bigidclienteActual!=null && $documento_cuenta_cobrar_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($documento_cuenta_cobrar_session->bigidclienteActual);//WithConnection

				$this->clientesFK[$clienteLogic->getcliente()->getId()]=documento_cuenta_cobrar_util::getclienteDescripcion($clienteLogic->getcliente());
				$this->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	public function cargarCombosforma_pago_clientesFK($connexion=null,$strRecargarFkQuery=''){
		$forma_pago_clienteLogic= new forma_pago_cliente_logic();
		$pagination= new Pagination();
		$this->forma_pago_clientesFK=array();

		$forma_pago_clienteLogic->setConnexion($connexion);
		$forma_pago_clienteLogic->getforma_pago_clienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionforma_pago_cliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=forma_pago_cliente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalforma_pago_cliente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalforma_pago_cliente=Funciones::GetFinalQueryAppend($finalQueryGlobalforma_pago_cliente, '');
				$finalQueryGlobalforma_pago_cliente.=forma_pago_cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalforma_pago_cliente.$strRecargarFkQuery;		

				$forma_pago_clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosforma_pago_clientesFK($forma_pago_clienteLogic->getforma_pago_clientes());

		} else {
			$this->setVisibleBusquedasParaforma_pago_cliente(true);


			if($documento_cuenta_cobrar_session->bigidforma_pago_clienteActual!=null && $documento_cuenta_cobrar_session->bigidforma_pago_clienteActual > 0) {
				$forma_pago_clienteLogic->getEntity($documento_cuenta_cobrar_session->bigidforma_pago_clienteActual);//WithConnection

				$this->forma_pago_clientesFK[$forma_pago_clienteLogic->getforma_pago_cliente()->getId()]=documento_cuenta_cobrar_util::getforma_pago_clienteDescripcion($forma_pago_clienteLogic->getforma_pago_cliente());
				$this->idforma_pago_clienteDefaultFK=$forma_pago_clienteLogic->getforma_pago_cliente()->getId();
			}
		}
	}

	public function cargarComboscuenta_corrientesFK($connexion=null,$strRecargarFkQuery=''){
		$cuenta_corrienteLogic= new cuenta_corriente_logic();
		$pagination= new Pagination();
		$this->cuenta_corrientesFK=array();

		$cuenta_corrienteLogic->setConnexion($connexion);
		$cuenta_corrienteLogic->getcuenta_corrienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesioncuenta_corriente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_corriente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcuenta_corriente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta_corriente=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta_corriente, '');
				$finalQueryGlobalcuenta_corriente.=cuenta_corriente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta_corriente.$strRecargarFkQuery;		

				$cuenta_corrienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscuenta_corrientesFK($cuenta_corrienteLogic->getcuenta_corrientes());

		} else {
			$this->setVisibleBusquedasParacuenta_corriente(true);


			if($documento_cuenta_cobrar_session->bigidcuenta_corrienteActual!=null && $documento_cuenta_cobrar_session->bigidcuenta_corrienteActual > 0) {
				$cuenta_corrienteLogic->getEntity($documento_cuenta_cobrar_session->bigidcuenta_corrienteActual);//WithConnection

				$this->cuenta_corrientesFK[$cuenta_corrienteLogic->getcuenta_corriente()->getId()]=documento_cuenta_cobrar_util::getcuenta_corrienteDescripcion($cuenta_corrienteLogic->getcuenta_corriente());
				$this->idcuenta_corrienteDefaultFK=$cuenta_corrienteLogic->getcuenta_corriente()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=documento_cuenta_cobrar_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombossucursalsFK($sucursals){

		foreach ($sucursals as $sucursalLocal ) {
			if($this->idsucursalDefaultFK==0) {
				$this->idsucursalDefaultFK=$sucursalLocal->getId();
			}

			$this->sucursalsFK[$sucursalLocal->getId()]=documento_cuenta_cobrar_util::getsucursalDescripcion($sucursalLocal);
		}
	}

	public function prepararCombosejerciciosFK($ejercicios){

		foreach ($ejercicios as $ejercicioLocal ) {
			if($this->idejercicioDefaultFK==0) {
				$this->idejercicioDefaultFK=$ejercicioLocal->getId();
			}

			$this->ejerciciosFK[$ejercicioLocal->getId()]=documento_cuenta_cobrar_util::getejercicioDescripcion($ejercicioLocal);
		}
	}

	public function prepararCombosperiodosFK($periodos){

		foreach ($periodos as $periodoLocal ) {
			if($this->idperiodoDefaultFK==0) {
				$this->idperiodoDefaultFK=$periodoLocal->getId();
			}

			$this->periodosFK[$periodoLocal->getId()]=documento_cuenta_cobrar_util::getperiodoDescripcion($periodoLocal);
		}
	}

	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=documento_cuenta_cobrar_util::getusuarioDescripcion($usuarioLocal);
		}
	}

	public function prepararCombosclientesFK($clientes){

		foreach ($clientes as $clienteLocal ) {
			if($this->idclienteDefaultFK==0) {
				$this->idclienteDefaultFK=$clienteLocal->getId();
			}

			$this->clientesFK[$clienteLocal->getId()]=documento_cuenta_cobrar_util::getclienteDescripcion($clienteLocal);
		}
	}

	public function prepararCombosforma_pago_clientesFK($forma_pago_clientes){

		foreach ($forma_pago_clientes as $forma_pago_clienteLocal ) {
			if($this->idforma_pago_clienteDefaultFK==0) {
				$this->idforma_pago_clienteDefaultFK=$forma_pago_clienteLocal->getId();
			}

			$this->forma_pago_clientesFK[$forma_pago_clienteLocal->getId()]=documento_cuenta_cobrar_util::getforma_pago_clienteDescripcion($forma_pago_clienteLocal);
		}
	}

	public function prepararComboscuenta_corrientesFK($cuenta_corrientes){

		foreach ($cuenta_corrientes as $cuenta_corrienteLocal ) {
			if($this->idcuenta_corrienteDefaultFK==0) {
				$this->idcuenta_corrienteDefaultFK=$cuenta_corrienteLocal->getId();
			}

			$this->cuenta_corrientesFK[$cuenta_corrienteLocal->getId()]=documento_cuenta_cobrar_util::getcuenta_corrienteDescripcion($cuenta_corrienteLocal);
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

			$strDescripcionempresa=documento_cuenta_cobrar_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripcionsucursalFK($idsucursal,$connexion=null){
		$sucursalLogic= new sucursal_logic();
		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$strDescripcionsucursal='';

		if($idsucursal!=null && $idsucursal!='' && $idsucursal!='null') {
			if($connexion!=null) {
				$sucursalLogic->getEntity($idsucursal);//WithConnection
			} else {
				$sucursalLogic->getEntityWithConnection($idsucursal);//
			}

			$strDescripcionsucursal=documento_cuenta_cobrar_util::getsucursalDescripcion($sucursalLogic->getsucursal());

		} else {
			$strDescripcionsucursal='null';
		}

		return $strDescripcionsucursal;
	}

	public function cargarDescripcionejercicioFK($idejercicio,$connexion=null){
		$ejercicioLogic= new ejercicio_logic();
		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$strDescripcionejercicio='';

		if($idejercicio!=null && $idejercicio!='' && $idejercicio!='null') {
			if($connexion!=null) {
				$ejercicioLogic->getEntity($idejercicio);//WithConnection
			} else {
				$ejercicioLogic->getEntityWithConnection($idejercicio);//
			}

			$strDescripcionejercicio=documento_cuenta_cobrar_util::getejercicioDescripcion($ejercicioLogic->getejercicio());

		} else {
			$strDescripcionejercicio='null';
		}

		return $strDescripcionejercicio;
	}

	public function cargarDescripcionperiodoFK($idperiodo,$connexion=null){
		$periodoLogic= new periodo_logic();
		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$strDescripcionperiodo='';

		if($idperiodo!=null && $idperiodo!='' && $idperiodo!='null') {
			if($connexion!=null) {
				$periodoLogic->getEntity($idperiodo);//WithConnection
			} else {
				$periodoLogic->getEntityWithConnection($idperiodo);//
			}

			$strDescripcionperiodo=documento_cuenta_cobrar_util::getperiodoDescripcion($periodoLogic->getperiodo());

		} else {
			$strDescripcionperiodo='null';
		}

		return $strDescripcionperiodo;
	}

	public function cargarDescripcionusuarioFK($idusuario,$connexion=null){
		$usuarioLogic= new usuario_logic();
		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$strDescripcionusuario='';

		if($idusuario!=null && $idusuario!='' && $idusuario!='null') {
			if($connexion!=null) {
				$usuarioLogic->getEntity($idusuario);//WithConnection
			} else {
				$usuarioLogic->getEntityWithConnection($idusuario);//
			}

			$strDescripcionusuario=documento_cuenta_cobrar_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
	}

	public function cargarDescripcionclienteFK($idcliente,$connexion=null){
		$clienteLogic= new cliente_logic();
		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$strDescripcioncliente='';

		if($idcliente!=null && $idcliente!='' && $idcliente!='null') {
			if($connexion!=null) {
				$clienteLogic->getEntity($idcliente);//WithConnection
			} else {
				$clienteLogic->getEntityWithConnection($idcliente);//
			}

			$strDescripcioncliente=documento_cuenta_cobrar_util::getclienteDescripcion($clienteLogic->getcliente());

		} else {
			$strDescripcioncliente='null';
		}

		return $strDescripcioncliente;
	}

	public function cargarDescripcionforma_pago_clienteFK($idforma_pago_cliente,$connexion=null){
		$forma_pago_clienteLogic= new forma_pago_cliente_logic();
		$forma_pago_clienteLogic->setConnexion($connexion);
		$forma_pago_clienteLogic->getforma_pago_clienteDataAccess()->isForFKData=true;
		$strDescripcionforma_pago_cliente='';

		if($idforma_pago_cliente!=null && $idforma_pago_cliente!='' && $idforma_pago_cliente!='null') {
			if($connexion!=null) {
				$forma_pago_clienteLogic->getEntity($idforma_pago_cliente);//WithConnection
			} else {
				$forma_pago_clienteLogic->getEntityWithConnection($idforma_pago_cliente);//
			}

			$strDescripcionforma_pago_cliente=documento_cuenta_cobrar_util::getforma_pago_clienteDescripcion($forma_pago_clienteLogic->getforma_pago_cliente());

		} else {
			$strDescripcionforma_pago_cliente='null';
		}

		return $strDescripcionforma_pago_cliente;
	}

	public function cargarDescripcioncuenta_corrienteFK($idcuenta_corriente,$connexion=null){
		$cuenta_corrienteLogic= new cuenta_corriente_logic();
		$cuenta_corrienteLogic->setConnexion($connexion);
		$cuenta_corrienteLogic->getcuenta_corrienteDataAccess()->isForFKData=true;
		$strDescripcioncuenta_corriente='';

		if($idcuenta_corriente!=null && $idcuenta_corriente!='' && $idcuenta_corriente!='null') {
			if($connexion!=null) {
				$cuenta_corrienteLogic->getEntity($idcuenta_corriente);//WithConnection
			} else {
				$cuenta_corrienteLogic->getEntityWithConnection($idcuenta_corriente);//
			}

			$strDescripcioncuenta_corriente=documento_cuenta_cobrar_util::getcuenta_corrienteDescripcion($cuenta_corrienteLogic->getcuenta_corriente());

		} else {
			$strDescripcioncuenta_corriente='null';
		}

		return $strDescripcioncuenta_corriente;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(documento_cuenta_cobrar $documento_cuenta_cobrarClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$documento_cuenta_cobrarClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
				$documento_cuenta_cobrarClase->setid_sucursal($this->parametroGeneralUsuarioActual->getid_sucursal());
				$documento_cuenta_cobrarClase->setid_ejercicio($this->parametroGeneralUsuarioActual->getid_ejercicio());
				$documento_cuenta_cobrarClase->setid_periodo($this->parametroGeneralUsuarioActual->getid_periodo());
				$documento_cuenta_cobrarClase->setid_usuario($this->usuarioActual->getId());
			
			
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

		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idforma_pago_cliente=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionempresa;
	}

	public function setVisibleBusquedasParasucursal($isParasucursal){
		$strParaVisiblesucursal='display:table-row';
		$strParaVisibleNegacionsucursal='display:none';

		if($isParasucursal) {
			$strParaVisiblesucursal='display:table-row';
			$strParaVisibleNegacionsucursal='display:none';
		} else {
			$strParaVisiblesucursal='display:none';
			$strParaVisibleNegacionsucursal='display:table-row';
		}


		$strParaVisibleNegacionsucursal=trim($strParaVisibleNegacionsucursal);

		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idforma_pago_cliente=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idsucursal=$strParaVisiblesucursal;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionsucursal;
	}

	public function setVisibleBusquedasParaejercicio($isParaejercicio){
		$strParaVisibleejercicio='display:table-row';
		$strParaVisibleNegacionejercicio='display:none';

		if($isParaejercicio) {
			$strParaVisibleejercicio='display:table-row';
			$strParaVisibleNegacionejercicio='display:none';
		} else {
			$strParaVisibleejercicio='display:none';
			$strParaVisibleNegacionejercicio='display:table-row';
		}


		$strParaVisibleNegacionejercicio=trim($strParaVisibleNegacionejercicio);

		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idejercicio=$strParaVisibleejercicio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idforma_pago_cliente=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionejercicio;
	}

	public function setVisibleBusquedasParaperiodo($isParaperiodo){
		$strParaVisibleperiodo='display:table-row';
		$strParaVisibleNegacionperiodo='display:none';

		if($isParaperiodo) {
			$strParaVisibleperiodo='display:table-row';
			$strParaVisibleNegacionperiodo='display:none';
		} else {
			$strParaVisibleperiodo='display:none';
			$strParaVisibleNegacionperiodo='display:table-row';
		}


		$strParaVisibleNegacionperiodo=trim($strParaVisibleNegacionperiodo);

		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idforma_pago_cliente=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idperiodo=$strParaVisibleperiodo;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionperiodo;
	}

	public function setVisibleBusquedasParausuario($isParausuario){
		$strParaVisibleusuario='display:table-row';
		$strParaVisibleNegacionusuario='display:none';

		if($isParausuario) {
			$strParaVisibleusuario='display:table-row';
			$strParaVisibleNegacionusuario='display:none';
		} else {
			$strParaVisibleusuario='display:none';
			$strParaVisibleNegacionusuario='display:table-row';
		}


		$strParaVisibleNegacionusuario=trim($strParaVisibleNegacionusuario);

		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idforma_pago_cliente=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idusuario=$strParaVisibleusuario;
	}

	public function setVisibleBusquedasParacliente($isParacliente){
		$strParaVisiblecliente='display:table-row';
		$strParaVisibleNegacioncliente='display:none';

		if($isParacliente) {
			$strParaVisiblecliente='display:table-row';
			$strParaVisibleNegacioncliente='display:none';
		} else {
			$strParaVisiblecliente='display:none';
			$strParaVisibleNegacioncliente='display:table-row';
		}


		$strParaVisibleNegacioncliente=trim($strParaVisibleNegacioncliente);

		$this->strVisibleFK_Idcliente=$strParaVisiblecliente;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idforma_pago_cliente=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacioncliente;
	}

	public function setVisibleBusquedasParaforma_pago_cliente($isParaforma_pago_cliente){
		$strParaVisibleforma_pago_cliente='display:table-row';
		$strParaVisibleNegacionforma_pago_cliente='display:none';

		if($isParaforma_pago_cliente) {
			$strParaVisibleforma_pago_cliente='display:table-row';
			$strParaVisibleNegacionforma_pago_cliente='display:none';
		} else {
			$strParaVisibleforma_pago_cliente='display:none';
			$strParaVisibleNegacionforma_pago_cliente='display:table-row';
		}


		$strParaVisibleNegacionforma_pago_cliente=trim($strParaVisibleNegacionforma_pago_cliente);

		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionforma_pago_cliente;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionforma_pago_cliente;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionforma_pago_cliente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionforma_pago_cliente;
		$this->strVisibleFK_Idforma_pago_cliente=$strParaVisibleforma_pago_cliente;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionforma_pago_cliente;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionforma_pago_cliente;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionforma_pago_cliente;
	}

	public function setVisibleBusquedasParacuenta_corriente($isParacuenta_corriente){
		$strParaVisiblecuenta_corriente='display:table-row';
		$strParaVisibleNegacioncuenta_corriente='display:none';

		if($isParacuenta_corriente) {
			$strParaVisiblecuenta_corriente='display:table-row';
			$strParaVisibleNegacioncuenta_corriente='display:none';
		} else {
			$strParaVisiblecuenta_corriente='display:none';
			$strParaVisibleNegacioncuenta_corriente='display:table-row';
		}


		$strParaVisibleNegacioncuenta_corriente=trim($strParaVisibleNegacioncuenta_corriente);

		$this->strVisibleFK_Idcliente=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idcuenta_corriente=$strParaVisiblecuenta_corriente;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idforma_pago_cliente=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacioncuenta_corriente;
	}
	
	

	public function abrirBusquedaParaempresa() {//$iddocumento_cuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddocumento_cuenta_cobrarActual=$iddocumento_cuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParasucursal() {//$iddocumento_cuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddocumento_cuenta_cobrarActual=$iddocumento_cuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sucursal_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sucursal_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sucursal_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaejercicio() {//$iddocumento_cuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddocumento_cuenta_cobrarActual=$iddocumento_cuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ejercicio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ejercicio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ejercicio_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaperiodo() {//$iddocumento_cuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddocumento_cuenta_cobrarActual=$iddocumento_cuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.periodo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',periodo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(periodo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParausuario() {//$iddocumento_cuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddocumento_cuenta_cobrarActual=$iddocumento_cuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacliente() {//$iddocumento_cuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddocumento_cuenta_cobrarActual=$iddocumento_cuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cliente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cliente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cliente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaforma_pago_cliente() {//$iddocumento_cuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddocumento_cuenta_cobrarActual=$iddocumento_cuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.forma_pago_cliente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_forma_pago_cliente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',forma_pago_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_forma_pago_cliente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(forma_pago_cliente_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_corriente() {//$iddocumento_cuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddocumento_cuenta_cobrarActual=$iddocumento_cuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_corriente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_corriente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_corriente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_corriente_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP','iframe',$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParafacturas(int $iddocumento_cuenta_cobrarActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->iddocumento_cuenta_cobrarActual=$iddocumento_cuenta_cobrarActual;

		$bitPaginaPopupfactura=false;

		try {

			$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));

			if($documento_cuenta_cobrar_session==null) {
				$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
			}

			$factura_session=unserialize($this->Session->read(factura_util::$STR_SESSION_NAME));

			if($factura_session==null) {
				$factura_session=new factura_session();
			}

			$factura_session->strUltimaBusqueda='FK_Iddocumento_cuenta_cobrar';
			$factura_session->strPathNavegacionActual=$documento_cuenta_cobrar_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.factura_util::$STR_CLASS_WEB_TITULO;
			$factura_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupfactura=$factura_session->bitPaginaPopup;
			$factura_session->setPaginaPopupVariables(true);
			$bitPaginaPopupfactura=$factura_session->bitPaginaPopup;
			$factura_session->bitPermiteNavegacionHaciaFKDesde=false;
			$factura_session->strNombrePaginaNavegacionHaciaFKDesde=documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION;
			$factura_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar=true;
			$factura_session->bigiddocumento_cuenta_cobrarActual=$this->iddocumento_cuenta_cobrarActual;

			$documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK=true;
			$documento_cuenta_cobrar_session->bigIdActualFK=$this->iddocumento_cuenta_cobrarActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"factura"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=documento_cuenta_cobrar_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"factura"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(documento_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($documento_cuenta_cobrar_session));
			$this->Session->write(factura_util::$STR_SESSION_NAME,serialize($factura_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupfactura!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',factura_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(factura_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliardocumento_cuenta_cobrar,$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',factura_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(factura_util::$STR_CLASS_NAME,'cuentascobrar','','NO-POPUP',$this->strTipoPaginaAuxiliardocumento_cuenta_cobrar,$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaimagen_documento_cuenta_cobrares(int $iddocumento_cuenta_cobrarActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->iddocumento_cuenta_cobrarActual=$iddocumento_cuenta_cobrarActual;

		$bitPaginaPopupimagen_documento_cuenta_cobrar=false;

		try {

			$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));

			if($documento_cuenta_cobrar_session==null) {
				$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
			}

			$imagen_documento_cuenta_cobrar_session=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME));

			if($imagen_documento_cuenta_cobrar_session==null) {
				$imagen_documento_cuenta_cobrar_session=new imagen_documento_cuenta_cobrar_session();
			}

			$imagen_documento_cuenta_cobrar_session->strUltimaBusqueda='FK_Iddocumento_cuenta_cobrar';
			$imagen_documento_cuenta_cobrar_session->strPathNavegacionActual=$documento_cuenta_cobrar_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.imagen_documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
			$imagen_documento_cuenta_cobrar_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupimagen_documento_cuenta_cobrar=$imagen_documento_cuenta_cobrar_session->bitPaginaPopup;
			$imagen_documento_cuenta_cobrar_session->setPaginaPopupVariables(true);
			$bitPaginaPopupimagen_documento_cuenta_cobrar=$imagen_documento_cuenta_cobrar_session->bitPaginaPopup;
			$imagen_documento_cuenta_cobrar_session->bitPermiteNavegacionHaciaFKDesde=false;
			$imagen_documento_cuenta_cobrar_session->strNombrePaginaNavegacionHaciaFKDesde=documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION;
			$imagen_documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar=true;
			$imagen_documento_cuenta_cobrar_session->bigiddocumento_cuenta_cobrarActual=$this->iddocumento_cuenta_cobrarActual;

			$documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK=true;
			$documento_cuenta_cobrar_session->bigIdActualFK=$this->iddocumento_cuenta_cobrarActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"imagen_documento_cuenta_cobrar"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=documento_cuenta_cobrar_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"imagen_documento_cuenta_cobrar"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(documento_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($documento_cuenta_cobrar_session));
			$this->Session->write(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($imagen_documento_cuenta_cobrar_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupimagen_documento_cuenta_cobrar!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',imagen_documento_cuenta_cobrar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(imagen_documento_cuenta_cobrar_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliardocumento_cuenta_cobrar,$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',imagen_documento_cuenta_cobrar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(imagen_documento_cuenta_cobrar_util::$STR_CLASS_NAME,'cuentascobrar','','NO-POPUP',$this->strTipoPaginaAuxiliardocumento_cuenta_cobrar,$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParafactura_lotees(int $iddocumento_cuenta_cobrarActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->iddocumento_cuenta_cobrarActual=$iddocumento_cuenta_cobrarActual;

		$bitPaginaPopupfactura_lote=false;

		try {

			$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));

			if($documento_cuenta_cobrar_session==null) {
				$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
			}

			$factura_lote_session=unserialize($this->Session->read(factura_lote_util::$STR_SESSION_NAME));

			if($factura_lote_session==null) {
				$factura_lote_session=new factura_lote_session();
			}

			$factura_lote_session->strUltimaBusqueda='FK_Iddocumento_cuenta_cobrar';
			$factura_lote_session->strPathNavegacionActual=$documento_cuenta_cobrar_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.factura_lote_util::$STR_CLASS_WEB_TITULO;
			$factura_lote_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupfactura_lote=$factura_lote_session->bitPaginaPopup;
			$factura_lote_session->setPaginaPopupVariables(true);
			$bitPaginaPopupfactura_lote=$factura_lote_session->bitPaginaPopup;
			$factura_lote_session->bitPermiteNavegacionHaciaFKDesde=false;
			$factura_lote_session->strNombrePaginaNavegacionHaciaFKDesde=documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION;
			$factura_lote_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar=true;
			$factura_lote_session->bigiddocumento_cuenta_cobrarActual=$this->iddocumento_cuenta_cobrarActual;

			$documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK=true;
			$documento_cuenta_cobrar_session->bigIdActualFK=$this->iddocumento_cuenta_cobrarActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"factura_lote"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=documento_cuenta_cobrar_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"factura_lote"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(documento_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($documento_cuenta_cobrar_session));
			$this->Session->write(factura_lote_util::$STR_SESSION_NAME,serialize($factura_lote_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupfactura_lote!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',factura_lote_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(factura_lote_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliardocumento_cuenta_cobrar,$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',factura_lote_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(factura_lote_util::$STR_CLASS_NAME,'cuentascobrar','','NO-POPUP',$this->strTipoPaginaAuxiliardocumento_cuenta_cobrar,$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParadevolucion_facturas(int $iddocumento_cuenta_cobrarActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->iddocumento_cuenta_cobrarActual=$iddocumento_cuenta_cobrarActual;

		$bitPaginaPopupdevolucion_factura=false;

		try {

			$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));

			if($documento_cuenta_cobrar_session==null) {
				$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
			}

			$devolucion_factura_session=unserialize($this->Session->read(devolucion_factura_util::$STR_SESSION_NAME));

			if($devolucion_factura_session==null) {
				$devolucion_factura_session=new devolucion_factura_session();
			}

			$devolucion_factura_session->strUltimaBusqueda='FK_Iddocumento_cuenta_cobrar';
			$devolucion_factura_session->strPathNavegacionActual=$documento_cuenta_cobrar_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.devolucion_factura_util::$STR_CLASS_WEB_TITULO;
			$devolucion_factura_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupdevolucion_factura=$devolucion_factura_session->bitPaginaPopup;
			$devolucion_factura_session->setPaginaPopupVariables(true);
			$bitPaginaPopupdevolucion_factura=$devolucion_factura_session->bitPaginaPopup;
			$devolucion_factura_session->bitPermiteNavegacionHaciaFKDesde=false;
			$devolucion_factura_session->strNombrePaginaNavegacionHaciaFKDesde=documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION;
			$devolucion_factura_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar=true;
			$devolucion_factura_session->bigiddocumento_cuenta_cobrarActual=$this->iddocumento_cuenta_cobrarActual;

			$documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK=true;
			$documento_cuenta_cobrar_session->bigIdActualFK=$this->iddocumento_cuenta_cobrarActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"devolucion_factura"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=documento_cuenta_cobrar_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"devolucion_factura"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(documento_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($documento_cuenta_cobrar_session));
			$this->Session->write(devolucion_factura_util::$STR_SESSION_NAME,serialize($devolucion_factura_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupdevolucion_factura!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',devolucion_factura_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(devolucion_factura_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliardocumento_cuenta_cobrar,$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',devolucion_factura_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(devolucion_factura_util::$STR_CLASS_NAME,'cuentascobrar','','NO-POPUP',$this->strTipoPaginaAuxiliardocumento_cuenta_cobrar,$this->strTipoUsuarioAuxiliardocumento_cuenta_cobrar,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(documento_cuenta_cobrar_util::$STR_SESSION_NAME,documento_cuenta_cobrar_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$documento_cuenta_cobrar_session=$this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME);
				
		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();		
			//$this->Session->write('documento_cuenta_cobrar_session',$documento_cuenta_cobrar_session);							
		}
		*/
		
		$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
    	$documento_cuenta_cobrar_session->strPathNavegacionActual=documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
    	$documento_cuenta_cobrar_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(documento_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($documento_cuenta_cobrar_session));		
	}	
	
	public function getSetBusquedasSesionConfig(documento_cuenta_cobrar_session $documento_cuenta_cobrar_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK!=null && $documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK==true) {
			if($documento_cuenta_cobrar_session->bigIdActualFK!=null && $documento_cuenta_cobrar_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$documento_cuenta_cobrar_session->bigIdActualFKParaPosibleAtras=$documento_cuenta_cobrar_session->bigIdActualFK;*/
			}
				
			$documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(documento_cuenta_cobrar_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionempresa!=null && $documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($documento_cuenta_cobrar_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(documento_cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($documento_cuenta_cobrar_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($documento_cuenta_cobrar_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$documento_cuenta_cobrar_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($documento_cuenta_cobrar_session->intNumeroPaginacion==documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$documento_cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			else if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionsucursal!=null && $documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionsucursal==true)
			{
				if($documento_cuenta_cobrar_session->bigidsucursalActual!=0) {
					$this->strAccionBusqueda='FK_Idsucursal';

					$existe_history=HistoryWeb::ExisteElemento(documento_cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($documento_cuenta_cobrar_session->bigidsucursalActualDescripcion);
						$historyWeb->setIdActual($documento_cuenta_cobrar_session->bigidsucursalActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$documento_cuenta_cobrar_session->bigidsucursalActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionsucursal=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($documento_cuenta_cobrar_session->intNumeroPaginacion==documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$documento_cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			else if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionejercicio!=null && $documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionejercicio==true)
			{
				if($documento_cuenta_cobrar_session->bigidejercicioActual!=0) {
					$this->strAccionBusqueda='FK_Idejercicio';

					$existe_history=HistoryWeb::ExisteElemento(documento_cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($documento_cuenta_cobrar_session->bigidejercicioActualDescripcion);
						$historyWeb->setIdActual($documento_cuenta_cobrar_session->bigidejercicioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$documento_cuenta_cobrar_session->bigidejercicioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionejercicio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($documento_cuenta_cobrar_session->intNumeroPaginacion==documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$documento_cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			else if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionperiodo!=null && $documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionperiodo==true)
			{
				if($documento_cuenta_cobrar_session->bigidperiodoActual!=0) {
					$this->strAccionBusqueda='FK_Idperiodo';

					$existe_history=HistoryWeb::ExisteElemento(documento_cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($documento_cuenta_cobrar_session->bigidperiodoActualDescripcion);
						$historyWeb->setIdActual($documento_cuenta_cobrar_session->bigidperiodoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$documento_cuenta_cobrar_session->bigidperiodoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionperiodo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($documento_cuenta_cobrar_session->intNumeroPaginacion==documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$documento_cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			else if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionusuario!=null && $documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($documento_cuenta_cobrar_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(documento_cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($documento_cuenta_cobrar_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($documento_cuenta_cobrar_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$documento_cuenta_cobrar_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($documento_cuenta_cobrar_session->intNumeroPaginacion==documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$documento_cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			else if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesioncliente!=null && $documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesioncliente==true)
			{
				if($documento_cuenta_cobrar_session->bigidclienteActual!=0) {
					$this->strAccionBusqueda='FK_Idcliente';

					$existe_history=HistoryWeb::ExisteElemento(documento_cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($documento_cuenta_cobrar_session->bigidclienteActualDescripcion);
						$historyWeb->setIdActual($documento_cuenta_cobrar_session->bigidclienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$documento_cuenta_cobrar_session->bigidclienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesioncliente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($documento_cuenta_cobrar_session->intNumeroPaginacion==documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$documento_cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			else if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionforma_pago_cliente!=null && $documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionforma_pago_cliente==true)
			{
				if($documento_cuenta_cobrar_session->bigidforma_pago_clienteActual!=0) {
					$this->strAccionBusqueda='FK_Idforma_pago_cliente';

					$existe_history=HistoryWeb::ExisteElemento(documento_cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($documento_cuenta_cobrar_session->bigidforma_pago_clienteActualDescripcion);
						$historyWeb->setIdActual($documento_cuenta_cobrar_session->bigidforma_pago_clienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$documento_cuenta_cobrar_session->bigidforma_pago_clienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionforma_pago_cliente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($documento_cuenta_cobrar_session->intNumeroPaginacion==documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$documento_cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			else if($documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesioncuenta_corriente!=null && $documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesioncuenta_corriente==true)
			{
				if($documento_cuenta_cobrar_session->bigidcuenta_corrienteActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_corriente';

					$existe_history=HistoryWeb::ExisteElemento(documento_cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($documento_cuenta_cobrar_session->bigidcuenta_corrienteActualDescripcion);
						$historyWeb->setIdActual($documento_cuenta_cobrar_session->bigidcuenta_corrienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$documento_cuenta_cobrar_session->bigidcuenta_corrienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesioncuenta_corriente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($documento_cuenta_cobrar_session->intNumeroPaginacion==documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$documento_cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$documento_cuenta_cobrar_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));
		
		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		$documento_cuenta_cobrar_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$documento_cuenta_cobrar_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$documento_cuenta_cobrar_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcliente') {
			$documento_cuenta_cobrar_session->id_cliente=$this->id_clienteFK_Idcliente;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta_corriente') {
			$documento_cuenta_cobrar_session->id_cuenta_corriente=$this->id_cuenta_corrienteFK_Idcuenta_corriente;	

		}
		else if($this->strAccionBusqueda=='FK_Idejercicio') {
			$documento_cuenta_cobrar_session->id_ejercicio=$this->id_ejercicioFK_Idejercicio;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$documento_cuenta_cobrar_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idforma_pago_cliente') {
			$documento_cuenta_cobrar_session->id_forma_pago_cliente=$this->id_forma_pago_clienteFK_Idforma_pago_cliente;	

		}
		else if($this->strAccionBusqueda=='FK_Idperiodo') {
			$documento_cuenta_cobrar_session->id_periodo=$this->id_periodoFK_Idperiodo;	

		}
		else if($this->strAccionBusqueda=='FK_Idsucursal') {
			$documento_cuenta_cobrar_session->id_sucursal=$this->id_sucursalFK_Idsucursal;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$documento_cuenta_cobrar_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		
		$this->Session->write(documento_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($documento_cuenta_cobrar_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(documento_cuenta_cobrar_session $documento_cuenta_cobrar_session) {
		
		if($documento_cuenta_cobrar_session==null) {
			$documento_cuenta_cobrar_session=unserialize($this->Session->read(documento_cuenta_cobrar_util::$STR_SESSION_NAME));
		}
		
		if($documento_cuenta_cobrar_session==null) {
		   $documento_cuenta_cobrar_session=new documento_cuenta_cobrar_session();
		}
		
		if($documento_cuenta_cobrar_session->strUltimaBusqueda!=null && $documento_cuenta_cobrar_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$documento_cuenta_cobrar_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$documento_cuenta_cobrar_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$documento_cuenta_cobrar_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcliente') {
				$this->id_clienteFK_Idcliente=$documento_cuenta_cobrar_session->id_cliente;
				$documento_cuenta_cobrar_session->id_cliente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta_corriente') {
				$this->id_cuenta_corrienteFK_Idcuenta_corriente=$documento_cuenta_cobrar_session->id_cuenta_corriente;
				$documento_cuenta_cobrar_session->id_cuenta_corriente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idejercicio') {
				$this->id_ejercicioFK_Idejercicio=$documento_cuenta_cobrar_session->id_ejercicio;
				$documento_cuenta_cobrar_session->id_ejercicio=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$documento_cuenta_cobrar_session->id_empresa;
				$documento_cuenta_cobrar_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idforma_pago_cliente') {
				$this->id_forma_pago_clienteFK_Idforma_pago_cliente=$documento_cuenta_cobrar_session->id_forma_pago_cliente;
				$documento_cuenta_cobrar_session->id_forma_pago_cliente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idperiodo') {
				$this->id_periodoFK_Idperiodo=$documento_cuenta_cobrar_session->id_periodo;
				$documento_cuenta_cobrar_session->id_periodo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idsucursal') {
				$this->id_sucursalFK_Idsucursal=$documento_cuenta_cobrar_session->id_sucursal;
				$documento_cuenta_cobrar_session->id_sucursal=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$documento_cuenta_cobrar_session->id_usuario;
				$documento_cuenta_cobrar_session->id_usuario=-1;

			}
		}
		
		$documento_cuenta_cobrar_session->strUltimaBusqueda='';
		//$documento_cuenta_cobrar_session->intNumeroPaginacion=10;
		$documento_cuenta_cobrar_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(documento_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($documento_cuenta_cobrar_session));		
	}
	
	public function documento_cuenta_cobrarsControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idsucursalDefaultFK = 0;
		$this->idejercicioDefaultFK = 0;
		$this->idperiodoDefaultFK = 0;
		$this->idusuarioDefaultFK = 0;
		$this->idclienteDefaultFK = 0;
		$this->idforma_pago_clienteDefaultFK = 0;
		$this->idcuenta_corrienteDefaultFK = 0;
	}
	
	public function setdocumento_cuenta_cobrarFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_sucursal',$this->idsucursalDefaultFK);
		$this->setExistDataCampoForm('form','id_ejercicio',$this->idejercicioDefaultFK);
		$this->setExistDataCampoForm('form','id_periodo',$this->idperiodoDefaultFK);
		$this->setExistDataCampoForm('form','id_usuario',$this->idusuarioDefaultFK);
		$this->setExistDataCampoForm('form','id_cliente',$this->idclienteDefaultFK);
		$this->setExistDataCampoForm('form','id_forma_pago_cliente',$this->idforma_pago_clienteDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_corriente',$this->idcuenta_corrienteDefaultFK);
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

		sucursal::$class;
		sucursal_carga::$CONTROLLER;

		ejercicio::$class;
		ejercicio_carga::$CONTROLLER;

		periodo::$class;
		periodo_carga::$CONTROLLER;

		usuario::$class;
		usuario_carga::$CONTROLLER;

		cliente::$class;
		cliente_carga::$CONTROLLER;

		forma_pago_cliente::$class;
		forma_pago_cliente_carga::$CONTROLLER;

		cuenta_corriente::$class;
		cuenta_corriente_carga::$CONTROLLER;
		
		//REL
		

		factura_carga::$CONTROLLER;
		factura_util::$STR_SCHEMA;
		factura_session::class;

		imagen_documento_cuenta_cobrar_carga::$CONTROLLER;
		imagen_documento_cuenta_cobrar_util::$STR_SCHEMA;
		imagen_documento_cuenta_cobrar_session::class;

		factura_lote_carga::$CONTROLLER;
		factura_lote_util::$STR_SCHEMA;
		factura_lote_session::class;

		devolucion_factura_carga::$CONTROLLER;
		devolucion_factura_util::$STR_SCHEMA;
		devolucion_factura_session::class;
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
		interface documento_cuenta_cobrar_controlI {	
		
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
		
		public function onLoad(documento_cuenta_cobrar_session $documento_cuenta_cobrar_session=null);	
		function index(?string $strTypeOnLoaddocumento_cuenta_cobrar='',?string $strTipoPaginaAuxiliardocumento_cuenta_cobrar='',?string $strTipoUsuarioAuxiliardocumento_cuenta_cobrar='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoaddocumento_cuenta_cobrar='',string $strTipoPaginaAuxiliardocumento_cuenta_cobrar='',string $strTipoUsuarioAuxiliardocumento_cuenta_cobrar='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($documento_cuenta_cobrarReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(documento_cuenta_cobrar $documento_cuenta_cobrarClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(documento_cuenta_cobrar_session $documento_cuenta_cobrar_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(documento_cuenta_cobrar_session $documento_cuenta_cobrar_session);	
		public function documento_cuenta_cobrarsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setdocumento_cuenta_cobrarFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
