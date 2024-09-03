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

namespace com\bydan\contabilidad\general\empresa\presentation\control;

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

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/empresa/util/empresa_carga.php');
use com\bydan\contabilidad\general\empresa\util\empresa_carga;

use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\general\empresa\util\empresa_param_return;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\presentation\session\empresa_session;


//FK


use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
empresa_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
empresa_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
empresa_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
empresa_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*empresa_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/general/empresa/presentation/control/empresa_init_control.php');
use com\bydan\contabilidad\general\empresa\presentation\control\empresa_init_control;

include_once('com/bydan/contabilidad/general/empresa/presentation/control/empresa_base_control.php');
use com\bydan\contabilidad\general\empresa\presentation\control\empresa_base_control;

class empresa_control extends empresa_base_control {	
	
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
			
			
			else if($action=="FK_Idciudad"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdciudadParaProcesar();
			}
			else if($action=="FK_Idpais"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdpaisParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParapais') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idempresaActual=$this->getDataId();
				$this->abrirBusquedaParapais();//$idempresaActual
			}
			else if($action=='abrirBusquedaParaciudad') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idempresaActual=$this->getDataId();
				$this->abrirBusquedaParaciudad();//$idempresaActual
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
					
					$empresaController = new empresa_control();
					
					$empresaController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($empresaController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$empresaController = new empresa_control();
						$empresaController = $this;
						
						$jsonResponse = json_encode($empresaController->empresas);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->empresaReturnGeneral==null) {
					$this->empresaReturnGeneral=new empresa_param_return();
				}
				
