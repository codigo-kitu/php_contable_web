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

namespace com\bydan\contabilidad\inventario\sub_categoria_producto\presentation\control;

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

use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/sub_categoria_producto/util/sub_categoria_producto_carga.php');
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_carga;

use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_util;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_param_return;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\logic\sub_categoria_producto_logic;
use com\bydan\contabilidad\inventario\sub_categoria_producto\presentation\session\sub_categoria_producto_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;
use com\bydan\contabilidad\inventario\categoria_producto\business\logic\categoria_producto_logic;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_carga;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_util;

//REL


use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\producto\presentation\session\producto_session;

use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;
use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;


/*CARGA ARCHIVOS FRAMEWORK*/
sub_categoria_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
sub_categoria_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
sub_categoria_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
sub_categoria_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*sub_categoria_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/inventario/sub_categoria_producto/presentation/control/sub_categoria_producto_init_control.php');
use com\bydan\contabilidad\inventario\sub_categoria_producto\presentation\control\sub_categoria_producto_init_control;

include_once('com/bydan/contabilidad/inventario/sub_categoria_producto/presentation/control/sub_categoria_producto_base_control.php');
use com\bydan\contabilidad\inventario\sub_categoria_producto\presentation\control\sub_categoria_producto_base_control;

class sub_categoria_producto_control extends sub_categoria_producto_base_control {	
	
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
					
					
				if($this->data['predeterminado']==null) {$this->data['predeterminado']=false;} else {if($this->data['predeterminado']=='on') {$this->data['predeterminado']=true;}}
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
			else if($action=='registrarSesionParaproductos' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idsub_categoria_productoActual=$this->getDataId();
				$this->registrarSesionParaproductos($idsub_categoria_productoActual);
			}
			else if($action=='registrarSesionParalista_productoes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idsub_categoria_productoActual=$this->getDataId();
				$this->registrarSesionParalista_productoes($idsub_categoria_productoActual);
			} 
			
			
			else if($action=="FK_Idcategoria_producto"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcategoria_productoParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idsub_categoria_productoActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idsub_categoria_productoActual
			}
			else if($action=='abrirBusquedaParacategoria_producto') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idsub_categoria_productoActual=$this->getDataId();
				$this->abrirBusquedaParacategoria_producto();//$idsub_categoria_productoActual
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
					
					$sub_categoria_productoController = new sub_categoria_producto_control();
					
					$sub_categoria_productoController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($sub_categoria_productoController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$sub_categoria_productoController = new sub_categoria_producto_control();
						$sub_categoria_productoController = $this;
						
						$jsonResponse = json_encode($sub_categoria_productoController->sub_categoria_productos);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->sub_categoria_productoReturnGeneral==null) {
					$this->sub_categoria_productoReturnGeneral=new sub_categoria_producto_param_return();
				}
				
				echo($this->sub_categoria_productoReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$sub_categoria_productoController=new sub_categoria_producto_control();
		
		$sub_categoria_productoController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$sub_categoria_productoController->usuarioActual=new usuario();
		
		$sub_categoria_productoController->usuarioActual->setId($this->usuarioActual->getId());
		$sub_categoria_productoController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$sub_categoria_productoController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$sub_categoria_productoController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$sub_categoria_productoController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$sub_categoria_productoController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$sub_categoria_productoController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$sub_categoria_productoController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $sub_categoria_productoController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadsub_categoria_producto= $this->getDataGeneralString('strTypeOnLoadsub_categoria_producto');
		$strTipoPaginaAuxiliarsub_categoria_producto= $this->getDataGeneralString('strTipoPaginaAuxiliarsub_categoria_producto');
		$strTipoUsuarioAuxiliarsub_categoria_producto= $this->getDataGeneralString('strTipoUsuarioAuxiliarsub_categoria_producto');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadsub_categoria_producto,$strTipoPaginaAuxiliarsub_categoria_producto,$strTipoUsuarioAuxiliarsub_categoria_producto,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadsub_categoria_producto!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('sub_categoria_producto','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sub_categoria_producto_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarsub_categoria_producto,$this->strTipoUsuarioAuxiliarsub_categoria_producto,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sub_categoria_producto_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarsub_categoria_producto,$this->strTipoUsuarioAuxiliarsub_categoria_producto,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->sub_categoria_productoReturnGeneral=new sub_categoria_producto_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->sub_categoria_productoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->sub_categoria_productoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->sub_categoria_productoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->sub_categoria_productoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->sub_categoria_productoReturnGeneral);
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
		$this->sub_categoria_productoReturnGeneral=new sub_categoria_producto_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->sub_categoria_productoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->sub_categoria_productoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->sub_categoria_productoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->sub_categoria_productoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->sub_categoria_productoReturnGeneral);
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
		$this->sub_categoria_productoReturnGeneral=new sub_categoria_producto_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->sub_categoria_productoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->sub_categoria_productoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->sub_categoria_productoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->sub_categoria_productoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->sub_categoria_productoReturnGeneral);
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
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
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
			
			
			$this->sub_categoria_productoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->sub_categoria_productoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->sub_categoria_productoReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->sub_categoria_productoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->sub_categoria_productoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->sub_categoria_productoReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->sub_categoria_productoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->sub_categoria_productoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->sub_categoria_productoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->sub_categoria_productoReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->sub_categoria_productoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->sub_categoria_productoReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->sub_categoria_productoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->sub_categoria_productoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->sub_categoria_productoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->sub_categoria_productoReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->sub_categoria_productoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->sub_categoria_productoReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
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
		
		$this->sub_categoria_productoLogic=new sub_categoria_producto_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->sub_categoria_producto=new sub_categoria_producto();
		
		$this->strTypeOnLoadsub_categoria_producto='onload';
		$this->strTipoPaginaAuxiliarsub_categoria_producto='none';
		$this->strTipoUsuarioAuxiliarsub_categoria_producto='none';	

		$this->intNumeroPaginacion=sub_categoria_producto_util::$INT_NUMERO_PAGINACION;
		
