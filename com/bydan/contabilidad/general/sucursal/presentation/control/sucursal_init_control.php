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

namespace com\bydan\contabilidad\general\sucursal\presentation\control;

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

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/sucursal/util/sucursal_carga.php');
use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;

use com\bydan\contabilidad\general\sucursal\util\sucursal_util;
use com\bydan\contabilidad\general\sucursal\util\sucursal_param_return;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\presentation\session\sucursal_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

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
sucursal_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
sucursal_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
sucursal_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
sucursal_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*sucursal_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class sucursal_init_control extends ControllerBase {	
	
	public $sucursalClase=null;	
	public $sucursalsModel=null;	
	public $sucursalsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idsucursal=0;	
	public ?int $idsucursalActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $sucursalLogic=null;
	
	public $sucursalActual=null;	
	
	public $sucursal=null;
	public $sucursals=null;
	public $sucursalsEliminados=array();
	public $sucursalsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $sucursalsLocal=array();
	public ?array $sucursalsReporte=null;
	public ?array $sucursalsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadsucursal='onload';
	public string $strTipoPaginaAuxiliarsucursal='none';
	public string $strTipoUsuarioAuxiliarsucursal='none';
		
	public $sucursalReturnGeneral=null;
	public $sucursalParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $sucursalModel=null;
	public $sucursalControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_pais='';
	public string $strMensajeid_ciudad='';
	public string $strMensajenombre='';
	public string $strMensajeregistro_tributario='';
	public string $strMensajeregistro_sucursalrial='';
	public string $strMensajedireccion1='';
	public string $strMensajedireccion2='';
	public string $strMensajedireccion3='';
	public string $strMensajetelefono1='';
	public string $strMensajecelular='';
	public string $strMensajecorreo_electronico='';
	public string $strMensajesitio_web='';
	public string $strMensajecodigo_postal='';
	public string $strMensajefax='';
	public string $strMensajebarrio_distrito='';
	public string $strMensajelogo='';
	public string $strMensajebase_de_datos='';
	public string $strMensajecondicion='';
	public string $strMensajeicono_asociado='';
	public string $strMensajefolder_sucursal='';
	
	
	public string $strVisibleFK_Idciudad='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idpais='display:table-row';

	
	public array $empresasFK=array();

	public function getempresasFK():array {
		return $this->empresasFK;
	}

	public function setempresasFK(array $empresasFK) {
		$this->empresasFK = $empresasFK;
	}

	public int $idempresaDefaultFK=-1;

	public function getIdempresaDefaultFK():int {
		return $this->idempresaDefaultFK;
	}

	public function setIdempresaDefaultFK(int $idempresaDefaultFK) {
		$this->idempresaDefaultFK = $idempresaDefaultFK;
	}

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

	public  $id_empresaFK_Idempresa=null;

	public  $id_paisFK_Idpais=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->sucursalLogic==null) {
				$this->sucursalLogic=new sucursal_logic();
			}
			
		} else {
			if($this->sucursalLogic==null) {
				$this->sucursalLogic=new sucursal_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->sucursalClase==null) {
				$this->sucursalClase=new sucursal();
			}
			
			$this->sucursalClase->setId(0);	
				
				
			$this->sucursalClase->setid_empresa(-1);	
			$this->sucursalClase->setid_pais(-1);	
			$this->sucursalClase->setid_ciudad(-1);	
			$this->sucursalClase->setnombre('');	
			$this->sucursalClase->setregistro_tributario('');	
			$this->sucursalClase->setregistro_sucursalrial('');	
			$this->sucursalClase->setdireccion1('');	
			$this->sucursalClase->setdireccion2('');	
			$this->sucursalClase->setdireccion3('');	
			$this->sucursalClase->settelefono1('');	
			$this->sucursalClase->setcelular('');	
			$this->sucursalClase->setcorreo_electronico('');	
			$this->sucursalClase->setsitio_web('');	
			$this->sucursalClase->setcodigo_postal('');	
			$this->sucursalClase->setfax('');	
			$this->sucursalClase->setbarrio_distrito('');	
			$this->sucursalClase->setlogo('');	
			$this->sucursalClase->setbase_de_datos('');	
			$this->sucursalClase->setcondicion(0);	
			$this->sucursalClase->seticono_asociado('');	
			$this->sucursalClase->setfolder_sucursal('');	
			
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
		$this->prepararEjecutarMantenimientoBase('sucursal');
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
		$this->cargarParametrosReporteBase('sucursal');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('sucursal');
	}
	
	public function actualizarControllerConReturnGeneral(sucursal_param_return $sucursalReturnGeneral) {
		if($sucursalReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajessucursalsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$sucursalReturnGeneral->getsMensajeProceso();
		}
		
		if($sucursalReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$sucursalReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($sucursalReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$sucursalReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$sucursalReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($sucursalReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($sucursalReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$sucursalReturnGeneral->getsFuncionJs();
		}
		
		if($sucursalReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(sucursal_session $sucursal_session){
		$this->strStyleDivArbol=$sucursal_session->strStyleDivArbol;	
		$this->strStyleDivContent=$sucursal_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$sucursal_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$sucursal_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$sucursal_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$sucursal_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$sucursal_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(sucursal_session $sucursal_session){
		$sucursal_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$sucursal_session->strStyleDivHeader='display:none';			
		$sucursal_session->strStyleDivContent='width:93%;height:100%';	
		$sucursal_session->strStyleDivOpcionesBanner='display:none';	
		$sucursal_session->strStyleDivExpandirColapsar='display:none';	
		$sucursal_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(sucursal_control $sucursal_control_session){
		$this->idNuevo=$sucursal_control_session->idNuevo;
		$this->sucursalActual=$sucursal_control_session->sucursalActual;
		$this->sucursal=$sucursal_control_session->sucursal;
		$this->sucursalClase=$sucursal_control_session->sucursalClase;
		$this->sucursals=$sucursal_control_session->sucursals;
		$this->sucursalsEliminados=$sucursal_control_session->sucursalsEliminados;
		$this->sucursal=$sucursal_control_session->sucursal;
		$this->sucursalsReporte=$sucursal_control_session->sucursalsReporte;
		$this->sucursalsSeleccionados=$sucursal_control_session->sucursalsSeleccionados;
		$this->arrOrderBy=$sucursal_control_session->arrOrderBy;
		$this->arrOrderByRel=$sucursal_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$sucursal_control_session->arrHistoryWebs;
		$this->arrSessionBases=$sucursal_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadsucursal=$sucursal_control_session->strTypeOnLoadsucursal;
		$this->strTipoPaginaAuxiliarsucursal=$sucursal_control_session->strTipoPaginaAuxiliarsucursal;
		$this->strTipoUsuarioAuxiliarsucursal=$sucursal_control_session->strTipoUsuarioAuxiliarsucursal;	
		
		$this->bitEsPopup=$sucursal_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$sucursal_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$sucursal_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$sucursal_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$sucursal_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$sucursal_control_session->strSufijo;
		$this->bitEsRelaciones=$sucursal_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$sucursal_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$sucursal_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$sucursal_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$sucursal_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$sucursal_control_session->strTituloTabla;
		$this->strTituloPathPagina=$sucursal_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$sucursal_control_session->strTituloPathElementoActual;
		
		if($this->sucursalLogic==null) {			
			$this->sucursalLogic=new sucursal_logic();
		}
		
		
		if($this->sucursalClase==null) {
			$this->sucursalClase=new sucursal();	
		}
		
		$this->sucursalLogic->setsucursal($this->sucursalClase);
		
		
		if($this->sucursals==null) {
			$this->sucursals=array();	
		}
		
		$this->sucursalLogic->setsucursals($this->sucursals);
		
		
		$this->strTipoView=$sucursal_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$sucursal_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$sucursal_control_session->datosCliente;
		$this->strAccionBusqueda=$sucursal_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$sucursal_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$sucursal_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$sucursal_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$sucursal_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$sucursal_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$sucursal_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$sucursal_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$sucursal_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$sucursal_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$sucursal_control_session->strTipoPaginacion;
		$this->strTipoAccion=$sucursal_control_session->strTipoAccion;
		$this->tiposReportes=$sucursal_control_session->tiposReportes;
		$this->tiposReporte=$sucursal_control_session->tiposReporte;
		$this->tiposAcciones=$sucursal_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$sucursal_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$sucursal_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$sucursal_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$sucursal_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$sucursal_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$sucursal_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$sucursal_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$sucursal_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$sucursal_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$sucursal_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$sucursal_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$sucursal_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$sucursal_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$sucursal_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$sucursal_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$sucursal_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$sucursal_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$sucursal_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$sucursal_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$sucursal_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$sucursal_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$sucursal_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$sucursal_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$sucursal_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$sucursal_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$sucursal_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$sucursal_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$sucursal_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$sucursal_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$sucursal_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$sucursal_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$sucursal_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$sucursal_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$sucursal_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$sucursal_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$sucursal_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$sucursal_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$sucursal_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$sucursal_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$sucursal_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$sucursal_control_session->resumenUsuarioActual;	
		$this->moduloActual=$sucursal_control_session->moduloActual;	
		$this->opcionActual=$sucursal_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$sucursal_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$sucursal_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$sucursal_session=unserialize($this->Session->read(sucursal_util::$STR_SESSION_NAME));
				
		if($sucursal_session==null) {
			$sucursal_session=new sucursal_session();
		}
		
		$this->strStyleDivArbol=$sucursal_session->strStyleDivArbol;	
		$this->strStyleDivContent=$sucursal_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$sucursal_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$sucursal_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$sucursal_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$sucursal_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$sucursal_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$sucursal_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$sucursal_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$sucursal_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$sucursal_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$sucursal_control_session->strMensajeid_empresa;
		$this->strMensajeid_pais=$sucursal_control_session->strMensajeid_pais;
		$this->strMensajeid_ciudad=$sucursal_control_session->strMensajeid_ciudad;
		$this->strMensajenombre=$sucursal_control_session->strMensajenombre;
		$this->strMensajeregistro_tributario=$sucursal_control_session->strMensajeregistro_tributario;
		$this->strMensajeregistro_sucursalrial=$sucursal_control_session->strMensajeregistro_sucursalrial;
		$this->strMensajedireccion1=$sucursal_control_session->strMensajedireccion1;
		$this->strMensajedireccion2=$sucursal_control_session->strMensajedireccion2;
		$this->strMensajedireccion3=$sucursal_control_session->strMensajedireccion3;
		$this->strMensajetelefono1=$sucursal_control_session->strMensajetelefono1;
		$this->strMensajecelular=$sucursal_control_session->strMensajecelular;
		$this->strMensajecorreo_electronico=$sucursal_control_session->strMensajecorreo_electronico;
		$this->strMensajesitio_web=$sucursal_control_session->strMensajesitio_web;
		$this->strMensajecodigo_postal=$sucursal_control_session->strMensajecodigo_postal;
		$this->strMensajefax=$sucursal_control_session->strMensajefax;
		$this->strMensajebarrio_distrito=$sucursal_control_session->strMensajebarrio_distrito;
		$this->strMensajelogo=$sucursal_control_session->strMensajelogo;
		$this->strMensajebase_de_datos=$sucursal_control_session->strMensajebase_de_datos;
		$this->strMensajecondicion=$sucursal_control_session->strMensajecondicion;
		$this->strMensajeicono_asociado=$sucursal_control_session->strMensajeicono_asociado;
		$this->strMensajefolder_sucursal=$sucursal_control_session->strMensajefolder_sucursal;
			
		
		$this->empresasFK=$sucursal_control_session->empresasFK;
		$this->idempresaDefaultFK=$sucursal_control_session->idempresaDefaultFK;
		$this->paissFK=$sucursal_control_session->paissFK;
		$this->idpaisDefaultFK=$sucursal_control_session->idpaisDefaultFK;
		$this->ciudadsFK=$sucursal_control_session->ciudadsFK;
		$this->idciudadDefaultFK=$sucursal_control_session->idciudadDefaultFK;
		
		
		$this->strVisibleFK_Idciudad=$sucursal_control_session->strVisibleFK_Idciudad;
		$this->strVisibleFK_Idempresa=$sucursal_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idpais=$sucursal_control_session->strVisibleFK_Idpais;
		
		
		
		
		$this->id_ciudadFK_Idciudad=$sucursal_control_session->id_ciudadFK_Idciudad;
		$this->id_empresaFK_Idempresa=$sucursal_control_session->id_empresaFK_Idempresa;
		$this->id_paisFK_Idpais=$sucursal_control_session->id_paisFK_Idpais;

		
		
		
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
	
	public function getsucursalControllerAdditional() {
		return $this->sucursalControllerAdditional;
	}

	public function setsucursalControllerAdditional($sucursalControllerAdditional) {
		$this->sucursalControllerAdditional = $sucursalControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getsucursalActual() : sucursal {
		return $this->sucursalActual;
	}

	public function setsucursalActual(sucursal $sucursalActual) {
		$this->sucursalActual = $sucursalActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidsucursal() : int {
		return $this->idsucursal;
	}

	public function setidsucursal(int $idsucursal) {
		$this->idsucursal = $idsucursal;
	}
	
	public function getsucursal() : sucursal {
		return $this->sucursal;
	}

	public function setsucursal(sucursal $sucursal) {
		$this->sucursal = $sucursal;
	}
		
	public function getsucursalLogic() : sucursal_logic {		
		return $this->sucursalLogic;
	}

	public function setsucursalLogic(sucursal_logic $sucursalLogic) {
		$this->sucursalLogic = $sucursalLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getsucursalsModel() {		
		try {						
			/*sucursalsModel.setWrappedData(sucursalLogic->getsucursals());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->sucursalsModel;
	}
	
	public function setsucursalsModel($sucursalsModel) {
		$this->sucursalsModel = $sucursalsModel;
	}
	
	public function getsucursals() : array {		
		return $this->sucursals;
	}
	
	public function setsucursals(array $sucursals) {
		$this->sucursals= $sucursals;
	}
	
	public function getsucursalsEliminados() : array {		
		return $this->sucursalsEliminados;
	}
	
	public function setsucursalsEliminados(array $sucursalsEliminados) {
		$this->sucursalsEliminados= $sucursalsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getsucursalActualFromListDataModel() {
		try {
			/*$sucursalClase= $this->sucursalsModel->getRowData();*/
			
			/*return $sucursal;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
