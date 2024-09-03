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

namespace com\bydan\contabilidad\inventario\inventario_fisico_detalle\presentation\control;

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

use com\bydan\contabilidad\inventario\inventario_fisico_detalle\business\entity\inventario_fisico_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/inventario_fisico_detalle/util/inventario_fisico_detalle_carga.php');
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_carga;

use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_util;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_param_return;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\business\logic\inventario_fisico_detalle_logic;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\presentation\session\inventario_fisico_detalle_session;


//FK


use com\bydan\contabilidad\inventario\inventario_fisico\business\entity\inventario_fisico;
use com\bydan\contabilidad\inventario\inventario_fisico\business\logic\inventario_fisico_logic;
use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_carga;
use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
inventario_fisico_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
inventario_fisico_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
inventario_fisico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
inventario_fisico_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*inventario_fisico_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/inventario/inventario_fisico_detalle/presentation/control/inventario_fisico_detalle_init_control.php');
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\presentation\control\inventario_fisico_detalle_init_control;

include_once('com/bydan/contabilidad/inventario/inventario_fisico_detalle/presentation/control/inventario_fisico_detalle_base_control.php');
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\presentation\control\inventario_fisico_detalle_base_control;

class inventario_fisico_detalle_control extends inventario_fisico_detalle_base_control {	
	
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
			
			
			else if($action=="FK_Idbodega"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdbodegaParaProcesar();
			}
			else if($action=="FK_Idinventario_fisico"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idinventario_fisicoParaProcesar();
			}
			else if($action=="FK_Idproducto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdproductoParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParainventario_fisico') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idinventario_fisico_detalleActual=$this->getDataId();
				$this->abrirBusquedaParainventario_fisico();//$idinventario_fisico_detalleActual
			}
			else if($action=='abrirBusquedaParaproducto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idinventario_fisico_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaproducto();//$idinventario_fisico_detalleActual
			}
			else if($action=='abrirBusquedaParabodega') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idinventario_fisico_detalleActual=$this->getDataId();
				$this->abrirBusquedaParabodega();//$idinventario_fisico_detalleActual
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
					
					$inventario_fisico_detalleController = new inventario_fisico_detalle_control();
					
					$inventario_fisico_detalleController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($inventario_fisico_detalleController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$inventario_fisico_detalleController = new inventario_fisico_detalle_control();
						$inventario_fisico_detalleController = $this;
						
						$jsonResponse = json_encode($inventario_fisico_detalleController->inventario_fisico_detalles);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->inventario_fisico_detalleReturnGeneral==null) {
					$this->inventario_fisico_detalleReturnGeneral=new inventario_fisico_detalle_param_return();
				}
				
