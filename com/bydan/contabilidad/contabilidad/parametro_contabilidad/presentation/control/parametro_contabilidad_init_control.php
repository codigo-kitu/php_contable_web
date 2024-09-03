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

namespace com\bydan\contabilidad\contabilidad\parametro_contabilidad\presentation\control;

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

use com\bydan\contabilidad\contabilidad\parametro_contabilidad\business\entity\parametro_contabilidad;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/parametro_contabilidad/util/parametro_contabilidad_carga.php');
use com\bydan\contabilidad\contabilidad\parametro_contabilidad\util\parametro_contabilidad_carga;

use com\bydan\contabilidad\contabilidad\parametro_contabilidad\util\parametro_contabilidad_util;
use com\bydan\contabilidad\contabilidad\parametro_contabilidad\util\parametro_contabilidad_param_return;
use com\bydan\contabilidad\contabilidad\parametro_contabilidad\business\logic\parametro_contabilidad_logic;
use com\bydan\contabilidad\contabilidad\parametro_contabilidad\presentation\session\parametro_contabilidad_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_contabilidad_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_contabilidad_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_contabilidad_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_contabilidad_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_contabilidad_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class parametro_contabilidad_init_control extends ControllerBase {	
	
	public $parametro_contabilidadClase=null;	
	public $parametro_contabilidadsModel=null;	
	public $parametro_contabilidadsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idparametro_contabilidad=0;	
	public ?int $idparametro_contabilidadActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $parametro_contabilidadLogic=null;
	
	public $parametro_contabilidadActual=null;	
	
	public $parametro_contabilidad=null;
	public $parametro_contabilidads=null;
	public $parametro_contabilidadsEliminados=array();
	public $parametro_contabilidadsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $parametro_contabilidadsLocal=array();
	public ?array $parametro_contabilidadsReporte=null;
	public ?array $parametro_contabilidadsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadparametro_contabilidad='onload';
	public string $strTipoPaginaAuxiliarparametro_contabilidad='none';
	public string $strTipoUsuarioAuxiliarparametro_contabilidad='none';
		
	public $parametro_contabilidadReturnGeneral=null;
	public $parametro_contabilidadParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $parametro_contabilidadModel=null;
	public $parametro_contabilidadControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajenumero_asiento='';
	public string $strMensajecon_asiento_simple_facturacion='';
	public string $strMensajecon_eliminacion_fisica_asiento='';
	
	
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

	
	
	
	
	
	
	
	
	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->parametro_contabilidadLogic==null) {
				$this->parametro_contabilidadLogic=new parametro_contabilidad_logic();
			}
			
		} else {
			if($this->parametro_contabilidadLogic==null) {
				$this->parametro_contabilidadLogic=new parametro_contabilidad_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->parametro_contabilidadClase==null) {
				$this->parametro_contabilidadClase=new parametro_contabilidad();
			}
			
			$this->parametro_contabilidadClase->setId(0);	
				
				
			$this->parametro_contabilidadClase->setid_empresa(-1);	
			$this->parametro_contabilidadClase->setnumero_asiento(0);	
			$this->parametro_contabilidadClase->setcon_asiento_simple_facturacion(false);	
			$this->parametro_contabilidadClase->setcon_eliminacion_fisica_asiento(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('parametro_contabilidad');
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
		$this->cargarParametrosReporteBase('parametro_contabilidad');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('parametro_contabilidad');
	}
	
	public function actualizarControllerConReturnGeneral(parametro_contabilidad_param_return $parametro_contabilidadReturnGeneral) {
		if($parametro_contabilidadReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesparametro_contabilidadsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$parametro_contabilidadReturnGeneral->getsMensajeProceso();
		}
		
		if($parametro_contabilidadReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$parametro_contabilidadReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($parametro_contabilidadReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$parametro_contabilidadReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$parametro_contabilidadReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($parametro_contabilidadReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($parametro_contabilidadReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$parametro_contabilidadReturnGeneral->getsFuncionJs();
		}
		
		if($parametro_contabilidadReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(parametro_contabilidad_session $parametro_contabilidad_session){
		$this->strStyleDivArbol=$parametro_contabilidad_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_contabilidad_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_contabilidad_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_contabilidad_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_contabilidad_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_contabilidad_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$parametro_contabilidad_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(parametro_contabilidad_session $parametro_contabilidad_session){
		$parametro_contabilidad_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$parametro_contabilidad_session->strStyleDivHeader='display:none';			
		$parametro_contabilidad_session->strStyleDivContent='width:93%;height:100%';	
		$parametro_contabilidad_session->strStyleDivOpcionesBanner='display:none';	
		$parametro_contabilidad_session->strStyleDivExpandirColapsar='display:none';	
		$parametro_contabilidad_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(parametro_contabilidad_control $parametro_contabilidad_control_session){
		$this->idNuevo=$parametro_contabilidad_control_session->idNuevo;
		$this->parametro_contabilidadActual=$parametro_contabilidad_control_session->parametro_contabilidadActual;
		$this->parametro_contabilidad=$parametro_contabilidad_control_session->parametro_contabilidad;
		$this->parametro_contabilidadClase=$parametro_contabilidad_control_session->parametro_contabilidadClase;
		$this->parametro_contabilidads=$parametro_contabilidad_control_session->parametro_contabilidads;
		$this->parametro_contabilidadsEliminados=$parametro_contabilidad_control_session->parametro_contabilidadsEliminados;
		$this->parametro_contabilidad=$parametro_contabilidad_control_session->parametro_contabilidad;
		$this->parametro_contabilidadsReporte=$parametro_contabilidad_control_session->parametro_contabilidadsReporte;
		$this->parametro_contabilidadsSeleccionados=$parametro_contabilidad_control_session->parametro_contabilidadsSeleccionados;
		$this->arrOrderBy=$parametro_contabilidad_control_session->arrOrderBy;
		$this->arrOrderByRel=$parametro_contabilidad_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$parametro_contabilidad_control_session->arrHistoryWebs;
		$this->arrSessionBases=$parametro_contabilidad_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadparametro_contabilidad=$parametro_contabilidad_control_session->strTypeOnLoadparametro_contabilidad;
		$this->strTipoPaginaAuxiliarparametro_contabilidad=$parametro_contabilidad_control_session->strTipoPaginaAuxiliarparametro_contabilidad;
		$this->strTipoUsuarioAuxiliarparametro_contabilidad=$parametro_contabilidad_control_session->strTipoUsuarioAuxiliarparametro_contabilidad;	
		
		$this->bitEsPopup=$parametro_contabilidad_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$parametro_contabilidad_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$parametro_contabilidad_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$parametro_contabilidad_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$parametro_contabilidad_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$parametro_contabilidad_control_session->strSufijo;
		$this->bitEsRelaciones=$parametro_contabilidad_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$parametro_contabilidad_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$parametro_contabilidad_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$parametro_contabilidad_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$parametro_contabilidad_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$parametro_contabilidad_control_session->strTituloTabla;
		$this->strTituloPathPagina=$parametro_contabilidad_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$parametro_contabilidad_control_session->strTituloPathElementoActual;
		
		if($this->parametro_contabilidadLogic==null) {			
			$this->parametro_contabilidadLogic=new parametro_contabilidad_logic();
		}
		
		
		if($this->parametro_contabilidadClase==null) {
			$this->parametro_contabilidadClase=new parametro_contabilidad();	
		}
		
		$this->parametro_contabilidadLogic->setparametro_contabilidad($this->parametro_contabilidadClase);
		
		
		if($this->parametro_contabilidads==null) {
			$this->parametro_contabilidads=array();	
		}
		
		$this->parametro_contabilidadLogic->setparametro_contabilidads($this->parametro_contabilidads);
		
		
		$this->strTipoView=$parametro_contabilidad_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$parametro_contabilidad_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$parametro_contabilidad_control_session->datosCliente;
		$this->strAccionBusqueda=$parametro_contabilidad_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$parametro_contabilidad_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$parametro_contabilidad_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$parametro_contabilidad_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$parametro_contabilidad_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$parametro_contabilidad_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$parametro_contabilidad_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$parametro_contabilidad_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$parametro_contabilidad_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$parametro_contabilidad_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$parametro_contabilidad_control_session->strTipoPaginacion;
		$this->strTipoAccion=$parametro_contabilidad_control_session->strTipoAccion;
		$this->tiposReportes=$parametro_contabilidad_control_session->tiposReportes;
		$this->tiposReporte=$parametro_contabilidad_control_session->tiposReporte;
		$this->tiposAcciones=$parametro_contabilidad_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$parametro_contabilidad_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$parametro_contabilidad_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$parametro_contabilidad_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$parametro_contabilidad_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$parametro_contabilidad_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$parametro_contabilidad_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$parametro_contabilidad_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$parametro_contabilidad_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$parametro_contabilidad_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$parametro_contabilidad_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$parametro_contabilidad_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$parametro_contabilidad_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$parametro_contabilidad_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$parametro_contabilidad_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$parametro_contabilidad_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$parametro_contabilidad_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$parametro_contabilidad_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$parametro_contabilidad_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$parametro_contabilidad_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$parametro_contabilidad_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$parametro_contabilidad_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$parametro_contabilidad_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$parametro_contabilidad_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$parametro_contabilidad_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$parametro_contabilidad_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$parametro_contabilidad_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$parametro_contabilidad_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$parametro_contabilidad_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$parametro_contabilidad_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$parametro_contabilidad_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$parametro_contabilidad_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$parametro_contabilidad_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$parametro_contabilidad_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$parametro_contabilidad_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$parametro_contabilidad_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$parametro_contabilidad_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$parametro_contabilidad_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$parametro_contabilidad_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$parametro_contabilidad_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$parametro_contabilidad_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$parametro_contabilidad_control_session->resumenUsuarioActual;	
		$this->moduloActual=$parametro_contabilidad_control_session->moduloActual;	
		$this->opcionActual=$parametro_contabilidad_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$parametro_contabilidad_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$parametro_contabilidad_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$parametro_contabilidad_session=unserialize($this->Session->read(parametro_contabilidad_util::$STR_SESSION_NAME));
				
		if($parametro_contabilidad_session==null) {
			$parametro_contabilidad_session=new parametro_contabilidad_session();
		}
		
		$this->strStyleDivArbol=$parametro_contabilidad_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_contabilidad_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_contabilidad_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_contabilidad_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_contabilidad_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_contabilidad_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$parametro_contabilidad_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$parametro_contabilidad_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$parametro_contabilidad_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$parametro_contabilidad_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$parametro_contabilidad_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$parametro_contabilidad_control_session->strMensajeid_empresa;
		$this->strMensajenumero_asiento=$parametro_contabilidad_control_session->strMensajenumero_asiento;
		$this->strMensajecon_asiento_simple_facturacion=$parametro_contabilidad_control_session->strMensajecon_asiento_simple_facturacion;
		$this->strMensajecon_eliminacion_fisica_asiento=$parametro_contabilidad_control_session->strMensajecon_eliminacion_fisica_asiento;
			
		
		$this->empresasFK=$parametro_contabilidad_control_session->empresasFK;
		$this->idempresaDefaultFK=$parametro_contabilidad_control_session->idempresaDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$parametro_contabilidad_control_session->strVisibleFK_Idempresa;
		
		
		
		
		$this->id_empresaFK_Idempresa=$parametro_contabilidad_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getparametro_contabilidadControllerAdditional() {
		return $this->parametro_contabilidadControllerAdditional;
	}

	public function setparametro_contabilidadControllerAdditional($parametro_contabilidadControllerAdditional) {
		$this->parametro_contabilidadControllerAdditional = $parametro_contabilidadControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getparametro_contabilidadActual() : parametro_contabilidad {
		return $this->parametro_contabilidadActual;
	}

	public function setparametro_contabilidadActual(parametro_contabilidad $parametro_contabilidadActual) {
		$this->parametro_contabilidadActual = $parametro_contabilidadActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidparametro_contabilidad() : int {
		return $this->idparametro_contabilidad;
	}

	public function setidparametro_contabilidad(int $idparametro_contabilidad) {
		$this->idparametro_contabilidad = $idparametro_contabilidad;
	}
	
	public function getparametro_contabilidad() : parametro_contabilidad {
		return $this->parametro_contabilidad;
	}

	public function setparametro_contabilidad(parametro_contabilidad $parametro_contabilidad) {
		$this->parametro_contabilidad = $parametro_contabilidad;
	}
		
	public function getparametro_contabilidadLogic() : parametro_contabilidad_logic {		
		return $this->parametro_contabilidadLogic;
	}

	public function setparametro_contabilidadLogic(parametro_contabilidad_logic $parametro_contabilidadLogic) {
		$this->parametro_contabilidadLogic = $parametro_contabilidadLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getparametro_contabilidadsModel() {		
		try {						
			/*parametro_contabilidadsModel.setWrappedData(parametro_contabilidadLogic->getparametro_contabilidads());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->parametro_contabilidadsModel;
	}
	
	public function setparametro_contabilidadsModel($parametro_contabilidadsModel) {
		$this->parametro_contabilidadsModel = $parametro_contabilidadsModel;
	}
	
	public function getparametro_contabilidads() : array {		
		return $this->parametro_contabilidads;
	}
	
	public function setparametro_contabilidads(array $parametro_contabilidads) {
		$this->parametro_contabilidads= $parametro_contabilidads;
	}
	
	public function getparametro_contabilidadsEliminados() : array {		
		return $this->parametro_contabilidadsEliminados;
	}
	
	public function setparametro_contabilidadsEliminados(array $parametro_contabilidadsEliminados) {
		$this->parametro_contabilidadsEliminados= $parametro_contabilidadsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getparametro_contabilidadActualFromListDataModel() {
		try {
			/*$parametro_contabilidadClase= $this->parametro_contabilidadsModel->getRowData();*/
			
			/*return $parametro_contabilidad;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
