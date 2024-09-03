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

namespace com\bydan\contabilidad\contabilidad\cierre_contable_detalle\presentation\control;

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

use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\business\entity\cierre_contable_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cierre_contable_detalle/util/cierre_contable_detalle_carga.php');
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util\cierre_contable_detalle_carga;

use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util\cierre_contable_detalle_util;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util\cierre_contable_detalle_param_return;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\business\logic\cierre_contable_detalle_logic;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\presentation\session\cierre_contable_detalle_session;


//FK


use com\bydan\contabilidad\contabilidad\cierre_contable\business\entity\cierre_contable;
use com\bydan\contabilidad\contabilidad\cierre_contable\business\logic\cierre_contable_logic;
use com\bydan\contabilidad\contabilidad\cierre_contable\util\cierre_contable_carga;
use com\bydan\contabilidad\contabilidad\cierre_contable\util\cierre_contable_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
cierre_contable_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cierre_contable_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cierre_contable_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cierre_contable_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cierre_contable_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/contabilidad/cierre_contable_detalle/presentation/control/cierre_contable_detalle_init_control.php');
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\presentation\control\cierre_contable_detalle_init_control;

include_once('com/bydan/contabilidad/contabilidad/cierre_contable_detalle/presentation/control/cierre_contable_detalle_base_control.php');
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\presentation\control\cierre_contable_detalle_base_control;

