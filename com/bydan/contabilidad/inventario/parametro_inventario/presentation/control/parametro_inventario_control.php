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

namespace com\bydan\contabilidad\inventario\parametro_inventario\presentation\control;

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

use com\bydan\contabilidad\inventario\parametro_inventario\business\entity\parametro_inventario;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/parametro_inventario/util/parametro_inventario_carga.php');
use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_carga;

use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_util;
use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_param_return;
use com\bydan\contabilidad\inventario\parametro_inventario\business\logic\parametro_inventario_logic;
use com\bydan\contabilidad\inventario\parametro_inventario\business\logic\parametro_inventario_logic_add;
use com\bydan\contabilidad\inventario\parametro_inventario\presentation\session\parametro_inventario_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\general\tipo_costeo_kardex\business\entity\tipo_costeo_kardex;
use com\bydan\contabilidad\general\tipo_costeo_kardex\business\logic\tipo_costeo_kardex_logic;
use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_carga;
use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_util;

use com\bydan\contabilidad\inventario\tipo_kardex\business\entity\tipo_kardex;
use com\bydan\contabilidad\inventario\tipo_kardex\business\logic\tipo_kardex_logic;
use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_carga;
use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_inventario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_inventario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_inventario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_inventario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_inventario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/inventario/parametro_inventario/presentation/control/parametro_inventario_init_control.php');
use com\bydan\contabilidad\inventario\parametro_inventario\presentation\control\parametro_inventario_init_control;

include_once('com/bydan/contabilidad/inventario/parametro_inventario/presentation/control/parametro_inventario_base_control.php');
use com\bydan\contabilidad\inventario\parametro_inventario\presentation\control\parametro_inventario_base_control;

