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

namespace com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\entity\clasificacion_cheque;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/clasificacion_cheque/util/clasificacion_cheque_carga.php');
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_carga;

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_param_return;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\business\logic\clasificacion_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\session\clasificacion_cheque_session;


//FK


use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\entity\cuenta_corriente_detalle;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\business\logic\cuenta_corriente_detalle_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente_detalle\util\cuenta_corriente_detalle_util;

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\entity\categoria_cheque;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\logic\categoria_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
clasificacion_cheque_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
clasificacion_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
clasificacion_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
clasificacion_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*clasificacion_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentascorrientes/clasificacion_cheque/presentation/control/clasificacion_cheque_init_control.php');
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\control\clasificacion_cheque_init_control;

include_once('com/bydan/contabilidad/cuentascorrientes/clasificacion_cheque/presentation/control/clasificacion_cheque_base_control.php');
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\control\clasificacion_cheque_base_control;

class clasificacion_cheque_control extends clasificacion_cheque_base_control {	
	
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
			
			
			else if($action=="FK_Idcategoria_cheque"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcategoria_chequeParaProcesar();
			}
			else if($action=="FK_Idcuenta_corriente_detalle"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcuenta_corriente_detalleParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParacuenta_corriente_detalle') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclasificacion_chequeActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_corriente_detalle();//$idclasificacion_chequeActual
			}
			else if($action=='abrirBusquedaParacategoria_cheque') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idclasificacion_chequeActual=$this->getDataId();
				$this->abrirBusquedaParacategoria_cheque();//$idclasificacion_chequeActual
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
					
					$clasificacion_chequeController = new clasificacion_cheque_control();
					
					$clasificacion_chequeController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($clasificacion_chequeController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$clasificacion_chequeController = new clasificacion_cheque_control();
						$clasificacion_chequeController = $this;
						
						$jsonResponse = json_encode($clasificacion_chequeController->clasificacion_cheques);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->clasificacion_chequeReturnGeneral==null) {
					$this->clasificacion_chequeReturnGeneral=new clasificacion_cheque_param_return();
				}
				
				echo($this->clasificacion_chequeReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$clasificacion_chequeController=new clasificacion_cheque_control();
		
		$clasificacion_chequeController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$clasificacion_chequeController->usuarioActual=new usuario();
		
		$clasificacion_chequeController->usuarioActual->setId($this->usuarioActual->getId());
		$clasificacion_chequeController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$clasificacion_chequeController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$clasificacion_chequeController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$clasificacion_chequeController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$clasificacion_chequeController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$clasificacion_chequeController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$clasificacion_chequeController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $clasificacion_chequeController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadclasificacion_cheque= $this->getDataGeneralString('strTypeOnLoadclasificacion_cheque');
		$strTipoPaginaAuxiliarclasificacion_cheque= $this->getDataGeneralString('strTipoPaginaAuxiliarclasificacion_cheque');
		$strTipoUsuarioAuxiliarclasificacion_cheque= $this->getDataGeneralString('strTipoUsuarioAuxiliarclasificacion_cheque');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadclasificacion_cheque,$strTipoPaginaAuxiliarclasificacion_cheque,$strTipoUsuarioAuxiliarclasificacion_cheque,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadclasificacion_cheque!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('clasificacion_cheque','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(clasificacion_cheque_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarclasificacion_cheque,$this->strTipoUsuarioAuxiliarclasificacion_cheque,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(clasificacion_cheque_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarclasificacion_cheque,$this->strTipoUsuarioAuxiliarclasificacion_cheque,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->clasificacion_chequeReturnGeneral=new clasificacion_cheque_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->clasificacion_chequeReturnGeneral->conGuardarReturnSessionJs=true;
		$this->clasificacion_chequeReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->clasificacion_chequeReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->clasificacion_chequeReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->clasificacion_chequeReturnGeneral);
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
		$this->clasificacion_chequeReturnGeneral=new clasificacion_cheque_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->clasificacion_chequeReturnGeneral->conGuardarReturnSessionJs=true;
		$this->clasificacion_chequeReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->clasificacion_chequeReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->clasificacion_chequeReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->clasificacion_chequeReturnGeneral);
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
		$this->clasificacion_chequeReturnGeneral=new clasificacion_cheque_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->clasificacion_chequeReturnGeneral->conGuardarReturnSessionJs=true;
		$this->clasificacion_chequeReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->clasificacion_chequeReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->clasificacion_chequeReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->clasificacion_chequeReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
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
			
			
			$this->clasificacion_chequeReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->clasificacion_chequeReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->clasificacion_chequeReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->clasificacion_chequeReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->clasificacion_chequeReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->clasificacion_chequeReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->clasificacion_chequeReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->clasificacion_chequeReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->clasificacion_chequeReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->clasificacion_chequeReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->clasificacion_chequeReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->clasificacion_chequeReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->clasificacion_chequeReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->clasificacion_chequeReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->clasificacion_chequeReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->clasificacion_chequeReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->clasificacion_chequeReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->clasificacion_chequeReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
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
		
		$this->clasificacion_chequeLogic=new clasificacion_cheque_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->clasificacion_cheque=new clasificacion_cheque();
		
		$this->strTypeOnLoadclasificacion_cheque='onload';
		$this->strTipoPaginaAuxiliarclasificacion_cheque='none';
		$this->strTipoUsuarioAuxiliarclasificacion_cheque='none';	

		$this->intNumeroPaginacion=clasificacion_cheque_util::$INT_NUMERO_PAGINACION;
		
