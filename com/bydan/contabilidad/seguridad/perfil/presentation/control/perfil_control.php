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

namespace com\bydan\contabilidad\seguridad\perfil\presentation\control;

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

use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/perfil/util/perfil_carga.php');
use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;

use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_param_return;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\presentation\session\perfil_session;


//FK


use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_carga;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_util;

//REL


use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_carga;
use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_util;
use com\bydan\contabilidad\seguridad\perfil_accion\presentation\session\perfil_accion_session;

use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_carga;
use com\bydan\contabilidad\seguridad\perfil_campo\util\perfil_campo_util;
use com\bydan\contabilidad\seguridad\perfil_campo\presentation\session\perfil_campo_session;

use com\bydan\contabilidad\seguridad\accion\util\accion_carga;
use com\bydan\contabilidad\seguridad\accion\util\accion_util;
use com\bydan\contabilidad\seguridad\accion\presentation\session\accion_session;

use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_carga;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_util;
use com\bydan\contabilidad\seguridad\perfil_opcion\presentation\session\perfil_opcion_session;

use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_carga;
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_util;
use com\bydan\contabilidad\seguridad\perfil_usuario\presentation\session\perfil_usuario_session;

use com\bydan\contabilidad\seguridad\campo\util\campo_carga;
use com\bydan\contabilidad\seguridad\campo\util\campo_util;
use com\bydan\contabilidad\seguridad\campo\presentation\session\campo_session;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;
use com\bydan\contabilidad\seguridad\usuario\presentation\session\usuario_session;

use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;
use com\bydan\contabilidad\seguridad\opcion\presentation\session\opcion_session;


/*CARGA ARCHIVOS FRAMEWORK*/
perfil_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
perfil_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
perfil_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
perfil_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*perfil_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/seguridad/perfil/presentation/control/perfil_init_control.php');
use com\bydan\contabilidad\seguridad\perfil\presentation\control\perfil_init_control;

include_once('com/bydan/contabilidad/seguridad/perfil/presentation/control/perfil_base_control.php');
use com\bydan\contabilidad\seguridad\perfil\presentation\control\perfil_base_control;

class perfil_control extends perfil_base_control {	
	
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
					
					
				if($this->data['estado']==null) {$this->data['estado']=false;} else {if($this->data['estado']=='on') {$this->data['estado']=true;}}
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
			else if($action=='registrarSesionParaperfil_acciones' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idperfilActual=$this->getDataId();
				$this->registrarSesionParaperfil_acciones($idperfilActual);
			}
			else if($action=='registrarSesionParaperfil_campos' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idperfilActual=$this->getDataId();
				$this->registrarSesionParaperfil_campos($idperfilActual);
			}
			else if($action=='registrarSesionParaperfil_opciones' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idperfilActual=$this->getDataId();
				$this->registrarSesionParaperfil_opciones($idperfilActual);
			}
			else if($action=='registrarSesionParaperfil_usuarios' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idperfilActual=$this->getDataId();
				$this->registrarSesionParaperfil_usuarios($idperfilActual);
			} 
			
			
			else if($action=="BusquedaPorNombre"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorNombreParaProcesar();
			}
			else if($action=="BusquedaPorNombre2"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorNombre2ParaProcesar();
			}
			else if($action=="FK_Idsistema"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdsistemaParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParasistema') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idperfilActual=$this->getDataId();
				$this->abrirBusquedaParasistema();//$idperfilActual
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
					
					$perfilController = new perfil_control();
					
					$perfilController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($perfilController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$perfilController = new perfil_control();
						$perfilController = $this;
						
						$jsonResponse = json_encode($perfilController->perfils);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->perfilReturnGeneral==null) {
					$this->perfilReturnGeneral=new perfil_param_return();
				}
				
				echo($this->perfilReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$perfilController=new perfil_control();
		
		$perfilController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$perfilController->usuarioActual=new usuario();
		
		$perfilController->usuarioActual->setId($this->usuarioActual->getId());
		$perfilController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$perfilController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$perfilController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$perfilController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$perfilController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$perfilController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$perfilController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $perfilController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadperfil= $this->getDataGeneralString('strTypeOnLoadperfil');
		$strTipoPaginaAuxiliarperfil= $this->getDataGeneralString('strTipoPaginaAuxiliarperfil');
		$strTipoUsuarioAuxiliarperfil= $this->getDataGeneralString('strTipoUsuarioAuxiliarperfil');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadperfil,$strTipoPaginaAuxiliarperfil,$strTipoUsuarioAuxiliarperfil,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadperfil!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('perfil','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarperfil,$this->strTipoUsuarioAuxiliarperfil,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarperfil,$this->strTipoUsuarioAuxiliarperfil,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->perfilReturnGeneral=new perfil_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->perfilReturnGeneral->conGuardarReturnSessionJs=true;
		$this->perfilReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->perfilReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->perfilReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->perfilReturnGeneral);
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
		$this->perfilReturnGeneral=new perfil_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->perfilReturnGeneral->conGuardarReturnSessionJs=true;
		$this->perfilReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->perfilReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->perfilReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->perfilReturnGeneral);
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
		$this->perfilReturnGeneral=new perfil_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->perfilReturnGeneral->conGuardarReturnSessionJs=true;
		$this->perfilReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->perfilReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->perfilReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->perfilReturnGeneral);
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
				$this->perfilLogic->getNewConnexionToDeep();
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
			
			
			$this->perfilReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->perfilReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->perfilReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->perfilReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->perfilReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->perfilReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->perfilReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->perfilReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->perfilReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->perfilReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->perfilReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->perfilReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->perfilReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->perfilReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->perfilReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->perfilReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->perfilReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->perfilReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
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
		
