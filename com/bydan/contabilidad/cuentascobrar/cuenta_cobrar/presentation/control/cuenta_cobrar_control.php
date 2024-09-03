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

namespace com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cuenta_cobrar/util/cuenta_cobrar_carga.php');
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_param_return;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\logic\cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\logic\cuenta_cobrar_logic_add;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\presentation\session\cuenta_cobrar_session;


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

use com\bydan\contabilidad\facturacion\factura\business\entity\factura;
use com\bydan\contabilidad\facturacion\factura\business\logic\factura_logic;
use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\business\entity\estado_cuentas_cobrar;
use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\business\logic\estado_cuentas_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\util\estado_cuentas_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\estado_cuentas_cobrar\util\estado_cuentas_cobrar_util;

//REL


use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\util\debito_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\debito_cuenta_cobrar\presentation\session\debito_cuenta_cobrar_session;

use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\util\pago_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\pago_cuenta_cobrar\presentation\session\pago_cuenta_cobrar_session;

use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\util\credito_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\credito_cuenta_cobrar\presentation\session\credito_cuenta_cobrar_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_cobrar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentascobrar/cuenta_cobrar/presentation/control/cuenta_cobrar_init_control.php');
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\presentation\control\cuenta_cobrar_init_control;

include_once('com/bydan/contabilidad/cuentascobrar/cuenta_cobrar/presentation/control/cuenta_cobrar_base_control.php');
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\presentation\control\cuenta_cobrar_base_control;

