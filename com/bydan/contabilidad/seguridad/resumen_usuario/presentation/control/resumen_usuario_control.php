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

namespace com\bydan\contabilidad\seguridad\resumen_usuario\presentation\control;

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


use com\bydan\contabilidad\seguridad\resumen_usuario\business\entity\resumen_usuario;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/resumen_usuario/util/resumen_usuario_carga.php');
use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_carga;

use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_util;
use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_param_return;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic_add;
use com\bydan\contabilidad\seguridad\resumen_usuario\presentation\session\resumen_usuario_session;


//FK


use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
resumen_usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
resumen_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
resumen_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
resumen_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*resumen_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/seguridad/resumen_usuario/presentation/control/resumen_usuario_init_control.php');
use com\bydan\contabilidad\seguridad\resumen_usuario\presentation\control\resumen_usuario_init_control;

include_once('com/bydan/contabilidad/seguridad/resumen_usuario/presentation/control/resumen_usuario_base_control.php');
use com\bydan\contabilidad\seguridad\resumen_usuario\presentation\control\resumen_usuario_base_control;

class resumen_usuario_control extends resumen_usuario_base_control {	
	
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
			
			
			else if($action=="FK_Idusuario"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdusuarioParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idresumen_usuarioActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$idresumen_usuarioActual
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
					
					$resumen_usuarioController = new resumen_usuario_control();
					
					$resumen_usuarioController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($resumen_usuarioController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$resumen_usuarioController = new resumen_usuario_control();
						$resumen_usuarioController = $this;
						
						$jsonResponse = json_encode($resumen_usuarioController->resumen_usuarios);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->resumen_usuarioReturnGeneral==null) {
					$this->resumen_usuarioReturnGeneral=new resumen_usuario_param_return();
				}
				
				echo($this->resumen_usuarioReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$resumen_usuarioController=new resumen_usuario_control();
		
		$resumen_usuarioController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$resumen_usuarioController->usuarioActual=new usuario();
		
		$resumen_usuarioController->usuarioActual->setId($this->usuarioActual->getId());
		$resumen_usuarioController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$resumen_usuarioController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$resumen_usuarioController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$resumen_usuarioController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$resumen_usuarioController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$resumen_usuarioController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$resumen_usuarioController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $resumen_usuarioController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadresumen_usuario= $this->getDataGeneralString('strTypeOnLoadresumen_usuario');
		$strTipoPaginaAuxiliarresumen_usuario= $this->getDataGeneralString('strTipoPaginaAuxiliarresumen_usuario');
		$strTipoUsuarioAuxiliarresumen_usuario= $this->getDataGeneralString('strTipoUsuarioAuxiliarresumen_usuario');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadresumen_usuario,$strTipoPaginaAuxiliarresumen_usuario,$strTipoUsuarioAuxiliarresumen_usuario,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadresumen_usuario!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('resumen_usuario','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(resumen_usuario_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarresumen_usuario,$this->strTipoUsuarioAuxiliarresumen_usuario,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(resumen_usuario_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarresumen_usuario,$this->strTipoUsuarioAuxiliarresumen_usuario,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->resumen_usuarioReturnGeneral=new resumen_usuario_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->resumen_usuarioReturnGeneral->conGuardarReturnSessionJs=true;
		$this->resumen_usuarioReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->resumen_usuarioReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->resumen_usuarioReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->resumen_usuarioReturnGeneral);
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
		$this->resumen_usuarioReturnGeneral=new resumen_usuario_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->resumen_usuarioReturnGeneral->conGuardarReturnSessionJs=true;
		$this->resumen_usuarioReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->resumen_usuarioReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->resumen_usuarioReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->resumen_usuarioReturnGeneral);
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
		$this->resumen_usuarioReturnGeneral=new resumen_usuario_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->resumen_usuarioReturnGeneral->conGuardarReturnSessionJs=true;
		$this->resumen_usuarioReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->resumen_usuarioReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->resumen_usuarioReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->resumen_usuarioReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
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
			
			
			$this->resumen_usuarioReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->resumen_usuarioReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->resumen_usuarioReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->resumen_usuarioReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->resumen_usuarioReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->resumen_usuarioReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->resumen_usuarioReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->resumen_usuarioReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->resumen_usuarioReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->resumen_usuarioReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->resumen_usuarioReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->resumen_usuarioReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->resumen_usuarioReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->resumen_usuarioReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->resumen_usuarioReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->resumen_usuarioReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->resumen_usuarioReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->resumen_usuarioReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
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
		
		$this->resumen_usuarioLogic=new resumen_usuario_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->resumen_usuario=new resumen_usuario();
		
		$this->strTypeOnLoadresumen_usuario='onload';
		$this->strTipoPaginaAuxiliarresumen_usuario='none';
		$this->strTipoUsuarioAuxiliarresumen_usuario='none';	

		$this->intNumeroPaginacion=resumen_usuario_util::$INT_NUMERO_PAGINACION;
		
		$this->resumen_usuarioModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->resumen_usuarioControllerAdditional=new resumen_usuario_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(resumen_usuario_session $resumen_usuario_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($resumen_usuario_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadresumen_usuario='',?string $strTipoPaginaAuxiliarresumen_usuario='',?string $strTipoUsuarioAuxiliarresumen_usuario='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadresumen_usuario=$strTypeOnLoadresumen_usuario;
			$this->strTipoPaginaAuxiliarresumen_usuario=$strTipoPaginaAuxiliarresumen_usuario;
			$this->strTipoUsuarioAuxiliarresumen_usuario=$strTipoUsuarioAuxiliarresumen_usuario;
	
			if($strTipoUsuarioAuxiliarresumen_usuario=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->resumen_usuario=new resumen_usuario();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Resumen Usuarios';
			
			
			$resumen_usuario_session=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME));
							
			if($resumen_usuario_session==null) {
				$resumen_usuario_session=new resumen_usuario_session();
				
				/*$this->Session->write('resumen_usuario_session',$resumen_usuario_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($resumen_usuario_session->strFuncionJsPadre!=null && $resumen_usuario_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$resumen_usuario_session->strFuncionJsPadre;
				
				$resumen_usuario_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($resumen_usuario_session);
			
			if($strTypeOnLoadresumen_usuario!=null && $strTypeOnLoadresumen_usuario=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$resumen_usuario_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$resumen_usuario_session->setPaginaPopupVariables(true);
				}
				
				if($resumen_usuario_session->intNumeroPaginacion==resumen_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=resumen_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$resumen_usuario_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,resumen_usuario_util::$STR_SESSION_NAME,'seguridad');																
			
			} else if($strTypeOnLoadresumen_usuario!=null && $strTypeOnLoadresumen_usuario=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$resumen_usuario_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=resumen_usuario_util::$INT_NUMERO_PAGINACION;*/
				
				if($resumen_usuario_session->intNumeroPaginacion==resumen_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=resumen_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$resumen_usuario_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarresumen_usuario!=null && $strTipoPaginaAuxiliarresumen_usuario=='none') {
				/*$resumen_usuario_session->strStyleDivHeader='display:table-row';*/
				
				/*$resumen_usuario_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarresumen_usuario!=null && $strTipoPaginaAuxiliarresumen_usuario=='iframe') {
					/*
					$resumen_usuario_session->strStyleDivArbol='display:none';
					$resumen_usuario_session->strStyleDivHeader='display:none';
					$resumen_usuario_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$resumen_usuario_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->resumen_usuarioClase=new resumen_usuario();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=resumen_usuario_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(resumen_usuario_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->resumen_usuarioLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->resumen_usuarioLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->resumen_usuarioLogic=new resumen_usuario_logic();*/
			
			
			$this->resumen_usuariosModel=null;
			/*new ListDataModel();*/
			
			/*$this->resumen_usuariosModel.setWrappedData(resumen_usuarioLogic->getresumen_usuarios());*/
						
			$this->resumen_usuarios= array();
			$this->resumen_usuariosEliminados=array();
			$this->resumen_usuariosSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= resumen_usuario_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->resumen_usuario= new resumen_usuario();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idusuario='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarresumen_usuario!=null && $strTipoUsuarioAuxiliarresumen_usuario!='none' && $strTipoUsuarioAuxiliarresumen_usuario!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarresumen_usuario);
																
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
				if($strTipoUsuarioAuxiliarresumen_usuario!=null && $strTipoUsuarioAuxiliarresumen_usuario!='none' && $strTipoUsuarioAuxiliarresumen_usuario!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarresumen_usuario);
																
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
				if($strTipoUsuarioAuxiliarresumen_usuario==null || $strTipoUsuarioAuxiliarresumen_usuario=='none' || $strTipoUsuarioAuxiliarresumen_usuario=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarresumen_usuario,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, resumen_usuario_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, resumen_usuario_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina resumen_usuario');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($resumen_usuario_session);
			
			$this->getSetBusquedasSesionConfig($resumen_usuario_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteresumen_usuarios($this->strAccionBusqueda,$this->resumen_usuarioLogic->getresumen_usuarios());*/
				} else if($this->strGenerarReporte=='Html')	{
					$resumen_usuario_session->strServletGenerarHtmlReporte='resumen_usuarioServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(resumen_usuario_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(resumen_usuario_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($resumen_usuario_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$resumen_usuario_session=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarresumen_usuario!=null && $strTipoUsuarioAuxiliarresumen_usuario=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($resumen_usuario_session);
			}
								
			$this->set(resumen_usuario_util::$STR_SESSION_NAME, $resumen_usuario_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($resumen_usuario_session);
			
			/*
			$this->resumen_usuario->recursive = 0;
			
			$this->resumen_usuarios=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('resumen_usuarios', $this->resumen_usuarios);
			
			$this->set(resumen_usuario_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->resumen_usuarioActual =$this->resumen_usuarioClase;
			
			/*$this->resumen_usuarioActual =$this->migrarModelresumen_usuario($this->resumen_usuarioClase);*/
			
			$this->returnHtml(false);
			
			$this->set(resumen_usuario_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=resumen_usuario_util::$STR_NOMBRE_OPCION;
				
			if(resumen_usuario_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=resumen_usuario_util::$STR_MODULO_OPCION.resumen_usuario_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(resumen_usuario_util::$STR_SESSION_NAME,serialize($resumen_usuario_session));
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
			/*$resumen_usuarioClase= (resumen_usuario) resumen_usuariosModel.getRowData();*/
			
			$this->resumen_usuarioClase->setId($this->resumen_usuario->getId());	
			$this->resumen_usuarioClase->setVersionRow($this->resumen_usuario->getVersionRow());	
			$this->resumen_usuarioClase->setVersionRow($this->resumen_usuario->getVersionRow());	
			$this->resumen_usuarioClase->setid_usuario($this->resumen_usuario->getid_usuario());	
			$this->resumen_usuarioClase->setnumero_ingresos($this->resumen_usuario->getnumero_ingresos());	
			$this->resumen_usuarioClase->setnumero_error_ingreso($this->resumen_usuario->getnumero_error_ingreso());	
			$this->resumen_usuarioClase->setnumero_intentos($this->resumen_usuario->getnumero_intentos());	
			$this->resumen_usuarioClase->setnumero_cierres($this->resumen_usuario->getnumero_cierres());	
			$this->resumen_usuarioClase->setnumero_reinicios($this->resumen_usuario->getnumero_reinicios());	
			$this->resumen_usuarioClase->setnumero_ingreso_actual($this->resumen_usuario->getnumero_ingreso_actual());	
			$this->resumen_usuarioClase->setfecha_ultimo_ingreso($this->resumen_usuario->getfecha_ultimo_ingreso());	
			$this->resumen_usuarioClase->setfecha_ultimo_error_ingreso($this->resumen_usuario->getfecha_ultimo_error_ingreso());	
			$this->resumen_usuarioClase->setfecha_ultimo_intento($this->resumen_usuario->getfecha_ultimo_intento());	
			$this->resumen_usuarioClase->setfecha_ultimo_cierre($this->resumen_usuario->getfecha_ultimo_cierre());	
		
			/*$this->Session->write('resumen_usuarioVersionRowActual', resumen_usuario.getVersionRow());*/
			
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
			
			$resumen_usuario_session=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME));
						
			if($resumen_usuario_session==null) {
				$resumen_usuario_session=new resumen_usuario_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('resumen_usuario', $this->resumen_usuario->read(null, $id));
	
			
			$this->resumen_usuario->recursive = 0;
			
			$this->resumen_usuarios=$this->paginate();
			
			$this->set('resumen_usuarios', $this->resumen_usuarios);
	
			if (empty($this->data)) {
				$this->data = $this->resumen_usuario->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->resumen_usuarioLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->resumen_usuarioClase);
			
			$this->resumen_usuarioActual=$this->resumen_usuarioClase;
			
			/*$this->resumen_usuarioActual =$this->migrarModelresumen_usuario($this->resumen_usuarioClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->resumen_usuarioLogic->getresumen_usuarios(),$this->resumen_usuarioActual);
			
			$this->actualizarControllerConReturnGeneral($this->resumen_usuarioReturnGeneral);
			
			//$this->resumen_usuarioReturnGeneral=$this->resumen_usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->resumen_usuarioLogic->getresumen_usuarios(),$this->resumen_usuarioActual,$this->resumen_usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$resumen_usuario_session=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME));
						
			if($resumen_usuario_session==null) {
				$resumen_usuario_session=new resumen_usuario_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoresumen_usuario', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->resumen_usuarioClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->resumen_usuarioClase);
			
			$this->resumen_usuarioActual =$this->resumen_usuarioClase;
			
			/*$this->resumen_usuarioActual =$this->migrarModelresumen_usuario($this->resumen_usuarioClase);*/
			
			$this->setresumen_usuarioFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->resumen_usuarioLogic->getresumen_usuarios(),$this->resumen_usuario);
			
			$this->actualizarControllerConReturnGeneral($this->resumen_usuarioReturnGeneral);
			
			//this->resumen_usuarioReturnGeneral=$this->resumen_usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->resumen_usuarioLogic->getresumen_usuarios(),$this->resumen_usuario,$this->resumen_usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->resumen_usuarioReturnGeneral->getresumen_usuario()->setid_usuario($this->idusuarioDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->resumen_usuarioReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->resumen_usuarioReturnGeneral->getresumen_usuario(),$this->resumen_usuarioActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyresumen_usuario($this->resumen_usuarioReturnGeneral->getresumen_usuario());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioresumen_usuario($this->resumen_usuarioReturnGeneral->getresumen_usuario());*/
			}
			
			if($this->resumen_usuarioReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->resumen_usuarioReturnGeneral->getresumen_usuario(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualresumen_usuario($this->resumen_usuario,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->resumen_usuariosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->resumen_usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->resumen_usuariosAuxiliar=array();
			}
			
			if(count($this->resumen_usuariosAuxiliar)==2) {
				$resumen_usuarioOrigen=$this->resumen_usuariosAuxiliar[0];
				$resumen_usuarioDestino=$this->resumen_usuariosAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($resumen_usuarioOrigen,$resumen_usuarioDestino,true,false,false);
				
				$this->actualizarLista($resumen_usuarioDestino,$this->resumen_usuarios);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->resumen_usuariosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->resumen_usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->resumen_usuariosAuxiliar=array();
			}
			
			if(count($this->resumen_usuariosAuxiliar) > 0) {
				foreach ($this->resumen_usuariosAuxiliar as $resumen_usuarioSeleccionado) {
					$this->resumen_usuario=new resumen_usuario();
					
					$this->setCopiarVariablesObjetos($resumen_usuarioSeleccionado,$this->resumen_usuario,true,true,false);
						
					$this->resumen_usuarios[]=$this->resumen_usuario;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->resumen_usuariosEliminados as $resumen_usuarioEliminado) {
				$this->resumen_usuarioLogic->resumen_usuarios[]=$resumen_usuarioEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->resumen_usuario=new resumen_usuario();
							
				$this->resumen_usuarios[]=$this->resumen_usuario;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
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
		
		$resumen_usuarioActual=new resumen_usuario();
		
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
				
				$resumen_usuarioActual=$this->resumen_usuarios[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $resumen_usuarioActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $resumen_usuarioActual->setnumero_ingresos((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $resumen_usuarioActual->setnumero_error_ingreso((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $resumen_usuarioActual->setnumero_intentos((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $resumen_usuarioActual->setnumero_cierres((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $resumen_usuarioActual->setnumero_reinicios((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $resumen_usuarioActual->setnumero_ingreso_actual((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $resumen_usuarioActual->setfecha_ultimo_ingreso(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $resumen_usuarioActual->setfecha_ultimo_error_ingreso(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $resumen_usuarioActual->setfecha_ultimo_intento(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $resumen_usuarioActual->setfecha_ultimo_cierre(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13')));  }
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
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=resumen_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadresumen_usuario='',string $strTipoPaginaAuxiliarresumen_usuario='',string $strTipoUsuarioAuxiliarresumen_usuario='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadresumen_usuario,$strTipoPaginaAuxiliarresumen_usuario,$strTipoUsuarioAuxiliarresumen_usuario,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->resumen_usuarios) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=resumen_usuario_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=resumen_usuario_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=resumen_usuario_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$resumen_usuario_session=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME));
						
			if($resumen_usuario_session==null) {
				$resumen_usuario_session=new resumen_usuario_session();
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
					/*$this->intNumeroPaginacion=resumen_usuario_util::$INT_NUMERO_PAGINACION;*/
					
					if($resumen_usuario_session->intNumeroPaginacion==resumen_usuario_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=resumen_usuario_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$resumen_usuario_session->intNumeroPaginacion;
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
			
			$this->resumen_usuariosEliminados=array();
			
			/*$this->resumen_usuarioLogic->setConnexion($connexion);*/
			
			$this->resumen_usuarioLogic->setIsConDeep(true);
			
			$this->resumen_usuarioLogic->getresumen_usuarioDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('usuario');$classes[]=$class;
			
			$this->resumen_usuarioLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->resumen_usuarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->resumen_usuarioLogic->getresumen_usuarios()==null|| count($this->resumen_usuarioLogic->getresumen_usuarios())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->resumen_usuarios=$this->resumen_usuarioLogic->getresumen_usuarios();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->resumen_usuarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->resumen_usuariosReporte=$this->resumen_usuarioLogic->getresumen_usuarios();
									
						/*$this->generarReportes('Todos',$this->resumen_usuarioLogic->getresumen_usuarios());*/
					
						$this->resumen_usuarioLogic->setresumen_usuarios($this->resumen_usuarios);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->resumen_usuarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->resumen_usuarioLogic->getresumen_usuarios()==null|| count($this->resumen_usuarioLogic->getresumen_usuarios())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->resumen_usuarios=$this->resumen_usuarioLogic->getresumen_usuarios();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->resumen_usuarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->resumen_usuariosReporte=$this->resumen_usuarioLogic->getresumen_usuarios();
									
						/*$this->generarReportes('Todos',$this->resumen_usuarioLogic->getresumen_usuarios());*/
					
						$this->resumen_usuarioLogic->setresumen_usuarios($this->resumen_usuarios);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idresumen_usuario=0;*/
				
				if($resumen_usuario_session->bitBusquedaDesdeFKSesionFK!=null && $resumen_usuario_session->bitBusquedaDesdeFKSesionFK==true) {
					if($resumen_usuario_session->bigIdActualFK!=null && $resumen_usuario_session->bigIdActualFK!=0)	{
						$this->idresumen_usuario=$resumen_usuario_session->bigIdActualFK;	
					}
					
					$resumen_usuario_session->bitBusquedaDesdeFKSesionFK=false;
					
					$resumen_usuario_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idresumen_usuario=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idresumen_usuario=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->resumen_usuarioLogic->getEntity($this->idresumen_usuario);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*resumen_usuarioLogicAdditional::getDetalleIndicePorId($idresumen_usuario);*/

				
				if($this->resumen_usuarioLogic->getresumen_usuario()!=null) {
					$this->resumen_usuarioLogic->setresumen_usuarios(array());
					$this->resumen_usuarioLogic->resumen_usuarios[]=$this->resumen_usuarioLogic->getresumen_usuario();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($resumen_usuario_session->bigidusuarioActual!=null && $resumen_usuario_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$resumen_usuario_session->bigidusuarioActual;
					$resumen_usuario_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->resumen_usuarioLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//resumen_usuarioLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->resumen_usuarioLogic->getresumen_usuarios()==null || count($this->resumen_usuarioLogic->getresumen_usuarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$resumen_usuarios=$this->resumen_usuarioLogic->getresumen_usuarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->resumen_usuarioLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->resumen_usuariosReporte=$this->resumen_usuarioLogic->getresumen_usuarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteresumen_usuarios("FK_Idusuario",$this->resumen_usuarioLogic->getresumen_usuarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->resumen_usuarioLogic->setresumen_usuarios($resumen_usuarios);
					}
				//}

			} 
		
		$resumen_usuario_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$resumen_usuario_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->resumen_usuarioLogic->loadForeignsKeysDescription();*/
		
		$this->resumen_usuarios=$this->resumen_usuarioLogic->getresumen_usuarios();
		
		if($this->resumen_usuariosEliminados==null) {
			$this->resumen_usuariosEliminados=array();
		}
		
		$this->Session->write(resumen_usuario_util::$STR_SESSION_NAME.'Lista',serialize($this->resumen_usuarios));
		$this->Session->write(resumen_usuario_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->resumen_usuariosEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(resumen_usuario_util::$STR_SESSION_NAME,serialize($resumen_usuario_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idresumen_usuario=$idGeneral;
			
			$this->intNumeroPaginacion=resumen_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
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
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
			}

			if(count($this->resumen_usuarios) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
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
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=resumen_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idusuario($strFinalQuery,$id_usuario)
	{
		try
		{

			$this->resumen_usuarioLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
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
			
			
			$resumen_usuarioForeignKey=new resumen_usuario_param_return(); //resumen_usuarioForeignKey();
			
			$resumen_usuario_session=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME));
						
			if($resumen_usuario_session==null) {
				$resumen_usuario_session=new resumen_usuario_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$resumen_usuarioForeignKey=$this->resumen_usuarioLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$resumen_usuario_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$resumen_usuarioForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$resumen_usuarioForeignKey->idusuarioDefaultFK;
			}

			if($resumen_usuario_session->bitBusquedaDesdeFKSesionusuario) {
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
	
	function cargarCombosFKFromReturnGeneral($resumen_usuarioReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$resumen_usuarioReturnGeneral->strRecargarFkTipos;
			
			


			if($resumen_usuarioReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$resumen_usuarioReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$resumen_usuarioReturnGeneral->idusuarioDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(resumen_usuario_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$resumen_usuario_session=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME));
		
		if($resumen_usuario_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($resumen_usuario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			
			$resumen_usuario_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
			}						
			
			$this->resumen_usuariosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->resumen_usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->resumen_usuariosAuxiliar=array();
			}
			
			if(count($this->resumen_usuariosAuxiliar) > 0) {
				
				foreach ($this->resumen_usuariosAuxiliar as $resumen_usuarioSeleccionado) {
					$this->eliminarTablaBase($resumen_usuarioSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
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
				$this->resumen_usuarioLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=resumen_usuario_util::$INT_NUMERO_PAGINACION;
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
				$this->resumen_usuarioLogic->commitNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->rollbackNewConnexionToDeep();
				$this->resumen_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$resumen_usuariosNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->resumen_usuarios as $resumen_usuarioLocal) {
				if($resumen_usuarioLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->resumen_usuario=new resumen_usuario();
				
				$this->resumen_usuario->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->resumen_usuarios[]=$this->resumen_usuario;*/
				
				$resumen_usuariosNuevos[]=$this->resumen_usuario;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('usuario');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->resumen_usuarioLogic->setresumen_usuarios($resumen_usuariosNuevos);
					
				$this->resumen_usuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($resumen_usuariosNuevos as $resumen_usuarioNuevo) {
					$this->resumen_usuarios[]=$resumen_usuarioNuevo;
				}
				
				/*$this->resumen_usuarios[]=$resumen_usuariosNuevos;*/
				
				$this->resumen_usuarioLogic->setresumen_usuarios($this->resumen_usuarios);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($resumen_usuariosNuevos!=null);
	}
					
	
	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery=''){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$this->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$resumen_usuario_session=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME));

		if($resumen_usuario_session==null) {
			$resumen_usuario_session=new resumen_usuario_session();
		}
		
		if($resumen_usuario_session->bitBusquedaDesdeFKSesionusuario!=true) {
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


			if($resumen_usuario_session->bigidusuarioActual!=null && $resumen_usuario_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($resumen_usuario_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=resumen_usuario_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	
	
	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=resumen_usuario_util::getusuarioDescripcion($usuarioLocal);
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

			$strDescripcionusuario=resumen_usuario_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(resumen_usuario $resumen_usuarioClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$resumen_usuarioClase->setid_usuario($this->usuarioActual->getId());
			
			
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

		$this->strVisibleFK_Idusuario=$strParaVisibleusuario;
	}
	
	

	public function abrirBusquedaParausuario() {//$idresumen_usuarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idresumen_usuarioActual=$idresumen_usuarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.resumen_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.resumen_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarresumen_usuario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(resumen_usuario_util::$STR_SESSION_NAME,resumen_usuario_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$resumen_usuario_session=$this->Session->read(resumen_usuario_util::$STR_SESSION_NAME);
				
		if($resumen_usuario_session==null) {
			$resumen_usuario_session=new resumen_usuario_session();		
			//$this->Session->write('resumen_usuario_session',$resumen_usuario_session);							
		}
		*/
		
		$resumen_usuario_session=new resumen_usuario_session();
    	$resumen_usuario_session->strPathNavegacionActual=resumen_usuario_util::$STR_CLASS_WEB_TITULO;
    	$resumen_usuario_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(resumen_usuario_util::$STR_SESSION_NAME,serialize($resumen_usuario_session));		
	}	
	
	public function getSetBusquedasSesionConfig(resumen_usuario_session $resumen_usuario_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($resumen_usuario_session->bitBusquedaDesdeFKSesionFK!=null && $resumen_usuario_session->bitBusquedaDesdeFKSesionFK==true) {
			if($resumen_usuario_session->bigIdActualFK!=null && $resumen_usuario_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$resumen_usuario_session->bigIdActualFKParaPosibleAtras=$resumen_usuario_session->bigIdActualFK;*/
			}
				
			$resumen_usuario_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$resumen_usuario_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(resumen_usuario_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($resumen_usuario_session->bitBusquedaDesdeFKSesionusuario!=null && $resumen_usuario_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($resumen_usuario_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(resumen_usuario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(resumen_usuario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(resumen_usuario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($resumen_usuario_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($resumen_usuario_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=resumen_usuario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$resumen_usuario_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$resumen_usuario_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=resumen_usuario_util::$INT_NUMERO_PAGINACION;

				if($resumen_usuario_session->intNumeroPaginacion==resumen_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=resumen_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$resumen_usuario_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$resumen_usuario_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$resumen_usuario_session=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME));
		
		if($resumen_usuario_session==null) {
			$resumen_usuario_session=new resumen_usuario_session();
		}
		
		$resumen_usuario_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$resumen_usuario_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$resumen_usuario_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$resumen_usuario_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		
		$this->Session->write(resumen_usuario_util::$STR_SESSION_NAME,serialize($resumen_usuario_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(resumen_usuario_session $resumen_usuario_session) {
		
		if($resumen_usuario_session==null) {
			$resumen_usuario_session=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME));
		}
		
		if($resumen_usuario_session==null) {
		   $resumen_usuario_session=new resumen_usuario_session();
		}
		
		if($resumen_usuario_session->strUltimaBusqueda!=null && $resumen_usuario_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$resumen_usuario_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$resumen_usuario_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$resumen_usuario_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$resumen_usuario_session->id_usuario;
				$resumen_usuario_session->id_usuario=-1;

			}
		}
		
		$resumen_usuario_session->strUltimaBusqueda='';
		//$resumen_usuario_session->intNumeroPaginacion=10;
		$resumen_usuario_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(resumen_usuario_util::$STR_SESSION_NAME,serialize($resumen_usuario_session));		
	}
	
	public function resumen_usuariosControllerAux($conexion_control) 	 {
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
	
	public function setresumen_usuarioFKsDefault() {
	
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
		interface resumen_usuario_controlI {	
		
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
		
		public function onLoad(resumen_usuario_session $resumen_usuario_session=null);	
		function index(?string $strTypeOnLoadresumen_usuario='',?string $strTipoPaginaAuxiliarresumen_usuario='',?string $strTipoUsuarioAuxiliarresumen_usuario='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadresumen_usuario='',string $strTipoPaginaAuxiliarresumen_usuario='',string $strTipoUsuarioAuxiliarresumen_usuario='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($resumen_usuarioReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(resumen_usuario $resumen_usuarioClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(resumen_usuario_session $resumen_usuario_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(resumen_usuario_session $resumen_usuario_session);	
		public function resumen_usuariosControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setresumen_usuarioFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
