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

namespace com\bydan\contabilidad\contabilidad\cambio_dolar\presentation\control;

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

use com\bydan\contabilidad\contabilidad\cambio_dolar\business\entity\cambio_dolar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cambio_dolar/util/cambio_dolar_carga.php');
use com\bydan\contabilidad\contabilidad\cambio_dolar\util\cambio_dolar_carga;

use com\bydan\contabilidad\contabilidad\cambio_dolar\util\cambio_dolar_util;
use com\bydan\contabilidad\contabilidad\cambio_dolar\util\cambio_dolar_param_return;
use com\bydan\contabilidad\contabilidad\cambio_dolar\business\logic\cambio_dolar_logic;
use com\bydan\contabilidad\contabilidad\cambio_dolar\presentation\session\cambio_dolar_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
cambio_dolar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cambio_dolar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cambio_dolar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cambio_dolar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cambio_dolar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cambio_dolar_init_control extends ControllerBase {	
	
	public $cambio_dolarClase=null;	
	public $cambio_dolarsModel=null;	
	public $cambio_dolarsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcambio_dolar=0;	
	public ?int $idcambio_dolarActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $cambio_dolarLogic=null;
	
	public $cambio_dolarActual=null;	
	
	public $cambio_dolar=null;
	public $cambio_dolars=null;
	public $cambio_dolarsEliminados=array();
	public $cambio_dolarsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $cambio_dolarsLocal=array();
	public ?array $cambio_dolarsReporte=null;
	public ?array $cambio_dolarsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcambio_dolar='onload';
	public string $strTipoPaginaAuxiliarcambio_dolar='none';
	public string $strTipoUsuarioAuxiliarcambio_dolar='none';
		
	public $cambio_dolarReturnGeneral=null;
	public $cambio_dolarParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $cambio_dolarModel=null;
	public $cambio_dolarControllerAdditional=null;
	
	
	 	
	
	public string $strMensajefecha_cambio='';
	public string $strMensajedolar_compra='';
	public string $strMensajedolar_venta='';
	public string $strMensajeorigen='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->cambio_dolarLogic==null) {
				$this->cambio_dolarLogic=new cambio_dolar_logic();
			}
			
		} else {
			if($this->cambio_dolarLogic==null) {
				$this->cambio_dolarLogic=new cambio_dolar_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->cambio_dolarClase==null) {
				$this->cambio_dolarClase=new cambio_dolar();
			}
			
			$this->cambio_dolarClase->setId(0);	
				
				
			$this->cambio_dolarClase->setfecha_cambio(date('Y-m-d'));	
			$this->cambio_dolarClase->setdolar_compra(0.0);	
			$this->cambio_dolarClase->setdolar_venta(0.0);	
			$this->cambio_dolarClase->setorigen('');	
			
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
		$this->prepararEjecutarMantenimientoBase('cambio_dolar');
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
		$this->cargarParametrosReporteBase('cambio_dolar');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('cambio_dolar');
	}
	
	public function actualizarControllerConReturnGeneral(cambio_dolar_param_return $cambio_dolarReturnGeneral) {
		if($cambio_dolarReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescambio_dolarsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$cambio_dolarReturnGeneral->getsMensajeProceso();
		}
		
		if($cambio_dolarReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$cambio_dolarReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($cambio_dolarReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$cambio_dolarReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$cambio_dolarReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($cambio_dolarReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($cambio_dolarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$cambio_dolarReturnGeneral->getsFuncionJs();
		}
		
		if($cambio_dolarReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(cambio_dolar_session $cambio_dolar_session){
		$this->strStyleDivArbol=$cambio_dolar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cambio_dolar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cambio_dolar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cambio_dolar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cambio_dolar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cambio_dolar_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$cambio_dolar_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(cambio_dolar_session $cambio_dolar_session){
		$cambio_dolar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$cambio_dolar_session->strStyleDivHeader='display:none';			
		$cambio_dolar_session->strStyleDivContent='width:93%;height:100%';	
		$cambio_dolar_session->strStyleDivOpcionesBanner='display:none';	
		$cambio_dolar_session->strStyleDivExpandirColapsar='display:none';	
		$cambio_dolar_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(cambio_dolar_control $cambio_dolar_control_session){
		$this->idNuevo=$cambio_dolar_control_session->idNuevo;
		$this->cambio_dolarActual=$cambio_dolar_control_session->cambio_dolarActual;
		$this->cambio_dolar=$cambio_dolar_control_session->cambio_dolar;
		$this->cambio_dolarClase=$cambio_dolar_control_session->cambio_dolarClase;
		$this->cambio_dolars=$cambio_dolar_control_session->cambio_dolars;
		$this->cambio_dolarsEliminados=$cambio_dolar_control_session->cambio_dolarsEliminados;
		$this->cambio_dolar=$cambio_dolar_control_session->cambio_dolar;
		$this->cambio_dolarsReporte=$cambio_dolar_control_session->cambio_dolarsReporte;
		$this->cambio_dolarsSeleccionados=$cambio_dolar_control_session->cambio_dolarsSeleccionados;
		$this->arrOrderBy=$cambio_dolar_control_session->arrOrderBy;
		$this->arrOrderByRel=$cambio_dolar_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$cambio_dolar_control_session->arrHistoryWebs;
		$this->arrSessionBases=$cambio_dolar_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcambio_dolar=$cambio_dolar_control_session->strTypeOnLoadcambio_dolar;
		$this->strTipoPaginaAuxiliarcambio_dolar=$cambio_dolar_control_session->strTipoPaginaAuxiliarcambio_dolar;
		$this->strTipoUsuarioAuxiliarcambio_dolar=$cambio_dolar_control_session->strTipoUsuarioAuxiliarcambio_dolar;	
		
		$this->bitEsPopup=$cambio_dolar_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$cambio_dolar_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$cambio_dolar_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$cambio_dolar_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$cambio_dolar_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$cambio_dolar_control_session->strSufijo;
		$this->bitEsRelaciones=$cambio_dolar_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$cambio_dolar_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$cambio_dolar_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$cambio_dolar_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$cambio_dolar_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$cambio_dolar_control_session->strTituloTabla;
		$this->strTituloPathPagina=$cambio_dolar_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$cambio_dolar_control_session->strTituloPathElementoActual;
		
		if($this->cambio_dolarLogic==null) {			
			$this->cambio_dolarLogic=new cambio_dolar_logic();
		}
		
		
		if($this->cambio_dolarClase==null) {
			$this->cambio_dolarClase=new cambio_dolar();	
		}
		
		$this->cambio_dolarLogic->setcambio_dolar($this->cambio_dolarClase);
		
		
		if($this->cambio_dolars==null) {
			$this->cambio_dolars=array();	
		}
		
		$this->cambio_dolarLogic->setcambio_dolars($this->cambio_dolars);
		
		
		$this->strTipoView=$cambio_dolar_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$cambio_dolar_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$cambio_dolar_control_session->datosCliente;
		$this->strAccionBusqueda=$cambio_dolar_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$cambio_dolar_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$cambio_dolar_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$cambio_dolar_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$cambio_dolar_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$cambio_dolar_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$cambio_dolar_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$cambio_dolar_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$cambio_dolar_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$cambio_dolar_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$cambio_dolar_control_session->strTipoPaginacion;
		$this->strTipoAccion=$cambio_dolar_control_session->strTipoAccion;
		$this->tiposReportes=$cambio_dolar_control_session->tiposReportes;
		$this->tiposReporte=$cambio_dolar_control_session->tiposReporte;
		$this->tiposAcciones=$cambio_dolar_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$cambio_dolar_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$cambio_dolar_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$cambio_dolar_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$cambio_dolar_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$cambio_dolar_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$cambio_dolar_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$cambio_dolar_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$cambio_dolar_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$cambio_dolar_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$cambio_dolar_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$cambio_dolar_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$cambio_dolar_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$cambio_dolar_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$cambio_dolar_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$cambio_dolar_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$cambio_dolar_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$cambio_dolar_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$cambio_dolar_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$cambio_dolar_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$cambio_dolar_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$cambio_dolar_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$cambio_dolar_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$cambio_dolar_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$cambio_dolar_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$cambio_dolar_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$cambio_dolar_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$cambio_dolar_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$cambio_dolar_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$cambio_dolar_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$cambio_dolar_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$cambio_dolar_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$cambio_dolar_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$cambio_dolar_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$cambio_dolar_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$cambio_dolar_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$cambio_dolar_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$cambio_dolar_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$cambio_dolar_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$cambio_dolar_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$cambio_dolar_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$cambio_dolar_control_session->resumenUsuarioActual;	
		$this->moduloActual=$cambio_dolar_control_session->moduloActual;	
		$this->opcionActual=$cambio_dolar_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$cambio_dolar_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$cambio_dolar_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$cambio_dolar_session=unserialize($this->Session->read(cambio_dolar_util::$STR_SESSION_NAME));
				
		if($cambio_dolar_session==null) {
			$cambio_dolar_session=new cambio_dolar_session();
		}
		
		$this->strStyleDivArbol=$cambio_dolar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cambio_dolar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cambio_dolar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cambio_dolar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cambio_dolar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cambio_dolar_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$cambio_dolar_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$cambio_dolar_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$cambio_dolar_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$cambio_dolar_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$cambio_dolar_session->strRecargarFkQuery;
		*/
		
		$this->strMensajefecha_cambio=$cambio_dolar_control_session->strMensajefecha_cambio;
		$this->strMensajedolar_compra=$cambio_dolar_control_session->strMensajedolar_compra;
		$this->strMensajedolar_venta=$cambio_dolar_control_session->strMensajedolar_venta;
		$this->strMensajeorigen=$cambio_dolar_control_session->strMensajeorigen;
			
		
		
		
		
		
		
		

		
		
		
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
	
	public function getcambio_dolarControllerAdditional() {
		return $this->cambio_dolarControllerAdditional;
	}

	public function setcambio_dolarControllerAdditional($cambio_dolarControllerAdditional) {
		$this->cambio_dolarControllerAdditional = $cambio_dolarControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcambio_dolarActual() : cambio_dolar {
		return $this->cambio_dolarActual;
	}

	public function setcambio_dolarActual(cambio_dolar $cambio_dolarActual) {
		$this->cambio_dolarActual = $cambio_dolarActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcambio_dolar() : int {
		return $this->idcambio_dolar;
	}

	public function setidcambio_dolar(int $idcambio_dolar) {
		$this->idcambio_dolar = $idcambio_dolar;
	}
	
	public function getcambio_dolar() : cambio_dolar {
		return $this->cambio_dolar;
	}

	public function setcambio_dolar(cambio_dolar $cambio_dolar) {
		$this->cambio_dolar = $cambio_dolar;
	}
		
	public function getcambio_dolarLogic() : cambio_dolar_logic {		
		return $this->cambio_dolarLogic;
	}

	public function setcambio_dolarLogic(cambio_dolar_logic $cambio_dolarLogic) {
		$this->cambio_dolarLogic = $cambio_dolarLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcambio_dolarsModel() {		
		try {						
			/*cambio_dolarsModel.setWrappedData(cambio_dolarLogic->getcambio_dolars());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->cambio_dolarsModel;
	}
	
	public function setcambio_dolarsModel($cambio_dolarsModel) {
		$this->cambio_dolarsModel = $cambio_dolarsModel;
	}
	
	public function getcambio_dolars() : array {		
		return $this->cambio_dolars;
	}
	
	public function setcambio_dolars(array $cambio_dolars) {
		$this->cambio_dolars= $cambio_dolars;
	}
	
	public function getcambio_dolarsEliminados() : array {		
		return $this->cambio_dolarsEliminados;
	}
	
	public function setcambio_dolarsEliminados(array $cambio_dolarsEliminados) {
		$this->cambio_dolarsEliminados= $cambio_dolarsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcambio_dolarActualFromListDataModel() {
		try {
			/*$cambio_dolarClase= $this->cambio_dolarsModel->getRowData();*/
			
			/*return $cambio_dolar;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
