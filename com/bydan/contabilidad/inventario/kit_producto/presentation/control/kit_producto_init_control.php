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

namespace com\bydan\contabilidad\inventario\kit_producto\presentation\control;

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

use com\bydan\contabilidad\inventario\kit_producto\business\entity\kit_producto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/kit_producto/util/kit_producto_carga.php');
use com\bydan\contabilidad\inventario\kit_producto\util\kit_producto_carga;

use com\bydan\contabilidad\inventario\kit_producto\util\kit_producto_util;
use com\bydan\contabilidad\inventario\kit_producto\util\kit_producto_param_return;
use com\bydan\contabilidad\inventario\kit_producto\business\logic\kit_producto_logic;
use com\bydan\contabilidad\inventario\kit_producto\presentation\session\kit_producto_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
kit_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
kit_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
kit_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
kit_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*kit_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class kit_producto_init_control extends ControllerBase {	
	
	public $kit_productoClase=null;	
	public $kit_productosModel=null;	
	public $kit_productosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idkit_producto=0;	
	public ?int $idkit_productoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $kit_productoLogic=null;
	
	public $kit_productoActual=null;	
	
	public $kit_producto=null;
	public $kit_productos=null;
	public $kit_productosEliminados=array();
	public $kit_productosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $kit_productosLocal=array();
	public ?array $kit_productosReporte=null;
	public ?array $kit_productosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadkit_producto='onload';
	public string $strTipoPaginaAuxiliarkit_producto='none';
	public string $strTipoUsuarioAuxiliarkit_producto='none';
		
	public $kit_productoReturnGeneral=null;
	public $kit_productoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $kit_productoModel=null;
	public $kit_productoControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_padre='';
	public string $strMensajeid_hijo='';
	public string $strMensajecantidad='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->kit_productoLogic==null) {
				$this->kit_productoLogic=new kit_producto_logic();
			}
			
		} else {
			if($this->kit_productoLogic==null) {
				$this->kit_productoLogic=new kit_producto_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->kit_productoClase==null) {
				$this->kit_productoClase=new kit_producto();
			}
			
			$this->kit_productoClase->setId(0);	
				
				
			$this->kit_productoClase->setid_padre(0);	
			$this->kit_productoClase->setid_hijo(0);	
			$this->kit_productoClase->setcantidad(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('kit_producto');
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
		$this->cargarParametrosReporteBase('kit_producto');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('kit_producto');
	}
	
	public function actualizarControllerConReturnGeneral(kit_producto_param_return $kit_productoReturnGeneral) {
		if($kit_productoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajeskit_productosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$kit_productoReturnGeneral->getsMensajeProceso();
		}
		
		if($kit_productoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$kit_productoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($kit_productoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$kit_productoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$kit_productoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($kit_productoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($kit_productoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$kit_productoReturnGeneral->getsFuncionJs();
		}
		
		if($kit_productoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(kit_producto_session $kit_producto_session){
		$this->strStyleDivArbol=$kit_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$kit_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$kit_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$kit_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$kit_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$kit_producto_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$kit_producto_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(kit_producto_session $kit_producto_session){
		$kit_producto_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$kit_producto_session->strStyleDivHeader='display:none';			
		$kit_producto_session->strStyleDivContent='width:93%;height:100%';	
		$kit_producto_session->strStyleDivOpcionesBanner='display:none';	
		$kit_producto_session->strStyleDivExpandirColapsar='display:none';	
		$kit_producto_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(kit_producto_control $kit_producto_control_session){
		$this->idNuevo=$kit_producto_control_session->idNuevo;
		$this->kit_productoActual=$kit_producto_control_session->kit_productoActual;
		$this->kit_producto=$kit_producto_control_session->kit_producto;
		$this->kit_productoClase=$kit_producto_control_session->kit_productoClase;
		$this->kit_productos=$kit_producto_control_session->kit_productos;
		$this->kit_productosEliminados=$kit_producto_control_session->kit_productosEliminados;
		$this->kit_producto=$kit_producto_control_session->kit_producto;
		$this->kit_productosReporte=$kit_producto_control_session->kit_productosReporte;
		$this->kit_productosSeleccionados=$kit_producto_control_session->kit_productosSeleccionados;
		$this->arrOrderBy=$kit_producto_control_session->arrOrderBy;
		$this->arrOrderByRel=$kit_producto_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$kit_producto_control_session->arrHistoryWebs;
		$this->arrSessionBases=$kit_producto_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadkit_producto=$kit_producto_control_session->strTypeOnLoadkit_producto;
		$this->strTipoPaginaAuxiliarkit_producto=$kit_producto_control_session->strTipoPaginaAuxiliarkit_producto;
		$this->strTipoUsuarioAuxiliarkit_producto=$kit_producto_control_session->strTipoUsuarioAuxiliarkit_producto;	
		
		$this->bitEsPopup=$kit_producto_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$kit_producto_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$kit_producto_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$kit_producto_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$kit_producto_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$kit_producto_control_session->strSufijo;
		$this->bitEsRelaciones=$kit_producto_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$kit_producto_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$kit_producto_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$kit_producto_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$kit_producto_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$kit_producto_control_session->strTituloTabla;
		$this->strTituloPathPagina=$kit_producto_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$kit_producto_control_session->strTituloPathElementoActual;
		
		if($this->kit_productoLogic==null) {			
			$this->kit_productoLogic=new kit_producto_logic();
		}
		
		
		if($this->kit_productoClase==null) {
			$this->kit_productoClase=new kit_producto();	
		}
		
		$this->kit_productoLogic->setkit_producto($this->kit_productoClase);
		
		
		if($this->kit_productos==null) {
			$this->kit_productos=array();	
		}
		
		$this->kit_productoLogic->setkit_productos($this->kit_productos);
		
		
		$this->strTipoView=$kit_producto_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$kit_producto_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$kit_producto_control_session->datosCliente;
		$this->strAccionBusqueda=$kit_producto_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$kit_producto_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$kit_producto_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$kit_producto_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$kit_producto_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$kit_producto_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$kit_producto_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$kit_producto_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$kit_producto_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$kit_producto_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$kit_producto_control_session->strTipoPaginacion;
		$this->strTipoAccion=$kit_producto_control_session->strTipoAccion;
		$this->tiposReportes=$kit_producto_control_session->tiposReportes;
		$this->tiposReporte=$kit_producto_control_session->tiposReporte;
		$this->tiposAcciones=$kit_producto_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$kit_producto_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$kit_producto_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$kit_producto_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$kit_producto_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$kit_producto_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$kit_producto_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$kit_producto_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$kit_producto_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$kit_producto_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$kit_producto_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$kit_producto_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$kit_producto_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$kit_producto_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$kit_producto_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$kit_producto_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$kit_producto_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$kit_producto_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$kit_producto_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$kit_producto_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$kit_producto_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$kit_producto_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$kit_producto_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$kit_producto_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$kit_producto_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$kit_producto_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$kit_producto_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$kit_producto_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$kit_producto_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$kit_producto_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$kit_producto_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$kit_producto_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$kit_producto_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$kit_producto_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$kit_producto_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$kit_producto_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$kit_producto_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$kit_producto_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$kit_producto_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$kit_producto_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$kit_producto_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$kit_producto_control_session->resumenUsuarioActual;	
		$this->moduloActual=$kit_producto_control_session->moduloActual;	
		$this->opcionActual=$kit_producto_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$kit_producto_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$kit_producto_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$kit_producto_session=unserialize($this->Session->read(kit_producto_util::$STR_SESSION_NAME));
				
		if($kit_producto_session==null) {
			$kit_producto_session=new kit_producto_session();
		}
		
		$this->strStyleDivArbol=$kit_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$kit_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$kit_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$kit_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$kit_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$kit_producto_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$kit_producto_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$kit_producto_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$kit_producto_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$kit_producto_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$kit_producto_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_padre=$kit_producto_control_session->strMensajeid_padre;
		$this->strMensajeid_hijo=$kit_producto_control_session->strMensajeid_hijo;
		$this->strMensajecantidad=$kit_producto_control_session->strMensajecantidad;
			
		
		
		
		
		
		
		

		
		
		
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
	
	public function getkit_productoControllerAdditional() {
		return $this->kit_productoControllerAdditional;
	}

	public function setkit_productoControllerAdditional($kit_productoControllerAdditional) {
		$this->kit_productoControllerAdditional = $kit_productoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getkit_productoActual() : kit_producto {
		return $this->kit_productoActual;
	}

	public function setkit_productoActual(kit_producto $kit_productoActual) {
		$this->kit_productoActual = $kit_productoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidkit_producto() : int {
		return $this->idkit_producto;
	}

	public function setidkit_producto(int $idkit_producto) {
		$this->idkit_producto = $idkit_producto;
	}
	
	public function getkit_producto() : kit_producto {
		return $this->kit_producto;
	}

	public function setkit_producto(kit_producto $kit_producto) {
		$this->kit_producto = $kit_producto;
	}
		
	public function getkit_productoLogic() : kit_producto_logic {		
		return $this->kit_productoLogic;
	}

	public function setkit_productoLogic(kit_producto_logic $kit_productoLogic) {
		$this->kit_productoLogic = $kit_productoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getkit_productosModel() {		
		try {						
			/*kit_productosModel.setWrappedData(kit_productoLogic->getkit_productos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->kit_productosModel;
	}
	
	public function setkit_productosModel($kit_productosModel) {
		$this->kit_productosModel = $kit_productosModel;
	}
	
	public function getkit_productos() : array {		
		return $this->kit_productos;
	}
	
	public function setkit_productos(array $kit_productos) {
		$this->kit_productos= $kit_productos;
	}
	
	public function getkit_productosEliminados() : array {		
		return $this->kit_productosEliminados;
	}
	
	public function setkit_productosEliminados(array $kit_productosEliminados) {
		$this->kit_productosEliminados= $kit_productosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getkit_productoActualFromListDataModel() {
		try {
			/*$kit_productoClase= $this->kit_productosModel->getRowData();*/
			
			/*return $kit_producto;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
