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

namespace com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\presentation\control;

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

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\entity\tipo_cuenta_predefinida;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/tipo_cuenta_predefinida/util/tipo_cuenta_predefinida_carga.php');
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_carga;

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_util;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_param_return;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\logic\tipo_cuenta_predefinida_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\presentation\session\tipo_cuenta_predefinida_session;


//FK


//REL


use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_carga;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_util;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\session\cuenta_predefinida_session;


/*CARGA ARCHIVOS FRAMEWORK*/
tipo_cuenta_predefinida_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
tipo_cuenta_predefinida_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
tipo_cuenta_predefinida_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
tipo_cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*tipo_cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/contabilidad/tipo_cuenta_predefinida/presentation/control/tipo_cuenta_predefinida_init_control.php');
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\presentation\control\tipo_cuenta_predefinida_init_control;

include_once('com/bydan/contabilidad/contabilidad/tipo_cuenta_predefinida/presentation/control/tipo_cuenta_predefinida_base_control.php');
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\presentation\control\tipo_cuenta_predefinida_base_control;

class tipo_cuenta_predefinida_control extends tipo_cuenta_predefinida_base_control {	
	
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
			else if($action=='registrarSesionParacuenta_predefinidaes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idtipo_cuenta_predefinidaActual=$this->getDataId();
				$this->registrarSesionParacuenta_predefinidaes($idtipo_cuenta_predefinidaActual);
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
					
					$tipo_cuenta_predefinidaController = new tipo_cuenta_predefinida_control();
					
					$tipo_cuenta_predefinidaController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($tipo_cuenta_predefinidaController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$tipo_cuenta_predefinidaController = new tipo_cuenta_predefinida_control();
						$tipo_cuenta_predefinidaController = $this;
						
						$jsonResponse = json_encode($tipo_cuenta_predefinidaController->tipo_cuenta_predefinidas);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->tipo_cuenta_predefinidaReturnGeneral==null) {
					$this->tipo_cuenta_predefinidaReturnGeneral=new tipo_cuenta_predefinida_param_return();
				}
				
				echo($this->tipo_cuenta_predefinidaReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$tipo_cuenta_predefinidaController=new tipo_cuenta_predefinida_control();
		
		$tipo_cuenta_predefinidaController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$tipo_cuenta_predefinidaController->usuarioActual=new usuario();
		
		$tipo_cuenta_predefinidaController->usuarioActual->setId($this->usuarioActual->getId());
		$tipo_cuenta_predefinidaController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$tipo_cuenta_predefinidaController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$tipo_cuenta_predefinidaController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$tipo_cuenta_predefinidaController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$tipo_cuenta_predefinidaController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$tipo_cuenta_predefinidaController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$tipo_cuenta_predefinidaController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $tipo_cuenta_predefinidaController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadtipo_cuenta_predefinida= $this->getDataGeneralString('strTypeOnLoadtipo_cuenta_predefinida');
		$strTipoPaginaAuxiliartipo_cuenta_predefinida= $this->getDataGeneralString('strTipoPaginaAuxiliartipo_cuenta_predefinida');
		$strTipoUsuarioAuxiliartipo_cuenta_predefinida= $this->getDataGeneralString('strTipoUsuarioAuxiliartipo_cuenta_predefinida');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadtipo_cuenta_predefinida,$strTipoPaginaAuxiliartipo_cuenta_predefinida,$strTipoUsuarioAuxiliartipo_cuenta_predefinida,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadtipo_cuenta_predefinida!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('tipo_cuenta_predefinida','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_cuenta_predefinida_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliartipo_cuenta_predefinida,$this->strTipoUsuarioAuxiliartipo_cuenta_predefinida,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_cuenta_predefinida_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliartipo_cuenta_predefinida,$this->strTipoUsuarioAuxiliartipo_cuenta_predefinida,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->tipo_cuenta_predefinidaReturnGeneral=new tipo_cuenta_predefinida_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->tipo_cuenta_predefinidaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->tipo_cuenta_predefinidaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->tipo_cuenta_predefinidaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->tipo_cuenta_predefinidaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->tipo_cuenta_predefinidaReturnGeneral);
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
		$this->tipo_cuenta_predefinidaReturnGeneral=new tipo_cuenta_predefinida_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->tipo_cuenta_predefinidaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->tipo_cuenta_predefinidaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->tipo_cuenta_predefinidaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->tipo_cuenta_predefinidaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->tipo_cuenta_predefinidaReturnGeneral);
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
		$this->tipo_cuenta_predefinidaReturnGeneral=new tipo_cuenta_predefinida_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->tipo_cuenta_predefinidaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->tipo_cuenta_predefinidaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->tipo_cuenta_predefinidaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->tipo_cuenta_predefinidaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->tipo_cuenta_predefinidaReturnGeneral);
	}
	
