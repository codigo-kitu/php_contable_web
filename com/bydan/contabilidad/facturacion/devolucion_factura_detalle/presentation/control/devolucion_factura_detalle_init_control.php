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

namespace com\bydan\contabilidad\facturacion\devolucion_factura_detalle\presentation\control;

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

use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\entity\devolucion_factura_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/devolucion_factura_detalle/util/devolucion_factura_detalle_carga.php');
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_carga;

use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_util;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\util\devolucion_factura_detalle_param_return;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\business\logic\devolucion_factura_detalle_logic;
use com\bydan\contabilidad\facturacion\devolucion_factura_detalle\presentation\session\devolucion_factura_detalle_session;


//FK


use com\bydan\contabilidad\facturacion\devolucion_factura\business\entity\devolucion_factura;
use com\bydan\contabilidad\facturacion\devolucion_factura\business\logic\devolucion_factura_logic;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;

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
devolucion_factura_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
devolucion_factura_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
devolucion_factura_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
devolucion_factura_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*devolucion_factura_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class devolucion_factura_detalle_init_control extends ControllerBase {	
	
	public $devolucion_factura_detalleClase=null;	
	public $devolucion_factura_detallesModel=null;	
	public $devolucion_factura_detallesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $iddevolucion_factura_detalle=0;	
	public ?int $iddevolucion_factura_detalleActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $devolucion_factura_detalleLogic=null;
	
	public $devolucion_factura_detalleActual=null;	
	
	public $devolucion_factura_detalle=null;
	public $devolucion_factura_detalles=null;
	public $devolucion_factura_detallesEliminados=array();
	public $devolucion_factura_detallesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $devolucion_factura_detallesLocal=array();
	public ?array $devolucion_factura_detallesReporte=null;
	public ?array $devolucion_factura_detallesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoaddevolucion_factura_detalle='onload';
	public string $strTipoPaginaAuxiliardevolucion_factura_detalle='none';
	public string $strTipoUsuarioAuxiliardevolucion_factura_detalle='none';
		
	public $devolucion_factura_detalleReturnGeneral=null;
	public $devolucion_factura_detalleParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $devolucion_factura_detalleModel=null;
	public $devolucion_factura_detalleControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_devolucion_factura='';
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
	
	
	public string $strVisibleFK_Idbodega='display:table-row';
	public string $strVisibleFK_Iddevolucion_factura='display:table-row';
	public string $strVisibleFK_Idproducto='display:table-row';
	public string $strVisibleFK_Idunidad='display:table-row';

	
	public array $devolucion_facturasFK=array();

	public function getdevolucion_facturasFK():array {
		return $this->devolucion_facturasFK;
	}

	public function setdevolucion_facturasFK(array $devolucion_facturasFK) {
		$this->devolucion_facturasFK = $devolucion_facturasFK;
	}

	public int $iddevolucion_facturaDefaultFK=-1;

	public function getIddevolucion_facturaDefaultFK():int {
		return $this->iddevolucion_facturaDefaultFK;
	}

	public function setIddevolucion_facturaDefaultFK(int $iddevolucion_facturaDefaultFK) {
		$this->iddevolucion_facturaDefaultFK = $iddevolucion_facturaDefaultFK;
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

	public  $id_devolucion_facturaFK_Iddevolucion_factura=null;

	public  $id_productoFK_Idproducto=null;

	public  $id_unidadFK_Idunidad=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->devolucion_factura_detalleLogic==null) {
				$this->devolucion_factura_detalleLogic=new devolucion_factura_detalle_logic();
			}
			
		} else {
			if($this->devolucion_factura_detalleLogic==null) {
				$this->devolucion_factura_detalleLogic=new devolucion_factura_detalle_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->devolucion_factura_detalleClase==null) {
				$this->devolucion_factura_detalleClase=new devolucion_factura_detalle();
			}
			
			$this->devolucion_factura_detalleClase->setId(0);	
				
				
			$this->devolucion_factura_detalleClase->setid_devolucion_factura(-1);	
			$this->devolucion_factura_detalleClase->setid_bodega(-1);	
			$this->devolucion_factura_detalleClase->setid_producto(-1);	
			$this->devolucion_factura_detalleClase->setid_unidad(-1);	
			$this->devolucion_factura_detalleClase->setcantidad(0.0);	
			$this->devolucion_factura_detalleClase->setprecio(0.0);	
			$this->devolucion_factura_detalleClase->setdescuento_porciento(0.0);	
			$this->devolucion_factura_detalleClase->setdescuento_monto(0.0);	
			$this->devolucion_factura_detalleClase->setsub_total(0.0);	
			$this->devolucion_factura_detalleClase->setiva_porciento(0.0);	
			$this->devolucion_factura_detalleClase->setiva_monto(0.0);	
			$this->devolucion_factura_detalleClase->settotal(0.0);	
			$this->devolucion_factura_detalleClase->setrecibido(0.0);	
			$this->devolucion_factura_detalleClase->setobservacion('');	
			$this->devolucion_factura_detalleClase->setimpuesto2_porciento(0.0);	
			$this->devolucion_factura_detalleClase->setimpuesto2_monto(0.0);	
			$this->devolucion_factura_detalleClase->setcotizacion(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('devolucion_factura_detalle');
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
		$this->cargarParametrosReporteBase('devolucion_factura_detalle');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('devolucion_factura_detalle');
	}
	
	public function actualizarControllerConReturnGeneral(devolucion_factura_detalle_param_return $devolucion_factura_detalleReturnGeneral) {
		if($devolucion_factura_detalleReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesdevolucion_factura_detallesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$devolucion_factura_detalleReturnGeneral->getsMensajeProceso();
		}
		
		if($devolucion_factura_detalleReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$devolucion_factura_detalleReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($devolucion_factura_detalleReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$devolucion_factura_detalleReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$devolucion_factura_detalleReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($devolucion_factura_detalleReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($devolucion_factura_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$devolucion_factura_detalleReturnGeneral->getsFuncionJs();
		}
		
		if($devolucion_factura_detalleReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(devolucion_factura_detalle_session $devolucion_factura_detalle_session){
		$this->strStyleDivArbol=$devolucion_factura_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$devolucion_factura_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$devolucion_factura_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$devolucion_factura_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$devolucion_factura_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$devolucion_factura_detalle_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$devolucion_factura_detalle_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(devolucion_factura_detalle_session $devolucion_factura_detalle_session){
		$devolucion_factura_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$devolucion_factura_detalle_session->strStyleDivHeader='display:none';			
		$devolucion_factura_detalle_session->strStyleDivContent='width:93%;height:100%';	
		$devolucion_factura_detalle_session->strStyleDivOpcionesBanner='display:none';	
		$devolucion_factura_detalle_session->strStyleDivExpandirColapsar='display:none';	
		$devolucion_factura_detalle_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(devolucion_factura_detalle_control $devolucion_factura_detalle_control_session){
		$this->idNuevo=$devolucion_factura_detalle_control_session->idNuevo;
		$this->devolucion_factura_detalleActual=$devolucion_factura_detalle_control_session->devolucion_factura_detalleActual;
		$this->devolucion_factura_detalle=$devolucion_factura_detalle_control_session->devolucion_factura_detalle;
		$this->devolucion_factura_detalleClase=$devolucion_factura_detalle_control_session->devolucion_factura_detalleClase;
		$this->devolucion_factura_detalles=$devolucion_factura_detalle_control_session->devolucion_factura_detalles;
		$this->devolucion_factura_detallesEliminados=$devolucion_factura_detalle_control_session->devolucion_factura_detallesEliminados;
		$this->devolucion_factura_detalle=$devolucion_factura_detalle_control_session->devolucion_factura_detalle;
		$this->devolucion_factura_detallesReporte=$devolucion_factura_detalle_control_session->devolucion_factura_detallesReporte;
		$this->devolucion_factura_detallesSeleccionados=$devolucion_factura_detalle_control_session->devolucion_factura_detallesSeleccionados;
		$this->arrOrderBy=$devolucion_factura_detalle_control_session->arrOrderBy;
		$this->arrOrderByRel=$devolucion_factura_detalle_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$devolucion_factura_detalle_control_session->arrHistoryWebs;
		$this->arrSessionBases=$devolucion_factura_detalle_control_session->arrSessionBases;		
		
		$this->strTypeOnLoaddevolucion_factura_detalle=$devolucion_factura_detalle_control_session->strTypeOnLoaddevolucion_factura_detalle;
		$this->strTipoPaginaAuxiliardevolucion_factura_detalle=$devolucion_factura_detalle_control_session->strTipoPaginaAuxiliardevolucion_factura_detalle;
		$this->strTipoUsuarioAuxiliardevolucion_factura_detalle=$devolucion_factura_detalle_control_session->strTipoUsuarioAuxiliardevolucion_factura_detalle;	
		
		$this->bitEsPopup=$devolucion_factura_detalle_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$devolucion_factura_detalle_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$devolucion_factura_detalle_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$devolucion_factura_detalle_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$devolucion_factura_detalle_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$devolucion_factura_detalle_control_session->strSufijo;
		$this->bitEsRelaciones=$devolucion_factura_detalle_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$devolucion_factura_detalle_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$devolucion_factura_detalle_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$devolucion_factura_detalle_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$devolucion_factura_detalle_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$devolucion_factura_detalle_control_session->strTituloTabla;
		$this->strTituloPathPagina=$devolucion_factura_detalle_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$devolucion_factura_detalle_control_session->strTituloPathElementoActual;
		
		if($this->devolucion_factura_detalleLogic==null) {			
			$this->devolucion_factura_detalleLogic=new devolucion_factura_detalle_logic();
		}
		
		
		if($this->devolucion_factura_detalleClase==null) {
			$this->devolucion_factura_detalleClase=new devolucion_factura_detalle();	
		}
		
		$this->devolucion_factura_detalleLogic->setdevolucion_factura_detalle($this->devolucion_factura_detalleClase);
		
		
		if($this->devolucion_factura_detalles==null) {
			$this->devolucion_factura_detalles=array();	
		}
		
		$this->devolucion_factura_detalleLogic->setdevolucion_factura_detalles($this->devolucion_factura_detalles);
		
		
		$this->strTipoView=$devolucion_factura_detalle_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$devolucion_factura_detalle_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$devolucion_factura_detalle_control_session->datosCliente;
		$this->strAccionBusqueda=$devolucion_factura_detalle_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$devolucion_factura_detalle_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$devolucion_factura_detalle_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$devolucion_factura_detalle_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$devolucion_factura_detalle_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$devolucion_factura_detalle_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$devolucion_factura_detalle_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$devolucion_factura_detalle_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$devolucion_factura_detalle_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$devolucion_factura_detalle_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$devolucion_factura_detalle_control_session->strTipoPaginacion;
		$this->strTipoAccion=$devolucion_factura_detalle_control_session->strTipoAccion;
		$this->tiposReportes=$devolucion_factura_detalle_control_session->tiposReportes;
		$this->tiposReporte=$devolucion_factura_detalle_control_session->tiposReporte;
		$this->tiposAcciones=$devolucion_factura_detalle_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$devolucion_factura_detalle_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$devolucion_factura_detalle_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$devolucion_factura_detalle_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$devolucion_factura_detalle_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$devolucion_factura_detalle_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$devolucion_factura_detalle_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$devolucion_factura_detalle_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$devolucion_factura_detalle_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$devolucion_factura_detalle_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$devolucion_factura_detalle_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$devolucion_factura_detalle_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$devolucion_factura_detalle_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$devolucion_factura_detalle_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$devolucion_factura_detalle_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$devolucion_factura_detalle_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$devolucion_factura_detalle_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$devolucion_factura_detalle_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$devolucion_factura_detalle_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$devolucion_factura_detalle_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$devolucion_factura_detalle_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$devolucion_factura_detalle_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$devolucion_factura_detalle_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$devolucion_factura_detalle_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$devolucion_factura_detalle_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$devolucion_factura_detalle_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$devolucion_factura_detalle_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$devolucion_factura_detalle_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$devolucion_factura_detalle_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$devolucion_factura_detalle_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$devolucion_factura_detalle_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$devolucion_factura_detalle_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$devolucion_factura_detalle_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$devolucion_factura_detalle_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$devolucion_factura_detalle_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$devolucion_factura_detalle_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$devolucion_factura_detalle_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$devolucion_factura_detalle_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$devolucion_factura_detalle_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$devolucion_factura_detalle_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$devolucion_factura_detalle_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$devolucion_factura_detalle_control_session->resumenUsuarioActual;	
		$this->moduloActual=$devolucion_factura_detalle_control_session->moduloActual;	
		$this->opcionActual=$devolucion_factura_detalle_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$devolucion_factura_detalle_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$devolucion_factura_detalle_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$devolucion_factura_detalle_session=unserialize($this->Session->read(devolucion_factura_detalle_util::$STR_SESSION_NAME));
				
		if($devolucion_factura_detalle_session==null) {
			$devolucion_factura_detalle_session=new devolucion_factura_detalle_session();
		}
		
		$this->strStyleDivArbol=$devolucion_factura_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$devolucion_factura_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$devolucion_factura_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$devolucion_factura_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$devolucion_factura_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$devolucion_factura_detalle_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$devolucion_factura_detalle_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$devolucion_factura_detalle_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$devolucion_factura_detalle_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$devolucion_factura_detalle_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$devolucion_factura_detalle_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_devolucion_factura=$devolucion_factura_detalle_control_session->strMensajeid_devolucion_factura;
		$this->strMensajeid_bodega=$devolucion_factura_detalle_control_session->strMensajeid_bodega;
		$this->strMensajeid_producto=$devolucion_factura_detalle_control_session->strMensajeid_producto;
		$this->strMensajeid_unidad=$devolucion_factura_detalle_control_session->strMensajeid_unidad;
		$this->strMensajecantidad=$devolucion_factura_detalle_control_session->strMensajecantidad;
		$this->strMensajeprecio=$devolucion_factura_detalle_control_session->strMensajeprecio;
		$this->strMensajedescuento_porciento=$devolucion_factura_detalle_control_session->strMensajedescuento_porciento;
		$this->strMensajedescuento_monto=$devolucion_factura_detalle_control_session->strMensajedescuento_monto;
		$this->strMensajesub_total=$devolucion_factura_detalle_control_session->strMensajesub_total;
		$this->strMensajeiva_porciento=$devolucion_factura_detalle_control_session->strMensajeiva_porciento;
		$this->strMensajeiva_monto=$devolucion_factura_detalle_control_session->strMensajeiva_monto;
		$this->strMensajetotal=$devolucion_factura_detalle_control_session->strMensajetotal;
		$this->strMensajerecibido=$devolucion_factura_detalle_control_session->strMensajerecibido;
		$this->strMensajeobservacion=$devolucion_factura_detalle_control_session->strMensajeobservacion;
		$this->strMensajeimpuesto2_porciento=$devolucion_factura_detalle_control_session->strMensajeimpuesto2_porciento;
		$this->strMensajeimpuesto2_monto=$devolucion_factura_detalle_control_session->strMensajeimpuesto2_monto;
		$this->strMensajecotizacion=$devolucion_factura_detalle_control_session->strMensajecotizacion;
			
		
		$this->devolucion_facturasFK=$devolucion_factura_detalle_control_session->devolucion_facturasFK;
		$this->iddevolucion_facturaDefaultFK=$devolucion_factura_detalle_control_session->iddevolucion_facturaDefaultFK;
		$this->bodegasFK=$devolucion_factura_detalle_control_session->bodegasFK;
		$this->idbodegaDefaultFK=$devolucion_factura_detalle_control_session->idbodegaDefaultFK;
		$this->productosFK=$devolucion_factura_detalle_control_session->productosFK;
		$this->idproductoDefaultFK=$devolucion_factura_detalle_control_session->idproductoDefaultFK;
		$this->unidadsFK=$devolucion_factura_detalle_control_session->unidadsFK;
		$this->idunidadDefaultFK=$devolucion_factura_detalle_control_session->idunidadDefaultFK;
		
		
		$this->strVisibleFK_Idbodega=$devolucion_factura_detalle_control_session->strVisibleFK_Idbodega;
		$this->strVisibleFK_Iddevolucion_factura=$devolucion_factura_detalle_control_session->strVisibleFK_Iddevolucion_factura;
		$this->strVisibleFK_Idproducto=$devolucion_factura_detalle_control_session->strVisibleFK_Idproducto;
		$this->strVisibleFK_Idunidad=$devolucion_factura_detalle_control_session->strVisibleFK_Idunidad;
		
		
		
		
		$this->id_bodegaFK_Idbodega=$devolucion_factura_detalle_control_session->id_bodegaFK_Idbodega;
		$this->id_devolucion_facturaFK_Iddevolucion_factura=$devolucion_factura_detalle_control_session->id_devolucion_facturaFK_Iddevolucion_factura;
		$this->id_productoFK_Idproducto=$devolucion_factura_detalle_control_session->id_productoFK_Idproducto;
		$this->id_unidadFK_Idunidad=$devolucion_factura_detalle_control_session->id_unidadFK_Idunidad;

		
		
		
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
	
	public function getdevolucion_factura_detalleControllerAdditional() {
		return $this->devolucion_factura_detalleControllerAdditional;
	}

	public function setdevolucion_factura_detalleControllerAdditional($devolucion_factura_detalleControllerAdditional) {
		$this->devolucion_factura_detalleControllerAdditional = $devolucion_factura_detalleControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getdevolucion_factura_detalleActual() : devolucion_factura_detalle {
		return $this->devolucion_factura_detalleActual;
	}

	public function setdevolucion_factura_detalleActual(devolucion_factura_detalle $devolucion_factura_detalleActual) {
		$this->devolucion_factura_detalleActual = $devolucion_factura_detalleActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getiddevolucion_factura_detalle() : int {
		return $this->iddevolucion_factura_detalle;
	}

	public function setiddevolucion_factura_detalle(int $iddevolucion_factura_detalle) {
		$this->iddevolucion_factura_detalle = $iddevolucion_factura_detalle;
	}
	
	public function getdevolucion_factura_detalle() : devolucion_factura_detalle {
		return $this->devolucion_factura_detalle;
	}

	public function setdevolucion_factura_detalle(devolucion_factura_detalle $devolucion_factura_detalle) {
		$this->devolucion_factura_detalle = $devolucion_factura_detalle;
	}
		
	public function getdevolucion_factura_detalleLogic() : devolucion_factura_detalle_logic {		
		return $this->devolucion_factura_detalleLogic;
	}

	public function setdevolucion_factura_detalleLogic(devolucion_factura_detalle_logic $devolucion_factura_detalleLogic) {
		$this->devolucion_factura_detalleLogic = $devolucion_factura_detalleLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getdevolucion_factura_detallesModel() {		
		try {						
			/*devolucion_factura_detallesModel.setWrappedData(devolucion_factura_detalleLogic->getdevolucion_factura_detalles());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->devolucion_factura_detallesModel;
	}
	
	public function setdevolucion_factura_detallesModel($devolucion_factura_detallesModel) {
		$this->devolucion_factura_detallesModel = $devolucion_factura_detallesModel;
	}
	
	public function getdevolucion_factura_detalles() : array {		
		return $this->devolucion_factura_detalles;
	}
	
	public function setdevolucion_factura_detalles(array $devolucion_factura_detalles) {
		$this->devolucion_factura_detalles= $devolucion_factura_detalles;
	}
	
	public function getdevolucion_factura_detallesEliminados() : array {		
		return $this->devolucion_factura_detallesEliminados;
	}
	
	public function setdevolucion_factura_detallesEliminados(array $devolucion_factura_detallesEliminados) {
		$this->devolucion_factura_detallesEliminados= $devolucion_factura_detallesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getdevolucion_factura_detalleActualFromListDataModel() {
		try {
			/*$devolucion_factura_detalleClase= $this->devolucion_factura_detallesModel->getRowData();*/
			
			/*return $devolucion_factura_detalle;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
