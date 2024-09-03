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

namespace com\bydan\contabilidad\contabilidad\contador_auxiliar\presentation\control;

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

use com\bydan\contabilidad\contabilidad\contador_auxiliar\business\entity\contador_auxiliar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/contador_auxiliar/util/contador_auxiliar_carga.php');
use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_carga;

use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_util;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_param_return;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\business\logic\contador_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\presentation\session\contador_auxiliar_session;


//FK


use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\logic\libro_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_carga;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
contador_auxiliar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
contador_auxiliar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
contador_auxiliar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
contador_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*contador_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class contador_auxiliar_init_control extends ControllerBase {	
	
	public $contador_auxiliarClase=null;	
	public $contador_auxiliarsModel=null;	
	public $contador_auxiliarsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcontador_auxiliar=0;	
	public ?int $idcontador_auxiliarActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $contador_auxiliarLogic=null;
	
	public $contador_auxiliarActual=null;	
	
	public $contador_auxiliar=null;
	public $contador_auxiliars=null;
	public $contador_auxiliarsEliminados=array();
	public $contador_auxiliarsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $contador_auxiliarsLocal=array();
	public ?array $contador_auxiliarsReporte=null;
	public ?array $contador_auxiliarsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcontador_auxiliar='onload';
	public string $strTipoPaginaAuxiliarcontador_auxiliar='none';
	public string $strTipoUsuarioAuxiliarcontador_auxiliar='none';
		
	public $contador_auxiliarReturnGeneral=null;
	public $contador_auxiliarParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $contador_auxiliarModel=null;
	public $contador_auxiliarControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_contador='';
	public string $strMensajeid_libro_auxiliar='';
	public string $strMensajeperiodo_anual='';
	public string $strMensajemes='';
	public string $strMensajecontador='';
	
	
	public string $strVisibleFK_Idlibro_auxiliar='display:table-row';

	
	public array $libro_auxiliarsFK=array();

	public function getlibro_auxiliarsFK():array {
		return $this->libro_auxiliarsFK;
	}

	public function setlibro_auxiliarsFK(array $libro_auxiliarsFK) {
		$this->libro_auxiliarsFK = $libro_auxiliarsFK;
	}

	public int $idlibro_auxiliarDefaultFK=-1;

	public function getIdlibro_auxiliarDefaultFK():int {
		return $this->idlibro_auxiliarDefaultFK;
	}

	public function setIdlibro_auxiliarDefaultFK(int $idlibro_auxiliarDefaultFK) {
		$this->idlibro_auxiliarDefaultFK = $idlibro_auxiliarDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_libro_auxiliarFK_Idlibro_auxiliar=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->contador_auxiliarLogic==null) {
				$this->contador_auxiliarLogic=new contador_auxiliar_logic();
			}
			
		} else {
			if($this->contador_auxiliarLogic==null) {
				$this->contador_auxiliarLogic=new contador_auxiliar_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->contador_auxiliarClase==null) {
				$this->contador_auxiliarClase=new contador_auxiliar();
			}
			
			$this->contador_auxiliarClase->setId(0);	
				
				
			$this->contador_auxiliarClase->setid_contador('');	
			$this->contador_auxiliarClase->setid_libro_auxiliar(-1);	
			$this->contador_auxiliarClase->setperiodo_anual(0);	
			$this->contador_auxiliarClase->setmes(0);	
			$this->contador_auxiliarClase->setcontador(0);	
			
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
		$this->prepararEjecutarMantenimientoBase('contador_auxiliar');
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
		$this->cargarParametrosReporteBase('contador_auxiliar');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('contador_auxiliar');
	}
	
	public function actualizarControllerConReturnGeneral(contador_auxiliar_param_return $contador_auxiliarReturnGeneral) {
		if($contador_auxiliarReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescontador_auxiliarsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$contador_auxiliarReturnGeneral->getsMensajeProceso();
		}
		
		if($contador_auxiliarReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$contador_auxiliarReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($contador_auxiliarReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$contador_auxiliarReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$contador_auxiliarReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($contador_auxiliarReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($contador_auxiliarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$contador_auxiliarReturnGeneral->getsFuncionJs();
		}
		
		if($contador_auxiliarReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(contador_auxiliar_session $contador_auxiliar_session){
		$this->strStyleDivArbol=$contador_auxiliar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$contador_auxiliar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$contador_auxiliar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$contador_auxiliar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$contador_auxiliar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$contador_auxiliar_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$contador_auxiliar_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(contador_auxiliar_session $contador_auxiliar_session){
		$contador_auxiliar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$contador_auxiliar_session->strStyleDivHeader='display:none';			
		$contador_auxiliar_session->strStyleDivContent='width:93%;height:100%';	
		$contador_auxiliar_session->strStyleDivOpcionesBanner='display:none';	
		$contador_auxiliar_session->strStyleDivExpandirColapsar='display:none';	
		$contador_auxiliar_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(contador_auxiliar_control $contador_auxiliar_control_session){
		$this->idNuevo=$contador_auxiliar_control_session->idNuevo;
		$this->contador_auxiliarActual=$contador_auxiliar_control_session->contador_auxiliarActual;
		$this->contador_auxiliar=$contador_auxiliar_control_session->contador_auxiliar;
		$this->contador_auxiliarClase=$contador_auxiliar_control_session->contador_auxiliarClase;
		$this->contador_auxiliars=$contador_auxiliar_control_session->contador_auxiliars;
		$this->contador_auxiliarsEliminados=$contador_auxiliar_control_session->contador_auxiliarsEliminados;
		$this->contador_auxiliar=$contador_auxiliar_control_session->contador_auxiliar;
		$this->contador_auxiliarsReporte=$contador_auxiliar_control_session->contador_auxiliarsReporte;
		$this->contador_auxiliarsSeleccionados=$contador_auxiliar_control_session->contador_auxiliarsSeleccionados;
		$this->arrOrderBy=$contador_auxiliar_control_session->arrOrderBy;
		$this->arrOrderByRel=$contador_auxiliar_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$contador_auxiliar_control_session->arrHistoryWebs;
		$this->arrSessionBases=$contador_auxiliar_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcontador_auxiliar=$contador_auxiliar_control_session->strTypeOnLoadcontador_auxiliar;
		$this->strTipoPaginaAuxiliarcontador_auxiliar=$contador_auxiliar_control_session->strTipoPaginaAuxiliarcontador_auxiliar;
		$this->strTipoUsuarioAuxiliarcontador_auxiliar=$contador_auxiliar_control_session->strTipoUsuarioAuxiliarcontador_auxiliar;	
		
		$this->bitEsPopup=$contador_auxiliar_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$contador_auxiliar_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$contador_auxiliar_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$contador_auxiliar_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$contador_auxiliar_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$contador_auxiliar_control_session->strSufijo;
		$this->bitEsRelaciones=$contador_auxiliar_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$contador_auxiliar_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$contador_auxiliar_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$contador_auxiliar_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$contador_auxiliar_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$contador_auxiliar_control_session->strTituloTabla;
		$this->strTituloPathPagina=$contador_auxiliar_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$contador_auxiliar_control_session->strTituloPathElementoActual;
		
		if($this->contador_auxiliarLogic==null) {			
			$this->contador_auxiliarLogic=new contador_auxiliar_logic();
		}
		
		
		if($this->contador_auxiliarClase==null) {
			$this->contador_auxiliarClase=new contador_auxiliar();	
		}
		
		$this->contador_auxiliarLogic->setcontador_auxiliar($this->contador_auxiliarClase);
		
		
		if($this->contador_auxiliars==null) {
			$this->contador_auxiliars=array();	
		}
		
		$this->contador_auxiliarLogic->setcontador_auxiliars($this->contador_auxiliars);
		
		
		$this->strTipoView=$contador_auxiliar_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$contador_auxiliar_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$contador_auxiliar_control_session->datosCliente;
		$this->strAccionBusqueda=$contador_auxiliar_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$contador_auxiliar_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$contador_auxiliar_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$contador_auxiliar_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$contador_auxiliar_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$contador_auxiliar_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$contador_auxiliar_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$contador_auxiliar_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$contador_auxiliar_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$contador_auxiliar_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$contador_auxiliar_control_session->strTipoPaginacion;
		$this->strTipoAccion=$contador_auxiliar_control_session->strTipoAccion;
		$this->tiposReportes=$contador_auxiliar_control_session->tiposReportes;
		$this->tiposReporte=$contador_auxiliar_control_session->tiposReporte;
		$this->tiposAcciones=$contador_auxiliar_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$contador_auxiliar_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$contador_auxiliar_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$contador_auxiliar_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$contador_auxiliar_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$contador_auxiliar_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$contador_auxiliar_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$contador_auxiliar_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$contador_auxiliar_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$contador_auxiliar_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$contador_auxiliar_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$contador_auxiliar_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$contador_auxiliar_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$contador_auxiliar_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$contador_auxiliar_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$contador_auxiliar_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$contador_auxiliar_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$contador_auxiliar_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$contador_auxiliar_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$contador_auxiliar_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$contador_auxiliar_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$contador_auxiliar_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$contador_auxiliar_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$contador_auxiliar_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$contador_auxiliar_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$contador_auxiliar_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$contador_auxiliar_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$contador_auxiliar_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$contador_auxiliar_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$contador_auxiliar_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$contador_auxiliar_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$contador_auxiliar_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$contador_auxiliar_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$contador_auxiliar_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$contador_auxiliar_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$contador_auxiliar_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$contador_auxiliar_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$contador_auxiliar_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$contador_auxiliar_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$contador_auxiliar_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$contador_auxiliar_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$contador_auxiliar_control_session->resumenUsuarioActual;	
		$this->moduloActual=$contador_auxiliar_control_session->moduloActual;	
		$this->opcionActual=$contador_auxiliar_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$contador_auxiliar_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$contador_auxiliar_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$contador_auxiliar_session=unserialize($this->Session->read(contador_auxiliar_util::$STR_SESSION_NAME));
				
		if($contador_auxiliar_session==null) {
			$contador_auxiliar_session=new contador_auxiliar_session();
		}
		
		$this->strStyleDivArbol=$contador_auxiliar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$contador_auxiliar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$contador_auxiliar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$contador_auxiliar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$contador_auxiliar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$contador_auxiliar_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$contador_auxiliar_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$contador_auxiliar_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$contador_auxiliar_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$contador_auxiliar_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$contador_auxiliar_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_contador=$contador_auxiliar_control_session->strMensajeid_contador;
		$this->strMensajeid_libro_auxiliar=$contador_auxiliar_control_session->strMensajeid_libro_auxiliar;
		$this->strMensajeperiodo_anual=$contador_auxiliar_control_session->strMensajeperiodo_anual;
		$this->strMensajemes=$contador_auxiliar_control_session->strMensajemes;
		$this->strMensajecontador=$contador_auxiliar_control_session->strMensajecontador;
			
		
		$this->libro_auxiliarsFK=$contador_auxiliar_control_session->libro_auxiliarsFK;
		$this->idlibro_auxiliarDefaultFK=$contador_auxiliar_control_session->idlibro_auxiliarDefaultFK;
		
		
		$this->strVisibleFK_Idlibro_auxiliar=$contador_auxiliar_control_session->strVisibleFK_Idlibro_auxiliar;
		
		
		
		
		$this->id_libro_auxiliarFK_Idlibro_auxiliar=$contador_auxiliar_control_session->id_libro_auxiliarFK_Idlibro_auxiliar;

		
		
		
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
	
	public function getcontador_auxiliarControllerAdditional() {
		return $this->contador_auxiliarControllerAdditional;
	}

	public function setcontador_auxiliarControllerAdditional($contador_auxiliarControllerAdditional) {
		$this->contador_auxiliarControllerAdditional = $contador_auxiliarControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcontador_auxiliarActual() : contador_auxiliar {
		return $this->contador_auxiliarActual;
	}

	public function setcontador_auxiliarActual(contador_auxiliar $contador_auxiliarActual) {
		$this->contador_auxiliarActual = $contador_auxiliarActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcontador_auxiliar() : int {
		return $this->idcontador_auxiliar;
	}

	public function setidcontador_auxiliar(int $idcontador_auxiliar) {
		$this->idcontador_auxiliar = $idcontador_auxiliar;
	}
	
	public function getcontador_auxiliar() : contador_auxiliar {
		return $this->contador_auxiliar;
	}

	public function setcontador_auxiliar(contador_auxiliar $contador_auxiliar) {
		$this->contador_auxiliar = $contador_auxiliar;
	}
		
	public function getcontador_auxiliarLogic() : contador_auxiliar_logic {		
		return $this->contador_auxiliarLogic;
	}

	public function setcontador_auxiliarLogic(contador_auxiliar_logic $contador_auxiliarLogic) {
		$this->contador_auxiliarLogic = $contador_auxiliarLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcontador_auxiliarsModel() {		
		try {						
			/*contador_auxiliarsModel.setWrappedData(contador_auxiliarLogic->getcontador_auxiliars());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->contador_auxiliarsModel;
	}
	
	public function setcontador_auxiliarsModel($contador_auxiliarsModel) {
		$this->contador_auxiliarsModel = $contador_auxiliarsModel;
	}
	
	public function getcontador_auxiliars() : array {		
		return $this->contador_auxiliars;
	}
	
	public function setcontador_auxiliars(array $contador_auxiliars) {
		$this->contador_auxiliars= $contador_auxiliars;
	}
	
	public function getcontador_auxiliarsEliminados() : array {		
		return $this->contador_auxiliarsEliminados;
	}
	
	public function setcontador_auxiliarsEliminados(array $contador_auxiliarsEliminados) {
		$this->contador_auxiliarsEliminados= $contador_auxiliarsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcontador_auxiliarActualFromListDataModel() {
		try {
			/*$contador_auxiliarClase= $this->contador_auxiliarsModel->getRowData();*/
			
			/*return $contador_auxiliar;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
