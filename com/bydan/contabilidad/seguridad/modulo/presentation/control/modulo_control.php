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

namespace com\bydan\contabilidad\seguridad\modulo\presentation\control;

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

use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/modulo/util/modulo_carga.php');
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;

use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_param_return;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\presentation\session\modulo_session;


//FK


use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_carga;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_util;

use com\bydan\contabilidad\seguridad\paquete\business\entity\paquete;
use com\bydan\contabilidad\seguridad\paquete\business\logic\paquete_logic;
use com\bydan\contabilidad\seguridad\paquete\util\paquete_carga;
use com\bydan\contabilidad\seguridad\paquete\util\paquete_util;

use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\entity\tipo_tecla_mascara;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\logic\tipo_tecla_mascara_logic;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util\tipo_tecla_mascara_carga;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util\tipo_tecla_mascara_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
modulo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
modulo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
modulo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
modulo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*modulo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/seguridad/modulo/presentation/control/modulo_init_control.php');
use com\bydan\contabilidad\seguridad\modulo\presentation\control\modulo_init_control;

include_once('com/bydan/contabilidad/seguridad/modulo/presentation/control/modulo_base_control.php');
use com\bydan\contabilidad\seguridad\modulo\presentation\control\modulo_base_control;

class modulo_control extends modulo_base_control {	
	
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
			
			
			else if($action=="FK_Idpaquete"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdpaqueteParaProcesar();
			}
			else if($action=="FK_Idsistema"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdsistemaParaProcesar();
			}
			else if($action=="FK_Idtipo_tecla_mascara"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_tecla_mascaraParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParasistema') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idmoduloActual=$this->getDataId();
				$this->abrirBusquedaParasistema();//$idmoduloActual
			}
			else if($action=='abrirBusquedaParapaquete') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idmoduloActual=$this->getDataId();
				$this->abrirBusquedaParapaquete();//$idmoduloActual
			}
			else if($action=='abrirBusquedaParatipo_tecla_mascara') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idmoduloActual=$this->getDataId();
				$this->abrirBusquedaParatipo_tecla_mascara();//$idmoduloActual
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
					
					$moduloController = new modulo_control();
					
					$moduloController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($moduloController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$moduloController = new modulo_control();
						$moduloController = $this;
						
						$jsonResponse = json_encode($moduloController->modulos);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->moduloReturnGeneral==null) {
					$this->moduloReturnGeneral=new modulo_param_return();
				}
				
				echo($this->moduloReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$moduloController=new modulo_control();
		
		$moduloController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$moduloController->usuarioActual=new usuario();
		
		$moduloController->usuarioActual->setId($this->usuarioActual->getId());
		$moduloController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$moduloController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$moduloController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$moduloController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$moduloController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$moduloController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$moduloController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $moduloController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadmodulo= $this->getDataGeneralString('strTypeOnLoadmodulo');
		$strTipoPaginaAuxiliarmodulo= $this->getDataGeneralString('strTipoPaginaAuxiliarmodulo');
		$strTipoUsuarioAuxiliarmodulo= $this->getDataGeneralString('strTipoUsuarioAuxiliarmodulo');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadmodulo,$strTipoPaginaAuxiliarmodulo,$strTipoUsuarioAuxiliarmodulo,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadmodulo!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('modulo','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(modulo_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarmodulo,$this->strTipoUsuarioAuxiliarmodulo,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(modulo_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'seguridad','','POPUP',$this->strTipoPaginaAuxiliarmodulo,$this->strTipoUsuarioAuxiliarmodulo,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->moduloReturnGeneral=new modulo_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->moduloReturnGeneral->conGuardarReturnSessionJs=true;
		$this->moduloReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->moduloReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->moduloReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->moduloReturnGeneral);
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
		$this->moduloReturnGeneral=new modulo_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->moduloReturnGeneral->conGuardarReturnSessionJs=true;
		$this->moduloReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->moduloReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->moduloReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->moduloReturnGeneral);
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
		$this->moduloReturnGeneral=new modulo_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->moduloReturnGeneral->conGuardarReturnSessionJs=true;
		$this->moduloReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->moduloReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->moduloReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->moduloReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
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
			
			
			$this->moduloReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->moduloReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->moduloReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->moduloReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->moduloReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->moduloReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->moduloReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->moduloReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->moduloReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->moduloReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->moduloReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->moduloReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->moduloReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->moduloReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->moduloReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->moduloReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->moduloReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->moduloReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
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
		
		$this->moduloLogic=new modulo_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->modulo=new modulo();
		
		$this->strTypeOnLoadmodulo='onload';
		$this->strTipoPaginaAuxiliarmodulo='none';
		$this->strTipoUsuarioAuxiliarmodulo='none';	

		$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;
		
		$this->moduloModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->moduloControllerAdditional=new modulo_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(modulo_session $modulo_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($modulo_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadmodulo='',?string $strTipoPaginaAuxiliarmodulo='',?string $strTipoUsuarioAuxiliarmodulo='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadmodulo=$strTypeOnLoadmodulo;
			$this->strTipoPaginaAuxiliarmodulo=$strTipoPaginaAuxiliarmodulo;
			$this->strTipoUsuarioAuxiliarmodulo=$strTipoUsuarioAuxiliarmodulo;
	
			if($strTipoUsuarioAuxiliarmodulo=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->modulo=new modulo();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Modulos';
			
			
			$modulo_session=unserialize($this->Session->read(modulo_util::$STR_SESSION_NAME));
							
			if($modulo_session==null) {
				$modulo_session=new modulo_session();
				
				/*$this->Session->write('modulo_session',$modulo_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($modulo_session->strFuncionJsPadre!=null && $modulo_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$modulo_session->strFuncionJsPadre;
				
				$modulo_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($modulo_session);
			
			if($strTypeOnLoadmodulo!=null && $strTypeOnLoadmodulo=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$modulo_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$modulo_session->setPaginaPopupVariables(true);
				}
				
				if($modulo_session->intNumeroPaginacion==modulo_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$modulo_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,modulo_util::$STR_SESSION_NAME,'seguridad');																
			
			} else if($strTypeOnLoadmodulo!=null && $strTypeOnLoadmodulo=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$modulo_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;*/
				
				if($modulo_session->intNumeroPaginacion==modulo_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$modulo_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarmodulo!=null && $strTipoPaginaAuxiliarmodulo=='none') {
				/*$modulo_session->strStyleDivHeader='display:table-row';*/
				
				/*$modulo_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarmodulo!=null && $strTipoPaginaAuxiliarmodulo=='iframe') {
					/*
					$modulo_session->strStyleDivArbol='display:none';
					$modulo_session->strStyleDivHeader='display:none';
					$modulo_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$modulo_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->moduloClase=new modulo();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=modulo_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(modulo_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->moduloLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->moduloLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->moduloLogic=new modulo_logic();*/
			
			
			$this->modulosModel=null;
			/*new ListDataModel();*/
			
			/*$this->modulosModel.setWrappedData(moduloLogic->getmodulos());*/
						
			$this->modulos= array();
			$this->modulosEliminados=array();
			$this->modulosSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= modulo_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->modulo= new modulo();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idpaquete='display:table-row';
			$this->strVisibleFK_Idsistema='display:table-row';
			$this->strVisibleFK_Idtipo_tecla_mascara='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarmodulo!=null && $strTipoUsuarioAuxiliarmodulo!='none' && $strTipoUsuarioAuxiliarmodulo!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarmodulo);
																
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
				if($strTipoUsuarioAuxiliarmodulo!=null && $strTipoUsuarioAuxiliarmodulo!='none' && $strTipoUsuarioAuxiliarmodulo!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarmodulo);
																
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
				if($strTipoUsuarioAuxiliarmodulo==null || $strTipoUsuarioAuxiliarmodulo=='none' || $strTipoUsuarioAuxiliarmodulo=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarmodulo,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, modulo_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, modulo_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina modulo');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($modulo_session);
			
			$this->getSetBusquedasSesionConfig($modulo_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportemodulos($this->strAccionBusqueda,$this->moduloLogic->getmodulos());*/
				} else if($this->strGenerarReporte=='Html')	{
					$modulo_session->strServletGenerarHtmlReporte='moduloServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(modulo_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(modulo_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($modulo_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$modulo_session=unserialize($this->Session->read(modulo_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarmodulo!=null && $strTipoUsuarioAuxiliarmodulo=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($modulo_session);
			}
								
			$this->set(modulo_util::$STR_SESSION_NAME, $modulo_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($modulo_session);
			
			/*
			$this->modulo->recursive = 0;
			
			$this->modulos=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('modulos', $this->modulos);
			
			$this->set(modulo_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->moduloActual =$this->moduloClase;
			
			/*$this->moduloActual =$this->migrarModelmodulo($this->moduloClase);*/
			
			$this->returnHtml(false);
			
			$this->set(modulo_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=modulo_util::$STR_NOMBRE_OPCION;
				
			if(modulo_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=modulo_util::$STR_MODULO_OPCION.modulo_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(modulo_util::$STR_SESSION_NAME,serialize($modulo_session));
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
			/*$moduloClase= (modulo) modulosModel.getRowData();*/
			
			$this->moduloClase->setId($this->modulo->getId());	
			$this->moduloClase->setVersionRow($this->modulo->getVersionRow());	
			$this->moduloClase->setVersionRow($this->modulo->getVersionRow());	
			$this->moduloClase->setid_sistema($this->modulo->getid_sistema());	
			$this->moduloClase->setid_paquete($this->modulo->getid_paquete());	
			$this->moduloClase->setcodigo($this->modulo->getcodigo());	
			$this->moduloClase->setnombre($this->modulo->getnombre());	
			$this->moduloClase->setid_tipo_tecla_mascara($this->modulo->getid_tipo_tecla_mascara());	
			$this->moduloClase->settecla($this->modulo->gettecla());	
			$this->moduloClase->setestado($this->modulo->getestado());	
			$this->moduloClase->setorden($this->modulo->getorden());	
			$this->moduloClase->setdescripcion($this->modulo->getdescripcion());	
		
			/*$this->Session->write('moduloVersionRowActual', modulo.getVersionRow());*/
			
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
			
			$modulo_session=unserialize($this->Session->read(modulo_util::$STR_SESSION_NAME));
						
			if($modulo_session==null) {
				$modulo_session=new modulo_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('modulo', $this->modulo->read(null, $id));
	
			
			$this->modulo->recursive = 0;
			
			$this->modulos=$this->paginate();
			
			$this->set('modulos', $this->modulos);
	
			if (empty($this->data)) {
				$this->data = $this->modulo->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->moduloLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->moduloClase);
			
			$this->moduloActual=$this->moduloClase;
			
			/*$this->moduloActual =$this->migrarModelmodulo($this->moduloClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->moduloLogic->getmodulos(),$this->moduloActual);
			
			$this->actualizarControllerConReturnGeneral($this->moduloReturnGeneral);
			
			//$this->moduloReturnGeneral=$this->moduloLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->moduloLogic->getmodulos(),$this->moduloActual,$this->moduloParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$modulo_session=unserialize($this->Session->read(modulo_util::$STR_SESSION_NAME));
						
			if($modulo_session==null) {
				$modulo_session=new modulo_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevomodulo', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->moduloClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->moduloClase);
			
			$this->moduloActual =$this->moduloClase;
			
			/*$this->moduloActual =$this->migrarModelmodulo($this->moduloClase);*/
			
			$this->setmoduloFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->moduloLogic->getmodulos(),$this->modulo);
			
			$this->actualizarControllerConReturnGeneral($this->moduloReturnGeneral);
			
			//this->moduloReturnGeneral=$this->moduloLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->moduloLogic->getmodulos(),$this->modulo,$this->moduloParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idsistemaDefaultFK!=null && $this->idsistemaDefaultFK > -1) {
				$this->moduloReturnGeneral->getmodulo()->setid_sistema($this->idsistemaDefaultFK);
			}

			if($this->idpaqueteDefaultFK!=null && $this->idpaqueteDefaultFK > -1) {
				$this->moduloReturnGeneral->getmodulo()->setid_paquete($this->idpaqueteDefaultFK);
			}

			if($this->idtipo_tecla_mascaraDefaultFK!=null && $this->idtipo_tecla_mascaraDefaultFK > -1) {
				$this->moduloReturnGeneral->getmodulo()->setid_tipo_tecla_mascara($this->idtipo_tecla_mascaraDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->moduloReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->moduloReturnGeneral->getmodulo(),$this->moduloActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeymodulo($this->moduloReturnGeneral->getmodulo());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariomodulo($this->moduloReturnGeneral->getmodulo());*/
			}
			
			if($this->moduloReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->moduloReturnGeneral->getmodulo(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualmodulo($this->modulo,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->modulosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->modulosAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->modulosAuxiliar=array();
			}
			
			if(count($this->modulosAuxiliar)==2) {
				$moduloOrigen=$this->modulosAuxiliar[0];
				$moduloDestino=$this->modulosAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($moduloOrigen,$moduloDestino,true,false,false);
				
				$this->actualizarLista($moduloDestino,$this->modulos);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->modulosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->modulosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->modulosAuxiliar=array();
			}
			
			if(count($this->modulosAuxiliar) > 0) {
				foreach ($this->modulosAuxiliar as $moduloSeleccionado) {
					$this->modulo=new modulo();
					
					$this->setCopiarVariablesObjetos($moduloSeleccionado,$this->modulo,true,true,false);
						
					$this->modulos[]=$this->modulo;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->modulosEliminados as $moduloEliminado) {
				$this->moduloLogic->modulos[]=$moduloEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->modulo=new modulo();
							
				$this->modulos[]=$this->modulo;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
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
		
		$moduloActual=new modulo();
		
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
				
				$moduloActual=$this->modulos[$indice];		
				
				$moduloActual->setId($this->data['t'.$this->strSufijo]['cel_'.$i.'_0']);
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $moduloActual->setid_sistema((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $moduloActual->setid_paquete((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $moduloActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $moduloActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $moduloActual->setid_tipo_tecla_mascara((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $moduloActual->settecla($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $moduloActual->setestado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_9')));  } else { $moduloActual->setestado(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $moduloActual->setorden((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $moduloActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
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
				$this->moduloLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadmodulo='',string $strTipoPaginaAuxiliarmodulo='',string $strTipoUsuarioAuxiliarmodulo='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadmodulo,$strTipoPaginaAuxiliarmodulo,$strTipoUsuarioAuxiliarmodulo,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->modulos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=modulo_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=modulo_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=modulo_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$modulo_session=unserialize($this->Session->read(modulo_util::$STR_SESSION_NAME));
						
			if($modulo_session==null) {
				$modulo_session=new modulo_session();
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
					/*$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;*/
					
					if($modulo_session->intNumeroPaginacion==modulo_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$modulo_session->intNumeroPaginacion;
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
			
			$this->modulosEliminados=array();
			
			/*$this->moduloLogic->setConnexion($connexion);*/
			
			$this->moduloLogic->setIsConDeep(true);
			
			$this->moduloLogic->getmoduloDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('sistema');$classes[]=$class;
			$class=new Classe('paquete');$classes[]=$class;
			$class=new Classe('tipo_tecla_mascara');$classes[]=$class;
			
			$this->moduloLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->moduloLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->moduloLogic->getmodulos()==null|| count($this->moduloLogic->getmodulos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->modulos=$this->moduloLogic->getmodulos();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->moduloLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->modulosReporte=$this->moduloLogic->getmodulos();
									
						/*$this->generarReportes('Todos',$this->moduloLogic->getmodulos());*/
					
						$this->moduloLogic->setmodulos($this->modulos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->moduloLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->moduloLogic->getmodulos()==null|| count($this->moduloLogic->getmodulos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->modulos=$this->moduloLogic->getmodulos();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->moduloLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->modulosReporte=$this->moduloLogic->getmodulos();
									
						/*$this->generarReportes('Todos',$this->moduloLogic->getmodulos());*/
					
						$this->moduloLogic->setmodulos($this->modulos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idmodulo=0;*/
				
				if($modulo_session->bitBusquedaDesdeFKSesionFK!=null && $modulo_session->bitBusquedaDesdeFKSesionFK==true) {
					if($modulo_session->bigIdActualFK!=null && $modulo_session->bigIdActualFK!=0)	{
						$this->idmodulo=$modulo_session->bigIdActualFK;	
					}
					
					$modulo_session->bitBusquedaDesdeFKSesionFK=false;
					
					$modulo_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idmodulo=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idmodulo=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->moduloLogic->getEntity($this->idmodulo);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*moduloLogicAdditional::getDetalleIndicePorId($idmodulo);*/

				
				if($this->moduloLogic->getmodulo()!=null) {
					$this->moduloLogic->setmodulos(array());
					$this->moduloLogic->modulos[]=$this->moduloLogic->getmodulo();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idpaquete')
			{

				if($modulo_session->bigidpaqueteActual!=null && $modulo_session->bigidpaqueteActual!=0)
				{
					$this->id_paqueteFK_Idpaquete=$modulo_session->bigidpaqueteActual;
					$modulo_session->bigidpaqueteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->moduloLogic->getsFK_Idpaquete($finalQueryPaginacion,$this->pagination,$this->id_paqueteFK_Idpaquete);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//moduloLogicAdditional::getDetalleIndiceFK_Idpaquete($this->id_paqueteFK_Idpaquete);


					if($this->moduloLogic->getmodulos()==null || count($this->moduloLogic->getmodulos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$modulos=$this->moduloLogic->getmodulos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->moduloLogic->getsFK_Idpaquete('',$this->pagination,$this->id_paqueteFK_Idpaquete);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->modulosReporte=$this->moduloLogic->getmodulos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportemodulos("FK_Idpaquete",$this->moduloLogic->getmodulos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->moduloLogic->setmodulos($modulos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsistema')
			{

				if($modulo_session->bigidsistemaActual!=null && $modulo_session->bigidsistemaActual!=0)
				{
					$this->id_sistemaFK_Idsistema=$modulo_session->bigidsistemaActual;
					$modulo_session->bigidsistemaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->moduloLogic->getsFK_Idsistema($finalQueryPaginacion,$this->pagination,$this->id_sistemaFK_Idsistema);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//moduloLogicAdditional::getDetalleIndiceFK_Idsistema($this->id_sistemaFK_Idsistema);


					if($this->moduloLogic->getmodulos()==null || count($this->moduloLogic->getmodulos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$modulos=$this->moduloLogic->getmodulos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->moduloLogic->getsFK_Idsistema('',$this->pagination,$this->id_sistemaFK_Idsistema);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->modulosReporte=$this->moduloLogic->getmodulos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportemodulos("FK_Idsistema",$this->moduloLogic->getmodulos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->moduloLogic->setmodulos($modulos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_tecla_mascara')
			{

				if($modulo_session->bigidtipo_tecla_mascaraActual!=null && $modulo_session->bigidtipo_tecla_mascaraActual!=0)
				{
					$this->id_tipo_tecla_mascaraFK_Idtipo_tecla_mascara=$modulo_session->bigidtipo_tecla_mascaraActual;
					$modulo_session->bigidtipo_tecla_mascaraActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->moduloLogic->getsFK_Idtipo_tecla_mascara($finalQueryPaginacion,$this->pagination,$this->id_tipo_tecla_mascaraFK_Idtipo_tecla_mascara);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//moduloLogicAdditional::getDetalleIndiceFK_Idtipo_tecla_mascara($this->id_tipo_tecla_mascaraFK_Idtipo_tecla_mascara);


					if($this->moduloLogic->getmodulos()==null || count($this->moduloLogic->getmodulos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$modulos=$this->moduloLogic->getmodulos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->moduloLogic->getsFK_Idtipo_tecla_mascara('',$this->pagination,$this->id_tipo_tecla_mascaraFK_Idtipo_tecla_mascara);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->modulosReporte=$this->moduloLogic->getmodulos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportemodulos("FK_Idtipo_tecla_mascara",$this->moduloLogic->getmodulos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->moduloLogic->setmodulos($modulos);
					}
				//}

			} 
		
		$modulo_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$modulo_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->moduloLogic->loadForeignsKeysDescription();*/
		
		$this->modulos=$this->moduloLogic->getmodulos();
		
		if($this->modulosEliminados==null) {
			$this->modulosEliminados=array();
		}
		
		$this->Session->write(modulo_util::$STR_SESSION_NAME.'Lista',serialize($this->modulos));
		$this->Session->write(modulo_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->modulosEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(modulo_util::$STR_SESSION_NAME,serialize($modulo_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idmodulo=$idGeneral;
			
			$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
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
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}

			if(count($this->modulos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdpaqueteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_paqueteFK_Idpaquete=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idpaquete','cmbid_paquete');

			$this->strAccionBusqueda='FK_Idpaquete';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdsistemaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sistemaFK_Idsistema=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsistema','cmbid_sistema');

			$this->strAccionBusqueda='FK_Idsistema';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_tecla_mascaraParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_tecla_mascaraFK_Idtipo_tecla_mascara=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_tecla_mascara','cmbid_tipo_tecla_mascara');

			$this->strAccionBusqueda='FK_Idtipo_tecla_mascara';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idpaquete($strFinalQuery,$id_paquete)
	{
		try
		{

			$this->moduloLogic->getsFK_Idpaquete($strFinalQuery,new Pagination(),$id_paquete);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idsistema($strFinalQuery,$id_sistema)
	{
		try
		{

			$this->moduloLogic->getsFK_Idsistema($strFinalQuery,new Pagination(),$id_sistema);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_tecla_mascara($strFinalQuery,$id_tipo_tecla_mascara)
	{
		try
		{

			$this->moduloLogic->getsFK_Idtipo_tecla_mascara($strFinalQuery,new Pagination(),$id_tipo_tecla_mascara);
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
			
			
			$moduloForeignKey=new modulo_param_return(); //moduloForeignKey();
			
			$modulo_session=unserialize($this->Session->read(modulo_util::$STR_SESSION_NAME));
						
			if($modulo_session==null) {
				$modulo_session=new modulo_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$moduloForeignKey=$this->moduloLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$modulo_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sistema',$this->strRecargarFkTipos,',')) {
				$this->sistemasFK=$moduloForeignKey->sistemasFK;
				$this->idsistemaDefaultFK=$moduloForeignKey->idsistemaDefaultFK;
			}

			if($modulo_session->bitBusquedaDesdeFKSesionsistema) {
				$this->setVisibleBusquedasParasistema(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_paquete',$this->strRecargarFkTipos,',')) {
				$this->paquetesFK=$moduloForeignKey->paquetesFK;
				$this->idpaqueteDefaultFK=$moduloForeignKey->idpaqueteDefaultFK;
			}

			if($modulo_session->bitBusquedaDesdeFKSesionpaquete) {
				$this->setVisibleBusquedasParapaquete(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_tecla_mascara',$this->strRecargarFkTipos,',')) {
				$this->tipo_tecla_mascarasFK=$moduloForeignKey->tipo_tecla_mascarasFK;
				$this->idtipo_tecla_mascaraDefaultFK=$moduloForeignKey->idtipo_tecla_mascaraDefaultFK;
			}

			if($modulo_session->bitBusquedaDesdeFKSesiontipo_tecla_mascara) {
				$this->setVisibleBusquedasParatipo_tecla_mascara(true);
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
	
	function cargarCombosFKFromReturnGeneral($moduloReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$moduloReturnGeneral->strRecargarFkTipos;
			
			


			if($moduloReturnGeneral->con_sistemasFK==true) {
				$this->sistemasFK=$moduloReturnGeneral->sistemasFK;
				$this->idsistemaDefaultFK=$moduloReturnGeneral->idsistemaDefaultFK;
			}


			if($moduloReturnGeneral->con_paquetesFK==true) {
				$this->paquetesFK=$moduloReturnGeneral->paquetesFK;
				$this->idpaqueteDefaultFK=$moduloReturnGeneral->idpaqueteDefaultFK;
			}


			if($moduloReturnGeneral->con_tipo_tecla_mascarasFK==true) {
				$this->tipo_tecla_mascarasFK=$moduloReturnGeneral->tipo_tecla_mascarasFK;
				$this->idtipo_tecla_mascaraDefaultFK=$moduloReturnGeneral->idtipo_tecla_mascaraDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(modulo_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$modulo_session=unserialize($this->Session->read(modulo_util::$STR_SESSION_NAME));
		
		if($modulo_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($modulo_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sistema_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sistema';
			}
			else if($modulo_session->getstrNombrePaginaNavegacionHaciaFKDesde()==paquete_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='paquete';
			}
			else if($modulo_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_tecla_mascara_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_tecla_mascara';
			}
			
			$modulo_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}						
			
			$this->modulosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->modulosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->modulosAuxiliar=array();
			}
			
			if(count($this->modulosAuxiliar) > 0) {
				
				foreach ($this->modulosAuxiliar as $moduloSeleccionado) {
					$this->eliminarTablaBase($moduloSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
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
	
	
	
	public function getsistemasFKListSelectItem() 
	{
		$sistemasList=array();

		$item=null;

		foreach($this->sistemasFK as $sistema)
		{
			$item=new SelectItem();
			$item->setLabel($sistema->getnombre_principal());
			$item->setValue($sistema->getId());
			$sistemasList[]=$item;
		}

		return $sistemasList;
	}


	public function getpaquetesFKListSelectItem() 
	{
		$paquetesList=array();

		$item=null;

		foreach($this->paquetesFK as $paquete)
		{
			$item=new SelectItem();
			$item->setLabel($paquete->getnombre());
			$item->setValue($paquete->getId());
			$paquetesList[]=$item;
		}

		return $paquetesList;
	}


	public function gettipo_tecla_mascarasFKListSelectItem() 
	{
		$tipo_tecla_mascarasList=array();

		$item=null;

		foreach($this->tipo_tecla_mascarasFK as $tipo_tecla_mascara)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_tecla_mascara->getcodigo());
			$item->setValue($tipo_tecla_mascara->getId());
			$tipo_tecla_mascarasList[]=$item;
		}

		return $tipo_tecla_mascarasList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;
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
				$this->moduloLogic->commitNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->rollbackNewConnexionToDeep();
				$this->moduloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$modulosNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->modulos as $moduloLocal) {
				if($moduloLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->modulo=new modulo();
				
				$this->modulo->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->modulos[]=$this->modulo;*/
				
				$modulosNuevos[]=$this->modulo;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('sistema');$classes[]=$class;
				$class=new Classe('paquete');$classes[]=$class;
				$class=new Classe('tipo_tecla_mascara');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->moduloLogic->setmodulos($modulosNuevos);
					
				$this->moduloLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($modulosNuevos as $moduloNuevo) {
					$this->modulos[]=$moduloNuevo;
				}
				
				/*$this->modulos[]=$modulosNuevos;*/
				
				$this->moduloLogic->setmodulos($this->modulos);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($modulosNuevos!=null);
	}
					
	
	public function cargarCombossistemasFK($connexion=null,$strRecargarFkQuery=''){
		$sistemaLogic= new sistema_logic();
		$pagination= new Pagination();
		$this->sistemasFK=array();

		$sistemaLogic->setConnexion($connexion);
		$sistemaLogic->getsistemaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$modulo_session=unserialize($this->Session->read(modulo_util::$STR_SESSION_NAME));

		if($modulo_session==null) {
			$modulo_session=new modulo_session();
		}
		
		if($modulo_session->bitBusquedaDesdeFKSesionsistema!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=sistema_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalsistema=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsistema=Funciones::GetFinalQueryAppend($finalQueryGlobalsistema, '');
				$finalQueryGlobalsistema.=sistema_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsistema.$strRecargarFkQuery;		

				$sistemaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombossistemasFK($sistemaLogic->getsistemas());

		} else {
			$this->setVisibleBusquedasParasistema(true);


			if($modulo_session->bigidsistemaActual!=null && $modulo_session->bigidsistemaActual > 0) {
				$sistemaLogic->getEntity($modulo_session->bigidsistemaActual);//WithConnection

				$this->sistemasFK[$sistemaLogic->getsistema()->getId()]=modulo_util::getsistemaDescripcion($sistemaLogic->getsistema());
				$this->idsistemaDefaultFK=$sistemaLogic->getsistema()->getId();
			}
		}
	}

	public function cargarCombospaquetesFK($connexion=null,$strRecargarFkQuery=''){
		$paqueteLogic= new paquete_logic();
		$pagination= new Pagination();
		$this->paquetesFK=array();

		$paqueteLogic->setConnexion($connexion);
		$paqueteLogic->getpaqueteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$modulo_session=unserialize($this->Session->read(modulo_util::$STR_SESSION_NAME));

		if($modulo_session==null) {
			$modulo_session=new modulo_session();
		}
		
		if($modulo_session->bitBusquedaDesdeFKSesionpaquete!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=paquete_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalpaquete=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalpaquete=Funciones::GetFinalQueryAppend($finalQueryGlobalpaquete, '');
				$finalQueryGlobalpaquete.=paquete_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalpaquete.$strRecargarFkQuery;		

				$paqueteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombospaquetesFK($paqueteLogic->getpaquetes());

		} else {
			$this->setVisibleBusquedasParapaquete(true);


			if($modulo_session->bigidpaqueteActual!=null && $modulo_session->bigidpaqueteActual > 0) {
				$paqueteLogic->getEntity($modulo_session->bigidpaqueteActual);//WithConnection

				$this->paquetesFK[$paqueteLogic->getpaquete()->getId()]=modulo_util::getpaqueteDescripcion($paqueteLogic->getpaquete());
				$this->idpaqueteDefaultFK=$paqueteLogic->getpaquete()->getId();
			}
		}
	}

	public function cargarCombostipo_tecla_mascarasFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_tecla_mascaraLogic= new tipo_tecla_mascara_logic();
		$pagination= new Pagination();
		$this->tipo_tecla_mascarasFK=array();

		$tipo_tecla_mascaraLogic->setConnexion($connexion);
		$tipo_tecla_mascaraLogic->gettipo_tecla_mascaraDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$modulo_session=unserialize($this->Session->read(modulo_util::$STR_SESSION_NAME));

		if($modulo_session==null) {
			$modulo_session=new modulo_session();
		}
		
		if($modulo_session->bitBusquedaDesdeFKSesiontipo_tecla_mascara!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_tecla_mascara_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_tecla_mascara=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_tecla_mascara=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_tecla_mascara, '');
				$finalQueryGlobaltipo_tecla_mascara.=tipo_tecla_mascara_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_tecla_mascara.$strRecargarFkQuery;		

				$tipo_tecla_mascaraLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_tecla_mascarasFK($tipo_tecla_mascaraLogic->gettipo_tecla_mascaras());

		} else {
			$this->setVisibleBusquedasParatipo_tecla_mascara(true);


			if($modulo_session->bigidtipo_tecla_mascaraActual!=null && $modulo_session->bigidtipo_tecla_mascaraActual > 0) {
				$tipo_tecla_mascaraLogic->getEntity($modulo_session->bigidtipo_tecla_mascaraActual);//WithConnection

				$this->tipo_tecla_mascarasFK[$tipo_tecla_mascaraLogic->gettipo_tecla_mascara()->getId()]=modulo_util::gettipo_tecla_mascaraDescripcion($tipo_tecla_mascaraLogic->gettipo_tecla_mascara());
				$this->idtipo_tecla_mascaraDefaultFK=$tipo_tecla_mascaraLogic->gettipo_tecla_mascara()->getId();
			}
		}
	}

	
	
	public function prepararCombossistemasFK($sistemas){

		foreach ($sistemas as $sistemaLocal ) {
			if($this->idsistemaDefaultFK==0) {
				$this->idsistemaDefaultFK=$sistemaLocal->getId();
			}

			$this->sistemasFK[$sistemaLocal->getId()]=modulo_util::getsistemaDescripcion($sistemaLocal);
		}
	}

	public function prepararCombospaquetesFK($paquetes){

		foreach ($paquetes as $paqueteLocal ) {
			if($this->idpaqueteDefaultFK==0) {
				$this->idpaqueteDefaultFK=$paqueteLocal->getId();
			}

			$this->paquetesFK[$paqueteLocal->getId()]=modulo_util::getpaqueteDescripcion($paqueteLocal);
		}
	}

	public function prepararCombostipo_tecla_mascarasFK($tipo_tecla_mascaras){

		foreach ($tipo_tecla_mascaras as $tipo_tecla_mascaraLocal ) {
			if($this->idtipo_tecla_mascaraDefaultFK==0) {
				$this->idtipo_tecla_mascaraDefaultFK=$tipo_tecla_mascaraLocal->getId();
			}

			$this->tipo_tecla_mascarasFK[$tipo_tecla_mascaraLocal->getId()]=modulo_util::gettipo_tecla_mascaraDescripcion($tipo_tecla_mascaraLocal);
		}
	}

	
	
	public function cargarDescripcionsistemaFK($idsistema,$connexion=null){
		$sistemaLogic= new sistema_logic();
		$sistemaLogic->setConnexion($connexion);
		$sistemaLogic->getsistemaDataAccess()->isForFKData=true;
		$strDescripcionsistema='';

		if($idsistema!=null && $idsistema!='' && $idsistema!='null') {
			if($connexion!=null) {
				$sistemaLogic->getEntity($idsistema);//WithConnection
			} else {
				$sistemaLogic->getEntityWithConnection($idsistema);//
			}

			$strDescripcionsistema=modulo_util::getsistemaDescripcion($sistemaLogic->getsistema());

		} else {
			$strDescripcionsistema='null';
		}

		return $strDescripcionsistema;
	}

	public function cargarDescripcionpaqueteFK($idpaquete,$connexion=null){
		$paqueteLogic= new paquete_logic();
		$paqueteLogic->setConnexion($connexion);
		$paqueteLogic->getpaqueteDataAccess()->isForFKData=true;
		$strDescripcionpaquete='';

		if($idpaquete!=null && $idpaquete!='' && $idpaquete!='null') {
			if($connexion!=null) {
				$paqueteLogic->getEntity($idpaquete);//WithConnection
			} else {
				$paqueteLogic->getEntityWithConnection($idpaquete);//
			}

			$strDescripcionpaquete=modulo_util::getpaqueteDescripcion($paqueteLogic->getpaquete());

		} else {
			$strDescripcionpaquete='null';
		}

		return $strDescripcionpaquete;
	}

	public function cargarDescripciontipo_tecla_mascaraFK($idtipo_tecla_mascara,$connexion=null){
		$tipo_tecla_mascaraLogic= new tipo_tecla_mascara_logic();
		$tipo_tecla_mascaraLogic->setConnexion($connexion);
		$tipo_tecla_mascaraLogic->gettipo_tecla_mascaraDataAccess()->isForFKData=true;
		$strDescripciontipo_tecla_mascara='';

		if($idtipo_tecla_mascara!=null && $idtipo_tecla_mascara!='' && $idtipo_tecla_mascara!='null') {
			if($connexion!=null) {
				$tipo_tecla_mascaraLogic->getEntity($idtipo_tecla_mascara);//WithConnection
			} else {
				$tipo_tecla_mascaraLogic->getEntityWithConnection($idtipo_tecla_mascara);//
			}

			$strDescripciontipo_tecla_mascara=modulo_util::gettipo_tecla_mascaraDescripcion($tipo_tecla_mascaraLogic->gettipo_tecla_mascara());

		} else {
			$strDescripciontipo_tecla_mascara='null';
		}

		return $strDescripciontipo_tecla_mascara;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(modulo $moduloClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParasistema($isParasistema){
		$strParaVisiblesistema='display:table-row';
		$strParaVisibleNegacionsistema='display:none';

		if($isParasistema) {
			$strParaVisiblesistema='display:table-row';
			$strParaVisibleNegacionsistema='display:none';
		} else {
			$strParaVisiblesistema='display:none';
			$strParaVisibleNegacionsistema='display:table-row';
		}


		$strParaVisibleNegacionsistema=trim($strParaVisibleNegacionsistema);

		$this->strVisibleFK_Idpaquete=$strParaVisibleNegacionsistema;
		$this->strVisibleFK_Idsistema=$strParaVisiblesistema;
		$this->strVisibleFK_Idtipo_tecla_mascara=$strParaVisibleNegacionsistema;
	}

	public function setVisibleBusquedasParapaquete($isParapaquete){
		$strParaVisiblepaquete='display:table-row';
		$strParaVisibleNegacionpaquete='display:none';

		if($isParapaquete) {
			$strParaVisiblepaquete='display:table-row';
			$strParaVisibleNegacionpaquete='display:none';
		} else {
			$strParaVisiblepaquete='display:none';
			$strParaVisibleNegacionpaquete='display:table-row';
		}


		$strParaVisibleNegacionpaquete=trim($strParaVisibleNegacionpaquete);

		$this->strVisibleFK_Idpaquete=$strParaVisiblepaquete;
		$this->strVisibleFK_Idsistema=$strParaVisibleNegacionpaquete;
		$this->strVisibleFK_Idtipo_tecla_mascara=$strParaVisibleNegacionpaquete;
	}

	public function setVisibleBusquedasParatipo_tecla_mascara($isParatipo_tecla_mascara){
		$strParaVisibletipo_tecla_mascara='display:table-row';
		$strParaVisibleNegaciontipo_tecla_mascara='display:none';

		if($isParatipo_tecla_mascara) {
			$strParaVisibletipo_tecla_mascara='display:table-row';
			$strParaVisibleNegaciontipo_tecla_mascara='display:none';
		} else {
			$strParaVisibletipo_tecla_mascara='display:none';
			$strParaVisibleNegaciontipo_tecla_mascara='display:table-row';
		}


		$strParaVisibleNegaciontipo_tecla_mascara=trim($strParaVisibleNegaciontipo_tecla_mascara);

		$this->strVisibleFK_Idpaquete=$strParaVisibleNegaciontipo_tecla_mascara;
		$this->strVisibleFK_Idsistema=$strParaVisibleNegaciontipo_tecla_mascara;
		$this->strVisibleFK_Idtipo_tecla_mascara=$strParaVisibletipo_tecla_mascara;
	}
	
	

	public function abrirBusquedaParasistema() {//$idmoduloActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idmoduloActual=$idmoduloActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sistema_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.moduloJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sistema(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sistema_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.moduloJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sistema(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sistema_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarmodulo,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParapaquete() {//$idmoduloActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idmoduloActual=$idmoduloActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.paquete_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.moduloJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_paquete(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',paquete_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.moduloJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_paquete(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(paquete_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarmodulo,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_tecla_mascara() {//$idmoduloActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idmoduloActual=$idmoduloActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_tecla_mascara_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.moduloJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_tecla_mascara(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_tecla_mascara_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.moduloJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_tecla_mascara(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_tecla_mascara_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarmodulo,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(modulo_util::$STR_SESSION_NAME,modulo_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$modulo_session=$this->Session->read(modulo_util::$STR_SESSION_NAME);
				
		if($modulo_session==null) {
			$modulo_session=new modulo_session();		
			//$this->Session->write('modulo_session',$modulo_session);							
		}
		*/
		
		$modulo_session=new modulo_session();
    	$modulo_session->strPathNavegacionActual=modulo_util::$STR_CLASS_WEB_TITULO;
    	$modulo_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(modulo_util::$STR_SESSION_NAME,serialize($modulo_session));		
	}	
	
	public function getSetBusquedasSesionConfig(modulo_session $modulo_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($modulo_session->bitBusquedaDesdeFKSesionFK!=null && $modulo_session->bitBusquedaDesdeFKSesionFK==true) {
			if($modulo_session->bigIdActualFK!=null && $modulo_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$modulo_session->bigIdActualFKParaPosibleAtras=$modulo_session->bigIdActualFK;*/
			}
				
			$modulo_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$modulo_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(modulo_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($modulo_session->bitBusquedaDesdeFKSesionsistema!=null && $modulo_session->bitBusquedaDesdeFKSesionsistema==true)
			{
				if($modulo_session->bigidsistemaActual!=0) {
					$this->strAccionBusqueda='FK_Idsistema';

					$existe_history=HistoryWeb::ExisteElemento(modulo_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(modulo_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(modulo_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($modulo_session->bigidsistemaActualDescripcion);
						$historyWeb->setIdActual($modulo_session->bigidsistemaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=modulo_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$modulo_session->bigidsistemaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$modulo_session->bitBusquedaDesdeFKSesionsistema=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;

				if($modulo_session->intNumeroPaginacion==modulo_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$modulo_session->intNumeroPaginacion;
				}
			}
			else if($modulo_session->bitBusquedaDesdeFKSesionpaquete!=null && $modulo_session->bitBusquedaDesdeFKSesionpaquete==true)
			{
				if($modulo_session->bigidpaqueteActual!=0) {
					$this->strAccionBusqueda='FK_Idpaquete';

					$existe_history=HistoryWeb::ExisteElemento(modulo_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(modulo_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(modulo_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($modulo_session->bigidpaqueteActualDescripcion);
						$historyWeb->setIdActual($modulo_session->bigidpaqueteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=modulo_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$modulo_session->bigidpaqueteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$modulo_session->bitBusquedaDesdeFKSesionpaquete=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;

				if($modulo_session->intNumeroPaginacion==modulo_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$modulo_session->intNumeroPaginacion;
				}
			}
			else if($modulo_session->bitBusquedaDesdeFKSesiontipo_tecla_mascara!=null && $modulo_session->bitBusquedaDesdeFKSesiontipo_tecla_mascara==true)
			{
				if($modulo_session->bigidtipo_tecla_mascaraActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_tecla_mascara';

					$existe_history=HistoryWeb::ExisteElemento(modulo_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(modulo_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(modulo_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($modulo_session->bigidtipo_tecla_mascaraActualDescripcion);
						$historyWeb->setIdActual($modulo_session->bigidtipo_tecla_mascaraActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=modulo_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$modulo_session->bigidtipo_tecla_mascaraActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$modulo_session->bitBusquedaDesdeFKSesiontipo_tecla_mascara=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;

				if($modulo_session->intNumeroPaginacion==modulo_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=modulo_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$modulo_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$modulo_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$modulo_session=unserialize($this->Session->read(modulo_util::$STR_SESSION_NAME));
		
		if($modulo_session==null) {
			$modulo_session=new modulo_session();
		}
		
		$modulo_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$modulo_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$modulo_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idpaquete') {
			$modulo_session->id_paquete=$this->id_paqueteFK_Idpaquete;	

		}
		else if($this->strAccionBusqueda=='FK_Idsistema') {
			$modulo_session->id_sistema=$this->id_sistemaFK_Idsistema;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_tecla_mascara') {
			$modulo_session->id_tipo_tecla_mascara=$this->id_tipo_tecla_mascaraFK_Idtipo_tecla_mascara;	

		}
		
		$this->Session->write(modulo_util::$STR_SESSION_NAME,serialize($modulo_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(modulo_session $modulo_session) {
		
		if($modulo_session==null) {
			$modulo_session=unserialize($this->Session->read(modulo_util::$STR_SESSION_NAME));
		}
		
		if($modulo_session==null) {
		   $modulo_session=new modulo_session();
		}
		
		if($modulo_session->strUltimaBusqueda!=null && $modulo_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$modulo_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$modulo_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$modulo_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idpaquete') {
				$this->id_paqueteFK_Idpaquete=$modulo_session->id_paquete;
				$modulo_session->id_paquete=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idsistema') {
				$this->id_sistemaFK_Idsistema=$modulo_session->id_sistema;
				$modulo_session->id_sistema=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_tecla_mascara') {
				$this->id_tipo_tecla_mascaraFK_Idtipo_tecla_mascara=$modulo_session->id_tipo_tecla_mascara;
				$modulo_session->id_tipo_tecla_mascara=-1;

			}
		}
		
		$modulo_session->strUltimaBusqueda='';
		//$modulo_session->intNumeroPaginacion=10;
		$modulo_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(modulo_util::$STR_SESSION_NAME,serialize($modulo_session));		
	}
	
	public function modulosControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idsistemaDefaultFK = 0;
		$this->idpaqueteDefaultFK = 0;
		$this->idtipo_tecla_mascaraDefaultFK = 0;
	}
	
	public function setmoduloFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_sistema',$this->idsistemaDefaultFK);
		$this->setExistDataCampoForm('form','id_paquete',$this->idpaqueteDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_tecla_mascara',$this->idtipo_tecla_mascaraDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		sistema::$class;
		sistema_carga::$CONTROLLER;

		paquete::$class;
		paquete_carga::$CONTROLLER;

		tipo_tecla_mascara::$class;
		tipo_tecla_mascara_carga::$CONTROLLER;
		
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
		interface modulo_controlI {	
		
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
		
		public function onLoad(modulo_session $modulo_session=null);	
		function index(?string $strTypeOnLoadmodulo='',?string $strTipoPaginaAuxiliarmodulo='',?string $strTipoUsuarioAuxiliarmodulo='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadmodulo='',string $strTipoPaginaAuxiliarmodulo='',string $strTipoUsuarioAuxiliarmodulo='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($moduloReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(modulo $moduloClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(modulo_session $modulo_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(modulo_session $modulo_session);	
		public function modulosControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setmoduloFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
