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

namespace com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\presentation\control;

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

use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\business\entity\asiento_automatico_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/asiento_automatico_detalle/util/asiento_automatico_detalle_carga.php');
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_carga;

use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_param_return;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\business\logic\asiento_automatico_detalle_logic;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\presentation\session\asiento_automatico_detalle_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\asiento_automatico\business\entity\asiento_automatico;
use com\bydan\contabilidad\contabilidad\asiento_automatico\business\logic\asiento_automatico_logic;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\business\logic\centro_costo_logic;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_carga;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
asiento_automatico_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
asiento_automatico_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
asiento_automatico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
asiento_automatico_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*asiento_automatico_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/contabilidad/asiento_automatico_detalle/presentation/control/asiento_automatico_detalle_init_control.php');
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\presentation\control\asiento_automatico_detalle_init_control;

include_once('com/bydan/contabilidad/contabilidad/asiento_automatico_detalle/presentation/control/asiento_automatico_detalle_base_control.php');
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\presentation\control\asiento_automatico_detalle_base_control;

class asiento_automatico_detalle_control extends asiento_automatico_detalle_base_control {	
	
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
					
					
				if($this->data['es_credito']==null) {$this->data['es_credito']=false;} else {if($this->data['es_credito']=='on') {$this->data['es_credito']=true;}}
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
			
			
			else if($action=="FK_Idasiento_automatico"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idasiento_automaticoParaProcesar();
			}
			else if($action=="FK_Idcentro_costo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcentro_costoParaProcesar();
			}
			else if($action=="FK_Idcuenta"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdcuentaParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_automatico_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idasiento_automatico_detalleActual
			}
			else if($action=='abrirBusquedaParaasiento_automatico') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_automatico_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaasiento_automatico();//$idasiento_automatico_detalleActual
			}
			else if($action=='abrirBusquedaParacuenta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_automatico_detalleActual=$this->getDataId();
				$this->abrirBusquedaParacuenta();//$idasiento_automatico_detalleActual
			}
			else if($action=='abrirBusquedaParacentro_costo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_automatico_detalleActual=$this->getDataId();
				$this->abrirBusquedaParacentro_costo();//$idasiento_automatico_detalleActual
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
					
					$asiento_automatico_detalleController = new asiento_automatico_detalle_control();
					
					$asiento_automatico_detalleController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($asiento_automatico_detalleController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$asiento_automatico_detalleController = new asiento_automatico_detalle_control();
						$asiento_automatico_detalleController = $this;
						
						$jsonResponse = json_encode($asiento_automatico_detalleController->asiento_automatico_detalles);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->asiento_automatico_detalleReturnGeneral==null) {
					$this->asiento_automatico_detalleReturnGeneral=new asiento_automatico_detalle_param_return();
				}
				
				echo($this->asiento_automatico_detalleReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$asiento_automatico_detalleController=new asiento_automatico_detalle_control();
		
		$asiento_automatico_detalleController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$asiento_automatico_detalleController->usuarioActual=new usuario();
		
		$asiento_automatico_detalleController->usuarioActual->setId($this->usuarioActual->getId());
		$asiento_automatico_detalleController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$asiento_automatico_detalleController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$asiento_automatico_detalleController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$asiento_automatico_detalleController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$asiento_automatico_detalleController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$asiento_automatico_detalleController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$asiento_automatico_detalleController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $asiento_automatico_detalleController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadasiento_automatico_detalle= $this->getDataGeneralString('strTypeOnLoadasiento_automatico_detalle');
		$strTipoPaginaAuxiliarasiento_automatico_detalle= $this->getDataGeneralString('strTipoPaginaAuxiliarasiento_automatico_detalle');
		$strTipoUsuarioAuxiliarasiento_automatico_detalle= $this->getDataGeneralString('strTipoUsuarioAuxiliarasiento_automatico_detalle');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadasiento_automatico_detalle,$strTipoPaginaAuxiliarasiento_automatico_detalle,$strTipoUsuarioAuxiliarasiento_automatico_detalle,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadasiento_automatico_detalle!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('asiento_automatico_detalle','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_automatico_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarasiento_automatico_detalle,$this->strTipoUsuarioAuxiliarasiento_automatico_detalle,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_automatico_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarasiento_automatico_detalle,$this->strTipoUsuarioAuxiliarasiento_automatico_detalle,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->asiento_automatico_detalleReturnGeneral=new asiento_automatico_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->asiento_automatico_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->asiento_automatico_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->asiento_automatico_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->asiento_automatico_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->asiento_automatico_detalleReturnGeneral);
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
		$this->asiento_automatico_detalleReturnGeneral=new asiento_automatico_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->asiento_automatico_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->asiento_automatico_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->asiento_automatico_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->asiento_automatico_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->asiento_automatico_detalleReturnGeneral);
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
		$this->asiento_automatico_detalleReturnGeneral=new asiento_automatico_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->asiento_automatico_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->asiento_automatico_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->asiento_automatico_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->asiento_automatico_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->asiento_automatico_detalleReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
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
			
			
			$this->asiento_automatico_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->asiento_automatico_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->asiento_automatico_detalleReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->asiento_automatico_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->asiento_automatico_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->asiento_automatico_detalleReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->asiento_automatico_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->asiento_automatico_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->asiento_automatico_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->asiento_automatico_detalleReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->asiento_automatico_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->asiento_automatico_detalleReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->asiento_automatico_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->asiento_automatico_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->asiento_automatico_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->asiento_automatico_detalleReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->asiento_automatico_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->asiento_automatico_detalleReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
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
		
		$this->asiento_automatico_detalleLogic=new asiento_automatico_detalle_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->asiento_automatico_detalle=new asiento_automatico_detalle();
		
		$this->strTypeOnLoadasiento_automatico_detalle='onload';
		$this->strTipoPaginaAuxiliarasiento_automatico_detalle='none';
		$this->strTipoUsuarioAuxiliarasiento_automatico_detalle='none';	

		$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;
		
		$this->asiento_automatico_detalleModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_automatico_detalleControllerAdditional=new asiento_automatico_detalle_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(asiento_automatico_detalle_session $asiento_automatico_detalle_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($asiento_automatico_detalle_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadasiento_automatico_detalle='',?string $strTipoPaginaAuxiliarasiento_automatico_detalle='',?string $strTipoUsuarioAuxiliarasiento_automatico_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadasiento_automatico_detalle=$strTypeOnLoadasiento_automatico_detalle;
			$this->strTipoPaginaAuxiliarasiento_automatico_detalle=$strTipoPaginaAuxiliarasiento_automatico_detalle;
			$this->strTipoUsuarioAuxiliarasiento_automatico_detalle=$strTipoUsuarioAuxiliarasiento_automatico_detalle;
	
			if($strTipoUsuarioAuxiliarasiento_automatico_detalle=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->asiento_automatico_detalle=new asiento_automatico_detalle();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Detalle Asiento Automaticos';
			
			
			$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));
							
			if($asiento_automatico_detalle_session==null) {
				$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
				
				/*$this->Session->write('asiento_automatico_detalle_session',$asiento_automatico_detalle_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($asiento_automatico_detalle_session->strFuncionJsPadre!=null && $asiento_automatico_detalle_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$asiento_automatico_detalle_session->strFuncionJsPadre;
				
				$asiento_automatico_detalle_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($asiento_automatico_detalle_session);
			
			if($strTypeOnLoadasiento_automatico_detalle!=null && $strTypeOnLoadasiento_automatico_detalle=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$asiento_automatico_detalle_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$asiento_automatico_detalle_session->setPaginaPopupVariables(true);
				}
				
				if($asiento_automatico_detalle_session->intNumeroPaginacion==asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_automatico_detalle_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,asiento_automatico_detalle_util::$STR_SESSION_NAME,'contabilidad');																
			
			} else if($strTypeOnLoadasiento_automatico_detalle!=null && $strTypeOnLoadasiento_automatico_detalle=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$asiento_automatico_detalle_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;*/
				
				if($asiento_automatico_detalle_session->intNumeroPaginacion==asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_automatico_detalle_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarasiento_automatico_detalle!=null && $strTipoPaginaAuxiliarasiento_automatico_detalle=='none') {
				/*$asiento_automatico_detalle_session->strStyleDivHeader='display:table-row';*/
				
				/*$asiento_automatico_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarasiento_automatico_detalle!=null && $strTipoPaginaAuxiliarasiento_automatico_detalle=='iframe') {
					/*
					$asiento_automatico_detalle_session->strStyleDivArbol='display:none';
					$asiento_automatico_detalle_session->strStyleDivHeader='display:none';
					$asiento_automatico_detalle_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$asiento_automatico_detalle_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->asiento_automatico_detalleClase=new asiento_automatico_detalle();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=asiento_automatico_detalle_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(asiento_automatico_detalle_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->asiento_automatico_detalleLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->asiento_automatico_detalleLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->asiento_automatico_detalleLogic=new asiento_automatico_detalle_logic();*/
			
			
			$this->asiento_automatico_detallesModel=null;
			/*new ListDataModel();*/
			
			/*$this->asiento_automatico_detallesModel.setWrappedData(asiento_automatico_detalleLogic->getasiento_automatico_detalles());*/
						
			$this->asiento_automatico_detalles= array();
			$this->asiento_automatico_detallesEliminados=array();
			$this->asiento_automatico_detallesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= asiento_automatico_detalle_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->asiento_automatico_detalle= new asiento_automatico_detalle();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idasiento_automatico='display:table-row';
			$this->strVisibleFK_Idcentro_costo='display:table-row';
			$this->strVisibleFK_Idcuenta='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarasiento_automatico_detalle!=null && $strTipoUsuarioAuxiliarasiento_automatico_detalle!='none' && $strTipoUsuarioAuxiliarasiento_automatico_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarasiento_automatico_detalle);
																
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
				if($strTipoUsuarioAuxiliarasiento_automatico_detalle!=null && $strTipoUsuarioAuxiliarasiento_automatico_detalle!='none' && $strTipoUsuarioAuxiliarasiento_automatico_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarasiento_automatico_detalle);
																
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
				if($strTipoUsuarioAuxiliarasiento_automatico_detalle==null || $strTipoUsuarioAuxiliarasiento_automatico_detalle=='none' || $strTipoUsuarioAuxiliarasiento_automatico_detalle=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarasiento_automatico_detalle,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_automatico_detalle_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_automatico_detalle_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina asiento_automatico_detalle');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($asiento_automatico_detalle_session);
			
			$this->getSetBusquedasSesionConfig($asiento_automatico_detalle_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteasiento_automatico_detalles($this->strAccionBusqueda,$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles());*/
				} else if($this->strGenerarReporte=='Html')	{
					$asiento_automatico_detalle_session->strServletGenerarHtmlReporte='asiento_automatico_detalleServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(asiento_automatico_detalle_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($asiento_automatico_detalle_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarasiento_automatico_detalle!=null && $strTipoUsuarioAuxiliarasiento_automatico_detalle=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($asiento_automatico_detalle_session);
			}
								
			$this->set(asiento_automatico_detalle_util::$STR_SESSION_NAME, $asiento_automatico_detalle_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($asiento_automatico_detalle_session);
			
			/*
			$this->asiento_automatico_detalle->recursive = 0;
			
			$this->asiento_automatico_detalles=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('asiento_automatico_detalles', $this->asiento_automatico_detalles);
			
			$this->set(asiento_automatico_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->asiento_automatico_detalleActual =$this->asiento_automatico_detalleClase;
			
			/*$this->asiento_automatico_detalleActual =$this->migrarModelasiento_automatico_detalle($this->asiento_automatico_detalleClase);*/
			
			$this->returnHtml(false);
			
			$this->set(asiento_automatico_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=asiento_automatico_detalle_util::$STR_NOMBRE_OPCION;
				
			if(asiento_automatico_detalle_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=asiento_automatico_detalle_util::$STR_MODULO_OPCION.asiento_automatico_detalle_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(asiento_automatico_detalle_util::$STR_SESSION_NAME,serialize($asiento_automatico_detalle_session));
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
			/*$asiento_automatico_detalleClase= (asiento_automatico_detalle) asiento_automatico_detallesModel.getRowData();*/
			
			$this->asiento_automatico_detalleClase->setId($this->asiento_automatico_detalle->getId());	
			$this->asiento_automatico_detalleClase->setVersionRow($this->asiento_automatico_detalle->getVersionRow());	
			$this->asiento_automatico_detalleClase->setVersionRow($this->asiento_automatico_detalle->getVersionRow());	
			$this->asiento_automatico_detalleClase->setid_empresa($this->asiento_automatico_detalle->getid_empresa());	
			$this->asiento_automatico_detalleClase->setid_asiento_automatico($this->asiento_automatico_detalle->getid_asiento_automatico());	
			$this->asiento_automatico_detalleClase->setid_cuenta($this->asiento_automatico_detalle->getid_cuenta());	
			$this->asiento_automatico_detalleClase->setid_centro_costo($this->asiento_automatico_detalle->getid_centro_costo());	
			$this->asiento_automatico_detalleClase->setes_credito($this->asiento_automatico_detalle->getes_credito());	
			$this->asiento_automatico_detalleClase->setcuenta_contable($this->asiento_automatico_detalle->getcuenta_contable());	
		
			/*$this->Session->write('asiento_automatico_detalleVersionRowActual', asiento_automatico_detalle.getVersionRow());*/
			
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
			
			$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));
						
			if($asiento_automatico_detalle_session==null) {
				$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('asiento_automatico_detalle', $this->asiento_automatico_detalle->read(null, $id));
	
			
			$this->asiento_automatico_detalle->recursive = 0;
			
			$this->asiento_automatico_detalles=$this->paginate();
			
			$this->set('asiento_automatico_detalles', $this->asiento_automatico_detalles);
	
			if (empty($this->data)) {
				$this->data = $this->asiento_automatico_detalle->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->asiento_automatico_detalleLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->asiento_automatico_detalleClase);
			
			$this->asiento_automatico_detalleActual=$this->asiento_automatico_detalleClase;
			
			/*$this->asiento_automatico_detalleActual =$this->migrarModelasiento_automatico_detalle($this->asiento_automatico_detalleClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles(),$this->asiento_automatico_detalleActual);
			
			$this->actualizarControllerConReturnGeneral($this->asiento_automatico_detalleReturnGeneral);
			
			//$this->asiento_automatico_detalleReturnGeneral=$this->asiento_automatico_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles(),$this->asiento_automatico_detalleActual,$this->asiento_automatico_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));
						
			if($asiento_automatico_detalle_session==null) {
				$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoasiento_automatico_detalle', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->asiento_automatico_detalleClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->asiento_automatico_detalleClase);
			
			$this->asiento_automatico_detalleActual =$this->asiento_automatico_detalleClase;
			
			/*$this->asiento_automatico_detalleActual =$this->migrarModelasiento_automatico_detalle($this->asiento_automatico_detalleClase);*/
			
			$this->setasiento_automatico_detalleFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles(),$this->asiento_automatico_detalle);
			
			$this->actualizarControllerConReturnGeneral($this->asiento_automatico_detalleReturnGeneral);
			
			//this->asiento_automatico_detalleReturnGeneral=$this->asiento_automatico_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles(),$this->asiento_automatico_detalle,$this->asiento_automatico_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->asiento_automatico_detalleReturnGeneral->getasiento_automatico_detalle()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idasiento_automaticoDefaultFK!=null && $this->idasiento_automaticoDefaultFK > -1) {
				$this->asiento_automatico_detalleReturnGeneral->getasiento_automatico_detalle()->setid_asiento_automatico($this->idasiento_automaticoDefaultFK);
			}

			if($this->idcuentaDefaultFK!=null && $this->idcuentaDefaultFK > -1) {
				$this->asiento_automatico_detalleReturnGeneral->getasiento_automatico_detalle()->setid_cuenta($this->idcuentaDefaultFK);
			}

			if($this->idcentro_costoDefaultFK!=null && $this->idcentro_costoDefaultFK > -1) {
				$this->asiento_automatico_detalleReturnGeneral->getasiento_automatico_detalle()->setid_centro_costo($this->idcentro_costoDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->asiento_automatico_detalleReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->asiento_automatico_detalleReturnGeneral->getasiento_automatico_detalle(),$this->asiento_automatico_detalleActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyasiento_automatico_detalle($this->asiento_automatico_detalleReturnGeneral->getasiento_automatico_detalle());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioasiento_automatico_detalle($this->asiento_automatico_detalleReturnGeneral->getasiento_automatico_detalle());*/
			}
			
			if($this->asiento_automatico_detalleReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->asiento_automatico_detalleReturnGeneral->getasiento_automatico_detalle(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualasiento_automatico_detalle($this->asiento_automatico_detalle,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->asiento_automatico_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->asiento_automatico_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->asiento_automatico_detallesAuxiliar=array();
			}
			
			if(count($this->asiento_automatico_detallesAuxiliar)==2) {
				$asiento_automatico_detalleOrigen=$this->asiento_automatico_detallesAuxiliar[0];
				$asiento_automatico_detalleDestino=$this->asiento_automatico_detallesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($asiento_automatico_detalleOrigen,$asiento_automatico_detalleDestino,true,false,false);
				
				$this->actualizarLista($asiento_automatico_detalleDestino,$this->asiento_automatico_detalles);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->asiento_automatico_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->asiento_automatico_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->asiento_automatico_detallesAuxiliar=array();
			}
			
			if(count($this->asiento_automatico_detallesAuxiliar) > 0) {
				foreach ($this->asiento_automatico_detallesAuxiliar as $asiento_automatico_detalleSeleccionado) {
					$this->asiento_automatico_detalle=new asiento_automatico_detalle();
					
					$this->setCopiarVariablesObjetos($asiento_automatico_detalleSeleccionado,$this->asiento_automatico_detalle,true,true,false);
						
					$this->asiento_automatico_detalles[]=$this->asiento_automatico_detalle;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->asiento_automatico_detallesEliminados as $asiento_automatico_detalleEliminado) {
				$this->asiento_automatico_detalleLogic->asiento_automatico_detalles[]=$asiento_automatico_detalleEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->asiento_automatico_detalle=new asiento_automatico_detalle();
							
				$this->asiento_automatico_detalles[]=$this->asiento_automatico_detalle;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
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
		
		$asiento_automatico_detalleActual=new asiento_automatico_detalle();
		
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
				
				$asiento_automatico_detalleActual=$this->asiento_automatico_detalles[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $asiento_automatico_detalleActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $asiento_automatico_detalleActual->setid_asiento_automatico((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $asiento_automatico_detalleActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $asiento_automatico_detalleActual->setid_centro_costo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $asiento_automatico_detalleActual->setes_credito(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_7')));  } else { $asiento_automatico_detalleActual->setes_credito(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $asiento_automatico_detalleActual->setcuenta_contable($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
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
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadasiento_automatico_detalle='',string $strTipoPaginaAuxiliarasiento_automatico_detalle='',string $strTipoUsuarioAuxiliarasiento_automatico_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadasiento_automatico_detalle,$strTipoPaginaAuxiliarasiento_automatico_detalle,$strTipoUsuarioAuxiliarasiento_automatico_detalle,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->asiento_automatico_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=asiento_automatico_detalle_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=asiento_automatico_detalle_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=asiento_automatico_detalle_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));
						
			if($asiento_automatico_detalle_session==null) {
				$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
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
					/*$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;*/
					
					if($asiento_automatico_detalle_session->intNumeroPaginacion==asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$asiento_automatico_detalle_session->intNumeroPaginacion;
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
			
			$this->asiento_automatico_detallesEliminados=array();
			
			/*$this->asiento_automatico_detalleLogic->setConnexion($connexion);*/
			
			$this->asiento_automatico_detalleLogic->setIsConDeep(true);
			
			$this->asiento_automatico_detalleLogic->getasiento_automatico_detalleDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('asiento_automatico');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			$class=new Classe('centro_costo');$classes[]=$class;
			
			$this->asiento_automatico_detalleLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->asiento_automatico_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->asiento_automatico_detalleLogic->getasiento_automatico_detalles()==null|| count($this->asiento_automatico_detalleLogic->getasiento_automatico_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->asiento_automatico_detalles=$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->asiento_automatico_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->asiento_automatico_detallesReporte=$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles();
									
						/*$this->generarReportes('Todos',$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles());*/
					
						$this->asiento_automatico_detalleLogic->setasiento_automatico_detalles($this->asiento_automatico_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->asiento_automatico_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->asiento_automatico_detalleLogic->getasiento_automatico_detalles()==null|| count($this->asiento_automatico_detalleLogic->getasiento_automatico_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->asiento_automatico_detalles=$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->asiento_automatico_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->asiento_automatico_detallesReporte=$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles();
									
						/*$this->generarReportes('Todos',$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles());*/
					
						$this->asiento_automatico_detalleLogic->setasiento_automatico_detalles($this->asiento_automatico_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idasiento_automatico_detalle=0;*/
				
				if($asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
					if($asiento_automatico_detalle_session->bigIdActualFK!=null && $asiento_automatico_detalle_session->bigIdActualFK!=0)	{
						$this->idasiento_automatico_detalle=$asiento_automatico_detalle_session->bigIdActualFK;	
					}
					
					$asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionFK=false;
					
					$asiento_automatico_detalle_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idasiento_automatico_detalle=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idasiento_automatico_detalle=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->asiento_automatico_detalleLogic->getEntity($this->idasiento_automatico_detalle);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*asiento_automatico_detalleLogicAdditional::getDetalleIndicePorId($idasiento_automatico_detalle);*/

				
				if($this->asiento_automatico_detalleLogic->getasiento_automatico_detalle()!=null) {
					$this->asiento_automatico_detalleLogic->setasiento_automatico_detalles(array());
					$this->asiento_automatico_detalleLogic->asiento_automatico_detalles[]=$this->asiento_automatico_detalleLogic->getasiento_automatico_detalle();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idasiento_automatico')
			{

				if($asiento_automatico_detalle_session->bigidasiento_automaticoActual!=null && $asiento_automatico_detalle_session->bigidasiento_automaticoActual!=0)
				{
					$this->id_asiento_automaticoFK_Idasiento_automatico=$asiento_automatico_detalle_session->bigidasiento_automaticoActual;
					$asiento_automatico_detalle_session->bigidasiento_automaticoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automatico_detalleLogic->getsFK_Idasiento_automatico($finalQueryPaginacion,$this->pagination,$this->id_asiento_automaticoFK_Idasiento_automatico);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_automatico_detalleLogicAdditional::getDetalleIndiceFK_Idasiento_automatico($this->id_asiento_automaticoFK_Idasiento_automatico);


					if($this->asiento_automatico_detalleLogic->getasiento_automatico_detalles()==null || count($this->asiento_automatico_detalleLogic->getasiento_automatico_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_automatico_detalles=$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automatico_detalleLogic->getsFK_Idasiento_automatico('',$this->pagination,$this->id_asiento_automaticoFK_Idasiento_automatico);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_automatico_detallesReporte=$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_automatico_detalles("FK_Idasiento_automatico",$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_automatico_detalleLogic->setasiento_automatico_detalles($asiento_automatico_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcentro_costo')
			{

				if($asiento_automatico_detalle_session->bigidcentro_costoActual!=null && $asiento_automatico_detalle_session->bigidcentro_costoActual!=0)
				{
					$this->id_centro_costoFK_Idcentro_costo=$asiento_automatico_detalle_session->bigidcentro_costoActual;
					$asiento_automatico_detalle_session->bigidcentro_costoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automatico_detalleLogic->getsFK_Idcentro_costo($finalQueryPaginacion,$this->pagination,$this->id_centro_costoFK_Idcentro_costo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_automatico_detalleLogicAdditional::getDetalleIndiceFK_Idcentro_costo($this->id_centro_costoFK_Idcentro_costo);


					if($this->asiento_automatico_detalleLogic->getasiento_automatico_detalles()==null || count($this->asiento_automatico_detalleLogic->getasiento_automatico_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_automatico_detalles=$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automatico_detalleLogic->getsFK_Idcentro_costo('',$this->pagination,$this->id_centro_costoFK_Idcentro_costo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_automatico_detallesReporte=$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_automatico_detalles("FK_Idcentro_costo",$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_automatico_detalleLogic->setasiento_automatico_detalles($asiento_automatico_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta')
			{

				if($asiento_automatico_detalle_session->bigidcuentaActual!=null && $asiento_automatico_detalle_session->bigidcuentaActual!=0)
				{
					$this->id_cuentaFK_Idcuenta=$asiento_automatico_detalle_session->bigidcuentaActual;
					$asiento_automatico_detalle_session->bigidcuentaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automatico_detalleLogic->getsFK_Idcuenta($finalQueryPaginacion,$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_automatico_detalleLogicAdditional::getDetalleIndiceFK_Idcuenta($this->id_cuentaFK_Idcuenta);


					if($this->asiento_automatico_detalleLogic->getasiento_automatico_detalles()==null || count($this->asiento_automatico_detalleLogic->getasiento_automatico_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_automatico_detalles=$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automatico_detalleLogic->getsFK_Idcuenta('',$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_automatico_detallesReporte=$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_automatico_detalles("FK_Idcuenta",$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_automatico_detalleLogic->setasiento_automatico_detalles($asiento_automatico_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($asiento_automatico_detalle_session->bigidempresaActual!=null && $asiento_automatico_detalle_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$asiento_automatico_detalle_session->bigidempresaActual;
					$asiento_automatico_detalle_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automatico_detalleLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_automatico_detalleLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->asiento_automatico_detalleLogic->getasiento_automatico_detalles()==null || count($this->asiento_automatico_detalleLogic->getasiento_automatico_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_automatico_detalles=$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_automatico_detalleLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_automatico_detallesReporte=$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_automatico_detalles("FK_Idempresa",$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_automatico_detalleLogic->setasiento_automatico_detalles($asiento_automatico_detalles);
					}
				//}

			} 
		
		$asiento_automatico_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$asiento_automatico_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->asiento_automatico_detalleLogic->loadForeignsKeysDescription();*/
		
		$this->asiento_automatico_detalles=$this->asiento_automatico_detalleLogic->getasiento_automatico_detalles();
		
		if($this->asiento_automatico_detallesEliminados==null) {
			$this->asiento_automatico_detallesEliminados=array();
		}
		
		$this->Session->write(asiento_automatico_detalle_util::$STR_SESSION_NAME.'Lista',serialize($this->asiento_automatico_detalles));
		$this->Session->write(asiento_automatico_detalle_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->asiento_automatico_detallesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(asiento_automatico_detalle_util::$STR_SESSION_NAME,serialize($asiento_automatico_detalle_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idasiento_automatico_detalle=$idGeneral;
			
			$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
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
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}

			if(count($this->asiento_automatico_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Idasiento_automaticoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_asiento_automaticoFK_Idasiento_automatico=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idasiento_automatico','cmbid_asiento_automatico');

			$this->strAccionBusqueda='FK_Idasiento_automatico';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idcentro_costoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_centro_costoFK_Idcentro_costo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcentro_costo','cmbid_centro_costo');

			$this->strAccionBusqueda='FK_Idcentro_costo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdcuentaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuentaFK_Idcuenta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta','cmbid_cuenta');

			$this->strAccionBusqueda='FK_Idcuenta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
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
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idasiento_automatico($strFinalQuery,$id_asiento_automatico)
	{
		try
		{

			$this->asiento_automatico_detalleLogic->getsFK_Idasiento_automatico($strFinalQuery,new Pagination(),$id_asiento_automatico);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcentro_costo($strFinalQuery,$id_centro_costo)
	{
		try
		{

			$this->asiento_automatico_detalleLogic->getsFK_Idcentro_costo($strFinalQuery,new Pagination(),$id_centro_costo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcuenta($strFinalQuery,$id_cuenta)
	{
		try
		{

			$this->asiento_automatico_detalleLogic->getsFK_Idcuenta($strFinalQuery,new Pagination(),$id_cuenta);
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

			$this->asiento_automatico_detalleLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
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
			
			
			$asiento_automatico_detalleForeignKey=new asiento_automatico_detalle_param_return(); //asiento_automatico_detalleForeignKey();
			
			$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));
						
			if($asiento_automatico_detalle_session==null) {
				$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$asiento_automatico_detalleForeignKey=$this->asiento_automatico_detalleLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$asiento_automatico_detalle_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$asiento_automatico_detalleForeignKey->empresasFK;
				$this->idempresaDefaultFK=$asiento_automatico_detalleForeignKey->idempresaDefaultFK;
			}

			if($asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_asiento_automatico',$this->strRecargarFkTipos,',')) {
				$this->asiento_automaticosFK=$asiento_automatico_detalleForeignKey->asiento_automaticosFK;
				$this->idasiento_automaticoDefaultFK=$asiento_automatico_detalleForeignKey->idasiento_automaticoDefaultFK;
			}

			if($asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionasiento_automatico) {
				$this->setVisibleBusquedasParaasiento_automatico(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$this->strRecargarFkTipos,',')) {
				$this->cuentasFK=$asiento_automatico_detalleForeignKey->cuentasFK;
				$this->idcuentaDefaultFK=$asiento_automatico_detalleForeignKey->idcuentaDefaultFK;
			}

			if($asiento_automatico_detalle_session->bitBusquedaDesdeFKSesioncuenta) {
				$this->setVisibleBusquedasParacuenta(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_centro_costo',$this->strRecargarFkTipos,',')) {
				$this->centro_costosFK=$asiento_automatico_detalleForeignKey->centro_costosFK;
				$this->idcentro_costoDefaultFK=$asiento_automatico_detalleForeignKey->idcentro_costoDefaultFK;
			}

			if($asiento_automatico_detalle_session->bitBusquedaDesdeFKSesioncentro_costo) {
				$this->setVisibleBusquedasParacentro_costo(true);
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
	
	function cargarCombosFKFromReturnGeneral($asiento_automatico_detalleReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$asiento_automatico_detalleReturnGeneral->strRecargarFkTipos;
			
			


			if($asiento_automatico_detalleReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$asiento_automatico_detalleReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$asiento_automatico_detalleReturnGeneral->idempresaDefaultFK;
			}


			if($asiento_automatico_detalleReturnGeneral->con_asiento_automaticosFK==true) {
				$this->asiento_automaticosFK=$asiento_automatico_detalleReturnGeneral->asiento_automaticosFK;
				$this->idasiento_automaticoDefaultFK=$asiento_automatico_detalleReturnGeneral->idasiento_automaticoDefaultFK;
			}


			if($asiento_automatico_detalleReturnGeneral->con_cuentasFK==true) {
				$this->cuentasFK=$asiento_automatico_detalleReturnGeneral->cuentasFK;
				$this->idcuentaDefaultFK=$asiento_automatico_detalleReturnGeneral->idcuentaDefaultFK;
			}


			if($asiento_automatico_detalleReturnGeneral->con_centro_costosFK==true) {
				$this->centro_costosFK=$asiento_automatico_detalleReturnGeneral->centro_costosFK;
				$this->idcentro_costoDefaultFK=$asiento_automatico_detalleReturnGeneral->idcentro_costoDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));
		
		if($asiento_automatico_detalle_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($asiento_automatico_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($asiento_automatico_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==asiento_automatico_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='asiento_automatico';
			}
			else if($asiento_automatico_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			else if($asiento_automatico_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==centro_costo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='centro_costo';
			}
			
			$asiento_automatico_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}						
			
			$this->asiento_automatico_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->asiento_automatico_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->asiento_automatico_detallesAuxiliar=array();
			}
			
			if(count($this->asiento_automatico_detallesAuxiliar) > 0) {
				
				foreach ($this->asiento_automatico_detallesAuxiliar as $asiento_automatico_detalleSeleccionado) {
					$this->eliminarTablaBase($asiento_automatico_detalleSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
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


	public function getasiento_automaticosFKListSelectItem() 
	{
		$asiento_automaticosList=array();

		$item=null;

		foreach($this->asiento_automaticosFK as $asiento_automatico)
		{
			$item=new SelectItem();
			$item->setLabel($asiento_automatico->getcodigo());
			$item->setValue($asiento_automatico->getId());
			$asiento_automaticosList[]=$item;
		}

		return $asiento_automaticosList;
	}


	public function getcuentasFKListSelectItem() 
	{
		$cuentasList=array();

		$item=null;

		foreach($this->cuentasFK as $cuenta)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta->getcodigo());
			$item->setValue($cuenta->getId());
			$cuentasList[]=$item;
		}

		return $cuentasList;
	}


	public function getcentro_costosFKListSelectItem() 
	{
		$centro_costosList=array();

		$item=null;

		foreach($this->centro_costosFK as $centro_costo)
		{
			$item=new SelectItem();
			$item->setLabel($centro_costo->getnombre());
			$item->setValue($centro_costo->getId());
			$centro_costosList[]=$item;
		}

		return $centro_costosList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;
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
				$this->asiento_automatico_detalleLogic->commitNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->rollbackNewConnexionToDeep();
				$this->asiento_automatico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$asiento_automatico_detallesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->asiento_automatico_detalles as $asiento_automatico_detalleLocal) {
				if($asiento_automatico_detalleLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->asiento_automatico_detalle=new asiento_automatico_detalle();
				
				$this->asiento_automatico_detalle->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->asiento_automatico_detalles[]=$this->asiento_automatico_detalle;*/
				
				$asiento_automatico_detallesNuevos[]=$this->asiento_automatico_detalle;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('asiento_automatico');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				$class=new Classe('centro_costo');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_automatico_detalleLogic->setasiento_automatico_detalles($asiento_automatico_detallesNuevos);
					
				$this->asiento_automatico_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($asiento_automatico_detallesNuevos as $asiento_automatico_detalleNuevo) {
					$this->asiento_automatico_detalles[]=$asiento_automatico_detalleNuevo;
				}
				
				/*$this->asiento_automatico_detalles[]=$asiento_automatico_detallesNuevos;*/
				
				$this->asiento_automatico_detalleLogic->setasiento_automatico_detalles($this->asiento_automatico_detalles);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($asiento_automatico_detallesNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));

		if($asiento_automatico_detalle_session==null) {
			$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
		}
		
		if($asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($asiento_automatico_detalle_session->bigidempresaActual!=null && $asiento_automatico_detalle_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($asiento_automatico_detalle_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=asiento_automatico_detalle_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombosasiento_automaticosFK($connexion=null,$strRecargarFkQuery=''){
		$asiento_automaticoLogic= new asiento_automatico_logic();
		$pagination= new Pagination();
		$this->asiento_automaticosFK=array();

		$asiento_automaticoLogic->setConnexion($connexion);
		$asiento_automaticoLogic->getasiento_automaticoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));

		if($asiento_automatico_detalle_session==null) {
			$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
		}
		
		if($asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionasiento_automatico!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=asiento_automatico_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalasiento_automatico=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalasiento_automatico=Funciones::GetFinalQueryAppend($finalQueryGlobalasiento_automatico, '');
				$finalQueryGlobalasiento_automatico.=asiento_automatico_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalasiento_automatico.$strRecargarFkQuery;		

				$asiento_automaticoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosasiento_automaticosFK($asiento_automaticoLogic->getasiento_automaticos());

		} else {
			$this->setVisibleBusquedasParaasiento_automatico(true);


			if($asiento_automatico_detalle_session->bigidasiento_automaticoActual!=null && $asiento_automatico_detalle_session->bigidasiento_automaticoActual > 0) {
				$asiento_automaticoLogic->getEntity($asiento_automatico_detalle_session->bigidasiento_automaticoActual);//WithConnection

				$this->asiento_automaticosFK[$asiento_automaticoLogic->getasiento_automatico()->getId()]=asiento_automatico_detalle_util::getasiento_automaticoDescripcion($asiento_automaticoLogic->getasiento_automatico());
				$this->idasiento_automaticoDefaultFK=$asiento_automaticoLogic->getasiento_automatico()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery=''){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$this->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));

		if($asiento_automatico_detalle_session==null) {
			$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
		}
		
		if($asiento_automatico_detalle_session->bitBusquedaDesdeFKSesioncuenta!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcuenta=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta, '');
				$finalQueryGlobalcuenta.=cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta.$strRecargarFkQuery;		

				$cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscuentasFK($cuentaLogic->getcuentas());

		} else {
			$this->setVisibleBusquedasParacuenta(true);


			if($asiento_automatico_detalle_session->bigidcuentaActual!=null && $asiento_automatico_detalle_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($asiento_automatico_detalle_session->bigidcuentaActual);//WithConnection

				$this->cuentasFK[$cuentaLogic->getcuenta()->getId()]=asiento_automatico_detalle_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$this->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscentro_costosFK($connexion=null,$strRecargarFkQuery=''){
		$centro_costoLogic= new centro_costo_logic();
		$pagination= new Pagination();
		$this->centro_costosFK=array();

		$centro_costoLogic->setConnexion($connexion);
		$centro_costoLogic->getcentro_costoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));

		if($asiento_automatico_detalle_session==null) {
			$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
		}
		
		if($asiento_automatico_detalle_session->bitBusquedaDesdeFKSesioncentro_costo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=centro_costo_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcentro_costo=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcentro_costo=Funciones::GetFinalQueryAppend($finalQueryGlobalcentro_costo, '');
				$finalQueryGlobalcentro_costo.=centro_costo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcentro_costo.$strRecargarFkQuery;		

				$centro_costoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscentro_costosFK($centro_costoLogic->getcentro_costos());

		} else {
			$this->setVisibleBusquedasParacentro_costo(true);


			if($asiento_automatico_detalle_session->bigidcentro_costoActual!=null && $asiento_automatico_detalle_session->bigidcentro_costoActual > 0) {
				$centro_costoLogic->getEntity($asiento_automatico_detalle_session->bigidcentro_costoActual);//WithConnection

				$this->centro_costosFK[$centro_costoLogic->getcentro_costo()->getId()]=asiento_automatico_detalle_util::getcentro_costoDescripcion($centro_costoLogic->getcentro_costo());
				$this->idcentro_costoDefaultFK=$centro_costoLogic->getcentro_costo()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=asiento_automatico_detalle_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombosasiento_automaticosFK($asiento_automaticos){

		foreach ($asiento_automaticos as $asiento_automaticoLocal ) {
			if($this->idasiento_automaticoDefaultFK==0) {
				$this->idasiento_automaticoDefaultFK=$asiento_automaticoLocal->getId();
			}

			$this->asiento_automaticosFK[$asiento_automaticoLocal->getId()]=asiento_automatico_detalle_util::getasiento_automaticoDescripcion($asiento_automaticoLocal);
		}
	}

	public function prepararComboscuentasFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuentaDefaultFK==0) {
				$this->idcuentaDefaultFK=$cuentaLocal->getId();
			}

			$this->cuentasFK[$cuentaLocal->getId()]=asiento_automatico_detalle_util::getcuentaDescripcion($cuentaLocal);
		}
	}

	public function prepararComboscentro_costosFK($centro_costos){

		foreach ($centro_costos as $centro_costoLocal ) {
			if($this->idcentro_costoDefaultFK==0) {
				$this->idcentro_costoDefaultFK=$centro_costoLocal->getId();
			}

			$this->centro_costosFK[$centro_costoLocal->getId()]=asiento_automatico_detalle_util::getcentro_costoDescripcion($centro_costoLocal);
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

			$strDescripcionempresa=asiento_automatico_detalle_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripcionasiento_automaticoFK($idasiento_automatico,$connexion=null){
		$asiento_automaticoLogic= new asiento_automatico_logic();
		$asiento_automaticoLogic->setConnexion($connexion);
		$asiento_automaticoLogic->getasiento_automaticoDataAccess()->isForFKData=true;
		$strDescripcionasiento_automatico='';

		if($idasiento_automatico!=null && $idasiento_automatico!='' && $idasiento_automatico!='null') {
			if($connexion!=null) {
				$asiento_automaticoLogic->getEntity($idasiento_automatico);//WithConnection
			} else {
				$asiento_automaticoLogic->getEntityWithConnection($idasiento_automatico);//
			}

			$strDescripcionasiento_automatico=asiento_automatico_detalle_util::getasiento_automaticoDescripcion($asiento_automaticoLogic->getasiento_automatico());

		} else {
			$strDescripcionasiento_automatico='null';
		}

		return $strDescripcionasiento_automatico;
	}

	public function cargarDescripcioncuentaFK($idcuenta,$connexion=null){
		$cuentaLogic= new cuenta_logic();
		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$strDescripcioncuenta='';

		if($idcuenta!=null && $idcuenta!='' && $idcuenta!='null') {
			if($connexion!=null) {
				$cuentaLogic->getEntity($idcuenta);//WithConnection
			} else {
				$cuentaLogic->getEntityWithConnection($idcuenta);//
			}

			$strDescripcioncuenta=asiento_automatico_detalle_util::getcuentaDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	public function cargarDescripcioncentro_costoFK($idcentro_costo,$connexion=null){
		$centro_costoLogic= new centro_costo_logic();
		$centro_costoLogic->setConnexion($connexion);
		$centro_costoLogic->getcentro_costoDataAccess()->isForFKData=true;
		$strDescripcioncentro_costo='';

		if($idcentro_costo!=null && $idcentro_costo!='' && $idcentro_costo!='null') {
			if($connexion!=null) {
				$centro_costoLogic->getEntity($idcentro_costo);//WithConnection
			} else {
				$centro_costoLogic->getEntityWithConnection($idcentro_costo);//
			}

			$strDescripcioncentro_costo=asiento_automatico_detalle_util::getcentro_costoDescripcion($centro_costoLogic->getcentro_costo());

		} else {
			$strDescripcioncentro_costo='null';
		}

		return $strDescripcioncentro_costo;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(asiento_automatico_detalle $asiento_automatico_detalleClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$asiento_automatico_detalleClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
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

		$this->strVisibleFK_Idasiento_automatico=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idcentro_costo=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
	}

	public function setVisibleBusquedasParaasiento_automatico($isParaasiento_automatico){
		$strParaVisibleasiento_automatico='display:table-row';
		$strParaVisibleNegacionasiento_automatico='display:none';

		if($isParaasiento_automatico) {
			$strParaVisibleasiento_automatico='display:table-row';
			$strParaVisibleNegacionasiento_automatico='display:none';
		} else {
			$strParaVisibleasiento_automatico='display:none';
			$strParaVisibleNegacionasiento_automatico='display:table-row';
		}


		$strParaVisibleNegacionasiento_automatico=trim($strParaVisibleNegacionasiento_automatico);

		$this->strVisibleFK_Idasiento_automatico=$strParaVisibleasiento_automatico;
		$this->strVisibleFK_Idcentro_costo=$strParaVisibleNegacionasiento_automatico;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionasiento_automatico;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionasiento_automatico;
	}

	public function setVisibleBusquedasParacuenta($isParacuenta){
		$strParaVisiblecuenta='display:table-row';
		$strParaVisibleNegacioncuenta='display:none';

		if($isParacuenta) {
			$strParaVisiblecuenta='display:table-row';
			$strParaVisibleNegacioncuenta='display:none';
		} else {
			$strParaVisiblecuenta='display:none';
			$strParaVisibleNegacioncuenta='display:table-row';
		}


		$strParaVisibleNegacioncuenta=trim($strParaVisibleNegacioncuenta);

		$this->strVisibleFK_Idasiento_automatico=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idcentro_costo=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idcuenta=$strParaVisiblecuenta;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta;
	}

	public function setVisibleBusquedasParacentro_costo($isParacentro_costo){
		$strParaVisiblecentro_costo='display:table-row';
		$strParaVisibleNegacioncentro_costo='display:none';

		if($isParacentro_costo) {
			$strParaVisiblecentro_costo='display:table-row';
			$strParaVisibleNegacioncentro_costo='display:none';
		} else {
			$strParaVisiblecentro_costo='display:none';
			$strParaVisibleNegacioncentro_costo='display:table-row';
		}


		$strParaVisibleNegacioncentro_costo=trim($strParaVisibleNegacioncentro_costo);

		$this->strVisibleFK_Idasiento_automatico=$strParaVisibleNegacioncentro_costo;
		$this->strVisibleFK_Idcentro_costo=$strParaVisiblecentro_costo;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacioncentro_costo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncentro_costo;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idasiento_automatico_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_automatico_detalleActual=$idasiento_automatico_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_automatico_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_automatico_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_automatico_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaasiento_automatico() {//$idasiento_automatico_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_automatico_detalleActual=$idasiento_automatico_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.asiento_automatico_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_automatico_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_asiento_automatico(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_automatico_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_automatico_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_asiento_automatico(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_automatico_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_automatico_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta() {//$idasiento_automatico_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_automatico_detalleActual=$idasiento_automatico_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_automatico_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_automatico_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_automatico_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacentro_costo() {//$idasiento_automatico_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_automatico_detalleActual=$idasiento_automatico_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.centro_costo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_automatico_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_centro_costo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',centro_costo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_automatico_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_centro_costo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(centro_costo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_automatico_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(asiento_automatico_detalle_util::$STR_SESSION_NAME,asiento_automatico_detalle_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$asiento_automatico_detalle_session=$this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME);
				
		if($asiento_automatico_detalle_session==null) {
			$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();		
			//$this->Session->write('asiento_automatico_detalle_session',$asiento_automatico_detalle_session);							
		}
		*/
		
		$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
    	$asiento_automatico_detalle_session->strPathNavegacionActual=asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO;
    	$asiento_automatico_detalle_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(asiento_automatico_detalle_util::$STR_SESSION_NAME,serialize($asiento_automatico_detalle_session));		
	}	
	
	public function getSetBusquedasSesionConfig(asiento_automatico_detalle_session $asiento_automatico_detalle_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
			if($asiento_automatico_detalle_session->bigIdActualFK!=null && $asiento_automatico_detalle_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$asiento_automatico_detalle_session->bigIdActualFKParaPosibleAtras=$asiento_automatico_detalle_session->bigIdActualFK;*/
			}
				
			$asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(asiento_automatico_detalle_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionempresa!=null && $asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($asiento_automatico_detalle_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(asiento_automatico_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_automatico_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_automatico_detalle_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($asiento_automatico_detalle_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_automatico_detalle_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;

				if($asiento_automatico_detalle_session->intNumeroPaginacion==asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_automatico_detalle_session->intNumeroPaginacion;
				}
			}
			else if($asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionasiento_automatico!=null && $asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionasiento_automatico==true)
			{
				if($asiento_automatico_detalle_session->bigidasiento_automaticoActual!=0) {
					$this->strAccionBusqueda='FK_Idasiento_automatico';

					$existe_history=HistoryWeb::ExisteElemento(asiento_automatico_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_automatico_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_automatico_detalle_session->bigidasiento_automaticoActualDescripcion);
						$historyWeb->setIdActual($asiento_automatico_detalle_session->bigidasiento_automaticoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_automatico_detalle_session->bigidasiento_automaticoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_automatico_detalle_session->bitBusquedaDesdeFKSesionasiento_automatico=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;

				if($asiento_automatico_detalle_session->intNumeroPaginacion==asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_automatico_detalle_session->intNumeroPaginacion;
				}
			}
			else if($asiento_automatico_detalle_session->bitBusquedaDesdeFKSesioncuenta!=null && $asiento_automatico_detalle_session->bitBusquedaDesdeFKSesioncuenta==true)
			{
				if($asiento_automatico_detalle_session->bigidcuentaActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta';

					$existe_history=HistoryWeb::ExisteElemento(asiento_automatico_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_automatico_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_automatico_detalle_session->bigidcuentaActualDescripcion);
						$historyWeb->setIdActual($asiento_automatico_detalle_session->bigidcuentaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_automatico_detalle_session->bigidcuentaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_automatico_detalle_session->bitBusquedaDesdeFKSesioncuenta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;

				if($asiento_automatico_detalle_session->intNumeroPaginacion==asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_automatico_detalle_session->intNumeroPaginacion;
				}
			}
			else if($asiento_automatico_detalle_session->bitBusquedaDesdeFKSesioncentro_costo!=null && $asiento_automatico_detalle_session->bitBusquedaDesdeFKSesioncentro_costo==true)
			{
				if($asiento_automatico_detalle_session->bigidcentro_costoActual!=0) {
					$this->strAccionBusqueda='FK_Idcentro_costo';

					$existe_history=HistoryWeb::ExisteElemento(asiento_automatico_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_automatico_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_automatico_detalle_session->bigidcentro_costoActualDescripcion);
						$historyWeb->setIdActual($asiento_automatico_detalle_session->bigidcentro_costoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_automatico_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_automatico_detalle_session->bigidcentro_costoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_automatico_detalle_session->bitBusquedaDesdeFKSesioncentro_costo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;

				if($asiento_automatico_detalle_session->intNumeroPaginacion==asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_automatico_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_automatico_detalle_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$asiento_automatico_detalle_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));
		
		if($asiento_automatico_detalle_session==null) {
			$asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
		}
		
		$asiento_automatico_detalle_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$asiento_automatico_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$asiento_automatico_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idasiento_automatico') {
			$asiento_automatico_detalle_session->id_asiento_automatico=$this->id_asiento_automaticoFK_Idasiento_automatico;	

		}
		else if($this->strAccionBusqueda=='FK_Idcentro_costo') {
			$asiento_automatico_detalle_session->id_centro_costo=$this->id_centro_costoFK_Idcentro_costo;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta') {
			$asiento_automatico_detalle_session->id_cuenta=$this->id_cuentaFK_Idcuenta;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$asiento_automatico_detalle_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		
		$this->Session->write(asiento_automatico_detalle_util::$STR_SESSION_NAME,serialize($asiento_automatico_detalle_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(asiento_automatico_detalle_session $asiento_automatico_detalle_session) {
		
		if($asiento_automatico_detalle_session==null) {
			$asiento_automatico_detalle_session=unserialize($this->Session->read(asiento_automatico_detalle_util::$STR_SESSION_NAME));
		}
		
		if($asiento_automatico_detalle_session==null) {
		   $asiento_automatico_detalle_session=new asiento_automatico_detalle_session();
		}
		
		if($asiento_automatico_detalle_session->strUltimaBusqueda!=null && $asiento_automatico_detalle_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$asiento_automatico_detalle_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$asiento_automatico_detalle_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$asiento_automatico_detalle_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idasiento_automatico') {
				$this->id_asiento_automaticoFK_Idasiento_automatico=$asiento_automatico_detalle_session->id_asiento_automatico;
				$asiento_automatico_detalle_session->id_asiento_automatico=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcentro_costo') {
				$this->id_centro_costoFK_Idcentro_costo=$asiento_automatico_detalle_session->id_centro_costo;
				$asiento_automatico_detalle_session->id_centro_costo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta') {
				$this->id_cuentaFK_Idcuenta=$asiento_automatico_detalle_session->id_cuenta;
				$asiento_automatico_detalle_session->id_cuenta=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$asiento_automatico_detalle_session->id_empresa;
				$asiento_automatico_detalle_session->id_empresa=-1;

			}
		}
		
		$asiento_automatico_detalle_session->strUltimaBusqueda='';
		//$asiento_automatico_detalle_session->intNumeroPaginacion=10;
		$asiento_automatico_detalle_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(asiento_automatico_detalle_util::$STR_SESSION_NAME,serialize($asiento_automatico_detalle_session));		
	}
	
	public function asiento_automatico_detallesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idasiento_automaticoDefaultFK = 0;
		$this->idcuentaDefaultFK = 0;
		$this->idcentro_costoDefaultFK = 0;
	}
	
	public function setasiento_automatico_detalleFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_asiento_automatico',$this->idasiento_automaticoDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta',$this->idcuentaDefaultFK);
		$this->setExistDataCampoForm('form','id_centro_costo',$this->idcentro_costoDefaultFK);
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

		asiento_automatico::$class;
		asiento_automatico_carga::$CONTROLLER;

		cuenta::$class;
		cuenta_carga::$CONTROLLER;

		centro_costo::$class;
		centro_costo_carga::$CONTROLLER;
		
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
		interface asiento_automatico_detalle_controlI {	
		
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
		
		public function onLoad(asiento_automatico_detalle_session $asiento_automatico_detalle_session=null);	
		function index(?string $strTypeOnLoadasiento_automatico_detalle='',?string $strTipoPaginaAuxiliarasiento_automatico_detalle='',?string $strTipoUsuarioAuxiliarasiento_automatico_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadasiento_automatico_detalle='',string $strTipoPaginaAuxiliarasiento_automatico_detalle='',string $strTipoUsuarioAuxiliarasiento_automatico_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($asiento_automatico_detalleReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(asiento_automatico_detalle $asiento_automatico_detalleClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(asiento_automatico_detalle_session $asiento_automatico_detalle_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(asiento_automatico_detalle_session $asiento_automatico_detalle_session);	
		public function asiento_automatico_detallesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setasiento_automatico_detalleFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
