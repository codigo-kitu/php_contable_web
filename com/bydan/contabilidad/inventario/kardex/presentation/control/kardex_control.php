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

namespace com\bydan\contabilidad\inventario\kardex\presentation\control;

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

use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/kardex/util/kardex_carga.php');
use com\bydan\contabilidad\inventario\kardex\util\kardex_carga;

use com\bydan\contabilidad\inventario\kardex\util\kardex_util;
use com\bydan\contabilidad\inventario\kardex\util\kardex_param_return;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic_add;
use com\bydan\contabilidad\inventario\kardex\presentation\session\kardex_session;


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

use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

use com\bydan\contabilidad\inventario\tipo_kardex\business\entity\tipo_kardex;
use com\bydan\contabilidad\inventario\tipo_kardex\business\logic\tipo_kardex_logic;
use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_carga;
use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

use com\bydan\contabilidad\cuentascobrar\cliente\business\entity\cliente;
use com\bydan\contabilidad\cuentascobrar\cliente\business\logic\cliente_logic;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;

use com\bydan\contabilidad\general\estado\business\entity\estado;
use com\bydan\contabilidad\general\estado\business\logic\estado_logic;
use com\bydan\contabilidad\general\estado\util\estado_carga;
use com\bydan\contabilidad\general\estado\util\estado_util;

//REL


use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_carga;
use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_util;
use com\bydan\contabilidad\inventario\kardex_detalle\presentation\session\kardex_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
kardex_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
kardex_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
kardex_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
kardex_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*kardex_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/inventario/kardex/presentation/control/kardex_init_control.php');
use com\bydan\contabilidad\inventario\kardex\presentation\control\kardex_init_control;

include_once('com/bydan/contabilidad/inventario/kardex/presentation/control/kardex_base_control.php');
use com\bydan\contabilidad\inventario\kardex\presentation\control\kardex_base_control;

