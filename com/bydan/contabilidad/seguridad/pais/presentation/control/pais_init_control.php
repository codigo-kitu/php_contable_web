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

namespace com\bydan\contabilidad\seguridad\pais\presentation\control;

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

use com\bydan\contabilidad\seguridad\pais\business\entity\pais;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/seguridad/pais/util/pais_carga.php');
use com\bydan\contabilidad\seguridad\pais\util\pais_carga;

use com\bydan\contabilidad\seguridad\pais\util\pais_util;
use com\bydan\contabilidad\seguridad\pais\util\pais_param_return;
use com\bydan\contabilidad\seguridad\pais\business\logic\pais_logic;
use com\bydan\contabilidad\seguridad\pais\presentation\session\pais_session;


//FK


//REL


use com\bydan\contabilidad\general\parametro_general\util\parametro_general_carga;
use com\bydan\contabilidad\general\parametro_general\util\parametro_general_util;
use com\bydan\contabilidad\general\parametro_general\presentation\session\parametro_general_session;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;

use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_carga;
use com\bydan\contabilidad\seguridad\dato_general_usuario\util\dato_general_usuario_util;
use com\bydan\contabilidad\seguridad\dato_general_usuario\presentation\session\dato_general_usuario_session;

use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;
use com\bydan\contabilidad\general\sucursal\presentation\session\sucursal_session;

use com\bydan\contabilidad\seguridad\provincia\util\provincia_carga;
use com\bydan\contabilidad\seguridad\provincia\util\provincia_util;
use com\bydan\contabilidad\seguridad\provincia\presentation\session\provincia_session;

use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;
use com\bydan\contabilidad\general\empresa\presentation\session\empresa_session;


