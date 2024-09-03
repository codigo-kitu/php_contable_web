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

namespace com\bydan\contabilidad\contabilidad\libro_auxiliar\presentation\control;

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

use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/libro_auxiliar/util/libro_auxiliar_carga.php');
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_carga;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_param_return;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\logic\libro_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\presentation\session\libro_auxiliar_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_carga;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_util;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\presentation\session\contador_auxiliar_session;

use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\session\asiento_predefinido_session;

use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\session\asiento_automatico_session;

use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;
use com\bydan\contabilidad\contabilidad\asiento\presentation\session\asiento_session;


/*CARGA ARCHIVOS FRAMEWORK*/
libro_auxiliar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
libro_auxiliar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
libro_auxiliar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/contabilidad/libro_auxiliar/presentation/control/libro_auxiliar_init_control.php');
use com\bydan\contabilidad\contabilidad\libro_auxiliar\presentation\control\libro_auxiliar_init_control;

include_once('com/bydan/contabilidad/contabilidad/libro_auxiliar/presentation/control/libro_auxiliar_base_control.php');
use com\bydan\contabilidad\contabilidad\libro_auxiliar\presentation\control\libro_auxiliar_base_control;

class libro_auxiliar_control extends libro_auxiliar_base_control {	
	
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
					
					
				if($this->data['reinicia_secuencial_mes']==null) {$this->data['reinicia_secuencial_mes']=false;} else {if($this->data['reinicia_secuencial_mes']=='on') {$this->data['reinicia_secuencial_mes']=true;}}
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
			else if($action=='registrarSesionParacontador_auxiliares' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idlibro_auxiliarActual=$this->getDataId();
				$this->registrarSesionParacontador_auxiliares($idlibro_auxiliarActual);
			}
			else if($action=='registrarSesionParaasiento_predefinidos' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idlibro_auxiliarActual=$this->getDataId();
				$this->registrarSesionParaasiento_predefinidos($idlibro_auxiliarActual);
			}
			else if($action=='registrarSesionParaasiento_automaticos' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idlibro_auxiliarActual=$this->getDataId();
				$this->registrarSesionParaasiento_automaticos($idlibro_auxiliarActual);
			}
			else if($action=='registrarSesionParaasientos' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idlibro_auxiliarActual=$this->getDataId();
				$this->registrarSesionParaasientos($idlibro_auxiliarActual);
			} 
			
			
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idlibro_auxiliarActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idlibro_auxiliarActual
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
					
					$libro_auxiliarController = new libro_auxiliar_control();
					
					$libro_auxiliarController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($libro_auxiliarController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$libro_auxiliarController = new libro_auxiliar_control();
						$libro_auxiliarController = $this;
						
						$jsonResponse = json_encode($libro_auxiliarController->libro_auxiliars);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->libro_auxiliarReturnGeneral==null) {
					$this->libro_auxiliarReturnGeneral=new libro_auxiliar_param_return();
				}
				
				echo($this->libro_auxiliarReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$libro_auxiliarController=new libro_auxiliar_control();
		
		$libro_auxiliarController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$libro_auxiliarController->usuarioActual=new usuario();
		
		$libro_auxiliarController->usuarioActual->setId($this->usuarioActual->getId());
		$libro_auxiliarController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$libro_auxiliarController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$libro_auxiliarController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$libro_auxiliarController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$libro_auxiliarController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$libro_auxiliarController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$libro_auxiliarController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $libro_auxiliarController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadlibro_auxiliar= $this->getDataGeneralString('strTypeOnLoadlibro_auxiliar');
		$strTipoPaginaAuxiliarlibro_auxiliar= $this->getDataGeneralString('strTipoPaginaAuxiliarlibro_auxiliar');
		$strTipoUsuarioAuxiliarlibro_auxiliar= $this->getDataGeneralString('strTipoUsuarioAuxiliarlibro_auxiliar');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadlibro_auxiliar,$strTipoPaginaAuxiliarlibro_auxiliar,$strTipoUsuarioAuxiliarlibro_auxiliar,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadlibro_auxiliar!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('libro_auxiliar','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(libro_auxiliar_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarlibro_auxiliar,$this->strTipoUsuarioAuxiliarlibro_auxiliar,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(libro_auxiliar_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarlibro_auxiliar,$this->strTipoUsuarioAuxiliarlibro_auxiliar,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->libro_auxiliarReturnGeneral=new libro_auxiliar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->libro_auxiliarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->libro_auxiliarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->libro_auxiliarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->libro_auxiliarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->libro_auxiliarReturnGeneral);
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
		$this->libro_auxiliarReturnGeneral=new libro_auxiliar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->libro_auxiliarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->libro_auxiliarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->libro_auxiliarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->libro_auxiliarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->libro_auxiliarReturnGeneral);
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
		$this->libro_auxiliarReturnGeneral=new libro_auxiliar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->libro_auxiliarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->libro_auxiliarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->libro_auxiliarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->libro_auxiliarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->libro_auxiliarReturnGeneral);
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
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
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
			
			
			$this->libro_auxiliarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->libro_auxiliarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->libro_auxiliarReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->libro_auxiliarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->libro_auxiliarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->libro_auxiliarReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->libro_auxiliarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->libro_auxiliarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->libro_auxiliarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->libro_auxiliarReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->libro_auxiliarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->libro_auxiliarReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->libro_auxiliarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->libro_auxiliarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->libro_auxiliarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->libro_auxiliarReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->libro_auxiliarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->libro_auxiliarReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
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
		
