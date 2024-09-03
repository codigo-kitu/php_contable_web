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

namespace com\bydan\contabilidad\seguridad\sistema\presentation\control;

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

use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;

use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic_add;

use com\bydan\contabilidad\seguridad\sistema\business\entity\sistema;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/sistema/util/sistema_carga.php');
use com\bydan\contabilidad\seguridad\sistema\util\sistema_carga;

use com\bydan\contabilidad\seguridad\sistema\util\sistema_util;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_param_return;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic_add;
use com\bydan\contabilidad\seguridad\sistema\presentation\session\sistema_session;


//FK


//REL


use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;
use com\bydan\contabilidad\seguridad\perfil\presentation\session\perfil_session;

use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;
use com\bydan\contabilidad\seguridad\opcion\presentation\session\opcion_session;

use com\bydan\contabilidad\seguridad\paquete\util\paquete_carga;
use com\bydan\contabilidad\seguridad\paquete\util\paquete_util;
use com\bydan\contabilidad\seguridad\paquete\presentation\session\paquete_session;

use com\bydan\contabilidad\seguridad\modulo\util\modulo_carga;
use com\bydan\contabilidad\seguridad\modulo\util\modulo_util;
use com\bydan\contabilidad\seguridad\modulo\presentation\session\modulo_session;