		$this->perfilLogic=new perfil_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->perfil=new perfil();
		
		$this->strTypeOnLoadperfil='onload';
		$this->strTipoPaginaAuxiliarperfil='none';
		$this->strTipoUsuarioAuxiliarperfil='none';	

		$this->intNumeroPaginacion=perfil_util::$INT_NUMERO_PAGINACION;
		
		$this->perfilModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->perfilControllerAdditional=new perfil_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(perfil_session $perfil_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($perfil_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadperfil='',?string $strTipoPaginaAuxiliarperfil='',?string $strTipoUsuarioAuxiliarperfil='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadperfil=$strTypeOnLoadperfil;
			$this->strTipoPaginaAuxiliarperfil=$strTipoPaginaAuxiliarperfil;
			$this->strTipoUsuarioAuxiliarperfil=$strTipoUsuarioAuxiliarperfil;
	
			if($strTipoUsuarioAuxiliarperfil=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->perfil=new perfil();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Perfiles';
			
			
			$perfil_session=unserialize($this->Session->read(perfil_util::$STR_SESSION_NAME));
							
			if($perfil_session==null) {
				$perfil_session=new perfil_session();
				
				/*$this->Session->write('perfil_session',$perfil_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($perfil_session->strFuncionJsPadre!=null && $perfil_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$perfil_session->strFuncionJsPadre;
				
				$perfil_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($perfil_session);
			
			if($strTypeOnLoadperfil!=null && $strTypeOnLoadperfil=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$perfil_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$perfil_session->setPaginaPopupVariables(true);
				}
				
				if($perfil_session->intNumeroPaginacion==perfil_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=perfil_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$perfil_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,perfil_util::$STR_SESSION_NAME,'seguridad');																
			
			} else if($strTypeOnLoadperfil!=null && $strTypeOnLoadperfil=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$perfil_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=perfil_util::$INT_NUMERO_PAGINACION;*/
				
				if($perfil_session->intNumeroPaginacion==perfil_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=perfil_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$perfil_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarperfil!=null && $strTipoPaginaAuxiliarperfil=='none') {
				/*$perfil_session->strStyleDivHeader='display:table-row';*/
				
				/*$perfil_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarperfil!=null && $strTipoPaginaAuxiliarperfil=='iframe') {
					/*
					$perfil_session->strStyleDivArbol='display:none';
					$perfil_session->strStyleDivHeader='display:none';
					$perfil_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$perfil_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->perfilClase=new perfil();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=perfil_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(perfil_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->perfilLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->perfilLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$perfilaccionLogic=new perfil_accion_logic();
			//$perfilcampoLogic=new perfil_campo_logic();
			//$perfilopcionLogic=new perfil_opcion_logic();
			//$perfilusuarioLogic=new perfil_usuario_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->perfilLogic=new perfil_logic();*/
			
			
			$this->perfilsModel=null;
			/*new ListDataModel();*/
			
			/*$this->perfilsModel.setWrappedData(perfilLogic->getperfils());*/
						
			$this->perfils= array();
			$this->perfilsEliminados=array();
			$this->perfilsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= perfil_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= perfil_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->perfil= new perfil();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleBusquedaPorNombre='display:table-row';
			$this->strVisibleBusquedaPorNombre2='display:table-row';
			$this->strVisibleFK_Idsistema='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarperfil!=null && $strTipoUsuarioAuxiliarperfil!='none' && $strTipoUsuarioAuxiliarperfil!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarperfil);
																
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
				if($strTipoUsuarioAuxiliarperfil!=null && $strTipoUsuarioAuxiliarperfil!='none' && $strTipoUsuarioAuxiliarperfil!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarperfil);
																
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
				if($strTipoUsuarioAuxiliarperfil==null || $strTipoUsuarioAuxiliarperfil=='none' || $strTipoUsuarioAuxiliarperfil=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarperfil,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, perfil_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, perfil_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina perfil');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($perfil_session);
			
			$this->getSetBusquedasSesionConfig($perfil_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteperfils($this->strAccionBusqueda,$this->perfilLogic->getperfils());*/
				} else if($this->strGenerarReporte=='Html')	{
					$perfil_session->strServletGenerarHtmlReporte='perfilServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(perfil_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(perfil_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($perfil_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$perfil_session=unserialize($this->Session->read(perfil_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarperfil!=null && $strTipoUsuarioAuxiliarperfil=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($perfil_session);
			}
								
			$this->set(perfil_util::$STR_SESSION_NAME, $perfil_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($perfil_session);
			
			/*
			$this->perfil->recursive = 0;
			
			$this->perfils=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('perfils', $this->perfils);
			
			$this->set(perfil_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->perfilActual =$this->perfilClase;
			
			/*$this->perfilActual =$this->migrarModelperfil($this->perfilClase);*/
			
			$this->returnHtml(false);
			
			$this->set(perfil_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=perfil_util::$STR_NOMBRE_OPCION;
				
			if(perfil_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=perfil_util::$STR_MODULO_OPCION.perfil_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(perfil_util::$STR_SESSION_NAME,serialize($perfil_session));
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
			/*$perfilClase= (perfil) perfilsModel.getRowData();*/
			
			$this->perfilClase->setId($this->perfil->getId());	
			$this->perfilClase->setVersionRow($this->perfil->getVersionRow());	
			$this->perfilClase->setVersionRow($this->perfil->getVersionRow());	
			$this->perfilClase->setid_sistema($this->perfil->getid_sistema());	
			$this->perfilClase->setcodigo($this->perfil->getcodigo());	
			$this->perfilClase->setnombre($this->perfil->getnombre());	
			$this->perfilClase->setnombre2($this->perfil->getnombre2());	
			$this->perfilClase->setestado($this->perfil->getestado());	
		
			/*$this->Session->write('perfilVersionRowActual', perfil.getVersionRow());*/
			
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
			
			$perfil_session=unserialize($this->Session->read(perfil_util::$STR_SESSION_NAME));
						
			if($perfil_session==null) {
				$perfil_session=new perfil_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('perfil', $this->perfil->read(null, $id));
	
			
			$this->perfil->recursive = 0;
			
			$this->perfils=$this->paginate();
			
			$this->set('perfils', $this->perfils);
	
			if (empty($this->data)) {
				$this->data = $this->perfil->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->perfilLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->perfilClase);
			
			$this->perfilActual=$this->perfilClase;
			
			/*$this->perfilActual =$this->migrarModelperfil($this->perfilClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->perfilLogic->getperfils(),$this->perfilActual);
			
			$this->actualizarControllerConReturnGeneral($this->perfilReturnGeneral);
			
			//$this->perfilReturnGeneral=$this->perfilLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->perfilLogic->getperfils(),$this->perfilActual,$this->perfilParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$perfil_session=unserialize($this->Session->read(perfil_util::$STR_SESSION_NAME));
						
			if($perfil_session==null) {
				$perfil_session=new perfil_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoperfil', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->perfilClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->perfilClase);
			
			$this->perfilActual =$this->perfilClase;
			
			/*$this->perfilActual =$this->migrarModelperfil($this->perfilClase);*/
			
			$this->setperfilFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->perfilLogic->getperfils(),$this->perfil);
			
			$this->actualizarControllerConReturnGeneral($this->perfilReturnGeneral);
			
			//this->perfilReturnGeneral=$this->perfilLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->perfilLogic->getperfils(),$this->perfil,$this->perfilParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idsistemaDefaultFK!=null && $this->idsistemaDefaultFK > -1) {
				$this->perfilReturnGeneral->getperfil()->setid_sistema($this->idsistemaDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->perfilReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->perfilReturnGeneral->getperfil(),$this->perfilActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyperfil($this->perfilReturnGeneral->getperfil());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioperfil($this->perfilReturnGeneral->getperfil());*/
			}
			
			if($this->perfilReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->perfilReturnGeneral->getperfil(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualperfil($this->perfil,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->perfilsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->perfilsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->perfilsAuxiliar=array();
			}
			
			if(count($this->perfilsAuxiliar)==2) {
				$perfilOrigen=$this->perfilsAuxiliar[0];
				$perfilDestino=$this->perfilsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($perfilOrigen,$perfilDestino,true,false,false);
				
				$this->actualizarLista($perfilDestino,$this->perfils);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->perfilsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->perfilsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->perfilsAuxiliar=array();
			}
			
			if(count($this->perfilsAuxiliar) > 0) {
				foreach ($this->perfilsAuxiliar as $perfilSeleccionado) {
					$this->perfil=new perfil();
					
					$this->setCopiarVariablesObjetos($perfilSeleccionado,$this->perfil,true,true,false);
						
					$this->perfils[]=$this->perfil;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->perfilsEliminados as $perfilEliminado) {
				$this->perfilLogic->perfils[]=$perfilEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->perfil=new perfil();
							
				$this->perfils[]=$this->perfil;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
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
		
		$perfilActual=new perfil();
		
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
				
				$perfilActual=$this->perfils[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $perfilActual->setid_sistema((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $perfilActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $perfilActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $perfilActual->setnombre2($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $perfilActual->setestado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_7')));  } else { $perfilActual->setestado(false); }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->perfilsAuxiliar=array();		 
		/*$this->perfilsEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->perfilsAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->perfilsAuxiliar=array();
		}
			
		if(count($this->perfilsAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->perfilsAuxiliar as $perfilAuxLocal) {				
				
				foreach($this->perfils as $perfilLocal) {
					if($perfilLocal->getId()==$perfilAuxLocal->getId()) {
						$perfilLocal->setIsDeleted(true);
						
						/*$this->perfilsEliminados[]=$perfilLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->perfilLogic->setperfils($this->perfils);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
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
				$this->perfilLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=perfil_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadperfil='',string $strTipoPaginaAuxiliarperfil='',string $strTipoUsuarioAuxiliarperfil='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadperfil,$strTipoPaginaAuxiliarperfil,$strTipoUsuarioAuxiliarperfil,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->perfils) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=perfil_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=perfil_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=perfil_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$perfil_session=unserialize($this->Session->read(perfil_util::$STR_SESSION_NAME));
						
			if($perfil_session==null) {
				$perfil_session=new perfil_session();
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
					/*$this->intNumeroPaginacion=perfil_util::$INT_NUMERO_PAGINACION;*/
					
					if($perfil_session->intNumeroPaginacion==perfil_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=perfil_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$perfil_session->intNumeroPaginacion;
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
			
			$this->perfilsEliminados=array();
			
			/*$this->perfilLogic->setConnexion($connexion);*/
			
			$this->perfilLogic->setIsConDeep(true);
			
			$this->perfilLogic->getperfilDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('sistema');$classes[]=$class;
			
			$this->perfilLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->perfilLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->perfilLogic->getperfils()==null|| count($this->perfilLogic->getperfils())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->perfils=$this->perfilLogic->getperfils();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->perfilLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->perfilsReporte=$this->perfilLogic->getperfils();
									
						/*$this->generarReportes('Todos',$this->perfilLogic->getperfils());*/
					
						$this->perfilLogic->setperfils($this->perfils);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->perfilLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->perfilLogic->getperfils()==null|| count($this->perfilLogic->getperfils())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->perfils=$this->perfilLogic->getperfils();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->perfilLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->perfilsReporte=$this->perfilLogic->getperfils();
									
						/*$this->generarReportes('Todos',$this->perfilLogic->getperfils());*/
					
						$this->perfilLogic->setperfils($this->perfils);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idperfil=0;*/
				
				if($perfil_session->bitBusquedaDesdeFKSesionFK!=null && $perfil_session->bitBusquedaDesdeFKSesionFK==true) {
					if($perfil_session->bigIdActualFK!=null && $perfil_session->bigIdActualFK!=0)	{
						$this->idperfil=$perfil_session->bigIdActualFK;	
					}
					
					$perfil_session->bitBusquedaDesdeFKSesionFK=false;
					
					$perfil_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idperfil=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idperfil=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->perfilLogic->getEntity($this->idperfil);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*perfilLogicAdditional::getDetalleIndicePorId($idperfil);*/

				
				if($this->perfilLogic->getperfil()!=null) {
					$this->perfilLogic->setperfils(array());
					$this->perfilLogic->perfils[]=$this->perfilLogic->getperfil();
				}
			
			}
		
			else if($strAccionBusqueda=='BusquedaPorNombre')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfilLogic->getsBusquedaPorNombre($finalQueryPaginacion,$this->pagination,$this->nombreBusquedaPorNombre);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//perfilLogicAdditional::getDetalleIndiceBusquedaPorNombre($this->nombreBusquedaPorNombre);


					if($this->perfilLogic->getperfils()==null || count($this->perfilLogic->getperfils())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$perfils=$this->perfilLogic->getperfils();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfilLogic->getsBusquedaPorNombre('',$this->pagination,$this->nombreBusquedaPorNombre);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->perfilsReporte=$this->perfilLogic->getperfils();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteperfils("BusquedaPorNombre",$this->perfilLogic->getperfils());

					if($this->strTipoPaginacion=='TODOS') {
						$this->perfilLogic->setperfils($perfils);
					}
				//}

			}
			else if($strAccionBusqueda=='BusquedaPorNombre2')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfilLogic->getsBusquedaPorNombre2($finalQueryPaginacion,$this->pagination,$this->nombre2BusquedaPorNombre2);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//perfilLogicAdditional::getDetalleIndiceBusquedaPorNombre2($this->nombre2BusquedaPorNombre2);


					if($this->perfilLogic->getperfils()==null || count($this->perfilLogic->getperfils())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$perfils=$this->perfilLogic->getperfils();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfilLogic->getsBusquedaPorNombre2('',$this->pagination,$this->nombre2BusquedaPorNombre2);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->perfilsReporte=$this->perfilLogic->getperfils();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteperfils("BusquedaPorNombre2",$this->perfilLogic->getperfils());

					if($this->strTipoPaginacion=='TODOS') {
						$this->perfilLogic->setperfils($perfils);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsistema')
			{

				if($perfil_session->bigidsistemaActual!=null && $perfil_session->bigidsistemaActual!=0)
				{
					$this->id_sistemaFK_Idsistema=$perfil_session->bigidsistemaActual;
					$perfil_session->bigidsistemaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfilLogic->getsFK_Idsistema($finalQueryPaginacion,$this->pagination,$this->id_sistemaFK_Idsistema);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//perfilLogicAdditional::getDetalleIndiceFK_Idsistema($this->id_sistemaFK_Idsistema);


					if($this->perfilLogic->getperfils()==null || count($this->perfilLogic->getperfils())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$perfils=$this->perfilLogic->getperfils();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfilLogic->getsFK_Idsistema('',$this->pagination,$this->id_sistemaFK_Idsistema);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->perfilsReporte=$this->perfilLogic->getperfils();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteperfils("FK_Idsistema",$this->perfilLogic->getperfils());

					if($this->strTipoPaginacion=='TODOS') {
						$this->perfilLogic->setperfils($perfils);
					}
				//}

			}
			else if($strAccionBusqueda=='PorIdSistemaPorNombre')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfilLogic->getPorIdSistemaPorNombre($this->id_sistemaPorIdSistemaPorNombre,$this->nombrePorIdSistemaPorNombre);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//perfilLogicAdditional::getDetalleIndicePorIdSistemaPorNombre($this->id_sistemaPorIdSistemaPorNombre,$this->nombrePorIdSistemaPorNombre);


					if($this->perfilLogic->getperfil()!=null && $this->perfilLogic->getperfil()->getId()!=0) {
					} else {
					}

			} 
		
		$perfil_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$perfil_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->perfilLogic->loadForeignsKeysDescription();*/
		
		$this->perfils=$this->perfilLogic->getperfils();
		
		if($this->perfilsEliminados==null) {
			$this->perfilsEliminados=array();
		}
		
		$this->Session->write(perfil_util::$STR_SESSION_NAME.'Lista',serialize($this->perfils));
		$this->Session->write(perfil_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->perfilsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(perfil_util::$STR_SESSION_NAME,serialize($perfil_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idperfil=$idGeneral;
			
			$this->intNumeroPaginacion=perfil_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
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
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}

			if(count($this->perfils) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
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
				$this->perfilLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=perfil_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->nombreBusquedaPorNombre=(string)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorNombre','txtnombre');

			$this->strAccionBusqueda='BusquedaPorNombre';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsBusquedaPorNombre2ParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=perfil_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->nombre2BusquedaPorNombre2=(string)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorNombre2','txtnombre2');

			$this->strAccionBusqueda='BusquedaPorNombre2';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdsistemaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=perfil_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sistemaFK_Idsistema=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsistema','cmbid_sistema');

			$this->strAccionBusqueda='FK_Idsistema';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getPorIdSistemaPorNombreParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=perfil_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sistemaPorIdSistemaPorNombre=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'PorIdSistemaPorNombre','cmbid_sistema');
			$this->nombrePorIdSistemaPorNombre=(string)$this->getDataCampoFormTabla(''.$this->strSufijo.'PorIdSistemaPorNombre','txtnombre');

			$this->strAccionBusqueda='PorIdSistemaPorNombre';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsBusquedaPorNombre($strFinalQuery,$nombre)
	{
		try
		{

			$this->perfilLogic->getsBusquedaPorNombre($strFinalQuery,new Pagination(),$nombre);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsBusquedaPorNombre2($strFinalQuery,$nombre2)
	{
		try
		{

			$this->perfilLogic->getsBusquedaPorNombre2($strFinalQuery,new Pagination(),$nombre2);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idsistema($strFinalQuery,$id_sistema)
	{
		try
		{

			$this->perfilLogic->getsFK_Idsistema($strFinalQuery,new Pagination(),$id_sistema);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getPorIdSistemaPorNombre($id_sistema,$nombre)
	{
		try
		{

			$this->perfilLogic->getperfilPorIdSistemaPorNombre($id_sistema,$nombre);
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
			
			
			$perfilForeignKey=new perfil_param_return(); //perfilForeignKey();
			
			$perfil_session=unserialize($this->Session->read(perfil_util::$STR_SESSION_NAME));
						
			if($perfil_session==null) {
				$perfil_session=new perfil_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$perfilForeignKey=$this->perfilLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$perfil_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sistema',$this->strRecargarFkTipos,',')) {
				$this->sistemasFK=$perfilForeignKey->sistemasFK;
				$this->idsistemaDefaultFK=$perfilForeignKey->idsistemaDefaultFK;
			}

			if($perfil_session->bitBusquedaDesdeFKSesionsistema) {
				$this->setVisibleBusquedasParasistema(true);
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
	
	function cargarCombosFKFromReturnGeneral($perfilReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$perfilReturnGeneral->strRecargarFkTipos;
			
			


			if($perfilReturnGeneral->con_sistemasFK==true) {
				$this->sistemasFK=$perfilReturnGeneral->sistemasFK;
				$this->idsistemaDefaultFK=$perfilReturnGeneral->idsistemaDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(perfil_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$perfil_session=unserialize($this->Session->read(perfil_util::$STR_SESSION_NAME));
		
		if($perfil_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($perfil_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sistema_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sistema';
			}
			
			$perfil_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}						
			
			$this->perfilsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->perfilsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->perfilsAuxiliar=array();
			}
			
			if(count($this->perfilsAuxiliar) > 0) {
				
				foreach ($this->perfilsAuxiliar as $perfilSeleccionado) {
					$this->eliminarTablaBase($perfilSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('perfil_accion');
			$tipoRelacionReporte->setsDescripcion(' Acciones');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('perfil_campo');
			$tipoRelacionReporte->setsDescripcion(' Campos');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('perfil_opcion');
			$tipoRelacionReporte->setsDescripcion(' Opciones');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('perfil_usuario');
			$tipoRelacionReporte->setsDescripcion('Usuarios es s');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=perfil_accion_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=perfil_campo_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=perfil_opcion_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=perfil_usuario_util::$STR_NOMBRE_CLASE;
		
		return $arrNombresClasesRelacionadasLocal;
	}
	
	
	public function setstrRecargarFkInicializar() {
		$this->setstrRecargarFk('TODOS','NINGUNO',0,'');		
	}
	
	
	
	public function getsistemasFKListSelectItem() 
	{
		$sistemasList=array();

		$item=null;

		foreach($this->sistemasFK as $sistema)
		{
			$item=new SelectItem();
			$item->setLabel($sistema->getnombre_principal());
			$item->setValue($sistema->getId());
			$sistemasList[]=$item;
		}

		return $sistemasList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=perfil_util::$INT_NUMERO_PAGINACION;
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
				$this->perfilLogic->commitNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->rollbackNewConnexionToDeep();
				$this->perfilLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$perfilsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->perfils as $perfilLocal) {
				if($perfilLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->perfil=new perfil();
				
				$this->perfil->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->perfils[]=$this->perfil;*/
				
				$perfilsNuevos[]=$this->perfil;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('sistema');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfilLogic->setperfils($perfilsNuevos);
					
				$this->perfilLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($perfilsNuevos as $perfilNuevo) {
					$this->perfils[]=$perfilNuevo;
				}
				
				/*$this->perfils[]=$perfilsNuevos;*/
				
				$this->perfilLogic->setperfils($this->perfils);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($perfilsNuevos!=null);
	}
					
	
	public function cargarCombossistemasFK($connexion=null,$strRecargarFkQuery=''){
		$sistemaLogic= new sistema_logic();
		$pagination= new Pagination();
		$this->sistemasFK=array();

		$sistemaLogic->setConnexion($connexion);
		$sistemaLogic->getsistemaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$perfil_session=unserialize($this->Session->read(perfil_util::$STR_SESSION_NAME));

		if($perfil_session==null) {
			$perfil_session=new perfil_session();
		}
		
		if($perfil_session->bitBusquedaDesdeFKSesionsistema!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=sistema_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalsistema=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsistema=Funciones::GetFinalQueryAppend($finalQueryGlobalsistema, '');
				$finalQueryGlobalsistema.=sistema_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsistema.$strRecargarFkQuery;		

				$sistemaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombossistemasFK($sistemaLogic->getsistemas());

		} else {
			$this->setVisibleBusquedasParasistema(true);


			if($perfil_session->bigidsistemaActual!=null && $perfil_session->bigidsistemaActual > 0) {
				$sistemaLogic->getEntity($perfil_session->bigidsistemaActual);//WithConnection

				$this->sistemasFK[$sistemaLogic->getsistema()->getId()]=perfil_util::getsistemaDescripcion($sistemaLogic->getsistema());
				$this->idsistemaDefaultFK=$sistemaLogic->getsistema()->getId();
			}
		}
	}

	
	
	public function prepararCombossistemasFK($sistemas){

		foreach ($sistemas as $sistemaLocal ) {
			if($this->idsistemaDefaultFK==0) {
				$this->idsistemaDefaultFK=$sistemaLocal->getId();
			}

			$this->sistemasFK[$sistemaLocal->getId()]=perfil_util::getsistemaDescripcion($sistemaLocal);
		}
	}

	
	
	public function cargarDescripcionsistemaFK($idsistema,$connexion=null){
		$sistemaLogic= new sistema_logic();
		$sistemaLogic->setConnexion($connexion);
		$sistemaLogic->getsistemaDataAccess()->isForFKData=true;
		$strDescripcionsistema='';

		if($idsistema!=null && $idsistema!='' && $idsistema!='null') {
			if($connexion!=null) {
				$sistemaLogic->getEntity($idsistema);//WithConnection
			} else {
				$sistemaLogic->getEntityWithConnection($idsistema);//
			}

			$strDescripcionsistema=perfil_util::getsistemaDescripcion($sistemaLogic->getsistema());

		} else {
			$strDescripcionsistema='null';
		}

		return $strDescripcionsistema;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(perfil $perfilClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParasistema($isParasistema){
		$strParaVisiblesistema='display:table-row';
		$strParaVisibleNegacionsistema='display:none';

		if($isParasistema) {
			$strParaVisiblesistema='display:table-row';
			$strParaVisibleNegacionsistema='display:none';
		} else {
			$strParaVisiblesistema='display:none';
			$strParaVisibleNegacionsistema='display:table-row';
		}


		$strParaVisibleNegacionsistema=trim($strParaVisibleNegacionsistema);

		$this->strVisibleBusquedaPorNombre=$strParaVisibleNegacionsistema;
		$this->strVisibleBusquedaPorNombre2=$strParaVisibleNegacionsistema;
		$this->strVisibleFK_Idsistema=$strParaVisiblesistema;
	}
	
	

	public function abrirBusquedaParasistema() {//$idperfilActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idperfilActual=$idperfilActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sistema_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.perfilJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sistema(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sistema_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.perfilJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sistema(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sistema_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarperfil,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParaperfil_acciones(int $idperfilActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idperfilActual=$idperfilActual;

		$bitPaginaPopupperfil_accion=false;

		try {

			$perfil_session=unserialize($this->Session->read(perfil_util::$STR_SESSION_NAME));

			if($perfil_session==null) {
				$perfil_session=new perfil_session();
			}

			$perfil_accion_session=unserialize($this->Session->read(perfil_accion_util::$STR_SESSION_NAME));

			if($perfil_accion_session==null) {
				$perfil_accion_session=new perfil_accion_session();
			}

			$perfil_accion_session->strUltimaBusqueda='FK_Idperfil';
			$perfil_accion_session->strPathNavegacionActual=$perfil_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.perfil_accion_util::$STR_CLASS_WEB_TITULO;
			$perfil_accion_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupperfil_accion=$perfil_accion_session->bitPaginaPopup;
			$perfil_accion_session->setPaginaPopupVariables(true);
			$bitPaginaPopupperfil_accion=$perfil_accion_session->bitPaginaPopup;
			$perfil_accion_session->bitPermiteNavegacionHaciaFKDesde=false;
			$perfil_accion_session->strNombrePaginaNavegacionHaciaFKDesde=perfil_util::$STR_NOMBRE_OPCION;
			$perfil_accion_session->bitBusquedaDesdeFKSesionperfil=true;
			$perfil_accion_session->bigidperfilActual=$this->idperfilActual;

			$perfil_session->bitBusquedaDesdeFKSesionFK=true;
			$perfil_session->bigIdActualFK=$this->idperfilActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"perfil_accion"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=perfil_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"perfil_accion"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(perfil_util::$STR_SESSION_NAME,serialize($perfil_session));
			$this->Session->write(perfil_accion_util::$STR_SESSION_NAME,serialize($perfil_accion_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupperfil_accion!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',perfil_accion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_accion_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarperfil,$this->strTipoUsuarioAuxiliarperfil,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',perfil_accion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_accion_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliarperfil,$this->strTipoUsuarioAuxiliarperfil,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaperfil_campos(int $idperfilActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idperfilActual=$idperfilActual;

		$bitPaginaPopupperfil_campo=false;

		try {

			$perfil_session=unserialize($this->Session->read(perfil_util::$STR_SESSION_NAME));

			if($perfil_session==null) {
				$perfil_session=new perfil_session();
			}

			$perfil_campo_session=unserialize($this->Session->read(perfil_campo_util::$STR_SESSION_NAME));

			if($perfil_campo_session==null) {
				$perfil_campo_session=new perfil_campo_session();
			}

			$perfil_campo_session->strUltimaBusqueda='FK_Idperfil';
			$perfil_campo_session->strPathNavegacionActual=$perfil_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.perfil_campo_util::$STR_CLASS_WEB_TITULO;
			$perfil_campo_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupperfil_campo=$perfil_campo_session->bitPaginaPopup;
			$perfil_campo_session->setPaginaPopupVariables(true);
			$bitPaginaPopupperfil_campo=$perfil_campo_session->bitPaginaPopup;
			$perfil_campo_session->bitPermiteNavegacionHaciaFKDesde=false;
			$perfil_campo_session->strNombrePaginaNavegacionHaciaFKDesde=perfil_util::$STR_NOMBRE_OPCION;
			$perfil_campo_session->bitBusquedaDesdeFKSesionperfil=true;
			$perfil_campo_session->bigidperfilActual=$this->idperfilActual;

			$perfil_session->bitBusquedaDesdeFKSesionFK=true;
			$perfil_session->bigIdActualFK=$this->idperfilActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"perfil_campo"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=perfil_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"perfil_campo"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(perfil_util::$STR_SESSION_NAME,serialize($perfil_session));
			$this->Session->write(perfil_campo_util::$STR_SESSION_NAME,serialize($perfil_campo_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupperfil_campo!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',perfil_campo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_campo_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarperfil,$this->strTipoUsuarioAuxiliarperfil,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',perfil_campo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_campo_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliarperfil,$this->strTipoUsuarioAuxiliarperfil,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaperfil_opciones(int $idperfilActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idperfilActual=$idperfilActual;

		$bitPaginaPopupperfil_opcion=false;

		try {

			$perfil_session=unserialize($this->Session->read(perfil_util::$STR_SESSION_NAME));

			if($perfil_session==null) {
				$perfil_session=new perfil_session();
			}

			$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));

			if($perfil_opcion_session==null) {
				$perfil_opcion_session=new perfil_opcion_session();
			}

			$perfil_opcion_session->strUltimaBusqueda='FK_Idperfil';
			$perfil_opcion_session->strPathNavegacionActual=$perfil_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.perfil_opcion_util::$STR_CLASS_WEB_TITULO;
			$perfil_opcion_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupperfil_opcion=$perfil_opcion_session->bitPaginaPopup;
			$perfil_opcion_session->setPaginaPopupVariables(true);
			$bitPaginaPopupperfil_opcion=$perfil_opcion_session->bitPaginaPopup;
			$perfil_opcion_session->bitPermiteNavegacionHaciaFKDesde=false;
			$perfil_opcion_session->strNombrePaginaNavegacionHaciaFKDesde=perfil_util::$STR_NOMBRE_OPCION;
			$perfil_opcion_session->bitBusquedaDesdeFKSesionperfil=true;
			$perfil_opcion_session->bigidperfilActual=$this->idperfilActual;

			$perfil_session->bitBusquedaDesdeFKSesionFK=true;
			$perfil_session->bigIdActualFK=$this->idperfilActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"perfil_opcion"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=perfil_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"perfil_opcion"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(perfil_util::$STR_SESSION_NAME,serialize($perfil_session));
			$this->Session->write(perfil_opcion_util::$STR_SESSION_NAME,serialize($perfil_opcion_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupperfil_opcion!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',perfil_opcion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_opcion_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarperfil,$this->strTipoUsuarioAuxiliarperfil,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',perfil_opcion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_opcion_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliarperfil,$this->strTipoUsuarioAuxiliarperfil,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaperfil_usuarios(int $idperfilActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idperfilActual=$idperfilActual;

		$bitPaginaPopupperfil_usuario=false;

		try {

			$perfil_session=unserialize($this->Session->read(perfil_util::$STR_SESSION_NAME));

			if($perfil_session==null) {
				$perfil_session=new perfil_session();
			}

			$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));

			if($perfil_usuario_session==null) {
				$perfil_usuario_session=new perfil_usuario_session();
			}

			$perfil_usuario_session->strUltimaBusqueda='FK_Idperfil';
			$perfil_usuario_session->strPathNavegacionActual=$perfil_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.perfil_usuario_util::$STR_CLASS_WEB_TITULO;
			$perfil_usuario_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupperfil_usuario=$perfil_usuario_session->bitPaginaPopup;
			$perfil_usuario_session->setPaginaPopupVariables(true);
			$bitPaginaPopupperfil_usuario=$perfil_usuario_session->bitPaginaPopup;
			$perfil_usuario_session->bitPermiteNavegacionHaciaFKDesde=false;
			$perfil_usuario_session->strNombrePaginaNavegacionHaciaFKDesde=perfil_util::$STR_NOMBRE_OPCION;
			$perfil_usuario_session->bitBusquedaDesdeFKSesionperfil=true;
			$perfil_usuario_session->bigidperfilActual=$this->idperfilActual;

			$perfil_session->bitBusquedaDesdeFKSesionFK=true;
			$perfil_session->bigIdActualFK=$this->idperfilActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"perfil_usuario"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=perfil_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"perfil_usuario"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(perfil_util::$STR_SESSION_NAME,serialize($perfil_session));
			$this->Session->write(perfil_usuario_util::$STR_SESSION_NAME,serialize($perfil_usuario_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupperfil_usuario!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',perfil_usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarperfil,$this->strTipoUsuarioAuxiliarperfil,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',perfil_usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_usuario_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliarperfil,$this->strTipoUsuarioAuxiliarperfil,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(perfil_util::$STR_SESSION_NAME,perfil_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$perfil_session=$this->Session->read(perfil_util::$STR_SESSION_NAME);
				
		if($perfil_session==null) {
			$perfil_session=new perfil_session();		
			//$this->Session->write('perfil_session',$perfil_session);							
		}
		*/
		
		$perfil_session=new perfil_session();
    	$perfil_session->strPathNavegacionActual=perfil_util::$STR_CLASS_WEB_TITULO;
    	$perfil_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(perfil_util::$STR_SESSION_NAME,serialize($perfil_session));		
	}	
	
	public function getSetBusquedasSesionConfig(perfil_session $perfil_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($perfil_session->bitBusquedaDesdeFKSesionFK!=null && $perfil_session->bitBusquedaDesdeFKSesionFK==true) {
			if($perfil_session->bigIdActualFK!=null && $perfil_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$perfil_session->bigIdActualFKParaPosibleAtras=$perfil_session->bigIdActualFK;*/
			}
				
			$perfil_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$perfil_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(perfil_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($perfil_session->bitBusquedaDesdeFKSesionsistema!=null && $perfil_session->bitBusquedaDesdeFKSesionsistema==true)
			{
				if($perfil_session->bigidsistemaActual!=0) {
					$this->strAccionBusqueda='FK_Idsistema';

					$existe_history=HistoryWeb::ExisteElemento(perfil_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(perfil_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(perfil_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($perfil_session->bigidsistemaActualDescripcion);
						$historyWeb->setIdActual($perfil_session->bigidsistemaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=perfil_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$perfil_session->bigidsistemaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$perfil_session->bitBusquedaDesdeFKSesionsistema=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=perfil_util::$INT_NUMERO_PAGINACION;

				if($perfil_session->intNumeroPaginacion==perfil_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=perfil_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$perfil_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$perfil_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$perfil_session=unserialize($this->Session->read(perfil_util::$STR_SESSION_NAME));
		
		if($perfil_session==null) {
			$perfil_session=new perfil_session();
		}
		
		$perfil_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$perfil_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$perfil_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='BusquedaPorNombre') {
			$perfil_session->nombre=$this->nombreBusquedaPorNombre;	

		}
		else if($this->strAccionBusqueda=='BusquedaPorNombre2') {
			$perfil_session->nombre2=$this->nombre2BusquedaPorNombre2;	

		}
		else if($this->strAccionBusqueda=='FK_Idsistema') {
			$perfil_session->id_sistema=$this->id_sistemaFK_Idsistema;	

		}
		
		$this->Session->write(perfil_util::$STR_SESSION_NAME,serialize($perfil_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(perfil_session $perfil_session) {
		
		if($perfil_session==null) {
			$perfil_session=unserialize($this->Session->read(perfil_util::$STR_SESSION_NAME));
		}
		
		if($perfil_session==null) {
		   $perfil_session=new perfil_session();
		}
		
		if($perfil_session->strUltimaBusqueda!=null && $perfil_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$perfil_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$perfil_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$perfil_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='BusquedaPorNombre') {
				$this->nombreBusquedaPorNombre=$perfil_session->nombre;
				$perfil_session->nombre='';

			}
			 else if($this->strAccionBusqueda=='BusquedaPorNombre2') {
				$this->nombre2BusquedaPorNombre2=$perfil_session->nombre2;
				$perfil_session->nombre2='';

			}
			 else if($this->strAccionBusqueda=='FK_Idsistema') {
				$this->id_sistemaFK_Idsistema=$perfil_session->id_sistema;
				$perfil_session->id_sistema=-1;

			}
		}
		
		$perfil_session->strUltimaBusqueda='';
		//$perfil_session->intNumeroPaginacion=10;
		$perfil_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(perfil_util::$STR_SESSION_NAME,serialize($perfil_session));		
	}
	
	public function perfilsControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idsistemaDefaultFK = 0;
	}
	
	public function setperfilFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_sistema',$this->idsistemaDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		sistema::$class;
		sistema_carga::$CONTROLLER;
		
		//REL
		

		perfil_accion_carga::$CONTROLLER;
		perfil_accion_util::$STR_SCHEMA;
		perfil_accion_session::class;

		perfil_campo_carga::$CONTROLLER;
		perfil_campo_util::$STR_SCHEMA;
		perfil_campo_session::class;

		accion_carga::$CONTROLLER;
		accion_util::$STR_SCHEMA;
		accion_session::class;

		perfil_opcion_carga::$CONTROLLER;
		perfil_opcion_util::$STR_SCHEMA;
		perfil_opcion_session::class;

		perfil_usuario_carga::$CONTROLLER;
		perfil_usuario_util::$STR_SCHEMA;
		perfil_usuario_session::class;

		campo_carga::$CONTROLLER;
		campo_util::$STR_SCHEMA;
		campo_session::class;

		usuario_carga::$CONTROLLER;
		usuario_util::$STR_SCHEMA;
		usuario_session::class;

		opcion_carga::$CONTROLLER;
		opcion_util::$STR_SCHEMA;
		opcion_session::class;
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
		interface perfil_controlI {	
		
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
		
		public function onLoad(perfil_session $perfil_session=null);	
		function index(?string $strTypeOnLoadperfil='',?string $strTipoPaginaAuxiliarperfil='',?string $strTipoUsuarioAuxiliarperfil='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadperfil='',string $strTipoPaginaAuxiliarperfil='',string $strTipoUsuarioAuxiliarperfil='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($perfilReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(perfil $perfilClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(perfil_session $perfil_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(perfil_session $perfil_session);	
		public function perfilsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setperfilFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