class cierre_contable_detalle_control extends cierre_contable_detalle_base_control {	
	
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
			
			
			else if($action=="FK_Idcierre_contable"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcierre_contableParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParacierre_contable') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcierre_contable_detalleActual=$this->getDataId();
				$this->abrirBusquedaParacierre_contable();//$idcierre_contable_detalleActual
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
					
					$cierre_contable_detalleController = new cierre_contable_detalle_control();
					
					$cierre_contable_detalleController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($cierre_contable_detalleController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$cierre_contable_detalleController = new cierre_contable_detalle_control();
						$cierre_contable_detalleController = $this;
						
						$jsonResponse = json_encode($cierre_contable_detalleController->cierre_contable_detalles);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->cierre_contable_detalleReturnGeneral==null) {
					$this->cierre_contable_detalleReturnGeneral=new cierre_contable_detalle_param_return();
				}
				
				echo($this->cierre_contable_detalleReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$cierre_contable_detalleController=new cierre_contable_detalle_control();
		
		$cierre_contable_detalleController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$cierre_contable_detalleController->usuarioActual=new usuario();
		
		$cierre_contable_detalleController->usuarioActual->setId($this->usuarioActual->getId());
		$cierre_contable_detalleController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$cierre_contable_detalleController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$cierre_contable_detalleController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$cierre_contable_detalleController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$cierre_contable_detalleController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$cierre_contable_detalleController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$cierre_contable_detalleController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $cierre_contable_detalleController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadcierre_contable_detalle= $this->getDataGeneralString('strTypeOnLoadcierre_contable_detalle');
		$strTipoPaginaAuxiliarcierre_contable_detalle= $this->getDataGeneralString('strTipoPaginaAuxiliarcierre_contable_detalle');
		$strTipoUsuarioAuxiliarcierre_contable_detalle= $this->getDataGeneralString('strTipoUsuarioAuxiliarcierre_contable_detalle');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadcierre_contable_detalle,$strTipoPaginaAuxiliarcierre_contable_detalle,$strTipoUsuarioAuxiliarcierre_contable_detalle,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadcierre_contable_detalle!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('cierre_contable_detalle','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cierre_contable_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcierre_contable_detalle,$this->strTipoUsuarioAuxiliarcierre_contable_detalle,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cierre_contable_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcierre_contable_detalle,$this->strTipoUsuarioAuxiliarcierre_contable_detalle,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->cierre_contable_detalleReturnGeneral=new cierre_contable_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cierre_contable_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cierre_contable_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cierre_contable_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cierre_contable_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cierre_contable_detalleReturnGeneral);
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
		$this->cierre_contable_detalleReturnGeneral=new cierre_contable_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cierre_contable_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cierre_contable_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cierre_contable_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cierre_contable_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cierre_contable_detalleReturnGeneral);
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
		$this->cierre_contable_detalleReturnGeneral=new cierre_contable_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cierre_contable_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cierre_contable_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cierre_contable_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cierre_contable_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cierre_contable_detalleReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
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
			
			
			$this->cierre_contable_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->cierre_contable_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cierre_contable_detalleReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->cierre_contable_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->cierre_contable_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cierre_contable_detalleReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->cierre_contable_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->cierre_contable_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->cierre_contable_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cierre_contable_detalleReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->cierre_contable_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cierre_contable_detalleReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->cierre_contable_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->cierre_contable_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->cierre_contable_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cierre_contable_detalleReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->cierre_contable_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cierre_contable_detalleReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
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
		
		$this->cierre_contable_detalleLogic=new cierre_contable_detalle_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->cierre_contable_detalle=new cierre_contable_detalle();
		
		$this->strTypeOnLoadcierre_contable_detalle='onload';
		$this->strTipoPaginaAuxiliarcierre_contable_detalle='none';
		$this->strTipoUsuarioAuxiliarcierre_contable_detalle='none';	

		$this->intNumeroPaginacion=cierre_contable_detalle_util::$INT_NUMERO_PAGINACION;
		
		$this->cierre_contable_detalleModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cierre_contable_detalleControllerAdditional=new cierre_contable_detalle_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(cierre_contable_detalle_session $cierre_contable_detalle_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($cierre_contable_detalle_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadcierre_contable_detalle='',?string $strTipoPaginaAuxiliarcierre_contable_detalle='',?string $strTipoUsuarioAuxiliarcierre_contable_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadcierre_contable_detalle=$strTypeOnLoadcierre_contable_detalle;
			$this->strTipoPaginaAuxiliarcierre_contable_detalle=$strTipoPaginaAuxiliarcierre_contable_detalle;
			$this->strTipoUsuarioAuxiliarcierre_contable_detalle=$strTipoUsuarioAuxiliarcierre_contable_detalle;
	
			if($strTipoUsuarioAuxiliarcierre_contable_detalle=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->cierre_contable_detalle=new cierre_contable_detalle();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Cierre Detalles';
			
			
			$cierre_contable_detalle_session=unserialize($this->Session->read(cierre_contable_detalle_util::$STR_SESSION_NAME));
							
			if($cierre_contable_detalle_session==null) {
				$cierre_contable_detalle_session=new cierre_contable_detalle_session();
				
				/*$this->Session->write('cierre_contable_detalle_session',$cierre_contable_detalle_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($cierre_contable_detalle_session->strFuncionJsPadre!=null && $cierre_contable_detalle_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$cierre_contable_detalle_session->strFuncionJsPadre;
				
				$cierre_contable_detalle_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($cierre_contable_detalle_session);
			
			if($strTypeOnLoadcierre_contable_detalle!=null && $strTypeOnLoadcierre_contable_detalle=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$cierre_contable_detalle_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$cierre_contable_detalle_session->setPaginaPopupVariables(true);
				}
				
				if($cierre_contable_detalle_session->intNumeroPaginacion==cierre_contable_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cierre_contable_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cierre_contable_detalle_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,cierre_contable_detalle_util::$STR_SESSION_NAME,'contabilidad');																
			
			} else if($strTypeOnLoadcierre_contable_detalle!=null && $strTypeOnLoadcierre_contable_detalle=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$cierre_contable_detalle_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=cierre_contable_detalle_util::$INT_NUMERO_PAGINACION;*/
				
				if($cierre_contable_detalle_session->intNumeroPaginacion==cierre_contable_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cierre_contable_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cierre_contable_detalle_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarcierre_contable_detalle!=null && $strTipoPaginaAuxiliarcierre_contable_detalle=='none') {
				/*$cierre_contable_detalle_session->strStyleDivHeader='display:table-row';*/
				
				/*$cierre_contable_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarcierre_contable_detalle!=null && $strTipoPaginaAuxiliarcierre_contable_detalle=='iframe') {
					/*
					$cierre_contable_detalle_session->strStyleDivArbol='display:none';
					$cierre_contable_detalle_session->strStyleDivHeader='display:none';
					$cierre_contable_detalle_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$cierre_contable_detalle_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->cierre_contable_detalleClase=new cierre_contable_detalle();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=cierre_contable_detalle_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(cierre_contable_detalle_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->cierre_contable_detalleLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->cierre_contable_detalleLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->cierre_contable_detalleLogic=new cierre_contable_detalle_logic();*/
			
			
			$this->cierre_contable_detallesModel=null;
			/*new ListDataModel();*/
			
			/*$this->cierre_contable_detallesModel.setWrappedData(cierre_contable_detalleLogic->getcierre_contable_detalles());*/
						
			$this->cierre_contable_detalles= array();
			$this->cierre_contable_detallesEliminados=array();
			$this->cierre_contable_detallesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= cierre_contable_detalle_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->cierre_contable_detalle= new cierre_contable_detalle();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcierre_contable='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarcierre_contable_detalle!=null && $strTipoUsuarioAuxiliarcierre_contable_detalle!='none' && $strTipoUsuarioAuxiliarcierre_contable_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcierre_contable_detalle);
																
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
				if($strTipoUsuarioAuxiliarcierre_contable_detalle!=null && $strTipoUsuarioAuxiliarcierre_contable_detalle!='none' && $strTipoUsuarioAuxiliarcierre_contable_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcierre_contable_detalle);
																
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
				if($strTipoUsuarioAuxiliarcierre_contable_detalle==null || $strTipoUsuarioAuxiliarcierre_contable_detalle=='none' || $strTipoUsuarioAuxiliarcierre_contable_detalle=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarcierre_contable_detalle,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cierre_contable_detalle_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cierre_contable_detalle_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina cierre_contable_detalle');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($cierre_contable_detalle_session);
			
			$this->getSetBusquedasSesionConfig($cierre_contable_detalle_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportecierre_contable_detalles($this->strAccionBusqueda,$this->cierre_contable_detalleLogic->getcierre_contable_detalles());*/
				} else if($this->strGenerarReporte=='Html')	{
					$cierre_contable_detalle_session->strServletGenerarHtmlReporte='cierre_contable_detalleServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(cierre_contable_detalle_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(cierre_contable_detalle_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($cierre_contable_detalle_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$cierre_contable_detalle_session=unserialize($this->Session->read(cierre_contable_detalle_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarcierre_contable_detalle!=null && $strTipoUsuarioAuxiliarcierre_contable_detalle=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($cierre_contable_detalle_session);
			}
								
			$this->set(cierre_contable_detalle_util::$STR_SESSION_NAME, $cierre_contable_detalle_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($cierre_contable_detalle_session);
			
			/*
			$this->cierre_contable_detalle->recursive = 0;
			
			$this->cierre_contable_detalles=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('cierre_contable_detalles', $this->cierre_contable_detalles);
			
			$this->set(cierre_contable_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->cierre_contable_detalleActual =$this->cierre_contable_detalleClase;
			
			/*$this->cierre_contable_detalleActual =$this->migrarModelcierre_contable_detalle($this->cierre_contable_detalleClase);*/
			
			$this->returnHtml(false);
			
			$this->set(cierre_contable_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=cierre_contable_detalle_util::$STR_NOMBRE_OPCION;
				
			if(cierre_contable_detalle_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=cierre_contable_detalle_util::$STR_MODULO_OPCION.cierre_contable_detalle_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(cierre_contable_detalle_util::$STR_SESSION_NAME,serialize($cierre_contable_detalle_session));
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
			/*$cierre_contable_detalleClase= (cierre_contable_detalle) cierre_contable_detallesModel.getRowData();*/
			
			$this->cierre_contable_detalleClase->setId($this->cierre_contable_detalle->getId());	
			$this->cierre_contable_detalleClase->setVersionRow($this->cierre_contable_detalle->getVersionRow());	
			$this->cierre_contable_detalleClase->setVersionRow($this->cierre_contable_detalle->getVersionRow());	
			$this->cierre_contable_detalleClase->setid_detalle($this->cierre_contable_detalle->getid_detalle());	
			$this->cierre_contable_detalleClase->setid_cierre_contable($this->cierre_contable_detalle->getid_cierre_contable());	
			$this->cierre_contable_detalleClase->setnro_documento($this->cierre_contable_detalle->getnro_documento());	
			$this->cierre_contable_detalleClase->settipo_factura($this->cierre_contable_detalle->gettipo_factura());	
			$this->cierre_contable_detalleClase->setmonto($this->cierre_contable_detalle->getmonto());	
		
			/*$this->Session->write('cierre_contable_detalleVersionRowActual', cierre_contable_detalle.getVersionRow());*/
			
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
			
			$cierre_contable_detalle_session=unserialize($this->Session->read(cierre_contable_detalle_util::$STR_SESSION_NAME));
						
			if($cierre_contable_detalle_session==null) {
				$cierre_contable_detalle_session=new cierre_contable_detalle_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('cierre_contable_detalle', $this->cierre_contable_detalle->read(null, $id));
	
			
			$this->cierre_contable_detalle->recursive = 0;
			
			$this->cierre_contable_detalles=$this->paginate();
			
			$this->set('cierre_contable_detalles', $this->cierre_contable_detalles);
	
			if (empty($this->data)) {
				$this->data = $this->cierre_contable_detalle->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->cierre_contable_detalleLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cierre_contable_detalleClase);
			
			$this->cierre_contable_detalleActual=$this->cierre_contable_detalleClase;
			
			/*$this->cierre_contable_detalleActual =$this->migrarModelcierre_contable_detalle($this->cierre_contable_detalleClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cierre_contable_detalleLogic->getcierre_contable_detalles(),$this->cierre_contable_detalleActual);
			
			$this->actualizarControllerConReturnGeneral($this->cierre_contable_detalleReturnGeneral);
			
			//$this->cierre_contable_detalleReturnGeneral=$this->cierre_contable_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cierre_contable_detalleLogic->getcierre_contable_detalles(),$this->cierre_contable_detalleActual,$this->cierre_contable_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$cierre_contable_detalle_session=unserialize($this->Session->read(cierre_contable_detalle_util::$STR_SESSION_NAME));
						
			if($cierre_contable_detalle_session==null) {
				$cierre_contable_detalle_session=new cierre_contable_detalle_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevocierre_contable_detalle', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->cierre_contable_detalleClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cierre_contable_detalleClase);
			
			$this->cierre_contable_detalleActual =$this->cierre_contable_detalleClase;
			
			/*$this->cierre_contable_detalleActual =$this->migrarModelcierre_contable_detalle($this->cierre_contable_detalleClase);*/
			
			$this->setcierre_contable_detalleFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cierre_contable_detalleLogic->getcierre_contable_detalles(),$this->cierre_contable_detalle);
			
			$this->actualizarControllerConReturnGeneral($this->cierre_contable_detalleReturnGeneral);
			
			//this->cierre_contable_detalleReturnGeneral=$this->cierre_contable_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cierre_contable_detalleLogic->getcierre_contable_detalles(),$this->cierre_contable_detalle,$this->cierre_contable_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idcierre_contableDefaultFK!=null && $this->idcierre_contableDefaultFK > -1) {
				$this->cierre_contable_detalleReturnGeneral->getcierre_contable_detalle()->setid_cierre_contable($this->idcierre_contableDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->cierre_contable_detalleReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->cierre_contable_detalleReturnGeneral->getcierre_contable_detalle(),$this->cierre_contable_detalleActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeycierre_contable_detalle($this->cierre_contable_detalleReturnGeneral->getcierre_contable_detalle());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariocierre_contable_detalle($this->cierre_contable_detalleReturnGeneral->getcierre_contable_detalle());*/
			}
			
			if($this->cierre_contable_detalleReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cierre_contable_detalleReturnGeneral->getcierre_contable_detalle(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualcierre_contable_detalle($this->cierre_contable_detalle,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->cierre_contable_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cierre_contable_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->cierre_contable_detallesAuxiliar=array();
			}
			
			if(count($this->cierre_contable_detallesAuxiliar)==2) {
				$cierre_contable_detalleOrigen=$this->cierre_contable_detallesAuxiliar[0];
				$cierre_contable_detalleDestino=$this->cierre_contable_detallesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($cierre_contable_detalleOrigen,$cierre_contable_detalleDestino,true,false,false);
				
				$this->actualizarLista($cierre_contable_detalleDestino,$this->cierre_contable_detalles);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->cierre_contable_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cierre_contable_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cierre_contable_detallesAuxiliar=array();
			}
			
			if(count($this->cierre_contable_detallesAuxiliar) > 0) {
				foreach ($this->cierre_contable_detallesAuxiliar as $cierre_contable_detalleSeleccionado) {
					$this->cierre_contable_detalle=new cierre_contable_detalle();
					
					$this->setCopiarVariablesObjetos($cierre_contable_detalleSeleccionado,$this->cierre_contable_detalle,true,true,false);
						
					$this->cierre_contable_detalles[]=$this->cierre_contable_detalle;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->cierre_contable_detallesEliminados as $cierre_contable_detalleEliminado) {
				$this->cierre_contable_detalleLogic->cierre_contable_detalles[]=$cierre_contable_detalleEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->cierre_contable_detalle=new cierre_contable_detalle();
							
				$this->cierre_contable_detalles[]=$this->cierre_contable_detalle;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
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
		
		$cierre_contable_detalleActual=new cierre_contable_detalle();
		
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
				
				$cierre_contable_detalleActual=$this->cierre_contable_detalles[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cierre_contable_detalleActual->setid_detalle((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cierre_contable_detalleActual->setid_cierre_contable((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cierre_contable_detalleActual->setnro_documento($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cierre_contable_detalleActual->settipo_factura($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cierre_contable_detalleActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
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
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cierre_contable_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadcierre_contable_detalle='',string $strTipoPaginaAuxiliarcierre_contable_detalle='',string $strTipoUsuarioAuxiliarcierre_contable_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadcierre_contable_detalle,$strTipoPaginaAuxiliarcierre_contable_detalle,$strTipoUsuarioAuxiliarcierre_contable_detalle,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->cierre_contable_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=cierre_contable_detalle_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=cierre_contable_detalle_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=cierre_contable_detalle_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$cierre_contable_detalle_session=unserialize($this->Session->read(cierre_contable_detalle_util::$STR_SESSION_NAME));
						
			if($cierre_contable_detalle_session==null) {
				$cierre_contable_detalle_session=new cierre_contable_detalle_session();
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
					/*$this->intNumeroPaginacion=cierre_contable_detalle_util::$INT_NUMERO_PAGINACION;*/
					
					if($cierre_contable_detalle_session->intNumeroPaginacion==cierre_contable_detalle_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=cierre_contable_detalle_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$cierre_contable_detalle_session->intNumeroPaginacion;
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
			
			$this->cierre_contable_detallesEliminados=array();
			
			/*$this->cierre_contable_detalleLogic->setConnexion($connexion);*/
			
			$this->cierre_contable_detalleLogic->setIsConDeep(true);
			
			$this->cierre_contable_detalleLogic->getcierre_contable_detalleDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('cierre_contable');$classes[]=$class;
			
			$this->cierre_contable_detalleLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cierre_contable_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->cierre_contable_detalleLogic->getcierre_contable_detalles()==null|| count($this->cierre_contable_detalleLogic->getcierre_contable_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cierre_contable_detalles=$this->cierre_contable_detalleLogic->getcierre_contable_detalles();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cierre_contable_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->cierre_contable_detallesReporte=$this->cierre_contable_detalleLogic->getcierre_contable_detalles();
									
						/*$this->generarReportes('Todos',$this->cierre_contable_detalleLogic->getcierre_contable_detalles());*/
					
						$this->cierre_contable_detalleLogic->setcierre_contable_detalles($this->cierre_contable_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cierre_contable_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->cierre_contable_detalleLogic->getcierre_contable_detalles()==null|| count($this->cierre_contable_detalleLogic->getcierre_contable_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cierre_contable_detalles=$this->cierre_contable_detalleLogic->getcierre_contable_detalles();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cierre_contable_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->cierre_contable_detallesReporte=$this->cierre_contable_detalleLogic->getcierre_contable_detalles();
									
						/*$this->generarReportes('Todos',$this->cierre_contable_detalleLogic->getcierre_contable_detalles());*/
					
						$this->cierre_contable_detalleLogic->setcierre_contable_detalles($this->cierre_contable_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idcierre_contable_detalle=0;*/
				
				if($cierre_contable_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $cierre_contable_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
					if($cierre_contable_detalle_session->bigIdActualFK!=null && $cierre_contable_detalle_session->bigIdActualFK!=0)	{
						$this->idcierre_contable_detalle=$cierre_contable_detalle_session->bigIdActualFK;	
					}
					
					$cierre_contable_detalle_session->bitBusquedaDesdeFKSesionFK=false;
					
					$cierre_contable_detalle_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idcierre_contable_detalle=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idcierre_contable_detalle=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cierre_contable_detalleLogic->getEntity($this->idcierre_contable_detalle);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*cierre_contable_detalleLogicAdditional::getDetalleIndicePorId($idcierre_contable_detalle);*/

				
				if($this->cierre_contable_detalleLogic->getcierre_contable_detalle()!=null) {
					$this->cierre_contable_detalleLogic->setcierre_contable_detalles(array());
					$this->cierre_contable_detalleLogic->cierre_contable_detalles[]=$this->cierre_contable_detalleLogic->getcierre_contable_detalle();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcierre_contable')
			{

				if($cierre_contable_detalle_session->bigidcierre_contableActual!=null && $cierre_contable_detalle_session->bigidcierre_contableActual!=0)
				{
					$this->id_cierre_contableFK_Idcierre_contable=$cierre_contable_detalle_session->bigidcierre_contableActual;
					$cierre_contable_detalle_session->bigidcierre_contableActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cierre_contable_detalleLogic->getsFK_Idcierre_contable($finalQueryPaginacion,$this->pagination,$this->id_cierre_contableFK_Idcierre_contable);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cierre_contable_detalleLogicAdditional::getDetalleIndiceFK_Idcierre_contable($this->id_cierre_contableFK_Idcierre_contable);


					if($this->cierre_contable_detalleLogic->getcierre_contable_detalles()==null || count($this->cierre_contable_detalleLogic->getcierre_contable_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cierre_contable_detalles=$this->cierre_contable_detalleLogic->getcierre_contable_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cierre_contable_detalleLogic->getsFK_Idcierre_contable('',$this->pagination,$this->id_cierre_contableFK_Idcierre_contable);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cierre_contable_detallesReporte=$this->cierre_contable_detalleLogic->getcierre_contable_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecierre_contable_detalles("FK_Idcierre_contable",$this->cierre_contable_detalleLogic->getcierre_contable_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cierre_contable_detalleLogic->setcierre_contable_detalles($cierre_contable_detalles);
					}
				//}

			} 
		
		$cierre_contable_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cierre_contable_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->cierre_contable_detalleLogic->loadForeignsKeysDescription();*/
		
		$this->cierre_contable_detalles=$this->cierre_contable_detalleLogic->getcierre_contable_detalles();
		
		if($this->cierre_contable_detallesEliminados==null) {
			$this->cierre_contable_detallesEliminados=array();
		}
		
		$this->Session->write(cierre_contable_detalle_util::$STR_SESSION_NAME.'Lista',serialize($this->cierre_contable_detalles));
		$this->Session->write(cierre_contable_detalle_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cierre_contable_detallesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(cierre_contable_detalle_util::$STR_SESSION_NAME,serialize($cierre_contable_detalle_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idcierre_contable_detalle=$idGeneral;
			
			$this->intNumeroPaginacion=cierre_contable_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
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
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
			}

			if(count($this->cierre_contable_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Idcierre_contableParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cierre_contable_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cierre_contableFK_Idcierre_contable=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcierre_contable','cmbid_cierre_contable');

			$this->strAccionBusqueda='FK_Idcierre_contable';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcierre_contable($strFinalQuery,$id_cierre_contable)
	{
		try
		{

			$this->cierre_contable_detalleLogic->getsFK_Idcierre_contable($strFinalQuery,new Pagination(),$id_cierre_contable);
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
			
			
			$cierre_contable_detalleForeignKey=new cierre_contable_detalle_param_return(); //cierre_contable_detalleForeignKey();
			
			$cierre_contable_detalle_session=unserialize($this->Session->read(cierre_contable_detalle_util::$STR_SESSION_NAME));
						
			if($cierre_contable_detalle_session==null) {
				$cierre_contable_detalle_session=new cierre_contable_detalle_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$cierre_contable_detalleForeignKey=$this->cierre_contable_detalleLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$cierre_contable_detalle_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cierre_contable',$this->strRecargarFkTipos,',')) {
				$this->cierre_contablesFK=$cierre_contable_detalleForeignKey->cierre_contablesFK;
				$this->idcierre_contableDefaultFK=$cierre_contable_detalleForeignKey->idcierre_contableDefaultFK;
			}

			if($cierre_contable_detalle_session->bitBusquedaDesdeFKSesioncierre_contable) {
				$this->setVisibleBusquedasParacierre_contable(true);
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
	
	function cargarCombosFKFromReturnGeneral($cierre_contable_detalleReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$cierre_contable_detalleReturnGeneral->strRecargarFkTipos;
			
			


			if($cierre_contable_detalleReturnGeneral->con_cierre_contablesFK==true) {
				$this->cierre_contablesFK=$cierre_contable_detalleReturnGeneral->cierre_contablesFK;
				$this->idcierre_contableDefaultFK=$cierre_contable_detalleReturnGeneral->idcierre_contableDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(cierre_contable_detalle_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$cierre_contable_detalle_session=unserialize($this->Session->read(cierre_contable_detalle_util::$STR_SESSION_NAME));
		
		if($cierre_contable_detalle_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($cierre_contable_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cierre_contable_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cierre_contable';
			}
			
			$cierre_contable_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
			}						
			
			$this->cierre_contable_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cierre_contable_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cierre_contable_detallesAuxiliar=array();
			}
			
			if(count($this->cierre_contable_detallesAuxiliar) > 0) {
				
				foreach ($this->cierre_contable_detallesAuxiliar as $cierre_contable_detalleSeleccionado) {
					$this->eliminarTablaBase($cierre_contable_detalleSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
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
	
	
	
	public function getcierre_contablesFKListSelectItem() 
	{
		$cierre_contablesList=array();

		$item=null;

		foreach($this->cierre_contablesFK as $cierre_contable)
		{
			$item=new SelectItem();
			$item->setLabel($cierre_contable>getId());
			$item->setValue($cierre_contable->getId());
			$cierre_contablesList[]=$item;
		}

		return $cierre_contablesList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cierre_contable_detalle_util::$INT_NUMERO_PAGINACION;
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
				$this->cierre_contable_detalleLogic->commitNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->rollbackNewConnexionToDeep();
				$this->cierre_contable_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$cierre_contable_detallesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->cierre_contable_detalles as $cierre_contable_detalleLocal) {
				if($cierre_contable_detalleLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->cierre_contable_detalle=new cierre_contable_detalle();
				
				$this->cierre_contable_detalle->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->cierre_contable_detalles[]=$this->cierre_contable_detalle;*/
				
				$cierre_contable_detallesNuevos[]=$this->cierre_contable_detalle;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('cierre_contable');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contable_detalleLogic->setcierre_contable_detalles($cierre_contable_detallesNuevos);
					
				$this->cierre_contable_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($cierre_contable_detallesNuevos as $cierre_contable_detalleNuevo) {
					$this->cierre_contable_detalles[]=$cierre_contable_detalleNuevo;
				}
				
				/*$this->cierre_contable_detalles[]=$cierre_contable_detallesNuevos;*/
				
				$this->cierre_contable_detalleLogic->setcierre_contable_detalles($this->cierre_contable_detalles);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($cierre_contable_detallesNuevos!=null);
	}
					
	
	public function cargarComboscierre_contablesFK($connexion=null,$strRecargarFkQuery=''){
		$cierre_contableLogic= new cierre_contable_logic();
		$pagination= new Pagination();
		$this->cierre_contablesFK=array();

		$cierre_contableLogic->setConnexion($connexion);
		$cierre_contableLogic->getcierre_contableDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cierre_contable_detalle_session=unserialize($this->Session->read(cierre_contable_detalle_util::$STR_SESSION_NAME));

		if($cierre_contable_detalle_session==null) {
			$cierre_contable_detalle_session=new cierre_contable_detalle_session();
		}
		
		if($cierre_contable_detalle_session->bitBusquedaDesdeFKSesioncierre_contable!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cierre_contable_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcierre_contable=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcierre_contable=Funciones::GetFinalQueryAppend($finalQueryGlobalcierre_contable, '');
				$finalQueryGlobalcierre_contable.=cierre_contable_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcierre_contable.$strRecargarFkQuery;		

				$cierre_contableLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscierre_contablesFK($cierre_contableLogic->getcierre_contables());

		} else {
			$this->setVisibleBusquedasParacierre_contable(true);


			if($cierre_contable_detalle_session->bigidcierre_contableActual!=null && $cierre_contable_detalle_session->bigidcierre_contableActual > 0) {
				$cierre_contableLogic->getEntity($cierre_contable_detalle_session->bigidcierre_contableActual);//WithConnection

				$this->cierre_contablesFK[$cierre_contableLogic->getcierre_contable()->getId()]=cierre_contable_detalle_util::getcierre_contableDescripcion($cierre_contableLogic->getcierre_contable());
				$this->idcierre_contableDefaultFK=$cierre_contableLogic->getcierre_contable()->getId();
			}
		}
	}

	
	
	public function prepararComboscierre_contablesFK($cierre_contables){

		foreach ($cierre_contables as $cierre_contableLocal ) {
			if($this->idcierre_contableDefaultFK==0) {
				$this->idcierre_contableDefaultFK=$cierre_contableLocal->getId();
			}

			$this->cierre_contablesFK[$cierre_contableLocal->getId()]=cierre_contable_detalle_util::getcierre_contableDescripcion($cierre_contableLocal);
		}
	}

	
	
	public function cargarDescripcioncierre_contableFK($idcierre_contable,$connexion=null){
		$cierre_contableLogic= new cierre_contable_logic();
		$cierre_contableLogic->setConnexion($connexion);
		$cierre_contableLogic->getcierre_contableDataAccess()->isForFKData=true;
		$strDescripcioncierre_contable='';

		if($idcierre_contable!=null && $idcierre_contable!='' && $idcierre_contable!='null') {
			if($connexion!=null) {
				$cierre_contableLogic->getEntity($idcierre_contable);//WithConnection
			} else {
				$cierre_contableLogic->getEntityWithConnection($idcierre_contable);//
			}

			$strDescripcioncierre_contable=cierre_contable_detalle_util::getcierre_contableDescripcion($cierre_contableLogic->getcierre_contable());

		} else {
			$strDescripcioncierre_contable='null';
		}

		return $strDescripcioncierre_contable;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(cierre_contable_detalle $cierre_contable_detalleClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParacierre_contable($isParacierre_contable){
		$strParaVisiblecierre_contable='display:table-row';
		$strParaVisibleNegacioncierre_contable='display:none';

		if($isParacierre_contable) {
			$strParaVisiblecierre_contable='display:table-row';
			$strParaVisibleNegacioncierre_contable='display:none';
		} else {
			$strParaVisiblecierre_contable='display:none';
			$strParaVisibleNegacioncierre_contable='display:table-row';
		}


		$strParaVisibleNegacioncierre_contable=trim($strParaVisibleNegacioncierre_contable);

		$this->strVisibleFK_Idcierre_contable=$strParaVisiblecierre_contable;
	}
	
	

	public function abrirBusquedaParacierre_contable() {//$idcierre_contable_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcierre_contable_detalleActual=$idcierre_contable_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cierre_contable_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cierre_contable_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cierre_contable(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cierre_contable_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cierre_contable_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cierre_contable(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cierre_contable_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcierre_contable_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(cierre_contable_detalle_util::$STR_SESSION_NAME,cierre_contable_detalle_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$cierre_contable_detalle_session=$this->Session->read(cierre_contable_detalle_util::$STR_SESSION_NAME);
				
		if($cierre_contable_detalle_session==null) {
			$cierre_contable_detalle_session=new cierre_contable_detalle_session();		
			//$this->Session->write('cierre_contable_detalle_session',$cierre_contable_detalle_session);							
		}
		*/
		
		$cierre_contable_detalle_session=new cierre_contable_detalle_session();
    	$cierre_contable_detalle_session->strPathNavegacionActual=cierre_contable_detalle_util::$STR_CLASS_WEB_TITULO;
    	$cierre_contable_detalle_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(cierre_contable_detalle_util::$STR_SESSION_NAME,serialize($cierre_contable_detalle_session));		
	}	
	
	public function getSetBusquedasSesionConfig(cierre_contable_detalle_session $cierre_contable_detalle_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($cierre_contable_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $cierre_contable_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
			if($cierre_contable_detalle_session->bigIdActualFK!=null && $cierre_contable_detalle_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$cierre_contable_detalle_session->bigIdActualFKParaPosibleAtras=$cierre_contable_detalle_session->bigIdActualFK;*/
			}
				
			$cierre_contable_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$cierre_contable_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(cierre_contable_detalle_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($cierre_contable_detalle_session->bitBusquedaDesdeFKSesioncierre_contable!=null && $cierre_contable_detalle_session->bitBusquedaDesdeFKSesioncierre_contable==true)
			{
				if($cierre_contable_detalle_session->bigidcierre_contableActual!=0) {
					$this->strAccionBusqueda='FK_Idcierre_contable';

					$existe_history=HistoryWeb::ExisteElemento(cierre_contable_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cierre_contable_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cierre_contable_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cierre_contable_detalle_session->bigidcierre_contableActualDescripcion);
						$historyWeb->setIdActual($cierre_contable_detalle_session->bigidcierre_contableActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cierre_contable_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cierre_contable_detalle_session->bigidcierre_contableActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cierre_contable_detalle_session->bitBusquedaDesdeFKSesioncierre_contable=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cierre_contable_detalle_util::$INT_NUMERO_PAGINACION;

				if($cierre_contable_detalle_session->intNumeroPaginacion==cierre_contable_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cierre_contable_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cierre_contable_detalle_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$cierre_contable_detalle_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$cierre_contable_detalle_session=unserialize($this->Session->read(cierre_contable_detalle_util::$STR_SESSION_NAME));
		
		if($cierre_contable_detalle_session==null) {
			$cierre_contable_detalle_session=new cierre_contable_detalle_session();
		}
		
		$cierre_contable_detalle_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$cierre_contable_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cierre_contable_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcierre_contable') {
			$cierre_contable_detalle_session->id_cierre_contable=$this->id_cierre_contableFK_Idcierre_contable;	

		}
		
		$this->Session->write(cierre_contable_detalle_util::$STR_SESSION_NAME,serialize($cierre_contable_detalle_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(cierre_contable_detalle_session $cierre_contable_detalle_session) {
		
		if($cierre_contable_detalle_session==null) {
			$cierre_contable_detalle_session=unserialize($this->Session->read(cierre_contable_detalle_util::$STR_SESSION_NAME));
		}
		
		if($cierre_contable_detalle_session==null) {
		   $cierre_contable_detalle_session=new cierre_contable_detalle_session();
		}
		
		if($cierre_contable_detalle_session->strUltimaBusqueda!=null && $cierre_contable_detalle_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$cierre_contable_detalle_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$cierre_contable_detalle_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$cierre_contable_detalle_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcierre_contable') {
				$this->id_cierre_contableFK_Idcierre_contable=$cierre_contable_detalle_session->id_cierre_contable;
				$cierre_contable_detalle_session->id_cierre_contable=-1;

			}
		}
		
		$cierre_contable_detalle_session->strUltimaBusqueda='';
		//$cierre_contable_detalle_session->intNumeroPaginacion=10;
		$cierre_contable_detalle_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(cierre_contable_detalle_util::$STR_SESSION_NAME,serialize($cierre_contable_detalle_session));		
	}
	
	public function cierre_contable_detallesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idcierre_contableDefaultFK = 0;
	}
	
	public function setcierre_contable_detalleFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_cierre_contable',$this->idcierre_contableDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		cierre_contable::$class;
		cierre_contable_carga::$CONTROLLER;
		
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
		interface cierre_contable_detalle_controlI {	
		
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
		
		public function onLoad(cierre_contable_detalle_session $cierre_contable_detalle_session=null);	
		function index(?string $strTypeOnLoadcierre_contable_detalle='',?string $strTipoPaginaAuxiliarcierre_contable_detalle='',?string $strTipoUsuarioAuxiliarcierre_contable_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadcierre_contable_detalle='',string $strTipoPaginaAuxiliarcierre_contable_detalle='',string $strTipoUsuarioAuxiliarcierre_contable_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($cierre_contable_detalleReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(cierre_contable_detalle $cierre_contable_detalleClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(cierre_contable_detalle_session $cierre_contable_detalle_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(cierre_contable_detalle_session $cierre_contable_detalle_session);	
		public function cierre_contable_detallesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setcierre_contable_detalleFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
