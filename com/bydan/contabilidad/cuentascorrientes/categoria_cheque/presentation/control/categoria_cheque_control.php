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

namespace com\bydan\contabilidad\cuentascorrientes\categoria_cheque\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\entity\categoria_cheque;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/categoria_cheque/util/categoria_cheque_carga.php');
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_carga;

use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\util\categoria_cheque_param_return;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\business\logic\categoria_cheque_logic;
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\presentation\session\categoria_cheque_session;


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


use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\session\cheque_cuenta_corriente_session;

use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_carga;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\util\clasificacion_cheque_util;
use com\bydan\contabilidad\cuentascorrientes\clasificacion_cheque\presentation\session\clasificacion_cheque_session;


/*CARGA ARCHIVOS FRAMEWORK*/
categoria_cheque_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
categoria_cheque_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
categoria_cheque_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
categoria_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*categoria_cheque_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentascorrientes/categoria_cheque/presentation/control/categoria_cheque_init_control.php');
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\presentation\control\categoria_cheque_init_control;

include_once('com/bydan/contabilidad/cuentascorrientes/categoria_cheque/presentation/control/categoria_cheque_base_control.php');
use com\bydan\contabilidad\cuentascorrientes\categoria_cheque\presentation\control\categoria_cheque_base_control;

class categoria_cheque_control extends categoria_cheque_base_control {	
	
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
			else if($action=='registrarSesionParacheque_cuenta_corrientes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcategoria_chequeActual=$this->getDataId();
				$this->registrarSesionParacheque_cuenta_corrientes($idcategoria_chequeActual);
			}
			else if($action=='registrarSesionParaclasificacion_cheques' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcategoria_chequeActual=$this->getDataId();
				$this->registrarSesionParaclasificacion_cheques($idcategoria_chequeActual);
			} 
			
			
			else if($action=="FK_Idcuenta"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdcuentaParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcategoria_chequeActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idcategoria_chequeActual
			}
			else if($action=='abrirBusquedaParacuenta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcategoria_chequeActual=$this->getDataId();
				$this->abrirBusquedaParacuenta();//$idcategoria_chequeActual
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
					
					$categoria_chequeController = new categoria_cheque_control();
					
					$categoria_chequeController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($categoria_chequeController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$categoria_chequeController = new categoria_cheque_control();
						$categoria_chequeController = $this;
						
						$jsonResponse = json_encode($categoria_chequeController->categoria_cheques);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->categoria_chequeReturnGeneral==null) {
					$this->categoria_chequeReturnGeneral=new categoria_cheque_param_return();
				}
				
				echo($this->categoria_chequeReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$categoria_chequeController=new categoria_cheque_control();
		
		$categoria_chequeController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$categoria_chequeController->usuarioActual=new usuario();
		
		$categoria_chequeController->usuarioActual->setId($this->usuarioActual->getId());
		$categoria_chequeController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$categoria_chequeController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$categoria_chequeController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$categoria_chequeController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$categoria_chequeController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$categoria_chequeController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$categoria_chequeController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $categoria_chequeController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadcategoria_cheque= $this->getDataGeneralString('strTypeOnLoadcategoria_cheque');
		$strTipoPaginaAuxiliarcategoria_cheque= $this->getDataGeneralString('strTipoPaginaAuxiliarcategoria_cheque');
		$strTipoUsuarioAuxiliarcategoria_cheque= $this->getDataGeneralString('strTipoUsuarioAuxiliarcategoria_cheque');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadcategoria_cheque,$strTipoPaginaAuxiliarcategoria_cheque,$strTipoUsuarioAuxiliarcategoria_cheque,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadcategoria_cheque!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('categoria_cheque','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(categoria_cheque_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarcategoria_cheque,$this->strTipoUsuarioAuxiliarcategoria_cheque,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(categoria_cheque_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarcategoria_cheque,$this->strTipoUsuarioAuxiliarcategoria_cheque,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->categoria_chequeReturnGeneral=new categoria_cheque_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->categoria_chequeReturnGeneral->conGuardarReturnSessionJs=true;
		$this->categoria_chequeReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->categoria_chequeReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->categoria_chequeReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->categoria_chequeReturnGeneral);
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
		$this->categoria_chequeReturnGeneral=new categoria_cheque_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->categoria_chequeReturnGeneral->conGuardarReturnSessionJs=true;
		$this->categoria_chequeReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->categoria_chequeReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->categoria_chequeReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->categoria_chequeReturnGeneral);
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
		$this->categoria_chequeReturnGeneral=new categoria_cheque_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->categoria_chequeReturnGeneral->conGuardarReturnSessionJs=true;
		$this->categoria_chequeReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->categoria_chequeReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->categoria_chequeReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->categoria_chequeReturnGeneral);
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
				$this->categoria_chequeLogic->getNewConnexionToDeep();
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
			
			
			$this->categoria_chequeReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->categoria_chequeReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->categoria_chequeReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->categoria_chequeReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->categoria_chequeReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->categoria_chequeReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->categoria_chequeReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->categoria_chequeReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->categoria_chequeReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->categoria_chequeReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->categoria_chequeReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->categoria_chequeReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->categoria_chequeReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->categoria_chequeReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->categoria_chequeReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->categoria_chequeReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->categoria_chequeReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->categoria_chequeReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
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
		
