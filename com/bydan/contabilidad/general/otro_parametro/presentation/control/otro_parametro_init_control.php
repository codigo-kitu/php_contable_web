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

namespace com\bydan\contabilidad\general\otro_parametro\presentation\control;

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

use com\bydan\contabilidad\general\otro_parametro\business\entity\otro_parametro;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/otro_parametro/util/otro_parametro_carga.php');
use com\bydan\contabilidad\general\otro_parametro\util\otro_parametro_carga;

use com\bydan\contabilidad\general\otro_parametro\util\otro_parametro_util;
use com\bydan\contabilidad\general\otro_parametro\util\otro_parametro_param_return;
use com\bydan\contabilidad\general\otro_parametro\business\logic\otro_parametro_logic;
use com\bydan\contabilidad\general\otro_parametro\presentation\session\otro_parametro_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
otro_parametro_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
otro_parametro_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
otro_parametro_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
otro_parametro_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*otro_parametro_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class otro_parametro_init_control extends ControllerBase {	
	
	public $otro_parametroClase=null;	
	public $otro_parametrosModel=null;	
	public $otro_parametrosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idotro_parametro=0;	
	public ?int $idotro_parametroActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $otro_parametroLogic=null;
	
	public $otro_parametroActual=null;	
	
	public $otro_parametro=null;
	public $otro_parametros=null;
	public $otro_parametrosEliminados=array();
	public $otro_parametrosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $otro_parametrosLocal=array();
	public ?array $otro_parametrosReporte=null;
	public ?array $otro_parametrosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadotro_parametro='onload';
	public string $strTipoPaginaAuxiliarotro_parametro='none';
	public string $strTipoUsuarioAuxiliarotro_parametro='none';
		
	public $otro_parametroReturnGeneral=null;
	public $otro_parametroParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $otro_parametroModel=null;
	public $otro_parametroControllerAdditional=null;
	
	
	 	
	
	public string $strMensajecodigo='';
	public string $strMensajecodigo2='';
	public string $strMensajegrupo='';
	public string $strMensajedescripcion='';
	public string $strMensajetexto1='';
	public string $strMensajeorden='';
	public string $strMensajemonto1='';
	public string $strMensajeactivo='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->otro_parametroLogic==null) {
				$this->otro_parametroLogic=new otro_parametro_logic();
			}
			
		} else {
			if($this->otro_parametroLogic==null) {
				$this->otro_parametroLogic=new otro_parametro_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->otro_parametroClase==null) {
				$this->otro_parametroClase=new otro_parametro();
			}
			
			$this->otro_parametroClase->setId(0);	
				
				
			$this->otro_parametroClase->setcodigo('');	
			$this->otro_parametroClase->setcodigo2('');	
			$this->otro_parametroClase->setgrupo('');	
			$this->otro_parametroClase->setdescripcion('');	
			$this->otro_parametroClase->settexto1('');	
			$this->otro_parametroClase->setorden(0);	
			$this->otro_parametroClase->setmonto1(0.0);	
			$this->otro_parametroClase->setactivo(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('otro_parametro');
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
		$this->cargarParametrosReporteBase('otro_parametro');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('otro_parametro');
	}
	
	public function actualizarControllerConReturnGeneral(otro_parametro_param_return $otro_parametroReturnGeneral) {
		if($otro_parametroReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesotro_parametrosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$otro_parametroReturnGeneral->getsMensajeProceso();
		}
		
		if($otro_parametroReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$otro_parametroReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($otro_parametroReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$otro_parametroReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$otro_parametroReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($otro_parametroReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($otro_parametroReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$otro_parametroReturnGeneral->getsFuncionJs();
		}
		
		if($otro_parametroReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(otro_parametro_session $otro_parametro_session){
		$this->strStyleDivArbol=$otro_parametro_session->strStyleDivArbol;	
		$this->strStyleDivContent=$otro_parametro_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$otro_parametro_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$otro_parametro_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$otro_parametro_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$otro_parametro_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$otro_parametro_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(otro_parametro_session $otro_parametro_session){
		$otro_parametro_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$otro_parametro_session->strStyleDivHeader='display:none';			
		$otro_parametro_session->strStyleDivContent='width:93%;height:100%';	
		$otro_parametro_session->strStyleDivOpcionesBanner='display:none';	
		$otro_parametro_session->strStyleDivExpandirColapsar='display:none';	
		$otro_parametro_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(otro_parametro_control $otro_parametro_control_session){
		$this->idNuevo=$otro_parametro_control_session->idNuevo;
		$this->otro_parametroActual=$otro_parametro_control_session->otro_parametroActual;
		$this->otro_parametro=$otro_parametro_control_session->otro_parametro;
		$this->otro_parametroClase=$otro_parametro_control_session->otro_parametroClase;
		$this->otro_parametros=$otro_parametro_control_session->otro_parametros;
		$this->otro_parametrosEliminados=$otro_parametro_control_session->otro_parametrosEliminados;
		$this->otro_parametro=$otro_parametro_control_session->otro_parametro;
		$this->otro_parametrosReporte=$otro_parametro_control_session->otro_parametrosReporte;
		$this->otro_parametrosSeleccionados=$otro_parametro_control_session->otro_parametrosSeleccionados;
		$this->arrOrderBy=$otro_parametro_control_session->arrOrderBy;
		$this->arrOrderByRel=$otro_parametro_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$otro_parametro_control_session->arrHistoryWebs;
		$this->arrSessionBases=$otro_parametro_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadotro_parametro=$otro_parametro_control_session->strTypeOnLoadotro_parametro;
		$this->strTipoPaginaAuxiliarotro_parametro=$otro_parametro_control_session->strTipoPaginaAuxiliarotro_parametro;
		$this->strTipoUsuarioAuxiliarotro_parametro=$otro_parametro_control_session->strTipoUsuarioAuxiliarotro_parametro;	
		
		$this->bitEsPopup=$otro_parametro_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$otro_parametro_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$otro_parametro_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$otro_parametro_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$otro_parametro_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$otro_parametro_control_session->strSufijo;
		$this->bitEsRelaciones=$otro_parametro_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$otro_parametro_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$otro_parametro_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$otro_parametro_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$otro_parametro_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$otro_parametro_control_session->strTituloTabla;
		$this->strTituloPathPagina=$otro_parametro_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$otro_parametro_control_session->strTituloPathElementoActual;
		
		if($this->otro_parametroLogic==null) {			
			$this->otro_parametroLogic=new otro_parametro_logic();
		}
		
		
		if($this->otro_parametroClase==null) {
			$this->otro_parametroClase=new otro_parametro();	
		}
		
		$this->otro_parametroLogic->setotro_parametro($this->otro_parametroClase);
		
		
		if($this->otro_parametros==null) {
			$this->otro_parametros=array();	
		}
		
		$this->otro_parametroLogic->setotro_parametros($this->otro_parametros);
		
		
		$this->strTipoView=$otro_parametro_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$otro_parametro_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$otro_parametro_control_session->datosCliente;
		$this->strAccionBusqueda=$otro_parametro_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$otro_parametro_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$otro_parametro_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$otro_parametro_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$otro_parametro_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$otro_parametro_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$otro_parametro_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$otro_parametro_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$otro_parametro_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$otro_parametro_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$otro_parametro_control_session->strTipoPaginacion;
		$this->strTipoAccion=$otro_parametro_control_session->strTipoAccion;
		$this->tiposReportes=$otro_parametro_control_session->tiposReportes;
		$this->tiposReporte=$otro_parametro_control_session->tiposReporte;
		$this->tiposAcciones=$otro_parametro_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$otro_parametro_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$otro_parametro_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$otro_parametro_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$otro_parametro_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$otro_parametro_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$otro_parametro_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$otro_parametro_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$otro_parametro_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$otro_parametro_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$otro_parametro_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$otro_parametro_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$otro_parametro_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$otro_parametro_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$otro_parametro_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$otro_parametro_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$otro_parametro_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$otro_parametro_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$otro_parametro_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$otro_parametro_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$otro_parametro_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$otro_parametro_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$otro_parametro_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$otro_parametro_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$otro_parametro_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$otro_parametro_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$otro_parametro_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$otro_parametro_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$otro_parametro_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$otro_parametro_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$otro_parametro_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$otro_parametro_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$otro_parametro_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$otro_parametro_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$otro_parametro_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$otro_parametro_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$otro_parametro_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$otro_parametro_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$otro_parametro_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$otro_parametro_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$otro_parametro_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$otro_parametro_control_session->resumenUsuarioActual;	
		$this->moduloActual=$otro_parametro_control_session->moduloActual;	
		$this->opcionActual=$otro_parametro_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$otro_parametro_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$otro_parametro_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$otro_parametro_session=unserialize($this->Session->read(otro_parametro_util::$STR_SESSION_NAME));
				
		if($otro_parametro_session==null) {
			$otro_parametro_session=new otro_parametro_session();
		}
		
		$this->strStyleDivArbol=$otro_parametro_session->strStyleDivArbol;	
		$this->strStyleDivContent=$otro_parametro_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$otro_parametro_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$otro_parametro_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$otro_parametro_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$otro_parametro_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$otro_parametro_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$otro_parametro_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$otro_parametro_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$otro_parametro_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$otro_parametro_session->strRecargarFkQuery;
		*/
		
		$this->strMensajecodigo=$otro_parametro_control_session->strMensajecodigo;
		$this->strMensajecodigo2=$otro_parametro_control_session->strMensajecodigo2;
		$this->strMensajegrupo=$otro_parametro_control_session->strMensajegrupo;
		$this->strMensajedescripcion=$otro_parametro_control_session->strMensajedescripcion;
		$this->strMensajetexto1=$otro_parametro_control_session->strMensajetexto1;
		$this->strMensajeorden=$otro_parametro_control_session->strMensajeorden;
		$this->strMensajemonto1=$otro_parametro_control_session->strMensajemonto1;
		$this->strMensajeactivo=$otro_parametro_control_session->strMensajeactivo;
			
		
		
		
		
		
		
		

		
		
		
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
	
	public function getotro_parametroControllerAdditional() {
		return $this->otro_parametroControllerAdditional;
	}

	public function setotro_parametroControllerAdditional($otro_parametroControllerAdditional) {
		$this->otro_parametroControllerAdditional = $otro_parametroControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getotro_parametroActual() : otro_parametro {
		return $this->otro_parametroActual;
	}

	public function setotro_parametroActual(otro_parametro $otro_parametroActual) {
		$this->otro_parametroActual = $otro_parametroActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidotro_parametro() : int {
		return $this->idotro_parametro;
	}

	public function setidotro_parametro(int $idotro_parametro) {
		$this->idotro_parametro = $idotro_parametro;
	}
	
	public function getotro_parametro() : otro_parametro {
		return $this->otro_parametro;
	}

	public function setotro_parametro(otro_parametro $otro_parametro) {
		$this->otro_parametro = $otro_parametro;
	}
		
	public function getotro_parametroLogic() : otro_parametro_logic {		
		return $this->otro_parametroLogic;
	}

	public function setotro_parametroLogic(otro_parametro_logic $otro_parametroLogic) {
		$this->otro_parametroLogic = $otro_parametroLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getotro_parametrosModel() {		
		try {						
			/*otro_parametrosModel.setWrappedData(otro_parametroLogic->getotro_parametros());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->otro_parametrosModel;
	}
	
	public function setotro_parametrosModel($otro_parametrosModel) {
		$this->otro_parametrosModel = $otro_parametrosModel;
	}
	
	public function getotro_parametros() : array {		
		return $this->otro_parametros;
	}
	
	public function setotro_parametros(array $otro_parametros) {
		$this->otro_parametros= $otro_parametros;
	}
	
	public function getotro_parametrosEliminados() : array {		
		return $this->otro_parametrosEliminados;
	}
	
	public function setotro_parametrosEliminados(array $otro_parametrosEliminados) {
		$this->otro_parametrosEliminados= $otro_parametrosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getotro_parametroActualFromListDataModel() {
		try {
			/*$otro_parametroClase= $this->otro_parametrosModel->getRowData();*/
			
			/*return $otro_parametro;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
