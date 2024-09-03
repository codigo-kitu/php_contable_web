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

namespace com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\business\entity\imagen_documento_cuenta_cobrar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/imagen_documento_cuenta_cobrar/util/imagen_documento_cuenta_cobrar_carga.php');
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util\imagen_documento_cuenta_cobrar_carga;

use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util\imagen_documento_cuenta_cobrar_util;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\util\imagen_documento_cuenta_cobrar_param_return;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\business\logic\imagen_documento_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\presentation\session\imagen_documento_cuenta_cobrar_session;


//FK


use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\entity\documento_cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\business\logic\documento_cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cuenta_cobrar\util\documento_cuenta_cobrar_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
imagen_documento_cuenta_cobrar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
imagen_documento_cuenta_cobrar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
imagen_documento_cuenta_cobrar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
imagen_documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*imagen_documento_cuenta_cobrar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentascobrar/imagen_documento_cuenta_cobrar/presentation/control/imagen_documento_cuenta_cobrar_init_control.php');
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\presentation\control\imagen_documento_cuenta_cobrar_init_control;

include_once('com/bydan/contabilidad/cuentascobrar/imagen_documento_cuenta_cobrar/presentation/control/imagen_documento_cuenta_cobrar_base_control.php');
use com\bydan\contabilidad\cuentascobrar\imagen_documento_cuenta_cobrar\presentation\control\imagen_documento_cuenta_cobrar_base_control;