		$this->sub_categoria_productoModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->sub_categoria_productoControllerAdditional=new sub_categoria_producto_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(sub_categoria_producto_session $sub_categoria_producto_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($sub_categoria_producto_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadsub_categoria_producto='',?string $strTipoPaginaAuxiliarsub_categoria_producto='',?string $strTipoUsuarioAuxiliarsub_categoria_producto='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadsub_categoria_producto=$strTypeOnLoadsub_categoria_producto;
			$this->strTipoPaginaAuxiliarsub_categoria_producto=$strTipoPaginaAuxiliarsub_categoria_producto;
			$this->strTipoUsuarioAuxiliarsub_categoria_producto=$strTipoUsuarioAuxiliarsub_categoria_producto;
	
			if($strTipoUsuarioAuxiliarsub_categoria_producto=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->sub_categoria_producto=new sub_categoria_producto();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Sub Categoria Productos';
			
			
			$sub_categoria_producto_session=unserialize($this->Session->read(sub_categoria_producto_util::$STR_SESSION_NAME));
							
			if($sub_categoria_producto_session==null) {
				$sub_categoria_producto_session=new sub_categoria_producto_session();
				
				/*$this->Session->write('sub_categoria_producto_session',$sub_categoria_producto_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($sub_categoria_producto_session->strFuncionJsPadre!=null && $sub_categoria_producto_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$sub_categoria_producto_session->strFuncionJsPadre;
				
				$sub_categoria_producto_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($sub_categoria_producto_session);
			
			if($strTypeOnLoadsub_categoria_producto!=null && $strTypeOnLoadsub_categoria_producto=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$sub_categoria_producto_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$sub_categoria_producto_session->setPaginaPopupVariables(true);
				}
				
				if($sub_categoria_producto_session->intNumeroPaginacion==sub_categoria_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=sub_categoria_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$sub_categoria_producto_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,sub_categoria_producto_util::$STR_SESSION_NAME,'inventario');																
			
			} else if($strTypeOnLoadsub_categoria_producto!=null && $strTypeOnLoadsub_categoria_producto=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$sub_categoria_producto_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=sub_categoria_producto_util::$INT_NUMERO_PAGINACION;*/
				
				if($sub_categoria_producto_session->intNumeroPaginacion==sub_categoria_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=sub_categoria_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$sub_categoria_producto_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarsub_categoria_producto!=null && $strTipoPaginaAuxiliarsub_categoria_producto=='none') {
				/*$sub_categoria_producto_session->strStyleDivHeader='display:table-row';*/
				
				/*$sub_categoria_producto_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarsub_categoria_producto!=null && $strTipoPaginaAuxiliarsub_categoria_producto=='iframe') {
					/*
					$sub_categoria_producto_session->strStyleDivArbol='display:none';
					$sub_categoria_producto_session->strStyleDivHeader='display:none';
					$sub_categoria_producto_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$sub_categoria_producto_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->sub_categoria_productoClase=new sub_categoria_producto();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=sub_categoria_producto_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(sub_categoria_producto_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->sub_categoria_productoLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->sub_categoria_productoLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$productoLogic=new producto_logic();
			//$listaproductoLogic=new lista_producto_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->sub_categoria_productoLogic=new sub_categoria_producto_logic();*/
			
			
			$this->sub_categoria_productosModel=null;
			/*new ListDataModel();*/
			
			/*$this->sub_categoria_productosModel.setWrappedData(sub_categoria_productoLogic->getsub_categoria_productos());*/
						
			$this->sub_categoria_productos= array();
			$this->sub_categoria_productosEliminados=array();
			$this->sub_categoria_productosSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= sub_categoria_producto_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= sub_categoria_producto_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->sub_categoria_producto= new sub_categoria_producto();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcategoria_producto='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarsub_categoria_producto!=null && $strTipoUsuarioAuxiliarsub_categoria_producto!='none' && $strTipoUsuarioAuxiliarsub_categoria_producto!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarsub_categoria_producto);
																
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
				if($strTipoUsuarioAuxiliarsub_categoria_producto!=null && $strTipoUsuarioAuxiliarsub_categoria_producto!='none' && $strTipoUsuarioAuxiliarsub_categoria_producto!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarsub_categoria_producto);
																
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
				if($strTipoUsuarioAuxiliarsub_categoria_producto==null || $strTipoUsuarioAuxiliarsub_categoria_producto=='none' || $strTipoUsuarioAuxiliarsub_categoria_producto=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarsub_categoria_producto,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, sub_categoria_producto_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, sub_categoria_producto_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina sub_categoria_producto');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($sub_categoria_producto_session);
			
			$this->getSetBusquedasSesionConfig($sub_categoria_producto_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportesub_categoria_productos($this->strAccionBusqueda,$this->sub_categoria_productoLogic->getsub_categoria_productos());*/
				} else if($this->strGenerarReporte=='Html')	{
					$sub_categoria_producto_session->strServletGenerarHtmlReporte='sub_categoria_productoServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(sub_categoria_producto_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(sub_categoria_producto_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($sub_categoria_producto_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$sub_categoria_producto_session=unserialize($this->Session->read(sub_categoria_producto_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarsub_categoria_producto!=null && $strTipoUsuarioAuxiliarsub_categoria_producto=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($sub_categoria_producto_session);
			}
								
			$this->set(sub_categoria_producto_util::$STR_SESSION_NAME, $sub_categoria_producto_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($sub_categoria_producto_session);
			
			/*
			$this->sub_categoria_producto->recursive = 0;
			
			$this->sub_categoria_productos=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('sub_categoria_productos', $this->sub_categoria_productos);
			
			$this->set(sub_categoria_producto_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->sub_categoria_productoActual =$this->sub_categoria_productoClase;
			
			/*$this->sub_categoria_productoActual =$this->migrarModelsub_categoria_producto($this->sub_categoria_productoClase);*/
			
			$this->returnHtml(false);
			
			$this->set(sub_categoria_producto_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=sub_categoria_producto_util::$STR_NOMBRE_OPCION;
				
			if(sub_categoria_producto_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=sub_categoria_producto_util::$STR_MODULO_OPCION.sub_categoria_producto_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(sub_categoria_producto_util::$STR_SESSION_NAME,serialize($sub_categoria_producto_session));
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
			/*$sub_categoria_productoClase= (sub_categoria_producto) sub_categoria_productosModel.getRowData();*/
			
			$this->sub_categoria_productoClase->setId($this->sub_categoria_producto->getId());	
			$this->sub_categoria_productoClase->setVersionRow($this->sub_categoria_producto->getVersionRow());	
			$this->sub_categoria_productoClase->setVersionRow($this->sub_categoria_producto->getVersionRow());	
			$this->sub_categoria_productoClase->setid_empresa($this->sub_categoria_producto->getid_empresa());	
			$this->sub_categoria_productoClase->setid_categoria_producto($this->sub_categoria_producto->getid_categoria_producto());	
			$this->sub_categoria_productoClase->setcodigo($this->sub_categoria_producto->getcodigo());	
			$this->sub_categoria_productoClase->setnombre($this->sub_categoria_producto->getnombre());	
			$this->sub_categoria_productoClase->setpredeterminado($this->sub_categoria_producto->getpredeterminado());	
			$this->sub_categoria_productoClase->setimagen($this->sub_categoria_producto->getimagen());	
			$this->sub_categoria_productoClase->setnumero_productos($this->sub_categoria_producto->getnumero_productos());	
		
			/*$this->Session->write('sub_categoria_productoVersionRowActual', sub_categoria_producto.getVersionRow());*/
			
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
			
			$sub_categoria_producto_session=unserialize($this->Session->read(sub_categoria_producto_util::$STR_SESSION_NAME));
						
			if($sub_categoria_producto_session==null) {
				$sub_categoria_producto_session=new sub_categoria_producto_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('sub_categoria_producto', $this->sub_categoria_producto->read(null, $id));
	
			
			$this->sub_categoria_producto->recursive = 0;
			
			$this->sub_categoria_productos=$this->paginate();
			
			$this->set('sub_categoria_productos', $this->sub_categoria_productos);
	
			if (empty($this->data)) {
				$this->data = $this->sub_categoria_producto->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->sub_categoria_productoLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->sub_categoria_productoClase);
			
			$this->sub_categoria_productoActual=$this->sub_categoria_productoClase;
			
			/*$this->sub_categoria_productoActual =$this->migrarModelsub_categoria_producto($this->sub_categoria_productoClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->sub_categoria_productoLogic->getsub_categoria_productos(),$this->sub_categoria_productoActual);
			
			$this->actualizarControllerConReturnGeneral($this->sub_categoria_productoReturnGeneral);
			
			//$this->sub_categoria_productoReturnGeneral=$this->sub_categoria_productoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->sub_categoria_productoLogic->getsub_categoria_productos(),$this->sub_categoria_productoActual,$this->sub_categoria_productoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$sub_categoria_producto_session=unserialize($this->Session->read(sub_categoria_producto_util::$STR_SESSION_NAME));
						
			if($sub_categoria_producto_session==null) {
				$sub_categoria_producto_session=new sub_categoria_producto_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevosub_categoria_producto', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->sub_categoria_productoClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->sub_categoria_productoClase);
			
			$this->sub_categoria_productoActual =$this->sub_categoria_productoClase;
			
			/*$this->sub_categoria_productoActual =$this->migrarModelsub_categoria_producto($this->sub_categoria_productoClase);*/
			
			$this->setsub_categoria_productoFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->sub_categoria_productoLogic->getsub_categoria_productos(),$this->sub_categoria_producto);
			
			$this->actualizarControllerConReturnGeneral($this->sub_categoria_productoReturnGeneral);
			
			//this->sub_categoria_productoReturnGeneral=$this->sub_categoria_productoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->sub_categoria_productoLogic->getsub_categoria_productos(),$this->sub_categoria_producto,$this->sub_categoria_productoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->sub_categoria_productoReturnGeneral->getsub_categoria_producto()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idcategoria_productoDefaultFK!=null && $this->idcategoria_productoDefaultFK > -1) {
				$this->sub_categoria_productoReturnGeneral->getsub_categoria_producto()->setid_categoria_producto($this->idcategoria_productoDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->sub_categoria_productoReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->sub_categoria_productoReturnGeneral->getsub_categoria_producto(),$this->sub_categoria_productoActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeysub_categoria_producto($this->sub_categoria_productoReturnGeneral->getsub_categoria_producto());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariosub_categoria_producto($this->sub_categoria_productoReturnGeneral->getsub_categoria_producto());*/
			}
			
			if($this->sub_categoria_productoReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->sub_categoria_productoReturnGeneral->getsub_categoria_producto(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualsub_categoria_producto($this->sub_categoria_producto,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->sub_categoria_productosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->sub_categoria_productosAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->sub_categoria_productosAuxiliar=array();
			}
			
			if(count($this->sub_categoria_productosAuxiliar)==2) {
				$sub_categoria_productoOrigen=$this->sub_categoria_productosAuxiliar[0];
				$sub_categoria_productoDestino=$this->sub_categoria_productosAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($sub_categoria_productoOrigen,$sub_categoria_productoDestino,true,false,false);
				
				$this->actualizarLista($sub_categoria_productoDestino,$this->sub_categoria_productos);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->sub_categoria_productosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->sub_categoria_productosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->sub_categoria_productosAuxiliar=array();
			}
			
			if(count($this->sub_categoria_productosAuxiliar) > 0) {
				foreach ($this->sub_categoria_productosAuxiliar as $sub_categoria_productoSeleccionado) {
					$this->sub_categoria_producto=new sub_categoria_producto();
					
					$this->setCopiarVariablesObjetos($sub_categoria_productoSeleccionado,$this->sub_categoria_producto,true,true,false);
						
					$this->sub_categoria_productos[]=$this->sub_categoria_producto;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->sub_categoria_productosEliminados as $sub_categoria_productoEliminado) {
				$this->sub_categoria_productoLogic->sub_categoria_productos[]=$sub_categoria_productoEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->sub_categoria_producto=new sub_categoria_producto();
							
				$this->sub_categoria_productos[]=$this->sub_categoria_producto;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
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
		
		$sub_categoria_productoActual=new sub_categoria_producto();
		
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
				
				$sub_categoria_productoActual=$this->sub_categoria_productos[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $sub_categoria_productoActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $sub_categoria_productoActual->setid_categoria_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $sub_categoria_productoActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $sub_categoria_productoActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $sub_categoria_productoActual->setpredeterminado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_7')));  } else { $sub_categoria_productoActual->setpredeterminado(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $sub_categoria_productoActual->setimagen($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $sub_categoria_productoActual->setnumero_productos((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->sub_categoria_productosAuxiliar=array();		 
		/*$this->sub_categoria_productosEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->sub_categoria_productosAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->sub_categoria_productosAuxiliar=array();
		}
			
		if(count($this->sub_categoria_productosAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->sub_categoria_productosAuxiliar as $sub_categoria_productoAuxLocal) {				
				
				foreach($this->sub_categoria_productos as $sub_categoria_productoLocal) {
					if($sub_categoria_productoLocal->getId()==$sub_categoria_productoAuxLocal->getId()) {
						$sub_categoria_productoLocal->setIsDeleted(true);
						
						/*$this->sub_categoria_productosEliminados[]=$sub_categoria_productoLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->sub_categoria_productoLogic->setsub_categoria_productos($this->sub_categoria_productos);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
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
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=sub_categoria_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadsub_categoria_producto='',string $strTipoPaginaAuxiliarsub_categoria_producto='',string $strTipoUsuarioAuxiliarsub_categoria_producto='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadsub_categoria_producto,$strTipoPaginaAuxiliarsub_categoria_producto,$strTipoUsuarioAuxiliarsub_categoria_producto,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->sub_categoria_productos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=sub_categoria_producto_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=sub_categoria_producto_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=sub_categoria_producto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$sub_categoria_producto_session=unserialize($this->Session->read(sub_categoria_producto_util::$STR_SESSION_NAME));
						
			if($sub_categoria_producto_session==null) {
				$sub_categoria_producto_session=new sub_categoria_producto_session();
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
					/*$this->intNumeroPaginacion=sub_categoria_producto_util::$INT_NUMERO_PAGINACION;*/
					
					if($sub_categoria_producto_session->intNumeroPaginacion==sub_categoria_producto_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=sub_categoria_producto_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$sub_categoria_producto_session->intNumeroPaginacion;
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
			
			$this->sub_categoria_productosEliminados=array();
			
			/*$this->sub_categoria_productoLogic->setConnexion($connexion);*/
			
			$this->sub_categoria_productoLogic->setIsConDeep(true);
			
			$this->sub_categoria_productoLogic->getsub_categoria_productoDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('categoria_producto');$classes[]=$class;
			
			$this->sub_categoria_productoLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->sub_categoria_productoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->sub_categoria_productoLogic->getsub_categoria_productos()==null|| count($this->sub_categoria_productoLogic->getsub_categoria_productos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->sub_categoria_productos=$this->sub_categoria_productoLogic->getsub_categoria_productos();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->sub_categoria_productoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->sub_categoria_productosReporte=$this->sub_categoria_productoLogic->getsub_categoria_productos();
									
						/*$this->generarReportes('Todos',$this->sub_categoria_productoLogic->getsub_categoria_productos());*/
					
						$this->sub_categoria_productoLogic->setsub_categoria_productos($this->sub_categoria_productos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->sub_categoria_productoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->sub_categoria_productoLogic->getsub_categoria_productos()==null|| count($this->sub_categoria_productoLogic->getsub_categoria_productos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->sub_categoria_productos=$this->sub_categoria_productoLogic->getsub_categoria_productos();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->sub_categoria_productoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->sub_categoria_productosReporte=$this->sub_categoria_productoLogic->getsub_categoria_productos();
									
						/*$this->generarReportes('Todos',$this->sub_categoria_productoLogic->getsub_categoria_productos());*/
					
						$this->sub_categoria_productoLogic->setsub_categoria_productos($this->sub_categoria_productos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idsub_categoria_producto=0;*/
				
				if($sub_categoria_producto_session->bitBusquedaDesdeFKSesionFK!=null && $sub_categoria_producto_session->bitBusquedaDesdeFKSesionFK==true) {
					if($sub_categoria_producto_session->bigIdActualFK!=null && $sub_categoria_producto_session->bigIdActualFK!=0)	{
						$this->idsub_categoria_producto=$sub_categoria_producto_session->bigIdActualFK;	
					}
					
					$sub_categoria_producto_session->bitBusquedaDesdeFKSesionFK=false;
					
					$sub_categoria_producto_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idsub_categoria_producto=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idsub_categoria_producto=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->sub_categoria_productoLogic->getEntity($this->idsub_categoria_producto);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*sub_categoria_productoLogicAdditional::getDetalleIndicePorId($idsub_categoria_producto);*/

				
				if($this->sub_categoria_productoLogic->getsub_categoria_producto()!=null) {
					$this->sub_categoria_productoLogic->setsub_categoria_productos(array());
					$this->sub_categoria_productoLogic->sub_categoria_productos[]=$this->sub_categoria_productoLogic->getsub_categoria_producto();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcategoria_producto')
			{

				if($sub_categoria_producto_session->bigidcategoria_productoActual!=null && $sub_categoria_producto_session->bigidcategoria_productoActual!=0)
				{
					$this->id_categoria_productoFK_Idcategoria_producto=$sub_categoria_producto_session->bigidcategoria_productoActual;
					$sub_categoria_producto_session->bigidcategoria_productoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->sub_categoria_productoLogic->getsFK_Idcategoria_producto($finalQueryPaginacion,$this->pagination,$this->id_categoria_productoFK_Idcategoria_producto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//sub_categoria_productoLogicAdditional::getDetalleIndiceFK_Idcategoria_producto($this->id_categoria_productoFK_Idcategoria_producto);


					if($this->sub_categoria_productoLogic->getsub_categoria_productos()==null || count($this->sub_categoria_productoLogic->getsub_categoria_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$sub_categoria_productos=$this->sub_categoria_productoLogic->getsub_categoria_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->sub_categoria_productoLogic->getsFK_Idcategoria_producto('',$this->pagination,$this->id_categoria_productoFK_Idcategoria_producto);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->sub_categoria_productosReporte=$this->sub_categoria_productoLogic->getsub_categoria_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportesub_categoria_productos("FK_Idcategoria_producto",$this->sub_categoria_productoLogic->getsub_categoria_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->sub_categoria_productoLogic->setsub_categoria_productos($sub_categoria_productos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($sub_categoria_producto_session->bigidempresaActual!=null && $sub_categoria_producto_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$sub_categoria_producto_session->bigidempresaActual;
					$sub_categoria_producto_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->sub_categoria_productoLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//sub_categoria_productoLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->sub_categoria_productoLogic->getsub_categoria_productos()==null || count($this->sub_categoria_productoLogic->getsub_categoria_productos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$sub_categoria_productos=$this->sub_categoria_productoLogic->getsub_categoria_productos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->sub_categoria_productoLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->sub_categoria_productosReporte=$this->sub_categoria_productoLogic->getsub_categoria_productos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportesub_categoria_productos("FK_Idempresa",$this->sub_categoria_productoLogic->getsub_categoria_productos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->sub_categoria_productoLogic->setsub_categoria_productos($sub_categoria_productos);
					}
				//}

			} 
		
		$sub_categoria_producto_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$sub_categoria_producto_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->sub_categoria_productoLogic->loadForeignsKeysDescription();*/
		
		$this->sub_categoria_productos=$this->sub_categoria_productoLogic->getsub_categoria_productos();
		
		if($this->sub_categoria_productosEliminados==null) {
			$this->sub_categoria_productosEliminados=array();
		}
		
		$this->Session->write(sub_categoria_producto_util::$STR_SESSION_NAME.'Lista',serialize($this->sub_categoria_productos));
		$this->Session->write(sub_categoria_producto_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->sub_categoria_productosEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(sub_categoria_producto_util::$STR_SESSION_NAME,serialize($sub_categoria_producto_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idsub_categoria_producto=$idGeneral;
			
			$this->intNumeroPaginacion=sub_categoria_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
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
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}

			if(count($this->sub_categoria_productos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Idcategoria_productoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=sub_categoria_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_categoria_productoFK_Idcategoria_producto=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcategoria_producto','cmbid_categoria_producto');

			$this->strAccionBusqueda='FK_Idcategoria_producto';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
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
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=sub_categoria_producto_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcategoria_producto($strFinalQuery,$id_categoria_producto)
	{
		try
		{

			$this->sub_categoria_productoLogic->getsFK_Idcategoria_producto($strFinalQuery,new Pagination(),$id_categoria_producto);
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

			$this->sub_categoria_productoLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
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
			
			
			$sub_categoria_productoForeignKey=new sub_categoria_producto_param_return(); //sub_categoria_productoForeignKey();
			
			$sub_categoria_producto_session=unserialize($this->Session->read(sub_categoria_producto_util::$STR_SESSION_NAME));
						
			if($sub_categoria_producto_session==null) {
				$sub_categoria_producto_session=new sub_categoria_producto_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$sub_categoria_productoForeignKey=$this->sub_categoria_productoLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$sub_categoria_producto_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$sub_categoria_productoForeignKey->empresasFK;
				$this->idempresaDefaultFK=$sub_categoria_productoForeignKey->idempresaDefaultFK;
			}

			if($sub_categoria_producto_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_categoria_producto',$this->strRecargarFkTipos,',')) {
				$this->categoria_productosFK=$sub_categoria_productoForeignKey->categoria_productosFK;
				$this->idcategoria_productoDefaultFK=$sub_categoria_productoForeignKey->idcategoria_productoDefaultFK;
			}

			if($sub_categoria_producto_session->bitBusquedaDesdeFKSesioncategoria_producto) {
				$this->setVisibleBusquedasParacategoria_producto(true);
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
	
	function cargarCombosFKFromReturnGeneral($sub_categoria_productoReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$sub_categoria_productoReturnGeneral->strRecargarFkTipos;
			
			


			if($sub_categoria_productoReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$sub_categoria_productoReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$sub_categoria_productoReturnGeneral->idempresaDefaultFK;
			}


			if($sub_categoria_productoReturnGeneral->con_categoria_productosFK==true) {
				$this->categoria_productosFK=$sub_categoria_productoReturnGeneral->categoria_productosFK;
				$this->idcategoria_productoDefaultFK=$sub_categoria_productoReturnGeneral->idcategoria_productoDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(sub_categoria_producto_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$sub_categoria_producto_session=unserialize($this->Session->read(sub_categoria_producto_util::$STR_SESSION_NAME));
		
		if($sub_categoria_producto_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($sub_categoria_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($sub_categoria_producto_session->getstrNombrePaginaNavegacionHaciaFKDesde()==categoria_producto_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='categoria_producto';
			}
			
			$sub_categoria_producto_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}						
			
			$this->sub_categoria_productosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->sub_categoria_productosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->sub_categoria_productosAuxiliar=array();
			}
			
			if(count($this->sub_categoria_productosAuxiliar) > 0) {
				
				foreach ($this->sub_categoria_productosAuxiliar as $sub_categoria_productoSeleccionado) {
					$this->eliminarTablaBase($sub_categoria_productoSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('lista_producto');
			$tipoRelacionReporte->setsDescripcion('Lista Productoses');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('producto');
			$tipoRelacionReporte->setsDescripcion('Productos');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=producto_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=lista_producto_util::$STR_NOMBRE_CLASE;
		
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


	public function getcategoria_productosFKListSelectItem() 
	{
		$categoria_productosList=array();

		$item=null;

		foreach($this->categoria_productosFK as $categoria_producto)
		{
			$item=new SelectItem();
			$item->setLabel($categoria_producto->getnombre());
			$item->setValue($categoria_producto->getId());
			$categoria_productosList[]=$item;
		}

		return $categoria_productosList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=sub_categoria_producto_util::$INT_NUMERO_PAGINACION;
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
				$this->sub_categoria_productoLogic->commitNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->rollbackNewConnexionToDeep();
				$this->sub_categoria_productoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$sub_categoria_productosNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->sub_categoria_productos as $sub_categoria_productoLocal) {
				if($sub_categoria_productoLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->sub_categoria_producto=new sub_categoria_producto();
				
				$this->sub_categoria_producto->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->sub_categoria_productos[]=$this->sub_categoria_producto;*/
				
				$sub_categoria_productosNuevos[]=$this->sub_categoria_producto;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('categoria_producto');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->sub_categoria_productoLogic->setsub_categoria_productos($sub_categoria_productosNuevos);
					
				$this->sub_categoria_productoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($sub_categoria_productosNuevos as $sub_categoria_productoNuevo) {
					$this->sub_categoria_productos[]=$sub_categoria_productoNuevo;
				}
				
				/*$this->sub_categoria_productos[]=$sub_categoria_productosNuevos;*/
				
				$this->sub_categoria_productoLogic->setsub_categoria_productos($this->sub_categoria_productos);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($sub_categoria_productosNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$sub_categoria_producto_session=unserialize($this->Session->read(sub_categoria_producto_util::$STR_SESSION_NAME));

		if($sub_categoria_producto_session==null) {
			$sub_categoria_producto_session=new sub_categoria_producto_session();
		}
		
		if($sub_categoria_producto_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($sub_categoria_producto_session->bigidempresaActual!=null && $sub_categoria_producto_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($sub_categoria_producto_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=sub_categoria_producto_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarComboscategoria_productosFK($connexion=null,$strRecargarFkQuery=''){
		$categoria_productoLogic= new categoria_producto_logic();
		$pagination= new Pagination();
		$this->categoria_productosFK=array();

		$categoria_productoLogic->setConnexion($connexion);
		$categoria_productoLogic->getcategoria_productoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$sub_categoria_producto_session=unserialize($this->Session->read(sub_categoria_producto_util::$STR_SESSION_NAME));

		if($sub_categoria_producto_session==null) {
			$sub_categoria_producto_session=new sub_categoria_producto_session();
		}
		
		if($sub_categoria_producto_session->bitBusquedaDesdeFKSesioncategoria_producto!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=categoria_producto_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcategoria_producto=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcategoria_producto=Funciones::GetFinalQueryAppend($finalQueryGlobalcategoria_producto, '');
				$finalQueryGlobalcategoria_producto.=categoria_producto_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcategoria_producto.$strRecargarFkQuery;		

				$categoria_productoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscategoria_productosFK($categoria_productoLogic->getcategoria_productos());

		} else {
			$this->setVisibleBusquedasParacategoria_producto(true);


			if($sub_categoria_producto_session->bigidcategoria_productoActual!=null && $sub_categoria_producto_session->bigidcategoria_productoActual > 0) {
				$categoria_productoLogic->getEntity($sub_categoria_producto_session->bigidcategoria_productoActual);//WithConnection

				$this->categoria_productosFK[$categoria_productoLogic->getcategoria_producto()->getId()]=sub_categoria_producto_util::getcategoria_productoDescripcion($categoria_productoLogic->getcategoria_producto());
				$this->idcategoria_productoDefaultFK=$categoria_productoLogic->getcategoria_producto()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=sub_categoria_producto_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararComboscategoria_productosFK($categoria_productos){

		foreach ($categoria_productos as $categoria_productoLocal ) {
			if($this->idcategoria_productoDefaultFK==0) {
				$this->idcategoria_productoDefaultFK=$categoria_productoLocal->getId();
			}

			$this->categoria_productosFK[$categoria_productoLocal->getId()]=sub_categoria_producto_util::getcategoria_productoDescripcion($categoria_productoLocal);
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

			$strDescripcionempresa=sub_categoria_producto_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripcioncategoria_productoFK($idcategoria_producto,$connexion=null){
		$categoria_productoLogic= new categoria_producto_logic();
		$categoria_productoLogic->setConnexion($connexion);
		$categoria_productoLogic->getcategoria_productoDataAccess()->isForFKData=true;
		$strDescripcioncategoria_producto='';

		if($idcategoria_producto!=null && $idcategoria_producto!='' && $idcategoria_producto!='null') {
			if($connexion!=null) {
				$categoria_productoLogic->getEntity($idcategoria_producto);//WithConnection
			} else {
				$categoria_productoLogic->getEntityWithConnection($idcategoria_producto);//
			}

			$strDescripcioncategoria_producto=sub_categoria_producto_util::getcategoria_productoDescripcion($categoria_productoLogic->getcategoria_producto());

		} else {
			$strDescripcioncategoria_producto='null';
		}

		return $strDescripcioncategoria_producto;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(sub_categoria_producto $sub_categoria_productoClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$sub_categoria_productoClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
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

		$this->strVisibleFK_Idcategoria_producto=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
	}

	public function setVisibleBusquedasParacategoria_producto($isParacategoria_producto){
		$strParaVisiblecategoria_producto='display:table-row';
		$strParaVisibleNegacioncategoria_producto='display:none';

		if($isParacategoria_producto) {
			$strParaVisiblecategoria_producto='display:table-row';
			$strParaVisibleNegacioncategoria_producto='display:none';
		} else {
			$strParaVisiblecategoria_producto='display:none';
			$strParaVisibleNegacioncategoria_producto='display:table-row';
		}


		$strParaVisibleNegacioncategoria_producto=trim($strParaVisibleNegacioncategoria_producto);

		$this->strVisibleFK_Idcategoria_producto=$strParaVisiblecategoria_producto;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncategoria_producto;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idsub_categoria_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idsub_categoria_productoActual=$idsub_categoria_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.sub_categoria_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.sub_categoria_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarsub_categoria_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacategoria_producto() {//$idsub_categoria_productoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idsub_categoria_productoActual=$idsub_categoria_productoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.categoria_producto_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.sub_categoria_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_categoria_producto(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',categoria_producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.sub_categoria_productoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_categoria_producto(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(categoria_producto_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarsub_categoria_producto,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParaproductos(int $idsub_categoria_productoActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idsub_categoria_productoActual=$idsub_categoria_productoActual;

		$bitPaginaPopupproducto=false;

		try {

			$sub_categoria_producto_session=unserialize($this->Session->read(sub_categoria_producto_util::$STR_SESSION_NAME));

			if($sub_categoria_producto_session==null) {
				$sub_categoria_producto_session=new sub_categoria_producto_session();
			}

			$producto_session=unserialize($this->Session->read(producto_util::$STR_SESSION_NAME));

			if($producto_session==null) {
				$producto_session=new producto_session();
			}

			$producto_session->strUltimaBusqueda='FK_Idsub_categoria_producto';
			$producto_session->strPathNavegacionActual=$sub_categoria_producto_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.producto_util::$STR_CLASS_WEB_TITULO;
			$producto_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupproducto=$producto_session->bitPaginaPopup;
			$producto_session->setPaginaPopupVariables(true);
			$bitPaginaPopupproducto=$producto_session->bitPaginaPopup;
			$producto_session->bitPermiteNavegacionHaciaFKDesde=false;
			$producto_session->strNombrePaginaNavegacionHaciaFKDesde=sub_categoria_producto_util::$STR_NOMBRE_OPCION;
			$producto_session->bitBusquedaDesdeFKSesionsub_categoria_producto=true;
			$producto_session->bigidsub_categoria_productoActual=$this->idsub_categoria_productoActual;

			$sub_categoria_producto_session->bitBusquedaDesdeFKSesionFK=true;
			$sub_categoria_producto_session->bigIdActualFK=$this->idsub_categoria_productoActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"producto"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=sub_categoria_producto_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"producto"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(sub_categoria_producto_util::$STR_SESSION_NAME,serialize($sub_categoria_producto_session));
			$this->Session->write(producto_util::$STR_SESSION_NAME,serialize($producto_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupproducto!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_util::$STR_CLASS_NAME,'inventario','','POPUP',$this->strTipoPaginaAuxiliarsub_categoria_producto,$this->strTipoUsuarioAuxiliarsub_categoria_producto,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(producto_util::$STR_CLASS_NAME,'inventario','','NO-POPUP',$this->strTipoPaginaAuxiliarsub_categoria_producto,$this->strTipoUsuarioAuxiliarsub_categoria_producto,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParalista_productoes(int $idsub_categoria_productoActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idsub_categoria_productoActual=$idsub_categoria_productoActual;

		$bitPaginaPopuplista_producto=false;

		try {

			$sub_categoria_producto_session=unserialize($this->Session->read(sub_categoria_producto_util::$STR_SESSION_NAME));

			if($sub_categoria_producto_session==null) {
				$sub_categoria_producto_session=new sub_categoria_producto_session();
			}

			$lista_producto_session=unserialize($this->Session->read(lista_producto_util::$STR_SESSION_NAME));

			if($lista_producto_session==null) {
				$lista_producto_session=new lista_producto_session();
			}

			$lista_producto_session->strUltimaBusqueda='FK_Idsub_categoria_producto';
			$lista_producto_session->strPathNavegacionActual=$sub_categoria_producto_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.lista_producto_util::$STR_CLASS_WEB_TITULO;
			$lista_producto_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopuplista_producto=$lista_producto_session->bitPaginaPopup;
			$lista_producto_session->setPaginaPopupVariables(true);
			$bitPaginaPopuplista_producto=$lista_producto_session->bitPaginaPopup;
			$lista_producto_session->bitPermiteNavegacionHaciaFKDesde=false;
			$lista_producto_session->strNombrePaginaNavegacionHaciaFKDesde=sub_categoria_producto_util::$STR_NOMBRE_OPCION;
			$lista_producto_session->bitBusquedaDesdeFKSesionsub_categoria_producto=true;
			$lista_producto_session->bigidsub_categoria_productoActual=$this->idsub_categoria_productoActual;

			$sub_categoria_producto_session->bitBusquedaDesdeFKSesionFK=true;
			$sub_categoria_producto_session->bigIdActualFK=$this->idsub_categoria_productoActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"lista_producto"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=sub_categoria_producto_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"lista_producto"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(sub_categoria_producto_util::$STR_SESSION_NAME,serialize($sub_categoria_producto_session));
			$this->Session->write(lista_producto_util::$STR_SESSION_NAME,serialize($lista_producto_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopuplista_producto!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',lista_producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(lista_producto_util::$STR_CLASS_NAME,'inventario','','POPUP',$this->strTipoPaginaAuxiliarsub_categoria_producto,$this->strTipoUsuarioAuxiliarsub_categoria_producto,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',lista_producto_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(lista_producto_util::$STR_CLASS_NAME,'inventario','','NO-POPUP',$this->strTipoPaginaAuxiliarsub_categoria_producto,$this->strTipoUsuarioAuxiliarsub_categoria_producto,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(sub_categoria_producto_util::$STR_SESSION_NAME,sub_categoria_producto_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$sub_categoria_producto_session=$this->Session->read(sub_categoria_producto_util::$STR_SESSION_NAME);
				
		if($sub_categoria_producto_session==null) {
			$sub_categoria_producto_session=new sub_categoria_producto_session();		
			//$this->Session->write('sub_categoria_producto_session',$sub_categoria_producto_session);							
		}
		*/
		
		$sub_categoria_producto_session=new sub_categoria_producto_session();
    	$sub_categoria_producto_session->strPathNavegacionActual=sub_categoria_producto_util::$STR_CLASS_WEB_TITULO;
    	$sub_categoria_producto_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(sub_categoria_producto_util::$STR_SESSION_NAME,serialize($sub_categoria_producto_session));		
	}	
	
	public function getSetBusquedasSesionConfig(sub_categoria_producto_session $sub_categoria_producto_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($sub_categoria_producto_session->bitBusquedaDesdeFKSesionFK!=null && $sub_categoria_producto_session->bitBusquedaDesdeFKSesionFK==true) {
			if($sub_categoria_producto_session->bigIdActualFK!=null && $sub_categoria_producto_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$sub_categoria_producto_session->bigIdActualFKParaPosibleAtras=$sub_categoria_producto_session->bigIdActualFK;*/
			}
				
			$sub_categoria_producto_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$sub_categoria_producto_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(sub_categoria_producto_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($sub_categoria_producto_session->bitBusquedaDesdeFKSesionempresa!=null && $sub_categoria_producto_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($sub_categoria_producto_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(sub_categoria_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(sub_categoria_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(sub_categoria_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($sub_categoria_producto_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($sub_categoria_producto_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=sub_categoria_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$sub_categoria_producto_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$sub_categoria_producto_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=sub_categoria_producto_util::$INT_NUMERO_PAGINACION;

				if($sub_categoria_producto_session->intNumeroPaginacion==sub_categoria_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=sub_categoria_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$sub_categoria_producto_session->intNumeroPaginacion;
				}
			}
			else if($sub_categoria_producto_session->bitBusquedaDesdeFKSesioncategoria_producto!=null && $sub_categoria_producto_session->bitBusquedaDesdeFKSesioncategoria_producto==true)
			{
				if($sub_categoria_producto_session->bigidcategoria_productoActual!=0) {
					$this->strAccionBusqueda='FK_Idcategoria_producto';

					$existe_history=HistoryWeb::ExisteElemento(sub_categoria_producto_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(sub_categoria_producto_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(sub_categoria_producto_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($sub_categoria_producto_session->bigidcategoria_productoActualDescripcion);
						$historyWeb->setIdActual($sub_categoria_producto_session->bigidcategoria_productoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=sub_categoria_producto_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$sub_categoria_producto_session->bigidcategoria_productoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$sub_categoria_producto_session->bitBusquedaDesdeFKSesioncategoria_producto=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=sub_categoria_producto_util::$INT_NUMERO_PAGINACION;

				if($sub_categoria_producto_session->intNumeroPaginacion==sub_categoria_producto_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=sub_categoria_producto_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$sub_categoria_producto_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$sub_categoria_producto_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$sub_categoria_producto_session=unserialize($this->Session->read(sub_categoria_producto_util::$STR_SESSION_NAME));
		
		if($sub_categoria_producto_session==null) {
			$sub_categoria_producto_session=new sub_categoria_producto_session();
		}
		
		$sub_categoria_producto_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$sub_categoria_producto_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$sub_categoria_producto_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcategoria_producto') {
			$sub_categoria_producto_session->id_categoria_producto=$this->id_categoria_productoFK_Idcategoria_producto;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$sub_categoria_producto_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		
		$this->Session->write(sub_categoria_producto_util::$STR_SESSION_NAME,serialize($sub_categoria_producto_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(sub_categoria_producto_session $sub_categoria_producto_session) {
		
		if($sub_categoria_producto_session==null) {
			$sub_categoria_producto_session=unserialize($this->Session->read(sub_categoria_producto_util::$STR_SESSION_NAME));
		}
		
		if($sub_categoria_producto_session==null) {
		   $sub_categoria_producto_session=new sub_categoria_producto_session();
		}
		
		if($sub_categoria_producto_session->strUltimaBusqueda!=null && $sub_categoria_producto_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$sub_categoria_producto_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$sub_categoria_producto_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$sub_categoria_producto_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcategoria_producto') {
				$this->id_categoria_productoFK_Idcategoria_producto=$sub_categoria_producto_session->id_categoria_producto;
				$sub_categoria_producto_session->id_categoria_producto=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$sub_categoria_producto_session->id_empresa;
				$sub_categoria_producto_session->id_empresa=-1;

			}
		}
		
		$sub_categoria_producto_session->strUltimaBusqueda='';
		//$sub_categoria_producto_session->intNumeroPaginacion=10;
		$sub_categoria_producto_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(sub_categoria_producto_util::$STR_SESSION_NAME,serialize($sub_categoria_producto_session));		
	}
	
	public function sub_categoria_productosControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idcategoria_productoDefaultFK = 0;
	}
	
	public function setsub_categoria_productoFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_categoria_producto',$this->idcategoria_productoDefaultFK);
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

		categoria_producto::$class;
		categoria_producto_carga::$CONTROLLER;
		
		//REL
		

		producto_carga::$CONTROLLER;
		producto_util::$STR_SCHEMA;
		producto_session::class;

		lista_producto_carga::$CONTROLLER;
		lista_producto_util::$STR_SCHEMA;
		lista_producto_session::class;
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
		interface sub_categoria_producto_controlI {	
		
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
		
		public function onLoad(sub_categoria_producto_session $sub_categoria_producto_session=null);	
		function index(?string $strTypeOnLoadsub_categoria_producto='',?string $strTipoPaginaAuxiliarsub_categoria_producto='',?string $strTipoUsuarioAuxiliarsub_categoria_producto='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadsub_categoria_producto='',string $strTipoPaginaAuxiliarsub_categoria_producto='',string $strTipoUsuarioAuxiliarsub_categoria_producto='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($sub_categoria_productoReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(sub_categoria_producto $sub_categoria_productoClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(sub_categoria_producto_session $sub_categoria_producto_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(sub_categoria_producto_session $sub_categoria_producto_session);	
		public function sub_categoria_productosControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setsub_categoria_productoFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