/*CARGA ARCHIVOS FRAMEWORK*/
pais_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
pais_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
pais_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
pais_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*pais_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class pais_init_control extends ControllerBase {	
	
	public $paisClase=null;	
	public $paissModel=null;	
	public $paissListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idpais=0;	
	public ?int $idpaisActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $paisLogic=null;
	
	public $paisActual=null;	
	
	public $pais=null;
	public $paiss=null;
	public $paissEliminados=array();
	public $paissAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $paissLocal=array();
	public ?array $paissReporte=null;
	public ?array $paissSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadpais='onload';
	public string $strTipoPaginaAuxiliarpais='none';
	public string $strTipoUsuarioAuxiliarpais='none';
		
	public $paisReturnGeneral=null;
	public $paisParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $paisModel=null;
	public $paisControllerAdditional=null;
	
	
	

	public $parametrogeneralLogic=null;

	public function  getparametro_generalLogic() {
		return $this->parametrogeneralLogic;
	}

	public function setparametro_generalLogic($parametrogeneralLogic) {
		$this->parametrogeneralLogic =$parametrogeneralLogic;
	}


	public $clienteLogic=null;

	public function  getclienteLogic() {
		return $this->clienteLogic;
	}

	public function setclienteLogic($clienteLogic) {
		$this->clienteLogic =$clienteLogic;
	}


	public $proveedorLogic=null;

	public function  getproveedorLogic() {
		return $this->proveedorLogic;
	}

	public function setproveedorLogic($proveedorLogic) {
		$this->proveedorLogic =$proveedorLogic;
	}


	public $datogeneralusuarioLogic=null;

	public function  getdato_general_usuarioLogic() {
		return $this->datogeneralusuarioLogic;
	}

	public function setdato_general_usuarioLogic($datogeneralusuarioLogic) {
		$this->datogeneralusuarioLogic =$datogeneralusuarioLogic;
	}


	public $sucursalLogic=null;

	public function  getsucursalLogic() {
		return $this->sucursalLogic;
	}

	public function setsucursalLogic($sucursalLogic) {
		$this->sucursalLogic =$sucursalLogic;
	}


	public $provinciaLogic=null;

	public function  getprovinciaLogic() {
		return $this->provinciaLogic;
	}

	public function setprovinciaLogic($provinciaLogic) {
		$this->provinciaLogic =$provinciaLogic;
	}


	public $empresaLogic=null;

	public function  getempresaLogic() {
		return $this->empresaLogic;
	}

	public function setempresaLogic($empresaLogic) {
		$this->empresaLogic =$empresaLogic;
	}
 	
	
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajeiva='';
	
	
	public string $strVisibleBusquedaPorCodigo='display:table-row';
	public string $strVisibleBusquedaPorNombre='display:table-row';

	
	
	
	
	
	
	
	public $strTienePermisosparametro_general='none';
	public $strTienePermisoscliente='none';
	public $strTienePermisosproveedor='none';
	public $strTienePermisosdato_general_usuario='none';
	public $strTienePermisossucursal='none';
	public $strTienePermisosprovincia='none';
	public $strTienePermisosempresa='none';
	
	
	public  $codigoBusquedaPorCodigo=null;

	public  $nombreBusquedaPorNombre=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->paisLogic==null) {
				$this->paisLogic=new pais_logic();
			}
			
		} else {
			if($this->paisLogic==null) {
				$this->paisLogic=new pais_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->paisClase==null) {
				$this->paisClase=new pais();
			}
			
			$this->paisClase->setId(0);	
				
				
			$this->paisClase->setcodigo('');	
			$this->paisClase->setnombre('');	
			$this->paisClase->setiva(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('pais');
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
		$this->cargarParametrosReporteBase('pais');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('pais');
	}
	
	public function actualizarControllerConReturnGeneral(pais_param_return $paisReturnGeneral) {
		if($paisReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajespaissAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$paisReturnGeneral->getsMensajeProceso();
		}
		
		if($paisReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$paisReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($paisReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$paisReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$paisReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($paisReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($paisReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$paisReturnGeneral->getsFuncionJs();
		}
		
		if($paisReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(pais_session $pais_session){
		$this->strStyleDivArbol=$pais_session->strStyleDivArbol;	
		$this->strStyleDivContent=$pais_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$pais_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$pais_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$pais_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$pais_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$pais_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(pais_session $pais_session){
		$pais_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$pais_session->strStyleDivHeader='display:none';			
		$pais_session->strStyleDivContent='width:93%;height:100%';	
		$pais_session->strStyleDivOpcionesBanner='display:none';	
		$pais_session->strStyleDivExpandirColapsar='display:none';	
		$pais_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(pais_control $pais_control_session){
		$this->idNuevo=$pais_control_session->idNuevo;
		$this->paisActual=$pais_control_session->paisActual;
		$this->pais=$pais_control_session->pais;
		$this->paisClase=$pais_control_session->paisClase;
		$this->paiss=$pais_control_session->paiss;
		$this->paissEliminados=$pais_control_session->paissEliminados;
		$this->pais=$pais_control_session->pais;
		$this->paissReporte=$pais_control_session->paissReporte;
		$this->paissSeleccionados=$pais_control_session->paissSeleccionados;
		$this->arrOrderBy=$pais_control_session->arrOrderBy;
		$this->arrOrderByRel=$pais_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$pais_control_session->arrHistoryWebs;
		$this->arrSessionBases=$pais_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadpais=$pais_control_session->strTypeOnLoadpais;
		$this->strTipoPaginaAuxiliarpais=$pais_control_session->strTipoPaginaAuxiliarpais;
		$this->strTipoUsuarioAuxiliarpais=$pais_control_session->strTipoUsuarioAuxiliarpais;	
		
		$this->bitEsPopup=$pais_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$pais_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$pais_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$pais_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$pais_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$pais_control_session->strSufijo;
		$this->bitEsRelaciones=$pais_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$pais_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$pais_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$pais_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$pais_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$pais_control_session->strTituloTabla;
		$this->strTituloPathPagina=$pais_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$pais_control_session->strTituloPathElementoActual;
		
		if($this->paisLogic==null) {			
			$this->paisLogic=new pais_logic();
		}
		
		
		if($this->paisClase==null) {
			$this->paisClase=new pais();	
		}
		
		$this->paisLogic->setpais($this->paisClase);
		
		
		if($this->paiss==null) {
			$this->paiss=array();	
		}
		
		$this->paisLogic->setpaiss($this->paiss);
		
		
		$this->strTipoView=$pais_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$pais_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$pais_control_session->datosCliente;
		$this->strAccionBusqueda=$pais_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$pais_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$pais_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$pais_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$pais_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$pais_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$pais_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$pais_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$pais_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$pais_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$pais_control_session->strTipoPaginacion;
		$this->strTipoAccion=$pais_control_session->strTipoAccion;
		$this->tiposReportes=$pais_control_session->tiposReportes;
		$this->tiposReporte=$pais_control_session->tiposReporte;
		$this->tiposAcciones=$pais_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$pais_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$pais_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$pais_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$pais_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$pais_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$pais_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$pais_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$pais_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$pais_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$pais_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$pais_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$pais_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$pais_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$pais_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$pais_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$pais_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$pais_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$pais_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$pais_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$pais_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$pais_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$pais_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$pais_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$pais_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$pais_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$pais_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$pais_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$pais_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$pais_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$pais_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$pais_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$pais_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$pais_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$pais_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$pais_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$pais_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$pais_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$pais_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$pais_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$pais_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$pais_control_session->resumenUsuarioActual;	
		$this->moduloActual=$pais_control_session->moduloActual;	
		$this->opcionActual=$pais_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$pais_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$pais_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$pais_session=unserialize($this->Session->read(pais_util::$STR_SESSION_NAME));
				
		if($pais_session==null) {
			$pais_session=new pais_session();
		}
		
		$this->strStyleDivArbol=$pais_session->strStyleDivArbol;	
		$this->strStyleDivContent=$pais_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$pais_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$pais_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$pais_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$pais_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$pais_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$pais_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$pais_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$pais_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$pais_session->strRecargarFkQuery;
		*/
		
		$this->strMensajecodigo=$pais_control_session->strMensajecodigo;
		$this->strMensajenombre=$pais_control_session->strMensajenombre;
		$this->strMensajeiva=$pais_control_session->strMensajeiva;
			
		
		
		
		$this->strVisibleBusquedaPorCodigo=$pais_control_session->strVisibleBusquedaPorCodigo;
		$this->strVisibleBusquedaPorNombre=$pais_control_session->strVisibleBusquedaPorNombre;
		
		
		$this->strTienePermisosparametro_general=$pais_control_session->strTienePermisosparametro_general;
		$this->strTienePermisoscliente=$pais_control_session->strTienePermisoscliente;
		$this->strTienePermisosproveedor=$pais_control_session->strTienePermisosproveedor;
		$this->strTienePermisosdato_general_usuario=$pais_control_session->strTienePermisosdato_general_usuario;
		$this->strTienePermisossucursal=$pais_control_session->strTienePermisossucursal;
		$this->strTienePermisosprovincia=$pais_control_session->strTienePermisosprovincia;
		$this->strTienePermisosempresa=$pais_control_session->strTienePermisosempresa;
		
		
		$this->codigoBusquedaPorCodigo=$pais_control_session->codigoBusquedaPorCodigo;
		$this->nombreBusquedaPorNombre=$pais_control_session->nombreBusquedaPorNombre;

		
		
		
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
	
	public function getpaisControllerAdditional() {
		return $this->paisControllerAdditional;
	}

	public function setpaisControllerAdditional($paisControllerAdditional) {
		$this->paisControllerAdditional = $paisControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getpaisActual() : pais {
		return $this->paisActual;
	}

	public function setpaisActual(pais $paisActual) {
		$this->paisActual = $paisActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidpais() : int {
		return $this->idpais;
	}

	public function setidpais(int $idpais) {
		$this->idpais = $idpais;
	}
	
	public function getpais() : pais {
		return $this->pais;
	}

	public function setpais(pais $pais) {
		$this->pais = $pais;
	}
		
	public function getpaisLogic() : pais_logic {		
		return $this->paisLogic;
	}

	public function setpaisLogic(pais_logic $paisLogic) {
		$this->paisLogic = $paisLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getpaissModel() {		
		try {						
			/*paissModel.setWrappedData(paisLogic->getpaiss());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->paissModel;
	}
	
	public function setpaissModel($paissModel) {
		$this->paissModel = $paissModel;
	}
	
	public function getpaiss() : array {		
		return $this->paiss;
	}
	
	public function setpaiss(array $paiss) {
		$this->paiss= $paiss;
	}
	
	public function getpaissEliminados() : array {		
		return $this->paissEliminados;
	}
	
	public function setpaissEliminados(array $paissEliminados) {
		$this->paissEliminados= $paissEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getpaisActualFromListDataModel() {
		try {
			/*$paisClase= $this->paissModel->getRowData();*/
			
			/*return $pais;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
