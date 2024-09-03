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

namespace com\bydan\contabilidad\seguridad\tipo_tecla_mascara\presentation\control;

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

use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\entity\tipo_tecla_mascara;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/tipo_tecla_mascara/util/tipo_tecla_mascara_carga.php');
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util\tipo_tecla_mascara_carga;

use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util\tipo_tecla_mascara_util;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util\tipo_tecla_mascara_param_return;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\logic\tipo_tecla_mascara_logic;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\presentation\session\tipo_tecla_mascara_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
tipo_tecla_mascara_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
tipo_tecla_mascara_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
tipo_tecla_mascara_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
tipo_tecla_mascara_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*tipo_tecla_mascara_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class tipo_tecla_mascara_init_control extends ControllerBase {	
	
	public $tipo_tecla_mascaraClase=null;	
	public $tipo_tecla_mascarasModel=null;	
	public $tipo_tecla_mascarasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idtipo_tecla_mascara=0;	
	public ?int $idtipo_tecla_mascaraActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $tipo_tecla_mascaraLogic=null;
	
	public $tipo_tecla_mascaraActual=null;	
	
	public $tipo_tecla_mascara=null;
	public $tipo_tecla_mascaras=null;
	public $tipo_tecla_mascarasEliminados=array();
	public $tipo_tecla_mascarasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $tipo_tecla_mascarasLocal=array();
	public ?array $tipo_tecla_mascarasReporte=null;
	public ?array $tipo_tecla_mascarasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadtipo_tecla_mascara='onload';
	public string $strTipoPaginaAuxiliartipo_tecla_mascara='none';
	public string $strTipoUsuarioAuxiliartipo_tecla_mascara='none';
		
	public $tipo_tecla_mascaraReturnGeneral=null;
	public $tipo_tecla_mascaraParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $tipo_tecla_mascaraModel=null;
	public $tipo_tecla_mascaraControllerAdditional=null;
	
	
	

	public $moduloLogic=null;

	public function  getmoduloLogic() {
		return $this->moduloLogic;
	}

	public function setmoduloLogic($moduloLogic) {
		$this->moduloLogic =$moduloLogic;
	}
 	
	
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	
	

	
	
	
	
	
	
	
	public $strTienePermisosmodulo='none';
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->tipo_tecla_mascaraLogic==null) {
				$this->tipo_tecla_mascaraLogic=new tipo_tecla_mascara_logic();
			}
			
		} else {
			if($this->tipo_tecla_mascaraLogic==null) {
				$this->tipo_tecla_mascaraLogic=new tipo_tecla_mascara_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->tipo_tecla_mascaraClase==null) {
				$this->tipo_tecla_mascaraClase=new tipo_tecla_mascara();
			}
			
			$this->tipo_tecla_mascaraClase->setId(0);	
				
				
			$this->tipo_tecla_mascaraClase->setcodigo('');	
			$this->tipo_tecla_mascaraClase->setnombre('');	
			
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
		$this->prepararEjecutarMantenimientoBase('tipo_tecla_mascara');
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
		$this->cargarParametrosReporteBase('tipo_tecla_mascara');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('tipo_tecla_mascara');
	}
	
	public function actualizarControllerConReturnGeneral(tipo_tecla_mascara_param_return $tipo_tecla_mascaraReturnGeneral) {
		if($tipo_tecla_mascaraReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajestipo_tecla_mascarasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$tipo_tecla_mascaraReturnGeneral->getsMensajeProceso();
		}
		
		if($tipo_tecla_mascaraReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$tipo_tecla_mascaraReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($tipo_tecla_mascaraReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$tipo_tecla_mascaraReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$tipo_tecla_mascaraReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($tipo_tecla_mascaraReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($tipo_tecla_mascaraReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$tipo_tecla_mascaraReturnGeneral->getsFuncionJs();
		}
		
		if($tipo_tecla_mascaraReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(tipo_tecla_mascara_session $tipo_tecla_mascara_session){
		$this->strStyleDivArbol=$tipo_tecla_mascara_session->strStyleDivArbol;	
		$this->strStyleDivContent=$tipo_tecla_mascara_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$tipo_tecla_mascara_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$tipo_tecla_mascara_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$tipo_tecla_mascara_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$tipo_tecla_mascara_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$tipo_tecla_mascara_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(tipo_tecla_mascara_session $tipo_tecla_mascara_session){
		$tipo_tecla_mascara_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$tipo_tecla_mascara_session->strStyleDivHeader='display:none';			
		$tipo_tecla_mascara_session->strStyleDivContent='width:93%;height:100%';	
		$tipo_tecla_mascara_session->strStyleDivOpcionesBanner='display:none';	
		$tipo_tecla_mascara_session->strStyleDivExpandirColapsar='display:none';	
		$tipo_tecla_mascara_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(tipo_tecla_mascara_control $tipo_tecla_mascara_control_session){
		$this->idNuevo=$tipo_tecla_mascara_control_session->idNuevo;
		$this->tipo_tecla_mascaraActual=$tipo_tecla_mascara_control_session->tipo_tecla_mascaraActual;
		$this->tipo_tecla_mascara=$tipo_tecla_mascara_control_session->tipo_tecla_mascara;
		$this->tipo_tecla_mascaraClase=$tipo_tecla_mascara_control_session->tipo_tecla_mascaraClase;
		$this->tipo_tecla_mascaras=$tipo_tecla_mascara_control_session->tipo_tecla_mascaras;
		$this->tipo_tecla_mascarasEliminados=$tipo_tecla_mascara_control_session->tipo_tecla_mascarasEliminados;
		$this->tipo_tecla_mascara=$tipo_tecla_mascara_control_session->tipo_tecla_mascara;
		$this->tipo_tecla_mascarasReporte=$tipo_tecla_mascara_control_session->tipo_tecla_mascarasReporte;
		$this->tipo_tecla_mascarasSeleccionados=$tipo_tecla_mascara_control_session->tipo_tecla_mascarasSeleccionados;
		$this->arrOrderBy=$tipo_tecla_mascara_control_session->arrOrderBy;
		$this->arrOrderByRel=$tipo_tecla_mascara_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$tipo_tecla_mascara_control_session->arrHistoryWebs;
		$this->arrSessionBases=$tipo_tecla_mascara_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadtipo_tecla_mascara=$tipo_tecla_mascara_control_session->strTypeOnLoadtipo_tecla_mascara;
		$this->strTipoPaginaAuxiliartipo_tecla_mascara=$tipo_tecla_mascara_control_session->strTipoPaginaAuxiliartipo_tecla_mascara;
		$this->strTipoUsuarioAuxiliartipo_tecla_mascara=$tipo_tecla_mascara_control_session->strTipoUsuarioAuxiliartipo_tecla_mascara;	
		
		$this->bitEsPopup=$tipo_tecla_mascara_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$tipo_tecla_mascara_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$tipo_tecla_mascara_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$tipo_tecla_mascara_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$tipo_tecla_mascara_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$tipo_tecla_mascara_control_session->strSufijo;
		$this->bitEsRelaciones=$tipo_tecla_mascara_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$tipo_tecla_mascara_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$tipo_tecla_mascara_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$tipo_tecla_mascara_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$tipo_tecla_mascara_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$tipo_tecla_mascara_control_session->strTituloTabla;
		$this->strTituloPathPagina=$tipo_tecla_mascara_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$tipo_tecla_mascara_control_session->strTituloPathElementoActual;
		
		if($this->tipo_tecla_mascaraLogic==null) {			
			$this->tipo_tecla_mascaraLogic=new tipo_tecla_mascara_logic();
		}
		
		
		if($this->tipo_tecla_mascaraClase==null) {
			$this->tipo_tecla_mascaraClase=new tipo_tecla_mascara();	
		}
		
		$this->tipo_tecla_mascaraLogic->settipo_tecla_mascara($this->tipo_tecla_mascaraClase);
		
		
		if($this->tipo_tecla_mascaras==null) {
			$this->tipo_tecla_mascaras=array();	
		}
		
		$this->tipo_tecla_mascaraLogic->settipo_tecla_mascaras($this->tipo_tecla_mascaras);
		
		
		$this->strTipoView=$tipo_tecla_mascara_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$tipo_tecla_mascara_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$tipo_tecla_mascara_control_session->datosCliente;
		$this->strAccionBusqueda=$tipo_tecla_mascara_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$tipo_tecla_mascara_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$tipo_tecla_mascara_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$tipo_tecla_mascara_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$tipo_tecla_mascara_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$tipo_tecla_mascara_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$tipo_tecla_mascara_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$tipo_tecla_mascara_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$tipo_tecla_mascara_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$tipo_tecla_mascara_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$tipo_tecla_mascara_control_session->strTipoPaginacion;
		$this->strTipoAccion=$tipo_tecla_mascara_control_session->strTipoAccion;
		$this->tiposReportes=$tipo_tecla_mascara_control_session->tiposReportes;
		$this->tiposReporte=$tipo_tecla_mascara_control_session->tiposReporte;
		$this->tiposAcciones=$tipo_tecla_mascara_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$tipo_tecla_mascara_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$tipo_tecla_mascara_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$tipo_tecla_mascara_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$tipo_tecla_mascara_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$tipo_tecla_mascara_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$tipo_tecla_mascara_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$tipo_tecla_mascara_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$tipo_tecla_mascara_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$tipo_tecla_mascara_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$tipo_tecla_mascara_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$tipo_tecla_mascara_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$tipo_tecla_mascara_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$tipo_tecla_mascara_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$tipo_tecla_mascara_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$tipo_tecla_mascara_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$tipo_tecla_mascara_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$tipo_tecla_mascara_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$tipo_tecla_mascara_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$tipo_tecla_mascara_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$tipo_tecla_mascara_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$tipo_tecla_mascara_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$tipo_tecla_mascara_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$tipo_tecla_mascara_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$tipo_tecla_mascara_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$tipo_tecla_mascara_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$tipo_tecla_mascara_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$tipo_tecla_mascara_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$tipo_tecla_mascara_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$tipo_tecla_mascara_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$tipo_tecla_mascara_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$tipo_tecla_mascara_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$tipo_tecla_mascara_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$tipo_tecla_mascara_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$tipo_tecla_mascara_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$tipo_tecla_mascara_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$tipo_tecla_mascara_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$tipo_tecla_mascara_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$tipo_tecla_mascara_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$tipo_tecla_mascara_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$tipo_tecla_mascara_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$tipo_tecla_mascara_control_session->resumenUsuarioActual;	
		$this->moduloActual=$tipo_tecla_mascara_control_session->moduloActual;	
		$this->opcionActual=$tipo_tecla_mascara_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$tipo_tecla_mascara_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$tipo_tecla_mascara_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$tipo_tecla_mascara_session=unserialize($this->Session->read(tipo_tecla_mascara_util::$STR_SESSION_NAME));
				
		if($tipo_tecla_mascara_session==null) {
			$tipo_tecla_mascara_session=new tipo_tecla_mascara_session();
		}
		
		$this->strStyleDivArbol=$tipo_tecla_mascara_session->strStyleDivArbol;	
		$this->strStyleDivContent=$tipo_tecla_mascara_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$tipo_tecla_mascara_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$tipo_tecla_mascara_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$tipo_tecla_mascara_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$tipo_tecla_mascara_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$tipo_tecla_mascara_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$tipo_tecla_mascara_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$tipo_tecla_mascara_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$tipo_tecla_mascara_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$tipo_tecla_mascara_session->strRecargarFkQuery;
		*/
		
		$this->strMensajecodigo=$tipo_tecla_mascara_control_session->strMensajecodigo;
		$this->strMensajenombre=$tipo_tecla_mascara_control_session->strMensajenombre;
			
		
		
		
		
		
		$this->strTienePermisosmodulo=$tipo_tecla_mascara_control_session->strTienePermisosmodulo;
		
		

		
		
		
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
	
	public function gettipo_tecla_mascaraControllerAdditional() {
		return $this->tipo_tecla_mascaraControllerAdditional;
	}

	public function settipo_tecla_mascaraControllerAdditional($tipo_tecla_mascaraControllerAdditional) {
		$this->tipo_tecla_mascaraControllerAdditional = $tipo_tecla_mascaraControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function gettipo_tecla_mascaraActual() : tipo_tecla_mascara {
		return $this->tipo_tecla_mascaraActual;
	}

	public function settipo_tecla_mascaraActual(tipo_tecla_mascara $tipo_tecla_mascaraActual) {
		$this->tipo_tecla_mascaraActual = $tipo_tecla_mascaraActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidtipo_tecla_mascara() : int {
		return $this->idtipo_tecla_mascara;
	}

	public function setidtipo_tecla_mascara(int $idtipo_tecla_mascara) {
		$this->idtipo_tecla_mascara = $idtipo_tecla_mascara;
	}
	
	public function gettipo_tecla_mascara() : tipo_tecla_mascara {
		return $this->tipo_tecla_mascara;
	}

	public function settipo_tecla_mascara(tipo_tecla_mascara $tipo_tecla_mascara) {
		$this->tipo_tecla_mascara = $tipo_tecla_mascara;
	}
		
	public function gettipo_tecla_mascaraLogic() : tipo_tecla_mascara_logic {		
		return $this->tipo_tecla_mascaraLogic;
	}

	public function settipo_tecla_mascaraLogic(tipo_tecla_mascara_logic $tipo_tecla_mascaraLogic) {
		$this->tipo_tecla_mascaraLogic = $tipo_tecla_mascaraLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function gettipo_tecla_mascarasModel() {		
		try {						
			/*tipo_tecla_mascarasModel.setWrappedData(tipo_tecla_mascaraLogic->gettipo_tecla_mascaras());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->tipo_tecla_mascarasModel;
	}
	
	public function settipo_tecla_mascarasModel($tipo_tecla_mascarasModel) {
		$this->tipo_tecla_mascarasModel = $tipo_tecla_mascarasModel;
	}
	
	public function gettipo_tecla_mascaras() : array {		
		return $this->tipo_tecla_mascaras;
	}
	
	public function settipo_tecla_mascaras(array $tipo_tecla_mascaras) {
		$this->tipo_tecla_mascaras= $tipo_tecla_mascaras;
	}
	
	public function gettipo_tecla_mascarasEliminados() : array {		
		return $this->tipo_tecla_mascarasEliminados;
	}
	
	public function settipo_tecla_mascarasEliminados(array $tipo_tecla_mascarasEliminados) {
		$this->tipo_tecla_mascarasEliminados= $tipo_tecla_mascarasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function gettipo_tecla_mascaraActualFromListDataModel() {
		try {
			/*$tipo_tecla_mascaraClase= $this->tipo_tecla_mascarasModel->getRowData();*/
			
			/*return $tipo_tecla_mascara;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
