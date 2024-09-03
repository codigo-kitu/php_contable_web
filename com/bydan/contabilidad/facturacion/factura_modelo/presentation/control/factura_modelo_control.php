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

namespace com\bydan\contabilidad\facturacion\factura_modelo\presentation\control;

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

use com\bydan\contabilidad\facturacion\factura_modelo\business\entity\factura_modelo;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/factura_modelo/util/factura_modelo_carga.php');
use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_carga;

use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_util;
use com\bydan\contabilidad\facturacion\factura_modelo\util\factura_modelo_param_return;
use com\bydan\contabilidad\facturacion\factura_modelo\business\logic\factura_modelo_logic;
use com\bydan\contabilidad\facturacion\factura_modelo\presentation\session\factura_modelo_session;


//FK


use com\bydan\contabilidad\facturacion\factura_lote\business\entity\factura_lote;
use com\bydan\contabilidad\facturacion\factura_lote\business\logic\factura_lote_logic;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
factura_modelo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
factura_modelo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
factura_modelo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
factura_modelo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*factura_modelo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/facturacion/factura_modelo/presentation/control/factura_modelo_init_control.php');
use com\bydan\contabilidad\facturacion\factura_modelo\presentation\control\factura_modelo_init_control;

include_once('com/bydan/contabilidad/facturacion/factura_modelo/presentation/control/factura_modelo_base_control.php');
use com\bydan\contabilidad\facturacion\factura_modelo\presentation\control\factura_modelo_base_control;

