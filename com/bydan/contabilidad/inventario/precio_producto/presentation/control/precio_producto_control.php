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

namespace com\bydan\contabilidad\inventario\precio_producto\presentation\control;

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

use com\bydan\contabilidad\inventario\precio_producto\business\entity\precio_producto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/precio_producto/util/precio_producto_carga.php');
use com\bydan\contabilidad\inventario\precio_producto\util\precio_producto_carga;

use com\bydan\contabilidad\inventario\precio_producto\util\precio_producto_util;
use com\bydan\contabilidad\inventario\precio_producto\util\precio_producto_param_return;
use com\bydan\contabilidad\inventario\precio_producto\business\logic\precio_producto_logic;
use com\bydan\contabilidad\inventario\precio_producto\presentation\session\precio_producto_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\tipo_precio\business\entity\tipo_precio;
use com\bydan\contabilidad\inventario\tipo_precio\business\logic\tipo_precio_logic;
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_carga;
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
precio_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
precio_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
precio_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
precio_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*precio_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/inventario/precio_producto/presentation/control/precio_producto_init_control.php');
use com\bydan\contabilidad\inventario\precio_producto\presentation\control\precio_producto_init_control;

include_once('com/bydan/contabilidad/inventario/precio_producto/presentation/control/precio_producto_base_control.php');
use com\bydan\contabilidad\inventario\precio_producto\presentation\control\precio_producto_base_control;

