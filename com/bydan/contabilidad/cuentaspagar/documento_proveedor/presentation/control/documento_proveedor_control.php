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

namespace com\bydan\contabilidad\cuentaspagar\documento_proveedor\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\entity\documento_proveedor;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/documento_proveedor/util/documento_proveedor_carga.php');
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_carga;

use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_param_return;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\logic\documento_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\presentation\session\documento_proveedor_session;


//FK


use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

//REL


use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_util;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\presentation\session\documento_cliente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
documento_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
documento_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
documento_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
documento_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*documento_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentaspagar/documento_proveedor/presentation/control/documento_proveedor_init_control.php');
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\presentation\control\documento_proveedor_init_control;

include_once('com/bydan/contabilidad/cuentaspagar/documento_proveedor/presentation/control/documento_proveedor_base_control.php');
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\presentation\control\documento_proveedor_base_control;

class documento_proveedor_control extends documento_proveedor_base_control {	
	
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
			else if($action=='registrarSesionParadocumento_clientees' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$iddocumento_proveedorActual=$this->getDataId();
				$this->registrarSesionParadocumento_clientees($iddocumento_proveedorActual);
			} 
			
			
			else if($action=="FK_Idproveedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdproveedorParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaproveedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddocumento_proveedorActual=$this->getDataId();
				$this->abrirBusquedaParaproveedor();//$iddocumento_proveedorActual
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
					
					$documento_proveedorController = new documento_proveedor_control();
					
					$documento_proveedorController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($documento_proveedorController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$documento_proveedorController = new documento_proveedor_control();
						$documento_proveedorController = $this;
						
						$jsonResponse = json_encode($documento_proveedorController->documento_proveedors);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->documento_proveedorReturnGeneral==null) {
					$this->documento_proveedorReturnGeneral=new documento_proveedor_param_return();
				}
				
				echo($this->documento_proveedorReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$documento_proveedorController=new documento_proveedor_control();
		
		$documento_proveedorController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$documento_proveedorController->usuarioActual=new usuario();
		
		$documento_proveedorController->usuarioActual->setId($this->usuarioActual->getId());
		$documento_proveedorController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$documento_proveedorController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$documento_proveedorController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$documento_proveedorController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$documento_proveedorController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$documento_proveedorController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$documento_proveedorController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $documento_proveedorController;
	}
	
	public function loadIndex() {
		$strTypeOnLoaddocumento_proveedor= $this->getDataGeneralString('strTypeOnLoaddocumento_proveedor');
		$strTipoPaginaAuxiliardocumento_proveedor= $this->getDataGeneralString('strTipoPaginaAuxiliardocumento_proveedor');
		$strTipoUsuarioAuxiliardocumento_proveedor= $this->getDataGeneralString('strTipoUsuarioAuxiliardocumento_proveedor');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoaddocumento_proveedor,$strTipoPaginaAuxiliardocumento_proveedor,$strTipoUsuarioAuxiliardocumento_proveedor,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoaddocumento_proveedor!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('documento_proveedor','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(documento_proveedor_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliardocumento_proveedor,$this->strTipoUsuarioAuxiliardocumento_proveedor,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(documento_proveedor_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliardocumento_proveedor,$this->strTipoUsuarioAuxiliardocumento_proveedor,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->documento_proveedorReturnGeneral=new documento_proveedor_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->documento_proveedorReturnGeneral->conGuardarReturnSessionJs=true;
		$this->documento_proveedorReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->documento_proveedorReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->documento_proveedorReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->documento_proveedorReturnGeneral);
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
		$this->documento_proveedorReturnGeneral=new documento_proveedor_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->documento_proveedorReturnGeneral->conGuardarReturnSessionJs=true;
		$this->documento_proveedorReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->documento_proveedorReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->documento_proveedorReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->documento_proveedorReturnGeneral);
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
		$this->documento_proveedorReturnGeneral=new documento_proveedor_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->documento_proveedorReturnGeneral->conGuardarReturnSessionJs=true;
		$this->documento_proveedorReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->documento_proveedorReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->documento_proveedorReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->documento_proveedorReturnGeneral);
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
				$this->documento_proveedorLogic->getNewConnexionToDeep();
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
			
			
			$this->documento_proveedorReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->documento_proveedorReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->documento_proveedorReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->documento_proveedorReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->documento_proveedorReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->documento_proveedorReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->documento_proveedorReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->documento_proveedorReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->documento_proveedorReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->documento_proveedorReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->documento_proveedorReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->documento_proveedorReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->documento_proveedorReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->documento_proveedorReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->documento_proveedorReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->documento_proveedorReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->documento_proveedorReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->documento_proveedorReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
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
		
