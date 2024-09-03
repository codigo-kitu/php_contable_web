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

namespace com\bydan\contabilidad\contabilidad\ejercicio\presentation\control;

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

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/ejercicio/util/ejercicio_carga.php');
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;

use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_param_return;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\presentation\session\ejercicio_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
ejercicio_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
ejercicio_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
ejercicio_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
ejercicio_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*ejercicio_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class ejercicio_init_control extends ControllerBase {	
	
	public $ejercicioClase=null;	
	public $ejerciciosModel=null;	
	public $ejerciciosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idejercicio=0;	
	public ?int $idejercicioActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $ejercicioLogic=null;
	
	public $ejercicioActual=null;	
	
	public $ejercicio=null;
	public $ejercicios=null;
	public $ejerciciosEliminados=array();
	public $ejerciciosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $ejerciciosLocal=array();
	public ?array $ejerciciosReporte=null;
	public ?array $ejerciciosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadejercicio='onload';
	public string $strTipoPaginaAuxiliarejercicio='none';
	public string $strTipoUsuarioAuxiliarejercicio='none';
		
	public $ejercicioReturnGeneral=null;
	public $ejercicioParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $ejercicioModel=null;
	public $ejercicioControllerAdditional=null;
	
	
	 	
	
	public string $strMensajefecha_inicio='';
	public string $strMensajefecha_fin='';
	public string $strMensajedescripcion='';
	public string $strMensajeactivo='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->ejercicioLogic==null) {
				$this->ejercicioLogic=new ejercicio_logic();
			}
			
		} else {
			if($this->ejercicioLogic==null) {
				$this->ejercicioLogic=new ejercicio_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->ejercicioClase==null) {
				$this->ejercicioClase=new ejercicio();
			}
			
			$this->ejercicioClase->setId(0);	
				
				
			$this->ejercicioClase->setfecha_inicio(date('Y-m-d'));	
			$this->ejercicioClase->setfecha_fin(date('Y-m-d'));	
			$this->ejercicioClase->setdescripcion('');	
			$this->ejercicioClase->setactivo(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('ejercicio');
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
		$this->cargarParametrosReporteBase('ejercicio');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('ejercicio');
	}
	
	public function actualizarControllerConReturnGeneral(ejercicio_param_return $ejercicioReturnGeneral) {
		if($ejercicioReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesejerciciosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$ejercicioReturnGeneral->getsMensajeProceso();
		}
		
		if($ejercicioReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$ejercicioReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($ejercicioReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$ejercicioReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$ejercicioReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($ejercicioReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($ejercicioReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$ejercicioReturnGeneral->getsFuncionJs();
		}
		
		if($ejercicioReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(ejercicio_session $ejercicio_session){
		$this->strStyleDivArbol=$ejercicio_session->strStyleDivArbol;	
		$this->strStyleDivContent=$ejercicio_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$ejercicio_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$ejercicio_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$ejercicio_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$ejercicio_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$ejercicio_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(ejercicio_session $ejercicio_session){
		$ejercicio_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$ejercicio_session->strStyleDivHeader='display:none';			
		$ejercicio_session->strStyleDivContent='width:93%;height:100%';	
		$ejercicio_session->strStyleDivOpcionesBanner='display:none';	
		$ejercicio_session->strStyleDivExpandirColapsar='display:none';	
		$ejercicio_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(ejercicio_control $ejercicio_control_session){
		$this->idNuevo=$ejercicio_control_session->idNuevo;
		$this->ejercicioActual=$ejercicio_control_session->ejercicioActual;
		$this->ejercicio=$ejercicio_control_session->ejercicio;
		$this->ejercicioClase=$ejercicio_control_session->ejercicioClase;
		$this->ejercicios=$ejercicio_control_session->ejercicios;
		$this->ejerciciosEliminados=$ejercicio_control_session->ejerciciosEliminados;
		$this->ejercicio=$ejercicio_control_session->ejercicio;
		$this->ejerciciosReporte=$ejercicio_control_session->ejerciciosReporte;
		$this->ejerciciosSeleccionados=$ejercicio_control_session->ejerciciosSeleccionados;
		$this->arrOrderBy=$ejercicio_control_session->arrOrderBy;
		$this->arrOrderByRel=$ejercicio_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$ejercicio_control_session->arrHistoryWebs;
		$this->arrSessionBases=$ejercicio_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadejercicio=$ejercicio_control_session->strTypeOnLoadejercicio;
		$this->strTipoPaginaAuxiliarejercicio=$ejercicio_control_session->strTipoPaginaAuxiliarejercicio;
		$this->strTipoUsuarioAuxiliarejercicio=$ejercicio_control_session->strTipoUsuarioAuxiliarejercicio;	
		
		$this->bitEsPopup=$ejercicio_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$ejercicio_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$ejercicio_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$ejercicio_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$ejercicio_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$ejercicio_control_session->strSufijo;
		$this->bitEsRelaciones=$ejercicio_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$ejercicio_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$ejercicio_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$ejercicio_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$ejercicio_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$ejercicio_control_session->strTituloTabla;
		$this->strTituloPathPagina=$ejercicio_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$ejercicio_control_session->strTituloPathElementoActual;
		
		if($this->ejercicioLogic==null) {			
			$this->ejercicioLogic=new ejercicio_logic();
		}
		
		
		if($this->ejercicioClase==null) {
			$this->ejercicioClase=new ejercicio();	
		}
		
		$this->ejercicioLogic->setejercicio($this->ejercicioClase);
		
		
		if($this->ejercicios==null) {
			$this->ejercicios=array();	
		}
		
		$this->ejercicioLogic->setejercicios($this->ejercicios);
		
		
		$this->strTipoView=$ejercicio_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$ejercicio_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$ejercicio_control_session->datosCliente;
		$this->strAccionBusqueda=$ejercicio_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$ejercicio_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$ejercicio_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$ejercicio_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$ejercicio_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$ejercicio_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$ejercicio_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$ejercicio_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$ejercicio_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$ejercicio_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$ejercicio_control_session->strTipoPaginacion;
		$this->strTipoAccion=$ejercicio_control_session->strTipoAccion;
		$this->tiposReportes=$ejercicio_control_session->tiposReportes;
		$this->tiposReporte=$ejercicio_control_session->tiposReporte;
		$this->tiposAcciones=$ejercicio_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$ejercicio_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$ejercicio_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$ejercicio_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$ejercicio_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$ejercicio_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$ejercicio_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$ejercicio_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$ejercicio_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$ejercicio_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$ejercicio_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$ejercicio_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$ejercicio_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$ejercicio_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$ejercicio_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$ejercicio_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$ejercicio_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$ejercicio_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$ejercicio_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$ejercicio_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$ejercicio_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$ejercicio_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$ejercicio_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$ejercicio_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$ejercicio_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$ejercicio_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$ejercicio_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$ejercicio_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$ejercicio_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$ejercicio_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$ejercicio_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$ejercicio_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$ejercicio_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$ejercicio_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$ejercicio_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$ejercicio_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$ejercicio_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$ejercicio_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$ejercicio_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$ejercicio_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$ejercicio_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$ejercicio_control_session->resumenUsuarioActual;	
		$this->moduloActual=$ejercicio_control_session->moduloActual;	
		$this->opcionActual=$ejercicio_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$ejercicio_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$ejercicio_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$ejercicio_session=unserialize($this->Session->read(ejercicio_util::$STR_SESSION_NAME));
				
		if($ejercicio_session==null) {
			$ejercicio_session=new ejercicio_session();
		}
		
		$this->strStyleDivArbol=$ejercicio_session->strStyleDivArbol;	
		$this->strStyleDivContent=$ejercicio_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$ejercicio_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$ejercicio_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$ejercicio_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$ejercicio_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$ejercicio_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$ejercicio_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$ejercicio_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$ejercicio_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$ejercicio_session->strRecargarFkQuery;
		*/
		
		$this->strMensajefecha_inicio=$ejercicio_control_session->strMensajefecha_inicio;
		$this->strMensajefecha_fin=$ejercicio_control_session->strMensajefecha_fin;
		$this->strMensajedescripcion=$ejercicio_control_session->strMensajedescripcion;
		$this->strMensajeactivo=$ejercicio_control_session->strMensajeactivo;
			
		
		
		
		
		
		
		

		
		
		
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
	
	public function getejercicioControllerAdditional() {
		return $this->ejercicioControllerAdditional;
	}

	public function setejercicioControllerAdditional($ejercicioControllerAdditional) {
		$this->ejercicioControllerAdditional = $ejercicioControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getejercicioActual() : ejercicio {
		return $this->ejercicioActual;
	}

	public function setejercicioActual(ejercicio $ejercicioActual) {
		$this->ejercicioActual = $ejercicioActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidejercicio() : int {
		return $this->idejercicio;
	}

	public function setidejercicio(int $idejercicio) {
		$this->idejercicio = $idejercicio;
	}
	
	public function getejercicio() : ejercicio {
		return $this->ejercicio;
	}

	public function setejercicio(ejercicio $ejercicio) {
		$this->ejercicio = $ejercicio;
	}
		
	public function getejercicioLogic() : ejercicio_logic {		
		return $this->ejercicioLogic;
	}

	public function setejercicioLogic(ejercicio_logic $ejercicioLogic) {
		$this->ejercicioLogic = $ejercicioLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getejerciciosModel() {		
		try {						
			/*ejerciciosModel.setWrappedData(ejercicioLogic->getejercicios());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->ejerciciosModel;
	}
	
	public function setejerciciosModel($ejerciciosModel) {
		$this->ejerciciosModel = $ejerciciosModel;
	}
	
	public function getejercicios() : array {		
		return $this->ejercicios;
	}
	
	public function setejercicios(array $ejercicios) {
		$this->ejercicios= $ejercicios;
	}
	
	public function getejerciciosEliminados() : array {		
		return $this->ejerciciosEliminados;
	}
	
	public function setejerciciosEliminados(array $ejerciciosEliminados) {
		$this->ejerciciosEliminados= $ejerciciosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getejercicioActualFromListDataModel() {
		try {
			/*$ejercicioClase= $this->ejerciciosModel->getRowData();*/
			
			/*return $ejercicio;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