class precio_producto_control extends precio_producto_base_control {	
	
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
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idproducto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdproductoParaProcesar();
			}
			else if($action=="FK_Idtipo_precio"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_precioParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idprecio_productoActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idprecio_productoActual
			}
			else if($action=='abrirBusquedaParabodega') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idprecio_productoActual=$this->getDataId();
				$this->abrirBusquedaParabodega();//$idprecio_productoActual
			}
			else if($action=='abrirBusquedaParaproducto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idprecio_productoActual=$this->getDataId();
				$this->abrirBusquedaParaproducto();//$idprecio_productoActual
			}
			else if($action=='abrirBusquedaParatipo_precio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idprecio_productoActual=$this->getDataId();
				$this->abrirBusquedaParatipo_precio();//$idprecio_productoActual
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
					
					$precio_productoController = new precio_producto_control();
					
					$precio_productoController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($precio_productoController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$precio_productoController = new precio_producto_control();
						$precio_productoController = $this;
						
						$jsonResponse = json_encode($precio_productoController->precio_productos);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->precio_productoReturnGeneral==null) {
					$this->precio_productoReturnGeneral=new precio_producto_param_return();
				}
				
				echo($this->precio_productoReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$precio_productoController=new precio_producto_control();
		
		$precio_productoController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$precio_productoController->usuarioActual=new usuario();
		
		$precio_productoController->usuarioActual->setId($this->usuarioActual->getId());
		$precio_productoController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$precio_productoController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$precio_productoController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$precio_productoController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$precio_productoController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$precio_productoController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$precio_productoController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $precio_productoController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadprecio_producto= $this->getDataGeneralString('strTypeOnLoadprecio_producto');
		$strTipoPaginaAuxiliarprecio_producto= $this->getDataGeneralString('strTipoPaginaAuxiliarprecio_producto');
		$strTipoUsuarioAuxiliarprecio_producto= $this->getDataGeneralString('strTipoUsuarioAuxiliarprecio_producto');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadprecio_producto,$strTipoPaginaAuxiliarprecio_producto,$strTipoUsuarioAuxiliarprecio_producto,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadprecio_producto!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('precio_producto','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(precio_producto_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarprecio_producto,$this->strTipoUsuarioAuxiliarprecio_producto,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(precio_producto_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarprecio_producto,$this->strTipoUsuarioAuxiliarprecio_producto,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->precio_productoReturnGeneral=new precio_producto_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->precio_productoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->precio_productoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->precio_productoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->precio_productoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->precio_productoReturnGeneral);
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
		$this->precio_productoReturnGeneral=new precio_producto_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->precio_productoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->precio_productoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->precio_productoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->precio_productoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->precio_productoReturnGeneral);
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
		$this->precio_productoReturnGeneral=new precio_producto_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->precio_productoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->precio_productoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->precio_productoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->precio_productoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->precio_productoReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
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
			
			
			$this->precio_productoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->precio_productoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->precio_productoReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->precio_productoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->precio_productoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->precio_productoReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->precio_productoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->precio_productoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->precio_productoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->precio_productoReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->precio_productoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->precio_productoReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->precio_productoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->precio_productoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->precio_productoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->precio_productoReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->precio_productoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->precio_productoReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
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
		
		$this->precio_productoLogic=new precio_producto_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->precio_producto=new precio_producto();
		
		$this->strTypeOnLoadprecio_producto='onload';
		$this->strTipoPaginaAuxiliarprecio_producto='none';
		$this->strTipoUsuarioAuxiliarprecio_producto='none';	

		$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;
		
		$this->precio_productoModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->precio_productoControllerAdditional=new precio_producto_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(precio_producto_session $precio_producto_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($precio_producto_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadprecio_producto='',?string $strTipoPaginaAuxiliarprecio_producto='',?string $strTipoUsuarioAuxiliarprecio_producto='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadprecio_producto=$strTypeOnLoadprecio_producto;
			$this->strTipoPaginaAuxiliarprecio_producto=$strTipoPaginaAuxiliarprecio_producto;
			$this->strTipoUsuarioAuxiliarprecio_producto=$strTipoUsuarioAuxiliarprecio_producto;
	
			if($strTipoUsuarioAuxiliarprecio_producto=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->precio_producto=new precio_producto();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Precio Productos';
			
			
			$precio_producto_session=unserialize($this->Session->read(precio_producto_util::$STR_SESSION_NAME));
							
			if($precio_producto_session==null) {
				$precio_producto_session=new precio_producto_session();
				
				/*$this->Session->write('precio_producto_session',$precio_producto_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($precio_producto_session->strFuncionJsPadre!=null && $precio_producto_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$precio_producto_session->strFuncionJsPadre;
				
				$precio_producto_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($precio_producto_session);
			
			if($strTypeOnLoadprecio_producto!=null && $strTypeOnLoadprecio_producto=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$precio_producto_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$precio_producto_session->setPaginaPopupVariables(true);
				}
				
				if($precio_producto_session->intNumeroPaginacion==precio_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$precio_producto_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,precio_producto_util::$STR_SESSION_NAME,'inventario');																
			
			} else if($strTypeOnLoadprecio_producto!=null && $strTypeOnLoadprecio_producto=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$precio_producto_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;*/
				
				if($precio_producto_session->intNumeroPaginacion==precio_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$precio_producto_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarprecio_producto!=null && $strTipoPaginaAuxiliarprecio_producto=='none') {
				/*$precio_producto_session->strStyleDivHeader='display:table-row';*/
				
				/*$precio_producto_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarprecio_producto!=null && $strTipoPaginaAuxiliarprecio_producto=='iframe') {
					/*
					$precio_producto_session->strStyleDivArbol='display:none';
					$precio_producto_session->strStyleDivHeader='display:none';
					$precio_producto_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$precio_producto_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->precio_productoClase=new precio_producto();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=precio_producto_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(precio_producto_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->precio_productoLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->precio_productoLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->precio_productoLogic=new precio_producto_logic();*/
			
			
			$this->precio_productosModel=null;
			/*new ListDataModel();*/
			
			/*$this->precio_productosModel.setWrappedData(precio_productoLogic->getprecio_productos());*/
						
			$this->precio_productos= array();
			$this->precio_productosEliminados=array();
			$this->precio_productosSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= precio_producto_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->precio_producto= new precio_producto();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idbodega='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idproducto='display:table-row';
			$this->strVisibleFK_Idtipo_precio='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarprecio_producto!=null && $strTipoUsuarioAuxiliarprecio_producto!='none' && $strTipoUsuarioAuxiliarprecio_producto!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarprecio_producto);
																
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
				if($strTipoUsuarioAuxiliarprecio_producto!=null && $strTipoUsuarioAuxiliarprecio_producto!='none' && $strTipoUsuarioAuxiliarprecio_producto!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarprecio_producto);
																
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
				if($strTipoUsuarioAuxiliarprecio_producto==null || $strTipoUsuarioAuxiliarprecio_producto=='none' || $strTipoUsuarioAuxiliarprecio_producto=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarprecio_producto,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, precio_producto_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, precio_producto_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina precio_producto');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($precio_producto_session);
			
			$this->getSetBusquedasSesionConfig($precio_producto_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteprecio_productos($this->strAccionBusqueda,$this->precio_productoLogic->getprecio_productos());*/
				} else if($this->strGenerarReporte=='Html')	{
					$precio_producto_session->strServletGenerarHtmlReporte='precio_productoServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(precio_producto_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(precio_producto_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($precio_producto_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$precio_producto_session=unserialize($this->Session->read(precio_producto_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarprecio_producto!=null && $strTipoUsuarioAuxiliarprecio_producto=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($precio_producto_session);
			}
								
			$this->set(precio_producto_util::$STR_SESSION_NAME, $precio_producto_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($precio_producto_session);
			
			/*
			$this->precio_producto->recursive = 0;
			
			$this->precio_productos=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('precio_productos', $this->precio_productos);
			
			$this->set(precio_producto_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->precio_productoActual =$this->precio_productoClase;
			
			/*$this->precio_productoActual =$this->migrarModelprecio_producto($this->precio_productoClase);*/
			
			$this->returnHtml(false);
			
			$this->set(precio_producto_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=precio_producto_util::$STR_NOMBRE_OPCION;
				
			if(precio_producto_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=precio_producto_util::$STR_MODULO_OPCION.precio_producto_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(precio_producto_util::$STR_SESSION_NAME,serialize($precio_producto_session));
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
			/*$precio_productoClase= (precio_producto) precio_productosModel.getRowData();*/
			
			$this->precio_productoClase->setId($this->precio_producto->getId());	
			$this->precio_productoClase->setVersionRow($this->precio_producto->getVersionRow());	
			$this->precio_productoClase->setVersionRow($this->precio_producto->getVersionRow());	
			$this->precio_productoClase->setid_empresa($this->precio_producto->getid_empresa());	
			$this->precio_productoClase->setid_bodega($this->precio_producto->getid_bodega());	
			$this->precio_productoClase->setid_producto($this->precio_producto->getid_producto());	
			$this->precio_productoClase->setid_tipo_precio($this->precio_producto->getid_tipo_precio());	
			$this->precio_productoClase->setprecio($this->precio_producto->getprecio());	
			$this->precio_productoClase->setdescuento_porciento($this->precio_producto->getdescuento_porciento());	
		
			/*$this->Session->write('precio_productoVersionRowActual', precio_producto.getVersionRow());*/
			
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
			
			$precio_producto_session=unserialize($this->Session->read(precio_producto_util::$STR_SESSION_NAME));
						
			if($precio_producto_session==null) {
				$precio_producto_session=new precio_producto_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('precio_producto', $this->precio_producto->read(null, $id));
	
			
			$this->precio_producto->recursive = 0;
			
			$this->precio_productos=$this->paginate();
			
			$this->set('precio_productos', $this->precio_productos);
	
			if (empty($this->data)) {
				$this->data = $this->precio_producto->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->precio_productoLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->precio_productoClase);
			
			$this->precio_productoActual=$this->precio_productoClase;
			
			/*$this->precio_productoActual =$this->migrarModelprecio_producto($this->precio_productoClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->precio_productoLogic->getprecio_productos(),$this->precio_productoActual);
			
			$this->actualizarControllerConReturnGeneral($this->precio_productoReturnGeneral);
			
			//$this->precio_productoReturnGeneral=$this->precio_productoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->precio_productoLogic->getprecio_productos(),$this->precio_productoActual,$this->precio_productoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$precio_producto_session=unserialize($this->Session->read(precio_producto_util::$STR_SESSION_NAME));
						
			if($precio_producto_session==null) {
				$precio_producto_session=new precio_producto_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoprecio_producto', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->precio_productoClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->precio_productoClase);
			
			$this->precio_productoActual =$this->precio_productoClase;
			
			/*$this->precio_productoActual =$this->migrarModelprecio_producto($this->precio_productoClase);*/
			
			$this->setprecio_productoFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->precio_productoLogic->getprecio_productos(),$this->precio_producto);
			
			$this->actualizarControllerConReturnGeneral($this->precio_productoReturnGeneral);
			
			//this->precio_productoReturnGeneral=$this->precio_productoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->precio_productoLogic->getprecio_productos(),$this->precio_producto,$this->precio_productoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->precio_productoReturnGeneral->getprecio_producto()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idbodegaDefaultFK!=null && $this->idbodegaDefaultFK > -1) {
				$this->precio_productoReturnGeneral->getprecio_producto()->setid_bodega($this->idbodegaDefaultFK);
			}

			if($this->idproductoDefaultFK!=null && $this->idproductoDefaultFK > -1) {
				$this->precio_productoReturnGeneral->getprecio_producto()->setid_producto($this->idproductoDefaultFK);
			}

			if($this->idtipo_precioDefaultFK!=null && $this->idtipo_precioDefaultFK > -1) {
				$this->precio_productoReturnGeneral->getprecio_producto()->setid_tipo_precio($this->idtipo_precioDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->precio_productoReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->precio_productoReturnGeneral->getprecio_producto(),$this->precio_productoActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyprecio_producto($this->precio_productoReturnGeneral->getprecio_producto());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioprecio_producto($this->precio_productoReturnGeneral->getprecio_producto());*/
			}
			
			if($this->precio_productoReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->precio_productoReturnGeneral->getprecio_producto(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualprecio_producto($this->precio_producto,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->precio_productosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->precio_productosAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->precio_productosAuxiliar=array();
			}
			
			if(count($this->precio_productosAuxiliar)==2) {
				$precio_productoOrigen=$this->precio_productosAuxiliar[0];
				$precio_productoDestino=$this->precio_productosAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($precio_productoOrigen,$precio_productoDestino,true,false,false);
				
				$this->actualizarLista($precio_productoDestino,$this->precio_productos);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->precio_productosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->precio_productosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->precio_productosAuxiliar=array();
			}
			
			if(count($this->precio_productosAuxiliar) > 0) {
				foreach ($this->precio_productosAuxiliar as $precio_productoSeleccionado) {
					$this->precio_producto=new precio_producto();
					
					$this->setCopiarVariablesObjetos($precio_productoSeleccionado,$this->precio_producto,true,true,false);
						
					$this->precio_productos[]=$this->precio_producto;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->precio_productosEliminados as $precio_productoEliminado) {
				$this->precio_productoLogic->precio_productos[]=$precio_productoEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->precio_producto=new precio_producto();
							
				$this->precio_productos[]=$this->precio_producto;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
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
		
		$precio_productoActual=new precio_producto();
		
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
				
				$precio_productoActual=$this->precio_productos[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $precio_productoActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $precio_productoActual->setid_bodega((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $precio_productoActual->setid_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $precio_productoActual->setid_tipo_precio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $precio_productoActual->setprecio((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $precio_productoActual->setdescuento_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
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
				$this->precio_productoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadprecio_producto='',string $strTipoPaginaAuxiliarprecio_producto='',string $strTipoUsuarioAuxiliarprecio_producto='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadprecio_producto,$strTipoPaginaAuxiliarprecio_producto,$strTipoUsuarioAuxiliarprecio_producto,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->precio_productos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=precio_producto_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=precio_producto_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=precio_producto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$precio_producto_session=unserialize($this->Session->read(precio_producto_util::$STR_SESSION_NAME));
						
			if($precio_producto_session==null) {
				$precio_producto_session=new precio_producto_session();
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
					/*$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;*/
					
					if($precio_producto_session->intNumeroPaginacion==precio_producto_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$precio_producto_session->intNumeroPaginacion;
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
			
			$this->precio_productosEliminados=array();
			
			/*$this->precio_productoLogic->setConnexion($connexion);*/
			
			$this->precio_productoLogic->setIsConDeep(true);
			
			$this->precio_productoLogic->getprecio_productoDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('bodega');$classes[]=$class;
			$class=new Classe('producto');$classes[]=$class;
			$class=new Classe('tipo_precio');$classes[]=$class;
			
			$this->precio_productoLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->precio_productoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->precio_productoLogic->getprecio_productos()==null|| count($this->precio_productoLogic->getprecio_productos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->precio_productos=$this->precio_productoLogic->getprecio_productos();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->precio_productoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->precio_productosReporte=$this->precio_productoLogic->getprecio_productos();
									
						/*$this->generarReportes('Todos',$this->precio_productoLogic->getprecio_productos());*/
					
						$this->precio_productoLogic->setprecio_productos($this->precio_productos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->precio_productoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->precio_productoLogic->getprecio_productos()==null|| count($this->precio_productoLogic->getprecio_productos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->precio_productos=$this->precio_productoLogic->getprecio_productos();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->precio_productoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->precio_productosReporte=$this->precio_productoLogic->getprecio_productos();
									
						/*$this->generarReportes('Todos',$this->precio_productoLogic->getprecio_productos());*/
					
						$this->precio_productoLogic->setprecio_productos($this->precio_productos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idprecio_producto=0;*/
				
				if($precio_producto_session->bitBusquedaDesdeFKSesionFK!=null && $precio_producto_session->bitBusquedaDesdeFKSesionFK==true) {
					if($precio_producto_session->bigIdActualFK!=null && $precio_producto_session->bigIdActualFK!=0)	{
						$this->idprecio_producto=$precio_producto_session->bigIdActualFK;	
					}
					
					$precio_producto_session->bitBusquedaDesdeFKSesionFK=false;
					
					$precio_producto_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idprecio_producto=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idprecio_producto=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->precio_productoLogic->getEntity($this->idprecio_producto);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*precio_productoLogicAdditional::getDetalleIndicePorId($idprecio_producto);*/

				
				if($this->precio_productoLogic->getprecio_producto()!=null) {
					$this->precio_productoLogic->setprecio_productos(array());
					$this->precio_productoLogic->precio_productos[]=$this->precio_productoLogic->getprecio_producto();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idbodega')
			{

				if($precio_producto_session->bigidbodegaActual!=null && $precio_producto_session->bigidbodegaActual!=0)
				{
					$this->id_bodegaFK_Idbodega=$precio_producto_session->bigidbodegaActual;
					$precio_producto_session->bigidbodegaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->precio_productoLogic->getsFK_Idbodega($finalQueryPaginacion,$this->pagination,$this->id_bodegaFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//precio_productoLogicAdditional::getDetalleIndiceFK_Idbodega($this->id_bodegaFK_Idbodega);


					if($this->precio_productoLogic->getprecio_productos()==null || count($this->precio_productoLogic->getprecio_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$precio_productos=$this->precio_productoLogic->getprecio_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->precio_productoLogic->getsFK_Idbodega('',$this->pagination,$this->id_bodegaFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->precio_productosReporte=$this->precio_productoLogic->getprecio_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteprecio_productos("FK_Idbodega",$this->precio_productoLogic->getprecio_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->precio_productoLogic->setprecio_productos($precio_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($precio_producto_session->bigidempresaActual!=null && $precio_producto_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$precio_producto_session->bigidempresaActual;
					$precio_producto_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->precio_productoLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//precio_productoLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->precio_productoLogic->getprecio_productos()==null || count($this->precio_productoLogic->getprecio_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$precio_productos=$this->precio_productoLogic->getprecio_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->precio_productoLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->precio_productosReporte=$this->precio_productoLogic->getprecio_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteprecio_productos("FK_Idempresa",$this->precio_productoLogic->getprecio_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->precio_productoLogic->setprecio_productos($precio_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idproducto')
			{

				if($precio_producto_session->bigidproductoActual!=null && $precio_producto_session->bigidproductoActual!=0)
				{
					$this->id_productoFK_Idproducto=$precio_producto_session->bigidproductoActual;
					$precio_producto_session->bigidproductoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->precio_productoLogic->getsFK_Idproducto($finalQueryPaginacion,$this->pagination,$this->id_productoFK_Idproducto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//precio_productoLogicAdditional::getDetalleIndiceFK_Idproducto($this->id_productoFK_Idproducto);


					if($this->precio_productoLogic->getprecio_productos()==null || count($this->precio_productoLogic->getprecio_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$precio_productos=$this->precio_productoLogic->getprecio_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->precio_productoLogic->getsFK_Idproducto('',$this->pagination,$this->id_productoFK_Idproducto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->precio_productosReporte=$this->precio_productoLogic->getprecio_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteprecio_productos("FK_Idproducto",$this->precio_productoLogic->getprecio_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->precio_productoLogic->setprecio_productos($precio_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_precio')
			{

				if($precio_producto_session->bigidtipo_precioActual!=null && $precio_producto_session->bigidtipo_precioActual!=0)
				{
					$this->id_tipo_precioFK_Idtipo_precio=$precio_producto_session->bigidtipo_precioActual;
					$precio_producto_session->bigidtipo_precioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->precio_productoLogic->getsFK_Idtipo_precio($finalQueryPaginacion,$this->pagination,$this->id_tipo_precioFK_Idtipo_precio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//precio_productoLogicAdditional::getDetalleIndiceFK_Idtipo_precio($this->id_tipo_precioFK_Idtipo_precio);


					if($this->precio_productoLogic->getprecio_productos()==null || count($this->precio_productoLogic->getprecio_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$precio_productos=$this->precio_productoLogic->getprecio_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->precio_productoLogic->getsFK_Idtipo_precio('',$this->pagination,$this->id_tipo_precioFK_Idtipo_precio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->precio_productosReporte=$this->precio_productoLogic->getprecio_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteprecio_productos("FK_Idtipo_precio",$this->precio_productoLogic->getprecio_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->precio_productoLogic->setprecio_productos($precio_productos);
					}
				//}

			} 
		
		$precio_producto_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$precio_producto_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->precio_productoLogic->loadForeignsKeysDescription();*/
		
		$this->precio_productos=$this->precio_productoLogic->getprecio_productos();
		
		if($this->precio_productosEliminados==null) {
			$this->precio_productosEliminados=array();
		}
		
		$this->Session->write(precio_producto_util::$STR_SESSION_NAME.'Lista',serialize($this->precio_productos));
		$this->Session->write(precio_producto_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->precio_productosEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(precio_producto_util::$STR_SESSION_NAME,serialize($precio_producto_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idprecio_producto=$idGeneral;
			
			$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
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
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
			}

			if(count($this->precio_productos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
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
				$this->precio_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_bodegaFK_Idbodega=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idbodega','cmbid_bodega');

			$this->strAccionBusqueda='FK_Idbodega';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
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
				$this->precio_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
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
				$this->precio_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_productoFK_Idproducto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproducto','cmbid_producto');

			$this->strAccionBusqueda='FK_Idproducto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_precioParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_precioFK_Idtipo_precio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_precio','cmbid_tipo_precio');

			$this->strAccionBusqueda='FK_Idtipo_precio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idbodega($strFinalQuery,$id_bodega)
	{
		try
		{

			$this->precio_productoLogic->getsFK_Idbodega($strFinalQuery,new Pagination(),$id_bodega);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idempresa($strFinalQuery,$id_empresa)
	{
		try
		{

			$this->precio_productoLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
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

			$this->precio_productoLogic->getsFK_Idproducto($strFinalQuery,new Pagination(),$id_producto);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_precio($strFinalQuery,$id_tipo_precio)
	{
		try
		{

			$this->precio_productoLogic->getsFK_Idtipo_precio($strFinalQuery,new Pagination(),$id_tipo_precio);
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
			
			
			$precio_productoForeignKey=new precio_producto_param_return(); //precio_productoForeignKey();
			
			$precio_producto_session=unserialize($this->Session->read(precio_producto_util::$STR_SESSION_NAME));
						
			if($precio_producto_session==null) {
				$precio_producto_session=new precio_producto_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$precio_productoForeignKey=$this->precio_productoLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$precio_producto_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$precio_productoForeignKey->empresasFK;
				$this->idempresaDefaultFK=$precio_productoForeignKey->idempresaDefaultFK;
			}

			if($precio_producto_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$this->strRecargarFkTipos,',')) {
				$this->bodegasFK=$precio_productoForeignKey->bodegasFK;
				$this->idbodegaDefaultFK=$precio_productoForeignKey->idbodegaDefaultFK;
			}

			if($precio_producto_session->bitBusquedaDesdeFKSesionbodega) {
				$this->setVisibleBusquedasParabodega(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$this->strRecargarFkTipos,',')) {
				$this->productosFK=$precio_productoForeignKey->productosFK;
				$this->idproductoDefaultFK=$precio_productoForeignKey->idproductoDefaultFK;
			}

			if($precio_producto_session->bitBusquedaDesdeFKSesionproducto) {
				$this->setVisibleBusquedasParaproducto(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_precio',$this->strRecargarFkTipos,',')) {
				$this->tipo_preciosFK=$precio_productoForeignKey->tipo_preciosFK;
				$this->idtipo_precioDefaultFK=$precio_productoForeignKey->idtipo_precioDefaultFK;
			}

			if($precio_producto_session->bitBusquedaDesdeFKSesiontipo_precio) {
				$this->setVisibleBusquedasParatipo_precio(true);
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
	
	function cargarCombosFKFromReturnGeneral($precio_productoReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$precio_productoReturnGeneral->strRecargarFkTipos;
			
			


			if($precio_productoReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$precio_productoReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$precio_productoReturnGeneral->idempresaDefaultFK;
			}


			if($precio_productoReturnGeneral->con_bodegasFK==true) {
				$this->bodegasFK=$precio_productoReturnGeneral->bodegasFK;
				$this->idbodegaDefaultFK=$precio_productoReturnGeneral->idbodegaDefaultFK;
			}


			if($precio_productoReturnGeneral->con_productosFK==true) {
				$this->productosFK=$precio_productoReturnGeneral->productosFK;
				$this->idproductoDefaultFK=$precio_productoReturnGeneral->idproductoDefaultFK;
			}


			if($precio_productoReturnGeneral->con_tipo_preciosFK==true) {
				$this->tipo_preciosFK=$precio_productoReturnGeneral->tipo_preciosFK;
				$this->idtipo_precioDefaultFK=$precio_productoReturnGeneral->idtipo_precioDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(precio_producto_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$precio_producto_session=unserialize($this->Session->read(precio_producto_util::$STR_SESSION_NAME));
		
		if($precio_producto_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($precio_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($precio_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==bodega_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='bodega';
			}
			else if($precio_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==producto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='producto';
			}
			else if($precio_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_precio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_precio';
			}
			
			$precio_producto_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
			}						
			
			$this->precio_productosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->precio_productosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->precio_productosAuxiliar=array();
			}
			
			if(count($this->precio_productosAuxiliar) > 0) {
				
				foreach ($this->precio_productosAuxiliar as $precio_productoSeleccionado) {
					$this->eliminarTablaBase($precio_productoSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
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


	public function gettipo_preciosFKListSelectItem() 
	{
		$tipo_preciosList=array();

		$item=null;

		foreach($this->tipo_preciosFK as $tipo_precio)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_precio->getnombre());
			$item->setValue($tipo_precio->getId());
			$tipo_preciosList[]=$item;
		}

		return $tipo_preciosList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;
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
				$this->precio_productoLogic->commitNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->rollbackNewConnexionToDeep();
				$this->precio_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$precio_productosNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->precio_productos as $precio_productoLocal) {
				if($precio_productoLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->precio_producto=new precio_producto();
				
				$this->precio_producto->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->precio_productos[]=$this->precio_producto;*/
				
				$precio_productosNuevos[]=$this->precio_producto;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('bodega');$classes[]=$class;
				$class=new Classe('producto');$classes[]=$class;
				$class=new Classe('tipo_precio');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->precio_productoLogic->setprecio_productos($precio_productosNuevos);
					
				$this->precio_productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($precio_productosNuevos as $precio_productoNuevo) {
					$this->precio_productos[]=$precio_productoNuevo;
				}
				
				/*$this->precio_productos[]=$precio_productosNuevos;*/
				
				$this->precio_productoLogic->setprecio_productos($this->precio_productos);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($precio_productosNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$precio_producto_session=unserialize($this->Session->read(precio_producto_util::$STR_SESSION_NAME));

		if($precio_producto_session==null) {
			$precio_producto_session=new precio_producto_session();
		}
		
		if($precio_producto_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($precio_producto_session->bigidempresaActual!=null && $precio_producto_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($precio_producto_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=precio_producto_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
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

		$precio_producto_session=unserialize($this->Session->read(precio_producto_util::$STR_SESSION_NAME));

		if($precio_producto_session==null) {
			$precio_producto_session=new precio_producto_session();
		}
		
		if($precio_producto_session->bitBusquedaDesdeFKSesionbodega!=true) {
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


			if($precio_producto_session->bigidbodegaActual!=null && $precio_producto_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($precio_producto_session->bigidbodegaActual);//WithConnection

				$this->bodegasFK[$bodegaLogic->getbodega()->getId()]=precio_producto_util::getbodegaDescripcion($bodegaLogic->getbodega());
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

		$precio_producto_session=unserialize($this->Session->read(precio_producto_util::$STR_SESSION_NAME));

		if($precio_producto_session==null) {
			$precio_producto_session=new precio_producto_session();
		}
		
		if($precio_producto_session->bitBusquedaDesdeFKSesionproducto!=true) {
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


			if($precio_producto_session->bigidproductoActual!=null && $precio_producto_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($precio_producto_session->bigidproductoActual);//WithConnection

				$this->productosFK[$productoLogic->getproducto()->getId()]=precio_producto_util::getproductoDescripcion($productoLogic->getproducto());
				$this->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	public function cargarCombostipo_preciosFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_precioLogic= new tipo_precio_logic();
		$pagination= new Pagination();
		$this->tipo_preciosFK=array();

		$tipo_precioLogic->setConnexion($connexion);
		$tipo_precioLogic->gettipo_precioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$precio_producto_session=unserialize($this->Session->read(precio_producto_util::$STR_SESSION_NAME));

		if($precio_producto_session==null) {
			$precio_producto_session=new precio_producto_session();
		}
		
		if($precio_producto_session->bitBusquedaDesdeFKSesiontipo_precio!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_precio_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_precio=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_precio=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_precio, '');
				$finalQueryGlobaltipo_precio.=tipo_precio_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_precio.$strRecargarFkQuery;		

				$tipo_precioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_preciosFK($tipo_precioLogic->gettipo_precios());

		} else {
			$this->setVisibleBusquedasParatipo_precio(true);


			if($precio_producto_session->bigidtipo_precioActual!=null && $precio_producto_session->bigidtipo_precioActual > 0) {
				$tipo_precioLogic->getEntity($precio_producto_session->bigidtipo_precioActual);//WithConnection

				$this->tipo_preciosFK[$tipo_precioLogic->gettipo_precio()->getId()]=precio_producto_util::gettipo_precioDescripcion($tipo_precioLogic->gettipo_precio());
				$this->idtipo_precioDefaultFK=$tipo_precioLogic->gettipo_precio()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=precio_producto_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombosbodegasFK($bodegas){

		foreach ($bodegas as $bodegaLocal ) {
			if($this->idbodegaDefaultFK==0) {
				$this->idbodegaDefaultFK=$bodegaLocal->getId();
			}

			$this->bodegasFK[$bodegaLocal->getId()]=precio_producto_util::getbodegaDescripcion($bodegaLocal);
		}
	}

	public function prepararCombosproductosFK($productos){

		foreach ($productos as $productoLocal ) {
			if($this->idproductoDefaultFK==0) {
				$this->idproductoDefaultFK=$productoLocal->getId();
			}

			$this->productosFK[$productoLocal->getId()]=precio_producto_util::getproductoDescripcion($productoLocal);
		}
	}

	public function prepararCombostipo_preciosFK($tipo_precios){

		foreach ($tipo_precios as $tipo_precioLocal ) {
			if($this->idtipo_precioDefaultFK==0) {
				$this->idtipo_precioDefaultFK=$tipo_precioLocal->getId();
			}

			$this->tipo_preciosFK[$tipo_precioLocal->getId()]=precio_producto_util::gettipo_precioDescripcion($tipo_precioLocal);
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

			$strDescripcionempresa=precio_producto_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
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

			$strDescripcionbodega=precio_producto_util::getbodegaDescripcion($bodegaLogic->getbodega());

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

			$strDescripcionproducto=precio_producto_util::getproductoDescripcion($productoLogic->getproducto());

		} else {
			$strDescripcionproducto='null';
		}

		return $strDescripcionproducto;
	}

	public function cargarDescripciontipo_precioFK($idtipo_precio,$connexion=null){
		$tipo_precioLogic= new tipo_precio_logic();
		$tipo_precioLogic->setConnexion($connexion);
		$tipo_precioLogic->gettipo_precioDataAccess()->isForFKData=true;
		$strDescripciontipo_precio='';

		if($idtipo_precio!=null && $idtipo_precio!='' && $idtipo_precio!='null') {
			if($connexion!=null) {
				$tipo_precioLogic->getEntity($idtipo_precio);//WithConnection
			} else {
				$tipo_precioLogic->getEntityWithConnection($idtipo_precio);//
			}

			$strDescripciontipo_precio=precio_producto_util::gettipo_precioDescripcion($tipo_precioLogic->gettipo_precio());

		} else {
			$strDescripciontipo_precio='null';
		}

		return $strDescripciontipo_precio;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(precio_producto $precio_productoClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$precio_productoClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
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

		$this->strVisibleFK_Idbodega=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegacionempresa;
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
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionbodega;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegacionbodega;
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
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionproducto;
		$this->strVisibleFK_Idproducto=$strParaVisibleproducto;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibleNegacionproducto;
	}

	public function setVisibleBusquedasParatipo_precio($isParatipo_precio){
		$strParaVisibletipo_precio='display:table-row';
		$strParaVisibleNegaciontipo_precio='display:none';

		if($isParatipo_precio) {
			$strParaVisibletipo_precio='display:table-row';
			$strParaVisibleNegaciontipo_precio='display:none';
		} else {
			$strParaVisibletipo_precio='display:none';
			$strParaVisibleNegaciontipo_precio='display:table-row';
		}


		$strParaVisibleNegaciontipo_precio=trim($strParaVisibleNegaciontipo_precio);

		$this->strVisibleFK_Idbodega=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idproducto=$strParaVisibleNegaciontipo_precio;
		$this->strVisibleFK_Idtipo_precio=$strParaVisibletipo_precio;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idprecio_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idprecio_productoActual=$idprecio_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.precio_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.precio_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarprecio_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParabodega() {//$idprecio_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idprecio_productoActual=$idprecio_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.bodega_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.precio_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',bodega_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.precio_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(bodega_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarprecio_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaproducto() {//$idprecio_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idprecio_productoActual=$idprecio_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.producto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.precio_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.precio_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarprecio_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_precio() {//$idprecio_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idprecio_productoActual=$idprecio_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_precio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.precio_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_precio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_precio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.precio_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_precio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_precio_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarprecio_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(precio_producto_util::$STR_SESSION_NAME,precio_producto_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$precio_producto_session=$this->Session->read(precio_producto_util::$STR_SESSION_NAME);
				
		if($precio_producto_session==null) {
			$precio_producto_session=new precio_producto_session();		
			//$this->Session->write('precio_producto_session',$precio_producto_session);							
		}
		*/
		
		$precio_producto_session=new precio_producto_session();
    	$precio_producto_session->strPathNavegacionActual=precio_producto_util::$STR_CLASS_WEB_TITULO;
    	$precio_producto_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(precio_producto_util::$STR_SESSION_NAME,serialize($precio_producto_session));		
	}	
	
	public function getSetBusquedasSesionConfig(precio_producto_session $precio_producto_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($precio_producto_session->bitBusquedaDesdeFKSesionFK!=null && $precio_producto_session->bitBusquedaDesdeFKSesionFK==true) {
			if($precio_producto_session->bigIdActualFK!=null && $precio_producto_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$precio_producto_session->bigIdActualFKParaPosibleAtras=$precio_producto_session->bigIdActualFK;*/
			}
				
			$precio_producto_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$precio_producto_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(precio_producto_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($precio_producto_session->bitBusquedaDesdeFKSesionempresa!=null && $precio_producto_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($precio_producto_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(precio_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(precio_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(precio_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($precio_producto_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($precio_producto_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=precio_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$precio_producto_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$precio_producto_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;

				if($precio_producto_session->intNumeroPaginacion==precio_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$precio_producto_session->intNumeroPaginacion;
				}
			}
			else if($precio_producto_session->bitBusquedaDesdeFKSesionbodega!=null && $precio_producto_session->bitBusquedaDesdeFKSesionbodega==true)
			{
				if($precio_producto_session->bigidbodegaActual!=0) {
					$this->strAccionBusqueda='FK_Idbodega';

					$existe_history=HistoryWeb::ExisteElemento(precio_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(precio_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(precio_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($precio_producto_session->bigidbodegaActualDescripcion);
						$historyWeb->setIdActual($precio_producto_session->bigidbodegaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=precio_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$precio_producto_session->bigidbodegaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$precio_producto_session->bitBusquedaDesdeFKSesionbodega=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;

				if($precio_producto_session->intNumeroPaginacion==precio_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$precio_producto_session->intNumeroPaginacion;
				}
			}
			else if($precio_producto_session->bitBusquedaDesdeFKSesionproducto!=null && $precio_producto_session->bitBusquedaDesdeFKSesionproducto==true)
			{
				if($precio_producto_session->bigidproductoActual!=0) {
					$this->strAccionBusqueda='FK_Idproducto';

					$existe_history=HistoryWeb::ExisteElemento(precio_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(precio_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(precio_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($precio_producto_session->bigidproductoActualDescripcion);
						$historyWeb->setIdActual($precio_producto_session->bigidproductoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=precio_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$precio_producto_session->bigidproductoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$precio_producto_session->bitBusquedaDesdeFKSesionproducto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;

				if($precio_producto_session->intNumeroPaginacion==precio_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$precio_producto_session->intNumeroPaginacion;
				}
			}
			else if($precio_producto_session->bitBusquedaDesdeFKSesiontipo_precio!=null && $precio_producto_session->bitBusquedaDesdeFKSesiontipo_precio==true)
			{
				if($precio_producto_session->bigidtipo_precioActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_precio';

					$existe_history=HistoryWeb::ExisteElemento(precio_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(precio_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(precio_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($precio_producto_session->bigidtipo_precioActualDescripcion);
						$historyWeb->setIdActual($precio_producto_session->bigidtipo_precioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=precio_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$precio_producto_session->bigidtipo_precioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$precio_producto_session->bitBusquedaDesdeFKSesiontipo_precio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;

				if($precio_producto_session->intNumeroPaginacion==precio_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=precio_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$precio_producto_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$precio_producto_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$precio_producto_session=unserialize($this->Session->read(precio_producto_util::$STR_SESSION_NAME));
		
		if($precio_producto_session==null) {
			$precio_producto_session=new precio_producto_session();
		}
		
		$precio_producto_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$precio_producto_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$precio_producto_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idbodega') {
			$precio_producto_session->id_bodega=$this->id_bodegaFK_Idbodega;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$precio_producto_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idproducto') {
			$precio_producto_session->id_producto=$this->id_productoFK_Idproducto;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_precio') {
			$precio_producto_session->id_tipo_precio=$this->id_tipo_precioFK_Idtipo_precio;	

		}
		
		$this->Session->write(precio_producto_util::$STR_SESSION_NAME,serialize($precio_producto_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(precio_producto_session $precio_producto_session) {
		
		if($precio_producto_session==null) {
			$precio_producto_session=unserialize($this->Session->read(precio_producto_util::$STR_SESSION_NAME));
		}
		
		if($precio_producto_session==null) {
		   $precio_producto_session=new precio_producto_session();
		}
		
		if($precio_producto_session->strUltimaBusqueda!=null && $precio_producto_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$precio_producto_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$precio_producto_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$precio_producto_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idbodega') {
				$this->id_bodegaFK_Idbodega=$precio_producto_session->id_bodega;
				$precio_producto_session->id_bodega=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$precio_producto_session->id_empresa;
				$precio_producto_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idproducto') {
				$this->id_productoFK_Idproducto=$precio_producto_session->id_producto;
				$precio_producto_session->id_producto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_precio') {
				$this->id_tipo_precioFK_Idtipo_precio=$precio_producto_session->id_tipo_precio;
				$precio_producto_session->id_tipo_precio=-1;

			}
		}
		
		$precio_producto_session->strUltimaBusqueda='';
		//$precio_producto_session->intNumeroPaginacion=10;
		$precio_producto_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(precio_producto_util::$STR_SESSION_NAME,serialize($precio_producto_session));		
	}
	
	public function precio_productosControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idbodegaDefaultFK = 0;
		$this->idproductoDefaultFK = 0;
		$this->idtipo_precioDefaultFK = 0;
	}
	
	public function setprecio_productoFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_bodega',$this->idbodegaDefaultFK);
		$this->setExistDataCampoForm('form','id_producto',$this->idproductoDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_precio',$this->idtipo_precioDefaultFK);
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

		bodega::$class;
		bodega_carga::$CONTROLLER;

		producto::$class;
		producto_carga::$CONTROLLER;

		tipo_precio::$class;
		tipo_precio_carga::$CONTROLLER;
		
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
		interface precio_producto_controlI {	
		
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
		
		public function onLoad(precio_producto_session $precio_producto_session=null);	
		function index(?string $strTypeOnLoadprecio_producto='',?string $strTipoPaginaAuxiliarprecio_producto='',?string $strTipoUsuarioAuxiliarprecio_producto='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadprecio_producto='',string $strTipoPaginaAuxiliarprecio_producto='',string $strTipoUsuarioAuxiliarprecio_producto='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($precio_productoReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(precio_producto $precio_productoClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(precio_producto_session $precio_producto_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(precio_producto_session $precio_producto_session);	
		public function precio_productosControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setprecio_productoFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
