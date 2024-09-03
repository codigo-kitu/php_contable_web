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

namespace com\bydan\contabilidad\contabilidad\cierre_contable_detalle\presentation\control;

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

use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\business\entity\cierre_contable_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cierre_contable_detalle/util/cierre_contable_detalle_carga.php');
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util\cierre_contable_detalle_carga;

use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util\cierre_contable_detalle_util;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util\cierre_contable_detalle_param_return;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\business\logic\cierre_contable_detalle_logic;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\presentation\session\cierre_contable_detalle_session;


//FK


use com\bydan\contabilidad\contabilidad\cierre_contable\business\entity\cierre_contable;
use com\bydan\contabilidad\contabilidad\cierre_contable\business\logic\cierre_contable_logic;
use com\bydan\contabilidad\contabilidad\cierre_contable\util\cierre_contable_carga;
use com\bydan\contabilidad\contabilidad\cierre_contable\util\cierre_contable_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
cierre_contable_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cierre_contable_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cierre_contable_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cierre_contable_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cierre_contable_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cierre_contable_detalle_init_control extends ControllerBase {	
	
	public $cierre_contable_detalleClase=null;	
	public $cierre_contable_detallesModel=null;	
	public $cierre_contable_detallesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcierre_contable_detalle=0;	
	public ?int $idcierre_contable_detalleActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $cierre_contable_detalleLogic=null;
	
	public $cierre_contable_detalleActual=null;	
	
	public $cierre_contable_detalle=null;
	public $cierre_contable_detalles=null;
	public $cierre_contable_detallesEliminados=array();
	public $cierre_contable_detallesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $cierre_contable_detallesLocal=array();
	public ?array $cierre_contable_detallesReporte=null;
	public ?array $cierre_contable_detallesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcierre_contable_detalle='onload';
	public string $strTipoPaginaAuxiliarcierre_contable_detalle='none';
	public string $strTipoUsuarioAuxiliarcierre_contable_detalle='none';
		
	public $cierre_contable_detalleReturnGeneral=null;
	public $cierre_contable_detalleParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $cierre_contable_detalleModel=null;
	public $cierre_contable_detalleControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_detalle='';
	public string $strMensajeid_cierre_contable='';
	public string $strMensajenro_documento='';
	public string $strMensajetipo_factura='';
	public string $strMensajemonto='';
	
	
	public string $strVisibleFK_Idcierre_contable='display:table-row';

	
	public array $cierre_contablesFK=array();

	public function getcierre_contablesFK():array {
		return $this->cierre_contablesFK;
	}

	public function setcierre_contablesFK(array $cierre_contablesFK) {
		$this->cierre_contablesFK = $cierre_contablesFK;
	}

	public int $idcierre_contableDefaultFK=-1;

	public function getIdcierre_contableDefaultFK():int {
		return $this->idcierre_contableDefaultFK;
	}

	public function setIdcierre_contableDefaultFK(int $idcierre_contableDefaultFK) {
		$this->idcierre_contableDefaultFK = $idcierre_contableDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_cierre_contableFK_Idcierre_contable=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->cierre_contable_detalleLogic==null) {
				$this->cierre_contable_detalleLogic=new cierre_contable_detalle_logic();
			}
			
		} else {
			if($this->cierre_contable_detalleLogic==null) {
				$this->cierre_contable_detalleLogic=new cierre_contable_detalle_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->cierre_contable_detalleClase==null) {
				$this->cierre_contable_detalleClase=new cierre_contable_detalle();
			}
			
			$this->cierre_contable_detalleClase->setId(0);	
				
				
			$this->cierre_contable_detalleClase->setid_detalle(0);	
			$this->cierre_contable_detalleClase->setid_cierre_contable(-1);	
			$this->cierre_contable_detalleClase->setnro_documento('');	
			$this->cierre_contable_detalleClase->settipo_factura('');	
			$this->cierre_contable_detalleClase->setmonto(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('cierre_contable_detalle');
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
		$this->cargarParametrosReporteBase('cierre_contable_detalle');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('cierre_contable_detalle');
	}
	
	public function actualizarControllerConReturnGeneral(cierre_contable_detalle_param_return $cierre_contable_detalleReturnGeneral) {
		if($cierre_contable_detalleReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescierre_contable_detallesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$cierre_contable_detalleReturnGeneral->getsMensajeProceso();
		}
		
		if($cierre_contable_detalleReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$cierre_contable_detalleReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($cierre_contable_detalleReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$cierre_contable_detalleReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$cierre_contable_detalleReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($cierre_contable_detalleReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($cierre_contable_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$cierre_contable_detalleReturnGeneral->getsFuncionJs();
		}
		
		if($cierre_contable_detalleReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(cierre_contable_detalle_session $cierre_contable_detalle_session){
		$this->strStyleDivArbol=$cierre_contable_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cierre_contable_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cierre_contable_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cierre_contable_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cierre_contable_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cierre_contable_detalle_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$cierre_contable_detalle_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(cierre_contable_detalle_session $cierre_contable_detalle_session){
		$cierre_contable_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$cierre_contable_detalle_session->strStyleDivHeader='display:none';			
		$cierre_contable_detalle_session->strStyleDivContent='width:93%;height:100%';	
		$cierre_contable_detalle_session->strStyleDivOpcionesBanner='display:none';	
		$cierre_contable_detalle_session->strStyleDivExpandirColapsar='display:none';	
		$cierre_contable_detalle_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(cierre_contable_detalle_control $cierre_contable_detalle_control_session){
		$this->idNuevo=$cierre_contable_detalle_control_session->idNuevo;
		$this->cierre_contable_detalleActual=$cierre_contable_detalle_control_session->cierre_contable_detalleActual;
		$this->cierre_contable_detalle=$cierre_contable_detalle_control_session->cierre_contable_detalle;
		$this->cierre_contable_detalleClase=$cierre_contable_detalle_control_session->cierre_contable_detalleClase;
		$this->cierre_contable_detalles=$cierre_contable_detalle_control_session->cierre_contable_detalles;
		$this->cierre_contable_detallesEliminados=$cierre_contable_detalle_control_session->cierre_contable_detallesEliminados;
		$this->cierre_contable_detalle=$cierre_contable_detalle_control_session->cierre_contable_detalle;
		$this->cierre_contable_detallesReporte=$cierre_contable_detalle_control_session->cierre_contable_detallesReporte;
		$this->cierre_contable_detallesSeleccionados=$cierre_contable_detalle_control_session->cierre_contable_detallesSeleccionados;
		$this->arrOrderBy=$cierre_contable_detalle_control_session->arrOrderBy;
		$this->arrOrderByRel=$cierre_contable_detalle_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$cierre_contable_detalle_control_session->arrHistoryWebs;
		$this->arrSessionBases=$cierre_contable_detalle_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcierre_contable_detalle=$cierre_contable_detalle_control_session->strTypeOnLoadcierre_contable_detalle;
		$this->strTipoPaginaAuxiliarcierre_contable_detalle=$cierre_contable_detalle_control_session->strTipoPaginaAuxiliarcierre_contable_detalle;
		$this->strTipoUsuarioAuxiliarcierre_contable_detalle=$cierre_contable_detalle_control_session->strTipoUsuarioAuxiliarcierre_contable_detalle;	
		
		$this->bitEsPopup=$cierre_contable_detalle_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$cierre_contable_detalle_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$cierre_contable_detalle_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$cierre_contable_detalle_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$cierre_contable_detalle_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$cierre_contable_detalle_control_session->strSufijo;
		$this->bitEsRelaciones=$cierre_contable_detalle_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$cierre_contable_detalle_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$cierre_contable_detalle_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$cierre_contable_detalle_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$cierre_contable_detalle_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$cierre_contable_detalle_control_session->strTituloTabla;
		$this->strTituloPathPagina=$cierre_contable_detalle_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$cierre_contable_detalle_control_session->strTituloPathElementoActual;
		
		if($this->cierre_contable_detalleLogic==null) {			
			$this->cierre_contable_detalleLogic=new cierre_contable_detalle_logic();
		}
		
		
		if($this->cierre_contable_detalleClase==null) {
			$this->cierre_contable_detalleClase=new cierre_contable_detalle();	
		}
		
		$this->cierre_contable_detalleLogic->setcierre_contable_detalle($this->cierre_contable_detalleClase);
		
		
		if($this->cierre_contable_detalles==null) {
			$this->cierre_contable_detalles=array();	
		}
		
		$this->cierre_contable_detalleLogic->setcierre_contable_detalles($this->cierre_contable_detalles);
		
		
		$this->strTipoView=$cierre_contable_detalle_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$cierre_contable_detalle_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$cierre_contable_detalle_control_session->datosCliente;
		$this->strAccionBusqueda=$cierre_contable_detalle_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$cierre_contable_detalle_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$cierre_contable_detalle_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$cierre_contable_detalle_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$cierre_contable_detalle_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$cierre_contable_detalle_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$cierre_contable_detalle_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$cierre_contable_detalle_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$cierre_contable_detalle_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$cierre_contable_detalle_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$cierre_contable_detalle_control_session->strTipoPaginacion;
		$this->strTipoAccion=$cierre_contable_detalle_control_session->strTipoAccion;
		$this->tiposReportes=$cierre_contable_detalle_control_session->tiposReportes;
		$this->tiposReporte=$cierre_contable_detalle_control_session->tiposReporte;
		$this->tiposAcciones=$cierre_contable_detalle_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$cierre_contable_detalle_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$cierre_contable_detalle_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$cierre_contable_detalle_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$cierre_contable_detalle_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$cierre_contable_detalle_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$cierre_contable_detalle_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$cierre_contable_detalle_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$cierre_contable_detalle_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$cierre_contable_detalle_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$cierre_contable_detalle_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$cierre_contable_detalle_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$cierre_contable_detalle_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$cierre_contable_detalle_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$cierre_contable_detalle_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$cierre_contable_detalle_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$cierre_contable_detalle_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$cierre_contable_detalle_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$cierre_contable_detalle_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$cierre_contable_detalle_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$cierre_contable_detalle_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$cierre_contable_detalle_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$cierre_contable_detalle_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$cierre_contable_detalle_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$cierre_contable_detalle_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$cierre_contable_detalle_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$cierre_contable_detalle_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$cierre_contable_detalle_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$cierre_contable_detalle_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$cierre_contable_detalle_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$cierre_contable_detalle_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$cierre_contable_detalle_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$cierre_contable_detalle_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$cierre_contable_detalle_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$cierre_contable_detalle_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$cierre_contable_detalle_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$cierre_contable_detalle_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$cierre_contable_detalle_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$cierre_contable_detalle_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$cierre_contable_detalle_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$cierre_contable_detalle_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$cierre_contable_detalle_control_session->resumenUsuarioActual;	
		$this->moduloActual=$cierre_contable_detalle_control_session->moduloActual;	
		$this->opcionActual=$cierre_contable_detalle_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$cierre_contable_detalle_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$cierre_contable_detalle_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$cierre_contable_detalle_session=unserialize($this->Session->read(cierre_contable_detalle_util::$STR_SESSION_NAME));
				
		if($cierre_contable_detalle_session==null) {
			$cierre_contable_detalle_session=new cierre_contable_detalle_session();
		}
		
		$this->strStyleDivArbol=$cierre_contable_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cierre_contable_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cierre_contable_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cierre_contable_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cierre_contable_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cierre_contable_detalle_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$cierre_contable_detalle_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$cierre_contable_detalle_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$cierre_contable_detalle_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$cierre_contable_detalle_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$cierre_contable_detalle_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_detalle=$cierre_contable_detalle_control_session->strMensajeid_detalle;
		$this->strMensajeid_cierre_contable=$cierre_contable_detalle_control_session->strMensajeid_cierre_contable;
		$this->strMensajenro_documento=$cierre_contable_detalle_control_session->strMensajenro_documento;
		$this->strMensajetipo_factura=$cierre_contable_detalle_control_session->strMensajetipo_factura;
		$this->strMensajemonto=$cierre_contable_detalle_control_session->strMensajemonto;
			
		
		$this->cierre_contablesFK=$cierre_contable_detalle_control_session->cierre_contablesFK;
		$this->idcierre_contableDefaultFK=$cierre_contable_detalle_control_session->idcierre_contableDefaultFK;
		
		
		$this->strVisibleFK_Idcierre_contable=$cierre_contable_detalle_control_session->strVisibleFK_Idcierre_contable;
		
		
		
		
		$this->id_cierre_contableFK_Idcierre_contable=$cierre_contable_detalle_control_session->id_cierre_contableFK_Idcierre_contable;

		
		
		
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
	
	public function getcierre_contable_detalleControllerAdditional() {
		return $this->cierre_contable_detalleControllerAdditional;
	}

	public function setcierre_contable_detalleControllerAdditional($cierre_contable_detalleControllerAdditional) {
		$this->cierre_contable_detalleControllerAdditional = $cierre_contable_detalleControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcierre_contable_detalleActual() : cierre_contable_detalle {
		return $this->cierre_contable_detalleActual;
	}

	public function setcierre_contable_detalleActual(cierre_contable_detalle $cierre_contable_detalleActual) {
		$this->cierre_contable_detalleActual = $cierre_contable_detalleActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcierre_contable_detalle() : int {
		return $this->idcierre_contable_detalle;
	}

	public function setidcierre_contable_detalle(int $idcierre_contable_detalle) {
		$this->idcierre_contable_detalle = $idcierre_contable_detalle;
	}
	
	public function getcierre_contable_detalle() : cierre_contable_detalle {
		return $this->cierre_contable_detalle;
	}

	public function setcierre_contable_detalle(cierre_contable_detalle $cierre_contable_detalle) {
		$this->cierre_contable_detalle = $cierre_contable_detalle;
	}
		
	public function getcierre_contable_detalleLogic() : cierre_contable_detalle_logic {		
		return $this->cierre_contable_detalleLogic;
	}

	public function setcierre_contable_detalleLogic(cierre_contable_detalle_logic $cierre_contable_detalleLogic) {
		$this->cierre_contable_detalleLogic = $cierre_contable_detalleLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcierre_contable_detallesModel() {		
		try {						
			/*cierre_contable_detallesModel.setWrappedData(cierre_contable_detalleLogic->getcierre_contable_detalles());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->cierre_contable_detallesModel;
	}
	
	public function setcierre_contable_detallesModel($cierre_contable_detallesModel) {
		$this->cierre_contable_detallesModel = $cierre_contable_detallesModel;
	}
	
	public function getcierre_contable_detalles() : array {		
		return $this->cierre_contable_detalles;
	}
	
	public function setcierre_contable_detalles(array $cierre_contable_detalles) {
		$this->cierre_contable_detalles= $cierre_contable_detalles;
	}
	
	public function getcierre_contable_detallesEliminados() : array {		
		return $this->cierre_contable_detallesEliminados;
	}
	
	public function setcierre_contable_detallesEliminados(array $cierre_contable_detallesEliminados) {
		$this->cierre_contable_detallesEliminados= $cierre_contable_detallesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcierre_contable_detalleActualFromListDataModel() {
		try {
			/*$cierre_contable_detalleClase= $this->cierre_contable_detallesModel->getRowData();*/
			
			/*return $cierre_contable_detalle;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
