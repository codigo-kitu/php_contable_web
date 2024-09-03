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

namespace com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\control;

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

use com\bydan\contabilidad\seguridad\dato_general_usuario\business\entity\dato_general_usuario;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/dato_general_usuario/util/dato_general_usuario_carga.php');
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;

use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_param_return;
use com\bydan\contabilidad\seguridad\dato_general_usuario\business\logic\dato_general_usuario_logic;
use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\session\dato_general_usuario_session;


//FK


use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\provincia\business\logic\provincia_logic;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_carga;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
dato_general_usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
dato_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
dato_general_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
dato_general_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*dato_general_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/seguridad/dato_general_usuario/presentation/control/dato_general_usuario_init_control.php');
use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\control\dato_general_usuario_init_control;

include_once('com/bydan/contabilidad/seguridad/dato_general_usuario/presentation/control/dato_general_usuario_base_control.php');
use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\control\dato_general_usuario_base_control;

class dato_general_usuario_control extends dato_general_usuario_base_control {	
	
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
			else if($action=="FK_Idprovincia"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdprovinciaParaProcesar();
			}
			else if($action=="FK_Idusuarioid"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdusuarioidParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddato_general_usuarioActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$iddato_general_usuarioActual
			}
			else if($action=='abrirBusquedaParapais') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddato_general_usuarioActual=$this->getDataId();
				$this->abrirBusquedaParapais();//$iddato_general_usuarioActual
			}
			else if($action=='abrirBusquedaParaprovincia') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddato_general_usuarioActual=$this->getDataId();
				$this->abrirBusquedaParaprovincia();//$iddato_general_usuarioActual
			}
			else if($action=='abrirBusquedaParaciudad') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddato_general_usuarioActual=$this->getDataId();
				$this->abrirBusquedaParaciudad();//$iddato_general_usuarioActual
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
					
					$dato_general_usuarioController = new dato_general_usuario_control();
					
					$dato_general_usuarioController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($dato_general_usuarioController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$dato_general_usuarioController = new dato_general_usuario_control();
						$dato_general_usuarioController = $this;
						
						$jsonResponse = json_encode($dato_general_usuarioController->dato_general_usuarios);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->dato_general_usuarioReturnGeneral==null) {
					$this->dato_general_usuarioReturnGeneral=new dato_general_usuario_param_return();
				}
				
				echo($this->dato_general_usuarioReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$dato_general_usuarioController=new dato_general_usuario_control();
		
		$dato_general_usuarioController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$dato_general_usuarioController->usuarioActual=new usuario();
		
		$dato_general_usuarioController->usuarioActual->setId($this->usuarioActual->getId());
		$dato_general_usuarioController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$dato_general_usuarioController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$dato_general_usuarioController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$dato_general_usuarioController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$dato_general_usuarioController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$dato_general_usuarioController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$dato_general_usuarioController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $dato_general_usuarioController;
	}
	
	public function loadIndex() {
		$strTypeOnLoaddato_general_usuario= $this->getDataGeneralString('strTypeOnLoaddato_general_usuario');
		$strTipoPaginaAuxiliardato_general_usuario= $this->getDataGeneralString('strTipoPaginaAuxiliardato_general_usuario');
		$strTipoUsuarioAuxiliardato_general_usuario= $this->getDataGeneralString('strTipoUsuarioAuxiliardato_general_usuario');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoaddato_general_usuario,$strTipoPaginaAuxiliardato_general_usuario,$strTipoUsuarioAuxiliardato_general_usuario,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoaddato_general_usuario!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('dato_general_usuario','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(dato_general_usuario_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliardato_general_usuario,$this->strTipoUsuarioAuxiliardato_general_usuario,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(dato_general_usuario_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliardato_general_usuario,$this->strTipoUsuarioAuxiliardato_general_usuario,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->dato_general_usuarioReturnGeneral=new dato_general_usuario_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->dato_general_usuarioReturnGeneral->conGuardarReturnSessionJs=true;
		$this->dato_general_usuarioReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->dato_general_usuarioReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->dato_general_usuarioReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->dato_general_usuarioReturnGeneral);
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
		$this->dato_general_usuarioReturnGeneral=new dato_general_usuario_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->dato_general_usuarioReturnGeneral->conGuardarReturnSessionJs=true;
		$this->dato_general_usuarioReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->dato_general_usuarioReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->dato_general_usuarioReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->dato_general_usuarioReturnGeneral);
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
		$this->dato_general_usuarioReturnGeneral=new dato_general_usuario_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->dato_general_usuarioReturnGeneral->conGuardarReturnSessionJs=true;
		$this->dato_general_usuarioReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->dato_general_usuarioReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->dato_general_usuarioReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->dato_general_usuarioReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
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
			
			
			$this->dato_general_usuarioReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->dato_general_usuarioReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->dato_general_usuarioReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->dato_general_usuarioReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->dato_general_usuarioReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->dato_general_usuarioReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->dato_general_usuarioReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->dato_general_usuarioReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->dato_general_usuarioReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->dato_general_usuarioReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->dato_general_usuarioReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->dato_general_usuarioReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->dato_general_usuarioReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->dato_general_usuarioReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->dato_general_usuarioReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->dato_general_usuarioReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->dato_general_usuarioReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->dato_general_usuarioReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
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
		
		$this->dato_general_usuarioLogic=new dato_general_usuario_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->dato_general_usuario=new dato_general_usuario();
		
		$this->strTypeOnLoaddato_general_usuario='onload';
		$this->strTipoPaginaAuxiliardato_general_usuario='none';
		$this->strTipoUsuarioAuxiliardato_general_usuario='none';	

		$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;
		
		$this->dato_general_usuarioModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->dato_general_usuarioControllerAdditional=new dato_general_usuario_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(dato_general_usuario_session $dato_general_usuario_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($dato_general_usuario_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoaddato_general_usuario='',?string $strTipoPaginaAuxiliardato_general_usuario='',?string $strTipoUsuarioAuxiliardato_general_usuario='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoaddato_general_usuario=$strTypeOnLoaddato_general_usuario;
			$this->strTipoPaginaAuxiliardato_general_usuario=$strTipoPaginaAuxiliardato_general_usuario;
			$this->strTipoUsuarioAuxiliardato_general_usuario=$strTipoUsuarioAuxiliardato_general_usuario;
	
			if($strTipoUsuarioAuxiliardato_general_usuario=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->dato_general_usuario=new dato_general_usuario();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Dato General Usuarios';
			
			
			$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));
							
			if($dato_general_usuario_session==null) {
				$dato_general_usuario_session=new dato_general_usuario_session();
				
				/*$this->Session->write('dato_general_usuario_session',$dato_general_usuario_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($dato_general_usuario_session->strFuncionJsPadre!=null && $dato_general_usuario_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$dato_general_usuario_session->strFuncionJsPadre;
				
				$dato_general_usuario_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($dato_general_usuario_session);
			
			if($strTypeOnLoaddato_general_usuario!=null && $strTypeOnLoaddato_general_usuario=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$dato_general_usuario_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$dato_general_usuario_session->setPaginaPopupVariables(true);
				}
				
				if($dato_general_usuario_session->intNumeroPaginacion==dato_general_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$dato_general_usuario_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,dato_general_usuario_util::$STR_SESSION_NAME,'seguridad');																
			
			} else if($strTypeOnLoaddato_general_usuario!=null && $strTypeOnLoaddato_general_usuario=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$dato_general_usuario_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;*/
				
				if($dato_general_usuario_session->intNumeroPaginacion==dato_general_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$dato_general_usuario_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliardato_general_usuario!=null && $strTipoPaginaAuxiliardato_general_usuario=='none') {
				/*$dato_general_usuario_session->strStyleDivHeader='display:table-row';*/
				
				/*$dato_general_usuario_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliardato_general_usuario!=null && $strTipoPaginaAuxiliardato_general_usuario=='iframe') {
					/*
					$dato_general_usuario_session->strStyleDivArbol='display:none';
					$dato_general_usuario_session->strStyleDivHeader='display:none';
					$dato_general_usuario_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$dato_general_usuario_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->dato_general_usuarioClase=new dato_general_usuario();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=dato_general_usuario_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(dato_general_usuario_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->dato_general_usuarioLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->dato_general_usuarioLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->dato_general_usuarioLogic=new dato_general_usuario_logic();*/
			
			
			$this->dato_general_usuariosModel=null;
			/*new ListDataModel();*/
			
			/*$this->dato_general_usuariosModel.setWrappedData(dato_general_usuarioLogic->getdato_general_usuarios());*/
						
			$this->dato_general_usuarios= array();
			$this->dato_general_usuariosEliminados=array();
			$this->dato_general_usuariosSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= dato_general_usuario_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->dato_general_usuario= new dato_general_usuario();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idciudad='display:table-row';
			$this->strVisibleFK_Idpais='display:table-row';
			$this->strVisibleFK_Idprovincia='display:table-row';
			$this->strVisibleFK_Idusuarioid='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliardato_general_usuario!=null && $strTipoUsuarioAuxiliardato_general_usuario!='none' && $strTipoUsuarioAuxiliardato_general_usuario!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliardato_general_usuario);
																
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
				if($strTipoUsuarioAuxiliardato_general_usuario!=null && $strTipoUsuarioAuxiliardato_general_usuario!='none' && $strTipoUsuarioAuxiliardato_general_usuario!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliardato_general_usuario);
																
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
				if($strTipoUsuarioAuxiliardato_general_usuario==null || $strTipoUsuarioAuxiliardato_general_usuario=='none' || $strTipoUsuarioAuxiliardato_general_usuario=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliardato_general_usuario,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, dato_general_usuario_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, dato_general_usuario_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina dato_general_usuario');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($dato_general_usuario_session);
			
			$this->getSetBusquedasSesionConfig($dato_general_usuario_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportedato_general_usuarios($this->strAccionBusqueda,$this->dato_general_usuarioLogic->getdato_general_usuarios());*/
				} else if($this->strGenerarReporte=='Html')	{
					$dato_general_usuario_session->strServletGenerarHtmlReporte='dato_general_usuarioServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(dato_general_usuario_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(dato_general_usuario_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($dato_general_usuario_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliardato_general_usuario!=null && $strTipoUsuarioAuxiliardato_general_usuario=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($dato_general_usuario_session);
			}
								
			$this->set(dato_general_usuario_util::$STR_SESSION_NAME, $dato_general_usuario_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($dato_general_usuario_session);
			
			/*
			$this->dato_general_usuario->recursive = 0;
			
			$this->dato_general_usuarios=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('dato_general_usuarios', $this->dato_general_usuarios);
			
			$this->set(dato_general_usuario_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->dato_general_usuarioActual =$this->dato_general_usuarioClase;
			
			/*$this->dato_general_usuarioActual =$this->migrarModeldato_general_usuario($this->dato_general_usuarioClase);*/
			
			$this->returnHtml(false);
			
			$this->set(dato_general_usuario_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=dato_general_usuario_util::$STR_NOMBRE_OPCION;
				
			if(dato_general_usuario_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=dato_general_usuario_util::$STR_MODULO_OPCION.dato_general_usuario_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(dato_general_usuario_util::$STR_SESSION_NAME,serialize($dato_general_usuario_session));
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
			/*$dato_general_usuarioClase= (dato_general_usuario) dato_general_usuariosModel.getRowData();*/
			
			$this->dato_general_usuarioClase->setId($this->dato_general_usuario->getId());	
			$this->dato_general_usuarioClase->setVersionRow($this->dato_general_usuario->getVersionRow());	
			$this->dato_general_usuarioClase->setVersionRow($this->dato_general_usuario->getVersionRow());	
			$this->dato_general_usuarioClase->setid_pais($this->dato_general_usuario->getid_pais());	
			$this->dato_general_usuarioClase->setid_provincia($this->dato_general_usuario->getid_provincia());	
			$this->dato_general_usuarioClase->setid_ciudad($this->dato_general_usuario->getid_ciudad());	
			$this->dato_general_usuarioClase->setcedula($this->dato_general_usuario->getcedula());	
			$this->dato_general_usuarioClase->setapellidos($this->dato_general_usuario->getapellidos());	
			$this->dato_general_usuarioClase->setnombres($this->dato_general_usuario->getnombres());	
			$this->dato_general_usuarioClase->settelefono($this->dato_general_usuario->gettelefono());	
			$this->dato_general_usuarioClase->settelefono_movil($this->dato_general_usuario->gettelefono_movil());	
			$this->dato_general_usuarioClase->sete_mail($this->dato_general_usuario->gete_mail());	
			$this->dato_general_usuarioClase->seturl($this->dato_general_usuario->geturl());	
			$this->dato_general_usuarioClase->setfecha_nacimiento($this->dato_general_usuario->getfecha_nacimiento());	
			$this->dato_general_usuarioClase->setdireccion($this->dato_general_usuario->getdireccion());	
		
			/*$this->Session->write('dato_general_usuarioVersionRowActual', dato_general_usuario.getVersionRow());*/
			
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
			
			$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));
						
			if($dato_general_usuario_session==null) {
				$dato_general_usuario_session=new dato_general_usuario_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('dato_general_usuario', $this->dato_general_usuario->read(null, $id));
	
			
			$this->dato_general_usuario->recursive = 0;
			
			$this->dato_general_usuarios=$this->paginate();
			
			$this->set('dato_general_usuarios', $this->dato_general_usuarios);
	
			if (empty($this->data)) {
				$this->data = $this->dato_general_usuario->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->dato_general_usuarioLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->dato_general_usuarioClase);
			
			$this->dato_general_usuarioActual=$this->dato_general_usuarioClase;
			
			/*$this->dato_general_usuarioActual =$this->migrarModeldato_general_usuario($this->dato_general_usuarioClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->dato_general_usuarioLogic->getdato_general_usuarios(),$this->dato_general_usuarioActual);
			
			$this->actualizarControllerConReturnGeneral($this->dato_general_usuarioReturnGeneral);
			
			//$this->dato_general_usuarioReturnGeneral=$this->dato_general_usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->dato_general_usuarioLogic->getdato_general_usuarios(),$this->dato_general_usuarioActual,$this->dato_general_usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));
						
			if($dato_general_usuario_session==null) {
				$dato_general_usuario_session=new dato_general_usuario_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevodato_general_usuario', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->dato_general_usuarioClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->dato_general_usuarioClase);
			
			$this->dato_general_usuarioActual =$this->dato_general_usuarioClase;
			
			/*$this->dato_general_usuarioActual =$this->migrarModeldato_general_usuario($this->dato_general_usuarioClase);*/
			
			$this->setdato_general_usuarioFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			/*PARA RELACION DE UNO A UNO*/
			$this->dato_general_usuarioClase->setId($this->bigIdFK_IdUsuario);
			$this->data['id']=$this->bigIdFK_IdUsuario;
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->dato_general_usuarioLogic->getdato_general_usuarios(),$this->dato_general_usuario);
			
			$this->actualizarControllerConReturnGeneral($this->dato_general_usuarioReturnGeneral);
			
			//this->dato_general_usuarioReturnGeneral=$this->dato_general_usuarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->dato_general_usuarioLogic->getdato_general_usuarios(),$this->dato_general_usuario,$this->dato_general_usuarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->dato_general_usuarioReturnGeneral->getdato_general_usuario()->setid($this->idusuarioDefaultFK);
			}

			if($this->idpaisDefaultFK!=null && $this->idpaisDefaultFK > -1) {
				$this->dato_general_usuarioReturnGeneral->getdato_general_usuario()->setid_pais($this->idpaisDefaultFK);
			}

			if($this->idprovinciaDefaultFK!=null && $this->idprovinciaDefaultFK > -1) {
				$this->dato_general_usuarioReturnGeneral->getdato_general_usuario()->setid_provincia($this->idprovinciaDefaultFK);
			}

			if($this->idciudadDefaultFK!=null && $this->idciudadDefaultFK > -1) {
				$this->dato_general_usuarioReturnGeneral->getdato_general_usuario()->setid_ciudad($this->idciudadDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->dato_general_usuarioReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->dato_general_usuarioReturnGeneral->getdato_general_usuario(),$this->dato_general_usuarioActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeydato_general_usuario($this->dato_general_usuarioReturnGeneral->getdato_general_usuario());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariodato_general_usuario($this->dato_general_usuarioReturnGeneral->getdato_general_usuario());*/
			}
			
			if($this->dato_general_usuarioReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->dato_general_usuarioReturnGeneral->getdato_general_usuario(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualdato_general_usuario($this->dato_general_usuario,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->dato_general_usuariosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->dato_general_usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->dato_general_usuariosAuxiliar=array();
			}
			
			if(count($this->dato_general_usuariosAuxiliar)==2) {
				$dato_general_usuarioOrigen=$this->dato_general_usuariosAuxiliar[0];
				$dato_general_usuarioDestino=$this->dato_general_usuariosAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($dato_general_usuarioOrigen,$dato_general_usuarioDestino,true,false,false);
				
				$this->actualizarLista($dato_general_usuarioDestino,$this->dato_general_usuarios);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->dato_general_usuariosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->dato_general_usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->dato_general_usuariosAuxiliar=array();
			}
			
			if(count($this->dato_general_usuariosAuxiliar) > 0) {
				foreach ($this->dato_general_usuariosAuxiliar as $dato_general_usuarioSeleccionado) {
					$this->dato_general_usuario=new dato_general_usuario();
					
					$this->setCopiarVariablesObjetos($dato_general_usuarioSeleccionado,$this->dato_general_usuario,true,true,false);
						
					$this->dato_general_usuarios[]=$this->dato_general_usuario;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->dato_general_usuariosEliminados as $dato_general_usuarioEliminado) {
				$this->dato_general_usuarioLogic->dato_general_usuarios[]=$dato_general_usuarioEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->dato_general_usuario=new dato_general_usuario();
							
				$this->dato_general_usuarios[]=$this->dato_general_usuario;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
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
		
		$dato_general_usuarioActual=new dato_general_usuario();
		
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
				
				$dato_general_usuarioActual=$this->dato_general_usuarios[$indice];		
				
				$dato_general_usuarioActual->setId($this->data['t'.$this->strSufijo]['cel_'.$i.'_0']);
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $dato_general_usuarioActual->setid_pais((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $dato_general_usuarioActual->setid_provincia((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $dato_general_usuarioActual->setid_ciudad((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $dato_general_usuarioActual->setcedula($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $dato_general_usuarioActual->setapellidos($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $dato_general_usuarioActual->setnombres($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $dato_general_usuarioActual->settelefono($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $dato_general_usuarioActual->settelefono_movil($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $dato_general_usuarioActual->sete_mail($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $dato_general_usuarioActual->seturl($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $dato_general_usuarioActual->setfecha_nacimiento(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $dato_general_usuarioActual->setdireccion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
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
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoaddato_general_usuario='',string $strTipoPaginaAuxiliardato_general_usuario='',string $strTipoUsuarioAuxiliardato_general_usuario='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoaddato_general_usuario,$strTipoPaginaAuxiliardato_general_usuario,$strTipoUsuarioAuxiliardato_general_usuario,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->dato_general_usuarios) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=dato_general_usuario_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=dato_general_usuario_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=dato_general_usuario_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));
						
			if($dato_general_usuario_session==null) {
				$dato_general_usuario_session=new dato_general_usuario_session();
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
					/*$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;*/
					
					if($dato_general_usuario_session->intNumeroPaginacion==dato_general_usuario_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$dato_general_usuario_session->intNumeroPaginacion;
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
			
			$this->dato_general_usuariosEliminados=array();
			
			/*$this->dato_general_usuarioLogic->setConnexion($connexion);*/
			
			$this->dato_general_usuarioLogic->setIsConDeep(true);
			
			$this->dato_general_usuarioLogic->getdato_general_usuarioDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('pais');$classes[]=$class;
			$class=new Classe('provincia');$classes[]=$class;
			$class=new Classe('ciudad');$classes[]=$class;
			
			$this->dato_general_usuarioLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->dato_general_usuarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->dato_general_usuarioLogic->getdato_general_usuarios()==null|| count($this->dato_general_usuarioLogic->getdato_general_usuarios())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->dato_general_usuarios=$this->dato_general_usuarioLogic->getdato_general_usuarios();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->dato_general_usuarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->dato_general_usuariosReporte=$this->dato_general_usuarioLogic->getdato_general_usuarios();
									
						/*$this->generarReportes('Todos',$this->dato_general_usuarioLogic->getdato_general_usuarios());*/
					
						$this->dato_general_usuarioLogic->setdato_general_usuarios($this->dato_general_usuarios);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->dato_general_usuarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->dato_general_usuarioLogic->getdato_general_usuarios()==null|| count($this->dato_general_usuarioLogic->getdato_general_usuarios())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->dato_general_usuarios=$this->dato_general_usuarioLogic->getdato_general_usuarios();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->dato_general_usuarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->dato_general_usuariosReporte=$this->dato_general_usuarioLogic->getdato_general_usuarios();
									
						/*$this->generarReportes('Todos',$this->dato_general_usuarioLogic->getdato_general_usuarios());*/
					
						$this->dato_general_usuarioLogic->setdato_general_usuarios($this->dato_general_usuarios);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->iddato_general_usuario=0;*/
				
				if($dato_general_usuario_session->bitBusquedaDesdeFKSesionFK!=null && $dato_general_usuario_session->bitBusquedaDesdeFKSesionFK==true) {
					if($dato_general_usuario_session->bigIdActualFK!=null && $dato_general_usuario_session->bigIdActualFK!=0)	{
						$this->iddato_general_usuario=$dato_general_usuario_session->bigIdActualFK;	
					}
					
					$dato_general_usuario_session->bitBusquedaDesdeFKSesionFK=false;
					
					$dato_general_usuario_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					iddato_general_usuario=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					iddato_general_usuario=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->dato_general_usuarioLogic->getEntity($this->iddato_general_usuario);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*dato_general_usuarioLogicAdditional::getDetalleIndicePorId($iddato_general_usuario);*/

				
				if($this->dato_general_usuarioLogic->getdato_general_usuario()!=null) {
					$this->dato_general_usuarioLogic->setdato_general_usuarios(array());
					$this->dato_general_usuarioLogic->dato_general_usuarios[]=$this->dato_general_usuarioLogic->getdato_general_usuario();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idciudad')
			{

				if($dato_general_usuario_session->bigidciudadActual!=null && $dato_general_usuario_session->bigidciudadActual!=0)
				{
					$this->id_ciudadFK_Idciudad=$dato_general_usuario_session->bigidciudadActual;
					$dato_general_usuario_session->bigidciudadActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->dato_general_usuarioLogic->getsFK_Idciudad($finalQueryPaginacion,$this->pagination,$this->id_ciudadFK_Idciudad);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//dato_general_usuarioLogicAdditional::getDetalleIndiceFK_Idciudad($this->id_ciudadFK_Idciudad);


					if($this->dato_general_usuarioLogic->getdato_general_usuarios()==null || count($this->dato_general_usuarioLogic->getdato_general_usuarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$dato_general_usuarios=$this->dato_general_usuarioLogic->getdato_general_usuarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->dato_general_usuarioLogic->getsFK_Idciudad('',$this->pagination,$this->id_ciudadFK_Idciudad);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->dato_general_usuariosReporte=$this->dato_general_usuarioLogic->getdato_general_usuarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedato_general_usuarios("FK_Idciudad",$this->dato_general_usuarioLogic->getdato_general_usuarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->dato_general_usuarioLogic->setdato_general_usuarios($dato_general_usuarios);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idpais')
			{

				if($dato_general_usuario_session->bigidpaisActual!=null && $dato_general_usuario_session->bigidpaisActual!=0)
				{
					$this->id_paisFK_Idpais=$dato_general_usuario_session->bigidpaisActual;
					$dato_general_usuario_session->bigidpaisActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->dato_general_usuarioLogic->getsFK_Idpais($finalQueryPaginacion,$this->pagination,$this->id_paisFK_Idpais);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//dato_general_usuarioLogicAdditional::getDetalleIndiceFK_Idpais($this->id_paisFK_Idpais);


					if($this->dato_general_usuarioLogic->getdato_general_usuarios()==null || count($this->dato_general_usuarioLogic->getdato_general_usuarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$dato_general_usuarios=$this->dato_general_usuarioLogic->getdato_general_usuarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->dato_general_usuarioLogic->getsFK_Idpais('',$this->pagination,$this->id_paisFK_Idpais);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->dato_general_usuariosReporte=$this->dato_general_usuarioLogic->getdato_general_usuarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedato_general_usuarios("FK_Idpais",$this->dato_general_usuarioLogic->getdato_general_usuarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->dato_general_usuarioLogic->setdato_general_usuarios($dato_general_usuarios);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idprovincia')
			{

				if($dato_general_usuario_session->bigidprovinciaActual!=null && $dato_general_usuario_session->bigidprovinciaActual!=0)
				{
					$this->id_provinciaFK_Idprovincia=$dato_general_usuario_session->bigidprovinciaActual;
					$dato_general_usuario_session->bigidprovinciaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->dato_general_usuarioLogic->getsFK_Idprovincia($finalQueryPaginacion,$this->pagination,$this->id_provinciaFK_Idprovincia);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//dato_general_usuarioLogicAdditional::getDetalleIndiceFK_Idprovincia($this->id_provinciaFK_Idprovincia);


					if($this->dato_general_usuarioLogic->getdato_general_usuarios()==null || count($this->dato_general_usuarioLogic->getdato_general_usuarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$dato_general_usuarios=$this->dato_general_usuarioLogic->getdato_general_usuarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->dato_general_usuarioLogic->getsFK_Idprovincia('',$this->pagination,$this->id_provinciaFK_Idprovincia);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->dato_general_usuariosReporte=$this->dato_general_usuarioLogic->getdato_general_usuarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedato_general_usuarios("FK_Idprovincia",$this->dato_general_usuarioLogic->getdato_general_usuarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->dato_general_usuarioLogic->setdato_general_usuarios($dato_general_usuarios);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuarioid')
			{

				if($dato_general_usuario_session->bigidusuarioActual!=null && $dato_general_usuario_session->bigidusuarioActual!=0)
				{
					$this->idFK_Idusuarioid=$dato_general_usuario_session->bigidusuarioActual;
					$dato_general_usuario_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->dato_general_usuarioLogic->getsFK_Idusuarioid($finalQueryPaginacion,$this->pagination,$this->idFK_Idusuarioid);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//dato_general_usuarioLogicAdditional::getDetalleIndiceFK_Idusuarioid($this->idFK_Idusuarioid);


					if($this->dato_general_usuarioLogic->getdato_general_usuarios()==null || count($this->dato_general_usuarioLogic->getdato_general_usuarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$dato_general_usuarios=$this->dato_general_usuarioLogic->getdato_general_usuarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->dato_general_usuarioLogic->getsFK_Idusuarioid('',$this->pagination,$this->idFK_Idusuarioid);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->dato_general_usuariosReporte=$this->dato_general_usuarioLogic->getdato_general_usuarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedato_general_usuarios("FK_Idusuarioid",$this->dato_general_usuarioLogic->getdato_general_usuarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->dato_general_usuarioLogic->setdato_general_usuarios($dato_general_usuarios);
					}
				//}
					$blnTieneDatosdato_general_usuario=true;
					$blnTieneDatosdato_general_usuario=$this->dato_general_usuarioLogic->getdato_general_usuarios()!=null && count($this->dato_general_usuarioLogic->getdato_general_usuarios())>0;

					if($blnTieneDatosdato_general_usuario) {
						$this->strPermisoNuevodato_general_usuario='none';
					}

			} 
		
		$dato_general_usuario_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$dato_general_usuario_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->dato_general_usuarioLogic->loadForeignsKeysDescription();*/
		
		$this->dato_general_usuarios=$this->dato_general_usuarioLogic->getdato_general_usuarios();
		
		if($this->dato_general_usuariosEliminados==null) {
			$this->dato_general_usuariosEliminados=array();
		}
		
		$this->Session->write(dato_general_usuario_util::$STR_SESSION_NAME.'Lista',serialize($this->dato_general_usuarios));
		$this->Session->write(dato_general_usuario_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->dato_general_usuariosEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(dato_general_usuario_util::$STR_SESSION_NAME,serialize($dato_general_usuario_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->iddato_general_usuario=$idGeneral;
			
			$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
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
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}

			if(count($this->dato_general_usuarios) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
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
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ciudadFK_Idciudad=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idciudad','cmbid_ciudad');

			$this->strAccionBusqueda='FK_Idciudad';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
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
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_paisFK_Idpais=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idpais','cmbid_pais');

			$this->strAccionBusqueda='FK_Idpais';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdprovinciaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_provinciaFK_Idprovincia=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idprovincia','cmbid_provincia');

			$this->strAccionBusqueda='FK_Idprovincia';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdusuarioidParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->idFK_Idusuarioid=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuarioid','hdnIdActual');

			$this->strAccionBusqueda='FK_Idusuarioid';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idciudad($strFinalQuery,$id_ciudad)
	{
		try
		{

			$this->dato_general_usuarioLogic->getsFK_Idciudad($strFinalQuery,new Pagination(),$id_ciudad);
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

			$this->dato_general_usuarioLogic->getsFK_Idpais($strFinalQuery,new Pagination(),$id_pais);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idprovincia($strFinalQuery,$id_provincia)
	{
		try
		{

			$this->dato_general_usuarioLogic->getsFK_Idprovincia($strFinalQuery,new Pagination(),$id_provincia);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idusuarioid($strFinalQuery,$id)
	{
		try
		{

			$this->dato_general_usuarioLogic->getsFK_Idusuarioid($strFinalQuery,new Pagination(),$id);
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
			
			
			$dato_general_usuarioForeignKey=new dato_general_usuario_param_return(); //dato_general_usuarioForeignKey();
			
			$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));
						
			if($dato_general_usuario_session==null) {
				$dato_general_usuario_session=new dato_general_usuario_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$dato_general_usuarioForeignKey=$this->dato_general_usuarioLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$dato_general_usuario_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$dato_general_usuarioForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$dato_general_usuarioForeignKey->idusuarioDefaultFK;
			}

			if($dato_general_usuario_session->bitBusquedaDesdeFKSesionusuario) {
				$this->setVisibleBusquedasParausuario(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_pais',$this->strRecargarFkTipos,',')) {
				$this->paissFK=$dato_general_usuarioForeignKey->paissFK;
				$this->idpaisDefaultFK=$dato_general_usuarioForeignKey->idpaisDefaultFK;
			}

			if($dato_general_usuario_session->bitBusquedaDesdeFKSesionpais) {
				$this->setVisibleBusquedasParapais(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_provincia',$this->strRecargarFkTipos,',')) {
				$this->provinciasFK=$dato_general_usuarioForeignKey->provinciasFK;
				$this->idprovinciaDefaultFK=$dato_general_usuarioForeignKey->idprovinciaDefaultFK;
			}

			if($dato_general_usuario_session->bitBusquedaDesdeFKSesionprovincia) {
				$this->setVisibleBusquedasParaprovincia(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ciudad',$this->strRecargarFkTipos,',')) {
				$this->ciudadsFK=$dato_general_usuarioForeignKey->ciudadsFK;
				$this->idciudadDefaultFK=$dato_general_usuarioForeignKey->idciudadDefaultFK;
			}

			if($dato_general_usuario_session->bitBusquedaDesdeFKSesionciudad) {
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
	
	function cargarCombosFKFromReturnGeneral($dato_general_usuarioReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$dato_general_usuarioReturnGeneral->strRecargarFkTipos;
			
			


			if($dato_general_usuarioReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$dato_general_usuarioReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$dato_general_usuarioReturnGeneral->idusuarioDefaultFK;
			}


			if($dato_general_usuarioReturnGeneral->con_paissFK==true) {
				$this->paissFK=$dato_general_usuarioReturnGeneral->paissFK;
				$this->idpaisDefaultFK=$dato_general_usuarioReturnGeneral->idpaisDefaultFK;
			}


			if($dato_general_usuarioReturnGeneral->con_provinciasFK==true) {
				$this->provinciasFK=$dato_general_usuarioReturnGeneral->provinciasFK;
				$this->idprovinciaDefaultFK=$dato_general_usuarioReturnGeneral->idprovinciaDefaultFK;
			}


			if($dato_general_usuarioReturnGeneral->con_ciudadsFK==true) {
				$this->ciudadsFK=$dato_general_usuarioReturnGeneral->ciudadsFK;
				$this->idciudadDefaultFK=$dato_general_usuarioReturnGeneral->idciudadDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(dato_general_usuario_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));
		
		if($dato_general_usuario_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($dato_general_usuario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			else if($dato_general_usuario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==pais_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='pais';
			}
			else if($dato_general_usuario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==provincia_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='provincia';
			}
			else if($dato_general_usuario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ciudad_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ciudad';
			}
			
			$dato_general_usuario_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}						
			
			$this->dato_general_usuariosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->dato_general_usuariosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->dato_general_usuariosAuxiliar=array();
			}
			
			if(count($this->dato_general_usuariosAuxiliar) > 0) {
				
				foreach ($this->dato_general_usuariosAuxiliar as $dato_general_usuarioSeleccionado) {
					$this->eliminarTablaBase($dato_general_usuarioSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
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


	public function getprovinciasFKListSelectItem() 
	{
		$provinciasList=array();

		$item=null;

		foreach($this->provinciasFK as $provincia)
		{
			$item=new SelectItem();
			$item->setLabel($provincia->getcodigo());
			$item->setValue($provincia->getId());
			$provinciasList[]=$item;
		}

		return $provinciasList;
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
				$this->dato_general_usuarioLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;
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
				$this->dato_general_usuarioLogic->commitNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->rollbackNewConnexionToDeep();
				$this->dato_general_usuarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$dato_general_usuariosNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->dato_general_usuarios as $dato_general_usuarioLocal) {
				if($dato_general_usuarioLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->dato_general_usuario=new dato_general_usuario();
				
				$this->dato_general_usuario->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->dato_general_usuarios[]=$this->dato_general_usuario;*/
				
				$dato_general_usuariosNuevos[]=$this->dato_general_usuario;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('pais');$classes[]=$class;
				$class=new Classe('provincia');$classes[]=$class;
				$class=new Classe('ciudad');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->dato_general_usuarioLogic->setdato_general_usuarios($dato_general_usuariosNuevos);
					
				$this->dato_general_usuarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($dato_general_usuariosNuevos as $dato_general_usuarioNuevo) {
					$this->dato_general_usuarios[]=$dato_general_usuarioNuevo;
				}
				
				/*$this->dato_general_usuarios[]=$dato_general_usuariosNuevos;*/
				
				$this->dato_general_usuarioLogic->setdato_general_usuarios($this->dato_general_usuarios);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($dato_general_usuariosNuevos!=null);
	}
					
	
	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery=''){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$this->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));

		if($dato_general_usuario_session==null) {
			$dato_general_usuario_session=new dato_general_usuario_session();
		}
		
		if($dato_general_usuario_session->bitBusquedaDesdeFKSesionusuario!=true) {
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


			if($dato_general_usuario_session->bigidusuarioActual!=null && $dato_general_usuario_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($dato_general_usuario_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=dato_general_usuario_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombospaissFK($connexion=null,$strRecargarFkQuery=''){
		$paisLogic= new pais_logic();
		$pagination= new Pagination();
		$this->paissFK=array();

		$paisLogic->setConnexion($connexion);
		$paisLogic->getpaisDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));

		if($dato_general_usuario_session==null) {
			$dato_general_usuario_session=new dato_general_usuario_session();
		}
		
		if($dato_general_usuario_session->bitBusquedaDesdeFKSesionpais!=true) {
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


			if($dato_general_usuario_session->bigidpaisActual!=null && $dato_general_usuario_session->bigidpaisActual > 0) {
				$paisLogic->getEntity($dato_general_usuario_session->bigidpaisActual);//WithConnection

				$this->paissFK[$paisLogic->getpais()->getId()]=dato_general_usuario_util::getpaisDescripcion($paisLogic->getpais());
				$this->idpaisDefaultFK=$paisLogic->getpais()->getId();
			}
		}
	}

	public function cargarCombosprovinciasFK($connexion=null,$strRecargarFkQuery=''){
		$provinciaLogic= new provincia_logic();
		$pagination= new Pagination();
		$this->provinciasFK=array();

		$provinciaLogic->setConnexion($connexion);
		$provinciaLogic->getprovinciaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));

		if($dato_general_usuario_session==null) {
			$dato_general_usuario_session=new dato_general_usuario_session();
		}
		
		if($dato_general_usuario_session->bitBusquedaDesdeFKSesionprovincia!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=provincia_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalprovincia=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalprovincia=Funciones::GetFinalQueryAppend($finalQueryGlobalprovincia, '');
				$finalQueryGlobalprovincia.=provincia_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalprovincia.$strRecargarFkQuery;		

				$provinciaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosprovinciasFK($provinciaLogic->getprovincias());

		} else {
			$this->setVisibleBusquedasParaprovincia(true);


			if($dato_general_usuario_session->bigidprovinciaActual!=null && $dato_general_usuario_session->bigidprovinciaActual > 0) {
				$provinciaLogic->getEntity($dato_general_usuario_session->bigidprovinciaActual);//WithConnection

				$this->provinciasFK[$provinciaLogic->getprovincia()->getId()]=dato_general_usuario_util::getprovinciaDescripcion($provinciaLogic->getprovincia());
				$this->idprovinciaDefaultFK=$provinciaLogic->getprovincia()->getId();
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

		$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));

		if($dato_general_usuario_session==null) {
			$dato_general_usuario_session=new dato_general_usuario_session();
		}
		
		if($dato_general_usuario_session->bitBusquedaDesdeFKSesionciudad!=true) {
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


			if($dato_general_usuario_session->bigidciudadActual!=null && $dato_general_usuario_session->bigidciudadActual > 0) {
				$ciudadLogic->getEntity($dato_general_usuario_session->bigidciudadActual);//WithConnection

				$this->ciudadsFK[$ciudadLogic->getciudad()->getId()]=dato_general_usuario_util::getciudadDescripcion($ciudadLogic->getciudad());
				$this->idciudadDefaultFK=$ciudadLogic->getciudad()->getId();
			}
		}
	}

	
	
	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=dato_general_usuario_util::getusuarioDescripcion($usuarioLocal);
		}
	}

	public function prepararCombospaissFK($paiss){

		foreach ($paiss as $paisLocal ) {
			if($this->idpaisDefaultFK==0) {
				$this->idpaisDefaultFK=$paisLocal->getId();
			}

			$this->paissFK[$paisLocal->getId()]=dato_general_usuario_util::getpaisDescripcion($paisLocal);
		}
	}

	public function prepararCombosprovinciasFK($provincias){

		foreach ($provincias as $provinciaLocal ) {
			if($this->idprovinciaDefaultFK==0) {
				$this->idprovinciaDefaultFK=$provinciaLocal->getId();
			}

			$this->provinciasFK[$provinciaLocal->getId()]=dato_general_usuario_util::getprovinciaDescripcion($provinciaLocal);
		}
	}

	public function prepararCombosciudadsFK($ciudads){

		foreach ($ciudads as $ciudadLocal ) {
			if($this->idciudadDefaultFK==0) {
				$this->idciudadDefaultFK=$ciudadLocal->getId();
			}

			$this->ciudadsFK[$ciudadLocal->getId()]=dato_general_usuario_util::getciudadDescripcion($ciudadLocal);
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

			$strDescripcionusuario=dato_general_usuario_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
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

			$strDescripcionpais=dato_general_usuario_util::getpaisDescripcion($paisLogic->getpais());

		} else {
			$strDescripcionpais='null';
		}

		return $strDescripcionpais;
	}

	public function cargarDescripcionprovinciaFK($idprovincia,$connexion=null){
		$provinciaLogic= new provincia_logic();
		$provinciaLogic->setConnexion($connexion);
		$provinciaLogic->getprovinciaDataAccess()->isForFKData=true;
		$strDescripcionprovincia='';

		if($idprovincia!=null && $idprovincia!='' && $idprovincia!='null') {
			if($connexion!=null) {
				$provinciaLogic->getEntity($idprovincia);//WithConnection
			} else {
				$provinciaLogic->getEntityWithConnection($idprovincia);//
			}

			$strDescripcionprovincia=dato_general_usuario_util::getprovinciaDescripcion($provinciaLogic->getprovincia());

		} else {
			$strDescripcionprovincia='null';
		}

		return $strDescripcionprovincia;
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

			$strDescripcionciudad=dato_general_usuario_util::getciudadDescripcion($ciudadLogic->getciudad());

		} else {
			$strDescripcionciudad='null';
		}

		return $strDescripcionciudad;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(dato_general_usuario $dato_general_usuarioClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
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

		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idusuarioid=$strParaVisibleusuario;
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
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionpais;
		$this->strVisibleFK_Idusuarioid=$strParaVisibleNegacionpais;
	}

	public function setVisibleBusquedasParaprovincia($isParaprovincia){
		$strParaVisibleprovincia='display:table-row';
		$strParaVisibleNegacionprovincia='display:none';

		if($isParaprovincia) {
			$strParaVisibleprovincia='display:table-row';
			$strParaVisibleNegacionprovincia='display:none';
		} else {
			$strParaVisibleprovincia='display:none';
			$strParaVisibleNegacionprovincia='display:table-row';
		}


		$strParaVisibleNegacionprovincia=trim($strParaVisibleNegacionprovincia);

		$this->strVisibleFK_Idciudad=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idpais=$strParaVisibleNegacionprovincia;
		$this->strVisibleFK_Idprovincia=$strParaVisibleprovincia;
		$this->strVisibleFK_Idusuarioid=$strParaVisibleNegacionprovincia;
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
		$this->strVisibleFK_Idprovincia=$strParaVisibleNegacionciudad;
		$this->strVisibleFK_Idusuarioid=$strParaVisibleNegacionciudad;
	}
	
	

	public function abrirBusquedaParausuario() {//$iddato_general_usuarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddato_general_usuarioActual=$iddato_general_usuarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.dato_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.dato_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliardato_general_usuario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParapais() {//$iddato_general_usuarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddato_general_usuarioActual=$iddato_general_usuarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.pais_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.dato_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_pais(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',pais_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.dato_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_pais(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(pais_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliardato_general_usuario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaprovincia() {//$iddato_general_usuarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddato_general_usuarioActual=$iddato_general_usuarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.provincia_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.dato_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_provincia(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',provincia_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.dato_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_provincia(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(provincia_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliardato_general_usuario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaciudad() {//$iddato_general_usuarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddato_general_usuarioActual=$iddato_general_usuarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ciudad_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.dato_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ciudad(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ciudad_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.dato_general_usuarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ciudad(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ciudad_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliardato_general_usuario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(dato_general_usuario_util::$STR_SESSION_NAME,dato_general_usuario_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$dato_general_usuario_session=$this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME);
				
		if($dato_general_usuario_session==null) {
			$dato_general_usuario_session=new dato_general_usuario_session();		
			//$this->Session->write('dato_general_usuario_session',$dato_general_usuario_session);							
		}
		*/
		
		$dato_general_usuario_session=new dato_general_usuario_session();
    	$dato_general_usuario_session->strPathNavegacionActual=dato_general_usuario_util::$STR_CLASS_WEB_TITULO;
    	$dato_general_usuario_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(dato_general_usuario_util::$STR_SESSION_NAME,serialize($dato_general_usuario_session));		
	}	
	
	public function getSetBusquedasSesionConfig(dato_general_usuario_session $dato_general_usuario_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($dato_general_usuario_session->bitBusquedaDesdeFKSesionFK!=null && $dato_general_usuario_session->bitBusquedaDesdeFKSesionFK==true) {
			if($dato_general_usuario_session->bigIdActualFK!=null && $dato_general_usuario_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$dato_general_usuario_session->bigIdActualFKParaPosibleAtras=$dato_general_usuario_session->bigIdActualFK;*/
			}
				
			$dato_general_usuario_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$dato_general_usuario_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(dato_general_usuario_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($dato_general_usuario_session->bitBusquedaDesdeFKSesionusuario!=null && $dato_general_usuario_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($dato_general_usuario_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(dato_general_usuario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(dato_general_usuario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(dato_general_usuario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($dato_general_usuario_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($dato_general_usuario_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=dato_general_usuario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$dato_general_usuario_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$dato_general_usuario_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;

				if($dato_general_usuario_session->intNumeroPaginacion==dato_general_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$dato_general_usuario_session->intNumeroPaginacion;
				}
			}
			else if($dato_general_usuario_session->bitBusquedaDesdeFKSesionpais!=null && $dato_general_usuario_session->bitBusquedaDesdeFKSesionpais==true)
			{
				if($dato_general_usuario_session->bigidpaisActual!=0) {
					$this->strAccionBusqueda='FK_Idpais';

					$existe_history=HistoryWeb::ExisteElemento(dato_general_usuario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(dato_general_usuario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(dato_general_usuario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($dato_general_usuario_session->bigidpaisActualDescripcion);
						$historyWeb->setIdActual($dato_general_usuario_session->bigidpaisActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=dato_general_usuario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$dato_general_usuario_session->bigidpaisActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$dato_general_usuario_session->bitBusquedaDesdeFKSesionpais=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;

				if($dato_general_usuario_session->intNumeroPaginacion==dato_general_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$dato_general_usuario_session->intNumeroPaginacion;
				}
			}
			else if($dato_general_usuario_session->bitBusquedaDesdeFKSesionprovincia!=null && $dato_general_usuario_session->bitBusquedaDesdeFKSesionprovincia==true)
			{
				if($dato_general_usuario_session->bigidprovinciaActual!=0) {
					$this->strAccionBusqueda='FK_Idprovincia';

					$existe_history=HistoryWeb::ExisteElemento(dato_general_usuario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(dato_general_usuario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(dato_general_usuario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($dato_general_usuario_session->bigidprovinciaActualDescripcion);
						$historyWeb->setIdActual($dato_general_usuario_session->bigidprovinciaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=dato_general_usuario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$dato_general_usuario_session->bigidprovinciaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$dato_general_usuario_session->bitBusquedaDesdeFKSesionprovincia=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;

				if($dato_general_usuario_session->intNumeroPaginacion==dato_general_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$dato_general_usuario_session->intNumeroPaginacion;
				}
			}
			else if($dato_general_usuario_session->bitBusquedaDesdeFKSesionciudad!=null && $dato_general_usuario_session->bitBusquedaDesdeFKSesionciudad==true)
			{
				if($dato_general_usuario_session->bigidciudadActual!=0) {
					$this->strAccionBusqueda='FK_Idciudad';

					$existe_history=HistoryWeb::ExisteElemento(dato_general_usuario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(dato_general_usuario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(dato_general_usuario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($dato_general_usuario_session->bigidciudadActualDescripcion);
						$historyWeb->setIdActual($dato_general_usuario_session->bigidciudadActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=dato_general_usuario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$dato_general_usuario_session->bigidciudadActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$dato_general_usuario_session->bitBusquedaDesdeFKSesionciudad=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;

				if($dato_general_usuario_session->intNumeroPaginacion==dato_general_usuario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=dato_general_usuario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$dato_general_usuario_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$dato_general_usuario_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));
		
		if($dato_general_usuario_session==null) {
			$dato_general_usuario_session=new dato_general_usuario_session();
		}
		
		$dato_general_usuario_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$dato_general_usuario_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$dato_general_usuario_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idciudad') {
			$dato_general_usuario_session->id_ciudad=$this->id_ciudadFK_Idciudad;	

		}
		else if($this->strAccionBusqueda=='FK_Idpais') {
			$dato_general_usuario_session->id_pais=$this->id_paisFK_Idpais;	

		}
		else if($this->strAccionBusqueda=='FK_Idprovincia') {
			$dato_general_usuario_session->id_provincia=$this->id_provinciaFK_Idprovincia;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuarioid') {
			$dato_general_usuario_session->id=$this->idFK_Idusuarioid;	

		}
		
		$this->Session->write(dato_general_usuario_util::$STR_SESSION_NAME,serialize($dato_general_usuario_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(dato_general_usuario_session $dato_general_usuario_session) {
		
		if($dato_general_usuario_session==null) {
			$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));
		}
		
		if($dato_general_usuario_session==null) {
		   $dato_general_usuario_session=new dato_general_usuario_session();
		}
		
		if($dato_general_usuario_session->strUltimaBusqueda!=null && $dato_general_usuario_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$dato_general_usuario_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$dato_general_usuario_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$dato_general_usuario_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idciudad') {
				$this->id_ciudadFK_Idciudad=$dato_general_usuario_session->id_ciudad;
				$dato_general_usuario_session->id_ciudad=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idpais') {
				$this->id_paisFK_Idpais=$dato_general_usuario_session->id_pais;
				$dato_general_usuario_session->id_pais=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idprovincia') {
				$this->id_provinciaFK_Idprovincia=$dato_general_usuario_session->id_provincia;
				$dato_general_usuario_session->id_provincia=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idusuarioid') {
				$this->idFK_Idusuarioid=$dato_general_usuario_session->id;
				$dato_general_usuario_session->id=-1;

			}
		}
		
		$dato_general_usuario_session->strUltimaBusqueda='';
		//$dato_general_usuario_session->intNumeroPaginacion=10;
		$dato_general_usuario_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(dato_general_usuario_util::$STR_SESSION_NAME,serialize($dato_general_usuario_session));		
	}
	
	public function dato_general_usuariosControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idusuarioDefaultFK = 0;
		$this->idpaisDefaultFK = 0;
		$this->idprovinciaDefaultFK = 0;
		$this->idciudadDefaultFK = 0;
	}
	
	public function setdato_general_usuarioFKsDefault() {
	
		$this->setExistDataCampoForm('form','id',$this->idusuarioDefaultFK);
		$this->setExistDataCampoForm('form','id_pais',$this->idpaisDefaultFK);
		$this->setExistDataCampoForm('form','id_provincia',$this->idprovinciaDefaultFK);
		$this->setExistDataCampoForm('form','id_ciudad',$this->idciudadDefaultFK);
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

		pais::$class;
		pais_carga::$CONTROLLER;

		provincia::$class;
		provincia_carga::$CONTROLLER;

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
		interface dato_general_usuario_controlI {	
		
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
		
		public function onLoad(dato_general_usuario_session $dato_general_usuario_session=null);	
		function index(?string $strTypeOnLoaddato_general_usuario='',?string $strTipoPaginaAuxiliardato_general_usuario='',?string $strTipoUsuarioAuxiliardato_general_usuario='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoaddato_general_usuario='',string $strTipoPaginaAuxiliardato_general_usuario='',string $strTipoUsuarioAuxiliardato_general_usuario='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($dato_general_usuarioReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(dato_general_usuario $dato_general_usuarioClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(dato_general_usuario_session $dato_general_usuario_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(dato_general_usuario_session $dato_general_usuario_session);	
		public function dato_general_usuariosControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setdato_general_usuarioFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
