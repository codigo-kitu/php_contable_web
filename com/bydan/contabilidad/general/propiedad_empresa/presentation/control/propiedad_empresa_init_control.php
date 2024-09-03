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

namespace com\bydan\contabilidad\general\propiedad_empresa\presentation\control;

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

use com\bydan\contabilidad\general\propiedad_empresa\business\entity\propiedad_empresa;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/propiedad_empresa/util/propiedad_empresa_carga.php');
use com\bydan\contabilidad\general\propiedad_empresa\util\propiedad_empresa_carga;

use com\bydan\contabilidad\general\propiedad_empresa\util\propiedad_empresa_util;
use com\bydan\contabilidad\general\propiedad_empresa\util\propiedad_empresa_param_return;
use com\bydan\contabilidad\general\propiedad_empresa\business\logic\propiedad_empresa_logic;
use com\bydan\contabilidad\general\propiedad_empresa\presentation\session\propiedad_empresa_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
propiedad_empresa_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
propiedad_empresa_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
propiedad_empresa_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
propiedad_empresa_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*propiedad_empresa_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class propiedad_empresa_init_control extends ControllerBase {	
	
	public $propiedad_empresaClase=null;	
	public $propiedad_empresasModel=null;	
	public $propiedad_empresasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idpropiedad_empresa=0;	
	public ?int $idpropiedad_empresaActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $propiedad_empresaLogic=null;
	
	public $propiedad_empresaActual=null;	
	
	public $propiedad_empresa=null;
	public $propiedad_empresas=null;
	public $propiedad_empresasEliminados=array();
	public $propiedad_empresasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $propiedad_empresasLocal=array();
	public ?array $propiedad_empresasReporte=null;
	public ?array $propiedad_empresasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadpropiedad_empresa='onload';
	public string $strTipoPaginaAuxiliarpropiedad_empresa='none';
	public string $strTipoUsuarioAuxiliarpropiedad_empresa='none';
		
	public $propiedad_empresaReturnGeneral=null;
	public $propiedad_empresaParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $propiedad_empresaModel=null;
	public $propiedad_empresaControllerAdditional=null;
	
	
	 	
	
	public string $strMensajenombre_empresa='';
	public string $strMensajecalle_1='';
	public string $strMensajecalle_2='';
	public string $strMensajecalle_3='';
	public string $strMensajebarrio='';
	public string $strMensajeciudad='';
	public string $strMensajeestado='';
	public string $strMensajecodigo_postal='';
	public string $strMensajecodigo_pais='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->propiedad_empresaLogic==null) {
				$this->propiedad_empresaLogic=new propiedad_empresa_logic();
			}
			
		} else {
			if($this->propiedad_empresaLogic==null) {
				$this->propiedad_empresaLogic=new propiedad_empresa_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->propiedad_empresaClase==null) {
				$this->propiedad_empresaClase=new propiedad_empresa();
			}
			
			$this->propiedad_empresaClase->setId(0);	
				
				
			$this->propiedad_empresaClase->setnombre_empresa('');	
			$this->propiedad_empresaClase->setcalle_1('');	
			$this->propiedad_empresaClase->setcalle_2('');	
			$this->propiedad_empresaClase->setcalle_3('');	
			$this->propiedad_empresaClase->setbarrio('');	
			$this->propiedad_empresaClase->setciudad('');	
			$this->propiedad_empresaClase->setestado('');	
			$this->propiedad_empresaClase->setcodigo_postal('');	
			$this->propiedad_empresaClase->setcodigo_pais('');	
			
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
		$this->prepararEjecutarMantenimientoBase('propiedad_empresa');
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
		$this->cargarParametrosReporteBase('propiedad_empresa');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('propiedad_empresa');
	}
	
	public function actualizarControllerConReturnGeneral(propiedad_empresa_param_return $propiedad_empresaReturnGeneral) {
		if($propiedad_empresaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajespropiedad_empresasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$propiedad_empresaReturnGeneral->getsMensajeProceso();
		}
		
		if($propiedad_empresaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$propiedad_empresaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($propiedad_empresaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$propiedad_empresaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$propiedad_empresaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($propiedad_empresaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($propiedad_empresaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$propiedad_empresaReturnGeneral->getsFuncionJs();
		}
		
		if($propiedad_empresaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(propiedad_empresa_session $propiedad_empresa_session){
		$this->strStyleDivArbol=$propiedad_empresa_session->strStyleDivArbol;	
		$this->strStyleDivContent=$propiedad_empresa_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$propiedad_empresa_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$propiedad_empresa_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$propiedad_empresa_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$propiedad_empresa_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$propiedad_empresa_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(propiedad_empresa_session $propiedad_empresa_session){
		$propiedad_empresa_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$propiedad_empresa_session->strStyleDivHeader='display:none';			
		$propiedad_empresa_session->strStyleDivContent='width:93%;height:100%';	
		$propiedad_empresa_session->strStyleDivOpcionesBanner='display:none';	
		$propiedad_empresa_session->strStyleDivExpandirColapsar='display:none';	
		$propiedad_empresa_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(propiedad_empresa_control $propiedad_empresa_control_session){
		$this->idNuevo=$propiedad_empresa_control_session->idNuevo;
		$this->propiedad_empresaActual=$propiedad_empresa_control_session->propiedad_empresaActual;
		$this->propiedad_empresa=$propiedad_empresa_control_session->propiedad_empresa;
		$this->propiedad_empresaClase=$propiedad_empresa_control_session->propiedad_empresaClase;
		$this->propiedad_empresas=$propiedad_empresa_control_session->propiedad_empresas;
		$this->propiedad_empresasEliminados=$propiedad_empresa_control_session->propiedad_empresasEliminados;
		$this->propiedad_empresa=$propiedad_empresa_control_session->propiedad_empresa;
		$this->propiedad_empresasReporte=$propiedad_empresa_control_session->propiedad_empresasReporte;
		$this->propiedad_empresasSeleccionados=$propiedad_empresa_control_session->propiedad_empresasSeleccionados;
		$this->arrOrderBy=$propiedad_empresa_control_session->arrOrderBy;
		$this->arrOrderByRel=$propiedad_empresa_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$propiedad_empresa_control_session->arrHistoryWebs;
		$this->arrSessionBases=$propiedad_empresa_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadpropiedad_empresa=$propiedad_empresa_control_session->strTypeOnLoadpropiedad_empresa;
		$this->strTipoPaginaAuxiliarpropiedad_empresa=$propiedad_empresa_control_session->strTipoPaginaAuxiliarpropiedad_empresa;
		$this->strTipoUsuarioAuxiliarpropiedad_empresa=$propiedad_empresa_control_session->strTipoUsuarioAuxiliarpropiedad_empresa;	
		
		$this->bitEsPopup=$propiedad_empresa_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$propiedad_empresa_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$propiedad_empresa_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$propiedad_empresa_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$propiedad_empresa_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$propiedad_empresa_control_session->strSufijo;
		$this->bitEsRelaciones=$propiedad_empresa_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$propiedad_empresa_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$propiedad_empresa_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$propiedad_empresa_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$propiedad_empresa_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$propiedad_empresa_control_session->strTituloTabla;
		$this->strTituloPathPagina=$propiedad_empresa_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$propiedad_empresa_control_session->strTituloPathElementoActual;
		
		if($this->propiedad_empresaLogic==null) {			
			$this->propiedad_empresaLogic=new propiedad_empresa_logic();
		}
		
		
		if($this->propiedad_empresaClase==null) {
			$this->propiedad_empresaClase=new propiedad_empresa();	
		}
		
		$this->propiedad_empresaLogic->setpropiedad_empresa($this->propiedad_empresaClase);
		
		
		if($this->propiedad_empresas==null) {
			$this->propiedad_empresas=array();	
		}
		
		$this->propiedad_empresaLogic->setpropiedad_empresas($this->propiedad_empresas);
		
		
		$this->strTipoView=$propiedad_empresa_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$propiedad_empresa_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$propiedad_empresa_control_session->datosCliente;
		$this->strAccionBusqueda=$propiedad_empresa_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$propiedad_empresa_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$propiedad_empresa_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$propiedad_empresa_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$propiedad_empresa_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$propiedad_empresa_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$propiedad_empresa_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$propiedad_empresa_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$propiedad_empresa_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$propiedad_empresa_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$propiedad_empresa_control_session->strTipoPaginacion;
		$this->strTipoAccion=$propiedad_empresa_control_session->strTipoAccion;
		$this->tiposReportes=$propiedad_empresa_control_session->tiposReportes;
		$this->tiposReporte=$propiedad_empresa_control_session->tiposReporte;
		$this->tiposAcciones=$propiedad_empresa_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$propiedad_empresa_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$propiedad_empresa_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$propiedad_empresa_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$propiedad_empresa_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$propiedad_empresa_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$propiedad_empresa_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$propiedad_empresa_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$propiedad_empresa_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$propiedad_empresa_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$propiedad_empresa_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$propiedad_empresa_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$propiedad_empresa_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$propiedad_empresa_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$propiedad_empresa_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$propiedad_empresa_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$propiedad_empresa_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$propiedad_empresa_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$propiedad_empresa_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$propiedad_empresa_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$propiedad_empresa_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$propiedad_empresa_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$propiedad_empresa_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$propiedad_empresa_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$propiedad_empresa_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$propiedad_empresa_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$propiedad_empresa_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$propiedad_empresa_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$propiedad_empresa_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$propiedad_empresa_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$propiedad_empresa_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$propiedad_empresa_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$propiedad_empresa_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$propiedad_empresa_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$propiedad_empresa_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$propiedad_empresa_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$propiedad_empresa_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$propiedad_empresa_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$propiedad_empresa_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$propiedad_empresa_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$propiedad_empresa_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$propiedad_empresa_control_session->resumenUsuarioActual;	
		$this->moduloActual=$propiedad_empresa_control_session->moduloActual;	
		$this->opcionActual=$propiedad_empresa_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$propiedad_empresa_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$propiedad_empresa_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$propiedad_empresa_session=unserialize($this->Session->read(propiedad_empresa_util::$STR_SESSION_NAME));
				
		if($propiedad_empresa_session==null) {
			$propiedad_empresa_session=new propiedad_empresa_session();
		}
		
		$this->strStyleDivArbol=$propiedad_empresa_session->strStyleDivArbol;	
		$this->strStyleDivContent=$propiedad_empresa_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$propiedad_empresa_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$propiedad_empresa_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$propiedad_empresa_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$propiedad_empresa_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$propiedad_empresa_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$propiedad_empresa_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$propiedad_empresa_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$propiedad_empresa_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$propiedad_empresa_session->strRecargarFkQuery;
		*/
		
		$this->strMensajenombre_empresa=$propiedad_empresa_control_session->strMensajenombre_empresa;
		$this->strMensajecalle_1=$propiedad_empresa_control_session->strMensajecalle_1;
		$this->strMensajecalle_2=$propiedad_empresa_control_session->strMensajecalle_2;
		$this->strMensajecalle_3=$propiedad_empresa_control_session->strMensajecalle_3;
		$this->strMensajebarrio=$propiedad_empresa_control_session->strMensajebarrio;
		$this->strMensajeciudad=$propiedad_empresa_control_session->strMensajeciudad;
		$this->strMensajeestado=$propiedad_empresa_control_session->strMensajeestado;
		$this->strMensajecodigo_postal=$propiedad_empresa_control_session->strMensajecodigo_postal;
		$this->strMensajecodigo_pais=$propiedad_empresa_control_session->strMensajecodigo_pais;
			
		
		
		
		
		
		
		

		
		
		
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
	
	public function getpropiedad_empresaControllerAdditional() {
		return $this->propiedad_empresaControllerAdditional;
	}

	public function setpropiedad_empresaControllerAdditional($propiedad_empresaControllerAdditional) {
		$this->propiedad_empresaControllerAdditional = $propiedad_empresaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getpropiedad_empresaActual() : propiedad_empresa {
		return $this->propiedad_empresaActual;
	}

	public function setpropiedad_empresaActual(propiedad_empresa $propiedad_empresaActual) {
		$this->propiedad_empresaActual = $propiedad_empresaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidpropiedad_empresa() : int {
		return $this->idpropiedad_empresa;
	}

	public function setidpropiedad_empresa(int $idpropiedad_empresa) {
		$this->idpropiedad_empresa = $idpropiedad_empresa;
	}
	
	public function getpropiedad_empresa() : propiedad_empresa {
		return $this->propiedad_empresa;
	}

	public function setpropiedad_empresa(propiedad_empresa $propiedad_empresa) {
		$this->propiedad_empresa = $propiedad_empresa;
	}
		
	public function getpropiedad_empresaLogic() : propiedad_empresa_logic {		
		return $this->propiedad_empresaLogic;
	}

	public function setpropiedad_empresaLogic(propiedad_empresa_logic $propiedad_empresaLogic) {
		$this->propiedad_empresaLogic = $propiedad_empresaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getpropiedad_empresasModel() {		
		try {						
			/*propiedad_empresasModel.setWrappedData(propiedad_empresaLogic->getpropiedad_empresas());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->propiedad_empresasModel;
	}
	
	public function setpropiedad_empresasModel($propiedad_empresasModel) {
		$this->propiedad_empresasModel = $propiedad_empresasModel;
	}
	
	public function getpropiedad_empresas() : array {		
		return $this->propiedad_empresas;
	}
	
	public function setpropiedad_empresas(array $propiedad_empresas) {
		$this->propiedad_empresas= $propiedad_empresas;
	}
	
	public function getpropiedad_empresasEliminados() : array {		
		return $this->propiedad_empresasEliminados;
	}
	
	public function setpropiedad_empresasEliminados(array $propiedad_empresasEliminados) {
		$this->propiedad_empresasEliminados= $propiedad_empresasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getpropiedad_empresaActualFromListDataModel() {
		try {
			/*$propiedad_empresaClase= $this->propiedad_empresasModel->getRowData();*/
			
			/*return $propiedad_empresa;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
