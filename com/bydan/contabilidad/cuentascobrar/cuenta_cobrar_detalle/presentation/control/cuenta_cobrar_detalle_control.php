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

namespace com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\business\entity\cuenta_cobrar_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/cuenta_cobrar_detalle/util/cuenta_cobrar_detalle_carga.php');
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\util\cuenta_cobrar_detalle_carga;

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\util\cuenta_cobrar_detalle_util;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\util\cuenta_cobrar_detalle_param_return;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\business\logic\cuenta_cobrar_detalle_logic;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\presentation\session\cuenta_cobrar_detalle_session;


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

use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\entity\cuenta_cobrar;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\business\logic\cuenta_cobrar_logic;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_carga;
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar\util\cuenta_cobrar_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_cobrar_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_cobrar_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_cobrar_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_cobrar_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_cobrar_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentascobrar/cuenta_cobrar_detalle/presentation/control/cuenta_cobrar_detalle_init_control.php');
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\presentation\control\cuenta_cobrar_detalle_init_control;

include_once('com/bydan/contabilidad/cuentascobrar/cuenta_cobrar_detalle/presentation/control/cuenta_cobrar_detalle_base_control.php');
use com\bydan\contabilidad\cuentascobrar\cuenta_cobrar_detalle\presentation\control\cuenta_cobrar_detalle_base_control;

