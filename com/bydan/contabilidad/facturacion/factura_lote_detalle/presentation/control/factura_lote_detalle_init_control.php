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

namespace com\bydan\contabilidad\facturacion\factura_lote_detalle\presentation\control;

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

use com\bydan\contabilidad\facturacion\factura_lote_detalle\business\entity\factura_lote_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/factura_lote_detalle/util/factura_lote_detalle_carga.php');
use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_carga;

use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_util;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\util\factura_lote_detalle_param_return;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\business\logic\factura_lote_detalle_logic;
use com\bydan\contabilidad\facturacion\factura_lote_detalle\presentation\session\factura_lote_detalle_session;


//FK


use com\bydan\contabilidad\facturacion\factura_lote\business\entity\factura_lote;
use com\bydan\contabilidad\facturacion\factura_lote\business\logic\factura_lote_logic;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\unidad\business\entity\unidad;
use com\bydan\contabilidad\inventario\unidad\business\logic\unidad_logic;
use com\bydan\contabilidad\inventario\unidad\util\unidad_carga;
use com\bydan\contabilidad\inventario\unidad\util\unidad_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
factura_lote_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
factura_lote_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
factura_lote_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
factura_lote_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*factura_lote_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class factura_lote_detalle_init_control extends ControllerBase {	
	
	public $factura_lote_detalleClase=null;	
	public $factura_lote_detallesModel=null;	
	public $factura_lote_detallesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idfactura_lote_detalle=0;	
	public ?int $idfactura_lote_detalleActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $factura_lote_detalleLogic=null;
	
	public $factura_lote_detalleActual=null;	
	
	public $factura_lote_detalle=null;
	public $factura_lote_detalles=null;
	public $factura_lote_detallesEliminados=array();
	public $factura_lote_detallesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $factura_lote_detallesLocal=array();
	public ?array $factura_lote_detallesReporte=null;
	public ?array $factura_lote_detallesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadfactura_lote_detalle='onload';
	public string $strTipoPaginaAuxiliarfactura_lote_detalle='none';
	public string $strTipoUsuarioAuxiliarfactura_lote_detalle='none';
		
	public $factura_lote_detalleReturnGeneral=null;
	public $factura_lote_detalleParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $factura_lote_detalleModel=null;
	public $factura_lote_detalleControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_factura_lote='';
	public string $strMensajeid_bodega='';
	public string $strMensajeid_producto='';
	public string $strMensajeid_unidad='';
	public string $strMensajecantidad='';
	public string $strMensajeprecio='';
	public string $strMensajedescuento_porciento='';
	public string $strMensajedescuento_monto='';
	public string $strMensajesub_total='';
	public string $strMensajeiva_porciento='';
	public string $strMensajeiva_monto='';
	public string $strMensajetotal='';
	public string $strMensajerecibido='';
	public string $strMensajeobservacion='';
	public string $strMensajeimpuesto2_porciento='';
	public string $strMensajeimpuesto2_monto='';
	public string $strMensajecotizacion='';
	public string $strMensajemoneda='';
	
	
	public string $strVisibleFK_Idbodega='display:table-row';
	public string $strVisibleFK_Idfactura_lote='display:table-row';
	public string $strVisibleFK_Idproducto='display:table-row';
	public string $strVisibleFK_Idunidad='display:table-row';

	
	public array $factura_lotesFK=array();

	public function getfactura_lotesFK():array {
		return $this->factura_lotesFK;
	}

	public function setfactura_lotesFK(array $factura_lotesFK) {
		$this->factura_lotesFK = $factura_lotesFK;
	}

	public int $idfactura_loteDefaultFK=-1;

	public function getIdfactura_loteDefaultFK():int {
		return $this->idfactura_loteDefaultFK;
	}

	public function setIdfactura_loteDefaultFK(int $idfactura_loteDefaultFK) {
		$this->idfactura_loteDefaultFK = $idfactura_loteDefaultFK;
	}

	public array $bodegasFK=array();

	public function getbodegasFK():array {
		return $this->bodegasFK;
	}

	public function setbodegasFK(array $bodegasFK) {
		$this->bodegasFK = $bodegasFK;
	}

	public int $idbodegaDefaultFK=-1;

	public function getIdbodegaDefaultFK():int {
		return $this->idbodegaDefaultFK;
	}

	public function setIdbodegaDefaultFK(int $idbodegaDefaultFK) {
		$this->idbodegaDefaultFK = $idbodegaDefaultFK;
	}

	public array $productosFK=array();

	public function getproductosFK():array {
		return $this->productosFK;
	}

	public function setproductosFK(array $productosFK) {
		$this->productosFK = $productosFK;
	}

	public int $idproductoDefaultFK=-1;

	public function getIdproductoDefaultFK():int {
		return $this->idproductoDefaultFK;
	}

	public function setIdproductoDefaultFK(int $idproductoDefaultFK) {
		$this->idproductoDefaultFK = $idproductoDefaultFK;
	}

	public array $unidadsFK=array();

	public function getunidadsFK():array {
		return $this->unidadsFK;
	}

	public function setunidadsFK(array $unidadsFK) {
		$this->unidadsFK = $unidadsFK;
	}

	public int $idunidadDefaultFK=-1;

	public function getIdunidadDefaultFK():int {
		return $this->idunidadDefaultFK;
	}

	public function setIdunidadDefaultFK(int $idunidadDefaultFK) {
		$this->idunidadDefaultFK = $idunidadDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_bodegaFK_Idbodega=null;

	public  $id_factura_loteFK_Idfactura_lote=null;

	public  $id_productoFK_Idproducto=null;

	public  $id_unidadFK_Idunidad=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->factura_lote_detalleLogic==null) {
				$this->factura_lote_detalleLogic=new factura_lote_detalle_logic();
			}
			
		} else {
			if($this->factura_lote_detalleLogic==null) {
				$this->factura_lote_detalleLogic=new factura_lote_detalle_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->factura_lote_detalleClase==null) {
				$this->factura_lote_detalleClase=new factura_lote_detalle();
			}
			
			$this->factura_lote_detalleClase->setId(0);	
				
				
			$this->factura_lote_detalleClase->setid_factura_lote(-1);	
			$this->factura_lote_detalleClase->setid_bodega(-1);	
			$this->factura_lote_detalleClase->setid_producto(-1);	
			$this->factura_lote_detalleClase->setid_unidad(-1);	
			$this->factura_lote_detalleClase->setcantidad(0.0);	
			$this->factura_lote_detalleClase->setprecio(0.0);	
			$this->factura_lote_detalleClase->setdescuento_porciento(0.0);	
			$this->factura_lote_detalleClase->setdescuento_monto(0.0);	
			$this->factura_lote_detalleClase->setsub_total(0.0);	
			$this->factura_lote_detalleClase->setiva_porciento(0.0);	
			$this->factura_lote_detalleClase->setiva_monto(0.0);	
			$this->factura_lote_detalleClase->settotal(0.0);	
			$this->factura_lote_detalleClase->setrecibido(0.0);	
			$this->factura_lote_detalleClase->setobservacion('');	
			$this->factura_lote_detalleClase->setimpuesto2_porciento(0.0);	
			$this->factura_lote_detalleClase->setimpuesto2_monto(0.0);	
			$this->factura_lote_detalleClase->setcotizacion(0.0);	
			$this->factura_lote_detalleClase->setmoneda(0);	
			
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
		$this->prepararEjecutarMantenimientoBase('factura_lote_detalle');
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
		$this->cargarParametrosReporteBase('factura_lote_detalle');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('factura_lote_detalle');
	}
	
	public function actualizarControllerConReturnGeneral(factura_lote_detalle_param_return $factura_lote_detalleReturnGeneral) {
		if($factura_lote_detalleReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesfactura_lote_detallesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$factura_lote_detalleReturnGeneral->getsMensajeProceso();
		}
		
		if($factura_lote_detalleReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$factura_lote_detalleReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($factura_lote_detalleReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$factura_lote_detalleReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$factura_lote_detalleReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($factura_lote_detalleReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($factura_lote_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$factura_lote_detalleReturnGeneral->getsFuncionJs();
		}
		
		if($factura_lote_detalleReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(factura_lote_detalle_session $factura_lote_detalle_session){
		$this->strStyleDivArbol=$factura_lote_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$factura_lote_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$factura_lote_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$factura_lote_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$factura_lote_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$factura_lote_detalle_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$factura_lote_detalle_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(factura_lote_detalle_session $factura_lote_detalle_session){
		$factura_lote_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$factura_lote_detalle_session->strStyleDivHeader='display:none';			
		$factura_lote_detalle_session->strStyleDivContent='width:93%;height:100%';	
		$factura_lote_detalle_session->strStyleDivOpcionesBanner='display:none';	
		$factura_lote_detalle_session->strStyleDivExpandirColapsar='display:none';	
		$factura_lote_detalle_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(factura_lote_detalle_control $factura_lote_detalle_control_session){
		$this->idNuevo=$factura_lote_detalle_control_session->idNuevo;
		$this->factura_lote_detalleActual=$factura_lote_detalle_control_session->factura_lote_detalleActual;
		$this->factura_lote_detalle=$factura_lote_detalle_control_session->factura_lote_detalle;
		$this->factura_lote_detalleClase=$factura_lote_detalle_control_session->factura_lote_detalleClase;
		$this->factura_lote_detalles=$factura_lote_detalle_control_session->factura_lote_detalles;
		$this->factura_lote_detallesEliminados=$factura_lote_detalle_control_session->factura_lote_detallesEliminados;
		$this->factura_lote_detalle=$factura_lote_detalle_control_session->factura_lote_detalle;
		$this->factura_lote_detallesReporte=$factura_lote_detalle_control_session->factura_lote_detallesReporte;
		$this->factura_lote_detallesSeleccionados=$factura_lote_detalle_control_session->factura_lote_detallesSeleccionados;
		$this->arrOrderBy=$factura_lote_detalle_control_session->arrOrderBy;
		$this->arrOrderByRel=$factura_lote_detalle_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$factura_lote_detalle_control_session->arrHistoryWebs;
		$this->arrSessionBases=$factura_lote_detalle_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadfactura_lote_detalle=$factura_lote_detalle_control_session->strTypeOnLoadfactura_lote_detalle;
		$this->strTipoPaginaAuxiliarfactura_lote_detalle=$factura_lote_detalle_control_session->strTipoPaginaAuxiliarfactura_lote_detalle;
		$this->strTipoUsuarioAuxiliarfactura_lote_detalle=$factura_lote_detalle_control_session->strTipoUsuarioAuxiliarfactura_lote_detalle;	
		
		$this->bitEsPopup=$factura_lote_detalle_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$factura_lote_detalle_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$factura_lote_detalle_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$factura_lote_detalle_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$factura_lote_detalle_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$factura_lote_detalle_control_session->strSufijo;
		$this->bitEsRelaciones=$factura_lote_detalle_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$factura_lote_detalle_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$factura_lote_detalle_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$factura_lote_detalle_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$factura_lote_detalle_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$factura_lote_detalle_control_session->strTituloTabla;
		$this->strTituloPathPagina=$factura_lote_detalle_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$factura_lote_detalle_control_session->strTituloPathElementoActual;
		
		if($this->factura_lote_detalleLogic==null) {			
			$this->factura_lote_detalleLogic=new factura_lote_detalle_logic();
		}
		
		
		if($this->factura_lote_detalleClase==null) {
			$this->factura_lote_detalleClase=new factura_lote_detalle();	
		}
		
		$this->factura_lote_detalleLogic->setfactura_lote_detalle($this->factura_lote_detalleClase);
		
		
		if($this->factura_lote_detalles==null) {
			$this->factura_lote_detalles=array();	
		}
		
		$this->factura_lote_detalleLogic->setfactura_lote_detalles($this->factura_lote_detalles);
		
		
		$this->strTipoView=$factura_lote_detalle_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$factura_lote_detalle_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$factura_lote_detalle_control_session->datosCliente;
		$this->strAccionBusqueda=$factura_lote_detalle_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$factura_lote_detalle_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$factura_lote_detalle_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$factura_lote_detalle_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$factura_lote_detalle_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$factura_lote_detalle_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$factura_lote_detalle_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$factura_lote_detalle_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$factura_lote_detalle_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$factura_lote_detalle_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$factura_lote_detalle_control_session->strTipoPaginacion;
		$this->strTipoAccion=$factura_lote_detalle_control_session->strTipoAccion;
		$this->tiposReportes=$factura_lote_detalle_control_session->tiposReportes;
		$this->tiposReporte=$factura_lote_detalle_control_session->tiposReporte;
		$this->tiposAcciones=$factura_lote_detalle_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$factura_lote_detalle_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$factura_lote_detalle_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$factura_lote_detalle_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$factura_lote_detalle_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$factura_lote_detalle_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$factura_lote_detalle_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$factura_lote_detalle_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$factura_lote_detalle_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$factura_lote_detalle_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$factura_lote_detalle_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$factura_lote_detalle_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$factura_lote_detalle_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$factura_lote_detalle_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$factura_lote_detalle_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$factura_lote_detalle_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$factura_lote_detalle_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$factura_lote_detalle_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$factura_lote_detalle_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$factura_lote_detalle_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$factura_lote_detalle_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$factura_lote_detalle_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$factura_lote_detalle_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$factura_lote_detalle_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$factura_lote_detalle_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$factura_lote_detalle_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$factura_lote_detalle_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$factura_lote_detalle_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$factura_lote_detalle_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$factura_lote_detalle_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$factura_lote_detalle_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$factura_lote_detalle_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$factura_lote_detalle_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$factura_lote_detalle_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$factura_lote_detalle_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$factura_lote_detalle_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$factura_lote_detalle_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$factura_lote_detalle_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$factura_lote_detalle_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$factura_lote_detalle_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$factura_lote_detalle_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$factura_lote_detalle_control_session->resumenUsuarioActual;	
		$this->moduloActual=$factura_lote_detalle_control_session->moduloActual;	
		$this->opcionActual=$factura_lote_detalle_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$factura_lote_detalle_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$factura_lote_detalle_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$factura_lote_detalle_session=unserialize($this->Session->read(factura_lote_detalle_util::$STR_SESSION_NAME));
				
		if($factura_lote_detalle_session==null) {
			$factura_lote_detalle_session=new factura_lote_detalle_session();
		}
		
		$this->strStyleDivArbol=$factura_lote_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$factura_lote_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$factura_lote_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$factura_lote_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$factura_lote_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$factura_lote_detalle_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$factura_lote_detalle_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$factura_lote_detalle_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$factura_lote_detalle_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$factura_lote_detalle_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$factura_lote_detalle_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_factura_lote=$factura_lote_detalle_control_session->strMensajeid_factura_lote;
		$this->strMensajeid_bodega=$factura_lote_detalle_control_session->strMensajeid_bodega;
		$this->strMensajeid_producto=$factura_lote_detalle_control_session->strMensajeid_producto;
		$this->strMensajeid_unidad=$factura_lote_detalle_control_session->strMensajeid_unidad;
		$this->strMensajecantidad=$factura_lote_detalle_control_session->strMensajecantidad;
		$this->strMensajeprecio=$factura_lote_detalle_control_session->strMensajeprecio;
		$this->strMensajedescuento_porciento=$factura_lote_detalle_control_session->strMensajedescuento_porciento;
		$this->strMensajedescuento_monto=$factura_lote_detalle_control_session->strMensajedescuento_monto;
		$this->strMensajesub_total=$factura_lote_detalle_control_session->strMensajesub_total;
		$this->strMensajeiva_porciento=$factura_lote_detalle_control_session->strMensajeiva_porciento;
		$this->strMensajeiva_monto=$factura_lote_detalle_control_session->strMensajeiva_monto;
		$this->strMensajetotal=$factura_lote_detalle_control_session->strMensajetotal;
		$this->strMensajerecibido=$factura_lote_detalle_control_session->strMensajerecibido;
		$this->strMensajeobservacion=$factura_lote_detalle_control_session->strMensajeobservacion;
		$this->strMensajeimpuesto2_porciento=$factura_lote_detalle_control_session->strMensajeimpuesto2_porciento;
		$this->strMensajeimpuesto2_monto=$factura_lote_detalle_control_session->strMensajeimpuesto2_monto;
		$this->strMensajecotizacion=$factura_lote_detalle_control_session->strMensajecotizacion;
		$this->strMensajemoneda=$factura_lote_detalle_control_session->strMensajemoneda;
			
		
		$this->factura_lotesFK=$factura_lote_detalle_control_session->factura_lotesFK;
		$this->idfactura_loteDefaultFK=$factura_lote_detalle_control_session->idfactura_loteDefaultFK;
		$this->bodegasFK=$factura_lote_detalle_control_session->bodegasFK;
		$this->idbodegaDefaultFK=$factura_lote_detalle_control_session->idbodegaDefaultFK;
		$this->productosFK=$factura_lote_detalle_control_session->productosFK;
		$this->idproductoDefaultFK=$factura_lote_detalle_control_session->idproductoDefaultFK;
		$this->unidadsFK=$factura_lote_detalle_control_session->unidadsFK;
		$this->idunidadDefaultFK=$factura_lote_detalle_control_session->idunidadDefaultFK;
		
		
		$this->strVisibleFK_Idbodega=$factura_lote_detalle_control_session->strVisibleFK_Idbodega;
		$this->strVisibleFK_Idfactura_lote=$factura_lote_detalle_control_session->strVisibleFK_Idfactura_lote;
		$this->strVisibleFK_Idproducto=$factura_lote_detalle_control_session->strVisibleFK_Idproducto;
		$this->strVisibleFK_Idunidad=$factura_lote_detalle_control_session->strVisibleFK_Idunidad;
		
		
		
		
		$this->id_bodegaFK_Idbodega=$factura_lote_detalle_control_session->id_bodegaFK_Idbodega;
		$this->id_factura_loteFK_Idfactura_lote=$factura_lote_detalle_control_session->id_factura_loteFK_Idfactura_lote;
		$this->id_productoFK_Idproducto=$factura_lote_detalle_control_session->id_productoFK_Idproducto;
		$this->id_unidadFK_Idunidad=$factura_lote_detalle_control_session->id_unidadFK_Idunidad;

		
		
		
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
	
	public function getfactura_lote_detalleControllerAdditional() {
		return $this->factura_lote_detalleControllerAdditional;
	}

	public function setfactura_lote_detalleControllerAdditional($factura_lote_detalleControllerAdditional) {
		$this->factura_lote_detalleControllerAdditional = $factura_lote_detalleControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getfactura_lote_detalleActual() : factura_lote_detalle {
		return $this->factura_lote_detalleActual;
	}

	public function setfactura_lote_detalleActual(factura_lote_detalle $factura_lote_detalleActual) {
		$this->factura_lote_detalleActual = $factura_lote_detalleActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidfactura_lote_detalle() : int {
		return $this->idfactura_lote_detalle;
	}

	public function setidfactura_lote_detalle(int $idfactura_lote_detalle) {
		$this->idfactura_lote_detalle = $idfactura_lote_detalle;
	}
	
	public function getfactura_lote_detalle() : factura_lote_detalle {
		return $this->factura_lote_detalle;
	}

	public function setfactura_lote_detalle(factura_lote_detalle $factura_lote_detalle) {
		$this->factura_lote_detalle = $factura_lote_detalle;
	}
		
	public function getfactura_lote_detalleLogic() : factura_lote_detalle_logic {		
		return $this->factura_lote_detalleLogic;
	}

	public function setfactura_lote_detalleLogic(factura_lote_detalle_logic $factura_lote_detalleLogic) {
		$this->factura_lote_detalleLogic = $factura_lote_detalleLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getfactura_lote_detallesModel() {		
		try {						
			/*factura_lote_detallesModel.setWrappedData(factura_lote_detalleLogic->getfactura_lote_detalles());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->factura_lote_detallesModel;
	}
	
	public function setfactura_lote_detallesModel($factura_lote_detallesModel) {
		$this->factura_lote_detallesModel = $factura_lote_detallesModel;
	}
	
	public function getfactura_lote_detalles() : array {		
		return $this->factura_lote_detalles;
	}
	
	public function setfactura_lote_detalles(array $factura_lote_detalles) {
		$this->factura_lote_detalles= $factura_lote_detalles;
	}
	
	public function getfactura_lote_detallesEliminados() : array {		
		return $this->factura_lote_detallesEliminados;
	}
	
	public function setfactura_lote_detallesEliminados(array $factura_lote_detallesEliminados) {
		$this->factura_lote_detallesEliminados= $factura_lote_detallesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getfactura_lote_detalleActualFromListDataModel() {
		try {
			/*$factura_lote_detalleClase= $this->factura_lote_detallesModel->getRowData();*/
			
			/*return $factura_lote_detalle;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
