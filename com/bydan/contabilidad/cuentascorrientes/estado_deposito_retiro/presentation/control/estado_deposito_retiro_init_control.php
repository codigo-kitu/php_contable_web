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

namespace com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\presentation\control;

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

use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\entity\estado_deposito_retiro;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/cuentascorrientes/estado_deposito_retiro/util/estado_deposito_retiro_carga.php');
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_carga;

use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_util;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\util\estado_deposito_retiro_param_return;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\logic\estado_deposito_retiro_logic;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\business\logic\estado_deposito_retiro_logic_add;
use com\bydan\contabilidad\cuentascorrientes\estado_deposito_retiro\presentation\session\estado_deposito_retiro_session;


//FK


//REL



/*CARGA ARCHIVOS FRAMEWORK*/
estado_deposito_retiro_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
estado_deposito_retiro_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
estado_deposito_retiro_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
estado_deposito_retiro_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*estado_deposito_retiro_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class estado_deposito_retiro_init_control extends ControllerBase {	
	
	public $estado_deposito_retiroClase=null;	
	public $estado_deposito_retirosModel=null;	
	public $estado_deposito_retirosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idestado_deposito_retiro=0;	
	public ?int $idestado_deposito_retiroActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $estado_deposito_retiroLogic=null;
	
	public $estado_deposito_retiroActual=null;	
	
	public $estado_deposito_retiro=null;
	public $estado_deposito_retiros=null;
	public $estado_deposito_retirosEliminados=array();
	public $estado_deposito_retirosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $estado_deposito_retirosLocal=array();
	public ?array $estado_deposito_retirosReporte=null;
	public ?array $estado_deposito_retirosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadestado_deposito_retiro='onload';
	public string $strTipoPaginaAuxiliarestado_deposito_retiro='none';
	public string $strTipoUsuarioAuxiliarestado_deposito_retiro='none';
		
	public $estado_deposito_retiroReturnGeneral=null;
	public $estado_deposito_retiroParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $estado_deposito_retiroModel=null;
	public $estado_deposito_retiroControllerAdditional=null;
	
	
	

	public $chequecuentacorrienteLogic=null;

	public function  getcheque_cuenta_corrienteLogic() {
		return $this->chequecuentacorrienteLogic;
	}

	public function setcheque_cuenta_corrienteLogic($chequecuentacorrienteLogic) {
		$this->chequecuentacorrienteLogic =$chequecuentacorrienteLogic;
	}


	public $retirocuentacorrienteLogic=null;

	public function  getretiro_cuenta_corrienteLogic() {
		return $this->retirocuentacorrienteLogic;
	}

	public function setretiro_cuenta_corrienteLogic($retirocuentacorrienteLogic) {
		$this->retirocuentacorrienteLogic =$retirocuentacorrienteLogic;
	}


	public $depositocuentacorrienteLogic=null;

	public function  getdeposito_cuenta_corrienteLogic() {
		return $this->depositocuentacorrienteLogic;
	}

	public function setdeposito_cuenta_corrienteLogic($depositocuentacorrienteLogic) {
		$this->depositocuentacorrienteLogic =$depositocuentacorrienteLogic;
	}
 	
	
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	
	

	
	
	
	
	
	
	
	public $strTienePermisoscheque_cuenta_corriente='none';
	public $strTienePermisosretiro_cuenta_corriente='none';
	public $strTienePermisosdeposito_cuenta_corriente='none';
	
	

	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->estado_deposito_retiroLogic==null) {
				$this->estado_deposito_retiroLogic=new estado_deposito_retiro_logic();
			}
			
		} else {
			if($this->estado_deposito_retiroLogic==null) {
				$this->estado_deposito_retiroLogic=new estado_deposito_retiro_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->estado_deposito_retiroClase==null) {
				$this->estado_deposito_retiroClase=new estado_deposito_retiro();
			}
			
			$this->estado_deposito_retiroClase->setId(0);	
				
				
			$this->estado_deposito_retiroClase->setcodigo('');	
			$this->estado_deposito_retiroClase->setnombre('');	
			
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
		$this->prepararEjecutarMantenimientoBase('estado_deposito_retiro');
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
		$this->cargarParametrosReporteBase('estado_deposito_retiro');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('estado_deposito_retiro');
	}
	
	public function actualizarControllerConReturnGeneral(estado_deposito_retiro_param_return $estado_deposito_retiroReturnGeneral) {
		if($estado_deposito_retiroReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesestado_deposito_retirosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$estado_deposito_retiroReturnGeneral->getsMensajeProceso();
		}
		
		if($estado_deposito_retiroReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$estado_deposito_retiroReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($estado_deposito_retiroReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$estado_deposito_retiroReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$estado_deposito_retiroReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($estado_deposito_retiroReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($estado_deposito_retiroReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$estado_deposito_retiroReturnGeneral->getsFuncionJs();
		}
		
		if($estado_deposito_retiroReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(estado_deposito_retiro_session $estado_deposito_retiro_session){
		$this->strStyleDivArbol=$estado_deposito_retiro_session->strStyleDivArbol;	
		$this->strStyleDivContent=$estado_deposito_retiro_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$estado_deposito_retiro_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$estado_deposito_retiro_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$estado_deposito_retiro_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$estado_deposito_retiro_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$estado_deposito_retiro_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(estado_deposito_retiro_session $estado_deposito_retiro_session){
		$estado_deposito_retiro_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$estado_deposito_retiro_session->strStyleDivHeader='display:none';			
		$estado_deposito_retiro_session->strStyleDivContent='width:93%;height:100%';	
		$estado_deposito_retiro_session->strStyleDivOpcionesBanner='display:none';	
		$estado_deposito_retiro_session->strStyleDivExpandirColapsar='display:none';	
		$estado_deposito_retiro_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(estado_deposito_retiro_control $estado_deposito_retiro_control_session){
		$this->idNuevo=$estado_deposito_retiro_control_session->idNuevo;
		$this->estado_deposito_retiroActual=$estado_deposito_retiro_control_session->estado_deposito_retiroActual;
		$this->estado_deposito_retiro=$estado_deposito_retiro_control_session->estado_deposito_retiro;
		$this->estado_deposito_retiroClase=$estado_deposito_retiro_control_session->estado_deposito_retiroClase;
		$this->estado_deposito_retiros=$estado_deposito_retiro_control_session->estado_deposito_retiros;
		$this->estado_deposito_retirosEliminados=$estado_deposito_retiro_control_session->estado_deposito_retirosEliminados;
		$this->estado_deposito_retiro=$estado_deposito_retiro_control_session->estado_deposito_retiro;
		$this->estado_deposito_retirosReporte=$estado_deposito_retiro_control_session->estado_deposito_retirosReporte;
		$this->estado_deposito_retirosSeleccionados=$estado_deposito_retiro_control_session->estado_deposito_retirosSeleccionados;
		$this->arrOrderBy=$estado_deposito_retiro_control_session->arrOrderBy;
		$this->arrOrderByRel=$estado_deposito_retiro_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$estado_deposito_retiro_control_session->arrHistoryWebs;
		$this->arrSessionBases=$estado_deposito_retiro_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadestado_deposito_retiro=$estado_deposito_retiro_control_session->strTypeOnLoadestado_deposito_retiro;
		$this->strTipoPaginaAuxiliarestado_deposito_retiro=$estado_deposito_retiro_control_session->strTipoPaginaAuxiliarestado_deposito_retiro;
		$this->strTipoUsuarioAuxiliarestado_deposito_retiro=$estado_deposito_retiro_control_session->strTipoUsuarioAuxiliarestado_deposito_retiro;	
		
		$this->bitEsPopup=$estado_deposito_retiro_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$estado_deposito_retiro_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$estado_deposito_retiro_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$estado_deposito_retiro_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$estado_deposito_retiro_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$estado_deposito_retiro_control_session->strSufijo;
		$this->bitEsRelaciones=$estado_deposito_retiro_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$estado_deposito_retiro_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$estado_deposito_retiro_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$estado_deposito_retiro_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$estado_deposito_retiro_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$estado_deposito_retiro_control_session->strTituloTabla;
		$this->strTituloPathPagina=$estado_deposito_retiro_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$estado_deposito_retiro_control_session->strTituloPathElementoActual;
		
		if($this->estado_deposito_retiroLogic==null) {			
			$this->estado_deposito_retiroLogic=new estado_deposito_retiro_logic();
		}
		
		
		if($this->estado_deposito_retiroClase==null) {
			$this->estado_deposito_retiroClase=new estado_deposito_retiro();	
		}
		
		$this->estado_deposito_retiroLogic->setestado_deposito_retiro($this->estado_deposito_retiroClase);
		
		
		if($this->estado_deposito_retiros==null) {
			$this->estado_deposito_retiros=array();	
		}
		
		$this->estado_deposito_retiroLogic->setestado_deposito_retiros($this->estado_deposito_retiros);
		
		
		$this->strTipoView=$estado_deposito_retiro_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$estado_deposito_retiro_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$estado_deposito_retiro_control_session->datosCliente;
		$this->strAccionBusqueda=$estado_deposito_retiro_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$estado_deposito_retiro_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$estado_deposito_retiro_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$estado_deposito_retiro_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$estado_deposito_retiro_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$estado_deposito_retiro_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$estado_deposito_retiro_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$estado_deposito_retiro_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$estado_deposito_retiro_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$estado_deposito_retiro_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$estado_deposito_retiro_control_session->strTipoPaginacion;
		$this->strTipoAccion=$estado_deposito_retiro_control_session->strTipoAccion;
		$this->tiposReportes=$estado_deposito_retiro_control_session->tiposReportes;
		$this->tiposReporte=$estado_deposito_retiro_control_session->tiposReporte;
		$this->tiposAcciones=$estado_deposito_retiro_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$estado_deposito_retiro_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$estado_deposito_retiro_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$estado_deposito_retiro_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$estado_deposito_retiro_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$estado_deposito_retiro_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$estado_deposito_retiro_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$estado_deposito_retiro_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$estado_deposito_retiro_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$estado_deposito_retiro_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$estado_deposito_retiro_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$estado_deposito_retiro_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$estado_deposito_retiro_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$estado_deposito_retiro_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$estado_deposito_retiro_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$estado_deposito_retiro_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$estado_deposito_retiro_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$estado_deposito_retiro_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$estado_deposito_retiro_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$estado_deposito_retiro_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$estado_deposito_retiro_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$estado_deposito_retiro_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$estado_deposito_retiro_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$estado_deposito_retiro_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$estado_deposito_retiro_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$estado_deposito_retiro_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$estado_deposito_retiro_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$estado_deposito_retiro_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$estado_deposito_retiro_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$estado_deposito_retiro_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$estado_deposito_retiro_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$estado_deposito_retiro_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$estado_deposito_retiro_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$estado_deposito_retiro_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$estado_deposito_retiro_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$estado_deposito_retiro_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$estado_deposito_retiro_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$estado_deposito_retiro_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$estado_deposito_retiro_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$estado_deposito_retiro_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$estado_deposito_retiro_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$estado_deposito_retiro_control_session->resumenUsuarioActual;	
		$this->moduloActual=$estado_deposito_retiro_control_session->moduloActual;	
		$this->opcionActual=$estado_deposito_retiro_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$estado_deposito_retiro_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$estado_deposito_retiro_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$estado_deposito_retiro_session=unserialize($this->Session->read(estado_deposito_retiro_util::$STR_SESSION_NAME));
				
		if($estado_deposito_retiro_session==null) {
			$estado_deposito_retiro_session=new estado_deposito_retiro_session();
		}
		
		$this->strStyleDivArbol=$estado_deposito_retiro_session->strStyleDivArbol;	
		$this->strStyleDivContent=$estado_deposito_retiro_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$estado_deposito_retiro_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$estado_deposito_retiro_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$estado_deposito_retiro_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$estado_deposito_retiro_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$estado_deposito_retiro_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$estado_deposito_retiro_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$estado_deposito_retiro_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$estado_deposito_retiro_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$estado_deposito_retiro_session->strRecargarFkQuery;
		*/
		
		$this->strMensajecodigo=$estado_deposito_retiro_control_session->strMensajecodigo;
		$this->strMensajenombre=$estado_deposito_retiro_control_session->strMensajenombre;
			
		
		
		
		
		
		$this->strTienePermisoscheque_cuenta_corriente=$estado_deposito_retiro_control_session->strTienePermisoscheque_cuenta_corriente;
		$this->strTienePermisosretiro_cuenta_corriente=$estado_deposito_retiro_control_session->strTienePermisosretiro_cuenta_corriente;
		$this->strTienePermisosdeposito_cuenta_corriente=$estado_deposito_retiro_control_session->strTienePermisosdeposito_cuenta_corriente;
		
		

		
		
		
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
	
	public function getestado_deposito_retiroControllerAdditional() {
		return $this->estado_deposito_retiroControllerAdditional;
	}

	public function setestado_deposito_retiroControllerAdditional($estado_deposito_retiroControllerAdditional) {
		$this->estado_deposito_retiroControllerAdditional = $estado_deposito_retiroControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getestado_deposito_retiroActual() : estado_deposito_retiro {
		return $this->estado_deposito_retiroActual;
	}

	public function setestado_deposito_retiroActual(estado_deposito_retiro $estado_deposito_retiroActual) {
		$this->estado_deposito_retiroActual = $estado_deposito_retiroActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidestado_deposito_retiro() : int {
		return $this->idestado_deposito_retiro;
	}

	public function setidestado_deposito_retiro(int $idestado_deposito_retiro) {
		$this->idestado_deposito_retiro = $idestado_deposito_retiro;
	}
	
	public function getestado_deposito_retiro() : estado_deposito_retiro {
		return $this->estado_deposito_retiro;
	}

	public function setestado_deposito_retiro(estado_deposito_retiro $estado_deposito_retiro) {
		$this->estado_deposito_retiro = $estado_deposito_retiro;
	}
		
	public function getestado_deposito_retiroLogic() : estado_deposito_retiro_logic {		
		return $this->estado_deposito_retiroLogic;
	}

	public function setestado_deposito_retiroLogic(estado_deposito_retiro_logic $estado_deposito_retiroLogic) {
		$this->estado_deposito_retiroLogic = $estado_deposito_retiroLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getestado_deposito_retirosModel() {		
		try {						
			/*estado_deposito_retirosModel.setWrappedData(estado_deposito_retiroLogic->getestado_deposito_retiros());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->estado_deposito_retirosModel;
	}
	
	public function setestado_deposito_retirosModel($estado_deposito_retirosModel) {
		$this->estado_deposito_retirosModel = $estado_deposito_retirosModel;
	}
	
	public function getestado_deposito_retiros() : array {		
		return $this->estado_deposito_retiros;
	}
	
	public function setestado_deposito_retiros(array $estado_deposito_retiros) {
		$this->estado_deposito_retiros= $estado_deposito_retiros;
	}
	
	public function getestado_deposito_retirosEliminados() : array {		
		return $this->estado_deposito_retirosEliminados;
	}
	
	public function setestado_deposito_retirosEliminados(array $estado_deposito_retirosEliminados) {
		$this->estado_deposito_retirosEliminados= $estado_deposito_retirosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getestado_deposito_retiroActualFromListDataModel() {
		try {
			/*$estado_deposito_retiroClase= $this->estado_deposito_retirosModel->getRowData();*/
			
			/*return $estado_deposito_retiro;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
