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

namespace com\bydan\contabilidad\seguridad\perfil_opcion\presentation\control;

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

use com\bydan\contabilidad\seguridad\usuario\util\usuario_param_return;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_param_return;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic_add;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic_add;

use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/perfil_opcion/util/perfil_opcion_carga.php');
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_carga;

use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_util;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_param_return;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\logic\perfil_opcion_logic;
use com\bydan\contabilidad\seguridad\perfil_opcion\presentation\session\perfil_opcion_session;


//FK


use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;

use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\opcion\business\logic\opcion_logic;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
perfil_opcion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
perfil_opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
perfil_opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
perfil_opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*perfil_opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/seguridad/perfil_opcion/presentation/control/perfil_opcion_init_control.php');
use com\bydan\contabilidad\seguridad\perfil_opcion\presentation\control\perfil_opcion_init_control;

include_once('com/bydan/contabilidad/seguridad/perfil_opcion/presentation/control/perfil_opcion_base_control.php');
use com\bydan\contabilidad\seguridad\perfil_opcion\presentation\control\perfil_opcion_base_control;

class perfil_opcion_control extends perfil_opcion_base_control {	
	
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
					
					
				if($this->data['todo']==null) {$this->data['todo']=false;} else {if($this->data['todo']=='on') {$this->data['todo']=true;}}
					
				if($this->data['ingreso']==null) {$this->data['ingreso']=false;} else {if($this->data['ingreso']=='on') {$this->data['ingreso']=true;}}
					
				if($this->data['modificacion']==null) {$this->data['modificacion']=false;} else {if($this->data['modificacion']=='on') {$this->data['modificacion']=true;}}
					
				if($this->data['eliminacion']==null) {$this->data['eliminacion']=false;} else {if($this->data['eliminacion']=='on') {$this->data['eliminacion']=true;}}
					
				if($this->data['consulta']==null) {$this->data['consulta']=false;} else {if($this->data['consulta']=='on') {$this->data['consulta']=true;}}
					
				if($this->data['busqueda']==null) {$this->data['busqueda']=false;} else {if($this->data['busqueda']=='on') {$this->data['busqueda']=true;}}
					
				if($this->data['reporte']==null) {$this->data['reporte']=false;} else {if($this->data['reporte']=='on') {$this->data['reporte']=true;}}
					
				if($this->data['estado']==null) {$this->data['estado']=false;} else {if($this->data['estado']=='on') {$this->data['estado']=true;}}
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
			
			
			else if($action=="BusquedaPorIdPerfilPorIdOpcion"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsBusquedaPorIdPerfilPorIdOpcionParaProcesar();
			}
			else if($action=="FK_Idopcion"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdopcionParaProcesar();
			}
			else if($action=="FK_Idperfil"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdperfilParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaperfil') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idperfil_opcionActual=$this->getDataId();
				$this->abrirBusquedaParaperfil();//$idperfil_opcionActual
			}
			else if($action=='abrirBusquedaParaopcion') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idperfil_opcionActual=$this->getDataId();
				$this->abrirBusquedaParaopcion();//$idperfil_opcionActual
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
					
					$perfil_opcionController = new perfil_opcion_control();
					
					$perfil_opcionController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($perfil_opcionController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$perfil_opcionController = new perfil_opcion_control();
						$perfil_opcionController = $this;
						
						$jsonResponse = json_encode($perfil_opcionController->perfil_opcions);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->perfil_opcionReturnGeneral==null) {
					$this->perfil_opcionReturnGeneral=new perfil_opcion_param_return();
				}
				
				echo($this->perfil_opcionReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$perfil_opcionController=new perfil_opcion_control();
		
		$perfil_opcionController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$perfil_opcionController->usuarioActual=new usuario();
		
		$perfil_opcionController->usuarioActual->setId($this->usuarioActual->getId());
		$perfil_opcionController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$perfil_opcionController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$perfil_opcionController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$perfil_opcionController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$perfil_opcionController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$perfil_opcionController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$perfil_opcionController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $perfil_opcionController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadperfil_opcion= $this->getDataGeneralString('strTypeOnLoadperfil_opcion');
		$strTipoPaginaAuxiliarperfil_opcion= $this->getDataGeneralString('strTipoPaginaAuxiliarperfil_opcion');
		$strTipoUsuarioAuxiliarperfil_opcion= $this->getDataGeneralString('strTipoUsuarioAuxiliarperfil_opcion');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadperfil_opcion,$strTipoPaginaAuxiliarperfil_opcion,$strTipoUsuarioAuxiliarperfil_opcion,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadperfil_opcion!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('perfil_opcion','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_opcion_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarperfil_opcion,$this->strTipoUsuarioAuxiliarperfil_opcion,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_opcion_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarperfil_opcion,$this->strTipoUsuarioAuxiliarperfil_opcion,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->perfil_opcionReturnGeneral=new perfil_opcion_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->perfil_opcionReturnGeneral->conGuardarReturnSessionJs=true;
		$this->perfil_opcionReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->perfil_opcionReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->perfil_opcionReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->perfil_opcionReturnGeneral);
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
		$this->perfil_opcionReturnGeneral=new perfil_opcion_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->perfil_opcionReturnGeneral->conGuardarReturnSessionJs=true;
		$this->perfil_opcionReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->perfil_opcionReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->perfil_opcionReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->perfil_opcionReturnGeneral);
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
		$this->perfil_opcionReturnGeneral=new perfil_opcion_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->perfil_opcionReturnGeneral->conGuardarReturnSessionJs=true;
		$this->perfil_opcionReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->perfil_opcionReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->perfil_opcionReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->perfil_opcionReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
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
			
			
			$this->perfil_opcionReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->perfil_opcionReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->perfil_opcionReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->perfil_opcionReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->perfil_opcionReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->perfil_opcionReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->perfil_opcionReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->perfil_opcionReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->perfil_opcionReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->perfil_opcionReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->perfil_opcionReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->perfil_opcionReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->perfil_opcionReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->perfil_opcionReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->perfil_opcionReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->perfil_opcionReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->perfil_opcionReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->perfil_opcionReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
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
		
