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

namespace com\bydan\contabilidad\inventario\imagen_kardex\presentation\control;

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

use com\bydan\contabilidad\inventario\imagen_kardex\business\entity\imagen_kardex;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/imagen_kardex/util/imagen_kardex_carga.php');
use com\bydan\contabilidad\inventario\imagen_kardex\util\imagen_kardex_carga;

use com\bydan\contabilidad\inventario\imagen_kardex\util\imagen_kardex_util;
use com\bydan\contabilidad\inventario\imagen_kardex\util\imagen_kardex_param_return;
use com\bydan\contabilidad\inventario\imagen_kardex\business\logic\imagen_kardex_logic;
use com\bydan\contabilidad\inventario\imagen_kardex\presentation\session\imagen_kardex_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
imagen_kardex_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
imagen_kardex_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
imagen_kardex_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
imagen_kardex_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*imagen_kardex_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class imagen_kardex_init_control extends ControllerBase {	
	
	public $imagen_kardexClase=null;	
	public $imagen_kardexsModel=null;	
	public $imagen_kardexsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idimagen_kardex=0;	
	public ?int $idimagen_kardexActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $imagen_kardexLogic=null;
	
	public $imagen_kardexActual=null;	
	
	public $imagen_kardex=null;
	public $imagen_kardexs=null;
	public $imagen_kardexsEliminados=array();
	public $imagen_kardexsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $imagen_kardexsLocal=array();
	public ?array $imagen_kardexsReporte=null;
	public ?array $imagen_kardexsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadimagen_kardex='onload';
	public string $strTipoPaginaAuxiliarimagen_kardex='none';
	public string $strTipoUsuarioAuxiliarimagen_kardex='none';
		
	public $imagen_kardexReturnGeneral=null;
	public $imagen_kardexParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $imagen_kardexModel=null;
	public $imagen_kardexControllerAdditional=null;
	
	
	 	
	
	public string $strMensajenro_documento='';
	public string $strMensajeimagen='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->imagen_kardexLogic==null) {
				$this->imagen_kardexLogic=new imagen_kardex_logic();
			}
			
		} else {
			if($this->imagen_kardexLogic==null) {
				$this->imagen_kardexLogic=new imagen_kardex_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->imagen_kardexClase==null) {
				$this->imagen_kardexClase=new imagen_kardex();
			}
			
			$this->imagen_kardexClase->setId(0);	
				
				
			$this->imagen_kardexClase->setnro_documento('');	
			$this->imagen_kardexClase->setimagen('');	
			
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
		$this->prepararEjecutarMantenimientoBase('imagen_kardex');
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
		$this->cargarParametrosReporteBase('imagen_kardex');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('imagen_kardex');
	}
	
	public function actualizarControllerConReturnGeneral(imagen_kardex_param_return $imagen_kardexReturnGeneral) {
		if($imagen_kardexReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesimagen_kardexsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$imagen_kardexReturnGeneral->getsMensajeProceso();
		}
		
		if($imagen_kardexReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$imagen_kardexReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($imagen_kardexReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$imagen_kardexReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$imagen_kardexReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($imagen_kardexReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($imagen_kardexReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$imagen_kardexReturnGeneral->getsFuncionJs();
		}
		
		if($imagen_kardexReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(imagen_kardex_session $imagen_kardex_session){
		$this->strStyleDivArbol=$imagen_kardex_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_kardex_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_kardex_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_kardex_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_kardex_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_kardex_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$imagen_kardex_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(imagen_kardex_session $imagen_kardex_session){
		$imagen_kardex_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$imagen_kardex_session->strStyleDivHeader='display:none';			
		$imagen_kardex_session->strStyleDivContent='width:93%;height:100%';	
		$imagen_kardex_session->strStyleDivOpcionesBanner='display:none';	
		$imagen_kardex_session->strStyleDivExpandirColapsar='display:none';	
		$imagen_kardex_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(imagen_kardex_control $imagen_kardex_control_session){
		$this->idNuevo=$imagen_kardex_control_session->idNuevo;
		$this->imagen_kardexActual=$imagen_kardex_control_session->imagen_kardexActual;
		$this->imagen_kardex=$imagen_kardex_control_session->imagen_kardex;
		$this->imagen_kardexClase=$imagen_kardex_control_session->imagen_kardexClase;
		$this->imagen_kardexs=$imagen_kardex_control_session->imagen_kardexs;
		$this->imagen_kardexsEliminados=$imagen_kardex_control_session->imagen_kardexsEliminados;
		$this->imagen_kardex=$imagen_kardex_control_session->imagen_kardex;
		$this->imagen_kardexsReporte=$imagen_kardex_control_session->imagen_kardexsReporte;
		$this->imagen_kardexsSeleccionados=$imagen_kardex_control_session->imagen_kardexsSeleccionados;
		$this->arrOrderBy=$imagen_kardex_control_session->arrOrderBy;
		$this->arrOrderByRel=$imagen_kardex_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$imagen_kardex_control_session->arrHistoryWebs;
		$this->arrSessionBases=$imagen_kardex_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadimagen_kardex=$imagen_kardex_control_session->strTypeOnLoadimagen_kardex;
		$this->strTipoPaginaAuxiliarimagen_kardex=$imagen_kardex_control_session->strTipoPaginaAuxiliarimagen_kardex;
		$this->strTipoUsuarioAuxiliarimagen_kardex=$imagen_kardex_control_session->strTipoUsuarioAuxiliarimagen_kardex;	
		
		$this->bitEsPopup=$imagen_kardex_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$imagen_kardex_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$imagen_kardex_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$imagen_kardex_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$imagen_kardex_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$imagen_kardex_control_session->strSufijo;
		$this->bitEsRelaciones=$imagen_kardex_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$imagen_kardex_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$imagen_kardex_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$imagen_kardex_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$imagen_kardex_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$imagen_kardex_control_session->strTituloTabla;
		$this->strTituloPathPagina=$imagen_kardex_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$imagen_kardex_control_session->strTituloPathElementoActual;
		
		if($this->imagen_kardexLogic==null) {			
			$this->imagen_kardexLogic=new imagen_kardex_logic();
		}
		
		
		if($this->imagen_kardexClase==null) {
			$this->imagen_kardexClase=new imagen_kardex();	
		}
		
		$this->imagen_kardexLogic->setimagen_kardex($this->imagen_kardexClase);
		
		
		if($this->imagen_kardexs==null) {
			$this->imagen_kardexs=array();	
		}
		
		$this->imagen_kardexLogic->setimagen_kardexs($this->imagen_kardexs);
		
		
		$this->strTipoView=$imagen_kardex_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$imagen_kardex_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$imagen_kardex_control_session->datosCliente;
		$this->strAccionBusqueda=$imagen_kardex_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$imagen_kardex_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$imagen_kardex_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$imagen_kardex_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$imagen_kardex_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$imagen_kardex_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$imagen_kardex_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$imagen_kardex_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$imagen_kardex_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$imagen_kardex_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$imagen_kardex_control_session->strTipoPaginacion;
		$this->strTipoAccion=$imagen_kardex_control_session->strTipoAccion;
		$this->tiposReportes=$imagen_kardex_control_session->tiposReportes;
		$this->tiposReporte=$imagen_kardex_control_session->tiposReporte;
		$this->tiposAcciones=$imagen_kardex_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$imagen_kardex_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$imagen_kardex_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$imagen_kardex_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$imagen_kardex_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$imagen_kardex_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$imagen_kardex_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$imagen_kardex_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$imagen_kardex_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$imagen_kardex_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$imagen_kardex_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$imagen_kardex_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$imagen_kardex_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$imagen_kardex_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$imagen_kardex_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$imagen_kardex_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$imagen_kardex_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$imagen_kardex_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$imagen_kardex_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$imagen_kardex_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$imagen_kardex_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$imagen_kardex_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$imagen_kardex_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$imagen_kardex_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$imagen_kardex_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$imagen_kardex_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$imagen_kardex_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$imagen_kardex_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$imagen_kardex_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$imagen_kardex_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$imagen_kardex_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$imagen_kardex_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$imagen_kardex_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$imagen_kardex_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$imagen_kardex_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$imagen_kardex_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$imagen_kardex_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$imagen_kardex_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$imagen_kardex_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$imagen_kardex_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$imagen_kardex_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$imagen_kardex_control_session->resumenUsuarioActual;	
		$this->moduloActual=$imagen_kardex_control_session->moduloActual;	
		$this->opcionActual=$imagen_kardex_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$imagen_kardex_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$imagen_kardex_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$imagen_kardex_session=unserialize($this->Session->read(imagen_kardex_util::$STR_SESSION_NAME));
				
		if($imagen_kardex_session==null) {
			$imagen_kardex_session=new imagen_kardex_session();
		}
		
		$this->strStyleDivArbol=$imagen_kardex_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_kardex_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_kardex_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_kardex_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_kardex_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_kardex_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$imagen_kardex_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$imagen_kardex_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$imagen_kardex_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$imagen_kardex_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$imagen_kardex_session->strRecargarFkQuery;
		*/
		
		$this->strMensajenro_documento=$imagen_kardex_control_session->strMensajenro_documento;
		$this->strMensajeimagen=$imagen_kardex_control_session->strMensajeimagen;
			
		
		
		
		
		
		
		

		
		
		
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
	
	public function getimagen_kardexControllerAdditional() {
		return $this->imagen_kardexControllerAdditional;
	}

	public function setimagen_kardexControllerAdditional($imagen_kardexControllerAdditional) {
		$this->imagen_kardexControllerAdditional = $imagen_kardexControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getimagen_kardexActual() : imagen_kardex {
		return $this->imagen_kardexActual;
	}

	public function setimagen_kardexActual(imagen_kardex $imagen_kardexActual) {
		$this->imagen_kardexActual = $imagen_kardexActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidimagen_kardex() : int {
		return $this->idimagen_kardex;
	}

	public function setidimagen_kardex(int $idimagen_kardex) {
		$this->idimagen_kardex = $idimagen_kardex;
	}
	
	public function getimagen_kardex() : imagen_kardex {
		return $this->imagen_kardex;
	}

	public function setimagen_kardex(imagen_kardex $imagen_kardex) {
		$this->imagen_kardex = $imagen_kardex;
	}
		
	public function getimagen_kardexLogic() : imagen_kardex_logic {		
		return $this->imagen_kardexLogic;
	}

	public function setimagen_kardexLogic(imagen_kardex_logic $imagen_kardexLogic) {
		$this->imagen_kardexLogic = $imagen_kardexLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getimagen_kardexsModel() {		
		try {						
			/*imagen_kardexsModel.setWrappedData(imagen_kardexLogic->getimagen_kardexs());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->imagen_kardexsModel;
	}
	
	public function setimagen_kardexsModel($imagen_kardexsModel) {
		$this->imagen_kardexsModel = $imagen_kardexsModel;
	}
	
	public function getimagen_kardexs() : array {		
		return $this->imagen_kardexs;
	}
	
	public function setimagen_kardexs(array $imagen_kardexs) {
		$this->imagen_kardexs= $imagen_kardexs;
	}
	
	public function getimagen_kardexsEliminados() : array {		
		return $this->imagen_kardexsEliminados;
	}
	
	public function setimagen_kardexsEliminados(array $imagen_kardexsEliminados) {
		$this->imagen_kardexsEliminados= $imagen_kardexsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getimagen_kardexActualFromListDataModel() {
		try {
			/*$imagen_kardexClase= $this->imagen_kardexsModel->getRowData();*/
			
			/*return $imagen_kardex;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
