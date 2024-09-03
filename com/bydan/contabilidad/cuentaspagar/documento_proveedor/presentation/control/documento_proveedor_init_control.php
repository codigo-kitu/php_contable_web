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

namespace com\bydan\contabilidad\cuentaspagar\documento_proveedor\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\entity\documento_proveedor;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/documento_proveedor/util/documento_proveedor_carga.php');
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_carga;

use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\util\documento_proveedor_param_return;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\business\logic\documento_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\documento_proveedor\presentation\session\documento_proveedor_session;


//FK


use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

//REL


use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\util\documento_cliente_util;
use com\bydan\contabilidad\cuentascobrar\documento_cliente\presentation\session\documento_cliente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
documento_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
documento_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
documento_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
documento_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*documento_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class documento_proveedor_init_control extends ControllerBase {	
	
	public $documento_proveedorClase=null;	
	public $documento_proveedorsModel=null;	
	public $documento_proveedorsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $iddocumento_proveedor=0;	
	public ?int $iddocumento_proveedorActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $documento_proveedorLogic=null;
	
	public $documento_proveedorActual=null;	
	
	public $documento_proveedor=null;
	public $documento_proveedors=null;
	public $documento_proveedorsEliminados=array();
	public $documento_proveedorsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $documento_proveedorsLocal=array();
	public ?array $documento_proveedorsReporte=null;
	public ?array $documento_proveedorsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoaddocumento_proveedor='onload';
	public string $strTipoPaginaAuxiliardocumento_proveedor='none';
	public string $strTipoUsuarioAuxiliardocumento_proveedor='none';
		
	public $documento_proveedorReturnGeneral=null;
	public $documento_proveedorParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $documento_proveedorModel=null;
	public $documento_proveedorControllerAdditional=null;
	
	
	

	public $documentoclienteLogic=null;

	public function  getdocumento_clienteLogic() {
		return $this->documentoclienteLogic;
	}

	public function setdocumento_clienteLogic($documentoclienteLogic) {
		$this->documentoclienteLogic =$documentoclienteLogic;
	}
 	
	
	public string $strMensajeid_proveedor='';
	public string $strMensajedocumento='';
	
	
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

	
	
	
	
	
	
	public $strTienePermisosdocumento_cliente='none';
	
	
	public  $id_proveedorFK_Idproveedor=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->documento_proveedorLogic==null) {
				$this->documento_proveedorLogic=new documento_proveedor_logic();
			}
			
		} else {
			if($this->documento_proveedorLogic==null) {
				$this->documento_proveedorLogic=new documento_proveedor_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->documento_proveedorClase==null) {
				$this->documento_proveedorClase=new documento_proveedor();
			}
			
			$this->documento_proveedorClase->setId(0);	
				
				
			$this->documento_proveedorClase->setid_proveedor(-1);	
			$this->documento_proveedorClase->setdocumento('');	
			
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
		$this->prepararEjecutarMantenimientoBase('documento_proveedor');
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
		$this->cargarParametrosReporteBase('documento_proveedor');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('documento_proveedor');
	}
	
	public function actualizarControllerConReturnGeneral(documento_proveedor_param_return $documento_proveedorReturnGeneral) {
		if($documento_proveedorReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesdocumento_proveedorsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$documento_proveedorReturnGeneral->getsMensajeProceso();
		}
		
		if($documento_proveedorReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$documento_proveedorReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($documento_proveedorReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$documento_proveedorReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$documento_proveedorReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($documento_proveedorReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($documento_proveedorReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$documento_proveedorReturnGeneral->getsFuncionJs();
		}
		
		if($documento_proveedorReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(documento_proveedor_session $documento_proveedor_session){
		$this->strStyleDivArbol=$documento_proveedor_session->strStyleDivArbol;	
		$this->strStyleDivContent=$documento_proveedor_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$documento_proveedor_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$documento_proveedor_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$documento_proveedor_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$documento_proveedor_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$documento_proveedor_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(documento_proveedor_session $documento_proveedor_session){
		$documento_proveedor_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$documento_proveedor_session->strStyleDivHeader='display:none';			
		$documento_proveedor_session->strStyleDivContent='width:93%;height:100%';	
		$documento_proveedor_session->strStyleDivOpcionesBanner='display:none';	
		$documento_proveedor_session->strStyleDivExpandirColapsar='display:none';	
		$documento_proveedor_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(documento_proveedor_control $documento_proveedor_control_session){
		$this->idNuevo=$documento_proveedor_control_session->idNuevo;
		$this->documento_proveedorActual=$documento_proveedor_control_session->documento_proveedorActual;
		$this->documento_proveedor=$documento_proveedor_control_session->documento_proveedor;
		$this->documento_proveedorClase=$documento_proveedor_control_session->documento_proveedorClase;
		$this->documento_proveedors=$documento_proveedor_control_session->documento_proveedors;
		$this->documento_proveedorsEliminados=$documento_proveedor_control_session->documento_proveedorsEliminados;
		$this->documento_proveedor=$documento_proveedor_control_session->documento_proveedor;
		$this->documento_proveedorsReporte=$documento_proveedor_control_session->documento_proveedorsReporte;
		$this->documento_proveedorsSeleccionados=$documento_proveedor_control_session->documento_proveedorsSeleccionados;
		$this->arrOrderBy=$documento_proveedor_control_session->arrOrderBy;
		$this->arrOrderByRel=$documento_proveedor_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$documento_proveedor_control_session->arrHistoryWebs;
		$this->arrSessionBases=$documento_proveedor_control_session->arrSessionBases;		
		
		$this->strTypeOnLoaddocumento_proveedor=$documento_proveedor_control_session->strTypeOnLoaddocumento_proveedor;
		$this->strTipoPaginaAuxiliardocumento_proveedor=$documento_proveedor_control_session->strTipoPaginaAuxiliardocumento_proveedor;
		$this->strTipoUsuarioAuxiliardocumento_proveedor=$documento_proveedor_control_session->strTipoUsuarioAuxiliardocumento_proveedor;	
		
		$this->bitEsPopup=$documento_proveedor_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$documento_proveedor_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$documento_proveedor_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$documento_proveedor_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$documento_proveedor_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$documento_proveedor_control_session->strSufijo;
		$this->bitEsRelaciones=$documento_proveedor_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$documento_proveedor_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$documento_proveedor_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$documento_proveedor_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$documento_proveedor_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$documento_proveedor_control_session->strTituloTabla;
		$this->strTituloPathPagina=$documento_proveedor_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$documento_proveedor_control_session->strTituloPathElementoActual;
		
		if($this->documento_proveedorLogic==null) {			
			$this->documento_proveedorLogic=new documento_proveedor_logic();
		}
		
		
		if($this->documento_proveedorClase==null) {
			$this->documento_proveedorClase=new documento_proveedor();	
		}
		
		$this->documento_proveedorLogic->setdocumento_proveedor($this->documento_proveedorClase);
		
		
		if($this->documento_proveedors==null) {
			$this->documento_proveedors=array();	
		}
		
		$this->documento_proveedorLogic->setdocumento_proveedors($this->documento_proveedors);
		
		
		$this->strTipoView=$documento_proveedor_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$documento_proveedor_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$documento_proveedor_control_session->datosCliente;
		$this->strAccionBusqueda=$documento_proveedor_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$documento_proveedor_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$documento_proveedor_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$documento_proveedor_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$documento_proveedor_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$documento_proveedor_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$documento_proveedor_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$documento_proveedor_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$documento_proveedor_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$documento_proveedor_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$documento_proveedor_control_session->strTipoPaginacion;
		$this->strTipoAccion=$documento_proveedor_control_session->strTipoAccion;
		$this->tiposReportes=$documento_proveedor_control_session->tiposReportes;
		$this->tiposReporte=$documento_proveedor_control_session->tiposReporte;
		$this->tiposAcciones=$documento_proveedor_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$documento_proveedor_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$documento_proveedor_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$documento_proveedor_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$documento_proveedor_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$documento_proveedor_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$documento_proveedor_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$documento_proveedor_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$documento_proveedor_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$documento_proveedor_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$documento_proveedor_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$documento_proveedor_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$documento_proveedor_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$documento_proveedor_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$documento_proveedor_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$documento_proveedor_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$documento_proveedor_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$documento_proveedor_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$documento_proveedor_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$documento_proveedor_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$documento_proveedor_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$documento_proveedor_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$documento_proveedor_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$documento_proveedor_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$documento_proveedor_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$documento_proveedor_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$documento_proveedor_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$documento_proveedor_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$documento_proveedor_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$documento_proveedor_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$documento_proveedor_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$documento_proveedor_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$documento_proveedor_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$documento_proveedor_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$documento_proveedor_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$documento_proveedor_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$documento_proveedor_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$documento_proveedor_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$documento_proveedor_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$documento_proveedor_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$documento_proveedor_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$documento_proveedor_control_session->resumenUsuarioActual;	
		$this->moduloActual=$documento_proveedor_control_session->moduloActual;	
		$this->opcionActual=$documento_proveedor_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$documento_proveedor_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$documento_proveedor_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$documento_proveedor_session=unserialize($this->Session->read(documento_proveedor_util::$STR_SESSION_NAME));
				
		if($documento_proveedor_session==null) {
			$documento_proveedor_session=new documento_proveedor_session();
		}
		
		$this->strStyleDivArbol=$documento_proveedor_session->strStyleDivArbol;	
		$this->strStyleDivContent=$documento_proveedor_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$documento_proveedor_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$documento_proveedor_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$documento_proveedor_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$documento_proveedor_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$documento_proveedor_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$documento_proveedor_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$documento_proveedor_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$documento_proveedor_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$documento_proveedor_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_proveedor=$documento_proveedor_control_session->strMensajeid_proveedor;
		$this->strMensajedocumento=$documento_proveedor_control_session->strMensajedocumento;
			
		
		$this->proveedorsFK=$documento_proveedor_control_session->proveedorsFK;
		$this->idproveedorDefaultFK=$documento_proveedor_control_session->idproveedorDefaultFK;
		
		
		$this->strVisibleFK_Idproveedor=$documento_proveedor_control_session->strVisibleFK_Idproveedor;
		
		
		$this->strTienePermisosdocumento_cliente=$documento_proveedor_control_session->strTienePermisosdocumento_cliente;
		
		
		$this->id_proveedorFK_Idproveedor=$documento_proveedor_control_session->id_proveedorFK_Idproveedor;

		
		
		
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
	
	public function getdocumento_proveedorControllerAdditional() {
		return $this->documento_proveedorControllerAdditional;
	}

	public function setdocumento_proveedorControllerAdditional($documento_proveedorControllerAdditional) {
		$this->documento_proveedorControllerAdditional = $documento_proveedorControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getdocumento_proveedorActual() : documento_proveedor {
		return $this->documento_proveedorActual;
	}

	public function setdocumento_proveedorActual(documento_proveedor $documento_proveedorActual) {
		$this->documento_proveedorActual = $documento_proveedorActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getiddocumento_proveedor() : int {
		return $this->iddocumento_proveedor;
	}

	public function setiddocumento_proveedor(int $iddocumento_proveedor) {
		$this->iddocumento_proveedor = $iddocumento_proveedor;
	}
	
	public function getdocumento_proveedor() : documento_proveedor {
		return $this->documento_proveedor;
	}

	public function setdocumento_proveedor(documento_proveedor $documento_proveedor) {
		$this->documento_proveedor = $documento_proveedor;
	}
		
	public function getdocumento_proveedorLogic() : documento_proveedor_logic {		
		return $this->documento_proveedorLogic;
	}

	public function setdocumento_proveedorLogic(documento_proveedor_logic $documento_proveedorLogic) {
		$this->documento_proveedorLogic = $documento_proveedorLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getdocumento_proveedorsModel() {		
		try {						
			/*documento_proveedorsModel.setWrappedData(documento_proveedorLogic->getdocumento_proveedors());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->documento_proveedorsModel;
	}
	
	public function setdocumento_proveedorsModel($documento_proveedorsModel) {
		$this->documento_proveedorsModel = $documento_proveedorsModel;
	}
	
	public function getdocumento_proveedors() : array {		
		return $this->documento_proveedors;
	}
	
	public function setdocumento_proveedors(array $documento_proveedors) {
		$this->documento_proveedors= $documento_proveedors;
	}
	
	public function getdocumento_proveedorsEliminados() : array {		
		return $this->documento_proveedorsEliminados;
	}
	
	public function setdocumento_proveedorsEliminados(array $documento_proveedorsEliminados) {
		$this->documento_proveedorsEliminados= $documento_proveedorsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getdocumento_proveedorActualFromListDataModel() {
		try {
			/*$documento_proveedorClase= $this->documento_proveedorsModel->getRowData();*/
			
			/*return $documento_proveedor;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
