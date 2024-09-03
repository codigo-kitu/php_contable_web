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

namespace com\bydan\contabilidad\seguridad\historial_cambio_clave\presentation\control;

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

use com\bydan\contabilidad\seguridad\historial_cambio_clave\business\entity\historial_cambio_clave;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/historial_cambio_clave/util/historial_cambio_clave_carga.php');
use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_carga;

use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_util;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\util\historial_cambio_clave_param_return;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\business\logic\historial_cambio_clave_logic;
use com\bydan\contabilidad\seguridad\historial_cambio_clave\presentation\session\historial_cambio_clave_session;


//FK


use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
historial_cambio_clave_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
historial_cambio_clave_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
historial_cambio_clave_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
historial_cambio_clave_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*historial_cambio_clave_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class historial_cambio_clave_init_control extends ControllerBase {	
	
	public $historial_cambio_claveClase=null;	
	public $historial_cambio_clavesModel=null;	
	public $historial_cambio_clavesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idhistorial_cambio_clave=0;	
	public ?int $idhistorial_cambio_claveActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $historial_cambio_claveLogic=null;
	
	public $historial_cambio_claveActual=null;	
	
	public $historial_cambio_clave=null;
	public $historial_cambio_claves=null;
	public $historial_cambio_clavesEliminados=array();
	public $historial_cambio_clavesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $historial_cambio_clavesLocal=array();
	public ?array $historial_cambio_clavesReporte=null;
	public ?array $historial_cambio_clavesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadhistorial_cambio_clave='onload';
	public string $strTipoPaginaAuxiliarhistorial_cambio_clave='none';
	public string $strTipoUsuarioAuxiliarhistorial_cambio_clave='none';
		
	public $historial_cambio_claveReturnGeneral=null;
	public $historial_cambio_claveParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $historial_cambio_claveModel=null;
	public $historial_cambio_claveControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_usuario='';
	public string $strMensajenombre='';
	public string $strMensajefecha_hora='';
	public string $strMensajeobservacion='';
	
	
	public string $strVisibleBusquedaPorIdUsuarioPorFechaHora='display:table-row';
	public string $strVisibleFK_Idusuario='display:table-row';

	
	public array $usuariosFK=array();

	public function getusuariosFK():array {
		return $this->usuariosFK;
	}

	public function setusuariosFK(array $usuariosFK) {
		$this->usuariosFK = $usuariosFK;
	}

	public int $idusuarioDefaultFK=-1;

	public function getIdusuarioDefaultFK():int {
		return $this->idusuarioDefaultFK;
	}

	public function setIdusuarioDefaultFK(int $idusuarioDefaultFK) {
		$this->idusuarioDefaultFK = $idusuarioDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_usuarioBusquedaPorIdUsuarioPorFechaHora=null;


	public  $fecha_horaBusquedaPorIdUsuarioPorFechaHora=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->historial_cambio_claveLogic==null) {
				$this->historial_cambio_claveLogic=new historial_cambio_clave_logic();
			}
			
		} else {
			if($this->historial_cambio_claveLogic==null) {
				$this->historial_cambio_claveLogic=new historial_cambio_clave_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->historial_cambio_claveClase==null) {
				$this->historial_cambio_claveClase=new historial_cambio_clave();
			}
			
			$this->historial_cambio_claveClase->setId(0);	
				
				
			$this->historial_cambio_claveClase->setid_usuario(-1);	
			$this->historial_cambio_claveClase->setnombre('');	
			$this->historial_cambio_claveClase->setfecha_hora(date('Y-m-d'));	
			$this->historial_cambio_claveClase->setobservacion('');	
			
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
		$this->prepararEjecutarMantenimientoBase('historial_cambio_clave');
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
		$this->cargarParametrosReporteBase('historial_cambio_clave');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('historial_cambio_clave');
	}
	
	public function actualizarControllerConReturnGeneral(historial_cambio_clave_param_return $historial_cambio_claveReturnGeneral) {
		if($historial_cambio_claveReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajeshistorial_cambio_clavesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$historial_cambio_claveReturnGeneral->getsMensajeProceso();
		}
		
		if($historial_cambio_claveReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$historial_cambio_claveReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($historial_cambio_claveReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$historial_cambio_claveReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$historial_cambio_claveReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($historial_cambio_claveReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($historial_cambio_claveReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$historial_cambio_claveReturnGeneral->getsFuncionJs();
		}
		
		if($historial_cambio_claveReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(historial_cambio_clave_session $historial_cambio_clave_session){
		$this->strStyleDivArbol=$historial_cambio_clave_session->strStyleDivArbol;	
		$this->strStyleDivContent=$historial_cambio_clave_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$historial_cambio_clave_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$historial_cambio_clave_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$historial_cambio_clave_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$historial_cambio_clave_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$historial_cambio_clave_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(historial_cambio_clave_session $historial_cambio_clave_session){
		$historial_cambio_clave_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$historial_cambio_clave_session->strStyleDivHeader='display:none';			
		$historial_cambio_clave_session->strStyleDivContent='width:93%;height:100%';	
		$historial_cambio_clave_session->strStyleDivOpcionesBanner='display:none';	
		$historial_cambio_clave_session->strStyleDivExpandirColapsar='display:none';	
		$historial_cambio_clave_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(historial_cambio_clave_control $historial_cambio_clave_control_session){
		$this->idNuevo=$historial_cambio_clave_control_session->idNuevo;
		$this->historial_cambio_claveActual=$historial_cambio_clave_control_session->historial_cambio_claveActual;
		$this->historial_cambio_clave=$historial_cambio_clave_control_session->historial_cambio_clave;
		$this->historial_cambio_claveClase=$historial_cambio_clave_control_session->historial_cambio_claveClase;
		$this->historial_cambio_claves=$historial_cambio_clave_control_session->historial_cambio_claves;
		$this->historial_cambio_clavesEliminados=$historial_cambio_clave_control_session->historial_cambio_clavesEliminados;
		$this->historial_cambio_clave=$historial_cambio_clave_control_session->historial_cambio_clave;
		$this->historial_cambio_clavesReporte=$historial_cambio_clave_control_session->historial_cambio_clavesReporte;
		$this->historial_cambio_clavesSeleccionados=$historial_cambio_clave_control_session->historial_cambio_clavesSeleccionados;
		$this->arrOrderBy=$historial_cambio_clave_control_session->arrOrderBy;
		$this->arrOrderByRel=$historial_cambio_clave_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$historial_cambio_clave_control_session->arrHistoryWebs;
		$this->arrSessionBases=$historial_cambio_clave_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadhistorial_cambio_clave=$historial_cambio_clave_control_session->strTypeOnLoadhistorial_cambio_clave;
		$this->strTipoPaginaAuxiliarhistorial_cambio_clave=$historial_cambio_clave_control_session->strTipoPaginaAuxiliarhistorial_cambio_clave;
		$this->strTipoUsuarioAuxiliarhistorial_cambio_clave=$historial_cambio_clave_control_session->strTipoUsuarioAuxiliarhistorial_cambio_clave;	
		
		$this->bitEsPopup=$historial_cambio_clave_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$historial_cambio_clave_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$historial_cambio_clave_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$historial_cambio_clave_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$historial_cambio_clave_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$historial_cambio_clave_control_session->strSufijo;
		$this->bitEsRelaciones=$historial_cambio_clave_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$historial_cambio_clave_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$historial_cambio_clave_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$historial_cambio_clave_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$historial_cambio_clave_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$historial_cambio_clave_control_session->strTituloTabla;
		$this->strTituloPathPagina=$historial_cambio_clave_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$historial_cambio_clave_control_session->strTituloPathElementoActual;
		
		if($this->historial_cambio_claveLogic==null) {			
			$this->historial_cambio_claveLogic=new historial_cambio_clave_logic();
		}
		
		
		if($this->historial_cambio_claveClase==null) {
			$this->historial_cambio_claveClase=new historial_cambio_clave();	
		}
		
		$this->historial_cambio_claveLogic->sethistorial_cambio_clave($this->historial_cambio_claveClase);
		
		
		if($this->historial_cambio_claves==null) {
			$this->historial_cambio_claves=array();	
		}
		
		$this->historial_cambio_claveLogic->sethistorial_cambio_claves($this->historial_cambio_claves);
		
		
		$this->strTipoView=$historial_cambio_clave_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$historial_cambio_clave_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$historial_cambio_clave_control_session->datosCliente;
		$this->strAccionBusqueda=$historial_cambio_clave_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$historial_cambio_clave_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$historial_cambio_clave_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$historial_cambio_clave_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$historial_cambio_clave_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$historial_cambio_clave_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$historial_cambio_clave_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$historial_cambio_clave_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$historial_cambio_clave_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$historial_cambio_clave_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$historial_cambio_clave_control_session->strTipoPaginacion;
		$this->strTipoAccion=$historial_cambio_clave_control_session->strTipoAccion;
		$this->tiposReportes=$historial_cambio_clave_control_session->tiposReportes;
		$this->tiposReporte=$historial_cambio_clave_control_session->tiposReporte;
		$this->tiposAcciones=$historial_cambio_clave_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$historial_cambio_clave_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$historial_cambio_clave_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$historial_cambio_clave_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$historial_cambio_clave_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$historial_cambio_clave_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$historial_cambio_clave_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$historial_cambio_clave_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$historial_cambio_clave_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$historial_cambio_clave_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$historial_cambio_clave_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$historial_cambio_clave_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$historial_cambio_clave_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$historial_cambio_clave_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$historial_cambio_clave_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$historial_cambio_clave_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$historial_cambio_clave_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$historial_cambio_clave_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$historial_cambio_clave_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$historial_cambio_clave_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$historial_cambio_clave_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$historial_cambio_clave_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$historial_cambio_clave_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$historial_cambio_clave_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$historial_cambio_clave_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$historial_cambio_clave_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$historial_cambio_clave_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$historial_cambio_clave_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$historial_cambio_clave_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$historial_cambio_clave_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$historial_cambio_clave_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$historial_cambio_clave_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$historial_cambio_clave_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$historial_cambio_clave_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$historial_cambio_clave_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$historial_cambio_clave_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$historial_cambio_clave_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$historial_cambio_clave_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$historial_cambio_clave_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$historial_cambio_clave_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$historial_cambio_clave_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$historial_cambio_clave_control_session->resumenUsuarioActual;	
		$this->moduloActual=$historial_cambio_clave_control_session->moduloActual;	
		$this->opcionActual=$historial_cambio_clave_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$historial_cambio_clave_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$historial_cambio_clave_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$historial_cambio_clave_session=unserialize($this->Session->read(historial_cambio_clave_util::$STR_SESSION_NAME));
				
		if($historial_cambio_clave_session==null) {
			$historial_cambio_clave_session=new historial_cambio_clave_session();
		}
		
		$this->strStyleDivArbol=$historial_cambio_clave_session->strStyleDivArbol;	
		$this->strStyleDivContent=$historial_cambio_clave_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$historial_cambio_clave_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$historial_cambio_clave_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$historial_cambio_clave_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$historial_cambio_clave_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$historial_cambio_clave_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$historial_cambio_clave_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$historial_cambio_clave_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$historial_cambio_clave_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$historial_cambio_clave_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_usuario=$historial_cambio_clave_control_session->strMensajeid_usuario;
		$this->strMensajenombre=$historial_cambio_clave_control_session->strMensajenombre;
		$this->strMensajefecha_hora=$historial_cambio_clave_control_session->strMensajefecha_hora;
		$this->strMensajeobservacion=$historial_cambio_clave_control_session->strMensajeobservacion;
			
		
		$this->usuariosFK=$historial_cambio_clave_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$historial_cambio_clave_control_session->idusuarioDefaultFK;
		
		
		$this->strVisibleBusquedaPorIdUsuarioPorFechaHora=$historial_cambio_clave_control_session->strVisibleBusquedaPorIdUsuarioPorFechaHora;
		$this->strVisibleFK_Idusuario=$historial_cambio_clave_control_session->strVisibleFK_Idusuario;
		
		
		
		
		$this->id_usuarioBusquedaPorIdUsuarioPorFechaHora=$historial_cambio_clave_control_session->id_usuarioBusquedaPorIdUsuarioPorFechaHora;

		$this->fecha_horaBusquedaPorIdUsuarioPorFechaHora=$historial_cambio_clave_control_session->fecha_horaBusquedaPorIdUsuarioPorFechaHora;
		$this->id_usuarioFK_Idusuario=$historial_cambio_clave_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function gethistorial_cambio_claveControllerAdditional() {
		return $this->historial_cambio_claveControllerAdditional;
	}

	public function sethistorial_cambio_claveControllerAdditional($historial_cambio_claveControllerAdditional) {
		$this->historial_cambio_claveControllerAdditional = $historial_cambio_claveControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function gethistorial_cambio_claveActual() : historial_cambio_clave {
		return $this->historial_cambio_claveActual;
	}

	public function sethistorial_cambio_claveActual(historial_cambio_clave $historial_cambio_claveActual) {
		$this->historial_cambio_claveActual = $historial_cambio_claveActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidhistorial_cambio_clave() : int {
		return $this->idhistorial_cambio_clave;
	}

	public function setidhistorial_cambio_clave(int $idhistorial_cambio_clave) {
		$this->idhistorial_cambio_clave = $idhistorial_cambio_clave;
	}
	
	public function gethistorial_cambio_clave() : historial_cambio_clave {
		return $this->historial_cambio_clave;
	}

	public function sethistorial_cambio_clave(historial_cambio_clave $historial_cambio_clave) {
		$this->historial_cambio_clave = $historial_cambio_clave;
	}
		
	public function gethistorial_cambio_claveLogic() : historial_cambio_clave_logic {		
		return $this->historial_cambio_claveLogic;
	}

	public function sethistorial_cambio_claveLogic(historial_cambio_clave_logic $historial_cambio_claveLogic) {
		$this->historial_cambio_claveLogic = $historial_cambio_claveLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function gethistorial_cambio_clavesModel() {		
		try {						
			/*historial_cambio_clavesModel.setWrappedData(historial_cambio_claveLogic->gethistorial_cambio_claves());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->historial_cambio_clavesModel;
	}
	
	public function sethistorial_cambio_clavesModel($historial_cambio_clavesModel) {
		$this->historial_cambio_clavesModel = $historial_cambio_clavesModel;
	}
	
	public function gethistorial_cambio_claves() : array {		
		return $this->historial_cambio_claves;
	}
	
	public function sethistorial_cambio_claves(array $historial_cambio_claves) {
		$this->historial_cambio_claves= $historial_cambio_claves;
	}
	
	public function gethistorial_cambio_clavesEliminados() : array {		
		return $this->historial_cambio_clavesEliminados;
	}
	
	public function sethistorial_cambio_clavesEliminados(array $historial_cambio_clavesEliminados) {
		$this->historial_cambio_clavesEliminados= $historial_cambio_clavesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function gethistorial_cambio_claveActualFromListDataModel() {
		try {
			/*$historial_cambio_claveClase= $this->historial_cambio_clavesModel->getRowData();*/
			
			/*return $historial_cambio_clave;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
