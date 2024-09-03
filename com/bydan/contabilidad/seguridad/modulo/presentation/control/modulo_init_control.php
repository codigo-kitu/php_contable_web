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

namespace com\bydan\contabilidad\seguridad\modulo\presentation\control;

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

use com\bydan\contabilidad\seguridad\modulo\business\entity\modulo;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/modulo/util/modulo_carga.php');
use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;

use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_param_return;
use com\bydan\contabilidad\seguridad\modulo\business\logic\modulo_logic;
use com\bydan\contabilidad\seguridad\modulo\presentation\session\modulo_session;


//FK


use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_carga;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_util;

use com\bydan\contabilidad\seguridad\paquete\business\entity\paquete;
use com\bydan\contabilidad\seguridad\paquete\business\logic\paquete_logic;
use com\bydan\contabilidad\seguridad\paquete\util\paquete_carga;
use com\bydan\contabilidad\seguridad\paquete\util\paquete_util;

use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\entity\tipo_tecla_mascara;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\business\logic\tipo_tecla_mascara_logic;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util\tipo_tecla_mascara_carga;
use com\bydan\contabilidad\seguridad\tipo_tecla_mascara\util\tipo_tecla_mascara_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
modulo_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
modulo_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
modulo_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
modulo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*modulo_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class modulo_init_control extends ControllerBase {	
	
	public $moduloClase=null;	
	public $modulosModel=null;	
	public $modulosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idmodulo=0;	
	public ?int $idmoduloActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $moduloLogic=null;
	
	public $moduloActual=null;	
	
	public $modulo=null;
	public $modulos=null;
	public $modulosEliminados=array();
	public $modulosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $modulosLocal=array();
	public ?array $modulosReporte=null;
	public ?array $modulosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadmodulo='onload';
	public string $strTipoPaginaAuxiliarmodulo='none';
	public string $strTipoUsuarioAuxiliarmodulo='none';
		
	public $moduloReturnGeneral=null;
	public $moduloParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $moduloModel=null;
	public $moduloControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_sistema='';
	public string $strMensajeid_paquete='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajeid_tipo_tecla_mascara='';
	public string $strMensajetecla='';
	public string $strMensajeestado='';
	public string $strMensajeorden='';
	public string $strMensajedescripcion='';
	
	
	public string $strVisibleFK_Idpaquete='display:table-row';
	public string $strVisibleFK_Idsistema='display:table-row';
	public string $strVisibleFK_Idtipo_tecla_mascara='display:table-row';

	
	public array $sistemasFK=array();

	public function getsistemasFK():array {
		return $this->sistemasFK;
	}

	public function setsistemasFK(array $sistemasFK) {
		$this->sistemasFK = $sistemasFK;
	}

	public int $idsistemaDefaultFK=-1;

	public function getIdsistemaDefaultFK():int {
		return $this->idsistemaDefaultFK;
	}

	public function setIdsistemaDefaultFK(int $idsistemaDefaultFK) {
		$this->idsistemaDefaultFK = $idsistemaDefaultFK;
	}

	public array $paquetesFK=array();

	public function getpaquetesFK():array {
		return $this->paquetesFK;
	}

	public function setpaquetesFK(array $paquetesFK) {
		$this->paquetesFK = $paquetesFK;
	}

	public int $idpaqueteDefaultFK=-1;

	public function getIdpaqueteDefaultFK():int {
		return $this->idpaqueteDefaultFK;
	}

	public function setIdpaqueteDefaultFK(int $idpaqueteDefaultFK) {
		$this->idpaqueteDefaultFK = $idpaqueteDefaultFK;
	}

	public array $tipo_tecla_mascarasFK=array();

	public function gettipo_tecla_mascarasFK():array {
		return $this->tipo_tecla_mascarasFK;
	}

	public function settipo_tecla_mascarasFK(array $tipo_tecla_mascarasFK) {
		$this->tipo_tecla_mascarasFK = $tipo_tecla_mascarasFK;
	}

	public int $idtipo_tecla_mascaraDefaultFK=-1;

	public function getIdtipo_tecla_mascaraDefaultFK():int {
		return $this->idtipo_tecla_mascaraDefaultFK;
	}

	public function setIdtipo_tecla_mascaraDefaultFK(int $idtipo_tecla_mascaraDefaultFK) {
		$this->idtipo_tecla_mascaraDefaultFK = $idtipo_tecla_mascaraDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_paqueteFK_Idpaquete=null;

	public  $id_sistemaFK_Idsistema=null;

	public  $id_tipo_tecla_mascaraFK_Idtipo_tecla_mascara=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->moduloLogic==null) {
				$this->moduloLogic=new modulo_logic();
			}
			
		} else {
			if($this->moduloLogic==null) {
				$this->moduloLogic=new modulo_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->moduloClase==null) {
				$this->moduloClase=new modulo();
			}
			
			$this->moduloClase->setId(0);	
				
				
			$this->moduloClase->setid_sistema(-1);	
			$this->moduloClase->setid_paquete(-1);	
			$this->moduloClase->setcodigo('');	
			$this->moduloClase->setnombre('');	
			$this->moduloClase->setid_tipo_tecla_mascara(-1);	
			$this->moduloClase->settecla('');	
			$this->moduloClase->setestado(false);	
			$this->moduloClase->setorden(0);	
			$this->moduloClase->setdescripcion('');	
			
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
		$this->prepararEjecutarMantenimientoBase('modulo');
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
		$this->cargarParametrosReporteBase('modulo');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('modulo');
	}
	
	public function actualizarControllerConReturnGeneral(modulo_param_return $moduloReturnGeneral) {
		if($moduloReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesmodulosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$moduloReturnGeneral->getsMensajeProceso();
		}
		
		if($moduloReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$moduloReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($moduloReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$moduloReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$moduloReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($moduloReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($moduloReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$moduloReturnGeneral->getsFuncionJs();
		}
		
		if($moduloReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(modulo_session $modulo_session){
		$this->strStyleDivArbol=$modulo_session->strStyleDivArbol;	
		$this->strStyleDivContent=$modulo_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$modulo_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$modulo_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$modulo_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$modulo_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$modulo_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(modulo_session $modulo_session){
		$modulo_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$modulo_session->strStyleDivHeader='display:none';			
		$modulo_session->strStyleDivContent='width:93%;height:100%';	
		$modulo_session->strStyleDivOpcionesBanner='display:none';	
		$modulo_session->strStyleDivExpandirColapsar='display:none';	
		$modulo_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(modulo_control $modulo_control_session){
		$this->idNuevo=$modulo_control_session->idNuevo;
		$this->moduloActual=$modulo_control_session->moduloActual;
		$this->modulo=$modulo_control_session->modulo;
		$this->moduloClase=$modulo_control_session->moduloClase;
		$this->modulos=$modulo_control_session->modulos;
		$this->modulosEliminados=$modulo_control_session->modulosEliminados;
		$this->modulo=$modulo_control_session->modulo;
		$this->modulosReporte=$modulo_control_session->modulosReporte;
		$this->modulosSeleccionados=$modulo_control_session->modulosSeleccionados;
		$this->arrOrderBy=$modulo_control_session->arrOrderBy;
		$this->arrOrderByRel=$modulo_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$modulo_control_session->arrHistoryWebs;
		$this->arrSessionBases=$modulo_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadmodulo=$modulo_control_session->strTypeOnLoadmodulo;
		$this->strTipoPaginaAuxiliarmodulo=$modulo_control_session->strTipoPaginaAuxiliarmodulo;
		$this->strTipoUsuarioAuxiliarmodulo=$modulo_control_session->strTipoUsuarioAuxiliarmodulo;	
		
		$this->bitEsPopup=$modulo_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$modulo_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$modulo_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$modulo_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$modulo_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$modulo_control_session->strSufijo;
		$this->bitEsRelaciones=$modulo_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$modulo_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$modulo_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$modulo_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$modulo_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$modulo_control_session->strTituloTabla;
		$this->strTituloPathPagina=$modulo_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$modulo_control_session->strTituloPathElementoActual;
		
		if($this->moduloLogic==null) {			
			$this->moduloLogic=new modulo_logic();
		}
		
		
		if($this->moduloClase==null) {
			$this->moduloClase=new modulo();	
		}
		
		$this->moduloLogic->setmodulo($this->moduloClase);
		
		
		if($this->modulos==null) {
			$this->modulos=array();	
		}
		
		$this->moduloLogic->setmodulos($this->modulos);
		
		
		$this->strTipoView=$modulo_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$modulo_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$modulo_control_session->datosCliente;
		$this->strAccionBusqueda=$modulo_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$modulo_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$modulo_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$modulo_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$modulo_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$modulo_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$modulo_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$modulo_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$modulo_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$modulo_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$modulo_control_session->strTipoPaginacion;
		$this->strTipoAccion=$modulo_control_session->strTipoAccion;
		$this->tiposReportes=$modulo_control_session->tiposReportes;
		$this->tiposReporte=$modulo_control_session->tiposReporte;
		$this->tiposAcciones=$modulo_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$modulo_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$modulo_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$modulo_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$modulo_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$modulo_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$modulo_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$modulo_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$modulo_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$modulo_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$modulo_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$modulo_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$modulo_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$modulo_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$modulo_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$modulo_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$modulo_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$modulo_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$modulo_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$modulo_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$modulo_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$modulo_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$modulo_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$modulo_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$modulo_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$modulo_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$modulo_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$modulo_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$modulo_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$modulo_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$modulo_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$modulo_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$modulo_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$modulo_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$modulo_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$modulo_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$modulo_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$modulo_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$modulo_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$modulo_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$modulo_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$modulo_control_session->resumenUsuarioActual;	
		$this->moduloActual=$modulo_control_session->moduloActual;	
		$this->opcionActual=$modulo_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$modulo_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$modulo_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$modulo_session=unserialize($this->Session->read(modulo_util::$STR_SESSION_NAME));
				
		if($modulo_session==null) {
			$modulo_session=new modulo_session();
		}
		
		$this->strStyleDivArbol=$modulo_session->strStyleDivArbol;	
		$this->strStyleDivContent=$modulo_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$modulo_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$modulo_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$modulo_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$modulo_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$modulo_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$modulo_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$modulo_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$modulo_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$modulo_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_sistema=$modulo_control_session->strMensajeid_sistema;
		$this->strMensajeid_paquete=$modulo_control_session->strMensajeid_paquete;
		$this->strMensajecodigo=$modulo_control_session->strMensajecodigo;
		$this->strMensajenombre=$modulo_control_session->strMensajenombre;
		$this->strMensajeid_tipo_tecla_mascara=$modulo_control_session->strMensajeid_tipo_tecla_mascara;
		$this->strMensajetecla=$modulo_control_session->strMensajetecla;
		$this->strMensajeestado=$modulo_control_session->strMensajeestado;
		$this->strMensajeorden=$modulo_control_session->strMensajeorden;
		$this->strMensajedescripcion=$modulo_control_session->strMensajedescripcion;
			
		
		$this->sistemasFK=$modulo_control_session->sistemasFK;
		$this->idsistemaDefaultFK=$modulo_control_session->idsistemaDefaultFK;
		$this->paquetesFK=$modulo_control_session->paquetesFK;
		$this->idpaqueteDefaultFK=$modulo_control_session->idpaqueteDefaultFK;
		$this->tipo_tecla_mascarasFK=$modulo_control_session->tipo_tecla_mascarasFK;
		$this->idtipo_tecla_mascaraDefaultFK=$modulo_control_session->idtipo_tecla_mascaraDefaultFK;
		
		
		$this->strVisibleFK_Idpaquete=$modulo_control_session->strVisibleFK_Idpaquete;
		$this->strVisibleFK_Idsistema=$modulo_control_session->strVisibleFK_Idsistema;
		$this->strVisibleFK_Idtipo_tecla_mascara=$modulo_control_session->strVisibleFK_Idtipo_tecla_mascara;
		
		
		
		
		$this->id_paqueteFK_Idpaquete=$modulo_control_session->id_paqueteFK_Idpaquete;
		$this->id_sistemaFK_Idsistema=$modulo_control_session->id_sistemaFK_Idsistema;
		$this->id_tipo_tecla_mascaraFK_Idtipo_tecla_mascara=$modulo_control_session->id_tipo_tecla_mascaraFK_Idtipo_tecla_mascara;

		
		
		
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
	
	public function getmoduloControllerAdditional() {
		return $this->moduloControllerAdditional;
	}

	public function setmoduloControllerAdditional($moduloControllerAdditional) {
		$this->moduloControllerAdditional = $moduloControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getmoduloActual() : modulo {
		return $this->moduloActual;
	}

	public function setmoduloActual(modulo $moduloActual) {
		$this->moduloActual = $moduloActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidmodulo() : int {
		return $this->idmodulo;
	}

	public function setidmodulo(int $idmodulo) {
		$this->idmodulo = $idmodulo;
	}
	
	public function getmodulo() : modulo {
		return $this->modulo;
	}

	public function setmodulo(modulo $modulo) {
		$this->modulo = $modulo;
	}
		
	public function getmoduloLogic() : modulo_logic {		
		return $this->moduloLogic;
	}

	public function setmoduloLogic(modulo_logic $moduloLogic) {
		$this->moduloLogic = $moduloLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getmodulosModel() {		
		try {						
			/*modulosModel.setWrappedData(moduloLogic->getmodulos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->modulosModel;
	}
	
	public function setmodulosModel($modulosModel) {
		$this->modulosModel = $modulosModel;
	}
	
	public function getmodulos() : array {		
		return $this->modulos;
	}
	
	public function setmodulos(array $modulos) {
		$this->modulos= $modulos;
	}
	
	public function getmodulosEliminados() : array {		
		return $this->modulosEliminados;
	}
	
	public function setmodulosEliminados(array $modulosEliminados) {
		$this->modulosEliminados= $modulosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getmoduloActualFromListDataModel() {
		try {
			/*$moduloClase= $this->modulosModel->getRowData();*/
			
			/*return $modulo;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
