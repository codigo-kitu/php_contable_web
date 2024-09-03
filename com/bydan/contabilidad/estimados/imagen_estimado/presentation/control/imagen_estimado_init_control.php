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

namespace com\bydan\contabilidad\estimados\imagen_estimado\presentation\control;

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

use com\bydan\contabilidad\estimados\imagen_estimado\business\entity\imagen_estimado;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/imagen_estimado/util/imagen_estimado_carga.php');
use com\bydan\contabilidad\estimados\imagen_estimado\util\imagen_estimado_carga;

use com\bydan\contabilidad\estimados\imagen_estimado\util\imagen_estimado_util;
use com\bydan\contabilidad\estimados\imagen_estimado\util\imagen_estimado_param_return;
use com\bydan\contabilidad\estimados\imagen_estimado\business\logic\imagen_estimado_logic;
use com\bydan\contabilidad\estimados\imagen_estimado\presentation\session\imagen_estimado_session;


//FK


use com\bydan\contabilidad\estimados\estimado\business\entity\estimado;
use com\bydan\contabilidad\estimados\estimado\business\logic\estimado_logic;
use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
imagen_estimado_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
imagen_estimado_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
imagen_estimado_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
imagen_estimado_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*imagen_estimado_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class imagen_estimado_init_control extends ControllerBase {	
	
	public $imagen_estimadoClase=null;	
	public $imagen_estimadosModel=null;	
	public $imagen_estimadosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idimagen_estimado=0;	
	public ?int $idimagen_estimadoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $imagen_estimadoLogic=null;
	
	public $imagen_estimadoActual=null;	
	
	public $imagen_estimado=null;
	public $imagen_estimados=null;
	public $imagen_estimadosEliminados=array();
	public $imagen_estimadosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $imagen_estimadosLocal=array();
	public ?array $imagen_estimadosReporte=null;
	public ?array $imagen_estimadosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadimagen_estimado='onload';
	public string $strTipoPaginaAuxiliarimagen_estimado='none';
	public string $strTipoUsuarioAuxiliarimagen_estimado='none';
		
	public $imagen_estimadoReturnGeneral=null;
	public $imagen_estimadoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $imagen_estimadoModel=null;
	public $imagen_estimadoControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_estimado='';
	public string $strMensajeimagen='';
	
	
	public string $strVisibleFK_Idestimado='display:table-row';

	
	public array $estimadosFK=array();

	public function getestimadosFK():array {
		return $this->estimadosFK;
	}

	public function setestimadosFK(array $estimadosFK) {
		$this->estimadosFK = $estimadosFK;
	}

	public int $idestimadoDefaultFK=-1;

	public function getIdestimadoDefaultFK():int {
		return $this->idestimadoDefaultFK;
	}

	public function setIdestimadoDefaultFK(int $idestimadoDefaultFK) {
		$this->idestimadoDefaultFK = $idestimadoDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_estimadoFK_Idestimado=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->imagen_estimadoLogic==null) {
				$this->imagen_estimadoLogic=new imagen_estimado_logic();
			}
			
		} else {
			if($this->imagen_estimadoLogic==null) {
				$this->imagen_estimadoLogic=new imagen_estimado_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->imagen_estimadoClase==null) {
				$this->imagen_estimadoClase=new imagen_estimado();
			}
			
			$this->imagen_estimadoClase->setId(0);	
				
				
			$this->imagen_estimadoClase->setid_estimado(-1);	
			$this->imagen_estimadoClase->setimagen('');	
			
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
		$this->prepararEjecutarMantenimientoBase('imagen_estimado');
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
		$this->cargarParametrosReporteBase('imagen_estimado');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('imagen_estimado');
	}
	
	public function actualizarControllerConReturnGeneral(imagen_estimado_param_return $imagen_estimadoReturnGeneral) {
		if($imagen_estimadoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesimagen_estimadosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$imagen_estimadoReturnGeneral->getsMensajeProceso();
		}
		
		if($imagen_estimadoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$imagen_estimadoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($imagen_estimadoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$imagen_estimadoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$imagen_estimadoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($imagen_estimadoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($imagen_estimadoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$imagen_estimadoReturnGeneral->getsFuncionJs();
		}
		
		if($imagen_estimadoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(imagen_estimado_session $imagen_estimado_session){
		$this->strStyleDivArbol=$imagen_estimado_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_estimado_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_estimado_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_estimado_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_estimado_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_estimado_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$imagen_estimado_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(imagen_estimado_session $imagen_estimado_session){
		$imagen_estimado_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$imagen_estimado_session->strStyleDivHeader='display:none';			
		$imagen_estimado_session->strStyleDivContent='width:93%;height:100%';	
		$imagen_estimado_session->strStyleDivOpcionesBanner='display:none';	
		$imagen_estimado_session->strStyleDivExpandirColapsar='display:none';	
		$imagen_estimado_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(imagen_estimado_control $imagen_estimado_control_session){
		$this->idNuevo=$imagen_estimado_control_session->idNuevo;
		$this->imagen_estimadoActual=$imagen_estimado_control_session->imagen_estimadoActual;
		$this->imagen_estimado=$imagen_estimado_control_session->imagen_estimado;
		$this->imagen_estimadoClase=$imagen_estimado_control_session->imagen_estimadoClase;
		$this->imagen_estimados=$imagen_estimado_control_session->imagen_estimados;
		$this->imagen_estimadosEliminados=$imagen_estimado_control_session->imagen_estimadosEliminados;
		$this->imagen_estimado=$imagen_estimado_control_session->imagen_estimado;
		$this->imagen_estimadosReporte=$imagen_estimado_control_session->imagen_estimadosReporte;
		$this->imagen_estimadosSeleccionados=$imagen_estimado_control_session->imagen_estimadosSeleccionados;
		$this->arrOrderBy=$imagen_estimado_control_session->arrOrderBy;
		$this->arrOrderByRel=$imagen_estimado_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$imagen_estimado_control_session->arrHistoryWebs;
		$this->arrSessionBases=$imagen_estimado_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadimagen_estimado=$imagen_estimado_control_session->strTypeOnLoadimagen_estimado;
		$this->strTipoPaginaAuxiliarimagen_estimado=$imagen_estimado_control_session->strTipoPaginaAuxiliarimagen_estimado;
		$this->strTipoUsuarioAuxiliarimagen_estimado=$imagen_estimado_control_session->strTipoUsuarioAuxiliarimagen_estimado;	
		
		$this->bitEsPopup=$imagen_estimado_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$imagen_estimado_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$imagen_estimado_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$imagen_estimado_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$imagen_estimado_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$imagen_estimado_control_session->strSufijo;
		$this->bitEsRelaciones=$imagen_estimado_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$imagen_estimado_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$imagen_estimado_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$imagen_estimado_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$imagen_estimado_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$imagen_estimado_control_session->strTituloTabla;
		$this->strTituloPathPagina=$imagen_estimado_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$imagen_estimado_control_session->strTituloPathElementoActual;
		
		if($this->imagen_estimadoLogic==null) {			
			$this->imagen_estimadoLogic=new imagen_estimado_logic();
		}
		
		
		if($this->imagen_estimadoClase==null) {
			$this->imagen_estimadoClase=new imagen_estimado();	
		}
		
		$this->imagen_estimadoLogic->setimagen_estimado($this->imagen_estimadoClase);
		
		
		if($this->imagen_estimados==null) {
			$this->imagen_estimados=array();	
		}
		
		$this->imagen_estimadoLogic->setimagen_estimados($this->imagen_estimados);
		
		
		$this->strTipoView=$imagen_estimado_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$imagen_estimado_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$imagen_estimado_control_session->datosCliente;
		$this->strAccionBusqueda=$imagen_estimado_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$imagen_estimado_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$imagen_estimado_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$imagen_estimado_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$imagen_estimado_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$imagen_estimado_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$imagen_estimado_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$imagen_estimado_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$imagen_estimado_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$imagen_estimado_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$imagen_estimado_control_session->strTipoPaginacion;
		$this->strTipoAccion=$imagen_estimado_control_session->strTipoAccion;
		$this->tiposReportes=$imagen_estimado_control_session->tiposReportes;
		$this->tiposReporte=$imagen_estimado_control_session->tiposReporte;
		$this->tiposAcciones=$imagen_estimado_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$imagen_estimado_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$imagen_estimado_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$imagen_estimado_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$imagen_estimado_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$imagen_estimado_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$imagen_estimado_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$imagen_estimado_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$imagen_estimado_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$imagen_estimado_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$imagen_estimado_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$imagen_estimado_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$imagen_estimado_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$imagen_estimado_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$imagen_estimado_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$imagen_estimado_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$imagen_estimado_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$imagen_estimado_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$imagen_estimado_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$imagen_estimado_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$imagen_estimado_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$imagen_estimado_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$imagen_estimado_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$imagen_estimado_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$imagen_estimado_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$imagen_estimado_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$imagen_estimado_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$imagen_estimado_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$imagen_estimado_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$imagen_estimado_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$imagen_estimado_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$imagen_estimado_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$imagen_estimado_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$imagen_estimado_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$imagen_estimado_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$imagen_estimado_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$imagen_estimado_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$imagen_estimado_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$imagen_estimado_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$imagen_estimado_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$imagen_estimado_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$imagen_estimado_control_session->resumenUsuarioActual;	
		$this->moduloActual=$imagen_estimado_control_session->moduloActual;	
		$this->opcionActual=$imagen_estimado_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$imagen_estimado_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$imagen_estimado_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$imagen_estimado_session=unserialize($this->Session->read(imagen_estimado_util::$STR_SESSION_NAME));
				
		if($imagen_estimado_session==null) {
			$imagen_estimado_session=new imagen_estimado_session();
		}
		
		$this->strStyleDivArbol=$imagen_estimado_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_estimado_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_estimado_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_estimado_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_estimado_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_estimado_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$imagen_estimado_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$imagen_estimado_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$imagen_estimado_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$imagen_estimado_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$imagen_estimado_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_estimado=$imagen_estimado_control_session->strMensajeid_estimado;
		$this->strMensajeimagen=$imagen_estimado_control_session->strMensajeimagen;
			
		
		$this->estimadosFK=$imagen_estimado_control_session->estimadosFK;
		$this->idestimadoDefaultFK=$imagen_estimado_control_session->idestimadoDefaultFK;
		
		
		$this->strVisibleFK_Idestimado=$imagen_estimado_control_session->strVisibleFK_Idestimado;
		
		
		
		
		$this->id_estimadoFK_Idestimado=$imagen_estimado_control_session->id_estimadoFK_Idestimado;

		
		
		
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
	
	public function getimagen_estimadoControllerAdditional() {
		return $this->imagen_estimadoControllerAdditional;
	}

	public function setimagen_estimadoControllerAdditional($imagen_estimadoControllerAdditional) {
		$this->imagen_estimadoControllerAdditional = $imagen_estimadoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getimagen_estimadoActual() : imagen_estimado {
		return $this->imagen_estimadoActual;
	}

	public function setimagen_estimadoActual(imagen_estimado $imagen_estimadoActual) {
		$this->imagen_estimadoActual = $imagen_estimadoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidimagen_estimado() : int {
		return $this->idimagen_estimado;
	}

	public function setidimagen_estimado(int $idimagen_estimado) {
		$this->idimagen_estimado = $idimagen_estimado;
	}
	
	public function getimagen_estimado() : imagen_estimado {
		return $this->imagen_estimado;
	}

	public function setimagen_estimado(imagen_estimado $imagen_estimado) {
		$this->imagen_estimado = $imagen_estimado;
	}
		
	public function getimagen_estimadoLogic() : imagen_estimado_logic {		
		return $this->imagen_estimadoLogic;
	}

	public function setimagen_estimadoLogic(imagen_estimado_logic $imagen_estimadoLogic) {
		$this->imagen_estimadoLogic = $imagen_estimadoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getimagen_estimadosModel() {		
		try {						
			/*imagen_estimadosModel.setWrappedData(imagen_estimadoLogic->getimagen_estimados());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->imagen_estimadosModel;
	}
	
	public function setimagen_estimadosModel($imagen_estimadosModel) {
		$this->imagen_estimadosModel = $imagen_estimadosModel;
	}
	
	public function getimagen_estimados() : array {		
		return $this->imagen_estimados;
	}
	
	public function setimagen_estimados(array $imagen_estimados) {
		$this->imagen_estimados= $imagen_estimados;
	}
	
	public function getimagen_estimadosEliminados() : array {		
		return $this->imagen_estimadosEliminados;
	}
	
	public function setimagen_estimadosEliminados(array $imagen_estimadosEliminados) {
		$this->imagen_estimadosEliminados= $imagen_estimadosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getimagen_estimadoActualFromListDataModel() {
		try {
			/*$imagen_estimadoClase= $this->imagen_estimadosModel->getRowData();*/
			
			/*return $imagen_estimado;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
