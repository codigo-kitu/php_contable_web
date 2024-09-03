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

namespace com\bydan\contabilidad\facturacion\retencion_ica\presentation\control;

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

use com\bydan\contabilidad\facturacion\retencion_ica\business\entity\retencion_ica;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/retencion_ica/util/retencion_ica_carga.php');
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_carga;

use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_util;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_param_return;
use com\bydan\contabilidad\facturacion\retencion_ica\business\logic\retencion_ica_logic;
use com\bydan\contabilidad\facturacion\retencion_ica\presentation\session\retencion_ica_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
retencion_ica_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
retencion_ica_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
retencion_ica_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
retencion_ica_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*retencion_ica_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/facturacion/retencion_ica/presentation/control/retencion_ica_init_control.php');
use com\bydan\contabilidad\facturacion\retencion_ica\presentation\control\retencion_ica_init_control;

include_once('com/bydan/contabilidad/facturacion/retencion_ica/presentation/control/retencion_ica_base_control.php');
use com\bydan\contabilidad\facturacion\retencion_ica\presentation\control\retencion_ica_base_control;

class retencion_ica_control extends retencion_ica_base_control {	
	
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
			else if($action=='registrarSesionParaproveedores' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idretencion_icaActual=$this->getDataId();
				$this->registrarSesionParaproveedores($idretencion_icaActual);
			}
			else if($action=='registrarSesionParaclientes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idretencion_icaActual=$this->getDataId();
				$this->registrarSesionParaclientes($idretencion_icaActual);
			} 
			
			
			else if($action=="FK_Idcuenta_compras"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcuenta_comprasParaProcesar();
			}
			else if($action=="FK_Idcuenta_ventas"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcuenta_ventasParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idretencion_icaActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idretencion_icaActual
			}
			else if($action=='abrirBusquedaParacuenta_ventas') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idretencion_icaActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_ventas();//$idretencion_icaActual
			}
			else if($action=='abrirBusquedaParacuenta_compras') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idretencion_icaActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_compras();//$idretencion_icaActual
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
					
					$retencion_icaController = new retencion_ica_control();
					
					$retencion_icaController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($retencion_icaController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$retencion_icaController = new retencion_ica_control();
						$retencion_icaController = $this;
						
						$jsonResponse = json_encode($retencion_icaController->retencion_icas);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->retencion_icaReturnGeneral==null) {
					$this->retencion_icaReturnGeneral=new retencion_ica_param_return();
				}
				
				echo($this->retencion_icaReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$retencion_icaController=new retencion_ica_control();
		
		$retencion_icaController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$retencion_icaController->usuarioActual=new usuario();
		
		$retencion_icaController->usuarioActual->setId($this->usuarioActual->getId());
		$retencion_icaController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$retencion_icaController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$retencion_icaController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$retencion_icaController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$retencion_icaController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$retencion_icaController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$retencion_icaController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $retencion_icaController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadretencion_ica= $this->getDataGeneralString('strTypeOnLoadretencion_ica');
		$strTipoPaginaAuxiliarretencion_ica= $this->getDataGeneralString('strTipoPaginaAuxiliarretencion_ica');
		$strTipoUsuarioAuxiliarretencion_ica= $this->getDataGeneralString('strTipoUsuarioAuxiliarretencion_ica');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadretencion_ica,$strTipoPaginaAuxiliarretencion_ica,$strTipoUsuarioAuxiliarretencion_ica,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadretencion_ica!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('retencion_ica','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_ica_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'facturacion','','POPUP',$this->strTipoPaginaAuxiliarretencion_ica,$this->strTipoUsuarioAuxiliarretencion_ica,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retencion_ica_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'facturacion','','POPUP',$this->strTipoPaginaAuxiliarretencion_ica,$this->strTipoUsuarioAuxiliarretencion_ica,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->retencion_icaReturnGeneral=new retencion_ica_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->retencion_icaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->retencion_icaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->retencion_icaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->retencion_icaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->retencion_icaReturnGeneral);
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
		$this->retencion_icaReturnGeneral=new retencion_ica_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->retencion_icaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->retencion_icaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->retencion_icaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->retencion_icaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->retencion_icaReturnGeneral);
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
		$this->retencion_icaReturnGeneral=new retencion_ica_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->retencion_icaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->retencion_icaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->retencion_icaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->retencion_icaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->retencion_icaReturnGeneral);
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
				$this->retencion_icaLogic->getNewConnexionToDeep();
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
			
			
			$this->retencion_icaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->retencion_icaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->retencion_icaReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->retencion_icaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->retencion_icaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->retencion_icaReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->retencion_icaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->retencion_icaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->retencion_icaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->retencion_icaReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->retencion_icaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->retencion_icaReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->retencion_icaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->retencion_icaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->retencion_icaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->retencion_icaReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->retencion_icaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->retencion_icaReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
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
		
		$this->retencion_icaLogic=new retencion_ica_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->retencion_ica=new retencion_ica();
		
		$this->strTypeOnLoadretencion_ica='onload';
		$this->strTipoPaginaAuxiliarretencion_ica='none';
		$this->strTipoUsuarioAuxiliarretencion_ica='none';	

		$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;
		
		$this->retencion_icaModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->retencion_icaControllerAdditional=new retencion_ica_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(retencion_ica_session $retencion_ica_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($retencion_ica_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadretencion_ica='',?string $strTipoPaginaAuxiliarretencion_ica='',?string $strTipoUsuarioAuxiliarretencion_ica='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadretencion_ica=$strTypeOnLoadretencion_ica;
			$this->strTipoPaginaAuxiliarretencion_ica=$strTipoPaginaAuxiliarretencion_ica;
			$this->strTipoUsuarioAuxiliarretencion_ica=$strTipoUsuarioAuxiliarretencion_ica;
	
			if($strTipoUsuarioAuxiliarretencion_ica=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->retencion_ica=new retencion_ica();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Retencion Icas';
			
			
			$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));
							
			if($retencion_ica_session==null) {
				$retencion_ica_session=new retencion_ica_session();
				
				/*$this->Session->write('retencion_ica_session',$retencion_ica_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($retencion_ica_session->strFuncionJsPadre!=null && $retencion_ica_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$retencion_ica_session->strFuncionJsPadre;
				
				$retencion_ica_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($retencion_ica_session);
			
			if($strTypeOnLoadretencion_ica!=null && $strTypeOnLoadretencion_ica=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$retencion_ica_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$retencion_ica_session->setPaginaPopupVariables(true);
				}
				
				if($retencion_ica_session->intNumeroPaginacion==retencion_ica_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$retencion_ica_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,retencion_ica_util::$STR_SESSION_NAME,'facturacion');																
			
			} else if($strTypeOnLoadretencion_ica!=null && $strTypeOnLoadretencion_ica=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$retencion_ica_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;*/
				
				if($retencion_ica_session->intNumeroPaginacion==retencion_ica_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$retencion_ica_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarretencion_ica!=null && $strTipoPaginaAuxiliarretencion_ica=='none') {
				/*$retencion_ica_session->strStyleDivHeader='display:table-row';*/
				
				/*$retencion_ica_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarretencion_ica!=null && $strTipoPaginaAuxiliarretencion_ica=='iframe') {
					/*
					$retencion_ica_session->strStyleDivArbol='display:none';
					$retencion_ica_session->strStyleDivHeader='display:none';
					$retencion_ica_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$retencion_ica_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->retencion_icaClase=new retencion_ica();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=retencion_ica_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(retencion_ica_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->retencion_icaLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->retencion_icaLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$proveedorLogic=new proveedor_logic();
			//$clienteLogic=new cliente_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->retencion_icaLogic=new retencion_ica_logic();*/
			
			
			$this->retencion_icasModel=null;
			/*new ListDataModel();*/
			
			/*$this->retencion_icasModel.setWrappedData(retencion_icaLogic->getretencion_icas());*/
						
			$this->retencion_icas= array();
			$this->retencion_icasEliminados=array();
			$this->retencion_icasSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= retencion_ica_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= retencion_ica_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->retencion_ica= new retencion_ica();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcuenta_compras='display:table-row';
			$this->strVisibleFK_Idcuenta_ventas='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarretencion_ica!=null && $strTipoUsuarioAuxiliarretencion_ica!='none' && $strTipoUsuarioAuxiliarretencion_ica!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarretencion_ica);
																
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
				if($strTipoUsuarioAuxiliarretencion_ica!=null && $strTipoUsuarioAuxiliarretencion_ica!='none' && $strTipoUsuarioAuxiliarretencion_ica!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarretencion_ica);
																
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
				if($strTipoUsuarioAuxiliarretencion_ica==null || $strTipoUsuarioAuxiliarretencion_ica=='none' || $strTipoUsuarioAuxiliarretencion_ica=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarretencion_ica,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, retencion_ica_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, retencion_ica_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina retencion_ica');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($retencion_ica_session);
			
			$this->getSetBusquedasSesionConfig($retencion_ica_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteretencion_icas($this->strAccionBusqueda,$this->retencion_icaLogic->getretencion_icas());*/
				} else if($this->strGenerarReporte=='Html')	{
					$retencion_ica_session->strServletGenerarHtmlReporte='retencion_icaServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(retencion_ica_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(retencion_ica_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($retencion_ica_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarretencion_ica!=null && $strTipoUsuarioAuxiliarretencion_ica=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($retencion_ica_session);
			}
								
			$this->set(retencion_ica_util::$STR_SESSION_NAME, $retencion_ica_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($retencion_ica_session);
			
			/*
			$this->retencion_ica->recursive = 0;
			
			$this->retencion_icas=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('retencion_icas', $this->retencion_icas);
			
			$this->set(retencion_ica_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->retencion_icaActual =$this->retencion_icaClase;
			
			/*$this->retencion_icaActual =$this->migrarModelretencion_ica($this->retencion_icaClase);*/
			
			$this->returnHtml(false);
			
			$this->set(retencion_ica_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=retencion_ica_util::$STR_NOMBRE_OPCION;
				
			if(retencion_ica_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=retencion_ica_util::$STR_MODULO_OPCION.retencion_ica_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(retencion_ica_util::$STR_SESSION_NAME,serialize($retencion_ica_session));
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
			/*$retencion_icaClase= (retencion_ica) retencion_icasModel.getRowData();*/
			
			$this->retencion_icaClase->setId($this->retencion_ica->getId());	
			$this->retencion_icaClase->setVersionRow($this->retencion_ica->getVersionRow());	
			$this->retencion_icaClase->setVersionRow($this->retencion_ica->getVersionRow());	
			$this->retencion_icaClase->setid_empresa($this->retencion_ica->getid_empresa());	
			$this->retencion_icaClase->setcodigo($this->retencion_ica->getcodigo());	
			$this->retencion_icaClase->setdescripcion($this->retencion_ica->getdescripcion());	
			$this->retencion_icaClase->setvalor($this->retencion_ica->getvalor());	
			$this->retencion_icaClase->setvalor_base($this->retencion_ica->getvalor_base());	
			$this->retencion_icaClase->setpredeterminado($this->retencion_ica->getpredeterminado());	
			$this->retencion_icaClase->setid_cuenta_ventas($this->retencion_ica->getid_cuenta_ventas());	
			$this->retencion_icaClase->setid_cuenta_compras($this->retencion_ica->getid_cuenta_compras());	
			$this->retencion_icaClase->setcuenta_contable_ventas($this->retencion_ica->getcuenta_contable_ventas());	
			$this->retencion_icaClase->setcuenta_contable_compras($this->retencion_ica->getcuenta_contable_compras());	
		
			/*$this->Session->write('retencion_icaVersionRowActual', retencion_ica.getVersionRow());*/
			
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
			
			$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));
						
			if($retencion_ica_session==null) {
				$retencion_ica_session=new retencion_ica_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('retencion_ica', $this->retencion_ica->read(null, $id));
	
			
			$this->retencion_ica->recursive = 0;
			
			$this->retencion_icas=$this->paginate();
			
			$this->set('retencion_icas', $this->retencion_icas);
	
			if (empty($this->data)) {
				$this->data = $this->retencion_ica->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->retencion_icaLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->retencion_icaClase);
			
			$this->retencion_icaActual=$this->retencion_icaClase;
			
			/*$this->retencion_icaActual =$this->migrarModelretencion_ica($this->retencion_icaClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->retencion_icaLogic->getretencion_icas(),$this->retencion_icaActual);
			
			$this->actualizarControllerConReturnGeneral($this->retencion_icaReturnGeneral);
			
			//$this->retencion_icaReturnGeneral=$this->retencion_icaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->retencion_icaLogic->getretencion_icas(),$this->retencion_icaActual,$this->retencion_icaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));
						
			if($retencion_ica_session==null) {
				$retencion_ica_session=new retencion_ica_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoretencion_ica', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->retencion_icaClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->retencion_icaClase);
			
			$this->retencion_icaActual =$this->retencion_icaClase;
			
			/*$this->retencion_icaActual =$this->migrarModelretencion_ica($this->retencion_icaClase);*/
			
			$this->setretencion_icaFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->retencion_icaLogic->getretencion_icas(),$this->retencion_ica);
			
			$this->actualizarControllerConReturnGeneral($this->retencion_icaReturnGeneral);
			
			//this->retencion_icaReturnGeneral=$this->retencion_icaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->retencion_icaLogic->getretencion_icas(),$this->retencion_ica,$this->retencion_icaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->retencion_icaReturnGeneral->getretencion_ica()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idcuenta_ventasDefaultFK!=null && $this->idcuenta_ventasDefaultFK > -1) {
				$this->retencion_icaReturnGeneral->getretencion_ica()->setid_cuenta_ventas($this->idcuenta_ventasDefaultFK);
			}

			if($this->idcuenta_comprasDefaultFK!=null && $this->idcuenta_comprasDefaultFK > -1) {
				$this->retencion_icaReturnGeneral->getretencion_ica()->setid_cuenta_compras($this->idcuenta_comprasDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->retencion_icaReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->retencion_icaReturnGeneral->getretencion_ica(),$this->retencion_icaActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyretencion_ica($this->retencion_icaReturnGeneral->getretencion_ica());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioretencion_ica($this->retencion_icaReturnGeneral->getretencion_ica());*/
			}
			
			if($this->retencion_icaReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->retencion_icaReturnGeneral->getretencion_ica(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualretencion_ica($this->retencion_ica,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->retencion_icasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->retencion_icasAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->retencion_icasAuxiliar=array();
			}
			
			if(count($this->retencion_icasAuxiliar)==2) {
				$retencion_icaOrigen=$this->retencion_icasAuxiliar[0];
				$retencion_icaDestino=$this->retencion_icasAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($retencion_icaOrigen,$retencion_icaDestino,true,false,false);
				
				$this->actualizarLista($retencion_icaDestino,$this->retencion_icas);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->retencion_icasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->retencion_icasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->retencion_icasAuxiliar=array();
			}
			
			if(count($this->retencion_icasAuxiliar) > 0) {
				foreach ($this->retencion_icasAuxiliar as $retencion_icaSeleccionado) {
					$this->retencion_ica=new retencion_ica();
					
					$this->setCopiarVariablesObjetos($retencion_icaSeleccionado,$this->retencion_ica,true,true,false);
						
					$this->retencion_icas[]=$this->retencion_ica;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->retencion_icasEliminados as $retencion_icaEliminado) {
				$this->retencion_icaLogic->retencion_icas[]=$retencion_icaEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->retencion_ica=new retencion_ica();
							
				$this->retencion_icas[]=$this->retencion_ica;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
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
		
		$retencion_icaActual=new retencion_ica();
		
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
				
				$retencion_icaActual=$this->retencion_icas[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $retencion_icaActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $retencion_icaActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $retencion_icaActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $retencion_icaActual->setvalor((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $retencion_icaActual->setvalor_base((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $retencion_icaActual->setpredeterminado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_8')));  } else { $retencion_icaActual->setpredeterminado(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $retencion_icaActual->setid_cuenta_ventas((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $retencion_icaActual->setid_cuenta_compras((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $retencion_icaActual->setcuenta_contable_ventas($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $retencion_icaActual->setcuenta_contable_compras($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->retencion_icasAuxiliar=array();		 
		/*$this->retencion_icasEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->retencion_icasAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->retencion_icasAuxiliar=array();
		}
			
		if(count($this->retencion_icasAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->retencion_icasAuxiliar as $retencion_icaAuxLocal) {				
				
				foreach($this->retencion_icas as $retencion_icaLocal) {
					if($retencion_icaLocal->getId()==$retencion_icaAuxLocal->getId()) {
						$retencion_icaLocal->setIsDeleted(true);
						
						/*$this->retencion_icasEliminados[]=$retencion_icaLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->retencion_icaLogic->setretencion_icas($this->retencion_icas);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
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
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadretencion_ica='',string $strTipoPaginaAuxiliarretencion_ica='',string $strTipoUsuarioAuxiliarretencion_ica='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadretencion_ica,$strTipoPaginaAuxiliarretencion_ica,$strTipoUsuarioAuxiliarretencion_ica,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->retencion_icas) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=retencion_ica_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=retencion_ica_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=retencion_ica_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));
						
			if($retencion_ica_session==null) {
				$retencion_ica_session=new retencion_ica_session();
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
					/*$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;*/
					
					if($retencion_ica_session->intNumeroPaginacion==retencion_ica_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$retencion_ica_session->intNumeroPaginacion;
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
			
			$this->retencion_icasEliminados=array();
			
			/*$this->retencion_icaLogic->setConnexion($connexion);*/
			
			$this->retencion_icaLogic->setIsConDeep(true);
			
			$this->retencion_icaLogic->getretencion_icaDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('cuenta_ventas');$classes[]=$class;
			$class=new Classe('cuenta_compras');$classes[]=$class;
			
			$this->retencion_icaLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->retencion_icaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->retencion_icaLogic->getretencion_icas()==null|| count($this->retencion_icaLogic->getretencion_icas())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->retencion_icas=$this->retencion_icaLogic->getretencion_icas();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->retencion_icaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->retencion_icasReporte=$this->retencion_icaLogic->getretencion_icas();
									
						/*$this->generarReportes('Todos',$this->retencion_icaLogic->getretencion_icas());*/
					
						$this->retencion_icaLogic->setretencion_icas($this->retencion_icas);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->retencion_icaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->retencion_icaLogic->getretencion_icas()==null|| count($this->retencion_icaLogic->getretencion_icas())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->retencion_icas=$this->retencion_icaLogic->getretencion_icas();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->retencion_icaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->retencion_icasReporte=$this->retencion_icaLogic->getretencion_icas();
									
						/*$this->generarReportes('Todos',$this->retencion_icaLogic->getretencion_icas());*/
					
						$this->retencion_icaLogic->setretencion_icas($this->retencion_icas);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idretencion_ica=0;*/
				
				if($retencion_ica_session->bitBusquedaDesdeFKSesionFK!=null && $retencion_ica_session->bitBusquedaDesdeFKSesionFK==true) {
					if($retencion_ica_session->bigIdActualFK!=null && $retencion_ica_session->bigIdActualFK!=0)	{
						$this->idretencion_ica=$retencion_ica_session->bigIdActualFK;	
					}
					
					$retencion_ica_session->bitBusquedaDesdeFKSesionFK=false;
					
					$retencion_ica_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idretencion_ica=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idretencion_ica=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->retencion_icaLogic->getEntity($this->idretencion_ica);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*retencion_icaLogicAdditional::getDetalleIndicePorId($idretencion_ica);*/

				
				if($this->retencion_icaLogic->getretencion_ica()!=null) {
					$this->retencion_icaLogic->setretencion_icas(array());
					$this->retencion_icaLogic->retencion_icas[]=$this->retencion_icaLogic->getretencion_ica();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcuenta_compras')
			{

				if($retencion_ica_session->bigidcuenta_comprasActual!=null && $retencion_ica_session->bigidcuenta_comprasActual!=0)
				{
					$this->id_cuenta_comprasFK_Idcuenta_compras=$retencion_ica_session->bigidcuenta_comprasActual;
					$retencion_ica_session->bigidcuenta_comprasActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->retencion_icaLogic->getsFK_Idcuenta_compras($finalQueryPaginacion,$this->pagination,$this->id_cuenta_comprasFK_Idcuenta_compras);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//retencion_icaLogicAdditional::getDetalleIndiceFK_Idcuenta_compras($this->id_cuenta_comprasFK_Idcuenta_compras);


					if($this->retencion_icaLogic->getretencion_icas()==null || count($this->retencion_icaLogic->getretencion_icas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$retencion_icas=$this->retencion_icaLogic->getretencion_icas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->retencion_icaLogic->getsFK_Idcuenta_compras('',$this->pagination,$this->id_cuenta_comprasFK_Idcuenta_compras);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->retencion_icasReporte=$this->retencion_icaLogic->getretencion_icas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteretencion_icas("FK_Idcuenta_compras",$this->retencion_icaLogic->getretencion_icas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->retencion_icaLogic->setretencion_icas($retencion_icas);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta_ventas')
			{

				if($retencion_ica_session->bigidcuenta_ventasActual!=null && $retencion_ica_session->bigidcuenta_ventasActual!=0)
				{
					$this->id_cuenta_ventasFK_Idcuenta_ventas=$retencion_ica_session->bigidcuenta_ventasActual;
					$retencion_ica_session->bigidcuenta_ventasActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->retencion_icaLogic->getsFK_Idcuenta_ventas($finalQueryPaginacion,$this->pagination,$this->id_cuenta_ventasFK_Idcuenta_ventas);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//retencion_icaLogicAdditional::getDetalleIndiceFK_Idcuenta_ventas($this->id_cuenta_ventasFK_Idcuenta_ventas);


					if($this->retencion_icaLogic->getretencion_icas()==null || count($this->retencion_icaLogic->getretencion_icas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$retencion_icas=$this->retencion_icaLogic->getretencion_icas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->retencion_icaLogic->getsFK_Idcuenta_ventas('',$this->pagination,$this->id_cuenta_ventasFK_Idcuenta_ventas);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->retencion_icasReporte=$this->retencion_icaLogic->getretencion_icas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteretencion_icas("FK_Idcuenta_ventas",$this->retencion_icaLogic->getretencion_icas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->retencion_icaLogic->setretencion_icas($retencion_icas);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($retencion_ica_session->bigidempresaActual!=null && $retencion_ica_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$retencion_ica_session->bigidempresaActual;
					$retencion_ica_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->retencion_icaLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//retencion_icaLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->retencion_icaLogic->getretencion_icas()==null || count($this->retencion_icaLogic->getretencion_icas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$retencion_icas=$this->retencion_icaLogic->getretencion_icas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->retencion_icaLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->retencion_icasReporte=$this->retencion_icaLogic->getretencion_icas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteretencion_icas("FK_Idempresa",$this->retencion_icaLogic->getretencion_icas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->retencion_icaLogic->setretencion_icas($retencion_icas);
					}
				//}

			} 
		
		$retencion_ica_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$retencion_ica_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->retencion_icaLogic->loadForeignsKeysDescription();*/
		
		$this->retencion_icas=$this->retencion_icaLogic->getretencion_icas();
		
		if($this->retencion_icasEliminados==null) {
			$this->retencion_icasEliminados=array();
		}
		
		$this->Session->write(retencion_ica_util::$STR_SESSION_NAME.'Lista',serialize($this->retencion_icas));
		$this->Session->write(retencion_ica_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->retencion_icasEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(retencion_ica_util::$STR_SESSION_NAME,serialize($retencion_ica_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idretencion_ica=$idGeneral;
			
			$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
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
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}

			if(count($this->retencion_icas) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Idcuenta_comprasParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_comprasFK_Idcuenta_compras=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_compras','cmbid_cuenta_compras');

			$this->strAccionBusqueda='FK_Idcuenta_compras';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idcuenta_ventasParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_ventasFK_Idcuenta_ventas=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_ventas','cmbid_cuenta_ventas');

			$this->strAccionBusqueda='FK_Idcuenta_ventas';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
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
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcuenta_compras($strFinalQuery,$id_cuenta_compras)
	{
		try
		{

			$this->retencion_icaLogic->getsFK_Idcuenta_compras($strFinalQuery,new Pagination(),$id_cuenta_compras);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcuenta_ventas($strFinalQuery,$id_cuenta_ventas)
	{
		try
		{

			$this->retencion_icaLogic->getsFK_Idcuenta_ventas($strFinalQuery,new Pagination(),$id_cuenta_ventas);
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

			$this->retencion_icaLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
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
			
			
			$retencion_icaForeignKey=new retencion_ica_param_return(); //retencion_icaForeignKey();
			
			$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));
						
			if($retencion_ica_session==null) {
				$retencion_ica_session=new retencion_ica_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$retencion_icaForeignKey=$this->retencion_icaLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$retencion_ica_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$retencion_icaForeignKey->empresasFK;
				$this->idempresaDefaultFK=$retencion_icaForeignKey->idempresaDefaultFK;
			}

			if($retencion_ica_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_ventas',$this->strRecargarFkTipos,',')) {
				$this->cuenta_ventassFK=$retencion_icaForeignKey->cuenta_ventassFK;
				$this->idcuenta_ventasDefaultFK=$retencion_icaForeignKey->idcuenta_ventasDefaultFK;
			}

			if($retencion_ica_session->bitBusquedaDesdeFKSesioncuenta_ventas) {
				$this->setVisibleBusquedasParacuenta_ventas(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_compras',$this->strRecargarFkTipos,',')) {
				$this->cuenta_comprassFK=$retencion_icaForeignKey->cuenta_comprassFK;
				$this->idcuenta_comprasDefaultFK=$retencion_icaForeignKey->idcuenta_comprasDefaultFK;
			}

			if($retencion_ica_session->bitBusquedaDesdeFKSesioncuenta_compras) {
				$this->setVisibleBusquedasParacuenta_compras(true);
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
	
	function cargarCombosFKFromReturnGeneral($retencion_icaReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$retencion_icaReturnGeneral->strRecargarFkTipos;
			
			


			if($retencion_icaReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$retencion_icaReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$retencion_icaReturnGeneral->idempresaDefaultFK;
			}


			if($retencion_icaReturnGeneral->con_cuenta_ventassFK==true) {
				$this->cuenta_ventassFK=$retencion_icaReturnGeneral->cuenta_ventassFK;
				$this->idcuenta_ventasDefaultFK=$retencion_icaReturnGeneral->idcuenta_ventasDefaultFK;
			}


			if($retencion_icaReturnGeneral->con_cuenta_comprassFK==true) {
				$this->cuenta_comprassFK=$retencion_icaReturnGeneral->cuenta_comprassFK;
				$this->idcuenta_comprasDefaultFK=$retencion_icaReturnGeneral->idcuenta_comprasDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(retencion_ica_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));
		
		if($retencion_ica_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($retencion_ica_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($retencion_ica_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			else if($retencion_ica_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			
			$retencion_ica_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}						
			
			$this->retencion_icasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->retencion_icasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->retencion_icasAuxiliar=array();
			}
			
			if(count($this->retencion_icasAuxiliar) > 0) {
				
				foreach ($this->retencion_icasAuxiliar as $retencion_icaSeleccionado) {
					$this->eliminarTablaBase($retencion_icaSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('cliente');
			$tipoRelacionReporte->setsDescripcion('Clientes');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('proveedor');
			$tipoRelacionReporte->setsDescripcion('Proveedores');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=proveedor_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=cliente_util::$STR_NOMBRE_CLASE;
		
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


	public function getcuenta_ventassFKListSelectItem() 
	{
		$cuenta_ventassList=array();

		$item=null;

		foreach($this->cuenta_ventassFK as $cuenta_ventas)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta_ventas->getcodigo());
			$item->setValue($cuenta_ventas->getId());
			$cuenta_ventassList[]=$item;
		}

		return $cuenta_ventassList;
	}


	public function getcuenta_comprassFKListSelectItem() 
	{
		$cuenta_comprassList=array();

		$item=null;

		foreach($this->cuenta_comprassFK as $cuenta_compras)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta_compras->getcodigo());
			$item->setValue($cuenta_compras->getId());
			$cuenta_comprassList[]=$item;
		}

		return $cuenta_comprassList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;
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
				$this->retencion_icaLogic->commitNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->rollbackNewConnexionToDeep();
				$this->retencion_icaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$retencion_icasNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->retencion_icas as $retencion_icaLocal) {
				if($retencion_icaLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->retencion_ica=new retencion_ica();
				
				$this->retencion_ica->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->retencion_icas[]=$this->retencion_ica;*/
				
				$retencion_icasNuevos[]=$this->retencion_ica;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('cuenta_ventas');$classes[]=$class;
				$class=new Classe('cuenta_compras');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->retencion_icaLogic->setretencion_icas($retencion_icasNuevos);
					
				$this->retencion_icaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($retencion_icasNuevos as $retencion_icaNuevo) {
					$this->retencion_icas[]=$retencion_icaNuevo;
				}
				
				/*$this->retencion_icas[]=$retencion_icasNuevos;*/
				
				$this->retencion_icaLogic->setretencion_icas($this->retencion_icas);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($retencion_icasNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));

		if($retencion_ica_session==null) {
			$retencion_ica_session=new retencion_ica_session();
		}
		
		if($retencion_ica_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($retencion_ica_session->bigidempresaActual!=null && $retencion_ica_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($retencion_ica_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=retencion_ica_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarComboscuenta_ventassFK($connexion=null,$strRecargarFkQuery=''){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$this->cuenta_ventassFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));

		if($retencion_ica_session==null) {
			$retencion_ica_session=new retencion_ica_session();
		}
		
		if($retencion_ica_session->bitBusquedaDesdeFKSesioncuenta_ventas!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcuenta=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta, '');
				$finalQueryGlobalcuenta.=cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta.$strRecargarFkQuery;		

				$cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscuenta_ventassFK($cuentaLogic->getcuentas());

		} else {
			$this->setVisibleBusquedasParacuenta_ventas(true);


			if($retencion_ica_session->bigidcuenta_ventasActual!=null && $retencion_ica_session->bigidcuenta_ventasActual > 0) {
				$cuentaLogic->getEntity($retencion_ica_session->bigidcuenta_ventasActual);//WithConnection

				$this->cuenta_ventassFK[$cuentaLogic->getcuenta()->getId()]=retencion_ica_util::getcuenta_ventasDescripcion($cuentaLogic->getcuenta());
				$this->idcuenta_ventasDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarComboscuenta_comprassFK($connexion=null,$strRecargarFkQuery=''){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$this->cuenta_comprassFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));

		if($retencion_ica_session==null) {
			$retencion_ica_session=new retencion_ica_session();
		}
		
		if($retencion_ica_session->bitBusquedaDesdeFKSesioncuenta_compras!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcuenta=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta, '');
				$finalQueryGlobalcuenta.=cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta.$strRecargarFkQuery;		

				$cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscuenta_comprassFK($cuentaLogic->getcuentas());

		} else {
			$this->setVisibleBusquedasParacuenta_compras(true);


			if($retencion_ica_session->bigidcuenta_comprasActual!=null && $retencion_ica_session->bigidcuenta_comprasActual > 0) {
				$cuentaLogic->getEntity($retencion_ica_session->bigidcuenta_comprasActual);//WithConnection

				$this->cuenta_comprassFK[$cuentaLogic->getcuenta()->getId()]=retencion_ica_util::getcuenta_comprasDescripcion($cuentaLogic->getcuenta());
				$this->idcuenta_comprasDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=retencion_ica_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararComboscuenta_ventassFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuenta_ventasDefaultFK==0) {
				$this->idcuenta_ventasDefaultFK=$cuentaLocal->getId();
			}

			$this->cuenta_ventassFK[$cuentaLocal->getId()]=retencion_ica_util::getcuenta_ventasDescripcion($cuentaLocal);
		}
	}

	public function prepararComboscuenta_comprassFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuenta_comprasDefaultFK==0) {
				$this->idcuenta_comprasDefaultFK=$cuentaLocal->getId();
			}

			$this->cuenta_comprassFK[$cuentaLocal->getId()]=retencion_ica_util::getcuenta_comprasDescripcion($cuentaLocal);
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

			$strDescripcionempresa=retencion_ica_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripcioncuenta_ventasFK($idcuenta,$connexion=null){
		$cuentaLogic= new cuenta_logic();
		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$strDescripcioncuenta='';

		if($idcuenta!=null && $idcuenta!='' && $idcuenta!='null') {
			if($connexion!=null) {
				$cuentaLogic->getEntity($idcuenta);//WithConnection
			} else {
				$cuentaLogic->getEntityWithConnection($idcuenta);//
			}

			$strDescripcioncuenta=retencion_ica_util::getcuenta_ventasDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	public function cargarDescripcioncuenta_comprasFK($idcuenta,$connexion=null){
		$cuentaLogic= new cuenta_logic();
		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$strDescripcioncuenta='';

		if($idcuenta!=null && $idcuenta!='' && $idcuenta!='null') {
			if($connexion!=null) {
				$cuentaLogic->getEntity($idcuenta);//WithConnection
			} else {
				$cuentaLogic->getEntityWithConnection($idcuenta);//
			}

			$strDescripcioncuenta=retencion_ica_util::getcuenta_comprasDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(retencion_ica $retencion_icaClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$retencion_icaClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
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

		$this->strVisibleFK_Idcuenta_compras=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idcuenta_ventas=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
	}

	public function setVisibleBusquedasParacuenta_ventas($isParacuenta_ventas){
		$strParaVisiblecuenta_ventas='display:table-row';
		$strParaVisibleNegacioncuenta_ventas='display:none';

		if($isParacuenta_ventas) {
			$strParaVisiblecuenta_ventas='display:table-row';
			$strParaVisibleNegacioncuenta_ventas='display:none';
		} else {
			$strParaVisiblecuenta_ventas='display:none';
			$strParaVisibleNegacioncuenta_ventas='display:table-row';
		}


		$strParaVisibleNegacioncuenta_ventas=trim($strParaVisibleNegacioncuenta_ventas);

		$this->strVisibleFK_Idcuenta_compras=$strParaVisibleNegacioncuenta_ventas;
		$this->strVisibleFK_Idcuenta_ventas=$strParaVisiblecuenta_ventas;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta_ventas;
	}

	public function setVisibleBusquedasParacuenta_compras($isParacuenta_compras){
		$strParaVisiblecuenta_compras='display:table-row';
		$strParaVisibleNegacioncuenta_compras='display:none';

		if($isParacuenta_compras) {
			$strParaVisiblecuenta_compras='display:table-row';
			$strParaVisibleNegacioncuenta_compras='display:none';
		} else {
			$strParaVisiblecuenta_compras='display:none';
			$strParaVisibleNegacioncuenta_compras='display:table-row';
		}


		$strParaVisibleNegacioncuenta_compras=trim($strParaVisibleNegacioncuenta_compras);

		$this->strVisibleFK_Idcuenta_compras=$strParaVisiblecuenta_compras;
		$this->strVisibleFK_Idcuenta_ventas=$strParaVisibleNegacioncuenta_compras;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta_compras;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idretencion_icaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idretencion_icaActual=$idretencion_icaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.retencion_icaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.retencion_icaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarretencion_ica,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_ventas() {//$idretencion_icaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idretencion_icaActual=$idretencion_icaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.retencion_icaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_ventas(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.retencion_icaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_ventas(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarretencion_ica,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_compras() {//$idretencion_icaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idretencion_icaActual=$idretencion_icaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.retencion_icaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_compras(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.retencion_icaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_compras(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarretencion_ica,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParaproveedores(int $idretencion_icaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idretencion_icaActual=$idretencion_icaActual;

		$bitPaginaPopupproveedor=false;

		try {

			$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));

			if($retencion_ica_session==null) {
				$retencion_ica_session=new retencion_ica_session();
			}

			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
			}

			$proveedor_session->strUltimaBusqueda='FK_Idretencion_ica';
			$proveedor_session->strPathNavegacionActual=$retencion_ica_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.proveedor_util::$STR_CLASS_WEB_TITULO;
			$proveedor_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupproveedor=$proveedor_session->bitPaginaPopup;
			$proveedor_session->setPaginaPopupVariables(true);
			$bitPaginaPopupproveedor=$proveedor_session->bitPaginaPopup;
			$proveedor_session->bitPermiteNavegacionHaciaFKDesde=false;
			$proveedor_session->strNombrePaginaNavegacionHaciaFKDesde=retencion_ica_util::$STR_NOMBRE_OPCION;
			$proveedor_session->bitBusquedaDesdeFKSesionretencion_ica=true;
			$proveedor_session->bigidretencion_icaActual=$this->idretencion_icaActual;

			$retencion_ica_session->bitBusquedaDesdeFKSesionFK=true;
			$retencion_ica_session->bigIdActualFK=$this->idretencion_icaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"proveedor"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=retencion_ica_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"proveedor"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(retencion_ica_util::$STR_SESSION_NAME,serialize($retencion_ica_session));
			$this->Session->write(proveedor_util::$STR_SESSION_NAME,serialize($proveedor_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupproveedor!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'facturacion','','POPUP',$this->strTipoPaginaAuxiliarretencion_ica,$this->strTipoUsuarioAuxiliarretencion_ica,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'facturacion','','NO-POPUP',$this->strTipoPaginaAuxiliarretencion_ica,$this->strTipoUsuarioAuxiliarretencion_ica,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaclientes(int $idretencion_icaActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idretencion_icaActual=$idretencion_icaActual;

		$bitPaginaPopupcliente=false;

		try {

			$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));

			if($retencion_ica_session==null) {
				$retencion_ica_session=new retencion_ica_session();
			}

			$cliente_session=unserialize($this->Session->read(cliente_util::$STR_SESSION_NAME));

			if($cliente_session==null) {
				$cliente_session=new cliente_session();
			}

			$cliente_session->strUltimaBusqueda='FK_Idretencion_ica';
			$cliente_session->strPathNavegacionActual=$retencion_ica_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.cliente_util::$STR_CLASS_WEB_TITULO;
			$cliente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcliente=$cliente_session->bitPaginaPopup;
			$cliente_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcliente=$cliente_session->bitPaginaPopup;
			$cliente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$cliente_session->strNombrePaginaNavegacionHaciaFKDesde=retencion_ica_util::$STR_NOMBRE_OPCION;
			$cliente_session->bitBusquedaDesdeFKSesionretencion_ica=true;
			$cliente_session->bigidretencion_icaActual=$this->idretencion_icaActual;

			$retencion_ica_session->bitBusquedaDesdeFKSesionFK=true;
			$retencion_ica_session->bigIdActualFK=$this->idretencion_icaActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"cliente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=retencion_ica_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"cliente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(retencion_ica_util::$STR_SESSION_NAME,serialize($retencion_ica_session));
			$this->Session->write(cliente_util::$STR_SESSION_NAME,serialize($cliente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcliente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME,'facturacion','','POPUP',$this->strTipoPaginaAuxiliarretencion_ica,$this->strTipoUsuarioAuxiliarretencion_ica,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME,'facturacion','','NO-POPUP',$this->strTipoPaginaAuxiliarretencion_ica,$this->strTipoUsuarioAuxiliarretencion_ica,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(retencion_ica_util::$STR_SESSION_NAME,retencion_ica_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$retencion_ica_session=$this->Session->read(retencion_ica_util::$STR_SESSION_NAME);
				
		if($retencion_ica_session==null) {
			$retencion_ica_session=new retencion_ica_session();		
			//$this->Session->write('retencion_ica_session',$retencion_ica_session);							
		}
		*/
		
		$retencion_ica_session=new retencion_ica_session();
    	$retencion_ica_session->strPathNavegacionActual=retencion_ica_util::$STR_CLASS_WEB_TITULO;
    	$retencion_ica_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(retencion_ica_util::$STR_SESSION_NAME,serialize($retencion_ica_session));		
	}	
	
	public function getSetBusquedasSesionConfig(retencion_ica_session $retencion_ica_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($retencion_ica_session->bitBusquedaDesdeFKSesionFK!=null && $retencion_ica_session->bitBusquedaDesdeFKSesionFK==true) {
			if($retencion_ica_session->bigIdActualFK!=null && $retencion_ica_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$retencion_ica_session->bigIdActualFKParaPosibleAtras=$retencion_ica_session->bigIdActualFK;*/
			}
				
			$retencion_ica_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$retencion_ica_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(retencion_ica_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($retencion_ica_session->bitBusquedaDesdeFKSesionempresa!=null && $retencion_ica_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($retencion_ica_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(retencion_ica_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(retencion_ica_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(retencion_ica_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($retencion_ica_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($retencion_ica_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=retencion_ica_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$retencion_ica_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$retencion_ica_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;

				if($retencion_ica_session->intNumeroPaginacion==retencion_ica_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$retencion_ica_session->intNumeroPaginacion;
				}
			}
			else if($retencion_ica_session->bitBusquedaDesdeFKSesioncuenta_ventas!=null && $retencion_ica_session->bitBusquedaDesdeFKSesioncuenta_ventas==true)
			{
				if($retencion_ica_session->bigidcuenta_ventasActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_ventas';

					$existe_history=HistoryWeb::ExisteElemento(retencion_ica_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(retencion_ica_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(retencion_ica_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($retencion_ica_session->bigidcuenta_ventasActualDescripcion);
						$historyWeb->setIdActual($retencion_ica_session->bigidcuenta_ventasActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=retencion_ica_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$retencion_ica_session->bigidcuenta_ventasActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$retencion_ica_session->bitBusquedaDesdeFKSesioncuenta_ventas=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;

				if($retencion_ica_session->intNumeroPaginacion==retencion_ica_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$retencion_ica_session->intNumeroPaginacion;
				}
			}
			else if($retencion_ica_session->bitBusquedaDesdeFKSesioncuenta_compras!=null && $retencion_ica_session->bitBusquedaDesdeFKSesioncuenta_compras==true)
			{
				if($retencion_ica_session->bigidcuenta_comprasActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_compras';

					$existe_history=HistoryWeb::ExisteElemento(retencion_ica_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(retencion_ica_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(retencion_ica_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($retencion_ica_session->bigidcuenta_comprasActualDescripcion);
						$historyWeb->setIdActual($retencion_ica_session->bigidcuenta_comprasActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=retencion_ica_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$retencion_ica_session->bigidcuenta_comprasActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$retencion_ica_session->bitBusquedaDesdeFKSesioncuenta_compras=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;

				if($retencion_ica_session->intNumeroPaginacion==retencion_ica_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=retencion_ica_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$retencion_ica_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$retencion_ica_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));
		
		if($retencion_ica_session==null) {
			$retencion_ica_session=new retencion_ica_session();
		}
		
		$retencion_ica_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$retencion_ica_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$retencion_ica_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcuenta_compras') {
			$retencion_ica_session->id_cuenta_compras=$this->id_cuenta_comprasFK_Idcuenta_compras;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta_ventas') {
			$retencion_ica_session->id_cuenta_ventas=$this->id_cuenta_ventasFK_Idcuenta_ventas;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$retencion_ica_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		
		$this->Session->write(retencion_ica_util::$STR_SESSION_NAME,serialize($retencion_ica_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(retencion_ica_session $retencion_ica_session) {
		
		if($retencion_ica_session==null) {
			$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));
		}
		
		if($retencion_ica_session==null) {
		   $retencion_ica_session=new retencion_ica_session();
		}
		
		if($retencion_ica_session->strUltimaBusqueda!=null && $retencion_ica_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$retencion_ica_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$retencion_ica_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$retencion_ica_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcuenta_compras') {
				$this->id_cuenta_comprasFK_Idcuenta_compras=$retencion_ica_session->id_cuenta_compras;
				$retencion_ica_session->id_cuenta_compras=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta_ventas') {
				$this->id_cuenta_ventasFK_Idcuenta_ventas=$retencion_ica_session->id_cuenta_ventas;
				$retencion_ica_session->id_cuenta_ventas=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$retencion_ica_session->id_empresa;
				$retencion_ica_session->id_empresa=-1;

			}
		}
		
		$retencion_ica_session->strUltimaBusqueda='';
		//$retencion_ica_session->intNumeroPaginacion=10;
		$retencion_ica_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(retencion_ica_util::$STR_SESSION_NAME,serialize($retencion_ica_session));		
	}
	
	public function retencion_icasControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idcuenta_ventasDefaultFK = 0;
		$this->idcuenta_comprasDefaultFK = 0;
	}
	
	public function setretencion_icaFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_ventas',$this->idcuenta_ventasDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_compras',$this->idcuenta_comprasDefaultFK);
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

		cuenta::$class;
		cuenta_carga::$CONTROLLER;
		
		//REL
		

		proveedor_carga::$CONTROLLER;
		proveedor_util::$STR_SCHEMA;
		proveedor_session::class;

		cliente_carga::$CONTROLLER;
		cliente_util::$STR_SCHEMA;
		cliente_session::class;
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
		interface retencion_ica_controlI {	
		
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
		
		public function onLoad(retencion_ica_session $retencion_ica_session=null);	
		function index(?string $strTypeOnLoadretencion_ica='',?string $strTipoPaginaAuxiliarretencion_ica='',?string $strTipoUsuarioAuxiliarretencion_ica='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadretencion_ica='',string $strTipoPaginaAuxiliarretencion_ica='',string $strTipoUsuarioAuxiliarretencion_ica='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($retencion_icaReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(retencion_ica $retencion_icaClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(retencion_ica_session $retencion_ica_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(retencion_ica_session $retencion_ica_session);	
		public function retencion_icasControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setretencion_icaFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
