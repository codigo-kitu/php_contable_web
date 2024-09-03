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

namespace com\bydan\contabilidad\contabilidad\periodo\presentation\control;

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

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/periodo/util/periodo_carga.php');
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;

use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_param_return;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\presentation\session\periodo_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
periodo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
periodo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
periodo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
periodo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*periodo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class periodo_init_control extends ControllerBase {	
	
	public $periodoClase=null;	
	public $periodosModel=null;	
	public $periodosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idperiodo=0;	
	public ?int $idperiodoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $periodoLogic=null;
	
	public $periodoActual=null;	
	
	public $periodo=null;
	public $periodos=null;
	public $periodosEliminados=array();
	public $periodosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $periodosLocal=array();
	public ?array $periodosReporte=null;
	public ?array $periodosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadperiodo='onload';
	public string $strTipoPaginaAuxiliarperiodo='none';
	public string $strTipoUsuarioAuxiliarperiodo='none';
		
	public $periodoReturnGeneral=null;
	public $periodoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $periodoModel=null;
	public $periodoControllerAdditional=null;
	
	
	 	
	
	public string $strMensajenombre='';
	public string $strMensajefecha_inicio='';
	public string $strMensajefecha_fin='';
	public string $strMensajedescripcion='';
	public string $strMensajeactivo='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->periodoLogic==null) {
				$this->periodoLogic=new periodo_logic();
			}
			
		} else {
			if($this->periodoLogic==null) {
				$this->periodoLogic=new periodo_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->periodoClase==null) {
				$this->periodoClase=new periodo();
			}
			
			$this->periodoClase->setId(0);	
				
				
			$this->periodoClase->setnombre('');	
			$this->periodoClase->setfecha_inicio(date('Y-m-d'));	
			$this->periodoClase->setfecha_fin(date('Y-m-d'));	
			$this->periodoClase->setdescripcion('');	
			$this->periodoClase->setactivo(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('periodo');
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
		$this->cargarParametrosReporteBase('periodo');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('periodo');
	}
	
	public function actualizarControllerConReturnGeneral(periodo_param_return $periodoReturnGeneral) {
		if($periodoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesperiodosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$periodoReturnGeneral->getsMensajeProceso();
		}
		
		if($periodoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$periodoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($periodoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$periodoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$periodoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($periodoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($periodoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$periodoReturnGeneral->getsFuncionJs();
		}
		
		if($periodoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(periodo_session $periodo_session){
		$this->strStyleDivArbol=$periodo_session->strStyleDivArbol;	
		$this->strStyleDivContent=$periodo_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$periodo_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$periodo_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$periodo_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$periodo_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$periodo_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(periodo_session $periodo_session){
		$periodo_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$periodo_session->strStyleDivHeader='display:none';			
		$periodo_session->strStyleDivContent='width:93%;height:100%';	
		$periodo_session->strStyleDivOpcionesBanner='display:none';	
		$periodo_session->strStyleDivExpandirColapsar='display:none';	
		$periodo_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(periodo_control $periodo_control_session){
		$this->idNuevo=$periodo_control_session->idNuevo;
		$this->periodoActual=$periodo_control_session->periodoActual;
		$this->periodo=$periodo_control_session->periodo;
		$this->periodoClase=$periodo_control_session->periodoClase;
		$this->periodos=$periodo_control_session->periodos;
		$this->periodosEliminados=$periodo_control_session->periodosEliminados;
		$this->periodo=$periodo_control_session->periodo;
		$this->periodosReporte=$periodo_control_session->periodosReporte;
		$this->periodosSeleccionados=$periodo_control_session->periodosSeleccionados;
		$this->arrOrderBy=$periodo_control_session->arrOrderBy;
		$this->arrOrderByRel=$periodo_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$periodo_control_session->arrHistoryWebs;
		$this->arrSessionBases=$periodo_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadperiodo=$periodo_control_session->strTypeOnLoadperiodo;
		$this->strTipoPaginaAuxiliarperiodo=$periodo_control_session->strTipoPaginaAuxiliarperiodo;
		$this->strTipoUsuarioAuxiliarperiodo=$periodo_control_session->strTipoUsuarioAuxiliarperiodo;	
		
		$this->bitEsPopup=$periodo_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$periodo_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$periodo_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$periodo_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$periodo_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$periodo_control_session->strSufijo;
		$this->bitEsRelaciones=$periodo_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$periodo_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$periodo_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$periodo_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$periodo_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$periodo_control_session->strTituloTabla;
		$this->strTituloPathPagina=$periodo_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$periodo_control_session->strTituloPathElementoActual;
		
		if($this->periodoLogic==null) {			
			$this->periodoLogic=new periodo_logic();
		}
		
		
		if($this->periodoClase==null) {
			$this->periodoClase=new periodo();	
		}
		
		$this->periodoLogic->setperiodo($this->periodoClase);
		
		
		if($this->periodos==null) {
			$this->periodos=array();	
		}
		
		$this->periodoLogic->setperiodos($this->periodos);
		
		
		$this->strTipoView=$periodo_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$periodo_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$periodo_control_session->datosCliente;
		$this->strAccionBusqueda=$periodo_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$periodo_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$periodo_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$periodo_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$periodo_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$periodo_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$periodo_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$periodo_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$periodo_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$periodo_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$periodo_control_session->strTipoPaginacion;
		$this->strTipoAccion=$periodo_control_session->strTipoAccion;
		$this->tiposReportes=$periodo_control_session->tiposReportes;
		$this->tiposReporte=$periodo_control_session->tiposReporte;
		$this->tiposAcciones=$periodo_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$periodo_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$periodo_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$periodo_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$periodo_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$periodo_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$periodo_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$periodo_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$periodo_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$periodo_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$periodo_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$periodo_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$periodo_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$periodo_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$periodo_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$periodo_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$periodo_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$periodo_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$periodo_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$periodo_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$periodo_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$periodo_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$periodo_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$periodo_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$periodo_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$periodo_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$periodo_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$periodo_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$periodo_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$periodo_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$periodo_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$periodo_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$periodo_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$periodo_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$periodo_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$periodo_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$periodo_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$periodo_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$periodo_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$periodo_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$periodo_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$periodo_control_session->resumenUsuarioActual;	
		$this->moduloActual=$periodo_control_session->moduloActual;	
		$this->opcionActual=$periodo_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$periodo_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$periodo_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$periodo_session=unserialize($this->Session->read(periodo_util::$STR_SESSION_NAME));
				
		if($periodo_session==null) {
			$periodo_session=new periodo_session();
		}
		
		$this->strStyleDivArbol=$periodo_session->strStyleDivArbol;	
		$this->strStyleDivContent=$periodo_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$periodo_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$periodo_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$periodo_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$periodo_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$periodo_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$periodo_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$periodo_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$periodo_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$periodo_session->strRecargarFkQuery;
		*/
		
		$this->strMensajenombre=$periodo_control_session->strMensajenombre;
		$this->strMensajefecha_inicio=$periodo_control_session->strMensajefecha_inicio;
		$this->strMensajefecha_fin=$periodo_control_session->strMensajefecha_fin;
		$this->strMensajedescripcion=$periodo_control_session->strMensajedescripcion;
		$this->strMensajeactivo=$periodo_control_session->strMensajeactivo;
			
		
		
		
		
		
		
		

		
		
		
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
	
	public function getperiodoControllerAdditional() {
		return $this->periodoControllerAdditional;
	}

	public function setperiodoControllerAdditional($periodoControllerAdditional) {
		$this->periodoControllerAdditional = $periodoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getperiodoActual() : periodo {
		return $this->periodoActual;
	}

	public function setperiodoActual(periodo $periodoActual) {
		$this->periodoActual = $periodoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidperiodo() : int {
		return $this->idperiodo;
	}

	public function setidperiodo(int $idperiodo) {
		$this->idperiodo = $idperiodo;
	}
	
	public function getperiodo() : periodo {
		return $this->periodo;
	}

	public function setperiodo(periodo $periodo) {
		$this->periodo = $periodo;
	}
		
	public function getperiodoLogic() : periodo_logic {		
		return $this->periodoLogic;
	}

	public function setperiodoLogic(periodo_logic $periodoLogic) {
		$this->periodoLogic = $periodoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getperiodosModel() {		
		try {						
			/*periodosModel.setWrappedData(periodoLogic->getperiodos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->periodosModel;
	}
	
	public function setperiodosModel($periodosModel) {
		$this->periodosModel = $periodosModel;
	}
	
	public function getperiodos() : array {		
		return $this->periodos;
	}
	
	public function setperiodos(array $periodos) {
		$this->periodos= $periodos;
	}
	
	public function getperiodosEliminados() : array {		
		return $this->periodosEliminados;
	}
	
	public function setperiodosEliminados(array $periodosEliminados) {
		$this->periodosEliminados= $periodosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getperiodoActualFromListDataModel() {
		try {
			/*$periodoClase= $this->periodosModel->getRowData();*/
			
			/*return $periodo;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
