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

namespace com\bydan\contabilidad\contabilidad\imagen_asiento\presentation\control;

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

use com\bydan\contabilidad\contabilidad\imagen_asiento\business\entity\imagen_asiento;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/imagen_asiento/util/imagen_asiento_carga.php');
use com\bydan\contabilidad\contabilidad\imagen_asiento\util\imagen_asiento_carga;

use com\bydan\contabilidad\contabilidad\imagen_asiento\util\imagen_asiento_util;
use com\bydan\contabilidad\contabilidad\imagen_asiento\util\imagen_asiento_param_return;
use com\bydan\contabilidad\contabilidad\imagen_asiento\business\logic\imagen_asiento_logic;
use com\bydan\contabilidad\contabilidad\imagen_asiento\presentation\session\imagen_asiento_session;


//FK


use com\bydan\contabilidad\contabilidad\asiento\business\entity\asiento;
use com\bydan\contabilidad\contabilidad\asiento\business\logic\asiento_logic;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
imagen_asiento_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
imagen_asiento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
imagen_asiento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
imagen_asiento_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*imagen_asiento_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class imagen_asiento_init_control extends ControllerBase {	
	
	public $imagen_asientoClase=null;	
	public $imagen_asientosModel=null;	
	public $imagen_asientosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idimagen_asiento=0;	
	public ?int $idimagen_asientoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $imagen_asientoLogic=null;
	
	public $imagen_asientoActual=null;	
	
	public $imagen_asiento=null;
	public $imagen_asientos=null;
	public $imagen_asientosEliminados=array();
	public $imagen_asientosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $imagen_asientosLocal=array();
	public ?array $imagen_asientosReporte=null;
	public ?array $imagen_asientosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadimagen_asiento='onload';
	public string $strTipoPaginaAuxiliarimagen_asiento='none';
	public string $strTipoUsuarioAuxiliarimagen_asiento='none';
		
	public $imagen_asientoReturnGeneral=null;
	public $imagen_asientoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $imagen_asientoModel=null;
	public $imagen_asientoControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_asiento='';
	public string $strMensajeimagen='';
	public string $strMensajenro_asiento='';
	
	
	public string $strVisibleFK_Idasiento='display:table-row';

	
	public array $asientosFK=array();

	public function getasientosFK():array {
		return $this->asientosFK;
	}

	public function setasientosFK(array $asientosFK) {
		$this->asientosFK = $asientosFK;
	}

	public int $idasientoDefaultFK=-1;

	public function getIdasientoDefaultFK():int {
		return $this->idasientoDefaultFK;
	}

	public function setIdasientoDefaultFK(int $idasientoDefaultFK) {
		$this->idasientoDefaultFK = $idasientoDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_asientoFK_Idasiento=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->imagen_asientoLogic==null) {
				$this->imagen_asientoLogic=new imagen_asiento_logic();
			}
			
		} else {
			if($this->imagen_asientoLogic==null) {
				$this->imagen_asientoLogic=new imagen_asiento_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->imagen_asientoClase==null) {
				$this->imagen_asientoClase=new imagen_asiento();
			}
			
			$this->imagen_asientoClase->setId(0);	
				
				
			$this->imagen_asientoClase->setid_asiento(-1);	
			$this->imagen_asientoClase->setimagen('');	
			$this->imagen_asientoClase->setnro_asiento(0);	
			
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
		$this->prepararEjecutarMantenimientoBase('imagen_asiento');
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
		$this->cargarParametrosReporteBase('imagen_asiento');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('imagen_asiento');
	}
	
	public function actualizarControllerConReturnGeneral(imagen_asiento_param_return $imagen_asientoReturnGeneral) {
		if($imagen_asientoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesimagen_asientosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$imagen_asientoReturnGeneral->getsMensajeProceso();
		}
		
		if($imagen_asientoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$imagen_asientoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($imagen_asientoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$imagen_asientoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$imagen_asientoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($imagen_asientoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($imagen_asientoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$imagen_asientoReturnGeneral->getsFuncionJs();
		}
		
		if($imagen_asientoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(imagen_asiento_session $imagen_asiento_session){
		$this->strStyleDivArbol=$imagen_asiento_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_asiento_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_asiento_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_asiento_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_asiento_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_asiento_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$imagen_asiento_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(imagen_asiento_session $imagen_asiento_session){
		$imagen_asiento_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$imagen_asiento_session->strStyleDivHeader='display:none';			
		$imagen_asiento_session->strStyleDivContent='width:93%;height:100%';	
		$imagen_asiento_session->strStyleDivOpcionesBanner='display:none';	
		$imagen_asiento_session->strStyleDivExpandirColapsar='display:none';	
		$imagen_asiento_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(imagen_asiento_control $imagen_asiento_control_session){
		$this->idNuevo=$imagen_asiento_control_session->idNuevo;
		$this->imagen_asientoActual=$imagen_asiento_control_session->imagen_asientoActual;
		$this->imagen_asiento=$imagen_asiento_control_session->imagen_asiento;
		$this->imagen_asientoClase=$imagen_asiento_control_session->imagen_asientoClase;
		$this->imagen_asientos=$imagen_asiento_control_session->imagen_asientos;
		$this->imagen_asientosEliminados=$imagen_asiento_control_session->imagen_asientosEliminados;
		$this->imagen_asiento=$imagen_asiento_control_session->imagen_asiento;
		$this->imagen_asientosReporte=$imagen_asiento_control_session->imagen_asientosReporte;
		$this->imagen_asientosSeleccionados=$imagen_asiento_control_session->imagen_asientosSeleccionados;
		$this->arrOrderBy=$imagen_asiento_control_session->arrOrderBy;
		$this->arrOrderByRel=$imagen_asiento_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$imagen_asiento_control_session->arrHistoryWebs;
		$this->arrSessionBases=$imagen_asiento_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadimagen_asiento=$imagen_asiento_control_session->strTypeOnLoadimagen_asiento;
		$this->strTipoPaginaAuxiliarimagen_asiento=$imagen_asiento_control_session->strTipoPaginaAuxiliarimagen_asiento;
		$this->strTipoUsuarioAuxiliarimagen_asiento=$imagen_asiento_control_session->strTipoUsuarioAuxiliarimagen_asiento;	
		
		$this->bitEsPopup=$imagen_asiento_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$imagen_asiento_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$imagen_asiento_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$imagen_asiento_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$imagen_asiento_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$imagen_asiento_control_session->strSufijo;
		$this->bitEsRelaciones=$imagen_asiento_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$imagen_asiento_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$imagen_asiento_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$imagen_asiento_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$imagen_asiento_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$imagen_asiento_control_session->strTituloTabla;
		$this->strTituloPathPagina=$imagen_asiento_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$imagen_asiento_control_session->strTituloPathElementoActual;
		
		if($this->imagen_asientoLogic==null) {			
			$this->imagen_asientoLogic=new imagen_asiento_logic();
		}
		
		
		if($this->imagen_asientoClase==null) {
			$this->imagen_asientoClase=new imagen_asiento();	
		}
		
		$this->imagen_asientoLogic->setimagen_asiento($this->imagen_asientoClase);
		
		
		if($this->imagen_asientos==null) {
			$this->imagen_asientos=array();	
		}
		
		$this->imagen_asientoLogic->setimagen_asientos($this->imagen_asientos);
		
		
		$this->strTipoView=$imagen_asiento_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$imagen_asiento_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$imagen_asiento_control_session->datosCliente;
		$this->strAccionBusqueda=$imagen_asiento_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$imagen_asiento_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$imagen_asiento_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$imagen_asiento_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$imagen_asiento_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$imagen_asiento_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$imagen_asiento_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$imagen_asiento_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$imagen_asiento_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$imagen_asiento_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$imagen_asiento_control_session->strTipoPaginacion;
		$this->strTipoAccion=$imagen_asiento_control_session->strTipoAccion;
		$this->tiposReportes=$imagen_asiento_control_session->tiposReportes;
		$this->tiposReporte=$imagen_asiento_control_session->tiposReporte;
		$this->tiposAcciones=$imagen_asiento_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$imagen_asiento_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$imagen_asiento_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$imagen_asiento_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$imagen_asiento_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$imagen_asiento_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$imagen_asiento_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$imagen_asiento_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$imagen_asiento_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$imagen_asiento_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$imagen_asiento_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$imagen_asiento_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$imagen_asiento_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$imagen_asiento_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$imagen_asiento_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$imagen_asiento_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$imagen_asiento_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$imagen_asiento_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$imagen_asiento_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$imagen_asiento_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$imagen_asiento_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$imagen_asiento_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$imagen_asiento_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$imagen_asiento_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$imagen_asiento_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$imagen_asiento_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$imagen_asiento_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$imagen_asiento_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$imagen_asiento_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$imagen_asiento_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$imagen_asiento_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$imagen_asiento_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$imagen_asiento_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$imagen_asiento_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$imagen_asiento_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$imagen_asiento_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$imagen_asiento_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$imagen_asiento_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$imagen_asiento_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$imagen_asiento_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$imagen_asiento_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$imagen_asiento_control_session->resumenUsuarioActual;	
		$this->moduloActual=$imagen_asiento_control_session->moduloActual;	
		$this->opcionActual=$imagen_asiento_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$imagen_asiento_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$imagen_asiento_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$imagen_asiento_session=unserialize($this->Session->read(imagen_asiento_util::$STR_SESSION_NAME));
				
		if($imagen_asiento_session==null) {
			$imagen_asiento_session=new imagen_asiento_session();
		}
		
		$this->strStyleDivArbol=$imagen_asiento_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_asiento_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_asiento_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_asiento_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_asiento_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_asiento_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$imagen_asiento_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$imagen_asiento_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$imagen_asiento_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$imagen_asiento_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$imagen_asiento_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_asiento=$imagen_asiento_control_session->strMensajeid_asiento;
		$this->strMensajeimagen=$imagen_asiento_control_session->strMensajeimagen;
		$this->strMensajenro_asiento=$imagen_asiento_control_session->strMensajenro_asiento;
			
		
		$this->asientosFK=$imagen_asiento_control_session->asientosFK;
		$this->idasientoDefaultFK=$imagen_asiento_control_session->idasientoDefaultFK;
		
		
		$this->strVisibleFK_Idasiento=$imagen_asiento_control_session->strVisibleFK_Idasiento;
		
		
		
		
		$this->id_asientoFK_Idasiento=$imagen_asiento_control_session->id_asientoFK_Idasiento;

		
		
		
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
	
	public function getimagen_asientoControllerAdditional() {
		return $this->imagen_asientoControllerAdditional;
	}

	public function setimagen_asientoControllerAdditional($imagen_asientoControllerAdditional) {
		$this->imagen_asientoControllerAdditional = $imagen_asientoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getimagen_asientoActual() : imagen_asiento {
		return $this->imagen_asientoActual;
	}

	public function setimagen_asientoActual(imagen_asiento $imagen_asientoActual) {
		$this->imagen_asientoActual = $imagen_asientoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidimagen_asiento() : int {
		return $this->idimagen_asiento;
	}

	public function setidimagen_asiento(int $idimagen_asiento) {
		$this->idimagen_asiento = $idimagen_asiento;
	}
	
	public function getimagen_asiento() : imagen_asiento {
		return $this->imagen_asiento;
	}

	public function setimagen_asiento(imagen_asiento $imagen_asiento) {
		$this->imagen_asiento = $imagen_asiento;
	}
		
	public function getimagen_asientoLogic() : imagen_asiento_logic {		
		return $this->imagen_asientoLogic;
	}

	public function setimagen_asientoLogic(imagen_asiento_logic $imagen_asientoLogic) {
		$this->imagen_asientoLogic = $imagen_asientoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getimagen_asientosModel() {		
		try {						
			/*imagen_asientosModel.setWrappedData(imagen_asientoLogic->getimagen_asientos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->imagen_asientosModel;
	}
	
	public function setimagen_asientosModel($imagen_asientosModel) {
		$this->imagen_asientosModel = $imagen_asientosModel;
	}
	
	public function getimagen_asientos() : array {		
		return $this->imagen_asientos;
	}
	
	public function setimagen_asientos(array $imagen_asientos) {
		$this->imagen_asientos= $imagen_asientos;
	}
	
	public function getimagen_asientosEliminados() : array {		
		return $this->imagen_asientosEliminados;
	}
	
	public function setimagen_asientosEliminados(array $imagen_asientosEliminados) {
		$this->imagen_asientosEliminados= $imagen_asientosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getimagen_asientoActualFromListDataModel() {
		try {
			/*$imagen_asientoClase= $this->imagen_asientosModel->getRowData();*/
			
			/*return $imagen_asiento;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