				echo($this->inventario_fisico_detalleReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$inventario_fisico_detalleController=new inventario_fisico_detalle_control();
		
		$inventario_fisico_detalleController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$inventario_fisico_detalleController->usuarioActual=new usuario();
		
		$inventario_fisico_detalleController->usuarioActual->setId($this->usuarioActual->getId());
		$inventario_fisico_detalleController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$inventario_fisico_detalleController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$inventario_fisico_detalleController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$inventario_fisico_detalleController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$inventario_fisico_detalleController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$inventario_fisico_detalleController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$inventario_fisico_detalleController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $inventario_fisico_detalleController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadinventario_fisico_detalle= $this->getDataGeneralString('strTypeOnLoadinventario_fisico_detalle');
		$strTipoPaginaAuxiliarinventario_fisico_detalle= $this->getDataGeneralString('strTipoPaginaAuxiliarinventario_fisico_detalle');
		$strTipoUsuarioAuxiliarinventario_fisico_detalle= $this->getDataGeneralString('strTipoUsuarioAuxiliarinventario_fisico_detalle');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadinventario_fisico_detalle,$strTipoPaginaAuxiliarinventario_fisico_detalle,$strTipoUsuarioAuxiliarinventario_fisico_detalle,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadinventario_fisico_detalle!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('inventario_fisico_detalle','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(inventario_fisico_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarinventario_fisico_detalle,$this->strTipoUsuarioAuxiliarinventario_fisico_detalle,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(inventario_fisico_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarinventario_fisico_detalle,$this->strTipoUsuarioAuxiliarinventario_fisico_detalle,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->inventario_fisico_detalleReturnGeneral=new inventario_fisico_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->inventario_fisico_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->inventario_fisico_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->inventario_fisico_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->inventario_fisico_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->inventario_fisico_detalleReturnGeneral);
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
		$this->inventario_fisico_detalleReturnGeneral=new inventario_fisico_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->inventario_fisico_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->inventario_fisico_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->inventario_fisico_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->inventario_fisico_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->inventario_fisico_detalleReturnGeneral);
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
		$this->inventario_fisico_detalleReturnGeneral=new inventario_fisico_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->inventario_fisico_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->inventario_fisico_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->inventario_fisico_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->inventario_fisico_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->inventario_fisico_detalleReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
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
			
			
			$this->inventario_fisico_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->inventario_fisico_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->inventario_fisico_detalleReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->inventario_fisico_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->inventario_fisico_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->inventario_fisico_detalleReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->inventario_fisico_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->inventario_fisico_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->inventario_fisico_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->inventario_fisico_detalleReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->inventario_fisico_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->inventario_fisico_detalleReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->inventario_fisico_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->inventario_fisico_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->inventario_fisico_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->inventario_fisico_detalleReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->inventario_fisico_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->inventario_fisico_detalleReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
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
		
		$this->inventario_fisico_detalleLogic=new inventario_fisico_detalle_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->inventario_fisico_detalle=new inventario_fisico_detalle();
		
		$this->strTypeOnLoadinventario_fisico_detalle='onload';
		$this->strTipoPaginaAuxiliarinventario_fisico_detalle='none';
		$this->strTipoUsuarioAuxiliarinventario_fisico_detalle='none';	

		$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;
		
		$this->inventario_fisico_detalleModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->inventario_fisico_detalleControllerAdditional=new inventario_fisico_detalle_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(inventario_fisico_detalle_session $inventario_fisico_detalle_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($inventario_fisico_detalle_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadinventario_fisico_detalle='',?string $strTipoPaginaAuxiliarinventario_fisico_detalle='',?string $strTipoUsuarioAuxiliarinventario_fisico_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadinventario_fisico_detalle=$strTypeOnLoadinventario_fisico_detalle;
			$this->strTipoPaginaAuxiliarinventario_fisico_detalle=$strTipoPaginaAuxiliarinventario_fisico_detalle;
			$this->strTipoUsuarioAuxiliarinventario_fisico_detalle=$strTipoUsuarioAuxiliarinventario_fisico_detalle;
	
			if($strTipoUsuarioAuxiliarinventario_fisico_detalle=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->inventario_fisico_detalle=new inventario_fisico_detalle();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Inventario Fisico Detalles';
			
			
			$inventario_fisico_detalle_session=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME));
							
			if($inventario_fisico_detalle_session==null) {
				$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
				
				/*$this->Session->write('inventario_fisico_detalle_session',$inventario_fisico_detalle_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($inventario_fisico_detalle_session->strFuncionJsPadre!=null && $inventario_fisico_detalle_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$inventario_fisico_detalle_session->strFuncionJsPadre;
				
				$inventario_fisico_detalle_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($inventario_fisico_detalle_session);
			
			if($strTypeOnLoadinventario_fisico_detalle!=null && $strTypeOnLoadinventario_fisico_detalle=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$inventario_fisico_detalle_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$inventario_fisico_detalle_session->setPaginaPopupVariables(true);
				}
				
				if($inventario_fisico_detalle_session->intNumeroPaginacion==inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$inventario_fisico_detalle_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,inventario_fisico_detalle_util::$STR_SESSION_NAME,'inventario');																
			
			} else if($strTypeOnLoadinventario_fisico_detalle!=null && $strTypeOnLoadinventario_fisico_detalle=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$inventario_fisico_detalle_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;*/
				
				if($inventario_fisico_detalle_session->intNumeroPaginacion==inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$inventario_fisico_detalle_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarinventario_fisico_detalle!=null && $strTipoPaginaAuxiliarinventario_fisico_detalle=='none') {
				/*$inventario_fisico_detalle_session->strStyleDivHeader='display:table-row';*/
				
				/*$inventario_fisico_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarinventario_fisico_detalle!=null && $strTipoPaginaAuxiliarinventario_fisico_detalle=='iframe') {
					/*
					$inventario_fisico_detalle_session->strStyleDivArbol='display:none';
					$inventario_fisico_detalle_session->strStyleDivHeader='display:none';
					$inventario_fisico_detalle_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$inventario_fisico_detalle_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->inventario_fisico_detalleClase=new inventario_fisico_detalle();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=inventario_fisico_detalle_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(inventario_fisico_detalle_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->inventario_fisico_detalleLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->inventario_fisico_detalleLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->inventario_fisico_detalleLogic=new inventario_fisico_detalle_logic();*/
			
			
			$this->inventario_fisico_detallesModel=null;
			/*new ListDataModel();*/
			
			/*$this->inventario_fisico_detallesModel.setWrappedData(inventario_fisico_detalleLogic->getinventario_fisico_detalles());*/
						
			$this->inventario_fisico_detalles= array();
			$this->inventario_fisico_detallesEliminados=array();
			$this->inventario_fisico_detallesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= inventario_fisico_detalle_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->inventario_fisico_detalle= new inventario_fisico_detalle();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idbodega='display:table-row';
			$this->strVisibleFK_Idinventario_fisico='display:table-row';
			$this->strVisibleFK_Idproducto='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarinventario_fisico_detalle!=null && $strTipoUsuarioAuxiliarinventario_fisico_detalle!='none' && $strTipoUsuarioAuxiliarinventario_fisico_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarinventario_fisico_detalle);
																
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
				if($strTipoUsuarioAuxiliarinventario_fisico_detalle!=null && $strTipoUsuarioAuxiliarinventario_fisico_detalle!='none' && $strTipoUsuarioAuxiliarinventario_fisico_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarinventario_fisico_detalle);
																
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
				if($strTipoUsuarioAuxiliarinventario_fisico_detalle==null || $strTipoUsuarioAuxiliarinventario_fisico_detalle=='none' || $strTipoUsuarioAuxiliarinventario_fisico_detalle=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarinventario_fisico_detalle,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, inventario_fisico_detalle_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, inventario_fisico_detalle_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina inventario_fisico_detalle');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($inventario_fisico_detalle_session);
			
			$this->getSetBusquedasSesionConfig($inventario_fisico_detalle_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteinventario_fisico_detalles($this->strAccionBusqueda,$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles());*/
				} else if($this->strGenerarReporte=='Html')	{
					$inventario_fisico_detalle_session->strServletGenerarHtmlReporte='inventario_fisico_detalleServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(inventario_fisico_detalle_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(inventario_fisico_detalle_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($inventario_fisico_detalle_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$inventario_fisico_detalle_session=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarinventario_fisico_detalle!=null && $strTipoUsuarioAuxiliarinventario_fisico_detalle=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($inventario_fisico_detalle_session);
			}
								
			$this->set(inventario_fisico_detalle_util::$STR_SESSION_NAME, $inventario_fisico_detalle_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($inventario_fisico_detalle_session);
			
			/*
			$this->inventario_fisico_detalle->recursive = 0;
			
			$this->inventario_fisico_detalles=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('inventario_fisico_detalles', $this->inventario_fisico_detalles);
			
			$this->set(inventario_fisico_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->inventario_fisico_detalleActual =$this->inventario_fisico_detalleClase;
			
			/*$this->inventario_fisico_detalleActual =$this->migrarModelinventario_fisico_detalle($this->inventario_fisico_detalleClase);*/
			
			$this->returnHtml(false);
			
			$this->set(inventario_fisico_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=inventario_fisico_detalle_util::$STR_NOMBRE_OPCION;
				
			if(inventario_fisico_detalle_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=inventario_fisico_detalle_util::$STR_MODULO_OPCION.inventario_fisico_detalle_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(inventario_fisico_detalle_util::$STR_SESSION_NAME,serialize($inventario_fisico_detalle_session));
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
			/*$inventario_fisico_detalleClase= (inventario_fisico_detalle) inventario_fisico_detallesModel.getRowData();*/
			
			$this->inventario_fisico_detalleClase->setId($this->inventario_fisico_detalle->getId());	
			$this->inventario_fisico_detalleClase->setVersionRow($this->inventario_fisico_detalle->getVersionRow());	
			$this->inventario_fisico_detalleClase->setVersionRow($this->inventario_fisico_detalle->getVersionRow());	
			$this->inventario_fisico_detalleClase->setid_inventario_fisico($this->inventario_fisico_detalle->getid_inventario_fisico());	
			$this->inventario_fisico_detalleClase->setid_producto($this->inventario_fisico_detalle->getid_producto());	
			$this->inventario_fisico_detalleClase->setid_bodega($this->inventario_fisico_detalle->getid_bodega());	
			$this->inventario_fisico_detalleClase->setunidades_contadas($this->inventario_fisico_detalle->getunidades_contadas());	
			$this->inventario_fisico_detalleClase->setcampo1($this->inventario_fisico_detalle->getcampo1());	
			$this->inventario_fisico_detalleClase->setcampo2($this->inventario_fisico_detalle->getcampo2());	
			$this->inventario_fisico_detalleClase->setcampo3($this->inventario_fisico_detalle->getcampo3());	
		
			/*$this->Session->write('inventario_fisico_detalleVersionRowActual', inventario_fisico_detalle.getVersionRow());*/
			
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
			
			$inventario_fisico_detalle_session=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME));
						
			if($inventario_fisico_detalle_session==null) {
				$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('inventario_fisico_detalle', $this->inventario_fisico_detalle->read(null, $id));
	
			
			$this->inventario_fisico_detalle->recursive = 0;
			
			$this->inventario_fisico_detalles=$this->paginate();
			
			$this->set('inventario_fisico_detalles', $this->inventario_fisico_detalles);
	
			if (empty($this->data)) {
				$this->data = $this->inventario_fisico_detalle->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->inventario_fisico_detalleLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->inventario_fisico_detalleClase);
			
			$this->inventario_fisico_detalleActual=$this->inventario_fisico_detalleClase;
			
			/*$this->inventario_fisico_detalleActual =$this->migrarModelinventario_fisico_detalle($this->inventario_fisico_detalleClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles(),$this->inventario_fisico_detalleActual);
			
			$this->actualizarControllerConReturnGeneral($this->inventario_fisico_detalleReturnGeneral);
			
			//$this->inventario_fisico_detalleReturnGeneral=$this->inventario_fisico_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles(),$this->inventario_fisico_detalleActual,$this->inventario_fisico_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$inventario_fisico_detalle_session=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME));
						
			if($inventario_fisico_detalle_session==null) {
				$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoinventario_fisico_detalle', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->inventario_fisico_detalleClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->inventario_fisico_detalleClase);
			
			$this->inventario_fisico_detalleActual =$this->inventario_fisico_detalleClase;
			
			/*$this->inventario_fisico_detalleActual =$this->migrarModelinventario_fisico_detalle($this->inventario_fisico_detalleClase);*/
			
			$this->setinventario_fisico_detalleFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles(),$this->inventario_fisico_detalle);
			
			$this->actualizarControllerConReturnGeneral($this->inventario_fisico_detalleReturnGeneral);
			
			//this->inventario_fisico_detalleReturnGeneral=$this->inventario_fisico_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles(),$this->inventario_fisico_detalle,$this->inventario_fisico_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idinventario_fisicoDefaultFK!=null && $this->idinventario_fisicoDefaultFK > -1) {
				$this->inventario_fisico_detalleReturnGeneral->getinventario_fisico_detalle()->setid_inventario_fisico($this->idinventario_fisicoDefaultFK);
			}

			if($this->idproductoDefaultFK!=null && $this->idproductoDefaultFK > -1) {
				$this->inventario_fisico_detalleReturnGeneral->getinventario_fisico_detalle()->setid_producto($this->idproductoDefaultFK);
			}

			if($this->idbodegaDefaultFK!=null && $this->idbodegaDefaultFK > -1) {
				$this->inventario_fisico_detalleReturnGeneral->getinventario_fisico_detalle()->setid_bodega($this->idbodegaDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->inventario_fisico_detalleReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->inventario_fisico_detalleReturnGeneral->getinventario_fisico_detalle(),$this->inventario_fisico_detalleActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyinventario_fisico_detalle($this->inventario_fisico_detalleReturnGeneral->getinventario_fisico_detalle());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioinventario_fisico_detalle($this->inventario_fisico_detalleReturnGeneral->getinventario_fisico_detalle());*/
			}
			
			if($this->inventario_fisico_detalleReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->inventario_fisico_detalleReturnGeneral->getinventario_fisico_detalle(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualinventario_fisico_detalle($this->inventario_fisico_detalle,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->inventario_fisico_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->inventario_fisico_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->inventario_fisico_detallesAuxiliar=array();
			}
			
			if(count($this->inventario_fisico_detallesAuxiliar)==2) {
				$inventario_fisico_detalleOrigen=$this->inventario_fisico_detallesAuxiliar[0];
				$inventario_fisico_detalleDestino=$this->inventario_fisico_detallesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($inventario_fisico_detalleOrigen,$inventario_fisico_detalleDestino,true,false,false);
				
				$this->actualizarLista($inventario_fisico_detalleDestino,$this->inventario_fisico_detalles);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->inventario_fisico_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->inventario_fisico_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->inventario_fisico_detallesAuxiliar=array();
			}
			
			if(count($this->inventario_fisico_detallesAuxiliar) > 0) {
				foreach ($this->inventario_fisico_detallesAuxiliar as $inventario_fisico_detalleSeleccionado) {
					$this->inventario_fisico_detalle=new inventario_fisico_detalle();
					
					$this->setCopiarVariablesObjetos($inventario_fisico_detalleSeleccionado,$this->inventario_fisico_detalle,true,true,false);
						
					$this->inventario_fisico_detalles[]=$this->inventario_fisico_detalle;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->inventario_fisico_detallesEliminados as $inventario_fisico_detalleEliminado) {
				$this->inventario_fisico_detalleLogic->inventario_fisico_detalles[]=$inventario_fisico_detalleEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->inventario_fisico_detalle=new inventario_fisico_detalle();
							
				$this->inventario_fisico_detalles[]=$this->inventario_fisico_detalle;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
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
		
		$inventario_fisico_detalleActual=new inventario_fisico_detalle();
		
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
				
				$inventario_fisico_detalleActual=$this->inventario_fisico_detalles[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $inventario_fisico_detalleActual->setid_inventario_fisico((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $inventario_fisico_detalleActual->setid_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $inventario_fisico_detalleActual->setid_bodega((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $inventario_fisico_detalleActual->setunidades_contadas((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $inventario_fisico_detalleActual->setcampo1($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $inventario_fisico_detalleActual->setcampo2((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $inventario_fisico_detalleActual->setcampo3($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
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
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadinventario_fisico_detalle='',string $strTipoPaginaAuxiliarinventario_fisico_detalle='',string $strTipoUsuarioAuxiliarinventario_fisico_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadinventario_fisico_detalle,$strTipoPaginaAuxiliarinventario_fisico_detalle,$strTipoUsuarioAuxiliarinventario_fisico_detalle,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->inventario_fisico_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=inventario_fisico_detalle_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=inventario_fisico_detalle_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=inventario_fisico_detalle_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$inventario_fisico_detalle_session=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME));
						
			if($inventario_fisico_detalle_session==null) {
				$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
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
					/*$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;*/
					
					if($inventario_fisico_detalle_session->intNumeroPaginacion==inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$inventario_fisico_detalle_session->intNumeroPaginacion;
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
			
			$this->inventario_fisico_detallesEliminados=array();
			
			/*$this->inventario_fisico_detalleLogic->setConnexion($connexion);*/
			
			$this->inventario_fisico_detalleLogic->setIsConDeep(true);
			
			$this->inventario_fisico_detalleLogic->getinventario_fisico_detalleDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('inventario_fisico');$classes[]=$class;
			$class=new Classe('producto');$classes[]=$class;
			$class=new Classe('bodega');$classes[]=$class;
			
			$this->inventario_fisico_detalleLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->inventario_fisico_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->inventario_fisico_detalleLogic->getinventario_fisico_detalles()==null|| count($this->inventario_fisico_detalleLogic->getinventario_fisico_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->inventario_fisico_detalles=$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->inventario_fisico_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->inventario_fisico_detallesReporte=$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles();
									
						/*$this->generarReportes('Todos',$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles());*/
					
						$this->inventario_fisico_detalleLogic->setinventario_fisico_detalles($this->inventario_fisico_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->inventario_fisico_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->inventario_fisico_detalleLogic->getinventario_fisico_detalles()==null|| count($this->inventario_fisico_detalleLogic->getinventario_fisico_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->inventario_fisico_detalles=$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->inventario_fisico_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->inventario_fisico_detallesReporte=$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles();
									
						/*$this->generarReportes('Todos',$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles());*/
					
						$this->inventario_fisico_detalleLogic->setinventario_fisico_detalles($this->inventario_fisico_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idinventario_fisico_detalle=0;*/
				
				if($inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
					if($inventario_fisico_detalle_session->bigIdActualFK!=null && $inventario_fisico_detalle_session->bigIdActualFK!=0)	{
						$this->idinventario_fisico_detalle=$inventario_fisico_detalle_session->bigIdActualFK;	
					}
					
					$inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionFK=false;
					
					$inventario_fisico_detalle_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idinventario_fisico_detalle=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idinventario_fisico_detalle=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->inventario_fisico_detalleLogic->getEntity($this->idinventario_fisico_detalle);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*inventario_fisico_detalleLogicAdditional::getDetalleIndicePorId($idinventario_fisico_detalle);*/

				
				if($this->inventario_fisico_detalleLogic->getinventario_fisico_detalle()!=null) {
					$this->inventario_fisico_detalleLogic->setinventario_fisico_detalles(array());
					$this->inventario_fisico_detalleLogic->inventario_fisico_detalles[]=$this->inventario_fisico_detalleLogic->getinventario_fisico_detalle();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idbodega')
			{

				if($inventario_fisico_detalle_session->bigidbodegaActual!=null && $inventario_fisico_detalle_session->bigidbodegaActual!=0)
				{
					$this->id_bodegaFK_Idbodega=$inventario_fisico_detalle_session->bigidbodegaActual;
					$inventario_fisico_detalle_session->bigidbodegaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->inventario_fisico_detalleLogic->getsFK_Idbodega($finalQueryPaginacion,$this->pagination,$this->id_bodegaFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//inventario_fisico_detalleLogicAdditional::getDetalleIndiceFK_Idbodega($this->id_bodegaFK_Idbodega);


					if($this->inventario_fisico_detalleLogic->getinventario_fisico_detalles()==null || count($this->inventario_fisico_detalleLogic->getinventario_fisico_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$inventario_fisico_detalles=$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->inventario_fisico_detalleLogic->getsFK_Idbodega('',$this->pagination,$this->id_bodegaFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->inventario_fisico_detallesReporte=$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteinventario_fisico_detalles("FK_Idbodega",$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->inventario_fisico_detalleLogic->setinventario_fisico_detalles($inventario_fisico_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idinventario_fisico')
			{

				if($inventario_fisico_detalle_session->bigidinventario_fisicoActual!=null && $inventario_fisico_detalle_session->bigidinventario_fisicoActual!=0)
				{
					$this->id_inventario_fisicoFK_Idinventario_fisico=$inventario_fisico_detalle_session->bigidinventario_fisicoActual;
					$inventario_fisico_detalle_session->bigidinventario_fisicoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->inventario_fisico_detalleLogic->getsFK_Idinventario_fisico($finalQueryPaginacion,$this->pagination,$this->id_inventario_fisicoFK_Idinventario_fisico);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//inventario_fisico_detalleLogicAdditional::getDetalleIndiceFK_Idinventario_fisico($this->id_inventario_fisicoFK_Idinventario_fisico);


					if($this->inventario_fisico_detalleLogic->getinventario_fisico_detalles()==null || count($this->inventario_fisico_detalleLogic->getinventario_fisico_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$inventario_fisico_detalles=$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->inventario_fisico_detalleLogic->getsFK_Idinventario_fisico('',$this->pagination,$this->id_inventario_fisicoFK_Idinventario_fisico);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->inventario_fisico_detallesReporte=$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteinventario_fisico_detalles("FK_Idinventario_fisico",$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->inventario_fisico_detalleLogic->setinventario_fisico_detalles($inventario_fisico_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idproducto')
			{

				if($inventario_fisico_detalle_session->bigidproductoActual!=null && $inventario_fisico_detalle_session->bigidproductoActual!=0)
				{
					$this->id_productoFK_Idproducto=$inventario_fisico_detalle_session->bigidproductoActual;
					$inventario_fisico_detalle_session->bigidproductoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->inventario_fisico_detalleLogic->getsFK_Idproducto($finalQueryPaginacion,$this->pagination,$this->id_productoFK_Idproducto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//inventario_fisico_detalleLogicAdditional::getDetalleIndiceFK_Idproducto($this->id_productoFK_Idproducto);


					if($this->inventario_fisico_detalleLogic->getinventario_fisico_detalles()==null || count($this->inventario_fisico_detalleLogic->getinventario_fisico_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$inventario_fisico_detalles=$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->inventario_fisico_detalleLogic->getsFK_Idproducto('',$this->pagination,$this->id_productoFK_Idproducto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->inventario_fisico_detallesReporte=$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteinventario_fisico_detalles("FK_Idproducto",$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->inventario_fisico_detalleLogic->setinventario_fisico_detalles($inventario_fisico_detalles);
					}
				//}

			} 
		
		$inventario_fisico_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$inventario_fisico_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->inventario_fisico_detalleLogic->loadForeignsKeysDescription();*/
		
		$this->inventario_fisico_detalles=$this->inventario_fisico_detalleLogic->getinventario_fisico_detalles();
		
		if($this->inventario_fisico_detallesEliminados==null) {
			$this->inventario_fisico_detallesEliminados=array();
		}
		
		$this->Session->write(inventario_fisico_detalle_util::$STR_SESSION_NAME.'Lista',serialize($this->inventario_fisico_detalles));
		$this->Session->write(inventario_fisico_detalle_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->inventario_fisico_detallesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(inventario_fisico_detalle_util::$STR_SESSION_NAME,serialize($inventario_fisico_detalle_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idinventario_fisico_detalle=$idGeneral;
			
			$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
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
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}

			if(count($this->inventario_fisico_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
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
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_bodegaFK_Idbodega=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idbodega','cmbid_bodega');

			$this->strAccionBusqueda='FK_Idbodega';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
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
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_inventario_fisicoFK_Idinventario_fisico=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idinventario_fisico','cmbid_inventario_fisico');

			$this->strAccionBusqueda='FK_Idinventario_fisico';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdproductoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_productoFK_Idproducto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproducto','cmbid_producto');

			$this->strAccionBusqueda='FK_Idproducto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idbodega($strFinalQuery,$id_bodega)
	{
		try
		{

			$this->inventario_fisico_detalleLogic->getsFK_Idbodega($strFinalQuery,new Pagination(),$id_bodega);
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

			$this->inventario_fisico_detalleLogic->getsFK_Idinventario_fisico($strFinalQuery,new Pagination(),$id_inventario_fisico);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idproducto($strFinalQuery,$id_producto)
	{
		try
		{

			$this->inventario_fisico_detalleLogic->getsFK_Idproducto($strFinalQuery,new Pagination(),$id_producto);
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
			
			
			$inventario_fisico_detalleForeignKey=new inventario_fisico_detalle_param_return(); //inventario_fisico_detalleForeignKey();
			
			$inventario_fisico_detalle_session=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME));
						
			if($inventario_fisico_detalle_session==null) {
				$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$inventario_fisico_detalleForeignKey=$this->inventario_fisico_detalleLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$inventario_fisico_detalle_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_inventario_fisico',$this->strRecargarFkTipos,',')) {
				$this->inventario_fisicosFK=$inventario_fisico_detalleForeignKey->inventario_fisicosFK;
				$this->idinventario_fisicoDefaultFK=$inventario_fisico_detalleForeignKey->idinventario_fisicoDefaultFK;
			}

			if($inventario_fisico_detalle_session->bitBusquedaDesdeFKSesioninventario_fisico) {
				$this->setVisibleBusquedasParainventario_fisico(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$this->strRecargarFkTipos,',')) {
				$this->productosFK=$inventario_fisico_detalleForeignKey->productosFK;
				$this->idproductoDefaultFK=$inventario_fisico_detalleForeignKey->idproductoDefaultFK;
			}

			if($inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionproducto) {
				$this->setVisibleBusquedasParaproducto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$this->strRecargarFkTipos,',')) {
				$this->bodegasFK=$inventario_fisico_detalleForeignKey->bodegasFK;
				$this->idbodegaDefaultFK=$inventario_fisico_detalleForeignKey->idbodegaDefaultFK;
			}

			if($inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionbodega) {
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
	
	function cargarCombosFKFromReturnGeneral($inventario_fisico_detalleReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$inventario_fisico_detalleReturnGeneral->strRecargarFkTipos;
			
			


			if($inventario_fisico_detalleReturnGeneral->con_inventario_fisicosFK==true) {
				$this->inventario_fisicosFK=$inventario_fisico_detalleReturnGeneral->inventario_fisicosFK;
				$this->idinventario_fisicoDefaultFK=$inventario_fisico_detalleReturnGeneral->idinventario_fisicoDefaultFK;
			}


			if($inventario_fisico_detalleReturnGeneral->con_productosFK==true) {
				$this->productosFK=$inventario_fisico_detalleReturnGeneral->productosFK;
				$this->idproductoDefaultFK=$inventario_fisico_detalleReturnGeneral->idproductoDefaultFK;
			}


			if($inventario_fisico_detalleReturnGeneral->con_bodegasFK==true) {
				$this->bodegasFK=$inventario_fisico_detalleReturnGeneral->bodegasFK;
				$this->idbodegaDefaultFK=$inventario_fisico_detalleReturnGeneral->idbodegaDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$inventario_fisico_detalle_session=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME));
		
		if($inventario_fisico_detalle_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($inventario_fisico_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==inventario_fisico_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='inventario_fisico';
			}
			else if($inventario_fisico_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==producto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='producto';
			}
			else if($inventario_fisico_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==bodega_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='bodega';
			}
			
			$inventario_fisico_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}						
			
			$this->inventario_fisico_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->inventario_fisico_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->inventario_fisico_detallesAuxiliar=array();
			}
			
			if(count($this->inventario_fisico_detallesAuxiliar) > 0) {
				
				foreach ($this->inventario_fisico_detallesAuxiliar as $inventario_fisico_detalleSeleccionado) {
					$this->eliminarTablaBase($inventario_fisico_detalleSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
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


	public function getproductosFKListSelectItem() 
	{
		$productosList=array();

		$item=null;

		foreach($this->productosFK as $producto)
		{
			$item=new SelectItem();
			$item->setLabel($producto->getcodigo());
			$item->setValue($producto->getId());
			$productosList[]=$item;
		}

		return $productosList;
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
				$this->inventario_fisico_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;
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
				$this->inventario_fisico_detalleLogic->commitNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->rollbackNewConnexionToDeep();
				$this->inventario_fisico_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$inventario_fisico_detallesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->inventario_fisico_detalles as $inventario_fisico_detalleLocal) {
				if($inventario_fisico_detalleLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->inventario_fisico_detalle=new inventario_fisico_detalle();
				
				$this->inventario_fisico_detalle->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->inventario_fisico_detalles[]=$this->inventario_fisico_detalle;*/
				
				$inventario_fisico_detallesNuevos[]=$this->inventario_fisico_detalle;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('inventario_fisico');$classes[]=$class;
				$class=new Classe('producto');$classes[]=$class;
				$class=new Classe('bodega');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->inventario_fisico_detalleLogic->setinventario_fisico_detalles($inventario_fisico_detallesNuevos);
					
				$this->inventario_fisico_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($inventario_fisico_detallesNuevos as $inventario_fisico_detalleNuevo) {
					$this->inventario_fisico_detalles[]=$inventario_fisico_detalleNuevo;
				}
				
				/*$this->inventario_fisico_detalles[]=$inventario_fisico_detallesNuevos;*/
				
				$this->inventario_fisico_detalleLogic->setinventario_fisico_detalles($this->inventario_fisico_detalles);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($inventario_fisico_detallesNuevos!=null);
	}
					
	
	public function cargarCombosinventario_fisicosFK($connexion=null,$strRecargarFkQuery=''){
		$inventario_fisicoLogic= new inventario_fisico_logic();
		$pagination= new Pagination();
		$this->inventario_fisicosFK=array();

		$inventario_fisicoLogic->setConnexion($connexion);
		$inventario_fisicoLogic->getinventario_fisicoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$inventario_fisico_detalle_session=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME));

		if($inventario_fisico_detalle_session==null) {
			$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
		}
		
		if($inventario_fisico_detalle_session->bitBusquedaDesdeFKSesioninventario_fisico!=true) {
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


			if($inventario_fisico_detalle_session->bigidinventario_fisicoActual!=null && $inventario_fisico_detalle_session->bigidinventario_fisicoActual > 0) {
				$inventario_fisicoLogic->getEntity($inventario_fisico_detalle_session->bigidinventario_fisicoActual);//WithConnection

				$this->inventario_fisicosFK[$inventario_fisicoLogic->getinventario_fisico()->getId()]=inventario_fisico_detalle_util::getinventario_fisicoDescripcion($inventario_fisicoLogic->getinventario_fisico());
				$this->idinventario_fisicoDefaultFK=$inventario_fisicoLogic->getinventario_fisico()->getId();
			}
		}
	}

	public function cargarCombosproductosFK($connexion=null,$strRecargarFkQuery=''){
		$productoLogic= new producto_logic();
		$pagination= new Pagination();
		$this->productosFK=array();

		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$inventario_fisico_detalle_session=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME));

		if($inventario_fisico_detalle_session==null) {
			$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
		}
		
		if($inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionproducto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=producto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalproducto=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproducto=Funciones::GetFinalQueryAppend($finalQueryGlobalproducto, '');
				$finalQueryGlobalproducto.=producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproducto.$strRecargarFkQuery;		

				$productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosproductosFK($productoLogic->getproductos());

		} else {
			$this->setVisibleBusquedasParaproducto(true);


			if($inventario_fisico_detalle_session->bigidproductoActual!=null && $inventario_fisico_detalle_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($inventario_fisico_detalle_session->bigidproductoActual);//WithConnection

				$this->productosFK[$productoLogic->getproducto()->getId()]=inventario_fisico_detalle_util::getproductoDescripcion($productoLogic->getproducto());
				$this->idproductoDefaultFK=$productoLogic->getproducto()->getId();
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

		$inventario_fisico_detalle_session=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME));

		if($inventario_fisico_detalle_session==null) {
			$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
		}
		
		if($inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionbodega!=true) {
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


			if($inventario_fisico_detalle_session->bigidbodegaActual!=null && $inventario_fisico_detalle_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($inventario_fisico_detalle_session->bigidbodegaActual);//WithConnection

				$this->bodegasFK[$bodegaLogic->getbodega()->getId()]=inventario_fisico_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$this->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
			}
		}
	}

	
	
	public function prepararCombosinventario_fisicosFK($inventario_fisicos){

		foreach ($inventario_fisicos as $inventario_fisicoLocal ) {
			if($this->idinventario_fisicoDefaultFK==0) {
				$this->idinventario_fisicoDefaultFK=$inventario_fisicoLocal->getId();
			}

			$this->inventario_fisicosFK[$inventario_fisicoLocal->getId()]=inventario_fisico_detalle_util::getinventario_fisicoDescripcion($inventario_fisicoLocal);
		}
	}

	public function prepararCombosproductosFK($productos){

		foreach ($productos as $productoLocal ) {
			if($this->idproductoDefaultFK==0) {
				$this->idproductoDefaultFK=$productoLocal->getId();
			}

			$this->productosFK[$productoLocal->getId()]=inventario_fisico_detalle_util::getproductoDescripcion($productoLocal);
		}
	}

	public function prepararCombosbodegasFK($bodegas){

		foreach ($bodegas as $bodegaLocal ) {
			if($this->idbodegaDefaultFK==0) {
				$this->idbodegaDefaultFK=$bodegaLocal->getId();
			}

			$this->bodegasFK[$bodegaLocal->getId()]=inventario_fisico_detalle_util::getbodegaDescripcion($bodegaLocal);
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

			$strDescripcioninventario_fisico=inventario_fisico_detalle_util::getinventario_fisicoDescripcion($inventario_fisicoLogic->getinventario_fisico());

		} else {
			$strDescripcioninventario_fisico='null';
		}

		return $strDescripcioninventario_fisico;
	}

	public function cargarDescripcionproductoFK($idproducto,$connexion=null){
		$productoLogic= new producto_logic();
		$productoLogic->setConnexion($connexion);
		$productoLogic->getproductoDataAccess()->isForFKData=true;
		$strDescripcionproducto='';

		if($idproducto!=null && $idproducto!='' && $idproducto!='null') {
			if($connexion!=null) {
				$productoLogic->getEntity($idproducto);//WithConnection
			} else {
				$productoLogic->getEntityWithConnection($idproducto);//
			}

			$strDescripcionproducto=inventario_fisico_detalle_util::getproductoDescripcion($productoLogic->getproducto());

		} else {
			$strDescripcionproducto='null';
		}

		return $strDescripcionproducto;
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

			$strDescripcionbodega=inventario_fisico_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());

		} else {
			$strDescripcionbodega='null';
		}

		return $strDescripcionbodega;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(inventario_fisico_detalle $inventario_fisico_detalleClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
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
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacioninventario_fisico;
	}

	public function setVisibleBusquedasParaproducto($isParaproducto){
		$strParaVisibleproducto='display:table-row';
		$strParaVisibleNegacionproducto='display:none';

		if($isParaproducto) {
			$strParaVisibleproducto='display:table-row';
			$strParaVisibleNegacionproducto='display:none';
		} else {
			$strParaVisibleproducto='display:none';
			$strParaVisibleNegacionproducto='display:table-row';
		}


		$strParaVisibleNegacionproducto=trim($strParaVisibleNegacionproducto);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idinventario_fisico=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idproducto=$strParaVisibleproducto;
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
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionbodega;
	}
	
	

	public function abrirBusquedaParainventario_fisico() {//$idinventario_fisico_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idinventario_fisico_detalleActual=$idinventario_fisico_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.inventario_fisico_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.inventario_fisico_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_inventario_fisico(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',inventario_fisico_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.inventario_fisico_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_inventario_fisico(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(inventario_fisico_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarinventario_fisico_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaproducto() {//$idinventario_fisico_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idinventario_fisico_detalleActual=$idinventario_fisico_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.producto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.inventario_fisico_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.inventario_fisico_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarinventario_fisico_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParabodega() {//$idinventario_fisico_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idinventario_fisico_detalleActual=$idinventario_fisico_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.bodega_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.inventario_fisico_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',bodega_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.inventario_fisico_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(bodega_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarinventario_fisico_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(inventario_fisico_detalle_util::$STR_SESSION_NAME,inventario_fisico_detalle_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$inventario_fisico_detalle_session=$this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME);
				
		if($inventario_fisico_detalle_session==null) {
			$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();		
			//$this->Session->write('inventario_fisico_detalle_session',$inventario_fisico_detalle_session);							
		}
		*/
		
		$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
    	$inventario_fisico_detalle_session->strPathNavegacionActual=inventario_fisico_detalle_util::$STR_CLASS_WEB_TITULO;
    	$inventario_fisico_detalle_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(inventario_fisico_detalle_util::$STR_SESSION_NAME,serialize($inventario_fisico_detalle_session));		
	}	
	
	public function getSetBusquedasSesionConfig(inventario_fisico_detalle_session $inventario_fisico_detalle_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
			if($inventario_fisico_detalle_session->bigIdActualFK!=null && $inventario_fisico_detalle_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$inventario_fisico_detalle_session->bigIdActualFKParaPosibleAtras=$inventario_fisico_detalle_session->bigIdActualFK;*/
			}
				
			$inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(inventario_fisico_detalle_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($inventario_fisico_detalle_session->bitBusquedaDesdeFKSesioninventario_fisico!=null && $inventario_fisico_detalle_session->bitBusquedaDesdeFKSesioninventario_fisico==true)
			{
				if($inventario_fisico_detalle_session->bigidinventario_fisicoActual!=0) {
					$this->strAccionBusqueda='FK_Idinventario_fisico';

					$existe_history=HistoryWeb::ExisteElemento(inventario_fisico_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(inventario_fisico_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(inventario_fisico_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($inventario_fisico_detalle_session->bigidinventario_fisicoActualDescripcion);
						$historyWeb->setIdActual($inventario_fisico_detalle_session->bigidinventario_fisicoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=inventario_fisico_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$inventario_fisico_detalle_session->bigidinventario_fisicoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$inventario_fisico_detalle_session->bitBusquedaDesdeFKSesioninventario_fisico=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;

				if($inventario_fisico_detalle_session->intNumeroPaginacion==inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$inventario_fisico_detalle_session->intNumeroPaginacion;
				}
			}
			else if($inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionproducto!=null && $inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionproducto==true)
			{
				if($inventario_fisico_detalle_session->bigidproductoActual!=0) {
					$this->strAccionBusqueda='FK_Idproducto';

					$existe_history=HistoryWeb::ExisteElemento(inventario_fisico_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(inventario_fisico_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(inventario_fisico_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($inventario_fisico_detalle_session->bigidproductoActualDescripcion);
						$historyWeb->setIdActual($inventario_fisico_detalle_session->bigidproductoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=inventario_fisico_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$inventario_fisico_detalle_session->bigidproductoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionproducto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;

				if($inventario_fisico_detalle_session->intNumeroPaginacion==inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$inventario_fisico_detalle_session->intNumeroPaginacion;
				}
			}
			else if($inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionbodega!=null && $inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionbodega==true)
			{
				if($inventario_fisico_detalle_session->bigidbodegaActual!=0) {
					$this->strAccionBusqueda='FK_Idbodega';

					$existe_history=HistoryWeb::ExisteElemento(inventario_fisico_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(inventario_fisico_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(inventario_fisico_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($inventario_fisico_detalle_session->bigidbodegaActualDescripcion);
						$historyWeb->setIdActual($inventario_fisico_detalle_session->bigidbodegaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=inventario_fisico_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$inventario_fisico_detalle_session->bigidbodegaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$inventario_fisico_detalle_session->bitBusquedaDesdeFKSesionbodega=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;

				if($inventario_fisico_detalle_session->intNumeroPaginacion==inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=inventario_fisico_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$inventario_fisico_detalle_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$inventario_fisico_detalle_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$inventario_fisico_detalle_session=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME));
		
		if($inventario_fisico_detalle_session==null) {
			$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
		}
		
		$inventario_fisico_detalle_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$inventario_fisico_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$inventario_fisico_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idbodega') {
			$inventario_fisico_detalle_session->id_bodega=$this->id_bodegaFK_Idbodega;	

		}
		else if($this->strAccionBusqueda=='FK_Idinventario_fisico') {
			$inventario_fisico_detalle_session->id_inventario_fisico=$this->id_inventario_fisicoFK_Idinventario_fisico;	

		}
		else if($this->strAccionBusqueda=='FK_Idproducto') {
			$inventario_fisico_detalle_session->id_producto=$this->id_productoFK_Idproducto;	

		}
		
		$this->Session->write(inventario_fisico_detalle_util::$STR_SESSION_NAME,serialize($inventario_fisico_detalle_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(inventario_fisico_detalle_session $inventario_fisico_detalle_session) {
		
		if($inventario_fisico_detalle_session==null) {
			$inventario_fisico_detalle_session=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME));
		}
		
		if($inventario_fisico_detalle_session==null) {
		   $inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
		}
		
		if($inventario_fisico_detalle_session->strUltimaBusqueda!=null && $inventario_fisico_detalle_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$inventario_fisico_detalle_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$inventario_fisico_detalle_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$inventario_fisico_detalle_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idbodega') {
				$this->id_bodegaFK_Idbodega=$inventario_fisico_detalle_session->id_bodega;
				$inventario_fisico_detalle_session->id_bodega=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idinventario_fisico') {
				$this->id_inventario_fisicoFK_Idinventario_fisico=$inventario_fisico_detalle_session->id_inventario_fisico;
				$inventario_fisico_detalle_session->id_inventario_fisico=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idproducto') {
				$this->id_productoFK_Idproducto=$inventario_fisico_detalle_session->id_producto;
				$inventario_fisico_detalle_session->id_producto=-1;

			}
		}
		
		$inventario_fisico_detalle_session->strUltimaBusqueda='';
		//$inventario_fisico_detalle_session->intNumeroPaginacion=10;
		$inventario_fisico_detalle_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(inventario_fisico_detalle_util::$STR_SESSION_NAME,serialize($inventario_fisico_detalle_session));		
	}
	
	public function inventario_fisico_detallesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idinventario_fisicoDefaultFK = 0;
		$this->idproductoDefaultFK = 0;
		$this->idbodegaDefaultFK = 0;
	}
	
	public function setinventario_fisico_detalleFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_inventario_fisico',$this->idinventario_fisicoDefaultFK);
		$this->setExistDataCampoForm('form','id_producto',$this->idproductoDefaultFK);
		$this->setExistDataCampoForm('form','id_bodega',$this->idbodegaDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		inventario_fisico::$class;
		inventario_fisico_carga::$CONTROLLER;

		producto::$class;
		producto_carga::$CONTROLLER;

		bodega::$class;
		bodega_carga::$CONTROLLER;
		
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
		interface inventario_fisico_detalle_controlI {	
		
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
		
		public function onLoad(inventario_fisico_detalle_session $inventario_fisico_detalle_session=null);	
		function index(?string $strTypeOnLoadinventario_fisico_detalle='',?string $strTipoPaginaAuxiliarinventario_fisico_detalle='',?string $strTipoUsuarioAuxiliarinventario_fisico_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadinventario_fisico_detalle='',string $strTipoPaginaAuxiliarinventario_fisico_detalle='',string $strTipoUsuarioAuxiliarinventario_fisico_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($inventario_fisico_detalleReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(inventario_fisico_detalle $inventario_fisico_detalleClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(inventario_fisico_detalle_session $inventario_fisico_detalle_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(inventario_fisico_detalle_session $inventario_fisico_detalle_session);	
		public function inventario_fisico_detallesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setinventario_fisico_detalleFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