class cuenta_cobrar_control extends cuenta_cobrar_base_control {	
	
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
			else if($action=='registrarSesionParadebito_cuenta_cobrars' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuenta_cobrarActual=$this->getDataId();
				$this->registrarSesionParadebito_cuenta_cobrars($idcuenta_cobrarActual);
			}
			else if($action=='registrarSesionParapago_cuenta_cobrars' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuenta_cobrarActual=$this->getDataId();
				$this->registrarSesionParapago_cuenta_cobrars($idcuenta_cobrarActual);
			}
			else if($action=='registrarSesionParacredito_cuenta_cobrars' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuenta_cobrarActual=$this->getDataId();
				$this->registrarSesionParacredito_cuenta_cobrars($idcuenta_cobrarActual);
			} 
			
			
			else if($action=="FK_Idejercicio"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdejercicioParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idestado_cuentas_cobrar"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idestado_cuentas_cobrarParaProcesar();
			}
			else if($action=="FK_Idfactura"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdfacturaParaProcesar();
			}
			else if($action=="FK_Idperiodo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdperiodoParaProcesar();
			}
			else if($action=="FK_Idproveedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdproveedorParaProcesar();
			}
			else if($action=="FK_Idsucursal"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdsucursalParaProcesar();
			}
			else if($action=="FK_Idtermino_pago_cliente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtermino_pago_clienteParaProcesar();
			}
			else if($action=="FK_Idusuario"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdusuarioParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idcuenta_cobrarActual
			}
			else if($action=='abrirBusquedaParasucursal') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParasucursal();//$idcuenta_cobrarActual
			}
			else if($action=='abrirBusquedaParaejercicio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParaejercicio();//$idcuenta_cobrarActual
			}
			else if($action=='abrirBusquedaParaperiodo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParaperiodo();//$idcuenta_cobrarActual
			}
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$idcuenta_cobrarActual
			}
			else if($action=='abrirBusquedaParafactura') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParafactura();//$idcuenta_cobrarActual
			}
			else if($action=='abrirBusquedaParacliente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParacliente();//$idcuenta_cobrarActual
			}
			else if($action=='abrirBusquedaParatermino_pago_cliente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParatermino_pago_cliente();//$idcuenta_cobrarActual
			}
			else if($action=='abrirBusquedaParaestado_cuentas_cobrar') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParaestado_cuentas_cobrar();//$idcuenta_cobrarActual
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
					
					$cuenta_cobrarController = new cuenta_cobrar_control();
					
					$cuenta_cobrarController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($cuenta_cobrarController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$cuenta_cobrarController = new cuenta_cobrar_control();
						$cuenta_cobrarController = $this;
						
						$jsonResponse = json_encode($cuenta_cobrarController->cuenta_cobrars);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->cuenta_cobrarReturnGeneral==null) {
					$this->cuenta_cobrarReturnGeneral=new cuenta_cobrar_param_return();
				}
				
				echo($this->cuenta_cobrarReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$cuenta_cobrarController=new cuenta_cobrar_control();
		
		$cuenta_cobrarController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$cuenta_cobrarController->usuarioActual=new usuario();
		
		$cuenta_cobrarController->usuarioActual->setId($this->usuarioActual->getId());
		$cuenta_cobrarController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$cuenta_cobrarController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$cuenta_cobrarController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$cuenta_cobrarController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$cuenta_cobrarController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$cuenta_cobrarController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$cuenta_cobrarController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $cuenta_cobrarController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadcuenta_cobrar= $this->getDataGeneralString('strTypeOnLoadcuenta_cobrar');
		$strTipoPaginaAuxiliarcuenta_cobrar= $this->getDataGeneralString('strTipoPaginaAuxiliarcuenta_cobrar');
		$strTipoUsuarioAuxiliarcuenta_cobrar= $this->getDataGeneralString('strTipoUsuarioAuxiliarcuenta_cobrar');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadcuenta_cobrar,$strTipoPaginaAuxiliarcuenta_cobrar,$strTipoUsuarioAuxiliarcuenta_cobrar,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadcuenta_cobrar!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('cuenta_cobrar','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_cobrar_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcuenta_cobrar,$this->strTipoUsuarioAuxiliarcuenta_cobrar,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_cobrar_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcuenta_cobrar,$this->strTipoUsuarioAuxiliarcuenta_cobrar,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->cuenta_cobrarReturnGeneral=new cuenta_cobrar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_cobrarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_cobrarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_cobrarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_cobrarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_cobrarReturnGeneral);
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
		$this->cuenta_cobrarReturnGeneral=new cuenta_cobrar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_cobrarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_cobrarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_cobrarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_cobrarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_cobrarReturnGeneral);
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
		$this->cuenta_cobrarReturnGeneral=new cuenta_cobrar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_cobrarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_cobrarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_cobrarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_cobrarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_cobrarReturnGeneral);
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
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
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
			
			
			$this->cuenta_cobrarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->cuenta_cobrarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_cobrarReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->cuenta_cobrarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->cuenta_cobrarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_cobrarReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->cuenta_cobrarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->cuenta_cobrarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->cuenta_cobrarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_cobrarReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->cuenta_cobrarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_cobrarReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->cuenta_cobrarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->cuenta_cobrarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->cuenta_cobrarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_cobrarReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->cuenta_cobrarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_cobrarReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
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
		
		$this->cuenta_cobrarLogic=new cuenta_cobrar_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->cuenta_cobrar=new cuenta_cobrar();
		
		$this->strTypeOnLoadcuenta_cobrar='onload';
		$this->strTipoPaginaAuxiliarcuenta_cobrar='none';
		$this->strTipoUsuarioAuxiliarcuenta_cobrar='none';	

		$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
		
		$this->cuenta_cobrarModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_cobrarControllerAdditional=new cuenta_cobrar_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(cuenta_cobrar_session $cuenta_cobrar_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($cuenta_cobrar_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadcuenta_cobrar='',?string $strTipoPaginaAuxiliarcuenta_cobrar='',?string $strTipoUsuarioAuxiliarcuenta_cobrar='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadcuenta_cobrar=$strTypeOnLoadcuenta_cobrar;
			$this->strTipoPaginaAuxiliarcuenta_cobrar=$strTipoPaginaAuxiliarcuenta_cobrar;
			$this->strTipoUsuarioAuxiliarcuenta_cobrar=$strTipoUsuarioAuxiliarcuenta_cobrar;
	
			if($strTipoUsuarioAuxiliarcuenta_cobrar=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->cuenta_cobrar=new cuenta_cobrar();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Cuenta Cobrars';
			
			
			$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));
							
			if($cuenta_cobrar_session==null) {
				$cuenta_cobrar_session=new cuenta_cobrar_session();
				
				/*$this->Session->write('cuenta_cobrar_session',$cuenta_cobrar_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($cuenta_cobrar_session->strFuncionJsPadre!=null && $cuenta_cobrar_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$cuenta_cobrar_session->strFuncionJsPadre;
				
				$cuenta_cobrar_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($cuenta_cobrar_session);
			
			if($strTypeOnLoadcuenta_cobrar!=null && $strTypeOnLoadcuenta_cobrar=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$cuenta_cobrar_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$cuenta_cobrar_session->setPaginaPopupVariables(true);
				}
				
				if($cuenta_cobrar_session->intNumeroPaginacion==cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,cuenta_cobrar_util::$STR_SESSION_NAME,'cuentascobrar');																
			
			} else if($strTypeOnLoadcuenta_cobrar!=null && $strTypeOnLoadcuenta_cobrar=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$cuenta_cobrar_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;*/
				
				if($cuenta_cobrar_session->intNumeroPaginacion==cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarcuenta_cobrar!=null && $strTipoPaginaAuxiliarcuenta_cobrar=='none') {
				/*$cuenta_cobrar_session->strStyleDivHeader='display:table-row';*/
				
				/*$cuenta_cobrar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarcuenta_cobrar!=null && $strTipoPaginaAuxiliarcuenta_cobrar=='iframe') {
					/*
					$cuenta_cobrar_session->strStyleDivArbol='display:none';
					$cuenta_cobrar_session->strStyleDivHeader='display:none';
					$cuenta_cobrar_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$cuenta_cobrar_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->cuenta_cobrarClase=new cuenta_cobrar();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=cuenta_cobrar_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(cuenta_cobrar_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->cuenta_cobrarLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->cuenta_cobrarLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$cuentacobrardetalleLogic=new cuenta_cobrar_detalle_logic();
			//$cuentacorrientedetalleLogic=new cuenta_corriente_detalle_logic();
			//$debitocuentacobrarLogic=new debito_cuenta_cobrar_logic();
			//$pagocuentacobrarLogic=new pago_cuenta_cobrar_logic();
			//$creditocuentacobrarLogic=new credito_cuenta_cobrar_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->cuenta_cobrarLogic=new cuenta_cobrar_logic();*/
			
			
			$this->cuenta_cobrarsModel=null;
			/*new ListDataModel();*/
			
			/*$this->cuenta_cobrarsModel.setWrappedData(cuenta_cobrarLogic->getcuenta_cobrars());*/
						
			$this->cuenta_cobrars= array();
			$this->cuenta_cobrarsEliminados=array();
			$this->cuenta_cobrarsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= cuenta_cobrar_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= cuenta_cobrar_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->cuenta_cobrar= new cuenta_cobrar();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idejercicio='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idestado_cuentas_cobrar='display:table-row';
			$this->strVisibleFK_Idfactura='display:table-row';
			$this->strVisibleFK_Idperiodo='display:table-row';
			$this->strVisibleFK_Idproveedor='display:table-row';
			$this->strVisibleFK_Idsucursal='display:table-row';
			$this->strVisibleFK_Idtermino_pago_cliente='display:table-row';
			$this->strVisibleFK_Idusuario='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarcuenta_cobrar!=null && $strTipoUsuarioAuxiliarcuenta_cobrar!='none' && $strTipoUsuarioAuxiliarcuenta_cobrar!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcuenta_cobrar);
																
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
				if($strTipoUsuarioAuxiliarcuenta_cobrar!=null && $strTipoUsuarioAuxiliarcuenta_cobrar!='none' && $strTipoUsuarioAuxiliarcuenta_cobrar!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcuenta_cobrar);
																
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
				if($strTipoUsuarioAuxiliarcuenta_cobrar==null || $strTipoUsuarioAuxiliarcuenta_cobrar=='none' || $strTipoUsuarioAuxiliarcuenta_cobrar=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarcuenta_cobrar,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_cobrar_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_cobrar_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina cuenta_cobrar');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($cuenta_cobrar_session);
			
			$this->getSetBusquedasSesionConfig($cuenta_cobrar_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportecuenta_cobrars($this->strAccionBusqueda,$this->cuenta_cobrarLogic->getcuenta_cobrars());*/
				} else if($this->strGenerarReporte=='Html')	{
					$cuenta_cobrar_session->strServletGenerarHtmlReporte='cuenta_cobrarServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(cuenta_cobrar_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($cuenta_cobrar_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarcuenta_cobrar!=null && $strTipoUsuarioAuxiliarcuenta_cobrar=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($cuenta_cobrar_session);
			}
								
			$this->set(cuenta_cobrar_util::$STR_SESSION_NAME, $cuenta_cobrar_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($cuenta_cobrar_session);
			
			/*
			$this->cuenta_cobrar->recursive = 0;
			
			$this->cuenta_cobrars=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('cuenta_cobrars', $this->cuenta_cobrars);
			
			$this->set(cuenta_cobrar_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->cuenta_cobrarActual =$this->cuenta_cobrarClase;
			
			/*$this->cuenta_cobrarActual =$this->migrarModelcuenta_cobrar($this->cuenta_cobrarClase);*/
			
			$this->returnHtml(false);
			
			$this->set(cuenta_cobrar_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=cuenta_cobrar_util::$STR_NOMBRE_OPCION;
				
			if(cuenta_cobrar_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=cuenta_cobrar_util::$STR_MODULO_OPCION.cuenta_cobrar_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(cuenta_cobrar_util::$STR_SESSION_NAME,serialize($cuenta_cobrar_session));
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
			/*$cuenta_cobrarClase= (cuenta_cobrar) cuenta_cobrarsModel.getRowData();*/
			
			$this->cuenta_cobrarClase->setId($this->cuenta_cobrar->getId());	
			$this->cuenta_cobrarClase->setVersionRow($this->cuenta_cobrar->getVersionRow());	
			$this->cuenta_cobrarClase->setVersionRow($this->cuenta_cobrar->getVersionRow());	
			$this->cuenta_cobrarClase->setid_empresa($this->cuenta_cobrar->getid_empresa());	
			$this->cuenta_cobrarClase->setid_sucursal($this->cuenta_cobrar->getid_sucursal());	
			$this->cuenta_cobrarClase->setid_ejercicio($this->cuenta_cobrar->getid_ejercicio());	
			$this->cuenta_cobrarClase->setid_periodo($this->cuenta_cobrar->getid_periodo());	
			$this->cuenta_cobrarClase->setid_usuario($this->cuenta_cobrar->getid_usuario());	
			$this->cuenta_cobrarClase->setid_factura($this->cuenta_cobrar->getid_factura());	
			$this->cuenta_cobrarClase->setid_cliente($this->cuenta_cobrar->getid_cliente());	
			$this->cuenta_cobrarClase->setnumero($this->cuenta_cobrar->getnumero());	
			$this->cuenta_cobrarClase->setfecha_emision($this->cuenta_cobrar->getfecha_emision());	
			$this->cuenta_cobrarClase->setfecha_vence($this->cuenta_cobrar->getfecha_vence());	
			$this->cuenta_cobrarClase->setfecha_ultimo_movimiento($this->cuenta_cobrar->getfecha_ultimo_movimiento());	
			$this->cuenta_cobrarClase->setid_termino_pago_cliente($this->cuenta_cobrar->getid_termino_pago_cliente());	
			$this->cuenta_cobrarClase->setmonto($this->cuenta_cobrar->getmonto());	
			$this->cuenta_cobrarClase->setsaldo($this->cuenta_cobrar->getsaldo());	
			$this->cuenta_cobrarClase->setporcentaje($this->cuenta_cobrar->getporcentaje());	
			$this->cuenta_cobrarClase->setdescripcion($this->cuenta_cobrar->getdescripcion());	
			$this->cuenta_cobrarClase->setid_estado_cuentas_cobrar($this->cuenta_cobrar->getid_estado_cuentas_cobrar());	
			$this->cuenta_cobrarClase->setreferencia($this->cuenta_cobrar->getreferencia());	
		
			/*$this->Session->write('cuenta_cobrarVersionRowActual', cuenta_cobrar.getVersionRow());*/
			
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
			
			$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));
						
			if($cuenta_cobrar_session==null) {
				$cuenta_cobrar_session=new cuenta_cobrar_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('cuenta_cobrar', $this->cuenta_cobrar->read(null, $id));
	
			
			$this->cuenta_cobrar->recursive = 0;
			
			$this->cuenta_cobrars=$this->paginate();
			
			$this->set('cuenta_cobrars', $this->cuenta_cobrars);
	
			if (empty($this->data)) {
				$this->data = $this->cuenta_cobrar->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->cuenta_cobrarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cuenta_cobrarClase);
			
			$this->cuenta_cobrarActual=$this->cuenta_cobrarClase;
			
			/*$this->cuenta_cobrarActual =$this->migrarModelcuenta_cobrar($this->cuenta_cobrarClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cuenta_cobrarLogic->getcuenta_cobrars(),$this->cuenta_cobrarActual);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_cobrarReturnGeneral);
			
			//$this->cuenta_cobrarReturnGeneral=$this->cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cuenta_cobrarLogic->getcuenta_cobrars(),$this->cuenta_cobrarActual,$this->cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));
						
			if($cuenta_cobrar_session==null) {
				$cuenta_cobrar_session=new cuenta_cobrar_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevocuenta_cobrar', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->cuenta_cobrarClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cuenta_cobrarClase);
			
			$this->cuenta_cobrarActual =$this->cuenta_cobrarClase;
			
			/*$this->cuenta_cobrarActual =$this->migrarModelcuenta_cobrar($this->cuenta_cobrarClase);*/
			
			$this->setcuenta_cobrarFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cuenta_cobrarLogic->getcuenta_cobrars(),$this->cuenta_cobrar);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_cobrarReturnGeneral);
			
			//this->cuenta_cobrarReturnGeneral=$this->cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cuenta_cobrarLogic->getcuenta_cobrars(),$this->cuenta_cobrar,$this->cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->cuenta_cobrarReturnGeneral->getcuenta_cobrar()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idsucursalDefaultFK!=null && $this->idsucursalDefaultFK > -1) {
				$this->cuenta_cobrarReturnGeneral->getcuenta_cobrar()->setid_sucursal($this->idsucursalDefaultFK);
			}

			if($this->idejercicioDefaultFK!=null && $this->idejercicioDefaultFK > -1) {
				$this->cuenta_cobrarReturnGeneral->getcuenta_cobrar()->setid_ejercicio($this->idejercicioDefaultFK);
			}

			if($this->idperiodoDefaultFK!=null && $this->idperiodoDefaultFK > -1) {
				$this->cuenta_cobrarReturnGeneral->getcuenta_cobrar()->setid_periodo($this->idperiodoDefaultFK);
			}

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->cuenta_cobrarReturnGeneral->getcuenta_cobrar()->setid_usuario($this->idusuarioDefaultFK);
			}

			if($this->idfacturaDefaultFK!=null && $this->idfacturaDefaultFK > -1) {
				$this->cuenta_cobrarReturnGeneral->getcuenta_cobrar()->setid_factura($this->idfacturaDefaultFK);
			}

			if($this->idclienteDefaultFK!=null && $this->idclienteDefaultFK > -1) {
				$this->cuenta_cobrarReturnGeneral->getcuenta_cobrar()->setid_cliente($this->idclienteDefaultFK);
			}

			if($this->idtermino_pago_clienteDefaultFK!=null && $this->idtermino_pago_clienteDefaultFK > -1) {
				$this->cuenta_cobrarReturnGeneral->getcuenta_cobrar()->setid_termino_pago_cliente($this->idtermino_pago_clienteDefaultFK);
			}

			if($this->idestado_cuentas_cobrarDefaultFK!=null && $this->idestado_cuentas_cobrarDefaultFK > -1) {
				$this->cuenta_cobrarReturnGeneral->getcuenta_cobrar()->setid_estado_cuentas_cobrar($this->idestado_cuentas_cobrarDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->cuenta_cobrarReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->cuenta_cobrarReturnGeneral->getcuenta_cobrar(),$this->cuenta_cobrarActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeycuenta_cobrar($this->cuenta_cobrarReturnGeneral->getcuenta_cobrar());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariocuenta_cobrar($this->cuenta_cobrarReturnGeneral->getcuenta_cobrar());*/
			}
			
			if($this->cuenta_cobrarReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_cobrarReturnGeneral->getcuenta_cobrar(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualcuenta_cobrar($this->cuenta_cobrar,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->cuenta_cobrarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->cuenta_cobrarsAuxiliar=array();
			}
			
			if(count($this->cuenta_cobrarsAuxiliar)==2) {
				$cuenta_cobrarOrigen=$this->cuenta_cobrarsAuxiliar[0];
				$cuenta_cobrarDestino=$this->cuenta_cobrarsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($cuenta_cobrarOrigen,$cuenta_cobrarDestino,true,false,false);
				
				$this->actualizarLista($cuenta_cobrarDestino,$this->cuenta_cobrars);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->cuenta_cobrarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cuenta_cobrarsAuxiliar=array();
			}
			
			if(count($this->cuenta_cobrarsAuxiliar) > 0) {
				foreach ($this->cuenta_cobrarsAuxiliar as $cuenta_cobrarSeleccionado) {
					$this->cuenta_cobrar=new cuenta_cobrar();
					
					$this->setCopiarVariablesObjetos($cuenta_cobrarSeleccionado,$this->cuenta_cobrar,true,true,false);
						
					$this->cuenta_cobrars[]=$this->cuenta_cobrar;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->cuenta_cobrarsEliminados as $cuenta_cobrarEliminado) {
				$this->cuenta_cobrarLogic->cuenta_cobrars[]=$cuenta_cobrarEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->cuenta_cobrar=new cuenta_cobrar();
							
				$this->cuenta_cobrars[]=$this->cuenta_cobrar;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
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
		
		$cuenta_cobrarActual=new cuenta_cobrar();
		
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
				
				$cuenta_cobrarActual=$this->cuenta_cobrars[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_factura((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setfecha_ultimo_movimiento(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_termino_pago_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setsaldo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setporcentaje((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setid_estado_cuentas_cobrar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $cuenta_cobrarActual->setreferencia($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->cuenta_cobrarsAuxiliar=array();		 
		/*$this->cuenta_cobrarsEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->cuenta_cobrarsAuxiliar=array();
		}
			
		if(count($this->cuenta_cobrarsAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->cuenta_cobrarsAuxiliar as $cuenta_cobrarAuxLocal) {				
				
				foreach($this->cuenta_cobrars as $cuenta_cobrarLocal) {
					if($cuenta_cobrarLocal->getId()==$cuenta_cobrarAuxLocal->getId()) {
						$cuenta_cobrarLocal->setIsDeleted(true);
						
						/*$this->cuenta_cobrarsEliminados[]=$cuenta_cobrarLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->cuenta_cobrarLogic->setcuenta_cobrars($this->cuenta_cobrars);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
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
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadcuenta_cobrar='',string $strTipoPaginaAuxiliarcuenta_cobrar='',string $strTipoUsuarioAuxiliarcuenta_cobrar='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadcuenta_cobrar,$strTipoPaginaAuxiliarcuenta_cobrar,$strTipoUsuarioAuxiliarcuenta_cobrar,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->cuenta_cobrars) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=cuenta_cobrar_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=cuenta_cobrar_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=cuenta_cobrar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));
						
			if($cuenta_cobrar_session==null) {
				$cuenta_cobrar_session=new cuenta_cobrar_session();
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
					/*$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;*/
					
					if($cuenta_cobrar_session->intNumeroPaginacion==cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$cuenta_cobrar_session->intNumeroPaginacion;
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
			
			$this->cuenta_cobrarsEliminados=array();
			
			/*$this->cuenta_cobrarLogic->setConnexion($connexion);*/
			
			$this->cuenta_cobrarLogic->setIsConDeep(true);
			
			$this->cuenta_cobrarLogic->getcuenta_cobrarDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('factura');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('termino_pago_cliente');$classes[]=$class;
			$class=new Classe('estado_cuentas_cobrar');$classes[]=$class;
			
			$this->cuenta_cobrarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_cobrarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->cuenta_cobrarLogic->getcuenta_cobrars()==null|| count($this->cuenta_cobrarLogic->getcuenta_cobrars())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cuenta_cobrars=$this->cuenta_cobrarLogic->getcuenta_cobrars();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_cobrarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->cuenta_cobrarsReporte=$this->cuenta_cobrarLogic->getcuenta_cobrars();
									
						/*$this->generarReportes('Todos',$this->cuenta_cobrarLogic->getcuenta_cobrars());*/
					
						$this->cuenta_cobrarLogic->setcuenta_cobrars($this->cuenta_cobrars);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_cobrarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->cuenta_cobrarLogic->getcuenta_cobrars()==null|| count($this->cuenta_cobrarLogic->getcuenta_cobrars())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cuenta_cobrars=$this->cuenta_cobrarLogic->getcuenta_cobrars();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_cobrarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->cuenta_cobrarsReporte=$this->cuenta_cobrarLogic->getcuenta_cobrars();
									
						/*$this->generarReportes('Todos',$this->cuenta_cobrarLogic->getcuenta_cobrars());*/
					
						$this->cuenta_cobrarLogic->setcuenta_cobrars($this->cuenta_cobrars);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idcuenta_cobrar=0;*/
				
				if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK!=null && $cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK==true) {
					if($cuenta_cobrar_session->bigIdActualFK!=null && $cuenta_cobrar_session->bigIdActualFK!=0)	{
						$this->idcuenta_cobrar=$cuenta_cobrar_session->bigIdActualFK;	
					}
					
					$cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK=false;
					
					$cuenta_cobrar_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idcuenta_cobrar=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idcuenta_cobrar=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_cobrarLogic->getEntity($this->idcuenta_cobrar);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*cuenta_cobrarLogicAdditional::getDetalleIndicePorId($idcuenta_cobrar);*/

				
				if($this->cuenta_cobrarLogic->getcuenta_cobrar()!=null) {
					$this->cuenta_cobrarLogic->setcuenta_cobrars(array());
					$this->cuenta_cobrarLogic->cuenta_cobrars[]=$this->cuenta_cobrarLogic->getcuenta_cobrar();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idejercicio')
			{

				if($cuenta_cobrar_session->bigidejercicioActual!=null && $cuenta_cobrar_session->bigidejercicioActual!=0)
				{
					$this->id_ejercicioFK_Idejercicio=$cuenta_cobrar_session->bigidejercicioActual;
					$cuenta_cobrar_session->bigidejercicioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idejercicio($finalQueryPaginacion,$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idejercicio($this->id_ejercicioFK_Idejercicio);


					if($this->cuenta_cobrarLogic->getcuenta_cobrars()==null || count($this->cuenta_cobrarLogic->getcuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_cobrars=$this->cuenta_cobrarLogic->getcuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idejercicio('',$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_cobrarsReporte=$this->cuenta_cobrarLogic->getcuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_cobrars("FK_Idejercicio",$this->cuenta_cobrarLogic->getcuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_cobrarLogic->setcuenta_cobrars($cuenta_cobrars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($cuenta_cobrar_session->bigidempresaActual!=null && $cuenta_cobrar_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$cuenta_cobrar_session->bigidempresaActual;
					$cuenta_cobrar_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->cuenta_cobrarLogic->getcuenta_cobrars()==null || count($this->cuenta_cobrarLogic->getcuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_cobrars=$this->cuenta_cobrarLogic->getcuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_cobrarsReporte=$this->cuenta_cobrarLogic->getcuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_cobrars("FK_Idempresa",$this->cuenta_cobrarLogic->getcuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_cobrarLogic->setcuenta_cobrars($cuenta_cobrars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idestado_cuentas_cobrar')
			{

				if($cuenta_cobrar_session->bigidestado_cuentas_cobrarActual!=null && $cuenta_cobrar_session->bigidestado_cuentas_cobrarActual!=0)
				{
					$this->id_estado_cuentas_cobrarFK_Idestado_cuentas_cobrar=$cuenta_cobrar_session->bigidestado_cuentas_cobrarActual;
					$cuenta_cobrar_session->bigidestado_cuentas_cobrarActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idestado_cuentas_cobrar($finalQueryPaginacion,$this->pagination,$this->id_estado_cuentas_cobrarFK_Idestado_cuentas_cobrar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idestado_cuentas_cobrar($this->id_estado_cuentas_cobrarFK_Idestado_cuentas_cobrar);


					if($this->cuenta_cobrarLogic->getcuenta_cobrars()==null || count($this->cuenta_cobrarLogic->getcuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_cobrars=$this->cuenta_cobrarLogic->getcuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idestado_cuentas_cobrar('',$this->pagination,$this->id_estado_cuentas_cobrarFK_Idestado_cuentas_cobrar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_cobrarsReporte=$this->cuenta_cobrarLogic->getcuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_cobrars("FK_Idestado_cuentas_cobrar",$this->cuenta_cobrarLogic->getcuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_cobrarLogic->setcuenta_cobrars($cuenta_cobrars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idfactura')
			{

				if($cuenta_cobrar_session->bigidfacturaActual!=null && $cuenta_cobrar_session->bigidfacturaActual!=0)
				{
					$this->id_facturaFK_Idfactura=$cuenta_cobrar_session->bigidfacturaActual;
					$cuenta_cobrar_session->bigidfacturaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idfactura($finalQueryPaginacion,$this->pagination,$this->id_facturaFK_Idfactura);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idfactura($this->id_facturaFK_Idfactura);


					if($this->cuenta_cobrarLogic->getcuenta_cobrars()==null || count($this->cuenta_cobrarLogic->getcuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_cobrars=$this->cuenta_cobrarLogic->getcuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idfactura('',$this->pagination,$this->id_facturaFK_Idfactura);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_cobrarsReporte=$this->cuenta_cobrarLogic->getcuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_cobrars("FK_Idfactura",$this->cuenta_cobrarLogic->getcuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_cobrarLogic->setcuenta_cobrars($cuenta_cobrars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperiodo')
			{

				if($cuenta_cobrar_session->bigidperiodoActual!=null && $cuenta_cobrar_session->bigidperiodoActual!=0)
				{
					$this->id_periodoFK_Idperiodo=$cuenta_cobrar_session->bigidperiodoActual;
					$cuenta_cobrar_session->bigidperiodoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idperiodo($finalQueryPaginacion,$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idperiodo($this->id_periodoFK_Idperiodo);


					if($this->cuenta_cobrarLogic->getcuenta_cobrars()==null || count($this->cuenta_cobrarLogic->getcuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_cobrars=$this->cuenta_cobrarLogic->getcuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idperiodo('',$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_cobrarsReporte=$this->cuenta_cobrarLogic->getcuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_cobrars("FK_Idperiodo",$this->cuenta_cobrarLogic->getcuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_cobrarLogic->setcuenta_cobrars($cuenta_cobrars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idproveedor')
			{

				if($cuenta_cobrar_session->bigidclienteActual!=null && $cuenta_cobrar_session->bigidclienteActual!=0)
				{
					$this->id_clienteFK_Idproveedor=$cuenta_cobrar_session->bigidclienteActual;
					$cuenta_cobrar_session->bigidclienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idproveedor($finalQueryPaginacion,$this->pagination,$this->id_clienteFK_Idproveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idproveedor($this->id_clienteFK_Idproveedor);


					if($this->cuenta_cobrarLogic->getcuenta_cobrars()==null || count($this->cuenta_cobrarLogic->getcuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_cobrars=$this->cuenta_cobrarLogic->getcuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idproveedor('',$this->pagination,$this->id_clienteFK_Idproveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_cobrarsReporte=$this->cuenta_cobrarLogic->getcuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_cobrars("FK_Idproveedor",$this->cuenta_cobrarLogic->getcuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_cobrarLogic->setcuenta_cobrars($cuenta_cobrars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsucursal')
			{

				if($cuenta_cobrar_session->bigidsucursalActual!=null && $cuenta_cobrar_session->bigidsucursalActual!=0)
				{
					$this->id_sucursalFK_Idsucursal=$cuenta_cobrar_session->bigidsucursalActual;
					$cuenta_cobrar_session->bigidsucursalActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idsucursal($finalQueryPaginacion,$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idsucursal($this->id_sucursalFK_Idsucursal);


					if($this->cuenta_cobrarLogic->getcuenta_cobrars()==null || count($this->cuenta_cobrarLogic->getcuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_cobrars=$this->cuenta_cobrarLogic->getcuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idsucursal('',$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_cobrarsReporte=$this->cuenta_cobrarLogic->getcuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_cobrars("FK_Idsucursal",$this->cuenta_cobrarLogic->getcuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_cobrarLogic->setcuenta_cobrars($cuenta_cobrars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtermino_pago_cliente')
			{

				if($cuenta_cobrar_session->bigidtermino_pago_clienteActual!=null && $cuenta_cobrar_session->bigidtermino_pago_clienteActual!=0)
				{
					$this->id_termino_pago_clienteFK_Idtermino_pago_cliente=$cuenta_cobrar_session->bigidtermino_pago_clienteActual;
					$cuenta_cobrar_session->bigidtermino_pago_clienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idtermino_pago_cliente($finalQueryPaginacion,$this->pagination,$this->id_termino_pago_clienteFK_Idtermino_pago_cliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idtermino_pago_cliente($this->id_termino_pago_clienteFK_Idtermino_pago_cliente);


					if($this->cuenta_cobrarLogic->getcuenta_cobrars()==null || count($this->cuenta_cobrarLogic->getcuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_cobrars=$this->cuenta_cobrarLogic->getcuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idtermino_pago_cliente('',$this->pagination,$this->id_termino_pago_clienteFK_Idtermino_pago_cliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_cobrarsReporte=$this->cuenta_cobrarLogic->getcuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_cobrars("FK_Idtermino_pago_cliente",$this->cuenta_cobrarLogic->getcuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_cobrarLogic->setcuenta_cobrars($cuenta_cobrars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($cuenta_cobrar_session->bigidusuarioActual!=null && $cuenta_cobrar_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$cuenta_cobrar_session->bigidusuarioActual;
					$cuenta_cobrar_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->cuenta_cobrarLogic->getcuenta_cobrars()==null || count($this->cuenta_cobrarLogic->getcuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_cobrars=$this->cuenta_cobrarLogic->getcuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrarLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_cobrarsReporte=$this->cuenta_cobrarLogic->getcuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_cobrars("FK_Idusuario",$this->cuenta_cobrarLogic->getcuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_cobrarLogic->setcuenta_cobrars($cuenta_cobrars);
					}
				//}

			} 
		
		$cuenta_cobrar_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cuenta_cobrar_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->cuenta_cobrarLogic->loadForeignsKeysDescription();*/
		
		$this->cuenta_cobrars=$this->cuenta_cobrarLogic->getcuenta_cobrars();
		
		if($this->cuenta_cobrarsEliminados==null) {
			$this->cuenta_cobrarsEliminados=array();
		}
		
		$this->Session->write(cuenta_cobrar_util::$STR_SESSION_NAME.'Lista',serialize($this->cuenta_cobrars));
		$this->Session->write(cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cuenta_cobrarsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(cuenta_cobrar_util::$STR_SESSION_NAME,serialize($cuenta_cobrar_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idcuenta_cobrar=$idGeneral;
			
			$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
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
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if(count($this->cuenta_cobrars) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
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
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ejercicioFK_Idejercicio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idejercicio','cmbid_ejercicio');

			$this->strAccionBusqueda='FK_Idejercicio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
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
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idestado_cuentas_cobrarParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_estado_cuentas_cobrarFK_Idestado_cuentas_cobrar=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idestado_cuentas_cobrar','cmbid_estado_cuentas_cobrar');

			$this->strAccionBusqueda='FK_Idestado_cuentas_cobrar';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdfacturaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_facturaFK_Idfactura=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idfactura','cmbid_factura');

			$this->strAccionBusqueda='FK_Idfactura';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
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
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_periodoFK_Idperiodo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperiodo','cmbid_periodo');

			$this->strAccionBusqueda='FK_Idperiodo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdproveedorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_clienteFK_Idproveedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproveedor','cmbid_cliente');

			$this->strAccionBusqueda='FK_Idproveedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
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
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sucursalFK_Idsucursal=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsucursal','cmbid_sucursal');

			$this->strAccionBusqueda='FK_Idsucursal';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtermino_pago_clienteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_termino_pago_clienteFK_Idtermino_pago_cliente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtermino_pago_cliente','cmbid_termino_pago_cliente');

			$this->strAccionBusqueda='FK_Idtermino_pago_cliente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
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
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idejercicio($strFinalQuery,$id_ejercicio)
	{
		try
		{

			$this->cuenta_cobrarLogic->getsFK_Idejercicio($strFinalQuery,new Pagination(),$id_ejercicio);
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

			$this->cuenta_cobrarLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idestado_cuentas_cobrar($strFinalQuery,$id_estado_cuentas_cobrar)
	{
		try
		{

			$this->cuenta_cobrarLogic->getsFK_Idestado_cuentas_cobrar($strFinalQuery,new Pagination(),$id_estado_cuentas_cobrar);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idfactura($strFinalQuery,$id_factura)
	{
		try
		{

			$this->cuenta_cobrarLogic->getsFK_Idfactura($strFinalQuery,new Pagination(),$id_factura);
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

			$this->cuenta_cobrarLogic->getsFK_Idperiodo($strFinalQuery,new Pagination(),$id_periodo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idproveedor($strFinalQuery,$id_cliente)
	{
		try
		{

			$this->cuenta_cobrarLogic->getsFK_Idproveedor($strFinalQuery,new Pagination(),$id_cliente);
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

			$this->cuenta_cobrarLogic->getsFK_Idsucursal($strFinalQuery,new Pagination(),$id_sucursal);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtermino_pago_cliente($strFinalQuery,$id_termino_pago_cliente)
	{
		try
		{

			$this->cuenta_cobrarLogic->getsFK_Idtermino_pago_cliente($strFinalQuery,new Pagination(),$id_termino_pago_cliente);
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

			$this->cuenta_cobrarLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
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
			
			
			$cuenta_cobrarForeignKey=new cuenta_cobrar_param_return(); //cuenta_cobrarForeignKey();
			
			$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));
						
			if($cuenta_cobrar_session==null) {
				$cuenta_cobrar_session=new cuenta_cobrar_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$cuenta_cobrarForeignKey=$this->cuenta_cobrarLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$cuenta_cobrar_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$cuenta_cobrarForeignKey->empresasFK;
				$this->idempresaDefaultFK=$cuenta_cobrarForeignKey->idempresaDefaultFK;
			}

			if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$this->strRecargarFkTipos,',')) {
				$this->sucursalsFK=$cuenta_cobrarForeignKey->sucursalsFK;
				$this->idsucursalDefaultFK=$cuenta_cobrarForeignKey->idsucursalDefaultFK;
			}

			if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionsucursal) {
				$this->setVisibleBusquedasParasucursal(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$this->strRecargarFkTipos,',')) {
				$this->ejerciciosFK=$cuenta_cobrarForeignKey->ejerciciosFK;
				$this->idejercicioDefaultFK=$cuenta_cobrarForeignKey->idejercicioDefaultFK;
			}

			if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionejercicio) {
				$this->setVisibleBusquedasParaejercicio(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$this->strRecargarFkTipos,',')) {
				$this->periodosFK=$cuenta_cobrarForeignKey->periodosFK;
				$this->idperiodoDefaultFK=$cuenta_cobrarForeignKey->idperiodoDefaultFK;
			}

			if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionperiodo) {
				$this->setVisibleBusquedasParaperiodo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$cuenta_cobrarForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$cuenta_cobrarForeignKey->idusuarioDefaultFK;
			}

			if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionusuario) {
				$this->setVisibleBusquedasParausuario(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_factura',$this->strRecargarFkTipos,',')) {
				$this->facturasFK=$cuenta_cobrarForeignKey->facturasFK;
				$this->idfacturaDefaultFK=$cuenta_cobrarForeignKey->idfacturaDefaultFK;
			}

			if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionfactura) {
				$this->setVisibleBusquedasParafactura(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$this->strRecargarFkTipos,',')) {
				$this->clientesFK=$cuenta_cobrarForeignKey->clientesFK;
				$this->idclienteDefaultFK=$cuenta_cobrarForeignKey->idclienteDefaultFK;
			}

			if($cuenta_cobrar_session->bitBusquedaDesdeFKSesioncliente) {
				$this->setVisibleBusquedasParacliente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_cliente',$this->strRecargarFkTipos,',')) {
				$this->termino_pago_clientesFK=$cuenta_cobrarForeignKey->termino_pago_clientesFK;
				$this->idtermino_pago_clienteDefaultFK=$cuenta_cobrarForeignKey->idtermino_pago_clienteDefaultFK;
			}

			if($cuenta_cobrar_session->bitBusquedaDesdeFKSesiontermino_pago_cliente) {
				$this->setVisibleBusquedasParatermino_pago_cliente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado_cuentas_cobrar',$this->strRecargarFkTipos,',')) {
				$this->estado_cuentas_cobrarsFK=$cuenta_cobrarForeignKey->estado_cuentas_cobrarsFK;
				$this->idestado_cuentas_cobrarDefaultFK=$cuenta_cobrarForeignKey->idestado_cuentas_cobrarDefaultFK;
			}

			if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionestado_cuentas_cobrar) {
				$this->setVisibleBusquedasParaestado_cuentas_cobrar(true);
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
	
	function cargarCombosFKFromReturnGeneral($cuenta_cobrarReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$cuenta_cobrarReturnGeneral->strRecargarFkTipos;
			
			


			if($cuenta_cobrarReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$cuenta_cobrarReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$cuenta_cobrarReturnGeneral->idempresaDefaultFK;
			}


			if($cuenta_cobrarReturnGeneral->con_sucursalsFK==true) {
				$this->sucursalsFK=$cuenta_cobrarReturnGeneral->sucursalsFK;
				$this->idsucursalDefaultFK=$cuenta_cobrarReturnGeneral->idsucursalDefaultFK;
			}


			if($cuenta_cobrarReturnGeneral->con_ejerciciosFK==true) {
				$this->ejerciciosFK=$cuenta_cobrarReturnGeneral->ejerciciosFK;
				$this->idejercicioDefaultFK=$cuenta_cobrarReturnGeneral->idejercicioDefaultFK;
			}


			if($cuenta_cobrarReturnGeneral->con_periodosFK==true) {
				$this->periodosFK=$cuenta_cobrarReturnGeneral->periodosFK;
				$this->idperiodoDefaultFK=$cuenta_cobrarReturnGeneral->idperiodoDefaultFK;
			}


			if($cuenta_cobrarReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$cuenta_cobrarReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$cuenta_cobrarReturnGeneral->idusuarioDefaultFK;
			}


			if($cuenta_cobrarReturnGeneral->con_facturasFK==true) {
				$this->facturasFK=$cuenta_cobrarReturnGeneral->facturasFK;
				$this->idfacturaDefaultFK=$cuenta_cobrarReturnGeneral->idfacturaDefaultFK;
			}


			if($cuenta_cobrarReturnGeneral->con_clientesFK==true) {
				$this->clientesFK=$cuenta_cobrarReturnGeneral->clientesFK;
				$this->idclienteDefaultFK=$cuenta_cobrarReturnGeneral->idclienteDefaultFK;
			}


			if($cuenta_cobrarReturnGeneral->con_termino_pago_clientesFK==true) {
				$this->termino_pago_clientesFK=$cuenta_cobrarReturnGeneral->termino_pago_clientesFK;
				$this->idtermino_pago_clienteDefaultFK=$cuenta_cobrarReturnGeneral->idtermino_pago_clienteDefaultFK;
			}


			if($cuenta_cobrarReturnGeneral->con_estado_cuentas_cobrarsFK==true) {
				$this->estado_cuentas_cobrarsFK=$cuenta_cobrarReturnGeneral->estado_cuentas_cobrarsFK;
				$this->idestado_cuentas_cobrarDefaultFK=$cuenta_cobrarReturnGeneral->idestado_cuentas_cobrarDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(cuenta_cobrar_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));
		
		if($cuenta_cobrar_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sucursal_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sucursal';
			}
			else if($cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ejercicio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ejercicio';
			}
			else if($cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==periodo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='periodo';
			}
			else if($cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			else if($cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==factura_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='factura';
			}
			else if($cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cliente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cliente';
			}
			else if($cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==termino_pago_cliente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='termino_pago_cliente';
			}
			else if($cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==estado_cuentas_cobrar_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='estado_cuentas_cobrar';
			}
			
			$cuenta_cobrar_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}						
			
			$this->cuenta_cobrarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cuenta_cobrarsAuxiliar=array();
			}
			
			if(count($this->cuenta_cobrarsAuxiliar) > 0) {
				
				foreach ($this->cuenta_cobrarsAuxiliar as $cuenta_cobrarSeleccionado) {
					$this->eliminarTablaBase($cuenta_cobrarSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('credito_cuenta_cobrar');
			$tipoRelacionReporte->setsDescripcion('Credito s');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('debito_cuenta_cobrar');
			$tipoRelacionReporte->setsDescripcion('Debito s');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('pago_cuenta_cobrar');
			$tipoRelacionReporte->setsDescripcion('Pago s');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=debito_cuenta_cobrar_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=pago_cuenta_cobrar_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=credito_cuenta_cobrar_util::$STR_NOMBRE_CLASE;
		
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


	public function getfacturasFKListSelectItem() 
	{
		$facturasList=array();

		$item=null;

		foreach($this->facturasFK as $factura)
		{
			$item=new SelectItem();
			$item->setLabel($factura>getId());
			$item->setValue($factura->getId());
			$facturasList[]=$item;
		}

		return $facturasList;
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


	public function getestado_cuentas_cobrarsFKListSelectItem() 
	{
		$estado_cuentas_cobrarsList=array();

		$item=null;

		foreach($this->estado_cuentas_cobrarsFK as $estado_cuentas_cobrar)
		{
			$item=new SelectItem();
			$item->setLabel($estado_cuentas_cobrar->getnombre());
			$item->setValue($estado_cuentas_cobrar->getId());
			$estado_cuentas_cobrarsList[]=$item;
		}

		return $estado_cuentas_cobrarsList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
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
				$this->cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$cuenta_cobrarsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->cuenta_cobrars as $cuenta_cobrarLocal) {
				if($cuenta_cobrarLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->cuenta_cobrar=new cuenta_cobrar();
				
				$this->cuenta_cobrar->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->cuenta_cobrars[]=$this->cuenta_cobrar;*/
				
				$cuenta_cobrarsNuevos[]=$this->cuenta_cobrar;
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
				$class=new Classe('factura');$classes[]=$class;
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('termino_pago_cliente');$classes[]=$class;
				$class=new Classe('estado_cuentas_cobrar');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrarLogic->setcuenta_cobrars($cuenta_cobrarsNuevos);
					
				$this->cuenta_cobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($cuenta_cobrarsNuevos as $cuenta_cobrarNuevo) {
					$this->cuenta_cobrars[]=$cuenta_cobrarNuevo;
				}
				
				/*$this->cuenta_cobrars[]=$cuenta_cobrarsNuevos;*/
				
				$this->cuenta_cobrarLogic->setcuenta_cobrars($this->cuenta_cobrars);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($cuenta_cobrarsNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($cuenta_cobrar_session->bigidempresaActual!=null && $cuenta_cobrar_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cuenta_cobrar_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=cuenta_cobrar_util::getempresaDescripcion($empresaLogic->getempresa());
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

		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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


			if($cuenta_cobrar_session->bigidsucursalActual!=null && $cuenta_cobrar_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($cuenta_cobrar_session->bigidsucursalActual);//WithConnection

				$this->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=cuenta_cobrar_util::getsucursalDescripcion($sucursalLogic->getsucursal());
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

		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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


			if($cuenta_cobrar_session->bigidejercicioActual!=null && $cuenta_cobrar_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($cuenta_cobrar_session->bigidejercicioActual);//WithConnection

				$this->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=cuenta_cobrar_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
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

		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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


			if($cuenta_cobrar_session->bigidperiodoActual!=null && $cuenta_cobrar_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($cuenta_cobrar_session->bigidperiodoActual);//WithConnection

				$this->periodosFK[$periodoLogic->getperiodo()->getId()]=cuenta_cobrar_util::getperiodoDescripcion($periodoLogic->getperiodo());
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

		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionusuario!=true) {
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


			if($cuenta_cobrar_session->bigidusuarioActual!=null && $cuenta_cobrar_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($cuenta_cobrar_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=cuenta_cobrar_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosfacturasFK($connexion=null,$strRecargarFkQuery=''){
		$facturaLogic= new factura_logic();
		$pagination= new Pagination();
		$this->facturasFK=array();

		$facturaLogic->setConnexion($connexion);
		$facturaLogic->getfacturaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionfactura!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=factura_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalfactura=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalfactura=Funciones::GetFinalQueryAppend($finalQueryGlobalfactura, '');
				$finalQueryGlobalfactura.=factura_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalfactura.$strRecargarFkQuery;		

				$facturaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosfacturasFK($facturaLogic->getfacturas());

		} else {
			$this->setVisibleBusquedasParafactura(true);


			if($cuenta_cobrar_session->bigidfacturaActual!=null && $cuenta_cobrar_session->bigidfacturaActual > 0) {
				$facturaLogic->getEntity($cuenta_cobrar_session->bigidfacturaActual);//WithConnection

				$this->facturasFK[$facturaLogic->getfactura()->getId()]=cuenta_cobrar_util::getfacturaDescripcion($facturaLogic->getfactura());
				$this->idfacturaDefaultFK=$facturaLogic->getfactura()->getId();
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

		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesioncliente!=true) {
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


			if($cuenta_cobrar_session->bigidclienteActual!=null && $cuenta_cobrar_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($cuenta_cobrar_session->bigidclienteActual);//WithConnection

				$this->clientesFK[$clienteLogic->getcliente()->getId()]=cuenta_cobrar_util::getclienteDescripcion($clienteLogic->getcliente());
				$this->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
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

		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesiontermino_pago_cliente!=true) {
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


			if($cuenta_cobrar_session->bigidtermino_pago_clienteActual!=null && $cuenta_cobrar_session->bigidtermino_pago_clienteActual > 0) {
				$termino_pago_clienteLogic->getEntity($cuenta_cobrar_session->bigidtermino_pago_clienteActual);//WithConnection

				$this->termino_pago_clientesFK[$termino_pago_clienteLogic->gettermino_pago_cliente()->getId()]=cuenta_cobrar_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLogic->gettermino_pago_cliente());
				$this->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLogic->gettermino_pago_cliente()->getId();
			}
		}
	}

	public function cargarCombosestado_cuentas_cobrarsFK($connexion=null,$strRecargarFkQuery=''){
		$estado_cuentas_cobrarLogic= new estado_cuentas_cobrar_logic();
		$pagination= new Pagination();
		$this->estado_cuentas_cobrarsFK=array();

		$estado_cuentas_cobrarLogic->setConnexion($connexion);
		$estado_cuentas_cobrarLogic->getestado_cuentas_cobrarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionestado_cuentas_cobrar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_cuentas_cobrar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalestado_cuentas_cobrar=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado_cuentas_cobrar=Funciones::GetFinalQueryAppend($finalQueryGlobalestado_cuentas_cobrar, '');
				$finalQueryGlobalestado_cuentas_cobrar.=estado_cuentas_cobrar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado_cuentas_cobrar.$strRecargarFkQuery;		

				$estado_cuentas_cobrarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosestado_cuentas_cobrarsFK($estado_cuentas_cobrarLogic->getestado_cuentas_cobrars());

		} else {
			$this->setVisibleBusquedasParaestado_cuentas_cobrar(true);


			if($cuenta_cobrar_session->bigidestado_cuentas_cobrarActual!=null && $cuenta_cobrar_session->bigidestado_cuentas_cobrarActual > 0) {
				$estado_cuentas_cobrarLogic->getEntity($cuenta_cobrar_session->bigidestado_cuentas_cobrarActual);//WithConnection

				$this->estado_cuentas_cobrarsFK[$estado_cuentas_cobrarLogic->getestado_cuentas_cobrar()->getId()]=cuenta_cobrar_util::getestado_cuentas_cobrarDescripcion($estado_cuentas_cobrarLogic->getestado_cuentas_cobrar());
				$this->idestado_cuentas_cobrarDefaultFK=$estado_cuentas_cobrarLogic->getestado_cuentas_cobrar()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=cuenta_cobrar_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombossucursalsFK($sucursals){

		foreach ($sucursals as $sucursalLocal ) {
			if($this->idsucursalDefaultFK==0) {
				$this->idsucursalDefaultFK=$sucursalLocal->getId();
			}

			$this->sucursalsFK[$sucursalLocal->getId()]=cuenta_cobrar_util::getsucursalDescripcion($sucursalLocal);
		}
	}

	public function prepararCombosejerciciosFK($ejercicios){

		foreach ($ejercicios as $ejercicioLocal ) {
			if($this->idejercicioDefaultFK==0) {
				$this->idejercicioDefaultFK=$ejercicioLocal->getId();
			}

			$this->ejerciciosFK[$ejercicioLocal->getId()]=cuenta_cobrar_util::getejercicioDescripcion($ejercicioLocal);
		}
	}

	public function prepararCombosperiodosFK($periodos){

		foreach ($periodos as $periodoLocal ) {
			if($this->idperiodoDefaultFK==0) {
				$this->idperiodoDefaultFK=$periodoLocal->getId();
			}

			$this->periodosFK[$periodoLocal->getId()]=cuenta_cobrar_util::getperiodoDescripcion($periodoLocal);
		}
	}

	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=cuenta_cobrar_util::getusuarioDescripcion($usuarioLocal);
		}
	}

	public function prepararCombosfacturasFK($facturas){

		foreach ($facturas as $facturaLocal ) {
			if($this->idfacturaDefaultFK==0) {
				$this->idfacturaDefaultFK=$facturaLocal->getId();
			}

			$this->facturasFK[$facturaLocal->getId()]=cuenta_cobrar_util::getfacturaDescripcion($facturaLocal);
		}
	}

	public function prepararCombosclientesFK($clientes){

		foreach ($clientes as $clienteLocal ) {
			if($this->idclienteDefaultFK==0) {
				$this->idclienteDefaultFK=$clienteLocal->getId();
			}

			$this->clientesFK[$clienteLocal->getId()]=cuenta_cobrar_util::getclienteDescripcion($clienteLocal);
		}
	}

	public function prepararCombostermino_pago_clientesFK($termino_pago_clientes){

		foreach ($termino_pago_clientes as $termino_pago_clienteLocal ) {
			if($this->idtermino_pago_clienteDefaultFK==0) {
				$this->idtermino_pago_clienteDefaultFK=$termino_pago_clienteLocal->getId();
			}

			$this->termino_pago_clientesFK[$termino_pago_clienteLocal->getId()]=cuenta_cobrar_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLocal);
		}
	}

	public function prepararCombosestado_cuentas_cobrarsFK($estado_cuentas_cobrars){

		foreach ($estado_cuentas_cobrars as $estado_cuentas_cobrarLocal ) {
			if($this->idestado_cuentas_cobrarDefaultFK==0) {
				$this->idestado_cuentas_cobrarDefaultFK=$estado_cuentas_cobrarLocal->getId();
			}

			$this->estado_cuentas_cobrarsFK[$estado_cuentas_cobrarLocal->getId()]=cuenta_cobrar_util::getestado_cuentas_cobrarDescripcion($estado_cuentas_cobrarLocal);
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

			$strDescripcionempresa=cuenta_cobrar_util::getempresaDescripcion($empresaLogic->getempresa());

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

			$strDescripcionsucursal=cuenta_cobrar_util::getsucursalDescripcion($sucursalLogic->getsucursal());

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

			$strDescripcionejercicio=cuenta_cobrar_util::getejercicioDescripcion($ejercicioLogic->getejercicio());

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

			$strDescripcionperiodo=cuenta_cobrar_util::getperiodoDescripcion($periodoLogic->getperiodo());

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

			$strDescripcionusuario=cuenta_cobrar_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
	}

	public function cargarDescripcionfacturaFK($idfactura,$connexion=null){
		$facturaLogic= new factura_logic();
		$facturaLogic->setConnexion($connexion);
		$facturaLogic->getfacturaDataAccess()->isForFKData=true;
		$strDescripcionfactura='';

		if($idfactura!=null && $idfactura!='' && $idfactura!='null') {
			if($connexion!=null) {
				$facturaLogic->getEntity($idfactura);//WithConnection
			} else {
				$facturaLogic->getEntityWithConnection($idfactura);//
			}

			$strDescripcionfactura=cuenta_cobrar_util::getfacturaDescripcion($facturaLogic->getfactura());

		} else {
			$strDescripcionfactura='null';
		}

		return $strDescripcionfactura;
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

			$strDescripcioncliente=cuenta_cobrar_util::getclienteDescripcion($clienteLogic->getcliente());

		} else {
			$strDescripcioncliente='null';
		}

		return $strDescripcioncliente;
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

			$strDescripciontermino_pago_cliente=cuenta_cobrar_util::gettermino_pago_clienteDescripcion($termino_pago_clienteLogic->gettermino_pago_cliente());

		} else {
			$strDescripciontermino_pago_cliente='null';
		}

		return $strDescripciontermino_pago_cliente;
	}

	public function cargarDescripcionestado_cuentas_cobrarFK($idestado_cuentas_cobrar,$connexion=null){
		$estado_cuentas_cobrarLogic= new estado_cuentas_cobrar_logic();
		$estado_cuentas_cobrarLogic->setConnexion($connexion);
		$estado_cuentas_cobrarLogic->getestado_cuentas_cobrarDataAccess()->isForFKData=true;
		$strDescripcionestado_cuentas_cobrar='';

		if($idestado_cuentas_cobrar!=null && $idestado_cuentas_cobrar!='' && $idestado_cuentas_cobrar!='null') {
			if($connexion!=null) {
				$estado_cuentas_cobrarLogic->getEntity($idestado_cuentas_cobrar);//WithConnection
			} else {
				$estado_cuentas_cobrarLogic->getEntityWithConnection($idestado_cuentas_cobrar);//
			}

			$strDescripcionestado_cuentas_cobrar=cuenta_cobrar_util::getestado_cuentas_cobrarDescripcion($estado_cuentas_cobrarLogic->getestado_cuentas_cobrar());

		} else {
			$strDescripcionestado_cuentas_cobrar='null';
		}

		return $strDescripcionestado_cuentas_cobrar;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(cuenta_cobrar $cuenta_cobrarClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$cuenta_cobrarClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
				$cuenta_cobrarClase->setid_sucursal($this->parametroGeneralUsuarioActual->getid_sucursal());
				$cuenta_cobrarClase->setid_ejercicio($this->parametroGeneralUsuarioActual->getid_ejercicio());
				$cuenta_cobrarClase->setid_periodo($this->parametroGeneralUsuarioActual->getid_periodo());
				$cuenta_cobrarClase->setid_usuario($this->usuarioActual->getId());
			
			
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idestado_cuentas_cobrar=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idfactura=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtermino_pago_cliente=$strParaVisibleNegacionempresa;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idestado_cuentas_cobrar=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idfactura=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idsucursal=$strParaVisiblesucursal;
		$this->strVisibleFK_Idtermino_pago_cliente=$strParaVisibleNegacionsucursal;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleejercicio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idestado_cuentas_cobrar=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idfactura=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idtermino_pago_cliente=$strParaVisibleNegacionejercicio;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idestado_cuentas_cobrar=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idfactura=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idperiodo=$strParaVisibleperiodo;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idtermino_pago_cliente=$strParaVisibleNegacionperiodo;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idestado_cuentas_cobrar=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idfactura=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idtermino_pago_cliente=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idusuario=$strParaVisibleusuario;
	}

	public function setVisibleBusquedasParafactura($isParafactura){
		$strParaVisiblefactura='display:table-row';
		$strParaVisibleNegacionfactura='display:none';

		if($isParafactura) {
			$strParaVisiblefactura='display:table-row';
			$strParaVisibleNegacionfactura='display:none';
		} else {
			$strParaVisiblefactura='display:none';
			$strParaVisibleNegacionfactura='display:table-row';
		}


		$strParaVisibleNegacionfactura=trim($strParaVisibleNegacionfactura);

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionfactura;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionfactura;
		$this->strVisibleFK_Idestado_cuentas_cobrar=$strParaVisibleNegacionfactura;
		$this->strVisibleFK_Idfactura=$strParaVisiblefactura;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionfactura;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionfactura;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionfactura;
		$this->strVisibleFK_Idtermino_pago_cliente=$strParaVisibleNegacionfactura;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionfactura;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idestado_cuentas_cobrar=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idfactura=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idproveedor=$strParaVisiblecliente;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idtermino_pago_cliente=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacioncliente;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idestado_cuentas_cobrar=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idfactura=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegaciontermino_pago_cliente;
		$this->strVisibleFK_Idtermino_pago_cliente=$strParaVisibletermino_pago_cliente;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegaciontermino_pago_cliente;
	}

	public function setVisibleBusquedasParaestado_cuentas_cobrar($isParaestado_cuentas_cobrar){
		$strParaVisibleestado_cuentas_cobrar='display:table-row';
		$strParaVisibleNegacionestado_cuentas_cobrar='display:none';

		if($isParaestado_cuentas_cobrar) {
			$strParaVisibleestado_cuentas_cobrar='display:table-row';
			$strParaVisibleNegacionestado_cuentas_cobrar='display:none';
		} else {
			$strParaVisibleestado_cuentas_cobrar='display:none';
			$strParaVisibleNegacionestado_cuentas_cobrar='display:table-row';
		}


		$strParaVisibleNegacionestado_cuentas_cobrar=trim($strParaVisibleNegacionestado_cuentas_cobrar);

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionestado_cuentas_cobrar;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionestado_cuentas_cobrar;
		$this->strVisibleFK_Idestado_cuentas_cobrar=$strParaVisibleestado_cuentas_cobrar;
		$this->strVisibleFK_Idfactura=$strParaVisibleNegacionestado_cuentas_cobrar;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionestado_cuentas_cobrar;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionestado_cuentas_cobrar;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionestado_cuentas_cobrar;
		$this->strVisibleFK_Idtermino_pago_cliente=$strParaVisibleNegacionestado_cuentas_cobrar;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionestado_cuentas_cobrar;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idcuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_cobrarActual=$idcuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParasucursal() {//$idcuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_cobrarActual=$idcuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sucursal_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sucursal_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sucursal_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaejercicio() {//$idcuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_cobrarActual=$idcuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ejercicio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ejercicio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ejercicio_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaperiodo() {//$idcuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_cobrarActual=$idcuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.periodo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',periodo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(periodo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParausuario() {//$idcuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_cobrarActual=$idcuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParafactura() {//$idcuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_cobrarActual=$idcuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.factura_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_factura(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',factura_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_factura(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(factura_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacliente() {//$idcuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_cobrarActual=$idcuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cliente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cliente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cliente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatermino_pago_cliente() {//$idcuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_cobrarActual=$idcuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.termino_pago_cliente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_termino_pago_cliente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',termino_pago_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_termino_pago_cliente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_cliente_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaestado_cuentas_cobrar() {//$idcuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_cobrarActual=$idcuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.estado_cuentas_cobrar_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado_cuentas_cobrar(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',estado_cuentas_cobrar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado_cuentas_cobrar(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(estado_cuentas_cobrar_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParadebito_cuenta_cobrars(int $idcuenta_cobrarActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuenta_cobrarActual=$idcuenta_cobrarActual;

		$bitPaginaPopupdebito_cuenta_cobrar=false;

		try {

			$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

			if($cuenta_cobrar_session==null) {
				$cuenta_cobrar_session=new cuenta_cobrar_session();
			}

			$debito_cuenta_cobrar_session=unserialize($this->Session->read(debito_cuenta_cobrar_util::$STR_SESSION_NAME));

			if($debito_cuenta_cobrar_session==null) {
				$debito_cuenta_cobrar_session=new debito_cuenta_cobrar_session();
			}

			$debito_cuenta_cobrar_session->strUltimaBusqueda='FK_Idcuenta_cobrar';
			$debito_cuenta_cobrar_session->strPathNavegacionActual=$cuenta_cobrar_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.debito_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
			$debito_cuenta_cobrar_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupdebito_cuenta_cobrar=$debito_cuenta_cobrar_session->bitPaginaPopup;
			$debito_cuenta_cobrar_session->setPaginaPopupVariables(true);
			$bitPaginaPopupdebito_cuenta_cobrar=$debito_cuenta_cobrar_session->bitPaginaPopup;
			$debito_cuenta_cobrar_session->bitPermiteNavegacionHaciaFKDesde=false;
			$debito_cuenta_cobrar_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_cobrar_util::$STR_NOMBRE_OPCION;
			$debito_cuenta_cobrar_session->bitBusquedaDesdeFKSesioncuenta_cobrar=true;
			$debito_cuenta_cobrar_session->bigidcuenta_cobrarActual=$this->idcuenta_cobrarActual;

			$cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_cobrar_session->bigIdActualFK=$this->idcuenta_cobrarActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"debito_cuenta_cobrar"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_cobrar_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"debito_cuenta_cobrar"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_cobrar_util::$STR_SESSION_NAME,serialize($cuenta_cobrar_session));
			$this->Session->write(debito_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($debito_cuenta_cobrar_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupdebito_cuenta_cobrar!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',debito_cuenta_cobrar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(debito_cuenta_cobrar_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcuenta_cobrar,$this->strTipoUsuarioAuxiliarcuenta_cobrar,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',debito_cuenta_cobrar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(debito_cuenta_cobrar_util::$STR_CLASS_NAME,'cuentascobrar','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta_cobrar,$this->strTipoUsuarioAuxiliarcuenta_cobrar,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParapago_cuenta_cobrars(int $idcuenta_cobrarActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuenta_cobrarActual=$idcuenta_cobrarActual;

		$bitPaginaPopuppago_cuenta_cobrar=false;

		try {

			$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

			if($cuenta_cobrar_session==null) {
				$cuenta_cobrar_session=new cuenta_cobrar_session();
			}

			$pago_cuenta_cobrar_session=unserialize($this->Session->read(pago_cuenta_cobrar_util::$STR_SESSION_NAME));

			if($pago_cuenta_cobrar_session==null) {
				$pago_cuenta_cobrar_session=new pago_cuenta_cobrar_session();
			}

			$pago_cuenta_cobrar_session->strUltimaBusqueda='FK_Idcuenta_cobrar';
			$pago_cuenta_cobrar_session->strPathNavegacionActual=$cuenta_cobrar_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.pago_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
			$pago_cuenta_cobrar_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopuppago_cuenta_cobrar=$pago_cuenta_cobrar_session->bitPaginaPopup;
			$pago_cuenta_cobrar_session->setPaginaPopupVariables(true);
			$bitPaginaPopuppago_cuenta_cobrar=$pago_cuenta_cobrar_session->bitPaginaPopup;
			$pago_cuenta_cobrar_session->bitPermiteNavegacionHaciaFKDesde=false;
			$pago_cuenta_cobrar_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_cobrar_util::$STR_NOMBRE_OPCION;
			$pago_cuenta_cobrar_session->bitBusquedaDesdeFKSesioncuenta_cobrar=true;
			$pago_cuenta_cobrar_session->bigidcuenta_cobrarActual=$this->idcuenta_cobrarActual;

			$cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_cobrar_session->bigIdActualFK=$this->idcuenta_cobrarActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"pago_cuenta_cobrar"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_cobrar_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"pago_cuenta_cobrar"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_cobrar_util::$STR_SESSION_NAME,serialize($cuenta_cobrar_session));
			$this->Session->write(pago_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($pago_cuenta_cobrar_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopuppago_cuenta_cobrar!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',pago_cuenta_cobrar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(pago_cuenta_cobrar_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcuenta_cobrar,$this->strTipoUsuarioAuxiliarcuenta_cobrar,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',pago_cuenta_cobrar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(pago_cuenta_cobrar_util::$STR_CLASS_NAME,'cuentascobrar','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta_cobrar,$this->strTipoUsuarioAuxiliarcuenta_cobrar,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParacredito_cuenta_cobrars(int $idcuenta_cobrarActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuenta_cobrarActual=$idcuenta_cobrarActual;

		$bitPaginaPopupcredito_cuenta_cobrar=false;

		try {

			$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));

			if($cuenta_cobrar_session==null) {
				$cuenta_cobrar_session=new cuenta_cobrar_session();
			}

			$credito_cuenta_cobrar_session=unserialize($this->Session->read(credito_cuenta_cobrar_util::$STR_SESSION_NAME));

			if($credito_cuenta_cobrar_session==null) {
				$credito_cuenta_cobrar_session=new credito_cuenta_cobrar_session();
			}

			$credito_cuenta_cobrar_session->strUltimaBusqueda='FK_Idcuenta_cobrar';
			$credito_cuenta_cobrar_session->strPathNavegacionActual=$cuenta_cobrar_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.credito_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
			$credito_cuenta_cobrar_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcredito_cuenta_cobrar=$credito_cuenta_cobrar_session->bitPaginaPopup;
			$credito_cuenta_cobrar_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcredito_cuenta_cobrar=$credito_cuenta_cobrar_session->bitPaginaPopup;
			$credito_cuenta_cobrar_session->bitPermiteNavegacionHaciaFKDesde=false;
			$credito_cuenta_cobrar_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_cobrar_util::$STR_NOMBRE_OPCION;
			$credito_cuenta_cobrar_session->bitBusquedaDesdeFKSesioncuenta_cobrar=true;
			$credito_cuenta_cobrar_session->bigidcuenta_cobrarActual=$this->idcuenta_cobrarActual;

			$cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_cobrar_session->bigIdActualFK=$this->idcuenta_cobrarActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"credito_cuenta_cobrar"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_cobrar_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"credito_cuenta_cobrar"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_cobrar_util::$STR_SESSION_NAME,serialize($cuenta_cobrar_session));
			$this->Session->write(credito_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($credito_cuenta_cobrar_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcredito_cuenta_cobrar!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',credito_cuenta_cobrar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(credito_cuenta_cobrar_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcuenta_cobrar,$this->strTipoUsuarioAuxiliarcuenta_cobrar,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',credito_cuenta_cobrar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(credito_cuenta_cobrar_util::$STR_CLASS_NAME,'cuentascobrar','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta_cobrar,$this->strTipoUsuarioAuxiliarcuenta_cobrar,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(cuenta_cobrar_util::$STR_SESSION_NAME,cuenta_cobrar_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$cuenta_cobrar_session=$this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME);
				
		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();		
			//$this->Session->write('cuenta_cobrar_session',$cuenta_cobrar_session);							
		}
		*/
		
		$cuenta_cobrar_session=new cuenta_cobrar_session();
    	$cuenta_cobrar_session->strPathNavegacionActual=cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
    	$cuenta_cobrar_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(cuenta_cobrar_util::$STR_SESSION_NAME,serialize($cuenta_cobrar_session));		
	}	
	
	public function getSetBusquedasSesionConfig(cuenta_cobrar_session $cuenta_cobrar_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK!=null && $cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK==true) {
			if($cuenta_cobrar_session->bigIdActualFK!=null && $cuenta_cobrar_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$cuenta_cobrar_session->bigIdActualFKParaPosibleAtras=$cuenta_cobrar_session->bigIdActualFK;*/
			}
				
			$cuenta_cobrar_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$cuenta_cobrar_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(cuenta_cobrar_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionempresa!=null && $cuenta_cobrar_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($cuenta_cobrar_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_cobrar_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($cuenta_cobrar_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_cobrar_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_cobrar_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_cobrar_session->intNumeroPaginacion==cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionsucursal!=null && $cuenta_cobrar_session->bitBusquedaDesdeFKSesionsucursal==true)
			{
				if($cuenta_cobrar_session->bigidsucursalActual!=0) {
					$this->strAccionBusqueda='FK_Idsucursal';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_cobrar_session->bigidsucursalActualDescripcion);
						$historyWeb->setIdActual($cuenta_cobrar_session->bigidsucursalActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_cobrar_session->bigidsucursalActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_cobrar_session->bitBusquedaDesdeFKSesionsucursal=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_cobrar_session->intNumeroPaginacion==cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionejercicio!=null && $cuenta_cobrar_session->bitBusquedaDesdeFKSesionejercicio==true)
			{
				if($cuenta_cobrar_session->bigidejercicioActual!=0) {
					$this->strAccionBusqueda='FK_Idejercicio';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_cobrar_session->bigidejercicioActualDescripcion);
						$historyWeb->setIdActual($cuenta_cobrar_session->bigidejercicioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_cobrar_session->bigidejercicioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_cobrar_session->bitBusquedaDesdeFKSesionejercicio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_cobrar_session->intNumeroPaginacion==cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionperiodo!=null && $cuenta_cobrar_session->bitBusquedaDesdeFKSesionperiodo==true)
			{
				if($cuenta_cobrar_session->bigidperiodoActual!=0) {
					$this->strAccionBusqueda='FK_Idperiodo';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_cobrar_session->bigidperiodoActualDescripcion);
						$historyWeb->setIdActual($cuenta_cobrar_session->bigidperiodoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_cobrar_session->bigidperiodoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_cobrar_session->bitBusquedaDesdeFKSesionperiodo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_cobrar_session->intNumeroPaginacion==cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionusuario!=null && $cuenta_cobrar_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($cuenta_cobrar_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_cobrar_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($cuenta_cobrar_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_cobrar_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_cobrar_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_cobrar_session->intNumeroPaginacion==cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionfactura!=null && $cuenta_cobrar_session->bitBusquedaDesdeFKSesionfactura==true)
			{
				if($cuenta_cobrar_session->bigidfacturaActual!=0) {
					$this->strAccionBusqueda='FK_Idfactura';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_cobrar_session->bigidfacturaActualDescripcion);
						$historyWeb->setIdActual($cuenta_cobrar_session->bigidfacturaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_cobrar_session->bigidfacturaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_cobrar_session->bitBusquedaDesdeFKSesionfactura=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_cobrar_session->intNumeroPaginacion==cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_cobrar_session->bitBusquedaDesdeFKSesioncliente!=null && $cuenta_cobrar_session->bitBusquedaDesdeFKSesioncliente==true)
			{
				if($cuenta_cobrar_session->bigidclienteActual!=0) {
					$this->strAccionBusqueda='FK_Idcliente';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_cobrar_session->bigidclienteActualDescripcion);
						$historyWeb->setIdActual($cuenta_cobrar_session->bigidclienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_cobrar_session->bigidclienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_cobrar_session->bitBusquedaDesdeFKSesioncliente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_cobrar_session->intNumeroPaginacion==cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_cobrar_session->bitBusquedaDesdeFKSesiontermino_pago_cliente!=null && $cuenta_cobrar_session->bitBusquedaDesdeFKSesiontermino_pago_cliente==true)
			{
				if($cuenta_cobrar_session->bigidtermino_pago_clienteActual!=0) {
					$this->strAccionBusqueda='FK_Idtermino_pago_cliente';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_cobrar_session->bigidtermino_pago_clienteActualDescripcion);
						$historyWeb->setIdActual($cuenta_cobrar_session->bigidtermino_pago_clienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_cobrar_session->bigidtermino_pago_clienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_cobrar_session->bitBusquedaDesdeFKSesiontermino_pago_cliente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_cobrar_session->intNumeroPaginacion==cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_cobrar_session->bitBusquedaDesdeFKSesionestado_cuentas_cobrar!=null && $cuenta_cobrar_session->bitBusquedaDesdeFKSesionestado_cuentas_cobrar==true)
			{
				if($cuenta_cobrar_session->bigidestado_cuentas_cobrarActual!=0) {
					$this->strAccionBusqueda='FK_Idestado_cuentas_cobrar';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_cobrar_session->bigidestado_cuentas_cobrarActualDescripcion);
						$historyWeb->setIdActual($cuenta_cobrar_session->bigidestado_cuentas_cobrarActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_cobrar_session->bigidestado_cuentas_cobrarActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_cobrar_session->bitBusquedaDesdeFKSesionestado_cuentas_cobrar=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($cuenta_cobrar_session->intNumeroPaginacion==cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$cuenta_cobrar_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));
		
		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		$cuenta_cobrar_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$cuenta_cobrar_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cuenta_cobrar_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idejercicio') {
			$cuenta_cobrar_session->id_ejercicio=$this->id_ejercicioFK_Idejercicio;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$cuenta_cobrar_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idestado_cuentas_cobrar') {
			$cuenta_cobrar_session->id_estado_cuentas_cobrar=$this->id_estado_cuentas_cobrarFK_Idestado_cuentas_cobrar;	

		}
		else if($this->strAccionBusqueda=='FK_Idfactura') {
			$cuenta_cobrar_session->id_factura=$this->id_facturaFK_Idfactura;	

		}
		else if($this->strAccionBusqueda=='FK_Idperiodo') {
			$cuenta_cobrar_session->id_periodo=$this->id_periodoFK_Idperiodo;	

		}
		else if($this->strAccionBusqueda=='FK_Idproveedor') {
			$cuenta_cobrar_session->id_cliente=$this->id_clienteFK_Idproveedor;	

		}
		else if($this->strAccionBusqueda=='FK_Idsucursal') {
			$cuenta_cobrar_session->id_sucursal=$this->id_sucursalFK_Idsucursal;	

		}
		else if($this->strAccionBusqueda=='FK_Idtermino_pago_cliente') {
			$cuenta_cobrar_session->id_termino_pago_cliente=$this->id_termino_pago_clienteFK_Idtermino_pago_cliente;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$cuenta_cobrar_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		
		$this->Session->write(cuenta_cobrar_util::$STR_SESSION_NAME,serialize($cuenta_cobrar_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(cuenta_cobrar_session $cuenta_cobrar_session) {
		
		if($cuenta_cobrar_session==null) {
			$cuenta_cobrar_session=unserialize($this->Session->read(cuenta_cobrar_util::$STR_SESSION_NAME));
		}
		
		if($cuenta_cobrar_session==null) {
		   $cuenta_cobrar_session=new cuenta_cobrar_session();
		}
		
		if($cuenta_cobrar_session->strUltimaBusqueda!=null && $cuenta_cobrar_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$cuenta_cobrar_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$cuenta_cobrar_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$cuenta_cobrar_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idejercicio') {
				$this->id_ejercicioFK_Idejercicio=$cuenta_cobrar_session->id_ejercicio;
				$cuenta_cobrar_session->id_ejercicio=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$cuenta_cobrar_session->id_empresa;
				$cuenta_cobrar_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idestado_cuentas_cobrar') {
				$this->id_estado_cuentas_cobrarFK_Idestado_cuentas_cobrar=$cuenta_cobrar_session->id_estado_cuentas_cobrar;
				$cuenta_cobrar_session->id_estado_cuentas_cobrar=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idfactura') {
				$this->id_facturaFK_Idfactura=$cuenta_cobrar_session->id_factura;
				$cuenta_cobrar_session->id_factura=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idperiodo') {
				$this->id_periodoFK_Idperiodo=$cuenta_cobrar_session->id_periodo;
				$cuenta_cobrar_session->id_periodo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idproveedor') {
				$this->id_clienteFK_Idproveedor=$cuenta_cobrar_session->id_cliente;
				$cuenta_cobrar_session->id_cliente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idsucursal') {
				$this->id_sucursalFK_Idsucursal=$cuenta_cobrar_session->id_sucursal;
				$cuenta_cobrar_session->id_sucursal=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtermino_pago_cliente') {
				$this->id_termino_pago_clienteFK_Idtermino_pago_cliente=$cuenta_cobrar_session->id_termino_pago_cliente;
				$cuenta_cobrar_session->id_termino_pago_cliente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$cuenta_cobrar_session->id_usuario;
				$cuenta_cobrar_session->id_usuario=-1;

			}
		}
		
		$cuenta_cobrar_session->strUltimaBusqueda='';
		//$cuenta_cobrar_session->intNumeroPaginacion=10;
		$cuenta_cobrar_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(cuenta_cobrar_util::$STR_SESSION_NAME,serialize($cuenta_cobrar_session));		
	}
	
	public function cuenta_cobrarsControllerAux($conexion_control) 	 {
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
		$this->idfacturaDefaultFK = 0;
		$this->idclienteDefaultFK = 0;
		$this->idtermino_pago_clienteDefaultFK = 0;
		$this->idestado_cuentas_cobrarDefaultFK = 0;
	}
	
	public function setcuenta_cobrarFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_sucursal',$this->idsucursalDefaultFK);
		$this->setExistDataCampoForm('form','id_ejercicio',$this->idejercicioDefaultFK);
		$this->setExistDataCampoForm('form','id_periodo',$this->idperiodoDefaultFK);
		$this->setExistDataCampoForm('form','id_usuario',$this->idusuarioDefaultFK);
		$this->setExistDataCampoForm('form','id_factura',$this->idfacturaDefaultFK);
		$this->setExistDataCampoForm('form','id_cliente',$this->idclienteDefaultFK);
		$this->setExistDataCampoForm('form','id_termino_pago_cliente',$this->idtermino_pago_clienteDefaultFK);
		$this->setExistDataCampoForm('form','id_estado_cuentas_cobrar',$this->idestado_cuentas_cobrarDefaultFK);
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

		factura::$class;
		factura_carga::$CONTROLLER;

		cliente::$class;
		cliente_carga::$CONTROLLER;

		termino_pago_cliente::$class;
		termino_pago_cliente_carga::$CONTROLLER;

		estado_cuentas_cobrar::$class;
		estado_cuentas_cobrar_carga::$CONTROLLER;
		
		//REL
		

		debito_cuenta_cobrar_carga::$CONTROLLER;
		debito_cuenta_cobrar_util::$STR_SCHEMA;
		debito_cuenta_cobrar_session::class;

		pago_cuenta_cobrar_carga::$CONTROLLER;
		pago_cuenta_cobrar_util::$STR_SCHEMA;
		pago_cuenta_cobrar_session::class;

		credito_cuenta_cobrar_carga::$CONTROLLER;
		credito_cuenta_cobrar_util::$STR_SCHEMA;
		credito_cuenta_cobrar_session::class;
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
		interface cuenta_cobrar_controlI {	
		
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
		
		public function onLoad(cuenta_cobrar_session $cuenta_cobrar_session=null);	
		function index(?string $strTypeOnLoadcuenta_cobrar='',?string $strTipoPaginaAuxiliarcuenta_cobrar='',?string $strTipoUsuarioAuxiliarcuenta_cobrar='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadcuenta_cobrar='',string $strTipoPaginaAuxiliarcuenta_cobrar='',string $strTipoUsuarioAuxiliarcuenta_cobrar='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($cuenta_cobrarReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(cuenta_cobrar $cuenta_cobrarClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(cuenta_cobrar_session $cuenta_cobrar_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(cuenta_cobrar_session $cuenta_cobrar_session);	
		public function cuenta_cobrarsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setcuenta_cobrarFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
