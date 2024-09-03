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

namespace com\bydan\contabilidad\estimados\imagen_consignacion\presentation\control;

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

use com\bydan\contabilidad\estimados\imagen_consignacion\business\entity\imagen_consignacion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/imagen_consignacion/util/imagen_consignacion_carga.php');
use com\bydan\contabilidad\estimados\imagen_consignacion\util\imagen_consignacion_carga;

use com\bydan\contabilidad\estimados\imagen_consignacion\util\imagen_consignacion_util;
use com\bydan\contabilidad\estimados\imagen_consignacion\util\imagen_consignacion_param_return;
use com\bydan\contabilidad\estimados\imagen_consignacion\business\logic\imagen_consignacion_logic;
use com\bydan\contabilidad\estimados\imagen_consignacion\presentation\session\imagen_consignacion_session;


//FK


use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;
use com\bydan\contabilidad\estimados\consignacion\business\logic\consignacion_logic;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
imagen_consignacion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
imagen_consignacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
imagen_consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
imagen_consignacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*imagen_consignacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/estimados/imagen_consignacion/presentation/control/imagen_consignacion_init_control.php');
use com\bydan\contabilidad\estimados\imagen_consignacion\presentation\control\imagen_consignacion_init_control;

include_once('com/bydan/contabilidad/estimados/imagen_consignacion/presentation/control/imagen_consignacion_base_control.php');
use com\bydan\contabilidad\estimados\imagen_consignacion\presentation\control\imagen_consignacion_base_control;