		$this->categoria_chequeLogic=new categoria_cheque_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->categoria_cheque=new categoria_cheque();
		
		$this->strTypeOnLoadcategoria_cheque='onload';
		$this->strTipoPaginaAuxiliarcategoria_cheque='none';
		$this->strTipoUsuarioAuxiliarcategoria_cheque='none';	

		$this->intNumeroPaginacion=categoria_cheque_util::$INT_NUMERO_PAGINACION;
		
		$this->categoria_chequeModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->categoria_chequeControllerAdditional=new categoria_cheque_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(categoria_cheque_session $categoria_cheque_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($categoria_cheque_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadcategoria_cheque='',?string $strTipoPaginaAuxiliarcategoria_cheque='',?string $strTipoUsuarioAuxiliarcategoria_cheque='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadcategoria_cheque=$strTypeOnLoadcategoria_cheque;
			$this->strTipoPaginaAuxiliarcategoria_cheque=$strTipoPaginaAuxiliarcategoria_cheque;
			$this->strTipoUsuarioAuxiliarcategoria_cheque=$strTipoUsuarioAuxiliarcategoria_cheque;
	
			if($strTipoUsuarioAuxiliarcategoria_cheque=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->categoria_cheque=new categoria_cheque();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Categoria Cheques';
			
			
			$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));
							
			if($categoria_cheque_session==null) {
				$categoria_cheque_session=new categoria_cheque_session();
				
				/*$this->Session->write('categoria_cheque_session',$categoria_cheque_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($categoria_cheque_session->strFuncionJsPadre!=null && $categoria_cheque_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$categoria_cheque_session->strFuncionJsPadre;
				
				$categoria_cheque_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($categoria_cheque_session);
			
			if($strTypeOnLoadcategoria_cheque!=null && $strTypeOnLoadcategoria_cheque=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$categoria_cheque_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$categoria_cheque_session->setPaginaPopupVariables(true);
				}
				
				if($categoria_cheque_session->intNumeroPaginacion==categoria_cheque_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=categoria_cheque_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$categoria_cheque_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,categoria_cheque_util::$STR_SESSION_NAME,'cuentascorrientes');																
			
			} else if($strTypeOnLoadcategoria_cheque!=null && $strTypeOnLoadcategoria_cheque=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$categoria_cheque_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=categoria_cheque_util::$INT_NUMERO_PAGINACION;*/
				
				if($categoria_cheque_session->intNumeroPaginacion==categoria_cheque_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=categoria_cheque_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$categoria_cheque_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarcategoria_cheque!=null && $strTipoPaginaAuxiliarcategoria_cheque=='none') {
				/*$categoria_cheque_session->strStyleDivHeader='display:table-row';*/
				
				/*$categoria_cheque_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarcategoria_cheque!=null && $strTipoPaginaAuxiliarcategoria_cheque=='iframe') {
					/*
					$categoria_cheque_session->strStyleDivArbol='display:none';
					$categoria_cheque_session->strStyleDivHeader='display:none';
					$categoria_cheque_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$categoria_cheque_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->categoria_chequeClase=new categoria_cheque();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=categoria_cheque_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(categoria_cheque_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->categoria_chequeLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->categoria_chequeLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$chequecuentacorrienteLogic=new cheque_cuenta_corriente_logic();
			//$clasificacionchequeLogic=new clasificacion_cheque_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->categoria_chequeLogic=new categoria_cheque_logic();*/
			
			
			$this->categoria_chequesModel=null;
			/*new ListDataModel();*/
			
			/*$this->categoria_chequesModel.setWrappedData(categoria_chequeLogic->getcategoria_cheques());*/
						
			$this->categoria_cheques= array();
			$this->categoria_chequesEliminados=array();
			$this->categoria_chequesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= categoria_cheque_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= categoria_cheque_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->categoria_cheque= new categoria_cheque();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcuenta='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarcategoria_cheque!=null && $strTipoUsuarioAuxiliarcategoria_cheque!='none' && $strTipoUsuarioAuxiliarcategoria_cheque!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcategoria_cheque);
																
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
				if($strTipoUsuarioAuxiliarcategoria_cheque!=null && $strTipoUsuarioAuxiliarcategoria_cheque!='none' && $strTipoUsuarioAuxiliarcategoria_cheque!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcategoria_cheque);
																
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
				if($strTipoUsuarioAuxiliarcategoria_cheque==null || $strTipoUsuarioAuxiliarcategoria_cheque=='none' || $strTipoUsuarioAuxiliarcategoria_cheque=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarcategoria_cheque,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, categoria_cheque_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, categoria_cheque_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina categoria_cheque');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($categoria_cheque_session);
			
			$this->getSetBusquedasSesionConfig($categoria_cheque_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportecategoria_cheques($this->strAccionBusqueda,$this->categoria_chequeLogic->getcategoria_cheques());*/
				} else if($this->strGenerarReporte=='Html')	{
					$categoria_cheque_session->strServletGenerarHtmlReporte='categoria_chequeServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(categoria_cheque_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(categoria_cheque_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($categoria_cheque_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarcategoria_cheque!=null && $strTipoUsuarioAuxiliarcategoria_cheque=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($categoria_cheque_session);
			}
								
			$this->set(categoria_cheque_util::$STR_SESSION_NAME, $categoria_cheque_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($categoria_cheque_session);
			
			/*
			$this->categoria_cheque->recursive = 0;
			
			$this->categoria_cheques=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('categoria_cheques', $this->categoria_cheques);
			
			$this->set(categoria_cheque_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->categoria_chequeActual =$this->categoria_chequeClase;
			
			/*$this->categoria_chequeActual =$this->migrarModelcategoria_cheque($this->categoria_chequeClase);*/
			
			$this->returnHtml(false);
			
			$this->set(categoria_cheque_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=categoria_cheque_util::$STR_NOMBRE_OPCION;
				
			if(categoria_cheque_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=categoria_cheque_util::$STR_MODULO_OPCION.categoria_cheque_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(categoria_cheque_util::$STR_SESSION_NAME,serialize($categoria_cheque_session));
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
			/*$categoria_chequeClase= (categoria_cheque) categoria_chequesModel.getRowData();*/
			
			$this->categoria_chequeClase->setId($this->categoria_cheque->getId());	
			$this->categoria_chequeClase->setVersionRow($this->categoria_cheque->getVersionRow());	
			$this->categoria_chequeClase->setVersionRow($this->categoria_cheque->getVersionRow());	
			$this->categoria_chequeClase->setid_empresa($this->categoria_cheque->getid_empresa());	
			$this->categoria_chequeClase->setid_cuenta($this->categoria_cheque->getid_cuenta());	
			$this->categoria_chequeClase->setnombre($this->categoria_cheque->getnombre());	
			$this->categoria_chequeClase->setcuenta_contable($this->categoria_cheque->getcuenta_contable());	
			$this->categoria_chequeClase->setpredeterminado($this->categoria_cheque->getpredeterminado());	
		
			/*$this->Session->write('categoria_chequeVersionRowActual', categoria_cheque.getVersionRow());*/
			
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
			
			$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));
						
			if($categoria_cheque_session==null) {
				$categoria_cheque_session=new categoria_cheque_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('categoria_cheque', $this->categoria_cheque->read(null, $id));
	
			
			$this->categoria_cheque->recursive = 0;
			
			$this->categoria_cheques=$this->paginate();
			
			$this->set('categoria_cheques', $this->categoria_cheques);
	
			if (empty($this->data)) {
				$this->data = $this->categoria_cheque->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->categoria_chequeLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->categoria_chequeClase);
			
			$this->categoria_chequeActual=$this->categoria_chequeClase;
			
			/*$this->categoria_chequeActual =$this->migrarModelcategoria_cheque($this->categoria_chequeClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->categoria_chequeLogic->getcategoria_cheques(),$this->categoria_chequeActual);
			
			$this->actualizarControllerConReturnGeneral($this->categoria_chequeReturnGeneral);
			
			//$this->categoria_chequeReturnGeneral=$this->categoria_chequeLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->categoria_chequeLogic->getcategoria_cheques(),$this->categoria_chequeActual,$this->categoria_chequeParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));
						
			if($categoria_cheque_session==null) {
				$categoria_cheque_session=new categoria_cheque_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevocategoria_cheque', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->categoria_chequeClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->categoria_chequeClase);
			
			$this->categoria_chequeActual =$this->categoria_chequeClase;
			
			/*$this->categoria_chequeActual =$this->migrarModelcategoria_cheque($this->categoria_chequeClase);*/
			
			$this->setcategoria_chequeFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->categoria_chequeLogic->getcategoria_cheques(),$this->categoria_cheque);
			
			$this->actualizarControllerConReturnGeneral($this->categoria_chequeReturnGeneral);
			
			//this->categoria_chequeReturnGeneral=$this->categoria_chequeLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->categoria_chequeLogic->getcategoria_cheques(),$this->categoria_cheque,$this->categoria_chequeParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->categoria_chequeReturnGeneral->getcategoria_cheque()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idcuentaDefaultFK!=null && $this->idcuentaDefaultFK > -1) {
				$this->categoria_chequeReturnGeneral->getcategoria_cheque()->setid_cuenta($this->idcuentaDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->categoria_chequeReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->categoria_chequeReturnGeneral->getcategoria_cheque(),$this->categoria_chequeActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeycategoria_cheque($this->categoria_chequeReturnGeneral->getcategoria_cheque());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariocategoria_cheque($this->categoria_chequeReturnGeneral->getcategoria_cheque());*/
			}
			
			if($this->categoria_chequeReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->categoria_chequeReturnGeneral->getcategoria_cheque(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualcategoria_cheque($this->categoria_cheque,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->categoria_chequesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->categoria_chequesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->categoria_chequesAuxiliar=array();
			}
			
			if(count($this->categoria_chequesAuxiliar)==2) {
				$categoria_chequeOrigen=$this->categoria_chequesAuxiliar[0];
				$categoria_chequeDestino=$this->categoria_chequesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($categoria_chequeOrigen,$categoria_chequeDestino,true,false,false);
				
				$this->actualizarLista($categoria_chequeDestino,$this->categoria_cheques);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->categoria_chequesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->categoria_chequesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->categoria_chequesAuxiliar=array();
			}
			
			if(count($this->categoria_chequesAuxiliar) > 0) {
				foreach ($this->categoria_chequesAuxiliar as $categoria_chequeSeleccionado) {
					$this->categoria_cheque=new categoria_cheque();
					
					$this->setCopiarVariablesObjetos($categoria_chequeSeleccionado,$this->categoria_cheque,true,true,false);
						
					$this->categoria_cheques[]=$this->categoria_cheque;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->categoria_chequesEliminados as $categoria_chequeEliminado) {
				$this->categoria_chequeLogic->categoria_cheques[]=$categoria_chequeEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->categoria_cheque=new categoria_cheque();
							
				$this->categoria_cheques[]=$this->categoria_cheque;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
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
		
		$categoria_chequeActual=new categoria_cheque();
		
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
				
				$categoria_chequeActual=$this->categoria_cheques[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $categoria_chequeActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $categoria_chequeActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $categoria_chequeActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $categoria_chequeActual->setcuenta_contable($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $categoria_chequeActual->setpredeterminado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_7')));  } else { $categoria_chequeActual->setpredeterminado(false); }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->categoria_chequesAuxiliar=array();		 
		/*$this->categoria_chequesEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->categoria_chequesAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->categoria_chequesAuxiliar=array();
		}
			
		if(count($this->categoria_chequesAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->categoria_chequesAuxiliar as $categoria_chequeAuxLocal) {				
				
				foreach($this->categoria_cheques as $categoria_chequeLocal) {
					if($categoria_chequeLocal->getId()==$categoria_chequeAuxLocal->getId()) {
						$categoria_chequeLocal->setIsDeleted(true);
						
						/*$this->categoria_chequesEliminados[]=$categoria_chequeLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->categoria_chequeLogic->setcategoria_cheques($this->categoria_cheques);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
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
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=categoria_cheque_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadcategoria_cheque='',string $strTipoPaginaAuxiliarcategoria_cheque='',string $strTipoUsuarioAuxiliarcategoria_cheque='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadcategoria_cheque,$strTipoPaginaAuxiliarcategoria_cheque,$strTipoUsuarioAuxiliarcategoria_cheque,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->categoria_cheques) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=categoria_cheque_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=categoria_cheque_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=categoria_cheque_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));
						
			if($categoria_cheque_session==null) {
				$categoria_cheque_session=new categoria_cheque_session();
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
					/*$this->intNumeroPaginacion=categoria_cheque_util::$INT_NUMERO_PAGINACION;*/
					
					if($categoria_cheque_session->intNumeroPaginacion==categoria_cheque_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=categoria_cheque_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$categoria_cheque_session->intNumeroPaginacion;
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
			
			$this->categoria_chequesEliminados=array();
			
			/*$this->categoria_chequeLogic->setConnexion($connexion);*/
			
			$this->categoria_chequeLogic->setIsConDeep(true);
			
			$this->categoria_chequeLogic->getcategoria_chequeDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			
			$this->categoria_chequeLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->categoria_chequeLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->categoria_chequeLogic->getcategoria_cheques()==null|| count($this->categoria_chequeLogic->getcategoria_cheques())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->categoria_cheques=$this->categoria_chequeLogic->getcategoria_cheques();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->categoria_chequeLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->categoria_chequesReporte=$this->categoria_chequeLogic->getcategoria_cheques();
									
						/*$this->generarReportes('Todos',$this->categoria_chequeLogic->getcategoria_cheques());*/
					
						$this->categoria_chequeLogic->setcategoria_cheques($this->categoria_cheques);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->categoria_chequeLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->categoria_chequeLogic->getcategoria_cheques()==null|| count($this->categoria_chequeLogic->getcategoria_cheques())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->categoria_cheques=$this->categoria_chequeLogic->getcategoria_cheques();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->categoria_chequeLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->categoria_chequesReporte=$this->categoria_chequeLogic->getcategoria_cheques();
									
						/*$this->generarReportes('Todos',$this->categoria_chequeLogic->getcategoria_cheques());*/
					
						$this->categoria_chequeLogic->setcategoria_cheques($this->categoria_cheques);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idcategoria_cheque=0;*/
				
				if($categoria_cheque_session->bitBusquedaDesdeFKSesionFK!=null && $categoria_cheque_session->bitBusquedaDesdeFKSesionFK==true) {
					if($categoria_cheque_session->bigIdActualFK!=null && $categoria_cheque_session->bigIdActualFK!=0)	{
						$this->idcategoria_cheque=$categoria_cheque_session->bigIdActualFK;	
					}
					
					$categoria_cheque_session->bitBusquedaDesdeFKSesionFK=false;
					
					$categoria_cheque_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idcategoria_cheque=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idcategoria_cheque=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->categoria_chequeLogic->getEntity($this->idcategoria_cheque);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*categoria_chequeLogicAdditional::getDetalleIndicePorId($idcategoria_cheque);*/

				
				if($this->categoria_chequeLogic->getcategoria_cheque()!=null) {
					$this->categoria_chequeLogic->setcategoria_cheques(array());
					$this->categoria_chequeLogic->categoria_cheques[]=$this->categoria_chequeLogic->getcategoria_cheque();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcuenta')
			{

				if($categoria_cheque_session->bigidcuentaActual!=null && $categoria_cheque_session->bigidcuentaActual!=0)
				{
					$this->id_cuentaFK_Idcuenta=$categoria_cheque_session->bigidcuentaActual;
					$categoria_cheque_session->bigidcuentaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->categoria_chequeLogic->getsFK_Idcuenta($finalQueryPaginacion,$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//categoria_chequeLogicAdditional::getDetalleIndiceFK_Idcuenta($this->id_cuentaFK_Idcuenta);


					if($this->categoria_chequeLogic->getcategoria_cheques()==null || count($this->categoria_chequeLogic->getcategoria_cheques())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$categoria_cheques=$this->categoria_chequeLogic->getcategoria_cheques();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->categoria_chequeLogic->getsFK_Idcuenta('',$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->categoria_chequesReporte=$this->categoria_chequeLogic->getcategoria_cheques();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecategoria_cheques("FK_Idcuenta",$this->categoria_chequeLogic->getcategoria_cheques());

					if($this->strTipoPaginacion=='TODOS') {
						$this->categoria_chequeLogic->setcategoria_cheques($categoria_cheques);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($categoria_cheque_session->bigidempresaActual!=null && $categoria_cheque_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$categoria_cheque_session->bigidempresaActual;
					$categoria_cheque_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->categoria_chequeLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//categoria_chequeLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->categoria_chequeLogic->getcategoria_cheques()==null || count($this->categoria_chequeLogic->getcategoria_cheques())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$categoria_cheques=$this->categoria_chequeLogic->getcategoria_cheques();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->categoria_chequeLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->categoria_chequesReporte=$this->categoria_chequeLogic->getcategoria_cheques();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecategoria_cheques("FK_Idempresa",$this->categoria_chequeLogic->getcategoria_cheques());

					if($this->strTipoPaginacion=='TODOS') {
						$this->categoria_chequeLogic->setcategoria_cheques($categoria_cheques);
					}
				//}

			} 
		
		$categoria_cheque_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$categoria_cheque_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->categoria_chequeLogic->loadForeignsKeysDescription();*/
		
		$this->categoria_cheques=$this->categoria_chequeLogic->getcategoria_cheques();
		
		if($this->categoria_chequesEliminados==null) {
			$this->categoria_chequesEliminados=array();
		}
		
		$this->Session->write(categoria_cheque_util::$STR_SESSION_NAME.'Lista',serialize($this->categoria_cheques));
		$this->Session->write(categoria_cheque_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->categoria_chequesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(categoria_cheque_util::$STR_SESSION_NAME,serialize($categoria_cheque_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idcategoria_cheque=$idGeneral;
			
			$this->intNumeroPaginacion=categoria_cheque_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
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
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}

			if(count($this->categoria_cheques) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdcuentaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=categoria_cheque_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuentaFK_Idcuenta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta','cmbid_cuenta');

			$this->strAccionBusqueda='FK_Idcuenta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
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
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=categoria_cheque_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcuenta($strFinalQuery,$id_cuenta)
	{
		try
		{

			$this->categoria_chequeLogic->getsFK_Idcuenta($strFinalQuery,new Pagination(),$id_cuenta);
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

			$this->categoria_chequeLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
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
			
			
			$categoria_chequeForeignKey=new categoria_cheque_param_return(); //categoria_chequeForeignKey();
			
			$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));
						
			if($categoria_cheque_session==null) {
				$categoria_cheque_session=new categoria_cheque_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$categoria_chequeForeignKey=$this->categoria_chequeLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$categoria_cheque_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$categoria_chequeForeignKey->empresasFK;
				$this->idempresaDefaultFK=$categoria_chequeForeignKey->idempresaDefaultFK;
			}

			if($categoria_cheque_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$this->strRecargarFkTipos,',')) {
				$this->cuentasFK=$categoria_chequeForeignKey->cuentasFK;
				$this->idcuentaDefaultFK=$categoria_chequeForeignKey->idcuentaDefaultFK;
			}

			if($categoria_cheque_session->bitBusquedaDesdeFKSesioncuenta) {
				$this->setVisibleBusquedasParacuenta(true);
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
	
	function cargarCombosFKFromReturnGeneral($categoria_chequeReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$categoria_chequeReturnGeneral->strRecargarFkTipos;
			
			


			if($categoria_chequeReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$categoria_chequeReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$categoria_chequeReturnGeneral->idempresaDefaultFK;
			}


			if($categoria_chequeReturnGeneral->con_cuentasFK==true) {
				$this->cuentasFK=$categoria_chequeReturnGeneral->cuentasFK;
				$this->idcuentaDefaultFK=$categoria_chequeReturnGeneral->idcuentaDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(categoria_cheque_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));
		
		if($categoria_cheque_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($categoria_cheque_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($categoria_cheque_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			
			$categoria_cheque_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}						
			
			$this->categoria_chequesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->categoria_chequesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->categoria_chequesAuxiliar=array();
			}
			
			if(count($this->categoria_chequesAuxiliar) > 0) {
				
				foreach ($this->categoria_chequesAuxiliar as $categoria_chequeSeleccionado) {
					$this->eliminarTablaBase($categoria_chequeSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
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


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('clasificacion_cheque');
			$tipoRelacionReporte->setsDescripcion('Clasificacion Cheques');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=cheque_cuenta_corriente_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=clasificacion_cheque_util::$STR_NOMBRE_CLASE;
		
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


	public function getcuentasFKListSelectItem() 
	{
		$cuentasList=array();

		$item=null;

		foreach($this->cuentasFK as $cuenta)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta->getcodigo());
			$item->setValue($cuenta->getId());
			$cuentasList[]=$item;
		}

		return $cuentasList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=categoria_cheque_util::$INT_NUMERO_PAGINACION;
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
				$this->categoria_chequeLogic->commitNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->rollbackNewConnexionToDeep();
				$this->categoria_chequeLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$categoria_chequesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->categoria_cheques as $categoria_chequeLocal) {
				if($categoria_chequeLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->categoria_cheque=new categoria_cheque();
				
				$this->categoria_cheque->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->categoria_cheques[]=$this->categoria_cheque;*/
				
				$categoria_chequesNuevos[]=$this->categoria_cheque;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->categoria_chequeLogic->setcategoria_cheques($categoria_chequesNuevos);
					
				$this->categoria_chequeLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($categoria_chequesNuevos as $categoria_chequeNuevo) {
					$this->categoria_cheques[]=$categoria_chequeNuevo;
				}
				
				/*$this->categoria_cheques[]=$categoria_chequesNuevos;*/
				
				$this->categoria_chequeLogic->setcategoria_cheques($this->categoria_cheques);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($categoria_chequesNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));

		if($categoria_cheque_session==null) {
			$categoria_cheque_session=new categoria_cheque_session();
		}
		
		if($categoria_cheque_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($categoria_cheque_session->bigidempresaActual!=null && $categoria_cheque_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($categoria_cheque_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=categoria_cheque_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarComboscuentasFK($connexion=null,$strRecargarFkQuery=''){
		$cuentaLogic= new cuenta_logic();
		$pagination= new Pagination();
		$this->cuentasFK=array();

		$cuentaLogic->setConnexion($connexion);
		$cuentaLogic->getcuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));

		if($categoria_cheque_session==null) {
			$categoria_cheque_session=new categoria_cheque_session();
		}
		
		if($categoria_cheque_session->bitBusquedaDesdeFKSesioncuenta!=true) {
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


			$this->prepararComboscuentasFK($cuentaLogic->getcuentas());

		} else {
			$this->setVisibleBusquedasParacuenta(true);


			if($categoria_cheque_session->bigidcuentaActual!=null && $categoria_cheque_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($categoria_cheque_session->bigidcuentaActual);//WithConnection

				$this->cuentasFK[$cuentaLogic->getcuenta()->getId()]=categoria_cheque_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$this->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=categoria_cheque_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararComboscuentasFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuentaDefaultFK==0) {
				$this->idcuentaDefaultFK=$cuentaLocal->getId();
			}

			$this->cuentasFK[$cuentaLocal->getId()]=categoria_cheque_util::getcuentaDescripcion($cuentaLocal);
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

			$strDescripcionempresa=categoria_cheque_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripcioncuentaFK($idcuenta,$connexion=null){
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

			$strDescripcioncuenta=categoria_cheque_util::getcuentaDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(categoria_cheque $categoria_chequeClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$categoria_chequeClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
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

		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
	}

	public function setVisibleBusquedasParacuenta($isParacuenta){
		$strParaVisiblecuenta='display:table-row';
		$strParaVisibleNegacioncuenta='display:none';

		if($isParacuenta) {
			$strParaVisiblecuenta='display:table-row';
			$strParaVisibleNegacioncuenta='display:none';
		} else {
			$strParaVisiblecuenta='display:none';
			$strParaVisibleNegacioncuenta='display:table-row';
		}


		$strParaVisibleNegacioncuenta=trim($strParaVisibleNegacioncuenta);

		$this->strVisibleFK_Idcuenta=$strParaVisiblecuenta;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idcategoria_chequeActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcategoria_chequeActual=$idcategoria_chequeActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.categoria_chequeJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.categoria_chequeJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcategoria_cheque,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta() {//$idcategoria_chequeActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcategoria_chequeActual=$idcategoria_chequeActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.categoria_chequeJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.categoria_chequeJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcategoria_cheque,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParacheque_cuenta_corrientes(int $idcategoria_chequeActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcategoria_chequeActual=$idcategoria_chequeActual;

		$bitPaginaPopupcheque_cuenta_corriente=false;

		try {

			$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));

			if($categoria_cheque_session==null) {
				$categoria_cheque_session=new categoria_cheque_session();
			}

			$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

			if($cheque_cuenta_corriente_session==null) {
				$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
			}

			$cheque_cuenta_corriente_session->strUltimaBusqueda='FK_Idcategoria_cheque';
			$cheque_cuenta_corriente_session->strPathNavegacionActual=$categoria_cheque_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
			$cheque_cuenta_corriente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcheque_cuenta_corriente=$cheque_cuenta_corriente_session->bitPaginaPopup;
			$cheque_cuenta_corriente_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcheque_cuenta_corriente=$cheque_cuenta_corriente_session->bitPaginaPopup;
			$cheque_cuenta_corriente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$cheque_cuenta_corriente_session->strNombrePaginaNavegacionHaciaFKDesde=categoria_cheque_util::$STR_NOMBRE_OPCION;
			$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncategoria_cheque=true;
			$cheque_cuenta_corriente_session->bigidcategoria_chequeActual=$this->idcategoria_chequeActual;

			$categoria_cheque_session->bitBusquedaDesdeFKSesionFK=true;
			$categoria_cheque_session->bigIdActualFK=$this->idcategoria_chequeActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"cheque_cuenta_corriente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=categoria_cheque_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"cheque_cuenta_corriente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(categoria_cheque_util::$STR_SESSION_NAME,serialize($categoria_cheque_session));
			$this->Session->write(cheque_cuenta_corriente_util::$STR_SESSION_NAME,serialize($cheque_cuenta_corriente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcheque_cuenta_corriente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cheque_cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cheque_cuenta_corriente_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarcategoria_cheque,$this->strTipoUsuarioAuxiliarcategoria_cheque,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cheque_cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cheque_cuenta_corriente_util::$STR_CLASS_NAME,'cuentascorrientes','','NO-POPUP',$this->strTipoPaginaAuxiliarcategoria_cheque,$this->strTipoUsuarioAuxiliarcategoria_cheque,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaclasificacion_cheques(int $idcategoria_chequeActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcategoria_chequeActual=$idcategoria_chequeActual;

		$bitPaginaPopupclasificacion_cheque=false;

		try {

			$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));

			if($categoria_cheque_session==null) {
				$categoria_cheque_session=new categoria_cheque_session();
			}

			$clasificacion_cheque_session=unserialize($this->Session->read(clasificacion_cheque_util::$STR_SESSION_NAME));

			if($clasificacion_cheque_session==null) {
				$clasificacion_cheque_session=new clasificacion_cheque_session();
			}

			$clasificacion_cheque_session->strUltimaBusqueda='FK_Idcategoria_cheque';
			$clasificacion_cheque_session->strPathNavegacionActual=$categoria_cheque_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.clasificacion_cheque_util::$STR_CLASS_WEB_TITULO;
			$clasificacion_cheque_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupclasificacion_cheque=$clasificacion_cheque_session->bitPaginaPopup;
			$clasificacion_cheque_session->setPaginaPopupVariables(true);
			$bitPaginaPopupclasificacion_cheque=$clasificacion_cheque_session->bitPaginaPopup;
			$clasificacion_cheque_session->bitPermiteNavegacionHaciaFKDesde=false;
			$clasificacion_cheque_session->strNombrePaginaNavegacionHaciaFKDesde=categoria_cheque_util::$STR_NOMBRE_OPCION;
			$clasificacion_cheque_session->bitBusquedaDesdeFKSesioncategoria_cheque=true;
			$clasificacion_cheque_session->bigidcategoria_chequeActual=$this->idcategoria_chequeActual;

			$categoria_cheque_session->bitBusquedaDesdeFKSesionFK=true;
			$categoria_cheque_session->bigIdActualFK=$this->idcategoria_chequeActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"clasificacion_cheque"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=categoria_cheque_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"clasificacion_cheque"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(categoria_cheque_util::$STR_SESSION_NAME,serialize($categoria_cheque_session));
			$this->Session->write(clasificacion_cheque_util::$STR_SESSION_NAME,serialize($clasificacion_cheque_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupclasificacion_cheque!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',clasificacion_cheque_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(clasificacion_cheque_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarcategoria_cheque,$this->strTipoUsuarioAuxiliarcategoria_cheque,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',clasificacion_cheque_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(clasificacion_cheque_util::$STR_CLASS_NAME,'cuentascorrientes','','NO-POPUP',$this->strTipoPaginaAuxiliarcategoria_cheque,$this->strTipoUsuarioAuxiliarcategoria_cheque,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(categoria_cheque_util::$STR_SESSION_NAME,categoria_cheque_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$categoria_cheque_session=$this->Session->read(categoria_cheque_util::$STR_SESSION_NAME);
				
		if($categoria_cheque_session==null) {
			$categoria_cheque_session=new categoria_cheque_session();		
			//$this->Session->write('categoria_cheque_session',$categoria_cheque_session);							
		}
		*/
		
		$categoria_cheque_session=new categoria_cheque_session();
    	$categoria_cheque_session->strPathNavegacionActual=categoria_cheque_util::$STR_CLASS_WEB_TITULO;
    	$categoria_cheque_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(categoria_cheque_util::$STR_SESSION_NAME,serialize($categoria_cheque_session));		
	}	
	
	public function getSetBusquedasSesionConfig(categoria_cheque_session $categoria_cheque_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($categoria_cheque_session->bitBusquedaDesdeFKSesionFK!=null && $categoria_cheque_session->bitBusquedaDesdeFKSesionFK==true) {
			if($categoria_cheque_session->bigIdActualFK!=null && $categoria_cheque_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$categoria_cheque_session->bigIdActualFKParaPosibleAtras=$categoria_cheque_session->bigIdActualFK;*/
			}
				
			$categoria_cheque_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$categoria_cheque_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(categoria_cheque_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($categoria_cheque_session->bitBusquedaDesdeFKSesionempresa!=null && $categoria_cheque_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($categoria_cheque_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(categoria_cheque_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(categoria_cheque_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(categoria_cheque_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($categoria_cheque_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($categoria_cheque_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=categoria_cheque_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$categoria_cheque_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$categoria_cheque_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=categoria_cheque_util::$INT_NUMERO_PAGINACION;

				if($categoria_cheque_session->intNumeroPaginacion==categoria_cheque_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=categoria_cheque_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$categoria_cheque_session->intNumeroPaginacion;
				}
			}
			else if($categoria_cheque_session->bitBusquedaDesdeFKSesioncuenta!=null && $categoria_cheque_session->bitBusquedaDesdeFKSesioncuenta==true)
			{
				if($categoria_cheque_session->bigidcuentaActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta';

					$existe_history=HistoryWeb::ExisteElemento(categoria_cheque_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(categoria_cheque_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(categoria_cheque_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($categoria_cheque_session->bigidcuentaActualDescripcion);
						$historyWeb->setIdActual($categoria_cheque_session->bigidcuentaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=categoria_cheque_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$categoria_cheque_session->bigidcuentaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$categoria_cheque_session->bitBusquedaDesdeFKSesioncuenta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=categoria_cheque_util::$INT_NUMERO_PAGINACION;

				if($categoria_cheque_session->intNumeroPaginacion==categoria_cheque_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=categoria_cheque_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$categoria_cheque_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$categoria_cheque_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));
		
		if($categoria_cheque_session==null) {
			$categoria_cheque_session=new categoria_cheque_session();
		}
		
		$categoria_cheque_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$categoria_cheque_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$categoria_cheque_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcuenta') {
			$categoria_cheque_session->id_cuenta=$this->id_cuentaFK_Idcuenta;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$categoria_cheque_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		
		$this->Session->write(categoria_cheque_util::$STR_SESSION_NAME,serialize($categoria_cheque_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(categoria_cheque_session $categoria_cheque_session) {
		
		if($categoria_cheque_session==null) {
			$categoria_cheque_session=unserialize($this->Session->read(categoria_cheque_util::$STR_SESSION_NAME));
		}
		
		if($categoria_cheque_session==null) {
		   $categoria_cheque_session=new categoria_cheque_session();
		}
		
		if($categoria_cheque_session->strUltimaBusqueda!=null && $categoria_cheque_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$categoria_cheque_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$categoria_cheque_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$categoria_cheque_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcuenta') {
				$this->id_cuentaFK_Idcuenta=$categoria_cheque_session->id_cuenta;
				$categoria_cheque_session->id_cuenta=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$categoria_cheque_session->id_empresa;
				$categoria_cheque_session->id_empresa=-1;

			}
		}
		
		$categoria_cheque_session->strUltimaBusqueda='';
		//$categoria_cheque_session->intNumeroPaginacion=10;
		$categoria_cheque_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(categoria_cheque_util::$STR_SESSION_NAME,serialize($categoria_cheque_session));		
	}
	
	public function categoria_chequesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idcuentaDefaultFK = 0;
	}
	
	public function setcategoria_chequeFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta',$this->idcuentaDefaultFK);
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
		

		cheque_cuenta_corriente_carga::$CONTROLLER;
		cheque_cuenta_corriente_util::$STR_SCHEMA;
		cheque_cuenta_corriente_session::class;

		clasificacion_cheque_carga::$CONTROLLER;
		clasificacion_cheque_util::$STR_SCHEMA;
		clasificacion_cheque_session::class;
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
		interface categoria_cheque_controlI {	
		
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
		
		public function onLoad(categoria_cheque_session $categoria_cheque_session=null);	
		function index(?string $strTypeOnLoadcategoria_cheque='',?string $strTipoPaginaAuxiliarcategoria_cheque='',?string $strTipoUsuarioAuxiliarcategoria_cheque='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadcategoria_cheque='',string $strTipoPaginaAuxiliarcategoria_cheque='',string $strTipoUsuarioAuxiliarcategoria_cheque='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($categoria_chequeReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(categoria_cheque $categoria_chequeClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(categoria_cheque_session $categoria_cheque_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(categoria_cheque_session $categoria_cheque_session);	
		public function categoria_chequesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setcategoria_chequeFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
