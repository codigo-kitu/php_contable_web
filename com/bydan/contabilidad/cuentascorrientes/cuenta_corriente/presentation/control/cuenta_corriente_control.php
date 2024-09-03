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

namespace com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/cuenta_corriente/util/cuenta_corriente_carga.php');
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_param_return;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic_add;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\presentation\session\cuenta_corriente_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentascorrientes\banco\business\entity\banco;
use com\bydan\contabilidad\cuentascorrientes\banco\business\logic\banco_logic;
use com\bydan\contabilidad\cuentascorrientes\banco\util\banco_carga;
use com\bydan\contabilidad\cuentascorrientes\banco\util\banco_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\business\entity\estado_cuentas_corrientes;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\business\logic\estado_cuentas_corrientes_logic;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\util\estado_cuentas_corrientes_carga;
use com\bydan\contabilidad\cuentascorrientes\estado_cuentas_corrientes\util\estado_cuentas_corrientes_util;

//REL


use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\util\cheque_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cheque_cuenta_corriente\presentation\session\cheque_cuenta_corriente_session;

use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\util\retiro_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\retiro_cuenta_corriente\presentation\session\retiro_cuenta_corriente_session;

use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\presentation\session\deposito_cuenta_corriente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_corriente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentascorrientes/cuenta_corriente/presentation/control/cuenta_corriente_init_control.php');
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\presentation\control\cuenta_corriente_init_control;

include_once('com/bydan/contabilidad/cuentascorrientes/cuenta_corriente/presentation/control/cuenta_corriente_base_control.php');
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\presentation\control\cuenta_corriente_base_control;

