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

namespace com\bydan\contabilidad\seguridad\municipio\presentation\control;

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

use com\bydan\contabilidad\seguridad\municipio\business\entity\municipio;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/municipio/util/municipio_carga.php');
use com\bydan\contabilidad\seguridad\municipio\util\municipio_carga;

use com\bydan\contabilidad\seguridad\municipio\util\municipio_util;
use com\bydan\contabilidad\seguridad\municipio\util\municipio_param_return;
use com\bydan\contabilidad\seguridad\municipio\business\logic\municipio_logic;
use com\bydan\contabilidad\seguridad\municipio\presentation\session\municipio_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
municipio_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
municipio_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
municipio_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
municipio_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*municipio_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class municipio_init_control extends ControllerBase {	
	
	public $municipioClase=null;	
	public $municipiosModel=null;	
	public $municipiosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idmunicipio=0;	
	public ?int $idmunicipioActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $municipioLogic=null;
	
	public $municipioActual=null;	
	
	public $municipio=null;
	public $municipios=null;
	public $municipiosEliminados=array();
	public $municipiosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $municipiosLocal=array();
	public ?array $municipiosReporte=null;
	public ?array $municipiosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadmunicipio='onload';
	public string $strTipoPaginaAuxiliarmunicipio='none';
	public string $strTipoUsuarioAuxiliarmunicipio='none';
		
	public $municipioReturnGeneral=null;
	public $municipioParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $municipioModel=null;
	public $municipioControllerAdditional=null;
	
	
	 	
	
	public string $strMensajecodigo='';
	public string $strMensajemunicipio='';
	public string $strMensajedepartamento='';
	public string $strMensajecodigo_departamento='';
	public string $strMensajecodigo_municipio='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->municipioLogic==null) {
				$this->municipioLogic=new municipio_logic();
			}
			
		} else {
			if($this->municipioLogic==null) {
				$this->municipioLogic=new municipio_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->municipioClase==null) {
				$this->municipioClase=new municipio();
			}
			
			$this->municipioClase->setId(0);	
				
				
			$this->municipioClase->setcodigo('');	
			$this->municipioClase->setmunicipio('');	
			$this->municipioClase->setdepartamento('');	
			$this->municipioClase->setcodigo_departamento('');	
			$this->municipioClase->setcodigo_municipio('');	
			
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
		$this->prepararEjecutarMantenimientoBase('municipio');
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
		$this->cargarParametrosReporteBase('municipio');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('municipio');
	}
	
	public function actualizarControllerConReturnGeneral(municipio_param_return $municipioReturnGeneral) {
		if($municipioReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesmunicipiosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$municipioReturnGeneral->getsMensajeProceso();
		}
		
		if($municipioReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$municipioReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($municipioReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$municipioReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$municipioReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($municipioReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($municipioReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$municipioReturnGeneral->getsFuncionJs();
		}
		
		if($municipioReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(municipio_session $municipio_session){
		$this->strStyleDivArbol=$municipio_session->strStyleDivArbol;	
		$this->strStyleDivContent=$municipio_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$municipio_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$municipio_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$municipio_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$municipio_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$municipio_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(municipio_session $municipio_session){
		$municipio_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$municipio_session->strStyleDivHeader='display:none';			
		$municipio_session->strStyleDivContent='width:93%;height:100%';	
		$municipio_session->strStyleDivOpcionesBanner='display:none';	
		$municipio_session->strStyleDivExpandirColapsar='display:none';	
		$municipio_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(municipio_control $municipio_control_session){
		$this->idNuevo=$municipio_control_session->idNuevo;
		$this->municipioActual=$municipio_control_session->municipioActual;
		$this->municipio=$municipio_control_session->municipio;
		$this->municipioClase=$municipio_control_session->municipioClase;
		$this->municipios=$municipio_control_session->municipios;
		$this->municipiosEliminados=$municipio_control_session->municipiosEliminados;
		$this->municipio=$municipio_control_session->municipio;
		$this->municipiosReporte=$municipio_control_session->municipiosReporte;
		$this->municipiosSeleccionados=$municipio_control_session->municipiosSeleccionados;
		$this->arrOrderBy=$municipio_control_session->arrOrderBy;
		$this->arrOrderByRel=$municipio_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$municipio_control_session->arrHistoryWebs;
		$this->arrSessionBases=$municipio_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadmunicipio=$municipio_control_session->strTypeOnLoadmunicipio;
		$this->strTipoPaginaAuxiliarmunicipio=$municipio_control_session->strTipoPaginaAuxiliarmunicipio;
		$this->strTipoUsuarioAuxiliarmunicipio=$municipio_control_session->strTipoUsuarioAuxiliarmunicipio;	
		
		$this->bitEsPopup=$municipio_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$municipio_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$municipio_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$municipio_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$municipio_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$municipio_control_session->strSufijo;
		$this->bitEsRelaciones=$municipio_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$municipio_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$municipio_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$municipio_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$municipio_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$municipio_control_session->strTituloTabla;
		$this->strTituloPathPagina=$municipio_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$municipio_control_session->strTituloPathElementoActual;
		
		if($this->municipioLogic==null) {			
			$this->municipioLogic=new municipio_logic();
		}
		
		
		if($this->municipioClase==null) {
			$this->municipioClase=new municipio();	
		}
		
		$this->municipioLogic->setmunicipio($this->municipioClase);
		
		
		if($this->municipios==null) {
			$this->municipios=array();	
		}
		
		$this->municipioLogic->setmunicipios($this->municipios);
		
		
		$this->strTipoView=$municipio_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$municipio_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$municipio_control_session->datosCliente;
		$this->strAccionBusqueda=$municipio_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$municipio_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$municipio_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$municipio_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$municipio_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$municipio_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$municipio_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$municipio_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$municipio_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$municipio_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$municipio_control_session->strTipoPaginacion;
		$this->strTipoAccion=$municipio_control_session->strTipoAccion;
		$this->tiposReportes=$municipio_control_session->tiposReportes;
		$this->tiposReporte=$municipio_control_session->tiposReporte;
		$this->tiposAcciones=$municipio_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$municipio_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$municipio_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$municipio_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$municipio_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$municipio_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$municipio_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$municipio_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$municipio_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$municipio_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$municipio_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$municipio_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$municipio_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$municipio_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$municipio_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$municipio_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$municipio_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$municipio_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$municipio_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$municipio_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$municipio_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$municipio_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$municipio_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$municipio_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$municipio_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$municipio_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$municipio_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$municipio_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$municipio_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$municipio_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$municipio_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$municipio_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$municipio_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$municipio_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$municipio_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$municipio_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$municipio_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$municipio_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$municipio_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$municipio_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$municipio_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$municipio_control_session->resumenUsuarioActual;	
		$this->moduloActual=$municipio_control_session->moduloActual;	
		$this->opcionActual=$municipio_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$municipio_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$municipio_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$municipio_session=unserialize($this->Session->read(municipio_util::$STR_SESSION_NAME));
				
		if($municipio_session==null) {
			$municipio_session=new municipio_session();
		}
		
		$this->strStyleDivArbol=$municipio_session->strStyleDivArbol;	
		$this->strStyleDivContent=$municipio_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$municipio_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$municipio_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$municipio_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$municipio_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$municipio_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$municipio_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$municipio_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$municipio_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$municipio_session->strRecargarFkQuery;
		*/
		
		$this->strMensajecodigo=$municipio_control_session->strMensajecodigo;
		$this->strMensajemunicipio=$municipio_control_session->strMensajemunicipio;
		$this->strMensajedepartamento=$municipio_control_session->strMensajedepartamento;
		$this->strMensajecodigo_departamento=$municipio_control_session->strMensajecodigo_departamento;
		$this->strMensajecodigo_municipio=$municipio_control_session->strMensajecodigo_municipio;
			
		
		
		
		
		
		
		

		
		
		
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
	
	public function getmunicipioControllerAdditional() {
		return $this->municipioControllerAdditional;
	}

	public function setmunicipioControllerAdditional($municipioControllerAdditional) {
		$this->municipioControllerAdditional = $municipioControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getmunicipioActual() : municipio {
		return $this->municipioActual;
	}

	public function setmunicipioActual(municipio $municipioActual) {
		$this->municipioActual = $municipioActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidmunicipio() : int {
		return $this->idmunicipio;
	}

	public function setidmunicipio(int $idmunicipio) {
		$this->idmunicipio = $idmunicipio;
	}
	
	public function getmunicipio() : municipio {
		return $this->municipio;
	}

	public function setmunicipio(municipio $municipio) {
		$this->municipio = $municipio;
	}
		
	public function getmunicipioLogic() : municipio_logic {		
		return $this->municipioLogic;
	}

	public function setmunicipioLogic(municipio_logic $municipioLogic) {
		$this->municipioLogic = $municipioLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getmunicipiosModel() {		
		try {						
			/*municipiosModel.setWrappedData(municipioLogic->getmunicipios());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->municipiosModel;
	}
	
	public function setmunicipiosModel($municipiosModel) {
		$this->municipiosModel = $municipiosModel;
	}
	
	public function getmunicipios() : array {		
		return $this->municipios;
	}
	
	public function setmunicipios(array $municipios) {
		$this->municipios= $municipios;
	}
	
	public function getmunicipiosEliminados() : array {		
		return $this->municipiosEliminados;
	}
	
	public function setmunicipiosEliminados(array $municipiosEliminados) {
		$this->municipiosEliminados= $municipiosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getmunicipioActualFromListDataModel() {
		try {
			/*$municipioClase= $this->municipiosModel->getRowData();*/
			
			/*return $municipio;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
