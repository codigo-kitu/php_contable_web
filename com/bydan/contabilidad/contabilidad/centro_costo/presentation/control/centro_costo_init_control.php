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

namespace com\bydan\contabilidad\contabilidad\centro_costo\presentation\control;

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

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/centro_costo/util/centro_costo_carga.php');
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_carga;

use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_param_return;
use com\bydan\contabilidad\contabilidad\centro_costo\business\logic\centro_costo_logic;
use com\bydan\contabilidad\contabilidad\centro_costo\presentation\session\centro_costo_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\session\asiento_predefinido_session;

use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;
use com\bydan\contabilidad\contabilidad\asiento\presentation\session\asiento_session;

use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\util\asiento_automatico_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico_detalle\presentation\session\asiento_automatico_detalle_session;

use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\session\asiento_automatico_session;


/*CARGA ARCHIVOS FRAMEWORK*/
centro_costo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
centro_costo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
centro_costo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*centro_costo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class centro_costo_init_control extends ControllerBase {	
	
	public $centro_costoClase=null;	
	public $centro_costosModel=null;	
	public $centro_costosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcentro_costo=0;	
	public ?int $idcentro_costoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $centro_costoLogic=null;
	
	public $centro_costoActual=null;	
	
	public $centro_costo=null;
	public $centro_costos=null;
	public $centro_costosEliminados=array();
	public $centro_costosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $centro_costosLocal=array();
	public ?array $centro_costosReporte=null;
	public ?array $centro_costosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcentro_costo='onload';
	public string $strTipoPaginaAuxiliarcentro_costo='none';
	public string $strTipoUsuarioAuxiliarcentro_costo='none';
		
	public $centro_costoReturnGeneral=null;
	public $centro_costoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $centro_costoModel=null;
	public $centro_costoControllerAdditional=null;
	
	
	

	public $asientopredefinidodetalleLogic=null;

	public function  getasiento_predefinido_detalleLogic() {
		return $this->asientopredefinidodetalleLogic;
	}

	public function setasiento_predefinido_detalleLogic($asientopredefinidodetalleLogic) {
		$this->asientopredefinidodetalleLogic =$asientopredefinidodetalleLogic;
	}


	public $asientopredefinidoLogic=null;

	public function  getasiento_predefinidoLogic() {
		return $this->asientopredefinidoLogic;
	}

	public function setasiento_predefinidoLogic($asientopredefinidoLogic) {
		$this->asientopredefinidoLogic =$asientopredefinidoLogic;
	}


	public $asientoLogic=null;

	public function  getasientoLogic() {
		return $this->asientoLogic;
	}

	public function setasientoLogic($asientoLogic) {
		$this->asientoLogic =$asientoLogic;
	}


	public $asientoautomaticodetalleLogic=null;

	public function  getasiento_automatico_detalleLogic() {
		return $this->asientoautomaticodetalleLogic;
	}

	public function setasiento_automatico_detalleLogic($asientoautomaticodetalleLogic) {
		$this->asientoautomaticodetalleLogic =$asientoautomaticodetalleLogic;
	}


	public $asientoautomaticoLogic=null;

	public function  getasiento_automaticoLogic() {
		return $this->asientoautomaticoLogic;
	}

	public function setasiento_automaticoLogic($asientoautomaticoLogic) {
		$this->asientoautomaticoLogic =$asientoautomaticoLogic;
	}


	public $asientodetalleLogic=null;

	public function  getasiento_detalleLogic() {
		return $this->asientodetalleLogic;
	}

	public function setasiento_detalleLogic($asientodetalleLogic) {
		$this->asientodetalleLogic =$asientodetalleLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	
	
	public string $strVisibleFK_Idempresa='display:table-row';

	
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

	
	
	
	
	
	
	public $strTienePermisosasiento_predefinido='none';
	public $strTienePermisosasiento='none';
	public $strTienePermisosasiento_automatico_detalle='none';
	public $strTienePermisosasiento_automatico='none';
	
	
	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->centro_costoLogic==null) {
				$this->centro_costoLogic=new centro_costo_logic();
			}
			
		} else {
			if($this->centro_costoLogic==null) {
				$this->centro_costoLogic=new centro_costo_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->centro_costoClase==null) {
				$this->centro_costoClase=new centro_costo();
			}
			
			$this->centro_costoClase->setId(0);	
				
				
			$this->centro_costoClase->setid_empresa(-1);	
			$this->centro_costoClase->setcodigo('');	
			$this->centro_costoClase->setnombre('');	
			
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
		$this->prepararEjecutarMantenimientoBase('centro_costo');
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
		$this->cargarParametrosReporteBase('centro_costo');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('centro_costo');
	}
	
	public function actualizarControllerConReturnGeneral(centro_costo_param_return $centro_costoReturnGeneral) {
		if($centro_costoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescentro_costosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$centro_costoReturnGeneral->getsMensajeProceso();
		}
		
		if($centro_costoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$centro_costoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($centro_costoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$centro_costoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$centro_costoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($centro_costoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($centro_costoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$centro_costoReturnGeneral->getsFuncionJs();
		}
		
		if($centro_costoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(centro_costo_session $centro_costo_session){
		$this->strStyleDivArbol=$centro_costo_session->strStyleDivArbol;	
		$this->strStyleDivContent=$centro_costo_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$centro_costo_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$centro_costo_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$centro_costo_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$centro_costo_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$centro_costo_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(centro_costo_session $centro_costo_session){
		$centro_costo_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$centro_costo_session->strStyleDivHeader='display:none';			
		$centro_costo_session->strStyleDivContent='width:93%;height:100%';	
		$centro_costo_session->strStyleDivOpcionesBanner='display:none';	
		$centro_costo_session->strStyleDivExpandirColapsar='display:none';	
		$centro_costo_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(centro_costo_control $centro_costo_control_session){
		$this->idNuevo=$centro_costo_control_session->idNuevo;
		$this->centro_costoActual=$centro_costo_control_session->centro_costoActual;
		$this->centro_costo=$centro_costo_control_session->centro_costo;
		$this->centro_costoClase=$centro_costo_control_session->centro_costoClase;
		$this->centro_costos=$centro_costo_control_session->centro_costos;
		$this->centro_costosEliminados=$centro_costo_control_session->centro_costosEliminados;
		$this->centro_costo=$centro_costo_control_session->centro_costo;
		$this->centro_costosReporte=$centro_costo_control_session->centro_costosReporte;
		$this->centro_costosSeleccionados=$centro_costo_control_session->centro_costosSeleccionados;
		$this->arrOrderBy=$centro_costo_control_session->arrOrderBy;
		$this->arrOrderByRel=$centro_costo_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$centro_costo_control_session->arrHistoryWebs;
		$this->arrSessionBases=$centro_costo_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcentro_costo=$centro_costo_control_session->strTypeOnLoadcentro_costo;
		$this->strTipoPaginaAuxiliarcentro_costo=$centro_costo_control_session->strTipoPaginaAuxiliarcentro_costo;
		$this->strTipoUsuarioAuxiliarcentro_costo=$centro_costo_control_session->strTipoUsuarioAuxiliarcentro_costo;	
		
		$this->bitEsPopup=$centro_costo_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$centro_costo_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$centro_costo_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$centro_costo_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$centro_costo_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$centro_costo_control_session->strSufijo;
		$this->bitEsRelaciones=$centro_costo_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$centro_costo_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$centro_costo_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$centro_costo_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$centro_costo_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$centro_costo_control_session->strTituloTabla;
		$this->strTituloPathPagina=$centro_costo_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$centro_costo_control_session->strTituloPathElementoActual;
		
		if($this->centro_costoLogic==null) {			
			$this->centro_costoLogic=new centro_costo_logic();
		}
		
		
		if($this->centro_costoClase==null) {
			$this->centro_costoClase=new centro_costo();	
		}
		
		$this->centro_costoLogic->setcentro_costo($this->centro_costoClase);
		
		
		if($this->centro_costos==null) {
			$this->centro_costos=array();	
		}
		
		$this->centro_costoLogic->setcentro_costos($this->centro_costos);
		
		
		$this->strTipoView=$centro_costo_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$centro_costo_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$centro_costo_control_session->datosCliente;
		$this->strAccionBusqueda=$centro_costo_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$centro_costo_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$centro_costo_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$centro_costo_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$centro_costo_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$centro_costo_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$centro_costo_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$centro_costo_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$centro_costo_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$centro_costo_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$centro_costo_control_session->strTipoPaginacion;
		$this->strTipoAccion=$centro_costo_control_session->strTipoAccion;
		$this->tiposReportes=$centro_costo_control_session->tiposReportes;
		$this->tiposReporte=$centro_costo_control_session->tiposReporte;
		$this->tiposAcciones=$centro_costo_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$centro_costo_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$centro_costo_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$centro_costo_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$centro_costo_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$centro_costo_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$centro_costo_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$centro_costo_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$centro_costo_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$centro_costo_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$centro_costo_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$centro_costo_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$centro_costo_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$centro_costo_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$centro_costo_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$centro_costo_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$centro_costo_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$centro_costo_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$centro_costo_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$centro_costo_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$centro_costo_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$centro_costo_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$centro_costo_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$centro_costo_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$centro_costo_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$centro_costo_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$centro_costo_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$centro_costo_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$centro_costo_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$centro_costo_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$centro_costo_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$centro_costo_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$centro_costo_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$centro_costo_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$centro_costo_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$centro_costo_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$centro_costo_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$centro_costo_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$centro_costo_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$centro_costo_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$centro_costo_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$centro_costo_control_session->resumenUsuarioActual;	
		$this->moduloActual=$centro_costo_control_session->moduloActual;	
		$this->opcionActual=$centro_costo_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$centro_costo_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$centro_costo_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$centro_costo_session=unserialize($this->Session->read(centro_costo_util::$STR_SESSION_NAME));
				
		if($centro_costo_session==null) {
			$centro_costo_session=new centro_costo_session();
		}
		
		$this->strStyleDivArbol=$centro_costo_session->strStyleDivArbol;	
		$this->strStyleDivContent=$centro_costo_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$centro_costo_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$centro_costo_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$centro_costo_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$centro_costo_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$centro_costo_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$centro_costo_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$centro_costo_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$centro_costo_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$centro_costo_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$centro_costo_control_session->strMensajeid_empresa;
		$this->strMensajecodigo=$centro_costo_control_session->strMensajecodigo;
		$this->strMensajenombre=$centro_costo_control_session->strMensajenombre;
			
		
		$this->empresasFK=$centro_costo_control_session->empresasFK;
		$this->idempresaDefaultFK=$centro_costo_control_session->idempresaDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$centro_costo_control_session->strVisibleFK_Idempresa;
		
		
		$this->strTienePermisosasiento_predefinido=$centro_costo_control_session->strTienePermisosasiento_predefinido;
		$this->strTienePermisosasiento=$centro_costo_control_session->strTienePermisosasiento;
		$this->strTienePermisosasiento_automatico_detalle=$centro_costo_control_session->strTienePermisosasiento_automatico_detalle;
		$this->strTienePermisosasiento_automatico=$centro_costo_control_session->strTienePermisosasiento_automatico;
		
		
		$this->id_empresaFK_Idempresa=$centro_costo_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getcentro_costoControllerAdditional() {
		return $this->centro_costoControllerAdditional;
	}

	public function setcentro_costoControllerAdditional($centro_costoControllerAdditional) {
		$this->centro_costoControllerAdditional = $centro_costoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcentro_costoActual() : centro_costo {
		return $this->centro_costoActual;
	}

	public function setcentro_costoActual(centro_costo $centro_costoActual) {
		$this->centro_costoActual = $centro_costoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcentro_costo() : int {
		return $this->idcentro_costo;
	}

	public function setidcentro_costo(int $idcentro_costo) {
		$this->idcentro_costo = $idcentro_costo;
	}
	
	public function getcentro_costo() : centro_costo {
		return $this->centro_costo;
	}

	public function setcentro_costo(centro_costo $centro_costo) {
		$this->centro_costo = $centro_costo;
	}
		
	public function getcentro_costoLogic() : centro_costo_logic {		
		return $this->centro_costoLogic;
	}

	public function setcentro_costoLogic(centro_costo_logic $centro_costoLogic) {
		$this->centro_costoLogic = $centro_costoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcentro_costosModel() {		
		try {						
			/*centro_costosModel.setWrappedData(centro_costoLogic->getcentro_costos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->centro_costosModel;
	}
	
	public function setcentro_costosModel($centro_costosModel) {
		$this->centro_costosModel = $centro_costosModel;
	}
	
	public function getcentro_costos() : array {		
		return $this->centro_costos;
	}
	
	public function setcentro_costos(array $centro_costos) {
		$this->centro_costos= $centro_costos;
	}
	
	public function getcentro_costosEliminados() : array {		
		return $this->centro_costosEliminados;
	}
	
	public function setcentro_costosEliminados(array $centro_costosEliminados) {
		$this->centro_costosEliminados= $centro_costosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcentro_costoActualFromListDataModel() {
		try {
			/*$centro_costoClase= $this->centro_costosModel->getRowData();*/
			
			/*return $centro_costo;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
