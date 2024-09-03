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

namespace com\bydan\contabilidad\seguridad\paquete\presentation\control;

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

use com\bydan\contabilidad\seguridad\paquete\business\entity\paquete;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/paquete/util/paquete_carga.php');
use com\bydan\contabilidad\seguridad\paquete\util\paquete_carga;

use com\bydan\contabilidad\seguridad\paquete\util\paquete_util;
use com\bydan\contabilidad\seguridad\paquete\util\paquete_param_return;
use com\bydan\contabilidad\seguridad\paquete\business\logic\paquete_logic;
use com\bydan\contabilidad\seguridad\paquete\presentation\session\paquete_session;


//FK


use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_carga;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_util;

//REL


use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;
use com\bydan\contabilidad\seguridad\modulo\presentation\session\modulo_session;


/*CARGA ARCHIVOS FRAMEWORK*/
paquete_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
paquete_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
paquete_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
paquete_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*paquete_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class paquete_init_control extends ControllerBase {	
	
	public $paqueteClase=null;	
	public $paquetesModel=null;	
	public $paquetesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idpaquete=0;	
	public ?int $idpaqueteActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $paqueteLogic=null;
	
	public $paqueteActual=null;	
	
	public $paquete=null;
	public $paquetes=null;
	public $paquetesEliminados=array();
	public $paquetesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $paquetesLocal=array();
	public ?array $paquetesReporte=null;
	public ?array $paquetesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadpaquete='onload';
	public string $strTipoPaginaAuxiliarpaquete='none';
	public string $strTipoUsuarioAuxiliarpaquete='none';
		
	public $paqueteReturnGeneral=null;
	public $paqueteParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $paqueteModel=null;
	public $paqueteControllerAdditional=null;
	
	
	

	public $moduloLogic=null;

	public function  getmoduloLogic() {
		return $this->moduloLogic;
	}

	public function setmoduloLogic($moduloLogic) {
		$this->moduloLogic =$moduloLogic;
	}
 	
	
	public string $strMensajeid_sistema='';
	public string $strMensajenombre='';
	public string $strMensajedescripcion='';
	
	
	public string $strVisibleFK_Idsistema='display:table-row';

	
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

	
	
	
	
	
	
	public $strTienePermisosmodulo='none';
	
	
	public  $id_sistemaFK_Idsistema=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->paqueteLogic==null) {
				$this->paqueteLogic=new paquete_logic();
			}
			
		} else {
			if($this->paqueteLogic==null) {
				$this->paqueteLogic=new paquete_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->paqueteClase==null) {
				$this->paqueteClase=new paquete();
			}
			
			$this->paqueteClase->setId(0);	
				
				
			$this->paqueteClase->setid_sistema(-1);	
			$this->paqueteClase->setnombre('');	
			$this->paqueteClase->setdescripcion('');	
			
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
		$this->prepararEjecutarMantenimientoBase('paquete');
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
		$this->cargarParametrosReporteBase('paquete');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('paquete');
	}
	
	public function actualizarControllerConReturnGeneral(paquete_param_return $paqueteReturnGeneral) {
		if($paqueteReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajespaquetesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$paqueteReturnGeneral->getsMensajeProceso();
		}
		
		if($paqueteReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$paqueteReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($paqueteReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$paqueteReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$paqueteReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($paqueteReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($paqueteReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$paqueteReturnGeneral->getsFuncionJs();
		}
		
		if($paqueteReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(paquete_session $paquete_session){
		$this->strStyleDivArbol=$paquete_session->strStyleDivArbol;	
		$this->strStyleDivContent=$paquete_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$paquete_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$paquete_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$paquete_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$paquete_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$paquete_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(paquete_session $paquete_session){
		$paquete_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$paquete_session->strStyleDivHeader='display:none';			
		$paquete_session->strStyleDivContent='width:93%;height:100%';	
		$paquete_session->strStyleDivOpcionesBanner='display:none';	
		$paquete_session->strStyleDivExpandirColapsar='display:none';	
		$paquete_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(paquete_control $paquete_control_session){
		$this->idNuevo=$paquete_control_session->idNuevo;
		$this->paqueteActual=$paquete_control_session->paqueteActual;
		$this->paquete=$paquete_control_session->paquete;
		$this->paqueteClase=$paquete_control_session->paqueteClase;
		$this->paquetes=$paquete_control_session->paquetes;
		$this->paquetesEliminados=$paquete_control_session->paquetesEliminados;
		$this->paquete=$paquete_control_session->paquete;
		$this->paquetesReporte=$paquete_control_session->paquetesReporte;
		$this->paquetesSeleccionados=$paquete_control_session->paquetesSeleccionados;
		$this->arrOrderBy=$paquete_control_session->arrOrderBy;
		$this->arrOrderByRel=$paquete_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$paquete_control_session->arrHistoryWebs;
		$this->arrSessionBases=$paquete_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadpaquete=$paquete_control_session->strTypeOnLoadpaquete;
		$this->strTipoPaginaAuxiliarpaquete=$paquete_control_session->strTipoPaginaAuxiliarpaquete;
		$this->strTipoUsuarioAuxiliarpaquete=$paquete_control_session->strTipoUsuarioAuxiliarpaquete;	
		
		$this->bitEsPopup=$paquete_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$paquete_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$paquete_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$paquete_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$paquete_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$paquete_control_session->strSufijo;
		$this->bitEsRelaciones=$paquete_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$paquete_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$paquete_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$paquete_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$paquete_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$paquete_control_session->strTituloTabla;
		$this->strTituloPathPagina=$paquete_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$paquete_control_session->strTituloPathElementoActual;
		
		if($this->paqueteLogic==null) {			
			$this->paqueteLogic=new paquete_logic();
		}
		
		
		if($this->paqueteClase==null) {
			$this->paqueteClase=new paquete();	
		}
		
		$this->paqueteLogic->setpaquete($this->paqueteClase);
		
		
		if($this->paquetes==null) {
			$this->paquetes=array();	
		}
		
		$this->paqueteLogic->setpaquetes($this->paquetes);
		
		
		$this->strTipoView=$paquete_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$paquete_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$paquete_control_session->datosCliente;
		$this->strAccionBusqueda=$paquete_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$paquete_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$paquete_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$paquete_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$paquete_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$paquete_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$paquete_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$paquete_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$paquete_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$paquete_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$paquete_control_session->strTipoPaginacion;
		$this->strTipoAccion=$paquete_control_session->strTipoAccion;
		$this->tiposReportes=$paquete_control_session->tiposReportes;
		$this->tiposReporte=$paquete_control_session->tiposReporte;
		$this->tiposAcciones=$paquete_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$paquete_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$paquete_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$paquete_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$paquete_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$paquete_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$paquete_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$paquete_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$paquete_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$paquete_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$paquete_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$paquete_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$paquete_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$paquete_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$paquete_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$paquete_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$paquete_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$paquete_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$paquete_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$paquete_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$paquete_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$paquete_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$paquete_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$paquete_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$paquete_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$paquete_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$paquete_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$paquete_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$paquete_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$paquete_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$paquete_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$paquete_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$paquete_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$paquete_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$paquete_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$paquete_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$paquete_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$paquete_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$paquete_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$paquete_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$paquete_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$paquete_control_session->resumenUsuarioActual;	
		$this->moduloActual=$paquete_control_session->moduloActual;	
		$this->opcionActual=$paquete_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$paquete_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$paquete_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$paquete_session=unserialize($this->Session->read(paquete_util::$STR_SESSION_NAME));
				
		if($paquete_session==null) {
			$paquete_session=new paquete_session();
		}
		
		$this->strStyleDivArbol=$paquete_session->strStyleDivArbol;	
		$this->strStyleDivContent=$paquete_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$paquete_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$paquete_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$paquete_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$paquete_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$paquete_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$paquete_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$paquete_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$paquete_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$paquete_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_sistema=$paquete_control_session->strMensajeid_sistema;
		$this->strMensajenombre=$paquete_control_session->strMensajenombre;
		$this->strMensajedescripcion=$paquete_control_session->strMensajedescripcion;
			
		
		$this->sistemasFK=$paquete_control_session->sistemasFK;
		$this->idsistemaDefaultFK=$paquete_control_session->idsistemaDefaultFK;
		
		
		$this->strVisibleFK_Idsistema=$paquete_control_session->strVisibleFK_Idsistema;
		
		
		$this->strTienePermisosmodulo=$paquete_control_session->strTienePermisosmodulo;
		
		
		$this->id_sistemaFK_Idsistema=$paquete_control_session->id_sistemaFK_Idsistema;

		
		
		
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
	
	public function getpaqueteControllerAdditional() {
		return $this->paqueteControllerAdditional;
	}

	public function setpaqueteControllerAdditional($paqueteControllerAdditional) {
		$this->paqueteControllerAdditional = $paqueteControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getpaqueteActual() : paquete {
		return $this->paqueteActual;
	}

	public function setpaqueteActual(paquete $paqueteActual) {
		$this->paqueteActual = $paqueteActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidpaquete() : int {
		return $this->idpaquete;
	}

	public function setidpaquete(int $idpaquete) {
		$this->idpaquete = $idpaquete;
	}
	
	public function getpaquete() : paquete {
		return $this->paquete;
	}

	public function setpaquete(paquete $paquete) {
		$this->paquete = $paquete;
	}
		
	public function getpaqueteLogic() : paquete_logic {		
		return $this->paqueteLogic;
	}

	public function setpaqueteLogic(paquete_logic $paqueteLogic) {
		$this->paqueteLogic = $paqueteLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getpaquetesModel() {		
		try {						
			/*paquetesModel.setWrappedData(paqueteLogic->getpaquetes());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->paquetesModel;
	}
	
	public function setpaquetesModel($paquetesModel) {
		$this->paquetesModel = $paquetesModel;
	}
	
	public function getpaquetes() : array {		
		return $this->paquetes;
	}
	
	public function setpaquetes(array $paquetes) {
		$this->paquetes= $paquetes;
	}
	
	public function getpaquetesEliminados() : array {		
		return $this->paquetesEliminados;
	}
	
	public function setpaquetesEliminados(array $paquetesEliminados) {
		$this->paquetesEliminados= $paquetesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getpaqueteActualFromListDataModel() {
		try {
			/*$paqueteClase= $this->paquetesModel->getRowData();*/
			
			/*return $paquete;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
