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

namespace com\bydan\contabilidad\inventario\cotizacion_detalle\presentation\control;

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

use com\bydan\contabilidad\inventario\cotizacion_detalle\business\entity\cotizacion_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/cotizacion_detalle/util/cotizacion_detalle_carga.php');
use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_carga;

use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_util;
use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_param_return;
use com\bydan\contabilidad\inventario\cotizacion_detalle\business\logic\cotizacion_detalle_logic;
use com\bydan\contabilidad\inventario\cotizacion_detalle\business\logic\cotizacion_detalle_logic_add;
use com\bydan\contabilidad\inventario\cotizacion_detalle\presentation\session\cotizacion_detalle_session;


//FK


use com\bydan\contabilidad\inventario\cotizacion\business\entity\cotizacion;
use com\bydan\contabilidad\inventario\cotizacion\business\logic\cotizacion_logic;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_carga;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;

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

use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;
use com\bydan\contabilidad\inventario\otro_suplidor\business\logic\otro_suplidor_logic;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_carga;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
cotizacion_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cotizacion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cotizacion_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cotizacion_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cotizacion_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/inventario/cotizacion_detalle/presentation/control/cotizacion_detalle_init_control.php');
use com\bydan\contabilidad\inventario\cotizacion_detalle\presentation\control\cotizacion_detalle_init_control;

include_once('com/bydan/contabilidad/inventario/cotizacion_detalle/presentation/control/cotizacion_detalle_base_control.php');
use com\bydan\contabilidad\inventario\cotizacion_detalle\presentation\control\cotizacion_detalle_base_control;

