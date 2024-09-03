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

namespace com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\control;

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

use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\entity\saldo_cuenta;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/saldo_cuenta/util/saldo_cuenta_carga.php');
use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_carga;

use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_util;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\util\saldo_cuenta_param_return;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\business\logic\saldo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\session\saldo_cuenta_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\logic\tipo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_carga;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
saldo_cuenta_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
saldo_cuenta_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
saldo_cuenta_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
saldo_cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*saldo_cuenta_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/contabilidad/saldo_cuenta/presentation/control/saldo_cuenta_init_control.php');
use com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\control\saldo_cuenta_init_control;

include_once('com/bydan/contabilidad/contabilidad/saldo_cuenta/presentation/control/saldo_cuenta_base_control.php');
use com\bydan\contabilidad\contabilidad\saldo_cuenta\presentation\control\saldo_cuenta_base_control;

class saldo_cuenta_control extends saldo_cuenta_base_control {	
	
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
			
			
			else if($action=="FK_Idcuenta"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdcuentaParaProcesar();
			}
			else if($action=="FK_Idejercicio"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdejercicioParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idperiodo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdperiodoParaProcesar();
			}
			else if($action=="FK_Idtipo_cuenta"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_cuentaParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idsaldo_cuentaActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idsaldo_cuentaActual
			}
			else if($action=='abrirBusquedaParaejercicio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idsaldo_cuentaActual=$this->getDataId();
				$this->abrirBusquedaParaejercicio();//$idsaldo_cuentaActual
			}
			else if($action=='abrirBusquedaParaperiodo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idsaldo_cuentaActual=$this->getDataId();
				$this->abrirBusquedaParaperiodo();//$idsaldo_cuentaActual
			}
			else if($action=='abrirBusquedaParatipo_cuenta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idsaldo_cuentaActual=$this->getDataId();
				$this->abrirBusquedaParatipo_cuenta();//$idsaldo_cuentaActual
			}
			else if($action=='abrirBusquedaParacuenta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idsaldo_cuentaActual=$this->getDataId();
				$this->abrirBusquedaParacuenta();//$idsaldo_cuentaActual
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
					
					$saldo_cuentaController = new saldo_cuenta_control();
					
					$saldo_cuentaController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($saldo_cuentaController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$saldo_cuentaController = new saldo_cuenta_control();
						$saldo_cuentaController = $this;
						
						$jsonResponse = json_encode($saldo_cuentaController->saldo_cuentas);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->saldo_cuentaReturnGeneral==null) {
					$this->saldo_cuentaReturnGeneral=new saldo_cuenta_param_return();
				}
				
				echo($this->saldo_cuentaReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$saldo_cuentaController=new saldo_cuenta_control();
		
		$saldo_cuentaController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$saldo_cuentaController->usuarioActual=new usuario();
		
		$saldo_cuentaController->usuarioActual->setId($this->usuarioActual->getId());
		$saldo_cuentaController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$saldo_cuentaController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$saldo_cuentaController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$saldo_cuentaController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$saldo_cuentaController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$saldo_cuentaController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$saldo_cuentaController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $saldo_cuentaController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadsaldo_cuenta= $this->getDataGeneralString('strTypeOnLoadsaldo_cuenta');
		$strTipoPaginaAuxiliarsaldo_cuenta= $this->getDataGeneralString('strTipoPaginaAuxiliarsaldo_cuenta');
		$strTipoUsuarioAuxiliarsaldo_cuenta= $this->getDataGeneralString('strTipoUsuarioAuxiliarsaldo_cuenta');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadsaldo_cuenta,$strTipoPaginaAuxiliarsaldo_cuenta,$strTipoUsuarioAuxiliarsaldo_cuenta,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadsaldo_cuenta!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('saldo_cuenta','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(saldo_cuenta_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarsaldo_cuenta,$this->strTipoUsuarioAuxiliarsaldo_cuenta,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(saldo_cuenta_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarsaldo_cuenta,$this->strTipoUsuarioAuxiliarsaldo_cuenta,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->saldo_cuentaReturnGeneral=new saldo_cuenta_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->saldo_cuentaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->saldo_cuentaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->saldo_cuentaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->saldo_cuentaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->saldo_cuentaReturnGeneral);
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
		$this->saldo_cuentaReturnGeneral=new saldo_cuenta_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->saldo_cuentaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->saldo_cuentaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->saldo_cuentaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->saldo_cuentaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->saldo_cuentaReturnGeneral);
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
		$this->saldo_cuentaReturnGeneral=new saldo_cuenta_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->saldo_cuentaReturnGeneral->conGuardarReturnSessionJs=true;
		$this->saldo_cuentaReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->saldo_cuentaReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->saldo_cuentaReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->saldo_cuentaReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
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
			
			
			$this->saldo_cuentaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->saldo_cuentaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->saldo_cuentaReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->saldo_cuentaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->saldo_cuentaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->saldo_cuentaReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->saldo_cuentaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->saldo_cuentaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->saldo_cuentaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->saldo_cuentaReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->saldo_cuentaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->saldo_cuentaReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->saldo_cuentaReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->saldo_cuentaReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->saldo_cuentaReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->saldo_cuentaReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->saldo_cuentaReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->saldo_cuentaReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
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
		
		$this->saldo_cuentaLogic=new saldo_cuenta_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->saldo_cuenta=new saldo_cuenta();
		
		$this->strTypeOnLoadsaldo_cuenta='onload';
		$this->strTipoPaginaAuxiliarsaldo_cuenta='none';
		$this->strTipoUsuarioAuxiliarsaldo_cuenta='none';	

		$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
		
		$this->saldo_cuentaModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->saldo_cuentaControllerAdditional=new saldo_cuenta_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(saldo_cuenta_session $saldo_cuenta_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($saldo_cuenta_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadsaldo_cuenta='',?string $strTipoPaginaAuxiliarsaldo_cuenta='',?string $strTipoUsuarioAuxiliarsaldo_cuenta='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadsaldo_cuenta=$strTypeOnLoadsaldo_cuenta;
			$this->strTipoPaginaAuxiliarsaldo_cuenta=$strTipoPaginaAuxiliarsaldo_cuenta;
			$this->strTipoUsuarioAuxiliarsaldo_cuenta=$strTipoUsuarioAuxiliarsaldo_cuenta;
	
			if($strTipoUsuarioAuxiliarsaldo_cuenta=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->saldo_cuenta=new saldo_cuenta();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Saldo Cuentas';
			
			
			$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));
							
			if($saldo_cuenta_session==null) {
				$saldo_cuenta_session=new saldo_cuenta_session();
				
				/*$this->Session->write('saldo_cuenta_session',$saldo_cuenta_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($saldo_cuenta_session->strFuncionJsPadre!=null && $saldo_cuenta_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$saldo_cuenta_session->strFuncionJsPadre;
				
				$saldo_cuenta_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($saldo_cuenta_session);
			
			if($strTypeOnLoadsaldo_cuenta!=null && $strTypeOnLoadsaldo_cuenta=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$saldo_cuenta_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$saldo_cuenta_session->setPaginaPopupVariables(true);
				}
				
				if($saldo_cuenta_session->intNumeroPaginacion==saldo_cuenta_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$saldo_cuenta_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,saldo_cuenta_util::$STR_SESSION_NAME,'contabilidad');																
			
			} else if($strTypeOnLoadsaldo_cuenta!=null && $strTypeOnLoadsaldo_cuenta=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$saldo_cuenta_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;*/
				
				if($saldo_cuenta_session->intNumeroPaginacion==saldo_cuenta_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$saldo_cuenta_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarsaldo_cuenta!=null && $strTipoPaginaAuxiliarsaldo_cuenta=='none') {
				/*$saldo_cuenta_session->strStyleDivHeader='display:table-row';*/
				
				/*$saldo_cuenta_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarsaldo_cuenta!=null && $strTipoPaginaAuxiliarsaldo_cuenta=='iframe') {
					/*
					$saldo_cuenta_session->strStyleDivArbol='display:none';
					$saldo_cuenta_session->strStyleDivHeader='display:none';
					$saldo_cuenta_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$saldo_cuenta_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->saldo_cuentaClase=new saldo_cuenta();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=saldo_cuenta_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(saldo_cuenta_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->saldo_cuentaLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->saldo_cuentaLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->saldo_cuentaLogic=new saldo_cuenta_logic();*/
			
			
			$this->saldo_cuentasModel=null;
			/*new ListDataModel();*/
			
			/*$this->saldo_cuentasModel.setWrappedData(saldo_cuentaLogic->getsaldo_cuentas());*/
						
			$this->saldo_cuentas= array();
			$this->saldo_cuentasEliminados=array();
			$this->saldo_cuentasSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= saldo_cuenta_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->saldo_cuenta= new saldo_cuenta();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcuenta='display:table-row';
			$this->strVisibleFK_Idejercicio='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idperiodo='display:table-row';
			$this->strVisibleFK_Idtipo_cuenta='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarsaldo_cuenta!=null && $strTipoUsuarioAuxiliarsaldo_cuenta!='none' && $strTipoUsuarioAuxiliarsaldo_cuenta!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarsaldo_cuenta);
																
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
				if($strTipoUsuarioAuxiliarsaldo_cuenta!=null && $strTipoUsuarioAuxiliarsaldo_cuenta!='none' && $strTipoUsuarioAuxiliarsaldo_cuenta!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarsaldo_cuenta);
																
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
				if($strTipoUsuarioAuxiliarsaldo_cuenta==null || $strTipoUsuarioAuxiliarsaldo_cuenta=='none' || $strTipoUsuarioAuxiliarsaldo_cuenta=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarsaldo_cuenta,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, saldo_cuenta_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, saldo_cuenta_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina saldo_cuenta');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($saldo_cuenta_session);
			
			$this->getSetBusquedasSesionConfig($saldo_cuenta_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportesaldo_cuentas($this->strAccionBusqueda,$this->saldo_cuentaLogic->getsaldo_cuentas());*/
				} else if($this->strGenerarReporte=='Html')	{
					$saldo_cuenta_session->strServletGenerarHtmlReporte='saldo_cuentaServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(saldo_cuenta_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(saldo_cuenta_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($saldo_cuenta_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarsaldo_cuenta!=null && $strTipoUsuarioAuxiliarsaldo_cuenta=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($saldo_cuenta_session);
			}
								
			$this->set(saldo_cuenta_util::$STR_SESSION_NAME, $saldo_cuenta_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($saldo_cuenta_session);
			
			/*
			$this->saldo_cuenta->recursive = 0;
			
			$this->saldo_cuentas=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('saldo_cuentas', $this->saldo_cuentas);
			
			$this->set(saldo_cuenta_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->saldo_cuentaActual =$this->saldo_cuentaClase;
			
			/*$this->saldo_cuentaActual =$this->migrarModelsaldo_cuenta($this->saldo_cuentaClase);*/
			
			$this->returnHtml(false);
			
			$this->set(saldo_cuenta_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=saldo_cuenta_util::$STR_NOMBRE_OPCION;
				
			if(saldo_cuenta_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=saldo_cuenta_util::$STR_MODULO_OPCION.saldo_cuenta_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(saldo_cuenta_util::$STR_SESSION_NAME,serialize($saldo_cuenta_session));
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
			/*$saldo_cuentaClase= (saldo_cuenta) saldo_cuentasModel.getRowData();*/
			
			$this->saldo_cuentaClase->setId($this->saldo_cuenta->getId());	
			$this->saldo_cuentaClase->setVersionRow($this->saldo_cuenta->getVersionRow());	
			$this->saldo_cuentaClase->setVersionRow($this->saldo_cuenta->getVersionRow());	
			$this->saldo_cuentaClase->setid_empresa($this->saldo_cuenta->getid_empresa());	
			$this->saldo_cuentaClase->setid_ejercicio($this->saldo_cuenta->getid_ejercicio());	
			$this->saldo_cuentaClase->setid_periodo($this->saldo_cuenta->getid_periodo());	
			$this->saldo_cuentaClase->setid_tipo_cuenta($this->saldo_cuenta->getid_tipo_cuenta());	
			$this->saldo_cuentaClase->setid_cuenta($this->saldo_cuenta->getid_cuenta());	
			$this->saldo_cuentaClase->setsuma_debe($this->saldo_cuenta->getsuma_debe());	
			$this->saldo_cuentaClase->setsuma_haber($this->saldo_cuenta->getsuma_haber());	
			$this->saldo_cuentaClase->setdeudor($this->saldo_cuenta->getdeudor());	
			$this->saldo_cuentaClase->setacreedor($this->saldo_cuenta->getacreedor());	
			$this->saldo_cuentaClase->setsaldo($this->saldo_cuenta->getsaldo());	
			$this->saldo_cuentaClase->setfecha_proceso($this->saldo_cuenta->getfecha_proceso());	
			$this->saldo_cuentaClase->setfecha_fin_mes($this->saldo_cuenta->getfecha_fin_mes());	
			$this->saldo_cuentaClase->settipo_cuenta_codigo($this->saldo_cuenta->gettipo_cuenta_codigo());	
			$this->saldo_cuentaClase->setcuenta_contable($this->saldo_cuenta->getcuenta_contable());	
		
			/*$this->Session->write('saldo_cuentaVersionRowActual', saldo_cuenta.getVersionRow());*/
			
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
			
			$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));
						
			if($saldo_cuenta_session==null) {
				$saldo_cuenta_session=new saldo_cuenta_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('saldo_cuenta', $this->saldo_cuenta->read(null, $id));
	
			
			$this->saldo_cuenta->recursive = 0;
			
			$this->saldo_cuentas=$this->paginate();
			
			$this->set('saldo_cuentas', $this->saldo_cuentas);
	
			if (empty($this->data)) {
				$this->data = $this->saldo_cuenta->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->saldo_cuentaLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->saldo_cuentaClase);
			
			$this->saldo_cuentaActual=$this->saldo_cuentaClase;
			
			/*$this->saldo_cuentaActual =$this->migrarModelsaldo_cuenta($this->saldo_cuentaClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->saldo_cuentaLogic->getsaldo_cuentas(),$this->saldo_cuentaActual);
			
			$this->actualizarControllerConReturnGeneral($this->saldo_cuentaReturnGeneral);
			
			//$this->saldo_cuentaReturnGeneral=$this->saldo_cuentaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->saldo_cuentaLogic->getsaldo_cuentas(),$this->saldo_cuentaActual,$this->saldo_cuentaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));
						
			if($saldo_cuenta_session==null) {
				$saldo_cuenta_session=new saldo_cuenta_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevosaldo_cuenta', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->saldo_cuentaClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->saldo_cuentaClase);
			
			$this->saldo_cuentaActual =$this->saldo_cuentaClase;
			
			/*$this->saldo_cuentaActual =$this->migrarModelsaldo_cuenta($this->saldo_cuentaClase);*/
			
			$this->setsaldo_cuentaFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->saldo_cuentaLogic->getsaldo_cuentas(),$this->saldo_cuenta);
			
			$this->actualizarControllerConReturnGeneral($this->saldo_cuentaReturnGeneral);
			
			//this->saldo_cuentaReturnGeneral=$this->saldo_cuentaLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->saldo_cuentaLogic->getsaldo_cuentas(),$this->saldo_cuenta,$this->saldo_cuentaParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->saldo_cuentaReturnGeneral->getsaldo_cuenta()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idejercicioDefaultFK!=null && $this->idejercicioDefaultFK > -1) {
				$this->saldo_cuentaReturnGeneral->getsaldo_cuenta()->setid_ejercicio($this->idejercicioDefaultFK);
			}

			if($this->idperiodoDefaultFK!=null && $this->idperiodoDefaultFK > -1) {
				$this->saldo_cuentaReturnGeneral->getsaldo_cuenta()->setid_periodo($this->idperiodoDefaultFK);
			}

			if($this->idtipo_cuentaDefaultFK!=null && $this->idtipo_cuentaDefaultFK > -1) {
				$this->saldo_cuentaReturnGeneral->getsaldo_cuenta()->setid_tipo_cuenta($this->idtipo_cuentaDefaultFK);
			}

			if($this->idcuentaDefaultFK!=null && $this->idcuentaDefaultFK > -1) {
				$this->saldo_cuentaReturnGeneral->getsaldo_cuenta()->setid_cuenta($this->idcuentaDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->saldo_cuentaReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->saldo_cuentaReturnGeneral->getsaldo_cuenta(),$this->saldo_cuentaActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeysaldo_cuenta($this->saldo_cuentaReturnGeneral->getsaldo_cuenta());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariosaldo_cuenta($this->saldo_cuentaReturnGeneral->getsaldo_cuenta());*/
			}
			
			if($this->saldo_cuentaReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->saldo_cuentaReturnGeneral->getsaldo_cuenta(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualsaldo_cuenta($this->saldo_cuenta,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->saldo_cuentasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->saldo_cuentasAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->saldo_cuentasAuxiliar=array();
			}
			
			if(count($this->saldo_cuentasAuxiliar)==2) {
				$saldo_cuentaOrigen=$this->saldo_cuentasAuxiliar[0];
				$saldo_cuentaDestino=$this->saldo_cuentasAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($saldo_cuentaOrigen,$saldo_cuentaDestino,true,false,false);
				
				$this->actualizarLista($saldo_cuentaDestino,$this->saldo_cuentas);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->saldo_cuentasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->saldo_cuentasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->saldo_cuentasAuxiliar=array();
			}
			
			if(count($this->saldo_cuentasAuxiliar) > 0) {
				foreach ($this->saldo_cuentasAuxiliar as $saldo_cuentaSeleccionado) {
					$this->saldo_cuenta=new saldo_cuenta();
					
					$this->setCopiarVariablesObjetos($saldo_cuentaSeleccionado,$this->saldo_cuenta,true,true,false);
						
					$this->saldo_cuentas[]=$this->saldo_cuenta;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->saldo_cuentasEliminados as $saldo_cuentaEliminado) {
				$this->saldo_cuentaLogic->saldo_cuentas[]=$saldo_cuentaEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->saldo_cuenta=new saldo_cuenta();
							
				$this->saldo_cuentas[]=$this->saldo_cuenta;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
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
		
		$saldo_cuentaActual=new saldo_cuenta();
		
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
				
				$saldo_cuentaActual=$this->saldo_cuentas[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $saldo_cuentaActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $saldo_cuentaActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $saldo_cuentaActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $saldo_cuentaActual->setid_tipo_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $saldo_cuentaActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $saldo_cuentaActual->setsuma_debe((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $saldo_cuentaActual->setsuma_haber((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $saldo_cuentaActual->setdeudor((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $saldo_cuentaActual->setacreedor((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $saldo_cuentaActual->setsaldo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $saldo_cuentaActual->setfecha_proceso(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $saldo_cuentaActual->setfecha_fin_mes(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $saldo_cuentaActual->settipo_cuenta_codigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $saldo_cuentaActual->setcuenta_contable($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
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
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadsaldo_cuenta='',string $strTipoPaginaAuxiliarsaldo_cuenta='',string $strTipoUsuarioAuxiliarsaldo_cuenta='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadsaldo_cuenta,$strTipoPaginaAuxiliarsaldo_cuenta,$strTipoUsuarioAuxiliarsaldo_cuenta,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->saldo_cuentas) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=saldo_cuenta_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=saldo_cuenta_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=saldo_cuenta_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));
						
			if($saldo_cuenta_session==null) {
				$saldo_cuenta_session=new saldo_cuenta_session();
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
					/*$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;*/
					
					if($saldo_cuenta_session->intNumeroPaginacion==saldo_cuenta_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$saldo_cuenta_session->intNumeroPaginacion;
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
			
			$this->saldo_cuentasEliminados=array();
			
			/*$this->saldo_cuentaLogic->setConnexion($connexion);*/
			
			$this->saldo_cuentaLogic->setIsConDeep(true);
			
			$this->saldo_cuentaLogic->getsaldo_cuentaDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('tipo_cuenta');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			
			$this->saldo_cuentaLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->saldo_cuentaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->saldo_cuentaLogic->getsaldo_cuentas()==null|| count($this->saldo_cuentaLogic->getsaldo_cuentas())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->saldo_cuentas=$this->saldo_cuentaLogic->getsaldo_cuentas();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->saldo_cuentaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->saldo_cuentasReporte=$this->saldo_cuentaLogic->getsaldo_cuentas();
									
						/*$this->generarReportes('Todos',$this->saldo_cuentaLogic->getsaldo_cuentas());*/
					
						$this->saldo_cuentaLogic->setsaldo_cuentas($this->saldo_cuentas);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->saldo_cuentaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->saldo_cuentaLogic->getsaldo_cuentas()==null|| count($this->saldo_cuentaLogic->getsaldo_cuentas())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->saldo_cuentas=$this->saldo_cuentaLogic->getsaldo_cuentas();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->saldo_cuentaLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->saldo_cuentasReporte=$this->saldo_cuentaLogic->getsaldo_cuentas();
									
						/*$this->generarReportes('Todos',$this->saldo_cuentaLogic->getsaldo_cuentas());*/
					
						$this->saldo_cuentaLogic->setsaldo_cuentas($this->saldo_cuentas);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idsaldo_cuenta=0;*/
				
				if($saldo_cuenta_session->bitBusquedaDesdeFKSesionFK!=null && $saldo_cuenta_session->bitBusquedaDesdeFKSesionFK==true) {
					if($saldo_cuenta_session->bigIdActualFK!=null && $saldo_cuenta_session->bigIdActualFK!=0)	{
						$this->idsaldo_cuenta=$saldo_cuenta_session->bigIdActualFK;	
					}
					
					$saldo_cuenta_session->bitBusquedaDesdeFKSesionFK=false;
					
					$saldo_cuenta_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idsaldo_cuenta=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idsaldo_cuenta=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->saldo_cuentaLogic->getEntity($this->idsaldo_cuenta);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*saldo_cuentaLogicAdditional::getDetalleIndicePorId($idsaldo_cuenta);*/

				
				if($this->saldo_cuentaLogic->getsaldo_cuenta()!=null) {
					$this->saldo_cuentaLogic->setsaldo_cuentas(array());
					$this->saldo_cuentaLogic->saldo_cuentas[]=$this->saldo_cuentaLogic->getsaldo_cuenta();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcuenta')
			{

				if($saldo_cuenta_session->bigidcuentaActual!=null && $saldo_cuenta_session->bigidcuentaActual!=0)
				{
					$this->id_cuentaFK_Idcuenta=$saldo_cuenta_session->bigidcuentaActual;
					$saldo_cuenta_session->bigidcuentaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->saldo_cuentaLogic->getsFK_Idcuenta($finalQueryPaginacion,$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//saldo_cuentaLogicAdditional::getDetalleIndiceFK_Idcuenta($this->id_cuentaFK_Idcuenta);


					if($this->saldo_cuentaLogic->getsaldo_cuentas()==null || count($this->saldo_cuentaLogic->getsaldo_cuentas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$saldo_cuentas=$this->saldo_cuentaLogic->getsaldo_cuentas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->saldo_cuentaLogic->getsFK_Idcuenta('',$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->saldo_cuentasReporte=$this->saldo_cuentaLogic->getsaldo_cuentas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportesaldo_cuentas("FK_Idcuenta",$this->saldo_cuentaLogic->getsaldo_cuentas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->saldo_cuentaLogic->setsaldo_cuentas($saldo_cuentas);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idejercicio')
			{

				if($saldo_cuenta_session->bigidejercicioActual!=null && $saldo_cuenta_session->bigidejercicioActual!=0)
				{
					$this->id_ejercicioFK_Idejercicio=$saldo_cuenta_session->bigidejercicioActual;
					$saldo_cuenta_session->bigidejercicioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->saldo_cuentaLogic->getsFK_Idejercicio($finalQueryPaginacion,$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//saldo_cuentaLogicAdditional::getDetalleIndiceFK_Idejercicio($this->id_ejercicioFK_Idejercicio);


					if($this->saldo_cuentaLogic->getsaldo_cuentas()==null || count($this->saldo_cuentaLogic->getsaldo_cuentas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$saldo_cuentas=$this->saldo_cuentaLogic->getsaldo_cuentas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->saldo_cuentaLogic->getsFK_Idejercicio('',$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->saldo_cuentasReporte=$this->saldo_cuentaLogic->getsaldo_cuentas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportesaldo_cuentas("FK_Idejercicio",$this->saldo_cuentaLogic->getsaldo_cuentas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->saldo_cuentaLogic->setsaldo_cuentas($saldo_cuentas);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($saldo_cuenta_session->bigidempresaActual!=null && $saldo_cuenta_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$saldo_cuenta_session->bigidempresaActual;
					$saldo_cuenta_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->saldo_cuentaLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//saldo_cuentaLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->saldo_cuentaLogic->getsaldo_cuentas()==null || count($this->saldo_cuentaLogic->getsaldo_cuentas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$saldo_cuentas=$this->saldo_cuentaLogic->getsaldo_cuentas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->saldo_cuentaLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->saldo_cuentasReporte=$this->saldo_cuentaLogic->getsaldo_cuentas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportesaldo_cuentas("FK_Idempresa",$this->saldo_cuentaLogic->getsaldo_cuentas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->saldo_cuentaLogic->setsaldo_cuentas($saldo_cuentas);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperiodo')
			{

				if($saldo_cuenta_session->bigidperiodoActual!=null && $saldo_cuenta_session->bigidperiodoActual!=0)
				{
					$this->id_periodoFK_Idperiodo=$saldo_cuenta_session->bigidperiodoActual;
					$saldo_cuenta_session->bigidperiodoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->saldo_cuentaLogic->getsFK_Idperiodo($finalQueryPaginacion,$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//saldo_cuentaLogicAdditional::getDetalleIndiceFK_Idperiodo($this->id_periodoFK_Idperiodo);


					if($this->saldo_cuentaLogic->getsaldo_cuentas()==null || count($this->saldo_cuentaLogic->getsaldo_cuentas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$saldo_cuentas=$this->saldo_cuentaLogic->getsaldo_cuentas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->saldo_cuentaLogic->getsFK_Idperiodo('',$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->saldo_cuentasReporte=$this->saldo_cuentaLogic->getsaldo_cuentas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportesaldo_cuentas("FK_Idperiodo",$this->saldo_cuentaLogic->getsaldo_cuentas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->saldo_cuentaLogic->setsaldo_cuentas($saldo_cuentas);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_cuenta')
			{

				if($saldo_cuenta_session->bigidtipo_cuentaActual!=null && $saldo_cuenta_session->bigidtipo_cuentaActual!=0)
				{
					$this->id_tipo_cuentaFK_Idtipo_cuenta=$saldo_cuenta_session->bigidtipo_cuentaActual;
					$saldo_cuenta_session->bigidtipo_cuentaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->saldo_cuentaLogic->getsFK_Idtipo_cuenta($finalQueryPaginacion,$this->pagination,$this->id_tipo_cuentaFK_Idtipo_cuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//saldo_cuentaLogicAdditional::getDetalleIndiceFK_Idtipo_cuenta($this->id_tipo_cuentaFK_Idtipo_cuenta);


					if($this->saldo_cuentaLogic->getsaldo_cuentas()==null || count($this->saldo_cuentaLogic->getsaldo_cuentas())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$saldo_cuentas=$this->saldo_cuentaLogic->getsaldo_cuentas();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->saldo_cuentaLogic->getsFK_Idtipo_cuenta('',$this->pagination,$this->id_tipo_cuentaFK_Idtipo_cuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->saldo_cuentasReporte=$this->saldo_cuentaLogic->getsaldo_cuentas();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportesaldo_cuentas("FK_Idtipo_cuenta",$this->saldo_cuentaLogic->getsaldo_cuentas());

					if($this->strTipoPaginacion=='TODOS') {
						$this->saldo_cuentaLogic->setsaldo_cuentas($saldo_cuentas);
					}
				//}

			} 
		
		$saldo_cuenta_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$saldo_cuenta_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->saldo_cuentaLogic->loadForeignsKeysDescription();*/
		
		$this->saldo_cuentas=$this->saldo_cuentaLogic->getsaldo_cuentas();
		
		if($this->saldo_cuentasEliminados==null) {
			$this->saldo_cuentasEliminados=array();
		}
		
		$this->Session->write(saldo_cuenta_util::$STR_SESSION_NAME.'Lista',serialize($this->saldo_cuentas));
		$this->Session->write(saldo_cuenta_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->saldo_cuentasEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(saldo_cuenta_util::$STR_SESSION_NAME,serialize($saldo_cuenta_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idsaldo_cuenta=$idGeneral;
			
			$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
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
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}

			if(count($this->saldo_cuentas) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
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
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuentaFK_Idcuenta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta','cmbid_cuenta');

			$this->strAccionBusqueda='FK_Idcuenta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
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
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ejercicioFK_Idejercicio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idejercicio','cmbid_ejercicio');

			$this->strAccionBusqueda='FK_Idejercicio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
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
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
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
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_periodoFK_Idperiodo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperiodo','cmbid_periodo');

			$this->strAccionBusqueda='FK_Idperiodo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_cuentaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_cuentaFK_Idtipo_cuenta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_cuenta','cmbid_tipo_cuenta');

			$this->strAccionBusqueda='FK_Idtipo_cuenta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcuenta($strFinalQuery,$id_cuenta)
	{
		try
		{

			$this->saldo_cuentaLogic->getsFK_Idcuenta($strFinalQuery,new Pagination(),$id_cuenta);
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

			$this->saldo_cuentaLogic->getsFK_Idejercicio($strFinalQuery,new Pagination(),$id_ejercicio);
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

			$this->saldo_cuentaLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
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

			$this->saldo_cuentaLogic->getsFK_Idperiodo($strFinalQuery,new Pagination(),$id_periodo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_cuenta($strFinalQuery,$id_tipo_cuenta)
	{
		try
		{

			$this->saldo_cuentaLogic->getsFK_Idtipo_cuenta($strFinalQuery,new Pagination(),$id_tipo_cuenta);
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
			
			
			$saldo_cuentaForeignKey=new saldo_cuenta_param_return(); //saldo_cuentaForeignKey();
			
			$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));
						
			if($saldo_cuenta_session==null) {
				$saldo_cuenta_session=new saldo_cuenta_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$saldo_cuentaForeignKey=$this->saldo_cuentaLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$saldo_cuenta_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$saldo_cuentaForeignKey->empresasFK;
				$this->idempresaDefaultFK=$saldo_cuentaForeignKey->idempresaDefaultFK;
			}

			if($saldo_cuenta_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$this->strRecargarFkTipos,',')) {
				$this->ejerciciosFK=$saldo_cuentaForeignKey->ejerciciosFK;
				$this->idejercicioDefaultFK=$saldo_cuentaForeignKey->idejercicioDefaultFK;
			}

			if($saldo_cuenta_session->bitBusquedaDesdeFKSesionejercicio) {
				$this->setVisibleBusquedasParaejercicio(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$this->strRecargarFkTipos,',')) {
				$this->periodosFK=$saldo_cuentaForeignKey->periodosFK;
				$this->idperiodoDefaultFK=$saldo_cuentaForeignKey->idperiodoDefaultFK;
			}

			if($saldo_cuenta_session->bitBusquedaDesdeFKSesionperiodo) {
				$this->setVisibleBusquedasParaperiodo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_cuenta',$this->strRecargarFkTipos,',')) {
				$this->tipo_cuentasFK=$saldo_cuentaForeignKey->tipo_cuentasFK;
				$this->idtipo_cuentaDefaultFK=$saldo_cuentaForeignKey->idtipo_cuentaDefaultFK;
			}

			if($saldo_cuenta_session->bitBusquedaDesdeFKSesiontipo_cuenta) {
				$this->setVisibleBusquedasParatipo_cuenta(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$this->strRecargarFkTipos,',')) {
				$this->cuentasFK=$saldo_cuentaForeignKey->cuentasFK;
				$this->idcuentaDefaultFK=$saldo_cuentaForeignKey->idcuentaDefaultFK;
			}

			if($saldo_cuenta_session->bitBusquedaDesdeFKSesioncuenta) {
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
	
	function cargarCombosFKFromReturnGeneral($saldo_cuentaReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$saldo_cuentaReturnGeneral->strRecargarFkTipos;
			
			


			if($saldo_cuentaReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$saldo_cuentaReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$saldo_cuentaReturnGeneral->idempresaDefaultFK;
			}


			if($saldo_cuentaReturnGeneral->con_ejerciciosFK==true) {
				$this->ejerciciosFK=$saldo_cuentaReturnGeneral->ejerciciosFK;
				$this->idejercicioDefaultFK=$saldo_cuentaReturnGeneral->idejercicioDefaultFK;
			}


			if($saldo_cuentaReturnGeneral->con_periodosFK==true) {
				$this->periodosFK=$saldo_cuentaReturnGeneral->periodosFK;
				$this->idperiodoDefaultFK=$saldo_cuentaReturnGeneral->idperiodoDefaultFK;
			}


			if($saldo_cuentaReturnGeneral->con_tipo_cuentasFK==true) {
				$this->tipo_cuentasFK=$saldo_cuentaReturnGeneral->tipo_cuentasFK;
				$this->idtipo_cuentaDefaultFK=$saldo_cuentaReturnGeneral->idtipo_cuentaDefaultFK;
			}


			if($saldo_cuentaReturnGeneral->con_cuentasFK==true) {
				$this->cuentasFK=$saldo_cuentaReturnGeneral->cuentasFK;
				$this->idcuentaDefaultFK=$saldo_cuentaReturnGeneral->idcuentaDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(saldo_cuenta_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));
		
		if($saldo_cuenta_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($saldo_cuenta_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($saldo_cuenta_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ejercicio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ejercicio';
			}
			else if($saldo_cuenta_session->getstrNombrePaginaNavegacionHaciaFKDesde()==periodo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='periodo';
			}
			else if($saldo_cuenta_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_cuenta';
			}
			else if($saldo_cuenta_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			
			$saldo_cuenta_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}						
			
			$this->saldo_cuentasAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->saldo_cuentasAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->saldo_cuentasAuxiliar=array();
			}
			
			if(count($this->saldo_cuentasAuxiliar) > 0) {
				
				foreach ($this->saldo_cuentasAuxiliar as $saldo_cuentaSeleccionado) {
					$this->eliminarTablaBase($saldo_cuentaSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
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


	public function gettipo_cuentasFKListSelectItem() 
	{
		$tipo_cuentasList=array();

		$item=null;

		foreach($this->tipo_cuentasFK as $tipo_cuenta)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_cuenta->getnombre());
			$item->setValue($tipo_cuenta->getId());
			$tipo_cuentasList[]=$item;
		}

		return $tipo_cuentasList;
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
				$this->saldo_cuentaLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
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
				$this->saldo_cuentaLogic->commitNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->rollbackNewConnexionToDeep();
				$this->saldo_cuentaLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$saldo_cuentasNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->saldo_cuentas as $saldo_cuentaLocal) {
				if($saldo_cuentaLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->saldo_cuenta=new saldo_cuenta();
				
				$this->saldo_cuenta->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->saldo_cuentas[]=$this->saldo_cuenta;*/
				
				$saldo_cuentasNuevos[]=$this->saldo_cuenta;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('ejercicio');$classes[]=$class;
				$class=new Classe('periodo');$classes[]=$class;
				$class=new Classe('tipo_cuenta');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->saldo_cuentaLogic->setsaldo_cuentas($saldo_cuentasNuevos);
					
				$this->saldo_cuentaLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($saldo_cuentasNuevos as $saldo_cuentaNuevo) {
					$this->saldo_cuentas[]=$saldo_cuentaNuevo;
				}
				
				/*$this->saldo_cuentas[]=$saldo_cuentasNuevos;*/
				
				$this->saldo_cuentaLogic->setsaldo_cuentas($this->saldo_cuentas);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($saldo_cuentasNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));

		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();
		}
		
		if($saldo_cuenta_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($saldo_cuenta_session->bigidempresaActual!=null && $saldo_cuenta_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($saldo_cuenta_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=saldo_cuenta_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
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

		$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));

		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();
		}
		
		if($saldo_cuenta_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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


			if($saldo_cuenta_session->bigidejercicioActual!=null && $saldo_cuenta_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($saldo_cuenta_session->bigidejercicioActual);//WithConnection

				$this->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=saldo_cuenta_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
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

		$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));

		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();
		}
		
		if($saldo_cuenta_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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


			if($saldo_cuenta_session->bigidperiodoActual!=null && $saldo_cuenta_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($saldo_cuenta_session->bigidperiodoActual);//WithConnection

				$this->periodosFK[$periodoLogic->getperiodo()->getId()]=saldo_cuenta_util::getperiodoDescripcion($periodoLogic->getperiodo());
				$this->idperiodoDefaultFK=$periodoLogic->getperiodo()->getId();
			}
		}
	}

	public function cargarCombostipo_cuentasFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_cuentaLogic= new tipo_cuenta_logic();
		$pagination= new Pagination();
		$this->tipo_cuentasFK=array();

		$tipo_cuentaLogic->setConnexion($connexion);
		$tipo_cuentaLogic->gettipo_cuentaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));

		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();
		}
		
		if($saldo_cuenta_session->bitBusquedaDesdeFKSesiontipo_cuenta!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_cuenta_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_cuenta=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_cuenta=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_cuenta, '');
				$finalQueryGlobaltipo_cuenta.=tipo_cuenta_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_cuenta.$strRecargarFkQuery;		

				$tipo_cuentaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_cuentasFK($tipo_cuentaLogic->gettipo_cuentas());

		} else {
			$this->setVisibleBusquedasParatipo_cuenta(true);


			if($saldo_cuenta_session->bigidtipo_cuentaActual!=null && $saldo_cuenta_session->bigidtipo_cuentaActual > 0) {
				$tipo_cuentaLogic->getEntity($saldo_cuenta_session->bigidtipo_cuentaActual);//WithConnection

				$this->tipo_cuentasFK[$tipo_cuentaLogic->gettipo_cuenta()->getId()]=saldo_cuenta_util::gettipo_cuentaDescripcion($tipo_cuentaLogic->gettipo_cuenta());
				$this->idtipo_cuentaDefaultFK=$tipo_cuentaLogic->gettipo_cuenta()->getId();
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

		$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));

		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();
		}
		
		if($saldo_cuenta_session->bitBusquedaDesdeFKSesioncuenta!=true) {
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


			if($saldo_cuenta_session->bigidcuentaActual!=null && $saldo_cuenta_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($saldo_cuenta_session->bigidcuentaActual);//WithConnection

				$this->cuentasFK[$cuentaLogic->getcuenta()->getId()]=saldo_cuenta_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$this->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=saldo_cuenta_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombosejerciciosFK($ejercicios){

		foreach ($ejercicios as $ejercicioLocal ) {
			if($this->idejercicioDefaultFK==0) {
				$this->idejercicioDefaultFK=$ejercicioLocal->getId();
			}

			$this->ejerciciosFK[$ejercicioLocal->getId()]=saldo_cuenta_util::getejercicioDescripcion($ejercicioLocal);
		}
	}

	public function prepararCombosperiodosFK($periodos){

		foreach ($periodos as $periodoLocal ) {
			if($this->idperiodoDefaultFK==0) {
				$this->idperiodoDefaultFK=$periodoLocal->getId();
			}

			$this->periodosFK[$periodoLocal->getId()]=saldo_cuenta_util::getperiodoDescripcion($periodoLocal);
		}
	}

	public function prepararCombostipo_cuentasFK($tipo_cuentas){

		foreach ($tipo_cuentas as $tipo_cuentaLocal ) {
			if($this->idtipo_cuentaDefaultFK==0) {
				$this->idtipo_cuentaDefaultFK=$tipo_cuentaLocal->getId();
			}

			$this->tipo_cuentasFK[$tipo_cuentaLocal->getId()]=saldo_cuenta_util::gettipo_cuentaDescripcion($tipo_cuentaLocal);
		}
	}

	public function prepararComboscuentasFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuentaDefaultFK==0) {
				$this->idcuentaDefaultFK=$cuentaLocal->getId();
			}

			$this->cuentasFK[$cuentaLocal->getId()]=saldo_cuenta_util::getcuentaDescripcion($cuentaLocal);
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

			$strDescripcionempresa=saldo_cuenta_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
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

			$strDescripcionejercicio=saldo_cuenta_util::getejercicioDescripcion($ejercicioLogic->getejercicio());

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

			$strDescripcionperiodo=saldo_cuenta_util::getperiodoDescripcion($periodoLogic->getperiodo());

		} else {
			$strDescripcionperiodo='null';
		}

		return $strDescripcionperiodo;
	}

	public function cargarDescripciontipo_cuentaFK($idtipo_cuenta,$connexion=null){
		$tipo_cuentaLogic= new tipo_cuenta_logic();
		$tipo_cuentaLogic->setConnexion($connexion);
		$tipo_cuentaLogic->gettipo_cuentaDataAccess()->isForFKData=true;
		$strDescripciontipo_cuenta='';

		if($idtipo_cuenta!=null && $idtipo_cuenta!='' && $idtipo_cuenta!='null') {
			if($connexion!=null) {
				$tipo_cuentaLogic->getEntity($idtipo_cuenta);//WithConnection
			} else {
				$tipo_cuentaLogic->getEntityWithConnection($idtipo_cuenta);//
			}

			$strDescripciontipo_cuenta=saldo_cuenta_util::gettipo_cuentaDescripcion($tipo_cuentaLogic->gettipo_cuenta());

		} else {
			$strDescripciontipo_cuenta='null';
		}

		return $strDescripciontipo_cuenta;
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

			$strDescripcioncuenta=saldo_cuenta_util::getcuentaDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(saldo_cuenta $saldo_cuentaClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$saldo_cuentaClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
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
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtipo_cuenta=$strParaVisibleNegacionempresa;
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

		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idejercicio=$strParaVisibleejercicio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idtipo_cuenta=$strParaVisibleNegacionejercicio;
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

		$this->strVisibleFK_Idcuenta=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idperiodo=$strParaVisibleperiodo;
		$this->strVisibleFK_Idtipo_cuenta=$strParaVisibleNegacionperiodo;
	}

	public function setVisibleBusquedasParatipo_cuenta($isParatipo_cuenta){
		$strParaVisibletipo_cuenta='display:table-row';
		$strParaVisibleNegaciontipo_cuenta='display:none';

		if($isParatipo_cuenta) {
			$strParaVisibletipo_cuenta='display:table-row';
			$strParaVisibleNegaciontipo_cuenta='display:none';
		} else {
			$strParaVisibletipo_cuenta='display:none';
			$strParaVisibleNegaciontipo_cuenta='display:table-row';
		}


		$strParaVisibleNegaciontipo_cuenta=trim($strParaVisibleNegaciontipo_cuenta);

		$this->strVisibleFK_Idcuenta=$strParaVisibleNegaciontipo_cuenta;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegaciontipo_cuenta;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_cuenta;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegaciontipo_cuenta;
		$this->strVisibleFK_Idtipo_cuenta=$strParaVisibletipo_cuenta;
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
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncuenta;
		$this->strVisibleFK_Idtipo_cuenta=$strParaVisibleNegacioncuenta;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idsaldo_cuentaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idsaldo_cuentaActual=$idsaldo_cuentaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.saldo_cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.saldo_cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarsaldo_cuenta,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaejercicio() {//$idsaldo_cuentaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idsaldo_cuentaActual=$idsaldo_cuentaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ejercicio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.saldo_cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ejercicio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.saldo_cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ejercicio_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarsaldo_cuenta,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaperiodo() {//$idsaldo_cuentaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idsaldo_cuentaActual=$idsaldo_cuentaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.periodo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.saldo_cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',periodo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.saldo_cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(periodo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarsaldo_cuenta,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_cuenta() {//$idsaldo_cuentaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idsaldo_cuentaActual=$idsaldo_cuentaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.saldo_cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_cuenta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.saldo_cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_cuenta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarsaldo_cuenta,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta() {//$idsaldo_cuentaActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idsaldo_cuentaActual=$idsaldo_cuentaActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.saldo_cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.saldo_cuentaJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarsaldo_cuenta,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(saldo_cuenta_util::$STR_SESSION_NAME,saldo_cuenta_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$saldo_cuenta_session=$this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME);
				
		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();		
			//$this->Session->write('saldo_cuenta_session',$saldo_cuenta_session);							
		}
		*/
		
		$saldo_cuenta_session=new saldo_cuenta_session();
    	$saldo_cuenta_session->strPathNavegacionActual=saldo_cuenta_util::$STR_CLASS_WEB_TITULO;
    	$saldo_cuenta_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(saldo_cuenta_util::$STR_SESSION_NAME,serialize($saldo_cuenta_session));		
	}	
	
	public function getSetBusquedasSesionConfig(saldo_cuenta_session $saldo_cuenta_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($saldo_cuenta_session->bitBusquedaDesdeFKSesionFK!=null && $saldo_cuenta_session->bitBusquedaDesdeFKSesionFK==true) {
			if($saldo_cuenta_session->bigIdActualFK!=null && $saldo_cuenta_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$saldo_cuenta_session->bigIdActualFKParaPosibleAtras=$saldo_cuenta_session->bigIdActualFK;*/
			}
				
			$saldo_cuenta_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$saldo_cuenta_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(saldo_cuenta_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($saldo_cuenta_session->bitBusquedaDesdeFKSesionempresa!=null && $saldo_cuenta_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($saldo_cuenta_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(saldo_cuenta_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(saldo_cuenta_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(saldo_cuenta_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($saldo_cuenta_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($saldo_cuenta_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=saldo_cuenta_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$saldo_cuenta_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$saldo_cuenta_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;

				if($saldo_cuenta_session->intNumeroPaginacion==saldo_cuenta_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$saldo_cuenta_session->intNumeroPaginacion;
				}
			}
			else if($saldo_cuenta_session->bitBusquedaDesdeFKSesionejercicio!=null && $saldo_cuenta_session->bitBusquedaDesdeFKSesionejercicio==true)
			{
				if($saldo_cuenta_session->bigidejercicioActual!=0) {
					$this->strAccionBusqueda='FK_Idejercicio';

					$existe_history=HistoryWeb::ExisteElemento(saldo_cuenta_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(saldo_cuenta_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(saldo_cuenta_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($saldo_cuenta_session->bigidejercicioActualDescripcion);
						$historyWeb->setIdActual($saldo_cuenta_session->bigidejercicioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=saldo_cuenta_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$saldo_cuenta_session->bigidejercicioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$saldo_cuenta_session->bitBusquedaDesdeFKSesionejercicio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;

				if($saldo_cuenta_session->intNumeroPaginacion==saldo_cuenta_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$saldo_cuenta_session->intNumeroPaginacion;
				}
			}
			else if($saldo_cuenta_session->bitBusquedaDesdeFKSesionperiodo!=null && $saldo_cuenta_session->bitBusquedaDesdeFKSesionperiodo==true)
			{
				if($saldo_cuenta_session->bigidperiodoActual!=0) {
					$this->strAccionBusqueda='FK_Idperiodo';

					$existe_history=HistoryWeb::ExisteElemento(saldo_cuenta_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(saldo_cuenta_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(saldo_cuenta_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($saldo_cuenta_session->bigidperiodoActualDescripcion);
						$historyWeb->setIdActual($saldo_cuenta_session->bigidperiodoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=saldo_cuenta_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$saldo_cuenta_session->bigidperiodoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$saldo_cuenta_session->bitBusquedaDesdeFKSesionperiodo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;

				if($saldo_cuenta_session->intNumeroPaginacion==saldo_cuenta_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$saldo_cuenta_session->intNumeroPaginacion;
				}
			}
			else if($saldo_cuenta_session->bitBusquedaDesdeFKSesiontipo_cuenta!=null && $saldo_cuenta_session->bitBusquedaDesdeFKSesiontipo_cuenta==true)
			{
				if($saldo_cuenta_session->bigidtipo_cuentaActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_cuenta';

					$existe_history=HistoryWeb::ExisteElemento(saldo_cuenta_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(saldo_cuenta_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(saldo_cuenta_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($saldo_cuenta_session->bigidtipo_cuentaActualDescripcion);
						$historyWeb->setIdActual($saldo_cuenta_session->bigidtipo_cuentaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=saldo_cuenta_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$saldo_cuenta_session->bigidtipo_cuentaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$saldo_cuenta_session->bitBusquedaDesdeFKSesiontipo_cuenta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;

				if($saldo_cuenta_session->intNumeroPaginacion==saldo_cuenta_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$saldo_cuenta_session->intNumeroPaginacion;
				}
			}
			else if($saldo_cuenta_session->bitBusquedaDesdeFKSesioncuenta!=null && $saldo_cuenta_session->bitBusquedaDesdeFKSesioncuenta==true)
			{
				if($saldo_cuenta_session->bigidcuentaActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta';

					$existe_history=HistoryWeb::ExisteElemento(saldo_cuenta_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(saldo_cuenta_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(saldo_cuenta_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($saldo_cuenta_session->bigidcuentaActualDescripcion);
						$historyWeb->setIdActual($saldo_cuenta_session->bigidcuentaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=saldo_cuenta_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$saldo_cuenta_session->bigidcuentaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$saldo_cuenta_session->bitBusquedaDesdeFKSesioncuenta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;

				if($saldo_cuenta_session->intNumeroPaginacion==saldo_cuenta_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=saldo_cuenta_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$saldo_cuenta_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$saldo_cuenta_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));
		
		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=new saldo_cuenta_session();
		}
		
		$saldo_cuenta_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$saldo_cuenta_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$saldo_cuenta_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcuenta') {
			$saldo_cuenta_session->id_cuenta=$this->id_cuentaFK_Idcuenta;	

		}
		else if($this->strAccionBusqueda=='FK_Idejercicio') {
			$saldo_cuenta_session->id_ejercicio=$this->id_ejercicioFK_Idejercicio;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$saldo_cuenta_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idperiodo') {
			$saldo_cuenta_session->id_periodo=$this->id_periodoFK_Idperiodo;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_cuenta') {
			$saldo_cuenta_session->id_tipo_cuenta=$this->id_tipo_cuentaFK_Idtipo_cuenta;	

		}
		
		$this->Session->write(saldo_cuenta_util::$STR_SESSION_NAME,serialize($saldo_cuenta_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(saldo_cuenta_session $saldo_cuenta_session) {
		
		if($saldo_cuenta_session==null) {
			$saldo_cuenta_session=unserialize($this->Session->read(saldo_cuenta_util::$STR_SESSION_NAME));
		}
		
		if($saldo_cuenta_session==null) {
		   $saldo_cuenta_session=new saldo_cuenta_session();
		}
		
		if($saldo_cuenta_session->strUltimaBusqueda!=null && $saldo_cuenta_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$saldo_cuenta_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$saldo_cuenta_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$saldo_cuenta_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcuenta') {
				$this->id_cuentaFK_Idcuenta=$saldo_cuenta_session->id_cuenta;
				$saldo_cuenta_session->id_cuenta=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idejercicio') {
				$this->id_ejercicioFK_Idejercicio=$saldo_cuenta_session->id_ejercicio;
				$saldo_cuenta_session->id_ejercicio=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$saldo_cuenta_session->id_empresa;
				$saldo_cuenta_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idperiodo') {
				$this->id_periodoFK_Idperiodo=$saldo_cuenta_session->id_periodo;
				$saldo_cuenta_session->id_periodo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_cuenta') {
				$this->id_tipo_cuentaFK_Idtipo_cuenta=$saldo_cuenta_session->id_tipo_cuenta;
				$saldo_cuenta_session->id_tipo_cuenta=-1;

			}
		}
		
		$saldo_cuenta_session->strUltimaBusqueda='';
		//$saldo_cuenta_session->intNumeroPaginacion=10;
		$saldo_cuenta_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(saldo_cuenta_util::$STR_SESSION_NAME,serialize($saldo_cuenta_session));		
	}
	
	public function saldo_cuentasControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idejercicioDefaultFK = 0;
		$this->idperiodoDefaultFK = 0;
		$this->idtipo_cuentaDefaultFK = 0;
		$this->idcuentaDefaultFK = 0;
	}
	
	public function setsaldo_cuentaFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_ejercicio',$this->idejercicioDefaultFK);
		$this->setExistDataCampoForm('form','id_periodo',$this->idperiodoDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_cuenta',$this->idtipo_cuentaDefaultFK);
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

		ejercicio::$class;
		ejercicio_carga::$CONTROLLER;

		periodo::$class;
		periodo_carga::$CONTROLLER;

		tipo_cuenta::$class;
		tipo_cuenta_carga::$CONTROLLER;

		cuenta::$class;
		cuenta_carga::$CONTROLLER;
		
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
		interface saldo_cuenta_controlI {	
		
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
		
		public function onLoad(saldo_cuenta_session $saldo_cuenta_session=null);	
		function index(?string $strTypeOnLoadsaldo_cuenta='',?string $strTipoPaginaAuxiliarsaldo_cuenta='',?string $strTipoUsuarioAuxiliarsaldo_cuenta='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadsaldo_cuenta='',string $strTipoPaginaAuxiliarsaldo_cuenta='',string $strTipoUsuarioAuxiliarsaldo_cuenta='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($saldo_cuentaReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(saldo_cuenta $saldo_cuentaClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(saldo_cuenta_session $saldo_cuenta_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(saldo_cuenta_session $saldo_cuenta_session);	
		public function saldo_cuentasControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setsaldo_cuentaFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
