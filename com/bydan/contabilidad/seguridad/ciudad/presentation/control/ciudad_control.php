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

namespace com\bydan\contabilidad\seguridad\ciudad\presentation\control;

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

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/util/ciudad_carga.php');
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;

use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_param_return;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\presentation\session\ciudad_session;


//FK


use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\provincia\business\logic\provincia_logic;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_carga;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;

//REL


use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;
use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\session\dato_general_usuario_session;

use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;
use com\bydan\contabilidad\general\sucursal\presentation\session\sucursal_session;

use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\general\empresa\presentation\session\empresa_session;


/*CARGA ARCHIVOS FRAMEWORK*/
ciudad_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
ciudad_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
ciudad_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
ciudad_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*ciudad_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/seguridad/ciudad/presentation/control/ciudad_init_control.php');
use com\bydan\contabilidad\seguridad\ciudad\presentation\control\ciudad_init_control;

include_once('com/bydan/contabilidad/seguridad/ciudad/presentation/control/ciudad_base_control.php');
use com\bydan\contabilidad\seguridad\ciudad\presentation\control\ciudad_base_control;

class ciudad_control extends ciudad_base_control {	
	
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
			else if($action=='registrarSesionParaproveedores' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idciudadActual=$this->getDataId();
				$this->registrarSesionParaproveedores($idciudadActual);
			}
			else if($action=='registrarSesionParaclientes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idciudadActual=$this->getDataId();
				$this->registrarSesionParaclientes($idciudadActual);
			}
			else if($action=='registrarSesionParadato_general_usuarios' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idciudadActual=$this->getDataId();
				$this->registrarSesionParadato_general_usuarios($idciudadActual);
			}
			else if($action=='registrarSesionParasucursals' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idciudadActual=$this->getDataId();
				$this->registrarSesionParasucursals($idciudadActual);
			}
			else if($action=='registrarSesionParaempresas' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idciudadActual=$this->getDataId();
				$this->registrarSesionParaempresas($idciudadActual);
			} 
			
			
			else if($action=="BusquedaPorCodigo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorCodigoParaProcesar();
			}
			else if($action=="BusquedaPorNombre"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorNombreParaProcesar();
			}
			else if($action=="FK_Idprovincia"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdprovinciaParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaprovincia') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idciudadActual=$this->getDataId();
				$this->abrirBusquedaParaprovincia();//$idciudadActual
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
					
					$ciudadController = new ciudad_control();
					
					$ciudadController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($ciudadController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$ciudadController = new ciudad_control();
						$ciudadController = $this;
						
						$jsonResponse = json_encode($ciudadController->ciudads);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->ciudadReturnGeneral==null) {
					$this->ciudadReturnGeneral=new ciudad_param_return();
				}
				
				echo($this->ciudadReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$ciudadController=new ciudad_control();
		
		$ciudadController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$ciudadController->usuarioActual=new usuario();
		
		$ciudadController->usuarioActual->setId($this->usuarioActual->getId());
		$ciudadController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$ciudadController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$ciudadController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$ciudadController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$ciudadController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$ciudadController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$ciudadController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $ciudadController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadciudad= $this->getDataGeneralString('strTypeOnLoadciudad');
		$strTipoPaginaAuxiliarciudad= $this->getDataGeneralString('strTipoPaginaAuxiliarciudad');
		$strTipoUsuarioAuxiliarciudad= $this->getDataGeneralString('strTipoUsuarioAuxiliarciudad');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadciudad,$strTipoPaginaAuxiliarciudad,$strTipoUsuarioAuxiliarciudad,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadciudad!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('ciudad','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ciudad_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarciudad,$this->strTipoUsuarioAuxiliarciudad,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ciudad_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarciudad,$this->strTipoUsuarioAuxiliarciudad,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->ciudadReturnGeneral=new ciudad_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->ciudadReturnGeneral->conGuardarReturnSessionJs=true;
		$this->ciudadReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->ciudadReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->ciudadReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->ciudadReturnGeneral);
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
		$this->ciudadReturnGeneral=new ciudad_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->ciudadReturnGeneral->conGuardarReturnSessionJs=true;
		$this->ciudadReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->ciudadReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->ciudadReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->ciudadReturnGeneral);
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
		$this->ciudadReturnGeneral=new ciudad_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->ciudadReturnGeneral->conGuardarReturnSessionJs=true;
		$this->ciudadReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->ciudadReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->ciudadReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->ciudadReturnGeneral);
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
				$this->ciudadLogic->getNewConnexionToDeep();
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
			
			
			$this->ciudadReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->ciudadReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->ciudadReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->ciudadReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->ciudadReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->ciudadReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->ciudadReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->ciudadReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->ciudadReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->ciudadReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->ciudadReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->ciudadReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->ciudadReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->ciudadReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->ciudadReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->ciudadReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->ciudadReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->ciudadReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
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
		
		$this->ciudadLogic=new ciudad_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->ciudad=new ciudad();
		
		$this->strTypeOnLoadciudad='onload';
		$this->strTipoPaginaAuxiliarciudad='none';
		$this->strTipoUsuarioAuxiliarciudad='none';	

