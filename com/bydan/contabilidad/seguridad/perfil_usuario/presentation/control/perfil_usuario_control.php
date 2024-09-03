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

namespace com\bydan\contabilidad\seguridad\perfil_usuario\presentation\control;

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

use com\bydan\contabilidad\seguridad\perfil_usuario\business\entity\perfil_usuario;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/perfil_usuario/util/perfil_usuario_carga.php');
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_carga;

use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_util;
use com\bydan\contabilidad\seguridad\perfil_usuario\util\perfil_usuario_param_return;
use com\bydan\contabilidad\seguridad\perfil_usuario\business\logic\perfil_usuario_logic;
use com\bydan\contabilidad\seguridad\perfil_usuario\presentation\session\perfil_usuario_session;


//FK


use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
perfil_usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
perfil_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
perfil_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
perfil_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*perfil_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/seguridad/perfil_usuario/presentation/control/perfil_usuario_init_control.php');
use com\bydan\contabilidad\seguridad\perfil_usuario\presentation\control\perfil_usuario_init_control;

include_once('com/bydan/contabilidad/seguridad/perfil_usuario/presentation/control/perfil_usuario_base_control.php');
use com\bydan\contabilidad\seguridad\perfil_usuario\presentation\control\perfil_usuario_base_control;

class perfil_usuario_control extends perfil_usuario_base_control {	
	
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
			
			
			else if($action=="FK_Idperfil"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdperfilParaProcesar();
			}
			else if($action=="FK_Idusuario"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdusuarioParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaperfil') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idperfil_usuarioActual=$this->getDataId();
				$this->abrirBusquedaParaperfil();//$idperfil_usuarioActual
			}
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idperfil_usuarioActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$idperfil_usuarioActual
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
					
					$perfil_usuarioController = new perfil_usuario_control();
					
					$perfil_usuarioController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($perfil_usuarioController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$perfil_usuarioController = new perfil_usuario_control();
						$perfil_usuarioController = $this;
						
						$jsonResponse = json_encode($perfil_usuarioController->perfil_usuarios);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->perfil_usuarioReturnGeneral==null) {
					$this->perfil_usuarioReturnGeneral=new perfil_usuario_param_return();
				}
				
				echo($this->perfil_usuarioReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$perfil_usuarioController=new perfil_usuario_control();
		
		$perfil_usuarioController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$perfil_usuarioController->usuarioActual=new usuario();
		
		$perfil_usuarioController->usuarioActual->setId($this->usuarioActual->getId());
		$perfil_usuarioController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$perfil_usuarioController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$perfil_usuarioController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$perfil_usuarioController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$perfil_usuarioController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$perfil_usuarioController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$perfil_usuarioController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $perfil_usuarioController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadperfil_usuario= $this->getDataGeneralString('strTypeOnLoadperfil_usuario');
		$strTipoPaginaAuxiliarperfil_usuario= $this->getDataGeneralString('strTipoPaginaAuxiliarperfil_usuario');
		$strTipoUsuarioAuxiliarperfil_usuario= $this->getDataGeneralString('strTipoUsuarioAuxiliarperfil_usuario');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadperfil_usuario,$strTipoPaginaAuxiliarperfil_usuario,$strTipoUsuarioAuxiliarperfil_usuario,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadperfil_usuario!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('perfil_usuario','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_usuario_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarperfil_usuario,$this->strTipoUsuarioAuxiliarperfil_usuario,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_usuario_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarperfil_usuario,$this->strTipoUsuarioAuxiliarperfil_usuario,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->perfil_usuarioReturnGeneral=new perfil_usuario_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->perfil_usuarioReturnGeneral->conGuardarReturnSessionJs=true;
		$this->perfil_usuarioReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->perfil_usuarioReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->perfil_usuarioReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->perfil_usuarioReturnGeneral);
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
		$this->perfil_usuarioReturnGeneral=new perfil_usuario_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->perfil_usuarioReturnGeneral->conGuardarReturnSessionJs=true;
		$this->perfil_usuarioReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->perfil_usuarioReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->perfil_usuarioReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->perfil_usuarioReturnGeneral);
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
		$this->perfil_usuarioReturnGeneral=new perfil_usuario_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->perfil_usuarioReturnGeneral->conGuardarReturnSessionJs=true;
		$this->perfil_usuarioReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->perfil_usuarioReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->perfil_usuarioReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->perfil_usuarioReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
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
			
			
			$this->perfil_usuarioReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->perfil_usuarioReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->perfil_usuarioReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->perfil_usuarioReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->perfil_usuarioReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->perfil_usuarioReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->perfil_usuarioReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->perfil_usuarioReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->perfil_usuarioReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->perfil_usuarioReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->perfil_usuarioReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->perfil_usuarioReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->perfil_usuarioReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->perfil_usuarioReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->perfil_usuarioReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->perfil_usuarioReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->perfil_usuarioReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->perfil_usuarioReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
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
		
