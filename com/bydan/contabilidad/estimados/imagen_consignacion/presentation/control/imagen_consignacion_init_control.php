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

namespace com\bydan\contabilidad\estimados\imagen_consignacion\presentation\control;

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

use com\bydan\contabilidad\estimados\imagen_consignacion\business\entity\imagen_consignacion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/imagen_consignacion/util/imagen_consignacion_carga.php');
use com\bydan\contabilidad\estimados\imagen_consignacion\util\imagen_consignacion_carga;

use com\bydan\contabilidad\estimados\imagen_consignacion\util\imagen_consignacion_util;
use com\bydan\contabilidad\estimados\imagen_consignacion\util\imagen_consignacion_param_return;
use com\bydan\contabilidad\estimados\imagen_consignacion\business\logic\imagen_consignacion_logic;
use com\bydan\contabilidad\estimados\imagen_consignacion\presentation\session\imagen_consignacion_session;


//FK


use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;
use com\bydan\contabilidad\estimados\consignacion\business\logic\consignacion_logic;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
imagen_consignacion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
imagen_consignacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
imagen_consignacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
imagen_consignacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*imagen_consignacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class imagen_consignacion_init_control extends ControllerBase {	
	
	public $imagen_consignacionClase=null;	
	public $imagen_consignacionsModel=null;	
	public $imagen_consignacionsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idimagen_consignacion=0;	
	public ?int $idimagen_consignacionActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $imagen_consignacionLogic=null;
	
	public $imagen_consignacionActual=null;	
	
	public $imagen_consignacion=null;
	public $imagen_consignacions=null;
	public $imagen_consignacionsEliminados=array();
	public $imagen_consignacionsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $imagen_consignacionsLocal=array();
	public ?array $imagen_consignacionsReporte=null;
	public ?array $imagen_consignacionsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadimagen_consignacion='onload';
	public string $strTipoPaginaAuxiliarimagen_consignacion='none';
	public string $strTipoUsuarioAuxiliarimagen_consignacion='none';
		
	public $imagen_consignacionReturnGeneral=null;
	public $imagen_consignacionParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $imagen_consignacionModel=null;
	public $imagen_consignacionControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_consignacion='';
	public string $strMensajeimagen='';
	
	
	public string $strVisibleFK_Idconsignacion='display:table-row';

	
	public array $consignacionsFK=array();

	public function getconsignacionsFK():array {
		return $this->consignacionsFK;
	}

	public function setconsignacionsFK(array $consignacionsFK) {
		$this->consignacionsFK = $consignacionsFK;
	}

	public int $idconsignacionDefaultFK=-1;

	public function getIdconsignacionDefaultFK():int {
		return $this->idconsignacionDefaultFK;
	}

	public function setIdconsignacionDefaultFK(int $idconsignacionDefaultFK) {
		$this->idconsignacionDefaultFK = $idconsignacionDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_consignacionFK_Idconsignacion=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->imagen_consignacionLogic==null) {
				$this->imagen_consignacionLogic=new imagen_consignacion_logic();
			}
			
		} else {
			if($this->imagen_consignacionLogic==null) {
				$this->imagen_consignacionLogic=new imagen_consignacion_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->imagen_consignacionClase==null) {
				$this->imagen_consignacionClase=new imagen_consignacion();
			}
			
			$this->imagen_consignacionClase->setId(0);	
				
				
			$this->imagen_consignacionClase->setid_consignacion(-1);	
			$this->imagen_consignacionClase->setimagen('');	
			
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
		$this->prepararEjecutarMantenimientoBase('imagen_consignacion');
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
		$this->cargarParametrosReporteBase('imagen_consignacion');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('imagen_consignacion');
	}
	
	public function actualizarControllerConReturnGeneral(imagen_consignacion_param_return $imagen_consignacionReturnGeneral) {
		if($imagen_consignacionReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesimagen_consignacionsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$imagen_consignacionReturnGeneral->getsMensajeProceso();
		}
		
		if($imagen_consignacionReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$imagen_consignacionReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($imagen_consignacionReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$imagen_consignacionReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$imagen_consignacionReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($imagen_consignacionReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($imagen_consignacionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$imagen_consignacionReturnGeneral->getsFuncionJs();
		}
		
		if($imagen_consignacionReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(imagen_consignacion_session $imagen_consignacion_session){
		$this->strStyleDivArbol=$imagen_consignacion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_consignacion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_consignacion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_consignacion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_consignacion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_consignacion_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$imagen_consignacion_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(imagen_consignacion_session $imagen_consignacion_session){
		$imagen_consignacion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$imagen_consignacion_session->strStyleDivHeader='display:none';			
		$imagen_consignacion_session->strStyleDivContent='width:93%;height:100%';	
		$imagen_consignacion_session->strStyleDivOpcionesBanner='display:none';	
		$imagen_consignacion_session->strStyleDivExpandirColapsar='display:none';	
		$imagen_consignacion_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(imagen_consignacion_control $imagen_consignacion_control_session){
		$this->idNuevo=$imagen_consignacion_control_session->idNuevo;
		$this->imagen_consignacionActual=$imagen_consignacion_control_session->imagen_consignacionActual;
		$this->imagen_consignacion=$imagen_consignacion_control_session->imagen_consignacion;
		$this->imagen_consignacionClase=$imagen_consignacion_control_session->imagen_consignacionClase;
		$this->imagen_consignacions=$imagen_consignacion_control_session->imagen_consignacions;
		$this->imagen_consignacionsEliminados=$imagen_consignacion_control_session->imagen_consignacionsEliminados;
		$this->imagen_consignacion=$imagen_consignacion_control_session->imagen_consignacion;
		$this->imagen_consignacionsReporte=$imagen_consignacion_control_session->imagen_consignacionsReporte;
		$this->imagen_consignacionsSeleccionados=$imagen_consignacion_control_session->imagen_consignacionsSeleccionados;
		$this->arrOrderBy=$imagen_consignacion_control_session->arrOrderBy;
		$this->arrOrderByRel=$imagen_consignacion_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$imagen_consignacion_control_session->arrHistoryWebs;
		$this->arrSessionBases=$imagen_consignacion_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadimagen_consignacion=$imagen_consignacion_control_session->strTypeOnLoadimagen_consignacion;
		$this->strTipoPaginaAuxiliarimagen_consignacion=$imagen_consignacion_control_session->strTipoPaginaAuxiliarimagen_consignacion;
		$this->strTipoUsuarioAuxiliarimagen_consignacion=$imagen_consignacion_control_session->strTipoUsuarioAuxiliarimagen_consignacion;	
		
		$this->bitEsPopup=$imagen_consignacion_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$imagen_consignacion_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$imagen_consignacion_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$imagen_consignacion_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$imagen_consignacion_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$imagen_consignacion_control_session->strSufijo;
		$this->bitEsRelaciones=$imagen_consignacion_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$imagen_consignacion_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$imagen_consignacion_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$imagen_consignacion_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$imagen_consignacion_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$imagen_consignacion_control_session->strTituloTabla;
		$this->strTituloPathPagina=$imagen_consignacion_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$imagen_consignacion_control_session->strTituloPathElementoActual;
		
		if($this->imagen_consignacionLogic==null) {			
			$this->imagen_consignacionLogic=new imagen_consignacion_logic();
		}
		
		
		if($this->imagen_consignacionClase==null) {
			$this->imagen_consignacionClase=new imagen_consignacion();	
		}
		
		$this->imagen_consignacionLogic->setimagen_consignacion($this->imagen_consignacionClase);
		
		
		if($this->imagen_consignacions==null) {
			$this->imagen_consignacions=array();	
		}
		
		$this->imagen_consignacionLogic->setimagen_consignacions($this->imagen_consignacions);
		
		
		$this->strTipoView=$imagen_consignacion_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$imagen_consignacion_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$imagen_consignacion_control_session->datosCliente;
		$this->strAccionBusqueda=$imagen_consignacion_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$imagen_consignacion_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$imagen_consignacion_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$imagen_consignacion_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$imagen_consignacion_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$imagen_consignacion_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$imagen_consignacion_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$imagen_consignacion_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$imagen_consignacion_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$imagen_consignacion_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$imagen_consignacion_control_session->strTipoPaginacion;
		$this->strTipoAccion=$imagen_consignacion_control_session->strTipoAccion;
		$this->tiposReportes=$imagen_consignacion_control_session->tiposReportes;
		$this->tiposReporte=$imagen_consignacion_control_session->tiposReporte;
		$this->tiposAcciones=$imagen_consignacion_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$imagen_consignacion_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$imagen_consignacion_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$imagen_consignacion_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$imagen_consignacion_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$imagen_consignacion_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$imagen_consignacion_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$imagen_consignacion_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$imagen_consignacion_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$imagen_consignacion_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$imagen_consignacion_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$imagen_consignacion_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$imagen_consignacion_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$imagen_consignacion_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$imagen_consignacion_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$imagen_consignacion_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$imagen_consignacion_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$imagen_consignacion_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$imagen_consignacion_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$imagen_consignacion_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$imagen_consignacion_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$imagen_consignacion_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$imagen_consignacion_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$imagen_consignacion_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$imagen_consignacion_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$imagen_consignacion_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$imagen_consignacion_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$imagen_consignacion_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$imagen_consignacion_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$imagen_consignacion_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$imagen_consignacion_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$imagen_consignacion_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$imagen_consignacion_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$imagen_consignacion_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$imagen_consignacion_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$imagen_consignacion_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$imagen_consignacion_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$imagen_consignacion_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$imagen_consignacion_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$imagen_consignacion_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$imagen_consignacion_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$imagen_consignacion_control_session->resumenUsuarioActual;	
		$this->moduloActual=$imagen_consignacion_control_session->moduloActual;	
		$this->opcionActual=$imagen_consignacion_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$imagen_consignacion_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$imagen_consignacion_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$imagen_consignacion_session=unserialize($this->Session->read(imagen_consignacion_util::$STR_SESSION_NAME));
				
		if($imagen_consignacion_session==null) {
			$imagen_consignacion_session=new imagen_consignacion_session();
		}
		
		$this->strStyleDivArbol=$imagen_consignacion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_consignacion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_consignacion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_consignacion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_consignacion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_consignacion_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$imagen_consignacion_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$imagen_consignacion_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$imagen_consignacion_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$imagen_consignacion_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$imagen_consignacion_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_consignacion=$imagen_consignacion_control_session->strMensajeid_consignacion;
		$this->strMensajeimagen=$imagen_consignacion_control_session->strMensajeimagen;
			
		
		$this->consignacionsFK=$imagen_consignacion_control_session->consignacionsFK;
		$this->idconsignacionDefaultFK=$imagen_consignacion_control_session->idconsignacionDefaultFK;
		
		
		$this->strVisibleFK_Idconsignacion=$imagen_consignacion_control_session->strVisibleFK_Idconsignacion;
		
		
		
		
		$this->id_consignacionFK_Idconsignacion=$imagen_consignacion_control_session->id_consignacionFK_Idconsignacion;

		
		
		
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
	
	public function getimagen_consignacionControllerAdditional() {
		return $this->imagen_consignacionControllerAdditional;
	}

	public function setimagen_consignacionControllerAdditional($imagen_consignacionControllerAdditional) {
		$this->imagen_consignacionControllerAdditional = $imagen_consignacionControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getimagen_consignacionActual() : imagen_consignacion {
		return $this->imagen_consignacionActual;
	}

	public function setimagen_consignacionActual(imagen_consignacion $imagen_consignacionActual) {
		$this->imagen_consignacionActual = $imagen_consignacionActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidimagen_consignacion() : int {
		return $this->idimagen_consignacion;
	}

	public function setidimagen_consignacion(int $idimagen_consignacion) {
		$this->idimagen_consignacion = $idimagen_consignacion;
	}
	
	public function getimagen_consignacion() : imagen_consignacion {
		return $this->imagen_consignacion;
	}

	public function setimagen_consignacion(imagen_consignacion $imagen_consignacion) {
		$this->imagen_consignacion = $imagen_consignacion;
	}
		
	public function getimagen_consignacionLogic() : imagen_consignacion_logic {		
		return $this->imagen_consignacionLogic;
	}

	public function setimagen_consignacionLogic(imagen_consignacion_logic $imagen_consignacionLogic) {
		$this->imagen_consignacionLogic = $imagen_consignacionLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getimagen_consignacionsModel() {		
		try {						
			/*imagen_consignacionsModel.setWrappedData(imagen_consignacionLogic->getimagen_consignacions());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->imagen_consignacionsModel;
	}
	
	public function setimagen_consignacionsModel($imagen_consignacionsModel) {
		$this->imagen_consignacionsModel = $imagen_consignacionsModel;
	}
	
	public function getimagen_consignacions() : array {		
		return $this->imagen_consignacions;
	}
	
	public function setimagen_consignacions(array $imagen_consignacions) {
		$this->imagen_consignacions= $imagen_consignacions;
	}
	
	public function getimagen_consignacionsEliminados() : array {		
		return $this->imagen_consignacionsEliminados;
	}
	
	public function setimagen_consignacionsEliminados(array $imagen_consignacionsEliminados) {
		$this->imagen_consignacionsEliminados= $imagen_consignacionsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getimagen_consignacionActualFromListDataModel() {
		try {
			/*$imagen_consignacionClase= $this->imagen_consignacionsModel->getRowData();*/
			
			/*return $imagen_consignacion;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
