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

namespace com\bydan\contabilidad\contabilidad\cierre_contable\presentation\control;

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

use com\bydan\contabilidad\contabilidad\cierre_contable\business\entity\cierre_contable;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cierre_contable/util/cierre_contable_carga.php');
use com\bydan\contabilidad\contabilidad\cierre_contable\util\cierre_contable_carga;

use com\bydan\contabilidad\contabilidad\cierre_contable\util\cierre_contable_util;
use com\bydan\contabilidad\contabilidad\cierre_contable\util\cierre_contable_param_return;
use com\bydan\contabilidad\contabilidad\cierre_contable\business\logic\cierre_contable_logic;
use com\bydan\contabilidad\contabilidad\cierre_contable\presentation\session\cierre_contable_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

//REL


use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util\cierre_contable_detalle_carga;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util\cierre_contable_detalle_util;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\presentation\session\cierre_contable_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cierre_contable_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cierre_contable_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cierre_contable_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cierre_contable_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cierre_contable_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/contabilidad/cierre_contable/presentation/control/cierre_contable_init_control.php');
use com\bydan\contabilidad\contabilidad\cierre_contable\presentation\control\cierre_contable_init_control;

include_once('com/bydan/contabilidad/contabilidad/cierre_contable/presentation/control/cierre_contable_base_control.php');
use com\bydan\contabilidad\contabilidad\cierre_contable\presentation\control\cierre_contable_base_control;

