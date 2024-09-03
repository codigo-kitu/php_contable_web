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

namespace com\bydan\contabilidad\inventario\imagen_cotizacion\presentation\control;

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

use com\bydan\contabilidad\inventario\imagen_cotizacion\business\entity\imagen_cotizacion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/imagen_cotizacion/util/imagen_cotizacion_carga.php');
use com\bydan\contabilidad\inventario\imagen_cotizacion\util\imagen_cotizacion_carga;

use com\bydan\contabilidad\inventario\imagen_cotizacion\util\imagen_cotizacion_util;
use com\bydan\contabilidad\inventario\imagen_cotizacion\util\imagen_cotizacion_param_return;
use com\bydan\contabilidad\inventario\imagen_cotizacion\business\logic\imagen_cotizacion_logic;
use com\bydan\contabilidad\inventario\imagen_cotizacion\presentation\session\imagen_cotizacion_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
imagen_cotizacion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
imagen_cotizacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
imagen_cotizacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
imagen_cotizacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*imagen_cotizacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class imagen_cotizacion_init_control extends ControllerBase {	
	
	public $imagen_cotizacionClase=null;	
	public $imagen_cotizacionsModel=null;	
	public $imagen_cotizacionsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idimagen_cotizacion=0;	
	public ?int $idimagen_cotizacionActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $imagen_cotizacionLogic=null;
	
	public $imagen_cotizacionActual=null;	
	
	public $imagen_cotizacion=null;
	public $imagen_cotizacions=null;
	public $imagen_cotizacionsEliminados=array();
	public $imagen_cotizacionsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $imagen_cotizacionsLocal=array();
	public ?array $imagen_cotizacionsReporte=null;
	public ?array $imagen_cotizacionsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadimagen_cotizacion='onload';
	public string $strTipoPaginaAuxiliarimagen_cotizacion='none';
	public string $strTipoUsuarioAuxiliarimagen_cotizacion='none';
		
	public $imagen_cotizacionReturnGeneral=null;
	public $imagen_cotizacionParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $imagen_cotizacionModel=null;
	public $imagen_cotizacionControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeimagen='';
	public string $strMensajenro_cotizacion='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->imagen_cotizacionLogic==null) {
				$this->imagen_cotizacionLogic=new imagen_cotizacion_logic();
			}
			
		} else {
			if($this->imagen_cotizacionLogic==null) {
				$this->imagen_cotizacionLogic=new imagen_cotizacion_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->imagen_cotizacionClase==null) {
				$this->imagen_cotizacionClase=new imagen_cotizacion();
			}
			
			$this->imagen_cotizacionClase->setId(0);	
				
				
			$this->imagen_cotizacionClase->setimagen('');	
			$this->imagen_cotizacionClase->setnro_cotizacion('');	
			
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
		$this->prepararEjecutarMantenimientoBase('imagen_cotizacion');
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
		$this->cargarParametrosReporteBase('imagen_cotizacion');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('imagen_cotizacion');
	}
	
	public function actualizarControllerConReturnGeneral(imagen_cotizacion_param_return $imagen_cotizacionReturnGeneral) {
		if($imagen_cotizacionReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesimagen_cotizacionsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$imagen_cotizacionReturnGeneral->getsMensajeProceso();
		}
		
		if($imagen_cotizacionReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$imagen_cotizacionReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($imagen_cotizacionReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$imagen_cotizacionReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$imagen_cotizacionReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($imagen_cotizacionReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($imagen_cotizacionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$imagen_cotizacionReturnGeneral->getsFuncionJs();
		}
		
		if($imagen_cotizacionReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(imagen_cotizacion_session $imagen_cotizacion_session){
		$this->strStyleDivArbol=$imagen_cotizacion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_cotizacion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_cotizacion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_cotizacion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_cotizacion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_cotizacion_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$imagen_cotizacion_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(imagen_cotizacion_session $imagen_cotizacion_session){
		$imagen_cotizacion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$imagen_cotizacion_session->strStyleDivHeader='display:none';			
		$imagen_cotizacion_session->strStyleDivContent='width:93%;height:100%';	
		$imagen_cotizacion_session->strStyleDivOpcionesBanner='display:none';	
		$imagen_cotizacion_session->strStyleDivExpandirColapsar='display:none';	
		$imagen_cotizacion_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(imagen_cotizacion_control $imagen_cotizacion_control_session){
		$this->idNuevo=$imagen_cotizacion_control_session->idNuevo;
		$this->imagen_cotizacionActual=$imagen_cotizacion_control_session->imagen_cotizacionActual;
		$this->imagen_cotizacion=$imagen_cotizacion_control_session->imagen_cotizacion;
		$this->imagen_cotizacionClase=$imagen_cotizacion_control_session->imagen_cotizacionClase;
		$this->imagen_cotizacions=$imagen_cotizacion_control_session->imagen_cotizacions;
		$this->imagen_cotizacionsEliminados=$imagen_cotizacion_control_session->imagen_cotizacionsEliminados;
		$this->imagen_cotizacion=$imagen_cotizacion_control_session->imagen_cotizacion;
		$this->imagen_cotizacionsReporte=$imagen_cotizacion_control_session->imagen_cotizacionsReporte;
		$this->imagen_cotizacionsSeleccionados=$imagen_cotizacion_control_session->imagen_cotizacionsSeleccionados;
		$this->arrOrderBy=$imagen_cotizacion_control_session->arrOrderBy;
		$this->arrOrderByRel=$imagen_cotizacion_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$imagen_cotizacion_control_session->arrHistoryWebs;
		$this->arrSessionBases=$imagen_cotizacion_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadimagen_cotizacion=$imagen_cotizacion_control_session->strTypeOnLoadimagen_cotizacion;
		$this->strTipoPaginaAuxiliarimagen_cotizacion=$imagen_cotizacion_control_session->strTipoPaginaAuxiliarimagen_cotizacion;
		$this->strTipoUsuarioAuxiliarimagen_cotizacion=$imagen_cotizacion_control_session->strTipoUsuarioAuxiliarimagen_cotizacion;	
		
		$this->bitEsPopup=$imagen_cotizacion_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$imagen_cotizacion_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$imagen_cotizacion_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$imagen_cotizacion_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$imagen_cotizacion_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$imagen_cotizacion_control_session->strSufijo;
		$this->bitEsRelaciones=$imagen_cotizacion_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$imagen_cotizacion_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$imagen_cotizacion_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$imagen_cotizacion_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$imagen_cotizacion_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$imagen_cotizacion_control_session->strTituloTabla;
		$this->strTituloPathPagina=$imagen_cotizacion_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$imagen_cotizacion_control_session->strTituloPathElementoActual;
		
		if($this->imagen_cotizacionLogic==null) {			
			$this->imagen_cotizacionLogic=new imagen_cotizacion_logic();
		}
		
		
		if($this->imagen_cotizacionClase==null) {
			$this->imagen_cotizacionClase=new imagen_cotizacion();	
		}
		
		$this->imagen_cotizacionLogic->setimagen_cotizacion($this->imagen_cotizacionClase);
		
		
		if($this->imagen_cotizacions==null) {
			$this->imagen_cotizacions=array();	
		}
		
		$this->imagen_cotizacionLogic->setimagen_cotizacions($this->imagen_cotizacions);
		
		
		$this->strTipoView=$imagen_cotizacion_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$imagen_cotizacion_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$imagen_cotizacion_control_session->datosCliente;
		$this->strAccionBusqueda=$imagen_cotizacion_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$imagen_cotizacion_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$imagen_cotizacion_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$imagen_cotizacion_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$imagen_cotizacion_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$imagen_cotizacion_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$imagen_cotizacion_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$imagen_cotizacion_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$imagen_cotizacion_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$imagen_cotizacion_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$imagen_cotizacion_control_session->strTipoPaginacion;
		$this->strTipoAccion=$imagen_cotizacion_control_session->strTipoAccion;
		$this->tiposReportes=$imagen_cotizacion_control_session->tiposReportes;
		$this->tiposReporte=$imagen_cotizacion_control_session->tiposReporte;
		$this->tiposAcciones=$imagen_cotizacion_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$imagen_cotizacion_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$imagen_cotizacion_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$imagen_cotizacion_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$imagen_cotizacion_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$imagen_cotizacion_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$imagen_cotizacion_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$imagen_cotizacion_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$imagen_cotizacion_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$imagen_cotizacion_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$imagen_cotizacion_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$imagen_cotizacion_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$imagen_cotizacion_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$imagen_cotizacion_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$imagen_cotizacion_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$imagen_cotizacion_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$imagen_cotizacion_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$imagen_cotizacion_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$imagen_cotizacion_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$imagen_cotizacion_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$imagen_cotizacion_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$imagen_cotizacion_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$imagen_cotizacion_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$imagen_cotizacion_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$imagen_cotizacion_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$imagen_cotizacion_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$imagen_cotizacion_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$imagen_cotizacion_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$imagen_cotizacion_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$imagen_cotizacion_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$imagen_cotizacion_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$imagen_cotizacion_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$imagen_cotizacion_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$imagen_cotizacion_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$imagen_cotizacion_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$imagen_cotizacion_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$imagen_cotizacion_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$imagen_cotizacion_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$imagen_cotizacion_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$imagen_cotizacion_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$imagen_cotizacion_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$imagen_cotizacion_control_session->resumenUsuarioActual;	
		$this->moduloActual=$imagen_cotizacion_control_session->moduloActual;	
		$this->opcionActual=$imagen_cotizacion_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$imagen_cotizacion_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$imagen_cotizacion_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$imagen_cotizacion_session=unserialize($this->Session->read(imagen_cotizacion_util::$STR_SESSION_NAME));
				
		if($imagen_cotizacion_session==null) {
			$imagen_cotizacion_session=new imagen_cotizacion_session();
		}
		
		$this->strStyleDivArbol=$imagen_cotizacion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_cotizacion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_cotizacion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_cotizacion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_cotizacion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_cotizacion_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$imagen_cotizacion_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$imagen_cotizacion_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$imagen_cotizacion_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$imagen_cotizacion_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$imagen_cotizacion_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeimagen=$imagen_cotizacion_control_session->strMensajeimagen;
		$this->strMensajenro_cotizacion=$imagen_cotizacion_control_session->strMensajenro_cotizacion;
			
		
		
		
		
		
		
		

		
		
		
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
	
	public function getimagen_cotizacionControllerAdditional() {
		return $this->imagen_cotizacionControllerAdditional;
	}

	public function setimagen_cotizacionControllerAdditional($imagen_cotizacionControllerAdditional) {
		$this->imagen_cotizacionControllerAdditional = $imagen_cotizacionControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getimagen_cotizacionActual() : imagen_cotizacion {
		return $this->imagen_cotizacionActual;
	}

	public function setimagen_cotizacionActual(imagen_cotizacion $imagen_cotizacionActual) {
		$this->imagen_cotizacionActual = $imagen_cotizacionActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidimagen_cotizacion() : int {
		return $this->idimagen_cotizacion;
	}

	public function setidimagen_cotizacion(int $idimagen_cotizacion) {
		$this->idimagen_cotizacion = $idimagen_cotizacion;
	}
	
	public function getimagen_cotizacion() : imagen_cotizacion {
		return $this->imagen_cotizacion;
	}

	public function setimagen_cotizacion(imagen_cotizacion $imagen_cotizacion) {
		$this->imagen_cotizacion = $imagen_cotizacion;
	}
		
	public function getimagen_cotizacionLogic() : imagen_cotizacion_logic {		
		return $this->imagen_cotizacionLogic;
	}

	public function setimagen_cotizacionLogic(imagen_cotizacion_logic $imagen_cotizacionLogic) {
		$this->imagen_cotizacionLogic = $imagen_cotizacionLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getimagen_cotizacionsModel() {		
		try {						
			/*imagen_cotizacionsModel.setWrappedData(imagen_cotizacionLogic->getimagen_cotizacions());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->imagen_cotizacionsModel;
	}
	
	public function setimagen_cotizacionsModel($imagen_cotizacionsModel) {
		$this->imagen_cotizacionsModel = $imagen_cotizacionsModel;
	}
	
	public function getimagen_cotizacions() : array {		
		return $this->imagen_cotizacions;
	}
	
	public function setimagen_cotizacions(array $imagen_cotizacions) {
		$this->imagen_cotizacions= $imagen_cotizacions;
	}
	
	public function getimagen_cotizacionsEliminados() : array {		
		return $this->imagen_cotizacionsEliminados;
	}
	
	public function setimagen_cotizacionsEliminados(array $imagen_cotizacionsEliminados) {
		$this->imagen_cotizacionsEliminados= $imagen_cotizacionsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getimagen_cotizacionActualFromListDataModel() {
		try {
			/*$imagen_cotizacionClase= $this->imagen_cotizacionsModel->getRowData();*/
			
			/*return $imagen_cotizacion;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
