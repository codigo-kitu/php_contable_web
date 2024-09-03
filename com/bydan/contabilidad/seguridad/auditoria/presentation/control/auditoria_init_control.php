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

namespace com\bydan\contabilidad\seguridad\auditoria\presentation\control;

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

use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/auditoria/util/auditoria_carga.php');
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_carga;

use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_util;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_param_return;
use com\bydan\contabilidad\seguridad\auditoria\business\logic\auditoria_logic;
use com\bydan\contabilidad\seguridad\auditoria\presentation\session\auditoria_session;


//FK


use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

//REL


use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_carga;
use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_util;
use com\bydan\contabilidad\seguridad\auditoria_detalle\presentation\session\auditoria_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
auditoria_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
auditoria_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
auditoria_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
auditoria_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*auditoria_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class auditoria_init_control extends ControllerBase {	
	
	public $auditoriaClase=null;	
	public $auditoriasModel=null;	
	public $auditoriasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idauditoria=0;	
	public ?int $idauditoriaActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $auditoriaLogic=null;
	
	public $auditoriaActual=null;	
	
	public $auditoria=null;
	public $auditorias=null;
	public $auditoriasEliminados=array();
	public $auditoriasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $auditoriasLocal=array();
	public ?array $auditoriasReporte=null;
	public ?array $auditoriasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadauditoria='onload';
	public string $strTipoPaginaAuxiliarauditoria='none';
	public string $strTipoUsuarioAuxiliarauditoria='none';
		
	public $auditoriaReturnGeneral=null;
	public $auditoriaParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $auditoriaModel=null;
	public $auditoriaControllerAdditional=null;
	
	
	

	public $auditoriadetalleLogic=null;

	public function  getauditoria_detalleLogic() {
		return $this->auditoriadetalleLogic;
	}

	public function setauditoria_detalleLogic($auditoriadetalleLogic) {
		$this->auditoriadetalleLogic =$auditoriadetalleLogic;
	}
 	
	
	public string $strMensajeid_usuario='';
	public string $strMensajenombre_tabla='';
	public string $strMensajeid_fila='';
	public string $strMensajeaccion='';
	public string $strMensajeproceso='';
	public string $strMensajenombre_pc='';
	public string $strMensajeip_pc='';
	public string $strMensajeusuario_pc='';
	public string $strMensajefecha_hora='';
	public string $strMensajeobservacion='';
	
	
	public string $strVisibleBusquedaPorIdUsuarioPorFechaHora='display:table-row';
	public string $strVisibleBusquedaPorIPPCPorFechaHora='display:table-row';
	public string $strVisibleBusquedaPorNombrePCPorFechaHora='display:table-row';
	public string $strVisibleBusquedaPorNombreTablaPorFechaHora='display:table-row';
	public string $strVisibleBusquedaPorObservacionesPorFechaHora='display:table-row';
	public string $strVisibleBusquedaPorProcesoPorFechaHora='display:table-row';
	public string $strVisibleBusquedaPorUsuarioPCPorFechaHora='display:table-row';
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

	
	
	
	
	
	
	public $strTienePermisosauditoria_detalle='none';
	
	
	public  $id_usuarioBusquedaPorIdUsuarioPorFechaHora=null;


	public  $fecha_horaBusquedaPorIdUsuarioPorFechaHora=null;

	public $fecha_horaFinalBusquedaPorIdUsuarioPorFechaHora=null;

	public  $ip_pcBusquedaPorIPPCPorFechaHora=null;


	public  $fecha_horaBusquedaPorIPPCPorFechaHora=null;

	public $fecha_horaFinalBusquedaPorIPPCPorFechaHora=null;

	public  $nombre_pcBusquedaPorNombrePCPorFechaHora=null;


	public  $fecha_horaBusquedaPorNombrePCPorFechaHora=null;

	public $fecha_horaFinalBusquedaPorNombrePCPorFechaHora=null;

	public  $nombre_tablaBusquedaPorNombreTablaPorFechaHora=null;


	public  $fecha_horaBusquedaPorNombreTablaPorFechaHora=null;

	public $fecha_horaFinalBusquedaPorNombreTablaPorFechaHora=null;

	public  $fecha_horaBusquedaPorObservacionesPorFechaHora=null;

	public $fecha_horaFinalBusquedaPorObservacionesPorFechaHora=null;


	public  $observacionBusquedaPorObservacionesPorFechaHora=null;

	public  $procesoBusquedaPorProcesoPorFechaHora=null;


	public  $fecha_horaBusquedaPorProcesoPorFechaHora=null;

	public $fecha_horaFinalBusquedaPorProcesoPorFechaHora=null;

	public  $usuario_pcBusquedaPorUsuarioPCPorFechaHora=null;


	public  $fecha_horaBusquedaPorUsuarioPCPorFechaHora=null;

	public $fecha_horaFinalBusquedaPorUsuarioPCPorFechaHora=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->auditoriaLogic==null) {
				$this->auditoriaLogic=new auditoria_logic();
			}
			
		} else {
			if($this->auditoriaLogic==null) {
				$this->auditoriaLogic=new auditoria_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->auditoriaClase==null) {
				$this->auditoriaClase=new auditoria();
			}
			
			$this->auditoriaClase->setId(0);	
				
				
			$this->auditoriaClase->setid_usuario(-1);	
			$this->auditoriaClase->setnombre_tabla('');	
			$this->auditoriaClase->setid_fila(0);	
			$this->auditoriaClase->setaccion('');	
			$this->auditoriaClase->setproceso('');	
			$this->auditoriaClase->setnombre_pc('');	
			$this->auditoriaClase->setip_pc('');	
			$this->auditoriaClase->setusuario_pc('');	
			$this->auditoriaClase->setfecha_hora(date('Y-m-d'));	
			$this->auditoriaClase->setobservacion('');	
			
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
		$this->prepararEjecutarMantenimientoBase('auditoria');
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
		$this->cargarParametrosReporteBase('auditoria');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('auditoria');
	}
	
	public function actualizarControllerConReturnGeneral(auditoria_param_return $auditoriaReturnGeneral) {
		if($auditoriaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesauditoriasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$auditoriaReturnGeneral->getsMensajeProceso();
		}
		
		if($auditoriaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$auditoriaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($auditoriaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$auditoriaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$auditoriaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($auditoriaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($auditoriaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$auditoriaReturnGeneral->getsFuncionJs();
		}
		
		if($auditoriaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(auditoria_session $auditoria_session){
		$this->strStyleDivArbol=$auditoria_session->strStyleDivArbol;	
		$this->strStyleDivContent=$auditoria_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$auditoria_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$auditoria_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$auditoria_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$auditoria_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$auditoria_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(auditoria_session $auditoria_session){
		$auditoria_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$auditoria_session->strStyleDivHeader='display:none';			
		$auditoria_session->strStyleDivContent='width:93%;height:100%';	
		$auditoria_session->strStyleDivOpcionesBanner='display:none';	
		$auditoria_session->strStyleDivExpandirColapsar='display:none';	
		$auditoria_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(auditoria_control $auditoria_control_session){
		$this->idNuevo=$auditoria_control_session->idNuevo;
		$this->auditoriaActual=$auditoria_control_session->auditoriaActual;
		$this->auditoria=$auditoria_control_session->auditoria;
		$this->auditoriaClase=$auditoria_control_session->auditoriaClase;
		$this->auditorias=$auditoria_control_session->auditorias;
		$this->auditoriasEliminados=$auditoria_control_session->auditoriasEliminados;
		$this->auditoria=$auditoria_control_session->auditoria;
		$this->auditoriasReporte=$auditoria_control_session->auditoriasReporte;
		$this->auditoriasSeleccionados=$auditoria_control_session->auditoriasSeleccionados;
		$this->arrOrderBy=$auditoria_control_session->arrOrderBy;
		$this->arrOrderByRel=$auditoria_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$auditoria_control_session->arrHistoryWebs;
		$this->arrSessionBases=$auditoria_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadauditoria=$auditoria_control_session->strTypeOnLoadauditoria;
		$this->strTipoPaginaAuxiliarauditoria=$auditoria_control_session->strTipoPaginaAuxiliarauditoria;
		$this->strTipoUsuarioAuxiliarauditoria=$auditoria_control_session->strTipoUsuarioAuxiliarauditoria;	
		
		$this->bitEsPopup=$auditoria_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$auditoria_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$auditoria_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$auditoria_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$auditoria_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$auditoria_control_session->strSufijo;
		$this->bitEsRelaciones=$auditoria_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$auditoria_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$auditoria_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$auditoria_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$auditoria_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$auditoria_control_session->strTituloTabla;
		$this->strTituloPathPagina=$auditoria_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$auditoria_control_session->strTituloPathElementoActual;
		
		if($this->auditoriaLogic==null) {			
			$this->auditoriaLogic=new auditoria_logic();
		}
		
		
		if($this->auditoriaClase==null) {
			$this->auditoriaClase=new auditoria();	
		}
		
		$this->auditoriaLogic->setauditoria($this->auditoriaClase);
		
		
		if($this->auditorias==null) {
			$this->auditorias=array();	
		}
		
		$this->auditoriaLogic->setauditorias($this->auditorias);
		
		
		$this->strTipoView=$auditoria_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$auditoria_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$auditoria_control_session->datosCliente;
		$this->strAccionBusqueda=$auditoria_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$auditoria_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$auditoria_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$auditoria_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$auditoria_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$auditoria_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$auditoria_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$auditoria_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$auditoria_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$auditoria_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$auditoria_control_session->strTipoPaginacion;
		$this->strTipoAccion=$auditoria_control_session->strTipoAccion;
		$this->tiposReportes=$auditoria_control_session->tiposReportes;
		$this->tiposReporte=$auditoria_control_session->tiposReporte;
		$this->tiposAcciones=$auditoria_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$auditoria_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$auditoria_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$auditoria_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$auditoria_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$auditoria_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$auditoria_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$auditoria_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$auditoria_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$auditoria_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$auditoria_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$auditoria_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$auditoria_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$auditoria_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$auditoria_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$auditoria_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$auditoria_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$auditoria_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$auditoria_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$auditoria_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$auditoria_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$auditoria_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$auditoria_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$auditoria_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$auditoria_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$auditoria_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$auditoria_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$auditoria_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$auditoria_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$auditoria_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$auditoria_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$auditoria_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$auditoria_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$auditoria_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$auditoria_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$auditoria_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$auditoria_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$auditoria_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$auditoria_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$auditoria_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$auditoria_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$auditoria_control_session->resumenUsuarioActual;	
		$this->moduloActual=$auditoria_control_session->moduloActual;	
		$this->opcionActual=$auditoria_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$auditoria_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$auditoria_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$auditoria_session=unserialize($this->Session->read(auditoria_util::$STR_SESSION_NAME));
				
		if($auditoria_session==null) {
			$auditoria_session=new auditoria_session();
		}
		
		$this->strStyleDivArbol=$auditoria_session->strStyleDivArbol;	
		$this->strStyleDivContent=$auditoria_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$auditoria_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$auditoria_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$auditoria_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$auditoria_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$auditoria_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$auditoria_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$auditoria_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$auditoria_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$auditoria_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_usuario=$auditoria_control_session->strMensajeid_usuario;
		$this->strMensajenombre_tabla=$auditoria_control_session->strMensajenombre_tabla;
		$this->strMensajeid_fila=$auditoria_control_session->strMensajeid_fila;
		$this->strMensajeaccion=$auditoria_control_session->strMensajeaccion;
		$this->strMensajeproceso=$auditoria_control_session->strMensajeproceso;
		$this->strMensajenombre_pc=$auditoria_control_session->strMensajenombre_pc;
		$this->strMensajeip_pc=$auditoria_control_session->strMensajeip_pc;
		$this->strMensajeusuario_pc=$auditoria_control_session->strMensajeusuario_pc;
		$this->strMensajefecha_hora=$auditoria_control_session->strMensajefecha_hora;
		$this->strMensajeobservacion=$auditoria_control_session->strMensajeobservacion;
			
		
		$this->usuariosFK=$auditoria_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$auditoria_control_session->idusuarioDefaultFK;
		
		
		$this->strVisibleBusquedaPorIdUsuarioPorFechaHora=$auditoria_control_session->strVisibleBusquedaPorIdUsuarioPorFechaHora;
		$this->strVisibleBusquedaPorIPPCPorFechaHora=$auditoria_control_session->strVisibleBusquedaPorIPPCPorFechaHora;
		$this->strVisibleBusquedaPorNombrePCPorFechaHora=$auditoria_control_session->strVisibleBusquedaPorNombrePCPorFechaHora;
		$this->strVisibleBusquedaPorNombreTablaPorFechaHora=$auditoria_control_session->strVisibleBusquedaPorNombreTablaPorFechaHora;
		$this->strVisibleBusquedaPorObservacionesPorFechaHora=$auditoria_control_session->strVisibleBusquedaPorObservacionesPorFechaHora;
		$this->strVisibleBusquedaPorProcesoPorFechaHora=$auditoria_control_session->strVisibleBusquedaPorProcesoPorFechaHora;
		$this->strVisibleBusquedaPorUsuarioPCPorFechaHora=$auditoria_control_session->strVisibleBusquedaPorUsuarioPCPorFechaHora;
		$this->strVisibleFK_Idusuario=$auditoria_control_session->strVisibleFK_Idusuario;
		
		
		$this->strTienePermisosauditoria_detalle=$auditoria_control_session->strTienePermisosauditoria_detalle;
		
		
		$this->id_usuarioBusquedaPorIdUsuarioPorFechaHora=$auditoria_control_session->id_usuarioBusquedaPorIdUsuarioPorFechaHora;

		$this->fecha_horaBusquedaPorIdUsuarioPorFechaHora=$auditoria_control_session->fecha_horaBusquedaPorIdUsuarioPorFechaHora;
		$this->ip_pcBusquedaPorIPPCPorFechaHora=$auditoria_control_session->ip_pcBusquedaPorIPPCPorFechaHora;

		$this->fecha_horaBusquedaPorIPPCPorFechaHora=$auditoria_control_session->fecha_horaBusquedaPorIPPCPorFechaHora;
		$this->nombre_pcBusquedaPorNombrePCPorFechaHora=$auditoria_control_session->nombre_pcBusquedaPorNombrePCPorFechaHora;

		$this->fecha_horaBusquedaPorNombrePCPorFechaHora=$auditoria_control_session->fecha_horaBusquedaPorNombrePCPorFechaHora;
		$this->nombre_tablaBusquedaPorNombreTablaPorFechaHora=$auditoria_control_session->nombre_tablaBusquedaPorNombreTablaPorFechaHora;

		$this->fecha_horaBusquedaPorNombreTablaPorFechaHora=$auditoria_control_session->fecha_horaBusquedaPorNombreTablaPorFechaHora;
		$this->fecha_horaBusquedaPorObservacionesPorFechaHora=$auditoria_control_session->fecha_horaBusquedaPorObservacionesPorFechaHora;

		$this->observacionBusquedaPorObservacionesPorFechaHora=$auditoria_control_session->observacionBusquedaPorObservacionesPorFechaHora;
		$this->procesoBusquedaPorProcesoPorFechaHora=$auditoria_control_session->procesoBusquedaPorProcesoPorFechaHora;

		$this->fecha_horaBusquedaPorProcesoPorFechaHora=$auditoria_control_session->fecha_horaBusquedaPorProcesoPorFechaHora;
		$this->usuario_pcBusquedaPorUsuarioPCPorFechaHora=$auditoria_control_session->usuario_pcBusquedaPorUsuarioPCPorFechaHora;

		$this->fecha_horaBusquedaPorUsuarioPCPorFechaHora=$auditoria_control_session->fecha_horaBusquedaPorUsuarioPCPorFechaHora;
		$this->id_usuarioFK_Idusuario=$auditoria_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getauditoriaControllerAdditional() {
		return $this->auditoriaControllerAdditional;
	}

	public function setauditoriaControllerAdditional($auditoriaControllerAdditional) {
		$this->auditoriaControllerAdditional = $auditoriaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getauditoriaActual() : auditoria {
		return $this->auditoriaActual;
	}

	public function setauditoriaActual(auditoria $auditoriaActual) {
		$this->auditoriaActual = $auditoriaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidauditoria() : int {
		return $this->idauditoria;
	}

	public function setidauditoria(int $idauditoria) {
		$this->idauditoria = $idauditoria;
	}
	
	public function getauditoria() : auditoria {
		return $this->auditoria;
	}

	public function setauditoria(auditoria $auditoria) {
		$this->auditoria = $auditoria;
	}
		
	public function getauditoriaLogic() : auditoria_logic {		
		return $this->auditoriaLogic;
	}

	public function setauditoriaLogic(auditoria_logic $auditoriaLogic) {
		$this->auditoriaLogic = $auditoriaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getauditoriasModel() {		
		try {						
			/*auditoriasModel.setWrappedData(auditoriaLogic->getauditorias());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->auditoriasModel;
	}
	
	public function setauditoriasModel($auditoriasModel) {
		$this->auditoriasModel = $auditoriasModel;
	}
	
	public function getauditorias() : array {		
		return $this->auditorias;
	}
	
	public function setauditorias(array $auditorias) {
		$this->auditorias= $auditorias;
	}
	
	public function getauditoriasEliminados() : array {		
		return $this->auditoriasEliminados;
	}
	
	public function setauditoriasEliminados(array $auditoriasEliminados) {
		$this->auditoriasEliminados= $auditoriasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getauditoriaActualFromListDataModel() {
		try {
			/*$auditoriaClase= $this->auditoriasModel->getRowData();*/
			
			/*return $auditoria;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
