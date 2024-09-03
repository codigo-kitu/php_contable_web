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

namespace com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\control;

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

use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/asiento_predefinido/util/asiento_predefinido_carga.php');
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;

use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_param_return;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\logic\asiento_predefinido_logic;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\session\asiento_predefinido_session;


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

use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;
use com\bydan\contabilidad\contabilidad\fuente\business\logic\fuente_logic;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_carga;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_util;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\logic\libro_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_carga;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\business\logic\centro_costo_logic;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_carga;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

use com\bydan\contabilidad\contabilidad\documento_contable\business\entity\documento_contable;
use com\bydan\contabilidad\contabilidad\documento_contable\business\logic\documento_contable_logic;
use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_carga;
use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_util;

//REL


use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\presentation\session\asiento_predefinido_detalle_session;

use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;
use com\bydan\contabilidad\contabilidad\asiento\presentation\session\asiento_session;


/*CARGA ARCHIVOS FRAMEWORK*/
asiento_predefinido_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
asiento_predefinido_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
asiento_predefinido_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
asiento_predefinido_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*asiento_predefinido_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	

include_once('com/bydan/contabilidad/contabilidad/asiento_predefinido/presentation/control/asiento_predefinido_init_control.php');
use com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\control\asiento_predefinido_init_control;

include_once('com/bydan/contabilidad/contabilidad/asiento_predefinido/presentation/control/asiento_predefinido_base_control.php');
use com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\control\asiento_predefinido_base_control;

