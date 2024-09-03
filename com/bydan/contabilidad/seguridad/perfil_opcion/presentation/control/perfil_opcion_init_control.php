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

namespace com\bydan\contabilidad\seguridad\perfil_opcion\presentation\control;

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

use com\bydan\contabilidad\seguridad\usuario\util\usuario_param_return;
use com\bydan\contabilidad\seguridad\sistema\util\sistema_param_return;
use com\bydan\contabilidad\seguridad\usuario\business\logic\usuario_logic;
use com\bydan\contabilidad\seguridad\sistema\business\logic\sistema_logic_add;
use com\bydan\contabilidad\seguridad\resumen_usuario\business\logic\resumen_usuario_logic_add;

use com\bydan\contabilidad\seguridad\perfil_opcion\business\entity\perfil_opcion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/perfil_opcion/util/perfil_opcion_carga.php');
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_carga;

use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_util;
use com\bydan\contabilidad\seguridad\perfil_opcion\util\perfil_opcion_param_return;
use com\bydan\contabilidad\seguridad\perfil_opcion\business\logic\perfil_opcion_logic;
use com\bydan\contabilidad\seguridad\perfil_opcion\presentation\session\perfil_opcion_session;


//FK


use com\bydan\contabilidad\seguridad\perfil\business\entity\perfil;
use com\bydan\contabilidad\seguridad\perfil\business\logic\perfil_logic;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_carga;
use com\bydan\contabilidad\seguridad\perfil\util\perfil_util;

