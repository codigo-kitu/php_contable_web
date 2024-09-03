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

namespace com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\presentation\control;

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

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\entity\tipo_cuenta_predefinida;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/tipo_cuenta_predefinida/util/tipo_cuenta_predefinida_carga.php');
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_carga;

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_util;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_param_return;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\logic\tipo_cuenta_predefinida_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\presentation\session\tipo_cuenta_predefinida_session;


//FK


//REL


use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_carga;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_util;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\session\cuenta_predefinida_session;


/*CARGA ARCHIVOS FRAMEWORK*/
tipo_cuenta_predefinida_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
tipo_cuenta_predefinida_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
tipo_cuenta_predefinida_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
tipo_cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*tipo_cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class tipo_cuenta_predefinida_init_control extends ControllerBase {	
	
	public $tipo_cuenta_predefinidaClase=null;	
	public $tipo_cuenta_predefinidasModel=null;	
	public $tipo_cuenta_predefinidasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idtipo_cuenta_predefinida=0;	
	public ?int $idtipo_cuenta_predefinidaActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $tipo_cuenta_predefinidaLogic=null;
	
	public $tipo_cuenta_predefinidaActual=null;	
	
	public $tipo_cuenta_predefinida=null;
	public $tipo_cuenta_predefinidas=null;
	public $tipo_cuenta_predefinidasEliminados=array();
	public $tipo_cuenta_predefinidasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $tipo_cuenta_predefinidasLocal=array();
	public ?array $tipo_cuenta_predefinidasReporte=null;
	public ?array $tipo_cuenta_predefinidasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadtipo_cuenta_predefinida='onload';
	public string $strTipoPaginaAuxiliartipo_cuenta_predefinida='none';
	public string $strTipoUsuarioAuxiliartipo_cuenta_predefinida='none';
		
	public $tipo_cuenta_predefinidaReturnGeneral=null;
	public $tipo_cuenta_predefinidaParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $tipo_cuenta_predefinidaModel=null;
	public $tipo_cuenta_predefinidaControllerAdditional=null;
	
	
	

	public $cuentapredefinidaLogic=null;

	public function  getcuenta_predefinidaLogic() {
		return $this->cuentapredefinidaLogic;
	}

	public function setcuenta_predefinidaLogic($cuentapredefinidaLogic) {
		$this->cuentapredefinidaLogic =$cuentapredefinidaLogic;
	}
 	
	
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajedescripcion='';
	
	

	
	
	
	
	
	
	
	public $strTienePermisoscuenta_predefinida='none';
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->tipo_cuenta_predefinidaLogic==null) {
				$this->tipo_cuenta_predefinidaLogic=new tipo_cuenta_predefinida_logic();
			}
			
		} else {
			if($this->tipo_cuenta_predefinidaLogic==null) {
				$this->tipo_cuenta_predefinidaLogic=new tipo_cuenta_predefinida_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->tipo_cuenta_predefinidaClase==null) {
				$this->tipo_cuenta_predefinidaClase=new tipo_cuenta_predefinida();
			}
			
			$this->tipo_cuenta_predefinidaClase->setId(0);	
				
				
			$this->tipo_cuenta_predefinidaClase->setcodigo('');	
			$this->tipo_cuenta_predefinidaClase->setnombre('');	
			$this->tipo_cuenta_predefinidaClase->setdescripcion('');	
			
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
		$this->prepararEjecutarMantenimientoBase('tipo_cuenta_predefinida');
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
		$this->cargarParametrosReporteBase('tipo_cuenta_predefinida');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('tipo_cuenta_predefinida');
	}
	
	public function actualizarControllerConReturnGeneral(tipo_cuenta_predefinida_param_return $tipo_cuenta_predefinidaReturnGeneral) {
		if($tipo_cuenta_predefinidaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajestipo_cuenta_predefinidasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$tipo_cuenta_predefinidaReturnGeneral->getsMensajeProceso();
		}
		
		if($tipo_cuenta_predefinidaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$tipo_cuenta_predefinidaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($tipo_cuenta_predefinidaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$tipo_cuenta_predefinidaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$tipo_cuenta_predefinidaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($tipo_cuenta_predefinidaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($tipo_cuenta_predefinidaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$tipo_cuenta_predefinidaReturnGeneral->getsFuncionJs();
		}
		
		if($tipo_cuenta_predefinidaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(tipo_cuenta_predefinida_session $tipo_cuenta_predefinida_session){
		$this->strStyleDivArbol=$tipo_cuenta_predefinida_session->strStyleDivArbol;	
		$this->strStyleDivContent=$tipo_cuenta_predefinida_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$tipo_cuenta_predefinida_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$tipo_cuenta_predefinida_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$tipo_cuenta_predefinida_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$tipo_cuenta_predefinida_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$tipo_cuenta_predefinida_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(tipo_cuenta_predefinida_session $tipo_cuenta_predefinida_session){
		$tipo_cuenta_predefinida_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$tipo_cuenta_predefinida_session->strStyleDivHeader='display:none';			
		$tipo_cuenta_predefinida_session->strStyleDivContent='width:93%;height:100%';	
		$tipo_cuenta_predefinida_session->strStyleDivOpcionesBanner='display:none';	
		$tipo_cuenta_predefinida_session->strStyleDivExpandirColapsar='display:none';	
		$tipo_cuenta_predefinida_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(tipo_cuenta_predefinida_control $tipo_cuenta_predefinida_control_session){
		$this->idNuevo=$tipo_cuenta_predefinida_control_session->idNuevo;
		$this->tipo_cuenta_predefinidaActual=$tipo_cuenta_predefinida_control_session->tipo_cuenta_predefinidaActual;
		$this->tipo_cuenta_predefinida=$tipo_cuenta_predefinida_control_session->tipo_cuenta_predefinida;
		$this->tipo_cuenta_predefinidaClase=$tipo_cuenta_predefinida_control_session->tipo_cuenta_predefinidaClase;
		$this->tipo_cuenta_predefinidas=$tipo_cuenta_predefinida_control_session->tipo_cuenta_predefinidas;
		$this->tipo_cuenta_predefinidasEliminados=$tipo_cuenta_predefinida_control_session->tipo_cuenta_predefinidasEliminados;
		$this->tipo_cuenta_predefinida=$tipo_cuenta_predefinida_control_session->tipo_cuenta_predefinida;
		$this->tipo_cuenta_predefinidasReporte=$tipo_cuenta_predefinida_control_session->tipo_cuenta_predefinidasReporte;
		$this->tipo_cuenta_predefinidasSeleccionados=$tipo_cuenta_predefinida_control_session->tipo_cuenta_predefinidasSeleccionados;
		$this->arrOrderBy=$tipo_cuenta_predefinida_control_session->arrOrderBy;
		$this->arrOrderByRel=$tipo_cuenta_predefinida_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$tipo_cuenta_predefinida_control_session->arrHistoryWebs;
		$this->arrSessionBases=$tipo_cuenta_predefinida_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadtipo_cuenta_predefinida=$tipo_cuenta_predefinida_control_session->strTypeOnLoadtipo_cuenta_predefinida;
		$this->strTipoPaginaAuxiliartipo_cuenta_predefinida=$tipo_cuenta_predefinida_control_session->strTipoPaginaAuxiliartipo_cuenta_predefinida;
		$this->strTipoUsuarioAuxiliartipo_cuenta_predefinida=$tipo_cuenta_predefinida_control_session->strTipoUsuarioAuxiliartipo_cuenta_predefinida;	
		
		$this->bitEsPopup=$tipo_cuenta_predefinida_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$tipo_cuenta_predefinida_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$tipo_cuenta_predefinida_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$tipo_cuenta_predefinida_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$tipo_cuenta_predefinida_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$tipo_cuenta_predefinida_control_session->strSufijo;
		$this->bitEsRelaciones=$tipo_cuenta_predefinida_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$tipo_cuenta_predefinida_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$tipo_cuenta_predefinida_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$tipo_cuenta_predefinida_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$tipo_cuenta_predefinida_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$tipo_cuenta_predefinida_control_session->strTituloTabla;
		$this->strTituloPathPagina=$tipo_cuenta_predefinida_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$tipo_cuenta_predefinida_control_session->strTituloPathElementoActual;
		
		if($this->tipo_cuenta_predefinidaLogic==null) {			
			$this->tipo_cuenta_predefinidaLogic=new tipo_cuenta_predefinida_logic();
		}
		
		
		if($this->tipo_cuenta_predefinidaClase==null) {
			$this->tipo_cuenta_predefinidaClase=new tipo_cuenta_predefinida();	
		}
		
		$this->tipo_cuenta_predefinidaLogic->settipo_cuenta_predefinida($this->tipo_cuenta_predefinidaClase);
		
		
		if($this->tipo_cuenta_predefinidas==null) {
			$this->tipo_cuenta_predefinidas=array();	
		}
		
		$this->tipo_cuenta_predefinidaLogic->settipo_cuenta_predefinidas($this->tipo_cuenta_predefinidas);
		
		
		$this->strTipoView=$tipo_cuenta_predefinida_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$tipo_cuenta_predefinida_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$tipo_cuenta_predefinida_control_session->datosCliente;
		$this->strAccionBusqueda=$tipo_cuenta_predefinida_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$tipo_cuenta_predefinida_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$tipo_cuenta_predefinida_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$tipo_cuenta_predefinida_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$tipo_cuenta_predefinida_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$tipo_cuenta_predefinida_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$tipo_cuenta_predefinida_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$tipo_cuenta_predefinida_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$tipo_cuenta_predefinida_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$tipo_cuenta_predefinida_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$tipo_cuenta_predefinida_control_session->strTipoPaginacion;
		$this->strTipoAccion=$tipo_cuenta_predefinida_control_session->strTipoAccion;
		$this->tiposReportes=$tipo_cuenta_predefinida_control_session->tiposReportes;
		$this->tiposReporte=$tipo_cuenta_predefinida_control_session->tiposReporte;
		$this->tiposAcciones=$tipo_cuenta_predefinida_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$tipo_cuenta_predefinida_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$tipo_cuenta_predefinida_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$tipo_cuenta_predefinida_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$tipo_cuenta_predefinida_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$tipo_cuenta_predefinida_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$tipo_cuenta_predefinida_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$tipo_cuenta_predefinida_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$tipo_cuenta_predefinida_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$tipo_cuenta_predefinida_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$tipo_cuenta_predefinida_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$tipo_cuenta_predefinida_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$tipo_cuenta_predefinida_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$tipo_cuenta_predefinida_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$tipo_cuenta_predefinida_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$tipo_cuenta_predefinida_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$tipo_cuenta_predefinida_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$tipo_cuenta_predefinida_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$tipo_cuenta_predefinida_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$tipo_cuenta_predefinida_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$tipo_cuenta_predefinida_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$tipo_cuenta_predefinida_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$tipo_cuenta_predefinida_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$tipo_cuenta_predefinida_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$tipo_cuenta_predefinida_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$tipo_cuenta_predefinida_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$tipo_cuenta_predefinida_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$tipo_cuenta_predefinida_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$tipo_cuenta_predefinida_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$tipo_cuenta_predefinida_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$tipo_cuenta_predefinida_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$tipo_cuenta_predefinida_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$tipo_cuenta_predefinida_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$tipo_cuenta_predefinida_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$tipo_cuenta_predefinida_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$tipo_cuenta_predefinida_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$tipo_cuenta_predefinida_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$tipo_cuenta_predefinida_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$tipo_cuenta_predefinida_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$tipo_cuenta_predefinida_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$tipo_cuenta_predefinida_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$tipo_cuenta_predefinida_control_session->resumenUsuarioActual;	
		$this->moduloActual=$tipo_cuenta_predefinida_control_session->moduloActual;	
		$this->opcionActual=$tipo_cuenta_predefinida_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$tipo_cuenta_predefinida_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$tipo_cuenta_predefinida_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$tipo_cuenta_predefinida_session=unserialize($this->Session->read(tipo_cuenta_predefinida_util::$STR_SESSION_NAME));
				
		if($tipo_cuenta_predefinida_session==null) {
			$tipo_cuenta_predefinida_session=new tipo_cuenta_predefinida_session();
		}
		
		$this->strStyleDivArbol=$tipo_cuenta_predefinida_session->strStyleDivArbol;	
		$this->strStyleDivContent=$tipo_cuenta_predefinida_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$tipo_cuenta_predefinida_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$tipo_cuenta_predefinida_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$tipo_cuenta_predefinida_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$tipo_cuenta_predefinida_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$tipo_cuenta_predefinida_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$tipo_cuenta_predefinida_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$tipo_cuenta_predefinida_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$tipo_cuenta_predefinida_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$tipo_cuenta_predefinida_session->strRecargarFkQuery;
		*/
		
		$this->strMensajecodigo=$tipo_cuenta_predefinida_control_session->strMensajecodigo;
		$this->strMensajenombre=$tipo_cuenta_predefinida_control_session->strMensajenombre;
		$this->strMensajedescripcion=$tipo_cuenta_predefinida_control_session->strMensajedescripcion;
			
		
		
		
		
		
		$this->strTienePermisoscuenta_predefinida=$tipo_cuenta_predefinida_control_session->strTienePermisoscuenta_predefinida;
		
		

		
		
		
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
	
	public function gettipo_cuenta_predefinidaControllerAdditional() {
		return $this->tipo_cuenta_predefinidaControllerAdditional;
	}

	public function settipo_cuenta_predefinidaControllerAdditional($tipo_cuenta_predefinidaControllerAdditional) {
		$this->tipo_cuenta_predefinidaControllerAdditional = $tipo_cuenta_predefinidaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function gettipo_cuenta_predefinidaActual() : tipo_cuenta_predefinida {
		return $this->tipo_cuenta_predefinidaActual;
	}

	public function settipo_cuenta_predefinidaActual(tipo_cuenta_predefinida $tipo_cuenta_predefinidaActual) {
		$this->tipo_cuenta_predefinidaActual = $tipo_cuenta_predefinidaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidtipo_cuenta_predefinida() : int {
		return $this->idtipo_cuenta_predefinida;
	}

	public function setidtipo_cuenta_predefinida(int $idtipo_cuenta_predefinida) {
		$this->idtipo_cuenta_predefinida = $idtipo_cuenta_predefinida;
	}
	
	public function gettipo_cuenta_predefinida() : tipo_cuenta_predefinida {
		return $this->tipo_cuenta_predefinida;
	}

	public function settipo_cuenta_predefinida(tipo_cuenta_predefinida $tipo_cuenta_predefinida) {
		$this->tipo_cuenta_predefinida = $tipo_cuenta_predefinida;
	}
		
	public function gettipo_cuenta_predefinidaLogic() : tipo_cuenta_predefinida_logic {		
		return $this->tipo_cuenta_predefinidaLogic;
	}

	public function settipo_cuenta_predefinidaLogic(tipo_cuenta_predefinida_logic $tipo_cuenta_predefinidaLogic) {
		$this->tipo_cuenta_predefinidaLogic = $tipo_cuenta_predefinidaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function gettipo_cuenta_predefinidasModel() {		
		try {						
			/*tipo_cuenta_predefinidasModel.setWrappedData(tipo_cuenta_predefinidaLogic->gettipo_cuenta_predefinidas());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->tipo_cuenta_predefinidasModel;
	}
	
	public function settipo_cuenta_predefinidasModel($tipo_cuenta_predefinidasModel) {
		$this->tipo_cuenta_predefinidasModel = $tipo_cuenta_predefinidasModel;
	}
	
	public function gettipo_cuenta_predefinidas() : array {		
		return $this->tipo_cuenta_predefinidas;
	}
	
	public function settipo_cuenta_predefinidas(array $tipo_cuenta_predefinidas) {
		$this->tipo_cuenta_predefinidas= $tipo_cuenta_predefinidas;
	}
	
	public function gettipo_cuenta_predefinidasEliminados() : array {		
		return $this->tipo_cuenta_predefinidasEliminados;
	}
	
	public function settipo_cuenta_predefinidasEliminados(array $tipo_cuenta_predefinidasEliminados) {
		$this->tipo_cuenta_predefinidasEliminados= $tipo_cuenta_predefinidasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function gettipo_cuenta_predefinidaActualFromListDataModel() {
		try {
			/*$tipo_cuenta_predefinidaClase= $this->tipo_cuenta_predefinidasModel->getRowData();*/
			
			/*return $tipo_cuenta_predefinida;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
