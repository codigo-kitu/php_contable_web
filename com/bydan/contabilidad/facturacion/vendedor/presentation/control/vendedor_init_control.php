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

namespace com\bydan\contabilidad\facturacion\vendedor\presentation\control;

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

use com\bydan\contabilidad\facturacion\vendedor\business\entity\vendedor;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/vendedor/util/vendedor_carga.php');
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_carga;

use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_util;
use com\bydan\contabilidad\facturacion\vendedor\util\vendedor_param_return;
use com\bydan\contabilidad\facturacion\vendedor\business\logic\vendedor_logic;
use com\bydan\contabilidad\facturacion\vendedor\presentation\session\vendedor_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;
use com\bydan\contabilidad\facturacion\factura_lote\presentation\session\factura_lote_session;

use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;
use com\bydan\contabilidad\facturacion\devolucion_factura\presentation\session\devolucion_factura_session;

use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;
use com\bydan\contabilidad\estimados\estimado\presentation\session\estimado_session;

use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;
use com\bydan\contabilidad\inventario\devolucion\presentation\session\devolucion_session;

use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\inventario\orden_compra\presentation\session\orden_compra_session;

use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;
use com\bydan\contabilidad\facturacion\factura\presentation\session\factura_session;

use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_carga;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;
use com\bydan\contabilidad\inventario\cotizacion\presentation\session\cotizacion_session;

use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;
use com\bydan\contabilidad\estimados\consignacion\presentation\session\consignacion_session;

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;


