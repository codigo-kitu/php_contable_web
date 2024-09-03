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

namespace com\bydan\contabilidad\general\log_actividad\presentation\control;

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

use com\bydan\contabilidad\general\log_actividad\business\entity\log_actividad;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/log_actividad/util/log_actividad_carga.php');
use com\bydan\contabilidad\general\log_actividad\util\log_actividad_carga;

use com\bydan\contabilidad\general\log_actividad\util\log_actividad_util;
use com\bydan\contabilidad\general\log_actividad\util\log_actividad_param_return;
use com\bydan\contabilidad\general\log_actividad\business\logic\log_actividad_logic;
use com\bydan\contabilidad\general\log_actividad\presentation\session\log_actividad_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
log_actividad_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
log_actividad_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
log_actividad_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
log_actividad_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*log_actividad_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class log_actividad_init_control extends ControllerBase {	
	
	public $log_actividadClase=null;	
	public $log_actividadsModel=null;	
	public $log_actividadsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idlog_actividad=0;	
	public ?int $idlog_actividadActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $log_actividadLogic=null;
	
	public $log_actividadActual=null;	
	
	public $log_actividad=null;
	public $log_actividads=null;
	public $log_actividadsEliminados=array();
	public $log_actividadsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $log_actividadsLocal=array();
	public ?array $log_actividadsReporte=null;
	public ?array $log_actividadsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadlog_actividad='onload';
	public string $strTipoPaginaAuxiliarlog_actividad='none';
	public string $strTipoUsuarioAuxiliarlog_actividad='none';
		
	public $log_actividadReturnGeneral=null;
	public $log_actividadParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $log_actividadModel=null;
	public $log_actividadControllerAdditional=null;
	
	
	 	
	
	public string $strMensajelog_id='';
	public string $strMensajefecha='';
	public string $strMensajehora='';
	public string $strMensajecomputador='';
	public string $strMensajeusuario='';
	public string $strMensajedescripcion='';
	public string $strMensajemodulo='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->log_actividadLogic==null) {
				$this->log_actividadLogic=new log_actividad_logic();
			}
			
		} else {
			if($this->log_actividadLogic==null) {
				$this->log_actividadLogic=new log_actividad_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->log_actividadClase==null) {
				$this->log_actividadClase=new log_actividad();
			}
			
			$this->log_actividadClase->setId(0);	
				
				
			$this->log_actividadClase->setlog_id(0);	
			$this->log_actividadClase->setfecha(date('Y-m-d'));	
			$this->log_actividadClase->sethora(date('Y-m-d'));	
			$this->log_actividadClase->setcomputador('');	
			$this->log_actividadClase->setusuario('');	
			$this->log_actividadClase->setdescripcion('');	
			$this->log_actividadClase->setmodulo('');	
			
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
		$this->prepararEjecutarMantenimientoBase('log_actividad');
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
		$this->cargarParametrosReporteBase('log_actividad');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('log_actividad');
	}
	
	public function actualizarControllerConReturnGeneral(log_actividad_param_return $log_actividadReturnGeneral) {
		if($log_actividadReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajeslog_actividadsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$log_actividadReturnGeneral->getsMensajeProceso();
		}
		
		if($log_actividadReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$log_actividadReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($log_actividadReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$log_actividadReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$log_actividadReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($log_actividadReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($log_actividadReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$log_actividadReturnGeneral->getsFuncionJs();
		}
		
		if($log_actividadReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(log_actividad_session $log_actividad_session){
		$this->strStyleDivArbol=$log_actividad_session->strStyleDivArbol;	
		$this->strStyleDivContent=$log_actividad_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$log_actividad_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$log_actividad_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$log_actividad_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$log_actividad_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$log_actividad_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(log_actividad_session $log_actividad_session){
		$log_actividad_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$log_actividad_session->strStyleDivHeader='display:none';			
		$log_actividad_session->strStyleDivContent='width:93%;height:100%';	
		$log_actividad_session->strStyleDivOpcionesBanner='display:none';	
		$log_actividad_session->strStyleDivExpandirColapsar='display:none';	
		$log_actividad_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(log_actividad_control $log_actividad_control_session){
		$this->idNuevo=$log_actividad_control_session->idNuevo;
		$this->log_actividadActual=$log_actividad_control_session->log_actividadActual;
		$this->log_actividad=$log_actividad_control_session->log_actividad;
		$this->log_actividadClase=$log_actividad_control_session->log_actividadClase;
		$this->log_actividads=$log_actividad_control_session->log_actividads;
		$this->log_actividadsEliminados=$log_actividad_control_session->log_actividadsEliminados;
		$this->log_actividad=$log_actividad_control_session->log_actividad;
		$this->log_actividadsReporte=$log_actividad_control_session->log_actividadsReporte;
		$this->log_actividadsSeleccionados=$log_actividad_control_session->log_actividadsSeleccionados;
		$this->arrOrderBy=$log_actividad_control_session->arrOrderBy;
		$this->arrOrderByRel=$log_actividad_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$log_actividad_control_session->arrHistoryWebs;
		$this->arrSessionBases=$log_actividad_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadlog_actividad=$log_actividad_control_session->strTypeOnLoadlog_actividad;
		$this->strTipoPaginaAuxiliarlog_actividad=$log_actividad_control_session->strTipoPaginaAuxiliarlog_actividad;
		$this->strTipoUsuarioAuxiliarlog_actividad=$log_actividad_control_session->strTipoUsuarioAuxiliarlog_actividad;	
		
		$this->bitEsPopup=$log_actividad_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$log_actividad_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$log_actividad_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$log_actividad_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$log_actividad_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$log_actividad_control_session->strSufijo;
		$this->bitEsRelaciones=$log_actividad_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$log_actividad_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$log_actividad_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$log_actividad_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$log_actividad_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$log_actividad_control_session->strTituloTabla;
		$this->strTituloPathPagina=$log_actividad_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$log_actividad_control_session->strTituloPathElementoActual;
		
		if($this->log_actividadLogic==null) {			
			$this->log_actividadLogic=new log_actividad_logic();
		}
		
		
		if($this->log_actividadClase==null) {
			$this->log_actividadClase=new log_actividad();	
		}
		
		$this->log_actividadLogic->setlog_actividad($this->log_actividadClase);
		
		
		if($this->log_actividads==null) {
			$this->log_actividads=array();	
		}
		
		$this->log_actividadLogic->setlog_actividads($this->log_actividads);
		
		
		$this->strTipoView=$log_actividad_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$log_actividad_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$log_actividad_control_session->datosCliente;
		$this->strAccionBusqueda=$log_actividad_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$log_actividad_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$log_actividad_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$log_actividad_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$log_actividad_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$log_actividad_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$log_actividad_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$log_actividad_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$log_actividad_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$log_actividad_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$log_actividad_control_session->strTipoPaginacion;
		$this->strTipoAccion=$log_actividad_control_session->strTipoAccion;
		$this->tiposReportes=$log_actividad_control_session->tiposReportes;
		$this->tiposReporte=$log_actividad_control_session->tiposReporte;
		$this->tiposAcciones=$log_actividad_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$log_actividad_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$log_actividad_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$log_actividad_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$log_actividad_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$log_actividad_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$log_actividad_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$log_actividad_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$log_actividad_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$log_actividad_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$log_actividad_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$log_actividad_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$log_actividad_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$log_actividad_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$log_actividad_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$log_actividad_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$log_actividad_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$log_actividad_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$log_actividad_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$log_actividad_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$log_actividad_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$log_actividad_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$log_actividad_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$log_actividad_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$log_actividad_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$log_actividad_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$log_actividad_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$log_actividad_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$log_actividad_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$log_actividad_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$log_actividad_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$log_actividad_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$log_actividad_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$log_actividad_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$log_actividad_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$log_actividad_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$log_actividad_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$log_actividad_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$log_actividad_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$log_actividad_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$log_actividad_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$log_actividad_control_session->resumenUsuarioActual;	
		$this->moduloActual=$log_actividad_control_session->moduloActual;	
		$this->opcionActual=$log_actividad_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$log_actividad_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$log_actividad_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$log_actividad_session=unserialize($this->Session->read(log_actividad_util::$STR_SESSION_NAME));
				
		if($log_actividad_session==null) {
			$log_actividad_session=new log_actividad_session();
		}
		
		$this->strStyleDivArbol=$log_actividad_session->strStyleDivArbol;	
		$this->strStyleDivContent=$log_actividad_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$log_actividad_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$log_actividad_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$log_actividad_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$log_actividad_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$log_actividad_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$log_actividad_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$log_actividad_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$log_actividad_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$log_actividad_session->strRecargarFkQuery;
		*/
		
		$this->strMensajelog_id=$log_actividad_control_session->strMensajelog_id;
		$this->strMensajefecha=$log_actividad_control_session->strMensajefecha;
		$this->strMensajehora=$log_actividad_control_session->strMensajehora;
		$this->strMensajecomputador=$log_actividad_control_session->strMensajecomputador;
		$this->strMensajeusuario=$log_actividad_control_session->strMensajeusuario;
		$this->strMensajedescripcion=$log_actividad_control_session->strMensajedescripcion;
		$this->strMensajemodulo=$log_actividad_control_session->strMensajemodulo;
			
		
		
		
		
		
		
		

		
		
		
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
	
	public function getlog_actividadControllerAdditional() {
		return $this->log_actividadControllerAdditional;
	}

	public function setlog_actividadControllerAdditional($log_actividadControllerAdditional) {
		$this->log_actividadControllerAdditional = $log_actividadControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getlog_actividadActual() : log_actividad {
		return $this->log_actividadActual;
	}

	public function setlog_actividadActual(log_actividad $log_actividadActual) {
		$this->log_actividadActual = $log_actividadActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidlog_actividad() : int {
		return $this->idlog_actividad;
	}

	public function setidlog_actividad(int $idlog_actividad) {
		$this->idlog_actividad = $idlog_actividad;
	}
	
	public function getlog_actividad() : log_actividad {
		return $this->log_actividad;
	}

	public function setlog_actividad(log_actividad $log_actividad) {
		$this->log_actividad = $log_actividad;
	}
		
	public function getlog_actividadLogic() : log_actividad_logic {		
		return $this->log_actividadLogic;
	}

	public function setlog_actividadLogic(log_actividad_logic $log_actividadLogic) {
		$this->log_actividadLogic = $log_actividadLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getlog_actividadsModel() {		
		try {						
			/*log_actividadsModel.setWrappedData(log_actividadLogic->getlog_actividads());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->log_actividadsModel;
	}
	
	public function setlog_actividadsModel($log_actividadsModel) {
		$this->log_actividadsModel = $log_actividadsModel;
	}
	
	public function getlog_actividads() : array {		
		return $this->log_actividads;
	}
	
	public function setlog_actividads(array $log_actividads) {
		$this->log_actividads= $log_actividads;
	}
	
	public function getlog_actividadsEliminados() : array {		
		return $this->log_actividadsEliminados;
	}
	
	public function setlog_actividadsEliminados(array $log_actividadsEliminados) {
		$this->log_actividadsEliminados= $log_actividadsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getlog_actividadActualFromListDataModel() {
		try {
			/*$log_actividadClase= $this->log_actividadsModel->getRowData();*/
			
			/*return $log_actividad;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
