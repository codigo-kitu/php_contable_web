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

namespace com\bydan\contabilidad\cuentaspagar\imagen_proveedor\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\business\entity\imagen_proveedor;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/imagen_proveedor/util/imagen_proveedor_carga.php');
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util\imagen_proveedor_carga;

use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util\imagen_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\util\imagen_proveedor_param_return;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\business\logic\imagen_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\imagen_proveedor\presentation\session\imagen_proveedor_session;


//FK


use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
imagen_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
imagen_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
imagen_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
imagen_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*imagen_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class imagen_proveedor_init_control extends ControllerBase {	
	
	public $imagen_proveedorClase=null;	
	public $imagen_proveedorsModel=null;	
	public $imagen_proveedorsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idimagen_proveedor=0;	
	public ?int $idimagen_proveedorActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $imagen_proveedorLogic=null;
	
	public $imagen_proveedorActual=null;	
	
	public $imagen_proveedor=null;
	public $imagen_proveedors=null;
	public $imagen_proveedorsEliminados=array();
	public $imagen_proveedorsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $imagen_proveedorsLocal=array();
	public ?array $imagen_proveedorsReporte=null;
	public ?array $imagen_proveedorsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadimagen_proveedor='onload';
	public string $strTipoPaginaAuxiliarimagen_proveedor='none';
	public string $strTipoUsuarioAuxiliarimagen_proveedor='none';
		
	public $imagen_proveedorReturnGeneral=null;
	public $imagen_proveedorParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $imagen_proveedorModel=null;
	public $imagen_proveedorControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_proveedor='';
	public string $strMensajeimagen='';
	
	
	public string $strVisibleFK_Idproveedor='display:table-row';

	
	public array $proveedorsFK=array();

	public function getproveedorsFK():array {
		return $this->proveedorsFK;
	}

	public function setproveedorsFK(array $proveedorsFK) {
		$this->proveedorsFK = $proveedorsFK;
	}

	public int $idproveedorDefaultFK=-1;

	public function getIdproveedorDefaultFK():int {
		return $this->idproveedorDefaultFK;
	}

	public function setIdproveedorDefaultFK(int $idproveedorDefaultFK) {
		$this->idproveedorDefaultFK = $idproveedorDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_proveedorFK_Idproveedor=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->imagen_proveedorLogic==null) {
				$this->imagen_proveedorLogic=new imagen_proveedor_logic();
			}
			
		} else {
			if($this->imagen_proveedorLogic==null) {
				$this->imagen_proveedorLogic=new imagen_proveedor_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->imagen_proveedorClase==null) {
				$this->imagen_proveedorClase=new imagen_proveedor();
			}
			
			$this->imagen_proveedorClase->setId(0);	
				
				
			$this->imagen_proveedorClase->setid_proveedor(-1);	
			$this->imagen_proveedorClase->setimagen('');	
			
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
		$this->prepararEjecutarMantenimientoBase('imagen_proveedor');
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
		$this->cargarParametrosReporteBase('imagen_proveedor');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('imagen_proveedor');
	}
	
	public function actualizarControllerConReturnGeneral(imagen_proveedor_param_return $imagen_proveedorReturnGeneral) {
		if($imagen_proveedorReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesimagen_proveedorsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$imagen_proveedorReturnGeneral->getsMensajeProceso();
		}
		
		if($imagen_proveedorReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$imagen_proveedorReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($imagen_proveedorReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$imagen_proveedorReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$imagen_proveedorReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($imagen_proveedorReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($imagen_proveedorReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$imagen_proveedorReturnGeneral->getsFuncionJs();
		}
		
		if($imagen_proveedorReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(imagen_proveedor_session $imagen_proveedor_session){
		$this->strStyleDivArbol=$imagen_proveedor_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_proveedor_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_proveedor_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_proveedor_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_proveedor_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_proveedor_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$imagen_proveedor_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(imagen_proveedor_session $imagen_proveedor_session){
		$imagen_proveedor_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$imagen_proveedor_session->strStyleDivHeader='display:none';			
		$imagen_proveedor_session->strStyleDivContent='width:93%;height:100%';	
		$imagen_proveedor_session->strStyleDivOpcionesBanner='display:none';	
		$imagen_proveedor_session->strStyleDivExpandirColapsar='display:none';	
		$imagen_proveedor_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(imagen_proveedor_control $imagen_proveedor_control_session){
		$this->idNuevo=$imagen_proveedor_control_session->idNuevo;
		$this->imagen_proveedorActual=$imagen_proveedor_control_session->imagen_proveedorActual;
		$this->imagen_proveedor=$imagen_proveedor_control_session->imagen_proveedor;
		$this->imagen_proveedorClase=$imagen_proveedor_control_session->imagen_proveedorClase;
		$this->imagen_proveedors=$imagen_proveedor_control_session->imagen_proveedors;
		$this->imagen_proveedorsEliminados=$imagen_proveedor_control_session->imagen_proveedorsEliminados;
		$this->imagen_proveedor=$imagen_proveedor_control_session->imagen_proveedor;
		$this->imagen_proveedorsReporte=$imagen_proveedor_control_session->imagen_proveedorsReporte;
		$this->imagen_proveedorsSeleccionados=$imagen_proveedor_control_session->imagen_proveedorsSeleccionados;
		$this->arrOrderBy=$imagen_proveedor_control_session->arrOrderBy;
		$this->arrOrderByRel=$imagen_proveedor_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$imagen_proveedor_control_session->arrHistoryWebs;
		$this->arrSessionBases=$imagen_proveedor_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadimagen_proveedor=$imagen_proveedor_control_session->strTypeOnLoadimagen_proveedor;
		$this->strTipoPaginaAuxiliarimagen_proveedor=$imagen_proveedor_control_session->strTipoPaginaAuxiliarimagen_proveedor;
		$this->strTipoUsuarioAuxiliarimagen_proveedor=$imagen_proveedor_control_session->strTipoUsuarioAuxiliarimagen_proveedor;	
		
		$this->bitEsPopup=$imagen_proveedor_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$imagen_proveedor_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$imagen_proveedor_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$imagen_proveedor_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$imagen_proveedor_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$imagen_proveedor_control_session->strSufijo;
		$this->bitEsRelaciones=$imagen_proveedor_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$imagen_proveedor_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$imagen_proveedor_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$imagen_proveedor_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$imagen_proveedor_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$imagen_proveedor_control_session->strTituloTabla;
		$this->strTituloPathPagina=$imagen_proveedor_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$imagen_proveedor_control_session->strTituloPathElementoActual;
		
		if($this->imagen_proveedorLogic==null) {			
			$this->imagen_proveedorLogic=new imagen_proveedor_logic();
		}
		
		
		if($this->imagen_proveedorClase==null) {
			$this->imagen_proveedorClase=new imagen_proveedor();	
		}
		
		$this->imagen_proveedorLogic->setimagen_proveedor($this->imagen_proveedorClase);
		
		
		if($this->imagen_proveedors==null) {
			$this->imagen_proveedors=array();	
		}
		
		$this->imagen_proveedorLogic->setimagen_proveedors($this->imagen_proveedors);
		
		
		$this->strTipoView=$imagen_proveedor_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$imagen_proveedor_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$imagen_proveedor_control_session->datosCliente;
		$this->strAccionBusqueda=$imagen_proveedor_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$imagen_proveedor_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$imagen_proveedor_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$imagen_proveedor_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$imagen_proveedor_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$imagen_proveedor_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$imagen_proveedor_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$imagen_proveedor_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$imagen_proveedor_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$imagen_proveedor_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$imagen_proveedor_control_session->strTipoPaginacion;
		$this->strTipoAccion=$imagen_proveedor_control_session->strTipoAccion;
		$this->tiposReportes=$imagen_proveedor_control_session->tiposReportes;
		$this->tiposReporte=$imagen_proveedor_control_session->tiposReporte;
		$this->tiposAcciones=$imagen_proveedor_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$imagen_proveedor_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$imagen_proveedor_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$imagen_proveedor_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$imagen_proveedor_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$imagen_proveedor_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$imagen_proveedor_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$imagen_proveedor_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$imagen_proveedor_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$imagen_proveedor_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$imagen_proveedor_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$imagen_proveedor_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$imagen_proveedor_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$imagen_proveedor_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$imagen_proveedor_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$imagen_proveedor_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$imagen_proveedor_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$imagen_proveedor_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$imagen_proveedor_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$imagen_proveedor_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$imagen_proveedor_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$imagen_proveedor_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$imagen_proveedor_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$imagen_proveedor_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$imagen_proveedor_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$imagen_proveedor_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$imagen_proveedor_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$imagen_proveedor_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$imagen_proveedor_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$imagen_proveedor_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$imagen_proveedor_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$imagen_proveedor_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$imagen_proveedor_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$imagen_proveedor_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$imagen_proveedor_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$imagen_proveedor_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$imagen_proveedor_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$imagen_proveedor_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$imagen_proveedor_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$imagen_proveedor_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$imagen_proveedor_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$imagen_proveedor_control_session->resumenUsuarioActual;	
		$this->moduloActual=$imagen_proveedor_control_session->moduloActual;	
		$this->opcionActual=$imagen_proveedor_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$imagen_proveedor_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$imagen_proveedor_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$imagen_proveedor_session=unserialize($this->Session->read(imagen_proveedor_util::$STR_SESSION_NAME));
				
		if($imagen_proveedor_session==null) {
			$imagen_proveedor_session=new imagen_proveedor_session();
		}
		
		$this->strStyleDivArbol=$imagen_proveedor_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_proveedor_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_proveedor_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_proveedor_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_proveedor_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_proveedor_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$imagen_proveedor_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$imagen_proveedor_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$imagen_proveedor_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$imagen_proveedor_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$imagen_proveedor_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_proveedor=$imagen_proveedor_control_session->strMensajeid_proveedor;
		$this->strMensajeimagen=$imagen_proveedor_control_session->strMensajeimagen;
			
		
		$this->proveedorsFK=$imagen_proveedor_control_session->proveedorsFK;
		$this->idproveedorDefaultFK=$imagen_proveedor_control_session->idproveedorDefaultFK;
		
		
		$this->strVisibleFK_Idproveedor=$imagen_proveedor_control_session->strVisibleFK_Idproveedor;
		
		
		
		
		$this->id_proveedorFK_Idproveedor=$imagen_proveedor_control_session->id_proveedorFK_Idproveedor;

		
		
		
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
	
	public function getimagen_proveedorControllerAdditional() {
		return $this->imagen_proveedorControllerAdditional;
	}

	public function setimagen_proveedorControllerAdditional($imagen_proveedorControllerAdditional) {
		$this->imagen_proveedorControllerAdditional = $imagen_proveedorControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getimagen_proveedorActual() : imagen_proveedor {
		return $this->imagen_proveedorActual;
	}

	public function setimagen_proveedorActual(imagen_proveedor $imagen_proveedorActual) {
		$this->imagen_proveedorActual = $imagen_proveedorActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidimagen_proveedor() : int {
		return $this->idimagen_proveedor;
	}

	public function setidimagen_proveedor(int $idimagen_proveedor) {
		$this->idimagen_proveedor = $idimagen_proveedor;
	}
	
	public function getimagen_proveedor() : imagen_proveedor {
		return $this->imagen_proveedor;
	}

	public function setimagen_proveedor(imagen_proveedor $imagen_proveedor) {
		$this->imagen_proveedor = $imagen_proveedor;
	}
		
	public function getimagen_proveedorLogic() : imagen_proveedor_logic {		
		return $this->imagen_proveedorLogic;
	}

	public function setimagen_proveedorLogic(imagen_proveedor_logic $imagen_proveedorLogic) {
		$this->imagen_proveedorLogic = $imagen_proveedorLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getimagen_proveedorsModel() {		
		try {						
			/*imagen_proveedorsModel.setWrappedData(imagen_proveedorLogic->getimagen_proveedors());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->imagen_proveedorsModel;
	}
	
	public function setimagen_proveedorsModel($imagen_proveedorsModel) {
		$this->imagen_proveedorsModel = $imagen_proveedorsModel;
	}
	
	public function getimagen_proveedors() : array {		
		return $this->imagen_proveedors;
	}
	
	public function setimagen_proveedors(array $imagen_proveedors) {
		$this->imagen_proveedors= $imagen_proveedors;
	}
	
	public function getimagen_proveedorsEliminados() : array {		
		return $this->imagen_proveedorsEliminados;
	}
	
	public function setimagen_proveedorsEliminados(array $imagen_proveedorsEliminados) {
		$this->imagen_proveedorsEliminados= $imagen_proveedorsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getimagen_proveedorActualFromListDataModel() {
		try {
			/*$imagen_proveedorClase= $this->imagen_proveedorsModel->getRowData();*/
			
			/*return $imagen_proveedor;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
