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

namespace com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\entity\forma_pago_proveedor;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/forma_pago_proveedor/util/forma_pago_proveedor_carga.php');
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_carga;

use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\util\forma_pago_proveedor_param_return;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\business\logic\forma_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\presentation\session\forma_pago_proveedor_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_forma_pago\business\entity\tipo_forma_pago;
use com\bydan\contabilidad\general\tipo_forma_pago\business\logic\tipo_forma_pago_logic;
use com\bydan\contabilidad\general\tipo_forma_pago\util\tipo_forma_pago_carga;
use com\bydan\contabilidad\general\tipo_forma_pago\util\tipo_forma_pago_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\util\debito_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\debito_cuenta_pagar\presentation\session\debito_cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\util\documento_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\documento_cuenta_pagar\presentation\session\documento_cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\util\pago_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\pago_cuenta_pagar\presentation\session\pago_cuenta_pagar_session;


/*CARGA ARCHIVOS FRAMEWORK*/
forma_pago_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
forma_pago_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
forma_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*forma_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentaspagar/forma_pago_proveedor/presentation/control/forma_pago_proveedor_init_control.php');
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\presentation\control\forma_pago_proveedor_init_control;

include_once('com/bydan/contabilidad/cuentaspagar/forma_pago_proveedor/presentation/control/forma_pago_proveedor_base_control.php');
use com\bydan\contabilidad\cuentaspagar\forma_pago_proveedor\presentation\control\forma_pago_proveedor_base_control;