		$this->intNumeroPaginacion=ciudad_util::$INT_NUMERO_PAGINACION;
		
		$this->ciudadModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->ciudadControllerAdditional=new ciudad_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(ciudad_session $ciudad_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($ciudad_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadciudad='',?string $strTipoPaginaAuxiliarciudad='',?string $strTipoUsuarioAuxiliarciudad='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadciudad=$strTypeOnLoadciudad;
			$this->strTipoPaginaAuxiliarciudad=$strTipoPaginaAuxiliarciudad;
			$this->strTipoUsuarioAuxiliarciudad=$strTipoUsuarioAuxiliarciudad;
	
			if($strTipoUsuarioAuxiliarciudad=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->ciudad=new ciudad();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Ciudades';
			
			
			$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));
							
			if($ciudad_session==null) {
				$ciudad_session=new ciudad_session();
				
				/*$this->Session->write('ciudad_session',$ciudad_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($ciudad_session->strFuncionJsPadre!=null && $ciudad_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$ciudad_session->strFuncionJsPadre;
				
				$ciudad_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($ciudad_session);
			
			if($strTypeOnLoadciudad!=null && $strTypeOnLoadciudad=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$ciudad_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$ciudad_session->setPaginaPopupVariables(true);
				}
				
				if($ciudad_session->intNumeroPaginacion==ciudad_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=ciudad_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$ciudad_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,ciudad_util::$STR_SESSION_NAME,'seguridad');																
			
			} else if($strTypeOnLoadciudad!=null && $strTypeOnLoadciudad=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$ciudad_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=ciudad_util::$INT_NUMERO_PAGINACION;*/
				
				if($ciudad_session->intNumeroPaginacion==ciudad_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=ciudad_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$ciudad_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarciudad!=null && $strTipoPaginaAuxiliarciudad=='none') {
				/*$ciudad_session->strStyleDivHeader='display:table-row';*/
				
				/*$ciudad_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarciudad!=null && $strTipoPaginaAuxiliarciudad=='iframe') {
					/*
					$ciudad_session->strStyleDivArbol='display:none';
					$ciudad_session->strStyleDivHeader='display:none';
					$ciudad_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$ciudad_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->ciudadClase=new ciudad();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=ciudad_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(ciudad_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->ciudadLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->ciudadLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$proveedorLogic=new proveedor_logic();
			//$clienteLogic=new cliente_logic();
			//$datogeneralusuarioLogic=new dato_general_usuario_logic();
			//$sucursalLogic=new sucursal_logic();
			//$empresaLogic=new empresa_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->ciudadLogic=new ciudad_logic();*/
			
			
			$this->ciudadsModel=null;
			/*new ListDataModel();*/
			
			/*$this->ciudadsModel.setWrappedData(ciudadLogic->getciudads());*/
						
			$this->ciudads= array();
			$this->ciudadsEliminados=array();
			$this->ciudadsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= ciudad_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= ciudad_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->ciudad= new ciudad();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleBusquedaPorCodigo='display:table-row';
			$this->strVisibleBusquedaPorNombre='display:table-row';
			$this->strVisibleFK_Idprovincia='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarciudad!=null && $strTipoUsuarioAuxiliarciudad!='none' && $strTipoUsuarioAuxiliarciudad!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarciudad);
																
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
				if($strTipoUsuarioAuxiliarciudad!=null && $strTipoUsuarioAuxiliarciudad!='none' && $strTipoUsuarioAuxiliarciudad!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarciudad);
																
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
				if($strTipoUsuarioAuxiliarciudad==null || $strTipoUsuarioAuxiliarciudad=='none' || $strTipoUsuarioAuxiliarciudad=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarciudad,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, ciudad_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, ciudad_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina ciudad');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($ciudad_session);
			
			$this->getSetBusquedasSesionConfig($ciudad_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteciudads($this->strAccionBusqueda,$this->ciudadLogic->getciudads());*/
				} else if($this->strGenerarReporte=='Html')	{
					$ciudad_session->strServletGenerarHtmlReporte='ciudadServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(ciudad_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(ciudad_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($ciudad_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarciudad!=null && $strTipoUsuarioAuxiliarciudad=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($ciudad_session);
			}
								
			$this->set(ciudad_util::$STR_SESSION_NAME, $ciudad_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($ciudad_session);
			
			/*
			$this->ciudad->recursive = 0;
			
			$this->ciudads=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('ciudads', $this->ciudads);
			
			$this->set(ciudad_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->ciudadActual =$this->ciudadClase;
			
			/*$this->ciudadActual =$this->migrarModelciudad($this->ciudadClase);*/
			
			$this->returnHtml(false);
			
			$this->set(ciudad_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=ciudad_util::$STR_NOMBRE_OPCION;
				
			if(ciudad_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=ciudad_util::$STR_MODULO_OPCION.ciudad_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(ciudad_util::$STR_SESSION_NAME,serialize($ciudad_session));
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
			/*$ciudadClase= (ciudad) ciudadsModel.getRowData();*/
			
			$this->ciudadClase->setId($this->ciudad->getId());	
			$this->ciudadClase->setVersionRow($this->ciudad->getVersionRow());	
			$this->ciudadClase->setVersionRow($this->ciudad->getVersionRow());	
			$this->ciudadClase->setid_provincia($this->ciudad->getid_provincia());	
			$this->ciudadClase->setcodigo($this->ciudad->getcodigo());	
			$this->ciudadClase->setnombre($this->ciudad->getnombre());	
		
			/*$this->Session->write('ciudadVersionRowActual', ciudad.getVersionRow());*/
			
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
			
			$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));
						
			if($ciudad_session==null) {
				$ciudad_session=new ciudad_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('ciudad', $this->ciudad->read(null, $id));
	
			
			$this->ciudad->recursive = 0;
			
			$this->ciudads=$this->paginate();
			
			$this->set('ciudads', $this->ciudads);
	
			if (empty($this->data)) {
				$this->data = $this->ciudad->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->ciudadLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->ciudadClase);
			
			$this->ciudadActual=$this->ciudadClase;
			
			/*$this->ciudadActual =$this->migrarModelciudad($this->ciudadClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->ciudadLogic->getciudads(),$this->ciudadActual);
			
			$this->actualizarControllerConReturnGeneral($this->ciudadReturnGeneral);
			
			//$this->ciudadReturnGeneral=$this->ciudadLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->ciudadLogic->getciudads(),$this->ciudadActual,$this->ciudadParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));
						
			if($ciudad_session==null) {
				$ciudad_session=new ciudad_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevociudad', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->ciudadClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->ciudadClase);
			
			$this->ciudadActual =$this->ciudadClase;
			
			/*$this->ciudadActual =$this->migrarModelciudad($this->ciudadClase);*/
			
			$this->setciudadFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->ciudadLogic->getciudads(),$this->ciudad);
			
			$this->actualizarControllerConReturnGeneral($this->ciudadReturnGeneral);
			
			//this->ciudadReturnGeneral=$this->ciudadLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->ciudadLogic->getciudads(),$this->ciudad,$this->ciudadParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idprovinciaDefaultFK!=null && $this->idprovinciaDefaultFK > -1) {
				$this->ciudadReturnGeneral->getciudad()->setid_provincia($this->idprovinciaDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->ciudadReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->ciudadReturnGeneral->getciudad(),$this->ciudadActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyciudad($this->ciudadReturnGeneral->getciudad());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariociudad($this->ciudadReturnGeneral->getciudad());*/
			}
			
			if($this->ciudadReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->ciudadReturnGeneral->getciudad(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualciudad($this->ciudad,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->ciudadsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->ciudadsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->ciudadsAuxiliar=array();
			}
			
			if(count($this->ciudadsAuxiliar)==2) {
				$ciudadOrigen=$this->ciudadsAuxiliar[0];
				$ciudadDestino=$this->ciudadsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($ciudadOrigen,$ciudadDestino,true,false,false);
				
				$this->actualizarLista($ciudadDestino,$this->ciudads);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->ciudadsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->ciudadsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->ciudadsAuxiliar=array();
			}
			
			if(count($this->ciudadsAuxiliar) > 0) {
				foreach ($this->ciudadsAuxiliar as $ciudadSeleccionado) {
					$this->ciudad=new ciudad();
					
					$this->setCopiarVariablesObjetos($ciudadSeleccionado,$this->ciudad,true,true,false);
						
					$this->ciudads[]=$this->ciudad;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->ciudadsEliminados as $ciudadEliminado) {
				$this->ciudadLogic->ciudads[]=$ciudadEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->ciudad=new ciudad();
							
				$this->ciudads[]=$this->ciudad;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
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
		
		$ciudadActual=new ciudad();
		
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
				
				$ciudadActual=$this->ciudads[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $ciudadActual->setid_provincia((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $ciudadActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $ciudadActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->ciudadsAuxiliar=array();		 
		/*$this->ciudadsEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->ciudadsAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->ciudadsAuxiliar=array();
		}
			
		if(count($this->ciudadsAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->ciudadsAuxiliar as $ciudadAuxLocal) {				
				
				foreach($this->ciudads as $ciudadLocal) {
					if($ciudadLocal->getId()==$ciudadAuxLocal->getId()) {
						$ciudadLocal->setIsDeleted(true);
						
						/*$this->ciudadsEliminados[]=$ciudadLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->ciudadLogic->setciudads($this->ciudads);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
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
				$this->ciudadLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=ciudad_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadciudad='',string $strTipoPaginaAuxiliarciudad='',string $strTipoUsuarioAuxiliarciudad='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadciudad,$strTipoPaginaAuxiliarciudad,$strTipoUsuarioAuxiliarciudad,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->ciudads) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=ciudad_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=ciudad_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=ciudad_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));
						
			if($ciudad_session==null) {
				$ciudad_session=new ciudad_session();
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
					/*$this->intNumeroPaginacion=ciudad_util::$INT_NUMERO_PAGINACION;*/
					
					if($ciudad_session->intNumeroPaginacion==ciudad_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=ciudad_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$ciudad_session->intNumeroPaginacion;
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
			
			$this->ciudadsEliminados=array();
			
			/*$this->ciudadLogic->setConnexion($connexion);*/
			
			$this->ciudadLogic->setIsConDeep(true);
			
			$this->ciudadLogic->getciudadDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('provincia');$classes[]=$class;
			
			$this->ciudadLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->ciudadLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->ciudadLogic->getciudads()==null|| count($this->ciudadLogic->getciudads())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->ciudads=$this->ciudadLogic->getciudads();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->ciudadLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->ciudadsReporte=$this->ciudadLogic->getciudads();
									
						/*$this->generarReportes('Todos',$this->ciudadLogic->getciudads());*/
					
						$this->ciudadLogic->setciudads($this->ciudads);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->ciudadLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->ciudadLogic->getciudads()==null|| count($this->ciudadLogic->getciudads())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->ciudads=$this->ciudadLogic->getciudads();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->ciudadLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->ciudadsReporte=$this->ciudadLogic->getciudads();
									
						/*$this->generarReportes('Todos',$this->ciudadLogic->getciudads());*/
					
						$this->ciudadLogic->setciudads($this->ciudads);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idciudad=0;*/
				
				if($ciudad_session->bitBusquedaDesdeFKSesionFK!=null && $ciudad_session->bitBusquedaDesdeFKSesionFK==true) {
					if($ciudad_session->bigIdActualFK!=null && $ciudad_session->bigIdActualFK!=0)	{
						$this->idciudad=$ciudad_session->bigIdActualFK;	
					}
					
					$ciudad_session->bitBusquedaDesdeFKSesionFK=false;
					
					$ciudad_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idciudad=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idciudad=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->ciudadLogic->getEntity($this->idciudad);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*ciudadLogicAdditional::getDetalleIndicePorId($idciudad);*/

				
				if($this->ciudadLogic->getciudad()!=null) {
					$this->ciudadLogic->setciudads(array());
					$this->ciudadLogic->ciudads[]=$this->ciudadLogic->getciudad();
				}
			
			}
		
			else if($strAccionBusqueda=='BusquedaPorCodigo')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->ciudadLogic->getsBusquedaPorCodigo($finalQueryPaginacion,$this->pagination,$this->codigoBusquedaPorCodigo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//ciudadLogicAdditional::getDetalleIndiceBusquedaPorCodigo($this->codigoBusquedaPorCodigo);


					if($this->ciudadLogic->getciudads()==null || count($this->ciudadLogic->getciudads())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$ciudads=$this->ciudadLogic->getciudads();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->ciudadLogic->getsBusquedaPorCodigo('',$this->pagination,$this->codigoBusquedaPorCodigo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->ciudadsReporte=$this->ciudadLogic->getciudads();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteciudads("BusquedaPorCodigo",$this->ciudadLogic->getciudads());

					if($this->strTipoPaginacion=='TODOS') {
						$this->ciudadLogic->setciudads($ciudads);
					}
				//}

			}
			else if($strAccionBusqueda=='BusquedaPorNombre')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->ciudadLogic->getsBusquedaPorNombre($finalQueryPaginacion,$this->pagination,$this->nombreBusquedaPorNombre);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//ciudadLogicAdditional::getDetalleIndiceBusquedaPorNombre($this->nombreBusquedaPorNombre);


					if($this->ciudadLogic->getciudads()==null || count($this->ciudadLogic->getciudads())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$ciudads=$this->ciudadLogic->getciudads();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->ciudadLogic->getsBusquedaPorNombre('',$this->pagination,$this->nombreBusquedaPorNombre);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->ciudadsReporte=$this->ciudadLogic->getciudads();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteciudads("BusquedaPorNombre",$this->ciudadLogic->getciudads());

					if($this->strTipoPaginacion=='TODOS') {
						$this->ciudadLogic->setciudads($ciudads);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idprovincia')
			{

				if($ciudad_session->bigidprovinciaActual!=null && $ciudad_session->bigidprovinciaActual!=0)
				{
					$this->id_provinciaFK_Idprovincia=$ciudad_session->bigidprovinciaActual;
					$ciudad_session->bigidprovinciaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->ciudadLogic->getsFK_Idprovincia($finalQueryPaginacion,$this->pagination,$this->id_provinciaFK_Idprovincia);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//ciudadLogicAdditional::getDetalleIndiceFK_Idprovincia($this->id_provinciaFK_Idprovincia);


					if($this->ciudadLogic->getciudads()==null || count($this->ciudadLogic->getciudads())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$ciudads=$this->ciudadLogic->getciudads();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->ciudadLogic->getsFK_Idprovincia('',$this->pagination,$this->id_provinciaFK_Idprovincia);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->ciudadsReporte=$this->ciudadLogic->getciudads();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteciudads("FK_Idprovincia",$this->ciudadLogic->getciudads());

					if($this->strTipoPaginacion=='TODOS') {
						$this->ciudadLogic->setciudads($ciudads);
					}
				//}

			} 
		
		$ciudad_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$ciudad_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->ciudadLogic->loadForeignsKeysDescription();*/
		
		$this->ciudads=$this->ciudadLogic->getciudads();
		
		if($this->ciudadsEliminados==null) {
			$this->ciudadsEliminados=array();
		}
		
		$this->Session->write(ciudad_util::$STR_SESSION_NAME.'Lista',serialize($this->ciudads));
		$this->Session->write(ciudad_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->ciudadsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(ciudad_util::$STR_SESSION_NAME,serialize($ciudad_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idciudad=$idGeneral;
			
			$this->intNumeroPaginacion=ciudad_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
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
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}

			if(count($this->ciudads) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsBusquedaPorCodigoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=ciudad_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->codigoBusquedaPorCodigo=(string)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorCodigo','txtcodigo');

			$this->strAccionBusqueda='BusquedaPorCodigo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsBusquedaPorNombreParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=ciudad_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->nombreBusquedaPorNombre=(string)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorNombre','txtnombre');

			$this->strAccionBusqueda='BusquedaPorNombre';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
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
				$this->ciudadLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=ciudad_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_provinciaFK_Idprovincia=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idprovincia','cmbid_provincia');

			$this->strAccionBusqueda='FK_Idprovincia';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsBusquedaPorCodigo($strFinalQuery,$codigo)
	{
		try
		{

			$this->ciudadLogic->getsBusquedaPorCodigo($strFinalQuery,new Pagination(),$codigo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsBusquedaPorNombre($strFinalQuery,$nombre)
	{
		try
		{

			$this->ciudadLogic->getsBusquedaPorNombre($strFinalQuery,new Pagination(),$nombre);
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

			$this->ciudadLogic->getsFK_Idprovincia($strFinalQuery,new Pagination(),$id_provincia);
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
			
			
			$ciudadForeignKey=new ciudad_param_return(); //ciudadForeignKey();
			
			$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));
						
			if($ciudad_session==null) {
				$ciudad_session=new ciudad_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$ciudadForeignKey=$this->ciudadLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$ciudad_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_provincia',$this->strRecargarFkTipos,',')) {
				$this->provinciasFK=$ciudadForeignKey->provinciasFK;
				$this->idprovinciaDefaultFK=$ciudadForeignKey->idprovinciaDefaultFK;
			}

			if($ciudad_session->bitBusquedaDesdeFKSesionprovincia) {
				$this->setVisibleBusquedasParaprovincia(true);
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
	
	function cargarCombosFKFromReturnGeneral($ciudadReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$ciudadReturnGeneral->strRecargarFkTipos;
			
			


			if($ciudadReturnGeneral->con_provinciasFK==true) {
				$this->provinciasFK=$ciudadReturnGeneral->provinciasFK;
				$this->idprovinciaDefaultFK=$ciudadReturnGeneral->idprovinciaDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(ciudad_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));
		
		if($ciudad_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($ciudad_session->getstrNombrePaginaNavegacionHaciaFKDesde()==provincia_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='provincia';
			}
			
			$ciudad_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}						
			
			$this->ciudadsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->ciudadsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->ciudadsAuxiliar=array();
			}
			
			if(count($this->ciudadsAuxiliar) > 0) {
				
				foreach ($this->ciudadsAuxiliar as $ciudadSeleccionado) {
					$this->eliminarTablaBase($ciudadSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('cliente');
			$tipoRelacionReporte->setsDescripcion('Clientes');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('dato_general_usuario');
			$tipoRelacionReporte->setsDescripcion('Dato General Usuarios');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('empresa');
			$tipoRelacionReporte->setsDescripcion('Empresas');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('proveedor');
			$tipoRelacionReporte->setsDescripcion('Proveedores');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('sucursal');
			$tipoRelacionReporte->setsDescripcion('Sucursals');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=proveedor_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=cliente_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=dato_general_usuario_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=sucursal_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=empresa_util::$STR_NOMBRE_CLASE;
		
		return $arrNombresClasesRelacionadasLocal;
	}
	
	
	public function setstrRecargarFkInicializar() {
		$this->setstrRecargarFk('TODOS','NINGUNO',0,'');		
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


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=ciudad_util::$INT_NUMERO_PAGINACION;
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
				$this->ciudadLogic->commitNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->rollbackNewConnexionToDeep();
				$this->ciudadLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$ciudadsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->ciudads as $ciudadLocal) {
				if($ciudadLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->ciudad=new ciudad();
				
				$this->ciudad->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->ciudads[]=$this->ciudad;*/
				
				$ciudadsNuevos[]=$this->ciudad;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('provincia');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->ciudadLogic->setciudads($ciudadsNuevos);
					
				$this->ciudadLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($ciudadsNuevos as $ciudadNuevo) {
					$this->ciudads[]=$ciudadNuevo;
				}
				
				/*$this->ciudads[]=$ciudadsNuevos;*/
				
				$this->ciudadLogic->setciudads($this->ciudads);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($ciudadsNuevos!=null);
	}
					
	
	public function cargarCombosprovinciasFK($connexion=null,$strRecargarFkQuery=''){
		$provinciaLogic= new provincia_logic();
		$pagination= new Pagination();
		$this->provinciasFK=array();

		$provinciaLogic->setConnexion($connexion);
		$provinciaLogic->getprovinciaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));

		if($ciudad_session==null) {
			$ciudad_session=new ciudad_session();
		}
		
		if($ciudad_session->bitBusquedaDesdeFKSesionprovincia!=true) {
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


			if($ciudad_session->bigidprovinciaActual!=null && $ciudad_session->bigidprovinciaActual > 0) {
				$provinciaLogic->getEntity($ciudad_session->bigidprovinciaActual);//WithConnection

				$this->provinciasFK[$provinciaLogic->getprovincia()->getId()]=ciudad_util::getprovinciaDescripcion($provinciaLogic->getprovincia());
				$this->idprovinciaDefaultFK=$provinciaLogic->getprovincia()->getId();
			}
		}
	}

	
	
	public function prepararCombosprovinciasFK($provincias){

		foreach ($provincias as $provinciaLocal ) {
			if($this->idprovinciaDefaultFK==0) {
				$this->idprovinciaDefaultFK=$provinciaLocal->getId();
			}

			$this->provinciasFK[$provinciaLocal->getId()]=ciudad_util::getprovinciaDescripcion($provinciaLocal);
		}
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

			$strDescripcionprovincia=ciudad_util::getprovinciaDescripcion($provinciaLogic->getprovincia());

		} else {
			$strDescripcionprovincia='null';
		}

		return $strDescripcionprovincia;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(ciudad $ciudadClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
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

		$this->strVisibleBusquedaPorCodigo=$strParaVisibleNegacionprovincia;
		$this->strVisibleBusquedaPorNombre=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idprovincia=$strParaVisibleprovincia;
	}
	
	

	public function abrirBusquedaParaprovincia() {//$idciudadActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idciudadActual=$idciudadActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.provincia_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.ciudadJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_provincia(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',provincia_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.ciudadJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_provincia(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(provincia_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarciudad,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParaproveedores(int $idciudadActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idciudadActual=$idciudadActual;

		$bitPaginaPopupproveedor=false;

		try {

			$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));

			if($ciudad_session==null) {
				$ciudad_session=new ciudad_session();
			}

			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
			}

			$proveedor_session->strUltimaBusqueda='FK_Idciudad';
			$proveedor_session->strPathNavegacionActual=$ciudad_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.proveedor_util::$STR_CLASS_WEB_TITULO;
			$proveedor_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupproveedor=$proveedor_session->bitPaginaPopup;
			$proveedor_session->setPaginaPopupVariables(true);
			$bitPaginaPopupproveedor=$proveedor_session->bitPaginaPopup;
			$proveedor_session->bitPermiteNavegacionHaciaFKDesde=false;
			$proveedor_session->strNombrePaginaNavegacionHaciaFKDesde=ciudad_util::$STR_NOMBRE_OPCION;
			$proveedor_session->bitBusquedaDesdeFKSesionciudad=true;
			$proveedor_session->bigidciudadActual=$this->idciudadActual;

			$ciudad_session->bitBusquedaDesdeFKSesionFK=true;
			$ciudad_session->bigIdActualFK=$this->idciudadActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"proveedor"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=ciudad_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"proveedor"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(ciudad_util::$STR_SESSION_NAME,serialize($ciudad_session));
			$this->Session->write(proveedor_util::$STR_SESSION_NAME,serialize($proveedor_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupproveedor!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarciudad,$this->strTipoUsuarioAuxiliarciudad,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliarciudad,$this->strTipoUsuarioAuxiliarciudad,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaclientes(int $idciudadActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idciudadActual=$idciudadActual;

		$bitPaginaPopupcliente=false;

		try {

			$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));

			if($ciudad_session==null) {
				$ciudad_session=new ciudad_session();
			}

			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}

			$cliente_session->strUltimaBusqueda='FK_Idciudad';
			$cliente_session->strPathNavegacionActual=$ciudad_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.cliente_util::$STR_CLASS_WEB_TITULO;
			$cliente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcliente=$cliente_session->bitPaginaPopup;
			$cliente_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcliente=$cliente_session->bitPaginaPopup;
			$cliente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$cliente_session->strNombrePaginaNavegacionHaciaFKDesde=ciudad_util::$STR_NOMBRE_OPCION;
			$cliente_session->bitBusquedaDesdeFKSesionciudad=true;
			$cliente_session->bigidciudadActual=$this->idciudadActual;

			$ciudad_session->bitBusquedaDesdeFKSesionFK=true;
			$ciudad_session->bigIdActualFK=$this->idciudadActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"cliente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=ciudad_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"cliente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(ciudad_util::$STR_SESSION_NAME,serialize($ciudad_session));
			$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcliente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarciudad,$this->strTipoUsuarioAuxiliarciudad,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliarciudad,$this->strTipoUsuarioAuxiliarciudad,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParadato_general_usuarios(int $idciudadActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idciudadActual=$idciudadActual;

		$bitPaginaPopupdato_general_usuario=false;

		try {

			$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));

			if($ciudad_session==null) {
				$ciudad_session=new ciudad_session();
			}

			$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));

			if($dato_general_usuario_session==null) {
				$dato_general_usuario_session=new dato_general_usuario_session();
			}

			$dato_general_usuario_session->strUltimaBusqueda='FK_Idciudad';
			$dato_general_usuario_session->strPathNavegacionActual=$ciudad_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.dato_general_usuario_util::$STR_CLASS_WEB_TITULO;
			$dato_general_usuario_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupdato_general_usuario=$dato_general_usuario_session->bitPaginaPopup;
			$dato_general_usuario_session->setPaginaPopupVariables(true);
			$bitPaginaPopupdato_general_usuario=$dato_general_usuario_session->bitPaginaPopup;
			$dato_general_usuario_session->bitPermiteNavegacionHaciaFKDesde=false;
			$dato_general_usuario_session->strNombrePaginaNavegacionHaciaFKDesde=ciudad_util::$STR_NOMBRE_OPCION;
			$dato_general_usuario_session->bitBusquedaDesdeFKSesionciudad=true;
			$dato_general_usuario_session->bigidciudadActual=$this->idciudadActual;

			$ciudad_session->bitBusquedaDesdeFKSesionFK=true;
			$ciudad_session->bigIdActualFK=$this->idciudadActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"dato_general_usuario"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=ciudad_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"dato_general_usuario"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(ciudad_util::$STR_SESSION_NAME,serialize($ciudad_session));
			$this->Session->write(dato_general_usuario_util::$STR_SESSION_NAME,serialize($dato_general_usuario_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupdato_general_usuario!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',dato_general_usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(dato_general_usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarciudad,$this->strTipoUsuarioAuxiliarciudad,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',dato_general_usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(dato_general_usuario_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliarciudad,$this->strTipoUsuarioAuxiliarciudad,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParasucursals(int $idciudadActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idciudadActual=$idciudadActual;

		$bitPaginaPopupsucursal=false;

		try {

			$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));

			if($ciudad_session==null) {
				$ciudad_session=new ciudad_session();
			}

			$sucursal_session=unserialize($this->Session->read(sucursal_util::$STR_SESSION_NAME));

			if($sucursal_session==null) {
				$sucursal_session=new sucursal_session();
			}

			$sucursal_session->strUltimaBusqueda='FK_Idciudad';
			$sucursal_session->strPathNavegacionActual=$ciudad_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.sucursal_util::$STR_CLASS_WEB_TITULO;
			$sucursal_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupsucursal=$sucursal_session->bitPaginaPopup;
			$sucursal_session->setPaginaPopupVariables(true);
			$bitPaginaPopupsucursal=$sucursal_session->bitPaginaPopup;
			$sucursal_session->bitPermiteNavegacionHaciaFKDesde=false;
			$sucursal_session->strNombrePaginaNavegacionHaciaFKDesde=ciudad_util::$STR_NOMBRE_OPCION;
			$sucursal_session->bitBusquedaDesdeFKSesionciudad=true;
			$sucursal_session->bigidciudadActual=$this->idciudadActual;

			$ciudad_session->bitBusquedaDesdeFKSesionFK=true;
			$ciudad_session->bigIdActualFK=$this->idciudadActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"sucursal"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=ciudad_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"sucursal"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(ciudad_util::$STR_SESSION_NAME,serialize($ciudad_session));
			$this->Session->write(sucursal_util::$STR_SESSION_NAME,serialize($sucursal_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupsucursal!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sucursal_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sucursal_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarciudad,$this->strTipoUsuarioAuxiliarciudad,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sucursal_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sucursal_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliarciudad,$this->strTipoUsuarioAuxiliarciudad,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaempresas(int $idciudadActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idciudadActual=$idciudadActual;

		$bitPaginaPopupempresa=false;

		try {

			$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));

			if($ciudad_session==null) {
				$ciudad_session=new ciudad_session();
			}

			$empresa_session=unserialize($this->Session->read(empresa_util::$STR_SESSION_NAME));

			if($empresa_session==null) {
				$empresa_session=new empresa_session();
			}

			$empresa_session->strUltimaBusqueda='FK_Idciudad';
			$empresa_session->strPathNavegacionActual=$ciudad_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.empresa_util::$STR_CLASS_WEB_TITULO;
			$empresa_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupempresa=$empresa_session->bitPaginaPopup;
			$empresa_session->setPaginaPopupVariables(true);
			$bitPaginaPopupempresa=$empresa_session->bitPaginaPopup;
			$empresa_session->bitPermiteNavegacionHaciaFKDesde=false;
			$empresa_session->strNombrePaginaNavegacionHaciaFKDesde=ciudad_util::$STR_NOMBRE_OPCION;
			$empresa_session->bitBusquedaDesdeFKSesionciudad=true;
			$empresa_session->bigidciudadActual=$this->idciudadActual;

			$ciudad_session->bitBusquedaDesdeFKSesionFK=true;
			$ciudad_session->bigIdActualFK=$this->idciudadActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"empresa"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=ciudad_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"empresa"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(ciudad_util::$STR_SESSION_NAME,serialize($ciudad_session));
			$this->Session->write(empresa_util::$STR_SESSION_NAME,serialize($empresa_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupempresa!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarciudad,$this->strTipoUsuarioAuxiliarciudad,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliarciudad,$this->strTipoUsuarioAuxiliarciudad,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(ciudad_util::$STR_SESSION_NAME,ciudad_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$ciudad_session=$this->Session->read(ciudad_util::$STR_SESSION_NAME);
				
		if($ciudad_session==null) {
			$ciudad_session=new ciudad_session();		
			//$this->Session->write('ciudad_session',$ciudad_session);							
		}
		*/
		
		$ciudad_session=new ciudad_session();
    	$ciudad_session->strPathNavegacionActual=ciudad_util::$STR_CLASS_WEB_TITULO;
    	$ciudad_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(ciudad_util::$STR_SESSION_NAME,serialize($ciudad_session));		
	}	
	
	public function getSetBusquedasSesionConfig(ciudad_session $ciudad_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($ciudad_session->bitBusquedaDesdeFKSesionFK!=null && $ciudad_session->bitBusquedaDesdeFKSesionFK==true) {
			if($ciudad_session->bigIdActualFK!=null && $ciudad_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$ciudad_session->bigIdActualFKParaPosibleAtras=$ciudad_session->bigIdActualFK;*/
			}
				
			$ciudad_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$ciudad_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(ciudad_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($ciudad_session->bitBusquedaDesdeFKSesionprovincia!=null && $ciudad_session->bitBusquedaDesdeFKSesionprovincia==true)
			{
				if($ciudad_session->bigidprovinciaActual!=0) {
					$this->strAccionBusqueda='FK_Idprovincia';

					$existe_history=HistoryWeb::ExisteElemento(ciudad_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(ciudad_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(ciudad_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($ciudad_session->bigidprovinciaActualDescripcion);
						$historyWeb->setIdActual($ciudad_session->bigidprovinciaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=ciudad_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$ciudad_session->bigidprovinciaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$ciudad_session->bitBusquedaDesdeFKSesionprovincia=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=ciudad_util::$INT_NUMERO_PAGINACION;

				if($ciudad_session->intNumeroPaginacion==ciudad_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=ciudad_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$ciudad_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$ciudad_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));
		
		if($ciudad_session==null) {
			$ciudad_session=new ciudad_session();
		}
		
		$ciudad_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$ciudad_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$ciudad_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='BusquedaPorCodigo') {
			$ciudad_session->codigo=$this->codigoBusquedaPorCodigo;	

		}
		else if($this->strAccionBusqueda=='BusquedaPorNombre') {
			$ciudad_session->nombre=$this->nombreBusquedaPorNombre;	

		}
		else if($this->strAccionBusqueda=='FK_Idprovincia') {
			$ciudad_session->id_provincia=$this->id_provinciaFK_Idprovincia;	

		}
		
		$this->Session->write(ciudad_util::$STR_SESSION_NAME,serialize($ciudad_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(ciudad_session $ciudad_session) {
		
		if($ciudad_session==null) {
			$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));
		}
		
		if($ciudad_session==null) {
		   $ciudad_session=new ciudad_session();
		}
		
		if($ciudad_session->strUltimaBusqueda!=null && $ciudad_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$ciudad_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$ciudad_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$ciudad_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='BusquedaPorCodigo') {
				$this->codigoBusquedaPorCodigo=$ciudad_session->codigo;
				$ciudad_session->codigo='';

			}
			 else if($this->strAccionBusqueda=='BusquedaPorNombre') {
				$this->nombreBusquedaPorNombre=$ciudad_session->nombre;
				$ciudad_session->nombre='';

			}
			 else if($this->strAccionBusqueda=='FK_Idprovincia') {
				$this->id_provinciaFK_Idprovincia=$ciudad_session->id_provincia;
				$ciudad_session->id_provincia=-1;

			}
		}
		
		$ciudad_session->strUltimaBusqueda='';
		//$ciudad_session->intNumeroPaginacion=10;
		$ciudad_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(ciudad_util::$STR_SESSION_NAME,serialize($ciudad_session));		
	}
	
	public function ciudadsControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idprovinciaDefaultFK = 0;
	}
	
	public function setciudadFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_provincia',$this->idprovinciaDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		provincia::$class;
		provincia_carga::$CONTROLLER;
		
		//REL
		

		proveedor_carga::$CONTROLLER;
		proveedor_util::$STR_SCHEMA;
		proveedor_session::class;

		cliente_carga::$CONTROLLER;
		cliente_util::$STR_SCHEMA;
		cliente_session::class;

		dato_general_usuario_carga::$CONTROLLER;
		dato_general_usuario_util::$STR_SCHEMA;
		dato_general_usuario_session::class;

		sucursal_carga::$CONTROLLER;
		sucursal_util::$STR_SCHEMA;
		sucursal_session::class;

		empresa_carga::$CONTROLLER;
		empresa_util::$STR_SCHEMA;
		empresa_session::class;
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
		interface ciudad_controlI {	
		
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
		
		public function onLoad(ciudad_session $ciudad_session=null);	
		function index(?string $strTypeOnLoadciudad='',?string $strTipoPaginaAuxiliarciudad='',?string $strTipoUsuarioAuxiliarciudad='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadciudad='',string $strTipoPaginaAuxiliarciudad='',string $strTipoUsuarioAuxiliarciudad='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($ciudadReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(ciudad $ciudadClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(ciudad_session $ciudad_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(ciudad_session $ciudad_session);	
		public function ciudadsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setciudadFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
