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

namespace com\bydan\contabilidad\seguridad\resumen_usuario\presentation\control;

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


use com\bydan\contabilidad\seguridad\resumen_usuario\business\entity\resumen_usuario;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/resumen_usuario/util/resumen_usuario_carga.php');
use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_carga;

use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_util;
use com\bydan\contabilidad\seguridad\resumen_usuario\util\resumen_usuario_param_return;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic_add;
use com\bydan\contabilidad\seguridad\resumen_usuario\presentation\session\resumen_usuario_session;


//FK


use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
resumen_usuario_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
resumen_usuario_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
resumen_usuario_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
resumen_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*resumen_usuario_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class resumen_usuario_init_control extends ControllerBase {	
	
	public $resumen_usuarioClase=null;	
	public $resumen_usuariosModel=null;	
	public $resumen_usuariosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idresumen_usuario=0;	
	public ?int $idresumen_usuarioActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	
	public $resumen_usuarioLogic=null;
	
	public $resumen_usuarioActual=null;	
	
	public $resumen_usuario=null;
	public $resumen_usuarios=null;
	public $resumen_usuariosEliminados=array();
	public $resumen_usuariosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $resumen_usuariosLocal=array();
	public ?array $resumen_usuariosReporte=null;
	public ?array $resumen_usuariosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadresumen_usuario='onload';
	public string $strTipoPaginaAuxiliarresumen_usuario='none';
	public string $strTipoUsuarioAuxiliarresumen_usuario='none';
		
	public $resumen_usuarioReturnGeneral=null;
	public $resumen_usuarioParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $resumen_usuarioModel=null;
	public $resumen_usuarioControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_usuario='';
	public string $strMensajenumero_ingresos='';
	public string $strMensajenumero_error_ingreso='';
	public string $strMensajenumero_intentos='';
	public string $strMensajenumero_cierres='';
	public string $strMensajenumero_reinicios='';
	public string $strMensajenumero_ingreso_actual='';
	public string $strMensajefecha_ultimo_ingreso='';
	public string $strMensajefecha_ultimo_error_ingreso='';
	public string $strMensajefecha_ultimo_intento='';
	public string $strMensajefecha_ultimo_cierre='';
	
	
	public string $strVisibleFK_Idusuario='display:table-row';

	
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

	
	
	
	
	
	
	
	
	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->resumen_usuarioLogic==null) {
				$this->resumen_usuarioLogic=new resumen_usuario_logic();
			}
			
		} else {
			if($this->resumen_usuarioLogic==null) {
				$this->resumen_usuarioLogic=new resumen_usuario_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->resumen_usuarioClase==null) {
				$this->resumen_usuarioClase=new resumen_usuario();
			}
			
			$this->resumen_usuarioClase->setId(0);	
				
				
			$this->resumen_usuarioClase->setid_usuario(-1);	
			$this->resumen_usuarioClase->setnumero_ingresos(0);	
			$this->resumen_usuarioClase->setnumero_error_ingreso(0);	
			$this->resumen_usuarioClase->setnumero_intentos(0);	
			$this->resumen_usuarioClase->setnumero_cierres(0);	
			$this->resumen_usuarioClase->setnumero_reinicios(0);	
			$this->resumen_usuarioClase->setnumero_ingreso_actual(0);	
			$this->resumen_usuarioClase->setfecha_ultimo_ingreso(date('Y-m-d'));	
			$this->resumen_usuarioClase->setfecha_ultimo_error_ingreso(date('Y-m-d'));	
			$this->resumen_usuarioClase->setfecha_ultimo_intento(date('Y-m-d'));	
			$this->resumen_usuarioClase->setfecha_ultimo_cierre(date('Y-m-d'));	
			
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
		$this->prepararEjecutarMantenimientoBase('resumen_usuario');
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
		$this->cargarParametrosReporteBase('resumen_usuario');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('resumen_usuario');
	}
	
	public function actualizarControllerConReturnGeneral(resumen_usuario_param_return $resumen_usuarioReturnGeneral) {
		if($resumen_usuarioReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesresumen_usuariosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$resumen_usuarioReturnGeneral->getsMensajeProceso();
		}
		
		if($resumen_usuarioReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$resumen_usuarioReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($resumen_usuarioReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$resumen_usuarioReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$resumen_usuarioReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($resumen_usuarioReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($resumen_usuarioReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$resumen_usuarioReturnGeneral->getsFuncionJs();
		}
		
		if($resumen_usuarioReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(resumen_usuario_session $resumen_usuario_session){
		$this->strStyleDivArbol=$resumen_usuario_session->strStyleDivArbol;	
		$this->strStyleDivContent=$resumen_usuario_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$resumen_usuario_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$resumen_usuario_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$resumen_usuario_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$resumen_usuario_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$resumen_usuario_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(resumen_usuario_session $resumen_usuario_session){
		$resumen_usuario_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$resumen_usuario_session->strStyleDivHeader='display:none';			
		$resumen_usuario_session->strStyleDivContent='width:93%;height:100%';	
		$resumen_usuario_session->strStyleDivOpcionesBanner='display:none';	
		$resumen_usuario_session->strStyleDivExpandirColapsar='display:none';	
		$resumen_usuario_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(resumen_usuario_control $resumen_usuario_control_session){
		$this->idNuevo=$resumen_usuario_control_session->idNuevo;
		$this->resumen_usuarioActual=$resumen_usuario_control_session->resumen_usuarioActual;
		$this->resumen_usuario=$resumen_usuario_control_session->resumen_usuario;
		$this->resumen_usuarioClase=$resumen_usuario_control_session->resumen_usuarioClase;
		$this->resumen_usuarios=$resumen_usuario_control_session->resumen_usuarios;
		$this->resumen_usuariosEliminados=$resumen_usuario_control_session->resumen_usuariosEliminados;
		$this->resumen_usuario=$resumen_usuario_control_session->resumen_usuario;
		$this->resumen_usuariosReporte=$resumen_usuario_control_session->resumen_usuariosReporte;
		$this->resumen_usuariosSeleccionados=$resumen_usuario_control_session->resumen_usuariosSeleccionados;
		$this->arrOrderBy=$resumen_usuario_control_session->arrOrderBy;
		$this->arrOrderByRel=$resumen_usuario_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$resumen_usuario_control_session->arrHistoryWebs;
		$this->arrSessionBases=$resumen_usuario_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadresumen_usuario=$resumen_usuario_control_session->strTypeOnLoadresumen_usuario;
		$this->strTipoPaginaAuxiliarresumen_usuario=$resumen_usuario_control_session->strTipoPaginaAuxiliarresumen_usuario;
		$this->strTipoUsuarioAuxiliarresumen_usuario=$resumen_usuario_control_session->strTipoUsuarioAuxiliarresumen_usuario;	
		
		$this->bitEsPopup=$resumen_usuario_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$resumen_usuario_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$resumen_usuario_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$resumen_usuario_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$resumen_usuario_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$resumen_usuario_control_session->strSufijo;
		$this->bitEsRelaciones=$resumen_usuario_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$resumen_usuario_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$resumen_usuario_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$resumen_usuario_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$resumen_usuario_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$resumen_usuario_control_session->strTituloTabla;
		$this->strTituloPathPagina=$resumen_usuario_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$resumen_usuario_control_session->strTituloPathElementoActual;
		
		if($this->resumen_usuarioLogic==null) {			
			$this->resumen_usuarioLogic=new resumen_usuario_logic();
		}
		
		
		if($this->resumen_usuarioClase==null) {
			$this->resumen_usuarioClase=new resumen_usuario();	
		}
		
		$this->resumen_usuarioLogic->setresumen_usuario($this->resumen_usuarioClase);
		
		
		if($this->resumen_usuarios==null) {
			$this->resumen_usuarios=array();	
		}
		
		$this->resumen_usuarioLogic->setresumen_usuarios($this->resumen_usuarios);
		
		
		$this->strTipoView=$resumen_usuario_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$resumen_usuario_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$resumen_usuario_control_session->datosCliente;
		$this->strAccionBusqueda=$resumen_usuario_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$resumen_usuario_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$resumen_usuario_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$resumen_usuario_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$resumen_usuario_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$resumen_usuario_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$resumen_usuario_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$resumen_usuario_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$resumen_usuario_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$resumen_usuario_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$resumen_usuario_control_session->strTipoPaginacion;
		$this->strTipoAccion=$resumen_usuario_control_session->strTipoAccion;
		$this->tiposReportes=$resumen_usuario_control_session->tiposReportes;
		$this->tiposReporte=$resumen_usuario_control_session->tiposReporte;
		$this->tiposAcciones=$resumen_usuario_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$resumen_usuario_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$resumen_usuario_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$resumen_usuario_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$resumen_usuario_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$resumen_usuario_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$resumen_usuario_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$resumen_usuario_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$resumen_usuario_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$resumen_usuario_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$resumen_usuario_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$resumen_usuario_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$resumen_usuario_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$resumen_usuario_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$resumen_usuario_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$resumen_usuario_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$resumen_usuario_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$resumen_usuario_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$resumen_usuario_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$resumen_usuario_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$resumen_usuario_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$resumen_usuario_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$resumen_usuario_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$resumen_usuario_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$resumen_usuario_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$resumen_usuario_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$resumen_usuario_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$resumen_usuario_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$resumen_usuario_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$resumen_usuario_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$resumen_usuario_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$resumen_usuario_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$resumen_usuario_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$resumen_usuario_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$resumen_usuario_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$resumen_usuario_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$resumen_usuario_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$resumen_usuario_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$resumen_usuario_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$resumen_usuario_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$resumen_usuario_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$resumen_usuario_control_session->resumenUsuarioActual;	
		$this->moduloActual=$resumen_usuario_control_session->moduloActual;	
		$this->opcionActual=$resumen_usuario_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$resumen_usuario_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$resumen_usuario_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$resumen_usuario_session=unserialize($this->Session->read(resumen_usuario_util::$STR_SESSION_NAME));
				
		if($resumen_usuario_session==null) {
			$resumen_usuario_session=new resumen_usuario_session();
		}
		
		$this->strStyleDivArbol=$resumen_usuario_session->strStyleDivArbol;	
		$this->strStyleDivContent=$resumen_usuario_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$resumen_usuario_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$resumen_usuario_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$resumen_usuario_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$resumen_usuario_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$resumen_usuario_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$resumen_usuario_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$resumen_usuario_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$resumen_usuario_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$resumen_usuario_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_usuario=$resumen_usuario_control_session->strMensajeid_usuario;
		$this->strMensajenumero_ingresos=$resumen_usuario_control_session->strMensajenumero_ingresos;
		$this->strMensajenumero_error_ingreso=$resumen_usuario_control_session->strMensajenumero_error_ingreso;
		$this->strMensajenumero_intentos=$resumen_usuario_control_session->strMensajenumero_intentos;
		$this->strMensajenumero_cierres=$resumen_usuario_control_session->strMensajenumero_cierres;
		$this->strMensajenumero_reinicios=$resumen_usuario_control_session->strMensajenumero_reinicios;
		$this->strMensajenumero_ingreso_actual=$resumen_usuario_control_session->strMensajenumero_ingreso_actual;
		$this->strMensajefecha_ultimo_ingreso=$resumen_usuario_control_session->strMensajefecha_ultimo_ingreso;
		$this->strMensajefecha_ultimo_error_ingreso=$resumen_usuario_control_session->strMensajefecha_ultimo_error_ingreso;
		$this->strMensajefecha_ultimo_intento=$resumen_usuario_control_session->strMensajefecha_ultimo_intento;
		$this->strMensajefecha_ultimo_cierre=$resumen_usuario_control_session->strMensajefecha_ultimo_cierre;
			
		
		$this->usuariosFK=$resumen_usuario_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$resumen_usuario_control_session->idusuarioDefaultFK;
		
		
		$this->strVisibleFK_Idusuario=$resumen_usuario_control_session->strVisibleFK_Idusuario;
		
		
		
		
		$this->id_usuarioFK_Idusuario=$resumen_usuario_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getresumen_usuarioControllerAdditional() {
		return $this->resumen_usuarioControllerAdditional;
	}

	public function setresumen_usuarioControllerAdditional($resumen_usuarioControllerAdditional) {
		$this->resumen_usuarioControllerAdditional = $resumen_usuarioControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getresumen_usuarioActual() : resumen_usuario {
		return $this->resumen_usuarioActual;
	}

	public function setresumen_usuarioActual(resumen_usuario $resumen_usuarioActual) {
		$this->resumen_usuarioActual = $resumen_usuarioActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidresumen_usuario() : int {
		return $this->idresumen_usuario;
	}

	public function setidresumen_usuario(int $idresumen_usuario) {
		$this->idresumen_usuario = $idresumen_usuario;
	}
	
	public function getresumen_usuario() : resumen_usuario {
		return $this->resumen_usuario;
	}

	public function setresumen_usuario(resumen_usuario $resumen_usuario) {
		$this->resumen_usuario = $resumen_usuario;
	}
		
	public function getresumen_usuarioLogic() : resumen_usuario_logic {		
		return $this->resumen_usuarioLogic;
	}

	public function setresumen_usuarioLogic(resumen_usuario_logic $resumen_usuarioLogic) {
		$this->resumen_usuarioLogic = $resumen_usuarioLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getresumen_usuariosModel() {		
		try {						
			/*resumen_usuariosModel.setWrappedData(resumen_usuarioLogic->getresumen_usuarios());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->resumen_usuariosModel;
	}
	
	public function setresumen_usuariosModel($resumen_usuariosModel) {
		$this->resumen_usuariosModel = $resumen_usuariosModel;
	}
	
	public function getresumen_usuarios() : array {		
		return $this->resumen_usuarios;
	}
	
	public function setresumen_usuarios(array $resumen_usuarios) {
		$this->resumen_usuarios= $resumen_usuarios;
	}
	
	public function getresumen_usuariosEliminados() : array {		
		return $this->resumen_usuariosEliminados;
	}
	
	public function setresumen_usuariosEliminados(array $resumen_usuariosEliminados) {
		$this->resumen_usuariosEliminados= $resumen_usuariosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getresumen_usuarioActualFromListDataModel() {
		try {
			/*$resumen_usuarioClase= $this->resumen_usuariosModel->getRowData();*/
			
			/*return $resumen_usuario;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
