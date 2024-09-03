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

namespace com\bydan\contabilidad\contabilidad\libro_auxiliar\presentation\control;

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

use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\entity\libro_auxiliar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/libro_auxiliar/util/libro_auxiliar_carga.php');
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_carga;

use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_util;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\util\libro_auxiliar_param_return;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\business\logic\libro_auxiliar_logic;
use com\bydan\contabilidad\contabilidad\libro_auxiliar\presentation\session\libro_auxiliar_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_carga;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\util\contador_auxiliar_util;
use com\bydan\contabilidad\contabilidad\contador_auxiliar\presentation\session\contador_auxiliar_session;

use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\session\asiento_predefinido_session;

use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_carga;
use com\bydan\contabilidad\contabilidad\asiento_automatico\util\asiento_automatico_util;
use com\bydan\contabilidad\contabilidad\asiento_automatico\presentation\session\asiento_automatico_session;

use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;
use com\bydan\contabilidad\contabilidad\asiento\presentation\session\asiento_session;


/*CARGA ARCHIVOS FRAMEWORK*/
libro_auxiliar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
libro_auxiliar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
libro_auxiliar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*libro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class libro_auxiliar_init_control extends ControllerBase {	
	
	public $libro_auxiliarClase=null;	
	public $libro_auxiliarsModel=null;	
	public $libro_auxiliarsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idlibro_auxiliar=0;	
	public ?int $idlibro_auxiliarActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $libro_auxiliarLogic=null;
	
	public $libro_auxiliarActual=null;	
	
	public $libro_auxiliar=null;
	public $libro_auxiliars=null;
	public $libro_auxiliarsEliminados=array();
	public $libro_auxiliarsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $libro_auxiliarsLocal=array();
	public ?array $libro_auxiliarsReporte=null;
	public ?array $libro_auxiliarsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadlibro_auxiliar='onload';
	public string $strTipoPaginaAuxiliarlibro_auxiliar='none';
	public string $strTipoUsuarioAuxiliarlibro_auxiliar='none';
		
	public $libro_auxiliarReturnGeneral=null;
	public $libro_auxiliarParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $libro_auxiliarModel=null;
	public $libro_auxiliarControllerAdditional=null;
	
	
	

	public $contadorauxiliarLogic=null;

	public function  getcontador_auxiliarLogic() {
		return $this->contadorauxiliarLogic;
	}

	public function setcontador_auxiliarLogic($contadorauxiliarLogic) {
		$this->contadorauxiliarLogic =$contadorauxiliarLogic;
	}


	public $asientopredefinidoLogic=null;

	public function  getasiento_predefinidoLogic() {
		return $this->asientopredefinidoLogic;
	}

	public function setasiento_predefinidoLogic($asientopredefinidoLogic) {
		$this->asientopredefinidoLogic =$asientopredefinidoLogic;
	}


	public $asientoautomaticoLogic=null;

	public function  getasiento_automaticoLogic() {
		return $this->asientoautomaticoLogic;
	}

	public function setasiento_automaticoLogic($asientoautomaticoLogic) {
		$this->asientoautomaticoLogic =$asientoautomaticoLogic;
	}


	public $asientoLogic=null;

	public function  getasientoLogic() {
		return $this->asientoLogic;
	}

	public function setasientoLogic($asientoLogic) {
		$this->asientoLogic =$asientoLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeiniciales='';
	public string $strMensajenombre='';
	public string $strMensajesecuencial='';
	public string $strMensajeincremento='';
	public string $strMensajereinicia_secuencial_mes='';
	public string $strMensajegenerado_por='';
	
	
	public string $strVisibleFK_Idempresa='display:table-row';

	
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

	
	
	
	
	
	
	public $strTienePermisoscontador_auxiliar='none';
	public $strTienePermisosasiento_predefinido='none';
	public $strTienePermisosasiento_automatico='none';
	public $strTienePermisosasiento='none';
	
	
	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->libro_auxiliarLogic==null) {
				$this->libro_auxiliarLogic=new libro_auxiliar_logic();
			}
			
		} else {
			if($this->libro_auxiliarLogic==null) {
				$this->libro_auxiliarLogic=new libro_auxiliar_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->libro_auxiliarClase==null) {
				$this->libro_auxiliarClase=new libro_auxiliar();
			}
			
			$this->libro_auxiliarClase->setId(0);	
				
				
			$this->libro_auxiliarClase->setid_empresa(-1);	
			$this->libro_auxiliarClase->setiniciales('');	
			$this->libro_auxiliarClase->setnombre('');	
			$this->libro_auxiliarClase->setsecuencial(0);	
			$this->libro_auxiliarClase->setincremento(0);	
			$this->libro_auxiliarClase->setreinicia_secuencial_mes(false);	
			$this->libro_auxiliarClase->setgenerado_por(0);	
			
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
		$this->prepararEjecutarMantenimientoBase('libro_auxiliar');
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
		$this->cargarParametrosReporteBase('libro_auxiliar');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('libro_auxiliar');
	}
	
	public function actualizarControllerConReturnGeneral(libro_auxiliar_param_return $libro_auxiliarReturnGeneral) {
		if($libro_auxiliarReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajeslibro_auxiliarsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$libro_auxiliarReturnGeneral->getsMensajeProceso();
		}
		
		if($libro_auxiliarReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$libro_auxiliarReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($libro_auxiliarReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$libro_auxiliarReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$libro_auxiliarReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($libro_auxiliarReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($libro_auxiliarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$libro_auxiliarReturnGeneral->getsFuncionJs();
		}
		
		if($libro_auxiliarReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(libro_auxiliar_session $libro_auxiliar_session){
		$this->strStyleDivArbol=$libro_auxiliar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$libro_auxiliar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$libro_auxiliar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$libro_auxiliar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$libro_auxiliar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$libro_auxiliar_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$libro_auxiliar_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(libro_auxiliar_session $libro_auxiliar_session){
		$libro_auxiliar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$libro_auxiliar_session->strStyleDivHeader='display:none';			
		$libro_auxiliar_session->strStyleDivContent='width:93%;height:100%';	
		$libro_auxiliar_session->strStyleDivOpcionesBanner='display:none';	
		$libro_auxiliar_session->strStyleDivExpandirColapsar='display:none';	
		$libro_auxiliar_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(libro_auxiliar_control $libro_auxiliar_control_session){
		$this->idNuevo=$libro_auxiliar_control_session->idNuevo;
		$this->libro_auxiliarActual=$libro_auxiliar_control_session->libro_auxiliarActual;
		$this->libro_auxiliar=$libro_auxiliar_control_session->libro_auxiliar;
		$this->libro_auxiliarClase=$libro_auxiliar_control_session->libro_auxiliarClase;
		$this->libro_auxiliars=$libro_auxiliar_control_session->libro_auxiliars;
		$this->libro_auxiliarsEliminados=$libro_auxiliar_control_session->libro_auxiliarsEliminados;
		$this->libro_auxiliar=$libro_auxiliar_control_session->libro_auxiliar;
		$this->libro_auxiliarsReporte=$libro_auxiliar_control_session->libro_auxiliarsReporte;
		$this->libro_auxiliarsSeleccionados=$libro_auxiliar_control_session->libro_auxiliarsSeleccionados;
		$this->arrOrderBy=$libro_auxiliar_control_session->arrOrderBy;
		$this->arrOrderByRel=$libro_auxiliar_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$libro_auxiliar_control_session->arrHistoryWebs;
		$this->arrSessionBases=$libro_auxiliar_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadlibro_auxiliar=$libro_auxiliar_control_session->strTypeOnLoadlibro_auxiliar;
		$this->strTipoPaginaAuxiliarlibro_auxiliar=$libro_auxiliar_control_session->strTipoPaginaAuxiliarlibro_auxiliar;
		$this->strTipoUsuarioAuxiliarlibro_auxiliar=$libro_auxiliar_control_session->strTipoUsuarioAuxiliarlibro_auxiliar;	
		
		$this->bitEsPopup=$libro_auxiliar_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$libro_auxiliar_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$libro_auxiliar_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$libro_auxiliar_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$libro_auxiliar_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$libro_auxiliar_control_session->strSufijo;
		$this->bitEsRelaciones=$libro_auxiliar_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$libro_auxiliar_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$libro_auxiliar_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$libro_auxiliar_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$libro_auxiliar_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$libro_auxiliar_control_session->strTituloTabla;
		$this->strTituloPathPagina=$libro_auxiliar_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$libro_auxiliar_control_session->strTituloPathElementoActual;
		
		if($this->libro_auxiliarLogic==null) {			
			$this->libro_auxiliarLogic=new libro_auxiliar_logic();
		}
		
		
		if($this->libro_auxiliarClase==null) {
			$this->libro_auxiliarClase=new libro_auxiliar();	
		}
		
		$this->libro_auxiliarLogic->setlibro_auxiliar($this->libro_auxiliarClase);
		
		
		if($this->libro_auxiliars==null) {
			$this->libro_auxiliars=array();	
		}
		
		$this->libro_auxiliarLogic->setlibro_auxiliars($this->libro_auxiliars);
		
		
		$this->strTipoView=$libro_auxiliar_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$libro_auxiliar_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$libro_auxiliar_control_session->datosCliente;
		$this->strAccionBusqueda=$libro_auxiliar_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$libro_auxiliar_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$libro_auxiliar_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$libro_auxiliar_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$libro_auxiliar_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$libro_auxiliar_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$libro_auxiliar_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$libro_auxiliar_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$libro_auxiliar_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$libro_auxiliar_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$libro_auxiliar_control_session->strTipoPaginacion;
		$this->strTipoAccion=$libro_auxiliar_control_session->strTipoAccion;
		$this->tiposReportes=$libro_auxiliar_control_session->tiposReportes;
		$this->tiposReporte=$libro_auxiliar_control_session->tiposReporte;
		$this->tiposAcciones=$libro_auxiliar_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$libro_auxiliar_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$libro_auxiliar_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$libro_auxiliar_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$libro_auxiliar_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$libro_auxiliar_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$libro_auxiliar_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$libro_auxiliar_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$libro_auxiliar_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$libro_auxiliar_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$libro_auxiliar_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$libro_auxiliar_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$libro_auxiliar_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$libro_auxiliar_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$libro_auxiliar_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$libro_auxiliar_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$libro_auxiliar_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$libro_auxiliar_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$libro_auxiliar_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$libro_auxiliar_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$libro_auxiliar_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$libro_auxiliar_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$libro_auxiliar_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$libro_auxiliar_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$libro_auxiliar_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$libro_auxiliar_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$libro_auxiliar_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$libro_auxiliar_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$libro_auxiliar_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$libro_auxiliar_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$libro_auxiliar_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$libro_auxiliar_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$libro_auxiliar_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$libro_auxiliar_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$libro_auxiliar_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$libro_auxiliar_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$libro_auxiliar_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$libro_auxiliar_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$libro_auxiliar_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$libro_auxiliar_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$libro_auxiliar_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$libro_auxiliar_control_session->resumenUsuarioActual;	
		$this->moduloActual=$libro_auxiliar_control_session->moduloActual;	
		$this->opcionActual=$libro_auxiliar_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$libro_auxiliar_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$libro_auxiliar_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$libro_auxiliar_session=unserialize($this->Session->read(libro_auxiliar_util::$STR_SESSION_NAME));
				
		if($libro_auxiliar_session==null) {
			$libro_auxiliar_session=new libro_auxiliar_session();
		}
		
		$this->strStyleDivArbol=$libro_auxiliar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$libro_auxiliar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$libro_auxiliar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$libro_auxiliar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$libro_auxiliar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$libro_auxiliar_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$libro_auxiliar_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$libro_auxiliar_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$libro_auxiliar_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$libro_auxiliar_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$libro_auxiliar_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$libro_auxiliar_control_session->strMensajeid_empresa;
		$this->strMensajeiniciales=$libro_auxiliar_control_session->strMensajeiniciales;
		$this->strMensajenombre=$libro_auxiliar_control_session->strMensajenombre;
		$this->strMensajesecuencial=$libro_auxiliar_control_session->strMensajesecuencial;
		$this->strMensajeincremento=$libro_auxiliar_control_session->strMensajeincremento;
		$this->strMensajereinicia_secuencial_mes=$libro_auxiliar_control_session->strMensajereinicia_secuencial_mes;
		$this->strMensajegenerado_por=$libro_auxiliar_control_session->strMensajegenerado_por;
			
		
		$this->empresasFK=$libro_auxiliar_control_session->empresasFK;
		$this->idempresaDefaultFK=$libro_auxiliar_control_session->idempresaDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$libro_auxiliar_control_session->strVisibleFK_Idempresa;
		
		
		$this->strTienePermisoscontador_auxiliar=$libro_auxiliar_control_session->strTienePermisoscontador_auxiliar;
		$this->strTienePermisosasiento_predefinido=$libro_auxiliar_control_session->strTienePermisosasiento_predefinido;
		$this->strTienePermisosasiento_automatico=$libro_auxiliar_control_session->strTienePermisosasiento_automatico;
		$this->strTienePermisosasiento=$libro_auxiliar_control_session->strTienePermisosasiento;
		
		
		$this->id_empresaFK_Idempresa=$libro_auxiliar_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getlibro_auxiliarControllerAdditional() {
		return $this->libro_auxiliarControllerAdditional;
	}

	public function setlibro_auxiliarControllerAdditional($libro_auxiliarControllerAdditional) {
		$this->libro_auxiliarControllerAdditional = $libro_auxiliarControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getlibro_auxiliarActual() : libro_auxiliar {
		return $this->libro_auxiliarActual;
	}

	public function setlibro_auxiliarActual(libro_auxiliar $libro_auxiliarActual) {
		$this->libro_auxiliarActual = $libro_auxiliarActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidlibro_auxiliar() : int {
		return $this->idlibro_auxiliar;
	}

	public function setidlibro_auxiliar(int $idlibro_auxiliar) {
		$this->idlibro_auxiliar = $idlibro_auxiliar;
	}
	
	public function getlibro_auxiliar() : libro_auxiliar {
		return $this->libro_auxiliar;
	}

	public function setlibro_auxiliar(libro_auxiliar $libro_auxiliar) {
		$this->libro_auxiliar = $libro_auxiliar;
	}
		
	public function getlibro_auxiliarLogic() : libro_auxiliar_logic {		
		return $this->libro_auxiliarLogic;
	}

	public function setlibro_auxiliarLogic(libro_auxiliar_logic $libro_auxiliarLogic) {
		$this->libro_auxiliarLogic = $libro_auxiliarLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getlibro_auxiliarsModel() {		
		try {						
			/*libro_auxiliarsModel.setWrappedData(libro_auxiliarLogic->getlibro_auxiliars());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->libro_auxiliarsModel;
	}
	
	public function setlibro_auxiliarsModel($libro_auxiliarsModel) {
		$this->libro_auxiliarsModel = $libro_auxiliarsModel;
	}
	
	public function getlibro_auxiliars() : array {		
		return $this->libro_auxiliars;
	}
	
	public function setlibro_auxiliars(array $libro_auxiliars) {
		$this->libro_auxiliars= $libro_auxiliars;
	}
	
	public function getlibro_auxiliarsEliminados() : array {		
		return $this->libro_auxiliarsEliminados;
	}
	
	public function setlibro_auxiliarsEliminados(array $libro_auxiliarsEliminados) {
		$this->libro_auxiliarsEliminados= $libro_auxiliarsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getlibro_auxiliarActualFromListDataModel() {
		try {
			/*$libro_auxiliarClase= $this->libro_auxiliarsModel->getRowData();*/
			
			/*return $libro_auxiliar;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
