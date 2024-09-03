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

namespace com\bydan\contabilidad\contabilidad\cierre_contable\presentation\control;

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

use com\bydan\contabilidad\contabilidad\cierre_contable\business\entity\cierre_contable;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cierre_contable/util/cierre_contable_carga.php');
use com\bydan\contabilidad\contabilidad\cierre_contable\util\cierre_contable_carga;

use com\bydan\contabilidad\contabilidad\cierre_contable\util\cierre_contable_util;
use com\bydan\contabilidad\contabilidad\cierre_contable\util\cierre_contable_param_return;
use com\bydan\contabilidad\contabilidad\cierre_contable\business\logic\cierre_contable_logic;
use com\bydan\contabilidad\contabilidad\cierre_contable\presentation\session\cierre_contable_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

//REL


use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util\cierre_contable_detalle_carga;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\util\cierre_contable_detalle_util;
use com\bydan\contabilidad\contabilidad\cierre_contable_detalle\presentation\session\cierre_contable_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
cierre_contable_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cierre_contable_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cierre_contable_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cierre_contable_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cierre_contable_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cierre_contable_init_control extends ControllerBase {	
	
	public $cierre_contableClase=null;	
	public $cierre_contablesModel=null;	
	public $cierre_contablesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcierre_contable=0;	
	public ?int $idcierre_contableActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $cierre_contableLogic=null;
	
	public $cierre_contableActual=null;	
	
	public $cierre_contable=null;
	public $cierre_contables=null;
	public $cierre_contablesEliminados=array();
	public $cierre_contablesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $cierre_contablesLocal=array();
	public ?array $cierre_contablesReporte=null;
	public ?array $cierre_contablesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcierre_contable='onload';
	public string $strTipoPaginaAuxiliarcierre_contable='none';
	public string $strTipoUsuarioAuxiliarcierre_contable='none';
		
	public $cierre_contableReturnGeneral=null;
	public $cierre_contableParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $cierre_contableModel=null;
	public $cierre_contableControllerAdditional=null;
	
	
	

	public $cierrecontabledetalleLogic=null;

	public function  getcierre_contable_detalleLogic() {
		return $this->cierrecontabledetalleLogic;
	}

	public function setcierre_contable_detalleLogic($cierrecontabledetalleLogic) {
		$this->cierrecontabledetalleLogic =$cierrecontabledetalleLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajefecha_cierre='';
	public string $strMensajegan_per='';
	public string $strMensajetotal_cuentas='';
	
	
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';

	
	public array $empresasFK=array();

	public function getempresasFK():array {
		return $this->empresasFK;
	}

	public function setempresasFK(array $empresasFK) {
		$this->empresasFK = $empresasFK;
	}

	public int $idempresaDefaultFK=-1;

	public function getIdempresaDefaultFK():int {
		return $this->idempresaDefaultFK;
	}

	public function setIdempresaDefaultFK(int $idempresaDefaultFK) {
		$this->idempresaDefaultFK = $idempresaDefaultFK;
	}

	public array $ejerciciosFK=array();

	public function getejerciciosFK():array {
		return $this->ejerciciosFK;
	}

	public function setejerciciosFK(array $ejerciciosFK) {
		$this->ejerciciosFK = $ejerciciosFK;
	}

	public int $idejercicioDefaultFK=-1;

	public function getIdejercicioDefaultFK():int {
		return $this->idejercicioDefaultFK;
	}

	public function setIdejercicioDefaultFK(int $idejercicioDefaultFK) {
		$this->idejercicioDefaultFK = $idejercicioDefaultFK;
	}

	public array $periodosFK=array();

	public function getperiodosFK():array {
		return $this->periodosFK;
	}

	public function setperiodosFK(array $periodosFK) {
		$this->periodosFK = $periodosFK;
	}

	public int $idperiodoDefaultFK=-1;

	public function getIdperiodoDefaultFK():int {
		return $this->idperiodoDefaultFK;
	}

	public function setIdperiodoDefaultFK(int $idperiodoDefaultFK) {
		$this->idperiodoDefaultFK = $idperiodoDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisoscierre_contable_detalle='none';
	
	
	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_periodoFK_Idperiodo=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->cierre_contableLogic==null) {
				$this->cierre_contableLogic=new cierre_contable_logic();
			}
			
		} else {
			if($this->cierre_contableLogic==null) {
				$this->cierre_contableLogic=new cierre_contable_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->cierre_contableClase==null) {
				$this->cierre_contableClase=new cierre_contable();
			}
			
			$this->cierre_contableClase->setId(0);	
				
				
			$this->cierre_contableClase->setid_empresa(-1);	
			$this->cierre_contableClase->setid_ejercicio(-1);	
			$this->cierre_contableClase->setid_periodo(-1);	
			$this->cierre_contableClase->setfecha_cierre(date('Y-m-d'));	
			$this->cierre_contableClase->setgan_per(0.0);	
			$this->cierre_contableClase->settotal_cuentas(0);	
			
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
		$this->prepararEjecutarMantenimientoBase('cierre_contable');
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
		$this->cargarParametrosReporteBase('cierre_contable');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('cierre_contable');
	}
	
	public function actualizarControllerConReturnGeneral(cierre_contable_param_return $cierre_contableReturnGeneral) {
		if($cierre_contableReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescierre_contablesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$cierre_contableReturnGeneral->getsMensajeProceso();
		}
		
		if($cierre_contableReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$cierre_contableReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($cierre_contableReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$cierre_contableReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$cierre_contableReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($cierre_contableReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($cierre_contableReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$cierre_contableReturnGeneral->getsFuncionJs();
		}
		
		if($cierre_contableReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(cierre_contable_session $cierre_contable_session){
		$this->strStyleDivArbol=$cierre_contable_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cierre_contable_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cierre_contable_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cierre_contable_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cierre_contable_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cierre_contable_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$cierre_contable_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(cierre_contable_session $cierre_contable_session){
		$cierre_contable_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$cierre_contable_session->strStyleDivHeader='display:none';			
		$cierre_contable_session->strStyleDivContent='width:93%;height:100%';	
		$cierre_contable_session->strStyleDivOpcionesBanner='display:none';	
		$cierre_contable_session->strStyleDivExpandirColapsar='display:none';	
		$cierre_contable_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(cierre_contable_control $cierre_contable_control_session){
		$this->idNuevo=$cierre_contable_control_session->idNuevo;
		$this->cierre_contableActual=$cierre_contable_control_session->cierre_contableActual;
		$this->cierre_contable=$cierre_contable_control_session->cierre_contable;
		$this->cierre_contableClase=$cierre_contable_control_session->cierre_contableClase;
		$this->cierre_contables=$cierre_contable_control_session->cierre_contables;
		$this->cierre_contablesEliminados=$cierre_contable_control_session->cierre_contablesEliminados;
		$this->cierre_contable=$cierre_contable_control_session->cierre_contable;
		$this->cierre_contablesReporte=$cierre_contable_control_session->cierre_contablesReporte;
		$this->cierre_contablesSeleccionados=$cierre_contable_control_session->cierre_contablesSeleccionados;
		$this->arrOrderBy=$cierre_contable_control_session->arrOrderBy;
		$this->arrOrderByRel=$cierre_contable_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$cierre_contable_control_session->arrHistoryWebs;
		$this->arrSessionBases=$cierre_contable_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcierre_contable=$cierre_contable_control_session->strTypeOnLoadcierre_contable;
		$this->strTipoPaginaAuxiliarcierre_contable=$cierre_contable_control_session->strTipoPaginaAuxiliarcierre_contable;
		$this->strTipoUsuarioAuxiliarcierre_contable=$cierre_contable_control_session->strTipoUsuarioAuxiliarcierre_contable;	
		
		$this->bitEsPopup=$cierre_contable_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$cierre_contable_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$cierre_contable_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$cierre_contable_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$cierre_contable_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$cierre_contable_control_session->strSufijo;
		$this->bitEsRelaciones=$cierre_contable_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$cierre_contable_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$cierre_contable_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$cierre_contable_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$cierre_contable_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$cierre_contable_control_session->strTituloTabla;
		$this->strTituloPathPagina=$cierre_contable_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$cierre_contable_control_session->strTituloPathElementoActual;
		
		if($this->cierre_contableLogic==null) {			
			$this->cierre_contableLogic=new cierre_contable_logic();
		}
		
		
		if($this->cierre_contableClase==null) {
			$this->cierre_contableClase=new cierre_contable();	
		}
		
		$this->cierre_contableLogic->setcierre_contable($this->cierre_contableClase);
		
		
		if($this->cierre_contables==null) {
			$this->cierre_contables=array();	
		}
		
		$this->cierre_contableLogic->setcierre_contables($this->cierre_contables);
		
		
		$this->strTipoView=$cierre_contable_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$cierre_contable_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$cierre_contable_control_session->datosCliente;
		$this->strAccionBusqueda=$cierre_contable_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$cierre_contable_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$cierre_contable_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$cierre_contable_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$cierre_contable_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$cierre_contable_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$cierre_contable_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$cierre_contable_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$cierre_contable_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$cierre_contable_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$cierre_contable_control_session->strTipoPaginacion;
		$this->strTipoAccion=$cierre_contable_control_session->strTipoAccion;
		$this->tiposReportes=$cierre_contable_control_session->tiposReportes;
		$this->tiposReporte=$cierre_contable_control_session->tiposReporte;
		$this->tiposAcciones=$cierre_contable_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$cierre_contable_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$cierre_contable_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$cierre_contable_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$cierre_contable_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$cierre_contable_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$cierre_contable_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$cierre_contable_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$cierre_contable_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$cierre_contable_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$cierre_contable_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$cierre_contable_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$cierre_contable_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$cierre_contable_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$cierre_contable_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$cierre_contable_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$cierre_contable_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$cierre_contable_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$cierre_contable_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$cierre_contable_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$cierre_contable_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$cierre_contable_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$cierre_contable_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$cierre_contable_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$cierre_contable_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$cierre_contable_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$cierre_contable_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$cierre_contable_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$cierre_contable_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$cierre_contable_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$cierre_contable_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$cierre_contable_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$cierre_contable_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$cierre_contable_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$cierre_contable_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$cierre_contable_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$cierre_contable_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$cierre_contable_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$cierre_contable_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$cierre_contable_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$cierre_contable_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$cierre_contable_control_session->resumenUsuarioActual;	
		$this->moduloActual=$cierre_contable_control_session->moduloActual;	
		$this->opcionActual=$cierre_contable_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$cierre_contable_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$cierre_contable_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$cierre_contable_session=unserialize($this->Session->read(cierre_contable_util::$STR_SESSION_NAME));
				
		if($cierre_contable_session==null) {
			$cierre_contable_session=new cierre_contable_session();
		}
		
		$this->strStyleDivArbol=$cierre_contable_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cierre_contable_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cierre_contable_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cierre_contable_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cierre_contable_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cierre_contable_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$cierre_contable_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$cierre_contable_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$cierre_contable_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$cierre_contable_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$cierre_contable_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$cierre_contable_control_session->strMensajeid_empresa;
		$this->strMensajeid_ejercicio=$cierre_contable_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$cierre_contable_control_session->strMensajeid_periodo;
		$this->strMensajefecha_cierre=$cierre_contable_control_session->strMensajefecha_cierre;
		$this->strMensajegan_per=$cierre_contable_control_session->strMensajegan_per;
		$this->strMensajetotal_cuentas=$cierre_contable_control_session->strMensajetotal_cuentas;
			
		
		$this->empresasFK=$cierre_contable_control_session->empresasFK;
		$this->idempresaDefaultFK=$cierre_contable_control_session->idempresaDefaultFK;
		$this->ejerciciosFK=$cierre_contable_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$cierre_contable_control_session->idejercicioDefaultFK;
		$this->periodosFK=$cierre_contable_control_session->periodosFK;
		$this->idperiodoDefaultFK=$cierre_contable_control_session->idperiodoDefaultFK;
		
		
		$this->strVisibleFK_Idejercicio=$cierre_contable_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$cierre_contable_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idperiodo=$cierre_contable_control_session->strVisibleFK_Idperiodo;
		
		
		$this->strTienePermisoscierre_contable_detalle=$cierre_contable_control_session->strTienePermisoscierre_contable_detalle;
		
		
		$this->id_ejercicioFK_Idejercicio=$cierre_contable_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$cierre_contable_control_session->id_empresaFK_Idempresa;
		$this->id_periodoFK_Idperiodo=$cierre_contable_control_session->id_periodoFK_Idperiodo;

		
		
		
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
	
	public function getcierre_contableControllerAdditional() {
		return $this->cierre_contableControllerAdditional;
	}

	public function setcierre_contableControllerAdditional($cierre_contableControllerAdditional) {
		$this->cierre_contableControllerAdditional = $cierre_contableControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcierre_contableActual() : cierre_contable {
		return $this->cierre_contableActual;
	}

	public function setcierre_contableActual(cierre_contable $cierre_contableActual) {
		$this->cierre_contableActual = $cierre_contableActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcierre_contable() : int {
		return $this->idcierre_contable;
	}

	public function setidcierre_contable(int $idcierre_contable) {
		$this->idcierre_contable = $idcierre_contable;
	}
	
	public function getcierre_contable() : cierre_contable {
		return $this->cierre_contable;
	}

	public function setcierre_contable(cierre_contable $cierre_contable) {
		$this->cierre_contable = $cierre_contable;
	}
		
	public function getcierre_contableLogic() : cierre_contable_logic {		
		return $this->cierre_contableLogic;
	}

	public function setcierre_contableLogic(cierre_contable_logic $cierre_contableLogic) {
		$this->cierre_contableLogic = $cierre_contableLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcierre_contablesModel() {		
		try {						
			/*cierre_contablesModel.setWrappedData(cierre_contableLogic->getcierre_contables());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->cierre_contablesModel;
	}
	
	public function setcierre_contablesModel($cierre_contablesModel) {
		$this->cierre_contablesModel = $cierre_contablesModel;
	}
	
	public function getcierre_contables() : array {		
		return $this->cierre_contables;
	}
	
	public function setcierre_contables(array $cierre_contables) {
		$this->cierre_contables= $cierre_contables;
	}
	
	public function getcierre_contablesEliminados() : array {		
		return $this->cierre_contablesEliminados;
	}
	
	public function setcierre_contablesEliminados(array $cierre_contablesEliminados) {
		$this->cierre_contablesEliminados= $cierre_contablesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcierre_contableActualFromListDataModel() {
		try {
			/*$cierre_contableClase= $this->cierre_contablesModel->getRowData();*/
			
			/*return $cierre_contable;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
