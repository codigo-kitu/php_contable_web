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

namespace com\bydan\contabilidad\contabilidad\contador_auxiliar\presentation\control;

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

use com\bydan\contabilidad\contabilidad\contador_auxiliar\business\entity\contador_auxiliar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/contador_auxiliar/util/contador_auxiliar_carga.php');
use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_carga;

use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_util;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_param_return;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\business\logic\contador_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\presentation\session\contador_auxiliar_session;


//FK


use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\logic\libro_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_carga;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
contador_auxiliar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
contador_auxiliar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
contador_auxiliar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
contador_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*contador_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/contabilidad/contador_auxiliar/presentation/control/contador_auxiliar_init_control.php');
use com\bydan\contabilidad\contabilidad\contador_auxiliar\presentation\control\contador_auxiliar_init_control;

include_once('com/bydan/contabilidad/contabilidad/contador_auxiliar/presentation/control/contador_auxiliar_base_control.php');
use com\bydan\contabilidad\contabilidad\contador_auxiliar\presentation\control\contador_auxiliar_base_control;

class contador_auxiliar_control extends contador_auxiliar_base_control {	
	
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
			
			
			else if($action=="FK_Idlibro_auxiliar"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idlibro_auxiliarParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParalibro_auxiliar') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcontador_auxiliarActual=$this->getDataId();
				$this->abrirBusquedaParalibro_auxiliar();//$idcontador_auxiliarActual
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
					
					$contador_auxiliarController = new contador_auxiliar_control();
					
					$contador_auxiliarController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($contador_auxiliarController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$contador_auxiliarController = new contador_auxiliar_control();
						$contador_auxiliarController = $this;
						
						$jsonResponse = json_encode($contador_auxiliarController->contador_auxiliars);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->contador_auxiliarReturnGeneral==null) {
					$this->contador_auxiliarReturnGeneral=new contador_auxiliar_param_return();
				}
				
				echo($this->contador_auxiliarReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$contador_auxiliarController=new contador_auxiliar_control();
		
		$contador_auxiliarController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$contador_auxiliarController->usuarioActual=new usuario();
		
		$contador_auxiliarController->usuarioActual->setId($this->usuarioActual->getId());
		$contador_auxiliarController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$contador_auxiliarController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$contador_auxiliarController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$contador_auxiliarController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$contador_auxiliarController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$contador_auxiliarController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$contador_auxiliarController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $contador_auxiliarController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadcontador_auxiliar= $this->getDataGeneralString('strTypeOnLoadcontador_auxiliar');
		$strTipoPaginaAuxiliarcontador_auxiliar= $this->getDataGeneralString('strTipoPaginaAuxiliarcontador_auxiliar');
		$strTipoUsuarioAuxiliarcontador_auxiliar= $this->getDataGeneralString('strTipoUsuarioAuxiliarcontador_auxiliar');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadcontador_auxiliar,$strTipoPaginaAuxiliarcontador_auxiliar,$strTipoUsuarioAuxiliarcontador_auxiliar,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadcontador_auxiliar!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('contador_auxiliar','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(contador_auxiliar_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcontador_auxiliar,$this->strTipoUsuarioAuxiliarcontador_auxiliar,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(contador_auxiliar_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarcontador_auxiliar,$this->strTipoUsuarioAuxiliarcontador_auxiliar,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->contador_auxiliarReturnGeneral=new contador_auxiliar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->contador_auxiliarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->contador_auxiliarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->contador_auxiliarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->contador_auxiliarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->contador_auxiliarReturnGeneral);
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
		$this->contador_auxiliarReturnGeneral=new contador_auxiliar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->contador_auxiliarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->contador_auxiliarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->contador_auxiliarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->contador_auxiliarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->contador_auxiliarReturnGeneral);
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
		$this->contador_auxiliarReturnGeneral=new contador_auxiliar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->contador_auxiliarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->contador_auxiliarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->contador_auxiliarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->contador_auxiliarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->contador_auxiliarReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
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
			
			
			$this->contador_auxiliarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->contador_auxiliarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->contador_auxiliarReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->contador_auxiliarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->contador_auxiliarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->contador_auxiliarReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->contador_auxiliarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->contador_auxiliarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->contador_auxiliarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->contador_auxiliarReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->contador_auxiliarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->contador_auxiliarReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->contador_auxiliarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->contador_auxiliarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->contador_auxiliarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->contador_auxiliarReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->contador_auxiliarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->contador_auxiliarReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
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
		
		$this->contador_auxiliarLogic=new contador_auxiliar_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->contador_auxiliar=new contador_auxiliar();
		
		$this->strTypeOnLoadcontador_auxiliar='onload';
		$this->strTipoPaginaAuxiliarcontador_auxiliar='none';
		$this->strTipoUsuarioAuxiliarcontador_auxiliar='none';	

		$this->intNumeroPaginacion=contador_auxiliar_util::$INT_NUMERO_PAGINACION;
		
		$this->contador_auxiliarModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->contador_auxiliarControllerAdditional=new contador_auxiliar_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(contador_auxiliar_session $contador_auxiliar_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($contador_auxiliar_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadcontador_auxiliar='',?string $strTipoPaginaAuxiliarcontador_auxiliar='',?string $strTipoUsuarioAuxiliarcontador_auxiliar='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadcontador_auxiliar=$strTypeOnLoadcontador_auxiliar;
			$this->strTipoPaginaAuxiliarcontador_auxiliar=$strTipoPaginaAuxiliarcontador_auxiliar;
			$this->strTipoUsuarioAuxiliarcontador_auxiliar=$strTipoUsuarioAuxiliarcontador_auxiliar;
	
			if($strTipoUsuarioAuxiliarcontador_auxiliar=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->contador_auxiliar=new contador_auxiliar();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Contadores Auxiliareses';
			
			
			$contador_auxiliar_session=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME));
							
			if($contador_auxiliar_session==null) {
				$contador_auxiliar_session=new contador_auxiliar_session();
				
				/*$this->Session->write('contador_auxiliar_session',$contador_auxiliar_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($contador_auxiliar_session->strFuncionJsPadre!=null && $contador_auxiliar_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$contador_auxiliar_session->strFuncionJsPadre;
				
				$contador_auxiliar_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($contador_auxiliar_session);
			
			if($strTypeOnLoadcontador_auxiliar!=null && $strTypeOnLoadcontador_auxiliar=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$contador_auxiliar_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$contador_auxiliar_session->setPaginaPopupVariables(true);
				}
				
				if($contador_auxiliar_session->intNumeroPaginacion==contador_auxiliar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=contador_auxiliar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$contador_auxiliar_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,contador_auxiliar_util::$STR_SESSION_NAME,'contabilidad');																
			
			} else if($strTypeOnLoadcontador_auxiliar!=null && $strTypeOnLoadcontador_auxiliar=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$contador_auxiliar_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=contador_auxiliar_util::$INT_NUMERO_PAGINACION;*/
				
				if($contador_auxiliar_session->intNumeroPaginacion==contador_auxiliar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=contador_auxiliar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$contador_auxiliar_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarcontador_auxiliar!=null && $strTipoPaginaAuxiliarcontador_auxiliar=='none') {
				/*$contador_auxiliar_session->strStyleDivHeader='display:table-row';*/
				
				/*$contador_auxiliar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarcontador_auxiliar!=null && $strTipoPaginaAuxiliarcontador_auxiliar=='iframe') {
					/*
					$contador_auxiliar_session->strStyleDivArbol='display:none';
					$contador_auxiliar_session->strStyleDivHeader='display:none';
					$contador_auxiliar_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$contador_auxiliar_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->contador_auxiliarClase=new contador_auxiliar();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=contador_auxiliar_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(contador_auxiliar_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->contador_auxiliarLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->contador_auxiliarLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->contador_auxiliarLogic=new contador_auxiliar_logic();*/
			
			
			$this->contador_auxiliarsModel=null;
			/*new ListDataModel();*/
			
			/*$this->contador_auxiliarsModel.setWrappedData(contador_auxiliarLogic->getcontador_auxiliars());*/
						
			$this->contador_auxiliars= array();
			$this->contador_auxiliarsEliminados=array();
			$this->contador_auxiliarsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= contador_auxiliar_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->contador_auxiliar= new contador_auxiliar();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idlibro_auxiliar='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarcontador_auxiliar!=null && $strTipoUsuarioAuxiliarcontador_auxiliar!='none' && $strTipoUsuarioAuxiliarcontador_auxiliar!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcontador_auxiliar);
																
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
				if($strTipoUsuarioAuxiliarcontador_auxiliar!=null && $strTipoUsuarioAuxiliarcontador_auxiliar!='none' && $strTipoUsuarioAuxiliarcontador_auxiliar!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcontador_auxiliar);
																
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
				if($strTipoUsuarioAuxiliarcontador_auxiliar==null || $strTipoUsuarioAuxiliarcontador_auxiliar=='none' || $strTipoUsuarioAuxiliarcontador_auxiliar=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarcontador_auxiliar,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, contador_auxiliar_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, contador_auxiliar_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina contador_auxiliar');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($contador_auxiliar_session);
			
			$this->getSetBusquedasSesionConfig($contador_auxiliar_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportecontador_auxiliars($this->strAccionBusqueda,$this->contador_auxiliarLogic->getcontador_auxiliars());*/
				} else if($this->strGenerarReporte=='Html')	{
					$contador_auxiliar_session->strServletGenerarHtmlReporte='contador_auxiliarServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(contador_auxiliar_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(contador_auxiliar_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($contador_auxiliar_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$contador_auxiliar_session=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarcontador_auxiliar!=null && $strTipoUsuarioAuxiliarcontador_auxiliar=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($contador_auxiliar_session);
			}
								
			$this->set(contador_auxiliar_util::$STR_SESSION_NAME, $contador_auxiliar_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($contador_auxiliar_session);
			
			/*
			$this->contador_auxiliar->recursive = 0;
			
			$this->contador_auxiliars=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('contador_auxiliars', $this->contador_auxiliars);
			
			$this->set(contador_auxiliar_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->contador_auxiliarActual =$this->contador_auxiliarClase;
			
			/*$this->contador_auxiliarActual =$this->migrarModelcontador_auxiliar($this->contador_auxiliarClase);*/
			
			$this->returnHtml(false);
			
			$this->set(contador_auxiliar_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=contador_auxiliar_util::$STR_NOMBRE_OPCION;
				
			if(contador_auxiliar_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=contador_auxiliar_util::$STR_MODULO_OPCION.contador_auxiliar_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(contador_auxiliar_util::$STR_SESSION_NAME,serialize($contador_auxiliar_session));
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
			/*$contador_auxiliarClase= (contador_auxiliar) contador_auxiliarsModel.getRowData();*/
			
			$this->contador_auxiliarClase->setId($this->contador_auxiliar->getId());	
			$this->contador_auxiliarClase->setVersionRow($this->contador_auxiliar->getVersionRow());	
			$this->contador_auxiliarClase->setVersionRow($this->contador_auxiliar->getVersionRow());	
			$this->contador_auxiliarClase->setid_contador($this->contador_auxiliar->getid_contador());	
			$this->contador_auxiliarClase->setid_libro_auxiliar($this->contador_auxiliar->getid_libro_auxiliar());	
			$this->contador_auxiliarClase->setperiodo_anual($this->contador_auxiliar->getperiodo_anual());	
			$this->contador_auxiliarClase->setmes($this->contador_auxiliar->getmes());	
			$this->contador_auxiliarClase->setcontador($this->contador_auxiliar->getcontador());	
		
			/*$this->Session->write('contador_auxiliarVersionRowActual', contador_auxiliar.getVersionRow());*/
			
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
			
			$contador_auxiliar_session=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME));
						
			if($contador_auxiliar_session==null) {
				$contador_auxiliar_session=new contador_auxiliar_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('contador_auxiliar', $this->contador_auxiliar->read(null, $id));
	
			
			$this->contador_auxiliar->recursive = 0;
			
			$this->contador_auxiliars=$this->paginate();
			
			$this->set('contador_auxiliars', $this->contador_auxiliars);
	
			if (empty($this->data)) {
				$this->data = $this->contador_auxiliar->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->contador_auxiliarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->contador_auxiliarClase);
			
			$this->contador_auxiliarActual=$this->contador_auxiliarClase;
			
			/*$this->contador_auxiliarActual =$this->migrarModelcontador_auxiliar($this->contador_auxiliarClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->contador_auxiliarLogic->getcontador_auxiliars(),$this->contador_auxiliarActual);
			
			$this->actualizarControllerConReturnGeneral($this->contador_auxiliarReturnGeneral);
			
			//$this->contador_auxiliarReturnGeneral=$this->contador_auxiliarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->contador_auxiliarLogic->getcontador_auxiliars(),$this->contador_auxiliarActual,$this->contador_auxiliarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$contador_auxiliar_session=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME));
						
			if($contador_auxiliar_session==null) {
				$contador_auxiliar_session=new contador_auxiliar_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevocontador_auxiliar', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->contador_auxiliarClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->contador_auxiliarClase);
			
			$this->contador_auxiliarActual =$this->contador_auxiliarClase;
			
			/*$this->contador_auxiliarActual =$this->migrarModelcontador_auxiliar($this->contador_auxiliarClase);*/
			
			$this->setcontador_auxiliarFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->contador_auxiliarLogic->getcontador_auxiliars(),$this->contador_auxiliar);
			
			$this->actualizarControllerConReturnGeneral($this->contador_auxiliarReturnGeneral);
			
			//this->contador_auxiliarReturnGeneral=$this->contador_auxiliarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->contador_auxiliarLogic->getcontador_auxiliars(),$this->contador_auxiliar,$this->contador_auxiliarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idlibro_auxiliarDefaultFK!=null && $this->idlibro_auxiliarDefaultFK > -1) {
				$this->contador_auxiliarReturnGeneral->getcontador_auxiliar()->setid_libro_auxiliar($this->idlibro_auxiliarDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->contador_auxiliarReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->contador_auxiliarReturnGeneral->getcontador_auxiliar(),$this->contador_auxiliarActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeycontador_auxiliar($this->contador_auxiliarReturnGeneral->getcontador_auxiliar());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariocontador_auxiliar($this->contador_auxiliarReturnGeneral->getcontador_auxiliar());*/
			}
			
			if($this->contador_auxiliarReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->contador_auxiliarReturnGeneral->getcontador_auxiliar(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualcontador_auxiliar($this->contador_auxiliar,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->contador_auxiliarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->contador_auxiliarsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->contador_auxiliarsAuxiliar=array();
			}
			
			if(count($this->contador_auxiliarsAuxiliar)==2) {
				$contador_auxiliarOrigen=$this->contador_auxiliarsAuxiliar[0];
				$contador_auxiliarDestino=$this->contador_auxiliarsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($contador_auxiliarOrigen,$contador_auxiliarDestino,true,false,false);
				
				$this->actualizarLista($contador_auxiliarDestino,$this->contador_auxiliars);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->contador_auxiliarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->contador_auxiliarsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->contador_auxiliarsAuxiliar=array();
			}
			
			if(count($this->contador_auxiliarsAuxiliar) > 0) {
				foreach ($this->contador_auxiliarsAuxiliar as $contador_auxiliarSeleccionado) {
					$this->contador_auxiliar=new contador_auxiliar();
					
					$this->setCopiarVariablesObjetos($contador_auxiliarSeleccionado,$this->contador_auxiliar,true,true,false);
						
					$this->contador_auxiliars[]=$this->contador_auxiliar;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->contador_auxiliarsEliminados as $contador_auxiliarEliminado) {
				$this->contador_auxiliarLogic->contador_auxiliars[]=$contador_auxiliarEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->contador_auxiliar=new contador_auxiliar();
							
				$this->contador_auxiliars[]=$this->contador_auxiliar;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
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
		
		$contador_auxiliarActual=new contador_auxiliar();
		
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
				
				$contador_auxiliarActual=$this->contador_auxiliars[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $contador_auxiliarActual->setid_contador($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $contador_auxiliarActual->setid_libro_auxiliar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $contador_auxiliarActual->setperiodo_anual((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $contador_auxiliarActual->setmes((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $contador_auxiliarActual->setcontador((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
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
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=contador_auxiliar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadcontador_auxiliar='',string $strTipoPaginaAuxiliarcontador_auxiliar='',string $strTipoUsuarioAuxiliarcontador_auxiliar='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadcontador_auxiliar,$strTipoPaginaAuxiliarcontador_auxiliar,$strTipoUsuarioAuxiliarcontador_auxiliar,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->contador_auxiliars) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=contador_auxiliar_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=contador_auxiliar_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=contador_auxiliar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$contador_auxiliar_session=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME));
						
			if($contador_auxiliar_session==null) {
				$contador_auxiliar_session=new contador_auxiliar_session();
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
					/*$this->intNumeroPaginacion=contador_auxiliar_util::$INT_NUMERO_PAGINACION;*/
					
					if($contador_auxiliar_session->intNumeroPaginacion==contador_auxiliar_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=contador_auxiliar_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$contador_auxiliar_session->intNumeroPaginacion;
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
			
			$this->contador_auxiliarsEliminados=array();
			
			/*$this->contador_auxiliarLogic->setConnexion($connexion);*/
			
			$this->contador_auxiliarLogic->setIsConDeep(true);
			
			$this->contador_auxiliarLogic->getcontador_auxiliarDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('libro_auxiliar');$classes[]=$class;
			
			$this->contador_auxiliarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->contador_auxiliarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->contador_auxiliarLogic->getcontador_auxiliars()==null|| count($this->contador_auxiliarLogic->getcontador_auxiliars())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->contador_auxiliars=$this->contador_auxiliarLogic->getcontador_auxiliars();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->contador_auxiliarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->contador_auxiliarsReporte=$this->contador_auxiliarLogic->getcontador_auxiliars();
									
						/*$this->generarReportes('Todos',$this->contador_auxiliarLogic->getcontador_auxiliars());*/
					
						$this->contador_auxiliarLogic->setcontador_auxiliars($this->contador_auxiliars);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->contador_auxiliarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->contador_auxiliarLogic->getcontador_auxiliars()==null|| count($this->contador_auxiliarLogic->getcontador_auxiliars())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->contador_auxiliars=$this->contador_auxiliarLogic->getcontador_auxiliars();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->contador_auxiliarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->contador_auxiliarsReporte=$this->contador_auxiliarLogic->getcontador_auxiliars();
									
						/*$this->generarReportes('Todos',$this->contador_auxiliarLogic->getcontador_auxiliars());*/
					
						$this->contador_auxiliarLogic->setcontador_auxiliars($this->contador_auxiliars);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idcontador_auxiliar=0;*/
				
				if($contador_auxiliar_session->bitBusquedaDesdeFKSesionFK!=null && $contador_auxiliar_session->bitBusquedaDesdeFKSesionFK==true) {
					if($contador_auxiliar_session->bigIdActualFK!=null && $contador_auxiliar_session->bigIdActualFK!=0)	{
						$this->idcontador_auxiliar=$contador_auxiliar_session->bigIdActualFK;	
					}
					
					$contador_auxiliar_session->bitBusquedaDesdeFKSesionFK=false;
					
					$contador_auxiliar_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idcontador_auxiliar=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idcontador_auxiliar=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->contador_auxiliarLogic->getEntity($this->idcontador_auxiliar);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*contador_auxiliarLogicAdditional::getDetalleIndicePorId($idcontador_auxiliar);*/

				
				if($this->contador_auxiliarLogic->getcontador_auxiliar()!=null) {
					$this->contador_auxiliarLogic->setcontador_auxiliars(array());
					$this->contador_auxiliarLogic->contador_auxiliars[]=$this->contador_auxiliarLogic->getcontador_auxiliar();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idlibro_auxiliar')
			{

				if($contador_auxiliar_session->bigidlibro_auxiliarActual!=null && $contador_auxiliar_session->bigidlibro_auxiliarActual!=0)
				{
					$this->id_libro_auxiliarFK_Idlibro_auxiliar=$contador_auxiliar_session->bigidlibro_auxiliarActual;
					$contador_auxiliar_session->bigidlibro_auxiliarActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->contador_auxiliarLogic->getsFK_Idlibro_auxiliar($finalQueryPaginacion,$this->pagination,$this->id_libro_auxiliarFK_Idlibro_auxiliar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//contador_auxiliarLogicAdditional::getDetalleIndiceFK_Idlibro_auxiliar($this->id_libro_auxiliarFK_Idlibro_auxiliar);


					if($this->contador_auxiliarLogic->getcontador_auxiliars()==null || count($this->contador_auxiliarLogic->getcontador_auxiliars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$contador_auxiliars=$this->contador_auxiliarLogic->getcontador_auxiliars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->contador_auxiliarLogic->getsFK_Idlibro_auxiliar('',$this->pagination,$this->id_libro_auxiliarFK_Idlibro_auxiliar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->contador_auxiliarsReporte=$this->contador_auxiliarLogic->getcontador_auxiliars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecontador_auxiliars("FK_Idlibro_auxiliar",$this->contador_auxiliarLogic->getcontador_auxiliars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->contador_auxiliarLogic->setcontador_auxiliars($contador_auxiliars);
					}
				//}

			} 
		
		$contador_auxiliar_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$contador_auxiliar_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->contador_auxiliarLogic->loadForeignsKeysDescription();*/
		
		$this->contador_auxiliars=$this->contador_auxiliarLogic->getcontador_auxiliars();
		
		if($this->contador_auxiliarsEliminados==null) {
			$this->contador_auxiliarsEliminados=array();
		}
		
		$this->Session->write(contador_auxiliar_util::$STR_SESSION_NAME.'Lista',serialize($this->contador_auxiliars));
		$this->Session->write(contador_auxiliar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->contador_auxiliarsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(contador_auxiliar_util::$STR_SESSION_NAME,serialize($contador_auxiliar_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idcontador_auxiliar=$idGeneral;
			
			$this->intNumeroPaginacion=contador_auxiliar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
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
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
			}

			if(count($this->contador_auxiliars) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Idlibro_auxiliarParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=contador_auxiliar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_libro_auxiliarFK_Idlibro_auxiliar=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idlibro_auxiliar','cmbid_libro_auxiliar');

			$this->strAccionBusqueda='FK_Idlibro_auxiliar';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idlibro_auxiliar($strFinalQuery,$id_libro_auxiliar)
	{
		try
		{

			$this->contador_auxiliarLogic->getsFK_Idlibro_auxiliar($strFinalQuery,new Pagination(),$id_libro_auxiliar);
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
			
			
			$contador_auxiliarForeignKey=new contador_auxiliar_param_return(); //contador_auxiliarForeignKey();
			
			$contador_auxiliar_session=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME));
						
			if($contador_auxiliar_session==null) {
				$contador_auxiliar_session=new contador_auxiliar_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$contador_auxiliarForeignKey=$this->contador_auxiliarLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$contador_auxiliar_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_libro_auxiliar',$this->strRecargarFkTipos,',')) {
				$this->libro_auxiliarsFK=$contador_auxiliarForeignKey->libro_auxiliarsFK;
				$this->idlibro_auxiliarDefaultFK=$contador_auxiliarForeignKey->idlibro_auxiliarDefaultFK;
			}

			if($contador_auxiliar_session->bitBusquedaDesdeFKSesionlibro_auxiliar) {
				$this->setVisibleBusquedasParalibro_auxiliar(true);
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
	
	function cargarCombosFKFromReturnGeneral($contador_auxiliarReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$contador_auxiliarReturnGeneral->strRecargarFkTipos;
			
			


			if($contador_auxiliarReturnGeneral->con_libro_auxiliarsFK==true) {
				$this->libro_auxiliarsFK=$contador_auxiliarReturnGeneral->libro_auxiliarsFK;
				$this->idlibro_auxiliarDefaultFK=$contador_auxiliarReturnGeneral->idlibro_auxiliarDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(contador_auxiliar_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$contador_auxiliar_session=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME));
		
		if($contador_auxiliar_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($contador_auxiliar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==libro_auxiliar_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='libro_auxiliar';
			}
			
			$contador_auxiliar_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
			}						
			
			$this->contador_auxiliarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->contador_auxiliarsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->contador_auxiliarsAuxiliar=array();
			}
			
			if(count($this->contador_auxiliarsAuxiliar) > 0) {
				
				foreach ($this->contador_auxiliarsAuxiliar as $contador_auxiliarSeleccionado) {
					$this->eliminarTablaBase($contador_auxiliarSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
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
	
	
	
	public function getlibro_auxiliarsFKListSelectItem() 
	{
		$libro_auxiliarsList=array();

		$item=null;

		foreach($this->libro_auxiliarsFK as $libro_auxiliar)
		{
			$item=new SelectItem();
			$item->setLabel($libro_auxiliar->getnombre());
			$item->setValue($libro_auxiliar->getId());
			$libro_auxiliarsList[]=$item;
		}

		return $libro_auxiliarsList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=contador_auxiliar_util::$INT_NUMERO_PAGINACION;
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
				$this->contador_auxiliarLogic->commitNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->contador_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$contador_auxiliarsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->contador_auxiliars as $contador_auxiliarLocal) {
				if($contador_auxiliarLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->contador_auxiliar=new contador_auxiliar();
				
				$this->contador_auxiliar->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->contador_auxiliars[]=$this->contador_auxiliar;*/
				
				$contador_auxiliarsNuevos[]=$this->contador_auxiliar;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('libro_auxiliar');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->contador_auxiliarLogic->setcontador_auxiliars($contador_auxiliarsNuevos);
					
				$this->contador_auxiliarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($contador_auxiliarsNuevos as $contador_auxiliarNuevo) {
					$this->contador_auxiliars[]=$contador_auxiliarNuevo;
				}
				
				/*$this->contador_auxiliars[]=$contador_auxiliarsNuevos;*/
				
				$this->contador_auxiliarLogic->setcontador_auxiliars($this->contador_auxiliars);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($contador_auxiliarsNuevos!=null);
	}
					
	
	public function cargarComboslibro_auxiliarsFK($connexion=null,$strRecargarFkQuery=''){
		$libro_auxiliarLogic= new libro_auxiliar_logic();
		$pagination= new Pagination();
		$this->libro_auxiliarsFK=array();

		$libro_auxiliarLogic->setConnexion($connexion);
		$libro_auxiliarLogic->getlibro_auxiliarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$contador_auxiliar_session=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME));

		if($contador_auxiliar_session==null) {
			$contador_auxiliar_session=new contador_auxiliar_session();
		}
		
		if($contador_auxiliar_session->bitBusquedaDesdeFKSesionlibro_auxiliar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=libro_auxiliar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGloballibro_auxiliar=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGloballibro_auxiliar=Funciones::GetFinalQueryAppend($finalQueryGloballibro_auxiliar, '');
				$finalQueryGloballibro_auxiliar.=libro_auxiliar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGloballibro_auxiliar.$strRecargarFkQuery;		

				$libro_auxiliarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboslibro_auxiliarsFK($libro_auxiliarLogic->getlibro_auxiliars());

		} else {
			$this->setVisibleBusquedasParalibro_auxiliar(true);


			if($contador_auxiliar_session->bigidlibro_auxiliarActual!=null && $contador_auxiliar_session->bigidlibro_auxiliarActual > 0) {
				$libro_auxiliarLogic->getEntity($contador_auxiliar_session->bigidlibro_auxiliarActual);//WithConnection

				$this->libro_auxiliarsFK[$libro_auxiliarLogic->getlibro_auxiliar()->getId()]=contador_auxiliar_util::getlibro_auxiliarDescripcion($libro_auxiliarLogic->getlibro_auxiliar());
				$this->idlibro_auxiliarDefaultFK=$libro_auxiliarLogic->getlibro_auxiliar()->getId();
			}
		}
	}

	
	
	public function prepararComboslibro_auxiliarsFK($libro_auxiliars){

		foreach ($libro_auxiliars as $libro_auxiliarLocal ) {
			if($this->idlibro_auxiliarDefaultFK==0) {
				$this->idlibro_auxiliarDefaultFK=$libro_auxiliarLocal->getId();
			}

			$this->libro_auxiliarsFK[$libro_auxiliarLocal->getId()]=contador_auxiliar_util::getlibro_auxiliarDescripcion($libro_auxiliarLocal);
		}
	}

	
	
	public function cargarDescripcionlibro_auxiliarFK($idlibro_auxiliar,$connexion=null){
		$libro_auxiliarLogic= new libro_auxiliar_logic();
		$libro_auxiliarLogic->setConnexion($connexion);
		$libro_auxiliarLogic->getlibro_auxiliarDataAccess()->isForFKData=true;
		$strDescripcionlibro_auxiliar='';

		if($idlibro_auxiliar!=null && $idlibro_auxiliar!='' && $idlibro_auxiliar!='null') {
			if($connexion!=null) {
				$libro_auxiliarLogic->getEntity($idlibro_auxiliar);//WithConnection
			} else {
				$libro_auxiliarLogic->getEntityWithConnection($idlibro_auxiliar);//
			}

			$strDescripcionlibro_auxiliar=contador_auxiliar_util::getlibro_auxiliarDescripcion($libro_auxiliarLogic->getlibro_auxiliar());

		} else {
			$strDescripcionlibro_auxiliar='null';
		}

		return $strDescripcionlibro_auxiliar;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(contador_auxiliar $contador_auxiliarClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParalibro_auxiliar($isParalibro_auxiliar){
		$strParaVisiblelibro_auxiliar='display:table-row';
		$strParaVisibleNegacionlibro_auxiliar='display:none';

		if($isParalibro_auxiliar) {
			$strParaVisiblelibro_auxiliar='display:table-row';
			$strParaVisibleNegacionlibro_auxiliar='display:none';
		} else {
			$strParaVisiblelibro_auxiliar='display:none';
			$strParaVisibleNegacionlibro_auxiliar='display:table-row';
		}


		$strParaVisibleNegacionlibro_auxiliar=trim($strParaVisibleNegacionlibro_auxiliar);

		$this->strVisibleFK_Idlibro_auxiliar=$strParaVisiblelibro_auxiliar;
	}
	
	

	public function abrirBusquedaParalibro_auxiliar() {//$idcontador_auxiliarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcontador_auxiliarActual=$idcontador_auxiliarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.libro_auxiliar_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.contador_auxiliarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_libro_auxiliar(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',libro_auxiliar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.contador_auxiliarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_libro_auxiliar(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(libro_auxiliar_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcontador_auxiliar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(contador_auxiliar_util::$STR_SESSION_NAME,contador_auxiliar_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$contador_auxiliar_session=$this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME);
				
		if($contador_auxiliar_session==null) {
			$contador_auxiliar_session=new contador_auxiliar_session();		
			//$this->Session->write('contador_auxiliar_session',$contador_auxiliar_session);							
		}
		*/
		
		$contador_auxiliar_session=new contador_auxiliar_session();
    	$contador_auxiliar_session->strPathNavegacionActual=contador_auxiliar_util::$STR_CLASS_WEB_TITULO;
    	$contador_auxiliar_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(contador_auxiliar_util::$STR_SESSION_NAME,serialize($contador_auxiliar_session));		
	}	
	
	public function getSetBusquedasSesionConfig(contador_auxiliar_session $contador_auxiliar_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($contador_auxiliar_session->bitBusquedaDesdeFKSesionFK!=null && $contador_auxiliar_session->bitBusquedaDesdeFKSesionFK==true) {
			if($contador_auxiliar_session->bigIdActualFK!=null && $contador_auxiliar_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$contador_auxiliar_session->bigIdActualFKParaPosibleAtras=$contador_auxiliar_session->bigIdActualFK;*/
			}
				
			$contador_auxiliar_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$contador_auxiliar_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(contador_auxiliar_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($contador_auxiliar_session->bitBusquedaDesdeFKSesionlibro_auxiliar!=null && $contador_auxiliar_session->bitBusquedaDesdeFKSesionlibro_auxiliar==true)
			{
				if($contador_auxiliar_session->bigidlibro_auxiliarActual!=0) {
					$this->strAccionBusqueda='FK_Idlibro_auxiliar';

					$existe_history=HistoryWeb::ExisteElemento(contador_auxiliar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(contador_auxiliar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(contador_auxiliar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($contador_auxiliar_session->bigidlibro_auxiliarActualDescripcion);
						$historyWeb->setIdActual($contador_auxiliar_session->bigidlibro_auxiliarActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=contador_auxiliar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$contador_auxiliar_session->bigidlibro_auxiliarActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$contador_auxiliar_session->bitBusquedaDesdeFKSesionlibro_auxiliar=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=contador_auxiliar_util::$INT_NUMERO_PAGINACION;

				if($contador_auxiliar_session->intNumeroPaginacion==contador_auxiliar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=contador_auxiliar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$contador_auxiliar_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$contador_auxiliar_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$contador_auxiliar_session=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME));
		
		if($contador_auxiliar_session==null) {
			$contador_auxiliar_session=new contador_auxiliar_session();
		}
		
		$contador_auxiliar_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$contador_auxiliar_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$contador_auxiliar_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idlibro_auxiliar') {
			$contador_auxiliar_session->id_libro_auxiliar=$this->id_libro_auxiliarFK_Idlibro_auxiliar;	

		}
		
		$this->Session->write(contador_auxiliar_util::$STR_SESSION_NAME,serialize($contador_auxiliar_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(contador_auxiliar_session $contador_auxiliar_session) {
		
		if($contador_auxiliar_session==null) {
			$contador_auxiliar_session=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME));
		}
		
		if($contador_auxiliar_session==null) {
		   $contador_auxiliar_session=new contador_auxiliar_session();
		}
		
		if($contador_auxiliar_session->strUltimaBusqueda!=null && $contador_auxiliar_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$contador_auxiliar_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$contador_auxiliar_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$contador_auxiliar_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idlibro_auxiliar') {
				$this->id_libro_auxiliarFK_Idlibro_auxiliar=$contador_auxiliar_session->id_libro_auxiliar;
				$contador_auxiliar_session->id_libro_auxiliar=-1;

			}
		}
		
		$contador_auxiliar_session->strUltimaBusqueda='';
		//$contador_auxiliar_session->intNumeroPaginacion=10;
		$contador_auxiliar_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(contador_auxiliar_util::$STR_SESSION_NAME,serialize($contador_auxiliar_session));		
	}
	
	public function contador_auxiliarsControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idlibro_auxiliarDefaultFK = 0;
	}
	
	public function setcontador_auxiliarFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_libro_auxiliar',$this->idlibro_auxiliarDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		libro_auxiliar::$class;
		libro_auxiliar_carga::$CONTROLLER;
		
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
		interface contador_auxiliar_controlI {	
		
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
		
		public function onLoad(contador_auxiliar_session $contador_auxiliar_session=null);	
		function index(?string $strTypeOnLoadcontador_auxiliar='',?string $strTipoPaginaAuxiliarcontador_auxiliar='',?string $strTipoUsuarioAuxiliarcontador_auxiliar='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadcontador_auxiliar='',string $strTipoPaginaAuxiliarcontador_auxiliar='',string $strTipoUsuarioAuxiliarcontador_auxiliar='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($contador_auxiliarReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(contador_auxiliar $contador_auxiliarClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(contador_auxiliar_session $contador_auxiliar_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(contador_auxiliar_session $contador_auxiliar_session);	
		public function contador_auxiliarsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setcontador_auxiliarFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
