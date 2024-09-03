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

namespace com\bydan\contabilidad\seguridad\auditoria_detalle\presentation\control;

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

use com\bydan\contabilidad\seguridad\auditoria_detalle\business\entity\auditoria_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/auditoria_detalle/util/auditoria_detalle_carga.php');
use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_carga;

use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_util;
use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_param_return;
use com\bydan\contabilidad\seguridad\auditoria_detalle\business\logic\auditoria_detalle_logic;
use com\bydan\contabilidad\seguridad\auditoria_detalle\presentation\session\auditoria_detalle_session;


//FK


use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;
use com\bydan\contabilidad\seguridad\auditoria\business\logic\auditoria_logic;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_carga;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
auditoria_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
auditoria_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
auditoria_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
auditoria_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*auditoria_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/seguridad/auditoria_detalle/presentation/control/auditoria_detalle_init_control.php');
use com\bydan\contabilidad\seguridad\auditoria_detalle\presentation\control\auditoria_detalle_init_control;

include_once('com/bydan/contabilidad/seguridad/auditoria_detalle/presentation/control/auditoria_detalle_base_control.php');
use com\bydan\contabilidad\seguridad\auditoria_detalle\presentation\control\auditoria_detalle_base_control;

class auditoria_detalle_control extends auditoria_detalle_base_control {	
	
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
			
			
			else if($action=="BusquedaPorIdAuditoriaPorNombreCampo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorIdAuditoriaPorNombreCampoParaProcesar();
			}
			else if($action=="FK_Idauditoria"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdauditoriaParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaauditoria') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idauditoria_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaauditoria();//$idauditoria_detalleActual
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
					
					$auditoria_detalleController = new auditoria_detalle_control();
					
					$auditoria_detalleController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($auditoria_detalleController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$auditoria_detalleController = new auditoria_detalle_control();
						$auditoria_detalleController = $this;
						
						$jsonResponse = json_encode($auditoria_detalleController->auditoria_detalles);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->auditoria_detalleReturnGeneral==null) {
					$this->auditoria_detalleReturnGeneral=new auditoria_detalle_param_return();
				}
				
				echo($this->auditoria_detalleReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$auditoria_detalleController=new auditoria_detalle_control();
		
		$auditoria_detalleController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$auditoria_detalleController->usuarioActual=new usuario();
		
		$auditoria_detalleController->usuarioActual->setId($this->usuarioActual->getId());
		$auditoria_detalleController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$auditoria_detalleController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$auditoria_detalleController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$auditoria_detalleController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$auditoria_detalleController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$auditoria_detalleController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$auditoria_detalleController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $auditoria_detalleController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadauditoria_detalle= $this->getDataGeneralString('strTypeOnLoadauditoria_detalle');
		$strTipoPaginaAuxiliarauditoria_detalle= $this->getDataGeneralString('strTipoPaginaAuxiliarauditoria_detalle');
		$strTipoUsuarioAuxiliarauditoria_detalle= $this->getDataGeneralString('strTipoUsuarioAuxiliarauditoria_detalle');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadauditoria_detalle,$strTipoPaginaAuxiliarauditoria_detalle,$strTipoUsuarioAuxiliarauditoria_detalle,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadauditoria_detalle!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('auditoria_detalle','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(auditoria_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarauditoria_detalle,$this->strTipoUsuarioAuxiliarauditoria_detalle,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(auditoria_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarauditoria_detalle,$this->strTipoUsuarioAuxiliarauditoria_detalle,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->auditoria_detalleReturnGeneral=new auditoria_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->auditoria_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->auditoria_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->auditoria_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->auditoria_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->auditoria_detalleReturnGeneral);
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
		$this->auditoria_detalleReturnGeneral=new auditoria_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->auditoria_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->auditoria_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->auditoria_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->auditoria_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->auditoria_detalleReturnGeneral);
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
		$this->auditoria_detalleReturnGeneral=new auditoria_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->auditoria_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->auditoria_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->auditoria_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->auditoria_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->auditoria_detalleReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
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
			
			
			$this->auditoria_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->auditoria_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->auditoria_detalleReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->auditoria_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->auditoria_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->auditoria_detalleReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->auditoria_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->auditoria_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->auditoria_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->auditoria_detalleReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->auditoria_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->auditoria_detalleReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->auditoria_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->auditoria_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->auditoria_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->auditoria_detalleReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->auditoria_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->auditoria_detalleReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
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
		
		$this->auditoria_detalleLogic=new auditoria_detalle_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->auditoria_detalle=new auditoria_detalle();
		
		$this->strTypeOnLoadauditoria_detalle='onload';
		$this->strTipoPaginaAuxiliarauditoria_detalle='none';
		$this->strTipoUsuarioAuxiliarauditoria_detalle='none';	

		$this->intNumeroPaginacion=auditoria_detalle_util::$INT_NUMERO_PAGINACION;
		
		$this->auditoria_detalleModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->auditoria_detalleControllerAdditional=new auditoria_detalle_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(auditoria_detalle_session $auditoria_detalle_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($auditoria_detalle_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadauditoria_detalle='',?string $strTipoPaginaAuxiliarauditoria_detalle='',?string $strTipoUsuarioAuxiliarauditoria_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadauditoria_detalle=$strTypeOnLoadauditoria_detalle;
			$this->strTipoPaginaAuxiliarauditoria_detalle=$strTipoPaginaAuxiliarauditoria_detalle;
			$this->strTipoUsuarioAuxiliarauditoria_detalle=$strTipoUsuarioAuxiliarauditoria_detalle;
	
			if($strTipoUsuarioAuxiliarauditoria_detalle=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->auditoria_detalle=new auditoria_detalle();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Auditoria Detalles';
			
			
			$auditoria_detalle_session=unserialize($this->Session->read(auditoria_detalle_util::$STR_SESSION_NAME));
							
			if($auditoria_detalle_session==null) {
				$auditoria_detalle_session=new auditoria_detalle_session();
				
				/*$this->Session->write('auditoria_detalle_session',$auditoria_detalle_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($auditoria_detalle_session->strFuncionJsPadre!=null && $auditoria_detalle_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$auditoria_detalle_session->strFuncionJsPadre;
				
				$auditoria_detalle_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($auditoria_detalle_session);
			
			if($strTypeOnLoadauditoria_detalle!=null && $strTypeOnLoadauditoria_detalle=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$auditoria_detalle_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$auditoria_detalle_session->setPaginaPopupVariables(true);
				}
				
				if($auditoria_detalle_session->intNumeroPaginacion==auditoria_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=auditoria_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$auditoria_detalle_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,auditoria_detalle_util::$STR_SESSION_NAME,'seguridad');																
			
			} else if($strTypeOnLoadauditoria_detalle!=null && $strTypeOnLoadauditoria_detalle=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$auditoria_detalle_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=auditoria_detalle_util::$INT_NUMERO_PAGINACION;*/
				
				if($auditoria_detalle_session->intNumeroPaginacion==auditoria_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=auditoria_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$auditoria_detalle_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarauditoria_detalle!=null && $strTipoPaginaAuxiliarauditoria_detalle=='none') {
				/*$auditoria_detalle_session->strStyleDivHeader='display:table-row';*/
				
				/*$auditoria_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarauditoria_detalle!=null && $strTipoPaginaAuxiliarauditoria_detalle=='iframe') {
					/*
					$auditoria_detalle_session->strStyleDivArbol='display:none';
					$auditoria_detalle_session->strStyleDivHeader='display:none';
					$auditoria_detalle_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$auditoria_detalle_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->auditoria_detalleClase=new auditoria_detalle();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=auditoria_detalle_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(auditoria_detalle_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->auditoria_detalleLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->auditoria_detalleLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->auditoria_detalleLogic=new auditoria_detalle_logic();*/
			
			
			$this->auditoria_detallesModel=null;
			/*new ListDataModel();*/
			
			/*$this->auditoria_detallesModel.setWrappedData(auditoria_detalleLogic->getauditoria_detalles());*/
						
			$this->auditoria_detalles= array();
			$this->auditoria_detallesEliminados=array();
			$this->auditoria_detallesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= auditoria_detalle_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->auditoria_detalle= new auditoria_detalle();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleBusquedaPorIdAuditoriaPorNombreCampo='display:table-row';
			$this->strVisibleFK_Idauditoria='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarauditoria_detalle!=null && $strTipoUsuarioAuxiliarauditoria_detalle!='none' && $strTipoUsuarioAuxiliarauditoria_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarauditoria_detalle);
																
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
				if($strTipoUsuarioAuxiliarauditoria_detalle!=null && $strTipoUsuarioAuxiliarauditoria_detalle!='none' && $strTipoUsuarioAuxiliarauditoria_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarauditoria_detalle);
																
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
				if($strTipoUsuarioAuxiliarauditoria_detalle==null || $strTipoUsuarioAuxiliarauditoria_detalle=='none' || $strTipoUsuarioAuxiliarauditoria_detalle=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarauditoria_detalle,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, auditoria_detalle_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, auditoria_detalle_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina auditoria_detalle');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($auditoria_detalle_session);
			
			$this->getSetBusquedasSesionConfig($auditoria_detalle_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteauditoria_detalles($this->strAccionBusqueda,$this->auditoria_detalleLogic->getauditoria_detalles());*/
				} else if($this->strGenerarReporte=='Html')	{
					$auditoria_detalle_session->strServletGenerarHtmlReporte='auditoria_detalleServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(auditoria_detalle_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(auditoria_detalle_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($auditoria_detalle_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$auditoria_detalle_session=unserialize($this->Session->read(auditoria_detalle_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarauditoria_detalle!=null && $strTipoUsuarioAuxiliarauditoria_detalle=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($auditoria_detalle_session);
			}
								
			$this->set(auditoria_detalle_util::$STR_SESSION_NAME, $auditoria_detalle_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($auditoria_detalle_session);
			
			/*
			$this->auditoria_detalle->recursive = 0;
			
			$this->auditoria_detalles=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('auditoria_detalles', $this->auditoria_detalles);
			
			$this->set(auditoria_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->auditoria_detalleActual =$this->auditoria_detalleClase;
			
			/*$this->auditoria_detalleActual =$this->migrarModelauditoria_detalle($this->auditoria_detalleClase);*/
			
			$this->returnHtml(false);
			
			$this->set(auditoria_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=auditoria_detalle_util::$STR_NOMBRE_OPCION;
				
			if(auditoria_detalle_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=auditoria_detalle_util::$STR_MODULO_OPCION.auditoria_detalle_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(auditoria_detalle_util::$STR_SESSION_NAME,serialize($auditoria_detalle_session));
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
			/*$auditoria_detalleClase= (auditoria_detalle) auditoria_detallesModel.getRowData();*/
			
			$this->auditoria_detalleClase->setId($this->auditoria_detalle->getId());	
			$this->auditoria_detalleClase->setVersionRow($this->auditoria_detalle->getVersionRow());	
			$this->auditoria_detalleClase->setVersionRow($this->auditoria_detalle->getVersionRow());	
			$this->auditoria_detalleClase->setid_auditoria($this->auditoria_detalle->getid_auditoria());	
			$this->auditoria_detalleClase->setnombre_campo($this->auditoria_detalle->getnombre_campo());	
			$this->auditoria_detalleClase->setvalor_anterior($this->auditoria_detalle->getvalor_anterior());	
			$this->auditoria_detalleClase->setvalor_actual($this->auditoria_detalle->getvalor_actual());	
		
			/*$this->Session->write('auditoria_detalleVersionRowActual', auditoria_detalle.getVersionRow());*/
			
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
			
			$auditoria_detalle_session=unserialize($this->Session->read(auditoria_detalle_util::$STR_SESSION_NAME));
						
			if($auditoria_detalle_session==null) {
				$auditoria_detalle_session=new auditoria_detalle_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('auditoria_detalle', $this->auditoria_detalle->read(null, $id));
	
			
			$this->auditoria_detalle->recursive = 0;
			
			$this->auditoria_detalles=$this->paginate();
			
			$this->set('auditoria_detalles', $this->auditoria_detalles);
	
			if (empty($this->data)) {
				$this->data = $this->auditoria_detalle->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->auditoria_detalleLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->auditoria_detalleClase);
			
			$this->auditoria_detalleActual=$this->auditoria_detalleClase;
			
			/*$this->auditoria_detalleActual =$this->migrarModelauditoria_detalle($this->auditoria_detalleClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->auditoria_detalleLogic->getauditoria_detalles(),$this->auditoria_detalleActual);
			
			$this->actualizarControllerConReturnGeneral($this->auditoria_detalleReturnGeneral);
			
			//$this->auditoria_detalleReturnGeneral=$this->auditoria_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->auditoria_detalleLogic->getauditoria_detalles(),$this->auditoria_detalleActual,$this->auditoria_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$auditoria_detalle_session=unserialize($this->Session->read(auditoria_detalle_util::$STR_SESSION_NAME));
						
			if($auditoria_detalle_session==null) {
				$auditoria_detalle_session=new auditoria_detalle_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoauditoria_detalle', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->auditoria_detalleClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->auditoria_detalleClase);
			
			$this->auditoria_detalleActual =$this->auditoria_detalleClase;
			
			/*$this->auditoria_detalleActual =$this->migrarModelauditoria_detalle($this->auditoria_detalleClase);*/
			
			$this->setauditoria_detalleFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->auditoria_detalleLogic->getauditoria_detalles(),$this->auditoria_detalle);
			
			$this->actualizarControllerConReturnGeneral($this->auditoria_detalleReturnGeneral);
			
			//this->auditoria_detalleReturnGeneral=$this->auditoria_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->auditoria_detalleLogic->getauditoria_detalles(),$this->auditoria_detalle,$this->auditoria_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idauditoriaDefaultFK!=null && $this->idauditoriaDefaultFK > -1) {
				$this->auditoria_detalleReturnGeneral->getauditoria_detalle()->setid_auditoria($this->idauditoriaDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->auditoria_detalleReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->auditoria_detalleReturnGeneral->getauditoria_detalle(),$this->auditoria_detalleActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyauditoria_detalle($this->auditoria_detalleReturnGeneral->getauditoria_detalle());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioauditoria_detalle($this->auditoria_detalleReturnGeneral->getauditoria_detalle());*/
			}
			
			if($this->auditoria_detalleReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->auditoria_detalleReturnGeneral->getauditoria_detalle(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualauditoria_detalle($this->auditoria_detalle,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->auditoria_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->auditoria_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->auditoria_detallesAuxiliar=array();
			}
			
			if(count($this->auditoria_detallesAuxiliar)==2) {
				$auditoria_detalleOrigen=$this->auditoria_detallesAuxiliar[0];
				$auditoria_detalleDestino=$this->auditoria_detallesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($auditoria_detalleOrigen,$auditoria_detalleDestino,true,false,false);
				
				$this->actualizarLista($auditoria_detalleDestino,$this->auditoria_detalles);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->auditoria_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->auditoria_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->auditoria_detallesAuxiliar=array();
			}
			
			if(count($this->auditoria_detallesAuxiliar) > 0) {
				foreach ($this->auditoria_detallesAuxiliar as $auditoria_detalleSeleccionado) {
					$this->auditoria_detalle=new auditoria_detalle();
					
					$this->setCopiarVariablesObjetos($auditoria_detalleSeleccionado,$this->auditoria_detalle,true,true,false);
						
					$this->auditoria_detalles[]=$this->auditoria_detalle;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->auditoria_detallesEliminados as $auditoria_detalleEliminado) {
				$this->auditoria_detalleLogic->auditoria_detalles[]=$auditoria_detalleEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->auditoria_detalle=new auditoria_detalle();
							
				$this->auditoria_detalles[]=$this->auditoria_detalle;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
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
		
		$auditoria_detalleActual=new auditoria_detalle();
		
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
				
				$auditoria_detalleActual=$this->auditoria_detalles[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $auditoria_detalleActual->setid_auditoria((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $auditoria_detalleActual->setnombre_campo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $auditoria_detalleActual->setvalor_anterior($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $auditoria_detalleActual->setvalor_actual($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
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
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=auditoria_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadauditoria_detalle='',string $strTipoPaginaAuxiliarauditoria_detalle='',string $strTipoUsuarioAuxiliarauditoria_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadauditoria_detalle,$strTipoPaginaAuxiliarauditoria_detalle,$strTipoUsuarioAuxiliarauditoria_detalle,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->auditoria_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=auditoria_detalle_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=auditoria_detalle_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=auditoria_detalle_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$auditoria_detalle_session=unserialize($this->Session->read(auditoria_detalle_util::$STR_SESSION_NAME));
						
			if($auditoria_detalle_session==null) {
				$auditoria_detalle_session=new auditoria_detalle_session();
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
					/*$this->intNumeroPaginacion=auditoria_detalle_util::$INT_NUMERO_PAGINACION;*/
					
					if($auditoria_detalle_session->intNumeroPaginacion==auditoria_detalle_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=auditoria_detalle_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$auditoria_detalle_session->intNumeroPaginacion;
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
			
			$this->auditoria_detallesEliminados=array();
			
			/*$this->auditoria_detalleLogic->setConnexion($connexion);*/
			
			$this->auditoria_detalleLogic->setIsConDeep(true);
			
			$this->auditoria_detalleLogic->getauditoria_detalleDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('auditoria');$classes[]=$class;
			
			$this->auditoria_detalleLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->auditoria_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->auditoria_detalleLogic->getauditoria_detalles()==null|| count($this->auditoria_detalleLogic->getauditoria_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->auditoria_detalles=$this->auditoria_detalleLogic->getauditoria_detalles();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->auditoria_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->auditoria_detallesReporte=$this->auditoria_detalleLogic->getauditoria_detalles();
									
						/*$this->generarReportes('Todos',$this->auditoria_detalleLogic->getauditoria_detalles());*/
					
						$this->auditoria_detalleLogic->setauditoria_detalles($this->auditoria_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->auditoria_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->auditoria_detalleLogic->getauditoria_detalles()==null|| count($this->auditoria_detalleLogic->getauditoria_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->auditoria_detalles=$this->auditoria_detalleLogic->getauditoria_detalles();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->auditoria_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->auditoria_detallesReporte=$this->auditoria_detalleLogic->getauditoria_detalles();
									
						/*$this->generarReportes('Todos',$this->auditoria_detalleLogic->getauditoria_detalles());*/
					
						$this->auditoria_detalleLogic->setauditoria_detalles($this->auditoria_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idauditoria_detalle=0;*/
				
				if($auditoria_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $auditoria_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
					if($auditoria_detalle_session->bigIdActualFK!=null && $auditoria_detalle_session->bigIdActualFK!=0)	{
						$this->idauditoria_detalle=$auditoria_detalle_session->bigIdActualFK;	
					}
					
					$auditoria_detalle_session->bitBusquedaDesdeFKSesionFK=false;
					
					$auditoria_detalle_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idauditoria_detalle=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idauditoria_detalle=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->auditoria_detalleLogic->getEntity($this->idauditoria_detalle);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*auditoria_detalleLogicAdditional::getDetalleIndicePorId($idauditoria_detalle);*/

				
				if($this->auditoria_detalleLogic->getauditoria_detalle()!=null) {
					$this->auditoria_detalleLogic->setauditoria_detalles(array());
					$this->auditoria_detalleLogic->auditoria_detalles[]=$this->auditoria_detalleLogic->getauditoria_detalle();
				}
			
			}
		
			else if($strAccionBusqueda=='BusquedaPorIdAuditoriaPorNombreCampo')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoria_detalleLogic->getsBusquedaPorIdAuditoriaPorNombreCampo($finalQueryPaginacion,$this->pagination,$this->id_auditoriaBusquedaPorIdAuditoriaPorNombreCampo,$this->nombre_campoBusquedaPorIdAuditoriaPorNombreCampo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//auditoria_detalleLogicAdditional::getDetalleIndiceBusquedaPorIdAuditoriaPorNombreCampo($this->id_auditoriaBusquedaPorIdAuditoriaPorNombreCampo,$this->nombre_campoBusquedaPorIdAuditoriaPorNombreCampo);


					if($this->auditoria_detalleLogic->getauditoria_detalles()==null || count($this->auditoria_detalleLogic->getauditoria_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$auditoria_detalles=$this->auditoria_detalleLogic->getauditoria_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoria_detalleLogic->getsBusquedaPorIdAuditoriaPorNombreCampo('',$this->pagination,$this->id_auditoriaBusquedaPorIdAuditoriaPorNombreCampo,$this->nombre_campoBusquedaPorIdAuditoriaPorNombreCampo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->auditoria_detallesReporte=$this->auditoria_detalleLogic->getauditoria_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteauditoria_detalles("BusquedaPorIdAuditoriaPorNombreCampo",$this->auditoria_detalleLogic->getauditoria_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->auditoria_detalleLogic->setauditoria_detalles($auditoria_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idauditoria')
			{

				if($auditoria_detalle_session->bigidauditoriaActual!=null && $auditoria_detalle_session->bigidauditoriaActual!=0)
				{
					$this->id_auditoriaFK_Idauditoria=$auditoria_detalle_session->bigidauditoriaActual;
					$auditoria_detalle_session->bigidauditoriaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoria_detalleLogic->getsFK_Idauditoria($finalQueryPaginacion,$this->pagination,$this->id_auditoriaFK_Idauditoria);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//auditoria_detalleLogicAdditional::getDetalleIndiceFK_Idauditoria($this->id_auditoriaFK_Idauditoria);


					if($this->auditoria_detalleLogic->getauditoria_detalles()==null || count($this->auditoria_detalleLogic->getauditoria_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$auditoria_detalles=$this->auditoria_detalleLogic->getauditoria_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoria_detalleLogic->getsFK_Idauditoria('',$this->pagination,$this->id_auditoriaFK_Idauditoria);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->auditoria_detallesReporte=$this->auditoria_detalleLogic->getauditoria_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteauditoria_detalles("FK_Idauditoria",$this->auditoria_detalleLogic->getauditoria_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->auditoria_detalleLogic->setauditoria_detalles($auditoria_detalles);
					}
				//}

			} 
		
		$auditoria_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$auditoria_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->auditoria_detalleLogic->loadForeignsKeysDescription();*/
		
		$this->auditoria_detalles=$this->auditoria_detalleLogic->getauditoria_detalles();
		
		if($this->auditoria_detallesEliminados==null) {
			$this->auditoria_detallesEliminados=array();
		}
		
		$this->Session->write(auditoria_detalle_util::$STR_SESSION_NAME.'Lista',serialize($this->auditoria_detalles));
		$this->Session->write(auditoria_detalle_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->auditoria_detallesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(auditoria_detalle_util::$STR_SESSION_NAME,serialize($auditoria_detalle_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idauditoria_detalle=$idGeneral;
			
			$this->intNumeroPaginacion=auditoria_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
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
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}

			if(count($this->auditoria_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsBusquedaPorIdAuditoriaPorNombreCampoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=auditoria_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_auditoriaBusquedaPorIdAuditoriaPorNombreCampo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorIdAuditoriaPorNombreCampo','cmbid_auditoria');
			$this->nombre_campoBusquedaPorIdAuditoriaPorNombreCampo=(string)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorIdAuditoriaPorNombreCampo','txtnombre_campo');

			$this->strAccionBusqueda='BusquedaPorIdAuditoriaPorNombreCampo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdauditoriaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=auditoria_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_auditoriaFK_Idauditoria=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idauditoria','cmbid_auditoria');

			$this->strAccionBusqueda='FK_Idauditoria';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsBusquedaPorIdAuditoriaPorNombreCampo($strFinalQuery,$id_auditoria,$nombre_campo)
	{
		try
		{

			$this->auditoria_detalleLogic->getsBusquedaPorIdAuditoriaPorNombreCampo($strFinalQuery,new Pagination(),$id_auditoria,$nombre_campo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idauditoria($strFinalQuery,$id_auditoria)
	{
		try
		{

			$this->auditoria_detalleLogic->getsFK_Idauditoria($strFinalQuery,new Pagination(),$id_auditoria);
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
			
			
			$auditoria_detalleForeignKey=new auditoria_detalle_param_return(); //auditoria_detalleForeignKey();
			
			$auditoria_detalle_session=unserialize($this->Session->read(auditoria_detalle_util::$STR_SESSION_NAME));
						
			if($auditoria_detalle_session==null) {
				$auditoria_detalle_session=new auditoria_detalle_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$auditoria_detalleForeignKey=$this->auditoria_detalleLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$auditoria_detalle_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_auditoria',$this->strRecargarFkTipos,',')) {
				$this->auditoriasFK=$auditoria_detalleForeignKey->auditoriasFK;
				$this->idauditoriaDefaultFK=$auditoria_detalleForeignKey->idauditoriaDefaultFK;
			}

			if($auditoria_detalle_session->bitBusquedaDesdeFKSesionauditoria) {
				$this->setVisibleBusquedasParaauditoria(true);
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
	
	function cargarCombosFKFromReturnGeneral($auditoria_detalleReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$auditoria_detalleReturnGeneral->strRecargarFkTipos;
			
			


			if($auditoria_detalleReturnGeneral->con_auditoriasFK==true) {
				$this->auditoriasFK=$auditoria_detalleReturnGeneral->auditoriasFK;
				$this->idauditoriaDefaultFK=$auditoria_detalleReturnGeneral->idauditoriaDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(auditoria_detalle_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$auditoria_detalle_session=unserialize($this->Session->read(auditoria_detalle_util::$STR_SESSION_NAME));
		
		if($auditoria_detalle_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($auditoria_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==auditoria_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='auditoria';
			}
			
			$auditoria_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}						
			
			$this->auditoria_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->auditoria_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->auditoria_detallesAuxiliar=array();
			}
			
			if(count($this->auditoria_detallesAuxiliar) > 0) {
				
				foreach ($this->auditoria_detallesAuxiliar as $auditoria_detalleSeleccionado) {
					$this->eliminarTablaBase($auditoria_detalleSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
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
	
	
	
	public function getauditoriasFKListSelectItem() 
	{
		$auditoriasList=array();

		$item=null;

		foreach($this->auditoriasFK as $auditoria)
		{
			$item=new SelectItem();
			$item->setLabel($auditoria->getId());
			$item->setValue($auditoria->getId());
			$auditoriasList[]=$item;
		}

		return $auditoriasList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=auditoria_detalle_util::$INT_NUMERO_PAGINACION;
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
				$this->auditoria_detalleLogic->commitNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->rollbackNewConnexionToDeep();
				$this->auditoria_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$auditoria_detallesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->auditoria_detalles as $auditoria_detalleLocal) {
				if($auditoria_detalleLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->auditoria_detalle=new auditoria_detalle();
				
				$this->auditoria_detalle->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->auditoria_detalles[]=$this->auditoria_detalle;*/
				
				$auditoria_detallesNuevos[]=$this->auditoria_detalle;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('auditoria');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoria_detalleLogic->setauditoria_detalles($auditoria_detallesNuevos);
					
				$this->auditoria_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($auditoria_detallesNuevos as $auditoria_detalleNuevo) {
					$this->auditoria_detalles[]=$auditoria_detalleNuevo;
				}
				
				/*$this->auditoria_detalles[]=$auditoria_detallesNuevos;*/
				
				$this->auditoria_detalleLogic->setauditoria_detalles($this->auditoria_detalles);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($auditoria_detallesNuevos!=null);
	}
					
	
	public function cargarCombosauditoriasFK($connexion=null,$strRecargarFkQuery=''){
		$auditoriaLogic= new auditoria_logic();
		$pagination= new Pagination();
		$this->auditoriasFK=array();

		$auditoriaLogic->setConnexion($connexion);
		$auditoriaLogic->getauditoriaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$auditoria_detalle_session=unserialize($this->Session->read(auditoria_detalle_util::$STR_SESSION_NAME));

		if($auditoria_detalle_session==null) {
			$auditoria_detalle_session=new auditoria_detalle_session();
		}
		
		if($auditoria_detalle_session->bitBusquedaDesdeFKSesionauditoria!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=auditoria_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalauditoria=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalauditoria=Funciones::GetFinalQueryAppend($finalQueryGlobalauditoria, '');
				$finalQueryGlobalauditoria.=auditoria_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalauditoria.$strRecargarFkQuery;		

				$auditoriaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosauditoriasFK($auditoriaLogic->getauditorias());

		} else {
			$this->setVisibleBusquedasParaauditoria(true);


			if($auditoria_detalle_session->bigidauditoriaActual!=null && $auditoria_detalle_session->bigidauditoriaActual > 0) {
				$auditoriaLogic->getEntity($auditoria_detalle_session->bigidauditoriaActual);//WithConnection

				$this->auditoriasFK[$auditoriaLogic->getauditoria()->getId()]=auditoria_detalle_util::getauditoriaDescripcion($auditoriaLogic->getauditoria());
				$this->idauditoriaDefaultFK=$auditoriaLogic->getauditoria()->getId();
			}
		}
	}

	
	
	public function prepararCombosauditoriasFK($auditorias){

		foreach ($auditorias as $auditoriaLocal ) {
			if($this->idauditoriaDefaultFK==0) {
				$this->idauditoriaDefaultFK=$auditoriaLocal->getId();
			}

			$this->auditoriasFK[$auditoriaLocal->getId()]=auditoria_detalle_util::getauditoriaDescripcion($auditoriaLocal);
		}
	}

	
	
	public function cargarDescripcionauditoriaFK($idauditoria,$connexion=null){
		$auditoriaLogic= new auditoria_logic();
		$auditoriaLogic->setConnexion($connexion);
		$auditoriaLogic->getauditoriaDataAccess()->isForFKData=true;
		$strDescripcionauditoria='';

		if($idauditoria!=null && $idauditoria!='' && $idauditoria!='null') {
			if($connexion!=null) {
				$auditoriaLogic->getEntity($idauditoria);//WithConnection
			} else {
				$auditoriaLogic->getEntityWithConnection($idauditoria);//
			}

			$strDescripcionauditoria=auditoria_detalle_util::getauditoriaDescripcion($auditoriaLogic->getauditoria());

		} else {
			$strDescripcionauditoria='null';
		}

		return $strDescripcionauditoria;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(auditoria_detalle $auditoria_detalleClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParaauditoria($isParaauditoria){
		$strParaVisibleauditoria='display:table-row';
		$strParaVisibleNegacionauditoria='display:none';

		if($isParaauditoria) {
			$strParaVisibleauditoria='display:table-row';
			$strParaVisibleNegacionauditoria='display:none';
		} else {
			$strParaVisibleauditoria='display:none';
			$strParaVisibleNegacionauditoria='display:table-row';
		}


		$strParaVisibleNegacionauditoria=trim($strParaVisibleNegacionauditoria);

		$this->strVisibleBusquedaPorIdAuditoriaPorNombreCampo=$strParaVisibleauditoria;
		$this->strVisibleFK_Idauditoria=$strParaVisibleauditoria;
	}
	
	

	public function abrirBusquedaParaauditoria() {//$idauditoria_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idauditoria_detalleActual=$idauditoria_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.auditoria_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.auditoria_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_auditoria(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',auditoria_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.auditoria_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_auditoria(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(auditoria_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarauditoria_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(auditoria_detalle_util::$STR_SESSION_NAME,auditoria_detalle_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$auditoria_detalle_session=$this->Session->read(auditoria_detalle_util::$STR_SESSION_NAME);
				
		if($auditoria_detalle_session==null) {
			$auditoria_detalle_session=new auditoria_detalle_session();		
			//$this->Session->write('auditoria_detalle_session',$auditoria_detalle_session);							
		}
		*/
		
		$auditoria_detalle_session=new auditoria_detalle_session();
    	$auditoria_detalle_session->strPathNavegacionActual=auditoria_detalle_util::$STR_CLASS_WEB_TITULO;
    	$auditoria_detalle_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(auditoria_detalle_util::$STR_SESSION_NAME,serialize($auditoria_detalle_session));		
	}	
	
	public function getSetBusquedasSesionConfig(auditoria_detalle_session $auditoria_detalle_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($auditoria_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $auditoria_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
			if($auditoria_detalle_session->bigIdActualFK!=null && $auditoria_detalle_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$auditoria_detalle_session->bigIdActualFKParaPosibleAtras=$auditoria_detalle_session->bigIdActualFK;*/
			}
				
			$auditoria_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$auditoria_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(auditoria_detalle_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($auditoria_detalle_session->bitBusquedaDesdeFKSesionauditoria!=null && $auditoria_detalle_session->bitBusquedaDesdeFKSesionauditoria==true)
			{
				if($auditoria_detalle_session->bigidauditoriaActual!=0) {
					$this->strAccionBusqueda='FK_Idauditoria';

					$existe_history=HistoryWeb::ExisteElemento(auditoria_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(auditoria_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(auditoria_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($auditoria_detalle_session->bigidauditoriaActualDescripcion);
						$historyWeb->setIdActual($auditoria_detalle_session->bigidauditoriaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=auditoria_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$auditoria_detalle_session->bigidauditoriaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$auditoria_detalle_session->bitBusquedaDesdeFKSesionauditoria=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=auditoria_detalle_util::$INT_NUMERO_PAGINACION;

				if($auditoria_detalle_session->intNumeroPaginacion==auditoria_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=auditoria_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$auditoria_detalle_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$auditoria_detalle_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$auditoria_detalle_session=unserialize($this->Session->read(auditoria_detalle_util::$STR_SESSION_NAME));
		
		if($auditoria_detalle_session==null) {
			$auditoria_detalle_session=new auditoria_detalle_session();
		}
		
		$auditoria_detalle_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$auditoria_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$auditoria_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='BusquedaPorIdAuditoriaPorNombreCampo') {
			$auditoria_detalle_session->id_auditoria=$this->id_auditoriaBusquedaPorIdAuditoriaPorNombreCampo;	
			$auditoria_detalle_session->nombre_campo=$this->nombre_campoBusquedaPorIdAuditoriaPorNombreCampo;	

		}
		else if($this->strAccionBusqueda=='FK_Idauditoria') {
			$auditoria_detalle_session->id_auditoria=$this->id_auditoriaFK_Idauditoria;	

		}
		
		$this->Session->write(auditoria_detalle_util::$STR_SESSION_NAME,serialize($auditoria_detalle_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(auditoria_detalle_session $auditoria_detalle_session) {
		
		if($auditoria_detalle_session==null) {
			$auditoria_detalle_session=unserialize($this->Session->read(auditoria_detalle_util::$STR_SESSION_NAME));
		}
		
		if($auditoria_detalle_session==null) {
		   $auditoria_detalle_session=new auditoria_detalle_session();
		}
		
		if($auditoria_detalle_session->strUltimaBusqueda!=null && $auditoria_detalle_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$auditoria_detalle_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$auditoria_detalle_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$auditoria_detalle_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='BusquedaPorIdAuditoriaPorNombreCampo') {
				$this->id_auditoriaBusquedaPorIdAuditoriaPorNombreCampo=$auditoria_detalle_session->id_auditoria;
				$auditoria_detalle_session->id_auditoria=-1;
				$this->nombre_campoBusquedaPorIdAuditoriaPorNombreCampo=$auditoria_detalle_session->nombre_campo;
				$auditoria_detalle_session->nombre_campo='';

			}
			 else if($this->strAccionBusqueda=='FK_Idauditoria') {
				$this->id_auditoriaFK_Idauditoria=$auditoria_detalle_session->id_auditoria;
				$auditoria_detalle_session->id_auditoria=-1;

			}
		}
		
		$auditoria_detalle_session->strUltimaBusqueda='';
		//$auditoria_detalle_session->intNumeroPaginacion=10;
		$auditoria_detalle_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(auditoria_detalle_util::$STR_SESSION_NAME,serialize($auditoria_detalle_session));		
	}
	
	public function auditoria_detallesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idauditoriaDefaultFK = 0;
	}
	
	public function setauditoria_detalleFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_auditoria',$this->idauditoriaDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		auditoria::$class;
		auditoria_carga::$CONTROLLER;
		
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
		interface auditoria_detalle_controlI {	
		
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
		
		public function onLoad(auditoria_detalle_session $auditoria_detalle_session=null);	
		function index(?string $strTypeOnLoadauditoria_detalle='',?string $strTipoPaginaAuxiliarauditoria_detalle='',?string $strTipoUsuarioAuxiliarauditoria_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadauditoria_detalle='',string $strTipoPaginaAuxiliarauditoria_detalle='',string $strTipoUsuarioAuxiliarauditoria_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($auditoria_detalleReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(auditoria_detalle $auditoria_detalleClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(auditoria_detalle_session $auditoria_detalle_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(auditoria_detalle_session $auditoria_detalle_session);	
		public function auditoria_detallesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setauditoria_detalleFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
