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

namespace com\bydan\contabilidad\general\comentario_documento\presentation\control;

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

use com\bydan\contabilidad\general\comentario_documento\business\entity\comentario_documento;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/comentario_documento/util/comentario_documento_carga.php');
use com\bydan\contabilidad\general\comentario_documento\util\comentario_documento_carga;

use com\bydan\contabilidad\general\comentario_documento\util\comentario_documento_util;
use com\bydan\contabilidad\general\comentario_documento\util\comentario_documento_param_return;
use com\bydan\contabilidad\general\comentario_documento\business\logic\comentario_documento_logic;
use com\bydan\contabilidad\general\comentario_documento\presentation\session\comentario_documento_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
comentario_documento_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
comentario_documento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
comentario_documento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
comentario_documento_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*comentario_documento_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class comentario_documento_init_control extends ControllerBase {	
	
	public $comentario_documentoClase=null;	
	public $comentario_documentosModel=null;	
	public $comentario_documentosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcomentario_documento=0;	
	public ?int $idcomentario_documentoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $comentario_documentoLogic=null;
	
	public $comentario_documentoActual=null;	
	
	public $comentario_documento=null;
	public $comentario_documentos=null;
	public $comentario_documentosEliminados=array();
	public $comentario_documentosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $comentario_documentosLocal=array();
	public ?array $comentario_documentosReporte=null;
	public ?array $comentario_documentosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcomentario_documento='onload';
	public string $strTipoPaginaAuxiliarcomentario_documento='none';
	public string $strTipoUsuarioAuxiliarcomentario_documento='none';
		
	public $comentario_documentoReturnGeneral=null;
	public $comentario_documentoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $comentario_documentoModel=null;
	public $comentario_documentoControllerAdditional=null;
	
	
	 	
	
	public string $strMensajetipo_documento='';
	public string $strMensajecomentario='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->comentario_documentoLogic==null) {
				$this->comentario_documentoLogic=new comentario_documento_logic();
			}
			
		} else {
			if($this->comentario_documentoLogic==null) {
				$this->comentario_documentoLogic=new comentario_documento_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->comentario_documentoClase==null) {
				$this->comentario_documentoClase=new comentario_documento();
			}
			
			$this->comentario_documentoClase->setId(0);	
				
				
			$this->comentario_documentoClase->settipo_documento('');	
			$this->comentario_documentoClase->setcomentario('');	
			
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
		$this->prepararEjecutarMantenimientoBase('comentario_documento');
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
		$this->cargarParametrosReporteBase('comentario_documento');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('comentario_documento');
	}
	
	public function actualizarControllerConReturnGeneral(comentario_documento_param_return $comentario_documentoReturnGeneral) {
		if($comentario_documentoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescomentario_documentosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$comentario_documentoReturnGeneral->getsMensajeProceso();
		}
		
		if($comentario_documentoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$comentario_documentoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($comentario_documentoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$comentario_documentoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$comentario_documentoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($comentario_documentoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($comentario_documentoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$comentario_documentoReturnGeneral->getsFuncionJs();
		}
		
		if($comentario_documentoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(comentario_documento_session $comentario_documento_session){
		$this->strStyleDivArbol=$comentario_documento_session->strStyleDivArbol;	
		$this->strStyleDivContent=$comentario_documento_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$comentario_documento_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$comentario_documento_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$comentario_documento_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$comentario_documento_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$comentario_documento_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(comentario_documento_session $comentario_documento_session){
		$comentario_documento_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$comentario_documento_session->strStyleDivHeader='display:none';			
		$comentario_documento_session->strStyleDivContent='width:93%;height:100%';	
		$comentario_documento_session->strStyleDivOpcionesBanner='display:none';	
		$comentario_documento_session->strStyleDivExpandirColapsar='display:none';	
		$comentario_documento_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(comentario_documento_control $comentario_documento_control_session){
		$this->idNuevo=$comentario_documento_control_session->idNuevo;
		$this->comentario_documentoActual=$comentario_documento_control_session->comentario_documentoActual;
		$this->comentario_documento=$comentario_documento_control_session->comentario_documento;
		$this->comentario_documentoClase=$comentario_documento_control_session->comentario_documentoClase;
		$this->comentario_documentos=$comentario_documento_control_session->comentario_documentos;
		$this->comentario_documentosEliminados=$comentario_documento_control_session->comentario_documentosEliminados;
		$this->comentario_documento=$comentario_documento_control_session->comentario_documento;
		$this->comentario_documentosReporte=$comentario_documento_control_session->comentario_documentosReporte;
		$this->comentario_documentosSeleccionados=$comentario_documento_control_session->comentario_documentosSeleccionados;
		$this->arrOrderBy=$comentario_documento_control_session->arrOrderBy;
		$this->arrOrderByRel=$comentario_documento_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$comentario_documento_control_session->arrHistoryWebs;
		$this->arrSessionBases=$comentario_documento_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcomentario_documento=$comentario_documento_control_session->strTypeOnLoadcomentario_documento;
		$this->strTipoPaginaAuxiliarcomentario_documento=$comentario_documento_control_session->strTipoPaginaAuxiliarcomentario_documento;
		$this->strTipoUsuarioAuxiliarcomentario_documento=$comentario_documento_control_session->strTipoUsuarioAuxiliarcomentario_documento;	
		
		$this->bitEsPopup=$comentario_documento_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$comentario_documento_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$comentario_documento_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$comentario_documento_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$comentario_documento_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$comentario_documento_control_session->strSufijo;
		$this->bitEsRelaciones=$comentario_documento_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$comentario_documento_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$comentario_documento_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$comentario_documento_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$comentario_documento_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$comentario_documento_control_session->strTituloTabla;
		$this->strTituloPathPagina=$comentario_documento_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$comentario_documento_control_session->strTituloPathElementoActual;
		
		if($this->comentario_documentoLogic==null) {			
			$this->comentario_documentoLogic=new comentario_documento_logic();
		}
		
		
		if($this->comentario_documentoClase==null) {
			$this->comentario_documentoClase=new comentario_documento();	
		}
		
		$this->comentario_documentoLogic->setcomentario_documento($this->comentario_documentoClase);
		
		
		if($this->comentario_documentos==null) {
			$this->comentario_documentos=array();	
		}
		
		$this->comentario_documentoLogic->setcomentario_documentos($this->comentario_documentos);
		
		
		$this->strTipoView=$comentario_documento_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$comentario_documento_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$comentario_documento_control_session->datosCliente;
		$this->strAccionBusqueda=$comentario_documento_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$comentario_documento_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$comentario_documento_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$comentario_documento_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$comentario_documento_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$comentario_documento_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$comentario_documento_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$comentario_documento_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$comentario_documento_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$comentario_documento_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$comentario_documento_control_session->strTipoPaginacion;
		$this->strTipoAccion=$comentario_documento_control_session->strTipoAccion;
		$this->tiposReportes=$comentario_documento_control_session->tiposReportes;
		$this->tiposReporte=$comentario_documento_control_session->tiposReporte;
		$this->tiposAcciones=$comentario_documento_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$comentario_documento_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$comentario_documento_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$comentario_documento_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$comentario_documento_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$comentario_documento_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$comentario_documento_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$comentario_documento_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$comentario_documento_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$comentario_documento_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$comentario_documento_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$comentario_documento_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$comentario_documento_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$comentario_documento_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$comentario_documento_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$comentario_documento_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$comentario_documento_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$comentario_documento_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$comentario_documento_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$comentario_documento_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$comentario_documento_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$comentario_documento_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$comentario_documento_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$comentario_documento_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$comentario_documento_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$comentario_documento_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$comentario_documento_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$comentario_documento_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$comentario_documento_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$comentario_documento_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$comentario_documento_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$comentario_documento_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$comentario_documento_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$comentario_documento_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$comentario_documento_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$comentario_documento_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$comentario_documento_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$comentario_documento_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$comentario_documento_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$comentario_documento_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$comentario_documento_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$comentario_documento_control_session->resumenUsuarioActual;	
		$this->moduloActual=$comentario_documento_control_session->moduloActual;	
		$this->opcionActual=$comentario_documento_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$comentario_documento_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$comentario_documento_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$comentario_documento_session=unserialize($this->Session->read(comentario_documento_util::$STR_SESSION_NAME));
				
		if($comentario_documento_session==null) {
			$comentario_documento_session=new comentario_documento_session();
		}
		
		$this->strStyleDivArbol=$comentario_documento_session->strStyleDivArbol;	
		$this->strStyleDivContent=$comentario_documento_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$comentario_documento_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$comentario_documento_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$comentario_documento_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$comentario_documento_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$comentario_documento_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$comentario_documento_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$comentario_documento_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$comentario_documento_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$comentario_documento_session->strRecargarFkQuery;
		*/
		
		$this->strMensajetipo_documento=$comentario_documento_control_session->strMensajetipo_documento;
		$this->strMensajecomentario=$comentario_documento_control_session->strMensajecomentario;
			
		
		
		
		
		
		
		

		
		
		
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
	
	public function getcomentario_documentoControllerAdditional() {
		return $this->comentario_documentoControllerAdditional;
	}

	public function setcomentario_documentoControllerAdditional($comentario_documentoControllerAdditional) {
		$this->comentario_documentoControllerAdditional = $comentario_documentoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcomentario_documentoActual() : comentario_documento {
		return $this->comentario_documentoActual;
	}

	public function setcomentario_documentoActual(comentario_documento $comentario_documentoActual) {
		$this->comentario_documentoActual = $comentario_documentoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcomentario_documento() : int {
		return $this->idcomentario_documento;
	}

	public function setidcomentario_documento(int $idcomentario_documento) {
		$this->idcomentario_documento = $idcomentario_documento;
	}
	
	public function getcomentario_documento() : comentario_documento {
		return $this->comentario_documento;
	}

	public function setcomentario_documento(comentario_documento $comentario_documento) {
		$this->comentario_documento = $comentario_documento;
	}
		
	public function getcomentario_documentoLogic() : comentario_documento_logic {		
		return $this->comentario_documentoLogic;
	}

	public function setcomentario_documentoLogic(comentario_documento_logic $comentario_documentoLogic) {
		$this->comentario_documentoLogic = $comentario_documentoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcomentario_documentosModel() {		
		try {						
			/*comentario_documentosModel.setWrappedData(comentario_documentoLogic->getcomentario_documentos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->comentario_documentosModel;
	}
	
	public function setcomentario_documentosModel($comentario_documentosModel) {
		$this->comentario_documentosModel = $comentario_documentosModel;
	}
	
	public function getcomentario_documentos() : array {		
		return $this->comentario_documentos;
	}
	
	public function setcomentario_documentos(array $comentario_documentos) {
		$this->comentario_documentos= $comentario_documentos;
	}
	
	public function getcomentario_documentosEliminados() : array {		
		return $this->comentario_documentosEliminados;
	}
	
	public function setcomentario_documentosEliminados(array $comentario_documentosEliminados) {
		$this->comentario_documentosEliminados= $comentario_documentosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcomentario_documentoActualFromListDataModel() {
		try {
			/*$comentario_documentoClase= $this->comentario_documentosModel->getRowData();*/
			
			/*return $comentario_documento;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
