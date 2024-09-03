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

namespace com\bydan\contabilidad\general\otro_documento\presentation\control;

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

use com\bydan\contabilidad\general\otro_documento\business\entity\otro_documento;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/otro_documento/util/otro_documento_carga.php');
use com\bydan\contabilidad\general\otro_documento\util\otro_documento_carga;

use com\bydan\contabilidad\general\otro_documento\util\otro_documento_util;
use com\bydan\contabilidad\general\otro_documento\util\otro_documento_param_return;
use com\bydan\contabilidad\general\otro_documento\business\logic\otro_documento_logic;
use com\bydan\contabilidad\general\otro_documento\presentation\session\otro_documento_session;


//FK


use com\bydan\contabilidad\general\archivo\business\entity\archivo;
use com\bydan\contabilidad\general\archivo\business\logic\archivo_logic;
use com\bydan\contabilidad\general\archivo\util\archivo_carga;
use com\bydan\contabilidad\general\archivo\util\archivo_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
otro_documento_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
otro_documento_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
otro_documento_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
otro_documento_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*otro_documento_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class otro_documento_init_control extends ControllerBase {	
	
	public $otro_documentoClase=null;	
	public $otro_documentosModel=null;	
	public $otro_documentosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idotro_documento=0;	
	public ?int $idotro_documentoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $otro_documentoLogic=null;
	
	public $otro_documentoActual=null;	
	
	public $otro_documento=null;
	public $otro_documentos=null;
	public $otro_documentosEliminados=array();
	public $otro_documentosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $otro_documentosLocal=array();
	public ?array $otro_documentosReporte=null;
	public ?array $otro_documentosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadotro_documento='onload';
	public string $strTipoPaginaAuxiliarotro_documento='none';
	public string $strTipoUsuarioAuxiliarotro_documento='none';
		
	public $otro_documentoReturnGeneral=null;
	public $otro_documentoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $otro_documentoModel=null;
	public $otro_documentoControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_archivo='';
	public string $strMensajenombre='';
	public string $strMensajedata='';
	public string $strMensajecampo1='';
	public string $strMensajecampo2='';
	public string $strMensajecampo3='';
	
	
	public string $strVisibleFK_Idarchivo='display:table-row';

	
	public array $archivosFK=array();

	public function getarchivosFK():array {
		return $this->archivosFK;
	}

	public function setarchivosFK(array $archivosFK) {
		$this->archivosFK = $archivosFK;
	}

	public int $idarchivoDefaultFK=-1;

	public function getIdarchivoDefaultFK():int {
		return $this->idarchivoDefaultFK;
	}

	public function setIdarchivoDefaultFK(int $idarchivoDefaultFK) {
		$this->idarchivoDefaultFK = $idarchivoDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_archivoFK_Idarchivo=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->otro_documentoLogic==null) {
				$this->otro_documentoLogic=new otro_documento_logic();
			}
			
		} else {
			if($this->otro_documentoLogic==null) {
				$this->otro_documentoLogic=new otro_documento_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->otro_documentoClase==null) {
				$this->otro_documentoClase=new otro_documento();
			}
			
			$this->otro_documentoClase->setId(0);	
				
				
			$this->otro_documentoClase->setid_archivo(-1);	
			$this->otro_documentoClase->setnombre('');	
			$this->otro_documentoClase->setdata('');	
			$this->otro_documentoClase->setcampo1('');	
			$this->otro_documentoClase->setcampo2(0.0);	
			$this->otro_documentoClase->setcampo3('');	
			
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
		$this->prepararEjecutarMantenimientoBase('otro_documento');
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
		$this->cargarParametrosReporteBase('otro_documento');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('otro_documento');
	}
	
	public function actualizarControllerConReturnGeneral(otro_documento_param_return $otro_documentoReturnGeneral) {
		if($otro_documentoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesotro_documentosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$otro_documentoReturnGeneral->getsMensajeProceso();
		}
		
		if($otro_documentoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$otro_documentoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($otro_documentoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$otro_documentoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$otro_documentoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($otro_documentoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($otro_documentoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$otro_documentoReturnGeneral->getsFuncionJs();
		}
		
		if($otro_documentoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(otro_documento_session $otro_documento_session){
		$this->strStyleDivArbol=$otro_documento_session->strStyleDivArbol;	
		$this->strStyleDivContent=$otro_documento_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$otro_documento_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$otro_documento_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$otro_documento_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$otro_documento_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$otro_documento_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(otro_documento_session $otro_documento_session){
		$otro_documento_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$otro_documento_session->strStyleDivHeader='display:none';			
		$otro_documento_session->strStyleDivContent='width:93%;height:100%';	
		$otro_documento_session->strStyleDivOpcionesBanner='display:none';	
		$otro_documento_session->strStyleDivExpandirColapsar='display:none';	
		$otro_documento_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(otro_documento_control $otro_documento_control_session){
		$this->idNuevo=$otro_documento_control_session->idNuevo;
		$this->otro_documentoActual=$otro_documento_control_session->otro_documentoActual;
		$this->otro_documento=$otro_documento_control_session->otro_documento;
		$this->otro_documentoClase=$otro_documento_control_session->otro_documentoClase;
		$this->otro_documentos=$otro_documento_control_session->otro_documentos;
		$this->otro_documentosEliminados=$otro_documento_control_session->otro_documentosEliminados;
		$this->otro_documento=$otro_documento_control_session->otro_documento;
		$this->otro_documentosReporte=$otro_documento_control_session->otro_documentosReporte;
		$this->otro_documentosSeleccionados=$otro_documento_control_session->otro_documentosSeleccionados;
		$this->arrOrderBy=$otro_documento_control_session->arrOrderBy;
		$this->arrOrderByRel=$otro_documento_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$otro_documento_control_session->arrHistoryWebs;
		$this->arrSessionBases=$otro_documento_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadotro_documento=$otro_documento_control_session->strTypeOnLoadotro_documento;
		$this->strTipoPaginaAuxiliarotro_documento=$otro_documento_control_session->strTipoPaginaAuxiliarotro_documento;
		$this->strTipoUsuarioAuxiliarotro_documento=$otro_documento_control_session->strTipoUsuarioAuxiliarotro_documento;	
		
		$this->bitEsPopup=$otro_documento_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$otro_documento_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$otro_documento_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$otro_documento_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$otro_documento_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$otro_documento_control_session->strSufijo;
		$this->bitEsRelaciones=$otro_documento_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$otro_documento_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$otro_documento_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$otro_documento_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$otro_documento_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$otro_documento_control_session->strTituloTabla;
		$this->strTituloPathPagina=$otro_documento_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$otro_documento_control_session->strTituloPathElementoActual;
		
		if($this->otro_documentoLogic==null) {			
			$this->otro_documentoLogic=new otro_documento_logic();
		}
		
		
		if($this->otro_documentoClase==null) {
			$this->otro_documentoClase=new otro_documento();	
		}
		
		$this->otro_documentoLogic->setotro_documento($this->otro_documentoClase);
		
		
		if($this->otro_documentos==null) {
			$this->otro_documentos=array();	
		}
		
		$this->otro_documentoLogic->setotro_documentos($this->otro_documentos);
		
		
		$this->strTipoView=$otro_documento_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$otro_documento_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$otro_documento_control_session->datosCliente;
		$this->strAccionBusqueda=$otro_documento_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$otro_documento_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$otro_documento_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$otro_documento_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$otro_documento_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$otro_documento_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$otro_documento_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$otro_documento_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$otro_documento_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$otro_documento_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$otro_documento_control_session->strTipoPaginacion;
		$this->strTipoAccion=$otro_documento_control_session->strTipoAccion;
		$this->tiposReportes=$otro_documento_control_session->tiposReportes;
		$this->tiposReporte=$otro_documento_control_session->tiposReporte;
		$this->tiposAcciones=$otro_documento_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$otro_documento_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$otro_documento_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$otro_documento_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$otro_documento_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$otro_documento_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$otro_documento_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$otro_documento_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$otro_documento_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$otro_documento_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$otro_documento_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$otro_documento_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$otro_documento_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$otro_documento_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$otro_documento_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$otro_documento_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$otro_documento_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$otro_documento_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$otro_documento_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$otro_documento_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$otro_documento_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$otro_documento_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$otro_documento_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$otro_documento_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$otro_documento_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$otro_documento_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$otro_documento_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$otro_documento_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$otro_documento_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$otro_documento_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$otro_documento_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$otro_documento_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$otro_documento_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$otro_documento_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$otro_documento_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$otro_documento_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$otro_documento_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$otro_documento_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$otro_documento_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$otro_documento_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$otro_documento_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$otro_documento_control_session->resumenUsuarioActual;	
		$this->moduloActual=$otro_documento_control_session->moduloActual;	
		$this->opcionActual=$otro_documento_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$otro_documento_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$otro_documento_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$otro_documento_session=unserialize($this->Session->read(otro_documento_util::$STR_SESSION_NAME));
				
		if($otro_documento_session==null) {
			$otro_documento_session=new otro_documento_session();
		}
		
		$this->strStyleDivArbol=$otro_documento_session->strStyleDivArbol;	
		$this->strStyleDivContent=$otro_documento_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$otro_documento_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$otro_documento_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$otro_documento_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$otro_documento_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$otro_documento_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$otro_documento_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$otro_documento_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$otro_documento_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$otro_documento_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_archivo=$otro_documento_control_session->strMensajeid_archivo;
		$this->strMensajenombre=$otro_documento_control_session->strMensajenombre;
		$this->strMensajedata=$otro_documento_control_session->strMensajedata;
		$this->strMensajecampo1=$otro_documento_control_session->strMensajecampo1;
		$this->strMensajecampo2=$otro_documento_control_session->strMensajecampo2;
		$this->strMensajecampo3=$otro_documento_control_session->strMensajecampo3;
			
		
		$this->archivosFK=$otro_documento_control_session->archivosFK;
		$this->idarchivoDefaultFK=$otro_documento_control_session->idarchivoDefaultFK;
		
		
		$this->strVisibleFK_Idarchivo=$otro_documento_control_session->strVisibleFK_Idarchivo;
		
		
		
		
		$this->id_archivoFK_Idarchivo=$otro_documento_control_session->id_archivoFK_Idarchivo;

		
		
		
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
	
	public function getotro_documentoControllerAdditional() {
		return $this->otro_documentoControllerAdditional;
	}

	public function setotro_documentoControllerAdditional($otro_documentoControllerAdditional) {
		$this->otro_documentoControllerAdditional = $otro_documentoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getotro_documentoActual() : otro_documento {
		return $this->otro_documentoActual;
	}

	public function setotro_documentoActual(otro_documento $otro_documentoActual) {
		$this->otro_documentoActual = $otro_documentoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidotro_documento() : int {
		return $this->idotro_documento;
	}

	public function setidotro_documento(int $idotro_documento) {
		$this->idotro_documento = $idotro_documento;
	}
	
	public function getotro_documento() : otro_documento {
		return $this->otro_documento;
	}

	public function setotro_documento(otro_documento $otro_documento) {
		$this->otro_documento = $otro_documento;
	}
		
	public function getotro_documentoLogic() : otro_documento_logic {		
		return $this->otro_documentoLogic;
	}

	public function setotro_documentoLogic(otro_documento_logic $otro_documentoLogic) {
		$this->otro_documentoLogic = $otro_documentoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getotro_documentosModel() {		
		try {						
			/*otro_documentosModel.setWrappedData(otro_documentoLogic->getotro_documentos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->otro_documentosModel;
	}
	
	public function setotro_documentosModel($otro_documentosModel) {
		$this->otro_documentosModel = $otro_documentosModel;
	}
	
	public function getotro_documentos() : array {		
		return $this->otro_documentos;
	}
	
	public function setotro_documentos(array $otro_documentos) {
		$this->otro_documentos= $otro_documentos;
	}
	
	public function getotro_documentosEliminados() : array {		
		return $this->otro_documentosEliminados;
	}
	
	public function setotro_documentosEliminados(array $otro_documentosEliminados) {
		$this->otro_documentosEliminados= $otro_documentosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getotro_documentoActualFromListDataModel() {
		try {
			/*$otro_documentoClase= $this->otro_documentosModel->getRowData();*/
			
			/*return $otro_documento;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