class cierre_contable_control extends cierre_contable_base_control {	
	
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
			else if($action=='registrarSesionParacierre_contable_detalles' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcierre_contableActual=$this->getDataId();
				$this->registrarSesionParacierre_contable_detalles($idcierre_contableActual);
			} 
			
			
			else if($action=="FK_Idejercicio"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdejercicioParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idperiodo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdperiodoParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcierre_contableActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idcierre_contableActual
			}
			else if($action=='abrirBusquedaParaejercicio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcierre_contableActual=$this->getDataId();
				$this->abrirBusquedaParaejercicio();//$idcierre_contableActual
			}
			else if($action=='abrirBusquedaParaperiodo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcierre_contableActual=$this->getDataId();
				$this->abrirBusquedaParaperiodo();//$idcierre_contableActual
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
					
					$cierre_contableController = new cierre_contable_control();
					
					$cierre_contableController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($cierre_contableController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$cierre_contableController = new cierre_contable_control();
						$cierre_contableController = $this;
						
						$jsonResponse = json_encode($cierre_contableController->cierre_contables);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->cierre_contableReturnGeneral==null) {
					$this->cierre_contableReturnGeneral=new cierre_contable_param_return();
				}
				
				echo($this->cierre_contableReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$cierre_contableController=new cierre_contable_control();
		
		$cierre_contableController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$cierre_contableController->usuarioActual=new usuario();
		
		$cierre_contableController->usuarioActual->setId($this->usuarioActual->getId());
		$cierre_contableController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$cierre_contableController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$cierre_contableController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$cierre_contableController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$cierre_contableController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$cierre_contableController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$cierre_contableController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $cierre_contableController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadcierre_contable= $this->getDataGeneralString('strTypeOnLoadcierre_contable');
		$strTipoPaginaAuxiliarcierre_contable= $this->getDataGeneralString('strTipoPaginaAuxiliarcierre_contable');
		$strTipoUsuarioAuxiliarcierre_contable= $this->getDataGeneralString('strTipoUsuarioAuxiliarcierre_contable');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadcierre_contable,$strTipoPaginaAuxiliarcierre_contable,$strTipoUsuarioAuxiliarcierre_contable,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadcierre_contable!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('cierre_contable','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cierre_contable_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcierre_contable,$this->strTipoUsuarioAuxiliarcierre_contable,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cierre_contable_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcierre_contable,$this->strTipoUsuarioAuxiliarcierre_contable,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->cierre_contableReturnGeneral=new cierre_contable_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cierre_contableReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cierre_contableReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cierre_contableReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cierre_contableReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cierre_contableReturnGeneral);
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
		$this->cierre_contableReturnGeneral=new cierre_contable_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cierre_contableReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cierre_contableReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cierre_contableReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cierre_contableReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cierre_contableReturnGeneral);
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
		$this->cierre_contableReturnGeneral=new cierre_contable_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cierre_contableReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cierre_contableReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cierre_contableReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cierre_contableReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cierre_contableReturnGeneral);
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
				$this->cierre_contableLogic->getNewConnexionToDeep();
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
			
			
			$this->cierre_contableReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->cierre_contableReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cierre_contableReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->cierre_contableReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->cierre_contableReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cierre_contableReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->cierre_contableReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->cierre_contableReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->cierre_contableReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cierre_contableReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->cierre_contableReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cierre_contableReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->cierre_contableReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->cierre_contableReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->cierre_contableReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cierre_contableReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->cierre_contableReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cierre_contableReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
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
		
		$this->cierre_contableLogic=new cierre_contable_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->cierre_contable=new cierre_contable();
		
		$this->strTypeOnLoadcierre_contable='onload';
		$this->strTipoPaginaAuxiliarcierre_contable='none';
		$this->strTipoUsuarioAuxiliarcierre_contable='none';	

		$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;
		
		$this->cierre_contableModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cierre_contableControllerAdditional=new cierre_contable_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(cierre_contable_session $cierre_contable_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($cierre_contable_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadcierre_contable='',?string $strTipoPaginaAuxiliarcierre_contable='',?string $strTipoUsuarioAuxiliarcierre_contable='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadcierre_contable=$strTypeOnLoadcierre_contable;
			$this->strTipoPaginaAuxiliarcierre_contable=$strTipoPaginaAuxiliarcierre_contable;
			$this->strTipoUsuarioAuxiliarcierre_contable=$strTipoUsuarioAuxiliarcierre_contable;
	
			if($strTipoUsuarioAuxiliarcierre_contable=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->cierre_contable=new cierre_contable();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Cierres Contableses';
			
			
			$cierre_contable_session=unserialize($this->Session->read(cierre_contable_util::$STR_SESSION_NAME));
							
			if($cierre_contable_session==null) {
				$cierre_contable_session=new cierre_contable_session();
				
				/*$this->Session->write('cierre_contable_session',$cierre_contable_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($cierre_contable_session->strFuncionJsPadre!=null && $cierre_contable_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$cierre_contable_session->strFuncionJsPadre;
				
				$cierre_contable_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($cierre_contable_session);
			
			if($strTypeOnLoadcierre_contable!=null && $strTypeOnLoadcierre_contable=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$cierre_contable_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$cierre_contable_session->setPaginaPopupVariables(true);
				}
				
				if($cierre_contable_session->intNumeroPaginacion==cierre_contable_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cierre_contable_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,cierre_contable_util::$STR_SESSION_NAME,'contabilidad');																
			
			} else if($strTypeOnLoadcierre_contable!=null && $strTypeOnLoadcierre_contable=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$cierre_contable_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;*/
				
				if($cierre_contable_session->intNumeroPaginacion==cierre_contable_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cierre_contable_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarcierre_contable!=null && $strTipoPaginaAuxiliarcierre_contable=='none') {
				/*$cierre_contable_session->strStyleDivHeader='display:table-row';*/
				
				/*$cierre_contable_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarcierre_contable!=null && $strTipoPaginaAuxiliarcierre_contable=='iframe') {
					/*
					$cierre_contable_session->strStyleDivArbol='display:none';
					$cierre_contable_session->strStyleDivHeader='display:none';
					$cierre_contable_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$cierre_contable_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->cierre_contableClase=new cierre_contable();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=cierre_contable_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(cierre_contable_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->cierre_contableLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->cierre_contableLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$cierrecontabledetalleLogic=new cierre_contable_detalle_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->cierre_contableLogic=new cierre_contable_logic();*/
			
			
			$this->cierre_contablesModel=null;
			/*new ListDataModel();*/
			
			/*$this->cierre_contablesModel.setWrappedData(cierre_contableLogic->getcierre_contables());*/
						
			$this->cierre_contables= array();
			$this->cierre_contablesEliminados=array();
			$this->cierre_contablesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= cierre_contable_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= cierre_contable_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->cierre_contable= new cierre_contable();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idejercicio='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idperiodo='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarcierre_contable!=null && $strTipoUsuarioAuxiliarcierre_contable!='none' && $strTipoUsuarioAuxiliarcierre_contable!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcierre_contable);
																
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
				if($strTipoUsuarioAuxiliarcierre_contable!=null && $strTipoUsuarioAuxiliarcierre_contable!='none' && $strTipoUsuarioAuxiliarcierre_contable!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcierre_contable);
																
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
				if($strTipoUsuarioAuxiliarcierre_contable==null || $strTipoUsuarioAuxiliarcierre_contable=='none' || $strTipoUsuarioAuxiliarcierre_contable=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarcierre_contable,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cierre_contable_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cierre_contable_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina cierre_contable');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($cierre_contable_session);
			
			$this->getSetBusquedasSesionConfig($cierre_contable_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportecierre_contables($this->strAccionBusqueda,$this->cierre_contableLogic->getcierre_contables());*/
				} else if($this->strGenerarReporte=='Html')	{
					$cierre_contable_session->strServletGenerarHtmlReporte='cierre_contableServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(cierre_contable_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(cierre_contable_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($cierre_contable_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$cierre_contable_session=unserialize($this->Session->read(cierre_contable_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarcierre_contable!=null && $strTipoUsuarioAuxiliarcierre_contable=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($cierre_contable_session);
			}
								
			$this->set(cierre_contable_util::$STR_SESSION_NAME, $cierre_contable_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($cierre_contable_session);
			
			/*
			$this->cierre_contable->recursive = 0;
			
			$this->cierre_contables=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('cierre_contables', $this->cierre_contables);
			
			$this->set(cierre_contable_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->cierre_contableActual =$this->cierre_contableClase;
			
			/*$this->cierre_contableActual =$this->migrarModelcierre_contable($this->cierre_contableClase);*/
			
			$this->returnHtml(false);
			
			$this->set(cierre_contable_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=cierre_contable_util::$STR_NOMBRE_OPCION;
				
			if(cierre_contable_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=cierre_contable_util::$STR_MODULO_OPCION.cierre_contable_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(cierre_contable_util::$STR_SESSION_NAME,serialize($cierre_contable_session));
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
			/*$cierre_contableClase= (cierre_contable) cierre_contablesModel.getRowData();*/
			
			$this->cierre_contableClase->setId($this->cierre_contable->getId());	
			$this->cierre_contableClase->setVersionRow($this->cierre_contable->getVersionRow());	
			$this->cierre_contableClase->setVersionRow($this->cierre_contable->getVersionRow());	
			$this->cierre_contableClase->setid_empresa($this->cierre_contable->getid_empresa());	
			$this->cierre_contableClase->setid_ejercicio($this->cierre_contable->getid_ejercicio());	
			$this->cierre_contableClase->setid_periodo($this->cierre_contable->getid_periodo());	
			$this->cierre_contableClase->setfecha_cierre($this->cierre_contable->getfecha_cierre());	
			$this->cierre_contableClase->setgan_per($this->cierre_contable->getgan_per());	
			$this->cierre_contableClase->settotal_cuentas($this->cierre_contable->gettotal_cuentas());	
		
			/*$this->Session->write('cierre_contableVersionRowActual', cierre_contable.getVersionRow());*/
			
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
			
			$cierre_contable_session=unserialize($this->Session->read(cierre_contable_util::$STR_SESSION_NAME));
						
			if($cierre_contable_session==null) {
				$cierre_contable_session=new cierre_contable_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('cierre_contable', $this->cierre_contable->read(null, $id));
	
			
			$this->cierre_contable->recursive = 0;
			
			$this->cierre_contables=$this->paginate();
			
			$this->set('cierre_contables', $this->cierre_contables);
	
			if (empty($this->data)) {
				$this->data = $this->cierre_contable->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->cierre_contableLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cierre_contableClase);
			
			$this->cierre_contableActual=$this->cierre_contableClase;
			
			/*$this->cierre_contableActual =$this->migrarModelcierre_contable($this->cierre_contableClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cierre_contableLogic->getcierre_contables(),$this->cierre_contableActual);
			
			$this->actualizarControllerConReturnGeneral($this->cierre_contableReturnGeneral);
			
			//$this->cierre_contableReturnGeneral=$this->cierre_contableLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cierre_contableLogic->getcierre_contables(),$this->cierre_contableActual,$this->cierre_contableParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$cierre_contable_session=unserialize($this->Session->read(cierre_contable_util::$STR_SESSION_NAME));
						
			if($cierre_contable_session==null) {
				$cierre_contable_session=new cierre_contable_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevocierre_contable', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->cierre_contableClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cierre_contableClase);
			
			$this->cierre_contableActual =$this->cierre_contableClase;
			
			/*$this->cierre_contableActual =$this->migrarModelcierre_contable($this->cierre_contableClase);*/
			
			$this->setcierre_contableFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cierre_contableLogic->getcierre_contables(),$this->cierre_contable);
			
			$this->actualizarControllerConReturnGeneral($this->cierre_contableReturnGeneral);
			
			//this->cierre_contableReturnGeneral=$this->cierre_contableLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cierre_contableLogic->getcierre_contables(),$this->cierre_contable,$this->cierre_contableParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->cierre_contableReturnGeneral->getcierre_contable()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idejercicioDefaultFK!=null && $this->idejercicioDefaultFK > -1) {
				$this->cierre_contableReturnGeneral->getcierre_contable()->setid_ejercicio($this->idejercicioDefaultFK);
			}

			if($this->idperiodoDefaultFK!=null && $this->idperiodoDefaultFK > -1) {
				$this->cierre_contableReturnGeneral->getcierre_contable()->setid_periodo($this->idperiodoDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->cierre_contableReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->cierre_contableReturnGeneral->getcierre_contable(),$this->cierre_contableActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeycierre_contable($this->cierre_contableReturnGeneral->getcierre_contable());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariocierre_contable($this->cierre_contableReturnGeneral->getcierre_contable());*/
			}
			
			if($this->cierre_contableReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cierre_contableReturnGeneral->getcierre_contable(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualcierre_contable($this->cierre_contable,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->cierre_contablesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cierre_contablesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->cierre_contablesAuxiliar=array();
			}
			
			if(count($this->cierre_contablesAuxiliar)==2) {
				$cierre_contableOrigen=$this->cierre_contablesAuxiliar[0];
				$cierre_contableDestino=$this->cierre_contablesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($cierre_contableOrigen,$cierre_contableDestino,true,false,false);
				
				$this->actualizarLista($cierre_contableDestino,$this->cierre_contables);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->cierre_contablesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cierre_contablesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cierre_contablesAuxiliar=array();
			}
			
			if(count($this->cierre_contablesAuxiliar) > 0) {
				foreach ($this->cierre_contablesAuxiliar as $cierre_contableSeleccionado) {
					$this->cierre_contable=new cierre_contable();
					
					$this->setCopiarVariablesObjetos($cierre_contableSeleccionado,$this->cierre_contable,true,true,false);
						
					$this->cierre_contables[]=$this->cierre_contable;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->cierre_contablesEliminados as $cierre_contableEliminado) {
				$this->cierre_contableLogic->cierre_contables[]=$cierre_contableEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->cierre_contable=new cierre_contable();
							
				$this->cierre_contables[]=$this->cierre_contable;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
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
		
		$cierre_contableActual=new cierre_contable();
		
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
				
				$cierre_contableActual=$this->cierre_contables[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cierre_contableActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cierre_contableActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cierre_contableActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cierre_contableActual->setfecha_cierre(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cierre_contableActual->setgan_per((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cierre_contableActual->settotal_cuentas((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->cierre_contablesAuxiliar=array();		 
		/*$this->cierre_contablesEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->cierre_contablesAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->cierre_contablesAuxiliar=array();
		}
			
		if(count($this->cierre_contablesAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->cierre_contablesAuxiliar as $cierre_contableAuxLocal) {				
				
				foreach($this->cierre_contables as $cierre_contableLocal) {
					if($cierre_contableLocal->getId()==$cierre_contableAuxLocal->getId()) {
						$cierre_contableLocal->setIsDeleted(true);
						
						/*$this->cierre_contablesEliminados[]=$cierre_contableLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->cierre_contableLogic->setcierre_contables($this->cierre_contables);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
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
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadcierre_contable='',string $strTipoPaginaAuxiliarcierre_contable='',string $strTipoUsuarioAuxiliarcierre_contable='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadcierre_contable,$strTipoPaginaAuxiliarcierre_contable,$strTipoUsuarioAuxiliarcierre_contable,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->cierre_contables) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=cierre_contable_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=cierre_contable_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=cierre_contable_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$cierre_contable_session=unserialize($this->Session->read(cierre_contable_util::$STR_SESSION_NAME));
						
			if($cierre_contable_session==null) {
				$cierre_contable_session=new cierre_contable_session();
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
					/*$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;*/
					
					if($cierre_contable_session->intNumeroPaginacion==cierre_contable_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$cierre_contable_session->intNumeroPaginacion;
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
			
			$this->cierre_contablesEliminados=array();
			
			/*$this->cierre_contableLogic->setConnexion($connexion);*/
			
			$this->cierre_contableLogic->setIsConDeep(true);
			
			$this->cierre_contableLogic->getcierre_contableDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			
			$this->cierre_contableLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cierre_contableLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->cierre_contableLogic->getcierre_contables()==null|| count($this->cierre_contableLogic->getcierre_contables())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cierre_contables=$this->cierre_contableLogic->getcierre_contables();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cierre_contableLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->cierre_contablesReporte=$this->cierre_contableLogic->getcierre_contables();
									
						/*$this->generarReportes('Todos',$this->cierre_contableLogic->getcierre_contables());*/
					
						$this->cierre_contableLogic->setcierre_contables($this->cierre_contables);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cierre_contableLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->cierre_contableLogic->getcierre_contables()==null|| count($this->cierre_contableLogic->getcierre_contables())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cierre_contables=$this->cierre_contableLogic->getcierre_contables();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cierre_contableLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->cierre_contablesReporte=$this->cierre_contableLogic->getcierre_contables();
									
						/*$this->generarReportes('Todos',$this->cierre_contableLogic->getcierre_contables());*/
					
						$this->cierre_contableLogic->setcierre_contables($this->cierre_contables);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idcierre_contable=0;*/
				
				if($cierre_contable_session->bitBusquedaDesdeFKSesionFK!=null && $cierre_contable_session->bitBusquedaDesdeFKSesionFK==true) {
					if($cierre_contable_session->bigIdActualFK!=null && $cierre_contable_session->bigIdActualFK!=0)	{
						$this->idcierre_contable=$cierre_contable_session->bigIdActualFK;	
					}
					
					$cierre_contable_session->bitBusquedaDesdeFKSesionFK=false;
					
					$cierre_contable_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idcierre_contable=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idcierre_contable=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cierre_contableLogic->getEntity($this->idcierre_contable);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*cierre_contableLogicAdditional::getDetalleIndicePorId($idcierre_contable);*/

				
				if($this->cierre_contableLogic->getcierre_contable()!=null) {
					$this->cierre_contableLogic->setcierre_contables(array());
					$this->cierre_contableLogic->cierre_contables[]=$this->cierre_contableLogic->getcierre_contable();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idejercicio')
			{

				if($cierre_contable_session->bigidejercicioActual!=null && $cierre_contable_session->bigidejercicioActual!=0)
				{
					$this->id_ejercicioFK_Idejercicio=$cierre_contable_session->bigidejercicioActual;
					$cierre_contable_session->bigidejercicioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cierre_contableLogic->getsFK_Idejercicio($finalQueryPaginacion,$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cierre_contableLogicAdditional::getDetalleIndiceFK_Idejercicio($this->id_ejercicioFK_Idejercicio);


					if($this->cierre_contableLogic->getcierre_contables()==null || count($this->cierre_contableLogic->getcierre_contables())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cierre_contables=$this->cierre_contableLogic->getcierre_contables();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cierre_contableLogic->getsFK_Idejercicio('',$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cierre_contablesReporte=$this->cierre_contableLogic->getcierre_contables();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecierre_contables("FK_Idejercicio",$this->cierre_contableLogic->getcierre_contables());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cierre_contableLogic->setcierre_contables($cierre_contables);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($cierre_contable_session->bigidempresaActual!=null && $cierre_contable_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$cierre_contable_session->bigidempresaActual;
					$cierre_contable_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cierre_contableLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cierre_contableLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->cierre_contableLogic->getcierre_contables()==null || count($this->cierre_contableLogic->getcierre_contables())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cierre_contables=$this->cierre_contableLogic->getcierre_contables();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cierre_contableLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cierre_contablesReporte=$this->cierre_contableLogic->getcierre_contables();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecierre_contables("FK_Idempresa",$this->cierre_contableLogic->getcierre_contables());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cierre_contableLogic->setcierre_contables($cierre_contables);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperiodo')
			{

				if($cierre_contable_session->bigidperiodoActual!=null && $cierre_contable_session->bigidperiodoActual!=0)
				{
					$this->id_periodoFK_Idperiodo=$cierre_contable_session->bigidperiodoActual;
					$cierre_contable_session->bigidperiodoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cierre_contableLogic->getsFK_Idperiodo($finalQueryPaginacion,$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cierre_contableLogicAdditional::getDetalleIndiceFK_Idperiodo($this->id_periodoFK_Idperiodo);


					if($this->cierre_contableLogic->getcierre_contables()==null || count($this->cierre_contableLogic->getcierre_contables())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cierre_contables=$this->cierre_contableLogic->getcierre_contables();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cierre_contableLogic->getsFK_Idperiodo('',$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cierre_contablesReporte=$this->cierre_contableLogic->getcierre_contables();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecierre_contables("FK_Idperiodo",$this->cierre_contableLogic->getcierre_contables());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cierre_contableLogic->setcierre_contables($cierre_contables);
					}
				//}

			} 
		
		$cierre_contable_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cierre_contable_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->cierre_contableLogic->loadForeignsKeysDescription();*/
		
		$this->cierre_contables=$this->cierre_contableLogic->getcierre_contables();
		
		if($this->cierre_contablesEliminados==null) {
			$this->cierre_contablesEliminados=array();
		}
		
		$this->Session->write(cierre_contable_util::$STR_SESSION_NAME.'Lista',serialize($this->cierre_contables));
		$this->Session->write(cierre_contable_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cierre_contablesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(cierre_contable_util::$STR_SESSION_NAME,serialize($cierre_contable_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idcierre_contable=$idGeneral;
			
			$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
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
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}

			if(count($this->cierre_contables) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdejercicioParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ejercicioFK_Idejercicio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idejercicio','cmbid_ejercicio');

			$this->strAccionBusqueda='FK_Idejercicio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdempresaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdperiodoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_periodoFK_Idperiodo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperiodo','cmbid_periodo');

			$this->strAccionBusqueda='FK_Idperiodo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idejercicio($strFinalQuery,$id_ejercicio)
	{
		try
		{

			$this->cierre_contableLogic->getsFK_Idejercicio($strFinalQuery,new Pagination(),$id_ejercicio);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idempresa($strFinalQuery,$id_empresa)
	{
		try
		{

			$this->cierre_contableLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idperiodo($strFinalQuery,$id_periodo)
	{
		try
		{

			$this->cierre_contableLogic->getsFK_Idperiodo($strFinalQuery,new Pagination(),$id_periodo);
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
			
			
			$cierre_contableForeignKey=new cierre_contable_param_return(); //cierre_contableForeignKey();
			
			$cierre_contable_session=unserialize($this->Session->read(cierre_contable_util::$STR_SESSION_NAME));
						
			if($cierre_contable_session==null) {
				$cierre_contable_session=new cierre_contable_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$cierre_contableForeignKey=$this->cierre_contableLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$cierre_contable_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$cierre_contableForeignKey->empresasFK;
				$this->idempresaDefaultFK=$cierre_contableForeignKey->idempresaDefaultFK;
			}

			if($cierre_contable_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$this->strRecargarFkTipos,',')) {
				$this->ejerciciosFK=$cierre_contableForeignKey->ejerciciosFK;
				$this->idejercicioDefaultFK=$cierre_contableForeignKey->idejercicioDefaultFK;
			}

			if($cierre_contable_session->bitBusquedaDesdeFKSesionejercicio) {
				$this->setVisibleBusquedasParaejercicio(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$this->strRecargarFkTipos,',')) {
				$this->periodosFK=$cierre_contableForeignKey->periodosFK;
				$this->idperiodoDefaultFK=$cierre_contableForeignKey->idperiodoDefaultFK;
			}

			if($cierre_contable_session->bitBusquedaDesdeFKSesionperiodo) {
				$this->setVisibleBusquedasParaperiodo(true);
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
	
	function cargarCombosFKFromReturnGeneral($cierre_contableReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$cierre_contableReturnGeneral->strRecargarFkTipos;
			
			


			if($cierre_contableReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$cierre_contableReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$cierre_contableReturnGeneral->idempresaDefaultFK;
			}


			if($cierre_contableReturnGeneral->con_ejerciciosFK==true) {
				$this->ejerciciosFK=$cierre_contableReturnGeneral->ejerciciosFK;
				$this->idejercicioDefaultFK=$cierre_contableReturnGeneral->idejercicioDefaultFK;
			}


			if($cierre_contableReturnGeneral->con_periodosFK==true) {
				$this->periodosFK=$cierre_contableReturnGeneral->periodosFK;
				$this->idperiodoDefaultFK=$cierre_contableReturnGeneral->idperiodoDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(cierre_contable_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$cierre_contable_session=unserialize($this->Session->read(cierre_contable_util::$STR_SESSION_NAME));
		
		if($cierre_contable_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($cierre_contable_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($cierre_contable_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ejercicio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ejercicio';
			}
			else if($cierre_contable_session->getstrNombrePaginaNavegacionHaciaFKDesde()==periodo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='periodo';
			}
			
			$cierre_contable_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}						
			
			$this->cierre_contablesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cierre_contablesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cierre_contablesAuxiliar=array();
			}
			
			if(count($this->cierre_contablesAuxiliar) > 0) {
				
				foreach ($this->cierre_contablesAuxiliar as $cierre_contableSeleccionado) {
					$this->eliminarTablaBase($cierre_contableSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('cierre_contable_detalle');
			$tipoRelacionReporte->setsDescripcion('Cierre Detalles');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=cierre_contable_detalle_util::$STR_NOMBRE_CLASE;
		
		return $arrNombresClasesRelacionadasLocal;
	}
	
	
	public function setstrRecargarFkInicializar() {
		$this->setstrRecargarFk('TODOS','NINGUNO',0,'');		
	}
	
	
	
	public function getempresasFKListSelectItem() 
	{
		$empresasList=array();

		$item=null;

		foreach($this->empresasFK as $empresa)
		{
			$item=new SelectItem();
			$item->setLabel($empresa->getnombre());
			$item->setValue($empresa->getId());
			$empresasList[]=$item;
		}

		return $empresasList;
	}


	public function getejerciciosFKListSelectItem() 
	{
		$ejerciciosList=array();

		$item=null;

		foreach($this->ejerciciosFK as $ejercicio)
		{
			$item=new SelectItem();
			$item->setLabel($ejercicio->getId());
			$item->setValue($ejercicio->getId());
			$ejerciciosList[]=$item;
		}

		return $ejerciciosList;
	}


	public function getperiodosFKListSelectItem() 
	{
		$periodosList=array();

		$item=null;

		foreach($this->periodosFK as $periodo)
		{
			$item=new SelectItem();
			$item->setLabel($periodo->getnombre());
			$item->setValue($periodo->getId());
			$periodosList[]=$item;
		}

		return $periodosList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;
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
				$this->cierre_contableLogic->commitNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->rollbackNewConnexionToDeep();
				$this->cierre_contableLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$cierre_contablesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->cierre_contables as $cierre_contableLocal) {
				if($cierre_contableLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->cierre_contable=new cierre_contable();
				
				$this->cierre_contable->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->cierre_contables[]=$this->cierre_contable;*/
				
				$cierre_contablesNuevos[]=$this->cierre_contable;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cierre_contableLogic->setcierre_contables($cierre_contablesNuevos);
					
				$this->cierre_contableLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($cierre_contablesNuevos as $cierre_contableNuevo) {
					$this->cierre_contables[]=$cierre_contableNuevo;
				}
				
				/*$this->cierre_contables[]=$cierre_contablesNuevos;*/
				
				$this->cierre_contableLogic->setcierre_contables($this->cierre_contables);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($cierre_contablesNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cierre_contable_session=unserialize($this->Session->read(cierre_contable_util::$STR_SESSION_NAME));

		if($cierre_contable_session==null) {
			$cierre_contable_session=new cierre_contable_session();
		}
		
		if($cierre_contable_session->bitBusquedaDesdeFKSesionempresa!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=empresa_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalempresa=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalempresa=Funciones::GetFinalQueryAppend($finalQueryGlobalempresa, '');
				$finalQueryGlobalempresa.=empresa_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalempresa.$strRecargarFkQuery;		

				$empresaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosempresasFK($empresaLogic->getempresas());

		} else {
			$this->setVisibleBusquedasParaempresa(true);


			if($cierre_contable_session->bigidempresaActual!=null && $cierre_contable_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cierre_contable_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=cierre_contable_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery=''){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$this->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cierre_contable_session=unserialize($this->Session->read(cierre_contable_util::$STR_SESSION_NAME));

		if($cierre_contable_session==null) {
			$cierre_contable_session=new cierre_contable_session();
		}
		
		if($cierre_contable_session->bitBusquedaDesdeFKSesionejercicio!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=ejercicio_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalejercicio=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalejercicio=Funciones::GetFinalQueryAppend($finalQueryGlobalejercicio, '');
				$finalQueryGlobalejercicio.=ejercicio_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalejercicio.$strRecargarFkQuery;		

				$ejercicioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosejerciciosFK($ejercicioLogic->getejercicios());

		} else {
			$this->setVisibleBusquedasParaejercicio(true);


			if($cierre_contable_session->bigidejercicioActual!=null && $cierre_contable_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($cierre_contable_session->bigidejercicioActual);//WithConnection

				$this->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=cierre_contable_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$this->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery=''){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$this->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cierre_contable_session=unserialize($this->Session->read(cierre_contable_util::$STR_SESSION_NAME));

		if($cierre_contable_session==null) {
			$cierre_contable_session=new cierre_contable_session();
		}
		
		if($cierre_contable_session->bitBusquedaDesdeFKSesionperiodo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=periodo_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalperiodo=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalperiodo=Funciones::GetFinalQueryAppend($finalQueryGlobalperiodo, '');
				$finalQueryGlobalperiodo.=periodo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalperiodo.$strRecargarFkQuery;		

				$periodoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosperiodosFK($periodoLogic->getperiodos());

		} else {
			$this->setVisibleBusquedasParaperiodo(true);


			if($cierre_contable_session->bigidperiodoActual!=null && $cierre_contable_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($cierre_contable_session->bigidperiodoActual);//WithConnection

				$this->periodosFK[$periodoLogic->getperiodo()->getId()]=cierre_contable_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$this->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=cierre_contable_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombosejerciciosFK($ejercicios){

		foreach ($ejercicios as $ejercicioLocal ) {
			if($this->idejercicioDefaultFK==0) {
				$this->idejercicioDefaultFK=$ejercicioLocal->getId();
			}

			$this->ejerciciosFK[$ejercicioLocal->getId()]=cierre_contable_util::getejercicioDescripcion($ejercicioLocal);
		}
	}

	public function prepararCombosperiodosFK($periodos){

		foreach ($periodos as $periodoLocal ) {
			if($this->idperiodoDefaultFK==0) {
				$this->idperiodoDefaultFK=$periodoLocal->getId();
			}

			$this->periodosFK[$periodoLocal->getId()]=cierre_contable_util::getperiodoDescripcion($periodoLocal);
		}
	}

	
	
	public function cargarDescripcionempresaFK($idempresa,$connexion=null){
		$empresaLogic= new empresa_logic();
		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$strDescripcionempresa='';

		if($idempresa!=null && $idempresa!='' && $idempresa!='null') {
			if($connexion!=null) {
				$empresaLogic->getEntity($idempresa);//WithConnection
			} else {
				$empresaLogic->getEntityWithConnection($idempresa);//
			}

			$strDescripcionempresa=cierre_contable_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripcionejercicioFK($idejercicio,$connexion=null){
		$ejercicioLogic= new ejercicio_logic();
		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$strDescripcionejercicio='';

		if($idejercicio!=null && $idejercicio!='' && $idejercicio!='null') {
			if($connexion!=null) {
				$ejercicioLogic->getEntity($idejercicio);//WithConnection
			} else {
				$ejercicioLogic->getEntityWithConnection($idejercicio);//
			}

			$strDescripcionejercicio=cierre_contable_util::getejercicioDescripcion($ejercicioLogic->getejercicio());

		} else {
			$strDescripcionejercicio='null';
		}

		return $strDescripcionejercicio;
	}

	public function cargarDescripcionperiodoFK($idperiodo,$connexion=null){
		$periodoLogic= new periodo_logic();
		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$strDescripcionperiodo='';

		if($idperiodo!=null && $idperiodo!='' && $idperiodo!='null') {
			if($connexion!=null) {
				$periodoLogic->getEntity($idperiodo);//WithConnection
			} else {
				$periodoLogic->getEntityWithConnection($idperiodo);//
			}

			$strDescripcionperiodo=cierre_contable_util::getperiodoDescripcion($periodoLogic->getperiodo());

		} else {
			$strDescripcionperiodo='null';
		}

		return $strDescripcionperiodo;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(cierre_contable $cierre_contableClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$cierre_contableClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParaempresa($isParaempresa){
		$strParaVisibleempresa='display:table-row';
		$strParaVisibleNegacionempresa='display:none';

		if($isParaempresa) {
			$strParaVisibleempresa='display:table-row';
			$strParaVisibleNegacionempresa='display:none';
		} else {
			$strParaVisibleempresa='display:none';
			$strParaVisibleNegacionempresa='display:table-row';
		}


		$strParaVisibleNegacionempresa=trim($strParaVisibleNegacionempresa);

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionempresa;
	}

	public function setVisibleBusquedasParaejercicio($isParaejercicio){
		$strParaVisibleejercicio='display:table-row';
		$strParaVisibleNegacionejercicio='display:none';

		if($isParaejercicio) {
			$strParaVisibleejercicio='display:table-row';
			$strParaVisibleNegacionejercicio='display:none';
		} else {
			$strParaVisibleejercicio='display:none';
			$strParaVisibleNegacionejercicio='display:table-row';
		}


		$strParaVisibleNegacionejercicio=trim($strParaVisibleNegacionejercicio);

		$this->strVisibleFK_Idejercicio=$strParaVisibleejercicio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionejercicio;
	}

	public function setVisibleBusquedasParaperiodo($isParaperiodo){
		$strParaVisibleperiodo='display:table-row';
		$strParaVisibleNegacionperiodo='display:none';

		if($isParaperiodo) {
			$strParaVisibleperiodo='display:table-row';
			$strParaVisibleNegacionperiodo='display:none';
		} else {
			$strParaVisibleperiodo='display:none';
			$strParaVisibleNegacionperiodo='display:table-row';
		}


		$strParaVisibleNegacionperiodo=trim($strParaVisibleNegacionperiodo);

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idperiodo=$strParaVisibleperiodo;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idcierre_contableActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcierre_contableActual=$idcierre_contableActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cierre_contableJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cierre_contableJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcierre_contable,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaejercicio() {//$idcierre_contableActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcierre_contableActual=$idcierre_contableActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ejercicio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cierre_contableJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ejercicio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cierre_contableJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ejercicio_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcierre_contable,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaperiodo() {//$idcierre_contableActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcierre_contableActual=$idcierre_contableActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.periodo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cierre_contableJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',periodo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cierre_contableJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(periodo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcierre_contable,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParacierre_contable_detalles(int $idcierre_contableActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcierre_contableActual=$idcierre_contableActual;

		$bitPaginaPopupcierre_contable_detalle=false;

		try {

			$cierre_contable_session=unserialize($this->Session->read(cierre_contable_util::$STR_SESSION_NAME));

			if($cierre_contable_session==null) {
				$cierre_contable_session=new cierre_contable_session();
			}

			$cierre_contable_detalle_session=unserialize($this->Session->read(cierre_contable_detalle_util::$STR_SESSION_NAME));

			if($cierre_contable_detalle_session==null) {
				$cierre_contable_detalle_session=new cierre_contable_detalle_session();
			}

			$cierre_contable_detalle_session->strUltimaBusqueda='FK_Idcierre_contable';
			$cierre_contable_detalle_session->strPathNavegacionActual=$cierre_contable_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.cierre_contable_detalle_util::$STR_CLASS_WEB_TITULO;
			$cierre_contable_detalle_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcierre_contable_detalle=$cierre_contable_detalle_session->bitPaginaPopup;
			$cierre_contable_detalle_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcierre_contable_detalle=$cierre_contable_detalle_session->bitPaginaPopup;
			$cierre_contable_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
			$cierre_contable_detalle_session->strNombrePaginaNavegacionHaciaFKDesde=cierre_contable_util::$STR_NOMBRE_OPCION;
			$cierre_contable_detalle_session->bitBusquedaDesdeFKSesioncierre_contable=true;
			$cierre_contable_detalle_session->bigidcierre_contableActual=$this->idcierre_contableActual;

			$cierre_contable_session->bitBusquedaDesdeFKSesionFK=true;
			$cierre_contable_session->bigIdActualFK=$this->idcierre_contableActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"cierre_contable_detalle"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cierre_contable_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"cierre_contable_detalle"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cierre_contable_util::$STR_SESSION_NAME,serialize($cierre_contable_session));
			$this->Session->write(cierre_contable_detalle_util::$STR_SESSION_NAME,serialize($cierre_contable_detalle_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcierre_contable_detalle!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cierre_contable_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cierre_contable_detalle_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcierre_contable,$this->strTipoUsuarioAuxiliarcierre_contable,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cierre_contable_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cierre_contable_detalle_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarcierre_contable,$this->strTipoUsuarioAuxiliarcierre_contable,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(cierre_contable_util::$STR_SESSION_NAME,cierre_contable_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$cierre_contable_session=$this->Session->read(cierre_contable_util::$STR_SESSION_NAME);
				
		if($cierre_contable_session==null) {
			$cierre_contable_session=new cierre_contable_session();		
			//$this->Session->write('cierre_contable_session',$cierre_contable_session);							
		}
		*/
		
		$cierre_contable_session=new cierre_contable_session();
    	$cierre_contable_session->strPathNavegacionActual=cierre_contable_util::$STR_CLASS_WEB_TITULO;
    	$cierre_contable_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(cierre_contable_util::$STR_SESSION_NAME,serialize($cierre_contable_session));		
	}	
	
	public function getSetBusquedasSesionConfig(cierre_contable_session $cierre_contable_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($cierre_contable_session->bitBusquedaDesdeFKSesionFK!=null && $cierre_contable_session->bitBusquedaDesdeFKSesionFK==true) {
			if($cierre_contable_session->bigIdActualFK!=null && $cierre_contable_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$cierre_contable_session->bigIdActualFKParaPosibleAtras=$cierre_contable_session->bigIdActualFK;*/
			}
				
			$cierre_contable_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$cierre_contable_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(cierre_contable_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($cierre_contable_session->bitBusquedaDesdeFKSesionempresa!=null && $cierre_contable_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($cierre_contable_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(cierre_contable_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cierre_contable_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cierre_contable_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cierre_contable_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($cierre_contable_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cierre_contable_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cierre_contable_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cierre_contable_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;

				if($cierre_contable_session->intNumeroPaginacion==cierre_contable_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cierre_contable_session->intNumeroPaginacion;
				}
			}
			else if($cierre_contable_session->bitBusquedaDesdeFKSesionejercicio!=null && $cierre_contable_session->bitBusquedaDesdeFKSesionejercicio==true)
			{
				if($cierre_contable_session->bigidejercicioActual!=0) {
					$this->strAccionBusqueda='FK_Idejercicio';

					$existe_history=HistoryWeb::ExisteElemento(cierre_contable_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cierre_contable_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cierre_contable_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cierre_contable_session->bigidejercicioActualDescripcion);
						$historyWeb->setIdActual($cierre_contable_session->bigidejercicioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cierre_contable_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cierre_contable_session->bigidejercicioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cierre_contable_session->bitBusquedaDesdeFKSesionejercicio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;

				if($cierre_contable_session->intNumeroPaginacion==cierre_contable_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cierre_contable_session->intNumeroPaginacion;
				}
			}
			else if($cierre_contable_session->bitBusquedaDesdeFKSesionperiodo!=null && $cierre_contable_session->bitBusquedaDesdeFKSesionperiodo==true)
			{
				if($cierre_contable_session->bigidperiodoActual!=0) {
					$this->strAccionBusqueda='FK_Idperiodo';

					$existe_history=HistoryWeb::ExisteElemento(cierre_contable_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cierre_contable_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cierre_contable_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cierre_contable_session->bigidperiodoActualDescripcion);
						$historyWeb->setIdActual($cierre_contable_session->bigidperiodoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cierre_contable_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cierre_contable_session->bigidperiodoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cierre_contable_session->bitBusquedaDesdeFKSesionperiodo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;

				if($cierre_contable_session->intNumeroPaginacion==cierre_contable_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cierre_contable_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cierre_contable_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$cierre_contable_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$cierre_contable_session=unserialize($this->Session->read(cierre_contable_util::$STR_SESSION_NAME));
		
		if($cierre_contable_session==null) {
			$cierre_contable_session=new cierre_contable_session();
		}
		
		$cierre_contable_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$cierre_contable_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cierre_contable_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idejercicio') {
			$cierre_contable_session->id_ejercicio=$this->id_ejercicioFK_Idejercicio;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$cierre_contable_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idperiodo') {
			$cierre_contable_session->id_periodo=$this->id_periodoFK_Idperiodo;	

		}
		
		$this->Session->write(cierre_contable_util::$STR_SESSION_NAME,serialize($cierre_contable_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(cierre_contable_session $cierre_contable_session) {
		
		if($cierre_contable_session==null) {
			$cierre_contable_session=unserialize($this->Session->read(cierre_contable_util::$STR_SESSION_NAME));
		}
		
		if($cierre_contable_session==null) {
		   $cierre_contable_session=new cierre_contable_session();
		}
		
		if($cierre_contable_session->strUltimaBusqueda!=null && $cierre_contable_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$cierre_contable_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$cierre_contable_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$cierre_contable_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idejercicio') {
				$this->id_ejercicioFK_Idejercicio=$cierre_contable_session->id_ejercicio;
				$cierre_contable_session->id_ejercicio=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$cierre_contable_session->id_empresa;
				$cierre_contable_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idperiodo') {
				$this->id_periodoFK_Idperiodo=$cierre_contable_session->id_periodo;
				$cierre_contable_session->id_periodo=-1;

			}
		}
		
		$cierre_contable_session->strUltimaBusqueda='';
		//$cierre_contable_session->intNumeroPaginacion=10;
		$cierre_contable_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(cierre_contable_util::$STR_SESSION_NAME,serialize($cierre_contable_session));		
	}
	
	public function cierre_contablesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idejercicioDefaultFK = 0;
		$this->idperiodoDefaultFK = 0;
	}
	
	public function setcierre_contableFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_ejercicio',$this->idejercicioDefaultFK);
		$this->setExistDataCampoForm('form','id_periodo',$this->idperiodoDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		empresa::$class;
		empresa_carga::$CONTROLLER;

		ejercicio::$class;
		ejercicio_carga::$CONTROLLER;

		periodo::$class;
		periodo_carga::$CONTROLLER;
		
		//REL
		

		cierre_contable_detalle_carga::$CONTROLLER;
		cierre_contable_detalle_util::$STR_SCHEMA;
		cierre_contable_detalle_session::class;
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
		interface cierre_contable_controlI {	
		
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
		
		public function onLoad(cierre_contable_session $cierre_contable_session=null);	
		function index(?string $strTypeOnLoadcierre_contable='',?string $strTipoPaginaAuxiliarcierre_contable='',?string $strTipoUsuarioAuxiliarcierre_contable='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadcierre_contable='',string $strTipoPaginaAuxiliarcierre_contable='',string $strTipoUsuarioAuxiliarcierre_contable='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($cierre_contableReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(cierre_contable $cierre_contableClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(cierre_contable_session $cierre_contable_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(cierre_contable_session $cierre_contable_session);	
		public function cierre_contablesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setcierre_contableFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