class imagen_documento_cuenta_cobrar_control extends imagen_documento_cuenta_cobrar_base_control {	
	
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
			
			
			else if($action=="FK_Iddocumento_cuenta_cobrar"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Iddocumento_cuenta_cobrarParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParadocumento_cuenta_cobrar') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idimagen_documento_cuenta_cobrarActual=$this->getDataId();
				$this->abrirBusquedaParadocumento_cuenta_cobrar();//$idimagen_documento_cuenta_cobrarActual
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
					
					$imagen_documento_cuenta_cobrarController = new imagen_documento_cuenta_cobrar_control();
					
					$imagen_documento_cuenta_cobrarController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($imagen_documento_cuenta_cobrarController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$imagen_documento_cuenta_cobrarController = new imagen_documento_cuenta_cobrar_control();
						$imagen_documento_cuenta_cobrarController = $this;
						
						$jsonResponse = json_encode($imagen_documento_cuenta_cobrarController->imagen_documento_cuenta_cobrars);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->imagen_documento_cuenta_cobrarReturnGeneral==null) {
					$this->imagen_documento_cuenta_cobrarReturnGeneral=new imagen_documento_cuenta_cobrar_param_return();
				}
				
				echo($this->imagen_documento_cuenta_cobrarReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$imagen_documento_cuenta_cobrarController=new imagen_documento_cuenta_cobrar_control();
		
		$imagen_documento_cuenta_cobrarController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$imagen_documento_cuenta_cobrarController->usuarioActual=new usuario();
		
		$imagen_documento_cuenta_cobrarController->usuarioActual->setId($this->usuarioActual->getId());
		$imagen_documento_cuenta_cobrarController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$imagen_documento_cuenta_cobrarController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$imagen_documento_cuenta_cobrarController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$imagen_documento_cuenta_cobrarController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$imagen_documento_cuenta_cobrarController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$imagen_documento_cuenta_cobrarController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$imagen_documento_cuenta_cobrarController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $imagen_documento_cuenta_cobrarController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadimagen_documento_cuenta_cobrar= $this->getDataGeneralString('strTypeOnLoadimagen_documento_cuenta_cobrar');
		$strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar= $this->getDataGeneralString('strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar');
		$strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar= $this->getDataGeneralString('strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadimagen_documento_cuenta_cobrar,$strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar,$strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadimagen_documento_cuenta_cobrar!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('imagen_documento_cuenta_cobrar','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(imagen_documento_cuenta_cobrar_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar,$this->strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(imagen_documento_cuenta_cobrar_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar,$this->strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->imagen_documento_cuenta_cobrarReturnGeneral=new imagen_documento_cuenta_cobrar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->imagen_documento_cuenta_cobrarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->imagen_documento_cuenta_cobrarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->imagen_documento_cuenta_cobrarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->imagen_documento_cuenta_cobrarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->imagen_documento_cuenta_cobrarReturnGeneral);
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
		$this->imagen_documento_cuenta_cobrarReturnGeneral=new imagen_documento_cuenta_cobrar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->imagen_documento_cuenta_cobrarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->imagen_documento_cuenta_cobrarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->imagen_documento_cuenta_cobrarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->imagen_documento_cuenta_cobrarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->imagen_documento_cuenta_cobrarReturnGeneral);
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
		$this->imagen_documento_cuenta_cobrarReturnGeneral=new imagen_documento_cuenta_cobrar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->imagen_documento_cuenta_cobrarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->imagen_documento_cuenta_cobrarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->imagen_documento_cuenta_cobrarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->imagen_documento_cuenta_cobrarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->imagen_documento_cuenta_cobrarReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
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
			
			
			$this->imagen_documento_cuenta_cobrarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->imagen_documento_cuenta_cobrarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->imagen_documento_cuenta_cobrarReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->imagen_documento_cuenta_cobrarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->imagen_documento_cuenta_cobrarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->imagen_documento_cuenta_cobrarReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->imagen_documento_cuenta_cobrarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->imagen_documento_cuenta_cobrarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->imagen_documento_cuenta_cobrarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->imagen_documento_cuenta_cobrarReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->imagen_documento_cuenta_cobrarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->imagen_documento_cuenta_cobrarReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->imagen_documento_cuenta_cobrarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->imagen_documento_cuenta_cobrarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->imagen_documento_cuenta_cobrarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->imagen_documento_cuenta_cobrarReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->imagen_documento_cuenta_cobrarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->imagen_documento_cuenta_cobrarReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
		
		$this->imagen_documento_cuenta_cobrarLogic=new imagen_documento_cuenta_cobrar_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->imagen_documento_cuenta_cobrar=new imagen_documento_cuenta_cobrar();
		
		$this->strTypeOnLoadimagen_documento_cuenta_cobrar='onload';
		$this->strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar='none';
		$this->strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar='none';	

		$this->intNumeroPaginacion=imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
		
		$this->imagen_documento_cuenta_cobrarModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->imagen_documento_cuenta_cobrarControllerAdditional=new imagen_documento_cuenta_cobrar_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(imagen_documento_cuenta_cobrar_session $imagen_documento_cuenta_cobrar_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($imagen_documento_cuenta_cobrar_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadimagen_documento_cuenta_cobrar='',?string $strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar='',?string $strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadimagen_documento_cuenta_cobrar=$strTypeOnLoadimagen_documento_cuenta_cobrar;
			$this->strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar=$strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar;
			$this->strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar=$strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar;
	
			if($strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->imagen_documento_cuenta_cobrar=new imagen_documento_cuenta_cobrar();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Imagenes Documentos Cuentas por Cobrares';
			
			
			$imagen_documento_cuenta_cobrar_session=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME));
							
			if($imagen_documento_cuenta_cobrar_session==null) {
				$imagen_documento_cuenta_cobrar_session=new imagen_documento_cuenta_cobrar_session();
				
				/*$this->Session->write('imagen_documento_cuenta_cobrar_session',$imagen_documento_cuenta_cobrar_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($imagen_documento_cuenta_cobrar_session->strFuncionJsPadre!=null && $imagen_documento_cuenta_cobrar_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$imagen_documento_cuenta_cobrar_session->strFuncionJsPadre;
				
				$imagen_documento_cuenta_cobrar_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($imagen_documento_cuenta_cobrar_session);
			
			if($strTypeOnLoadimagen_documento_cuenta_cobrar!=null && $strTypeOnLoadimagen_documento_cuenta_cobrar=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$imagen_documento_cuenta_cobrar_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$imagen_documento_cuenta_cobrar_session->setPaginaPopupVariables(true);
				}
				
				if($imagen_documento_cuenta_cobrar_session->intNumeroPaginacion==imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$imagen_documento_cuenta_cobrar_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME,'cuentascobrar');																
			
			} else if($strTypeOnLoadimagen_documento_cuenta_cobrar!=null && $strTypeOnLoadimagen_documento_cuenta_cobrar=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$imagen_documento_cuenta_cobrar_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;*/
				
				if($imagen_documento_cuenta_cobrar_session->intNumeroPaginacion==imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$imagen_documento_cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar!=null && $strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar=='none') {
				/*$imagen_documento_cuenta_cobrar_session->strStyleDivHeader='display:table-row';*/
				
				/*$imagen_documento_cuenta_cobrar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar!=null && $strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar=='iframe') {
					/*
					$imagen_documento_cuenta_cobrar_session->strStyleDivArbol='display:none';
					$imagen_documento_cuenta_cobrar_session->strStyleDivHeader='display:none';
					$imagen_documento_cuenta_cobrar_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$imagen_documento_cuenta_cobrar_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->imagen_documento_cuenta_cobrarClase=new imagen_documento_cuenta_cobrar();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=imagen_documento_cuenta_cobrar_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(imagen_documento_cuenta_cobrar_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->imagen_documento_cuenta_cobrarLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->imagen_documento_cuenta_cobrarLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->imagen_documento_cuenta_cobrarLogic=new imagen_documento_cuenta_cobrar_logic();*/
			
			
			$this->imagen_documento_cuenta_cobrarsModel=null;
			/*new ListDataModel();*/
			
			/*$this->imagen_documento_cuenta_cobrarsModel.setWrappedData(imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars());*/
						
			$this->imagen_documento_cuenta_cobrars= array();
			$this->imagen_documento_cuenta_cobrarsEliminados=array();
			$this->imagen_documento_cuenta_cobrarsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= imagen_documento_cuenta_cobrar_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->imagen_documento_cuenta_cobrar= new imagen_documento_cuenta_cobrar();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Iddocumento_cuenta_cobrar='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar!=null && $strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar!='none' && $strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar);
																
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
				if($strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar!=null && $strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar!='none' && $strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar);
																
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
				if($strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar==null || $strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar=='none' || $strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, imagen_documento_cuenta_cobrar_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, imagen_documento_cuenta_cobrar_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina imagen_documento_cuenta_cobrar');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($imagen_documento_cuenta_cobrar_session);
			
			$this->getSetBusquedasSesionConfig($imagen_documento_cuenta_cobrar_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteimagen_documento_cuenta_cobrars($this->strAccionBusqueda,$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars());*/
				} else if($this->strGenerarReporte=='Html')	{
					$imagen_documento_cuenta_cobrar_session->strServletGenerarHtmlReporte='imagen_documento_cuenta_cobrarServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(imagen_documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(imagen_documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($imagen_documento_cuenta_cobrar_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$imagen_documento_cuenta_cobrar_session=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar!=null && $strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($imagen_documento_cuenta_cobrar_session);
			}
								
			$this->set(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME, $imagen_documento_cuenta_cobrar_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($imagen_documento_cuenta_cobrar_session);
			
			/*
			$this->imagen_documento_cuenta_cobrar->recursive = 0;
			
			$this->imagen_documento_cuenta_cobrars=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('imagen_documento_cuenta_cobrars', $this->imagen_documento_cuenta_cobrars);
			
			$this->set(imagen_documento_cuenta_cobrar_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->imagen_documento_cuenta_cobrarActual =$this->imagen_documento_cuenta_cobrarClase;
			
			/*$this->imagen_documento_cuenta_cobrarActual =$this->migrarModelimagen_documento_cuenta_cobrar($this->imagen_documento_cuenta_cobrarClase);*/
			
			$this->returnHtml(false);
			
			$this->set(imagen_documento_cuenta_cobrar_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=imagen_documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION;
				
			if(imagen_documento_cuenta_cobrar_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=imagen_documento_cuenta_cobrar_util::$STR_MODULO_OPCION.imagen_documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($imagen_documento_cuenta_cobrar_session));
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
			/*$imagen_documento_cuenta_cobrarClase= (imagen_documento_cuenta_cobrar) imagen_documento_cuenta_cobrarsModel.getRowData();*/
			
			$this->imagen_documento_cuenta_cobrarClase->setId($this->imagen_documento_cuenta_cobrar->getId());	
			$this->imagen_documento_cuenta_cobrarClase->setVersionRow($this->imagen_documento_cuenta_cobrar->getVersionRow());	
			$this->imagen_documento_cuenta_cobrarClase->setVersionRow($this->imagen_documento_cuenta_cobrar->getVersionRow());	
			$this->imagen_documento_cuenta_cobrarClase->setid_imagen($this->imagen_documento_cuenta_cobrar->getid_imagen());	
			$this->imagen_documento_cuenta_cobrarClase->setimagen($this->imagen_documento_cuenta_cobrar->getimagen());	
			$this->imagen_documento_cuenta_cobrarClase->setid_documento_cuenta_cobrar($this->imagen_documento_cuenta_cobrar->getid_documento_cuenta_cobrar());	
			$this->imagen_documento_cuenta_cobrarClase->setnro_documento($this->imagen_documento_cuenta_cobrar->getnro_documento());	
		
			/*$this->Session->write('imagen_documento_cuenta_cobrarVersionRowActual', imagen_documento_cuenta_cobrar.getVersionRow());*/
			
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
			
			$imagen_documento_cuenta_cobrar_session=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME));
						
			if($imagen_documento_cuenta_cobrar_session==null) {
				$imagen_documento_cuenta_cobrar_session=new imagen_documento_cuenta_cobrar_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('imagen_documento_cuenta_cobrar', $this->imagen_documento_cuenta_cobrar->read(null, $id));
	
			
			$this->imagen_documento_cuenta_cobrar->recursive = 0;
			
			$this->imagen_documento_cuenta_cobrars=$this->paginate();
			
			$this->set('imagen_documento_cuenta_cobrars', $this->imagen_documento_cuenta_cobrars);
	
			if (empty($this->data)) {
				$this->data = $this->imagen_documento_cuenta_cobrar->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->imagen_documento_cuenta_cobrarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->imagen_documento_cuenta_cobrarClase);
			
			$this->imagen_documento_cuenta_cobrarActual=$this->imagen_documento_cuenta_cobrarClase;
			
			/*$this->imagen_documento_cuenta_cobrarActual =$this->migrarModelimagen_documento_cuenta_cobrar($this->imagen_documento_cuenta_cobrarClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars(),$this->imagen_documento_cuenta_cobrarActual);
			
			$this->actualizarControllerConReturnGeneral($this->imagen_documento_cuenta_cobrarReturnGeneral);
			
			//$this->imagen_documento_cuenta_cobrarReturnGeneral=$this->imagen_documento_cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars(),$this->imagen_documento_cuenta_cobrarActual,$this->imagen_documento_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$imagen_documento_cuenta_cobrar_session=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME));
						
			if($imagen_documento_cuenta_cobrar_session==null) {
				$imagen_documento_cuenta_cobrar_session=new imagen_documento_cuenta_cobrar_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoimagen_documento_cuenta_cobrar', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->imagen_documento_cuenta_cobrarClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->imagen_documento_cuenta_cobrarClase);
			
			$this->imagen_documento_cuenta_cobrarActual =$this->imagen_documento_cuenta_cobrarClase;
			
			/*$this->imagen_documento_cuenta_cobrarActual =$this->migrarModelimagen_documento_cuenta_cobrar($this->imagen_documento_cuenta_cobrarClase);*/
			
			$this->setimagen_documento_cuenta_cobrarFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars(),$this->imagen_documento_cuenta_cobrar);
			
			$this->actualizarControllerConReturnGeneral($this->imagen_documento_cuenta_cobrarReturnGeneral);
			
			//this->imagen_documento_cuenta_cobrarReturnGeneral=$this->imagen_documento_cuenta_cobrarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars(),$this->imagen_documento_cuenta_cobrar,$this->imagen_documento_cuenta_cobrarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->iddocumento_cuenta_cobrarDefaultFK!=null && $this->iddocumento_cuenta_cobrarDefaultFK > -1) {
				$this->imagen_documento_cuenta_cobrarReturnGeneral->getimagen_documento_cuenta_cobrar()->setid_documento_cuenta_cobrar($this->iddocumento_cuenta_cobrarDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->imagen_documento_cuenta_cobrarReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->imagen_documento_cuenta_cobrarReturnGeneral->getimagen_documento_cuenta_cobrar(),$this->imagen_documento_cuenta_cobrarActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyimagen_documento_cuenta_cobrar($this->imagen_documento_cuenta_cobrarReturnGeneral->getimagen_documento_cuenta_cobrar());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioimagen_documento_cuenta_cobrar($this->imagen_documento_cuenta_cobrarReturnGeneral->getimagen_documento_cuenta_cobrar());*/
			}
			
			if($this->imagen_documento_cuenta_cobrarReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->imagen_documento_cuenta_cobrarReturnGeneral->getimagen_documento_cuenta_cobrar(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualimagen_documento_cuenta_cobrar($this->imagen_documento_cuenta_cobrar,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->imagen_documento_cuenta_cobrarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->imagen_documento_cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->imagen_documento_cuenta_cobrarsAuxiliar=array();
			}
			
			if(count($this->imagen_documento_cuenta_cobrarsAuxiliar)==2) {
				$imagen_documento_cuenta_cobrarOrigen=$this->imagen_documento_cuenta_cobrarsAuxiliar[0];
				$imagen_documento_cuenta_cobrarDestino=$this->imagen_documento_cuenta_cobrarsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($imagen_documento_cuenta_cobrarOrigen,$imagen_documento_cuenta_cobrarDestino,true,false,false);
				
				$this->actualizarLista($imagen_documento_cuenta_cobrarDestino,$this->imagen_documento_cuenta_cobrars);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->imagen_documento_cuenta_cobrarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->imagen_documento_cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->imagen_documento_cuenta_cobrarsAuxiliar=array();
			}
			
			if(count($this->imagen_documento_cuenta_cobrarsAuxiliar) > 0) {
				foreach ($this->imagen_documento_cuenta_cobrarsAuxiliar as $imagen_documento_cuenta_cobrarSeleccionado) {
					$this->imagen_documento_cuenta_cobrar=new imagen_documento_cuenta_cobrar();
					
					$this->setCopiarVariablesObjetos($imagen_documento_cuenta_cobrarSeleccionado,$this->imagen_documento_cuenta_cobrar,true,true,false);
						
					$this->imagen_documento_cuenta_cobrars[]=$this->imagen_documento_cuenta_cobrar;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->imagen_documento_cuenta_cobrarsEliminados as $imagen_documento_cuenta_cobrarEliminado) {
				$this->imagen_documento_cuenta_cobrarLogic->imagen_documento_cuenta_cobrars[]=$imagen_documento_cuenta_cobrarEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->imagen_documento_cuenta_cobrar=new imagen_documento_cuenta_cobrar();
							
				$this->imagen_documento_cuenta_cobrars[]=$this->imagen_documento_cuenta_cobrar;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
		
		$imagen_documento_cuenta_cobrarActual=new imagen_documento_cuenta_cobrar();
		
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
				
				$imagen_documento_cuenta_cobrarActual=$this->imagen_documento_cuenta_cobrars[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $imagen_documento_cuenta_cobrarActual->setid_imagen((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $imagen_documento_cuenta_cobrarActual->setimagen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $imagen_documento_cuenta_cobrarActual->setid_documento_cuenta_cobrar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $imagen_documento_cuenta_cobrarActual->setnro_documento($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
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
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadimagen_documento_cuenta_cobrar='',string $strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar='',string $strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadimagen_documento_cuenta_cobrar,$strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar,$strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->imagen_documento_cuenta_cobrars) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=imagen_documento_cuenta_cobrar_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=imagen_documento_cuenta_cobrar_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=imagen_documento_cuenta_cobrar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$imagen_documento_cuenta_cobrar_session=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME));
						
			if($imagen_documento_cuenta_cobrar_session==null) {
				$imagen_documento_cuenta_cobrar_session=new imagen_documento_cuenta_cobrar_session();
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
					/*$this->intNumeroPaginacion=imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;*/
					
					if($imagen_documento_cuenta_cobrar_session->intNumeroPaginacion==imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$imagen_documento_cuenta_cobrar_session->intNumeroPaginacion;
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
			
			$this->imagen_documento_cuenta_cobrarsEliminados=array();
			
			/*$this->imagen_documento_cuenta_cobrarLogic->setConnexion($connexion);*/
			
			$this->imagen_documento_cuenta_cobrarLogic->setIsConDeep(true);
			
			$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrarDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('documento_cuenta_cobrar');$classes[]=$class;
			
			$this->imagen_documento_cuenta_cobrarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->imagen_documento_cuenta_cobrarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars()==null|| count($this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->imagen_documento_cuenta_cobrarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->imagen_documento_cuenta_cobrarsReporte=$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars();
									
						/*$this->generarReportes('Todos',$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars());*/
					
						$this->imagen_documento_cuenta_cobrarLogic->setimagen_documento_cuenta_cobrars($this->imagen_documento_cuenta_cobrars);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->imagen_documento_cuenta_cobrarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars()==null|| count($this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->imagen_documento_cuenta_cobrarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->imagen_documento_cuenta_cobrarsReporte=$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars();
									
						/*$this->generarReportes('Todos',$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars());*/
					
						$this->imagen_documento_cuenta_cobrarLogic->setimagen_documento_cuenta_cobrars($this->imagen_documento_cuenta_cobrars);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idimagen_documento_cuenta_cobrar=0;*/
				
				if($imagen_documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK!=null && $imagen_documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK==true) {
					if($imagen_documento_cuenta_cobrar_session->bigIdActualFK!=null && $imagen_documento_cuenta_cobrar_session->bigIdActualFK!=0)	{
						$this->idimagen_documento_cuenta_cobrar=$imagen_documento_cuenta_cobrar_session->bigIdActualFK;	
					}
					
					$imagen_documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK=false;
					
					$imagen_documento_cuenta_cobrar_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idimagen_documento_cuenta_cobrar=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idimagen_documento_cuenta_cobrar=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->imagen_documento_cuenta_cobrarLogic->getEntity($this->idimagen_documento_cuenta_cobrar);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*imagen_documento_cuenta_cobrarLogicAdditional::getDetalleIndicePorId($idimagen_documento_cuenta_cobrar);*/

				
				if($this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrar()!=null) {
					$this->imagen_documento_cuenta_cobrarLogic->setimagen_documento_cuenta_cobrars(array());
					$this->imagen_documento_cuenta_cobrarLogic->imagen_documento_cuenta_cobrars[]=$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrar();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Iddocumento_cuenta_cobrar')
			{

				if($imagen_documento_cuenta_cobrar_session->bigiddocumento_cuenta_cobrarActual!=null && $imagen_documento_cuenta_cobrar_session->bigiddocumento_cuenta_cobrarActual!=0)
				{
					$this->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar=$imagen_documento_cuenta_cobrar_session->bigiddocumento_cuenta_cobrarActual;
					$imagen_documento_cuenta_cobrar_session->bigiddocumento_cuenta_cobrarActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->imagen_documento_cuenta_cobrarLogic->getsFK_Iddocumento_cuenta_cobrar($finalQueryPaginacion,$this->pagination,$this->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//imagen_documento_cuenta_cobrarLogicAdditional::getDetalleIndiceFK_Iddocumento_cuenta_cobrar($this->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar);


					if($this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars()==null || count($this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->imagen_documento_cuenta_cobrarLogic->getsFK_Iddocumento_cuenta_cobrar('',$this->pagination,$this->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->imagen_documento_cuenta_cobrarsReporte=$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteimagen_documento_cuenta_cobrars("FK_Iddocumento_cuenta_cobrar",$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->imagen_documento_cuenta_cobrarLogic->setimagen_documento_cuenta_cobrars($imagen_documento_cuenta_cobrars);
					}
				//}

			} 
		
		$imagen_documento_cuenta_cobrar_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$imagen_documento_cuenta_cobrar_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->imagen_documento_cuenta_cobrarLogic->loadForeignsKeysDescription();*/
		
		$this->imagen_documento_cuenta_cobrars=$this->imagen_documento_cuenta_cobrarLogic->getimagen_documento_cuenta_cobrars();
		
		if($this->imagen_documento_cuenta_cobrarsEliminados==null) {
			$this->imagen_documento_cuenta_cobrarsEliminados=array();
		}
		
		$this->Session->write(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME.'Lista',serialize($this->imagen_documento_cuenta_cobrars));
		$this->Session->write(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->imagen_documento_cuenta_cobrarsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($imagen_documento_cuenta_cobrar_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idimagen_documento_cuenta_cobrar=$idGeneral;
			
			$this->intNumeroPaginacion=imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
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
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if(count($this->imagen_documento_cuenta_cobrars) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Iddocumento_cuenta_cobrarParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Iddocumento_cuenta_cobrar','cmbid_documento_cuenta_cobrar');

			$this->strAccionBusqueda='FK_Iddocumento_cuenta_cobrar';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Iddocumento_cuenta_cobrar($strFinalQuery,$id_documento_cuenta_cobrar)
	{
		try
		{

			$this->imagen_documento_cuenta_cobrarLogic->getsFK_Iddocumento_cuenta_cobrar($strFinalQuery,new Pagination(),$id_documento_cuenta_cobrar);
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
			
			
			$imagen_documento_cuenta_cobrarForeignKey=new imagen_documento_cuenta_cobrar_param_return(); //imagen_documento_cuenta_cobrarForeignKey();
			
			$imagen_documento_cuenta_cobrar_session=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME));
						
			if($imagen_documento_cuenta_cobrar_session==null) {
				$imagen_documento_cuenta_cobrar_session=new imagen_documento_cuenta_cobrar_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$imagen_documento_cuenta_cobrarForeignKey=$this->imagen_documento_cuenta_cobrarLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$imagen_documento_cuenta_cobrar_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_documento_cuenta_cobrar',$this->strRecargarFkTipos,',')) {
				$this->documento_cuenta_cobrarsFK=$imagen_documento_cuenta_cobrarForeignKey->documento_cuenta_cobrarsFK;
				$this->iddocumento_cuenta_cobrarDefaultFK=$imagen_documento_cuenta_cobrarForeignKey->iddocumento_cuenta_cobrarDefaultFK;
			}

			if($imagen_documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar) {
				$this->setVisibleBusquedasParadocumento_cuenta_cobrar(true);
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
	
	function cargarCombosFKFromReturnGeneral($imagen_documento_cuenta_cobrarReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$imagen_documento_cuenta_cobrarReturnGeneral->strRecargarFkTipos;
			
			


			if($imagen_documento_cuenta_cobrarReturnGeneral->con_documento_cuenta_cobrarsFK==true) {
				$this->documento_cuenta_cobrarsFK=$imagen_documento_cuenta_cobrarReturnGeneral->documento_cuenta_cobrarsFK;
				$this->iddocumento_cuenta_cobrarDefaultFK=$imagen_documento_cuenta_cobrarReturnGeneral->iddocumento_cuenta_cobrarDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$imagen_documento_cuenta_cobrar_session=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME));
		
		if($imagen_documento_cuenta_cobrar_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($imagen_documento_cuenta_cobrar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='documento_cuenta_cobrar';
			}
			
			$imagen_documento_cuenta_cobrar_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}						
			
			$this->imagen_documento_cuenta_cobrarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->imagen_documento_cuenta_cobrarsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->imagen_documento_cuenta_cobrarsAuxiliar=array();
			}
			
			if(count($this->imagen_documento_cuenta_cobrarsAuxiliar) > 0) {
				
				foreach ($this->imagen_documento_cuenta_cobrarsAuxiliar as $imagen_documento_cuenta_cobrarSeleccionado) {
					$this->eliminarTablaBase($imagen_documento_cuenta_cobrarSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
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
	
	
	
	public function getdocumento_cuenta_cobrarsFKListSelectItem() 
	{
		$documento_cuenta_cobrarsList=array();

		$item=null;

		foreach($this->documento_cuenta_cobrarsFK as $documento_cuenta_cobrar)
		{
			$item=new SelectItem();
			$item->setLabel($documento_cuenta_cobrar>getId());
			$item->setValue($documento_cuenta_cobrar->getId());
			$documento_cuenta_cobrarsList[]=$item;
		}

		return $documento_cuenta_cobrarsList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
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
				$this->imagen_documento_cuenta_cobrarLogic->commitNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->rollbackNewConnexionToDeep();
				$this->imagen_documento_cuenta_cobrarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$imagen_documento_cuenta_cobrarsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->imagen_documento_cuenta_cobrars as $imagen_documento_cuenta_cobrarLocal) {
				if($imagen_documento_cuenta_cobrarLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->imagen_documento_cuenta_cobrar=new imagen_documento_cuenta_cobrar();
				
				$this->imagen_documento_cuenta_cobrar->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->imagen_documento_cuenta_cobrars[]=$this->imagen_documento_cuenta_cobrar;*/
				
				$imagen_documento_cuenta_cobrarsNuevos[]=$this->imagen_documento_cuenta_cobrar;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('documento_cuenta_cobrar');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->imagen_documento_cuenta_cobrarLogic->setimagen_documento_cuenta_cobrars($imagen_documento_cuenta_cobrarsNuevos);
					
				$this->imagen_documento_cuenta_cobrarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($imagen_documento_cuenta_cobrarsNuevos as $imagen_documento_cuenta_cobrarNuevo) {
					$this->imagen_documento_cuenta_cobrars[]=$imagen_documento_cuenta_cobrarNuevo;
				}
				
				/*$this->imagen_documento_cuenta_cobrars[]=$imagen_documento_cuenta_cobrarsNuevos;*/
				
				$this->imagen_documento_cuenta_cobrarLogic->setimagen_documento_cuenta_cobrars($this->imagen_documento_cuenta_cobrars);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($imagen_documento_cuenta_cobrarsNuevos!=null);
	}
					
	
	public function cargarCombosdocumento_cuenta_cobrarsFK($connexion=null,$strRecargarFkQuery=''){
		$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic();
		$pagination= new Pagination();
		$this->documento_cuenta_cobrarsFK=array();

		$documento_cuenta_cobrarLogic->setConnexion($connexion);
		$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$imagen_documento_cuenta_cobrar_session=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME));

		if($imagen_documento_cuenta_cobrar_session==null) {
			$imagen_documento_cuenta_cobrar_session=new imagen_documento_cuenta_cobrar_session();
		}
		
		if($imagen_documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=documento_cuenta_cobrar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaldocumento_cuenta_cobrar=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaldocumento_cuenta_cobrar=Funciones::GetFinalQueryAppend($finalQueryGlobaldocumento_cuenta_cobrar, '');
				$finalQueryGlobaldocumento_cuenta_cobrar.=documento_cuenta_cobrar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaldocumento_cuenta_cobrar.$strRecargarFkQuery;		

				$documento_cuenta_cobrarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosdocumento_cuenta_cobrarsFK($documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrars());

		} else {
			$this->setVisibleBusquedasParadocumento_cuenta_cobrar(true);


			if($imagen_documento_cuenta_cobrar_session->bigiddocumento_cuenta_cobrarActual!=null && $imagen_documento_cuenta_cobrar_session->bigiddocumento_cuenta_cobrarActual > 0) {
				$documento_cuenta_cobrarLogic->getEntity($imagen_documento_cuenta_cobrar_session->bigiddocumento_cuenta_cobrarActual);//WithConnection

				$this->documento_cuenta_cobrarsFK[$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getId()]=imagen_documento_cuenta_cobrar_util::getdocumento_cuenta_cobrarDescripcion($documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar());
				$this->iddocumento_cuenta_cobrarDefaultFK=$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar()->getId();
			}
		}
	}

	
	
	public function prepararCombosdocumento_cuenta_cobrarsFK($documento_cuenta_cobrars){

		foreach ($documento_cuenta_cobrars as $documento_cuenta_cobrarLocal ) {
			if($this->iddocumento_cuenta_cobrarDefaultFK==0) {
				$this->iddocumento_cuenta_cobrarDefaultFK=$documento_cuenta_cobrarLocal->getId();
			}

			$this->documento_cuenta_cobrarsFK[$documento_cuenta_cobrarLocal->getId()]=imagen_documento_cuenta_cobrar_util::getdocumento_cuenta_cobrarDescripcion($documento_cuenta_cobrarLocal);
		}
	}

	
	
	public function cargarDescripciondocumento_cuenta_cobrarFK($iddocumento_cuenta_cobrar,$connexion=null){
		$documento_cuenta_cobrarLogic= new documento_cuenta_cobrar_logic();
		$documento_cuenta_cobrarLogic->setConnexion($connexion);
		$documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrarDataAccess()->isForFKData=true;
		$strDescripciondocumento_cuenta_cobrar='';

		if($iddocumento_cuenta_cobrar!=null && $iddocumento_cuenta_cobrar!='' && $iddocumento_cuenta_cobrar!='null') {
			if($connexion!=null) {
				$documento_cuenta_cobrarLogic->getEntity($iddocumento_cuenta_cobrar);//WithConnection
			} else {
				$documento_cuenta_cobrarLogic->getEntityWithConnection($iddocumento_cuenta_cobrar);//
			}

			$strDescripciondocumento_cuenta_cobrar=imagen_documento_cuenta_cobrar_util::getdocumento_cuenta_cobrarDescripcion($documento_cuenta_cobrarLogic->getdocumento_cuenta_cobrar());

		} else {
			$strDescripciondocumento_cuenta_cobrar='null';
		}

		return $strDescripciondocumento_cuenta_cobrar;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(imagen_documento_cuenta_cobrar $imagen_documento_cuenta_cobrarClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParadocumento_cuenta_cobrar($isParadocumento_cuenta_cobrar){
		$strParaVisibledocumento_cuenta_cobrar='display:table-row';
		$strParaVisibleNegaciondocumento_cuenta_cobrar='display:none';

		if($isParadocumento_cuenta_cobrar) {
			$strParaVisibledocumento_cuenta_cobrar='display:table-row';
			$strParaVisibleNegaciondocumento_cuenta_cobrar='display:none';
		} else {
			$strParaVisibledocumento_cuenta_cobrar='display:none';
			$strParaVisibleNegaciondocumento_cuenta_cobrar='display:table-row';
		}


		$strParaVisibleNegaciondocumento_cuenta_cobrar=trim($strParaVisibleNegaciondocumento_cuenta_cobrar);

		$this->strVisibleFK_Iddocumento_cuenta_cobrar=$strParaVisibledocumento_cuenta_cobrar;
	}
	
	

	public function abrirBusquedaParadocumento_cuenta_cobrar() {//$idimagen_documento_cuenta_cobrarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idimagen_documento_cuenta_cobrarActual=$idimagen_documento_cuenta_cobrarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.imagen_documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_documento_cuenta_cobrar(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',documento_cuenta_cobrar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.imagen_documento_cuenta_cobrarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_documento_cuenta_cobrar(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(documento_cuenta_cobrar_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME,imagen_documento_cuenta_cobrar_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$imagen_documento_cuenta_cobrar_session=$this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME);
				
		if($imagen_documento_cuenta_cobrar_session==null) {
			$imagen_documento_cuenta_cobrar_session=new imagen_documento_cuenta_cobrar_session();		
			//$this->Session->write('imagen_documento_cuenta_cobrar_session',$imagen_documento_cuenta_cobrar_session);							
		}
		*/
		
		$imagen_documento_cuenta_cobrar_session=new imagen_documento_cuenta_cobrar_session();
    	$imagen_documento_cuenta_cobrar_session->strPathNavegacionActual=imagen_documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
    	$imagen_documento_cuenta_cobrar_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($imagen_documento_cuenta_cobrar_session));		
	}	
	
	public function getSetBusquedasSesionConfig(imagen_documento_cuenta_cobrar_session $imagen_documento_cuenta_cobrar_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($imagen_documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK!=null && $imagen_documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFK==true) {
			if($imagen_documento_cuenta_cobrar_session->bigIdActualFK!=null && $imagen_documento_cuenta_cobrar_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$imagen_documento_cuenta_cobrar_session->bigIdActualFKParaPosibleAtras=$imagen_documento_cuenta_cobrar_session->bigIdActualFK;*/
			}
				
			$imagen_documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$imagen_documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(imagen_documento_cuenta_cobrar_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($imagen_documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar!=null && $imagen_documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar==true)
			{
				if($imagen_documento_cuenta_cobrar_session->bigiddocumento_cuenta_cobrarActual!=0) {
					$this->strAccionBusqueda='FK_Iddocumento_cuenta_cobrar';

					$existe_history=HistoryWeb::ExisteElemento(imagen_documento_cuenta_cobrar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(imagen_documento_cuenta_cobrar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(imagen_documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($imagen_documento_cuenta_cobrar_session->bigiddocumento_cuenta_cobrarActualDescripcion);
						$historyWeb->setIdActual($imagen_documento_cuenta_cobrar_session->bigiddocumento_cuenta_cobrarActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=imagen_documento_cuenta_cobrar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$imagen_documento_cuenta_cobrar_session->bigiddocumento_cuenta_cobrarActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$imagen_documento_cuenta_cobrar_session->bitBusquedaDesdeFKSesiondocumento_cuenta_cobrar=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;

				if($imagen_documento_cuenta_cobrar_session->intNumeroPaginacion==imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=imagen_documento_cuenta_cobrar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$imagen_documento_cuenta_cobrar_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$imagen_documento_cuenta_cobrar_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$imagen_documento_cuenta_cobrar_session=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME));
		
		if($imagen_documento_cuenta_cobrar_session==null) {
			$imagen_documento_cuenta_cobrar_session=new imagen_documento_cuenta_cobrar_session();
		}
		
		$imagen_documento_cuenta_cobrar_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$imagen_documento_cuenta_cobrar_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$imagen_documento_cuenta_cobrar_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Iddocumento_cuenta_cobrar') {
			$imagen_documento_cuenta_cobrar_session->id_documento_cuenta_cobrar=$this->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar;	

		}
		
		$this->Session->write(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($imagen_documento_cuenta_cobrar_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(imagen_documento_cuenta_cobrar_session $imagen_documento_cuenta_cobrar_session) {
		
		if($imagen_documento_cuenta_cobrar_session==null) {
			$imagen_documento_cuenta_cobrar_session=unserialize($this->Session->read(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME));
		}
		
		if($imagen_documento_cuenta_cobrar_session==null) {
		   $imagen_documento_cuenta_cobrar_session=new imagen_documento_cuenta_cobrar_session();
		}
		
		if($imagen_documento_cuenta_cobrar_session->strUltimaBusqueda!=null && $imagen_documento_cuenta_cobrar_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$imagen_documento_cuenta_cobrar_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$imagen_documento_cuenta_cobrar_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$imagen_documento_cuenta_cobrar_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Iddocumento_cuenta_cobrar') {
				$this->id_documento_cuenta_cobrarFK_Iddocumento_cuenta_cobrar=$imagen_documento_cuenta_cobrar_session->id_documento_cuenta_cobrar;
				$imagen_documento_cuenta_cobrar_session->id_documento_cuenta_cobrar=-1;

			}
		}
		
		$imagen_documento_cuenta_cobrar_session->strUltimaBusqueda='';
		//$imagen_documento_cuenta_cobrar_session->intNumeroPaginacion=10;
		$imagen_documento_cuenta_cobrar_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(imagen_documento_cuenta_cobrar_util::$STR_SESSION_NAME,serialize($imagen_documento_cuenta_cobrar_session));		
	}
	
	public function imagen_documento_cuenta_cobrarsControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->iddocumento_cuenta_cobrarDefaultFK = 0;
	}
	
	public function setimagen_documento_cuenta_cobrarFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_documento_cuenta_cobrar',$this->iddocumento_cuenta_cobrarDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		documento_cuenta_cobrar::$class;
		documento_cuenta_cobrar_carga::$CONTROLLER;
		
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
		interface imagen_documento_cuenta_cobrar_controlI {	
		
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
		
		public function onLoad(imagen_documento_cuenta_cobrar_session $imagen_documento_cuenta_cobrar_session=null);	
		function index(?string $strTypeOnLoadimagen_documento_cuenta_cobrar='',?string $strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar='',?string $strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadimagen_documento_cuenta_cobrar='',string $strTipoPaginaAuxiliarimagen_documento_cuenta_cobrar='',string $strTipoUsuarioAuxiliarimagen_documento_cuenta_cobrar='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($imagen_documento_cuenta_cobrarReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(imagen_documento_cuenta_cobrar $imagen_documento_cuenta_cobrarClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(imagen_documento_cuenta_cobrar_session $imagen_documento_cuenta_cobrar_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(imagen_documento_cuenta_cobrar_session $imagen_documento_cuenta_cobrar_session);	
		public function imagen_documento_cuenta_cobrarsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setimagen_documento_cuenta_cobrarFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