class factura_modelo_control extends factura_modelo_base_control {	
	
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
					
					
				if($this->data['marcado']==null) {$this->data['marcado']=false;} else {if($this->data['marcado']=='on') {$this->data['marcado']=true;}}
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
			
			
			else if($action=="FK_Idcliente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdclienteParaProcesar();
			}
			else if($action=="FK_Idfactura_lote"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idfactura_loteParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParafactura_lote') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idfactura_modeloActual=$this->getDataId();
				$this->abrirBusquedaParafactura_lote();//$idfactura_modeloActual
			}
			else if($action=='abrirBusquedaParacliente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idfactura_modeloActual=$this->getDataId();
				$this->abrirBusquedaParacliente();//$idfactura_modeloActual
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
					
					$factura_modeloController = new factura_modelo_control();
					
					$factura_modeloController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($factura_modeloController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$factura_modeloController = new factura_modelo_control();
						$factura_modeloController = $this;
						
						$jsonResponse = json_encode($factura_modeloController->factura_modelos);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->factura_modeloReturnGeneral==null) {
					$this->factura_modeloReturnGeneral=new factura_modelo_param_return();
				}
				
				echo($this->factura_modeloReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$factura_modeloController=new factura_modelo_control();
		
		$factura_modeloController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$factura_modeloController->usuarioActual=new usuario();
		
		$factura_modeloController->usuarioActual->setId($this->usuarioActual->getId());
		$factura_modeloController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$factura_modeloController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$factura_modeloController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$factura_modeloController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$factura_modeloController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$factura_modeloController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$factura_modeloController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $factura_modeloController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadfactura_modelo= $this->getDataGeneralString('strTypeOnLoadfactura_modelo');
		$strTipoPaginaAuxiliarfactura_modelo= $this->getDataGeneralString('strTipoPaginaAuxiliarfactura_modelo');
		$strTipoUsuarioAuxiliarfactura_modelo= $this->getDataGeneralString('strTipoUsuarioAuxiliarfactura_modelo');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadfactura_modelo,$strTipoPaginaAuxiliarfactura_modelo,$strTipoUsuarioAuxiliarfactura_modelo,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadfactura_modelo!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('factura_modelo','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(factura_modelo_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'facturacion','','POPUP',$this->strTipoPaginaAuxiliarfactura_modelo,$this->strTipoUsuarioAuxiliarfactura_modelo,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(factura_modelo_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'facturacion','','POPUP',$this->strTipoPaginaAuxiliarfactura_modelo,$this->strTipoUsuarioAuxiliarfactura_modelo,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->factura_modeloReturnGeneral=new factura_modelo_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->factura_modeloReturnGeneral->conGuardarReturnSessionJs=true;
		$this->factura_modeloReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->factura_modeloReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->factura_modeloReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->factura_modeloReturnGeneral);
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
		$this->factura_modeloReturnGeneral=new factura_modelo_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->factura_modeloReturnGeneral->conGuardarReturnSessionJs=true;
		$this->factura_modeloReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->factura_modeloReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->factura_modeloReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->factura_modeloReturnGeneral);
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
		$this->factura_modeloReturnGeneral=new factura_modelo_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->factura_modeloReturnGeneral->conGuardarReturnSessionJs=true;
		$this->factura_modeloReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->factura_modeloReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->factura_modeloReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->factura_modeloReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
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
			
			
			$this->factura_modeloReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->factura_modeloReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->factura_modeloReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->factura_modeloReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->factura_modeloReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->factura_modeloReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->factura_modeloReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->factura_modeloReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->factura_modeloReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->factura_modeloReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->factura_modeloReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->factura_modeloReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->factura_modeloReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->factura_modeloReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->factura_modeloReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->factura_modeloReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->factura_modeloReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->factura_modeloReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
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
		
		$this->factura_modeloLogic=new factura_modelo_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->factura_modelo=new factura_modelo();
		
		$this->strTypeOnLoadfactura_modelo='onload';
		$this->strTipoPaginaAuxiliarfactura_modelo='none';
		$this->strTipoUsuarioAuxiliarfactura_modelo='none';	

		$this->intNumeroPaginacion=factura_modelo_util::$INT_NUMERO_PAGINACION;
		
		$this->factura_modeloModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->factura_modeloControllerAdditional=new factura_modelo_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(factura_modelo_session $factura_modelo_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($factura_modelo_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadfactura_modelo='',?string $strTipoPaginaAuxiliarfactura_modelo='',?string $strTipoUsuarioAuxiliarfactura_modelo='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadfactura_modelo=$strTypeOnLoadfactura_modelo;
			$this->strTipoPaginaAuxiliarfactura_modelo=$strTipoPaginaAuxiliarfactura_modelo;
			$this->strTipoUsuarioAuxiliarfactura_modelo=$strTipoUsuarioAuxiliarfactura_modelo;
	
			if($strTipoUsuarioAuxiliarfactura_modelo=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->factura_modelo=new factura_modelo();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Facturas Modeloses';
			
			
			$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));
							
			if($factura_modelo_session==null) {
				$factura_modelo_session=new factura_modelo_session();
				
				/*$this->Session->write('factura_modelo_session',$factura_modelo_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($factura_modelo_session->strFuncionJsPadre!=null && $factura_modelo_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$factura_modelo_session->strFuncionJsPadre;
				
				$factura_modelo_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($factura_modelo_session);
			
			if($strTypeOnLoadfactura_modelo!=null && $strTypeOnLoadfactura_modelo=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$factura_modelo_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$factura_modelo_session->setPaginaPopupVariables(true);
				}
				
				if($factura_modelo_session->intNumeroPaginacion==factura_modelo_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_modelo_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_modelo_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,factura_modelo_util::$STR_SESSION_NAME,'facturacion');																
			
			} else if($strTypeOnLoadfactura_modelo!=null && $strTypeOnLoadfactura_modelo=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$factura_modelo_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=factura_modelo_util::$INT_NUMERO_PAGINACION;*/
				
				if($factura_modelo_session->intNumeroPaginacion==factura_modelo_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_modelo_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_modelo_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarfactura_modelo!=null && $strTipoPaginaAuxiliarfactura_modelo=='none') {
				/*$factura_modelo_session->strStyleDivHeader='display:table-row';*/
				
				/*$factura_modelo_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarfactura_modelo!=null && $strTipoPaginaAuxiliarfactura_modelo=='iframe') {
					/*
					$factura_modelo_session->strStyleDivArbol='display:none';
					$factura_modelo_session->strStyleDivHeader='display:none';
					$factura_modelo_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$factura_modelo_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->factura_modeloClase=new factura_modelo();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=factura_modelo_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(factura_modelo_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->factura_modeloLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->factura_modeloLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->factura_modeloLogic=new factura_modelo_logic();*/
			
			
			$this->factura_modelosModel=null;
			/*new ListDataModel();*/
			
			/*$this->factura_modelosModel.setWrappedData(factura_modeloLogic->getfactura_modelos());*/
						
			$this->factura_modelos= array();
			$this->factura_modelosEliminados=array();
			$this->factura_modelosSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= factura_modelo_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->factura_modelo= new factura_modelo();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcliente='display:table-row';
			$this->strVisibleFK_Idfactura_lote='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarfactura_modelo!=null && $strTipoUsuarioAuxiliarfactura_modelo!='none' && $strTipoUsuarioAuxiliarfactura_modelo!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarfactura_modelo);
																
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
				if($strTipoUsuarioAuxiliarfactura_modelo!=null && $strTipoUsuarioAuxiliarfactura_modelo!='none' && $strTipoUsuarioAuxiliarfactura_modelo!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarfactura_modelo);
																
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
				if($strTipoUsuarioAuxiliarfactura_modelo==null || $strTipoUsuarioAuxiliarfactura_modelo=='none' || $strTipoUsuarioAuxiliarfactura_modelo=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarfactura_modelo,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, factura_modelo_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, factura_modelo_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina factura_modelo');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($factura_modelo_session);
			
			$this->getSetBusquedasSesionConfig($factura_modelo_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportefactura_modelos($this->strAccionBusqueda,$this->factura_modeloLogic->getfactura_modelos());*/
				} else if($this->strGenerarReporte=='Html')	{
					$factura_modelo_session->strServletGenerarHtmlReporte='factura_modeloServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(factura_modelo_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(factura_modelo_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($factura_modelo_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarfactura_modelo!=null && $strTipoUsuarioAuxiliarfactura_modelo=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($factura_modelo_session);
			}
								
			$this->set(factura_modelo_util::$STR_SESSION_NAME, $factura_modelo_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($factura_modelo_session);
			
			/*
			$this->factura_modelo->recursive = 0;
			
			$this->factura_modelos=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('factura_modelos', $this->factura_modelos);
			
			$this->set(factura_modelo_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->factura_modeloActual =$this->factura_modeloClase;
			
			/*$this->factura_modeloActual =$this->migrarModelfactura_modelo($this->factura_modeloClase);*/
			
			$this->returnHtml(false);
			
			$this->set(factura_modelo_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=factura_modelo_util::$STR_NOMBRE_OPCION;
				
			if(factura_modelo_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=factura_modelo_util::$STR_MODULO_OPCION.factura_modelo_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(factura_modelo_util::$STR_SESSION_NAME,serialize($factura_modelo_session));
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
			/*$factura_modeloClase= (factura_modelo) factura_modelosModel.getRowData();*/
			
			$this->factura_modeloClase->setId($this->factura_modelo->getId());	
			$this->factura_modeloClase->setVersionRow($this->factura_modelo->getVersionRow());	
			$this->factura_modeloClase->setVersionRow($this->factura_modelo->getVersionRow());	
			$this->factura_modeloClase->setid_factura_lote($this->factura_modelo->getid_factura_lote());	
			$this->factura_modeloClase->setid_cliente($this->factura_modelo->getid_cliente());	
			$this->factura_modeloClase->setmarcado($this->factura_modelo->getmarcado());	
			$this->factura_modeloClase->setultimo($this->factura_modelo->getultimo());	
		
			/*$this->Session->write('factura_modeloVersionRowActual', factura_modelo.getVersionRow());*/
			
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
			
			$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));
						
			if($factura_modelo_session==null) {
				$factura_modelo_session=new factura_modelo_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('factura_modelo', $this->factura_modelo->read(null, $id));
	
			
			$this->factura_modelo->recursive = 0;
			
			$this->factura_modelos=$this->paginate();
			
			$this->set('factura_modelos', $this->factura_modelos);
	
			if (empty($this->data)) {
				$this->data = $this->factura_modelo->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->factura_modeloLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->factura_modeloClase);
			
			$this->factura_modeloActual=$this->factura_modeloClase;
			
			/*$this->factura_modeloActual =$this->migrarModelfactura_modelo($this->factura_modeloClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->factura_modeloLogic->getfactura_modelos(),$this->factura_modeloActual);
			
			$this->actualizarControllerConReturnGeneral($this->factura_modeloReturnGeneral);
			
			//$this->factura_modeloReturnGeneral=$this->factura_modeloLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->factura_modeloLogic->getfactura_modelos(),$this->factura_modeloActual,$this->factura_modeloParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));
						
			if($factura_modelo_session==null) {
				$factura_modelo_session=new factura_modelo_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevofactura_modelo', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->factura_modeloClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->factura_modeloClase);
			
			$this->factura_modeloActual =$this->factura_modeloClase;
			
			/*$this->factura_modeloActual =$this->migrarModelfactura_modelo($this->factura_modeloClase);*/
			
			$this->setfactura_modeloFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->factura_modeloLogic->getfactura_modelos(),$this->factura_modelo);
			
			$this->actualizarControllerConReturnGeneral($this->factura_modeloReturnGeneral);
			
			//this->factura_modeloReturnGeneral=$this->factura_modeloLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->factura_modeloLogic->getfactura_modelos(),$this->factura_modelo,$this->factura_modeloParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idfactura_loteDefaultFK!=null && $this->idfactura_loteDefaultFK > -1) {
				$this->factura_modeloReturnGeneral->getfactura_modelo()->setid_factura_lote($this->idfactura_loteDefaultFK);
			}

			if($this->idclienteDefaultFK!=null && $this->idclienteDefaultFK > -1) {
				$this->factura_modeloReturnGeneral->getfactura_modelo()->setid_cliente($this->idclienteDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->factura_modeloReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->factura_modeloReturnGeneral->getfactura_modelo(),$this->factura_modeloActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyfactura_modelo($this->factura_modeloReturnGeneral->getfactura_modelo());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariofactura_modelo($this->factura_modeloReturnGeneral->getfactura_modelo());*/
			}
			
			if($this->factura_modeloReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->factura_modeloReturnGeneral->getfactura_modelo(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualfactura_modelo($this->factura_modelo,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->factura_modelosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->factura_modelosAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->factura_modelosAuxiliar=array();
			}
			
			if(count($this->factura_modelosAuxiliar)==2) {
				$factura_modeloOrigen=$this->factura_modelosAuxiliar[0];
				$factura_modeloDestino=$this->factura_modelosAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($factura_modeloOrigen,$factura_modeloDestino,true,false,false);
				
				$this->actualizarLista($factura_modeloDestino,$this->factura_modelos);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->factura_modelosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->factura_modelosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->factura_modelosAuxiliar=array();
			}
			
			if(count($this->factura_modelosAuxiliar) > 0) {
				foreach ($this->factura_modelosAuxiliar as $factura_modeloSeleccionado) {
					$this->factura_modelo=new factura_modelo();
					
					$this->setCopiarVariablesObjetos($factura_modeloSeleccionado,$this->factura_modelo,true,true,false);
						
					$this->factura_modelos[]=$this->factura_modelo;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->factura_modelosEliminados as $factura_modeloEliminado) {
				$this->factura_modeloLogic->factura_modelos[]=$factura_modeloEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->factura_modelo=new factura_modelo();
							
				$this->factura_modelos[]=$this->factura_modelo;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
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
		
		$factura_modeloActual=new factura_modelo();
		
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
				
				$factura_modeloActual=$this->factura_modelos[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $factura_modeloActual->setid_factura_lote((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $factura_modeloActual->setid_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $factura_modeloActual->setmarcado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_5')));  } else { $factura_modeloActual->setmarcado(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $factura_modeloActual->setultimo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
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
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=factura_modelo_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadfactura_modelo='',string $strTipoPaginaAuxiliarfactura_modelo='',string $strTipoUsuarioAuxiliarfactura_modelo='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadfactura_modelo,$strTipoPaginaAuxiliarfactura_modelo,$strTipoUsuarioAuxiliarfactura_modelo,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->factura_modelos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=factura_modelo_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=factura_modelo_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=factura_modelo_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));
						
			if($factura_modelo_session==null) {
				$factura_modelo_session=new factura_modelo_session();
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
					/*$this->intNumeroPaginacion=factura_modelo_util::$INT_NUMERO_PAGINACION;*/
					
					if($factura_modelo_session->intNumeroPaginacion==factura_modelo_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=factura_modelo_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$factura_modelo_session->intNumeroPaginacion;
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
			
			$this->factura_modelosEliminados=array();
			
			/*$this->factura_modeloLogic->setConnexion($connexion);*/
			
			$this->factura_modeloLogic->setIsConDeep(true);
			
			$this->factura_modeloLogic->getfactura_modeloDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('factura_lote');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			
			$this->factura_modeloLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->factura_modeloLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->factura_modeloLogic->getfactura_modelos()==null|| count($this->factura_modeloLogic->getfactura_modelos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->factura_modelos=$this->factura_modeloLogic->getfactura_modelos();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->factura_modeloLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->factura_modelosReporte=$this->factura_modeloLogic->getfactura_modelos();
									
						/*$this->generarReportes('Todos',$this->factura_modeloLogic->getfactura_modelos());*/
					
						$this->factura_modeloLogic->setfactura_modelos($this->factura_modelos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->factura_modeloLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->factura_modeloLogic->getfactura_modelos()==null|| count($this->factura_modeloLogic->getfactura_modelos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->factura_modelos=$this->factura_modeloLogic->getfactura_modelos();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->factura_modeloLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->factura_modelosReporte=$this->factura_modeloLogic->getfactura_modelos();
									
						/*$this->generarReportes('Todos',$this->factura_modeloLogic->getfactura_modelos());*/
					
						$this->factura_modeloLogic->setfactura_modelos($this->factura_modelos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idfactura_modelo=0;*/
				
				if($factura_modelo_session->bitBusquedaDesdeFKSesionFK!=null && $factura_modelo_session->bitBusquedaDesdeFKSesionFK==true) {
					if($factura_modelo_session->bigIdActualFK!=null && $factura_modelo_session->bigIdActualFK!=0)	{
						$this->idfactura_modelo=$factura_modelo_session->bigIdActualFK;	
					}
					
					$factura_modelo_session->bitBusquedaDesdeFKSesionFK=false;
					
					$factura_modelo_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idfactura_modelo=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idfactura_modelo=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->factura_modeloLogic->getEntity($this->idfactura_modelo);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*factura_modeloLogicAdditional::getDetalleIndicePorId($idfactura_modelo);*/

				
				if($this->factura_modeloLogic->getfactura_modelo()!=null) {
					$this->factura_modeloLogic->setfactura_modelos(array());
					$this->factura_modeloLogic->factura_modelos[]=$this->factura_modeloLogic->getfactura_modelo();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcliente')
			{

				if($factura_modelo_session->bigidclienteActual!=null && $factura_modelo_session->bigidclienteActual!=0)
				{
					$this->id_clienteFK_Idcliente=$factura_modelo_session->bigidclienteActual;
					$factura_modelo_session->bigidclienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_modeloLogic->getsFK_Idcliente($finalQueryPaginacion,$this->pagination,$this->id_clienteFK_Idcliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//factura_modeloLogicAdditional::getDetalleIndiceFK_Idcliente($this->id_clienteFK_Idcliente);


					if($this->factura_modeloLogic->getfactura_modelos()==null || count($this->factura_modeloLogic->getfactura_modelos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$factura_modelos=$this->factura_modeloLogic->getfactura_modelos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_modeloLogic->getsFK_Idcliente('',$this->pagination,$this->id_clienteFK_Idcliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->factura_modelosReporte=$this->factura_modeloLogic->getfactura_modelos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportefactura_modelos("FK_Idcliente",$this->factura_modeloLogic->getfactura_modelos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->factura_modeloLogic->setfactura_modelos($factura_modelos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idfactura_lote')
			{

				if($factura_modelo_session->bigidfactura_loteActual!=null && $factura_modelo_session->bigidfactura_loteActual!=0)
				{
					$this->id_factura_loteFK_Idfactura_lote=$factura_modelo_session->bigidfactura_loteActual;
					$factura_modelo_session->bigidfactura_loteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_modeloLogic->getsFK_Idfactura_lote($finalQueryPaginacion,$this->pagination,$this->id_factura_loteFK_Idfactura_lote);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//factura_modeloLogicAdditional::getDetalleIndiceFK_Idfactura_lote($this->id_factura_loteFK_Idfactura_lote);


					if($this->factura_modeloLogic->getfactura_modelos()==null || count($this->factura_modeloLogic->getfactura_modelos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$factura_modelos=$this->factura_modeloLogic->getfactura_modelos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->factura_modeloLogic->getsFK_Idfactura_lote('',$this->pagination,$this->id_factura_loteFK_Idfactura_lote);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->factura_modelosReporte=$this->factura_modeloLogic->getfactura_modelos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportefactura_modelos("FK_Idfactura_lote",$this->factura_modeloLogic->getfactura_modelos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->factura_modeloLogic->setfactura_modelos($factura_modelos);
					}
				//}

			} 
		
		$factura_modelo_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$factura_modelo_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->factura_modeloLogic->loadForeignsKeysDescription();*/
		
		$this->factura_modelos=$this->factura_modeloLogic->getfactura_modelos();
		
		if($this->factura_modelosEliminados==null) {
			$this->factura_modelosEliminados=array();
		}
		
		$this->Session->write(factura_modelo_util::$STR_SESSION_NAME.'Lista',serialize($this->factura_modelos));
		$this->Session->write(factura_modelo_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->factura_modelosEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(factura_modelo_util::$STR_SESSION_NAME,serialize($factura_modelo_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idfactura_modelo=$idGeneral;
			
			$this->intNumeroPaginacion=factura_modelo_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
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
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}

			if(count($this->factura_modelos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdclienteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=factura_modelo_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_clienteFK_Idcliente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcliente','cmbid_cliente');

			$this->strAccionBusqueda='FK_Idcliente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idfactura_loteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=factura_modelo_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_factura_loteFK_Idfactura_lote=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idfactura_lote','cmbid_factura_lote');

			$this->strAccionBusqueda='FK_Idfactura_lote';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcliente($strFinalQuery,$id_cliente)
	{
		try
		{

			$this->factura_modeloLogic->getsFK_Idcliente($strFinalQuery,new Pagination(),$id_cliente);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idfactura_lote($strFinalQuery,$id_factura_lote)
	{
		try
		{

			$this->factura_modeloLogic->getsFK_Idfactura_lote($strFinalQuery,new Pagination(),$id_factura_lote);
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
			
			
			$factura_modeloForeignKey=new factura_modelo_param_return(); //factura_modeloForeignKey();
			
			$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));
						
			if($factura_modelo_session==null) {
				$factura_modelo_session=new factura_modelo_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$factura_modeloForeignKey=$this->factura_modeloLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$factura_modelo_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_factura_lote',$this->strRecargarFkTipos,',')) {
				$this->factura_lotesFK=$factura_modeloForeignKey->factura_lotesFK;
				$this->idfactura_loteDefaultFK=$factura_modeloForeignKey->idfactura_loteDefaultFK;
			}

			if($factura_modelo_session->bitBusquedaDesdeFKSesionfactura_lote) {
				$this->setVisibleBusquedasParafactura_lote(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$this->strRecargarFkTipos,',')) {
				$this->clientesFK=$factura_modeloForeignKey->clientesFK;
				$this->idclienteDefaultFK=$factura_modeloForeignKey->idclienteDefaultFK;
			}

			if($factura_modelo_session->bitBusquedaDesdeFKSesioncliente) {
				$this->setVisibleBusquedasParacliente(true);
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
	
	function cargarCombosFKFromReturnGeneral($factura_modeloReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$factura_modeloReturnGeneral->strRecargarFkTipos;
			
			


			if($factura_modeloReturnGeneral->con_factura_lotesFK==true) {
				$this->factura_lotesFK=$factura_modeloReturnGeneral->factura_lotesFK;
				$this->idfactura_loteDefaultFK=$factura_modeloReturnGeneral->idfactura_loteDefaultFK;
			}


			if($factura_modeloReturnGeneral->con_clientesFK==true) {
				$this->clientesFK=$factura_modeloReturnGeneral->clientesFK;
				$this->idclienteDefaultFK=$factura_modeloReturnGeneral->idclienteDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(factura_modelo_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));
		
		if($factura_modelo_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($factura_modelo_session->getstrNombrePaginaNavegacionHaciaFKDesde()==factura_lote_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='factura_lote';
			}
			else if($factura_modelo_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cliente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cliente';
			}
			
			$factura_modelo_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}						
			
			$this->factura_modelosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->factura_modelosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->factura_modelosAuxiliar=array();
			}
			
			if(count($this->factura_modelosAuxiliar) > 0) {
				
				foreach ($this->factura_modelosAuxiliar as $factura_modeloSeleccionado) {
					$this->eliminarTablaBase($factura_modeloSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
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
	
	
	
	public function getfactura_lotesFKListSelectItem() 
	{
		$factura_lotesList=array();

		$item=null;

		foreach($this->factura_lotesFK as $factura_lote)
		{
			$item=new SelectItem();
			$item->setLabel($factura_lote>getId());
			$item->setValue($factura_lote->getId());
			$factura_lotesList[]=$item;
		}

		return $factura_lotesList;
	}


	public function getclientesFKListSelectItem() 
	{
		$clientesList=array();

		$item=null;

		foreach($this->clientesFK as $cliente)
		{
			$item=new SelectItem();
			$item->setLabel($cliente->getnombre_completo());
			$item->setValue($cliente->getId());
			$clientesList[]=$item;
		}

		return $clientesList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=factura_modelo_util::$INT_NUMERO_PAGINACION;
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
				$this->factura_modeloLogic->commitNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->rollbackNewConnexionToDeep();
				$this->factura_modeloLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$factura_modelosNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->factura_modelos as $factura_modeloLocal) {
				if($factura_modeloLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->factura_modelo=new factura_modelo();
				
				$this->factura_modelo->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->factura_modelos[]=$this->factura_modelo;*/
				
				$factura_modelosNuevos[]=$this->factura_modelo;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('factura_lote');$classes[]=$class;
				$class=new Classe('cliente');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->factura_modeloLogic->setfactura_modelos($factura_modelosNuevos);
					
				$this->factura_modeloLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($factura_modelosNuevos as $factura_modeloNuevo) {
					$this->factura_modelos[]=$factura_modeloNuevo;
				}
				
				/*$this->factura_modelos[]=$factura_modelosNuevos;*/
				
				$this->factura_modeloLogic->setfactura_modelos($this->factura_modelos);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($factura_modelosNuevos!=null);
	}
					
	
	public function cargarCombosfactura_lotesFK($connexion=null,$strRecargarFkQuery=''){
		$factura_loteLogic= new factura_lote_logic();
		$pagination= new Pagination();
		$this->factura_lotesFK=array();

		$factura_loteLogic->setConnexion($connexion);
		$factura_loteLogic->getfactura_loteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));

		if($factura_modelo_session==null) {
			$factura_modelo_session=new factura_modelo_session();
		}
		
		if($factura_modelo_session->bitBusquedaDesdeFKSesionfactura_lote!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=factura_lote_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalfactura_lote=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalfactura_lote=Funciones::GetFinalQueryAppend($finalQueryGlobalfactura_lote, '');
				$finalQueryGlobalfactura_lote.=factura_lote_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalfactura_lote.$strRecargarFkQuery;		

				$factura_loteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosfactura_lotesFK($factura_loteLogic->getfactura_lotes());

		} else {
			$this->setVisibleBusquedasParafactura_lote(true);


			if($factura_modelo_session->bigidfactura_loteActual!=null && $factura_modelo_session->bigidfactura_loteActual > 0) {
				$factura_loteLogic->getEntity($factura_modelo_session->bigidfactura_loteActual);//WithConnection

				$this->factura_lotesFK[$factura_loteLogic->getfactura_lote()->getId()]=factura_modelo_util::getfactura_loteDescripcion($factura_loteLogic->getfactura_lote());
				$this->idfactura_loteDefaultFK=$factura_loteLogic->getfactura_lote()->getId();
			}
		}
	}

	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery=''){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$this->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));

		if($factura_modelo_session==null) {
			$factura_modelo_session=new factura_modelo_session();
		}
		
		if($factura_modelo_session->bitBusquedaDesdeFKSesioncliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cliente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcliente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcliente=Funciones::GetFinalQueryAppend($finalQueryGlobalcliente, '');
				$finalQueryGlobalcliente.=cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcliente.$strRecargarFkQuery;		

				$clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosclientesFK($clienteLogic->getclientes());

		} else {
			$this->setVisibleBusquedasParacliente(true);


			if($factura_modelo_session->bigidclienteActual!=null && $factura_modelo_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($factura_modelo_session->bigidclienteActual);//WithConnection

				$this->clientesFK[$clienteLogic->getcliente()->getId()]=factura_modelo_util::getclienteDescripcion($clienteLogic->getcliente());
				$this->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
			}
		}
	}

	
	
	public function prepararCombosfactura_lotesFK($factura_lotes){

		foreach ($factura_lotes as $factura_loteLocal ) {
			if($this->idfactura_loteDefaultFK==0) {
				$this->idfactura_loteDefaultFK=$factura_loteLocal->getId();
			}

			$this->factura_lotesFK[$factura_loteLocal->getId()]=factura_modelo_util::getfactura_loteDescripcion($factura_loteLocal);
		}
	}

	public function prepararCombosclientesFK($clientes){

		foreach ($clientes as $clienteLocal ) {
			if($this->idclienteDefaultFK==0) {
				$this->idclienteDefaultFK=$clienteLocal->getId();
			}

			$this->clientesFK[$clienteLocal->getId()]=factura_modelo_util::getclienteDescripcion($clienteLocal);
		}
	}

	
	
	public function cargarDescripcionfactura_loteFK($idfactura_lote,$connexion=null){
		$factura_loteLogic= new factura_lote_logic();
		$factura_loteLogic->setConnexion($connexion);
		$factura_loteLogic->getfactura_loteDataAccess()->isForFKData=true;
		$strDescripcionfactura_lote='';

		if($idfactura_lote!=null && $idfactura_lote!='' && $idfactura_lote!='null') {
			if($connexion!=null) {
				$factura_loteLogic->getEntity($idfactura_lote);//WithConnection
			} else {
				$factura_loteLogic->getEntityWithConnection($idfactura_lote);//
			}

			$strDescripcionfactura_lote=factura_modelo_util::getfactura_loteDescripcion($factura_loteLogic->getfactura_lote());

		} else {
			$strDescripcionfactura_lote='null';
		}

		return $strDescripcionfactura_lote;
	}

	public function cargarDescripcionclienteFK($idcliente,$connexion=null){
		$clienteLogic= new cliente_logic();
		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$strDescripcioncliente='';

		if($idcliente!=null && $idcliente!='' && $idcliente!='null') {
			if($connexion!=null) {
				$clienteLogic->getEntity($idcliente);//WithConnection
			} else {
				$clienteLogic->getEntityWithConnection($idcliente);//
			}

			$strDescripcioncliente=factura_modelo_util::getclienteDescripcion($clienteLogic->getcliente());

		} else {
			$strDescripcioncliente='null';
		}

		return $strDescripcioncliente;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(factura_modelo $factura_modeloClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParafactura_lote($isParafactura_lote){
		$strParaVisiblefactura_lote='display:table-row';
		$strParaVisibleNegacionfactura_lote='display:none';

		if($isParafactura_lote) {
			$strParaVisiblefactura_lote='display:table-row';
			$strParaVisibleNegacionfactura_lote='display:none';
		} else {
			$strParaVisiblefactura_lote='display:none';
			$strParaVisibleNegacionfactura_lote='display:table-row';
		}


		$strParaVisibleNegacionfactura_lote=trim($strParaVisibleNegacionfactura_lote);

		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionfactura_lote;
		$this->strVisibleFK_Idfactura_lote=$strParaVisiblefactura_lote;
	}

	public function setVisibleBusquedasParacliente($isParacliente){
		$strParaVisiblecliente='display:table-row';
		$strParaVisibleNegacioncliente='display:none';

		if($isParacliente) {
			$strParaVisiblecliente='display:table-row';
			$strParaVisibleNegacioncliente='display:none';
		} else {
			$strParaVisiblecliente='display:none';
			$strParaVisibleNegacioncliente='display:table-row';
		}


		$strParaVisibleNegacioncliente=trim($strParaVisibleNegacioncliente);

		$this->strVisibleFK_Idcliente=$strParaVisiblecliente;
		$this->strVisibleFK_Idfactura_lote=$strParaVisibleNegacioncliente;
	}
	
	

	public function abrirBusquedaParafactura_lote() {//$idfactura_modeloActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idfactura_modeloActual=$idfactura_modeloActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.factura_lote_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.factura_modeloJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_factura_lote(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',factura_lote_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.factura_modeloJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_factura_lote(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(factura_lote_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarfactura_modelo,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacliente() {//$idfactura_modeloActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idfactura_modeloActual=$idfactura_modeloActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cliente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.factura_modeloJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cliente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.factura_modeloJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cliente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarfactura_modelo,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(factura_modelo_util::$STR_SESSION_NAME,factura_modelo_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$factura_modelo_session=$this->Session->read(factura_modelo_util::$STR_SESSION_NAME);
				
		if($factura_modelo_session==null) {
			$factura_modelo_session=new factura_modelo_session();		
			//$this->Session->write('factura_modelo_session',$factura_modelo_session);							
		}
		*/
		
		$factura_modelo_session=new factura_modelo_session();
    	$factura_modelo_session->strPathNavegacionActual=factura_modelo_util::$STR_CLASS_WEB_TITULO;
    	$factura_modelo_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(factura_modelo_util::$STR_SESSION_NAME,serialize($factura_modelo_session));		
	}	
	
	public function getSetBusquedasSesionConfig(factura_modelo_session $factura_modelo_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($factura_modelo_session->bitBusquedaDesdeFKSesionFK!=null && $factura_modelo_session->bitBusquedaDesdeFKSesionFK==true) {
			if($factura_modelo_session->bigIdActualFK!=null && $factura_modelo_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$factura_modelo_session->bigIdActualFKParaPosibleAtras=$factura_modelo_session->bigIdActualFK;*/
			}
				
			$factura_modelo_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$factura_modelo_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(factura_modelo_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($factura_modelo_session->bitBusquedaDesdeFKSesionfactura_lote!=null && $factura_modelo_session->bitBusquedaDesdeFKSesionfactura_lote==true)
			{
				if($factura_modelo_session->bigidfactura_loteActual!=0) {
					$this->strAccionBusqueda='FK_Idfactura_lote';

					$existe_history=HistoryWeb::ExisteElemento(factura_modelo_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(factura_modelo_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(factura_modelo_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($factura_modelo_session->bigidfactura_loteActualDescripcion);
						$historyWeb->setIdActual($factura_modelo_session->bigidfactura_loteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=factura_modelo_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$factura_modelo_session->bigidfactura_loteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$factura_modelo_session->bitBusquedaDesdeFKSesionfactura_lote=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=factura_modelo_util::$INT_NUMERO_PAGINACION;

				if($factura_modelo_session->intNumeroPaginacion==factura_modelo_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_modelo_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_modelo_session->intNumeroPaginacion;
				}
			}
			else if($factura_modelo_session->bitBusquedaDesdeFKSesioncliente!=null && $factura_modelo_session->bitBusquedaDesdeFKSesioncliente==true)
			{
				if($factura_modelo_session->bigidclienteActual!=0) {
					$this->strAccionBusqueda='FK_Idcliente';

					$existe_history=HistoryWeb::ExisteElemento(factura_modelo_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(factura_modelo_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(factura_modelo_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($factura_modelo_session->bigidclienteActualDescripcion);
						$historyWeb->setIdActual($factura_modelo_session->bigidclienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=factura_modelo_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$factura_modelo_session->bigidclienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$factura_modelo_session->bitBusquedaDesdeFKSesioncliente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=factura_modelo_util::$INT_NUMERO_PAGINACION;

				if($factura_modelo_session->intNumeroPaginacion==factura_modelo_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=factura_modelo_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$factura_modelo_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$factura_modelo_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));
		
		if($factura_modelo_session==null) {
			$factura_modelo_session=new factura_modelo_session();
		}
		
		$factura_modelo_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$factura_modelo_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$factura_modelo_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcliente') {
			$factura_modelo_session->id_cliente=$this->id_clienteFK_Idcliente;	

		}
		else if($this->strAccionBusqueda=='FK_Idfactura_lote') {
			$factura_modelo_session->id_factura_lote=$this->id_factura_loteFK_Idfactura_lote;	

		}
		
		$this->Session->write(factura_modelo_util::$STR_SESSION_NAME,serialize($factura_modelo_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(factura_modelo_session $factura_modelo_session) {
		
		if($factura_modelo_session==null) {
			$factura_modelo_session=unserialize($this->Session->read(factura_modelo_util::$STR_SESSION_NAME));
		}
		
		if($factura_modelo_session==null) {
		   $factura_modelo_session=new factura_modelo_session();
		}
		
		if($factura_modelo_session->strUltimaBusqueda!=null && $factura_modelo_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$factura_modelo_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$factura_modelo_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$factura_modelo_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcliente') {
				$this->id_clienteFK_Idcliente=$factura_modelo_session->id_cliente;
				$factura_modelo_session->id_cliente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idfactura_lote') {
				$this->id_factura_loteFK_Idfactura_lote=$factura_modelo_session->id_factura_lote;
				$factura_modelo_session->id_factura_lote=-1;

			}
		}
		
		$factura_modelo_session->strUltimaBusqueda='';
		//$factura_modelo_session->intNumeroPaginacion=10;
		$factura_modelo_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(factura_modelo_util::$STR_SESSION_NAME,serialize($factura_modelo_session));		
	}
	
	public function factura_modelosControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idfactura_loteDefaultFK = 0;
		$this->idclienteDefaultFK = 0;
	}
	
	public function setfactura_modeloFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_factura_lote',$this->idfactura_loteDefaultFK);
		$this->setExistDataCampoForm('form','id_cliente',$this->idclienteDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		factura_lote::$class;
		factura_lote_carga::$CONTROLLER;

		cliente::$class;
		cliente_carga::$CONTROLLER;
		
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
		interface factura_modelo_controlI {	
		
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
		
		public function onLoad(factura_modelo_session $factura_modelo_session=null);	
		function index(?string $strTypeOnLoadfactura_modelo='',?string $strTipoPaginaAuxiliarfactura_modelo='',?string $strTipoUsuarioAuxiliarfactura_modelo='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadfactura_modelo='',string $strTipoPaginaAuxiliarfactura_modelo='',string $strTipoUsuarioAuxiliarfactura_modelo='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($factura_modeloReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(factura_modelo $factura_modeloClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(factura_modelo_session $factura_modelo_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(factura_modelo_session $factura_modelo_session);	
		public function factura_modelosControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setfactura_modeloFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