		$this->perfil_opcionLogic=new perfil_opcion_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->perfil_opcion=new perfil_opcion();
		
		$this->strTypeOnLoadperfil_opcion='onload';
		$this->strTipoPaginaAuxiliarperfil_opcion='none';
		$this->strTipoUsuarioAuxiliarperfil_opcion='none';	

		$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;
		
		$this->perfil_opcionModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->perfil_opcionControllerAdditional=new perfil_opcion_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(perfil_opcion_session $perfil_opcion_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($perfil_opcion_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadperfil_opcion='',?string $strTipoPaginaAuxiliarperfil_opcion='',?string $strTipoUsuarioAuxiliarperfil_opcion='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadperfil_opcion=$strTypeOnLoadperfil_opcion;
			$this->strTipoPaginaAuxiliarperfil_opcion=$strTipoPaginaAuxiliarperfil_opcion;
			$this->strTipoUsuarioAuxiliarperfil_opcion=$strTipoUsuarioAuxiliarperfil_opcion;
	
			if($strTipoUsuarioAuxiliarperfil_opcion=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->perfil_opcion=new perfil_opcion();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Perfil Opciones';
			
			
			$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));
							
			if($perfil_opcion_session==null) {
				$perfil_opcion_session=new perfil_opcion_session();
				
				/*$this->Session->write('perfil_opcion_session',$perfil_opcion_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($perfil_opcion_session->strFuncionJsPadre!=null && $perfil_opcion_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$perfil_opcion_session->strFuncionJsPadre;
				
				$perfil_opcion_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($perfil_opcion_session);
			
			if($strTypeOnLoadperfil_opcion!=null && $strTypeOnLoadperfil_opcion=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$perfil_opcion_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$perfil_opcion_session->setPaginaPopupVariables(true);
				}
				
				if($perfil_opcion_session->intNumeroPaginacion==perfil_opcion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$perfil_opcion_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,perfil_opcion_util::$STR_SESSION_NAME,'seguridad');																
			
			} else if($strTypeOnLoadperfil_opcion!=null && $strTypeOnLoadperfil_opcion=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$perfil_opcion_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;*/
				
				if($perfil_opcion_session->intNumeroPaginacion==perfil_opcion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$perfil_opcion_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarperfil_opcion!=null && $strTipoPaginaAuxiliarperfil_opcion=='none') {
				/*$perfil_opcion_session->strStyleDivHeader='display:table-row';*/
				
				/*$perfil_opcion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarperfil_opcion!=null && $strTipoPaginaAuxiliarperfil_opcion=='iframe') {
					/*
					$perfil_opcion_session->strStyleDivArbol='display:none';
					$perfil_opcion_session->strStyleDivHeader='display:none';
					$perfil_opcion_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$perfil_opcion_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->perfil_opcionClase=new perfil_opcion();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=perfil_opcion_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(perfil_opcion_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->perfil_opcionLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->perfil_opcionLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->perfil_opcionLogic=new perfil_opcion_logic();*/
			
			
			$this->perfil_opcionsModel=null;
			/*new ListDataModel();*/
			
			/*$this->perfil_opcionsModel.setWrappedData(perfil_opcionLogic->getperfil_opcions());*/
						
			$this->perfil_opcions= array();
			$this->perfil_opcionsEliminados=array();
			$this->perfil_opcionsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= perfil_opcion_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->perfil_opcion= new perfil_opcion();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleBusquedaPorIdPerfilPorIdOpcion='display:table-row';
			$this->strVisibleFK_Idopcion='display:table-row';
			$this->strVisibleFK_Idperfil='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarperfil_opcion!=null && $strTipoUsuarioAuxiliarperfil_opcion!='none' && $strTipoUsuarioAuxiliarperfil_opcion!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarperfil_opcion);
																
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
				if($strTipoUsuarioAuxiliarperfil_opcion!=null && $strTipoUsuarioAuxiliarperfil_opcion!='none' && $strTipoUsuarioAuxiliarperfil_opcion!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarperfil_opcion);
																
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
				if($strTipoUsuarioAuxiliarperfil_opcion==null || $strTipoUsuarioAuxiliarperfil_opcion=='none' || $strTipoUsuarioAuxiliarperfil_opcion=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarperfil_opcion,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, perfil_opcion_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, perfil_opcion_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina perfil_opcion');
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
			
			
			//BUSQUEDA INTERNA FK
			$this->idopcionActual=0;
			
			$this->cargarCombosFK(false);
			
			
			//$existe_history=false;
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($perfil_opcion_session);
			
			$this->getSetBusquedasSesionConfig($perfil_opcion_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteperfil_opcions($this->strAccionBusqueda,$this->perfil_opcionLogic->getperfil_opcions());*/
				} else if($this->strGenerarReporte=='Html')	{
					$perfil_opcion_session->strServletGenerarHtmlReporte='perfil_opcionServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(perfil_opcion_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(perfil_opcion_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($perfil_opcion_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarperfil_opcion!=null && $strTipoUsuarioAuxiliarperfil_opcion=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($perfil_opcion_session);
			}
								
			$this->set(perfil_opcion_util::$STR_SESSION_NAME, $perfil_opcion_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($perfil_opcion_session);
			
			/*
			$this->perfil_opcion->recursive = 0;
			
			$this->perfil_opcions=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('perfil_opcions', $this->perfil_opcions);
			
			$this->set(perfil_opcion_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->perfil_opcionActual =$this->perfil_opcionClase;
			
			/*$this->perfil_opcionActual =$this->migrarModelperfil_opcion($this->perfil_opcionClase);*/
			
			$this->returnHtml(false);
			
			$this->set(perfil_opcion_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=perfil_opcion_util::$STR_NOMBRE_OPCION;
				
			if(perfil_opcion_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=perfil_opcion_util::$STR_MODULO_OPCION.perfil_opcion_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(perfil_opcion_util::$STR_SESSION_NAME,serialize($perfil_opcion_session));
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
			/*$perfil_opcionClase= (perfil_opcion) perfil_opcionsModel.getRowData();*/
			
			$this->perfil_opcionClase->setId($this->perfil_opcion->getId());	
			$this->perfil_opcionClase->setVersionRow($this->perfil_opcion->getVersionRow());	
			$this->perfil_opcionClase->setVersionRow($this->perfil_opcion->getVersionRow());	
			$this->perfil_opcionClase->setid_perfil($this->perfil_opcion->getid_perfil());	
			$this->perfil_opcionClase->setid_opcion($this->perfil_opcion->getid_opcion());	
			$this->perfil_opcionClase->settodo($this->perfil_opcion->gettodo());	
			$this->perfil_opcionClase->setingreso($this->perfil_opcion->getingreso());	
			$this->perfil_opcionClase->setmodificacion($this->perfil_opcion->getmodificacion());	
			$this->perfil_opcionClase->seteliminacion($this->perfil_opcion->geteliminacion());	
			$this->perfil_opcionClase->setconsulta($this->perfil_opcion->getconsulta());	
			$this->perfil_opcionClase->setbusqueda($this->perfil_opcion->getbusqueda());	
			$this->perfil_opcionClase->setreporte($this->perfil_opcion->getreporte());	
			$this->perfil_opcionClase->setestado($this->perfil_opcion->getestado());	
		
			/*$this->Session->write('perfil_opcionVersionRowActual', perfil_opcion.getVersionRow());*/
			
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
			
			$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));
						
			if($perfil_opcion_session==null) {
				$perfil_opcion_session=new perfil_opcion_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('perfil_opcion', $this->perfil_opcion->read(null, $id));
	
			
			$this->perfil_opcion->recursive = 0;
			
			$this->perfil_opcions=$this->paginate();
			
			$this->set('perfil_opcions', $this->perfil_opcions);
	
			if (empty($this->data)) {
				$this->data = $this->perfil_opcion->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->perfil_opcionLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->perfil_opcionClase);
			
			$this->perfil_opcionActual=$this->perfil_opcionClase;
			
			/*$this->perfil_opcionActual =$this->migrarModelperfil_opcion($this->perfil_opcionClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->perfil_opcionLogic->getperfil_opcions(),$this->perfil_opcionActual);
			
			$this->actualizarControllerConReturnGeneral($this->perfil_opcionReturnGeneral);
			
			//$this->perfil_opcionReturnGeneral=$this->perfil_opcionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->perfil_opcionLogic->getperfil_opcions(),$this->perfil_opcionActual,$this->perfil_opcionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));
						
			if($perfil_opcion_session==null) {
				$perfil_opcion_session=new perfil_opcion_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoperfil_opcion', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->perfil_opcionClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->perfil_opcionClase);
			
			$this->perfil_opcionActual =$this->perfil_opcionClase;
			
			/*$this->perfil_opcionActual =$this->migrarModelperfil_opcion($this->perfil_opcionClase);*/
			
			$this->setperfil_opcionFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->perfil_opcionLogic->getperfil_opcions(),$this->perfil_opcion);
			
			$this->actualizarControllerConReturnGeneral($this->perfil_opcionReturnGeneral);
			
			//this->perfil_opcionReturnGeneral=$this->perfil_opcionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->perfil_opcionLogic->getperfil_opcions(),$this->perfil_opcion,$this->perfil_opcionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idperfilDefaultFK!=null && $this->idperfilDefaultFK > -1) {
				$this->perfil_opcionReturnGeneral->getperfil_opcion()->setid_perfil($this->idperfilDefaultFK);
			}

			if($this->idopcionDefaultFK!=null && $this->idopcionDefaultFK > -1) {
				$this->perfil_opcionReturnGeneral->getperfil_opcion()->setid_opcion($this->idopcionDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->perfil_opcionReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->perfil_opcionReturnGeneral->getperfil_opcion(),$this->perfil_opcionActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyperfil_opcion($this->perfil_opcionReturnGeneral->getperfil_opcion());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioperfil_opcion($this->perfil_opcionReturnGeneral->getperfil_opcion());*/
			}
			
			if($this->perfil_opcionReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->perfil_opcionReturnGeneral->getperfil_opcion(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualperfil_opcion($this->perfil_opcion,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->perfil_opcionsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->perfil_opcionsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->perfil_opcionsAuxiliar=array();
			}
			
			if(count($this->perfil_opcionsAuxiliar)==2) {
				$perfil_opcionOrigen=$this->perfil_opcionsAuxiliar[0];
				$perfil_opcionDestino=$this->perfil_opcionsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($perfil_opcionOrigen,$perfil_opcionDestino,true,false,false);
				
				$this->actualizarLista($perfil_opcionDestino,$this->perfil_opcions);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->perfil_opcionsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->perfil_opcionsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->perfil_opcionsAuxiliar=array();
			}
			
			if(count($this->perfil_opcionsAuxiliar) > 0) {
				foreach ($this->perfil_opcionsAuxiliar as $perfil_opcionSeleccionado) {
					$this->perfil_opcion=new perfil_opcion();
					
					$this->setCopiarVariablesObjetos($perfil_opcionSeleccionado,$this->perfil_opcion,true,true,false);
						
					$this->perfil_opcions[]=$this->perfil_opcion;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->perfil_opcionsEliminados as $perfil_opcionEliminado) {
				$this->perfil_opcionLogic->perfil_opcions[]=$perfil_opcionEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->perfil_opcion=new perfil_opcion();
							
				$this->perfil_opcions[]=$this->perfil_opcion;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
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
		
		$perfil_opcionActual=new perfil_opcion();
		
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
				
				$perfil_opcionActual=$this->perfil_opcions[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $perfil_opcionActual->setid_perfil((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $perfil_opcionActual->setid_opcion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $perfil_opcionActual->settodo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_5')));  } else { $perfil_opcionActual->settodo(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $perfil_opcionActual->setingreso(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_6')));  } else { $perfil_opcionActual->setingreso(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $perfil_opcionActual->setmodificacion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_7')));  } else { $perfil_opcionActual->setmodificacion(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $perfil_opcionActual->seteliminacion(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_8')));  } else { $perfil_opcionActual->seteliminacion(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $perfil_opcionActual->setconsulta(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_9')));  } else { $perfil_opcionActual->setconsulta(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $perfil_opcionActual->setbusqueda(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_10')));  } else { $perfil_opcionActual->setbusqueda(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $perfil_opcionActual->setreporte(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_11')));  } else { $perfil_opcionActual->setreporte(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $perfil_opcionActual->setestado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_12')));  } else { $perfil_opcionActual->setestado(false); }
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
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadperfil_opcion='',string $strTipoPaginaAuxiliarperfil_opcion='',string $strTipoUsuarioAuxiliarperfil_opcion='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadperfil_opcion,$strTipoPaginaAuxiliarperfil_opcion,$strTipoUsuarioAuxiliarperfil_opcion,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->perfil_opcions) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=perfil_opcion_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=perfil_opcion_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=perfil_opcion_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));
						
			if($perfil_opcion_session==null) {
				$perfil_opcion_session=new perfil_opcion_session();
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
					/*$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;*/
					
					if($perfil_opcion_session->intNumeroPaginacion==perfil_opcion_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$perfil_opcion_session->intNumeroPaginacion;
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
			
			$this->perfil_opcionsEliminados=array();
			
			/*$this->perfil_opcionLogic->setConnexion($connexion);*/
			
			$this->perfil_opcionLogic->setIsConDeep(true);
			
			$this->perfil_opcionLogic->getperfil_opcionDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('perfil');$classes[]=$class;
			$class=new Classe('opcion');$classes[]=$class;
			
			$this->perfil_opcionLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->perfil_opcionLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->perfil_opcionLogic->getperfil_opcions()==null|| count($this->perfil_opcionLogic->getperfil_opcions())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->perfil_opcions=$this->perfil_opcionLogic->getperfil_opcions();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->perfil_opcionLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->perfil_opcionsReporte=$this->perfil_opcionLogic->getperfil_opcions();
									
						/*$this->generarReportes('Todos',$this->perfil_opcionLogic->getperfil_opcions());*/
					
						$this->perfil_opcionLogic->setperfil_opcions($this->perfil_opcions);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->perfil_opcionLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->perfil_opcionLogic->getperfil_opcions()==null|| count($this->perfil_opcionLogic->getperfil_opcions())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->perfil_opcions=$this->perfil_opcionLogic->getperfil_opcions();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->perfil_opcionLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->perfil_opcionsReporte=$this->perfil_opcionLogic->getperfil_opcions();
									
						/*$this->generarReportes('Todos',$this->perfil_opcionLogic->getperfil_opcions());*/
					
						$this->perfil_opcionLogic->setperfil_opcions($this->perfil_opcions);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idperfil_opcion=0;*/
				
				if($perfil_opcion_session->bitBusquedaDesdeFKSesionFK!=null && $perfil_opcion_session->bitBusquedaDesdeFKSesionFK==true) {
					if($perfil_opcion_session->bigIdActualFK!=null && $perfil_opcion_session->bigIdActualFK!=0)	{
						$this->idperfil_opcion=$perfil_opcion_session->bigIdActualFK;	
					}
					
					$perfil_opcion_session->bitBusquedaDesdeFKSesionFK=false;
					
					$perfil_opcion_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idperfil_opcion=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idperfil_opcion=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->perfil_opcionLogic->getEntity($this->idperfil_opcion);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*perfil_opcionLogicAdditional::getDetalleIndicePorId($idperfil_opcion);*/

				
				if($this->perfil_opcionLogic->getperfil_opcion()!=null) {
					$this->perfil_opcionLogic->setperfil_opcions(array());
					$this->perfil_opcionLogic->perfil_opcions[]=$this->perfil_opcionLogic->getperfil_opcion();
				}
			
			}
		
			else if($strAccionBusqueda=='BusquedaPorIdPerfilPorIdOpcion')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfil_opcionLogic->getsBusquedaPorIdPerfilPorIdOpcion($finalQueryPaginacion,$this->pagination,$this->id_perfilBusquedaPorIdPerfilPorIdOpcion,$this->id_opcionBusquedaPorIdPerfilPorIdOpcion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//perfil_opcionLogicAdditional::getDetalleIndiceBusquedaPorIdPerfilPorIdOpcion($this->id_perfilBusquedaPorIdPerfilPorIdOpcion,$this->id_opcionBusquedaPorIdPerfilPorIdOpcion);


					if($this->perfil_opcionLogic->getperfil_opcions()==null || count($this->perfil_opcionLogic->getperfil_opcions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$perfil_opcions=$this->perfil_opcionLogic->getperfil_opcions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfil_opcionLogic->getsBusquedaPorIdPerfilPorIdOpcion('',$this->pagination,$this->id_perfilBusquedaPorIdPerfilPorIdOpcion,$this->id_opcionBusquedaPorIdPerfilPorIdOpcion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->perfil_opcionsReporte=$this->perfil_opcionLogic->getperfil_opcions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteperfil_opcions("BusquedaPorIdPerfilPorIdOpcion",$this->perfil_opcionLogic->getperfil_opcions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->perfil_opcionLogic->setperfil_opcions($perfil_opcions);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idopcion')
			{

				if($perfil_opcion_session->bigidopcionActual!=null && $perfil_opcion_session->bigidopcionActual!=0)
				{
					$this->id_opcionFK_Idopcion=$perfil_opcion_session->bigidopcionActual;
					$perfil_opcion_session->bigidopcionActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfil_opcionLogic->getsFK_Idopcion($finalQueryPaginacion,$this->pagination,$this->id_opcionFK_Idopcion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//perfil_opcionLogicAdditional::getDetalleIndiceFK_Idopcion($this->id_opcionFK_Idopcion);


					if($this->perfil_opcionLogic->getperfil_opcions()==null || count($this->perfil_opcionLogic->getperfil_opcions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$perfil_opcions=$this->perfil_opcionLogic->getperfil_opcions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfil_opcionLogic->getsFK_Idopcion('',$this->pagination,$this->id_opcionFK_Idopcion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->perfil_opcionsReporte=$this->perfil_opcionLogic->getperfil_opcions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteperfil_opcions("FK_Idopcion",$this->perfil_opcionLogic->getperfil_opcions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->perfil_opcionLogic->setperfil_opcions($perfil_opcions);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperfil')
			{

				if($perfil_opcion_session->bigidperfilActual!=null && $perfil_opcion_session->bigidperfilActual!=0)
				{
					$this->id_perfilFK_Idperfil=$perfil_opcion_session->bigidperfilActual;
					$perfil_opcion_session->bigidperfilActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfil_opcionLogic->getsFK_Idperfil($finalQueryPaginacion,$this->pagination,$this->id_perfilFK_Idperfil);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//perfil_opcionLogicAdditional::getDetalleIndiceFK_Idperfil($this->id_perfilFK_Idperfil);


					if($this->perfil_opcionLogic->getperfil_opcions()==null || count($this->perfil_opcionLogic->getperfil_opcions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$perfil_opcions=$this->perfil_opcionLogic->getperfil_opcions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfil_opcionLogic->getsFK_Idperfil('',$this->pagination,$this->id_perfilFK_Idperfil);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->perfil_opcionsReporte=$this->perfil_opcionLogic->getperfil_opcions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteperfil_opcions("FK_Idperfil",$this->perfil_opcionLogic->getperfil_opcions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->perfil_opcionLogic->setperfil_opcions($perfil_opcions);
					}
				//}

			}
			else if($strAccionBusqueda=='PorIdPerfilPorIdOpcion')
			{

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfil_opcionLogic->getPorIdPerfilPorIdOpcion($this->id_perfilPorIdPerfilPorIdOpcion,$this->id_opcionPorIdPerfilPorIdOpcion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//perfil_opcionLogicAdditional::getDetalleIndicePorIdPerfilPorIdOpcion($this->id_perfilPorIdPerfilPorIdOpcion,$this->id_opcionPorIdPerfilPorIdOpcion);


					if($this->perfil_opcionLogic->getperfil_opcion()!=null && $this->perfil_opcionLogic->getperfil_opcion()->getId()!=0) {
					} else {
					}

			} 
		
		$perfil_opcion_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$perfil_opcion_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->perfil_opcionLogic->loadForeignsKeysDescription();*/
		
		$this->perfil_opcions=$this->perfil_opcionLogic->getperfil_opcions();
		
		if($this->perfil_opcionsEliminados==null) {
			$this->perfil_opcionsEliminados=array();
		}
		
		$this->Session->write(perfil_opcion_util::$STR_SESSION_NAME.'Lista',serialize($this->perfil_opcions));
		$this->Session->write(perfil_opcion_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->perfil_opcionsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(perfil_opcion_util::$STR_SESSION_NAME,serialize($perfil_opcion_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idperfil_opcion=$idGeneral;
			
			$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
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
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}

			if(count($this->perfil_opcions) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsBusquedaPorIdPerfilPorIdOpcionParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_perfilBusquedaPorIdPerfilPorIdOpcion=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorIdPerfilPorIdOpcion','cmbid_perfil');
			$this->id_opcionBusquedaPorIdPerfilPorIdOpcion=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'BusquedaPorIdPerfilPorIdOpcion','cmbid_opcion');

			$this->strAccionBusqueda='BusquedaPorIdPerfilPorIdOpcion';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdopcionParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_opcionFK_Idopcion=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idopcion','cmbid_opcion');

			$this->strAccionBusqueda='FK_Idopcion';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdperfilParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_perfilFK_Idperfil=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperfil','cmbid_perfil');

			$this->strAccionBusqueda='FK_Idperfil';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getPorIdPerfilPorIdOpcionParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_perfilPorIdPerfilPorIdOpcion=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'PorIdPerfilPorIdOpcion','cmbid_perfil');
			$this->id_opcionPorIdPerfilPorIdOpcion=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'PorIdPerfilPorIdOpcion','cmbid_opcion');

			$this->strAccionBusqueda='PorIdPerfilPorIdOpcion';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsBusquedaPorIdPerfilPorIdOpcion($strFinalQuery,$id_perfil,$id_opcion)
	{
		try
		{

			$this->perfil_opcionLogic->getsBusquedaPorIdPerfilPorIdOpcion($strFinalQuery,new Pagination(),$id_perfil,$id_opcion);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idopcion($strFinalQuery,$id_opcion)
	{
		try
		{

			$this->perfil_opcionLogic->getsFK_Idopcion($strFinalQuery,new Pagination(),$id_opcion);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idperfil($strFinalQuery,$id_perfil)
	{
		try
		{

			$this->perfil_opcionLogic->getsFK_Idperfil($strFinalQuery,new Pagination(),$id_perfil);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getPorIdPerfilPorIdOpcion($id_perfil,$id_opcion)
	{
		try
		{

			$this->perfil_opcionLogic->getperfil_opcionPorIdPerfilPorIdOpcion($id_perfil,$id_opcion);
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
			
			
			$perfil_opcionForeignKey=new perfil_opcion_param_return(); //perfil_opcionForeignKey();
			
			$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));
						
			if($perfil_opcion_session==null) {
				$perfil_opcion_session=new perfil_opcion_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$perfil_opcionForeignKey=$this->perfil_opcionLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$perfil_opcion_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_perfil',$this->strRecargarFkTipos,',')) {
				$this->perfilsFK=$perfil_opcionForeignKey->perfilsFK;
				$this->idperfilDefaultFK=$perfil_opcionForeignKey->idperfilDefaultFK;
			}

			if($perfil_opcion_session->bitBusquedaDesdeFKSesionperfil) {
				$this->setVisibleBusquedasParaperfil(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_opcion',$this->strRecargarFkTipos,',')) {
				$this->opcionsFK=$perfil_opcionForeignKey->opcionsFK;
				$this->idopcionDefaultFK=$perfil_opcionForeignKey->idopcionDefaultFK;
			}

			if($perfil_opcion_session->bitBusquedaDesdeFKSesionopcion) {
				$this->setVisibleBusquedasParaopcion(true);
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
	
	function cargarCombosFKFromReturnGeneral($perfil_opcionReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$perfil_opcionReturnGeneral->strRecargarFkTipos;
			
			


			if($perfil_opcionReturnGeneral->con_perfilsFK==true) {
				$this->perfilsFK=$perfil_opcionReturnGeneral->perfilsFK;
				$this->idperfilDefaultFK=$perfil_opcionReturnGeneral->idperfilDefaultFK;
			}


			if($perfil_opcionReturnGeneral->con_opcionsFK==true) {
				$this->opcionsFK=$perfil_opcionReturnGeneral->opcionsFK;
				$this->idopcionDefaultFK=$perfil_opcionReturnGeneral->idopcionDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(perfil_opcion_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));
		
		if($perfil_opcion_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($perfil_opcion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==perfil_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='perfil';
			}
			else if($perfil_opcion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==opcion_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='opcion';
			}
			
			$perfil_opcion_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}						
			
			$this->perfil_opcionsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->perfil_opcionsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->perfil_opcionsAuxiliar=array();
			}
			
			if(count($this->perfil_opcionsAuxiliar) > 0) {
				
				foreach ($this->perfil_opcionsAuxiliar as $perfil_opcionSeleccionado) {
					$this->eliminarTablaBase($perfil_opcionSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
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
	
	
	
	public function getperfilsFKListSelectItem() 
	{
		$perfilsList=array();

		$item=null;

		foreach($this->perfilsFK as $perfil)
		{
			$item=new SelectItem();
			$item->setLabel($perfil->getnombre());
			$item->setValue($perfil->getId());
			$perfilsList[]=$item;
		}

		return $perfilsList;
	}


	public function getopcionsFKListSelectItem() 
	{
		$opcionsList=array();

		$item=null;

		foreach($this->opcionsFK as $opcion)
		{
			$item=new SelectItem();
			$item->setLabel($opcion->getcodigo());
			$item->setValue($opcion->getId());
			$opcionsList[]=$item;
		}

		return $opcionsList;
	}


	
	
	//BUSQUEDA INTERNA FK
	public function seleccionaropcionActual($idopcionActual=0) {
		try	{
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			$this->idopcionActual=$idopcionActual;
			$opcionAux=new opcion();
			$opcionLogic= new opcion_logic();
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$opcionLogic->getEntity($this->idopcionActual);/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			$opcionAux= $opcionLogic->getopcion();

			$this->opcionsForeignKey=array();
			//$this->opcionsForeignKey[]=$opcionAux;
			$this->opcionsForeignKey[$opcionAux->getId()]=perfil_opcion_util::getopcionDescripcion($opcionAux);

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}	
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;
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
				$this->perfil_opcionLogic->commitNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->rollbackNewConnexionToDeep();
				$this->perfil_opcionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$perfil_opcionsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->perfil_opcions as $perfil_opcionLocal) {
				if($perfil_opcionLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->perfil_opcion=new perfil_opcion();
				
				$this->perfil_opcion->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->perfil_opcions[]=$this->perfil_opcion;*/
				
				$perfil_opcionsNuevos[]=$this->perfil_opcion;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('perfil');$classes[]=$class;
				$class=new Classe('opcion');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_opcionLogic->setperfil_opcions($perfil_opcionsNuevos);
					
				$this->perfil_opcionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($perfil_opcionsNuevos as $perfil_opcionNuevo) {
					$this->perfil_opcions[]=$perfil_opcionNuevo;
				}
				
				/*$this->perfil_opcions[]=$perfil_opcionsNuevos;*/
				
				$this->perfil_opcionLogic->setperfil_opcions($this->perfil_opcions);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($perfil_opcionsNuevos!=null);
	}
					
	
	public function cargarCombosperfilsFK($connexion=null,$strRecargarFkQuery=''){
		$perfilLogic= new perfil_logic();
		$pagination= new Pagination();
		$this->perfilsFK=array();

		$perfilLogic->setConnexion($connexion);
		$perfilLogic->getperfilDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));

		if($perfil_opcion_session==null) {
			$perfil_opcion_session=new perfil_opcion_session();
		}
		
		if($perfil_opcion_session->bitBusquedaDesdeFKSesionperfil!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=perfil_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalperfil=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalperfil=Funciones::GetFinalQueryAppend($finalQueryGlobalperfil, '');
				$finalQueryGlobalperfil.=perfil_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalperfil.$strRecargarFkQuery;		

				$perfilLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosperfilsFK($perfilLogic->getperfils());

		} else {
			$this->setVisibleBusquedasParaperfil(true);


			if($perfil_opcion_session->bigidperfilActual!=null && $perfil_opcion_session->bigidperfilActual > 0) {
				$perfilLogic->getEntity($perfil_opcion_session->bigidperfilActual);//WithConnection

				$this->perfilsFK[$perfilLogic->getperfil()->getId()]=perfil_opcion_util::getperfilDescripcion($perfilLogic->getperfil());
				$this->idperfilDefaultFK=$perfilLogic->getperfil()->getId();
			}
		}
	}

	public function cargarCombosopcionsFK($connexion=null,$strRecargarFkQuery=''){
		$opcionLogic= new opcion_logic();
		$pagination= new Pagination();
		$this->opcionsFK=array();

		$opcionLogic->setConnexion($connexion);
		$opcionLogic->getopcionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));

		if($perfil_opcion_session==null) {
			$perfil_opcion_session=new perfil_opcion_session();
		}
		
		if($perfil_opcion_session->bitBusquedaDesdeFKSesionopcion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=opcion_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalopcion=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalopcion=Funciones::GetFinalQueryAppend($finalQueryGlobalopcion, '');
				$finalQueryGlobalopcion.=opcion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalopcion.$strRecargarFkQuery;		

				$opcionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosopcionsFK($opcionLogic->getopcions());

		} else {
			$this->setVisibleBusquedasParaopcion(true);


			if($perfil_opcion_session->bigidopcionActual!=null && $perfil_opcion_session->bigidopcionActual > 0) {
				$opcionLogic->getEntity($perfil_opcion_session->bigidopcionActual);//WithConnection

				$this->opcionsFK[$opcionLogic->getopcion()->getId()]=perfil_opcion_util::getopcionDescripcion($opcionLogic->getopcion());
				$this->idopcionDefaultFK=$opcionLogic->getopcion()->getId();
			}
		}
	}

	
	
	public function prepararCombosperfilsFK($perfils){

		foreach ($perfils as $perfilLocal ) {
			if($this->idperfilDefaultFK==0) {
				$this->idperfilDefaultFK=$perfilLocal->getId();
			}

			$this->perfilsFK[$perfilLocal->getId()]=perfil_opcion_util::getperfilDescripcion($perfilLocal);
		}
	}

	public function prepararCombosopcionsFK($opcions){

		foreach ($opcions as $opcionLocal ) {
			if($this->idopcionDefaultFK==0) {
				$this->idopcionDefaultFK=$opcionLocal->getId();
			}

			$this->opcionsFK[$opcionLocal->getId()]=perfil_opcion_util::getopcionDescripcion($opcionLocal);
		}
	}

	
	
	public function cargarDescripcionperfilFK($idperfil,$connexion=null){
		$perfilLogic= new perfil_logic();
		$perfilLogic->setConnexion($connexion);
		$perfilLogic->getperfilDataAccess()->isForFKData=true;
		$strDescripcionperfil='';

		if($idperfil!=null && $idperfil!='' && $idperfil!='null') {
			if($connexion!=null) {
				$perfilLogic->getEntity($idperfil);//WithConnection
			} else {
				$perfilLogic->getEntityWithConnection($idperfil);//
			}

			$strDescripcionperfil=perfil_opcion_util::getperfilDescripcion($perfilLogic->getperfil());

		} else {
			$strDescripcionperfil='null';
		}

		return $strDescripcionperfil;
	}

	public function cargarDescripcionopcionFK($idopcion,$connexion=null){
		$opcionLogic= new opcion_logic();
		$opcionLogic->setConnexion($connexion);
		$opcionLogic->getopcionDataAccess()->isForFKData=true;
		$strDescripcionopcion='';

		if($idopcion!=null && $idopcion!='' && $idopcion!='null') {
			if($connexion!=null) {
				$opcionLogic->getEntity($idopcion);//WithConnection
			} else {
				$opcionLogic->getEntityWithConnection($idopcion);//
			}

			$strDescripcionopcion=perfil_opcion_util::getopcionDescripcion($opcionLogic->getopcion());

		} else {
			$strDescripcionopcion='null';
		}

		return $strDescripcionopcion;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(perfil_opcion $perfil_opcionClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParaperfil($isParaperfil){
		$strParaVisibleperfil='display:table-row';
		$strParaVisibleNegacionperfil='display:none';

		if($isParaperfil) {
			$strParaVisibleperfil='display:table-row';
			$strParaVisibleNegacionperfil='display:none';
		} else {
			$strParaVisibleperfil='display:none';
			$strParaVisibleNegacionperfil='display:table-row';
		}


		$strParaVisibleNegacionperfil=trim($strParaVisibleNegacionperfil);

		$this->strVisibleBusquedaPorIdPerfilPorIdOpcion=$strParaVisibleperfil;
		$this->strVisibleFK_Idopcion=$strParaVisibleNegacionperfil;
		$this->strVisibleFK_Idperfil=$strParaVisibleperfil;
	}

	public function setVisibleBusquedasParaopcion($isParaopcion){
		$strParaVisibleopcion='display:table-row';
		$strParaVisibleNegacionopcion='display:none';

		if($isParaopcion) {
			$strParaVisibleopcion='display:table-row';
			$strParaVisibleNegacionopcion='display:none';
		} else {
			$strParaVisibleopcion='display:none';
			$strParaVisibleNegacionopcion='display:table-row';
		}


		$strParaVisibleNegacionopcion=trim($strParaVisibleNegacionopcion);

		$this->strVisibleBusquedaPorIdPerfilPorIdOpcion=$strParaVisibleopcion;
		$this->strVisibleFK_Idopcion=$strParaVisibleopcion;
		$this->strVisibleFK_Idperfil=$strParaVisibleNegacionopcion;
	}
	
	

	public function abrirBusquedaParaperfil() {//$idperfil_opcionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idperfil_opcionActual=$idperfil_opcionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.perfil_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.perfil_opcionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_perfil(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',perfil_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.perfil_opcionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_perfil(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarperfil_opcion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaopcion() {//$idperfil_opcionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idperfil_opcionActual=$idperfil_opcionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.opcion_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.perfil_opcionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_opcion(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',opcion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.perfil_opcionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_opcion(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(opcion_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarperfil_opcion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(perfil_opcion_util::$STR_SESSION_NAME,perfil_opcion_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$perfil_opcion_session=$this->Session->read(perfil_opcion_util::$STR_SESSION_NAME);
				
		if($perfil_opcion_session==null) {
			$perfil_opcion_session=new perfil_opcion_session();		
			//$this->Session->write('perfil_opcion_session',$perfil_opcion_session);							
		}
		*/
		
		$perfil_opcion_session=new perfil_opcion_session();
    	$perfil_opcion_session->strPathNavegacionActual=perfil_opcion_util::$STR_CLASS_WEB_TITULO;
    	$perfil_opcion_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(perfil_opcion_util::$STR_SESSION_NAME,serialize($perfil_opcion_session));		
	}	
	
	public function getSetBusquedasSesionConfig(perfil_opcion_session $perfil_opcion_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($perfil_opcion_session->bitBusquedaDesdeFKSesionFK!=null && $perfil_opcion_session->bitBusquedaDesdeFKSesionFK==true) {
			if($perfil_opcion_session->bigIdActualFK!=null && $perfil_opcion_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$perfil_opcion_session->bigIdActualFKParaPosibleAtras=$perfil_opcion_session->bigIdActualFK;*/
			}
				
			$perfil_opcion_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$perfil_opcion_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(perfil_opcion_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($perfil_opcion_session->bitBusquedaDesdeFKSesionperfil!=null && $perfil_opcion_session->bitBusquedaDesdeFKSesionperfil==true)
			{
				if($perfil_opcion_session->bigidperfilActual!=0) {
					$this->strAccionBusqueda='FK_Idperfil';

					$existe_history=HistoryWeb::ExisteElemento(perfil_opcion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(perfil_opcion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(perfil_opcion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($perfil_opcion_session->bigidperfilActualDescripcion);
						$historyWeb->setIdActual($perfil_opcion_session->bigidperfilActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=perfil_opcion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$perfil_opcion_session->bigidperfilActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$perfil_opcion_session->bitBusquedaDesdeFKSesionperfil=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;

				if($perfil_opcion_session->intNumeroPaginacion==perfil_opcion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$perfil_opcion_session->intNumeroPaginacion;
				}
			}
			else if($perfil_opcion_session->bitBusquedaDesdeFKSesionopcion!=null && $perfil_opcion_session->bitBusquedaDesdeFKSesionopcion==true)
			{
				if($perfil_opcion_session->bigidopcionActual!=0) {
					$this->strAccionBusqueda='FK_Idopcion';

					$existe_history=HistoryWeb::ExisteElemento(perfil_opcion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(perfil_opcion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(perfil_opcion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($perfil_opcion_session->bigidopcionActualDescripcion);
						$historyWeb->setIdActual($perfil_opcion_session->bigidopcionActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=perfil_opcion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$perfil_opcion_session->bigidopcionActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$perfil_opcion_session->bitBusquedaDesdeFKSesionopcion=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;

				if($perfil_opcion_session->intNumeroPaginacion==perfil_opcion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=perfil_opcion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$perfil_opcion_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$perfil_opcion_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));
		
		if($perfil_opcion_session==null) {
			$perfil_opcion_session=new perfil_opcion_session();
		}
		
		$perfil_opcion_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$perfil_opcion_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$perfil_opcion_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='BusquedaPorIdPerfilPorIdOpcion') {
			$perfil_opcion_session->id_perfil=$this->id_perfilBusquedaPorIdPerfilPorIdOpcion;	
			$perfil_opcion_session->id_opcion=$this->id_opcionBusquedaPorIdPerfilPorIdOpcion;	

		}
		else if($this->strAccionBusqueda=='FK_Idopcion') {
			$perfil_opcion_session->id_opcion=$this->id_opcionFK_Idopcion;	

		}
		else if($this->strAccionBusqueda=='FK_Idperfil') {
			$perfil_opcion_session->id_perfil=$this->id_perfilFK_Idperfil;	

		}
		
		$this->Session->write(perfil_opcion_util::$STR_SESSION_NAME,serialize($perfil_opcion_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(perfil_opcion_session $perfil_opcion_session) {
		
		if($perfil_opcion_session==null) {
			$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));
		}
		
		if($perfil_opcion_session==null) {
		   $perfil_opcion_session=new perfil_opcion_session();
		}
		
		if($perfil_opcion_session->strUltimaBusqueda!=null && $perfil_opcion_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$perfil_opcion_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$perfil_opcion_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$perfil_opcion_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='BusquedaPorIdPerfilPorIdOpcion') {
				$this->id_perfilBusquedaPorIdPerfilPorIdOpcion=$perfil_opcion_session->id_perfil;
				$perfil_opcion_session->id_perfil=-1;
				$this->id_opcionBusquedaPorIdPerfilPorIdOpcion=$perfil_opcion_session->id_opcion;
				$perfil_opcion_session->id_opcion=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idopcion') {
				$this->id_opcionFK_Idopcion=$perfil_opcion_session->id_opcion;
				$perfil_opcion_session->id_opcion=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idperfil') {
				$this->id_perfilFK_Idperfil=$perfil_opcion_session->id_perfil;
				$perfil_opcion_session->id_perfil=-1;

			}
		}
		
		$perfil_opcion_session->strUltimaBusqueda='';
		//$perfil_opcion_session->intNumeroPaginacion=10;
		$perfil_opcion_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(perfil_opcion_util::$STR_SESSION_NAME,serialize($perfil_opcion_session));		
	}
	
	public function perfil_opcionsControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idperfilDefaultFK = 0;
		$this->idopcionDefaultFK = 0;
	}
	
	public function setperfil_opcionFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_perfil',$this->idperfilDefaultFK);
		$this->setExistDataCampoForm('form','id_opcion',$this->idopcionDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		perfil::$class;
		perfil_carga::$CONTROLLER;

		opcion::$class;
		opcion_carga::$CONTROLLER;
		
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
		interface perfil_opcion_controlI {	
		
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
		
		public function onLoad(perfil_opcion_session $perfil_opcion_session=null);	
		function index(?string $strTypeOnLoadperfil_opcion='',?string $strTipoPaginaAuxiliarperfil_opcion='',?string $strTipoUsuarioAuxiliarperfil_opcion='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadperfil_opcion='',string $strTipoPaginaAuxiliarperfil_opcion='',string $strTipoUsuarioAuxiliarperfil_opcion='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($perfil_opcionReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(perfil_opcion $perfil_opcionClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(perfil_opcion_session $perfil_opcion_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(perfil_opcion_session $perfil_opcion_session);	
		public function perfil_opcionsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setperfil_opcionFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
