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

namespace com\bydan\contabilidad\seguridad\auditoria\presentation\control;

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

use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/auditoria/util/auditoria_carga.php');
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_carga;

use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_util;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_param_return;
use com\bydan\contabilidad\seguridad\auditoria\business\logic\auditoria_logic;
use com\bydan\contabilidad\seguridad\auditoria\presentation\session\auditoria_session;


//FK


use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

//REL


use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_carga;
use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_util;
use com\bydan\contabilidad\seguridad\auditoria_detalle\presentation\session\auditoria_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
auditoria_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
auditoria_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
auditoria_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
auditoria_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*auditoria_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/seguridad/auditoria/presentation/control/auditoria_init_control.php');
use com\bydan\contabilidad\seguridad\auditoria\presentation\control\auditoria_init_control;

include_once('com/bydan/contabilidad/seguridad/auditoria/presentation/control/auditoria_base_control.php');
use com\bydan\contabilidad\seguridad\auditoria\presentation\control\auditoria_base_control;

class auditoria_control extends auditoria_base_control {	
	
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
			else if($action=='registrarSesionParaauditoria_detalles' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idauditoriaActual=$this->getDataId();
				$this->registrarSesionParaauditoria_detalles($idauditoriaActual);
			} 
			
			
			else if($action=="BusquedaPorIdUsuarioPorFechaHora"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorIdUsuarioPorFechaHoraParaProcesar();
			}
			else if($action=="BusquedaPorIPPCPorFechaHora"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorIPPCPorFechaHoraParaProcesar();
			}
			else if($action=="BusquedaPorNombrePCPorFechaHora"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorNombrePCPorFechaHoraParaProcesar();
			}
			else if($action=="BusquedaPorNombreTablaPorFechaHora"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorNombreTablaPorFechaHoraParaProcesar();
			}
			else if($action=="BusquedaPorObservacionesPorFechaHora"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorObservacionesPorFechaHoraParaProcesar();
			}
			else if($action=="BusquedaPorProcesoPorFechaHora"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorProcesoPorFechaHoraParaProcesar();
			}
			else if($action=="BusquedaPorUsuarioPCPorFechaHora"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorUsuarioPCPorFechaHoraParaProcesar();
			}
			else if($action=="FK_Idusuario"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdusuarioParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idauditoriaActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$idauditoriaActual
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
					
					$auditoriaController = new auditoria_control();
					
					$auditoriaController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($auditoriaController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$auditoriaController = new auditoria_control();
						$auditoriaController = $this;
						
						$jsonResponse = json_encode($auditoriaController->auditorias);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->auditoriaReturnGeneral==null) {
					$this->auditoriaReturnGeneral=new auditoria_param_return();
				}
				
				echo($this->auditoriaReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$auditoriaController=new auditoria_control();
		
		$auditoriaController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$auditoriaController->usuarioActual=new usuario();
		
		$auditoriaController->usuarioActual->setId($this->usuarioActual->getId());
		$auditoriaController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$auditoriaController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$auditoriaController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$auditoriaController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$auditoriaController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$auditoriaController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$auditoriaController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $auditoriaController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadauditoria= $this->getDataGeneralString('strTypeOnLoadauditoria');
		$strTipoPaginaAuxiliarauditoria= $this->getDataGeneralString('strTipoPaginaAuxiliarauditoria');
		$strTipoUsuarioAuxiliarauditoria= $this->getDataGeneralString('strTipoUsuarioAuxiliarauditoria');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadauditoria,$strTipoPaginaAuxiliarauditoria,$strTipoUsuarioAuxiliarauditoria,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadauditoria!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('auditoria','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(auditoria_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarauditoria,$this->strTipoUsuarioAuxiliarauditoria,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(auditoria_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarauditoria,$this->strTipoUsuarioAuxiliarauditoria,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->auditoriaReturnGeneral=new auditoria_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->auditoriaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->auditoriaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->auditoriaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->auditoriaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->auditoriaReturnGeneral);
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
		$this->auditoriaReturnGeneral=new auditoria_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->auditoriaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->auditoriaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->auditoriaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->auditoriaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->auditoriaReturnGeneral);
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
		$this->auditoriaReturnGeneral=new auditoria_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->auditoriaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->auditoriaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->auditoriaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->auditoriaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->auditoriaReturnGeneral);
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
				$this->auditoriaLogic->getNewConnexionToDeep();
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
			
			
			$this->auditoriaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->auditoriaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->auditoriaReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->auditoriaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->auditoriaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->auditoriaReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->auditoriaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->auditoriaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->auditoriaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->auditoriaReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->auditoriaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->auditoriaReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->auditoriaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->auditoriaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->auditoriaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->auditoriaReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->auditoriaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->auditoriaReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
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
		
		$this->auditoriaLogic=new auditoria_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->auditoria=new auditoria();
		
		$this->strTypeOnLoadauditoria='onload';
		$this->strTipoPaginaAuxiliarauditoria='none';
		$this->strTipoUsuarioAuxiliarauditoria='none';	

		$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;
		
		$this->auditoriaModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->auditoriaControllerAdditional=new auditoria_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(auditoria_session $auditoria_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($auditoria_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadauditoria='',?string $strTipoPaginaAuxiliarauditoria='',?string $strTipoUsuarioAuxiliarauditoria='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadauditoria=$strTypeOnLoadauditoria;
			$this->strTipoPaginaAuxiliarauditoria=$strTipoPaginaAuxiliarauditoria;
			$this->strTipoUsuarioAuxiliarauditoria=$strTipoUsuarioAuxiliarauditoria;
	
			if($strTipoUsuarioAuxiliarauditoria=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->auditoria=new auditoria();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Auditorias';
			
			
			$auditoria_session=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME));
							
			if($auditoria_session==null) {
				$auditoria_session=new auditoria_session();
				
				/*$this->Session->write('auditoria_session',$auditoria_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($auditoria_session->strFuncionJsPadre!=null && $auditoria_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$auditoria_session->strFuncionJsPadre;
				
				$auditoria_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($auditoria_session);
			
			if($strTypeOnLoadauditoria!=null && $strTypeOnLoadauditoria=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$auditoria_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$auditoria_session->setPaginaPopupVariables(true);
				}
				
				if($auditoria_session->intNumeroPaginacion==auditoria_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$auditoria_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,auditoria_util::$STR_SESSION_NAME,'seguridad');																
			
			} else if($strTypeOnLoadauditoria!=null && $strTypeOnLoadauditoria=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$auditoria_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;*/
				
				if($auditoria_session->intNumeroPaginacion==auditoria_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$auditoria_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarauditoria!=null && $strTipoPaginaAuxiliarauditoria=='none') {
				/*$auditoria_session->strStyleDivHeader='display:table-row';*/
				
				/*$auditoria_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarauditoria!=null && $strTipoPaginaAuxiliarauditoria=='iframe') {
					/*
					$auditoria_session->strStyleDivArbol='display:none';
					$auditoria_session->strStyleDivHeader='display:none';
					$auditoria_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$auditoria_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->auditoriaClase=new auditoria();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=auditoria_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(auditoria_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->auditoriaLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->auditoriaLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$auditoriadetalleLogic=new auditoria_detalle_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->auditoriaLogic=new auditoria_logic();*/
			
			
			$this->auditoriasModel=null;
			/*new ListDataModel();*/
			
			/*$this->auditoriasModel.setWrappedData(auditoriaLogic->getauditorias());*/
						
			$this->auditorias= array();
			$this->auditoriasEliminados=array();
			$this->auditoriasSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= auditoria_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= auditoria_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->auditoria= new auditoria();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleBusquedaPorIdUsuarioPorFechaHora='display:table-row';
			$this->strVisibleBusquedaPorIPPCPorFechaHora='display:table-row';
			$this->strVisibleBusquedaPorNombrePCPorFechaHora='display:table-row';
			$this->strVisibleBusquedaPorNombreTablaPorFechaHora='display:table-row';
			$this->strVisibleBusquedaPorObservacionesPorFechaHora='display:table-row';
			$this->strVisibleBusquedaPorProcesoPorFechaHora='display:table-row';
			$this->strVisibleBusquedaPorUsuarioPCPorFechaHora='display:table-row';
			$this->strVisibleFK_Idusuario='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarauditoria!=null && $strTipoUsuarioAuxiliarauditoria!='none' && $strTipoUsuarioAuxiliarauditoria!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarauditoria);
																
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
				if($strTipoUsuarioAuxiliarauditoria!=null && $strTipoUsuarioAuxiliarauditoria!='none' && $strTipoUsuarioAuxiliarauditoria!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarauditoria);
																
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
				if($strTipoUsuarioAuxiliarauditoria==null || $strTipoUsuarioAuxiliarauditoria=='none' || $strTipoUsuarioAuxiliarauditoria=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarauditoria,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, auditoria_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, auditoria_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina auditoria');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($auditoria_session);
			
			$this->getSetBusquedasSesionConfig($auditoria_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteauditorias($this->strAccionBusqueda,$this->auditoriaLogic->getauditorias());*/
				} else if($this->strGenerarReporte=='Html')	{
					$auditoria_session->strServletGenerarHtmlReporte='auditoriaServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(auditoria_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(auditoria_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($auditoria_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$auditoria_session=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarauditoria!=null && $strTipoUsuarioAuxiliarauditoria=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($auditoria_session);
			}
								
			$this->set(auditoria_util::$STR_SESSION_NAME, $auditoria_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($auditoria_session);
			
			/*
			$this->auditoria->recursive = 0;
			
			$this->auditorias=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('auditorias', $this->auditorias);
			
			$this->set(auditoria_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->auditoriaActual =$this->auditoriaClase;
			
			/*$this->auditoriaActual =$this->migrarModelauditoria($this->auditoriaClase);*/
			
			$this->returnHtml(false);
			
			$this->set(auditoria_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=auditoria_util::$STR_NOMBRE_OPCION;
				
			if(auditoria_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=auditoria_util::$STR_MODULO_OPCION.auditoria_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(auditoria_util::$STR_SESSION_NAME,serialize($auditoria_session));
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
			/*$auditoriaClase= (auditoria) auditoriasModel.getRowData();*/
			
			$this->auditoriaClase->setId($this->auditoria->getId());	
			$this->auditoriaClase->setVersionRow($this->auditoria->getVersionRow());	
			$this->auditoriaClase->setVersionRow($this->auditoria->getVersionRow());	
			$this->auditoriaClase->setid_usuario($this->auditoria->getid_usuario());	
			$this->auditoriaClase->setnombre_tabla($this->auditoria->getnombre_tabla());	
			$this->auditoriaClase->setid_fila($this->auditoria->getid_fila());	
			$this->auditoriaClase->setaccion($this->auditoria->getaccion());	
			$this->auditoriaClase->setproceso($this->auditoria->getproceso());	
			$this->auditoriaClase->setnombre_pc($this->auditoria->getnombre_pc());	
			$this->auditoriaClase->setip_pc($this->auditoria->getip_pc());	
			$this->auditoriaClase->setusuario_pc($this->auditoria->getusuario_pc());	
			$this->auditoriaClase->setfecha_hora($this->auditoria->getfecha_hora());	
			$this->auditoriaClase->setobservacion($this->auditoria->getobservacion());	
		
			/*$this->Session->write('auditoriaVersionRowActual', auditoria.getVersionRow());*/
			
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
			
			$auditoria_session=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME));
						
			if($auditoria_session==null) {
				$auditoria_session=new auditoria_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('auditoria', $this->auditoria->read(null, $id));
	
			
			$this->auditoria->recursive = 0;
			
			$this->auditorias=$this->paginate();
			
			$this->set('auditorias', $this->auditorias);
	
			if (empty($this->data)) {
				$this->data = $this->auditoria->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->auditoriaLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->auditoriaClase);
			
			$this->auditoriaActual=$this->auditoriaClase;
			
			/*$this->auditoriaActual =$this->migrarModelauditoria($this->auditoriaClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->auditoriaLogic->getauditorias(),$this->auditoriaActual);
			
			$this->actualizarControllerConReturnGeneral($this->auditoriaReturnGeneral);
			
			//$this->auditoriaReturnGeneral=$this->auditoriaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->auditoriaLogic->getauditorias(),$this->auditoriaActual,$this->auditoriaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$auditoria_session=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME));
						
			if($auditoria_session==null) {
				$auditoria_session=new auditoria_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoauditoria', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->auditoriaClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->auditoriaClase);
			
			$this->auditoriaActual =$this->auditoriaClase;
			
			/*$this->auditoriaActual =$this->migrarModelauditoria($this->auditoriaClase);*/
			
			$this->setauditoriaFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->auditoriaLogic->getauditorias(),$this->auditoria);
			
			$this->actualizarControllerConReturnGeneral($this->auditoriaReturnGeneral);
			
			//this->auditoriaReturnGeneral=$this->auditoriaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->auditoriaLogic->getauditorias(),$this->auditoria,$this->auditoriaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->auditoriaReturnGeneral->getauditoria()->setid_usuario($this->idusuarioDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->auditoriaReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->auditoriaReturnGeneral->getauditoria(),$this->auditoriaActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyauditoria($this->auditoriaReturnGeneral->getauditoria());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioauditoria($this->auditoriaReturnGeneral->getauditoria());*/
			}
			
			if($this->auditoriaReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->auditoriaReturnGeneral->getauditoria(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualauditoria($this->auditoria,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->auditoriasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->auditoriasAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->auditoriasAuxiliar=array();
			}
			
			if(count($this->auditoriasAuxiliar)==2) {
				$auditoriaOrigen=$this->auditoriasAuxiliar[0];
				$auditoriaDestino=$this->auditoriasAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($auditoriaOrigen,$auditoriaDestino,true,false,false);
				
				$this->actualizarLista($auditoriaDestino,$this->auditorias);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->auditoriasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->auditoriasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->auditoriasAuxiliar=array();
			}
			
			if(count($this->auditoriasAuxiliar) > 0) {
				foreach ($this->auditoriasAuxiliar as $auditoriaSeleccionado) {
					$this->auditoria=new auditoria();
					
					$this->setCopiarVariablesObjetos($auditoriaSeleccionado,$this->auditoria,true,true,false);
						
					$this->auditorias[]=$this->auditoria;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->auditoriasEliminados as $auditoriaEliminado) {
				$this->auditoriaLogic->auditorias[]=$auditoriaEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->auditoria=new auditoria();
							
				$this->auditorias[]=$this->auditoria;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
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
		
		$auditoriaActual=new auditoria();
		
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
				
				$auditoriaActual=$this->auditorias[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $auditoriaActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $auditoriaActual->setnombre_tabla($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $auditoriaActual->setid_fila((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $auditoriaActual->setaccion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $auditoriaActual->setproceso($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $auditoriaActual->setnombre_pc($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $auditoriaActual->setip_pc($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $auditoriaActual->setusuario_pc($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $auditoriaActual->setfecha_hora(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $auditoriaActual->setobservacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->auditoriasAuxiliar=array();		 
		/*$this->auditoriasEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->auditoriasAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->auditoriasAuxiliar=array();
		}
			
		if(count($this->auditoriasAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->auditoriasAuxiliar as $auditoriaAuxLocal) {				
				
				foreach($this->auditorias as $auditoriaLocal) {
					if($auditoriaLocal->getId()==$auditoriaAuxLocal->getId()) {
						$auditoriaLocal->setIsDeleted(true);
						
						/*$this->auditoriasEliminados[]=$auditoriaLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->auditoriaLogic->setauditorias($this->auditorias);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
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
				$this->auditoriaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadauditoria='',string $strTipoPaginaAuxiliarauditoria='',string $strTipoUsuarioAuxiliarauditoria='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadauditoria,$strTipoPaginaAuxiliarauditoria,$strTipoUsuarioAuxiliarauditoria,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->auditorias) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=auditoria_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=auditoria_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=auditoria_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$auditoria_session=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME));
						
			if($auditoria_session==null) {
				$auditoria_session=new auditoria_session();
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
					/*$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;*/
					
					if($auditoria_session->intNumeroPaginacion==auditoria_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$auditoria_session->intNumeroPaginacion;
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
			
			$this->auditoriasEliminados=array();
			
			/*$this->auditoriaLogic->setConnexion($connexion);*/
			
			$this->auditoriaLogic->setIsConDeep(true);
			
			$this->auditoriaLogic->getauditoriaDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('usuario');$classes[]=$class;
			
			$this->auditoriaLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->auditoriaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->auditoriaLogic->getauditorias()==null|| count($this->auditoriaLogic->getauditorias())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->auditorias=$this->auditoriaLogic->getauditorias();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->auditoriaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->auditoriasReporte=$this->auditoriaLogic->getauditorias();
									
						/*$this->generarReportes('Todos',$this->auditoriaLogic->getauditorias());*/
					
						$this->auditoriaLogic->setauditorias($this->auditorias);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->auditoriaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->auditoriaLogic->getauditorias()==null|| count($this->auditoriaLogic->getauditorias())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->auditorias=$this->auditoriaLogic->getauditorias();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->auditoriaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->auditoriasReporte=$this->auditoriaLogic->getauditorias();
									
						/*$this->generarReportes('Todos',$this->auditoriaLogic->getauditorias());*/
					
						$this->auditoriaLogic->setauditorias($this->auditorias);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idauditoria=0;*/
				
				if($auditoria_session->bitBusquedaDesdeFKSesionFK!=null && $auditoria_session->bitBusquedaDesdeFKSesionFK==true) {
					if($auditoria_session->bigIdActualFK!=null && $auditoria_session->bigIdActualFK!=0)	{
						$this->idauditoria=$auditoria_session->bigIdActualFK;	
					}
					
					$auditoria_session->bitBusquedaDesdeFKSesionFK=false;
					
					$auditoria_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idauditoria=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idauditoria=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->auditoriaLogic->getEntity($this->idauditoria);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*auditoriaLogicAdditional::getDetalleIndicePorId($idauditoria);*/

				
				if($this->auditoriaLogic->getauditoria()!=null) {
					$this->auditoriaLogic->setauditorias(array());
					$this->auditoriaLogic->auditorias[]=$this->auditoriaLogic->getauditoria();
				}
			
			}
		
			else if($strAccionBusqueda=='BusquedaPorIdUsuarioPorFechaHora')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoriaLogic->getsBusquedaPorIdUsuarioPorFechaHora($finalQueryPaginacion,$this->pagination,$this->id_usuarioBusquedaPorIdUsuarioPorFechaHora,$this->fecha_horaBusquedaPorIdUsuarioPorFechaHora,$this->fecha_horaFinalBusquedaPorIdUsuarioPorFechaHora);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//auditoriaLogicAdditional::getDetalleIndiceBusquedaPorIdUsuarioPorFechaHora($this->id_usuarioBusquedaPorIdUsuarioPorFechaHora,$this->fecha_horaBusquedaPorIdUsuarioPorFechaHora,$this->fecha_horaFinalBusquedaPorIdUsuarioPorFechaHora);


					if($this->auditoriaLogic->getauditorias()==null || count($this->auditoriaLogic->getauditorias())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$auditorias=$this->auditoriaLogic->getauditorias();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoriaLogic->getsBusquedaPorIdUsuarioPorFechaHora('',$this->pagination,$this->id_usuarioBusquedaPorIdUsuarioPorFechaHora,$this->fecha_horaBusquedaPorIdUsuarioPorFechaHora,$this->fecha_horaFinalBusquedaPorIdUsuarioPorFechaHora);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->auditoriasReporte=$this->auditoriaLogic->getauditorias();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteauditorias("BusquedaPorIdUsuarioPorFechaHora",$this->auditoriaLogic->getauditorias());

					if($this->strTipoPaginacion=='TODOS') {
						$this->auditoriaLogic->setauditorias($auditorias);
					}
				//}

			}
			else if($strAccionBusqueda=='BusquedaPorIPPCPorFechaHora')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoriaLogic->getsBusquedaPorIPPCPorFechaHora($finalQueryPaginacion,$this->pagination,$this->ip_pcBusquedaPorIPPCPorFechaHora,$this->fecha_horaBusquedaPorIPPCPorFechaHora,$this->fecha_horaFinalBusquedaPorIPPCPorFechaHora);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//auditoriaLogicAdditional::getDetalleIndiceBusquedaPorIPPCPorFechaHora($this->ip_pcBusquedaPorIPPCPorFechaHora,$this->fecha_horaBusquedaPorIPPCPorFechaHora,$this->fecha_horaFinalBusquedaPorIPPCPorFechaHora);


					if($this->auditoriaLogic->getauditorias()==null || count($this->auditoriaLogic->getauditorias())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$auditorias=$this->auditoriaLogic->getauditorias();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoriaLogic->getsBusquedaPorIPPCPorFechaHora('',$this->pagination,$this->ip_pcBusquedaPorIPPCPorFechaHora,$this->fecha_horaBusquedaPorIPPCPorFechaHora,$this->fecha_horaFinalBusquedaPorIPPCPorFechaHora);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->auditoriasReporte=$this->auditoriaLogic->getauditorias();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteauditorias("BusquedaPorIPPCPorFechaHora",$this->auditoriaLogic->getauditorias());

					if($this->strTipoPaginacion=='TODOS') {
						$this->auditoriaLogic->setauditorias($auditorias);
					}
				//}

			}
			else if($strAccionBusqueda=='BusquedaPorNombrePCPorFechaHora')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoriaLogic->getsBusquedaPorNombrePCPorFechaHora($finalQueryPaginacion,$this->pagination,$this->nombre_pcBusquedaPorNombrePCPorFechaHora,$this->fecha_horaBusquedaPorNombrePCPorFechaHora,$this->fecha_horaFinalBusquedaPorNombrePCPorFechaHora);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//auditoriaLogicAdditional::getDetalleIndiceBusquedaPorNombrePCPorFechaHora($this->nombre_pcBusquedaPorNombrePCPorFechaHora,$this->fecha_horaBusquedaPorNombrePCPorFechaHora,$this->fecha_horaFinalBusquedaPorNombrePCPorFechaHora);


					if($this->auditoriaLogic->getauditorias()==null || count($this->auditoriaLogic->getauditorias())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$auditorias=$this->auditoriaLogic->getauditorias();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoriaLogic->getsBusquedaPorNombrePCPorFechaHora('',$this->pagination,$this->nombre_pcBusquedaPorNombrePCPorFechaHora,$this->fecha_horaBusquedaPorNombrePCPorFechaHora,$this->fecha_horaFinalBusquedaPorNombrePCPorFechaHora);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->auditoriasReporte=$this->auditoriaLogic->getauditorias();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteauditorias("BusquedaPorNombrePCPorFechaHora",$this->auditoriaLogic->getauditorias());

					if($this->strTipoPaginacion=='TODOS') {
						$this->auditoriaLogic->setauditorias($auditorias);
					}
				//}

			}
			else if($strAccionBusqueda=='BusquedaPorNombreTablaPorFechaHora')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoriaLogic->getsBusquedaPorNombreTablaPorFechaHora($finalQueryPaginacion,$this->pagination,$this->nombre_tablaBusquedaPorNombreTablaPorFechaHora,$this->fecha_horaBusquedaPorNombreTablaPorFechaHora,$this->fecha_horaFinalBusquedaPorNombreTablaPorFechaHora);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//auditoriaLogicAdditional::getDetalleIndiceBusquedaPorNombreTablaPorFechaHora($this->nombre_tablaBusquedaPorNombreTablaPorFechaHora,$this->fecha_horaBusquedaPorNombreTablaPorFechaHora,$this->fecha_horaFinalBusquedaPorNombreTablaPorFechaHora);


					if($this->auditoriaLogic->getauditorias()==null || count($this->auditoriaLogic->getauditorias())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$auditorias=$this->auditoriaLogic->getauditorias();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoriaLogic->getsBusquedaPorNombreTablaPorFechaHora('',$this->pagination,$this->nombre_tablaBusquedaPorNombreTablaPorFechaHora,$this->fecha_horaBusquedaPorNombreTablaPorFechaHora,$this->fecha_horaFinalBusquedaPorNombreTablaPorFechaHora);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->auditoriasReporte=$this->auditoriaLogic->getauditorias();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteauditorias("BusquedaPorNombreTablaPorFechaHora",$this->auditoriaLogic->getauditorias());

					if($this->strTipoPaginacion=='TODOS') {
						$this->auditoriaLogic->setauditorias($auditorias);
					}
				//}

			}
			else if($strAccionBusqueda=='BusquedaPorObservacionesPorFechaHora')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoriaLogic->getsBusquedaPorObservacionesPorFechaHora($finalQueryPaginacion,$this->pagination,$this->fecha_horaBusquedaPorObservacionesPorFechaHora,$this->fecha_horaFinalBusquedaPorObservacionesPorFechaHora,$this->observacionBusquedaPorObservacionesPorFechaHora);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//auditoriaLogicAdditional::getDetalleIndiceBusquedaPorObservacionesPorFechaHora($this->fecha_horaBusquedaPorObservacionesPorFechaHora,$this->fecha_horaFinalBusquedaPorObservacionesPorFechaHora,$this->observacionBusquedaPorObservacionesPorFechaHora);


					if($this->auditoriaLogic->getauditorias()==null || count($this->auditoriaLogic->getauditorias())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$auditorias=$this->auditoriaLogic->getauditorias();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoriaLogic->getsBusquedaPorObservacionesPorFechaHora('',$this->pagination,$this->fecha_horaBusquedaPorObservacionesPorFechaHora,$this->fecha_horaFinalBusquedaPorObservacionesPorFechaHora,$this->observacionBusquedaPorObservacionesPorFechaHora);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->auditoriasReporte=$this->auditoriaLogic->getauditorias();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteauditorias("BusquedaPorObservacionesPorFechaHora",$this->auditoriaLogic->getauditorias());

					if($this->strTipoPaginacion=='TODOS') {
						$this->auditoriaLogic->setauditorias($auditorias);
					}
				//}

			}
			else if($strAccionBusqueda=='BusquedaPorProcesoPorFechaHora')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoriaLogic->getsBusquedaPorProcesoPorFechaHora($finalQueryPaginacion,$this->pagination,$this->procesoBusquedaPorProcesoPorFechaHora,$this->fecha_horaBusquedaPorProcesoPorFechaHora,$this->fecha_horaFinalBusquedaPorProcesoPorFechaHora);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//auditoriaLogicAdditional::getDetalleIndiceBusquedaPorProcesoPorFechaHora($this->procesoBusquedaPorProcesoPorFechaHora,$this->fecha_horaBusquedaPorProcesoPorFechaHora,$this->fecha_horaFinalBusquedaPorProcesoPorFechaHora);


					if($this->auditoriaLogic->getauditorias()==null || count($this->auditoriaLogic->getauditorias())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$auditorias=$this->auditoriaLogic->getauditorias();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoriaLogic->getsBusquedaPorProcesoPorFechaHora('',$this->pagination,$this->procesoBusquedaPorProcesoPorFechaHora,$this->fecha_horaBusquedaPorProcesoPorFechaHora,$this->fecha_horaFinalBusquedaPorProcesoPorFechaHora);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->auditoriasReporte=$this->auditoriaLogic->getauditorias();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteauditorias("BusquedaPorProcesoPorFechaHora",$this->auditoriaLogic->getauditorias());

					if($this->strTipoPaginacion=='TODOS') {
						$this->auditoriaLogic->setauditorias($auditorias);
					}
				//}

			}
			else if($strAccionBusqueda=='BusquedaPorUsuarioPCPorFechaHora')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoriaLogic->getsBusquedaPorUsuarioPCPorFechaHora($finalQueryPaginacion,$this->pagination,$this->usuario_pcBusquedaPorUsuarioPCPorFechaHora,$this->fecha_horaBusquedaPorUsuarioPCPorFechaHora,$this->fecha_horaFinalBusquedaPorUsuarioPCPorFechaHora);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//auditoriaLogicAdditional::getDetalleIndiceBusquedaPorUsuarioPCPorFechaHora($this->usuario_pcBusquedaPorUsuarioPCPorFechaHora,$this->fecha_horaBusquedaPorUsuarioPCPorFechaHora,$this->fecha_horaFinalBusquedaPorUsuarioPCPorFechaHora);


					if($this->auditoriaLogic->getauditorias()==null || count($this->auditoriaLogic->getauditorias())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$auditorias=$this->auditoriaLogic->getauditorias();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoriaLogic->getsBusquedaPorUsuarioPCPorFechaHora('',$this->pagination,$this->usuario_pcBusquedaPorUsuarioPCPorFechaHora,$this->fecha_horaBusquedaPorUsuarioPCPorFechaHora,$this->fecha_horaFinalBusquedaPorUsuarioPCPorFechaHora);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->auditoriasReporte=$this->auditoriaLogic->getauditorias();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteauditorias("BusquedaPorUsuarioPCPorFechaHora",$this->auditoriaLogic->getauditorias());

					if($this->strTipoPaginacion=='TODOS') {
						$this->auditoriaLogic->setauditorias($auditorias);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($auditoria_session->bigidusuarioActual!=null && $auditoria_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$auditoria_session->bigidusuarioActual;
					$auditoria_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoriaLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//auditoriaLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->auditoriaLogic->getauditorias()==null || count($this->auditoriaLogic->getauditorias())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$auditorias=$this->auditoriaLogic->getauditorias();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->auditoriaLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->auditoriasReporte=$this->auditoriaLogic->getauditorias();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteauditorias("FK_Idusuario",$this->auditoriaLogic->getauditorias());

					if($this->strTipoPaginacion=='TODOS') {
						$this->auditoriaLogic->setauditorias($auditorias);
					}
				//}

			} 
		
		$auditoria_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$auditoria_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->auditoriaLogic->loadForeignsKeysDescription();*/
		
		$this->auditorias=$this->auditoriaLogic->getauditorias();
		
		if($this->auditoriasEliminados==null) {
			$this->auditoriasEliminados=array();
		}
		
		$this->Session->write(auditoria_util::$STR_SESSION_NAME.'Lista',serialize($this->auditorias));
		$this->Session->write(auditoria_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->auditoriasEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(auditoria_util::$STR_SESSION_NAME,serialize($auditoria_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idauditoria=$idGeneral;
			
			$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
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
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}

			if(count($this->auditorias) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
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
				$this->auditoriaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioBusquedaPorIdUsuarioPorFechaHora=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorIdUsuarioPorFechaHora','cmbid_usuario');
			$this->fecha_horaBusquedaPorIdUsuarioPorFechaHora=Funciones::getFechaHoraFromDataBusqueda('date',$this->data,''.$this->strSufijo.'BusquedaPorIdUsuarioPorFechaHora','dtfecha_hora');
			$this->fecha_horaFinalBusquedaPorIdUsuarioPorFechaHora=Funciones::getFechaHoraFromDataBusqueda('date',$this->data,''.$this->strSufijo.'BusquedaPorIdUsuarioPorFechaHora','dtfecha_horaFinal');

			$this->strAccionBusqueda='BusquedaPorIdUsuarioPorFechaHora';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsBusquedaPorIPPCPorFechaHoraParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->ip_pcBusquedaPorIPPCPorFechaHora=(string)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorIPPCPorFechaHora','txtip_pc');
			$this->fecha_horaBusquedaPorIPPCPorFechaHora=Funciones::getFechaHoraFromDataBusqueda('date',$this->data,''.$this->strSufijo.'BusquedaPorIPPCPorFechaHora','dtfecha_hora');
			$this->fecha_horaFinalBusquedaPorIPPCPorFechaHora=Funciones::getFechaHoraFromDataBusqueda('date',$this->data,''.$this->strSufijo.'BusquedaPorIPPCPorFechaHora','dtfecha_horaFinal');

			$this->strAccionBusqueda='BusquedaPorIPPCPorFechaHora';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsBusquedaPorNombrePCPorFechaHoraParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->nombre_pcBusquedaPorNombrePCPorFechaHora=(string)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorNombrePCPorFechaHora','txtnombre_pc');
			$this->fecha_horaBusquedaPorNombrePCPorFechaHora=Funciones::getFechaHoraFromDataBusqueda('date',$this->data,''.$this->strSufijo.'BusquedaPorNombrePCPorFechaHora','dtfecha_hora');
			$this->fecha_horaFinalBusquedaPorNombrePCPorFechaHora=Funciones::getFechaHoraFromDataBusqueda('date',$this->data,''.$this->strSufijo.'BusquedaPorNombrePCPorFechaHora','dtfecha_horaFinal');

			$this->strAccionBusqueda='BusquedaPorNombrePCPorFechaHora';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsBusquedaPorNombreTablaPorFechaHoraParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->nombre_tablaBusquedaPorNombreTablaPorFechaHora=(string)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorNombreTablaPorFechaHora','txtnombre_tabla');
			$this->fecha_horaBusquedaPorNombreTablaPorFechaHora=Funciones::getFechaHoraFromDataBusqueda('date',$this->data,''.$this->strSufijo.'BusquedaPorNombreTablaPorFechaHora','dtfecha_hora');
			$this->fecha_horaFinalBusquedaPorNombreTablaPorFechaHora=Funciones::getFechaHoraFromDataBusqueda('date',$this->data,''.$this->strSufijo.'BusquedaPorNombreTablaPorFechaHora','dtfecha_horaFinal');

			$this->strAccionBusqueda='BusquedaPorNombreTablaPorFechaHora';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsBusquedaPorObservacionesPorFechaHoraParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->fecha_horaBusquedaPorObservacionesPorFechaHora=Funciones::getFechaHoraFromDataBusqueda('date',$this->data,''.$this->strSufijo.'BusquedaPorObservacionesPorFechaHora','dtfecha_hora');
			$this->fecha_horaFinalBusquedaPorObservacionesPorFechaHora=Funciones::getFechaHoraFromDataBusqueda('date',$this->data,''.$this->strSufijo.'BusquedaPorObservacionesPorFechaHora','dtfecha_horaFinal');
			$this->observacionBusquedaPorObservacionesPorFechaHora=(string)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorObservacionesPorFechaHora','txtobservacion');

			$this->strAccionBusqueda='BusquedaPorObservacionesPorFechaHora';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsBusquedaPorProcesoPorFechaHoraParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->procesoBusquedaPorProcesoPorFechaHora=(string)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorProcesoPorFechaHora','txtproceso');
			$this->fecha_horaBusquedaPorProcesoPorFechaHora=Funciones::getFechaHoraFromDataBusqueda('date',$this->data,''.$this->strSufijo.'BusquedaPorProcesoPorFechaHora','dtfecha_hora');
			$this->fecha_horaFinalBusquedaPorProcesoPorFechaHora=Funciones::getFechaHoraFromDataBusqueda('date',$this->data,''.$this->strSufijo.'BusquedaPorProcesoPorFechaHora','dtfecha_horaFinal');

			$this->strAccionBusqueda='BusquedaPorProcesoPorFechaHora';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsBusquedaPorUsuarioPCPorFechaHoraParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->usuario_pcBusquedaPorUsuarioPCPorFechaHora=(string)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorUsuarioPCPorFechaHora','txtusuario_pc');
			$this->fecha_horaBusquedaPorUsuarioPCPorFechaHora=Funciones::getFechaHoraFromDataBusqueda('date',$this->data,''.$this->strSufijo.'BusquedaPorUsuarioPCPorFechaHora','dtfecha_hora');
			$this->fecha_horaFinalBusquedaPorUsuarioPCPorFechaHora=Funciones::getFechaHoraFromDataBusqueda('date',$this->data,''.$this->strSufijo.'BusquedaPorUsuarioPCPorFechaHora','dtfecha_horaFinal');

			$this->strAccionBusqueda='BusquedaPorUsuarioPCPorFechaHora';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
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
				$this->auditoriaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsBusquedaPorIdUsuarioPorFechaHora($strFinalQuery,$id_usuario,$fecha_hora,$fecha_horaFinal)
	{
		try
		{

			$this->auditoriaLogic->getsBusquedaPorIdUsuarioPorFechaHora($strFinalQuery,new Pagination(),$id_usuario,$fecha_hora,$fecha_horaFinal);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsBusquedaPorIPPCPorFechaHora($strFinalQuery,$ip_pc,$fecha_hora,$fecha_horaFinal)
	{
		try
		{

			$this->auditoriaLogic->getsBusquedaPorIPPCPorFechaHora($strFinalQuery,new Pagination(),$ip_pc,$fecha_hora,$fecha_horaFinal);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsBusquedaPorNombrePCPorFechaHora($strFinalQuery,$nombre_pc,$fecha_hora,$fecha_horaFinal)
	{
		try
		{

			$this->auditoriaLogic->getsBusquedaPorNombrePCPorFechaHora($strFinalQuery,new Pagination(),$nombre_pc,$fecha_hora,$fecha_horaFinal);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsBusquedaPorNombreTablaPorFechaHora($strFinalQuery,$nombre_tabla,$fecha_hora,$fecha_horaFinal)
	{
		try
		{

			$this->auditoriaLogic->getsBusquedaPorNombreTablaPorFechaHora($strFinalQuery,new Pagination(),$nombre_tabla,$fecha_hora,$fecha_horaFinal);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsBusquedaPorObservacionesPorFechaHora($strFinalQuery,$fecha_hora,$fecha_horaFinal,$observacion)
	{
		try
		{

			$this->auditoriaLogic->getsBusquedaPorObservacionesPorFechaHora($strFinalQuery,new Pagination(),$fecha_hora,$fecha_horaFinal,$observacion);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsBusquedaPorProcesoPorFechaHora($strFinalQuery,$proceso,$fecha_hora,$fecha_horaFinal)
	{
		try
		{

			$this->auditoriaLogic->getsBusquedaPorProcesoPorFechaHora($strFinalQuery,new Pagination(),$proceso,$fecha_hora,$fecha_horaFinal);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsBusquedaPorUsuarioPCPorFechaHora($strFinalQuery,$usuario_pc,$fecha_hora,$fecha_horaFinal)
	{
		try
		{

			$this->auditoriaLogic->getsBusquedaPorUsuarioPCPorFechaHora($strFinalQuery,new Pagination(),$usuario_pc,$fecha_hora,$fecha_horaFinal);
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

			$this->auditoriaLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
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
			
			
			$auditoriaForeignKey=new auditoria_param_return(); //auditoriaForeignKey();
			
			$auditoria_session=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME));
						
			if($auditoria_session==null) {
				$auditoria_session=new auditoria_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$auditoriaForeignKey=$this->auditoriaLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$auditoria_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$auditoriaForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$auditoriaForeignKey->idusuarioDefaultFK;
			}

			if($auditoria_session->bitBusquedaDesdeFKSesionusuario) {
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
	
	function cargarCombosFKFromReturnGeneral($auditoriaReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$auditoriaReturnGeneral->strRecargarFkTipos;
			
			


			if($auditoriaReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$auditoriaReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$auditoriaReturnGeneral->idusuarioDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(auditoria_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$auditoria_session=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME));
		
		if($auditoria_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($auditoria_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			
			$auditoria_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->getNewConnexionToDeep();
			}						
			
			$this->auditoriasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->auditoriasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->auditoriasAuxiliar=array();
			}
			
			if(count($this->auditoriasAuxiliar) > 0) {
				
				foreach ($this->auditoriasAuxiliar as $auditoriaSeleccionado) {
					$this->eliminarTablaBase($auditoriaSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('auditoria_detalle');
			$tipoRelacionReporte->setsDescripcion(' Detalles');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=auditoria_detalle_util::$STR_NOMBRE_CLASE;
		
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
				$this->auditoriaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;
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
				$this->auditoriaLogic->commitNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->rollbackNewConnexionToDeep();
				$this->auditoriaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$auditoriasNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->auditorias as $auditoriaLocal) {
				if($auditoriaLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->auditoria=new auditoria();
				
				$this->auditoria->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->auditorias[]=$this->auditoria;*/
				
				$auditoriasNuevos[]=$this->auditoria;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('usuario');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->auditoriaLogic->setauditorias($auditoriasNuevos);
					
				$this->auditoriaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($auditoriasNuevos as $auditoriaNuevo) {
					$this->auditorias[]=$auditoriaNuevo;
				}
				
				/*$this->auditorias[]=$auditoriasNuevos;*/
				
				$this->auditoriaLogic->setauditorias($this->auditorias);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($auditoriasNuevos!=null);
	}
					
	
	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery=''){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$this->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$auditoria_session=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME));

		if($auditoria_session==null) {
			$auditoria_session=new auditoria_session();
		}
		
		if($auditoria_session->bitBusquedaDesdeFKSesionusuario!=true) {
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


			if($auditoria_session->bigidusuarioActual!=null && $auditoria_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($auditoria_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=auditoria_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	
	
	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=auditoria_util::getusuarioDescripcion($usuarioLocal);
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

			$strDescripcionusuario=auditoria_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(auditoria $auditoriaClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$auditoriaClase->setid_usuario($this->usuarioActual->getId());
			
			
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
		$this->strVisibleBusquedaPorIPPCPorFechaHora=$strParaVisibleNegacionusuario;
		$this->strVisibleBusquedaPorNombrePCPorFechaHora=$strParaVisibleNegacionusuario;
		$this->strVisibleBusquedaPorNombreTablaPorFechaHora=$strParaVisibleNegacionusuario;
		$this->strVisibleBusquedaPorObservacionesPorFechaHora=$strParaVisibleNegacionusuario;
		$this->strVisibleBusquedaPorProcesoPorFechaHora=$strParaVisibleNegacionusuario;
		$this->strVisibleBusquedaPorUsuarioPCPorFechaHora=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idusuario=$strParaVisibleusuario;
	}
	
	

	public function abrirBusquedaParausuario() {//$idauditoriaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idauditoriaActual=$idauditoriaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.auditoriaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.auditoriaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarauditoria,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParaauditoria_detalles(int $idauditoriaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idauditoriaActual=$idauditoriaActual;

		$bitPaginaPopupauditoria_detalle=false;

		try {

			$auditoria_session=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME));

			if($auditoria_session==null) {
				$auditoria_session=new auditoria_session();
			}

			$auditoria_detalle_session=unserialize($this->Session->read(auditoria_detalle_util::$STR_SESSION_NAME));

			if($auditoria_detalle_session==null) {
				$auditoria_detalle_session=new auditoria_detalle_session();
			}

			$auditoria_detalle_session->strUltimaBusqueda='FK_Idauditoria';
			$auditoria_detalle_session->strPathNavegacionActual=$auditoria_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.auditoria_detalle_util::$STR_CLASS_WEB_TITULO;
			$auditoria_detalle_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupauditoria_detalle=$auditoria_detalle_session->bitPaginaPopup;
			$auditoria_detalle_session->setPaginaPopupVariables(true);
			$bitPaginaPopupauditoria_detalle=$auditoria_detalle_session->bitPaginaPopup;
			$auditoria_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
			$auditoria_detalle_session->strNombrePaginaNavegacionHaciaFKDesde=auditoria_util::$STR_NOMBRE_OPCION;
			$auditoria_detalle_session->bitBusquedaDesdeFKSesionauditoria=true;
			$auditoria_detalle_session->bigidauditoriaActual=$this->idauditoriaActual;

			$auditoria_session->bitBusquedaDesdeFKSesionFK=true;
			$auditoria_session->bigIdActualFK=$this->idauditoriaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"auditoria_detalle"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=auditoria_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"auditoria_detalle"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(auditoria_util::$STR_SESSION_NAME,serialize($auditoria_session));
			$this->Session->write(auditoria_detalle_util::$STR_SESSION_NAME,serialize($auditoria_detalle_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupauditoria_detalle!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',auditoria_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(auditoria_detalle_util::$STR_CLASS_NAME,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarauditoria,$this->strTipoUsuarioAuxiliarauditoria,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',auditoria_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(auditoria_detalle_util::$STR_CLASS_NAME,'seguridad','','NO-POPUP',$this->strTipoPaginaAuxiliarauditoria,$this->strTipoUsuarioAuxiliarauditoria,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(auditoria_util::$STR_SESSION_NAME,auditoria_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$auditoria_session=$this->Session->read(auditoria_util::$STR_SESSION_NAME);
				
		if($auditoria_session==null) {
			$auditoria_session=new auditoria_session();		
			//$this->Session->write('auditoria_session',$auditoria_session);							
		}
		*/
		
		$auditoria_session=new auditoria_session();
    	$auditoria_session->strPathNavegacionActual=auditoria_util::$STR_CLASS_WEB_TITULO;
    	$auditoria_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(auditoria_util::$STR_SESSION_NAME,serialize($auditoria_session));		
	}	
	
	public function getSetBusquedasSesionConfig(auditoria_session $auditoria_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($auditoria_session->bitBusquedaDesdeFKSesionFK!=null && $auditoria_session->bitBusquedaDesdeFKSesionFK==true) {
			if($auditoria_session->bigIdActualFK!=null && $auditoria_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$auditoria_session->bigIdActualFKParaPosibleAtras=$auditoria_session->bigIdActualFK;*/
			}
				
			$auditoria_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$auditoria_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(auditoria_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($auditoria_session->bitBusquedaDesdeFKSesionusuario!=null && $auditoria_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($auditoria_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(auditoria_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(auditoria_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(auditoria_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($auditoria_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($auditoria_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=auditoria_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$auditoria_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$auditoria_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;

				if($auditoria_session->intNumeroPaginacion==auditoria_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=auditoria_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$auditoria_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$auditoria_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$auditoria_session=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME));
		
		if($auditoria_session==null) {
			$auditoria_session=new auditoria_session();
		}
		
		$auditoria_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$auditoria_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$auditoria_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='BusquedaPorIdUsuarioPorFechaHora') {
			$auditoria_session->id_usuario=$this->id_usuarioBusquedaPorIdUsuarioPorFechaHora;	
			$auditoria_session->fecha_hora=$this->fecha_horaBusquedaPorIdUsuarioPorFechaHora;	
			$auditoria_session->fecha_horaFinal=$this->fecha_horaFinalBusquedaPorIdUsuarioPorFechaHora;	

		}
		else if($this->strAccionBusqueda=='BusquedaPorIPPCPorFechaHora') {
			$auditoria_session->ip_pc=$this->ip_pcBusquedaPorIPPCPorFechaHora;	
			$auditoria_session->fecha_hora=$this->fecha_horaBusquedaPorIPPCPorFechaHora;	
			$auditoria_session->fecha_horaFinal=$this->fecha_horaFinalBusquedaPorIPPCPorFechaHora;	

		}
		else if($this->strAccionBusqueda=='BusquedaPorNombrePCPorFechaHora') {
			$auditoria_session->nombre_pc=$this->nombre_pcBusquedaPorNombrePCPorFechaHora;	
			$auditoria_session->fecha_hora=$this->fecha_horaBusquedaPorNombrePCPorFechaHora;	
			$auditoria_session->fecha_horaFinal=$this->fecha_horaFinalBusquedaPorNombrePCPorFechaHora;	

		}
		else if($this->strAccionBusqueda=='BusquedaPorNombreTablaPorFechaHora') {
			$auditoria_session->nombre_tabla=$this->nombre_tablaBusquedaPorNombreTablaPorFechaHora;	
			$auditoria_session->fecha_hora=$this->fecha_horaBusquedaPorNombreTablaPorFechaHora;	
			$auditoria_session->fecha_horaFinal=$this->fecha_horaFinalBusquedaPorNombreTablaPorFechaHora;	

		}
		else if($this->strAccionBusqueda=='BusquedaPorObservacionesPorFechaHora') {
			$auditoria_session->fecha_hora=$this->fecha_horaBusquedaPorObservacionesPorFechaHora;	
			$auditoria_session->fecha_horaFinal=$this->fecha_horaFinalBusquedaPorObservacionesPorFechaHora;	
			$auditoria_session->observacion=$this->observacionBusquedaPorObservacionesPorFechaHora;	

		}
		else if($this->strAccionBusqueda=='BusquedaPorProcesoPorFechaHora') {
			$auditoria_session->proceso=$this->procesoBusquedaPorProcesoPorFechaHora;	
			$auditoria_session->fecha_hora=$this->fecha_horaBusquedaPorProcesoPorFechaHora;	
			$auditoria_session->fecha_horaFinal=$this->fecha_horaFinalBusquedaPorProcesoPorFechaHora;	

		}
		else if($this->strAccionBusqueda=='BusquedaPorUsuarioPCPorFechaHora') {
			$auditoria_session->usuario_pc=$this->usuario_pcBusquedaPorUsuarioPCPorFechaHora;	
			$auditoria_session->fecha_hora=$this->fecha_horaBusquedaPorUsuarioPCPorFechaHora;	
			$auditoria_session->fecha_horaFinal=$this->fecha_horaFinalBusquedaPorUsuarioPCPorFechaHora;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$auditoria_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		
		$this->Session->write(auditoria_util::$STR_SESSION_NAME,serialize($auditoria_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(auditoria_session $auditoria_session) {
		
		if($auditoria_session==null) {
			$auditoria_session=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME));
		}
		
		if($auditoria_session==null) {
		   $auditoria_session=new auditoria_session();
		}
		
		if($auditoria_session->strUltimaBusqueda!=null && $auditoria_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$auditoria_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$auditoria_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$auditoria_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='BusquedaPorIdUsuarioPorFechaHora') {
				$this->id_usuarioBusquedaPorIdUsuarioPorFechaHora=$auditoria_session->id_usuario;
				$auditoria_session->id_usuario=-1;
				$this->fecha_horaBusquedaPorIdUsuarioPorFechaHora=$auditoria_session->fecha_hora;
				$auditoria_session->fecha_hora=date('Y-m-d');
				$this->fecha_horaFinalBusquedaPorIdUsuarioPorFechaHora=$auditoria_session->fecha_horaFinal;
				$auditoria_session->fecha_horaFinal=date('Y-m-d');

			}
			 else if($this->strAccionBusqueda=='BusquedaPorIPPCPorFechaHora') {
				$this->ip_pcBusquedaPorIPPCPorFechaHora=$auditoria_session->ip_pc;
				$auditoria_session->ip_pc='';
				$this->fecha_horaBusquedaPorIPPCPorFechaHora=$auditoria_session->fecha_hora;
				$auditoria_session->fecha_hora=date('Y-m-d');
				$this->fecha_horaFinalBusquedaPorIPPCPorFechaHora=$auditoria_session->fecha_horaFinal;
				$auditoria_session->fecha_horaFinal=date('Y-m-d');

			}
			 else if($this->strAccionBusqueda=='BusquedaPorNombrePCPorFechaHora') {
				$this->nombre_pcBusquedaPorNombrePCPorFechaHora=$auditoria_session->nombre_pc;
				$auditoria_session->nombre_pc='';
				$this->fecha_horaBusquedaPorNombrePCPorFechaHora=$auditoria_session->fecha_hora;
				$auditoria_session->fecha_hora=date('Y-m-d');
				$this->fecha_horaFinalBusquedaPorNombrePCPorFechaHora=$auditoria_session->fecha_horaFinal;
				$auditoria_session->fecha_horaFinal=date('Y-m-d');

			}
			 else if($this->strAccionBusqueda=='BusquedaPorNombreTablaPorFechaHora') {
				$this->nombre_tablaBusquedaPorNombreTablaPorFechaHora=$auditoria_session->nombre_tabla;
				$auditoria_session->nombre_tabla='';
				$this->fecha_horaBusquedaPorNombreTablaPorFechaHora=$auditoria_session->fecha_hora;
				$auditoria_session->fecha_hora=date('Y-m-d');
				$this->fecha_horaFinalBusquedaPorNombreTablaPorFechaHora=$auditoria_session->fecha_horaFinal;
				$auditoria_session->fecha_horaFinal=date('Y-m-d');

			}
			 else if($this->strAccionBusqueda=='BusquedaPorObservacionesPorFechaHora') {
				$this->fecha_horaBusquedaPorObservacionesPorFechaHora=$auditoria_session->fecha_hora;
				$auditoria_session->fecha_hora=date('Y-m-d');
				$this->fecha_horaFinalBusquedaPorObservacionesPorFechaHora=$auditoria_session->fecha_horaFinal;
				$auditoria_session->fecha_horaFinal=date('Y-m-d');
				$this->observacionBusquedaPorObservacionesPorFechaHora=$auditoria_session->observacion;
				$auditoria_session->observacion='';

			}
			 else if($this->strAccionBusqueda=='BusquedaPorProcesoPorFechaHora') {
				$this->procesoBusquedaPorProcesoPorFechaHora=$auditoria_session->proceso;
				$auditoria_session->proceso='';
				$this->fecha_horaBusquedaPorProcesoPorFechaHora=$auditoria_session->fecha_hora;
				$auditoria_session->fecha_hora=date('Y-m-d');
				$this->fecha_horaFinalBusquedaPorProcesoPorFechaHora=$auditoria_session->fecha_horaFinal;
				$auditoria_session->fecha_horaFinal=date('Y-m-d');

			}
			 else if($this->strAccionBusqueda=='BusquedaPorUsuarioPCPorFechaHora') {
				$this->usuario_pcBusquedaPorUsuarioPCPorFechaHora=$auditoria_session->usuario_pc;
				$auditoria_session->usuario_pc='';
				$this->fecha_horaBusquedaPorUsuarioPCPorFechaHora=$auditoria_session->fecha_hora;
				$auditoria_session->fecha_hora=date('Y-m-d');
				$this->fecha_horaFinalBusquedaPorUsuarioPCPorFechaHora=$auditoria_session->fecha_horaFinal;
				$auditoria_session->fecha_horaFinal=date('Y-m-d');

			}
			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$auditoria_session->id_usuario;
				$auditoria_session->id_usuario=-1;

			}
		}
		
		$auditoria_session->strUltimaBusqueda='';
		//$auditoria_session->intNumeroPaginacion=10;
		$auditoria_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(auditoria_util::$STR_SESSION_NAME,serialize($auditoria_session));		
	}
	
	public function auditoriasControllerAux($conexion_control) 	 {
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
	
	public function setauditoriaFKsDefault() {
	
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
		

		auditoria_detalle_carga::$CONTROLLER;
		auditoria_detalle_util::$STR_SCHEMA;
		auditoria_detalle_session::class;
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
		interface auditoria_controlI {	
		
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
		
		public function onLoad(auditoria_session $auditoria_session=null);	
		function index(?string $strTypeOnLoadauditoria='',?string $strTipoPaginaAuxiliarauditoria='',?string $strTipoUsuarioAuxiliarauditoria='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadauditoria='',string $strTipoPaginaAuxiliarauditoria='',string $strTipoUsuarioAuxiliarauditoria='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($auditoriaReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(auditoria $auditoriaClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(auditoria_session $auditoria_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(auditoria_session $auditoria_session);	
		public function auditoriasControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setauditoriaFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