class parametro_inventario_control extends parametro_inventario_base_control {	
	
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
					
					
				if($this->data['con_producto_inactivo']==null) {$this->data['con_producto_inactivo']=false;} else {if($this->data['con_producto_inactivo']=='on') {$this->data['con_producto_inactivo']=true;}}
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
			
			
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idtermino_pago_proveedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtermino_pago_proveedorParaProcesar();
			}
			else if($action=="FK_Idtipo_costeo_kardex"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_costeo_kardexParaProcesar();
			}
			else if($action=="FK_Idtipo_kardex"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_kardexParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idparametro_inventarioActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idparametro_inventarioActual
			}
			else if($action=='abrirBusquedaParatermino_pago_proveedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idparametro_inventarioActual=$this->getDataId();
				$this->abrirBusquedaParatermino_pago_proveedor();//$idparametro_inventarioActual
			}
			else if($action=='abrirBusquedaParatipo_costeo_kardex') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idparametro_inventarioActual=$this->getDataId();
				$this->abrirBusquedaParatipo_costeo_kardex();//$idparametro_inventarioActual
			}
			else if($action=='abrirBusquedaParatipo_kardex') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idparametro_inventarioActual=$this->getDataId();
				$this->abrirBusquedaParatipo_kardex();//$idparametro_inventarioActual
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
					
					$parametro_inventarioController = new parametro_inventario_control();
					
					$parametro_inventarioController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($parametro_inventarioController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$parametro_inventarioController = new parametro_inventario_control();
						$parametro_inventarioController = $this;
						
						$jsonResponse = json_encode($parametro_inventarioController->parametro_inventarios);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->parametro_inventarioReturnGeneral==null) {
					$this->parametro_inventarioReturnGeneral=new parametro_inventario_param_return();
				}
				
				echo($this->parametro_inventarioReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$parametro_inventarioController=new parametro_inventario_control();
		
		$parametro_inventarioController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$parametro_inventarioController->usuarioActual=new usuario();
		
		$parametro_inventarioController->usuarioActual->setId($this->usuarioActual->getId());
		$parametro_inventarioController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$parametro_inventarioController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$parametro_inventarioController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$parametro_inventarioController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$parametro_inventarioController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$parametro_inventarioController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$parametro_inventarioController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $parametro_inventarioController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadparametro_inventario= $this->getDataGeneralString('strTypeOnLoadparametro_inventario');
		$strTipoPaginaAuxiliarparametro_inventario= $this->getDataGeneralString('strTipoPaginaAuxiliarparametro_inventario');
		$strTipoUsuarioAuxiliarparametro_inventario= $this->getDataGeneralString('strTipoUsuarioAuxiliarparametro_inventario');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadparametro_inventario,$strTipoPaginaAuxiliarparametro_inventario,$strTipoUsuarioAuxiliarparametro_inventario,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadparametro_inventario!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('parametro_inventario','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(parametro_inventario_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarparametro_inventario,$this->strTipoUsuarioAuxiliarparametro_inventario,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(parametro_inventario_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarparametro_inventario,$this->strTipoUsuarioAuxiliarparametro_inventario,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->parametro_inventarioReturnGeneral=new parametro_inventario_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->parametro_inventarioReturnGeneral->conGuardarReturnSessionJs=true;
		$this->parametro_inventarioReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->parametro_inventarioReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->parametro_inventarioReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->parametro_inventarioReturnGeneral);
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
		$this->parametro_inventarioReturnGeneral=new parametro_inventario_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->parametro_inventarioReturnGeneral->conGuardarReturnSessionJs=true;
		$this->parametro_inventarioReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->parametro_inventarioReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->parametro_inventarioReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->parametro_inventarioReturnGeneral);
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
		$this->parametro_inventarioReturnGeneral=new parametro_inventario_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->parametro_inventarioReturnGeneral->conGuardarReturnSessionJs=true;
		$this->parametro_inventarioReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->parametro_inventarioReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->parametro_inventarioReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->parametro_inventarioReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
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
			
			
			$this->parametro_inventarioReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->parametro_inventarioReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->parametro_inventarioReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->parametro_inventarioReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->parametro_inventarioReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->parametro_inventarioReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->parametro_inventarioReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->parametro_inventarioReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->parametro_inventarioReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->parametro_inventarioReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->parametro_inventarioReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->parametro_inventarioReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->parametro_inventarioReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->parametro_inventarioReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->parametro_inventarioReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->parametro_inventarioReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->parametro_inventarioReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->parametro_inventarioReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
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
		
		$this->parametro_inventarioLogic=new parametro_inventario_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->parametro_inventario=new parametro_inventario();
		
		$this->strTypeOnLoadparametro_inventario='onload';
		$this->strTipoPaginaAuxiliarparametro_inventario='none';
		$this->strTipoUsuarioAuxiliarparametro_inventario='none';	

		$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;
		
		$this->parametro_inventarioModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->parametro_inventarioControllerAdditional=new parametro_inventario_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(parametro_inventario_session $parametro_inventario_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($parametro_inventario_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadparametro_inventario='',?string $strTipoPaginaAuxiliarparametro_inventario='',?string $strTipoUsuarioAuxiliarparametro_inventario='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadparametro_inventario=$strTypeOnLoadparametro_inventario;
			$this->strTipoPaginaAuxiliarparametro_inventario=$strTipoPaginaAuxiliarparametro_inventario;
			$this->strTipoUsuarioAuxiliarparametro_inventario=$strTipoUsuarioAuxiliarparametro_inventario;
	
			if($strTipoUsuarioAuxiliarparametro_inventario=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->parametro_inventario=new parametro_inventario();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Parametro Inventarios';
			
			
			$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));
							
			if($parametro_inventario_session==null) {
				$parametro_inventario_session=new parametro_inventario_session();
				
				/*$this->Session->write('parametro_inventario_session',$parametro_inventario_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($parametro_inventario_session->strFuncionJsPadre!=null && $parametro_inventario_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$parametro_inventario_session->strFuncionJsPadre;
				
				$parametro_inventario_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($parametro_inventario_session);
			
			if($strTypeOnLoadparametro_inventario!=null && $strTypeOnLoadparametro_inventario=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$parametro_inventario_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$parametro_inventario_session->setPaginaPopupVariables(true);
				}
				
				if($parametro_inventario_session->intNumeroPaginacion==parametro_inventario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_inventario_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,parametro_inventario_util::$STR_SESSION_NAME,'inventario');																
			
			} else if($strTypeOnLoadparametro_inventario!=null && $strTypeOnLoadparametro_inventario=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$parametro_inventario_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;*/
				
				if($parametro_inventario_session->intNumeroPaginacion==parametro_inventario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_inventario_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarparametro_inventario!=null && $strTipoPaginaAuxiliarparametro_inventario=='none') {
				/*$parametro_inventario_session->strStyleDivHeader='display:table-row';*/
				
				/*$parametro_inventario_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarparametro_inventario!=null && $strTipoPaginaAuxiliarparametro_inventario=='iframe') {
					/*
					$parametro_inventario_session->strStyleDivArbol='display:none';
					$parametro_inventario_session->strStyleDivHeader='display:none';
					$parametro_inventario_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$parametro_inventario_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->parametro_inventarioClase=new parametro_inventario();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=parametro_inventario_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(parametro_inventario_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->parametro_inventarioLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->parametro_inventarioLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->parametro_inventarioLogic=new parametro_inventario_logic();*/
			
			
			$this->parametro_inventariosModel=null;
			/*new ListDataModel();*/
			
			/*$this->parametro_inventariosModel.setWrappedData(parametro_inventarioLogic->getparametro_inventarios());*/
						
			$this->parametro_inventarios= array();
			$this->parametro_inventariosEliminados=array();
			$this->parametro_inventariosSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= parametro_inventario_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->parametro_inventario= new parametro_inventario();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idtermino_pago_proveedor='display:table-row';
			$this->strVisibleFK_Idtipo_costeo_kardex='display:table-row';
			$this->strVisibleFK_Idtipo_kardex='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarparametro_inventario!=null && $strTipoUsuarioAuxiliarparametro_inventario!='none' && $strTipoUsuarioAuxiliarparametro_inventario!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarparametro_inventario);
																
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
				if($strTipoUsuarioAuxiliarparametro_inventario!=null && $strTipoUsuarioAuxiliarparametro_inventario!='none' && $strTipoUsuarioAuxiliarparametro_inventario!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarparametro_inventario);
																
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
				if($strTipoUsuarioAuxiliarparametro_inventario==null || $strTipoUsuarioAuxiliarparametro_inventario=='none' || $strTipoUsuarioAuxiliarparametro_inventario=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarparametro_inventario,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_inventario_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, parametro_inventario_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina parametro_inventario');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($parametro_inventario_session);
			
			$this->getSetBusquedasSesionConfig($parametro_inventario_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteparametro_inventarios($this->strAccionBusqueda,$this->parametro_inventarioLogic->getparametro_inventarios());*/
				} else if($this->strGenerarReporte=='Html')	{
					$parametro_inventario_session->strServletGenerarHtmlReporte='parametro_inventarioServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(parametro_inventario_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(parametro_inventario_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($parametro_inventario_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarparametro_inventario!=null && $strTipoUsuarioAuxiliarparametro_inventario=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($parametro_inventario_session);
			}
								
			$this->set(parametro_inventario_util::$STR_SESSION_NAME, $parametro_inventario_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($parametro_inventario_session);
			
			/*
			$this->parametro_inventario->recursive = 0;
			
			$this->parametro_inventarios=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('parametro_inventarios', $this->parametro_inventarios);
			
			$this->set(parametro_inventario_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->parametro_inventarioActual =$this->parametro_inventarioClase;
			
			/*$this->parametro_inventarioActual =$this->migrarModelparametro_inventario($this->parametro_inventarioClase);*/
			
			$this->returnHtml(false);
			
			$this->set(parametro_inventario_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=parametro_inventario_util::$STR_NOMBRE_OPCION;
				
			if(parametro_inventario_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=parametro_inventario_util::$STR_MODULO_OPCION.parametro_inventario_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(parametro_inventario_util::$STR_SESSION_NAME,serialize($parametro_inventario_session));
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
			/*$parametro_inventarioClase= (parametro_inventario) parametro_inventariosModel.getRowData();*/
			
			$this->parametro_inventarioClase->setId($this->parametro_inventario->getId());	
			$this->parametro_inventarioClase->setVersionRow($this->parametro_inventario->getVersionRow());	
			$this->parametro_inventarioClase->setVersionRow($this->parametro_inventario->getVersionRow());	
			$this->parametro_inventarioClase->setid_empresa($this->parametro_inventario->getid_empresa());	
			$this->parametro_inventarioClase->setid_termino_pago_proveedor($this->parametro_inventario->getid_termino_pago_proveedor());	
			$this->parametro_inventarioClase->setid_tipo_costeo_kardex($this->parametro_inventario->getid_tipo_costeo_kardex());	
			$this->parametro_inventarioClase->setid_tipo_kardex($this->parametro_inventario->getid_tipo_kardex());	
			$this->parametro_inventarioClase->setnumero_producto($this->parametro_inventario->getnumero_producto());	
			$this->parametro_inventarioClase->setnumero_orden_compra($this->parametro_inventario->getnumero_orden_compra());	
			$this->parametro_inventarioClase->setnumero_devolucion($this->parametro_inventario->getnumero_devolucion());	
			$this->parametro_inventarioClase->setnumero_cotizacion($this->parametro_inventario->getnumero_cotizacion());	
			$this->parametro_inventarioClase->setnumero_kardex($this->parametro_inventario->getnumero_kardex());	
			$this->parametro_inventarioClase->setcon_producto_inactivo($this->parametro_inventario->getcon_producto_inactivo());	
		
			/*$this->Session->write('parametro_inventarioVersionRowActual', parametro_inventario.getVersionRow());*/
			
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
			
			$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));
						
			if($parametro_inventario_session==null) {
				$parametro_inventario_session=new parametro_inventario_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('parametro_inventario', $this->parametro_inventario->read(null, $id));
	
			
			$this->parametro_inventario->recursive = 0;
			
			$this->parametro_inventarios=$this->paginate();
			
			$this->set('parametro_inventarios', $this->parametro_inventarios);
	
			if (empty($this->data)) {
				$this->data = $this->parametro_inventario->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->parametro_inventarioLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->parametro_inventarioClase);
			
			$this->parametro_inventarioActual=$this->parametro_inventarioClase;
			
			/*$this->parametro_inventarioActual =$this->migrarModelparametro_inventario($this->parametro_inventarioClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->parametro_inventarioLogic->getparametro_inventarios(),$this->parametro_inventarioActual);
			
			$this->actualizarControllerConReturnGeneral($this->parametro_inventarioReturnGeneral);
			
			//$this->parametro_inventarioReturnGeneral=$this->parametro_inventarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->parametro_inventarioLogic->getparametro_inventarios(),$this->parametro_inventarioActual,$this->parametro_inventarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));
						
			if($parametro_inventario_session==null) {
				$parametro_inventario_session=new parametro_inventario_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoparametro_inventario', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->parametro_inventarioClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->parametro_inventarioClase);
			
			$this->parametro_inventarioActual =$this->parametro_inventarioClase;
			
			/*$this->parametro_inventarioActual =$this->migrarModelparametro_inventario($this->parametro_inventarioClase);*/
			
			$this->setparametro_inventarioFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->parametro_inventarioLogic->getparametro_inventarios(),$this->parametro_inventario);
			
			$this->actualizarControllerConReturnGeneral($this->parametro_inventarioReturnGeneral);
			
			//this->parametro_inventarioReturnGeneral=$this->parametro_inventarioLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->parametro_inventarioLogic->getparametro_inventarios(),$this->parametro_inventario,$this->parametro_inventarioParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->parametro_inventarioReturnGeneral->getparametro_inventario()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idtermino_pago_proveedorDefaultFK!=null && $this->idtermino_pago_proveedorDefaultFK > -1) {
				$this->parametro_inventarioReturnGeneral->getparametro_inventario()->setid_termino_pago_proveedor($this->idtermino_pago_proveedorDefaultFK);
			}

			if($this->idtipo_costeo_kardexDefaultFK!=null && $this->idtipo_costeo_kardexDefaultFK > -1) {
				$this->parametro_inventarioReturnGeneral->getparametro_inventario()->setid_tipo_costeo_kardex($this->idtipo_costeo_kardexDefaultFK);
			}

			if($this->idtipo_kardexDefaultFK!=null && $this->idtipo_kardexDefaultFK > -1) {
				$this->parametro_inventarioReturnGeneral->getparametro_inventario()->setid_tipo_kardex($this->idtipo_kardexDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->parametro_inventarioReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->parametro_inventarioReturnGeneral->getparametro_inventario(),$this->parametro_inventarioActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyparametro_inventario($this->parametro_inventarioReturnGeneral->getparametro_inventario());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioparametro_inventario($this->parametro_inventarioReturnGeneral->getparametro_inventario());*/
			}
			
			if($this->parametro_inventarioReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->parametro_inventarioReturnGeneral->getparametro_inventario(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualparametro_inventario($this->parametro_inventario,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->parametro_inventariosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_inventariosAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->parametro_inventariosAuxiliar=array();
			}
			
			if(count($this->parametro_inventariosAuxiliar)==2) {
				$parametro_inventarioOrigen=$this->parametro_inventariosAuxiliar[0];
				$parametro_inventarioDestino=$this->parametro_inventariosAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($parametro_inventarioOrigen,$parametro_inventarioDestino,true,false,false);
				
				$this->actualizarLista($parametro_inventarioDestino,$this->parametro_inventarios);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->parametro_inventariosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_inventariosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->parametro_inventariosAuxiliar=array();
			}
			
			if(count($this->parametro_inventariosAuxiliar) > 0) {
				foreach ($this->parametro_inventariosAuxiliar as $parametro_inventarioSeleccionado) {
					$this->parametro_inventario=new parametro_inventario();
					
					$this->setCopiarVariablesObjetos($parametro_inventarioSeleccionado,$this->parametro_inventario,true,true,false);
						
					$this->parametro_inventarios[]=$this->parametro_inventario;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->parametro_inventariosEliminados as $parametro_inventarioEliminado) {
				$this->parametro_inventarioLogic->parametro_inventarios[]=$parametro_inventarioEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->parametro_inventario=new parametro_inventario();
							
				$this->parametro_inventarios[]=$this->parametro_inventario;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
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
		
		$parametro_inventarioActual=new parametro_inventario();
		
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
				
				$parametro_inventarioActual=$this->parametro_inventarios[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $parametro_inventarioActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $parametro_inventarioActual->setid_termino_pago_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $parametro_inventarioActual->setid_tipo_costeo_kardex((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $parametro_inventarioActual->setid_tipo_kardex((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $parametro_inventarioActual->setnumero_producto((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $parametro_inventarioActual->setnumero_orden_compra((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $parametro_inventarioActual->setnumero_devolucion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $parametro_inventarioActual->setnumero_cotizacion((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $parametro_inventarioActual->setnumero_kardex((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $parametro_inventarioActual->setcon_producto_inactivo(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_12')));  } else { $parametro_inventarioActual->setcon_producto_inactivo(false); }
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
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadparametro_inventario='',string $strTipoPaginaAuxiliarparametro_inventario='',string $strTipoUsuarioAuxiliarparametro_inventario='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadparametro_inventario,$strTipoPaginaAuxiliarparametro_inventario,$strTipoUsuarioAuxiliarparametro_inventario,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->parametro_inventarios) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=parametro_inventario_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=parametro_inventario_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=parametro_inventario_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));
						
			if($parametro_inventario_session==null) {
				$parametro_inventario_session=new parametro_inventario_session();
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
					/*$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;*/
					
					if($parametro_inventario_session->intNumeroPaginacion==parametro_inventario_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$parametro_inventario_session->intNumeroPaginacion;
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
			
			$this->parametro_inventariosEliminados=array();
			
			/*$this->parametro_inventarioLogic->setConnexion($connexion);*/
			
			$this->parametro_inventarioLogic->setIsConDeep(true);
			
			$this->parametro_inventarioLogic->getparametro_inventarioDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('termino_pago_proveedor');$classes[]=$class;
			$class=new Classe('tipo_costeo_kardex');$classes[]=$class;
			$class=new Classe('tipo_kardex');$classes[]=$class;
			
			$this->parametro_inventarioLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_inventarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->parametro_inventarioLogic->getparametro_inventarios()==null|| count($this->parametro_inventarioLogic->getparametro_inventarios())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->parametro_inventarios=$this->parametro_inventarioLogic->getparametro_inventarios();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_inventarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->parametro_inventariosReporte=$this->parametro_inventarioLogic->getparametro_inventarios();
									
						/*$this->generarReportes('Todos',$this->parametro_inventarioLogic->getparametro_inventarios());*/
					
						$this->parametro_inventarioLogic->setparametro_inventarios($this->parametro_inventarios);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_inventarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->parametro_inventarioLogic->getparametro_inventarios()==null|| count($this->parametro_inventarioLogic->getparametro_inventarios())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->parametro_inventarios=$this->parametro_inventarioLogic->getparametro_inventarios();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->parametro_inventarioLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->parametro_inventariosReporte=$this->parametro_inventarioLogic->getparametro_inventarios();
									
						/*$this->generarReportes('Todos',$this->parametro_inventarioLogic->getparametro_inventarios());*/
					
						$this->parametro_inventarioLogic->setparametro_inventarios($this->parametro_inventarios);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idparametro_inventario=0;*/
				
				if($parametro_inventario_session->bitBusquedaDesdeFKSesionFK!=null && $parametro_inventario_session->bitBusquedaDesdeFKSesionFK==true) {
					if($parametro_inventario_session->bigIdActualFK!=null && $parametro_inventario_session->bigIdActualFK!=0)	{
						$this->idparametro_inventario=$parametro_inventario_session->bigIdActualFK;	
					}
					
					$parametro_inventario_session->bitBusquedaDesdeFKSesionFK=false;
					
					$parametro_inventario_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idparametro_inventario=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idparametro_inventario=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->parametro_inventarioLogic->getEntity($this->idparametro_inventario);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*parametro_inventarioLogicAdditional::getDetalleIndicePorId($idparametro_inventario);*/

				
				if($this->parametro_inventarioLogic->getparametro_inventario()!=null) {
					$this->parametro_inventarioLogic->setparametro_inventarios(array());
					$this->parametro_inventarioLogic->parametro_inventarios[]=$this->parametro_inventarioLogic->getparametro_inventario();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($parametro_inventario_session->bigidempresaActual!=null && $parametro_inventario_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$parametro_inventario_session->bigidempresaActual;
					$parametro_inventario_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_inventarioLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//parametro_inventarioLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->parametro_inventarioLogic->getparametro_inventarios()==null || count($this->parametro_inventarioLogic->getparametro_inventarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$parametro_inventarios=$this->parametro_inventarioLogic->getparametro_inventarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_inventarioLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->parametro_inventariosReporte=$this->parametro_inventarioLogic->getparametro_inventarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteparametro_inventarios("FK_Idempresa",$this->parametro_inventarioLogic->getparametro_inventarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->parametro_inventarioLogic->setparametro_inventarios($parametro_inventarios);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtermino_pago_proveedor')
			{

				if($parametro_inventario_session->bigidtermino_pago_proveedorActual!=null && $parametro_inventario_session->bigidtermino_pago_proveedorActual!=0)
				{
					$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=$parametro_inventario_session->bigidtermino_pago_proveedorActual;
					$parametro_inventario_session->bigidtermino_pago_proveedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_inventarioLogic->getsFK_Idtermino_pago_proveedor($finalQueryPaginacion,$this->pagination,$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//parametro_inventarioLogicAdditional::getDetalleIndiceFK_Idtermino_pago_proveedor($this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor);


					if($this->parametro_inventarioLogic->getparametro_inventarios()==null || count($this->parametro_inventarioLogic->getparametro_inventarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$parametro_inventarios=$this->parametro_inventarioLogic->getparametro_inventarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_inventarioLogic->getsFK_Idtermino_pago_proveedor('',$this->pagination,$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->parametro_inventariosReporte=$this->parametro_inventarioLogic->getparametro_inventarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteparametro_inventarios("FK_Idtermino_pago_proveedor",$this->parametro_inventarioLogic->getparametro_inventarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->parametro_inventarioLogic->setparametro_inventarios($parametro_inventarios);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_costeo_kardex')
			{

				if($parametro_inventario_session->bigidtipo_costeo_kardexActual!=null && $parametro_inventario_session->bigidtipo_costeo_kardexActual!=0)
				{
					$this->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex=$parametro_inventario_session->bigidtipo_costeo_kardexActual;
					$parametro_inventario_session->bigidtipo_costeo_kardexActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_inventarioLogic->getsFK_Idtipo_costeo_kardex($finalQueryPaginacion,$this->pagination,$this->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//parametro_inventarioLogicAdditional::getDetalleIndiceFK_Idtipo_costeo_kardex($this->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex);


					if($this->parametro_inventarioLogic->getparametro_inventarios()==null || count($this->parametro_inventarioLogic->getparametro_inventarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$parametro_inventarios=$this->parametro_inventarioLogic->getparametro_inventarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_inventarioLogic->getsFK_Idtipo_costeo_kardex('',$this->pagination,$this->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->parametro_inventariosReporte=$this->parametro_inventarioLogic->getparametro_inventarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteparametro_inventarios("FK_Idtipo_costeo_kardex",$this->parametro_inventarioLogic->getparametro_inventarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->parametro_inventarioLogic->setparametro_inventarios($parametro_inventarios);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_kardex')
			{

				if($parametro_inventario_session->bigidtipo_kardexActual!=null && $parametro_inventario_session->bigidtipo_kardexActual!=0)
				{
					$this->id_tipo_kardexFK_Idtipo_kardex=$parametro_inventario_session->bigidtipo_kardexActual;
					$parametro_inventario_session->bigidtipo_kardexActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_inventarioLogic->getsFK_Idtipo_kardex($finalQueryPaginacion,$this->pagination,$this->id_tipo_kardexFK_Idtipo_kardex);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//parametro_inventarioLogicAdditional::getDetalleIndiceFK_Idtipo_kardex($this->id_tipo_kardexFK_Idtipo_kardex);


					if($this->parametro_inventarioLogic->getparametro_inventarios()==null || count($this->parametro_inventarioLogic->getparametro_inventarios())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$parametro_inventarios=$this->parametro_inventarioLogic->getparametro_inventarios();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->parametro_inventarioLogic->getsFK_Idtipo_kardex('',$this->pagination,$this->id_tipo_kardexFK_Idtipo_kardex);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->parametro_inventariosReporte=$this->parametro_inventarioLogic->getparametro_inventarios();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteparametro_inventarios("FK_Idtipo_kardex",$this->parametro_inventarioLogic->getparametro_inventarios());

					if($this->strTipoPaginacion=='TODOS') {
						$this->parametro_inventarioLogic->setparametro_inventarios($parametro_inventarios);
					}
				//}

			} 
		
		$parametro_inventario_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$parametro_inventario_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->parametro_inventarioLogic->loadForeignsKeysDescription();*/
		
		$this->parametro_inventarios=$this->parametro_inventarioLogic->getparametro_inventarios();
		
		if($this->parametro_inventariosEliminados==null) {
			$this->parametro_inventariosEliminados=array();
		}
		
		$this->Session->write(parametro_inventario_util::$STR_SESSION_NAME.'Lista',serialize($this->parametro_inventarios));
		$this->Session->write(parametro_inventario_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->parametro_inventariosEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(parametro_inventario_util::$STR_SESSION_NAME,serialize($parametro_inventario_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idparametro_inventario=$idGeneral;
			
			$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
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
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}

			if(count($this->parametro_inventarios) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
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
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtermino_pago_proveedorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtermino_pago_proveedor','cmbid_termino_pago_proveedor');

			$this->strAccionBusqueda='FK_Idtermino_pago_proveedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_costeo_kardexParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_costeo_kardex','cmbid_tipo_costeo_kardex');

			$this->strAccionBusqueda='FK_Idtipo_costeo_kardex';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_kardexParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_kardexFK_Idtipo_kardex=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_kardex','cmbid_tipo_kardex');

			$this->strAccionBusqueda='FK_Idtipo_kardex';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idempresa($strFinalQuery,$id_empresa)
	{
		try
		{

			$this->parametro_inventarioLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtermino_pago_proveedor($strFinalQuery,$id_termino_pago_proveedor)
	{
		try
		{

			$this->parametro_inventarioLogic->getsFK_Idtermino_pago_proveedor($strFinalQuery,new Pagination(),$id_termino_pago_proveedor);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_costeo_kardex($strFinalQuery,$id_tipo_costeo_kardex)
	{
		try
		{

			$this->parametro_inventarioLogic->getsFK_Idtipo_costeo_kardex($strFinalQuery,new Pagination(),$id_tipo_costeo_kardex);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_kardex($strFinalQuery,$id_tipo_kardex)
	{
		try
		{

			$this->parametro_inventarioLogic->getsFK_Idtipo_kardex($strFinalQuery,new Pagination(),$id_tipo_kardex);
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
			
			
			$parametro_inventarioForeignKey=new parametro_inventario_param_return(); //parametro_inventarioForeignKey();
			
			$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));
						
			if($parametro_inventario_session==null) {
				$parametro_inventario_session=new parametro_inventario_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$parametro_inventarioForeignKey=$this->parametro_inventarioLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$parametro_inventario_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$parametro_inventarioForeignKey->empresasFK;
				$this->idempresaDefaultFK=$parametro_inventarioForeignKey->idempresaDefaultFK;
			}

			if($parametro_inventario_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_proveedor',$this->strRecargarFkTipos,',')) {
				$this->termino_pago_proveedorsFK=$parametro_inventarioForeignKey->termino_pago_proveedorsFK;
				$this->idtermino_pago_proveedorDefaultFK=$parametro_inventarioForeignKey->idtermino_pago_proveedorDefaultFK;
			}

			if($parametro_inventario_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor) {
				$this->setVisibleBusquedasParatermino_pago_proveedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_costeo_kardex',$this->strRecargarFkTipos,',')) {
				$this->tipo_costeo_kardexsFK=$parametro_inventarioForeignKey->tipo_costeo_kardexsFK;
				$this->idtipo_costeo_kardexDefaultFK=$parametro_inventarioForeignKey->idtipo_costeo_kardexDefaultFK;
			}

			if($parametro_inventario_session->bitBusquedaDesdeFKSesiontipo_costeo_kardex) {
				$this->setVisibleBusquedasParatipo_costeo_kardex(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_kardex',$this->strRecargarFkTipos,',')) {
				$this->tipo_kardexsFK=$parametro_inventarioForeignKey->tipo_kardexsFK;
				$this->idtipo_kardexDefaultFK=$parametro_inventarioForeignKey->idtipo_kardexDefaultFK;
			}

			if($parametro_inventario_session->bitBusquedaDesdeFKSesiontipo_kardex) {
				$this->setVisibleBusquedasParatipo_kardex(true);
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
	
	function cargarCombosFKFromReturnGeneral($parametro_inventarioReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$parametro_inventarioReturnGeneral->strRecargarFkTipos;
			
			


			if($parametro_inventarioReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$parametro_inventarioReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$parametro_inventarioReturnGeneral->idempresaDefaultFK;
			}


			if($parametro_inventarioReturnGeneral->con_termino_pago_proveedorsFK==true) {
				$this->termino_pago_proveedorsFK=$parametro_inventarioReturnGeneral->termino_pago_proveedorsFK;
				$this->idtermino_pago_proveedorDefaultFK=$parametro_inventarioReturnGeneral->idtermino_pago_proveedorDefaultFK;
			}


			if($parametro_inventarioReturnGeneral->con_tipo_costeo_kardexsFK==true) {
				$this->tipo_costeo_kardexsFK=$parametro_inventarioReturnGeneral->tipo_costeo_kardexsFK;
				$this->idtipo_costeo_kardexDefaultFK=$parametro_inventarioReturnGeneral->idtipo_costeo_kardexDefaultFK;
			}


			if($parametro_inventarioReturnGeneral->con_tipo_kardexsFK==true) {
				$this->tipo_kardexsFK=$parametro_inventarioReturnGeneral->tipo_kardexsFK;
				$this->idtipo_kardexDefaultFK=$parametro_inventarioReturnGeneral->idtipo_kardexDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(parametro_inventario_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));
		
		if($parametro_inventario_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($parametro_inventario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($parametro_inventario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==termino_pago_proveedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='termino_pago_proveedor';
			}
			else if($parametro_inventario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_costeo_kardex_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_costeo_kardex';
			}
			else if($parametro_inventario_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_kardex_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_kardex';
			}
			
			$parametro_inventario_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}						
			
			$this->parametro_inventariosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->parametro_inventariosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->parametro_inventariosAuxiliar=array();
			}
			
			if(count($this->parametro_inventariosAuxiliar) > 0) {
				
				foreach ($this->parametro_inventariosAuxiliar as $parametro_inventarioSeleccionado) {
					$this->eliminarTablaBase($parametro_inventarioSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
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


	public function gettermino_pago_proveedorsFKListSelectItem() 
	{
		$termino_pago_proveedorsList=array();

		$item=null;

		foreach($this->termino_pago_proveedorsFK as $termino_pago_proveedor)
		{
			$item=new SelectItem();
			$item->setLabel($termino_pago_proveedor->getdescripcion());
			$item->setValue($termino_pago_proveedor->getId());
			$termino_pago_proveedorsList[]=$item;
		}

		return $termino_pago_proveedorsList;
	}


	public function gettipo_costeo_kardexsFKListSelectItem() 
	{
		$tipo_costeo_kardexsList=array();

		$item=null;

		foreach($this->tipo_costeo_kardexsFK as $tipo_costeo_kardex)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_costeo_kardex->getnombre());
			$item->setValue($tipo_costeo_kardex->getId());
			$tipo_costeo_kardexsList[]=$item;
		}

		return $tipo_costeo_kardexsList;
	}


	public function gettipo_kardexsFKListSelectItem() 
	{
		$tipo_kardexsList=array();

		$item=null;

		foreach($this->tipo_kardexsFK as $tipo_kardex)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_kardex->getnombre());
			$item->setValue($tipo_kardex->getId());
			$tipo_kardexsList[]=$item;
		}

		return $tipo_kardexsList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;
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
				$this->parametro_inventarioLogic->commitNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->rollbackNewConnexionToDeep();
				$this->parametro_inventarioLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$parametro_inventariosNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->parametro_inventarios as $parametro_inventarioLocal) {
				if($parametro_inventarioLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->parametro_inventario=new parametro_inventario();
				
				$this->parametro_inventario->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->parametro_inventarios[]=$this->parametro_inventario;*/
				
				$parametro_inventariosNuevos[]=$this->parametro_inventario;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('termino_pago_proveedor');$classes[]=$class;
				$class=new Classe('tipo_costeo_kardex');$classes[]=$class;
				$class=new Classe('tipo_kardex');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->parametro_inventarioLogic->setparametro_inventarios($parametro_inventariosNuevos);
					
				$this->parametro_inventarioLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($parametro_inventariosNuevos as $parametro_inventarioNuevo) {
					$this->parametro_inventarios[]=$parametro_inventarioNuevo;
				}
				
				/*$this->parametro_inventarios[]=$parametro_inventariosNuevos;*/
				
				$this->parametro_inventarioLogic->setparametro_inventarios($this->parametro_inventarios);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($parametro_inventariosNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));

		if($parametro_inventario_session==null) {
			$parametro_inventario_session=new parametro_inventario_session();
		}
		
		if($parametro_inventario_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($parametro_inventario_session->bigidempresaActual!=null && $parametro_inventario_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($parametro_inventario_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=parametro_inventario_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_proveedorsFK($connexion=null,$strRecargarFkQuery=''){
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic();
		$pagination= new Pagination();
		$this->termino_pago_proveedorsFK=array();

		$termino_pago_proveedorLogic->setConnexion($connexion);
		$termino_pago_proveedorLogic->gettermino_pago_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));

		if($parametro_inventario_session==null) {
			$parametro_inventario_session=new parametro_inventario_session();
		}
		
		if($parametro_inventario_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=termino_pago_proveedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltermino_pago_proveedor=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltermino_pago_proveedor=Funciones::GetFinalQueryAppend($finalQueryGlobaltermino_pago_proveedor, '');
				$finalQueryGlobaltermino_pago_proveedor.=termino_pago_proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltermino_pago_proveedor.$strRecargarFkQuery;		

				$termino_pago_proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostermino_pago_proveedorsFK($termino_pago_proveedorLogic->gettermino_pago_proveedors());

		} else {
			$this->setVisibleBusquedasParatermino_pago_proveedor(true);


			if($parametro_inventario_session->bigidtermino_pago_proveedorActual!=null && $parametro_inventario_session->bigidtermino_pago_proveedorActual > 0) {
				$termino_pago_proveedorLogic->getEntity($parametro_inventario_session->bigidtermino_pago_proveedorActual);//WithConnection

				$this->termino_pago_proveedorsFK[$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId()]=parametro_inventario_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLogic->gettermino_pago_proveedor());
				$this->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId();
			}
		}
	}

	public function cargarCombostipo_costeo_kardexsFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic();
		$pagination= new Pagination();
		$this->tipo_costeo_kardexsFK=array();

		$tipo_costeo_kardexLogic->setConnexion($connexion);
		$tipo_costeo_kardexLogic->gettipo_costeo_kardexDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));

		if($parametro_inventario_session==null) {
			$parametro_inventario_session=new parametro_inventario_session();
		}
		
		if($parametro_inventario_session->bitBusquedaDesdeFKSesiontipo_costeo_kardex!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_costeo_kardex_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_costeo_kardex=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_costeo_kardex=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_costeo_kardex, '');
				$finalQueryGlobaltipo_costeo_kardex.=tipo_costeo_kardex_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_costeo_kardex.$strRecargarFkQuery;		

				$tipo_costeo_kardexLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_costeo_kardexsFK($tipo_costeo_kardexLogic->gettipo_costeo_kardexs());

		} else {
			$this->setVisibleBusquedasParatipo_costeo_kardex(true);


			if($parametro_inventario_session->bigidtipo_costeo_kardexActual!=null && $parametro_inventario_session->bigidtipo_costeo_kardexActual > 0) {
				$tipo_costeo_kardexLogic->getEntity($parametro_inventario_session->bigidtipo_costeo_kardexActual);//WithConnection

				$this->tipo_costeo_kardexsFK[$tipo_costeo_kardexLogic->gettipo_costeo_kardex()->getId()]=parametro_inventario_util::gettipo_costeo_kardexDescripcion($tipo_costeo_kardexLogic->gettipo_costeo_kardex());
				$this->idtipo_costeo_kardexDefaultFK=$tipo_costeo_kardexLogic->gettipo_costeo_kardex()->getId();
			}
		}
	}

	public function cargarCombostipo_kardexsFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_kardexLogic= new tipo_kardex_logic();
		$pagination= new Pagination();
		$this->tipo_kardexsFK=array();

		$tipo_kardexLogic->setConnexion($connexion);
		$tipo_kardexLogic->gettipo_kardexDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));

		if($parametro_inventario_session==null) {
			$parametro_inventario_session=new parametro_inventario_session();
		}
		
		if($parametro_inventario_session->bitBusquedaDesdeFKSesiontipo_kardex!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_kardex_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_kardex=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_kardex=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_kardex, '');
				$finalQueryGlobaltipo_kardex.=tipo_kardex_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_kardex.$strRecargarFkQuery;		

				$tipo_kardexLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_kardexsFK($tipo_kardexLogic->gettipo_kardexs());

		} else {
			$this->setVisibleBusquedasParatipo_kardex(true);


			if($parametro_inventario_session->bigidtipo_kardexActual!=null && $parametro_inventario_session->bigidtipo_kardexActual > 0) {
				$tipo_kardexLogic->getEntity($parametro_inventario_session->bigidtipo_kardexActual);//WithConnection

				$this->tipo_kardexsFK[$tipo_kardexLogic->gettipo_kardex()->getId()]=parametro_inventario_util::gettipo_kardexDescripcion($tipo_kardexLogic->gettipo_kardex());
				$this->idtipo_kardexDefaultFK=$tipo_kardexLogic->gettipo_kardex()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=parametro_inventario_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombostermino_pago_proveedorsFK($termino_pago_proveedors){

		foreach ($termino_pago_proveedors as $termino_pago_proveedorLocal ) {
			if($this->idtermino_pago_proveedorDefaultFK==0) {
				$this->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLocal->getId();
			}

			$this->termino_pago_proveedorsFK[$termino_pago_proveedorLocal->getId()]=parametro_inventario_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLocal);
		}
	}

	public function prepararCombostipo_costeo_kardexsFK($tipo_costeo_kardexs){

		foreach ($tipo_costeo_kardexs as $tipo_costeo_kardexLocal ) {
			if($this->idtipo_costeo_kardexDefaultFK==0) {
				$this->idtipo_costeo_kardexDefaultFK=$tipo_costeo_kardexLocal->getId();
			}

			$this->tipo_costeo_kardexsFK[$tipo_costeo_kardexLocal->getId()]=parametro_inventario_util::gettipo_costeo_kardexDescripcion($tipo_costeo_kardexLocal);
		}
	}

	public function prepararCombostipo_kardexsFK($tipo_kardexs){

		foreach ($tipo_kardexs as $tipo_kardexLocal ) {
			if($this->idtipo_kardexDefaultFK==0) {
				$this->idtipo_kardexDefaultFK=$tipo_kardexLocal->getId();
			}

			$this->tipo_kardexsFK[$tipo_kardexLocal->getId()]=parametro_inventario_util::gettipo_kardexDescripcion($tipo_kardexLocal);
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

			$strDescripcionempresa=parametro_inventario_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripciontermino_pago_proveedorFK($idtermino_pago_proveedor,$connexion=null){
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic();
		$termino_pago_proveedorLogic->setConnexion($connexion);
		$termino_pago_proveedorLogic->gettermino_pago_proveedorDataAccess()->isForFKData=true;
		$strDescripciontermino_pago_proveedor='';

		if($idtermino_pago_proveedor!=null && $idtermino_pago_proveedor!='' && $idtermino_pago_proveedor!='null') {
			if($connexion!=null) {
				$termino_pago_proveedorLogic->getEntity($idtermino_pago_proveedor);//WithConnection
			} else {
				$termino_pago_proveedorLogic->getEntityWithConnection($idtermino_pago_proveedor);//
			}

			$strDescripciontermino_pago_proveedor=parametro_inventario_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLogic->gettermino_pago_proveedor());

		} else {
			$strDescripciontermino_pago_proveedor='null';
		}

		return $strDescripciontermino_pago_proveedor;
	}

	public function cargarDescripciontipo_costeo_kardexFK($idtipo_costeo_kardex,$connexion=null){
		$tipo_costeo_kardexLogic= new tipo_costeo_kardex_logic();
		$tipo_costeo_kardexLogic->setConnexion($connexion);
		$tipo_costeo_kardexLogic->gettipo_costeo_kardexDataAccess()->isForFKData=true;
		$strDescripciontipo_costeo_kardex='';

		if($idtipo_costeo_kardex!=null && $idtipo_costeo_kardex!='' && $idtipo_costeo_kardex!='null') {
			if($connexion!=null) {
				$tipo_costeo_kardexLogic->getEntity($idtipo_costeo_kardex);//WithConnection
			} else {
				$tipo_costeo_kardexLogic->getEntityWithConnection($idtipo_costeo_kardex);//
			}

			$strDescripciontipo_costeo_kardex=parametro_inventario_util::gettipo_costeo_kardexDescripcion($tipo_costeo_kardexLogic->gettipo_costeo_kardex());

		} else {
			$strDescripciontipo_costeo_kardex='null';
		}

		return $strDescripciontipo_costeo_kardex;
	}

	public function cargarDescripciontipo_kardexFK($idtipo_kardex,$connexion=null){
		$tipo_kardexLogic= new tipo_kardex_logic();
		$tipo_kardexLogic->setConnexion($connexion);
		$tipo_kardexLogic->gettipo_kardexDataAccess()->isForFKData=true;
		$strDescripciontipo_kardex='';

		if($idtipo_kardex!=null && $idtipo_kardex!='' && $idtipo_kardex!='null') {
			if($connexion!=null) {
				$tipo_kardexLogic->getEntity($idtipo_kardex);//WithConnection
			} else {
				$tipo_kardexLogic->getEntityWithConnection($idtipo_kardex);//
			}

			$strDescripciontipo_kardex=parametro_inventario_util::gettipo_kardexDescripcion($tipo_kardexLogic->gettipo_kardex());

		} else {
			$strDescripciontipo_kardex='null';
		}

		return $strDescripciontipo_kardex;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(parametro_inventario $parametro_inventarioClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$parametro_inventarioClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
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

		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtipo_costeo_kardex=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtipo_kardex=$strParaVisibleNegacionempresa;
	}

	public function setVisibleBusquedasParatermino_pago_proveedor($isParatermino_pago_proveedor){
		$strParaVisibletermino_pago_proveedor='display:table-row';
		$strParaVisibleNegaciontermino_pago_proveedor='display:none';

		if($isParatermino_pago_proveedor) {
			$strParaVisibletermino_pago_proveedor='display:table-row';
			$strParaVisibleNegaciontermino_pago_proveedor='display:none';
		} else {
			$strParaVisibletermino_pago_proveedor='display:none';
			$strParaVisibleNegaciontermino_pago_proveedor='display:table-row';
		}


		$strParaVisibleNegaciontermino_pago_proveedor=trim($strParaVisibleNegaciontermino_pago_proveedor);

		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibletermino_pago_proveedor;
		$this->strVisibleFK_Idtipo_costeo_kardex=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idtipo_kardex=$strParaVisibleNegaciontermino_pago_proveedor;
	}

	public function setVisibleBusquedasParatipo_costeo_kardex($isParatipo_costeo_kardex){
		$strParaVisibletipo_costeo_kardex='display:table-row';
		$strParaVisibleNegaciontipo_costeo_kardex='display:none';

		if($isParatipo_costeo_kardex) {
			$strParaVisibletipo_costeo_kardex='display:table-row';
			$strParaVisibleNegaciontipo_costeo_kardex='display:none';
		} else {
			$strParaVisibletipo_costeo_kardex='display:none';
			$strParaVisibleNegaciontipo_costeo_kardex='display:table-row';
		}


		$strParaVisibleNegaciontipo_costeo_kardex=trim($strParaVisibleNegaciontipo_costeo_kardex);

		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_costeo_kardex;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegaciontipo_costeo_kardex;
		$this->strVisibleFK_Idtipo_costeo_kardex=$strParaVisibletipo_costeo_kardex;
		$this->strVisibleFK_Idtipo_kardex=$strParaVisibleNegaciontipo_costeo_kardex;
	}

	public function setVisibleBusquedasParatipo_kardex($isParatipo_kardex){
		$strParaVisibletipo_kardex='display:table-row';
		$strParaVisibleNegaciontipo_kardex='display:none';

		if($isParatipo_kardex) {
			$strParaVisibletipo_kardex='display:table-row';
			$strParaVisibleNegaciontipo_kardex='display:none';
		} else {
			$strParaVisibletipo_kardex='display:none';
			$strParaVisibleNegaciontipo_kardex='display:table-row';
		}


		$strParaVisibleNegaciontipo_kardex=trim($strParaVisibleNegaciontipo_kardex);

		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_kardex;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegaciontipo_kardex;
		$this->strVisibleFK_Idtipo_costeo_kardex=$strParaVisibleNegaciontipo_kardex;
		$this->strVisibleFK_Idtipo_kardex=$strParaVisibletipo_kardex;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idparametro_inventarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idparametro_inventarioActual=$idparametro_inventarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.parametro_inventarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.parametro_inventarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarparametro_inventario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatermino_pago_proveedor() {//$idparametro_inventarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idparametro_inventarioActual=$idparametro_inventarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.termino_pago_proveedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.parametro_inventarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_termino_pago_proveedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',termino_pago_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.parametro_inventarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_termino_pago_proveedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarparametro_inventario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_costeo_kardex() {//$idparametro_inventarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idparametro_inventarioActual=$idparametro_inventarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_costeo_kardex_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.parametro_inventarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_costeo_kardex(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_costeo_kardex_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.parametro_inventarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_costeo_kardex(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_costeo_kardex_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarparametro_inventario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_kardex() {//$idparametro_inventarioActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idparametro_inventarioActual=$idparametro_inventarioActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_kardex_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.parametro_inventarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_kardex(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_kardex_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.parametro_inventarioJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_kardex(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_kardex_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarparametro_inventario,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(parametro_inventario_util::$STR_SESSION_NAME,parametro_inventario_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$parametro_inventario_session=$this->Session->read(parametro_inventario_util::$STR_SESSION_NAME);
				
		if($parametro_inventario_session==null) {
			$parametro_inventario_session=new parametro_inventario_session();		
			//$this->Session->write('parametro_inventario_session',$parametro_inventario_session);							
		}
		*/
		
		$parametro_inventario_session=new parametro_inventario_session();
    	$parametro_inventario_session->strPathNavegacionActual=parametro_inventario_util::$STR_CLASS_WEB_TITULO;
    	$parametro_inventario_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(parametro_inventario_util::$STR_SESSION_NAME,serialize($parametro_inventario_session));		
	}	
	
	public function getSetBusquedasSesionConfig(parametro_inventario_session $parametro_inventario_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($parametro_inventario_session->bitBusquedaDesdeFKSesionFK!=null && $parametro_inventario_session->bitBusquedaDesdeFKSesionFK==true) {
			if($parametro_inventario_session->bigIdActualFK!=null && $parametro_inventario_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$parametro_inventario_session->bigIdActualFKParaPosibleAtras=$parametro_inventario_session->bigIdActualFK;*/
			}
				
			$parametro_inventario_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$parametro_inventario_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(parametro_inventario_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($parametro_inventario_session->bitBusquedaDesdeFKSesionempresa!=null && $parametro_inventario_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($parametro_inventario_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(parametro_inventario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(parametro_inventario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(parametro_inventario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($parametro_inventario_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($parametro_inventario_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=parametro_inventario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$parametro_inventario_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$parametro_inventario_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;

				if($parametro_inventario_session->intNumeroPaginacion==parametro_inventario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_inventario_session->intNumeroPaginacion;
				}
			}
			else if($parametro_inventario_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor!=null && $parametro_inventario_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor==true)
			{
				if($parametro_inventario_session->bigidtermino_pago_proveedorActual!=0) {
					$this->strAccionBusqueda='FK_Idtermino_pago_proveedor';

					$existe_history=HistoryWeb::ExisteElemento(parametro_inventario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(parametro_inventario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(parametro_inventario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($parametro_inventario_session->bigidtermino_pago_proveedorActualDescripcion);
						$historyWeb->setIdActual($parametro_inventario_session->bigidtermino_pago_proveedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=parametro_inventario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$parametro_inventario_session->bigidtermino_pago_proveedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$parametro_inventario_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;

				if($parametro_inventario_session->intNumeroPaginacion==parametro_inventario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_inventario_session->intNumeroPaginacion;
				}
			}
			else if($parametro_inventario_session->bitBusquedaDesdeFKSesiontipo_costeo_kardex!=null && $parametro_inventario_session->bitBusquedaDesdeFKSesiontipo_costeo_kardex==true)
			{
				if($parametro_inventario_session->bigidtipo_costeo_kardexActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_costeo_kardex';

					$existe_history=HistoryWeb::ExisteElemento(parametro_inventario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(parametro_inventario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(parametro_inventario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($parametro_inventario_session->bigidtipo_costeo_kardexActualDescripcion);
						$historyWeb->setIdActual($parametro_inventario_session->bigidtipo_costeo_kardexActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=parametro_inventario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$parametro_inventario_session->bigidtipo_costeo_kardexActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$parametro_inventario_session->bitBusquedaDesdeFKSesiontipo_costeo_kardex=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;

				if($parametro_inventario_session->intNumeroPaginacion==parametro_inventario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_inventario_session->intNumeroPaginacion;
				}
			}
			else if($parametro_inventario_session->bitBusquedaDesdeFKSesiontipo_kardex!=null && $parametro_inventario_session->bitBusquedaDesdeFKSesiontipo_kardex==true)
			{
				if($parametro_inventario_session->bigidtipo_kardexActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_kardex';

					$existe_history=HistoryWeb::ExisteElemento(parametro_inventario_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(parametro_inventario_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(parametro_inventario_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($parametro_inventario_session->bigidtipo_kardexActualDescripcion);
						$historyWeb->setIdActual($parametro_inventario_session->bigidtipo_kardexActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=parametro_inventario_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$parametro_inventario_session->bigidtipo_kardexActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$parametro_inventario_session->bitBusquedaDesdeFKSesiontipo_kardex=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;

				if($parametro_inventario_session->intNumeroPaginacion==parametro_inventario_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=parametro_inventario_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$parametro_inventario_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$parametro_inventario_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));
		
		if($parametro_inventario_session==null) {
			$parametro_inventario_session=new parametro_inventario_session();
		}
		
		$parametro_inventario_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$parametro_inventario_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$parametro_inventario_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$parametro_inventario_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idtermino_pago_proveedor') {
			$parametro_inventario_session->id_termino_pago_proveedor=$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_costeo_kardex') {
			$parametro_inventario_session->id_tipo_costeo_kardex=$this->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_kardex') {
			$parametro_inventario_session->id_tipo_kardex=$this->id_tipo_kardexFK_Idtipo_kardex;	

		}
		
		$this->Session->write(parametro_inventario_util::$STR_SESSION_NAME,serialize($parametro_inventario_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(parametro_inventario_session $parametro_inventario_session) {
		
		if($parametro_inventario_session==null) {
			$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));
		}
		
		if($parametro_inventario_session==null) {
		   $parametro_inventario_session=new parametro_inventario_session();
		}
		
		if($parametro_inventario_session->strUltimaBusqueda!=null && $parametro_inventario_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$parametro_inventario_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$parametro_inventario_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$parametro_inventario_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$parametro_inventario_session->id_empresa;
				$parametro_inventario_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtermino_pago_proveedor') {
				$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=$parametro_inventario_session->id_termino_pago_proveedor;
				$parametro_inventario_session->id_termino_pago_proveedor=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_costeo_kardex') {
				$this->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex=$parametro_inventario_session->id_tipo_costeo_kardex;
				$parametro_inventario_session->id_tipo_costeo_kardex=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_kardex') {
				$this->id_tipo_kardexFK_Idtipo_kardex=$parametro_inventario_session->id_tipo_kardex;
				$parametro_inventario_session->id_tipo_kardex=-1;

			}
		}
		
		$parametro_inventario_session->strUltimaBusqueda='';
		//$parametro_inventario_session->intNumeroPaginacion=10;
		$parametro_inventario_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(parametro_inventario_util::$STR_SESSION_NAME,serialize($parametro_inventario_session));		
	}
	
	public function parametro_inventariosControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idtermino_pago_proveedorDefaultFK = 0;
		$this->idtipo_costeo_kardexDefaultFK = 0;
		$this->idtipo_kardexDefaultFK = 0;
	}
	
	public function setparametro_inventarioFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_termino_pago_proveedor',$this->idtermino_pago_proveedorDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_costeo_kardex',$this->idtipo_costeo_kardexDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_kardex',$this->idtipo_kardexDefaultFK);
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

		termino_pago_proveedor::$class;
		termino_pago_proveedor_carga::$CONTROLLER;

		tipo_costeo_kardex::$class;
		tipo_costeo_kardex_carga::$CONTROLLER;

		tipo_kardex::$class;
		tipo_kardex_carga::$CONTROLLER;
		
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
		interface parametro_inventario_controlI {	
		
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
		
		public function onLoad(parametro_inventario_session $parametro_inventario_session=null);	
		function index(?string $strTypeOnLoadparametro_inventario='',?string $strTipoPaginaAuxiliarparametro_inventario='',?string $strTipoUsuarioAuxiliarparametro_inventario='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadparametro_inventario='',string $strTipoPaginaAuxiliarparametro_inventario='',string $strTipoUsuarioAuxiliarparametro_inventario='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($parametro_inventarioReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(parametro_inventario $parametro_inventarioClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(parametro_inventario_session $parametro_inventario_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(parametro_inventario_session $parametro_inventario_session);	
		public function parametro_inventariosControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setparametro_inventarioFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
