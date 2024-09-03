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

namespace com\bydan\contabilidad\inventario\cotizacion\presentation\control;

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

use com\bydan\contabilidad\inventario\cotizacion\business\entity\cotizacion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/cotizacion/util/cotizacion_carga.php');
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_carga;

use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_param_return;
use com\bydan\contabilidad\inventario\cotizacion\business\logic\cotizacion_logic;
use com\bydan\contabilidad\inventario\cotizacion\business\logic\cotizacion_logic_add;
use com\bydan\contabilidad\inventario\cotizacion\presentation\session\cotizacion_session;


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

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_carga;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;

use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\entity\termino_pago_proveedor;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\business\logic\termino_pago_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\termino_pago_proveedor\util\termino_pago_proveedor_util;

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_carga;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL


use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_carga;
use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_util;
use com\bydan\contabilidad\inventario\cotizacion_detalle\presentation\session\cotizacion_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cotizacion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cotizacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cotizacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cotizacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cotizacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/inventario/cotizacion/presentation/control/cotizacion_init_control.php');
use com\bydan\contabilidad\inventario\cotizacion\presentation\control\cotizacion_init_control;

include_once('com/bydan/contabilidad/inventario/cotizacion/presentation/control/cotizacion_base_control.php');
use com\bydan\contabilidad\inventario\cotizacion\presentation\control\cotizacion_base_control;