		$this->perfil_usuarioLogic=new perfil_usuario_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->perfil_usuario=new perfil_usuario();
		
		$this->strTypeOnLoadperfil_usuario='onload';
		$this->strTipoPaginaAuxiliarperfil_usuario='none';
		$this->strTipoUsuarioAuxiliarperfil_usuario='none';	

		$this->intNumeroPaginacion=perfil_usuario_util::$INT_NUMERO_PAGINACION;
		
		$this->perfil_usuarioModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->perfil_usuarioControllerAdditional=new perfil_usuario_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(perfil_usuario_session $perfil_usuario_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($perfil_usuario_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadperfil_usuario='',?string $strTipoPaginaAuxiliarperfil_usuario='',?string $strTipoUsuarioAuxiliarperfil_usuario='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadperfil_usuario=$strTypeOnLoadperfil_usuario;
			$this->strTipoPaginaAuxiliarperfil_usuario=$strTipoPaginaAuxiliarperfil_usuario;
			$this->strTipoUsuarioAuxiliarperfil_usuario=$strTipoUsuarioAuxiliarperfil_usuario;
	
			if($strTipoUsuarioAuxiliarperfil_usuario=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->perfil_usuario=new perfil_usuario();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Usuarios Perfiles s';
			
			
			$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));
							
			if($perfil_usuario_session==null) {
				$perfil_usuario_session=new perfil_usuario_session();
				
				/*$this->Session->write('perfil_usuario_session',$perfil_usuario_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($perfil_usuario_session->strFuncionJsPadre!=null && $perfil_usuario_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$perfil_usuario_session->strFuncionJsPadre;
				
				$perfil_usuario_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($perfil_usuario_session);
			
			if($strTypeOnLoadperfil_usuario!=null && $strTypeOnLoadperfil_usuario=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$perfil_usuario_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$perfil_usuario_session->setPaginaPopupVariables(true);
				}
				
				if($perfil_usuario_session->intNumeroPaginacion==perfil_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=perfil_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$perfil_usuario_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,perfil_usuario_util::$STR_SESSION_NAME,'seguridad');																
			
			} else if($strTypeOnLoadperfil_usuario!=null && $strTypeOnLoadperfil_usuario=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$perfil_usuario_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=perfil_usuario_util::$INT_NUMERO_PAGINACION;*/
				
				if($perfil_usuario_session->intNumeroPaginacion==perfil_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=perfil_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$perfil_usuario_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarperfil_usuario!=null && $strTipoPaginaAuxiliarperfil_usuario=='none') {
				/*$perfil_usuario_session->strStyleDivHeader='display:table-row';*/
				
				/*$perfil_usuario_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarperfil_usuario!=null && $strTipoPaginaAuxiliarperfil_usuario=='iframe') {
					/*
					$perfil_usuario_session->strStyleDivArbol='display:none';
					$perfil_usuario_session->strStyleDivHeader='display:none';
					$perfil_usuario_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$perfil_usuario_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->perfil_usuarioClase=new perfil_usuario();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=perfil_usuario_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(perfil_usuario_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->perfil_usuarioLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->perfil_usuarioLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->perfil_usuarioLogic=new perfil_usuario_logic();*/
			
			
			$this->perfil_usuariosModel=null;
			/*new ListDataModel();*/
			
			/*$this->perfil_usuariosModel.setWrappedData(perfil_usuarioLogic->getperfil_usuarios());*/
						
			$this->perfil_usuarios= array();
			$this->perfil_usuariosEliminados=array();
			$this->perfil_usuariosSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= perfil_usuario_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->perfil_usuario= new perfil_usuario();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idperfil='display:table-row';
			$this->strVisibleFK_Idusuario='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarperfil_usuario!=null && $strTipoUsuarioAuxiliarperfil_usuario!='none' && $strTipoUsuarioAuxiliarperfil_usuario!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarperfil_usuario);
																
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
				if($strTipoUsuarioAuxiliarperfil_usuario!=null && $strTipoUsuarioAuxiliarperfil_usuario!='none' && $strTipoUsuarioAuxiliarperfil_usuario!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarperfil_usuario);
																
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
				if($strTipoUsuarioAuxiliarperfil_usuario==null || $strTipoUsuarioAuxiliarperfil_usuario=='none' || $strTipoUsuarioAuxiliarperfil_usuario=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarperfil_usuario,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, perfil_usuario_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, perfil_usuario_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina perfil_usuario');
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
			$this->idusuarioActual=0;
			
			$this->cargarCombosFK(false);
			
			
			//$existe_history=false;
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($perfil_usuario_session);
			
			$this->getSetBusquedasSesionConfig($perfil_usuario_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteperfil_usuarios($this->strAccionBusqueda,$this->perfil_usuarioLogic->getperfil_usuarios());*/
				} else if($this->strGenerarReporte=='Html')	{
					$perfil_usuario_session->strServletGenerarHtmlReporte='perfil_usuarioServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(perfil_usuario_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(perfil_usuario_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($perfil_usuario_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarperfil_usuario!=null && $strTipoUsuarioAuxiliarperfil_usuario=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($perfil_usuario_session);
			}
								
			$this->set(perfil_usuario_util::$STR_SESSION_NAME, $perfil_usuario_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($perfil_usuario_session);
			
			/*
			$this->perfil_usuario->recursive = 0;
			
			$this->perfil_usuarios=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('perfil_usuarios', $this->perfil_usuarios);
			
			$this->set(perfil_usuario_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->perfil_usuarioActual =$this->perfil_usuarioClase;
			
			/*$this->perfil_usuarioActual =$this->migrarModelperfil_usuario($this->perfil_usuarioClase);*/
			
			$this->returnHtml(false);
			
			$this->set(perfil_usuario_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=perfil_usuario_util::$STR_NOMBRE_OPCION;
				
			if(perfil_usuario_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=perfil_usuario_util::$STR_MODULO_OPCION.perfil_usuario_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(perfil_usuario_util::$STR_SESSION_NAME,serialize($perfil_usuario_session));
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
			/*$perfil_usuarioClase= (perfil_usuario) perfil_usuariosModel.getRowData();*/
			
			$this->perfil_usuarioClase->setId($this->perfil_usuario->getId());	
			$this->perfil_usuarioClase->setVersionRow($this->perfil_usuario->getVersionRow());	
			$this->perfil_usuarioClase->setVersionRow($this->perfil_usuario->getVersionRow());	
			$this->perfil_usuarioClase->setid_perfil($this->perfil_usuario->getid_perfil());	
			$this->perfil_usuarioClase->setid_usuario($this->perfil_usuario->getid_usuario());	
			$this->perfil_usuarioClase->setestado($this->perfil_usuario->getestado());	
		
			/*$this->Session->write('perfil_usuarioVersionRowActual', perfil_usuario.getVersionRow());*/
			
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
			
			$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));
						
			if($perfil_usuario_session==null) {
				$perfil_usuario_session=new perfil_usuario_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('perfil_usuario', $this->perfil_usuario->read(null, $id));
	
			
			$this->perfil_usuario->recursive = 0;
			
			$this->perfil_usuarios=$this->paginate();
			
			$this->set('perfil_usuarios', $this->perfil_usuarios);
	
			if (empty($this->data)) {
				$this->data = $this->perfil_usuario->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->perfil_usuarioLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->perfil_usuarioClase);
			
			$this->perfil_usuarioActual=$this->perfil_usuarioClase;
			
			/*$this->perfil_usuarioActual =$this->migrarModelperfil_usuario($this->perfil_usuarioClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->perfil_usuarioLogic->getperfil_usuarios(),$this->perfil_usuarioActual);
			
			$this->actualizarControllerConReturnGeneral($this->perfil_usuarioReturnGeneral);
			
			//$this->perfil_usuarioReturnGeneral=$this->perfil_usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->perfil_usuarioLogic->getperfil_usuarios(),$this->perfil_usuarioActual,$this->perfil_usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));
						
			if($perfil_usuario_session==null) {
				$perfil_usuario_session=new perfil_usuario_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoperfil_usuario', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->perfil_usuarioClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->perfil_usuarioClase);
			
			$this->perfil_usuarioActual =$this->perfil_usuarioClase;
			
			/*$this->perfil_usuarioActual =$this->migrarModelperfil_usuario($this->perfil_usuarioClase);*/
			
			$this->setperfil_usuarioFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->perfil_usuarioLogic->getperfil_usuarios(),$this->perfil_usuario);
			
			$this->actualizarControllerConReturnGeneral($this->perfil_usuarioReturnGeneral);
			
			//this->perfil_usuarioReturnGeneral=$this->perfil_usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->perfil_usuarioLogic->getperfil_usuarios(),$this->perfil_usuario,$this->perfil_usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idperfilDefaultFK!=null && $this->idperfilDefaultFK > -1) {
				$this->perfil_usuarioReturnGeneral->getperfil_usuario()->setid_perfil($this->idperfilDefaultFK);
			}

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->perfil_usuarioReturnGeneral->getperfil_usuario()->setid_usuario($this->idusuarioDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->perfil_usuarioReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->perfil_usuarioReturnGeneral->getperfil_usuario(),$this->perfil_usuarioActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyperfil_usuario($this->perfil_usuarioReturnGeneral->getperfil_usuario());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioperfil_usuario($this->perfil_usuarioReturnGeneral->getperfil_usuario());*/
			}
			
			if($this->perfil_usuarioReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->perfil_usuarioReturnGeneral->getperfil_usuario(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualperfil_usuario($this->perfil_usuario,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->perfil_usuariosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->perfil_usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->perfil_usuariosAuxiliar=array();
			}
			
			if(count($this->perfil_usuariosAuxiliar)==2) {
				$perfil_usuarioOrigen=$this->perfil_usuariosAuxiliar[0];
				$perfil_usuarioDestino=$this->perfil_usuariosAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($perfil_usuarioOrigen,$perfil_usuarioDestino,true,false,false);
				
				$this->actualizarLista($perfil_usuarioDestino,$this->perfil_usuarios);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->perfil_usuariosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->perfil_usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->perfil_usuariosAuxiliar=array();
			}
			
			if(count($this->perfil_usuariosAuxiliar) > 0) {
				foreach ($this->perfil_usuariosAuxiliar as $perfil_usuarioSeleccionado) {
					$this->perfil_usuario=new perfil_usuario();
					
					$this->setCopiarVariablesObjetos($perfil_usuarioSeleccionado,$this->perfil_usuario,true,true,false);
						
					$this->perfil_usuarios[]=$this->perfil_usuario;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->perfil_usuariosEliminados as $perfil_usuarioEliminado) {
				$this->perfil_usuarioLogic->perfil_usuarios[]=$perfil_usuarioEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->perfil_usuario=new perfil_usuario();
							
				$this->perfil_usuarios[]=$this->perfil_usuario;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
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
		
		$perfil_usuarioActual=new perfil_usuario();
		
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
				
				$perfil_usuarioActual=$this->perfil_usuarios[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $perfil_usuarioActual->setid_perfil((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $perfil_usuarioActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $perfil_usuarioActual->setestado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_5')));  } else { $perfil_usuarioActual->setestado(false); }
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
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=perfil_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadperfil_usuario='',string $strTipoPaginaAuxiliarperfil_usuario='',string $strTipoUsuarioAuxiliarperfil_usuario='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadperfil_usuario,$strTipoPaginaAuxiliarperfil_usuario,$strTipoUsuarioAuxiliarperfil_usuario,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->perfil_usuarios) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=perfil_usuario_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=perfil_usuario_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=perfil_usuario_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));
						
			if($perfil_usuario_session==null) {
				$perfil_usuario_session=new perfil_usuario_session();
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
					/*$this->intNumeroPaginacion=perfil_usuario_util::$INT_NUMERO_PAGINACION;*/
					
					if($perfil_usuario_session->intNumeroPaginacion==perfil_usuario_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=perfil_usuario_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$perfil_usuario_session->intNumeroPaginacion;
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
			
			$this->perfil_usuariosEliminados=array();
			
			/*$this->perfil_usuarioLogic->setConnexion($connexion);*/
			
			$this->perfil_usuarioLogic->setIsConDeep(true);
			
			$this->perfil_usuarioLogic->getperfil_usuarioDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('perfil');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			
			$this->perfil_usuarioLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->perfil_usuarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->perfil_usuarioLogic->getperfil_usuarios()==null|| count($this->perfil_usuarioLogic->getperfil_usuarios())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->perfil_usuarios=$this->perfil_usuarioLogic->getperfil_usuarios();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->perfil_usuarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->perfil_usuariosReporte=$this->perfil_usuarioLogic->getperfil_usuarios();
									
						/*$this->generarReportes('Todos',$this->perfil_usuarioLogic->getperfil_usuarios());*/
					
						$this->perfil_usuarioLogic->setperfil_usuarios($this->perfil_usuarios);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->perfil_usuarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->perfil_usuarioLogic->getperfil_usuarios()==null|| count($this->perfil_usuarioLogic->getperfil_usuarios())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->perfil_usuarios=$this->perfil_usuarioLogic->getperfil_usuarios();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->perfil_usuarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->perfil_usuariosReporte=$this->perfil_usuarioLogic->getperfil_usuarios();
									
						/*$this->generarReportes('Todos',$this->perfil_usuarioLogic->getperfil_usuarios());*/
					
						$this->perfil_usuarioLogic->setperfil_usuarios($this->perfil_usuarios);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idperfil_usuario=0;*/
				
				if($perfil_usuario_session->bitBusquedaDesdeFKSesionFK!=null && $perfil_usuario_session->bitBusquedaDesdeFKSesionFK==true) {
					if($perfil_usuario_session->bigIdActualFK!=null && $perfil_usuario_session->bigIdActualFK!=0)	{
						$this->idperfil_usuario=$perfil_usuario_session->bigIdActualFK;	
					}
					
					$perfil_usuario_session->bitBusquedaDesdeFKSesionFK=false;
					
					$perfil_usuario_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idperfil_usuario=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idperfil_usuario=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->perfil_usuarioLogic->getEntity($this->idperfil_usuario);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*perfil_usuarioLogicAdditional::getDetalleIndicePorId($idperfil_usuario);*/

				
				if($this->perfil_usuarioLogic->getperfil_usuario()!=null) {
					$this->perfil_usuarioLogic->setperfil_usuarios(array());
					$this->perfil_usuarioLogic->perfil_usuarios[]=$this->perfil_usuarioLogic->getperfil_usuario();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idperfil')
			{

				if($perfil_usuario_session->bigidperfilActual!=null && $perfil_usuario_session->bigidperfilActual!=0)
				{
					$this->id_perfilFK_Idperfil=$perfil_usuario_session->bigidperfilActual;
					$perfil_usuario_session->bigidperfilActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfil_usuarioLogic->getsFK_Idperfil($finalQueryPaginacion,$this->pagination,$this->id_perfilFK_Idperfil);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//perfil_usuarioLogicAdditional::getDetalleIndiceFK_Idperfil($this->id_perfilFK_Idperfil);


					if($this->perfil_usuarioLogic->getperfil_usuarios()==null || count($this->perfil_usuarioLogic->getperfil_usuarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$perfil_usuarios=$this->perfil_usuarioLogic->getperfil_usuarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfil_usuarioLogic->getsFK_Idperfil('',$this->pagination,$this->id_perfilFK_Idperfil);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->perfil_usuariosReporte=$this->perfil_usuarioLogic->getperfil_usuarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteperfil_usuarios("FK_Idperfil",$this->perfil_usuarioLogic->getperfil_usuarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->perfil_usuarioLogic->setperfil_usuarios($perfil_usuarios);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($perfil_usuario_session->bigidusuarioActual!=null && $perfil_usuario_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$perfil_usuario_session->bigidusuarioActual;
					$perfil_usuario_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfil_usuarioLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//perfil_usuarioLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->perfil_usuarioLogic->getperfil_usuarios()==null || count($this->perfil_usuarioLogic->getperfil_usuarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$perfil_usuarios=$this->perfil_usuarioLogic->getperfil_usuarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->perfil_usuarioLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->perfil_usuariosReporte=$this->perfil_usuarioLogic->getperfil_usuarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteperfil_usuarios("FK_Idusuario",$this->perfil_usuarioLogic->getperfil_usuarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->perfil_usuarioLogic->setperfil_usuarios($perfil_usuarios);
					}
				//}

			} 
		
		$perfil_usuario_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$perfil_usuario_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->perfil_usuarioLogic->loadForeignsKeysDescription();*/
		
		$this->perfil_usuarios=$this->perfil_usuarioLogic->getperfil_usuarios();
		
		if($this->perfil_usuariosEliminados==null) {
			$this->perfil_usuariosEliminados=array();
		}
		
		$this->Session->write(perfil_usuario_util::$STR_SESSION_NAME.'Lista',serialize($this->perfil_usuarios));
		$this->Session->write(perfil_usuario_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->perfil_usuariosEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(perfil_usuario_util::$STR_SESSION_NAME,serialize($perfil_usuario_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idperfil_usuario=$idGeneral;
			
			$this->intNumeroPaginacion=perfil_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
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
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}

			if(count($this->perfil_usuarios) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
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
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=perfil_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_perfilFK_Idperfil=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperfil','cmbid_perfil');

			$this->strAccionBusqueda='FK_Idperfil';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
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
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=perfil_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idperfil($strFinalQuery,$id_perfil)
	{
		try
		{

			$this->perfil_usuarioLogic->getsFK_Idperfil($strFinalQuery,new Pagination(),$id_perfil);
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

			$this->perfil_usuarioLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
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
			
			
			$perfil_usuarioForeignKey=new perfil_usuario_param_return(); //perfil_usuarioForeignKey();
			
			$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));
						
			if($perfil_usuario_session==null) {
				$perfil_usuario_session=new perfil_usuario_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$perfil_usuarioForeignKey=$this->perfil_usuarioLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$perfil_usuario_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_perfil',$this->strRecargarFkTipos,',')) {
				$this->perfilsFK=$perfil_usuarioForeignKey->perfilsFK;
				$this->idperfilDefaultFK=$perfil_usuarioForeignKey->idperfilDefaultFK;
			}

			if($perfil_usuario_session->bitBusquedaDesdeFKSesionperfil) {
				$this->setVisibleBusquedasParaperfil(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$perfil_usuarioForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$perfil_usuarioForeignKey->idusuarioDefaultFK;
			}

			if($perfil_usuario_session->bitBusquedaDesdeFKSesionusuario) {
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
	
	function cargarCombosFKFromReturnGeneral($perfil_usuarioReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$perfil_usuarioReturnGeneral->strRecargarFkTipos;
			
			


			if($perfil_usuarioReturnGeneral->con_perfilsFK==true) {
				$this->perfilsFK=$perfil_usuarioReturnGeneral->perfilsFK;
				$this->idperfilDefaultFK=$perfil_usuarioReturnGeneral->idperfilDefaultFK;
			}


			if($perfil_usuarioReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$perfil_usuarioReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$perfil_usuarioReturnGeneral->idusuarioDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(perfil_usuario_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));
		
		if($perfil_usuario_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($perfil_usuario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==perfil_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='perfil';
			}
			else if($perfil_usuario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			
			$perfil_usuario_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}						
			
			$this->perfil_usuariosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->perfil_usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->perfil_usuariosAuxiliar=array();
			}
			
			if(count($this->perfil_usuariosAuxiliar) > 0) {
				
				foreach ($this->perfil_usuariosAuxiliar as $perfil_usuarioSeleccionado) {
					$this->eliminarTablaBase($perfil_usuarioSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
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


	
	
	//BUSQUEDA INTERNA FK
	public function seleccionarusuarioActual($idusuarioActual=0) {
		try	{
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			$this->idusuarioActual=$idusuarioActual;
			$usuarioAux=new usuario();
			$usuarioLogic= new usuario_logic();
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			$usuarioLogic->getEntity($this->idusuarioActual);/*WithConnection*/
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
			}
			$usuarioAux= $usuarioLogic->getusuario();

			$this->usuariosForeignKey=array();
			//$this->usuariosForeignKey[]=$usuarioAux;
			$this->usuariosForeignKey[$usuarioAux->getId()]=perfil_usuario_util::getusuarioDescripcion($usuarioAux);

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
				$this->perfil_usuarioLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=perfil_usuario_util::$INT_NUMERO_PAGINACION;
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
				$this->perfil_usuarioLogic->commitNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->rollbackNewConnexionToDeep();
				$this->perfil_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$perfil_usuariosNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->perfil_usuarios as $perfil_usuarioLocal) {
				if($perfil_usuarioLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->perfil_usuario=new perfil_usuario();
				
				$this->perfil_usuario->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->perfil_usuarios[]=$this->perfil_usuario;*/
				
				$perfil_usuariosNuevos[]=$this->perfil_usuario;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('perfil');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->perfil_usuarioLogic->setperfil_usuarios($perfil_usuariosNuevos);
					
				$this->perfil_usuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($perfil_usuariosNuevos as $perfil_usuarioNuevo) {
					$this->perfil_usuarios[]=$perfil_usuarioNuevo;
				}
				
				/*$this->perfil_usuarios[]=$perfil_usuariosNuevos;*/
				
				$this->perfil_usuarioLogic->setperfil_usuarios($this->perfil_usuarios);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($perfil_usuariosNuevos!=null);
	}
					
	
	public function cargarCombosperfilsFK($connexion=null,$strRecargarFkQuery=''){
		$perfilLogic= new perfil_logic();
		$pagination= new Pagination();
		$this->perfilsFK=array();

		$perfilLogic->setConnexion($connexion);
		$perfilLogic->getperfilDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));

		if($perfil_usuario_session==null) {
			$perfil_usuario_session=new perfil_usuario_session();
		}
		
		if($perfil_usuario_session->bitBusquedaDesdeFKSesionperfil!=true) {
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


			if($perfil_usuario_session->bigidperfilActual!=null && $perfil_usuario_session->bigidperfilActual > 0) {
				$perfilLogic->getEntity($perfil_usuario_session->bigidperfilActual);//WithConnection

				$this->perfilsFK[$perfilLogic->getperfil()->getId()]=perfil_usuario_util::getperfilDescripcion($perfilLogic->getperfil());
				$this->idperfilDefaultFK=$perfilLogic->getperfil()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery=''){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$this->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));

		if($perfil_usuario_session==null) {
			$perfil_usuario_session=new perfil_usuario_session();
		}
		
		if($perfil_usuario_session->bitBusquedaDesdeFKSesionusuario!=true) {
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


			if($perfil_usuario_session->bigidusuarioActual!=null && $perfil_usuario_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($perfil_usuario_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=perfil_usuario_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	
	
	public function prepararCombosperfilsFK($perfils){

		foreach ($perfils as $perfilLocal ) {
			if($this->idperfilDefaultFK==0) {
				$this->idperfilDefaultFK=$perfilLocal->getId();
			}

			$this->perfilsFK[$perfilLocal->getId()]=perfil_usuario_util::getperfilDescripcion($perfilLocal);
		}
	}

	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=perfil_usuario_util::getusuarioDescripcion($usuarioLocal);
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

			$strDescripcionperfil=perfil_usuario_util::getperfilDescripcion($perfilLogic->getperfil());

		} else {
			$strDescripcionperfil='null';
		}

		return $strDescripcionperfil;
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

			$strDescripcionusuario=perfil_usuario_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(perfil_usuario $perfil_usuarioClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$perfil_usuarioClase->setid_usuario($this->usuarioActual->getId());
			
			
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

		$this->strVisibleFK_Idperfil=$strParaVisibleperfil;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionperfil;
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

		$this->strVisibleFK_Idperfil=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idusuario=$strParaVisibleusuario;
	}
	
	

	public function abrirBusquedaParaperfil() {//$idperfil_usuarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idperfil_usuarioActual=$idperfil_usuarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.perfil_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.perfil_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_perfil(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',perfil_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.perfil_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_perfil(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(perfil_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarperfil_usuario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParausuario() {//$idperfil_usuarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idperfil_usuarioActual=$idperfil_usuarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.perfil_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.perfil_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarperfil_usuario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(perfil_usuario_util::$STR_SESSION_NAME,perfil_usuario_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$perfil_usuario_session=$this->Session->read(perfil_usuario_util::$STR_SESSION_NAME);
				
		if($perfil_usuario_session==null) {
			$perfil_usuario_session=new perfil_usuario_session();		
			//$this->Session->write('perfil_usuario_session',$perfil_usuario_session);							
		}
		*/
		
		$perfil_usuario_session=new perfil_usuario_session();
    	$perfil_usuario_session->strPathNavegacionActual=perfil_usuario_util::$STR_CLASS_WEB_TITULO;
    	$perfil_usuario_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(perfil_usuario_util::$STR_SESSION_NAME,serialize($perfil_usuario_session));		
	}	
	
	public function getSetBusquedasSesionConfig(perfil_usuario_session $perfil_usuario_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($perfil_usuario_session->bitBusquedaDesdeFKSesionFK!=null && $perfil_usuario_session->bitBusquedaDesdeFKSesionFK==true) {
			if($perfil_usuario_session->bigIdActualFK!=null && $perfil_usuario_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$perfil_usuario_session->bigIdActualFKParaPosibleAtras=$perfil_usuario_session->bigIdActualFK;*/
			}
				
			$perfil_usuario_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$perfil_usuario_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(perfil_usuario_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($perfil_usuario_session->bitBusquedaDesdeFKSesionperfil!=null && $perfil_usuario_session->bitBusquedaDesdeFKSesionperfil==true)
			{
				if($perfil_usuario_session->bigidperfilActual!=0) {
					$this->strAccionBusqueda='FK_Idperfil';

					$existe_history=HistoryWeb::ExisteElemento(perfil_usuario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(perfil_usuario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(perfil_usuario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($perfil_usuario_session->bigidperfilActualDescripcion);
						$historyWeb->setIdActual($perfil_usuario_session->bigidperfilActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=perfil_usuario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$perfil_usuario_session->bigidperfilActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$perfil_usuario_session->bitBusquedaDesdeFKSesionperfil=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=perfil_usuario_util::$INT_NUMERO_PAGINACION;

				if($perfil_usuario_session->intNumeroPaginacion==perfil_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=perfil_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$perfil_usuario_session->intNumeroPaginacion;
				}
			}
			else if($perfil_usuario_session->bitBusquedaDesdeFKSesionusuario!=null && $perfil_usuario_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($perfil_usuario_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(perfil_usuario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(perfil_usuario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(perfil_usuario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($perfil_usuario_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($perfil_usuario_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=perfil_usuario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$perfil_usuario_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$perfil_usuario_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=perfil_usuario_util::$INT_NUMERO_PAGINACION;

				if($perfil_usuario_session->intNumeroPaginacion==perfil_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=perfil_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$perfil_usuario_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$perfil_usuario_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));
		
		if($perfil_usuario_session==null) {
			$perfil_usuario_session=new perfil_usuario_session();
		}
		
		$perfil_usuario_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$perfil_usuario_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$perfil_usuario_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idperfil') {
			$perfil_usuario_session->id_perfil=$this->id_perfilFK_Idperfil;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$perfil_usuario_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		
		$this->Session->write(perfil_usuario_util::$STR_SESSION_NAME,serialize($perfil_usuario_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(perfil_usuario_session $perfil_usuario_session) {
		
		if($perfil_usuario_session==null) {
			$perfil_usuario_session=unserialize($this->Session->read(perfil_usuario_util::$STR_SESSION_NAME));
		}
		
		if($perfil_usuario_session==null) {
		   $perfil_usuario_session=new perfil_usuario_session();
		}
		
		if($perfil_usuario_session->strUltimaBusqueda!=null && $perfil_usuario_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$perfil_usuario_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$perfil_usuario_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$perfil_usuario_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idperfil') {
				$this->id_perfilFK_Idperfil=$perfil_usuario_session->id_perfil;
				$perfil_usuario_session->id_perfil=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$perfil_usuario_session->id_usuario;
				$perfil_usuario_session->id_usuario=-1;

			}
		}
		
		$perfil_usuario_session->strUltimaBusqueda='';
		//$perfil_usuario_session->intNumeroPaginacion=10;
		$perfil_usuario_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(perfil_usuario_util::$STR_SESSION_NAME,serialize($perfil_usuario_session));		
	}
	
	public function perfil_usuariosControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idperfilDefaultFK = 0;
		$this->idusuarioDefaultFK = 0;
	}
	
	public function setperfil_usuarioFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_perfil',$this->idperfilDefaultFK);
		$this->setExistDataCampoForm('form','id_usuario',$this->idusuarioDefaultFK);
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

		usuario::$class;
		usuario_carga::$CONTROLLER;
		
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
		interface perfil_usuario_controlI {	
		
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
		
		public function onLoad(perfil_usuario_session $perfil_usuario_session=null);	
		function index(?string $strTypeOnLoadperfil_usuario='',?string $strTipoPaginaAuxiliarperfil_usuario='',?string $strTipoUsuarioAuxiliarperfil_usuario='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadperfil_usuario='',string $strTipoPaginaAuxiliarperfil_usuario='',string $strTipoUsuarioAuxiliarperfil_usuario='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($perfil_usuarioReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(perfil_usuario $perfil_usuarioClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(perfil_usuario_session $perfil_usuario_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(perfil_usuario_session $perfil_usuario_session);	
		public function perfil_usuariosControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setperfil_usuarioFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
