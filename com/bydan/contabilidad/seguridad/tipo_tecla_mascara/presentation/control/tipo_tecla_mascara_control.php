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

namespace com\bydan\contabilidad\seguridad\tipo_tecla_mascara\presentation\control;

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

use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\entity\tipo_tecla_mascara;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/tipo_tecla_mascara/util/tipo_tecla_mascara_carga.php');
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util\tipo_tecla_mascara_carga;

use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util\tipo_tecla_mascara_util;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util\tipo_tecla_mascara_param_return;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\logic\tipo_tecla_mascara_logic;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\presentation\session\tipo_tecla_mascara_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
tipo_tecla_mascara_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
tipo_tecla_mascara_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
tipo_tecla_mascara_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
tipo_tecla_mascara_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*tipo_tecla_mascara_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/seguridad/tipo_tecla_mascara/presentation/control/tipo_tecla_mascara_init_control.php');
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\presentation\control\tipo_tecla_mascara_init_control;

include_once('com/bydan/contabilidad/seguridad/tipo_tecla_mascara/presentation/control/tipo_tecla_mascara_base_control.php');
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\presentation\control\tipo_tecla_mascara_base_control;

class tipo_tecla_mascara_control extends tipo_tecla_mascara_base_control {	
	
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
					
					$tipo_tecla_mascaraController = new tipo_tecla_mascara_control();
					
					$tipo_tecla_mascaraController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($tipo_tecla_mascaraController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$tipo_tecla_mascaraController = new tipo_tecla_mascara_control();
						$tipo_tecla_mascaraController = $this;
						
						$jsonResponse = json_encode($tipo_tecla_mascaraController->tipo_tecla_mascaras);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->tipo_tecla_mascaraReturnGeneral==null) {
					$this->tipo_tecla_mascaraReturnGeneral=new tipo_tecla_mascara_param_return();
				}
				
