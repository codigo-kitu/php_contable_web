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

namespace com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/termino_pago_proveedor/util/termino_pago_proveedor_carga.php');
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_param_return;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\session\termino_pago_proveedor_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_termino_pago\business\entity\tipo_termino_pago;
use com\bydan\contabilidad\general\tipo_termino_pago\business\logic\tipo_termino_pago_logic;
use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_carga;
use com\bydan\contabilidad\general\tipo_termino_pago\util\tipo_termino_pago_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\inventario\orden_compra\presentation\session\orden_compra_session;

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;

use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\util\credito_cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\credito_cuenta_pagar\presentation\session\credito_cuenta_pagar_session;

use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_carga;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\util\cuenta_pagar_util;
use com\bydan\contabilidad\cuentaspagar\cuenta_pagar\presentation\session\cuenta_pagar_session;

use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_carga;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;
use com\bydan\contabilidad\inventario\cotizacion\presentation\session\cotizacion_session;

use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_carga;
use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_util;
use com\bydan\contabilidad\inventario\parametro_inventario\presentation\session\parametro_inventario_session;

use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;
use com\bydan\contabilidad\inventario\devolucion\presentation\session\devolucion_session;


/*CARGA ARCHIVOS FRAMEWORK*/
termino_pago_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
termino_pago_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
termino_pago_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*termino_pago_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/cuentaspagar/termino_pago_proveedor/presentation/control/termino_pago_proveedor_init_control.php');
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\control\termino_pago_proveedor_init_control;

include_once('com/bydan/contabilidad/cuentaspagar/termino_pago_proveedor/presentation/control/termino_pago_proveedor_base_control.php');
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\presentation\control\termino_pago_proveedor_base_control;

