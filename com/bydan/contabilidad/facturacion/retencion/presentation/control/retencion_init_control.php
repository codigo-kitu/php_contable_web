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

namespace com\bydan\contabilidad\facturacion\retencion\presentation\control;

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

use com\bydan\contabilidad\facturacion\retencion\business\entity\retencion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/retencion/util/retencion_carga.php');
use com\bydan\contabilidad\facturacion\retencion\util\retencion_carga;

use com\bydan\contabilidad\facturacion\retencion\util\retencion_util;
use com\bydan\contabilidad\facturacion\retencion\util\retencion_param_return;
use com\bydan\contabilidad\facturacion\retencion\business\logic\retencion_logic;
use com\bydan\contabilidad\facturacion\retencion\presentation\session\retencion_session;


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


use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;
use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;

use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\producto\presentation\session\producto_session;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;


/*CARGA ARCHIVOS FRAMEWORK*/
retencion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
retencion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
retencion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
retencion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*retencion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class retencion_init_control extends ControllerBase {	
	
	public $retencionClase=null;	
	public $retencionsModel=null;	
	public $retencionsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idretencion=0;	
	public ?int $idretencionActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $retencionLogic=null;
	
	public $retencionActual=null;	
	
	public $retencion=null;
	public $retencions=null;
	public $retencionsEliminados=array();
	public $retencionsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $retencionsLocal=array();
	public ?array $retencionsReporte=null;
	public ?array $retencionsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadretencion='onload';
	public string $strTipoPaginaAuxiliarretencion='none';
	public string $strTipoUsuarioAuxiliarretencion='none';
		
	public $retencionReturnGeneral=null;
	public $retencionParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $retencionModel=null;
	public $retencionControllerAdditional=null;
	
	
	

	public $listaproductoLogic=null;

	public function  getlista_productoLogic() {
		return $this->listaproductoLogic;
	}

	public function setlista_productoLogic($listaproductoLogic) {
		$this->listaproductoLogic =$listaproductoLogic;
	}


	public $productoLogic=null;

	public function  getproductoLogic() {
		return $this->productoLogic;
	}

	public function setproductoLogic($productoLogic) {
		$this->productoLogic =$productoLogic;
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

	
	
	
	
	
	
	public $strTienePermisoslista_producto='none';
	public $strTienePermisosproducto='none';
	public $strTienePermisoscliente='none';
	public $strTienePermisosproveedor='none';
	
	
	public  $id_cuenta_comprasFK_Idcuenta_compras=null;

	public  $id_cuenta_ventasFK_Idcuenta_ventas=null;

	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->retencionLogic==null) {
				$this->retencionLogic=new retencion_logic();
			}
			
		} else {
			if($this->retencionLogic==null) {
				$this->retencionLogic=new retencion_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->retencionClase==null) {
				$this->retencionClase=new retencion();
			}
			
			$this->retencionClase->setId(0);	
				
				
			$this->retencionClase->setid_empresa(-1);	
			$this->retencionClase->setcodigo('');	
			$this->retencionClase->setdescripcion('');	
			$this->retencionClase->setvalor(0.0);	
			$this->retencionClase->setvalor_base(0.0);	
			$this->retencionClase->setpredeterminado(false);	
			$this->retencionClase->setid_cuenta_ventas(null);	
			$this->retencionClase->setid_cuenta_compras(null);	
			$this->retencionClase->setcuenta_contable_ventas('');	
			$this->retencionClase->setcuenta_contable_compras('');	
			
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
		$this->prepararEjecutarMantenimientoBase('retencion');
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
		$this->cargarParametrosReporteBase('retencion');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('retencion');
	}
	
	public function actualizarControllerConReturnGeneral(retencion_param_return $retencionReturnGeneral) {
		if($retencionReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesretencionsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$retencionReturnGeneral->getsMensajeProceso();
		}
		
		if($retencionReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$retencionReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($retencionReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$retencionReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$retencionReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($retencionReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($retencionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$retencionReturnGeneral->getsFuncionJs();
		}
		
		if($retencionReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(retencion_session $retencion_session){
		$this->strStyleDivArbol=$retencion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$retencion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$retencion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$retencion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$retencion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$retencion_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$retencion_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(retencion_session $retencion_session){
		$retencion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$retencion_session->strStyleDivHeader='display:none';			
		$retencion_session->strStyleDivContent='width:93%;height:100%';	
		$retencion_session->strStyleDivOpcionesBanner='display:none';	
		$retencion_session->strStyleDivExpandirColapsar='display:none';	
		$retencion_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(retencion_control $retencion_control_session){
		$this->idNuevo=$retencion_control_session->idNuevo;
		$this->retencionActual=$retencion_control_session->retencionActual;
		$this->retencion=$retencion_control_session->retencion;
		$this->retencionClase=$retencion_control_session->retencionClase;
		$this->retencions=$retencion_control_session->retencions;
		$this->retencionsEliminados=$retencion_control_session->retencionsEliminados;
		$this->retencion=$retencion_control_session->retencion;
		$this->retencionsReporte=$retencion_control_session->retencionsReporte;
		$this->retencionsSeleccionados=$retencion_control_session->retencionsSeleccionados;
		$this->arrOrderBy=$retencion_control_session->arrOrderBy;
		$this->arrOrderByRel=$retencion_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$retencion_control_session->arrHistoryWebs;
		$this->arrSessionBases=$retencion_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadretencion=$retencion_control_session->strTypeOnLoadretencion;
		$this->strTipoPaginaAuxiliarretencion=$retencion_control_session->strTipoPaginaAuxiliarretencion;
		$this->strTipoUsuarioAuxiliarretencion=$retencion_control_session->strTipoUsuarioAuxiliarretencion;	
		
		$this->bitEsPopup=$retencion_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$retencion_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$retencion_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$retencion_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$retencion_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$retencion_control_session->strSufijo;
		$this->bitEsRelaciones=$retencion_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$retencion_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$retencion_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$retencion_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$retencion_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$retencion_control_session->strTituloTabla;
		$this->strTituloPathPagina=$retencion_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$retencion_control_session->strTituloPathElementoActual;
		
		if($this->retencionLogic==null) {			
			$this->retencionLogic=new retencion_logic();
		}
		
		
		if($this->retencionClase==null) {
			$this->retencionClase=new retencion();	
		}
		
		$this->retencionLogic->setretencion($this->retencionClase);
		
		
		if($this->retencions==null) {
			$this->retencions=array();	
		}
		
		$this->retencionLogic->setretencions($this->retencions);
		
		
		$this->strTipoView=$retencion_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$retencion_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$retencion_control_session->datosCliente;
		$this->strAccionBusqueda=$retencion_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$retencion_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$retencion_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$retencion_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$retencion_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$retencion_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$retencion_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$retencion_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$retencion_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$retencion_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$retencion_control_session->strTipoPaginacion;
		$this->strTipoAccion=$retencion_control_session->strTipoAccion;
		$this->tiposReportes=$retencion_control_session->tiposReportes;
		$this->tiposReporte=$retencion_control_session->tiposReporte;
		$this->tiposAcciones=$retencion_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$retencion_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$retencion_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$retencion_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$retencion_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$retencion_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$retencion_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$retencion_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$retencion_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$retencion_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$retencion_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$retencion_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$retencion_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$retencion_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$retencion_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$retencion_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$retencion_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$retencion_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$retencion_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$retencion_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$retencion_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$retencion_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$retencion_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$retencion_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$retencion_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$retencion_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$retencion_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$retencion_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$retencion_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$retencion_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$retencion_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$retencion_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$retencion_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$retencion_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$retencion_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$retencion_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$retencion_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$retencion_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$retencion_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$retencion_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$retencion_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$retencion_control_session->resumenUsuarioActual;	
		$this->moduloActual=$retencion_control_session->moduloActual;	
		$this->opcionActual=$retencion_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$retencion_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$retencion_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$retencion_session=unserialize($this->Session->read(retencion_util::$STR_SESSION_NAME));
				
		if($retencion_session==null) {
			$retencion_session=new retencion_session();
		}
		
		$this->strStyleDivArbol=$retencion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$retencion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$retencion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$retencion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$retencion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$retencion_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$retencion_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$retencion_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$retencion_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$retencion_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$retencion_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$retencion_control_session->strMensajeid_empresa;
		$this->strMensajecodigo=$retencion_control_session->strMensajecodigo;
		$this->strMensajedescripcion=$retencion_control_session->strMensajedescripcion;
		$this->strMensajevalor=$retencion_control_session->strMensajevalor;
		$this->strMensajevalor_base=$retencion_control_session->strMensajevalor_base;
		$this->strMensajepredeterminado=$retencion_control_session->strMensajepredeterminado;
		$this->strMensajeid_cuenta_ventas=$retencion_control_session->strMensajeid_cuenta_ventas;
		$this->strMensajeid_cuenta_compras=$retencion_control_session->strMensajeid_cuenta_compras;
		$this->strMensajecuenta_contable_ventas=$retencion_control_session->strMensajecuenta_contable_ventas;
		$this->strMensajecuenta_contable_compras=$retencion_control_session->strMensajecuenta_contable_compras;
			
		
		$this->empresasFK=$retencion_control_session->empresasFK;
		$this->idempresaDefaultFK=$retencion_control_session->idempresaDefaultFK;
		$this->cuenta_ventassFK=$retencion_control_session->cuenta_ventassFK;
		$this->idcuenta_ventasDefaultFK=$retencion_control_session->idcuenta_ventasDefaultFK;
		$this->cuenta_comprassFK=$retencion_control_session->cuenta_comprassFK;
		$this->idcuenta_comprasDefaultFK=$retencion_control_session->idcuenta_comprasDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta_compras=$retencion_control_session->strVisibleFK_Idcuenta_compras;
		$this->strVisibleFK_Idcuenta_ventas=$retencion_control_session->strVisibleFK_Idcuenta_ventas;
		$this->strVisibleFK_Idempresa=$retencion_control_session->strVisibleFK_Idempresa;
		
		
		$this->strTienePermisoslista_producto=$retencion_control_session->strTienePermisoslista_producto;
		$this->strTienePermisosproducto=$retencion_control_session->strTienePermisosproducto;
		$this->strTienePermisoscliente=$retencion_control_session->strTienePermisoscliente;
		$this->strTienePermisosproveedor=$retencion_control_session->strTienePermisosproveedor;
		
		
		$this->id_cuenta_comprasFK_Idcuenta_compras=$retencion_control_session->id_cuenta_comprasFK_Idcuenta_compras;
		$this->id_cuenta_ventasFK_Idcuenta_ventas=$retencion_control_session->id_cuenta_ventasFK_Idcuenta_ventas;
		$this->id_empresaFK_Idempresa=$retencion_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getretencionControllerAdditional() {
		return $this->retencionControllerAdditional;
	}

	public function setretencionControllerAdditional($retencionControllerAdditional) {
		$this->retencionControllerAdditional = $retencionControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getretencionActual() : retencion {
		return $this->retencionActual;
	}

	public function setretencionActual(retencion $retencionActual) {
		$this->retencionActual = $retencionActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidretencion() : int {
		return $this->idretencion;
	}

	public function setidretencion(int $idretencion) {
		$this->idretencion = $idretencion;
	}
	
	public function getretencion() : retencion {
		return $this->retencion;
	}

	public function setretencion(retencion $retencion) {
		$this->retencion = $retencion;
	}
		
	public function getretencionLogic() : retencion_logic {		
		return $this->retencionLogic;
	}

	public function setretencionLogic(retencion_logic $retencionLogic) {
		$this->retencionLogic = $retencionLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getretencionsModel() {		
		try {						
			/*retencionsModel.setWrappedData(retencionLogic->getretencions());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->retencionsModel;
	}
	
	public function setretencionsModel($retencionsModel) {
		$this->retencionsModel = $retencionsModel;
	}
	
	public function getretencions() : array {		
		return $this->retencions;
	}
	
	public function setretencions(array $retencions) {
		$this->retencions= $retencions;
	}
	
	public function getretencionsEliminados() : array {		
		return $this->retencionsEliminados;
	}
	
	public function setretencionsEliminados(array $retencionsEliminados) {
		$this->retencionsEliminados= $retencionsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getretencionActualFromListDataModel() {
		try {
			/*$retencionClase= $this->retencionsModel->getRowData();*/
			
			/*return $retencion;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
