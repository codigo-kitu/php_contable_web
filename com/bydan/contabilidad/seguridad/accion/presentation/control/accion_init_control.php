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

namespace com\bydan\contabilidad\seguridad\accion\presentation\control;

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

use com\bydan\contabilidad\seguridad\accion\business\entity\accion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/accion/util/accion_carga.php');
use com\bydan\contabilidad\seguridad\accion\util\accion_carga;

use com\bydan\contabilidad\seguridad\accion\util\accion_util;
use com\bydan\contabilidad\seguridad\accion\util\accion_param_return;
use com\bydan\contabilidad\seguridad\accion\business\logic\accion_logic;
use com\bydan\contabilidad\seguridad\accion\presentation\session\accion_session;


//FK


use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\opcion\business\logic\opcion_logic;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;

//REL


use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;
use com\bydan\contabilidad\seguridad\perfil\presentation\session\perfil_session;

use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_carga;
use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_util;
use com\bydan\contabilidad\seguridad\perfil_accion\presentation\session\perfil_accion_session;


/*CARGA ARCHIVOS FRAMEWORK*/
accion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
accion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
accion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
accion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*accion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class accion_init_control extends ControllerBase {	
	
	public $accionClase=null;	
	public $accionsModel=null;	
	public $accionsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idaccion=0;	
	public ?int $idaccionActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $accionLogic=null;
	
	public $accionActual=null;	
	
	public $accion=null;
	public $accions=null;
	public $accionsEliminados=array();
	public $accionsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $accionsLocal=array();
	public ?array $accionsReporte=null;
	public ?array $accionsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadaccion='onload';
	public string $strTipoPaginaAuxiliaraccion='none';
	public string $strTipoUsuarioAuxiliaraccion='none';
		
	public $accionReturnGeneral=null;
	public $accionParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $accionModel=null;
	public $accionControllerAdditional=null;
	
	
	

	public $perfilaccionLogic=null;

	public function  getperfil_accionLogic() {
		return $this->perfilaccionLogic;
	}

	public function setperfil_accionLogic($perfilaccionLogic) {
		$this->perfilaccionLogic =$perfilaccionLogic;
	}
 	
	
	public string $strMensajeid_opcion='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajedescripcion='';
	public string $strMensajeestado='';
	
	
	public string $strVisibleFK_Idopcion='display:table-row';

	
	public array $opcionsFK=array();

	public function getopcionsFK():array {
		return $this->opcionsFK;
	}

	public function setopcionsFK(array $opcionsFK) {
		$this->opcionsFK = $opcionsFK;
	}

	public int $idopcionDefaultFK=-1;

	public function getIdopcionDefaultFK():int {
		return $this->idopcionDefaultFK;
	}

	public function setIdopcionDefaultFK(int $idopcionDefaultFK) {
		$this->idopcionDefaultFK = $idopcionDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosperfil_accion='none';
	
	
	public  $id_opcionFK_Idopcion=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->accionLogic==null) {
				$this->accionLogic=new accion_logic();
			}
			
		} else {
			if($this->accionLogic==null) {
				$this->accionLogic=new accion_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->accionClase==null) {
				$this->accionClase=new accion();
			}
			
			$this->accionClase->setId(0);	
				
				
			$this->accionClase->setid_opcion(-1);	
			$this->accionClase->setcodigo('');	
			$this->accionClase->setnombre('');	
			$this->accionClase->setdescripcion('');	
			$this->accionClase->setestado(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('accion');
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
		$this->cargarParametrosReporteBase('accion');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('accion');
	}
	
	public function actualizarControllerConReturnGeneral(accion_param_return $accionReturnGeneral) {
		if($accionReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesaccionsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$accionReturnGeneral->getsMensajeProceso();
		}
		
		if($accionReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$accionReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($accionReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$accionReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$accionReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($accionReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($accionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$accionReturnGeneral->getsFuncionJs();
		}
		
		if($accionReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(accion_session $accion_session){
		$this->strStyleDivArbol=$accion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$accion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$accion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$accion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$accion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$accion_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$accion_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(accion_session $accion_session){
		$accion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$accion_session->strStyleDivHeader='display:none';			
		$accion_session->strStyleDivContent='width:93%;height:100%';	
		$accion_session->strStyleDivOpcionesBanner='display:none';	
		$accion_session->strStyleDivExpandirColapsar='display:none';	
		$accion_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(accion_control $accion_control_session){
		$this->idNuevo=$accion_control_session->idNuevo;
		$this->accionActual=$accion_control_session->accionActual;
		$this->accion=$accion_control_session->accion;
		$this->accionClase=$accion_control_session->accionClase;
		$this->accions=$accion_control_session->accions;
		$this->accionsEliminados=$accion_control_session->accionsEliminados;
		$this->accion=$accion_control_session->accion;
		$this->accionsReporte=$accion_control_session->accionsReporte;
		$this->accionsSeleccionados=$accion_control_session->accionsSeleccionados;
		$this->arrOrderBy=$accion_control_session->arrOrderBy;
		$this->arrOrderByRel=$accion_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$accion_control_session->arrHistoryWebs;
		$this->arrSessionBases=$accion_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadaccion=$accion_control_session->strTypeOnLoadaccion;
		$this->strTipoPaginaAuxiliaraccion=$accion_control_session->strTipoPaginaAuxiliaraccion;
		$this->strTipoUsuarioAuxiliaraccion=$accion_control_session->strTipoUsuarioAuxiliaraccion;	
		
		$this->bitEsPopup=$accion_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$accion_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$accion_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$accion_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$accion_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$accion_control_session->strSufijo;
		$this->bitEsRelaciones=$accion_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$accion_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$accion_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$accion_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$accion_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$accion_control_session->strTituloTabla;
		$this->strTituloPathPagina=$accion_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$accion_control_session->strTituloPathElementoActual;
		
		if($this->accionLogic==null) {			
			$this->accionLogic=new accion_logic();
		}
		
		
		if($this->accionClase==null) {
			$this->accionClase=new accion();	
		}
		
		$this->accionLogic->setaccion($this->accionClase);
		
		
		if($this->accions==null) {
			$this->accions=array();	
		}
		
		$this->accionLogic->setaccions($this->accions);
		
		
		$this->strTipoView=$accion_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$accion_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$accion_control_session->datosCliente;
		$this->strAccionBusqueda=$accion_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$accion_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$accion_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$accion_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$accion_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$accion_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$accion_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$accion_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$accion_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$accion_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$accion_control_session->strTipoPaginacion;
		$this->strTipoAccion=$accion_control_session->strTipoAccion;
		$this->tiposReportes=$accion_control_session->tiposReportes;
		$this->tiposReporte=$accion_control_session->tiposReporte;
		$this->tiposAcciones=$accion_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$accion_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$accion_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$accion_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$accion_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$accion_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$accion_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$accion_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$accion_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$accion_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$accion_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$accion_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$accion_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$accion_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$accion_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$accion_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$accion_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$accion_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$accion_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$accion_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$accion_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$accion_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$accion_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$accion_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$accion_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$accion_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$accion_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$accion_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$accion_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$accion_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$accion_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$accion_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$accion_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$accion_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$accion_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$accion_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$accion_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$accion_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$accion_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$accion_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$accion_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$accion_control_session->resumenUsuarioActual;	
		$this->moduloActual=$accion_control_session->moduloActual;	
		$this->opcionActual=$accion_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$accion_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$accion_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$accion_session=unserialize($this->Session->read(accion_util::$STR_SESSION_NAME));
				
		if($accion_session==null) {
			$accion_session=new accion_session();
		}
		
		$this->strStyleDivArbol=$accion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$accion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$accion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$accion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$accion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$accion_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$accion_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$accion_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$accion_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$accion_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$accion_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_opcion=$accion_control_session->strMensajeid_opcion;
		$this->strMensajecodigo=$accion_control_session->strMensajecodigo;
		$this->strMensajenombre=$accion_control_session->strMensajenombre;
		$this->strMensajedescripcion=$accion_control_session->strMensajedescripcion;
		$this->strMensajeestado=$accion_control_session->strMensajeestado;
			
		
		$this->opcionsFK=$accion_control_session->opcionsFK;
		$this->idopcionDefaultFK=$accion_control_session->idopcionDefaultFK;
		
		
		$this->strVisibleFK_Idopcion=$accion_control_session->strVisibleFK_Idopcion;
		
		
		$this->strTienePermisosperfil_accion=$accion_control_session->strTienePermisosperfil_accion;
		
		
		$this->id_opcionFK_Idopcion=$accion_control_session->id_opcionFK_Idopcion;

		
		
		
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
	
	public function getaccionControllerAdditional() {
		return $this->accionControllerAdditional;
	}

	public function setaccionControllerAdditional($accionControllerAdditional) {
		$this->accionControllerAdditional = $accionControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getaccionActual() : accion {
		return $this->accionActual;
	}

	public function setaccionActual(accion $accionActual) {
		$this->accionActual = $accionActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidaccion() : int {
		return $this->idaccion;
	}

	public function setidaccion(int $idaccion) {
		$this->idaccion = $idaccion;
	}
	
	public function getaccion() : accion {
		return $this->accion;
	}

	public function setaccion(accion $accion) {
		$this->accion = $accion;
	}
		
	public function getaccionLogic() : accion_logic {		
		return $this->accionLogic;
	}

	public function setaccionLogic(accion_logic $accionLogic) {
		$this->accionLogic = $accionLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getaccionsModel() {		
		try {						
			/*accionsModel.setWrappedData(accionLogic->getaccions());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->accionsModel;
	}
	
	public function setaccionsModel($accionsModel) {
		$this->accionsModel = $accionsModel;
	}
	
	public function getaccions() : array {		
		return $this->accions;
	}
	
	public function setaccions(array $accions) {
		$this->accions= $accions;
	}
	
	public function getaccionsEliminados() : array {		
		return $this->accionsEliminados;
	}
	
	public function setaccionsEliminados(array $accionsEliminados) {
		$this->accionsEliminados= $accionsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getaccionActualFromListDataModel() {
		try {
			/*$accionClase= $this->accionsModel->getRowData();*/
			
			/*return $accion;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