class termino_pago_proveedor_control extends termino_pago_proveedor_base_control {	
	
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
			else if($action=='registrarSesionParaorden_compras' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idtermino_pago_proveedorActual=$this->getDataId();
				$this->registrarSesionParaorden_compras($idtermino_pago_proveedorActual);
			}
			else if($action=='registrarSesionParaproveedores' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idtermino_pago_proveedorActual=$this->getDataId();
				$this->registrarSesionParaproveedores($idtermino_pago_proveedorActual);
			}
			else if($action=='registrarSesionParacredito_cuenta_pagars' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idtermino_pago_proveedorActual=$this->getDataId();
				$this->registrarSesionParacredito_cuenta_pagars($idtermino_pago_proveedorActual);
			}
			else if($action=='registrarSesionParacuenta_pagars' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idtermino_pago_proveedorActual=$this->getDataId();
				$this->registrarSesionParacuenta_pagars($idtermino_pago_proveedorActual);
			}
			else if($action=='registrarSesionParacotizaciones' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idtermino_pago_proveedorActual=$this->getDataId();
				$this->registrarSesionParacotizaciones($idtermino_pago_proveedorActual);
			}
			else if($action=='registrarSesionParaparametro_inventarios' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idtermino_pago_proveedorActual=$this->getDataId();
				$this->registrarSesionParaparametro_inventarios($idtermino_pago_proveedorActual);
			}
			else if($action=='registrarSesionParadevoluciones' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idtermino_pago_proveedorActual=$this->getDataId();
				$this->registrarSesionParadevoluciones($idtermino_pago_proveedorActual);
			} 
			
			
			else if($action=="FK_Idcuenta"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdcuentaParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idtipo_termino_pago"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_termino_pagoParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idtermino_pago_proveedorActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idtermino_pago_proveedorActual
			}
			else if($action=='abrirBusquedaParatipo_termino_pago') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idtermino_pago_proveedorActual=$this->getDataId();
				$this->abrirBusquedaParatipo_termino_pago();//$idtermino_pago_proveedorActual
			}
			else if($action=='abrirBusquedaParacuenta') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idtermino_pago_proveedorActual=$this->getDataId();
				$this->abrirBusquedaParacuenta();//$idtermino_pago_proveedorActual
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
					
					$termino_pago_proveedorController = new termino_pago_proveedor_control();
					
					$termino_pago_proveedorController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($termino_pago_proveedorController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$termino_pago_proveedorController = new termino_pago_proveedor_control();
						$termino_pago_proveedorController = $this;
						
						$jsonResponse = json_encode($termino_pago_proveedorController->termino_pago_proveedors);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->termino_pago_proveedorReturnGeneral==null) {
					$this->termino_pago_proveedorReturnGeneral=new termino_pago_proveedor_param_return();
				}
				
				echo($this->termino_pago_proveedorReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$termino_pago_proveedorController=new termino_pago_proveedor_control();
		
		$termino_pago_proveedorController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$termino_pago_proveedorController->usuarioActual=new usuario();
		
		$termino_pago_proveedorController->usuarioActual->setId($this->usuarioActual->getId());
		$termino_pago_proveedorController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$termino_pago_proveedorController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$termino_pago_proveedorController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$termino_pago_proveedorController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$termino_pago_proveedorController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$termino_pago_proveedorController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$termino_pago_proveedorController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $termino_pago_proveedorController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadtermino_pago_proveedor= $this->getDataGeneralString('strTypeOnLoadtermino_pago_proveedor');
		$strTipoPaginaAuxiliartermino_pago_proveedor= $this->getDataGeneralString('strTipoPaginaAuxiliartermino_pago_proveedor');
		$strTipoUsuarioAuxiliartermino_pago_proveedor= $this->getDataGeneralString('strTipoUsuarioAuxiliartermino_pago_proveedor');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadtermino_pago_proveedor,$strTipoPaginaAuxiliartermino_pago_proveedor,$strTipoUsuarioAuxiliartermino_pago_proveedor,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadtermino_pago_proveedor!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('termino_pago_proveedor','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_proveedor_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliartermino_pago_proveedor,$this->strTipoUsuarioAuxiliartermino_pago_proveedor,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_proveedor_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliartermino_pago_proveedor,$this->strTipoUsuarioAuxiliartermino_pago_proveedor,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->termino_pago_proveedorReturnGeneral=new termino_pago_proveedor_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->termino_pago_proveedorReturnGeneral->conGuardarReturnSessionJs=true;
		$this->termino_pago_proveedorReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->termino_pago_proveedorReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->termino_pago_proveedorReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->termino_pago_proveedorReturnGeneral);
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
		$this->termino_pago_proveedorReturnGeneral=new termino_pago_proveedor_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->termino_pago_proveedorReturnGeneral->conGuardarReturnSessionJs=true;
		$this->termino_pago_proveedorReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->termino_pago_proveedorReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->termino_pago_proveedorReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->termino_pago_proveedorReturnGeneral);
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
		$this->termino_pago_proveedorReturnGeneral=new termino_pago_proveedor_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->termino_pago_proveedorReturnGeneral->conGuardarReturnSessionJs=true;
		$this->termino_pago_proveedorReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->termino_pago_proveedorReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->termino_pago_proveedorReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->termino_pago_proveedorReturnGeneral);
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
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
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
			
			
			$this->termino_pago_proveedorReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->termino_pago_proveedorReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->termino_pago_proveedorReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->termino_pago_proveedorReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->termino_pago_proveedorReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->termino_pago_proveedorReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->termino_pago_proveedorReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->termino_pago_proveedorReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->termino_pago_proveedorReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->termino_pago_proveedorReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->termino_pago_proveedorReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->termino_pago_proveedorReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->termino_pago_proveedorReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->termino_pago_proveedorReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->termino_pago_proveedorReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->termino_pago_proveedorReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->termino_pago_proveedorReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->termino_pago_proveedorReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
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
		
		$this->termino_pago_proveedorLogic=new termino_pago_proveedor_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->termino_pago_proveedor=new termino_pago_proveedor();
		
		$this->strTypeOnLoadtermino_pago_proveedor='onload';
		$this->strTipoPaginaAuxiliartermino_pago_proveedor='none';
		$this->strTipoUsuarioAuxiliartermino_pago_proveedor='none';	

		$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;
		
		$this->termino_pago_proveedorModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->termino_pago_proveedorControllerAdditional=new termino_pago_proveedor_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(termino_pago_proveedor_session $termino_pago_proveedor_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($termino_pago_proveedor_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadtermino_pago_proveedor='',?string $strTipoPaginaAuxiliartermino_pago_proveedor='',?string $strTipoUsuarioAuxiliartermino_pago_proveedor='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadtermino_pago_proveedor=$strTypeOnLoadtermino_pago_proveedor;
			$this->strTipoPaginaAuxiliartermino_pago_proveedor=$strTipoPaginaAuxiliartermino_pago_proveedor;
			$this->strTipoUsuarioAuxiliartermino_pago_proveedor=$strTipoUsuarioAuxiliartermino_pago_proveedor;
	
			if($strTipoUsuarioAuxiliartermino_pago_proveedor=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->termino_pago_proveedor=new termino_pago_proveedor();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Terminos Pago Proveedoreses';
			
			
			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));
							
			if($termino_pago_proveedor_session==null) {
				$termino_pago_proveedor_session=new termino_pago_proveedor_session();
				
				/*$this->Session->write('termino_pago_proveedor_session',$termino_pago_proveedor_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($termino_pago_proveedor_session->strFuncionJsPadre!=null && $termino_pago_proveedor_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$termino_pago_proveedor_session->strFuncionJsPadre;
				
				$termino_pago_proveedor_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($termino_pago_proveedor_session);
			
			if($strTypeOnLoadtermino_pago_proveedor!=null && $strTypeOnLoadtermino_pago_proveedor=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$termino_pago_proveedor_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$termino_pago_proveedor_session->setPaginaPopupVariables(true);
				}
				
				if($termino_pago_proveedor_session->intNumeroPaginacion==termino_pago_proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$termino_pago_proveedor_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,termino_pago_proveedor_util::$STR_SESSION_NAME,'cuentaspagar');																
			
			} else if($strTypeOnLoadtermino_pago_proveedor!=null && $strTypeOnLoadtermino_pago_proveedor=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$termino_pago_proveedor_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;*/
				
				if($termino_pago_proveedor_session->intNumeroPaginacion==termino_pago_proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$termino_pago_proveedor_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliartermino_pago_proveedor!=null && $strTipoPaginaAuxiliartermino_pago_proveedor=='none') {
				/*$termino_pago_proveedor_session->strStyleDivHeader='display:table-row';*/
				
				/*$termino_pago_proveedor_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliartermino_pago_proveedor!=null && $strTipoPaginaAuxiliartermino_pago_proveedor=='iframe') {
					/*
					$termino_pago_proveedor_session->strStyleDivArbol='display:none';
					$termino_pago_proveedor_session->strStyleDivHeader='display:none';
					$termino_pago_proveedor_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$termino_pago_proveedor_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->termino_pago_proveedorClase=new termino_pago_proveedor();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=termino_pago_proveedor_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(termino_pago_proveedor_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->termino_pago_proveedorLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->termino_pago_proveedorLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$ordencompraLogic=new orden_compra_logic();
			//$proveedorLogic=new proveedor_logic();
			//$creditocuentapagarLogic=new credito_cuenta_pagar_logic();
			//$cuentapagarLogic=new cuenta_pagar_logic();
			//$cotizacionLogic=new cotizacion_logic();
			//$parametroinventarioLogic=new parametro_inventario_logic();
			//$devolucionLogic=new devolucion_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->termino_pago_proveedorLogic=new termino_pago_proveedor_logic();*/
			
			
			$this->termino_pago_proveedorsModel=null;
			/*new ListDataModel();*/
			
			/*$this->termino_pago_proveedorsModel.setWrappedData(termino_pago_proveedorLogic->gettermino_pago_proveedors());*/
						
			$this->termino_pago_proveedors= array();
			$this->termino_pago_proveedorsEliminados=array();
			$this->termino_pago_proveedorsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= termino_pago_proveedor_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= termino_pago_proveedor_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->termino_pago_proveedor= new termino_pago_proveedor();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcuenta='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idtipo_termino_pago='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliartermino_pago_proveedor!=null && $strTipoUsuarioAuxiliartermino_pago_proveedor!='none' && $strTipoUsuarioAuxiliartermino_pago_proveedor!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliartermino_pago_proveedor);
																
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
				if($strTipoUsuarioAuxiliartermino_pago_proveedor!=null && $strTipoUsuarioAuxiliartermino_pago_proveedor!='none' && $strTipoUsuarioAuxiliartermino_pago_proveedor!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliartermino_pago_proveedor);
																
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
				if($strTipoUsuarioAuxiliartermino_pago_proveedor==null || $strTipoUsuarioAuxiliartermino_pago_proveedor=='none' || $strTipoUsuarioAuxiliartermino_pago_proveedor=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliartermino_pago_proveedor,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, termino_pago_proveedor_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, termino_pago_proveedor_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina termino_pago_proveedor');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($termino_pago_proveedor_session);
			
			$this->getSetBusquedasSesionConfig($termino_pago_proveedor_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportetermino_pago_proveedors($this->strAccionBusqueda,$this->termino_pago_proveedorLogic->gettermino_pago_proveedors());*/
				} else if($this->strGenerarReporte=='Html')	{
					$termino_pago_proveedor_session->strServletGenerarHtmlReporte='termino_pago_proveedorServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(termino_pago_proveedor_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(termino_pago_proveedor_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($termino_pago_proveedor_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliartermino_pago_proveedor!=null && $strTipoUsuarioAuxiliartermino_pago_proveedor=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($termino_pago_proveedor_session);
			}
								
			$this->set(termino_pago_proveedor_util::$STR_SESSION_NAME, $termino_pago_proveedor_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($termino_pago_proveedor_session);
			
			/*
			$this->termino_pago_proveedor->recursive = 0;
			
			$this->termino_pago_proveedors=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('termino_pago_proveedors', $this->termino_pago_proveedors);
			
			$this->set(termino_pago_proveedor_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->termino_pago_proveedorActual =$this->termino_pago_proveedorClase;
			
			/*$this->termino_pago_proveedorActual =$this->migrarModeltermino_pago_proveedor($this->termino_pago_proveedorClase);*/
			
			$this->returnHtml(false);
			
			$this->set(termino_pago_proveedor_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=termino_pago_proveedor_util::$STR_NOMBRE_OPCION;
				
			if(termino_pago_proveedor_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=termino_pago_proveedor_util::$STR_MODULO_OPCION.termino_pago_proveedor_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME,serialize($termino_pago_proveedor_session));
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
			/*$termino_pago_proveedorClase= (termino_pago_proveedor) termino_pago_proveedorsModel.getRowData();*/
			
			$this->termino_pago_proveedorClase->setId($this->termino_pago_proveedor->getId());	
			$this->termino_pago_proveedorClase->setVersionRow($this->termino_pago_proveedor->getVersionRow());	
			$this->termino_pago_proveedorClase->setVersionRow($this->termino_pago_proveedor->getVersionRow());	
			$this->termino_pago_proveedorClase->setid_empresa($this->termino_pago_proveedor->getid_empresa());	
			$this->termino_pago_proveedorClase->setid_tipo_termino_pago($this->termino_pago_proveedor->getid_tipo_termino_pago());	
			$this->termino_pago_proveedorClase->setcodigo($this->termino_pago_proveedor->getcodigo());	
			$this->termino_pago_proveedorClase->setdescripcion($this->termino_pago_proveedor->getdescripcion());	
			$this->termino_pago_proveedorClase->setmonto($this->termino_pago_proveedor->getmonto());	
			$this->termino_pago_proveedorClase->setdias($this->termino_pago_proveedor->getdias());	
			$this->termino_pago_proveedorClase->setinicial($this->termino_pago_proveedor->getinicial());	
			$this->termino_pago_proveedorClase->setcuotas($this->termino_pago_proveedor->getcuotas());	
			$this->termino_pago_proveedorClase->setdescuento_pronto_pago($this->termino_pago_proveedor->getdescuento_pronto_pago());	
			$this->termino_pago_proveedorClase->setpredeterminado($this->termino_pago_proveedor->getpredeterminado());	
			$this->termino_pago_proveedorClase->setid_cuenta($this->termino_pago_proveedor->getid_cuenta());	
			$this->termino_pago_proveedorClase->setcuenta_contable($this->termino_pago_proveedor->getcuenta_contable());	
		
			/*$this->Session->write('termino_pago_proveedorVersionRowActual', termino_pago_proveedor.getVersionRow());*/
			
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
			
			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));
						
			if($termino_pago_proveedor_session==null) {
				$termino_pago_proveedor_session=new termino_pago_proveedor_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('termino_pago_proveedor', $this->termino_pago_proveedor->read(null, $id));
	
			
			$this->termino_pago_proveedor->recursive = 0;
			
			$this->termino_pago_proveedors=$this->paginate();
			
			$this->set('termino_pago_proveedors', $this->termino_pago_proveedors);
	
			if (empty($this->data)) {
				$this->data = $this->termino_pago_proveedor->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->termino_pago_proveedorLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->termino_pago_proveedorClase);
			
			$this->termino_pago_proveedorActual=$this->termino_pago_proveedorClase;
			
			/*$this->termino_pago_proveedorActual =$this->migrarModeltermino_pago_proveedor($this->termino_pago_proveedorClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->termino_pago_proveedorLogic->gettermino_pago_proveedors(),$this->termino_pago_proveedorActual);
			
			$this->actualizarControllerConReturnGeneral($this->termino_pago_proveedorReturnGeneral);
			
			//$this->termino_pago_proveedorReturnGeneral=$this->termino_pago_proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->termino_pago_proveedorLogic->gettermino_pago_proveedors(),$this->termino_pago_proveedorActual,$this->termino_pago_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));
						
			if($termino_pago_proveedor_session==null) {
				$termino_pago_proveedor_session=new termino_pago_proveedor_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevotermino_pago_proveedor', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->termino_pago_proveedorClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->termino_pago_proveedorClase);
			
			$this->termino_pago_proveedorActual =$this->termino_pago_proveedorClase;
			
			/*$this->termino_pago_proveedorActual =$this->migrarModeltermino_pago_proveedor($this->termino_pago_proveedorClase);*/
			
			$this->settermino_pago_proveedorFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->termino_pago_proveedorLogic->gettermino_pago_proveedors(),$this->termino_pago_proveedor);
			
			$this->actualizarControllerConReturnGeneral($this->termino_pago_proveedorReturnGeneral);
			
			//this->termino_pago_proveedorReturnGeneral=$this->termino_pago_proveedorLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->termino_pago_proveedorLogic->gettermino_pago_proveedors(),$this->termino_pago_proveedor,$this->termino_pago_proveedorParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->termino_pago_proveedorReturnGeneral->gettermino_pago_proveedor()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idtipo_termino_pagoDefaultFK!=null && $this->idtipo_termino_pagoDefaultFK > -1) {
				$this->termino_pago_proveedorReturnGeneral->gettermino_pago_proveedor()->setid_tipo_termino_pago($this->idtipo_termino_pagoDefaultFK);
			}

			if($this->idcuentaDefaultFK!=null && $this->idcuentaDefaultFK > -1) {
				$this->termino_pago_proveedorReturnGeneral->gettermino_pago_proveedor()->setid_cuenta($this->idcuentaDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->termino_pago_proveedorReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->termino_pago_proveedorReturnGeneral->gettermino_pago_proveedor(),$this->termino_pago_proveedorActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeytermino_pago_proveedor($this->termino_pago_proveedorReturnGeneral->gettermino_pago_proveedor());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariotermino_pago_proveedor($this->termino_pago_proveedorReturnGeneral->gettermino_pago_proveedor());*/
			}
			
			if($this->termino_pago_proveedorReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->termino_pago_proveedorReturnGeneral->gettermino_pago_proveedor(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualtermino_pago_proveedor($this->termino_pago_proveedor,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->termino_pago_proveedorsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->termino_pago_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->termino_pago_proveedorsAuxiliar=array();
			}
			
			if(count($this->termino_pago_proveedorsAuxiliar)==2) {
				$termino_pago_proveedorOrigen=$this->termino_pago_proveedorsAuxiliar[0];
				$termino_pago_proveedorDestino=$this->termino_pago_proveedorsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($termino_pago_proveedorOrigen,$termino_pago_proveedorDestino,true,false,false);
				
				$this->actualizarLista($termino_pago_proveedorDestino,$this->termino_pago_proveedors);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->termino_pago_proveedorsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->termino_pago_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->termino_pago_proveedorsAuxiliar=array();
			}
			
			if(count($this->termino_pago_proveedorsAuxiliar) > 0) {
				foreach ($this->termino_pago_proveedorsAuxiliar as $termino_pago_proveedorSeleccionado) {
					$this->termino_pago_proveedor=new termino_pago_proveedor();
					
					$this->setCopiarVariablesObjetos($termino_pago_proveedorSeleccionado,$this->termino_pago_proveedor,true,true,false);
						
					$this->termino_pago_proveedors[]=$this->termino_pago_proveedor;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->termino_pago_proveedorsEliminados as $termino_pago_proveedorEliminado) {
				$this->termino_pago_proveedorLogic->termino_pago_proveedors[]=$termino_pago_proveedorEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->termino_pago_proveedor=new termino_pago_proveedor();
							
				$this->termino_pago_proveedors[]=$this->termino_pago_proveedor;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
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
		
		$termino_pago_proveedorActual=new termino_pago_proveedor();
		
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
				
				$termino_pago_proveedorActual=$this->termino_pago_proveedors[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setid_tipo_termino_pago((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setmonto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setdias((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setinicial((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setcuotas((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setdescuento_pronto_pago((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setpredeterminado(Funciones::getBooleanFromDataValueArray4($this->getDataCampoFormTabla('t','cel_'.$i.'_12')));  } else { $termino_pago_proveedorActual->setpredeterminado(false); }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setid_cuenta((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $termino_pago_proveedorActual->setcuenta_contable($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->termino_pago_proveedorsAuxiliar=array();		 
		/*$this->termino_pago_proveedorsEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->termino_pago_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->termino_pago_proveedorsAuxiliar=array();
		}
			
		if(count($this->termino_pago_proveedorsAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->termino_pago_proveedorsAuxiliar as $termino_pago_proveedorAuxLocal) {				
				
				foreach($this->termino_pago_proveedors as $termino_pago_proveedorLocal) {
					if($termino_pago_proveedorLocal->getId()==$termino_pago_proveedorAuxLocal->getId()) {
						$termino_pago_proveedorLocal->setIsDeleted(true);
						
						/*$this->termino_pago_proveedorsEliminados[]=$termino_pago_proveedorLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->termino_pago_proveedorLogic->settermino_pago_proveedors($this->termino_pago_proveedors);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
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
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadtermino_pago_proveedor='',string $strTipoPaginaAuxiliartermino_pago_proveedor='',string $strTipoUsuarioAuxiliartermino_pago_proveedor='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadtermino_pago_proveedor,$strTipoPaginaAuxiliartermino_pago_proveedor,$strTipoUsuarioAuxiliartermino_pago_proveedor,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->termino_pago_proveedors) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=termino_pago_proveedor_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=termino_pago_proveedor_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=termino_pago_proveedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));
						
			if($termino_pago_proveedor_session==null) {
				$termino_pago_proveedor_session=new termino_pago_proveedor_session();
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
					/*$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;*/
					
					if($termino_pago_proveedor_session->intNumeroPaginacion==termino_pago_proveedor_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$termino_pago_proveedor_session->intNumeroPaginacion;
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
			
			$this->termino_pago_proveedorsEliminados=array();
			
			/*$this->termino_pago_proveedorLogic->setConnexion($connexion);*/
			
			$this->termino_pago_proveedorLogic->setIsConDeep(true);
			
			$this->termino_pago_proveedorLogic->gettermino_pago_proveedorDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('tipo_termino_pago');$classes[]=$class;
			$class=new Classe('cuenta');$classes[]=$class;
			
			$this->termino_pago_proveedorLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->termino_pago_proveedorLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->termino_pago_proveedorLogic->gettermino_pago_proveedors()==null|| count($this->termino_pago_proveedorLogic->gettermino_pago_proveedors())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->termino_pago_proveedors=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->termino_pago_proveedorLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->termino_pago_proveedorsReporte=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();
									
						/*$this->generarReportes('Todos',$this->termino_pago_proveedorLogic->gettermino_pago_proveedors());*/
					
						$this->termino_pago_proveedorLogic->settermino_pago_proveedors($this->termino_pago_proveedors);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->termino_pago_proveedorLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->termino_pago_proveedorLogic->gettermino_pago_proveedors()==null|| count($this->termino_pago_proveedorLogic->gettermino_pago_proveedors())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->termino_pago_proveedors=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->termino_pago_proveedorLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->termino_pago_proveedorsReporte=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();
									
						/*$this->generarReportes('Todos',$this->termino_pago_proveedorLogic->gettermino_pago_proveedors());*/
					
						$this->termino_pago_proveedorLogic->settermino_pago_proveedors($this->termino_pago_proveedors);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idtermino_pago_proveedor=0;*/
				
				if($termino_pago_proveedor_session->bitBusquedaDesdeFKSesionFK!=null && $termino_pago_proveedor_session->bitBusquedaDesdeFKSesionFK==true) {
					if($termino_pago_proveedor_session->bigIdActualFK!=null && $termino_pago_proveedor_session->bigIdActualFK!=0)	{
						$this->idtermino_pago_proveedor=$termino_pago_proveedor_session->bigIdActualFK;	
					}
					
					$termino_pago_proveedor_session->bitBusquedaDesdeFKSesionFK=false;
					
					$termino_pago_proveedor_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idtermino_pago_proveedor=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idtermino_pago_proveedor=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->termino_pago_proveedorLogic->getEntity($this->idtermino_pago_proveedor);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*termino_pago_proveedorLogicAdditional::getDetalleIndicePorId($idtermino_pago_proveedor);*/

				
				if($this->termino_pago_proveedorLogic->gettermino_pago_proveedor()!=null) {
					$this->termino_pago_proveedorLogic->settermino_pago_proveedors(array());
					$this->termino_pago_proveedorLogic->termino_pago_proveedors[]=$this->termino_pago_proveedorLogic->gettermino_pago_proveedor();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcuenta')
			{

				if($termino_pago_proveedor_session->bigidcuentaActual!=null && $termino_pago_proveedor_session->bigidcuentaActual!=0)
				{
					$this->id_cuentaFK_Idcuenta=$termino_pago_proveedor_session->bigidcuentaActual;
					$termino_pago_proveedor_session->bigidcuentaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->termino_pago_proveedorLogic->getsFK_Idcuenta($finalQueryPaginacion,$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//termino_pago_proveedorLogicAdditional::getDetalleIndiceFK_Idcuenta($this->id_cuentaFK_Idcuenta);


					if($this->termino_pago_proveedorLogic->gettermino_pago_proveedors()==null || count($this->termino_pago_proveedorLogic->gettermino_pago_proveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$termino_pago_proveedors=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->termino_pago_proveedorLogic->getsFK_Idcuenta('',$this->pagination,$this->id_cuentaFK_Idcuenta);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->termino_pago_proveedorsReporte=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportetermino_pago_proveedors("FK_Idcuenta",$this->termino_pago_proveedorLogic->gettermino_pago_proveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->termino_pago_proveedorLogic->settermino_pago_proveedors($termino_pago_proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($termino_pago_proveedor_session->bigidempresaActual!=null && $termino_pago_proveedor_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$termino_pago_proveedor_session->bigidempresaActual;
					$termino_pago_proveedor_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->termino_pago_proveedorLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//termino_pago_proveedorLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->termino_pago_proveedorLogic->gettermino_pago_proveedors()==null || count($this->termino_pago_proveedorLogic->gettermino_pago_proveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$termino_pago_proveedors=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->termino_pago_proveedorLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->termino_pago_proveedorsReporte=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportetermino_pago_proveedors("FK_Idempresa",$this->termino_pago_proveedorLogic->gettermino_pago_proveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->termino_pago_proveedorLogic->settermino_pago_proveedors($termino_pago_proveedors);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_termino_pago')
			{

				if($termino_pago_proveedor_session->bigidtipo_termino_pagoActual!=null && $termino_pago_proveedor_session->bigidtipo_termino_pagoActual!=0)
				{
					$this->id_tipo_termino_pagoFK_Idtipo_termino_pago=$termino_pago_proveedor_session->bigidtipo_termino_pagoActual;
					$termino_pago_proveedor_session->bigidtipo_termino_pagoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->termino_pago_proveedorLogic->getsFK_Idtipo_termino_pago($finalQueryPaginacion,$this->pagination,$this->id_tipo_termino_pagoFK_Idtipo_termino_pago);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//termino_pago_proveedorLogicAdditional::getDetalleIndiceFK_Idtipo_termino_pago($this->id_tipo_termino_pagoFK_Idtipo_termino_pago);


					if($this->termino_pago_proveedorLogic->gettermino_pago_proveedors()==null || count($this->termino_pago_proveedorLogic->gettermino_pago_proveedors())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$termino_pago_proveedors=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->termino_pago_proveedorLogic->getsFK_Idtipo_termino_pago('',$this->pagination,$this->id_tipo_termino_pagoFK_Idtipo_termino_pago);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->termino_pago_proveedorsReporte=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportetermino_pago_proveedors("FK_Idtipo_termino_pago",$this->termino_pago_proveedorLogic->gettermino_pago_proveedors());

					if($this->strTipoPaginacion=='TODOS') {
						$this->termino_pago_proveedorLogic->settermino_pago_proveedors($termino_pago_proveedors);
					}
				//}

			} 
		
		$termino_pago_proveedor_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$termino_pago_proveedor_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->termino_pago_proveedorLogic->loadForeignsKeysDescription();*/
		
		$this->termino_pago_proveedors=$this->termino_pago_proveedorLogic->gettermino_pago_proveedors();
		
		if($this->termino_pago_proveedorsEliminados==null) {
			$this->termino_pago_proveedorsEliminados=array();
		}
		
		$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME.'Lista',serialize($this->termino_pago_proveedors));
		$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->termino_pago_proveedorsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME,serialize($termino_pago_proveedor_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idtermino_pago_proveedor=$idGeneral;
			
			$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
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
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}

			if(count($this->termino_pago_proveedors) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
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
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_cuentaFK_Idcuenta=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcuenta','cmbid_cuenta');

			$this->strAccionBusqueda='FK_Idcuenta';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
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
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_termino_pagoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_termino_pagoFK_Idtipo_termino_pago=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_termino_pago','cmbid_tipo_termino_pago');

			$this->strAccionBusqueda='FK_Idtipo_termino_pago';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcuenta($strFinalQuery,$id_cuenta)
	{
		try
		{

			$this->termino_pago_proveedorLogic->getsFK_Idcuenta($strFinalQuery,new Pagination(),$id_cuenta);
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

			$this->termino_pago_proveedorLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_termino_pago($strFinalQuery,$id_tipo_termino_pago)
	{
		try
		{

			$this->termino_pago_proveedorLogic->getsFK_Idtipo_termino_pago($strFinalQuery,new Pagination(),$id_tipo_termino_pago);
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
			
			
			$termino_pago_proveedorForeignKey=new termino_pago_proveedor_param_return(); //termino_pago_proveedorForeignKey();
			
			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));
						
			if($termino_pago_proveedor_session==null) {
				$termino_pago_proveedor_session=new termino_pago_proveedor_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$termino_pago_proveedorForeignKey=$this->termino_pago_proveedorLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$termino_pago_proveedor_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$termino_pago_proveedorForeignKey->empresasFK;
				$this->idempresaDefaultFK=$termino_pago_proveedorForeignKey->idempresaDefaultFK;
			}

			if($termino_pago_proveedor_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_termino_pago',$this->strRecargarFkTipos,',')) {
				$this->tipo_termino_pagosFK=$termino_pago_proveedorForeignKey->tipo_termino_pagosFK;
				$this->idtipo_termino_pagoDefaultFK=$termino_pago_proveedorForeignKey->idtipo_termino_pagoDefaultFK;
			}

			if($termino_pago_proveedor_session->bitBusquedaDesdeFKSesiontipo_termino_pago) {
				$this->setVisibleBusquedasParatipo_termino_pago(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cuenta',$this->strRecargarFkTipos,',')) {
				$this->cuentasFK=$termino_pago_proveedorForeignKey->cuentasFK;
				$this->idcuentaDefaultFK=$termino_pago_proveedorForeignKey->idcuentaDefaultFK;
			}

			if($termino_pago_proveedor_session->bitBusquedaDesdeFKSesioncuenta) {
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
	
	function cargarCombosFKFromReturnGeneral($termino_pago_proveedorReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$termino_pago_proveedorReturnGeneral->strRecargarFkTipos;
			
			


			if($termino_pago_proveedorReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$termino_pago_proveedorReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$termino_pago_proveedorReturnGeneral->idempresaDefaultFK;
			}


			if($termino_pago_proveedorReturnGeneral->con_tipo_termino_pagosFK==true) {
				$this->tipo_termino_pagosFK=$termino_pago_proveedorReturnGeneral->tipo_termino_pagosFK;
				$this->idtipo_termino_pagoDefaultFK=$termino_pago_proveedorReturnGeneral->idtipo_termino_pagoDefaultFK;
			}


			if($termino_pago_proveedorReturnGeneral->con_cuentasFK==true) {
				$this->cuentasFK=$termino_pago_proveedorReturnGeneral->cuentasFK;
				$this->idcuentaDefaultFK=$termino_pago_proveedorReturnGeneral->idcuentaDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(termino_pago_proveedor_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));
		
		if($termino_pago_proveedor_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($termino_pago_proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($termino_pago_proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_termino_pago_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_termino_pago';
			}
			else if($termino_pago_proveedor_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cuenta_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cuenta';
			}
			
			$termino_pago_proveedor_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}						
			
			$this->termino_pago_proveedorsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->termino_pago_proveedorsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->termino_pago_proveedorsAuxiliar=array();
			}
			
			if(count($this->termino_pago_proveedorsAuxiliar) > 0) {
				
				foreach ($this->termino_pago_proveedorsAuxiliar as $termino_pago_proveedorSeleccionado) {
					$this->eliminarTablaBase($termino_pago_proveedorSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('cotizacion');
			$tipoRelacionReporte->setsDescripcion('Cotizaciones');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('credito_cuenta_pagar');
			$tipoRelacionReporte->setsDescripcion('Credito Cuenta Pagars');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('cuenta_pagar');
			$tipoRelacionReporte->setsDescripcion('Cuenta Pagars');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('devolucion');
			$tipoRelacionReporte->setsDescripcion('Devoluciones');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('orden_compra');
			$tipoRelacionReporte->setsDescripcion('Orden Compras');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('parametro_inventario');
			$tipoRelacionReporte->setsDescripcion('Parametro Inventarios');

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
		
		
		$arrNombresClasesRelacionadasLocal[]=orden_compra_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=proveedor_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=credito_cuenta_pagar_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=cuenta_pagar_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=cotizacion_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=parametro_inventario_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=devolucion_util::$STR_NOMBRE_CLASE;
		
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


	public function gettipo_termino_pagosFKListSelectItem() 
	{
		$tipo_termino_pagosList=array();

		$item=null;

		foreach($this->tipo_termino_pagosFK as $tipo_termino_pago)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_termino_pago->getnombre());
			$item->setValue($tipo_termino_pago->getId());
			$tipo_termino_pagosList[]=$item;
		}

		return $tipo_termino_pagosList;
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
				$this->termino_pago_proveedorLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;
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
				$this->termino_pago_proveedorLogic->commitNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->rollbackNewConnexionToDeep();
				$this->termino_pago_proveedorLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$termino_pago_proveedorsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->termino_pago_proveedors as $termino_pago_proveedorLocal) {
				if($termino_pago_proveedorLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->termino_pago_proveedor=new termino_pago_proveedor();
				
				$this->termino_pago_proveedor->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->termino_pago_proveedors[]=$this->termino_pago_proveedor;*/
				
				$termino_pago_proveedorsNuevos[]=$this->termino_pago_proveedor;
			}
		}
		
				
		if($existe_nuevos) {			
			
			$classes=array();
			$class=null;
				
			
				$class=new Classe('empresa');$classes[]=$class;
				$class=new Classe('tipo_termino_pago');$classes[]=$class;
				$class=new Classe('cuenta');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->termino_pago_proveedorLogic->settermino_pago_proveedors($termino_pago_proveedorsNuevos);
					
				$this->termino_pago_proveedorLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($termino_pago_proveedorsNuevos as $termino_pago_proveedorNuevo) {
					$this->termino_pago_proveedors[]=$termino_pago_proveedorNuevo;
				}
				
				/*$this->termino_pago_proveedors[]=$termino_pago_proveedorsNuevos;*/
				
				$this->termino_pago_proveedorLogic->settermino_pago_proveedors($this->termino_pago_proveedors);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($termino_pago_proveedorsNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));

		if($termino_pago_proveedor_session==null) {
			$termino_pago_proveedor_session=new termino_pago_proveedor_session();
		}
		
		if($termino_pago_proveedor_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($termino_pago_proveedor_session->bigidempresaActual!=null && $termino_pago_proveedor_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($termino_pago_proveedor_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=termino_pago_proveedor_util::getempresaDescripcion($empresaLogic->getempresa());
				$this->idempresaDefaultFK=$empresaLogic->getempresa()->getId();
			}
		}
	}

	public function cargarCombostipo_termino_pagosFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_termino_pagoLogic= new tipo_termino_pago_logic();
		$pagination= new Pagination();
		$this->tipo_termino_pagosFK=array();

		$tipo_termino_pagoLogic->setConnexion($connexion);
		$tipo_termino_pagoLogic->gettipo_termino_pagoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));

		if($termino_pago_proveedor_session==null) {
			$termino_pago_proveedor_session=new termino_pago_proveedor_session();
		}
		
		if($termino_pago_proveedor_session->bitBusquedaDesdeFKSesiontipo_termino_pago!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_termino_pago_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_termino_pago=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_termino_pago=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_termino_pago, '');
				$finalQueryGlobaltipo_termino_pago.=tipo_termino_pago_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_termino_pago.$strRecargarFkQuery;		

				$tipo_termino_pagoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_termino_pagosFK($tipo_termino_pagoLogic->gettipo_termino_pagos());

		} else {
			$this->setVisibleBusquedasParatipo_termino_pago(true);


			if($termino_pago_proveedor_session->bigidtipo_termino_pagoActual!=null && $termino_pago_proveedor_session->bigidtipo_termino_pagoActual > 0) {
				$tipo_termino_pagoLogic->getEntity($termino_pago_proveedor_session->bigidtipo_termino_pagoActual);//WithConnection

				$this->tipo_termino_pagosFK[$tipo_termino_pagoLogic->gettipo_termino_pago()->getId()]=termino_pago_proveedor_util::gettipo_termino_pagoDescripcion($tipo_termino_pagoLogic->gettipo_termino_pago());
				$this->idtipo_termino_pagoDefaultFK=$tipo_termino_pagoLogic->gettipo_termino_pago()->getId();
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

		$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));

		if($termino_pago_proveedor_session==null) {
			$termino_pago_proveedor_session=new termino_pago_proveedor_session();
		}
		
		if($termino_pago_proveedor_session->bitBusquedaDesdeFKSesioncuenta!=true) {
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


			if($termino_pago_proveedor_session->bigidcuentaActual!=null && $termino_pago_proveedor_session->bigidcuentaActual > 0) {
				$cuentaLogic->getEntity($termino_pago_proveedor_session->bigidcuentaActual);//WithConnection

				$this->cuentasFK[$cuentaLogic->getcuenta()->getId()]=termino_pago_proveedor_util::getcuentaDescripcion($cuentaLogic->getcuenta());
				$this->idcuentaDefaultFK=$cuentaLogic->getcuenta()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=termino_pago_proveedor_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombostipo_termino_pagosFK($tipo_termino_pagos){

		foreach ($tipo_termino_pagos as $tipo_termino_pagoLocal ) {
			if($this->idtipo_termino_pagoDefaultFK==0) {
				$this->idtipo_termino_pagoDefaultFK=$tipo_termino_pagoLocal->getId();
			}

			$this->tipo_termino_pagosFK[$tipo_termino_pagoLocal->getId()]=termino_pago_proveedor_util::gettipo_termino_pagoDescripcion($tipo_termino_pagoLocal);
		}
	}

	public function prepararComboscuentasFK($cuentas){

		foreach ($cuentas as $cuentaLocal ) {
			if($this->idcuentaDefaultFK==0) {
				$this->idcuentaDefaultFK=$cuentaLocal->getId();
			}

			$this->cuentasFK[$cuentaLocal->getId()]=termino_pago_proveedor_util::getcuentaDescripcion($cuentaLocal);
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

			$strDescripcionempresa=termino_pago_proveedor_util::getempresaDescripcion($empresaLogic->getempresa());

		} else {
			$strDescripcionempresa='null';
		}

		return $strDescripcionempresa;
	}

	public function cargarDescripciontipo_termino_pagoFK($idtipo_termino_pago,$connexion=null){
		$tipo_termino_pagoLogic= new tipo_termino_pago_logic();
		$tipo_termino_pagoLogic->setConnexion($connexion);
		$tipo_termino_pagoLogic->gettipo_termino_pagoDataAccess()->isForFKData=true;
		$strDescripciontipo_termino_pago='';

		if($idtipo_termino_pago!=null && $idtipo_termino_pago!='' && $idtipo_termino_pago!='null') {
			if($connexion!=null) {
				$tipo_termino_pagoLogic->getEntity($idtipo_termino_pago);//WithConnection
			} else {
				$tipo_termino_pagoLogic->getEntityWithConnection($idtipo_termino_pago);//
			}

			$strDescripciontipo_termino_pago=termino_pago_proveedor_util::gettipo_termino_pagoDescripcion($tipo_termino_pagoLogic->gettipo_termino_pago());

		} else {
			$strDescripciontipo_termino_pago='null';
		}

		return $strDescripciontipo_termino_pago;
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

			$strDescripcioncuenta=termino_pago_proveedor_util::getcuentaDescripcion($cuentaLogic->getcuenta());

		} else {
			$strDescripcioncuenta='null';
		}

		return $strDescripcioncuenta;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(termino_pago_proveedor $termino_pago_proveedorClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$termino_pago_proveedorClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
			
			
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
		$this->strVisibleFK_Idtipo_termino_pago=$strParaVisibleNegacionempresa;
	}

	public function setVisibleBusquedasParatipo_termino_pago($isParatipo_termino_pago){
		$strParaVisibletipo_termino_pago='display:table-row';
		$strParaVisibleNegaciontipo_termino_pago='display:none';

		if($isParatipo_termino_pago) {
			$strParaVisibletipo_termino_pago='display:table-row';
			$strParaVisibleNegaciontipo_termino_pago='display:none';
		} else {
			$strParaVisibletipo_termino_pago='display:none';
			$strParaVisibleNegaciontipo_termino_pago='display:table-row';
		}


		$strParaVisibleNegaciontipo_termino_pago=trim($strParaVisibleNegaciontipo_termino_pago);

		$this->strVisibleFK_Idcuenta=$strParaVisibleNegaciontipo_termino_pago;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_termino_pago;
		$this->strVisibleFK_Idtipo_termino_pago=$strParaVisibletipo_termino_pago;
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
		$this->strVisibleFK_Idtipo_termino_pago=$strParaVisibleNegacioncuenta;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idtermino_pago_proveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idtermino_pago_proveedorActual=$idtermino_pago_proveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.termino_pago_proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.termino_pago_proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliartermino_pago_proveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_termino_pago() {//$idtermino_pago_proveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idtermino_pago_proveedorActual=$idtermino_pago_proveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_termino_pago_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.termino_pago_proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_termino_pago(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_termino_pago_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.termino_pago_proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_termino_pago(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_termino_pago_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliartermino_pago_proveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacuenta() {//$idtermino_pago_proveedorActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idtermino_pago_proveedorActual=$idtermino_pago_proveedorActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cuenta_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.termino_pago_proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.termino_pago_proveedorJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cuenta(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliartermino_pago_proveedor,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParaorden_compras(int $idtermino_pago_proveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idtermino_pago_proveedorActual=$idtermino_pago_proveedorActual;

		$bitPaginaPopuporden_compra=false;

		try {

			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));

			if($termino_pago_proveedor_session==null) {
				$termino_pago_proveedor_session=new termino_pago_proveedor_session();
			}

			$orden_compra_session=unserialize($this->Session->read(orden_compra_util::$STR_SESSION_NAME));

			if($orden_compra_session==null) {
				$orden_compra_session=new orden_compra_session();
			}

			$orden_compra_session->strUltimaBusqueda='FK_Idtermino_pago_proveedor';
			$orden_compra_session->strPathNavegacionActual=$termino_pago_proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.orden_compra_util::$STR_CLASS_WEB_TITULO;
			$orden_compra_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopuporden_compra=$orden_compra_session->bitPaginaPopup;
			$orden_compra_session->setPaginaPopupVariables(true);
			$bitPaginaPopuporden_compra=$orden_compra_session->bitPaginaPopup;
			$orden_compra_session->bitPermiteNavegacionHaciaFKDesde=false;
			$orden_compra_session->strNombrePaginaNavegacionHaciaFKDesde=termino_pago_proveedor_util::$STR_NOMBRE_OPCION;
			$orden_compra_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor=true;
			$orden_compra_session->bigidtermino_pago_proveedorActual=$this->idtermino_pago_proveedorActual;

			$termino_pago_proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$termino_pago_proveedor_session->bigIdActualFK=$this->idtermino_pago_proveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"orden_compra"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=termino_pago_proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"orden_compra"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME,serialize($termino_pago_proveedor_session));
			$this->Session->write(orden_compra_util::$STR_SESSION_NAME,serialize($orden_compra_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopuporden_compra!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',orden_compra_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(orden_compra_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliartermino_pago_proveedor,$this->strTipoUsuarioAuxiliartermino_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',orden_compra_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(orden_compra_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliartermino_pago_proveedor,$this->strTipoUsuarioAuxiliartermino_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaproveedores(int $idtermino_pago_proveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idtermino_pago_proveedorActual=$idtermino_pago_proveedorActual;

		$bitPaginaPopupproveedor=false;

		try {

			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));

			if($termino_pago_proveedor_session==null) {
				$termino_pago_proveedor_session=new termino_pago_proveedor_session();
			}

			$proveedor_session=unserialize($this->Session->read(proveedor_util::$STR_SESSION_NAME));

			if($proveedor_session==null) {
				$proveedor_session=new proveedor_session();
			}

			$proveedor_session->strUltimaBusqueda='FK_Idtermino_pago_proveedor';
			$proveedor_session->strPathNavegacionActual=$termino_pago_proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.proveedor_util::$STR_CLASS_WEB_TITULO;
			$proveedor_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupproveedor=$proveedor_session->bitPaginaPopup;
			$proveedor_session->setPaginaPopupVariables(true);
			$bitPaginaPopupproveedor=$proveedor_session->bitPaginaPopup;
			$proveedor_session->bitPermiteNavegacionHaciaFKDesde=false;
			$proveedor_session->strNombrePaginaNavegacionHaciaFKDesde=termino_pago_proveedor_util::$STR_NOMBRE_OPCION;
			$proveedor_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor=true;
			$proveedor_session->bigidtermino_pago_proveedorActual=$this->idtermino_pago_proveedorActual;

			$termino_pago_proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$termino_pago_proveedor_session->bigIdActualFK=$this->idtermino_pago_proveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"proveedor"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=termino_pago_proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"proveedor"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME,serialize($termino_pago_proveedor_session));
			$this->Session->write(proveedor_util::$STR_SESSION_NAME,serialize($proveedor_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupproveedor!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliartermino_pago_proveedor,$this->strTipoUsuarioAuxiliartermino_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliartermino_pago_proveedor,$this->strTipoUsuarioAuxiliartermino_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParacredito_cuenta_pagars(int $idtermino_pago_proveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idtermino_pago_proveedorActual=$idtermino_pago_proveedorActual;

		$bitPaginaPopupcredito_cuenta_pagar=false;

		try {

			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));

			if($termino_pago_proveedor_session==null) {
				$termino_pago_proveedor_session=new termino_pago_proveedor_session();
			}

			$credito_cuenta_pagar_session=unserialize($this->Session->read(credito_cuenta_pagar_util::$STR_SESSION_NAME));

			if($credito_cuenta_pagar_session==null) {
				$credito_cuenta_pagar_session=new credito_cuenta_pagar_session();
			}

			$credito_cuenta_pagar_session->strUltimaBusqueda='FK_Idtermino_pago_proveedor';
			$credito_cuenta_pagar_session->strPathNavegacionActual=$termino_pago_proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.credito_cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
			$credito_cuenta_pagar_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcredito_cuenta_pagar=$credito_cuenta_pagar_session->bitPaginaPopup;
			$credito_cuenta_pagar_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcredito_cuenta_pagar=$credito_cuenta_pagar_session->bitPaginaPopup;
			$credito_cuenta_pagar_session->bitPermiteNavegacionHaciaFKDesde=false;
			$credito_cuenta_pagar_session->strNombrePaginaNavegacionHaciaFKDesde=termino_pago_proveedor_util::$STR_NOMBRE_OPCION;
			$credito_cuenta_pagar_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor=true;
			$credito_cuenta_pagar_session->bigidtermino_pago_proveedorActual=$this->idtermino_pago_proveedorActual;

			$termino_pago_proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$termino_pago_proveedor_session->bigIdActualFK=$this->idtermino_pago_proveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"credito_cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=termino_pago_proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"credito_cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME,serialize($termino_pago_proveedor_session));
			$this->Session->write(credito_cuenta_pagar_util::$STR_SESSION_NAME,serialize($credito_cuenta_pagar_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcredito_cuenta_pagar!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',credito_cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(credito_cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliartermino_pago_proveedor,$this->strTipoUsuarioAuxiliartermino_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',credito_cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(credito_cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliartermino_pago_proveedor,$this->strTipoUsuarioAuxiliartermino_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParacuenta_pagars(int $idtermino_pago_proveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idtermino_pago_proveedorActual=$idtermino_pago_proveedorActual;

		$bitPaginaPopupcuenta_pagar=false;

		try {

			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));

			if($termino_pago_proveedor_session==null) {
				$termino_pago_proveedor_session=new termino_pago_proveedor_session();
			}

			$cuenta_pagar_session=unserialize($this->Session->read(cuenta_pagar_util::$STR_SESSION_NAME));

			if($cuenta_pagar_session==null) {
				$cuenta_pagar_session=new cuenta_pagar_session();
			}

			$cuenta_pagar_session->strUltimaBusqueda='FK_Idtermino_pago_proveedor';
			$cuenta_pagar_session->strPathNavegacionActual=$termino_pago_proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.cuenta_pagar_util::$STR_CLASS_WEB_TITULO;
			$cuenta_pagar_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcuenta_pagar=$cuenta_pagar_session->bitPaginaPopup;
			$cuenta_pagar_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcuenta_pagar=$cuenta_pagar_session->bitPaginaPopup;
			$cuenta_pagar_session->bitPermiteNavegacionHaciaFKDesde=false;
			$cuenta_pagar_session->strNombrePaginaNavegacionHaciaFKDesde=termino_pago_proveedor_util::$STR_NOMBRE_OPCION;
			$cuenta_pagar_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor=true;
			$cuenta_pagar_session->bigidtermino_pago_proveedorActual=$this->idtermino_pago_proveedorActual;

			$termino_pago_proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$termino_pago_proveedor_session->bigIdActualFK=$this->idtermino_pago_proveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=termino_pago_proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"cuenta_pagar"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME,serialize($termino_pago_proveedor_session));
			$this->Session->write(cuenta_pagar_util::$STR_SESSION_NAME,serialize($cuenta_pagar_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcuenta_pagar!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliartermino_pago_proveedor,$this->strTipoUsuarioAuxiliartermino_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cuenta_pagar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cuenta_pagar_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliartermino_pago_proveedor,$this->strTipoUsuarioAuxiliartermino_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParacotizaciones(int $idtermino_pago_proveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idtermino_pago_proveedorActual=$idtermino_pago_proveedorActual;

		$bitPaginaPopupcotizacion=false;

		try {

			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));

			if($termino_pago_proveedor_session==null) {
				$termino_pago_proveedor_session=new termino_pago_proveedor_session();
			}

			$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));

			if($cotizacion_session==null) {
				$cotizacion_session=new cotizacion_session();
			}

			$cotizacion_session->strUltimaBusqueda='FK_Idtermino_pago_proveedor';
			$cotizacion_session->strPathNavegacionActual=$termino_pago_proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.cotizacion_util::$STR_CLASS_WEB_TITULO;
			$cotizacion_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcotizacion=$cotizacion_session->bitPaginaPopup;
			$cotizacion_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcotizacion=$cotizacion_session->bitPaginaPopup;
			$cotizacion_session->bitPermiteNavegacionHaciaFKDesde=false;
			$cotizacion_session->strNombrePaginaNavegacionHaciaFKDesde=termino_pago_proveedor_util::$STR_NOMBRE_OPCION;
			$cotizacion_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor=true;
			$cotizacion_session->bigidtermino_pago_proveedorActual=$this->idtermino_pago_proveedorActual;

			$termino_pago_proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$termino_pago_proveedor_session->bigIdActualFK=$this->idtermino_pago_proveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"cotizacion"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=termino_pago_proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"cotizacion"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME,serialize($termino_pago_proveedor_session));
			$this->Session->write(cotizacion_util::$STR_SESSION_NAME,serialize($cotizacion_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcotizacion!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cotizacion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cotizacion_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliartermino_pago_proveedor,$this->strTipoUsuarioAuxiliartermino_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cotizacion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cotizacion_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliartermino_pago_proveedor,$this->strTipoUsuarioAuxiliartermino_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaparametro_inventarios(int $idtermino_pago_proveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idtermino_pago_proveedorActual=$idtermino_pago_proveedorActual;

		$bitPaginaPopupparametro_inventario=false;

		try {

			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));

			if($termino_pago_proveedor_session==null) {
				$termino_pago_proveedor_session=new termino_pago_proveedor_session();
			}

			$parametro_inventario_session=unserialize($this->Session->read(parametro_inventario_util::$STR_SESSION_NAME));

			if($parametro_inventario_session==null) {
				$parametro_inventario_session=new parametro_inventario_session();
			}

			$parametro_inventario_session->strUltimaBusqueda='FK_Idtermino_pago_proveedor';
			$parametro_inventario_session->strPathNavegacionActual=$termino_pago_proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.parametro_inventario_util::$STR_CLASS_WEB_TITULO;
			$parametro_inventario_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupparametro_inventario=$parametro_inventario_session->bitPaginaPopup;
			$parametro_inventario_session->setPaginaPopupVariables(true);
			$bitPaginaPopupparametro_inventario=$parametro_inventario_session->bitPaginaPopup;
			$parametro_inventario_session->bitPermiteNavegacionHaciaFKDesde=false;
			$parametro_inventario_session->strNombrePaginaNavegacionHaciaFKDesde=termino_pago_proveedor_util::$STR_NOMBRE_OPCION;
			$parametro_inventario_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor=true;
			$parametro_inventario_session->bigidtermino_pago_proveedorActual=$this->idtermino_pago_proveedorActual;

			$termino_pago_proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$termino_pago_proveedor_session->bigIdActualFK=$this->idtermino_pago_proveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"parametro_inventario"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=termino_pago_proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"parametro_inventario"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME,serialize($termino_pago_proveedor_session));
			$this->Session->write(parametro_inventario_util::$STR_SESSION_NAME,serialize($parametro_inventario_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupparametro_inventario!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',parametro_inventario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(parametro_inventario_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliartermino_pago_proveedor,$this->strTipoUsuarioAuxiliartermino_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',parametro_inventario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(parametro_inventario_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliartermino_pago_proveedor,$this->strTipoUsuarioAuxiliartermino_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParadevoluciones(int $idtermino_pago_proveedorActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idtermino_pago_proveedorActual=$idtermino_pago_proveedorActual;

		$bitPaginaPopupdevolucion=false;

		try {

			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));

			if($termino_pago_proveedor_session==null) {
				$termino_pago_proveedor_session=new termino_pago_proveedor_session();
			}

			$devolucion_session=unserialize($this->Session->read(devolucion_util::$STR_SESSION_NAME));

			if($devolucion_session==null) {
				$devolucion_session=new devolucion_session();
			}

			$devolucion_session->strUltimaBusqueda='FK_Idtermino_pago_proveedor';
			$devolucion_session->strPathNavegacionActual=$termino_pago_proveedor_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.devolucion_util::$STR_CLASS_WEB_TITULO;
			$devolucion_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupdevolucion=$devolucion_session->bitPaginaPopup;
			$devolucion_session->setPaginaPopupVariables(true);
			$bitPaginaPopupdevolucion=$devolucion_session->bitPaginaPopup;
			$devolucion_session->bitPermiteNavegacionHaciaFKDesde=false;
			$devolucion_session->strNombrePaginaNavegacionHaciaFKDesde=termino_pago_proveedor_util::$STR_NOMBRE_OPCION;
			$devolucion_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor=true;
			$devolucion_session->bigidtermino_pago_proveedorActual=$this->idtermino_pago_proveedorActual;

			$termino_pago_proveedor_session->bitBusquedaDesdeFKSesionFK=true;
			$termino_pago_proveedor_session->bigIdActualFK=$this->idtermino_pago_proveedorActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"devolucion"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=termino_pago_proveedor_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"devolucion"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME,serialize($termino_pago_proveedor_session));
			$this->Session->write(devolucion_util::$STR_SESSION_NAME,serialize($devolucion_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupdevolucion!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',devolucion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(devolucion_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP',$this->strTipoPaginaAuxiliartermino_pago_proveedor,$this->strTipoUsuarioAuxiliartermino_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',devolucion_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(devolucion_util::$STR_CLASS_NAME,'cuentaspagar','','NO-POPUP',$this->strTipoPaginaAuxiliartermino_pago_proveedor,$this->strTipoUsuarioAuxiliartermino_pago_proveedor,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(termino_pago_proveedor_util::$STR_SESSION_NAME,termino_pago_proveedor_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$termino_pago_proveedor_session=$this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME);
				
		if($termino_pago_proveedor_session==null) {
			$termino_pago_proveedor_session=new termino_pago_proveedor_session();		
			//$this->Session->write('termino_pago_proveedor_session',$termino_pago_proveedor_session);							
		}
		*/
		
		$termino_pago_proveedor_session=new termino_pago_proveedor_session();
    	$termino_pago_proveedor_session->strPathNavegacionActual=termino_pago_proveedor_util::$STR_CLASS_WEB_TITULO;
    	$termino_pago_proveedor_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME,serialize($termino_pago_proveedor_session));		
	}	
	
	public function getSetBusquedasSesionConfig(termino_pago_proveedor_session $termino_pago_proveedor_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($termino_pago_proveedor_session->bitBusquedaDesdeFKSesionFK!=null && $termino_pago_proveedor_session->bitBusquedaDesdeFKSesionFK==true) {
			if($termino_pago_proveedor_session->bigIdActualFK!=null && $termino_pago_proveedor_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$termino_pago_proveedor_session->bigIdActualFKParaPosibleAtras=$termino_pago_proveedor_session->bigIdActualFK;*/
			}
				
			$termino_pago_proveedor_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$termino_pago_proveedor_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(termino_pago_proveedor_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($termino_pago_proveedor_session->bitBusquedaDesdeFKSesionempresa!=null && $termino_pago_proveedor_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($termino_pago_proveedor_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(termino_pago_proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(termino_pago_proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(termino_pago_proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($termino_pago_proveedor_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($termino_pago_proveedor_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=termino_pago_proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$termino_pago_proveedor_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$termino_pago_proveedor_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;

				if($termino_pago_proveedor_session->intNumeroPaginacion==termino_pago_proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$termino_pago_proveedor_session->intNumeroPaginacion;
				}
			}
			else if($termino_pago_proveedor_session->bitBusquedaDesdeFKSesiontipo_termino_pago!=null && $termino_pago_proveedor_session->bitBusquedaDesdeFKSesiontipo_termino_pago==true)
			{
				if($termino_pago_proveedor_session->bigidtipo_termino_pagoActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_termino_pago';

					$existe_history=HistoryWeb::ExisteElemento(termino_pago_proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(termino_pago_proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(termino_pago_proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($termino_pago_proveedor_session->bigidtipo_termino_pagoActualDescripcion);
						$historyWeb->setIdActual($termino_pago_proveedor_session->bigidtipo_termino_pagoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=termino_pago_proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$termino_pago_proveedor_session->bigidtipo_termino_pagoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$termino_pago_proveedor_session->bitBusquedaDesdeFKSesiontipo_termino_pago=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;

				if($termino_pago_proveedor_session->intNumeroPaginacion==termino_pago_proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$termino_pago_proveedor_session->intNumeroPaginacion;
				}
			}
			else if($termino_pago_proveedor_session->bitBusquedaDesdeFKSesioncuenta!=null && $termino_pago_proveedor_session->bitBusquedaDesdeFKSesioncuenta==true)
			{
				if($termino_pago_proveedor_session->bigidcuentaActual!=0) {
					$this->strAccionBusqueda='FK_Idcuenta';

					$existe_history=HistoryWeb::ExisteElemento(termino_pago_proveedor_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(termino_pago_proveedor_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(termino_pago_proveedor_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($termino_pago_proveedor_session->bigidcuentaActualDescripcion);
						$historyWeb->setIdActual($termino_pago_proveedor_session->bigidcuentaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=termino_pago_proveedor_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$termino_pago_proveedor_session->bigidcuentaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$termino_pago_proveedor_session->bitBusquedaDesdeFKSesioncuenta=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;

				if($termino_pago_proveedor_session->intNumeroPaginacion==termino_pago_proveedor_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=termino_pago_proveedor_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$termino_pago_proveedor_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$termino_pago_proveedor_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));
		
		if($termino_pago_proveedor_session==null) {
			$termino_pago_proveedor_session=new termino_pago_proveedor_session();
		}
		
		$termino_pago_proveedor_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$termino_pago_proveedor_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$termino_pago_proveedor_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcuenta') {
			$termino_pago_proveedor_session->id_cuenta=$this->id_cuentaFK_Idcuenta;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$termino_pago_proveedor_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_termino_pago') {
			$termino_pago_proveedor_session->id_tipo_termino_pago=$this->id_tipo_termino_pagoFK_Idtipo_termino_pago;	

		}
		
		$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME,serialize($termino_pago_proveedor_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(termino_pago_proveedor_session $termino_pago_proveedor_session) {
		
		if($termino_pago_proveedor_session==null) {
			$termino_pago_proveedor_session=unserialize($this->Session->read(termino_pago_proveedor_util::$STR_SESSION_NAME));
		}
		
		if($termino_pago_proveedor_session==null) {
		   $termino_pago_proveedor_session=new termino_pago_proveedor_session();
		}
		
		if($termino_pago_proveedor_session->strUltimaBusqueda!=null && $termino_pago_proveedor_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$termino_pago_proveedor_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$termino_pago_proveedor_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$termino_pago_proveedor_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcuenta') {
				$this->id_cuentaFK_Idcuenta=$termino_pago_proveedor_session->id_cuenta;
				$termino_pago_proveedor_session->id_cuenta=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$termino_pago_proveedor_session->id_empresa;
				$termino_pago_proveedor_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_termino_pago') {
				$this->id_tipo_termino_pagoFK_Idtipo_termino_pago=$termino_pago_proveedor_session->id_tipo_termino_pago;
				$termino_pago_proveedor_session->id_tipo_termino_pago=-1;

			}
		}
		
		$termino_pago_proveedor_session->strUltimaBusqueda='';
		//$termino_pago_proveedor_session->intNumeroPaginacion=10;
		$termino_pago_proveedor_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(termino_pago_proveedor_util::$STR_SESSION_NAME,serialize($termino_pago_proveedor_session));		
	}
	
	public function termino_pago_proveedorsControllerAux($conexion_control) 	 {
		try {
			$this->conexion_control = $conexion_control;
		}
	 	catch(Exception $e) {
			throw $e;
	  	}	 
    }
	
	public function inicializarFKsDefault() {
	
		$this->idempresaDefaultFK = 0;
		$this->idtipo_termino_pagoDefaultFK = 0;
		$this->idcuentaDefaultFK = 0;
	}
	
	public function settermino_pago_proveedorFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_termino_pago',$this->idtipo_termino_pagoDefaultFK);
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

		tipo_termino_pago::$class;
		tipo_termino_pago_carga::$CONTROLLER;

		cuenta::$class;
		cuenta_carga::$CONTROLLER;
		
		//REL
		

		orden_compra_carga::$CONTROLLER;
		orden_compra_util::$STR_SCHEMA;
		orden_compra_session::class;

		proveedor_carga::$CONTROLLER;
		proveedor_util::$STR_SCHEMA;
		proveedor_session::class;

		credito_cuenta_pagar_carga::$CONTROLLER;
		credito_cuenta_pagar_util::$STR_SCHEMA;
		credito_cuenta_pagar_session::class;

		cuenta_pagar_carga::$CONTROLLER;
		cuenta_pagar_util::$STR_SCHEMA;
		cuenta_pagar_session::class;

		cotizacion_carga::$CONTROLLER;
		cotizacion_util::$STR_SCHEMA;
		cotizacion_session::class;

		parametro_inventario_carga::$CONTROLLER;
		parametro_inventario_util::$STR_SCHEMA;
		parametro_inventario_session::class;

		devolucion_carga::$CONTROLLER;
		devolucion_util::$STR_SCHEMA;
		devolucion_session::class;
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
		interface termino_pago_proveedor_controlI {	
		
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
		
		public function onLoad(termino_pago_proveedor_session $termino_pago_proveedor_session=null);	
		function index(?string $strTypeOnLoadtermino_pago_proveedor='',?string $strTipoPaginaAuxiliartermino_pago_proveedor='',?string $strTipoUsuarioAuxiliartermino_pago_proveedor='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadtermino_pago_proveedor='',string $strTipoPaginaAuxiliartermino_pago_proveedor='',string $strTipoUsuarioAuxiliartermino_pago_proveedor='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($termino_pago_proveedorReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(termino_pago_proveedor $termino_pago_proveedorClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(termino_pago_proveedor_session $termino_pago_proveedor_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(termino_pago_proveedor_session $termino_pago_proveedor_session);	
		public function termino_pago_proveedorsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function settermino_pago_proveedorFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
