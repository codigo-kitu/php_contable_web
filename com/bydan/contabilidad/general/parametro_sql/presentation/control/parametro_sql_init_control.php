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

namespace com\bydan\contabilidad\general\parametro_sql\presentation\control;

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

use com\bydan\contabilidad\general\parametro_sql\business\entity\parametro_sql;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/parametro_sql/util/parametro_sql_carga.php');
use com\bydan\contabilidad\general\parametro_sql\util\parametro_sql_carga;

use com\bydan\contabilidad\general\parametro_sql\util\parametro_sql_util;
use com\bydan\contabilidad\general\parametro_sql\util\parametro_sql_param_return;
use com\bydan\contabilidad\general\parametro_sql\business\logic\parametro_sql_logic;
use com\bydan\contabilidad\general\parametro_sql\presentation\session\parametro_sql_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_sql_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_sql_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_sql_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_sql_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_sql_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class parametro_sql_init_control extends ControllerBase {	
	
	public $parametro_sqlClase=null;	
	public $parametro_sqlsModel=null;	
	public $parametro_sqlsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idparametro_sql=0;	
	public ?int $idparametro_sqlActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $parametro_sqlLogic=null;
	
	public $parametro_sqlActual=null;	
	
	public $parametro_sql=null;
	public $parametro_sqls=null;
	public $parametro_sqlsEliminados=array();
	public $parametro_sqlsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $parametro_sqlsLocal=array();
	public ?array $parametro_sqlsReporte=null;
	public ?array $parametro_sqlsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadparametro_sql='onload';
	public string $strTipoPaginaAuxiliarparametro_sql='none';
	public string $strTipoUsuarioAuxiliarparametro_sql='none';
		
	public $parametro_sqlReturnGeneral=null;
	public $parametro_sqlParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $parametro_sqlModel=null;
	public $parametro_sqlControllerAdditional=null;
	
	
	 	
	
	public string $strMensajebinario1='';
	public string $strMensajebinario2='';
	public string $strMensajebinario3='';
	public string $strMensajebinario4='';
	public string $strMensajebinario5='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->parametro_sqlLogic==null) {
				$this->parametro_sqlLogic=new parametro_sql_logic();
			}
			
		} else {
			if($this->parametro_sqlLogic==null) {
				$this->parametro_sqlLogic=new parametro_sql_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->parametro_sqlClase==null) {
				$this->parametro_sqlClase=new parametro_sql();
			}
			
			$this->parametro_sqlClase->setId(0);	
				
				
			$this->parametro_sqlClase->setbinario1('');	
			$this->parametro_sqlClase->setbinario2('');	
			$this->parametro_sqlClase->setbinario3('');	
			$this->parametro_sqlClase->setbinario4('');	
			$this->parametro_sqlClase->setbinario5('');	
			
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
		$this->prepararEjecutarMantenimientoBase('parametro_sql');
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
		$this->cargarParametrosReporteBase('parametro_sql');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('parametro_sql');
	}
	
	public function actualizarControllerConReturnGeneral(parametro_sql_param_return $parametro_sqlReturnGeneral) {
		if($parametro_sqlReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesparametro_sqlsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$parametro_sqlReturnGeneral->getsMensajeProceso();
		}
		
		if($parametro_sqlReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$parametro_sqlReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($parametro_sqlReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$parametro_sqlReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$parametro_sqlReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($parametro_sqlReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($parametro_sqlReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$parametro_sqlReturnGeneral->getsFuncionJs();
		}
		
		if($parametro_sqlReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(parametro_sql_session $parametro_sql_session){
		$this->strStyleDivArbol=$parametro_sql_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_sql_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_sql_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_sql_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_sql_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_sql_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$parametro_sql_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(parametro_sql_session $parametro_sql_session){
		$parametro_sql_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$parametro_sql_session->strStyleDivHeader='display:none';			
		$parametro_sql_session->strStyleDivContent='width:93%;height:100%';	
		$parametro_sql_session->strStyleDivOpcionesBanner='display:none';	
		$parametro_sql_session->strStyleDivExpandirColapsar='display:none';	
		$parametro_sql_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(parametro_sql_control $parametro_sql_control_session){
		$this->idNuevo=$parametro_sql_control_session->idNuevo;
		$this->parametro_sqlActual=$parametro_sql_control_session->parametro_sqlActual;
		$this->parametro_sql=$parametro_sql_control_session->parametro_sql;
		$this->parametro_sqlClase=$parametro_sql_control_session->parametro_sqlClase;
		$this->parametro_sqls=$parametro_sql_control_session->parametro_sqls;
		$this->parametro_sqlsEliminados=$parametro_sql_control_session->parametro_sqlsEliminados;
		$this->parametro_sql=$parametro_sql_control_session->parametro_sql;
		$this->parametro_sqlsReporte=$parametro_sql_control_session->parametro_sqlsReporte;
		$this->parametro_sqlsSeleccionados=$parametro_sql_control_session->parametro_sqlsSeleccionados;
		$this->arrOrderBy=$parametro_sql_control_session->arrOrderBy;
		$this->arrOrderByRel=$parametro_sql_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$parametro_sql_control_session->arrHistoryWebs;
		$this->arrSessionBases=$parametro_sql_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadparametro_sql=$parametro_sql_control_session->strTypeOnLoadparametro_sql;
		$this->strTipoPaginaAuxiliarparametro_sql=$parametro_sql_control_session->strTipoPaginaAuxiliarparametro_sql;
		$this->strTipoUsuarioAuxiliarparametro_sql=$parametro_sql_control_session->strTipoUsuarioAuxiliarparametro_sql;	
		
		$this->bitEsPopup=$parametro_sql_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$parametro_sql_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$parametro_sql_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$parametro_sql_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$parametro_sql_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$parametro_sql_control_session->strSufijo;
		$this->bitEsRelaciones=$parametro_sql_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$parametro_sql_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$parametro_sql_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$parametro_sql_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$parametro_sql_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$parametro_sql_control_session->strTituloTabla;
		$this->strTituloPathPagina=$parametro_sql_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$parametro_sql_control_session->strTituloPathElementoActual;
		
		if($this->parametro_sqlLogic==null) {			
			$this->parametro_sqlLogic=new parametro_sql_logic();
		}
		
		
		if($this->parametro_sqlClase==null) {
			$this->parametro_sqlClase=new parametro_sql();	
		}
		
		$this->parametro_sqlLogic->setparametro_sql($this->parametro_sqlClase);
		
		
		if($this->parametro_sqls==null) {
			$this->parametro_sqls=array();	
		}
		
		$this->parametro_sqlLogic->setparametro_sqls($this->parametro_sqls);
		
		
		$this->strTipoView=$parametro_sql_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$parametro_sql_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$parametro_sql_control_session->datosCliente;
		$this->strAccionBusqueda=$parametro_sql_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$parametro_sql_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$parametro_sql_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$parametro_sql_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$parametro_sql_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$parametro_sql_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$parametro_sql_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$parametro_sql_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$parametro_sql_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$parametro_sql_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$parametro_sql_control_session->strTipoPaginacion;
		$this->strTipoAccion=$parametro_sql_control_session->strTipoAccion;
		$this->tiposReportes=$parametro_sql_control_session->tiposReportes;
		$this->tiposReporte=$parametro_sql_control_session->tiposReporte;
		$this->tiposAcciones=$parametro_sql_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$parametro_sql_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$parametro_sql_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$parametro_sql_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$parametro_sql_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$parametro_sql_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$parametro_sql_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$parametro_sql_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$parametro_sql_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$parametro_sql_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$parametro_sql_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$parametro_sql_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$parametro_sql_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$parametro_sql_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$parametro_sql_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$parametro_sql_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$parametro_sql_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$parametro_sql_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$parametro_sql_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$parametro_sql_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$parametro_sql_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$parametro_sql_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$parametro_sql_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$parametro_sql_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$parametro_sql_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$parametro_sql_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$parametro_sql_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$parametro_sql_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$parametro_sql_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$parametro_sql_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$parametro_sql_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$parametro_sql_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$parametro_sql_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$parametro_sql_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$parametro_sql_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$parametro_sql_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$parametro_sql_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$parametro_sql_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$parametro_sql_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$parametro_sql_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$parametro_sql_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$parametro_sql_control_session->resumenUsuarioActual;	
		$this->moduloActual=$parametro_sql_control_session->moduloActual;	
		$this->opcionActual=$parametro_sql_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$parametro_sql_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$parametro_sql_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$parametro_sql_session=unserialize($this->Session->read(parametro_sql_util::$STR_SESSION_NAME));
				
		if($parametro_sql_session==null) {
			$parametro_sql_session=new parametro_sql_session();
		}
		
		$this->strStyleDivArbol=$parametro_sql_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_sql_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_sql_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_sql_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_sql_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_sql_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$parametro_sql_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$parametro_sql_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$parametro_sql_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$parametro_sql_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$parametro_sql_session->strRecargarFkQuery;
		*/
		
		$this->strMensajebinario1=$parametro_sql_control_session->strMensajebinario1;
		$this->strMensajebinario2=$parametro_sql_control_session->strMensajebinario2;
		$this->strMensajebinario3=$parametro_sql_control_session->strMensajebinario3;
		$this->strMensajebinario4=$parametro_sql_control_session->strMensajebinario4;
		$this->strMensajebinario5=$parametro_sql_control_session->strMensajebinario5;
			
		
		
		
		
		
		
		

		
		
		
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
	
	public function getparametro_sqlControllerAdditional() {
		return $this->parametro_sqlControllerAdditional;
	}

	public function setparametro_sqlControllerAdditional($parametro_sqlControllerAdditional) {
		$this->parametro_sqlControllerAdditional = $parametro_sqlControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getparametro_sqlActual() : parametro_sql {
		return $this->parametro_sqlActual;
	}

	public function setparametro_sqlActual(parametro_sql $parametro_sqlActual) {
		$this->parametro_sqlActual = $parametro_sqlActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidparametro_sql() : int {
		return $this->idparametro_sql;
	}

	public function setidparametro_sql(int $idparametro_sql) {
		$this->idparametro_sql = $idparametro_sql;
	}
	
	public function getparametro_sql() : parametro_sql {
		return $this->parametro_sql;
	}

	public function setparametro_sql(parametro_sql $parametro_sql) {
		$this->parametro_sql = $parametro_sql;
	}
		
	public function getparametro_sqlLogic() : parametro_sql_logic {		
		return $this->parametro_sqlLogic;
	}

	public function setparametro_sqlLogic(parametro_sql_logic $parametro_sqlLogic) {
		$this->parametro_sqlLogic = $parametro_sqlLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getparametro_sqlsModel() {		
		try {						
			/*parametro_sqlsModel.setWrappedData(parametro_sqlLogic->getparametro_sqls());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->parametro_sqlsModel;
	}
	
	public function setparametro_sqlsModel($parametro_sqlsModel) {
		$this->parametro_sqlsModel = $parametro_sqlsModel;
	}
	
	public function getparametro_sqls() : array {		
		return $this->parametro_sqls;
	}
	
	public function setparametro_sqls(array $parametro_sqls) {
		$this->parametro_sqls= $parametro_sqls;
	}
	
	public function getparametro_sqlsEliminados() : array {		
		return $this->parametro_sqlsEliminados;
	}
	
	public function setparametro_sqlsEliminados(array $parametro_sqlsEliminados) {
		$this->parametro_sqlsEliminados= $parametro_sqlsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getparametro_sqlActualFromListDataModel() {
		try {
			/*$parametro_sqlClase= $this->parametro_sqlsModel->getRowData();*/
			
			/*return $parametro_sql;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