				echo($this->empresaReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$empresaController=new empresa_control();
		
		$empresaController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$empresaController->usuarioActual=new usuario();
		
		$empresaController->usuarioActual->setId($this->usuarioActual->getId());
		$empresaController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$empresaController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$empresaController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$empresaController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$empresaController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$empresaController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$empresaController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $empresaController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadempresa= $this->getDataGeneralString('strTypeOnLoadempresa');
		$strTipoPaginaAuxiliarempresa= $this->getDataGeneralString('strTipoPaginaAuxiliarempresa');
		$strTipoUsuarioAuxiliarempresa= $this->getDataGeneralString('strTipoUsuarioAuxiliarempresa');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadempresa,$strTipoPaginaAuxiliarempresa,$strTipoUsuarioAuxiliarempresa,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadempresa!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('empresa','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'general','','POPUP',$this->strTipoPaginaAuxiliarempresa,$this->strTipoUsuarioAuxiliarempresa,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'general','','POPUP',$this->strTipoPaginaAuxiliarempresa,$this->strTipoUsuarioAuxiliarempresa,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->empresaReturnGeneral=new empresa_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->empresaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->empresaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->empresaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->empresaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->empresaReturnGeneral);
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
		$this->empresaReturnGeneral=new empresa_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->empresaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->empresaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->empresaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->empresaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->empresaReturnGeneral);
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
		$this->empresaReturnGeneral=new empresa_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->empresaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->empresaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->empresaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->empresaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->empresaReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
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
			
			
			$this->empresaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->empresaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->empresaReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->empresaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->empresaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->empresaReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->empresaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->empresaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->empresaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->empresaReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->empresaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->empresaReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->empresaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->empresaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->empresaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->empresaReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->empresaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->empresaReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
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
		
		$this->empresaLogic=new empresa_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->empresa=new empresa();
		
		$this->strTypeOnLoadempresa='onload';
		$this->strTipoPaginaAuxiliarempresa='none';
		$this->strTipoUsuarioAuxiliarempresa='none';	

		$this->intNumeroPaginacion=empresa_util::$INT_NUMERO_PAGINACION;
		
		$this->empresaModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->empresaControllerAdditional=new empresa_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(empresa_session $empresa_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($empresa_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadempresa='',?string $strTipoPaginaAuxiliarempresa='',?string $strTipoUsuarioAuxiliarempresa='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadempresa=$strTypeOnLoadempresa;
			$this->strTipoPaginaAuxiliarempresa=$strTipoPaginaAuxiliarempresa;
			$this->strTipoUsuarioAuxiliarempresa=$strTipoUsuarioAuxiliarempresa;
	
			if($strTipoUsuarioAuxiliarempresa=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->empresa=new empresa();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Empresas';
			
			
			$empresa_session=unserialize($this->Session->read(empresa_util::$STR_SESSION_NAME));
							
			if($empresa_session==null) {
				$empresa_session=new empresa_session();
				
				/*$this->Session->write('empresa_session',$empresa_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($empresa_session->strFuncionJsPadre!=null && $empresa_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$empresa_session->strFuncionJsPadre;
				
				$empresa_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($empresa_session);
			
			if($strTypeOnLoadempresa!=null && $strTypeOnLoadempresa=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$empresa_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$empresa_session->setPaginaPopupVariables(true);
				}
				
				if($empresa_session->intNumeroPaginacion==empresa_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=empresa_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$empresa_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,empresa_util::$STR_SESSION_NAME,'general');																
			
			} else if($strTypeOnLoadempresa!=null && $strTypeOnLoadempresa=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$empresa_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=empresa_util::$INT_NUMERO_PAGINACION;*/
				
				if($empresa_session->intNumeroPaginacion==empresa_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=empresa_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$empresa_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarempresa!=null && $strTipoPaginaAuxiliarempresa=='none') {
				/*$empresa_session->strStyleDivHeader='display:table-row';*/
				
				/*$empresa_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarempresa!=null && $strTipoPaginaAuxiliarempresa=='iframe') {
					/*
					$empresa_session->strStyleDivArbol='display:none';
					$empresa_session->strStyleDivHeader='display:none';
					$empresa_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$empresa_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->empresaClase=new empresa();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=empresa_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(empresa_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->empresaLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->empresaLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->empresaLogic=new empresa_logic();*/
			
			
			$this->empresasModel=null;
			/*new ListDataModel();*/
			
			/*$this->empresasModel.setWrappedData(empresaLogic->getempresas());*/
						
			$this->empresas= array();
			$this->empresasEliminados=array();
			$this->empresasSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= empresa_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->empresa= new empresa();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idciudad='display:table-row';
			$this->strVisibleFK_Idpais='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarempresa!=null && $strTipoUsuarioAuxiliarempresa!='none' && $strTipoUsuarioAuxiliarempresa!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarempresa);
																
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
				if($strTipoUsuarioAuxiliarempresa!=null && $strTipoUsuarioAuxiliarempresa!='none' && $strTipoUsuarioAuxiliarempresa!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarempresa);
																
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
				if($strTipoUsuarioAuxiliarempresa==null || $strTipoUsuarioAuxiliarempresa=='none' || $strTipoUsuarioAuxiliarempresa=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarempresa,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, empresa_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, empresa_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina empresa');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($empresa_session);
			
			$this->getSetBusquedasSesionConfig($empresa_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteempresas($this->strAccionBusqueda,$this->empresaLogic->getempresas());*/
				} else if($this->strGenerarReporte=='Html')	{
					$empresa_session->strServletGenerarHtmlReporte='empresaServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(empresa_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(empresa_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($empresa_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$empresa_session=unserialize($this->Session->read(empresa_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarempresa!=null && $strTipoUsuarioAuxiliarempresa=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($empresa_session);
			}
								
			$this->set(empresa_util::$STR_SESSION_NAME, $empresa_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($empresa_session);
			
			/*
			$this->empresa->recursive = 0;
			
			$this->empresas=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('empresas', $this->empresas);
			
			$this->set(empresa_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->empresaActual =$this->empresaClase;
			
			/*$this->empresaActual =$this->migrarModelempresa($this->empresaClase);*/
			
			$this->returnHtml(false);
			
			$this->set(empresa_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=empresa_util::$STR_NOMBRE_OPCION;
				
			if(empresa_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=empresa_util::$STR_MODULO_OPCION.empresa_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(empresa_util::$STR_SESSION_NAME,serialize($empresa_session));
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
			/*$empresaClase= (empresa) empresasModel.getRowData();*/
			
			$this->empresaClase->setId($this->empresa->getId());	
			$this->empresaClase->setVersionRow($this->empresa->getVersionRow());	
			$this->empresaClase->setVersionRow($this->empresa->getVersionRow());	
			$this->empresaClase->setid_pais($this->empresa->getid_pais());	
			$this->empresaClase->setid_ciudad($this->empresa->getid_ciudad());	
			$this->empresaClase->setruc($this->empresa->getruc());	
			$this->empresaClase->setnombre($this->empresa->getnombre());	
			$this->empresaClase->setnombre_comercial($this->empresa->getnombre_comercial());	
			$this->empresaClase->setsector($this->empresa->getsector());	
			$this->empresaClase->setdireccion1($this->empresa->getdireccion1());	
			$this->empresaClase->setdireccion2($this->empresa->getdireccion2());	
			$this->empresaClase->setdireccion3($this->empresa->getdireccion3());	
			$this->empresaClase->settelefono1($this->empresa->gettelefono1());	
			$this->empresaClase->setmovil($this->empresa->getmovil());	
			$this->empresaClase->setmail($this->empresa->getmail());	
			$this->empresaClase->setsitio_web($this->empresa->getsitio_web());	
			$this->empresaClase->setcodigo_postal($this->empresa->getcodigo_postal());	
			$this->empresaClase->setfax($this->empresa->getfax());	
			$this->empresaClase->setlogo($this->empresa->getlogo());	
			$this->empresaClase->seticono($this->empresa->geticono());	
		
			/*$this->Session->write('empresaVersionRowActual', empresa.getVersionRow());*/
			
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
			
			$empresa_session=unserialize($this->Session->read(empresa_util::$STR_SESSION_NAME));
						
			if($empresa_session==null) {
				$empresa_session=new empresa_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('empresa', $this->empresa->read(null, $id));
	
			
			$this->empresa->recursive = 0;
			
			$this->empresas=$this->paginate();
			
			$this->set('empresas', $this->empresas);
	
			if (empty($this->data)) {
				$this->data = $this->empresa->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->empresaLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->empresaClase);
			
			$this->empresaActual=$this->empresaClase;
			
			/*$this->empresaActual =$this->migrarModelempresa($this->empresaClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->empresaLogic->getempresas(),$this->empresaActual);
			
			$this->actualizarControllerConReturnGeneral($this->empresaReturnGeneral);
			
			//$this->empresaReturnGeneral=$this->empresaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->empresaLogic->getempresas(),$this->empresaActual,$this->empresaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$empresa_session=unserialize($this->Session->read(empresa_util::$STR_SESSION_NAME));
						
			if($empresa_session==null) {
				$empresa_session=new empresa_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoempresa', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->empresaClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->empresaClase);
			
			$this->empresaActual =$this->empresaClase;
			
			/*$this->empresaActual =$this->migrarModelempresa($this->empresaClase);*/
			
			$this->setempresaFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->empresaLogic->getempresas(),$this->empresa);
			
			$this->actualizarControllerConReturnGeneral($this->empresaReturnGeneral);
			
			//this->empresaReturnGeneral=$this->empresaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->empresaLogic->getempresas(),$this->empresa,$this->empresaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idpaisDefaultFK!=null && $this->idpaisDefaultFK > -1) {
				$this->empresaReturnGeneral->getempresa()->setid_pais($this->idpaisDefaultFK);
			}

			if($this->idciudadDefaultFK!=null && $this->idciudadDefaultFK > -1) {
				$this->empresaReturnGeneral->getempresa()->setid_ciudad($this->idciudadDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->empresaReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->empresaReturnGeneral->getempresa(),$this->empresaActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyempresa($this->empresaReturnGeneral->getempresa());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioempresa($this->empresaReturnGeneral->getempresa());*/
			}
			
			if($this->empresaReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->empresaReturnGeneral->getempresa(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualempresa($this->empresa,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->empresasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->empresasAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->empresasAuxiliar=array();
			}
			
			if(count($this->empresasAuxiliar)==2) {
				$empresaOrigen=$this->empresasAuxiliar[0];
				$empresaDestino=$this->empresasAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($empresaOrigen,$empresaDestino,true,false,false);
				
				$this->actualizarLista($empresaDestino,$this->empresas);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->empresasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->empresasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->empresasAuxiliar=array();
			}
			
			if(count($this->empresasAuxiliar) > 0) {
				foreach ($this->empresasAuxiliar as $empresaSeleccionado) {
					$this->empresa=new empresa();
					
					$this->setCopiarVariablesObjetos($empresaSeleccionado,$this->empresa,true,true,false);
						
					$this->empresas[]=$this->empresa;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->empresasEliminados as $empresaEliminado) {
				$this->empresaLogic->empresas[]=$empresaEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->empresa=new empresa();
							
				$this->empresas[]=$this->empresa;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
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
		
		$empresaActual=new empresa();
		
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
				
				$empresaActual=$this->empresas[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $empresaActual->setid_pais((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $empresaActual->setid_ciudad((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $empresaActual->setruc($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $empresaActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $empresaActual->setnombre_comercial($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $empresaActual->setsector($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $empresaActual->setdireccion1($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $empresaActual->setdireccion2($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $empresaActual->setdireccion3($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $empresaActual->settelefono1($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $empresaActual->setmovil($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $empresaActual->setmail($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $empresaActual->setsitio_web($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $empresaActual->setcodigo_postal($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $empresaActual->setfax($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $empresaActual->setlogo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $empresaActual->seticono($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
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
				$this->empresaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=empresa_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadempresa='',string $strTipoPaginaAuxiliarempresa='',string $strTipoUsuarioAuxiliarempresa='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadempresa,$strTipoPaginaAuxiliarempresa,$strTipoUsuarioAuxiliarempresa,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->empresas) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=empresa_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=empresa_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=empresa_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$empresa_session=unserialize($this->Session->read(empresa_util::$STR_SESSION_NAME));
						
			if($empresa_session==null) {
				$empresa_session=new empresa_session();
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
					/*$this->intNumeroPaginacion=empresa_util::$INT_NUMERO_PAGINACION;*/
					
					if($empresa_session->intNumeroPaginacion==empresa_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=empresa_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$empresa_session->intNumeroPaginacion;
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
			
			$this->empresasEliminados=array();
			
			/*$this->empresaLogic->setConnexion($connexion);*/
			
			$this->empresaLogic->setIsConDeep(true);
			
			$this->empresaLogic->getempresaDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('pais');$classes[]=$class;
			$class=new Classe('ciudad');$classes[]=$class;
			
			$this->empresaLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->empresaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->empresaLogic->getempresas()==null|| count($this->empresaLogic->getempresas())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->empresas=$this->empresaLogic->getempresas();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->empresaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->empresasReporte=$this->empresaLogic->getempresas();
									
						/*$this->generarReportes('Todos',$this->empresaLogic->getempresas());*/
					
						$this->empresaLogic->setempresas($this->empresas);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->empresaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->empresaLogic->getempresas()==null|| count($this->empresaLogic->getempresas())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->empresas=$this->empresaLogic->getempresas();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->empresaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->empresasReporte=$this->empresaLogic->getempresas();
									
						/*$this->generarReportes('Todos',$this->empresaLogic->getempresas());*/
					
						$this->empresaLogic->setempresas($this->empresas);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idempresa=0;*/
				
				if($empresa_session->bitBusquedaDesdeFKSesionFK!=null && $empresa_session->bitBusquedaDesdeFKSesionFK==true) {
					if($empresa_session->bigIdActualFK!=null && $empresa_session->bigIdActualFK!=0)	{
						$this->idempresa=$empresa_session->bigIdActualFK;	
					}
					
					$empresa_session->bitBusquedaDesdeFKSesionFK=false;
					
					$empresa_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idempresa=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idempresa=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->empresaLogic->getEntity($this->idempresa);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*empresaLogicAdditional::getDetalleIndicePorId($idempresa);*/

				
				if($this->empresaLogic->getempresa()!=null) {
					$this->empresaLogic->setempresas(array());
					$this->empresaLogic->empresas[]=$this->empresaLogic->getempresa();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idciudad')
			{

				if($empresa_session->bigidciudadActual!=null && $empresa_session->bigidciudadActual!=0)
				{
					$this->id_ciudadFK_Idciudad=$empresa_session->bigidciudadActual;
					$empresa_session->bigidciudadActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->empresaLogic->getsFK_Idciudad($finalQueryPaginacion,$this->pagination,$this->id_ciudadFK_Idciudad);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//empresaLogicAdditional::getDetalleIndiceFK_Idciudad($this->id_ciudadFK_Idciudad);


					if($this->empresaLogic->getempresas()==null || count($this->empresaLogic->getempresas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$empresas=$this->empresaLogic->getempresas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->empresaLogic->getsFK_Idciudad('',$this->pagination,$this->id_ciudadFK_Idciudad);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->empresasReporte=$this->empresaLogic->getempresas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteempresas("FK_Idciudad",$this->empresaLogic->getempresas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->empresaLogic->setempresas($empresas);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idpais')
			{

				if($empresa_session->bigidpaisActual!=null && $empresa_session->bigidpaisActual!=0)
				{
					$this->id_paisFK_Idpais=$empresa_session->bigidpaisActual;
					$empresa_session->bigidpaisActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->empresaLogic->getsFK_Idpais($finalQueryPaginacion,$this->pagination,$this->id_paisFK_Idpais);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//empresaLogicAdditional::getDetalleIndiceFK_Idpais($this->id_paisFK_Idpais);


					if($this->empresaLogic->getempresas()==null || count($this->empresaLogic->getempresas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$empresas=$this->empresaLogic->getempresas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->empresaLogic->getsFK_Idpais('',$this->pagination,$this->id_paisFK_Idpais);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->empresasReporte=$this->empresaLogic->getempresas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteempresas("FK_Idpais",$this->empresaLogic->getempresas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->empresaLogic->setempresas($empresas);
					}
				//}

			} 
		
		$empresa_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$empresa_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->empresaLogic->loadForeignsKeysDescription();*/
		
		$this->empresas=$this->empresaLogic->getempresas();
		
		if($this->empresasEliminados==null) {
			$this->empresasEliminados=array();
		}
		
		$this->Session->write(empresa_util::$STR_SESSION_NAME.'Lista',serialize($this->empresas));
		$this->Session->write(empresa_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->empresasEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(empresa_util::$STR_SESSION_NAME,serialize($empresa_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idempresa=$idGeneral;
			
			$this->intNumeroPaginacion=empresa_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
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
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
			}

			if(count($this->empresas) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdciudadParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=empresa_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ciudadFK_Idciudad=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idciudad','cmbid_ciudad');

			$this->strAccionBusqueda='FK_Idciudad';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdpaisParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=empresa_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_paisFK_Idpais=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idpais','cmbid_pais');

			$this->strAccionBusqueda='FK_Idpais';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idciudad($strFinalQuery,$id_ciudad)
	{
		try
		{

			$this->empresaLogic->getsFK_Idciudad($strFinalQuery,new Pagination(),$id_ciudad);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idpais($strFinalQuery,$id_pais)
	{
		try
		{

			$this->empresaLogic->getsFK_Idpais($strFinalQuery,new Pagination(),$id_pais);
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
			
			
			$empresaForeignKey=new empresa_param_return(); //empresaForeignKey();
			
			$empresa_session=unserialize($this->Session->read(empresa_util::$STR_SESSION_NAME));
						
			if($empresa_session==null) {
				$empresa_session=new empresa_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$empresaForeignKey=$this->empresaLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$empresa_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_pais',$this->strRecargarFkTipos,',')) {
				$this->paissFK=$empresaForeignKey->paissFK;
				$this->idpaisDefaultFK=$empresaForeignKey->idpaisDefaultFK;
			}

			if($empresa_session->bitBusquedaDesdeFKSesionpais) {
				$this->setVisibleBusquedasParapais(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ciudad',$this->strRecargarFkTipos,',')) {
				$this->ciudadsFK=$empresaForeignKey->ciudadsFK;
				$this->idciudadDefaultFK=$empresaForeignKey->idciudadDefaultFK;
			}

			if($empresa_session->bitBusquedaDesdeFKSesionciudad) {
				$this->setVisibleBusquedasParaciudad(true);
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
	
	function cargarCombosFKFromReturnGeneral($empresaReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$empresaReturnGeneral->strRecargarFkTipos;
			
			


			if($empresaReturnGeneral->con_paissFK==true) {
				$this->paissFK=$empresaReturnGeneral->paissFK;
				$this->idpaisDefaultFK=$empresaReturnGeneral->idpaisDefaultFK;
			}


			if($empresaReturnGeneral->con_ciudadsFK==true) {
				$this->ciudadsFK=$empresaReturnGeneral->ciudadsFK;
				$this->idciudadDefaultFK=$empresaReturnGeneral->idciudadDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(empresa_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$empresa_session=unserialize($this->Session->read(empresa_util::$STR_SESSION_NAME));
		
		if($empresa_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($empresa_session->getstrNombrePaginaNavegacionHaciaFKDesde()==pais_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='pais';
			}
			else if($empresa_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ciudad_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ciudad';
			}
			
			$empresa_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
			}						
			
			$this->empresasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->empresasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->empresasAuxiliar=array();
			}
			
			if(count($this->empresasAuxiliar) > 0) {
				
				foreach ($this->empresasAuxiliar as $empresaSeleccionado) {
					$this->eliminarTablaBase($empresaSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
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
	
	
	
	public function getpaissFKListSelectItem() 
	{
		$paissList=array();

		$item=null;

		foreach($this->paissFK as $pais)
		{
			$item=new SelectItem();
			$item->setLabel($pais->getcodigo());
			$item->setValue($pais->getId());
			$paissList[]=$item;
		}

		return $paissList;
	}


	public function getciudadsFKListSelectItem() 
	{
		$ciudadsList=array();

		$item=null;

		foreach($this->ciudadsFK as $ciudad)
		{
			$item=new SelectItem();
			$item->setLabel($ciudad->getcodigo());
			$item->setValue($ciudad->getId());
			$ciudadsList[]=$item;
		}

		return $ciudadsList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=empresa_util::$INT_NUMERO_PAGINACION;
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
				$this->empresaLogic->commitNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->rollbackNewConnexionToDeep();
				$this->empresaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$empresasNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->empresas as $empresaLocal) {
				if($empresaLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->empresa=new empresa();
				
				$this->empresa->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->empresas[]=$this->empresa;*/
				
				$empresasNuevos[]=$this->empresa;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('pais');$classes[]=$class;
				$class=new Classe('ciudad');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->empresaLogic->setempresas($empresasNuevos);
					
				$this->empresaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($empresasNuevos as $empresaNuevo) {
					$this->empresas[]=$empresaNuevo;
				}
				
				/*$this->empresas[]=$empresasNuevos;*/
				
				$this->empresaLogic->setempresas($this->empresas);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($empresasNuevos!=null);
	}
					
	
	public function cargarCombospaissFK($connexion=null,$strRecargarFkQuery=''){
		$paisLogic= new pais_logic();
		$pagination= new Pagination();
		$this->paissFK=array();

		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$empresa_session=unserialize($this->Session->read(empresa_util::$STR_SESSION_NAME));

		if($empresa_session==null) {
			$empresa_session=new empresa_session();
		}
		
		if($empresa_session->bitBusquedaDesdeFKSesionpais!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=pais_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalpais=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalpais=Funciones::GetFinalQueryAppend($finalQueryGlobalpais, '');
				$finalQueryGlobalpais.=pais_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalpais.$strRecargarFkQuery;		

				$paisLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombospaissFK($paisLogic->getpaiss());

		} else {
			$this->setVisibleBusquedasParapais(true);


			if($empresa_session->bigidpaisActual!=null && $empresa_session->bigidpaisActual > 0) {
				$paisLogic->getEntity($empresa_session->bigidpaisActual);//WithConnection

				$this->paissFK[$paisLogic->getpais()->getId()]=empresa_util::getpaisDescripcion($paisLogic->getpais());
				$this->idpaisDefaultFK=$paisLogic->getpais()->getId();
			}
		}
	}

	public function cargarCombosciudadsFK($connexion=null,$strRecargarFkQuery=''){
		$ciudadLogic= new ciudad_logic();
		$pagination= new Pagination();
		$this->ciudadsFK=array();

		$ciudadLogic->setConnexion($connexion);
		$ciudadLogic->getciudadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$empresa_session=unserialize($this->Session->read(empresa_util::$STR_SESSION_NAME));

		if($empresa_session==null) {
			$empresa_session=new empresa_session();
		}
		
		if($empresa_session->bitBusquedaDesdeFKSesionciudad!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=ciudad_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalciudad=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalciudad=Funciones::GetFinalQueryAppend($finalQueryGlobalciudad, '');
				$finalQueryGlobalciudad.=ciudad_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalciudad.$strRecargarFkQuery;		

				$ciudadLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosciudadsFK($ciudadLogic->getciudads());

		} else {
			$this->setVisibleBusquedasParaciudad(true);


			if($empresa_session->bigidciudadActual!=null && $empresa_session->bigidciudadActual > 0) {
				$ciudadLogic->getEntity($empresa_session->bigidciudadActual);//WithConnection

				$this->ciudadsFK[$ciudadLogic->getciudad()->getId()]=empresa_util::getciudadDescripcion($ciudadLogic->getciudad());
				$this->idciudadDefaultFK=$ciudadLogic->getciudad()->getId();
			}
		}
	}

	
	
	public function prepararCombospaissFK($paiss){

		foreach ($paiss as $paisLocal ) {
			if($this->idpaisDefaultFK==0) {
				$this->idpaisDefaultFK=$paisLocal->getId();
			}

			$this->paissFK[$paisLocal->getId()]=empresa_util::getpaisDescripcion($paisLocal);
		}
	}

	public function prepararCombosciudadsFK($ciudads){

		foreach ($ciudads as $ciudadLocal ) {
			if($this->idciudadDefaultFK==0) {
				$this->idciudadDefaultFK=$ciudadLocal->getId();
			}

			$this->ciudadsFK[$ciudadLocal->getId()]=empresa_util::getciudadDescripcion($ciudadLocal);
		}
	}

	
	
	public function cargarDescripcionpaisFK($idpais,$connexion=null){
		$paisLogic= new pais_logic();
		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$strDescripcionpais='';

		if($idpais!=null && $idpais!='' && $idpais!='null') {
			if($connexion!=null) {
				$paisLogic->getEntity($idpais);//WithConnection
			} else {
				$paisLogic->getEntityWithConnection($idpais);//
			}

			$strDescripcionpais=empresa_util::getpaisDescripcion($paisLogic->getpais());

		} else {
			$strDescripcionpais='null';
		}

		return $strDescripcionpais;
	}

	public function cargarDescripcionciudadFK($idciudad,$connexion=null){
		$ciudadLogic= new ciudad_logic();
		$ciudadLogic->setConnexion($connexion);
		$ciudadLogic->getciudadDataAccess()->isForFKData=true;
		$strDescripcionciudad='';

		if($idciudad!=null && $idciudad!='' && $idciudad!='null') {
			if($connexion!=null) {
				$ciudadLogic->getEntity($idciudad);//WithConnection
			} else {
				$ciudadLogic->getEntityWithConnection($idciudad);//
			}

			$strDescripcionciudad=empresa_util::getciudadDescripcion($ciudadLogic->getciudad());

		} else {
			$strDescripcionciudad='null';
		}

		return $strDescripcionciudad;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(empresa $empresaClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParapais($isParapais){
		$strParaVisiblepais='display:table-row';
		$strParaVisibleNegacionpais='display:none';

		if($isParapais) {
			$strParaVisiblepais='display:table-row';
			$strParaVisibleNegacionpais='display:none';
		} else {
			$strParaVisiblepais='display:none';
			$strParaVisibleNegacionpais='display:table-row';
		}


		$strParaVisibleNegacionpais=trim($strParaVisibleNegacionpais);

		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idpais=$strParaVisiblepais;
	}

	public function setVisibleBusquedasParaciudad($isParaciudad){
		$strParaVisibleciudad='display:table-row';
		$strParaVisibleNegacionciudad='display:none';

		if($isParaciudad) {
			$strParaVisibleciudad='display:table-row';
			$strParaVisibleNegacionciudad='display:none';
		} else {
			$strParaVisibleciudad='display:none';
			$strParaVisibleNegacionciudad='display:table-row';
		}


		$strParaVisibleNegacionciudad=trim($strParaVisibleNegacionciudad);

		$this->strVisibleFK_Idciudad=$strParaVisibleciudad;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionciudad;
	}
	
	

	public function abrirBusquedaParapais() {//$idempresaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idempresaActual=$idempresaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.pais_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.empresaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_pais(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',pais_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.empresaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_pais(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(pais_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarempresa,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaciudad() {//$idempresaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idempresaActual=$idempresaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ciudad_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.empresaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ciudad(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ciudad_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.empresaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ciudad(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ciudad_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarempresa,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(empresa_util::$STR_SESSION_NAME,empresa_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$empresa_session=$this->Session->read(empresa_util::$STR_SESSION_NAME);
				
		if($empresa_session==null) {
			$empresa_session=new empresa_session();		
			//$this->Session->write('empresa_session',$empresa_session);							
		}
		*/
		
		$empresa_session=new empresa_session();
    	$empresa_session->strPathNavegacionActual=empresa_util::$STR_CLASS_WEB_TITULO;
    	$empresa_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(empresa_util::$STR_SESSION_NAME,serialize($empresa_session));		
	}	
	
	public function getSetBusquedasSesionConfig(empresa_session $empresa_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($empresa_session->bitBusquedaDesdeFKSesionFK!=null && $empresa_session->bitBusquedaDesdeFKSesionFK==true) {
			if($empresa_session->bigIdActualFK!=null && $empresa_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$empresa_session->bigIdActualFKParaPosibleAtras=$empresa_session->bigIdActualFK;*/
			}
				
			$empresa_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$empresa_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(empresa_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($empresa_session->bitBusquedaDesdeFKSesionpais!=null && $empresa_session->bitBusquedaDesdeFKSesionpais==true)
			{
				if($empresa_session->bigidpaisActual!=0) {
					$this->strAccionBusqueda='FK_Idpais';

					$existe_history=HistoryWeb::ExisteElemento(empresa_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(empresa_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(empresa_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($empresa_session->bigidpaisActualDescripcion);
						$historyWeb->setIdActual($empresa_session->bigidpaisActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=empresa_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$empresa_session->bigidpaisActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$empresa_session->bitBusquedaDesdeFKSesionpais=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=empresa_util::$INT_NUMERO_PAGINACION;

				if($empresa_session->intNumeroPaginacion==empresa_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=empresa_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$empresa_session->intNumeroPaginacion;
				}
			}
			else if($empresa_session->bitBusquedaDesdeFKSesionciudad!=null && $empresa_session->bitBusquedaDesdeFKSesionciudad==true)
			{
				if($empresa_session->bigidciudadActual!=0) {
					$this->strAccionBusqueda='FK_Idciudad';

					$existe_history=HistoryWeb::ExisteElemento(empresa_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(empresa_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(empresa_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($empresa_session->bigidciudadActualDescripcion);
						$historyWeb->setIdActual($empresa_session->bigidciudadActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=empresa_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$empresa_session->bigidciudadActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$empresa_session->bitBusquedaDesdeFKSesionciudad=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=empresa_util::$INT_NUMERO_PAGINACION;

				if($empresa_session->intNumeroPaginacion==empresa_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=empresa_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$empresa_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$empresa_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$empresa_session=unserialize($this->Session->read(empresa_util::$STR_SESSION_NAME));
		
		if($empresa_session==null) {
			$empresa_session=new empresa_session();
		}
		
		$empresa_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$empresa_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$empresa_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idciudad') {
			$empresa_session->id_ciudad=$this->id_ciudadFK_Idciudad;	

		}
		else if($this->strAccionBusqueda=='FK_Idpais') {
			$empresa_session->id_pais=$this->id_paisFK_Idpais;	

		}
		
		$this->Session->write(empresa_util::$STR_SESSION_NAME,serialize($empresa_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(empresa_session $empresa_session) {
		
		if($empresa_session==null) {
			$empresa_session=unserialize($this->Session->read(empresa_util::$STR_SESSION_NAME));
		}
		
		if($empresa_session==null) {
		   $empresa_session=new empresa_session();
		}
		
		if($empresa_session->strUltimaBusqueda!=null && $empresa_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$empresa_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$empresa_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$empresa_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idciudad') {
				$this->id_ciudadFK_Idciudad=$empresa_session->id_ciudad;
				$empresa_session->id_ciudad=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idpais') {
				$this->id_paisFK_Idpais=$empresa_session->id_pais;
				$empresa_session->id_pais=-1;

			}
		}
		
		$empresa_session->strUltimaBusqueda='';
		//$empresa_session->intNumeroPaginacion=10;
		$empresa_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(empresa_util::$STR_SESSION_NAME,serialize($empresa_session));		
	}
	
	public function empresasControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idpaisDefaultFK = 0;
		$this->idciudadDefaultFK = 0;
	}
	
	public function setempresaFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_pais',$this->idpaisDefaultFK);
		$this->setExistDataCampoForm('form','id_ciudad',$this->idciudadDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		pais::$class;
		pais_carga::$CONTROLLER;

		ciudad::$class;
		ciudad_carga::$CONTROLLER;
		
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
		interface empresa_controlI {	
		
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
		
		public function onLoad(empresa_session $empresa_session=null);	
		function index(?string $strTypeOnLoadempresa='',?string $strTipoPaginaAuxiliarempresa='',?string $strTipoUsuarioAuxiliarempresa='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadempresa='',string $strTipoPaginaAuxiliarempresa='',string $strTipoUsuarioAuxiliarempresa='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($empresaReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(empresa $empresaClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(empresa_session $empresa_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(empresa_session $empresa_session);	
		public function empresasControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setempresaFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