		$this->documento_proveedorLogic=new documento_proveedor_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->documento_proveedor=new documento_proveedor();
		
		$this->strTypeOnLoaddocumento_proveedor='onload';
		$this->strTipoPaginaAuxiliardocumento_proveedor='none';
		$this->strTipoUsuarioAuxiliardocumento_proveedor='none';	

		$this->intNumeroPaginacion=documento_proveedor_util::$INT_NUMERO_PAGINACION;
		
		$this->documento_proveedorModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->documento_proveedorControllerAdditional=new documento_proveedor_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(documento_proveedor_session $documento_proveedor_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($documento_proveedor_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoaddocumento_proveedor='',?string $strTipoPaginaAuxiliardocumento_proveedor='',?string $strTipoUsuarioAuxiliardocumento_proveedor='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoaddocumento_proveedor=$strTypeOnLoaddocumento_proveedor;
			$this->strTipoPaginaAuxiliardocumento_proveedor=$strTipoPaginaAuxiliardocumento_proveedor;
			$this->strTipoUsuarioAuxiliardocumento_proveedor=$strTipoUsuarioAuxiliardocumento_proveedor;
	
			if($strTipoUsuarioAuxiliardocumento_proveedor=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->documento_proveedor=new documento_proveedor();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Documentos Proveedoreses';
			
			
			$documento_proveedor_session=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME));
							
			if($documento_proveedor_session==null) {
				$documento_proveedor_session=new documento_proveedor_session();
				
				/*$this->Session->write('documento_proveedor_session',$documento_proveedor_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($documento_proveedor_session->strFuncionJsPadre!=null && $documento_proveedor_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$documento_proveedor_session->strFuncionJsPadre;
				
				$documento_proveedor_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($documento_proveedor_session);
			
			if($strTypeOnLoaddocumento_proveedor!=null && $strTypeOnLoaddocumento_proveedor=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$documento_proveedor_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$documento_proveedor_session->setPaginaPopupVariables(true);
				}
				
				if($documento_proveedor_session->intNumeroPaginacion==documento_proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=documento_proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$documento_proveedor_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,documento_proveedor_util::$STR_SESSION_NAME,'cuentaspagar');																
			
			} else if($strTypeOnLoaddocumento_proveedor!=null && $strTypeOnLoaddocumento_proveedor=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$documento_proveedor_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=documento_proveedor_util::$INT_NUMERO_PAGINACION;*/
				
				if($documento_proveedor_session->intNumeroPaginacion==documento_proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=documento_proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$documento_proveedor_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliardocumento_proveedor!=null && $strTipoPaginaAuxiliardocumento_proveedor=='none') {
				/*$documento_proveedor_session->strStyleDivHeader='display:table-row';*/
				
				/*$documento_proveedor_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliardocumento_proveedor!=null && $strTipoPaginaAuxiliardocumento_proveedor=='iframe') {
					/*
					$documento_proveedor_session->strStyleDivArbol='display:none';
					$documento_proveedor_session->strStyleDivHeader='display:none';
					$documento_proveedor_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$documento_proveedor_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->documento_proveedorClase=new documento_proveedor();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=documento_proveedor_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(documento_proveedor_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->documento_proveedorLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->documento_proveedorLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$documentoclienteLogic=new documento_cliente_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->documento_proveedorLogic=new documento_proveedor_logic();*/
			
			
			$this->documento_proveedorsModel=null;
			/*new ListDataModel();*/
			
			/*$this->documento_proveedorsModel.setWrappedData(documento_proveedorLogic->getdocumento_proveedors());*/
						
			$this->documento_proveedors= array();
			$this->documento_proveedorsEliminados=array();
			$this->documento_proveedorsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= documento_proveedor_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= documento_proveedor_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->documento_proveedor= new documento_proveedor();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idproveedor='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliardocumento_proveedor!=null && $strTipoUsuarioAuxiliardocumento_proveedor!='none' && $strTipoUsuarioAuxiliardocumento_proveedor!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliardocumento_proveedor);
																
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
				if($strTipoUsuarioAuxiliardocumento_proveedor!=null && $strTipoUsuarioAuxiliardocumento_proveedor!='none' && $strTipoUsuarioAuxiliardocumento_proveedor!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliardocumento_proveedor);
																
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
				if($strTipoUsuarioAuxiliardocumento_proveedor==null || $strTipoUsuarioAuxiliardocumento_proveedor=='none' || $strTipoUsuarioAuxiliardocumento_proveedor=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliardocumento_proveedor,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, documento_proveedor_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, documento_proveedor_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina documento_proveedor');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($documento_proveedor_session);
			
			$this->getSetBusquedasSesionConfig($documento_proveedor_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportedocumento_proveedors($this->strAccionBusqueda,$this->documento_proveedorLogic->getdocumento_proveedors());*/
				} else if($this->strGenerarReporte=='Html')	{
					$documento_proveedor_session->strServletGenerarHtmlReporte='documento_proveedorServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(documento_proveedor_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(documento_proveedor_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($documento_proveedor_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$documento_proveedor_session=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliardocumento_proveedor!=null && $strTipoUsuarioAuxiliardocumento_proveedor=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($documento_proveedor_session);
			}
								
			$this->set(documento_proveedor_util::$STR_SESSION_NAME, $documento_proveedor_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($documento_proveedor_session);
			
			/*
			$this->documento_proveedor->recursive = 0;
			
			$this->documento_proveedors=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('documento_proveedors', $this->documento_proveedors);
			
			$this->set(documento_proveedor_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->documento_proveedorActual =$this->documento_proveedorClase;
			
			/*$this->documento_proveedorActual =$this->migrarModeldocumento_proveedor($this->documento_proveedorClase);*/
			
			$this->returnHtml(false);
			
			$this->set(documento_proveedor_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=documento_proveedor_util::$STR_NOMBRE_OPCION;
				
			if(documento_proveedor_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=documento_proveedor_util::$STR_MODULO_OPCION.documento_proveedor_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(documento_proveedor_util::$STR_SESSION_NAME,serialize($documento_proveedor_session));
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
			/*$documento_proveedorClase= (documento_proveedor) documento_proveedorsModel.getRowData();*/
			
			$this->documento_proveedorClase->setId($this->documento_proveedor->getId());	
			$this->documento_proveedorClase->setVersionRow($this->documento_proveedor->getVersionRow());	
			$this->documento_proveedorClase->setVersionRow($this->documento_proveedor->getVersionRow());	
			$this->documento_proveedorClase->setid_proveedor($this->documento_proveedor->getid_proveedor());	
			$this->documento_proveedorClase->setdocumento($this->documento_proveedor->getdocumento());	
		
			/*$this->Session->write('documento_proveedorVersionRowActual', documento_proveedor.getVersionRow());*/
			
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
			
			$documento_proveedor_session=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME));
						
			if($documento_proveedor_session==null) {
				$documento_proveedor_session=new documento_proveedor_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('documento_proveedor', $this->documento_proveedor->read(null, $id));
	
			
			$this->documento_proveedor->recursive = 0;
			
			$this->documento_proveedors=$this->paginate();
			
			$this->set('documento_proveedors', $this->documento_proveedors);
	
			if (empty($this->data)) {
				$this->data = $this->documento_proveedor->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->documento_proveedorLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->documento_proveedorClase);
			
			$this->documento_proveedorActual=$this->documento_proveedorClase;
			
			/*$this->documento_proveedorActual =$this->migrarModeldocumento_proveedor($this->documento_proveedorClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->documento_proveedorLogic->getdocumento_proveedors(),$this->documento_proveedorActual);
			
			$this->actualizarControllerConReturnGeneral($this->documento_proveedorReturnGeneral);
			
			//$this->documento_proveedorReturnGeneral=$this->documento_proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->documento_proveedorLogic->getdocumento_proveedors(),$this->documento_proveedorActual,$this->documento_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$documento_proveedor_session=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME));
						
			if($documento_proveedor_session==null) {
				$documento_proveedor_session=new documento_proveedor_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevodocumento_proveedor', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->documento_proveedorClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->documento_proveedorClase);
			
			$this->documento_proveedorActual =$this->documento_proveedorClase;
			
			/*$this->documento_proveedorActual =$this->migrarModeldocumento_proveedor($this->documento_proveedorClase);*/
			
			$this->setdocumento_proveedorFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->documento_proveedorLogic->getdocumento_proveedors(),$this->documento_proveedor);
			
			$this->actualizarControllerConReturnGeneral($this->documento_proveedorReturnGeneral);
			
			//this->documento_proveedorReturnGeneral=$this->documento_proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->documento_proveedorLogic->getdocumento_proveedors(),$this->documento_proveedor,$this->documento_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idproveedorDefaultFK!=null && $this->idproveedorDefaultFK > -1) {
				$this->documento_proveedorReturnGeneral->getdocumento_proveedor()->setid_proveedor($this->idproveedorDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->documento_proveedorReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->documento_proveedorReturnGeneral->getdocumento_proveedor(),$this->documento_proveedorActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeydocumento_proveedor($this->documento_proveedorReturnGeneral->getdocumento_proveedor());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariodocumento_proveedor($this->documento_proveedorReturnGeneral->getdocumento_proveedor());*/
			}
			
			if($this->documento_proveedorReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->documento_proveedorReturnGeneral->getdocumento_proveedor(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualdocumento_proveedor($this->documento_proveedor,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->documento_proveedorsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->documento_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->documento_proveedorsAuxiliar=array();
			}
			
			if(count($this->documento_proveedorsAuxiliar)==2) {
				$documento_proveedorOrigen=$this->documento_proveedorsAuxiliar[0];
				$documento_proveedorDestino=$this->documento_proveedorsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($documento_proveedorOrigen,$documento_proveedorDestino,true,false,false);
				
				$this->actualizarLista($documento_proveedorDestino,$this->documento_proveedors);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->documento_proveedorsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->documento_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->documento_proveedorsAuxiliar=array();
			}
			
			if(count($this->documento_proveedorsAuxiliar) > 0) {
				foreach ($this->documento_proveedorsAuxiliar as $documento_proveedorSeleccionado) {
					$this->documento_proveedor=new documento_proveedor();
					
					$this->setCopiarVariablesObjetos($documento_proveedorSeleccionado,$this->documento_proveedor,true,true,false);
						
					$this->documento_proveedors[]=$this->documento_proveedor;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->documento_proveedorsEliminados as $documento_proveedorEliminado) {
				$this->documento_proveedorLogic->documento_proveedors[]=$documento_proveedorEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->documento_proveedor=new documento_proveedor();
							
				$this->documento_proveedors[]=$this->documento_proveedor;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
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
		
		$documento_proveedorActual=new documento_proveedor();
		
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
				
				$documento_proveedorActual=$this->documento_proveedors[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $documento_proveedorActual->setid_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $documento_proveedorActual->setdocumento($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->documento_proveedorsAuxiliar=array();		 
		/*$this->documento_proveedorsEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->documento_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->documento_proveedorsAuxiliar=array();
		}
			
		if(count($this->documento_proveedorsAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->documento_proveedorsAuxiliar as $documento_proveedorAuxLocal) {				
				
				foreach($this->documento_proveedors as $documento_proveedorLocal) {
					if($documento_proveedorLocal->getId()==$documento_proveedorAuxLocal->getId()) {
						$documento_proveedorLocal->setIsDeleted(true);
						
						/*$this->documento_proveedorsEliminados[]=$documento_proveedorLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->documento_proveedorLogic->setdocumento_proveedors($this->documento_proveedors);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
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
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=documento_proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoaddocumento_proveedor='',string $strTipoPaginaAuxiliardocumento_proveedor='',string $strTipoUsuarioAuxiliardocumento_proveedor='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoaddocumento_proveedor,$strTipoPaginaAuxiliardocumento_proveedor,$strTipoUsuarioAuxiliardocumento_proveedor,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->documento_proveedors) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=documento_proveedor_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=documento_proveedor_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=documento_proveedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$documento_proveedor_session=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME));
						
			if($documento_proveedor_session==null) {
				$documento_proveedor_session=new documento_proveedor_session();
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
					/*$this->intNumeroPaginacion=documento_proveedor_util::$INT_NUMERO_PAGINACION;*/
					
					if($documento_proveedor_session->intNumeroPaginacion==documento_proveedor_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=documento_proveedor_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$documento_proveedor_session->intNumeroPaginacion;
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
			
			$this->documento_proveedorsEliminados=array();
			
			/*$this->documento_proveedorLogic->setConnexion($connexion);*/
			
			$this->documento_proveedorLogic->setIsConDeep(true);
			
			$this->documento_proveedorLogic->getdocumento_proveedorDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('proveedor');$classes[]=$class;
			
			$this->documento_proveedorLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->documento_proveedorLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->documento_proveedorLogic->getdocumento_proveedors()==null|| count($this->documento_proveedorLogic->getdocumento_proveedors())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->documento_proveedors=$this->documento_proveedorLogic->getdocumento_proveedors();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->documento_proveedorLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->documento_proveedorsReporte=$this->documento_proveedorLogic->getdocumento_proveedors();
									
						/*$this->generarReportes('Todos',$this->documento_proveedorLogic->getdocumento_proveedors());*/
					
						$this->documento_proveedorLogic->setdocumento_proveedors($this->documento_proveedors);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->documento_proveedorLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->documento_proveedorLogic->getdocumento_proveedors()==null|| count($this->documento_proveedorLogic->getdocumento_proveedors())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->documento_proveedors=$this->documento_proveedorLogic->getdocumento_proveedors();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->documento_proveedorLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->documento_proveedorsReporte=$this->documento_proveedorLogic->getdocumento_proveedors();
									
						/*$this->generarReportes('Todos',$this->documento_proveedorLogic->getdocumento_proveedors());*/
					
						$this->documento_proveedorLogic->setdocumento_proveedors($this->documento_proveedors);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->iddocumento_proveedor=0;*/
				
				if($documento_proveedor_session->bitBusquedaDesdeFKSesionFK!=null && $documento_proveedor_session->bitBusquedaDesdeFKSesionFK==true) {
					if($documento_proveedor_session->bigIdActualFK!=null && $documento_proveedor_session->bigIdActualFK!=0)	{
						$this->iddocumento_proveedor=$documento_proveedor_session->bigIdActualFK;	
					}
					
					$documento_proveedor_session->bitBusquedaDesdeFKSesionFK=false;
					
					$documento_proveedor_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					iddocumento_proveedor=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					iddocumento_proveedor=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->documento_proveedorLogic->getEntity($this->iddocumento_proveedor);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*documento_proveedorLogicAdditional::getDetalleIndicePorId($iddocumento_proveedor);*/

				
				if($this->documento_proveedorLogic->getdocumento_proveedor()!=null) {
					$this->documento_proveedorLogic->setdocumento_proveedors(array());
					$this->documento_proveedorLogic->documento_proveedors[]=$this->documento_proveedorLogic->getdocumento_proveedor();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idproveedor')
			{

				if($documento_proveedor_session->bigidproveedorActual!=null && $documento_proveedor_session->bigidproveedorActual!=0)
				{
					$this->id_proveedorFK_Idproveedor=$documento_proveedor_session->bigidproveedorActual;
					$documento_proveedor_session->bigidproveedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_proveedorLogic->getsFK_Idproveedor($finalQueryPaginacion,$this->pagination,$this->id_proveedorFK_Idproveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//documento_proveedorLogicAdditional::getDetalleIndiceFK_Idproveedor($this->id_proveedorFK_Idproveedor);


					if($this->documento_proveedorLogic->getdocumento_proveedors()==null || count($this->documento_proveedorLogic->getdocumento_proveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$documento_proveedors=$this->documento_proveedorLogic->getdocumento_proveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->documento_proveedorLogic->getsFK_Idproveedor('',$this->pagination,$this->id_proveedorFK_Idproveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->documento_proveedorsReporte=$this->documento_proveedorLogic->getdocumento_proveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedocumento_proveedors("FK_Idproveedor",$this->documento_proveedorLogic->getdocumento_proveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->documento_proveedorLogic->setdocumento_proveedors($documento_proveedors);
					}
				//}

			} 
		
		$documento_proveedor_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$documento_proveedor_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->documento_proveedorLogic->loadForeignsKeysDescription();*/
		
		$this->documento_proveedors=$this->documento_proveedorLogic->getdocumento_proveedors();
		
		if($this->documento_proveedorsEliminados==null) {
			$this->documento_proveedorsEliminados=array();
		}
		
		$this->Session->write(documento_proveedor_util::$STR_SESSION_NAME.'Lista',serialize($this->documento_proveedors));
		$this->Session->write(documento_proveedor_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->documento_proveedorsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(documento_proveedor_util::$STR_SESSION_NAME,serialize($documento_proveedor_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->iddocumento_proveedor=$idGeneral;
			
			$this->intNumeroPaginacion=documento_proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
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
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}

			if(count($this->documento_proveedors) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdproveedorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=documento_proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_proveedorFK_Idproveedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproveedor','cmbid_proveedor');

			$this->strAccionBusqueda='FK_Idproveedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idproveedor($strFinalQuery,$id_proveedor)
	{
		try
		{

			$this->documento_proveedorLogic->getsFK_Idproveedor($strFinalQuery,new Pagination(),$id_proveedor);
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
			
			
			$documento_proveedorForeignKey=new documento_proveedor_param_return(); //documento_proveedorForeignKey();
			
			$documento_proveedor_session=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME));
						
			if($documento_proveedor_session==null) {
				$documento_proveedor_session=new documento_proveedor_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$documento_proveedorForeignKey=$this->documento_proveedorLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$documento_proveedor_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$this->strRecargarFkTipos,',')) {
				$this->proveedorsFK=$documento_proveedorForeignKey->proveedorsFK;
				$this->idproveedorDefaultFK=$documento_proveedorForeignKey->idproveedorDefaultFK;
			}

			if($documento_proveedor_session->bitBusquedaDesdeFKSesionproveedor) {
				$this->setVisibleBusquedasParaproveedor(true);
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
	
	function cargarCombosFKFromReturnGeneral($documento_proveedorReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$documento_proveedorReturnGeneral->strRecargarFkTipos;
			
			


			if($documento_proveedorReturnGeneral->con_proveedorsFK==true) {
				$this->proveedorsFK=$documento_proveedorReturnGeneral->proveedorsFK;
				$this->idproveedorDefaultFK=$documento_proveedorReturnGeneral->idproveedorDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(documento_proveedor_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$documento_proveedor_session=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME));
		
		if($documento_proveedor_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($documento_proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==proveedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='proveedor';
			}
			
			$documento_proveedor_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}						
			
			$this->documento_proveedorsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->documento_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->documento_proveedorsAuxiliar=array();
			}
			
			if(count($this->documento_proveedorsAuxiliar) > 0) {
				
				foreach ($this->documento_proveedorsAuxiliar as $documento_proveedorSeleccionado) {
					$this->eliminarTablaBase($documento_proveedorSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('documento_cliente');
			$tipoRelacionReporte->setsDescripcion('Documentos Clienteses');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=documento_cliente_util::$STR_NOMBRE_CLASE;
		
		return $arrNombresClasesRelacionadasLocal;
	}
	
	
	public function setstrRecargarFkInicializar() {
		$this->setstrRecargarFk('TODOS','NINGUNO',0,'');		
	}
	
	
	
	public function getproveedorsFKListSelectItem() 
	{
		$proveedorsList=array();

		$item=null;

		foreach($this->proveedorsFK as $proveedor)
		{
			$item=new SelectItem();
			$item->setLabel($proveedor->getnombre_completo());
			$item->setValue($proveedor->getId());
			$proveedorsList[]=$item;
		}

		return $proveedorsList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=documento_proveedor_util::$INT_NUMERO_PAGINACION;
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
				$this->documento_proveedorLogic->commitNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->rollbackNewConnexionToDeep();
				$this->documento_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$documento_proveedorsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->documento_proveedors as $documento_proveedorLocal) {
				if($documento_proveedorLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->documento_proveedor=new documento_proveedor();
				
				$this->documento_proveedor->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->documento_proveedors[]=$this->documento_proveedor;*/
				
				$documento_proveedorsNuevos[]=$this->documento_proveedor;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('proveedor');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->documento_proveedorLogic->setdocumento_proveedors($documento_proveedorsNuevos);
					
				$this->documento_proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($documento_proveedorsNuevos as $documento_proveedorNuevo) {
					$this->documento_proveedors[]=$documento_proveedorNuevo;
				}
				
				/*$this->documento_proveedors[]=$documento_proveedorsNuevos;*/
				
				$this->documento_proveedorLogic->setdocumento_proveedors($this->documento_proveedors);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($documento_proveedorsNuevos!=null);
	}
					
	
	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery=''){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$this->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$documento_proveedor_session=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME));

		if($documento_proveedor_session==null) {
			$documento_proveedor_session=new documento_proveedor_session();
		}
		
		if($documento_proveedor_session->bitBusquedaDesdeFKSesionproveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=proveedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalproveedor=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproveedor=Funciones::GetFinalQueryAppend($finalQueryGlobalproveedor, '');
				$finalQueryGlobalproveedor.=proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproveedor.$strRecargarFkQuery;		

				$proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosproveedorsFK($proveedorLogic->getproveedors());

		} else {
			$this->setVisibleBusquedasParaproveedor(true);


			if($documento_proveedor_session->bigidproveedorActual!=null && $documento_proveedor_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($documento_proveedor_session->bigidproveedorActual);//WithConnection

				$this->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=documento_proveedor_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$this->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	
	
	public function prepararCombosproveedorsFK($proveedors){

		foreach ($proveedors as $proveedorLocal ) {
			if($this->idproveedorDefaultFK==0) {
				$this->idproveedorDefaultFK=$proveedorLocal->getId();
			}

			$this->proveedorsFK[$proveedorLocal->getId()]=documento_proveedor_util::getproveedorDescripcion($proveedorLocal);
		}
	}

	
	
	public function cargarDescripcionproveedorFK($idproveedor,$connexion=null){
		$proveedorLogic= new proveedor_logic();
		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$strDescripcionproveedor='';

		if($idproveedor!=null && $idproveedor!='' && $idproveedor!='null') {
			if($connexion!=null) {
				$proveedorLogic->getEntity($idproveedor);//WithConnection
			} else {
				$proveedorLogic->getEntityWithConnection($idproveedor);//
			}

			$strDescripcionproveedor=documento_proveedor_util::getproveedorDescripcion($proveedorLogic->getproveedor());

		} else {
			$strDescripcionproveedor='null';
		}

		return $strDescripcionproveedor;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(documento_proveedor $documento_proveedorClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParaproveedor($isParaproveedor){
		$strParaVisibleproveedor='display:table-row';
		$strParaVisibleNegacionproveedor='display:none';

		if($isParaproveedor) {
			$strParaVisibleproveedor='display:table-row';
			$strParaVisibleNegacionproveedor='display:none';
		} else {
			$strParaVisibleproveedor='display:none';
			$strParaVisibleNegacionproveedor='display:table-row';
		}


		$strParaVisibleNegacionproveedor=trim($strParaVisibleNegacionproveedor);

		$this->strVisibleFK_Idproveedor=$strParaVisibleproveedor;
	}
	
	

	public function abrirBusquedaParaproveedor() {//$iddocumento_proveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddocumento_proveedorActual=$iddocumento_proveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.proveedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.documento_proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_proveedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.documento_proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_proveedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliardocumento_proveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParadocumento_clientees(int $iddocumento_proveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->iddocumento_proveedorActual=$iddocumento_proveedorActual;

		$bitPaginaPopupdocumento_cliente=false;

		try {

			$documento_proveedor_session=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME));

			if($documento_proveedor_session==null) {
				$documento_proveedor_session=new documento_proveedor_session();
			}

			$documento_cliente_session=unserialize($this->Session->read(documento_cliente_util::$STR_SESSION_NAME));

			if($documento_cliente_session==null) {
				$documento_cliente_session=new documento_cliente_session();
			}

			$documento_cliente_session->strUltimaBusqueda='FK_Iddocumento_proveedor';
			$documento_cliente_session->strPathNavegacionActual=$documento_proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.documento_cliente_util::$STR_CLASS_WEB_TITULO;
			$documento_cliente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupdocumento_cliente=$documento_cliente_session->bitPaginaPopup;
			$documento_cliente_session->setPaginaPopupVariables(true);
			$bitPaginaPopupdocumento_cliente=$documento_cliente_session->bitPaginaPopup;
			$documento_cliente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$documento_cliente_session->strNombrePaginaNavegacionHaciaFKDesde=documento_proveedor_util::$STR_NOMBRE_OPCION;
			$documento_cliente_session->bitBusquedaDesdeFKSesiondocumento_proveedor=true;
			$documento_cliente_session->bigiddocumento_proveedorActual=$this->iddocumento_proveedorActual;

			$documento_proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$documento_proveedor_session->bigIdActualFK=$this->iddocumento_proveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"documento_cliente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=documento_proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"documento_cliente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(documento_proveedor_util::$STR_SESSION_NAME,serialize($documento_proveedor_session));
			$this->Session->write(documento_cliente_util::$STR_SESSION_NAME,serialize($documento_cliente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupdocumento_cliente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',documento_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(documento_cliente_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliardocumento_proveedor,$this->strTipoUsuarioAuxiliardocumento_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',documento_cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(documento_cliente_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliardocumento_proveedor,$this->strTipoUsuarioAuxiliardocumento_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(documento_proveedor_util::$STR_SESSION_NAME,documento_proveedor_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$documento_proveedor_session=$this->Session->read(documento_proveedor_util::$STR_SESSION_NAME);
				
		if($documento_proveedor_session==null) {
			$documento_proveedor_session=new documento_proveedor_session();		
			//$this->Session->write('documento_proveedor_session',$documento_proveedor_session);							
		}
		*/
		
		$documento_proveedor_session=new documento_proveedor_session();
    	$documento_proveedor_session->strPathNavegacionActual=documento_proveedor_util::$STR_CLASS_WEB_TITULO;
    	$documento_proveedor_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(documento_proveedor_util::$STR_SESSION_NAME,serialize($documento_proveedor_session));		
	}	
	
	public function getSetBusquedasSesionConfig(documento_proveedor_session $documento_proveedor_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($documento_proveedor_session->bitBusquedaDesdeFKSesionFK!=null && $documento_proveedor_session->bitBusquedaDesdeFKSesionFK==true) {
			if($documento_proveedor_session->bigIdActualFK!=null && $documento_proveedor_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$documento_proveedor_session->bigIdActualFKParaPosibleAtras=$documento_proveedor_session->bigIdActualFK;*/
			}
				
			$documento_proveedor_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$documento_proveedor_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(documento_proveedor_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($documento_proveedor_session->bitBusquedaDesdeFKSesionproveedor!=null && $documento_proveedor_session->bitBusquedaDesdeFKSesionproveedor==true)
			{
				if($documento_proveedor_session->bigidproveedorActual!=0) {
					$this->strAccionBusqueda='FK_Idproveedor';

					$existe_history=HistoryWeb::ExisteElemento(documento_proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(documento_proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(documento_proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($documento_proveedor_session->bigidproveedorActualDescripcion);
						$historyWeb->setIdActual($documento_proveedor_session->bigidproveedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=documento_proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$documento_proveedor_session->bigidproveedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$documento_proveedor_session->bitBusquedaDesdeFKSesionproveedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=documento_proveedor_util::$INT_NUMERO_PAGINACION;

				if($documento_proveedor_session->intNumeroPaginacion==documento_proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=documento_proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$documento_proveedor_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$documento_proveedor_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$documento_proveedor_session=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME));
		
		if($documento_proveedor_session==null) {
			$documento_proveedor_session=new documento_proveedor_session();
		}
		
		$documento_proveedor_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$documento_proveedor_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$documento_proveedor_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idproveedor') {
			$documento_proveedor_session->id_proveedor=$this->id_proveedorFK_Idproveedor;	

		}
		
		$this->Session->write(documento_proveedor_util::$STR_SESSION_NAME,serialize($documento_proveedor_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(documento_proveedor_session $documento_proveedor_session) {
		
		if($documento_proveedor_session==null) {
			$documento_proveedor_session=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME));
		}
		
		if($documento_proveedor_session==null) {
		   $documento_proveedor_session=new documento_proveedor_session();
		}
		
		if($documento_proveedor_session->strUltimaBusqueda!=null && $documento_proveedor_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$documento_proveedor_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$documento_proveedor_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$documento_proveedor_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idproveedor') {
				$this->id_proveedorFK_Idproveedor=$documento_proveedor_session->id_proveedor;
				$documento_proveedor_session->id_proveedor=-1;

			}
		}
		
		$documento_proveedor_session->strUltimaBusqueda='';
		//$documento_proveedor_session->intNumeroPaginacion=10;
		$documento_proveedor_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(documento_proveedor_util::$STR_SESSION_NAME,serialize($documento_proveedor_session));		
	}
	
	public function documento_proveedorsControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idproveedorDefaultFK = 0;
	}
	
	public function setdocumento_proveedorFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_proveedor',$this->idproveedorDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		proveedor::$class;
		proveedor_carga::$CONTROLLER;
		
		//REL
		

		documento_cliente_carga::$CONTROLLER;
		documento_cliente_util::$STR_SCHEMA;
		documento_cliente_session::class;
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
		interface documento_proveedor_controlI {	
		
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
		
		public function onLoad(documento_proveedor_session $documento_proveedor_session=null);	
		function index(?string $strTypeOnLoaddocumento_proveedor='',?string $strTipoPaginaAuxiliardocumento_proveedor='',?string $strTipoUsuarioAuxiliardocumento_proveedor='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoaddocumento_proveedor='',string $strTipoPaginaAuxiliardocumento_proveedor='',string $strTipoUsuarioAuxiliardocumento_proveedor='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($documento_proveedorReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(documento_proveedor $documento_proveedorClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(documento_proveedor_session $documento_proveedor_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(documento_proveedor_session $documento_proveedor_session);	
		public function documento_proveedorsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setdocumento_proveedorFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
