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

namespace com\bydan\contabilidad\contabilidad\documento_contable\presentation\control;

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

use com\bydan\contabilidad\contabilidad\documento_contable\business\entity\documento_contable;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/documento_contable/util/documento_contable_carga.php');
use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_carga;

use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_util;
use com\bydan\contabilidad\contabilidad\documento_contable\util\documento_contable_param_return;
use com\bydan\contabilidad\contabilidad\documento_contable\business\logic\documento_contable_logic;
use com\bydan\contabilidad\contabilidad\documento_contable\presentation\session\documento_contable_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\contabilidad\asiento\util\asiento_carga;
use com\bydan\contabilidad\contabilidad\asiento\util\asiento_util;
use com\bydan\contabilidad\contabilidad\asiento\presentation\session\asiento_session;

use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_carga;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\util\asiento_predefinido_util;
use com\bydan\contabilidad\contabilidad\asiento_predefinido\presentation\session\asiento_predefinido_session;


/*CARGA ARCHIVOS FRAMEWORK*/
documento_contable_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
documento_contable_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
documento_contable_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
documento_contable_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*documento_contable_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class documento_contable_init_control extends ControllerBase {	
	
	public $documento_contableClase=null;	
	public $documento_contablesModel=null;	
	public $documento_contablesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $iddocumento_contable=0;	
	public ?int $iddocumento_contableActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $documento_contableLogic=null;
	
	public $documento_contableActual=null;	
	
	public $documento_contable=null;
	public $documento_contables=null;
	public $documento_contablesEliminados=array();
	public $documento_contablesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $documento_contablesLocal=array();
	public ?array $documento_contablesReporte=null;
	public ?array $documento_contablesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoaddocumento_contable='onload';
	public string $strTipoPaginaAuxiliardocumento_contable='none';
	public string $strTipoUsuarioAuxiliardocumento_contable='none';
		
	public $documento_contableReturnGeneral=null;
	public $documento_contableParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $documento_contableModel=null;
	public $documento_contableControllerAdditional=null;
	
	
	

	public $asientoLogic=null;

	public function  getasientoLogic() {
		return $this->asientoLogic;
	}

	public function setasientoLogic($asientoLogic) {
		$this->asientoLogic =$asientoLogic;
	}


	public $asientopredefinidoLogic=null;

	public function  getasiento_predefinidoLogic() {
		return $this->asientopredefinidoLogic;
	}

	public function setasiento_predefinidoLogic($asientopredefinidoLogic) {
		$this->asientopredefinidoLogic =$asientopredefinidoLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajecodigo='';
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

	
	
	
	
	
	
	public $strTienePermisosasiento='none';
	public $strTienePermisosasiento_predefinido='none';
	
	
	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->documento_contableLogic==null) {
				$this->documento_contableLogic=new documento_contable_logic();
			}
			
		} else {
			if($this->documento_contableLogic==null) {
				$this->documento_contableLogic=new documento_contable_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->documento_contableClase==null) {
				$this->documento_contableClase=new documento_contable();
			}
			
			$this->documento_contableClase->setId(0);	
				
				
			$this->documento_contableClase->setid_empresa(-1);	
			$this->documento_contableClase->setcodigo('');	
			$this->documento_contableClase->setnombre('');	
			$this->documento_contableClase->setsecuencial(0.0);	
			$this->documento_contableClase->setincremento(0.0);	
			$this->documento_contableClase->setreinicia_secuencial_mes(false);	
			$this->documento_contableClase->setgenerado_por(0);	
			
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
		$this->prepararEjecutarMantenimientoBase('documento_contable');
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
		$this->cargarParametrosReporteBase('documento_contable');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('documento_contable');
	}
	
	public function actualizarControllerConReturnGeneral(documento_contable_param_return $documento_contableReturnGeneral) {
		if($documento_contableReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesdocumento_contablesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$documento_contableReturnGeneral->getsMensajeProceso();
		}
		
		if($documento_contableReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$documento_contableReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($documento_contableReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$documento_contableReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$documento_contableReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($documento_contableReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($documento_contableReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$documento_contableReturnGeneral->getsFuncionJs();
		}
		
		if($documento_contableReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(documento_contable_session $documento_contable_session){
		$this->strStyleDivArbol=$documento_contable_session->strStyleDivArbol;	
		$this->strStyleDivContent=$documento_contable_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$documento_contable_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$documento_contable_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$documento_contable_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$documento_contable_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$documento_contable_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(documento_contable_session $documento_contable_session){
		$documento_contable_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$documento_contable_session->strStyleDivHeader='display:none';			
		$documento_contable_session->strStyleDivContent='width:93%;height:100%';	
		$documento_contable_session->strStyleDivOpcionesBanner='display:none';	
		$documento_contable_session->strStyleDivExpandirColapsar='display:none';	
		$documento_contable_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(documento_contable_control $documento_contable_control_session){
		$this->idNuevo=$documento_contable_control_session->idNuevo;
		$this->documento_contableActual=$documento_contable_control_session->documento_contableActual;
		$this->documento_contable=$documento_contable_control_session->documento_contable;
		$this->documento_contableClase=$documento_contable_control_session->documento_contableClase;
		$this->documento_contables=$documento_contable_control_session->documento_contables;
		$this->documento_contablesEliminados=$documento_contable_control_session->documento_contablesEliminados;
		$this->documento_contable=$documento_contable_control_session->documento_contable;
		$this->documento_contablesReporte=$documento_contable_control_session->documento_contablesReporte;
		$this->documento_contablesSeleccionados=$documento_contable_control_session->documento_contablesSeleccionados;
		$this->arrOrderBy=$documento_contable_control_session->arrOrderBy;
		$this->arrOrderByRel=$documento_contable_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$documento_contable_control_session->arrHistoryWebs;
		$this->arrSessionBases=$documento_contable_control_session->arrSessionBases;		
		
		$this->strTypeOnLoaddocumento_contable=$documento_contable_control_session->strTypeOnLoaddocumento_contable;
		$this->strTipoPaginaAuxiliardocumento_contable=$documento_contable_control_session->strTipoPaginaAuxiliardocumento_contable;
		$this->strTipoUsuarioAuxiliardocumento_contable=$documento_contable_control_session->strTipoUsuarioAuxiliardocumento_contable;	
		
		$this->bitEsPopup=$documento_contable_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$documento_contable_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$documento_contable_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$documento_contable_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$documento_contable_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$documento_contable_control_session->strSufijo;
		$this->bitEsRelaciones=$documento_contable_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$documento_contable_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$documento_contable_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$documento_contable_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$documento_contable_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$documento_contable_control_session->strTituloTabla;
		$this->strTituloPathPagina=$documento_contable_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$documento_contable_control_session->strTituloPathElementoActual;
		
		if($this->documento_contableLogic==null) {			
			$this->documento_contableLogic=new documento_contable_logic();
		}
		
		
		if($this->documento_contableClase==null) {
			$this->documento_contableClase=new documento_contable();	
		}
		
		$this->documento_contableLogic->setdocumento_contable($this->documento_contableClase);
		
		
		if($this->documento_contables==null) {
			$this->documento_contables=array();	
		}
		
		$this->documento_contableLogic->setdocumento_contables($this->documento_contables);
		
		
		$this->strTipoView=$documento_contable_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$documento_contable_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$documento_contable_control_session->datosCliente;
		$this->strAccionBusqueda=$documento_contable_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$documento_contable_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$documento_contable_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$documento_contable_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$documento_contable_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$documento_contable_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$documento_contable_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$documento_contable_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$documento_contable_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$documento_contable_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$documento_contable_control_session->strTipoPaginacion;
		$this->strTipoAccion=$documento_contable_control_session->strTipoAccion;
		$this->tiposReportes=$documento_contable_control_session->tiposReportes;
		$this->tiposReporte=$documento_contable_control_session->tiposReporte;
		$this->tiposAcciones=$documento_contable_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$documento_contable_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$documento_contable_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$documento_contable_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$documento_contable_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$documento_contable_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$documento_contable_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$documento_contable_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$documento_contable_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$documento_contable_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$documento_contable_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$documento_contable_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$documento_contable_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$documento_contable_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$documento_contable_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$documento_contable_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$documento_contable_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$documento_contable_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$documento_contable_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$documento_contable_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$documento_contable_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$documento_contable_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$documento_contable_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$documento_contable_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$documento_contable_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$documento_contable_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$documento_contable_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$documento_contable_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$documento_contable_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$documento_contable_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$documento_contable_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$documento_contable_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$documento_contable_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$documento_contable_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$documento_contable_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$documento_contable_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$documento_contable_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$documento_contable_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$documento_contable_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$documento_contable_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$documento_contable_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$documento_contable_control_session->resumenUsuarioActual;	
		$this->moduloActual=$documento_contable_control_session->moduloActual;	
		$this->opcionActual=$documento_contable_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$documento_contable_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$documento_contable_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$documento_contable_session=unserialize($this->Session->read(documento_contable_util::$STR_SESSION_NAME));
				
		if($documento_contable_session==null) {
			$documento_contable_session=new documento_contable_session();
		}
		
		$this->strStyleDivArbol=$documento_contable_session->strStyleDivArbol;	
		$this->strStyleDivContent=$documento_contable_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$documento_contable_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$documento_contable_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$documento_contable_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$documento_contable_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$documento_contable_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$documento_contable_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$documento_contable_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$documento_contable_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$documento_contable_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$documento_contable_control_session->strMensajeid_empresa;
		$this->strMensajecodigo=$documento_contable_control_session->strMensajecodigo;
		$this->strMensajenombre=$documento_contable_control_session->strMensajenombre;
		$this->strMensajesecuencial=$documento_contable_control_session->strMensajesecuencial;
		$this->strMensajeincremento=$documento_contable_control_session->strMensajeincremento;
		$this->strMensajereinicia_secuencial_mes=$documento_contable_control_session->strMensajereinicia_secuencial_mes;
		$this->strMensajegenerado_por=$documento_contable_control_session->strMensajegenerado_por;
			
		
		$this->empresasFK=$documento_contable_control_session->empresasFK;
		$this->idempresaDefaultFK=$documento_contable_control_session->idempresaDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$documento_contable_control_session->strVisibleFK_Idempresa;
		
		
		$this->strTienePermisosasiento=$documento_contable_control_session->strTienePermisosasiento;
		$this->strTienePermisosasiento_predefinido=$documento_contable_control_session->strTienePermisosasiento_predefinido;
		
		
		$this->id_empresaFK_Idempresa=$documento_contable_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getdocumento_contableControllerAdditional() {
		return $this->documento_contableControllerAdditional;
	}

	public function setdocumento_contableControllerAdditional($documento_contableControllerAdditional) {
		$this->documento_contableControllerAdditional = $documento_contableControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getdocumento_contableActual() : documento_contable {
		return $this->documento_contableActual;
	}

	public function setdocumento_contableActual(documento_contable $documento_contableActual) {
		$this->documento_contableActual = $documento_contableActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getiddocumento_contable() : int {
		return $this->iddocumento_contable;
	}

	public function setiddocumento_contable(int $iddocumento_contable) {
		$this->iddocumento_contable = $iddocumento_contable;
	}
	
	public function getdocumento_contable() : documento_contable {
		return $this->documento_contable;
	}

	public function setdocumento_contable(documento_contable $documento_contable) {
		$this->documento_contable = $documento_contable;
	}
		
	public function getdocumento_contableLogic() : documento_contable_logic {		
		return $this->documento_contableLogic;
	}

	public function setdocumento_contableLogic(documento_contable_logic $documento_contableLogic) {
		$this->documento_contableLogic = $documento_contableLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getdocumento_contablesModel() {		
		try {						
			/*documento_contablesModel.setWrappedData(documento_contableLogic->getdocumento_contables());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->documento_contablesModel;
	}
	
	public function setdocumento_contablesModel($documento_contablesModel) {
		$this->documento_contablesModel = $documento_contablesModel;
	}
	
	public function getdocumento_contables() : array {		
		return $this->documento_contables;
	}
	
	public function setdocumento_contables(array $documento_contables) {
		$this->documento_contables= $documento_contables;
	}
	
	public function getdocumento_contablesEliminados() : array {		
		return $this->documento_contablesEliminados;
	}
	
	public function setdocumento_contablesEliminados(array $documento_contablesEliminados) {
		$this->documento_contablesEliminados= $documento_contablesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getdocumento_contableActualFromListDataModel() {
		try {
			/*$documento_contableClase= $this->documento_contablesModel->getRowData();*/
			
			/*return $documento_contable;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
