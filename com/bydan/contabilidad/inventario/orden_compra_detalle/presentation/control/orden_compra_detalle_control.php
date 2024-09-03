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

namespace com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\control;

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

use com\bydan\contabilidad\inventario\orden_compra_detalle\business\entity\orden_compra_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/orden_compra_detalle/util/orden_compra_detalle_carga.php');
use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_carga;

use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_util;
use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_param_return;
use com\bydan\contabilidad\inventario\orden_compra_detalle\business\logic\orden_compra_detalle_logic;
use com\bydan\contabilidad\inventario\orden_compra_detalle\business\logic\orden_compra_detalle_logic_add;
use com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\session\orden_compra_detalle_session;


//FK


use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\business\logic\unidad_logic;
use com\bydan\contabilidad\inventario\unidad\util\unidad_carga;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
orden_compra_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
orden_compra_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
orden_compra_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
orden_compra_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*orden_compra_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/inventario/orden_compra_detalle/presentation/control/orden_compra_detalle_init_control.php');
use com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\control\orden_compra_detalle_init_control;

include_once('com/bydan/contabilidad/inventario/orden_compra_detalle/presentation/control/orden_compra_detalle_base_control.php');
use com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\control\orden_compra_detalle_base_control;

class orden_compra_detalle_control extends orden_compra_detalle_base_control {	
	
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
			else if($action=="FK_Idorden_compra"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idorden_compraParaProcesar();
			}
			else if($action=="FK_Idproducto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdproductoParaProcesar();
			}
			else if($action=="FK_Idunidad"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdunidadParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaorden_compra') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idorden_compra_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaorden_compra();//$idorden_compra_detalleActual
			}
			else if($action=='abrirBusquedaParabodega') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idorden_compra_detalleActual=$this->getDataId();
				$this->abrirBusquedaParabodega();//$idorden_compra_detalleActual
			}
			else if($action=='abrirBusquedaParaproducto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idorden_compra_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaproducto();//$idorden_compra_detalleActual
			}
			else if($action=='abrirBusquedaParaunidad') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idorden_compra_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaunidad();//$idorden_compra_detalleActual
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
					
					$orden_compra_detalleController = new orden_compra_detalle_control();
					
					$orden_compra_detalleController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($orden_compra_detalleController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$orden_compra_detalleController = new orden_compra_detalle_control();
						$orden_compra_detalleController = $this;
						
						$jsonResponse = json_encode($orden_compra_detalleController->orden_compra_detalles);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->orden_compra_detalleReturnGeneral==null) {
					$this->orden_compra_detalleReturnGeneral=new orden_compra_detalle_param_return();
				}
				
				echo($this->orden_compra_detalleReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$orden_compra_detalleController=new orden_compra_detalle_control();
		
		$orden_compra_detalleController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$orden_compra_detalleController->usuarioActual=new usuario();
		
		$orden_compra_detalleController->usuarioActual->setId($this->usuarioActual->getId());
		$orden_compra_detalleController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$orden_compra_detalleController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$orden_compra_detalleController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$orden_compra_detalleController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$orden_compra_detalleController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$orden_compra_detalleController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$orden_compra_detalleController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $orden_compra_detalleController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadorden_compra_detalle= $this->getDataGeneralString('strTypeOnLoadorden_compra_detalle');
		$strTipoPaginaAuxiliarorden_compra_detalle= $this->getDataGeneralString('strTipoPaginaAuxiliarorden_compra_detalle');
		$strTipoUsuarioAuxiliarorden_compra_detalle= $this->getDataGeneralString('strTipoUsuarioAuxiliarorden_compra_detalle');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadorden_compra_detalle,$strTipoPaginaAuxiliarorden_compra_detalle,$strTipoUsuarioAuxiliarorden_compra_detalle,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadorden_compra_detalle!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('orden_compra_detalle','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(orden_compra_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarorden_compra_detalle,$this->strTipoUsuarioAuxiliarorden_compra_detalle,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(orden_compra_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarorden_compra_detalle,$this->strTipoUsuarioAuxiliarorden_compra_detalle,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->orden_compra_detalleReturnGeneral=new orden_compra_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->orden_compra_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->orden_compra_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->orden_compra_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->orden_compra_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->orden_compra_detalleReturnGeneral);
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
		$this->orden_compra_detalleReturnGeneral=new orden_compra_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->orden_compra_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->orden_compra_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->orden_compra_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->orden_compra_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->orden_compra_detalleReturnGeneral);
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
		$this->orden_compra_detalleReturnGeneral=new orden_compra_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->orden_compra_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->orden_compra_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->orden_compra_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->orden_compra_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->orden_compra_detalleReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
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
			
			
			$this->orden_compra_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->orden_compra_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->orden_compra_detalleReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->orden_compra_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->orden_compra_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->orden_compra_detalleReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->orden_compra_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->orden_compra_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->orden_compra_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->orden_compra_detalleReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->orden_compra_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->orden_compra_detalleReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->orden_compra_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->orden_compra_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->orden_compra_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->orden_compra_detalleReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->orden_compra_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->orden_compra_detalleReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
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
		
		$this->orden_compra_detalleLogic=new orden_compra_detalle_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->orden_compra_detalle=new orden_compra_detalle();
		
		$this->strTypeOnLoadorden_compra_detalle='onload';
		$this->strTipoPaginaAuxiliarorden_compra_detalle='none';
		$this->strTipoUsuarioAuxiliarorden_compra_detalle='none';	

		$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;
		
		$this->orden_compra_detalleModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->orden_compra_detalleControllerAdditional=new orden_compra_detalle_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(orden_compra_detalle_session $orden_compra_detalle_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($orden_compra_detalle_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadorden_compra_detalle='',?string $strTipoPaginaAuxiliarorden_compra_detalle='',?string $strTipoUsuarioAuxiliarorden_compra_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadorden_compra_detalle=$strTypeOnLoadorden_compra_detalle;
			$this->strTipoPaginaAuxiliarorden_compra_detalle=$strTipoPaginaAuxiliarorden_compra_detalle;
			$this->strTipoUsuarioAuxiliarorden_compra_detalle=$strTipoUsuarioAuxiliarorden_compra_detalle;
	
			if($strTipoUsuarioAuxiliarorden_compra_detalle=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->orden_compra_detalle=new orden_compra_detalle();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Compras Detalles';
			
			
			$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));
							
			if($orden_compra_detalle_session==null) {
				$orden_compra_detalle_session=new orden_compra_detalle_session();
				
				/*$this->Session->write('orden_compra_detalle_session',$orden_compra_detalle_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($orden_compra_detalle_session->strFuncionJsPadre!=null && $orden_compra_detalle_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$orden_compra_detalle_session->strFuncionJsPadre;
				
				$orden_compra_detalle_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($orden_compra_detalle_session);
			
			if($strTypeOnLoadorden_compra_detalle!=null && $strTypeOnLoadorden_compra_detalle=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$orden_compra_detalle_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$orden_compra_detalle_session->setPaginaPopupVariables(true);
				}
				
				if($orden_compra_detalle_session->intNumeroPaginacion==orden_compra_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$orden_compra_detalle_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,orden_compra_detalle_util::$STR_SESSION_NAME,'inventario');																
			
			} else if($strTypeOnLoadorden_compra_detalle!=null && $strTypeOnLoadorden_compra_detalle=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$orden_compra_detalle_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;*/
				
				if($orden_compra_detalle_session->intNumeroPaginacion==orden_compra_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$orden_compra_detalle_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarorden_compra_detalle!=null && $strTipoPaginaAuxiliarorden_compra_detalle=='none') {
				/*$orden_compra_detalle_session->strStyleDivHeader='display:table-row';*/
				
				/*$orden_compra_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarorden_compra_detalle!=null && $strTipoPaginaAuxiliarorden_compra_detalle=='iframe') {
					/*
					$orden_compra_detalle_session->strStyleDivArbol='display:none';
					$orden_compra_detalle_session->strStyleDivHeader='display:none';
					$orden_compra_detalle_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$orden_compra_detalle_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->orden_compra_detalleClase=new orden_compra_detalle();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=orden_compra_detalle_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(orden_compra_detalle_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->orden_compra_detalleLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->orden_compra_detalleLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->orden_compra_detalleLogic=new orden_compra_detalle_logic();*/
			
			
			$this->orden_compra_detallesModel=null;
			/*new ListDataModel();*/
			
			/*$this->orden_compra_detallesModel.setWrappedData(orden_compra_detalleLogic->getorden_compra_detalles());*/
						
			$this->orden_compra_detalles= array();
			$this->orden_compra_detallesEliminados=array();
			$this->orden_compra_detallesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= orden_compra_detalle_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->orden_compra_detalle= new orden_compra_detalle();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idbodega='display:table-row';
			$this->strVisibleFK_Idorden_compra='display:table-row';
			$this->strVisibleFK_Idproducto='display:table-row';
			$this->strVisibleFK_Idunidad='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarorden_compra_detalle!=null && $strTipoUsuarioAuxiliarorden_compra_detalle!='none' && $strTipoUsuarioAuxiliarorden_compra_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarorden_compra_detalle);
																
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
				if($strTipoUsuarioAuxiliarorden_compra_detalle!=null && $strTipoUsuarioAuxiliarorden_compra_detalle!='none' && $strTipoUsuarioAuxiliarorden_compra_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarorden_compra_detalle);
																
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
				if($strTipoUsuarioAuxiliarorden_compra_detalle==null || $strTipoUsuarioAuxiliarorden_compra_detalle=='none' || $strTipoUsuarioAuxiliarorden_compra_detalle=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarorden_compra_detalle,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, orden_compra_detalle_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, orden_compra_detalle_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina orden_compra_detalle');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($orden_compra_detalle_session);
			
			$this->getSetBusquedasSesionConfig($orden_compra_detalle_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteorden_compra_detalles($this->strAccionBusqueda,$this->orden_compra_detalleLogic->getorden_compra_detalles());*/
				} else if($this->strGenerarReporte=='Html')	{
					$orden_compra_detalle_session->strServletGenerarHtmlReporte='orden_compra_detalleServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(orden_compra_detalle_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(orden_compra_detalle_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($orden_compra_detalle_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarorden_compra_detalle!=null && $strTipoUsuarioAuxiliarorden_compra_detalle=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($orden_compra_detalle_session);
			}
								
			$this->set(orden_compra_detalle_util::$STR_SESSION_NAME, $orden_compra_detalle_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($orden_compra_detalle_session);
			
			/*
			$this->orden_compra_detalle->recursive = 0;
			
			$this->orden_compra_detalles=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('orden_compra_detalles', $this->orden_compra_detalles);
			
			$this->set(orden_compra_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->orden_compra_detalleActual =$this->orden_compra_detalleClase;
			
			/*$this->orden_compra_detalleActual =$this->migrarModelorden_compra_detalle($this->orden_compra_detalleClase);*/
			
			$this->returnHtml(false);
			
			$this->set(orden_compra_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=orden_compra_detalle_util::$STR_NOMBRE_OPCION;
				
			if(orden_compra_detalle_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=orden_compra_detalle_util::$STR_MODULO_OPCION.orden_compra_detalle_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(orden_compra_detalle_util::$STR_SESSION_NAME,serialize($orden_compra_detalle_session));
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
			/*$orden_compra_detalleClase= (orden_compra_detalle) orden_compra_detallesModel.getRowData();*/
			
			$this->orden_compra_detalleClase->setId($this->orden_compra_detalle->getId());	
			$this->orden_compra_detalleClase->setVersionRow($this->orden_compra_detalle->getVersionRow());	
			$this->orden_compra_detalleClase->setVersionRow($this->orden_compra_detalle->getVersionRow());	
			$this->orden_compra_detalleClase->setid_orden_compra($this->orden_compra_detalle->getid_orden_compra());	
			$this->orden_compra_detalleClase->setid_bodega($this->orden_compra_detalle->getid_bodega());	
			$this->orden_compra_detalleClase->setid_producto($this->orden_compra_detalle->getid_producto());	
			$this->orden_compra_detalleClase->setid_unidad($this->orden_compra_detalle->getid_unidad());	
			$this->orden_compra_detalleClase->setcantidad($this->orden_compra_detalle->getcantidad());	
			$this->orden_compra_detalleClase->setprecio($this->orden_compra_detalle->getprecio());	
			$this->orden_compra_detalleClase->setsub_total($this->orden_compra_detalle->getsub_total());	
			$this->orden_compra_detalleClase->setdescuento_porciento($this->orden_compra_detalle->getdescuento_porciento());	
			$this->orden_compra_detalleClase->setdescuento_monto($this->orden_compra_detalle->getdescuento_monto());	
			$this->orden_compra_detalleClase->setiva_porciento($this->orden_compra_detalle->getiva_porciento());	
			$this->orden_compra_detalleClase->setiva_monto($this->orden_compra_detalle->getiva_monto());	
			$this->orden_compra_detalleClase->settotal($this->orden_compra_detalle->gettotal());	
			$this->orden_compra_detalleClase->setobservacion($this->orden_compra_detalle->getobservacion());	
			$this->orden_compra_detalleClase->setrecibido($this->orden_compra_detalle->getrecibido());	
			$this->orden_compra_detalleClase->setimpuesto2_porciento($this->orden_compra_detalle->getimpuesto2_porciento());	
			$this->orden_compra_detalleClase->setimpuesto2_monto($this->orden_compra_detalle->getimpuesto2_monto());	
		
			/*$this->Session->write('orden_compra_detalleVersionRowActual', orden_compra_detalle.getVersionRow());*/
			
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
			
			$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));
						
			if($orden_compra_detalle_session==null) {
				$orden_compra_detalle_session=new orden_compra_detalle_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('orden_compra_detalle', $this->orden_compra_detalle->read(null, $id));
	
			
			$this->orden_compra_detalle->recursive = 0;
			
			$this->orden_compra_detalles=$this->paginate();
			
			$this->set('orden_compra_detalles', $this->orden_compra_detalles);
	
			if (empty($this->data)) {
				$this->data = $this->orden_compra_detalle->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->orden_compra_detalleLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->orden_compra_detalleClase);
			
			$this->orden_compra_detalleActual=$this->orden_compra_detalleClase;
			
			/*$this->orden_compra_detalleActual =$this->migrarModelorden_compra_detalle($this->orden_compra_detalleClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->orden_compra_detalleLogic->getorden_compra_detalles(),$this->orden_compra_detalleActual);
			
			$this->actualizarControllerConReturnGeneral($this->orden_compra_detalleReturnGeneral);
			
			//$this->orden_compra_detalleReturnGeneral=$this->orden_compra_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->orden_compra_detalleLogic->getorden_compra_detalles(),$this->orden_compra_detalleActual,$this->orden_compra_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));
						
			if($orden_compra_detalle_session==null) {
				$orden_compra_detalle_session=new orden_compra_detalle_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoorden_compra_detalle', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->orden_compra_detalleClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->orden_compra_detalleClase);
			
			$this->orden_compra_detalleActual =$this->orden_compra_detalleClase;
			
			/*$this->orden_compra_detalleActual =$this->migrarModelorden_compra_detalle($this->orden_compra_detalleClase);*/
			
			$this->setorden_compra_detalleFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->orden_compra_detalleLogic->getorden_compra_detalles(),$this->orden_compra_detalle);
			
			$this->actualizarControllerConReturnGeneral($this->orden_compra_detalleReturnGeneral);
			
			//this->orden_compra_detalleReturnGeneral=$this->orden_compra_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->orden_compra_detalleLogic->getorden_compra_detalles(),$this->orden_compra_detalle,$this->orden_compra_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idorden_compraDefaultFK!=null && $this->idorden_compraDefaultFK > -1) {
				$this->orden_compra_detalleReturnGeneral->getorden_compra_detalle()->setid_orden_compra($this->idorden_compraDefaultFK);
			}

			if($this->idbodegaDefaultFK!=null && $this->idbodegaDefaultFK > -1) {
				$this->orden_compra_detalleReturnGeneral->getorden_compra_detalle()->setid_bodega($this->idbodegaDefaultFK);
			}

			if($this->idproductoDefaultFK!=null && $this->idproductoDefaultFK > -1) {
				$this->orden_compra_detalleReturnGeneral->getorden_compra_detalle()->setid_producto($this->idproductoDefaultFK);
			}

			if($this->idunidadDefaultFK!=null && $this->idunidadDefaultFK > -1) {
				$this->orden_compra_detalleReturnGeneral->getorden_compra_detalle()->setid_unidad($this->idunidadDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->orden_compra_detalleReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->orden_compra_detalleReturnGeneral->getorden_compra_detalle(),$this->orden_compra_detalleActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyorden_compra_detalle($this->orden_compra_detalleReturnGeneral->getorden_compra_detalle());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioorden_compra_detalle($this->orden_compra_detalleReturnGeneral->getorden_compra_detalle());*/
			}
			
			if($this->orden_compra_detalleReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->orden_compra_detalleReturnGeneral->getorden_compra_detalle(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualorden_compra_detalle($this->orden_compra_detalle,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->orden_compra_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->orden_compra_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->orden_compra_detallesAuxiliar=array();
			}
			
			if(count($this->orden_compra_detallesAuxiliar)==2) {
				$orden_compra_detalleOrigen=$this->orden_compra_detallesAuxiliar[0];
				$orden_compra_detalleDestino=$this->orden_compra_detallesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($orden_compra_detalleOrigen,$orden_compra_detalleDestino,true,false,false);
				
				$this->actualizarLista($orden_compra_detalleDestino,$this->orden_compra_detalles);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->orden_compra_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->orden_compra_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->orden_compra_detallesAuxiliar=array();
			}
			
			if(count($this->orden_compra_detallesAuxiliar) > 0) {
				foreach ($this->orden_compra_detallesAuxiliar as $orden_compra_detalleSeleccionado) {
					$this->orden_compra_detalle=new orden_compra_detalle();
					
					$this->setCopiarVariablesObjetos($orden_compra_detalleSeleccionado,$this->orden_compra_detalle,true,true,false);
						
					$this->orden_compra_detalles[]=$this->orden_compra_detalle;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->orden_compra_detallesEliminados as $orden_compra_detalleEliminado) {
				$this->orden_compra_detalleLogic->orden_compra_detalles[]=$orden_compra_detalleEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->orden_compra_detalle=new orden_compra_detalle();
							
				$this->orden_compra_detalles[]=$this->orden_compra_detalle;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
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
		
		$orden_compra_detalleActual=new orden_compra_detalle();
		
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
				
				$orden_compra_detalleActual=$this->orden_compra_detalles[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setid_orden_compra((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setid_bodega((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setid_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setid_unidad((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setcantidad((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setprecio((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setsub_total((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setdescuento_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setdescuento_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setiva_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setiva_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $orden_compra_detalleActual->settotal((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setobservacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setrecibido((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setimpuesto2_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $orden_compra_detalleActual->setimpuesto2_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
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
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadorden_compra_detalle='',string $strTipoPaginaAuxiliarorden_compra_detalle='',string $strTipoUsuarioAuxiliarorden_compra_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadorden_compra_detalle,$strTipoPaginaAuxiliarorden_compra_detalle,$strTipoUsuarioAuxiliarorden_compra_detalle,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->orden_compra_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=orden_compra_detalle_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=orden_compra_detalle_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=orden_compra_detalle_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));
						
			if($orden_compra_detalle_session==null) {
				$orden_compra_detalle_session=new orden_compra_detalle_session();
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
					/*$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;*/
					
					if($orden_compra_detalle_session->intNumeroPaginacion==orden_compra_detalle_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$orden_compra_detalle_session->intNumeroPaginacion;
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
			
			$this->orden_compra_detallesEliminados=array();
			
			/*$this->orden_compra_detalleLogic->setConnexion($connexion);*/
			
			$this->orden_compra_detalleLogic->setIsConDeep(true);
			
			$this->orden_compra_detalleLogic->getorden_compra_detalleDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('orden_compra');$classes[]=$class;
			$class=new Classe('bodega');$classes[]=$class;
			$class=new Classe('producto');$classes[]=$class;
			$class=new Classe('unidad');$classes[]=$class;
			
			$this->orden_compra_detalleLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->orden_compra_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->orden_compra_detalleLogic->getorden_compra_detalles()==null|| count($this->orden_compra_detalleLogic->getorden_compra_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->orden_compra_detalles=$this->orden_compra_detalleLogic->getorden_compra_detalles();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->orden_compra_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->orden_compra_detallesReporte=$this->orden_compra_detalleLogic->getorden_compra_detalles();
									
						/*$this->generarReportes('Todos',$this->orden_compra_detalleLogic->getorden_compra_detalles());*/
					
						$this->orden_compra_detalleLogic->setorden_compra_detalles($this->orden_compra_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->orden_compra_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->orden_compra_detalleLogic->getorden_compra_detalles()==null|| count($this->orden_compra_detalleLogic->getorden_compra_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->orden_compra_detalles=$this->orden_compra_detalleLogic->getorden_compra_detalles();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->orden_compra_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->orden_compra_detallesReporte=$this->orden_compra_detalleLogic->getorden_compra_detalles();
									
						/*$this->generarReportes('Todos',$this->orden_compra_detalleLogic->getorden_compra_detalles());*/
					
						$this->orden_compra_detalleLogic->setorden_compra_detalles($this->orden_compra_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idorden_compra_detalle=0;*/
				
				if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $orden_compra_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
					if($orden_compra_detalle_session->bigIdActualFK!=null && $orden_compra_detalle_session->bigIdActualFK!=0)	{
						$this->idorden_compra_detalle=$orden_compra_detalle_session->bigIdActualFK;	
					}
					
					$orden_compra_detalle_session->bitBusquedaDesdeFKSesionFK=false;
					
					$orden_compra_detalle_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idorden_compra_detalle=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idorden_compra_detalle=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->orden_compra_detalleLogic->getEntity($this->idorden_compra_detalle);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*orden_compra_detalleLogicAdditional::getDetalleIndicePorId($idorden_compra_detalle);*/

				
				if($this->orden_compra_detalleLogic->getorden_compra_detalle()!=null) {
					$this->orden_compra_detalleLogic->setorden_compra_detalles(array());
					$this->orden_compra_detalleLogic->orden_compra_detalles[]=$this->orden_compra_detalleLogic->getorden_compra_detalle();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idbodega')
			{

				if($orden_compra_detalle_session->bigidbodegaActual!=null && $orden_compra_detalle_session->bigidbodegaActual!=0)
				{
					$this->id_bodegaFK_Idbodega=$orden_compra_detalle_session->bigidbodegaActual;
					$orden_compra_detalle_session->bigidbodegaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->orden_compra_detalleLogic->getsFK_Idbodega($finalQueryPaginacion,$this->pagination,$this->id_bodegaFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//orden_compra_detalleLogicAdditional::getDetalleIndiceFK_Idbodega($this->id_bodegaFK_Idbodega);


					if($this->orden_compra_detalleLogic->getorden_compra_detalles()==null || count($this->orden_compra_detalleLogic->getorden_compra_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$orden_compra_detalles=$this->orden_compra_detalleLogic->getorden_compra_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->orden_compra_detalleLogic->getsFK_Idbodega('',$this->pagination,$this->id_bodegaFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->orden_compra_detallesReporte=$this->orden_compra_detalleLogic->getorden_compra_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteorden_compra_detalles("FK_Idbodega",$this->orden_compra_detalleLogic->getorden_compra_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->orden_compra_detalleLogic->setorden_compra_detalles($orden_compra_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idorden_compra')
			{

				if($orden_compra_detalle_session->bigidorden_compraActual!=null && $orden_compra_detalle_session->bigidorden_compraActual!=0)
				{
					$this->id_orden_compraFK_Idorden_compra=$orden_compra_detalle_session->bigidorden_compraActual;
					$orden_compra_detalle_session->bigidorden_compraActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->orden_compra_detalleLogic->getsFK_Idorden_compra($finalQueryPaginacion,$this->pagination,$this->id_orden_compraFK_Idorden_compra);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//orden_compra_detalleLogicAdditional::getDetalleIndiceFK_Idorden_compra($this->id_orden_compraFK_Idorden_compra);


					if($this->orden_compra_detalleLogic->getorden_compra_detalles()==null || count($this->orden_compra_detalleLogic->getorden_compra_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$orden_compra_detalles=$this->orden_compra_detalleLogic->getorden_compra_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->orden_compra_detalleLogic->getsFK_Idorden_compra('',$this->pagination,$this->id_orden_compraFK_Idorden_compra);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->orden_compra_detallesReporte=$this->orden_compra_detalleLogic->getorden_compra_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteorden_compra_detalles("FK_Idorden_compra",$this->orden_compra_detalleLogic->getorden_compra_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->orden_compra_detalleLogic->setorden_compra_detalles($orden_compra_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idproducto')
			{

				if($orden_compra_detalle_session->bigidproductoActual!=null && $orden_compra_detalle_session->bigidproductoActual!=0)
				{
					$this->id_productoFK_Idproducto=$orden_compra_detalle_session->bigidproductoActual;
					$orden_compra_detalle_session->bigidproductoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->orden_compra_detalleLogic->getsFK_Idproducto($finalQueryPaginacion,$this->pagination,$this->id_productoFK_Idproducto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//orden_compra_detalleLogicAdditional::getDetalleIndiceFK_Idproducto($this->id_productoFK_Idproducto);


					if($this->orden_compra_detalleLogic->getorden_compra_detalles()==null || count($this->orden_compra_detalleLogic->getorden_compra_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$orden_compra_detalles=$this->orden_compra_detalleLogic->getorden_compra_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->orden_compra_detalleLogic->getsFK_Idproducto('',$this->pagination,$this->id_productoFK_Idproducto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->orden_compra_detallesReporte=$this->orden_compra_detalleLogic->getorden_compra_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteorden_compra_detalles("FK_Idproducto",$this->orden_compra_detalleLogic->getorden_compra_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->orden_compra_detalleLogic->setorden_compra_detalles($orden_compra_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idunidad')
			{

				if($orden_compra_detalle_session->bigidunidadActual!=null && $orden_compra_detalle_session->bigidunidadActual!=0)
				{
					$this->id_unidadFK_Idunidad=$orden_compra_detalle_session->bigidunidadActual;
					$orden_compra_detalle_session->bigidunidadActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->orden_compra_detalleLogic->getsFK_Idunidad($finalQueryPaginacion,$this->pagination,$this->id_unidadFK_Idunidad);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//orden_compra_detalleLogicAdditional::getDetalleIndiceFK_Idunidad($this->id_unidadFK_Idunidad);


					if($this->orden_compra_detalleLogic->getorden_compra_detalles()==null || count($this->orden_compra_detalleLogic->getorden_compra_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$orden_compra_detalles=$this->orden_compra_detalleLogic->getorden_compra_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->orden_compra_detalleLogic->getsFK_Idunidad('',$this->pagination,$this->id_unidadFK_Idunidad);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->orden_compra_detallesReporte=$this->orden_compra_detalleLogic->getorden_compra_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteorden_compra_detalles("FK_Idunidad",$this->orden_compra_detalleLogic->getorden_compra_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->orden_compra_detalleLogic->setorden_compra_detalles($orden_compra_detalles);
					}
				//}

			} 
		
		$orden_compra_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$orden_compra_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->orden_compra_detalleLogic->loadForeignsKeysDescription();*/
		
		$this->orden_compra_detalles=$this->orden_compra_detalleLogic->getorden_compra_detalles();
		
		if($this->orden_compra_detallesEliminados==null) {
			$this->orden_compra_detallesEliminados=array();
		}
		
		$this->Session->write(orden_compra_detalle_util::$STR_SESSION_NAME.'Lista',serialize($this->orden_compra_detalles));
		$this->Session->write(orden_compra_detalle_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->orden_compra_detallesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(orden_compra_detalle_util::$STR_SESSION_NAME,serialize($orden_compra_detalle_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idorden_compra_detalle=$idGeneral;
			
			$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
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
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}

			if(count($this->orden_compra_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
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
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_bodegaFK_Idbodega=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idbodega','cmbid_bodega');

			$this->strAccionBusqueda='FK_Idbodega';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idorden_compraParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_orden_compraFK_Idorden_compra=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idorden_compra','cmbid_orden_compra');

			$this->strAccionBusqueda='FK_Idorden_compra';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
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
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_productoFK_Idproducto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproducto','cmbid_producto');

			$this->strAccionBusqueda='FK_Idproducto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdunidadParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_unidadFK_Idunidad=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idunidad','cmbid_unidad');

			$this->strAccionBusqueda='FK_Idunidad';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idbodega($strFinalQuery,$id_bodega)
	{
		try
		{

			$this->orden_compra_detalleLogic->getsFK_Idbodega($strFinalQuery,new Pagination(),$id_bodega);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idorden_compra($strFinalQuery,$id_orden_compra)
	{
		try
		{

			$this->orden_compra_detalleLogic->getsFK_Idorden_compra($strFinalQuery,new Pagination(),$id_orden_compra);
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

			$this->orden_compra_detalleLogic->getsFK_Idproducto($strFinalQuery,new Pagination(),$id_producto);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idunidad($strFinalQuery,$id_unidad)
	{
		try
		{

			$this->orden_compra_detalleLogic->getsFK_Idunidad($strFinalQuery,new Pagination(),$id_unidad);
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
			
			
			$orden_compra_detalleForeignKey=new orden_compra_detalle_param_return(); //orden_compra_detalleForeignKey();
			
			$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));
						
			if($orden_compra_detalle_session==null) {
				$orden_compra_detalle_session=new orden_compra_detalle_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$orden_compra_detalleForeignKey=$this->orden_compra_detalleLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$orden_compra_detalle_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_orden_compra',$this->strRecargarFkTipos,',')) {
				$this->orden_comprasFK=$orden_compra_detalleForeignKey->orden_comprasFK;
				$this->idorden_compraDefaultFK=$orden_compra_detalleForeignKey->idorden_compraDefaultFK;
			}

			if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionorden_compra) {
				$this->setVisibleBusquedasParaorden_compra(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$this->strRecargarFkTipos,',')) {
				$this->bodegasFK=$orden_compra_detalleForeignKey->bodegasFK;
				$this->idbodegaDefaultFK=$orden_compra_detalleForeignKey->idbodegaDefaultFK;
			}

			if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionbodega) {
				$this->setVisibleBusquedasParabodega(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$this->strRecargarFkTipos,',')) {
				$this->productosFK=$orden_compra_detalleForeignKey->productosFK;
				$this->idproductoDefaultFK=$orden_compra_detalleForeignKey->idproductoDefaultFK;
			}

			if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionproducto) {
				$this->setVisibleBusquedasParaproducto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad',$this->strRecargarFkTipos,',')) {
				$this->unidadsFK=$orden_compra_detalleForeignKey->unidadsFK;
				$this->idunidadDefaultFK=$orden_compra_detalleForeignKey->idunidadDefaultFK;
			}

			if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionunidad) {
				$this->setVisibleBusquedasParaunidad(true);
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
	
	function cargarCombosFKFromReturnGeneral($orden_compra_detalleReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$orden_compra_detalleReturnGeneral->strRecargarFkTipos;
			
			


			if($orden_compra_detalleReturnGeneral->con_orden_comprasFK==true) {
				$this->orden_comprasFK=$orden_compra_detalleReturnGeneral->orden_comprasFK;
				$this->idorden_compraDefaultFK=$orden_compra_detalleReturnGeneral->idorden_compraDefaultFK;
			}


			if($orden_compra_detalleReturnGeneral->con_bodegasFK==true) {
				$this->bodegasFK=$orden_compra_detalleReturnGeneral->bodegasFK;
				$this->idbodegaDefaultFK=$orden_compra_detalleReturnGeneral->idbodegaDefaultFK;
			}


			if($orden_compra_detalleReturnGeneral->con_productosFK==true) {
				$this->productosFK=$orden_compra_detalleReturnGeneral->productosFK;
				$this->idproductoDefaultFK=$orden_compra_detalleReturnGeneral->idproductoDefaultFK;
			}


			if($orden_compra_detalleReturnGeneral->con_unidadsFK==true) {
				$this->unidadsFK=$orden_compra_detalleReturnGeneral->unidadsFK;
				$this->idunidadDefaultFK=$orden_compra_detalleReturnGeneral->idunidadDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(orden_compra_detalle_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));
		
		if($orden_compra_detalle_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($orden_compra_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==orden_compra_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='orden_compra';
			}
			else if($orden_compra_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==bodega_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='bodega';
			}
			else if($orden_compra_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==producto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='producto';
			}
			else if($orden_compra_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==unidad_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='unidad';
			}
			
			$orden_compra_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}						
			
			$this->orden_compra_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->orden_compra_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->orden_compra_detallesAuxiliar=array();
			}
			
			if(count($this->orden_compra_detallesAuxiliar) > 0) {
				
				foreach ($this->orden_compra_detallesAuxiliar as $orden_compra_detalleSeleccionado) {
					$this->eliminarTablaBase($orden_compra_detalleSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
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
	
	
	
	public function getorden_comprasFKListSelectItem() 
	{
		$orden_comprasList=array();

		$item=null;

		foreach($this->orden_comprasFK as $orden_compra)
		{
			$item=new SelectItem();
			$item->setLabel($orden_compra->getnumero());
			$item->setValue($orden_compra->getId());
			$orden_comprasList[]=$item;
		}

		return $orden_comprasList;
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


	public function getunidadsFKListSelectItem() 
	{
		$unidadsList=array();

		$item=null;

		foreach($this->unidadsFK as $unidad)
		{
			$item=new SelectItem();
			$item->setLabel($unidad->getnombre());
			$item->setValue($unidad->getId());
			$unidadsList[]=$item;
		}

		return $unidadsList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;
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
				$this->orden_compra_detalleLogic->commitNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->rollbackNewConnexionToDeep();
				$this->orden_compra_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$orden_compra_detallesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->orden_compra_detalles as $orden_compra_detalleLocal) {
				if($orden_compra_detalleLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->orden_compra_detalle=new orden_compra_detalle();
				
				$this->orden_compra_detalle->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->orden_compra_detalles[]=$this->orden_compra_detalle;*/
				
				$orden_compra_detallesNuevos[]=$this->orden_compra_detalle;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('orden_compra');$classes[]=$class;
				$class=new Classe('bodega');$classes[]=$class;
				$class=new Classe('producto');$classes[]=$class;
				$class=new Classe('unidad');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->orden_compra_detalleLogic->setorden_compra_detalles($orden_compra_detallesNuevos);
					
				$this->orden_compra_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($orden_compra_detallesNuevos as $orden_compra_detalleNuevo) {
					$this->orden_compra_detalles[]=$orden_compra_detalleNuevo;
				}
				
				/*$this->orden_compra_detalles[]=$orden_compra_detallesNuevos;*/
				
				$this->orden_compra_detalleLogic->setorden_compra_detalles($this->orden_compra_detalles);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($orden_compra_detallesNuevos!=null);
	}
					
	
	public function cargarCombosorden_comprasFK($connexion=null,$strRecargarFkQuery=''){
		$orden_compraLogic= new orden_compra_logic();
		$pagination= new Pagination();
		$this->orden_comprasFK=array();

		$orden_compraLogic->setConnexion($connexion);
		$orden_compraLogic->getorden_compraDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));

		if($orden_compra_detalle_session==null) {
			$orden_compra_detalle_session=new orden_compra_detalle_session();
		}
		
		if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionorden_compra!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=orden_compra_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalorden_compra=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalorden_compra=Funciones::GetFinalQueryAppend($finalQueryGlobalorden_compra, '');
				$finalQueryGlobalorden_compra.=orden_compra_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalorden_compra.$strRecargarFkQuery;		

				$orden_compraLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosorden_comprasFK($orden_compraLogic->getorden_compras());

		} else {
			$this->setVisibleBusquedasParaorden_compra(true);


			if($orden_compra_detalle_session->bigidorden_compraActual!=null && $orden_compra_detalle_session->bigidorden_compraActual > 0) {
				$orden_compraLogic->getEntity($orden_compra_detalle_session->bigidorden_compraActual);//WithConnection

				$this->orden_comprasFK[$orden_compraLogic->getorden_compra()->getId()]=orden_compra_detalle_util::getorden_compraDescripcion($orden_compraLogic->getorden_compra());
				$this->idorden_compraDefaultFK=$orden_compraLogic->getorden_compra()->getId();
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

		$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));

		if($orden_compra_detalle_session==null) {
			$orden_compra_detalle_session=new orden_compra_detalle_session();
		}
		
		if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionbodega!=true) {
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


			if($orden_compra_detalle_session->bigidbodegaActual!=null && $orden_compra_detalle_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($orden_compra_detalle_session->bigidbodegaActual);//WithConnection

				$this->bodegasFK[$bodegaLogic->getbodega()->getId()]=orden_compra_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());
				$this->idbodegaDefaultFK=$bodegaLogic->getbodega()->getId();
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

		$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));

		if($orden_compra_detalle_session==null) {
			$orden_compra_detalle_session=new orden_compra_detalle_session();
		}
		
		if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionproducto!=true) {
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


			if($orden_compra_detalle_session->bigidproductoActual!=null && $orden_compra_detalle_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($orden_compra_detalle_session->bigidproductoActual);//WithConnection

				$this->productosFK[$productoLogic->getproducto()->getId()]=orden_compra_detalle_util::getproductoDescripcion($productoLogic->getproducto());
				$this->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombosunidadsFK($connexion=null,$strRecargarFkQuery=''){
		$unidadLogic= new unidad_logic();
		$pagination= new Pagination();
		$this->unidadsFK=array();

		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));

		if($orden_compra_detalle_session==null) {
			$orden_compra_detalle_session=new orden_compra_detalle_session();
		}
		
		if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionunidad!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=unidad_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalunidad=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalunidad=Funciones::GetFinalQueryAppend($finalQueryGlobalunidad, '');
				$finalQueryGlobalunidad.=unidad_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalunidad.$strRecargarFkQuery;		

				$unidadLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosunidadsFK($unidadLogic->getunidads());

		} else {
			$this->setVisibleBusquedasParaunidad(true);


			if($orden_compra_detalle_session->bigidunidadActual!=null && $orden_compra_detalle_session->bigidunidadActual > 0) {
				$unidadLogic->getEntity($orden_compra_detalle_session->bigidunidadActual);//WithConnection

				$this->unidadsFK[$unidadLogic->getunidad()->getId()]=orden_compra_detalle_util::getunidadDescripcion($unidadLogic->getunidad());
				$this->idunidadDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	
	
	public function prepararCombosorden_comprasFK($orden_compras){

		foreach ($orden_compras as $orden_compraLocal ) {
			if($this->idorden_compraDefaultFK==0) {
				$this->idorden_compraDefaultFK=$orden_compraLocal->getId();
			}

			$this->orden_comprasFK[$orden_compraLocal->getId()]=orden_compra_detalle_util::getorden_compraDescripcion($orden_compraLocal);
		}
	}

	public function prepararCombosbodegasFK($bodegas){

		foreach ($bodegas as $bodegaLocal ) {
			if($this->idbodegaDefaultFK==0) {
				$this->idbodegaDefaultFK=$bodegaLocal->getId();
			}

			$this->bodegasFK[$bodegaLocal->getId()]=orden_compra_detalle_util::getbodegaDescripcion($bodegaLocal);
		}
	}

	public function prepararCombosproductosFK($productos){

		foreach ($productos as $productoLocal ) {
			if($this->idproductoDefaultFK==0) {
				$this->idproductoDefaultFK=$productoLocal->getId();
			}

			$this->productosFK[$productoLocal->getId()]=orden_compra_detalle_util::getproductoDescripcion($productoLocal);
		}
	}

	public function prepararCombosunidadsFK($unidads){

		foreach ($unidads as $unidadLocal ) {
			if($this->idunidadDefaultFK==0) {
				$this->idunidadDefaultFK=$unidadLocal->getId();
			}

			$this->unidadsFK[$unidadLocal->getId()]=orden_compra_detalle_util::getunidadDescripcion($unidadLocal);
		}
	}

	
	
	public function cargarDescripcionorden_compraFK($idorden_compra,$connexion=null){
		$orden_compraLogic= new orden_compra_logic();
		$orden_compraLogic->setConnexion($connexion);
		$orden_compraLogic->getorden_compraDataAccess()->isForFKData=true;
		$strDescripcionorden_compra='';

		if($idorden_compra!=null && $idorden_compra!='' && $idorden_compra!='null') {
			if($connexion!=null) {
				$orden_compraLogic->getEntity($idorden_compra);//WithConnection
			} else {
				$orden_compraLogic->getEntityWithConnection($idorden_compra);//
			}

			$strDescripcionorden_compra=orden_compra_detalle_util::getorden_compraDescripcion($orden_compraLogic->getorden_compra());

		} else {
			$strDescripcionorden_compra='null';
		}

		return $strDescripcionorden_compra;
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

			$strDescripcionbodega=orden_compra_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());

		} else {
			$strDescripcionbodega='null';
		}

		return $strDescripcionbodega;
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

			$strDescripcionproducto=orden_compra_detalle_util::getproductoDescripcion($productoLogic->getproducto());

		} else {
			$strDescripcionproducto='null';
		}

		return $strDescripcionproducto;
	}

	public function cargarDescripcionunidadFK($idunidad,$connexion=null){
		$unidadLogic= new unidad_logic();
		$unidadLogic->setConnexion($connexion);
		$unidadLogic->getunidadDataAccess()->isForFKData=true;
		$strDescripcionunidad='';

		if($idunidad!=null && $idunidad!='' && $idunidad!='null') {
			if($connexion!=null) {
				$unidadLogic->getEntity($idunidad);//WithConnection
			} else {
				$unidadLogic->getEntityWithConnection($idunidad);//
			}

			$strDescripcionunidad=orden_compra_detalle_util::getunidadDescripcion($unidadLogic->getunidad());

		} else {
			$strDescripcionunidad='null';
		}

		return $strDescripcionunidad;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(orden_compra_detalle $orden_compra_detalleClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParaorden_compra($isParaorden_compra){
		$strParaVisibleorden_compra='display:table-row';
		$strParaVisibleNegacionorden_compra='display:none';

		if($isParaorden_compra) {
			$strParaVisibleorden_compra='display:table-row';
			$strParaVisibleNegacionorden_compra='display:none';
		} else {
			$strParaVisibleorden_compra='display:none';
			$strParaVisibleNegacionorden_compra='display:table-row';
		}


		$strParaVisibleNegacionorden_compra=trim($strParaVisibleNegacionorden_compra);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionorden_compra;
		$this->strVisibleFK_Idorden_compra=$strParaVisibleorden_compra;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionorden_compra;
		$this->strVisibleFK_Idunidad=$strParaVisibleNegacionorden_compra;
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
		$this->strVisibleFK_Idorden_compra=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idunidad=$strParaVisibleNegacionbodega;
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
		$this->strVisibleFK_Idorden_compra=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idproducto=$strParaVisibleproducto;
		$this->strVisibleFK_Idunidad=$strParaVisibleNegacionproducto;
	}

	public function setVisibleBusquedasParaunidad($isParaunidad){
		$strParaVisibleunidad='display:table-row';
		$strParaVisibleNegacionunidad='display:none';

		if($isParaunidad) {
			$strParaVisibleunidad='display:table-row';
			$strParaVisibleNegacionunidad='display:none';
		} else {
			$strParaVisibleunidad='display:none';
			$strParaVisibleNegacionunidad='display:table-row';
		}


		$strParaVisibleNegacionunidad=trim($strParaVisibleNegacionunidad);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionunidad;
		$this->strVisibleFK_Idorden_compra=$strParaVisibleNegacionunidad;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionunidad;
		$this->strVisibleFK_Idunidad=$strParaVisibleunidad;
	}
	
	

	public function abrirBusquedaParaorden_compra() {//$idorden_compra_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idorden_compra_detalleActual=$idorden_compra_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.orden_compra_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.orden_compra_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_orden_compra(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',orden_compra_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.orden_compra_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_orden_compra(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(orden_compra_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarorden_compra_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParabodega() {//$idorden_compra_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idorden_compra_detalleActual=$idorden_compra_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.bodega_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.orden_compra_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',bodega_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.orden_compra_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(bodega_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarorden_compra_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaproducto() {//$idorden_compra_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idorden_compra_detalleActual=$idorden_compra_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.producto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.orden_compra_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.orden_compra_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarorden_compra_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaunidad() {//$idorden_compra_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idorden_compra_detalleActual=$idorden_compra_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.unidad_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.orden_compra_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_unidad(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',unidad_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.orden_compra_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_unidad(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(unidad_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarorden_compra_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(orden_compra_detalle_util::$STR_SESSION_NAME,orden_compra_detalle_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$orden_compra_detalle_session=$this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME);
				
		if($orden_compra_detalle_session==null) {
			$orden_compra_detalle_session=new orden_compra_detalle_session();		
			//$this->Session->write('orden_compra_detalle_session',$orden_compra_detalle_session);							
		}
		*/
		
		$orden_compra_detalle_session=new orden_compra_detalle_session();
    	$orden_compra_detalle_session->strPathNavegacionActual=orden_compra_detalle_util::$STR_CLASS_WEB_TITULO;
    	$orden_compra_detalle_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(orden_compra_detalle_util::$STR_SESSION_NAME,serialize($orden_compra_detalle_session));		
	}	
	
	public function getSetBusquedasSesionConfig(orden_compra_detalle_session $orden_compra_detalle_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $orden_compra_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
			if($orden_compra_detalle_session->bigIdActualFK!=null && $orden_compra_detalle_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$orden_compra_detalle_session->bigIdActualFKParaPosibleAtras=$orden_compra_detalle_session->bigIdActualFK;*/
			}
				
			$orden_compra_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$orden_compra_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(orden_compra_detalle_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionorden_compra!=null && $orden_compra_detalle_session->bitBusquedaDesdeFKSesionorden_compra==true)
			{
				if($orden_compra_detalle_session->bigidorden_compraActual!=0) {
					$this->strAccionBusqueda='FK_Idorden_compra';

					$existe_history=HistoryWeb::ExisteElemento(orden_compra_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(orden_compra_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(orden_compra_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($orden_compra_detalle_session->bigidorden_compraActualDescripcion);
						$historyWeb->setIdActual($orden_compra_detalle_session->bigidorden_compraActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=orden_compra_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$orden_compra_detalle_session->bigidorden_compraActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$orden_compra_detalle_session->bitBusquedaDesdeFKSesionorden_compra=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;

				if($orden_compra_detalle_session->intNumeroPaginacion==orden_compra_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$orden_compra_detalle_session->intNumeroPaginacion;
				}
			}
			else if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionbodega!=null && $orden_compra_detalle_session->bitBusquedaDesdeFKSesionbodega==true)
			{
				if($orden_compra_detalle_session->bigidbodegaActual!=0) {
					$this->strAccionBusqueda='FK_Idbodega';

					$existe_history=HistoryWeb::ExisteElemento(orden_compra_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(orden_compra_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(orden_compra_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($orden_compra_detalle_session->bigidbodegaActualDescripcion);
						$historyWeb->setIdActual($orden_compra_detalle_session->bigidbodegaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=orden_compra_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$orden_compra_detalle_session->bigidbodegaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$orden_compra_detalle_session->bitBusquedaDesdeFKSesionbodega=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;

				if($orden_compra_detalle_session->intNumeroPaginacion==orden_compra_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$orden_compra_detalle_session->intNumeroPaginacion;
				}
			}
			else if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionproducto!=null && $orden_compra_detalle_session->bitBusquedaDesdeFKSesionproducto==true)
			{
				if($orden_compra_detalle_session->bigidproductoActual!=0) {
					$this->strAccionBusqueda='FK_Idproducto';

					$existe_history=HistoryWeb::ExisteElemento(orden_compra_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(orden_compra_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(orden_compra_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($orden_compra_detalle_session->bigidproductoActualDescripcion);
						$historyWeb->setIdActual($orden_compra_detalle_session->bigidproductoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=orden_compra_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$orden_compra_detalle_session->bigidproductoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$orden_compra_detalle_session->bitBusquedaDesdeFKSesionproducto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;

				if($orden_compra_detalle_session->intNumeroPaginacion==orden_compra_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$orden_compra_detalle_session->intNumeroPaginacion;
				}
			}
			else if($orden_compra_detalle_session->bitBusquedaDesdeFKSesionunidad!=null && $orden_compra_detalle_session->bitBusquedaDesdeFKSesionunidad==true)
			{
				if($orden_compra_detalle_session->bigidunidadActual!=0) {
					$this->strAccionBusqueda='FK_Idunidad';

					$existe_history=HistoryWeb::ExisteElemento(orden_compra_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(orden_compra_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(orden_compra_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($orden_compra_detalle_session->bigidunidadActualDescripcion);
						$historyWeb->setIdActual($orden_compra_detalle_session->bigidunidadActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=orden_compra_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$orden_compra_detalle_session->bigidunidadActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$orden_compra_detalle_session->bitBusquedaDesdeFKSesionunidad=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;

				if($orden_compra_detalle_session->intNumeroPaginacion==orden_compra_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=orden_compra_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$orden_compra_detalle_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$orden_compra_detalle_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));
		
		if($orden_compra_detalle_session==null) {
			$orden_compra_detalle_session=new orden_compra_detalle_session();
		}
		
		$orden_compra_detalle_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$orden_compra_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$orden_compra_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idbodega') {
			$orden_compra_detalle_session->id_bodega=$this->id_bodegaFK_Idbodega;	

		}
		else if($this->strAccionBusqueda=='FK_Idorden_compra') {
			$orden_compra_detalle_session->id_orden_compra=$this->id_orden_compraFK_Idorden_compra;	

		}
		else if($this->strAccionBusqueda=='FK_Idproducto') {
			$orden_compra_detalle_session->id_producto=$this->id_productoFK_Idproducto;	

		}
		else if($this->strAccionBusqueda=='FK_Idunidad') {
			$orden_compra_detalle_session->id_unidad=$this->id_unidadFK_Idunidad;	

		}
		
		$this->Session->write(orden_compra_detalle_util::$STR_SESSION_NAME,serialize($orden_compra_detalle_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(orden_compra_detalle_session $orden_compra_detalle_session) {
		
		if($orden_compra_detalle_session==null) {
			$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));
		}
		
		if($orden_compra_detalle_session==null) {
		   $orden_compra_detalle_session=new orden_compra_detalle_session();
		}
		
		if($orden_compra_detalle_session->strUltimaBusqueda!=null && $orden_compra_detalle_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$orden_compra_detalle_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$orden_compra_detalle_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$orden_compra_detalle_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idbodega') {
				$this->id_bodegaFK_Idbodega=$orden_compra_detalle_session->id_bodega;
				$orden_compra_detalle_session->id_bodega=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idorden_compra') {
				$this->id_orden_compraFK_Idorden_compra=$orden_compra_detalle_session->id_orden_compra;
				$orden_compra_detalle_session->id_orden_compra=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idproducto') {
				$this->id_productoFK_Idproducto=$orden_compra_detalle_session->id_producto;
				$orden_compra_detalle_session->id_producto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idunidad') {
				$this->id_unidadFK_Idunidad=$orden_compra_detalle_session->id_unidad;
				$orden_compra_detalle_session->id_unidad=-1;

			}
		}
		
		$orden_compra_detalle_session->strUltimaBusqueda='';
		//$orden_compra_detalle_session->intNumeroPaginacion=10;
		$orden_compra_detalle_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(orden_compra_detalle_util::$STR_SESSION_NAME,serialize($orden_compra_detalle_session));		
	}
	
	public function orden_compra_detallesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idorden_compraDefaultFK = 0;
		$this->idbodegaDefaultFK = 0;
		$this->idproductoDefaultFK = 0;
		$this->idunidadDefaultFK = 0;
	}
	
	public function setorden_compra_detalleFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_orden_compra',$this->idorden_compraDefaultFK);
		$this->setExistDataCampoForm('form','id_bodega',$this->idbodegaDefaultFK);
		$this->setExistDataCampoForm('form','id_producto',$this->idproductoDefaultFK);
		$this->setExistDataCampoForm('form','id_unidad',$this->idunidadDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		orden_compra::$class;
		orden_compra_carga::$CONTROLLER;

		bodega::$class;
		bodega_carga::$CONTROLLER;

		producto::$class;
		producto_carga::$CONTROLLER;

		unidad::$class;
		unidad_carga::$CONTROLLER;
		
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
		interface orden_compra_detalle_controlI {	
		
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
		
		public function onLoad(orden_compra_detalle_session $orden_compra_detalle_session=null);	
		function index(?string $strTypeOnLoadorden_compra_detalle='',?string $strTipoPaginaAuxiliarorden_compra_detalle='',?string $strTipoUsuarioAuxiliarorden_compra_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadorden_compra_detalle='',string $strTipoPaginaAuxiliarorden_compra_detalle='',string $strTipoUsuarioAuxiliarorden_compra_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($orden_compra_detalleReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(orden_compra_detalle $orden_compra_detalleClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(orden_compra_detalle_session $orden_compra_detalle_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(orden_compra_detalle_session $orden_compra_detalle_session);	
		public function orden_compra_detallesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setorden_compra_detalleFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