class cotizacion_detalle_control extends cotizacion_detalle_base_control {	
	
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
			else if($action=="FK_Idcotizacion"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdcotizacionParaProcesar();
			}
			else if($action=="FK_Idotro_suplidor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idotro_suplidorParaProcesar();
			}
			else if($action=="FK_Idproducto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdproductoParaProcesar();
			}
			else if($action=="FK_Idunidad"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdunidadParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParacotizacion') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcotizacion_detalleActual=$this->getDataId();
				$this->abrirBusquedaParacotizacion();//$idcotizacion_detalleActual
			}
			else if($action=='abrirBusquedaParabodega') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcotizacion_detalleActual=$this->getDataId();
				$this->abrirBusquedaParabodega();//$idcotizacion_detalleActual
			}
			else if($action=='abrirBusquedaParaproducto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcotizacion_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaproducto();//$idcotizacion_detalleActual
			}
			else if($action=='abrirBusquedaParaunidad') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcotizacion_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaunidad();//$idcotizacion_detalleActual
			}
			else if($action=='abrirBusquedaParaotro_suplidor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcotizacion_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaotro_suplidor();//$idcotizacion_detalleActual
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
					
					$cotizacion_detalleController = new cotizacion_detalle_control();
					
					$cotizacion_detalleController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($cotizacion_detalleController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$cotizacion_detalleController = new cotizacion_detalle_control();
						$cotizacion_detalleController = $this;
						
						$jsonResponse = json_encode($cotizacion_detalleController->cotizacion_detalles);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->cotizacion_detalleReturnGeneral==null) {
					$this->cotizacion_detalleReturnGeneral=new cotizacion_detalle_param_return();
				}
				
				echo($this->cotizacion_detalleReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$cotizacion_detalleController=new cotizacion_detalle_control();
		
		$cotizacion_detalleController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$cotizacion_detalleController->usuarioActual=new usuario();
		
		$cotizacion_detalleController->usuarioActual->setId($this->usuarioActual->getId());
		$cotizacion_detalleController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$cotizacion_detalleController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$cotizacion_detalleController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$cotizacion_detalleController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$cotizacion_detalleController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$cotizacion_detalleController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$cotizacion_detalleController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $cotizacion_detalleController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadcotizacion_detalle= $this->getDataGeneralString('strTypeOnLoadcotizacion_detalle');
		$strTipoPaginaAuxiliarcotizacion_detalle= $this->getDataGeneralString('strTipoPaginaAuxiliarcotizacion_detalle');
		$strTipoUsuarioAuxiliarcotizacion_detalle= $this->getDataGeneralString('strTipoUsuarioAuxiliarcotizacion_detalle');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadcotizacion_detalle,$strTipoPaginaAuxiliarcotizacion_detalle,$strTipoUsuarioAuxiliarcotizacion_detalle,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadcotizacion_detalle!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('cotizacion_detalle','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cotizacion_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarcotizacion_detalle,$this->strTipoUsuarioAuxiliarcotizacion_detalle,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cotizacion_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarcotizacion_detalle,$this->strTipoUsuarioAuxiliarcotizacion_detalle,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->cotizacion_detalleReturnGeneral=new cotizacion_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cotizacion_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cotizacion_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cotizacion_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cotizacion_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cotizacion_detalleReturnGeneral);
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
		$this->cotizacion_detalleReturnGeneral=new cotizacion_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cotizacion_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cotizacion_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cotizacion_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cotizacion_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cotizacion_detalleReturnGeneral);
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
		$this->cotizacion_detalleReturnGeneral=new cotizacion_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cotizacion_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cotizacion_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cotizacion_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cotizacion_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cotizacion_detalleReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
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
			
			
			$this->cotizacion_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->cotizacion_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cotizacion_detalleReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->cotizacion_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->cotizacion_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cotizacion_detalleReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->cotizacion_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->cotizacion_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->cotizacion_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cotizacion_detalleReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->cotizacion_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cotizacion_detalleReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->cotizacion_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->cotizacion_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->cotizacion_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cotizacion_detalleReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->cotizacion_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cotizacion_detalleReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
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
		
		$this->cotizacion_detalleLogic=new cotizacion_detalle_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->cotizacion_detalle=new cotizacion_detalle();
		
		$this->strTypeOnLoadcotizacion_detalle='onload';
		$this->strTipoPaginaAuxiliarcotizacion_detalle='none';
		$this->strTipoUsuarioAuxiliarcotizacion_detalle='none';	

		$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
		
		$this->cotizacion_detalleModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cotizacion_detalleControllerAdditional=new cotizacion_detalle_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(cotizacion_detalle_session $cotizacion_detalle_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($cotizacion_detalle_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadcotizacion_detalle='',?string $strTipoPaginaAuxiliarcotizacion_detalle='',?string $strTipoUsuarioAuxiliarcotizacion_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadcotizacion_detalle=$strTypeOnLoadcotizacion_detalle;
			$this->strTipoPaginaAuxiliarcotizacion_detalle=$strTipoPaginaAuxiliarcotizacion_detalle;
			$this->strTipoUsuarioAuxiliarcotizacion_detalle=$strTipoUsuarioAuxiliarcotizacion_detalle;
	
			if($strTipoUsuarioAuxiliarcotizacion_detalle=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->cotizacion_detalle=new cotizacion_detalle();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Cotizacion Detalles';
			
			
			$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));
							
			if($cotizacion_detalle_session==null) {
				$cotizacion_detalle_session=new cotizacion_detalle_session();
				
				/*$this->Session->write('cotizacion_detalle_session',$cotizacion_detalle_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($cotizacion_detalle_session->strFuncionJsPadre!=null && $cotizacion_detalle_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$cotizacion_detalle_session->strFuncionJsPadre;
				
				$cotizacion_detalle_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($cotizacion_detalle_session);
			
			if($strTypeOnLoadcotizacion_detalle!=null && $strTypeOnLoadcotizacion_detalle=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$cotizacion_detalle_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$cotizacion_detalle_session->setPaginaPopupVariables(true);
				}
				
				if($cotizacion_detalle_session->intNumeroPaginacion==cotizacion_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_detalle_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,cotizacion_detalle_util::$STR_SESSION_NAME,'inventario');																
			
			} else if($strTypeOnLoadcotizacion_detalle!=null && $strTypeOnLoadcotizacion_detalle=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$cotizacion_detalle_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;*/
				
				if($cotizacion_detalle_session->intNumeroPaginacion==cotizacion_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_detalle_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarcotizacion_detalle!=null && $strTipoPaginaAuxiliarcotizacion_detalle=='none') {
				/*$cotizacion_detalle_session->strStyleDivHeader='display:table-row';*/
				
				/*$cotizacion_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarcotizacion_detalle!=null && $strTipoPaginaAuxiliarcotizacion_detalle=='iframe') {
					/*
					$cotizacion_detalle_session->strStyleDivArbol='display:none';
					$cotizacion_detalle_session->strStyleDivHeader='display:none';
					$cotizacion_detalle_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$cotizacion_detalle_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->cotizacion_detalleClase=new cotizacion_detalle();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=cotizacion_detalle_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(cotizacion_detalle_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->cotizacion_detalleLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->cotizacion_detalleLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->cotizacion_detalleLogic=new cotizacion_detalle_logic();*/
			
			
			$this->cotizacion_detallesModel=null;
			/*new ListDataModel();*/
			
			/*$this->cotizacion_detallesModel.setWrappedData(cotizacion_detalleLogic->getcotizacion_detalles());*/
						
			$this->cotizacion_detalles= array();
			$this->cotizacion_detallesEliminados=array();
			$this->cotizacion_detallesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= cotizacion_detalle_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->cotizacion_detalle= new cotizacion_detalle();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idbodega='display:table-row';
			$this->strVisibleFK_Idcotizacion='display:table-row';
			$this->strVisibleFK_Idotro_suplidor='display:table-row';
			$this->strVisibleFK_Idproducto='display:table-row';
			$this->strVisibleFK_Idunidad='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarcotizacion_detalle!=null && $strTipoUsuarioAuxiliarcotizacion_detalle!='none' && $strTipoUsuarioAuxiliarcotizacion_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcotizacion_detalle);
																
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
				if($strTipoUsuarioAuxiliarcotizacion_detalle!=null && $strTipoUsuarioAuxiliarcotizacion_detalle!='none' && $strTipoUsuarioAuxiliarcotizacion_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcotizacion_detalle);
																
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
				if($strTipoUsuarioAuxiliarcotizacion_detalle==null || $strTipoUsuarioAuxiliarcotizacion_detalle=='none' || $strTipoUsuarioAuxiliarcotizacion_detalle=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarcotizacion_detalle,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cotizacion_detalle_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cotizacion_detalle_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina cotizacion_detalle');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($cotizacion_detalle_session);
			
			$this->getSetBusquedasSesionConfig($cotizacion_detalle_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportecotizacion_detalles($this->strAccionBusqueda,$this->cotizacion_detalleLogic->getcotizacion_detalles());*/
				} else if($this->strGenerarReporte=='Html')	{
					$cotizacion_detalle_session->strServletGenerarHtmlReporte='cotizacion_detalleServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(cotizacion_detalle_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(cotizacion_detalle_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($cotizacion_detalle_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarcotizacion_detalle!=null && $strTipoUsuarioAuxiliarcotizacion_detalle=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($cotizacion_detalle_session);
			}
								
			$this->set(cotizacion_detalle_util::$STR_SESSION_NAME, $cotizacion_detalle_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($cotizacion_detalle_session);
			
			/*
			$this->cotizacion_detalle->recursive = 0;
			
			$this->cotizacion_detalles=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('cotizacion_detalles', $this->cotizacion_detalles);
			
			$this->set(cotizacion_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->cotizacion_detalleActual =$this->cotizacion_detalleClase;
			
			/*$this->cotizacion_detalleActual =$this->migrarModelcotizacion_detalle($this->cotizacion_detalleClase);*/
			
			$this->returnHtml(false);
			
			$this->set(cotizacion_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=cotizacion_detalle_util::$STR_NOMBRE_OPCION;
				
			if(cotizacion_detalle_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=cotizacion_detalle_util::$STR_MODULO_OPCION.cotizacion_detalle_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(cotizacion_detalle_util::$STR_SESSION_NAME,serialize($cotizacion_detalle_session));
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
			/*$cotizacion_detalleClase= (cotizacion_detalle) cotizacion_detallesModel.getRowData();*/
			
			$this->cotizacion_detalleClase->setId($this->cotizacion_detalle->getId());	
			$this->cotizacion_detalleClase->setVersionRow($this->cotizacion_detalle->getVersionRow());	
			$this->cotizacion_detalleClase->setVersionRow($this->cotizacion_detalle->getVersionRow());	
			$this->cotizacion_detalleClase->setid_cotizacion($this->cotizacion_detalle->getid_cotizacion());	
			$this->cotizacion_detalleClase->setid_bodega($this->cotizacion_detalle->getid_bodega());	
			$this->cotizacion_detalleClase->setid_producto($this->cotizacion_detalle->getid_producto());	
			$this->cotizacion_detalleClase->setid_unidad($this->cotizacion_detalle->getid_unidad());	
			$this->cotizacion_detalleClase->setcantidad($this->cotizacion_detalle->getcantidad());	
			$this->cotizacion_detalleClase->setprecio($this->cotizacion_detalle->getprecio());	
			$this->cotizacion_detalleClase->setdescuento_porciento($this->cotizacion_detalle->getdescuento_porciento());	
			$this->cotizacion_detalleClase->setdescuento_monto($this->cotizacion_detalle->getdescuento_monto());	
			$this->cotizacion_detalleClase->setsub_total($this->cotizacion_detalle->getsub_total());	
			$this->cotizacion_detalleClase->setiva_porciento($this->cotizacion_detalle->getiva_porciento());	
			$this->cotizacion_detalleClase->setiva_monto($this->cotizacion_detalle->getiva_monto());	
			$this->cotizacion_detalleClase->settotal($this->cotizacion_detalle->gettotal());	
			$this->cotizacion_detalleClase->setobservacion($this->cotizacion_detalle->getobservacion());	
			$this->cotizacion_detalleClase->setimpuesto2_porciento($this->cotizacion_detalle->getimpuesto2_porciento());	
			$this->cotizacion_detalleClase->setimpuesto2_monto($this->cotizacion_detalle->getimpuesto2_monto());	
			$this->cotizacion_detalleClase->setid_otro_suplidor($this->cotizacion_detalle->getid_otro_suplidor());	
		
			/*$this->Session->write('cotizacion_detalleVersionRowActual', cotizacion_detalle.getVersionRow());*/
			
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
			
			$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));
						
			if($cotizacion_detalle_session==null) {
				$cotizacion_detalle_session=new cotizacion_detalle_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('cotizacion_detalle', $this->cotizacion_detalle->read(null, $id));
	
			
			$this->cotizacion_detalle->recursive = 0;
			
			$this->cotizacion_detalles=$this->paginate();
			
			$this->set('cotizacion_detalles', $this->cotizacion_detalles);
	
			if (empty($this->data)) {
				$this->data = $this->cotizacion_detalle->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->cotizacion_detalleLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cotizacion_detalleClase);
			
			$this->cotizacion_detalleActual=$this->cotizacion_detalleClase;
			
			/*$this->cotizacion_detalleActual =$this->migrarModelcotizacion_detalle($this->cotizacion_detalleClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cotizacion_detalleLogic->getcotizacion_detalles(),$this->cotizacion_detalleActual);
			
			$this->actualizarControllerConReturnGeneral($this->cotizacion_detalleReturnGeneral);
			
			//$this->cotizacion_detalleReturnGeneral=$this->cotizacion_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cotizacion_detalleLogic->getcotizacion_detalles(),$this->cotizacion_detalleActual,$this->cotizacion_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));
						
			if($cotizacion_detalle_session==null) {
				$cotizacion_detalle_session=new cotizacion_detalle_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevocotizacion_detalle', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->cotizacion_detalleClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cotizacion_detalleClase);
			
			$this->cotizacion_detalleActual =$this->cotizacion_detalleClase;
			
			/*$this->cotizacion_detalleActual =$this->migrarModelcotizacion_detalle($this->cotizacion_detalleClase);*/
			
			$this->setcotizacion_detalleFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cotizacion_detalleLogic->getcotizacion_detalles(),$this->cotizacion_detalle);
			
			$this->actualizarControllerConReturnGeneral($this->cotizacion_detalleReturnGeneral);
			
			//this->cotizacion_detalleReturnGeneral=$this->cotizacion_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cotizacion_detalleLogic->getcotizacion_detalles(),$this->cotizacion_detalle,$this->cotizacion_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idcotizacionDefaultFK!=null && $this->idcotizacionDefaultFK > -1) {
				$this->cotizacion_detalleReturnGeneral->getcotizacion_detalle()->setid_cotizacion($this->idcotizacionDefaultFK);
			}

			if($this->idbodegaDefaultFK!=null && $this->idbodegaDefaultFK > -1) {
				$this->cotizacion_detalleReturnGeneral->getcotizacion_detalle()->setid_bodega($this->idbodegaDefaultFK);
			}

			if($this->idproductoDefaultFK!=null && $this->idproductoDefaultFK > -1) {
				$this->cotizacion_detalleReturnGeneral->getcotizacion_detalle()->setid_producto($this->idproductoDefaultFK);
			}

			if($this->idunidadDefaultFK!=null && $this->idunidadDefaultFK > -1) {
				$this->cotizacion_detalleReturnGeneral->getcotizacion_detalle()->setid_unidad($this->idunidadDefaultFK);
			}

			if($this->idotro_suplidorDefaultFK!=null && $this->idotro_suplidorDefaultFK > -1) {
				$this->cotizacion_detalleReturnGeneral->getcotizacion_detalle()->setid_otro_suplidor($this->idotro_suplidorDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->cotizacion_detalleReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->cotizacion_detalleReturnGeneral->getcotizacion_detalle(),$this->cotizacion_detalleActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeycotizacion_detalle($this->cotizacion_detalleReturnGeneral->getcotizacion_detalle());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariocotizacion_detalle($this->cotizacion_detalleReturnGeneral->getcotizacion_detalle());*/
			}
			
			if($this->cotizacion_detalleReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cotizacion_detalleReturnGeneral->getcotizacion_detalle(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualcotizacion_detalle($this->cotizacion_detalle,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->cotizacion_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cotizacion_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->cotizacion_detallesAuxiliar=array();
			}
			
			if(count($this->cotizacion_detallesAuxiliar)==2) {
				$cotizacion_detalleOrigen=$this->cotizacion_detallesAuxiliar[0];
				$cotizacion_detalleDestino=$this->cotizacion_detallesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($cotizacion_detalleOrigen,$cotizacion_detalleDestino,true,false,false);
				
				$this->actualizarLista($cotizacion_detalleDestino,$this->cotizacion_detalles);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->cotizacion_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cotizacion_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cotizacion_detallesAuxiliar=array();
			}
			
			if(count($this->cotizacion_detallesAuxiliar) > 0) {
				foreach ($this->cotizacion_detallesAuxiliar as $cotizacion_detalleSeleccionado) {
					$this->cotizacion_detalle=new cotizacion_detalle();
					
					$this->setCopiarVariablesObjetos($cotizacion_detalleSeleccionado,$this->cotizacion_detalle,true,true,false);
						
					$this->cotizacion_detalles[]=$this->cotizacion_detalle;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->cotizacion_detallesEliminados as $cotizacion_detalleEliminado) {
				$this->cotizacion_detalleLogic->cotizacion_detalles[]=$cotizacion_detalleEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->cotizacion_detalle=new cotizacion_detalle();
							
				$this->cotizacion_detalles[]=$this->cotizacion_detalle;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
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
		
		$cotizacion_detalleActual=new cotizacion_detalle();
		
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
				
				$cotizacion_detalleActual=$this->cotizacion_detalles[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cotizacion_detalleActual->setid_cotizacion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cotizacion_detalleActual->setid_bodega((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cotizacion_detalleActual->setid_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cotizacion_detalleActual->setid_unidad((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cotizacion_detalleActual->setcantidad((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cotizacion_detalleActual->setprecio((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cotizacion_detalleActual->setdescuento_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cotizacion_detalleActual->setdescuento_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cotizacion_detalleActual->setsub_total((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cotizacion_detalleActual->setiva_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cotizacion_detalleActual->setiva_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $cotizacion_detalleActual->settotal((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $cotizacion_detalleActual->setobservacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $cotizacion_detalleActual->setimpuesto2_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $cotizacion_detalleActual->setimpuesto2_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $cotizacion_detalleActual->setid_otro_suplidor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
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
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadcotizacion_detalle='',string $strTipoPaginaAuxiliarcotizacion_detalle='',string $strTipoUsuarioAuxiliarcotizacion_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadcotizacion_detalle,$strTipoPaginaAuxiliarcotizacion_detalle,$strTipoUsuarioAuxiliarcotizacion_detalle,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->cotizacion_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=cotizacion_detalle_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=cotizacion_detalle_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=cotizacion_detalle_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));
						
			if($cotizacion_detalle_session==null) {
				$cotizacion_detalle_session=new cotizacion_detalle_session();
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
					/*$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;*/
					
					if($cotizacion_detalle_session->intNumeroPaginacion==cotizacion_detalle_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$cotizacion_detalle_session->intNumeroPaginacion;
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
			
			$this->cotizacion_detallesEliminados=array();
			
			/*$this->cotizacion_detalleLogic->setConnexion($connexion);*/
			
			$this->cotizacion_detalleLogic->setIsConDeep(true);
			
			$this->cotizacion_detalleLogic->getcotizacion_detalleDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('cotizacion');$classes[]=$class;
			$class=new Classe('bodega');$classes[]=$class;
			$class=new Classe('producto');$classes[]=$class;
			$class=new Classe('unidad');$classes[]=$class;
			$class=new Classe('otro_suplidor');$classes[]=$class;
			
			$this->cotizacion_detalleLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cotizacion_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->cotizacion_detalleLogic->getcotizacion_detalles()==null|| count($this->cotizacion_detalleLogic->getcotizacion_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cotizacion_detalles=$this->cotizacion_detalleLogic->getcotizacion_detalles();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cotizacion_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->cotizacion_detallesReporte=$this->cotizacion_detalleLogic->getcotizacion_detalles();
									
						/*$this->generarReportes('Todos',$this->cotizacion_detalleLogic->getcotizacion_detalles());*/
					
						$this->cotizacion_detalleLogic->setcotizacion_detalles($this->cotizacion_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cotizacion_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->cotizacion_detalleLogic->getcotizacion_detalles()==null|| count($this->cotizacion_detalleLogic->getcotizacion_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cotizacion_detalles=$this->cotizacion_detalleLogic->getcotizacion_detalles();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cotizacion_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->cotizacion_detallesReporte=$this->cotizacion_detalleLogic->getcotizacion_detalles();
									
						/*$this->generarReportes('Todos',$this->cotizacion_detalleLogic->getcotizacion_detalles());*/
					
						$this->cotizacion_detalleLogic->setcotizacion_detalles($this->cotizacion_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idcotizacion_detalle=0;*/
				
				if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $cotizacion_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
					if($cotizacion_detalle_session->bigIdActualFK!=null && $cotizacion_detalle_session->bigIdActualFK!=0)	{
						$this->idcotizacion_detalle=$cotizacion_detalle_session->bigIdActualFK;	
					}
					
					$cotizacion_detalle_session->bitBusquedaDesdeFKSesionFK=false;
					
					$cotizacion_detalle_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idcotizacion_detalle=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idcotizacion_detalle=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cotizacion_detalleLogic->getEntity($this->idcotizacion_detalle);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*cotizacion_detalleLogicAdditional::getDetalleIndicePorId($idcotizacion_detalle);*/

				
				if($this->cotizacion_detalleLogic->getcotizacion_detalle()!=null) {
					$this->cotizacion_detalleLogic->setcotizacion_detalles(array());
					$this->cotizacion_detalleLogic->cotizacion_detalles[]=$this->cotizacion_detalleLogic->getcotizacion_detalle();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idbodega')
			{

				if($cotizacion_detalle_session->bigidbodegaActual!=null && $cotizacion_detalle_session->bigidbodegaActual!=0)
				{
					$this->id_bodegaFK_Idbodega=$cotizacion_detalle_session->bigidbodegaActual;
					$cotizacion_detalle_session->bigidbodegaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacion_detalleLogic->getsFK_Idbodega($finalQueryPaginacion,$this->pagination,$this->id_bodegaFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cotizacion_detalleLogicAdditional::getDetalleIndiceFK_Idbodega($this->id_bodegaFK_Idbodega);


					if($this->cotizacion_detalleLogic->getcotizacion_detalles()==null || count($this->cotizacion_detalleLogic->getcotizacion_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cotizacion_detalles=$this->cotizacion_detalleLogic->getcotizacion_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacion_detalleLogic->getsFK_Idbodega('',$this->pagination,$this->id_bodegaFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cotizacion_detallesReporte=$this->cotizacion_detalleLogic->getcotizacion_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecotizacion_detalles("FK_Idbodega",$this->cotizacion_detalleLogic->getcotizacion_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cotizacion_detalleLogic->setcotizacion_detalles($cotizacion_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcotizacion')
			{

				if($cotizacion_detalle_session->bigidcotizacionActual!=null && $cotizacion_detalle_session->bigidcotizacionActual!=0)
				{
					$this->id_cotizacionFK_Idcotizacion=$cotizacion_detalle_session->bigidcotizacionActual;
					$cotizacion_detalle_session->bigidcotizacionActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacion_detalleLogic->getsFK_Idcotizacion($finalQueryPaginacion,$this->pagination,$this->id_cotizacionFK_Idcotizacion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cotizacion_detalleLogicAdditional::getDetalleIndiceFK_Idcotizacion($this->id_cotizacionFK_Idcotizacion);


					if($this->cotizacion_detalleLogic->getcotizacion_detalles()==null || count($this->cotizacion_detalleLogic->getcotizacion_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cotizacion_detalles=$this->cotizacion_detalleLogic->getcotizacion_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacion_detalleLogic->getsFK_Idcotizacion('',$this->pagination,$this->id_cotizacionFK_Idcotizacion);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cotizacion_detallesReporte=$this->cotizacion_detalleLogic->getcotizacion_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecotizacion_detalles("FK_Idcotizacion",$this->cotizacion_detalleLogic->getcotizacion_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cotizacion_detalleLogic->setcotizacion_detalles($cotizacion_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idotro_suplidor')
			{

				if($cotizacion_detalle_session->bigidotro_suplidorActual!=null && $cotizacion_detalle_session->bigidotro_suplidorActual!=0)
				{
					$this->id_otro_suplidorFK_Idotro_suplidor=$cotizacion_detalle_session->bigidotro_suplidorActual;
					$cotizacion_detalle_session->bigidotro_suplidorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacion_detalleLogic->getsFK_Idotro_suplidor($finalQueryPaginacion,$this->pagination,$this->id_otro_suplidorFK_Idotro_suplidor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cotizacion_detalleLogicAdditional::getDetalleIndiceFK_Idotro_suplidor($this->id_otro_suplidorFK_Idotro_suplidor);


					if($this->cotizacion_detalleLogic->getcotizacion_detalles()==null || count($this->cotizacion_detalleLogic->getcotizacion_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cotizacion_detalles=$this->cotizacion_detalleLogic->getcotizacion_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacion_detalleLogic->getsFK_Idotro_suplidor('',$this->pagination,$this->id_otro_suplidorFK_Idotro_suplidor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cotizacion_detallesReporte=$this->cotizacion_detalleLogic->getcotizacion_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecotizacion_detalles("FK_Idotro_suplidor",$this->cotizacion_detalleLogic->getcotizacion_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cotizacion_detalleLogic->setcotizacion_detalles($cotizacion_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idproducto')
			{

				if($cotizacion_detalle_session->bigidproductoActual!=null && $cotizacion_detalle_session->bigidproductoActual!=0)
				{
					$this->id_productoFK_Idproducto=$cotizacion_detalle_session->bigidproductoActual;
					$cotizacion_detalle_session->bigidproductoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacion_detalleLogic->getsFK_Idproducto($finalQueryPaginacion,$this->pagination,$this->id_productoFK_Idproducto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cotizacion_detalleLogicAdditional::getDetalleIndiceFK_Idproducto($this->id_productoFK_Idproducto);


					if($this->cotizacion_detalleLogic->getcotizacion_detalles()==null || count($this->cotizacion_detalleLogic->getcotizacion_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cotizacion_detalles=$this->cotizacion_detalleLogic->getcotizacion_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacion_detalleLogic->getsFK_Idproducto('',$this->pagination,$this->id_productoFK_Idproducto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cotizacion_detallesReporte=$this->cotizacion_detalleLogic->getcotizacion_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecotizacion_detalles("FK_Idproducto",$this->cotizacion_detalleLogic->getcotizacion_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cotizacion_detalleLogic->setcotizacion_detalles($cotizacion_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idunidad')
			{

				if($cotizacion_detalle_session->bigidunidadActual!=null && $cotizacion_detalle_session->bigidunidadActual!=0)
				{
					$this->id_unidadFK_Idunidad=$cotizacion_detalle_session->bigidunidadActual;
					$cotizacion_detalle_session->bigidunidadActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacion_detalleLogic->getsFK_Idunidad($finalQueryPaginacion,$this->pagination,$this->id_unidadFK_Idunidad);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cotizacion_detalleLogicAdditional::getDetalleIndiceFK_Idunidad($this->id_unidadFK_Idunidad);


					if($this->cotizacion_detalleLogic->getcotizacion_detalles()==null || count($this->cotizacion_detalleLogic->getcotizacion_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cotizacion_detalles=$this->cotizacion_detalleLogic->getcotizacion_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacion_detalleLogic->getsFK_Idunidad('',$this->pagination,$this->id_unidadFK_Idunidad);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cotizacion_detallesReporte=$this->cotizacion_detalleLogic->getcotizacion_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecotizacion_detalles("FK_Idunidad",$this->cotizacion_detalleLogic->getcotizacion_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cotizacion_detalleLogic->setcotizacion_detalles($cotizacion_detalles);
					}
				//}

			} 
		
		$cotizacion_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cotizacion_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->cotizacion_detalleLogic->loadForeignsKeysDescription();*/
		
		$this->cotizacion_detalles=$this->cotizacion_detalleLogic->getcotizacion_detalles();
		
		if($this->cotizacion_detallesEliminados==null) {
			$this->cotizacion_detallesEliminados=array();
		}
		
		$this->Session->write(cotizacion_detalle_util::$STR_SESSION_NAME.'Lista',serialize($this->cotizacion_detalles));
		$this->Session->write(cotizacion_detalle_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cotizacion_detallesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(cotizacion_detalle_util::$STR_SESSION_NAME,serialize($cotizacion_detalle_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idcotizacion_detalle=$idGeneral;
			
			$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
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
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}

			if(count($this->cotizacion_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
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
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_bodegaFK_Idbodega=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idbodega','cmbid_bodega');

			$this->strAccionBusqueda='FK_Idbodega';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdcotizacionParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cotizacionFK_Idcotizacion=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcotizacion','cmbid_cotizacion');

			$this->strAccionBusqueda='FK_Idcotizacion';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idotro_suplidorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_otro_suplidorFK_Idotro_suplidor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idotro_suplidor','cmbid_otro_suplidor');

			$this->strAccionBusqueda='FK_Idotro_suplidor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
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
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_productoFK_Idproducto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproducto','cmbid_producto');

			$this->strAccionBusqueda='FK_Idproducto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
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
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_unidadFK_Idunidad=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idunidad','cmbid_unidad');

			$this->strAccionBusqueda='FK_Idunidad';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idbodega($strFinalQuery,$id_bodega)
	{
		try
		{

			$this->cotizacion_detalleLogic->getsFK_Idbodega($strFinalQuery,new Pagination(),$id_bodega);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcotizacion($strFinalQuery,$id_cotizacion)
	{
		try
		{

			$this->cotizacion_detalleLogic->getsFK_Idcotizacion($strFinalQuery,new Pagination(),$id_cotizacion);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idotro_suplidor($strFinalQuery,$id_otro_suplidor)
	{
		try
		{

			$this->cotizacion_detalleLogic->getsFK_Idotro_suplidor($strFinalQuery,new Pagination(),$id_otro_suplidor);
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

			$this->cotizacion_detalleLogic->getsFK_Idproducto($strFinalQuery,new Pagination(),$id_producto);
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

			$this->cotizacion_detalleLogic->getsFK_Idunidad($strFinalQuery,new Pagination(),$id_unidad);
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
			
			
			$cotizacion_detalleForeignKey=new cotizacion_detalle_param_return(); //cotizacion_detalleForeignKey();
			
			$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));
						
			if($cotizacion_detalle_session==null) {
				$cotizacion_detalle_session=new cotizacion_detalle_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$cotizacion_detalleForeignKey=$this->cotizacion_detalleLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$cotizacion_detalle_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cotizacion',$this->strRecargarFkTipos,',')) {
				$this->cotizacionsFK=$cotizacion_detalleForeignKey->cotizacionsFK;
				$this->idcotizacionDefaultFK=$cotizacion_detalleForeignKey->idcotizacionDefaultFK;
			}

			if($cotizacion_detalle_session->bitBusquedaDesdeFKSesioncotizacion) {
				$this->setVisibleBusquedasParacotizacion(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$this->strRecargarFkTipos,',')) {
				$this->bodegasFK=$cotizacion_detalleForeignKey->bodegasFK;
				$this->idbodegaDefaultFK=$cotizacion_detalleForeignKey->idbodegaDefaultFK;
			}

			if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionbodega) {
				$this->setVisibleBusquedasParabodega(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$this->strRecargarFkTipos,',')) {
				$this->productosFK=$cotizacion_detalleForeignKey->productosFK;
				$this->idproductoDefaultFK=$cotizacion_detalleForeignKey->idproductoDefaultFK;
			}

			if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionproducto) {
				$this->setVisibleBusquedasParaproducto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_unidad',$this->strRecargarFkTipos,',')) {
				$this->unidadsFK=$cotizacion_detalleForeignKey->unidadsFK;
				$this->idunidadDefaultFK=$cotizacion_detalleForeignKey->idunidadDefaultFK;
			}

			if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionunidad) {
				$this->setVisibleBusquedasParaunidad(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_otro_suplidor',$this->strRecargarFkTipos,',')) {
				$this->otro_suplidorsFK=$cotizacion_detalleForeignKey->otro_suplidorsFK;
				$this->idotro_suplidorDefaultFK=$cotizacion_detalleForeignKey->idotro_suplidorDefaultFK;
			}

			if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionotro_suplidor) {
				$this->setVisibleBusquedasParaotro_suplidor(true);
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
	
	function cargarCombosFKFromReturnGeneral($cotizacion_detalleReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$cotizacion_detalleReturnGeneral->strRecargarFkTipos;
			
			


			if($cotizacion_detalleReturnGeneral->con_cotizacionsFK==true) {
				$this->cotizacionsFK=$cotizacion_detalleReturnGeneral->cotizacionsFK;
				$this->idcotizacionDefaultFK=$cotizacion_detalleReturnGeneral->idcotizacionDefaultFK;
			}


			if($cotizacion_detalleReturnGeneral->con_bodegasFK==true) {
				$this->bodegasFK=$cotizacion_detalleReturnGeneral->bodegasFK;
				$this->idbodegaDefaultFK=$cotizacion_detalleReturnGeneral->idbodegaDefaultFK;
			}


			if($cotizacion_detalleReturnGeneral->con_productosFK==true) {
				$this->productosFK=$cotizacion_detalleReturnGeneral->productosFK;
				$this->idproductoDefaultFK=$cotizacion_detalleReturnGeneral->idproductoDefaultFK;
			}


			if($cotizacion_detalleReturnGeneral->con_unidadsFK==true) {
				$this->unidadsFK=$cotizacion_detalleReturnGeneral->unidadsFK;
				$this->idunidadDefaultFK=$cotizacion_detalleReturnGeneral->idunidadDefaultFK;
			}


			if($cotizacion_detalleReturnGeneral->con_otro_suplidorsFK==true) {
				$this->otro_suplidorsFK=$cotizacion_detalleReturnGeneral->otro_suplidorsFK;
				$this->idotro_suplidorDefaultFK=$cotizacion_detalleReturnGeneral->idotro_suplidorDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(cotizacion_detalle_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));
		
		if($cotizacion_detalle_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($cotizacion_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cotizacion_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cotizacion';
			}
			else if($cotizacion_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==bodega_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='bodega';
			}
			else if($cotizacion_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==producto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='producto';
			}
			else if($cotizacion_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==unidad_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='unidad';
			}
			else if($cotizacion_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==otro_suplidor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='otro_suplidor';
			}
			
			$cotizacion_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}						
			
			$this->cotizacion_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cotizacion_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cotizacion_detallesAuxiliar=array();
			}
			
			if(count($this->cotizacion_detallesAuxiliar) > 0) {
				
				foreach ($this->cotizacion_detallesAuxiliar as $cotizacion_detalleSeleccionado) {
					$this->eliminarTablaBase($cotizacion_detalleSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
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
	
	
	
	public function getcotizacionsFKListSelectItem() 
	{
		$cotizacionsList=array();

		$item=null;

		foreach($this->cotizacionsFK as $cotizacion)
		{
			$item=new SelectItem();
			$item->setLabel($cotizacion>getId());
			$item->setValue($cotizacion->getId());
			$cotizacionsList[]=$item;
		}

		return $cotizacionsList;
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


	public function getotro_suplidorsFKListSelectItem() 
	{
		$otro_suplidorsList=array();

		$item=null;

		foreach($this->otro_suplidorsFK as $otro_suplidor)
		{
			$item=new SelectItem();
			$item->setLabel($otro_suplidor>getId());
			$item->setValue($otro_suplidor->getId());
			$otro_suplidorsList[]=$item;
		}

		return $otro_suplidorsList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
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
				$this->cotizacion_detalleLogic->commitNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->rollbackNewConnexionToDeep();
				$this->cotizacion_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$cotizacion_detallesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->cotizacion_detalles as $cotizacion_detalleLocal) {
				if($cotizacion_detalleLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->cotizacion_detalle=new cotizacion_detalle();
				
				$this->cotizacion_detalle->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->cotizacion_detalles[]=$this->cotizacion_detalle;*/
				
				$cotizacion_detallesNuevos[]=$this->cotizacion_detalle;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('cotizacion');$classes[]=$class;
				$class=new Classe('bodega');$classes[]=$class;
				$class=new Classe('producto');$classes[]=$class;
				$class=new Classe('unidad');$classes[]=$class;
				$class=new Classe('otro_suplidor');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacion_detalleLogic->setcotizacion_detalles($cotizacion_detallesNuevos);
					
				$this->cotizacion_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($cotizacion_detallesNuevos as $cotizacion_detalleNuevo) {
					$this->cotizacion_detalles[]=$cotizacion_detalleNuevo;
				}
				
				/*$this->cotizacion_detalles[]=$cotizacion_detallesNuevos;*/
				
				$this->cotizacion_detalleLogic->setcotizacion_detalles($this->cotizacion_detalles);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($cotizacion_detallesNuevos!=null);
	}
					
	
	public function cargarComboscotizacionsFK($connexion=null,$strRecargarFkQuery=''){
		$cotizacionLogic= new cotizacion_logic();
		$pagination= new Pagination();
		$this->cotizacionsFK=array();

		$cotizacionLogic->setConnexion($connexion);
		$cotizacionLogic->getcotizacionDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));

		if($cotizacion_detalle_session==null) {
			$cotizacion_detalle_session=new cotizacion_detalle_session();
		}
		
		if($cotizacion_detalle_session->bitBusquedaDesdeFKSesioncotizacion!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cotizacion_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcotizacion=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcotizacion=Funciones::GetFinalQueryAppend($finalQueryGlobalcotizacion, '');
				$finalQueryGlobalcotizacion.=cotizacion_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcotizacion.$strRecargarFkQuery;		

				$cotizacionLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscotizacionsFK($cotizacionLogic->getcotizacions());

		} else {
			$this->setVisibleBusquedasParacotizacion(true);


			if($cotizacion_detalle_session->bigidcotizacionActual!=null && $cotizacion_detalle_session->bigidcotizacionActual > 0) {
				$cotizacionLogic->getEntity($cotizacion_detalle_session->bigidcotizacionActual);//WithConnection

				$this->cotizacionsFK[$cotizacionLogic->getcotizacion()->getId()]=cotizacion_detalle_util::getcotizacionDescripcion($cotizacionLogic->getcotizacion());
				$this->idcotizacionDefaultFK=$cotizacionLogic->getcotizacion()->getId();
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

		$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));

		if($cotizacion_detalle_session==null) {
			$cotizacion_detalle_session=new cotizacion_detalle_session();
		}
		
		if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionbodega!=true) {
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


			if($cotizacion_detalle_session->bigidbodegaActual!=null && $cotizacion_detalle_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($cotizacion_detalle_session->bigidbodegaActual);//WithConnection

				$this->bodegasFK[$bodegaLogic->getbodega()->getId()]=cotizacion_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());
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

		$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));

		if($cotizacion_detalle_session==null) {
			$cotizacion_detalle_session=new cotizacion_detalle_session();
		}
		
		if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionproducto!=true) {
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


			if($cotizacion_detalle_session->bigidproductoActual!=null && $cotizacion_detalle_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($cotizacion_detalle_session->bigidproductoActual);//WithConnection

				$this->productosFK[$productoLogic->getproducto()->getId()]=cotizacion_detalle_util::getproductoDescripcion($productoLogic->getproducto());
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

		$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));

		if($cotizacion_detalle_session==null) {
			$cotizacion_detalle_session=new cotizacion_detalle_session();
		}
		
		if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionunidad!=true) {
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


			if($cotizacion_detalle_session->bigidunidadActual!=null && $cotizacion_detalle_session->bigidunidadActual > 0) {
				$unidadLogic->getEntity($cotizacion_detalle_session->bigidunidadActual);//WithConnection

				$this->unidadsFK[$unidadLogic->getunidad()->getId()]=cotizacion_detalle_util::getunidadDescripcion($unidadLogic->getunidad());
				$this->idunidadDefaultFK=$unidadLogic->getunidad()->getId();
			}
		}
	}

	public function cargarCombosotro_suplidorsFK($connexion=null,$strRecargarFkQuery=''){
		$otro_suplidorLogic= new otro_suplidor_logic();
		$pagination= new Pagination();
		$this->otro_suplidorsFK=array();

		$otro_suplidorLogic->setConnexion($connexion);
		$otro_suplidorLogic->getotro_suplidorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));

		if($cotizacion_detalle_session==null) {
			$cotizacion_detalle_session=new cotizacion_detalle_session();
		}
		
		if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionotro_suplidor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=otro_suplidor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalotro_suplidor=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalotro_suplidor=Funciones::GetFinalQueryAppend($finalQueryGlobalotro_suplidor, '');
				$finalQueryGlobalotro_suplidor.=otro_suplidor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalotro_suplidor.$strRecargarFkQuery;		

				$otro_suplidorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosotro_suplidorsFK($otro_suplidorLogic->getotro_suplidors());

		} else {
			$this->setVisibleBusquedasParaotro_suplidor(true);


			if($cotizacion_detalle_session->bigidotro_suplidorActual!=null && $cotizacion_detalle_session->bigidotro_suplidorActual > 0) {
				$otro_suplidorLogic->getEntity($cotizacion_detalle_session->bigidotro_suplidorActual);//WithConnection

				$this->otro_suplidorsFK[$otro_suplidorLogic->getotro_suplidor()->getId()]=cotizacion_detalle_util::getotro_suplidorDescripcion($otro_suplidorLogic->getotro_suplidor());
				$this->idotro_suplidorDefaultFK=$otro_suplidorLogic->getotro_suplidor()->getId();
			}
		}
	}

	
	
	public function prepararComboscotizacionsFK($cotizacions){

		foreach ($cotizacions as $cotizacionLocal ) {
			if($this->idcotizacionDefaultFK==0) {
				$this->idcotizacionDefaultFK=$cotizacionLocal->getId();
			}

			$this->cotizacionsFK[$cotizacionLocal->getId()]=cotizacion_detalle_util::getcotizacionDescripcion($cotizacionLocal);
		}
	}

	public function prepararCombosbodegasFK($bodegas){

		foreach ($bodegas as $bodegaLocal ) {
			if($this->idbodegaDefaultFK==0) {
				$this->idbodegaDefaultFK=$bodegaLocal->getId();
			}

			$this->bodegasFK[$bodegaLocal->getId()]=cotizacion_detalle_util::getbodegaDescripcion($bodegaLocal);
		}
	}

	public function prepararCombosproductosFK($productos){

		foreach ($productos as $productoLocal ) {
			if($this->idproductoDefaultFK==0) {
				$this->idproductoDefaultFK=$productoLocal->getId();
			}

			$this->productosFK[$productoLocal->getId()]=cotizacion_detalle_util::getproductoDescripcion($productoLocal);
		}
	}

	public function prepararCombosunidadsFK($unidads){

		foreach ($unidads as $unidadLocal ) {
			if($this->idunidadDefaultFK==0) {
				$this->idunidadDefaultFK=$unidadLocal->getId();
			}

			$this->unidadsFK[$unidadLocal->getId()]=cotizacion_detalle_util::getunidadDescripcion($unidadLocal);
		}
	}

	public function prepararCombosotro_suplidorsFK($otro_suplidors){

		foreach ($otro_suplidors as $otro_suplidorLocal ) {
			if($this->idotro_suplidorDefaultFK==0) {
				$this->idotro_suplidorDefaultFK=$otro_suplidorLocal->getId();
			}

			$this->otro_suplidorsFK[$otro_suplidorLocal->getId()]=cotizacion_detalle_util::getotro_suplidorDescripcion($otro_suplidorLocal);
		}
	}

	
	
	public function cargarDescripcioncotizacionFK($idcotizacion,$connexion=null){
		$cotizacionLogic= new cotizacion_logic();
		$cotizacionLogic->setConnexion($connexion);
		$cotizacionLogic->getcotizacionDataAccess()->isForFKData=true;
		$strDescripcioncotizacion='';

		if($idcotizacion!=null && $idcotizacion!='' && $idcotizacion!='null') {
			if($connexion!=null) {
				$cotizacionLogic->getEntity($idcotizacion);//WithConnection
			} else {
				$cotizacionLogic->getEntityWithConnection($idcotizacion);//
			}

			$strDescripcioncotizacion=cotizacion_detalle_util::getcotizacionDescripcion($cotizacionLogic->getcotizacion());

		} else {
			$strDescripcioncotizacion='null';
		}

		return $strDescripcioncotizacion;
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

			$strDescripcionbodega=cotizacion_detalle_util::getbodegaDescripcion($bodegaLogic->getbodega());

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

			$strDescripcionproducto=cotizacion_detalle_util::getproductoDescripcion($productoLogic->getproducto());

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

			$strDescripcionunidad=cotizacion_detalle_util::getunidadDescripcion($unidadLogic->getunidad());

		} else {
			$strDescripcionunidad='null';
		}

		return $strDescripcionunidad;
	}

	public function cargarDescripcionotro_suplidorFK($idotro_suplidor,$connexion=null){
		$otro_suplidorLogic= new otro_suplidor_logic();
		$otro_suplidorLogic->setConnexion($connexion);
		$otro_suplidorLogic->getotro_suplidorDataAccess()->isForFKData=true;
		$strDescripcionotro_suplidor='';

		if($idotro_suplidor!=null && $idotro_suplidor!='' && $idotro_suplidor!='null') {
			if($connexion!=null) {
				$otro_suplidorLogic->getEntity($idotro_suplidor);//WithConnection
			} else {
				$otro_suplidorLogic->getEntityWithConnection($idotro_suplidor);//
			}

			$strDescripcionotro_suplidor=cotizacion_detalle_util::getotro_suplidorDescripcion($otro_suplidorLogic->getotro_suplidor());

		} else {
			$strDescripcionotro_suplidor='null';
		}

		return $strDescripcionotro_suplidor;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(cotizacion_detalle $cotizacion_detalleClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParacotizacion($isParacotizacion){
		$strParaVisiblecotizacion='display:table-row';
		$strParaVisibleNegacioncotizacion='display:none';

		if($isParacotizacion) {
			$strParaVisiblecotizacion='display:table-row';
			$strParaVisibleNegacioncotizacion='display:none';
		} else {
			$strParaVisiblecotizacion='display:none';
			$strParaVisibleNegacioncotizacion='display:table-row';
		}


		$strParaVisibleNegacioncotizacion=trim($strParaVisibleNegacioncotizacion);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacioncotizacion;
		$this->strVisibleFK_Idcotizacion=$strParaVisiblecotizacion;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacioncotizacion;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacioncotizacion;
		$this->strVisibleFK_Idunidad=$strParaVisibleNegacioncotizacion;
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
		$this->strVisibleFK_Idcotizacion=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionbodega;
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
		$this->strVisibleFK_Idcotizacion=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionproducto;
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
		$this->strVisibleFK_Idcotizacion=$strParaVisibleNegacionunidad;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleNegacionunidad;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionunidad;
		$this->strVisibleFK_Idunidad=$strParaVisibleunidad;
	}

	public function setVisibleBusquedasParaotro_suplidor($isParaotro_suplidor){
		$strParaVisibleotro_suplidor='display:table-row';
		$strParaVisibleNegacionotro_suplidor='display:none';

		if($isParaotro_suplidor) {
			$strParaVisibleotro_suplidor='display:table-row';
			$strParaVisibleNegacionotro_suplidor='display:none';
		} else {
			$strParaVisibleotro_suplidor='display:none';
			$strParaVisibleNegacionotro_suplidor='display:table-row';
		}


		$strParaVisibleNegacionotro_suplidor=trim($strParaVisibleNegacionotro_suplidor);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idcotizacion=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idotro_suplidor=$strParaVisibleotro_suplidor;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionotro_suplidor;
		$this->strVisibleFK_Idunidad=$strParaVisibleNegacionotro_suplidor;
	}
	
	

	public function abrirBusquedaParacotizacion() {//$idcotizacion_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcotizacion_detalleActual=$idcotizacion_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cotizacion_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cotizacion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cotizacion(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cotizacion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cotizacion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cotizacion(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cotizacion_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcotizacion_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParabodega() {//$idcotizacion_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcotizacion_detalleActual=$idcotizacion_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.bodega_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cotizacion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',bodega_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cotizacion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(bodega_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcotizacion_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaproducto() {//$idcotizacion_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcotizacion_detalleActual=$idcotizacion_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.producto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cotizacion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cotizacion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcotizacion_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaunidad() {//$idcotizacion_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcotizacion_detalleActual=$idcotizacion_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.unidad_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cotizacion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_unidad(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',unidad_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cotizacion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_unidad(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(unidad_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcotizacion_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaotro_suplidor() {//$idcotizacion_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcotizacion_detalleActual=$idcotizacion_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.otro_suplidor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cotizacion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_otro_suplidor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',otro_suplidor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cotizacion_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_otro_suplidor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(otro_suplidor_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcotizacion_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(cotizacion_detalle_util::$STR_SESSION_NAME,cotizacion_detalle_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$cotizacion_detalle_session=$this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME);
				
		if($cotizacion_detalle_session==null) {
			$cotizacion_detalle_session=new cotizacion_detalle_session();		
			//$this->Session->write('cotizacion_detalle_session',$cotizacion_detalle_session);							
		}
		*/
		
		$cotizacion_detalle_session=new cotizacion_detalle_session();
    	$cotizacion_detalle_session->strPathNavegacionActual=cotizacion_detalle_util::$STR_CLASS_WEB_TITULO;
    	$cotizacion_detalle_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(cotizacion_detalle_util::$STR_SESSION_NAME,serialize($cotizacion_detalle_session));		
	}	
	
	public function getSetBusquedasSesionConfig(cotizacion_detalle_session $cotizacion_detalle_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $cotizacion_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
			if($cotizacion_detalle_session->bigIdActualFK!=null && $cotizacion_detalle_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$cotizacion_detalle_session->bigIdActualFKParaPosibleAtras=$cotizacion_detalle_session->bigIdActualFK;*/
			}
				
			$cotizacion_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$cotizacion_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(cotizacion_detalle_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($cotizacion_detalle_session->bitBusquedaDesdeFKSesioncotizacion!=null && $cotizacion_detalle_session->bitBusquedaDesdeFKSesioncotizacion==true)
			{
				if($cotizacion_detalle_session->bigidcotizacionActual!=0) {
					$this->strAccionBusqueda='FK_Idcotizacion';

					$existe_history=HistoryWeb::ExisteElemento(cotizacion_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cotizacion_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cotizacion_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cotizacion_detalle_session->bigidcotizacionActualDescripcion);
						$historyWeb->setIdActual($cotizacion_detalle_session->bigidcotizacionActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cotizacion_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cotizacion_detalle_session->bigidcotizacionActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cotizacion_detalle_session->bitBusquedaDesdeFKSesioncotizacion=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;

				if($cotizacion_detalle_session->intNumeroPaginacion==cotizacion_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionbodega!=null && $cotizacion_detalle_session->bitBusquedaDesdeFKSesionbodega==true)
			{
				if($cotizacion_detalle_session->bigidbodegaActual!=0) {
					$this->strAccionBusqueda='FK_Idbodega';

					$existe_history=HistoryWeb::ExisteElemento(cotizacion_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cotizacion_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cotizacion_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cotizacion_detalle_session->bigidbodegaActualDescripcion);
						$historyWeb->setIdActual($cotizacion_detalle_session->bigidbodegaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cotizacion_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cotizacion_detalle_session->bigidbodegaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cotizacion_detalle_session->bitBusquedaDesdeFKSesionbodega=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;

				if($cotizacion_detalle_session->intNumeroPaginacion==cotizacion_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionproducto!=null && $cotizacion_detalle_session->bitBusquedaDesdeFKSesionproducto==true)
			{
				if($cotizacion_detalle_session->bigidproductoActual!=0) {
					$this->strAccionBusqueda='FK_Idproducto';

					$existe_history=HistoryWeb::ExisteElemento(cotizacion_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cotizacion_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cotizacion_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cotizacion_detalle_session->bigidproductoActualDescripcion);
						$historyWeb->setIdActual($cotizacion_detalle_session->bigidproductoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cotizacion_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cotizacion_detalle_session->bigidproductoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cotizacion_detalle_session->bitBusquedaDesdeFKSesionproducto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;

				if($cotizacion_detalle_session->intNumeroPaginacion==cotizacion_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionunidad!=null && $cotizacion_detalle_session->bitBusquedaDesdeFKSesionunidad==true)
			{
				if($cotizacion_detalle_session->bigidunidadActual!=0) {
					$this->strAccionBusqueda='FK_Idunidad';

					$existe_history=HistoryWeb::ExisteElemento(cotizacion_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cotizacion_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cotizacion_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cotizacion_detalle_session->bigidunidadActualDescripcion);
						$historyWeb->setIdActual($cotizacion_detalle_session->bigidunidadActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cotizacion_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cotizacion_detalle_session->bigidunidadActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cotizacion_detalle_session->bitBusquedaDesdeFKSesionunidad=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;

				if($cotizacion_detalle_session->intNumeroPaginacion==cotizacion_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cotizacion_detalle_session->bitBusquedaDesdeFKSesionotro_suplidor!=null && $cotizacion_detalle_session->bitBusquedaDesdeFKSesionotro_suplidor==true)
			{
				if($cotizacion_detalle_session->bigidotro_suplidorActual!=0) {
					$this->strAccionBusqueda='FK_Idotro_suplidor';

					$existe_history=HistoryWeb::ExisteElemento(cotizacion_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cotizacion_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cotizacion_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cotizacion_detalle_session->bigidotro_suplidorActualDescripcion);
						$historyWeb->setIdActual($cotizacion_detalle_session->bigidotro_suplidorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cotizacion_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cotizacion_detalle_session->bigidotro_suplidorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cotizacion_detalle_session->bitBusquedaDesdeFKSesionotro_suplidor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;

				if($cotizacion_detalle_session->intNumeroPaginacion==cotizacion_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_detalle_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$cotizacion_detalle_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));
		
		if($cotizacion_detalle_session==null) {
			$cotizacion_detalle_session=new cotizacion_detalle_session();
		}
		
		$cotizacion_detalle_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$cotizacion_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cotizacion_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idbodega') {
			$cotizacion_detalle_session->id_bodega=$this->id_bodegaFK_Idbodega;	

		}
		else if($this->strAccionBusqueda=='FK_Idcotizacion') {
			$cotizacion_detalle_session->id_cotizacion=$this->id_cotizacionFK_Idcotizacion;	

		}
		else if($this->strAccionBusqueda=='FK_Idotro_suplidor') {
			$cotizacion_detalle_session->id_otro_suplidor=$this->id_otro_suplidorFK_Idotro_suplidor;	

		}
		else if($this->strAccionBusqueda=='FK_Idproducto') {
			$cotizacion_detalle_session->id_producto=$this->id_productoFK_Idproducto;	

		}
		else if($this->strAccionBusqueda=='FK_Idunidad') {
			$cotizacion_detalle_session->id_unidad=$this->id_unidadFK_Idunidad;	

		}
		
		$this->Session->write(cotizacion_detalle_util::$STR_SESSION_NAME,serialize($cotizacion_detalle_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(cotizacion_detalle_session $cotizacion_detalle_session) {
		
		if($cotizacion_detalle_session==null) {
			$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));
		}
		
		if($cotizacion_detalle_session==null) {
		   $cotizacion_detalle_session=new cotizacion_detalle_session();
		}
		
		if($cotizacion_detalle_session->strUltimaBusqueda!=null && $cotizacion_detalle_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$cotizacion_detalle_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$cotizacion_detalle_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$cotizacion_detalle_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idbodega') {
				$this->id_bodegaFK_Idbodega=$cotizacion_detalle_session->id_bodega;
				$cotizacion_detalle_session->id_bodega=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcotizacion') {
				$this->id_cotizacionFK_Idcotizacion=$cotizacion_detalle_session->id_cotizacion;
				$cotizacion_detalle_session->id_cotizacion=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idotro_suplidor') {
				$this->id_otro_suplidorFK_Idotro_suplidor=$cotizacion_detalle_session->id_otro_suplidor;
				$cotizacion_detalle_session->id_otro_suplidor=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idproducto') {
				$this->id_productoFK_Idproducto=$cotizacion_detalle_session->id_producto;
				$cotizacion_detalle_session->id_producto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idunidad') {
				$this->id_unidadFK_Idunidad=$cotizacion_detalle_session->id_unidad;
				$cotizacion_detalle_session->id_unidad=-1;

			}
		}
		
		$cotizacion_detalle_session->strUltimaBusqueda='';
		//$cotizacion_detalle_session->intNumeroPaginacion=10;
		$cotizacion_detalle_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(cotizacion_detalle_util::$STR_SESSION_NAME,serialize($cotizacion_detalle_session));		
	}
	
	public function cotizacion_detallesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idcotizacionDefaultFK = 0;
		$this->idbodegaDefaultFK = 0;
		$this->idproductoDefaultFK = 0;
		$this->idunidadDefaultFK = 0;
		$this->idotro_suplidorDefaultFK = 0;
	}
	
	public function setcotizacion_detalleFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_cotizacion',$this->idcotizacionDefaultFK);
		$this->setExistDataCampoForm('form','id_bodega',$this->idbodegaDefaultFK);
		$this->setExistDataCampoForm('form','id_producto',$this->idproductoDefaultFK);
		$this->setExistDataCampoForm('form','id_unidad',$this->idunidadDefaultFK);
		$this->setExistDataCampoForm('form','id_otro_suplidor',$this->idotro_suplidorDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		cotizacion::$class;
		cotizacion_carga::$CONTROLLER;

		bodega::$class;
		bodega_carga::$CONTROLLER;

		producto::$class;
		producto_carga::$CONTROLLER;

		unidad::$class;
		unidad_carga::$CONTROLLER;

		otro_suplidor::$class;
		otro_suplidor_carga::$CONTROLLER;
		
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
		interface cotizacion_detalle_controlI {	
		
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
		
		public function onLoad(cotizacion_detalle_session $cotizacion_detalle_session=null);	
		function index(?string $strTypeOnLoadcotizacion_detalle='',?string $strTipoPaginaAuxiliarcotizacion_detalle='',?string $strTipoUsuarioAuxiliarcotizacion_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadcotizacion_detalle='',string $strTipoPaginaAuxiliarcotizacion_detalle='',string $strTipoUsuarioAuxiliarcotizacion_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($cotizacion_detalleReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(cotizacion_detalle $cotizacion_detalleClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(cotizacion_detalle_session $cotizacion_detalle_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(cotizacion_detalle_session $cotizacion_detalle_session);	
		public function cotizacion_detallesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setcotizacion_detalleFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
