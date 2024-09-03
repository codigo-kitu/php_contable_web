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

namespace com\bydan\contabilidad\inventario\tipo_precio\presentation\control;

use Exception;

//include_once('com/bydan/framework/contabilidad/util/Constantes.php');
use com\bydan\framework\contabilidad\util\Constantes;

//include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/Funciones.php');
use com\bydan\framework\contabilidad\util\Funciones;

use com\bydan\framework\contabilidad\util\FuncionesWebArbol;

//include_once(Constantes::$PATH_REL.'com/bydan/framework/contabilidad/util/PaqueteTipo.php');
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

use com\bydan\contabilidad\inventario\tipo_precio\business\entity\tipo_precio;

//include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/tipo_precio/util/tipo_precio_carga.php');
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_carga;

use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_util;
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_param_return;
use com\bydan\contabilidad\inventario\tipo_precio\business\logic\tipo_precio_logic;
use com\bydan\contabilidad\inventario\tipo_precio\presentation\session\tipo_precio_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

use com\bydan\contabilidad\inventario\precio_producto\util\precio_producto_carga;
use com\bydan\contabilidad\inventario\precio_producto\util\precio_producto_util;
use com\bydan\contabilidad\inventario\precio_producto\presentation\session\precio_producto_session;


/*CARGA ARCHIVOS FRAMEWORK*/
tipo_precio_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
tipo_precio_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
tipo_precio_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
tipo_precio_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*tipo_precio_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class tipo_precio_init_control extends ControllerBase {	
	
	public $tipo_precioClase=null;	
	public $tipo_preciosModel=null;	
	public $tipo_preciosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idtipo_precio=0;	
	public ?int $idtipo_precioActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $tipo_precioLogic=null;
	
	public $tipo_precioActual=null;	
	
	public $tipo_precio=null;
	public $tipo_precios=null;
	public $tipo_preciosEliminados=array();
	public $tipo_preciosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $tipo_preciosLocal=array();
	public ?array $tipo_preciosReporte=null;
	public ?array $tipo_preciosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadtipo_precio='onload';
	public string $strTipoPaginaAuxiliartipo_precio='none';
	public string $strTipoUsuarioAuxiliartipo_precio='none';
		
	public $tipo_precioReturnGeneral=null;
	public $tipo_precioParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $tipo_precioModel=null;
	public $tipo_precioControllerAdditional=null;
	
	
	

	public $clienteLogic=null;

	public function  getclienteLogic() {
		return $this->clienteLogic;
	}

	public function setclienteLogic($clienteLogic) {
		$this->clienteLogic =$clienteLogic;
	}


	public $precioproductoLogic=null;

	public function  getprecio_productoLogic() {
		return $this->precioproductoLogic;
	}

	public function setprecio_productoLogic($precioproductoLogic) {
		$this->precioproductoLogic =$precioproductoLogic;
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

	
	
	
	
	
	
	public $strTienePermisoscliente='none';
	public $strTienePermisosprecio_producto='none';
	
	
	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->tipo_precioLogic==null) {
				$this->tipo_precioLogic=new tipo_precio_logic();
			}
			
		} else {
			if($this->tipo_precioLogic==null) {
				$this->tipo_precioLogic=new tipo_precio_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->tipo_precioClase==null) {
				$this->tipo_precioClase=new tipo_precio();
			}
			
			$this->tipo_precioClase->setId(0);	
				
				
			$this->tipo_precioClase->setid_empresa(-1);	
			$this->tipo_precioClase->setcodigo('');	
			$this->tipo_precioClase->setnombre('');	
			
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
		$this->prepararEjecutarMantenimientoBase('tipo_precio');
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
		$this->cargarParametrosReporteBase('tipo_precio');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('tipo_precio');
	}
	
	public function actualizarControllerConReturnGeneral(tipo_precio_param_return $tipo_precioReturnGeneral) {
		if($tipo_precioReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajestipo_preciosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$tipo_precioReturnGeneral->getsMensajeProceso();
		}
		
		if($tipo_precioReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$tipo_precioReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($tipo_precioReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$tipo_precioReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$tipo_precioReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($tipo_precioReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($tipo_precioReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$tipo_precioReturnGeneral->getsFuncionJs();
		}
		
		if($tipo_precioReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(tipo_precio_session $tipo_precio_session){
		$this->strStyleDivArbol=$tipo_precio_session->strStyleDivArbol;	
		$this->strStyleDivContent=$tipo_precio_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$tipo_precio_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$tipo_precio_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$tipo_precio_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$tipo_precio_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$tipo_precio_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(tipo_precio_session $tipo_precio_session){
		$tipo_precio_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$tipo_precio_session->strStyleDivHeader='display:none';			
		$tipo_precio_session->strStyleDivContent='width:93%;height:100%';	
		$tipo_precio_session->strStyleDivOpcionesBanner='display:none';	
		$tipo_precio_session->strStyleDivExpandirColapsar='display:none';	
		$tipo_precio_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(tipo_precio_control $tipo_precio_control_session){
		$this->idNuevo=$tipo_precio_control_session->idNuevo;
		$this->tipo_precioActual=$tipo_precio_control_session->tipo_precioActual;
		$this->tipo_precio=$tipo_precio_control_session->tipo_precio;
		$this->tipo_precioClase=$tipo_precio_control_session->tipo_precioClase;
		$this->tipo_precios=$tipo_precio_control_session->tipo_precios;
		$this->tipo_preciosEliminados=$tipo_precio_control_session->tipo_preciosEliminados;
		$this->tipo_precio=$tipo_precio_control_session->tipo_precio;
		$this->tipo_preciosReporte=$tipo_precio_control_session->tipo_preciosReporte;
		$this->tipo_preciosSeleccionados=$tipo_precio_control_session->tipo_preciosSeleccionados;
		$this->arrOrderBy=$tipo_precio_control_session->arrOrderBy;
		$this->arrOrderByRel=$tipo_precio_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$tipo_precio_control_session->arrHistoryWebs;
		$this->arrSessionBases=$tipo_precio_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadtipo_precio=$tipo_precio_control_session->strTypeOnLoadtipo_precio;
		$this->strTipoPaginaAuxiliartipo_precio=$tipo_precio_control_session->strTipoPaginaAuxiliartipo_precio;
		$this->strTipoUsuarioAuxiliartipo_precio=$tipo_precio_control_session->strTipoUsuarioAuxiliartipo_precio;	
		
		$this->bitEsPopup=$tipo_precio_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$tipo_precio_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$tipo_precio_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$tipo_precio_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$tipo_precio_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$tipo_precio_control_session->strSufijo;
		$this->bitEsRelaciones=$tipo_precio_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$tipo_precio_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$tipo_precio_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$tipo_precio_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$tipo_precio_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$tipo_precio_control_session->strTituloTabla;
		$this->strTituloPathPagina=$tipo_precio_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$tipo_precio_control_session->strTituloPathElementoActual;
		
		if($this->tipo_precioLogic==null) {			
			$this->tipo_precioLogic=new tipo_precio_logic();
		}
		
		
		if($this->tipo_precioClase==null) {
			$this->tipo_precioClase=new tipo_precio();	
		}
		
		$this->tipo_precioLogic->settipo_precio($this->tipo_precioClase);
		
		
		if($this->tipo_precios==null) {
			$this->tipo_precios=array();	
		}
		
		$this->tipo_precioLogic->settipo_precios($this->tipo_precios);
		
		
		$this->strTipoView=$tipo_precio_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$tipo_precio_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$tipo_precio_control_session->datosCliente;
		$this->strAccionBusqueda=$tipo_precio_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$tipo_precio_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$tipo_precio_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$tipo_precio_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$tipo_precio_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$tipo_precio_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$tipo_precio_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$tipo_precio_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$tipo_precio_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$tipo_precio_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$tipo_precio_control_session->strTipoPaginacion;
		$this->strTipoAccion=$tipo_precio_control_session->strTipoAccion;
		$this->tiposReportes=$tipo_precio_control_session->tiposReportes;
		$this->tiposReporte=$tipo_precio_control_session->tiposReporte;
		$this->tiposAcciones=$tipo_precio_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$tipo_precio_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$tipo_precio_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$tipo_precio_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$tipo_precio_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$tipo_precio_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$tipo_precio_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$tipo_precio_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$tipo_precio_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$tipo_precio_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$tipo_precio_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$tipo_precio_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$tipo_precio_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$tipo_precio_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$tipo_precio_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$tipo_precio_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$tipo_precio_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$tipo_precio_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$tipo_precio_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$tipo_precio_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$tipo_precio_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$tipo_precio_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$tipo_precio_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$tipo_precio_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$tipo_precio_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$tipo_precio_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$tipo_precio_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$tipo_precio_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$tipo_precio_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$tipo_precio_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$tipo_precio_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$tipo_precio_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$tipo_precio_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$tipo_precio_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$tipo_precio_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$tipo_precio_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$tipo_precio_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$tipo_precio_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$tipo_precio_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$tipo_precio_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$tipo_precio_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$tipo_precio_control_session->resumenUsuarioActual;	
		$this->moduloActual=$tipo_precio_control_session->moduloActual;	
		$this->opcionActual=$tipo_precio_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$tipo_precio_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$tipo_precio_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$tipo_precio_session=unserialize($this->Session->read(tipo_precio_util::$STR_SESSION_NAME));
				
		if($tipo_precio_session==null) {
			$tipo_precio_session=new tipo_precio_session();
		}
		
		$this->strStyleDivArbol=$tipo_precio_session->strStyleDivArbol;	
		$this->strStyleDivContent=$tipo_precio_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$tipo_precio_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$tipo_precio_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$tipo_precio_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$tipo_precio_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$tipo_precio_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$tipo_precio_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$tipo_precio_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$tipo_precio_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$tipo_precio_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$tipo_precio_control_session->strMensajeid_empresa;
		$this->strMensajecodigo=$tipo_precio_control_session->strMensajecodigo;
		$this->strMensajenombre=$tipo_precio_control_session->strMensajenombre;
			
		
		$this->empresasFK=$tipo_precio_control_session->empresasFK;
		$this->idempresaDefaultFK=$tipo_precio_control_session->idempresaDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$tipo_precio_control_session->strVisibleFK_Idempresa;
		
		
		$this->strTienePermisoscliente=$tipo_precio_control_session->strTienePermisoscliente;
		$this->strTienePermisosprecio_producto=$tipo_precio_control_session->strTienePermisosprecio_producto;
		
		
		$this->id_empresaFK_Idempresa=$tipo_precio_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function gettipo_precioControllerAdditional() {
		return $this->tipo_precioControllerAdditional;
	}

	public function settipo_precioControllerAdditional($tipo_precioControllerAdditional) {
		$this->tipo_precioControllerAdditional = $tipo_precioControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function gettipo_precioActual() : tipo_precio {
		return $this->tipo_precioActual;
	}

	public function settipo_precioActual(tipo_precio $tipo_precioActual) {
		$this->tipo_precioActual = $tipo_precioActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidtipo_precio() : int {
		return $this->idtipo_precio;
	}

	public function setidtipo_precio(int $idtipo_precio) {
		$this->idtipo_precio = $idtipo_precio;
	}
	
	public function gettipo_precio() : tipo_precio {
		return $this->tipo_precio;
	}

	public function settipo_precio(tipo_precio $tipo_precio) {
		$this->tipo_precio = $tipo_precio;
	}
		
	public function gettipo_precioLogic() : tipo_precio_logic {		
		return $this->tipo_precioLogic;
	}

	public function settipo_precioLogic(tipo_precio_logic $tipo_precioLogic) {
		$this->tipo_precioLogic = $tipo_precioLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function gettipo_preciosModel() {		
		try {						
			/*tipo_preciosModel.setWrappedData(tipo_precioLogic->gettipo_precios());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->tipo_preciosModel;
	}
	
	public function settipo_preciosModel($tipo_preciosModel) {
		$this->tipo_preciosModel = $tipo_preciosModel;
	}
	
	public function gettipo_precios() : array {		
		return $this->tipo_precios;
	}
	
	public function settipo_precios(array $tipo_precios) {
		$this->tipo_precios= $tipo_precios;
	}
	
	public function gettipo_preciosEliminados() : array {		
		return $this->tipo_preciosEliminados;
	}
	
	public function settipo_preciosEliminados(array $tipo_preciosEliminados) {
		$this->tipo_preciosEliminados= $tipo_preciosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function gettipo_precioActualFromListDataModel() {
		try {
			/*$tipo_precioClase= $this->tipo_preciosModel->getRowData();*/
			
			/*return $tipo_precio;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
