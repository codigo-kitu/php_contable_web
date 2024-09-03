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

namespace com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\control;

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

use com\bydan\contabilidad\inventario\orden_compra_detalle\business\entity\orden_compra_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/orden_compra_detalle/util/orden_compra_detalle_carga.php');
use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_carga;

use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_util;
use com\bydan\contabilidad\inventario\orden_compra_detalle\util\orden_compra_detalle_param_return;
use com\bydan\contabilidad\inventario\orden_compra_detalle\business\logic\orden_compra_detalle_logic;
use com\bydan\contabilidad\inventario\orden_compra_detalle\business\logic\orden_compra_detalle_logic_add;
use com\bydan\contabilidad\inventario\orden_compra_detalle\presentation\session\orden_compra_detalle_session;


//FK


use com\bydan\contabilidad\inventario\orden_compra\business\entity\orden_compra;
use com\bydan\contabilidad\inventario\orden_compra\business\logic\orden_compra_logic;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;

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
orden_compra_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
orden_compra_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
orden_compra_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
orden_compra_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*orden_compra_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class orden_compra_detalle_init_control extends ControllerBase {	
	
	public $orden_compra_detalleClase=null;	
	public $orden_compra_detallesModel=null;	
	public $orden_compra_detallesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idorden_compra_detalle=0;	
	public ?int $idorden_compra_detalleActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $orden_compra_detalleLogic=null;
	
	public $orden_compra_detalleActual=null;	
	
	public $orden_compra_detalle=null;
	public $orden_compra_detalles=null;
	public $orden_compra_detallesEliminados=array();
	public $orden_compra_detallesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $orden_compra_detallesLocal=array();
	public ?array $orden_compra_detallesReporte=null;
	public ?array $orden_compra_detallesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadorden_compra_detalle='onload';
	public string $strTipoPaginaAuxiliarorden_compra_detalle='none';
	public string $strTipoUsuarioAuxiliarorden_compra_detalle='none';
		
	public $orden_compra_detalleReturnGeneral=null;
	public $orden_compra_detalleParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $orden_compra_detalleModel=null;
	public $orden_compra_detalleControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_orden_compra='';
	public string $strMensajeid_bodega='';
	public string $strMensajeid_producto='';
	public string $strMensajeid_unidad='';
	public string $strMensajecantidad='';
	public string $strMensajeprecio='';
	public string $strMensajesub_total='';
	public string $strMensajedescuento_porciento='';
	public string $strMensajedescuento_monto='';
	public string $strMensajeiva_porciento='';
	public string $strMensajeiva_monto='';
	public string $strMensajetotal='';
	public string $strMensajeobservacion='';
	public string $strMensajerecibido='';
	public string $strMensajeimpuesto2_porciento='';
	public string $strMensajeimpuesto2_monto='';
	
	
	public string $strVisibleFK_Idbodega='display:table-row';
	public string $strVisibleFK_Idorden_compra='display:table-row';
	public string $strVisibleFK_Idproducto='display:table-row';
	public string $strVisibleFK_Idunidad='display:table-row';

	
	public array $orden_comprasFK=array();

	public function getorden_comprasFK():array {
		return $this->orden_comprasFK;
	}

	public function setorden_comprasFK(array $orden_comprasFK) {
		$this->orden_comprasFK = $orden_comprasFK;
	}

	public int $idorden_compraDefaultFK=-1;

	public function getIdorden_compraDefaultFK():int {
		return $this->idorden_compraDefaultFK;
	}

	public function setIdorden_compraDefaultFK(int $idorden_compraDefaultFK) {
		$this->idorden_compraDefaultFK = $idorden_compraDefaultFK;
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

	public  $id_orden_compraFK_Idorden_compra=null;

	public  $id_productoFK_Idproducto=null;

	public  $id_unidadFK_Idunidad=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->orden_compra_detalleLogic==null) {
				$this->orden_compra_detalleLogic=new orden_compra_detalle_logic();
			}
			
		} else {
			if($this->orden_compra_detalleLogic==null) {
				$this->orden_compra_detalleLogic=new orden_compra_detalle_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->orden_compra_detalleClase==null) {
				$this->orden_compra_detalleClase=new orden_compra_detalle();
			}
			
			$this->orden_compra_detalleClase->setId(0);	
				
				
			$this->orden_compra_detalleClase->setid_orden_compra(-1);	
			$this->orden_compra_detalleClase->setid_bodega(-1);	
			$this->orden_compra_detalleClase->setid_producto(-1);	
			$this->orden_compra_detalleClase->setid_unidad(-1);	
			$this->orden_compra_detalleClase->setcantidad(0.0);	
			$this->orden_compra_detalleClase->setprecio(0.0);	
			$this->orden_compra_detalleClase->setsub_total(0.0);	
			$this->orden_compra_detalleClase->setdescuento_porciento(0.0);	
			$this->orden_compra_detalleClase->setdescuento_monto(0.0);	
			$this->orden_compra_detalleClase->setiva_porciento(0.0);	
			$this->orden_compra_detalleClase->setiva_monto(0.0);	
			$this->orden_compra_detalleClase->settotal(0.0);	
			$this->orden_compra_detalleClase->setobservacion('');	
			$this->orden_compra_detalleClase->setrecibido(0.0);	
			$this->orden_compra_detalleClase->setimpuesto2_porciento(0.0);	
			$this->orden_compra_detalleClase->setimpuesto2_monto(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('orden_compra_detalle');
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
		$this->cargarParametrosReporteBase('orden_compra_detalle');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('orden_compra_detalle');
	}
	
	public function actualizarControllerConReturnGeneral(orden_compra_detalle_param_return $orden_compra_detalleReturnGeneral) {
		if($orden_compra_detalleReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesorden_compra_detallesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$orden_compra_detalleReturnGeneral->getsMensajeProceso();
		}
		
		if($orden_compra_detalleReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$orden_compra_detalleReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($orden_compra_detalleReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$orden_compra_detalleReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$orden_compra_detalleReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($orden_compra_detalleReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($orden_compra_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$orden_compra_detalleReturnGeneral->getsFuncionJs();
		}
		
		if($orden_compra_detalleReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(orden_compra_detalle_session $orden_compra_detalle_session){
		$this->strStyleDivArbol=$orden_compra_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$orden_compra_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$orden_compra_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$orden_compra_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$orden_compra_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$orden_compra_detalle_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$orden_compra_detalle_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(orden_compra_detalle_session $orden_compra_detalle_session){
		$orden_compra_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$orden_compra_detalle_session->strStyleDivHeader='display:none';			
		$orden_compra_detalle_session->strStyleDivContent='width:93%;height:100%';	
		$orden_compra_detalle_session->strStyleDivOpcionesBanner='display:none';	
		$orden_compra_detalle_session->strStyleDivExpandirColapsar='display:none';	
		$orden_compra_detalle_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(orden_compra_detalle_control $orden_compra_detalle_control_session){
		$this->idNuevo=$orden_compra_detalle_control_session->idNuevo;
		$this->orden_compra_detalleActual=$orden_compra_detalle_control_session->orden_compra_detalleActual;
		$this->orden_compra_detalle=$orden_compra_detalle_control_session->orden_compra_detalle;
		$this->orden_compra_detalleClase=$orden_compra_detalle_control_session->orden_compra_detalleClase;
		$this->orden_compra_detalles=$orden_compra_detalle_control_session->orden_compra_detalles;
		$this->orden_compra_detallesEliminados=$orden_compra_detalle_control_session->orden_compra_detallesEliminados;
		$this->orden_compra_detalle=$orden_compra_detalle_control_session->orden_compra_detalle;
		$this->orden_compra_detallesReporte=$orden_compra_detalle_control_session->orden_compra_detallesReporte;
		$this->orden_compra_detallesSeleccionados=$orden_compra_detalle_control_session->orden_compra_detallesSeleccionados;
		$this->arrOrderBy=$orden_compra_detalle_control_session->arrOrderBy;
		$this->arrOrderByRel=$orden_compra_detalle_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$orden_compra_detalle_control_session->arrHistoryWebs;
		$this->arrSessionBases=$orden_compra_detalle_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadorden_compra_detalle=$orden_compra_detalle_control_session->strTypeOnLoadorden_compra_detalle;
		$this->strTipoPaginaAuxiliarorden_compra_detalle=$orden_compra_detalle_control_session->strTipoPaginaAuxiliarorden_compra_detalle;
		$this->strTipoUsuarioAuxiliarorden_compra_detalle=$orden_compra_detalle_control_session->strTipoUsuarioAuxiliarorden_compra_detalle;	
		
		$this->bitEsPopup=$orden_compra_detalle_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$orden_compra_detalle_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$orden_compra_detalle_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$orden_compra_detalle_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$orden_compra_detalle_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$orden_compra_detalle_control_session->strSufijo;
		$this->bitEsRelaciones=$orden_compra_detalle_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$orden_compra_detalle_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$orden_compra_detalle_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$orden_compra_detalle_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$orden_compra_detalle_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$orden_compra_detalle_control_session->strTituloTabla;
		$this->strTituloPathPagina=$orden_compra_detalle_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$orden_compra_detalle_control_session->strTituloPathElementoActual;
		
		if($this->orden_compra_detalleLogic==null) {			
			$this->orden_compra_detalleLogic=new orden_compra_detalle_logic();
		}
		
		
		if($this->orden_compra_detalleClase==null) {
			$this->orden_compra_detalleClase=new orden_compra_detalle();	
		}
		
		$this->orden_compra_detalleLogic->setorden_compra_detalle($this->orden_compra_detalleClase);
		
		
		if($this->orden_compra_detalles==null) {
			$this->orden_compra_detalles=array();	
		}
		
		$this->orden_compra_detalleLogic->setorden_compra_detalles($this->orden_compra_detalles);
		
		
		$this->strTipoView=$orden_compra_detalle_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$orden_compra_detalle_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$orden_compra_detalle_control_session->datosCliente;
		$this->strAccionBusqueda=$orden_compra_detalle_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$orden_compra_detalle_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$orden_compra_detalle_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$orden_compra_detalle_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$orden_compra_detalle_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$orden_compra_detalle_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$orden_compra_detalle_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$orden_compra_detalle_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$orden_compra_detalle_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$orden_compra_detalle_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$orden_compra_detalle_control_session->strTipoPaginacion;
		$this->strTipoAccion=$orden_compra_detalle_control_session->strTipoAccion;
		$this->tiposReportes=$orden_compra_detalle_control_session->tiposReportes;
		$this->tiposReporte=$orden_compra_detalle_control_session->tiposReporte;
		$this->tiposAcciones=$orden_compra_detalle_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$orden_compra_detalle_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$orden_compra_detalle_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$orden_compra_detalle_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$orden_compra_detalle_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$orden_compra_detalle_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$orden_compra_detalle_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$orden_compra_detalle_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$orden_compra_detalle_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$orden_compra_detalle_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$orden_compra_detalle_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$orden_compra_detalle_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$orden_compra_detalle_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$orden_compra_detalle_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$orden_compra_detalle_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$orden_compra_detalle_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$orden_compra_detalle_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$orden_compra_detalle_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$orden_compra_detalle_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$orden_compra_detalle_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$orden_compra_detalle_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$orden_compra_detalle_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$orden_compra_detalle_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$orden_compra_detalle_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$orden_compra_detalle_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$orden_compra_detalle_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$orden_compra_detalle_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$orden_compra_detalle_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$orden_compra_detalle_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$orden_compra_detalle_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$orden_compra_detalle_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$orden_compra_detalle_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$orden_compra_detalle_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$orden_compra_detalle_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$orden_compra_detalle_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$orden_compra_detalle_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$orden_compra_detalle_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$orden_compra_detalle_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$orden_compra_detalle_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$orden_compra_detalle_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$orden_compra_detalle_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$orden_compra_detalle_control_session->resumenUsuarioActual;	
		$this->moduloActual=$orden_compra_detalle_control_session->moduloActual;	
		$this->opcionActual=$orden_compra_detalle_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$orden_compra_detalle_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$orden_compra_detalle_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$orden_compra_detalle_session=unserialize($this->Session->read(orden_compra_detalle_util::$STR_SESSION_NAME));
				
		if($orden_compra_detalle_session==null) {
			$orden_compra_detalle_session=new orden_compra_detalle_session();
		}
		
		$this->strStyleDivArbol=$orden_compra_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$orden_compra_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$orden_compra_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$orden_compra_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$orden_compra_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$orden_compra_detalle_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$orden_compra_detalle_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$orden_compra_detalle_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$orden_compra_detalle_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$orden_compra_detalle_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$orden_compra_detalle_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_orden_compra=$orden_compra_detalle_control_session->strMensajeid_orden_compra;
		$this->strMensajeid_bodega=$orden_compra_detalle_control_session->strMensajeid_bodega;
		$this->strMensajeid_producto=$orden_compra_detalle_control_session->strMensajeid_producto;
		$this->strMensajeid_unidad=$orden_compra_detalle_control_session->strMensajeid_unidad;
		$this->strMensajecantidad=$orden_compra_detalle_control_session->strMensajecantidad;
		$this->strMensajeprecio=$orden_compra_detalle_control_session->strMensajeprecio;
		$this->strMensajesub_total=$orden_compra_detalle_control_session->strMensajesub_total;
		$this->strMensajedescuento_porciento=$orden_compra_detalle_control_session->strMensajedescuento_porciento;
		$this->strMensajedescuento_monto=$orden_compra_detalle_control_session->strMensajedescuento_monto;
		$this->strMensajeiva_porciento=$orden_compra_detalle_control_session->strMensajeiva_porciento;
		$this->strMensajeiva_monto=$orden_compra_detalle_control_session->strMensajeiva_monto;
		$this->strMensajetotal=$orden_compra_detalle_control_session->strMensajetotal;
		$this->strMensajeobservacion=$orden_compra_detalle_control_session->strMensajeobservacion;
		$this->strMensajerecibido=$orden_compra_detalle_control_session->strMensajerecibido;
		$this->strMensajeimpuesto2_porciento=$orden_compra_detalle_control_session->strMensajeimpuesto2_porciento;
		$this->strMensajeimpuesto2_monto=$orden_compra_detalle_control_session->strMensajeimpuesto2_monto;
			
		
		$this->orden_comprasFK=$orden_compra_detalle_control_session->orden_comprasFK;
		$this->idorden_compraDefaultFK=$orden_compra_detalle_control_session->idorden_compraDefaultFK;
		$this->bodegasFK=$orden_compra_detalle_control_session->bodegasFK;
		$this->idbodegaDefaultFK=$orden_compra_detalle_control_session->idbodegaDefaultFK;
		$this->productosFK=$orden_compra_detalle_control_session->productosFK;
		$this->idproductoDefaultFK=$orden_compra_detalle_control_session->idproductoDefaultFK;
		$this->unidadsFK=$orden_compra_detalle_control_session->unidadsFK;
		$this->idunidadDefaultFK=$orden_compra_detalle_control_session->idunidadDefaultFK;
		
		
		$this->strVisibleFK_Idbodega=$orden_compra_detalle_control_session->strVisibleFK_Idbodega;
		$this->strVisibleFK_Idorden_compra=$orden_compra_detalle_control_session->strVisibleFK_Idorden_compra;
		$this->strVisibleFK_Idproducto=$orden_compra_detalle_control_session->strVisibleFK_Idproducto;
		$this->strVisibleFK_Idunidad=$orden_compra_detalle_control_session->strVisibleFK_Idunidad;
		
		
		
		
		$this->id_bodegaFK_Idbodega=$orden_compra_detalle_control_session->id_bodegaFK_Idbodega;
		$this->id_orden_compraFK_Idorden_compra=$orden_compra_detalle_control_session->id_orden_compraFK_Idorden_compra;
		$this->id_productoFK_Idproducto=$orden_compra_detalle_control_session->id_productoFK_Idproducto;
		$this->id_unidadFK_Idunidad=$orden_compra_detalle_control_session->id_unidadFK_Idunidad;

		
		
		
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
	
	public function getorden_compra_detalleControllerAdditional() {
		return $this->orden_compra_detalleControllerAdditional;
	}

	public function setorden_compra_detalleControllerAdditional($orden_compra_detalleControllerAdditional) {
		$this->orden_compra_detalleControllerAdditional = $orden_compra_detalleControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getorden_compra_detalleActual() : orden_compra_detalle {
		return $this->orden_compra_detalleActual;
	}

	public function setorden_compra_detalleActual(orden_compra_detalle $orden_compra_detalleActual) {
		$this->orden_compra_detalleActual = $orden_compra_detalleActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidorden_compra_detalle() : int {
		return $this->idorden_compra_detalle;
	}

	public function setidorden_compra_detalle(int $idorden_compra_detalle) {
		$this->idorden_compra_detalle = $idorden_compra_detalle;
	}
	
	public function getorden_compra_detalle() : orden_compra_detalle {
		return $this->orden_compra_detalle;
	}

	public function setorden_compra_detalle(orden_compra_detalle $orden_compra_detalle) {
		$this->orden_compra_detalle = $orden_compra_detalle;
	}
		
	public function getorden_compra_detalleLogic() : orden_compra_detalle_logic {		
		return $this->orden_compra_detalleLogic;
	}

	public function setorden_compra_detalleLogic(orden_compra_detalle_logic $orden_compra_detalleLogic) {
		$this->orden_compra_detalleLogic = $orden_compra_detalleLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getorden_compra_detallesModel() {		
		try {						
			/*orden_compra_detallesModel.setWrappedData(orden_compra_detalleLogic->getorden_compra_detalles());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->orden_compra_detallesModel;
	}
	
	public function setorden_compra_detallesModel($orden_compra_detallesModel) {
		$this->orden_compra_detallesModel = $orden_compra_detallesModel;
	}
	
	public function getorden_compra_detalles() : array {		
		return $this->orden_compra_detalles;
	}
	
	public function setorden_compra_detalles(array $orden_compra_detalles) {
		$this->orden_compra_detalles= $orden_compra_detalles;
	}
	
	public function getorden_compra_detallesEliminados() : array {		
		return $this->orden_compra_detallesEliminados;
	}
	
	public function setorden_compra_detallesEliminados(array $orden_compra_detallesEliminados) {
		$this->orden_compra_detallesEliminados= $orden_compra_detallesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getorden_compra_detalleActualFromListDataModel() {
		try {
			/*$orden_compra_detalleClase= $this->orden_compra_detallesModel->getRowData();*/
			
			/*return $orden_compra_detalle;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