		$this->libro_auxiliarLogic=new libro_auxiliar_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->libro_auxiliar=new libro_auxiliar();
		
		$this->strTypeOnLoadlibro_auxiliar='onload';
		$this->strTipoPaginaAuxiliarlibro_auxiliar='none';
		$this->strTipoUsuarioAuxiliarlibro_auxiliar='none';	

		$this->intNumeroPaginacion=libro_auxiliar_util::$INT_NUMERO_PAGINACION;
		
		$this->libro_auxiliarModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->libro_auxiliarControllerAdditional=new libro_auxiliar_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(libro_auxiliar_session $libro_auxiliar_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($libro_auxiliar_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadlibro_auxiliar='',?string $strTipoPaginaAuxiliarlibro_auxiliar='',?string $strTipoUsuarioAuxiliarlibro_auxiliar='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadlibro_auxiliar=$strTypeOnLoadlibro_auxiliar;
			$this->strTipoPaginaAuxiliarlibro_auxiliar=$strTipoPaginaAuxiliarlibro_auxiliar;
			$this->strTipoUsuarioAuxiliarlibro_auxiliar=$strTipoUsuarioAuxiliarlibro_auxiliar;
	
			if($strTipoUsuarioAuxiliarlibro_auxiliar=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->libro_auxiliar=new libro_auxiliar();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Libro Auxiliares';
			
			
			$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));
							
			if($libro_auxiliar_session==null) {
				$libro_auxiliar_session=new libro_auxiliar_session();
				
				/*$this->Session->write('libro_auxiliar_session',$libro_auxiliar_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($libro_auxiliar_session->strFuncionJsPadre!=null && $libro_auxiliar_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$libro_auxiliar_session->strFuncionJsPadre;
				
				$libro_auxiliar_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($libro_auxiliar_session);
			
			if($strTypeOnLoadlibro_auxiliar!=null && $strTypeOnLoadlibro_auxiliar=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$libro_auxiliar_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$libro_auxiliar_session->setPaginaPopupVariables(true);
				}
				
				if($libro_auxiliar_session->intNumeroPaginacion==libro_auxiliar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=libro_auxiliar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$libro_auxiliar_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,libro_auxiliar_util::$STR_SESSION_NAME,'contabilidad');																
			
			} else if($strTypeOnLoadlibro_auxiliar!=null && $strTypeOnLoadlibro_auxiliar=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$libro_auxiliar_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=libro_auxiliar_util::$INT_NUMERO_PAGINACION;*/
				
				if($libro_auxiliar_session->intNumeroPaginacion==libro_auxiliar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=libro_auxiliar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$libro_auxiliar_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarlibro_auxiliar!=null && $strTipoPaginaAuxiliarlibro_auxiliar=='none') {
				/*$libro_auxiliar_session->strStyleDivHeader='display:table-row';*/
				
				/*$libro_auxiliar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarlibro_auxiliar!=null && $strTipoPaginaAuxiliarlibro_auxiliar=='iframe') {
					/*
					$libro_auxiliar_session->strStyleDivArbol='display:none';
					$libro_auxiliar_session->strStyleDivHeader='display:none';
					$libro_auxiliar_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$libro_auxiliar_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->libro_auxiliarClase=new libro_auxiliar();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=libro_auxiliar_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(libro_auxiliar_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->libro_auxiliarLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->libro_auxiliarLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$contadorauxiliarLogic=new contador_auxiliar_logic();
			//$asientopredefinidoLogic=new asiento_predefinido_logic();
			//$asientoautomaticoLogic=new asiento_automatico_logic();
			//$asientoLogic=new asiento_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->libro_auxiliarLogic=new libro_auxiliar_logic();*/
			
			
			$this->libro_auxiliarsModel=null;
			/*new ListDataModel();*/
			
			/*$this->libro_auxiliarsModel.setWrappedData(libro_auxiliarLogic->getlibro_auxiliars());*/
						
			$this->libro_auxiliars= array();
			$this->libro_auxiliarsEliminados=array();
			$this->libro_auxiliarsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= libro_auxiliar_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= libro_auxiliar_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->libro_auxiliar= new libro_auxiliar();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idempresa='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarlibro_auxiliar!=null && $strTipoUsuarioAuxiliarlibro_auxiliar!='none' && $strTipoUsuarioAuxiliarlibro_auxiliar!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarlibro_auxiliar);
																
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
				if($strTipoUsuarioAuxiliarlibro_auxiliar!=null && $strTipoUsuarioAuxiliarlibro_auxiliar!='none' && $strTipoUsuarioAuxiliarlibro_auxiliar!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarlibro_auxiliar);
																
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
				if($strTipoUsuarioAuxiliarlibro_auxiliar==null || $strTipoUsuarioAuxiliarlibro_auxiliar=='none' || $strTipoUsuarioAuxiliarlibro_auxiliar=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarlibro_auxiliar,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, libro_auxiliar_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, libro_auxiliar_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina libro_auxiliar');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($libro_auxiliar_session);
			
			$this->getSetBusquedasSesionConfig($libro_auxiliar_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportelibro_auxiliars($this->strAccionBusqueda,$this->libro_auxiliarLogic->getlibro_auxiliars());*/
				} else if($this->strGenerarReporte=='Html')	{
					$libro_auxiliar_session->strServletGenerarHtmlReporte='libro_auxiliarServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(libro_auxiliar_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(libro_auxiliar_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($libro_auxiliar_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarlibro_auxiliar!=null && $strTipoUsuarioAuxiliarlibro_auxiliar=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($libro_auxiliar_session);
			}
								
			$this->set(libro_auxiliar_util::$STR_SESSION_NAME, $libro_auxiliar_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($libro_auxiliar_session);
			
			/*
			$this->libro_auxiliar->recursive = 0;
			
			$this->libro_auxiliars=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('libro_auxiliars', $this->libro_auxiliars);
			
			$this->set(libro_auxiliar_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->libro_auxiliarActual =$this->libro_auxiliarClase;
			
			/*$this->libro_auxiliarActual =$this->migrarModellibro_auxiliar($this->libro_auxiliarClase);*/
			
			$this->returnHtml(false);
			
			$this->set(libro_auxiliar_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=libro_auxiliar_util::$STR_NOMBRE_OPCION;
				
			if(libro_auxiliar_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=libro_auxiliar_util::$STR_MODULO_OPCION.libro_auxiliar_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(libro_auxiliar_util::$STR_SESSION_NAME,serialize($libro_auxiliar_session));
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
			/*$libro_auxiliarClase= (libro_auxiliar) libro_auxiliarsModel.getRowData();*/
			
			$this->libro_auxiliarClase->setId($this->libro_auxiliar->getId());	
			$this->libro_auxiliarClase->setVersionRow($this->libro_auxiliar->getVersionRow());	
			$this->libro_auxiliarClase->setVersionRow($this->libro_auxiliar->getVersionRow());	
			$this->libro_auxiliarClase->setid_empresa($this->libro_auxiliar->getid_empresa());	
			$this->libro_auxiliarClase->setiniciales($this->libro_auxiliar->getiniciales());	
			$this->libro_auxiliarClase->setnombre($this->libro_auxiliar->getnombre());	
			$this->libro_auxiliarClase->setsecuencial($this->libro_auxiliar->getsecuencial());	
			$this->libro_auxiliarClase->setincremento($this->libro_auxiliar->getincremento());	
			$this->libro_auxiliarClase->setreinicia_secuencial_mes($this->libro_auxiliar->getreinicia_secuencial_mes());	
			$this->libro_auxiliarClase->setgenerado_por($this->libro_auxiliar->getgenerado_por());	
		
			/*$this->Session->write('libro_auxiliarVersionRowActual', libro_auxiliar.getVersionRow());*/
			
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
			
			$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));
						
			if($libro_auxiliar_session==null) {
				$libro_auxiliar_session=new libro_auxiliar_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('libro_auxiliar', $this->libro_auxiliar->read(null, $id));
	
			
			$this->libro_auxiliar->recursive = 0;
			
			$this->libro_auxiliars=$this->paginate();
			
			$this->set('libro_auxiliars', $this->libro_auxiliars);
	
			if (empty($this->data)) {
				$this->data = $this->libro_auxiliar->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->libro_auxiliarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->libro_auxiliarClase);
			
			$this->libro_auxiliarActual=$this->libro_auxiliarClase;
			
			/*$this->libro_auxiliarActual =$this->migrarModellibro_auxiliar($this->libro_auxiliarClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->libro_auxiliarLogic->getlibro_auxiliars(),$this->libro_auxiliarActual);
			
			$this->actualizarControllerConReturnGeneral($this->libro_auxiliarReturnGeneral);
			
			//$this->libro_auxiliarReturnGeneral=$this->libro_auxiliarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->libro_auxiliarLogic->getlibro_auxiliars(),$this->libro_auxiliarActual,$this->libro_auxiliarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));
						
			if($libro_auxiliar_session==null) {
				$libro_auxiliar_session=new libro_auxiliar_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevolibro_auxiliar', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->libro_auxiliarClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->libro_auxiliarClase);
			
			$this->libro_auxiliarActual =$this->libro_auxiliarClase;
			
			/*$this->libro_auxiliarActual =$this->migrarModellibro_auxiliar($this->libro_auxiliarClase);*/
			
			$this->setlibro_auxiliarFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->libro_auxiliarLogic->getlibro_auxiliars(),$this->libro_auxiliar);
			
			$this->actualizarControllerConReturnGeneral($this->libro_auxiliarReturnGeneral);
			
			//this->libro_auxiliarReturnGeneral=$this->libro_auxiliarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->libro_auxiliarLogic->getlibro_auxiliars(),$this->libro_auxiliar,$this->libro_auxiliarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->libro_auxiliarReturnGeneral->getlibro_auxiliar()->setid_empresa($this->idempresaDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->libro_auxiliarReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->libro_auxiliarReturnGeneral->getlibro_auxiliar(),$this->libro_auxiliarActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeylibro_auxiliar($this->libro_auxiliarReturnGeneral->getlibro_auxiliar());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariolibro_auxiliar($this->libro_auxiliarReturnGeneral->getlibro_auxiliar());*/
			}
			
			if($this->libro_auxiliarReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->libro_auxiliarReturnGeneral->getlibro_auxiliar(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActuallibro_auxiliar($this->libro_auxiliar,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->libro_auxiliarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->libro_auxiliarsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->libro_auxiliarsAuxiliar=array();
			}
			
			if(count($this->libro_auxiliarsAuxiliar)==2) {
				$libro_auxiliarOrigen=$this->libro_auxiliarsAuxiliar[0];
				$libro_auxiliarDestino=$this->libro_auxiliarsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($libro_auxiliarOrigen,$libro_auxiliarDestino,true,false,false);
				
				$this->actualizarLista($libro_auxiliarDestino,$this->libro_auxiliars);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->libro_auxiliarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->libro_auxiliarsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->libro_auxiliarsAuxiliar=array();
			}
			
			if(count($this->libro_auxiliarsAuxiliar) > 0) {
				foreach ($this->libro_auxiliarsAuxiliar as $libro_auxiliarSeleccionado) {
					$this->libro_auxiliar=new libro_auxiliar();
					
					$this->setCopiarVariablesObjetos($libro_auxiliarSeleccionado,$this->libro_auxiliar,true,true,false);
						
					$this->libro_auxiliars[]=$this->libro_auxiliar;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->libro_auxiliarsEliminados as $libro_auxiliarEliminado) {
				$this->libro_auxiliarLogic->libro_auxiliars[]=$libro_auxiliarEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->libro_auxiliar=new libro_auxiliar();
							
				$this->libro_auxiliars[]=$this->libro_auxiliar;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
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
		
		$libro_auxiliarActual=new libro_auxiliar();
		
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
				
				$libro_auxiliarActual=$this->libro_auxiliars[$indice];		
				
				$libro_auxiliarActual->setId($this->data['t'.$this->strSufijo]['cel_'.$i.'_0']);
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $libro_auxiliarActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $libro_auxiliarActual->setiniciales($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $libro_auxiliarActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $libro_auxiliarActual->setsecuencial((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $libro_auxiliarActual->setincremento((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $libro_auxiliarActual->setreinicia_secuencial_mes(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_8')));  } else { $libro_auxiliarActual->setreinicia_secuencial_mes(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $libro_auxiliarActual->setgenerado_por((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->libro_auxiliarsAuxiliar=array();		 
		/*$this->libro_auxiliarsEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->libro_auxiliarsAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->libro_auxiliarsAuxiliar=array();
		}
			
		if(count($this->libro_auxiliarsAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->libro_auxiliarsAuxiliar as $libro_auxiliarAuxLocal) {				
				
				foreach($this->libro_auxiliars as $libro_auxiliarLocal) {
					if($libro_auxiliarLocal->getId()==$libro_auxiliarAuxLocal->getId()) {
						$libro_auxiliarLocal->setIsDeleted(true);
						
						/*$this->libro_auxiliarsEliminados[]=$libro_auxiliarLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->libro_auxiliarLogic->setlibro_auxiliars($this->libro_auxiliars);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
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
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=libro_auxiliar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadlibro_auxiliar='',string $strTipoPaginaAuxiliarlibro_auxiliar='',string $strTipoUsuarioAuxiliarlibro_auxiliar='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadlibro_auxiliar,$strTipoPaginaAuxiliarlibro_auxiliar,$strTipoUsuarioAuxiliarlibro_auxiliar,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->libro_auxiliars) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=libro_auxiliar_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=libro_auxiliar_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=libro_auxiliar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));
						
			if($libro_auxiliar_session==null) {
				$libro_auxiliar_session=new libro_auxiliar_session();
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
					/*$this->intNumeroPaginacion=libro_auxiliar_util::$INT_NUMERO_PAGINACION;*/
					
					if($libro_auxiliar_session->intNumeroPaginacion==libro_auxiliar_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=libro_auxiliar_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$libro_auxiliar_session->intNumeroPaginacion;
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
			
			$this->libro_auxiliarsEliminados=array();
			
			/*$this->libro_auxiliarLogic->setConnexion($connexion);*/
			
			$this->libro_auxiliarLogic->setIsConDeep(true);
			
			$this->libro_auxiliarLogic->getlibro_auxiliarDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			
			$this->libro_auxiliarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->libro_auxiliarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->libro_auxiliarLogic->getlibro_auxiliars()==null|| count($this->libro_auxiliarLogic->getlibro_auxiliars())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->libro_auxiliars=$this->libro_auxiliarLogic->getlibro_auxiliars();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->libro_auxiliarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->libro_auxiliarsReporte=$this->libro_auxiliarLogic->getlibro_auxiliars();
									
						/*$this->generarReportes('Todos',$this->libro_auxiliarLogic->getlibro_auxiliars());*/
					
						$this->libro_auxiliarLogic->setlibro_auxiliars($this->libro_auxiliars);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->libro_auxiliarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->libro_auxiliarLogic->getlibro_auxiliars()==null|| count($this->libro_auxiliarLogic->getlibro_auxiliars())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->libro_auxiliars=$this->libro_auxiliarLogic->getlibro_auxiliars();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->libro_auxiliarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->libro_auxiliarsReporte=$this->libro_auxiliarLogic->getlibro_auxiliars();
									
						/*$this->generarReportes('Todos',$this->libro_auxiliarLogic->getlibro_auxiliars());*/
					
						$this->libro_auxiliarLogic->setlibro_auxiliars($this->libro_auxiliars);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idlibro_auxiliar=0;*/
				
				if($libro_auxiliar_session->bitBusquedaDesdeFKSesionFK!=null && $libro_auxiliar_session->bitBusquedaDesdeFKSesionFK==true) {
					if($libro_auxiliar_session->bigIdActualFK!=null && $libro_auxiliar_session->bigIdActualFK!=0)	{
						$this->idlibro_auxiliar=$libro_auxiliar_session->bigIdActualFK;	
					}
					
					$libro_auxiliar_session->bitBusquedaDesdeFKSesionFK=false;
					
					$libro_auxiliar_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idlibro_auxiliar=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idlibro_auxiliar=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->libro_auxiliarLogic->getEntity($this->idlibro_auxiliar);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*libro_auxiliarLogicAdditional::getDetalleIndicePorId($idlibro_auxiliar);*/

				
				if($this->libro_auxiliarLogic->getlibro_auxiliar()!=null) {
					$this->libro_auxiliarLogic->setlibro_auxiliars(array());
					$this->libro_auxiliarLogic->libro_auxiliars[]=$this->libro_auxiliarLogic->getlibro_auxiliar();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($libro_auxiliar_session->bigidempresaActual!=null && $libro_auxiliar_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$libro_auxiliar_session->bigidempresaActual;
					$libro_auxiliar_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->libro_auxiliarLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//libro_auxiliarLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->libro_auxiliarLogic->getlibro_auxiliars()==null || count($this->libro_auxiliarLogic->getlibro_auxiliars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$libro_auxiliars=$this->libro_auxiliarLogic->getlibro_auxiliars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->libro_auxiliarLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->libro_auxiliarsReporte=$this->libro_auxiliarLogic->getlibro_auxiliars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportelibro_auxiliars("FK_Idempresa",$this->libro_auxiliarLogic->getlibro_auxiliars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->libro_auxiliarLogic->setlibro_auxiliars($libro_auxiliars);
					}
				//}

			} 
		
		$libro_auxiliar_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$libro_auxiliar_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->libro_auxiliarLogic->loadForeignsKeysDescription();*/
		
		$this->libro_auxiliars=$this->libro_auxiliarLogic->getlibro_auxiliars();
		
		if($this->libro_auxiliarsEliminados==null) {
			$this->libro_auxiliarsEliminados=array();
		}
		
		$this->Session->write(libro_auxiliar_util::$STR_SESSION_NAME.'Lista',serialize($this->libro_auxiliars));
		$this->Session->write(libro_auxiliar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->libro_auxiliarsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(libro_auxiliar_util::$STR_SESSION_NAME,serialize($libro_auxiliar_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idlibro_auxiliar=$idGeneral;
			
			$this->intNumeroPaginacion=libro_auxiliar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
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
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}

			if(count($this->libro_auxiliars) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
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
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=libro_auxiliar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idempresa($strFinalQuery,$id_empresa)
	{
		try
		{

			$this->libro_auxiliarLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
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
			
			
			$libro_auxiliarForeignKey=new libro_auxiliar_param_return(); //libro_auxiliarForeignKey();
			
			$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));
						
			if($libro_auxiliar_session==null) {
				$libro_auxiliar_session=new libro_auxiliar_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$libro_auxiliarForeignKey=$this->libro_auxiliarLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$libro_auxiliar_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$libro_auxiliarForeignKey->empresasFK;
				$this->idempresaDefaultFK=$libro_auxiliarForeignKey->idempresaDefaultFK;
			}

			if($libro_auxiliar_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
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
	
	function cargarCombosFKFromReturnGeneral($libro_auxiliarReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$libro_auxiliarReturnGeneral->strRecargarFkTipos;
			
			


			if($libro_auxiliarReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$libro_auxiliarReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$libro_auxiliarReturnGeneral->idempresaDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(libro_auxiliar_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));
		
		if($libro_auxiliar_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($libro_auxiliar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			
			$libro_auxiliar_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}						
			
			$this->libro_auxiliarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->libro_auxiliarsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->libro_auxiliarsAuxiliar=array();
			}
			
			if(count($this->libro_auxiliarsAuxiliar) > 0) {
				
				foreach ($this->libro_auxiliarsAuxiliar as $libro_auxiliarSeleccionado) {
					$this->eliminarTablaBase($libro_auxiliarSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('asiento_automatico');
			$tipoRelacionReporte->setsDescripcion('Asiento Automaticos');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('asiento');
			$tipoRelacionReporte->setsDescripcion('Asientos');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('asiento_predefinido');
			$tipoRelacionReporte->setsDescripcion('Asiento Predefinidos');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('contador_auxiliar');
			$tipoRelacionReporte->setsDescripcion('Contadores Auxiliareses');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=contador_auxiliar_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=asiento_predefinido_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=asiento_automatico_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=asiento_util::$STR_NOMBRE_CLASE;
		
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


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=libro_auxiliar_util::$INT_NUMERO_PAGINACION;
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
				$this->libro_auxiliarLogic->commitNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->rollbackNewConnexionToDeep();
				$this->libro_auxiliarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$libro_auxiliarsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->libro_auxiliars as $libro_auxiliarLocal) {
				if($libro_auxiliarLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->libro_auxiliar=new libro_auxiliar();
				
				$this->libro_auxiliar->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->libro_auxiliars[]=$this->libro_auxiliar;*/
				
				$libro_auxiliarsNuevos[]=$this->libro_auxiliar;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->libro_auxiliarLogic->setlibro_auxiliars($libro_auxiliarsNuevos);
					
				$this->libro_auxiliarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($libro_auxiliarsNuevos as $libro_auxiliarNuevo) {
					$this->libro_auxiliars[]=$libro_auxiliarNuevo;
				}
				
				/*$this->libro_auxiliars[]=$libro_auxiliarsNuevos;*/
				
				$this->libro_auxiliarLogic->setlibro_auxiliars($this->libro_auxiliars);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($libro_auxiliarsNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));

		if($libro_auxiliar_session==null) {
			$libro_auxiliar_session=new libro_auxiliar_session();
		}
		
		if($libro_auxiliar_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($libro_auxiliar_session->bigidempresaActual!=null && $libro_auxiliar_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($libro_auxiliar_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=libro_auxiliar_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=libro_auxiliar_util::getempresaDescripcion($empresaLocal);
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

			$strDescripcionempresa=libro_auxiliar_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(libro_auxiliar $libro_auxiliarClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$libro_auxiliarClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
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

		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idlibro_auxiliarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idlibro_auxiliarActual=$idlibro_auxiliarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.libro_auxiliarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.libro_auxiliarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarlibro_auxiliar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParacontador_auxiliares(int $idlibro_auxiliarActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idlibro_auxiliarActual=$idlibro_auxiliarActual;

		$bitPaginaPopupcontador_auxiliar=false;

		try {

			$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));

			if($libro_auxiliar_session==null) {
				$libro_auxiliar_session=new libro_auxiliar_session();
			}

			$contador_auxiliar_session=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME));

			if($contador_auxiliar_session==null) {
				$contador_auxiliar_session=new contador_auxiliar_session();
			}

			$contador_auxiliar_session->strUltimaBusqueda='FK_Idlibro_auxiliar';
			$contador_auxiliar_session->strPathNavegacionActual=$libro_auxiliar_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.contador_auxiliar_util::$STR_CLASS_WEB_TITULO;
			$contador_auxiliar_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcontador_auxiliar=$contador_auxiliar_session->bitPaginaPopup;
			$contador_auxiliar_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcontador_auxiliar=$contador_auxiliar_session->bitPaginaPopup;
			$contador_auxiliar_session->bitPermiteNavegacionHaciaFKDesde=false;
			$contador_auxiliar_session->strNombrePaginaNavegacionHaciaFKDesde=libro_auxiliar_util::$STR_NOMBRE_OPCION;
			$contador_auxiliar_session->bitBusquedaDesdeFKSesionlibro_auxiliar=true;
			$contador_auxiliar_session->bigidlibro_auxiliarActual=$this->idlibro_auxiliarActual;

			$libro_auxiliar_session->bitBusquedaDesdeFKSesionFK=true;
			$libro_auxiliar_session->bigIdActualFK=$this->idlibro_auxiliarActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"contador_auxiliar"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=libro_auxiliar_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"contador_auxiliar"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(libro_auxiliar_util::$STR_SESSION_NAME,serialize($libro_auxiliar_session));
			$this->Session->write(contador_auxiliar_util::$STR_SESSION_NAME,serialize($contador_auxiliar_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcontador_auxiliar!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',contador_auxiliar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(contador_auxiliar_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarlibro_auxiliar,$this->strTipoUsuarioAuxiliarlibro_auxiliar,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',contador_auxiliar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(contador_auxiliar_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarlibro_auxiliar,$this->strTipoUsuarioAuxiliarlibro_auxiliar,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaasiento_predefinidos(int $idlibro_auxiliarActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idlibro_auxiliarActual=$idlibro_auxiliarActual;

		$bitPaginaPopupasiento_predefinido=false;

		try {

			$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));

			if($libro_auxiliar_session==null) {
				$libro_auxiliar_session=new libro_auxiliar_session();
			}

			$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

			if($asiento_predefinido_session==null) {
				$asiento_predefinido_session=new asiento_predefinido_session();
			}

			$asiento_predefinido_session->strUltimaBusqueda='FK_Idlibro_auxiliar';
			$asiento_predefinido_session->strPathNavegacionActual=$libro_auxiliar_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.asiento_predefinido_util::$STR_CLASS_WEB_TITULO;
			$asiento_predefinido_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupasiento_predefinido=$asiento_predefinido_session->bitPaginaPopup;
			$asiento_predefinido_session->setPaginaPopupVariables(true);
			$bitPaginaPopupasiento_predefinido=$asiento_predefinido_session->bitPaginaPopup;
			$asiento_predefinido_session->bitPermiteNavegacionHaciaFKDesde=false;
			$asiento_predefinido_session->strNombrePaginaNavegacionHaciaFKDesde=libro_auxiliar_util::$STR_NOMBRE_OPCION;
			$asiento_predefinido_session->bitBusquedaDesdeFKSesionlibro_auxiliar=true;
			$asiento_predefinido_session->bigidlibro_auxiliarActual=$this->idlibro_auxiliarActual;

			$libro_auxiliar_session->bitBusquedaDesdeFKSesionFK=true;
			$libro_auxiliar_session->bigIdActualFK=$this->idlibro_auxiliarActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"asiento_predefinido"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=libro_auxiliar_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"asiento_predefinido"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(libro_auxiliar_util::$STR_SESSION_NAME,serialize($libro_auxiliar_session));
			$this->Session->write(asiento_predefinido_util::$STR_SESSION_NAME,serialize($asiento_predefinido_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupasiento_predefinido!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_predefinido_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_predefinido_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarlibro_auxiliar,$this->strTipoUsuarioAuxiliarlibro_auxiliar,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_predefinido_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_predefinido_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarlibro_auxiliar,$this->strTipoUsuarioAuxiliarlibro_auxiliar,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaasiento_automaticos(int $idlibro_auxiliarActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idlibro_auxiliarActual=$idlibro_auxiliarActual;

		$bitPaginaPopupasiento_automatico=false;

		try {

			$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));

			if($libro_auxiliar_session==null) {
				$libro_auxiliar_session=new libro_auxiliar_session();
			}

			$asiento_automatico_session=unserialize($this->Session->read(asiento_automatico_util::$STR_SESSION_NAME));

			if($asiento_automatico_session==null) {
				$asiento_automatico_session=new asiento_automatico_session();
			}

			$asiento_automatico_session->strUltimaBusqueda='FK_Idlibro_auxiliar';
			$asiento_automatico_session->strPathNavegacionActual=$libro_auxiliar_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.asiento_automatico_util::$STR_CLASS_WEB_TITULO;
			$asiento_automatico_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupasiento_automatico=$asiento_automatico_session->bitPaginaPopup;
			$asiento_automatico_session->setPaginaPopupVariables(true);
			$bitPaginaPopupasiento_automatico=$asiento_automatico_session->bitPaginaPopup;
			$asiento_automatico_session->bitPermiteNavegacionHaciaFKDesde=false;
			$asiento_automatico_session->strNombrePaginaNavegacionHaciaFKDesde=libro_auxiliar_util::$STR_NOMBRE_OPCION;
			$asiento_automatico_session->bitBusquedaDesdeFKSesionlibro_auxiliar=true;
			$asiento_automatico_session->bigidlibro_auxiliarActual=$this->idlibro_auxiliarActual;

			$libro_auxiliar_session->bitBusquedaDesdeFKSesionFK=true;
			$libro_auxiliar_session->bigIdActualFK=$this->idlibro_auxiliarActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"asiento_automatico"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=libro_auxiliar_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"asiento_automatico"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(libro_auxiliar_util::$STR_SESSION_NAME,serialize($libro_auxiliar_session));
			$this->Session->write(asiento_automatico_util::$STR_SESSION_NAME,serialize($asiento_automatico_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupasiento_automatico!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_automatico_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_automatico_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarlibro_auxiliar,$this->strTipoUsuarioAuxiliarlibro_auxiliar,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_automatico_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_automatico_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarlibro_auxiliar,$this->strTipoUsuarioAuxiliarlibro_auxiliar,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaasientos(int $idlibro_auxiliarActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idlibro_auxiliarActual=$idlibro_auxiliarActual;

		$bitPaginaPopupasiento=false;

		try {

			$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));

			if($libro_auxiliar_session==null) {
				$libro_auxiliar_session=new libro_auxiliar_session();
			}

			$asiento_session=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME));

			if($asiento_session==null) {
				$asiento_session=new asiento_session();
			}

			$asiento_session->strUltimaBusqueda='FK_Idlibro_auxiliar';
			$asiento_session->strPathNavegacionActual=$libro_auxiliar_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.asiento_util::$STR_CLASS_WEB_TITULO;
			$asiento_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupasiento=$asiento_session->bitPaginaPopup;
			$asiento_session->setPaginaPopupVariables(true);
			$bitPaginaPopupasiento=$asiento_session->bitPaginaPopup;
			$asiento_session->bitPermiteNavegacionHaciaFKDesde=false;
			$asiento_session->strNombrePaginaNavegacionHaciaFKDesde=libro_auxiliar_util::$STR_NOMBRE_OPCION;
			$asiento_session->bitBusquedaDesdeFKSesionlibro_auxiliar=true;
			$asiento_session->bigidlibro_auxiliarActual=$this->idlibro_auxiliarActual;

			$libro_auxiliar_session->bitBusquedaDesdeFKSesionFK=true;
			$libro_auxiliar_session->bigIdActualFK=$this->idlibro_auxiliarActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"asiento"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=libro_auxiliar_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"asiento"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(libro_auxiliar_util::$STR_SESSION_NAME,serialize($libro_auxiliar_session));
			$this->Session->write(asiento_util::$STR_SESSION_NAME,serialize($asiento_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupasiento!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarlibro_auxiliar,$this->strTipoUsuarioAuxiliarlibro_auxiliar,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarlibro_auxiliar,$this->strTipoUsuarioAuxiliarlibro_auxiliar,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(libro_auxiliar_util::$STR_SESSION_NAME,libro_auxiliar_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$libro_auxiliar_session=$this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME);
				
		if($libro_auxiliar_session==null) {
			$libro_auxiliar_session=new libro_auxiliar_session();		
			//$this->Session->write('libro_auxiliar_session',$libro_auxiliar_session);							
		}
		*/
		
		$libro_auxiliar_session=new libro_auxiliar_session();
    	$libro_auxiliar_session->strPathNavegacionActual=libro_auxiliar_util::$STR_CLASS_WEB_TITULO;
    	$libro_auxiliar_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(libro_auxiliar_util::$STR_SESSION_NAME,serialize($libro_auxiliar_session));		
	}	
	
	public function getSetBusquedasSesionConfig(libro_auxiliar_session $libro_auxiliar_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($libro_auxiliar_session->bitBusquedaDesdeFKSesionFK!=null && $libro_auxiliar_session->bitBusquedaDesdeFKSesionFK==true) {
			if($libro_auxiliar_session->bigIdActualFK!=null && $libro_auxiliar_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$libro_auxiliar_session->bigIdActualFKParaPosibleAtras=$libro_auxiliar_session->bigIdActualFK;*/
			}
				
			$libro_auxiliar_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$libro_auxiliar_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(libro_auxiliar_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($libro_auxiliar_session->bitBusquedaDesdeFKSesionempresa!=null && $libro_auxiliar_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($libro_auxiliar_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(libro_auxiliar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(libro_auxiliar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(libro_auxiliar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($libro_auxiliar_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($libro_auxiliar_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=libro_auxiliar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$libro_auxiliar_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$libro_auxiliar_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=libro_auxiliar_util::$INT_NUMERO_PAGINACION;

				if($libro_auxiliar_session->intNumeroPaginacion==libro_auxiliar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=libro_auxiliar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$libro_auxiliar_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$libro_auxiliar_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));
		
		if($libro_auxiliar_session==null) {
			$libro_auxiliar_session=new libro_auxiliar_session();
		}
		
		$libro_auxiliar_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$libro_auxiliar_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$libro_auxiliar_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$libro_auxiliar_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		
		$this->Session->write(libro_auxiliar_util::$STR_SESSION_NAME,serialize($libro_auxiliar_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(libro_auxiliar_session $libro_auxiliar_session) {
		
		if($libro_auxiliar_session==null) {
			$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));
		}
		
		if($libro_auxiliar_session==null) {
		   $libro_auxiliar_session=new libro_auxiliar_session();
		}
		
		if($libro_auxiliar_session->strUltimaBusqueda!=null && $libro_auxiliar_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$libro_auxiliar_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$libro_auxiliar_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$libro_auxiliar_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$libro_auxiliar_session->id_empresa;
				$libro_auxiliar_session->id_empresa=-1;

			}
		}
		
		$libro_auxiliar_session->strUltimaBusqueda='';
		//$libro_auxiliar_session->intNumeroPaginacion=10;
		$libro_auxiliar_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(libro_auxiliar_util::$STR_SESSION_NAME,serialize($libro_auxiliar_session));		
	}
	
	public function libro_auxiliarsControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
	}
	
	public function setlibro_auxiliarFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
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
		
		//REL
		

		contador_auxiliar_carga::$CONTROLLER;
		contador_auxiliar_util::$STR_SCHEMA;
		contador_auxiliar_session::class;

		asiento_predefinido_carga::$CONTROLLER;
		asiento_predefinido_util::$STR_SCHEMA;
		asiento_predefinido_session::class;

		asiento_automatico_carga::$CONTROLLER;
		asiento_automatico_util::$STR_SCHEMA;
		asiento_automatico_session::class;

		asiento_carga::$CONTROLLER;
		asiento_util::$STR_SCHEMA;
		asiento_session::class;
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
		interface libro_auxiliar_controlI {	
		
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
		
		public function onLoad(libro_auxiliar_session $libro_auxiliar_session=null);	
		function index(?string $strTypeOnLoadlibro_auxiliar='',?string $strTipoPaginaAuxiliarlibro_auxiliar='',?string $strTipoUsuarioAuxiliarlibro_auxiliar='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadlibro_auxiliar='',string $strTipoPaginaAuxiliarlibro_auxiliar='',string $strTipoUsuarioAuxiliarlibro_auxiliar='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($libro_auxiliarReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(libro_auxiliar $libro_auxiliarClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(libro_auxiliar_session $libro_auxiliar_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(libro_auxiliar_session $libro_auxiliar_session);	
		public function libro_auxiliarsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setlibro_auxiliarFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
