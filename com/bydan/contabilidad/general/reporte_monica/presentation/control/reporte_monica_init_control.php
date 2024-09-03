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

namespace com\bydan\contabilidad\general\reporte_monica\presentation\control;

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

use com\bydan\contabilidad\general\reporte_monica\business\entity\reporte_monica;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/reporte_monica/util/reporte_monica_carga.php');
use com\bydan\contabilidad\general\reporte_monica\util\reporte_monica_carga;

use com\bydan\contabilidad\general\reporte_monica\util\reporte_monica_util;
use com\bydan\contabilidad\general\reporte_monica\util\reporte_monica_param_return;
use com\bydan\contabilidad\general\reporte_monica\business\logic\reporte_monica_logic;
use com\bydan\contabilidad\general\reporte_monica\presentation\session\reporte_monica_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
reporte_monica_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
reporte_monica_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
reporte_monica_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
reporte_monica_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*reporte_monica_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class reporte_monica_init_control extends ControllerBase {	
	
	public $reporte_monicaClase=null;	
	public $reporte_monicasModel=null;	
	public $reporte_monicasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idreporte_monica=0;	
	public ?int $idreporte_monicaActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $reporte_monicaLogic=null;
	
	public $reporte_monicaActual=null;	
	
	public $reporte_monica=null;
	public $reporte_monicas=null;
	public $reporte_monicasEliminados=array();
	public $reporte_monicasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $reporte_monicasLocal=array();
	public ?array $reporte_monicasReporte=null;
	public ?array $reporte_monicasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadreporte_monica='onload';
	public string $strTipoPaginaAuxiliarreporte_monica='none';
	public string $strTipoUsuarioAuxiliarreporte_monica='none';
		
	public $reporte_monicaReturnGeneral=null;
	public $reporte_monicaParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $reporte_monicaModel=null;
	public $reporte_monicaControllerAdditional=null;
	
	
	 	
	
	public string $strMensajenombre='';
	public string $strMensajedescripcion='';
	public string $strMensajeestado='';
	public string $strMensajemodulo='';
	public string $strMensajesub_modulo='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->reporte_monicaLogic==null) {
				$this->reporte_monicaLogic=new reporte_monica_logic();
			}
			
		} else {
			if($this->reporte_monicaLogic==null) {
				$this->reporte_monicaLogic=new reporte_monica_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->reporte_monicaClase==null) {
				$this->reporte_monicaClase=new reporte_monica();
			}
			
			$this->reporte_monicaClase->setId(0);	
				
				
			$this->reporte_monicaClase->setnombre('');	
			$this->reporte_monicaClase->setdescripcion('');	
			$this->reporte_monicaClase->setestado(0);	
			$this->reporte_monicaClase->setmodulo('');	
			$this->reporte_monicaClase->setsub_modulo('');	
			
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
		$this->prepararEjecutarMantenimientoBase('reporte_monica');
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
		$this->cargarParametrosReporteBase('reporte_monica');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('reporte_monica');
	}
	
	public function actualizarControllerConReturnGeneral(reporte_monica_param_return $reporte_monicaReturnGeneral) {
		if($reporte_monicaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesreporte_monicasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$reporte_monicaReturnGeneral->getsMensajeProceso();
		}
		
		if($reporte_monicaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$reporte_monicaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($reporte_monicaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$reporte_monicaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$reporte_monicaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($reporte_monicaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($reporte_monicaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$reporte_monicaReturnGeneral->getsFuncionJs();
		}
		
		if($reporte_monicaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(reporte_monica_session $reporte_monica_session){
		$this->strStyleDivArbol=$reporte_monica_session->strStyleDivArbol;	
		$this->strStyleDivContent=$reporte_monica_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$reporte_monica_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$reporte_monica_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$reporte_monica_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$reporte_monica_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$reporte_monica_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(reporte_monica_session $reporte_monica_session){
		$reporte_monica_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$reporte_monica_session->strStyleDivHeader='display:none';			
		$reporte_monica_session->strStyleDivContent='width:93%;height:100%';	
		$reporte_monica_session->strStyleDivOpcionesBanner='display:none';	
		$reporte_monica_session->strStyleDivExpandirColapsar='display:none';	
		$reporte_monica_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(reporte_monica_control $reporte_monica_control_session){
		$this->idNuevo=$reporte_monica_control_session->idNuevo;
		$this->reporte_monicaActual=$reporte_monica_control_session->reporte_monicaActual;
		$this->reporte_monica=$reporte_monica_control_session->reporte_monica;
		$this->reporte_monicaClase=$reporte_monica_control_session->reporte_monicaClase;
		$this->reporte_monicas=$reporte_monica_control_session->reporte_monicas;
		$this->reporte_monicasEliminados=$reporte_monica_control_session->reporte_monicasEliminados;
		$this->reporte_monica=$reporte_monica_control_session->reporte_monica;
		$this->reporte_monicasReporte=$reporte_monica_control_session->reporte_monicasReporte;
		$this->reporte_monicasSeleccionados=$reporte_monica_control_session->reporte_monicasSeleccionados;
		$this->arrOrderBy=$reporte_monica_control_session->arrOrderBy;
		$this->arrOrderByRel=$reporte_monica_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$reporte_monica_control_session->arrHistoryWebs;
		$this->arrSessionBases=$reporte_monica_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadreporte_monica=$reporte_monica_control_session->strTypeOnLoadreporte_monica;
		$this->strTipoPaginaAuxiliarreporte_monica=$reporte_monica_control_session->strTipoPaginaAuxiliarreporte_monica;
		$this->strTipoUsuarioAuxiliarreporte_monica=$reporte_monica_control_session->strTipoUsuarioAuxiliarreporte_monica;	
		
		$this->bitEsPopup=$reporte_monica_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$reporte_monica_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$reporte_monica_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$reporte_monica_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$reporte_monica_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$reporte_monica_control_session->strSufijo;
		$this->bitEsRelaciones=$reporte_monica_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$reporte_monica_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$reporte_monica_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$reporte_monica_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$reporte_monica_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$reporte_monica_control_session->strTituloTabla;
		$this->strTituloPathPagina=$reporte_monica_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$reporte_monica_control_session->strTituloPathElementoActual;
		
		if($this->reporte_monicaLogic==null) {			
			$this->reporte_monicaLogic=new reporte_monica_logic();
		}
		
		
		if($this->reporte_monicaClase==null) {
			$this->reporte_monicaClase=new reporte_monica();	
		}
		
		$this->reporte_monicaLogic->setreporte_monica($this->reporte_monicaClase);
		
		
		if($this->reporte_monicas==null) {
			$this->reporte_monicas=array();	
		}
		
		$this->reporte_monicaLogic->setreporte_monicas($this->reporte_monicas);
		
		
		$this->strTipoView=$reporte_monica_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$reporte_monica_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$reporte_monica_control_session->datosCliente;
		$this->strAccionBusqueda=$reporte_monica_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$reporte_monica_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$reporte_monica_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$reporte_monica_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$reporte_monica_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$reporte_monica_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$reporte_monica_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$reporte_monica_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$reporte_monica_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$reporte_monica_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$reporte_monica_control_session->strTipoPaginacion;
		$this->strTipoAccion=$reporte_monica_control_session->strTipoAccion;
		$this->tiposReportes=$reporte_monica_control_session->tiposReportes;
		$this->tiposReporte=$reporte_monica_control_session->tiposReporte;
		$this->tiposAcciones=$reporte_monica_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$reporte_monica_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$reporte_monica_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$reporte_monica_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$reporte_monica_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$reporte_monica_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$reporte_monica_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$reporte_monica_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$reporte_monica_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$reporte_monica_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$reporte_monica_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$reporte_monica_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$reporte_monica_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$reporte_monica_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$reporte_monica_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$reporte_monica_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$reporte_monica_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$reporte_monica_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$reporte_monica_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$reporte_monica_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$reporte_monica_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$reporte_monica_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$reporte_monica_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$reporte_monica_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$reporte_monica_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$reporte_monica_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$reporte_monica_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$reporte_monica_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$reporte_monica_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$reporte_monica_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$reporte_monica_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$reporte_monica_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$reporte_monica_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$reporte_monica_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$reporte_monica_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$reporte_monica_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$reporte_monica_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$reporte_monica_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$reporte_monica_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$reporte_monica_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$reporte_monica_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$reporte_monica_control_session->resumenUsuarioActual;	
		$this->moduloActual=$reporte_monica_control_session->moduloActual;	
		$this->opcionActual=$reporte_monica_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$reporte_monica_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$reporte_monica_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$reporte_monica_session=unserialize($this->Session->read(reporte_monica_util::$STR_SESSION_NAME));
				
		if($reporte_monica_session==null) {
			$reporte_monica_session=new reporte_monica_session();
		}
		
		$this->strStyleDivArbol=$reporte_monica_session->strStyleDivArbol;	
		$this->strStyleDivContent=$reporte_monica_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$reporte_monica_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$reporte_monica_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$reporte_monica_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$reporte_monica_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$reporte_monica_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$reporte_monica_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$reporte_monica_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$reporte_monica_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$reporte_monica_session->strRecargarFkQuery;
		*/
		
		$this->strMensajenombre=$reporte_monica_control_session->strMensajenombre;
		$this->strMensajedescripcion=$reporte_monica_control_session->strMensajedescripcion;
		$this->strMensajeestado=$reporte_monica_control_session->strMensajeestado;
		$this->strMensajemodulo=$reporte_monica_control_session->strMensajemodulo;
		$this->strMensajesub_modulo=$reporte_monica_control_session->strMensajesub_modulo;
			
		
		
		
		
		
		
		

		
		
		
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
	
	public function getreporte_monicaControllerAdditional() {
		return $this->reporte_monicaControllerAdditional;
	}

	public function setreporte_monicaControllerAdditional($reporte_monicaControllerAdditional) {
		$this->reporte_monicaControllerAdditional = $reporte_monicaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getreporte_monicaActual() : reporte_monica {
		return $this->reporte_monicaActual;
	}

	public function setreporte_monicaActual(reporte_monica $reporte_monicaActual) {
		$this->reporte_monicaActual = $reporte_monicaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidreporte_monica() : int {
		return $this->idreporte_monica;
	}

	public function setidreporte_monica(int $idreporte_monica) {
		$this->idreporte_monica = $idreporte_monica;
	}
	
	public function getreporte_monica() : reporte_monica {
		return $this->reporte_monica;
	}

	public function setreporte_monica(reporte_monica $reporte_monica) {
		$this->reporte_monica = $reporte_monica;
	}
		
	public function getreporte_monicaLogic() : reporte_monica_logic {		
		return $this->reporte_monicaLogic;
	}

	public function setreporte_monicaLogic(reporte_monica_logic $reporte_monicaLogic) {
		$this->reporte_monicaLogic = $reporte_monicaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getreporte_monicasModel() {		
		try {						
			/*reporte_monicasModel.setWrappedData(reporte_monicaLogic->getreporte_monicas());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->reporte_monicasModel;
	}
	
	public function setreporte_monicasModel($reporte_monicasModel) {
		$this->reporte_monicasModel = $reporte_monicasModel;
	}
	
	public function getreporte_monicas() : array {		
		return $this->reporte_monicas;
	}
	
	public function setreporte_monicas(array $reporte_monicas) {
		$this->reporte_monicas= $reporte_monicas;
	}
	
	public function getreporte_monicasEliminados() : array {		
		return $this->reporte_monicasEliminados;
	}
	
	public function setreporte_monicasEliminados(array $reporte_monicasEliminados) {
		$this->reporte_monicasEliminados= $reporte_monicasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getreporte_monicaActualFromListDataModel() {
		try {
			/*$reporte_monicaClase= $this->reporte_monicasModel->getRowData();*/
			
			/*return $reporte_monica;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