class asiento_predefinido_control extends asiento_predefinido_base_control {	
	
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
			else if($action=='registrarSesionParaasiento_predefinido_detalles' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idasiento_predefinidoActual=$this->getDataId();
				$this->registrarSesionParaasiento_predefinido_detalles($idasiento_predefinidoActual);
			}
			else if($action=='registrarSesionParaasientos' ) {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				$idasiento_predefinidoActual=$this->getDataId();
				$this->registrarSesionParaasientos($idasiento_predefinidoActual);
			} 
			
			
			else if($action=="FK_Idcentro_costo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idcentro_costoParaProcesar();
			}
			else if($action=="FK_Iddocumento_contable"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Iddocumento_contableParaProcesar();
			}
			else if($action=="FK_Idejercicio"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdejercicioParaProcesar();
			}
			else if($action=="FK_Idempresa"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdempresaParaProcesar();
			}
			else if($action=="FK_Idfuente"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdfuenteParaProcesar();
			}
			else if($action=="FK_Idlibro_auxiliar"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_Idlibro_auxiliarParaProcesar();
			}
			else if($action=="FK_Idmodulo"){
				$this->setCargarParameterDivSecciones(false,true,false,false,false,false,false,false,false,false,false,false);
				$this->getsFK_IdmoduloParaProcesar();
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
				//$idasiento_predefinidoActual=$this->getDataId();
				$this->abrirBusquedaParaempresa();//$idasiento_predefinidoActual
			}
			else if($action=='abrirBusquedaParasucursal') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_predefinidoActual=$this->getDataId();
				$this->abrirBusquedaParasucursal();//$idasiento_predefinidoActual
			}
			else if($action=='abrirBusquedaParaejercicio') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_predefinidoActual=$this->getDataId();
				$this->abrirBusquedaParaejercicio();//$idasiento_predefinidoActual
			}
			else if($action=='abrirBusquedaParaperiodo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_predefinidoActual=$this->getDataId();
				$this->abrirBusquedaParaperiodo();//$idasiento_predefinidoActual
			}
			else if($action=='abrirBusquedaParausuario') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_predefinidoActual=$this->getDataId();
				$this->abrirBusquedaParausuario();//$idasiento_predefinidoActual
			}
			else if($action=='abrirBusquedaParamodulo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_predefinidoActual=$this->getDataId();
				$this->abrirBusquedaParamodulo();//$idasiento_predefinidoActual
			}
			else if($action=='abrirBusquedaParafuente') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_predefinidoActual=$this->getDataId();
				$this->abrirBusquedaParafuente();//$idasiento_predefinidoActual
			}
			else if($action=='abrirBusquedaParalibro_auxiliar') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_predefinidoActual=$this->getDataId();
				$this->abrirBusquedaParalibro_auxiliar();//$idasiento_predefinidoActual
			}
			else if($action=='abrirBusquedaParacentro_costo') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_predefinidoActual=$this->getDataId();
				$this->abrirBusquedaParacentro_costo();//$idasiento_predefinidoActual
			}
			else if($action=='abrirBusquedaParadocumento_contable') {
				$this->setCargarParameterDivSecciones(false,false,false,false,false,false,false,false,false,false,false,false);
				//$idasiento_predefinidoActual=$this->getDataId();
				$this->abrirBusquedaParadocumento_contable();//$idasiento_predefinidoActual
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
					
					$asiento_predefinidoController = new asiento_predefinido_control();
					
					$asiento_predefinidoController = $this->getBuildControllerResponse();
					
					$jsonResponse = json_encode($asiento_predefinidoController);
					/*$this*/
				
					echo($jsonResponse);
					
				} else {
					
					if($this->strTipoAction=='BUSQUEDA') {
						$asiento_predefinidoController = new asiento_predefinido_control();
						$asiento_predefinidoController = $this;
						
						$jsonResponse = json_encode($asiento_predefinidoController->asiento_predefinidos);
				
						echo($jsonResponse);
					}
				}
			
			} else {
				
				if($this->asiento_predefinidoReturnGeneral==null) {
					$this->asiento_predefinidoReturnGeneral=new asiento_predefinido_param_return();
				}
				
				echo($this->asiento_predefinidoReturnGeneral->getHtmlTablaReporteAuxiliar());	
			}
		}
	}	
	
	public function getBuildControllerResponse() {
		$asiento_predefinidoController=new asiento_predefinido_control();
		
		$asiento_predefinidoController=$this;
		
		/*CAUSA PROBLEMAS
		$this->usuarioActual=unserialize($this->Session->read('usuarioActual'));*/
		
		$asiento_predefinidoController->usuarioActual=new usuario();
		
		$asiento_predefinidoController->usuarioActual->setId($this->usuarioActual->getId());
		$asiento_predefinidoController->usuarioActual->setVersionRow($this->usuarioActual->getVersionRow());
		
		$asiento_predefinidoController->usuarioActual->setuser_name($this->usuarioActual->getuser_name());				
		$asiento_predefinidoController->usuarioActual->setclave($this->usuarioActual->getclave());						    
		$asiento_predefinidoController->usuarioActual->setnombre($this->usuarioActual->getnombre());						    
		$asiento_predefinidoController->usuarioActual->setcodigo_alterno($this->usuarioActual->getcodigo_alterno());							    
		$asiento_predefinidoController->usuarioActual->settipo($this->usuarioActual->gettipo());							    
		$asiento_predefinidoController->usuarioActual->setestado($this->usuarioActual->getestado());
		
		return $asiento_predefinidoController;
	}
	
	public function loadIndex() {
		$strTypeOnLoadasiento_predefinido= $this->getDataGeneralString('strTypeOnLoadasiento_predefinido');
		$strTipoPaginaAuxiliarasiento_predefinido= $this->getDataGeneralString('strTipoPaginaAuxiliarasiento_predefinido');
		$strTipoUsuarioAuxiliarasiento_predefinido= $this->getDataGeneralString('strTipoUsuarioAuxiliarasiento_predefinido');
						
		$this->cargarParametrosPagina();
		
		$bitEsPopup=$this->bitEsPopup;
		
		try {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}
								
			$this->bitEsMantenimientoRelacionado=$this->bitEsRelacionado;
															
			$this->setCargarParameterDivSecciones(true,true,true,true,true,true,true,false,false,false,false,true);				
			
			$this->index($strTypeOnLoadasiento_predefinido,$strTipoPaginaAuxiliarasiento_predefinido,$strTipoUsuarioAuxiliarasiento_predefinido,'index',$bitEsPopup,false,'','');			
			
			/*MANTENIMIENTO DE SESIONES*/
			if($strTypeOnLoadasiento_predefinido!='onloadhijos') {
				$this->Session->addRemoveSessionsBasesPage('asiento_predefinido','',$this->bitEsRelaciones,$this->bitEsRelacionado);
			}
			/*MANTENIMIENTO DE SESIONES FIN*/
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
		
		} catch(Exception $e) {
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_predefinido_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarasiento_predefinido,$this->strTipoUsuarioAuxiliarasiento_predefinido,false,'','indexNuevoPrepararPaginaForm',$this->opcionActual);
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
		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_predefinido_util::$STR_CLASS_NAME.Constantes::$STR_PREFIJO_FORM,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarasiento_predefinido,$this->strTipoUsuarioAuxiliarasiento_predefinido,false,'','indexSeleccionarActualPaginaForm',$this->opcionActual);
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
		$this->asiento_predefinidoReturnGeneral=new asiento_predefinido_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->asiento_predefinidoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->asiento_predefinidoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->asiento_predefinidoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->asiento_predefinidoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->asiento_predefinidoReturnGeneral);
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
		$this->asiento_predefinidoReturnGeneral=new asiento_predefinido_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->asiento_predefinidoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->asiento_predefinidoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->asiento_predefinidoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->asiento_predefinidoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->asiento_predefinidoReturnGeneral);
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
		$this->asiento_predefinidoReturnGeneral=new asiento_predefinido_param_return();
		
		$url=Funciones::getUrlParametrosPaginaHijo('Report','none','','POPUP','','none',false,'','none',null);
		
		//$this->asiento_predefinidoReturnGeneral->conGuardarReturnSessionJs=true;
		$this->asiento_predefinidoReturnGeneral->conAbrirVentanaAuxiliar=true;
		$this->asiento_predefinidoReturnGeneral->sAuxiliarUrlPagina=$url;
		$this->asiento_predefinidoReturnGeneral->sAuxiliarTipo='POPUP';
		
		$this->actualizarControllerConReturnGeneral($this->asiento_predefinidoReturnGeneral);
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
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
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
			
			
			$this->asiento_predefinidoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);
			
			
			if($this->asiento_predefinidoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->asiento_predefinidoReturnGeneral);
				
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
			
			
			if($this->asiento_predefinidoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
			
			if($this->asiento_predefinidoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->asiento_predefinidoReturnGeneral->getsFuncionJs();
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
			
			/*NO ARRIBA PORQUE USA VARIABLES*/
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);								
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function manejarEventosAction() {
		try {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}
							
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
												
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
							
			$this->asiento_predefinidoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
							
			if($this->asiento_predefinidoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
							
			if($this->asiento_predefinidoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->asiento_predefinidoReturnGeneral);
								
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
							
			if($this->asiento_predefinidoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->asiento_predefinidoReturnGeneral->getsFuncionJs();
			}
							
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
		
		}  catch(Exception $e) {
							
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
		
			$this->manejarRetornarExcepcion($e);
		}	
	}

	public function recargarFormularioGeneralAction() {
		try {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}
						
			$bitDivEsCargarMantenimientosAjaxWebPart=false;
			$bitDivsEsCargarFKsAjaxWebPart=false;
						
			$sTipoControl=$this->getDataEventoControl();										
			$sTipoEvento=$this->getDataEventoTipo();
						
			$this->asiento_predefinidoReturnGeneral=$this->manejarEventos($sTipoControl,$sTipoEvento);				
						
			if($this->asiento_predefinidoReturnGeneral->getConRecargarPropiedades()) {
				$bitDivEsCargarMantenimientosAjaxWebPart=true;												
			}
						
			if($this->asiento_predefinidoReturnGeneral->getConRecargarFKs()) {
				/*CARGA FKs DESDE EVENTOS DE LOGIC ADDITIONAL*/
				$this->cargarCombosFKFromReturnGeneral($this->asiento_predefinidoReturnGeneral);
							
				$bitDivsEsCargarFKsAjaxWebPart=true;
			}
						
			if($this->asiento_predefinidoReturnGeneral->getConFuncionJs()) {
				$this->bitEsEjecutarFuncionJavaScript=true;
				$this->strFuncionJs=$this->asiento_predefinidoReturnGeneral->getsFuncionJs();
			}
						
			$this->setCargarParameterDivSecciones(false,false,false,$bitDivEsCargarMantenimientosAjaxWebPart,true,false,false,false,false,false,false,$bitDivsEsCargarFKsAjaxWebPart);
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
	
		}  catch(Exception $e) {
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
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
		
		$this->asiento_predefinidoLogic=new asiento_predefinido_logic();
		
		
		$this->sistemaLogicAdditional=new sistema_logic_add();
		$this->resumenUsuarioLogicAdditional=new resumen_usuario_logic_add();
		
		$this->asiento_predefinido=new asiento_predefinido();
		
		$this->strTypeOnLoadasiento_predefinido='onload';
		$this->strTipoPaginaAuxiliarasiento_predefinido='none';
		$this->strTipoUsuarioAuxiliarasiento_predefinido='none';	

		$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
		
		$this->asiento_predefinidoModel=new ModelBase();
		
		$this->sistemaReturnGeneral=new sistema_param_return();
		
		
		/*AUTOREFERENCIA INFINITA TALVEZ
		$this->asiento_predefinidoControllerAdditional=new asiento_predefinido_control_add();*/
		
		//$this->callConstructor();				
	}
	
	public function onLoad(asiento_predefinido_session $asiento_predefinido_session=null) {		
		try {		
			/*isEntroOnLoad=true;
			//INTENTA TRAER DATOS DE BUSQUEDA ANTERIOR*/
			$this->traerDatosBusquedaDesdeSession($asiento_predefinido_session);
						
			/*SINO SE CUMPLE VIENE DE PADRE FOREIGN O BUSQUEDA ANTIGUA*/
			if($this->strAccionBusqueda=='') {
				$this->strAccionBusqueda='Todos';
			}
			
			$this->procesarBusqueda($this->strAccionBusqueda);

			
		} catch (Exception $e) {
			throw $e;
		}
	}
	
	function index(?string $strTypeOnLoadasiento_predefinido='',?string $strTipoPaginaAuxiliarasiento_predefinido='',?string $strTipoUsuarioAuxiliarasiento_predefinido='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='') {
		try {			
			
			$this->strTypeOnLoadasiento_predefinido=$strTypeOnLoadasiento_predefinido;
			$this->strTipoPaginaAuxiliarasiento_predefinido=$strTipoPaginaAuxiliarasiento_predefinido;
			$this->strTipoUsuarioAuxiliarasiento_predefinido=$strTipoUsuarioAuxiliarasiento_predefinido;
	
			if($strTipoUsuarioAuxiliarasiento_predefinido=='webroot' || $strFuncionBusquedaRapida=='webroot') {
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
			
			$this->asiento_predefinido=new asiento_predefinido();
			
				
			$historyWeb=new HistoryWeb();
			$this->strHistoryWebAuxiliar='';
			
			$this->strTituloTabla='Asiento Predefinidos';
			
			
			$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));
							
			if($asiento_predefinido_session==null) {
				$asiento_predefinido_session=new asiento_predefinido_session();
				
				/*$this->Session->write('asiento_predefinido_session',$asiento_predefinido_session);*/
			}
			
			
			/*SI HAY QUE EJECUTAR ALGUNA FUNCION JS HACIA EL PADRE*/
			if($asiento_predefinido_session->strFuncionJsPadre!=null && $asiento_predefinido_session->strFuncionJsPadre!='') {
				$this->strFuncionJsPadre=$asiento_predefinido_session->strFuncionJsPadre;
				
				$asiento_predefinido_session->strFuncionJsPadre='';
			}
			
			
			$this->setUrlPaginaVariables($asiento_predefinido_session);
			
			if($strTypeOnLoadasiento_predefinido!=null && $strTypeOnLoadasiento_predefinido=='onload') {
				$this->strNombreOpcionRetorno='';
				
				if(!$this->bitEsPopup) {
					/*NORMAL*/
					$asiento_predefinido_session->setPaginaPopupVariables(false);
					
				} else {
					/*PARA POPUP DESDE MENU PRINCIPAL, POPUP=true MANUALMENTE EN MenuJQuery.js*/
					$asiento_predefinido_session->setPaginaPopupVariables(true);
				}
				
				if($asiento_predefinido_session->intNumeroPaginacion==asiento_predefinido_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_predefinido_session->intNumeroPaginacion;
				}
				/*$this->inicializarSession();*/
				FuncionesWebArbol::inicializarSession($this,asiento_predefinido_util::$STR_SESSION_NAME,'contabilidad');																
			
			} else if($strTypeOnLoadasiento_predefinido!=null && $strTypeOnLoadasiento_predefinido=='onloadhijos' && $this->bitEsPopup) {
				$this->strNombreOpcionRetorno='';
				$asiento_predefinido_session->setPaginaPopupVariables(true);
				
				/*$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;*/
				
				if($asiento_predefinido_session->intNumeroPaginacion==asiento_predefinido_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_predefinido_session->intNumeroPaginacion;
				}
			}
			
			if($strTipoPaginaAuxiliarasiento_predefinido!=null && $strTipoPaginaAuxiliarasiento_predefinido=='none') {
				/*$asiento_predefinido_session->strStyleDivHeader='display:table-row';*/
				
				/*$asiento_predefinido_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';*/
			} else {
				if($strTipoPaginaAuxiliarasiento_predefinido!=null && $strTipoPaginaAuxiliarasiento_predefinido=='iframe') {
					/*
					$asiento_predefinido_session->strStyleDivArbol='display:none';
					$asiento_predefinido_session->strStyleDivHeader='display:none';
					$asiento_predefinido_session->strStyleDivContent='width:100%;height:100%';
					*/
					
					$asiento_predefinido_session->setPaginaPopupVariablesIFrame();
				}
			}			
			
			$this->inicializarMensajesTipo('INDEX',null);
						
			$this->asiento_predefinidoClase=new asiento_predefinido();
			
			
			
		
			$this->tiposAcciones['RECARGAR_REFERENCIAS']='RECARGAR REFERENCIAS';			
			
			$this->tiposAcciones['ELIMINAR_CASCADA']='ELIMINAR CASCADA';			
			
			/*$this->tiposColumnasSelect=asiento_predefinido_util::getTiposSeleccionar(true);
			//COLUMNAS*/
			$this->tiposColumnasSelect[]=Reporte::NewReporte(Constantes::$STR_COLUMNAS,Constantes::$STR_COLUMNAS);
			
			foreach(asiento_predefinido_util::getTiposSeleccionar(true) as $reporte) {
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
			
			$this->sistemaLogicAdditional->setConnexion($this->asiento_predefinidoLogic->getConnexion());
			$this->resumenUsuarioLogicAdditional->setConnexion($this->asiento_predefinidoLogic->getConnexion());
			
			/*NO INICIALIZAR, PUEDE CARGAR MUCHA MEMORIA Y SIN UTILIZAR*/
			
			//$asientopredefinidodetalleLogic=new asiento_predefinido_detalle_logic();
			//$asientoLogic=new asiento_logic(); 
			
			
			$this->jasperPrint = null;
			
			/*//SE INICIALIZA EN CONSTRUCTOR, Y CUANDO SE LLAMA 'index' SE MANEJA CONNEXION
			$this->asiento_predefinidoLogic=new asiento_predefinido_logic();*/
			
			
			$this->asiento_predefinidosModel=null;
			/*new ListDataModel();*/
			
			/*$this->asiento_predefinidosModel.setWrappedData(asiento_predefinidoLogic->getasiento_predefinidos());*/
						
			$this->asiento_predefinidos= array();
			$this->asiento_predefinidosEliminados=array();
			$this->asiento_predefinidosSeleccionados=array();
			
			/*ORDER BY*/
			$this->arrOrderBy= asiento_predefinido_util::getOrderByLista();
			
			//DESHABILITAR, CARGAR CON JS
			
			
			$this->arrOrderByRel= asiento_predefinido_util::getOrderByListaRel();
			
			//DESHABILITAR, CARGAR CON JS
			/*ORDER BY FIN*/
			
			$this->asiento_predefinido= new asiento_predefinido();
			$this->conexion_control=new ConexionController();
			/*$this->Session->write('Conexion_control', conexion_control);*/									
			
			$this->inicializarMensajesDefectoDatosInvalidos();			
		
			
			$this->strVisibleFK_Idcentro_costo='display:table-row';
			$this->strVisibleFK_Iddocumento_contable='display:table-row';
			$this->strVisibleFK_Idejercicio='display:table-row';
			$this->strVisibleFK_Idempresa='display:table-row';
			$this->strVisibleFK_Idfuente='display:table-row';
			$this->strVisibleFK_Idlibro_auxiliar='display:table-row';
			$this->strVisibleFK_Idmodulo='display:table-row';
			$this->strVisibleFK_Idperiodo='display:table-row';
			$this->strVisibleFK_Idsucursal='display:table-row';
			$this->strVisibleFK_Idusuario='display:table-row';
			
			$this->actualizarEstadoCeldasBotones('n', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
						
			
			if(Constantes::$CON_LLAMADA_SIMPLE) {
				if($strTipoUsuarioAuxiliarasiento_predefinido!=null && $strTipoUsuarioAuxiliarasiento_predefinido!='none' && $strTipoUsuarioAuxiliarasiento_predefinido!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarasiento_predefinido);
																
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
				if($strTipoUsuarioAuxiliarasiento_predefinido!=null && $strTipoUsuarioAuxiliarasiento_predefinido!='none' && $strTipoUsuarioAuxiliarasiento_predefinido!='undefined') {
					$usuarioLogic=new usuario_logic();
					
					$idUsuarioAutomatico=Funciones::getIdUsuarioAutomatico($strTipoUsuarioAuxiliarasiento_predefinido);
																
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
				if($strTipoUsuarioAuxiliarasiento_predefinido==null || $strTipoUsuarioAuxiliarasiento_predefinido=='none' || $strTipoUsuarioAuxiliarasiento_predefinido=='undefined') {
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
					
					$this->sistemaReturnGeneral=$this->sistemaLogicAdditional->validarCargarSesionUsuarioActual($bigIdOpcion,$this->usuarioActual,$strTipoUsuarioAuxiliarasiento_predefinido,$this->resumenUsuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_predefinido_util::$STR_NOMBRE_CLASE,$this->arrNombresClasesRelacionadas);/*WithConnection*/
					
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
					$tiene_permisos_paginaweb=$this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$BIG_ID_SISTEMA_CONTABILIDAD_ACTUAL, asiento_predefinido_util::$STR_NOMBRE_CLASE,0,false,false);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
			} else {
				$tiene_permisos_paginaweb=$this->sistemaReturnGeneral->gettiene_permisos_paginaweb();
			}
			
			if($tiene_permisos_paginaweb==false) {
				throw new Exception('No tiene permiso pagina asiento_predefinido');
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
																				
			//$existe_history=$this->getSetBusquedasSesionConfig($asiento_predefinido_session);
			
			$this->getSetBusquedasSesionConfig($asiento_predefinido_session);
			
			if($this->bitGenerarReporte) {								
				if($this->strGenerarReporte=='HtmlGenerar') {
					/*$this->generarReporteasiento_predefinidos($this->strAccionBusqueda,$this->asiento_predefinidoLogic->getasiento_predefinidos());*/
				} else if($this->strGenerarReporte=='Html')	{
					$asiento_predefinido_session->strServletGenerarHtmlReporte='asiento_predefinidoServlet';
				}
			}
			
			if(strpos($this->strAccionBusqueda,'FK_')===false) {
				$this->arrHistoryWebs=array();
				$historyWeb=new HistoryWeb();
				
				$historyWeb->setStrCodigo(asiento_predefinido_util::$STR_NOMBRE_OPCION);
				$historyWeb->setStrNombre(asiento_predefinido_util::$STR_CLASS_WEB_TITULO);
				$historyWeb->setIdActual(0);
				
				$this->arrHistoryWebs[]=$historyWeb;
			}
			
			$this->strTituloPathPagina=HistoryWeb::GetTituloPaginaCompleto($this->arrHistoryWebs,$this->strHistoryWebAuxiliar);
			$this->strTituloPathElementoActual=HistoryWeb::GetTituloElementoActualCompleto($this->arrHistoryWebs,$this->strHistoryWebElementoAuxiliar);
			
			$this->onLoad($asiento_predefinido_session);
			
			/*//EN ONLOAD SE CAMBIO Y SE GUARDO, TALVEZ SE NECESITE LEER NUEVAMENTE
			$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));*/
			
			/*SI ES INVITADO, OCULTAR DIVS ANTES DE GUARDAR SESSION*/
			
			if($strTipoUsuarioAuxiliarasiento_predefinido!=null && $strTipoUsuarioAuxiliarasiento_predefinido=='invitado') {
				$this->actualizarInvitadoSessionDivStyleVariables($asiento_predefinido_session);
			}
								
			$this->set(asiento_predefinido_util::$STR_SESSION_NAME, $asiento_predefinido_session);
			
			$this->actualizarDesdeSessionDivStyleVariables($asiento_predefinido_session);
			
			/*
			$this->asiento_predefinido->recursive = 0;
			
			$this->asiento_predefinidos=$this->paginate();
			*/
			
			/*//EL VALOR LO TOMA DESDE EL CONTROLLER
			$this->set('asiento_predefinidos', $this->asiento_predefinidos);
			
			$this->set(asiento_predefinido_util::$STR_CONTROLLER_NAME, $this);
			
			//EN INDEX NO RETORNAR AJAX POR ESO false*/		
			
			$this->asiento_predefinidoActual =$this->asiento_predefinidoClase;
			
			/*$this->asiento_predefinidoActual =$this->migrarModelasiento_predefinido($this->asiento_predefinidoClase);*/
			
			$this->returnHtml(false);
			
			$this->set(asiento_predefinido_util::$STR_CONTROLLER_NAME, $this);
			
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			
			
			
			$strNombreViewIndex='';		
			$strNombreViewIndex=asiento_predefinido_util::$STR_NOMBRE_OPCION;
				
			if(asiento_predefinido_util::$STR_MODULO_OPCION!='') {
				$strNombreViewIndex=asiento_predefinido_util::$STR_MODULO_OPCION.asiento_predefinido_util::$STR_NOMBRE_OPCION;
			}
			
			/*GUARDAR SESSION*/
			$this->Session->write(Constantes::$SESSION_HISTORY_WEB,serialize($this->arrHistoryWebs));
			
			$this->Session->write(asiento_predefinido_util::$STR_SESSION_NAME,serialize($asiento_predefinido_session));
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
			/*$asiento_predefinidoClase= (asiento_predefinido) asiento_predefinidosModel.getRowData();*/
			
			$this->asiento_predefinidoClase->setId($this->asiento_predefinido->getId());	
			$this->asiento_predefinidoClase->setVersionRow($this->asiento_predefinido->getVersionRow());	
			$this->asiento_predefinidoClase->setVersionRow($this->asiento_predefinido->getVersionRow());	
			$this->asiento_predefinidoClase->setid_empresa($this->asiento_predefinido->getid_empresa());	
			$this->asiento_predefinidoClase->setid_sucursal($this->asiento_predefinido->getid_sucursal());	
			$this->asiento_predefinidoClase->setid_ejercicio($this->asiento_predefinido->getid_ejercicio());	
			$this->asiento_predefinidoClase->setid_periodo($this->asiento_predefinido->getid_periodo());	
			$this->asiento_predefinidoClase->setid_usuario($this->asiento_predefinido->getid_usuario());	
			$this->asiento_predefinidoClase->setid_modulo($this->asiento_predefinido->getid_modulo());	
			$this->asiento_predefinidoClase->setcodigo($this->asiento_predefinido->getcodigo());	
			$this->asiento_predefinidoClase->setnombre($this->asiento_predefinido->getnombre());	
			$this->asiento_predefinidoClase->setid_fuente($this->asiento_predefinido->getid_fuente());	
			$this->asiento_predefinidoClase->setid_libro_auxiliar($this->asiento_predefinido->getid_libro_auxiliar());	
			$this->asiento_predefinidoClase->setid_centro_costo($this->asiento_predefinido->getid_centro_costo());	
			$this->asiento_predefinidoClase->setid_documento_contable($this->asiento_predefinido->getid_documento_contable());	
			$this->asiento_predefinidoClase->setdescripcion($this->asiento_predefinido->getdescripcion());	
			$this->asiento_predefinidoClase->setnro_nit($this->asiento_predefinido->getnro_nit());	
			$this->asiento_predefinidoClase->setreferencia($this->asiento_predefinido->getreferencia());	
		
			/*$this->Session->write('asiento_predefinidoVersionRowActual', asiento_predefinido.getVersionRow());*/
			
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
			
			$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));
						
			if($asiento_predefinido_session==null) {
				$asiento_predefinido_session=new asiento_predefinido_session();
			}
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}


			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO EL PERMISO ACTUALIZAR CON EL PERMISO ACTUALIZAR ORIGINAL ESTE PERMISO SE UTILIZA PARA EL NUEVO TAMBIEN*/
			$this->strPermisoActualizar=$this->strPermisoActualizarOriginal;
	
			if (!$id) {
				$this->redirect(array('action' => 'index'));
			}
			
			/*CAKE FUNCTIONS*/
			/*
			$this->set('asiento_predefinido', $this->asiento_predefinido->read(null, $id));
	
			
			$this->asiento_predefinido->recursive = 0;
			
			$this->asiento_predefinidos=$this->paginate();
			
			$this->set('asiento_predefinidos', $this->asiento_predefinidos);
	
			if (empty($this->data)) {
				$this->data = $this->asiento_predefinido->read(null, $id);
			}
			*/
			
			$this->bitEsnuevo=false;
			
						
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				if(!$this->bitEsRelacionado) { /*bitEsMantenimientoRelacionado falta*/
					$this->asiento_predefinidoLogic->getEntity($id);/*WithConnection*/
				
				} else {
					$this->seleccionarActualDesdeLista($id);
				}
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}						
			
			$this->cargarDatosLogicClaseBean(false);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->asiento_predefinidoClase);
			
			$this->asiento_predefinidoActual=$this->asiento_predefinidoClase;
			
			/*$this->asiento_predefinidoActual =$this->migrarModelasiento_predefinido($this->asiento_predefinidoClase);	*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			$this->actualizarEstadoCeldasBotones('ae', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
			
			
			/*SOLO SI ES NECESARIO*/					
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->asiento_predefinidoLogic->getasiento_predefinidos(),$this->asiento_predefinidoActual);
			
			$this->actualizarControllerConReturnGeneral($this->asiento_predefinidoReturnGeneral);
			
			//$this->asiento_predefinidoReturnGeneral=$this->asiento_predefinidoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$SELECTED,'FORM',$this->asiento_predefinidoLogic->getasiento_predefinidos(),$this->asiento_predefinidoActual,$this->asiento_predefinidoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
						
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			if($this->bitEsRelaciones) {
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
			
			$this->returnHtml(true);	
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function nuevoPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}


			$this->idNuevo--;
			
			$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));
						
			if($asiento_predefinido_session==null) {
				$asiento_predefinido_session=new asiento_predefinido_session();
			}
			
			$this->bitEsnuevo=true;
			
			$this->inicializarMensajesDefectoDatosInvalidos();
			
			/*ACTUALIZO VERDADERO ESTADO DEL PERMISO DE MODIFICACION TOMANDO EN CUENTA EL PERMISO MODIFICACION ORIGINAL*/
			$this->strPermisoActualizar=($this->strPermisoActualizarOriginal=='table-row' || $this->strPermisoNuevo)=='table-row'? 'table-row':'none';
			
			/*$this->Session->write('blnEsnuevoasiento_predefinido', true);*/
			
			$this->strVisibleTablaElementos='table-row';
			$this->strVisibleTablaAcciones='table-row';
			
			
			
			$this->inicializar();						
			
			$this->asiento_predefinidoClase->setId($this->idNuevo);
			
			/*ASIGNAR VARIABLES GLOBALES*/
			$this->setVariablesGlobalesCombosFK($this->asiento_predefinidoClase);
			
			$this->asiento_predefinidoActual =$this->asiento_predefinidoClase;
			
			/*$this->asiento_predefinidoActual =$this->migrarModelasiento_predefinido($this->asiento_predefinidoClase);*/
			
			$this->setasiento_predefinidoFKsDefault();
			
			$this->actualizarEstadoCeldasBotones('a', $this->bitGuardarCambiosEnLote, $this->bitEsMantenimientoRelacionado);
						
			
			
			$this->generarEvento(EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->asiento_predefinidoLogic->getasiento_predefinidos(),$this->asiento_predefinido);
			
			$this->actualizarControllerConReturnGeneral($this->asiento_predefinidoReturnGeneral);
			
			//this->asiento_predefinidoReturnGeneral=$this->asiento_predefinidoLogic->procesarEventos($this->parametroGeneralUsuarioActual,$this->moduloActual,$this->opcionActual,$this->usuarioActual,EventoGlobalTipo::$FORM_RECARGAR,ControlTipo::$FORM,EventoTipo::$LOAD,EventoSubTipo::$NEW,'FORM',$this->asiento_predefinidoLogic->getasiento_predefinidos(),$this->asiento_predefinido,$this->asiento_predefinidoParameterGeneral,$this->bitEsnuevo,$classes);/*WithConnection*/
																	
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO*/
			

			if($this->idempresaDefaultFK!=null && $this->idempresaDefaultFK > -1) {
				$this->asiento_predefinidoReturnGeneral->getasiento_predefinido()->setid_empresa($this->idempresaDefaultFK);
			}

			if($this->idsucursalDefaultFK!=null && $this->idsucursalDefaultFK > -1) {
				$this->asiento_predefinidoReturnGeneral->getasiento_predefinido()->setid_sucursal($this->idsucursalDefaultFK);
			}

			if($this->idejercicioDefaultFK!=null && $this->idejercicioDefaultFK > -1) {
				$this->asiento_predefinidoReturnGeneral->getasiento_predefinido()->setid_ejercicio($this->idejercicioDefaultFK);
			}

			if($this->idperiodoDefaultFK!=null && $this->idperiodoDefaultFK > -1) {
				$this->asiento_predefinidoReturnGeneral->getasiento_predefinido()->setid_periodo($this->idperiodoDefaultFK);
			}

			if($this->idusuarioDefaultFK!=null && $this->idusuarioDefaultFK > -1) {
				$this->asiento_predefinidoReturnGeneral->getasiento_predefinido()->setid_usuario($this->idusuarioDefaultFK);
			}

			if($this->idmoduloDefaultFK!=null && $this->idmoduloDefaultFK > -1) {
				$this->asiento_predefinidoReturnGeneral->getasiento_predefinido()->setid_modulo($this->idmoduloDefaultFK);
			}

			if($this->idfuenteDefaultFK!=null && $this->idfuenteDefaultFK > -1) {
				$this->asiento_predefinidoReturnGeneral->getasiento_predefinido()->setid_fuente($this->idfuenteDefaultFK);
			}

			if($this->idlibro_auxiliarDefaultFK!=null && $this->idlibro_auxiliarDefaultFK > -1) {
				$this->asiento_predefinidoReturnGeneral->getasiento_predefinido()->setid_libro_auxiliar($this->idlibro_auxiliarDefaultFK);
			}

			if($this->idcentro_costoDefaultFK!=null && $this->idcentro_costoDefaultFK > -1) {
				$this->asiento_predefinidoReturnGeneral->getasiento_predefinido()->setid_centro_costo($this->idcentro_costoDefaultFK);
			}

			if($this->iddocumento_contableDefaultFK!=null && $this->iddocumento_contableDefaultFK > -1) {
				$this->asiento_predefinidoReturnGeneral->getasiento_predefinido()->setid_documento_contable($this->iddocumento_contableDefaultFK);
			}			
			/*PARA CUANDO EXISTA FK PADRE SELECCIONADO FIN*/
			
			
			if($this->asiento_predefinidoReturnGeneral->getConRecargarPropiedades()) {
				
				$this->setCopiarVariablesObjetos($this->asiento_predefinidoReturnGeneral->getasiento_predefinido(),$this->asiento_predefinidoActual,true,true,false);
			
				/*//NO_APLICAN
				//INICIALIZA VARIABLES COMBOS NORMALES (FK)
				$this->setVariablesObjetoActualToFormularioForeignKeyasiento_predefinido($this->asiento_predefinidoReturnGeneral->getasiento_predefinido());
				
				//INICIALIZA VARIABLES NORMALES A FORMULARIO(SIN FK)
				$this->setVariablesObjetoActualToFormularioasiento_predefinido($this->asiento_predefinidoReturnGeneral->getasiento_predefinido());*/
			}
			
			if($this->asiento_predefinidoReturnGeneral->getConRecargarRelaciones()) {
				/*//INICIALIZA VARIABLES RELACIONES A FORMULARIO
				//BYDAN_FALTA
				$this->setVariablesRelacionesObjetoActualToFormulario($this->asiento_predefinidoReturnGeneral->getasiento_predefinido(),$classes);*/
			}
				
			/*ACTUALIZA VARIABLES FORMULARIO A OBJETO ACTUAL (PARA NUEVO TABLA O GUARDAR CAMBIOS*/
			if($this->bitEsnuevoGuardarCambios) {
				/*//NO_APLICA
				$this->setVariablesFormularioToObjetoActualasiento_predefinido($this->asiento_predefinido,false);*/
			}
			/*MANEJAR EVENTO_FIN*/
			
			
			if($this->bitEsRelaciones) {
				
				$this->idActual=$this->idNuevo;//id
			
			}
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			//$this->returnAjax();		
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function copiar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}


			$this->bitConEditar=true;
			
			$this->asiento_predefinidosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->asiento_predefinidosAuxiliar=$this->getsSeleccionados($maxima_fila);			
			} else {
				$this->asiento_predefinidosAuxiliar=array();
			}
			
			if(count($this->asiento_predefinidosAuxiliar)==2) {
				$asiento_predefinidoOrigen=$this->asiento_predefinidosAuxiliar[0];
				$asiento_predefinidoDestino=$this->asiento_predefinidosAuxiliar[1];
				
				$this->setCopiarVariablesObjetos($asiento_predefinidoOrigen,$asiento_predefinidoDestino,true,false,false);
				
				$this->actualizarLista($asiento_predefinidoDestino,$this->asiento_predefinidos);
				
			} else {
				throw new Exception('DEBEN ESTAR SELECCIONADOS 2 REGISTROS');	
			}						
			
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('COPIAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function duplicar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			$this->asiento_predefinidosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->asiento_predefinidosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->asiento_predefinidosAuxiliar=array();
			}
			
			if(count($this->asiento_predefinidosAuxiliar) > 0) {
				foreach ($this->asiento_predefinidosAuxiliar as $asiento_predefinidoSeleccionado) {
					$this->asiento_predefinido=new asiento_predefinido();
					
					$this->setCopiarVariablesObjetos($asiento_predefinidoSeleccionado,$this->asiento_predefinido,true,true,false);
						
					$this->asiento_predefinidos[]=$this->asiento_predefinido;
				}
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('DUPLICAR',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}		
	
	public function guardarCambios() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}
			
			
			$this->guardarCambiosTablas();
			
			foreach($this->asiento_predefinidosEliminados as $asiento_predefinidoEliminado) {
				$this->asiento_predefinidoLogic->asiento_predefinidos[]=$asiento_predefinidoEliminado;
			}
				
			$this->ejecutarMantenimiento(MaintenanceType::$GUARDARCAMBIOS);
			
				
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('GUARDAR_CAMBIOS',null);			
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function nuevoTablaPreparar() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;						
			
			if($this->intNumeroNuevoTabla==null || $this->intNumeroNuevoTabla<=0) {
				$this->intNumeroNuevoTabla=1;	
				
			} else if($this->intNumeroNuevoTabla>50) {
				$this->intNumeroNuevoTabla=50;
			}
			
			for($i=0;$i<$this->intNumeroNuevoTabla;$i++) {
				
				$this->asiento_predefinido=new asiento_predefinido();
							
				$this->asiento_predefinidos[]=$this->asiento_predefinido;				
			}
			
				
			$this->cancelarControles();		
						
			$this->inicializarMensajesTipo('NUEVO_TABLA',null);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
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
		
		$asiento_predefinidoActual=new asiento_predefinido();
		
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
				
				$asiento_predefinidoActual=$this->asiento_predefinidos[$indice];		
				
				
				
				
				
				if($this->existDataCampoFormTabla('cel_'.$i.'_3','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_empresa((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_3'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_4','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_sucursal((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_4'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_5','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_ejercicio((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_5'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_6','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_periodo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_6'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_7','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_usuario((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_7'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_8','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_modulo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_8'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_9','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setcodigo($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_9'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_10','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setnombre($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_10'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_11','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_fuente((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_11'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_12','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_libro_auxiliar((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_12'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_13','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_centro_costo((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_13'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_14','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setid_documento_contable((int)$this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_14'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_15','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setdescripcion($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_15'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_16','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setnro_nit($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_16'));  }
				if($this->existDataCampoFormTabla('cel_'.$i.'_17','t'.$this->strSufijo)) {  $asiento_predefinidoActual->setreferencia($this->getDataCampoFormTabla('t'.$this->strSufijo,'cel_'.$i.'_17'));  }
			}
		}
	}
	
	function eliminarCascadas() {
		//$indice=0;
		$maxima_fila=0;
		
		$this->asiento_predefinidosAuxiliar=array();		 
		/*$this->asiento_predefinidosEliminados=array();*/
			
		$maxima_fila=$this->getDataMaximaFila();			
			
		if($maxima_fila!=null && $maxima_fila>0) {
			$this->asiento_predefinidosAuxiliar=$this->getsSeleccionados($maxima_fila);
		} else {
			$this->asiento_predefinidosAuxiliar=array();
		}
			
		if(count($this->asiento_predefinidosAuxiliar) > 0) {
			
			$existe=false;
			
			foreach($this->asiento_predefinidosAuxiliar as $asiento_predefinidoAuxLocal) {				
				
				foreach($this->asiento_predefinidos as $asiento_predefinidoLocal) {
					if($asiento_predefinidoLocal->getId()==$asiento_predefinidoAuxLocal->getId()) {
						$asiento_predefinidoLocal->setIsDeleted(true);
						
						/*$this->asiento_predefinidosEliminados[]=$asiento_predefinidoLocal;*/
						
						if(!$existe) {
							$existe=true;
						}
						
						break;
					}
				}
			}
			
			if($existe) {
				$this->asiento_predefinidoLogic->setasiento_predefinidos($this->asiento_predefinidos);
			}
		}
	}
	
	
	public function eliminarCascada() {
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			$this->eliminarCascadas();
			
			/*$this->guardarCambiosTablas();*/
										
			$this->ejecutarMantenimiento(MaintenanceType::$ELIMINAR_CASCADA);
					
			$this->cancelarControles();		
			
			$this->inicializarMensajesTipo('ELIMINAR_CASCADA',null);			
					
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
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
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function search(string $strTypeOnLoadasiento_predefinido='',string $strTipoPaginaAuxiliarasiento_predefinido='',string $strTipoUsuarioAuxiliarasiento_predefinido='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='') {
		try {
			$this->index($strTypeOnLoadasiento_predefinido,$strTipoPaginaAuxiliarasiento_predefinido,$strTipoUsuarioAuxiliarasiento_predefinido,$strTipoView,$bitConBusquedaRapida,true,$strValorBusquedaRapida,$strFuncionBusquedaRapida);
			
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}			
    }
	
	public function recargarUltimaInformacion(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}
			
			
			/*
			if(count($this->asiento_predefinidos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			*/
			
			/*this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function procesarBusqueda(string $strAccionBusqueda) {
		$esBusqueda=false;
		
		if($strAccionBusqueda!="Todos")	{
			$esBusqueda=true;
		}
		
						
		$finalQueryPaginacion=asiento_predefinido_util::$STR_FINAL_QUERY;
		
		$this->orderByQuery=$this->getCargarOrderByQuery();  	
				
		
		$this->pagination=new Pagination();
		$classes=array();
		 
		
		/*QUERY GLOBAL*/
		$finalQueryGlobal="";
		$this->arrDatoGeneral = array();
		$this->arrDatoGeneralNo = array();
		
		$arrColumnasGlobalesNo=asiento_predefinido_util::getArrayColumnasGlobalesNo($this->arrDatoGeneral);
		$arrColumnasGlobales=asiento_predefinido_util::getArrayColumnasGlobales($this->arrDatoGeneral,$arrColumnasGlobalesNo);
		
			
						
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
			
			$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));
						
			if($asiento_predefinido_session==null) {
				$asiento_predefinido_session=new asiento_predefinido_session();
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
					/*$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;*/
					
					if($asiento_predefinido_session->intNumeroPaginacion==asiento_predefinido_util::$INT_NUMERO_PAGINACION) {
						$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
					} else {
						$this->intNumeroPaginacion=$asiento_predefinido_session->intNumeroPaginacion;
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
			
			$this->asiento_predefinidosEliminados=array();
			
			/*$this->asiento_predefinidoLogic->setConnexion($connexion);*/
			
			$this->asiento_predefinidoLogic->setIsConDeep(true);
			
			$this->asiento_predefinidoLogic->getasiento_predefinidoDataAccess()->isForFKDataRels=true;
			
			
			$class=new Classe('empresa');$classes[]=$class;
			$class=new Classe('sucursal');$classes[]=$class;
			$class=new Classe('ejercicio');$classes[]=$class;
			$class=new Classe('periodo');$classes[]=$class;
			$class=new Classe('usuario');$classes[]=$class;
			$class=new Classe('modulo');$classes[]=$class;
			$class=new Classe('fuente');$classes[]=$class;
			$class=new Classe('libro_auxiliar');$classes[]=$class;
			$class=new Classe('centro_costo');$classes[]=$class;
			$class=new Classe('documento_contable');$classes[]=$class;
			
			$this->asiento_predefinidoLogic->setDatosDeepParametros(false,DeepLoadType::$INCLUDE,$classes,'');
			
			if($strAccionBusqueda=='Todos' && !$this->bitConBusquedaRapida){ 						
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->asiento_predefinidoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
				
				
				if($this->asiento_predefinidoLogic->getasiento_predefinidos()==null|| count($this->asiento_predefinidoLogic->getasiento_predefinidos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->asiento_predefinidos=$this->asiento_predefinidoLogic->getasiento_predefinidos();				
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->asiento_predefinidoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
						
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
												
						$this->asiento_predefinidosReporte=$this->asiento_predefinidoLogic->getasiento_predefinidos();
									
						/*$this->generarReportes('Todos',$this->asiento_predefinidoLogic->getasiento_predefinidos());*/
					
						$this->asiento_predefinidoLogic->setasiento_predefinidos($this->asiento_predefinidos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			
			} else if($this->bitConBusquedaRapida) { 
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->asiento_predefinidoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}				
								
				if($this->asiento_predefinidoLogic->getasiento_predefinidos()==null|| count($this->asiento_predefinidoLogic->getasiento_predefinidos())==0) {
				
				}
				
				/*if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {*/
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
			
						$this->asiento_predefinidos=$this->asiento_predefinidoLogic->getasiento_predefinidos();						
						
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
							$this->asiento_predefinidoLogic->getTodos($finalQueryPaginacion,$this->pagination);/*WithConnection*/
							
						} else if(Constantes::$BIT_USA_WEBSERVICE) {
												
						}						
							
						$this->asiento_predefinidosReporte=$this->asiento_predefinidoLogic->getasiento_predefinidos();
									
						/*$this->generarReportes('Todos',$this->asiento_predefinidoLogic->getasiento_predefinidos());*/
					
						$this->asiento_predefinidoLogic->setasiento_predefinidos($this->asiento_predefinidos);
						
						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);			
					}
				/*}*/
			} else  if($strAccionBusqueda=='PorId'){ 
				/*//PUEDE LLENARSE ANTES, FUNCION AUXILIAR
				$this->idasiento_predefinido=0;*/
				
				if($asiento_predefinido_session->bitBusquedaDesdeFKSesionFK!=null && $asiento_predefinido_session->bitBusquedaDesdeFKSesionFK==true) {
					if($asiento_predefinido_session->bigIdActualFK!=null && $asiento_predefinido_session->bigIdActualFK!=0)	{
						$this->idasiento_predefinido=$asiento_predefinido_session->bigIdActualFK;	
					}
					
					$asiento_predefinido_session->bitBusquedaDesdeFKSesionFK=false;
					
					$asiento_predefinido_session->bigIdActualFK=0;
				}
				
				/*
				if($this->Session->read('idActualForeignKey')!=null) {
					idasiento_predefinido=(Long)//$this->Session->read('idActualForeignKey');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKey');
				}
				else if($this->Session->read('idActualForeignKeyParaPosibleAtras')!=null) {
					idasiento_predefinido=(Long)//$this->Session->read('idActualForeignKeyParaPosibleAtras');	
				
					FacesContext.getCurrentInstance().getExternalContext().getstressionMap().remove('idActualForeignKeyParaPosibleAtras');
				}
				*/
				
				
				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
					$this->asiento_predefinidoLogic->getEntity($this->idasiento_predefinido);/*WithConnection*/
				
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
										
				}
								
				/*asiento_predefinidoLogicAdditional::getDetalleIndicePorId($idasiento_predefinido);*/

				
				if($this->asiento_predefinidoLogic->getasiento_predefinido()!=null) {
					$this->asiento_predefinidoLogic->setasiento_predefinidos(array());
					$this->asiento_predefinidoLogic->asiento_predefinidos[]=$this->asiento_predefinidoLogic->getasiento_predefinido();
				}
			
			}
		
			else if($strAccionBusqueda=='FK_Idcentro_costo')
			{

				if($asiento_predefinido_session->bigidcentro_costoActual!=null && $asiento_predefinido_session->bigidcentro_costoActual!=0)
				{
					$this->id_centro_costoFK_Idcentro_costo=$asiento_predefinido_session->bigidcentro_costoActual;
					$asiento_predefinido_session->bigidcentro_costoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idcentro_costo($finalQueryPaginacion,$this->pagination,$this->id_centro_costoFK_Idcentro_costo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_predefinidoLogicAdditional::getDetalleIndiceFK_Idcentro_costo($this->id_centro_costoFK_Idcentro_costo);


					if($this->asiento_predefinidoLogic->getasiento_predefinidos()==null || count($this->asiento_predefinidoLogic->getasiento_predefinidos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_predefinidos=$this->asiento_predefinidoLogic->getasiento_predefinidos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idcentro_costo('',$this->pagination,$this->id_centro_costoFK_Idcentro_costo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_predefinidosReporte=$this->asiento_predefinidoLogic->getasiento_predefinidos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_predefinidos("FK_Idcentro_costo",$this->asiento_predefinidoLogic->getasiento_predefinidos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_predefinidoLogic->setasiento_predefinidos($asiento_predefinidos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Iddocumento_contable')
			{

				if($asiento_predefinido_session->bigiddocumento_contableActual!=null && $asiento_predefinido_session->bigiddocumento_contableActual!=0)
				{
					$this->id_documento_contableFK_Iddocumento_contable=$asiento_predefinido_session->bigiddocumento_contableActual;
					$asiento_predefinido_session->bigiddocumento_contableActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Iddocumento_contable($finalQueryPaginacion,$this->pagination,$this->id_documento_contableFK_Iddocumento_contable);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_predefinidoLogicAdditional::getDetalleIndiceFK_Iddocumento_contable($this->id_documento_contableFK_Iddocumento_contable);


					if($this->asiento_predefinidoLogic->getasiento_predefinidos()==null || count($this->asiento_predefinidoLogic->getasiento_predefinidos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_predefinidos=$this->asiento_predefinidoLogic->getasiento_predefinidos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Iddocumento_contable('',$this->pagination,$this->id_documento_contableFK_Iddocumento_contable);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_predefinidosReporte=$this->asiento_predefinidoLogic->getasiento_predefinidos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_predefinidos("FK_Iddocumento_contable",$this->asiento_predefinidoLogic->getasiento_predefinidos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_predefinidoLogic->setasiento_predefinidos($asiento_predefinidos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idejercicio')
			{

				if($asiento_predefinido_session->bigidejercicioActual!=null && $asiento_predefinido_session->bigidejercicioActual!=0)
				{
					$this->id_ejercicioFK_Idejercicio=$asiento_predefinido_session->bigidejercicioActual;
					$asiento_predefinido_session->bigidejercicioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idejercicio($finalQueryPaginacion,$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_predefinidoLogicAdditional::getDetalleIndiceFK_Idejercicio($this->id_ejercicioFK_Idejercicio);


					if($this->asiento_predefinidoLogic->getasiento_predefinidos()==null || count($this->asiento_predefinidoLogic->getasiento_predefinidos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_predefinidos=$this->asiento_predefinidoLogic->getasiento_predefinidos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idejercicio('',$this->pagination,$this->id_ejercicioFK_Idejercicio);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_predefinidosReporte=$this->asiento_predefinidoLogic->getasiento_predefinidos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_predefinidos("FK_Idejercicio",$this->asiento_predefinidoLogic->getasiento_predefinidos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_predefinidoLogic->setasiento_predefinidos($asiento_predefinidos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idempresa')
			{

				if($asiento_predefinido_session->bigidempresaActual!=null && $asiento_predefinido_session->bigidempresaActual!=0)
				{
					$this->id_empresaFK_Idempresa=$asiento_predefinido_session->bigidempresaActual;
					$asiento_predefinido_session->bigidempresaActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idempresa($finalQueryPaginacion,$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_predefinidoLogicAdditional::getDetalleIndiceFK_Idempresa($this->id_empresaFK_Idempresa);


					if($this->asiento_predefinidoLogic->getasiento_predefinidos()==null || count($this->asiento_predefinidoLogic->getasiento_predefinidos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_predefinidos=$this->asiento_predefinidoLogic->getasiento_predefinidos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idempresa('',$this->pagination,$this->id_empresaFK_Idempresa);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_predefinidosReporte=$this->asiento_predefinidoLogic->getasiento_predefinidos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_predefinidos("FK_Idempresa",$this->asiento_predefinidoLogic->getasiento_predefinidos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_predefinidoLogic->setasiento_predefinidos($asiento_predefinidos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idfuente')
			{

				if($asiento_predefinido_session->bigidfuenteActual!=null && $asiento_predefinido_session->bigidfuenteActual!=0)
				{
					$this->id_fuenteFK_Idfuente=$asiento_predefinido_session->bigidfuenteActual;
					$asiento_predefinido_session->bigidfuenteActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idfuente($finalQueryPaginacion,$this->pagination,$this->id_fuenteFK_Idfuente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_predefinidoLogicAdditional::getDetalleIndiceFK_Idfuente($this->id_fuenteFK_Idfuente);


					if($this->asiento_predefinidoLogic->getasiento_predefinidos()==null || count($this->asiento_predefinidoLogic->getasiento_predefinidos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_predefinidos=$this->asiento_predefinidoLogic->getasiento_predefinidos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idfuente('',$this->pagination,$this->id_fuenteFK_Idfuente);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_predefinidosReporte=$this->asiento_predefinidoLogic->getasiento_predefinidos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_predefinidos("FK_Idfuente",$this->asiento_predefinidoLogic->getasiento_predefinidos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_predefinidoLogic->setasiento_predefinidos($asiento_predefinidos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idlibro_auxiliar')
			{

				if($asiento_predefinido_session->bigidlibro_auxiliarActual!=null && $asiento_predefinido_session->bigidlibro_auxiliarActual!=0)
				{
					$this->id_libro_auxiliarFK_Idlibro_auxiliar=$asiento_predefinido_session->bigidlibro_auxiliarActual;
					$asiento_predefinido_session->bigidlibro_auxiliarActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idlibro_auxiliar($finalQueryPaginacion,$this->pagination,$this->id_libro_auxiliarFK_Idlibro_auxiliar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_predefinidoLogicAdditional::getDetalleIndiceFK_Idlibro_auxiliar($this->id_libro_auxiliarFK_Idlibro_auxiliar);


					if($this->asiento_predefinidoLogic->getasiento_predefinidos()==null || count($this->asiento_predefinidoLogic->getasiento_predefinidos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_predefinidos=$this->asiento_predefinidoLogic->getasiento_predefinidos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idlibro_auxiliar('',$this->pagination,$this->id_libro_auxiliarFK_Idlibro_auxiliar);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_predefinidosReporte=$this->asiento_predefinidoLogic->getasiento_predefinidos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_predefinidos("FK_Idlibro_auxiliar",$this->asiento_predefinidoLogic->getasiento_predefinidos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_predefinidoLogic->setasiento_predefinidos($asiento_predefinidos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idmodulo')
			{

				if($asiento_predefinido_session->bigidmoduloActual!=null && $asiento_predefinido_session->bigidmoduloActual!=0)
				{
					$this->id_moduloFK_Idmodulo=$asiento_predefinido_session->bigidmoduloActual;
					$asiento_predefinido_session->bigidmoduloActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idmodulo($finalQueryPaginacion,$this->pagination,$this->id_moduloFK_Idmodulo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_predefinidoLogicAdditional::getDetalleIndiceFK_Idmodulo($this->id_moduloFK_Idmodulo);


					if($this->asiento_predefinidoLogic->getasiento_predefinidos()==null || count($this->asiento_predefinidoLogic->getasiento_predefinidos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_predefinidos=$this->asiento_predefinidoLogic->getasiento_predefinidos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idmodulo('',$this->pagination,$this->id_moduloFK_Idmodulo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_predefinidosReporte=$this->asiento_predefinidoLogic->getasiento_predefinidos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_predefinidos("FK_Idmodulo",$this->asiento_predefinidoLogic->getasiento_predefinidos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_predefinidoLogic->setasiento_predefinidos($asiento_predefinidos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idperiodo')
			{

				if($asiento_predefinido_session->bigidperiodoActual!=null && $asiento_predefinido_session->bigidperiodoActual!=0)
				{
					$this->id_periodoFK_Idperiodo=$asiento_predefinido_session->bigidperiodoActual;
					$asiento_predefinido_session->bigidperiodoActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idperiodo($finalQueryPaginacion,$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_predefinidoLogicAdditional::getDetalleIndiceFK_Idperiodo($this->id_periodoFK_Idperiodo);


					if($this->asiento_predefinidoLogic->getasiento_predefinidos()==null || count($this->asiento_predefinidoLogic->getasiento_predefinidos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_predefinidos=$this->asiento_predefinidoLogic->getasiento_predefinidos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idperiodo('',$this->pagination,$this->id_periodoFK_Idperiodo);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_predefinidosReporte=$this->asiento_predefinidoLogic->getasiento_predefinidos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_predefinidos("FK_Idperiodo",$this->asiento_predefinidoLogic->getasiento_predefinidos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_predefinidoLogic->setasiento_predefinidos($asiento_predefinidos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idsucursal')
			{

				if($asiento_predefinido_session->bigidsucursalActual!=null && $asiento_predefinido_session->bigidsucursalActual!=0)
				{
					$this->id_sucursalFK_Idsucursal=$asiento_predefinido_session->bigidsucursalActual;
					$asiento_predefinido_session->bigidsucursalActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idsucursal($finalQueryPaginacion,$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_predefinidoLogicAdditional::getDetalleIndiceFK_Idsucursal($this->id_sucursalFK_Idsucursal);


					if($this->asiento_predefinidoLogic->getasiento_predefinidos()==null || count($this->asiento_predefinidoLogic->getasiento_predefinidos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_predefinidos=$this->asiento_predefinidoLogic->getasiento_predefinidos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idsucursal('',$this->pagination,$this->id_sucursalFK_Idsucursal);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_predefinidosReporte=$this->asiento_predefinidoLogic->getasiento_predefinidos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_predefinidos("FK_Idsucursal",$this->asiento_predefinidoLogic->getasiento_predefinidos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_predefinidoLogic->setasiento_predefinidos($asiento_predefinidos);
					}
				//}

			}
			else if($strAccionBusqueda=='FK_Idusuario')
			{

				if($asiento_predefinido_session->bigidusuarioActual!=null && $asiento_predefinido_session->bigidusuarioActual!=0)
				{
					$this->id_usuarioFK_Idusuario=$asiento_predefinido_session->bigidusuarioActual;
					$asiento_predefinido_session->bigidusuarioActual=0;
				}

				if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idusuario($finalQueryPaginacion,$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
				//asiento_predefinidoLogicAdditional::getDetalleIndiceFK_Idusuario($this->id_usuarioFK_Idusuario);


					if($this->asiento_predefinidoLogic->getasiento_predefinidos()==null || count($this->asiento_predefinidoLogic->getasiento_predefinidos())==0) {
					}

				//if($this->strGenerarReporte!=''&& $this->strGenerarReporte!=null) {
					if($this->strTipoPaginacion=='TODOS') {
						$this->pagination->setIntFirstResult(-1);
						$this->pagination->setIntMaxResults(-1);
						$asiento_predefinidos=$this->asiento_predefinidoLogic->getasiento_predefinidos();
								
						if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
					$this->asiento_predefinidoLogic->getsFK_Idusuario('',$this->pagination,$this->id_usuarioFK_Idusuario);
				} else if(Constantes::$BIT_USA_WEBSERVICE) {
				}
						$this->asiento_predefinidosReporte=$this->asiento_predefinidoLogic->getasiento_predefinidos();

						$this->pagination->setIntFirstResult($this->intNumeroPaginacion);
						$this->pagination->setIntMaxResults($this->intNumeroPaginacionPagina);
					}
					//$this->generarReporteasiento_predefinidos("FK_Idusuario",$this->asiento_predefinidoLogic->getasiento_predefinidos());

					if($this->strTipoPaginacion=='TODOS') {
						$this->asiento_predefinidoLogic->setasiento_predefinidos($asiento_predefinidos);
					}
				//}

			} 
		
		$asiento_predefinido_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$asiento_predefinido_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		/*$this->asiento_predefinidoLogic->loadForeignsKeysDescription();*/
		
		$this->asiento_predefinidos=$this->asiento_predefinidoLogic->getasiento_predefinidos();
		
		if($this->asiento_predefinidosEliminados==null) {
			$this->asiento_predefinidosEliminados=array();
		}
		
		$this->Session->write(asiento_predefinido_util::$STR_SESSION_NAME.'Lista',serialize($this->asiento_predefinidos));
		$this->Session->write(asiento_predefinido_util::$STR_SESSION_NAME.'ListaEliminados',serialize($this->asiento_predefinidosEliminados));
		
		$this->cargarLinksPagination();
		
		$this->guardarDatosBusquedaSession();
		
		$this->Session->write(asiento_predefinido_util::$STR_SESSION_NAME,serialize($asiento_predefinido_session));		
		
		} catch(Exception $e) {
			throw $e;
      	}
	}	
	
	public function buscarPorIdGeneral(int $idGeneral){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}


			$this->strAccionBusqueda='PorId';
			$this->idasiento_predefinido=$idGeneral;
			
			$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
			
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
			
			$this->manejarRetornarExcepcion($e);
		}		
	}
	
	public function anteriores(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
		
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
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
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);			
		
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}

	}
	
	public function siguientes(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			if(count($this->asiento_predefinidos) > 0) {
				$this->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina + $this->intNumeroPaginacion;
			}
			
			/*$this->intInicioPaginacion=$this->intNumeroPaginacionPagina;
			$this->intFinPaginacion=$this->intNumeroPaginacion;*/
			
			$this->procesarBusqueda($this->strAccionBusqueda);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);
		
			$this->returnHtml(true);
		
		} catch(Exception $e) {
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
	}
	
	
	public function getsFK_Idcentro_costoParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_centro_costoFK_Idcentro_costo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idcentro_costo','cmbid_centro_costo');

			$this->strAccionBusqueda='FK_Idcentro_costo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Iddocumento_contableParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_documento_contableFK_Iddocumento_contable=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Iddocumento_contable','cmbid_documento_contable');

			$this->strAccionBusqueda='FK_Iddocumento_contable';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
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
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_ejercicioFK_Idejercicio=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idejercicio','cmbid_ejercicio');

			$this->strAccionBusqueda='FK_Idejercicio';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
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
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_empresaFK_Idempresa=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idempresa','cmbid_empresa');

			$this->strAccionBusqueda='FK_Idempresa';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_IdfuenteParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_fuenteFK_Idfuente=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idfuente','cmbid_fuente');

			$this->strAccionBusqueda='FK_Idfuente';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	public function getsFK_Idlibro_auxiliarParaProcesar($strNombreOpcionRetorno='')
	{
		try
		{
			

			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);

			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_libro_auxiliarFK_Idlibro_auxiliar=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idlibro_auxiliar','cmbid_libro_auxiliar');

			$this->strAccionBusqueda='FK_Idlibro_auxiliar';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
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
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_moduloFK_Idmodulo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idmodulo','cmbid_modulo');

			$this->strAccionBusqueda='FK_Idmodulo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
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
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_periodoFK_Idperiodo=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idperiodo','cmbid_periodo');

			$this->strAccionBusqueda='FK_Idperiodo';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
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
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_sucursalFK_Idsucursal=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idsucursal','cmbid_sucursal');

			$this->strAccionBusqueda='FK_Idsucursal';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
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
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			if($strNombreOpcionRetorno!=null && $strNombreOpcionRetorno!='') {
				$this->strNombreOpcionRetorno=$strNombreOpcionRetorno;
			}

			$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
			$this->intNumeroPaginacionPagina=0;			

			$this->id_usuarioFK_Idusuario=(int)$this->getDataCampoFormTabla(''.$this->strSufijo.'FK_Idusuario','cmbid_usuario');

			$this->strAccionBusqueda='FK_Idusuario';

			$this->procesarBusqueda($this->strAccionBusqueda);

			/*SOLO SI ES NECESARIO*/
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
		}
		catch(Exception $e)
		{
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}



	
	
	public function getsFK_Idcentro_costo($strFinalQuery,$id_centro_costo)
	{
		try
		{

			$this->asiento_predefinidoLogic->getsFK_Idcentro_costo($strFinalQuery,new Pagination(),$id_centro_costo);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Iddocumento_contable($strFinalQuery,$id_documento_contable)
	{
		try
		{

			$this->asiento_predefinidoLogic->getsFK_Iddocumento_contable($strFinalQuery,new Pagination(),$id_documento_contable);
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

			$this->asiento_predefinidoLogic->getsFK_Idejercicio($strFinalQuery,new Pagination(),$id_ejercicio);
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

			$this->asiento_predefinidoLogic->getsFK_Idempresa($strFinalQuery,new Pagination(),$id_empresa);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idfuente($strFinalQuery,$id_fuente)
	{
		try
		{

			$this->asiento_predefinidoLogic->getsFK_Idfuente($strFinalQuery,new Pagination(),$id_fuente);
		}
		catch(Exception $e)
		{
			throw $e;
		}
		
	}



	public function getsFK_Idlibro_auxiliar($strFinalQuery,$id_libro_auxiliar)
	{
		try
		{

			$this->asiento_predefinidoLogic->getsFK_Idlibro_auxiliar($strFinalQuery,new Pagination(),$id_libro_auxiliar);
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

			$this->asiento_predefinidoLogic->getsFK_Idmodulo($strFinalQuery,new Pagination(),$id_modulo);
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

			$this->asiento_predefinidoLogic->getsFK_Idperiodo($strFinalQuery,new Pagination(),$id_periodo);
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

			$this->asiento_predefinidoLogic->getsFK_Idsucursal($strFinalQuery,new Pagination(),$id_sucursal);
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

			$this->asiento_predefinidoLogic->getsFK_Idusuario($strFinalQuery,new Pagination(),$id_usuario);
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
			
			
			$asiento_predefinidoForeignKey=new asiento_predefinido_param_return(); //asiento_predefinidoForeignKey();
			
			$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));
						
			if($asiento_predefinido_session==null) {
				$asiento_predefinido_session=new asiento_predefinido_session();
			}
			
			
			/*PARA RECARGAR COMBOS*/
			if($this->strRecargarFkTipos!=null && $this->strRecargarFkTipos!='TODOS' && $this->strRecargarFkTipos!='') {
				$this->strRecargarFkQuery=' where '.$this->strRecargarFkColumna.'='.$this->intRecargarFkIdPadre;
			}
									
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {/*WithConnection*/
				$asiento_predefinidoForeignKey=$this->asiento_predefinidoLogic->cargarCombosLoteFK(
											$this->strRecargarFkTipos,$this->strRecargarFkQuery,$this->strRecargarFkColumna,$this->intRecargarFkIdPadre,$this->strRecargarFkTiposNinguno
											,$asiento_predefinido_session,$this->parametroGeneralUsuarioActual,$this->moduloActual,$this->arrDatoGeneral,$this->arrDatoGeneralNo);			
											
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
									
			}						
			
			
			


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_empresa',$this->strRecargarFkTipos,',')) {
				$this->empresasFK=$asiento_predefinidoForeignKey->empresasFK;
				$this->idempresaDefaultFK=$asiento_predefinidoForeignKey->idempresaDefaultFK;
			}

			if($asiento_predefinido_session->bitBusquedaDesdeFKSesionempresa) {
				$this->setVisibleBusquedasParaempresa(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_sucursal',$this->strRecargarFkTipos,',')) {
				$this->sucursalsFK=$asiento_predefinidoForeignKey->sucursalsFK;
				$this->idsucursalDefaultFK=$asiento_predefinidoForeignKey->idsucursalDefaultFK;
			}

			if($asiento_predefinido_session->bitBusquedaDesdeFKSesionsucursal) {
				$this->setVisibleBusquedasParasucursal(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_ejercicio',$this->strRecargarFkTipos,',')) {
				$this->ejerciciosFK=$asiento_predefinidoForeignKey->ejerciciosFK;
				$this->idejercicioDefaultFK=$asiento_predefinidoForeignKey->idejercicioDefaultFK;
			}

			if($asiento_predefinido_session->bitBusquedaDesdeFKSesionejercicio) {
				$this->setVisibleBusquedasParaejercicio(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_periodo',$this->strRecargarFkTipos,',')) {
				$this->periodosFK=$asiento_predefinidoForeignKey->periodosFK;
				$this->idperiodoDefaultFK=$asiento_predefinidoForeignKey->idperiodoDefaultFK;
			}

			if($asiento_predefinido_session->bitBusquedaDesdeFKSesionperiodo) {
				$this->setVisibleBusquedasParaperiodo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_usuario',$this->strRecargarFkTipos,',')) {
				$this->usuariosFK=$asiento_predefinidoForeignKey->usuariosFK;
				$this->idusuarioDefaultFK=$asiento_predefinidoForeignKey->idusuarioDefaultFK;
			}

			if($asiento_predefinido_session->bitBusquedaDesdeFKSesionusuario) {
				$this->setVisibleBusquedasParausuario(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_modulo',$this->strRecargarFkTipos,',')) {
				$this->modulosFK=$asiento_predefinidoForeignKey->modulosFK;
				$this->idmoduloDefaultFK=$asiento_predefinidoForeignKey->idmoduloDefaultFK;
			}

			if($asiento_predefinido_session->bitBusquedaDesdeFKSesionmodulo) {
				$this->setVisibleBusquedasParamodulo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_fuente',$this->strRecargarFkTipos,',')) {
				$this->fuentesFK=$asiento_predefinidoForeignKey->fuentesFK;
				$this->idfuenteDefaultFK=$asiento_predefinidoForeignKey->idfuenteDefaultFK;
			}

			if($asiento_predefinido_session->bitBusquedaDesdeFKSesionfuente) {
				$this->setVisibleBusquedasParafuente(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_libro_auxiliar',$this->strRecargarFkTipos,',')) {
				$this->libro_auxiliarsFK=$asiento_predefinidoForeignKey->libro_auxiliarsFK;
				$this->idlibro_auxiliarDefaultFK=$asiento_predefinidoForeignKey->idlibro_auxiliarDefaultFK;
			}

			if($asiento_predefinido_session->bitBusquedaDesdeFKSesionlibro_auxiliar) {
				$this->setVisibleBusquedasParalibro_auxiliar(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_centro_costo',$this->strRecargarFkTipos,',')) {
				$this->centro_costosFK=$asiento_predefinidoForeignKey->centro_costosFK;
				$this->idcentro_costoDefaultFK=$asiento_predefinidoForeignKey->idcentro_costoDefaultFK;
			}

			if($asiento_predefinido_session->bitBusquedaDesdeFKSesioncentro_costo) {
				$this->setVisibleBusquedasParacentro_costo(true);
			}


			if($this->strRecargarFkTipos=='TODOS' || Funciones::existeCadenaSplit('id_documento_contable',$this->strRecargarFkTipos,',')) {
				$this->documento_contablesFK=$asiento_predefinidoForeignKey->documento_contablesFK;
				$this->iddocumento_contableDefaultFK=$asiento_predefinidoForeignKey->iddocumento_contableDefaultFK;
			}

			if($asiento_predefinido_session->bitBusquedaDesdeFKSesiondocumento_contable) {
				$this->setVisibleBusquedasParadocumento_contable(true);
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
	
	function cargarCombosFKFromReturnGeneral($asiento_predefinidoReturnGeneral) {		
		
		try {
					
			$this->strRecargarFkTipos=$asiento_predefinidoReturnGeneral->strRecargarFkTipos;
			
			


			if($asiento_predefinidoReturnGeneral->con_empresasFK==true) {
				$this->empresasFK=$asiento_predefinidoReturnGeneral->empresasFK;
				$this->idempresaDefaultFK=$asiento_predefinidoReturnGeneral->idempresaDefaultFK;
			}


			if($asiento_predefinidoReturnGeneral->con_sucursalsFK==true) {
				$this->sucursalsFK=$asiento_predefinidoReturnGeneral->sucursalsFK;
				$this->idsucursalDefaultFK=$asiento_predefinidoReturnGeneral->idsucursalDefaultFK;
			}


			if($asiento_predefinidoReturnGeneral->con_ejerciciosFK==true) {
				$this->ejerciciosFK=$asiento_predefinidoReturnGeneral->ejerciciosFK;
				$this->idejercicioDefaultFK=$asiento_predefinidoReturnGeneral->idejercicioDefaultFK;
			}


			if($asiento_predefinidoReturnGeneral->con_periodosFK==true) {
				$this->periodosFK=$asiento_predefinidoReturnGeneral->periodosFK;
				$this->idperiodoDefaultFK=$asiento_predefinidoReturnGeneral->idperiodoDefaultFK;
			}


			if($asiento_predefinidoReturnGeneral->con_usuariosFK==true) {
				$this->usuariosFK=$asiento_predefinidoReturnGeneral->usuariosFK;
				$this->idusuarioDefaultFK=$asiento_predefinidoReturnGeneral->idusuarioDefaultFK;
			}


			if($asiento_predefinidoReturnGeneral->con_modulosFK==true) {
				$this->modulosFK=$asiento_predefinidoReturnGeneral->modulosFK;
				$this->idmoduloDefaultFK=$asiento_predefinidoReturnGeneral->idmoduloDefaultFK;
			}


			if($asiento_predefinidoReturnGeneral->con_fuentesFK==true) {
				$this->fuentesFK=$asiento_predefinidoReturnGeneral->fuentesFK;
				$this->idfuenteDefaultFK=$asiento_predefinidoReturnGeneral->idfuenteDefaultFK;
			}


			if($asiento_predefinidoReturnGeneral->con_libro_auxiliarsFK==true) {
				$this->libro_auxiliarsFK=$asiento_predefinidoReturnGeneral->libro_auxiliarsFK;
				$this->idlibro_auxiliarDefaultFK=$asiento_predefinidoReturnGeneral->idlibro_auxiliarDefaultFK;
			}


			if($asiento_predefinidoReturnGeneral->con_centro_costosFK==true) {
				$this->centro_costosFK=$asiento_predefinidoReturnGeneral->centro_costosFK;
				$this->idcentro_costoDefaultFK=$asiento_predefinidoReturnGeneral->idcentro_costoDefaultFK;
			}


			if($asiento_predefinidoReturnGeneral->con_documento_contablesFK==true) {
				$this->documento_contablesFK=$asiento_predefinidoReturnGeneral->documento_contablesFK;
				$this->iddocumento_contableDefaultFK=$asiento_predefinidoReturnGeneral->iddocumento_contableDefaultFK;
			}
					
		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}
	}
	
	public function cargarLinksPagination() {
		$this->cargarLinksPaginationBase(asiento_predefinido_util::$INT_NUMERO_PAGINACION);				
	}
	
	public function irAFkActual() : string {
		$strClavePaginaFk='null';
		
		
		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));
		
		if($asiento_predefinido_session->bitPermiteNavegacionHaciaFKDesde) {
			
			if($asiento_predefinido_session->getstrNombrePaginaNavegacionHaciaFKDesde()==empresa_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='empresa';
			}
			else if($asiento_predefinido_session->getstrNombrePaginaNavegacionHaciaFKDesde()==sucursal_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='sucursal';
			}
			else if($asiento_predefinido_session->getstrNombrePaginaNavegacionHaciaFKDesde()==ejercicio_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='ejercicio';
			}
			else if($asiento_predefinido_session->getstrNombrePaginaNavegacionHaciaFKDesde()==periodo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='periodo';
			}
			else if($asiento_predefinido_session->getstrNombrePaginaNavegacionHaciaFKDesde()==usuario_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='usuario';
			}
			else if($asiento_predefinido_session->getstrNombrePaginaNavegacionHaciaFKDesde()==modulo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='modulo';
			}
			else if($asiento_predefinido_session->getstrNombrePaginaNavegacionHaciaFKDesde()==fuente_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='fuente';
			}
			else if($asiento_predefinido_session->getstrNombrePaginaNavegacionHaciaFKDesde()==libro_auxiliar_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='libro_auxiliar';
			}
			else if($asiento_predefinido_session->getstrNombrePaginaNavegacionHaciaFKDesde()==centro_costo_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='centro_costo';
			}
			else if($asiento_predefinido_session->getstrNombrePaginaNavegacionHaciaFKDesde()==documento_contable_util::$STR_NOMBRE_OPCION) {
				$strClavePaginaFk='documento_contable';
			}
			
			$asiento_predefinido_session->bitPermiteNavegacionHaciaFKDesde=false;
		}
		
		
		return $strClavePaginaFk;
	}
	
	public function quitarElementosTabla() {		
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}						
			
			$this->asiento_predefinidosAuxiliar=array();
			
			$maxima_fila=$this->getDataMaximaFila();			
			
			if($maxima_fila!=null && $maxima_fila>0) {
				$this->asiento_predefinidosAuxiliar=$this->getsSeleccionados($maxima_fila);
			} else {
				$this->asiento_predefinidosAuxiliar=array();
			}
			
			if(count($this->asiento_predefinidosAuxiliar) > 0) {
				
				foreach ($this->asiento_predefinidosAuxiliar as $asiento_predefinidoSeleccionado) {
					$this->eliminarTablaBase($asiento_predefinidoSeleccionado->getId());
				}
				
			} else {
				throw new Exception("DEBE ESCOGER AL MENOS UN REGISTRO");
			}
			
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->saveGetSessionControllerAndPageAuxiliar(true);
			
			$this->returnHtml(true);	
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
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
			$tipoRelacionReporte->setsCodigo('asiento');
			$tipoRelacionReporte->setsDescripcion('Asientos');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;


			$tipoRelacionReporte=new Reporte();
			$tipoRelacionReporte->setsCodigo('asiento_predefinido_detalle');
			$tipoRelacionReporte->setsDescripcion('Detalle s');

			$arrTiposRelacionesReportes[]=$tipoRelacionReporte;
		}
		
		if($tipoRelacionReporte!=null);
		
		return $arrTiposRelacionesReportes;
	}	
	
	public function getClasesRelacionadas() : array {
		$arrNombresClasesRelacionadasLocal=array();
		
		
		$arrNombresClasesRelacionadasLocal[]=asiento_predefinido_detalle_util::$STR_NOMBRE_CLASE;
		$arrNombresClasesRelacionadasLocal[]=asiento_util::$STR_NOMBRE_CLASE;
		
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


	public function getfuentesFKListSelectItem() 
	{
		$fuentesList=array();

		$item=null;

		foreach($this->fuentesFK as $fuente)
		{
			$item=new SelectItem();
			$item->setLabel($fuente->getnombre());
			$item->setValue($fuente->getId());
			$fuentesList[]=$item;
		}

		return $fuentesList;
	}


	public function getlibro_auxiliarsFKListSelectItem() 
	{
		$libro_auxiliarsList=array();

		$item=null;

		foreach($this->libro_auxiliarsFK as $libro_auxiliar)
		{
			$item=new SelectItem();
			$item->setLabel($libro_auxiliar->getnombre());
			$item->setValue($libro_auxiliar->getId());
			$libro_auxiliarsList[]=$item;
		}

		return $libro_auxiliarsList;
	}


	public function getcentro_costosFKListSelectItem() 
	{
		$centro_costosList=array();

		$item=null;

		foreach($this->centro_costosFK as $centro_costo)
		{
			$item=new SelectItem();
			$item->setLabel($centro_costo->getnombre());
			$item->setValue($centro_costo->getId());
			$centro_costosList[]=$item;
		}

		return $centro_costosList;
	}


	public function getdocumento_contablesFKListSelectItem() 
	{
		$documento_contablesList=array();

		$item=null;

		foreach($this->documento_contablesFK as $documento_contable)
		{
			$item=new SelectItem();
			$item->setLabel($documento_contable->getnombre());
			$item->setValue($documento_contable->getId());
			$documento_contablesList[]=$item;
		}

		return $documento_contablesList;
	}


	
		
	
	public function seleccionarLoteFk(){
		try {
			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(false);
			
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->getNewConnexionToDeep();
			}

			$this->bitConEditar=true;
			
			/*
			$this->strAccionBusqueda='Todos';
			$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
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
				$this->asiento_predefinidoLogic->commitNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}


			/*SOLO SI ES NECESARIO*/
			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnHtml(true);
			
		} catch(Exception $e) {
			
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->rollbackNewConnexionToDeep();
				$this->asiento_predefinidoLogic->closeNewConnexionToDeep();
			}

			$this->manejarRetornarExcepcion($e);
		}
		
	}
	
	public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados){
		$existe=false;
		$existe_nuevos=false;
		$asiento_predefinidosNuevos=array();
		
		foreach($IdsFksSeleccionados as $idFkSeleccionado) {
			$existe=false;
			
			foreach($this->asiento_predefinidos as $asiento_predefinidoLocal) {
				if($asiento_predefinidoLocal->{$this->strNombreCampoBusqueda}==$idFkSeleccionado) {
					$existe=true;
					
					break;
				}
			}
			
			if(!$existe) {
				
				if(!$existe_nuevos) {
					$existe_nuevos=true;
				}
				
				$this->asiento_predefinido=new asiento_predefinido();
				
				$this->asiento_predefinido->{$this->strNombreCampoBusqueda}=$idFkSeleccionado;
				
				/*$this->asiento_predefinidos[]=$this->asiento_predefinido;*/
				
				$asiento_predefinidosNuevos[]=$this->asiento_predefinido;
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
				$class=new Classe('fuente');$classes[]=$class;
				$class=new Classe('libro_auxiliar');$classes[]=$class;
				$class=new Classe('centro_costo');$classes[]=$class;
				$class=new Classe('documento_contable');$classes[]=$class;
				
			if(Constantes::$BIT_USA_EJB_LOGIC_LAYER) {
				$this->asiento_predefinidoLogic->setasiento_predefinidos($asiento_predefinidosNuevos);
					
				$this->asiento_predefinidoLogic->deepLoads(false,DeepLoadType::$INCLUDE, $classes,'');/*WithConnection*/
				
				/*SE ADICIONAN NUEVOS*/
				foreach($asiento_predefinidosNuevos as $asiento_predefinidoNuevo) {
					$this->asiento_predefinidos[]=$asiento_predefinidoNuevo;
				}
				
				/*$this->asiento_predefinidos[]=$asiento_predefinidosNuevos;*/
				
				$this->asiento_predefinidoLogic->setasiento_predefinidos($this->asiento_predefinidos);
				
			} else if(Constantes::$BIT_USA_WEBSERVICE) {
				
			}
			
			if($classes!=null);
			
			if($class!=null);
		}
		
		if($asiento_predefinidosNuevos!=null);
	}
					
	
	public function cargarCombosempresasFK($connexion=null,$strRecargarFkQuery=''){
		$empresaLogic= new empresa_logic();
		$pagination= new Pagination();
		$this->empresasFK=array();

		$empresaLogic->setConnexion($connexion);
		$empresaLogic->getempresaDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionempresa!=true) {
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


			if($asiento_predefinido_session->bigidempresaActual!=null && $asiento_predefinido_session->bigidempresaActual > 0) {
				$empresaLogic->getEntity($asiento_predefinido_session->bigidempresaActual);//WithConnection

				$this->empresasFK[$empresaLogic->getempresa()->getId()]=asiento_predefinido_util::getempresaDescripcion($empresaLogic->getempresa());
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

		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionsucursal!=true) {
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


			if($asiento_predefinido_session->bigidsucursalActual!=null && $asiento_predefinido_session->bigidsucursalActual > 0) {
				$sucursalLogic->getEntity($asiento_predefinido_session->bigidsucursalActual);//WithConnection

				$this->sucursalsFK[$sucursalLogic->getsucursal()->getId()]=asiento_predefinido_util::getsucursalDescripcion($sucursalLogic->getsucursal());
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

		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionejercicio!=true) {
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


			if($asiento_predefinido_session->bigidejercicioActual!=null && $asiento_predefinido_session->bigidejercicioActual > 0) {
				$ejercicioLogic->getEntity($asiento_predefinido_session->bigidejercicioActual);//WithConnection

				$this->ejerciciosFK[$ejercicioLogic->getejercicio()->getId()]=asiento_predefinido_util::getejercicioDescripcion($ejercicioLogic->getejercicio());
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

		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionperiodo!=true) {
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


			if($asiento_predefinido_session->bigidperiodoActual!=null && $asiento_predefinido_session->bigidperiodoActual > 0) {
				$periodoLogic->getEntity($asiento_predefinido_session->bigidperiodoActual);//WithConnection

				$this->periodosFK[$periodoLogic->getperiodo()->getId()]=asiento_predefinido_util::getperiodoDescripcion($periodoLogic->getperiodo());
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

		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionusuario!=true) {
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


			if($asiento_predefinido_session->bigidusuarioActual!=null && $asiento_predefinido_session->bigidusuarioActual > 0) {
				$usuarioLogic->getEntity($asiento_predefinido_session->bigidusuarioActual);//WithConnection

				$this->usuariosFK[$usuarioLogic->getusuario()->getId()]=asiento_predefinido_util::getusuarioDescripcion($usuarioLogic->getusuario());
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

		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionmodulo!=true) {
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


			if($asiento_predefinido_session->bigidmoduloActual!=null && $asiento_predefinido_session->bigidmoduloActual > 0) {
				$moduloLogic->getEntity($asiento_predefinido_session->bigidmoduloActual);//WithConnection

				$this->modulosFK[$moduloLogic->getmodulo()->getId()]=asiento_predefinido_util::getmoduloDescripcion($moduloLogic->getmodulo());
				$this->idmoduloDefaultFK=$moduloLogic->getmodulo()->getId();
			}
		}
	}

	public function cargarCombosfuentesFK($connexion=null,$strRecargarFkQuery=''){
		$fuenteLogic= new fuente_logic();
		$pagination= new Pagination();
		$this->fuentesFK=array();

		$fuenteLogic->setConnexion($connexion);
		$fuenteLogic->getfuenteDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionfuente!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=fuente_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalfuente=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalfuente=Funciones::GetFinalQueryAppend($finalQueryGlobalfuente, '');
				$finalQueryGlobalfuente.=fuente_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalfuente.$strRecargarFkQuery;		

				$fuenteLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosfuentesFK($fuenteLogic->getfuentes());

		} else {
			$this->setVisibleBusquedasParafuente(true);


			if($asiento_predefinido_session->bigidfuenteActual!=null && $asiento_predefinido_session->bigidfuenteActual > 0) {
				$fuenteLogic->getEntity($asiento_predefinido_session->bigidfuenteActual);//WithConnection

				$this->fuentesFK[$fuenteLogic->getfuente()->getId()]=asiento_predefinido_util::getfuenteDescripcion($fuenteLogic->getfuente());
				$this->idfuenteDefaultFK=$fuenteLogic->getfuente()->getId();
			}
		}
	}

	public function cargarComboslibro_auxiliarsFK($connexion=null,$strRecargarFkQuery=''){
		$libro_auxiliarLogic= new libro_auxiliar_logic();
		$pagination= new Pagination();
		$this->libro_auxiliarsFK=array();

		$libro_auxiliarLogic->setConnexion($connexion);
		$libro_auxiliarLogic->getlibro_auxiliarDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionlibro_auxiliar!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=libro_auxiliar_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGloballibro_auxiliar=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGloballibro_auxiliar=Funciones::GetFinalQueryAppend($finalQueryGloballibro_auxiliar, '');
				$finalQueryGloballibro_auxiliar.=libro_auxiliar_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGloballibro_auxiliar.$strRecargarFkQuery;		

				$libro_auxiliarLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboslibro_auxiliarsFK($libro_auxiliarLogic->getlibro_auxiliars());

		} else {
			$this->setVisibleBusquedasParalibro_auxiliar(true);


			if($asiento_predefinido_session->bigidlibro_auxiliarActual!=null && $asiento_predefinido_session->bigidlibro_auxiliarActual > 0) {
				$libro_auxiliarLogic->getEntity($asiento_predefinido_session->bigidlibro_auxiliarActual);//WithConnection

				$this->libro_auxiliarsFK[$libro_auxiliarLogic->getlibro_auxiliar()->getId()]=asiento_predefinido_util::getlibro_auxiliarDescripcion($libro_auxiliarLogic->getlibro_auxiliar());
				$this->idlibro_auxiliarDefaultFK=$libro_auxiliarLogic->getlibro_auxiliar()->getId();
			}
		}
	}

	public function cargarComboscentro_costosFK($connexion=null,$strRecargarFkQuery=''){
		$centro_costoLogic= new centro_costo_logic();
		$pagination= new Pagination();
		$this->centro_costosFK=array();

		$centro_costoLogic->setConnexion($connexion);
		$centro_costoLogic->getcentro_costoDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesioncentro_costo!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=centro_costo_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobalcentro_costo=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobalcentro_costo=Funciones::GetFinalQueryAppend($finalQueryGlobalcentro_costo, '');
				$finalQueryGlobalcentro_costo.=centro_costo_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobalcentro_costo.$strRecargarFkQuery;		

				$centro_costoLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararComboscentro_costosFK($centro_costoLogic->getcentro_costos());

		} else {
			$this->setVisibleBusquedasParacentro_costo(true);


			if($asiento_predefinido_session->bigidcentro_costoActual!=null && $asiento_predefinido_session->bigidcentro_costoActual > 0) {
				$centro_costoLogic->getEntity($asiento_predefinido_session->bigidcentro_costoActual);//WithConnection

				$this->centro_costosFK[$centro_costoLogic->getcentro_costo()->getId()]=asiento_predefinido_util::getcentro_costoDescripcion($centro_costoLogic->getcentro_costo());
				$this->idcentro_costoDefaultFK=$centro_costoLogic->getcentro_costo()->getId();
			}
		}
	}

	public function cargarCombosdocumento_contablesFK($connexion=null,$strRecargarFkQuery=''){
		$documento_contableLogic= new documento_contable_logic();
		$pagination= new Pagination();
		$this->documento_contablesFK=array();

		$documento_contableLogic->setConnexion($connexion);
		$documento_contableLogic->getdocumento_contableDataAccess()->isForFKData=true;
		$bitUsaCache=false;

		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesiondocumento_contable!=true) {
			if(Constantes::$BIT_USA_CACHE==true) {
			}

			if ($bitUsaCache==false) {

				$this->arrDatoGeneral= array();
				$this->arrDatoGeneralNo= array();

				$arrColumnasGlobales=documento_contable_util::getArrayColumnasGlobales($this->arrDatoGeneral,$this->arrDatoGeneralNo);
				$finalQueryGlobaldocumento_contable=Funciones::GetWhereGlobalConstants($this->parametroGeneralUsuarioActual,$this->moduloActual,true,false,$arrColumnasGlobales);

				$finalQueryGlobaldocumento_contable=Funciones::GetFinalQueryAppend($finalQueryGlobaldocumento_contable, '');
				$finalQueryGlobaldocumento_contable.=documento_contable_util::$STR_FINAL_QUERY;
				$strRecargarFkQuery=$finalQueryGlobaldocumento_contable.$strRecargarFkQuery;		

				$documento_contableLogic->getTodos($strRecargarFkQuery,$pagination);//WithConnection

				if (Constantes::$BIT_USA_CACHE==true) {
				}
			} else {
			}


			$this->prepararCombosdocumento_contablesFK($documento_contableLogic->getdocumento_contables());

		} else {
			$this->setVisibleBusquedasParadocumento_contable(true);


			if($asiento_predefinido_session->bigiddocumento_contableActual!=null && $asiento_predefinido_session->bigiddocumento_contableActual > 0) {
				$documento_contableLogic->getEntity($asiento_predefinido_session->bigiddocumento_contableActual);//WithConnection

				$this->documento_contablesFK[$documento_contableLogic->getdocumento_contable()->getId()]=asiento_predefinido_util::getdocumento_contableDescripcion($documento_contableLogic->getdocumento_contable());
				$this->iddocumento_contableDefaultFK=$documento_contableLogic->getdocumento_contable()->getId();
			}
		}
	}

	
	
	public function prepararCombosempresasFK($empresas){

		foreach ($empresas as $empresaLocal ) {
			if($this->idempresaDefaultFK==0) {
				$this->idempresaDefaultFK=$empresaLocal->getId();
			}

			$this->empresasFK[$empresaLocal->getId()]=asiento_predefinido_util::getempresaDescripcion($empresaLocal);
		}
	}

	public function prepararCombossucursalsFK($sucursals){

		foreach ($sucursals as $sucursalLocal ) {
			if($this->idsucursalDefaultFK==0) {
				$this->idsucursalDefaultFK=$sucursalLocal->getId();
			}

			$this->sucursalsFK[$sucursalLocal->getId()]=asiento_predefinido_util::getsucursalDescripcion($sucursalLocal);
		}
	}

	public function prepararCombosejerciciosFK($ejercicios){

		foreach ($ejercicios as $ejercicioLocal ) {
			if($this->idejercicioDefaultFK==0) {
				$this->idejercicioDefaultFK=$ejercicioLocal->getId();
			}

			$this->ejerciciosFK[$ejercicioLocal->getId()]=asiento_predefinido_util::getejercicioDescripcion($ejercicioLocal);
		}
	}

	public function prepararCombosperiodosFK($periodos){

		foreach ($periodos as $periodoLocal ) {
			if($this->idperiodoDefaultFK==0) {
				$this->idperiodoDefaultFK=$periodoLocal->getId();
			}

			$this->periodosFK[$periodoLocal->getId()]=asiento_predefinido_util::getperiodoDescripcion($periodoLocal);
		}
	}

	public function prepararCombosusuariosFK($usuarios){

		foreach ($usuarios as $usuarioLocal ) {
			if($this->idusuarioDefaultFK==0) {
				$this->idusuarioDefaultFK=$usuarioLocal->getId();
			}

			$this->usuariosFK[$usuarioLocal->getId()]=asiento_predefinido_util::getusuarioDescripcion($usuarioLocal);
		}
	}

	public function prepararCombosmodulosFK($modulos){

		foreach ($modulos as $moduloLocal ) {
			if($this->idmoduloDefaultFK==0) {
				$this->idmoduloDefaultFK=$moduloLocal->getId();
			}

			$this->modulosFK[$moduloLocal->getId()]=asiento_predefinido_util::getmoduloDescripcion($moduloLocal);
		}
	}

	public function prepararCombosfuentesFK($fuentes){

		foreach ($fuentes as $fuenteLocal ) {
			if($this->idfuenteDefaultFK==0) {
				$this->idfuenteDefaultFK=$fuenteLocal->getId();
			}

			$this->fuentesFK[$fuenteLocal->getId()]=asiento_predefinido_util::getfuenteDescripcion($fuenteLocal);
		}
	}

	public function prepararComboslibro_auxiliarsFK($libro_auxiliars){

		foreach ($libro_auxiliars as $libro_auxiliarLocal ) {
			if($this->idlibro_auxiliarDefaultFK==0) {
				$this->idlibro_auxiliarDefaultFK=$libro_auxiliarLocal->getId();
			}

			$this->libro_auxiliarsFK[$libro_auxiliarLocal->getId()]=asiento_predefinido_util::getlibro_auxiliarDescripcion($libro_auxiliarLocal);
		}
	}

	public function prepararComboscentro_costosFK($centro_costos){

		foreach ($centro_costos as $centro_costoLocal ) {
			if($this->idcentro_costoDefaultFK==0) {
				$this->idcentro_costoDefaultFK=$centro_costoLocal->getId();
			}

			$this->centro_costosFK[$centro_costoLocal->getId()]=asiento_predefinido_util::getcentro_costoDescripcion($centro_costoLocal);
		}
	}

	public function prepararCombosdocumento_contablesFK($documento_contables){

		foreach ($documento_contables as $documento_contableLocal ) {
			if($this->iddocumento_contableDefaultFK==0) {
				$this->iddocumento_contableDefaultFK=$documento_contableLocal->getId();
			}

			$this->documento_contablesFK[$documento_contableLocal->getId()]=asiento_predefinido_util::getdocumento_contableDescripcion($documento_contableLocal);
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

			$strDescripcionempresa=asiento_predefinido_util::getempresaDescripcion($empresaLogic->getempresa());

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

			$strDescripcionsucursal=asiento_predefinido_util::getsucursalDescripcion($sucursalLogic->getsucursal());

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

			$strDescripcionejercicio=asiento_predefinido_util::getejercicioDescripcion($ejercicioLogic->getejercicio());

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

			$strDescripcionperiodo=asiento_predefinido_util::getperiodoDescripcion($periodoLogic->getperiodo());

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

			$strDescripcionusuario=asiento_predefinido_util::getusuarioDescripcion($usuarioLogic->getusuario());

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

			$strDescripcionmodulo=asiento_predefinido_util::getmoduloDescripcion($moduloLogic->getmodulo());

		} else {
			$strDescripcionmodulo='null';
		}

		return $strDescripcionmodulo;
	}

	public function cargarDescripcionfuenteFK($idfuente,$connexion=null){
		$fuenteLogic= new fuente_logic();
		$fuenteLogic->setConnexion($connexion);
		$fuenteLogic->getfuenteDataAccess()->isForFKData=true;
		$strDescripcionfuente='';

		if($idfuente!=null && $idfuente!='' && $idfuente!='null') {
			if($connexion!=null) {
				$fuenteLogic->getEntity($idfuente);//WithConnection
			} else {
				$fuenteLogic->getEntityWithConnection($idfuente);//
			}

			$strDescripcionfuente=asiento_predefinido_util::getfuenteDescripcion($fuenteLogic->getfuente());

		} else {
			$strDescripcionfuente='null';
		}

		return $strDescripcionfuente;
	}

	public function cargarDescripcionlibro_auxiliarFK($idlibro_auxiliar,$connexion=null){
		$libro_auxiliarLogic= new libro_auxiliar_logic();
		$libro_auxiliarLogic->setConnexion($connexion);
		$libro_auxiliarLogic->getlibro_auxiliarDataAccess()->isForFKData=true;
		$strDescripcionlibro_auxiliar='';

		if($idlibro_auxiliar!=null && $idlibro_auxiliar!='' && $idlibro_auxiliar!='null') {
			if($connexion!=null) {
				$libro_auxiliarLogic->getEntity($idlibro_auxiliar);//WithConnection
			} else {
				$libro_auxiliarLogic->getEntityWithConnection($idlibro_auxiliar);//
			}

			$strDescripcionlibro_auxiliar=asiento_predefinido_util::getlibro_auxiliarDescripcion($libro_auxiliarLogic->getlibro_auxiliar());

		} else {
			$strDescripcionlibro_auxiliar='null';
		}

		return $strDescripcionlibro_auxiliar;
	}

	public function cargarDescripcioncentro_costoFK($idcentro_costo,$connexion=null){
		$centro_costoLogic= new centro_costo_logic();
		$centro_costoLogic->setConnexion($connexion);
		$centro_costoLogic->getcentro_costoDataAccess()->isForFKData=true;
		$strDescripcioncentro_costo='';

		if($idcentro_costo!=null && $idcentro_costo!='' && $idcentro_costo!='null') {
			if($connexion!=null) {
				$centro_costoLogic->getEntity($idcentro_costo);//WithConnection
			} else {
				$centro_costoLogic->getEntityWithConnection($idcentro_costo);//
			}

			$strDescripcioncentro_costo=asiento_predefinido_util::getcentro_costoDescripcion($centro_costoLogic->getcentro_costo());

		} else {
			$strDescripcioncentro_costo='null';
		}

		return $strDescripcioncentro_costo;
	}

	public function cargarDescripciondocumento_contableFK($iddocumento_contable,$connexion=null){
		$documento_contableLogic= new documento_contable_logic();
		$documento_contableLogic->setConnexion($connexion);
		$documento_contableLogic->getdocumento_contableDataAccess()->isForFKData=true;
		$strDescripciondocumento_contable='';

		if($iddocumento_contable!=null && $iddocumento_contable!='' && $iddocumento_contable!='null') {
			if($connexion!=null) {
				$documento_contableLogic->getEntity($iddocumento_contable);//WithConnection
			} else {
				$documento_contableLogic->getEntityWithConnection($iddocumento_contable);//
			}

			$strDescripciondocumento_contable=asiento_predefinido_util::getdocumento_contableDescripcion($documento_contableLogic->getdocumento_contable());

		} else {
			$strDescripciondocumento_contable='null';
		}

		return $strDescripciondocumento_contable;
	}

	
	
	
	public function setVariablesGlobalesCombosFK(asiento_predefinido $asiento_predefinidoClase) {	
		try {
			if($this->parametroGeneralUsuarioActual!=null && $this->parametroGeneralUsuarioActual->getId()>0) {
			
				$asiento_predefinidoClase->setid_empresa($this->parametroGeneralUsuarioActual->getid_empresa());
				$asiento_predefinidoClase->setid_sucursal($this->parametroGeneralUsuarioActual->getid_sucursal());
				$asiento_predefinidoClase->setid_ejercicio($this->parametroGeneralUsuarioActual->getid_ejercicio());
				$asiento_predefinidoClase->setid_periodo($this->parametroGeneralUsuarioActual->getid_periodo());
				$asiento_predefinidoClase->setid_usuario($this->usuarioActual->getId());
			
			
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

		$this->strVisibleFK_Idcentro_costo=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Iddocumento_contable=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idempresa=$strParaVisibleempresa;
		$this->strVisibleFK_Idfuente=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idlibro_auxiliar=$strParaVisibleNegacionempresa;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionempresa;
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

		$this->strVisibleFK_Idcentro_costo=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Iddocumento_contable=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idfuente=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idlibro_auxiliar=$strParaVisibleNegacionsucursal;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionsucursal;
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

		$this->strVisibleFK_Idcentro_costo=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Iddocumento_contable=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idejercicio=$strParaVisibleejercicio;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idfuente=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idlibro_auxiliar=$strParaVisibleNegacionejercicio;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionejercicio;
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

		$this->strVisibleFK_Idcentro_costo=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Iddocumento_contable=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idfuente=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idlibro_auxiliar=$strParaVisibleNegacionperiodo;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionperiodo;
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

		$this->strVisibleFK_Idcentro_costo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Iddocumento_contable=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idfuente=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idlibro_auxiliar=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionusuario;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionusuario;
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

		$this->strVisibleFK_Idcentro_costo=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Iddocumento_contable=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idfuente=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idlibro_auxiliar=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idmodulo=$strParaVisiblemodulo;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionmodulo;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionmodulo;
	}

	public function setVisibleBusquedasParafuente($isParafuente){
		$strParaVisiblefuente='display:table-row';
		$strParaVisibleNegacionfuente='display:none';

		if($isParafuente) {
			$strParaVisiblefuente='display:table-row';
			$strParaVisibleNegacionfuente='display:none';
		} else {
			$strParaVisiblefuente='display:none';
			$strParaVisibleNegacionfuente='display:table-row';
		}


		$strParaVisibleNegacionfuente=trim($strParaVisibleNegacionfuente);

		$this->strVisibleFK_Idcentro_costo=$strParaVisibleNegacionfuente;
		$this->strVisibleFK_Iddocumento_contable=$strParaVisibleNegacionfuente;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionfuente;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionfuente;
		$this->strVisibleFK_Idfuente=$strParaVisiblefuente;
		$this->strVisibleFK_Idlibro_auxiliar=$strParaVisibleNegacionfuente;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionfuente;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionfuente;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionfuente;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionfuente;
	}

	public function setVisibleBusquedasParalibro_auxiliar($isParalibro_auxiliar){
		$strParaVisiblelibro_auxiliar='display:table-row';
		$strParaVisibleNegacionlibro_auxiliar='display:none';

		if($isParalibro_auxiliar) {
			$strParaVisiblelibro_auxiliar='display:table-row';
			$strParaVisibleNegacionlibro_auxiliar='display:none';
		} else {
			$strParaVisiblelibro_auxiliar='display:none';
			$strParaVisibleNegacionlibro_auxiliar='display:table-row';
		}


		$strParaVisibleNegacionlibro_auxiliar=trim($strParaVisibleNegacionlibro_auxiliar);

		$this->strVisibleFK_Idcentro_costo=$strParaVisibleNegacionlibro_auxiliar;
		$this->strVisibleFK_Iddocumento_contable=$strParaVisibleNegacionlibro_auxiliar;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacionlibro_auxiliar;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacionlibro_auxiliar;
		$this->strVisibleFK_Idfuente=$strParaVisibleNegacionlibro_auxiliar;
		$this->strVisibleFK_Idlibro_auxiliar=$strParaVisiblelibro_auxiliar;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacionlibro_auxiliar;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacionlibro_auxiliar;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacionlibro_auxiliar;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacionlibro_auxiliar;
	}

	public function setVisibleBusquedasParacentro_costo($isParacentro_costo){
		$strParaVisiblecentro_costo='display:table-row';
		$strParaVisibleNegacioncentro_costo='display:none';

		if($isParacentro_costo) {
			$strParaVisiblecentro_costo='display:table-row';
			$strParaVisibleNegacioncentro_costo='display:none';
		} else {
			$strParaVisiblecentro_costo='display:none';
			$strParaVisibleNegacioncentro_costo='display:table-row';
		}


		$strParaVisibleNegacioncentro_costo=trim($strParaVisibleNegacioncentro_costo);

		$this->strVisibleFK_Idcentro_costo=$strParaVisiblecentro_costo;
		$this->strVisibleFK_Iddocumento_contable=$strParaVisibleNegacioncentro_costo;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegacioncentro_costo;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegacioncentro_costo;
		$this->strVisibleFK_Idfuente=$strParaVisibleNegacioncentro_costo;
		$this->strVisibleFK_Idlibro_auxiliar=$strParaVisibleNegacioncentro_costo;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegacioncentro_costo;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegacioncentro_costo;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegacioncentro_costo;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegacioncentro_costo;
	}

	public function setVisibleBusquedasParadocumento_contable($isParadocumento_contable){
		$strParaVisibledocumento_contable='display:table-row';
		$strParaVisibleNegaciondocumento_contable='display:none';

		if($isParadocumento_contable) {
			$strParaVisibledocumento_contable='display:table-row';
			$strParaVisibleNegaciondocumento_contable='display:none';
		} else {
			$strParaVisibledocumento_contable='display:none';
			$strParaVisibleNegaciondocumento_contable='display:table-row';
		}


		$strParaVisibleNegaciondocumento_contable=trim($strParaVisibleNegaciondocumento_contable);

		$this->strVisibleFK_Idcentro_costo=$strParaVisibleNegaciondocumento_contable;
		$this->strVisibleFK_Iddocumento_contable=$strParaVisibledocumento_contable;
		$this->strVisibleFK_Idejercicio=$strParaVisibleNegaciondocumento_contable;
		$this->strVisibleFK_Idempresa=$strParaVisibleNegaciondocumento_contable;
		$this->strVisibleFK_Idfuente=$strParaVisibleNegaciondocumento_contable;
		$this->strVisibleFK_Idlibro_auxiliar=$strParaVisibleNegaciondocumento_contable;
		$this->strVisibleFK_Idmodulo=$strParaVisibleNegaciondocumento_contable;
		$this->strVisibleFK_Idperiodo=$strParaVisibleNegaciondocumento_contable;
		$this->strVisibleFK_Idsucursal=$strParaVisibleNegaciondocumento_contable;
		$this->strVisibleFK_Idusuario=$strParaVisibleNegaciondocumento_contable;
	}
	
	

	public function abrirBusquedaParaempresa() {//$idasiento_predefinidoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_predefinidoActual=$idasiento_predefinidoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.empresa_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',empresa_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_empresa(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(empresa_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_predefinido,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParasucursal() {//$idasiento_predefinidoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_predefinidoActual=$idasiento_predefinidoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.sucursal_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',sucursal_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_sucursal(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(sucursal_util::$STR_CLASS_NAME,'general','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_predefinido,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaejercicio() {//$idasiento_predefinidoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_predefinidoActual=$idasiento_predefinidoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.ejercicio_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',ejercicio_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_ejercicio(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(ejercicio_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_predefinido,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParaperiodo() {//$idasiento_predefinidoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_predefinidoActual=$idasiento_predefinidoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.periodo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',periodo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_periodo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(periodo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_predefinido,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParausuario() {//$idasiento_predefinidoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_predefinidoActual=$idasiento_predefinidoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.usuario_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',usuario_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_usuario(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(usuario_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_predefinido,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParamodulo() {//$idasiento_predefinidoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_predefinidoActual=$idasiento_predefinidoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.modulo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_modulo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',modulo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_modulo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(modulo_util::$STR_CLASS_NAME,'seguridad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_predefinido,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParafuente() {//$idasiento_predefinidoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_predefinidoActual=$idasiento_predefinidoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.fuente_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_fuente(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',fuente_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_fuente(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(fuente_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_predefinido,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParalibro_auxiliar() {//$idasiento_predefinidoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_predefinidoActual=$idasiento_predefinidoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.libro_auxiliar_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_libro_auxiliar(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',libro_auxiliar_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_libro_auxiliar(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(libro_auxiliar_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_predefinido,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParacentro_costo() {//$idasiento_predefinidoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_predefinidoActual=$idasiento_predefinidoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.centro_costo_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_centro_costo(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',centro_costo_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_centro_costo(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(centro_costo_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_predefinido,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}

	public function abrirBusquedaParadocumento_contable() {//$idasiento_predefinidoActual=0
		$this->saveGetSessionControllerAndPageAuxiliar(false);

		//$this->idasiento_predefinidoActual=$idasiento_predefinidoActual;

		try {

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		//1-ANTERIOR,2-PROPUESTO
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.Constantes::$STRCARPETAPAGINAS.'/'.documento_contable_util::$STR_NOMBRE_OPCION.'/index/onload_busqueda/iframe/none/search/true/true/0/window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_documento_contable(TO_REPLACE);';
		//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',documento_contable_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);

		$strFuncionJavaScriptFinal='window.opener.asiento_predefinidoJQueryPaginaWebInteraccion.setCombosCodigoDesdeBusquedaid_documento_contable(TO_REPLACE);';

		$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(documento_contable_util::$STR_CLASS_NAME,'contabilidad','','POPUP','iframe',$this->strTipoUsuarioAuxiliarasiento_predefinido,true,$strFuncionJavaScriptFinal,'index',null);

		$this->strAuxiliarTipo='POPUP';

		//$this->returnAjax();
	}
	
	

	public function registrarSesionParaasiento_predefinido_detalles(int $idasiento_predefinidoActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idasiento_predefinidoActual=$idasiento_predefinidoActual;

		$bitPaginaPopupasiento_predefinido_detalle=false;

		try {

			$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

			if($asiento_predefinido_session==null) {
				$asiento_predefinido_session=new asiento_predefinido_session();
			}

			$asiento_predefinido_detalle_session=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME));

			if($asiento_predefinido_detalle_session==null) {
				$asiento_predefinido_detalle_session=new asiento_predefinido_detalle_session();
			}

			$asiento_predefinido_detalle_session->strUltimaBusqueda='FK_Idasiento_predefinido';
			$asiento_predefinido_detalle_session->strPathNavegacionActual=$asiento_predefinido_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.asiento_predefinido_detalle_util::$STR_CLASS_WEB_TITULO;
			$asiento_predefinido_detalle_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupasiento_predefinido_detalle=$asiento_predefinido_detalle_session->bitPaginaPopup;
			$asiento_predefinido_detalle_session->setPaginaPopupVariables(true);
			$bitPaginaPopupasiento_predefinido_detalle=$asiento_predefinido_detalle_session->bitPaginaPopup;
			$asiento_predefinido_detalle_session->bitPermiteNavegacionHaciaFKDesde=false;
			$asiento_predefinido_detalle_session->strNombrePaginaNavegacionHaciaFKDesde=asiento_predefinido_util::$STR_NOMBRE_OPCION;
			$asiento_predefinido_detalle_session->bitBusquedaDesdeFKSesionasiento_predefinido=true;
			$asiento_predefinido_detalle_session->bigidasiento_predefinidoActual=$this->idasiento_predefinidoActual;

			$asiento_predefinido_session->bitBusquedaDesdeFKSesionFK=true;
			$asiento_predefinido_session->bigIdActualFK=$this->idasiento_predefinidoActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"asiento_predefinido_detalle"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=asiento_predefinido_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"asiento_predefinido_detalle"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(asiento_predefinido_util::$STR_SESSION_NAME,serialize($asiento_predefinido_session));
			$this->Session->write(asiento_predefinido_detalle_util::$STR_SESSION_NAME,serialize($asiento_predefinido_detalle_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupasiento_predefinido_detalle!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_predefinido_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_predefinido_detalle_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarasiento_predefinido,$this->strTipoUsuarioAuxiliarasiento_predefinido,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_predefinido_detalle_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_predefinido_detalle_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarasiento_predefinido,$this->strTipoUsuarioAuxiliarasiento_predefinido,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}

	public function registrarSesionParaasientos(int $idasiento_predefinidoActual=null,bool $es_guardar_relaciones=false) {

		if(!$es_guardar_relaciones) {
			$this->saveGetSessionControllerAndPageAuxiliar(false);

		}

		$this->strVisibleTablaAccionesRelaciones='none';

		$this->idasiento_predefinidoActual=$idasiento_predefinidoActual;

		$bitPaginaPopupasiento=false;

		try {

			$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));

			if($asiento_predefinido_session==null) {
				$asiento_predefinido_session=new asiento_predefinido_session();
			}

			$asiento_session=unserialize($this->Session->read(asiento_util::$STR_SESSION_NAME));

			if($asiento_session==null) {
				$asiento_session=new asiento_session();
			}

			$asiento_session->strUltimaBusqueda='FK_Idasiento_predefinido';
			$asiento_session->strPathNavegacionActual=$asiento_predefinido_session->strPathNavegacionActual.Constantes::$STR_HTML_FLECHA.asiento_util::$STR_CLASS_WEB_TITULO;
			$asiento_session->strPermiteRecargarInformacion='display:none';
			//$bitPaginaPopupasiento=$asiento_session->bitPaginaPopup;
			$asiento_session->setPaginaPopupVariables(true);
			$bitPaginaPopupasiento=$asiento_session->bitPaginaPopup;
			$asiento_session->bitPermiteNavegacionHaciaFKDesde=false;
			$asiento_session->strNombrePaginaNavegacionHaciaFKDesde=asiento_predefinido_util::$STR_NOMBRE_OPCION;
			$asiento_session->bitBusquedaDesdeFKSesionasiento_predefinido=true;
			$asiento_session->bigidasiento_predefinidoActual=$this->idasiento_predefinidoActual;

			$asiento_predefinido_session->bitBusquedaDesdeFKSesionFK=true;
			$asiento_predefinido_session->bigIdActualFK=$this->idasiento_predefinidoActual;

			$this->strAuxiliarUrlPagina=Constantes::$STR_NONE;

			//$this->sistemaLogicAdditional=new sistema_logic_add();

			//if($this->sistemaLogicAdditional->tienePermisosEnPaginaWeb($this->usuarioActual, Constantes::$LIDSISTEMAACTUAL, Constantes::$STRPREFIJOARCHIVOJSP+"asiento"+Constantes::$STREXTENSIONARCHIVOJSP)) {
				//$this->strAuxiliarUrlPagina=asiento_predefinido_util::$STR_RELATIVE_PATH + Constantes::$STRCARPETAPAGINAS+"/"+""+Constantes::$STRPREFIJOARCHIVOJSP+"asiento"+Constantes::$STREXTENSIONARCHIVOJSP;
			//}

			$this->Session->write(asiento_predefinido_util::$STR_SESSION_NAME,serialize($asiento_predefinido_session));
			$this->Session->write(asiento_util::$STR_SESSION_NAME,serialize($asiento_session));

			$this->guardarDatosBusquedaSession();

		} catch(Exception $e) {
			$this->manejarRetornarExcepcion($e);
		}

		if($bitPaginaPopupasiento!=false) {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_util::$STR_CLASS_NAME,'contabilidad','','POPUP',$this->strTipoPaginaAuxiliarasiento_predefinido,$this->strTipoUsuarioAuxiliarasiento_predefinido,false,'','index',null);
			$this->strAuxiliarTipo='POPUP';
		} else {
			//$this->strAuxiliarUrlPagina=Constantes::$STRHTTPINIT.Constantes::$STRDNSNAMESERVER.':'.Constantes::$STRPORTSERVER.'/'.Constantes::$STRCONTEXTSERVER.'/'.str_replace('TOREPLACE',asiento_util::$STR_CLASS_NAME,Constantes::$STRCARPETAPAGINASJQUERYTOREPLACE);
			$this->strAuxiliarUrlPagina=Funciones::getUrlParametrosPaginaHijo(asiento_util::$STR_CLASS_NAME,'contabilidad','','NO-POPUP',$this->strTipoPaginaAuxiliarasiento_predefinido,$this->strTipoUsuarioAuxiliarasiento_predefinido,false,'','index',null);
			$this->strAuxiliarTipo='NO-POPUP';
		}


		if(!$es_guardar_relaciones) {

			$this->saveGetSessionControllerAndPageAuxiliar(true);

			$this->returnAjax();
		}
	}
	
	public function eliminarVariablesDeSesion() {
		$this->eliminarVariablesDeSesionBase(asiento_predefinido_util::$STR_SESSION_NAME,asiento_predefinido_util::$STR_SESSION_CONTROLLER_NAME);
	}
	
	/*NO VALE ESTA POR TALVEZ*/
	public function inicializarSession() {
		/*
		$asiento_predefinido_session=$this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME);
				
		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();		
			//$this->Session->write('asiento_predefinido_session',$asiento_predefinido_session);							
		}
		*/
		
		$asiento_predefinido_session=new asiento_predefinido_session();
    	$asiento_predefinido_session->strPathNavegacionActual=asiento_predefinido_util::$STR_CLASS_WEB_TITULO;
    	$asiento_predefinido_session->strPermiteRecargarInformacion='display:table-row';
		
		/*FALTA ADMINISTRAR SESSION RELACIONAS (POR TANTO FALTARIA IMPORTS USE), PONER DE ALGUNA MANERA EN UNA FUNCION GENERAL*/
		
		$this->Session->write(asiento_predefinido_util::$STR_SESSION_NAME,serialize($asiento_predefinido_session));		
	}	
	
	public function getSetBusquedasSesionConfig(asiento_predefinido_session $asiento_predefinido_session) : bool {
		$existe_history=false;
		$historyWeb=new HistoryWeb();
		
		if($asiento_predefinido_session->bitBusquedaDesdeFKSesionFK!=null && $asiento_predefinido_session->bitBusquedaDesdeFKSesionFK==true) {
			if($asiento_predefinido_session->bigIdActualFK!=null && $asiento_predefinido_session->bigIdActualFK!=0)	{
				/*//BYDAN-TOUPDATE
				//AL IR A HIJOS SE PONE true Y AL RECARGAR TRATA DE CARGAR POR ID (ESTA MAL YA QUE PUEDE SER BUSQUEDA POR TODOS)
				$this->strAccionBusqueda='PorId';
					$asiento_predefinido_session->bigIdActualFKParaPosibleAtras=$asiento_predefinido_session->bigIdActualFK;*/
			}
				
			$asiento_predefinido_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras=true;
				
		} /*else if($httpServletRequest->getParameter('esCargarPagina')==null&&$asiento_predefinido_session->bitBusquedaDesdeFKSesionFKParaPosibleAtras) {
			if(asiento_predefinido_session->bigIdActualFKParaPosibleAtras!=0)	{
				$this->strAccionBusqueda='PorId';					
			}				
				
		}*/
						
		
			else if($asiento_predefinido_session->bitBusquedaDesdeFKSesionempresa!=null && $asiento_predefinido_session->bitBusquedaDesdeFKSesionempresa==true)
			{
				if($asiento_predefinido_session->bigidempresaActual!=0) {
					$this->strAccionBusqueda='FK_Idempresa';

					$existe_history=HistoryWeb::ExisteElemento(asiento_predefinido_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_predefinido_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_predefinido_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_predefinido_session->bigidempresaActualDescripcion);
						$historyWeb->setIdActual($asiento_predefinido_session->bigidempresaActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_predefinido_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_predefinido_session->bigidempresaActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_predefinido_session->bitBusquedaDesdeFKSesionempresa=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;

				if($asiento_predefinido_session->intNumeroPaginacion==asiento_predefinido_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_predefinido_session->intNumeroPaginacion;
				}
			}
			else if($asiento_predefinido_session->bitBusquedaDesdeFKSesionsucursal!=null && $asiento_predefinido_session->bitBusquedaDesdeFKSesionsucursal==true)
			{
				if($asiento_predefinido_session->bigidsucursalActual!=0) {
					$this->strAccionBusqueda='FK_Idsucursal';

					$existe_history=HistoryWeb::ExisteElemento(asiento_predefinido_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_predefinido_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_predefinido_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_predefinido_session->bigidsucursalActualDescripcion);
						$historyWeb->setIdActual($asiento_predefinido_session->bigidsucursalActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_predefinido_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_predefinido_session->bigidsucursalActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_predefinido_session->bitBusquedaDesdeFKSesionsucursal=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;

				if($asiento_predefinido_session->intNumeroPaginacion==asiento_predefinido_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_predefinido_session->intNumeroPaginacion;
				}
			}
			else if($asiento_predefinido_session->bitBusquedaDesdeFKSesionejercicio!=null && $asiento_predefinido_session->bitBusquedaDesdeFKSesionejercicio==true)
			{
				if($asiento_predefinido_session->bigidejercicioActual!=0) {
					$this->strAccionBusqueda='FK_Idejercicio';

					$existe_history=HistoryWeb::ExisteElemento(asiento_predefinido_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_predefinido_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_predefinido_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_predefinido_session->bigidejercicioActualDescripcion);
						$historyWeb->setIdActual($asiento_predefinido_session->bigidejercicioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_predefinido_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_predefinido_session->bigidejercicioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_predefinido_session->bitBusquedaDesdeFKSesionejercicio=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;

				if($asiento_predefinido_session->intNumeroPaginacion==asiento_predefinido_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_predefinido_session->intNumeroPaginacion;
				}
			}
			else if($asiento_predefinido_session->bitBusquedaDesdeFKSesionperiodo!=null && $asiento_predefinido_session->bitBusquedaDesdeFKSesionperiodo==true)
			{
				if($asiento_predefinido_session->bigidperiodoActual!=0) {
					$this->strAccionBusqueda='FK_Idperiodo';

					$existe_history=HistoryWeb::ExisteElemento(asiento_predefinido_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_predefinido_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_predefinido_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_predefinido_session->bigidperiodoActualDescripcion);
						$historyWeb->setIdActual($asiento_predefinido_session->bigidperiodoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_predefinido_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_predefinido_session->bigidperiodoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_predefinido_session->bitBusquedaDesdeFKSesionperiodo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;

				if($asiento_predefinido_session->intNumeroPaginacion==asiento_predefinido_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_predefinido_session->intNumeroPaginacion;
				}
			}
			else if($asiento_predefinido_session->bitBusquedaDesdeFKSesionusuario!=null && $asiento_predefinido_session->bitBusquedaDesdeFKSesionusuario==true)
			{
				if($asiento_predefinido_session->bigidusuarioActual!=0) {
					$this->strAccionBusqueda='FK_Idusuario';

					$existe_history=HistoryWeb::ExisteElemento(asiento_predefinido_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_predefinido_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_predefinido_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_predefinido_session->bigidusuarioActualDescripcion);
						$historyWeb->setIdActual($asiento_predefinido_session->bigidusuarioActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_predefinido_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_predefinido_session->bigidusuarioActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_predefinido_session->bitBusquedaDesdeFKSesionusuario=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;

				if($asiento_predefinido_session->intNumeroPaginacion==asiento_predefinido_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_predefinido_session->intNumeroPaginacion;
				}
			}
			else if($asiento_predefinido_session->bitBusquedaDesdeFKSesionmodulo!=null && $asiento_predefinido_session->bitBusquedaDesdeFKSesionmodulo==true)
			{
				if($asiento_predefinido_session->bigidmoduloActual!=0) {
					$this->strAccionBusqueda='FK_Idmodulo';

					$existe_history=HistoryWeb::ExisteElemento(asiento_predefinido_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_predefinido_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_predefinido_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_predefinido_session->bigidmoduloActualDescripcion);
						$historyWeb->setIdActual($asiento_predefinido_session->bigidmoduloActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_predefinido_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_predefinido_session->bigidmoduloActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_predefinido_session->bitBusquedaDesdeFKSesionmodulo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;

				if($asiento_predefinido_session->intNumeroPaginacion==asiento_predefinido_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_predefinido_session->intNumeroPaginacion;
				}
			}
			else if($asiento_predefinido_session->bitBusquedaDesdeFKSesionfuente!=null && $asiento_predefinido_session->bitBusquedaDesdeFKSesionfuente==true)
			{
				if($asiento_predefinido_session->bigidfuenteActual!=0) {
					$this->strAccionBusqueda='FK_Idfuente';

					$existe_history=HistoryWeb::ExisteElemento(asiento_predefinido_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_predefinido_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_predefinido_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_predefinido_session->bigidfuenteActualDescripcion);
						$historyWeb->setIdActual($asiento_predefinido_session->bigidfuenteActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_predefinido_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_predefinido_session->bigidfuenteActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_predefinido_session->bitBusquedaDesdeFKSesionfuente=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;

				if($asiento_predefinido_session->intNumeroPaginacion==asiento_predefinido_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_predefinido_session->intNumeroPaginacion;
				}
			}
			else if($asiento_predefinido_session->bitBusquedaDesdeFKSesionlibro_auxiliar!=null && $asiento_predefinido_session->bitBusquedaDesdeFKSesionlibro_auxiliar==true)
			{
				if($asiento_predefinido_session->bigidlibro_auxiliarActual!=0) {
					$this->strAccionBusqueda='FK_Idlibro_auxiliar';

					$existe_history=HistoryWeb::ExisteElemento(asiento_predefinido_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_predefinido_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_predefinido_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_predefinido_session->bigidlibro_auxiliarActualDescripcion);
						$historyWeb->setIdActual($asiento_predefinido_session->bigidlibro_auxiliarActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_predefinido_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_predefinido_session->bigidlibro_auxiliarActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_predefinido_session->bitBusquedaDesdeFKSesionlibro_auxiliar=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;

				if($asiento_predefinido_session->intNumeroPaginacion==asiento_predefinido_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_predefinido_session->intNumeroPaginacion;
				}
			}
			else if($asiento_predefinido_session->bitBusquedaDesdeFKSesioncentro_costo!=null && $asiento_predefinido_session->bitBusquedaDesdeFKSesioncentro_costo==true)
			{
				if($asiento_predefinido_session->bigidcentro_costoActual!=0) {
					$this->strAccionBusqueda='FK_Idcentro_costo';

					$existe_history=HistoryWeb::ExisteElemento(asiento_predefinido_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_predefinido_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_predefinido_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_predefinido_session->bigidcentro_costoActualDescripcion);
						$historyWeb->setIdActual($asiento_predefinido_session->bigidcentro_costoActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_predefinido_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_predefinido_session->bigidcentro_costoActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_predefinido_session->bitBusquedaDesdeFKSesioncentro_costo=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;

				if($asiento_predefinido_session->intNumeroPaginacion==asiento_predefinido_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_predefinido_session->intNumeroPaginacion;
				}
			}
			else if($asiento_predefinido_session->bitBusquedaDesdeFKSesiondocumento_contable!=null && $asiento_predefinido_session->bitBusquedaDesdeFKSesiondocumento_contable==true)
			{
				if($asiento_predefinido_session->bigiddocumento_contableActual!=0) {
					$this->strAccionBusqueda='FK_Iddocumento_contable';

					$existe_history=HistoryWeb::ExisteElemento(asiento_predefinido_util::$STR_CLASS_NAME,$this->arrHistoryWebs);

					if(!$existe_history && !$this->bitEsPopup) {
						$historyWeb=new HistoryWeb();

						$historyWeb->setStrCodigo(asiento_predefinido_util::$STR_NOMBRE_OPCION);
						$historyWeb->setStrNombre(asiento_predefinido_util::$STR_CLASS_WEB_TITULO);
						$historyWeb->setstrNombreElemento($asiento_predefinido_session->bigiddocumento_contableActualDescripcion);
						$historyWeb->setIdActual($asiento_predefinido_session->bigiddocumento_contableActual);

						$this->arrHistoryWebs[]=$historyWeb;
					}

					if($this->bitEsPopup) {
						$this->strHistoryWebAuxiliar=asiento_predefinido_util::$STR_CLASS_WEB_TITULO;
						$this->strHistoryWebElementoAuxiliar=$asiento_predefinido_session->bigiddocumento_contableActualDescripcion;
					}
				}

				//PARA HABILITAR REGRESAR
				//$asiento_predefinido_session->bitBusquedaDesdeFKSesiondocumento_contable=false;

				$this->intNumeroPaginacionPagina=0;

				//$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;

				if($asiento_predefinido_session->intNumeroPaginacion==asiento_predefinido_util::$INT_NUMERO_PAGINACION) {
					$this->intNumeroPaginacion=asiento_predefinido_util::$INT_NUMERO_PAGINACION;
				} else {
					$this->intNumeroPaginacion=$asiento_predefinido_session->intNumeroPaginacion;
				}
			}
			
		/*
		if($httpServletRequest->getParameter('ultimaBusqueda')!=null)	{
			$this->sUltimaBusqueda=$httpServletRequest->getParameter('ultimaBusqueda');
			$asiento_predefinido_session->sUltimaBusqueda=$this->sUltimaBusqueda;
		}
		*/
		
		if($historyWeb!=null);
		
		return $existe_history;
	}
	
	public function guardarDatosBusquedaSession() {
		
		$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));
		
		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		$asiento_predefinido_session->strUltimaBusqueda=$this->strAccionBusqueda;
		$asiento_predefinido_session->intNumeroPaginacion=$this->intNumeroPaginacion;
		$asiento_predefinido_session->intNumeroPaginacionPagina=$this->intNumeroPaginacionPagina;
		
		if($this->strAccionBusqueda=='Todos') {;}
		

		else if($this->strAccionBusqueda=='FK_Idcentro_costo') {
			$asiento_predefinido_session->id_centro_costo=$this->id_centro_costoFK_Idcentro_costo;	

		}
		else if($this->strAccionBusqueda=='FK_Iddocumento_contable') {
			$asiento_predefinido_session->id_documento_contable=$this->id_documento_contableFK_Iddocumento_contable;	

		}
		else if($this->strAccionBusqueda=='FK_Idejercicio') {
			$asiento_predefinido_session->id_ejercicio=$this->id_ejercicioFK_Idejercicio;	

		}
		else if($this->strAccionBusqueda=='FK_Idempresa') {
			$asiento_predefinido_session->id_empresa=$this->id_empresaFK_Idempresa;	

		}
		else if($this->strAccionBusqueda=='FK_Idfuente') {
			$asiento_predefinido_session->id_fuente=$this->id_fuenteFK_Idfuente;	

		}
		else if($this->strAccionBusqueda=='FK_Idlibro_auxiliar') {
			$asiento_predefinido_session->id_libro_auxiliar=$this->id_libro_auxiliarFK_Idlibro_auxiliar;	

		}
		else if($this->strAccionBusqueda=='FK_Idmodulo') {
			$asiento_predefinido_session->id_modulo=$this->id_moduloFK_Idmodulo;	

		}
		else if($this->strAccionBusqueda=='FK_Idperiodo') {
			$asiento_predefinido_session->id_periodo=$this->id_periodoFK_Idperiodo;	

		}
		else if($this->strAccionBusqueda=='FK_Idsucursal') {
			$asiento_predefinido_session->id_sucursal=$this->id_sucursalFK_Idsucursal;	

		}
		else if($this->strAccionBusqueda=='FK_Idusuario') {
			$asiento_predefinido_session->id_usuario=$this->id_usuarioFK_Idusuario;	

		}
		
		$this->Session->write(asiento_predefinido_util::$STR_SESSION_NAME,serialize($asiento_predefinido_session));		
	}
	
	public function traerDatosBusquedaDesdeSession(asiento_predefinido_session $asiento_predefinido_session) {
		
		if($asiento_predefinido_session==null) {
			$asiento_predefinido_session=unserialize($this->Session->read(asiento_predefinido_util::$STR_SESSION_NAME));
		}
		
		if($asiento_predefinido_session==null) {
		   $asiento_predefinido_session=new asiento_predefinido_session();
		}
		
		if($asiento_predefinido_session->strUltimaBusqueda!=null && $asiento_predefinido_session->strUltimaBusqueda!='') {
			$this->strAccionBusqueda=$asiento_predefinido_session->strUltimaBusqueda;
			$this->intNumeroPaginacion=$asiento_predefinido_session->intNumeroPaginacion;
			$this->intNumeroPaginacionPagina=$asiento_predefinido_session->intNumeroPaginacionPagina;		
			
			if($this->strAccionBusqueda=='Todos') {;}
			

			 else if($this->strAccionBusqueda=='FK_Idcentro_costo') {
				$this->id_centro_costoFK_Idcentro_costo=$asiento_predefinido_session->id_centro_costo;
				$asiento_predefinido_session->id_centro_costo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Iddocumento_contable') {
				$this->id_documento_contableFK_Iddocumento_contable=$asiento_predefinido_session->id_documento_contable;
				$asiento_predefinido_session->id_documento_contable=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idejercicio') {
				$this->id_ejercicioFK_Idejercicio=$asiento_predefinido_session->id_ejercicio;
				$asiento_predefinido_session->id_ejercicio=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idempresa') {
				$this->id_empresaFK_Idempresa=$asiento_predefinido_session->id_empresa;
				$asiento_predefinido_session->id_empresa=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idfuente') {
				$this->id_fuenteFK_Idfuente=$asiento_predefinido_session->id_fuente;
				$asiento_predefinido_session->id_fuente=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idlibro_auxiliar') {
				$this->id_libro_auxiliarFK_Idlibro_auxiliar=$asiento_predefinido_session->id_libro_auxiliar;
				$asiento_predefinido_session->id_libro_auxiliar=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idmodulo') {
				$this->id_moduloFK_Idmodulo=$asiento_predefinido_session->id_modulo;
				$asiento_predefinido_session->id_modulo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idperiodo') {
				$this->id_periodoFK_Idperiodo=$asiento_predefinido_session->id_periodo;
				$asiento_predefinido_session->id_periodo=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idsucursal') {
				$this->id_sucursalFK_Idsucursal=$asiento_predefinido_session->id_sucursal;
				$asiento_predefinido_session->id_sucursal=-1;

			}
			 else if($this->strAccionBusqueda=='FK_Idusuario') {
				$this->id_usuarioFK_Idusuario=$asiento_predefinido_session->id_usuario;
				$asiento_predefinido_session->id_usuario=-1;

			}
		}
		
		$asiento_predefinido_session->strUltimaBusqueda='';
		//$asiento_predefinido_session->intNumeroPaginacion=10;
		$asiento_predefinido_session->intNumeroPaginacionPagina=0;
		
		$this->Session->write(asiento_predefinido_util::$STR_SESSION_NAME,serialize($asiento_predefinido_session));		
	}
	
	public function asiento_predefinidosControllerAux($conexion_control) 	 {
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
		$this->idfuenteDefaultFK = 0;
		$this->idlibro_auxiliarDefaultFK = 0;
		$this->idcentro_costoDefaultFK = 0;
		$this->iddocumento_contableDefaultFK = 0;
	}
	
	public function setasiento_predefinidoFKsDefault() {
	
		$this->setExistDataCampoForm('form','id_empresa',$this->idempresaDefaultFK);
		$this->setExistDataCampoForm('form','id_sucursal',$this->idsucursalDefaultFK);
		$this->setExistDataCampoForm('form','id_ejercicio',$this->idejercicioDefaultFK);
		$this->setExistDataCampoForm('form','id_periodo',$this->idperiodoDefaultFK);
		$this->setExistDataCampoForm('form','id_usuario',$this->idusuarioDefaultFK);
		$this->setExistDataCampoForm('form','id_modulo',$this->idmoduloDefaultFK);
		$this->setExistDataCampoForm('form','id_fuente',$this->idfuenteDefaultFK);
		$this->setExistDataCampoForm('form','id_libro_auxiliar',$this->idlibro_auxiliarDefaultFK);
		$this->setExistDataCampoForm('form','id_centro_costo',$this->idcentro_costoDefaultFK);
		$this->setExistDataCampoForm('form','id_documento_contable',$this->iddocumento_contableDefaultFK);
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

		fuente::$class;
		fuente_carga::$CONTROLLER;

		libro_auxiliar::$class;
		libro_auxiliar_carga::$CONTROLLER;

		centro_costo::$class;
		centro_costo_carga::$CONTROLLER;

		documento_contable::$class;
		documento_contable_carga::$CONTROLLER;
		
		//REL
		

		asiento_predefinido_detalle_carga::$CONTROLLER;
		asiento_predefinido_detalle_util::$STR_SCHEMA;
		asiento_predefinido_detalle_session::class;

		asiento_carga::$CONTROLLER;
		asiento_util::$STR_SCHEMA;
		asiento_session::class;
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
		interface asiento_predefinido_controlI {	
		
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
		
		public function onLoad(asiento_predefinido_session $asiento_predefinido_session=null);	
		function index(?string $strTypeOnLoadasiento_predefinido='',?string $strTipoPaginaAuxiliarasiento_predefinido='',?string $strTipoUsuarioAuxiliarasiento_predefinido='',?string $strTipoView='index',bool $bitEsPopup=false,bool $bitConBusquedaRapida=false,?string $strValorBusquedaRapida='',?string $strFuncionBusquedaRapida='');
		
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
		public function search(string $strTypeOnLoadasiento_predefinido='',string $strTipoPaginaAuxiliarasiento_predefinido='',string $strTipoUsuarioAuxiliarasiento_predefinido='',string $strTipoView='index',bool $bitConBusquedaRapida=false,string $strValorBusquedaRapida='',string $strFuncionBusquedaRapida='');	
		public function recargarUltimaInformacion();
		
		public function procesarBusqueda(string $strAccionBusqueda);	
		public function buscarPorIdGeneral(int $idGeneral);	
		public function anteriores();	
		public function siguientes();	
		
		function cargarCombosFK(bool $cargarControllerDesdeSession=true);	
		function cargarCombosFKFromReturnGeneral($asiento_predefinidoReturnGeneral);
		
		public function cargarLinksPagination();	
		public function irAFkActual() : string;
		
		public function quitarElementosTabla();	
		public function getTiposRelacionesReporte() : array;	
		public function getClasesRelacionadas() : array;
		
		
		public function setstrRecargarFkInicializar();		
		public function seleccionarLoteFk();	
		public function validarCargarSeleccionarLoteFk(array $IdsFksSeleccionados);					
		public function setVariablesGlobalesCombosFK(asiento_predefinido $asiento_predefinidoClase);
		
		
		public function eliminarVariablesDeSesion();
		
		//NO VALE ESTA POR TALVEZ
		public function inicializarSession();
		
		public function getSetBusquedasSesionConfig(asiento_predefinido_session $asiento_predefinido_session) : bool;	
		public function guardarDatosBusquedaSession();	
		public function traerDatosBusquedaDesdeSession(asiento_predefinido_session $asiento_predefinido_session);	
		public function asiento_predefinidosControllerAux($conexion_control);	
		public function inicializarFKsDefault();	
		public function setasiento_predefinidoFKsDefault();	
				
		//AUXILIAR PARA ELIMINAR MENSAJES ADVERTENCIA, CLASES/VARIABLES NO USADAS
		public function auxiliarMensajesAdvertencia();		
		public function irPagina(int $paginacion_pagina=0);		
	}

	*/
}
?>
