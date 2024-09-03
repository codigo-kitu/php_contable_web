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

namespace com\bydan\contabilidad\facturacion\retencion_ica\presentation\control;

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

use com\bydan\contabilidad\facturacion\retencion_ica\business\entity\retencion_ica;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/retencion_ica/util/retencion_ica_carga.php');
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_carga;

use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_util;
use com\bydan\contabilidad\facturacion\retencion_ica\util\retencion_ica_param_return;
use com\bydan\contabilidad\facturacion\retencion_ica\business\logic\retencion_ica_logic;
use com\bydan\contabilidad\facturacion\retencion_ica\presentation\session\retencion_ica_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;


/*CARGA ARCHIVOS FRAMEWORK*/
retencion_ica_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
retencion_ica_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
retencion_ica_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
retencion_ica_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*retencion_ica_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class retencion_ica_init_control extends ControllerBase {	
	
	public $retencion_icaClase=null;	
	public $retencion_icasModel=null;	
	public $retencion_icasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idretencion_ica=0;	
	public ?int $idretencion_icaActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $retencion_icaLogic=null;
	
	public $retencion_icaActual=null;	
	
	public $retencion_ica=null;
	public $retencion_icas=null;
	public $retencion_icasEliminados=array();
	public $retencion_icasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $retencion_icasLocal=array();
	public ?array $retencion_icasReporte=null;
	public ?array $retencion_icasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadretencion_ica='onload';
	public string $strTipoPaginaAuxiliarretencion_ica='none';
	public string $strTipoUsuarioAuxiliarretencion_ica='none';
		
	public $retencion_icaReturnGeneral=null;
	public $retencion_icaParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $retencion_icaModel=null;
	public $retencion_icaControllerAdditional=null;
	
	
	

	public $proveedorLogic=null;

	public function  getproveedorLogic() {
		return $this->proveedorLogic;
	}

	public function setproveedorLogic($proveedorLogic) {
		$this->proveedorLogic =$proveedorLogic;
	}


	public $clienteLogic=null;

	public function  getclienteLogic() {
		return $this->clienteLogic;
	}

	public function setclienteLogic($clienteLogic) {
		$this->clienteLogic =$clienteLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajecodigo='';
	public string $strMensajedescripcion='';
	public string $strMensajevalor='';
	public string $strMensajevalor_base='';
	public string $strMensajepredeterminado='';
	public string $strMensajeid_cuenta_ventas='';
	public string $strMensajeid_cuenta_compras='';
	public string $strMensajecuenta_contable_ventas='';
	public string $strMensajecuenta_contable_compras='';
	
	
	public string $strVisibleFK_Idcuenta_compras='display:table-row';
	public string $strVisibleFK_Idcuenta_ventas='display:table-row';
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

	public array $cuenta_ventassFK=array();

	public function getcuenta_ventassFK():array {
		return $this->cuenta_ventassFK;
	}

	public function setcuenta_ventassFK(array $cuenta_ventassFK) {
		$this->cuenta_ventassFK = $cuenta_ventassFK;
	}

	public int $idcuenta_ventasDefaultFK=-1;

	public function getIdcuenta_ventasDefaultFK():int {
		return $this->idcuenta_ventasDefaultFK;
	}

	public function setIdcuenta_ventasDefaultFK(int $idcuenta_ventasDefaultFK) {
		$this->idcuenta_ventasDefaultFK = $idcuenta_ventasDefaultFK;
	}

	public array $cuenta_comprassFK=array();

	public function getcuenta_comprassFK():array {
		return $this->cuenta_comprassFK;
	}

	public function setcuenta_comprassFK(array $cuenta_comprassFK) {
		$this->cuenta_comprassFK = $cuenta_comprassFK;
	}

	public int $idcuenta_comprasDefaultFK=-1;

	public function getIdcuenta_comprasDefaultFK():int {
		return $this->idcuenta_comprasDefaultFK;
	}

	public function setIdcuenta_comprasDefaultFK(int $idcuenta_comprasDefaultFK) {
		$this->idcuenta_comprasDefaultFK = $idcuenta_comprasDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosproveedor='none';
	public $strTienePermisoscliente='none';
	
	
	public  $id_cuenta_comprasFK_Idcuenta_compras=null;

	public  $id_cuenta_ventasFK_Idcuenta_ventas=null;

	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->retencion_icaLogic==null) {
				$this->retencion_icaLogic=new retencion_ica_logic();
			}
			
		} else {
			if($this->retencion_icaLogic==null) {
				$this->retencion_icaLogic=new retencion_ica_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->retencion_icaClase==null) {
				$this->retencion_icaClase=new retencion_ica();
			}
			
			$this->retencion_icaClase->setId(0);	
				
				
			$this->retencion_icaClase->setid_empresa(-1);	
			$this->retencion_icaClase->setcodigo('');	
			$this->retencion_icaClase->setdescripcion('');	
			$this->retencion_icaClase->setvalor(0.0);	
			$this->retencion_icaClase->setvalor_base(0.0);	
			$this->retencion_icaClase->setpredeterminado(false);	
			$this->retencion_icaClase->setid_cuenta_ventas(null);	
			$this->retencion_icaClase->setid_cuenta_compras(null);	
			$this->retencion_icaClase->setcuenta_contable_ventas('');	
			$this->retencion_icaClase->setcuenta_contable_compras('');	
			
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
		$this->prepararEjecutarMantenimientoBase('retencion_ica');
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
		$this->cargarParametrosReporteBase('retencion_ica');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('retencion_ica');
	}
	
	public function actualizarControllerConReturnGeneral(retencion_ica_param_return $retencion_icaReturnGeneral) {
		if($retencion_icaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesretencion_icasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$retencion_icaReturnGeneral->getsMensajeProceso();
		}
		
		if($retencion_icaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$retencion_icaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($retencion_icaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$retencion_icaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$retencion_icaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($retencion_icaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($retencion_icaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$retencion_icaReturnGeneral->getsFuncionJs();
		}
		
		if($retencion_icaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(retencion_ica_session $retencion_ica_session){
		$this->strStyleDivArbol=$retencion_ica_session->strStyleDivArbol;	
		$this->strStyleDivContent=$retencion_ica_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$retencion_ica_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$retencion_ica_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$retencion_ica_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$retencion_ica_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$retencion_ica_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(retencion_ica_session $retencion_ica_session){
		$retencion_ica_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$retencion_ica_session->strStyleDivHeader='display:none';			
		$retencion_ica_session->strStyleDivContent='width:93%;height:100%';	
		$retencion_ica_session->strStyleDivOpcionesBanner='display:none';	
		$retencion_ica_session->strStyleDivExpandirColapsar='display:none';	
		$retencion_ica_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(retencion_ica_control $retencion_ica_control_session){
		$this->idNuevo=$retencion_ica_control_session->idNuevo;
		$this->retencion_icaActual=$retencion_ica_control_session->retencion_icaActual;
		$this->retencion_ica=$retencion_ica_control_session->retencion_ica;
		$this->retencion_icaClase=$retencion_ica_control_session->retencion_icaClase;
		$this->retencion_icas=$retencion_ica_control_session->retencion_icas;
		$this->retencion_icasEliminados=$retencion_ica_control_session->retencion_icasEliminados;
		$this->retencion_ica=$retencion_ica_control_session->retencion_ica;
		$this->retencion_icasReporte=$retencion_ica_control_session->retencion_icasReporte;
		$this->retencion_icasSeleccionados=$retencion_ica_control_session->retencion_icasSeleccionados;
		$this->arrOrderBy=$retencion_ica_control_session->arrOrderBy;
		$this->arrOrderByRel=$retencion_ica_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$retencion_ica_control_session->arrHistoryWebs;
		$this->arrSessionBases=$retencion_ica_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadretencion_ica=$retencion_ica_control_session->strTypeOnLoadretencion_ica;
		$this->strTipoPaginaAuxiliarretencion_ica=$retencion_ica_control_session->strTipoPaginaAuxiliarretencion_ica;
		$this->strTipoUsuarioAuxiliarretencion_ica=$retencion_ica_control_session->strTipoUsuarioAuxiliarretencion_ica;	
		
		$this->bitEsPopup=$retencion_ica_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$retencion_ica_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$retencion_ica_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$retencion_ica_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$retencion_ica_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$retencion_ica_control_session->strSufijo;
		$this->bitEsRelaciones=$retencion_ica_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$retencion_ica_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$retencion_ica_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$retencion_ica_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$retencion_ica_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$retencion_ica_control_session->strTituloTabla;
		$this->strTituloPathPagina=$retencion_ica_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$retencion_ica_control_session->strTituloPathElementoActual;
		
		if($this->retencion_icaLogic==null) {			
			$this->retencion_icaLogic=new retencion_ica_logic();
		}
		
		
		if($this->retencion_icaClase==null) {
			$this->retencion_icaClase=new retencion_ica();	
		}
		
		$this->retencion_icaLogic->setretencion_ica($this->retencion_icaClase);
		
		
		if($this->retencion_icas==null) {
			$this->retencion_icas=array();	
		}
		
		$this->retencion_icaLogic->setretencion_icas($this->retencion_icas);
		
		
		$this->strTipoView=$retencion_ica_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$retencion_ica_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$retencion_ica_control_session->datosCliente;
		$this->strAccionBusqueda=$retencion_ica_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$retencion_ica_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$retencion_ica_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$retencion_ica_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$retencion_ica_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$retencion_ica_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$retencion_ica_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$retencion_ica_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$retencion_ica_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$retencion_ica_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$retencion_ica_control_session->strTipoPaginacion;
		$this->strTipoAccion=$retencion_ica_control_session->strTipoAccion;
		$this->tiposReportes=$retencion_ica_control_session->tiposReportes;
		$this->tiposReporte=$retencion_ica_control_session->tiposReporte;
		$this->tiposAcciones=$retencion_ica_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$retencion_ica_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$retencion_ica_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$retencion_ica_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$retencion_ica_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$retencion_ica_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$retencion_ica_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$retencion_ica_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$retencion_ica_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$retencion_ica_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$retencion_ica_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$retencion_ica_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$retencion_ica_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$retencion_ica_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$retencion_ica_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$retencion_ica_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$retencion_ica_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$retencion_ica_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$retencion_ica_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$retencion_ica_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$retencion_ica_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$retencion_ica_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$retencion_ica_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$retencion_ica_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$retencion_ica_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$retencion_ica_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$retencion_ica_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$retencion_ica_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$retencion_ica_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$retencion_ica_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$retencion_ica_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$retencion_ica_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$retencion_ica_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$retencion_ica_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$retencion_ica_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$retencion_ica_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$retencion_ica_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$retencion_ica_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$retencion_ica_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$retencion_ica_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$retencion_ica_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$retencion_ica_control_session->resumenUsuarioActual;	
		$this->moduloActual=$retencion_ica_control_session->moduloActual;	
		$this->opcionActual=$retencion_ica_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$retencion_ica_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$retencion_ica_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$retencion_ica_session=unserialize($this->Session->read(retencion_ica_util::$STR_SESSION_NAME));
				
		if($retencion_ica_session==null) {
			$retencion_ica_session=new retencion_ica_session();
		}
		
		$this->strStyleDivArbol=$retencion_ica_session->strStyleDivArbol;	
		$this->strStyleDivContent=$retencion_ica_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$retencion_ica_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$retencion_ica_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$retencion_ica_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$retencion_ica_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$retencion_ica_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$retencion_ica_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$retencion_ica_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$retencion_ica_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$retencion_ica_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$retencion_ica_control_session->strMensajeid_empresa;
		$this->strMensajecodigo=$retencion_ica_control_session->strMensajecodigo;
		$this->strMensajedescripcion=$retencion_ica_control_session->strMensajedescripcion;
		$this->strMensajevalor=$retencion_ica_control_session->strMensajevalor;
		$this->strMensajevalor_base=$retencion_ica_control_session->strMensajevalor_base;
		$this->strMensajepredeterminado=$retencion_ica_control_session->strMensajepredeterminado;
		$this->strMensajeid_cuenta_ventas=$retencion_ica_control_session->strMensajeid_cuenta_ventas;
		$this->strMensajeid_cuenta_compras=$retencion_ica_control_session->strMensajeid_cuenta_compras;
		$this->strMensajecuenta_contable_ventas=$retencion_ica_control_session->strMensajecuenta_contable_ventas;
		$this->strMensajecuenta_contable_compras=$retencion_ica_control_session->strMensajecuenta_contable_compras;
			
		
		$this->empresasFK=$retencion_ica_control_session->empresasFK;
		$this->idempresaDefaultFK=$retencion_ica_control_session->idempresaDefaultFK;
		$this->cuenta_ventassFK=$retencion_ica_control_session->cuenta_ventassFK;
		$this->idcuenta_ventasDefaultFK=$retencion_ica_control_session->idcuenta_ventasDefaultFK;
		$this->cuenta_comprassFK=$retencion_ica_control_session->cuenta_comprassFK;
		$this->idcuenta_comprasDefaultFK=$retencion_ica_control_session->idcuenta_comprasDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta_compras=$retencion_ica_control_session->strVisibleFK_Idcuenta_compras;
		$this->strVisibleFK_Idcuenta_ventas=$retencion_ica_control_session->strVisibleFK_Idcuenta_ventas;
		$this->strVisibleFK_Idempresa=$retencion_ica_control_session->strVisibleFK_Idempresa;
		
		
		$this->strTienePermisosproveedor=$retencion_ica_control_session->strTienePermisosproveedor;
		$this->strTienePermisoscliente=$retencion_ica_control_session->strTienePermisoscliente;
		
		
		$this->id_cuenta_comprasFK_Idcuenta_compras=$retencion_ica_control_session->id_cuenta_comprasFK_Idcuenta_compras;
		$this->id_cuenta_ventasFK_Idcuenta_ventas=$retencion_ica_control_session->id_cuenta_ventasFK_Idcuenta_ventas;
		$this->id_empresaFK_Idempresa=$retencion_ica_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getretencion_icaControllerAdditional() {
		return $this->retencion_icaControllerAdditional;
	}

	public function setretencion_icaControllerAdditional($retencion_icaControllerAdditional) {
		$this->retencion_icaControllerAdditional = $retencion_icaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getretencion_icaActual() : retencion_ica {
		return $this->retencion_icaActual;
	}

	public function setretencion_icaActual(retencion_ica $retencion_icaActual) {
		$this->retencion_icaActual = $retencion_icaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidretencion_ica() : int {
		return $this->idretencion_ica;
	}

	public function setidretencion_ica(int $idretencion_ica) {
		$this->idretencion_ica = $idretencion_ica;
	}
	
	public function getretencion_ica() : retencion_ica {
		return $this->retencion_ica;
	}

	public function setretencion_ica(retencion_ica $retencion_ica) {
		$this->retencion_ica = $retencion_ica;
	}
		
	public function getretencion_icaLogic() : retencion_ica_logic {		
		return $this->retencion_icaLogic;
	}

	public function setretencion_icaLogic(retencion_ica_logic $retencion_icaLogic) {
		$this->retencion_icaLogic = $retencion_icaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getretencion_icasModel() {		
		try {						
			/*retencion_icasModel.setWrappedData(retencion_icaLogic->getretencion_icas());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->retencion_icasModel;
	}
	
	public function setretencion_icasModel($retencion_icasModel) {
		$this->retencion_icasModel = $retencion_icasModel;
	}
	
	public function getretencion_icas() : array {		
		return $this->retencion_icas;
	}
	
	public function setretencion_icas(array $retencion_icas) {
		$this->retencion_icas= $retencion_icas;
	}
	
	public function getretencion_icasEliminados() : array {		
		return $this->retencion_icasEliminados;
	}
	
	public function setretencion_icasEliminados(array $retencion_icasEliminados) {
		$this->retencion_icasEliminados= $retencion_icasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getretencion_icaActualFromListDataModel() {
		try {
			/*$retencion_icaClase= $this->retencion_icasModel->getRowData();*/
			
			/*return $retencion_ica;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
