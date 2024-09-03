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

namespace com\bydan\contabilidad\seguridad\parametro_general_sg\presentation\control;

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

use com\bydan\contabilidad\seguridad\parametro_general_sg\business\entity\parametro_general_sg;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/parametro_general_sg/util/parametro_general_sg_carga.php');
use com\bydan\contabilidad\seguridad\parametro_general_sg\util\parametro_general_sg_carga;

use com\bydan\contabilidad\seguridad\parametro_general_sg\util\parametro_general_sg_util;
use com\bydan\contabilidad\seguridad\parametro_general_sg\util\parametro_general_sg_param_return;
use com\bydan\contabilidad\seguridad\parametro_general_sg\business\logic\parametro_general_sg_logic;
use com\bydan\contabilidad\seguridad\parametro_general_sg\presentation\session\parametro_general_sg_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_general_sg_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_general_sg_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_general_sg_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_general_sg_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_general_sg_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class parametro_general_sg_init_control extends ControllerBase {	
	
	public $parametro_general_sgClase=null;	
	public $parametro_general_sgsModel=null;	
	public $parametro_general_sgsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idparametro_general_sg=0;	
	public ?int $idparametro_general_sgActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $parametro_general_sgLogic=null;
	
	public $parametro_general_sgActual=null;	
	
	public $parametro_general_sg=null;
	public $parametro_general_sgs=null;
	public $parametro_general_sgsEliminados=array();
	public $parametro_general_sgsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $parametro_general_sgsLocal=array();
	public ?array $parametro_general_sgsReporte=null;
	public ?array $parametro_general_sgsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadparametro_general_sg='onload';
	public string $strTipoPaginaAuxiliarparametro_general_sg='none';
	public string $strTipoUsuarioAuxiliarparametro_general_sg='none';
		
	public $parametro_general_sgReturnGeneral=null;
	public $parametro_general_sgParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $parametro_general_sgModel=null;
	public $parametro_general_sgControllerAdditional=null;
	
	
	 	
	
	public string $strMensajenombre_sistema='';
	public string $strMensajenombre_simple_sistema='';
	public string $strMensajenombre_empresa='';
	public string $strMensajeversion_sistema='';
	public string $strMensajesiglas_sistema='';
	public string $strMensajemail_sistema='';
	public string $strMensajetelefono_sistema='';
	public string $strMensajefax_sistema='';
	public string $strMensajerepresentante_nombre='';
	public string $strMensajecodigo_proceso_actualizacion='';
	public string $strMensajeesta_activo='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->parametro_general_sgLogic==null) {
				$this->parametro_general_sgLogic=new parametro_general_sg_logic();
			}
			
		} else {
			if($this->parametro_general_sgLogic==null) {
				$this->parametro_general_sgLogic=new parametro_general_sg_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->parametro_general_sgClase==null) {
				$this->parametro_general_sgClase=new parametro_general_sg();
			}
			
			$this->parametro_general_sgClase->setId(0);	
				
				
			$this->parametro_general_sgClase->setnombre_sistema('');	
			$this->parametro_general_sgClase->setnombre_simple_sistema('');	
			$this->parametro_general_sgClase->setnombre_empresa('');	
			$this->parametro_general_sgClase->setversion_sistema(0.0);	
			$this->parametro_general_sgClase->setsiglas_sistema('');	
			$this->parametro_general_sgClase->setmail_sistema('');	
			$this->parametro_general_sgClase->settelefono_sistema('');	
			$this->parametro_general_sgClase->setfax_sistema('');	
			$this->parametro_general_sgClase->setrepresentante_nombre('');	
			$this->parametro_general_sgClase->setcodigo_proceso_actualizacion('');	
			$this->parametro_general_sgClase->setesta_activo(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('parametro_general_sg');
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
		$this->cargarParametrosReporteBase('parametro_general_sg');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('parametro_general_sg');
	}
	
	public function actualizarControllerConReturnGeneral(parametro_general_sg_param_return $parametro_general_sgReturnGeneral) {
		if($parametro_general_sgReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesparametro_general_sgsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$parametro_general_sgReturnGeneral->getsMensajeProceso();
		}
		
		if($parametro_general_sgReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$parametro_general_sgReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($parametro_general_sgReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$parametro_general_sgReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$parametro_general_sgReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($parametro_general_sgReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($parametro_general_sgReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$parametro_general_sgReturnGeneral->getsFuncionJs();
		}
		
		if($parametro_general_sgReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(parametro_general_sg_session $parametro_general_sg_session){
		$this->strStyleDivArbol=$parametro_general_sg_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_general_sg_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_general_sg_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_general_sg_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_general_sg_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_general_sg_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$parametro_general_sg_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(parametro_general_sg_session $parametro_general_sg_session){
		$parametro_general_sg_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$parametro_general_sg_session->strStyleDivHeader='display:none';			
		$parametro_general_sg_session->strStyleDivContent='width:93%;height:100%';	
		$parametro_general_sg_session->strStyleDivOpcionesBanner='display:none';	
		$parametro_general_sg_session->strStyleDivExpandirColapsar='display:none';	
		$parametro_general_sg_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(parametro_general_sg_control $parametro_general_sg_control_session){
		$this->idNuevo=$parametro_general_sg_control_session->idNuevo;
		$this->parametro_general_sgActual=$parametro_general_sg_control_session->parametro_general_sgActual;
		$this->parametro_general_sg=$parametro_general_sg_control_session->parametro_general_sg;
		$this->parametro_general_sgClase=$parametro_general_sg_control_session->parametro_general_sgClase;
		$this->parametro_general_sgs=$parametro_general_sg_control_session->parametro_general_sgs;
		$this->parametro_general_sgsEliminados=$parametro_general_sg_control_session->parametro_general_sgsEliminados;
		$this->parametro_general_sg=$parametro_general_sg_control_session->parametro_general_sg;
		$this->parametro_general_sgsReporte=$parametro_general_sg_control_session->parametro_general_sgsReporte;
		$this->parametro_general_sgsSeleccionados=$parametro_general_sg_control_session->parametro_general_sgsSeleccionados;
		$this->arrOrderBy=$parametro_general_sg_control_session->arrOrderBy;
		$this->arrOrderByRel=$parametro_general_sg_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$parametro_general_sg_control_session->arrHistoryWebs;
		$this->arrSessionBases=$parametro_general_sg_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadparametro_general_sg=$parametro_general_sg_control_session->strTypeOnLoadparametro_general_sg;
		$this->strTipoPaginaAuxiliarparametro_general_sg=$parametro_general_sg_control_session->strTipoPaginaAuxiliarparametro_general_sg;
		$this->strTipoUsuarioAuxiliarparametro_general_sg=$parametro_general_sg_control_session->strTipoUsuarioAuxiliarparametro_general_sg;	
		
		$this->bitEsPopup=$parametro_general_sg_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$parametro_general_sg_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$parametro_general_sg_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$parametro_general_sg_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$parametro_general_sg_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$parametro_general_sg_control_session->strSufijo;
		$this->bitEsRelaciones=$parametro_general_sg_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$parametro_general_sg_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$parametro_general_sg_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$parametro_general_sg_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$parametro_general_sg_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$parametro_general_sg_control_session->strTituloTabla;
		$this->strTituloPathPagina=$parametro_general_sg_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$parametro_general_sg_control_session->strTituloPathElementoActual;
		
		if($this->parametro_general_sgLogic==null) {			
			$this->parametro_general_sgLogic=new parametro_general_sg_logic();
		}
		
		
		if($this->parametro_general_sgClase==null) {
			$this->parametro_general_sgClase=new parametro_general_sg();	
		}
		
		$this->parametro_general_sgLogic->setparametro_general_sg($this->parametro_general_sgClase);
		
		
		if($this->parametro_general_sgs==null) {
			$this->parametro_general_sgs=array();	
		}
		
		$this->parametro_general_sgLogic->setparametro_general_sgs($this->parametro_general_sgs);
		
		
		$this->strTipoView=$parametro_general_sg_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$parametro_general_sg_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$parametro_general_sg_control_session->datosCliente;
		$this->strAccionBusqueda=$parametro_general_sg_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$parametro_general_sg_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$parametro_general_sg_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$parametro_general_sg_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$parametro_general_sg_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$parametro_general_sg_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$parametro_general_sg_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$parametro_general_sg_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$parametro_general_sg_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$parametro_general_sg_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$parametro_general_sg_control_session->strTipoPaginacion;
		$this->strTipoAccion=$parametro_general_sg_control_session->strTipoAccion;
		$this->tiposReportes=$parametro_general_sg_control_session->tiposReportes;
		$this->tiposReporte=$parametro_general_sg_control_session->tiposReporte;
		$this->tiposAcciones=$parametro_general_sg_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$parametro_general_sg_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$parametro_general_sg_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$parametro_general_sg_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$parametro_general_sg_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$parametro_general_sg_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$parametro_general_sg_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$parametro_general_sg_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$parametro_general_sg_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$parametro_general_sg_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$parametro_general_sg_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$parametro_general_sg_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$parametro_general_sg_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$parametro_general_sg_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$parametro_general_sg_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$parametro_general_sg_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$parametro_general_sg_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$parametro_general_sg_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$parametro_general_sg_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$parametro_general_sg_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$parametro_general_sg_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$parametro_general_sg_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$parametro_general_sg_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$parametro_general_sg_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$parametro_general_sg_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$parametro_general_sg_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$parametro_general_sg_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$parametro_general_sg_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$parametro_general_sg_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$parametro_general_sg_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$parametro_general_sg_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$parametro_general_sg_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$parametro_general_sg_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$parametro_general_sg_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$parametro_general_sg_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$parametro_general_sg_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$parametro_general_sg_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$parametro_general_sg_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$parametro_general_sg_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$parametro_general_sg_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$parametro_general_sg_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$parametro_general_sg_control_session->resumenUsuarioActual;	
		$this->moduloActual=$parametro_general_sg_control_session->moduloActual;	
		$this->opcionActual=$parametro_general_sg_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$parametro_general_sg_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$parametro_general_sg_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$parametro_general_sg_session=unserialize($this->Session->read(parametro_general_sg_util::$STR_SESSION_NAME));
				
		if($parametro_general_sg_session==null) {
			$parametro_general_sg_session=new parametro_general_sg_session();
		}
		
		$this->strStyleDivArbol=$parametro_general_sg_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_general_sg_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_general_sg_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_general_sg_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_general_sg_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_general_sg_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$parametro_general_sg_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$parametro_general_sg_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$parametro_general_sg_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$parametro_general_sg_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$parametro_general_sg_session->strRecargarFkQuery;
		*/
		
		$this->strMensajenombre_sistema=$parametro_general_sg_control_session->strMensajenombre_sistema;
		$this->strMensajenombre_simple_sistema=$parametro_general_sg_control_session->strMensajenombre_simple_sistema;
		$this->strMensajenombre_empresa=$parametro_general_sg_control_session->strMensajenombre_empresa;
		$this->strMensajeversion_sistema=$parametro_general_sg_control_session->strMensajeversion_sistema;
		$this->strMensajesiglas_sistema=$parametro_general_sg_control_session->strMensajesiglas_sistema;
		$this->strMensajemail_sistema=$parametro_general_sg_control_session->strMensajemail_sistema;
		$this->strMensajetelefono_sistema=$parametro_general_sg_control_session->strMensajetelefono_sistema;
		$this->strMensajefax_sistema=$parametro_general_sg_control_session->strMensajefax_sistema;
		$this->strMensajerepresentante_nombre=$parametro_general_sg_control_session->strMensajerepresentante_nombre;
		$this->strMensajecodigo_proceso_actualizacion=$parametro_general_sg_control_session->strMensajecodigo_proceso_actualizacion;
		$this->strMensajeesta_activo=$parametro_general_sg_control_session->strMensajeesta_activo;
			
		
		
		
		
		
		
		

		
		
		
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
	
	public function getparametro_general_sgControllerAdditional() {
		return $this->parametro_general_sgControllerAdditional;
	}

	public function setparametro_general_sgControllerAdditional($parametro_general_sgControllerAdditional) {
		$this->parametro_general_sgControllerAdditional = $parametro_general_sgControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getparametro_general_sgActual() : parametro_general_sg {
		return $this->parametro_general_sgActual;
	}

	public function setparametro_general_sgActual(parametro_general_sg $parametro_general_sgActual) {
		$this->parametro_general_sgActual = $parametro_general_sgActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidparametro_general_sg() : int {
		return $this->idparametro_general_sg;
	}

	public function setidparametro_general_sg(int $idparametro_general_sg) {
		$this->idparametro_general_sg = $idparametro_general_sg;
	}
	
	public function getparametro_general_sg() : parametro_general_sg {
		return $this->parametro_general_sg;
	}

	public function setparametro_general_sg(parametro_general_sg $parametro_general_sg) {
		$this->parametro_general_sg = $parametro_general_sg;
	}
		
	public function getparametro_general_sgLogic() : parametro_general_sg_logic {		
		return $this->parametro_general_sgLogic;
	}

	public function setparametro_general_sgLogic(parametro_general_sg_logic $parametro_general_sgLogic) {
		$this->parametro_general_sgLogic = $parametro_general_sgLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getparametro_general_sgsModel() {		
		try {						
			/*parametro_general_sgsModel.setWrappedData(parametro_general_sgLogic->getparametro_general_sgs());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->parametro_general_sgsModel;
	}
	
	public function setparametro_general_sgsModel($parametro_general_sgsModel) {
		$this->parametro_general_sgsModel = $parametro_general_sgsModel;
	}
	
	public function getparametro_general_sgs() : array {		
		return $this->parametro_general_sgs;
	}
	
	public function setparametro_general_sgs(array $parametro_general_sgs) {
		$this->parametro_general_sgs= $parametro_general_sgs;
	}
	
	public function getparametro_general_sgsEliminados() : array {		
		return $this->parametro_general_sgsEliminados;
	}
	
	public function setparametro_general_sgsEliminados(array $parametro_general_sgsEliminados) {
		$this->parametro_general_sgsEliminados= $parametro_general_sgsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getparametro_general_sgActualFromListDataModel() {
		try {
			/*$parametro_general_sgClase= $this->parametro_general_sgsModel->getRowData();*/
			
			/*return $parametro_general_sg;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
