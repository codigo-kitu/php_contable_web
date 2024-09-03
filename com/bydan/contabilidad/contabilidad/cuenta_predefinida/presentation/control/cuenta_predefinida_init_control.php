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

namespace com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\control;

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

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\entity\cuenta_predefinida;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/cuenta_predefinida/util/cuenta_predefinida_carga.php');
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_carga;

use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_util;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\util\cuenta_predefinida_param_return;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\business\logic\cuenta_predefinida_logic;
use com\bydan\contabilidad\contabilidad\cuenta_predefinida\presentation\session\cuenta_predefinida_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\entity\tipo_cuenta_predefinida;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\business\logic\tipo_cuenta_predefinida_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_carga;
use com\bydan\contabilidad\contabilidad\tipo_cuenta_predefinida\util\tipo_cuenta_predefinida_util;

use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\entity\tipo_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\business\logic\tipo_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_carga;
use com\bydan\contabilidad\contabilidad\tipo_cuenta\util\tipo_cuenta_util;

use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\entity\tipo_nivel_cuenta;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\business\logic\tipo_nivel_cuenta_logic;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_carga;
use com\bydan\contabilidad\contabilidad\tipo_nivel_cuenta\util\tipo_nivel_cuenta_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
cuenta_predefinida_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cuenta_predefinida_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cuenta_predefinida_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cuenta_predefinida_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cuenta_predefinida_init_control extends ControllerBase {	
	
	public $cuenta_predefinidaClase=null;	
	public $cuenta_predefinidasModel=null;	
	public $cuenta_predefinidasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcuenta_predefinida=0;	
	public ?int $idcuenta_predefinidaActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $cuenta_predefinidaLogic=null;
	
	public $cuenta_predefinidaActual=null;	
	
	public $cuenta_predefinida=null;
	public $cuenta_predefinidas=null;
	public $cuenta_predefinidasEliminados=array();
	public $cuenta_predefinidasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $cuenta_predefinidasLocal=array();
	public ?array $cuenta_predefinidasReporte=null;
	public ?array $cuenta_predefinidasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcuenta_predefinida='onload';
	public string $strTipoPaginaAuxiliarcuenta_predefinida='none';
	public string $strTipoUsuarioAuxiliarcuenta_predefinida='none';
		
	public $cuenta_predefinidaReturnGeneral=null;
	public $cuenta_predefinidaParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $cuenta_predefinidaModel=null;
	public $cuenta_predefinidaControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_tipo_cuenta_predefinida='';
	public string $strMensajeid_tipo_cuenta='';
	public string $strMensajeid_tipo_nivel_cuenta='';
	public string $strMensajecodigo_tabla='';
	public string $strMensajecodigo_cuenta='';
	public string $strMensajenombre_cuenta='';
	public string $strMensajemonto_minimo='';
	public string $strMensajevalor_retencion='';
	public string $strMensajebalance='';
	public string $strMensajeporcentaje_base='';
	public string $strMensajeseleccionar='';
	public string $strMensajecentro_costos='';
	public string $strMensajeretencion='';
	public string $strMensajeusa_base='';
	public string $strMensajenit='';
	public string $strMensajemodifica='';
	public string $strMensajeultima_transaccion='';
	public string $strMensajecomenta1='';
	public string $strMensajecomenta2='';
	
	
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idtipo_cuenta='display:table-row';
	public string $strVisibleFK_Idtipo_cuenta_predefinida='display:table-row';
	public string $strVisibleFK_Idtipo_nivel_cuenta='display:table-row';

	
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

	public array $tipo_cuenta_predefinidasFK=array();

	public function gettipo_cuenta_predefinidasFK():array {
		return $this->tipo_cuenta_predefinidasFK;
	}

	public function settipo_cuenta_predefinidasFK(array $tipo_cuenta_predefinidasFK) {
		$this->tipo_cuenta_predefinidasFK = $tipo_cuenta_predefinidasFK;
	}

	public int $idtipo_cuenta_predefinidaDefaultFK=-1;

	public function getIdtipo_cuenta_predefinidaDefaultFK():int {
		return $this->idtipo_cuenta_predefinidaDefaultFK;
	}

	public function setIdtipo_cuenta_predefinidaDefaultFK(int $idtipo_cuenta_predefinidaDefaultFK) {
		$this->idtipo_cuenta_predefinidaDefaultFK = $idtipo_cuenta_predefinidaDefaultFK;
	}

	public array $tipo_cuentasFK=array();

	public function gettipo_cuentasFK():array {
		return $this->tipo_cuentasFK;
	}

	public function settipo_cuentasFK(array $tipo_cuentasFK) {
		$this->tipo_cuentasFK = $tipo_cuentasFK;
	}

	public int $idtipo_cuentaDefaultFK=-1;

	public function getIdtipo_cuentaDefaultFK():int {
		return $this->idtipo_cuentaDefaultFK;
	}

	public function setIdtipo_cuentaDefaultFK(int $idtipo_cuentaDefaultFK) {
		$this->idtipo_cuentaDefaultFK = $idtipo_cuentaDefaultFK;
	}

	public array $tipo_nivel_cuentasFK=array();

	public function gettipo_nivel_cuentasFK():array {
		return $this->tipo_nivel_cuentasFK;
	}

	public function settipo_nivel_cuentasFK(array $tipo_nivel_cuentasFK) {
		$this->tipo_nivel_cuentasFK = $tipo_nivel_cuentasFK;
	}

	public int $idtipo_nivel_cuentaDefaultFK=-1;

	public function getIdtipo_nivel_cuentaDefaultFK():int {
		return $this->idtipo_nivel_cuentaDefaultFK;
	}

	public function setIdtipo_nivel_cuentaDefaultFK(int $idtipo_nivel_cuentaDefaultFK) {
		$this->idtipo_nivel_cuentaDefaultFK = $idtipo_nivel_cuentaDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_empresaFK_Idempresa=null;

	public  $id_tipo_cuentaFK_Idtipo_cuenta=null;

	public  $id_tipo_cuenta_predefinidaFK_Idtipo_cuenta_predefinida=null;

	public  $id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->cuenta_predefinidaLogic==null) {
				$this->cuenta_predefinidaLogic=new cuenta_predefinida_logic();
			}
			
		} else {
			if($this->cuenta_predefinidaLogic==null) {
				$this->cuenta_predefinidaLogic=new cuenta_predefinida_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->cuenta_predefinidaClase==null) {
				$this->cuenta_predefinidaClase=new cuenta_predefinida();
			}
			
			$this->cuenta_predefinidaClase->setId(0);	
				
				
			$this->cuenta_predefinidaClase->setid_empresa(-1);	
			$this->cuenta_predefinidaClase->setid_tipo_cuenta_predefinida(-1);	
			$this->cuenta_predefinidaClase->setid_tipo_cuenta(-1);	
			$this->cuenta_predefinidaClase->setid_tipo_nivel_cuenta(-1);	
			$this->cuenta_predefinidaClase->setcodigo_tabla('');	
			$this->cuenta_predefinidaClase->setcodigo_cuenta('');	
			$this->cuenta_predefinidaClase->setnombre_cuenta('');	
			$this->cuenta_predefinidaClase->setmonto_minimo(0.0);	
			$this->cuenta_predefinidaClase->setvalor_retencion(0.0);	
			$this->cuenta_predefinidaClase->setbalance(0.0);	
			$this->cuenta_predefinidaClase->setporcentaje_base(0.0);	
			$this->cuenta_predefinidaClase->setseleccionar(0);	
			$this->cuenta_predefinidaClase->setcentro_costos(false);	
			$this->cuenta_predefinidaClase->setretencion(false);	
			$this->cuenta_predefinidaClase->setusa_base(false);	
			$this->cuenta_predefinidaClase->setnit(false);	
			$this->cuenta_predefinidaClase->setmodifica(false);	
			$this->cuenta_predefinidaClase->setultima_transaccion(date('Y-m-d'));	
			$this->cuenta_predefinidaClase->setcomenta1('');	
			$this->cuenta_predefinidaClase->setcomenta2('');	
			
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
		$this->prepararEjecutarMantenimientoBase('cuenta_predefinida');
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
		$this->cargarParametrosReporteBase('cuenta_predefinida');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('cuenta_predefinida');
	}
	
	public function actualizarControllerConReturnGeneral(cuenta_predefinida_param_return $cuenta_predefinidaReturnGeneral) {
		if($cuenta_predefinidaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescuenta_predefinidasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$cuenta_predefinidaReturnGeneral->getsMensajeProceso();
		}
		
		if($cuenta_predefinidaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$cuenta_predefinidaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($cuenta_predefinidaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$cuenta_predefinidaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$cuenta_predefinidaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($cuenta_predefinidaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($cuenta_predefinidaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$cuenta_predefinidaReturnGeneral->getsFuncionJs();
		}
		
		if($cuenta_predefinidaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(cuenta_predefinida_session $cuenta_predefinida_session){
		$this->strStyleDivArbol=$cuenta_predefinida_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cuenta_predefinida_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cuenta_predefinida_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cuenta_predefinida_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cuenta_predefinida_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cuenta_predefinida_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$cuenta_predefinida_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(cuenta_predefinida_session $cuenta_predefinida_session){
		$cuenta_predefinida_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$cuenta_predefinida_session->strStyleDivHeader='display:none';			
		$cuenta_predefinida_session->strStyleDivContent='width:93%;height:100%';	
		$cuenta_predefinida_session->strStyleDivOpcionesBanner='display:none';	
		$cuenta_predefinida_session->strStyleDivExpandirColapsar='display:none';	
		$cuenta_predefinida_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(cuenta_predefinida_control $cuenta_predefinida_control_session){
		$this->idNuevo=$cuenta_predefinida_control_session->idNuevo;
		$this->cuenta_predefinidaActual=$cuenta_predefinida_control_session->cuenta_predefinidaActual;
		$this->cuenta_predefinida=$cuenta_predefinida_control_session->cuenta_predefinida;
		$this->cuenta_predefinidaClase=$cuenta_predefinida_control_session->cuenta_predefinidaClase;
		$this->cuenta_predefinidas=$cuenta_predefinida_control_session->cuenta_predefinidas;
		$this->cuenta_predefinidasEliminados=$cuenta_predefinida_control_session->cuenta_predefinidasEliminados;
		$this->cuenta_predefinida=$cuenta_predefinida_control_session->cuenta_predefinida;
		$this->cuenta_predefinidasReporte=$cuenta_predefinida_control_session->cuenta_predefinidasReporte;
		$this->cuenta_predefinidasSeleccionados=$cuenta_predefinida_control_session->cuenta_predefinidasSeleccionados;
		$this->arrOrderBy=$cuenta_predefinida_control_session->arrOrderBy;
		$this->arrOrderByRel=$cuenta_predefinida_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$cuenta_predefinida_control_session->arrHistoryWebs;
		$this->arrSessionBases=$cuenta_predefinida_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcuenta_predefinida=$cuenta_predefinida_control_session->strTypeOnLoadcuenta_predefinida;
		$this->strTipoPaginaAuxiliarcuenta_predefinida=$cuenta_predefinida_control_session->strTipoPaginaAuxiliarcuenta_predefinida;
		$this->strTipoUsuarioAuxiliarcuenta_predefinida=$cuenta_predefinida_control_session->strTipoUsuarioAuxiliarcuenta_predefinida;	
		
		$this->bitEsPopup=$cuenta_predefinida_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$cuenta_predefinida_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$cuenta_predefinida_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$cuenta_predefinida_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$cuenta_predefinida_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$cuenta_predefinida_control_session->strSufijo;
		$this->bitEsRelaciones=$cuenta_predefinida_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$cuenta_predefinida_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$cuenta_predefinida_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$cuenta_predefinida_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$cuenta_predefinida_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$cuenta_predefinida_control_session->strTituloTabla;
		$this->strTituloPathPagina=$cuenta_predefinida_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$cuenta_predefinida_control_session->strTituloPathElementoActual;
		
		if($this->cuenta_predefinidaLogic==null) {			
			$this->cuenta_predefinidaLogic=new cuenta_predefinida_logic();
		}
		
		
		if($this->cuenta_predefinidaClase==null) {
			$this->cuenta_predefinidaClase=new cuenta_predefinida();	
		}
		
		$this->cuenta_predefinidaLogic->setcuenta_predefinida($this->cuenta_predefinidaClase);
		
		
		if($this->cuenta_predefinidas==null) {
			$this->cuenta_predefinidas=array();	
		}
		
		$this->cuenta_predefinidaLogic->setcuenta_predefinidas($this->cuenta_predefinidas);
		
		
		$this->strTipoView=$cuenta_predefinida_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$cuenta_predefinida_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$cuenta_predefinida_control_session->datosCliente;
		$this->strAccionBusqueda=$cuenta_predefinida_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$cuenta_predefinida_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$cuenta_predefinida_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$cuenta_predefinida_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$cuenta_predefinida_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$cuenta_predefinida_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$cuenta_predefinida_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$cuenta_predefinida_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$cuenta_predefinida_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$cuenta_predefinida_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$cuenta_predefinida_control_session->strTipoPaginacion;
		$this->strTipoAccion=$cuenta_predefinida_control_session->strTipoAccion;
		$this->tiposReportes=$cuenta_predefinida_control_session->tiposReportes;
		$this->tiposReporte=$cuenta_predefinida_control_session->tiposReporte;
		$this->tiposAcciones=$cuenta_predefinida_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$cuenta_predefinida_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$cuenta_predefinida_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$cuenta_predefinida_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$cuenta_predefinida_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$cuenta_predefinida_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$cuenta_predefinida_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$cuenta_predefinida_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$cuenta_predefinida_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$cuenta_predefinida_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$cuenta_predefinida_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$cuenta_predefinida_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$cuenta_predefinida_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$cuenta_predefinida_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$cuenta_predefinida_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$cuenta_predefinida_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$cuenta_predefinida_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$cuenta_predefinida_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$cuenta_predefinida_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$cuenta_predefinida_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$cuenta_predefinida_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$cuenta_predefinida_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$cuenta_predefinida_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$cuenta_predefinida_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$cuenta_predefinida_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$cuenta_predefinida_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$cuenta_predefinida_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$cuenta_predefinida_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$cuenta_predefinida_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$cuenta_predefinida_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$cuenta_predefinida_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$cuenta_predefinida_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$cuenta_predefinida_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$cuenta_predefinida_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$cuenta_predefinida_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$cuenta_predefinida_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$cuenta_predefinida_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$cuenta_predefinida_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$cuenta_predefinida_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$cuenta_predefinida_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$cuenta_predefinida_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$cuenta_predefinida_control_session->resumenUsuarioActual;	
		$this->moduloActual=$cuenta_predefinida_control_session->moduloActual;	
		$this->opcionActual=$cuenta_predefinida_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$cuenta_predefinida_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$cuenta_predefinida_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$cuenta_predefinida_session=unserialize($this->Session->read(cuenta_predefinida_util::$STR_SESSION_NAME));
				
		if($cuenta_predefinida_session==null) {
			$cuenta_predefinida_session=new cuenta_predefinida_session();
		}
		
		$this->strStyleDivArbol=$cuenta_predefinida_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cuenta_predefinida_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cuenta_predefinida_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cuenta_predefinida_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cuenta_predefinida_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cuenta_predefinida_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$cuenta_predefinida_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$cuenta_predefinida_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$cuenta_predefinida_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$cuenta_predefinida_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$cuenta_predefinida_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$cuenta_predefinida_control_session->strMensajeid_empresa;
		$this->strMensajeid_tipo_cuenta_predefinida=$cuenta_predefinida_control_session->strMensajeid_tipo_cuenta_predefinida;
		$this->strMensajeid_tipo_cuenta=$cuenta_predefinida_control_session->strMensajeid_tipo_cuenta;
		$this->strMensajeid_tipo_nivel_cuenta=$cuenta_predefinida_control_session->strMensajeid_tipo_nivel_cuenta;
		$this->strMensajecodigo_tabla=$cuenta_predefinida_control_session->strMensajecodigo_tabla;
		$this->strMensajecodigo_cuenta=$cuenta_predefinida_control_session->strMensajecodigo_cuenta;
		$this->strMensajenombre_cuenta=$cuenta_predefinida_control_session->strMensajenombre_cuenta;
		$this->strMensajemonto_minimo=$cuenta_predefinida_control_session->strMensajemonto_minimo;
		$this->strMensajevalor_retencion=$cuenta_predefinida_control_session->strMensajevalor_retencion;
		$this->strMensajebalance=$cuenta_predefinida_control_session->strMensajebalance;
		$this->strMensajeporcentaje_base=$cuenta_predefinida_control_session->strMensajeporcentaje_base;
		$this->strMensajeseleccionar=$cuenta_predefinida_control_session->strMensajeseleccionar;
		$this->strMensajecentro_costos=$cuenta_predefinida_control_session->strMensajecentro_costos;
		$this->strMensajeretencion=$cuenta_predefinida_control_session->strMensajeretencion;
		$this->strMensajeusa_base=$cuenta_predefinida_control_session->strMensajeusa_base;
		$this->strMensajenit=$cuenta_predefinida_control_session->strMensajenit;
		$this->strMensajemodifica=$cuenta_predefinida_control_session->strMensajemodifica;
		$this->strMensajeultima_transaccion=$cuenta_predefinida_control_session->strMensajeultima_transaccion;
		$this->strMensajecomenta1=$cuenta_predefinida_control_session->strMensajecomenta1;
		$this->strMensajecomenta2=$cuenta_predefinida_control_session->strMensajecomenta2;
			
		
		$this->empresasFK=$cuenta_predefinida_control_session->empresasFK;
		$this->idempresaDefaultFK=$cuenta_predefinida_control_session->idempresaDefaultFK;
		$this->tipo_cuenta_predefinidasFK=$cuenta_predefinida_control_session->tipo_cuenta_predefinidasFK;
		$this->idtipo_cuenta_predefinidaDefaultFK=$cuenta_predefinida_control_session->idtipo_cuenta_predefinidaDefaultFK;
		$this->tipo_cuentasFK=$cuenta_predefinida_control_session->tipo_cuentasFK;
		$this->idtipo_cuentaDefaultFK=$cuenta_predefinida_control_session->idtipo_cuentaDefaultFK;
		$this->tipo_nivel_cuentasFK=$cuenta_predefinida_control_session->tipo_nivel_cuentasFK;
		$this->idtipo_nivel_cuentaDefaultFK=$cuenta_predefinida_control_session->idtipo_nivel_cuentaDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$cuenta_predefinida_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idtipo_cuenta=$cuenta_predefinida_control_session->strVisibleFK_Idtipo_cuenta;
		$this->strVisibleFK_Idtipo_cuenta_predefinida=$cuenta_predefinida_control_session->strVisibleFK_Idtipo_cuenta_predefinida;
		$this->strVisibleFK_Idtipo_nivel_cuenta=$cuenta_predefinida_control_session->strVisibleFK_Idtipo_nivel_cuenta;
		
		
		
		
		$this->id_empresaFK_Idempresa=$cuenta_predefinida_control_session->id_empresaFK_Idempresa;
		$this->id_tipo_cuentaFK_Idtipo_cuenta=$cuenta_predefinida_control_session->id_tipo_cuentaFK_Idtipo_cuenta;
		$this->id_tipo_cuenta_predefinidaFK_Idtipo_cuenta_predefinida=$cuenta_predefinida_control_session->id_tipo_cuenta_predefinidaFK_Idtipo_cuenta_predefinida;
		$this->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta=$cuenta_predefinida_control_session->id_tipo_nivel_cuentaFK_Idtipo_nivel_cuenta;

		
		
		
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
	
	public function getcuenta_predefinidaControllerAdditional() {
		return $this->cuenta_predefinidaControllerAdditional;
	}

	public function setcuenta_predefinidaControllerAdditional($cuenta_predefinidaControllerAdditional) {
		$this->cuenta_predefinidaControllerAdditional = $cuenta_predefinidaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcuenta_predefinidaActual() : cuenta_predefinida {
		return $this->cuenta_predefinidaActual;
	}

	public function setcuenta_predefinidaActual(cuenta_predefinida $cuenta_predefinidaActual) {
		$this->cuenta_predefinidaActual = $cuenta_predefinidaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcuenta_predefinida() : int {
		return $this->idcuenta_predefinida;
	}

	public function setidcuenta_predefinida(int $idcuenta_predefinida) {
		$this->idcuenta_predefinida = $idcuenta_predefinida;
	}
	
	public function getcuenta_predefinida() : cuenta_predefinida {
		return $this->cuenta_predefinida;
	}

	public function setcuenta_predefinida(cuenta_predefinida $cuenta_predefinida) {
		$this->cuenta_predefinida = $cuenta_predefinida;
	}
		
	public function getcuenta_predefinidaLogic() : cuenta_predefinida_logic {		
		return $this->cuenta_predefinidaLogic;
	}

	public function setcuenta_predefinidaLogic(cuenta_predefinida_logic $cuenta_predefinidaLogic) {
		$this->cuenta_predefinidaLogic = $cuenta_predefinidaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcuenta_predefinidasModel() {		
		try {						
			/*cuenta_predefinidasModel.setWrappedData(cuenta_predefinidaLogic->getcuenta_predefinidas());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->cuenta_predefinidasModel;
	}
	
	public function setcuenta_predefinidasModel($cuenta_predefinidasModel) {
		$this->cuenta_predefinidasModel = $cuenta_predefinidasModel;
	}
	
	public function getcuenta_predefinidas() : array {		
		return $this->cuenta_predefinidas;
	}
	
	public function setcuenta_predefinidas(array $cuenta_predefinidas) {
		$this->cuenta_predefinidas= $cuenta_predefinidas;
	}
	
	public function getcuenta_predefinidasEliminados() : array {		
		return $this->cuenta_predefinidasEliminados;
	}
	
	public function setcuenta_predefinidasEliminados(array $cuenta_predefinidasEliminados) {
		$this->cuenta_predefinidasEliminados= $cuenta_predefinidasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcuenta_predefinidaActualFromListDataModel() {
		try {
			/*$cuenta_predefinidaClase= $this->cuenta_predefinidasModel->getRowData();*/
			
			/*return $cuenta_predefinida;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
