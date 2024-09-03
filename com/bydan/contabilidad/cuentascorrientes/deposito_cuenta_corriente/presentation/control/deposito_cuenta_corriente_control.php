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

namespace com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\business\entity\deposito_cuenta_corriente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/deposito_cuenta_corriente/util/deposito_cuenta_corriente_carga.php');
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_carga;

use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\util\deposito_cuenta_corriente_param_return;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\business\logic\deposito_cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\business\logic\deposito_cuenta_corriente_logic_add;
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\presentation\session\deposito_cuenta_corriente_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\entity\cuenta_corriente;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\business\logic\cuenta_corriente_logic;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;

use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\entity\estado_deposito_retiro;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\logic\estado_deposito_retiro_logic;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_carga;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
deposito_cuenta_corriente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
deposito_cuenta_corriente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
deposito_cuenta_corriente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
deposito_cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*deposito_cuenta_corriente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentascorrientes/deposito_cuenta_corriente/presentation/control/deposito_cuenta_corriente_init_control.php');
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\presentation\control\deposito_cuenta_corriente_init_control;

include_once('com/bydan/contabilidad/cuentascorrientes/deposito_cuenta_corriente/presentation/control/deposito_cuenta_corriente_base_control.php');
use com\bydan\contabilidad\cuentascorrientes\deposito_cuenta_corriente\presentation\control\deposito_cuenta_corriente_base_control;

class deposito_cuenta_corriente_control extends deposito_cuenta_corriente_base_control {	
	
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
					
					
				if($this->data['es_balance_inicial']==null) {$this->data['es_balance_inicial']=false;} else {if($this->data['es_balance_inicial']=='on') {$this->data['es_balance_inicial']=true;}}
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
			
			
			else if($action=="FK_Idcuenta_corriente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcuenta_corrienteParaProcesar();
			}
			else if($action=="FK_Idejercicio"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdejercicioParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idestado_deposito_retiro"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idestado_deposito_retiroParaProcesar();
			}
			else if($action=="FK_Idperiodo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdperiodoParaProcesar();
			}
			else if($action=="FK_Idsucursal"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdsucursalParaProcesar();
			}
			else if($action=="FK_Idusuario"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdusuarioParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddeposito_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$iddeposito_cuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParasucursal') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddeposito_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParasucursal();//$iddeposito_cuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParaejercicio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddeposito_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParaejercicio();//$iddeposito_cuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParaperiodo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddeposito_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParaperiodo();//$iddeposito_cuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddeposito_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$iddeposito_cuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParacuenta_corriente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddeposito_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_corriente();//$iddeposito_cuenta_corrienteActual
			}
			else if($action=='abrirBusquedaParaestado_deposito_retiro') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$iddeposito_cuenta_corrienteActual=$this->getDataId();
				$this->abrirBusquedaParaestado_deposito_retiro();//$iddeposito_cuenta_corrienteActual
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
					
					$deposito_cuenta_corrienteController = new deposito_cuenta_corriente_control();
					
					$deposito_cuenta_corrienteController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($deposito_cuenta_corrienteController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$deposito_cuenta_corrienteController = new deposito_cuenta_corriente_control();
						$deposito_cuenta_corrienteController = $this;
						
						$jsonResponse = json_encode($deposito_cuenta_corrienteController->deposito_cuenta_corrientes);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->deposito_cuenta_corrienteReturnGeneral==null) {
					$this->deposito_cuenta_corrienteReturnGeneral=new deposito_cuenta_corriente_param_return();
				}
				
				echo($this->deposito_cuenta_corrienteReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$deposito_cuenta_corrienteController=new deposito_cuenta_corriente_control();
		
		$deposito_cuenta_corrienteController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$deposito_cuenta_corrienteController->usuarioActual=new usuario();
		
		$deposito_cuenta_corrienteController->usuarioActual->setId($this->usuarioActual->getId());
		$deposito_cuenta_corrienteController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$deposito_cuenta_corrienteController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$deposito_cuenta_corrienteController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$deposito_cuenta_corrienteController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$deposito_cuenta_corrienteController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$deposito_cuenta_corrienteController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$deposito_cuenta_corrienteController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $deposito_cuenta_corrienteController;
	}
	
	public function loadIndex() {
		$strTypeOnLoaddeposito_cuenta_corriente= $this->getDataGeneralString('strTypeOnLoaddeposito_cuenta_corriente');
		$strTipoPaginaAuxiliardeposito_cuenta_corriente= $this->getDataGeneralString('strTipoPaginaAuxiliardeposito_cuenta_corriente');
		$strTipoUsuarioAuxiliardeposito_cuenta_corriente= $this->getDataGeneralString('strTipoUsuarioAuxiliardeposito_cuenta_corriente');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoaddeposito_cuenta_corriente,$strTipoPaginaAuxiliardeposito_cuenta_corriente,$strTipoUsuarioAuxiliardeposito_cuenta_corriente,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoaddeposito_cuenta_corriente!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('deposito_cuenta_corriente','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(deposito_cuenta_corriente_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliardeposito_cuenta_corriente,$this->strTipoUsuarioAuxiliardeposito_cuenta_corriente,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(deposito_cuenta_corriente_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascorrientes','','POPUP',$this->strTipoPaginaAuxiliardeposito_cuenta_corriente,$this->strTipoUsuarioAuxiliardeposito_cuenta_corriente,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->deposito_cuenta_corrienteReturnGeneral=new deposito_cuenta_corriente_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->deposito_cuenta_corrienteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->deposito_cuenta_corrienteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->deposito_cuenta_corrienteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->deposito_cuenta_corrienteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->deposito_cuenta_corrienteReturnGeneral);
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
		$this->deposito_cuenta_corrienteReturnGeneral=new deposito_cuenta_corriente_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->deposito_cuenta_corrienteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->deposito_cuenta_corrienteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->deposito_cuenta_corrienteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->deposito_cuenta_corrienteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->deposito_cuenta_corrienteReturnGeneral);
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
		$this->deposito_cuenta_corrienteReturnGeneral=new deposito_cuenta_corriente_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->deposito_cuenta_corrienteReturnGeneral->conGuardarReturnSessionJs=true;
		$this->deposito_cuenta_corrienteReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->deposito_cuenta_corrienteReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->deposito_cuenta_corrienteReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->deposito_cuenta_corrienteReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
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
			
			
			$this->deposito_cuenta_corrienteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->deposito_cuenta_corrienteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->deposito_cuenta_corrienteReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->deposito_cuenta_corrienteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->deposito_cuenta_corrienteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->deposito_cuenta_corrienteReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->deposito_cuenta_corrienteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->deposito_cuenta_corrienteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->deposito_cuenta_corrienteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->deposito_cuenta_corrienteReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->deposito_cuenta_corrienteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->deposito_cuenta_corrienteReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->deposito_cuenta_corrienteReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->deposito_cuenta_corrienteReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->deposito_cuenta_corrienteReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->deposito_cuenta_corrienteReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->deposito_cuenta_corrienteReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->deposito_cuenta_corrienteReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
		
		$this->deposito_cuenta_corrienteLogic=new deposito_cuenta_corriente_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->deposito_cuenta_corriente=new deposito_cuenta_corriente();
		
		$this->strTypeOnLoaddeposito_cuenta_corriente='onload';
		$this->strTipoPaginaAuxiliardeposito_cuenta_corriente='none';
		$this->strTipoUsuarioAuxiliardeposito_cuenta_corriente='none';	

		$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
		