class imagen_consignacion_control extends imagen_consignacion_base_control {	
	
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
			
			
			else if($action=="FK_Idconsignacion"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdconsignacionParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaconsignacion') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idimagen_consignacionActual=$this->getDataId();
				$this->abrirBusquedaParaconsignacion();//$idimagen_consignacionActual
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
					
					$imagen_consignacionController = new imagen_consignacion_control();
					
					$imagen_consignacionController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($imagen_consignacionController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$imagen_consignacionController = new imagen_consignacion_control();
						$imagen_consignacionController = $this;
						
						$jsonResponse = json_encode($imagen_consignacionController->imagen_consignacions);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->imagen_consignacionReturnGeneral==null) {
					$this->imagen_consignacionReturnGeneral=new imagen_consignacion_param_return();
				}
				
				echo($this->imagen_consignacionReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$imagen_consignacionController=new imagen_consignacion_control();
		
		$imagen_consignacionController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$imagen_consignacionController->usuarioActual=new usuario();
		
		$imagen_consignacionController->usuarioActual->setId($this->usuarioActual->getId());
		$imagen_consignacionController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$imagen_consignacionController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$imagen_consignacionController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$imagen_consignacionController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$imagen_consignacionController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$imagen_consignacionController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$imagen_consignacionController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $imagen_consignacionController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadimagen_consignacion= $this->getDataGeneralString('strTypeOnLoadimagen_consignacion');
		$strTipoPaginaAuxiliarimagen_consignacion= $this->getDataGeneralString('strTipoPaginaAuxiliarimagen_consignacion');
		$strTipoUsuarioAuxiliarimagen_consignacion= $this->getDataGeneralString('strTipoUsuarioAuxiliarimagen_consignacion');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadimagen_consignacion,$strTipoPaginaAuxiliarimagen_consignacion,$strTipoUsuarioAuxiliarimagen_consignacion,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadimagen_consignacion!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('imagen_consignacion','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(imagen_consignacion_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'estimados','','POPUP',$this->strTipoPaginaAuxiliarimagen_consignacion,$this->strTipoUsuarioAuxiliarimagen_consignacion,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(imagen_consignacion_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'estimados','','POPUP',$this->strTipoPaginaAuxiliarimagen_consignacion,$this->strTipoUsuarioAuxiliarimagen_consignacion,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->imagen_consignacionReturnGeneral=new imagen_consignacion_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->imagen_consignacionReturnGeneral->conGuardarReturnSessionJs=true;
		$this->imagen_consignacionReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->imagen_consignacionReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->imagen_consignacionReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->imagen_consignacionReturnGeneral);
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
		$this->imagen_consignacionReturnGeneral=new imagen_consignacion_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->imagen_consignacionReturnGeneral->conGuardarReturnSessionJs=true;
		$this->imagen_consignacionReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->imagen_consignacionReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->imagen_consignacionReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->imagen_consignacionReturnGeneral);
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
		$this->imagen_consignacionReturnGeneral=new imagen_consignacion_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->imagen_consignacionReturnGeneral->conGuardarReturnSessionJs=true;
		$this->imagen_consignacionReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->imagen_consignacionReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->imagen_consignacionReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->imagen_consignacionReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
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
			
			
			$this->imagen_consignacionReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->imagen_consignacionReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->imagen_consignacionReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->imagen_consignacionReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->imagen_consignacionReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->imagen_consignacionReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->imagen_consignacionReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->imagen_consignacionReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->imagen_consignacionReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->imagen_consignacionReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->imagen_consignacionReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->imagen_consignacionReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->imagen_consignacionReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->imagen_consignacionReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->imagen_consignacionReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->imagen_consignacionReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->imagen_consignacionReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->imagen_consignacionReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
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
		
		$this->imagen_consignacionLogic=new imagen_consignacion_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->imagen_consignacion=new imagen_consignacion();
		
		$this->strTypeOnLoadimagen_consignacion='onload';
		$this->strTipoPaginaAuxiliarimagen_consignacion='none';
		$this->strTipoUsuarioAuxiliarimagen_consignacion='none';	

		$this->intNumeroPaginacion=imagen_consignacion_util::$INT_NUMERO_PAGINACION;
		
		$this->imagen_consignacionModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_consignacionControllerAdditional=new imagen_consignacion_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(imagen_consignacion_session $imagen_consignacion_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($imagen_consignacion_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadimagen_consignacion='',?string $strTipoPaginaAuxiliarimagen_consignacion='',?string $strTipoUsuarioAuxiliarimagen_consignacion='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadimagen_consignacion=$strTypeOnLoadimagen_consignacion;
			$this->strTipoPaginaAuxiliarimagen_consignacion=$strTipoPaginaAuxiliarimagen_consignacion;
			$this->strTipoUsuarioAuxiliarimagen_consignacion=$strTipoUsuarioAuxiliarimagen_consignacion;
	
			if($strTipoUsuarioAuxiliarimagen_consignacion=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->imagen_consignacion=new imagen_consignacion();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Imagenes Consignaciones';
			
			
			$imagen_consignacion_session=unserialize($this->Session->read(imagen_consignacion_util::$STR_SESSION_NAME));
							
			if($imagen_consignacion_session==null) {
				$imagen_consignacion_session=new imagen_consignacion_session();
				
				/*$this->Session->write('imagen_consignacion_session',$imagen_consignacion_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($imagen_consignacion_session->strFuncionJsPadre!=null && $imagen_consignacion_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$imagen_consignacion_session->strFuncionJsPadre;
				
				$imagen_consignacion_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($imagen_consignacion_session);
			
			if($strTypeOnLoadimagen_consignacion!=null && $strTypeOnLoadimagen_consignacion=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$imagen_consignacion_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$imagen_consignacion_session->setPaginaPopupVariables(true);
				}
				
				if($imagen_consignacion_session->intNumeroPaginacion==imagen_consignacion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=imagen_consignacion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$imagen_consignacion_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,imagen_consignacion_util::$STR_SESSION_NAME,'estimados');																
			
			} else if($strTypeOnLoadimagen_consignacion!=null && $strTypeOnLoadimagen_consignacion=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$imagen_consignacion_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=imagen_consignacion_util::$INT_NUMERO_PAGINACION;*/
				
				if($imagen_consignacion_session->intNumeroPaginacion==imagen_consignacion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=imagen_consignacion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$imagen_consignacion_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarimagen_consignacion!=null && $strTipoPaginaAuxiliarimagen_consignacion=='none') {
				/*$imagen_consignacion_session->strStyleDivHeader='display:table-row';*/
				
				/*$imagen_consignacion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarimagen_consignacion!=null && $strTipoPaginaAuxiliarimagen_consignacion=='iframe') {
					/*
					$imagen_consignacion_session->strStyleDivArbol='display:none';
					$imagen_consignacion_session->strStyleDivHeader='display:none';
					$imagen_consignacion_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$imagen_consignacion_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->imagen_consignacionClase=new imagen_consignacion();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=imagen_consignacion_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(imagen_consignacion_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->imagen_consignacionLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->imagen_consignacionLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->imagen_consignacionLogic=new imagen_consignacion_logic();*/
			
			
			$this->imagen_consignacionsModel=null;
			/*new ListDataModel();*/
			
			/*$this->imagen_consignacionsModel.setWrappedData(imagen_consignacionLogic->getimagen_consignacions());*/
						
			$this->imagen_consignacions= array();
			$this->imagen_consignacionsEliminados=array();
			$this->imagen_consignacionsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= imagen_consignacion_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->imagen_consignacion= new imagen_consignacion();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idconsignacion='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarimagen_consignacion!=null && $strTipoUsuarioAuxiliarimagen_consignacion!='none' && $strTipoUsuarioAuxiliarimagen_consignacion!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarimagen_consignacion);
																
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
				if($strTipoUsuarioAuxiliarimagen_consignacion!=null && $strTipoUsuarioAuxiliarimagen_consignacion!='none' && $strTipoUsuarioAuxiliarimagen_consignacion!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarimagen_consignacion);
																
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
				if($strTipoUsuarioAuxiliarimagen_consignacion==null || $strTipoUsuarioAuxiliarimagen_consignacion=='none' || $strTipoUsuarioAuxiliarimagen_consignacion=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarimagen_consignacion,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, imagen_consignacion_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, imagen_consignacion_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina imagen_consignacion');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($imagen_consignacion_session);
			
			$this->getSetBusquedasSesionConfig($imagen_consignacion_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteimagen_consignacions($this->strAccionBusqueda,$this->imagen_consignacionLogic->getimagen_consignacions());*/
				} else if($this->strGenerarReporte=='Html')	{
					$imagen_consignacion_session->strServletGenerarHtmlReporte='imagen_consignacionServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(imagen_consignacion_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(imagen_consignacion_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($imagen_consignacion_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$imagen_consignacion_session=unserialize($this->Session->read(imagen_consignacion_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarimagen_consignacion!=null && $strTipoUsuarioAuxiliarimagen_consignacion=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($imagen_consignacion_session);
			}
								
			$this->set(imagen_consignacion_util::$STR_SESSION_NAME, $imagen_consignacion_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($imagen_consignacion_session);
			
			/*
			$this->imagen_consignacion->recursive = 0;
			
			$this->imagen_consignacions=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('imagen_consignacions', $this->imagen_consignacions);
			
			$this->set(imagen_consignacion_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->imagen_consignacionActual =$this->imagen_consignacionClase;
			
			/*$this->imagen_consignacionActual =$this->migrarModelimagen_consignacion($this->imagen_consignacionClase);*/
			
			$this->returnHtml(false);
			
			$this->set(imagen_consignacion_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=imagen_consignacion_util::$STR_NOMBRE_OPCION;
				
			if(imagen_consignacion_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=imagen_consignacion_util::$STR_MODULO_OPCION.imagen_consignacion_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(imagen_consignacion_util::$STR_SESSION_NAME,serialize($imagen_consignacion_session));
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
			/*$imagen_consignacionClase= (imagen_consignacion) imagen_consignacionsModel.getRowData();*/
			
			$this->imagen_consignacionClase->setId($this->imagen_consignacion->getId());	
			$this->imagen_consignacionClase->setVersionRow($this->imagen_consignacion->getVersionRow());	
			$this->imagen_consignacionClase->setVersionRow($this->imagen_consignacion->getVersionRow());	
			$this->imagen_consignacionClase->setid_consignacion($this->imagen_consignacion->getid_consignacion());	
			$this->imagen_consignacionClase->setimagen($this->imagen_consignacion->getimagen());	
		
			/*$this->Session->write('imagen_consignacionVersionRowActual', imagen_consignacion.getVersionRow());*/
			
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
			
			$imagen_consignacion_session=unserialize($this->Session->read(imagen_consignacion_util::$STR_SESSION_NAME));
						
			if($imagen_consignacion_session==null) {
				$imagen_consignacion_session=new imagen_consignacion_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('imagen_consignacion', $this->imagen_consignacion->read(null, $id));
	
			
			$this->imagen_consignacion->recursive = 0;
			
			$this->imagen_consignacions=$this->paginate();
			
			$this->set('imagen_consignacions', $this->imagen_consignacions);
	
			if (empty($this->data)) {
				$this->data = $this->imagen_consignacion->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->imagen_consignacionLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->imagen_consignacionClase);
			
			$this->imagen_consignacionActual=$this->imagen_consignacionClase;
			
			/*$this->imagen_consignacionActual =$this->migrarModelimagen_consignacion($this->imagen_consignacionClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->imagen_consignacionLogic->getimagen_consignacions(),$this->imagen_consignacionActual);
			
			$this->actualizarControllerConReturnGeneral($this->imagen_consignacionReturnGeneral);
			
			//$this->imagen_consignacionReturnGeneral=$this->imagen_consignacionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->imagen_consignacionLogic->getimagen_consignacions(),$this->imagen_consignacionActual,$this->imagen_consignacionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$imagen_consignacion_session=unserialize($this->Session->read(imagen_consignacion_util::$STR_SESSION_NAME));
						
			if($imagen_consignacion_session==null) {
				$imagen_consignacion_session=new imagen_consignacion_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoimagen_consignacion', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->imagen_consignacionClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->imagen_consignacionClase);
			
			$this->imagen_consignacionActual =$this->imagen_consignacionClase;
			
			/*$this->imagen_consignacionActual =$this->migrarModelimagen_consignacion($this->imagen_consignacionClase);*/
			
			$this->setimagen_consignacionFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->imagen_consignacionLogic->getimagen_consignacions(),$this->imagen_consignacion);
			
			$this->actualizarControllerConReturnGeneral($this->imagen_consignacionReturnGeneral);
			
			//this->imagen_consignacionReturnGeneral=$this->imagen_consignacionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->imagen_consignacionLogic->getimagen_consignacions(),$this->imagen_consignacion,$this->imagen_consignacionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idconsignacionDefaultFK!=null && $this->idconsignacionDefaultFK > -1) {
				$this->imagen_consignacionReturnGeneral->getimagen_consignacion()->setid_consignacion($this->idconsignacionDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->imagen_consignacionReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->imagen_consignacionReturnGeneral->getimagen_consignacion(),$this->imagen_consignacionActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyimagen_consignacion($this->imagen_consignacionReturnGeneral->getimagen_consignacion());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioimagen_consignacion($this->imagen_consignacionReturnGeneral->getimagen_consignacion());*/
			}
			
			if($this->imagen_consignacionReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->imagen_consignacionReturnGeneral->getimagen_consignacion(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualimagen_consignacion($this->imagen_consignacion,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->imagen_consignacionsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->imagen_consignacionsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->imagen_consignacionsAuxiliar=array();
			}
			
			if(count($this->imagen_consignacionsAuxiliar)==2) {
				$imagen_consignacionOrigen=$this->imagen_consignacionsAuxiliar[0];
				$imagen_consignacionDestino=$this->imagen_consignacionsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($imagen_consignacionOrigen,$imagen_consignacionDestino,true,false,false);
				
				$this->actualizarLista($imagen_consignacionDestino,$this->imagen_consignacions);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->imagen_consignacionsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->imagen_consignacionsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->imagen_consignacionsAuxiliar=array();
			}
			
			if(count($this->imagen_consignacionsAuxiliar) > 0) {
				foreach ($this->imagen_consignacionsAuxiliar as $imagen_consignacionSeleccionado) {
					$this->imagen_consignacion=new imagen_consignacion();
					
					$this->setCopiarVariablesObjetos($imagen_consignacionSeleccionado,$this->imagen_consignacion,true,true,false);
						
					$this->imagen_consignacions[]=$this->imagen_consignacion;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->imagen_consignacionsEliminados as $imagen_consignacionEliminado) {
				$this->imagen_consignacionLogic->imagen_consignacions[]=$imagen_consignacionEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->imagen_consignacion=new imagen_consignacion();
							
				$this->imagen_consignacions[]=$this->imagen_consignacion;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
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
		
		$imagen_consignacionActual=new imagen_consignacion();
		
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
				
				$imagen_consignacionActual=$this->imagen_consignacions[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $imagen_consignacionActual->setid_consignacion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $imagen_consignacionActual->setimagen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
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
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=imagen_consignacion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadimagen_consignacion='',string $strTipoPaginaAuxiliarimagen_consignacion='',string $strTipoUsuarioAuxiliarimagen_consignacion='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadimagen_consignacion,$strTipoPaginaAuxiliarimagen_consignacion,$strTipoUsuarioAuxiliarimagen_consignacion,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->imagen_consignacions) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=imagen_consignacion_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=imagen_consignacion_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=imagen_consignacion_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$imagen_consignacion_session=unserialize($this->Session->read(imagen_consignacion_util::$STR_SESSION_NAME));
						
			if($imagen_consignacion_session==null) {
				$imagen_consignacion_session=new imagen_consignacion_session();
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
					/*$this->intNumeroPaginacion=imagen_consignacion_util::$INT_NUMERO_PAGINACION;*/
					
					if($imagen_consignacion_session->intNumeroPaginacion==imagen_consignacion_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=imagen_consignacion_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$imagen_consignacion_session->intNumeroPaginacion;
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
			
			$this->imagen_consignacionsEliminados=array();
			
			/*$this->imagen_consignacionLogic->setConnexion($connexion);*/
			
			$this->imagen_consignacionLogic->setIsConDeep(true);
			
			$this->imagen_consignacionLogic->getimagen_consignacionDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('consignacion');$classes[]=$class;
			
			$this->imagen_consignacionLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->imagen_consignacionLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->imagen_consignacionLogic->getimagen_consignacions()==null|| count($this->imagen_consignacionLogic->getimagen_consignacions())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->imagen_consignacions=$this->imagen_consignacionLogic->getimagen_consignacions();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->imagen_consignacionLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->imagen_consignacionsReporte=$this->imagen_consignacionLogic->getimagen_consignacions();
									
						/*$this->generarReportes('Todos',$this->imagen_consignacionLogic->getimagen_consignacions());*/
					
						$this->imagen_consignacionLogic->setimagen_consignacions($this->imagen_consignacions);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->imagen_consignacionLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->imagen_consignacionLogic->getimagen_consignacions()==null|| count($this->imagen_consignacionLogic->getimagen_consignacions())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->imagen_consignacions=$this->imagen_consignacionLogic->getimagen_consignacions();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->imagen_consignacionLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->imagen_consignacionsReporte=$this->imagen_consignacionLogic->getimagen_consignacions();
									
						/*$this->generarReportes('Todos',$this->imagen_consignacionLogic->getimagen_consignacions());*/
					
						$this->imagen_consignacionLogic->setimagen_consignacions($this->imagen_consignacions);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idimagen_consignacion=0;*/
				
				if($imagen_consignacion_session->bitBusquedaDesdeFKSesionFK!=null && $imagen_consignacion_session->bitBusquedaDesdeFKSesionFK==true) {
					if($imagen_consignacion_session->bigIdActualFK!=null && $imagen_consignacion_session->bigIdActualFK!=0)	{
						$this->idimagen_consignacion=$imagen_consignacion_session->bigIdActualFK;	
					}
					
					$imagen_consignacion_session->bitBusquedaDesdeFKSesionFK=false;
					
					$imagen_consignacion_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idimagen_consignacion=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idimagen_consignacion=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->imagen_consignacionLogic->getEntity($this->idimagen_consignacion);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*imagen_consignacionLogicAdditional::getDetalleIndicePorId($idimagen_consignacion);*/

				
				if($this->imagen_consignacionLogic->getimagen_consignacion()!=null) {
					$this->imagen_consignacionLogic->setimagen_consignacions(array());
					$this->imagen_consignacionLogic->imagen_consignacions[]=$this->imagen_consignacionLogic->getimagen_consignacion();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idconsignacion')
			{

				if($imagen_consignacion_session->bigidconsignacionActual!=null && $imagen_consignacion_session->bigidconsignacionActual!=0)
				{
					$this->id_consignacionFK_Idconsignacion=$imagen_consignacion_session->bigidconsignacionActual;
					$imagen_consignacion_session->bigidconsignacionActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->imagen_consignacionLogic->getsFK_Idconsignacion($finalQueryPaginacion,$this->pagination,$this->id_consignacionFK_Idconsignacion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//imagen_consignacionLogicAdditional::getDetalleIndiceFK_Idconsignacion($this->id_consignacionFK_Idconsignacion);


					if($this->imagen_consignacionLogic->getimagen_consignacions()==null || count($this->imagen_consignacionLogic->getimagen_consignacions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$imagen_consignacions=$this->imagen_consignacionLogic->getimagen_consignacions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->imagen_consignacionLogic->getsFK_Idconsignacion('',$this->pagination,$this->id_consignacionFK_Idconsignacion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->imagen_consignacionsReporte=$this->imagen_consignacionLogic->getimagen_consignacions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteimagen_consignacions("FK_Idconsignacion",$this->imagen_consignacionLogic->getimagen_consignacions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->imagen_consignacionLogic->setimagen_consignacions($imagen_consignacions);
					}
				//}

			} 
		
		$imagen_consignacion_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$imagen_consignacion_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->imagen_consignacionLogic->loadForeignsKeysDescription();*/
		
		$this->imagen_consignacions=$this->imagen_consignacionLogic->getimagen_consignacions();
		
		if($this->imagen_consignacionsEliminados==null) {
			$this->imagen_consignacionsEliminados=array();
		}
		
		$this->Session->write(imagen_consignacion_util::$STR_SESSION_NAME.'Lista',serialize($this->imagen_consignacions));
		$this->Session->write(imagen_consignacion_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->imagen_consignacionsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(imagen_consignacion_util::$STR_SESSION_NAME,serialize($imagen_consignacion_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idimagen_consignacion=$idGeneral;
			
			$this->intNumeroPaginacion=imagen_consignacion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
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
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
			}

			if(count($this->imagen_consignacions) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdconsignacionParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=imagen_consignacion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_consignacionFK_Idconsignacion=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idconsignacion','cmbid_consignacion');

			$this->strAccionBusqueda='FK_Idconsignacion';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idconsignacion($strFinalQuery,$id_consignacion)
	{
		try
		{

			$this->imagen_consignacionLogic->getsFK_Idconsignacion($strFinalQuery,new Pagination(),$id_consignacion);
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
			
			
			$imagen_consignacionForeignKey=new imagen_consignacion_param_return(); //imagen_consignacionForeignKey();
			
			$imagen_consignacion_session=unserialize($this->Session->read(imagen_consignacion_util::$STR_SESSION_NAME));
						
			if($imagen_consignacion_session==null) {
				$imagen_consignacion_session=new imagen_consignacion_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$imagen_consignacionForeignKey=$this->imagen_consignacionLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$imagen_consignacion_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_consignacion',$this->strRecargarFkTipos,',')) {
				$this->consignacionsFK=$imagen_consignacionForeignKey->consignacionsFK;
				$this->idconsignacionDefaultFK=$imagen_consignacionForeignKey->idconsignacionDefaultFK;
			}

			if($imagen_consignacion_session->bitBusquedaDesdeFKSesionconsignacion) {
				$this->setVisibleBusquedasParaconsignacion(true);
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
	
	function cargarCombosFKFromReturnGeneral($imagen_consignacionReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$imagen_consignacionReturnGeneral->strRecargarFkTipos;
			
			


			if($imagen_consignacionReturnGeneral->con_consignacionsFK==true) {
				$this->consignacionsFK=$imagen_consignacionReturnGeneral->consignacionsFK;
				$this->idconsignacionDefaultFK=$imagen_consignacionReturnGeneral->idconsignacionDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(imagen_consignacion_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$imagen_consignacion_session=unserialize($this->Session->read(imagen_consignacion_util::$STR_SESSION_NAME));
		
		if($imagen_consignacion_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($imagen_consignacion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==consignacion_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='consignacion';
			}
			
			$imagen_consignacion_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
			}						
			
			$this->imagen_consignacionsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->imagen_consignacionsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->imagen_consignacionsAuxiliar=array();
			}
			
			if(count($this->imagen_consignacionsAuxiliar) > 0) {
				
				foreach ($this->imagen_consignacionsAuxiliar as $imagen_consignacionSeleccionado) {
					$this->eliminarTablaBase($imagen_consignacionSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
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
	
	
	
	public function getconsignacionsFKListSelectItem() 
	{
		$consignacionsList=array();

		$item=null;

		foreach($this->consignacionsFK as $consignacion)
		{
			$item=new SelectItem();
			$item->setLabel($consignacion>getId());
			$item->setValue($consignacion->getId());
			$consignacionsList[]=$item;
		}

		return $consignacionsList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=imagen_consignacion_util::$INT_NUMERO_PAGINACION;
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
				$this->imagen_consignacionLogic->commitNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->rollbackNewConnexionToDeep();
				$this->imagen_consignacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$imagen_consignacionsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->imagen_consignacions as $imagen_consignacionLocal) {
				if($imagen_consignacionLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->imagen_consignacion=new imagen_consignacion();
				
				$this->imagen_consignacion->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->imagen_consignacions[]=$this->imagen_consignacion;*/
				
				$imagen_consignacionsNuevos[]=$this->imagen_consignacion;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('consignacion');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_consignacionLogic->setimagen_consignacions($imagen_consignacionsNuevos);
					
				$this->imagen_consignacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($imagen_consignacionsNuevos as $imagen_consignacionNuevo) {
					$this->imagen_consignacions[]=$imagen_consignacionNuevo;
				}
				
				/*$this->imagen_consignacions[]=$imagen_consignacionsNuevos;*/
				
				$this->imagen_consignacionLogic->setimagen_consignacions($this->imagen_consignacions);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($imagen_consignacionsNuevos!=null);
	}
					
	
	public function cargarCombosconsignacionsFK($connexion=null,$strRecargarFkQuery=''){
		$consignacionLogic= new consignacion_logic();
		$pagination= new Pagination();
		$this->consignacionsFK=array();

		$consignacionLogic->setConnexion($connexion);
		$consignacionLogic->getconsignacionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$imagen_consignacion_session=unserialize($this->Session->read(imagen_consignacion_util::$STR_SESSION_NAME));

		if($imagen_consignacion_session==null) {
			$imagen_consignacion_session=new imagen_consignacion_session();
		}
		
		if($imagen_consignacion_session->bitBusquedaDesdeFKSesionconsignacion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=consignacion_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalconsignacion=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalconsignacion=Funciones::GetFinalQueryAppend($finalQueryGlobalconsignacion, '');
				$finalQueryGlobalconsignacion.=consignacion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalconsignacion.$strRecargarFkQuery;		

				$consignacionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosconsignacionsFK($consignacionLogic->getconsignacions());

		} else {
			$this->setVisibleBusquedasParaconsignacion(true);


			if($imagen_consignacion_session->bigidconsignacionActual!=null && $imagen_consignacion_session->bigidconsignacionActual > 0) {
				$consignacionLogic->getEntity($imagen_consignacion_session->bigidconsignacionActual);//WithConnection

				$this->consignacionsFK[$consignacionLogic->getconsignacion()->getId()]=imagen_consignacion_util::getconsignacionDescripcion($consignacionLogic->getconsignacion());
				$this->idconsignacionDefaultFK=$consignacionLogic->getconsignacion()->getId();
			}
		}
	}

	
	
	public function prepararCombosconsignacionsFK($consignacions){

		foreach ($consignacions as $consignacionLocal ) {
			if($this->idconsignacionDefaultFK==0) {
				$this->idconsignacionDefaultFK=$consignacionLocal->getId();
			}

			$this->consignacionsFK[$consignacionLocal->getId()]=imagen_consignacion_util::getconsignacionDescripcion($consignacionLocal);
		}
	}

	
	
	public function cargarDescripcionconsignacionFK($idconsignacion,$connexion=null){
		$consignacionLogic= new consignacion_logic();
		$consignacionLogic->setConnexion($connexion);
		$consignacionLogic->getconsignacionDataAccess()->isForFKData=true;
		$strDescripcionconsignacion='';

		if($idconsignacion!=null && $idconsignacion!='' && $idconsignacion!='null') {
			if($connexion!=null) {
				$consignacionLogic->getEntity($idconsignacion);//WithConnection
			} else {
				$consignacionLogic->getEntityWithConnection($idconsignacion);//
			}

			$strDescripcionconsignacion=imagen_consignacion_util::getconsignacionDescripcion($consignacionLogic->getconsignacion());

		} else {
			$strDescripcionconsignacion='null';
		}

		return $strDescripcionconsignacion;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(imagen_consignacion $imagen_consignacionClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParaconsignacion($isParaconsignacion){
		$strParaVisibleconsignacion='display:table-row';
		$strParaVisibleNegacionconsignacion='display:none';

		if($isParaconsignacion) {
			$strParaVisibleconsignacion='display:table-row';
			$strParaVisibleNegacionconsignacion='display:none';
		} else {
			$strParaVisibleconsignacion='display:none';
			$strParaVisibleNegacionconsignacion='display:table-row';
		}


		$strParaVisibleNegacionconsignacion=trim($strParaVisibleNegacionconsignacion);

		$this->strVisibleFK_Idconsignacion=$strParaVisibleconsignacion;
	}
	
	

	public function abrirBusquedaParaconsignacion() {//$idimagen_consignacionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idimagen_consignacionActual=$idimagen_consignacionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.consignacion_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.imagen_consignacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_consignacion(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',consignacion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.imagen_consignacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_consignacion(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(consignacion_util::$STR_CLASS_NAME,'estimados','','POPUP','iframe',$this->strTipoUsuarioAuxiliarimagen_consignacion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(imagen_consignacion_util::$STR_SESSION_NAME,imagen_consignacion_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$imagen_consignacion_session=$this->Session->read(imagen_consignacion_util::$STR_SESSION_NAME);
				
		if($imagen_consignacion_session==null) {
			$imagen_consignacion_session=new imagen_consignacion_session();		
			//$this->Session->write('imagen_consignacion_session',$imagen_consignacion_session);							
		}
		*/
		
		$imagen_consignacion_session=new imagen_consignacion_session();
    	$imagen_consignacion_session->strPathNavegacionActual=imagen_consignacion_util::$STR_CLASS_WEB_TITULO;
    	$imagen_consignacion_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(imagen_consignacion_util::$STR_SESSION_NAME,serialize($imagen_consignacion_session));		
	}	
	
	public function getSetBusquedasSesionConfig(imagen_consignacion_session $imagen_consignacion_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($imagen_consignacion_session->bitBusquedaDesdeFKSesionFK!=null && $imagen_consignacion_session->bitBusquedaDesdeFKSesionFK==true) {
			if($imagen_consignacion_session->bigIdActualFK!=null && $imagen_consignacion_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$imagen_consignacion_session->bigIdActualFKParaPosibleAtras=$imagen_consignacion_session->bigIdActualFK;*/
			}
				
			$imagen_consignacion_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$imagen_consignacion_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(imagen_consignacion_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($imagen_consignacion_session->bitBusquedaDesdeFKSesionconsignacion!=null && $imagen_consignacion_session->bitBusquedaDesdeFKSesionconsignacion==true)
			{
				if($imagen_consignacion_session->bigidconsignacionActual!=0) {
					$this->strAccionBusqueda='FK_Idconsignacion';

					$existe_history=HistoryWeb::ExisteElemento(imagen_consignacion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(imagen_consignacion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(imagen_consignacion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($imagen_consignacion_session->bigidconsignacionActualDescripcion);
						$historyWeb->setIdActual($imagen_consignacion_session->bigidconsignacionActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=imagen_consignacion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$imagen_consignacion_session->bigidconsignacionActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$imagen_consignacion_session->bitBusquedaDesdeFKSesionconsignacion=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=imagen_consignacion_util::$INT_NUMERO_PAGINACION;

				if($imagen_consignacion_session->intNumeroPaginacion==imagen_consignacion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=imagen_consignacion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$imagen_consignacion_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$imagen_consignacion_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$imagen_consignacion_session=unserialize($this->Session->read(imagen_consignacion_util::$STR_SESSION_NAME));
		
		if($imagen_consignacion_session==null) {
			$imagen_consignacion_session=new imagen_consignacion_session();
		}
		
		$imagen_consignacion_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$imagen_consignacion_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$imagen_consignacion_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idconsignacion') {
			$imagen_consignacion_session->id_consignacion=$this->id_consignacionFK_Idconsignacion;	

		}
		
		$this->Session->write(imagen_consignacion_util::$STR_SESSION_NAME,serialize($imagen_consignacion_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(imagen_consignacion_session $imagen_consignacion_session) {
		
		if($imagen_consignacion_session==null) {
			$imagen_consignacion_session=unserialize($this->Session->read(imagen_consignacion_util::$STR_SESSION_NAME));
		}
		
		if($imagen_consignacion_session==null) {
		   $imagen_consignacion_session=new imagen_consignacion_session();
		}
		
		if($imagen_consignacion_session->strUltimaBusqueda!=null && $imagen_consignacion_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$imagen_consignacion_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$imagen_consignacion_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$imagen_consignacion_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idconsignacion') {
				$this->id_consignacionFK_Idconsignacion=$imagen_consignacion_session->id_consignacion;
				$imagen_consignacion_session->id_consignacion=-1;

			}
		}
		
		$imagen_consignacion_session->strUltimaBusqueda='';
		//$imagen_consignacion_session->intNumeroPaginacion=10;
		$imagen_consignacion_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(imagen_consignacion_util::$STR_SESSION_NAME,serialize($imagen_consignacion_session));		
	}
	
	public function imagen_consignacionsControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idconsignacionDefaultFK = 0;
	}
	
	public function setimagen_consignacionFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_consignacion',$this->idconsignacionDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		consignacion::$class;
		consignacion_carga::$CONTROLLER;
		
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
		interface imagen_consignacion_controlI {	
		
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
		
		public function onLoad(imagen_consignacion_session $imagen_consignacion_session=null);	
		function index(?string $strTypeOnLoadimagen_consignacion='',?string $strTipoPaginaAuxiliarimagen_consignacion='',?string $strTipoUsuarioAuxiliarimagen_consignacion='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadimagen_consignacion='',string $strTipoPaginaAuxiliarimagen_consignacion='',string $strTipoUsuarioAuxiliarimagen_consignacion='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($imagen_consignacionReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(imagen_consignacion $imagen_consignacionClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(imagen_consignacion_session $imagen_consignacion_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(imagen_consignacion_session $imagen_consignacion_session);	
		public function imagen_consignacionsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setimagen_consignacionFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
