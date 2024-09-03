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

namespace com\bydan\contabilidad\seguridad\historial_cambio_clave\presentation\control;

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

use com\bydan\contabilidad\seguridad\historial_cambio_clave\business\entity\historial_cambio_clave;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/historial_cambio_clave/util/historial_cambio_clave_carga.php');
use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_carga;

use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_util;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_param_return;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\business\logic\historial_cambio_clave_logic;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\presentation\session\historial_cambio_clave_session;


//FK


use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
historial_cambio_clave_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
historial_cambio_clave_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
historial_cambio_clave_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
historial_cambio_clave_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*historial_cambio_clave_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/seguridad/historial_cambio_clave/presentation/control/historial_cambio_clave_init_control.php');
use com\bydan\contabilidad\seguridad\historial_cambio_clave\presentation\control\historial_cambio_clave_init_control;

include_once('com/bydan/contabilidad/seguridad/historial_cambio_clave/presentation/control/historial_cambio_clave_base_control.php');
use com\bydan\contabilidad\seguridad\historial_cambio_clave\presentation\control\historial_cambio_clave_base_control;

class historial_cambio_clave_control extends historial_cambio_clave_base_control {	
	
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
			
			
			else if($action=="BusquedaPorIdUsuarioPorFechaHora"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorIdUsuarioPorFechaHoraParaProcesar();
			}
			else if($action=="FK_Idusuario"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdusuarioParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idhistorial_cambio_claveActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$idhistorial_cambio_claveActual
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
					
					$historial_cambio_claveController = new historial_cambio_clave_control();
					
					$historial_cambio_claveController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($historial_cambio_claveController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$historial_cambio_claveController = new historial_cambio_clave_control();
						$historial_cambio_claveController = $this;
						
						$jsonResponse = json_encode($historial_cambio_claveController->historial_cambio_claves);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->historial_cambio_claveReturnGeneral==null) {
					$this->historial_cambio_claveReturnGeneral=new historial_cambio_clave_param_return();
				}
				
				echo($this->historial_cambio_claveReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$historial_cambio_claveController=new historial_cambio_clave_control();
		
		$historial_cambio_claveController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$historial_cambio_claveController->usuarioActual=new usuario();
		
		$historial_cambio_claveController->usuarioActual->setId($this->usuarioActual->getId());
		$historial_cambio_claveController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$historial_cambio_claveController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$historial_cambio_claveController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$historial_cambio_claveController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$historial_cambio_claveController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$historial_cambio_claveController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$historial_cambio_claveController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $historial_cambio_claveController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadhistorial_cambio_clave= $this->getDataGeneralString('strTypeOnLoadhistorial_cambio_clave');
		$strTipoPaginaAuxiliarhistorial_cambio_clave= $this->getDataGeneralString('strTipoPaginaAuxiliarhistorial_cambio_clave');
		$strTipoUsuarioAuxiliarhistorial_cambio_clave= $this->getDataGeneralString('strTipoUsuarioAuxiliarhistorial_cambio_clave');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadhistorial_cambio_clave,$strTipoPaginaAuxiliarhistorial_cambio_clave,$strTipoUsuarioAuxiliarhistorial_cambio_clave,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadhistorial_cambio_clave!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('historial_cambio_clave','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(historial_cambio_clave_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarhistorial_cambio_clave,$this->strTipoUsuarioAuxiliarhistorial_cambio_clave,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(historial_cambio_clave_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarhistorial_cambio_clave,$this->strTipoUsuarioAuxiliarhistorial_cambio_clave,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->historial_cambio_claveReturnGeneral=new historial_cambio_clave_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->historial_cambio_claveReturnGeneral->conGuardarReturnSessionJs=true;
		$this->historial_cambio_claveReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->historial_cambio_claveReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->historial_cambio_claveReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->historial_cambio_claveReturnGeneral);
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
		$this->historial_cambio_claveReturnGeneral=new historial_cambio_clave_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->historial_cambio_claveReturnGeneral->conGuardarReturnSessionJs=true;
		$this->historial_cambio_claveReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->historial_cambio_claveReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->historial_cambio_claveReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->historial_cambio_claveReturnGeneral);
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
		$this->historial_cambio_claveReturnGeneral=new historial_cambio_clave_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->historial_cambio_claveReturnGeneral->conGuardarReturnSessionJs=true;
		$this->historial_cambio_claveReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->historial_cambio_claveReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->historial_cambio_claveReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->historial_cambio_claveReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
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
			
			
			$this->historial_cambio_claveReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->historial_cambio_claveReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->historial_cambio_claveReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->historial_cambio_claveReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->historial_cambio_claveReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->historial_cambio_claveReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->historial_cambio_claveReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->historial_cambio_claveReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->historial_cambio_claveReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->historial_cambio_claveReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->historial_cambio_claveReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->historial_cambio_claveReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->historial_cambio_claveReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->historial_cambio_claveReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->historial_cambio_claveReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->historial_cambio_claveReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->historial_cambio_claveReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->historial_cambio_claveReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}
	
