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

namespace com\bydan\contabilidad\seguridad\perfil_accion\presentation\control;

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

use com\bydan\contabilidad\seguridad\perfil_accion\business\entity\perfil_accion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/perfil_accion/util/perfil_accion_carga.php');
use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_carga;

use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_util;
use com\bydan\contabilidad\seguridad\perfil_accion\util\perfil_accion_param_return;
use com\bydan\contabilidad\seguridad\perfil_accion\business\logic\perfil_accion_logic;
use com\bydan\contabilidad\seguridad\perfil_accion\presentation\session\perfil_accion_session;


//FK


use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;

use com\bydan\contabilidad\seguridad\accion\business\entity\accion;
use com\bydan\contabilidad\seguridad\accion\business\logic\accion_logic;
use com\bydan\contabilidad\seguridad\accion\util\accion_carga;
use com\bydan\contabilidad\seguridad\accion\util\accion_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
perfil_accion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
perfil_accion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
perfil_accion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
perfil_accion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*perfil_accion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class perfil_accion_init_control extends ControllerBase {	
	
	public $perfil_accionClase=null;	
	public $perfil_accionsModel=null;	
	public $perfil_accionsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idperfil_accion=0;	
	public ?int $idperfil_accionActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $perfil_accionLogic=null;
	
	public $perfil_accionActual=null;	
	
	public $perfil_accion=null;
	public $perfil_accions=null;
	public $perfil_accionsEliminados=array();
	public $perfil_accionsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $perfil_accionsLocal=array();
	public ?array $perfil_accionsReporte=null;
	public ?array $perfil_accionsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadperfil_accion='onload';
	public string $strTipoPaginaAuxiliarperfil_accion='none';
	public string $strTipoUsuarioAuxiliarperfil_accion='none';
		
	public $perfil_accionReturnGeneral=null;
	public $perfil_accionParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $perfil_accionModel=null;
	public $perfil_accionControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_perfil='';
	public string $strMensajeid_accion='';
	public string $strMensajeejecusion='';
	public string $strMensajeestado='';
	
	
	public string $strVisibleFK_Idaccion='display:table-row';
	public string $strVisibleFK_Idperfil='display:table-row';

	
	public array $perfilsFK=array();

	public function getperfilsFK():array {
		return $this->perfilsFK;
	}

	public function setperfilsFK(array $perfilsFK) {
		$this->perfilsFK = $perfilsFK;
	}

	public int $idperfilDefaultFK=-1;

	public function getIdperfilDefaultFK():int {
		return $this->idperfilDefaultFK;
	}

	public function setIdperfilDefaultFK(int $idperfilDefaultFK) {
		$this->idperfilDefaultFK = $idperfilDefaultFK;
	}

	public array $accionsFK=array();

	public function getaccionsFK():array {
		return $this->accionsFK;
	}

	public function setaccionsFK(array $accionsFK) {
		$this->accionsFK = $accionsFK;
	}

	public int $idaccionDefaultFK=-1;

	public function getIdaccionDefaultFK():int {
		return $this->idaccionDefaultFK;
	}

	public function setIdaccionDefaultFK(int $idaccionDefaultFK) {
		$this->idaccionDefaultFK = $idaccionDefaultFK;
	}

	
	
	public $perfil_control=null;
	public $perfil_session=null;
	
	
	//BUSQUEDA INTERNA FK
	public $idperfilActual=0;

	public function getidperfilActual() {
		return $this->idperfilActual;
	}

	public function setidperfilActual($idperfilActual) {
		$this->idperfilActual=$idperfilActual;
	}
	
	
	
	
	public  $id_accionFK_Idaccion=null;

	public  $id_perfilFK_Idperfil=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->perfil_accionLogic==null) {
				$this->perfil_accionLogic=new perfil_accion_logic();
			}
			
		} else {
			if($this->perfil_accionLogic==null) {
				$this->perfil_accionLogic=new perfil_accion_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->perfil_accionClase==null) {
				$this->perfil_accionClase=new perfil_accion();
			}
			
			$this->perfil_accionClase->setId(0);	
				
				
			$this->perfil_accionClase->setid_perfil(-1);	
			$this->perfil_accionClase->setid_accion(-1);	
			$this->perfil_accionClase->setejecusion(false);	
			$this->perfil_accionClase->setestado(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('perfil_accion');
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
		$this->cargarParametrosReporteBase('perfil_accion');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('perfil_accion');
	}
	
	public function actualizarControllerConReturnGeneral(perfil_accion_param_return $perfil_accionReturnGeneral) {
		if($perfil_accionReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesperfil_accionsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$perfil_accionReturnGeneral->getsMensajeProceso();
		}
		
		if($perfil_accionReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$perfil_accionReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($perfil_accionReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$perfil_accionReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$perfil_accionReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($perfil_accionReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($perfil_accionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$perfil_accionReturnGeneral->getsFuncionJs();
		}
		
		if($perfil_accionReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(perfil_accion_session $perfil_accion_session){
		$this->strStyleDivArbol=$perfil_accion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$perfil_accion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$perfil_accion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$perfil_accion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$perfil_accion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$perfil_accion_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$perfil_accion_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(perfil_accion_session $perfil_accion_session){
		$perfil_accion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$perfil_accion_session->strStyleDivHeader='display:none';			
		$perfil_accion_session->strStyleDivContent='width:93%;height:100%';	
		$perfil_accion_session->strStyleDivOpcionesBanner='display:none';	
		$perfil_accion_session->strStyleDivExpandirColapsar='display:none';	
		$perfil_accion_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(perfil_accion_control $perfil_accion_control_session){
		$this->idNuevo=$perfil_accion_control_session->idNuevo;
		$this->perfil_accionActual=$perfil_accion_control_session->perfil_accionActual;
		$this->perfil_accion=$perfil_accion_control_session->perfil_accion;
		$this->perfil_accionClase=$perfil_accion_control_session->perfil_accionClase;
		$this->perfil_accions=$perfil_accion_control_session->perfil_accions;
		$this->perfil_accionsEliminados=$perfil_accion_control_session->perfil_accionsEliminados;
		$this->perfil_accion=$perfil_accion_control_session->perfil_accion;
		$this->perfil_accionsReporte=$perfil_accion_control_session->perfil_accionsReporte;
		$this->perfil_accionsSeleccionados=$perfil_accion_control_session->perfil_accionsSeleccionados;
		$this->arrOrderBy=$perfil_accion_control_session->arrOrderBy;
		$this->arrOrderByRel=$perfil_accion_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$perfil_accion_control_session->arrHistoryWebs;
		$this->arrSessionBases=$perfil_accion_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadperfil_accion=$perfil_accion_control_session->strTypeOnLoadperfil_accion;
		$this->strTipoPaginaAuxiliarperfil_accion=$perfil_accion_control_session->strTipoPaginaAuxiliarperfil_accion;
		$this->strTipoUsuarioAuxiliarperfil_accion=$perfil_accion_control_session->strTipoUsuarioAuxiliarperfil_accion;	
		
		$this->bitEsPopup=$perfil_accion_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$perfil_accion_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$perfil_accion_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$perfil_accion_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$perfil_accion_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$perfil_accion_control_session->strSufijo;
		$this->bitEsRelaciones=$perfil_accion_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$perfil_accion_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$perfil_accion_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$perfil_accion_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$perfil_accion_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$perfil_accion_control_session->strTituloTabla;
		$this->strTituloPathPagina=$perfil_accion_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$perfil_accion_control_session->strTituloPathElementoActual;
		
		if($this->perfil_accionLogic==null) {			
			$this->perfil_accionLogic=new perfil_accion_logic();
		}
		
		
		if($this->perfil_accionClase==null) {
			$this->perfil_accionClase=new perfil_accion();	
		}
		
		$this->perfil_accionLogic->setperfil_accion($this->perfil_accionClase);
		
		
		if($this->perfil_accions==null) {
			$this->perfil_accions=array();	
		}
		
		$this->perfil_accionLogic->setperfil_accions($this->perfil_accions);
		
		
		$this->strTipoView=$perfil_accion_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$perfil_accion_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$perfil_accion_control_session->datosCliente;
		$this->strAccionBusqueda=$perfil_accion_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$perfil_accion_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$perfil_accion_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$perfil_accion_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$perfil_accion_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$perfil_accion_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$perfil_accion_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$perfil_accion_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$perfil_accion_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$perfil_accion_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$perfil_accion_control_session->strTipoPaginacion;
		$this->strTipoAccion=$perfil_accion_control_session->strTipoAccion;
		$this->tiposReportes=$perfil_accion_control_session->tiposReportes;
		$this->tiposReporte=$perfil_accion_control_session->tiposReporte;
		$this->tiposAcciones=$perfil_accion_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$perfil_accion_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$perfil_accion_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$perfil_accion_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$perfil_accion_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$perfil_accion_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$perfil_accion_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$perfil_accion_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$perfil_accion_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$perfil_accion_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$perfil_accion_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$perfil_accion_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$perfil_accion_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$perfil_accion_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$perfil_accion_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$perfil_accion_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$perfil_accion_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$perfil_accion_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$perfil_accion_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$perfil_accion_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$perfil_accion_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$perfil_accion_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$perfil_accion_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$perfil_accion_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$perfil_accion_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$perfil_accion_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$perfil_accion_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$perfil_accion_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$perfil_accion_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$perfil_accion_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$perfil_accion_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$perfil_accion_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$perfil_accion_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$perfil_accion_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$perfil_accion_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$perfil_accion_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$perfil_accion_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$perfil_accion_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$perfil_accion_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$perfil_accion_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$perfil_accion_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$perfil_accion_control_session->resumenUsuarioActual;	
		$this->moduloActual=$perfil_accion_control_session->moduloActual;	
		$this->opcionActual=$perfil_accion_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$perfil_accion_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$perfil_accion_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$perfil_accion_session=unserialize($this->Session->read(perfil_accion_util::$STR_SESSION_NAME));
				
		if($perfil_accion_session==null) {
			$perfil_accion_session=new perfil_accion_session();
		}
		
		$this->strStyleDivArbol=$perfil_accion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$perfil_accion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$perfil_accion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$perfil_accion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$perfil_accion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$perfil_accion_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$perfil_accion_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$perfil_accion_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$perfil_accion_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$perfil_accion_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$perfil_accion_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_perfil=$perfil_accion_control_session->strMensajeid_perfil;
		$this->strMensajeid_accion=$perfil_accion_control_session->strMensajeid_accion;
		$this->strMensajeejecusion=$perfil_accion_control_session->strMensajeejecusion;
		$this->strMensajeestado=$perfil_accion_control_session->strMensajeestado;
			
		
		$this->perfilsFK=$perfil_accion_control_session->perfilsFK;
		$this->idperfilDefaultFK=$perfil_accion_control_session->idperfilDefaultFK;
		$this->accionsFK=$perfil_accion_control_session->accionsFK;
		$this->idaccionDefaultFK=$perfil_accion_control_session->idaccionDefaultFK;
		
		
		$this->strVisibleFK_Idaccion=$perfil_accion_control_session->strVisibleFK_Idaccion;
		$this->strVisibleFK_Idperfil=$perfil_accion_control_session->strVisibleFK_Idperfil;
		
		
		
		
		$this->id_accionFK_Idaccion=$perfil_accion_control_session->id_accionFK_Idaccion;
		$this->id_perfilFK_Idperfil=$perfil_accion_control_session->id_perfilFK_Idperfil;

		
		
		
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
	
	public function getperfil_accionControllerAdditional() {
		return $this->perfil_accionControllerAdditional;
	}

	public function setperfil_accionControllerAdditional($perfil_accionControllerAdditional) {
		$this->perfil_accionControllerAdditional = $perfil_accionControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getperfil_accionActual() : perfil_accion {
		return $this->perfil_accionActual;
	}

	public function setperfil_accionActual(perfil_accion $perfil_accionActual) {
		$this->perfil_accionActual = $perfil_accionActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidperfil_accion() : int {
		return $this->idperfil_accion;
	}

	public function setidperfil_accion(int $idperfil_accion) {
		$this->idperfil_accion = $idperfil_accion;
	}
	
	public function getperfil_accion() : perfil_accion {
		return $this->perfil_accion;
	}

	public function setperfil_accion(perfil_accion $perfil_accion) {
		$this->perfil_accion = $perfil_accion;
	}
		
	public function getperfil_accionLogic() : perfil_accion_logic {		
		return $this->perfil_accionLogic;
	}

	public function setperfil_accionLogic(perfil_accion_logic $perfil_accionLogic) {
		$this->perfil_accionLogic = $perfil_accionLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getperfil_accionsModel() {		
		try {						
			/*perfil_accionsModel.setWrappedData(perfil_accionLogic->getperfil_accions());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->perfil_accionsModel;
	}
	
	public function setperfil_accionsModel($perfil_accionsModel) {
		$this->perfil_accionsModel = $perfil_accionsModel;
	}
	
	public function getperfil_accions() : array {		
		return $this->perfil_accions;
	}
	
	public function setperfil_accions(array $perfil_accions) {
		$this->perfil_accions= $perfil_accions;
	}
	
	public function getperfil_accionsEliminados() : array {		
		return $this->perfil_accionsEliminados;
	}
	
	public function setperfil_accionsEliminados(array $perfil_accionsEliminados) {
		$this->perfil_accionsEliminados= $perfil_accionsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getperfil_accionActualFromListDataModel() {
		try {
			/*$perfil_accionClase= $this->perfil_accionsModel->getRowData();*/
			
			/*return $perfil_accion;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
