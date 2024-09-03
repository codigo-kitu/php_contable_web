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

namespace com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\presentation\control;

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

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\entity\asiento_predefinido_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/asiento_predefinido_detalle/util/asiento_predefinido_detalle_carga.php');
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_carga;

use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\util\asiento_predefinido_detalle_param_return;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\business\logic\asiento_predefinido_detalle_logic;
use com\bydan\contabilidad\contabilidad\asiento_predefinido_detalle\presentation\session\asiento_predefinido_detalle_session;


//FK


use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\entity\asiento_predefinido;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\business\logic\asiento_predefinido_logic;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

use com\bydan\contabilidad\contabilidad\centro_costo\business\entity\centro_costo;
use com\bydan\contabilidad\contabilidad\centro_costo\business\logic\centro_costo_logic;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_carga;
use com\bydan\contabilidad\contabilidad\centro_costo\util\centro_costo_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
asiento_predefinido_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
asiento_predefinido_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
asiento_predefinido_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
asiento_predefinido_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*asiento_predefinido_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class asiento_predefinido_detalle_init_control extends ControllerBase {	
	
	public $asiento_predefinido_detalleClase=null;	
	public $asiento_predefinido_detallesModel=null;	
	public $asiento_predefinido_detallesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idasiento_predefinido_detalle=0;	
	public ?int $idasiento_predefinido_detalleActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $asiento_predefinido_detalleLogic=null;
	
	public $asiento_predefinido_detalleActual=null;	
	
	public $asiento_predefinido_detalle=null;
	public $asiento_predefinido_detalles=null;
	public $asiento_predefinido_detallesEliminados=array();
	public $asiento_predefinido_detallesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $asiento_predefinido_detallesLocal=array();
	public ?array $asiento_predefinido_detallesReporte=null;
	public ?array $asiento_predefinido_detallesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadasiento_predefinido_detalle='onload';
	public string $strTipoPaginaAuxiliarasiento_predefinido_detalle='none';
	public string $strTipoUsuarioAuxiliarasiento_predefinido_detalle='none';
		
	public $asiento_predefinido_detalleReturnGeneral=null;
	public $asiento_predefinido_detalleParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $asiento_predefinido_detalleModel=null;
	public $asiento_predefinido_detalleControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_asiento_predefinido='';
	public string $strMensajeid_cuenta='';
	public string $strMensajeid_centro_costo='';
	public string $strMensajeorden='';
	public string $strMensajecuenta_contable='';
	
	
	public string $strVisibleFK_Idasiento_predefinido='display:table-row';
	public string $strVisibleFK_Idcentro_costo='display:table-row';
	public string $strVisibleFK_Idcuenta='display:table-row';

	
	public array $asiento_predefinidosFK=array();

	public function getasiento_predefinidosFK():array {
		return $this->asiento_predefinidosFK;
	}

	public function setasiento_predefinidosFK(array $asiento_predefinidosFK) {
		$this->asiento_predefinidosFK = $asiento_predefinidosFK;
	}

	public int $idasiento_predefinidoDefaultFK=-1;

	public function getIdasiento_predefinidoDefaultFK():int {
		return $this->idasiento_predefinidoDefaultFK;
	}

	public function setIdasiento_predefinidoDefaultFK(int $idasiento_predefinidoDefaultFK) {
		$this->idasiento_predefinidoDefaultFK = $idasiento_predefinidoDefaultFK;
	}

	public array $cuentasFK=array();

	public function getcuentasFK():array {
		return $this->cuentasFK;
	}

	public function setcuentasFK(array $cuentasFK) {
		$this->cuentasFK = $cuentasFK;
	}

	public int $idcuentaDefaultFK=-1;

	public function getIdcuentaDefaultFK():int {
		return $this->idcuentaDefaultFK;
	}

	public function setIdcuentaDefaultFK(int $idcuentaDefaultFK) {
		$this->idcuentaDefaultFK = $idcuentaDefaultFK;
	}

	public array $centro_costosFK=array();

	public function getcentro_costosFK():array {
		return $this->centro_costosFK;
	}

	public function setcentro_costosFK(array $centro_costosFK) {
		$this->centro_costosFK = $centro_costosFK;
	}

	public int $idcentro_costoDefaultFK=-1;

	public function getIdcentro_costoDefaultFK():int {
		return $this->idcentro_costoDefaultFK;
	}

	public function setIdcentro_costoDefaultFK(int $idcentro_costoDefaultFK) {
		$this->idcentro_costoDefaultFK = $idcentro_costoDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_asiento_predefinidoFK_Idasiento_predefinido=null;

	public  $id_centro_costoFK_Idcentro_costo=null;

	public  $id_cuentaFK_Idcuenta=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->asiento_predefinido_detalleLogic==null) {
				$this->asiento_predefinido_detalleLogic=new asiento_predefinido_detalle_logic();
			}
			
		} else {
			if($this->asiento_predefinido_detalleLogic==null) {
				$this->asiento_predefinido_detalleLogic=new asiento_predefinido_detalle_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->asiento_predefinido_detalleClase==null) {
				$this->asiento_predefinido_detalleClase=new asiento_predefinido_detalle();
			}
			
			$this->asiento_predefinido_detalleClase->setId(0);	
				
				
			$this->asiento_predefinido_detalleClase->setid_asiento_predefinido(-1);	
			$this->asiento_predefinido_detalleClase->setid_cuenta(-1);	
			$this->asiento_predefinido_detalleClase->setid_centro_costo(-1);	
			$this->asiento_predefinido_detalleClase->setorden(0);	
			$this->asiento_predefinido_detalleClase->setcuenta_contable('');	
			
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
		$this->prepararEjecutarMantenimientoBase('asiento_predefinido_detalle');
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
		$this->cargarParametrosReporteBase('asiento_predefinido_detalle');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('asiento_predefinido_detalle');
	}
	
	public function actualizarControllerConReturnGeneral(asiento_predefinido_detalle_param_return $asiento_predefinido_detalleReturnGeneral) {
		if($asiento_predefinido_detalleReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesasiento_predefinido_detallesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$asiento_predefinido_detalleReturnGeneral->getsMensajeProceso();
		}
		
		if($asiento_predefinido_detalleReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$asiento_predefinido_detalleReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($asiento_predefinido_detalleReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$asiento_predefinido_detalleReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$asiento_predefinido_detalleReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($asiento_predefinido_detalleReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($asiento_predefinido_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$asiento_predefinido_detalleReturnGeneral->getsFuncionJs();
		}
		
		if($asiento_predefinido_detalleReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(asiento_predefinido_detalle_session $asiento_predefinido_detalle_session){
		$this->strStyleDivArbol=$asiento_predefinido_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$asiento_predefinido_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$asiento_predefinido_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$asiento_predefinido_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$asiento_predefinido_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$asiento_predefinido_detalle_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$asiento_predefinido_detalle_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(asiento_predefinido_detalle_session $asiento_predefinido_detalle_session){
		$asiento_predefinido_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$asiento_predefinido_detalle_session->strStyleDivHeader='display:none';			
		$asiento_predefinido_detalle_session->strStyleDivContent='width:93%;height:100%';	
		$asiento_predefinido_detalle_session->strStyleDivOpcionesBanner='display:none';	
		$asiento_predefinido_detalle_session->strStyleDivExpandirColapsar='display:none';	
		$asiento_predefinido_detalle_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(asiento_predefinido_detalle_control $asiento_predefinido_detalle_control_session){
		$this->idNuevo=$asiento_predefinido_detalle_control_session->idNuevo;
		$this->asiento_predefinido_detalleActual=$asiento_predefinido_detalle_control_session->asiento_predefinido_detalleActual;
		$this->asiento_predefinido_detalle=$asiento_predefinido_detalle_control_session->asiento_predefinido_detalle;
		$this->asiento_predefinido_detalleClase=$asiento_predefinido_detalle_control_session->asiento_predefinido_detalleClase;
		$this->asiento_predefinido_detalles=$asiento_predefinido_detalle_control_session->asiento_predefinido_detalles;
		$this->asiento_predefinido_detallesEliminados=$asiento_predefinido_detalle_control_session->asiento_predefinido_detallesEliminados;
		$this->asiento_predefinido_detalle=$asiento_predefinido_detalle_control_session->asiento_predefinido_detalle;
		$this->asiento_predefinido_detallesReporte=$asiento_predefinido_detalle_control_session->asiento_predefinido_detallesReporte;
		$this->asiento_predefinido_detallesSeleccionados=$asiento_predefinido_detalle_control_session->asiento_predefinido_detallesSeleccionados;
		$this->arrOrderBy=$asiento_predefinido_detalle_control_session->arrOrderBy;
		$this->arrOrderByRel=$asiento_predefinido_detalle_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$asiento_predefinido_detalle_control_session->arrHistoryWebs;
		$this->arrSessionBases=$asiento_predefinido_detalle_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadasiento_predefinido_detalle=$asiento_predefinido_detalle_control_session->strTypeOnLoadasiento_predefinido_detalle;
		$this->strTipoPaginaAuxiliarasiento_predefinido_detalle=$asiento_predefinido_detalle_control_session->strTipoPaginaAuxiliarasiento_predefinido_detalle;
		$this->strTipoUsuarioAuxiliarasiento_predefinido_detalle=$asiento_predefinido_detalle_control_session->strTipoUsuarioAuxiliarasiento_predefinido_detalle;	
		
		$this->bitEsPopup=$asiento_predefinido_detalle_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$asiento_predefinido_detalle_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$asiento_predefinido_detalle_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$asiento_predefinido_detalle_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$asiento_predefinido_detalle_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$asiento_predefinido_detalle_control_session->strSufijo;
		$this->bitEsRelaciones=$asiento_predefinido_detalle_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$asiento_predefinido_detalle_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$asiento_predefinido_detalle_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$asiento_predefinido_detalle_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$asiento_predefinido_detalle_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$asiento_predefinido_detalle_control_session->strTituloTabla;
		$this->strTituloPathPagina=$asiento_predefinido_detalle_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$asiento_predefinido_detalle_control_session->strTituloPathElementoActual;
		
		if($this->asiento_predefinido_detalleLogic==null) {			
			$this->asiento_predefinido_detalleLogic=new asiento_predefinido_detalle_logic();
		}
		
		
		if($this->asiento_predefinido_detalleClase==null) {
			$this->asiento_predefinido_detalleClase=new asiento_predefinido_detalle();	
		}
		
		$this->asiento_predefinido_detalleLogic->setasiento_predefinido_detalle($this->asiento_predefinido_detalleClase);
		
		
		if($this->asiento_predefinido_detalles==null) {
			$this->asiento_predefinido_detalles=array();	
		}
		
		$this->asiento_predefinido_detalleLogic->setasiento_predefinido_detalles($this->asiento_predefinido_detalles);
		
		
		$this->strTipoView=$asiento_predefinido_detalle_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$asiento_predefinido_detalle_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$asiento_predefinido_detalle_control_session->datosCliente;
		$this->strAccionBusqueda=$asiento_predefinido_detalle_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$asiento_predefinido_detalle_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$asiento_predefinido_detalle_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$asiento_predefinido_detalle_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$asiento_predefinido_detalle_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$asiento_predefinido_detalle_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$asiento_predefinido_detalle_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$asiento_predefinido_detalle_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$asiento_predefinido_detalle_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$asiento_predefinido_detalle_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$asiento_predefinido_detalle_control_session->strTipoPaginacion;
		$this->strTipoAccion=$asiento_predefinido_detalle_control_session->strTipoAccion;
		$this->tiposReportes=$asiento_predefinido_detalle_control_session->tiposReportes;
		$this->tiposReporte=$asiento_predefinido_detalle_control_session->tiposReporte;
		$this->tiposAcciones=$asiento_predefinido_detalle_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$asiento_predefinido_detalle_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$asiento_predefinido_detalle_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$asiento_predefinido_detalle_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$asiento_predefinido_detalle_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$asiento_predefinido_detalle_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$asiento_predefinido_detalle_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$asiento_predefinido_detalle_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$asiento_predefinido_detalle_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$asiento_predefinido_detalle_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$asiento_predefinido_detalle_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$asiento_predefinido_detalle_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$asiento_predefinido_detalle_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$asiento_predefinido_detalle_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$asiento_predefinido_detalle_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$asiento_predefinido_detalle_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$asiento_predefinido_detalle_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$asiento_predefinido_detalle_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$asiento_predefinido_detalle_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$asiento_predefinido_detalle_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$asiento_predefinido_detalle_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$asiento_predefinido_detalle_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$asiento_predefinido_detalle_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$asiento_predefinido_detalle_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$asiento_predefinido_detalle_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$asiento_predefinido_detalle_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$asiento_predefinido_detalle_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$asiento_predefinido_detalle_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$asiento_predefinido_detalle_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$asiento_predefinido_detalle_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$asiento_predefinido_detalle_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$asiento_predefinido_detalle_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$asiento_predefinido_detalle_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$asiento_predefinido_detalle_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$asiento_predefinido_detalle_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$asiento_predefinido_detalle_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$asiento_predefinido_detalle_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$asiento_predefinido_detalle_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$asiento_predefinido_detalle_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$asiento_predefinido_detalle_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$asiento_predefinido_detalle_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$asiento_predefinido_detalle_control_session->resumenUsuarioActual;	
		$this->moduloActual=$asiento_predefinido_detalle_control_session->moduloActual;	
		$this->opcionActual=$asiento_predefinido_detalle_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$asiento_predefinido_detalle_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$asiento_predefinido_detalle_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$asiento_predefinido_detalle_session=unserialize($this->Session->read(asiento_predefinido_detalle_util::$STR_SESSION_NAME));
				
		if($asiento_predefinido_detalle_session==null) {
			$asiento_predefinido_detalle_session=new asiento_predefinido_detalle_session();
		}
		
		$this->strStyleDivArbol=$asiento_predefinido_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$asiento_predefinido_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$asiento_predefinido_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$asiento_predefinido_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$asiento_predefinido_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$asiento_predefinido_detalle_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$asiento_predefinido_detalle_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$asiento_predefinido_detalle_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$asiento_predefinido_detalle_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$asiento_predefinido_detalle_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$asiento_predefinido_detalle_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_asiento_predefinido=$asiento_predefinido_detalle_control_session->strMensajeid_asiento_predefinido;
		$this->strMensajeid_cuenta=$asiento_predefinido_detalle_control_session->strMensajeid_cuenta;
		$this->strMensajeid_centro_costo=$asiento_predefinido_detalle_control_session->strMensajeid_centro_costo;
		$this->strMensajeorden=$asiento_predefinido_detalle_control_session->strMensajeorden;
		$this->strMensajecuenta_contable=$asiento_predefinido_detalle_control_session->strMensajecuenta_contable;
			
		
		$this->asiento_predefinidosFK=$asiento_predefinido_detalle_control_session->asiento_predefinidosFK;
		$this->idasiento_predefinidoDefaultFK=$asiento_predefinido_detalle_control_session->idasiento_predefinidoDefaultFK;
		$this->cuentasFK=$asiento_predefinido_detalle_control_session->cuentasFK;
		$this->idcuentaDefaultFK=$asiento_predefinido_detalle_control_session->idcuentaDefaultFK;
		$this->centro_costosFK=$asiento_predefinido_detalle_control_session->centro_costosFK;
		$this->idcentro_costoDefaultFK=$asiento_predefinido_detalle_control_session->idcentro_costoDefaultFK;
		
		
		$this->strVisibleFK_Idasiento_predefinido=$asiento_predefinido_detalle_control_session->strVisibleFK_Idasiento_predefinido;
		$this->strVisibleFK_Idcentro_costo=$asiento_predefinido_detalle_control_session->strVisibleFK_Idcentro_costo;
		$this->strVisibleFK_Idcuenta=$asiento_predefinido_detalle_control_session->strVisibleFK_Idcuenta;
		
		
		
		
		$this->id_asiento_predefinidoFK_Idasiento_predefinido=$asiento_predefinido_detalle_control_session->id_asiento_predefinidoFK_Idasiento_predefinido;
		$this->id_centro_costoFK_Idcentro_costo=$asiento_predefinido_detalle_control_session->id_centro_costoFK_Idcentro_costo;
		$this->id_cuentaFK_Idcuenta=$asiento_predefinido_detalle_control_session->id_cuentaFK_Idcuenta;

		
		
		
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
	
	public function getasiento_predefinido_detalleControllerAdditional() {
		return $this->asiento_predefinido_detalleControllerAdditional;
	}

	public function setasiento_predefinido_detalleControllerAdditional($asiento_predefinido_detalleControllerAdditional) {
		$this->asiento_predefinido_detalleControllerAdditional = $asiento_predefinido_detalleControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getasiento_predefinido_detalleActual() : asiento_predefinido_detalle {
		return $this->asiento_predefinido_detalleActual;
	}

	public function setasiento_predefinido_detalleActual(asiento_predefinido_detalle $asiento_predefinido_detalleActual) {
		$this->asiento_predefinido_detalleActual = $asiento_predefinido_detalleActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidasiento_predefinido_detalle() : int {
		return $this->idasiento_predefinido_detalle;
	}

	public function setidasiento_predefinido_detalle(int $idasiento_predefinido_detalle) {
		$this->idasiento_predefinido_detalle = $idasiento_predefinido_detalle;
	}
	
	public function getasiento_predefinido_detalle() : asiento_predefinido_detalle {
		return $this->asiento_predefinido_detalle;
	}

	public function setasiento_predefinido_detalle(asiento_predefinido_detalle $asiento_predefinido_detalle) {
		$this->asiento_predefinido_detalle = $asiento_predefinido_detalle;
	}
		
	public function getasiento_predefinido_detalleLogic() : asiento_predefinido_detalle_logic {		
		return $this->asiento_predefinido_detalleLogic;
	}

	public function setasiento_predefinido_detalleLogic(asiento_predefinido_detalle_logic $asiento_predefinido_detalleLogic) {
		$this->asiento_predefinido_detalleLogic = $asiento_predefinido_detalleLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getasiento_predefinido_detallesModel() {		
		try {						
			/*asiento_predefinido_detallesModel.setWrappedData(asiento_predefinido_detalleLogic->getasiento_predefinido_detalles());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->asiento_predefinido_detallesModel;
	}
	
	public function setasiento_predefinido_detallesModel($asiento_predefinido_detallesModel) {
		$this->asiento_predefinido_detallesModel = $asiento_predefinido_detallesModel;
	}
	
	public function getasiento_predefinido_detalles() : array {		
		return $this->asiento_predefinido_detalles;
	}
	
	public function setasiento_predefinido_detalles(array $asiento_predefinido_detalles) {
		$this->asiento_predefinido_detalles= $asiento_predefinido_detalles;
	}
	
	public function getasiento_predefinido_detallesEliminados() : array {		
		return $this->asiento_predefinido_detallesEliminados;
	}
	
	public function setasiento_predefinido_detallesEliminados(array $asiento_predefinido_detallesEliminados) {
		$this->asiento_predefinido_detallesEliminados= $asiento_predefinido_detallesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getasiento_predefinido_detalleActualFromListDataModel() {
		try {
			/*$asiento_predefinido_detalleClase= $this->asiento_predefinido_detallesModel->getRowData();*/
			
			/*return $asiento_predefinido_detalle;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
