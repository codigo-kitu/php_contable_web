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

namespace com\bydan\contabilidad\seguridad\tipo_fondo\presentation\control;

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

use com\bydan\contabilidad\seguridad\tipo_fondo\business\entity\tipo_fondo;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/tipo_fondo/util/tipo_fondo_carga.php');
use com\bydan\contabilidad\seguridad\tipo_fondo\util\tipo_fondo_carga;

use com\bydan\contabilidad\seguridad\tipo_fondo\util\tipo_fondo_util;
use com\bydan\contabilidad\seguridad\tipo_fondo\util\tipo_fondo_param_return;
use com\bydan\contabilidad\seguridad\tipo_fondo\business\logic\tipo_fondo_logic;
use com\bydan\contabilidad\seguridad\tipo_fondo\presentation\session\tipo_fondo_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
tipo_fondo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
tipo_fondo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
tipo_fondo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
tipo_fondo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*tipo_fondo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class tipo_fondo_init_control extends ControllerBase {	
	
	public $tipo_fondoClase=null;	
	public $tipo_fondosModel=null;	
	public $tipo_fondosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idtipo_fondo=0;	
	public ?int $idtipo_fondoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $tipo_fondoLogic=null;
	
	public $tipo_fondoActual=null;	
	
	public $tipo_fondo=null;
	public $tipo_fondos=null;
	public $tipo_fondosEliminados=array();
	public $tipo_fondosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $tipo_fondosLocal=array();
	public ?array $tipo_fondosReporte=null;
	public ?array $tipo_fondosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadtipo_fondo='onload';
	public string $strTipoPaginaAuxiliartipo_fondo='none';
	public string $strTipoUsuarioAuxiliartipo_fondo='none';
		
	public $tipo_fondoReturnGeneral=null;
	public $tipo_fondoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $tipo_fondoModel=null;
	public $tipo_fondoControllerAdditional=null;
	
	
	

	public $parametrogeneralusuarioLogic=null;

	public function  getparametro_general_usuarioLogic() {
		return $this->parametrogeneralusuarioLogic;
	}

	public function setparametro_general_usuarioLogic($parametrogeneralusuarioLogic) {
		$this->parametrogeneralusuarioLogic =$parametrogeneralusuarioLogic;
	}
 	
	
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	
	

	
	
	
	
	
	
	
	public $strTienePermisosparametro_general_usuario='none';
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->tipo_fondoLogic==null) {
				$this->tipo_fondoLogic=new tipo_fondo_logic();
			}
			
		} else {
			if($this->tipo_fondoLogic==null) {
				$this->tipo_fondoLogic=new tipo_fondo_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->tipo_fondoClase==null) {
				$this->tipo_fondoClase=new tipo_fondo();
			}
			
			$this->tipo_fondoClase->setId(0);	
				
				
			$this->tipo_fondoClase->setcodigo('');	
			$this->tipo_fondoClase->setnombre('');	
			
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
		$this->prepararEjecutarMantenimientoBase('tipo_fondo');
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
		$this->cargarParametrosReporteBase('tipo_fondo');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('tipo_fondo');
	}
	
	public function actualizarControllerConReturnGeneral(tipo_fondo_param_return $tipo_fondoReturnGeneral) {
		if($tipo_fondoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajestipo_fondosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$tipo_fondoReturnGeneral->getsMensajeProceso();
		}
		
		if($tipo_fondoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$tipo_fondoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($tipo_fondoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$tipo_fondoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$tipo_fondoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($tipo_fondoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($tipo_fondoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$tipo_fondoReturnGeneral->getsFuncionJs();
		}
		
		if($tipo_fondoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(tipo_fondo_session $tipo_fondo_session){
		$this->strStyleDivArbol=$tipo_fondo_session->strStyleDivArbol;	
		$this->strStyleDivContent=$tipo_fondo_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$tipo_fondo_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$tipo_fondo_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$tipo_fondo_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$tipo_fondo_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$tipo_fondo_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(tipo_fondo_session $tipo_fondo_session){
		$tipo_fondo_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$tipo_fondo_session->strStyleDivHeader='display:none';			
		$tipo_fondo_session->strStyleDivContent='width:93%;height:100%';	
		$tipo_fondo_session->strStyleDivOpcionesBanner='display:none';	
		$tipo_fondo_session->strStyleDivExpandirColapsar='display:none';	
		$tipo_fondo_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(tipo_fondo_control $tipo_fondo_control_session){
		$this->idNuevo=$tipo_fondo_control_session->idNuevo;
		$this->tipo_fondoActual=$tipo_fondo_control_session->tipo_fondoActual;
		$this->tipo_fondo=$tipo_fondo_control_session->tipo_fondo;
		$this->tipo_fondoClase=$tipo_fondo_control_session->tipo_fondoClase;
		$this->tipo_fondos=$tipo_fondo_control_session->tipo_fondos;
		$this->tipo_fondosEliminados=$tipo_fondo_control_session->tipo_fondosEliminados;
		$this->tipo_fondo=$tipo_fondo_control_session->tipo_fondo;
		$this->tipo_fondosReporte=$tipo_fondo_control_session->tipo_fondosReporte;
		$this->tipo_fondosSeleccionados=$tipo_fondo_control_session->tipo_fondosSeleccionados;
		$this->arrOrderBy=$tipo_fondo_control_session->arrOrderBy;
		$this->arrOrderByRel=$tipo_fondo_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$tipo_fondo_control_session->arrHistoryWebs;
		$this->arrSessionBases=$tipo_fondo_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadtipo_fondo=$tipo_fondo_control_session->strTypeOnLoadtipo_fondo;
		$this->strTipoPaginaAuxiliartipo_fondo=$tipo_fondo_control_session->strTipoPaginaAuxiliartipo_fondo;
		$this->strTipoUsuarioAuxiliartipo_fondo=$tipo_fondo_control_session->strTipoUsuarioAuxiliartipo_fondo;	
		
		$this->bitEsPopup=$tipo_fondo_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$tipo_fondo_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$tipo_fondo_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$tipo_fondo_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$tipo_fondo_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$tipo_fondo_control_session->strSufijo;
		$this->bitEsRelaciones=$tipo_fondo_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$tipo_fondo_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$tipo_fondo_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$tipo_fondo_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$tipo_fondo_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$tipo_fondo_control_session->strTituloTabla;
		$this->strTituloPathPagina=$tipo_fondo_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$tipo_fondo_control_session->strTituloPathElementoActual;
		
		if($this->tipo_fondoLogic==null) {			
			$this->tipo_fondoLogic=new tipo_fondo_logic();
		}
		
		
		if($this->tipo_fondoClase==null) {
			$this->tipo_fondoClase=new tipo_fondo();	
		}
		
		$this->tipo_fondoLogic->settipo_fondo($this->tipo_fondoClase);
		
		
		if($this->tipo_fondos==null) {
			$this->tipo_fondos=array();	
		}
		
		$this->tipo_fondoLogic->settipo_fondos($this->tipo_fondos);
		
		
		$this->strTipoView=$tipo_fondo_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$tipo_fondo_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$tipo_fondo_control_session->datosCliente;
		$this->strAccionBusqueda=$tipo_fondo_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$tipo_fondo_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$tipo_fondo_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$tipo_fondo_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$tipo_fondo_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$tipo_fondo_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$tipo_fondo_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$tipo_fondo_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$tipo_fondo_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$tipo_fondo_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$tipo_fondo_control_session->strTipoPaginacion;
		$this->strTipoAccion=$tipo_fondo_control_session->strTipoAccion;
		$this->tiposReportes=$tipo_fondo_control_session->tiposReportes;
		$this->tiposReporte=$tipo_fondo_control_session->tiposReporte;
		$this->tiposAcciones=$tipo_fondo_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$tipo_fondo_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$tipo_fondo_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$tipo_fondo_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$tipo_fondo_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$tipo_fondo_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$tipo_fondo_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$tipo_fondo_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$tipo_fondo_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$tipo_fondo_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$tipo_fondo_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$tipo_fondo_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$tipo_fondo_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$tipo_fondo_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$tipo_fondo_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$tipo_fondo_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$tipo_fondo_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$tipo_fondo_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$tipo_fondo_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$tipo_fondo_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$tipo_fondo_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$tipo_fondo_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$tipo_fondo_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$tipo_fondo_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$tipo_fondo_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$tipo_fondo_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$tipo_fondo_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$tipo_fondo_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$tipo_fondo_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$tipo_fondo_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$tipo_fondo_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$tipo_fondo_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$tipo_fondo_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$tipo_fondo_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$tipo_fondo_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$tipo_fondo_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$tipo_fondo_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$tipo_fondo_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$tipo_fondo_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$tipo_fondo_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$tipo_fondo_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$tipo_fondo_control_session->resumenUsuarioActual;	
		$this->moduloActual=$tipo_fondo_control_session->moduloActual;	
		$this->opcionActual=$tipo_fondo_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$tipo_fondo_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$tipo_fondo_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$tipo_fondo_session=unserialize($this->Session->read(tipo_fondo_util::$STR_SESSION_NAME));
				
		if($tipo_fondo_session==null) {
			$tipo_fondo_session=new tipo_fondo_session();
		}
		
		$this->strStyleDivArbol=$tipo_fondo_session->strStyleDivArbol;	
		$this->strStyleDivContent=$tipo_fondo_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$tipo_fondo_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$tipo_fondo_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$tipo_fondo_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$tipo_fondo_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$tipo_fondo_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$tipo_fondo_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$tipo_fondo_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$tipo_fondo_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$tipo_fondo_session->strRecargarFkQuery;
		*/
		
		$this->strMensajecodigo=$tipo_fondo_control_session->strMensajecodigo;
		$this->strMensajenombre=$tipo_fondo_control_session->strMensajenombre;
			
		
		
		
		
		
		$this->strTienePermisosparametro_general_usuario=$tipo_fondo_control_session->strTienePermisosparametro_general_usuario;
		
		

		
		
		
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
	
	public function gettipo_fondoControllerAdditional() {
		return $this->tipo_fondoControllerAdditional;
	}

	public function settipo_fondoControllerAdditional($tipo_fondoControllerAdditional) {
		$this->tipo_fondoControllerAdditional = $tipo_fondoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function gettipo_fondoActual() : tipo_fondo {
		return $this->tipo_fondoActual;
	}

	public function settipo_fondoActual(tipo_fondo $tipo_fondoActual) {
		$this->tipo_fondoActual = $tipo_fondoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidtipo_fondo() : int {
		return $this->idtipo_fondo;
	}

	public function setidtipo_fondo(int $idtipo_fondo) {
		$this->idtipo_fondo = $idtipo_fondo;
	}
	
	public function gettipo_fondo() : tipo_fondo {
		return $this->tipo_fondo;
	}

	public function settipo_fondo(tipo_fondo $tipo_fondo) {
		$this->tipo_fondo = $tipo_fondo;
	}
		
	public function gettipo_fondoLogic() : tipo_fondo_logic {		
		return $this->tipo_fondoLogic;
	}

	public function settipo_fondoLogic(tipo_fondo_logic $tipo_fondoLogic) {
		$this->tipo_fondoLogic = $tipo_fondoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function gettipo_fondosModel() {		
		try {						
			/*tipo_fondosModel.setWrappedData(tipo_fondoLogic->gettipo_fondos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->tipo_fondosModel;
	}
	
	public function settipo_fondosModel($tipo_fondosModel) {
		$this->tipo_fondosModel = $tipo_fondosModel;
	}
	
	public function gettipo_fondos() : array {		
		return $this->tipo_fondos;
	}
	
	public function settipo_fondos(array $tipo_fondos) {
		$this->tipo_fondos= $tipo_fondos;
	}
	
	public function gettipo_fondosEliminados() : array {		
		return $this->tipo_fondosEliminados;
	}
	
	public function settipo_fondosEliminados(array $tipo_fondosEliminados) {
		$this->tipo_fondosEliminados= $tipo_fondosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function gettipo_fondoActualFromListDataModel() {
		try {
			/*$tipo_fondoClase= $this->tipo_fondosModel->getRowData();*/
			
			/*return $tipo_fondo;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