class cuenta_corriente_control extends cuenta_corriente_base_control {	
	
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
				$idcuenta_corrienteActual=$this->getDataId();
				$this->registrarSesionParacheque_cuenta_corrientes($idcuenta_corrienteActual);
			}
			else if($action=='registrarSesionPararetiro_cuenta_corrientes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuenta_corrienteActual=$this->getDataId();
				$this->registrarSesionPararetiro_cuenta_corrientes($idcuenta_corrienteActual);
			}
			else if($action=='registrarSesionParadeposito_cuenta_corrientes' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcuenta_corrienteActual=$this->getDataId();
				$this->registrarSesionParadeposito_cuenta_corrientes($idcuenta_corrienteActual);
			} 
			
			
			else if($action=="FK_Idbanco"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdbancoParaProcesar();
			}
			else if($action=="FK_Idcuenta"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdcuentaParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idestado_cuentas_corrientes"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idestado_cuentas_corrientesParaProcesar();
			}
			else if($action=="FK_Idusuario"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdusuarioParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idcuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$idcuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParabanco') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParabanco();//$idcuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParacuenta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParacuenta();//$idcuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParaestado_cuentas_corrientes') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParaestado_cuentas_corrientes();//$idcuenta_corrienteActual
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
					
					$cuenta_corrienteController = new cuenta_corriente_control();
					
					$cuenta_corrienteController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($cuenta_corrienteController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$cuenta_corrienteController = new cuenta_corriente_control();
						$cuenta_corrienteController = $this;
						
						$jsonResponse = json_encode($cuenta_corrienteController->cuenta_corrientes);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->cuenta_corrienteReturnGeneral==null) {
					$this->cuenta_corrienteReturnGeneral=new cuenta_corriente_param_return();
				}
				
				echo($this->cuenta_corrienteReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$cuenta_corrienteController=new cuenta_corriente_control();
		
		$cuenta_corrienteController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$cuenta_corrienteController->usuarioActual=new usuario();
		
		$cuenta_corrienteController->usuarioActual->setId($this->usuarioActual->getId());
		$cuenta_corrienteController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$cuenta_corrienteController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$cuenta_corrienteController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$cuenta_corrienteController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$cuenta_corrienteController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$cuenta_corrienteController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$cuenta_corrienteController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $cuenta_corrienteController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadcuenta_corriente= $this->getDataGeneralString('strTypeOnLoadcuenta_corriente');
		$strTipoPaginaAuxiliarcuenta_corriente= $this->getDataGeneralString('strTipoPaginaAuxiliarcuenta_corriente');
		$strTipoUsuarioAuxiliarcuenta_corriente= $this->getDataGeneralString('strTipoUsuarioAuxiliarcuenta_corriente');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadcuenta_corriente,$strTipoPaginaAuxiliarcuenta_corriente,$strTipoUsuarioAuxiliarcuenta_corriente,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadcuenta_corriente!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('cuenta_corriente','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_corriente_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarcuenta_corriente,$this->strTipoUsuarioAuxiliarcuenta_corriente,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_corriente_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarcuenta_corriente,$this->strTipoUsuarioAuxiliarcuenta_corriente,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->cuenta_corrienteReturnGeneral=new cuenta_corriente_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_corrienteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_corrienteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_corrienteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_corrienteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_corrienteReturnGeneral);
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
		$this->cuenta_corrienteReturnGeneral=new cuenta_corriente_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_corrienteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_corrienteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_corrienteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_corrienteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_corrienteReturnGeneral);
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
		$this->cuenta_corrienteReturnGeneral=new cuenta_corriente_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_corrienteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_corrienteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_corrienteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_corrienteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_corrienteReturnGeneral);
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
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
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
			
			
			$this->cuenta_corrienteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->cuenta_corrienteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_corrienteReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->cuenta_corrienteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->cuenta_corrienteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_corrienteReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->cuenta_corrienteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->cuenta_corrienteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->cuenta_corrienteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_corrienteReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->cuenta_corrienteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_corrienteReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->cuenta_corrienteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->cuenta_corrienteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->cuenta_corrienteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_corrienteReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->cuenta_corrienteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_corrienteReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
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
		
		$this->cuenta_corrienteLogic=new cuenta_corriente_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->cuenta_corriente=new cuenta_corriente();
		
		$this->strTypeOnLoadcuenta_corriente='onload';
		$this->strTipoPaginaAuxiliarcuenta_corriente='none';
		$this->strTipoUsuarioAuxiliarcuenta_corriente='none';	

		$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
		
		$this->cuenta_corrienteModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_corrienteControllerAdditional=new cuenta_corriente_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(cuenta_corriente_session $cuenta_corriente_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($cuenta_corriente_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadcuenta_corriente='',?string $strTipoPaginaAuxiliarcuenta_corriente='',?string $strTipoUsuarioAuxiliarcuenta_corriente='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadcuenta_corriente=$strTypeOnLoadcuenta_corriente;
			$this->strTipoPaginaAuxiliarcuenta_corriente=$strTipoPaginaAuxiliarcuenta_corriente;
			$this->strTipoUsuarioAuxiliarcuenta_corriente=$strTipoUsuarioAuxiliarcuenta_corriente;
	
			if($strTipoUsuarioAuxiliarcuenta_corriente=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->cuenta_corriente=new cuenta_corriente();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Cuenta Corrientes';
			
			
			$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));
							
			if($cuenta_corriente_session==null) {
				$cuenta_corriente_session=new cuenta_corriente_session();
				
				/*$this->Session->write('cuenta_corriente_session',$cuenta_corriente_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($cuenta_corriente_session->strFuncionJsPadre!=null && $cuenta_corriente_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$cuenta_corriente_session->strFuncionJsPadre;
				
				$cuenta_corriente_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($cuenta_corriente_session);
			
			if($strTypeOnLoadcuenta_corriente!=null && $strTypeOnLoadcuenta_corriente=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$cuenta_corriente_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$cuenta_corriente_session->setPaginaPopupVariables(true);
				}
				
				if($cuenta_corriente_session->intNumeroPaginacion==cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,cuenta_corriente_util::$STR_SESSION_NAME,'cuentascorrientes');																
			
			} else if($strTypeOnLoadcuenta_corriente!=null && $strTypeOnLoadcuenta_corriente=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$cuenta_corriente_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;*/
				
				if($cuenta_corriente_session->intNumeroPaginacion==cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarcuenta_corriente!=null && $strTipoPaginaAuxiliarcuenta_corriente=='none') {
				/*$cuenta_corriente_session->strStyleDivHeader='display:table-row';*/
				
				/*$cuenta_corriente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarcuenta_corriente!=null && $strTipoPaginaAuxiliarcuenta_corriente=='iframe') {
					/*
					$cuenta_corriente_session->strStyleDivArbol='display:none';
					$cuenta_corriente_session->strStyleDivHeader='display:none';
					$cuenta_corriente_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$cuenta_corriente_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->cuenta_corrienteClase=new cuenta_corriente();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=cuenta_corriente_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(cuenta_corriente_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->cuenta_corrienteLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->cuenta_corrienteLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$documentocuentapagarLogic=new documento_cuenta_pagar_logic();
			//$chequecuentacorrienteLogic=new cheque_cuenta_corriente_logic();
			//$cuentacorrientedetalleLogic=new cuenta_corriente_detalle_logic();
			//$retirocuentacorrienteLogic=new retiro_cuenta_corriente_logic();
			//$depositocuentacorrienteLogic=new deposito_cuenta_corriente_logic();
			//$instrumentopagoLogic=new instrumento_pago_logic();
			//$documentocuentacobrarLogic=new documento_cuenta_cobrar_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->cuenta_corrienteLogic=new cuenta_corriente_logic();*/
			
			
			$this->cuenta_corrientesModel=null;
			/*new ListDataModel();*/
			
			/*$this->cuenta_corrientesModel.setWrappedData(cuenta_corrienteLogic->getcuenta_corrientes());*/
						
			$this->cuenta_corrientes= array();
			$this->cuenta_corrientesEliminados=array();
			$this->cuenta_corrientesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= cuenta_corriente_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= cuenta_corriente_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->cuenta_corriente= new cuenta_corriente();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idbanco='display:table-row';
			$this->strVisibleFK_Idcuenta='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idestado_cuentas_corrientes='display:table-row';
			$this->strVisibleFK_Idusuario='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarcuenta_corriente!=null && $strTipoUsuarioAuxiliarcuenta_corriente!='none' && $strTipoUsuarioAuxiliarcuenta_corriente!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcuenta_corriente);
																
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
				if($strTipoUsuarioAuxiliarcuenta_corriente!=null && $strTipoUsuarioAuxiliarcuenta_corriente!='none' && $strTipoUsuarioAuxiliarcuenta_corriente!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcuenta_corriente);
																
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
				if($strTipoUsuarioAuxiliarcuenta_corriente==null || $strTipoUsuarioAuxiliarcuenta_corriente=='none' || $strTipoUsuarioAuxiliarcuenta_corriente=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarcuenta_corriente,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_corriente_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_corriente_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina cuenta_corriente');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($cuenta_corriente_session);
			
			$this->getSetBusquedasSesionConfig($cuenta_corriente_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportecuenta_corrientes($this->strAccionBusqueda,$this->cuenta_corrienteLogic->getcuenta_corrientes());*/
				} else if($this->strGenerarReporte=='Html')	{
					$cuenta_corriente_session->strServletGenerarHtmlReporte='cuenta_corrienteServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(cuenta_corriente_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($cuenta_corriente_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarcuenta_corriente!=null && $strTipoUsuarioAuxiliarcuenta_corriente=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($cuenta_corriente_session);
			}
								
			$this->set(cuenta_corriente_util::$STR_SESSION_NAME, $cuenta_corriente_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($cuenta_corriente_session);
			
			/*
			$this->cuenta_corriente->recursive = 0;
			
			$this->cuenta_corrientes=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('cuenta_corrientes', $this->cuenta_corrientes);
			
			$this->set(cuenta_corriente_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->cuenta_corrienteActual =$this->cuenta_corrienteClase;
			
			/*$this->cuenta_corrienteActual =$this->migrarModelcuenta_corriente($this->cuenta_corrienteClase);*/
			
			$this->returnHtml(false);
			
			$this->set(cuenta_corriente_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=cuenta_corriente_util::$STR_NOMBRE_OPCION;
				
			if(cuenta_corriente_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=cuenta_corriente_util::$STR_MODULO_OPCION.cuenta_corriente_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(cuenta_corriente_util::$STR_SESSION_NAME,serialize($cuenta_corriente_session));
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
			/*$cuenta_corrienteClase= (cuenta_corriente) cuenta_corrientesModel.getRowData();*/
			
			$this->cuenta_corrienteClase->setId($this->cuenta_corriente->getId());	
			$this->cuenta_corrienteClase->setVersionRow($this->cuenta_corriente->getVersionRow());	
			$this->cuenta_corrienteClase->setVersionRow($this->cuenta_corriente->getVersionRow());	
			$this->cuenta_corrienteClase->setid_empresa($this->cuenta_corriente->getid_empresa());	
			$this->cuenta_corrienteClase->setid_usuario($this->cuenta_corriente->getid_usuario());	
			$this->cuenta_corrienteClase->setid_banco($this->cuenta_corriente->getid_banco());	
			$this->cuenta_corrienteClase->setnumero_cuenta($this->cuenta_corriente->getnumero_cuenta());	
			$this->cuenta_corrienteClase->setbalance_inicial($this->cuenta_corriente->getbalance_inicial());	
			$this->cuenta_corrienteClase->setsaldo($this->cuenta_corriente->getsaldo());	
			$this->cuenta_corrienteClase->setcontador_cheque($this->cuenta_corriente->getcontador_cheque());	
			$this->cuenta_corrienteClase->setid_cuenta($this->cuenta_corriente->getid_cuenta());	
			$this->cuenta_corrienteClase->setdescripcion($this->cuenta_corriente->getdescripcion());	
			$this->cuenta_corrienteClase->seticono($this->cuenta_corriente->geticono());	
			$this->cuenta_corrienteClase->setid_estado_cuentas_corrientes($this->cuenta_corriente->getid_estado_cuentas_corrientes());	
		
			/*$this->Session->write('cuenta_corrienteVersionRowActual', cuenta_corriente.getVersionRow());*/
			
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
			
			$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));
						
			if($cuenta_corriente_session==null) {
				$cuenta_corriente_session=new cuenta_corriente_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('cuenta_corriente', $this->cuenta_corriente->read(null, $id));
	
			
			$this->cuenta_corriente->recursive = 0;
			
			$this->cuenta_corrientes=$this->paginate();
			
			$this->set('cuenta_corrientes', $this->cuenta_corrientes);
	
			if (empty($this->data)) {
				$this->data = $this->cuenta_corriente->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->cuenta_corrienteLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cuenta_corrienteClase);
			
			$this->cuenta_corrienteActual=$this->cuenta_corrienteClase;
			
			/*$this->cuenta_corrienteActual =$this->migrarModelcuenta_corriente($this->cuenta_corrienteClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cuenta_corrienteLogic->getcuenta_corrientes(),$this->cuenta_corrienteActual);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_corrienteReturnGeneral);
			
			//$this->cuenta_corrienteReturnGeneral=$this->cuenta_corrienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cuenta_corrienteLogic->getcuenta_corrientes(),$this->cuenta_corrienteActual,$this->cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));
						
			if($cuenta_corriente_session==null) {
				$cuenta_corriente_session=new cuenta_corriente_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevocuenta_corriente', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->cuenta_corrienteClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cuenta_corrienteClase);
			
			$this->cuenta_corrienteActual =$this->cuenta_corrienteClase;
			
			/*$this->cuenta_corrienteActual =$this->migrarModelcuenta_corriente($this->cuenta_corrienteClase);*/
			
			$this->setcuenta_corrienteFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cuenta_corrienteLogic->getcuenta_corrientes(),$this->cuenta_corriente);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_corrienteReturnGeneral);
			
			//this->cuenta_corrienteReturnGeneral=$this->cuenta_corrienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cuenta_corrienteLogic->getcuenta_corrientes(),$this->cuenta_corriente,$this->cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->cuenta_corrienteReturnGeneral->getcuenta_corriente()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->cuenta_corrienteReturnGeneral->getcuenta_corriente()->setid_usuario($this->idusuarioDefaultFK);
			}

			if($this->idbancoDefaultFK!=null && $this->idbancoDefaultFK > -1) {
				$this->cuenta_corrienteReturnGeneral->getcuenta_corriente()->setid_banco($this->idbancoDefaultFK);
			}

			if($this->idcuentaDefaultFK!=null && $this->idcuentaDefaultFK > -1) {
				$this->cuenta_corrienteReturnGeneral->getcuenta_corriente()->setid_cuenta($this->idcuentaDefaultFK);
			}

			if($this->idestado_cuentas_corrientesDefaultFK!=null && $this->idestado_cuentas_corrientesDefaultFK > -1) {
				$this->cuenta_corrienteReturnGeneral->getcuenta_corriente()->setid_estado_cuentas_corrientes($this->idestado_cuentas_corrientesDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->cuenta_corrienteReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->cuenta_corrienteReturnGeneral->getcuenta_corriente(),$this->cuenta_corrienteActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeycuenta_corriente($this->cuenta_corrienteReturnGeneral->getcuenta_corriente());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariocuenta_corriente($this->cuenta_corrienteReturnGeneral->getcuenta_corriente());*/
			}
			
			if($this->cuenta_corrienteReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_corrienteReturnGeneral->getcuenta_corriente(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualcuenta_corriente($this->cuenta_corriente,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->cuenta_corrientesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_corrientesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->cuenta_corrientesAuxiliar=array();
			}
			
			if(count($this->cuenta_corrientesAuxiliar)==2) {
				$cuenta_corrienteOrigen=$this->cuenta_corrientesAuxiliar[0];
				$cuenta_corrienteDestino=$this->cuenta_corrientesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($cuenta_corrienteOrigen,$cuenta_corrienteDestino,true,false,false);
				
				$this->actualizarLista($cuenta_corrienteDestino,$this->cuenta_corrientes);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->cuenta_corrientesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_corrientesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cuenta_corrientesAuxiliar=array();
			}
			
			if(count($this->cuenta_corrientesAuxiliar) > 0) {
				foreach ($this->cuenta_corrientesAuxiliar as $cuenta_corrienteSeleccionado) {
					$this->cuenta_corriente=new cuenta_corriente();
					
					$this->setCopiarVariablesObjetos($cuenta_corrienteSeleccionado,$this->cuenta_corriente,true,true,false);
						
					$this->cuenta_corrientes[]=$this->cuenta_corriente;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->cuenta_corrientesEliminados as $cuenta_corrienteEliminado) {
				$this->cuenta_corrienteLogic->cuenta_corrientes[]=$cuenta_corrienteEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->cuenta_corriente=new cuenta_corriente();
							
				$this->cuenta_corrientes[]=$this->cuenta_corriente;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
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
		
		$cuenta_corrienteActual=new cuenta_corriente();
		
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
				
				$cuenta_corrienteActual=$this->cuenta_corrientes[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setid_banco((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setnumero_cuenta($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setbalance_inicial((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setsaldo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setcontador_cheque((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cuenta_corrienteActual->seticono($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cuenta_corrienteActual->setid_estado_cuentas_corrientes((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->cuenta_corrientesAuxiliar=array();		 
		/*$this->cuenta_corrientesEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->cuenta_corrientesAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->cuenta_corrientesAuxiliar=array();
		}
			
		if(count($this->cuenta_corrientesAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->cuenta_corrientesAuxiliar as $cuenta_corrienteAuxLocal) {				
				
				foreach($this->cuenta_corrientes as $cuenta_corrienteLocal) {
					if($cuenta_corrienteLocal->getId()==$cuenta_corrienteAuxLocal->getId()) {
						$cuenta_corrienteLocal->setIsDeleted(true);
						
						/*$this->cuenta_corrientesEliminados[]=$cuenta_corrienteLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->cuenta_corrienteLogic->setcuenta_corrientes($this->cuenta_corrientes);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadcuenta_corriente='',string $strTipoPaginaAuxiliarcuenta_corriente='',string $strTipoUsuarioAuxiliarcuenta_corriente='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadcuenta_corriente,$strTipoPaginaAuxiliarcuenta_corriente,$strTipoUsuarioAuxiliarcuenta_corriente,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->cuenta_corrientes) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=cuenta_corriente_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=cuenta_corriente_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=cuenta_corriente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));
						
			if($cuenta_corriente_session==null) {
				$cuenta_corriente_session=new cuenta_corriente_session();
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
					/*$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;*/
					
					if($cuenta_corriente_session->intNumeroPaginacion==cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$cuenta_corriente_session->intNumeroPaginacion;
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
			
			$this->cuenta_corrientesEliminados=array();
			
			/*$this->cuenta_corrienteLogic->setConnexion($connexion);*/
			
			$this->cuenta_corrienteLogic->setIsConDeep(true);
			
			$this->cuenta_corrienteLogic->getcuenta_corrienteDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('banco');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			$class=new Classe('estado_cuentas_corrientes');$classes[]=$class;
			
			$this->cuenta_corrienteLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_corrienteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->cuenta_corrienteLogic->getcuenta_corrientes()==null|| count($this->cuenta_corrienteLogic->getcuenta_corrientes())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cuenta_corrientes=$this->cuenta_corrienteLogic->getcuenta_corrientes();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_corrienteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->cuenta_corrientesReporte=$this->cuenta_corrienteLogic->getcuenta_corrientes();
									
						/*$this->generarReportes('Todos',$this->cuenta_corrienteLogic->getcuenta_corrientes());*/
					
						$this->cuenta_corrienteLogic->setcuenta_corrientes($this->cuenta_corrientes);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_corrienteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->cuenta_corrienteLogic->getcuenta_corrientes()==null|| count($this->cuenta_corrienteLogic->getcuenta_corrientes())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cuenta_corrientes=$this->cuenta_corrienteLogic->getcuenta_corrientes();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_corrienteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->cuenta_corrientesReporte=$this->cuenta_corrienteLogic->getcuenta_corrientes();
									
						/*$this->generarReportes('Todos',$this->cuenta_corrienteLogic->getcuenta_corrientes());*/
					
						$this->cuenta_corrienteLogic->setcuenta_corrientes($this->cuenta_corrientes);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idcuenta_corriente=0;*/
				
				if($cuenta_corriente_session->bitBusquedaDesdeFKSesionFK!=null && $cuenta_corriente_session->bitBusquedaDesdeFKSesionFK==true) {
					if($cuenta_corriente_session->bigIdActualFK!=null && $cuenta_corriente_session->bigIdActualFK!=0)	{
						$this->idcuenta_corriente=$cuenta_corriente_session->bigIdActualFK;	
					}
					
					$cuenta_corriente_session->bitBusquedaDesdeFKSesionFK=false;
					
					$cuenta_corriente_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idcuenta_corriente=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idcuenta_corriente=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_corrienteLogic->getEntity($this->idcuenta_corriente);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*cuenta_corrienteLogicAdditional::getDetalleIndicePorId($idcuenta_corriente);*/

				
				if($this->cuenta_corrienteLogic->getcuenta_corriente()!=null) {
					$this->cuenta_corrienteLogic->setcuenta_corrientes(array());
					$this->cuenta_corrienteLogic->cuenta_corrientes[]=$this->cuenta_corrienteLogic->getcuenta_corriente();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idbanco')
			{

				if($cuenta_corriente_session->bigidbancoActual!=null && $cuenta_corriente_session->bigidbancoActual!=0)
				{
					$this->id_bancoFK_Idbanco=$cuenta_corriente_session->bigidbancoActual;
					$cuenta_corriente_session->bigidbancoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corrienteLogic->getsFK_Idbanco($finalQueryPaginacion,$this->pagination,$this->id_bancoFK_Idbanco);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idbanco($this->id_bancoFK_Idbanco);


					if($this->cuenta_corrienteLogic->getcuenta_corrientes()==null || count($this->cuenta_corrienteLogic->getcuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corrientes=$this->cuenta_corrienteLogic->getcuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corrienteLogic->getsFK_Idbanco('',$this->pagination,$this->id_bancoFK_Idbanco);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corrientesReporte=$this->cuenta_corrienteLogic->getcuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corrientes("FK_Idbanco",$this->cuenta_corrienteLogic->getcuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corrienteLogic->setcuenta_corrientes($cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idcuenta')
			{

				if($cuenta_corriente_session->bigidcuentaActual!=null && $cuenta_corriente_session->bigidcuentaActual!=0)
				{
					$this->id_cuentaFK_Idcuenta=$cuenta_corriente_session->bigidcuentaActual;
					$cuenta_corriente_session->bigidcuentaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corrienteLogic->getsFK_Idcuenta($finalQueryPaginacion,$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idcuenta($this->id_cuentaFK_Idcuenta);


					if($this->cuenta_corrienteLogic->getcuenta_corrientes()==null || count($this->cuenta_corrienteLogic->getcuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corrientes=$this->cuenta_corrienteLogic->getcuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corrienteLogic->getsFK_Idcuenta('',$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corrientesReporte=$this->cuenta_corrienteLogic->getcuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corrientes("FK_Idcuenta",$this->cuenta_corrienteLogic->getcuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corrienteLogic->setcuenta_corrientes($cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($cuenta_corriente_session->bigidempresaActual!=null && $cuenta_corriente_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$cuenta_corriente_session->bigidempresaActual;
					$cuenta_corriente_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corrienteLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->cuenta_corrienteLogic->getcuenta_corrientes()==null || count($this->cuenta_corrienteLogic->getcuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corrientes=$this->cuenta_corrienteLogic->getcuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corrienteLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corrientesReporte=$this->cuenta_corrienteLogic->getcuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corrientes("FK_Idempresa",$this->cuenta_corrienteLogic->getcuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corrienteLogic->setcuenta_corrientes($cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idestado_cuentas_corrientes')
			{

				if($cuenta_corriente_session->bigidestado_cuentas_corrientesActual!=null && $cuenta_corriente_session->bigidestado_cuentas_corrientesActual!=0)
				{
					$this->id_estado_cuentas_corrientesFK_Idestado_cuentas_corrientes=$cuenta_corriente_session->bigidestado_cuentas_corrientesActual;
					$cuenta_corriente_session->bigidestado_cuentas_corrientesActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corrienteLogic->getsFK_Idestado_cuentas_corrientes($finalQueryPaginacion,$this->pagination,$this->id_estado_cuentas_corrientesFK_Idestado_cuentas_corrientes);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idestado_cuentas_corrientes($this->id_estado_cuentas_corrientesFK_Idestado_cuentas_corrientes);


					if($this->cuenta_corrienteLogic->getcuenta_corrientes()==null || count($this->cuenta_corrienteLogic->getcuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corrientes=$this->cuenta_corrienteLogic->getcuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corrienteLogic->getsFK_Idestado_cuentas_corrientes('',$this->pagination,$this->id_estado_cuentas_corrientesFK_Idestado_cuentas_corrientes);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corrientesReporte=$this->cuenta_corrienteLogic->getcuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corrientes("FK_Idestado_cuentas_corrientes",$this->cuenta_corrienteLogic->getcuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corrienteLogic->setcuenta_corrientes($cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($cuenta_corriente_session->bigidusuarioActual!=null && $cuenta_corriente_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$cuenta_corriente_session->bigidusuarioActual;
					$cuenta_corriente_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corrienteLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->cuenta_corrienteLogic->getcuenta_corrientes()==null || count($this->cuenta_corrienteLogic->getcuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_corrientes=$this->cuenta_corrienteLogic->getcuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_corrienteLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_corrientesReporte=$this->cuenta_corrienteLogic->getcuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_corrientes("FK_Idusuario",$this->cuenta_corrienteLogic->getcuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_corrienteLogic->setcuenta_corrientes($cuenta_corrientes);
					}
				//}

			} 
		
		$cuenta_corriente_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cuenta_corriente_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->cuenta_corrienteLogic->loadForeignsKeysDescription();*/
		
		$this->cuenta_corrientes=$this->cuenta_corrienteLogic->getcuenta_corrientes();
		
		if($this->cuenta_corrientesEliminados==null) {
			$this->cuenta_corrientesEliminados=array();
		}
		
		$this->Session->write(cuenta_corriente_util::$STR_SESSION_NAME.'Lista',serialize($this->cuenta_corrientes));
		$this->Session->write(cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cuenta_corrientesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(cuenta_corriente_util::$STR_SESSION_NAME,serialize($cuenta_corriente_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idcuenta_corriente=$idGeneral;
			
			$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
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
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if(count($this->cuenta_corrientes) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdbancoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_bancoFK_Idbanco=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idbanco','cmbid_banco');

			$this->strAccionBusqueda='FK_Idbanco';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuentaFK_Idcuenta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta','cmbid_cuenta');

			$this->strAccionBusqueda='FK_Idcuenta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idestado_cuentas_corrientesParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_estado_cuentas_corrientesFK_Idestado_cuentas_corrientes=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idestado_cuentas_corrientes','cmbid_estado_cuentas_corrientes');

			$this->strAccionBusqueda='FK_Idestado_cuentas_corrientes';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdusuarioParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idbanco($strFinalQuery,$id_banco)
	{
		try
		{

			$this->cuenta_corrienteLogic->getsFK_Idbanco($strFinalQuery,new Pagination(),$id_banco);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idcuenta($strFinalQuery,$id_cuenta)
	{
		try
		{

			$this->cuenta_corrienteLogic->getsFK_Idcuenta($strFinalQuery,new Pagination(),$id_cuenta);
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

			$this->cuenta_corrienteLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idestado_cuentas_corrientes($strFinalQuery,$id_estado_cuentas_corrientes)
	{
		try
		{

			$this->cuenta_corrienteLogic->getsFK_Idestado_cuentas_corrientes($strFinalQuery,new Pagination(),$id_estado_cuentas_corrientes);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idusuario($strFinalQuery,$id_usuario)
	{
		try
		{

			$this->cuenta_corrienteLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
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
			
			
			$cuenta_corrienteForeignKey=new cuenta_corriente_param_return(); //cuenta_corrienteForeignKey();
			
			$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));
						
			if($cuenta_corriente_session==null) {
				$cuenta_corriente_session=new cuenta_corriente_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$cuenta_corrienteForeignKey=$this->cuenta_corrienteLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$cuenta_corriente_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$cuenta_corrienteForeignKey->empresasFK;
				$this->idempresaDefaultFK=$cuenta_corrienteForeignKey->idempresaDefaultFK;
			}

			if($cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$cuenta_corrienteForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$cuenta_corrienteForeignKey->idusuarioDefaultFK;
			}

			if($cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario) {
				$this->setVisibleBusquedasParausuario(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_banco',$this->strRecargarFkTipos,',')) {
				$this->bancosFK=$cuenta_corrienteForeignKey->bancosFK;
				$this->idbancoDefaultFK=$cuenta_corrienteForeignKey->idbancoDefaultFK;
			}

			if($cuenta_corriente_session->bitBusquedaDesdeFKSesionbanco) {
				$this->setVisibleBusquedasParabanco(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$this->strRecargarFkTipos,',')) {
				$this->cuentasFK=$cuenta_corrienteForeignKey->cuentasFK;
				$this->idcuentaDefaultFK=$cuenta_corrienteForeignKey->idcuentaDefaultFK;
			}

			if($cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta) {
				$this->setVisibleBusquedasParacuenta(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado_cuentas_corrientes',$this->strRecargarFkTipos,',')) {
				$this->estado_cuentas_corrientessFK=$cuenta_corrienteForeignKey->estado_cuentas_corrientessFK;
				$this->idestado_cuentas_corrientesDefaultFK=$cuenta_corrienteForeignKey->idestado_cuentas_corrientesDefaultFK;
			}

			if($cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_cuentas_corrientes) {
				$this->setVisibleBusquedasParaestado_cuentas_corrientes(true);
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
	
	function cargarCombosFKFromReturnGeneral($cuenta_corrienteReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$cuenta_corrienteReturnGeneral->strRecargarFkTipos;
			
			


			if($cuenta_corrienteReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$cuenta_corrienteReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$cuenta_corrienteReturnGeneral->idempresaDefaultFK;
			}


			if($cuenta_corrienteReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$cuenta_corrienteReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$cuenta_corrienteReturnGeneral->idusuarioDefaultFK;
			}


			if($cuenta_corrienteReturnGeneral->con_bancosFK==true) {
				$this->bancosFK=$cuenta_corrienteReturnGeneral->bancosFK;
				$this->idbancoDefaultFK=$cuenta_corrienteReturnGeneral->idbancoDefaultFK;
			}


			if($cuenta_corrienteReturnGeneral->con_cuentasFK==true) {
				$this->cuentasFK=$cuenta_corrienteReturnGeneral->cuentasFK;
				$this->idcuentaDefaultFK=$cuenta_corrienteReturnGeneral->idcuentaDefaultFK;
			}


			if($cuenta_corrienteReturnGeneral->con_estado_cuentas_corrientessFK==true) {
				$this->estado_cuentas_corrientessFK=$cuenta_corrienteReturnGeneral->estado_cuentas_corrientessFK;
				$this->idestado_cuentas_corrientesDefaultFK=$cuenta_corrienteReturnGeneral->idestado_cuentas_corrientesDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(cuenta_corriente_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));
		
		if($cuenta_corriente_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			else if($cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==banco_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='banco';
			}
			else if($cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			else if($cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==estado_cuentas_corrientes_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='estado_cuentas_corrientes';
			}
			
			$cuenta_corriente_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}						
			
			$this->cuenta_corrientesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_corrientesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cuenta_corrientesAuxiliar=array();
			}
			
			if(count($this->cuenta_corrientesAuxiliar) > 0) {
				
				foreach ($this->cuenta_corrientesAuxiliar as $cuenta_corrienteSeleccionado) {
					$this->eliminarTablaBase($cuenta_corrienteSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('deposito_cuenta_corriente');
			$tipoRelacionReporte->setsDescripcion('Deposito Cta Corrientes');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('retiro_cuenta_corriente');
			$tipoRelacionReporte->setsDescripcion('Retiro Cta Corrientes');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=cheque_cuenta_corriente_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=retiro_cuenta_corriente_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=deposito_cuenta_corriente_util::$STR_NOMBRE_CLASE;
		
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


	public function getusuariosFKListSelectItem() 
	{
		$usuariosList=array();

		$item=null;

		foreach($this->usuariosFK as $usuario)
		{
			$item=new SelectItem();
			$item->setLabel($usuario->getuser_name());
			$item->setValue($usuario->getId());
			$usuariosList[]=$item;
		}

		return $usuariosList;
	}


	public function getbancosFKListSelectItem() 
	{
		$bancosList=array();

		$item=null;

		foreach($this->bancosFK as $banco)
		{
			$item=new SelectItem();
			$item->setLabel($banco->getnombre());
			$item->setValue($banco->getId());
			$bancosList[]=$item;
		}

		return $bancosList;
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


	public function getestado_cuentas_corrientessFKListSelectItem() 
	{
		$estado_cuentas_corrientessList=array();

		$item=null;

		foreach($this->estado_cuentas_corrientessFK as $estado_cuentas_corrientes)
		{
			$item=new SelectItem();
			$item->setLabel($estado_cuentas_corrientes->getnombre());
			$item->setValue($estado_cuentas_corrientes->getId());
			$estado_cuentas_corrientessList[]=$item;
		}

		return $estado_cuentas_corrientessList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
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
				$this->cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$cuenta_corrientesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->cuenta_corrientes as $cuenta_corrienteLocal) {
				if($cuenta_corrienteLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->cuenta_corriente=new cuenta_corriente();
				
				$this->cuenta_corriente->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->cuenta_corrientes[]=$this->cuenta_corriente;*/
				
				$cuenta_corrientesNuevos[]=$this->cuenta_corriente;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('banco');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				$class=new Classe('estado_cuentas_corrientes');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_corrienteLogic->setcuenta_corrientes($cuenta_corrientesNuevos);
					
				$this->cuenta_corrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($cuenta_corrientesNuevos as $cuenta_corrienteNuevo) {
					$this->cuenta_corrientes[]=$cuenta_corrienteNuevo;
				}
				
				/*$this->cuenta_corrientes[]=$cuenta_corrientesNuevos;*/
				
				$this->cuenta_corrienteLogic->setcuenta_corrientes($this->cuenta_corrientes);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($cuenta_corrientesNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));

		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();
		}
		
		if($cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($cuenta_corriente_session->bigidempresaActual!=null && $cuenta_corriente_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cuenta_corriente_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=cuenta_corriente_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombosusuariosFK($connexion=null,$strRecargarFkQuery=''){
		$usuarioLogic= new usuario_logic();
		$pagination= new Pagination();
		$this->usuariosFK=array();

		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));

		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();
		}
		
		if($cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=usuario_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalusuario=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalusuario=Funciones::GetFinalQueryAppend($finalQueryGlobalusuario, '');
				$finalQueryGlobalusuario.=usuario_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalusuario.$strRecargarFkQuery;		

				$usuarioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosusuariosFK($usuarioLogic->getusuarios());

		} else {
			$this->setVisibleBusquedasParausuario(true);


			if($cuenta_corriente_session->bigidusuarioActual!=null && $cuenta_corriente_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($cuenta_corriente_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=cuenta_corriente_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosbancosFK($connexion=null,$strRecargarFkQuery=''){
		$bancoLogic= new banco_logic();
		$pagination= new Pagination();
		$this->bancosFK=array();

		$bancoLogic->setConnexion($connexion);
		$bancoLogic->getbancoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));

		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();
		}
		
		if($cuenta_corriente_session->bitBusquedaDesdeFKSesionbanco!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=banco_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalbanco=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalbanco=Funciones::GetFinalQueryAppend($finalQueryGlobalbanco, '');
				$finalQueryGlobalbanco.=banco_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalbanco.$strRecargarFkQuery;		

				$bancoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosbancosFK($bancoLogic->getbancos());

		} else {
			$this->setVisibleBusquedasParabanco(true);


			if($cuenta_corriente_session->bigidbancoActual!=null && $cuenta_corriente_session->bigidbancoActual > 0) {
				$bancoLogic->getEntity($cuenta_corriente_session->bigidbancoActual);//WithConnection

				$this->bancosFK[$bancoLogic->getbanco()->getId()]=cuenta_corriente_util::getbancoDescripcion($bancoLogic->getbanco());
				$this->idbancoDefaultFK=$bancoLogic->getbanco()->getId();
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

		$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));

		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();
		}
		
		if($cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta!=true) {
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


			if($cuenta_corriente_session->bigidcuentaActual!=null && $cuenta_corriente_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($cuenta_corriente_session->bigidcuentaActual);//WithConnection

				$this->cuentasFK[$cuentaLogic->getcuenta()->getId()]=cuenta_corriente_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$this->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	public function cargarCombosestado_cuentas_corrientessFK($connexion=null,$strRecargarFkQuery=''){
		$estado_cuentas_corrientesLogic= new estado_cuentas_corrientes_logic();
		$pagination= new Pagination();
		$this->estado_cuentas_corrientessFK=array();

		$estado_cuentas_corrientesLogic->setConnexion($connexion);
		$estado_cuentas_corrientesLogic->getestado_cuentas_corrientesDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));

		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();
		}
		
		if($cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_cuentas_corrientes!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_cuentas_corrientes_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalestado_cuentas_corrientes=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado_cuentas_corrientes=Funciones::GetFinalQueryAppend($finalQueryGlobalestado_cuentas_corrientes, '');
				$finalQueryGlobalestado_cuentas_corrientes.=estado_cuentas_corrientes_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado_cuentas_corrientes.$strRecargarFkQuery;		

				$estado_cuentas_corrientesLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosestado_cuentas_corrientessFK($estado_cuentas_corrientesLogic->getestado_cuentas_corrientess());

		} else {
			$this->setVisibleBusquedasParaestado_cuentas_corrientes(true);


			if($cuenta_corriente_session->bigidestado_cuentas_corrientesActual!=null && $cuenta_corriente_session->bigidestado_cuentas_corrientesActual > 0) {
				$estado_cuentas_corrientesLogic->getEntity($cuenta_corriente_session->bigidestado_cuentas_corrientesActual);//WithConnection

				$this->estado_cuentas_corrientessFK[$estado_cuentas_corrientesLogic->getestado_cuentas_corrientes()->getId()]=cuenta_corriente_util::getestado_cuentas_corrientesDescripcion($estado_cuentas_corrientesLogic->getestado_cuentas_corrientes());
				$this->idestado_cuentas_corrientesDefaultFK=$estado_cuentas_corrientesLogic->getestado_cuentas_corrientes()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=cuenta_corriente_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=cuenta_corriente_util::getusuarioDescripcion($usuarioLocal);
		}
	}

	public function prepararCombosbancosFK($bancos){

		foreach ($bancos as $bancoLocal ) {
			if($this->idbancoDefaultFK==0) {
				$this->idbancoDefaultFK=$bancoLocal->getId();
			}

			$this->bancosFK[$bancoLocal->getId()]=cuenta_corriente_util::getbancoDescripcion($bancoLocal);
		}
	}

	public function prepararComboscuentasFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuentaDefaultFK==0) {
				$this->idcuentaDefaultFK=$cuentaLocal->getId();
			}

			$this->cuentasFK[$cuentaLocal->getId()]=cuenta_corriente_util::getcuentaDescripcion($cuentaLocal);
		}
	}

	public function prepararCombosestado_cuentas_corrientessFK($estado_cuentas_corrientess){

		foreach ($estado_cuentas_corrientess as $estado_cuentas_corrientesLocal ) {
			if($this->idestado_cuentas_corrientesDefaultFK==0) {
				$this->idestado_cuentas_corrientesDefaultFK=$estado_cuentas_corrientesLocal->getId();
			}

			$this->estado_cuentas_corrientessFK[$estado_cuentas_corrientesLocal->getId()]=cuenta_corriente_util::getestado_cuentas_corrientesDescripcion($estado_cuentas_corrientesLocal);
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

			$strDescripcionempresa=cuenta_corriente_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripcionusuarioFK($idusuario,$connexion=null){
		$usuarioLogic= new usuario_logic();
		$usuarioLogic->setConnexion($connexion);
		$usuarioLogic->getusuarioDataAccess()->isForFKData=true;
		$strDescripcionusuario='';

		if($idusuario!=null && $idusuario!='' && $idusuario!='null') {
			if($connexion!=null) {
				$usuarioLogic->getEntity($idusuario);//WithConnection
			} else {
				$usuarioLogic->getEntityWithConnection($idusuario);//
			}

			$strDescripcionusuario=cuenta_corriente_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
	}

	public function cargarDescripcionbancoFK($idbanco,$connexion=null){
		$bancoLogic= new banco_logic();
		$bancoLogic->setConnexion($connexion);
		$bancoLogic->getbancoDataAccess()->isForFKData=true;
		$strDescripcionbanco='';

		if($idbanco!=null && $idbanco!='' && $idbanco!='null') {
			if($connexion!=null) {
				$bancoLogic->getEntity($idbanco);//WithConnection
			} else {
				$bancoLogic->getEntityWithConnection($idbanco);//
			}

			$strDescripcionbanco=cuenta_corriente_util::getbancoDescripcion($bancoLogic->getbanco());

		} else {
			$strDescripcionbanco='null';
		}

		return $strDescripcionbanco;
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

			$strDescripcioncuenta=cuenta_corriente_util::getcuentaDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	public function cargarDescripcionestado_cuentas_corrientesFK($idestado_cuentas_corrientes,$connexion=null){
		$estado_cuentas_corrientesLogic= new estado_cuentas_corrientes_logic();
		$estado_cuentas_corrientesLogic->setConnexion($connexion);
		$estado_cuentas_corrientesLogic->getestado_cuentas_corrientesDataAccess()->isForFKData=true;
		$strDescripcionestado_cuentas_corrientes='';

		if($idestado_cuentas_corrientes!=null && $idestado_cuentas_corrientes!='' && $idestado_cuentas_corrientes!='null') {
			if($connexion!=null) {
				$estado_cuentas_corrientesLogic->getEntity($idestado_cuentas_corrientes);//WithConnection
			} else {
				$estado_cuentas_corrientesLogic->getEntityWithConnection($idestado_cuentas_corrientes);//
			}

			$strDescripcionestado_cuentas_corrientes=cuenta_corriente_util::getestado_cuentas_corrientesDescripcion($estado_cuentas_corrientesLogic->getestado_cuentas_corrientes());

		} else {
			$strDescripcionestado_cuentas_corrientes='null';
		}

		return $strDescripcionestado_cuentas_corrientes;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(cuenta_corriente $cuenta_corrienteClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$cuenta_corrienteClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
				$cuenta_corrienteClase->setid_usuario($this->usuarioActual->getId());
			
			
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

		$this->strVisibleFK_Idbanco=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idestado_cuentas_corrientes=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionempresa;
	}

	public function setVisibleBusquedasParausuario($isParausuario){
		$strParaVisibleusuario='display:table-row';
		$strParaVisibleNegacionusuario='display:none';

		if($isParausuario) {
			$strParaVisibleusuario='display:table-row';
			$strParaVisibleNegacionusuario='display:none';
		} else {
			$strParaVisibleusuario='display:none';
			$strParaVisibleNegacionusuario='display:table-row';
		}


		$strParaVisibleNegacionusuario=trim($strParaVisibleNegacionusuario);

		$this->strVisibleFK_Idbanco=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idestado_cuentas_corrientes=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idusuario=$strParaVisibleusuario;
	}

	public function setVisibleBusquedasParabanco($isParabanco){
		$strParaVisiblebanco='display:table-row';
		$strParaVisibleNegacionbanco='display:none';

		if($isParabanco) {
			$strParaVisiblebanco='display:table-row';
			$strParaVisibleNegacionbanco='display:none';
		} else {
			$strParaVisiblebanco='display:none';
			$strParaVisibleNegacionbanco='display:table-row';
		}


		$strParaVisibleNegacionbanco=trim($strParaVisibleNegacionbanco);

		$this->strVisibleFK_Idbanco=$strParaVisiblebanco;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionbanco;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionbanco;
		$this->strVisibleFK_Idestado_cuentas_corrientes=$strParaVisibleNegacionbanco;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionbanco;
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

		$this->strVisibleFK_Idbanco=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idcuenta=$strParaVisiblecuenta;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idestado_cuentas_corrientes=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacioncuenta;
	}

	public function setVisibleBusquedasParaestado_cuentas_corrientes($isParaestado_cuentas_corrientes){
		$strParaVisibleestado_cuentas_corrientes='display:table-row';
		$strParaVisibleNegacionestado_cuentas_corrientes='display:none';

		if($isParaestado_cuentas_corrientes) {
			$strParaVisibleestado_cuentas_corrientes='display:table-row';
			$strParaVisibleNegacionestado_cuentas_corrientes='display:none';
		} else {
			$strParaVisibleestado_cuentas_corrientes='display:none';
			$strParaVisibleNegacionestado_cuentas_corrientes='display:table-row';
		}


		$strParaVisibleNegacionestado_cuentas_corrientes=trim($strParaVisibleNegacionestado_cuentas_corrientes);

		$this->strVisibleFK_Idbanco=$strParaVisibleNegacionestado_cuentas_corrientes;
		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionestado_cuentas_corrientes;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionestado_cuentas_corrientes;
		$this->strVisibleFK_Idestado_cuentas_corrientes=$strParaVisibleestado_cuentas_corrientes;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionestado_cuentas_corrientes;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idcuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corrienteActual=$idcuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParausuario() {//$idcuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corrienteActual=$idcuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParabanco() {//$idcuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corrienteActual=$idcuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.banco_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_banco(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',banco_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_banco(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(banco_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta() {//$idcuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corrienteActual=$idcuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaestado_cuentas_corrientes() {//$idcuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_corrienteActual=$idcuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.estado_cuentas_corrientes_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado_cuentas_corrientes(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',estado_cuentas_corrientes_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado_cuentas_corrientes(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(estado_cuentas_corrientes_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParacheque_cuenta_corrientes(int $idcuenta_corrienteActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuenta_corrienteActual=$idcuenta_corrienteActual;

		$bitPaginaPopupcheque_cuenta_corriente=false;

		try {

			$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));

			if($cuenta_corriente_session==null) {
				$cuenta_corriente_session=new cuenta_corriente_session();
			}

			$cheque_cuenta_corriente_session=unserialize($this->Session->read(cheque_cuenta_corriente_util::$STR_SESSION_NAME));

			if($cheque_cuenta_corriente_session==null) {
				$cheque_cuenta_corriente_session=new cheque_cuenta_corriente_session();
			}

			$cheque_cuenta_corriente_session->strUltimaBusqueda='FK_Idcuenta_corriente';
			$cheque_cuenta_corriente_session->strPathNavegacionActual=$cuenta_corriente_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.cheque_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
			$cheque_cuenta_corriente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcheque_cuenta_corriente=$cheque_cuenta_corriente_session->bitPaginaPopup;
			$cheque_cuenta_corriente_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcheque_cuenta_corriente=$cheque_cuenta_corriente_session->bitPaginaPopup;
			$cheque_cuenta_corriente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$cheque_cuenta_corriente_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_corriente_util::$STR_NOMBRE_OPCION;
			$cheque_cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta_corriente=true;
			$cheque_cuenta_corriente_session->bigidcuenta_corrienteActual=$this->idcuenta_corrienteActual;

			$cuenta_corriente_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_corriente_session->bigIdActualFK=$this->idcuenta_corrienteActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"cheque_cuenta_corriente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_corriente_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"cheque_cuenta_corriente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_corriente_util::$STR_SESSION_NAME,serialize($cuenta_corriente_session));
			$this->Session->write(cheque_cuenta_corriente_util::$STR_SESSION_NAME,serialize($cheque_cuenta_corriente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcheque_cuenta_corriente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cheque_cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cheque_cuenta_corriente_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarcuenta_corriente,$this->strTipoUsuarioAuxiliarcuenta_corriente,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cheque_cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cheque_cuenta_corriente_util::$STR_CLASS_NAME,'cuentascorrientes','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta_corriente,$this->strTipoUsuarioAuxiliarcuenta_corriente,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionPararetiro_cuenta_corrientes(int $idcuenta_corrienteActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuenta_corrienteActual=$idcuenta_corrienteActual;

		$bitPaginaPopupretiro_cuenta_corriente=false;

		try {

			$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));

			if($cuenta_corriente_session==null) {
				$cuenta_corriente_session=new cuenta_corriente_session();
			}

			$retiro_cuenta_corriente_session=unserialize($this->Session->read(retiro_cuenta_corriente_util::$STR_SESSION_NAME));

			if($retiro_cuenta_corriente_session==null) {
				$retiro_cuenta_corriente_session=new retiro_cuenta_corriente_session();
			}

			$retiro_cuenta_corriente_session->strUltimaBusqueda='FK_Idcuenta_corriente';
			$retiro_cuenta_corriente_session->strPathNavegacionActual=$cuenta_corriente_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.retiro_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
			$retiro_cuenta_corriente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupretiro_cuenta_corriente=$retiro_cuenta_corriente_session->bitPaginaPopup;
			$retiro_cuenta_corriente_session->setPaginaPopupVariables(true);
			$bitPaginaPopupretiro_cuenta_corriente=$retiro_cuenta_corriente_session->bitPaginaPopup;
			$retiro_cuenta_corriente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$retiro_cuenta_corriente_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_corriente_util::$STR_NOMBRE_OPCION;
			$retiro_cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta_corriente=true;
			$retiro_cuenta_corriente_session->bigidcuenta_corrienteActual=$this->idcuenta_corrienteActual;

			$cuenta_corriente_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_corriente_session->bigIdActualFK=$this->idcuenta_corrienteActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"retiro_cuenta_corriente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_corriente_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"retiro_cuenta_corriente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_corriente_util::$STR_SESSION_NAME,serialize($cuenta_corriente_session));
			$this->Session->write(retiro_cuenta_corriente_util::$STR_SESSION_NAME,serialize($retiro_cuenta_corriente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupretiro_cuenta_corriente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retiro_cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retiro_cuenta_corriente_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarcuenta_corriente,$this->strTipoUsuarioAuxiliarcuenta_corriente,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',retiro_cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(retiro_cuenta_corriente_util::$STR_CLASS_NAME,'cuentascorrientes','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta_corriente,$this->strTipoUsuarioAuxiliarcuenta_corriente,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParadeposito_cuenta_corrientes(int $idcuenta_corrienteActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcuenta_corrienteActual=$idcuenta_corrienteActual;

		$bitPaginaPopupdeposito_cuenta_corriente=false;

		try {

			$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));

			if($cuenta_corriente_session==null) {
				$cuenta_corriente_session=new cuenta_corriente_session();
			}

			$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));

			if($deposito_cuenta_corriente_session==null) {
				$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
			}

			$deposito_cuenta_corriente_session->strUltimaBusqueda='FK_Idcuenta_corriente';
			$deposito_cuenta_corriente_session->strPathNavegacionActual=$cuenta_corriente_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
			$deposito_cuenta_corriente_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupdeposito_cuenta_corriente=$deposito_cuenta_corriente_session->bitPaginaPopup;
			$deposito_cuenta_corriente_session->setPaginaPopupVariables(true);
			$bitPaginaPopupdeposito_cuenta_corriente=$deposito_cuenta_corriente_session->bitPaginaPopup;
			$deposito_cuenta_corriente_session->bitPermiteNavegacionHaciaFKDesde=false;
			$deposito_cuenta_corriente_session->strNombrePaginaNavegacionHaciaFKDesde=cuenta_corriente_util::$STR_NOMBRE_OPCION;
			$deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta_corriente=true;
			$deposito_cuenta_corriente_session->bigidcuenta_corrienteActual=$this->idcuenta_corrienteActual;

			$cuenta_corriente_session->bitBusquedaDesdeFKSesionFK=true;
			$cuenta_corriente_session->bigIdActualFK=$this->idcuenta_corrienteActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"deposito_cuenta_corriente"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cuenta_corriente_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"deposito_cuenta_corriente"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cuenta_corriente_util::$STR_SESSION_NAME,serialize($cuenta_corriente_session));
			$this->Session->write(deposito_cuenta_corriente_util::$STR_SESSION_NAME,serialize($deposito_cuenta_corriente_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupdeposito_cuenta_corriente!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',deposito_cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(deposito_cuenta_corriente_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliarcuenta_corriente,$this->strTipoUsuarioAuxiliarcuenta_corriente,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',deposito_cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(deposito_cuenta_corriente_util::$STR_CLASS_NAME,'cuentascorrientes','','NO-POPUP',$this->strTipoPaginaAuxiliarcuenta_corriente,$this->strTipoUsuarioAuxiliarcuenta_corriente,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(cuenta_corriente_util::$STR_SESSION_NAME,cuenta_corriente_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$cuenta_corriente_session=$this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME);
				
		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();		
			//$this->Session->write('cuenta_corriente_session',$cuenta_corriente_session);							
		}
		*/
		
		$cuenta_corriente_session=new cuenta_corriente_session();
    	$cuenta_corriente_session->strPathNavegacionActual=cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
    	$cuenta_corriente_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(cuenta_corriente_util::$STR_SESSION_NAME,serialize($cuenta_corriente_session));		
	}	
	
	public function getSetBusquedasSesionConfig(cuenta_corriente_session $cuenta_corriente_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($cuenta_corriente_session->bitBusquedaDesdeFKSesionFK!=null && $cuenta_corriente_session->bitBusquedaDesdeFKSesionFK==true) {
			if($cuenta_corriente_session->bigIdActualFK!=null && $cuenta_corriente_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$cuenta_corriente_session->bigIdActualFKParaPosibleAtras=$cuenta_corriente_session->bigIdActualFK;*/
			}
				
			$cuenta_corriente_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$cuenta_corriente_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(cuenta_corriente_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa!=null && $cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($cuenta_corriente_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_session->intNumeroPaginacion==cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario!=null && $cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($cuenta_corriente_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_session->intNumeroPaginacion==cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_corriente_session->bitBusquedaDesdeFKSesionbanco!=null && $cuenta_corriente_session->bitBusquedaDesdeFKSesionbanco==true)
			{
				if($cuenta_corriente_session->bigidbancoActual!=0) {
					$this->strAccionBusqueda='FK_Idbanco';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_session->bigidbancoActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_session->bigidbancoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_session->bigidbancoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_session->bitBusquedaDesdeFKSesionbanco=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_session->intNumeroPaginacion==cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta!=null && $cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta==true)
			{
				if($cuenta_corriente_session->bigidcuentaActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_session->bigidcuentaActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_session->bigidcuentaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_session->bigidcuentaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_session->intNumeroPaginacion==cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_cuentas_corrientes!=null && $cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_cuentas_corrientes==true)
			{
				if($cuenta_corriente_session->bigidestado_cuentas_corrientesActual!=0) {
					$this->strAccionBusqueda='FK_Idestado_cuentas_corrientes';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_corriente_session->bigidestado_cuentas_corrientesActualDescripcion);
						$historyWeb->setIdActual($cuenta_corriente_session->bigidestado_cuentas_corrientesActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_corriente_session->bigidestado_cuentas_corrientesActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_cuentas_corrientes=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($cuenta_corriente_session->intNumeroPaginacion==cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$cuenta_corriente_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));
		
		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=new cuenta_corriente_session();
		}
		
		$cuenta_corriente_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$cuenta_corriente_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cuenta_corriente_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idbanco') {
			$cuenta_corriente_session->id_banco=$this->id_bancoFK_Idbanco;	

		}
		else if($this->strAccionBusqueda=='FK_Idcuenta') {
			$cuenta_corriente_session->id_cuenta=$this->id_cuentaFK_Idcuenta;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$cuenta_corriente_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idestado_cuentas_corrientes') {
			$cuenta_corriente_session->id_estado_cuentas_corrientes=$this->id_estado_cuentas_corrientesFK_Idestado_cuentas_corrientes;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$cuenta_corriente_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		
		$this->Session->write(cuenta_corriente_util::$STR_SESSION_NAME,serialize($cuenta_corriente_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(cuenta_corriente_session $cuenta_corriente_session) {
		
		if($cuenta_corriente_session==null) {
			$cuenta_corriente_session=unserialize($this->Session->read(cuenta_corriente_util::$STR_SESSION_NAME));
		}
		
		if($cuenta_corriente_session==null) {
		   $cuenta_corriente_session=new cuenta_corriente_session();
		}
		
		if($cuenta_corriente_session->strUltimaBusqueda!=null && $cuenta_corriente_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$cuenta_corriente_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$cuenta_corriente_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$cuenta_corriente_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idbanco') {
				$this->id_bancoFK_Idbanco=$cuenta_corriente_session->id_banco;
				$cuenta_corriente_session->id_banco=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idcuenta') {
				$this->id_cuentaFK_Idcuenta=$cuenta_corriente_session->id_cuenta;
				$cuenta_corriente_session->id_cuenta=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$cuenta_corriente_session->id_empresa;
				$cuenta_corriente_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idestado_cuentas_corrientes') {
				$this->id_estado_cuentas_corrientesFK_Idestado_cuentas_corrientes=$cuenta_corriente_session->id_estado_cuentas_corrientes;
				$cuenta_corriente_session->id_estado_cuentas_corrientes=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$cuenta_corriente_session->id_usuario;
				$cuenta_corriente_session->id_usuario=-1;

			}
		}
		
		$cuenta_corriente_session->strUltimaBusqueda='';
		//$cuenta_corriente_session->intNumeroPaginacion=10;
		$cuenta_corriente_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(cuenta_corriente_util::$STR_SESSION_NAME,serialize($cuenta_corriente_session));		
	}
	
	public function cuenta_corrientesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idusuarioDefaultFK = 0;
		$this->idbancoDefaultFK = 0;
		$this->idcuentaDefaultFK = 0;
		$this->idestado_cuentas_corrientesDefaultFK = 0;
	}
	
	public function setcuenta_corrienteFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_usuario',$this->idusuarioDefaultFK);
		$this->setExistDataCampoForm('form','id_banco',$this->idbancoDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta',$this->idcuentaDefaultFK);
		$this->setExistDataCampoForm('form','id_estado_cuentas_corrientes',$this->idestado_cuentas_corrientesDefaultFK);
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

		usuario::$class;
		usuario_carga::$CONTROLLER;

		banco::$class;
		banco_carga::$CONTROLLER;

		cuenta::$class;
		cuenta_carga::$CONTROLLER;

		estado_cuentas_corrientes::$class;
		estado_cuentas_corrientes_carga::$CONTROLLER;
		
		//REL
		

		cheque_cuenta_corriente_carga::$CONTROLLER;
		cheque_cuenta_corriente_util::$STR_SCHEMA;
		cheque_cuenta_corriente_session::class;

		retiro_cuenta_corriente_carga::$CONTROLLER;
		retiro_cuenta_corriente_util::$STR_SCHEMA;
		retiro_cuenta_corriente_session::class;

		deposito_cuenta_corriente_carga::$CONTROLLER;
		deposito_cuenta_corriente_util::$STR_SCHEMA;
		deposito_cuenta_corriente_session::class;
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
		interface cuenta_corriente_controlI {	
		
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
		
		public function onLoad(cuenta_corriente_session $cuenta_corriente_session=null);	
		function index(?string $strTypeOnLoadcuenta_corriente='',?string $strTipoPaginaAuxiliarcuenta_corriente='',?string $strTipoUsuarioAuxiliarcuenta_corriente='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadcuenta_corriente='',string $strTipoPaginaAuxiliarcuenta_corriente='',string $strTipoUsuarioAuxiliarcuenta_corriente='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($cuenta_corrienteReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(cuenta_corriente $cuenta_corrienteClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(cuenta_corriente_session $cuenta_corriente_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(cuenta_corriente_session $cuenta_corriente_session);	
		public function cuenta_corrientesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setcuenta_corrienteFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