class kardex_control extends kardex_base_control {	
	
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
			else if($action=='registrarSesionParakardex_detalles' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idkardexActual=$this->getDataId();
				$this->registrarSesionParakardex_detalles($idkardexActual);
			} 
			
			
			else if($action=="FK_Idcliente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdclienteParaProcesar();
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
			else if($action=="FK_Idmodulo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdmoduloParaProcesar();
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
			else if($action=="FK_Idtipo_kardex"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idtipo_kardexParaProcesar();
			}
			else if($action=="FK_Idusuario"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdusuarioParaProcesar();
			}
			
			
			else if($action=='abrirBusquedaParaempresa') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idkardexActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idkardexActual
			}
			else if($action=='abrirBusquedaParasucursal') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idkardexActual=$this->getDataId();
				$this->abrirBusquedaParasucursal();//$idkardexActual
			}
			else if($action=='abrirBusquedaParaejercicio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idkardexActual=$this->getDataId();
				$this->abrirBusquedaParaejercicio();//$idkardexActual
			}
			else if($action=='abrirBusquedaParaperiodo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idkardexActual=$this->getDataId();
				$this->abrirBusquedaParaperiodo();//$idkardexActual
			}
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idkardexActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$idkardexActual
			}
			else if($action=='abrirBusquedaParamodulo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idkardexActual=$this->getDataId();
				$this->abrirBusquedaParamodulo();//$idkardexActual
			}
			else if($action=='abrirBusquedaParatipo_kardex') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idkardexActual=$this->getDataId();
				$this->abrirBusquedaParatipo_kardex();//$idkardexActual
			}
			else if($action=='abrirBusquedaParaproveedor') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idkardexActual=$this->getDataId();
				$this->abrirBusquedaParaproveedor();//$idkardexActual
			}
			else if($action=='abrirBusquedaParacliente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idkardexActual=$this->getDataId();
				$this->abrirBusquedaParacliente();//$idkardexActual
			}
			else if($action=='abrirBusquedaParaestado') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idkardexActual=$this->getDataId();
				$this->abrirBusquedaParaestado();//$idkardexActual
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
					
					$kardexController = new kardex_control();
					
					$kardexController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($kardexController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$kardexController = new kardex_control();
						$kardexController = $this;
						
						$jsonResponse = json_encode($kardexController->kardexs);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->kardexReturnGeneral==null) {
					$this->kardexReturnGeneral=new kardex_param_return();
				}
				
				echo($this->kardexReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$kardexController=new kardex_control();
		
		$kardexController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$kardexController->usuarioActual=new usuario();
		
		$kardexController->usuarioActual->setId($this->usuarioActual->getId());
		$kardexController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$kardexController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$kardexController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$kardexController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$kardexController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$kardexController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$kardexController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $kardexController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadkardex= $this->getDataGeneralString('strTypeOnLoadkardex');
		$strTipoPaginaAuxiliarkardex= $this->getDataGeneralString('strTipoPaginaAuxiliarkardex');
		$strTipoUsuarioAuxiliarkardex= $this->getDataGeneralString('strTipoUsuarioAuxiliarkardex');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadkardex,$strTipoPaginaAuxiliarkardex,$strTipoUsuarioAuxiliarkardex,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadkardex!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('kardex','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(kardex_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarkardex,$this->strTipoUsuarioAuxiliarkardex,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(kardex_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'inventario','','POPUP',$this->strTipoPaginaAuxiliarkardex,$this->strTipoUsuarioAuxiliarkardex,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->kardexReturnGeneral=new kardex_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->kardexReturnGeneral->conGuardarReturnSessionJs=true;
		$this->kardexReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->kardexReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->kardexReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->kardexReturnGeneral);
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
		$this->kardexReturnGeneral=new kardex_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->kardexReturnGeneral->conGuardarReturnSessionJs=true;
		$this->kardexReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->kardexReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->kardexReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->kardexReturnGeneral);
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
		$this->kardexReturnGeneral=new kardex_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->kardexReturnGeneral->conGuardarReturnSessionJs=true;
		$this->kardexReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->kardexReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->kardexReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->kardexReturnGeneral);
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
				$this->kardexLogic->getNewConnexionToDeep();
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
			
			
			$this->kardexReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->kardexReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->kardexReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->kardexReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->kardexReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->kardexReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->kardexReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->kardexReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->kardexReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->kardexReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->kardexReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->kardexReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->kardexReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->kardexReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->kardexReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->kardexReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->kardexReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->kardexReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
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
		
		$this->kardexLogic=new kardex_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->kardex=new kardex();
		
		$this->strTypeOnLoadkardex='onload';
		$this->strTipoPaginaAuxiliarkardex='none';
		$this->strTipoUsuarioAuxiliarkardex='none';	

		$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
		
		$this->kardexModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->kardexControllerAdditional=new kardex_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(kardex_session $kardex_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($kardex_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadkardex='',?string $strTipoPaginaAuxiliarkardex='',?string $strTipoUsuarioAuxiliarkardex='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadkardex=$strTypeOnLoadkardex;
			$this->strTipoPaginaAuxiliarkardex=$strTipoPaginaAuxiliarkardex;
			$this->strTipoUsuarioAuxiliarkardex=$strTipoUsuarioAuxiliarkardex;
	
			if($strTipoUsuarioAuxiliarkardex=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->kardex=new kardex();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Kardexes';
			
			
			$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));
							
			if($kardex_session==null) {
				$kardex_session=new kardex_session();
				
				/*$this->Session->write('kardex_session',$kardex_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($kardex_session->strFuncionJsPadre!=null && $kardex_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$kardex_session->strFuncionJsPadre;
				
				$kardex_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($kardex_session);
			
			if($strTypeOnLoadkardex!=null && $strTypeOnLoadkardex=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$kardex_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$kardex_session->setPaginaPopupVariables(true);
				}
				
				if($kardex_session->intNumeroPaginacion==kardex_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$kardex_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,kardex_util::$STR_SESSION_NAME,'inventario');																
			
			} else if($strTypeOnLoadkardex!=null && $strTypeOnLoadkardex=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$kardex_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;*/
				
				if($kardex_session->intNumeroPaginacion==kardex_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$kardex_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarkardex!=null && $strTipoPaginaAuxiliarkardex=='none') {
				/*$kardex_session->strStyleDivHeader='display:table-row';*/
				
				/*$kardex_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarkardex!=null && $strTipoPaginaAuxiliarkardex=='iframe') {
					/*
					$kardex_session->strStyleDivArbol='display:none';
					$kardex_session->strStyleDivHeader='display:none';
					$kardex_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$kardex_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->kardexClase=new kardex();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=kardex_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(kardex_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->kardexLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->kardexLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$ordencompraLogic=new orden_compra_logic();
			//$facturaLogic=new factura_logic();
			//$consignacionLogic=new consignacion_logic();
			//$facturaloteLogic=new factura_lote_logic();
			//$devolucionfacturaLogic=new devolucion_factura_logic();
			//$kardexdetalleLogic=new kardex_detalle_logic();
			//$devolucionLogic=new devolucion_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->kardexLogic=new kardex_logic();*/
			
			
			$this->kardexsModel=null;
			/*new ListDataModel();*/
			
			/*$this->kardexsModel.setWrappedData(kardexLogic->getkardexs());*/
						
			$this->kardexs= array();
			$this->kardexsEliminados=array();
			$this->kardexsSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= kardex_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= kardex_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->kardex= new kardex();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcliente='display:table-row';
			$this->strVisibleFK_Idejercicio='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idestado='display:table-row';
			$this->strVisibleFK_Idmodulo='display:table-row';
			$this->strVisibleFK_Idperiodo='display:table-row';
			$this->strVisibleFK_Idproveedor='display:table-row';
			$this->strVisibleFK_Idsucursal='display:table-row';
			$this->strVisibleFK_Idtipo_kardex='display:table-row';
			$this->strVisibleFK_Idusuario='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarkardex!=null && $strTipoUsuarioAuxiliarkardex!='none' && $strTipoUsuarioAuxiliarkardex!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarkardex);
																
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
				if($strTipoUsuarioAuxiliarkardex!=null && $strTipoUsuarioAuxiliarkardex!='none' && $strTipoUsuarioAuxiliarkardex!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarkardex);
																
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
				if($strTipoUsuarioAuxiliarkardex==null || $strTipoUsuarioAuxiliarkardex=='none' || $strTipoUsuarioAuxiliarkardex=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarkardex,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, kardex_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, kardex_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina kardex');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($kardex_session);
			
			$this->getSetBusquedasSesionConfig($kardex_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReportekardexs($this->strAccionBusqueda,$this->kardexLogic->getkardexs());*/
				} else if($this->strGenerarReporte=='Html')	{
					$kardex_session->strServletGenerarHtmlReporte='kardexServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(kardex_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(kardex_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($kardex_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarkardex!=null && $strTipoUsuarioAuxiliarkardex=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($kardex_session);
			}
								
			$this->set(kardex_util::$STR_SESSION_NAME, $kardex_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($kardex_session);
			
			/*
			$this->kardex->recursive = 0;
			
			$this->kardexs=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('kardexs', $this->kardexs);
			
			$this->set(kardex_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->kardexActual =$this->kardexClase;
			
			/*$this->kardexActual =$this->migrarModelkardex($this->kardexClase);*/
			
			$this->returnHtml(false);
			
			$this->set(kardex_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=kardex_util::$STR_NOMBRE_OPCION;
				
			if(kardex_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=kardex_util::$STR_MODULO_OPCION.kardex_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(kardex_util::$STR_SESSION_NAME,serialize($kardex_session));
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
			/*$kardexClase= (kardex) kardexsModel.getRowData();*/
			
			$this->kardexClase->setId($this->kardex->getId());	
			$this->kardexClase->setVersionRow($this->kardex->getVersionRow());	
			$this->kardexClase->setVersionRow($this->kardex->getVersionRow());	
			$this->kardexClase->setid_empresa($this->kardex->getid_empresa());	
			$this->kardexClase->setid_sucursal($this->kardex->getid_sucursal());	
			$this->kardexClase->setid_ejercicio($this->kardex->getid_ejercicio());	
			$this->kardexClase->setid_periodo($this->kardex->getid_periodo());	
			$this->kardexClase->setid_usuario($this->kardex->getid_usuario());	
			$this->kardexClase->setid_modulo($this->kardex->getid_modulo());	
			$this->kardexClase->setid_tipo_kardex($this->kardex->getid_tipo_kardex());	
			$this->kardexClase->setnumero($this->kardex->getnumero());	
			$this->kardexClase->setnumero_documento($this->kardex->getnumero_documento());	
			$this->kardexClase->setid_proveedor($this->kardex->getid_proveedor());	
			$this->kardexClase->setid_cliente($this->kardex->getid_cliente());	
			$this->kardexClase->settotal($this->kardex->gettotal());	
			$this->kardexClase->setdescripcion($this->kardex->getdescripcion());	
			$this->kardexClase->setid_estado($this->kardex->getid_estado());	
			$this->kardexClase->setcosto($this->kardex->getcosto());	
		
			/*$this->Session->write('kardexVersionRowActual', kardex.getVersionRow());*/
			
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
			
			$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));
						
			if($kardex_session==null) {
				$kardex_session=new kardex_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('kardex', $this->kardex->read(null, $id));
	
			
			$this->kardex->recursive = 0;
			
			$this->kardexs=$this->paginate();
			
			$this->set('kardexs', $this->kardexs);
	
			if (empty($this->data)) {
				$this->data = $this->kardex->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->kardexLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->kardexClase);
			
			$this->kardexActual=$this->kardexClase;
			
			/*$this->kardexActual =$this->migrarModelkardex($this->kardexClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->kardexLogic->getkardexs(),$this->kardexActual);
			
			$this->actualizarControllerConReturnGeneral($this->kardexReturnGeneral);
			
			//$this->kardexReturnGeneral=$this->kardexLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->kardexLogic->getkardexs(),$this->kardexActual,$this->kardexParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			


				//CLASE KARDEX_DETALLE
				$this->registrarSesionParakardex_detalles($this->idActual,true);

				$kardex_detalle_session=null;
				$kardex_detalle_session=unserialize($this->Session->read(kardex_detalle_util::$STR_SESSION_NAME));

				if($kardex_detalle_session==null) {
					$kardex_detalle_session=new kardex_detalle_session();
				}

				require_once('com/bydan/contabilidad/inventario/presentation/control/kardex_detalle_control.php');
				$kardex_detalleController=new kardex_detalle_control();

				$kardex_detalleController->saveGetSessionControllerAndPageAuxiliar(false);
				$kardex_detalleController->getkardex_detalleLogic()->setConnexion($this->getkardexLogic()->getConnexion());
				$kardex_detalleController->cargarCombosFK(false);
				$kardex_detalleController->getSetBusquedasSesionConfig($kardex_detalle_session);
				$kardex_detalleController->onLoad($kardex_detalle_session);
				$kardex_detalleController->saveGetSessionControllerAndPageAuxiliar(true);
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));
						
			if($kardex_session==null) {
				$kardex_session=new kardex_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevokardex', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->kardexClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->kardexClase);
			
			$this->kardexActual =$this->kardexClase;
			
			/*$this->kardexActual =$this->migrarModelkardex($this->kardexClase);*/
			
			$this->setkardexFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->kardexLogic->getkardexs(),$this->kardex);
			
			$this->actualizarControllerConReturnGeneral($this->kardexReturnGeneral);
			
			//this->kardexReturnGeneral=$this->kardexLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->kardexLogic->getkardexs(),$this->kardex,$this->kardexParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->kardexReturnGeneral->getkardex()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idsucursalDefaultFK!=null && $this->idsucursalDefaultFK > -1) {
				$this->kardexReturnGeneral->getkardex()->setid_sucursal($this->idsucursalDefaultFK);
			}

			if($this->idejercicioDefaultFK!=null && $this->idejercicioDefaultFK > -1) {
				$this->kardexReturnGeneral->getkardex()->setid_ejercicio($this->idejercicioDefaultFK);
			}

			if($this->idperiodoDefaultFK!=null && $this->idperiodoDefaultFK > -1) {
				$this->kardexReturnGeneral->getkardex()->setid_periodo($this->idperiodoDefaultFK);
			}

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->kardexReturnGeneral->getkardex()->setid_usuario($this->idusuarioDefaultFK);
			}

			if($this->idmoduloDefaultFK!=null && $this->idmoduloDefaultFK > -1) {
				$this->kardexReturnGeneral->getkardex()->setid_modulo($this->idmoduloDefaultFK);
			}

			if($this->idtipo_kardexDefaultFK!=null && $this->idtipo_kardexDefaultFK > -1) {
				$this->kardexReturnGeneral->getkardex()->setid_tipo_kardex($this->idtipo_kardexDefaultFK);
			}

			if($this->idproveedorDefaultFK!=null && $this->idproveedorDefaultFK > -1) {
				$this->kardexReturnGeneral->getkardex()->setid_proveedor($this->idproveedorDefaultFK);
			}

			if($this->idclienteDefaultFK!=null && $this->idclienteDefaultFK > -1) {
				$this->kardexReturnGeneral->getkardex()->setid_cliente($this->idclienteDefaultFK);
			}

			if($this->idestadoDefaultFK!=null && $this->idestadoDefaultFK > -1) {
				$this->kardexReturnGeneral->getkardex()->setid_estado($this->idestadoDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->kardexReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->kardexReturnGeneral->getkardex(),$this->kardexActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeykardex($this->kardexReturnGeneral->getkardex());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormulariokardex($this->kardexReturnGeneral->getkardex());*/
			}
			
			if($this->kardexReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->kardexReturnGeneral->getkardex(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualkardex($this->kardex,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			


				//CLASE KARDEX_DETALLE
				$this->registrarSesionParakardex_detalles($this->idActual,true);

				$kardex_detalle_session=null;
				$kardex_detalle_session=unserialize($this->Session->read(kardex_detalle_util::$STR_SESSION_NAME));

				if($kardex_detalle_session==null) {
					$kardex_detalle_session=new kardex_detalle_session();
				}

				require_once('com/bydan/contabilidad/inventario/presentation/control/kardex_detalle_control.php');
				$kardex_detalleController=new kardex_detalle_control();

				$kardex_detalleController->saveGetSessionControllerAndPageAuxiliar(false);
				$kardex_detalleController->getkardex_detalleLogic()->setConnexion($this->getkardexLogic()->getConnexion());
				$kardex_detalleController->cargarCombosFK(false);
				$kardex_detalleController->getSetBusquedasSesionConfig($kardex_detalle_session);
				$kardex_detalleController->onLoad($kardex_detalle_session);
				$kardex_detalleController->saveGetSessionControllerAndPageAuxiliar(true);
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->kardexsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->kardexsAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->kardexsAuxiliar=array();
			}
			
			if(count($this->kardexsAuxiliar)==2) {
				$kardexOrigen=$this->kardexsAuxiliar[0];
				$kardexDestino=$this->kardexsAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($kardexOrigen,$kardexDestino,true,false,false);
				
				$this->actualizarLista($kardexDestino,$this->kardexs);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->kardexsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->kardexsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->kardexsAuxiliar=array();
			}
			
			if(count($this->kardexsAuxiliar) > 0) {
				foreach ($this->kardexsAuxiliar as $kardexSeleccionado) {
					$this->kardex=new kardex();
					
					$this->setCopiarVariablesObjetos($kardexSeleccionado,$this->kardex,true,true,false);
						
					$this->kardexs[]=$this->kardex;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->kardexsEliminados as $kardexEliminado) {
				$this->kardexLogic->kardexs[]=$kardexEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->kardex=new kardex();
							
				$this->kardexs[]=$this->kardex;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
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
		
		$kardexActual=new kardex();
		
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
				
				$kardexActual=$this->kardexs[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $kardexActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $kardexActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $kardexActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $kardexActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $kardexActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $kardexActual->setid_modulo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $kardexActual->setid_tipo_kardex((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $kardexActual->setnumero($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $kardexActual->setnumero_documento($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $kardexActual->setid_proveedor((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $kardexActual->setid_cliente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $kardexActual->settotal((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $kardexActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $kardexActual->setid_estado((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $kardexActual->setcosto((float)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->kardexsAuxiliar=array();		 
		/*$this->kardexsEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->kardexsAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->kardexsAuxiliar=array();
		}
			
		if(count($this->kardexsAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->kardexsAuxiliar as $kardexAuxLocal) {				
				
				foreach($this->kardexs as $kardexLocal) {
					if($kardexLocal->getId()==$kardexAuxLocal->getId()) {
						$kardexLocal->setIsDeleted(true);
						
						/*$this->kardexsEliminados[]=$kardexLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->kardexLogic->setkardexs($this->kardexs);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
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
				$this->kardexLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadkardex='',string $strTipoPaginaAuxiliarkardex='',string $strTipoUsuarioAuxiliarkardex='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadkardex,$strTipoPaginaAuxiliarkardex,$strTipoUsuarioAuxiliarkardex,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->kardexs) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=kardex_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=kardex_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=kardex_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));
						
			if($kardex_session==null) {
				$kardex_session=new kardex_session();
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
					/*$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;*/
					
					if($kardex_session->intNumeroPaginacion==kardex_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$kardex_session->intNumeroPaginacion;
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
			
			$this->kardexsEliminados=array();
			
			/*$this->kardexLogic->setConnexion($connexion);*/
			
			$this->kardexLogic->setIsConDeep(true);
			
			$this->kardexLogic->getkardexDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('modulo');$classes[]=$class;
			$class=new Classe('tipo_kardex');$classes[]=$class;
			$class=new Classe('proveedor');$classes[]=$class;
			$class=new Classe('cliente');$classes[]=$class;
			$class=new Classe('estado');$classes[]=$class;
			
			$this->kardexLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->kardexLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->kardexLogic->getkardexs()==null|| count($this->kardexLogic->getkardexs())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->kardexs=$this->kardexLogic->getkardexs();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->kardexLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->kardexsReporte=$this->kardexLogic->getkardexs();
									
						/*$this->generarReportes('Todos',$this->kardexLogic->getkardexs());*/
					
						$this->kardexLogic->setkardexs($this->kardexs);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->kardexLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->kardexLogic->getkardexs()==null|| count($this->kardexLogic->getkardexs())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->kardexs=$this->kardexLogic->getkardexs();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->kardexLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->kardexsReporte=$this->kardexLogic->getkardexs();
									
						/*$this->generarReportes('Todos',$this->kardexLogic->getkardexs());*/
					
						$this->kardexLogic->setkardexs($this->kardexs);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idkardex=0;*/
				
				if($kardex_session->bitBusquedaDesdeFKSesionFK!=null && $kardex_session->bitBusquedaDesdeFKSesionFK==true) {
					if($kardex_session->bigIdActualFK!=null && $kardex_session->bigIdActualFK!=0)	{
						$this->idkardex=$kardex_session->bigIdActualFK;	
					}
					
					$kardex_session->bitBusquedaDesdeFKSesionFK=false;
					
					$kardex_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idkardex=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idkardex=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->kardexLogic->getEntity($this->idkardex);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*kardexLogicAdditional::getDetalleIndicePorId($idkardex);*/

				
				if($this->kardexLogic->getkardex()!=null) {
					$this->kardexLogic->setkardexs(array());
					$this->kardexLogic->kardexs[]=$this->kardexLogic->getkardex();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcliente')
			{

				if($kardex_session->bigidclienteActual!=null && $kardex_session->bigidclienteActual!=0)
				{
					$this->id_clienteFK_Idcliente=$kardex_session->bigidclienteActual;
					$kardex_session->bigidclienteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idcliente($finalQueryPaginacion,$this->pagination,$this->id_clienteFK_Idcliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//kardexLogicAdditional::getDetalleIndiceFK_Idcliente($this->id_clienteFK_Idcliente);


					if($this->kardexLogic->getkardexs()==null || count($this->kardexLogic->getkardexs())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$kardexs=$this->kardexLogic->getkardexs();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idcliente('',$this->pagination,$this->id_clienteFK_Idcliente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->kardexsReporte=$this->kardexLogic->getkardexs();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportekardexs("FK_Idcliente",$this->kardexLogic->getkardexs());

					if($this->strTipoPaginacion=='TODOS') {
						$this->kardexLogic->setkardexs($kardexs);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idejercicio')
			{

				if($kardex_session->bigidejercicioActual!=null && $kardex_session->bigidejercicioActual!=0)
				{
					$this->id_ejercicioFK_Idejercicio=$kardex_session->bigidejercicioActual;
					$kardex_session->bigidejercicioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idejercicio($finalQueryPaginacion,$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//kardexLogicAdditional::getDetalleIndiceFK_Idejercicio($this->id_ejercicioFK_Idejercicio);


					if($this->kardexLogic->getkardexs()==null || count($this->kardexLogic->getkardexs())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$kardexs=$this->kardexLogic->getkardexs();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idejercicio('',$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->kardexsReporte=$this->kardexLogic->getkardexs();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportekardexs("FK_Idejercicio",$this->kardexLogic->getkardexs());

					if($this->strTipoPaginacion=='TODOS') {
						$this->kardexLogic->setkardexs($kardexs);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($kardex_session->bigidempresaActual!=null && $kardex_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$kardex_session->bigidempresaActual;
					$kardex_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//kardexLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->kardexLogic->getkardexs()==null || count($this->kardexLogic->getkardexs())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$kardexs=$this->kardexLogic->getkardexs();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->kardexsReporte=$this->kardexLogic->getkardexs();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportekardexs("FK_Idempresa",$this->kardexLogic->getkardexs());

					if($this->strTipoPaginacion=='TODOS') {
						$this->kardexLogic->setkardexs($kardexs);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idestado')
			{

				if($kardex_session->bigidestadoActual!=null && $kardex_session->bigidestadoActual!=0)
				{
					$this->id_estadoFK_Idestado=$kardex_session->bigidestadoActual;
					$kardex_session->bigidestadoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idestado($finalQueryPaginacion,$this->pagination,$this->id_estadoFK_Idestado);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//kardexLogicAdditional::getDetalleIndiceFK_Idestado($this->id_estadoFK_Idestado);


					if($this->kardexLogic->getkardexs()==null || count($this->kardexLogic->getkardexs())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$kardexs=$this->kardexLogic->getkardexs();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idestado('',$this->pagination,$this->id_estadoFK_Idestado);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->kardexsReporte=$this->kardexLogic->getkardexs();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportekardexs("FK_Idestado",$this->kardexLogic->getkardexs());

					if($this->strTipoPaginacion=='TODOS') {
						$this->kardexLogic->setkardexs($kardexs);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idmodulo')
			{

				if($kardex_session->bigidmoduloActual!=null && $kardex_session->bigidmoduloActual!=0)
				{
					$this->id_moduloFK_Idmodulo=$kardex_session->bigidmoduloActual;
					$kardex_session->bigidmoduloActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idmodulo($finalQueryPaginacion,$this->pagination,$this->id_moduloFK_Idmodulo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//kardexLogicAdditional::getDetalleIndiceFK_Idmodulo($this->id_moduloFK_Idmodulo);


					if($this->kardexLogic->getkardexs()==null || count($this->kardexLogic->getkardexs())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$kardexs=$this->kardexLogic->getkardexs();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idmodulo('',$this->pagination,$this->id_moduloFK_Idmodulo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->kardexsReporte=$this->kardexLogic->getkardexs();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportekardexs("FK_Idmodulo",$this->kardexLogic->getkardexs());

					if($this->strTipoPaginacion=='TODOS') {
						$this->kardexLogic->setkardexs($kardexs);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperiodo')
			{

				if($kardex_session->bigidperiodoActual!=null && $kardex_session->bigidperiodoActual!=0)
				{
					$this->id_periodoFK_Idperiodo=$kardex_session->bigidperiodoActual;
					$kardex_session->bigidperiodoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idperiodo($finalQueryPaginacion,$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//kardexLogicAdditional::getDetalleIndiceFK_Idperiodo($this->id_periodoFK_Idperiodo);


					if($this->kardexLogic->getkardexs()==null || count($this->kardexLogic->getkardexs())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$kardexs=$this->kardexLogic->getkardexs();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idperiodo('',$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->kardexsReporte=$this->kardexLogic->getkardexs();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportekardexs("FK_Idperiodo",$this->kardexLogic->getkardexs());

					if($this->strTipoPaginacion=='TODOS') {
						$this->kardexLogic->setkardexs($kardexs);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idproveedor')
			{

				if($kardex_session->bigidproveedorActual!=null && $kardex_session->bigidproveedorActual!=0)
				{
					$this->id_proveedorFK_Idproveedor=$kardex_session->bigidproveedorActual;
					$kardex_session->bigidproveedorActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idproveedor($finalQueryPaginacion,$this->pagination,$this->id_proveedorFK_Idproveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//kardexLogicAdditional::getDetalleIndiceFK_Idproveedor($this->id_proveedorFK_Idproveedor);


					if($this->kardexLogic->getkardexs()==null || count($this->kardexLogic->getkardexs())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$kardexs=$this->kardexLogic->getkardexs();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idproveedor('',$this->pagination,$this->id_proveedorFK_Idproveedor);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->kardexsReporte=$this->kardexLogic->getkardexs();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportekardexs("FK_Idproveedor",$this->kardexLogic->getkardexs());

					if($this->strTipoPaginacion=='TODOS') {
						$this->kardexLogic->setkardexs($kardexs);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsucursal')
			{

				if($kardex_session->bigidsucursalActual!=null && $kardex_session->bigidsucursalActual!=0)
				{
					$this->id_sucursalFK_Idsucursal=$kardex_session->bigidsucursalActual;
					$kardex_session->bigidsucursalActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idsucursal($finalQueryPaginacion,$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//kardexLogicAdditional::getDetalleIndiceFK_Idsucursal($this->id_sucursalFK_Idsucursal);


					if($this->kardexLogic->getkardexs()==null || count($this->kardexLogic->getkardexs())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$kardexs=$this->kardexLogic->getkardexs();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idsucursal('',$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->kardexsReporte=$this->kardexLogic->getkardexs();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportekardexs("FK_Idsucursal",$this->kardexLogic->getkardexs());

					if($this->strTipoPaginacion=='TODOS') {
						$this->kardexLogic->setkardexs($kardexs);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idtipo_kardex')
			{

				if($kardex_session->bigidtipo_kardexActual!=null && $kardex_session->bigidtipo_kardexActual!=0)
				{
					$this->id_tipo_kardexFK_Idtipo_kardex=$kardex_session->bigidtipo_kardexActual;
					$kardex_session->bigidtipo_kardexActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idtipo_kardex($finalQueryPaginacion,$this->pagination,$this->id_tipo_kardexFK_Idtipo_kardex);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//kardexLogicAdditional::getDetalleIndiceFK_Idtipo_kardex($this->id_tipo_kardexFK_Idtipo_kardex);


					if($this->kardexLogic->getkardexs()==null || count($this->kardexLogic->getkardexs())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$kardexs=$this->kardexLogic->getkardexs();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idtipo_kardex('',$this->pagination,$this->id_tipo_kardexFK_Idtipo_kardex);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->kardexsReporte=$this->kardexLogic->getkardexs();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportekardexs("FK_Idtipo_kardex",$this->kardexLogic->getkardexs());

					if($this->strTipoPaginacion=='TODOS') {
						$this->kardexLogic->setkardexs($kardexs);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($kardex_session->bigidusuarioActual!=null && $kardex_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$kardex_session->bigidusuarioActual;
					$kardex_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//kardexLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->kardexLogic->getkardexs()==null || count($this->kardexLogic->getkardexs())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$kardexs=$this->kardexLogic->getkardexs();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->kardexLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->kardexsReporte=$this->kardexLogic->getkardexs();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReportekardexs("FK_Idusuario",$this->kardexLogic->getkardexs());

					if($this->strTipoPaginacion=='TODOS') {
						$this->kardexLogic->setkardexs($kardexs);
					}
				//}

			} 
		
		$kardex_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$kardex_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->kardexLogic->loadForeignsKeysDescription();*/
		
		$this->kardexs=$this->kardexLogic->getkardexs();
		
		if($this->kardexsEliminados==null) {
			$this->kardexsEliminados=array();
		}
		
		$this->Session->write(kardex_util::$STR_SESSION_NAME.'Lista',serialize($this->kardexs));
		$this->Session->write(kardex_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->kardexsEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(kardex_util::$STR_SESSION_NAME,serialize($kardex_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idkardex=$idGeneral;
			
			$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
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
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}

			if(count($this->kardexs) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_IdclienteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_clienteFK_Idcliente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcliente','cmbid_cliente');

			$this->strAccionBusqueda='FK_Idcliente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
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
				$this->kardexLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ejercicioFK_Idejercicio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idejercicio','cmbid_ejercicio');

			$this->strAccionBusqueda='FK_Idejercicio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
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
				$this->kardexLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
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
				$this->kardexLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_estadoFK_Idestado=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idestado','cmbid_estado');

			$this->strAccionBusqueda='FK_Idestado';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdmoduloParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_moduloFK_Idmodulo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idmodulo','cmbid_modulo');

			$this->strAccionBusqueda='FK_Idmodulo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
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
				$this->kardexLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_periodoFK_Idperiodo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperiodo','cmbid_periodo');

			$this->strAccionBusqueda='FK_Idperiodo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
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
				$this->kardexLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_proveedorFK_Idproveedor=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idproveedor','cmbid_proveedor');

			$this->strAccionBusqueda='FK_Idproveedor';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
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
				$this->kardexLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sucursalFK_Idsucursal=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsucursal','cmbid_sucursal');

			$this->strAccionBusqueda='FK_Idsucursal';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idtipo_kardexParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_tipo_kardexFK_Idtipo_kardex=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idtipo_kardex','cmbid_tipo_kardex');

			$this->strAccionBusqueda='FK_Idtipo_kardex';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
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
				$this->kardexLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcliente($strFinalQuery,$id_cliente)
	{
		try
		{

			$this->kardexLogic->getsFK_Idcliente($strFinalQuery,new Pagination(),$id_cliente);
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

			$this->kardexLogic->getsFK_Idejercicio($strFinalQuery,new Pagination(),$id_ejercicio);
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

			$this->kardexLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
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

			$this->kardexLogic->getsFK_Idestado($strFinalQuery,new Pagination(),$id_estado);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idmodulo($strFinalQuery,$id_modulo)
	{
		try
		{

			$this->kardexLogic->getsFK_Idmodulo($strFinalQuery,new Pagination(),$id_modulo);
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

			$this->kardexLogic->getsFK_Idperiodo($strFinalQuery,new Pagination(),$id_periodo);
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

			$this->kardexLogic->getsFK_Idproveedor($strFinalQuery,new Pagination(),$id_proveedor);
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

			$this->kardexLogic->getsFK_Idsucursal($strFinalQuery,new Pagination(),$id_sucursal);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idtipo_kardex($strFinalQuery,$id_tipo_kardex)
	{
		try
		{

			$this->kardexLogic->getsFK_Idtipo_kardex($strFinalQuery,new Pagination(),$id_tipo_kardex);
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

			$this->kardexLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
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
			
			
			$kardexForeignKey=new kardex_param_return(); //kardexForeignKey();
			
			$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));
						
			if($kardex_session==null) {
				$kardex_session=new kardex_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$kardexForeignKey=$this->kardexLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$kardex_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$kardexForeignKey->empresasFK;
				$this->idempresaDefaultFK=$kardexForeignKey->idempresaDefaultFK;
			}

			if($kardex_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$this->strRecargarFkTipos,',')) {
				$this->sucursalsFK=$kardexForeignKey->sucursalsFK;
				$this->idsucursalDefaultFK=$kardexForeignKey->idsucursalDefaultFK;
			}

			if($kardex_session->bitBusquedaDesdeFKSesionsucursal) {
				$this->setVisibleBusquedasParasucursal(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$this->strRecargarFkTipos,',')) {
				$this->ejerciciosFK=$kardexForeignKey->ejerciciosFK;
				$this->idejercicioDefaultFK=$kardexForeignKey->idejercicioDefaultFK;
			}

			if($kardex_session->bitBusquedaDesdeFKSesionejercicio) {
				$this->setVisibleBusquedasParaejercicio(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$this->strRecargarFkTipos,',')) {
				$this->periodosFK=$kardexForeignKey->periodosFK;
				$this->idperiodoDefaultFK=$kardexForeignKey->idperiodoDefaultFK;
			}

			if($kardex_session->bitBusquedaDesdeFKSesionperiodo) {
				$this->setVisibleBusquedasParaperiodo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$kardexForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$kardexForeignKey->idusuarioDefaultFK;
			}

			if($kardex_session->bitBusquedaDesdeFKSesionusuario) {
				$this->setVisibleBusquedasParausuario(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_modulo',$this->strRecargarFkTipos,',')) {
				$this->modulosFK=$kardexForeignKey->modulosFK;
				$this->idmoduloDefaultFK=$kardexForeignKey->idmoduloDefaultFK;
			}

			if($kardex_session->bitBusquedaDesdeFKSesionmodulo) {
				$this->setVisibleBusquedasParamodulo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_tipo_kardex',$this->strRecargarFkTipos,',')) {
				$this->tipo_kardexsFK=$kardexForeignKey->tipo_kardexsFK;
				$this->idtipo_kardexDefaultFK=$kardexForeignKey->idtipo_kardexDefaultFK;
			}

			if($kardex_session->bitBusquedaDesdeFKSesiontipo_kardex) {
				$this->setVisibleBusquedasParatipo_kardex(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_proveedor',$this->strRecargarFkTipos,',')) {
				$this->proveedorsFK=$kardexForeignKey->proveedorsFK;
				$this->idproveedorDefaultFK=$kardexForeignKey->idproveedorDefaultFK;
			}

			if($kardex_session->bitBusquedaDesdeFKSesionproveedor) {
				$this->setVisibleBusquedasParaproveedor(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_cliente',$this->strRecargarFkTipos,',')) {
				$this->clientesFK=$kardexForeignKey->clientesFK;
				$this->idclienteDefaultFK=$kardexForeignKey->idclienteDefaultFK;
			}

			if($kardex_session->bitBusquedaDesdeFKSesioncliente) {
				$this->setVisibleBusquedasParacliente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_estado',$this->strRecargarFkTipos,',')) {
				$this->estadosFK=$kardexForeignKey->estadosFK;
				$this->idestadoDefaultFK=$kardexForeignKey->idestadoDefaultFK;
			}

			if($kardex_session->bitBusquedaDesdeFKSesionestado) {
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
	
	function cargarCombosFKFromReturnGeneral($kardexReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$kardexReturnGeneral->strRecargarFkTipos;
			
			


			if($kardexReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$kardexReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$kardexReturnGeneral->idempresaDefaultFK;
			}


			if($kardexReturnGeneral->con_sucursalsFK==true) {
				$this->sucursalsFK=$kardexReturnGeneral->sucursalsFK;
				$this->idsucursalDefaultFK=$kardexReturnGeneral->idsucursalDefaultFK;
			}


			if($kardexReturnGeneral->con_ejerciciosFK==true) {
				$this->ejerciciosFK=$kardexReturnGeneral->ejerciciosFK;
				$this->idejercicioDefaultFK=$kardexReturnGeneral->idejercicioDefaultFK;
			}


			if($kardexReturnGeneral->con_periodosFK==true) {
				$this->periodosFK=$kardexReturnGeneral->periodosFK;
				$this->idperiodoDefaultFK=$kardexReturnGeneral->idperiodoDefaultFK;
			}


			if($kardexReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$kardexReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$kardexReturnGeneral->idusuarioDefaultFK;
			}


			if($kardexReturnGeneral->con_modulosFK==true) {
				$this->modulosFK=$kardexReturnGeneral->modulosFK;
				$this->idmoduloDefaultFK=$kardexReturnGeneral->idmoduloDefaultFK;
			}


			if($kardexReturnGeneral->con_tipo_kardexsFK==true) {
				$this->tipo_kardexsFK=$kardexReturnGeneral->tipo_kardexsFK;
				$this->idtipo_kardexDefaultFK=$kardexReturnGeneral->idtipo_kardexDefaultFK;
			}


			if($kardexReturnGeneral->con_proveedorsFK==true) {
				$this->proveedorsFK=$kardexReturnGeneral->proveedorsFK;
				$this->idproveedorDefaultFK=$kardexReturnGeneral->idproveedorDefaultFK;
			}


			if($kardexReturnGeneral->con_clientesFK==true) {
				$this->clientesFK=$kardexReturnGeneral->clientesFK;
				$this->idclienteDefaultFK=$kardexReturnGeneral->idclienteDefaultFK;
			}


			if($kardexReturnGeneral->con_estadosFK==true) {
				$this->estadosFK=$kardexReturnGeneral->estadosFK;
				$this->idestadoDefaultFK=$kardexReturnGeneral->idestadoDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(kardex_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));
		
		if($kardex_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($kardex_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($kardex_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sucursal_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sucursal';
			}
			else if($kardex_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ejercicio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ejercicio';
			}
			else if($kardex_session->getstrNombrePaginaNavegacionHaciaFKDesde()==periodo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='periodo';
			}
			else if($kardex_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			else if($kardex_session->getstrNombrePaginaNavegacionHaciaFKDesde()==modulo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='modulo';
			}
			else if($kardex_session->getstrNombrePaginaNavegacionHaciaFKDesde()==tipo_kardex_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='tipo_kardex';
			}
			else if($kardex_session->getstrNombrePaginaNavegacionHaciaFKDesde()==proveedor_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='proveedor';
			}
			else if($kardex_session->getstrNombrePaginaNavegacionHaciaFKDesde()==cliente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='cliente';
			}
			else if($kardex_session->getstrNombrePaginaNavegacionHaciaFKDesde()==estado_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='estado';
			}
			
			$kardex_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->getNewConnexionToDeep();
			}						
			
			$this->kardexsAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->kardexsAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->kardexsAuxiliar=array();
			}
			
			if(count($this->kardexsAuxiliar) > 0) {
				
				foreach ($this->kardexsAuxiliar as $kardexSeleccionado) {
					$this->eliminarTablaBase($kardexSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('kardex_detalle');
			$tipoRelacionReporte->setsDescripcion('Detalles');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=kardex_detalle_util::$STR_NOMBRE_CLASE;
		
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


	public function getmodulosFKListSelectItem() 
	{
		$modulosList=array();

		$item=null;

		foreach($this->modulosFK as $modulo)
		{
			$item=new SelectItem();
			$item->setLabel($modulo->getnombre());
			$item->setValue($modulo->getId());
			$modulosList[]=$item;
		}

		return $modulosList;
	}


	public function gettipo_kardexsFKListSelectItem() 
	{
		$tipo_kardexsList=array();

		$item=null;

		foreach($this->tipo_kardexsFK as $tipo_kardex)
		{
			$item=new SelectItem();
			$item->setLabel($tipo_kardex->getnombre());
			$item->setValue($tipo_kardex->getId());
			$tipo_kardexsList[]=$item;
		}

		return $tipo_kardexsList;
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


	public function getclientesFKListSelectItem() 
	{
		$clientesList=array();

		$item=null;

		foreach($this->clientesFK as $cliente)
		{
			$item=new SelectItem();
			$item->setLabel($cliente->getnombre_completo());
			$item->setValue($cliente->getId());
			$clientesList[]=$item;
		}

		return $clientesList;
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
				$this->kardexLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
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
				$this->kardexLogic->commitNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->rollbackNewConnexionToDeep();
				$this->kardexLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$kardexsNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->kardexs as $kardexLocal) {
				if($kardexLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->kardex=new kardex();
				
				$this->kardex->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->kardexs[]=$this->kardex;*/
				
				$kardexsNuevos[]=$this->kardex;
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
				$class=new Classe('modulo');$classes[]=$class;
				$class=new Classe('tipo_kardex');$classes[]=$class;
				$class=new Classe('proveedor');$classes[]=$class;
				$class=new Classe('cliente');$classes[]=$class;
				$class=new Classe('estado');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->kardexLogic->setkardexs($kardexsNuevos);
					
				$this->kardexLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($kardexsNuevos as $kardexNuevo) {
					$this->kardexs[]=$kardexNuevo;
				}
				
				/*$this->kardexs[]=$kardexsNuevos;*/
				
				$this->kardexLogic->setkardexs($this->kardexs);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($kardexsNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($kardex_session->bigidempresaActual!=null && $kardex_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($kardex_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=kardex_util::getempresaDescripcion($empresaLogic->getempresa());
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

		$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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


			if($kardex_session->bigidsucursalActual!=null && $kardex_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($kardex_session->bigidsucursalActual);//WithConnection

				$this->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=kardex_util::getsucursalDescripcion($sucursalLogic->getsucursal());
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

		$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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


			if($kardex_session->bigidejercicioActual!=null && $kardex_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($kardex_session->bigidejercicioActual);//WithConnection

				$this->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=kardex_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
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

		$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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


			if($kardex_session->bigidperiodoActual!=null && $kardex_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($kardex_session->bigidperiodoActual);//WithConnection

				$this->periodosFK[$periodoLogic->getperiodo()->getId()]=kardex_util::getperiodoDescripcion($periodoLogic->getperiodo());
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

		$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesionusuario!=true) {
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


			if($kardex_session->bigidusuarioActual!=null && $kardex_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($kardex_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=kardex_util::getusuarioDescripcion($usuarioLogic->getusuario());
				$this->idusuarioDefaultFK=$usuarioLogic->getusuario()->getId();
			}
		}
	}

	public function cargarCombosmodulosFK($connexion=null,$strRecargarFkQuery=''){
		$moduloLogic= new modulo_logic();
		$pagination= new Pagination();
		$this->modulosFK=array();

		$moduloLogic->setConnexion($connexion);
		$moduloLogic->getmoduloDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesionmodulo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=modulo_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalmodulo=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalmodulo=Funciones::GetFinalQueryAppend($finalQueryGlobalmodulo, '');
				$finalQueryGlobalmodulo.=modulo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalmodulo.$strRecargarFkQuery;		

				$moduloLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosmodulosFK($moduloLogic->getmodulos());

		} else {
			$this->setVisibleBusquedasParamodulo(true);


			if($kardex_session->bigidmoduloActual!=null && $kardex_session->bigidmoduloActual > 0) {
				$moduloLogic->getEntity($kardex_session->bigidmoduloActual);//WithConnection

				$this->modulosFK[$moduloLogic->getmodulo()->getId()]=kardex_util::getmoduloDescripcion($moduloLogic->getmodulo());
				$this->idmoduloDefaultFK=$moduloLogic->getmodulo()->getId();
			}
		}
	}

	public function cargarCombostipo_kardexsFK($connexion=null,$strRecargarFkQuery=''){
		$tipo_kardexLogic= new tipo_kardex_logic();
		$pagination= new Pagination();
		$this->tipo_kardexsFK=array();

		$tipo_kardexLogic->setConnexion($connexion);
		$tipo_kardexLogic->gettipo_kardexDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesiontipo_kardex!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=tipo_kardex_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaltipo_kardex=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaltipo_kardex=Funciones::GetFinalQueryAppend($finalQueryGlobaltipo_kardex, '');
				$finalQueryGlobaltipo_kardex.=tipo_kardex_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaltipo_kardex.$strRecargarFkQuery;		

				$tipo_kardexLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombostipo_kardexsFK($tipo_kardexLogic->gettipo_kardexs());

		} else {
			$this->setVisibleBusquedasParatipo_kardex(true);


			if($kardex_session->bigidtipo_kardexActual!=null && $kardex_session->bigidtipo_kardexActual > 0) {
				$tipo_kardexLogic->getEntity($kardex_session->bigidtipo_kardexActual);//WithConnection

				$this->tipo_kardexsFK[$tipo_kardexLogic->gettipo_kardex()->getId()]=kardex_util::gettipo_kardexDescripcion($tipo_kardexLogic->gettipo_kardex());
				$this->idtipo_kardexDefaultFK=$tipo_kardexLogic->gettipo_kardex()->getId();
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

		$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesionproveedor!=true) {
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


			if($kardex_session->bigidproveedorActual!=null && $kardex_session->bigidproveedorActual > 0) {
				$proveedorLogic->getEntity($kardex_session->bigidproveedorActual);//WithConnection

				$this->proveedorsFK[$proveedorLogic->getproveedor()->getId()]=kardex_util::getproveedorDescripcion($proveedorLogic->getproveedor());
				$this->idproveedorDefaultFK=$proveedorLogic->getproveedor()->getId();
			}
		}
	}

	public function cargarCombosclientesFK($connexion=null,$strRecargarFkQuery=''){
		$clienteLogic= new cliente_logic();
		$pagination= new Pagination();
		$this->clientesFK=array();

		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesioncliente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=cliente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcliente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcliente=Funciones::GetFinalQueryAppend($finalQueryGlobalcliente, '');
				$finalQueryGlobalcliente.=cliente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcliente.$strRecargarFkQuery;		

				$clienteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosclientesFK($clienteLogic->getclientes());

		} else {
			$this->setVisibleBusquedasParacliente(true);


			if($kardex_session->bigidclienteActual!=null && $kardex_session->bigidclienteActual > 0) {
				$clienteLogic->getEntity($kardex_session->bigidclienteActual);//WithConnection

				$this->clientesFK[$clienteLogic->getcliente()->getId()]=kardex_util::getclienteDescripcion($clienteLogic->getcliente());
				$this->idclienteDefaultFK=$clienteLogic->getcliente()->getId();
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

		$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));

		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		if($kardex_session->bitBusquedaDesdeFKSesionestado!=true) {
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


			if($kardex_session->bigidestadoActual!=null && $kardex_session->bigidestadoActual > 0) {
				$estadoLogic->getEntity($kardex_session->bigidestadoActual);//WithConnection

				$this->estadosFK[$estadoLogic->getestado()->getId()]=kardex_util::getestadoDescripcion($estadoLogic->getestado());
				$this->idestadoDefaultFK=$estadoLogic->getestado()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=kardex_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombossucursalsFK($sucursals){

		foreach ($sucursals as $sucursalLocal ) {
			if($this->idsucursalDefaultFK==0) {
				$this->idsucursalDefaultFK=$sucursalLocal->getId();
			}

			$this->sucursalsFK[$sucursalLocal->getId()]=kardex_util::getsucursalDescripcion($sucursalLocal);
		}
	}

	public function prepararCombosejerciciosFK($ejercicios){

		foreach ($ejercicios as $ejercicioLocal ) {
			if($this->idejercicioDefaultFK==0) {
				$this->idejercicioDefaultFK=$ejercicioLocal->getId();
			}

			$this->ejerciciosFK[$ejercicioLocal->getId()]=kardex_util::getejercicioDescripcion($ejercicioLocal);
		}
	}

	public function prepararCombosperiodosFK($periodos){

		foreach ($periodos as $periodoLocal ) {
			if($this->idperiodoDefaultFK==0) {
				$this->idperiodoDefaultFK=$periodoLocal->getId();
			}

			$this->periodosFK[$periodoLocal->getId()]=kardex_util::getperiodoDescripcion($periodoLocal);
		}
	}

	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=kardex_util::getusuarioDescripcion($usuarioLocal);
		}
	}

	public function prepararCombosmodulosFK($modulos){

		foreach ($modulos as $moduloLocal ) {
			if($this->idmoduloDefaultFK==0) {
				$this->idmoduloDefaultFK=$moduloLocal->getId();
			}

			$this->modulosFK[$moduloLocal->getId()]=kardex_util::getmoduloDescripcion($moduloLocal);
		}
	}

	public function prepararCombostipo_kardexsFK($tipo_kardexs){

		foreach ($tipo_kardexs as $tipo_kardexLocal ) {
			if($this->idtipo_kardexDefaultFK==0) {
				$this->idtipo_kardexDefaultFK=$tipo_kardexLocal->getId();
			}

			$this->tipo_kardexsFK[$tipo_kardexLocal->getId()]=kardex_util::gettipo_kardexDescripcion($tipo_kardexLocal);
		}
	}

	public function prepararCombosproveedorsFK($proveedors){

		foreach ($proveedors as $proveedorLocal ) {
			if($this->idproveedorDefaultFK==0) {
				$this->idproveedorDefaultFK=$proveedorLocal->getId();
			}

			$this->proveedorsFK[$proveedorLocal->getId()]=kardex_util::getproveedorDescripcion($proveedorLocal);
		}
	}

	public function prepararCombosclientesFK($clientes){

		foreach ($clientes as $clienteLocal ) {
			if($this->idclienteDefaultFK==0) {
				$this->idclienteDefaultFK=$clienteLocal->getId();
			}

			$this->clientesFK[$clienteLocal->getId()]=kardex_util::getclienteDescripcion($clienteLocal);
		}
	}

	public function prepararCombosestadosFK($estados){

		foreach ($estados as $estadoLocal ) {
			if($this->idestadoDefaultFK==0) {
				$this->idestadoDefaultFK=$estadoLocal->getId();
			}

			$this->estadosFK[$estadoLocal->getId()]=kardex_util::getestadoDescripcion($estadoLocal);
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

			$strDescripcionempresa=kardex_util::getempresaDescripcion($empresaLogic->getempresa());

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

			$strDescripcionsucursal=kardex_util::getsucursalDescripcion($sucursalLogic->getsucursal());

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

			$strDescripcionejercicio=kardex_util::getejercicioDescripcion($ejercicioLogic->getejercicio());

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

			$strDescripcionperiodo=kardex_util::getperiodoDescripcion($periodoLogic->getperiodo());

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

			$strDescripcionusuario=kardex_util::getusuarioDescripcion($usuarioLogic->getusuario());

		} else {
			$strDescripcionusuario='null';
		}

		return $strDescripcionusuario;
	}

	public function cargarDescripcionmoduloFK($idmodulo,$connexion=null){
		$moduloLogic= new modulo_logic();
		$moduloLogic->setConnexion($connexion);
		$moduloLogic->getmoduloDataAccess()->isForFKData=true;
		$strDescripcionmodulo='';

		if($idmodulo!=null && $idmodulo!='' && $idmodulo!='null') {
			if($connexion!=null) {
				$moduloLogic->getEntity($idmodulo);//WithConnection
			} else {
				$moduloLogic->getEntityWithConnection($idmodulo);//
			}

			$strDescripcionmodulo=kardex_util::getmoduloDescripcion($moduloLogic->getmodulo());

		} else {
			$strDescripcionmodulo='null';
		}

		return $strDescripcionmodulo;
	}

	public function cargarDescripciontipo_kardexFK($idtipo_kardex,$connexion=null){
		$tipo_kardexLogic= new tipo_kardex_logic();
		$tipo_kardexLogic->setConnexion($connexion);
		$tipo_kardexLogic->gettipo_kardexDataAccess()->isForFKData=true;
		$strDescripciontipo_kardex='';

		if($idtipo_kardex!=null && $idtipo_kardex!='' && $idtipo_kardex!='null') {
			if($connexion!=null) {
				$tipo_kardexLogic->getEntity($idtipo_kardex);//WithConnection
			} else {
				$tipo_kardexLogic->getEntityWithConnection($idtipo_kardex);//
			}

			$strDescripciontipo_kardex=kardex_util::gettipo_kardexDescripcion($tipo_kardexLogic->gettipo_kardex());

		} else {
			$strDescripciontipo_kardex='null';
		}

		return $strDescripciontipo_kardex;
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

			$strDescripcionproveedor=kardex_util::getproveedorDescripcion($proveedorLogic->getproveedor());

		} else {
			$strDescripcionproveedor='null';
		}

		return $strDescripcionproveedor;
	}

	public function cargarDescripcionclienteFK($idcliente,$connexion=null){
		$clienteLogic= new cliente_logic();
		$clienteLogic->setConnexion($connexion);
		$clienteLogic->getclienteDataAccess()->isForFKData=true;
		$strDescripcioncliente='';

		if($idcliente!=null && $idcliente!='' && $idcliente!='null') {
			if($connexion!=null) {
				$clienteLogic->getEntity($idcliente);//WithConnection
			} else {
				$clienteLogic->getEntityWithConnection($idcliente);//
			}

			$strDescripcioncliente=kardex_util::getclienteDescripcion($clienteLogic->getcliente());

		} else {
			$strDescripcioncliente='null';
		}

		return $strDescripcioncliente;
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

			$strDescripcionestado=kardex_util::getestadoDescripcion($estadoLogic->getestado());

		} else {
			$strDescripcionestado='null';
		}

		return $strDescripcionestado;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(kardex $kardexClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$kardexClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
				$kardexClase->setid_sucursal($this->parametroGeneralUsuarioActual->getid_sucursal());
				$kardexClase->setid_ejercicio($this->parametroGeneralUsuarioActual->getid_ejercicio());
				$kardexClase->setid_periodo($this->parametroGeneralUsuarioActual->getid_periodo());
				$kardexClase->setid_usuario($this->usuarioActual->getId());
				$kardexClase->setid_modulo($this->moduloActual->getId());
			
			
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

		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idtipo_kardex=$strParaVisibleNegacionempresa;
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

		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idsucursal=$strParaVisiblesucursal;
		$this->strVisibleFK_Idtipo_kardex=$strParaVisibleNegacionsucursal;
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

		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idejercicio=$strParaVisibleejercicio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idtipo_kardex=$strParaVisibleNegacionejercicio;
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

		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idperiodo=$strParaVisibleperiodo;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idtipo_kardex=$strParaVisibleNegacionperiodo;
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

		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idtipo_kardex=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idusuario=$strParaVisibleusuario;
	}

	public function setVisibleBusquedasParamodulo($isParamodulo){
		$strParaVisiblemodulo='display:table-row';
		$strParaVisibleNegacionmodulo='display:none';

		if($isParamodulo) {
			$strParaVisiblemodulo='display:table-row';
			$strParaVisibleNegacionmodulo='display:none';
		} else {
			$strParaVisiblemodulo='display:none';
			$strParaVisibleNegacionmodulo='display:table-row';
		}


		$strParaVisibleNegacionmodulo=trim($strParaVisibleNegacionmodulo);

		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idmodulo=$strParaVisiblemodulo;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idtipo_kardex=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionmodulo;
	}

	public function setVisibleBusquedasParatipo_kardex($isParatipo_kardex){
		$strParaVisibletipo_kardex='display:table-row';
		$strParaVisibleNegaciontipo_kardex='display:none';

		if($isParatipo_kardex) {
			$strParaVisibletipo_kardex='display:table-row';
			$strParaVisibleNegaciontipo_kardex='display:none';
		} else {
			$strParaVisibletipo_kardex='display:none';
			$strParaVisibleNegaciontipo_kardex='display:table-row';
		}


		$strParaVisibleNegaciontipo_kardex=trim($strParaVisibleNegaciontipo_kardex);

		$this->strVisibleFK_Idcliente=$strParaVisibleNegaciontipo_kardex;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegaciontipo_kardex;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciontipo_kardex;
		$this->strVisibleFK_Idestado=$strParaVisibleNegaciontipo_kardex;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegaciontipo_kardex;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegaciontipo_kardex;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegaciontipo_kardex;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegaciontipo_kardex;
		$this->strVisibleFK_Idtipo_kardex=$strParaVisibletipo_kardex;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegaciontipo_kardex;
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

		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idproveedor=$strParaVisibleproveedor;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idtipo_kardex=$strParaVisibleNegacionproveedor;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionproveedor;
	}

	public function setVisibleBusquedasParacliente($isParacliente){
		$strParaVisiblecliente='display:table-row';
		$strParaVisibleNegacioncliente='display:none';

		if($isParacliente) {
			$strParaVisiblecliente='display:table-row';
			$strParaVisibleNegacioncliente='display:none';
		} else {
			$strParaVisiblecliente='display:none';
			$strParaVisibleNegacioncliente='display:table-row';
		}


		$strParaVisibleNegacioncliente=trim($strParaVisibleNegacioncliente);

		$this->strVisibleFK_Idcliente=$strParaVisiblecliente;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idestado=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idtipo_kardex=$strParaVisibleNegacioncliente;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacioncliente;
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

		$this->strVisibleFK_Idcliente=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idestado=$strParaVisibleestado;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idproveedor=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idtipo_kardex=$strParaVisibleNegacionestado;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionestado;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idkardexActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idkardexActual=$idkardexActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarkardex,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParasucursal() {//$idkardexActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idkardexActual=$idkardexActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sucursal_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sucursal_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sucursal_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarkardex,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaejercicio() {//$idkardexActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idkardexActual=$idkardexActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ejercicio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ejercicio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ejercicio_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarkardex,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaperiodo() {//$idkardexActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idkardexActual=$idkardexActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.periodo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',periodo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(periodo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarkardex,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParausuario() {//$idkardexActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idkardexActual=$idkardexActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarkardex,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParamodulo() {//$idkardexActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idkardexActual=$idkardexActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.modulo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_modulo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',modulo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_modulo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(modulo_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarkardex,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParatipo_kardex() {//$idkardexActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idkardexActual=$idkardexActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.tipo_kardex_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_kardex(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',tipo_kardex_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_tipo_kardex(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(tipo_kardex_util::$STR_CLASS_NAME,'inventario','','POPUP','iframe',$this->strTipoUsuarioAuxiliarkardex,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaproveedor() {//$idkardexActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idkardexActual=$idkardexActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.proveedor_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_proveedor(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',proveedor_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_proveedor(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(proveedor_util::$STR_CLASS_NAME,'cuentaspagar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarkardex,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacliente() {//$idkardexActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idkardexActual=$idkardexActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.cliente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cliente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',cliente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_cliente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(cliente_util::$STR_CLASS_NAME,'cuentascobrar','','POPUP','iframe',$this->strTipoUsuarioAuxiliarkardex,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaestado() {//$idkardexActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idkardexActual=$idkardexActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.estado_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',estado_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.kardexJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_estado(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(estado_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarkardex,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParakardex_detalles(int $idkardexActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idkardexActual=$idkardexActual;

		$bitPaginaPopupkardex_detalle=false;

		try {

			$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));

			if($kardex_session==null) {
				$kardex_session=new kardex_session();
			}

			$kardex_detalle_session=unserialize($this->Session->read(kardex_detalle_util::$STR_SESSION_NAME));

			if($kardex_detalle_session==null) {
				$kardex_detalle_session=new kardex_detalle_session();
			}

			$kardex_detalle_session->strUltimaBusqueda='FK_Idkardex';
			$kardex_detalle_session->strPathNavegacionActual=$kardex_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.kardex_detalle_util::$STR_CLASS_WEB_TITULO;
			$kardex_detalle_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupkardex_detalle=$kardex_detalle_session->bitPaginaPopup;
			$kardex_detalle_session->setPaginaPopupVariables(true);
			$bitPaginaPopupkardex_detalle=$kardex_detalle_session->bitPaginaPopup;
			$kardex_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
			$kardex_detalle_session->strNombrePaginaNavegacionHaciaFKDesde=kardex_util::$STR_NOMBRE_OPCION;
			$kardex_detalle_session->bitBusquedaDesdeFKSesionkardex=true;
			$kardex_detalle_session->bigidkardexActual=$this->idkardexActual;

			$kardex_session->bitBusquedaDesdeFKSesionFK=true;
			$kardex_session->bigIdActualFK=$this->idkardexActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"kardex_detalle"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=kardex_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"kardex_detalle"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(kardex_util::$STR_SESSION_NAME,serialize($kardex_session));
			$this->Session->write(kardex_detalle_util::$STR_SESSION_NAME,serialize($kardex_detalle_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupkardex_detalle!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',kardex_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(kardex_detalle_util::$STR_CLASS_NAME,'inventario','','POPUP',$this->strTipoPaginaAuxiliarkardex,$this->strTipoUsuarioAuxiliarkardex,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',kardex_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(kardex_detalle_util::$STR_CLASS_NAME,'inventario','','NO-POPUP',$this->strTipoPaginaAuxiliarkardex,$this->strTipoUsuarioAuxiliarkardex,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(kardex_util::$STR_SESSION_NAME,kardex_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$kardex_session=$this->Session->read(kardex_util::$STR_SESSION_NAME);
				
		if($kardex_session==null) {
			$kardex_session=new kardex_session();		
			//$this->Session->write('kardex_session',$kardex_session);							
		}
		*/
		
		$kardex_session=new kardex_session();
    	$kardex_session->strPathNavegacionActual=kardex_util::$STR_CLASS_WEB_TITULO;
    	$kardex_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(kardex_util::$STR_SESSION_NAME,serialize($kardex_session));		
	}	
	
	public function getSetBusquedasSesionConfig(kardex_session $kardex_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($kardex_session->bitBusquedaDesdeFKSesionFK!=null && $kardex_session->bitBusquedaDesdeFKSesionFK==true) {
			if($kardex_session->bigIdActualFK!=null && $kardex_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$kardex_session->bigIdActualFKParaPosibleAtras=$kardex_session->bigIdActualFK;*/
			}
				
			$kardex_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$kardex_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(kardex_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($kardex_session->bitBusquedaDesdeFKSesionempresa!=null && $kardex_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($kardex_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(kardex_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(kardex_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(kardex_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($kardex_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($kardex_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=kardex_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$kardex_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$kardex_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;

				if($kardex_session->intNumeroPaginacion==kardex_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$kardex_session->intNumeroPaginacion;
				}
			}
			else if($kardex_session->bitBusquedaDesdeFKSesionsucursal!=null && $kardex_session->bitBusquedaDesdeFKSesionsucursal==true)
			{
				if($kardex_session->bigidsucursalActual!=0) {
					$this->strAccionBusqueda='FK_Idsucursal';

					$existe_history=HistoryWeb::ExisteElemento(kardex_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(kardex_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(kardex_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($kardex_session->bigidsucursalActualDescripcion);
						$historyWeb->setIdActual($kardex_session->bigidsucursalActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=kardex_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$kardex_session->bigidsucursalActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$kardex_session->bitBusquedaDesdeFKSesionsucursal=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;

				if($kardex_session->intNumeroPaginacion==kardex_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$kardex_session->intNumeroPaginacion;
				}
			}
			else if($kardex_session->bitBusquedaDesdeFKSesionejercicio!=null && $kardex_session->bitBusquedaDesdeFKSesionejercicio==true)
			{
				if($kardex_session->bigidejercicioActual!=0) {
					$this->strAccionBusqueda='FK_Idejercicio';

					$existe_history=HistoryWeb::ExisteElemento(kardex_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(kardex_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(kardex_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($kardex_session->bigidejercicioActualDescripcion);
						$historyWeb->setIdActual($kardex_session->bigidejercicioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=kardex_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$kardex_session->bigidejercicioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$kardex_session->bitBusquedaDesdeFKSesionejercicio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;

				if($kardex_session->intNumeroPaginacion==kardex_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$kardex_session->intNumeroPaginacion;
				}
			}
			else if($kardex_session->bitBusquedaDesdeFKSesionperiodo!=null && $kardex_session->bitBusquedaDesdeFKSesionperiodo==true)
			{
				if($kardex_session->bigidperiodoActual!=0) {
					$this->strAccionBusqueda='FK_Idperiodo';

					$existe_history=HistoryWeb::ExisteElemento(kardex_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(kardex_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(kardex_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($kardex_session->bigidperiodoActualDescripcion);
						$historyWeb->setIdActual($kardex_session->bigidperiodoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=kardex_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$kardex_session->bigidperiodoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$kardex_session->bitBusquedaDesdeFKSesionperiodo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;

				if($kardex_session->intNumeroPaginacion==kardex_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$kardex_session->intNumeroPaginacion;
				}
			}
			else if($kardex_session->bitBusquedaDesdeFKSesionusuario!=null && $kardex_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($kardex_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(kardex_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(kardex_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(kardex_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($kardex_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($kardex_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=kardex_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$kardex_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$kardex_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;

				if($kardex_session->intNumeroPaginacion==kardex_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$kardex_session->intNumeroPaginacion;
				}
			}
			else if($kardex_session->bitBusquedaDesdeFKSesionmodulo!=null && $kardex_session->bitBusquedaDesdeFKSesionmodulo==true)
			{
				if($kardex_session->bigidmoduloActual!=0) {
					$this->strAccionBusqueda='FK_Idmodulo';

					$existe_history=HistoryWeb::ExisteElemento(kardex_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(kardex_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(kardex_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($kardex_session->bigidmoduloActualDescripcion);
						$historyWeb->setIdActual($kardex_session->bigidmoduloActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=kardex_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$kardex_session->bigidmoduloActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$kardex_session->bitBusquedaDesdeFKSesionmodulo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;

				if($kardex_session->intNumeroPaginacion==kardex_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$kardex_session->intNumeroPaginacion;
				}
			}
			else if($kardex_session->bitBusquedaDesdeFKSesiontipo_kardex!=null && $kardex_session->bitBusquedaDesdeFKSesiontipo_kardex==true)
			{
				if($kardex_session->bigidtipo_kardexActual!=0) {
					$this->strAccionBusqueda='FK_Idtipo_kardex';

					$existe_history=HistoryWeb::ExisteElemento(kardex_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(kardex_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(kardex_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($kardex_session->bigidtipo_kardexActualDescripcion);
						$historyWeb->setIdActual($kardex_session->bigidtipo_kardexActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=kardex_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$kardex_session->bigidtipo_kardexActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$kardex_session->bitBusquedaDesdeFKSesiontipo_kardex=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;

				if($kardex_session->intNumeroPaginacion==kardex_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$kardex_session->intNumeroPaginacion;
				}
			}
			else if($kardex_session->bitBusquedaDesdeFKSesionproveedor!=null && $kardex_session->bitBusquedaDesdeFKSesionproveedor==true)
			{
				if($kardex_session->bigidproveedorActual!=0) {
					$this->strAccionBusqueda='FK_Idproveedor';

					$existe_history=HistoryWeb::ExisteElemento(kardex_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(kardex_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(kardex_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($kardex_session->bigidproveedorActualDescripcion);
						$historyWeb->setIdActual($kardex_session->bigidproveedorActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=kardex_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$kardex_session->bigidproveedorActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$kardex_session->bitBusquedaDesdeFKSesionproveedor=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;

				if($kardex_session->intNumeroPaginacion==kardex_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$kardex_session->intNumeroPaginacion;
				}
			}
			else if($kardex_session->bitBusquedaDesdeFKSesioncliente!=null && $kardex_session->bitBusquedaDesdeFKSesioncliente==true)
			{
				if($kardex_session->bigidclienteActual!=0) {
					$this->strAccionBusqueda='FK_Idcliente';

					$existe_history=HistoryWeb::ExisteElemento(kardex_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(kardex_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(kardex_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($kardex_session->bigidclienteActualDescripcion);
						$historyWeb->setIdActual($kardex_session->bigidclienteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=kardex_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$kardex_session->bigidclienteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$kardex_session->bitBusquedaDesdeFKSesioncliente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;

				if($kardex_session->intNumeroPaginacion==kardex_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$kardex_session->intNumeroPaginacion;
				}
			}
			else if($kardex_session->bitBusquedaDesdeFKSesionestado!=null && $kardex_session->bitBusquedaDesdeFKSesionestado==true)
			{
				if($kardex_session->bigidestadoActual!=0) {
					$this->strAccionBusqueda='FK_Idestado';

					$existe_history=HistoryWeb::ExisteElemento(kardex_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(kardex_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(kardex_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($kardex_session->bigidestadoActualDescripcion);
						$historyWeb->setIdActual($kardex_session->bigidestadoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=kardex_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$kardex_session->bigidestadoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$kardex_session->bitBusquedaDesdeFKSesionestado=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;

				if($kardex_session->intNumeroPaginacion==kardex_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=kardex_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$kardex_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$kardex_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));
		
		if($kardex_session==null) {
			$kardex_session=new kardex_session();
		}
		
		$kardex_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$kardex_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$kardex_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcliente') {
			$kardex_session->id_cliente=$this->id_clienteFK_Idcliente;	

		}
		else if($this->strAccionBusqueda=='FK_Idejercicio') {
			$kardex_session->id_ejercicio=$this->id_ejercicioFK_Idejercicio;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$kardex_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idestado') {
			$kardex_session->id_estado=$this->id_estadoFK_Idestado;	

		}
		else if($this->strAccionBusqueda=='FK_Idmodulo') {
			$kardex_session->id_modulo=$this->id_moduloFK_Idmodulo;	

		}
		else if($this->strAccionBusqueda=='FK_Idperiodo') {
			$kardex_session->id_periodo=$this->id_periodoFK_Idperiodo;	

		}
		else if($this->strAccionBusqueda=='FK_Idproveedor') {
			$kardex_session->id_proveedor=$this->id_proveedorFK_Idproveedor;	

		}
		else if($this->strAccionBusqueda=='FK_Idsucursal') {
			$kardex_session->id_sucursal=$this->id_sucursalFK_Idsucursal;	

		}
		else if($this->strAccionBusqueda=='FK_Idtipo_kardex') {
			$kardex_session->id_tipo_kardex=$this->id_tipo_kardexFK_Idtipo_kardex;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$kardex_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		
		$this->Session->write(kardex_util::$STR_SESSION_NAME,serialize($kardex_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(kardex_session $kardex_session) {
		
		if($kardex_session==null) {
			$kardex_session=unserialize($this->Session->read(kardex_util::$STR_SESSION_NAME));
		}
		
		if($kardex_session==null) {
		   $kardex_session=new kardex_session();
		}
		
		if($kardex_session->strUltimaBusqueda!=null && $kardex_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$kardex_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$kardex_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$kardex_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcliente') {
				$this->id_clienteFK_Idcliente=$kardex_session->id_cliente;
				$kardex_session->id_cliente=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idejercicio') {
				$this->id_ejercicioFK_Idejercicio=$kardex_session->id_ejercicio;
				$kardex_session->id_ejercicio=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$kardex_session->id_empresa;
				$kardex_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idestado') {
				$this->id_estadoFK_Idestado=$kardex_session->id_estado;
				$kardex_session->id_estado=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idmodulo') {
				$this->id_moduloFK_Idmodulo=$kardex_session->id_modulo;
				$kardex_session->id_modulo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idperiodo') {
				$this->id_periodoFK_Idperiodo=$kardex_session->id_periodo;
				$kardex_session->id_periodo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idproveedor') {
				$this->id_proveedorFK_Idproveedor=$kardex_session->id_proveedor;
				$kardex_session->id_proveedor=null;

			}
			 else if($this->strAccionBusqueda=='FK_Idsucursal') {
				$this->id_sucursalFK_Idsucursal=$kardex_session->id_sucursal;
				$kardex_session->id_sucursal=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idtipo_kardex') {
				$this->id_tipo_kardexFK_Idtipo_kardex=$kardex_session->id_tipo_kardex;
				$kardex_session->id_tipo_kardex=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$kardex_session->id_usuario;
				$kardex_session->id_usuario=-1;

			}
		}
		
		$kardex_session->strUltimaBusqueda='';
		//$kardex_session->intNumeroPaginacion=10;
		$kardex_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(kardex_util::$STR_SESSION_NAME,serialize($kardex_session));		
	}
	
	public function kardexsControllerAux($conexion_control) 	 {
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
		$this->idmoduloDefaultFK = 0;
		$this->idtipo_kardexDefaultFK = 0;
		$this->idproveedorDefaultFK = 0;
		$this->idclienteDefaultFK = 0;
		$this->idestadoDefaultFK = 0;
	}
	
	public function setkardexFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_sucursal',$this->idsucursalDefaultFK);
		$this->setExistDataCampoForm('form','id_ejercicio',$this->idejercicioDefaultFK);
		$this->setExistDataCampoForm('form','id_periodo',$this->idperiodoDefaultFK);
		$this->setExistDataCampoForm('form','id_usuario',$this->idusuarioDefaultFK);
		$this->setExistDataCampoForm('form','id_modulo',$this->idmoduloDefaultFK);
		$this->setExistDataCampoForm('form','id_tipo_kardex',$this->idtipo_kardexDefaultFK);
		$this->setExistDataCampoForm('form','id_proveedor',$this->idproveedorDefaultFK);
		$this->setExistDataCampoForm('form','id_cliente',$this->idclienteDefaultFK);
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

		modulo::$class;
		modulo_carga::$CONTROLLER;

		tipo_kardex::$class;
		tipo_kardex_carga::$CONTROLLER;

		proveedor::$class;
		proveedor_carga::$CONTROLLER;

		cliente::$class;
		cliente_carga::$CONTROLLER;

		estado::$class;
		estado_carga::$CONTROLLER;
		
		//REL
		

		kardex_detalle_carga::$CONTROLLER;
		kardex_detalle_util::$STR_SCHEMA;
		kardex_detalle_session::class;
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
		interface kardex_controlI {	
		
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
		
		public function onLoad(kardex_session $kardex_session=null);	
		function index(?string $strTypeOnLoadkardex='',?string $strTipoPaginaAuxiliarkardex='',?string $strTipoUsuarioAuxiliarkardex='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadkardex='',string $strTipoPaginaAuxiliarkardex='',string $strTipoUsuarioAuxiliarkardex='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($kardexReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(kardex $kardexClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(kardex_session $kardex_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(kardex_session $kardex_session);	
		public function kardexsControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setkardexFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