			$this->manejarRetornarExcepcion($e);
		}	
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
		
		$this->historial_cambio_claveLogic=new historial_cambio_clave_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->historial_cambio_clave=new historial_cambio_clave();
		
		$this->strTypeOnLoadhistorial_cambio_clave='onload';
		$this->strTipoPaginaAuxiliarhistorial_cambio_clave='none';
		$this->strTipoUsuarioAuxiliarhistorial_cambio_clave='none';	

		$this->intNumeroPaginacion=historial_cambio_clave_util::$INT_NUMERO_PAGINACION;
		
		$this->historial_cambio_claveModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->historial_cambio_claveControllerAdditional=new historial_cambio_clave_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(historial_cambio_clave_session $historial_cambio_clave_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($historial_cambio_clave_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadhistorial_cambio_clave='',?string $strTipoPaginaAuxiliarhistorial_cambio_clave='',?string $strTipoUsuarioAuxiliarhistorial_cambio_clave='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadhistorial_cambio_clave=$strTypeOnLoadhistorial_cambio_clave;
			$this->strTipoPaginaAuxiliarhistorial_cambio_clave=$strTipoPaginaAuxiliarhistorial_cambio_clave;
			$this->strTipoUsuarioAuxiliarhistorial_cambio_clave=$strTipoUsuarioAuxiliarhistorial_cambio_clave;
	
			if($strTipoUsuarioAuxiliarhistorial_cambio_clave=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->historial_cambio_clave=new historial_cambio_clave();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Historial Cambio Claves';
			
			
			$historial_cambio_clave_session=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME));
							
			if($historial_cambio_clave_session==null) {
				$historial_cambio_clave_session=new historial_cambio_clave_session();
				
				/*$this->Session->write('historial_cambio_clave_session',$historial_cambio_clave_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($historial_cambio_clave_session->strFuncionJsPadre!=null && $historial_cambio_clave_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$historial_cambio_clave_session->strFuncionJsPadre;
				
				$historial_cambio_clave_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($historial_cambio_clave_session);
			
			if($strTypeOnLoadhistorial_cambio_clave!=null && $strTypeOnLoadhistorial_cambio_clave=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$historial_cambio_clave_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$historial_cambio_clave_session->setPaginaPopupVariables(true);
				}
				
				if($historial_cambio_clave_session->intNumeroPaginacion==historial_cambio_clave_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=historial_cambio_clave_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$historial_cambio_clave_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,historial_cambio_clave_util::$STR_SESSION_NAME,'seguridad');																
			
			} else if($strTypeOnLoadhistorial_cambio_clave!=null && $strTypeOnLoadhistorial_cambio_clave=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$historial_cambio_clave_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=historial_cambio_clave_util::$INT_NUMERO_PAGINACION;*/
				
				if($historial_cambio_clave_session->intNumeroPaginacion==historial_cambio_clave_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=historial_cambio_clave_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$historial_cambio_clave_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarhistorial_cambio_clave!=null && $strTipoPaginaAuxiliarhistorial_cambio_clave=='none') {
				/*$historial_cambio_clave_session->strStyleDivHeader='display:table-row';*/
				
				/*$historial_cambio_clave_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarhistorial_cambio_clave!=null && $strTipoPaginaAuxiliarhistorial_cambio_clave=='iframe') {
					/*
					$historial_cambio_clave_session->strStyleDivArbol='display:none';
					$historial_cambio_clave_session->strStyleDivHeader='display:none';
					$historial_cambio_clave_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$historial_cambio_clave_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->historial_cambio_claveClase=new historial_cambio_clave();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=historial_cambio_clave_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(historial_cambio_clave_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->historial_cambio_claveLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->historial_cambio_claveLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->historial_cambio_claveLogic=new historial_cambio_clave_logic();*/
			
			
			$this->historial_cambio_clavesModel=null;
			/*new ListDataModel();*/
			
			/*$this->historial_cambio_clavesModel.setWrappedData(historial_cambio_claveLogic->gethistorial_cambio_claves());*/
						
			$this->historial_cambio_claves= array();
			$this->historial_cambio_clavesEliminados=array();
			$this->historial_cambio_clavesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= historial_cambio_clave_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->historial_cambio_clave= new historial_cambio_clave();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleBusquedaPorIdUsuarioPorFechaHora='display:table-row';
			$this->strVisibleFK_Idusuario='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarhistorial_cambio_clave!=null && $strTipoUsuarioAuxiliarhistorial_cambio_clave!='none' && $strTipoUsuarioAuxiliarhistorial_cambio_clave!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarhistorial_cambio_clave);
																
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
				if($strTipoUsuarioAuxiliarhistorial_cambio_clave!=null && $strTipoUsuarioAuxiliarhistorial_cambio_clave!='none' && $strTipoUsuarioAuxiliarhistorial_cambio_clave!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarhistorial_cambio_clave);
																
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
				if($strTipoUsuarioAuxiliarhistorial_cambio_clave==null || $strTipoUsuarioAuxiliarhistorial_cambio_clave=='none' || $strTipoUsuarioAuxiliarhistorial_cambio_clave=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarhistorial_cambio_clave,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, historial_cambio_clave_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, historial_cambio_clave_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina historial_cambio_clave');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($historial_cambio_clave_session);
			
			$this->getSetBusquedasSesionConfig($historial_cambio_clave_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportehistorial_cambio_claves($this->strAccionBusqueda,$this->historial_cambio_claveLogic->gethistorial_cambio_claves());*/
				} else if($this->strGenerarReporte=='Html')	{
					$historial_cambio_clave_session->strServletGenerarHtmlReporte='historial_cambio_claveServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(historial_cambio_clave_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(historial_cambio_clave_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($historial_cambio_clave_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$historial_cambio_clave_session=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarhistorial_cambio_clave!=null && $strTipoUsuarioAuxiliarhistorial_cambio_clave=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($historial_cambio_clave_session);
			}
								
			$this->set(historial_cambio_clave_util::$STR_SESSION_NAME, $historial_cambio_clave_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($historial_cambio_clave_session);
			
			/*
			$this->historial_cambio_clave->recursive = 0;
			
			$this->historial_cambio_claves=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('historial_cambio_claves', $this->historial_cambio_claves);
			
			$this->set(historial_cambio_clave_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->historial_cambio_claveActual =$this->historial_cambio_claveClase;
			
			/*$this->historial_cambio_claveActual =$this->migrarModelhistorial_cambio_clave($this->historial_cambio_claveClase);*/
			
			$this->returnHtml(false);
			
			$this->set(historial_cambio_clave_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=historial_cambio_clave_util::$STR_NOMBRE_OPCION;
				
			if(historial_cambio_clave_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=historial_cambio_clave_util::$STR_MODULO_OPCION.historial_cambio_clave_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(historial_cambio_clave_util::$STR_SESSION_NAME,serialize($historial_cambio_clave_session));
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
			/*$historial_cambio_claveClase= (historial_cambio_clave) historial_cambio_clavesModel.getRowData();*/
			
			$this->historial_cambio_claveClase->setId($this->historial_cambio_clave->getId());	
			$this->historial_cambio_claveClase->setVersionRow($this->historial_cambio_clave->getVersionRow());	
			$this->historial_cambio_claveClase->setVersionRow($this->historial_cambio_clave->getVersionRow());	
			$this->historial_cambio_claveClase->setid_usuario($this->historial_cambio_clave->getid_usuario());	
			$this->historial_cambio_claveClase->setnombre($this->historial_cambio_clave->getnombre());	
			$this->historial_cambio_claveClase->setfecha_hora($this->historial_cambio_clave->getfecha_hora());	
			$this->historial_cambio_claveClase->setobservacion($this->historial_cambio_clave->getobservacion());	
		
			/*$this->Session->write('historial_cambio_claveVersionRowActual', historial_cambio_clave.getVersionRow());*/
			
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
			
			$historial_cambio_clave_session=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME));
						
			if($historial_cambio_clave_session==null) {
				$historial_cambio_clave_session=new historial_cambio_clave_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('historial_cambio_clave', $this->historial_cambio_clave->read(null, $id));
	
			
			$this->historial_cambio_clave->recursive = 0;
			
			$this->historial_cambio_claves=$this->paginate();
			
			$this->set('historial_cambio_claves', $this->historial_cambio_claves);
	
			if (empty($this->data)) {
				$this->data = $this->historial_cambio_clave->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->historial_cambio_claveLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->historial_cambio_claveClase);
			
			$this->historial_cambio_claveActual=$this->historial_cambio_claveClase;
			
			/*$this->historial_cambio_claveActual =$this->migrarModelhistorial_cambio_clave($this->historial_cambio_claveClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->historial_cambio_claveLogic->gethistorial_cambio_claves(),$this->historial_cambio_claveActual);
			
			$this->actualizarControllerConReturnGeneral($this->historial_cambio_claveReturnGeneral);
			
			//$this->historial_cambio_claveReturnGeneral=$this->historial_cambio_claveLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->historial_cambio_claveLogic->gethistorial_cambio_claves(),$this->historial_cambio_claveActual,$this->historial_cambio_claveParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$historial_cambio_clave_session=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME));
						
			if($historial_cambio_clave_session==null) {
				$historial_cambio_clave_session=new historial_cambio_clave_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevohistorial_cambio_clave', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->historial_cambio_claveClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->historial_cambio_claveClase);
			
			$this->historial_cambio_claveActual =$this->historial_cambio_claveClase;
			
			/*$this->historial_cambio_claveActual =$this->migrarModelhistorial_cambio_clave($this->historial_cambio_claveClase);*/
			
			$this->sethistorial_cambio_claveFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->historial_cambio_claveLogic->gethistorial_cambio_claves(),$this->historial_cambio_clave);
			
			$this->actualizarControllerConReturnGeneral($this->historial_cambio_claveReturnGeneral);
			
			//this->historial_cambio_claveReturnGeneral=$this->historial_cambio_claveLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->historial_cambio_claveLogic->gethistorial_cambio_claves(),$this->historial_cambio_clave,$this->historial_cambio_claveParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->historial_cambio_claveReturnGeneral->gethistorial_cambio_clave()->setid_usuario($this->idusuarioDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->historial_cambio_claveReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->historial_cambio_claveReturnGeneral->gethistorial_cambio_clave(),$this->historial_cambio_claveActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyhistorial_cambio_clave($this->historial_cambio_claveReturnGeneral->gethistorial_cambio_clave());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariohistorial_cambio_clave($this->historial_cambio_claveReturnGeneral->gethistorial_cambio_clave());*/
			}
			
			if($this->historial_cambio_claveReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->historial_cambio_claveReturnGeneral->gethistorial_cambio_clave(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualhistorial_cambio_clave($this->historial_cambio_clave,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->historial_cambio_clavesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->historial_cambio_clavesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->historial_cambio_clavesAuxiliar=array();
			}
			
			if(count($this->historial_cambio_clavesAuxiliar)==2) {
				$historial_cambio_claveOrigen=$this->historial_cambio_clavesAuxiliar[0];
				$historial_cambio_claveDestino=$this->historial_cambio_clavesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($historial_cambio_claveOrigen,$historial_cambio_claveDestino,true,false,false);
				
				$this->actualizarLista($historial_cambio_claveDestino,$this->historial_cambio_claves);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->historial_cambio_clavesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->historial_cambio_clavesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->historial_cambio_clavesAuxiliar=array();
			}
			
			if(count($this->historial_cambio_clavesAuxiliar) > 0) {
				foreach ($this->historial_cambio_clavesAuxiliar as $historial_cambio_claveSeleccionado) {
					$this->historial_cambio_clave=new historial_cambio_clave();
					
					$this->setCopiarVariablesObjetos($historial_cambio_claveSeleccionado,$this->historial_cambio_clave,true,true,false);
						
					$this->historial_cambio_claves[]=$this->historial_cambio_clave;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->historial_cambio_clavesEliminados as $historial_cambio_claveEliminado) {
				$this->historial_cambio_claveLogic->historial_cambio_claves[]=$historial_cambio_claveEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->historial_cambio_clave=new historial_cambio_clave();
							
				$this->historial_cambio_claves[]=$this->historial_cambio_clave;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
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
		
		$historial_cambio_claveActual=new historial_cambio_clave();
		
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
				
				$historial_cambio_claveActual=$this->historial_cambio_claves[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $historial_cambio_claveActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $historial_cambio_claveActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $historial_cambio_claveActual->setfecha_hora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $historial_cambio_claveActual->setobservacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
			}
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
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=historial_cambio_clave_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadhistorial_cambio_clave='',string $strTipoPaginaAuxiliarhistorial_cambio_clave='',string $strTipoUsuarioAuxiliarhistorial_cambio_clave='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadhistorial_cambio_clave,$strTipoPaginaAuxiliarhistorial_cambio_clave,$strTipoUsuarioAuxiliarhistorial_cambio_clave,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->historial_cambio_claves) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=historial_cambio_clave_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=historial_cambio_clave_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=historial_cambio_clave_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$historial_cambio_clave_session=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME));
						
			if($historial_cambio_clave_session==null) {
				$historial_cambio_clave_session=new historial_cambio_clave_session();
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
					/*$this->intNumeroPaginacion=historial_cambio_clave_util::$INT_NUMERO_PAGINACION;*/
					
					if($historial_cambio_clave_session->intNumeroPaginacion==historial_cambio_clave_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=historial_cambio_clave_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$historial_cambio_clave_session->intNumeroPaginacion;
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
			
			$this->historial_cambio_clavesEliminados=array();
			
			/*$this->historial_cambio_claveLogic->setConnexion($connexion);*/
			
			$this->historial_cambio_claveLogic->setIsConDeep(true);
			
			$this->historial_cambio_claveLogic->gethistorial_cambio_claveDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('usuario');$classes[]=$class;
			
			$this->historial_cambio_claveLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->historial_cambio_claveLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->historial_cambio_claveLogic->gethistorial_cambio_claves()==null|| count($this->historial_cambio_claveLogic->gethistorial_cambio_claves())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->historial_cambio_claves=$this->historial_cambio_claveLogic->gethistorial_cambio_claves();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->historial_cambio_claveLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->historial_cambio_clavesReporte=$this->historial_cambio_claveLogic->gethistorial_cambio_claves();
									
						/*$this->generarReportes('Todos',$this->historial_cambio_claveLogic->gethistorial_cambio_claves());*/
					
						$this->historial_cambio_claveLogic->sethistorial_cambio_claves($this->historial_cambio_claves);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->historial_cambio_claveLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->historial_cambio_claveLogic->gethistorial_cambio_claves()==null|| count($this->historial_cambio_claveLogic->gethistorial_cambio_claves())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->historial_cambio_claves=$this->historial_cambio_claveLogic->gethistorial_cambio_claves();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->historial_cambio_claveLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->historial_cambio_clavesReporte=$this->historial_cambio_claveLogic->gethistorial_cambio_claves();
									
						/*$this->generarReportes('Todos',$this->historial_cambio_claveLogic->gethistorial_cambio_claves());*/
					
						$this->historial_cambio_claveLogic->sethistorial_cambio_claves($this->historial_cambio_claves);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idhistorial_cambio_clave=0;*/
				
				if($historial_cambio_clave_session->bitBusquedaDesdeFKSesionFK!=null && $historial_cambio_clave_session->bitBusquedaDesdeFKSesionFK==true) {
					if($historial_cambio_clave_session->bigIdActualFK!=null && $historial_cambio_clave_session->bigIdActualFK!=0)	{
						$this->idhistorial_cambio_clave=$historial_cambio_clave_session->bigIdActualFK;	
					}
					
					$historial_cambio_clave_session->bitBusquedaDesdeFKSesionFK=false;
					
					$historial_cambio_clave_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idhistorial_cambio_clave=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idhistorial_cambio_clave=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->historial_cambio_claveLogic->getEntity($this->idhistorial_cambio_clave);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*historial_cambio_claveLogicAdditional::getDetalleIndicePorId($idhistorial_cambio_clave);*/

				
				if($this->historial_cambio_claveLogic->gethistorial_cambio_clave()!=null) {
					$this->historial_cambio_claveLogic->sethistorial_cambio_claves(array());
					$this->historial_cambio_claveLogic->historial_cambio_claves[]=$this->historial_cambio_claveLogic->gethistorial_cambio_clave();
				}
			
			}
		
			else if($strAccionBusqueda=='BusquedaPorIdUsuarioPorFechaHora')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->historial_cambio_claveLogic->getsBusquedaPorIdUsuarioPorFechaHora($finalQueryPaginacion,$this->pagination,$this->id_usuarioBusquedaPorIdUsuarioPorFechaHora,$this->fecha_horaBusquedaPorIdUsuarioPorFechaHora);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//historial_cambio_claveLogicAdditional::getDetalleIndiceBusquedaPorIdUsuarioPorFechaHora($this->id_usuarioBusquedaPorIdUsuarioPorFechaHora,$this->fecha_horaBusquedaPorIdUsuarioPorFechaHora);


					if($this->historial_cambio_claveLogic->gethistorial_cambio_claves()==null || count($this->historial_cambio_claveLogic->gethistorial_cambio_claves())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$historial_cambio_claves=$this->historial_cambio_claveLogic->gethistorial_cambio_claves();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->historial_cambio_claveLogic->getsBusquedaPorIdUsuarioPorFechaHora('',$this->pagination,$this->id_usuarioBusquedaPorIdUsuarioPorFechaHora,$this->fecha_horaBusquedaPorIdUsuarioPorFechaHora);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->historial_cambio_clavesReporte=$this->historial_cambio_claveLogic->gethistorial_cambio_claves();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportehistorial_cambio_claves("BusquedaPorIdUsuarioPorFechaHora",$this->historial_cambio_claveLogic->gethistorial_cambio_claves());

					if($this->strTipoPaginacion=='TODOS') {
						$this->historial_cambio_claveLogic->sethistorial_cambio_claves($historial_cambio_claves);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($historial_cambio_clave_session->bigidusuarioActual!=null && $historial_cambio_clave_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$historial_cambio_clave_session->bigidusuarioActual;
					$historial_cambio_clave_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->historial_cambio_claveLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//historial_cambio_claveLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->historial_cambio_claveLogic->gethistorial_cambio_claves()==null || count($this->historial_cambio_claveLogic->gethistorial_cambio_claves())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$historial_cambio_claves=$this->historial_cambio_claveLogic->gethistorial_cambio_claves();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->historial_cambio_claveLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->historial_cambio_clavesReporte=$this->historial_cambio_claveLogic->gethistorial_cambio_claves();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportehistorial_cambio_claves("FK_Idusuario",$this->historial_cambio_claveLogic->gethistorial_cambio_claves());

					if($this->strTipoPaginacion=='TODOS') {
						$this->historial_cambio_claveLogic->sethistorial_cambio_claves($historial_cambio_claves);
					}
				//}

			} 
		
		$historial_cambio_clave_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$historial_cambio_clave_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->historial_cambio_claveLogic->loadForeignsKeysDescription();*/
		
		$this->historial_cambio_claves=$this->historial_cambio_claveLogic->gethistorial_cambio_claves();
		
		if($this->historial_cambio_clavesEliminados==null) {
			$this->historial_cambio_clavesEliminados=array();
		}
		
		$this->Session->write(historial_cambio_clave_util::$STR_SESSION_NAME.'Lista',serialize($this->historial_cambio_claves));
		$this->Session->write(historial_cambio_clave_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->historial_cambio_clavesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(historial_cambio_clave_util::$STR_SESSION_NAME,serialize($historial_cambio_clave_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idhistorial_cambio_clave=$idGeneral;
			
			$this->intNumeroPaginacion=historial_cambio_clave_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
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
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}

			if(count($this->historial_cambio_claves) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsBusquedaPorIdUsuarioPorFechaHoraParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=historial_cambio_clave_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioBusquedaPorIdUsuarioPorFechaHora=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorIdUsuarioPorFechaHora','cmbid_usuario');
			$this->fecha_horaBusquedaPorIdUsuarioPorFechaHora=Funciones::getFechaHoraFromDataBusqueda('date',$this->data,''.$this->strSufijo.'BusquedaPorIdUsuarioPorFechaHora','dtfecha_hora');

			$this->strAccionBusqueda='BusquedaPorIdUsuarioPorFechaHora';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
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
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=historial_cambio_clave_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsBusquedaPorIdUsuarioPorFechaHora($strFinalQuery,$id_usuario,$fecha_hora)
	{
		try
		{

			$this->historial_cambio_claveLogic->getsBusquedaPorIdUsuarioPorFechaHora($strFinalQuery,new Pagination(),$id_usuario,$fecha_hora);
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

			$this->historial_cambio_claveLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
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
			
			
			$historial_cambio_claveForeignKey=new historial_cambio_clave_param_return(); //historial_cambio_claveForeignKey();
			
			$historial_cambio_clave_session=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME));
						
			if($historial_cambio_clave_session==null) {
				$historial_cambio_clave_session=new historial_cambio_clave_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$historial_cambio_claveForeignKey=$this->historial_cambio_claveLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$historial_cambio_clave_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$historial_cambio_claveForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$historial_cambio_claveForeignKey->idusuarioDefaultFK;
			}

			if($historial_cambio_clave_session->bitBusquedaDesdeFKSesionusuario) {
				$this->setVisibleBusquedasParausuario(true);
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
	
	function cargarCombosFKFromReturnGeneral($historial_cambio_claveReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$historial_cambio_claveReturnGeneral->strRecargarFkTipos;
			
			


			if($historial_cambio_claveReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$historial_cambio_claveReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$historial_cambio_claveReturnGeneral->idusuarioDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(historial_cambio_clave_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$historial_cambio_clave_session=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME));
		
		if($historial_cambio_clave_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($historial_cambio_clave_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			
			$historial_cambio_clave_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}						
			
			$this->historial_cambio_clavesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->historial_cambio_clavesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->historial_cambio_clavesAuxiliar=array();
			}
			
			if(count($this->historial_cambio_clavesAuxiliar) > 0) {
				
				foreach ($this->historial_cambio_clavesAuxiliar as $historial_cambio_claveSeleccionado) {
					$this->eliminarTablaBase($historial_cambio_claveSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
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
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		
		return $arrNombresClasesRelacionadasLocal;
	}
	
	
	public function setstrRecargarFkInicializar() {
		$this->setstrRecargarFk('TODOS','NINGUNO',0,'');		
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


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=historial_cambio_clave_util::$INT_NUMERO_PAGINACION;
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
				$this->historial_cambio_claveLogic->commitNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->rollbackNewConnexionToDeep();
				$this->historial_cambio_claveLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$historial_cambio_clavesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->historial_cambio_claves as $historial_cambio_claveLocal) {
				if($historial_cambio_claveLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->historial_cambio_clave=new historial_cambio_clave();
				
				$this->historial_cambio_clave->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->historial_cambio_claves[]=$this->historial_cambio_clave;*/
				
				$historial_cambio_clavesNuevos[]=$this->historial_cambio_clave;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('usuario');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->historial_cambio_claveLogic->sethistorial_cambio_claves($historial_cambio_clavesNuevos);
					
				$this->historial_cambio_claveLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($historial_cambio_clavesNuevos as $historial_cambio_claveNuevo) {
					$this->historial_cambio_claves[]=$historial_cambio_claveNuevo;
				}
				
				/*$this->historial_cambio_claves[]=$historial_cambio_clavesNuevos;*/
				
				$this->historial_cambio_claveLogic->sethistorial_cambio_claves($this->historial_cambio_claves);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($historial_cambio_clavesNuevos!=null);
	}
					
	
	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery=''){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$this->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$historial_cambio_clave_session=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME));

		if($historial_cambio_clave_session==null) {
			$historial_cambio_clave_session=new historial_cambio_clave_session();
		}
		
		if($historial_cambio_clave_session->bitBusquedaDesdeFKSesionusuario!=true) {
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


			if($historial_cambio_clave_session->bigidusuarioActual!=null && $historial_cambio_clave_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($historial_cambio_clave_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=historial_cambio_clave_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	
	
	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=historial_cambio_clave_util::getusuarioDescripcion($usuarioLocal);
		}
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

			$strDescripcionusuario=historial_cambio_clave_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(historial_cambio_clave $historial_cambio_claveClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$historial_cambio_claveClase->setid_usuario($this->usuarioActual->getId());
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
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

		$this->strVisibleBusquedaPorIdUsuarioPorFechaHora=$strParaVisibleusuario;
		$this->strVisibleFK_Idusuario=$strParaVisibleusuario;
	}
	
	

	public function abrirBusquedaParausuario() {//$idhistorial_cambio_claveActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idhistorial_cambio_claveActual=$idhistorial_cambio_claveActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.historial_cambio_claveJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.historial_cambio_claveJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarhistorial_cambio_clave,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(historial_cambio_clave_util::$STR_SESSION_NAME,historial_cambio_clave_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$historial_cambio_clave_session=$this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME);
				
		if($historial_cambio_clave_session==null) {
			$historial_cambio_clave_session=new historial_cambio_clave_session();		
			//$this->Session->write('historial_cambio_clave_session',$historial_cambio_clave_session);							
		}
		*/
		
		$historial_cambio_clave_session=new historial_cambio_clave_session();
    	$historial_cambio_clave_session->strPathNavegacionActual=historial_cambio_clave_util::$STR_CLASS_WEB_TITULO;
    	$historial_cambio_clave_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(historial_cambio_clave_util::$STR_SESSION_NAME,serialize($historial_cambio_clave_session));		
	}	
	
	public function getSetBusquedasSesionConfig(historial_cambio_clave_session $historial_cambio_clave_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($historial_cambio_clave_session->bitBusquedaDesdeFKSesionFK!=null && $historial_cambio_clave_session->bitBusquedaDesdeFKSesionFK==true) {
			if($historial_cambio_clave_session->bigIdActualFK!=null && $historial_cambio_clave_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$historial_cambio_clave_session->bigIdActualFKParaPosibleAtras=$historial_cambio_clave_session->bigIdActualFK;*/
			}
				
			$historial_cambio_clave_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$historial_cambio_clave_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(historial_cambio_clave_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($historial_cambio_clave_session->bitBusquedaDesdeFKSesionusuario!=null && $historial_cambio_clave_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($historial_cambio_clave_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(historial_cambio_clave_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(historial_cambio_clave_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(historial_cambio_clave_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($historial_cambio_clave_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($historial_cambio_clave_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=historial_cambio_clave_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$historial_cambio_clave_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$historial_cambio_clave_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=historial_cambio_clave_util::$INT_NUMERO_PAGINACION;

				if($historial_cambio_clave_session->intNumeroPaginacion==historial_cambio_clave_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=historial_cambio_clave_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$historial_cambio_clave_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$historial_cambio_clave_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$historial_cambio_clave_session=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME));
		
		if($historial_cambio_clave_session==null) {
			$historial_cambio_clave_session=new historial_cambio_clave_session();
		}
		
		$historial_cambio_clave_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$historial_cambio_clave_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$historial_cambio_clave_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='BusquedaPorIdUsuarioPorFechaHora') {
			$historial_cambio_clave_session->id_usuario=$this->id_usuarioBusquedaPorIdUsuarioPorFechaHora;	
			$historial_cambio_clave_session->fecha_hora=$this->fecha_horaBusquedaPorIdUsuarioPorFechaHora;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$historial_cambio_clave_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		
		$this->Session->write(historial_cambio_clave_util::$STR_SESSION_NAME,serialize($historial_cambio_clave_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(historial_cambio_clave_session $historial_cambio_clave_session) {
		
		if($historial_cambio_clave_session==null) {
			$historial_cambio_clave_session=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME));
		}
		
		if($historial_cambio_clave_session==null) {
		   $historial_cambio_clave_session=new historial_cambio_clave_session();
		}
		
		if($historial_cambio_clave_session->strUltimaBusqueda!=null && $historial_cambio_clave_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$historial_cambio_clave_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$historial_cambio_clave_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$historial_cambio_clave_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='BusquedaPorIdUsuarioPorFechaHora') {
				$this->id_usuarioBusquedaPorIdUsuarioPorFechaHora=$historial_cambio_clave_session->id_usuario;
				$historial_cambio_clave_session->id_usuario=-1;
				$this->fecha_horaBusquedaPorIdUsuarioPorFechaHora=$historial_cambio_clave_session->fecha_hora;
				$historial_cambio_clave_session->fecha_hora=date('Y-m-d');

			}
			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$historial_cambio_clave_session->id_usuario;
				$historial_cambio_clave_session->id_usuario=-1;

			}
		}
		
		$historial_cambio_clave_session->strUltimaBusqueda='';
		//$historial_cambio_clave_session->intNumeroPaginacion=10;
		$historial_cambio_clave_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(historial_cambio_clave_util::$STR_SESSION_NAME,serialize($historial_cambio_clave_session));		
	}
	
	public function historial_cambio_clavesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idusuarioDefaultFK = 0;
	}
	
	public function sethistorial_cambio_claveFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_usuario',$this->idusuarioDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		usuario::$class;
		usuario_carga::$CONTROLLER;
		
		//REL
		
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
		interface historial_cambio_clave_controlI {	
		
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
		
		
		public function recargarReferenciasAction();
		
		
		public function manejarEventosAction();
		public function recargarFormularioGeneralAction();
		
		
		
		public function generarReporteConPhpExcelAction();	
		public function generarReporteConPhpExcelVerticalAction();	
		public function generarReporteConPhpExcelRelacionesAction();
		
		public function onLoad(historial_cambio_clave_session $historial_cambio_clave_session=null);	
		function index(?string $strTypeOnLoadhistorial_cambio_clave='',?string $strTipoPaginaAuxiliarhistorial_cambio_clave='',?string $strTipoUsuarioAuxiliarhistorial_cambio_clave='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
		public function seleccionar();	
		public function seleccionarActual(int $id = null);
		
		
		public function nuevoPreparar();	
		public function copiar();	
		public function duplicar();	
		public function guardarCambios();	
		public function nuevoTablaPreparar();	
		public function editarTablaDatos();	
		function guardarCambiosTablas();
		
			
		
		public function cancelarAccionesRelaciones();	
		public function recargarInformacion();	
		public function search(string $strTypeOnLoadhistorial_cambio_clave='',string $strTipoPaginaAuxiliarhistorial_cambio_clave='',string $strTipoUsuarioAuxiliarhistorial_cambio_clave='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($historial_cambio_claveReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(historial_cambio_clave $historial_cambio_claveClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(historial_cambio_clave_session $historial_cambio_clave_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(historial_cambio_clave_session $historial_cambio_clave_session);	
		public function historial_cambio_clavesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function sethistorial_cambio_claveFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
