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

namespace com\bydan\contabilidad\seguridad\provincia\presentation\control;

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

use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/provincia/util/provincia_carga.php');
use com\bydan\contabilidad\seguridad\provincia\util\provincia_carga;

use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_param_return;
use com\bydan\contabilidad\seguridad\provincia\business\logic\provincia_logic;
use com\bydan\contabilidad\seguridad\provincia\presentation\session\provincia_session;


//FK


use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

//REL


use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;
use com\bydan\contabilidad\seguridad\ciudad\presentation\session\ciudad_session;

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;
use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\session\dato_general_usuario_session;


/*CARGA ARCHIVOS FRAMEWORK*/
provincia_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
provincia_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
provincia_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
provincia_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*provincia_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/seguridad/provincia/presentation/control/provincia_init_control.php');
use com\bydan\contabilidad\seguridad\provincia\presentation\control\provincia_init_control;

include_once('com/bydan/contabilidad/seguridad/provincia/presentation/control/provincia_base_control.php');
use com\bydan\contabilidad\seguridad\provincia\presentation\control\provincia_base_control;

class provincia_control extends provincia_base_control {	
	
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
			else if($action=='registrarSesionParaciudades' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idprovinciaActual=$this->getDataId();
				$this->registrarSesionParaciudades($idprovinciaActual);
			}
			else if($action=='registrarSesionParaproveedores' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idprovinciaActual=$this->getDataId();
				$this->registrarSesionParaproveedores($idprovinciaActual);
			}
			else if($action=='registrarSesionParaclientes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idprovinciaActual=$this->getDataId();
				$this->registrarSesionParaclientes($idprovinciaActual);
			}
			else if($action=='registrarSesionParadato_general_usuarios' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idprovinciaActual=$this->getDataId();
				$this->registrarSesionParadato_general_usuarios($idprovinciaActual);
			} 
			
			
			else if($action=="BusquedaPorcodigo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorcodigoParaProcesar();
			}
			else if($action=="BusquedaPornombre"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPornombreParaProcesar();
			}
			else if($action=="FK_Idpais"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdpaisParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParapais') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idprovinciaActual=$this->getDataId();
				$this->abrirBusquedaParapais();//$idprovinciaActual
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
					
					$provinciaController = new provincia_control();
					
					$provinciaController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($provinciaController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$provinciaController = new provincia_control();
						$provinciaController = $this;
						
						$jsonResponse = json_encode($provinciaController->provincias);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->provinciaReturnGeneral==null) {
					$this->provinciaReturnGeneral=new provincia_param_return();
				}
				
				echo($this->provinciaReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$provinciaController=new provincia_control();
		
		$provinciaController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$provinciaController->usuarioActual=new usuario();
		
		$provinciaController->usuarioActual->setId($this->usuarioActual->getId());
		$provinciaController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$provinciaController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$provinciaController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$provinciaController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$provinciaController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$provinciaController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$provinciaController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $provinciaController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadprovincia= $this->getDataGeneralString('strTypeOnLoadprovincia');
		$strTipoPaginaAuxiliarprovincia= $this->getDataGeneralString('strTipoPaginaAuxiliarprovincia');
		$strTipoUsuarioAuxiliarprovincia= $this->getDataGeneralString('strTipoUsuarioAuxiliarprovincia');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadprovincia,$strTipoPaginaAuxiliarprovincia,$strTipoUsuarioAuxiliarprovincia,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadprovincia!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('provincia','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(provincia_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarprovincia,$this->strTipoUsuarioAuxiliarprovincia,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(provincia_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarprovincia,$this->strTipoUsuarioAuxiliarprovincia,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->provinciaReturnGeneral=new provincia_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->provinciaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->provinciaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->provinciaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->provinciaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->provinciaReturnGeneral);
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
		$this->provinciaReturnGeneral=new provincia_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->provinciaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->provinciaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->provinciaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->provinciaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->provinciaReturnGeneral);
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
		$this->provinciaReturnGeneral=new provincia_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->provinciaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->provinciaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->provinciaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->provinciaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->provinciaReturnGeneral);
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
				$this->provinciaLogic->getNewConnexionToDeep();
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
			
			
			$this->provinciaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->provinciaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->provinciaReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->provinciaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->provinciaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->provinciaReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->provinciaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->provinciaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->provinciaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->provinciaReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->provinciaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->provinciaReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->provinciaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->provinciaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->provinciaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->provinciaReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->provinciaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->provinciaReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
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
		
		$this->provinciaLogic=new provincia_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->provincia=new provincia();
		
		$this->strTypeOnLoadprovincia='onload';
		$this->strTipoPaginaAuxiliarprovincia='none';
		$this->strTipoUsuarioAuxiliarprovincia='none';	

		$this->intNumeroPaginacion=provincia_util::$INT_NUMERO_PAGINACION;
		
		$this->provinciaModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->provinciaControllerAdditional=new provincia_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(provincia_session $provincia_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($provincia_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadprovincia='',?string $strTipoPaginaAuxiliarprovincia='',?string $strTipoUsuarioAuxiliarprovincia='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadprovincia=$strTypeOnLoadprovincia;
			$this->strTipoPaginaAuxiliarprovincia=$strTipoPaginaAuxiliarprovincia;
			$this->strTipoUsuarioAuxiliarprovincia=$strTipoUsuarioAuxiliarprovincia;
	
			if($strTipoUsuarioAuxiliarprovincia=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->provincia=new provincia();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Provinciaes';
			
			
			$provincia_session=unserialize($this->Session->read(provincia_util::$STR_SESSION_NAME));
							
			if($provincia_session==null) {
				$provincia_session=new provincia_session();
				
				/*$this->Session->write('provincia_session',$provincia_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($provincia_session->strFuncionJsPadre!=null && $provincia_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$provincia_session->strFuncionJsPadre;
				
				$provincia_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($provincia_session);
			
			if($strTypeOnLoadprovincia!=null && $strTypeOnLoadprovincia=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$provincia_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$provincia_session->setPaginaPopupVariables(true);
				}
				
				if($provincia_session->intNumeroPaginacion==provincia_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=provincia_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$provincia_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,provincia_util::$STR_SESSION_NAME,'seguridad');																
			
			} else if($strTypeOnLoadprovincia!=null && $strTypeOnLoadprovincia=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$provincia_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=provincia_util::$INT_NUMERO_PAGINACION;*/
				
				if($provincia_session->intNumeroPaginacion==provincia_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=provincia_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$provincia_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarprovincia!=null && $strTipoPaginaAuxiliarprovincia=='none') {
				/*$provincia_session->strStyleDivHeader='display:table-row';*/
				
				/*$provincia_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarprovincia!=null && $strTipoPaginaAuxiliarprovincia=='iframe') {
					/*
					$provincia_session->strStyleDivArbol='display:none';
					$provincia_session->strStyleDivHeader='display:none';
					$provincia_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$provincia_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->provinciaClase=new provincia();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=provincia_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(provincia_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->provinciaLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->provinciaLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$ciudadLogic=new ciudad_logic();
			//$proveedorLogic=new proveedor_logic();
			//$clienteLogic=new cliente_logic();
			//$datogeneralusuarioLogic=new dato_general_usuario_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->provinciaLogic=new provincia_logic();*/
			
			
			$this->provinciasModel=null;
			/*new ListDataModel();*/
			
			/*$this->provinciasModel.setWrappedData(provinciaLogic->getprovincias());*/
						
			$this->provincias= array();
			$this->provinciasEliminados=array();
			$this->provinciasSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= provincia_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= provincia_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->provincia= new provincia();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleBusquedaPorcodigo='display:table-row';
			$this->strVisibleBusquedaPornombre='display:table-row';
			$this->strVisibleFK_Idpais='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarprovincia!=null && $strTipoUsuarioAuxiliarprovincia!='none' && $strTipoUsuarioAuxiliarprovincia!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarprovincia);
																
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
				if($strTipoUsuarioAuxiliarprovincia!=null && $strTipoUsuarioAuxiliarprovincia!='none' && $strTipoUsuarioAuxiliarprovincia!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarprovincia);
																
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
				if($strTipoUsuarioAuxiliarprovincia==null || $strTipoUsuarioAuxiliarprovincia=='none' || $strTipoUsuarioAuxiliarprovincia=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarprovincia,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, provincia_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, provincia_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina provincia');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($provincia_session);
			
			$this->getSetBusquedasSesionConfig($provincia_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteprovincias($this->strAccionBusqueda,$this->provinciaLogic->getprovincias());*/
				} else if($this->strGenerarReporte=='Html')	{
					$provincia_session->strServletGenerarHtmlReporte='provinciaServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(provincia_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(provincia_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($provincia_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$provincia_session=unserialize($this->Session->read(provincia_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarprovincia!=null && $strTipoUsuarioAuxiliarprovincia=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($provincia_session);
			}
								
			$this->set(provincia_util::$STR_SESSION_NAME, $provincia_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($provincia_session);
			
			/*
			$this->provincia->recursive = 0;
			
			$this->provincias=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('provincias', $this->provincias);
			
			$this->set(provincia_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->provinciaActual =$this->provinciaClase;
			
			/*$this->provinciaActual =$this->migrarModelprovincia($this->provinciaClase);*/
			
			$this->returnHtml(false);
			
			$this->set(provincia_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=provincia_util::$STR_NOMBRE_OPCION;
				
			if(provincia_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=provincia_util::$STR_MODULO_OPCION.provincia_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(provincia_util::$STR_SESSION_NAME,serialize($provincia_session));
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
			/*$provinciaClase= (provincia) provinciasModel.getRowData();*/
			
			$this->provinciaClase->setId($this->provincia->getId());	
			$this->provinciaClase->setVersionRow($this->provincia->getVersionRow());	
			$this->provinciaClase->setVersionRow($this->provincia->getVersionRow());	
			$this->provinciaClase->setid_pais($this->provincia->getid_pais());	
			$this->provinciaClase->setcodigo($this->provincia->getcodigo());	
			$this->provinciaClase->setnombre($this->provincia->getnombre());	
		
			/*$this->Session->write('provinciaVersionRowActual', provincia.getVersionRow());*/
			
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
			
			$provincia_session=unserialize($this->Session->read(provincia_util::$STR_SESSION_NAME));
						
			if($provincia_session==null) {
				$provincia_session=new provincia_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('provincia', $this->provincia->read(null, $id));
	
			
			$this->provincia->recursive = 0;
			
			$this->provincias=$this->paginate();
			
			$this->set('provincias', $this->provincias);
	
			if (empty($this->data)) {
				$this->data = $this->provincia->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->provinciaLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->provinciaClase);
			
			$this->provinciaActual=$this->provinciaClase;
			
			/*$this->provinciaActual =$this->migrarModelprovincia($this->provinciaClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->provinciaLogic->getprovincias(),$this->provinciaActual);
			
			$this->actualizarControllerConReturnGeneral($this->provinciaReturnGeneral);
			
			//$this->provinciaReturnGeneral=$this->provinciaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->provinciaLogic->getprovincias(),$this->provinciaActual,$this->provinciaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$provincia_session=unserialize($this->Session->read(provincia_util::$STR_SESSION_NAME));
						
			if($provincia_session==null) {
				$provincia_session=new provincia_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoprovincia', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->provinciaClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->provinciaClase);
			
			$this->provinciaActual =$this->provinciaClase;
			
			/*$this->provinciaActual =$this->migrarModelprovincia($this->provinciaClase);*/
			
			$this->setprovinciaFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->provinciaLogic->getprovincias(),$this->provincia);
			
			$this->actualizarControllerConReturnGeneral($this->provinciaReturnGeneral);
			
			//this->provinciaReturnGeneral=$this->provinciaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->provinciaLogic->getprovincias(),$this->provincia,$this->provinciaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idpaisDefaultFK!=null && $this->idpaisDefaultFK > -1) {
				$this->provinciaReturnGeneral->getprovincia()->setid_pais($this->idpaisDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->provinciaReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->provinciaReturnGeneral->getprovincia(),$this->provinciaActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyprovincia($this->provinciaReturnGeneral->getprovincia());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioprovincia($this->provinciaReturnGeneral->getprovincia());*/
			}
			
			if($this->provinciaReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->provinciaReturnGeneral->getprovincia(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualprovincia($this->provincia,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->provinciasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->provinciasAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->provinciasAuxiliar=array();
			}
			
			if(count($this->provinciasAuxiliar)==2) {
				$provinciaOrigen=$this->provinciasAuxiliar[0];
				$provinciaDestino=$this->provinciasAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($provinciaOrigen,$provinciaDestino,true,false,false);
				
				$this->actualizarLista($provinciaDestino,$this->provincias);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->provinciasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->provinciasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->provinciasAuxiliar=array();
			}
			
			if(count($this->provinciasAuxiliar) > 0) {
				foreach ($this->provinciasAuxiliar as $provinciaSeleccionado) {
					$this->provincia=new provincia();
					
					$this->setCopiarVariablesObjetos($provinciaSeleccionado,$this->provincia,true,true,false);
						
					$this->provincias[]=$this->provincia;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->provinciasEliminados as $provinciaEliminado) {
				$this->provinciaLogic->provincias[]=$provinciaEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->provincia=new provincia();
							
				$this->provincias[]=$this->provincia;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
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
		
		$provinciaActual=new provincia();
		
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
				
				$provinciaActual=$this->provincias[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $provinciaActual->setid_pais((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $provinciaActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $provinciaActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->provinciasAuxiliar=array();		 
		/*$this->provinciasEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->provinciasAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->provinciasAuxiliar=array();
		}
			
		if(count($this->provinciasAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->provinciasAuxiliar as $provinciaAuxLocal) {				
				
				foreach($this->provincias as $provinciaLocal) {
					if($provinciaLocal->getId()==$provinciaAuxLocal->getId()) {
						$provinciaLocal->setIsDeleted(true);
						
						/*$this->provinciasEliminados[]=$provinciaLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->provinciaLogic->setprovincias($this->provincias);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
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
				$this->provinciaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=provincia_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadprovincia='',string $strTipoPaginaAuxiliarprovincia='',string $strTipoUsuarioAuxiliarprovincia='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadprovincia,$strTipoPaginaAuxiliarprovincia,$strTipoUsuarioAuxiliarprovincia,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->provincias) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=provincia_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=provincia_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=provincia_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$provincia_session=unserialize($this->Session->read(provincia_util::$STR_SESSION_NAME));
						
			if($provincia_session==null) {
				$provincia_session=new provincia_session();
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
					/*$this->intNumeroPaginacion=provincia_util::$INT_NUMERO_PAGINACION;*/
					
					if($provincia_session->intNumeroPaginacion==provincia_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=provincia_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$provincia_session->intNumeroPaginacion;
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
			
			$this->provinciasEliminados=array();
			
			/*$this->provinciaLogic->setConnexion($connexion);*/
			
			$this->provinciaLogic->setIsConDeep(true);
			
			$this->provinciaLogic->getprovinciaDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('pais');$classes[]=$class;
			
			$this->provinciaLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->provinciaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->provinciaLogic->getprovincias()==null|| count($this->provinciaLogic->getprovincias())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->provincias=$this->provinciaLogic->getprovincias();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->provinciaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->provinciasReporte=$this->provinciaLogic->getprovincias();
									
						/*$this->generarReportes('Todos',$this->provinciaLogic->getprovincias());*/
					
						$this->provinciaLogic->setprovincias($this->provincias);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->provinciaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->provinciaLogic->getprovincias()==null|| count($this->provinciaLogic->getprovincias())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->provincias=$this->provinciaLogic->getprovincias();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->provinciaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->provinciasReporte=$this->provinciaLogic->getprovincias();
									
						/*$this->generarReportes('Todos',$this->provinciaLogic->getprovincias());*/
					
						$this->provinciaLogic->setprovincias($this->provincias);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idprovincia=0;*/
				
				if($provincia_session->bitBusquedaDesdeFKSesionFK!=null && $provincia_session->bitBusquedaDesdeFKSesionFK==true) {
					if($provincia_session->bigIdActualFK!=null && $provincia_session->bigIdActualFK!=0)	{
						$this->idprovincia=$provincia_session->bigIdActualFK;	
					}
					
					$provincia_session->bitBusquedaDesdeFKSesionFK=false;
					
					$provincia_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idprovincia=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idprovincia=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->provinciaLogic->getEntity($this->idprovincia);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*provinciaLogicAdditional::getDetalleIndicePorId($idprovincia);*/

				
				if($this->provinciaLogic->getprovincia()!=null) {
					$this->provinciaLogic->setprovincias(array());
					$this->provinciaLogic->provincias[]=$this->provinciaLogic->getprovincia();
				}
			
			}
		
			else if($strAccionBusqueda=='BusquedaPorcodigo')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->provinciaLogic->getsBusquedaPorcodigo($finalQueryPaginacion,$this->pagination,$this->codigoBusquedaPorcodigo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//provinciaLogicAdditional::getDetalleIndiceBusquedaPorcodigo($this->codigoBusquedaPorcodigo);


					if($this->provinciaLogic->getprovincias()==null || count($this->provinciaLogic->getprovincias())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$provincias=$this->provinciaLogic->getprovincias();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->provinciaLogic->getsBusquedaPorcodigo('',$this->pagination,$this->codigoBusquedaPorcodigo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->provinciasReporte=$this->provinciaLogic->getprovincias();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteprovincias("BusquedaPorcodigo",$this->provinciaLogic->getprovincias());

					if($this->strTipoPaginacion=='TODOS') {
						$this->provinciaLogic->setprovincias($provincias);
					}
				//}

			}
			else if($strAccionBusqueda=='BusquedaPornombre')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->provinciaLogic->getsBusquedaPornombre($finalQueryPaginacion,$this->pagination,$this->nombreBusquedaPornombre);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//provinciaLogicAdditional::getDetalleIndiceBusquedaPornombre($this->nombreBusquedaPornombre);


					if($this->provinciaLogic->getprovincias()==null || count($this->provinciaLogic->getprovincias())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$provincias=$this->provinciaLogic->getprovincias();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->provinciaLogic->getsBusquedaPornombre('',$this->pagination,$this->nombreBusquedaPornombre);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->provinciasReporte=$this->provinciaLogic->getprovincias();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteprovincias("BusquedaPornombre",$this->provinciaLogic->getprovincias());

					if($this->strTipoPaginacion=='TODOS') {
						$this->provinciaLogic->setprovincias($provincias);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idpais')
			{

				if($provincia_session->bigidpaisActual!=null && $provincia_session->bigidpaisActual!=0)
				{
					$this->id_paisFK_Idpais=$provincia_session->bigidpaisActual;
					$provincia_session->bigidpaisActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->provinciaLogic->getsFK_Idpais($finalQueryPaginacion,$this->pagination,$this->id_paisFK_Idpais);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//provinciaLogicAdditional::getDetalleIndiceFK_Idpais($this->id_paisFK_Idpais);


					if($this->provinciaLogic->getprovincias()==null || count($this->provinciaLogic->getprovincias())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$provincias=$this->provinciaLogic->getprovincias();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->provinciaLogic->getsFK_Idpais('',$this->pagination,$this->id_paisFK_Idpais);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->provinciasReporte=$this->provinciaLogic->getprovincias();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteprovincias("FK_Idpais",$this->provinciaLogic->getprovincias());

					if($this->strTipoPaginacion=='TODOS') {
						$this->provinciaLogic->setprovincias($provincias);
					}
				//}

			} 
		
		$provincia_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$provincia_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->provinciaLogic->loadForeignsKeysDescription();*/
		
		$this->provincias=$this->provinciaLogic->getprovincias();
		
		if($this->provinciasEliminados==null) {
			$this->provinciasEliminados=array();
		}
		
		$this->Session->write(provincia_util::$STR_SESSION_NAME.'Lista',serialize($this->provincias));
		$this->Session->write(provincia_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->provinciasEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(provincia_util::$STR_SESSION_NAME,serialize($provincia_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idprovincia=$idGeneral;
			
			$this->intNumeroPaginacion=provincia_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
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
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}

			if(count($this->provincias) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsBusquedaPorcodigoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=provincia_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->codigoBusquedaPorcodigo=(string)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorcodigo','txtcodigo');

			$this->strAccionBusqueda='BusquedaPorcodigo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsBusquedaPornombreParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=provincia_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->nombreBusquedaPornombre=(string)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPornombre','txtnombre');

			$this->strAccionBusqueda='BusquedaPornombre';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
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
				$this->provinciaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=provincia_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_paisFK_Idpais=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idpais','cmbid_pais');

			$this->strAccionBusqueda='FK_Idpais';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsBusquedaPorcodigo($strFinalQuery,$codigo)
	{
		try
		{

			$this->provinciaLogic->getsBusquedaPorcodigo($strFinalQuery,new Pagination(),$codigo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsBusquedaPornombre($strFinalQuery,$nombre)
	{
		try
		{

			$this->provinciaLogic->getsBusquedaPornombre($strFinalQuery,new Pagination(),$nombre);
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

			$this->provinciaLogic->getsFK_Idpais($strFinalQuery,new Pagination(),$id_pais);
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
			
			
			$provinciaForeignKey=new provincia_param_return(); //provinciaForeignKey();
			
			$provincia_session=unserialize($this->Session->read(provincia_util::$STR_SESSION_NAME));
						
			if($provincia_session==null) {
				$provincia_session=new provincia_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$provinciaForeignKey=$this->provinciaLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$provincia_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_pais',$this->strRecargarFkTipos,',')) {
				$this->paissFK=$provinciaForeignKey->paissFK;
				$this->idpaisDefaultFK=$provinciaForeignKey->idpaisDefaultFK;
			}

			if($provincia_session->bitBusquedaDesdeFKSesionpais) {
				$this->setVisibleBusquedasParapais(true);
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
	
	function cargarCombosFKFromReturnGeneral($provinciaReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$provinciaReturnGeneral->strRecargarFkTipos;
			
			


			if($provinciaReturnGeneral->con_paissFK==true) {
				$this->paissFK=$provinciaReturnGeneral->paissFK;
				$this->idpaisDefaultFK=$provinciaReturnGeneral->idpaisDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(provincia_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$provincia_session=unserialize($this->Session->read(provincia_util::$STR_SESSION_NAME));
		
		if($provincia_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($provincia_session->getstrNombrePaginaNavegacionHaciaFKDesde()==pais_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='pais';
			}
			
			$provincia_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}						
			
			$this->provinciasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->provinciasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->provinciasAuxiliar=array();
			}
			
			if(count($this->provinciasAuxiliar) > 0) {
				
				foreach ($this->provinciasAuxiliar as $provinciaSeleccionado) {
					$this->eliminarTablaBase($provinciaSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('ciudad');
			$tipoRelacionReporte->setsDescripcion('Ciudades');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('cliente');
			$tipoRelacionReporte->setsDescripcion('Clientes');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('dato_general_usuario');
			$tipoRelacionReporte->setsDescripcion('Dato General Usuarios');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('proveedor');
			$tipoRelacionReporte->setsDescripcion('Proveedores');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=ciudad_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=proveedor_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=cliente_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=dato_general_usuario_util::$STR_NOMBRE_CLASE;
		
		return $arrNombresClasesRelacionadasLocal;
	}
	
	
	public function setstrRecargarFkInicializar() {
		$this->setstrRecargarFk('TODOS','NINGUNO',0,'');		
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


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=provincia_util::$INT_NUMERO_PAGINACION;
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
				$this->provinciaLogic->commitNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->rollbackNewConnexionToDeep();
				$this->provinciaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$provinciasNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->provincias as $provinciaLocal) {
				if($provinciaLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->provincia=new provincia();
				
				$this->provincia->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->provincias[]=$this->provincia;*/
				
				$provinciasNuevos[]=$this->provincia;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('pais');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->provinciaLogic->setprovincias($provinciasNuevos);
					
				$this->provinciaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($provinciasNuevos as $provinciaNuevo) {
					$this->provincias[]=$provinciaNuevo;
				}
				
				/*$this->provincias[]=$provinciasNuevos;*/
				
				$this->provinciaLogic->setprovincias($this->provincias);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($provinciasNuevos!=null);
	}
					
	
	public function cargarCombospaissFK($connexion=null,$strRecargarFkQuery=''){
		$paisLogic= new pais_logic();
		$pagination= new Pagination();
		$this->paissFK=array();

		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$provincia_session=unserialize($this->Session->read(provincia_util::$STR_SESSION_NAME));

		if($provincia_session==null) {
			$provincia_session=new provincia_session();
		}
		
		if($provincia_session->bitBusquedaDesdeFKSesionpais!=true) {
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


			if($provincia_session->bigidpaisActual!=null && $provincia_session->bigidpaisActual > 0) {
				$paisLogic->getEntity($provincia_session->bigidpaisActual);//WithConnection

				$this->paissFK[$paisLogic->getpais()->getId()]=provincia_util::getpaisDescripcion($paisLogic->getpais());
				$this->idpaisDefaultFK=$paisLogic->getpais()->getId();
			}
		}
	}

	
	
	public function prepararCombospaissFK($paiss){

		foreach ($paiss as $paisLocal ) {
			if($this->idpaisDefaultFK==0) {
				$this->idpaisDefaultFK=$paisLocal->getId();
			}

			$this->paissFK[$paisLocal->getId()]=provincia_util::getpaisDescripcion($paisLocal);
		}
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

			$strDescripcionpais=provincia_util::getpaisDescripcion($paisLogic->getpais());

		} else {
			$strDescripcionpais='null';
		}

		return $strDescripcionpais;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(provincia $provinciaClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
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

		$this->strVisibleBusquedaPorcodigo=$strParaVisibleNegacionpais;
		$this->strVisibleBusquedaPornombre=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idpais=$strParaVisiblepais;
	}
	
	

	public function abrirBusquedaParapais() {//$idprovinciaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idprovinciaActual=$idprovinciaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.pais_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.provinciaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_pais(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',pais_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.provinciaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_pais(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(pais_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarprovincia,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParaciudades(int $idprovinciaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idprovinciaActual=$idprovinciaActual;

		$bitPaginaPopupciudad=false;

		try {

			$provincia_session=unserialize($this->Session->read(provincia_util::$STR_SESSION_NAME));

			if($provincia_session==null) {
				$provincia_session=new provincia_session();
			}

			$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));

			if($ciudad_session==null) {
				$ciudad_session=new ciudad_session();
			}

			$ciudad_session->strUltimaBusqueda='FK_Idprovincia';
			$ciudad_session->strPathNavegacionActual=$provincia_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.ciudad_util::$STR_CLASS_WEB_TITULO;
			$ciudad_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupciudad=$ciudad_session->bitPaginaPopup;
			$ciudad_session->setPaginaPopupVariables(true);
			$bitPaginaPopupciudad=$ciudad_session->bitPaginaPopup;
			$ciudad_session->bitPermiteNavegacionHaciaFKDesde=false;
			$ciudad_session->strNombrePaginaNavegacionHaciaFKDesde=provincia_util::$STR_NOMBRE_OPCION;
			$ciudad_session->bitBusquedaDesdeFKSesionprovincia=true;
			$ciudad_session->bigidprovinciaActual=$this->idprovinciaActual;

			$provincia_session->bitBusquedaDesdeFKSesionFK=true;
			$provincia_session->bigIdActualFK=$this->idprovinciaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"ciudad"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=provincia_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"ciudad"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(provincia_util::$STR_SESSION_NAME,serialize($provincia_session));
			$this->Session->write(ciudad_util::$STR_SESSION_NAME,serialize($ciudad_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupciudad!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ciudad_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ciudad_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarprovincia,$this->strTipoUsuarioAuxiliarprovincia,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ciudad_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ciudad_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliarprovincia,$this->strTipoUsuarioAuxiliarprovincia,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaproveedores(int $idprovinciaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idprovinciaActual=$idprovinciaActual;

		$bitPaginaPopupproveedor=false;

		try {

			$provincia_session=unserialize($this->Session->read(provincia_util::$STR_SESSION_NAME));

			if($provincia_session==null) {
				$provincia_session=new provincia_session();
			}

			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
			}

			$proveedor_session->strUltimaBusqueda='FK_Idprovincia';
			$proveedor_session->strPathNavegacionActual=$provincia_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.proveedor_util::$STR_CLASS_WEB_TITULO;
			$proveedor_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupproveedor=$proveedor_session->bitPaginaPopup;
			$proveedor_session->setPaginaPopupVariables(true);
			$bitPaginaPopupproveedor=$proveedor_session->bitPaginaPopup;
			$proveedor_session->bitPermiteNavegacionHaciaFKDesde=false;
			$proveedor_session->strNombrePaginaNavegacionHaciaFKDesde=provincia_util::$STR_NOMBRE_OPCION;
			$proveedor_session->bitBusquedaDesdeFKSesionprovincia=true;
			$proveedor_session->bigidprovinciaActual=$this->idprovinciaActual;

			$provincia_session->bitBusquedaDesdeFKSesionFK=true;
			$provincia_session->bigIdActualFK=$this->idprovinciaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"proveedor"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=provincia_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"proveedor"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(provincia_util::$STR_SESSION_NAME,serialize($provincia_session));
			$this->Session->write(proveedor_util::$STR_SESSION_NAME,serialize($proveedor_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupproveedor!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarprovincia,$this->strTipoUsuarioAuxiliarprovincia,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliarprovincia,$this->strTipoUsuarioAuxiliarprovincia,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaclientes(int $idprovinciaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idprovinciaActual=$idprovinciaActual;

		$bitPaginaPopupcliente=false;

		try {

			$provincia_session=unserialize($this->Session->read(provincia_util::$STR_SESSION_NAME));

			if($provincia_session==null) {
				$provincia_session=new provincia_session();
			}

			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}

			$cliente_session->strUltimaBusqueda='FK_Idprovincia';
			$cliente_session->strPathNavegacionActual=$provincia_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.cliente_util::$STR_CLASS_WEB_TITULO;
			$cliente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcliente=$cliente_session->bitPaginaPopup;
			$cliente_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcliente=$cliente_session->bitPaginaPopup;
			$cliente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$cliente_session->strNombrePaginaNavegacionHaciaFKDesde=provincia_util::$STR_NOMBRE_OPCION;
			$cliente_session->bitBusquedaDesdeFKSesionprovincia=true;
			$cliente_session->bigidprovinciaActual=$this->idprovinciaActual;

			$provincia_session->bitBusquedaDesdeFKSesionFK=true;
			$provincia_session->bigIdActualFK=$this->idprovinciaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"cliente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=provincia_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"cliente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(provincia_util::$STR_SESSION_NAME,serialize($provincia_session));
			$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcliente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarprovincia,$this->strTipoUsuarioAuxiliarprovincia,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliarprovincia,$this->strTipoUsuarioAuxiliarprovincia,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParadato_general_usuarios(int $idprovinciaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idprovinciaActual=$idprovinciaActual;

		$bitPaginaPopupdato_general_usuario=false;

		try {

			$provincia_session=unserialize($this->Session->read(provincia_util::$STR_SESSION_NAME));

			if($provincia_session==null) {
				$provincia_session=new provincia_session();
			}

			$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));

			if($dato_general_usuario_session==null) {
				$dato_general_usuario_session=new dato_general_usuario_session();
			}

			$dato_general_usuario_session->strUltimaBusqueda='FK_Idprovincia';
			$dato_general_usuario_session->strPathNavegacionActual=$provincia_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.dato_general_usuario_util::$STR_CLASS_WEB_TITULO;
			$dato_general_usuario_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupdato_general_usuario=$dato_general_usuario_session->bitPaginaPopup;
			$dato_general_usuario_session->setPaginaPopupVariables(true);
			$bitPaginaPopupdato_general_usuario=$dato_general_usuario_session->bitPaginaPopup;
			$dato_general_usuario_session->bitPermiteNavegacionHaciaFKDesde=false;
			$dato_general_usuario_session->strNombrePaginaNavegacionHaciaFKDesde=provincia_util::$STR_NOMBRE_OPCION;
			$dato_general_usuario_session->bitBusquedaDesdeFKSesionprovincia=true;
			$dato_general_usuario_session->bigidprovinciaActual=$this->idprovinciaActual;

			$provincia_session->bitBusquedaDesdeFKSesionFK=true;
			$provincia_session->bigIdActualFK=$this->idprovinciaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"dato_general_usuario"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=provincia_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"dato_general_usuario"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(provincia_util::$STR_SESSION_NAME,serialize($provincia_session));
			$this->Session->write(dato_general_usuario_util::$STR_SESSION_NAME,serialize($dato_general_usuario_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupdato_general_usuario!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',dato_general_usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(dato_general_usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarprovincia,$this->strTipoUsuarioAuxiliarprovincia,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',dato_general_usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(dato_general_usuario_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliarprovincia,$this->strTipoUsuarioAuxiliarprovincia,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(provincia_util::$STR_SESSION_NAME,provincia_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$provincia_session=$this->Session->read(provincia_util::$STR_SESSION_NAME);
				
		if($provincia_session==null) {
			$provincia_session=new provincia_session();		
			//$this->Session->write('provincia_session',$provincia_session);							
		}
		*/
		
		$provincia_session=new provincia_session();
    	$provincia_session->strPathNavegacionActual=provincia_util::$STR_CLASS_WEB_TITULO;
    	$provincia_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(provincia_util::$STR_SESSION_NAME,serialize($provincia_session));		
	}	
	
	public function getSetBusquedasSesionConfig(provincia_session $provincia_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($provincia_session->bitBusquedaDesdeFKSesionFK!=null && $provincia_session->bitBusquedaDesdeFKSesionFK==true) {
			if($provincia_session->bigIdActualFK!=null && $provincia_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$provincia_session->bigIdActualFKParaPosibleAtras=$provincia_session->bigIdActualFK;*/
			}
				
			$provincia_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$provincia_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(provincia_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($provincia_session->bitBusquedaDesdeFKSesionpais!=null && $provincia_session->bitBusquedaDesdeFKSesionpais==true)
			{
				if($provincia_session->bigidpaisActual!=0) {
					$this->strAccionBusqueda='FK_Idpais';

					$existe_history=HistoryWeb::ExisteElemento(provincia_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(provincia_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(provincia_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($provincia_session->bigidpaisActualDescripcion);
						$historyWeb->setIdActual($provincia_session->bigidpaisActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=provincia_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$provincia_session->bigidpaisActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$provincia_session->bitBusquedaDesdeFKSesionpais=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=provincia_util::$INT_NUMERO_PAGINACION;

				if($provincia_session->intNumeroPaginacion==provincia_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=provincia_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$provincia_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$provincia_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$provincia_session=unserialize($this->Session->read(provincia_util::$STR_SESSION_NAME));
		
		if($provincia_session==null) {
			$provincia_session=new provincia_session();
		}
		
		$provincia_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$provincia_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$provincia_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='BusquedaPorcodigo') {
			$provincia_session->codigo=$this->codigoBusquedaPorcodigo;	

		}
		else if($this->strAccionBusqueda=='BusquedaPornombre') {
			$provincia_session->nombre=$this->nombreBusquedaPornombre;	

		}
		else if($this->strAccionBusqueda=='FK_Idpais') {
			$provincia_session->id_pais=$this->id_paisFK_Idpais;	

		}
		
		$this->Session->write(provincia_util::$STR_SESSION_NAME,serialize($provincia_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(provincia_session $provincia_session) {
		
		if($provincia_session==null) {
			$provincia_session=unserialize($this->Session->read(provincia_util::$STR_SESSION_NAME));
		}
		
		if($provincia_session==null) {
		   $provincia_session=new provincia_session();
		}
		
		if($provincia_session->strUltimaBusqueda!=null && $provincia_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$provincia_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$provincia_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$provincia_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='BusquedaPorcodigo') {
				$this->codigoBusquedaPorcodigo=$provincia_session->codigo;
				$provincia_session->codigo='';

			}
			 else if($this->strAccionBusqueda=='BusquedaPornombre') {
				$this->nombreBusquedaPornombre=$provincia_session->nombre;
				$provincia_session->nombre='';

			}
			 else if($this->strAccionBusqueda=='FK_Idpais') {
				$this->id_paisFK_Idpais=$provincia_session->id_pais;
				$provincia_session->id_pais=-1;

			}
		}
		
		$provincia_session->strUltimaBusqueda='';
		//$provincia_session->intNumeroPaginacion=10;
		$provincia_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(provincia_util::$STR_SESSION_NAME,serialize($provincia_session));		
	}
	
	public function provinciasControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idpaisDefaultFK = 0;
	}
	
	public function setprovinciaFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_pais',$this->idpaisDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		pais::$class;
		pais_carga::$CONTROLLER;
		
		//REL
		

		ciudad_carga::$CONTROLLER;
		ciudad_util::$STR_SCHEMA;
		ciudad_session::class;

		proveedor_carga::$CONTROLLER;
		proveedor_util::$STR_SCHEMA;
		proveedor_session::class;

		cliente_carga::$CONTROLLER;
		cliente_util::$STR_SCHEMA;
		cliente_session::class;

		dato_general_usuario_carga::$CONTROLLER;
		dato_general_usuario_util::$STR_SCHEMA;
		dato_general_usuario_session::class;
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
		interface provincia_controlI {	
		
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
		
		public function onLoad(provincia_session $provincia_session=null);	
		function index(?string $strTypeOnLoadprovincia='',?string $strTipoPaginaAuxiliarprovincia='',?string $strTipoUsuarioAuxiliarprovincia='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadprovincia='',string $strTipoPaginaAuxiliarprovincia='',string $strTipoUsuarioAuxiliarprovincia='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($provinciaReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(provincia $provinciaClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(provincia_session $provincia_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(provincia_session $provincia_session);	
		public function provinciasControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setprovinciaFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
