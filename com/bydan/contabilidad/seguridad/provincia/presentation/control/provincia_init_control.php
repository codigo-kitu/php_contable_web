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

namespace com\bydan\contabilidad\seguridad\provincia\presentation\control;

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

use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/provincia/util/provincia_carga.php');
use com\bydan\contabilidad\seguridad\provincia\util\provincia_carga;

use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_param_return;
use com\bydan\contabilidad\seguridad\provincia\business\logic\provincia_logic;
use com\bydan\contabilidad\seguridad\provincia\presentation\session\provincia_session;


//FK


use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

//REL


use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;
use com\bydan\contabilidad\seguridad\ciudad\presentation\session\ciudad_session;

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;
use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\session\dato_general_usuario_session;


/*CARGA ARCHIVOS FRAMEWORK*/
provincia_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
provincia_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
provincia_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
provincia_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*provincia_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class provincia_init_control extends ControllerBase {	
	
	public $provinciaClase=null;	
	public $provinciasModel=null;	
	public $provinciasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idprovincia=0;	
	public ?int $idprovinciaActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $provinciaLogic=null;
	
	public $provinciaActual=null;	
	
	public $provincia=null;
	public $provincias=null;
	public $provinciasEliminados=array();
	public $provinciasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $provinciasLocal=array();
	public ?array $provinciasReporte=null;
	public ?array $provinciasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadprovincia='onload';
	public string $strTipoPaginaAuxiliarprovincia='none';
	public string $strTipoUsuarioAuxiliarprovincia='none';
		
	public $provinciaReturnGeneral=null;
	public $provinciaParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $provinciaModel=null;
	public $provinciaControllerAdditional=null;
	
	
	

	public $ciudadLogic=null;

	public function  getciudadLogic() {
		return $this->ciudadLogic;
	}

	public function setciudadLogic($ciudadLogic) {
		$this->ciudadLogic =$ciudadLogic;
	}


	public $proveedorLogic=null;

	public function  getproveedorLogic() {
		return $this->proveedorLogic;
	}

	public function setproveedorLogic($proveedorLogic) {
		$this->proveedorLogic =$proveedorLogic;
	}


	public $clienteLogic=null;

	public function  getclienteLogic() {
		return $this->clienteLogic;
	}

	public function setclienteLogic($clienteLogic) {
		$this->clienteLogic =$clienteLogic;
	}


	public $datogeneralusuarioLogic=null;

	public function  getdato_general_usuarioLogic() {
		return $this->datogeneralusuarioLogic;
	}

	public function setdato_general_usuarioLogic($datogeneralusuarioLogic) {
		$this->datogeneralusuarioLogic =$datogeneralusuarioLogic;
	}
 	
	
	public string $strMensajeid_pais='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	
	
	public string $strVisibleBusquedaPorcodigo='display:table-row';
	public string $strVisibleBusquedaPornombre='display:table-row';
	public string $strVisibleFK_Idpais='display:table-row';

	
	public array $paissFK=array();

	public function getpaissFK():array {
		return $this->paissFK;
	}

	public function setpaissFK(array $paissFK) {
		$this->paissFK = $paissFK;
	}

	public int $idpaisDefaultFK=-1;

	public function getIdpaisDefaultFK():int {
		return $this->idpaisDefaultFK;
	}

	public function setIdpaisDefaultFK(int $idpaisDefaultFK) {
		$this->idpaisDefaultFK = $idpaisDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosciudad='none';
	public $strTienePermisosproveedor='none';
	public $strTienePermisoscliente='none';
	public $strTienePermisosdato_general_usuario='none';
	
	
	public  $codigoBusquedaPorcodigo=null;

	public  $nombreBusquedaPornombre=null;

	public  $id_paisFK_Idpais=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->provinciaLogic==null) {
				$this->provinciaLogic=new provincia_logic();
			}
			
		} else {
			if($this->provinciaLogic==null) {
				$this->provinciaLogic=new provincia_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->provinciaClase==null) {
				$this->provinciaClase=new provincia();
			}
			
			$this->provinciaClase->setId(0);	
				
				
			$this->provinciaClase->setid_pais(-1);	
			$this->provinciaClase->setcodigo('');	
			$this->provinciaClase->setnombre('');	
			
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
		$this->prepararEjecutarMantenimientoBase('provincia');
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
		$this->cargarParametrosReporteBase('provincia');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('provincia');
	}
	
	public function actualizarControllerConReturnGeneral(provincia_param_return $provinciaReturnGeneral) {
		if($provinciaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesprovinciasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$provinciaReturnGeneral->getsMensajeProceso();
		}
		
		if($provinciaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$provinciaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($provinciaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$provinciaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$provinciaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($provinciaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($provinciaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$provinciaReturnGeneral->getsFuncionJs();
		}
		
		if($provinciaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(provincia_session $provincia_session){
		$this->strStyleDivArbol=$provincia_session->strStyleDivArbol;	
		$this->strStyleDivContent=$provincia_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$provincia_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$provincia_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$provincia_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$provincia_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$provincia_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(provincia_session $provincia_session){
		$provincia_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$provincia_session->strStyleDivHeader='display:none';			
		$provincia_session->strStyleDivContent='width:93%;height:100%';	
		$provincia_session->strStyleDivOpcionesBanner='display:none';	
		$provincia_session->strStyleDivExpandirColapsar='display:none';	
		$provincia_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(provincia_control $provincia_control_session){
		$this->idNuevo=$provincia_control_session->idNuevo;
		$this->provinciaActual=$provincia_control_session->provinciaActual;
		$this->provincia=$provincia_control_session->provincia;
		$this->provinciaClase=$provincia_control_session->provinciaClase;
		$this->provincias=$provincia_control_session->provincias;
		$this->provinciasEliminados=$provincia_control_session->provinciasEliminados;
		$this->provincia=$provincia_control_session->provincia;
		$this->provinciasReporte=$provincia_control_session->provinciasReporte;
		$this->provinciasSeleccionados=$provincia_control_session->provinciasSeleccionados;
		$this->arrOrderBy=$provincia_control_session->arrOrderBy;
		$this->arrOrderByRel=$provincia_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$provincia_control_session->arrHistoryWebs;
		$this->arrSessionBases=$provincia_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadprovincia=$provincia_control_session->strTypeOnLoadprovincia;
		$this->strTipoPaginaAuxiliarprovincia=$provincia_control_session->strTipoPaginaAuxiliarprovincia;
		$this->strTipoUsuarioAuxiliarprovincia=$provincia_control_session->strTipoUsuarioAuxiliarprovincia;	
		
		$this->bitEsPopup=$provincia_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$provincia_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$provincia_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$provincia_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$provincia_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$provincia_control_session->strSufijo;
		$this->bitEsRelaciones=$provincia_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$provincia_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$provincia_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$provincia_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$provincia_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$provincia_control_session->strTituloTabla;
		$this->strTituloPathPagina=$provincia_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$provincia_control_session->strTituloPathElementoActual;
		
		if($this->provinciaLogic==null) {			
			$this->provinciaLogic=new provincia_logic();
		}
		
		
		if($this->provinciaClase==null) {
			$this->provinciaClase=new provincia();	
		}
		
		$this->provinciaLogic->setprovincia($this->provinciaClase);
		
		
		if($this->provincias==null) {
			$this->provincias=array();	
		}
		
		$this->provinciaLogic->setprovincias($this->provincias);
		
		
		$this->strTipoView=$provincia_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$provincia_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$provincia_control_session->datosCliente;
		$this->strAccionBusqueda=$provincia_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$provincia_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$provincia_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$provincia_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$provincia_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$provincia_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$provincia_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$provincia_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$provincia_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$provincia_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$provincia_control_session->strTipoPaginacion;
		$this->strTipoAccion=$provincia_control_session->strTipoAccion;
		$this->tiposReportes=$provincia_control_session->tiposReportes;
		$this->tiposReporte=$provincia_control_session->tiposReporte;
		$this->tiposAcciones=$provincia_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$provincia_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$provincia_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$provincia_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$provincia_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$provincia_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$provincia_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$provincia_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$provincia_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$provincia_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$provincia_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$provincia_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$provincia_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$provincia_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$provincia_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$provincia_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$provincia_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$provincia_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$provincia_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$provincia_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$provincia_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$provincia_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$provincia_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$provincia_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$provincia_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$provincia_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$provincia_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$provincia_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$provincia_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$provincia_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$provincia_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$provincia_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$provincia_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$provincia_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$provincia_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$provincia_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$provincia_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$provincia_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$provincia_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$provincia_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$provincia_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$provincia_control_session->resumenUsuarioActual;	
		$this->moduloActual=$provincia_control_session->moduloActual;	
		$this->opcionActual=$provincia_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$provincia_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$provincia_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$provincia_session=unserialize($this->Session->read(provincia_util::$STR_SESSION_NAME));
				
		if($provincia_session==null) {
			$provincia_session=new provincia_session();
		}
		
		$this->strStyleDivArbol=$provincia_session->strStyleDivArbol;	
		$this->strStyleDivContent=$provincia_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$provincia_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$provincia_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$provincia_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$provincia_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$provincia_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$provincia_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$provincia_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$provincia_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$provincia_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_pais=$provincia_control_session->strMensajeid_pais;
		$this->strMensajecodigo=$provincia_control_session->strMensajecodigo;
		$this->strMensajenombre=$provincia_control_session->strMensajenombre;
			
		
		$this->paissFK=$provincia_control_session->paissFK;
		$this->idpaisDefaultFK=$provincia_control_session->idpaisDefaultFK;
		
		
		$this->strVisibleBusquedaPorcodigo=$provincia_control_session->strVisibleBusquedaPorcodigo;
		$this->strVisibleBusquedaPornombre=$provincia_control_session->strVisibleBusquedaPornombre;
		$this->strVisibleFK_Idpais=$provincia_control_session->strVisibleFK_Idpais;
		
		
		$this->strTienePermisosciudad=$provincia_control_session->strTienePermisosciudad;
		$this->strTienePermisosproveedor=$provincia_control_session->strTienePermisosproveedor;
		$this->strTienePermisoscliente=$provincia_control_session->strTienePermisoscliente;
		$this->strTienePermisosdato_general_usuario=$provincia_control_session->strTienePermisosdato_general_usuario;
		
		
		$this->codigoBusquedaPorcodigo=$provincia_control_session->codigoBusquedaPorcodigo;
		$this->nombreBusquedaPornombre=$provincia_control_session->nombreBusquedaPornombre;
		$this->id_paisFK_Idpais=$provincia_control_session->id_paisFK_Idpais;

		
		
		
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
	
	public function getprovinciaControllerAdditional() {
		return $this->provinciaControllerAdditional;
	}

	public function setprovinciaControllerAdditional($provinciaControllerAdditional) {
		$this->provinciaControllerAdditional = $provinciaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getprovinciaActual() : provincia {
		return $this->provinciaActual;
	}

	public function setprovinciaActual(provincia $provinciaActual) {
		$this->provinciaActual = $provinciaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidprovincia() : int {
		return $this->idprovincia;
	}

	public function setidprovincia(int $idprovincia) {
		$this->idprovincia = $idprovincia;
	}
	
	public function getprovincia() : provincia {
		return $this->provincia;
	}

	public function setprovincia(provincia $provincia) {
		$this->provincia = $provincia;
	}
		
	public function getprovinciaLogic() : provincia_logic {		
		return $this->provinciaLogic;
	}

	public function setprovinciaLogic(provincia_logic $provinciaLogic) {
		$this->provinciaLogic = $provinciaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getprovinciasModel() {		
		try {						
			/*provinciasModel.setWrappedData(provinciaLogic->getprovincias());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->provinciasModel;
	}
	
	public function setprovinciasModel($provinciasModel) {
		$this->provinciasModel = $provinciasModel;
	}
	
	public function getprovincias() : array {		
		return $this->provincias;
	}
	
	public function setprovincias(array $provincias) {
		$this->provincias= $provincias;
	}
	
	public function getprovinciasEliminados() : array {		
		return $this->provinciasEliminados;
	}
	
	public function setprovinciasEliminados(array $provinciasEliminados) {
		$this->provinciasEliminados= $provinciasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getprovinciaActualFromListDataModel() {
		try {
			/*$provinciaClase= $this->provinciasModel->getRowData();*/
			
			/*return $provincia;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
