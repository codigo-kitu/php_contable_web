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

namespace com\bydan\contabilidad\general\parametro_generico\presentation\control;

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

use com\bydan\contabilidad\general\parametro_generico\business\entity\parametro_generico;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/parametro_generico/util/parametro_generico_carga.php');
use com\bydan\contabilidad\general\parametro_generico\util\parametro_generico_carga;

use com\bydan\contabilidad\general\parametro_generico\util\parametro_generico_util;
use com\bydan\contabilidad\general\parametro_generico\util\parametro_generico_param_return;
use com\bydan\contabilidad\general\parametro_generico\business\logic\parametro_generico_logic;
use com\bydan\contabilidad\general\parametro_generico\presentation\session\parametro_generico_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_generico_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_generico_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_generico_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_generico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_generico_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class parametro_generico_init_control extends ControllerBase {	
	
	public $parametro_genericoClase=null;	
	public $parametro_genericosModel=null;	
	public $parametro_genericosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idparametro_generico=0;	
	public ?int $idparametro_genericoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $parametro_genericoLogic=null;
	
	public $parametro_genericoActual=null;	
	
	public $parametro_generico=null;
	public $parametro_genericos=null;
	public $parametro_genericosEliminados=array();
	public $parametro_genericosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $parametro_genericosLocal=array();
	public ?array $parametro_genericosReporte=null;
	public ?array $parametro_genericosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadparametro_generico='onload';
	public string $strTipoPaginaAuxiliarparametro_generico='none';
	public string $strTipoUsuarioAuxiliarparametro_generico='none';
		
	public $parametro_genericoReturnGeneral=null;
	public $parametro_genericoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $parametro_genericoModel=null;
	public $parametro_genericoControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeparametro='';
	public string $strMensajedescripcion_pantalla='';
	public string $strMensajevalor_caracteristica='';
	public string $strMensajevalor2_caracteristica='';
	public string $strMensajevalor3_caracteristica='';
	public string $strMensajevalor_fecha='';
	public string $strMensajevalor_numerico='';
	public string $strMensajevalor2_numerico='';
	public string $strMensajevalor_binario='';
	
	

	
	
	
	
	
	
	
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->parametro_genericoLogic==null) {
				$this->parametro_genericoLogic=new parametro_generico_logic();
			}
			
		} else {
			if($this->parametro_genericoLogic==null) {
				$this->parametro_genericoLogic=new parametro_generico_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->parametro_genericoClase==null) {
				$this->parametro_genericoClase=new parametro_generico();
			}
			
			$this->parametro_genericoClase->setId(0);	
				
				
			$this->parametro_genericoClase->setparametro('');	
			$this->parametro_genericoClase->setdescripcion_pantalla('');	
			$this->parametro_genericoClase->setvalor_caracteristica('');	
			$this->parametro_genericoClase->setvalor2_caracteristica('');	
			$this->parametro_genericoClase->setvalor3_caracteristica('');	
			$this->parametro_genericoClase->setvalor_fecha(date('Y-m-d'));	
			$this->parametro_genericoClase->setvalor_numerico(0.0);	
			$this->parametro_genericoClase->setvalor2_numerico(0.0);	
			$this->parametro_genericoClase->setvalor_binario('');	
			
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
		$this->prepararEjecutarMantenimientoBase('parametro_generico');
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
		$this->cargarParametrosReporteBase('parametro_generico');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('parametro_generico');
	}
	
	public function actualizarControllerConReturnGeneral(parametro_generico_param_return $parametro_genericoReturnGeneral) {
		if($parametro_genericoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesparametro_genericosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$parametro_genericoReturnGeneral->getsMensajeProceso();
		}
		
		if($parametro_genericoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$parametro_genericoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($parametro_genericoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$parametro_genericoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$parametro_genericoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($parametro_genericoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($parametro_genericoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$parametro_genericoReturnGeneral->getsFuncionJs();
		}
		
		if($parametro_genericoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(parametro_generico_session $parametro_generico_session){
		$this->strStyleDivArbol=$parametro_generico_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_generico_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_generico_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_generico_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_generico_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_generico_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$parametro_generico_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(parametro_generico_session $parametro_generico_session){
		$parametro_generico_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$parametro_generico_session->strStyleDivHeader='display:none';			
		$parametro_generico_session->strStyleDivContent='width:93%;height:100%';	
		$parametro_generico_session->strStyleDivOpcionesBanner='display:none';	
		$parametro_generico_session->strStyleDivExpandirColapsar='display:none';	
		$parametro_generico_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(parametro_generico_control $parametro_generico_control_session){
		$this->idNuevo=$parametro_generico_control_session->idNuevo;
		$this->parametro_genericoActual=$parametro_generico_control_session->parametro_genericoActual;
		$this->parametro_generico=$parametro_generico_control_session->parametro_generico;
		$this->parametro_genericoClase=$parametro_generico_control_session->parametro_genericoClase;
		$this->parametro_genericos=$parametro_generico_control_session->parametro_genericos;
		$this->parametro_genericosEliminados=$parametro_generico_control_session->parametro_genericosEliminados;
		$this->parametro_generico=$parametro_generico_control_session->parametro_generico;
		$this->parametro_genericosReporte=$parametro_generico_control_session->parametro_genericosReporte;
		$this->parametro_genericosSeleccionados=$parametro_generico_control_session->parametro_genericosSeleccionados;
		$this->arrOrderBy=$parametro_generico_control_session->arrOrderBy;
		$this->arrOrderByRel=$parametro_generico_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$parametro_generico_control_session->arrHistoryWebs;
		$this->arrSessionBases=$parametro_generico_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadparametro_generico=$parametro_generico_control_session->strTypeOnLoadparametro_generico;
		$this->strTipoPaginaAuxiliarparametro_generico=$parametro_generico_control_session->strTipoPaginaAuxiliarparametro_generico;
		$this->strTipoUsuarioAuxiliarparametro_generico=$parametro_generico_control_session->strTipoUsuarioAuxiliarparametro_generico;	
		
		$this->bitEsPopup=$parametro_generico_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$parametro_generico_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$parametro_generico_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$parametro_generico_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$parametro_generico_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$parametro_generico_control_session->strSufijo;
		$this->bitEsRelaciones=$parametro_generico_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$parametro_generico_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$parametro_generico_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$parametro_generico_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$parametro_generico_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$parametro_generico_control_session->strTituloTabla;
		$this->strTituloPathPagina=$parametro_generico_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$parametro_generico_control_session->strTituloPathElementoActual;
		
		if($this->parametro_genericoLogic==null) {			
			$this->parametro_genericoLogic=new parametro_generico_logic();
		}
		
		
		if($this->parametro_genericoClase==null) {
			$this->parametro_genericoClase=new parametro_generico();	
		}
		
		$this->parametro_genericoLogic->setparametro_generico($this->parametro_genericoClase);
		
		
		if($this->parametro_genericos==null) {
			$this->parametro_genericos=array();	
		}
		
		$this->parametro_genericoLogic->setparametro_genericos($this->parametro_genericos);
		
		
		$this->strTipoView=$parametro_generico_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$parametro_generico_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$parametro_generico_control_session->datosCliente;
		$this->strAccionBusqueda=$parametro_generico_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$parametro_generico_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$parametro_generico_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$parametro_generico_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$parametro_generico_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$parametro_generico_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$parametro_generico_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$parametro_generico_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$parametro_generico_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$parametro_generico_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$parametro_generico_control_session->strTipoPaginacion;
		$this->strTipoAccion=$parametro_generico_control_session->strTipoAccion;
		$this->tiposReportes=$parametro_generico_control_session->tiposReportes;
		$this->tiposReporte=$parametro_generico_control_session->tiposReporte;
		$this->tiposAcciones=$parametro_generico_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$parametro_generico_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$parametro_generico_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$parametro_generico_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$parametro_generico_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$parametro_generico_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$parametro_generico_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$parametro_generico_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$parametro_generico_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$parametro_generico_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$parametro_generico_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$parametro_generico_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$parametro_generico_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$parametro_generico_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$parametro_generico_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$parametro_generico_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$parametro_generico_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$parametro_generico_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$parametro_generico_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$parametro_generico_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$parametro_generico_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$parametro_generico_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$parametro_generico_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$parametro_generico_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$parametro_generico_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$parametro_generico_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$parametro_generico_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$parametro_generico_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$parametro_generico_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$parametro_generico_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$parametro_generico_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$parametro_generico_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$parametro_generico_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$parametro_generico_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$parametro_generico_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$parametro_generico_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$parametro_generico_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$parametro_generico_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$parametro_generico_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$parametro_generico_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$parametro_generico_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$parametro_generico_control_session->resumenUsuarioActual;	
		$this->moduloActual=$parametro_generico_control_session->moduloActual;	
		$this->opcionActual=$parametro_generico_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$parametro_generico_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$parametro_generico_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$parametro_generico_session=unserialize($this->Session->read(parametro_generico_util::$STR_SESSION_NAME));
				
		if($parametro_generico_session==null) {
			$parametro_generico_session=new parametro_generico_session();
		}
		
		$this->strStyleDivArbol=$parametro_generico_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_generico_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_generico_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_generico_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_generico_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_generico_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$parametro_generico_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$parametro_generico_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$parametro_generico_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$parametro_generico_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$parametro_generico_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeparametro=$parametro_generico_control_session->strMensajeparametro;
		$this->strMensajedescripcion_pantalla=$parametro_generico_control_session->strMensajedescripcion_pantalla;
		$this->strMensajevalor_caracteristica=$parametro_generico_control_session->strMensajevalor_caracteristica;
		$this->strMensajevalor2_caracteristica=$parametro_generico_control_session->strMensajevalor2_caracteristica;
		$this->strMensajevalor3_caracteristica=$parametro_generico_control_session->strMensajevalor3_caracteristica;
		$this->strMensajevalor_fecha=$parametro_generico_control_session->strMensajevalor_fecha;
		$this->strMensajevalor_numerico=$parametro_generico_control_session->strMensajevalor_numerico;
		$this->strMensajevalor2_numerico=$parametro_generico_control_session->strMensajevalor2_numerico;
		$this->strMensajevalor_binario=$parametro_generico_control_session->strMensajevalor_binario;
			
		
		
		
		
		
		
		

		
		
		
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
	
	public function getparametro_genericoControllerAdditional() {
		return $this->parametro_genericoControllerAdditional;
	}

	public function setparametro_genericoControllerAdditional($parametro_genericoControllerAdditional) {
		$this->parametro_genericoControllerAdditional = $parametro_genericoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getparametro_genericoActual() : parametro_generico {
		return $this->parametro_genericoActual;
	}

	public function setparametro_genericoActual(parametro_generico $parametro_genericoActual) {
		$this->parametro_genericoActual = $parametro_genericoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidparametro_generico() : int {
		return $this->idparametro_generico;
	}

	public function setidparametro_generico(int $idparametro_generico) {
		$this->idparametro_generico = $idparametro_generico;
	}
	
	public function getparametro_generico() : parametro_generico {
		return $this->parametro_generico;
	}

	public function setparametro_generico(parametro_generico $parametro_generico) {
		$this->parametro_generico = $parametro_generico;
	}
		
	public function getparametro_genericoLogic() : parametro_generico_logic {		
		return $this->parametro_genericoLogic;
	}

	public function setparametro_genericoLogic(parametro_generico_logic $parametro_genericoLogic) {
		$this->parametro_genericoLogic = $parametro_genericoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getparametro_genericosModel() {		
		try {						
			/*parametro_genericosModel.setWrappedData(parametro_genericoLogic->getparametro_genericos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->parametro_genericosModel;
	}
	
	public function setparametro_genericosModel($parametro_genericosModel) {
		$this->parametro_genericosModel = $parametro_genericosModel;
	}
	
	public function getparametro_genericos() : array {		
		return $this->parametro_genericos;
	}
	
	public function setparametro_genericos(array $parametro_genericos) {
		$this->parametro_genericos= $parametro_genericos;
	}
	
	public function getparametro_genericosEliminados() : array {		
		return $this->parametro_genericosEliminados;
	}
	
	public function setparametro_genericosEliminados(array $parametro_genericosEliminados) {
		$this->parametro_genericosEliminados= $parametro_genericosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getparametro_genericoActualFromListDataModel() {
		try {
			/*$parametro_genericoClase= $this->parametro_genericosModel->getRowData();*/
			
			/*return $parametro_generico;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
