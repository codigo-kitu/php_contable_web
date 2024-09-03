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

namespace com\bydan\contabilidad\inventario\inventario_fisico\presentation\control;

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

use com\bydan\contabilidad\inventario\inventario_fisico\business\entity\inventario_fisico;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/inventario_fisico/util/inventario_fisico_carga.php');
use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_carga;

use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_util;
use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_param_return;
use com\bydan\contabilidad\inventario\inventario_fisico\business\logic\inventario_fisico_logic;
use com\bydan\contabilidad\inventario\inventario_fisico\presentation\session\inventario_fisico_session;


//FK


use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

//REL


use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_carga;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_util;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\presentation\session\inventario_fisico_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
inventario_fisico_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
inventario_fisico_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
inventario_fisico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
inventario_fisico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*inventario_fisico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/inventario/inventario_fisico/presentation/control/inventario_fisico_init_control.php');
use com\bydan\contabilidad\inventario\inventario_fisico\presentation\control\inventario_fisico_init_control;

include_once('com/bydan/contabilidad/inventario/inventario_fisico/presentation/control/inventario_fisico_base_control.php');
use com\bydan\contabilidad\inventario\inventario_fisico\presentation\control\inventario_fisico_base_control;

class inventario_fisico_control extends inventario_fisico_base_control {	
	
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
			else if($action=='abrirArbol') {
				$this->abrirArbolAction();
			}
			else if($action=='cargarArbol') {
				$this->cargarArbolAction();
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
			else if($action=='registrarSesionParainventario_fisico_detalles' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idinventario_fisicoActual=$this->getDataId();
				$this->registrarSesionParainventario_fisico_detalles($idinventario_fisicoActual);
			}
			else if($action=='registrarSesionParainventario_fisicos' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idinventario_fisicoActual=$this->getDataId();
				$this->registrarSesionParainventario_fisicos($idinventario_fisicoActual);
			} 
			
			
			else if($action=="FK_Idbodega"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdbodegaParaProcesar();
			}
			else if($action=="FK_Idinventario_fisico"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idinventario_fisicoParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParainventario_fisico') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idinventario_fisicoActual=$this->getDataId();
				$this->abrirBusquedaParainventario_fisico();//$idinventario_fisicoActual
			}
			else if($action=='abrirBusquedaParabodega') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idinventario_fisicoActual=$this->getDataId();
				$this->abrirBusquedaParabodega();//$idinventario_fisicoActual
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
					
					$inventario_fisicoController = new inventario_fisico_control();
					
					$inventario_fisicoController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($inventario_fisicoController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$inventario_fisicoController = new inventario_fisico_control();
						$inventario_fisicoController = $this;
						
						$jsonResponse = json_encode($inventario_fisicoController->inventario_fisicos);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->inventario_fisicoReturnGeneral==null) {
					$this->inventario_fisicoReturnGeneral=new inventario_fisico_param_return();
				}
				
				echo($this->inventario_fisicoReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$inventario_fisicoController=new inventario_fisico_control();
		
		$inventario_fisicoController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$inventario_fisicoController->usuarioActual=new usuario();
		
		$inventario_fisicoController->usuarioActual->setId($this->usuarioActual->getId());
		$inventario_fisicoController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$inventario_fisicoController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$inventario_fisicoController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$inventario_fisicoController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$inventario_fisicoController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$inventario_fisicoController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$inventario_fisicoController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $inventario_fisicoController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadinventario_fisico= $this->getDataGeneralString('strTypeOnLoadinventario_fisico');
		$strTipoPaginaAuxiliarinventario_fisico= $this->getDataGeneralString('strTipoPaginaAuxiliarinventario_fisico');
		$strTipoUsuarioAuxiliarinventario_fisico= $this->getDataGeneralString('strTipoUsuarioAuxiliarinventario_fisico');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadinventario_fisico,$strTipoPaginaAuxiliarinventario_fisico,$strTipoUsuarioAuxiliarinventario_fisico,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadinventario_fisico!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('inventario_fisico','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(inventario_fisico_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarinventario_fisico,$this->strTipoUsuarioAuxiliarinventario_fisico,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(inventario_fisico_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarinventario_fisico,$this->strTipoUsuarioAuxiliarinventario_fisico,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->inventario_fisicoReturnGeneral=new inventario_fisico_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->inventario_fisicoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->inventario_fisicoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->inventario_fisicoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->inventario_fisicoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->inventario_fisicoReturnGeneral);
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
		$this->inventario_fisicoReturnGeneral=new inventario_fisico_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->inventario_fisicoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->inventario_fisicoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->inventario_fisicoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->inventario_fisicoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->inventario_fisicoReturnGeneral);
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
		$this->inventario_fisicoReturnGeneral=new inventario_fisico_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->inventario_fisicoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->inventario_fisicoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->inventario_fisicoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->inventario_fisicoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->inventario_fisicoReturnGeneral);
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
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
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
			
			
			$this->inventario_fisicoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->inventario_fisicoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->inventario_fisicoReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->inventario_fisicoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->inventario_fisicoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->inventario_fisicoReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function abrirArbolAction() {
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
		$this->abrirArbol();
	}
	
	public function cargarArbolAction() {
		$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
		$this->cargarArbol();
	}
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->inventario_fisicoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->inventario_fisicoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->inventario_fisicoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->inventario_fisicoReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->inventario_fisicoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->inventario_fisicoReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->inventario_fisicoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->inventario_fisicoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->inventario_fisicoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->inventario_fisicoReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->inventario_fisicoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->inventario_fisicoReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
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
		
		$this->inventario_fisicoLogic=new inventario_fisico_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->inventario_fisico=new inventario_fisico();
		
		$this->strTypeOnLoadinventario_fisico='onload';
		$this->strTipoPaginaAuxiliarinventario_fisico='none';
		$this->strTipoUsuarioAuxiliarinventario_fisico='none';	

		$this->intNumeroPaginacion=inventario_fisico_util::$INT_NUMERO_PAGINACION;
		
		$this->inventario_fisicoModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->inventario_fisicoControllerAdditional=new inventario_fisico_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(inventario_fisico_session $inventario_fisico_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($inventario_fisico_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadinventario_fisico='',?string $strTipoPaginaAuxiliarinventario_fisico='',?string $strTipoUsuarioAuxiliarinventario_fisico='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadinventario_fisico=$strTypeOnLoadinventario_fisico;
			$this->strTipoPaginaAuxiliarinventario_fisico=$strTipoPaginaAuxiliarinventario_fisico;
			$this->strTipoUsuarioAuxiliarinventario_fisico=$strTipoUsuarioAuxiliarinventario_fisico;
	
			if($strTipoUsuarioAuxiliarinventario_fisico=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->inventario_fisico=new inventario_fisico();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Inventario Fisicos';
			
			
			$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));
							
			if($inventario_fisico_session==null) {
				$inventario_fisico_session=new inventario_fisico_session();
				
				/*$this->Session->write('inventario_fisico_session',$inventario_fisico_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($inventario_fisico_session->strFuncionJsPadre!=null && $inventario_fisico_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$inventario_fisico_session->strFuncionJsPadre;
				
				$inventario_fisico_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($inventario_fisico_session);
			
			if($strTypeOnLoadinventario_fisico!=null && $strTypeOnLoadinventario_fisico=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$inventario_fisico_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$inventario_fisico_session->setPaginaPopupVariables(true);
				}
				
				if($inventario_fisico_session->intNumeroPaginacion==inventario_fisico_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=inventario_fisico_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$inventario_fisico_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,inventario_fisico_util::$STR_SESSION_NAME,'inventario');																
			
			} else if($strTypeOnLoadinventario_fisico!=null && $strTypeOnLoadinventario_fisico=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$inventario_fisico_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=inventario_fisico_util::$INT_NUMERO_PAGINACION;*/
				
				if($inventario_fisico_session->intNumeroPaginacion==inventario_fisico_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=inventario_fisico_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$inventario_fisico_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarinventario_fisico!=null && $strTipoPaginaAuxiliarinventario_fisico=='none') {
				/*$inventario_fisico_session->strStyleDivHeader='display:table-row';*/
				
				/*$inventario_fisico_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarinventario_fisico!=null && $strTipoPaginaAuxiliarinventario_fisico=='iframe') {
					/*
					$inventario_fisico_session->strStyleDivArbol='display:none';
					$inventario_fisico_session->strStyleDivHeader='display:none';
					$inventario_fisico_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$inventario_fisico_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->inventario_fisicoClase=new inventario_fisico();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=inventario_fisico_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(inventario_fisico_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->inventario_fisicoLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->inventario_fisicoLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$inventariofisicodetalleLogic=new inventario_fisico_detalle_logic();
			//$inventariofisicoLogic=new inventario_fisico_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->inventario_fisicoLogic=new inventario_fisico_logic();*/
			
			
			$this->inventario_fisicosModel=null;
			/*new ListDataModel();*/
			
			/*$this->inventario_fisicosModel.setWrappedData(inventario_fisicoLogic->getinventario_fisicos());*/
						
			$this->inventario_fisicos= array();
			$this->inventario_fisicosEliminados=array();
			$this->inventario_fisicosSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= inventario_fisico_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= inventario_fisico_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->inventario_fisico= new inventario_fisico();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idbodega='display:table-row';
			$this->strVisibleFK_Idinventario_fisico='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarinventario_fisico!=null && $strTipoUsuarioAuxiliarinventario_fisico!='none' && $strTipoUsuarioAuxiliarinventario_fisico!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarinventario_fisico);
																
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
				if($strTipoUsuarioAuxiliarinventario_fisico!=null && $strTipoUsuarioAuxiliarinventario_fisico!='none' && $strTipoUsuarioAuxiliarinventario_fisico!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarinventario_fisico);
																
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
				if($strTipoUsuarioAuxiliarinventario_fisico==null || $strTipoUsuarioAuxiliarinventario_fisico=='none' || $strTipoUsuarioAuxiliarinventario_fisico=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarinventario_fisico,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, inventario_fisico_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, inventario_fisico_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina inventario_fisico');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($inventario_fisico_session);
			
			$this->getSetBusquedasSesionConfig($inventario_fisico_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteinventario_fisicos($this->strAccionBusqueda,$this->inventario_fisicoLogic->getinventario_fisicos());*/
				} else if($this->strGenerarReporte=='Html')	{
					$inventario_fisico_session->strServletGenerarHtmlReporte='inventario_fisicoServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(inventario_fisico_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(inventario_fisico_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($inventario_fisico_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarinventario_fisico!=null && $strTipoUsuarioAuxiliarinventario_fisico=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($inventario_fisico_session);
			}
								
			$this->set(inventario_fisico_util::$STR_SESSION_NAME, $inventario_fisico_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($inventario_fisico_session);
			
			/*
			$this->inventario_fisico->recursive = 0;
			
			$this->inventario_fisicos=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('inventario_fisicos', $this->inventario_fisicos);
			
			$this->set(inventario_fisico_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->inventario_fisicoActual =$this->inventario_fisicoClase;
			
			/*$this->inventario_fisicoActual =$this->migrarModelinventario_fisico($this->inventario_fisicoClase);*/
			
			$this->returnHtml(false);
			
			$this->set(inventario_fisico_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=inventario_fisico_util::$STR_NOMBRE_OPCION;
				
			if(inventario_fisico_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=inventario_fisico_util::$STR_MODULO_OPCION.inventario_fisico_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(inventario_fisico_util::$STR_SESSION_NAME,serialize($inventario_fisico_session));
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
			/*$inventario_fisicoClase= (inventario_fisico) inventario_fisicosModel.getRowData();*/
			
			$this->inventario_fisicoClase->setId($this->inventario_fisico->getId());	
			$this->inventario_fisicoClase->setVersionRow($this->inventario_fisico->getVersionRow());	
			$this->inventario_fisicoClase->setVersionRow($this->inventario_fisico->getVersionRow());	
			$this->inventario_fisicoClase->setid_inventario_fisico($this->inventario_fisico->getid_inventario_fisico());	
			$this->inventario_fisicoClase->setid_bodega($this->inventario_fisico->getid_bodega());	
			$this->inventario_fisicoClase->setfecha($this->inventario_fisico->getfecha());	
			$this->inventario_fisicoClase->setdescripcion($this->inventario_fisico->getdescripcion());	
			$this->inventario_fisicoClase->setid_almacen($this->inventario_fisico->getid_almacen());	
			$this->inventario_fisicoClase->setprod_cont_almacen($this->inventario_fisico->getprod_cont_almacen());	
			$this->inventario_fisicoClase->settotal_productos_almacen($this->inventario_fisico->gettotal_productos_almacen());	
			$this->inventario_fisicoClase->setcampo1($this->inventario_fisico->getcampo1());	
			$this->inventario_fisicoClase->setcampo2($this->inventario_fisico->getcampo2());	
			$this->inventario_fisicoClase->setcampo3($this->inventario_fisico->getcampo3());	
		
			/*$this->Session->write('inventario_fisicoVersionRowActual', inventario_fisico.getVersionRow());*/
			
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
			
			$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));
						
			if($inventario_fisico_session==null) {
				$inventario_fisico_session=new inventario_fisico_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('inventario_fisico', $this->inventario_fisico->read(null, $id));
	
			
			$this->inventario_fisico->recursive = 0;
			
			$this->inventario_fisicos=$this->paginate();
			
			$this->set('inventario_fisicos', $this->inventario_fisicos);
	
			if (empty($this->data)) {
				$this->data = $this->inventario_fisico->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->inventario_fisicoLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->inventario_fisicoClase);
			
			$this->inventario_fisicoActual=$this->inventario_fisicoClase;
			
			/*$this->inventario_fisicoActual =$this->migrarModelinventario_fisico($this->inventario_fisicoClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->inventario_fisicoLogic->getinventario_fisicos(),$this->inventario_fisicoActual);
			
			$this->actualizarControllerConReturnGeneral($this->inventario_fisicoReturnGeneral);
			
			//$this->inventario_fisicoReturnGeneral=$this->inventario_fisicoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->inventario_fisicoLogic->getinventario_fisicos(),$this->inventario_fisicoActual,$this->inventario_fisicoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));
						
			if($inventario_fisico_session==null) {
				$inventario_fisico_session=new inventario_fisico_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoinventario_fisico', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->inventario_fisicoClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->inventario_fisicoClase);
			
			$this->inventario_fisicoActual =$this->inventario_fisicoClase;
			
			/*$this->inventario_fisicoActual =$this->migrarModelinventario_fisico($this->inventario_fisicoClase);*/
			
			$this->setinventario_fisicoFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->inventario_fisicoLogic->getinventario_fisicos(),$this->inventario_fisico);
			
			$this->actualizarControllerConReturnGeneral($this->inventario_fisicoReturnGeneral);
			
			//this->inventario_fisicoReturnGeneral=$this->inventario_fisicoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->inventario_fisicoLogic->getinventario_fisicos(),$this->inventario_fisico,$this->inventario_fisicoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idinventario_fisicoDefaultFK!=null && $this->idinventario_fisicoDefaultFK > -1) {
				$this->inventario_fisicoReturnGeneral->getinventario_fisico()->setid_inventario_fisico($this->idinventario_fisicoDefaultFK);
			}

			if($this->idbodegaDefaultFK!=null && $this->idbodegaDefaultFK > -1) {
				$this->inventario_fisicoReturnGeneral->getinventario_fisico()->setid_bodega($this->idbodegaDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->inventario_fisicoReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->inventario_fisicoReturnGeneral->getinventario_fisico(),$this->inventario_fisicoActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyinventario_fisico($this->inventario_fisicoReturnGeneral->getinventario_fisico());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioinventario_fisico($this->inventario_fisicoReturnGeneral->getinventario_fisico());*/
			}
			
			if($this->inventario_fisicoReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->inventario_fisicoReturnGeneral->getinventario_fisico(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualinventario_fisico($this->inventario_fisico,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->inventario_fisicosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->inventario_fisicosAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->inventario_fisicosAuxiliar=array();
			}
			
			if(count($this->inventario_fisicosAuxiliar)==2) {
				$inventario_fisicoOrigen=$this->inventario_fisicosAuxiliar[0];
				$inventario_fisicoDestino=$this->inventario_fisicosAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($inventario_fisicoOrigen,$inventario_fisicoDestino,true,false,false);
				
				$this->actualizarLista($inventario_fisicoDestino,$this->inventario_fisicos);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->inventario_fisicosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->inventario_fisicosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->inventario_fisicosAuxiliar=array();
			}
			
			if(count($this->inventario_fisicosAuxiliar) > 0) {
				foreach ($this->inventario_fisicosAuxiliar as $inventario_fisicoSeleccionado) {
					$this->inventario_fisico=new inventario_fisico();
					
					$this->setCopiarVariablesObjetos($inventario_fisicoSeleccionado,$this->inventario_fisico,true,true,false);
						
					$this->inventario_fisicos[]=$this->inventario_fisico;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->inventario_fisicosEliminados as $inventario_fisicoEliminado) {
				$this->inventario_fisicoLogic->inventario_fisicos[]=$inventario_fisicoEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->inventario_fisico=new inventario_fisico();
							
				$this->inventario_fisicos[]=$this->inventario_fisico;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
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
		
		$inventario_fisicoActual=new inventario_fisico();
		
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
				
				$inventario_fisicoActual=$this->inventario_fisicos[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $inventario_fisicoActual->setid_inventario_fisico((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $inventario_fisicoActual->setid_bodega((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $inventario_fisicoActual->setfecha(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $inventario_fisicoActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $inventario_fisicoActual->setid_almacen((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $inventario_fisicoActual->setprod_cont_almacen((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $inventario_fisicoActual->settotal_productos_almacen((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $inventario_fisicoActual->setcampo1($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $inventario_fisicoActual->setcampo2((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $inventario_fisicoActual->setcampo3($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->inventario_fisicosAuxiliar=array();		 
		/*$this->inventario_fisicosEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->inventario_fisicosAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->inventario_fisicosAuxiliar=array();
		}
			
		if(count($this->inventario_fisicosAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->inventario_fisicosAuxiliar as $inventario_fisicoAuxLocal) {				
				
				foreach($this->inventario_fisicos as $inventario_fisicoLocal) {
					if($inventario_fisicoLocal->getId()==$inventario_fisicoAuxLocal->getId()) {
						$inventario_fisicoLocal->setIsDeleted(true);
						
						/*$this->inventario_fisicosEliminados[]=$inventario_fisicoLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->inventario_fisicoLogic->setinventario_fisicos($this->inventario_fisicos);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
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
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=inventario_fisico_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadinventario_fisico='',string $strTipoPaginaAuxiliarinventario_fisico='',string $strTipoUsuarioAuxiliarinventario_fisico='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadinventario_fisico,$strTipoPaginaAuxiliarinventario_fisico,$strTipoUsuarioAuxiliarinventario_fisico,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->inventario_fisicos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=inventario_fisico_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=inventario_fisico_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=inventario_fisico_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));
						
			if($inventario_fisico_session==null) {
				$inventario_fisico_session=new inventario_fisico_session();
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
					/*$this->intNumeroPaginacion=inventario_fisico_util::$INT_NUMERO_PAGINACION;*/
					
					if($inventario_fisico_session->intNumeroPaginacion==inventario_fisico_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=inventario_fisico_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$inventario_fisico_session->intNumeroPaginacion;
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
			
			$this->inventario_fisicosEliminados=array();
			
			/*$this->inventario_fisicoLogic->setConnexion($connexion);*/
			
			$this->inventario_fisicoLogic->setIsConDeep(true);
			
			$this->inventario_fisicoLogic->getinventario_fisicoDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('inventario_fisico');$classes[]=$class;
			$class=new Classe('bodega');$classes[]=$class;
			
			$this->inventario_fisicoLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->inventario_fisicoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->inventario_fisicoLogic->getinventario_fisicos()==null|| count($this->inventario_fisicoLogic->getinventario_fisicos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->inventario_fisicos=$this->inventario_fisicoLogic->getinventario_fisicos();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->inventario_fisicoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->inventario_fisicosReporte=$this->inventario_fisicoLogic->getinventario_fisicos();
									
						/*$this->generarReportes('Todos',$this->inventario_fisicoLogic->getinventario_fisicos());*/
					
						$this->inventario_fisicoLogic->setinventario_fisicos($this->inventario_fisicos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->inventario_fisicoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->inventario_fisicoLogic->getinventario_fisicos()==null|| count($this->inventario_fisicoLogic->getinventario_fisicos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->inventario_fisicos=$this->inventario_fisicoLogic->getinventario_fisicos();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->inventario_fisicoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->inventario_fisicosReporte=$this->inventario_fisicoLogic->getinventario_fisicos();
									
						/*$this->generarReportes('Todos',$this->inventario_fisicoLogic->getinventario_fisicos());*/
					
						$this->inventario_fisicoLogic->setinventario_fisicos($this->inventario_fisicos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idinventario_fisico=0;*/
				
				if($inventario_fisico_session->bitBusquedaDesdeFKSesionFK!=null && $inventario_fisico_session->bitBusquedaDesdeFKSesionFK==true) {
					if($inventario_fisico_session->bigIdActualFK!=null && $inventario_fisico_session->bigIdActualFK!=0)	{
						$this->idinventario_fisico=$inventario_fisico_session->bigIdActualFK;	
					}
					
					$inventario_fisico_session->bitBusquedaDesdeFKSesionFK=false;
					
					$inventario_fisico_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idinventario_fisico=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idinventario_fisico=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->inventario_fisicoLogic->getEntity($this->idinventario_fisico);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*inventario_fisicoLogicAdditional::getDetalleIndicePorId($idinventario_fisico);*/

				
				if($this->inventario_fisicoLogic->getinventario_fisico()!=null) {
					$this->inventario_fisicoLogic->setinventario_fisicos(array());
					$this->inventario_fisicoLogic->inventario_fisicos[]=$this->inventario_fisicoLogic->getinventario_fisico();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idbodega')
			{

				if($inventario_fisico_session->bigidbodegaActual!=null && $inventario_fisico_session->bigidbodegaActual!=0)
				{
					$this->id_bodegaFK_Idbodega=$inventario_fisico_session->bigidbodegaActual;
					$inventario_fisico_session->bigidbodegaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->inventario_fisicoLogic->getsFK_Idbodega($finalQueryPaginacion,$this->pagination,$this->id_bodegaFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//inventario_fisicoLogicAdditional::getDetalleIndiceFK_Idbodega($this->id_bodegaFK_Idbodega);


					if($this->inventario_fisicoLogic->getinventario_fisicos()==null || count($this->inventario_fisicoLogic->getinventario_fisicos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$inventario_fisicos=$this->inventario_fisicoLogic->getinventario_fisicos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->inventario_fisicoLogic->getsFK_Idbodega('',$this->pagination,$this->id_bodegaFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->inventario_fisicosReporte=$this->inventario_fisicoLogic->getinventario_fisicos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteinventario_fisicos("FK_Idbodega",$this->inventario_fisicoLogic->getinventario_fisicos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->inventario_fisicoLogic->setinventario_fisicos($inventario_fisicos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idinventario_fisico')
			{

				if($inventario_fisico_session->bigidinventario_fisicoActual!=null && $inventario_fisico_session->bigidinventario_fisicoActual!=0)
				{
					$this->id_inventario_fisicoFK_Idinventario_fisico=$inventario_fisico_session->bigidinventario_fisicoActual;
					$inventario_fisico_session->bigidinventario_fisicoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->inventario_fisicoLogic->getsFK_Idinventario_fisico($finalQueryPaginacion,$this->pagination,$this->id_inventario_fisicoFK_Idinventario_fisico);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//inventario_fisicoLogicAdditional::getDetalleIndiceFK_Idinventario_fisico($this->id_inventario_fisicoFK_Idinventario_fisico);


					if($this->inventario_fisicoLogic->getinventario_fisicos()==null || count($this->inventario_fisicoLogic->getinventario_fisicos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$inventario_fisicos=$this->inventario_fisicoLogic->getinventario_fisicos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->inventario_fisicoLogic->getsFK_Idinventario_fisico('',$this->pagination,$this->id_inventario_fisicoFK_Idinventario_fisico);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->inventario_fisicosReporte=$this->inventario_fisicoLogic->getinventario_fisicos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteinventario_fisicos("FK_Idinventario_fisico",$this->inventario_fisicoLogic->getinventario_fisicos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->inventario_fisicoLogic->setinventario_fisicos($inventario_fisicos);
					}
				//}

			} 
		
		$inventario_fisico_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$inventario_fisico_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->inventario_fisicoLogic->loadForeignsKeysDescription();*/
		
		$this->inventario_fisicos=$this->inventario_fisicoLogic->getinventario_fisicos();
		
		if($this->inventario_fisicosEliminados==null) {
			$this->inventario_fisicosEliminados=array();
		}
		
		$this->Session->write(inventario_fisico_util::$STR_SESSION_NAME.'Lista',serialize($this->inventario_fisicos));
		$this->Session->write(inventario_fisico_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->inventario_fisicosEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(inventario_fisico_util::$STR_SESSION_NAME,serialize($inventario_fisico_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idinventario_fisico=$idGeneral;
			
			$this->intNumeroPaginacion=inventario_fisico_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
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
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}

			if(count($this->inventario_fisicos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdbodegaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=inventario_fisico_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_bodegaFK_Idbodega=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idbodega','cmbid_bodega');

			$this->strAccionBusqueda='FK_Idbodega';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idinventario_fisicoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=inventario_fisico_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_inventario_fisicoFK_Idinventario_fisico=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idinventario_fisico','cmbid_inventario_fisico');

			$this->strAccionBusqueda='FK_Idinventario_fisico';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idbodega($strFinalQuery,$id_bodega)
	{
		try
		{

			$this->inventario_fisicoLogic->getsFK_Idbodega($strFinalQuery,new Pagination(),$id_bodega);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idinventario_fisico($strFinalQuery,$id_inventario_fisico)
	{
		try
		{

			$this->inventario_fisicoLogic->getsFK_Idinventario_fisico($strFinalQuery,new Pagination(),$id_inventario_fisico);
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
			
			
			$inventario_fisicoForeignKey=new inventario_fisico_param_return(); //inventario_fisicoForeignKey();
			
			$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));
						
			if($inventario_fisico_session==null) {
				$inventario_fisico_session=new inventario_fisico_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$inventario_fisicoForeignKey=$this->inventario_fisicoLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$inventario_fisico_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_inventario_fisico',$this->strRecargarFkTipos,',')) {
				$this->inventario_fisicosFK=$inventario_fisicoForeignKey->inventario_fisicosFK;
				$this->idinventario_fisicoDefaultFK=$inventario_fisicoForeignKey->idinventario_fisicoDefaultFK;
			}

			if($inventario_fisico_session->bitBusquedaDesdeFKSesioninventario_fisico) {
				$this->setVisibleBusquedasParainventario_fisico(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$this->strRecargarFkTipos,',')) {
				$this->bodegasFK=$inventario_fisicoForeignKey->bodegasFK;
				$this->idbodegaDefaultFK=$inventario_fisicoForeignKey->idbodegaDefaultFK;
			}

			if($inventario_fisico_session->bitBusquedaDesdeFKSesionbodega) {
				$this->setVisibleBusquedasParabodega(true);
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
	
	function cargarCombosFKFromReturnGeneral($inventario_fisicoReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$inventario_fisicoReturnGeneral->strRecargarFkTipos;
			
			


			if($inventario_fisicoReturnGeneral->con_inventario_fisicosFK==true) {
				$this->inventario_fisicosFK=$inventario_fisicoReturnGeneral->inventario_fisicosFK;
				$this->idinventario_fisicoDefaultFK=$inventario_fisicoReturnGeneral->idinventario_fisicoDefaultFK;
			}


			if($inventario_fisicoReturnGeneral->con_bodegasFK==true) {
				$this->bodegasFK=$inventario_fisicoReturnGeneral->bodegasFK;
				$this->idbodegaDefaultFK=$inventario_fisicoReturnGeneral->idbodegaDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(inventario_fisico_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));
		
		if($inventario_fisico_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($inventario_fisico_session->getstrNombrePaginaNavegacionHaciaFKDesde()==inventario_fisico_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='inventario_fisico';
			}
			else if($inventario_fisico_session->getstrNombrePaginaNavegacionHaciaFKDesde()==bodega_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='bodega';
			}
			
			$inventario_fisico_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}						
			
			$this->inventario_fisicosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->inventario_fisicosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->inventario_fisicosAuxiliar=array();
			}
			
			if(count($this->inventario_fisicosAuxiliar) > 0) {
				
				foreach ($this->inventario_fisicosAuxiliar as $inventario_fisicoSeleccionado) {
					$this->eliminarTablaBase($inventario_fisicoSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('inventario_fisico_detalle');
			$tipoRelacionReporte->setsDescripcion(' Detalles');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('inventario_fisico');
			$tipoRelacionReporte->setsDescripcion('s');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=inventario_fisico_detalle_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=inventario_fisico_util::$STR_NOMBRE_CLASE;
		
		return $arrNombresClasesRelacionadasLocal;
	}
	
	
	public function setstrRecargarFkInicializar() {
		$this->setstrRecargarFk('TODOS','NINGUNO',0,'');		
	}
	
	
	
	public function getinventario_fisicosFKListSelectItem() 
	{
		$inventario_fisicosList=array();

		$item=null;

		foreach($this->inventario_fisicosFK as $inventario_fisico)
		{
			$item=new SelectItem();
			$item->setLabel($inventario_fisico>getId());
			$item->setValue($inventario_fisico->getId());
			$inventario_fisicosList[]=$item;
		}

		return $inventario_fisicosList;
	}


	public function getbodegasFKListSelectItem() 
	{
		$bodegasList=array();

		$item=null;

		foreach($this->bodegasFK as $bodega)
		{
			$item=new SelectItem();
			$item->setLabel($bodega->getcodigo());
			$item->setValue($bodega->getId());
			$bodegasList[]=$item;
		}

		return $bodegasList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=inventario_fisico_util::$INT_NUMERO_PAGINACION;
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
				$this->inventario_fisicoLogic->commitNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisicoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$inventario_fisicosNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->inventario_fisicos as $inventario_fisicoLocal) {
				if($inventario_fisicoLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->inventario_fisico=new inventario_fisico();
				
				$this->inventario_fisico->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->inventario_fisicos[]=$this->inventario_fisico;*/
				
				$inventario_fisicosNuevos[]=$this->inventario_fisico;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('inventario_fisico');$classes[]=$class;
				$class=new Classe('bodega');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisicoLogic->setinventario_fisicos($inventario_fisicosNuevos);
					
				$this->inventario_fisicoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($inventario_fisicosNuevos as $inventario_fisicoNuevo) {
					$this->inventario_fisicos[]=$inventario_fisicoNuevo;
				}
				
				/*$this->inventario_fisicos[]=$inventario_fisicosNuevos;*/
				
				$this->inventario_fisicoLogic->setinventario_fisicos($this->inventario_fisicos);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($inventario_fisicosNuevos!=null);
	}
					
	
	public function cargarCombosinventario_fisicosFK($connexion=null,$strRecargarFkQuery=''){
		$inventario_fisicoLogic= new inventario_fisico_logic();
		$pagination= new Pagination();
		$this->inventario_fisicosFK=array();

		$inventario_fisicoLogic->setConnexion($connexion);
		$inventario_fisicoLogic->getinventario_fisicoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));

		if($inventario_fisico_session==null) {
			$inventario_fisico_session=new inventario_fisico_session();
		}
		
		if($inventario_fisico_session->bitBusquedaDesdeFKSesioninventario_fisico!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=inventario_fisico_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalinventario_fisico=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalinventario_fisico=Funciones::GetFinalQueryAppend($finalQueryGlobalinventario_fisico, '');
				$finalQueryGlobalinventario_fisico.=inventario_fisico_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalinventario_fisico.$strRecargarFkQuery;		

				$inventario_fisicoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosinventario_fisicosFK($inventario_fisicoLogic->getinventario_fisicos());

		} else {
			$this->setVisibleBusquedasParainventario_fisico(true);


			if($inventario_fisico_session->bigidinventario_fisicoActual!=null && $inventario_fisico_session->bigidinventario_fisicoActual > 0) {
				$inventario_fisicoLogic->getEntity($inventario_fisico_session->bigidinventario_fisicoActual);//WithConnection

				$this->inventario_fisicosFK[$inventario_fisicoLogic->getinventario_fisico()->getId()]=inventario_fisico_util::getinventario_fisicoDescripcion($inventario_fisicoLogic->getinventario_fisico());
				$this->idinventario_fisicoDefaultFK=$inventario_fisicoLogic->getinventario_fisico()->getId();
			}
		}
	}

	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery=''){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$this->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));

		if($inventario_fisico_session==null) {
			$inventario_fisico_session=new inventario_fisico_session();
		}
		
		if($inventario_fisico_session->bitBusquedaDesdeFKSesionbodega!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=bodega_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalbodega=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalbodega=Funciones::GetFinalQueryAppend($finalQueryGlobalbodega, '');
				$finalQueryGlobalbodega.=bodega_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalbodega.$strRecargarFkQuery;		

				$bodegaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosbodegasFK($bodegaLogic->getbodegas());

		} else {
			$this->setVisibleBusquedasParabodega(true);


			if($inventario_fisico_session->bigidbodegaActual!=null && $inventario_fisico_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($inventario_fisico_session->bigidbodegaActual);//WithConnection

				$this->bodegasFK[$bodegaLogic->getbodega()->getId()]=inventario_fisico_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$this->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	
	
	public function prepararCombosinventario_fisicosFK($inventario_fisicos){

		foreach ($inventario_fisicos as $inventario_fisicoLocal ) {
			if($this->idinventario_fisicoDefaultFK==0) {
				$this->idinventario_fisicoDefaultFK=$inventario_fisicoLocal->getId();
			}

			$this->inventario_fisicosFK[$inventario_fisicoLocal->getId()]=inventario_fisico_util::getinventario_fisicoDescripcion($inventario_fisicoLocal);
		}
	}

	public function prepararCombosbodegasFK($bodegas){

		foreach ($bodegas as $bodegaLocal ) {
			if($this->idbodegaDefaultFK==0) {
				$this->idbodegaDefaultFK=$bodegaLocal->getId();
			}

			$this->bodegasFK[$bodegaLocal->getId()]=inventario_fisico_util::getbodegaDescripcion($bodegaLocal);
		}
	}

	
	
	public function cargarDescripcioninventario_fisicoFK($idinventario_fisico,$connexion=null){
		$inventario_fisicoLogic= new inventario_fisico_logic();
		$inventario_fisicoLogic->setConnexion($connexion);
		$inventario_fisicoLogic->getinventario_fisicoDataAccess()->isForFKData=true;
		$strDescripcioninventario_fisico='';

		if($idinventario_fisico!=null && $idinventario_fisico!='' && $idinventario_fisico!='null') {
			if($connexion!=null) {
				$inventario_fisicoLogic->getEntity($idinventario_fisico);//WithConnection
			} else {
				$inventario_fisicoLogic->getEntityWithConnection($idinventario_fisico);//
			}

			$strDescripcioninventario_fisico=inventario_fisico_util::getinventario_fisicoDescripcion($inventario_fisicoLogic->getinventario_fisico());

		} else {
			$strDescripcioninventario_fisico='null';
		}

		return $strDescripcioninventario_fisico;
	}

	public function cargarDescripcionbodegaFK($idbodega,$connexion=null){
		$bodegaLogic= new bodega_logic();
		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$strDescripcionbodega='';

		if($idbodega!=null && $idbodega!='' && $idbodega!='null') {
			if($connexion!=null) {
				$bodegaLogic->getEntity($idbodega);//WithConnection
			} else {
				$bodegaLogic->getEntityWithConnection($idbodega);//
			}

			$strDescripcionbodega=inventario_fisico_util::getbodegaDescripcion($bodegaLogic->getbodega());

		} else {
			$strDescripcionbodega='null';
		}

		return $strDescripcionbodega;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(inventario_fisico $inventario_fisicoClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	public function abrirArbol(){
		$this->saveGetSessionControllerAndPageAuxiliar(false);
		
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaArbol(inventario_fisico_util::$STR_CLASS_NAME,'inventario','','POPUP',$this->strTipoPaginaAuxiliarinventario_fisico,$this->strTipoUsuarioAuxiliarinventario_fisico,false,'');
		
		$this->strAuxiliarTipo='POPUP';
			
		$this->saveGetSessionControllerAndPageAuxiliar(true);

		//$this->returnAjax();
	}
	
	public function cargarArbol(){
		$this->saveGetSessionControllerAndPageAuxiliar(false);
		
		/*//SI SE EJECUTA FUNCIONES DEL ARBOL NO SE MUESTRA
		$this->htmlAuxiliar='<h1>AUXILIAR</h1>';*/
		
		$nombre_clase='inventario_fisico';
		$nombre_objeto='inventario_fisico';
		$objetosUsuario=$this->inventario_fisicos;
		$tree=null;
		$webroot='webroot';
		
		foreach($objetosUsuario as $objeto) {
			$objeto->setsDescription(inventario_fisico_util::getinventario_fisicoDescripcion($objeto));
		}
		
		$this->htmlAuxiliar=FuncionesWebArbol::getMenuUsuarioJQuery2($nombre_clase,$nombre_objeto,$objetosUsuario,$tree,$webroot);
		
		//$this->returnAjax();
	}
	
	

	public function setVisibleBusquedasParainventario_fisico($isParainventario_fisico){
		$strParaVisibleinventario_fisico='display:table-row';
		$strParaVisibleNegacioninventario_fisico='display:none';

		if($isParainventario_fisico) {
			$strParaVisibleinventario_fisico='display:table-row';
			$strParaVisibleNegacioninventario_fisico='display:none';
		} else {
			$strParaVisibleinventario_fisico='display:none';
			$strParaVisibleNegacioninventario_fisico='display:table-row';
		}


		$strParaVisibleNegacioninventario_fisico=trim($strParaVisibleNegacioninventario_fisico);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacioninventario_fisico;
		$this->strVisibleFK_Idinventario_fisico=$strParaVisibleinventario_fisico;
	}

	public function setVisibleBusquedasParabodega($isParabodega){
		$strParaVisiblebodega='display:table-row';
		$strParaVisibleNegacionbodega='display:none';

		if($isParabodega) {
			$strParaVisiblebodega='display:table-row';
			$strParaVisibleNegacionbodega='display:none';
		} else {
			$strParaVisiblebodega='display:none';
			$strParaVisibleNegacionbodega='display:table-row';
		}


		$strParaVisibleNegacionbodega=trim($strParaVisibleNegacionbodega);

		$this->strVisibleFK_Idbodega=$strParaVisiblebodega;
		$this->strVisibleFK_Idinventario_fisico=$strParaVisibleNegacionbodega;
	}
	
	

	public function abrirBusquedaParainventario_fisico() {//$idinventario_fisicoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idinventario_fisicoActual=$idinventario_fisicoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.inventario_fisico_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.inventario_fisicoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_inventario_fisico(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',inventario_fisico_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.inventario_fisicoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_inventario_fisico(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(inventario_fisico_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarinventario_fisico,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParabodega() {//$idinventario_fisicoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idinventario_fisicoActual=$idinventario_fisicoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.bodega_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.inventario_fisicoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',bodega_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.inventario_fisicoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(bodega_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarinventario_fisico,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParainventario_fisico_detalles(int $idinventario_fisicoActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idinventario_fisicoActual=$idinventario_fisicoActual;

		$bitPaginaPopupinventario_fisico_detalle=false;

		try {

			$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));

			if($inventario_fisico_session==null) {
				$inventario_fisico_session=new inventario_fisico_session();
			}

			$inventario_fisico_detalle_session=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME));

			if($inventario_fisico_detalle_session==null) {
				$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
			}

			$inventario_fisico_detalle_session->strUltimaBusqueda='FK_Idinventario_fisico';
			$inventario_fisico_detalle_session->strPathNavegacionActual=$inventario_fisico_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.inventario_fisico_detalle_util::$STR_CLASS_WEB_TITULO;
			$inventario_fisico_detalle_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupinventario_fisico_detalle=$inventario_fisico_detalle_session->bitPaginaPopup;
			$inventario_fisico_detalle_session->setPaginaPopupVariables(true);
			$bitPaginaPopupinventario_fisico_detalle=$inventario_fisico_detalle_session->bitPaginaPopup;
			$inventario_fisico_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
			$inventario_fisico_detalle_session->strNombrePaginaNavegacionHaciaFKDesde=inventario_fisico_util::$STR_NOMBRE_OPCION;
			$inventario_fisico_detalle_session->bitBusquedaDesdeFKSesioninventario_fisico=true;
			$inventario_fisico_detalle_session->bigidinventario_fisicoActual=$this->idinventario_fisicoActual;

			$inventario_fisico_session->bitBusquedaDesdeFKSesionFK=true;
			$inventario_fisico_session->bigIdActualFK=$this->idinventario_fisicoActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"inventario_fisico_detalle"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=inventario_fisico_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"inventario_fisico_detalle"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(inventario_fisico_util::$STR_SESSION_NAME,serialize($inventario_fisico_session));
			$this->Session->write(inventario_fisico_detalle_util::$STR_SESSION_NAME,serialize($inventario_fisico_detalle_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupinventario_fisico_detalle!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',inventario_fisico_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(inventario_fisico_detalle_util::$STR_CLASS_NAME,'inventario','','POPUP',$this->strTipoPaginaAuxiliarinventario_fisico,$this->strTipoUsuarioAuxiliarinventario_fisico,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',inventario_fisico_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(inventario_fisico_detalle_util::$STR_CLASS_NAME,'inventario','','NO-POPUP',$this->strTipoPaginaAuxiliarinventario_fisico,$this->strTipoUsuarioAuxiliarinventario_fisico,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParainventario_fisicos(int $idinventario_fisicoActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idinventario_fisicoActual=$idinventario_fisicoActual;

		$bitPaginaPopupinventario_fisico=false;

		try {

			$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));

			if($inventario_fisico_session==null) {
				$inventario_fisico_session=new inventario_fisico_session();
			}

			$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));

			if($inventario_fisico_session==null) {
				$inventario_fisico_session=new inventario_fisico_session();
			}

			$inventario_fisico_session->strUltimaBusqueda='FK_Idinventario_fisico';
			$inventario_fisico_session->strPathNavegacionActual=$inventario_fisico_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.inventario_fisico_util::$STR_CLASS_WEB_TITULO;
			$inventario_fisico_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupinventario_fisico=$inventario_fisico_session->bitPaginaPopup;
			$inventario_fisico_session->setPaginaPopupVariables(true);
			$bitPaginaPopupinventario_fisico=$inventario_fisico_session->bitPaginaPopup;
			$inventario_fisico_session->bitPermiteNavegacionHaciaFKDesde=false;
			$inventario_fisico_session->strNombrePaginaNavegacionHaciaFKDesde=inventario_fisico_util::$STR_NOMBRE_OPCION;
			$inventario_fisico_session->bitBusquedaDesdeFKSesioninventario_fisico=true;
			$inventario_fisico_session->bigidinventario_fisicoActual=$this->idinventario_fisicoActual;

			$inventario_fisico_session->bitBusquedaDesdeFKSesionFK=true;
			$inventario_fisico_session->bigIdActualFK=$this->idinventario_fisicoActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"inventario_fisico"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=inventario_fisico_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"inventario_fisico"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(inventario_fisico_util::$STR_SESSION_NAME,serialize($inventario_fisico_session));
			$this->Session->write(inventario_fisico_util::$STR_SESSION_NAME,serialize($inventario_fisico_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupinventario_fisico!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',inventario_fisico_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(inventario_fisico_util::$STR_CLASS_NAME,'inventario','','POPUP',$this->strTipoPaginaAuxiliarinventario_fisico,$this->strTipoUsuarioAuxiliarinventario_fisico,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',inventario_fisico_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(inventario_fisico_util::$STR_CLASS_NAME,'inventario','','NO-POPUP',$this->strTipoPaginaAuxiliarinventario_fisico,$this->strTipoUsuarioAuxiliarinventario_fisico,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(inventario_fisico_util::$STR_SESSION_NAME,inventario_fisico_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$inventario_fisico_session=$this->Session->read(inventario_fisico_util::$STR_SESSION_NAME);
				
		if($inventario_fisico_session==null) {
			$inventario_fisico_session=new inventario_fisico_session();		
			//$this->Session->write('inventario_fisico_session',$inventario_fisico_session);							
		}
		*/
		
		$inventario_fisico_session=new inventario_fisico_session();
    	$inventario_fisico_session->strPathNavegacionActual=inventario_fisico_util::$STR_CLASS_WEB_TITULO;
    	$inventario_fisico_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(inventario_fisico_util::$STR_SESSION_NAME,serialize($inventario_fisico_session));		
	}	
	
	public function getSetBusquedasSesionConfig(inventario_fisico_session $inventario_fisico_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($inventario_fisico_session->bitBusquedaDesdeFKSesionFK!=null && $inventario_fisico_session->bitBusquedaDesdeFKSesionFK==true) {
			if($inventario_fisico_session->bigIdActualFK!=null && $inventario_fisico_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$inventario_fisico_session->bigIdActualFKParaPosibleAtras=$inventario_fisico_session->bigIdActualFK;*/
			}
				
			$inventario_fisico_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$inventario_fisico_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(inventario_fisico_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($inventario_fisico_session->bitBusquedaDesdeFKSesioninventario_fisico!=null && $inventario_fisico_session->bitBusquedaDesdeFKSesioninventario_fisico==true)
			{
				if($inventario_fisico_session->bigidinventario_fisicoActual!=0) {
					$this->strAccionBusqueda='FK_Idinventario_fisico';

					$existe_history=HistoryWeb::ExisteElemento(inventario_fisico_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(inventario_fisico_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(inventario_fisico_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($inventario_fisico_session->bigidinventario_fisicoActualDescripcion);
						$historyWeb->setIdActual($inventario_fisico_session->bigidinventario_fisicoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=inventario_fisico_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$inventario_fisico_session->bigidinventario_fisicoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$inventario_fisico_session->bitBusquedaDesdeFKSesioninventario_fisico=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=inventario_fisico_util::$INT_NUMERO_PAGINACION;

				if($inventario_fisico_session->intNumeroPaginacion==inventario_fisico_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=inventario_fisico_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$inventario_fisico_session->intNumeroPaginacion;
				}
			}
			else if($inventario_fisico_session->bitBusquedaDesdeFKSesionbodega!=null && $inventario_fisico_session->bitBusquedaDesdeFKSesionbodega==true)
			{
				if($inventario_fisico_session->bigidbodegaActual!=0) {
					$this->strAccionBusqueda='FK_Idbodega';

					$existe_history=HistoryWeb::ExisteElemento(inventario_fisico_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(inventario_fisico_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(inventario_fisico_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($inventario_fisico_session->bigidbodegaActualDescripcion);
						$historyWeb->setIdActual($inventario_fisico_session->bigidbodegaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=inventario_fisico_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$inventario_fisico_session->bigidbodegaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$inventario_fisico_session->bitBusquedaDesdeFKSesionbodega=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=inventario_fisico_util::$INT_NUMERO_PAGINACION;

				if($inventario_fisico_session->intNumeroPaginacion==inventario_fisico_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=inventario_fisico_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$inventario_fisico_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$inventario_fisico_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));
		
		if($inventario_fisico_session==null) {
			$inventario_fisico_session=new inventario_fisico_session();
		}
		
		$inventario_fisico_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$inventario_fisico_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$inventario_fisico_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idbodega') {
			$inventario_fisico_session->id_bodega=$this->id_bodegaFK_Idbodega;	

		}
		else if($this->strAccionBusqueda=='FK_Idinventario_fisico') {
			$inventario_fisico_session->id_inventario_fisico=$this->id_inventario_fisicoFK_Idinventario_fisico;	

		}
		
		$this->Session->write(inventario_fisico_util::$STR_SESSION_NAME,serialize($inventario_fisico_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(inventario_fisico_session $inventario_fisico_session) {
		
		if($inventario_fisico_session==null) {
			$inventario_fisico_session=unserialize($this->Session->read(inventario_fisico_util::$STR_SESSION_NAME));
		}
		
		if($inventario_fisico_session==null) {
		   $inventario_fisico_session=new inventario_fisico_session();
		}
		
		if($inventario_fisico_session->strUltimaBusqueda!=null && $inventario_fisico_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$inventario_fisico_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$inventario_fisico_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$inventario_fisico_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idbodega') {
				$this->id_bodegaFK_Idbodega=$inventario_fisico_session->id_bodega;
				$inventario_fisico_session->id_bodega=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idinventario_fisico') {
				$this->id_inventario_fisicoFK_Idinventario_fisico=$inventario_fisico_session->id_inventario_fisico;
				$inventario_fisico_session->id_inventario_fisico=-1;

			}
		}
		
		$inventario_fisico_session->strUltimaBusqueda='';
		//$inventario_fisico_session->intNumeroPaginacion=10;
		$inventario_fisico_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(inventario_fisico_util::$STR_SESSION_NAME,serialize($inventario_fisico_session));		
	}
	
	public function inventario_fisicosControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idinventario_fisicoDefaultFK = 0;
		$this->idbodegaDefaultFK = 0;
	}
	
	public function setinventario_fisicoFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_inventario_fisico',$this->idinventario_fisicoDefaultFK);
		$this->setExistDataCampoForm('form','id_bodega',$this->idbodegaDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		bodega::$class;
		bodega_carga::$CONTROLLER;
		
		//REL
		

		inventario_fisico_detalle_carga::$CONTROLLER;
		inventario_fisico_detalle_util::$STR_SCHEMA;
		inventario_fisico_detalle_session::class;
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
		interface inventario_fisico_controlI {	
		
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
		
		public function abrirArbolAction();	
		public function cargarArbolAction();
		
		public function manejarEventosAction();
		public function recargarFormularioGeneralAction();
		
		
		public function mostrarEjecutarAccionesRelacionesAction();
		
		public function generarReporteConPhpExcelAction();	
		public function generarReporteConPhpExcelVerticalAction();	
		public function generarReporteConPhpExcelRelacionesAction();
		
		public function onLoad(inventario_fisico_session $inventario_fisico_session=null);	
		function index(?string $strTypeOnLoadinventario_fisico='',?string $strTipoPaginaAuxiliarinventario_fisico='',?string $strTipoUsuarioAuxiliarinventario_fisico='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadinventario_fisico='',string $strTipoPaginaAuxiliarinventario_fisico='',string $strTipoUsuarioAuxiliarinventario_fisico='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($inventario_fisicoReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(inventario_fisico $inventario_fisicoClase);
		
		public function abrirArbol();	
		public function cargarArbol();
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(inventario_fisico_session $inventario_fisico_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(inventario_fisico_session $inventario_fisico_session);	
		public function inventario_fisicosControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setinventario_fisicoFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
