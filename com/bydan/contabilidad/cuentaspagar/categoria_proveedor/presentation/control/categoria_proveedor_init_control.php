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

namespace com\bydan\contabilidad\cuentaspagar\categoria_proveedor\presentation\control;

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

use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\entity\categoria_proveedor;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentaspagar/categoria_proveedor/util/categoria_proveedor_carga.php');
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util\categoria_proveedor_carga;

use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util\categoria_proveedor_util;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\util\categoria_proveedor_param_return;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\business\logic\categoria_proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\categoria_proveedor\presentation\session\categoria_proveedor_session;


//FK


//REL


use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;


/*CARGA ARCHIVOS FRAMEWORK*/
categoria_proveedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
categoria_proveedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
categoria_proveedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
categoria_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*categoria_proveedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class categoria_proveedor_init_control extends ControllerBase {	
	
	public $categoria_proveedorClase=null;	
	public $categoria_proveedorsModel=null;	
	public $categoria_proveedorsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcategoria_proveedor=0;	
	public ?int $idcategoria_proveedorActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $categoria_proveedorLogic=null;
	
	public $categoria_proveedorActual=null;	
	
	public $categoria_proveedor=null;
	public $categoria_proveedors=null;
	public $categoria_proveedorsEliminados=array();
	public $categoria_proveedorsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $categoria_proveedorsLocal=array();
	public ?array $categoria_proveedorsReporte=null;
	public ?array $categoria_proveedorsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcategoria_proveedor='onload';
	public string $strTipoPaginaAuxiliarcategoria_proveedor='none';
	public string $strTipoUsuarioAuxiliarcategoria_proveedor='none';
		
	public $categoria_proveedorReturnGeneral=null;
	public $categoria_proveedorParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $categoria_proveedorModel=null;
	public $categoria_proveedorControllerAdditional=null;
	
	
	

	public $proveedorLogic=null;

	public function  getproveedorLogic() {
		return $this->proveedorLogic;
	}

	public function setproveedorLogic($proveedorLogic) {
		$this->proveedorLogic =$proveedorLogic;
	}
 	
	
	public string $strMensajenombre='';
	public string $strMensajepredeterminado='';
	
	

	
	
	
	
	
	
	
	public $strTienePermisosproveedor='none';
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->categoria_proveedorLogic==null) {
				$this->categoria_proveedorLogic=new categoria_proveedor_logic();
			}
			
		} else {
			if($this->categoria_proveedorLogic==null) {
				$this->categoria_proveedorLogic=new categoria_proveedor_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->categoria_proveedorClase==null) {
				$this->categoria_proveedorClase=new categoria_proveedor();
			}
			
			$this->categoria_proveedorClase->setId(0);	
				
				
			$this->categoria_proveedorClase->setnombre('');	
			$this->categoria_proveedorClase->setpredeterminado(0);	
			
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
		$this->prepararEjecutarMantenimientoBase('categoria_proveedor');
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
		$this->cargarParametrosReporteBase('categoria_proveedor');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('categoria_proveedor');
	}
	
	public function actualizarControllerConReturnGeneral(categoria_proveedor_param_return $categoria_proveedorReturnGeneral) {
		if($categoria_proveedorReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescategoria_proveedorsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$categoria_proveedorReturnGeneral->getsMensajeProceso();
		}
		
		if($categoria_proveedorReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$categoria_proveedorReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($categoria_proveedorReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$categoria_proveedorReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$categoria_proveedorReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($categoria_proveedorReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($categoria_proveedorReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$categoria_proveedorReturnGeneral->getsFuncionJs();
		}
		
		if($categoria_proveedorReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(categoria_proveedor_session $categoria_proveedor_session){
		$this->strStyleDivArbol=$categoria_proveedor_session->strStyleDivArbol;	
		$this->strStyleDivContent=$categoria_proveedor_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$categoria_proveedor_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$categoria_proveedor_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$categoria_proveedor_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$categoria_proveedor_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$categoria_proveedor_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(categoria_proveedor_session $categoria_proveedor_session){
		$categoria_proveedor_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$categoria_proveedor_session->strStyleDivHeader='display:none';			
		$categoria_proveedor_session->strStyleDivContent='width:93%;height:100%';	
		$categoria_proveedor_session->strStyleDivOpcionesBanner='display:none';	
		$categoria_proveedor_session->strStyleDivExpandirColapsar='display:none';	
		$categoria_proveedor_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(categoria_proveedor_control $categoria_proveedor_control_session){
		$this->idNuevo=$categoria_proveedor_control_session->idNuevo;
		$this->categoria_proveedorActual=$categoria_proveedor_control_session->categoria_proveedorActual;
		$this->categoria_proveedor=$categoria_proveedor_control_session->categoria_proveedor;
		$this->categoria_proveedorClase=$categoria_proveedor_control_session->categoria_proveedorClase;
		$this->categoria_proveedors=$categoria_proveedor_control_session->categoria_proveedors;
		$this->categoria_proveedorsEliminados=$categoria_proveedor_control_session->categoria_proveedorsEliminados;
		$this->categoria_proveedor=$categoria_proveedor_control_session->categoria_proveedor;
		$this->categoria_proveedorsReporte=$categoria_proveedor_control_session->categoria_proveedorsReporte;
		$this->categoria_proveedorsSeleccionados=$categoria_proveedor_control_session->categoria_proveedorsSeleccionados;
		$this->arrOrderBy=$categoria_proveedor_control_session->arrOrderBy;
		$this->arrOrderByRel=$categoria_proveedor_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$categoria_proveedor_control_session->arrHistoryWebs;
		$this->arrSessionBases=$categoria_proveedor_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcategoria_proveedor=$categoria_proveedor_control_session->strTypeOnLoadcategoria_proveedor;
		$this->strTipoPaginaAuxiliarcategoria_proveedor=$categoria_proveedor_control_session->strTipoPaginaAuxiliarcategoria_proveedor;
		$this->strTipoUsuarioAuxiliarcategoria_proveedor=$categoria_proveedor_control_session->strTipoUsuarioAuxiliarcategoria_proveedor;	
		
		$this->bitEsPopup=$categoria_proveedor_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$categoria_proveedor_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$categoria_proveedor_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$categoria_proveedor_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$categoria_proveedor_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$categoria_proveedor_control_session->strSufijo;
		$this->bitEsRelaciones=$categoria_proveedor_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$categoria_proveedor_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$categoria_proveedor_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$categoria_proveedor_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$categoria_proveedor_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$categoria_proveedor_control_session->strTituloTabla;
		$this->strTituloPathPagina=$categoria_proveedor_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$categoria_proveedor_control_session->strTituloPathElementoActual;
		
		if($this->categoria_proveedorLogic==null) {			
			$this->categoria_proveedorLogic=new categoria_proveedor_logic();
		}
		
		
		if($this->categoria_proveedorClase==null) {
			$this->categoria_proveedorClase=new categoria_proveedor();	
		}
		
		$this->categoria_proveedorLogic->setcategoria_proveedor($this->categoria_proveedorClase);
		
		
		if($this->categoria_proveedors==null) {
			$this->categoria_proveedors=array();	
		}
		
		$this->categoria_proveedorLogic->setcategoria_proveedors($this->categoria_proveedors);
		
		
		$this->strTipoView=$categoria_proveedor_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$categoria_proveedor_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$categoria_proveedor_control_session->datosCliente;
		$this->strAccionBusqueda=$categoria_proveedor_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$categoria_proveedor_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$categoria_proveedor_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$categoria_proveedor_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$categoria_proveedor_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$categoria_proveedor_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$categoria_proveedor_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$categoria_proveedor_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$categoria_proveedor_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$categoria_proveedor_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$categoria_proveedor_control_session->strTipoPaginacion;
		$this->strTipoAccion=$categoria_proveedor_control_session->strTipoAccion;
		$this->tiposReportes=$categoria_proveedor_control_session->tiposReportes;
		$this->tiposReporte=$categoria_proveedor_control_session->tiposReporte;
		$this->tiposAcciones=$categoria_proveedor_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$categoria_proveedor_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$categoria_proveedor_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$categoria_proveedor_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$categoria_proveedor_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$categoria_proveedor_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$categoria_proveedor_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$categoria_proveedor_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$categoria_proveedor_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$categoria_proveedor_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$categoria_proveedor_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$categoria_proveedor_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$categoria_proveedor_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$categoria_proveedor_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$categoria_proveedor_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$categoria_proveedor_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$categoria_proveedor_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$categoria_proveedor_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$categoria_proveedor_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$categoria_proveedor_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$categoria_proveedor_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$categoria_proveedor_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$categoria_proveedor_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$categoria_proveedor_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$categoria_proveedor_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$categoria_proveedor_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$categoria_proveedor_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$categoria_proveedor_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$categoria_proveedor_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$categoria_proveedor_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$categoria_proveedor_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$categoria_proveedor_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$categoria_proveedor_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$categoria_proveedor_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$categoria_proveedor_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$categoria_proveedor_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$categoria_proveedor_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$categoria_proveedor_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$categoria_proveedor_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$categoria_proveedor_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$categoria_proveedor_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$categoria_proveedor_control_session->resumenUsuarioActual;	
		$this->moduloActual=$categoria_proveedor_control_session->moduloActual;	
		$this->opcionActual=$categoria_proveedor_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$categoria_proveedor_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$categoria_proveedor_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$categoria_proveedor_session=unserialize($this->Session->read(categoria_proveedor_util::$STR_SESSION_NAME));
				
		if($categoria_proveedor_session==null) {
			$categoria_proveedor_session=new categoria_proveedor_session();
		}
		
		$this->strStyleDivArbol=$categoria_proveedor_session->strStyleDivArbol;	
		$this->strStyleDivContent=$categoria_proveedor_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$categoria_proveedor_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$categoria_proveedor_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$categoria_proveedor_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$categoria_proveedor_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$categoria_proveedor_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$categoria_proveedor_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$categoria_proveedor_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$categoria_proveedor_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$categoria_proveedor_session->strRecargarFkQuery;
		*/
		
		$this->strMensajenombre=$categoria_proveedor_control_session->strMensajenombre;
		$this->strMensajepredeterminado=$categoria_proveedor_control_session->strMensajepredeterminado;
			
		
		
		
		
		
		$this->strTienePermisosproveedor=$categoria_proveedor_control_session->strTienePermisosproveedor;
		
		

		
		
		
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
	
	public function getcategoria_proveedorControllerAdditional() {
		return $this->categoria_proveedorControllerAdditional;
	}

	public function setcategoria_proveedorControllerAdditional($categoria_proveedorControllerAdditional) {
		$this->categoria_proveedorControllerAdditional = $categoria_proveedorControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcategoria_proveedorActual() : categoria_proveedor {
		return $this->categoria_proveedorActual;
	}

	public function setcategoria_proveedorActual(categoria_proveedor $categoria_proveedorActual) {
		$this->categoria_proveedorActual = $categoria_proveedorActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcategoria_proveedor() : int {
		return $this->idcategoria_proveedor;
	}

	public function setidcategoria_proveedor(int $idcategoria_proveedor) {
		$this->idcategoria_proveedor = $idcategoria_proveedor;
	}
	
	public function getcategoria_proveedor() : categoria_proveedor {
		return $this->categoria_proveedor;
	}

	public function setcategoria_proveedor(categoria_proveedor $categoria_proveedor) {
		$this->categoria_proveedor = $categoria_proveedor;
	}
		
	public function getcategoria_proveedorLogic() : categoria_proveedor_logic {		
		return $this->categoria_proveedorLogic;
	}

	public function setcategoria_proveedorLogic(categoria_proveedor_logic $categoria_proveedorLogic) {
		$this->categoria_proveedorLogic = $categoria_proveedorLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcategoria_proveedorsModel() {		
		try {						
			/*categoria_proveedorsModel.setWrappedData(categoria_proveedorLogic->getcategoria_proveedors());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->categoria_proveedorsModel;
	}
	
	public function setcategoria_proveedorsModel($categoria_proveedorsModel) {
		$this->categoria_proveedorsModel = $categoria_proveedorsModel;
	}
	
	public function getcategoria_proveedors() : array {		
		return $this->categoria_proveedors;
	}
	
	public function setcategoria_proveedors(array $categoria_proveedors) {
		$this->categoria_proveedors= $categoria_proveedors;
	}
	
	public function getcategoria_proveedorsEliminados() : array {		
		return $this->categoria_proveedorsEliminados;
	}
	
	public function setcategoria_proveedorsEliminados(array $categoria_proveedorsEliminados) {
		$this->categoria_proveedorsEliminados= $categoria_proveedorsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcategoria_proveedorActualFromListDataModel() {
		try {
			/*$categoria_proveedorClase= $this->categoria_proveedorsModel->getRowData();*/
			
			/*return $categoria_proveedor;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
