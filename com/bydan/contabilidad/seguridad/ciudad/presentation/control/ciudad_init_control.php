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

namespace com\bydan\contabilidad\seguridad\ciudad\presentation\control;

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

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/ciudad/util/ciudad_carga.php');
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;

use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_param_return;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\presentation\session\ciudad_session;


//FK


use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\provincia\business\logic\provincia_logic;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_carga;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;

//REL


use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;
use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\session\dato_general_usuario_session;

use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;
use com\bydan\contabilidad\general\sucursal\presentation\session\sucursal_session;

use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\general\empresa\presentation\session\empresa_session;


/*CARGA ARCHIVOS FRAMEWORK*/
ciudad_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
ciudad_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
ciudad_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
ciudad_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*ciudad_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class ciudad_init_control extends ControllerBase {	
	
	public $ciudadClase=null;	
	public $ciudadsModel=null;	
	public $ciudadsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idciudad=0;	
	public ?int $idciudadActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $ciudadLogic=null;
	
	public $ciudadActual=null;	
	
	public $ciudad=null;
	public $ciudads=null;
	public $ciudadsEliminados=array();
	public $ciudadsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $ciudadsLocal=array();
	public ?array $ciudadsReporte=null;
	public ?array $ciudadsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadciudad='onload';
	public string $strTipoPaginaAuxiliarciudad='none';
	public string $strTipoUsuarioAuxiliarciudad='none';
		
	public $ciudadReturnGeneral=null;
	public $ciudadParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $ciudadModel=null;
	public $ciudadControllerAdditional=null;
	
	
	

	public $proveedorLogic=null;

	public function  getproveedorLogic() {
		return $this->proveedorLogic;
	}

	public function setproveedorLogic($proveedorLogic) {
		$this->proveedorLogic =$proveedorLogic;
	}


	public $clienteLogic=null;

	public function  getclienteLogic() {
		return $this->clienteLogic;
	}

	public function setclienteLogic($clienteLogic) {
		$this->clienteLogic =$clienteLogic;
	}


	public $datogeneralusuarioLogic=null;

	public function  getdato_general_usuarioLogic() {
		return $this->datogeneralusuarioLogic;
	}

	public function setdato_general_usuarioLogic($datogeneralusuarioLogic) {
		$this->datogeneralusuarioLogic =$datogeneralusuarioLogic;
	}


	public $sucursalLogic=null;

	public function  getsucursalLogic() {
		return $this->sucursalLogic;
	}

	public function setsucursalLogic($sucursalLogic) {
		$this->sucursalLogic =$sucursalLogic;
	}


	public $empresaLogic=null;

	public function  getempresaLogic() {
		return $this->empresaLogic;
	}

	public function setempresaLogic($empresaLogic) {
		$this->empresaLogic =$empresaLogic;
	}
 	
	
	public string $strMensajeid_provincia='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	
	
	public string $strVisibleBusquedaPorCodigo='display:table-row';
	public string $strVisibleBusquedaPorNombre='display:table-row';
	public string $strVisibleFK_Idprovincia='display:table-row';

	
	public array $provinciasFK=array();

	public function getprovinciasFK():array {
		return $this->provinciasFK;
	}

	public function setprovinciasFK(array $provinciasFK) {
		$this->provinciasFK = $provinciasFK;
	}

	public int $idprovinciaDefaultFK=-1;

	public function getIdprovinciaDefaultFK():int {
		return $this->idprovinciaDefaultFK;
	}

	public function setIdprovinciaDefaultFK(int $idprovinciaDefaultFK) {
		$this->idprovinciaDefaultFK = $idprovinciaDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosproveedor='none';
	public $strTienePermisoscliente='none';
	public $strTienePermisosdato_general_usuario='none';
	public $strTienePermisossucursal='none';
	public $strTienePermisosempresa='none';
	
	
	public  $codigoBusquedaPorCodigo=null;

	public  $nombreBusquedaPorNombre=null;

	public  $id_provinciaFK_Idprovincia=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->ciudadLogic==null) {
				$this->ciudadLogic=new ciudad_logic();
			}
			
		} else {
			if($this->ciudadLogic==null) {
				$this->ciudadLogic=new ciudad_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->ciudadClase==null) {
				$this->ciudadClase=new ciudad();
			}
			
			$this->ciudadClase->setId(0);	
				
				
			$this->ciudadClase->setid_provincia(-1);	
			$this->ciudadClase->setcodigo('');	
			$this->ciudadClase->setnombre('');	
			
		} catch(Exception $e) {
			throw $e;
		}
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function actualizarEstadoCeldasBotones(string $strAccion,bool $bitGuardarCambiosEnLote=false,bool $bitEsMantenimientoRelacionado=false){
		$this->actualizarEstadoCeldasBotonesBase($strAccion,$bitGuardarCambiosEnLote,$bitEsMantenimientoRelacionado);
	}
	
	public function manejarRetornarExcepcion(Exception $e) {
		$this->manejarRetornarExcepcionBase($e);
	}
	
	public function cancelarControles() {			
		$this->cancelarControlesBase();
	}
	
	public function inicializarAuxiliares() {
		$this->inicializarAuxiliaresBase();				
	}
	
	public function inicializarMensajesTipo(string $tipo,$e=null) {
		$this->inicializarMensajesTipoBase($tipo,$e);
	}			
	
	public function prepararEjecutarMantenimiento() {
		$this->prepararEjecutarMantenimientoBase('ciudad');
	}
	
	public function setTipoAction(string $action='INDEX') {		
		$this->setTipoActionBase($action);
	}
	
	public function cargarDatosCliente() {
		$this->cargarDatosClienteBase();
	}
	
	public function cargarParametrosPagina() {		
		$this->cargarParametrosPaginaBase();
	}
	
	public function cargarParametrosEventosTabla() {
		$this->cargarParametrosEventosTablaBase();
	}
	
	public function cargarParametrosReporte() {
		$this->cargarParametrosReporteBase('ciudad');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('ciudad');
	}
	
	public function actualizarControllerConReturnGeneral(ciudad_param_return $ciudadReturnGeneral) {
		if($ciudadReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesciudadsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$ciudadReturnGeneral->getsMensajeProceso();
		}
		
		if($ciudadReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$ciudadReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($ciudadReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$ciudadReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$ciudadReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($ciudadReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($ciudadReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$ciudadReturnGeneral->getsFuncionJs();
		}
		
		if($ciudadReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(ciudad_session $ciudad_session){
		$this->strStyleDivArbol=$ciudad_session->strStyleDivArbol;	
		$this->strStyleDivContent=$ciudad_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$ciudad_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$ciudad_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$ciudad_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$ciudad_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$ciudad_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(ciudad_session $ciudad_session){
		$ciudad_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$ciudad_session->strStyleDivHeader='display:none';			
		$ciudad_session->strStyleDivContent='width:93%;height:100%';	
		$ciudad_session->strStyleDivOpcionesBanner='display:none';	
		$ciudad_session->strStyleDivExpandirColapsar='display:none';	
		$ciudad_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(ciudad_control $ciudad_control_session){
		$this->idNuevo=$ciudad_control_session->idNuevo;
		$this->ciudadActual=$ciudad_control_session->ciudadActual;
		$this->ciudad=$ciudad_control_session->ciudad;
		$this->ciudadClase=$ciudad_control_session->ciudadClase;
		$this->ciudads=$ciudad_control_session->ciudads;
		$this->ciudadsEliminados=$ciudad_control_session->ciudadsEliminados;
		$this->ciudad=$ciudad_control_session->ciudad;
		$this->ciudadsReporte=$ciudad_control_session->ciudadsReporte;
		$this->ciudadsSeleccionados=$ciudad_control_session->ciudadsSeleccionados;
		$this->arrOrderBy=$ciudad_control_session->arrOrderBy;
		$this->arrOrderByRel=$ciudad_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$ciudad_control_session->arrHistoryWebs;
		$this->arrSessionBases=$ciudad_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadciudad=$ciudad_control_session->strTypeOnLoadciudad;
		$this->strTipoPaginaAuxiliarciudad=$ciudad_control_session->strTipoPaginaAuxiliarciudad;
		$this->strTipoUsuarioAuxiliarciudad=$ciudad_control_session->strTipoUsuarioAuxiliarciudad;	
		
		$this->bitEsPopup=$ciudad_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$ciudad_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$ciudad_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$ciudad_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$ciudad_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$ciudad_control_session->strSufijo;
		$this->bitEsRelaciones=$ciudad_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$ciudad_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$ciudad_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$ciudad_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$ciudad_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$ciudad_control_session->strTituloTabla;
		$this->strTituloPathPagina=$ciudad_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$ciudad_control_session->strTituloPathElementoActual;
		
		if($this->ciudadLogic==null) {			
			$this->ciudadLogic=new ciudad_logic();
		}
		
		
		if($this->ciudadClase==null) {
			$this->ciudadClase=new ciudad();	
		}
		
		$this->ciudadLogic->setciudad($this->ciudadClase);
		
		
		if($this->ciudads==null) {
			$this->ciudads=array();	
		}
		
		$this->ciudadLogic->setciudads($this->ciudads);
		
		
		$this->strTipoView=$ciudad_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$ciudad_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$ciudad_control_session->datosCliente;
		$this->strAccionBusqueda=$ciudad_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$ciudad_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$ciudad_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$ciudad_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$ciudad_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$ciudad_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$ciudad_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$ciudad_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$ciudad_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$ciudad_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$ciudad_control_session->strTipoPaginacion;
		$this->strTipoAccion=$ciudad_control_session->strTipoAccion;
		$this->tiposReportes=$ciudad_control_session->tiposReportes;
		$this->tiposReporte=$ciudad_control_session->tiposReporte;
		$this->tiposAcciones=$ciudad_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$ciudad_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$ciudad_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$ciudad_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$ciudad_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$ciudad_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$ciudad_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$ciudad_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$ciudad_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$ciudad_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$ciudad_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$ciudad_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$ciudad_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$ciudad_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$ciudad_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$ciudad_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$ciudad_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$ciudad_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$ciudad_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$ciudad_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$ciudad_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$ciudad_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$ciudad_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$ciudad_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$ciudad_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$ciudad_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$ciudad_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$ciudad_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$ciudad_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$ciudad_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$ciudad_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$ciudad_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$ciudad_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$ciudad_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$ciudad_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$ciudad_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$ciudad_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$ciudad_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$ciudad_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$ciudad_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$ciudad_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$ciudad_control_session->resumenUsuarioActual;	
		$this->moduloActual=$ciudad_control_session->moduloActual;	
		$this->opcionActual=$ciudad_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$ciudad_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$ciudad_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$ciudad_session=unserialize($this->Session->read(ciudad_util::$STR_SESSION_NAME));
				
		if($ciudad_session==null) {
			$ciudad_session=new ciudad_session();
		}
		
		$this->strStyleDivArbol=$ciudad_session->strStyleDivArbol;	
		$this->strStyleDivContent=$ciudad_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$ciudad_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$ciudad_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$ciudad_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$ciudad_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$ciudad_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$ciudad_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$ciudad_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$ciudad_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$ciudad_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_provincia=$ciudad_control_session->strMensajeid_provincia;
		$this->strMensajecodigo=$ciudad_control_session->strMensajecodigo;
		$this->strMensajenombre=$ciudad_control_session->strMensajenombre;
			
		
		$this->provinciasFK=$ciudad_control_session->provinciasFK;
		$this->idprovinciaDefaultFK=$ciudad_control_session->idprovinciaDefaultFK;
		
		
		$this->strVisibleBusquedaPorCodigo=$ciudad_control_session->strVisibleBusquedaPorCodigo;
		$this->strVisibleBusquedaPorNombre=$ciudad_control_session->strVisibleBusquedaPorNombre;
		$this->strVisibleFK_Idprovincia=$ciudad_control_session->strVisibleFK_Idprovincia;
		
		
		$this->strTienePermisosproveedor=$ciudad_control_session->strTienePermisosproveedor;
		$this->strTienePermisoscliente=$ciudad_control_session->strTienePermisoscliente;
		$this->strTienePermisosdato_general_usuario=$ciudad_control_session->strTienePermisosdato_general_usuario;
		$this->strTienePermisossucursal=$ciudad_control_session->strTienePermisossucursal;
		$this->strTienePermisosempresa=$ciudad_control_session->strTienePermisosempresa;
		
		
		$this->codigoBusquedaPorCodigo=$ciudad_control_session->codigoBusquedaPorCodigo;
		$this->nombreBusquedaPorNombre=$ciudad_control_session->nombreBusquedaPorNombre;
		$this->id_provinciaFK_Idprovincia=$ciudad_control_session->id_provinciaFK_Idprovincia;

		
		
		
		/*ACTUALIZA CON PARAMETROS ACTUALES*/
		$this->cargarParamsPostAccion();
		
		$this->cargarParametrosReporte();
		/*ACTUALIZA CON PARAMETROS ACTUALES*/
	}
	
	/*---------------------------------------------- FUNCIONES GENERALES -------------------------------------------------*/
	
	public function getidNuevo() : int {
		return $this->idNuevo;
	}

	public function setidNuevo(int $idNuevo) {
		$this->idNuevo = $idNuevo;
	}
	
	public function getciudadControllerAdditional() {
		return $this->ciudadControllerAdditional;
	}

	public function setciudadControllerAdditional($ciudadControllerAdditional) {
		$this->ciudadControllerAdditional = $ciudadControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getciudadActual() : ciudad {
		return $this->ciudadActual;
	}

	public function setciudadActual(ciudad $ciudadActual) {
		$this->ciudadActual = $ciudadActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidciudad() : int {
		return $this->idciudad;
	}

	public function setidciudad(int $idciudad) {
		$this->idciudad = $idciudad;
	}
	
	public function getciudad() : ciudad {
		return $this->ciudad;
	}

	public function setciudad(ciudad $ciudad) {
		$this->ciudad = $ciudad;
	}
		
	public function getciudadLogic() : ciudad_logic {		
		return $this->ciudadLogic;
	}

	public function setciudadLogic(ciudad_logic $ciudadLogic) {
		$this->ciudadLogic = $ciudadLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getciudadsModel() {		
		try {						
			/*ciudadsModel.setWrappedData(ciudadLogic->getciudads());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->ciudadsModel;
	}
	
	public function setciudadsModel($ciudadsModel) {
		$this->ciudadsModel = $ciudadsModel;
	}
	
	public function getciudads() : array {		
		return $this->ciudads;
	}
	
	public function setciudads(array $ciudads) {
		$this->ciudads= $ciudads;
	}
	
	public function getciudadsEliminados() : array {		
		return $this->ciudadsEliminados;
	}
	
	public function setciudadsEliminados(array $ciudadsEliminados) {
		$this->ciudadsEliminados= $ciudadsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getciudadActualFromListDataModel() {
		try {
			/*$ciudadClase= $this->ciudadsModel->getRowData();*/
			
			/*return $ciudad;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
