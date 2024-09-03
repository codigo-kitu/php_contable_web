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

namespace com\bydan\contabilidad\cuentascorrientes\banco\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\banco\business\entity\banco;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/banco/util/banco_carga.php');
use com\bydan\contabilidad\cuentascorrientes\banco\util\banco_carga;

use com\bydan\contabilidad\cuentascorrientes\banco\util\banco_util;
use com\bydan\contabilidad\cuentascorrientes\banco\util\banco_param_return;
use com\bydan\contabilidad\cuentascorrientes\banco\business\logic\banco_logic;
use com\bydan\contabilidad\cuentascorrientes\banco\presentation\session\banco_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_carga;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\util\cuenta_corriente_util;
use com\bydan\contabilidad\cuentascorrientes\cuenta_corriente\presentation\session\cuenta_corriente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
banco_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
banco_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
banco_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
banco_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*banco_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class banco_init_control extends ControllerBase {	
	
	public $bancoClase=null;	
	public $bancosModel=null;	
	public $bancosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idbanco=0;	
	public ?int $idbancoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $bancoLogic=null;
	
	public $bancoActual=null;	
	
	public $banco=null;
	public $bancos=null;
	public $bancosEliminados=array();
	public $bancosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $bancosLocal=array();
	public ?array $bancosReporte=null;
	public ?array $bancosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadbanco='onload';
	public string $strTipoPaginaAuxiliarbanco='none';
	public string $strTipoUsuarioAuxiliarbanco='none';
		
	public $bancoReturnGeneral=null;
	public $bancoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $bancoModel=null;
	public $bancoControllerAdditional=null;
	
	
	

	public $cuentacorrienteLogic=null;

	public function  getcuenta_corrienteLogic() {
		return $this->cuentacorrienteLogic;
	}

	public function setcuenta_corrienteLogic($cuentacorrienteLogic) {
		$this->cuentacorrienteLogic =$cuentacorrienteLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	
	
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

	
	
	
	
	
	
	public $strTienePermisoscuenta_corriente='none';
	
	
	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->bancoLogic==null) {
				$this->bancoLogic=new banco_logic();
			}
			
		} else {
			if($this->bancoLogic==null) {
				$this->bancoLogic=new banco_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->bancoClase==null) {
				$this->bancoClase=new banco();
			}
			
			$this->bancoClase->setId(0);	
				
				
			$this->bancoClase->setid_empresa(-1);	
			$this->bancoClase->setcodigo('');	
			$this->bancoClase->setnombre('');	
			
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
		$this->prepararEjecutarMantenimientoBase('banco');
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
		$this->cargarParametrosReporteBase('banco');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('banco');
	}
	
	public function actualizarControllerConReturnGeneral(banco_param_return $bancoReturnGeneral) {
		if($bancoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesbancosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$bancoReturnGeneral->getsMensajeProceso();
		}
		
		if($bancoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$bancoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($bancoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$bancoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$bancoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($bancoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($bancoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$bancoReturnGeneral->getsFuncionJs();
		}
		
		if($bancoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(banco_session $banco_session){
		$this->strStyleDivArbol=$banco_session->strStyleDivArbol;	
		$this->strStyleDivContent=$banco_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$banco_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$banco_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$banco_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$banco_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$banco_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(banco_session $banco_session){
		$banco_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$banco_session->strStyleDivHeader='display:none';			
		$banco_session->strStyleDivContent='width:93%;height:100%';	
		$banco_session->strStyleDivOpcionesBanner='display:none';	
		$banco_session->strStyleDivExpandirColapsar='display:none';	
		$banco_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(banco_control $banco_control_session){
		$this->idNuevo=$banco_control_session->idNuevo;
		$this->bancoActual=$banco_control_session->bancoActual;
		$this->banco=$banco_control_session->banco;
		$this->bancoClase=$banco_control_session->bancoClase;
		$this->bancos=$banco_control_session->bancos;
		$this->bancosEliminados=$banco_control_session->bancosEliminados;
		$this->banco=$banco_control_session->banco;
		$this->bancosReporte=$banco_control_session->bancosReporte;
		$this->bancosSeleccionados=$banco_control_session->bancosSeleccionados;
		$this->arrOrderBy=$banco_control_session->arrOrderBy;
		$this->arrOrderByRel=$banco_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$banco_control_session->arrHistoryWebs;
		$this->arrSessionBases=$banco_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadbanco=$banco_control_session->strTypeOnLoadbanco;
		$this->strTipoPaginaAuxiliarbanco=$banco_control_session->strTipoPaginaAuxiliarbanco;
		$this->strTipoUsuarioAuxiliarbanco=$banco_control_session->strTipoUsuarioAuxiliarbanco;	
		
		$this->bitEsPopup=$banco_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$banco_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$banco_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$banco_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$banco_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$banco_control_session->strSufijo;
		$this->bitEsRelaciones=$banco_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$banco_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$banco_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$banco_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$banco_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$banco_control_session->strTituloTabla;
		$this->strTituloPathPagina=$banco_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$banco_control_session->strTituloPathElementoActual;
		
		if($this->bancoLogic==null) {			
			$this->bancoLogic=new banco_logic();
		}
		
		
		if($this->bancoClase==null) {
			$this->bancoClase=new banco();	
		}
		
		$this->bancoLogic->setbanco($this->bancoClase);
		
		
		if($this->bancos==null) {
			$this->bancos=array();	
		}
		
		$this->bancoLogic->setbancos($this->bancos);
		
		
		$this->strTipoView=$banco_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$banco_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$banco_control_session->datosCliente;
		$this->strAccionBusqueda=$banco_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$banco_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$banco_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$banco_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$banco_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$banco_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$banco_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$banco_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$banco_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$banco_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$banco_control_session->strTipoPaginacion;
		$this->strTipoAccion=$banco_control_session->strTipoAccion;
		$this->tiposReportes=$banco_control_session->tiposReportes;
		$this->tiposReporte=$banco_control_session->tiposReporte;
		$this->tiposAcciones=$banco_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$banco_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$banco_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$banco_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$banco_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$banco_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$banco_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$banco_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$banco_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$banco_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$banco_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$banco_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$banco_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$banco_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$banco_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$banco_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$banco_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$banco_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$banco_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$banco_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$banco_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$banco_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$banco_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$banco_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$banco_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$banco_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$banco_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$banco_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$banco_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$banco_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$banco_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$banco_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$banco_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$banco_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$banco_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$banco_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$banco_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$banco_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$banco_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$banco_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$banco_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$banco_control_session->resumenUsuarioActual;	
		$this->moduloActual=$banco_control_session->moduloActual;	
		$this->opcionActual=$banco_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$banco_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$banco_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$banco_session=unserialize($this->Session->read(banco_util::$STR_SESSION_NAME));
				
		if($banco_session==null) {
			$banco_session=new banco_session();
		}
		
		$this->strStyleDivArbol=$banco_session->strStyleDivArbol;	
		$this->strStyleDivContent=$banco_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$banco_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$banco_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$banco_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$banco_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$banco_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$banco_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$banco_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$banco_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$banco_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$banco_control_session->strMensajeid_empresa;
		$this->strMensajecodigo=$banco_control_session->strMensajecodigo;
		$this->strMensajenombre=$banco_control_session->strMensajenombre;
			
		
		$this->empresasFK=$banco_control_session->empresasFK;
		$this->idempresaDefaultFK=$banco_control_session->idempresaDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$banco_control_session->strVisibleFK_Idempresa;
		
		
		$this->strTienePermisoscuenta_corriente=$banco_control_session->strTienePermisoscuenta_corriente;
		
		
		$this->id_empresaFK_Idempresa=$banco_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getbancoControllerAdditional() {
		return $this->bancoControllerAdditional;
	}

	public function setbancoControllerAdditional($bancoControllerAdditional) {
		$this->bancoControllerAdditional = $bancoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getbancoActual() : banco {
		return $this->bancoActual;
	}

	public function setbancoActual(banco $bancoActual) {
		$this->bancoActual = $bancoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidbanco() : int {
		return $this->idbanco;
	}

	public function setidbanco(int $idbanco) {
		$this->idbanco = $idbanco;
	}
	
	public function getbanco() : banco {
		return $this->banco;
	}

	public function setbanco(banco $banco) {
		$this->banco = $banco;
	}
		
	public function getbancoLogic() : banco_logic {		
		return $this->bancoLogic;
	}

	public function setbancoLogic(banco_logic $bancoLogic) {
		$this->bancoLogic = $bancoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getbancosModel() {		
		try {						
			/*bancosModel.setWrappedData(bancoLogic->getbancos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->bancosModel;
	}
	
	public function setbancosModel($bancosModel) {
		$this->bancosModel = $bancosModel;
	}
	
	public function getbancos() : array {		
		return $this->bancos;
	}
	
	public function setbancos(array $bancos) {
		$this->bancos= $bancos;
	}
	
	public function getbancosEliminados() : array {		
		return $this->bancosEliminados;
	}
	
	public function setbancosEliminados(array $bancosEliminados) {
		$this->bancosEliminados= $bancosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getbancoActualFromListDataModel() {
		try {
			/*$bancoClase= $this->bancosModel->getRowData();*/
			
			/*return $banco;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
