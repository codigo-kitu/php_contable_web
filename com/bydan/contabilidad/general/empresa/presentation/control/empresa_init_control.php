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

namespace com\bydan\contabilidad\general\empresa\presentation\control;

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

use com\bydan\contabilidad\general\empresa\business\entity\empresa;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/empresa/util/empresa_carga.php');
use com\bydan\contabilidad\general\empresa\util\empresa_carga;

use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\general\empresa\util\empresa_param_return;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\presentation\session\empresa_session;


//FK


use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
empresa_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
empresa_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
empresa_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
empresa_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*empresa_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class empresa_init_control extends ControllerBase {	
	
	public $empresaClase=null;	
	public $empresasModel=null;	
	public $empresasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idempresa=0;	
	public ?int $idempresaActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $empresaLogic=null;
	
	public $empresaActual=null;	
	
	public $empresa=null;
	public $empresas=null;
	public $empresasEliminados=array();
	public $empresasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $empresasLocal=array();
	public ?array $empresasReporte=null;
	public ?array $empresasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadempresa='onload';
	public string $strTipoPaginaAuxiliarempresa='none';
	public string $strTipoUsuarioAuxiliarempresa='none';
		
	public $empresaReturnGeneral=null;
	public $empresaParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $empresaModel=null;
	public $empresaControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_pais='';
	public string $strMensajeid_ciudad='';
	public string $strMensajeruc='';
	public string $strMensajenombre='';
	public string $strMensajenombre_comercial='';
	public string $strMensajesector='';
	public string $strMensajedireccion1='';
	public string $strMensajedireccion2='';
	public string $strMensajedireccion3='';
	public string $strMensajetelefono1='';
	public string $strMensajemovil='';
	public string $strMensajemail='';
	public string $strMensajesitio_web='';
	public string $strMensajecodigo_postal='';
	public string $strMensajefax='';
	public string $strMensajelogo='';
	public string $strMensajeicono='';
	
	
	public string $strVisibleFK_Idciudad='display:table-row';
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

	public array $ciudadsFK=array();

	public function getciudadsFK():array {
		return $this->ciudadsFK;
	}

	public function setciudadsFK(array $ciudadsFK) {
		$this->ciudadsFK = $ciudadsFK;
	}

	public int $idciudadDefaultFK=-1;

	public function getIdciudadDefaultFK():int {
		return $this->idciudadDefaultFK;
	}

	public function setIdciudadDefaultFK(int $idciudadDefaultFK) {
		$this->idciudadDefaultFK = $idciudadDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_ciudadFK_Idciudad=null;

	public  $id_paisFK_Idpais=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->empresaLogic==null) {
				$this->empresaLogic=new empresa_logic();
			}
			
		} else {
			if($this->empresaLogic==null) {
				$this->empresaLogic=new empresa_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->empresaClase==null) {
				$this->empresaClase=new empresa();
			}
			
			$this->empresaClase->setId(0);	
				
				
			$this->empresaClase->setid_pais(-1);	
			$this->empresaClase->setid_ciudad(-1);	
			$this->empresaClase->setruc('');	
			$this->empresaClase->setnombre('');	
			$this->empresaClase->setnombre_comercial('');	
			$this->empresaClase->setsector('');	
			$this->empresaClase->setdireccion1('');	
			$this->empresaClase->setdireccion2('');	
			$this->empresaClase->setdireccion3('');	
			$this->empresaClase->settelefono1('');	
			$this->empresaClase->setmovil('');	
			$this->empresaClase->setmail('');	
			$this->empresaClase->setsitio_web('');	
			$this->empresaClase->setcodigo_postal('');	
			$this->empresaClase->setfax('');	
			$this->empresaClase->setlogo('');	
			$this->empresaClase->seticono('');	
			
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
		$this->prepararEjecutarMantenimientoBase('empresa');
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
		$this->cargarParametrosReporteBase('empresa');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('empresa');
	}
	
	public function actualizarControllerConReturnGeneral(empresa_param_return $empresaReturnGeneral) {
		if($empresaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesempresasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$empresaReturnGeneral->getsMensajeProceso();
		}
		
		if($empresaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$empresaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($empresaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$empresaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$empresaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($empresaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($empresaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$empresaReturnGeneral->getsFuncionJs();
		}
		
		if($empresaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(empresa_session $empresa_session){
		$this->strStyleDivArbol=$empresa_session->strStyleDivArbol;	
		$this->strStyleDivContent=$empresa_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$empresa_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$empresa_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$empresa_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$empresa_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$empresa_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(empresa_session $empresa_session){
		$empresa_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$empresa_session->strStyleDivHeader='display:none';			
		$empresa_session->strStyleDivContent='width:93%;height:100%';	
		$empresa_session->strStyleDivOpcionesBanner='display:none';	
		$empresa_session->strStyleDivExpandirColapsar='display:none';	
		$empresa_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(empresa_control $empresa_control_session){
		$this->idNuevo=$empresa_control_session->idNuevo;
		$this->empresaActual=$empresa_control_session->empresaActual;
		$this->empresa=$empresa_control_session->empresa;
		$this->empresaClase=$empresa_control_session->empresaClase;
		$this->empresas=$empresa_control_session->empresas;
		$this->empresasEliminados=$empresa_control_session->empresasEliminados;
		$this->empresa=$empresa_control_session->empresa;
		$this->empresasReporte=$empresa_control_session->empresasReporte;
		$this->empresasSeleccionados=$empresa_control_session->empresasSeleccionados;
		$this->arrOrderBy=$empresa_control_session->arrOrderBy;
		$this->arrOrderByRel=$empresa_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$empresa_control_session->arrHistoryWebs;
		$this->arrSessionBases=$empresa_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadempresa=$empresa_control_session->strTypeOnLoadempresa;
		$this->strTipoPaginaAuxiliarempresa=$empresa_control_session->strTipoPaginaAuxiliarempresa;
		$this->strTipoUsuarioAuxiliarempresa=$empresa_control_session->strTipoUsuarioAuxiliarempresa;	
		
		$this->bitEsPopup=$empresa_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$empresa_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$empresa_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$empresa_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$empresa_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$empresa_control_session->strSufijo;
		$this->bitEsRelaciones=$empresa_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$empresa_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$empresa_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$empresa_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$empresa_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$empresa_control_session->strTituloTabla;
		$this->strTituloPathPagina=$empresa_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$empresa_control_session->strTituloPathElementoActual;
		
		if($this->empresaLogic==null) {			
			$this->empresaLogic=new empresa_logic();
		}
		
		
		if($this->empresaClase==null) {
			$this->empresaClase=new empresa();	
		}
		
		$this->empresaLogic->setempresa($this->empresaClase);
		
		
		if($this->empresas==null) {
			$this->empresas=array();	
		}
		
		$this->empresaLogic->setempresas($this->empresas);
		
		
		$this->strTipoView=$empresa_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$empresa_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$empresa_control_session->datosCliente;
		$this->strAccionBusqueda=$empresa_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$empresa_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$empresa_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$empresa_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$empresa_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$empresa_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$empresa_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$empresa_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$empresa_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$empresa_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$empresa_control_session->strTipoPaginacion;
		$this->strTipoAccion=$empresa_control_session->strTipoAccion;
		$this->tiposReportes=$empresa_control_session->tiposReportes;
		$this->tiposReporte=$empresa_control_session->tiposReporte;
		$this->tiposAcciones=$empresa_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$empresa_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$empresa_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$empresa_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$empresa_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$empresa_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$empresa_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$empresa_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$empresa_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$empresa_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$empresa_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$empresa_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$empresa_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$empresa_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$empresa_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$empresa_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$empresa_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$empresa_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$empresa_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$empresa_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$empresa_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$empresa_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$empresa_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$empresa_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$empresa_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$empresa_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$empresa_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$empresa_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$empresa_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$empresa_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$empresa_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$empresa_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$empresa_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$empresa_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$empresa_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$empresa_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$empresa_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$empresa_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$empresa_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$empresa_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$empresa_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$empresa_control_session->resumenUsuarioActual;	
		$this->moduloActual=$empresa_control_session->moduloActual;	
		$this->opcionActual=$empresa_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$empresa_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$empresa_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$empresa_session=unserialize($this->Session->read(empresa_util::$STR_SESSION_NAME));
				
		if($empresa_session==null) {
			$empresa_session=new empresa_session();
		}
		
		$this->strStyleDivArbol=$empresa_session->strStyleDivArbol;	
		$this->strStyleDivContent=$empresa_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$empresa_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$empresa_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$empresa_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$empresa_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$empresa_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$empresa_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$empresa_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$empresa_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$empresa_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_pais=$empresa_control_session->strMensajeid_pais;
		$this->strMensajeid_ciudad=$empresa_control_session->strMensajeid_ciudad;
		$this->strMensajeruc=$empresa_control_session->strMensajeruc;
		$this->strMensajenombre=$empresa_control_session->strMensajenombre;
		$this->strMensajenombre_comercial=$empresa_control_session->strMensajenombre_comercial;
		$this->strMensajesector=$empresa_control_session->strMensajesector;
		$this->strMensajedireccion1=$empresa_control_session->strMensajedireccion1;
		$this->strMensajedireccion2=$empresa_control_session->strMensajedireccion2;
		$this->strMensajedireccion3=$empresa_control_session->strMensajedireccion3;
		$this->strMensajetelefono1=$empresa_control_session->strMensajetelefono1;
		$this->strMensajemovil=$empresa_control_session->strMensajemovil;
		$this->strMensajemail=$empresa_control_session->strMensajemail;
		$this->strMensajesitio_web=$empresa_control_session->strMensajesitio_web;
		$this->strMensajecodigo_postal=$empresa_control_session->strMensajecodigo_postal;
		$this->strMensajefax=$empresa_control_session->strMensajefax;
		$this->strMensajelogo=$empresa_control_session->strMensajelogo;
		$this->strMensajeicono=$empresa_control_session->strMensajeicono;
			
		
		$this->paissFK=$empresa_control_session->paissFK;
		$this->idpaisDefaultFK=$empresa_control_session->idpaisDefaultFK;
		$this->ciudadsFK=$empresa_control_session->ciudadsFK;
		$this->idciudadDefaultFK=$empresa_control_session->idciudadDefaultFK;
		
		
		$this->strVisibleFK_Idciudad=$empresa_control_session->strVisibleFK_Idciudad;
		$this->strVisibleFK_Idpais=$empresa_control_session->strVisibleFK_Idpais;
		
		
		
		
		$this->id_ciudadFK_Idciudad=$empresa_control_session->id_ciudadFK_Idciudad;
		$this->id_paisFK_Idpais=$empresa_control_session->id_paisFK_Idpais;

		
		
		
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
	
	public function getempresaControllerAdditional() {
		return $this->empresaControllerAdditional;
	}

	public function setempresaControllerAdditional($empresaControllerAdditional) {
		$this->empresaControllerAdditional = $empresaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getempresaActual() : empresa {
		return $this->empresaActual;
	}

	public function setempresaActual(empresa $empresaActual) {
		$this->empresaActual = $empresaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidempresa() : int {
		return $this->idempresa;
	}

	public function setidempresa(int $idempresa) {
		$this->idempresa = $idempresa;
	}
	
	public function getempresa() : empresa {
		return $this->empresa;
	}

	public function setempresa(empresa $empresa) {
		$this->empresa = $empresa;
	}
		
	public function getempresaLogic() : empresa_logic {		
		return $this->empresaLogic;
	}

	public function setempresaLogic(empresa_logic $empresaLogic) {
		$this->empresaLogic = $empresaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getempresasModel() {		
		try {						
			/*empresasModel.setWrappedData(empresaLogic->getempresas());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->empresasModel;
	}
	
	public function setempresasModel($empresasModel) {
		$this->empresasModel = $empresasModel;
	}
	
	public function getempresas() : array {		
		return $this->empresas;
	}
	
	public function setempresas(array $empresas) {
		$this->empresas= $empresas;
	}
	
	public function getempresasEliminados() : array {		
		return $this->empresasEliminados;
	}
	
	public function setempresasEliminados(array $empresasEliminados) {
		$this->empresasEliminados= $empresasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getempresaActualFromListDataModel() {
		try {
			/*$empresaClase= $this->empresasModel->getRowData();*/
			
			/*return $empresa;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