class cotizacion_control extends cotizacion_base_control {	
	
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
			else if($action=='registrarSesionParacotizacion_detalles' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idcotizacionActual=$this->getDataId();
				$this->registrarSesionParacotizacion_detalles($idcotizacionActual);
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
			else if($action=="FK_Idmoneda"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdmonedaParaProcesar();
			}
			else if($action=="FK_Idperiodo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdperiodoParaProcesar();
			}
			else if($action=="FK_Idproveedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdproveedorParaProcesar();
			}
			else if($action=="FK_Idsucursal"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdsucursalParaProcesar();
			}
			else if($action=="FK_Idtermino_pago_proveedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtermino_pago_proveedorParaProcesar();
			}
			else if($action=="FK_Idusuario"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdusuarioParaProcesar();
			}
			else if($action=="FK_Idvendedor"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdvendedorParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcotizacionActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idcotizacionActual
			}
			else if($action=='abrirBusquedaParasucursal') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcotizacionActual=$this->getDataId();
				$this->abrirBusquedaParasucursal();//$idcotizacionActual
			}
			else if($action=='abrirBusquedaParaejercicio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcotizacionActual=$this->getDataId();
				$this->abrirBusquedaParaejercicio();//$idcotizacionActual
			}
			else if($action=='abrirBusquedaParaperiodo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcotizacionActual=$this->getDataId();
				$this->abrirBusquedaParaperiodo();//$idcotizacionActual
			}
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcotizacionActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$idcotizacionActual
			}
			else if($action=='abrirBusquedaParaproveedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcotizacionActual=$this->getDataId();
				$this->abrirBusquedaParaproveedor();//$idcotizacionActual
			}
			else if($action=='abrirBusquedaParavendedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcotizacionActual=$this->getDataId();
				$this->abrirBusquedaParavendedor();//$idcotizacionActual
			}
			else if($action=='abrirBusquedaParatermino_pago_proveedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcotizacionActual=$this->getDataId();
				$this->abrirBusquedaParatermino_pago_proveedor();//$idcotizacionActual
			}
			else if($action=='abrirBusquedaParamoneda') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcotizacionActual=$this->getDataId();
				$this->abrirBusquedaParamoneda();//$idcotizacionActual
			}
			else if($action=='abrirBusquedaParaestado') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idcotizacionActual=$this->getDataId();
				$this->abrirBusquedaParaestado();//$idcotizacionActual
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
					
					$cotizacionController = new cotizacion_control();
					
					$cotizacionController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($cotizacionController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$cotizacionController = new cotizacion_control();
						$cotizacionController = $this;
						
						$jsonResponse = json_encode($cotizacionController->cotizacions);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->cotizacionReturnGeneral==null) {
					$this->cotizacionReturnGeneral=new cotizacion_param_return();
				}
				
				echo($this->cotizacionReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$cotizacionController=new cotizacion_control();
		
		$cotizacionController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$cotizacionController->usuarioActual=new usuario();
		
		$cotizacionController->usuarioActual->setId($this->usuarioActual->getId());
		$cotizacionController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$cotizacionController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$cotizacionController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$cotizacionController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$cotizacionController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$cotizacionController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$cotizacionController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $cotizacionController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadcotizacion= $this->getDataGeneralString('strTypeOnLoadcotizacion');
		$strTipoPaginaAuxiliarcotizacion= $this->getDataGeneralString('strTipoPaginaAuxiliarcotizacion');
		$strTipoUsuarioAuxiliarcotizacion= $this->getDataGeneralString('strTipoUsuarioAuxiliarcotizacion');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadcotizacion,$strTipoPaginaAuxiliarcotizacion,$strTipoUsuarioAuxiliarcotizacion,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadcotizacion!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('cotizacion','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cotizacion_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarcotizacion,$this->strTipoUsuarioAuxiliarcotizacion,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cotizacion_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarcotizacion,$this->strTipoUsuarioAuxiliarcotizacion,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->cotizacionReturnGeneral=new cotizacion_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cotizacionReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cotizacionReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cotizacionReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cotizacionReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cotizacionReturnGeneral);
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
		$this->cotizacionReturnGeneral=new cotizacion_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cotizacionReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cotizacionReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cotizacionReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cotizacionReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cotizacionReturnGeneral);
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
		$this->cotizacionReturnGeneral=new cotizacion_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->cotizacionReturnGeneral->conGuardarReturnSessionJs=true;
		$this->cotizacionReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->cotizacionReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->cotizacionReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->cotizacionReturnGeneral);
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
				$this->cotizacionLogic->getNewConnexionToDeep();
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
			
			
			$this->cotizacionReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->cotizacionReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cotizacionReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->cotizacionReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->cotizacionReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cotizacionReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->cotizacionReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->cotizacionReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->cotizacionReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cotizacionReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->cotizacionReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cotizacionReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->cotizacionReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->cotizacionReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->cotizacionReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->cotizacionReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->cotizacionReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->cotizacionReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
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
		
		$this->cotizacionLogic=new cotizacion_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->cotizacion=new cotizacion();
		
		$this->strTypeOnLoadcotizacion='onload';
		$this->strTipoPaginaAuxiliarcotizacion='none';
		$this->strTipoUsuarioAuxiliarcotizacion='none';	

		$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
		
		$this->cotizacionModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->cotizacionControllerAdditional=new cotizacion_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(cotizacion_session $cotizacion_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($cotizacion_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadcotizacion='',?string $strTipoPaginaAuxiliarcotizacion='',?string $strTipoUsuarioAuxiliarcotizacion='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadcotizacion=$strTypeOnLoadcotizacion;
			$this->strTipoPaginaAuxiliarcotizacion=$strTipoPaginaAuxiliarcotizacion;
			$this->strTipoUsuarioAuxiliarcotizacion=$strTipoUsuarioAuxiliarcotizacion;
	
			if($strTipoUsuarioAuxiliarcotizacion=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->cotizacion=new cotizacion();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Cotizaciones';
			
			
			$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));
							
			if($cotizacion_session==null) {
				$cotizacion_session=new cotizacion_session();
				
				/*$this->Session->write('cotizacion_session',$cotizacion_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($cotizacion_session->strFuncionJsPadre!=null && $cotizacion_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$cotizacion_session->strFuncionJsPadre;
				
				$cotizacion_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($cotizacion_session);
			
			if($strTypeOnLoadcotizacion!=null && $strTypeOnLoadcotizacion=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$cotizacion_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$cotizacion_session->setPaginaPopupVariables(true);
				}
				
				if($cotizacion_session->intNumeroPaginacion==cotizacion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,cotizacion_util::$STR_SESSION_NAME,'inventario');																
			
			} else if($strTypeOnLoadcotizacion!=null && $strTypeOnLoadcotizacion=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$cotizacion_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;*/
				
				if($cotizacion_session->intNumeroPaginacion==cotizacion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarcotizacion!=null && $strTipoPaginaAuxiliarcotizacion=='none') {
				/*$cotizacion_session->strStyleDivHeader='display:table-row';*/
				
				/*$cotizacion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarcotizacion!=null && $strTipoPaginaAuxiliarcotizacion=='iframe') {
					/*
					$cotizacion_session->strStyleDivArbol='display:none';
					$cotizacion_session->strStyleDivHeader='display:none';
					$cotizacion_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$cotizacion_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->cotizacionClase=new cotizacion();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=cotizacion_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(cotizacion_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->cotizacionLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->cotizacionLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$cotizaciondetalleLogic=new cotizacion_detalle_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->cotizacionLogic=new cotizacion_logic();*/
			
			
			$this->cotizacionsModel=null;
			/*new ListDataModel();*/
			
			/*$this->cotizacionsModel.setWrappedData(cotizacionLogic->getcotizacions());*/
						
			$this->cotizacions= array();
			$this->cotizacionsEliminados=array();
			$this->cotizacionsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= cotizacion_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= cotizacion_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->cotizacion= new cotizacion();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idejercicio='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idestado='display:table-row';
			$this->strVisibleFK_Idmoneda='display:table-row';
			$this->strVisibleFK_Idperiodo='display:table-row';
			$this->strVisibleFK_Idproveedor='display:table-row';
			$this->strVisibleFK_Idsucursal='display:table-row';
			$this->strVisibleFK_Idtermino_pago_proveedor='display:table-row';
			$this->strVisibleFK_Idusuario='display:table-row';
			$this->strVisibleFK_Idvendedor='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarcotizacion!=null && $strTipoUsuarioAuxiliarcotizacion!='none' && $strTipoUsuarioAuxiliarcotizacion!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcotizacion);
																
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
				if($strTipoUsuarioAuxiliarcotizacion!=null && $strTipoUsuarioAuxiliarcotizacion!='none' && $strTipoUsuarioAuxiliarcotizacion!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarcotizacion);
																
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
				if($strTipoUsuarioAuxiliarcotizacion==null || $strTipoUsuarioAuxiliarcotizacion=='none' || $strTipoUsuarioAuxiliarcotizacion=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarcotizacion,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cotizacion_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, cotizacion_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina cotizacion');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($cotizacion_session);
			
			$this->getSetBusquedasSesionConfig($cotizacion_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportecotizacions($this->strAccionBusqueda,$this->cotizacionLogic->getcotizacions());*/
				} else if($this->strGenerarReporte=='Html')	{
					$cotizacion_session->strServletGenerarHtmlReporte='cotizacionServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(cotizacion_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(cotizacion_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($cotizacion_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarcotizacion!=null && $strTipoUsuarioAuxiliarcotizacion=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($cotizacion_session);
			}
								
			$this->set(cotizacion_util::$STR_SESSION_NAME, $cotizacion_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($cotizacion_session);
			
			/*
			$this->cotizacion->recursive = 0;
			
			$this->cotizacions=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('cotizacions', $this->cotizacions);
			
			$this->set(cotizacion_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->cotizacionActual =$this->cotizacionClase;
			
			/*$this->cotizacionActual =$this->migrarModelcotizacion($this->cotizacionClase);*/
			
			$this->returnHtml(false);
			
			$this->set(cotizacion_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=cotizacion_util::$STR_NOMBRE_OPCION;
				
			if(cotizacion_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=cotizacion_util::$STR_MODULO_OPCION.cotizacion_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(cotizacion_util::$STR_SESSION_NAME,serialize($cotizacion_session));
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
			/*$cotizacionClase= (cotizacion) cotizacionsModel.getRowData();*/
			
			$this->cotizacionClase->setId($this->cotizacion->getId());	
			$this->cotizacionClase->setVersionRow($this->cotizacion->getVersionRow());	
			$this->cotizacionClase->setVersionRow($this->cotizacion->getVersionRow());	
			$this->cotizacionClase->setid_empresa($this->cotizacion->getid_empresa());	
			$this->cotizacionClase->setid_sucursal($this->cotizacion->getid_sucursal());	
			$this->cotizacionClase->setid_ejercicio($this->cotizacion->getid_ejercicio());	
			$this->cotizacionClase->setid_periodo($this->cotizacion->getid_periodo());	
			$this->cotizacionClase->setid_usuario($this->cotizacion->getid_usuario());	
			$this->cotizacionClase->setid_proveedor($this->cotizacion->getid_proveedor());	
			$this->cotizacionClase->setruc($this->cotizacion->getruc());	
			$this->cotizacionClase->setnumero($this->cotizacion->getnumero());	
			$this->cotizacionClase->setfecha_emision($this->cotizacion->getfecha_emision());	
			$this->cotizacionClase->setid_vendedor($this->cotizacion->getid_vendedor());	
			$this->cotizacionClase->setid_termino_pago_proveedor($this->cotizacion->getid_termino_pago_proveedor());	
			$this->cotizacionClase->setfecha_vence($this->cotizacion->getfecha_vence());	
			$this->cotizacionClase->setid_moneda($this->cotizacion->getid_moneda());	
			$this->cotizacionClase->setcotizacion($this->cotizacion->getcotizacion());	
			$this->cotizacionClase->setdireccion($this->cotizacion->getdireccion());	
			$this->cotizacionClase->setenviar($this->cotizacion->getenviar());	
			$this->cotizacionClase->setobservacion($this->cotizacion->getobservacion());	
			$this->cotizacionClase->setid_estado($this->cotizacion->getid_estado());	
			$this->cotizacionClase->setsub_total($this->cotizacion->getsub_total());	
			$this->cotizacionClase->setdescuento_monto($this->cotizacion->getdescuento_monto());	
			$this->cotizacionClase->setdescuento_porciento($this->cotizacion->getdescuento_porciento());	
			$this->cotizacionClase->setiva_monto($this->cotizacion->getiva_monto());	
			$this->cotizacionClase->setiva_porciento($this->cotizacion->getiva_porciento());	
			$this->cotizacionClase->settotal($this->cotizacion->gettotal());	
			$this->cotizacionClase->setotro_monto($this->cotizacion->getotro_monto());	
			$this->cotizacionClase->setotro_porciento($this->cotizacion->getotro_porciento());	
		
			/*$this->Session->write('cotizacionVersionRowActual', cotizacion.getVersionRow());*/
			
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
			
			$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));
						
			if($cotizacion_session==null) {
				$cotizacion_session=new cotizacion_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('cotizacion', $this->cotizacion->read(null, $id));
	
			
			$this->cotizacion->recursive = 0;
			
			$this->cotizacions=$this->paginate();
			
			$this->set('cotizacions', $this->cotizacions);
	
			if (empty($this->data)) {
				$this->data = $this->cotizacion->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->cotizacionLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cotizacionClase);
			
			$this->cotizacionActual=$this->cotizacionClase;
			
			/*$this->cotizacionActual =$this->migrarModelcotizacion($this->cotizacionClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cotizacionLogic->getcotizacions(),$this->cotizacionActual);
			
			$this->actualizarControllerConReturnGeneral($this->cotizacionReturnGeneral);
			
			//$this->cotizacionReturnGeneral=$this->cotizacionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->cotizacionLogic->getcotizacions(),$this->cotizacionActual,$this->cotizacionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			


				//CLASE COTIZACION_DETALLE
				$this->registrarSesionParacotizacion_detalles($this->idActual,true);

				$cotizacion_detalle_session=null;
				$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));

				if($cotizacion_detalle_session==null) {
					$cotizacion_detalle_session=new cotizacion_detalle_session();
				}

				require_once('com/bydan/contabilidad/inventario/presentation/control/cotizacion_detalle_control.php');
				$cotizacion_detalleController=new cotizacion_detalle_control();

				$cotizacion_detalleController->saveGetSessionControllerAndPageAuxiliar(false);
				$cotizacion_detalleController->getcotizacion_detalleLogic()->setConnexion($this->getcotizacionLogic()->getConnexion());
				$cotizacion_detalleController->cargarCombosFK(false);
				$cotizacion_detalleController->getSetBusquedasSesionConfig($cotizacion_detalle_session);
				$cotizacion_detalleController->onLoad($cotizacion_detalle_session);
				$cotizacion_detalleController->saveGetSessionControllerAndPageAuxiliar(true);
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));
						
			if($cotizacion_session==null) {
				$cotizacion_session=new cotizacion_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevocotizacion', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->cotizacionClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->cotizacionClase);
			
			$this->cotizacionActual =$this->cotizacionClase;
			
			/*$this->cotizacionActual =$this->migrarModelcotizacion($this->cotizacionClase);*/
			
			$this->setcotizacionFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cotizacionLogic->getcotizacions(),$this->cotizacion);
			
			$this->actualizarControllerConReturnGeneral($this->cotizacionReturnGeneral);
			
			//this->cotizacionReturnGeneral=$this->cotizacionLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->cotizacionLogic->getcotizacions(),$this->cotizacion,$this->cotizacionParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->cotizacionReturnGeneral->getcotizacion()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idsucursalDefaultFK!=null && $this->idsucursalDefaultFK > -1) {
				$this->cotizacionReturnGeneral->getcotizacion()->setid_sucursal($this->idsucursalDefaultFK);
			}

			if($this->idejercicioDefaultFK!=null && $this->idejercicioDefaultFK > -1) {
				$this->cotizacionReturnGeneral->getcotizacion()->setid_ejercicio($this->idejercicioDefaultFK);
			}

			if($this->idperiodoDefaultFK!=null && $this->idperiodoDefaultFK > -1) {
				$this->cotizacionReturnGeneral->getcotizacion()->setid_periodo($this->idperiodoDefaultFK);
			}

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->cotizacionReturnGeneral->getcotizacion()->setid_usuario($this->idusuarioDefaultFK);
			}

			if($this->idproveedorDefaultFK!=null && $this->idproveedorDefaultFK > -1) {
				$this->cotizacionReturnGeneral->getcotizacion()->setid_proveedor($this->idproveedorDefaultFK);
			}

			if($this->idvendedorDefaultFK!=null && $this->idvendedorDefaultFK > -1) {
				$this->cotizacionReturnGeneral->getcotizacion()->setid_vendedor($this->idvendedorDefaultFK);
			}

			if($this->idtermino_pago_proveedorDefaultFK!=null && $this->idtermino_pago_proveedorDefaultFK > -1) {
				$this->cotizacionReturnGeneral->getcotizacion()->setid_termino_pago_proveedor($this->idtermino_pago_proveedorDefaultFK);
			}

			if($this->idmonedaDefaultFK!=null && $this->idmonedaDefaultFK > -1) {
				$this->cotizacionReturnGeneral->getcotizacion()->setid_moneda($this->idmonedaDefaultFK);
			}

			if($this->idestadoDefaultFK!=null && $this->idestadoDefaultFK > -1) {
				$this->cotizacionReturnGeneral->getcotizacion()->setid_estado($this->idestadoDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->cotizacionReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->cotizacionReturnGeneral->getcotizacion(),$this->cotizacionActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeycotizacion($this->cotizacionReturnGeneral->getcotizacion());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariocotizacion($this->cotizacionReturnGeneral->getcotizacion());*/
			}
			
			if($this->cotizacionReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->cotizacionReturnGeneral->getcotizacion(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualcotizacion($this->cotizacion,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			


				//CLASE COTIZACION_DETALLE
				$this->registrarSesionParacotizacion_detalles($this->idActual,true);

				$cotizacion_detalle_session=null;
				$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));

				if($cotizacion_detalle_session==null) {
					$cotizacion_detalle_session=new cotizacion_detalle_session();
				}

				require_once('com/bydan/contabilidad/inventario/presentation/control/cotizacion_detalle_control.php');
				$cotizacion_detalleController=new cotizacion_detalle_control();

				$cotizacion_detalleController->saveGetSessionControllerAndPageAuxiliar(false);
				$cotizacion_detalleController->getcotizacion_detalleLogic()->setConnexion($this->getcotizacionLogic()->getConnexion());
				$cotizacion_detalleController->cargarCombosFK(false);
				$cotizacion_detalleController->getSetBusquedasSesionConfig($cotizacion_detalle_session);
				$cotizacion_detalleController->onLoad($cotizacion_detalle_session);
				$cotizacion_detalleController->saveGetSessionControllerAndPageAuxiliar(true);
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->cotizacionsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cotizacionsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->cotizacionsAuxiliar=array();
			}
			
			if(count($this->cotizacionsAuxiliar)==2) {
				$cotizacionOrigen=$this->cotizacionsAuxiliar[0];
				$cotizacionDestino=$this->cotizacionsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($cotizacionOrigen,$cotizacionDestino,true,false,false);
				
				$this->actualizarLista($cotizacionDestino,$this->cotizacions);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->cotizacionsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cotizacionsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cotizacionsAuxiliar=array();
			}
			
			if(count($this->cotizacionsAuxiliar) > 0) {
				foreach ($this->cotizacionsAuxiliar as $cotizacionSeleccionado) {
					$this->cotizacion=new cotizacion();
					
					$this->setCopiarVariablesObjetos($cotizacionSeleccionado,$this->cotizacion,true,true,false);
						
					$this->cotizacions[]=$this->cotizacion;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->cotizacionsEliminados as $cotizacionEliminado) {
				$this->cotizacionLogic->cotizacions[]=$cotizacionEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->cotizacion=new cotizacion();
							
				$this->cotizacions[]=$this->cotizacion;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
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
		
		$cotizacionActual=new cotizacion();
		
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
				
				$cotizacionActual=$this->cotizacions[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $cotizacionActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $cotizacionActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $cotizacionActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $cotizacionActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $cotizacionActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $cotizacionActual->setid_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $cotizacionActual->setruc($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $cotizacionActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $cotizacionActual->setfecha_emision(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $cotizacionActual->setid_vendedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $cotizacionActual->setid_termino_pago_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $cotizacionActual->setfecha_vence(Funciones::getFechaHoraFromData2('date',$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14')));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $cotizacionActual->setid_moneda((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $cotizacionActual->setcotizacion((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $cotizacionActual->setdireccion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_18','t'.$this->strSufijo)) {  $cotizacionActual->setenviar($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_18'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_19','t'.$this->strSufijo)) {  $cotizacionActual->setobservacion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_19'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_20','t'.$this->strSufijo)) {  $cotizacionActual->setid_estado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_20'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_21','t'.$this->strSufijo)) {  $cotizacionActual->setsub_total((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_21'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_22','t'.$this->strSufijo)) {  $cotizacionActual->setdescuento_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_22'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_23','t'.$this->strSufijo)) {  $cotizacionActual->setdescuento_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_23'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_24','t'.$this->strSufijo)) {  $cotizacionActual->setiva_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_24'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_25','t'.$this->strSufijo)) {  $cotizacionActual->setiva_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_25'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_26','t'.$this->strSufijo)) {  $cotizacionActual->settotal((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_26'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_27','t'.$this->strSufijo)) {  $cotizacionActual->setotro_monto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_27'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_28','t'.$this->strSufijo)) {  $cotizacionActual->setotro_porciento((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_28'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->cotizacionsAuxiliar=array();		 
		/*$this->cotizacionsEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->cotizacionsAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->cotizacionsAuxiliar=array();
		}
			
		if(count($this->cotizacionsAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->cotizacionsAuxiliar as $cotizacionAuxLocal) {				
				
				foreach($this->cotizacions as $cotizacionLocal) {
					if($cotizacionLocal->getId()==$cotizacionAuxLocal->getId()) {
						$cotizacionLocal->setIsDeleted(true);
						
						/*$this->cotizacionsEliminados[]=$cotizacionLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->cotizacionLogic->setcotizacions($this->cotizacions);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
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
				$this->cotizacionLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadcotizacion='',string $strTipoPaginaAuxiliarcotizacion='',string $strTipoUsuarioAuxiliarcotizacion='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadcotizacion,$strTipoPaginaAuxiliarcotizacion,$strTipoUsuarioAuxiliarcotizacion,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->cotizacions) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=cotizacion_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=cotizacion_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=cotizacion_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));
						
			if($cotizacion_session==null) {
				$cotizacion_session=new cotizacion_session();
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
					/*$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;*/
					
					if($cotizacion_session->intNumeroPaginacion==cotizacion_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$cotizacion_session->intNumeroPaginacion;
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
			
			$this->cotizacionsEliminados=array();
			
			/*$this->cotizacionLogic->setConnexion($connexion);*/
			
			$this->cotizacionLogic->setIsConDeep(true);
			
			$this->cotizacionLogic->getcotizacionDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('vendedor');$classes[]=$class;
			$class=new Classe('termino_pago_proveedor');$classes[]=$class;
			$class=new Classe('moneda');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
			
			$this->cotizacionLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cotizacionLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->cotizacionLogic->getcotizacions()==null|| count($this->cotizacionLogic->getcotizacions())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cotizacions=$this->cotizacionLogic->getcotizacions();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cotizacionLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->cotizacionsReporte=$this->cotizacionLogic->getcotizacions();
									
						/*$this->generarReportes('Todos',$this->cotizacionLogic->getcotizacions());*/
					
						$this->cotizacionLogic->setcotizacions($this->cotizacions);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cotizacionLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->cotizacionLogic->getcotizacions()==null|| count($this->cotizacionLogic->getcotizacions())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->cotizacions=$this->cotizacionLogic->getcotizacions();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->cotizacionLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->cotizacionsReporte=$this->cotizacionLogic->getcotizacions();
									
						/*$this->generarReportes('Todos',$this->cotizacionLogic->getcotizacions());*/
					
						$this->cotizacionLogic->setcotizacions($this->cotizacions);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idcotizacion=0;*/
				
				if($cotizacion_session->bitBusquedaDesdeFKSesionFK!=null && $cotizacion_session->bitBusquedaDesdeFKSesionFK==true) {
					if($cotizacion_session->bigIdActualFK!=null && $cotizacion_session->bigIdActualFK!=0)	{
						$this->idcotizacion=$cotizacion_session->bigIdActualFK;	
					}
					
					$cotizacion_session->bitBusquedaDesdeFKSesionFK=false;
					
					$cotizacion_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idcotizacion=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idcotizacion=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->cotizacionLogic->getEntity($this->idcotizacion);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*cotizacionLogicAdditional::getDetalleIndicePorId($idcotizacion);*/

				
				if($this->cotizacionLogic->getcotizacion()!=null) {
					$this->cotizacionLogic->setcotizacions(array());
					$this->cotizacionLogic->cotizacions[]=$this->cotizacionLogic->getcotizacion();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idejercicio')
			{

				if($cotizacion_session->bigidejercicioActual!=null && $cotizacion_session->bigidejercicioActual!=0)
				{
					$this->id_ejercicioFK_Idejercicio=$cotizacion_session->bigidejercicioActual;
					$cotizacion_session->bigidejercicioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idejercicio($finalQueryPaginacion,$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cotizacionLogicAdditional::getDetalleIndiceFK_Idejercicio($this->id_ejercicioFK_Idejercicio);


					if($this->cotizacionLogic->getcotizacions()==null || count($this->cotizacionLogic->getcotizacions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cotizacions=$this->cotizacionLogic->getcotizacions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idejercicio('',$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cotizacionsReporte=$this->cotizacionLogic->getcotizacions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecotizacions("FK_Idejercicio",$this->cotizacionLogic->getcotizacions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cotizacionLogic->setcotizacions($cotizacions);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($cotizacion_session->bigidempresaActual!=null && $cotizacion_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$cotizacion_session->bigidempresaActual;
					$cotizacion_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cotizacionLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->cotizacionLogic->getcotizacions()==null || count($this->cotizacionLogic->getcotizacions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cotizacions=$this->cotizacionLogic->getcotizacions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cotizacionsReporte=$this->cotizacionLogic->getcotizacions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecotizacions("FK_Idempresa",$this->cotizacionLogic->getcotizacions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cotizacionLogic->setcotizacions($cotizacions);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idestado')
			{

				if($cotizacion_session->bigidestadoActual!=null && $cotizacion_session->bigidestadoActual!=0)
				{
					$this->id_estadoFK_Idestado=$cotizacion_session->bigidestadoActual;
					$cotizacion_session->bigidestadoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idestado($finalQueryPaginacion,$this->pagination,$this->id_estadoFK_Idestado);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cotizacionLogicAdditional::getDetalleIndiceFK_Idestado($this->id_estadoFK_Idestado);


					if($this->cotizacionLogic->getcotizacions()==null || count($this->cotizacionLogic->getcotizacions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cotizacions=$this->cotizacionLogic->getcotizacions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idestado('',$this->pagination,$this->id_estadoFK_Idestado);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cotizacionsReporte=$this->cotizacionLogic->getcotizacions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecotizacions("FK_Idestado",$this->cotizacionLogic->getcotizacions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cotizacionLogic->setcotizacions($cotizacions);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idmoneda')
			{

				if($cotizacion_session->bigidmonedaActual!=null && $cotizacion_session->bigidmonedaActual!=0)
				{
					$this->id_monedaFK_Idmoneda=$cotizacion_session->bigidmonedaActual;
					$cotizacion_session->bigidmonedaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idmoneda($finalQueryPaginacion,$this->pagination,$this->id_monedaFK_Idmoneda);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cotizacionLogicAdditional::getDetalleIndiceFK_Idmoneda($this->id_monedaFK_Idmoneda);


					if($this->cotizacionLogic->getcotizacions()==null || count($this->cotizacionLogic->getcotizacions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cotizacions=$this->cotizacionLogic->getcotizacions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idmoneda('',$this->pagination,$this->id_monedaFK_Idmoneda);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cotizacionsReporte=$this->cotizacionLogic->getcotizacions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecotizacions("FK_Idmoneda",$this->cotizacionLogic->getcotizacions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cotizacionLogic->setcotizacions($cotizacions);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperiodo')
			{

				if($cotizacion_session->bigidperiodoActual!=null && $cotizacion_session->bigidperiodoActual!=0)
				{
					$this->id_periodoFK_Idperiodo=$cotizacion_session->bigidperiodoActual;
					$cotizacion_session->bigidperiodoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idperiodo($finalQueryPaginacion,$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cotizacionLogicAdditional::getDetalleIndiceFK_Idperiodo($this->id_periodoFK_Idperiodo);


					if($this->cotizacionLogic->getcotizacions()==null || count($this->cotizacionLogic->getcotizacions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cotizacions=$this->cotizacionLogic->getcotizacions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idperiodo('',$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cotizacionsReporte=$this->cotizacionLogic->getcotizacions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecotizacions("FK_Idperiodo",$this->cotizacionLogic->getcotizacions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cotizacionLogic->setcotizacions($cotizacions);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idproveedor')
			{

				if($cotizacion_session->bigidproveedorActual!=null && $cotizacion_session->bigidproveedorActual!=0)
				{
					$this->id_proveedorFK_Idproveedor=$cotizacion_session->bigidproveedorActual;
					$cotizacion_session->bigidproveedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idproveedor($finalQueryPaginacion,$this->pagination,$this->id_proveedorFK_Idproveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cotizacionLogicAdditional::getDetalleIndiceFK_Idproveedor($this->id_proveedorFK_Idproveedor);


					if($this->cotizacionLogic->getcotizacions()==null || count($this->cotizacionLogic->getcotizacions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cotizacions=$this->cotizacionLogic->getcotizacions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idproveedor('',$this->pagination,$this->id_proveedorFK_Idproveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cotizacionsReporte=$this->cotizacionLogic->getcotizacions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecotizacions("FK_Idproveedor",$this->cotizacionLogic->getcotizacions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cotizacionLogic->setcotizacions($cotizacions);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsucursal')
			{

				if($cotizacion_session->bigidsucursalActual!=null && $cotizacion_session->bigidsucursalActual!=0)
				{
					$this->id_sucursalFK_Idsucursal=$cotizacion_session->bigidsucursalActual;
					$cotizacion_session->bigidsucursalActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idsucursal($finalQueryPaginacion,$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cotizacionLogicAdditional::getDetalleIndiceFK_Idsucursal($this->id_sucursalFK_Idsucursal);


					if($this->cotizacionLogic->getcotizacions()==null || count($this->cotizacionLogic->getcotizacions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cotizacions=$this->cotizacionLogic->getcotizacions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idsucursal('',$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cotizacionsReporte=$this->cotizacionLogic->getcotizacions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecotizacions("FK_Idsucursal",$this->cotizacionLogic->getcotizacions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cotizacionLogic->setcotizacions($cotizacions);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtermino_pago_proveedor')
			{

				if($cotizacion_session->bigidtermino_pago_proveedorActual!=null && $cotizacion_session->bigidtermino_pago_proveedorActual!=0)
				{
					$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=$cotizacion_session->bigidtermino_pago_proveedorActual;
					$cotizacion_session->bigidtermino_pago_proveedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idtermino_pago_proveedor($finalQueryPaginacion,$this->pagination,$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cotizacionLogicAdditional::getDetalleIndiceFK_Idtermino_pago_proveedor($this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor);


					if($this->cotizacionLogic->getcotizacions()==null || count($this->cotizacionLogic->getcotizacions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cotizacions=$this->cotizacionLogic->getcotizacions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idtermino_pago_proveedor('',$this->pagination,$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cotizacionsReporte=$this->cotizacionLogic->getcotizacions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecotizacions("FK_Idtermino_pago_proveedor",$this->cotizacionLogic->getcotizacions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cotizacionLogic->setcotizacions($cotizacions);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($cotizacion_session->bigidusuarioActual!=null && $cotizacion_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$cotizacion_session->bigidusuarioActual;
					$cotizacion_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cotizacionLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->cotizacionLogic->getcotizacions()==null || count($this->cotizacionLogic->getcotizacions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cotizacions=$this->cotizacionLogic->getcotizacions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cotizacionsReporte=$this->cotizacionLogic->getcotizacions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecotizacions("FK_Idusuario",$this->cotizacionLogic->getcotizacions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cotizacionLogic->setcotizacions($cotizacions);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idvendedor')
			{

				if($cotizacion_session->bigidvendedorActual!=null && $cotizacion_session->bigidvendedorActual!=0)
				{
					$this->id_vendedorFK_Idvendedor=$cotizacion_session->bigidvendedorActual;
					$cotizacion_session->bigidvendedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idvendedor($finalQueryPaginacion,$this->pagination,$this->id_vendedorFK_Idvendedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//cotizacionLogicAdditional::getDetalleIndiceFK_Idvendedor($this->id_vendedorFK_Idvendedor);


					if($this->cotizacionLogic->getcotizacions()==null || count($this->cotizacionLogic->getcotizacions())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$cotizacions=$this->cotizacionLogic->getcotizacions();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->cotizacionLogic->getsFK_Idvendedor('',$this->pagination,$this->id_vendedorFK_Idvendedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->cotizacionsReporte=$this->cotizacionLogic->getcotizacions();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportecotizacions("FK_Idvendedor",$this->cotizacionLogic->getcotizacions());

					if($this->strTipoPaginacion=='TODOS') {
						$this->cotizacionLogic->setcotizacions($cotizacions);
					}
				//}

			} 
		
		$cotizacion_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cotizacion_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->cotizacionLogic->loadForeignsKeysDescription();*/
		
		$this->cotizacions=$this->cotizacionLogic->getcotizacions();
		
		if($this->cotizacionsEliminados==null) {
			$this->cotizacionsEliminados=array();
		}
		
		$this->Session->write(cotizacion_util::$STR_SESSION_NAME.'Lista',serialize($this->cotizacions));
		$this->Session->write(cotizacion_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->cotizacionsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(cotizacion_util::$STR_SESSION_NAME,serialize($cotizacion_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idcotizacion=$idGeneral;
			
			$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
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
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}

			if(count($this->cotizacions) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
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
				$this->cotizacionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ejercicioFK_Idejercicio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idejercicio','cmbid_ejercicio');

			$this->strAccionBusqueda='FK_Idejercicio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
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
				$this->cotizacionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
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
				$this->cotizacionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_estadoFK_Idestado=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idestado','cmbid_estado');

			$this->strAccionBusqueda='FK_Idestado';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdmonedaParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_monedaFK_Idmoneda=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idmoneda','cmbid_moneda');

			$this->strAccionBusqueda='FK_Idmoneda';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
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
				$this->cotizacionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_periodoFK_Idperiodo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperiodo','cmbid_periodo');

			$this->strAccionBusqueda='FK_Idperiodo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdproveedorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_proveedorFK_Idproveedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproveedor','cmbid_proveedor');

			$this->strAccionBusqueda='FK_Idproveedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
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
				$this->cotizacionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sucursalFK_Idsucursal=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsucursal','cmbid_sucursal');

			$this->strAccionBusqueda='FK_Idsucursal';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtermino_pago_proveedorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtermino_pago_proveedor','cmbid_termino_pago_proveedor');

			$this->strAccionBusqueda='FK_Idtermino_pago_proveedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
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
				$this->cotizacionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdvendedorParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_vendedorFK_Idvendedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idvendedor','cmbid_vendedor');

			$this->strAccionBusqueda='FK_Idvendedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idejercicio($strFinalQuery,$id_ejercicio)
	{
		try
		{

			$this->cotizacionLogic->getsFK_Idejercicio($strFinalQuery,new Pagination(),$id_ejercicio);
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

			$this->cotizacionLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
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

			$this->cotizacionLogic->getsFK_Idestado($strFinalQuery,new Pagination(),$id_estado);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idmoneda($strFinalQuery,$id_moneda)
	{
		try
		{

			$this->cotizacionLogic->getsFK_Idmoneda($strFinalQuery,new Pagination(),$id_moneda);
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

			$this->cotizacionLogic->getsFK_Idperiodo($strFinalQuery,new Pagination(),$id_periodo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idproveedor($strFinalQuery,$id_proveedor)
	{
		try
		{

			$this->cotizacionLogic->getsFK_Idproveedor($strFinalQuery,new Pagination(),$id_proveedor);
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

			$this->cotizacionLogic->getsFK_Idsucursal($strFinalQuery,new Pagination(),$id_sucursal);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtermino_pago_proveedor($strFinalQuery,$id_termino_pago_proveedor)
	{
		try
		{

			$this->cotizacionLogic->getsFK_Idtermino_pago_proveedor($strFinalQuery,new Pagination(),$id_termino_pago_proveedor);
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

			$this->cotizacionLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idvendedor($strFinalQuery,$id_vendedor)
	{
		try
		{

			$this->cotizacionLogic->getsFK_Idvendedor($strFinalQuery,new Pagination(),$id_vendedor);
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
			
			
			$cotizacionForeignKey=new cotizacion_param_return(); //cotizacionForeignKey();
			
			$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));
						
			if($cotizacion_session==null) {
				$cotizacion_session=new cotizacion_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$cotizacionForeignKey=$this->cotizacionLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$cotizacion_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$cotizacionForeignKey->empresasFK;
				$this->idempresaDefaultFK=$cotizacionForeignKey->idempresaDefaultFK;
			}

			if($cotizacion_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$this->strRecargarFkTipos,',')) {
				$this->sucursalsFK=$cotizacionForeignKey->sucursalsFK;
				$this->idsucursalDefaultFK=$cotizacionForeignKey->idsucursalDefaultFK;
			}

			if($cotizacion_session->bitBusquedaDesdeFKSesionsucursal) {
				$this->setVisibleBusquedasParasucursal(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$this->strRecargarFkTipos,',')) {
				$this->ejerciciosFK=$cotizacionForeignKey->ejerciciosFK;
				$this->idejercicioDefaultFK=$cotizacionForeignKey->idejercicioDefaultFK;
			}

			if($cotizacion_session->bitBusquedaDesdeFKSesionejercicio) {
				$this->setVisibleBusquedasParaejercicio(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$this->strRecargarFkTipos,',')) {
				$this->periodosFK=$cotizacionForeignKey->periodosFK;
				$this->idperiodoDefaultFK=$cotizacionForeignKey->idperiodoDefaultFK;
			}

			if($cotizacion_session->bitBusquedaDesdeFKSesionperiodo) {
				$this->setVisibleBusquedasParaperiodo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$cotizacionForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$cotizacionForeignKey->idusuarioDefaultFK;
			}

			if($cotizacion_session->bitBusquedaDesdeFKSesionusuario) {
				$this->setVisibleBusquedasParausuario(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$this->strRecargarFkTipos,',')) {
				$this->proveedorsFK=$cotizacionForeignKey->proveedorsFK;
				$this->idproveedorDefaultFK=$cotizacionForeignKey->idproveedorDefaultFK;
			}

			if($cotizacion_session->bitBusquedaDesdeFKSesionproveedor) {
				$this->setVisibleBusquedasParaproveedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_vendedor',$this->strRecargarFkTipos,',')) {
				$this->vendedorsFK=$cotizacionForeignKey->vendedorsFK;
				$this->idvendedorDefaultFK=$cotizacionForeignKey->idvendedorDefaultFK;
			}

			if($cotizacion_session->bitBusquedaDesdeFKSesionvendedor) {
				$this->setVisibleBusquedasParavendedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_termino_pago_proveedor',$this->strRecargarFkTipos,',')) {
				$this->termino_pago_proveedorsFK=$cotizacionForeignKey->termino_pago_proveedorsFK;
				$this->idtermino_pago_proveedorDefaultFK=$cotizacionForeignKey->idtermino_pago_proveedorDefaultFK;
			}

			if($cotizacion_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor) {
				$this->setVisibleBusquedasParatermino_pago_proveedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_moneda',$this->strRecargarFkTipos,',')) {
				$this->monedasFK=$cotizacionForeignKey->monedasFK;
				$this->idmonedaDefaultFK=$cotizacionForeignKey->idmonedaDefaultFK;
			}

			if($cotizacion_session->bitBusquedaDesdeFKSesionmoneda) {
				$this->setVisibleBusquedasParamoneda(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$this->strRecargarFkTipos,',')) {
				$this->estadosFK=$cotizacionForeignKey->estadosFK;
				$this->idestadoDefaultFK=$cotizacionForeignKey->idestadoDefaultFK;
			}

			if($cotizacion_session->bitBusquedaDesdeFKSesionestado) {
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
	
	function cargarCombosFKFromReturnGeneral($cotizacionReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$cotizacionReturnGeneral->strRecargarFkTipos;
			
			


			if($cotizacionReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$cotizacionReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$cotizacionReturnGeneral->idempresaDefaultFK;
			}


			if($cotizacionReturnGeneral->con_sucursalsFK==true) {
				$this->sucursalsFK=$cotizacionReturnGeneral->sucursalsFK;
				$this->idsucursalDefaultFK=$cotizacionReturnGeneral->idsucursalDefaultFK;
			}


			if($cotizacionReturnGeneral->con_ejerciciosFK==true) {
				$this->ejerciciosFK=$cotizacionReturnGeneral->ejerciciosFK;
				$this->idejercicioDefaultFK=$cotizacionReturnGeneral->idejercicioDefaultFK;
			}


			if($cotizacionReturnGeneral->con_periodosFK==true) {
				$this->periodosFK=$cotizacionReturnGeneral->periodosFK;
				$this->idperiodoDefaultFK=$cotizacionReturnGeneral->idperiodoDefaultFK;
			}


			if($cotizacionReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$cotizacionReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$cotizacionReturnGeneral->idusuarioDefaultFK;
			}


			if($cotizacionReturnGeneral->con_proveedorsFK==true) {
				$this->proveedorsFK=$cotizacionReturnGeneral->proveedorsFK;
				$this->idproveedorDefaultFK=$cotizacionReturnGeneral->idproveedorDefaultFK;
			}


			if($cotizacionReturnGeneral->con_vendedorsFK==true) {
				$this->vendedorsFK=$cotizacionReturnGeneral->vendedorsFK;
				$this->idvendedorDefaultFK=$cotizacionReturnGeneral->idvendedorDefaultFK;
			}


			if($cotizacionReturnGeneral->con_termino_pago_proveedorsFK==true) {
				$this->termino_pago_proveedorsFK=$cotizacionReturnGeneral->termino_pago_proveedorsFK;
				$this->idtermino_pago_proveedorDefaultFK=$cotizacionReturnGeneral->idtermino_pago_proveedorDefaultFK;
			}


			if($cotizacionReturnGeneral->con_monedasFK==true) {
				$this->monedasFK=$cotizacionReturnGeneral->monedasFK;
				$this->idmonedaDefaultFK=$cotizacionReturnGeneral->idmonedaDefaultFK;
			}


			if($cotizacionReturnGeneral->con_estadosFK==true) {
				$this->estadosFK=$cotizacionReturnGeneral->estadosFK;
				$this->idestadoDefaultFK=$cotizacionReturnGeneral->idestadoDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(cotizacion_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));
		
		if($cotizacion_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($cotizacion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($cotizacion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sucursal_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sucursal';
			}
			else if($cotizacion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ejercicio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ejercicio';
			}
			else if($cotizacion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==periodo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='periodo';
			}
			else if($cotizacion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			else if($cotizacion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==proveedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='proveedor';
			}
			else if($cotizacion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==vendedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='vendedor';
			}
			else if($cotizacion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==termino_pago_proveedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='termino_pago_proveedor';
			}
			else if($cotizacion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==moneda_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='moneda';
			}
			else if($cotizacion_session->getstrNombrePaginaNavegacionHaciaFKDesde()==estado_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='estado';
			}
			
			$cotizacion_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->getNewConnexionToDeep();
			}						
			
			$this->cotizacionsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->cotizacionsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->cotizacionsAuxiliar=array();
			}
			
			if(count($this->cotizacionsAuxiliar) > 0) {
				
				foreach ($this->cotizacionsAuxiliar as $cotizacionSeleccionado) {
					$this->eliminarTablaBase($cotizacionSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('cotizacion_detalle');
			$tipoRelacionReporte->setsDescripcion(' Detalles');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=cotizacion_detalle_util::$STR_NOMBRE_CLASE;
		
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


	public function getproveedorsFKListSelectItem() 
	{
		$proveedorsList=array();

		$item=null;

		foreach($this->proveedorsFK as $proveedor)
		{
			$item=new SelectItem();
			$item->setLabel($proveedor->getnombre_completo());
			$item->setValue($proveedor->getId());
			$proveedorsList[]=$item;
		}

		return $proveedorsList;
	}


	public function getvendedorsFKListSelectItem() 
	{
		$vendedorsList=array();

		$item=null;

		foreach($this->vendedorsFK as $vendedor)
		{
			$item=new SelectItem();
			$item->setLabel($vendedor->getnombre());
			$item->setValue($vendedor->getId());
			$vendedorsList[]=$item;
		}

		return $vendedorsList;
	}


	public function gettermino_pago_proveedorsFKListSelectItem() 
	{
		$termino_pago_proveedorsList=array();

		$item=null;

		foreach($this->termino_pago_proveedorsFK as $termino_pago_proveedor)
		{
			$item=new SelectItem();
			$item->setLabel($termino_pago_proveedor->getdescripcion());
			$item->setValue($termino_pago_proveedor->getId());
			$termino_pago_proveedorsList[]=$item;
		}

		return $termino_pago_proveedorsList;
	}


	public function getmonedasFKListSelectItem() 
	{
		$monedasList=array();

		$item=null;

		foreach($this->monedasFK as $moneda)
		{
			$item=new SelectItem();
			$item->setLabel($moneda->getcodigo());
			$item->setValue($moneda->getId());
			$monedasList[]=$item;
		}

		return $monedasList;
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
				$this->cotizacionLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
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
				$this->cotizacionLogic->commitNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->rollbackNewConnexionToDeep();
				$this->cotizacionLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$cotizacionsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->cotizacions as $cotizacionLocal) {
				if($cotizacionLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->cotizacion=new cotizacion();
				
				$this->cotizacion->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->cotizacions[]=$this->cotizacion;*/
				
				$cotizacionsNuevos[]=$this->cotizacion;
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
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('vendedor');$classes[]=$class;
				$class=new Classe('termino_pago_proveedor');$classes[]=$class;
				$class=new Classe('moneda');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->cotizacionLogic->setcotizacions($cotizacionsNuevos);
					
				$this->cotizacionLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($cotizacionsNuevos as $cotizacionNuevo) {
					$this->cotizacions[]=$cotizacionNuevo;
				}
				
				/*$this->cotizacions[]=$cotizacionsNuevos;*/
				
				$this->cotizacionLogic->setcotizacions($this->cotizacions);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($cotizacionsNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($cotizacion_session->bigidempresaActual!=null && $cotizacion_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($cotizacion_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=cotizacion_util::getempresaDescripcion($empresaLogic->getempresa());
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

		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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


			if($cotizacion_session->bigidsucursalActual!=null && $cotizacion_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($cotizacion_session->bigidsucursalActual);//WithConnection

				$this->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=cotizacion_util::getsucursalDescripcion($sucursalLogic->getsucursal());
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

		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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


			if($cotizacion_session->bigidejercicioActual!=null && $cotizacion_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($cotizacion_session->bigidejercicioActual);//WithConnection

				$this->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=cotizacion_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
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

		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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


			if($cotizacion_session->bigidperiodoActual!=null && $cotizacion_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($cotizacion_session->bigidperiodoActual);//WithConnection

				$this->periodosFK[$periodoLogic->getperiodo()->getId()]=cotizacion_util::getperiodoDescripcion($periodoLogic->getperiodo());
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

		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionusuario!=true) {
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


			if($cotizacion_session->bigidusuarioActual!=null && $cotizacion_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($cotizacion_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=cotizacion_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosproveedorsFK($connexion=null,$strRecargarFkQuery=''){
		$proveedorLogic= new proveedor_logic();
		$pagination= new Pagination();
		$this->proveedorsFK=array();

		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionproveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=proveedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalproveedor=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalproveedor=Funciones::GetFinalQueryAppend($finalQueryGlobalproveedor, '');
				$finalQueryGlobalproveedor.=proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalproveedor.$strRecargarFkQuery;		

				$proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosproveedorsFK($proveedorLogic->getproveedors());

		} else {
			$this->setVisibleBusquedasParaproveedor(true);


			if($cotizacion_session->bigidproveedorActual!=null && $cotizacion_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($cotizacion_session->bigidproveedorActual);//WithConnection

				$this->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=cotizacion_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$this->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	public function cargarCombosvendedorsFK($connexion=null,$strRecargarFkQuery=''){
		$vendedorLogic= new vendedor_logic();
		$pagination= new Pagination();
		$this->vendedorsFK=array();

		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionvendedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=vendedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalvendedor=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalvendedor=Funciones::GetFinalQueryAppend($finalQueryGlobalvendedor, '');
				$finalQueryGlobalvendedor.=vendedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalvendedor.$strRecargarFkQuery;		

				$vendedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosvendedorsFK($vendedorLogic->getvendedors());

		} else {
			$this->setVisibleBusquedasParavendedor(true);


			if($cotizacion_session->bigidvendedorActual!=null && $cotizacion_session->bigidvendedorActual > 0) {
				$vendedorLogic->getEntity($cotizacion_session->bigidvendedorActual);//WithConnection

				$this->vendedorsFK[$vendedorLogic->getvendedor()->getId()]=cotizacion_util::getvendedorDescripcion($vendedorLogic->getvendedor());
				$this->idvendedorDefaultFK=$vendedorLogic->getvendedor()->getId();
			}
		}
	}

	public function cargarCombostermino_pago_proveedorsFK($connexion=null,$strRecargarFkQuery=''){
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic();
		$pagination= new Pagination();
		$this->termino_pago_proveedorsFK=array();

		$termino_pago_proveedorLogic->setConnexion($connexion);
		$termino_pago_proveedorLogic->gettermino_pago_proveedorDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=termino_pago_proveedor_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltermino_pago_proveedor=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltermino_pago_proveedor=Funciones::GetFinalQueryAppend($finalQueryGlobaltermino_pago_proveedor, '');
				$finalQueryGlobaltermino_pago_proveedor.=termino_pago_proveedor_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltermino_pago_proveedor.$strRecargarFkQuery;		

				$termino_pago_proveedorLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostermino_pago_proveedorsFK($termino_pago_proveedorLogic->gettermino_pago_proveedors());

		} else {
			$this->setVisibleBusquedasParatermino_pago_proveedor(true);


			if($cotizacion_session->bigidtermino_pago_proveedorActual!=null && $cotizacion_session->bigidtermino_pago_proveedorActual > 0) {
				$termino_pago_proveedorLogic->getEntity($cotizacion_session->bigidtermino_pago_proveedorActual);//WithConnection

				$this->termino_pago_proveedorsFK[$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId()]=cotizacion_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLogic->gettermino_pago_proveedor());
				$this->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLogic->gettermino_pago_proveedor()->getId();
			}
		}
	}

	public function cargarCombosmonedasFK($connexion=null,$strRecargarFkQuery=''){
		$monedaLogic= new moneda_logic();
		$pagination= new Pagination();
		$this->monedasFK=array();

		$monedaLogic->setConnexion($connexion);
		$monedaLogic->getmonedaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionmoneda!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=moneda_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalmoneda=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalmoneda=Funciones::GetFinalQueryAppend($finalQueryGlobalmoneda, '');
				$finalQueryGlobalmoneda.=moneda_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalmoneda.$strRecargarFkQuery;		

				$monedaLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosmonedasFK($monedaLogic->getmonedas());

		} else {
			$this->setVisibleBusquedasParamoneda(true);


			if($cotizacion_session->bigidmonedaActual!=null && $cotizacion_session->bigidmonedaActual > 0) {
				$monedaLogic->getEntity($cotizacion_session->bigidmonedaActual);//WithConnection

				$this->monedasFK[$monedaLogic->getmoneda()->getId()]=cotizacion_util::getmonedaDescripcion($monedaLogic->getmoneda());
				$this->idmonedaDefaultFK=$monedaLogic->getmoneda()->getId();
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

		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));

		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionestado!=true) {
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


			if($cotizacion_session->bigidestadoActual!=null && $cotizacion_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($cotizacion_session->bigidestadoActual);//WithConnection

				$this->estadosFK[$estadoLogic->getestado()->getId()]=cotizacion_util::getestadoDescripcion($estadoLogic->getestado());
				$this->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=cotizacion_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombossucursalsFK($sucursals){

		foreach ($sucursals as $sucursalLocal ) {
			if($this->idsucursalDefaultFK==0) {
				$this->idsucursalDefaultFK=$sucursalLocal->getId();
			}

			$this->sucursalsFK[$sucursalLocal->getId()]=cotizacion_util::getsucursalDescripcion($sucursalLocal);
		}
	}

	public function prepararCombosejerciciosFK($ejercicios){

		foreach ($ejercicios as $ejercicioLocal ) {
			if($this->idejercicioDefaultFK==0) {
				$this->idejercicioDefaultFK=$ejercicioLocal->getId();
			}

			$this->ejerciciosFK[$ejercicioLocal->getId()]=cotizacion_util::getejercicioDescripcion($ejercicioLocal);
		}
	}

	public function prepararCombosperiodosFK($periodos){

		foreach ($periodos as $periodoLocal ) {
			if($this->idperiodoDefaultFK==0) {
				$this->idperiodoDefaultFK=$periodoLocal->getId();
			}

			$this->periodosFK[$periodoLocal->getId()]=cotizacion_util::getperiodoDescripcion($periodoLocal);
		}
	}

	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=cotizacion_util::getusuarioDescripcion($usuarioLocal);
		}
	}

	public function prepararCombosproveedorsFK($proveedors){

		foreach ($proveedors as $proveedorLocal ) {
			if($this->idproveedorDefaultFK==0) {
				$this->idproveedorDefaultFK=$proveedorLocal->getId();
			}

			$this->proveedorsFK[$proveedorLocal->getId()]=cotizacion_util::getproveedorDescripcion($proveedorLocal);
		}
	}

	public function prepararCombosvendedorsFK($vendedors){

		foreach ($vendedors as $vendedorLocal ) {
			if($this->idvendedorDefaultFK==0) {
				$this->idvendedorDefaultFK=$vendedorLocal->getId();
			}

			$this->vendedorsFK[$vendedorLocal->getId()]=cotizacion_util::getvendedorDescripcion($vendedorLocal);
		}
	}

	public function prepararCombostermino_pago_proveedorsFK($termino_pago_proveedors){

		foreach ($termino_pago_proveedors as $termino_pago_proveedorLocal ) {
			if($this->idtermino_pago_proveedorDefaultFK==0) {
				$this->idtermino_pago_proveedorDefaultFK=$termino_pago_proveedorLocal->getId();
			}

			$this->termino_pago_proveedorsFK[$termino_pago_proveedorLocal->getId()]=cotizacion_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLocal);
		}
	}

	public function prepararCombosmonedasFK($monedas){

		foreach ($monedas as $monedaLocal ) {
			if($this->idmonedaDefaultFK==0) {
				$this->idmonedaDefaultFK=$monedaLocal->getId();
			}

			$this->monedasFK[$monedaLocal->getId()]=cotizacion_util::getmonedaDescripcion($monedaLocal);
		}
	}

	public function prepararCombosestadosFK($estados){

		foreach ($estados as $estadoLocal ) {
			if($this->idestadoDefaultFK==0) {
				$this->idestadoDefaultFK=$estadoLocal->getId();
			}

			$this->estadosFK[$estadoLocal->getId()]=cotizacion_util::getestadoDescripcion($estadoLocal);
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

			$strDescripcionempresa=cotizacion_util::getempresaDescripcion($empresaLogic->getempresa());

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

			$strDescripcionsucursal=cotizacion_util::getsucursalDescripcion($sucursalLogic->getsucursal());

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

			$strDescripcionejercicio=cotizacion_util::getejercicioDescripcion($ejercicioLogic->getejercicio());

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

			$strDescripcionperiodo=cotizacion_util::getperiodoDescripcion($periodoLogic->getperiodo());

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

			$strDescripcionusuario=cotizacion_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
	}

	public function cargarDescripcionproveedorFK($idproveedor,$connexion=null){
		$proveedorLogic= new proveedor_logic();
		$proveedorLogic->setConnexion($connexion);
		$proveedorLogic->getproveedorDataAccess()->isForFKData=true;
		$strDescripcionproveedor='';

		if($idproveedor!=null && $idproveedor!='' && $idproveedor!='null') {
			if($connexion!=null) {
				$proveedorLogic->getEntity($idproveedor);//WithConnection
			} else {
				$proveedorLogic->getEntityWithConnection($idproveedor);//
			}

			$strDescripcionproveedor=cotizacion_util::getproveedorDescripcion($proveedorLogic->getproveedor());

		} else {
			$strDescripcionproveedor='null';
		}

		return $strDescripcionproveedor;
	}

	public function cargarDescripcionvendedorFK($idvendedor,$connexion=null){
		$vendedorLogic= new vendedor_logic();
		$vendedorLogic->setConnexion($connexion);
		$vendedorLogic->getvendedorDataAccess()->isForFKData=true;
		$strDescripcionvendedor='';

		if($idvendedor!=null && $idvendedor!='' && $idvendedor!='null') {
			if($connexion!=null) {
				$vendedorLogic->getEntity($idvendedor);//WithConnection
			} else {
				$vendedorLogic->getEntityWithConnection($idvendedor);//
			}

			$strDescripcionvendedor=cotizacion_util::getvendedorDescripcion($vendedorLogic->getvendedor());

		} else {
			$strDescripcionvendedor='null';
		}

		return $strDescripcionvendedor;
	}

	public function cargarDescripciontermino_pago_proveedorFK($idtermino_pago_proveedor,$connexion=null){
		$termino_pago_proveedorLogic= new termino_pago_proveedor_logic();
		$termino_pago_proveedorLogic->setConnexion($connexion);
		$termino_pago_proveedorLogic->gettermino_pago_proveedorDataAccess()->isForFKData=true;
		$strDescripciontermino_pago_proveedor='';

		if($idtermino_pago_proveedor!=null && $idtermino_pago_proveedor!='' && $idtermino_pago_proveedor!='null') {
			if($connexion!=null) {
				$termino_pago_proveedorLogic->getEntity($idtermino_pago_proveedor);//WithConnection
			} else {
				$termino_pago_proveedorLogic->getEntityWithConnection($idtermino_pago_proveedor);//
			}

			$strDescripciontermino_pago_proveedor=cotizacion_util::gettermino_pago_proveedorDescripcion($termino_pago_proveedorLogic->gettermino_pago_proveedor());

		} else {
			$strDescripciontermino_pago_proveedor='null';
		}

		return $strDescripciontermino_pago_proveedor;
	}

	public function cargarDescripcionmonedaFK($idmoneda,$connexion=null){
		$monedaLogic= new moneda_logic();
		$monedaLogic->setConnexion($connexion);
		$monedaLogic->getmonedaDataAccess()->isForFKData=true;
		$strDescripcionmoneda='';

		if($idmoneda!=null && $idmoneda!='' && $idmoneda!='null') {
			if($connexion!=null) {
				$monedaLogic->getEntity($idmoneda);//WithConnection
			} else {
				$monedaLogic->getEntityWithConnection($idmoneda);//
			}

			$strDescripcionmoneda=cotizacion_util::getmonedaDescripcion($monedaLogic->getmoneda());

		} else {
			$strDescripcionmoneda='null';
		}

		return $strDescripcionmoneda;
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

			$strDescripcionestado=cotizacion_util::getestadoDescripcion($estadoLogic->getestado());

		} else {
			$strDescripcionestado='null';
		}

		return $strDescripcionestado;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(cotizacion $cotizacionClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$cotizacionClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
				$cotizacionClase->setid_sucursal($this->parametroGeneralUsuarioActual->getid_sucursal());
				$cotizacionClase->setid_ejercicio($this->parametroGeneralUsuarioActual->getid_ejercicio());
				$cotizacionClase->setid_periodo($this->parametroGeneralUsuarioActual->getid_periodo());
				$cotizacionClase->setid_usuario($this->usuarioActual->getId());
			
			
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionempresa;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idsucursal=$strParaVisiblesucursal;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionsucursal;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleejercicio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionejercicio;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idperiodo=$strParaVisibleperiodo;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionperiodo;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idusuario=$strParaVisibleusuario;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionusuario;
	}

	public function setVisibleBusquedasParaproveedor($isParaproveedor){
		$strParaVisibleproveedor='display:table-row';
		$strParaVisibleNegacionproveedor='display:none';

		if($isParaproveedor) {
			$strParaVisibleproveedor='display:table-row';
			$strParaVisibleNegacionproveedor='display:none';
		} else {
			$strParaVisibleproveedor='display:none';
			$strParaVisibleNegacionproveedor='display:table-row';
		}


		$strParaVisibleNegacionproveedor=trim($strParaVisibleNegacionproveedor);

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idproveedor=$strParaVisibleproveedor;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionproveedor;
	}

	public function setVisibleBusquedasParavendedor($isParavendedor){
		$strParaVisiblevendedor='display:table-row';
		$strParaVisibleNegacionvendedor='display:none';

		if($isParavendedor) {
			$strParaVisiblevendedor='display:table-row';
			$strParaVisibleNegacionvendedor='display:none';
		} else {
			$strParaVisiblevendedor='display:none';
			$strParaVisibleNegacionvendedor='display:table-row';
		}


		$strParaVisibleNegacionvendedor=trim($strParaVisibleNegacionvendedor);

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionvendedor;
		$this->strVisibleFK_Idvendedor=$strParaVisiblevendedor;
	}

	public function setVisibleBusquedasParatermino_pago_proveedor($isParatermino_pago_proveedor){
		$strParaVisibletermino_pago_proveedor='display:table-row';
		$strParaVisibleNegaciontermino_pago_proveedor='display:none';

		if($isParatermino_pago_proveedor) {
			$strParaVisibletermino_pago_proveedor='display:table-row';
			$strParaVisibleNegaciontermino_pago_proveedor='display:none';
		} else {
			$strParaVisibletermino_pago_proveedor='display:none';
			$strParaVisibleNegaciontermino_pago_proveedor='display:table-row';
		}


		$strParaVisibleNegaciontermino_pago_proveedor=trim($strParaVisibleNegaciontermino_pago_proveedor);

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idestado=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibletermino_pago_proveedor;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegaciontermino_pago_proveedor;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegaciontermino_pago_proveedor;
	}

	public function setVisibleBusquedasParamoneda($isParamoneda){
		$strParaVisiblemoneda='display:table-row';
		$strParaVisibleNegacionmoneda='display:none';

		if($isParamoneda) {
			$strParaVisiblemoneda='display:table-row';
			$strParaVisibleNegacionmoneda='display:none';
		} else {
			$strParaVisiblemoneda='display:none';
			$strParaVisibleNegacionmoneda='display:table-row';
		}


		$strParaVisibleNegacionmoneda=trim($strParaVisibleNegacionmoneda);

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idmoneda=$strParaVisiblemoneda;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionmoneda;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionmoneda;
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

		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idestado=$strParaVisibleestado;
		$this->strVisibleFK_Idmoneda=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idtermino_pago_proveedor=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idvendedor=$strParaVisibleNegacionestado;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idcotizacionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcotizacionActual=$idcotizacionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcotizacion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParasucursal() {//$idcotizacionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcotizacionActual=$idcotizacionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sucursal_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sucursal_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sucursal_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcotizacion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaejercicio() {//$idcotizacionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcotizacionActual=$idcotizacionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ejercicio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ejercicio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ejercicio_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcotizacion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaperiodo() {//$idcotizacionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcotizacionActual=$idcotizacionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.periodo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',periodo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(periodo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcotizacion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParausuario() {//$idcotizacionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcotizacionActual=$idcotizacionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcotizacion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaproveedor() {//$idcotizacionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcotizacionActual=$idcotizacionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.proveedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_proveedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_proveedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcotizacion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParavendedor() {//$idcotizacionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcotizacionActual=$idcotizacionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.vendedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_vendedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',vendedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_vendedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(vendedor_util::$STR_CLASS_NAME,'facturacion','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcotizacion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatermino_pago_proveedor() {//$idcotizacionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcotizacionActual=$idcotizacionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.termino_pago_proveedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_termino_pago_proveedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',termino_pago_proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_termino_pago_proveedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(termino_pago_proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcotizacion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParamoneda() {//$idcotizacionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcotizacionActual=$idcotizacionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.moneda_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_moneda(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',moneda_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_moneda(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(moneda_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcotizacion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaestado() {//$idcotizacionActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idcotizacionActual=$idcotizacionActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.estado_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',estado_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.cotizacionJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(estado_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarcotizacion,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParacotizacion_detalles(int $idcotizacionActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idcotizacionActual=$idcotizacionActual;

		$bitPaginaPopupcotizacion_detalle=false;

		try {

			$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));

			if($cotizacion_session==null) {
				$cotizacion_session=new cotizacion_session();
			}

			$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));

			if($cotizacion_detalle_session==null) {
				$cotizacion_detalle_session=new cotizacion_detalle_session();
			}

			$cotizacion_detalle_session->strUltimaBusqueda='FK_Idcotizacion';
			$cotizacion_detalle_session->strPathNavegacionActual=$cotizacion_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.cotizacion_detalle_util::$STR_CLASS_WEB_TITULO;
			$cotizacion_detalle_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupcotizacion_detalle=$cotizacion_detalle_session->bitPaginaPopup;
			$cotizacion_detalle_session->setPaginaPopupVariables(true);
			$bitPaginaPopupcotizacion_detalle=$cotizacion_detalle_session->bitPaginaPopup;
			$cotizacion_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
			$cotizacion_detalle_session->strNombrePaginaNavegacionHaciaFKDesde=cotizacion_util::$STR_NOMBRE_OPCION;
			$cotizacion_detalle_session->bitBusquedaDesdeFKSesioncotizacion=true;
			$cotizacion_detalle_session->bigidcotizacionActual=$this->idcotizacionActual;

			$cotizacion_session->bitBusquedaDesdeFKSesionFK=true;
			$cotizacion_session->bigIdActualFK=$this->idcotizacionActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"cotizacion_detalle"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=cotizacion_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"cotizacion_detalle"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(cotizacion_util::$STR_SESSION_NAME,serialize($cotizacion_session));
			$this->Session->write(cotizacion_detalle_util::$STR_SESSION_NAME,serialize($cotizacion_detalle_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupcotizacion_detalle!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cotizacion_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cotizacion_detalle_util::$STR_CLASS_NAME,'inventario','','POPUP',$this->strTipoPaginaAuxiliarcotizacion,$this->strTipoUsuarioAuxiliarcotizacion,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cotizacion_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cotizacion_detalle_util::$STR_CLASS_NAME,'inventario','','NO-POPUP',$this->strTipoPaginaAuxiliarcotizacion,$this->strTipoUsuarioAuxiliarcotizacion,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(cotizacion_util::$STR_SESSION_NAME,cotizacion_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$cotizacion_session=$this->Session->read(cotizacion_util::$STR_SESSION_NAME);
				
		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();		
			//$this->Session->write('cotizacion_session',$cotizacion_session);							
		}
		*/
		
		$cotizacion_session=new cotizacion_session();
    	$cotizacion_session->strPathNavegacionActual=cotizacion_util::$STR_CLASS_WEB_TITULO;
    	$cotizacion_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(cotizacion_util::$STR_SESSION_NAME,serialize($cotizacion_session));		
	}	
	
	public function getSetBusquedasSesionConfig(cotizacion_session $cotizacion_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($cotizacion_session->bitBusquedaDesdeFKSesionFK!=null && $cotizacion_session->bitBusquedaDesdeFKSesionFK==true) {
			if($cotizacion_session->bigIdActualFK!=null && $cotizacion_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$cotizacion_session->bigIdActualFKParaPosibleAtras=$cotizacion_session->bigIdActualFK;*/
			}
				
			$cotizacion_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$cotizacion_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(cotizacion_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($cotizacion_session->bitBusquedaDesdeFKSesionempresa!=null && $cotizacion_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($cotizacion_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(cotizacion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cotizacion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cotizacion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cotizacion_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($cotizacion_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cotizacion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cotizacion_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cotizacion_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;

				if($cotizacion_session->intNumeroPaginacion==cotizacion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_session->intNumeroPaginacion;
				}
			}
			else if($cotizacion_session->bitBusquedaDesdeFKSesionsucursal!=null && $cotizacion_session->bitBusquedaDesdeFKSesionsucursal==true)
			{
				if($cotizacion_session->bigidsucursalActual!=0) {
					$this->strAccionBusqueda='FK_Idsucursal';

					$existe_history=HistoryWeb::ExisteElemento(cotizacion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cotizacion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cotizacion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cotizacion_session->bigidsucursalActualDescripcion);
						$historyWeb->setIdActual($cotizacion_session->bigidsucursalActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cotizacion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cotizacion_session->bigidsucursalActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cotizacion_session->bitBusquedaDesdeFKSesionsucursal=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;

				if($cotizacion_session->intNumeroPaginacion==cotizacion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_session->intNumeroPaginacion;
				}
			}
			else if($cotizacion_session->bitBusquedaDesdeFKSesionejercicio!=null && $cotizacion_session->bitBusquedaDesdeFKSesionejercicio==true)
			{
				if($cotizacion_session->bigidejercicioActual!=0) {
					$this->strAccionBusqueda='FK_Idejercicio';

					$existe_history=HistoryWeb::ExisteElemento(cotizacion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cotizacion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cotizacion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cotizacion_session->bigidejercicioActualDescripcion);
						$historyWeb->setIdActual($cotizacion_session->bigidejercicioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cotizacion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cotizacion_session->bigidejercicioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cotizacion_session->bitBusquedaDesdeFKSesionejercicio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;

				if($cotizacion_session->intNumeroPaginacion==cotizacion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_session->intNumeroPaginacion;
				}
			}
			else if($cotizacion_session->bitBusquedaDesdeFKSesionperiodo!=null && $cotizacion_session->bitBusquedaDesdeFKSesionperiodo==true)
			{
				if($cotizacion_session->bigidperiodoActual!=0) {
					$this->strAccionBusqueda='FK_Idperiodo';

					$existe_history=HistoryWeb::ExisteElemento(cotizacion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cotizacion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cotizacion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cotizacion_session->bigidperiodoActualDescripcion);
						$historyWeb->setIdActual($cotizacion_session->bigidperiodoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cotizacion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cotizacion_session->bigidperiodoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cotizacion_session->bitBusquedaDesdeFKSesionperiodo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;

				if($cotizacion_session->intNumeroPaginacion==cotizacion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_session->intNumeroPaginacion;
				}
			}
			else if($cotizacion_session->bitBusquedaDesdeFKSesionusuario!=null && $cotizacion_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($cotizacion_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(cotizacion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cotizacion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cotizacion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cotizacion_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($cotizacion_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cotizacion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cotizacion_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cotizacion_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;

				if($cotizacion_session->intNumeroPaginacion==cotizacion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_session->intNumeroPaginacion;
				}
			}
			else if($cotizacion_session->bitBusquedaDesdeFKSesionproveedor!=null && $cotizacion_session->bitBusquedaDesdeFKSesionproveedor==true)
			{
				if($cotizacion_session->bigidproveedorActual!=0) {
					$this->strAccionBusqueda='FK_Idproveedor';

					$existe_history=HistoryWeb::ExisteElemento(cotizacion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cotizacion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cotizacion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cotizacion_session->bigidproveedorActualDescripcion);
						$historyWeb->setIdActual($cotizacion_session->bigidproveedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cotizacion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cotizacion_session->bigidproveedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cotizacion_session->bitBusquedaDesdeFKSesionproveedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;

				if($cotizacion_session->intNumeroPaginacion==cotizacion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_session->intNumeroPaginacion;
				}
			}
			else if($cotizacion_session->bitBusquedaDesdeFKSesionvendedor!=null && $cotizacion_session->bitBusquedaDesdeFKSesionvendedor==true)
			{
				if($cotizacion_session->bigidvendedorActual!=0) {
					$this->strAccionBusqueda='FK_Idvendedor';

					$existe_history=HistoryWeb::ExisteElemento(cotizacion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cotizacion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cotizacion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cotizacion_session->bigidvendedorActualDescripcion);
						$historyWeb->setIdActual($cotizacion_session->bigidvendedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cotizacion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cotizacion_session->bigidvendedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cotizacion_session->bitBusquedaDesdeFKSesionvendedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;

				if($cotizacion_session->intNumeroPaginacion==cotizacion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_session->intNumeroPaginacion;
				}
			}
			else if($cotizacion_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor!=null && $cotizacion_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor==true)
			{
				if($cotizacion_session->bigidtermino_pago_proveedorActual!=0) {
					$this->strAccionBusqueda='FK_Idtermino_pago_proveedor';

					$existe_history=HistoryWeb::ExisteElemento(cotizacion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cotizacion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cotizacion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cotizacion_session->bigidtermino_pago_proveedorActualDescripcion);
						$historyWeb->setIdActual($cotizacion_session->bigidtermino_pago_proveedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cotizacion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cotizacion_session->bigidtermino_pago_proveedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cotizacion_session->bitBusquedaDesdeFKSesiontermino_pago_proveedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;

				if($cotizacion_session->intNumeroPaginacion==cotizacion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_session->intNumeroPaginacion;
				}
			}
			else if($cotizacion_session->bitBusquedaDesdeFKSesionmoneda!=null && $cotizacion_session->bitBusquedaDesdeFKSesionmoneda==true)
			{
				if($cotizacion_session->bigidmonedaActual!=0) {
					$this->strAccionBusqueda='FK_Idmoneda';

					$existe_history=HistoryWeb::ExisteElemento(cotizacion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cotizacion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cotizacion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cotizacion_session->bigidmonedaActualDescripcion);
						$historyWeb->setIdActual($cotizacion_session->bigidmonedaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cotizacion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cotizacion_session->bigidmonedaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cotizacion_session->bitBusquedaDesdeFKSesionmoneda=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;

				if($cotizacion_session->intNumeroPaginacion==cotizacion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_session->intNumeroPaginacion;
				}
			}
			else if($cotizacion_session->bitBusquedaDesdeFKSesionestado!=null && $cotizacion_session->bitBusquedaDesdeFKSesionestado==true)
			{
				if($cotizacion_session->bigidestadoActual!=0) {
					$this->strAccionBusqueda='FK_Idestado';

					$existe_history=HistoryWeb::ExisteElemento(cotizacion_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(cotizacion_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(cotizacion_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($cotizacion_session->bigidestadoActualDescripcion);
						$historyWeb->setIdActual($cotizacion_session->bigidestadoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=cotizacion_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$cotizacion_session->bigidestadoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$cotizacion_session->bitBusquedaDesdeFKSesionestado=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;

				if($cotizacion_session->intNumeroPaginacion==cotizacion_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=cotizacion_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$cotizacion_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$cotizacion_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));
		
		if($cotizacion_session==null) {
			$cotizacion_session=new cotizacion_session();
		}
		
		$cotizacion_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$cotizacion_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$cotizacion_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idejercicio') {
			$cotizacion_session->id_ejercicio=$this->id_ejercicioFK_Idejercicio;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$cotizacion_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idestado') {
			$cotizacion_session->id_estado=$this->id_estadoFK_Idestado;	

		}
		else if($this->strAccionBusqueda=='FK_Idmoneda') {
			$cotizacion_session->id_moneda=$this->id_monedaFK_Idmoneda;	

		}
		else if($this->strAccionBusqueda=='FK_Idperiodo') {
			$cotizacion_session->id_periodo=$this->id_periodoFK_Idperiodo;	

		}
		else if($this->strAccionBusqueda=='FK_Idproveedor') {
			$cotizacion_session->id_proveedor=$this->id_proveedorFK_Idproveedor;	

		}
		else if($this->strAccionBusqueda=='FK_Idsucursal') {
			$cotizacion_session->id_sucursal=$this->id_sucursalFK_Idsucursal;	

		}
		else if($this->strAccionBusqueda=='FK_Idtermino_pago_proveedor') {
			$cotizacion_session->id_termino_pago_proveedor=$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$cotizacion_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		else if($this->strAccionBusqueda=='FK_Idvendedor') {
			$cotizacion_session->id_vendedor=$this->id_vendedorFK_Idvendedor;	

		}
		
		$this->Session->write(cotizacion_util::$STR_SESSION_NAME,serialize($cotizacion_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(cotizacion_session $cotizacion_session) {
		
		if($cotizacion_session==null) {
			$cotizacion_session=unserialize($this->Session->read(cotizacion_util::$STR_SESSION_NAME));
		}
		
		if($cotizacion_session==null) {
		   $cotizacion_session=new cotizacion_session();
		}
		
		if($cotizacion_session->strUltimaBusqueda!=null && $cotizacion_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$cotizacion_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$cotizacion_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$cotizacion_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idejercicio') {
				$this->id_ejercicioFK_Idejercicio=$cotizacion_session->id_ejercicio;
				$cotizacion_session->id_ejercicio=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$cotizacion_session->id_empresa;
				$cotizacion_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idestado') {
				$this->id_estadoFK_Idestado=$cotizacion_session->id_estado;
				$cotizacion_session->id_estado=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idmoneda') {
				$this->id_monedaFK_Idmoneda=$cotizacion_session->id_moneda;
				$cotizacion_session->id_moneda=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idperiodo') {
				$this->id_periodoFK_Idperiodo=$cotizacion_session->id_periodo;
				$cotizacion_session->id_periodo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idproveedor') {
				$this->id_proveedorFK_Idproveedor=$cotizacion_session->id_proveedor;
				$cotizacion_session->id_proveedor=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idsucursal') {
				$this->id_sucursalFK_Idsucursal=$cotizacion_session->id_sucursal;
				$cotizacion_session->id_sucursal=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtermino_pago_proveedor') {
				$this->id_termino_pago_proveedorFK_Idtermino_pago_proveedor=$cotizacion_session->id_termino_pago_proveedor;
				$cotizacion_session->id_termino_pago_proveedor=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$cotizacion_session->id_usuario;
				$cotizacion_session->id_usuario=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idvendedor') {
				$this->id_vendedorFK_Idvendedor=$cotizacion_session->id_vendedor;
				$cotizacion_session->id_vendedor=-1;

			}
		}
		
		$cotizacion_session->strUltimaBusqueda='';
		//$cotizacion_session->intNumeroPaginacion=10;
		$cotizacion_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(cotizacion_util::$STR_SESSION_NAME,serialize($cotizacion_session));		
	}
	
	public function cotizacionsControllerAux($conexion_control) 	 {
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
		$this->idproveedorDefaultFK = 0;
		$this->idvendedorDefaultFK = 0;
		$this->idtermino_pago_proveedorDefaultFK = 0;
		$this->idmonedaDefaultFK = 0;
		$this->idestadoDefaultFK = 0;
	}
	
	public function setcotizacionFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_sucursal',$this->idsucursalDefaultFK);
		$this->setExistDataCampoForm('form','id_ejercicio',$this->idejercicioDefaultFK);
		$this->setExistDataCampoForm('form','id_periodo',$this->idperiodoDefaultFK);
		$this->setExistDataCampoForm('form','id_usuario',$this->idusuarioDefaultFK);
		$this->setExistDataCampoForm('form','id_proveedor',$this->idproveedorDefaultFK);
		$this->setExistDataCampoForm('form','id_vendedor',$this->idvendedorDefaultFK);
		$this->setExistDataCampoForm('form','id_termino_pago_proveedor',$this->idtermino_pago_proveedorDefaultFK);
		$this->setExistDataCampoForm('form','id_moneda',$this->idmonedaDefaultFK);
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

		proveedor::$class;
		proveedor_carga::$CONTROLLER;

		vendedor::$class;
		vendedor_carga::$CONTROLLER;

		termino_pago_proveedor::$class;
		termino_pago_proveedor_carga::$CONTROLLER;

		moneda::$class;
		moneda_carga::$CONTROLLER;

		estado::$class;
		estado_carga::$CONTROLLER;
		
		//REL
		

		cotizacion_detalle_carga::$CONTROLLER;
		cotizacion_detalle_util::$STR_SCHEMA;
		cotizacion_detalle_session::class;
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
		interface cotizacion_controlI {	
		
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
		
		public function onLoad(cotizacion_session $cotizacion_session=null);	
		function index(?string $strTypeOnLoadcotizacion='',?string $strTipoPaginaAuxiliarcotizacion='',?string $strTipoUsuarioAuxiliarcotizacion='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadcotizacion='',string $strTipoPaginaAuxiliarcotizacion='',string $strTipoUsuarioAuxiliarcotizacion='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($cotizacionReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(cotizacion $cotizacionClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(cotizacion_session $cotizacion_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(cotizacion_session $cotizacion_session);	
		public function cotizacionsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setcotizacionFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