				echo($this->tipo_tecla_mascaraReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$tipo_tecla_mascaraController=new tipo_tecla_mascara_control();
		
		$tipo_tecla_mascaraController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$tipo_tecla_mascaraController->usuarioActual=new usuario();
		
		$tipo_tecla_mascaraController->usuarioActual->setId($this->usuarioActual->getId());
		$tipo_tecla_mascaraController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$tipo_tecla_mascaraController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$tipo_tecla_mascaraController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$tipo_tecla_mascaraController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$tipo_tecla_mascaraController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$tipo_tecla_mascaraController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$tipo_tecla_mascaraController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $tipo_tecla_mascaraController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadtipo_tecla_mascara= $this->getDataGeneralString('strTypeOnLoadtipo_tecla_mascara');
		$strTipoPaginaAuxiliartipo_tecla_mascara= $this->getDataGeneralString('strTipoPaginaAuxiliartipo_tecla_mascara');
		$strTipoUsuarioAuxiliartipo_tecla_mascara= $this->getDataGeneralString('strTipoUsuarioAuxiliartipo_tecla_mascara');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadtipo_tecla_mascara,$strTipoPaginaAuxiliartipo_tecla_mascara,$strTipoUsuarioAuxiliartipo_tecla_mascara,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadtipo_tecla_mascara!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('tipo_tecla_mascara','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_tecla_mascara_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliartipo_tecla_mascara,$this->strTipoUsuarioAuxiliartipo_tecla_mascara,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_tecla_mascara_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliartipo_tecla_mascara,$this->strTipoUsuarioAuxiliartipo_tecla_mascara,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->tipo_tecla_mascaraReturnGeneral=new tipo_tecla_mascara_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->tipo_tecla_mascaraReturnGeneral->conGuardarReturnSessionJs=true;
		$this->tipo_tecla_mascaraReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->tipo_tecla_mascaraReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->tipo_tecla_mascaraReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->tipo_tecla_mascaraReturnGeneral);
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
		$this->tipo_tecla_mascaraReturnGeneral=new tipo_tecla_mascara_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->tipo_tecla_mascaraReturnGeneral->conGuardarReturnSessionJs=true;
		$this->tipo_tecla_mascaraReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->tipo_tecla_mascaraReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->tipo_tecla_mascaraReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->tipo_tecla_mascaraReturnGeneral);
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
		$this->tipo_tecla_mascaraReturnGeneral=new tipo_tecla_mascara_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->tipo_tecla_mascaraReturnGeneral->conGuardarReturnSessionJs=true;
		$this->tipo_tecla_mascaraReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->tipo_tecla_mascaraReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->tipo_tecla_mascaraReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->tipo_tecla_mascaraReturnGeneral);
	}
	
	public function eliminarCascadaAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
					
		$this->eliminarCascada();
	}
	
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->tipo_tecla_mascaraReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->tipo_tecla_mascaraReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->tipo_tecla_mascaraReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->tipo_tecla_mascaraReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->tipo_tecla_mascaraReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->tipo_tecla_mascaraReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->tipo_tecla_mascaraReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->tipo_tecla_mascaraReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->tipo_tecla_mascaraReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->tipo_tecla_mascaraReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->tipo_tecla_mascaraReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->tipo_tecla_mascaraReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
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
		
		$this->tipo_tecla_mascaraLogic=new tipo_tecla_mascara_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->tipo_tecla_mascara=new tipo_tecla_mascara();
		
		$this->strTypeOnLoadtipo_tecla_mascara='onload';
		$this->strTipoPaginaAuxiliartipo_tecla_mascara='none';
		$this->strTipoUsuarioAuxiliartipo_tecla_mascara='none';	

		$this->intNumeroPaginacion=tipo_tecla_mascara_util::$INT_NUMERO_PAGINACION;
		
		$this->tipo_tecla_mascaraModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->tipo_tecla_mascaraControllerAdditional=new tipo_tecla_mascara_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(tipo_tecla_mascara_session $tipo_tecla_mascara_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($tipo_tecla_mascara_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadtipo_tecla_mascara='',?string $strTipoPaginaAuxiliartipo_tecla_mascara='',?string $strTipoUsuarioAuxiliartipo_tecla_mascara='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadtipo_tecla_mascara=$strTypeOnLoadtipo_tecla_mascara;
			$this->strTipoPaginaAuxiliartipo_tecla_mascara=$strTipoPaginaAuxiliartipo_tecla_mascara;
			$this->strTipoUsuarioAuxiliartipo_tecla_mascara=$strTipoUsuarioAuxiliartipo_tecla_mascara;
	
			if($strTipoUsuarioAuxiliartipo_tecla_mascara=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->tipo_tecla_mascara=new tipo_tecla_mascara();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Tipo Tecla Mascaras';
			
			
			$tipo_tecla_mascara_session=unserialize($this->Session->read(tipo_tecla_mascara_util::$STR_SESSION_NAME));
							
			if($tipo_tecla_mascara_session==null) {
				$tipo_tecla_mascara_session=new tipo_tecla_mascara_session();
				
				/*$this->Session->write('tipo_tecla_mascara_session',$tipo_tecla_mascara_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($tipo_tecla_mascara_session->strFuncionJsPadre!=null && $tipo_tecla_mascara_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$tipo_tecla_mascara_session->strFuncionJsPadre;
				
				$tipo_tecla_mascara_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($tipo_tecla_mascara_session);
			
			if($strTypeOnLoadtipo_tecla_mascara!=null && $strTypeOnLoadtipo_tecla_mascara=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$tipo_tecla_mascara_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$tipo_tecla_mascara_session->setPaginaPopupVariables(true);
				}
				
				if($tipo_tecla_mascara_session->intNumeroPaginacion==tipo_tecla_mascara_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=tipo_tecla_mascara_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$tipo_tecla_mascara_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,tipo_tecla_mascara_util::$STR_SESSION_NAME,'seguridad');																
			
			} else if($strTypeOnLoadtipo_tecla_mascara!=null && $strTypeOnLoadtipo_tecla_mascara=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$tipo_tecla_mascara_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=tipo_tecla_mascara_util::$INT_NUMERO_PAGINACION;*/
				
				if($tipo_tecla_mascara_session->intNumeroPaginacion==tipo_tecla_mascara_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=tipo_tecla_mascara_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$tipo_tecla_mascara_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliartipo_tecla_mascara!=null && $strTipoPaginaAuxiliartipo_tecla_mascara=='none') {
				/*$tipo_tecla_mascara_session->strStyleDivHeader='display:table-row';*/
				
				/*$tipo_tecla_mascara_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliartipo_tecla_mascara!=null && $strTipoPaginaAuxiliartipo_tecla_mascara=='iframe') {
					/*
					$tipo_tecla_mascara_session->strStyleDivArbol='display:none';
					$tipo_tecla_mascara_session->strStyleDivHeader='display:none';
					$tipo_tecla_mascara_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$tipo_tecla_mascara_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->tipo_tecla_mascaraClase=new tipo_tecla_mascara();
			
			
			
		
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=tipo_tecla_mascara_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(tipo_tecla_mascara_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->tipo_tecla_mascaraLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->tipo_tecla_mascaraLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$moduloLogic=new modulo_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->tipo_tecla_mascaraLogic=new tipo_tecla_mascara_logic();*/
			
			
			$this->tipo_tecla_mascarasModel=null;
			/*new ListDataModel();*/
			
			/*$this->tipo_tecla_mascarasModel.setWrappedData(tipo_tecla_mascaraLogic->gettipo_tecla_mascaras());*/
						
			$this->tipo_tecla_mascaras= array();
			$this->tipo_tecla_mascarasEliminados=array();
			$this->tipo_tecla_mascarasSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= tipo_tecla_mascara_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= tipo_tecla_mascara_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->tipo_tecla_mascara= new tipo_tecla_mascara();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliartipo_tecla_mascara!=null && $strTipoUsuarioAuxiliartipo_tecla_mascara!='none' && $strTipoUsuarioAuxiliartipo_tecla_mascara!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliartipo_tecla_mascara);
																
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
				if($strTipoUsuarioAuxiliartipo_tecla_mascara!=null && $strTipoUsuarioAuxiliartipo_tecla_mascara!='none' && $strTipoUsuarioAuxiliartipo_tecla_mascara!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliartipo_tecla_mascara);
																
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
				if($strTipoUsuarioAuxiliartipo_tecla_mascara==null || $strTipoUsuarioAuxiliartipo_tecla_mascara=='none' || $strTipoUsuarioAuxiliartipo_tecla_mascara=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliartipo_tecla_mascara,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, tipo_tecla_mascara_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, tipo_tecla_mascara_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina tipo_tecla_mascara');
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
			
			
			
			
			
			//$existe_history=false;
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($tipo_tecla_mascara_session);
			
			$this->getSetBusquedasSesionConfig($tipo_tecla_mascara_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportetipo_tecla_mascaras($this->strAccionBusqueda,$this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaras());*/
				} else if($this->strGenerarReporte=='Html')	{
					$tipo_tecla_mascara_session->strServletGenerarHtmlReporte='tipo_tecla_mascaraServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(tipo_tecla_mascara_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(tipo_tecla_mascara_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($tipo_tecla_mascara_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$tipo_tecla_mascara_session=unserialize($this->Session->read(tipo_tecla_mascara_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliartipo_tecla_mascara!=null && $strTipoUsuarioAuxiliartipo_tecla_mascara=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($tipo_tecla_mascara_session);
			}
								
			$this->set(tipo_tecla_mascara_util::$STR_SESSION_NAME, $tipo_tecla_mascara_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($tipo_tecla_mascara_session);
			
			/*
			$this->tipo_tecla_mascara->recursive = 0;
			
			$this->tipo_tecla_mascaras=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('tipo_tecla_mascaras', $this->tipo_tecla_mascaras);
			
			$this->set(tipo_tecla_mascara_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->tipo_tecla_mascaraActual =$this->tipo_tecla_mascaraClase;
			
			/*$this->tipo_tecla_mascaraActual =$this->migrarModeltipo_tecla_mascara($this->tipo_tecla_mascaraClase);*/
			
			$this->returnHtml(false);
			
			$this->set(tipo_tecla_mascara_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=tipo_tecla_mascara_util::$STR_NOMBRE_OPCION;
				
			if(tipo_tecla_mascara_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=tipo_tecla_mascara_util::$STR_MODULO_OPCION.tipo_tecla_mascara_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(tipo_tecla_mascara_util::$STR_SESSION_NAME,serialize($tipo_tecla_mascara_session));
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
			/*$tipo_tecla_mascaraClase= (tipo_tecla_mascara) tipo_tecla_mascarasModel.getRowData();*/
			
			$this->tipo_tecla_mascaraClase->setId($this->tipo_tecla_mascara->getId());	
			$this->tipo_tecla_mascaraClase->setVersionRow($this->tipo_tecla_mascara->getVersionRow());	
			$this->tipo_tecla_mascaraClase->setVersionRow($this->tipo_tecla_mascara->getVersionRow());	
			$this->tipo_tecla_mascaraClase->setcodigo($this->tipo_tecla_mascara->getcodigo());	
			$this->tipo_tecla_mascaraClase->setnombre($this->tipo_tecla_mascara->getnombre());	
		
			/*$this->Session->write('tipo_tecla_mascaraVersionRowActual', tipo_tecla_mascara.getVersionRow());*/
			
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
			
			$tipo_tecla_mascara_session=unserialize($this->Session->read(tipo_tecla_mascara_util::$STR_SESSION_NAME));
						
			if($tipo_tecla_mascara_session==null) {
				$tipo_tecla_mascara_session=new tipo_tecla_mascara_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('tipo_tecla_mascara', $this->tipo_tecla_mascara->read(null, $id));
	
			
			$this->tipo_tecla_mascara->recursive = 0;
			
			$this->tipo_tecla_mascaras=$this->paginate();
			
			$this->set('tipo_tecla_mascaras', $this->tipo_tecla_mascaras);
	
			if (empty($this->data)) {
				$this->data = $this->tipo_tecla_mascara->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->tipo_tecla_mascaraLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->tipo_tecla_mascaraClase);
			
			$this->tipo_tecla_mascaraActual=$this->tipo_tecla_mascaraClase;
			
			/*$this->tipo_tecla_mascaraActual =$this->migrarModeltipo_tecla_mascara($this->tipo_tecla_mascaraClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaras(),$this->tipo_tecla_mascaraActual);
			
			$this->actualizarControllerConReturnGeneral($this->tipo_tecla_mascaraReturnGeneral);
			
			//$this->tipo_tecla_mascaraReturnGeneral=$this->tipo_tecla_mascaraLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaras(),$this->tipo_tecla_mascaraActual,$this->tipo_tecla_mascaraParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$tipo_tecla_mascara_session=unserialize($this->Session->read(tipo_tecla_mascara_util::$STR_SESSION_NAME));
						
			if($tipo_tecla_mascara_session==null) {
				$tipo_tecla_mascara_session=new tipo_tecla_mascara_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevotipo_tecla_mascara', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->tipo_tecla_mascaraClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->tipo_tecla_mascaraClase);
			
			$this->tipo_tecla_mascaraActual =$this->tipo_tecla_mascaraClase;
			
			/*$this->tipo_tecla_mascaraActual =$this->migrarModeltipo_tecla_mascara($this->tipo_tecla_mascaraClase);*/
			
			$this->settipo_tecla_mascaraFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaras(),$this->tipo_tecla_mascara);
			
			$this->actualizarControllerConReturnGeneral($this->tipo_tecla_mascaraReturnGeneral);
			
			//this->tipo_tecla_mascaraReturnGeneral=$this->tipo_tecla_mascaraLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaras(),$this->tipo_tecla_mascara,$this->tipo_tecla_mascaraParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
						
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->tipo_tecla_mascaraReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->tipo_tecla_mascaraReturnGeneral->gettipo_tecla_mascara(),$this->tipo_tecla_mascaraActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeytipo_tecla_mascara($this->tipo_tecla_mascaraReturnGeneral->gettipo_tecla_mascara());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariotipo_tecla_mascara($this->tipo_tecla_mascaraReturnGeneral->gettipo_tecla_mascara());*/
			}
			
			if($this->tipo_tecla_mascaraReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->tipo_tecla_mascaraReturnGeneral->gettipo_tecla_mascara(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualtipo_tecla_mascara($this->tipo_tecla_mascara,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->tipo_tecla_mascarasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->tipo_tecla_mascarasAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->tipo_tecla_mascarasAuxiliar=array();
			}
			
			if(count($this->tipo_tecla_mascarasAuxiliar)==2) {
				$tipo_tecla_mascaraOrigen=$this->tipo_tecla_mascarasAuxiliar[0];
				$tipo_tecla_mascaraDestino=$this->tipo_tecla_mascarasAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($tipo_tecla_mascaraOrigen,$tipo_tecla_mascaraDestino,true,false,false);
				
				$this->actualizarLista($tipo_tecla_mascaraDestino,$this->tipo_tecla_mascaras);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->tipo_tecla_mascarasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->tipo_tecla_mascarasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->tipo_tecla_mascarasAuxiliar=array();
			}
			
			if(count($this->tipo_tecla_mascarasAuxiliar) > 0) {
				foreach ($this->tipo_tecla_mascarasAuxiliar as $tipo_tecla_mascaraSeleccionado) {
					$this->tipo_tecla_mascara=new tipo_tecla_mascara();
					
					$this->setCopiarVariablesObjetos($tipo_tecla_mascaraSeleccionado,$this->tipo_tecla_mascara,true,true,false);
						
					$this->tipo_tecla_mascaras[]=$this->tipo_tecla_mascara;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->tipo_tecla_mascarasEliminados as $tipo_tecla_mascaraEliminado) {
				$this->tipo_tecla_mascaraLogic->tipo_tecla_mascaras[]=$tipo_tecla_mascaraEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->tipo_tecla_mascara=new tipo_tecla_mascara();
							
				$this->tipo_tecla_mascaras[]=$this->tipo_tecla_mascara;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
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
		
		$tipo_tecla_mascaraActual=new tipo_tecla_mascara();
		
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
				
				$tipo_tecla_mascaraActual=$this->tipo_tecla_mascaras[$indice];		
				
				$tipo_tecla_mascaraActual->setId($this->data['t'.$this->strSufijo]['cel_'.$i.'_0']);
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $tipo_tecla_mascaraActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $tipo_tecla_mascaraActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->tipo_tecla_mascarasAuxiliar=array();		 
		/*$this->tipo_tecla_mascarasEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->tipo_tecla_mascarasAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->tipo_tecla_mascarasAuxiliar=array();
		}
			
		if(count($this->tipo_tecla_mascarasAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->tipo_tecla_mascarasAuxiliar as $tipo_tecla_mascaraAuxLocal) {				
				
				foreach($this->tipo_tecla_mascaras as $tipo_tecla_mascaraLocal) {
					if($tipo_tecla_mascaraLocal->getId()==$tipo_tecla_mascaraAuxLocal->getId()) {
						$tipo_tecla_mascaraLocal->setIsDeleted(true);
						
						/*$this->tipo_tecla_mascarasEliminados[]=$tipo_tecla_mascaraLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->tipo_tecla_mascaraLogic->settipo_tecla_mascaras($this->tipo_tecla_mascaras);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
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
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=tipo_tecla_mascara_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadtipo_tecla_mascara='',string $strTipoPaginaAuxiliartipo_tecla_mascara='',string $strTipoUsuarioAuxiliartipo_tecla_mascara='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadtipo_tecla_mascara,$strTipoPaginaAuxiliartipo_tecla_mascara,$strTipoUsuarioAuxiliartipo_tecla_mascara,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->tipo_tecla_mascaras) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=tipo_tecla_mascara_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=tipo_tecla_mascara_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=tipo_tecla_mascara_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$tipo_tecla_mascara_session=unserialize($this->Session->read(tipo_tecla_mascara_util::$STR_SESSION_NAME));
						
			if($tipo_tecla_mascara_session==null) {
				$tipo_tecla_mascara_session=new tipo_tecla_mascara_session();
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
					/*$this->intNumeroPaginacion=tipo_tecla_mascara_util::$INT_NUMERO_PAGINACION;*/
					
					if($tipo_tecla_mascara_session->intNumeroPaginacion==tipo_tecla_mascara_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=tipo_tecla_mascara_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$tipo_tecla_mascara_session->intNumeroPaginacion;
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
			
			$this->tipo_tecla_mascarasEliminados=array();
			
			/*$this->tipo_tecla_mascaraLogic->setConnexion($connexion);*/
			
			$this->tipo_tecla_mascaraLogic->setIsConDeep(true);
			
			$this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaraDataAccess()->isForFKDataRels=true;
			
			
			
			$this->tipo_tecla_mascaraLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->tipo_tecla_mascaraLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaras()==null|| count($this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaras())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->tipo_tecla_mascaras=$this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaras();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->tipo_tecla_mascaraLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->tipo_tecla_mascarasReporte=$this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaras();
									
						/*$this->generarReportes('Todos',$this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaras());*/
					
						$this->tipo_tecla_mascaraLogic->settipo_tecla_mascaras($this->tipo_tecla_mascaras);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->tipo_tecla_mascaraLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaras()==null|| count($this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaras())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->tipo_tecla_mascaras=$this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaras();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->tipo_tecla_mascaraLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->tipo_tecla_mascarasReporte=$this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaras();
									
						/*$this->generarReportes('Todos',$this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaras());*/
					
						$this->tipo_tecla_mascaraLogic->settipo_tecla_mascaras($this->tipo_tecla_mascaras);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idtipo_tecla_mascara=0;*/
				
				if($tipo_tecla_mascara_session->bitBusquedaDesdeFKSesionFK!=null && $tipo_tecla_mascara_session->bitBusquedaDesdeFKSesionFK==true) {
					if($tipo_tecla_mascara_session->bigIdActualFK!=null && $tipo_tecla_mascara_session->bigIdActualFK!=0)	{
						$this->idtipo_tecla_mascara=$tipo_tecla_mascara_session->bigIdActualFK;	
					}
					
					$tipo_tecla_mascara_session->bitBusquedaDesdeFKSesionFK=false;
					
					$tipo_tecla_mascara_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idtipo_tecla_mascara=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idtipo_tecla_mascara=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->tipo_tecla_mascaraLogic->getEntity($this->idtipo_tecla_mascara);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*tipo_tecla_mascaraLogicAdditional::getDetalleIndicePorId($idtipo_tecla_mascara);*/

				
				if($this->tipo_tecla_mascaraLogic->gettipo_tecla_mascara()!=null) {
					$this->tipo_tecla_mascaraLogic->settipo_tecla_mascaras(array());
					$this->tipo_tecla_mascaraLogic->tipo_tecla_mascaras[]=$this->tipo_tecla_mascaraLogic->gettipo_tecla_mascara();
				}
			
			}
		 
		
		$tipo_tecla_mascara_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$tipo_tecla_mascara_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->tipo_tecla_mascaraLogic->loadForeignsKeysDescription();*/
		
		$this->tipo_tecla_mascaras=$this->tipo_tecla_mascaraLogic->gettipo_tecla_mascaras();
		
		if($this->tipo_tecla_mascarasEliminados==null) {
			$this->tipo_tecla_mascarasEliminados=array();
		}
		
		$this->Session->write(tipo_tecla_mascara_util::$STR_SESSION_NAME.'Lista',serialize($this->tipo_tecla_mascaras));
		$this->Session->write(tipo_tecla_mascara_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->tipo_tecla_mascarasEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(tipo_tecla_mascara_util::$STR_SESSION_NAME,serialize($tipo_tecla_mascara_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idtipo_tecla_mascara=$idGeneral;
			
			$this->intNumeroPaginacion=tipo_tecla_mascara_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
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
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
			}

			if(count($this->tipo_tecla_mascaras) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	
	
	
		
	
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(tipo_tecla_mascara_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$tipo_tecla_mascara_session=unserialize($this->Session->read(tipo_tecla_mascara_util::$STR_SESSION_NAME));
		
		if($tipo_tecla_mascara_session->bitPermiteNavegacionHaciaFKDesde) {
			
			
			$tipo_tecla_mascara_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
			}						
			
			$this->tipo_tecla_mascarasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->tipo_tecla_mascarasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->tipo_tecla_mascarasAuxiliar=array();
			}
			
			if(count($this->tipo_tecla_mascarasAuxiliar) > 0) {
				
				foreach ($this->tipo_tecla_mascarasAuxiliar as $tipo_tecla_mascaraSeleccionado) {
					$this->eliminarTablaBase($tipo_tecla_mascaraSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
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
	
	
	
	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=tipo_tecla_mascara_util::$INT_NUMERO_PAGINACION;
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
				$this->tipo_tecla_mascaraLogic->commitNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_tecla_mascaraLogic->rollbackNewConnexionToDeep();
				$this->tipo_tecla_mascaraLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$tipo_tecla_mascarasNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->tipo_tecla_mascaras as $tipo_tecla_mascaraLocal) {
				if($tipo_tecla_mascaraLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->tipo_tecla_mascara=new tipo_tecla_mascara();
				
				$this->tipo_tecla_mascara->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->tipo_tecla_mascaras[]=$this->tipo_tecla_mascara;*/
				
				$tipo_tecla_mascarasNuevos[]=$this->tipo_tecla_mascara;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($tipo_tecla_mascarasNuevos!=null);
	}
					
	
	
	
	
	
	
	
	
	public function setVariablesGlobalesCombosFK(tipo_tecla_mascara $tipo_tecla_mascaraClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	
	
	
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(tipo_tecla_mascara_util::$STR_SESSION_NAME,tipo_tecla_mascara_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$tipo_tecla_mascara_session=$this->Session->read(tipo_tecla_mascara_util::$STR_SESSION_NAME);
				
		if($tipo_tecla_mascara_session==null) {
			$tipo_tecla_mascara_session=new tipo_tecla_mascara_session();		
			//$this->Session->write('tipo_tecla_mascara_session',$tipo_tecla_mascara_session);							
		}
		*/
		
		$tipo_tecla_mascara_session=new tipo_tecla_mascara_session();
    	$tipo_tecla_mascara_session->strPathNavegacionActual=tipo_tecla_mascara_util::$STR_CLASS_WEB_TITULO;
    	$tipo_tecla_mascara_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(tipo_tecla_mascara_util::$STR_SESSION_NAME,serialize($tipo_tecla_mascara_session));		
	}	
	
	public function getSetBusquedasSesionConfig(tipo_tecla_mascara_session $tipo_tecla_mascara_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($tipo_tecla_mascara_session->bitBusquedaDesdeFKSesionFK!=null && $tipo_tecla_mascara_session->bitBusquedaDesdeFKSesionFK==true) {
			if($tipo_tecla_mascara_session->bigIdActualFK!=null && $tipo_tecla_mascara_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$tipo_tecla_mascara_session->bigIdActualFKParaPosibleAtras=$tipo_tecla_mascara_session->bigIdActualFK;*/
			}
				
			$tipo_tecla_mascara_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$tipo_tecla_mascara_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(tipo_tecla_mascara_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$tipo_tecla_mascara_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$tipo_tecla_mascara_session=unserialize($this->Session->read(tipo_tecla_mascara_util::$STR_SESSION_NAME));
		
		if($tipo_tecla_mascara_session==null) {
			$tipo_tecla_mascara_session=new tipo_tecla_mascara_session();
		}
		
		$tipo_tecla_mascara_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$tipo_tecla_mascara_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$tipo_tecla_mascara_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		
		$this->Session->write(tipo_tecla_mascara_util::$STR_SESSION_NAME,serialize($tipo_tecla_mascara_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(tipo_tecla_mascara_session $tipo_tecla_mascara_session) {
		
		if($tipo_tecla_mascara_session==null) {
			$tipo_tecla_mascara_session=unserialize($this->Session->read(tipo_tecla_mascara_util::$STR_SESSION_NAME));
		}
		
		if($tipo_tecla_mascara_session==null) {
		   $tipo_tecla_mascara_session=new tipo_tecla_mascara_session();
		}
		
		if($tipo_tecla_mascara_session->strUltimaBusqueda!=null && $tipo_tecla_mascara_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$tipo_tecla_mascara_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$tipo_tecla_mascara_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$tipo_tecla_mascara_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

		}
		
		$tipo_tecla_mascara_session->strUltimaBusqueda='';
		//$tipo_tecla_mascara_session->intNumeroPaginacion=10;
		$tipo_tecla_mascara_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(tipo_tecla_mascara_util::$STR_SESSION_NAME,serialize($tipo_tecla_mascara_session));		
	}
	
	public function tipo_tecla_mascarasControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
	}
	
	public function settipo_tecla_mascaraFKsDefault() {
	
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		
		
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
		interface tipo_tecla_mascara_controlI {	
		
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
		
		
		
		public function manejarEventosAction();
		public function recargarFormularioGeneralAction();
		
		
		
		public function generarReporteConPhpExcelAction();	
		public function generarReporteConPhpExcelVerticalAction();	
		public function generarReporteConPhpExcelRelacionesAction();
		
		public function onLoad(tipo_tecla_mascara_session $tipo_tecla_mascara_session=null);	
		function index(?string $strTypeOnLoadtipo_tecla_mascara='',?string $strTipoPaginaAuxiliartipo_tecla_mascara='',?string $strTipoUsuarioAuxiliartipo_tecla_mascara='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadtipo_tecla_mascara='',string $strTipoPaginaAuxiliartipo_tecla_mascara='',string $strTipoUsuarioAuxiliartipo_tecla_mascara='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(tipo_tecla_mascara $tipo_tecla_mascaraClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(tipo_tecla_mascara_session $tipo_tecla_mascara_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(tipo_tecla_mascara_session $tipo_tecla_mascara_session);	
		public function tipo_tecla_mascarasControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function settipo_tecla_mascaraFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