/*CARGA ARCHIVOS FRAMEWORK*/
sistema_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
sistema_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
sistema_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
sistema_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*sistema_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class sistema_init_control extends ControllerBase {	
	
	public $sistemaClase=null;	
	public $sistemasModel=null;	
	public $sistemasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idsistema=0;	
	public ?int $idsistemaActual=0;
		
	
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $sistemaLogic=null;
	
	public $sistemaActual=null;	
	
	public $sistema=null;
	public $sistemas=null;
	public $sistemasEliminados=array();
	public $sistemasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $sistemasLocal=array();
	public ?array $sistemasReporte=null;
	public ?array $sistemasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadsistema='onload';
	public string $strTipoPaginaAuxiliarsistema='none';
	public string $strTipoUsuarioAuxiliarsistema='none';
		
	public $sistemaReturnGeneral=null;
	public $sistemaParameterGeneral=null;	
	
	public $sistemaModel=null;
	public $sistemaControllerAdditional=null;
	
	
	

	public $perfilLogic=null;

	public function  getperfilLogic() {
		return $this->perfilLogic;
	}

	public function setperfilLogic($perfilLogic) {
		$this->perfilLogic =$perfilLogic;
	}


	public $opcionLogic=null;

	public function  getopcionLogic() {
		return $this->opcionLogic;
	}

	public function setopcionLogic($opcionLogic) {
		$this->opcionLogic =$opcionLogic;
	}


	public $paqueteLogic=null;

	public function  getpaqueteLogic() {
		return $this->paqueteLogic;
	}

	public function setpaqueteLogic($paqueteLogic) {
		$this->paqueteLogic =$paqueteLogic;
	}


	public $moduloLogic=null;

	public function  getmoduloLogic() {
		return $this->moduloLogic;
	}

	public function setmoduloLogic($moduloLogic) {
		$this->moduloLogic =$moduloLogic;
	}
 	
	
	public string $strMensajecodigo='';
	public string $strMensajenombre_principal='';
	public string $strMensajenombre_secundario='';
	public string $strMensajeestado='';
	
	
	public string $strVisibleBusquedaPorNombrePrincipal='display:table-row';

	
	
	
	
	
	
	
	public $strTienePermisosperfil='none';
	public $strTienePermisosopcion='none';
	public $strTienePermisospaquete='none';
	public $strTienePermisosmodulo='none';
	
	
	public  $nombre_principalBusquedaPorNombrePrincipal=null;

	public  $codigoPorCodigo=null;

	public  $nombre_principalPorNombrePrincipal=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->sistemaLogic==null) {
				$this->sistemaLogic=new sistema_logic();
			}
			
		} else {
			if($this->sistemaLogic==null) {
				$this->sistemaLogic=new sistema_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->sistemaClase==null) {
				$this->sistemaClase=new sistema();
			}
			
			$this->sistemaClase->setId(0);	
				
				
			$this->sistemaClase->setcodigo('');	
			$this->sistemaClase->setnombre_principal('');	
			$this->sistemaClase->setnombre_secundario('');	
			$this->sistemaClase->setestado(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('sistema');
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
		$this->cargarParametrosReporteBase('sistema');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('sistema');
	}
	
	public function actualizarControllerConReturnGeneral(sistema_param_return $sistemaReturnGeneral) {
		if($sistemaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajessistemasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$sistemaReturnGeneral->getsMensajeProceso();
		}
		
		if($sistemaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$sistemaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($sistemaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$sistemaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$sistemaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($sistemaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($sistemaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$sistemaReturnGeneral->getsFuncionJs();
		}
		
		if($sistemaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(sistema_session $sistema_session){
		$this->strStyleDivArbol=$sistema_session->strStyleDivArbol;	
		$this->strStyleDivContent=$sistema_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$sistema_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$sistema_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$sistema_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$sistema_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$sistema_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(sistema_session $sistema_session){
		$sistema_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$sistema_session->strStyleDivHeader='display:none';			
		$sistema_session->strStyleDivContent='width:93%;height:100%';	
		$sistema_session->strStyleDivOpcionesBanner='display:none';	
		$sistema_session->strStyleDivExpandirColapsar='display:none';	
		$sistema_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(sistema_control $sistema_control_session){
		$this->idNuevo=$sistema_control_session->idNuevo;
		$this->sistemaActual=$sistema_control_session->sistemaActual;
		$this->sistema=$sistema_control_session->sistema;
		$this->sistemaClase=$sistema_control_session->sistemaClase;
		$this->sistemas=$sistema_control_session->sistemas;
		$this->sistemasEliminados=$sistema_control_session->sistemasEliminados;
		$this->sistema=$sistema_control_session->sistema;
		$this->sistemasReporte=$sistema_control_session->sistemasReporte;
		$this->sistemasSeleccionados=$sistema_control_session->sistemasSeleccionados;
		$this->arrOrderBy=$sistema_control_session->arrOrderBy;
		$this->arrOrderByRel=$sistema_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$sistema_control_session->arrHistoryWebs;
		$this->arrSessionBases=$sistema_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadsistema=$sistema_control_session->strTypeOnLoadsistema;
		$this->strTipoPaginaAuxiliarsistema=$sistema_control_session->strTipoPaginaAuxiliarsistema;
		$this->strTipoUsuarioAuxiliarsistema=$sistema_control_session->strTipoUsuarioAuxiliarsistema;	
		
		$this->bitEsPopup=$sistema_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$sistema_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$sistema_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$sistema_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$sistema_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$sistema_control_session->strSufijo;
		$this->bitEsRelaciones=$sistema_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$sistema_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$sistema_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$sistema_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$sistema_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$sistema_control_session->strTituloTabla;
		$this->strTituloPathPagina=$sistema_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$sistema_control_session->strTituloPathElementoActual;
		
		if($this->sistemaLogic==null) {			
			$this->sistemaLogic=new sistema_logic();
		}
		
		
		if($this->sistemaClase==null) {
			$this->sistemaClase=new sistema();	
		}
		
		$this->sistemaLogic->setsistema($this->sistemaClase);
		
		
		if($this->sistemas==null) {
			$this->sistemas=array();	
		}
		
		$this->sistemaLogic->setsistemas($this->sistemas);
		
		
		$this->strTipoView=$sistema_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$sistema_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$sistema_control_session->datosCliente;
		$this->strAccionBusqueda=$sistema_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$sistema_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$sistema_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$sistema_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$sistema_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$sistema_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$sistema_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$sistema_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$sistema_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$sistema_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$sistema_control_session->strTipoPaginacion;
		$this->strTipoAccion=$sistema_control_session->strTipoAccion;
		$this->tiposReportes=$sistema_control_session->tiposReportes;
		$this->tiposReporte=$sistema_control_session->tiposReporte;
		$this->tiposAcciones=$sistema_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$sistema_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$sistema_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$sistema_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$sistema_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$sistema_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$sistema_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$sistema_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$sistema_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$sistema_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$sistema_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$sistema_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$sistema_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$sistema_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$sistema_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$sistema_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$sistema_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$sistema_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$sistema_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$sistema_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$sistema_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$sistema_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$sistema_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$sistema_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$sistema_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$sistema_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$sistema_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$sistema_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$sistema_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$sistema_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$sistema_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$sistema_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$sistema_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$sistema_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$sistema_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$sistema_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$sistema_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$sistema_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$sistema_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$sistema_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$sistema_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$sistema_control_session->resumenUsuarioActual;	
		$this->moduloActual=$sistema_control_session->moduloActual;	
		$this->opcionActual=$sistema_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$sistema_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$sistema_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$sistema_session=unserialize($this->Session->read(sistema_util::$STR_SESSION_NAME));
				
		if($sistema_session==null) {
			$sistema_session=new sistema_session();
		}
		
		$this->strStyleDivArbol=$sistema_session->strStyleDivArbol;	
		$this->strStyleDivContent=$sistema_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$sistema_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$sistema_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$sistema_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$sistema_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$sistema_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$sistema_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$sistema_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$sistema_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$sistema_session->strRecargarFkQuery;
		*/
		
		$this->strMensajecodigo=$sistema_control_session->strMensajecodigo;
		$this->strMensajenombre_principal=$sistema_control_session->strMensajenombre_principal;
		$this->strMensajenombre_secundario=$sistema_control_session->strMensajenombre_secundario;
		$this->strMensajeestado=$sistema_control_session->strMensajeestado;
			
		
		
		
		$this->strVisibleBusquedaPorNombrePrincipal=$sistema_control_session->strVisibleBusquedaPorNombrePrincipal;
		
		
		$this->strTienePermisosperfil=$sistema_control_session->strTienePermisosperfil;
		$this->strTienePermisosopcion=$sistema_control_session->strTienePermisosopcion;
		$this->strTienePermisospaquete=$sistema_control_session->strTienePermisospaquete;
		$this->strTienePermisosmodulo=$sistema_control_session->strTienePermisosmodulo;
		
		
		$this->nombre_principalBusquedaPorNombrePrincipal=$sistema_control_session->nombre_principalBusquedaPorNombrePrincipal;
		$this->codigoPorCodigo=$sistema_control_session->codigoPorCodigo;
		$this->nombre_principalPorNombrePrincipal=$sistema_control_session->nombre_principalPorNombrePrincipal;

		
		
		
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
	
	public function getsistemaControllerAdditional() {
		return $this->sistemaControllerAdditional;
	}

	public function setsistemaControllerAdditional($sistemaControllerAdditional) {
		$this->sistemaControllerAdditional = $sistemaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getsistemaActual() : sistema {
		return $this->sistemaActual;
	}

	public function setsistemaActual(sistema $sistemaActual) {
		$this->sistemaActual = $sistemaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidsistema() : int {
		return $this->idsistema;
	}

	public function setidsistema(int $idsistema) {
		$this->idsistema = $idsistema;
	}
	
	public function getsistema() : sistema {
		return $this->sistema;
	}

	public function setsistema(sistema $sistema) {
		$this->sistema = $sistema;
	}
		
	public function getsistemaLogic() : sistema_logic {		
		return $this->sistemaLogic;
	}

	public function setsistemaLogic(sistema_logic $sistemaLogic) {
		$this->sistemaLogic = $sistemaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getsistemasModel() {		
		try {						
			/*sistemasModel.setWrappedData(sistemaLogic->getsistemas());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->sistemasModel;
	}
	
	public function setsistemasModel($sistemasModel) {
		$this->sistemasModel = $sistemasModel;
	}
	
	public function getsistemas() : array {		
		return $this->sistemas;
	}
	
	public function setsistemas(array $sistemas) {
		$this->sistemas= $sistemas;
	}
	
	public function getsistemasEliminados() : array {		
		return $this->sistemasEliminados;
	}
	
	public function setsistemasEliminados(array $sistemasEliminados) {
		$this->sistemasEliminados= $sistemasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getsistemaActualFromListDataModel() {
		try {
			/*$sistemaClase= $this->sistemasModel->getRowData();*/
			
			/*return $sistema;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