		$this->clasificacion_chequeModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->clasificacion_chequeControllerAdditional=new clasificacion_cheque_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(clasificacion_cheque_session $clasificacion_cheque_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($clasificacion_cheque_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadclasificacion_cheque='',?string $strTipoPaginaAuxiliarclasificacion_cheque='',?string $strTipoUsuarioAuxiliarclasificacion_cheque='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadclasificacion_cheque=$strTypeOnLoadclasificacion_cheque;
			$this->strTipoPaginaAuxiliarclasificacion_cheque=$strTipoPaginaAuxiliarclasificacion_cheque;
			$this->strTipoUsuarioAuxiliarclasificacion_cheque=$strTipoUsuarioAuxiliarclasificacion_cheque;
	
			if($strTipoUsuarioAuxiliarclasificacion_cheque=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->clasificacion_cheque=new clasificacion_cheque();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Clasificacion Cheques';
			
			
			$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));
							
			if($clasificacion_cheque_session==null) {
				$clasificacion_cheque_session=new clasificacion_cheque_session();
				
				/*$this->Session->write('clasificacion_cheque_session',$clasificacion_cheque_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($clasificacion_cheque_session->strFuncionJsPadre!=null && $clasificacion_cheque_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$clasificacion_cheque_session->strFuncionJsPadre;
				
				$clasificacion_cheque_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($clasificacion_cheque_session);
			
			if($strTypeOnLoadclasificacion_cheque!=null && $strTypeOnLoadclasificacion_cheque=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$clasificacion_cheque_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$clasificacion_cheque_session->setPaginaPopupVariables(true);
				}
				
				if($clasificacion_cheque_session->intNumeroPaginacion==clasificacion_cheque_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=clasificacion_cheque_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$clasificacion_cheque_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,clasificacion_cheque_util::$STR_SESSION_NAME,'cuentascorrientes');																
			
			} else if($strTypeOnLoadclasificacion_cheque!=null && $strTypeOnLoadclasificacion_cheque=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$clasificacion_cheque_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=clasificacion_cheque_util::$INT_NUMERO_PAGINACION;*/
				
				if($clasificacion_cheque_session->intNumeroPaginacion==clasificacion_cheque_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=clasificacion_cheque_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$clasificacion_cheque_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarclasificacion_cheque!=null && $strTipoPaginaAuxiliarclasificacion_cheque=='none') {
				/*$clasificacion_cheque_session->strStyleDivHeader='display:table-row';*/
				
				/*$clasificacion_cheque_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarclasificacion_cheque!=null && $strTipoPaginaAuxiliarclasificacion_cheque=='iframe') {
					/*
					$clasificacion_cheque_session->strStyleDivArbol='display:none';
					$clasificacion_cheque_session->strStyleDivHeader='display:none';
					$clasificacion_cheque_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$clasificacion_cheque_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->clasificacion_chequeClase=new clasificacion_cheque();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=clasificacion_cheque_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(clasificacion_cheque_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->clasificacion_chequeLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->clasificacion_chequeLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->clasificacion_chequeLogic=new clasificacion_cheque_logic();*/
			
			
			$this->clasificacion_chequesModel=null;
			/*new ListDataModel();*/
			
			/*$this->clasificacion_chequesModel.setWrappedData(clasificacion_chequeLogic->getclasificacion_cheques());*/
						
			$this->clasificacion_cheques= array();
			$this->clasificacion_chequesEliminados=array();
			$this->clasificacion_chequesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= clasificacion_cheque_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->clasificacion_cheque= new clasificacion_cheque();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcategoria_cheque='display:table-row';
			$this->strVisibleFK_Idcuenta_corriente_detalle='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarclasificacion_cheque!=null && $strTipoUsuarioAuxiliarclasificacion_cheque!='none' && $strTipoUsuarioAuxiliarclasificacion_cheque!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarclasificacion_cheque);
																
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
				if($strTipoUsuarioAuxiliarclasificacion_cheque!=null && $strTipoUsuarioAuxiliarclasificacion_cheque!='none' && $strTipoUsuarioAuxiliarclasificacion_cheque!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarclasificacion_cheque);
																
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
				if($strTipoUsuarioAuxiliarclasificacion_cheque==null || $strTipoUsuarioAuxiliarclasificacion_cheque=='none' || $strTipoUsuarioAuxiliarclasificacion_cheque=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarclasificacion_cheque,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, clasificacion_cheque_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, clasificacion_cheque_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina clasificacion_cheque');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($clasificacion_cheque_session);
			
			$this->getSetBusquedasSesionConfig($clasificacion_cheque_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteclasificacion_cheques($this->strAccionBusqueda,$this->clasificacion_chequeLogic->getclasificacion_cheques());*/
				} else if($this->strGenerarReporte=='Html')	{
					$clasificacion_cheque_session->strServletGenerarHtmlReporte='clasificacion_chequeServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(clasificacion_cheque_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(clasificacion_cheque_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($clasificacion_cheque_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarclasificacion_cheque!=null && $strTipoUsuarioAuxiliarclasificacion_cheque=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($clasificacion_cheque_session);
			}
								
			$this->set(clasificacion_cheque_util::$STR_SESSION_NAME, $clasificacion_cheque_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($clasificacion_cheque_session);
			
			/*
			$this->clasificacion_cheque->recursive = 0;
			
			$this->clasificacion_cheques=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('clasificacion_cheques', $this->clasificacion_cheques);
			
			$this->set(clasificacion_cheque_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->clasificacion_chequeActual =$this->clasificacion_chequeClase;
			
			/*$this->clasificacion_chequeActual =$this->migrarModelclasificacion_cheque($this->clasificacion_chequeClase);*/
			
			$this->returnHtml(false);
			
			$this->set(clasificacion_cheque_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=clasificacion_cheque_util::$STR_NOMBRE_OPCION;
				
			if(clasificacion_cheque_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=clasificacion_cheque_util::$STR_MODULO_OPCION.clasificacion_cheque_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(clasificacion_cheque_util::$STR_SESSION_NAME,serialize($clasificacion_cheque_session));
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
			/*$clasificacion_chequeClase= (clasificacion_cheque) clasificacion_chequesModel.getRowData();*/
			
			$this->clasificacion_chequeClase->setId($this->clasificacion_cheque->getId());	
			$this->clasificacion_chequeClase->setVersionRow($this->clasificacion_cheque->getVersionRow());	
			$this->clasificacion_chequeClase->setVersionRow($this->clasificacion_cheque->getVersionRow());	
			$this->clasificacion_chequeClase->setid_cuenta_corriente_detalle($this->clasificacion_cheque->getid_cuenta_corriente_detalle());	
			$this->clasificacion_chequeClase->setid_categoria_cheque($this->clasificacion_cheque->getid_categoria_cheque());	
			$this->clasificacion_chequeClase->setmonto($this->clasificacion_cheque->getmonto());	
		
			/*$this->Session->write('clasificacion_chequeVersionRowActual', clasificacion_cheque.getVersionRow());*/
			
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
			
			$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));
						
			if($clasificacion_cheque_session==null) {
				$clasificacion_cheque_session=new clasificacion_cheque_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('clasificacion_cheque', $this->clasificacion_cheque->read(null, $id));
	
			
			$this->clasificacion_cheque->recursive = 0;
			
			$this->clasificacion_cheques=$this->paginate();
			
			$this->set('clasificacion_cheques', $this->clasificacion_cheques);
	
			if (empty($this->data)) {
				$this->data = $this->clasificacion_cheque->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->clasificacion_chequeLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->clasificacion_chequeClase);
			
			$this->clasificacion_chequeActual=$this->clasificacion_chequeClase;
			
			/*$this->clasificacion_chequeActual =$this->migrarModelclasificacion_cheque($this->clasificacion_chequeClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->clasificacion_chequeLogic->getclasificacion_cheques(),$this->clasificacion_chequeActual);
			
			$this->actualizarControllerConReturnGeneral($this->clasificacion_chequeReturnGeneral);
			
			//$this->clasificacion_chequeReturnGeneral=$this->clasificacion_chequeLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->clasificacion_chequeLogic->getclasificacion_cheques(),$this->clasificacion_chequeActual,$this->clasificacion_chequeParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));
						
			if($clasificacion_cheque_session==null) {
				$clasificacion_cheque_session=new clasificacion_cheque_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoclasificacion_cheque', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->clasificacion_chequeClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->clasificacion_chequeClase);
			
			$this->clasificacion_chequeActual =$this->clasificacion_chequeClase;
			
			/*$this->clasificacion_chequeActual =$this->migrarModelclasificacion_cheque($this->clasificacion_chequeClase);*/
			
			$this->setclasificacion_chequeFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->clasificacion_chequeLogic->getclasificacion_cheques(),$this->clasificacion_cheque);
			
			$this->actualizarControllerConReturnGeneral($this->clasificacion_chequeReturnGeneral);
			
			//this->clasificacion_chequeReturnGeneral=$this->clasificacion_chequeLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->clasificacion_chequeLogic->getclasificacion_cheques(),$this->clasificacion_cheque,$this->clasificacion_chequeParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idcuenta_corriente_detalleDefaultFK!=null && $this->idcuenta_corriente_detalleDefaultFK > -1) {
				$this->clasificacion_chequeReturnGeneral->getclasificacion_cheque()->setid_cuenta_corriente_detalle($this->idcuenta_corriente_detalleDefaultFK);
			}

			if($this->idcategoria_chequeDefaultFK!=null && $this->idcategoria_chequeDefaultFK > -1) {
				$this->clasificacion_chequeReturnGeneral->getclasificacion_cheque()->setid_categoria_cheque($this->idcategoria_chequeDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->clasificacion_chequeReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->clasificacion_chequeReturnGeneral->getclasificacion_cheque(),$this->clasificacion_chequeActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyclasificacion_cheque($this->clasificacion_chequeReturnGeneral->getclasificacion_cheque());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioclasificacion_cheque($this->clasificacion_chequeReturnGeneral->getclasificacion_cheque());*/
			}
			
			if($this->clasificacion_chequeReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->clasificacion_chequeReturnGeneral->getclasificacion_cheque(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualclasificacion_cheque($this->clasificacion_cheque,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->clasificacion_chequesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->clasificacion_chequesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->clasificacion_chequesAuxiliar=array();
			}
			
			if(count($this->clasificacion_chequesAuxiliar)==2) {
				$clasificacion_chequeOrigen=$this->clasificacion_chequesAuxiliar[0];
				$clasificacion_chequeDestino=$this->clasificacion_chequesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($clasificacion_chequeOrigen,$clasificacion_chequeDestino,true,false,false);
				
				$this->actualizarLista($clasificacion_chequeDestino,$this->clasificacion_cheques);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->clasificacion_chequesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->clasificacion_chequesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->clasificacion_chequesAuxiliar=array();
			}
			
			if(count($this->clasificacion_chequesAuxiliar) > 0) {
				foreach ($this->clasificacion_chequesAuxiliar as $clasificacion_chequeSeleccionado) {
					$this->clasificacion_cheque=new clasificacion_cheque();
					
					$this->setCopiarVariablesObjetos($clasificacion_chequeSeleccionado,$this->clasificacion_cheque,true,true,false);
						
					$this->clasificacion_cheques[]=$this->clasificacion_cheque;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->clasificacion_chequesEliminados as $clasificacion_chequeEliminado) {
				$this->clasificacion_chequeLogic->clasificacion_cheques[]=$clasificacion_chequeEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->clasificacion_cheque=new clasificacion_cheque();
							
				$this->clasificacion_cheques[]=$this->clasificacion_cheque;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
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
		
		$clasificacion_chequeActual=new clasificacion_cheque();
		
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
				
				$clasificacion_chequeActual=$this->clasificacion_cheques[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $clasificacion_chequeActual->setid_cuenta_corriente_detalle((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $clasificacion_chequeActual->setid_categoria_cheque((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $clasificacion_chequeActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
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
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=clasificacion_cheque_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadclasificacion_cheque='',string $strTipoPaginaAuxiliarclasificacion_cheque='',string $strTipoUsuarioAuxiliarclasificacion_cheque='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadclasificacion_cheque,$strTipoPaginaAuxiliarclasificacion_cheque,$strTipoUsuarioAuxiliarclasificacion_cheque,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->clasificacion_cheques) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=clasificacion_cheque_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=clasificacion_cheque_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=clasificacion_cheque_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));
						
			if($clasificacion_cheque_session==null) {
				$clasificacion_cheque_session=new clasificacion_cheque_session();
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
					/*$this->intNumeroPaginacion=clasificacion_cheque_util::$INT_NUMERO_PAGINACION;*/
					
					if($clasificacion_cheque_session->intNumeroPaginacion==clasificacion_cheque_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=clasificacion_cheque_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$clasificacion_cheque_session->intNumeroPaginacion;
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
			
			$this->clasificacion_chequesEliminados=array();
			
			/*$this->clasificacion_chequeLogic->setConnexion($connexion);*/
			
			$this->clasificacion_chequeLogic->setIsConDeep(true);
			
			$this->clasificacion_chequeLogic->getclasificacion_chequeDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('cuenta_corriente_detalle');$classes[]=$class;
			$class=new Classe('categoria_cheque');$classes[]=$class;
			
			$this->clasificacion_chequeLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->clasificacion_chequeLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->clasificacion_chequeLogic->getclasificacion_cheques()==null|| count($this->clasificacion_chequeLogic->getclasificacion_cheques())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->clasificacion_cheques=$this->clasificacion_chequeLogic->getclasificacion_cheques();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->clasificacion_chequeLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->clasificacion_chequesReporte=$this->clasificacion_chequeLogic->getclasificacion_cheques();
									
						/*$this->generarReportes('Todos',$this->clasificacion_chequeLogic->getclasificacion_cheques());*/
					
						$this->clasificacion_chequeLogic->setclasificacion_cheques($this->clasificacion_cheques);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->clasificacion_chequeLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->clasificacion_chequeLogic->getclasificacion_cheques()==null|| count($this->clasificacion_chequeLogic->getclasificacion_cheques())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->clasificacion_cheques=$this->clasificacion_chequeLogic->getclasificacion_cheques();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->clasificacion_chequeLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->clasificacion_chequesReporte=$this->clasificacion_chequeLogic->getclasificacion_cheques();
									
						/*$this->generarReportes('Todos',$this->clasificacion_chequeLogic->getclasificacion_cheques());*/
					
						$this->clasificacion_chequeLogic->setclasificacion_cheques($this->clasificacion_cheques);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idclasificacion_cheque=0;*/
				
				if($clasificacion_cheque_session->bitBusquedaDesdeFKSesionFK!=null && $clasificacion_cheque_session->bitBusquedaDesdeFKSesionFK==true) {
					if($clasificacion_cheque_session->bigIdActualFK!=null && $clasificacion_cheque_session->bigIdActualFK!=0)	{
						$this->idclasificacion_cheque=$clasificacion_cheque_session->bigIdActualFK;	
					}
					
					$clasificacion_cheque_session->bitBusquedaDesdeFKSesionFK=false;
					
					$clasificacion_cheque_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idclasificacion_cheque=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idclasificacion_cheque=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->clasificacion_chequeLogic->getEntity($this->idclasificacion_cheque);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*clasificacion_chequeLogicAdditional::getDetalleIndicePorId($idclasificacion_cheque);*/

				
				if($this->clasificacion_chequeLogic->getclasificacion_cheque()!=null) {
					$this->clasificacion_chequeLogic->setclasificacion_cheques(array());
					$this->clasificacion_chequeLogic->clasificacion_cheques[]=$this->clasificacion_chequeLogic->getclasificacion_cheque();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcategoria_cheque')
			{

				if($clasificacion_cheque_session->bigidcategoria_chequeActual!=null && $clasificacion_cheque_session->bigidcategoria_chequeActual!=0)
				{
					$this->id_categoria_chequeFK_Idcategoria_cheque=$clasificacion_cheque_session->bigidcategoria_chequeActual;
					$clasificacion_cheque_session->bigidcategoria_chequeActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clasificacion_chequeLogic->getsFK_Idcategoria_cheque($finalQueryPaginacion,$this->pagination,$this->id_categoria_chequeFK_Idcategoria_cheque);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clasificacion_chequeLogicAdditional::getDetalleIndiceFK_Idcategoria_cheque($this->id_categoria_chequeFK_Idcategoria_cheque);


					if($this->clasificacion_chequeLogic->getclasificacion_cheques()==null || count($this->clasificacion_chequeLogic->getclasificacion_cheques())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clasificacion_cheques=$this->clasificacion_chequeLogic->getclasificacion_cheques();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clasificacion_chequeLogic->getsFK_Idcategoria_cheque('',$this->pagination,$this->id_categoria_chequeFK_Idcategoria_cheque);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clasificacion_chequesReporte=$this->clasificacion_chequeLogic->getclasificacion_cheques();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclasificacion_cheques("FK_Idcategoria_cheque",$this->clasificacion_chequeLogic->getclasificacion_cheques());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clasificacion_chequeLogic->setclasificacion_cheques($clasificacion_cheques);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta_corriente_detalle')
			{

				if($clasificacion_cheque_session->bigidcuenta_corriente_detalleActual!=null && $clasificacion_cheque_session->bigidcuenta_corriente_detalleActual!=0)
				{
					$this->id_cuenta_corriente_detalleFK_Idcuenta_corriente_detalle=$clasificacion_cheque_session->bigidcuenta_corriente_detalleActual;
					$clasificacion_cheque_session->bigidcuenta_corriente_detalleActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clasificacion_chequeLogic->getsFK_Idcuenta_corriente_detalle($finalQueryPaginacion,$this->pagination,$this->id_cuenta_corriente_detalleFK_Idcuenta_corriente_detalle);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//clasificacion_chequeLogicAdditional::getDetalleIndiceFK_Idcuenta_corriente_detalle($this->id_cuenta_corriente_detalleFK_Idcuenta_corriente_detalle);


					if($this->clasificacion_chequeLogic->getclasificacion_cheques()==null || count($this->clasificacion_chequeLogic->getclasificacion_cheques())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$clasificacion_cheques=$this->clasificacion_chequeLogic->getclasificacion_cheques();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->clasificacion_chequeLogic->getsFK_Idcuenta_corriente_detalle('',$this->pagination,$this->id_cuenta_corriente_detalleFK_Idcuenta_corriente_detalle);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->clasificacion_chequesReporte=$this->clasificacion_chequeLogic->getclasificacion_cheques();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteclasificacion_cheques("FK_Idcuenta_corriente_detalle",$this->clasificacion_chequeLogic->getclasificacion_cheques());

					if($this->strTipoPaginacion=='TODOS') {
						$this->clasificacion_chequeLogic->setclasificacion_cheques($clasificacion_cheques);
					}
				//}

			} 
		
		$clasificacion_cheque_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$clasificacion_cheque_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->clasificacion_chequeLogic->loadForeignsKeysDescription();*/
		
		$this->clasificacion_cheques=$this->clasificacion_chequeLogic->getclasificacion_cheques();
		
		if($this->clasificacion_chequesEliminados==null) {
			$this->clasificacion_chequesEliminados=array();
		}
		
		$this->Session->write(clasificacion_cheque_util::$STR_SESSION_NAME.'Lista',serialize($this->clasificacion_cheques));
		$this->Session->write(clasificacion_cheque_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->clasificacion_chequesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(clasificacion_cheque_util::$STR_SESSION_NAME,serialize($clasificacion_cheque_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idclasificacion_cheque=$idGeneral;
			
			$this->intNumeroPaginacion=clasificacion_cheque_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
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
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}

			if(count($this->clasificacion_cheques) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Idcategoria_chequeParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=clasificacion_cheque_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_categoria_chequeFK_Idcategoria_cheque=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcategoria_cheque','cmbid_categoria_cheque');

			$this->strAccionBusqueda='FK_Idcategoria_cheque';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idcuenta_corriente_detalleParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=clasificacion_cheque_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_corriente_detalleFK_Idcuenta_corriente_detalle=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_corriente_detalle','cmbid_cuenta_corriente_detalle');

			$this->strAccionBusqueda='FK_Idcuenta_corriente_detalle';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcategoria_cheque($strFinalQuery,$id_categoria_cheque)
	{
		try
		{

			$this->clasificacion_chequeLogic->getsFK_Idcategoria_cheque($strFinalQuery,new Pagination(),$id_categoria_cheque);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcuenta_corriente_detalle($strFinalQuery,$id_cuenta_corriente_detalle)
	{
		try
		{

			$this->clasificacion_chequeLogic->getsFK_Idcuenta_corriente_detalle($strFinalQuery,new Pagination(),$id_cuenta_corriente_detalle);
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
			
			
			$clasificacion_chequeForeignKey=new clasificacion_cheque_param_return(); //clasificacion_chequeForeignKey();
			
			$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));
						
			if($clasificacion_cheque_session==null) {
				$clasificacion_cheque_session=new clasificacion_cheque_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$clasificacion_chequeForeignKey=$this->clasificacion_chequeLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$clasificacion_cheque_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_corriente_detalle',$this->strRecargarFkTipos,',')) {
				$this->cuenta_corriente_detallesFK=$clasificacion_chequeForeignKey->cuenta_corriente_detallesFK;
				$this->idcuenta_corriente_detalleDefaultFK=$clasificacion_chequeForeignKey->idcuenta_corriente_detalleDefaultFK;
			}

			if($clasificacion_cheque_session->bitBusquedaDesdeFKSesioncuenta_corriente_detalle) {
				$this->setVisibleBusquedasParacuenta_corriente_detalle(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_categoria_cheque',$this->strRecargarFkTipos,',')) {
				$this->categoria_chequesFK=$clasificacion_chequeForeignKey->categoria_chequesFK;
				$this->idcategoria_chequeDefaultFK=$clasificacion_chequeForeignKey->idcategoria_chequeDefaultFK;
			}

			if($clasificacion_cheque_session->bitBusquedaDesdeFKSesioncategoria_cheque) {
				$this->setVisibleBusquedasParacategoria_cheque(true);
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
	
	function cargarCombosFKFromReturnGeneral($clasificacion_chequeReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$clasificacion_chequeReturnGeneral->strRecargarFkTipos;
			
			


			if($clasificacion_chequeReturnGeneral->con_cuenta_corriente_detallesFK==true) {
				$this->cuenta_corriente_detallesFK=$clasificacion_chequeReturnGeneral->cuenta_corriente_detallesFK;
				$this->idcuenta_corriente_detalleDefaultFK=$clasificacion_chequeReturnGeneral->idcuenta_corriente_detalleDefaultFK;
			}


			if($clasificacion_chequeReturnGeneral->con_categoria_chequesFK==true) {
				$this->categoria_chequesFK=$clasificacion_chequeReturnGeneral->categoria_chequesFK;
				$this->idcategoria_chequeDefaultFK=$clasificacion_chequeReturnGeneral->idcategoria_chequeDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(clasificacion_cheque_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));
		
		if($clasificacion_cheque_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($clasificacion_cheque_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta_corriente_detalle';
			}
			else if($clasificacion_cheque_session->getstrNombrePaginaNavegacionHaciaFKDesde()==categoria_cheque_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='categoria_cheque';
			}
			
			$clasificacion_cheque_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}						
			
			$this->clasificacion_chequesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->clasificacion_chequesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->clasificacion_chequesAuxiliar=array();
			}
			
			if(count($this->clasificacion_chequesAuxiliar) > 0) {
				
				foreach ($this->clasificacion_chequesAuxiliar as $clasificacion_chequeSeleccionado) {
					$this->eliminarTablaBase($clasificacion_chequeSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
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
	
	
	
	public function getcuenta_corriente_detallesFKListSelectItem() 
	{
		$cuenta_corriente_detallesList=array();

		$item=null;

		foreach($this->cuenta_corriente_detallesFK as $cuenta_corriente_detalle)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta_corriente_detalle>getId());
			$item->setValue($cuenta_corriente_detalle->getId());
			$cuenta_corriente_detallesList[]=$item;
		}

		return $cuenta_corriente_detallesList;
	}


	public function getcategoria_chequesFKListSelectItem() 
	{
		$categoria_chequesList=array();

		$item=null;

		foreach($this->categoria_chequesFK as $categoria_cheque)
		{
			$item=new SelectItem();
			$item->setLabel($categoria_cheque->getnombre());
			$item->setValue($categoria_cheque->getId());
			$categoria_chequesList[]=$item;
		}

		return $categoria_chequesList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=clasificacion_cheque_util::$INT_NUMERO_PAGINACION;
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
				$this->clasificacion_chequeLogic->commitNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->rollbackNewConnexionToDeep();
				$this->clasificacion_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$clasificacion_chequesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->clasificacion_cheques as $clasificacion_chequeLocal) {
				if($clasificacion_chequeLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->clasificacion_cheque=new clasificacion_cheque();
				
				$this->clasificacion_cheque->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->clasificacion_cheques[]=$this->clasificacion_cheque;*/
				
				$clasificacion_chequesNuevos[]=$this->clasificacion_cheque;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('cuenta_corriente_detalle');$classes[]=$class;
				$class=new Classe('categoria_cheque');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->clasificacion_chequeLogic->setclasificacion_cheques($clasificacion_chequesNuevos);
					
				$this->clasificacion_chequeLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($clasificacion_chequesNuevos as $clasificacion_chequeNuevo) {
					$this->clasificacion_cheques[]=$clasificacion_chequeNuevo;
				}
				
				/*$this->clasificacion_cheques[]=$clasificacion_chequesNuevos;*/
				
				$this->clasificacion_chequeLogic->setclasificacion_cheques($this->clasificacion_cheques);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($clasificacion_chequesNuevos!=null);
	}
					
	
	public function cargarComboscuenta_corriente_detallesFK($connexion=null,$strRecargarFkQuery=''){
		$cuenta_corriente_detalleLogic= new cuenta_corriente_detalle_logic();
		$pagination= new Pagination();
		$this->cuenta_corriente_detallesFK=array();

		$cuenta_corriente_detalleLogic->setConnexion($connexion);
		$cuenta_corriente_detalleLogic->getcuenta_corriente_detalleDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));

		if($clasificacion_cheque_session==null) {
			$clasificacion_cheque_session=new clasificacion_cheque_session();
		}
		
		if($clasificacion_cheque_session->bitBusquedaDesdeFKSesioncuenta_corriente_detalle!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_corriente_detalle_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcuenta_corriente_detalle=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta_corriente_detalle=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta_corriente_detalle, '');
				$finalQueryGlobalcuenta_corriente_detalle.=cuenta_corriente_detalle_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta_corriente_detalle.$strRecargarFkQuery;		

				$cuenta_corriente_detalleLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscuenta_corriente_detallesFK($cuenta_corriente_detalleLogic->getcuenta_corriente_detalles());

		} else {
			$this->setVisibleBusquedasParacuenta_corriente_detalle(true);


			if($clasificacion_cheque_session->bigidcuenta_corriente_detalleActual!=null && $clasificacion_cheque_session->bigidcuenta_corriente_detalleActual > 0) {
				$cuenta_corriente_detalleLogic->getEntity($clasificacion_cheque_session->bigidcuenta_corriente_detalleActual);//WithConnection

				$this->cuenta_corriente_detallesFK[$cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getId()]=clasificacion_cheque_util::getcuenta_corriente_detalleDescripcion($cuenta_corriente_detalleLogic->getcuenta_corriente_detalle());
				$this->idcuenta_corriente_detalleDefaultFK=$cuenta_corriente_detalleLogic->getcuenta_corriente_detalle()->getId();
			}
		}
	}

	public function cargarComboscategoria_chequesFK($connexion=null,$strRecargarFkQuery=''){
		$categoria_chequeLogic= new categoria_cheque_logic();
		$pagination= new Pagination();
		$this->categoria_chequesFK=array();

		$categoria_chequeLogic->setConnexion($connexion);
		$categoria_chequeLogic->getcategoria_chequeDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));

		if($clasificacion_cheque_session==null) {
			$clasificacion_cheque_session=new clasificacion_cheque_session();
		}
		
		if($clasificacion_cheque_session->bitBusquedaDesdeFKSesioncategoria_cheque!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=categoria_cheque_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcategoria_cheque=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcategoria_cheque=Funciones::GetFinalQueryAppend($finalQueryGlobalcategoria_cheque, '');
				$finalQueryGlobalcategoria_cheque.=categoria_cheque_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcategoria_cheque.$strRecargarFkQuery;		

				$categoria_chequeLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscategoria_chequesFK($categoria_chequeLogic->getcategoria_cheques());

		} else {
			$this->setVisibleBusquedasParacategoria_cheque(true);


			if($clasificacion_cheque_session->bigidcategoria_chequeActual!=null && $clasificacion_cheque_session->bigidcategoria_chequeActual > 0) {
				$categoria_chequeLogic->getEntity($clasificacion_cheque_session->bigidcategoria_chequeActual);//WithConnection

				$this->categoria_chequesFK[$categoria_chequeLogic->getcategoria_cheque()->getId()]=clasificacion_cheque_util::getcategoria_chequeDescripcion($categoria_chequeLogic->getcategoria_cheque());
				$this->idcategoria_chequeDefaultFK=$categoria_chequeLogic->getcategoria_cheque()->getId();
			}
		}
	}

	
	
	public function prepararComboscuenta_corriente_detallesFK($cuenta_corriente_detalles){

		foreach ($cuenta_corriente_detalles as $cuenta_corriente_detalleLocal ) {
			if($this->idcuenta_corriente_detalleDefaultFK==0) {
				$this->idcuenta_corriente_detalleDefaultFK=$cuenta_corriente_detalleLocal->getId();
			}

			$this->cuenta_corriente_detallesFK[$cuenta_corriente_detalleLocal->getId()]=clasificacion_cheque_util::getcuenta_corriente_detalleDescripcion($cuenta_corriente_detalleLocal);
		}
	}

	public function prepararComboscategoria_chequesFK($categoria_cheques){

		foreach ($categoria_cheques as $categoria_chequeLocal ) {
			if($this->idcategoria_chequeDefaultFK==0) {
				$this->idcategoria_chequeDefaultFK=$categoria_chequeLocal->getId();
			}

			$this->categoria_chequesFK[$categoria_chequeLocal->getId()]=clasificacion_cheque_util::getcategoria_chequeDescripcion($categoria_chequeLocal);
		}
	}

	
	
	public function cargarDescripcioncuenta_corriente_detalleFK($idcuenta_corriente_detalle,$connexion=null){
		$cuenta_corriente_detalleLogic= new cuenta_corriente_detalle_logic();
		$cuenta_corriente_detalleLogic->setConnexion($connexion);
		$cuenta_corriente_detalleLogic->getcuenta_corriente_detalleDataAccess()->isForFKData=true;
		$strDescripcioncuenta_corriente_detalle='';

		if($idcuenta_corriente_detalle!=null && $idcuenta_corriente_detalle!='' && $idcuenta_corriente_detalle!='null') {
			if($connexion!=null) {
				$cuenta_corriente_detalleLogic->getEntity($idcuenta_corriente_detalle);//WithConnection
			} else {
				$cuenta_corriente_detalleLogic->getEntityWithConnection($idcuenta_corriente_detalle);//
			}

			$strDescripcioncuenta_corriente_detalle=clasificacion_cheque_util::getcuenta_corriente_detalleDescripcion($cuenta_corriente_detalleLogic->getcuenta_corriente_detalle());

		} else {
			$strDescripcioncuenta_corriente_detalle='null';
		}

		return $strDescripcioncuenta_corriente_detalle;
	}

	public function cargarDescripcioncategoria_chequeFK($idcategoria_cheque,$connexion=null){
		$categoria_chequeLogic= new categoria_cheque_logic();
		$categoria_chequeLogic->setConnexion($connexion);
		$categoria_chequeLogic->getcategoria_chequeDataAccess()->isForFKData=true;
		$strDescripcioncategoria_cheque='';

		if($idcategoria_cheque!=null && $idcategoria_cheque!='' && $idcategoria_cheque!='null') {
			if($connexion!=null) {
				$categoria_chequeLogic->getEntity($idcategoria_cheque);//WithConnection
			} else {
				$categoria_chequeLogic->getEntityWithConnection($idcategoria_cheque);//
			}

			$strDescripcioncategoria_cheque=clasificacion_cheque_util::getcategoria_chequeDescripcion($categoria_chequeLogic->getcategoria_cheque());

		} else {
			$strDescripcioncategoria_cheque='null';
		}

		return $strDescripcioncategoria_cheque;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(clasificacion_cheque $clasificacion_chequeClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	

	public function setVisibleBusquedasParacuenta_corriente_detalle($isParacuenta_corriente_detalle){
		$strParaVisiblecuenta_corriente_detalle='display:table-row';
		$strParaVisibleNegacioncuenta_corriente_detalle='display:none';

		if($isParacuenta_corriente_detalle) {
			$strParaVisiblecuenta_corriente_detalle='display:table-row';
			$strParaVisibleNegacioncuenta_corriente_detalle='display:none';
		} else {
			$strParaVisiblecuenta_corriente_detalle='display:none';
			$strParaVisibleNegacioncuenta_corriente_detalle='display:table-row';
		}


		$strParaVisibleNegacioncuenta_corriente_detalle=trim($strParaVisibleNegacioncuenta_corriente_detalle);

		$this->strVisibleFK_Idcategoria_cheque=$strParaVisibleNegacioncuenta_corriente_detalle;
		$this->strVisibleFK_Idcuenta_corriente_detalle=$strParaVisiblecuenta_corriente_detalle;
	}

	public function setVisibleBusquedasParacategoria_cheque($isParacategoria_cheque){
		$strParaVisiblecategoria_cheque='display:table-row';
		$strParaVisibleNegacioncategoria_cheque='display:none';

		if($isParacategoria_cheque) {
			$strParaVisiblecategoria_cheque='display:table-row';
			$strParaVisibleNegacioncategoria_cheque='display:none';
		} else {
			$strParaVisiblecategoria_cheque='display:none';
			$strParaVisibleNegacioncategoria_cheque='display:table-row';
		}


		$strParaVisibleNegacioncategoria_cheque=trim($strParaVisibleNegacioncategoria_cheque);

		$this->strVisibleFK_Idcategoria_cheque=$strParaVisiblecategoria_cheque;
		$this->strVisibleFK_Idcuenta_corriente_detalle=$strParaVisibleNegacioncategoria_cheque;
	}
	
	

	public function abrirBusquedaParacuenta_corriente_detalle() {//$idclasificacion_chequeActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclasificacion_chequeActual=$idclasificacion_chequeActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_corriente_detalle_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clasificacion_chequeJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_corriente_detalle(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_corriente_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clasificacion_chequeJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_corriente_detalle(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_corriente_detalle_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP','iframe',$this->strTipoUsuarioAuxiliarclasificacion_cheque,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacategoria_cheque() {//$idclasificacion_chequeActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idclasificacion_chequeActual=$idclasificacion_chequeActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.categoria_cheque_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.clasificacion_chequeJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_categoria_cheque(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',categoria_cheque_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.clasificacion_chequeJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_categoria_cheque(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(categoria_cheque_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP','iframe',$this->strTipoUsuarioAuxiliarclasificacion_cheque,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(clasificacion_cheque_util::$STR_SESSION_NAME,clasificacion_cheque_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$clasificacion_cheque_session=$this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME);
				
		if($clasificacion_cheque_session==null) {
			$clasificacion_cheque_session=new clasificacion_cheque_session();		
			//$this->Session->write('clasificacion_cheque_session',$clasificacion_cheque_session);							
		}
		*/
		
		$clasificacion_cheque_session=new clasificacion_cheque_session();
    	$clasificacion_cheque_session->strPathNavegacionActual=clasificacion_cheque_util::$STR_CLASS_WEB_TITULO;
    	$clasificacion_cheque_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(clasificacion_cheque_util::$STR_SESSION_NAME,serialize($clasificacion_cheque_session));		
	}	
	
	public function getSetBusquedasSesionConfig(clasificacion_cheque_session $clasificacion_cheque_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($clasificacion_cheque_session->bitBusquedaDesdeFKSesionFK!=null && $clasificacion_cheque_session->bitBusquedaDesdeFKSesionFK==true) {
			if($clasificacion_cheque_session->bigIdActualFK!=null && $clasificacion_cheque_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$clasificacion_cheque_session->bigIdActualFKParaPosibleAtras=$clasificacion_cheque_session->bigIdActualFK;*/
			}
				
			$clasificacion_cheque_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$clasificacion_cheque_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(clasificacion_cheque_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($clasificacion_cheque_session->bitBusquedaDesdeFKSesioncuenta_corriente_detalle!=null && $clasificacion_cheque_session->bitBusquedaDesdeFKSesioncuenta_corriente_detalle==true)
			{
				if($clasificacion_cheque_session->bigidcuenta_corriente_detalleActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_corriente_detalle';

					$existe_history=HistoryWeb::ExisteElemento(clasificacion_cheque_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(clasificacion_cheque_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(clasificacion_cheque_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($clasificacion_cheque_session->bigidcuenta_corriente_detalleActualDescripcion);
						$historyWeb->setIdActual($clasificacion_cheque_session->bigidcuenta_corriente_detalleActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=clasificacion_cheque_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$clasificacion_cheque_session->bigidcuenta_corriente_detalleActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$clasificacion_cheque_session->bitBusquedaDesdeFKSesioncuenta_corriente_detalle=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=clasificacion_cheque_util::$INT_NUMERO_PAGINACION;

				if($clasificacion_cheque_session->intNumeroPaginacion==clasificacion_cheque_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=clasificacion_cheque_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$clasificacion_cheque_session->intNumeroPaginacion;
				}
			}
			else if($clasificacion_cheque_session->bitBusquedaDesdeFKSesioncategoria_cheque!=null && $clasificacion_cheque_session->bitBusquedaDesdeFKSesioncategoria_cheque==true)
			{
				if($clasificacion_cheque_session->bigidcategoria_chequeActual!=0) {
					$this->strAccionBusqueda='FK_Idcategoria_cheque';

					$existe_history=HistoryWeb::ExisteElemento(clasificacion_cheque_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(clasificacion_cheque_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(clasificacion_cheque_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($clasificacion_cheque_session->bigidcategoria_chequeActualDescripcion);
						$historyWeb->setIdActual($clasificacion_cheque_session->bigidcategoria_chequeActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=clasificacion_cheque_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$clasificacion_cheque_session->bigidcategoria_chequeActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$clasificacion_cheque_session->bitBusquedaDesdeFKSesioncategoria_cheque=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=clasificacion_cheque_util::$INT_NUMERO_PAGINACION;

				if($clasificacion_cheque_session->intNumeroPaginacion==clasificacion_cheque_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=clasificacion_cheque_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$clasificacion_cheque_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$clasificacion_cheque_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));
		
		if($clasificacion_cheque_session==null) {
			$clasificacion_cheque_session=new clasificacion_cheque_session();
		}
		
		$clasificacion_cheque_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$clasificacion_cheque_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$clasificacion_cheque_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcategoria_cheque') {
			$clasificacion_cheque_session->id_categoria_cheque=$this->id_categoria_chequeFK_Idcategoria_cheque;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta_corriente_detalle') {
			$clasificacion_cheque_session->id_cuenta_corriente_detalle=$this->id_cuenta_corriente_detalleFK_Idcuenta_corriente_detalle;	

		}
		
		$this->Session->write(clasificacion_cheque_util::$STR_SESSION_NAME,serialize($clasificacion_cheque_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(clasificacion_cheque_session $clasificacion_cheque_session) {
		
		if($clasificacion_cheque_session==null) {
			$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));
		}
		
		if($clasificacion_cheque_session==null) {
		   $clasificacion_cheque_session=new clasificacion_cheque_session();
		}
		
		if($clasificacion_cheque_session->strUltimaBusqueda!=null && $clasificacion_cheque_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$clasificacion_cheque_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$clasificacion_cheque_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$clasificacion_cheque_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcategoria_cheque') {
				$this->id_categoria_chequeFK_Idcategoria_cheque=$clasificacion_cheque_session->id_categoria_cheque;
				$clasificacion_cheque_session->id_categoria_cheque=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta_corriente_detalle') {
				$this->id_cuenta_corriente_detalleFK_Idcuenta_corriente_detalle=$clasificacion_cheque_session->id_cuenta_corriente_detalle;
				$clasificacion_cheque_session->id_cuenta_corriente_detalle=-1;

			}
		}
		
		$clasificacion_cheque_session->strUltimaBusqueda='';
		//$clasificacion_cheque_session->intNumeroPaginacion=10;
		$clasificacion_cheque_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(clasificacion_cheque_util::$STR_SESSION_NAME,serialize($clasificacion_cheque_session));		
	}
	
	public function clasificacion_chequesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idcuenta_corriente_detalleDefaultFK = 0;
		$this->idcategoria_chequeDefaultFK = 0;
	}
	
	public function setclasificacion_chequeFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_cuenta_corriente_detalle',$this->idcuenta_corriente_detalleDefaultFK);
		$this->setExistDataCampoForm('form','id_categoria_cheque',$this->idcategoria_chequeDefaultFK);
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		

		cuenta_corriente_detalle::$class;
		cuenta_corriente_detalle_carga::$CONTROLLER;

		categoria_cheque::$class;
		categoria_cheque_carga::$CONTROLLER;
		
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
		interface clasificacion_cheque_controlI {	
		
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
		
		public function onLoad(clasificacion_cheque_session $clasificacion_cheque_session=null);	
		function index(?string $strTypeOnLoadclasificacion_cheque='',?string $strTipoPaginaAuxiliarclasificacion_cheque='',?string $strTipoUsuarioAuxiliarclasificacion_cheque='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadclasificacion_cheque='',string $strTipoPaginaAuxiliarclasificacion_cheque='',string $strTipoUsuarioAuxiliarclasificacion_cheque='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($clasificacion_chequeReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(clasificacion_cheque $clasificacion_chequeClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(clasificacion_cheque_session $clasificacion_cheque_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(clasificacion_cheque_session $clasificacion_cheque_session);	
		public function clasificacion_chequesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setclasificacion_chequeFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
