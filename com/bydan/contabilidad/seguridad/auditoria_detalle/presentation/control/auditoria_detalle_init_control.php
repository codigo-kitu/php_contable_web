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

namespace com\bydan\contabilidad\seguridad\auditoria_detalle\presentation\control;

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

use com\bydan\contabilidad\seguridad\auditoria_detalle\business\entity\auditoria_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/auditoria_detalle/util/auditoria_detalle_carga.php');
use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_carga;

use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_util;
use com\bydan\contabilidad\seguridad\auditoria_detalle\util\auditoria_detalle_param_return;
use com\bydan\contabilidad\seguridad\auditoria_detalle\business\logic\auditoria_detalle_logic;
use com\bydan\contabilidad\seguridad\auditoria_detalle\presentation\session\auditoria_detalle_session;


//FK


use com\bydan\contabilidad\seguridad\auditoria\business\entity\auditoria;
use com\bydan\contabilidad\seguridad\auditoria\business\logic\auditoria_logic;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_carga;
use com\bydan\contabilidad\seguridad\auditoria\util\auditoria_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
auditoria_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
auditoria_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
auditoria_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
auditoria_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*auditoria_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class auditoria_detalle_init_control extends ControllerBase {	
	
	public $auditoria_detalleClase=null;	
	public $auditoria_detallesModel=null;	
	public $auditoria_detallesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idauditoria_detalle=0;	
	public ?int $idauditoria_detalleActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $auditoria_detalleLogic=null;
	
	public $auditoria_detalleActual=null;	
	
	public $auditoria_detalle=null;
	public $auditoria_detalles=null;
	public $auditoria_detallesEliminados=array();
	public $auditoria_detallesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $auditoria_detallesLocal=array();
	public ?array $auditoria_detallesReporte=null;
	public ?array $auditoria_detallesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadauditoria_detalle='onload';
	public string $strTipoPaginaAuxiliarauditoria_detalle='none';
	public string $strTipoUsuarioAuxiliarauditoria_detalle='none';
		
	public $auditoria_detalleReturnGeneral=null;
	public $auditoria_detalleParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $auditoria_detalleModel=null;
	public $auditoria_detalleControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_auditoria='';
	public string $strMensajenombre_campo='';
	public string $strMensajevalor_anterior='';
	public string $strMensajevalor_actual='';
	
	
	public string $strVisibleBusquedaPorIdAuditoriaPorNombreCampo='display:table-row';
	public string $strVisibleFK_Idauditoria='display:table-row';

	
	public array $auditoriasFK=array();

	public function getauditoriasFK():array {
		return $this->auditoriasFK;
	}

	public function setauditoriasFK(array $auditoriasFK) {
		$this->auditoriasFK = $auditoriasFK;
	}

	public int $idauditoriaDefaultFK=-1;

	public function getIdauditoriaDefaultFK():int {
		return $this->idauditoriaDefaultFK;
	}

	public function setIdauditoriaDefaultFK(int $idauditoriaDefaultFK) {
		$this->idauditoriaDefaultFK = $idauditoriaDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_auditoriaBusquedaPorIdAuditoriaPorNombreCampo=null;


	public  $nombre_campoBusquedaPorIdAuditoriaPorNombreCampo=null;

	public  $id_auditoriaFK_Idauditoria=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->auditoria_detalleLogic==null) {
				$this->auditoria_detalleLogic=new auditoria_detalle_logic();
			}
			
		} else {
			if($this->auditoria_detalleLogic==null) {
				$this->auditoria_detalleLogic=new auditoria_detalle_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->auditoria_detalleClase==null) {
				$this->auditoria_detalleClase=new auditoria_detalle();
			}
			
			$this->auditoria_detalleClase->setId(0);	
				
				
			$this->auditoria_detalleClase->setid_auditoria(-1);	
			$this->auditoria_detalleClase->setnombre_campo('');	
			$this->auditoria_detalleClase->setvalor_anterior('');	
			$this->auditoria_detalleClase->setvalor_actual('');	
			
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
		$this->prepararEjecutarMantenimientoBase('auditoria_detalle');
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
		$this->cargarParametrosReporteBase('auditoria_detalle');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('auditoria_detalle');
	}
	
	public function actualizarControllerConReturnGeneral(auditoria_detalle_param_return $auditoria_detalleReturnGeneral) {
		if($auditoria_detalleReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesauditoria_detallesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$auditoria_detalleReturnGeneral->getsMensajeProceso();
		}
		
		if($auditoria_detalleReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$auditoria_detalleReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($auditoria_detalleReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$auditoria_detalleReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$auditoria_detalleReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($auditoria_detalleReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($auditoria_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$auditoria_detalleReturnGeneral->getsFuncionJs();
		}
		
		if($auditoria_detalleReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(auditoria_detalle_session $auditoria_detalle_session){
		$this->strStyleDivArbol=$auditoria_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$auditoria_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$auditoria_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$auditoria_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$auditoria_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$auditoria_detalle_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$auditoria_detalle_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(auditoria_detalle_session $auditoria_detalle_session){
		$auditoria_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$auditoria_detalle_session->strStyleDivHeader='display:none';			
		$auditoria_detalle_session->strStyleDivContent='width:93%;height:100%';	
		$auditoria_detalle_session->strStyleDivOpcionesBanner='display:none';	
		$auditoria_detalle_session->strStyleDivExpandirColapsar='display:none';	
		$auditoria_detalle_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(auditoria_detalle_control $auditoria_detalle_control_session){
		$this->idNuevo=$auditoria_detalle_control_session->idNuevo;
		$this->auditoria_detalleActual=$auditoria_detalle_control_session->auditoria_detalleActual;
		$this->auditoria_detalle=$auditoria_detalle_control_session->auditoria_detalle;
		$this->auditoria_detalleClase=$auditoria_detalle_control_session->auditoria_detalleClase;
		$this->auditoria_detalles=$auditoria_detalle_control_session->auditoria_detalles;
		$this->auditoria_detallesEliminados=$auditoria_detalle_control_session->auditoria_detallesEliminados;
		$this->auditoria_detalle=$auditoria_detalle_control_session->auditoria_detalle;
		$this->auditoria_detallesReporte=$auditoria_detalle_control_session->auditoria_detallesReporte;
		$this->auditoria_detallesSeleccionados=$auditoria_detalle_control_session->auditoria_detallesSeleccionados;
		$this->arrOrderBy=$auditoria_detalle_control_session->arrOrderBy;
		$this->arrOrderByRel=$auditoria_detalle_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$auditoria_detalle_control_session->arrHistoryWebs;
		$this->arrSessionBases=$auditoria_detalle_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadauditoria_detalle=$auditoria_detalle_control_session->strTypeOnLoadauditoria_detalle;
		$this->strTipoPaginaAuxiliarauditoria_detalle=$auditoria_detalle_control_session->strTipoPaginaAuxiliarauditoria_detalle;
		$this->strTipoUsuarioAuxiliarauditoria_detalle=$auditoria_detalle_control_session->strTipoUsuarioAuxiliarauditoria_detalle;	
		
		$this->bitEsPopup=$auditoria_detalle_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$auditoria_detalle_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$auditoria_detalle_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$auditoria_detalle_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$auditoria_detalle_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$auditoria_detalle_control_session->strSufijo;
		$this->bitEsRelaciones=$auditoria_detalle_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$auditoria_detalle_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$auditoria_detalle_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$auditoria_detalle_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$auditoria_detalle_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$auditoria_detalle_control_session->strTituloTabla;
		$this->strTituloPathPagina=$auditoria_detalle_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$auditoria_detalle_control_session->strTituloPathElementoActual;
		
		if($this->auditoria_detalleLogic==null) {			
			$this->auditoria_detalleLogic=new auditoria_detalle_logic();
		}
		
		
		if($this->auditoria_detalleClase==null) {
			$this->auditoria_detalleClase=new auditoria_detalle();	
		}
		
		$this->auditoria_detalleLogic->setauditoria_detalle($this->auditoria_detalleClase);
		
		
		if($this->auditoria_detalles==null) {
			$this->auditoria_detalles=array();	
		}
		
		$this->auditoria_detalleLogic->setauditoria_detalles($this->auditoria_detalles);
		
		
		$this->strTipoView=$auditoria_detalle_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$auditoria_detalle_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$auditoria_detalle_control_session->datosCliente;
		$this->strAccionBusqueda=$auditoria_detalle_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$auditoria_detalle_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$auditoria_detalle_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$auditoria_detalle_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$auditoria_detalle_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$auditoria_detalle_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$auditoria_detalle_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$auditoria_detalle_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$auditoria_detalle_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$auditoria_detalle_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$auditoria_detalle_control_session->strTipoPaginacion;
		$this->strTipoAccion=$auditoria_detalle_control_session->strTipoAccion;
		$this->tiposReportes=$auditoria_detalle_control_session->tiposReportes;
		$this->tiposReporte=$auditoria_detalle_control_session->tiposReporte;
		$this->tiposAcciones=$auditoria_detalle_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$auditoria_detalle_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$auditoria_detalle_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$auditoria_detalle_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$auditoria_detalle_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$auditoria_detalle_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$auditoria_detalle_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$auditoria_detalle_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$auditoria_detalle_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$auditoria_detalle_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$auditoria_detalle_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$auditoria_detalle_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$auditoria_detalle_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$auditoria_detalle_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$auditoria_detalle_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$auditoria_detalle_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$auditoria_detalle_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$auditoria_detalle_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$auditoria_detalle_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$auditoria_detalle_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$auditoria_detalle_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$auditoria_detalle_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$auditoria_detalle_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$auditoria_detalle_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$auditoria_detalle_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$auditoria_detalle_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$auditoria_detalle_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$auditoria_detalle_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$auditoria_detalle_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$auditoria_detalle_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$auditoria_detalle_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$auditoria_detalle_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$auditoria_detalle_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$auditoria_detalle_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$auditoria_detalle_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$auditoria_detalle_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$auditoria_detalle_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$auditoria_detalle_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$auditoria_detalle_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$auditoria_detalle_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$auditoria_detalle_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$auditoria_detalle_control_session->resumenUsuarioActual;	
		$this->moduloActual=$auditoria_detalle_control_session->moduloActual;	
		$this->opcionActual=$auditoria_detalle_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$auditoria_detalle_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$auditoria_detalle_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$auditoria_detalle_session=unserialize($this->Session->read(auditoria_detalle_util::$STR_SESSION_NAME));
				
		if($auditoria_detalle_session==null) {
			$auditoria_detalle_session=new auditoria_detalle_session();
		}
		
		$this->strStyleDivArbol=$auditoria_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$auditoria_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$auditoria_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$auditoria_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$auditoria_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$auditoria_detalle_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$auditoria_detalle_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$auditoria_detalle_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$auditoria_detalle_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$auditoria_detalle_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$auditoria_detalle_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_auditoria=$auditoria_detalle_control_session->strMensajeid_auditoria;
		$this->strMensajenombre_campo=$auditoria_detalle_control_session->strMensajenombre_campo;
		$this->strMensajevalor_anterior=$auditoria_detalle_control_session->strMensajevalor_anterior;
		$this->strMensajevalor_actual=$auditoria_detalle_control_session->strMensajevalor_actual;
			
		
		$this->auditoriasFK=$auditoria_detalle_control_session->auditoriasFK;
		$this->idauditoriaDefaultFK=$auditoria_detalle_control_session->idauditoriaDefaultFK;
		
		
		$this->strVisibleBusquedaPorIdAuditoriaPorNombreCampo=$auditoria_detalle_control_session->strVisibleBusquedaPorIdAuditoriaPorNombreCampo;
		$this->strVisibleFK_Idauditoria=$auditoria_detalle_control_session->strVisibleFK_Idauditoria;
		
		
		
		
		$this->id_auditoriaBusquedaPorIdAuditoriaPorNombreCampo=$auditoria_detalle_control_session->id_auditoriaBusquedaPorIdAuditoriaPorNombreCampo;

		$this->nombre_campoBusquedaPorIdAuditoriaPorNombreCampo=$auditoria_detalle_control_session->nombre_campoBusquedaPorIdAuditoriaPorNombreCampo;
		$this->id_auditoriaFK_Idauditoria=$auditoria_detalle_control_session->id_auditoriaFK_Idauditoria;

		
		
		
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
	
	public function getauditoria_detalleControllerAdditional() {
		return $this->auditoria_detalleControllerAdditional;
	}

	public function setauditoria_detalleControllerAdditional($auditoria_detalleControllerAdditional) {
		$this->auditoria_detalleControllerAdditional = $auditoria_detalleControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getauditoria_detalleActual() : auditoria_detalle {
		return $this->auditoria_detalleActual;
	}

	public function setauditoria_detalleActual(auditoria_detalle $auditoria_detalleActual) {
		$this->auditoria_detalleActual = $auditoria_detalleActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidauditoria_detalle() : int {
		return $this->idauditoria_detalle;
	}

	public function setidauditoria_detalle(int $idauditoria_detalle) {
		$this->idauditoria_detalle = $idauditoria_detalle;
	}
	
	public function getauditoria_detalle() : auditoria_detalle {
		return $this->auditoria_detalle;
	}

	public function setauditoria_detalle(auditoria_detalle $auditoria_detalle) {
		$this->auditoria_detalle = $auditoria_detalle;
	}
		
	public function getauditoria_detalleLogic() : auditoria_detalle_logic {		
		return $this->auditoria_detalleLogic;
	}

	public function setauditoria_detalleLogic(auditoria_detalle_logic $auditoria_detalleLogic) {
		$this->auditoria_detalleLogic = $auditoria_detalleLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getauditoria_detallesModel() {		
		try {						
			/*auditoria_detallesModel.setWrappedData(auditoria_detalleLogic->getauditoria_detalles());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->auditoria_detallesModel;
	}
	
	public function setauditoria_detallesModel($auditoria_detallesModel) {
		$this->auditoria_detallesModel = $auditoria_detallesModel;
	}
	
	public function getauditoria_detalles() : array {		
		return $this->auditoria_detalles;
	}
	
	public function setauditoria_detalles(array $auditoria_detalles) {
		$this->auditoria_detalles= $auditoria_detalles;
	}
	
	public function getauditoria_detallesEliminados() : array {		
		return $this->auditoria_detallesEliminados;
	}
	
	public function setauditoria_detallesEliminados(array $auditoria_detallesEliminados) {
		$this->auditoria_detallesEliminados= $auditoria_detallesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getauditoria_detalleActualFromListDataModel() {
		try {
			/*$auditoria_detalleClase= $this->auditoria_detallesModel->getRowData();*/
			
			/*return $auditoria_detalle;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
