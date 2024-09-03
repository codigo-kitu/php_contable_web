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

namespace com\bydan\contabilidad\seguridad\grupo_opcion\presentation\control;

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

use com\bydan\contabilidad\seguridad\grupo_opcion\business\entity\grupo_opcion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/grupo_opcion/util/grupo_opcion_carga.php');
use com\bydan\contabilidad\seguridad\grupo_opcion\util\grupo_opcion_carga;

use com\bydan\contabilidad\seguridad\grupo_opcion\util\grupo_opcion_util;
use com\bydan\contabilidad\seguridad\grupo_opcion\util\grupo_opcion_param_return;
use com\bydan\contabilidad\seguridad\grupo_opcion\business\logic\grupo_opcion_logic;
use com\bydan\contabilidad\seguridad\grupo_opcion\presentation\session\grupo_opcion_session;


//FK


use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;

//REL


use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;
use com\bydan\contabilidad\seguridad\opcion\presentation\session\opcion_session;


/*CARGA ARCHIVOS FRAMEWORK*/
grupo_opcion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
grupo_opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
grupo_opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
grupo_opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*grupo_opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class grupo_opcion_init_control extends ControllerBase {	
	
	public $grupo_opcionClase=null;	
	public $grupo_opcionsModel=null;	
	public $grupo_opcionsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idgrupo_opcion=0;	
	public ?int $idgrupo_opcionActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $grupo_opcionLogic=null;
	
	public $grupo_opcionActual=null;	
	
	public $grupo_opcion=null;
	public $grupo_opcions=null;
	public $grupo_opcionsEliminados=array();
	public $grupo_opcionsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $grupo_opcionsLocal=array();
	public ?array $grupo_opcionsReporte=null;
	public ?array $grupo_opcionsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadgrupo_opcion='onload';
	public string $strTipoPaginaAuxiliargrupo_opcion='none';
	public string $strTipoUsuarioAuxiliargrupo_opcion='none';
		
	public $grupo_opcionReturnGeneral=null;
	public $grupo_opcionParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $grupo_opcionModel=null;
	public $grupo_opcionControllerAdditional=null;
	
	
	

	public $opcionLogic=null;

	public function  getopcionLogic() {
		return $this->opcionLogic;
	}

	public function setopcionLogic($opcionLogic) {
		$this->opcionLogic =$opcionLogic;
	}
 	
	
	public string $strMensajeid_modulo='';
	public string $strMensajecodigo='';
	public string $strMensajenombre_principal='';
	public string $strMensajeorden='';
	public string $strMensajeestado='';
	
	
	public string $strVisibleFK_Idmodulo='display:table-row';

	
	public array $modulosFK=array();

	public function getmodulosFK():array {
		return $this->modulosFK;
	}

	public function setmodulosFK(array $modulosFK) {
		$this->modulosFK = $modulosFK;
	}

	public int $idmoduloDefaultFK=-1;

	public function getIdmoduloDefaultFK():int {
		return $this->idmoduloDefaultFK;
	}

	public function setIdmoduloDefaultFK(int $idmoduloDefaultFK) {
		$this->idmoduloDefaultFK = $idmoduloDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosopcion='none';
	
	
	public  $id_moduloFK_Idmodulo=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->grupo_opcionLogic==null) {
				$this->grupo_opcionLogic=new grupo_opcion_logic();
			}
			
		} else {
			if($this->grupo_opcionLogic==null) {
				$this->grupo_opcionLogic=new grupo_opcion_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->grupo_opcionClase==null) {
				$this->grupo_opcionClase=new grupo_opcion();
			}
			
			$this->grupo_opcionClase->setId(0);	
				
				
			$this->grupo_opcionClase->setid_modulo(-1);	
			$this->grupo_opcionClase->setcodigo('');	
			$this->grupo_opcionClase->setnombre_principal('');	
			$this->grupo_opcionClase->setorden(0);	
			$this->grupo_opcionClase->setestado(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('grupo_opcion');
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
		$this->cargarParametrosReporteBase('grupo_opcion');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('grupo_opcion');
	}
	
	public function actualizarControllerConReturnGeneral(grupo_opcion_param_return $grupo_opcionReturnGeneral) {
		if($grupo_opcionReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesgrupo_opcionsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$grupo_opcionReturnGeneral->getsMensajeProceso();
		}
		
		if($grupo_opcionReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$grupo_opcionReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($grupo_opcionReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$grupo_opcionReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$grupo_opcionReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($grupo_opcionReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($grupo_opcionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$grupo_opcionReturnGeneral->getsFuncionJs();
		}
		
		if($grupo_opcionReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(grupo_opcion_session $grupo_opcion_session){
		$this->strStyleDivArbol=$grupo_opcion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$grupo_opcion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$grupo_opcion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$grupo_opcion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$grupo_opcion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$grupo_opcion_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$grupo_opcion_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(grupo_opcion_session $grupo_opcion_session){
		$grupo_opcion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$grupo_opcion_session->strStyleDivHeader='display:none';			
		$grupo_opcion_session->strStyleDivContent='width:93%;height:100%';	
		$grupo_opcion_session->strStyleDivOpcionesBanner='display:none';	
		$grupo_opcion_session->strStyleDivExpandirColapsar='display:none';	
		$grupo_opcion_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(grupo_opcion_control $grupo_opcion_control_session){
		$this->idNuevo=$grupo_opcion_control_session->idNuevo;
		$this->grupo_opcionActual=$grupo_opcion_control_session->grupo_opcionActual;
		$this->grupo_opcion=$grupo_opcion_control_session->grupo_opcion;
		$this->grupo_opcionClase=$grupo_opcion_control_session->grupo_opcionClase;
		$this->grupo_opcions=$grupo_opcion_control_session->grupo_opcions;
		$this->grupo_opcionsEliminados=$grupo_opcion_control_session->grupo_opcionsEliminados;
		$this->grupo_opcion=$grupo_opcion_control_session->grupo_opcion;
		$this->grupo_opcionsReporte=$grupo_opcion_control_session->grupo_opcionsReporte;
		$this->grupo_opcionsSeleccionados=$grupo_opcion_control_session->grupo_opcionsSeleccionados;
		$this->arrOrderBy=$grupo_opcion_control_session->arrOrderBy;
		$this->arrOrderByRel=$grupo_opcion_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$grupo_opcion_control_session->arrHistoryWebs;
		$this->arrSessionBases=$grupo_opcion_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadgrupo_opcion=$grupo_opcion_control_session->strTypeOnLoadgrupo_opcion;
		$this->strTipoPaginaAuxiliargrupo_opcion=$grupo_opcion_control_session->strTipoPaginaAuxiliargrupo_opcion;
		$this->strTipoUsuarioAuxiliargrupo_opcion=$grupo_opcion_control_session->strTipoUsuarioAuxiliargrupo_opcion;	
		
		$this->bitEsPopup=$grupo_opcion_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$grupo_opcion_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$grupo_opcion_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$grupo_opcion_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$grupo_opcion_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$grupo_opcion_control_session->strSufijo;
		$this->bitEsRelaciones=$grupo_opcion_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$grupo_opcion_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$grupo_opcion_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$grupo_opcion_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$grupo_opcion_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$grupo_opcion_control_session->strTituloTabla;
		$this->strTituloPathPagina=$grupo_opcion_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$grupo_opcion_control_session->strTituloPathElementoActual;
		
		if($this->grupo_opcionLogic==null) {			
			$this->grupo_opcionLogic=new grupo_opcion_logic();
		}
		
		
		if($this->grupo_opcionClase==null) {
			$this->grupo_opcionClase=new grupo_opcion();	
		}
		
		$this->grupo_opcionLogic->setgrupo_opcion($this->grupo_opcionClase);
		
		
		if($this->grupo_opcions==null) {
			$this->grupo_opcions=array();	
		}
		
		$this->grupo_opcionLogic->setgrupo_opcions($this->grupo_opcions);
		
		
		$this->strTipoView=$grupo_opcion_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$grupo_opcion_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$grupo_opcion_control_session->datosCliente;
		$this->strAccionBusqueda=$grupo_opcion_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$grupo_opcion_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$grupo_opcion_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$grupo_opcion_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$grupo_opcion_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$grupo_opcion_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$grupo_opcion_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$grupo_opcion_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$grupo_opcion_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$grupo_opcion_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$grupo_opcion_control_session->strTipoPaginacion;
		$this->strTipoAccion=$grupo_opcion_control_session->strTipoAccion;
		$this->tiposReportes=$grupo_opcion_control_session->tiposReportes;
		$this->tiposReporte=$grupo_opcion_control_session->tiposReporte;
		$this->tiposAcciones=$grupo_opcion_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$grupo_opcion_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$grupo_opcion_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$grupo_opcion_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$grupo_opcion_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$grupo_opcion_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$grupo_opcion_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$grupo_opcion_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$grupo_opcion_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$grupo_opcion_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$grupo_opcion_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$grupo_opcion_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$grupo_opcion_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$grupo_opcion_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$grupo_opcion_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$grupo_opcion_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$grupo_opcion_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$grupo_opcion_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$grupo_opcion_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$grupo_opcion_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$grupo_opcion_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$grupo_opcion_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$grupo_opcion_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$grupo_opcion_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$grupo_opcion_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$grupo_opcion_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$grupo_opcion_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$grupo_opcion_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$grupo_opcion_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$grupo_opcion_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$grupo_opcion_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$grupo_opcion_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$grupo_opcion_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$grupo_opcion_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$grupo_opcion_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$grupo_opcion_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$grupo_opcion_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$grupo_opcion_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$grupo_opcion_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$grupo_opcion_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$grupo_opcion_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$grupo_opcion_control_session->resumenUsuarioActual;	
		$this->moduloActual=$grupo_opcion_control_session->moduloActual;	
		$this->opcionActual=$grupo_opcion_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$grupo_opcion_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$grupo_opcion_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$grupo_opcion_session=unserialize($this->Session->read(grupo_opcion_util::$STR_SESSION_NAME));
				
		if($grupo_opcion_session==null) {
			$grupo_opcion_session=new grupo_opcion_session();
		}
		
		$this->strStyleDivArbol=$grupo_opcion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$grupo_opcion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$grupo_opcion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$grupo_opcion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$grupo_opcion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$grupo_opcion_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$grupo_opcion_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$grupo_opcion_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$grupo_opcion_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$grupo_opcion_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$grupo_opcion_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_modulo=$grupo_opcion_control_session->strMensajeid_modulo;
		$this->strMensajecodigo=$grupo_opcion_control_session->strMensajecodigo;
		$this->strMensajenombre_principal=$grupo_opcion_control_session->strMensajenombre_principal;
		$this->strMensajeorden=$grupo_opcion_control_session->strMensajeorden;
		$this->strMensajeestado=$grupo_opcion_control_session->strMensajeestado;
			
		
		$this->modulosFK=$grupo_opcion_control_session->modulosFK;
		$this->idmoduloDefaultFK=$grupo_opcion_control_session->idmoduloDefaultFK;
		
		
		$this->strVisibleFK_Idmodulo=$grupo_opcion_control_session->strVisibleFK_Idmodulo;
		
		
		$this->strTienePermisosopcion=$grupo_opcion_control_session->strTienePermisosopcion;
		
		
		$this->id_moduloFK_Idmodulo=$grupo_opcion_control_session->id_moduloFK_Idmodulo;

		
		
		
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
	
	public function getgrupo_opcionControllerAdditional() {
		return $this->grupo_opcionControllerAdditional;
	}

	public function setgrupo_opcionControllerAdditional($grupo_opcionControllerAdditional) {
		$this->grupo_opcionControllerAdditional = $grupo_opcionControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getgrupo_opcionActual() : grupo_opcion {
		return $this->grupo_opcionActual;
	}

	public function setgrupo_opcionActual(grupo_opcion $grupo_opcionActual) {
		$this->grupo_opcionActual = $grupo_opcionActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidgrupo_opcion() : int {
		return $this->idgrupo_opcion;
	}

	public function setidgrupo_opcion(int $idgrupo_opcion) {
		$this->idgrupo_opcion = $idgrupo_opcion;
	}
	
	public function getgrupo_opcion() : grupo_opcion {
		return $this->grupo_opcion;
	}

	public function setgrupo_opcion(grupo_opcion $grupo_opcion) {
		$this->grupo_opcion = $grupo_opcion;
	}
		
	public function getgrupo_opcionLogic() : grupo_opcion_logic {		
		return $this->grupo_opcionLogic;
	}

	public function setgrupo_opcionLogic(grupo_opcion_logic $grupo_opcionLogic) {
		$this->grupo_opcionLogic = $grupo_opcionLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getgrupo_opcionsModel() {		
		try {						
			/*grupo_opcionsModel.setWrappedData(grupo_opcionLogic->getgrupo_opcions());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->grupo_opcionsModel;
	}
	
	public function setgrupo_opcionsModel($grupo_opcionsModel) {
		$this->grupo_opcionsModel = $grupo_opcionsModel;
	}
	
	public function getgrupo_opcions() : array {		
		return $this->grupo_opcions;
	}
	
	public function setgrupo_opcions(array $grupo_opcions) {
		$this->grupo_opcions= $grupo_opcions;
	}
	
	public function getgrupo_opcionsEliminados() : array {		
		return $this->grupo_opcionsEliminados;
	}
	
	public function setgrupo_opcionsEliminados(array $grupo_opcionsEliminados) {
		$this->grupo_opcionsEliminados= $grupo_opcionsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getgrupo_opcionActualFromListDataModel() {
		try {
			/*$grupo_opcionClase= $this->grupo_opcionsModel->getRowData();*/
			
			/*return $grupo_opcion;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
