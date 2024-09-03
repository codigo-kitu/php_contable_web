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

namespace com\bydan\contabilidad\inventario\tipo_kardex\presentation\control;

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

use com\bydan\contabilidad\inventario\tipo_kardex\business\entity\tipo_kardex;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/tipo_kardex/util/tipo_kardex_carga.php');
use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_carga;

use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_util;
use com\bydan\contabilidad\inventario\tipo_kardex\util\tipo_kardex_param_return;
use com\bydan\contabilidad\inventario\tipo_kardex\business\logic\tipo_kardex_logic;
use com\bydan\contabilidad\inventario\tipo_kardex\business\logic\tipo_kardex_logic_add;
use com\bydan\contabilidad\inventario\tipo_kardex\presentation\session\tipo_kardex_session;


//FK


//REL


use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_carga;
use com\bydan\contabilidad\inventario\parametro_inventario\util\parametro_inventario_util;
use com\bydan\contabilidad\inventario\parametro_inventario\presentation\session\parametro_inventario_session;

use com\bydan\contabilidad\inventario\kardex\util\kardex_carga;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;
use com\bydan\contabilidad\inventario\kardex\presentation\session\kardex_session;


/*CARGA ARCHIVOS FRAMEWORK*/
tipo_kardex_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
tipo_kardex_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
tipo_kardex_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
tipo_kardex_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*tipo_kardex_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class tipo_kardex_init_control extends ControllerBase {	
	
	public $tipo_kardexClase=null;	
	public $tipo_kardexsModel=null;	
	public $tipo_kardexsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idtipo_kardex=0;	
	public ?int $idtipo_kardexActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $tipo_kardexLogic=null;
	
	public $tipo_kardexActual=null;	
	
	public $tipo_kardex=null;
	public $tipo_kardexs=null;
	public $tipo_kardexsEliminados=array();
	public $tipo_kardexsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $tipo_kardexsLocal=array();
	public ?array $tipo_kardexsReporte=null;
	public ?array $tipo_kardexsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadtipo_kardex='onload';
	public string $strTipoPaginaAuxiliartipo_kardex='none';
	public string $strTipoUsuarioAuxiliartipo_kardex='none';
		
	public $tipo_kardexReturnGeneral=null;
	public $tipo_kardexParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $tipo_kardexModel=null;
	public $tipo_kardexControllerAdditional=null;
	
	
	

	public $parametroinventarioLogic=null;

	public function  getparametro_inventarioLogic() {
		return $this->parametroinventarioLogic;
	}

	public function setparametro_inventarioLogic($parametroinventarioLogic) {
		$this->parametroinventarioLogic =$parametroinventarioLogic;
	}


	public $kardexLogic=null;

	public function  getkardexLogic() {
		return $this->kardexLogic;
	}

	public function setkardexLogic($kardexLogic) {
		$this->kardexLogic =$kardexLogic;
	}
 	
	
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	
	

	
	
	
	
	
	
	
	public $strTienePermisosparametro_inventario='none';
	public $strTienePermisoskardex='none';
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->tipo_kardexLogic==null) {
				$this->tipo_kardexLogic=new tipo_kardex_logic();
			}
			
		} else {
			if($this->tipo_kardexLogic==null) {
				$this->tipo_kardexLogic=new tipo_kardex_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->tipo_kardexClase==null) {
				$this->tipo_kardexClase=new tipo_kardex();
			}
			
			$this->tipo_kardexClase->setId(0);	
				
				
			$this->tipo_kardexClase->setcodigo('');	
			$this->tipo_kardexClase->setnombre('');	
			
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
		$this->prepararEjecutarMantenimientoBase('tipo_kardex');
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
		$this->cargarParametrosReporteBase('tipo_kardex');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('tipo_kardex');
	}
	
	public function actualizarControllerConReturnGeneral(tipo_kardex_param_return $tipo_kardexReturnGeneral) {
		if($tipo_kardexReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajestipo_kardexsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$tipo_kardexReturnGeneral->getsMensajeProceso();
		}
		
		if($tipo_kardexReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$tipo_kardexReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($tipo_kardexReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$tipo_kardexReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$tipo_kardexReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($tipo_kardexReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($tipo_kardexReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$tipo_kardexReturnGeneral->getsFuncionJs();
		}
		
		if($tipo_kardexReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(tipo_kardex_session $tipo_kardex_session){
		$this->strStyleDivArbol=$tipo_kardex_session->strStyleDivArbol;	
		$this->strStyleDivContent=$tipo_kardex_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$tipo_kardex_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$tipo_kardex_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$tipo_kardex_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$tipo_kardex_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$tipo_kardex_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(tipo_kardex_session $tipo_kardex_session){
		$tipo_kardex_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$tipo_kardex_session->strStyleDivHeader='display:none';			
		$tipo_kardex_session->strStyleDivContent='width:93%;height:100%';	
		$tipo_kardex_session->strStyleDivOpcionesBanner='display:none';	
		$tipo_kardex_session->strStyleDivExpandirColapsar='display:none';	
		$tipo_kardex_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(tipo_kardex_control $tipo_kardex_control_session){
		$this->idNuevo=$tipo_kardex_control_session->idNuevo;
		$this->tipo_kardexActual=$tipo_kardex_control_session->tipo_kardexActual;
		$this->tipo_kardex=$tipo_kardex_control_session->tipo_kardex;
		$this->tipo_kardexClase=$tipo_kardex_control_session->tipo_kardexClase;
		$this->tipo_kardexs=$tipo_kardex_control_session->tipo_kardexs;
		$this->tipo_kardexsEliminados=$tipo_kardex_control_session->tipo_kardexsEliminados;
		$this->tipo_kardex=$tipo_kardex_control_session->tipo_kardex;
		$this->tipo_kardexsReporte=$tipo_kardex_control_session->tipo_kardexsReporte;
		$this->tipo_kardexsSeleccionados=$tipo_kardex_control_session->tipo_kardexsSeleccionados;
		$this->arrOrderBy=$tipo_kardex_control_session->arrOrderBy;
		$this->arrOrderByRel=$tipo_kardex_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$tipo_kardex_control_session->arrHistoryWebs;
		$this->arrSessionBases=$tipo_kardex_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadtipo_kardex=$tipo_kardex_control_session->strTypeOnLoadtipo_kardex;
		$this->strTipoPaginaAuxiliartipo_kardex=$tipo_kardex_control_session->strTipoPaginaAuxiliartipo_kardex;
		$this->strTipoUsuarioAuxiliartipo_kardex=$tipo_kardex_control_session->strTipoUsuarioAuxiliartipo_kardex;	
		
		$this->bitEsPopup=$tipo_kardex_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$tipo_kardex_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$tipo_kardex_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$tipo_kardex_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$tipo_kardex_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$tipo_kardex_control_session->strSufijo;
		$this->bitEsRelaciones=$tipo_kardex_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$tipo_kardex_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$tipo_kardex_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$tipo_kardex_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$tipo_kardex_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$tipo_kardex_control_session->strTituloTabla;
		$this->strTituloPathPagina=$tipo_kardex_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$tipo_kardex_control_session->strTituloPathElementoActual;
		
		if($this->tipo_kardexLogic==null) {			
			$this->tipo_kardexLogic=new tipo_kardex_logic();
		}
		
		
		if($this->tipo_kardexClase==null) {
			$this->tipo_kardexClase=new tipo_kardex();	
		}
		
		$this->tipo_kardexLogic->settipo_kardex($this->tipo_kardexClase);
		
		
		if($this->tipo_kardexs==null) {
			$this->tipo_kardexs=array();	
		}
		
		$this->tipo_kardexLogic->settipo_kardexs($this->tipo_kardexs);
		
		
		$this->strTipoView=$tipo_kardex_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$tipo_kardex_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$tipo_kardex_control_session->datosCliente;
		$this->strAccionBusqueda=$tipo_kardex_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$tipo_kardex_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$tipo_kardex_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$tipo_kardex_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$tipo_kardex_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$tipo_kardex_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$tipo_kardex_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$tipo_kardex_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$tipo_kardex_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$tipo_kardex_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$tipo_kardex_control_session->strTipoPaginacion;
		$this->strTipoAccion=$tipo_kardex_control_session->strTipoAccion;
		$this->tiposReportes=$tipo_kardex_control_session->tiposReportes;
		$this->tiposReporte=$tipo_kardex_control_session->tiposReporte;
		$this->tiposAcciones=$tipo_kardex_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$tipo_kardex_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$tipo_kardex_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$tipo_kardex_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$tipo_kardex_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$tipo_kardex_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$tipo_kardex_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$tipo_kardex_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$tipo_kardex_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$tipo_kardex_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$tipo_kardex_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$tipo_kardex_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$tipo_kardex_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$tipo_kardex_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$tipo_kardex_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$tipo_kardex_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$tipo_kardex_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$tipo_kardex_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$tipo_kardex_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$tipo_kardex_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$tipo_kardex_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$tipo_kardex_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$tipo_kardex_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$tipo_kardex_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$tipo_kardex_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$tipo_kardex_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$tipo_kardex_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$tipo_kardex_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$tipo_kardex_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$tipo_kardex_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$tipo_kardex_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$tipo_kardex_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$tipo_kardex_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$tipo_kardex_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$tipo_kardex_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$tipo_kardex_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$tipo_kardex_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$tipo_kardex_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$tipo_kardex_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$tipo_kardex_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$tipo_kardex_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$tipo_kardex_control_session->resumenUsuarioActual;	
		$this->moduloActual=$tipo_kardex_control_session->moduloActual;	
		$this->opcionActual=$tipo_kardex_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$tipo_kardex_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$tipo_kardex_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$tipo_kardex_session=unserialize($this->Session->read(tipo_kardex_util::$STR_SESSION_NAME));
				
		if($tipo_kardex_session==null) {
			$tipo_kardex_session=new tipo_kardex_session();
		}
		
		$this->strStyleDivArbol=$tipo_kardex_session->strStyleDivArbol;	
		$this->strStyleDivContent=$tipo_kardex_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$tipo_kardex_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$tipo_kardex_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$tipo_kardex_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$tipo_kardex_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$tipo_kardex_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$tipo_kardex_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$tipo_kardex_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$tipo_kardex_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$tipo_kardex_session->strRecargarFkQuery;
		*/
		
		$this->strMensajecodigo=$tipo_kardex_control_session->strMensajecodigo;
		$this->strMensajenombre=$tipo_kardex_control_session->strMensajenombre;
			
		
		
		
		
		
		$this->strTienePermisosparametro_inventario=$tipo_kardex_control_session->strTienePermisosparametro_inventario;
		$this->strTienePermisoskardex=$tipo_kardex_control_session->strTienePermisoskardex;
		
		

		
		
		
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
	
	public function gettipo_kardexControllerAdditional() {
		return $this->tipo_kardexControllerAdditional;
	}

	public function settipo_kardexControllerAdditional($tipo_kardexControllerAdditional) {
		$this->tipo_kardexControllerAdditional = $tipo_kardexControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function gettipo_kardexActual() : tipo_kardex {
		return $this->tipo_kardexActual;
	}

	public function settipo_kardexActual(tipo_kardex $tipo_kardexActual) {
		$this->tipo_kardexActual = $tipo_kardexActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidtipo_kardex() : int {
		return $this->idtipo_kardex;
	}

	public function setidtipo_kardex(int $idtipo_kardex) {
		$this->idtipo_kardex = $idtipo_kardex;
	}
	
	public function gettipo_kardex() : tipo_kardex {
		return $this->tipo_kardex;
	}

	public function settipo_kardex(tipo_kardex $tipo_kardex) {
		$this->tipo_kardex = $tipo_kardex;
	}
		
	public function gettipo_kardexLogic() : tipo_kardex_logic {		
		return $this->tipo_kardexLogic;
	}

	public function settipo_kardexLogic(tipo_kardex_logic $tipo_kardexLogic) {
		$this->tipo_kardexLogic = $tipo_kardexLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function gettipo_kardexsModel() {		
		try {						
			/*tipo_kardexsModel.setWrappedData(tipo_kardexLogic->gettipo_kardexs());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->tipo_kardexsModel;
	}
	
	public function settipo_kardexsModel($tipo_kardexsModel) {
		$this->tipo_kardexsModel = $tipo_kardexsModel;
	}
	
	public function gettipo_kardexs() : array {		
		return $this->tipo_kardexs;
	}
	
	public function settipo_kardexs(array $tipo_kardexs) {
		$this->tipo_kardexs= $tipo_kardexs;
	}
	
	public function gettipo_kardexsEliminados() : array {		
		return $this->tipo_kardexsEliminados;
	}
	
	public function settipo_kardexsEliminados(array $tipo_kardexsEliminados) {
		$this->tipo_kardexsEliminados= $tipo_kardexsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function gettipo_kardexActualFromListDataModel() {
		try {
			/*$tipo_kardexClase= $this->tipo_kardexsModel->getRowData();*/
			
			/*return $tipo_kardex;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
