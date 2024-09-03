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

namespace com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\entity\beneficiario_ocacional_cheque;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/util/beneficiario_ocacional_cheque_carga.php');
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_carga;

use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\util\beneficiario_ocacional_cheque_param_return;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\business\logic\beneficiario_ocacional_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\presentation\session\beneficiario_ocacional_cheque_session;


//FK


//REL


use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\session\cheque_cuenta_corriente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
beneficiario_ocacional_cheque_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*beneficiario_ocacional_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/presentation/control/beneficiario_ocacional_cheque_init_control.php');
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\presentation\control\beneficiario_ocacional_cheque_init_control;

include_once('com/bydan/contabilidad/cuentascorrientes/beneficiario_ocacional_cheque/presentation/control/beneficiario_ocacional_cheque_base_control.php');
use com\bydan\contabilidad\cuentascorrientes\beneficiario_ocacional_cheque\presentation\control\beneficiario_ocacional_cheque_base_control;

class beneficiario_ocacional_cheque_control extends beneficiario_ocacional_cheque_base_control {	
	
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
			else if($action=='eliminarCascada' ) {
				$this->eliminarCascadaAction();
				
			} 
			else if($action=='eliminarTabla' ) {
				$this->eliminarTablaAction();	
				
			} else if($action=='quitarElementosTabla' ) {
				$this->quitarElementosTablaAction();
				
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
			else if($action=='registrarSesionParacheque_cuenta_corrientes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idbeneficiario_ocacional_chequeActual=$this->getDataId();
				$this->registrarSesionParacheque_cuenta_corrientes($idbeneficiario_ocacional_chequeActual);
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
					
					$beneficiario_ocacional_chequeController = new beneficiario_ocacional_cheque_control();
					
					$beneficiario_ocacional_chequeController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($beneficiario_ocacional_chequeController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$beneficiario_ocacional_chequeController = new beneficiario_ocacional_cheque_control();
						$beneficiario_ocacional_chequeController = $this;
						
						$jsonResponse = json_encode($beneficiario_ocacional_chequeController->beneficiario_ocacional_cheques);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->beneficiario_ocacional_chequeReturnGeneral==null) {
					$this->beneficiario_ocacional_chequeReturnGeneral=new beneficiario_ocacional_cheque_param_return();
				}
				
				echo($this->beneficiario_ocacional_chequeReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$beneficiario_ocacional_chequeController=new beneficiario_ocacional_cheque_control();
		
		$beneficiario_ocacional_chequeController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$beneficiario_ocacional_chequeController->usuarioActual=new usuario();
		
		$beneficiario_ocacional_chequeController->usuarioActual->setId($this->usuarioActual->getId());
		$beneficiario_ocacional_chequeController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$beneficiario_ocacional_chequeController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$beneficiario_ocacional_chequeController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$beneficiario_ocacional_chequeController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$beneficiario_ocacional_chequeController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$beneficiario_ocacional_chequeController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$beneficiario_ocacional_chequeController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $beneficiario_ocacional_chequeController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadbeneficiario_ocacional_cheque= $this->getDataGeneralString('strTypeOnLoadbeneficiario_ocacional_cheque');
		$strTipoPaginaAuxiliarbeneficiario_ocacional_cheque= $this->getDataGeneralString('strTipoPaginaAuxiliarbeneficiario_ocacional_cheque');
		$strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque= $this->getDataGeneralString('strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadbeneficiario_ocacional_cheque,$strTipoPaginaAuxiliarbeneficiario_ocacional_cheque,$strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadbeneficiario_ocacional_cheque!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('beneficiario_ocacional_cheque','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(beneficiario_ocacional_cheque_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarbeneficiario_ocacional_cheque,$this->strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(beneficiario_ocacional_cheque_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarbeneficiario_ocacional_cheque,$this->strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->beneficiario_ocacional_chequeReturnGeneral=new beneficiario_ocacional_cheque_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->beneficiario_ocacional_chequeReturnGeneral->conGuardarReturnSessionJs=true;
		$this->beneficiario_ocacional_chequeReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->beneficiario_ocacional_chequeReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->beneficiario_ocacional_chequeReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->beneficiario_ocacional_chequeReturnGeneral);
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
		$this->beneficiario_ocacional_chequeReturnGeneral=new beneficiario_ocacional_cheque_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->beneficiario_ocacional_chequeReturnGeneral->conGuardarReturnSessionJs=true;
		$this->beneficiario_ocacional_chequeReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->beneficiario_ocacional_chequeReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->beneficiario_ocacional_chequeReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->beneficiario_ocacional_chequeReturnGeneral);
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
		$this->beneficiario_ocacional_chequeReturnGeneral=new beneficiario_ocacional_cheque_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->beneficiario_ocacional_chequeReturnGeneral->conGuardarReturnSessionJs=true;
		$this->beneficiario_ocacional_chequeReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->beneficiario_ocacional_chequeReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->beneficiario_ocacional_chequeReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->beneficiario_ocacional_chequeReturnGeneral);
	}
	
	public function eliminarCascadaAction() {
		$this->setCargarParameterDivSecciones(false,true,false,true,true,false,false,true,false,false,false,false);
					
		$this->eliminarCascada();
	}
	
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->beneficiario_ocacional_chequeReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->beneficiario_ocacional_chequeReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->beneficiario_ocacional_chequeReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->beneficiario_ocacional_chequeReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->beneficiario_ocacional_chequeReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->beneficiario_ocacional_chequeReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->beneficiario_ocacional_chequeReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->beneficiario_ocacional_chequeReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->beneficiario_ocacional_chequeReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->beneficiario_ocacional_chequeReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->beneficiario_ocacional_chequeReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->beneficiario_ocacional_chequeReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
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
		
		$this->beneficiario_ocacional_chequeLogic=new beneficiario_ocacional_cheque_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->beneficiario_ocacional_cheque=new beneficiario_ocacional_cheque();
		
		$this->strTypeOnLoadbeneficiario_ocacional_cheque='onload';
		$this->strTipoPaginaAuxiliarbeneficiario_ocacional_cheque='none';
		$this->strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque='none';	

		$this->intNumeroPaginacion=beneficiario_ocacional_cheque_util::$INT_NUMERO_PAGINACION;
		
		$this->beneficiario_ocacional_chequeModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->beneficiario_ocacional_chequeControllerAdditional=new beneficiario_ocacional_cheque_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(beneficiario_ocacional_cheque_session $beneficiario_ocacional_cheque_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($beneficiario_ocacional_cheque_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadbeneficiario_ocacional_cheque='',?string $strTipoPaginaAuxiliarbeneficiario_ocacional_cheque='',?string $strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadbeneficiario_ocacional_cheque=$strTypeOnLoadbeneficiario_ocacional_cheque;
			$this->strTipoPaginaAuxiliarbeneficiario_ocacional_cheque=$strTipoPaginaAuxiliarbeneficiario_ocacional_cheque;
			$this->strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque=$strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque;
	
			if($strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->beneficiario_ocacional_cheque=new beneficiario_ocacional_cheque();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Beneficiario Ocacionales';
			
			
			$beneficiario_ocacional_cheque_session=unserialize($this->Session->read(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME));
							
			if($beneficiario_ocacional_cheque_session==null) {
				$beneficiario_ocacional_cheque_session=new beneficiario_ocacional_cheque_session();
				
				/*$this->Session->write('beneficiario_ocacional_cheque_session',$beneficiario_ocacional_cheque_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($beneficiario_ocacional_cheque_session->strFuncionJsPadre!=null && $beneficiario_ocacional_cheque_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$beneficiario_ocacional_cheque_session->strFuncionJsPadre;
				
				$beneficiario_ocacional_cheque_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($beneficiario_ocacional_cheque_session);
			
			if($strTypeOnLoadbeneficiario_ocacional_cheque!=null && $strTypeOnLoadbeneficiario_ocacional_cheque=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$beneficiario_ocacional_cheque_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$beneficiario_ocacional_cheque_session->setPaginaPopupVariables(true);
				}
				
				if($beneficiario_ocacional_cheque_session->intNumeroPaginacion==beneficiario_ocacional_cheque_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=beneficiario_ocacional_cheque_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$beneficiario_ocacional_cheque_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,beneficiario_ocacional_cheque_util::$STR_SESSION_NAME,'cuentascorrientes');																
			
			} else if($strTypeOnLoadbeneficiario_ocacional_cheque!=null && $strTypeOnLoadbeneficiario_ocacional_cheque=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$beneficiario_ocacional_cheque_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=beneficiario_ocacional_cheque_util::$INT_NUMERO_PAGINACION;*/
				
				if($beneficiario_ocacional_cheque_session->intNumeroPaginacion==beneficiario_ocacional_cheque_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=beneficiario_ocacional_cheque_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$beneficiario_ocacional_cheque_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarbeneficiario_ocacional_cheque!=null && $strTipoPaginaAuxiliarbeneficiario_ocacional_cheque=='none') {
				/*$beneficiario_ocacional_cheque_session->strStyleDivHeader='display:table-row';*/
				
				/*$beneficiario_ocacional_cheque_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarbeneficiario_ocacional_cheque!=null && $strTipoPaginaAuxiliarbeneficiario_ocacional_cheque=='iframe') {
					/*
					$beneficiario_ocacional_cheque_session->strStyleDivArbol='display:none';
					$beneficiario_ocacional_cheque_session->strStyleDivHeader='display:none';
					$beneficiario_ocacional_cheque_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$beneficiario_ocacional_cheque_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->beneficiario_ocacional_chequeClase=new beneficiario_ocacional_cheque();
			
			
			
		
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=beneficiario_ocacional_cheque_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(beneficiario_ocacional_cheque_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->beneficiario_ocacional_chequeLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->beneficiario_ocacional_chequeLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$chequecuentacorrienteLogic=new cheque_cuenta_corriente_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->beneficiario_ocacional_chequeLogic=new beneficiario_ocacional_cheque_logic();*/
			
			
			$this->beneficiario_ocacional_chequesModel=null;
			/*new ListDataModel();*/
			
			/*$this->beneficiario_ocacional_chequesModel.setWrappedData(beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques());*/
						
			$this->beneficiario_ocacional_cheques= array();
			$this->beneficiario_ocacional_chequesEliminados=array();
			$this->beneficiario_ocacional_chequesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= beneficiario_ocacional_cheque_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= beneficiario_ocacional_cheque_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->beneficiario_ocacional_cheque= new beneficiario_ocacional_cheque();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque!=null && $strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque!='none' && $strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque);
																
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
				if($strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque!=null && $strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque!='none' && $strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque);
																
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
				if($strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque==null || $strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque=='none' || $strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, beneficiario_ocacional_cheque_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, beneficiario_ocacional_cheque_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina beneficiario_ocacional_cheque');
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
			
			
			
			
			
			//$existe_history=false;
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($beneficiario_ocacional_cheque_session);
			
			$this->getSetBusquedasSesionConfig($beneficiario_ocacional_cheque_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportebeneficiario_ocacional_cheques($this->strAccionBusqueda,$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques());*/
				} else if($this->strGenerarReporte=='Html')	{
					$beneficiario_ocacional_cheque_session->strServletGenerarHtmlReporte='beneficiario_ocacional_chequeServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(beneficiario_ocacional_cheque_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(beneficiario_ocacional_cheque_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($beneficiario_ocacional_cheque_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$beneficiario_ocacional_cheque_session=unserialize($this->Session->read(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque!=null && $strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($beneficiario_ocacional_cheque_session);
			}
								
			$this->set(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME, $beneficiario_ocacional_cheque_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($beneficiario_ocacional_cheque_session);
			
			/*
			$this->beneficiario_ocacional_cheque->recursive = 0;
			
			$this->beneficiario_ocacional_cheques=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('beneficiario_ocacional_cheques', $this->beneficiario_ocacional_cheques);
			
			$this->set(beneficiario_ocacional_cheque_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->beneficiario_ocacional_chequeActual =$this->beneficiario_ocacional_chequeClase;
			
			/*$this->beneficiario_ocacional_chequeActual =$this->migrarModelbeneficiario_ocacional_cheque($this->beneficiario_ocacional_chequeClase);*/
			
			$this->returnHtml(false);
			
			$this->set(beneficiario_ocacional_cheque_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=beneficiario_ocacional_cheque_util::$STR_NOMBRE_OPCION;
				
			if(beneficiario_ocacional_cheque_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=beneficiario_ocacional_cheque_util::$STR_MODULO_OPCION.beneficiario_ocacional_cheque_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME,serialize($beneficiario_ocacional_cheque_session));
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
			/*$beneficiario_ocacional_chequeClase= (beneficiario_ocacional_cheque) beneficiario_ocacional_chequesModel.getRowData();*/
			
			$this->beneficiario_ocacional_chequeClase->setId($this->beneficiario_ocacional_cheque->getId());	
			$this->beneficiario_ocacional_chequeClase->setVersionRow($this->beneficiario_ocacional_cheque->getVersionRow());	
			$this->beneficiario_ocacional_chequeClase->setVersionRow($this->beneficiario_ocacional_cheque->getVersionRow());	
			$this->beneficiario_ocacional_chequeClase->setcodigo($this->beneficiario_ocacional_cheque->getcodigo());	
			$this->beneficiario_ocacional_chequeClase->setnombre($this->beneficiario_ocacional_cheque->getnombre());	
			$this->beneficiario_ocacional_chequeClase->setdireccion_1($this->beneficiario_ocacional_cheque->getdireccion_1());	
			$this->beneficiario_ocacional_chequeClase->setdireccion_2($this->beneficiario_ocacional_cheque->getdireccion_2());	
			$this->beneficiario_ocacional_chequeClase->setdireccion_3($this->beneficiario_ocacional_cheque->getdireccion_3());	
			$this->beneficiario_ocacional_chequeClase->settelefono($this->beneficiario_ocacional_cheque->gettelefono());	
			$this->beneficiario_ocacional_chequeClase->settelefono_movil($this->beneficiario_ocacional_cheque->gettelefono_movil());	
			$this->beneficiario_ocacional_chequeClase->setemail($this->beneficiario_ocacional_cheque->getemail());	
			$this->beneficiario_ocacional_chequeClase->setnotas($this->beneficiario_ocacional_cheque->getnotas());	
			$this->beneficiario_ocacional_chequeClase->setregistro_ocacional($this->beneficiario_ocacional_cheque->getregistro_ocacional());	
			$this->beneficiario_ocacional_chequeClase->setregistro_tributario($this->beneficiario_ocacional_cheque->getregistro_tributario());	
		
			/*$this->Session->write('beneficiario_ocacional_chequeVersionRowActual', beneficiario_ocacional_cheque.getVersionRow());*/
			
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
			
			$beneficiario_ocacional_cheque_session=unserialize($this->Session->read(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME));
						
			if($beneficiario_ocacional_cheque_session==null) {
				$beneficiario_ocacional_cheque_session=new beneficiario_ocacional_cheque_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('beneficiario_ocacional_cheque', $this->beneficiario_ocacional_cheque->read(null, $id));
	
			
			$this->beneficiario_ocacional_cheque->recursive = 0;
			
			$this->beneficiario_ocacional_cheques=$this->paginate();
			
			$this->set('beneficiario_ocacional_cheques', $this->beneficiario_ocacional_cheques);
	
			if (empty($this->data)) {
				$this->data = $this->beneficiario_ocacional_cheque->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->beneficiario_ocacional_chequeLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->beneficiario_ocacional_chequeClase);
			
			$this->beneficiario_ocacional_chequeActual=$this->beneficiario_ocacional_chequeClase;
			
			/*$this->beneficiario_ocacional_chequeActual =$this->migrarModelbeneficiario_ocacional_cheque($this->beneficiario_ocacional_chequeClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques(),$this->beneficiario_ocacional_chequeActual);
			
			$this->actualizarControllerConReturnGeneral($this->beneficiario_ocacional_chequeReturnGeneral);
			
			//$this->beneficiario_ocacional_chequeReturnGeneral=$this->beneficiario_ocacional_chequeLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques(),$this->beneficiario_ocacional_chequeActual,$this->beneficiario_ocacional_chequeParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$beneficiario_ocacional_cheque_session=unserialize($this->Session->read(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME));
						
			if($beneficiario_ocacional_cheque_session==null) {
				$beneficiario_ocacional_cheque_session=new beneficiario_ocacional_cheque_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevobeneficiario_ocacional_cheque', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->beneficiario_ocacional_chequeClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->beneficiario_ocacional_chequeClase);
			
			$this->beneficiario_ocacional_chequeActual =$this->beneficiario_ocacional_chequeClase;
			
			/*$this->beneficiario_ocacional_chequeActual =$this->migrarModelbeneficiario_ocacional_cheque($this->beneficiario_ocacional_chequeClase);*/
			
			$this->setbeneficiario_ocacional_chequeFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques(),$this->beneficiario_ocacional_cheque);
			
			$this->actualizarControllerConReturnGeneral($this->beneficiario_ocacional_chequeReturnGeneral);
			
			//this->beneficiario_ocacional_chequeReturnGeneral=$this->beneficiario_ocacional_chequeLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques(),$this->beneficiario_ocacional_cheque,$this->beneficiario_ocacional_chequeParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
						
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->beneficiario_ocacional_chequeReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->beneficiario_ocacional_chequeReturnGeneral->getbeneficiario_ocacional_cheque(),$this->beneficiario_ocacional_chequeActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeybeneficiario_ocacional_cheque($this->beneficiario_ocacional_chequeReturnGeneral->getbeneficiario_ocacional_cheque());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariobeneficiario_ocacional_cheque($this->beneficiario_ocacional_chequeReturnGeneral->getbeneficiario_ocacional_cheque());*/
			}
			
			if($this->beneficiario_ocacional_chequeReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->beneficiario_ocacional_chequeReturnGeneral->getbeneficiario_ocacional_cheque(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualbeneficiario_ocacional_cheque($this->beneficiario_ocacional_cheque,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->beneficiario_ocacional_chequesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->beneficiario_ocacional_chequesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->beneficiario_ocacional_chequesAuxiliar=array();
			}
			
			if(count($this->beneficiario_ocacional_chequesAuxiliar)==2) {
				$beneficiario_ocacional_chequeOrigen=$this->beneficiario_ocacional_chequesAuxiliar[0];
				$beneficiario_ocacional_chequeDestino=$this->beneficiario_ocacional_chequesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($beneficiario_ocacional_chequeOrigen,$beneficiario_ocacional_chequeDestino,true,false,false);
				
				$this->actualizarLista($beneficiario_ocacional_chequeDestino,$this->beneficiario_ocacional_cheques);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->beneficiario_ocacional_chequesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->beneficiario_ocacional_chequesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->beneficiario_ocacional_chequesAuxiliar=array();
			}
			
			if(count($this->beneficiario_ocacional_chequesAuxiliar) > 0) {
				foreach ($this->beneficiario_ocacional_chequesAuxiliar as $beneficiario_ocacional_chequeSeleccionado) {
					$this->beneficiario_ocacional_cheque=new beneficiario_ocacional_cheque();
					
					$this->setCopiarVariablesObjetos($beneficiario_ocacional_chequeSeleccionado,$this->beneficiario_ocacional_cheque,true,true,false);
						
					$this->beneficiario_ocacional_cheques[]=$this->beneficiario_ocacional_cheque;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->beneficiario_ocacional_chequesEliminados as $beneficiario_ocacional_chequeEliminado) {
				$this->beneficiario_ocacional_chequeLogic->beneficiario_ocacional_cheques[]=$beneficiario_ocacional_chequeEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->beneficiario_ocacional_cheque=new beneficiario_ocacional_cheque();
							
				$this->beneficiario_ocacional_cheques[]=$this->beneficiario_ocacional_cheque;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
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
		
		$beneficiario_ocacional_chequeActual=new beneficiario_ocacional_cheque();
		
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
				
				$beneficiario_ocacional_chequeActual=$this->beneficiario_ocacional_cheques[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setdireccion_1($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setdireccion_2($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setdireccion_3($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->settelefono($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->settelefono_movil($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setemail($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setnotas($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setregistro_ocacional($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $beneficiario_ocacional_chequeActual->setregistro_tributario($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->beneficiario_ocacional_chequesAuxiliar=array();		 
		/*$this->beneficiario_ocacional_chequesEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->beneficiario_ocacional_chequesAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->beneficiario_ocacional_chequesAuxiliar=array();
		}
			
		if(count($this->beneficiario_ocacional_chequesAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->beneficiario_ocacional_chequesAuxiliar as $beneficiario_ocacional_chequeAuxLocal) {				
				
				foreach($this->beneficiario_ocacional_cheques as $beneficiario_ocacional_chequeLocal) {
					if($beneficiario_ocacional_chequeLocal->getId()==$beneficiario_ocacional_chequeAuxLocal->getId()) {
						$beneficiario_ocacional_chequeLocal->setIsDeleted(true);
						
						/*$this->beneficiario_ocacional_chequesEliminados[]=$beneficiario_ocacional_chequeLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->beneficiario_ocacional_chequeLogic->setbeneficiario_ocacional_cheques($this->beneficiario_ocacional_cheques);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
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
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=beneficiario_ocacional_cheque_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadbeneficiario_ocacional_cheque='',string $strTipoPaginaAuxiliarbeneficiario_ocacional_cheque='',string $strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadbeneficiario_ocacional_cheque,$strTipoPaginaAuxiliarbeneficiario_ocacional_cheque,$strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->beneficiario_ocacional_cheques) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=beneficiario_ocacional_cheque_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=beneficiario_ocacional_cheque_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=beneficiario_ocacional_cheque_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$beneficiario_ocacional_cheque_session=unserialize($this->Session->read(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME));
						
			if($beneficiario_ocacional_cheque_session==null) {
				$beneficiario_ocacional_cheque_session=new beneficiario_ocacional_cheque_session();
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
					/*$this->intNumeroPaginacion=beneficiario_ocacional_cheque_util::$INT_NUMERO_PAGINACION;*/
					
					if($beneficiario_ocacional_cheque_session->intNumeroPaginacion==beneficiario_ocacional_cheque_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=beneficiario_ocacional_cheque_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$beneficiario_ocacional_cheque_session->intNumeroPaginacion;
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
			
			$this->beneficiario_ocacional_chequesEliminados=array();
			
			/*$this->beneficiario_ocacional_chequeLogic->setConnexion($connexion);*/
			
			$this->beneficiario_ocacional_chequeLogic->setIsConDeep(true);
			
			$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_chequeDataAccess()->isForFKDataRels=true;
			
			
			
			$this->beneficiario_ocacional_chequeLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->beneficiario_ocacional_chequeLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques()==null|| count($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->beneficiario_ocacional_chequeLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->beneficiario_ocacional_chequesReporte=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques();
									
						/*$this->generarReportes('Todos',$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques());*/
					
						$this->beneficiario_ocacional_chequeLogic->setbeneficiario_ocacional_cheques($this->beneficiario_ocacional_cheques);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->beneficiario_ocacional_chequeLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques()==null|| count($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->beneficiario_ocacional_chequeLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->beneficiario_ocacional_chequesReporte=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques();
									
						/*$this->generarReportes('Todos',$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques());*/
					
						$this->beneficiario_ocacional_chequeLogic->setbeneficiario_ocacional_cheques($this->beneficiario_ocacional_cheques);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idbeneficiario_ocacional_cheque=0;*/
				
				if($beneficiario_ocacional_cheque_session->bitBusquedaDesdeFKSesionFK!=null && $beneficiario_ocacional_cheque_session->bitBusquedaDesdeFKSesionFK==true) {
					if($beneficiario_ocacional_cheque_session->bigIdActualFK!=null && $beneficiario_ocacional_cheque_session->bigIdActualFK!=0)	{
						$this->idbeneficiario_ocacional_cheque=$beneficiario_ocacional_cheque_session->bigIdActualFK;	
					}
					
					$beneficiario_ocacional_cheque_session->bitBusquedaDesdeFKSesionFK=false;
					
					$beneficiario_ocacional_cheque_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idbeneficiario_ocacional_cheque=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idbeneficiario_ocacional_cheque=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->beneficiario_ocacional_chequeLogic->getEntity($this->idbeneficiario_ocacional_cheque);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*beneficiario_ocacional_chequeLogicAdditional::getDetalleIndicePorId($idbeneficiario_ocacional_cheque);*/

				
				if($this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque()!=null) {
					$this->beneficiario_ocacional_chequeLogic->setbeneficiario_ocacional_cheques(array());
					$this->beneficiario_ocacional_chequeLogic->beneficiario_ocacional_cheques[]=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheque();
				}
			
			}
		 
		
		$beneficiario_ocacional_cheque_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$beneficiario_ocacional_cheque_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->beneficiario_ocacional_chequeLogic->loadForeignsKeysDescription();*/
		
		$this->beneficiario_ocacional_cheques=$this->beneficiario_ocacional_chequeLogic->getbeneficiario_ocacional_cheques();
		
		if($this->beneficiario_ocacional_chequesEliminados==null) {
			$this->beneficiario_ocacional_chequesEliminados=array();
		}
		
		$this->Session->write(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME.'Lista',serialize($this->beneficiario_ocacional_cheques));
		$this->Session->write(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->beneficiario_ocacional_chequesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME,serialize($beneficiario_ocacional_cheque_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idbeneficiario_ocacional_cheque=$idGeneral;
			
			$this->intNumeroPaginacion=beneficiario_ocacional_cheque_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
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
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}

			if(count($this->beneficiario_ocacional_cheques) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	
	
	
		
	
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(beneficiario_ocacional_cheque_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$beneficiario_ocacional_cheque_session=unserialize($this->Session->read(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME));
		
		if($beneficiario_ocacional_cheque_session->bitPermiteNavegacionHaciaFKDesde) {
			
			
			$beneficiario_ocacional_cheque_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}						
			
			$this->beneficiario_ocacional_chequesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->beneficiario_ocacional_chequesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->beneficiario_ocacional_chequesAuxiliar=array();
			}
			
			if(count($this->beneficiario_ocacional_chequesAuxiliar) > 0) {
				
				foreach ($this->beneficiario_ocacional_chequesAuxiliar as $beneficiario_ocacional_chequeSeleccionado) {
					$this->eliminarTablaBase($beneficiario_ocacional_chequeSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('cheque_cuenta_corriente');
			$tipoRelacionReporte->setsDescripcion('Cheques');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=cheque_cuenta_corriente_util::$STR_NOMBRE_CLASE;
		
		return $arrNombresClasesRelacionadasLocal;
	}
	
	
	public function setstrRecargarFkInicializar() {
		$this->setstrRecargarFk('TODOS','NINGUNO',0,'');		
	}
	
	
	
	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=beneficiario_ocacional_cheque_util::$INT_NUMERO_PAGINACION;
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
				$this->beneficiario_ocacional_chequeLogic->commitNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->beneficiario_ocacional_chequeLogic->rollbackNewConnexionToDeep();
				$this->beneficiario_ocacional_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$beneficiario_ocacional_chequesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->beneficiario_ocacional_cheques as $beneficiario_ocacional_chequeLocal) {
				if($beneficiario_ocacional_chequeLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->beneficiario_ocacional_cheque=new beneficiario_ocacional_cheque();
				
				$this->beneficiario_ocacional_cheque->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->beneficiario_ocacional_cheques[]=$this->beneficiario_ocacional_cheque;*/
				
				$beneficiario_ocacional_chequesNuevos[]=$this->beneficiario_ocacional_cheque;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($beneficiario_ocacional_chequesNuevos!=null);
	}
					
	
	
	
	
	
	
	
	
	public function setVariablesGlobalesCombosFK(beneficiario_ocacional_cheque $beneficiario_ocacional_chequeClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
			
			
			}
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	
	
	
	
	
	

	public function registrarSesionParacheque_cuenta_corrientes(int $idbeneficiario_ocacional_chequeActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idbeneficiario_ocacional_chequeActual=$idbeneficiario_ocacional_chequeActual;

		$bitPaginaPopupcheque_cuenta_corriente=false;

		try {

			$beneficiario_ocacional_cheque_session=unserialize($this->Session->read(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME));

			if($beneficiario_ocacional_cheque_session==null) {
				$beneficiario_ocacional_cheque_session=new beneficiario_ocacional_cheque_session();
			}

			$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

			if($cheque_cuenta_corriente_session==null) {
				$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
			}

			$cheque_cuenta_corriente_session->strUltimaBusqueda='FK_Idbeneficiario_ocacional_cheque';
			$cheque_cuenta_corriente_session->strPathNavegacionActual=$beneficiario_ocacional_cheque_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
			$cheque_cuenta_corriente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcheque_cuenta_corriente=$cheque_cuenta_corriente_session->bitPaginaPopup;
			$cheque_cuenta_corriente_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcheque_cuenta_corriente=$cheque_cuenta_corriente_session->bitPaginaPopup;
			$cheque_cuenta_corriente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$cheque_cuenta_corriente_session->strNombrePaginaNavegacionHaciaFKDesde=beneficiario_ocacional_cheque_util::$STR_NOMBRE_OPCION;
			$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesionbeneficiario_ocacional_cheque=true;
			$cheque_cuenta_corriente_session->bigidbeneficiario_ocacional_chequeActual=$this->idbeneficiario_ocacional_chequeActual;

			$beneficiario_ocacional_cheque_session->bitBusquedaDesdeFKSesionFK=true;
			$beneficiario_ocacional_cheque_session->bigIdActualFK=$this->idbeneficiario_ocacional_chequeActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"cheque_cuenta_corriente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=beneficiario_ocacional_cheque_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"cheque_cuenta_corriente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME,serialize($beneficiario_ocacional_cheque_session));
			$this->Session->write(cheque_cuenta_corriente_util::$STR_SESSION_NAME,serialize($cheque_cuenta_corriente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcheque_cuenta_corriente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cheque_cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cheque_cuenta_corriente_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarbeneficiario_ocacional_cheque,$this->strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cheque_cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cheque_cuenta_corriente_util::$STR_CLASS_NAME,'cuentascorrientes','','NO-POPUP',$this->strTipoPaginaAuxiliarbeneficiario_ocacional_cheque,$this->strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME,beneficiario_ocacional_cheque_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$beneficiario_ocacional_cheque_session=$this->Session->read(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME);
				
		if($beneficiario_ocacional_cheque_session==null) {
			$beneficiario_ocacional_cheque_session=new beneficiario_ocacional_cheque_session();		
			//$this->Session->write('beneficiario_ocacional_cheque_session',$beneficiario_ocacional_cheque_session);							
		}
		*/
		
		$beneficiario_ocacional_cheque_session=new beneficiario_ocacional_cheque_session();
    	$beneficiario_ocacional_cheque_session->strPathNavegacionActual=beneficiario_ocacional_cheque_util::$STR_CLASS_WEB_TITULO;
    	$beneficiario_ocacional_cheque_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME,serialize($beneficiario_ocacional_cheque_session));		
	}	
	
	public function getSetBusquedasSesionConfig(beneficiario_ocacional_cheque_session $beneficiario_ocacional_cheque_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($beneficiario_ocacional_cheque_session->bitBusquedaDesdeFKSesionFK!=null && $beneficiario_ocacional_cheque_session->bitBusquedaDesdeFKSesionFK==true) {
			if($beneficiario_ocacional_cheque_session->bigIdActualFK!=null && $beneficiario_ocacional_cheque_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$beneficiario_ocacional_cheque_session->bigIdActualFKParaPosibleAtras=$beneficiario_ocacional_cheque_session->bigIdActualFK;*/
			}
				
			$beneficiario_ocacional_cheque_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$beneficiario_ocacional_cheque_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(beneficiario_ocacional_cheque_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$beneficiario_ocacional_cheque_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$beneficiario_ocacional_cheque_session=unserialize($this->Session->read(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME));
		
		if($beneficiario_ocacional_cheque_session==null) {
			$beneficiario_ocacional_cheque_session=new beneficiario_ocacional_cheque_session();
		}
		
		$beneficiario_ocacional_cheque_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$beneficiario_ocacional_cheque_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$beneficiario_ocacional_cheque_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		
		$this->Session->write(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME,serialize($beneficiario_ocacional_cheque_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(beneficiario_ocacional_cheque_session $beneficiario_ocacional_cheque_session) {
		
		if($beneficiario_ocacional_cheque_session==null) {
			$beneficiario_ocacional_cheque_session=unserialize($this->Session->read(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME));
		}
		
		if($beneficiario_ocacional_cheque_session==null) {
		   $beneficiario_ocacional_cheque_session=new beneficiario_ocacional_cheque_session();
		}
		
		if($beneficiario_ocacional_cheque_session->strUltimaBusqueda!=null && $beneficiario_ocacional_cheque_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$beneficiario_ocacional_cheque_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$beneficiario_ocacional_cheque_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$beneficiario_ocacional_cheque_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

		}
		
		$beneficiario_ocacional_cheque_session->strUltimaBusqueda='';
		//$beneficiario_ocacional_cheque_session->intNumeroPaginacion=10;
		$beneficiario_ocacional_cheque_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(beneficiario_ocacional_cheque_util::$STR_SESSION_NAME,serialize($beneficiario_ocacional_cheque_session));		
	}
	
	public function beneficiario_ocacional_chequesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
	}
	
	public function setbeneficiario_ocacional_chequeFKsDefault() {
	
	}
	
	/*VIEW_LAYER-FIN*/
			
	//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
	public function auxiliarMensajesAdvertencia() {        
        $selectItem=new SelectItem();
        
		$upr=new usuario_param_return();$upr->conAbrirVentana;
		
        if($selectItem!=null);
		
		//FKs
		
		
		//REL
		

		cheque_cuenta_corriente_carga::$CONTROLLER;
		cheque_cuenta_corriente_util::$STR_SCHEMA;
		cheque_cuenta_corriente_session::class;
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
		interface beneficiario_ocacional_cheque_controlI {	
		
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
		
		
		
		public function manejarEventosAction();
		public function recargarFormularioGeneralAction();
		
		
		public function mostrarEjecutarAccionesRelacionesAction();
		
		public function generarReporteConPhpExcelAction();	
		public function generarReporteConPhpExcelVerticalAction();	
		public function generarReporteConPhpExcelRelacionesAction();
		
		public function onLoad(beneficiario_ocacional_cheque_session $beneficiario_ocacional_cheque_session=null);	
		function index(?string $strTypeOnLoadbeneficiario_ocacional_cheque='',?string $strTipoPaginaAuxiliarbeneficiario_ocacional_cheque='',?string $strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadbeneficiario_ocacional_cheque='',string $strTipoPaginaAuxiliarbeneficiario_ocacional_cheque='',string $strTipoUsuarioAuxiliarbeneficiario_ocacional_cheque='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(beneficiario_ocacional_cheque $beneficiario_ocacional_chequeClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(beneficiario_ocacional_cheque_session $beneficiario_ocacional_cheque_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(beneficiario_ocacional_cheque_session $beneficiario_ocacional_cheque_session);	
		public function beneficiario_ocacional_chequesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setbeneficiario_ocacional_chequeFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