class cuenta_cobrar_detalle_control extends cuenta_cobrar_detalle_base_control {	
	
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
			
			
			else if($action=="FK_Idcuenta_cobrar"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcuenta_cobrarParaProcesar();
			}
			else if($action=="FK_Idejercicio"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdejercicioParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idestado"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdestadoParaProcesar();
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
				//$idcuenta_cobrar_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idcuenta_cobrar_detalleActual
			}
			else if($action=='abrirBusquedaParasucursal') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_cobrar_detalleActual=$this->getDataId();
				$this->abrirBusquedaParasucursal();//$idcuenta_cobrar_detalleActual
			}
			else if($action=='abrirBusquedaParaejercicio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_cobrar_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaejercicio();//$idcuenta_cobrar_detalleActual
			}
			else if($action=='abrirBusquedaParaperiodo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_cobrar_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaperiodo();//$idcuenta_cobrar_detalleActual
			}
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_cobrar_detalleActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$idcuenta_cobrar_detalleActual
			}
			else if($action=='abrirBusquedaParacuenta_cobrar') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_cobrar_detalleActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_cobrar();//$idcuenta_cobrar_detalleActual
			}
			else if($action=='abrirBusquedaParaestado') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcuenta_cobrar_detalleActual=$this->getDataId();
				$this->abrirBusquedaParaestado();//$idcuenta_cobrar_detalleActual
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
					
					$cuenta_cobrar_detalleController = new cuenta_cobrar_detalle_control();
					
					$cuenta_cobrar_detalleController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($cuenta_cobrar_detalleController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$cuenta_cobrar_detalleController = new cuenta_cobrar_detalle_control();
						$cuenta_cobrar_detalleController = $this;
						
						$jsonResponse = json_encode($cuenta_cobrar_detalleController->cuenta_cobrar_detalles);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->cuenta_cobrar_detalleReturnGeneral==null) {
					$this->cuenta_cobrar_detalleReturnGeneral=new cuenta_cobrar_detalle_param_return();
				}
				
				echo($this->cuenta_cobrar_detalleReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$cuenta_cobrar_detalleController=new cuenta_cobrar_detalle_control();
		
		$cuenta_cobrar_detalleController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$cuenta_cobrar_detalleController->usuarioActual=new usuario();
		
		$cuenta_cobrar_detalleController->usuarioActual->setId($this->usuarioActual->getId());
		$cuenta_cobrar_detalleController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$cuenta_cobrar_detalleController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$cuenta_cobrar_detalleController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$cuenta_cobrar_detalleController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$cuenta_cobrar_detalleController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$cuenta_cobrar_detalleController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$cuenta_cobrar_detalleController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $cuenta_cobrar_detalleController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadcuenta_cobrar_detalle= $this->getDataGeneralString('strTypeOnLoadcuenta_cobrar_detalle');
		$strTipoPaginaAuxiliarcuenta_cobrar_detalle= $this->getDataGeneralString('strTipoPaginaAuxiliarcuenta_cobrar_detalle');
		$strTipoUsuarioAuxiliarcuenta_cobrar_detalle= $this->getDataGeneralString('strTipoUsuarioAuxiliarcuenta_cobrar_detalle');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadcuenta_cobrar_detalle,$strTipoPaginaAuxiliarcuenta_cobrar_detalle,$strTipoUsuarioAuxiliarcuenta_cobrar_detalle,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadcuenta_cobrar_detalle!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('cuenta_cobrar_detalle','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_cobrar_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcuenta_cobrar_detalle,$this->strTipoUsuarioAuxiliarcuenta_cobrar_detalle,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_cobrar_detalle_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentascobrar','','POPUP',$this->strTipoPaginaAuxiliarcuenta_cobrar_detalle,$this->strTipoUsuarioAuxiliarcuenta_cobrar_detalle,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->cuenta_cobrar_detalleReturnGeneral=new cuenta_cobrar_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_cobrar_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_cobrar_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_cobrar_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_cobrar_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_cobrar_detalleReturnGeneral);
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
		$this->cuenta_cobrar_detalleReturnGeneral=new cuenta_cobrar_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_cobrar_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_cobrar_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_cobrar_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_cobrar_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_cobrar_detalleReturnGeneral);
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
		$this->cuenta_cobrar_detalleReturnGeneral=new cuenta_cobrar_detalle_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cuenta_cobrar_detalleReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cuenta_cobrar_detalleReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cuenta_cobrar_detalleReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cuenta_cobrar_detalleReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cuenta_cobrar_detalleReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
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
			
			
			$this->cuenta_cobrar_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->cuenta_cobrar_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_cobrar_detalleReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->cuenta_cobrar_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->cuenta_cobrar_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_cobrar_detalleReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->cuenta_cobrar_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->cuenta_cobrar_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->cuenta_cobrar_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_cobrar_detalleReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->cuenta_cobrar_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_cobrar_detalleReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->cuenta_cobrar_detalleReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->cuenta_cobrar_detalleReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->cuenta_cobrar_detalleReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cuenta_cobrar_detalleReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->cuenta_cobrar_detalleReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cuenta_cobrar_detalleReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
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
		
		$this->cuenta_cobrar_detalleLogic=new cuenta_cobrar_detalle_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->cuenta_cobrar_detalle=new cuenta_cobrar_detalle();
		
		$this->strTypeOnLoadcuenta_cobrar_detalle='onload';
		$this->strTipoPaginaAuxiliarcuenta_cobrar_detalle='none';
		$this->strTipoUsuarioAuxiliarcuenta_cobrar_detalle='none';	

		$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
		
		$this->cuenta_cobrar_detalleModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cuenta_cobrar_detalleControllerAdditional=new cuenta_cobrar_detalle_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(cuenta_cobrar_detalle_session $cuenta_cobrar_detalle_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($cuenta_cobrar_detalle_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadcuenta_cobrar_detalle='',?string $strTipoPaginaAuxiliarcuenta_cobrar_detalle='',?string $strTipoUsuarioAuxiliarcuenta_cobrar_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadcuenta_cobrar_detalle=$strTypeOnLoadcuenta_cobrar_detalle;
			$this->strTipoPaginaAuxiliarcuenta_cobrar_detalle=$strTipoPaginaAuxiliarcuenta_cobrar_detalle;
			$this->strTipoUsuarioAuxiliarcuenta_cobrar_detalle=$strTipoUsuarioAuxiliarcuenta_cobrar_detalle;
	
			if($strTipoUsuarioAuxiliarcuenta_cobrar_detalle=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->cuenta_cobrar_detalle=new cuenta_cobrar_detalle();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Detalle Cuenta Cobrars';
			
			
			$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));
							
			if($cuenta_cobrar_detalle_session==null) {
				$cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();
				
				/*$this->Session->write('cuenta_cobrar_detalle_session',$cuenta_cobrar_detalle_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($cuenta_cobrar_detalle_session->strFuncionJsPadre!=null && $cuenta_cobrar_detalle_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$cuenta_cobrar_detalle_session->strFuncionJsPadre;
				
				$cuenta_cobrar_detalle_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($cuenta_cobrar_detalle_session);
			
			if($strTypeOnLoadcuenta_cobrar_detalle!=null && $strTypeOnLoadcuenta_cobrar_detalle=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$cuenta_cobrar_detalle_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$cuenta_cobrar_detalle_session->setPaginaPopupVariables(true);
				}
				
				if($cuenta_cobrar_detalle_session->intNumeroPaginacion==cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_detalle_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,cuenta_cobrar_detalle_util::$STR_SESSION_NAME,'cuentascobrar');																
			
			} else if($strTypeOnLoadcuenta_cobrar_detalle!=null && $strTypeOnLoadcuenta_cobrar_detalle=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$cuenta_cobrar_detalle_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;*/
				
				if($cuenta_cobrar_detalle_session->intNumeroPaginacion==cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_detalle_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarcuenta_cobrar_detalle!=null && $strTipoPaginaAuxiliarcuenta_cobrar_detalle=='none') {
				/*$cuenta_cobrar_detalle_session->strStyleDivHeader='display:table-row';*/
				
				/*$cuenta_cobrar_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarcuenta_cobrar_detalle!=null && $strTipoPaginaAuxiliarcuenta_cobrar_detalle=='iframe') {
					/*
					$cuenta_cobrar_detalle_session->strStyleDivArbol='display:none';
					$cuenta_cobrar_detalle_session->strStyleDivHeader='display:none';
					$cuenta_cobrar_detalle_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$cuenta_cobrar_detalle_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->cuenta_cobrar_detalleClase=new cuenta_cobrar_detalle();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=cuenta_cobrar_detalle_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(cuenta_cobrar_detalle_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->cuenta_cobrar_detalleLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->cuenta_cobrar_detalleLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->cuenta_cobrar_detalleLogic=new cuenta_cobrar_detalle_logic();*/
			
			
			$this->cuenta_cobrar_detallesModel=null;
			/*new ListDataModel();*/
			
			/*$this->cuenta_cobrar_detallesModel.setWrappedData(cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles());*/
						
			$this->cuenta_cobrar_detalles= array();
			$this->cuenta_cobrar_detallesEliminados=array();
			$this->cuenta_cobrar_detallesSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= cuenta_cobrar_detalle_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->cuenta_cobrar_detalle= new cuenta_cobrar_detalle();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcuenta_cobrar='display:table-row';
			$this->strVisibleFK_Idejercicio='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idestado='display:table-row';
			$this->strVisibleFK_Idperiodo='display:table-row';
			$this->strVisibleFK_Idsucursal='display:table-row';
			$this->strVisibleFK_Idusuario='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarcuenta_cobrar_detalle!=null && $strTipoUsuarioAuxiliarcuenta_cobrar_detalle!='none' && $strTipoUsuarioAuxiliarcuenta_cobrar_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcuenta_cobrar_detalle);
																
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
				if($strTipoUsuarioAuxiliarcuenta_cobrar_detalle!=null && $strTipoUsuarioAuxiliarcuenta_cobrar_detalle!='none' && $strTipoUsuarioAuxiliarcuenta_cobrar_detalle!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcuenta_cobrar_detalle);
																
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
				if($strTipoUsuarioAuxiliarcuenta_cobrar_detalle==null || $strTipoUsuarioAuxiliarcuenta_cobrar_detalle=='none' || $strTipoUsuarioAuxiliarcuenta_cobrar_detalle=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarcuenta_cobrar_detalle,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_cobrar_detalle_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cuenta_cobrar_detalle_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina cuenta_cobrar_detalle');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($cuenta_cobrar_detalle_session);
			
			$this->getSetBusquedasSesionConfig($cuenta_cobrar_detalle_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportecuenta_cobrar_detalles($this->strAccionBusqueda,$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles());*/
				} else if($this->strGenerarReporte=='Html')	{
					$cuenta_cobrar_detalle_session->strServletGenerarHtmlReporte='cuenta_cobrar_detalleServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(cuenta_cobrar_detalle_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($cuenta_cobrar_detalle_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarcuenta_cobrar_detalle!=null && $strTipoUsuarioAuxiliarcuenta_cobrar_detalle=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($cuenta_cobrar_detalle_session);
			}
								
			$this->set(cuenta_cobrar_detalle_util::$STR_SESSION_NAME, $cuenta_cobrar_detalle_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($cuenta_cobrar_detalle_session);
			
			/*
			$this->cuenta_cobrar_detalle->recursive = 0;
			
			$this->cuenta_cobrar_detalles=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('cuenta_cobrar_detalles', $this->cuenta_cobrar_detalles);
			
			$this->set(cuenta_cobrar_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->cuenta_cobrar_detalleActual =$this->cuenta_cobrar_detalleClase;
			
			/*$this->cuenta_cobrar_detalleActual =$this->migrarModelcuenta_cobrar_detalle($this->cuenta_cobrar_detalleClase);*/
			
			$this->returnHtml(false);
			
			$this->set(cuenta_cobrar_detalle_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=cuenta_cobrar_detalle_util::$STR_NOMBRE_OPCION;
				
			if(cuenta_cobrar_detalle_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=cuenta_cobrar_detalle_util::$STR_MODULO_OPCION.cuenta_cobrar_detalle_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(cuenta_cobrar_detalle_util::$STR_SESSION_NAME,serialize($cuenta_cobrar_detalle_session));
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
			/*$cuenta_cobrar_detalleClase= (cuenta_cobrar_detalle) cuenta_cobrar_detallesModel.getRowData();*/
			
			$this->cuenta_cobrar_detalleClase->setId($this->cuenta_cobrar_detalle->getId());	
			$this->cuenta_cobrar_detalleClase->setVersionRow($this->cuenta_cobrar_detalle->getVersionRow());	
			$this->cuenta_cobrar_detalleClase->setVersionRow($this->cuenta_cobrar_detalle->getVersionRow());	
			$this->cuenta_cobrar_detalleClase->setid_empresa($this->cuenta_cobrar_detalle->getid_empresa());	
			$this->cuenta_cobrar_detalleClase->setid_sucursal($this->cuenta_cobrar_detalle->getid_sucursal());	
			$this->cuenta_cobrar_detalleClase->setid_ejercicio($this->cuenta_cobrar_detalle->getid_ejercicio());	
			$this->cuenta_cobrar_detalleClase->setid_periodo($this->cuenta_cobrar_detalle->getid_periodo());	
			$this->cuenta_cobrar_detalleClase->setid_usuario($this->cuenta_cobrar_detalle->getid_usuario());	
			$this->cuenta_cobrar_detalleClase->setid_cuenta_cobrar($this->cuenta_cobrar_detalle->getid_cuenta_cobrar());	
			$this->cuenta_cobrar_detalleClase->setnumero($this->cuenta_cobrar_detalle->getnumero());	
			$this->cuenta_cobrar_detalleClase->setfecha_emision($this->cuenta_cobrar_detalle->getfecha_emision());	
			$this->cuenta_cobrar_detalleClase->setfecha_vence($this->cuenta_cobrar_detalle->getfecha_vence());	
			$this->cuenta_cobrar_detalleClase->setreferencia($this->cuenta_cobrar_detalle->getreferencia());	
			$this->cuenta_cobrar_detalleClase->setmonto($this->cuenta_cobrar_detalle->getmonto());	
			$this->cuenta_cobrar_detalleClase->setdebito($this->cuenta_cobrar_detalle->getdebito());	
			$this->cuenta_cobrar_detalleClase->setcredito($this->cuenta_cobrar_detalle->getcredito());	
			$this->cuenta_cobrar_detalleClase->setdescripcion($this->cuenta_cobrar_detalle->getdescripcion());	
			$this->cuenta_cobrar_detalleClase->setid_estado($this->cuenta_cobrar_detalle->getid_estado());	
		
			/*$this->Session->write('cuenta_cobrar_detalleVersionRowActual', cuenta_cobrar_detalle.getVersionRow());*/
			
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
			
			$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));
						
			if($cuenta_cobrar_detalle_session==null) {
				$cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('cuenta_cobrar_detalle', $this->cuenta_cobrar_detalle->read(null, $id));
	
			
			$this->cuenta_cobrar_detalle->recursive = 0;
			
			$this->cuenta_cobrar_detalles=$this->paginate();
			
			$this->set('cuenta_cobrar_detalles', $this->cuenta_cobrar_detalles);
	
			if (empty($this->data)) {
				$this->data = $this->cuenta_cobrar_detalle->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->cuenta_cobrar_detalleLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cuenta_cobrar_detalleClase);
			
			$this->cuenta_cobrar_detalleActual=$this->cuenta_cobrar_detalleClase;
			
			/*$this->cuenta_cobrar_detalleActual =$this->migrarModelcuenta_cobrar_detalle($this->cuenta_cobrar_detalleClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles(),$this->cuenta_cobrar_detalleActual);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_cobrar_detalleReturnGeneral);
			
			//$this->cuenta_cobrar_detalleReturnGeneral=$this->cuenta_cobrar_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles(),$this->cuenta_cobrar_detalleActual,$this->cuenta_cobrar_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));
						
			if($cuenta_cobrar_detalle_session==null) {
				$cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevocuenta_cobrar_detalle', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->cuenta_cobrar_detalleClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cuenta_cobrar_detalleClase);
			
			$this->cuenta_cobrar_detalleActual =$this->cuenta_cobrar_detalleClase;
			
			/*$this->cuenta_cobrar_detalleActual =$this->migrarModelcuenta_cobrar_detalle($this->cuenta_cobrar_detalleClase);*/
			
			$this->setcuenta_cobrar_detalleFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles(),$this->cuenta_cobrar_detalle);
			
			$this->actualizarControllerConReturnGeneral($this->cuenta_cobrar_detalleReturnGeneral);
			
			//this->cuenta_cobrar_detalleReturnGeneral=$this->cuenta_cobrar_detalleLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles(),$this->cuenta_cobrar_detalle,$this->cuenta_cobrar_detalleParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->cuenta_cobrar_detalleReturnGeneral->getcuenta_cobrar_detalle()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idsucursalDefaultFK!=null && $this->idsucursalDefaultFK > -1) {
				$this->cuenta_cobrar_detalleReturnGeneral->getcuenta_cobrar_detalle()->setid_sucursal($this->idsucursalDefaultFK);
			}

			if($this->idejercicioDefaultFK!=null && $this->idejercicioDefaultFK > -1) {
				$this->cuenta_cobrar_detalleReturnGeneral->getcuenta_cobrar_detalle()->setid_ejercicio($this->idejercicioDefaultFK);
			}

			if($this->idperiodoDefaultFK!=null && $this->idperiodoDefaultFK > -1) {
				$this->cuenta_cobrar_detalleReturnGeneral->getcuenta_cobrar_detalle()->setid_periodo($this->idperiodoDefaultFK);
			}

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->cuenta_cobrar_detalleReturnGeneral->getcuenta_cobrar_detalle()->setid_usuario($this->idusuarioDefaultFK);
			}

			if($this->idcuenta_cobrarDefaultFK!=null && $this->idcuenta_cobrarDefaultFK > -1) {
				$this->cuenta_cobrar_detalleReturnGeneral->getcuenta_cobrar_detalle()->setid_cuenta_cobrar($this->idcuenta_cobrarDefaultFK);
			}

			if($this->idestadoDefaultFK!=null && $this->idestadoDefaultFK > -1) {
				$this->cuenta_cobrar_detalleReturnGeneral->getcuenta_cobrar_detalle()->setid_estado($this->idestadoDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->cuenta_cobrar_detalleReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->cuenta_cobrar_detalleReturnGeneral->getcuenta_cobrar_detalle(),$this->cuenta_cobrar_detalleActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeycuenta_cobrar_detalle($this->cuenta_cobrar_detalleReturnGeneral->getcuenta_cobrar_detalle());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariocuenta_cobrar_detalle($this->cuenta_cobrar_detalleReturnGeneral->getcuenta_cobrar_detalle());*/
			}
			
			if($this->cuenta_cobrar_detalleReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cuenta_cobrar_detalleReturnGeneral->getcuenta_cobrar_detalle(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualcuenta_cobrar_detalle($this->cuenta_cobrar_detalle,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->cuenta_cobrar_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_cobrar_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->cuenta_cobrar_detallesAuxiliar=array();
			}
			
			if(count($this->cuenta_cobrar_detallesAuxiliar)==2) {
				$cuenta_cobrar_detalleOrigen=$this->cuenta_cobrar_detallesAuxiliar[0];
				$cuenta_cobrar_detalleDestino=$this->cuenta_cobrar_detallesAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($cuenta_cobrar_detalleOrigen,$cuenta_cobrar_detalleDestino,true,false,false);
				
				$this->actualizarLista($cuenta_cobrar_detalleDestino,$this->cuenta_cobrar_detalles);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->cuenta_cobrar_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_cobrar_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cuenta_cobrar_detallesAuxiliar=array();
			}
			
			if(count($this->cuenta_cobrar_detallesAuxiliar) > 0) {
				foreach ($this->cuenta_cobrar_detallesAuxiliar as $cuenta_cobrar_detalleSeleccionado) {
					$this->cuenta_cobrar_detalle=new cuenta_cobrar_detalle();
					
					$this->setCopiarVariablesObjetos($cuenta_cobrar_detalleSeleccionado,$this->cuenta_cobrar_detalle,true,true,false);
						
					$this->cuenta_cobrar_detalles[]=$this->cuenta_cobrar_detalle;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->cuenta_cobrar_detallesEliminados as $cuenta_cobrar_detalleEliminado) {
				$this->cuenta_cobrar_detalleLogic->cuenta_cobrar_detalles[]=$cuenta_cobrar_detalleEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->cuenta_cobrar_detalle=new cuenta_cobrar_detalle();
							
				$this->cuenta_cobrar_detalles[]=$this->cuenta_cobrar_detalle;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
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
		
		$cuenta_cobrar_detalleActual=new cuenta_cobrar_detalle();
		
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
				
				$cuenta_cobrar_detalleActual=$this->cuenta_cobrar_detalles[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cuenta_cobrar_detalleActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cuenta_cobrar_detalleActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cuenta_cobrar_detalleActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cuenta_cobrar_detalleActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cuenta_cobrar_detalleActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cuenta_cobrar_detalleActual->setid_cuenta_cobrar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cuenta_cobrar_detalleActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cuenta_cobrar_detalleActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cuenta_cobrar_detalleActual->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cuenta_cobrar_detalleActual->setreferencia($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cuenta_cobrar_detalleActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $cuenta_cobrar_detalleActual->setdebito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $cuenta_cobrar_detalleActual->setcredito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $cuenta_cobrar_detalleActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $cuenta_cobrar_detalleActual->setid_estado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
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
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadcuenta_cobrar_detalle='',string $strTipoPaginaAuxiliarcuenta_cobrar_detalle='',string $strTipoUsuarioAuxiliarcuenta_cobrar_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadcuenta_cobrar_detalle,$strTipoPaginaAuxiliarcuenta_cobrar_detalle,$strTipoUsuarioAuxiliarcuenta_cobrar_detalle,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->cuenta_cobrar_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=cuenta_cobrar_detalle_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=cuenta_cobrar_detalle_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=cuenta_cobrar_detalle_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));
						
			if($cuenta_cobrar_detalle_session==null) {
				$cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();
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
					/*$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;*/
					
					if($cuenta_cobrar_detalle_session->intNumeroPaginacion==cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$cuenta_cobrar_detalle_session->intNumeroPaginacion;
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
			
			$this->cuenta_cobrar_detallesEliminados=array();
			
			/*$this->cuenta_cobrar_detalleLogic->setConnexion($connexion);*/
			
			$this->cuenta_cobrar_detalleLogic->setIsConDeep(true);
			
			$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalleDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cuenta_cobrar');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
			
			$this->cuenta_cobrar_detalleLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_cobrar_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles()==null|| count($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cuenta_cobrar_detalles=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_cobrar_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->cuenta_cobrar_detallesReporte=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();
									
						/*$this->generarReportes('Todos',$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles());*/
					
						$this->cuenta_cobrar_detalleLogic->setcuenta_cobrar_detalles($this->cuenta_cobrar_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_cobrar_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles()==null|| count($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cuenta_cobrar_detalles=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cuenta_cobrar_detalleLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->cuenta_cobrar_detallesReporte=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();
									
						/*$this->generarReportes('Todos',$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles());*/
					
						$this->cuenta_cobrar_detalleLogic->setcuenta_cobrar_detalles($this->cuenta_cobrar_detalles);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idcuenta_cobrar_detalle=0;*/
				
				if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
					if($cuenta_cobrar_detalle_session->bigIdActualFK!=null && $cuenta_cobrar_detalle_session->bigIdActualFK!=0)	{
						$this->idcuenta_cobrar_detalle=$cuenta_cobrar_detalle_session->bigIdActualFK;	
					}
					
					$cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionFK=false;
					
					$cuenta_cobrar_detalle_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idcuenta_cobrar_detalle=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idcuenta_cobrar_detalle=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cuenta_cobrar_detalleLogic->getEntity($this->idcuenta_cobrar_detalle);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*cuenta_cobrar_detalleLogicAdditional::getDetalleIndicePorId($idcuenta_cobrar_detalle);*/

				
				if($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalle()!=null) {
					$this->cuenta_cobrar_detalleLogic->setcuenta_cobrar_detalles(array());
					$this->cuenta_cobrar_detalleLogic->cuenta_cobrar_detalles[]=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalle();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcuenta_cobrar')
			{

				if($cuenta_cobrar_detalle_session->bigidcuenta_cobrarActual!=null && $cuenta_cobrar_detalle_session->bigidcuenta_cobrarActual!=0)
				{
					$this->id_cuenta_cobrarFK_Idcuenta_cobrar=$cuenta_cobrar_detalle_session->bigidcuenta_cobrarActual;
					$cuenta_cobrar_detalle_session->bigidcuenta_cobrarActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrar_detalleLogic->getsFK_Idcuenta_cobrar($finalQueryPaginacion,$this->pagination,$this->id_cuenta_cobrarFK_Idcuenta_cobrar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_cobrar_detalleLogicAdditional::getDetalleIndiceFK_Idcuenta_cobrar($this->id_cuenta_cobrarFK_Idcuenta_cobrar);


					if($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles()==null || count($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_cobrar_detalles=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrar_detalleLogic->getsFK_Idcuenta_cobrar('',$this->pagination,$this->id_cuenta_cobrarFK_Idcuenta_cobrar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_cobrar_detallesReporte=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_cobrar_detalles("FK_Idcuenta_cobrar",$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_cobrar_detalleLogic->setcuenta_cobrar_detalles($cuenta_cobrar_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idejercicio')
			{

				if($cuenta_cobrar_detalle_session->bigidejercicioActual!=null && $cuenta_cobrar_detalle_session->bigidejercicioActual!=0)
				{
					$this->id_ejercicioFK_Idejercicio=$cuenta_cobrar_detalle_session->bigidejercicioActual;
					$cuenta_cobrar_detalle_session->bigidejercicioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrar_detalleLogic->getsFK_Idejercicio($finalQueryPaginacion,$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_cobrar_detalleLogicAdditional::getDetalleIndiceFK_Idejercicio($this->id_ejercicioFK_Idejercicio);


					if($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles()==null || count($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_cobrar_detalles=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrar_detalleLogic->getsFK_Idejercicio('',$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_cobrar_detallesReporte=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_cobrar_detalles("FK_Idejercicio",$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_cobrar_detalleLogic->setcuenta_cobrar_detalles($cuenta_cobrar_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($cuenta_cobrar_detalle_session->bigidempresaActual!=null && $cuenta_cobrar_detalle_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$cuenta_cobrar_detalle_session->bigidempresaActual;
					$cuenta_cobrar_detalle_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrar_detalleLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_cobrar_detalleLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles()==null || count($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_cobrar_detalles=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrar_detalleLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_cobrar_detallesReporte=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_cobrar_detalles("FK_Idempresa",$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_cobrar_detalleLogic->setcuenta_cobrar_detalles($cuenta_cobrar_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idestado')
			{

				if($cuenta_cobrar_detalle_session->bigidestadoActual!=null && $cuenta_cobrar_detalle_session->bigidestadoActual!=0)
				{
					$this->id_estadoFK_Idestado=$cuenta_cobrar_detalle_session->bigidestadoActual;
					$cuenta_cobrar_detalle_session->bigidestadoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrar_detalleLogic->getsFK_Idestado($finalQueryPaginacion,$this->pagination,$this->id_estadoFK_Idestado);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_cobrar_detalleLogicAdditional::getDetalleIndiceFK_Idestado($this->id_estadoFK_Idestado);


					if($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles()==null || count($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_cobrar_detalles=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrar_detalleLogic->getsFK_Idestado('',$this->pagination,$this->id_estadoFK_Idestado);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_cobrar_detallesReporte=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_cobrar_detalles("FK_Idestado",$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_cobrar_detalleLogic->setcuenta_cobrar_detalles($cuenta_cobrar_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperiodo')
			{

				if($cuenta_cobrar_detalle_session->bigidperiodoActual!=null && $cuenta_cobrar_detalle_session->bigidperiodoActual!=0)
				{
					$this->id_periodoFK_Idperiodo=$cuenta_cobrar_detalle_session->bigidperiodoActual;
					$cuenta_cobrar_detalle_session->bigidperiodoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrar_detalleLogic->getsFK_Idperiodo($finalQueryPaginacion,$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_cobrar_detalleLogicAdditional::getDetalleIndiceFK_Idperiodo($this->id_periodoFK_Idperiodo);


					if($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles()==null || count($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_cobrar_detalles=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrar_detalleLogic->getsFK_Idperiodo('',$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_cobrar_detallesReporte=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_cobrar_detalles("FK_Idperiodo",$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_cobrar_detalleLogic->setcuenta_cobrar_detalles($cuenta_cobrar_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsucursal')
			{

				if($cuenta_cobrar_detalle_session->bigidsucursalActual!=null && $cuenta_cobrar_detalle_session->bigidsucursalActual!=0)
				{
					$this->id_sucursalFK_Idsucursal=$cuenta_cobrar_detalle_session->bigidsucursalActual;
					$cuenta_cobrar_detalle_session->bigidsucursalActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrar_detalleLogic->getsFK_Idsucursal($finalQueryPaginacion,$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_cobrar_detalleLogicAdditional::getDetalleIndiceFK_Idsucursal($this->id_sucursalFK_Idsucursal);


					if($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles()==null || count($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_cobrar_detalles=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrar_detalleLogic->getsFK_Idsucursal('',$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_cobrar_detallesReporte=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_cobrar_detalles("FK_Idsucursal",$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_cobrar_detalleLogic->setcuenta_cobrar_detalles($cuenta_cobrar_detalles);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($cuenta_cobrar_detalle_session->bigidusuarioActual!=null && $cuenta_cobrar_detalle_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$cuenta_cobrar_detalle_session->bigidusuarioActual;
					$cuenta_cobrar_detalle_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrar_detalleLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cuenta_cobrar_detalleLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles()==null || count($this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cuenta_cobrar_detalles=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cuenta_cobrar_detalleLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cuenta_cobrar_detallesReporte=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecuenta_cobrar_detalles("FK_Idusuario",$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cuenta_cobrar_detalleLogic->setcuenta_cobrar_detalles($cuenta_cobrar_detalles);
					}
				//}

			} 
		
		$cuenta_cobrar_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cuenta_cobrar_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->cuenta_cobrar_detalleLogic->loadForeignsKeysDescription();*/
		
		$this->cuenta_cobrar_detalles=$this->cuenta_cobrar_detalleLogic->getcuenta_cobrar_detalles();
		
		if($this->cuenta_cobrar_detallesEliminados==null) {
			$this->cuenta_cobrar_detallesEliminados=array();
		}
		
		$this->Session->write(cuenta_cobrar_detalle_util::$STR_SESSION_NAME.'Lista',serialize($this->cuenta_cobrar_detalles));
		$this->Session->write(cuenta_cobrar_detalle_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cuenta_cobrar_detallesEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(cuenta_cobrar_detalle_util::$STR_SESSION_NAME,serialize($cuenta_cobrar_detalle_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idcuenta_cobrar_detalle=$idGeneral;
			
			$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
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
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}

			if(count($this->cuenta_cobrar_detalles) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Idcuenta_cobrarParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_cobrarFK_Idcuenta_cobrar=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_cobrar','cmbid_cuenta_cobrar');

			$this->strAccionBusqueda='FK_Idcuenta_cobrar';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
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
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ejercicioFK_Idejercicio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idejercicio','cmbid_ejercicio');

			$this->strAccionBusqueda='FK_Idejercicio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
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
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdestadoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_estadoFK_Idestado=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idestado','cmbid_estado');

			$this->strAccionBusqueda='FK_Idestado';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
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
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_periodoFK_Idperiodo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperiodo','cmbid_periodo');

			$this->strAccionBusqueda='FK_Idperiodo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
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
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sucursalFK_Idsucursal=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsucursal','cmbid_sucursal');

			$this->strAccionBusqueda='FK_Idsucursal';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
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
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcuenta_cobrar($strFinalQuery,$id_cuenta_cobrar)
	{
		try
		{

			$this->cuenta_cobrar_detalleLogic->getsFK_Idcuenta_cobrar($strFinalQuery,new Pagination(),$id_cuenta_cobrar);
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

			$this->cuenta_cobrar_detalleLogic->getsFK_Idejercicio($strFinalQuery,new Pagination(),$id_ejercicio);
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

			$this->cuenta_cobrar_detalleLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idestado($strFinalQuery,$id_estado)
	{
		try
		{

			$this->cuenta_cobrar_detalleLogic->getsFK_Idestado($strFinalQuery,new Pagination(),$id_estado);
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

			$this->cuenta_cobrar_detalleLogic->getsFK_Idperiodo($strFinalQuery,new Pagination(),$id_periodo);
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

			$this->cuenta_cobrar_detalleLogic->getsFK_Idsucursal($strFinalQuery,new Pagination(),$id_sucursal);
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

			$this->cuenta_cobrar_detalleLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
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
			
			
			$cuenta_cobrar_detalleForeignKey=new cuenta_cobrar_detalle_param_return(); //cuenta_cobrar_detalleForeignKey();
			
			$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));
						
			if($cuenta_cobrar_detalle_session==null) {
				$cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$cuenta_cobrar_detalleForeignKey=$this->cuenta_cobrar_detalleLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$cuenta_cobrar_detalle_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$cuenta_cobrar_detalleForeignKey->empresasFK;
				$this->idempresaDefaultFK=$cuenta_cobrar_detalleForeignKey->idempresaDefaultFK;
			}

			if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$this->strRecargarFkTipos,',')) {
				$this->sucursalsFK=$cuenta_cobrar_detalleForeignKey->sucursalsFK;
				$this->idsucursalDefaultFK=$cuenta_cobrar_detalleForeignKey->idsucursalDefaultFK;
			}

			if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionsucursal) {
				$this->setVisibleBusquedasParasucursal(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$this->strRecargarFkTipos,',')) {
				$this->ejerciciosFK=$cuenta_cobrar_detalleForeignKey->ejerciciosFK;
				$this->idejercicioDefaultFK=$cuenta_cobrar_detalleForeignKey->idejercicioDefaultFK;
			}

			if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionejercicio) {
				$this->setVisibleBusquedasParaejercicio(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$this->strRecargarFkTipos,',')) {
				$this->periodosFK=$cuenta_cobrar_detalleForeignKey->periodosFK;
				$this->idperiodoDefaultFK=$cuenta_cobrar_detalleForeignKey->idperiodoDefaultFK;
			}

			if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionperiodo) {
				$this->setVisibleBusquedasParaperiodo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$cuenta_cobrar_detalleForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$cuenta_cobrar_detalleForeignKey->idusuarioDefaultFK;
			}

			if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionusuario) {
				$this->setVisibleBusquedasParausuario(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_cobrar',$this->strRecargarFkTipos,',')) {
				$this->cuenta_cobrarsFK=$cuenta_cobrar_detalleForeignKey->cuenta_cobrarsFK;
				$this->idcuenta_cobrarDefaultFK=$cuenta_cobrar_detalleForeignKey->idcuenta_cobrarDefaultFK;
			}

			if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesioncuenta_cobrar) {
				$this->setVisibleBusquedasParacuenta_cobrar(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$this->strRecargarFkTipos,',')) {
				$this->estadosFK=$cuenta_cobrar_detalleForeignKey->estadosFK;
				$this->idestadoDefaultFK=$cuenta_cobrar_detalleForeignKey->idestadoDefaultFK;
			}

			if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionestado) {
				$this->setVisibleBusquedasParaestado(true);
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
	
	function cargarCombosFKFromReturnGeneral($cuenta_cobrar_detalleReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$cuenta_cobrar_detalleReturnGeneral->strRecargarFkTipos;
			
			


			if($cuenta_cobrar_detalleReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$cuenta_cobrar_detalleReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$cuenta_cobrar_detalleReturnGeneral->idempresaDefaultFK;
			}


			if($cuenta_cobrar_detalleReturnGeneral->con_sucursalsFK==true) {
				$this->sucursalsFK=$cuenta_cobrar_detalleReturnGeneral->sucursalsFK;
				$this->idsucursalDefaultFK=$cuenta_cobrar_detalleReturnGeneral->idsucursalDefaultFK;
			}


			if($cuenta_cobrar_detalleReturnGeneral->con_ejerciciosFK==true) {
				$this->ejerciciosFK=$cuenta_cobrar_detalleReturnGeneral->ejerciciosFK;
				$this->idejercicioDefaultFK=$cuenta_cobrar_detalleReturnGeneral->idejercicioDefaultFK;
			}


			if($cuenta_cobrar_detalleReturnGeneral->con_periodosFK==true) {
				$this->periodosFK=$cuenta_cobrar_detalleReturnGeneral->periodosFK;
				$this->idperiodoDefaultFK=$cuenta_cobrar_detalleReturnGeneral->idperiodoDefaultFK;
			}


			if($cuenta_cobrar_detalleReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$cuenta_cobrar_detalleReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$cuenta_cobrar_detalleReturnGeneral->idusuarioDefaultFK;
			}


			if($cuenta_cobrar_detalleReturnGeneral->con_cuenta_cobrarsFK==true) {
				$this->cuenta_cobrarsFK=$cuenta_cobrar_detalleReturnGeneral->cuenta_cobrarsFK;
				$this->idcuenta_cobrarDefaultFK=$cuenta_cobrar_detalleReturnGeneral->idcuenta_cobrarDefaultFK;
			}


			if($cuenta_cobrar_detalleReturnGeneral->con_estadosFK==true) {
				$this->estadosFK=$cuenta_cobrar_detalleReturnGeneral->estadosFK;
				$this->idestadoDefaultFK=$cuenta_cobrar_detalleReturnGeneral->idestadoDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));
		
		if($cuenta_cobrar_detalle_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($cuenta_cobrar_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($cuenta_cobrar_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sucursal_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sucursal';
			}
			else if($cuenta_cobrar_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ejercicio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ejercicio';
			}
			else if($cuenta_cobrar_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==periodo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='periodo';
			}
			else if($cuenta_cobrar_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			else if($cuenta_cobrar_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_cobrar_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta_cobrar';
			}
			else if($cuenta_cobrar_detalle_session->getstrNombrePaginaNavegacionHaciaFKDesde()==estado_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='estado';
			}
			
			$cuenta_cobrar_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}						
			
			$this->cuenta_cobrar_detallesAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cuenta_cobrar_detallesAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cuenta_cobrar_detallesAuxiliar=array();
			}
			
			if(count($this->cuenta_cobrar_detallesAuxiliar) > 0) {
				
				foreach ($this->cuenta_cobrar_detallesAuxiliar as $cuenta_cobrar_detalleSeleccionado) {
					$this->eliminarTablaBase($cuenta_cobrar_detalleSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
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


	public function getcuenta_cobrarsFKListSelectItem() 
	{
		$cuenta_cobrarsList=array();

		$item=null;

		foreach($this->cuenta_cobrarsFK as $cuenta_cobrar)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta_cobrar>getId());
			$item->setValue($cuenta_cobrar->getId());
			$cuenta_cobrarsList[]=$item;
		}

		return $cuenta_cobrarsList;
	}


	public function getestadosFKListSelectItem() 
	{
		$estadosList=array();

		$item=null;

		foreach($this->estadosFK as $estado)
		{
			$item=new SelectItem();
			$item->setLabel($estado->getnombre());
			$item->setValue($estado->getId());
			$estadosList[]=$item;
		}

		return $estadosList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
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
				$this->cuenta_cobrar_detalleLogic->commitNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->rollbackNewConnexionToDeep();
				$this->cuenta_cobrar_detalleLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$cuenta_cobrar_detallesNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->cuenta_cobrar_detalles as $cuenta_cobrar_detalleLocal) {
				if($cuenta_cobrar_detalleLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->cuenta_cobrar_detalle=new cuenta_cobrar_detalle();
				
				$this->cuenta_cobrar_detalle->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->cuenta_cobrar_detalles[]=$this->cuenta_cobrar_detalle;*/
				
				$cuenta_cobrar_detallesNuevos[]=$this->cuenta_cobrar_detalle;
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
				$class=new Classe('cuenta_cobrar');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cuenta_cobrar_detalleLogic->setcuenta_cobrar_detalles($cuenta_cobrar_detallesNuevos);
					
				$this->cuenta_cobrar_detalleLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($cuenta_cobrar_detallesNuevos as $cuenta_cobrar_detalleNuevo) {
					$this->cuenta_cobrar_detalles[]=$cuenta_cobrar_detalleNuevo;
				}
				
				/*$this->cuenta_cobrar_detalles[]=$cuenta_cobrar_detallesNuevos;*/
				
				$this->cuenta_cobrar_detalleLogic->setcuenta_cobrar_detalles($this->cuenta_cobrar_detalles);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($cuenta_cobrar_detallesNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_detalle_session==null) {
			$cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();
		}
		
		if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($cuenta_cobrar_detalle_session->bigidempresaActual!=null && $cuenta_cobrar_detalle_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cuenta_cobrar_detalle_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=cuenta_cobrar_detalle_util::getempresaDescripcion($empresaLogic->getempresa());
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

		$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_detalle_session==null) {
			$cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();
		}
		
		if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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


			if($cuenta_cobrar_detalle_session->bigidsucursalActual!=null && $cuenta_cobrar_detalle_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($cuenta_cobrar_detalle_session->bigidsucursalActual);//WithConnection

				$this->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=cuenta_cobrar_detalle_util::getsucursalDescripcion($sucursalLogic->getsucursal());
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

		$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_detalle_session==null) {
			$cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();
		}
		
		if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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


			if($cuenta_cobrar_detalle_session->bigidejercicioActual!=null && $cuenta_cobrar_detalle_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($cuenta_cobrar_detalle_session->bigidejercicioActual);//WithConnection

				$this->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=cuenta_cobrar_detalle_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
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

		$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_detalle_session==null) {
			$cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();
		}
		
		if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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


			if($cuenta_cobrar_detalle_session->bigidperiodoActual!=null && $cuenta_cobrar_detalle_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($cuenta_cobrar_detalle_session->bigidperiodoActual);//WithConnection

				$this->periodosFK[$periodoLogic->getperiodo()->getId()]=cuenta_cobrar_detalle_util::getperiodoDescripcion($periodoLogic->getperiodo());
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

		$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_detalle_session==null) {
			$cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();
		}
		
		if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionusuario!=true) {
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


			if($cuenta_cobrar_detalle_session->bigidusuarioActual!=null && $cuenta_cobrar_detalle_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($cuenta_cobrar_detalle_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=cuenta_cobrar_detalle_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarComboscuenta_cobrarsFK($connexion=null,$strRecargarFkQuery=''){
		$cuenta_cobrarLogic= new cuenta_cobrar_logic();
		$pagination= new Pagination();
		$this->cuenta_cobrarsFK=array();

		$cuenta_cobrarLogic->setConnexion($connexion);
		$cuenta_cobrarLogic->getcuenta_cobrarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_detalle_session==null) {
			$cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();
		}
		
		if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesioncuenta_cobrar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_cobrar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcuenta_cobrar=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta_cobrar=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta_cobrar, '');
				$finalQueryGlobalcuenta_cobrar.=cuenta_cobrar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta_cobrar.$strRecargarFkQuery;		

				$cuenta_cobrarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscuenta_cobrarsFK($cuenta_cobrarLogic->getcuenta_cobrars());

		} else {
			$this->setVisibleBusquedasParacuenta_cobrar(true);


			if($cuenta_cobrar_detalle_session->bigidcuenta_cobrarActual!=null && $cuenta_cobrar_detalle_session->bigidcuenta_cobrarActual > 0) {
				$cuenta_cobrarLogic->getEntity($cuenta_cobrar_detalle_session->bigidcuenta_cobrarActual);//WithConnection

				$this->cuenta_cobrarsFK[$cuenta_cobrarLogic->getcuenta_cobrar()->getId()]=cuenta_cobrar_detalle_util::getcuenta_cobrarDescripcion($cuenta_cobrarLogic->getcuenta_cobrar());
				$this->idcuenta_cobrarDefaultFK=$cuenta_cobrarLogic->getcuenta_cobrar()->getId();
			}
		}
	}

	public function cargarCombosestadosFK($connexion=null,$strRecargarFkQuery=''){
		$estadoLogic= new estado_logic();
		$pagination= new Pagination();
		$this->estadosFK=array();

		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));

		if($cuenta_cobrar_detalle_session==null) {
			$cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();
		}
		
		if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionestado!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=estado_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalestado=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalestado=Funciones::GetFinalQueryAppend($finalQueryGlobalestado, '');
				$finalQueryGlobalestado.=estado_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalestado.$strRecargarFkQuery;		

				$estadoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosestadosFK($estadoLogic->getestados());

		} else {
			$this->setVisibleBusquedasParaestado(true);


			if($cuenta_cobrar_detalle_session->bigidestadoActual!=null && $cuenta_cobrar_detalle_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($cuenta_cobrar_detalle_session->bigidestadoActual);//WithConnection

				$this->estadosFK[$estadoLogic->getestado()->getId()]=cuenta_cobrar_detalle_util::getestadoDescripcion($estadoLogic->getestado());
				$this->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=cuenta_cobrar_detalle_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombossucursalsFK($sucursals){

		foreach ($sucursals as $sucursalLocal ) {
			if($this->idsucursalDefaultFK==0) {
				$this->idsucursalDefaultFK=$sucursalLocal->getId();
			}

			$this->sucursalsFK[$sucursalLocal->getId()]=cuenta_cobrar_detalle_util::getsucursalDescripcion($sucursalLocal);
		}
	}

	public function prepararCombosejerciciosFK($ejercicios){

		foreach ($ejercicios as $ejercicioLocal ) {
			if($this->idejercicioDefaultFK==0) {
				$this->idejercicioDefaultFK=$ejercicioLocal->getId();
			}

			$this->ejerciciosFK[$ejercicioLocal->getId()]=cuenta_cobrar_detalle_util::getejercicioDescripcion($ejercicioLocal);
		}
	}

	public function prepararCombosperiodosFK($periodos){

		foreach ($periodos as $periodoLocal ) {
			if($this->idperiodoDefaultFK==0) {
				$this->idperiodoDefaultFK=$periodoLocal->getId();
			}

			$this->periodosFK[$periodoLocal->getId()]=cuenta_cobrar_detalle_util::getperiodoDescripcion($periodoLocal);
		}
	}

	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=cuenta_cobrar_detalle_util::getusuarioDescripcion($usuarioLocal);
		}
	}

	public function prepararComboscuenta_cobrarsFK($cuenta_cobrars){

		foreach ($cuenta_cobrars as $cuenta_cobrarLocal ) {
			if($this->idcuenta_cobrarDefaultFK==0) {
				$this->idcuenta_cobrarDefaultFK=$cuenta_cobrarLocal->getId();
			}

			$this->cuenta_cobrarsFK[$cuenta_cobrarLocal->getId()]=cuenta_cobrar_detalle_util::getcuenta_cobrarDescripcion($cuenta_cobrarLocal);
		}
	}

	public function prepararCombosestadosFK($estados){

		foreach ($estados as $estadoLocal ) {
			if($this->idestadoDefaultFK==0) {
				$this->idestadoDefaultFK=$estadoLocal->getId();
			}

			$this->estadosFK[$estadoLocal->getId()]=cuenta_cobrar_detalle_util::getestadoDescripcion($estadoLocal);
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

			$strDescripcionempresa=cuenta_cobrar_detalle_util::getempresaDescripcion($empresaLogic->getempresa());

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

			$strDescripcionsucursal=cuenta_cobrar_detalle_util::getsucursalDescripcion($sucursalLogic->getsucursal());

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

			$strDescripcionejercicio=cuenta_cobrar_detalle_util::getejercicioDescripcion($ejercicioLogic->getejercicio());

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

			$strDescripcionperiodo=cuenta_cobrar_detalle_util::getperiodoDescripcion($periodoLogic->getperiodo());

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

			$strDescripcionusuario=cuenta_cobrar_detalle_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
	}

	public function cargarDescripcioncuenta_cobrarFK($idcuenta_cobrar,$connexion=null){
		$cuenta_cobrarLogic= new cuenta_cobrar_logic();
		$cuenta_cobrarLogic->setConnexion($connexion);
		$cuenta_cobrarLogic->getcuenta_cobrarDataAccess()->isForFKData=true;
		$strDescripcioncuenta_cobrar='';

		if($idcuenta_cobrar!=null && $idcuenta_cobrar!='' && $idcuenta_cobrar!='null') {
			if($connexion!=null) {
				$cuenta_cobrarLogic->getEntity($idcuenta_cobrar);//WithConnection
			} else {
				$cuenta_cobrarLogic->getEntityWithConnection($idcuenta_cobrar);//
			}

			$strDescripcioncuenta_cobrar=cuenta_cobrar_detalle_util::getcuenta_cobrarDescripcion($cuenta_cobrarLogic->getcuenta_cobrar());

		} else {
			$strDescripcioncuenta_cobrar='null';
		}

		return $strDescripcioncuenta_cobrar;
	}

	public function cargarDescripcionestadoFK($idestado,$connexion=null){
		$estadoLogic= new estado_logic();
		$estadoLogic->setConnexion($connexion);
		$estadoLogic->getestadoDataAccess()->isForFKData=true;
		$strDescripcionestado='';

		if($idestado!=null && $idestado!='' && $idestado!='null') {
			if($connexion!=null) {
				$estadoLogic->getEntity($idestado);//WithConnection
			} else {
				$estadoLogic->getEntityWithConnection($idestado);//
			}

			$strDescripcionestado=cuenta_cobrar_detalle_util::getestadoDescripcion($estadoLogic->getestado());

		} else {
			$strDescripcionestado='null';
		}

		return $strDescripcionestado;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(cuenta_cobrar_detalle $cuenta_cobrar_detalleClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$cuenta_cobrar_detalleClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
				$cuenta_cobrar_detalleClase->setid_sucursal($this->parametroGeneralUsuarioActual->getid_sucursal());
				$cuenta_cobrar_detalleClase->setid_ejercicio($this->parametroGeneralUsuarioActual->getid_ejercicio());
				$cuenta_cobrar_detalleClase->setid_periodo($this->parametroGeneralUsuarioActual->getid_periodo());
				$cuenta_cobrar_detalleClase->setid_usuario($this->usuarioActual->getId());
			
			
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

		$this->strVisibleFK_Idcuenta_cobrar=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionempresa;
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

		$this->strVisibleFK_Idcuenta_cobrar=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionsucursal;
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

		$this->strVisibleFK_Idcuenta_cobrar=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idejercicio=$strParaVisibleejercicio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionejercicio;
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

		$this->strVisibleFK_Idcuenta_cobrar=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionperiodo;
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

		$this->strVisibleFK_Idcuenta_cobrar=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idusuario=$strParaVisibleusuario;
	}

	public function setVisibleBusquedasParacuenta_cobrar($isParacuenta_cobrar){
		$strParaVisiblecuenta_cobrar='display:table-row';
		$strParaVisibleNegacioncuenta_cobrar='display:none';

		if($isParacuenta_cobrar) {
			$strParaVisiblecuenta_cobrar='display:table-row';
			$strParaVisibleNegacioncuenta_cobrar='display:none';
		} else {
			$strParaVisiblecuenta_cobrar='display:none';
			$strParaVisibleNegacioncuenta_cobrar='display:table-row';
		}


		$strParaVisibleNegacioncuenta_cobrar=trim($strParaVisibleNegacioncuenta_cobrar);

		$this->strVisibleFK_Idcuenta_cobrar=$strParaVisiblecuenta_cobrar;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncuenta_cobrar;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta_cobrar;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacioncuenta_cobrar;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncuenta_cobrar;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacioncuenta_cobrar;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacioncuenta_cobrar;
	}

	public function setVisibleBusquedasParaestado($isParaestado){
		$strParaVisibleestado='display:table-row';
		$strParaVisibleNegacionestado='display:none';

		if($isParaestado) {
			$strParaVisibleestado='display:table-row';
			$strParaVisibleNegacionestado='display:none';
		} else {
			$strParaVisibleestado='display:none';
			$strParaVisibleNegacionestado='display:table-row';
		}


		$strParaVisibleNegacionestado=trim($strParaVisibleNegacionestado);

		$this->strVisibleFK_Idcuenta_cobrar=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idestado=$strParaVisibleestado;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionestado;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idcuenta_cobrar_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_cobrar_detalleActual=$idcuenta_cobrar_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_cobrar_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_cobrar_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_cobrar_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParasucursal() {//$idcuenta_cobrar_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_cobrar_detalleActual=$idcuenta_cobrar_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sucursal_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_cobrar_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sucursal_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_cobrar_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sucursal_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_cobrar_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaejercicio() {//$idcuenta_cobrar_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_cobrar_detalleActual=$idcuenta_cobrar_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ejercicio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_cobrar_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ejercicio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_cobrar_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ejercicio_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_cobrar_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaperiodo() {//$idcuenta_cobrar_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_cobrar_detalleActual=$idcuenta_cobrar_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.periodo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_cobrar_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',periodo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_cobrar_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(periodo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_cobrar_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParausuario() {//$idcuenta_cobrar_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_cobrar_detalleActual=$idcuenta_cobrar_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_cobrar_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_cobrar_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_cobrar_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_cobrar() {//$idcuenta_cobrar_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_cobrar_detalleActual=$idcuenta_cobrar_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_cobrar_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_cobrar_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_cobrar(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_cobrar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_cobrar_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_cobrar(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_cobrar_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_cobrar_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaestado() {//$idcuenta_cobrar_detalleActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcuenta_cobrar_detalleActual=$idcuenta_cobrar_detalleActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.estado_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cuenta_cobrar_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',estado_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cuenta_cobrar_detalleJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(estado_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcuenta_cobrar_detalle,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(cuenta_cobrar_detalle_util::$STR_SESSION_NAME,cuenta_cobrar_detalle_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$cuenta_cobrar_detalle_session=$this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME);
				
		if($cuenta_cobrar_detalle_session==null) {
			$cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();		
			//$this->Session->write('cuenta_cobrar_detalle_session',$cuenta_cobrar_detalle_session);							
		}
		*/
		
		$cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();
    	$cuenta_cobrar_detalle_session->strPathNavegacionActual=cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO;
    	$cuenta_cobrar_detalle_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(cuenta_cobrar_detalle_util::$STR_SESSION_NAME,serialize($cuenta_cobrar_detalle_session));		
	}	
	
	public function getSetBusquedasSesionConfig(cuenta_cobrar_detalle_session $cuenta_cobrar_detalle_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionFK!=null && $cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionFK==true) {
			if($cuenta_cobrar_detalle_session->bigIdActualFK!=null && $cuenta_cobrar_detalle_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$cuenta_cobrar_detalle_session->bigIdActualFKParaPosibleAtras=$cuenta_cobrar_detalle_session->bigIdActualFK;*/
			}
				
			$cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(cuenta_cobrar_detalle_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionempresa!=null && $cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($cuenta_cobrar_detalle_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_cobrar_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_cobrar_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_cobrar_detalle_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($cuenta_cobrar_detalle_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_cobrar_detalle_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_cobrar_detalle_session->intNumeroPaginacion==cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionsucursal!=null && $cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionsucursal==true)
			{
				if($cuenta_cobrar_detalle_session->bigidsucursalActual!=0) {
					$this->strAccionBusqueda='FK_Idsucursal';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_cobrar_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_cobrar_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_cobrar_detalle_session->bigidsucursalActualDescripcion);
						$historyWeb->setIdActual($cuenta_cobrar_detalle_session->bigidsucursalActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_cobrar_detalle_session->bigidsucursalActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionsucursal=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_cobrar_detalle_session->intNumeroPaginacion==cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionejercicio!=null && $cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionejercicio==true)
			{
				if($cuenta_cobrar_detalle_session->bigidejercicioActual!=0) {
					$this->strAccionBusqueda='FK_Idejercicio';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_cobrar_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_cobrar_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_cobrar_detalle_session->bigidejercicioActualDescripcion);
						$historyWeb->setIdActual($cuenta_cobrar_detalle_session->bigidejercicioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_cobrar_detalle_session->bigidejercicioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionejercicio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_cobrar_detalle_session->intNumeroPaginacion==cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionperiodo!=null && $cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionperiodo==true)
			{
				if($cuenta_cobrar_detalle_session->bigidperiodoActual!=0) {
					$this->strAccionBusqueda='FK_Idperiodo';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_cobrar_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_cobrar_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_cobrar_detalle_session->bigidperiodoActualDescripcion);
						$historyWeb->setIdActual($cuenta_cobrar_detalle_session->bigidperiodoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_cobrar_detalle_session->bigidperiodoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionperiodo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_cobrar_detalle_session->intNumeroPaginacion==cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionusuario!=null && $cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($cuenta_cobrar_detalle_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_cobrar_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_cobrar_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_cobrar_detalle_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($cuenta_cobrar_detalle_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_cobrar_detalle_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_cobrar_detalle_session->intNumeroPaginacion==cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesioncuenta_cobrar!=null && $cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesioncuenta_cobrar==true)
			{
				if($cuenta_cobrar_detalle_session->bigidcuenta_cobrarActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_cobrar';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_cobrar_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_cobrar_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_cobrar_detalle_session->bigidcuenta_cobrarActualDescripcion);
						$historyWeb->setIdActual($cuenta_cobrar_detalle_session->bigidcuenta_cobrarActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_cobrar_detalle_session->bigidcuenta_cobrarActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesioncuenta_cobrar=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_cobrar_detalle_session->intNumeroPaginacion==cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_detalle_session->intNumeroPaginacion;
				}
			}
			else if($cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionestado!=null && $cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionestado==true)
			{
				if($cuenta_cobrar_detalle_session->bigidestadoActual!=0) {
					$this->strAccionBusqueda='FK_Idestado';

					$existe_history=HistoryWeb::ExisteElemento(cuenta_cobrar_detalle_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cuenta_cobrar_detalle_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cuenta_cobrar_detalle_session->bigidestadoActualDescripcion);
						$historyWeb->setIdActual($cuenta_cobrar_detalle_session->bigidestadoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cuenta_cobrar_detalle_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cuenta_cobrar_detalle_session->bigidestadoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cuenta_cobrar_detalle_session->bitBusquedaDesdeFKSesionestado=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;

				if($cuenta_cobrar_detalle_session->intNumeroPaginacion==cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cuenta_cobrar_detalle_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cuenta_cobrar_detalle_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$cuenta_cobrar_detalle_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));
		
		if($cuenta_cobrar_detalle_session==null) {
			$cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();
		}
		
		$cuenta_cobrar_detalle_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$cuenta_cobrar_detalle_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cuenta_cobrar_detalle_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcuenta_cobrar') {
			$cuenta_cobrar_detalle_session->id_cuenta_cobrar=$this->id_cuenta_cobrarFK_Idcuenta_cobrar;	

		}
		else if($this->strAccionBusqueda=='FK_Idejercicio') {
			$cuenta_cobrar_detalle_session->id_ejercicio=$this->id_ejercicioFK_Idejercicio;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$cuenta_cobrar_detalle_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idestado') {
			$cuenta_cobrar_detalle_session->id_estado=$this->id_estadoFK_Idestado;	

		}
		else if($this->strAccionBusqueda=='FK_Idperiodo') {
			$cuenta_cobrar_detalle_session->id_periodo=$this->id_periodoFK_Idperiodo;	

		}
		else if($this->strAccionBusqueda=='FK_Idsucursal') {
			$cuenta_cobrar_detalle_session->id_sucursal=$this->id_sucursalFK_Idsucursal;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$cuenta_cobrar_detalle_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		
		$this->Session->write(cuenta_cobrar_detalle_util::$STR_SESSION_NAME,serialize($cuenta_cobrar_detalle_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(cuenta_cobrar_detalle_session $cuenta_cobrar_detalle_session) {
		
		if($cuenta_cobrar_detalle_session==null) {
			$cuenta_cobrar_detalle_session=unserialize($this->Session->read(cuenta_cobrar_detalle_util::$STR_SESSION_NAME));
		}
		
		if($cuenta_cobrar_detalle_session==null) {
		   $cuenta_cobrar_detalle_session=new cuenta_cobrar_detalle_session();
		}
		
		if($cuenta_cobrar_detalle_session->strUltimaBusqueda!=null && $cuenta_cobrar_detalle_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$cuenta_cobrar_detalle_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$cuenta_cobrar_detalle_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$cuenta_cobrar_detalle_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcuenta_cobrar') {
				$this->id_cuenta_cobrarFK_Idcuenta_cobrar=$cuenta_cobrar_detalle_session->id_cuenta_cobrar;
				$cuenta_cobrar_detalle_session->id_cuenta_cobrar=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idejercicio') {
				$this->id_ejercicioFK_Idejercicio=$cuenta_cobrar_detalle_session->id_ejercicio;
				$cuenta_cobrar_detalle_session->id_ejercicio=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$cuenta_cobrar_detalle_session->id_empresa;
				$cuenta_cobrar_detalle_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idestado') {
				$this->id_estadoFK_Idestado=$cuenta_cobrar_detalle_session->id_estado;
				$cuenta_cobrar_detalle_session->id_estado=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idperiodo') {
				$this->id_periodoFK_Idperiodo=$cuenta_cobrar_detalle_session->id_periodo;
				$cuenta_cobrar_detalle_session->id_periodo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idsucursal') {
				$this->id_sucursalFK_Idsucursal=$cuenta_cobrar_detalle_session->id_sucursal;
				$cuenta_cobrar_detalle_session->id_sucursal=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$cuenta_cobrar_detalle_session->id_usuario;
				$cuenta_cobrar_detalle_session->id_usuario=-1;

			}
		}
		
		$cuenta_cobrar_detalle_session->strUltimaBusqueda='';
		//$cuenta_cobrar_detalle_session->intNumeroPaginacion=10;
		$cuenta_cobrar_detalle_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(cuenta_cobrar_detalle_util::$STR_SESSION_NAME,serialize($cuenta_cobrar_detalle_session));		
	}
	
	public function cuenta_cobrar_detallesControllerAux($conexion_control) 	 {
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
		$this->idcuenta_cobrarDefaultFK = 0;
		$this->idestadoDefaultFK = 0;
	}
	
	public function setcuenta_cobrar_detalleFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_sucursal',$this->idsucursalDefaultFK);
		$this->setExistDataCampoForm('form','id_ejercicio',$this->idejercicioDefaultFK);
		$this->setExistDataCampoForm('form','id_periodo',$this->idperiodoDefaultFK);
		$this->setExistDataCampoForm('form','id_usuario',$this->idusuarioDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_cobrar',$this->idcuenta_cobrarDefaultFK);
		$this->setExistDataCampoForm('form','id_estado',$this->idestadoDefaultFK);
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

		cuenta_cobrar::$class;
		cuenta_cobrar_carga::$CONTROLLER;

		estado::$class;
		estado_carga::$CONTROLLER;
		
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
		interface cuenta_cobrar_detalle_controlI {	
		
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
		
		public function onLoad(cuenta_cobrar_detalle_session $cuenta_cobrar_detalle_session=null);	
		function index(?string $strTypeOnLoadcuenta_cobrar_detalle='',?string $strTipoPaginaAuxiliarcuenta_cobrar_detalle='',?string $strTipoUsuarioAuxiliarcuenta_cobrar_detalle='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadcuenta_cobrar_detalle='',string $strTipoPaginaAuxiliarcuenta_cobrar_detalle='',string $strTipoUsuarioAuxiliarcuenta_cobrar_detalle='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($cuenta_cobrar_detalleReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(cuenta_cobrar_detalle $cuenta_cobrar_detalleClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(cuenta_cobrar_detalle_session $cuenta_cobrar_detalle_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(cuenta_cobrar_detalle_session $cuenta_cobrar_detalle_session);	
		public function cuenta_cobrar_detallesControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setcuenta_cobrar_detalleFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
