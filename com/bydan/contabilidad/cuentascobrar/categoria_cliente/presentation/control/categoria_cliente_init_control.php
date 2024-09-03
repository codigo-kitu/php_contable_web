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

namespace com\bydan\contabilidad\cuentascobrar\categoria_cliente\presentation\control;

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

use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\entity\categoria_cliente;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascobrar/categoria_cliente/util/categoria_cliente_carga.php');
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\util\categoria_cliente_carga;

use com\bydan\contabilidad\cuentascobrar\categoria_cliente\util\categoria_cliente_util;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\util\categoria_cliente_param_return;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\business\logic\categoria_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\categoria_cliente\presentation\session\categoria_cliente_session;


//FK


//REL


use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
categoria_cliente_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
categoria_cliente_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
categoria_cliente_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
categoria_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*categoria_cliente_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class categoria_cliente_init_control extends ControllerBase {	
	
	public $categoria_clienteClase=null;	
	public $categoria_clientesModel=null;	
	public $categoria_clientesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcategoria_cliente=0;	
	public ?int $idcategoria_clienteActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $categoria_clienteLogic=null;
	
	public $categoria_clienteActual=null;	
	
	public $categoria_cliente=null;
	public $categoria_clientes=null;
	public $categoria_clientesEliminados=array();
	public $categoria_clientesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $categoria_clientesLocal=array();
	public ?array $categoria_clientesReporte=null;
	public ?array $categoria_clientesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcategoria_cliente='onload';
	public string $strTipoPaginaAuxiliarcategoria_cliente='none';
	public string $strTipoUsuarioAuxiliarcategoria_cliente='none';
		
	public $categoria_clienteReturnGeneral=null;
	public $categoria_clienteParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $categoria_clienteModel=null;
	public $categoria_clienteControllerAdditional=null;
	
	
	

	public $clienteLogic=null;

	public function  getclienteLogic() {
		return $this->clienteLogic;
	}

	public function setclienteLogic($clienteLogic) {
		$this->clienteLogic =$clienteLogic;
	}
 	
	
	public string $strMensajenombre='';
	public string $strMensajepredeterminado='';
	
	

	
	
	
	
	
	
	
	public $strTienePermisoscliente='none';
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->categoria_clienteLogic==null) {
				$this->categoria_clienteLogic=new categoria_cliente_logic();
			}
			
		} else {
			if($this->categoria_clienteLogic==null) {
				$this->categoria_clienteLogic=new categoria_cliente_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->categoria_clienteClase==null) {
				$this->categoria_clienteClase=new categoria_cliente();
			}
			
			$this->categoria_clienteClase->setId(0);	
				
				
			$this->categoria_clienteClase->setnombre('');	
			$this->categoria_clienteClase->setpredeterminado(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('categoria_cliente');
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
		$this->cargarParametrosReporteBase('categoria_cliente');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('categoria_cliente');
	}
	
	public function actualizarControllerConReturnGeneral(categoria_cliente_param_return $categoria_clienteReturnGeneral) {
		if($categoria_clienteReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescategoria_clientesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$categoria_clienteReturnGeneral->getsMensajeProceso();
		}
		
		if($categoria_clienteReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$categoria_clienteReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($categoria_clienteReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$categoria_clienteReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$categoria_clienteReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($categoria_clienteReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($categoria_clienteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$categoria_clienteReturnGeneral->getsFuncionJs();
		}
		
		if($categoria_clienteReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(categoria_cliente_session $categoria_cliente_session){
		$this->strStyleDivArbol=$categoria_cliente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$categoria_cliente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$categoria_cliente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$categoria_cliente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$categoria_cliente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$categoria_cliente_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$categoria_cliente_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(categoria_cliente_session $categoria_cliente_session){
		$categoria_cliente_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$categoria_cliente_session->strStyleDivHeader='display:none';			
		$categoria_cliente_session->strStyleDivContent='width:93%;height:100%';	
		$categoria_cliente_session->strStyleDivOpcionesBanner='display:none';	
		$categoria_cliente_session->strStyleDivExpandirColapsar='display:none';	
		$categoria_cliente_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(categoria_cliente_control $categoria_cliente_control_session){
		$this->idNuevo=$categoria_cliente_control_session->idNuevo;
		$this->categoria_clienteActual=$categoria_cliente_control_session->categoria_clienteActual;
		$this->categoria_cliente=$categoria_cliente_control_session->categoria_cliente;
		$this->categoria_clienteClase=$categoria_cliente_control_session->categoria_clienteClase;
		$this->categoria_clientes=$categoria_cliente_control_session->categoria_clientes;
		$this->categoria_clientesEliminados=$categoria_cliente_control_session->categoria_clientesEliminados;
		$this->categoria_cliente=$categoria_cliente_control_session->categoria_cliente;
		$this->categoria_clientesReporte=$categoria_cliente_control_session->categoria_clientesReporte;
		$this->categoria_clientesSeleccionados=$categoria_cliente_control_session->categoria_clientesSeleccionados;
		$this->arrOrderBy=$categoria_cliente_control_session->arrOrderBy;
		$this->arrOrderByRel=$categoria_cliente_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$categoria_cliente_control_session->arrHistoryWebs;
		$this->arrSessionBases=$categoria_cliente_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcategoria_cliente=$categoria_cliente_control_session->strTypeOnLoadcategoria_cliente;
		$this->strTipoPaginaAuxiliarcategoria_cliente=$categoria_cliente_control_session->strTipoPaginaAuxiliarcategoria_cliente;
		$this->strTipoUsuarioAuxiliarcategoria_cliente=$categoria_cliente_control_session->strTipoUsuarioAuxiliarcategoria_cliente;	
		
		$this->bitEsPopup=$categoria_cliente_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$categoria_cliente_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$categoria_cliente_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$categoria_cliente_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$categoria_cliente_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$categoria_cliente_control_session->strSufijo;
		$this->bitEsRelaciones=$categoria_cliente_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$categoria_cliente_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$categoria_cliente_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$categoria_cliente_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$categoria_cliente_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$categoria_cliente_control_session->strTituloTabla;
		$this->strTituloPathPagina=$categoria_cliente_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$categoria_cliente_control_session->strTituloPathElementoActual;
		
		if($this->categoria_clienteLogic==null) {			
			$this->categoria_clienteLogic=new categoria_cliente_logic();
		}
		
		
		if($this->categoria_clienteClase==null) {
			$this->categoria_clienteClase=new categoria_cliente();	
		}
		
		$this->categoria_clienteLogic->setcategoria_cliente($this->categoria_clienteClase);
		
		
		if($this->categoria_clientes==null) {
			$this->categoria_clientes=array();	
		}
		
		$this->categoria_clienteLogic->setcategoria_clientes($this->categoria_clientes);
		
		
		$this->strTipoView=$categoria_cliente_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$categoria_cliente_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$categoria_cliente_control_session->datosCliente;
		$this->strAccionBusqueda=$categoria_cliente_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$categoria_cliente_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$categoria_cliente_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$categoria_cliente_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$categoria_cliente_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$categoria_cliente_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$categoria_cliente_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$categoria_cliente_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$categoria_cliente_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$categoria_cliente_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$categoria_cliente_control_session->strTipoPaginacion;
		$this->strTipoAccion=$categoria_cliente_control_session->strTipoAccion;
		$this->tiposReportes=$categoria_cliente_control_session->tiposReportes;
		$this->tiposReporte=$categoria_cliente_control_session->tiposReporte;
		$this->tiposAcciones=$categoria_cliente_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$categoria_cliente_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$categoria_cliente_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$categoria_cliente_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$categoria_cliente_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$categoria_cliente_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$categoria_cliente_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$categoria_cliente_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$categoria_cliente_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$categoria_cliente_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$categoria_cliente_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$categoria_cliente_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$categoria_cliente_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$categoria_cliente_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$categoria_cliente_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$categoria_cliente_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$categoria_cliente_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$categoria_cliente_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$categoria_cliente_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$categoria_cliente_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$categoria_cliente_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$categoria_cliente_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$categoria_cliente_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$categoria_cliente_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$categoria_cliente_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$categoria_cliente_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$categoria_cliente_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$categoria_cliente_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$categoria_cliente_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$categoria_cliente_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$categoria_cliente_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$categoria_cliente_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$categoria_cliente_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$categoria_cliente_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$categoria_cliente_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$categoria_cliente_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$categoria_cliente_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$categoria_cliente_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$categoria_cliente_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$categoria_cliente_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$categoria_cliente_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$categoria_cliente_control_session->resumenUsuarioActual;	
		$this->moduloActual=$categoria_cliente_control_session->moduloActual;	
		$this->opcionActual=$categoria_cliente_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$categoria_cliente_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$categoria_cliente_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$categoria_cliente_session=unserialize($this->Session->read(categoria_cliente_util::$STR_SESSION_NAME));
				
		if($categoria_cliente_session==null) {
			$categoria_cliente_session=new categoria_cliente_session();
		}
		
		$this->strStyleDivArbol=$categoria_cliente_session->strStyleDivArbol;	
		$this->strStyleDivContent=$categoria_cliente_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$categoria_cliente_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$categoria_cliente_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$categoria_cliente_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$categoria_cliente_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$categoria_cliente_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$categoria_cliente_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$categoria_cliente_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$categoria_cliente_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$categoria_cliente_session->strRecargarFkQuery;
		*/
		
		$this->strMensajenombre=$categoria_cliente_control_session->strMensajenombre;
		$this->strMensajepredeterminado=$categoria_cliente_control_session->strMensajepredeterminado;
			
		
		
		
		
		
		$this->strTienePermisoscliente=$categoria_cliente_control_session->strTienePermisoscliente;
		
		

		
		
		
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
	
	public function getcategoria_clienteControllerAdditional() {
		return $this->categoria_clienteControllerAdditional;
	}

	public function setcategoria_clienteControllerAdditional($categoria_clienteControllerAdditional) {
		$this->categoria_clienteControllerAdditional = $categoria_clienteControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcategoria_clienteActual() : categoria_cliente {
		return $this->categoria_clienteActual;
	}

	public function setcategoria_clienteActual(categoria_cliente $categoria_clienteActual) {
		$this->categoria_clienteActual = $categoria_clienteActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcategoria_cliente() : int {
		return $this->idcategoria_cliente;
	}

	public function setidcategoria_cliente(int $idcategoria_cliente) {
		$this->idcategoria_cliente = $idcategoria_cliente;
	}
	
	public function getcategoria_cliente() : categoria_cliente {
		return $this->categoria_cliente;
	}

	public function setcategoria_cliente(categoria_cliente $categoria_cliente) {
		$this->categoria_cliente = $categoria_cliente;
	}
		
	public function getcategoria_clienteLogic() : categoria_cliente_logic {		
		return $this->categoria_clienteLogic;
	}

	public function setcategoria_clienteLogic(categoria_cliente_logic $categoria_clienteLogic) {
		$this->categoria_clienteLogic = $categoria_clienteLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcategoria_clientesModel() {		
		try {						
			/*categoria_clientesModel.setWrappedData(categoria_clienteLogic->getcategoria_clientes());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->categoria_clientesModel;
	}
	
	public function setcategoria_clientesModel($categoria_clientesModel) {
		$this->categoria_clientesModel = $categoria_clientesModel;
	}
	
	public function getcategoria_clientes() : array {		
		return $this->categoria_clientes;
	}
	
	public function setcategoria_clientes(array $categoria_clientes) {
		$this->categoria_clientes= $categoria_clientes;
	}
	
	public function getcategoria_clientesEliminados() : array {		
		return $this->categoria_clientesEliminados;
	}
	
	public function setcategoria_clientesEliminados(array $categoria_clientesEliminados) {
		$this->categoria_clientesEliminados= $categoria_clientesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcategoria_clienteActualFromListDataModel() {
		try {
			/*$categoria_clienteClase= $this->categoria_clientesModel->getRowData();*/
			
			/*return $categoria_cliente;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
