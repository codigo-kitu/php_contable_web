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

namespace com\bydan\contabilidad\general\archivo\presentation\control;

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

use com\bydan\contabilidad\general\archivo\business\entity\archivo;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/archivo/util/archivo_carga.php');
use com\bydan\contabilidad\general\archivo\util\archivo_carga;

use com\bydan\contabilidad\general\archivo\util\archivo_util;
use com\bydan\contabilidad\general\archivo\util\archivo_param_return;
use com\bydan\contabilidad\general\archivo\business\logic\archivo_logic;
use com\bydan\contabilidad\general\archivo\presentation\session\archivo_session;


//FK


//REL


use com\bydan\contabilidad\general\otro_documento\util\otro_documento_carga;
use com\bydan\contabilidad\general\otro_documento\util\otro_documento_util;
use com\bydan\contabilidad\general\otro_documento\presentation\session\otro_documento_session;


/*CARGA ARCHIVOS FRAMEWORK*/
archivo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
archivo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
archivo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
archivo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*archivo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class archivo_init_control extends ControllerBase {	
	
	public $archivoClase=null;	
	public $archivosModel=null;	
	public $archivosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idarchivo=0;	
	public ?int $idarchivoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $archivoLogic=null;
	
	public $archivoActual=null;	
	
	public $archivo=null;
	public $archivos=null;
	public $archivosEliminados=array();
	public $archivosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $archivosLocal=array();
	public ?array $archivosReporte=null;
	public ?array $archivosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadarchivo='onload';
	public string $strTipoPaginaAuxiliararchivo='none';
	public string $strTipoUsuarioAuxiliararchivo='none';
		
	public $archivoReturnGeneral=null;
	public $archivoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $archivoModel=null;
	public $archivoControllerAdditional=null;
	
	
	

	public $otrodocumentoLogic=null;

	public function  getotro_documentoLogic() {
		return $this->otrodocumentoLogic;
	}

	public function setotro_documentoLogic($otrodocumentoLogic) {
		$this->otrodocumentoLogic =$otrodocumentoLogic;
	}
 	
	
	public string $strMensajeimagen='';
	public string $strMensajenombre='';
	public string $strMensajedescripcion='';
	public string $strMensajearchivo='';
	
	

	
	
	
	
	
	
	
	public $strTienePermisosotro_documento='none';
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->archivoLogic==null) {
				$this->archivoLogic=new archivo_logic();
			}
			
		} else {
			if($this->archivoLogic==null) {
				$this->archivoLogic=new archivo_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->archivoClase==null) {
				$this->archivoClase=new archivo();
			}
			
			$this->archivoClase->setId(0);	
				
				
			$this->archivoClase->setimagen('');	
			$this->archivoClase->setnombre('');	
			$this->archivoClase->setdescripcion('');	
			$this->archivoClase->setarchivo('');	
			
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
		$this->prepararEjecutarMantenimientoBase('archivo');
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
		$this->cargarParametrosReporteBase('archivo');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('archivo');
	}
	
	public function actualizarControllerConReturnGeneral(archivo_param_return $archivoReturnGeneral) {
		if($archivoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesarchivosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$archivoReturnGeneral->getsMensajeProceso();
		}
		
		if($archivoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$archivoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($archivoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$archivoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$archivoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($archivoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($archivoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$archivoReturnGeneral->getsFuncionJs();
		}
		
		if($archivoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(archivo_session $archivo_session){
		$this->strStyleDivArbol=$archivo_session->strStyleDivArbol;	
		$this->strStyleDivContent=$archivo_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$archivo_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$archivo_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$archivo_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$archivo_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$archivo_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(archivo_session $archivo_session){
		$archivo_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$archivo_session->strStyleDivHeader='display:none';			
		$archivo_session->strStyleDivContent='width:93%;height:100%';	
		$archivo_session->strStyleDivOpcionesBanner='display:none';	
		$archivo_session->strStyleDivExpandirColapsar='display:none';	
		$archivo_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(archivo_control $archivo_control_session){
		$this->idNuevo=$archivo_control_session->idNuevo;
		$this->archivoActual=$archivo_control_session->archivoActual;
		$this->archivo=$archivo_control_session->archivo;
		$this->archivoClase=$archivo_control_session->archivoClase;
		$this->archivos=$archivo_control_session->archivos;
		$this->archivosEliminados=$archivo_control_session->archivosEliminados;
		$this->archivo=$archivo_control_session->archivo;
		$this->archivosReporte=$archivo_control_session->archivosReporte;
		$this->archivosSeleccionados=$archivo_control_session->archivosSeleccionados;
		$this->arrOrderBy=$archivo_control_session->arrOrderBy;
		$this->arrOrderByRel=$archivo_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$archivo_control_session->arrHistoryWebs;
		$this->arrSessionBases=$archivo_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadarchivo=$archivo_control_session->strTypeOnLoadarchivo;
		$this->strTipoPaginaAuxiliararchivo=$archivo_control_session->strTipoPaginaAuxiliararchivo;
		$this->strTipoUsuarioAuxiliararchivo=$archivo_control_session->strTipoUsuarioAuxiliararchivo;	
		
		$this->bitEsPopup=$archivo_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$archivo_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$archivo_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$archivo_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$archivo_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$archivo_control_session->strSufijo;
		$this->bitEsRelaciones=$archivo_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$archivo_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$archivo_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$archivo_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$archivo_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$archivo_control_session->strTituloTabla;
		$this->strTituloPathPagina=$archivo_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$archivo_control_session->strTituloPathElementoActual;
		
		if($this->archivoLogic==null) {			
			$this->archivoLogic=new archivo_logic();
		}
		
		
		if($this->archivoClase==null) {
			$this->archivoClase=new archivo();	
		}
		
		$this->archivoLogic->setarchivo($this->archivoClase);
		
		
		if($this->archivos==null) {
			$this->archivos=array();	
		}
		
		$this->archivoLogic->setarchivos($this->archivos);
		
		
		$this->strTipoView=$archivo_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$archivo_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$archivo_control_session->datosCliente;
		$this->strAccionBusqueda=$archivo_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$archivo_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$archivo_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$archivo_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$archivo_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$archivo_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$archivo_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$archivo_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$archivo_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$archivo_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$archivo_control_session->strTipoPaginacion;
		$this->strTipoAccion=$archivo_control_session->strTipoAccion;
		$this->tiposReportes=$archivo_control_session->tiposReportes;
		$this->tiposReporte=$archivo_control_session->tiposReporte;
		$this->tiposAcciones=$archivo_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$archivo_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$archivo_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$archivo_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$archivo_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$archivo_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$archivo_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$archivo_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$archivo_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$archivo_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$archivo_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$archivo_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$archivo_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$archivo_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$archivo_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$archivo_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$archivo_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$archivo_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$archivo_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$archivo_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$archivo_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$archivo_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$archivo_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$archivo_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$archivo_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$archivo_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$archivo_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$archivo_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$archivo_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$archivo_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$archivo_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$archivo_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$archivo_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$archivo_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$archivo_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$archivo_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$archivo_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$archivo_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$archivo_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$archivo_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$archivo_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$archivo_control_session->resumenUsuarioActual;	
		$this->moduloActual=$archivo_control_session->moduloActual;	
		$this->opcionActual=$archivo_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$archivo_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$archivo_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$archivo_session=unserialize($this->Session->read(archivo_util::$STR_SESSION_NAME));
				
		if($archivo_session==null) {
			$archivo_session=new archivo_session();
		}
		
		$this->strStyleDivArbol=$archivo_session->strStyleDivArbol;	
		$this->strStyleDivContent=$archivo_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$archivo_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$archivo_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$archivo_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$archivo_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$archivo_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$archivo_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$archivo_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$archivo_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$archivo_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeimagen=$archivo_control_session->strMensajeimagen;
		$this->strMensajenombre=$archivo_control_session->strMensajenombre;
		$this->strMensajedescripcion=$archivo_control_session->strMensajedescripcion;
		$this->strMensajearchivo=$archivo_control_session->strMensajearchivo;
			
		
		
		
		
		
		$this->strTienePermisosotro_documento=$archivo_control_session->strTienePermisosotro_documento;
		
		

		
		
		
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
	
	public function getarchivoControllerAdditional() {
		return $this->archivoControllerAdditional;
	}

	public function setarchivoControllerAdditional($archivoControllerAdditional) {
		$this->archivoControllerAdditional = $archivoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getarchivoActual() : archivo {
		return $this->archivoActual;
	}

	public function setarchivoActual(archivo $archivoActual) {
		$this->archivoActual = $archivoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidarchivo() : int {
		return $this->idarchivo;
	}

	public function setidarchivo(int $idarchivo) {
		$this->idarchivo = $idarchivo;
	}
	
	public function getarchivo() : archivo {
		return $this->archivo;
	}

	public function setarchivo(archivo $archivo) {
		$this->archivo = $archivo;
	}
		
	public function getarchivoLogic() : archivo_logic {		
		return $this->archivoLogic;
	}

	public function setarchivoLogic(archivo_logic $archivoLogic) {
		$this->archivoLogic = $archivoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getarchivosModel() {		
		try {						
			/*archivosModel.setWrappedData(archivoLogic->getarchivos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->archivosModel;
	}
	
	public function setarchivosModel($archivosModel) {
		$this->archivosModel = $archivosModel;
	}
	
	public function getarchivos() : array {		
		return $this->archivos;
	}
	
	public function setarchivos(array $archivos) {
		$this->archivos= $archivos;
	}
	
	public function getarchivosEliminados() : array {		
		return $this->archivosEliminados;
	}
	
	public function setarchivosEliminados(array $archivosEliminados) {
		$this->archivosEliminados= $archivosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getarchivoActualFromListDataModel() {
		try {
			/*$archivoClase= $this->archivosModel->getRowData();*/
			
			/*return $archivo;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