class forma_pago_proveedor_control extends forma_pago_proveedor_base_control {	
	
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
			else if($action=='registrarSesionParadebito_cuenta_pagars' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idforma_pago_proveedorActual=$this->getDataId();
				$this->registrarSesionParadebito_cuenta_pagars($idforma_pago_proveedorActual);
			}
			else if($action=='registrarSesionParadocumento_cuenta_pagares' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idforma_pago_proveedorActual=$this->getDataId();
				$this->registrarSesionParadocumento_cuenta_pagares($idforma_pago_proveedorActual);
			}
			else if($action=='registrarSesionParapago_cuenta_pagars' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idforma_pago_proveedorActual=$this->getDataId();
				$this->registrarSesionParapago_cuenta_pagars($idforma_pago_proveedorActual);
			} 
			
			
			else if($action=="FK_Idcuenta"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdcuentaParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idtipo_forma_pago"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_forma_pagoParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idforma_pago_proveedorActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idforma_pago_proveedorActual
			}
			else if($action=='abrirBusquedaParatipo_forma_pago') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idforma_pago_proveedorActual=$this->getDataId();
				$this->abrirBusquedaParatipo_forma_pago();//$idforma_pago_proveedorActual
			}
			else if($action=='abrirBusquedaParacuenta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idforma_pago_proveedorActual=$this->getDataId();
				$this->abrirBusquedaParacuenta();//$idforma_pago_proveedorActual
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
					
					$forma_pago_proveedorController = new forma_pago_proveedor_control();
					
					$forma_pago_proveedorController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($forma_pago_proveedorController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$forma_pago_proveedorController = new forma_pago_proveedor_control();
						$forma_pago_proveedorController = $this;
						
						$jsonResponse = json_encode($forma_pago_proveedorController->forma_pago_proveedors);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->forma_pago_proveedorReturnGeneral==null) {
					$this->forma_pago_proveedorReturnGeneral=new forma_pago_proveedor_param_return();
				}
				
				echo($this->forma_pago_proveedorReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$forma_pago_proveedorController=new forma_pago_proveedor_control();
		
		$forma_pago_proveedorController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$forma_pago_proveedorController->usuarioActual=new usuario();
		
		$forma_pago_proveedorController->usuarioActual->setId($this->usuarioActual->getId());
		$forma_pago_proveedorController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$forma_pago_proveedorController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$forma_pago_proveedorController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$forma_pago_proveedorController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$forma_pago_proveedorController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$forma_pago_proveedorController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$forma_pago_proveedorController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $forma_pago_proveedorController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadforma_pago_proveedor= $this->getDataGeneralString('strTypeOnLoadforma_pago_proveedor');
		$strTipoPaginaAuxiliarforma_pago_proveedor= $this->getDataGeneralString('strTipoPaginaAuxiliarforma_pago_proveedor');
		$strTipoUsuarioAuxiliarforma_pago_proveedor= $this->getDataGeneralString('strTipoUsuarioAuxiliarforma_pago_proveedor');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadforma_pago_proveedor,$strTipoPaginaAuxiliarforma_pago_proveedor,$strTipoUsuarioAuxiliarforma_pago_proveedor,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadforma_pago_proveedor!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('forma_pago_proveedor','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(forma_pago_proveedor_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarforma_pago_proveedor,$this->strTipoUsuarioAuxiliarforma_pago_proveedor,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(forma_pago_proveedor_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarforma_pago_proveedor,$this->strTipoUsuarioAuxiliarforma_pago_proveedor,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->forma_pago_proveedorReturnGeneral=new forma_pago_proveedor_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->forma_pago_proveedorReturnGeneral->conGuardarReturnSessionJs=true;
		$this->forma_pago_proveedorReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->forma_pago_proveedorReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->forma_pago_proveedorReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->forma_pago_proveedorReturnGeneral);
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
		$this->forma_pago_proveedorReturnGeneral=new forma_pago_proveedor_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->forma_pago_proveedorReturnGeneral->conGuardarReturnSessionJs=true;
		$this->forma_pago_proveedorReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->forma_pago_proveedorReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->forma_pago_proveedorReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->forma_pago_proveedorReturnGeneral);
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
		$this->forma_pago_proveedorReturnGeneral=new forma_pago_proveedor_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->forma_pago_proveedorReturnGeneral->conGuardarReturnSessionJs=true;
		$this->forma_pago_proveedorReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->forma_pago_proveedorReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->forma_pago_proveedorReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->forma_pago_proveedorReturnGeneral);
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
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
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
			
			
			$this->forma_pago_proveedorReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->forma_pago_proveedorReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->forma_pago_proveedorReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->forma_pago_proveedorReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->forma_pago_proveedorReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->forma_pago_proveedorReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->forma_pago_proveedorReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->forma_pago_proveedorReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->forma_pago_proveedorReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->forma_pago_proveedorReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->forma_pago_proveedorReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->forma_pago_proveedorReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->forma_pago_proveedorReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->forma_pago_proveedorReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->forma_pago_proveedorReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->forma_pago_proveedorReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->forma_pago_proveedorReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->forma_pago_proveedorReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
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
		
		$this->forma_pago_proveedorLogic=new forma_pago_proveedor_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->forma_pago_proveedor=new forma_pago_proveedor();
		
		$this->strTypeOnLoadforma_pago_proveedor='onload';
		$this->strTipoPaginaAuxiliarforma_pago_proveedor='none';
		$this->strTipoUsuarioAuxiliarforma_pago_proveedor='none';	

		$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;
		
		$this->forma_pago_proveedorModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->forma_pago_proveedorControllerAdditional=new forma_pago_proveedor_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(forma_pago_proveedor_session $forma_pago_proveedor_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($forma_pago_proveedor_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadforma_pago_proveedor='',?string $strTipoPaginaAuxiliarforma_pago_proveedor='',?string $strTipoUsuarioAuxiliarforma_pago_proveedor='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadforma_pago_proveedor=$strTypeOnLoadforma_pago_proveedor;
			$this->strTipoPaginaAuxiliarforma_pago_proveedor=$strTipoPaginaAuxiliarforma_pago_proveedor;
			$this->strTipoUsuarioAuxiliarforma_pago_proveedor=$strTipoUsuarioAuxiliarforma_pago_proveedor;
	
			if($strTipoUsuarioAuxiliarforma_pago_proveedor=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->forma_pago_proveedor=new forma_pago_proveedor();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Forma Pago Proveedores';
			
			
			$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));
							
			if($forma_pago_proveedor_session==null) {
				$forma_pago_proveedor_session=new forma_pago_proveedor_session();
				
				/*$this->Session->write('forma_pago_proveedor_session',$forma_pago_proveedor_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($forma_pago_proveedor_session->strFuncionJsPadre!=null && $forma_pago_proveedor_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$forma_pago_proveedor_session->strFuncionJsPadre;
				
				$forma_pago_proveedor_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($forma_pago_proveedor_session);
			
			if($strTypeOnLoadforma_pago_proveedor!=null && $strTypeOnLoadforma_pago_proveedor=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$forma_pago_proveedor_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$forma_pago_proveedor_session->setPaginaPopupVariables(true);
				}
				
				if($forma_pago_proveedor_session->intNumeroPaginacion==forma_pago_proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$forma_pago_proveedor_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,forma_pago_proveedor_util::$STR_SESSION_NAME,'cuentaspagar');																
			
			} else if($strTypeOnLoadforma_pago_proveedor!=null && $strTypeOnLoadforma_pago_proveedor=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$forma_pago_proveedor_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;*/
				
				if($forma_pago_proveedor_session->intNumeroPaginacion==forma_pago_proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$forma_pago_proveedor_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarforma_pago_proveedor!=null && $strTipoPaginaAuxiliarforma_pago_proveedor=='none') {
				/*$forma_pago_proveedor_session->strStyleDivHeader='display:table-row';*/
				
				/*$forma_pago_proveedor_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarforma_pago_proveedor!=null && $strTipoPaginaAuxiliarforma_pago_proveedor=='iframe') {
					/*
					$forma_pago_proveedor_session->strStyleDivArbol='display:none';
					$forma_pago_proveedor_session->strStyleDivHeader='display:none';
					$forma_pago_proveedor_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$forma_pago_proveedor_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->forma_pago_proveedorClase=new forma_pago_proveedor();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=forma_pago_proveedor_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(forma_pago_proveedor_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->forma_pago_proveedorLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->forma_pago_proveedorLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$debitocuentapagarLogic=new debito_cuenta_pagar_logic();
			//$documentocuentapagarLogic=new documento_cuenta_pagar_logic();
			//$pagocuentapagarLogic=new pago_cuenta_pagar_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->forma_pago_proveedorLogic=new forma_pago_proveedor_logic();*/
			
			
			$this->forma_pago_proveedorsModel=null;
			/*new ListDataModel();*/
			
			/*$this->forma_pago_proveedorsModel.setWrappedData(forma_pago_proveedorLogic->getforma_pago_proveedors());*/
						
			$this->forma_pago_proveedors= array();
			$this->forma_pago_proveedorsEliminados=array();
			$this->forma_pago_proveedorsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= forma_pago_proveedor_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= forma_pago_proveedor_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->forma_pago_proveedor= new forma_pago_proveedor();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcuenta='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idtipo_forma_pago='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarforma_pago_proveedor!=null && $strTipoUsuarioAuxiliarforma_pago_proveedor!='none' && $strTipoUsuarioAuxiliarforma_pago_proveedor!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarforma_pago_proveedor);
																
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
				if($strTipoUsuarioAuxiliarforma_pago_proveedor!=null && $strTipoUsuarioAuxiliarforma_pago_proveedor!='none' && $strTipoUsuarioAuxiliarforma_pago_proveedor!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarforma_pago_proveedor);
																
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
				if($strTipoUsuarioAuxiliarforma_pago_proveedor==null || $strTipoUsuarioAuxiliarforma_pago_proveedor=='none' || $strTipoUsuarioAuxiliarforma_pago_proveedor=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarforma_pago_proveedor,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, forma_pago_proveedor_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, forma_pago_proveedor_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina forma_pago_proveedor');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($forma_pago_proveedor_session);
			
			$this->getSetBusquedasSesionConfig($forma_pago_proveedor_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteforma_pago_proveedors($this->strAccionBusqueda,$this->forma_pago_proveedorLogic->getforma_pago_proveedors());*/
				} else if($this->strGenerarReporte=='Html')	{
					$forma_pago_proveedor_session->strServletGenerarHtmlReporte='forma_pago_proveedorServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(forma_pago_proveedor_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(forma_pago_proveedor_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($forma_pago_proveedor_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarforma_pago_proveedor!=null && $strTipoUsuarioAuxiliarforma_pago_proveedor=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($forma_pago_proveedor_session);
			}
								
			$this->set(forma_pago_proveedor_util::$STR_SESSION_NAME, $forma_pago_proveedor_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($forma_pago_proveedor_session);
			
			/*
			$this->forma_pago_proveedor->recursive = 0;
			
			$this->forma_pago_proveedors=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('forma_pago_proveedors', $this->forma_pago_proveedors);
			
			$this->set(forma_pago_proveedor_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->forma_pago_proveedorActual =$this->forma_pago_proveedorClase;
			
			/*$this->forma_pago_proveedorActual =$this->migrarModelforma_pago_proveedor($this->forma_pago_proveedorClase);*/
			
			$this->returnHtml(false);
			
			$this->set(forma_pago_proveedor_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=forma_pago_proveedor_util::$STR_NOMBRE_OPCION;
				
			if(forma_pago_proveedor_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=forma_pago_proveedor_util::$STR_MODULO_OPCION.forma_pago_proveedor_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(forma_pago_proveedor_util::$STR_SESSION_NAME,serialize($forma_pago_proveedor_session));
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
			/*$forma_pago_proveedorClase= (forma_pago_proveedor) forma_pago_proveedorsModel.getRowData();*/
			
			$this->forma_pago_proveedorClase->setId($this->forma_pago_proveedor->getId());	
			$this->forma_pago_proveedorClase->setVersionRow($this->forma_pago_proveedor->getVersionRow());	
			$this->forma_pago_proveedorClase->setVersionRow($this->forma_pago_proveedor->getVersionRow());	
			$this->forma_pago_proveedorClase->setid_empresa($this->forma_pago_proveedor->getid_empresa());	
			$this->forma_pago_proveedorClase->setid_tipo_forma_pago($this->forma_pago_proveedor->getid_tipo_forma_pago());	
			$this->forma_pago_proveedorClase->setcodigo($this->forma_pago_proveedor->getcodigo());	
			$this->forma_pago_proveedorClase->setnombre($this->forma_pago_proveedor->getnombre());	
			$this->forma_pago_proveedorClase->setpredeterminado($this->forma_pago_proveedor->getpredeterminado());	
			$this->forma_pago_proveedorClase->setid_cuenta($this->forma_pago_proveedor->getid_cuenta());	
			$this->forma_pago_proveedorClase->setcuenta_contable($this->forma_pago_proveedor->getcuenta_contable());	
		
			/*$this->Session->write('forma_pago_proveedorVersionRowActual', forma_pago_proveedor.getVersionRow());*/
			
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
			
			$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));
						
			if($forma_pago_proveedor_session==null) {
				$forma_pago_proveedor_session=new forma_pago_proveedor_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('forma_pago_proveedor', $this->forma_pago_proveedor->read(null, $id));
	
			
			$this->forma_pago_proveedor->recursive = 0;
			
			$this->forma_pago_proveedors=$this->paginate();
			
			$this->set('forma_pago_proveedors', $this->forma_pago_proveedors);
	
			if (empty($this->data)) {
				$this->data = $this->forma_pago_proveedor->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->forma_pago_proveedorLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->forma_pago_proveedorClase);
			
			$this->forma_pago_proveedorActual=$this->forma_pago_proveedorClase;
			
			/*$this->forma_pago_proveedorActual =$this->migrarModelforma_pago_proveedor($this->forma_pago_proveedorClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->forma_pago_proveedorLogic->getforma_pago_proveedors(),$this->forma_pago_proveedorActual);
			
			$this->actualizarControllerConReturnGeneral($this->forma_pago_proveedorReturnGeneral);
			
			//$this->forma_pago_proveedorReturnGeneral=$this->forma_pago_proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->forma_pago_proveedorLogic->getforma_pago_proveedors(),$this->forma_pago_proveedorActual,$this->forma_pago_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));
						
			if($forma_pago_proveedor_session==null) {
				$forma_pago_proveedor_session=new forma_pago_proveedor_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoforma_pago_proveedor', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->forma_pago_proveedorClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->forma_pago_proveedorClase);
			
			$this->forma_pago_proveedorActual =$this->forma_pago_proveedorClase;
			
			/*$this->forma_pago_proveedorActual =$this->migrarModelforma_pago_proveedor($this->forma_pago_proveedorClase);*/
			
			$this->setforma_pago_proveedorFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->forma_pago_proveedorLogic->getforma_pago_proveedors(),$this->forma_pago_proveedor);
			
			$this->actualizarControllerConReturnGeneral($this->forma_pago_proveedorReturnGeneral);
			
			//this->forma_pago_proveedorReturnGeneral=$this->forma_pago_proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->forma_pago_proveedorLogic->getforma_pago_proveedors(),$this->forma_pago_proveedor,$this->forma_pago_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->forma_pago_proveedorReturnGeneral->getforma_pago_proveedor()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idtipo_forma_pagoDefaultFK!=null && $this->idtipo_forma_pagoDefaultFK > -1) {
				$this->forma_pago_proveedorReturnGeneral->getforma_pago_proveedor()->setid_tipo_forma_pago($this->idtipo_forma_pagoDefaultFK);
			}

			if($this->idcuentaDefaultFK!=null && $this->idcuentaDefaultFK > -1) {
				$this->forma_pago_proveedorReturnGeneral->getforma_pago_proveedor()->setid_cuenta($this->idcuentaDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->forma_pago_proveedorReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->forma_pago_proveedorReturnGeneral->getforma_pago_proveedor(),$this->forma_pago_proveedorActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyforma_pago_proveedor($this->forma_pago_proveedorReturnGeneral->getforma_pago_proveedor());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioforma_pago_proveedor($this->forma_pago_proveedorReturnGeneral->getforma_pago_proveedor());*/
			}
			
			if($this->forma_pago_proveedorReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->forma_pago_proveedorReturnGeneral->getforma_pago_proveedor(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualforma_pago_proveedor($this->forma_pago_proveedor,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->forma_pago_proveedorsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->forma_pago_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->forma_pago_proveedorsAuxiliar=array();
			}
			
			if(count($this->forma_pago_proveedorsAuxiliar)==2) {
				$forma_pago_proveedorOrigen=$this->forma_pago_proveedorsAuxiliar[0];
				$forma_pago_proveedorDestino=$this->forma_pago_proveedorsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($forma_pago_proveedorOrigen,$forma_pago_proveedorDestino,true,false,false);
				
				$this->actualizarLista($forma_pago_proveedorDestino,$this->forma_pago_proveedors);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->forma_pago_proveedorsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->forma_pago_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->forma_pago_proveedorsAuxiliar=array();
			}
			
			if(count($this->forma_pago_proveedorsAuxiliar) > 0) {
				foreach ($this->forma_pago_proveedorsAuxiliar as $forma_pago_proveedorSeleccionado) {
					$this->forma_pago_proveedor=new forma_pago_proveedor();
					
					$this->setCopiarVariablesObjetos($forma_pago_proveedorSeleccionado,$this->forma_pago_proveedor,true,true,false);
						
					$this->forma_pago_proveedors[]=$this->forma_pago_proveedor;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->forma_pago_proveedorsEliminados as $forma_pago_proveedorEliminado) {
				$this->forma_pago_proveedorLogic->forma_pago_proveedors[]=$forma_pago_proveedorEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->forma_pago_proveedor=new forma_pago_proveedor();
							
				$this->forma_pago_proveedors[]=$this->forma_pago_proveedor;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
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
		
		$forma_pago_proveedorActual=new forma_pago_proveedor();
		
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
				
				$forma_pago_proveedorActual=$this->forma_pago_proveedors[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $forma_pago_proveedorActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $forma_pago_proveedorActual->setid_tipo_forma_pago((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $forma_pago_proveedorActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $forma_pago_proveedorActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $forma_pago_proveedorActual->setpredeterminado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_7')));  } else { $forma_pago_proveedorActual->setpredeterminado(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $forma_pago_proveedorActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $forma_pago_proveedorActual->setcuenta_contable($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->forma_pago_proveedorsAuxiliar=array();		 
		/*$this->forma_pago_proveedorsEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->forma_pago_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->forma_pago_proveedorsAuxiliar=array();
		}
			
		if(count($this->forma_pago_proveedorsAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->forma_pago_proveedorsAuxiliar as $forma_pago_proveedorAuxLocal) {				
				
				foreach($this->forma_pago_proveedors as $forma_pago_proveedorLocal) {
					if($forma_pago_proveedorLocal->getId()==$forma_pago_proveedorAuxLocal->getId()) {
						$forma_pago_proveedorLocal->setIsDeleted(true);
						
						/*$this->forma_pago_proveedorsEliminados[]=$forma_pago_proveedorLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->forma_pago_proveedorLogic->setforma_pago_proveedors($this->forma_pago_proveedors);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
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
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadforma_pago_proveedor='',string $strTipoPaginaAuxiliarforma_pago_proveedor='',string $strTipoUsuarioAuxiliarforma_pago_proveedor='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadforma_pago_proveedor,$strTipoPaginaAuxiliarforma_pago_proveedor,$strTipoUsuarioAuxiliarforma_pago_proveedor,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->forma_pago_proveedors) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=forma_pago_proveedor_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=forma_pago_proveedor_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=forma_pago_proveedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));
						
			if($forma_pago_proveedor_session==null) {
				$forma_pago_proveedor_session=new forma_pago_proveedor_session();
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
					/*$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;*/
					
					if($forma_pago_proveedor_session->intNumeroPaginacion==forma_pago_proveedor_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$forma_pago_proveedor_session->intNumeroPaginacion;
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
			
			$this->forma_pago_proveedorsEliminados=array();
			
			/*$this->forma_pago_proveedorLogic->setConnexion($connexion);*/
			
			$this->forma_pago_proveedorLogic->setIsConDeep(true);
			
			$this->forma_pago_proveedorLogic->getforma_pago_proveedorDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_forma_pago');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			
			$this->forma_pago_proveedorLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->forma_pago_proveedorLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->forma_pago_proveedorLogic->getforma_pago_proveedors()==null|| count($this->forma_pago_proveedorLogic->getforma_pago_proveedors())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->forma_pago_proveedors=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->forma_pago_proveedorLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->forma_pago_proveedorsReporte=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();
									
						/*$this->generarReportes('Todos',$this->forma_pago_proveedorLogic->getforma_pago_proveedors());*/
					
						$this->forma_pago_proveedorLogic->setforma_pago_proveedors($this->forma_pago_proveedors);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->forma_pago_proveedorLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->forma_pago_proveedorLogic->getforma_pago_proveedors()==null|| count($this->forma_pago_proveedorLogic->getforma_pago_proveedors())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->forma_pago_proveedors=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->forma_pago_proveedorLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->forma_pago_proveedorsReporte=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();
									
						/*$this->generarReportes('Todos',$this->forma_pago_proveedorLogic->getforma_pago_proveedors());*/
					
						$this->forma_pago_proveedorLogic->setforma_pago_proveedors($this->forma_pago_proveedors);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idforma_pago_proveedor=0;*/
				
				if($forma_pago_proveedor_session->bitBusquedaDesdeFKSesionFK!=null && $forma_pago_proveedor_session->bitBusquedaDesdeFKSesionFK==true) {
					if($forma_pago_proveedor_session->bigIdActualFK!=null && $forma_pago_proveedor_session->bigIdActualFK!=0)	{
						$this->idforma_pago_proveedor=$forma_pago_proveedor_session->bigIdActualFK;	
					}
					
					$forma_pago_proveedor_session->bitBusquedaDesdeFKSesionFK=false;
					
					$forma_pago_proveedor_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idforma_pago_proveedor=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idforma_pago_proveedor=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->forma_pago_proveedorLogic->getEntity($this->idforma_pago_proveedor);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*forma_pago_proveedorLogicAdditional::getDetalleIndicePorId($idforma_pago_proveedor);*/

				
				if($this->forma_pago_proveedorLogic->getforma_pago_proveedor()!=null) {
					$this->forma_pago_proveedorLogic->setforma_pago_proveedors(array());
					$this->forma_pago_proveedorLogic->forma_pago_proveedors[]=$this->forma_pago_proveedorLogic->getforma_pago_proveedor();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcuenta')
			{

				if($forma_pago_proveedor_session->bigidcuentaActual!=null && $forma_pago_proveedor_session->bigidcuentaActual!=0)
				{
					$this->id_cuentaFK_Idcuenta=$forma_pago_proveedor_session->bigidcuentaActual;
					$forma_pago_proveedor_session->bigidcuentaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->forma_pago_proveedorLogic->getsFK_Idcuenta($finalQueryPaginacion,$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//forma_pago_proveedorLogicAdditional::getDetalleIndiceFK_Idcuenta($this->id_cuentaFK_Idcuenta);


					if($this->forma_pago_proveedorLogic->getforma_pago_proveedors()==null || count($this->forma_pago_proveedorLogic->getforma_pago_proveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$forma_pago_proveedors=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->forma_pago_proveedorLogic->getsFK_Idcuenta('',$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->forma_pago_proveedorsReporte=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteforma_pago_proveedors("FK_Idcuenta",$this->forma_pago_proveedorLogic->getforma_pago_proveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->forma_pago_proveedorLogic->setforma_pago_proveedors($forma_pago_proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($forma_pago_proveedor_session->bigidempresaActual!=null && $forma_pago_proveedor_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$forma_pago_proveedor_session->bigidempresaActual;
					$forma_pago_proveedor_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->forma_pago_proveedorLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//forma_pago_proveedorLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->forma_pago_proveedorLogic->getforma_pago_proveedors()==null || count($this->forma_pago_proveedorLogic->getforma_pago_proveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$forma_pago_proveedors=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->forma_pago_proveedorLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->forma_pago_proveedorsReporte=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteforma_pago_proveedors("FK_Idempresa",$this->forma_pago_proveedorLogic->getforma_pago_proveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->forma_pago_proveedorLogic->setforma_pago_proveedors($forma_pago_proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_forma_pago')
			{

				if($forma_pago_proveedor_session->bigidtipo_forma_pagoActual!=null && $forma_pago_proveedor_session->bigidtipo_forma_pagoActual!=0)
				{
					$this->id_tipo_forma_pagoFK_Idtipo_forma_pago=$forma_pago_proveedor_session->bigidtipo_forma_pagoActual;
					$forma_pago_proveedor_session->bigidtipo_forma_pagoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->forma_pago_proveedorLogic->getsFK_Idtipo_forma_pago($finalQueryPaginacion,$this->pagination,$this->id_tipo_forma_pagoFK_Idtipo_forma_pago);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//forma_pago_proveedorLogicAdditional::getDetalleIndiceFK_Idtipo_forma_pago($this->id_tipo_forma_pagoFK_Idtipo_forma_pago);


					if($this->forma_pago_proveedorLogic->getforma_pago_proveedors()==null || count($this->forma_pago_proveedorLogic->getforma_pago_proveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$forma_pago_proveedors=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->forma_pago_proveedorLogic->getsFK_Idtipo_forma_pago('',$this->pagination,$this->id_tipo_forma_pagoFK_Idtipo_forma_pago);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->forma_pago_proveedorsReporte=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteforma_pago_proveedors("FK_Idtipo_forma_pago",$this->forma_pago_proveedorLogic->getforma_pago_proveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->forma_pago_proveedorLogic->setforma_pago_proveedors($forma_pago_proveedors);
					}
				//}

			} 
		
		$forma_pago_proveedor_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$forma_pago_proveedor_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->forma_pago_proveedorLogic->loadForeignsKeysDescription();*/
		
		$this->forma_pago_proveedors=$this->forma_pago_proveedorLogic->getforma_pago_proveedors();
		
		if($this->forma_pago_proveedorsEliminados==null) {
			$this->forma_pago_proveedorsEliminados=array();
		}
		
		$this->Session->write(forma_pago_proveedor_util::$STR_SESSION_NAME.'Lista',serialize($this->forma_pago_proveedors));
		$this->Session->write(forma_pago_proveedor_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->forma_pago_proveedorsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(forma_pago_proveedor_util::$STR_SESSION_NAME,serialize($forma_pago_proveedor_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idforma_pago_proveedor=$idGeneral;
			
			$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
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
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}

			if(count($this->forma_pago_proveedors) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
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
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuentaFK_Idcuenta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta','cmbid_cuenta');

			$this->strAccionBusqueda='FK_Idcuenta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
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
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_forma_pagoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_forma_pagoFK_Idtipo_forma_pago=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_forma_pago','cmbid_tipo_forma_pago');

			$this->strAccionBusqueda='FK_Idtipo_forma_pago';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcuenta($strFinalQuery,$id_cuenta)
	{
		try
		{

			$this->forma_pago_proveedorLogic->getsFK_Idcuenta($strFinalQuery,new Pagination(),$id_cuenta);
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

			$this->forma_pago_proveedorLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_forma_pago($strFinalQuery,$id_tipo_forma_pago)
	{
		try
		{

			$this->forma_pago_proveedorLogic->getsFK_Idtipo_forma_pago($strFinalQuery,new Pagination(),$id_tipo_forma_pago);
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
			
			
			$forma_pago_proveedorForeignKey=new forma_pago_proveedor_param_return(); //forma_pago_proveedorForeignKey();
			
			$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));
						
			if($forma_pago_proveedor_session==null) {
				$forma_pago_proveedor_session=new forma_pago_proveedor_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$forma_pago_proveedorForeignKey=$this->forma_pago_proveedorLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$forma_pago_proveedor_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$forma_pago_proveedorForeignKey->empresasFK;
				$this->idempresaDefaultFK=$forma_pago_proveedorForeignKey->idempresaDefaultFK;
			}

			if($forma_pago_proveedor_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_forma_pago',$this->strRecargarFkTipos,',')) {
				$this->tipo_forma_pagosFK=$forma_pago_proveedorForeignKey->tipo_forma_pagosFK;
				$this->idtipo_forma_pagoDefaultFK=$forma_pago_proveedorForeignKey->idtipo_forma_pagoDefaultFK;
			}

			if($forma_pago_proveedor_session->bitBusquedaDesdeFKSesiontipo_forma_pago) {
				$this->setVisibleBusquedasParatipo_forma_pago(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$this->strRecargarFkTipos,',')) {
				$this->cuentasFK=$forma_pago_proveedorForeignKey->cuentasFK;
				$this->idcuentaDefaultFK=$forma_pago_proveedorForeignKey->idcuentaDefaultFK;
			}

			if($forma_pago_proveedor_session->bitBusquedaDesdeFKSesioncuenta) {
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
	
	function cargarCombosFKFromReturnGeneral($forma_pago_proveedorReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$forma_pago_proveedorReturnGeneral->strRecargarFkTipos;
			
			


			if($forma_pago_proveedorReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$forma_pago_proveedorReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$forma_pago_proveedorReturnGeneral->idempresaDefaultFK;
			}


			if($forma_pago_proveedorReturnGeneral->con_tipo_forma_pagosFK==true) {
				$this->tipo_forma_pagosFK=$forma_pago_proveedorReturnGeneral->tipo_forma_pagosFK;
				$this->idtipo_forma_pagoDefaultFK=$forma_pago_proveedorReturnGeneral->idtipo_forma_pagoDefaultFK;
			}


			if($forma_pago_proveedorReturnGeneral->con_cuentasFK==true) {
				$this->cuentasFK=$forma_pago_proveedorReturnGeneral->cuentasFK;
				$this->idcuentaDefaultFK=$forma_pago_proveedorReturnGeneral->idcuentaDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(forma_pago_proveedor_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));
		
		if($forma_pago_proveedor_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($forma_pago_proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($forma_pago_proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_forma_pago_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_forma_pago';
			}
			else if($forma_pago_proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			
			$forma_pago_proveedor_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}						
			
			$this->forma_pago_proveedorsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->forma_pago_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->forma_pago_proveedorsAuxiliar=array();
			}
			
			if(count($this->forma_pago_proveedorsAuxiliar) > 0) {
				
				foreach ($this->forma_pago_proveedorsAuxiliar as $forma_pago_proveedorSeleccionado) {
					$this->eliminarTablaBase($forma_pago_proveedorSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('debito_cuenta_pagar');
			$tipoRelacionReporte->setsDescripcion('Debito Cuenta Pagars');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('documento_cuenta_pagar');
			$tipoRelacionReporte->setsDescripcion('Documentos Cuentas por Pagares');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('pago_cuenta_pagar');
			$tipoRelacionReporte->setsDescripcion('Pago Cuenta Pagars');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=debito_cuenta_pagar_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=documento_cuenta_pagar_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=pago_cuenta_pagar_util::$STR_NOMBRE_CLASE;
		
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


	public function gettipo_forma_pagosFKListSelectItem() 
	{
		$tipo_forma_pagosList=array();

		$item=null;

		foreach($this->tipo_forma_pagosFK as $tipo_forma_pago)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_forma_pago->getnombre());
			$item->setValue($tipo_forma_pago->getId());
			$tipo_forma_pagosList[]=$item;
		}

		return $tipo_forma_pagosList;
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
				$this->forma_pago_proveedorLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;
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
				$this->forma_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->forma_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$forma_pago_proveedorsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->forma_pago_proveedors as $forma_pago_proveedorLocal) {
				if($forma_pago_proveedorLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->forma_pago_proveedor=new forma_pago_proveedor();
				
				$this->forma_pago_proveedor->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->forma_pago_proveedors[]=$this->forma_pago_proveedor;*/
				
				$forma_pago_proveedorsNuevos[]=$this->forma_pago_proveedor;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_forma_pago');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->forma_pago_proveedorLogic->setforma_pago_proveedors($forma_pago_proveedorsNuevos);
					
				$this->forma_pago_proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($forma_pago_proveedorsNuevos as $forma_pago_proveedorNuevo) {
					$this->forma_pago_proveedors[]=$forma_pago_proveedorNuevo;
				}
				
				/*$this->forma_pago_proveedors[]=$forma_pago_proveedorsNuevos;*/
				
				$this->forma_pago_proveedorLogic->setforma_pago_proveedors($this->forma_pago_proveedors);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($forma_pago_proveedorsNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));

		if($forma_pago_proveedor_session==null) {
			$forma_pago_proveedor_session=new forma_pago_proveedor_session();
		}
		
		if($forma_pago_proveedor_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($forma_pago_proveedor_session->bigidempresaActual!=null && $forma_pago_proveedor_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($forma_pago_proveedor_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=forma_pago_proveedor_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostipo_forma_pagosFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_forma_pagoLogic= new tipo_forma_pago_logic();
		$pagination= new Pagination();
		$this->tipo_forma_pagosFK=array();

		$tipo_forma_pagoLogic->setConnexion($connexion);
		$tipo_forma_pagoLogic->gettipo_forma_pagoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));

		if($forma_pago_proveedor_session==null) {
			$forma_pago_proveedor_session=new forma_pago_proveedor_session();
		}
		
		if($forma_pago_proveedor_session->bitBusquedaDesdeFKSesiontipo_forma_pago!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_forma_pago_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_forma_pago=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_forma_pago=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_forma_pago, '');
				$finalQueryGlobaltipo_forma_pago.=tipo_forma_pago_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_forma_pago.$strRecargarFkQuery;		

				$tipo_forma_pagoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_forma_pagosFK($tipo_forma_pagoLogic->gettipo_forma_pagos());

		} else {
			$this->setVisibleBusquedasParatipo_forma_pago(true);


			if($forma_pago_proveedor_session->bigidtipo_forma_pagoActual!=null && $forma_pago_proveedor_session->bigidtipo_forma_pagoActual > 0) {
				$tipo_forma_pagoLogic->getEntity($forma_pago_proveedor_session->bigidtipo_forma_pagoActual);//WithConnection

				$this->tipo_forma_pagosFK[$tipo_forma_pagoLogic->gettipo_forma_pago()->getId()]=forma_pago_proveedor_util::gettipo_forma_pagoDescripcion($tipo_forma_pagoLogic->gettipo_forma_pago());
				$this->idtipo_forma_pagoDefaultFK=$tipo_forma_pagoLogic->gettipo_forma_pago()->getId();
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

		$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));

		if($forma_pago_proveedor_session==null) {
			$forma_pago_proveedor_session=new forma_pago_proveedor_session();
		}
		
		if($forma_pago_proveedor_session->bitBusquedaDesdeFKSesioncuenta!=true) {
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


			if($forma_pago_proveedor_session->bigidcuentaActual!=null && $forma_pago_proveedor_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($forma_pago_proveedor_session->bigidcuentaActual);//WithConnection

				$this->cuentasFK[$cuentaLogic->getcuenta()->getId()]=forma_pago_proveedor_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$this->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=forma_pago_proveedor_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombostipo_forma_pagosFK($tipo_forma_pagos){

		foreach ($tipo_forma_pagos as $tipo_forma_pagoLocal ) {
			if($this->idtipo_forma_pagoDefaultFK==0) {
				$this->idtipo_forma_pagoDefaultFK=$tipo_forma_pagoLocal->getId();
			}

			$this->tipo_forma_pagosFK[$tipo_forma_pagoLocal->getId()]=forma_pago_proveedor_util::gettipo_forma_pagoDescripcion($tipo_forma_pagoLocal);
		}
	}

	public function prepararComboscuentasFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuentaDefaultFK==0) {
				$this->idcuentaDefaultFK=$cuentaLocal->getId();
			}

			$this->cuentasFK[$cuentaLocal->getId()]=forma_pago_proveedor_util::getcuentaDescripcion($cuentaLocal);
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

			$strDescripcionempresa=forma_pago_proveedor_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripciontipo_forma_pagoFK($idtipo_forma_pago,$connexion=null){
		$tipo_forma_pagoLogic= new tipo_forma_pago_logic();
		$tipo_forma_pagoLogic->setConnexion($connexion);
		$tipo_forma_pagoLogic->gettipo_forma_pagoDataAccess()->isForFKData=true;
		$strDescripciontipo_forma_pago='';

		if($idtipo_forma_pago!=null && $idtipo_forma_pago!='' && $idtipo_forma_pago!='null') {
			if($connexion!=null) {
				$tipo_forma_pagoLogic->getEntity($idtipo_forma_pago);//WithConnection
			} else {
				$tipo_forma_pagoLogic->getEntityWithConnection($idtipo_forma_pago);//
			}

			$strDescripciontipo_forma_pago=forma_pago_proveedor_util::gettipo_forma_pagoDescripcion($tipo_forma_pagoLogic->gettipo_forma_pago());

		} else {
			$strDescripciontipo_forma_pago='null';
		}

		return $strDescripciontipo_forma_pago;
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

			$strDescripcioncuenta=forma_pago_proveedor_util::getcuentaDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(forma_pago_proveedor $forma_pago_proveedorClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$forma_pago_proveedorClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
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
		$this->strVisibleFK_Idtipo_forma_pago=$strParaVisibleNegacionempresa;
	}

	public function setVisibleBusquedasParatipo_forma_pago($isParatipo_forma_pago){
		$strParaVisibletipo_forma_pago='display:table-row';
		$strParaVisibleNegaciontipo_forma_pago='display:none';

		if($isParatipo_forma_pago) {
			$strParaVisibletipo_forma_pago='display:table-row';
			$strParaVisibleNegaciontipo_forma_pago='display:none';
		} else {
			$strParaVisibletipo_forma_pago='display:none';
			$strParaVisibleNegaciontipo_forma_pago='display:table-row';
		}


		$strParaVisibleNegaciontipo_forma_pago=trim($strParaVisibleNegaciontipo_forma_pago);

		$this->strVisibleFK_Idcuenta=$strParaVisibleNegaciontipo_forma_pago;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_forma_pago;
		$this->strVisibleFK_Idtipo_forma_pago=$strParaVisibletipo_forma_pago;
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
		$this->strVisibleFK_Idtipo_forma_pago=$strParaVisibleNegacioncuenta;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idforma_pago_proveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idforma_pago_proveedorActual=$idforma_pago_proveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.forma_pago_proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.forma_pago_proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarforma_pago_proveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_forma_pago() {//$idforma_pago_proveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idforma_pago_proveedorActual=$idforma_pago_proveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_forma_pago_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.forma_pago_proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_forma_pago(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_forma_pago_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.forma_pago_proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_forma_pago(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_forma_pago_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarforma_pago_proveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta() {//$idforma_pago_proveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idforma_pago_proveedorActual=$idforma_pago_proveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.forma_pago_proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.forma_pago_proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarforma_pago_proveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParadebito_cuenta_pagars(int $idforma_pago_proveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idforma_pago_proveedorActual=$idforma_pago_proveedorActual;

		$bitPaginaPopupdebito_cuenta_pagar=false;

		try {

			$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));

			if($forma_pago_proveedor_session==null) {
				$forma_pago_proveedor_session=new forma_pago_proveedor_session();
			}

			$debito_cuenta_pagar_session=unserialize($this->Session->read(debito_cuenta_pagar_util::$STR_SESSION_NAME));

			if($debito_cuenta_pagar_session==null) {
				$debito_cuenta_pagar_session=new debito_cuenta_pagar_session();
			}

			$debito_cuenta_pagar_session->strUltimaBusqueda='FK_Idforma_pago_proveedor';
			$debito_cuenta_pagar_session->strPathNavegacionActual=$forma_pago_proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.debito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
			$debito_cuenta_pagar_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupdebito_cuenta_pagar=$debito_cuenta_pagar_session->bitPaginaPopup;
			$debito_cuenta_pagar_session->setPaginaPopupVariables(true);
			$bitPaginaPopupdebito_cuenta_pagar=$debito_cuenta_pagar_session->bitPaginaPopup;
			$debito_cuenta_pagar_session->bitPermiteNavegacionHaciaFKDesde=false;
			$debito_cuenta_pagar_session->strNombrePaginaNavegacionHaciaFKDesde=forma_pago_proveedor_util::$STR_NOMBRE_OPCION;
			$debito_cuenta_pagar_session->bitBusquedaDesdeFKSesionforma_pago_proveedor=true;
			$debito_cuenta_pagar_session->bigidforma_pago_proveedorActual=$this->idforma_pago_proveedorActual;

			$forma_pago_proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$forma_pago_proveedor_session->bigIdActualFK=$this->idforma_pago_proveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"debito_cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=forma_pago_proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"debito_cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(forma_pago_proveedor_util::$STR_SESSION_NAME,serialize($forma_pago_proveedor_session));
			$this->Session->write(debito_cuenta_pagar_util::$STR_SESSION_NAME,serialize($debito_cuenta_pagar_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupdebito_cuenta_pagar!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',debito_cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(debito_cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarforma_pago_proveedor,$this->strTipoUsuarioAuxiliarforma_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',debito_cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(debito_cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliarforma_pago_proveedor,$this->strTipoUsuarioAuxiliarforma_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParadocumento_cuenta_pagares(int $idforma_pago_proveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idforma_pago_proveedorActual=$idforma_pago_proveedorActual;

		$bitPaginaPopupdocumento_cuenta_pagar=false;

		try {

			$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));

			if($forma_pago_proveedor_session==null) {
				$forma_pago_proveedor_session=new forma_pago_proveedor_session();
			}

			$documento_cuenta_pagar_session=unserialize($this->Session->read(documento_cuenta_pagar_util::$STR_SESSION_NAME));

			if($documento_cuenta_pagar_session==null) {
				$documento_cuenta_pagar_session=new documento_cuenta_pagar_session();
			}

			$documento_cuenta_pagar_session->strUltimaBusqueda='FK_Idforma_pago_proveedor';
			$documento_cuenta_pagar_session->strPathNavegacionActual=$forma_pago_proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.documento_cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
			$documento_cuenta_pagar_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupdocumento_cuenta_pagar=$documento_cuenta_pagar_session->bitPaginaPopup;
			$documento_cuenta_pagar_session->setPaginaPopupVariables(true);
			$bitPaginaPopupdocumento_cuenta_pagar=$documento_cuenta_pagar_session->bitPaginaPopup;
			$documento_cuenta_pagar_session->bitPermiteNavegacionHaciaFKDesde=false;
			$documento_cuenta_pagar_session->strNombrePaginaNavegacionHaciaFKDesde=forma_pago_proveedor_util::$STR_NOMBRE_OPCION;
			$documento_cuenta_pagar_session->bitBusquedaDesdeFKSesionforma_pago_proveedor=true;
			$documento_cuenta_pagar_session->bigidforma_pago_proveedorActual=$this->idforma_pago_proveedorActual;

			$forma_pago_proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$forma_pago_proveedor_session->bigIdActualFK=$this->idforma_pago_proveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"documento_cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=forma_pago_proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"documento_cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(forma_pago_proveedor_util::$STR_SESSION_NAME,serialize($forma_pago_proveedor_session));
			$this->Session->write(documento_cuenta_pagar_util::$STR_SESSION_NAME,serialize($documento_cuenta_pagar_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupdocumento_cuenta_pagar!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',documento_cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(documento_cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarforma_pago_proveedor,$this->strTipoUsuarioAuxiliarforma_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',documento_cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(documento_cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliarforma_pago_proveedor,$this->strTipoUsuarioAuxiliarforma_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParapago_cuenta_pagars(int $idforma_pago_proveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idforma_pago_proveedorActual=$idforma_pago_proveedorActual;

		$bitPaginaPopuppago_cuenta_pagar=false;

		try {

			$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));

			if($forma_pago_proveedor_session==null) {
				$forma_pago_proveedor_session=new forma_pago_proveedor_session();
			}

			$pago_cuenta_pagar_session=unserialize($this->Session->read(pago_cuenta_pagar_util::$STR_SESSION_NAME));

			if($pago_cuenta_pagar_session==null) {
				$pago_cuenta_pagar_session=new pago_cuenta_pagar_session();
			}

			$pago_cuenta_pagar_session->strUltimaBusqueda='FK_Idforma_pago_proveedor';
			$pago_cuenta_pagar_session->strPathNavegacionActual=$forma_pago_proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.pago_cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
			$pago_cuenta_pagar_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopuppago_cuenta_pagar=$pago_cuenta_pagar_session->bitPaginaPopup;
			$pago_cuenta_pagar_session->setPaginaPopupVariables(true);
			$bitPaginaPopuppago_cuenta_pagar=$pago_cuenta_pagar_session->bitPaginaPopup;
			$pago_cuenta_pagar_session->bitPermiteNavegacionHaciaFKDesde=false;
			$pago_cuenta_pagar_session->strNombrePaginaNavegacionHaciaFKDesde=forma_pago_proveedor_util::$STR_NOMBRE_OPCION;
			$pago_cuenta_pagar_session->bitBusquedaDesdeFKSesionforma_pago_proveedor=true;
			$pago_cuenta_pagar_session->bigidforma_pago_proveedorActual=$this->idforma_pago_proveedorActual;

			$forma_pago_proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$forma_pago_proveedor_session->bigIdActualFK=$this->idforma_pago_proveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"pago_cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=forma_pago_proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"pago_cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(forma_pago_proveedor_util::$STR_SESSION_NAME,serialize($forma_pago_proveedor_session));
			$this->Session->write(pago_cuenta_pagar_util::$STR_SESSION_NAME,serialize($pago_cuenta_pagar_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopuppago_cuenta_pagar!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',pago_cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(pago_cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliarforma_pago_proveedor,$this->strTipoUsuarioAuxiliarforma_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',pago_cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(pago_cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliarforma_pago_proveedor,$this->strTipoUsuarioAuxiliarforma_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(forma_pago_proveedor_util::$STR_SESSION_NAME,forma_pago_proveedor_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$forma_pago_proveedor_session=$this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME);
				
		if($forma_pago_proveedor_session==null) {
			$forma_pago_proveedor_session=new forma_pago_proveedor_session();		
			//$this->Session->write('forma_pago_proveedor_session',$forma_pago_proveedor_session);							
		}
		*/
		
		$forma_pago_proveedor_session=new forma_pago_proveedor_session();
    	$forma_pago_proveedor_session->strPathNavegacionActual=forma_pago_proveedor_util::$STR_CLASS_WEB_TITULO;
    	$forma_pago_proveedor_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(forma_pago_proveedor_util::$STR_SESSION_NAME,serialize($forma_pago_proveedor_session));		
	}	
	
	public function getSetBusquedasSesionConfig(forma_pago_proveedor_session $forma_pago_proveedor_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($forma_pago_proveedor_session->bitBusquedaDesdeFKSesionFK!=null && $forma_pago_proveedor_session->bitBusquedaDesdeFKSesionFK==true) {
			if($forma_pago_proveedor_session->bigIdActualFK!=null && $forma_pago_proveedor_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$forma_pago_proveedor_session->bigIdActualFKParaPosibleAtras=$forma_pago_proveedor_session->bigIdActualFK;*/
			}
				
			$forma_pago_proveedor_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$forma_pago_proveedor_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(forma_pago_proveedor_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($forma_pago_proveedor_session->bitBusquedaDesdeFKSesionempresa!=null && $forma_pago_proveedor_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($forma_pago_proveedor_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(forma_pago_proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(forma_pago_proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(forma_pago_proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($forma_pago_proveedor_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($forma_pago_proveedor_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=forma_pago_proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$forma_pago_proveedor_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$forma_pago_proveedor_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;

				if($forma_pago_proveedor_session->intNumeroPaginacion==forma_pago_proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$forma_pago_proveedor_session->intNumeroPaginacion;
				}
			}
			else if($forma_pago_proveedor_session->bitBusquedaDesdeFKSesiontipo_forma_pago!=null && $forma_pago_proveedor_session->bitBusquedaDesdeFKSesiontipo_forma_pago==true)
			{
				if($forma_pago_proveedor_session->bigidtipo_forma_pagoActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_forma_pago';

					$existe_history=HistoryWeb::ExisteElemento(forma_pago_proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(forma_pago_proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(forma_pago_proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($forma_pago_proveedor_session->bigidtipo_forma_pagoActualDescripcion);
						$historyWeb->setIdActual($forma_pago_proveedor_session->bigidtipo_forma_pagoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=forma_pago_proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$forma_pago_proveedor_session->bigidtipo_forma_pagoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$forma_pago_proveedor_session->bitBusquedaDesdeFKSesiontipo_forma_pago=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;

				if($forma_pago_proveedor_session->intNumeroPaginacion==forma_pago_proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$forma_pago_proveedor_session->intNumeroPaginacion;
				}
			}
			else if($forma_pago_proveedor_session->bitBusquedaDesdeFKSesioncuenta!=null && $forma_pago_proveedor_session->bitBusquedaDesdeFKSesioncuenta==true)
			{
				if($forma_pago_proveedor_session->bigidcuentaActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta';

					$existe_history=HistoryWeb::ExisteElemento(forma_pago_proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(forma_pago_proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(forma_pago_proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($forma_pago_proveedor_session->bigidcuentaActualDescripcion);
						$historyWeb->setIdActual($forma_pago_proveedor_session->bigidcuentaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=forma_pago_proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$forma_pago_proveedor_session->bigidcuentaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$forma_pago_proveedor_session->bitBusquedaDesdeFKSesioncuenta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;

				if($forma_pago_proveedor_session->intNumeroPaginacion==forma_pago_proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=forma_pago_proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$forma_pago_proveedor_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$forma_pago_proveedor_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));
		
		if($forma_pago_proveedor_session==null) {
			$forma_pago_proveedor_session=new forma_pago_proveedor_session();
		}
		
		$forma_pago_proveedor_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$forma_pago_proveedor_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$forma_pago_proveedor_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcuenta') {
			$forma_pago_proveedor_session->id_cuenta=$this->id_cuentaFK_Idcuenta;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$forma_pago_proveedor_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_forma_pago') {
			$forma_pago_proveedor_session->id_tipo_forma_pago=$this->id_tipo_forma_pagoFK_Idtipo_forma_pago;	

		}
		
		$this->Session->write(forma_pago_proveedor_util::$STR_SESSION_NAME,serialize($forma_pago_proveedor_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(forma_pago_proveedor_session $forma_pago_proveedor_session) {
		
		if($forma_pago_proveedor_session==null) {
			$forma_pago_proveedor_session=unserialize($this->Session->read(forma_pago_proveedor_util::$STR_SESSION_NAME));
		}
		
		if($forma_pago_proveedor_session==null) {
		   $forma_pago_proveedor_session=new forma_pago_proveedor_session();
		}
		
		if($forma_pago_proveedor_session->strUltimaBusqueda!=null && $forma_pago_proveedor_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$forma_pago_proveedor_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$forma_pago_proveedor_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$forma_pago_proveedor_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcuenta') {
				$this->id_cuentaFK_Idcuenta=$forma_pago_proveedor_session->id_cuenta;
				$forma_pago_proveedor_session->id_cuenta=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$forma_pago_proveedor_session->id_empresa;
				$forma_pago_proveedor_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_forma_pago') {
				$this->id_tipo_forma_pagoFK_Idtipo_forma_pago=$forma_pago_proveedor_session->id_tipo_forma_pago;
				$forma_pago_proveedor_session->id_tipo_forma_pago=-1;

			}
		}
		
		$forma_pago_proveedor_session->strUltimaBusqueda='';
		//$forma_pago_proveedor_session->intNumeroPaginacion=10;
		$forma_pago_proveedor_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(forma_pago_proveedor_util::$STR_SESSION_NAME,serialize($forma_pago_proveedor_session));		
	}
	
	public function forma_pago_proveedorsControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idtipo_forma_pagoDefaultFK = 0;
		$this->idcuentaDefaultFK = 0;
	}
	
	public function setforma_pago_proveedorFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_forma_pago',$this->idtipo_forma_pagoDefaultFK);
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

		tipo_forma_pago::$class;
		tipo_forma_pago_carga::$CONTROLLER;

		cuenta::$class;
		cuenta_carga::$CONTROLLER;
		
		//REL
		

		debito_cuenta_pagar_carga::$CONTROLLER;
		debito_cuenta_pagar_util::$STR_SCHEMA;
		debito_cuenta_pagar_session::class;

		documento_cuenta_pagar_carga::$CONTROLLER;
		documento_cuenta_pagar_util::$STR_SCHEMA;
		documento_cuenta_pagar_session::class;

		pago_cuenta_pagar_carga::$CONTROLLER;
		pago_cuenta_pagar_util::$STR_SCHEMA;
		pago_cuenta_pagar_session::class;
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
		interface forma_pago_proveedor_controlI {	
		
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
		
		public function onLoad(forma_pago_proveedor_session $forma_pago_proveedor_session=null);	
		function index(?string $strTypeOnLoadforma_pago_proveedor='',?string $strTipoPaginaAuxiliarforma_pago_proveedor='',?string $strTipoUsuarioAuxiliarforma_pago_proveedor='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadforma_pago_proveedor='',string $strTipoPaginaAuxiliarforma_pago_proveedor='',string $strTipoUsuarioAuxiliarforma_pago_proveedor='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($forma_pago_proveedorReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(forma_pago_proveedor $forma_pago_proveedorClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(forma_pago_proveedor_session $forma_pago_proveedor_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(forma_pago_proveedor_session $forma_pago_proveedor_session);	
		public function forma_pago_proveedorsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setforma_pago_proveedorFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