use com\bydan\contabilidad\seguridad\opcion\business\entity\opcion;
use com\bydan\contabilidad\seguridad\opcion\business\logic\opcion_logic;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_carga;
use com\bydan\contabilidad\seguridad\opcion\util\opcion_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
perfil_opcion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
perfil_opcion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
perfil_opcion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
perfil_opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*perfil_opcion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class perfil_opcion_init_control extends ControllerBase {	
	
	public $perfil_opcionClase=null;	
	public $perfil_opcionsModel=null;	
	public $perfil_opcionsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idperfil_opcion=0;	
	public ?int $idperfil_opcionActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $perfil_opcionLogic=null;
	
	public $perfil_opcionActual=null;	
	
	public $perfil_opcion=null;
	public $perfil_opcions=null;
	public $perfil_opcionsEliminados=array();
	public $perfil_opcionsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $perfil_opcionsLocal=array();
	public ?array $perfil_opcionsReporte=null;
	public ?array $perfil_opcionsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadperfil_opcion='onload';
	public string $strTipoPaginaAuxiliarperfil_opcion='none';
	public string $strTipoUsuarioAuxiliarperfil_opcion='none';
		
	public $perfil_opcionReturnGeneral=null;
	public $perfil_opcionParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $perfil_opcionModel=null;
	public $perfil_opcionControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_perfil='';
	public string $strMensajeid_opcion='';
	public string $strMensajetodo='';
	public string $strMensajeingreso='';
	public string $strMensajemodificacion='';
	public string $strMensajeeliminacion='';
	public string $strMensajeconsulta='';
	public string $strMensajebusqueda='';
	public string $strMensajereporte='';
	public string $strMensajeestado='';
	
	
	public string $strVisibleBusquedaPorIdPerfilPorIdOpcion='display:table-row';
	public string $strVisibleFK_Idopcion='display:table-row';
	public string $strVisibleFK_Idperfil='display:table-row';

	
	public array $perfilsFK=array();

	public function getperfilsFK():array {
		return $this->perfilsFK;
	}

	public function setperfilsFK(array $perfilsFK) {
		$this->perfilsFK = $perfilsFK;
	}

	public int $idperfilDefaultFK=-1;

	public function getIdperfilDefaultFK():int {
		return $this->idperfilDefaultFK;
	}

	public function setIdperfilDefaultFK(int $idperfilDefaultFK) {
		$this->idperfilDefaultFK = $idperfilDefaultFK;
	}

	public array $opcionsFK=array();

	public function getopcionsFK():array {
		return $this->opcionsFK;
	}

	public function setopcionsFK(array $opcionsFK) {
		$this->opcionsFK = $opcionsFK;
	}

	public int $idopcionDefaultFK=-1;

	public function getIdopcionDefaultFK():int {
		return $this->idopcionDefaultFK;
	}

	public function setIdopcionDefaultFK(int $idopcionDefaultFK) {
		$this->idopcionDefaultFK = $idopcionDefaultFK;
	}

	
	
	public $opcion_control=null;
	public $opcion_session=null;
	
	
	//BUSQUEDA INTERNA FK
	public $idopcionActual=0;

	public function getidopcionActual() {
		return $this->idopcionActual;
	}

	public function setidopcionActual($idopcionActual) {
		$this->idopcionActual=$idopcionActual;
	}
	
	
	
	
	public  $id_perfilBusquedaPorIdPerfilPorIdOpcion=null;


	public  $id_opcionBusquedaPorIdPerfilPorIdOpcion=null;

	public  $id_opcionFK_Idopcion=null;

	public  $id_perfilFK_Idperfil=null;

	public  $id_perfilPorIdPerfilPorIdOpcion=null;


	public  $id_opcionPorIdPerfilPorIdOpcion=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->perfil_opcionLogic==null) {
				$this->perfil_opcionLogic=new perfil_opcion_logic();
			}
			
		} else {
			if($this->perfil_opcionLogic==null) {
				$this->perfil_opcionLogic=new perfil_opcion_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->perfil_opcionClase==null) {
				$this->perfil_opcionClase=new perfil_opcion();
			}
			
			$this->perfil_opcionClase->setId(0);	
				
				
			$this->perfil_opcionClase->setid_perfil(-1);	
			$this->perfil_opcionClase->setid_opcion(-1);	
			$this->perfil_opcionClase->settodo(false);	
			$this->perfil_opcionClase->setingreso(false);	
			$this->perfil_opcionClase->setmodificacion(false);	
			$this->perfil_opcionClase->seteliminacion(false);	
			$this->perfil_opcionClase->setconsulta(false);	
			$this->perfil_opcionClase->setbusqueda(false);	
			$this->perfil_opcionClase->setreporte(false);	
			$this->perfil_opcionClase->setestado(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('perfil_opcion');
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
		$this->cargarParametrosReporteBase('perfil_opcion');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('perfil_opcion');
	}
	
	public function actualizarControllerConReturnGeneral(perfil_opcion_param_return $perfil_opcionReturnGeneral) {
		if($perfil_opcionReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesperfil_opcionsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$perfil_opcionReturnGeneral->getsMensajeProceso();
		}
		
		if($perfil_opcionReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$perfil_opcionReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($perfil_opcionReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$perfil_opcionReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$perfil_opcionReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($perfil_opcionReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($perfil_opcionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$perfil_opcionReturnGeneral->getsFuncionJs();
		}
		
		if($perfil_opcionReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(perfil_opcion_session $perfil_opcion_session){
		$this->strStyleDivArbol=$perfil_opcion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$perfil_opcion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$perfil_opcion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$perfil_opcion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$perfil_opcion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$perfil_opcion_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$perfil_opcion_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(perfil_opcion_session $perfil_opcion_session){
		$perfil_opcion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$perfil_opcion_session->strStyleDivHeader='display:none';			
		$perfil_opcion_session->strStyleDivContent='width:93%;height:100%';	
		$perfil_opcion_session->strStyleDivOpcionesBanner='display:none';	
		$perfil_opcion_session->strStyleDivExpandirColapsar='display:none';	
		$perfil_opcion_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(perfil_opcion_control $perfil_opcion_control_session){
		$this->idNuevo=$perfil_opcion_control_session->idNuevo;
		$this->perfil_opcionActual=$perfil_opcion_control_session->perfil_opcionActual;
		$this->perfil_opcion=$perfil_opcion_control_session->perfil_opcion;
		$this->perfil_opcionClase=$perfil_opcion_control_session->perfil_opcionClase;
		$this->perfil_opcions=$perfil_opcion_control_session->perfil_opcions;
		$this->perfil_opcionsEliminados=$perfil_opcion_control_session->perfil_opcionsEliminados;
		$this->perfil_opcion=$perfil_opcion_control_session->perfil_opcion;
		$this->perfil_opcionsReporte=$perfil_opcion_control_session->perfil_opcionsReporte;
		$this->perfil_opcionsSeleccionados=$perfil_opcion_control_session->perfil_opcionsSeleccionados;
		$this->arrOrderBy=$perfil_opcion_control_session->arrOrderBy;
		$this->arrOrderByRel=$perfil_opcion_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$perfil_opcion_control_session->arrHistoryWebs;
		$this->arrSessionBases=$perfil_opcion_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadperfil_opcion=$perfil_opcion_control_session->strTypeOnLoadperfil_opcion;
		$this->strTipoPaginaAuxiliarperfil_opcion=$perfil_opcion_control_session->strTipoPaginaAuxiliarperfil_opcion;
		$this->strTipoUsuarioAuxiliarperfil_opcion=$perfil_opcion_control_session->strTipoUsuarioAuxiliarperfil_opcion;	
		
		$this->bitEsPopup=$perfil_opcion_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$perfil_opcion_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$perfil_opcion_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$perfil_opcion_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$perfil_opcion_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$perfil_opcion_control_session->strSufijo;
		$this->bitEsRelaciones=$perfil_opcion_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$perfil_opcion_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$perfil_opcion_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$perfil_opcion_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$perfil_opcion_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$perfil_opcion_control_session->strTituloTabla;
		$this->strTituloPathPagina=$perfil_opcion_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$perfil_opcion_control_session->strTituloPathElementoActual;
		
		if($this->perfil_opcionLogic==null) {			
			$this->perfil_opcionLogic=new perfil_opcion_logic();
		}
		
		
		if($this->perfil_opcionClase==null) {
			$this->perfil_opcionClase=new perfil_opcion();	
		}
		
		$this->perfil_opcionLogic->setperfil_opcion($this->perfil_opcionClase);
		
		
		if($this->perfil_opcions==null) {
			$this->perfil_opcions=array();	
		}
		
		$this->perfil_opcionLogic->setperfil_opcions($this->perfil_opcions);
		
		
		$this->strTipoView=$perfil_opcion_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$perfil_opcion_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$perfil_opcion_control_session->datosCliente;
		$this->strAccionBusqueda=$perfil_opcion_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$perfil_opcion_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$perfil_opcion_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$perfil_opcion_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$perfil_opcion_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$perfil_opcion_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$perfil_opcion_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$perfil_opcion_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$perfil_opcion_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$perfil_opcion_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$perfil_opcion_control_session->strTipoPaginacion;
		$this->strTipoAccion=$perfil_opcion_control_session->strTipoAccion;
		$this->tiposReportes=$perfil_opcion_control_session->tiposReportes;
		$this->tiposReporte=$perfil_opcion_control_session->tiposReporte;
		$this->tiposAcciones=$perfil_opcion_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$perfil_opcion_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$perfil_opcion_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$perfil_opcion_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$perfil_opcion_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$perfil_opcion_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$perfil_opcion_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$perfil_opcion_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$perfil_opcion_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$perfil_opcion_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$perfil_opcion_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$perfil_opcion_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$perfil_opcion_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$perfil_opcion_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$perfil_opcion_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$perfil_opcion_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$perfil_opcion_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$perfil_opcion_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$perfil_opcion_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$perfil_opcion_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$perfil_opcion_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$perfil_opcion_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$perfil_opcion_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$perfil_opcion_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$perfil_opcion_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$perfil_opcion_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$perfil_opcion_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$perfil_opcion_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$perfil_opcion_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$perfil_opcion_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$perfil_opcion_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$perfil_opcion_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$perfil_opcion_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$perfil_opcion_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$perfil_opcion_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$perfil_opcion_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$perfil_opcion_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$perfil_opcion_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$perfil_opcion_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$perfil_opcion_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$perfil_opcion_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$perfil_opcion_control_session->resumenUsuarioActual;	
		$this->moduloActual=$perfil_opcion_control_session->moduloActual;	
		$this->opcionActual=$perfil_opcion_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$perfil_opcion_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$perfil_opcion_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$perfil_opcion_session=unserialize($this->Session->read(perfil_opcion_util::$STR_SESSION_NAME));
				
		if($perfil_opcion_session==null) {
			$perfil_opcion_session=new perfil_opcion_session();
		}
		
		$this->strStyleDivArbol=$perfil_opcion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$perfil_opcion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$perfil_opcion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$perfil_opcion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$perfil_opcion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$perfil_opcion_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$perfil_opcion_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$perfil_opcion_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$perfil_opcion_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$perfil_opcion_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$perfil_opcion_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_perfil=$perfil_opcion_control_session->strMensajeid_perfil;
		$this->strMensajeid_opcion=$perfil_opcion_control_session->strMensajeid_opcion;
		$this->strMensajetodo=$perfil_opcion_control_session->strMensajetodo;
		$this->strMensajeingreso=$perfil_opcion_control_session->strMensajeingreso;
		$this->strMensajemodificacion=$perfil_opcion_control_session->strMensajemodificacion;
		$this->strMensajeeliminacion=$perfil_opcion_control_session->strMensajeeliminacion;
		$this->strMensajeconsulta=$perfil_opcion_control_session->strMensajeconsulta;
		$this->strMensajebusqueda=$perfil_opcion_control_session->strMensajebusqueda;
		$this->strMensajereporte=$perfil_opcion_control_session->strMensajereporte;
		$this->strMensajeestado=$perfil_opcion_control_session->strMensajeestado;
			
		
		$this->perfilsFK=$perfil_opcion_control_session->perfilsFK;
		$this->idperfilDefaultFK=$perfil_opcion_control_session->idperfilDefaultFK;
		$this->opcionsFK=$perfil_opcion_control_session->opcionsFK;
		$this->idopcionDefaultFK=$perfil_opcion_control_session->idopcionDefaultFK;
		
		
		$this->strVisibleBusquedaPorIdPerfilPorIdOpcion=$perfil_opcion_control_session->strVisibleBusquedaPorIdPerfilPorIdOpcion;
		$this->strVisibleFK_Idopcion=$perfil_opcion_control_session->strVisibleFK_Idopcion;
		$this->strVisibleFK_Idperfil=$perfil_opcion_control_session->strVisibleFK_Idperfil;
		
		
		
		
		$this->id_perfilBusquedaPorIdPerfilPorIdOpcion=$perfil_opcion_control_session->id_perfilBusquedaPorIdPerfilPorIdOpcion;

		$this->id_opcionBusquedaPorIdPerfilPorIdOpcion=$perfil_opcion_control_session->id_opcionBusquedaPorIdPerfilPorIdOpcion;
		$this->id_opcionFK_Idopcion=$perfil_opcion_control_session->id_opcionFK_Idopcion;
		$this->id_perfilFK_Idperfil=$perfil_opcion_control_session->id_perfilFK_Idperfil;
		$this->id_perfilPorIdPerfilPorIdOpcion=$perfil_opcion_control_session->id_perfilPorIdPerfilPorIdOpcion;

		$this->id_opcionPorIdPerfilPorIdOpcion=$perfil_opcion_control_session->id_opcionPorIdPerfilPorIdOpcion;

		
		
		
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
	
	public function getperfil_opcionControllerAdditional() {
		return $this->perfil_opcionControllerAdditional;
	}

	public function setperfil_opcionControllerAdditional($perfil_opcionControllerAdditional) {
		$this->perfil_opcionControllerAdditional = $perfil_opcionControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getperfil_opcionActual() : perfil_opcion {
		return $this->perfil_opcionActual;
	}

	public function setperfil_opcionActual(perfil_opcion $perfil_opcionActual) {
		$this->perfil_opcionActual = $perfil_opcionActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidperfil_opcion() : int {
		return $this->idperfil_opcion;
	}

	public function setidperfil_opcion(int $idperfil_opcion) {
		$this->idperfil_opcion = $idperfil_opcion;
	}
	
	public function getperfil_opcion() : perfil_opcion {
		return $this->perfil_opcion;
	}

	public function setperfil_opcion(perfil_opcion $perfil_opcion) {
		$this->perfil_opcion = $perfil_opcion;
	}
		
	public function getperfil_opcionLogic() : perfil_opcion_logic {		
		return $this->perfil_opcionLogic;
	}

	public function setperfil_opcionLogic(perfil_opcion_logic $perfil_opcionLogic) {
		$this->perfil_opcionLogic = $perfil_opcionLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getperfil_opcionsModel() {		
		try {						
			/*perfil_opcionsModel.setWrappedData(perfil_opcionLogic->getperfil_opcions());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->perfil_opcionsModel;
	}
	
	public function setperfil_opcionsModel($perfil_opcionsModel) {
		$this->perfil_opcionsModel = $perfil_opcionsModel;
	}
	
	public function getperfil_opcions() : array {		
		return $this->perfil_opcions;
	}
	
	public function setperfil_opcions(array $perfil_opcions) {
		$this->perfil_opcions= $perfil_opcions;
	}
	
	public function getperfil_opcionsEliminados() : array {		
		return $this->perfil_opcionsEliminados;
	}
	
	public function setperfil_opcionsEliminados(array $perfil_opcionsEliminados) {
		$this->perfil_opcionsEliminados= $perfil_opcionsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getperfil_opcionActualFromListDataModel() {
		try {
			/*$perfil_opcionClase= $this->perfil_opcionsModel->getRowData();*/
			
			/*return $perfil_opcion;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
