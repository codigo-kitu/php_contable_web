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

namespace com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\entity\pago_cuenta_pagar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/pago_cuenta_pagar/util/pago_cuenta_pagar_carga.php');
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_carga;

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_param_return;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\logic\pago_cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\business\logic\pago_cuenta_pagar_logic_add;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\presentation\session\pago_cuenta_pagar_session;


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

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\entity\cuenta_pagar;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\business\logic\cuenta_pagar_logic;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity\forma_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\logic\forma_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
pago_cuenta_pagar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
pago_cuenta_pagar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
pago_cuenta_pagar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
pago_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*pago_cuenta_pagar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentaspagar/pago_cuenta_pagar/presentation/control/pago_cuenta_pagar_init_control.php');
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\presentation\control\pago_cuenta_pagar_init_control;

include_once('com/bydan/contabilidad/cuentaspagar/pago_cuenta_pagar/presentation/control/pago_cuenta_pagar_base_control.php');
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\presentation\control\pago_cuenta_pagar_base_control;

class pago_cuenta_pagar_control extends pago_cuenta_pagar_base_control {	
	
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
			
			
			else if($action=="FK_Idcuenta_pagar"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcuenta_pagarParaProcesar();
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
			else if($action=="FK_Idforma_pago_proveedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idforma_pago_proveedorParaProcesar();
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
				//$idpago_cuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idpago_cuenta_pagarActual
			}
			else if($action=='abrirBusquedaParasucursal') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idpago_cuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParasucursal();//$idpago_cuenta_pagarActual
			}
			else if($action=='abrirBusquedaParaejercicio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idpago_cuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParaejercicio();//$idpago_cuenta_pagarActual
			}
			else if($action=='abrirBusquedaParaperiodo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idpago_cuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParaperiodo();//$idpago_cuenta_pagarActual
			}
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idpago_cuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$idpago_cuenta_pagarActual
			}
			else if($action=='abrirBusquedaParacuenta_pagar') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idpago_cuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParacuenta_pagar();//$idpago_cuenta_pagarActual
			}
			else if($action=='abrirBusquedaParaforma_pago_proveedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idpago_cuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParaforma_pago_proveedor();//$idpago_cuenta_pagarActual
			}
			else if($action=='abrirBusquedaParaestado') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idpago_cuenta_pagarActual=$this->getDataId();
				$this->abrirBusquedaParaestado();//$idpago_cuenta_pagarActual
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
					
					$pago_cuenta_pagarController = new pago_cuenta_pagar_control();
					
					$pago_cuenta_pagarController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($pago_cuenta_pagarController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$pago_cuenta_pagarController = new pago_cuenta_pagar_control();
						$pago_cuenta_pagarController = $this;
						
						$jsonResponse = json_encode($pago_cuenta_pagarController->pago_cuenta_pagars);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->pago_cuenta_pagarReturnGeneral==null) {
					$this->pago_cuenta_pagarReturnGeneral=new pago_cuenta_pagar_param_return();
				}
				
				echo($this->pago_cuenta_pagarReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$pago_cuenta_pagarController=new pago_cuenta_pagar_control();
		
		$pago_cuenta_pagarController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$pago_cuenta_pagarController->usuarioActual=new usuario();
		
		$pago_cuenta_pagarController->usuarioActual->setId($this->usuarioActual->getId());
		$pago_cuenta_pagarController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$pago_cuenta_pagarController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$pago_cuenta_pagarController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$pago_cuenta_pagarController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$pago_cuenta_pagarController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$pago_cuenta_pagarController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$pago_cuenta_pagarController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $pago_cuenta_pagarController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadpago_cuenta_pagar= $this->getDataGeneralString('strTypeOnLoadpago_cuenta_pagar');
		$strTipoPaginaAuxiliarpago_cuenta_pagar= $this->getDataGeneralString('strTipoPaginaAuxiliarpago_cuenta_pagar');
		$strTipoUsuarioAuxiliarpago_cuenta_pagar= $this->getDataGeneralString('strTipoUsuarioAuxiliarpago_cuenta_pagar');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadpago_cuenta_pagar,$strTipoPaginaAuxiliarpago_cuenta_pagar,$strTipoUsuarioAuxiliarpago_cuenta_pagar,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadpago_cuenta_pagar!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('pago_cuenta_pagar','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(pago_cuenta_pagar_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarpago_cuenta_pagar,$this->strTipoUsuarioAuxiliarpago_cuenta_pagar,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(pago_cuenta_pagar_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarpago_cuenta_pagar,$this->strTipoUsuarioAuxiliarpago_cuenta_pagar,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->pago_cuenta_pagarReturnGeneral=new pago_cuenta_pagar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->pago_cuenta_pagarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->pago_cuenta_pagarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->pago_cuenta_pagarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->pago_cuenta_pagarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->pago_cuenta_pagarReturnGeneral);
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
		$this->pago_cuenta_pagarReturnGeneral=new pago_cuenta_pagar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->pago_cuenta_pagarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->pago_cuenta_pagarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->pago_cuenta_pagarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->pago_cuenta_pagarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->pago_cuenta_pagarReturnGeneral);
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
		$this->pago_cuenta_pagarReturnGeneral=new pago_cuenta_pagar_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->pago_cuenta_pagarReturnGeneral->conGuardarReturnSessionJs=true;
		$this->pago_cuenta_pagarReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->pago_cuenta_pagarReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->pago_cuenta_pagarReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->pago_cuenta_pagarReturnGeneral);
	}
	
	
	public function recargarReferenciasAction() {
		try {
						
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
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
			
			
			$this->pago_cuenta_pagarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->pago_cuenta_pagarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->pago_cuenta_pagarReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->pago_cuenta_pagarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->pago_cuenta_pagarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->pago_cuenta_pagarReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->pago_cuenta_pagarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->pago_cuenta_pagarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->pago_cuenta_pagarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->pago_cuenta_pagarReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->pago_cuenta_pagarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->pago_cuenta_pagarReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->pago_cuenta_pagarReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->pago_cuenta_pagarReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->pago_cuenta_pagarReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->pago_cuenta_pagarReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->pago_cuenta_pagarReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->pago_cuenta_pagarReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
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
		
		$this->pago_cuenta_pagarLogic=new pago_cuenta_pagar_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->pago_cuenta_pagar=new pago_cuenta_pagar();
		
		$this->strTypeOnLoadpago_cuenta_pagar='onload';
		$this->strTipoPaginaAuxiliarpago_cuenta_pagar='none';
		$this->strTipoUsuarioAuxiliarpago_cuenta_pagar='none';	

		$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
		
		$this->pago_cuenta_pagarModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->pago_cuenta_pagarControllerAdditional=new pago_cuenta_pagar_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(pago_cuenta_pagar_session $pago_cuenta_pagar_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($pago_cuenta_pagar_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadpago_cuenta_pagar='',?string $strTipoPaginaAuxiliarpago_cuenta_pagar='',?string $strTipoUsuarioAuxiliarpago_cuenta_pagar='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadpago_cuenta_pagar=$strTypeOnLoadpago_cuenta_pagar;
			$this->strTipoPaginaAuxiliarpago_cuenta_pagar=$strTipoPaginaAuxiliarpago_cuenta_pagar;
			$this->strTipoUsuarioAuxiliarpago_cuenta_pagar=$strTipoUsuarioAuxiliarpago_cuenta_pagar;
	
			if($strTipoUsuarioAuxiliarpago_cuenta_pagar=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->pago_cuenta_pagar=new pago_cuenta_pagar();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Pago Cuenta Pagars';
			
			
			$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));
							
			if($pago_cuenta_pagar_session==null) {
				$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
				
				/*$this->Session->write('pago_cuenta_pagar_session',$pago_cuenta_pagar_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($pago_cuenta_pagar_session->strFuncionJsPadre!=null && $pago_cuenta_pagar_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$pago_cuenta_pagar_session->strFuncionJsPadre;
				
				$pago_cuenta_pagar_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($pago_cuenta_pagar_session);
			
			if($strTypeOnLoadpago_cuenta_pagar!=null && $strTypeOnLoadpago_cuenta_pagar=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$pago_cuenta_pagar_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$pago_cuenta_pagar_session->setPaginaPopupVariables(true);
				}
				
				if($pago_cuenta_pagar_session->intNumeroPaginacion==pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$pago_cuenta_pagar_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,pago_cuenta_pagar_util::$STR_SESSION_NAME,'cuentaspagar');																
			
			} else if($strTypeOnLoadpago_cuenta_pagar!=null && $strTypeOnLoadpago_cuenta_pagar=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$pago_cuenta_pagar_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;*/
				
				if($pago_cuenta_pagar_session->intNumeroPaginacion==pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$pago_cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarpago_cuenta_pagar!=null && $strTipoPaginaAuxiliarpago_cuenta_pagar=='none') {
				/*$pago_cuenta_pagar_session->strStyleDivHeader='display:table-row';*/
				
				/*$pago_cuenta_pagar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarpago_cuenta_pagar!=null && $strTipoPaginaAuxiliarpago_cuenta_pagar=='iframe') {
					/*
					$pago_cuenta_pagar_session->strStyleDivArbol='display:none';
					$pago_cuenta_pagar_session->strStyleDivHeader='display:none';
					$pago_cuenta_pagar_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$pago_cuenta_pagar_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->pago_cuenta_pagarClase=new pago_cuenta_pagar();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=pago_cuenta_pagar_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(pago_cuenta_pagar_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->pago_cuenta_pagarLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->pago_cuenta_pagarLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->pago_cuenta_pagarLogic=new pago_cuenta_pagar_logic();*/
			
			
			$this->pago_cuenta_pagarsModel=null;
			/*new ListDataModel();*/
			
			/*$this->pago_cuenta_pagarsModel.setWrappedData(pago_cuenta_pagarLogic->getpago_cuenta_pagars());*/
						
			$this->pago_cuenta_pagars= array();
			$this->pago_cuenta_pagarsEliminados=array();
			$this->pago_cuenta_pagarsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= pago_cuenta_pagar_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			/*ORDER BY FIN*/
			
			$this->pago_cuenta_pagar= new pago_cuenta_pagar();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcuenta_pagar='display:table-row';
			$this->strVisibleFK_Idejercicio='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idestado='display:table-row';
			$this->strVisibleFK_Idforma_pago_proveedor='display:table-row';
			$this->strVisibleFK_Idperiodo='display:table-row';
			$this->strVisibleFK_Idsucursal='display:table-row';
			$this->strVisibleFK_Idusuario='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarpago_cuenta_pagar!=null && $strTipoUsuarioAuxiliarpago_cuenta_pagar!='none' && $strTipoUsuarioAuxiliarpago_cuenta_pagar!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarpago_cuenta_pagar);
																
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
				if($strTipoUsuarioAuxiliarpago_cuenta_pagar!=null && $strTipoUsuarioAuxiliarpago_cuenta_pagar!='none' && $strTipoUsuarioAuxiliarpago_cuenta_pagar!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarpago_cuenta_pagar);
																
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
				if($strTipoUsuarioAuxiliarpago_cuenta_pagar==null || $strTipoUsuarioAuxiliarpago_cuenta_pagar=='none' || $strTipoUsuarioAuxiliarpago_cuenta_pagar=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarpago_cuenta_pagar,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, pago_cuenta_pagar_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, pago_cuenta_pagar_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina pago_cuenta_pagar');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($pago_cuenta_pagar_session);
			
			$this->getSetBusquedasSesionConfig($pago_cuenta_pagar_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportepago_cuenta_pagars($this->strAccionBusqueda,$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars());*/
				} else if($this->strGenerarReporte=='Html')	{
					$pago_cuenta_pagar_session->strServletGenerarHtmlReporte='pago_cuenta_pagarServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(pago_cuenta_pagar_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($pago_cuenta_pagar_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarpago_cuenta_pagar!=null && $strTipoUsuarioAuxiliarpago_cuenta_pagar=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($pago_cuenta_pagar_session);
			}
								
			$this->set(pago_cuenta_pagar_util::$STR_SESSION_NAME, $pago_cuenta_pagar_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($pago_cuenta_pagar_session);
			
			/*
			$this->pago_cuenta_pagar->recursive = 0;
			
			$this->pago_cuenta_pagars=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('pago_cuenta_pagars', $this->pago_cuenta_pagars);
			
			$this->set(pago_cuenta_pagar_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->pago_cuenta_pagarActual =$this->pago_cuenta_pagarClase;
			
			/*$this->pago_cuenta_pagarActual =$this->migrarModelpago_cuenta_pagar($this->pago_cuenta_pagarClase);*/
			
			$this->returnHtml(false);
			
			$this->set(pago_cuenta_pagar_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=pago_cuenta_pagar_util::$STR_NOMBRE_OPCION;
				
			if(pago_cuenta_pagar_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=pago_cuenta_pagar_util::$STR_MODULO_OPCION.pago_cuenta_pagar_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(pago_cuenta_pagar_util::$STR_SESSION_NAME,serialize($pago_cuenta_pagar_session));
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
			/*$pago_cuenta_pagarClase= (pago_cuenta_pagar) pago_cuenta_pagarsModel.getRowData();*/
			
			$this->pago_cuenta_pagarClase->setId($this->pago_cuenta_pagar->getId());	
			$this->pago_cuenta_pagarClase->setVersionRow($this->pago_cuenta_pagar->getVersionRow());	
			$this->pago_cuenta_pagarClase->setVersionRow($this->pago_cuenta_pagar->getVersionRow());	
			$this->pago_cuenta_pagarClase->setid_empresa($this->pago_cuenta_pagar->getid_empresa());	
			$this->pago_cuenta_pagarClase->setid_sucursal($this->pago_cuenta_pagar->getid_sucursal());	
			$this->pago_cuenta_pagarClase->setid_ejercicio($this->pago_cuenta_pagar->getid_ejercicio());	
			$this->pago_cuenta_pagarClase->setid_periodo($this->pago_cuenta_pagar->getid_periodo());	
			$this->pago_cuenta_pagarClase->setid_usuario($this->pago_cuenta_pagar->getid_usuario());	
			$this->pago_cuenta_pagarClase->setid_cuenta_pagar($this->pago_cuenta_pagar->getid_cuenta_pagar());	
			$this->pago_cuenta_pagarClase->setid_forma_pago_proveedor($this->pago_cuenta_pagar->getid_forma_pago_proveedor());	
			$this->pago_cuenta_pagarClase->setnumero($this->pago_cuenta_pagar->getnumero());	
			$this->pago_cuenta_pagarClase->setfecha_emision($this->pago_cuenta_pagar->getfecha_emision());	
			$this->pago_cuenta_pagarClase->setfecha_vence($this->pago_cuenta_pagar->getfecha_vence());	
			$this->pago_cuenta_pagarClase->setabono($this->pago_cuenta_pagar->getabono());	
			$this->pago_cuenta_pagarClase->setsaldo($this->pago_cuenta_pagar->getsaldo());	
			$this->pago_cuenta_pagarClase->setdescripcion($this->pago_cuenta_pagar->getdescripcion());	
			$this->pago_cuenta_pagarClase->setid_estado($this->pago_cuenta_pagar->getid_estado());	
			$this->pago_cuenta_pagarClase->setreferencia($this->pago_cuenta_pagar->getreferencia());	
			$this->pago_cuenta_pagarClase->setdebito($this->pago_cuenta_pagar->getdebito());	
			$this->pago_cuenta_pagarClase->setcredito($this->pago_cuenta_pagar->getcredito());	
		
			/*$this->Session->write('pago_cuenta_pagarVersionRowActual', pago_cuenta_pagar.getVersionRow());*/
			
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
			
			$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));
						
			if($pago_cuenta_pagar_session==null) {
				$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('pago_cuenta_pagar', $this->pago_cuenta_pagar->read(null, $id));
	
			
			$this->pago_cuenta_pagar->recursive = 0;
			
			$this->pago_cuenta_pagars=$this->paginate();
			
			$this->set('pago_cuenta_pagars', $this->pago_cuenta_pagars);
	
			if (empty($this->data)) {
				$this->data = $this->pago_cuenta_pagar->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->pago_cuenta_pagarLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->pago_cuenta_pagarClase);
			
			$this->pago_cuenta_pagarActual=$this->pago_cuenta_pagarClase;
			
			/*$this->pago_cuenta_pagarActual =$this->migrarModelpago_cuenta_pagar($this->pago_cuenta_pagarClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars(),$this->pago_cuenta_pagarActual);
			
			$this->actualizarControllerConReturnGeneral($this->pago_cuenta_pagarReturnGeneral);
			
			//$this->pago_cuenta_pagarReturnGeneral=$this->pago_cuenta_pagarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars(),$this->pago_cuenta_pagarActual,$this->pago_cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));
						
			if($pago_cuenta_pagar_session==null) {
				$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevopago_cuenta_pagar', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->pago_cuenta_pagarClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->pago_cuenta_pagarClase);
			
			$this->pago_cuenta_pagarActual =$this->pago_cuenta_pagarClase;
			
			/*$this->pago_cuenta_pagarActual =$this->migrarModelpago_cuenta_pagar($this->pago_cuenta_pagarClase);*/
			
			$this->setpago_cuenta_pagarFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars(),$this->pago_cuenta_pagar);
			
			$this->actualizarControllerConReturnGeneral($this->pago_cuenta_pagarReturnGeneral);
			
			//this->pago_cuenta_pagarReturnGeneral=$this->pago_cuenta_pagarLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars(),$this->pago_cuenta_pagar,$this->pago_cuenta_pagarParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->pago_cuenta_pagarReturnGeneral->getpago_cuenta_pagar()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idsucursalDefaultFK!=null && $this->idsucursalDefaultFK > -1) {
				$this->pago_cuenta_pagarReturnGeneral->getpago_cuenta_pagar()->setid_sucursal($this->idsucursalDefaultFK);
			}

			if($this->idejercicioDefaultFK!=null && $this->idejercicioDefaultFK > -1) {
				$this->pago_cuenta_pagarReturnGeneral->getpago_cuenta_pagar()->setid_ejercicio($this->idejercicioDefaultFK);
			}

			if($this->idperiodoDefaultFK!=null && $this->idperiodoDefaultFK > -1) {
				$this->pago_cuenta_pagarReturnGeneral->getpago_cuenta_pagar()->setid_periodo($this->idperiodoDefaultFK);
			}

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->pago_cuenta_pagarReturnGeneral->getpago_cuenta_pagar()->setid_usuario($this->idusuarioDefaultFK);
			}

			if($this->idcuenta_pagarDefaultFK!=null && $this->idcuenta_pagarDefaultFK > -1) {
				$this->pago_cuenta_pagarReturnGeneral->getpago_cuenta_pagar()->setid_cuenta_pagar($this->idcuenta_pagarDefaultFK);
			}

			if($this->idforma_pago_proveedorDefaultFK!=null && $this->idforma_pago_proveedorDefaultFK > -1) {
				$this->pago_cuenta_pagarReturnGeneral->getpago_cuenta_pagar()->setid_forma_pago_proveedor($this->idforma_pago_proveedorDefaultFK);
			}

			if($this->idestadoDefaultFK!=null && $this->idestadoDefaultFK > -1) {
				$this->pago_cuenta_pagarReturnGeneral->getpago_cuenta_pagar()->setid_estado($this->idestadoDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->pago_cuenta_pagarReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->pago_cuenta_pagarReturnGeneral->getpago_cuenta_pagar(),$this->pago_cuenta_pagarActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeypago_cuenta_pagar($this->pago_cuenta_pagarReturnGeneral->getpago_cuenta_pagar());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariopago_cuenta_pagar($this->pago_cuenta_pagarReturnGeneral->getpago_cuenta_pagar());*/
			}
			
			if($this->pago_cuenta_pagarReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->pago_cuenta_pagarReturnGeneral->getpago_cuenta_pagar(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualpago_cuenta_pagar($this->pago_cuenta_pagar,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->pago_cuenta_pagarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->pago_cuenta_pagarsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->pago_cuenta_pagarsAuxiliar=array();
			}
			
			if(count($this->pago_cuenta_pagarsAuxiliar)==2) {
				$pago_cuenta_pagarOrigen=$this->pago_cuenta_pagarsAuxiliar[0];
				$pago_cuenta_pagarDestino=$this->pago_cuenta_pagarsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($pago_cuenta_pagarOrigen,$pago_cuenta_pagarDestino,true,false,false);
				
				$this->actualizarLista($pago_cuenta_pagarDestino,$this->pago_cuenta_pagars);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->pago_cuenta_pagarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->pago_cuenta_pagarsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->pago_cuenta_pagarsAuxiliar=array();
			}
			
			if(count($this->pago_cuenta_pagarsAuxiliar) > 0) {
				foreach ($this->pago_cuenta_pagarsAuxiliar as $pago_cuenta_pagarSeleccionado) {
					$this->pago_cuenta_pagar=new pago_cuenta_pagar();
					
					$this->setCopiarVariablesObjetos($pago_cuenta_pagarSeleccionado,$this->pago_cuenta_pagar,true,true,false);
						
					$this->pago_cuenta_pagars[]=$this->pago_cuenta_pagar;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->pago_cuenta_pagarsEliminados as $pago_cuenta_pagarEliminado) {
				$this->pago_cuenta_pagarLogic->pago_cuenta_pagars[]=$pago_cuenta_pagarEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->pago_cuenta_pagar=new pago_cuenta_pagar();
							
				$this->pago_cuenta_pagars[]=$this->pago_cuenta_pagar;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
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
		
		$pago_cuenta_pagarActual=new pago_cuenta_pagar();
		
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
				
				$pago_cuenta_pagarActual=$this->pago_cuenta_pagars[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setid_cuenta_pagar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setid_forma_pago_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setabono((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setsaldo((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setid_estado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setreferencia($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setdebito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $pago_cuenta_pagarActual->setcredito((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
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
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadpago_cuenta_pagar='',string $strTipoPaginaAuxiliarpago_cuenta_pagar='',string $strTipoUsuarioAuxiliarpago_cuenta_pagar='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadpago_cuenta_pagar,$strTipoPaginaAuxiliarpago_cuenta_pagar,$strTipoUsuarioAuxiliarpago_cuenta_pagar,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->pago_cuenta_pagars) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=pago_cuenta_pagar_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=pago_cuenta_pagar_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=pago_cuenta_pagar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));
						
			if($pago_cuenta_pagar_session==null) {
				$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
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
					/*$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;*/
					
					if($pago_cuenta_pagar_session->intNumeroPaginacion==pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$pago_cuenta_pagar_session->intNumeroPaginacion;
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
			
			$this->pago_cuenta_pagarsEliminados=array();
			
			/*$this->pago_cuenta_pagarLogic->setConnexion($connexion);*/
			
			$this->pago_cuenta_pagarLogic->setIsConDeep(true);
			
			$this->pago_cuenta_pagarLogic->getpago_cuenta_pagarDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('cuenta_pagar');$classes[]=$class;
			$class=new Classe('forma_pago_proveedor');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
			
			$this->pago_cuenta_pagarLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->pago_cuenta_pagarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars()==null|| count($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->pago_cuenta_pagars=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->pago_cuenta_pagarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->pago_cuenta_pagarsReporte=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();
									
						/*$this->generarReportes('Todos',$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars());*/
					
						$this->pago_cuenta_pagarLogic->setpago_cuenta_pagars($this->pago_cuenta_pagars);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->pago_cuenta_pagarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars()==null|| count($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->pago_cuenta_pagars=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->pago_cuenta_pagarLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->pago_cuenta_pagarsReporte=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();
									
						/*$this->generarReportes('Todos',$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars());*/
					
						$this->pago_cuenta_pagarLogic->setpago_cuenta_pagars($this->pago_cuenta_pagars);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idpago_cuenta_pagar=0;*/
				
				if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionFK!=null && $pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionFK==true) {
					if($pago_cuenta_pagar_session->bigIdActualFK!=null && $pago_cuenta_pagar_session->bigIdActualFK!=0)	{
						$this->idpago_cuenta_pagar=$pago_cuenta_pagar_session->bigIdActualFK;	
					}
					
					$pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionFK=false;
					
					$pago_cuenta_pagar_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idpago_cuenta_pagar=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idpago_cuenta_pagar=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->pago_cuenta_pagarLogic->getEntity($this->idpago_cuenta_pagar);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*pago_cuenta_pagarLogicAdditional::getDetalleIndicePorId($idpago_cuenta_pagar);*/

				
				if($this->pago_cuenta_pagarLogic->getpago_cuenta_pagar()!=null) {
					$this->pago_cuenta_pagarLogic->setpago_cuenta_pagars(array());
					$this->pago_cuenta_pagarLogic->pago_cuenta_pagars[]=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagar();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcuenta_pagar')
			{

				if($pago_cuenta_pagar_session->bigidcuenta_pagarActual!=null && $pago_cuenta_pagar_session->bigidcuenta_pagarActual!=0)
				{
					$this->id_cuenta_pagarFK_Idcuenta_pagar=$pago_cuenta_pagar_session->bigidcuenta_pagarActual;
					$pago_cuenta_pagar_session->bigidcuenta_pagarActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->pago_cuenta_pagarLogic->getsFK_Idcuenta_pagar($finalQueryPaginacion,$this->pagination,$this->id_cuenta_pagarFK_Idcuenta_pagar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//pago_cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idcuenta_pagar($this->id_cuenta_pagarFK_Idcuenta_pagar);


					if($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars()==null || count($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$pago_cuenta_pagars=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->pago_cuenta_pagarLogic->getsFK_Idcuenta_pagar('',$this->pagination,$this->id_cuenta_pagarFK_Idcuenta_pagar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->pago_cuenta_pagarsReporte=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportepago_cuenta_pagars("FK_Idcuenta_pagar",$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->pago_cuenta_pagarLogic->setpago_cuenta_pagars($pago_cuenta_pagars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idejercicio')
			{

				if($pago_cuenta_pagar_session->bigidejercicioActual!=null && $pago_cuenta_pagar_session->bigidejercicioActual!=0)
				{
					$this->id_ejercicioFK_Idejercicio=$pago_cuenta_pagar_session->bigidejercicioActual;
					$pago_cuenta_pagar_session->bigidejercicioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->pago_cuenta_pagarLogic->getsFK_Idejercicio($finalQueryPaginacion,$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//pago_cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idejercicio($this->id_ejercicioFK_Idejercicio);


					if($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars()==null || count($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$pago_cuenta_pagars=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->pago_cuenta_pagarLogic->getsFK_Idejercicio('',$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->pago_cuenta_pagarsReporte=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportepago_cuenta_pagars("FK_Idejercicio",$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->pago_cuenta_pagarLogic->setpago_cuenta_pagars($pago_cuenta_pagars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($pago_cuenta_pagar_session->bigidempresaActual!=null && $pago_cuenta_pagar_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$pago_cuenta_pagar_session->bigidempresaActual;
					$pago_cuenta_pagar_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->pago_cuenta_pagarLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//pago_cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars()==null || count($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$pago_cuenta_pagars=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->pago_cuenta_pagarLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->pago_cuenta_pagarsReporte=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportepago_cuenta_pagars("FK_Idempresa",$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->pago_cuenta_pagarLogic->setpago_cuenta_pagars($pago_cuenta_pagars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idestado')
			{

				if($pago_cuenta_pagar_session->bigidestadoActual!=null && $pago_cuenta_pagar_session->bigidestadoActual!=0)
				{
					$this->id_estadoFK_Idestado=$pago_cuenta_pagar_session->bigidestadoActual;
					$pago_cuenta_pagar_session->bigidestadoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->pago_cuenta_pagarLogic->getsFK_Idestado($finalQueryPaginacion,$this->pagination,$this->id_estadoFK_Idestado);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//pago_cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idestado($this->id_estadoFK_Idestado);


					if($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars()==null || count($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$pago_cuenta_pagars=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->pago_cuenta_pagarLogic->getsFK_Idestado('',$this->pagination,$this->id_estadoFK_Idestado);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->pago_cuenta_pagarsReporte=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportepago_cuenta_pagars("FK_Idestado",$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->pago_cuenta_pagarLogic->setpago_cuenta_pagars($pago_cuenta_pagars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idforma_pago_proveedor')
			{

				if($pago_cuenta_pagar_session->bigidforma_pago_proveedorActual!=null && $pago_cuenta_pagar_session->bigidforma_pago_proveedorActual!=0)
				{
					$this->id_forma_pago_proveedorFK_Idforma_pago_proveedor=$pago_cuenta_pagar_session->bigidforma_pago_proveedorActual;
					$pago_cuenta_pagar_session->bigidforma_pago_proveedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->pago_cuenta_pagarLogic->getsFK_Idforma_pago_proveedor($finalQueryPaginacion,$this->pagination,$this->id_forma_pago_proveedorFK_Idforma_pago_proveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//pago_cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idforma_pago_proveedor($this->id_forma_pago_proveedorFK_Idforma_pago_proveedor);


					if($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars()==null || count($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$pago_cuenta_pagars=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->pago_cuenta_pagarLogic->getsFK_Idforma_pago_proveedor('',$this->pagination,$this->id_forma_pago_proveedorFK_Idforma_pago_proveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->pago_cuenta_pagarsReporte=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportepago_cuenta_pagars("FK_Idforma_pago_proveedor",$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->pago_cuenta_pagarLogic->setpago_cuenta_pagars($pago_cuenta_pagars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperiodo')
			{

				if($pago_cuenta_pagar_session->bigidperiodoActual!=null && $pago_cuenta_pagar_session->bigidperiodoActual!=0)
				{
					$this->id_periodoFK_Idperiodo=$pago_cuenta_pagar_session->bigidperiodoActual;
					$pago_cuenta_pagar_session->bigidperiodoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->pago_cuenta_pagarLogic->getsFK_Idperiodo($finalQueryPaginacion,$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//pago_cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idperiodo($this->id_periodoFK_Idperiodo);


					if($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars()==null || count($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$pago_cuenta_pagars=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->pago_cuenta_pagarLogic->getsFK_Idperiodo('',$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->pago_cuenta_pagarsReporte=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportepago_cuenta_pagars("FK_Idperiodo",$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->pago_cuenta_pagarLogic->setpago_cuenta_pagars($pago_cuenta_pagars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsucursal')
			{

				if($pago_cuenta_pagar_session->bigidsucursalActual!=null && $pago_cuenta_pagar_session->bigidsucursalActual!=0)
				{
					$this->id_sucursalFK_Idsucursal=$pago_cuenta_pagar_session->bigidsucursalActual;
					$pago_cuenta_pagar_session->bigidsucursalActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->pago_cuenta_pagarLogic->getsFK_Idsucursal($finalQueryPaginacion,$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//pago_cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idsucursal($this->id_sucursalFK_Idsucursal);


					if($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars()==null || count($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$pago_cuenta_pagars=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->pago_cuenta_pagarLogic->getsFK_Idsucursal('',$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->pago_cuenta_pagarsReporte=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportepago_cuenta_pagars("FK_Idsucursal",$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->pago_cuenta_pagarLogic->setpago_cuenta_pagars($pago_cuenta_pagars);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($pago_cuenta_pagar_session->bigidusuarioActual!=null && $pago_cuenta_pagar_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$pago_cuenta_pagar_session->bigidusuarioActual;
					$pago_cuenta_pagar_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->pago_cuenta_pagarLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//pago_cuenta_pagarLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars()==null || count($this->pago_cuenta_pagarLogic->getpago_cuenta_pagars())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$pago_cuenta_pagars=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->pago_cuenta_pagarLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->pago_cuenta_pagarsReporte=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportepago_cuenta_pagars("FK_Idusuario",$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars());

					if($this->strTipoPaginacion=='TODOS') {
						$this->pago_cuenta_pagarLogic->setpago_cuenta_pagars($pago_cuenta_pagars);
					}
				//}

			} 
		
		$pago_cuenta_pagar_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$pago_cuenta_pagar_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->pago_cuenta_pagarLogic->loadForeignsKeysDescription();*/
		
		$this->pago_cuenta_pagars=$this->pago_cuenta_pagarLogic->getpago_cuenta_pagars();
		
		if($this->pago_cuenta_pagarsEliminados==null) {
			$this->pago_cuenta_pagarsEliminados=array();
		}
		
		$this->Session->write(pago_cuenta_pagar_util::$STR_SESSION_NAME.'Lista',serialize($this->pago_cuenta_pagars));
		$this->Session->write(pago_cuenta_pagar_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->pago_cuenta_pagarsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(pago_cuenta_pagar_util::$STR_SESSION_NAME,serialize($pago_cuenta_pagar_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idpago_cuenta_pagar=$idGeneral;
			
			$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
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
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if(count($this->pago_cuenta_pagars) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Idcuenta_pagarParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuenta_pagarFK_Idcuenta_pagar=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta_pagar','cmbid_cuenta_pagar');

			$this->strAccionBusqueda='FK_Idcuenta_pagar';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
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
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ejercicioFK_Idejercicio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idejercicio','cmbid_ejercicio');

			$this->strAccionBusqueda='FK_Idejercicio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
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
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
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
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_estadoFK_Idestado=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idestado','cmbid_estado');

			$this->strAccionBusqueda='FK_Idestado';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idforma_pago_proveedorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_forma_pago_proveedorFK_Idforma_pago_proveedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idforma_pago_proveedor','cmbid_forma_pago_proveedor');

			$this->strAccionBusqueda='FK_Idforma_pago_proveedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
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
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_periodoFK_Idperiodo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperiodo','cmbid_periodo');

			$this->strAccionBusqueda='FK_Idperiodo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
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
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sucursalFK_Idsucursal=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsucursal','cmbid_sucursal');

			$this->strAccionBusqueda='FK_Idsucursal';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
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
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcuenta_pagar($strFinalQuery,$id_cuenta_pagar)
	{
		try
		{

			$this->pago_cuenta_pagarLogic->getsFK_Idcuenta_pagar($strFinalQuery,new Pagination(),$id_cuenta_pagar);
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

			$this->pago_cuenta_pagarLogic->getsFK_Idejercicio($strFinalQuery,new Pagination(),$id_ejercicio);
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

			$this->pago_cuenta_pagarLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
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

			$this->pago_cuenta_pagarLogic->getsFK_Idestado($strFinalQuery,new Pagination(),$id_estado);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idforma_pago_proveedor($strFinalQuery,$id_forma_pago_proveedor)
	{
		try
		{

			$this->pago_cuenta_pagarLogic->getsFK_Idforma_pago_proveedor($strFinalQuery,new Pagination(),$id_forma_pago_proveedor);
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

			$this->pago_cuenta_pagarLogic->getsFK_Idperiodo($strFinalQuery,new Pagination(),$id_periodo);
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

			$this->pago_cuenta_pagarLogic->getsFK_Idsucursal($strFinalQuery,new Pagination(),$id_sucursal);
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

			$this->pago_cuenta_pagarLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
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
			
			
			$pago_cuenta_pagarForeignKey=new pago_cuenta_pagar_param_return(); //pago_cuenta_pagarForeignKey();
			
			$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));
						
			if($pago_cuenta_pagar_session==null) {
				$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$pago_cuenta_pagarForeignKey=$this->pago_cuenta_pagarLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$pago_cuenta_pagar_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$pago_cuenta_pagarForeignKey->empresasFK;
				$this->idempresaDefaultFK=$pago_cuenta_pagarForeignKey->idempresaDefaultFK;
			}

			if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$this->strRecargarFkTipos,',')) {
				$this->sucursalsFK=$pago_cuenta_pagarForeignKey->sucursalsFK;
				$this->idsucursalDefaultFK=$pago_cuenta_pagarForeignKey->idsucursalDefaultFK;
			}

			if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionsucursal) {
				$this->setVisibleBusquedasParasucursal(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$this->strRecargarFkTipos,',')) {
				$this->ejerciciosFK=$pago_cuenta_pagarForeignKey->ejerciciosFK;
				$this->idejercicioDefaultFK=$pago_cuenta_pagarForeignKey->idejercicioDefaultFK;
			}

			if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionejercicio) {
				$this->setVisibleBusquedasParaejercicio(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$this->strRecargarFkTipos,',')) {
				$this->periodosFK=$pago_cuenta_pagarForeignKey->periodosFK;
				$this->idperiodoDefaultFK=$pago_cuenta_pagarForeignKey->idperiodoDefaultFK;
			}

			if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionperiodo) {
				$this->setVisibleBusquedasParaperiodo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$pago_cuenta_pagarForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$pago_cuenta_pagarForeignKey->idusuarioDefaultFK;
			}

			if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionusuario) {
				$this->setVisibleBusquedasParausuario(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta_pagar',$this->strRecargarFkTipos,',')) {
				$this->cuenta_pagarsFK=$pago_cuenta_pagarForeignKey->cuenta_pagarsFK;
				$this->idcuenta_pagarDefaultFK=$pago_cuenta_pagarForeignKey->idcuenta_pagarDefaultFK;
			}

			if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesioncuenta_pagar) {
				$this->setVisibleBusquedasParacuenta_pagar(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_forma_pago_proveedor',$this->strRecargarFkTipos,',')) {
				$this->forma_pago_proveedorsFK=$pago_cuenta_pagarForeignKey->forma_pago_proveedorsFK;
				$this->idforma_pago_proveedorDefaultFK=$pago_cuenta_pagarForeignKey->idforma_pago_proveedorDefaultFK;
			}

			if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionforma_pago_proveedor) {
				$this->setVisibleBusquedasParaforma_pago_proveedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$this->strRecargarFkTipos,',')) {
				$this->estadosFK=$pago_cuenta_pagarForeignKey->estadosFK;
				$this->idestadoDefaultFK=$pago_cuenta_pagarForeignKey->idestadoDefaultFK;
			}

			if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionestado) {
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
	
	function cargarCombosFKFromReturnGeneral($pago_cuenta_pagarReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$pago_cuenta_pagarReturnGeneral->strRecargarFkTipos;
			
			


			if($pago_cuenta_pagarReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$pago_cuenta_pagarReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$pago_cuenta_pagarReturnGeneral->idempresaDefaultFK;
			}


			if($pago_cuenta_pagarReturnGeneral->con_sucursalsFK==true) {
				$this->sucursalsFK=$pago_cuenta_pagarReturnGeneral->sucursalsFK;
				$this->idsucursalDefaultFK=$pago_cuenta_pagarReturnGeneral->idsucursalDefaultFK;
			}


			if($pago_cuenta_pagarReturnGeneral->con_ejerciciosFK==true) {
				$this->ejerciciosFK=$pago_cuenta_pagarReturnGeneral->ejerciciosFK;
				$this->idejercicioDefaultFK=$pago_cuenta_pagarReturnGeneral->idejercicioDefaultFK;
			}


			if($pago_cuenta_pagarReturnGeneral->con_periodosFK==true) {
				$this->periodosFK=$pago_cuenta_pagarReturnGeneral->periodosFK;
				$this->idperiodoDefaultFK=$pago_cuenta_pagarReturnGeneral->idperiodoDefaultFK;
			}


			if($pago_cuenta_pagarReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$pago_cuenta_pagarReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$pago_cuenta_pagarReturnGeneral->idusuarioDefaultFK;
			}


			if($pago_cuenta_pagarReturnGeneral->con_cuenta_pagarsFK==true) {
				$this->cuenta_pagarsFK=$pago_cuenta_pagarReturnGeneral->cuenta_pagarsFK;
				$this->idcuenta_pagarDefaultFK=$pago_cuenta_pagarReturnGeneral->idcuenta_pagarDefaultFK;
			}


			if($pago_cuenta_pagarReturnGeneral->con_forma_pago_proveedorsFK==true) {
				$this->forma_pago_proveedorsFK=$pago_cuenta_pagarReturnGeneral->forma_pago_proveedorsFK;
				$this->idforma_pago_proveedorDefaultFK=$pago_cuenta_pagarReturnGeneral->idforma_pago_proveedorDefaultFK;
			}


			if($pago_cuenta_pagarReturnGeneral->con_estadosFK==true) {
				$this->estadosFK=$pago_cuenta_pagarReturnGeneral->estadosFK;
				$this->idestadoDefaultFK=$pago_cuenta_pagarReturnGeneral->idestadoDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));
		
		if($pago_cuenta_pagar_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($pago_cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($pago_cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sucursal_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sucursal';
			}
			else if($pago_cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ejercicio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ejercicio';
			}
			else if($pago_cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==periodo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='periodo';
			}
			else if($pago_cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			else if($pago_cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_pagar_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta_pagar';
			}
			else if($pago_cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==forma_pago_proveedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='forma_pago_proveedor';
			}
			else if($pago_cuenta_pagar_session->getstrNombrePaginaNavegacionHaciaFKDesde()==estado_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='estado';
			}
			
			$pago_cuenta_pagar_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}						
			
			$this->pago_cuenta_pagarsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->pago_cuenta_pagarsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->pago_cuenta_pagarsAuxiliar=array();
			}
			
			if(count($this->pago_cuenta_pagarsAuxiliar) > 0) {
				
				foreach ($this->pago_cuenta_pagarsAuxiliar as $pago_cuenta_pagarSeleccionado) {
					$this->eliminarTablaBase($pago_cuenta_pagarSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
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


	public function getcuenta_pagarsFKListSelectItem() 
	{
		$cuenta_pagarsList=array();

		$item=null;

		foreach($this->cuenta_pagarsFK as $cuenta_pagar)
		{
			$item=new SelectItem();
			$item->setLabel($cuenta_pagar>getId());
			$item->setValue($cuenta_pagar->getId());
			$cuenta_pagarsList[]=$item;
		}

		return $cuenta_pagarsList;
	}


	public function getforma_pago_proveedorsFKListSelectItem() 
	{
		$forma_pago_proveedorsList=array();

		$item=null;

		foreach($this->forma_pago_proveedorsFK as $forma_pago_proveedor)
		{
			$item=new SelectItem();
			$item->setLabel($forma_pago_proveedor->getcodigo());
			$item->setValue($forma_pago_proveedor->getId());
			$forma_pago_proveedorsList[]=$item;
		}

		return $forma_pago_proveedorsList;
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
				$this->pago_cuenta_pagarLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
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
				$this->pago_cuenta_pagarLogic->commitNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->rollbackNewConnexionToDeep();
				$this->pago_cuenta_pagarLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$pago_cuenta_pagarsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->pago_cuenta_pagars as $pago_cuenta_pagarLocal) {
				if($pago_cuenta_pagarLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->pago_cuenta_pagar=new pago_cuenta_pagar();
				
				$this->pago_cuenta_pagar->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->pago_cuenta_pagars[]=$this->pago_cuenta_pagar;*/
				
				$pago_cuenta_pagarsNuevos[]=$this->pago_cuenta_pagar;
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
				$class=new Classe('cuenta_pagar');$classes[]=$class;
				$class=new Classe('forma_pago_proveedor');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->pago_cuenta_pagarLogic->setpago_cuenta_pagars($pago_cuenta_pagarsNuevos);
					
				$this->pago_cuenta_pagarLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($pago_cuenta_pagarsNuevos as $pago_cuenta_pagarNuevo) {
					$this->pago_cuenta_pagars[]=$pago_cuenta_pagarNuevo;
				}
				
				/*$this->pago_cuenta_pagars[]=$pago_cuenta_pagarsNuevos;*/
				
				$this->pago_cuenta_pagarLogic->setpago_cuenta_pagars($this->pago_cuenta_pagars);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($pago_cuenta_pagarsNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($pago_cuenta_pagar_session->bigidempresaActual!=null && $pago_cuenta_pagar_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($pago_cuenta_pagar_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=pago_cuenta_pagar_util::getempresaDescripcion($empresaLogic->getempresa());
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

		$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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


			if($pago_cuenta_pagar_session->bigidsucursalActual!=null && $pago_cuenta_pagar_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($pago_cuenta_pagar_session->bigidsucursalActual);//WithConnection

				$this->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=pago_cuenta_pagar_util::getsucursalDescripcion($sucursalLogic->getsucursal());
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

		$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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


			if($pago_cuenta_pagar_session->bigidejercicioActual!=null && $pago_cuenta_pagar_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($pago_cuenta_pagar_session->bigidejercicioActual);//WithConnection

				$this->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=pago_cuenta_pagar_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
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

		$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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


			if($pago_cuenta_pagar_session->bigidperiodoActual!=null && $pago_cuenta_pagar_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($pago_cuenta_pagar_session->bigidperiodoActual);//WithConnection

				$this->periodosFK[$periodoLogic->getperiodo()->getId()]=pago_cuenta_pagar_util::getperiodoDescripcion($periodoLogic->getperiodo());
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

		$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionusuario!=true) {
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


			if($pago_cuenta_pagar_session->bigidusuarioActual!=null && $pago_cuenta_pagar_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($pago_cuenta_pagar_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=pago_cuenta_pagar_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarComboscuenta_pagarsFK($connexion=null,$strRecargarFkQuery=''){
		$cuenta_pagarLogic= new cuenta_pagar_logic();
		$pagination= new Pagination();
		$this->cuenta_pagarsFK=array();

		$cuenta_pagarLogic->setConnexion($connexion);
		$cuenta_pagarLogic->getcuenta_pagarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesioncuenta_pagar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cuenta_pagar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcuenta_pagar=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcuenta_pagar=Funciones::GetFinalQueryAppend($finalQueryGlobalcuenta_pagar, '');
				$finalQueryGlobalcuenta_pagar.=cuenta_pagar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcuenta_pagar.$strRecargarFkQuery;		

				$cuenta_pagarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscuenta_pagarsFK($cuenta_pagarLogic->getcuenta_pagars());

		} else {
			$this->setVisibleBusquedasParacuenta_pagar(true);


			if($pago_cuenta_pagar_session->bigidcuenta_pagarActual!=null && $pago_cuenta_pagar_session->bigidcuenta_pagarActual > 0) {
				$cuenta_pagarLogic->getEntity($pago_cuenta_pagar_session->bigidcuenta_pagarActual);//WithConnection

				$this->cuenta_pagarsFK[$cuenta_pagarLogic->getcuenta_pagar()->getId()]=pago_cuenta_pagar_util::getcuenta_pagarDescripcion($cuenta_pagarLogic->getcuenta_pagar());
				$this->idcuenta_pagarDefaultFK=$cuenta_pagarLogic->getcuenta_pagar()->getId();
			}
		}
	}

	public function cargarCombosforma_pago_proveedorsFK($connexion=null,$strRecargarFkQuery=''){
		$forma_pago_proveedorLogic= new forma_pago_proveedor_logic();
		$pagination= new Pagination();
		$this->forma_pago_proveedorsFK=array();

		$forma_pago_proveedorLogic->setConnexion($connexion);
		$forma_pago_proveedorLogic->getforma_pago_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionforma_pago_proveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=forma_pago_proveedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalforma_pago_proveedor=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalforma_pago_proveedor=Funciones::GetFinalQueryAppend($finalQueryGlobalforma_pago_proveedor, '');
				$finalQueryGlobalforma_pago_proveedor.=forma_pago_proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalforma_pago_proveedor.$strRecargarFkQuery;		

				$forma_pago_proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosforma_pago_proveedorsFK($forma_pago_proveedorLogic->getforma_pago_proveedors());

		} else {
			$this->setVisibleBusquedasParaforma_pago_proveedor(true);


			if($pago_cuenta_pagar_session->bigidforma_pago_proveedorActual!=null && $pago_cuenta_pagar_session->bigidforma_pago_proveedorActual > 0) {
				$forma_pago_proveedorLogic->getEntity($pago_cuenta_pagar_session->bigidforma_pago_proveedorActual);//WithConnection

				$this->forma_pago_proveedorsFK[$forma_pago_proveedorLogic->getforma_pago_proveedor()->getId()]=pago_cuenta_pagar_util::getforma_pago_proveedorDescripcion($forma_pago_proveedorLogic->getforma_pago_proveedor());
				$this->idforma_pago_proveedorDefaultFK=$forma_pago_proveedorLogic->getforma_pago_proveedor()->getId();
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

		$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));

		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionestado!=true) {
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


			if($pago_cuenta_pagar_session->bigidestadoActual!=null && $pago_cuenta_pagar_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($pago_cuenta_pagar_session->bigidestadoActual);//WithConnection

				$this->estadosFK[$estadoLogic->getestado()->getId()]=pago_cuenta_pagar_util::getestadoDescripcion($estadoLogic->getestado());
				$this->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=pago_cuenta_pagar_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombossucursalsFK($sucursals){

		foreach ($sucursals as $sucursalLocal ) {
			if($this->idsucursalDefaultFK==0) {
				$this->idsucursalDefaultFK=$sucursalLocal->getId();
			}

			$this->sucursalsFK[$sucursalLocal->getId()]=pago_cuenta_pagar_util::getsucursalDescripcion($sucursalLocal);
		}
	}

	public function prepararCombosejerciciosFK($ejercicios){

		foreach ($ejercicios as $ejercicioLocal ) {
			if($this->idejercicioDefaultFK==0) {
				$this->idejercicioDefaultFK=$ejercicioLocal->getId();
			}

			$this->ejerciciosFK[$ejercicioLocal->getId()]=pago_cuenta_pagar_util::getejercicioDescripcion($ejercicioLocal);
		}
	}

	public function prepararCombosperiodosFK($periodos){

		foreach ($periodos as $periodoLocal ) {
			if($this->idperiodoDefaultFK==0) {
				$this->idperiodoDefaultFK=$periodoLocal->getId();
			}

			$this->periodosFK[$periodoLocal->getId()]=pago_cuenta_pagar_util::getperiodoDescripcion($periodoLocal);
		}
	}

	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=pago_cuenta_pagar_util::getusuarioDescripcion($usuarioLocal);
		}
	}

	public function prepararComboscuenta_pagarsFK($cuenta_pagars){

		foreach ($cuenta_pagars as $cuenta_pagarLocal ) {
			if($this->idcuenta_pagarDefaultFK==0) {
				$this->idcuenta_pagarDefaultFK=$cuenta_pagarLocal->getId();
			}

			$this->cuenta_pagarsFK[$cuenta_pagarLocal->getId()]=pago_cuenta_pagar_util::getcuenta_pagarDescripcion($cuenta_pagarLocal);
		}
	}

	public function prepararCombosforma_pago_proveedorsFK($forma_pago_proveedors){

		foreach ($forma_pago_proveedors as $forma_pago_proveedorLocal ) {
			if($this->idforma_pago_proveedorDefaultFK==0) {
				$this->idforma_pago_proveedorDefaultFK=$forma_pago_proveedorLocal->getId();
			}

			$this->forma_pago_proveedorsFK[$forma_pago_proveedorLocal->getId()]=pago_cuenta_pagar_util::getforma_pago_proveedorDescripcion($forma_pago_proveedorLocal);
		}
	}

	public function prepararCombosestadosFK($estados){

		foreach ($estados as $estadoLocal ) {
			if($this->idestadoDefaultFK==0) {
				$this->idestadoDefaultFK=$estadoLocal->getId();
			}

			$this->estadosFK[$estadoLocal->getId()]=pago_cuenta_pagar_util::getestadoDescripcion($estadoLocal);
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

			$strDescripcionempresa=pago_cuenta_pagar_util::getempresaDescripcion($empresaLogic->getempresa());

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

			$strDescripcionsucursal=pago_cuenta_pagar_util::getsucursalDescripcion($sucursalLogic->getsucursal());

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

			$strDescripcionejercicio=pago_cuenta_pagar_util::getejercicioDescripcion($ejercicioLogic->getejercicio());

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

			$strDescripcionperiodo=pago_cuenta_pagar_util::getperiodoDescripcion($periodoLogic->getperiodo());

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

			$strDescripcionusuario=pago_cuenta_pagar_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
	}

	public function cargarDescripcioncuenta_pagarFK($idcuenta_pagar,$connexion=null){
		$cuenta_pagarLogic= new cuenta_pagar_logic();
		$cuenta_pagarLogic->setConnexion($connexion);
		$cuenta_pagarLogic->getcuenta_pagarDataAccess()->isForFKData=true;
		$strDescripcioncuenta_pagar='';

		if($idcuenta_pagar!=null && $idcuenta_pagar!='' && $idcuenta_pagar!='null') {
			if($connexion!=null) {
				$cuenta_pagarLogic->getEntity($idcuenta_pagar);//WithConnection
			} else {
				$cuenta_pagarLogic->getEntityWithConnection($idcuenta_pagar);//
			}

			$strDescripcioncuenta_pagar=pago_cuenta_pagar_util::getcuenta_pagarDescripcion($cuenta_pagarLogic->getcuenta_pagar());

		} else {
			$strDescripcioncuenta_pagar='null';
		}

		return $strDescripcioncuenta_pagar;
	}

	public function cargarDescripcionforma_pago_proveedorFK($idforma_pago_proveedor,$connexion=null){
		$forma_pago_proveedorLogic= new forma_pago_proveedor_logic();
		$forma_pago_proveedorLogic->setConnexion($connexion);
		$forma_pago_proveedorLogic->getforma_pago_proveedorDataAccess()->isForFKData=true;
		$strDescripcionforma_pago_proveedor='';

		if($idforma_pago_proveedor!=null && $idforma_pago_proveedor!='' && $idforma_pago_proveedor!='null') {
			if($connexion!=null) {
				$forma_pago_proveedorLogic->getEntity($idforma_pago_proveedor);//WithConnection
			} else {
				$forma_pago_proveedorLogic->getEntityWithConnection($idforma_pago_proveedor);//
			}

			$strDescripcionforma_pago_proveedor=pago_cuenta_pagar_util::getforma_pago_proveedorDescripcion($forma_pago_proveedorLogic->getforma_pago_proveedor());

		} else {
			$strDescripcionforma_pago_proveedor='null';
		}

		return $strDescripcionforma_pago_proveedor;
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

			$strDescripcionestado=pago_cuenta_pagar_util::getestadoDescripcion($estadoLogic->getestado());

		} else {
			$strDescripcionestado='null';
		}

		return $strDescripcionestado;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(pago_cuenta_pagar $pago_cuenta_pagarClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$pago_cuenta_pagarClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
				$pago_cuenta_pagarClase->setid_sucursal($this->parametroGeneralUsuarioActual->getid_sucursal());
				$pago_cuenta_pagarClase->setid_ejercicio($this->parametroGeneralUsuarioActual->getid_ejercicio());
				$pago_cuenta_pagarClase->setid_periodo($this->parametroGeneralUsuarioActual->getid_periodo());
				$pago_cuenta_pagarClase->setid_usuario($this->usuarioActual->getId());
			
			
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

		$this->strVisibleFK_Idcuenta_pagar=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idforma_pago_proveedor=$strParaVisibleNegacionempresa;
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

		$this->strVisibleFK_Idcuenta_pagar=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idforma_pago_proveedor=$strParaVisibleNegacionsucursal;
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

		$this->strVisibleFK_Idcuenta_pagar=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idejercicio=$strParaVisibleejercicio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idforma_pago_proveedor=$strParaVisibleNegacionejercicio;
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

		$this->strVisibleFK_Idcuenta_pagar=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idforma_pago_proveedor=$strParaVisibleNegacionperiodo;
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

		$this->strVisibleFK_Idcuenta_pagar=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idforma_pago_proveedor=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idusuario=$strParaVisibleusuario;
	}

	public function setVisibleBusquedasParacuenta_pagar($isParacuenta_pagar){
		$strParaVisiblecuenta_pagar='display:table-row';
		$strParaVisibleNegacioncuenta_pagar='display:none';

		if($isParacuenta_pagar) {
			$strParaVisiblecuenta_pagar='display:table-row';
			$strParaVisibleNegacioncuenta_pagar='display:none';
		} else {
			$strParaVisiblecuenta_pagar='display:none';
			$strParaVisibleNegacioncuenta_pagar='display:table-row';
		}


		$strParaVisibleNegacioncuenta_pagar=trim($strParaVisibleNegacioncuenta_pagar);

		$this->strVisibleFK_Idcuenta_pagar=$strParaVisiblecuenta_pagar;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncuenta_pagar;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncuenta_pagar;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacioncuenta_pagar;
		$this->strVisibleFK_Idforma_pago_proveedor=$strParaVisibleNegacioncuenta_pagar;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncuenta_pagar;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacioncuenta_pagar;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacioncuenta_pagar;
	}

	public function setVisibleBusquedasParaforma_pago_proveedor($isParaforma_pago_proveedor){
		$strParaVisibleforma_pago_proveedor='display:table-row';
		$strParaVisibleNegacionforma_pago_proveedor='display:none';

		if($isParaforma_pago_proveedor) {
			$strParaVisibleforma_pago_proveedor='display:table-row';
			$strParaVisibleNegacionforma_pago_proveedor='display:none';
		} else {
			$strParaVisibleforma_pago_proveedor='display:none';
			$strParaVisibleNegacionforma_pago_proveedor='display:table-row';
		}


		$strParaVisibleNegacionforma_pago_proveedor=trim($strParaVisibleNegacionforma_pago_proveedor);

		$this->strVisibleFK_Idcuenta_pagar=$strParaVisibleNegacionforma_pago_proveedor;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionforma_pago_proveedor;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionforma_pago_proveedor;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionforma_pago_proveedor;
		$this->strVisibleFK_Idforma_pago_proveedor=$strParaVisibleforma_pago_proveedor;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionforma_pago_proveedor;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionforma_pago_proveedor;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionforma_pago_proveedor;
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

		$this->strVisibleFK_Idcuenta_pagar=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idestado=$strParaVisibleestado;
		$this->strVisibleFK_Idforma_pago_proveedor=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionestado;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idpago_cuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idpago_cuenta_pagarActual=$idpago_cuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.pago_cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.pago_cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarpago_cuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParasucursal() {//$idpago_cuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idpago_cuenta_pagarActual=$idpago_cuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sucursal_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.pago_cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sucursal_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.pago_cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sucursal_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarpago_cuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaejercicio() {//$idpago_cuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idpago_cuenta_pagarActual=$idpago_cuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ejercicio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.pago_cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ejercicio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.pago_cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ejercicio_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarpago_cuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaperiodo() {//$idpago_cuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idpago_cuenta_pagarActual=$idpago_cuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.periodo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.pago_cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',periodo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.pago_cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(periodo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarpago_cuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParausuario() {//$idpago_cuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idpago_cuenta_pagarActual=$idpago_cuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.pago_cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.pago_cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarpago_cuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta_pagar() {//$idpago_cuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idpago_cuenta_pagarActual=$idpago_cuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_pagar_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.pago_cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_pagar(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.pago_cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta_pagar(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarpago_cuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaforma_pago_proveedor() {//$idpago_cuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idpago_cuenta_pagarActual=$idpago_cuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.forma_pago_proveedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.pago_cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_forma_pago_proveedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',forma_pago_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.pago_cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_forma_pago_proveedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(forma_pago_proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarpago_cuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaestado() {//$idpago_cuenta_pagarActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idpago_cuenta_pagarActual=$idpago_cuenta_pagarActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.estado_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.pago_cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',estado_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.pago_cuenta_pagarJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(estado_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarpago_cuenta_pagar,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(pago_cuenta_pagar_util::$STR_SESSION_NAME,pago_cuenta_pagar_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$pago_cuenta_pagar_session=$this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME);
				
		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();		
			//$this->Session->write('pago_cuenta_pagar_session',$pago_cuenta_pagar_session);							
		}
		*/
		
		$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
    	$pago_cuenta_pagar_session->strPathNavegacionActual=pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
    	$pago_cuenta_pagar_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(pago_cuenta_pagar_util::$STR_SESSION_NAME,serialize($pago_cuenta_pagar_session));		
	}	
	
	public function getSetBusquedasSesionConfig(pago_cuenta_pagar_session $pago_cuenta_pagar_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionFK!=null && $pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionFK==true) {
			if($pago_cuenta_pagar_session->bigIdActualFK!=null && $pago_cuenta_pagar_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$pago_cuenta_pagar_session->bigIdActualFKParaPosibleAtras=$pago_cuenta_pagar_session->bigIdActualFK;*/
			}
				
			$pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(pago_cuenta_pagar_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionempresa!=null && $pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($pago_cuenta_pagar_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(pago_cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(pago_cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($pago_cuenta_pagar_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($pago_cuenta_pagar_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$pago_cuenta_pagar_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($pago_cuenta_pagar_session->intNumeroPaginacion==pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$pago_cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			else if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionsucursal!=null && $pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionsucursal==true)
			{
				if($pago_cuenta_pagar_session->bigidsucursalActual!=0) {
					$this->strAccionBusqueda='FK_Idsucursal';

					$existe_history=HistoryWeb::ExisteElemento(pago_cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(pago_cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($pago_cuenta_pagar_session->bigidsucursalActualDescripcion);
						$historyWeb->setIdActual($pago_cuenta_pagar_session->bigidsucursalActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$pago_cuenta_pagar_session->bigidsucursalActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionsucursal=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($pago_cuenta_pagar_session->intNumeroPaginacion==pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$pago_cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			else if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionejercicio!=null && $pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionejercicio==true)
			{
				if($pago_cuenta_pagar_session->bigidejercicioActual!=0) {
					$this->strAccionBusqueda='FK_Idejercicio';

					$existe_history=HistoryWeb::ExisteElemento(pago_cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(pago_cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($pago_cuenta_pagar_session->bigidejercicioActualDescripcion);
						$historyWeb->setIdActual($pago_cuenta_pagar_session->bigidejercicioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$pago_cuenta_pagar_session->bigidejercicioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionejercicio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($pago_cuenta_pagar_session->intNumeroPaginacion==pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$pago_cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			else if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionperiodo!=null && $pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionperiodo==true)
			{
				if($pago_cuenta_pagar_session->bigidperiodoActual!=0) {
					$this->strAccionBusqueda='FK_Idperiodo';

					$existe_history=HistoryWeb::ExisteElemento(pago_cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(pago_cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($pago_cuenta_pagar_session->bigidperiodoActualDescripcion);
						$historyWeb->setIdActual($pago_cuenta_pagar_session->bigidperiodoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$pago_cuenta_pagar_session->bigidperiodoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionperiodo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($pago_cuenta_pagar_session->intNumeroPaginacion==pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$pago_cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			else if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionusuario!=null && $pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($pago_cuenta_pagar_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(pago_cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(pago_cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($pago_cuenta_pagar_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($pago_cuenta_pagar_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$pago_cuenta_pagar_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($pago_cuenta_pagar_session->intNumeroPaginacion==pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$pago_cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			else if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesioncuenta_pagar!=null && $pago_cuenta_pagar_session->bitBusquedaDesdeFKSesioncuenta_pagar==true)
			{
				if($pago_cuenta_pagar_session->bigidcuenta_pagarActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta_pagar';

					$existe_history=HistoryWeb::ExisteElemento(pago_cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(pago_cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($pago_cuenta_pagar_session->bigidcuenta_pagarActualDescripcion);
						$historyWeb->setIdActual($pago_cuenta_pagar_session->bigidcuenta_pagarActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$pago_cuenta_pagar_session->bigidcuenta_pagarActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$pago_cuenta_pagar_session->bitBusquedaDesdeFKSesioncuenta_pagar=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($pago_cuenta_pagar_session->intNumeroPaginacion==pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$pago_cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			else if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionforma_pago_proveedor!=null && $pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionforma_pago_proveedor==true)
			{
				if($pago_cuenta_pagar_session->bigidforma_pago_proveedorActual!=0) {
					$this->strAccionBusqueda='FK_Idforma_pago_proveedor';

					$existe_history=HistoryWeb::ExisteElemento(pago_cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(pago_cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($pago_cuenta_pagar_session->bigidforma_pago_proveedorActualDescripcion);
						$historyWeb->setIdActual($pago_cuenta_pagar_session->bigidforma_pago_proveedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$pago_cuenta_pagar_session->bigidforma_pago_proveedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionforma_pago_proveedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($pago_cuenta_pagar_session->intNumeroPaginacion==pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$pago_cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			else if($pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionestado!=null && $pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionestado==true)
			{
				if($pago_cuenta_pagar_session->bigidestadoActual!=0) {
					$this->strAccionBusqueda='FK_Idestado';

					$existe_history=HistoryWeb::ExisteElemento(pago_cuenta_pagar_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(pago_cuenta_pagar_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($pago_cuenta_pagar_session->bigidestadoActualDescripcion);
						$historyWeb->setIdActual($pago_cuenta_pagar_session->bigidestadoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$pago_cuenta_pagar_session->bigidestadoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionestado=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;

				if($pago_cuenta_pagar_session->intNumeroPaginacion==pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=pago_cuenta_pagar_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$pago_cuenta_pagar_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$pago_cuenta_pagar_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));
		
		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		$pago_cuenta_pagar_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$pago_cuenta_pagar_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$pago_cuenta_pagar_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcuenta_pagar') {
			$pago_cuenta_pagar_session->id_cuenta_pagar=$this->id_cuenta_pagarFK_Idcuenta_pagar;	

		}
		else if($this->strAccionBusqueda=='FK_Idejercicio') {
			$pago_cuenta_pagar_session->id_ejercicio=$this->id_ejercicioFK_Idejercicio;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$pago_cuenta_pagar_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idestado') {
			$pago_cuenta_pagar_session->id_estado=$this->id_estadoFK_Idestado;	

		}
		else if($this->strAccionBusqueda=='FK_Idforma_pago_proveedor') {
			$pago_cuenta_pagar_session->id_forma_pago_proveedor=$this->id_forma_pago_proveedorFK_Idforma_pago_proveedor;	

		}
		else if($this->strAccionBusqueda=='FK_Idperiodo') {
			$pago_cuenta_pagar_session->id_periodo=$this->id_periodoFK_Idperiodo;	

		}
		else if($this->strAccionBusqueda=='FK_Idsucursal') {
			$pago_cuenta_pagar_session->id_sucursal=$this->id_sucursalFK_Idsucursal;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$pago_cuenta_pagar_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		
		$this->Session->write(pago_cuenta_pagar_util::$STR_SESSION_NAME,serialize($pago_cuenta_pagar_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(pago_cuenta_pagar_session $pago_cuenta_pagar_session) {
		
		if($pago_cuenta_pagar_session==null) {
			$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));
		}
		
		if($pago_cuenta_pagar_session==null) {
		   $pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
		}
		
		if($pago_cuenta_pagar_session->strUltimaBusqueda!=null && $pago_cuenta_pagar_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$pago_cuenta_pagar_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$pago_cuenta_pagar_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$pago_cuenta_pagar_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcuenta_pagar') {
				$this->id_cuenta_pagarFK_Idcuenta_pagar=$pago_cuenta_pagar_session->id_cuenta_pagar;
				$pago_cuenta_pagar_session->id_cuenta_pagar=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idejercicio') {
				$this->id_ejercicioFK_Idejercicio=$pago_cuenta_pagar_session->id_ejercicio;
				$pago_cuenta_pagar_session->id_ejercicio=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$pago_cuenta_pagar_session->id_empresa;
				$pago_cuenta_pagar_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idestado') {
				$this->id_estadoFK_Idestado=$pago_cuenta_pagar_session->id_estado;
				$pago_cuenta_pagar_session->id_estado=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idforma_pago_proveedor') {
				$this->id_forma_pago_proveedorFK_Idforma_pago_proveedor=$pago_cuenta_pagar_session->id_forma_pago_proveedor;
				$pago_cuenta_pagar_session->id_forma_pago_proveedor=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idperiodo') {
				$this->id_periodoFK_Idperiodo=$pago_cuenta_pagar_session->id_periodo;
				$pago_cuenta_pagar_session->id_periodo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idsucursal') {
				$this->id_sucursalFK_Idsucursal=$pago_cuenta_pagar_session->id_sucursal;
				$pago_cuenta_pagar_session->id_sucursal=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$pago_cuenta_pagar_session->id_usuario;
				$pago_cuenta_pagar_session->id_usuario=-1;

			}
		}
		
		$pago_cuenta_pagar_session->strUltimaBusqueda='';
		//$pago_cuenta_pagar_session->intNumeroPaginacion=10;
		$pago_cuenta_pagar_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(pago_cuenta_pagar_util::$STR_SESSION_NAME,serialize($pago_cuenta_pagar_session));		
	}
	
	public function pago_cuenta_pagarsControllerAux($conexion_control) 	 {
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
		$this->idcuenta_pagarDefaultFK = 0;
		$this->idforma_pago_proveedorDefaultFK = 0;
		$this->idestadoDefaultFK = 0;
	}
	
	public function setpago_cuenta_pagarFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_sucursal',$this->idsucursalDefaultFK);
		$this->setExistDataCampoForm('form','id_ejercicio',$this->idejercicioDefaultFK);
		$this->setExistDataCampoForm('form','id_periodo',$this->idperiodoDefaultFK);
		$this->setExistDataCampoForm('form','id_usuario',$this->idusuarioDefaultFK);
		$this->setExistDataCampoForm('form','id_cuenta_pagar',$this->idcuenta_pagarDefaultFK);
		$this->setExistDataCampoForm('form','id_forma_pago_proveedor',$this->idforma_pago_proveedorDefaultFK);
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

		cuenta_pagar::$class;
		cuenta_pagar_carga::$CONTROLLER;

		forma_pago_proveedor::$class;
		forma_pago_proveedor_carga::$CONTROLLER;

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
		interface pago_cuenta_pagar_controlI {	
		
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
		
		public function onLoad(pago_cuenta_pagar_session $pago_cuenta_pagar_session=null);	
		function index(?string $strTypeOnLoadpago_cuenta_pagar='',?string $strTipoPaginaAuxiliarpago_cuenta_pagar='',?string $strTipoUsuarioAuxiliarpago_cuenta_pagar='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadpago_cuenta_pagar='',string $strTipoPaginaAuxiliarpago_cuenta_pagar='',string $strTipoUsuarioAuxiliarpago_cuenta_pagar='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($pago_cuenta_pagarReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(pago_cuenta_pagar $pago_cuenta_pagarClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(pago_cuenta_pagar_session $pago_cuenta_pagar_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(pago_cuenta_pagar_session $pago_cuenta_pagar_session);	
		public function pago_cuenta_pagarsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setpago_cuenta_pagarFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