/*CARGA ARCHIVOS FRAMEWORK*/
vendedor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
vendedor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
vendedor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
vendedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*vendedor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class vendedor_init_control extends ControllerBase {	
	
	public $vendedorClase=null;	
	public $vendedorsModel=null;	
	public $vendedorsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idvendedor=0;	
	public ?int $idvendedorActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $vendedorLogic=null;
	
	public $vendedorActual=null;	
	
	public $vendedor=null;
	public $vendedors=null;
	public $vendedorsEliminados=array();
	public $vendedorsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $vendedorsLocal=array();
	public ?array $vendedorsReporte=null;
	public ?array $vendedorsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadvendedor='onload';
	public string $strTipoPaginaAuxiliarvendedor='none';
	public string $strTipoUsuarioAuxiliarvendedor='none';
		
	public $vendedorReturnGeneral=null;
	public $vendedorParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $vendedorModel=null;
	public $vendedorControllerAdditional=null;
	
	
	

	public $clienteLogic=null;

	public function  getclienteLogic() {
		return $this->clienteLogic;
	}

	public function setclienteLogic($clienteLogic) {
		$this->clienteLogic =$clienteLogic;
	}


	public $facturaloteLogic=null;

	public function  getfactura_loteLogic() {
		return $this->facturaloteLogic;
	}

	public function setfactura_loteLogic($facturaloteLogic) {
		$this->facturaloteLogic =$facturaloteLogic;
	}


	public $devolucionfacturaLogic=null;

	public function  getdevolucion_facturaLogic() {
		return $this->devolucionfacturaLogic;
	}

	public function setdevolucion_facturaLogic($devolucionfacturaLogic) {
		$this->devolucionfacturaLogic =$devolucionfacturaLogic;
	}


	public $estimadoLogic=null;

	public function  getestimadoLogic() {
		return $this->estimadoLogic;
	}

	public function setestimadoLogic($estimadoLogic) {
		$this->estimadoLogic =$estimadoLogic;
	}


	public $devolucionLogic=null;

	public function  getdevolucionLogic() {
		return $this->devolucionLogic;
	}

	public function setdevolucionLogic($devolucionLogic) {
		$this->devolucionLogic =$devolucionLogic;
	}


	public $ordencompraLogic=null;

	public function  getorden_compraLogic() {
		return $this->ordencompraLogic;
	}

	public function setorden_compraLogic($ordencompraLogic) {
		$this->ordencompraLogic =$ordencompraLogic;
	}


	public $facturaLogic=null;

	public function  getfacturaLogic() {
		return $this->facturaLogic;
	}

	public function setfacturaLogic($facturaLogic) {
		$this->facturaLogic =$facturaLogic;
	}


	public $cotizacionLogic=null;

	public function  getcotizacionLogic() {
		return $this->cotizacionLogic;
	}

	public function setcotizacionLogic($cotizacionLogic) {
		$this->cotizacionLogic =$cotizacionLogic;
	}


	public $consignacionLogic=null;

	public function  getconsignacionLogic() {
		return $this->consignacionLogic;
	}

	public function setconsignacionLogic($consignacionLogic) {
		$this->consignacionLogic =$consignacionLogic;
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
	public string $strMensajenombre='';
	public string $strMensajedireccion1='';
	public string $strMensajedireccion2='';
	public string $strMensajecomision='';
	
	
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

	
	
	
	
	
	
	public $strTienePermisoscliente='none';
	public $strTienePermisosfactura_lote='none';
	public $strTienePermisosdevolucion_factura='none';
	public $strTienePermisosestimado='none';
	public $strTienePermisosdevolucion='none';
	public $strTienePermisosorden_compra='none';
	public $strTienePermisosfactura='none';
	public $strTienePermisoscotizacion='none';
	public $strTienePermisosconsignacion='none';
	public $strTienePermisosproveedor='none';
	
	
	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->vendedorLogic==null) {
				$this->vendedorLogic=new vendedor_logic();
			}
			
		} else {
			if($this->vendedorLogic==null) {
				$this->vendedorLogic=new vendedor_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->vendedorClase==null) {
				$this->vendedorClase=new vendedor();
			}
			
			$this->vendedorClase->setId(0);	
				
				
			$this->vendedorClase->setid_empresa(-1);	
			$this->vendedorClase->setcodigo('');	
			$this->vendedorClase->setnombre('');	
			$this->vendedorClase->setdireccion1('');	
			$this->vendedorClase->setdireccion2('');	
			$this->vendedorClase->setcomision(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('vendedor');
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
		$this->cargarParametrosReporteBase('vendedor');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('vendedor');
	}
	
	public function actualizarControllerConReturnGeneral(vendedor_param_return $vendedorReturnGeneral) {
		if($vendedorReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesvendedorsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$vendedorReturnGeneral->getsMensajeProceso();
		}
		
		if($vendedorReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$vendedorReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($vendedorReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$vendedorReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$vendedorReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($vendedorReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($vendedorReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$vendedorReturnGeneral->getsFuncionJs();
		}
		
		if($vendedorReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(vendedor_session $vendedor_session){
		$this->strStyleDivArbol=$vendedor_session->strStyleDivArbol;	
		$this->strStyleDivContent=$vendedor_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$vendedor_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$vendedor_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$vendedor_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$vendedor_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$vendedor_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(vendedor_session $vendedor_session){
		$vendedor_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$vendedor_session->strStyleDivHeader='display:none';			
		$vendedor_session->strStyleDivContent='width:93%;height:100%';	
		$vendedor_session->strStyleDivOpcionesBanner='display:none';	
		$vendedor_session->strStyleDivExpandirColapsar='display:none';	
		$vendedor_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(vendedor_control $vendedor_control_session){
		$this->idNuevo=$vendedor_control_session->idNuevo;
		$this->vendedorActual=$vendedor_control_session->vendedorActual;
		$this->vendedor=$vendedor_control_session->vendedor;
		$this->vendedorClase=$vendedor_control_session->vendedorClase;
		$this->vendedors=$vendedor_control_session->vendedors;
		$this->vendedorsEliminados=$vendedor_control_session->vendedorsEliminados;
		$this->vendedor=$vendedor_control_session->vendedor;
		$this->vendedorsReporte=$vendedor_control_session->vendedorsReporte;
		$this->vendedorsSeleccionados=$vendedor_control_session->vendedorsSeleccionados;
		$this->arrOrderBy=$vendedor_control_session->arrOrderBy;
		$this->arrOrderByRel=$vendedor_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$vendedor_control_session->arrHistoryWebs;
		$this->arrSessionBases=$vendedor_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadvendedor=$vendedor_control_session->strTypeOnLoadvendedor;
		$this->strTipoPaginaAuxiliarvendedor=$vendedor_control_session->strTipoPaginaAuxiliarvendedor;
		$this->strTipoUsuarioAuxiliarvendedor=$vendedor_control_session->strTipoUsuarioAuxiliarvendedor;	
		
		$this->bitEsPopup=$vendedor_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$vendedor_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$vendedor_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$vendedor_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$vendedor_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$vendedor_control_session->strSufijo;
		$this->bitEsRelaciones=$vendedor_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$vendedor_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$vendedor_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$vendedor_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$vendedor_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$vendedor_control_session->strTituloTabla;
		$this->strTituloPathPagina=$vendedor_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$vendedor_control_session->strTituloPathElementoActual;
		
		if($this->vendedorLogic==null) {			
			$this->vendedorLogic=new vendedor_logic();
		}
		
		
		if($this->vendedorClase==null) {
			$this->vendedorClase=new vendedor();	
		}
		
		$this->vendedorLogic->setvendedor($this->vendedorClase);
		
		
		if($this->vendedors==null) {
			$this->vendedors=array();	
		}
		
		$this->vendedorLogic->setvendedors($this->vendedors);
		
		
		$this->strTipoView=$vendedor_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$vendedor_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$vendedor_control_session->datosCliente;
		$this->strAccionBusqueda=$vendedor_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$vendedor_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$vendedor_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$vendedor_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$vendedor_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$vendedor_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$vendedor_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$vendedor_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$vendedor_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$vendedor_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$vendedor_control_session->strTipoPaginacion;
		$this->strTipoAccion=$vendedor_control_session->strTipoAccion;
		$this->tiposReportes=$vendedor_control_session->tiposReportes;
		$this->tiposReporte=$vendedor_control_session->tiposReporte;
		$this->tiposAcciones=$vendedor_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$vendedor_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$vendedor_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$vendedor_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$vendedor_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$vendedor_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$vendedor_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$vendedor_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$vendedor_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$vendedor_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$vendedor_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$vendedor_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$vendedor_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$vendedor_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$vendedor_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$vendedor_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$vendedor_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$vendedor_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$vendedor_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$vendedor_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$vendedor_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$vendedor_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$vendedor_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$vendedor_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$vendedor_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$vendedor_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$vendedor_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$vendedor_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$vendedor_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$vendedor_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$vendedor_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$vendedor_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$vendedor_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$vendedor_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$vendedor_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$vendedor_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$vendedor_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$vendedor_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$vendedor_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$vendedor_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$vendedor_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$vendedor_control_session->resumenUsuarioActual;	
		$this->moduloActual=$vendedor_control_session->moduloActual;	
		$this->opcionActual=$vendedor_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$vendedor_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$vendedor_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$vendedor_session=unserialize($this->Session->read(vendedor_util::$STR_SESSION_NAME));
				
		if($vendedor_session==null) {
			$vendedor_session=new vendedor_session();
		}
		
		$this->strStyleDivArbol=$vendedor_session->strStyleDivArbol;	
		$this->strStyleDivContent=$vendedor_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$vendedor_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$vendedor_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$vendedor_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$vendedor_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$vendedor_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$vendedor_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$vendedor_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$vendedor_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$vendedor_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$vendedor_control_session->strMensajeid_empresa;
		$this->strMensajecodigo=$vendedor_control_session->strMensajecodigo;
		$this->strMensajenombre=$vendedor_control_session->strMensajenombre;
		$this->strMensajedireccion1=$vendedor_control_session->strMensajedireccion1;
		$this->strMensajedireccion2=$vendedor_control_session->strMensajedireccion2;
		$this->strMensajecomision=$vendedor_control_session->strMensajecomision;
			
		
		$this->empresasFK=$vendedor_control_session->empresasFK;
		$this->idempresaDefaultFK=$vendedor_control_session->idempresaDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$vendedor_control_session->strVisibleFK_Idempresa;
		
		
		$this->strTienePermisoscliente=$vendedor_control_session->strTienePermisoscliente;
		$this->strTienePermisosfactura_lote=$vendedor_control_session->strTienePermisosfactura_lote;
		$this->strTienePermisosdevolucion_factura=$vendedor_control_session->strTienePermisosdevolucion_factura;
		$this->strTienePermisosestimado=$vendedor_control_session->strTienePermisosestimado;
		$this->strTienePermisosdevolucion=$vendedor_control_session->strTienePermisosdevolucion;
		$this->strTienePermisosorden_compra=$vendedor_control_session->strTienePermisosorden_compra;
		$this->strTienePermisosfactura=$vendedor_control_session->strTienePermisosfactura;
		$this->strTienePermisoscotizacion=$vendedor_control_session->strTienePermisoscotizacion;
		$this->strTienePermisosconsignacion=$vendedor_control_session->strTienePermisosconsignacion;
		$this->strTienePermisosproveedor=$vendedor_control_session->strTienePermisosproveedor;
		
		
		$this->id_empresaFK_Idempresa=$vendedor_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getvendedorControllerAdditional() {
		return $this->vendedorControllerAdditional;
	}

	public function setvendedorControllerAdditional($vendedorControllerAdditional) {
		$this->vendedorControllerAdditional = $vendedorControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getvendedorActual() : vendedor {
		return $this->vendedorActual;
	}

	public function setvendedorActual(vendedor $vendedorActual) {
		$this->vendedorActual = $vendedorActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidvendedor() : int {
		return $this->idvendedor;
	}

	public function setidvendedor(int $idvendedor) {
		$this->idvendedor = $idvendedor;
	}
	
	public function getvendedor() : vendedor {
		return $this->vendedor;
	}

	public function setvendedor(vendedor $vendedor) {
		$this->vendedor = $vendedor;
	}
		
	public function getvendedorLogic() : vendedor_logic {		
		return $this->vendedorLogic;
	}

	public function setvendedorLogic(vendedor_logic $vendedorLogic) {
		$this->vendedorLogic = $vendedorLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getvendedorsModel() {		
		try {						
			/*vendedorsModel.setWrappedData(vendedorLogic->getvendedors());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->vendedorsModel;
	}
	
	public function setvendedorsModel($vendedorsModel) {
		$this->vendedorsModel = $vendedorsModel;
	}
	
	public function getvendedors() : array {		
		return $this->vendedors;
	}
	
	public function setvendedors(array $vendedors) {
		$this->vendedors= $vendedors;
	}
	
	public function getvendedorsEliminados() : array {		
		return $this->vendedorsEliminados;
	}
	
	public function setvendedorsEliminados(array $vendedorsEliminados) {
		$this->vendedorsEliminados= $vendedorsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getvendedorActualFromListDataModel() {
		try {
			/*$vendedorClase= $this->vendedorsModel->getRowData();*/
			
			/*return $vendedor;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