	public function eliminarCascadaAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
					
		$this->eliminarCascada();
	}
	
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->tipo_cuenta_predefinidaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->tipo_cuenta_predefinidaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->tipo_cuenta_predefinidaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->tipo_cuenta_predefinidaReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->tipo_cuenta_predefinidaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->tipo_cuenta_predefinidaReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->tipo_cuenta_predefinidaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->tipo_cuenta_predefinidaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->tipo_cuenta_predefinidaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->tipo_cuenta_predefinidaReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->tipo_cuenta_predefinidaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->tipo_cuenta_predefinidaReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
		
		$this->tipo_cuenta_predefinidaLogic=new tipo_cuenta_predefinida_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->tipo_cuenta_predefinida=new tipo_cuenta_predefinida();
		
		$this->strTypeOnLoadtipo_cuenta_predefinida='onload';
		$this->strTipoPaginaAuxiliartipo_cuenta_predefinida='none';
		$this->strTipoUsuarioAuxiliartipo_cuenta_predefinida='none';	

		$this->intNumeroPaginacion=tipo_cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
		
		$this->tipo_cuenta_predefinidaModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->tipo_cuenta_predefinidaControllerAdditional=new tipo_cuenta_predefinida_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(tipo_cuenta_predefinida_session $tipo_cuenta_predefinida_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($tipo_cuenta_predefinida_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadtipo_cuenta_predefinida='',?string $strTipoPaginaAuxiliartipo_cuenta_predefinida='',?string $strTipoUsuarioAuxiliartipo_cuenta_predefinida='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadtipo_cuenta_predefinida=$strTypeOnLoadtipo_cuenta_predefinida;
			$this->strTipoPaginaAuxiliartipo_cuenta_predefinida=$strTipoPaginaAuxiliartipo_cuenta_predefinida;
			$this->strTipoUsuarioAuxiliartipo_cuenta_predefinida=$strTipoUsuarioAuxiliartipo_cuenta_predefinida;
	
			if($strTipoUsuarioAuxiliartipo_cuenta_predefinida=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->tipo_cuenta_predefinida=new tipo_cuenta_predefinida();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Tipo Cuentas';
			
			
			$tipo_cuenta_predefinida_session=unserialize($this->Session->read(tipo_cuenta_predefinida_util::$STR_SESSION_NAME));
							
			if($tipo_cuenta_predefinida_session==null) {
				$tipo_cuenta_predefinida_session=new tipo_cuenta_predefinida_session();
				
				/*$this->Session->write('tipo_cuenta_predefinida_session',$tipo_cuenta_predefinida_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($tipo_cuenta_predefinida_session->strFuncionJsPadre!=null && $tipo_cuenta_predefinida_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$tipo_cuenta_predefinida_session->strFuncionJsPadre;
				
				$tipo_cuenta_predefinida_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($tipo_cuenta_predefinida_session);
			
			if($strTypeOnLoadtipo_cuenta_predefinida!=null && $strTypeOnLoadtipo_cuenta_predefinida=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$tipo_cuenta_predefinida_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$tipo_cuenta_predefinida_session->setPaginaPopupVariables(true);
				}
				
				if($tipo_cuenta_predefinida_session->intNumeroPaginacion==tipo_cuenta_predefinida_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=tipo_cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$tipo_cuenta_predefinida_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,tipo_cuenta_predefinida_util::$STR_SESSION_NAME,'contabilidad');																
			
			} else if($strTypeOnLoadtipo_cuenta_predefinida!=null && $strTypeOnLoadtipo_cuenta_predefinida=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$tipo_cuenta_predefinida_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=tipo_cuenta_predefinida_util::$INT_NUMERO_PAGINACION;*/
				
				if($tipo_cuenta_predefinida_session->intNumeroPaginacion==tipo_cuenta_predefinida_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=tipo_cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$tipo_cuenta_predefinida_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliartipo_cuenta_predefinida!=null && $strTipoPaginaAuxiliartipo_cuenta_predefinida=='none') {
				/*$tipo_cuenta_predefinida_session->strStyleDivHeader='display:table-row';*/
				
				/*$tipo_cuenta_predefinida_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliartipo_cuenta_predefinida!=null && $strTipoPaginaAuxiliartipo_cuenta_predefinida=='iframe') {
					/*
					$tipo_cuenta_predefinida_session->strStyleDivArbol='display:none';
					$tipo_cuenta_predefinida_session->strStyleDivHeader='display:none';
					$tipo_cuenta_predefinida_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$tipo_cuenta_predefinida_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->tipo_cuenta_predefinidaClase=new tipo_cuenta_predefinida();
			
			
			
		
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=tipo_cuenta_predefinida_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(tipo_cuenta_predefinida_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->tipo_cuenta_predefinidaLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->tipo_cuenta_predefinidaLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$cuentapredefinidaLogic=new cuenta_predefinida_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->tipo_cuenta_predefinidaLogic=new tipo_cuenta_predefinida_logic();*/
			
			
			$this->tipo_cuenta_predefinidasModel=null;
			/*new ListDataModel();*/
			
			/*$this->tipo_cuenta_predefinidasModel.setWrappedData(tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas());*/
						
			$this->tipo_cuenta_predefinidas= array();
			$this->tipo_cuenta_predefinidasEliminados=array();
			$this->tipo_cuenta_predefinidasSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= tipo_cuenta_predefinida_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= tipo_cuenta_predefinida_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->tipo_cuenta_predefinida= new tipo_cuenta_predefinida();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliartipo_cuenta_predefinida!=null && $strTipoUsuarioAuxiliartipo_cuenta_predefinida!='none' && $strTipoUsuarioAuxiliartipo_cuenta_predefinida!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliartipo_cuenta_predefinida);
																
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
				if($strTipoUsuarioAuxiliartipo_cuenta_predefinida!=null && $strTipoUsuarioAuxiliartipo_cuenta_predefinida!='none' && $strTipoUsuarioAuxiliartipo_cuenta_predefinida!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliartipo_cuenta_predefinida);
																
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
				if($strTipoUsuarioAuxiliartipo_cuenta_predefinida==null || $strTipoUsuarioAuxiliartipo_cuenta_predefinida=='none' || $strTipoUsuarioAuxiliartipo_cuenta_predefinida=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliartipo_cuenta_predefinida,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, tipo_cuenta_predefinida_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, tipo_cuenta_predefinida_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina tipo_cuenta_predefinida');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($tipo_cuenta_predefinida_session);
			
			$this->getSetBusquedasSesionConfig($tipo_cuenta_predefinida_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportetipo_cuenta_predefinidas($this->strAccionBusqueda,$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas());*/
				} else if($this->strGenerarReporte=='Html')	{
					$tipo_cuenta_predefinida_session->strServletGenerarHtmlReporte='tipo_cuenta_predefinidaServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(tipo_cuenta_predefinida_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(tipo_cuenta_predefinida_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($tipo_cuenta_predefinida_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$tipo_cuenta_predefinida_session=unserialize($this->Session->read(tipo_cuenta_predefinida_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliartipo_cuenta_predefinida!=null && $strTipoUsuarioAuxiliartipo_cuenta_predefinida=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($tipo_cuenta_predefinida_session);
			}
								
			$this->set(tipo_cuenta_predefinida_util::$STR_SESSION_NAME, $tipo_cuenta_predefinida_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($tipo_cuenta_predefinida_session);
			
			/*
			$this->tipo_cuenta_predefinida->recursive = 0;
			
			$this->tipo_cuenta_predefinidas=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('tipo_cuenta_predefinidas', $this->tipo_cuenta_predefinidas);
			
			$this->set(tipo_cuenta_predefinida_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->tipo_cuenta_predefinidaActual =$this->tipo_cuenta_predefinidaClase;
			
			/*$this->tipo_cuenta_predefinidaActual =$this->migrarModeltipo_cuenta_predefinida($this->tipo_cuenta_predefinidaClase);*/
			
			$this->returnHtml(false);
			
			$this->set(tipo_cuenta_predefinida_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=tipo_cuenta_predefinida_util::$STR_NOMBRE_OPCION;
				
			if(tipo_cuenta_predefinida_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=tipo_cuenta_predefinida_util::$STR_MODULO_OPCION.tipo_cuenta_predefinida_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(tipo_cuenta_predefinida_util::$STR_SESSION_NAME,serialize($tipo_cuenta_predefinida_session));
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
			/*$tipo_cuenta_predefinidaClase= (tipo_cuenta_predefinida) tipo_cuenta_predefinidasModel.getRowData();*/
			
			$this->tipo_cuenta_predefinidaClase->setId($this->tipo_cuenta_predefinida->getId());	
			$this->tipo_cuenta_predefinidaClase->setVersionRow($this->tipo_cuenta_predefinida->getVersionRow());	
			$this->tipo_cuenta_predefinidaClase->setVersionRow($this->tipo_cuenta_predefinida->getVersionRow());	
			$this->tipo_cuenta_predefinidaClase->setcodigo($this->tipo_cuenta_predefinida->getcodigo());	
			$this->tipo_cuenta_predefinidaClase->setnombre($this->tipo_cuenta_predefinida->getnombre());	
			$this->tipo_cuenta_predefinidaClase->setdescripcion($this->tipo_cuenta_predefinida->getdescripcion());	
		
			/*$this->Session->write('tipo_cuenta_predefinidaVersionRowActual', tipo_cuenta_predefinida.getVersionRow());*/
			
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
			
			$tipo_cuenta_predefinida_session=unserialize($this->Session->read(tipo_cuenta_predefinida_util::$STR_SESSION_NAME));
						
			if($tipo_cuenta_predefinida_session==null) {
				$tipo_cuenta_predefinida_session=new tipo_cuenta_predefinida_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('tipo_cuenta_predefinida', $this->tipo_cuenta_predefinida->read(null, $id));
	
			
			$this->tipo_cuenta_predefinida->recursive = 0;
			
			$this->tipo_cuenta_predefinidas=$this->paginate();
			
			$this->set('tipo_cuenta_predefinidas', $this->tipo_cuenta_predefinidas);
	
			if (empty($this->data)) {
				$this->data = $this->tipo_cuenta_predefinida->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->tipo_cuenta_predefinidaLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->tipo_cuenta_predefinidaClase);
			
			$this->tipo_cuenta_predefinidaActual=$this->tipo_cuenta_predefinidaClase;
			
			/*$this->tipo_cuenta_predefinidaActual =$this->migrarModeltipo_cuenta_predefinida($this->tipo_cuenta_predefinidaClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas(),$this->tipo_cuenta_predefinidaActual);
			
			$this->actualizarControllerConReturnGeneral($this->tipo_cuenta_predefinidaReturnGeneral);
			
			//$this->tipo_cuenta_predefinidaReturnGeneral=$this->tipo_cuenta_predefinidaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas(),$this->tipo_cuenta_predefinidaActual,$this->tipo_cuenta_predefinidaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$tipo_cuenta_predefinida_session=unserialize($this->Session->read(tipo_cuenta_predefinida_util::$STR_SESSION_NAME));
						
			if($tipo_cuenta_predefinida_session==null) {
				$tipo_cuenta_predefinida_session=new tipo_cuenta_predefinida_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevotipo_cuenta_predefinida', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->tipo_cuenta_predefinidaClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->tipo_cuenta_predefinidaClase);
			
			$this->tipo_cuenta_predefinidaActual =$this->tipo_cuenta_predefinidaClase;
			
			/*$this->tipo_cuenta_predefinidaActual =$this->migrarModeltipo_cuenta_predefinida($this->tipo_cuenta_predefinidaClase);*/
			
			$this->settipo_cuenta_predefinidaFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas(),$this->tipo_cuenta_predefinida);
			
			$this->actualizarControllerConReturnGeneral($this->tipo_cuenta_predefinidaReturnGeneral);
			
			//this->tipo_cuenta_predefinidaReturnGeneral=$this->tipo_cuenta_predefinidaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas(),$this->tipo_cuenta_predefinida,$this->tipo_cuenta_predefinidaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
						
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->tipo_cuenta_predefinidaReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->tipo_cuenta_predefinidaReturnGeneral->gettipo_cuenta_predefinida(),$this->tipo_cuenta_predefinidaActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeytipo_cuenta_predefinida($this->tipo_cuenta_predefinidaReturnGeneral->gettipo_cuenta_predefinida());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariotipo_cuenta_predefinida($this->tipo_cuenta_predefinidaReturnGeneral->gettipo_cuenta_predefinida());*/
			}
			
			if($this->tipo_cuenta_predefinidaReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->tipo_cuenta_predefinidaReturnGeneral->gettipo_cuenta_predefinida(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualtipo_cuenta_predefinida($this->tipo_cuenta_predefinida,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->tipo_cuenta_predefinidasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->tipo_cuenta_predefinidasAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->tipo_cuenta_predefinidasAuxiliar=array();
			}
			
			if(count($this->tipo_cuenta_predefinidasAuxiliar)==2) {
				$tipo_cuenta_predefinidaOrigen=$this->tipo_cuenta_predefinidasAuxiliar[0];
				$tipo_cuenta_predefinidaDestino=$this->tipo_cuenta_predefinidasAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($tipo_cuenta_predefinidaOrigen,$tipo_cuenta_predefinidaDestino,true,false,false);
				
				$this->actualizarLista($tipo_cuenta_predefinidaDestino,$this->tipo_cuenta_predefinidas);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->tipo_cuenta_predefinidasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->tipo_cuenta_predefinidasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->tipo_cuenta_predefinidasAuxiliar=array();
			}
			
			if(count($this->tipo_cuenta_predefinidasAuxiliar) > 0) {
				foreach ($this->tipo_cuenta_predefinidasAuxiliar as $tipo_cuenta_predefinidaSeleccionado) {
					$this->tipo_cuenta_predefinida=new tipo_cuenta_predefinida();
					
					$this->setCopiarVariablesObjetos($tipo_cuenta_predefinidaSeleccionado,$this->tipo_cuenta_predefinida,true,true,false);
						
					$this->tipo_cuenta_predefinidas[]=$this->tipo_cuenta_predefinida;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->tipo_cuenta_predefinidasEliminados as $tipo_cuenta_predefinidaEliminado) {
				$this->tipo_cuenta_predefinidaLogic->tipo_cuenta_predefinidas[]=$tipo_cuenta_predefinidaEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->tipo_cuenta_predefinida=new tipo_cuenta_predefinida();
							
				$this->tipo_cuenta_predefinidas[]=$this->tipo_cuenta_predefinida;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
		
		$tipo_cuenta_predefinidaActual=new tipo_cuenta_predefinida();
		
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
				
				$tipo_cuenta_predefinidaActual=$this->tipo_cuenta_predefinidas[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $tipo_cuenta_predefinidaActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $tipo_cuenta_predefinidaActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $tipo_cuenta_predefinidaActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->tipo_cuenta_predefinidasAuxiliar=array();		 
		/*$this->tipo_cuenta_predefinidasEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->tipo_cuenta_predefinidasAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->tipo_cuenta_predefinidasAuxiliar=array();
		}
			
		if(count($this->tipo_cuenta_predefinidasAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->tipo_cuenta_predefinidasAuxiliar as $tipo_cuenta_predefinidaAuxLocal) {				
				
				foreach($this->tipo_cuenta_predefinidas as $tipo_cuenta_predefinidaLocal) {
					if($tipo_cuenta_predefinidaLocal->getId()==$tipo_cuenta_predefinidaAuxLocal->getId()) {
						$tipo_cuenta_predefinidaLocal->setIsDeleted(true);
						
						/*$this->tipo_cuenta_predefinidasEliminados[]=$tipo_cuenta_predefinidaLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->tipo_cuenta_predefinidaLogic->settipo_cuenta_predefinidas($this->tipo_cuenta_predefinidas);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=tipo_cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadtipo_cuenta_predefinida='',string $strTipoPaginaAuxiliartipo_cuenta_predefinida='',string $strTipoUsuarioAuxiliartipo_cuenta_predefinida='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadtipo_cuenta_predefinida,$strTipoPaginaAuxiliartipo_cuenta_predefinida,$strTipoUsuarioAuxiliartipo_cuenta_predefinida,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->tipo_cuenta_predefinidas) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=tipo_cuenta_predefinida_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=tipo_cuenta_predefinida_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=tipo_cuenta_predefinida_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$tipo_cuenta_predefinida_session=unserialize($this->Session->read(tipo_cuenta_predefinida_util::$STR_SESSION_NAME));
						
			if($tipo_cuenta_predefinida_session==null) {
				$tipo_cuenta_predefinida_session=new tipo_cuenta_predefinida_session();
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
					/*$this->intNumeroPaginacion=tipo_cuenta_predefinida_util::$INT_NUMERO_PAGINACION;*/
					
					if($tipo_cuenta_predefinida_session->intNumeroPaginacion==tipo_cuenta_predefinida_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=tipo_cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$tipo_cuenta_predefinida_session->intNumeroPaginacion;
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
			
			$this->tipo_cuenta_predefinidasEliminados=array();
			
			/*$this->tipo_cuenta_predefinidaLogic->setConnexion($connexion);*/
			
			$this->tipo_cuenta_predefinidaLogic->setIsConDeep(true);
			
			$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidaDataAccess()->isForFKDataRels=true;
			
			
			
			$this->tipo_cuenta_predefinidaLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->tipo_cuenta_predefinidaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas()==null|| count($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->tipo_cuenta_predefinidaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->tipo_cuenta_predefinidasReporte=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas();
									
						/*$this->generarReportes('Todos',$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas());*/
					
						$this->tipo_cuenta_predefinidaLogic->settipo_cuenta_predefinidas($this->tipo_cuenta_predefinidas);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->tipo_cuenta_predefinidaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas()==null|| count($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->tipo_cuenta_predefinidaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->tipo_cuenta_predefinidasReporte=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas();
									
						/*$this->generarReportes('Todos',$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas());*/
					
						$this->tipo_cuenta_predefinidaLogic->settipo_cuenta_predefinidas($this->tipo_cuenta_predefinidas);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idtipo_cuenta_predefinida=0;*/
				
				if($tipo_cuenta_predefinida_session->bitBusquedaDesdeFKSesionFK!=null && $tipo_cuenta_predefinida_session->bitBusquedaDesdeFKSesionFK==true) {
					if($tipo_cuenta_predefinida_session->bigIdActualFK!=null && $tipo_cuenta_predefinida_session->bigIdActualFK!=0)	{
						$this->idtipo_cuenta_predefinida=$tipo_cuenta_predefinida_session->bigIdActualFK;	
					}
					
					$tipo_cuenta_predefinida_session->bitBusquedaDesdeFKSesionFK=false;
					
					$tipo_cuenta_predefinida_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idtipo_cuenta_predefinida=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idtipo_cuenta_predefinida=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->tipo_cuenta_predefinidaLogic->getEntity($this->idtipo_cuenta_predefinida);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*tipo_cuenta_predefinidaLogicAdditional::getDetalleIndicePorId($idtipo_cuenta_predefinida);*/

				
				if($this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida()!=null) {
					$this->tipo_cuenta_predefinidaLogic->settipo_cuenta_predefinidas(array());
					$this->tipo_cuenta_predefinidaLogic->tipo_cuenta_predefinidas[]=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinida();
				}
			
			}
		 
		
		$tipo_cuenta_predefinida_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$tipo_cuenta_predefinida_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->tipo_cuenta_predefinidaLogic->loadForeignsKeysDescription();*/
		
		$this->tipo_cuenta_predefinidas=$this->tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas();
		
		if($this->tipo_cuenta_predefinidasEliminados==null) {
			$this->tipo_cuenta_predefinidasEliminados=array();
		}
		
		$this->Session->write(tipo_cuenta_predefinida_util::$STR_SESSION_NAME.'Lista',serialize($this->tipo_cuenta_predefinidas));
		$this->Session->write(tipo_cuenta_predefinida_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->tipo_cuenta_predefinidasEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(tipo_cuenta_predefinida_util::$STR_SESSION_NAME,serialize($tipo_cuenta_predefinida_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idtipo_cuenta_predefinida=$idGeneral;
			
			$this->intNumeroPaginacion=tipo_cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
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
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			if(count($this->tipo_cuenta_predefinidas) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	
	
	
		
	
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(tipo_cuenta_predefinida_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$tipo_cuenta_predefinida_session=unserialize($this->Session->read(tipo_cuenta_predefinida_util::$STR_SESSION_NAME));
		
		if($tipo_cuenta_predefinida_session->bitPermiteNavegacionHaciaFKDesde) {
			
			
			$tipo_cuenta_predefinida_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}						
			
			$this->tipo_cuenta_predefinidasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->tipo_cuenta_predefinidasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->tipo_cuenta_predefinidasAuxiliar=array();
			}
			
			if(count($this->tipo_cuenta_predefinidasAuxiliar) > 0) {
				
				foreach ($this->tipo_cuenta_predefinidasAuxiliar as $tipo_cuenta_predefinidaSeleccionado) {
					$this->eliminarTablaBase($tipo_cuenta_predefinidaSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('cuenta_predefinida');
			$tipoRelacionReporte->setsDescripcion('Cuentas Predefinidases');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=cuenta_predefinida_util::$STR_NOMBRE_CLASE;
		
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
				$this->tipo_cuenta_predefinidaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=tipo_cuenta_predefinida_util::$INT_NUMERO_PAGINACION;
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
				$this->tipo_cuenta_predefinidaLogic->commitNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->tipo_cuenta_predefinidaLogic->rollbackNewConnexionToDeep();
				$this->tipo_cuenta_predefinidaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$tipo_cuenta_predefinidasNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->tipo_cuenta_predefinidas as $tipo_cuenta_predefinidaLocal) {
				if($tipo_cuenta_predefinidaLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->tipo_cuenta_predefinida=new tipo_cuenta_predefinida();
				
				$this->tipo_cuenta_predefinida->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->tipo_cuenta_predefinidas[]=$this->tipo_cuenta_predefinida;*/
				
				$tipo_cuenta_predefinidasNuevos[]=$this->tipo_cuenta_predefinida;
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
		
		if($tipo_cuenta_predefinidasNuevos!=null);
	}
					
	
	
	
	
	
	
	
	
	public function setVariablesGlobalesCombosFK(tipo_cuenta_predefinida $tipo_cuenta_predefinidaClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	
	
	
	
	

	public function registrarSesionParacuenta_predefinidaes(int $idtipo_cuenta_predefinidaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idtipo_cuenta_predefinidaActual=$idtipo_cuenta_predefinidaActual;

		$bitPaginaPopupcuenta_predefinida=false;

		try {

			$tipo_cuenta_predefinida_session=unserialize($this->Session->read(tipo_cuenta_predefinida_util::$STR_SESSION_NAME));

			if($tipo_cuenta_predefinida_session==null) {
				$tipo_cuenta_predefinida_session=new tipo_cuenta_predefinida_session();
			}

			$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));

			if($cuenta_predefinida_session==null) {
				$cuenta_predefinida_session=new cuenta_predefinida_session();
			}

			$cuenta_predefinida_session->strUltimaBusqueda='FK_Idtipo_cuenta_predefinida';
			$cuenta_predefinida_session->strPathNavegacionActual=$tipo_cuenta_predefinida_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.cuenta_predefinida_util::$STR_CLASS_WEB_TITULO;
			$cuenta_predefinida_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcuenta_predefinida=$cuenta_predefinida_session->bitPaginaPopup;
			$cuenta_predefinida_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcuenta_predefinida=$cuenta_predefinida_session->bitPaginaPopup;
			$cuenta_predefinida_session->bitPermiteNavegacionHaciaFKDesde=false;
			$cuenta_predefinida_session->strNombrePaginaNavegacionHaciaFKDesde=tipo_cuenta_predefinida_util::$STR_NOMBRE_OPCION;
			$cuenta_predefinida_session->bitBusquedaDesdeFKSesiontipo_cuenta_predefinida=true;
			$cuenta_predefinida_session->bigidtipo_cuenta_predefinidaActual=$this->idtipo_cuenta_predefinidaActual;

			$tipo_cuenta_predefinida_session->bitBusquedaDesdeFKSesionFK=true;
			$tipo_cuenta_predefinida_session->bigIdActualFK=$this->idtipo_cuenta_predefinidaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"cuenta_predefinida"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=tipo_cuenta_predefinida_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"cuenta_predefinida"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(tipo_cuenta_predefinida_util::$STR_SESSION_NAME,serialize($tipo_cuenta_predefinida_session));
			$this->Session->write(cuenta_predefinida_util::$STR_SESSION_NAME,serialize($cuenta_predefinida_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcuenta_predefinida!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_predefinida_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_predefinida_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliartipo_cuenta_predefinida,$this->strTipoUsuarioAuxiliartipo_cuenta_predefinida,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_predefinida_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_predefinida_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliartipo_cuenta_predefinida,$this->strTipoUsuarioAuxiliartipo_cuenta_predefinida,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(tipo_cuenta_predefinida_util::$STR_SESSION_NAME,tipo_cuenta_predefinida_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$tipo_cuenta_predefinida_session=$this->Session->read(tipo_cuenta_predefinida_util::$STR_SESSION_NAME);
				
		if($tipo_cuenta_predefinida_session==null) {
			$tipo_cuenta_predefinida_session=new tipo_cuenta_predefinida_session();		
			//$this->Session->write('tipo_cuenta_predefinida_session',$tipo_cuenta_predefinida_session);							
		}
		*/
		
		$tipo_cuenta_predefinida_session=new tipo_cuenta_predefinida_session();
    	$tipo_cuenta_predefinida_session->strPathNavegacionActual=tipo_cuenta_predefinida_util::$STR_CLASS_WEB_TITULO;
    	$tipo_cuenta_predefinida_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(tipo_cuenta_predefinida_util::$STR_SESSION_NAME,serialize($tipo_cuenta_predefinida_session));		
	}	
	
	public function getSetBusquedasSesionConfig(tipo_cuenta_predefinida_session $tipo_cuenta_predefinida_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($tipo_cuenta_predefinida_session->bitBusquedaDesdeFKSesionFK!=null && $tipo_cuenta_predefinida_session->bitBusquedaDesdeFKSesionFK==true) {
			if($tipo_cuenta_predefinida_session->bigIdActualFK!=null && $tipo_cuenta_predefinida_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$tipo_cuenta_predefinida_session->bigIdActualFKParaPosibleAtras=$tipo_cuenta_predefinida_session->bigIdActualFK;*/
			}
				
			$tipo_cuenta_predefinida_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$tipo_cuenta_predefinida_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(tipo_cuenta_predefinida_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$tipo_cuenta_predefinida_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$tipo_cuenta_predefinida_session=unserialize($this->Session->read(tipo_cuenta_predefinida_util::$STR_SESSION_NAME));
		
		if($tipo_cuenta_predefinida_session==null) {
			$tipo_cuenta_predefinida_session=new tipo_cuenta_predefinida_session();
		}
		
		$tipo_cuenta_predefinida_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$tipo_cuenta_predefinida_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$tipo_cuenta_predefinida_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		
		$this->Session->write(tipo_cuenta_predefinida_util::$STR_SESSION_NAME,serialize($tipo_cuenta_predefinida_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(tipo_cuenta_predefinida_session $tipo_cuenta_predefinida_session) {
		
		if($tipo_cuenta_predefinida_session==null) {
			$tipo_cuenta_predefinida_session=unserialize($this->Session->read(tipo_cuenta_predefinida_util::$STR_SESSION_NAME));
		}
		
		if($tipo_cuenta_predefinida_session==null) {
		   $tipo_cuenta_predefinida_session=new tipo_cuenta_predefinida_session();
		}
		
		if($tipo_cuenta_predefinida_session->strUltimaBusqueda!=null && $tipo_cuenta_predefinida_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$tipo_cuenta_predefinida_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$tipo_cuenta_predefinida_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$tipo_cuenta_predefinida_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

		}
		
		$tipo_cuenta_predefinida_session->strUltimaBusqueda='';
		//$tipo_cuenta_predefinida_session->intNumeroPaginacion=10;
		$tipo_cuenta_predefinida_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(tipo_cuenta_predefinida_util::$STR_SESSION_NAME,serialize($tipo_cuenta_predefinida_session));		
	}
	
	public function tipo_cuenta_predefinidasControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
	}
	
	public function settipo_cuenta_predefinidaFKsDefault() {
	
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		
		
		//REL
		

		cuenta_predefinida_carga::$CONTROLLER;
		cuenta_predefinida_util::$STR_SCHEMA;
		cuenta_predefinida_session::class;
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
		interface tipo_cuenta_predefinida_controlI {	
		
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
		
		
		public function mostrarEjecutarAccionesRelacionesAction();
		
		public function generarReporteConPhpExcelAction();	
		public function generarReporteConPhpExcelVerticalAction();	
		public function generarReporteConPhpExcelRelacionesAction();
		
		public function onLoad(tipo_cuenta_predefinida_session $tipo_cuenta_predefinida_session=null);	
		function index(?string $strTypeOnLoadtipo_cuenta_predefinida='',?string $strTipoPaginaAuxiliartipo_cuenta_predefinida='',?string $strTipoUsuarioAuxiliartipo_cuenta_predefinida='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadtipo_cuenta_predefinida='',string $strTipoPaginaAuxiliartipo_cuenta_predefinida='',string $strTipoUsuarioAuxiliartipo_cuenta_predefinida='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
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
		public function setVariablesGlobalesCombosFK(tipo_cuenta_predefinida $tipo_cuenta_predefinidaClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(tipo_cuenta_predefinida_session $tipo_cuenta_predefinida_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(tipo_cuenta_predefinida_session $tipo_cuenta_predefinida_session);	
		public function tipo_cuenta_predefinidasControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function settipo_cuenta_predefinidaFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