		$this->deposito_cuenta_corrienteModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->deposito_cuenta_corrienteControllerAdditional=new deposito_cuenta_corriente_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(deposito_cuenta_corriente_session $deposito_cuenta_corriente_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($deposito_cuenta_corriente_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoaddeposito_cuenta_corriente='',?string $strTipoPaginaAuxiliardeposito_cuenta_corriente='',?string $strTipoUsuarioAuxiliardeposito_cuenta_corriente='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoaddeposito_cuenta_corriente=$strTypeOnLoaddeposito_cuenta_corriente;
			$this->strTipoPaginaAuxiliardeposito_cuenta_corriente=$strTipoPaginaAuxiliardeposito_cuenta_corriente;
			$this->strTipoUsuarioAuxiliardeposito_cuenta_corriente=$strTipoUsuarioAuxiliardeposito_cuenta_corriente;
	
			if($strTipoUsuarioAuxiliardeposito_cuenta_corriente=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->deposito_cuenta_corriente=new deposito_cuenta_corriente();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Deposito Cta Corrientes';
			
			
			$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));
							
			if($deposito_cuenta_corriente_session==null) {
				$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
				
				/*$this->Session->write('deposito_cuenta_corriente_session',$deposito_cuenta_corriente_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($deposito_cuenta_corriente_session->strFuncionJsPadre!=null && $deposito_cuenta_corriente_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$deposito_cuenta_corriente_session->strFuncionJsPadre;
				
				$deposito_cuenta_corriente_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($deposito_cuenta_corriente_session);
			
			if($strTypeOnLoaddeposito_cuenta_corriente!=null && $strTypeOnLoaddeposito_cuenta_corriente=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$deposito_cuenta_corriente_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$deposito_cuenta_corriente_session->setPaginaPopupVariables(true);
				}
				
				if($deposito_cuenta_corriente_session->intNumeroPaginacion==deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$deposito_cuenta_corriente_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,deposito_cuenta_corriente_util::$STR_SESSION_NAME,'cuentascorrientes');																
			
			} else if($strTypeOnLoaddeposito_cuenta_corriente!=null && $strTypeOnLoaddeposito_cuenta_corriente=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$deposito_cuenta_corriente_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;*/
				
				if($deposito_cuenta_corriente_session->intNumeroPaginacion==deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$deposito_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliardeposito_cuenta_corriente!=null && $strTipoPaginaAuxiliardeposito_cuenta_corriente=='none') {
				/*$deposito_cuenta_corriente_session->strStyleDivHeader='display:table-row';*/
				
				/*$deposito_cuenta_corriente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliardeposito_cuenta_corriente!=null && $strTipoPaginaAuxiliardeposito_cuenta_corriente=='iframe') {
					/*
					$deposito_cuenta_corriente_session->strStyleDivArbol='display:none';
					$deposito_cuenta_corriente_session->strStyleDivHeader='display:none';
					$deposito_cuenta_corriente_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$deposito_cuenta_corriente_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->deposito_cuenta_corrienteClase=new deposito_cuenta_corriente();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=deposito_cuenta_corriente_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(deposito_cuenta_corriente_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->deposito_cuenta_corrienteLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->deposito_cuenta_corrienteLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->deposito_cuenta_corrienteLogic=new deposito_cuenta_corriente_logic();*/
			
			
			$this->deposito_cuenta_corrientesModel=null;
			/*new ListDataModel();*/
			
			/*$this->deposito_cuenta_corrientesModel.setWrappedData(deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes());*/
						
			$this->deposito_cuenta_corrientes= array();
			$this->deposito_cuenta_corrientesEliminados=array();
			$this->deposito_cuenta_corrientesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= deposito_cuenta_corriente_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->deposito_cuenta_corriente= new deposito_cuenta_corriente();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcuenta_corriente='display:table-row';
			$this->strVisibleFK_Idejercicio='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idestado_deposito_retiro='display:table-row';
			$this->strVisibleFK_Idperiodo='display:table-row';
			$this->strVisibleFK_Idsucursal='display:table-row';
			$this->strVisibleFK_Idusuario='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliardeposito_cuenta_corriente!=null && $strTipoUsuarioAuxiliardeposito_cuenta_corriente!='none' && $strTipoUsuarioAuxiliardeposito_cuenta_corriente!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliardeposito_cuenta_corriente);
																
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
				if($strTipoUsuarioAuxiliardeposito_cuenta_corriente!=null && $strTipoUsuarioAuxiliardeposito_cuenta_corriente!='none' && $strTipoUsuarioAuxiliardeposito_cuenta_corriente!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliardeposito_cuenta_corriente);
																
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
				if($strTipoUsuarioAuxiliardeposito_cuenta_corriente==null || $strTipoUsuarioAuxiliardeposito_cuenta_corriente=='none' || $strTipoUsuarioAuxiliardeposito_cuenta_corriente=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliardeposito_cuenta_corriente,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, deposito_cuenta_corriente_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, deposito_cuenta_corriente_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina deposito_cuenta_corriente');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($deposito_cuenta_corriente_session);
			
			$this->getSetBusquedasSesionConfig($deposito_cuenta_corriente_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportedeposito_cuenta_corrientes($this->strAccionBusqueda,$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes());*/
				} else if($this->strGenerarReporte=='Html')	{
					$deposito_cuenta_corriente_session->strServletGenerarHtmlReporte='deposito_cuenta_corrienteServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(deposito_cuenta_corriente_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($deposito_cuenta_corriente_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliardeposito_cuenta_corriente!=null && $strTipoUsuarioAuxiliardeposito_cuenta_corriente=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($deposito_cuenta_corriente_session);
			}
								
			$this->set(deposito_cuenta_corriente_util::$STR_SESSION_NAME, $deposito_cuenta_corriente_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($deposito_cuenta_corriente_session);
			
			/*
			$this->deposito_cuenta_corriente->recursive = 0;
			
			$this->deposito_cuenta_corrientes=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('deposito_cuenta_corrientes', $this->deposito_cuenta_corrientes);
			
			$this->set(deposito_cuenta_corriente_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->deposito_cuenta_corrienteActual =$this->deposito_cuenta_corrienteClase;
			
			/*$this->deposito_cuenta_corrienteActual =$this->migrarModeldeposito_cuenta_corriente($this->deposito_cuenta_corrienteClase);*/
			
			$this->returnHtml(false);
			
			$this->set(deposito_cuenta_corriente_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=deposito_cuenta_corriente_util::$STR_NOMBRE_OPCION;
				
			if(deposito_cuenta_corriente_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=deposito_cuenta_corriente_util::$STR_MODULO_OPCION.deposito_cuenta_corriente_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(deposito_cuenta_corriente_util::$STR_SESSION_NAME,serialize($deposito_cuenta_corriente_session));
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
			/*$deposito_cuenta_corrienteClase= (deposito_cuenta_corriente) deposito_cuenta_corrientesModel.getRowData();*/
			
			$this->deposito_cuenta_corrienteClase->setId($this->deposito_cuenta_corriente->getId());	
			$this->deposito_cuenta_corrienteClase->setVersionRow($this->deposito_cuenta_corriente->getVersionRow());	
			$this->deposito_cuenta_corrienteClase->setVersionRow($this->deposito_cuenta_corriente->getVersionRow());	
			$this->deposito_cuenta_corrienteClase->setid_empresa($this->deposito_cuenta_corriente->getid_empresa());	
			$this->deposito_cuenta_corrienteClase->setid_sucursal($this->deposito_cuenta_corriente->getid_sucursal());	
			$this->deposito_cuenta_corrienteClase->setid_ejercicio($this->deposito_cuenta_corriente->getid_ejercicio());	
			$this->deposito_cuenta_corrienteClase->setid_periodo($this->deposito_cuenta_corriente->getid_periodo());	
			$this->deposito_cuenta_corrienteClase->setid_usuario($this->deposito_cuenta_corriente->getid_usuario());	
			$this->deposito_cuenta_corrienteClase->setid_cuenta_corriente($this->deposito_cuenta_corriente->getid_cuenta_corriente());	
			$this->deposito_cuenta_corrienteClase->setfecha_emision($this->deposito_cuenta_corriente->getfecha_emision());	
			$this->deposito_cuenta_corrienteClase->setmonto($this->deposito_cuenta_corriente->getmonto());	
			$this->deposito_cuenta_corrienteClase->setmonto_texto($this->deposito_cuenta_corriente->getmonto_texto());	
			$this->deposito_cuenta_corrienteClase->setsaldo($this->deposito_cuenta_corriente->getsaldo());	
			$this->deposito_cuenta_corrienteClase->setdescripcion($this->deposito_cuenta_corriente->getdescripcion());	
			$this->deposito_cuenta_corrienteClase->setes_balance_inicial($this->deposito_cuenta_corriente->getes_balance_inicial());	
			$this->deposito_cuenta_corrienteClase->setid_estado_deposito_retiro($this->deposito_cuenta_corriente->getid_estado_deposito_retiro());	
			$this->deposito_cuenta_corrienteClase->setdebito($this->deposito_cuenta_corriente->getdebito());	
			$this->deposito_cuenta_corrienteClase->setcredito($this->deposito_cuenta_corriente->getcredito());	
		
			/*$this->Session->write('deposito_cuenta_corrienteVersionRowActual', deposito_cuenta_corriente.getVersionRow());*/
			
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
			
			$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));
						
			if($deposito_cuenta_corriente_session==null) {
				$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('deposito_cuenta_corriente', $this->deposito_cuenta_corriente->read(null, $id));
	
			
			$this->deposito_cuenta_corriente->recursive = 0;
			
			$this->deposito_cuenta_corrientes=$this->paginate();
			
			$this->set('deposito_cuenta_corrientes', $this->deposito_cuenta_corrientes);
	
			if (empty($this->data)) {
				$this->data = $this->deposito_cuenta_corriente->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->deposito_cuenta_corrienteLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->deposito_cuenta_corrienteClase);
			
			$this->deposito_cuenta_corrienteActual=$this->deposito_cuenta_corrienteClase;
			
			/*$this->deposito_cuenta_corrienteActual =$this->migrarModeldeposito_cuenta_corriente($this->deposito_cuenta_corrienteClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes(),$this->deposito_cuenta_corrienteActual);
			
			$this->actualizarControllerConReturnGeneral($this->deposito_cuenta_corrienteReturnGeneral);
			
			//$this->deposito_cuenta_corrienteReturnGeneral=$this->deposito_cuenta_corrienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes(),$this->deposito_cuenta_corrienteActual,$this->deposito_cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));
						
			if($deposito_cuenta_corriente_session==null) {
				$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevodeposito_cuenta_corriente', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->deposito_cuenta_corrienteClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->deposito_cuenta_corrienteClase);
			
			$this->deposito_cuenta_corrienteActual =$this->deposito_cuenta_corrienteClase;
			
			/*$this->deposito_cuenta_corrienteActual =$this->migrarModeldeposito_cuenta_corriente($this->deposito_cuenta_corrienteClase);*/
			
			$this->setdeposito_cuenta_corrienteFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes(),$this->deposito_cuenta_corriente);
			
			$this->actualizarControllerConReturnGeneral($this->deposito_cuenta_corrienteReturnGeneral);
			
			//this->deposito_cuenta_corrienteReturnGeneral=$this->deposito_cuenta_corrienteLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes(),$this->deposito_cuenta_corriente,$this->deposito_cuenta_corrienteParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->deposito_cuenta_corrienteReturnGeneral->getdeposito_cuenta_corriente()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idsucursalDefaultFK!=null && $this->idsucursalDefaultFK > -1) {
				$this->deposito_cuenta_corrienteReturnGeneral->getdeposito_cuenta_corriente()->setid_sucursal($this->idsucursalDefaultFK);
			}

			if($this->idejercicioDefaultFK!=null && $this->idejercicioDefaultFK > -1) {
				$this->deposito_cuenta_corrienteReturnGeneral->getdeposito_cuenta_corriente()->setid_ejercicio($this->idejercicioDefaultFK);
			}

			if($this->idperiodoDefaultFK!=null && $this->idperiodoDefaultFK > -1) {
				$this->deposito_cuenta_corrienteReturnGeneral->getdeposito_cuenta_corriente()->setid_periodo($this->idperiodoDefaultFK);
			}

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->deposito_cuenta_corrienteReturnGeneral->getdeposito_cuenta_corriente()->setid_usuario($this->idusuarioDefaultFK);
			}

			if($this->idcuenta_corrienteDefaultFK!=null && $this->idcuenta_corrienteDefaultFK > -1) {
				$this->deposito_cuenta_corrienteReturnGeneral->getdeposito_cuenta_corriente()->setid_cuenta_corriente($this->idcuenta_corrienteDefaultFK);
			}

			if($this->idestado_deposito_retiroDefaultFK!=null && $this->idestado_deposito_retiroDefaultFK > -1) {
				$this->deposito_cuenta_corrienteReturnGeneral->getdeposito_cuenta_corriente()->setid_estado_deposito_retiro($this->idestado_deposito_retiroDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->deposito_cuenta_corrienteReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->deposito_cuenta_corrienteReturnGeneral->getdeposito_cuenta_corriente(),$this->deposito_cuenta_corrienteActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeydeposito_cuenta_corriente($this->deposito_cuenta_corrienteReturnGeneral->getdeposito_cuenta_corriente());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariodeposito_cuenta_corriente($this->deposito_cuenta_corrienteReturnGeneral->getdeposito_cuenta_corriente());*/
			}
			
			if($this->deposito_cuenta_corrienteReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->deposito_cuenta_corrienteReturnGeneral->getdeposito_cuenta_corriente(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualdeposito_cuenta_corriente($this->deposito_cuenta_corriente,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->deposito_cuenta_corrientesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->deposito_cuenta_corrientesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->deposito_cuenta_corrientesAuxiliar=array();
			}
			
			if(count($this->deposito_cuenta_corrientesAuxiliar)==2) {
				$deposito_cuenta_corrienteOrigen=$this->deposito_cuenta_corrientesAuxiliar[0];
				$deposito_cuenta_corrienteDestino=$this->deposito_cuenta_corrientesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($deposito_cuenta_corrienteOrigen,$deposito_cuenta_corrienteDestino,true,false,false);
				
				$this->actualizarLista($deposito_cuenta_corrienteDestino,$this->deposito_cuenta_corrientes);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->deposito_cuenta_corrientesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->deposito_cuenta_corrientesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->deposito_cuenta_corrientesAuxiliar=array();
			}
			
			if(count($this->deposito_cuenta_corrientesAuxiliar) > 0) {
				foreach ($this->deposito_cuenta_corrientesAuxiliar as $deposito_cuenta_corrienteSeleccionado) {
					$this->deposito_cuenta_corriente=new deposito_cuenta_corriente();
					
					$this->setCopiarVariablesObjetos($deposito_cuenta_corrienteSeleccionado,$this->deposito_cuenta_corriente,true,true,false);
						
					$this->deposito_cuenta_corrientes[]=$this->deposito_cuenta_corriente;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->deposito_cuenta_corrientesEliminados as $deposito_cuenta_corrienteEliminado) {
				$this->deposito_cuenta_corrienteLogic->deposito_cuenta_corrientes[]=$deposito_cuenta_corrienteEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->deposito_cuenta_corriente=new deposito_cuenta_corriente();
							
				$this->deposito_cuenta_corrientes[]=$this->deposito_cuenta_corriente;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
		
		$deposito_cuenta_corrienteActual=new deposito_cuenta_corriente();
		
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
				
				$deposito_cuenta_corrienteActual=$this->deposito_cuenta_corrientes[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $deposito_cuenta_corrienteActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $deposito_cuenta_corrienteActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $deposito_cuenta_corrienteActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $deposito_cuenta_corrienteActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $deposito_cuenta_corrienteActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $deposito_cuenta_corrienteActual->setid_cuenta_corriente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $deposito_cuenta_corrienteActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $deposito_cuenta_corrienteActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $deposito_cuenta_corrienteActual->setmonto_texto($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $deposito_cuenta_corrienteActual->setsaldo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $deposito_cuenta_corrienteActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $deposito_cuenta_corrienteActual->setes_balance_inicial(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_14')));  } else { $deposito_cuenta_corrienteActual->setes_balance_inicial(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $deposito_cuenta_corrienteActual->setid_estado_deposito_retiro((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $deposito_cuenta_corrienteActual->setdebito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $deposito_cuenta_corrienteActual->setcredito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
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
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoaddeposito_cuenta_corriente='',string $strTipoPaginaAuxiliardeposito_cuenta_corriente='',string $strTipoUsuarioAuxiliardeposito_cuenta_corriente='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoaddeposito_cuenta_corriente,$strTipoPaginaAuxiliardeposito_cuenta_corriente,$strTipoUsuarioAuxiliardeposito_cuenta_corriente,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->deposito_cuenta_corrientes) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=deposito_cuenta_corriente_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=deposito_cuenta_corriente_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=deposito_cuenta_corriente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));
						
			if($deposito_cuenta_corriente_session==null) {
				$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
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
					/*$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;*/
					
					if($deposito_cuenta_corriente_session->intNumeroPaginacion==deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$deposito_cuenta_corriente_session->intNumeroPaginacion;
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
			
			$this->deposito_cuenta_corrientesEliminados=array();
			
			/*$this->deposito_cuenta_corrienteLogic->setConnexion($connexion);*/
			
			$this->deposito_cuenta_corrienteLogic->setIsConDeep(true);
			
			$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrienteDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cuenta_corriente');$classes[]=$class;
			$class=new Classe('estado_deposito_retiro');$classes[]=$class;
			
			$this->deposito_cuenta_corrienteLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->deposito_cuenta_corrienteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes()==null|| count($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->deposito_cuenta_corrientes=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->deposito_cuenta_corrienteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->deposito_cuenta_corrientesReporte=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();
									
						/*$this->generarReportes('Todos',$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes());*/
					
						$this->deposito_cuenta_corrienteLogic->setdeposito_cuenta_corrientes($this->deposito_cuenta_corrientes);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->deposito_cuenta_corrienteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes()==null|| count($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->deposito_cuenta_corrientes=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->deposito_cuenta_corrienteLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->deposito_cuenta_corrientesReporte=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();
									
						/*$this->generarReportes('Todos',$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes());*/
					
						$this->deposito_cuenta_corrienteLogic->setdeposito_cuenta_corrientes($this->deposito_cuenta_corrientes);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->iddeposito_cuenta_corriente=0;*/
				
				if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionFK!=null && $deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionFK==true) {
					if($deposito_cuenta_corriente_session->bigIdActualFK!=null && $deposito_cuenta_corriente_session->bigIdActualFK!=0)	{
						$this->iddeposito_cuenta_corriente=$deposito_cuenta_corriente_session->bigIdActualFK;	
					}
					
					$deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionFK=false;
					
					$deposito_cuenta_corriente_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					iddeposito_cuenta_corriente=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					iddeposito_cuenta_corriente=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->deposito_cuenta_corrienteLogic->getEntity($this->iddeposito_cuenta_corriente);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*deposito_cuenta_corrienteLogicAdditional::getDetalleIndicePorId($iddeposito_cuenta_corriente);*/

				
				if($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corriente()!=null) {
					$this->deposito_cuenta_corrienteLogic->setdeposito_cuenta_corrientes(array());
					$this->deposito_cuenta_corrienteLogic->deposito_cuenta_corrientes[]=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corriente();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcuenta_corriente')
			{

				if($deposito_cuenta_corriente_session->bigidcuenta_corrienteActual!=null && $deposito_cuenta_corriente_session->bigidcuenta_corrienteActual!=0)
				{
					$this->id_cuenta_corrienteFK_Idcuenta_corriente=$deposito_cuenta_corriente_session->bigidcuenta_corrienteActual;
					$deposito_cuenta_corriente_session->bigidcuenta_corrienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->deposito_cuenta_corrienteLogic->getsFK_Idcuenta_corriente($finalQueryPaginacion,$this->pagination,$this->id_cuenta_corrienteFK_Idcuenta_corriente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//deposito_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idcuenta_corriente($this->id_cuenta_corrienteFK_Idcuenta_corriente);


					if($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes()==null || count($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$deposito_cuenta_corrientes=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->deposito_cuenta_corrienteLogic->getsFK_Idcuenta_corriente('',$this->pagination,$this->id_cuenta_corrienteFK_Idcuenta_corriente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->deposito_cuenta_corrientesReporte=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedeposito_cuenta_corrientes("FK_Idcuenta_corriente",$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->deposito_cuenta_corrienteLogic->setdeposito_cuenta_corrientes($deposito_cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idejercicio')
			{

				if($deposito_cuenta_corriente_session->bigidejercicioActual!=null && $deposito_cuenta_corriente_session->bigidejercicioActual!=0)
				{
					$this->id_ejercicioFK_Idejercicio=$deposito_cuenta_corriente_session->bigidejercicioActual;
					$deposito_cuenta_corriente_session->bigidejercicioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->deposito_cuenta_corrienteLogic->getsFK_Idejercicio($finalQueryPaginacion,$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//deposito_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idejercicio($this->id_ejercicioFK_Idejercicio);


					if($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes()==null || count($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$deposito_cuenta_corrientes=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->deposito_cuenta_corrienteLogic->getsFK_Idejercicio('',$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->deposito_cuenta_corrientesReporte=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedeposito_cuenta_corrientes("FK_Idejercicio",$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->deposito_cuenta_corrienteLogic->setdeposito_cuenta_corrientes($deposito_cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($deposito_cuenta_corriente_session->bigidempresaActual!=null && $deposito_cuenta_corriente_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$deposito_cuenta_corriente_session->bigidempresaActual;
					$deposito_cuenta_corriente_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->deposito_cuenta_corrienteLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//deposito_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes()==null || count($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$deposito_cuenta_corrientes=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->deposito_cuenta_corrienteLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->deposito_cuenta_corrientesReporte=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedeposito_cuenta_corrientes("FK_Idempresa",$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->deposito_cuenta_corrienteLogic->setdeposito_cuenta_corrientes($deposito_cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idestado_deposito_retiro')
			{

				if($deposito_cuenta_corriente_session->bigidestado_deposito_retiroActual!=null && $deposito_cuenta_corriente_session->bigidestado_deposito_retiroActual!=0)
				{
					$this->id_estado_deposito_retiroFK_Idestado_deposito_retiro=$deposito_cuenta_corriente_session->bigidestado_deposito_retiroActual;
					$deposito_cuenta_corriente_session->bigidestado_deposito_retiroActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->deposito_cuenta_corrienteLogic->getsFK_Idestado_deposito_retiro($finalQueryPaginacion,$this->pagination,$this->id_estado_deposito_retiroFK_Idestado_deposito_retiro);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//deposito_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idestado_deposito_retiro($this->id_estado_deposito_retiroFK_Idestado_deposito_retiro);


					if($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes()==null || count($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$deposito_cuenta_corrientes=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->deposito_cuenta_corrienteLogic->getsFK_Idestado_deposito_retiro('',$this->pagination,$this->id_estado_deposito_retiroFK_Idestado_deposito_retiro);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->deposito_cuenta_corrientesReporte=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedeposito_cuenta_corrientes("FK_Idestado_deposito_retiro",$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->deposito_cuenta_corrienteLogic->setdeposito_cuenta_corrientes($deposito_cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperiodo')
			{

				if($deposito_cuenta_corriente_session->bigidperiodoActual!=null && $deposito_cuenta_corriente_session->bigidperiodoActual!=0)
				{
					$this->id_periodoFK_Idperiodo=$deposito_cuenta_corriente_session->bigidperiodoActual;
					$deposito_cuenta_corriente_session->bigidperiodoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->deposito_cuenta_corrienteLogic->getsFK_Idperiodo($finalQueryPaginacion,$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//deposito_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idperiodo($this->id_periodoFK_Idperiodo);


					if($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes()==null || count($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$deposito_cuenta_corrientes=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->deposito_cuenta_corrienteLogic->getsFK_Idperiodo('',$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->deposito_cuenta_corrientesReporte=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedeposito_cuenta_corrientes("FK_Idperiodo",$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->deposito_cuenta_corrienteLogic->setdeposito_cuenta_corrientes($deposito_cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsucursal')
			{

				if($deposito_cuenta_corriente_session->bigidsucursalActual!=null && $deposito_cuenta_corriente_session->bigidsucursalActual!=0)
				{
					$this->id_sucursalFK_Idsucursal=$deposito_cuenta_corriente_session->bigidsucursalActual;
					$deposito_cuenta_corriente_session->bigidsucursalActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->deposito_cuenta_corrienteLogic->getsFK_Idsucursal($finalQueryPaginacion,$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//deposito_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idsucursal($this->id_sucursalFK_Idsucursal);


					if($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes()==null || count($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$deposito_cuenta_corrientes=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->deposito_cuenta_corrienteLogic->getsFK_Idsucursal('',$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->deposito_cuenta_corrientesReporte=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedeposito_cuenta_corrientes("FK_Idsucursal",$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->deposito_cuenta_corrienteLogic->setdeposito_cuenta_corrientes($deposito_cuenta_corrientes);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($deposito_cuenta_corriente_session->bigidusuarioActual!=null && $deposito_cuenta_corriente_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$deposito_cuenta_corriente_session->bigidusuarioActual;
					$deposito_cuenta_corriente_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->deposito_cuenta_corrienteLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//deposito_cuenta_corrienteLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes()==null || count($this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$deposito_cuenta_corrientes=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->deposito_cuenta_corrienteLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->deposito_cuenta_corrientesReporte=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportedeposito_cuenta_corrientes("FK_Idusuario",$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes());

					if($this->strTipoPaginacion=='TODOS') {
						$this->deposito_cuenta_corrienteLogic->setdeposito_cuenta_corrientes($deposito_cuenta_corrientes);
					}
				//}

			} 
		
		$deposito_cuenta_corriente_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$deposito_cuenta_corriente_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->deposito_cuenta_corrienteLogic->loadForeignsKeysDescription();*/
		
		$this->deposito_cuenta_corrientes=$this->deposito_cuenta_corrienteLogic->getdeposito_cuenta_corrientes();
		
		if($this->deposito_cuenta_corrientesEliminados==null) {
			$this->deposito_cuenta_corrientesEliminados=array();
		}
		
		$this->Session->write(deposito_cuenta_corriente_util::$STR_SESSION_NAME.'Lista',serialize($this->deposito_cuenta_corrientes));
		$this->Session->write(deposito_cuenta_corriente_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->deposito_cuenta_corrientesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(deposito_cuenta_corriente_util::$STR_SESSION_NAME,serialize($deposito_cuenta_corriente_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->iddeposito_cuenta_corriente=$idGeneral;
			
			$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
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
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if(count($this->deposito_cuenta_corrientes) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Idcuenta_corrienteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_corrienteFK_Idcuenta_corriente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_corriente','cmbid_cuenta_corriente');

			$this->strAccionBusqueda='FK_Idcuenta_corriente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdejercicioParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ejercicioFK_Idejercicio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idejercicio','cmbid_ejercicio');

			$this->strAccionBusqueda='FK_Idejercicio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idestado_deposito_retiroParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_estado_deposito_retiroFK_Idestado_deposito_retiro=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idestado_deposito_retiro','cmbid_estado_deposito_retiro');

			$this->strAccionBusqueda='FK_Idestado_deposito_retiro';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdperiodoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_periodoFK_Idperiodo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperiodo','cmbid_periodo');

			$this->strAccionBusqueda='FK_Idperiodo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdsucursalParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sucursalFK_Idsucursal=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsucursal','cmbid_sucursal');

			$this->strAccionBusqueda='FK_Idsucursal';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
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
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcuenta_corriente($strFinalQuery,$id_cuenta_corriente)
	{
		try
		{

			$this->deposito_cuenta_corrienteLogic->getsFK_Idcuenta_corriente($strFinalQuery,new Pagination(),$id_cuenta_corriente);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idejercicio($strFinalQuery,$id_ejercicio)
	{
		try
		{

			$this->deposito_cuenta_corrienteLogic->getsFK_Idejercicio($strFinalQuery,new Pagination(),$id_ejercicio);
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

			$this->deposito_cuenta_corrienteLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idestado_deposito_retiro($strFinalQuery,$id_estado_deposito_retiro)
	{
		try
		{

			$this->deposito_cuenta_corrienteLogic->getsFK_Idestado_deposito_retiro($strFinalQuery,new Pagination(),$id_estado_deposito_retiro);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idperiodo($strFinalQuery,$id_periodo)
	{
		try
		{

			$this->deposito_cuenta_corrienteLogic->getsFK_Idperiodo($strFinalQuery,new Pagination(),$id_periodo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idsucursal($strFinalQuery,$id_sucursal)
	{
		try
		{

			$this->deposito_cuenta_corrienteLogic->getsFK_Idsucursal($strFinalQuery,new Pagination(),$id_sucursal);
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

			$this->deposito_cuenta_corrienteLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
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
			
			
			$deposito_cuenta_corrienteForeignKey=new deposito_cuenta_corriente_param_return(); //deposito_cuenta_corrienteForeignKey();
			
			$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));
						
			if($deposito_cuenta_corriente_session==null) {
				$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$deposito_cuenta_corrienteForeignKey=$this->deposito_cuenta_corrienteLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$deposito_cuenta_corriente_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$deposito_cuenta_corrienteForeignKey->empresasFK;
				$this->idempresaDefaultFK=$deposito_cuenta_corrienteForeignKey->idempresaDefaultFK;
			}

			if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$this->strRecargarFkTipos,',')) {
				$this->sucursalsFK=$deposito_cuenta_corrienteForeignKey->sucursalsFK;
				$this->idsucursalDefaultFK=$deposito_cuenta_corrienteForeignKey->idsucursalDefaultFK;
			}

			if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionsucursal) {
				$this->setVisibleBusquedasParasucursal(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$this->strRecargarFkTipos,',')) {
				$this->ejerciciosFK=$deposito_cuenta_corrienteForeignKey->ejerciciosFK;
				$this->idejercicioDefaultFK=$deposito_cuenta_corrienteForeignKey->idejercicioDefaultFK;
			}

			if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionejercicio) {
				$this->setVisibleBusquedasParaejercicio(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$this->strRecargarFkTipos,',')) {
				$this->periodosFK=$deposito_cuenta_corrienteForeignKey->periodosFK;
				$this->idperiodoDefaultFK=$deposito_cuenta_corrienteForeignKey->idperiodoDefaultFK;
			}

			if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionperiodo) {
				$this->setVisibleBusquedasParaperiodo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$deposito_cuenta_corrienteForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$deposito_cuenta_corrienteForeignKey->idusuarioDefaultFK;
			}

			if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario) {
				$this->setVisibleBusquedasParausuario(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_corriente',$this->strRecargarFkTipos,',')) {
				$this->cuenta_corrientesFK=$deposito_cuenta_corrienteForeignKey->cuenta_corrientesFK;
				$this->idcuenta_corrienteDefaultFK=$deposito_cuenta_corrienteForeignKey->idcuenta_corrienteDefaultFK;
			}

			if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta_corriente) {
				$this->setVisibleBusquedasParacuenta_corriente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado_deposito_retiro',$this->strRecargarFkTipos,',')) {
				$this->estado_deposito_retirosFK=$deposito_cuenta_corrienteForeignKey->estado_deposito_retirosFK;
				$this->idestado_deposito_retiroDefaultFK=$deposito_cuenta_corrienteForeignKey->idestado_deposito_retiroDefaultFK;
			}

			if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_deposito_retiro) {
				$this->setVisibleBusquedasParaestado_deposito_retiro(true);
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
	
	function cargarCombosFKFromReturnGeneral($deposito_cuenta_corrienteReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$deposito_cuenta_corrienteReturnGeneral->strRecargarFkTipos;
			
			


			if($deposito_cuenta_corrienteReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$deposito_cuenta_corrienteReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$deposito_cuenta_corrienteReturnGeneral->idempresaDefaultFK;
			}


			if($deposito_cuenta_corrienteReturnGeneral->con_sucursalsFK==true) {
				$this->sucursalsFK=$deposito_cuenta_corrienteReturnGeneral->sucursalsFK;
				$this->idsucursalDefaultFK=$deposito_cuenta_corrienteReturnGeneral->idsucursalDefaultFK;
			}


			if($deposito_cuenta_corrienteReturnGeneral->con_ejerciciosFK==true) {
				$this->ejerciciosFK=$deposito_cuenta_corrienteReturnGeneral->ejerciciosFK;
				$this->idejercicioDefaultFK=$deposito_cuenta_corrienteReturnGeneral->idejercicioDefaultFK;
			}


			if($deposito_cuenta_corrienteReturnGeneral->con_periodosFK==true) {
				$this->periodosFK=$deposito_cuenta_corrienteReturnGeneral->periodosFK;
				$this->idperiodoDefaultFK=$deposito_cuenta_corrienteReturnGeneral->idperiodoDefaultFK;
			}


			if($deposito_cuenta_corrienteReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$deposito_cuenta_corrienteReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$deposito_cuenta_corrienteReturnGeneral->idusuarioDefaultFK;
			}


			if($deposito_cuenta_corrienteReturnGeneral->con_cuenta_corrientesFK==true) {
				$this->cuenta_corrientesFK=$deposito_cuenta_corrienteReturnGeneral->cuenta_corrientesFK;
				$this->idcuenta_corrienteDefaultFK=$deposito_cuenta_corrienteReturnGeneral->idcuenta_corrienteDefaultFK;
			}


			if($deposito_cuenta_corrienteReturnGeneral->con_estado_deposito_retirosFK==true) {
				$this->estado_deposito_retirosFK=$deposito_cuenta_corrienteReturnGeneral->estado_deposito_retirosFK;
				$this->idestado_deposito_retiroDefaultFK=$deposito_cuenta_corrienteReturnGeneral->idestado_deposito_retiroDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));
		
		if($deposito_cuenta_corriente_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($deposito_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($deposito_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sucursal_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sucursal';
			}
			else if($deposito_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ejercicio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ejercicio';
			}
			else if($deposito_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==periodo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='periodo';
			}
			else if($deposito_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			else if($deposito_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_corriente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta_corriente';
			}
			else if($deposito_cuenta_corriente_session->getstrNombrePaginaNavegacionHaciaFKDesde()==estado_deposito_retiro_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='estado_deposito_retiro';
			}
			
			$deposito_cuenta_corriente_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}						
			
			$this->deposito_cuenta_corrientesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->deposito_cuenta_corrientesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->deposito_cuenta_corrientesAuxiliar=array();
			}
			
			if(count($this->deposito_cuenta_corrientesAuxiliar) > 0) {
				
				foreach ($this->deposito_cuenta_corrientesAuxiliar as $deposito_cuenta_corrienteSeleccionado) {
					$this->eliminarTablaBase($deposito_cuenta_corrienteSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
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


	public function getsucursalsFKListSelectItem() 
	{
		$sucursalsList=array();

		$item=null;

		foreach($this->sucursalsFK as $sucursal)
		{
			$item=new SelectItem();
			$item->setLabel($sucursal->getnombre());
			$item->setValue($sucursal->getId());
			$sucursalsList[]=$item;
		}

		return $sucursalsList;
	}


	public function getejerciciosFKListSelectItem() 
	{
		$ejerciciosList=array();

		$item=null;

		foreach($this->ejerciciosFK as $ejercicio)
		{
			$item=new SelectItem();
			$item->setLabel($ejercicio->getId());
			$item->setValue($ejercicio->getId());
			$ejerciciosList[]=$item;
		}

		return $ejerciciosList;
	}


	public function getperiodosFKListSelectItem() 
	{
		$periodosList=array();

		$item=null;

		foreach($this->periodosFK as $periodo)
		{
			$item=new SelectItem();
			$item->setLabel($periodo->getnombre());
			$item->setValue($periodo->getId());
			$periodosList[]=$item;
		}

		return $periodosList;
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


	public function getcuenta_corrientesFKListSelectItem() 
	{
		$cuenta_corrientesList=array();

		$item=null;

		foreach($this->cuenta_corrientesFK as $cuenta_corriente)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta_corriente->getId());
			$item->setValue($cuenta_corriente->getId());
			$cuenta_corrientesList[]=$item;
		}

		return $cuenta_corrientesList;
	}


	public function getestado_deposito_retirosFKListSelectItem() 
	{
		$estado_deposito_retirosList=array();

		$item=null;

		foreach($this->estado_deposito_retirosFK as $estado_deposito_retiro)
		{
			$item=new SelectItem();
			$item->setLabel($estado_deposito_retiro->getcodigo());
			$item->setValue($estado_deposito_retiro->getId());
			$estado_deposito_retirosList[]=$item;
		}

		return $estado_deposito_retirosList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
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
				$this->deposito_cuenta_corrienteLogic->commitNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->rollbackNewConnexionToDeep();
				$this->deposito_cuenta_corrienteLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$deposito_cuenta_corrientesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->deposito_cuenta_corrientes as $deposito_cuenta_corrienteLocal) {
				if($deposito_cuenta_corrienteLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->deposito_cuenta_corriente=new deposito_cuenta_corriente();
				
				$this->deposito_cuenta_corriente->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->deposito_cuenta_corrientes[]=$this->deposito_cuenta_corriente;*/
				
				$deposito_cuenta_corrientesNuevos[]=$this->deposito_cuenta_corriente;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('sucursal');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('usuario');$classes[]=$class;
				$class=new Classe('cuenta_corriente');$classes[]=$class;
				$class=new Classe('estado_deposito_retiro');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->deposito_cuenta_corrienteLogic->setdeposito_cuenta_corrientes($deposito_cuenta_corrientesNuevos);
					
				$this->deposito_cuenta_corrienteLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($deposito_cuenta_corrientesNuevos as $deposito_cuenta_corrienteNuevo) {
					$this->deposito_cuenta_corrientes[]=$deposito_cuenta_corrienteNuevo;
				}
				
				/*$this->deposito_cuenta_corrientes[]=$deposito_cuenta_corrientesNuevos;*/
				
				$this->deposito_cuenta_corrienteLogic->setdeposito_cuenta_corrientes($this->deposito_cuenta_corrientes);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($deposito_cuenta_corrientesNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));

		if($deposito_cuenta_corriente_session==null) {
			$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
		}
		
		if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($deposito_cuenta_corriente_session->bigidempresaActual!=null && $deposito_cuenta_corriente_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($deposito_cuenta_corriente_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=deposito_cuenta_corriente_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombossucursalsFK($connexion=null,$strRecargarFkQuery=''){
		$sucursalLogic= new sucursal_logic();
		$pagination= new Pagination();
		$this->sucursalsFK=array();

		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));

		if($deposito_cuenta_corriente_session==null) {
			$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
		}
		
		if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionsucursal!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=sucursal_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalsucursal=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalsucursal=Funciones::GetFinalQueryAppend($finalQueryGlobalsucursal, '');
				$finalQueryGlobalsucursal.=sucursal_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalsucursal.$strRecargarFkQuery;		

				$sucursalLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombossucursalsFK($sucursalLogic->getsucursals());

		} else {
			$this->setVisibleBusquedasParasucursal(true);


			if($deposito_cuenta_corriente_session->bigidsucursalActual!=null && $deposito_cuenta_corriente_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($deposito_cuenta_corriente_session->bigidsucursalActual);//WithConnection

				$this->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=deposito_cuenta_corriente_util::getsucursalDescripcion($sucursalLogic->getsucursal());
				$this->idsucursalDefaultFK=$sucursalLogic->getsucursal()->getId();
			}
		}
	}

	public function cargarCombosejerciciosFK($connexion=null,$strRecargarFkQuery=''){
		$ejercicioLogic= new ejercicio_logic();
		$pagination= new Pagination();
		$this->ejerciciosFK=array();

		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));

		if($deposito_cuenta_corriente_session==null) {
			$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
		}
		
		if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionejercicio!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=ejercicio_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalejercicio=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalejercicio=Funciones::GetFinalQueryAppend($finalQueryGlobalejercicio, '');
				$finalQueryGlobalejercicio.=ejercicio_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalejercicio.$strRecargarFkQuery;		

				$ejercicioLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosejerciciosFK($ejercicioLogic->getejercicios());

		} else {
			$this->setVisibleBusquedasParaejercicio(true);


			if($deposito_cuenta_corriente_session->bigidejercicioActual!=null && $deposito_cuenta_corriente_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($deposito_cuenta_corriente_session->bigidejercicioActual);//WithConnection

				$this->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=deposito_cuenta_corriente_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
				$this->idejercicioDefaultFK=$ejercicioLogic->getejercicio()->getId();
			}
		}
	}

	public function cargarCombosperiodosFK($connexion=null,$strRecargarFkQuery=''){
		$periodoLogic= new periodo_logic();
		$pagination= new Pagination();
		$this->periodosFK=array();

		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));

		if($deposito_cuenta_corriente_session==null) {
			$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
		}
		
		if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionperiodo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=periodo_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalperiodo=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalperiodo=Funciones::GetFinalQueryAppend($finalQueryGlobalperiodo, '');
				$finalQueryGlobalperiodo.=periodo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalperiodo.$strRecargarFkQuery;		

				$periodoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosperiodosFK($periodoLogic->getperiodos());

		} else {
			$this->setVisibleBusquedasParaperiodo(true);


			if($deposito_cuenta_corriente_session->bigidperiodoActual!=null && $deposito_cuenta_corriente_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($deposito_cuenta_corriente_session->bigidperiodoActual);//WithConnection

				$this->periodosFK[$periodoLogic->getperiodo()->getId()]=deposito_cuenta_corriente_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$this->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
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

		$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));

		if($deposito_cuenta_corriente_session==null) {
			$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
		}
		
		if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario!=true) {
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


			if($deposito_cuenta_corriente_session->bigidusuarioActual!=null && $deposito_cuenta_corriente_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($deposito_cuenta_corriente_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=deposito_cuenta_corriente_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarComboscuenta_corrientesFK($connexion=null,$strRecargarFkQuery=''){
		$cuenta_corrienteLogic= new cuenta_corriente_logic();
		$pagination= new Pagination();
		$this->cuenta_corrientesFK=array();

		$cuenta_corrienteLogic->setConnexion($connexion);
		$cuenta_corrienteLogic->getcuenta_corrienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));

		if($deposito_cuenta_corriente_session==null) {
			$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
		}
		
		if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta_corriente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_corriente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcuenta_corriente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta_corriente=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta_corriente, '');
				$finalQueryGlobalcuenta_corriente.=cuenta_corriente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta_corriente.$strRecargarFkQuery;		

				$cuenta_corrienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscuenta_corrientesFK($cuenta_corrienteLogic->getcuenta_corrientes());

		} else {
			$this->setVisibleBusquedasParacuenta_corriente(true);


			if($deposito_cuenta_corriente_session->bigidcuenta_corrienteActual!=null && $deposito_cuenta_corriente_session->bigidcuenta_corrienteActual > 0) {
				$cuenta_corrienteLogic->getEntity($deposito_cuenta_corriente_session->bigidcuenta_corrienteActual);//WithConnection

				$this->cuenta_corrientesFK[$cuenta_corrienteLogic->getcuenta_corriente()->getId()]=deposito_cuenta_corriente_util::getcuenta_corrienteDescripcion($cuenta_corrienteLogic->getcuenta_corriente());
				$this->idcuenta_corrienteDefaultFK=$cuenta_corrienteLogic->getcuenta_corriente()->getId();
			}
		}
	}

	public function cargarCombosestado_deposito_retirosFK($connexion=null,$strRecargarFkQuery=''){
		$estado_deposito_retiroLogic= new estado_deposito_retiro_logic();
		$pagination= new Pagination();
		$this->estado_deposito_retirosFK=array();

		$estado_deposito_retiroLogic->setConnexion($connexion);
		$estado_deposito_retiroLogic->getestado_deposito_retiroDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));

		if($deposito_cuenta_corriente_session==null) {
			$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
		}
		
		if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_deposito_retiro!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_deposito_retiro_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalestado_deposito_retiro=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado_deposito_retiro=Funciones::GetFinalQueryAppend($finalQueryGlobalestado_deposito_retiro, '');
				$finalQueryGlobalestado_deposito_retiro.=estado_deposito_retiro_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado_deposito_retiro.$strRecargarFkQuery;		

				$estado_deposito_retiroLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosestado_deposito_retirosFK($estado_deposito_retiroLogic->getestado_deposito_retiros());

		} else {
			$this->setVisibleBusquedasParaestado_deposito_retiro(true);


			if($deposito_cuenta_corriente_session->bigidestado_deposito_retiroActual!=null && $deposito_cuenta_corriente_session->bigidestado_deposito_retiroActual > 0) {
				$estado_deposito_retiroLogic->getEntity($deposito_cuenta_corriente_session->bigidestado_deposito_retiroActual);//WithConnection

				$this->estado_deposito_retirosFK[$estado_deposito_retiroLogic->getestado_deposito_retiro()->getId()]=deposito_cuenta_corriente_util::getestado_deposito_retiroDescripcion($estado_deposito_retiroLogic->getestado_deposito_retiro());
				$this->idestado_deposito_retiroDefaultFK=$estado_deposito_retiroLogic->getestado_deposito_retiro()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=deposito_cuenta_corriente_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombossucursalsFK($sucursals){

		foreach ($sucursals as $sucursalLocal ) {
			if($this->idsucursalDefaultFK==0) {
				$this->idsucursalDefaultFK=$sucursalLocal->getId();
			}

			$this->sucursalsFK[$sucursalLocal->getId()]=deposito_cuenta_corriente_util::getsucursalDescripcion($sucursalLocal);
		}
	}

	public function prepararCombosejerciciosFK($ejercicios){

		foreach ($ejercicios as $ejercicioLocal ) {
			if($this->idejercicioDefaultFK==0) {
				$this->idejercicioDefaultFK=$ejercicioLocal->getId();
			}

			$this->ejerciciosFK[$ejercicioLocal->getId()]=deposito_cuenta_corriente_util::getejercicioDescripcion($ejercicioLocal);
		}
	}

	public function prepararCombosperiodosFK($periodos){

		foreach ($periodos as $periodoLocal ) {
			if($this->idperiodoDefaultFK==0) {
				$this->idperiodoDefaultFK=$periodoLocal->getId();
			}

			$this->periodosFK[$periodoLocal->getId()]=deposito_cuenta_corriente_util::getperiodoDescripcion($periodoLocal);
		}
	}

	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=deposito_cuenta_corriente_util::getusuarioDescripcion($usuarioLocal);
		}
	}

	public function prepararComboscuenta_corrientesFK($cuenta_corrientes){

		foreach ($cuenta_corrientes as $cuenta_corrienteLocal ) {
			if($this->idcuenta_corrienteDefaultFK==0) {
				$this->idcuenta_corrienteDefaultFK=$cuenta_corrienteLocal->getId();
			}

			$this->cuenta_corrientesFK[$cuenta_corrienteLocal->getId()]=deposito_cuenta_corriente_util::getcuenta_corrienteDescripcion($cuenta_corrienteLocal);
		}
	}

	public function prepararCombosestado_deposito_retirosFK($estado_deposito_retiros){

		foreach ($estado_deposito_retiros as $estado_deposito_retiroLocal ) {
			if($this->idestado_deposito_retiroDefaultFK==0) {
				$this->idestado_deposito_retiroDefaultFK=$estado_deposito_retiroLocal->getId();
			}

			$this->estado_deposito_retirosFK[$estado_deposito_retiroLocal->getId()]=deposito_cuenta_corriente_util::getestado_deposito_retiroDescripcion($estado_deposito_retiroLocal);
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

			$strDescripcionempresa=deposito_cuenta_corriente_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripcionsucursalFK($idsucursal,$connexion=null){
		$sucursalLogic= new sucursal_logic();
		$sucursalLogic->setConnexion($connexion);
		$sucursalLogic->getsucursalDataAccess()->isForFKData=true;
		$strDescripcionsucursal='';

		if($idsucursal!=null && $idsucursal!='' && $idsucursal!='null') {
			if($connexion!=null) {
				$sucursalLogic->getEntity($idsucursal);//WithConnection
			} else {
				$sucursalLogic->getEntityWithConnection($idsucursal);//
			}

			$strDescripcionsucursal=deposito_cuenta_corriente_util::getsucursalDescripcion($sucursalLogic->getsucursal());

		} else {
			$strDescripcionsucursal='null';
		}

		return $strDescripcionsucursal;
	}

	public function cargarDescripcionejercicioFK($idejercicio,$connexion=null){
		$ejercicioLogic= new ejercicio_logic();
		$ejercicioLogic->setConnexion($connexion);
		$ejercicioLogic->getejercicioDataAccess()->isForFKData=true;
		$strDescripcionejercicio='';

		if($idejercicio!=null && $idejercicio!='' && $idejercicio!='null') {
			if($connexion!=null) {
				$ejercicioLogic->getEntity($idejercicio);//WithConnection
			} else {
				$ejercicioLogic->getEntityWithConnection($idejercicio);//
			}

			$strDescripcionejercicio=deposito_cuenta_corriente_util::getejercicioDescripcion($ejercicioLogic->getejercicio());

		} else {
			$strDescripcionejercicio='null';
		}

		return $strDescripcionejercicio;
	}

	public function cargarDescripcionperiodoFK($idperiodo,$connexion=null){
		$periodoLogic= new periodo_logic();
		$periodoLogic->setConnexion($connexion);
		$periodoLogic->getperiodoDataAccess()->isForFKData=true;
		$strDescripcionperiodo='';

		if($idperiodo!=null && $idperiodo!='' && $idperiodo!='null') {
			if($connexion!=null) {
				$periodoLogic->getEntity($idperiodo);//WithConnection
			} else {
				$periodoLogic->getEntityWithConnection($idperiodo);//
			}

			$strDescripcionperiodo=deposito_cuenta_corriente_util::getperiodoDescripcion($periodoLogic->getperiodo());

		} else {
			$strDescripcionperiodo='null';
		}

		return $strDescripcionperiodo;
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

			$strDescripcionusuario=deposito_cuenta_corriente_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
	}

	public function cargarDescripcioncuenta_corrienteFK($idcuenta_corriente,$connexion=null){
		$cuenta_corrienteLogic= new cuenta_corriente_logic();
		$cuenta_corrienteLogic->setConnexion($connexion);
		$cuenta_corrienteLogic->getcuenta_corrienteDataAccess()->isForFKData=true;
		$strDescripcioncuenta_corriente='';

		if($idcuenta_corriente!=null && $idcuenta_corriente!='' && $idcuenta_corriente!='null') {
			if($connexion!=null) {
				$cuenta_corrienteLogic->getEntity($idcuenta_corriente);//WithConnection
			} else {
				$cuenta_corrienteLogic->getEntityWithConnection($idcuenta_corriente);//
			}

			$strDescripcioncuenta_corriente=deposito_cuenta_corriente_util::getcuenta_corrienteDescripcion($cuenta_corrienteLogic->getcuenta_corriente());

		} else {
			$strDescripcioncuenta_corriente='null';
		}

		return $strDescripcioncuenta_corriente;
	}

	public function cargarDescripcionestado_deposito_retiroFK($idestado_deposito_retiro,$connexion=null){
		$estado_deposito_retiroLogic= new estado_deposito_retiro_logic();
		$estado_deposito_retiroLogic->setConnexion($connexion);
		$estado_deposito_retiroLogic->getestado_deposito_retiroDataAccess()->isForFKData=true;
		$strDescripcionestado_deposito_retiro='';

		if($idestado_deposito_retiro!=null && $idestado_deposito_retiro!='' && $idestado_deposito_retiro!='null') {
			if($connexion!=null) {
				$estado_deposito_retiroLogic->getEntity($idestado_deposito_retiro);//WithConnection
			} else {
				$estado_deposito_retiroLogic->getEntityWithConnection($idestado_deposito_retiro);//
			}

			$strDescripcionestado_deposito_retiro=deposito_cuenta_corriente_util::getestado_deposito_retiroDescripcion($estado_deposito_retiroLogic->getestado_deposito_retiro());

		} else {
			$strDescripcionestado_deposito_retiro='null';
		}

		return $strDescripcionestado_deposito_retiro;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(deposito_cuenta_corriente $deposito_cuenta_corrienteClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$deposito_cuenta_corrienteClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
				$deposito_cuenta_corrienteClase->setid_sucursal($this->parametroGeneralUsuarioActual->getid_sucursal());
				$deposito_cuenta_corrienteClase->setid_ejercicio($this->parametroGeneralUsuarioActual->getid_ejercicio());
				$deposito_cuenta_corrienteClase->setid_periodo($this->parametroGeneralUsuarioActual->getid_periodo());
				$deposito_cuenta_corrienteClase->setid_usuario($this->usuarioActual->getId());
			
			
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

		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionempresa;
	}

	public function setVisibleBusquedasParasucursal($isParasucursal){
		$strParaVisiblesucursal='display:table-row';
		$strParaVisibleNegacionsucursal='display:none';

		if($isParasucursal) {
			$strParaVisiblesucursal='display:table-row';
			$strParaVisibleNegacionsucursal='display:none';
		} else {
			$strParaVisiblesucursal='display:none';
			$strParaVisibleNegacionsucursal='display:table-row';
		}


		$strParaVisibleNegacionsucursal=trim($strParaVisibleNegacionsucursal);

		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idsucursal=$strParaVisiblesucursal;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionsucursal;
	}

	public function setVisibleBusquedasParaejercicio($isParaejercicio){
		$strParaVisibleejercicio='display:table-row';
		$strParaVisibleNegacionejercicio='display:none';

		if($isParaejercicio) {
			$strParaVisibleejercicio='display:table-row';
			$strParaVisibleNegacionejercicio='display:none';
		} else {
			$strParaVisibleejercicio='display:none';
			$strParaVisibleNegacionejercicio='display:table-row';
		}


		$strParaVisibleNegacionejercicio=trim($strParaVisibleNegacionejercicio);

		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idejercicio=$strParaVisibleejercicio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionejercicio;
	}

	public function setVisibleBusquedasParaperiodo($isParaperiodo){
		$strParaVisibleperiodo='display:table-row';
		$strParaVisibleNegacionperiodo='display:none';

		if($isParaperiodo) {
			$strParaVisibleperiodo='display:table-row';
			$strParaVisibleNegacionperiodo='display:none';
		} else {
			$strParaVisibleperiodo='display:none';
			$strParaVisibleNegacionperiodo='display:table-row';
		}


		$strParaVisibleNegacionperiodo=trim($strParaVisibleNegacionperiodo);

		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idperiodo=$strParaVisibleperiodo;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionperiodo;
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

		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idusuario=$strParaVisibleusuario;
	}

	public function setVisibleBusquedasParacuenta_corriente($isParacuenta_corriente){
		$strParaVisiblecuenta_corriente='display:table-row';
		$strParaVisibleNegacioncuenta_corriente='display:none';

		if($isParacuenta_corriente) {
			$strParaVisiblecuenta_corriente='display:table-row';
			$strParaVisibleNegacioncuenta_corriente='display:none';
		} else {
			$strParaVisiblecuenta_corriente='display:none';
			$strParaVisibleNegacioncuenta_corriente='display:table-row';
		}


		$strParaVisibleNegacioncuenta_corriente=trim($strParaVisibleNegacioncuenta_corriente);

		$this->strVisibleFK_Idcuenta_corriente=$strParaVisiblecuenta_corriente;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacioncuenta_corriente;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacioncuenta_corriente;
	}

	public function setVisibleBusquedasParaestado_deposito_retiro($isParaestado_deposito_retiro){
		$strParaVisibleestado_deposito_retiro='display:table-row';
		$strParaVisibleNegacionestado_deposito_retiro='display:none';

		if($isParaestado_deposito_retiro) {
			$strParaVisibleestado_deposito_retiro='display:table-row';
			$strParaVisibleNegacionestado_deposito_retiro='display:none';
		} else {
			$strParaVisibleestado_deposito_retiro='display:none';
			$strParaVisibleNegacionestado_deposito_retiro='display:table-row';
		}


		$strParaVisibleNegacionestado_deposito_retiro=trim($strParaVisibleNegacionestado_deposito_retiro);

		$this->strVisibleFK_Idcuenta_corriente=$strParaVisibleNegacionestado_deposito_retiro;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionestado_deposito_retiro;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionestado_deposito_retiro;
		$this->strVisibleFK_Idestado_deposito_retiro=$strParaVisibleestado_deposito_retiro;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionestado_deposito_retiro;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionestado_deposito_retiro;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionestado_deposito_retiro;
	}
	
	

	public function abrirBusquedaParaempresa() {//$iddeposito_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddeposito_cuenta_corrienteActual=$iddeposito_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.deposito_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.deposito_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliardeposito_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParasucursal() {//$iddeposito_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddeposito_cuenta_corrienteActual=$iddeposito_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sucursal_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.deposito_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sucursal_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.deposito_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sucursal_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliardeposito_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaejercicio() {//$iddeposito_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddeposito_cuenta_corrienteActual=$iddeposito_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ejercicio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.deposito_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ejercicio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.deposito_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ejercicio_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliardeposito_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaperiodo() {//$iddeposito_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddeposito_cuenta_corrienteActual=$iddeposito_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.periodo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.deposito_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',periodo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.deposito_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(periodo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliardeposito_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParausuario() {//$iddeposito_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddeposito_cuenta_corrienteActual=$iddeposito_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.deposito_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.deposito_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliardeposito_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_corriente() {//$iddeposito_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddeposito_cuenta_corrienteActual=$iddeposito_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_corriente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.deposito_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_corriente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_corriente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.deposito_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_corriente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_corriente_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP','iframe',$this->strTipoUsuarioAuxiliardeposito_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaestado_deposito_retiro() {//$iddeposito_cuenta_corrienteActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->iddeposito_cuenta_corrienteActual=$iddeposito_cuenta_corrienteActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.estado_deposito_retiro_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.deposito_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado_deposito_retiro(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',estado_deposito_retiro_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.deposito_cuenta_corrienteJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado_deposito_retiro(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(estado_deposito_retiro_util::$STR_CLASS_NAME,'cuentascorrientes','','POPUP','iframe',$this->strTipoUsuarioAuxiliardeposito_cuenta_corriente,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(deposito_cuenta_corriente_util::$STR_SESSION_NAME,deposito_cuenta_corriente_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$deposito_cuenta_corriente_session=$this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME);
				
		if($deposito_cuenta_corriente_session==null) {
			$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();		
			//$this->Session->write('deposito_cuenta_corriente_session',$deposito_cuenta_corriente_session);							
		}
		*/
		
		$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
    	$deposito_cuenta_corriente_session->strPathNavegacionActual=deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
    	$deposito_cuenta_corriente_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(deposito_cuenta_corriente_util::$STR_SESSION_NAME,serialize($deposito_cuenta_corriente_session));		
	}	
	
	public function getSetBusquedasSesionConfig(deposito_cuenta_corriente_session $deposito_cuenta_corriente_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionFK!=null && $deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionFK==true) {
			if($deposito_cuenta_corriente_session->bigIdActualFK!=null && $deposito_cuenta_corriente_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$deposito_cuenta_corriente_session->bigIdActualFKParaPosibleAtras=$deposito_cuenta_corriente_session->bigIdActualFK;*/
			}
				
			$deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(deposito_cuenta_corriente_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa!=null && $deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($deposito_cuenta_corriente_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(deposito_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(deposito_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($deposito_cuenta_corriente_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($deposito_cuenta_corriente_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$deposito_cuenta_corriente_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($deposito_cuenta_corriente_session->intNumeroPaginacion==deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$deposito_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionsucursal!=null && $deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionsucursal==true)
			{
				if($deposito_cuenta_corriente_session->bigidsucursalActual!=0) {
					$this->strAccionBusqueda='FK_Idsucursal';

					$existe_history=HistoryWeb::ExisteElemento(deposito_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(deposito_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($deposito_cuenta_corriente_session->bigidsucursalActualDescripcion);
						$historyWeb->setIdActual($deposito_cuenta_corriente_session->bigidsucursalActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$deposito_cuenta_corriente_session->bigidsucursalActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionsucursal=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($deposito_cuenta_corriente_session->intNumeroPaginacion==deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$deposito_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionejercicio!=null && $deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionejercicio==true)
			{
				if($deposito_cuenta_corriente_session->bigidejercicioActual!=0) {
					$this->strAccionBusqueda='FK_Idejercicio';

					$existe_history=HistoryWeb::ExisteElemento(deposito_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(deposito_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($deposito_cuenta_corriente_session->bigidejercicioActualDescripcion);
						$historyWeb->setIdActual($deposito_cuenta_corriente_session->bigidejercicioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$deposito_cuenta_corriente_session->bigidejercicioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionejercicio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($deposito_cuenta_corriente_session->intNumeroPaginacion==deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$deposito_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionperiodo!=null && $deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionperiodo==true)
			{
				if($deposito_cuenta_corriente_session->bigidperiodoActual!=0) {
					$this->strAccionBusqueda='FK_Idperiodo';

					$existe_history=HistoryWeb::ExisteElemento(deposito_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(deposito_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($deposito_cuenta_corriente_session->bigidperiodoActualDescripcion);
						$historyWeb->setIdActual($deposito_cuenta_corriente_session->bigidperiodoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$deposito_cuenta_corriente_session->bigidperiodoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionperiodo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($deposito_cuenta_corriente_session->intNumeroPaginacion==deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$deposito_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario!=null && $deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($deposito_cuenta_corriente_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(deposito_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(deposito_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($deposito_cuenta_corriente_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($deposito_cuenta_corriente_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$deposito_cuenta_corriente_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($deposito_cuenta_corriente_session->intNumeroPaginacion==deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$deposito_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta_corriente!=null && $deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta_corriente==true)
			{
				if($deposito_cuenta_corriente_session->bigidcuenta_corrienteActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_corriente';

					$existe_history=HistoryWeb::ExisteElemento(deposito_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(deposito_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($deposito_cuenta_corriente_session->bigidcuenta_corrienteActualDescripcion);
						$historyWeb->setIdActual($deposito_cuenta_corriente_session->bigidcuenta_corrienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$deposito_cuenta_corriente_session->bigidcuenta_corrienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesioncuenta_corriente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($deposito_cuenta_corriente_session->intNumeroPaginacion==deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$deposito_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			else if($deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_deposito_retiro!=null && $deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_deposito_retiro==true)
			{
				if($deposito_cuenta_corriente_session->bigidestado_deposito_retiroActual!=0) {
					$this->strAccionBusqueda='FK_Idestado_deposito_retiro';

					$existe_history=HistoryWeb::ExisteElemento(deposito_cuenta_corriente_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(deposito_cuenta_corriente_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($deposito_cuenta_corriente_session->bigidestado_deposito_retiroActualDescripcion);
						$historyWeb->setIdActual($deposito_cuenta_corriente_session->bigidestado_deposito_retiroActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=deposito_cuenta_corriente_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$deposito_cuenta_corriente_session->bigidestado_deposito_retiroActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$deposito_cuenta_corriente_session->bitBusquedaDesdeFKSesionestado_deposito_retiro=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;

				if($deposito_cuenta_corriente_session->intNumeroPaginacion==deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=deposito_cuenta_corriente_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$deposito_cuenta_corriente_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$deposito_cuenta_corriente_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));
		
		if($deposito_cuenta_corriente_session==null) {
			$deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
		}
		
		$deposito_cuenta_corriente_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$deposito_cuenta_corriente_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$deposito_cuenta_corriente_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcuenta_corriente') {
			$deposito_cuenta_corriente_session->id_cuenta_corriente=$this->id_cuenta_corrienteFK_Idcuenta_corriente;	

		}
		else if($this->strAccionBusqueda=='FK_Idejercicio') {
			$deposito_cuenta_corriente_session->id_ejercicio=$this->id_ejercicioFK_Idejercicio;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$deposito_cuenta_corriente_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idestado_deposito_retiro') {
			$deposito_cuenta_corriente_session->id_estado_deposito_retiro=$this->id_estado_deposito_retiroFK_Idestado_deposito_retiro;	

		}
		else if($this->strAccionBusqueda=='FK_Idperiodo') {
			$deposito_cuenta_corriente_session->id_periodo=$this->id_periodoFK_Idperiodo;	

		}
		else if($this->strAccionBusqueda=='FK_Idsucursal') {
			$deposito_cuenta_corriente_session->id_sucursal=$this->id_sucursalFK_Idsucursal;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$deposito_cuenta_corriente_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		
		$this->Session->write(deposito_cuenta_corriente_util::$STR_SESSION_NAME,serialize($deposito_cuenta_corriente_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(deposito_cuenta_corriente_session $deposito_cuenta_corriente_session) {
		
		if($deposito_cuenta_corriente_session==null) {
			$deposito_cuenta_corriente_session=unserialize($this->Session->read(deposito_cuenta_corriente_util::$STR_SESSION_NAME));
		}
		
		if($deposito_cuenta_corriente_session==null) {
		   $deposito_cuenta_corriente_session=new deposito_cuenta_corriente_session();
		}
		
		if($deposito_cuenta_corriente_session->strUltimaBusqueda!=null && $deposito_cuenta_corriente_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$deposito_cuenta_corriente_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$deposito_cuenta_corriente_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$deposito_cuenta_corriente_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcuenta_corriente') {
				$this->id_cuenta_corrienteFK_Idcuenta_corriente=$deposito_cuenta_corriente_session->id_cuenta_corriente;
				$deposito_cuenta_corriente_session->id_cuenta_corriente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idejercicio') {
				$this->id_ejercicioFK_Idejercicio=$deposito_cuenta_corriente_session->id_ejercicio;
				$deposito_cuenta_corriente_session->id_ejercicio=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$deposito_cuenta_corriente_session->id_empresa;
				$deposito_cuenta_corriente_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idestado_deposito_retiro') {
				$this->id_estado_deposito_retiroFK_Idestado_deposito_retiro=$deposito_cuenta_corriente_session->id_estado_deposito_retiro;
				$deposito_cuenta_corriente_session->id_estado_deposito_retiro=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idperiodo') {
				$this->id_periodoFK_Idperiodo=$deposito_cuenta_corriente_session->id_periodo;
				$deposito_cuenta_corriente_session->id_periodo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idsucursal') {
				$this->id_sucursalFK_Idsucursal=$deposito_cuenta_corriente_session->id_sucursal;
				$deposito_cuenta_corriente_session->id_sucursal=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$deposito_cuenta_corriente_session->id_usuario;
				$deposito_cuenta_corriente_session->id_usuario=-1;

			}
		}
		
		$deposito_cuenta_corriente_session->strUltimaBusqueda='';
		//$deposito_cuenta_corriente_session->intNumeroPaginacion=10;
		$deposito_cuenta_corriente_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(deposito_cuenta_corriente_util::$STR_SESSION_NAME,serialize($deposito_cuenta_corriente_session));		
	}
	
	public function deposito_cuenta_corrientesControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idsucursalDefaultFK = 0;
		$this->idejercicioDefaultFK = 0;
		$this->idperiodoDefaultFK = 0;
		$this->idusuarioDefaultFK = 0;
		$this->idcuenta_corrienteDefaultFK = 0;
		$this->idestado_deposito_retiroDefaultFK = 0;
	}
	
	public function setdeposito_cuenta_corrienteFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_sucursal',$this->idsucursalDefaultFK);
		$this->setExistDataCampoForm('form','id_ejercicio',$this->idejercicioDefaultFK);
		$this->setExistDataCampoForm('form','id_periodo',$this->idperiodoDefaultFK);
		$this->setExistDataCampoForm('form','id_usuario',$this->idusuarioDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_corriente',$this->idcuenta_corrienteDefaultFK);
		$this->setExistDataCampoForm('form','id_estado_deposito_retiro',$this->idestado_deposito_retiroDefaultFK);
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

		sucursal::$class;
		sucursal_carga::$CONTROLLER;

		ejercicio::$class;
		ejercicio_carga::$CONTROLLER;

		periodo::$class;
		periodo_carga::$CONTROLLER;

		usuario::$class;
		usuario_carga::$CONTROLLER;

		cuenta_corriente::$class;
		cuenta_corriente_carga::$CONTROLLER;

		estado_deposito_retiro::$class;
		estado_deposito_retiro_carga::$CONTROLLER;
		
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
		interface deposito_cuenta_corriente_controlI {	
		
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
		
		public function onLoad(deposito_cuenta_corriente_session $deposito_cuenta_corriente_session=null);	
		function index(?string $strTypeOnLoaddeposito_cuenta_corriente='',?string $strTipoPaginaAuxiliardeposito_cuenta_corriente='',?string $strTipoUsuarioAuxiliardeposito_cuenta_corriente='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoaddeposito_cuenta_corriente='',string $strTipoPaginaAuxiliardeposito_cuenta_corriente='',string $strTipoUsuarioAuxiliardeposito_cuenta_corriente='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($deposito_cuenta_corrienteReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(deposito_cuenta_corriente $deposito_cuenta_corrienteClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(deposito_cuenta_corriente_session $deposito_cuenta_corriente_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(deposito_cuenta_corriente_session $deposito_cuenta_corriente_session);	
		public function deposito_cuenta_corrientesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setdeposito_cuenta_corrienteFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
