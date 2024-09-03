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

namespace com\bydan\contabilidad\contabilidad\fuente\presentation\control;

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

use com\bydan\contabilidad\contabilidad\fuente\business\entity\fuente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/fuente/util/fuente_carga.php');
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_carga;

use com\bydan\contabilidad\contabilidad\fuente\util\fuente_util;
use com\bydan\contabilidad\contabilidad\fuente\util\fuente_param_return;
use com\bydan\contabilidad\contabilidad\fuente\business\logic\fuente_logic;
use com\bydan\contabilidad\contabilidad\fuente\presentation\session\fuente_session;


//FK


//REL


use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\session\asiento_predefinido_session;

use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\session\asiento_automatico_session;

use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;
use com\bydan\contabilidad\contabilidad\asiento\presentation\session\asiento_session;


/*CARGA ARCHIVOS FRAMEWORK*/
fuente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
fuente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
fuente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
fuente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*fuente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class fuente_init_control extends ControllerBase {	
	
	public $fuenteClase=null;	
	public $fuentesModel=null;	
	public $fuentesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idfuente=0;	
	public ?int $idfuenteActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $fuenteLogic=null;
	
	public $fuenteActual=null;	
	
	public $fuente=null;
	public $fuentes=null;
	public $fuentesEliminados=array();
	public $fuentesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $fuentesLocal=array();
	public ?array $fuentesReporte=null;
	public ?array $fuentesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadfuente='onload';
	public string $strTipoPaginaAuxiliarfuente='none';
	public string $strTipoUsuarioAuxiliarfuente='none';
		
	public $fuenteReturnGeneral=null;
	public $fuenteParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $fuenteModel=null;
	public $fuenteControllerAdditional=null;
	
	
	

	public $asientopredefinidoLogic=null;

	public function  getasiento_predefinidoLogic() {
		return $this->asientopredefinidoLogic;
	}

	public function setasiento_predefinidoLogic($asientopredefinidoLogic) {
		$this->asientopredefinidoLogic =$asientopredefinidoLogic;
	}


	public $asientoautomaticoLogic=null;

	public function  getasiento_automaticoLogic() {
		return $this->asientoautomaticoLogic;
	}

	public function setasiento_automaticoLogic($asientoautomaticoLogic) {
		$this->asientoautomaticoLogic =$asientoautomaticoLogic;
	}


	public $asientoLogic=null;

	public function  getasientoLogic() {
		return $this->asientoLogic;
	}

	public function setasientoLogic($asientoLogic) {
		$this->asientoLogic =$asientoLogic;
	}
 	
	
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	
	

	
	
	
	
	
	
	
	public $strTienePermisosasiento_predefinido='none';
	public $strTienePermisosasiento_automatico='none';
	public $strTienePermisosasiento='none';
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->fuenteLogic==null) {
				$this->fuenteLogic=new fuente_logic();
			}
			
		} else {
			if($this->fuenteLogic==null) {
				$this->fuenteLogic=new fuente_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->fuenteClase==null) {
				$this->fuenteClase=new fuente();
			}
			
			$this->fuenteClase->setId(0);	
				
				
			$this->fuenteClase->setcodigo('');	
			$this->fuenteClase->setnombre('');	
			
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
		$this->prepararEjecutarMantenimientoBase('fuente');
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
		$this->cargarParametrosReporteBase('fuente');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('fuente');
	}
	
	public function actualizarControllerConReturnGeneral(fuente_param_return $fuenteReturnGeneral) {
		if($fuenteReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesfuentesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$fuenteReturnGeneral->getsMensajeProceso();
		}
		
		if($fuenteReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$fuenteReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($fuenteReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$fuenteReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$fuenteReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($fuenteReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($fuenteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$fuenteReturnGeneral->getsFuncionJs();
		}
		
		if($fuenteReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(fuente_session $fuente_session){
		$this->strStyleDivArbol=$fuente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$fuente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$fuente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$fuente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$fuente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$fuente_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$fuente_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(fuente_session $fuente_session){
		$fuente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$fuente_session->strStyleDivHeader='display:none';			
		$fuente_session->strStyleDivContent='width:93%;height:100%';	
		$fuente_session->strStyleDivOpcionesBanner='display:none';	
		$fuente_session->strStyleDivExpandirColapsar='display:none';	
		$fuente_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(fuente_control $fuente_control_session){
		$this->idNuevo=$fuente_control_session->idNuevo;
		$this->fuenteActual=$fuente_control_session->fuenteActual;
		$this->fuente=$fuente_control_session->fuente;
		$this->fuenteClase=$fuente_control_session->fuenteClase;
		$this->fuentes=$fuente_control_session->fuentes;
		$this->fuentesEliminados=$fuente_control_session->fuentesEliminados;
		$this->fuente=$fuente_control_session->fuente;
		$this->fuentesReporte=$fuente_control_session->fuentesReporte;
		$this->fuentesSeleccionados=$fuente_control_session->fuentesSeleccionados;
		$this->arrOrderBy=$fuente_control_session->arrOrderBy;
		$this->arrOrderByRel=$fuente_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$fuente_control_session->arrHistoryWebs;
		$this->arrSessionBases=$fuente_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadfuente=$fuente_control_session->strTypeOnLoadfuente;
		$this->strTipoPaginaAuxiliarfuente=$fuente_control_session->strTipoPaginaAuxiliarfuente;
		$this->strTipoUsuarioAuxiliarfuente=$fuente_control_session->strTipoUsuarioAuxiliarfuente;	
		
		$this->bitEsPopup=$fuente_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$fuente_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$fuente_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$fuente_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$fuente_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$fuente_control_session->strSufijo;
		$this->bitEsRelaciones=$fuente_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$fuente_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$fuente_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$fuente_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$fuente_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$fuente_control_session->strTituloTabla;
		$this->strTituloPathPagina=$fuente_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$fuente_control_session->strTituloPathElementoActual;
		
		if($this->fuenteLogic==null) {			
			$this->fuenteLogic=new fuente_logic();
		}
		
		
		if($this->fuenteClase==null) {
			$this->fuenteClase=new fuente();	
		}
		
		$this->fuenteLogic->setfuente($this->fuenteClase);
		
		
		if($this->fuentes==null) {
			$this->fuentes=array();	
		}
		
		$this->fuenteLogic->setfuentes($this->fuentes);
		
		
		$this->strTipoView=$fuente_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$fuente_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$fuente_control_session->datosCliente;
		$this->strAccionBusqueda=$fuente_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$fuente_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$fuente_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$fuente_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$fuente_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$fuente_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$fuente_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$fuente_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$fuente_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$fuente_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$fuente_control_session->strTipoPaginacion;
		$this->strTipoAccion=$fuente_control_session->strTipoAccion;
		$this->tiposReportes=$fuente_control_session->tiposReportes;
		$this->tiposReporte=$fuente_control_session->tiposReporte;
		$this->tiposAcciones=$fuente_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$fuente_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$fuente_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$fuente_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$fuente_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$fuente_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$fuente_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$fuente_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$fuente_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$fuente_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$fuente_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$fuente_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$fuente_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$fuente_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$fuente_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$fuente_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$fuente_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$fuente_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$fuente_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$fuente_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$fuente_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$fuente_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$fuente_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$fuente_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$fuente_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$fuente_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$fuente_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$fuente_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$fuente_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$fuente_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$fuente_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$fuente_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$fuente_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$fuente_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$fuente_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$fuente_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$fuente_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$fuente_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$fuente_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$fuente_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$fuente_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$fuente_control_session->resumenUsuarioActual;	
		$this->moduloActual=$fuente_control_session->moduloActual;	
		$this->opcionActual=$fuente_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$fuente_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$fuente_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$fuente_session=unserialize($this->Session->read(fuente_util::$STR_SESSION_NAME));
				
		if($fuente_session==null) {
			$fuente_session=new fuente_session();
		}
		
		$this->strStyleDivArbol=$fuente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$fuente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$fuente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$fuente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$fuente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$fuente_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$fuente_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$fuente_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$fuente_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$fuente_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$fuente_session->strRecargarFkQuery;
		*/
		
		$this->strMensajecodigo=$fuente_control_session->strMensajecodigo;
		$this->strMensajenombre=$fuente_control_session->strMensajenombre;
			
		
		
		
		
		
		$this->strTienePermisosasiento_predefinido=$fuente_control_session->strTienePermisosasiento_predefinido;
		$this->strTienePermisosasiento_automatico=$fuente_control_session->strTienePermisosasiento_automatico;
		$this->strTienePermisosasiento=$fuente_control_session->strTienePermisosasiento;
		
		

		
		
		
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
	
	public function getfuenteControllerAdditional() {
		return $this->fuenteControllerAdditional;
	}

	public function setfuenteControllerAdditional($fuenteControllerAdditional) {
		$this->fuenteControllerAdditional = $fuenteControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getfuenteActual() : fuente {
		return $this->fuenteActual;
	}

	public function setfuenteActual(fuente $fuenteActual) {
		$this->fuenteActual = $fuenteActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidfuente() : int {
		return $this->idfuente;
	}

	public function setidfuente(int $idfuente) {
		$this->idfuente = $idfuente;
	}
	
	public function getfuente() : fuente {
		return $this->fuente;
	}

	public function setfuente(fuente $fuente) {
		$this->fuente = $fuente;
	}
		
	public function getfuenteLogic() : fuente_logic {		
		return $this->fuenteLogic;
	}

	public function setfuenteLogic(fuente_logic $fuenteLogic) {
		$this->fuenteLogic = $fuenteLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getfuentesModel() {		
		try {						
			/*fuentesModel.setWrappedData(fuenteLogic->getfuentes());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->fuentesModel;
	}
	
	public function setfuentesModel($fuentesModel) {
		$this->fuentesModel = $fuentesModel;
	}
	
	public function getfuentes() : array {		
		return $this->fuentes;
	}
	
	public function setfuentes(array $fuentes) {
		$this->fuentes= $fuentes;
	}
	
	public function getfuentesEliminados() : array {		
		return $this->fuentesEliminados;
	}
	
	public function setfuentesEliminados(array $fuentesEliminados) {
		$this->fuentesEliminados= $fuentesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getfuenteActualFromListDataModel() {
		try {
			/*$fuenteClase= $this->fuentesModel->getRowData();*/
			
			/*return $fuente;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
