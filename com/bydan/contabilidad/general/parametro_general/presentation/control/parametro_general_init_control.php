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

namespace com\bydan\contabilidad\general\parametro_general\presentation\control;

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

use com\bydan\contabilidad\general\parametro_general\business\entity\parametro_general;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/parametro_general/util/parametro_general_carga.php');
use com\bydan\contabilidad\general\parametro_general\util\parametro_general_carga;

use com\bydan\contabilidad\general\parametro_general\util\parametro_general_util;
use com\bydan\contabilidad\general\parametro_general\util\parametro_general_param_return;
use com\bydan\contabilidad\general\parametro_general\business\logic\parametro_general_logic;
use com\bydan\contabilidad\general\parametro_general\presentation\session\parametro_general_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\util\pais_carga;
use com\bydan\contabilidad\seguridad\pais\util\pais_util;

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_carga;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_general_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_general_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_general_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_general_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_general_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class parametro_general_init_control extends ControllerBase {	
	
	public $parametro_generalClase=null;	
	public $parametro_generalsModel=null;	
	public $parametro_generalsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idparametro_general=0;	
	public ?int $idparametro_generalActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $parametro_generalLogic=null;
	
	public $parametro_generalActual=null;	
	
	public $parametro_general=null;
	public $parametro_generals=null;
	public $parametro_generalsEliminados=array();
	public $parametro_generalsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $parametro_generalsLocal=array();
	public ?array $parametro_generalsReporte=null;
	public ?array $parametro_generalsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadparametro_general='onload';
	public string $strTipoPaginaAuxiliarparametro_general='none';
	public string $strTipoUsuarioAuxiliarparametro_general='none';
		
	public $parametro_generalReturnGeneral=null;
	public $parametro_generalParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $parametro_generalModel=null;
	public $parametro_generalControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_pais='';
	public string $strMensajeid_modena='';
	public string $strMensajesimbolo_moneda='';
	public string $strMensajenumero_decimales='';
	public string $strMensajecon_formato_fecha_mda='';
	public string $strMensajecon_formato_cantidad_coma='';
	public string $strMensajeiva_porciento='';
	
	
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idmoneda='display:table-row';
	public string $strVisibleFK_Idpais='display:table-row';

	
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

	public array $paissFK=array();

	public function getpaissFK():array {
		return $this->paissFK;
	}

	public function setpaissFK(array $paissFK) {
		$this->paissFK = $paissFK;
	}

	public int $idpaisDefaultFK=-1;

	public function getIdpaisDefaultFK():int {
		return $this->idpaisDefaultFK;
	}

	public function setIdpaisDefaultFK(int $idpaisDefaultFK) {
		$this->idpaisDefaultFK = $idpaisDefaultFK;
	}

	public array $monedasFK=array();

	public function getmonedasFK():array {
		return $this->monedasFK;
	}

	public function setmonedasFK(array $monedasFK) {
		$this->monedasFK = $monedasFK;
	}

	public int $idmonedaDefaultFK=-1;

	public function getIdmonedaDefaultFK():int {
		return $this->idmonedaDefaultFK;
	}

	public function setIdmonedaDefaultFK(int $idmonedaDefaultFK) {
		$this->idmonedaDefaultFK = $idmonedaDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_empresaFK_Idempresa=null;

	public  $id_modenaFK_Idmoneda=null;

	public  $id_paisFK_Idpais=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->parametro_generalLogic==null) {
				$this->parametro_generalLogic=new parametro_general_logic();
			}
			
		} else {
			if($this->parametro_generalLogic==null) {
				$this->parametro_generalLogic=new parametro_general_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->parametro_generalClase==null) {
				$this->parametro_generalClase=new parametro_general();
			}
			
			$this->parametro_generalClase->setId(0);	
				
				
			$this->parametro_generalClase->setid_empresa(-1);	
			$this->parametro_generalClase->setid_pais(-1);	
			$this->parametro_generalClase->setid_modena(-1);	
			$this->parametro_generalClase->setsimbolo_moneda('');	
			$this->parametro_generalClase->setnumero_decimales(0);	
			$this->parametro_generalClase->setcon_formato_fecha_mda(false);	
			$this->parametro_generalClase->setcon_formato_cantidad_coma(false);	
			$this->parametro_generalClase->setiva_porciento(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('parametro_general');
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
		$this->cargarParametrosReporteBase('parametro_general');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('parametro_general');
	}
	
	public function actualizarControllerConReturnGeneral(parametro_general_param_return $parametro_generalReturnGeneral) {
		if($parametro_generalReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesparametro_generalsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$parametro_generalReturnGeneral->getsMensajeProceso();
		}
		
		if($parametro_generalReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$parametro_generalReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($parametro_generalReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$parametro_generalReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$parametro_generalReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($parametro_generalReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($parametro_generalReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$parametro_generalReturnGeneral->getsFuncionJs();
		}
		
		if($parametro_generalReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(parametro_general_session $parametro_general_session){
		$this->strStyleDivArbol=$parametro_general_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_general_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_general_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_general_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_general_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_general_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$parametro_general_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(parametro_general_session $parametro_general_session){
		$parametro_general_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$parametro_general_session->strStyleDivHeader='display:none';			
		$parametro_general_session->strStyleDivContent='width:93%;height:100%';	
		$parametro_general_session->strStyleDivOpcionesBanner='display:none';	
		$parametro_general_session->strStyleDivExpandirColapsar='display:none';	
		$parametro_general_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(parametro_general_control $parametro_general_control_session){
		$this->idNuevo=$parametro_general_control_session->idNuevo;
		$this->parametro_generalActual=$parametro_general_control_session->parametro_generalActual;
		$this->parametro_general=$parametro_general_control_session->parametro_general;
		$this->parametro_generalClase=$parametro_general_control_session->parametro_generalClase;
		$this->parametro_generals=$parametro_general_control_session->parametro_generals;
		$this->parametro_generalsEliminados=$parametro_general_control_session->parametro_generalsEliminados;
		$this->parametro_general=$parametro_general_control_session->parametro_general;
		$this->parametro_generalsReporte=$parametro_general_control_session->parametro_generalsReporte;
		$this->parametro_generalsSeleccionados=$parametro_general_control_session->parametro_generalsSeleccionados;
		$this->arrOrderBy=$parametro_general_control_session->arrOrderBy;
		$this->arrOrderByRel=$parametro_general_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$parametro_general_control_session->arrHistoryWebs;
		$this->arrSessionBases=$parametro_general_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadparametro_general=$parametro_general_control_session->strTypeOnLoadparametro_general;
		$this->strTipoPaginaAuxiliarparametro_general=$parametro_general_control_session->strTipoPaginaAuxiliarparametro_general;
		$this->strTipoUsuarioAuxiliarparametro_general=$parametro_general_control_session->strTipoUsuarioAuxiliarparametro_general;	
		
		$this->bitEsPopup=$parametro_general_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$parametro_general_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$parametro_general_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$parametro_general_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$parametro_general_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$parametro_general_control_session->strSufijo;
		$this->bitEsRelaciones=$parametro_general_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$parametro_general_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$parametro_general_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$parametro_general_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$parametro_general_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$parametro_general_control_session->strTituloTabla;
		$this->strTituloPathPagina=$parametro_general_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$parametro_general_control_session->strTituloPathElementoActual;
		
		if($this->parametro_generalLogic==null) {			
			$this->parametro_generalLogic=new parametro_general_logic();
		}
		
		
		if($this->parametro_generalClase==null) {
			$this->parametro_generalClase=new parametro_general();	
		}
		
		$this->parametro_generalLogic->setparametro_general($this->parametro_generalClase);
		
		
		if($this->parametro_generals==null) {
			$this->parametro_generals=array();	
		}
		
		$this->parametro_generalLogic->setparametro_generals($this->parametro_generals);
		
		
		$this->strTipoView=$parametro_general_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$parametro_general_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$parametro_general_control_session->datosCliente;
		$this->strAccionBusqueda=$parametro_general_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$parametro_general_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$parametro_general_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$parametro_general_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$parametro_general_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$parametro_general_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$parametro_general_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$parametro_general_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$parametro_general_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$parametro_general_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$parametro_general_control_session->strTipoPaginacion;
		$this->strTipoAccion=$parametro_general_control_session->strTipoAccion;
		$this->tiposReportes=$parametro_general_control_session->tiposReportes;
		$this->tiposReporte=$parametro_general_control_session->tiposReporte;
		$this->tiposAcciones=$parametro_general_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$parametro_general_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$parametro_general_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$parametro_general_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$parametro_general_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$parametro_general_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$parametro_general_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$parametro_general_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$parametro_general_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$parametro_general_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$parametro_general_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$parametro_general_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$parametro_general_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$parametro_general_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$parametro_general_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$parametro_general_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$parametro_general_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$parametro_general_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$parametro_general_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$parametro_general_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$parametro_general_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$parametro_general_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$parametro_general_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$parametro_general_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$parametro_general_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$parametro_general_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$parametro_general_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$parametro_general_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$parametro_general_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$parametro_general_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$parametro_general_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$parametro_general_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$parametro_general_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$parametro_general_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$parametro_general_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$parametro_general_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$parametro_general_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$parametro_general_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$parametro_general_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$parametro_general_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$parametro_general_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$parametro_general_control_session->resumenUsuarioActual;	
		$this->moduloActual=$parametro_general_control_session->moduloActual;	
		$this->opcionActual=$parametro_general_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$parametro_general_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$parametro_general_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$parametro_general_session=unserialize($this->Session->read(parametro_general_util::$STR_SESSION_NAME));
				
		if($parametro_general_session==null) {
			$parametro_general_session=new parametro_general_session();
		}
		
		$this->strStyleDivArbol=$parametro_general_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_general_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_general_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_general_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_general_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_general_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$parametro_general_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$parametro_general_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$parametro_general_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$parametro_general_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$parametro_general_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$parametro_general_control_session->strMensajeid_empresa;
		$this->strMensajeid_pais=$parametro_general_control_session->strMensajeid_pais;
		$this->strMensajeid_modena=$parametro_general_control_session->strMensajeid_modena;
		$this->strMensajesimbolo_moneda=$parametro_general_control_session->strMensajesimbolo_moneda;
		$this->strMensajenumero_decimales=$parametro_general_control_session->strMensajenumero_decimales;
		$this->strMensajecon_formato_fecha_mda=$parametro_general_control_session->strMensajecon_formato_fecha_mda;
		$this->strMensajecon_formato_cantidad_coma=$parametro_general_control_session->strMensajecon_formato_cantidad_coma;
		$this->strMensajeiva_porciento=$parametro_general_control_session->strMensajeiva_porciento;
			
		
		$this->empresasFK=$parametro_general_control_session->empresasFK;
		$this->idempresaDefaultFK=$parametro_general_control_session->idempresaDefaultFK;
		$this->paissFK=$parametro_general_control_session->paissFK;
		$this->idpaisDefaultFK=$parametro_general_control_session->idpaisDefaultFK;
		$this->monedasFK=$parametro_general_control_session->monedasFK;
		$this->idmonedaDefaultFK=$parametro_general_control_session->idmonedaDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$parametro_general_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idmoneda=$parametro_general_control_session->strVisibleFK_Idmoneda;
		$this->strVisibleFK_Idpais=$parametro_general_control_session->strVisibleFK_Idpais;
		
		
		
		
		$this->id_empresaFK_Idempresa=$parametro_general_control_session->id_empresaFK_Idempresa;
		$this->id_modenaFK_Idmoneda=$parametro_general_control_session->id_modenaFK_Idmoneda;
		$this->id_paisFK_Idpais=$parametro_general_control_session->id_paisFK_Idpais;

		
		
		
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
	
	public function getparametro_generalControllerAdditional() {
		return $this->parametro_generalControllerAdditional;
	}

	public function setparametro_generalControllerAdditional($parametro_generalControllerAdditional) {
		$this->parametro_generalControllerAdditional = $parametro_generalControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getparametro_generalActual() : parametro_general {
		return $this->parametro_generalActual;
	}

	public function setparametro_generalActual(parametro_general $parametro_generalActual) {
		$this->parametro_generalActual = $parametro_generalActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidparametro_general() : int {
		return $this->idparametro_general;
	}

	public function setidparametro_general(int $idparametro_general) {
		$this->idparametro_general = $idparametro_general;
	}
	
	public function getparametro_general() : parametro_general {
		return $this->parametro_general;
	}

	public function setparametro_general(parametro_general $parametro_general) {
		$this->parametro_general = $parametro_general;
	}
		
	public function getparametro_generalLogic() : parametro_general_logic {		
		return $this->parametro_generalLogic;
	}

	public function setparametro_generalLogic(parametro_general_logic $parametro_generalLogic) {
		$this->parametro_generalLogic = $parametro_generalLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getparametro_generalsModel() {		
		try {						
			/*parametro_generalsModel.setWrappedData(parametro_generalLogic->getparametro_generals());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->parametro_generalsModel;
	}
	
	public function setparametro_generalsModel($parametro_generalsModel) {
		$this->parametro_generalsModel = $parametro_generalsModel;
	}
	
	public function getparametro_generals() : array {		
		return $this->parametro_generals;
	}
	
	public function setparametro_generals(array $parametro_generals) {
		$this->parametro_generals= $parametro_generals;
	}
	
	public function getparametro_generalsEliminados() : array {		
		return $this->parametro_generalsEliminados;
	}
	
	public function setparametro_generalsEliminados(array $parametro_generalsEliminados) {
		$this->parametro_generalsEliminados= $parametro_generalsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getparametro_generalActualFromListDataModel() {
		try {
			/*$parametro_generalClase= $this->parametro_generalsModel->getRowData();*/
			
			/*return $parametro_general;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
