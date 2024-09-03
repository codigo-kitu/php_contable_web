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

namespace com\bydan\contabilidad\inventario\producto_bodega\presentation\control;

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

use com\bydan\contabilidad\inventario\producto_bodega\business\entity\producto_bodega;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/producto_bodega/util/producto_bodega_carga.php');
use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_carga;

use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_util;
use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_param_return;
use com\bydan\contabilidad\inventario\producto_bodega\business\logic\producto_bodega_logic;
use com\bydan\contabilidad\inventario\producto_bodega\presentation\session\producto_bodega_session;


//FK


use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
producto_bodega_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
producto_bodega_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
producto_bodega_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
producto_bodega_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*producto_bodega_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/inventario/producto_bodega/presentation/control/producto_bodega_init_control.php');
use com\bydan\contabilidad\inventario\producto_bodega\presentation\control\producto_bodega_init_control;

include_once('com/bydan/contabilidad/inventario/producto_bodega/presentation/control/producto_bodega_base_control.php');
use com\bydan\contabilidad\inventario\producto_bodega\presentation\control\producto_bodega_base_control;

class producto_bodega_control extends producto_bodega_base_control {	
	
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
			else if($action=="FK_Idproducto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdproductoParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParabodega') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproducto_bodegaActual=$this->getDataId();
				$this->abrirBusquedaParabodega();//$idproducto_bodegaActual
			}
			else if($action=='abrirBusquedaParaproducto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idproducto_bodegaActual=$this->getDataId();
				$this->abrirBusquedaParaproducto();//$idproducto_bodegaActual
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
					
					$producto_bodegaController = new producto_bodega_control();
					
					$producto_bodegaController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($producto_bodegaController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$producto_bodegaController = new producto_bodega_control();
						$producto_bodegaController = $this;
						
						$jsonResponse = json_encode($producto_bodegaController->producto_bodegas);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->producto_bodegaReturnGeneral==null) {
					$this->producto_bodegaReturnGeneral=new producto_bodega_param_return();
				}
				
				echo($this->producto_bodegaReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$producto_bodegaController=new producto_bodega_control();
		
		$producto_bodegaController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$producto_bodegaController->usuarioActual=new usuario();
		
		$producto_bodegaController->usuarioActual->setId($this->usuarioActual->getId());
		$producto_bodegaController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$producto_bodegaController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$producto_bodegaController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$producto_bodegaController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$producto_bodegaController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$producto_bodegaController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$producto_bodegaController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $producto_bodegaController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadproducto_bodega= $this->getDataGeneralString('strTypeOnLoadproducto_bodega');
		$strTipoPaginaAuxiliarproducto_bodega= $this->getDataGeneralString('strTipoPaginaAuxiliarproducto_bodega');
		$strTipoUsuarioAuxiliarproducto_bodega= $this->getDataGeneralString('strTipoUsuarioAuxiliarproducto_bodega');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadproducto_bodega,$strTipoPaginaAuxiliarproducto_bodega,$strTipoUsuarioAuxiliarproducto_bodega,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadproducto_bodega!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('producto_bodega','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_bodega_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarproducto_bodega,$this->strTipoUsuarioAuxiliarproducto_bodega,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_bodega_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarproducto_bodega,$this->strTipoUsuarioAuxiliarproducto_bodega,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->producto_bodegaReturnGeneral=new producto_bodega_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->producto_bodegaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->producto_bodegaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->producto_bodegaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->producto_bodegaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->producto_bodegaReturnGeneral);
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
		$this->producto_bodegaReturnGeneral=new producto_bodega_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->producto_bodegaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->producto_bodegaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->producto_bodegaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->producto_bodegaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->producto_bodegaReturnGeneral);
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
		$this->producto_bodegaReturnGeneral=new producto_bodega_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->producto_bodegaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->producto_bodegaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->producto_bodegaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->producto_bodegaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->producto_bodegaReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->getNewConnexionToDeep();
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
			
			
			$this->producto_bodegaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->producto_bodegaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->producto_bodegaReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->producto_bodegaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->producto_bodegaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->producto_bodegaReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->producto_bodegaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->producto_bodegaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->producto_bodegaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->producto_bodegaReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->producto_bodegaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->producto_bodegaReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->producto_bodegaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->producto_bodegaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->producto_bodegaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->producto_bodegaReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->producto_bodegaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->producto_bodegaReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
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
		
		$this->producto_bodegaLogic=new producto_bodega_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->producto_bodega=new producto_bodega();
		
		$this->strTypeOnLoadproducto_bodega='onload';
		$this->strTipoPaginaAuxiliarproducto_bodega='none';
		$this->strTipoUsuarioAuxiliarproducto_bodega='none';	

		$this->intNumeroPaginacion=producto_bodega_util::$INT_NUMERO_PAGINACION;
		
		$this->producto_bodegaModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->producto_bodegaControllerAdditional=new producto_bodega_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(producto_bodega_session $producto_bodega_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($producto_bodega_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadproducto_bodega='',?string $strTipoPaginaAuxiliarproducto_bodega='',?string $strTipoUsuarioAuxiliarproducto_bodega='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadproducto_bodega=$strTypeOnLoadproducto_bodega;
			$this->strTipoPaginaAuxiliarproducto_bodega=$strTipoPaginaAuxiliarproducto_bodega;
			$this->strTipoUsuarioAuxiliarproducto_bodega=$strTipoUsuarioAuxiliarproducto_bodega;
	
			if($strTipoUsuarioAuxiliarproducto_bodega=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->producto_bodega=new producto_bodega();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Producto Bodegas';
			
			
			$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));
							
			if($producto_bodega_session==null) {
				$producto_bodega_session=new producto_bodega_session();
				
				/*$this->Session->write('producto_bodega_session',$producto_bodega_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($producto_bodega_session->strFuncionJsPadre!=null && $producto_bodega_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$producto_bodega_session->strFuncionJsPadre;
				
				$producto_bodega_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($producto_bodega_session);
			
			if($strTypeOnLoadproducto_bodega!=null && $strTypeOnLoadproducto_bodega=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$producto_bodega_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$producto_bodega_session->setPaginaPopupVariables(true);
				}
				
				if($producto_bodega_session->intNumeroPaginacion==producto_bodega_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_bodega_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_bodega_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,producto_bodega_util::$STR_SESSION_NAME,'inventario');																
			
			} else if($strTypeOnLoadproducto_bodega!=null && $strTypeOnLoadproducto_bodega=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$producto_bodega_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=producto_bodega_util::$INT_NUMERO_PAGINACION;*/
				
				if($producto_bodega_session->intNumeroPaginacion==producto_bodega_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_bodega_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_bodega_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarproducto_bodega!=null && $strTipoPaginaAuxiliarproducto_bodega=='none') {
				/*$producto_bodega_session->strStyleDivHeader='display:table-row';*/
				
				/*$producto_bodega_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarproducto_bodega!=null && $strTipoPaginaAuxiliarproducto_bodega=='iframe') {
					/*
					$producto_bodega_session->strStyleDivArbol='display:none';
					$producto_bodega_session->strStyleDivHeader='display:none';
					$producto_bodega_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$producto_bodega_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->producto_bodegaClase=new producto_bodega();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=producto_bodega_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(producto_bodega_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->producto_bodegaLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->producto_bodegaLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->producto_bodegaLogic=new producto_bodega_logic();*/
			
			
			$this->producto_bodegasModel=null;
			/*new ListDataModel();*/
			
			/*$this->producto_bodegasModel.setWrappedData(producto_bodegaLogic->getproducto_bodegas());*/
						
			$this->producto_bodegas= array();
			$this->producto_bodegasEliminados=array();
			$this->producto_bodegasSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= producto_bodega_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->producto_bodega= new producto_bodega();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idbodega='display:table-row';
			$this->strVisibleFK_Idproducto='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarproducto_bodega!=null && $strTipoUsuarioAuxiliarproducto_bodega!='none' && $strTipoUsuarioAuxiliarproducto_bodega!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarproducto_bodega);
																
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
				if($strTipoUsuarioAuxiliarproducto_bodega!=null && $strTipoUsuarioAuxiliarproducto_bodega!='none' && $strTipoUsuarioAuxiliarproducto_bodega!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarproducto_bodega);
																
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
				if($strTipoUsuarioAuxiliarproducto_bodega==null || $strTipoUsuarioAuxiliarproducto_bodega=='none' || $strTipoUsuarioAuxiliarproducto_bodega=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarproducto_bodega,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, producto_bodega_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, producto_bodega_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina producto_bodega');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($producto_bodega_session);
			
			$this->getSetBusquedasSesionConfig($producto_bodega_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteproducto_bodegas($this->strAccionBusqueda,$this->producto_bodegaLogic->getproducto_bodegas());*/
				} else if($this->strGenerarReporte=='Html')	{
					$producto_bodega_session->strServletGenerarHtmlReporte='producto_bodegaServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(producto_bodega_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(producto_bodega_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($producto_bodega_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarproducto_bodega!=null && $strTipoUsuarioAuxiliarproducto_bodega=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($producto_bodega_session);
			}
								
			$this->set(producto_bodega_util::$STR_SESSION_NAME, $producto_bodega_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($producto_bodega_session);
			
			/*
			$this->producto_bodega->recursive = 0;
			
			$this->producto_bodegas=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('producto_bodegas', $this->producto_bodegas);
			
			$this->set(producto_bodega_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->producto_bodegaActual =$this->producto_bodegaClase;
			
			/*$this->producto_bodegaActual =$this->migrarModelproducto_bodega($this->producto_bodegaClase);*/
			
			$this->returnHtml(false);
			
			$this->set(producto_bodega_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=producto_bodega_util::$STR_NOMBRE_OPCION;
				
			if(producto_bodega_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=producto_bodega_util::$STR_MODULO_OPCION.producto_bodega_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(producto_bodega_util::$STR_SESSION_NAME,serialize($producto_bodega_session));
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
			/*$producto_bodegaClase= (producto_bodega) producto_bodegasModel.getRowData();*/
			
			$this->producto_bodegaClase->setId($this->producto_bodega->getId());	
			$this->producto_bodegaClase->setVersionRow($this->producto_bodega->getVersionRow());	
			$this->producto_bodegaClase->setVersionRow($this->producto_bodega->getVersionRow());	
			$this->producto_bodegaClase->setid_bodega($this->producto_bodega->getid_bodega());	
			$this->producto_bodegaClase->setid_producto($this->producto_bodega->getid_producto());	
			$this->producto_bodegaClase->setcantidad($this->producto_bodega->getcantidad());	
			$this->producto_bodegaClase->setcosto($this->producto_bodega->getcosto());	
			$this->producto_bodegaClase->setubicacion($this->producto_bodega->getubicacion());	
		
			/*$this->Session->write('producto_bodegaVersionRowActual', producto_bodega.getVersionRow());*/
			
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
			
			$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));
						
			if($producto_bodega_session==null) {
				$producto_bodega_session=new producto_bodega_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('producto_bodega', $this->producto_bodega->read(null, $id));
	
			
			$this->producto_bodega->recursive = 0;
			
			$this->producto_bodegas=$this->paginate();
			
			$this->set('producto_bodegas', $this->producto_bodegas);
	
			if (empty($this->data)) {
				$this->data = $this->producto_bodega->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->producto_bodegaLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->producto_bodegaClase);
			
			$this->producto_bodegaActual=$this->producto_bodegaClase;
			
			/*$this->producto_bodegaActual =$this->migrarModelproducto_bodega($this->producto_bodegaClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->producto_bodegaLogic->getproducto_bodegas(),$this->producto_bodegaActual);
			
			$this->actualizarControllerConReturnGeneral($this->producto_bodegaReturnGeneral);
			
			//$this->producto_bodegaReturnGeneral=$this->producto_bodegaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->producto_bodegaLogic->getproducto_bodegas(),$this->producto_bodegaActual,$this->producto_bodegaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));
						
			if($producto_bodega_session==null) {
				$producto_bodega_session=new producto_bodega_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoproducto_bodega', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->producto_bodegaClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->producto_bodegaClase);
			
			$this->producto_bodegaActual =$this->producto_bodegaClase;
			
			/*$this->producto_bodegaActual =$this->migrarModelproducto_bodega($this->producto_bodegaClase);*/
			
			$this->setproducto_bodegaFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->producto_bodegaLogic->getproducto_bodegas(),$this->producto_bodega);
			
			$this->actualizarControllerConReturnGeneral($this->producto_bodegaReturnGeneral);
			
			//this->producto_bodegaReturnGeneral=$this->producto_bodegaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->producto_bodegaLogic->getproducto_bodegas(),$this->producto_bodega,$this->producto_bodegaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idbodegaDefaultFK!=null && $this->idbodegaDefaultFK > -1) {
				$this->producto_bodegaReturnGeneral->getproducto_bodega()->setid_bodega($this->idbodegaDefaultFK);
			}

			if($this->idproductoDefaultFK!=null && $this->idproductoDefaultFK > -1) {
				$this->producto_bodegaReturnGeneral->getproducto_bodega()->setid_producto($this->idproductoDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->producto_bodegaReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->producto_bodegaReturnGeneral->getproducto_bodega(),$this->producto_bodegaActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyproducto_bodega($this->producto_bodegaReturnGeneral->getproducto_bodega());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioproducto_bodega($this->producto_bodegaReturnGeneral->getproducto_bodega());*/
			}
			
			if($this->producto_bodegaReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->producto_bodegaReturnGeneral->getproducto_bodega(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualproducto_bodega($this->producto_bodega,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->producto_bodegasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->producto_bodegasAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->producto_bodegasAuxiliar=array();
			}
			
			if(count($this->producto_bodegasAuxiliar)==2) {
				$producto_bodegaOrigen=$this->producto_bodegasAuxiliar[0];
				$producto_bodegaDestino=$this->producto_bodegasAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($producto_bodegaOrigen,$producto_bodegaDestino,true,false,false);
				
				$this->actualizarLista($producto_bodegaDestino,$this->producto_bodegas);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->producto_bodegasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->producto_bodegasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->producto_bodegasAuxiliar=array();
			}
			
			if(count($this->producto_bodegasAuxiliar) > 0) {
				foreach ($this->producto_bodegasAuxiliar as $producto_bodegaSeleccionado) {
					$this->producto_bodega=new producto_bodega();
					
					$this->setCopiarVariablesObjetos($producto_bodegaSeleccionado,$this->producto_bodega,true,true,false);
						
					$this->producto_bodegas[]=$this->producto_bodega;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->producto_bodegasEliminados as $producto_bodegaEliminado) {
				$this->producto_bodegaLogic->producto_bodegas[]=$producto_bodegaEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->producto_bodega=new producto_bodega();
							
				$this->producto_bodegas[]=$this->producto_bodega;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
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
		
		$producto_bodegaActual=new producto_bodega();
		
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
				
				$producto_bodegaActual=$this->producto_bodegas[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $producto_bodegaActual->setid_bodega((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $producto_bodegaActual->setid_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $producto_bodegaActual->setcantidad((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $producto_bodegaActual->setcosto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $producto_bodegaActual->setubicacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
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
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=producto_bodega_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadproducto_bodega='',string $strTipoPaginaAuxiliarproducto_bodega='',string $strTipoUsuarioAuxiliarproducto_bodega='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadproducto_bodega,$strTipoPaginaAuxiliarproducto_bodega,$strTipoUsuarioAuxiliarproducto_bodega,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->producto_bodegas) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=producto_bodega_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=producto_bodega_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=producto_bodega_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));
						
			if($producto_bodega_session==null) {
				$producto_bodega_session=new producto_bodega_session();
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
					/*$this->intNumeroPaginacion=producto_bodega_util::$INT_NUMERO_PAGINACION;*/
					
					if($producto_bodega_session->intNumeroPaginacion==producto_bodega_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=producto_bodega_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$producto_bodega_session->intNumeroPaginacion;
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
			
			$this->producto_bodegasEliminados=array();
			
			/*$this->producto_bodegaLogic->setConnexion($connexion);*/
			
			$this->producto_bodegaLogic->setIsConDeep(true);
			
			$this->producto_bodegaLogic->getproducto_bodegaDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('bodega');$classes[]=$class;
			$class=new Classe('producto');$classes[]=$class;
			
			$this->producto_bodegaLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->producto_bodegaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->producto_bodegaLogic->getproducto_bodegas()==null|| count($this->producto_bodegaLogic->getproducto_bodegas())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->producto_bodegas=$this->producto_bodegaLogic->getproducto_bodegas();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->producto_bodegaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->producto_bodegasReporte=$this->producto_bodegaLogic->getproducto_bodegas();
									
						/*$this->generarReportes('Todos',$this->producto_bodegaLogic->getproducto_bodegas());*/
					
						$this->producto_bodegaLogic->setproducto_bodegas($this->producto_bodegas);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->producto_bodegaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->producto_bodegaLogic->getproducto_bodegas()==null|| count($this->producto_bodegaLogic->getproducto_bodegas())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->producto_bodegas=$this->producto_bodegaLogic->getproducto_bodegas();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->producto_bodegaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->producto_bodegasReporte=$this->producto_bodegaLogic->getproducto_bodegas();
									
						/*$this->generarReportes('Todos',$this->producto_bodegaLogic->getproducto_bodegas());*/
					
						$this->producto_bodegaLogic->setproducto_bodegas($this->producto_bodegas);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idproducto_bodega=0;*/
				
				if($producto_bodega_session->bitBusquedaDesdeFKSesionFK!=null && $producto_bodega_session->bitBusquedaDesdeFKSesionFK==true) {
					if($producto_bodega_session->bigIdActualFK!=null && $producto_bodega_session->bigIdActualFK!=0)	{
						$this->idproducto_bodega=$producto_bodega_session->bigIdActualFK;	
					}
					
					$producto_bodega_session->bitBusquedaDesdeFKSesionFK=false;
					
					$producto_bodega_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idproducto_bodega=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idproducto_bodega=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->producto_bodegaLogic->getEntity($this->idproducto_bodega);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*producto_bodegaLogicAdditional::getDetalleIndicePorId($idproducto_bodega);*/

				
				if($this->producto_bodegaLogic->getproducto_bodega()!=null) {
					$this->producto_bodegaLogic->setproducto_bodegas(array());
					$this->producto_bodegaLogic->producto_bodegas[]=$this->producto_bodegaLogic->getproducto_bodega();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idbodega')
			{

				if($producto_bodega_session->bigidbodegaActual!=null && $producto_bodega_session->bigidbodegaActual!=0)
				{
					$this->id_bodegaFK_Idbodega=$producto_bodega_session->bigidbodegaActual;
					$producto_bodega_session->bigidbodegaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->producto_bodegaLogic->getsFK_Idbodega($finalQueryPaginacion,$this->pagination,$this->id_bodegaFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//producto_bodegaLogicAdditional::getDetalleIndiceFK_Idbodega($this->id_bodegaFK_Idbodega);


					if($this->producto_bodegaLogic->getproducto_bodegas()==null || count($this->producto_bodegaLogic->getproducto_bodegas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$producto_bodegas=$this->producto_bodegaLogic->getproducto_bodegas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->producto_bodegaLogic->getsFK_Idbodega('',$this->pagination,$this->id_bodegaFK_Idbodega);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->producto_bodegasReporte=$this->producto_bodegaLogic->getproducto_bodegas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproducto_bodegas("FK_Idbodega",$this->producto_bodegaLogic->getproducto_bodegas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->producto_bodegaLogic->setproducto_bodegas($producto_bodegas);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idproducto')
			{

				if($producto_bodega_session->bigidproductoActual!=null && $producto_bodega_session->bigidproductoActual!=0)
				{
					$this->id_productoFK_Idproducto=$producto_bodega_session->bigidproductoActual;
					$producto_bodega_session->bigidproductoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->producto_bodegaLogic->getsFK_Idproducto($finalQueryPaginacion,$this->pagination,$this->id_productoFK_Idproducto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//producto_bodegaLogicAdditional::getDetalleIndiceFK_Idproducto($this->id_productoFK_Idproducto);


					if($this->producto_bodegaLogic->getproducto_bodegas()==null || count($this->producto_bodegaLogic->getproducto_bodegas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$producto_bodegas=$this->producto_bodegaLogic->getproducto_bodegas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->producto_bodegaLogic->getsFK_Idproducto('',$this->pagination,$this->id_productoFK_Idproducto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->producto_bodegasReporte=$this->producto_bodegaLogic->getproducto_bodegas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteproducto_bodegas("FK_Idproducto",$this->producto_bodegaLogic->getproducto_bodegas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->producto_bodegaLogic->setproducto_bodegas($producto_bodegas);
					}
				//}

			} 
		
		$producto_bodega_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$producto_bodega_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->producto_bodegaLogic->loadForeignsKeysDescription();*/
		
		$this->producto_bodegas=$this->producto_bodegaLogic->getproducto_bodegas();
		
		if($this->producto_bodegasEliminados==null) {
			$this->producto_bodegasEliminados=array();
		}
		
		$this->Session->write(producto_bodega_util::$STR_SESSION_NAME.'Lista',serialize($this->producto_bodegas));
		$this->Session->write(producto_bodega_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->producto_bodegasEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(producto_bodega_util::$STR_SESSION_NAME,serialize($producto_bodega_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idproducto_bodega=$idGeneral;
			
			$this->intNumeroPaginacion=producto_bodega_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->getNewConnexionToDeep();
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
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}

			if(count($this->producto_bodegas) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
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
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_bodega_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_bodegaFK_Idbodega=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idbodega','cmbid_bodega');

			$this->strAccionBusqueda='FK_Idbodega';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
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
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=producto_bodega_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_productoFK_Idproducto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproducto','cmbid_producto');

			$this->strAccionBusqueda='FK_Idproducto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idbodega($strFinalQuery,$id_bodega)
	{
		try
		{

			$this->producto_bodegaLogic->getsFK_Idbodega($strFinalQuery,new Pagination(),$id_bodega);
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

			$this->producto_bodegaLogic->getsFK_Idproducto($strFinalQuery,new Pagination(),$id_producto);
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
			
			
			$producto_bodegaForeignKey=new producto_bodega_param_return(); //producto_bodegaForeignKey();
			
			$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));
						
			if($producto_bodega_session==null) {
				$producto_bodega_session=new producto_bodega_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$producto_bodegaForeignKey=$this->producto_bodegaLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$producto_bodega_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_bodega',$this->strRecargarFkTipos,',')) {
				$this->bodegasFK=$producto_bodegaForeignKey->bodegasFK;
				$this->idbodegaDefaultFK=$producto_bodegaForeignKey->idbodegaDefaultFK;
			}

			if($producto_bodega_session->bitBusquedaDesdeFKSesionbodega) {
				$this->setVisibleBusquedasParabodega(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_producto',$this->strRecargarFkTipos,',')) {
				$this->productosFK=$producto_bodegaForeignKey->productosFK;
				$this->idproductoDefaultFK=$producto_bodegaForeignKey->idproductoDefaultFK;
			}

			if($producto_bodega_session->bitBusquedaDesdeFKSesionproducto) {
				$this->setVisibleBusquedasParaproducto(true);
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
	
	function cargarCombosFKFromReturnGeneral($producto_bodegaReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$producto_bodegaReturnGeneral->strRecargarFkTipos;
			
			


			if($producto_bodegaReturnGeneral->con_bodegasFK==true) {
				$this->bodegasFK=$producto_bodegaReturnGeneral->bodegasFK;
				$this->idbodegaDefaultFK=$producto_bodegaReturnGeneral->idbodegaDefaultFK;
			}


			if($producto_bodegaReturnGeneral->con_productosFK==true) {
				$this->productosFK=$producto_bodegaReturnGeneral->productosFK;
				$this->idproductoDefaultFK=$producto_bodegaReturnGeneral->idproductoDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(producto_bodega_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));
		
		if($producto_bodega_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($producto_bodega_session->getstrNombrePaginaNavegacionHaciaFKDesde()==bodega_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='bodega';
			}
			else if($producto_bodega_session->getstrNombrePaginaNavegacionHaciaFKDesde()==producto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='producto';
			}
			
			$producto_bodega_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}						
			
			$this->producto_bodegasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->producto_bodegasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->producto_bodegasAuxiliar=array();
			}
			
			if(count($this->producto_bodegasAuxiliar) > 0) {
				
				foreach ($this->producto_bodegasAuxiliar as $producto_bodegaSeleccionado) {
					$this->eliminarTablaBase($producto_bodegaSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
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


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=producto_bodega_util::$INT_NUMERO_PAGINACION;
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
				$this->producto_bodegaLogic->commitNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->rollbackNewConnexionToDeep();
				$this->producto_bodegaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$producto_bodegasNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->producto_bodegas as $producto_bodegaLocal) {
				if($producto_bodegaLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->producto_bodega=new producto_bodega();
				
				$this->producto_bodega->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->producto_bodegas[]=$this->producto_bodega;*/
				
				$producto_bodegasNuevos[]=$this->producto_bodega;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('bodega');$classes[]=$class;
				$class=new Classe('producto');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->producto_bodegaLogic->setproducto_bodegas($producto_bodegasNuevos);
					
				$this->producto_bodegaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($producto_bodegasNuevos as $producto_bodegaNuevo) {
					$this->producto_bodegas[]=$producto_bodegaNuevo;
				}
				
				/*$this->producto_bodegas[]=$producto_bodegasNuevos;*/
				
				$this->producto_bodegaLogic->setproducto_bodegas($this->producto_bodegas);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($producto_bodegasNuevos!=null);
	}
					
	
	public function cargarCombosbodegasFK($connexion=null,$strRecargarFkQuery=''){
		$bodegaLogic= new bodega_logic();
		$pagination= new Pagination();
		$this->bodegasFK=array();

		$bodegaLogic->setConnexion($connexion);
		$bodegaLogic->getbodegaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));

		if($producto_bodega_session==null) {
			$producto_bodega_session=new producto_bodega_session();
		}
		
		if($producto_bodega_session->bitBusquedaDesdeFKSesionbodega!=true) {
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


			if($producto_bodega_session->bigidbodegaActual!=null && $producto_bodega_session->bigidbodegaActual > 0) {
				$bodegaLogic->getEntity($producto_bodega_session->bigidbodegaActual);//WithConnection

				$this->bodegasFK[$bodegaLogic->getbodega()->getId()]=producto_bodega_util::getbodegaDescripcion($bodegaLogic->getbodega());
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

		$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));

		if($producto_bodega_session==null) {
			$producto_bodega_session=new producto_bodega_session();
		}
		
		if($producto_bodega_session->bitBusquedaDesdeFKSesionproducto!=true) {
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


			if($producto_bodega_session->bigidproductoActual!=null && $producto_bodega_session->bigidproductoActual > 0) {
				$productoLogic->getEntity($producto_bodega_session->bigidproductoActual);//WithConnection

				$this->productosFK[$productoLogic->getproducto()->getId()]=producto_bodega_util::getproductoDescripcion($productoLogic->getproducto());
				$this->idproductoDefaultFK=$productoLogic->getproducto()->getId();
			}
		}
	}

	
	
	public function prepararCombosbodegasFK($bodegas){

		foreach ($bodegas as $bodegaLocal ) {
			if($this->idbodegaDefaultFK==0) {
				$this->idbodegaDefaultFK=$bodegaLocal->getId();
			}

			$this->bodegasFK[$bodegaLocal->getId()]=producto_bodega_util::getbodegaDescripcion($bodegaLocal);
		}
	}

	public function prepararCombosproductosFK($productos){

		foreach ($productos as $productoLocal ) {
			if($this->idproductoDefaultFK==0) {
				$this->idproductoDefaultFK=$productoLocal->getId();
			}

			$this->productosFK[$productoLocal->getId()]=producto_bodega_util::getproductoDescripcion($productoLocal);
		}
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

			$strDescripcionbodega=producto_bodega_util::getbodegaDescripcion($bodegaLogic->getbodega());

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

			$strDescripcionproducto=producto_bodega_util::getproductoDescripcion($productoLogic->getproducto());

		} else {
			$strDescripcionproducto='null';
		}

		return $strDescripcionproducto;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(producto_bodega $producto_bodegaClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
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
		$this->strVisibleFK_Idproducto=$strParaVisibleNegacionbodega;
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
		$this->strVisibleFK_Idproducto=$strParaVisibleproducto;
	}
	
	

	public function abrirBusquedaParabodega() {//$idproducto_bodegaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproducto_bodegaActual=$idproducto_bodegaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.bodega_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.producto_bodegaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',bodega_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.producto_bodegaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_bodega(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(bodega_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto_bodega,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaproducto() {//$idproducto_bodegaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idproducto_bodegaActual=$idproducto_bodegaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.producto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.producto_bodegaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.producto_bodegaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_producto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarproducto_bodega,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(producto_bodega_util::$STR_SESSION_NAME,producto_bodega_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$producto_bodega_session=$this->Session->read(producto_bodega_util::$STR_SESSION_NAME);
				
		if($producto_bodega_session==null) {
			$producto_bodega_session=new producto_bodega_session();		
			//$this->Session->write('producto_bodega_session',$producto_bodega_session);							
		}
		*/
		
		$producto_bodega_session=new producto_bodega_session();
    	$producto_bodega_session->strPathNavegacionActual=producto_bodega_util::$STR_CLASS_WEB_TITULO;
    	$producto_bodega_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(producto_bodega_util::$STR_SESSION_NAME,serialize($producto_bodega_session));		
	}	
	
	public function getSetBusquedasSesionConfig(producto_bodega_session $producto_bodega_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($producto_bodega_session->bitBusquedaDesdeFKSesionFK!=null && $producto_bodega_session->bitBusquedaDesdeFKSesionFK==true) {
			if($producto_bodega_session->bigIdActualFK!=null && $producto_bodega_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$producto_bodega_session->bigIdActualFKParaPosibleAtras=$producto_bodega_session->bigIdActualFK;*/
			}
				
			$producto_bodega_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$producto_bodega_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(producto_bodega_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($producto_bodega_session->bitBusquedaDesdeFKSesionbodega!=null && $producto_bodega_session->bitBusquedaDesdeFKSesionbodega==true)
			{
				if($producto_bodega_session->bigidbodegaActual!=0) {
					$this->strAccionBusqueda='FK_Idbodega';

					$existe_history=HistoryWeb::ExisteElemento(producto_bodega_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_bodega_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_bodega_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_bodega_session->bigidbodegaActualDescripcion);
						$historyWeb->setIdActual($producto_bodega_session->bigidbodegaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_bodega_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_bodega_session->bigidbodegaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_bodega_session->bitBusquedaDesdeFKSesionbodega=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_bodega_util::$INT_NUMERO_PAGINACION;

				if($producto_bodega_session->intNumeroPaginacion==producto_bodega_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_bodega_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_bodega_session->intNumeroPaginacion;
				}
			}
			else if($producto_bodega_session->bitBusquedaDesdeFKSesionproducto!=null && $producto_bodega_session->bitBusquedaDesdeFKSesionproducto==true)
			{
				if($producto_bodega_session->bigidproductoActual!=0) {
					$this->strAccionBusqueda='FK_Idproducto';

					$existe_history=HistoryWeb::ExisteElemento(producto_bodega_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(producto_bodega_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(producto_bodega_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($producto_bodega_session->bigidproductoActualDescripcion);
						$historyWeb->setIdActual($producto_bodega_session->bigidproductoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=producto_bodega_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$producto_bodega_session->bigidproductoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$producto_bodega_session->bitBusquedaDesdeFKSesionproducto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=producto_bodega_util::$INT_NUMERO_PAGINACION;

				if($producto_bodega_session->intNumeroPaginacion==producto_bodega_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=producto_bodega_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$producto_bodega_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$producto_bodega_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));
		
		if($producto_bodega_session==null) {
			$producto_bodega_session=new producto_bodega_session();
		}
		
		$producto_bodega_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$producto_bodega_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$producto_bodega_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idbodega') {
			$producto_bodega_session->id_bodega=$this->id_bodegaFK_Idbodega;	

		}
		else if($this->strAccionBusqueda=='FK_Idproducto') {
			$producto_bodega_session->id_producto=$this->id_productoFK_Idproducto;	

		}
		
		$this->Session->write(producto_bodega_util::$STR_SESSION_NAME,serialize($producto_bodega_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(producto_bodega_session $producto_bodega_session) {
		
		if($producto_bodega_session==null) {
			$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));
		}
		
		if($producto_bodega_session==null) {
		   $producto_bodega_session=new producto_bodega_session();
		}
		
		if($producto_bodega_session->strUltimaBusqueda!=null && $producto_bodega_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$producto_bodega_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$producto_bodega_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$producto_bodega_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idbodega') {
				$this->id_bodegaFK_Idbodega=$producto_bodega_session->id_bodega;
				$producto_bodega_session->id_bodega=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idproducto') {
				$this->id_productoFK_Idproducto=$producto_bodega_session->id_producto;
				$producto_bodega_session->id_producto=-1;

			}
		}
		
		$producto_bodega_session->strUltimaBusqueda='';
		//$producto_bodega_session->intNumeroPaginacion=10;
		$producto_bodega_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(producto_bodega_util::$STR_SESSION_NAME,serialize($producto_bodega_session));		
	}
	
	public function producto_bodegasControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idbodegaDefaultFK = 0;
		$this->idproductoDefaultFK = 0;
	}
	
	public function setproducto_bodegaFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_bodega',$this->idbodegaDefaultFK);
		$this->setExistDataCampoForm('form','id_producto',$this->idproductoDefaultFK);
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

		producto::$class;
		producto_carga::$CONTROLLER;
		
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
		interface producto_bodega_controlI {	
		
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
		
		public function onLoad(producto_bodega_session $producto_bodega_session=null);	
		function index(?string $strTypeOnLoadproducto_bodega='',?string $strTipoPaginaAuxiliarproducto_bodega='',?string $strTipoUsuarioAuxiliarproducto_bodega='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadproducto_bodega='',string $strTipoPaginaAuxiliarproducto_bodega='',string $strTipoUsuarioAuxiliarproducto_bodega='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($producto_bodegaReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(producto_bodega $producto_bodegaClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(producto_bodega_session $producto_bodega_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(producto_bodega_session $producto_bodega_session);	
		public function producto_bodegasControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setproducto_bodegaFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
