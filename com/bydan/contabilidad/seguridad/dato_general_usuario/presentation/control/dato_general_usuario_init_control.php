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

namespace com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\control;

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

use com\bydan\contabilidad\seguridad\dato_general_usuario\business\entity\dato_general_usuario;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/dato_general_usuario/util/dato_general_usuario_carga.php');
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;

use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_param_return;
use com\bydan\contabilidad\seguridad\dato_general_usuario\business\logic\dato_general_usuario_logic;
use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\session\dato_general_usuario_session;


//FK


use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\seguridad\provincia\business\entity\provincia;
use com\bydan\contabilidad\seguridad\provincia\business\logic\provincia_logic;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_carga;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;

use com\bydan\contabilidad\seguridad\ciudad\business\entity\ciudad;
use com\bydan\contabilidad\seguridad\ciudad\business\logic\ciudad_logic;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_carga;
use com\bydan\contabilidad\seguridad\ciudad\util\ciudad_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
dato_general_usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
dato_general_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
dato_general_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
dato_general_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*dato_general_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class dato_general_usuario_init_control extends ControllerBase {	
	
	public $dato_general_usuarioClase=null;	
	public $dato_general_usuariosModel=null;	
	public $dato_general_usuariosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $iddato_general_usuario=0;	
	public ?int $iddato_general_usuarioActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $dato_general_usuarioLogic=null;
	
	public $dato_general_usuarioActual=null;	
	
	public $dato_general_usuario=null;
	public $dato_general_usuarios=null;
	public $dato_general_usuariosEliminados=array();
	public $dato_general_usuariosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $dato_general_usuariosLocal=array();
	public ?array $dato_general_usuariosReporte=null;
	public ?array $dato_general_usuariosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoaddato_general_usuario='onload';
	public string $strTipoPaginaAuxiliardato_general_usuario='none';
	public string $strTipoUsuarioAuxiliardato_general_usuario='none';
		
	public $dato_general_usuarioReturnGeneral=null;
	public $dato_general_usuarioParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $dato_general_usuarioModel=null;
	public $dato_general_usuarioControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_pais='';
	public string $strMensajeid_provincia='';
	public string $strMensajeid_ciudad='';
	public string $strMensajecedula='';
	public string $strMensajeapellidos='';
	public string $strMensajenombres='';
	public string $strMensajetelefono='';
	public string $strMensajetelefono_movil='';
	public string $strMensajee_mail='';
	public string $strMensajeurl='';
	public string $strMensajefecha_nacimiento='';
	public string $strMensajedireccion='';
	
	
	public string $strVisibleFK_Idciudad='display:table-row';
	public string $strVisibleFK_Idpais='display:table-row';
	public string $strVisibleFK_Idprovincia='display:table-row';
	public string $strVisibleFK_Idusuarioid='display:table-row';

	
	public array $usuariosFK=array();

	public function getusuariosFK():array {
		return $this->usuariosFK;
	}

	public function setusuariosFK(array $usuariosFK) {
		$this->usuariosFK = $usuariosFK;
	}

	public int $idusuarioDefaultFK=-1;

	public function getIdusuarioDefaultFK():int {
		return $this->idusuarioDefaultFK;
	}

	public function setIdusuarioDefaultFK(int $idusuarioDefaultFK) {
		$this->idusuarioDefaultFK = $idusuarioDefaultFK;
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

	public array $provinciasFK=array();

	public function getprovinciasFK():array {
		return $this->provinciasFK;
	}

	public function setprovinciasFK(array $provinciasFK) {
		$this->provinciasFK = $provinciasFK;
	}

	public int $idprovinciaDefaultFK=-1;

	public function getIdprovinciaDefaultFK():int {
		return $this->idprovinciaDefaultFK;
	}

	public function setIdprovinciaDefaultFK(int $idprovinciaDefaultFK) {
		$this->idprovinciaDefaultFK = $idprovinciaDefaultFK;
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

	public  $id_provinciaFK_Idprovincia=null;

	public  $idFK_Idusuarioid=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->dato_general_usuarioLogic==null) {
				$this->dato_general_usuarioLogic=new dato_general_usuario_logic();
			}
			
		} else {
			if($this->dato_general_usuarioLogic==null) {
				$this->dato_general_usuarioLogic=new dato_general_usuario_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->dato_general_usuarioClase==null) {
				$this->dato_general_usuarioClase=new dato_general_usuario();
			}
			
			$this->dato_general_usuarioClase->setId(-1);	
				
				
			$this->dato_general_usuarioClase->setid_pais(-1);	
			$this->dato_general_usuarioClase->setid_provincia(-1);	
			$this->dato_general_usuarioClase->setid_ciudad(-1);	
			$this->dato_general_usuarioClase->setcedula('');	
			$this->dato_general_usuarioClase->setapellidos('');	
			$this->dato_general_usuarioClase->setnombres('');	
			$this->dato_general_usuarioClase->settelefono('');	
			$this->dato_general_usuarioClase->settelefono_movil('');	
			$this->dato_general_usuarioClase->sete_mail('');	
			$this->dato_general_usuarioClase->seturl('');	
			$this->dato_general_usuarioClase->setfecha_nacimiento(date('Y-m-d'));	
			$this->dato_general_usuarioClase->setdireccion('');	
			
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
		$this->prepararEjecutarMantenimientoBase('dato_general_usuario');
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
		$this->cargarParametrosReporteBase('dato_general_usuario');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('dato_general_usuario');
	}
	
	public function actualizarControllerConReturnGeneral(dato_general_usuario_param_return $dato_general_usuarioReturnGeneral) {
		if($dato_general_usuarioReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesdato_general_usuariosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$dato_general_usuarioReturnGeneral->getsMensajeProceso();
		}
		
		if($dato_general_usuarioReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$dato_general_usuarioReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($dato_general_usuarioReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$dato_general_usuarioReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$dato_general_usuarioReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($dato_general_usuarioReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($dato_general_usuarioReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$dato_general_usuarioReturnGeneral->getsFuncionJs();
		}
		
		if($dato_general_usuarioReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(dato_general_usuario_session $dato_general_usuario_session){
		$this->strStyleDivArbol=$dato_general_usuario_session->strStyleDivArbol;	
		$this->strStyleDivContent=$dato_general_usuario_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$dato_general_usuario_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$dato_general_usuario_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$dato_general_usuario_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$dato_general_usuario_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$dato_general_usuario_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(dato_general_usuario_session $dato_general_usuario_session){
		$dato_general_usuario_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$dato_general_usuario_session->strStyleDivHeader='display:none';			
		$dato_general_usuario_session->strStyleDivContent='width:93%;height:100%';	
		$dato_general_usuario_session->strStyleDivOpcionesBanner='display:none';	
		$dato_general_usuario_session->strStyleDivExpandirColapsar='display:none';	
		$dato_general_usuario_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(dato_general_usuario_control $dato_general_usuario_control_session){
		$this->idNuevo=$dato_general_usuario_control_session->idNuevo;
		$this->dato_general_usuarioActual=$dato_general_usuario_control_session->dato_general_usuarioActual;
		$this->dato_general_usuario=$dato_general_usuario_control_session->dato_general_usuario;
		$this->dato_general_usuarioClase=$dato_general_usuario_control_session->dato_general_usuarioClase;
		$this->dato_general_usuarios=$dato_general_usuario_control_session->dato_general_usuarios;
		$this->dato_general_usuariosEliminados=$dato_general_usuario_control_session->dato_general_usuariosEliminados;
		$this->dato_general_usuario=$dato_general_usuario_control_session->dato_general_usuario;
		$this->dato_general_usuariosReporte=$dato_general_usuario_control_session->dato_general_usuariosReporte;
		$this->dato_general_usuariosSeleccionados=$dato_general_usuario_control_session->dato_general_usuariosSeleccionados;
		$this->arrOrderBy=$dato_general_usuario_control_session->arrOrderBy;
		$this->arrOrderByRel=$dato_general_usuario_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$dato_general_usuario_control_session->arrHistoryWebs;
		$this->arrSessionBases=$dato_general_usuario_control_session->arrSessionBases;		
		
		$this->strTypeOnLoaddato_general_usuario=$dato_general_usuario_control_session->strTypeOnLoaddato_general_usuario;
		$this->strTipoPaginaAuxiliardato_general_usuario=$dato_general_usuario_control_session->strTipoPaginaAuxiliardato_general_usuario;
		$this->strTipoUsuarioAuxiliardato_general_usuario=$dato_general_usuario_control_session->strTipoUsuarioAuxiliardato_general_usuario;	
		
		$this->bitEsPopup=$dato_general_usuario_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$dato_general_usuario_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$dato_general_usuario_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$dato_general_usuario_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$dato_general_usuario_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$dato_general_usuario_control_session->strSufijo;
		$this->bitEsRelaciones=$dato_general_usuario_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$dato_general_usuario_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$dato_general_usuario_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$dato_general_usuario_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$dato_general_usuario_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$dato_general_usuario_control_session->strTituloTabla;
		$this->strTituloPathPagina=$dato_general_usuario_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$dato_general_usuario_control_session->strTituloPathElementoActual;
		
		if($this->dato_general_usuarioLogic==null) {			
			$this->dato_general_usuarioLogic=new dato_general_usuario_logic();
		}
		
		
		if($this->dato_general_usuarioClase==null) {
			$this->dato_general_usuarioClase=new dato_general_usuario();	
		}
		
		$this->dato_general_usuarioLogic->setdato_general_usuario($this->dato_general_usuarioClase);
		
		
		if($this->dato_general_usuarios==null) {
			$this->dato_general_usuarios=array();	
		}
		
		$this->dato_general_usuarioLogic->setdato_general_usuarios($this->dato_general_usuarios);
		
		
		$this->strTipoView=$dato_general_usuario_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$dato_general_usuario_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$dato_general_usuario_control_session->datosCliente;
		$this->strAccionBusqueda=$dato_general_usuario_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$dato_general_usuario_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$dato_general_usuario_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$dato_general_usuario_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$dato_general_usuario_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$dato_general_usuario_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$dato_general_usuario_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$dato_general_usuario_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$dato_general_usuario_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$dato_general_usuario_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$dato_general_usuario_control_session->strTipoPaginacion;
		$this->strTipoAccion=$dato_general_usuario_control_session->strTipoAccion;
		$this->tiposReportes=$dato_general_usuario_control_session->tiposReportes;
		$this->tiposReporte=$dato_general_usuario_control_session->tiposReporte;
		$this->tiposAcciones=$dato_general_usuario_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$dato_general_usuario_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$dato_general_usuario_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$dato_general_usuario_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$dato_general_usuario_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$dato_general_usuario_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$dato_general_usuario_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$dato_general_usuario_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$dato_general_usuario_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$dato_general_usuario_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$dato_general_usuario_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$dato_general_usuario_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$dato_general_usuario_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$dato_general_usuario_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$dato_general_usuario_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$dato_general_usuario_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$dato_general_usuario_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$dato_general_usuario_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$dato_general_usuario_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$dato_general_usuario_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$dato_general_usuario_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$dato_general_usuario_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$dato_general_usuario_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$dato_general_usuario_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$dato_general_usuario_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$dato_general_usuario_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$dato_general_usuario_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$dato_general_usuario_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$dato_general_usuario_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$dato_general_usuario_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$dato_general_usuario_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$dato_general_usuario_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$dato_general_usuario_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$dato_general_usuario_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$dato_general_usuario_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$dato_general_usuario_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$dato_general_usuario_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$dato_general_usuario_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$dato_general_usuario_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$dato_general_usuario_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$dato_general_usuario_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$dato_general_usuario_control_session->resumenUsuarioActual;	
		$this->moduloActual=$dato_general_usuario_control_session->moduloActual;	
		$this->opcionActual=$dato_general_usuario_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$dato_general_usuario_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$dato_general_usuario_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$dato_general_usuario_session=unserialize($this->Session->read(dato_general_usuario_util::$STR_SESSION_NAME));
				
		if($dato_general_usuario_session==null) {
			$dato_general_usuario_session=new dato_general_usuario_session();
		}
		
		$this->strStyleDivArbol=$dato_general_usuario_session->strStyleDivArbol;	
		$this->strStyleDivContent=$dato_general_usuario_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$dato_general_usuario_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$dato_general_usuario_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$dato_general_usuario_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$dato_general_usuario_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$dato_general_usuario_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$dato_general_usuario_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$dato_general_usuario_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$dato_general_usuario_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$dato_general_usuario_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_pais=$dato_general_usuario_control_session->strMensajeid_pais;
		$this->strMensajeid_provincia=$dato_general_usuario_control_session->strMensajeid_provincia;
		$this->strMensajeid_ciudad=$dato_general_usuario_control_session->strMensajeid_ciudad;
		$this->strMensajecedula=$dato_general_usuario_control_session->strMensajecedula;
		$this->strMensajeapellidos=$dato_general_usuario_control_session->strMensajeapellidos;
		$this->strMensajenombres=$dato_general_usuario_control_session->strMensajenombres;
		$this->strMensajetelefono=$dato_general_usuario_control_session->strMensajetelefono;
		$this->strMensajetelefono_movil=$dato_general_usuario_control_session->strMensajetelefono_movil;
		$this->strMensajee_mail=$dato_general_usuario_control_session->strMensajee_mail;
		$this->strMensajeurl=$dato_general_usuario_control_session->strMensajeurl;
		$this->strMensajefecha_nacimiento=$dato_general_usuario_control_session->strMensajefecha_nacimiento;
		$this->strMensajedireccion=$dato_general_usuario_control_session->strMensajedireccion;
			
		
		$this->usuariosFK=$dato_general_usuario_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$dato_general_usuario_control_session->idusuarioDefaultFK;
		$this->paissFK=$dato_general_usuario_control_session->paissFK;
		$this->idpaisDefaultFK=$dato_general_usuario_control_session->idpaisDefaultFK;
		$this->provinciasFK=$dato_general_usuario_control_session->provinciasFK;
		$this->idprovinciaDefaultFK=$dato_general_usuario_control_session->idprovinciaDefaultFK;
		$this->ciudadsFK=$dato_general_usuario_control_session->ciudadsFK;
		$this->idciudadDefaultFK=$dato_general_usuario_control_session->idciudadDefaultFK;
		
		
		$this->strVisibleFK_Idciudad=$dato_general_usuario_control_session->strVisibleFK_Idciudad;
		$this->strVisibleFK_Idpais=$dato_general_usuario_control_session->strVisibleFK_Idpais;
		$this->strVisibleFK_Idprovincia=$dato_general_usuario_control_session->strVisibleFK_Idprovincia;
		$this->strVisibleFK_Idusuarioid=$dato_general_usuario_control_session->strVisibleFK_Idusuarioid;
		
		
		
		
		$this->id_ciudadFK_Idciudad=$dato_general_usuario_control_session->id_ciudadFK_Idciudad;
		$this->id_paisFK_Idpais=$dato_general_usuario_control_session->id_paisFK_Idpais;
		$this->id_provinciaFK_Idprovincia=$dato_general_usuario_control_session->id_provinciaFK_Idprovincia;
		$this->idFK_Idusuarioid=$dato_general_usuario_control_session->idFK_Idusuarioid;

		
		
		
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
	
	public function getdato_general_usuarioControllerAdditional() {
		return $this->dato_general_usuarioControllerAdditional;
	}

	public function setdato_general_usuarioControllerAdditional($dato_general_usuarioControllerAdditional) {
		$this->dato_general_usuarioControllerAdditional = $dato_general_usuarioControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getdato_general_usuarioActual() : dato_general_usuario {
		return $this->dato_general_usuarioActual;
	}

	public function setdato_general_usuarioActual(dato_general_usuario $dato_general_usuarioActual) {
		$this->dato_general_usuarioActual = $dato_general_usuarioActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getiddato_general_usuario() : int {
		return $this->iddato_general_usuario;
	}

	public function setiddato_general_usuario(int $iddato_general_usuario) {
		$this->iddato_general_usuario = $iddato_general_usuario;
	}
	
	public function getdato_general_usuario() : dato_general_usuario {
		return $this->dato_general_usuario;
	}

	public function setdato_general_usuario(dato_general_usuario $dato_general_usuario) {
		$this->dato_general_usuario = $dato_general_usuario;
	}
		
	public function getdato_general_usuarioLogic() : dato_general_usuario_logic {		
		return $this->dato_general_usuarioLogic;
	}

	public function setdato_general_usuarioLogic(dato_general_usuario_logic $dato_general_usuarioLogic) {
		$this->dato_general_usuarioLogic = $dato_general_usuarioLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getdato_general_usuariosModel() {		
		try {						
			/*dato_general_usuariosModel.setWrappedData(dato_general_usuarioLogic->getdato_general_usuarios());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->dato_general_usuariosModel;
	}
	
	public function setdato_general_usuariosModel($dato_general_usuariosModel) {
		$this->dato_general_usuariosModel = $dato_general_usuariosModel;
	}
	
	public function getdato_general_usuarios() : array {		
		return $this->dato_general_usuarios;
	}
	
	public function setdato_general_usuarios(array $dato_general_usuarios) {
		$this->dato_general_usuarios= $dato_general_usuarios;
	}
	
	public function getdato_general_usuariosEliminados() : array {		
		return $this->dato_general_usuariosEliminados;
	}
	
	public function setdato_general_usuariosEliminados(array $dato_general_usuariosEliminados) {
		$this->dato_general_usuariosEliminados= $dato_general_usuariosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getdato_general_usuarioActualFromListDataModel() {
		try {
			/*$dato_general_usuarioClase= $this->dato_general_usuariosModel->getRowData();*/
			
			/*return $dato_general_usuario;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
