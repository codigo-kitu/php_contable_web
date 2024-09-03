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

namespace com\bydan\contabilidad\inventario\cotizacion_detalle\presentation\control;

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

use com\bydan\contabilidad\inventario\cotizacion_detalle\business\entity\cotizacion_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/cotizacion_detalle/util/cotizacion_detalle_carga.php');
use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_carga;

use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_util;
use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_param_return;
use com\bydan\contabilidad\inventario\cotizacion_detalle\business\logic\cotizacion_detalle_logic;
use com\bydan\contabilidad\inventario\cotizacion_detalle\business\logic\cotizacion_detalle_logic_add;
use com\bydan\contabilidad\inventario\cotizacion_detalle\presentation\session\cotizacion_detalle_session;


//FK


use com\bydan\contabilidad\inventario\cotizacion\business\entity\cotizacion;
use com\bydan\contabilidad\inventario\cotizacion\business\logic\cotizacion_logic;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_carga;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;

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

use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;
use com\bydan\contabilidad\inventario\otro_suplidor\business\logic\otro_suplidor_logic;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_carga;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
cotizacion_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
cotizacion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
cotizacion_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
cotizacion_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*cotizacion_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class cotizacion_detalle_init_control extends ControllerBase {	
	
	public $cotizacion_detalleClase=null;	
	public $cotizacion_detallesModel=null;	
	public $cotizacion_detallesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcotizacion_detalle=0;	
	public ?int $idcotizacion_detalleActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $cotizacion_detalleLogic=null;
	
	public $cotizacion_detalleActual=null;	
	
	public $cotizacion_detalle=null;
	public $cotizacion_detalles=null;
	public $cotizacion_detallesEliminados=array();
	public $cotizacion_detallesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $cotizacion_detallesLocal=array();
	public ?array $cotizacion_detallesReporte=null;
	public ?array $cotizacion_detallesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcotizacion_detalle='onload';
	public string $strTipoPaginaAuxiliarcotizacion_detalle='none';
	public string $strTipoUsuarioAuxiliarcotizacion_detalle='none';
		
	public $cotizacion_detalleReturnGeneral=null;
	public $cotizacion_detalleParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $cotizacion_detalleModel=null;
	public $cotizacion_detalleControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_cotizacion='';
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
	public string $strMensajeobservacion='';
	public string $strMensajeimpuesto2_porciento='';
	public string $strMensajeimpuesto2_monto='';
	public string $strMensajeid_otro_suplidor='';
	
	
	public string $strVisibleFK_Idbodega='display:table-row';
	public string $strVisibleFK_Idcotizacion='display:table-row';
	public string $strVisibleFK_Idotro_suplidor='display:table-row';
	public string $strVisibleFK_Idproducto='display:table-row';
	public string $strVisibleFK_Idunidad='display:table-row';

	
	public array $cotizacionsFK=array();

	public function getcotizacionsFK():array {
		return $this->cotizacionsFK;
	}

	public function setcotizacionsFK(array $cotizacionsFK) {
		$this->cotizacionsFK = $cotizacionsFK;
	}

	public int $idcotizacionDefaultFK=-1;

	public function getIdcotizacionDefaultFK():int {
		return $this->idcotizacionDefaultFK;
	}

	public function setIdcotizacionDefaultFK(int $idcotizacionDefaultFK) {
		$this->idcotizacionDefaultFK = $idcotizacionDefaultFK;
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

	public array $otro_suplidorsFK=array();

	public function getotro_suplidorsFK():array {
		return $this->otro_suplidorsFK;
	}

	public function setotro_suplidorsFK(array $otro_suplidorsFK) {
		$this->otro_suplidorsFK = $otro_suplidorsFK;
	}

	public int $idotro_suplidorDefaultFK=-1;

	public function getIdotro_suplidorDefaultFK():int {
		return $this->idotro_suplidorDefaultFK;
	}

	public function setIdotro_suplidorDefaultFK(int $idotro_suplidorDefaultFK) {
		$this->idotro_suplidorDefaultFK = $idotro_suplidorDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_bodegaFK_Idbodega=null;

	public  $id_cotizacionFK_Idcotizacion=null;

	public  $id_otro_suplidorFK_Idotro_suplidor=null;

	public  $id_productoFK_Idproducto=null;

	public  $id_unidadFK_Idunidad=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->cotizacion_detalleLogic==null) {
				$this->cotizacion_detalleLogic=new cotizacion_detalle_logic();
			}
			
		} else {
			if($this->cotizacion_detalleLogic==null) {
				$this->cotizacion_detalleLogic=new cotizacion_detalle_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->cotizacion_detalleClase==null) {
				$this->cotizacion_detalleClase=new cotizacion_detalle();
			}
			
			$this->cotizacion_detalleClase->setId(0);	
				
				
			$this->cotizacion_detalleClase->setid_cotizacion(-1);	
			$this->cotizacion_detalleClase->setid_bodega(-1);	
			$this->cotizacion_detalleClase->setid_producto(-1);	
			$this->cotizacion_detalleClase->setid_unidad(-1);	
			$this->cotizacion_detalleClase->setcantidad(0.0);	
			$this->cotizacion_detalleClase->setprecio(0.0);	
			$this->cotizacion_detalleClase->setdescuento_porciento(0.0);	
			$this->cotizacion_detalleClase->setdescuento_monto(0.0);	
			$this->cotizacion_detalleClase->setsub_total(0.0);	
			$this->cotizacion_detalleClase->setiva_porciento(0.0);	
			$this->cotizacion_detalleClase->setiva_monto(0.0);	
			$this->cotizacion_detalleClase->settotal(0.0);	
			$this->cotizacion_detalleClase->setobservacion('');	
			$this->cotizacion_detalleClase->setimpuesto2_porciento(0.0);	
			$this->cotizacion_detalleClase->setimpuesto2_monto(0.0);	
			$this->cotizacion_detalleClase->setid_otro_suplidor(null);	
			
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
		$this->prepararEjecutarMantenimientoBase('cotizacion_detalle');
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
		$this->cargarParametrosReporteBase('cotizacion_detalle');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('cotizacion_detalle');
	}
	
	public function actualizarControllerConReturnGeneral(cotizacion_detalle_param_return $cotizacion_detalleReturnGeneral) {
		if($cotizacion_detalleReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescotizacion_detallesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$cotizacion_detalleReturnGeneral->getsMensajeProceso();
		}
		
		if($cotizacion_detalleReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$cotizacion_detalleReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($cotizacion_detalleReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$cotizacion_detalleReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$cotizacion_detalleReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($cotizacion_detalleReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($cotizacion_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$cotizacion_detalleReturnGeneral->getsFuncionJs();
		}
		
		if($cotizacion_detalleReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(cotizacion_detalle_session $cotizacion_detalle_session){
		$this->strStyleDivArbol=$cotizacion_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cotizacion_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cotizacion_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cotizacion_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cotizacion_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cotizacion_detalle_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$cotizacion_detalle_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(cotizacion_detalle_session $cotizacion_detalle_session){
		$cotizacion_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$cotizacion_detalle_session->strStyleDivHeader='display:none';			
		$cotizacion_detalle_session->strStyleDivContent='width:93%;height:100%';	
		$cotizacion_detalle_session->strStyleDivOpcionesBanner='display:none';	
		$cotizacion_detalle_session->strStyleDivExpandirColapsar='display:none';	
		$cotizacion_detalle_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(cotizacion_detalle_control $cotizacion_detalle_control_session){
		$this->idNuevo=$cotizacion_detalle_control_session->idNuevo;
		$this->cotizacion_detalleActual=$cotizacion_detalle_control_session->cotizacion_detalleActual;
		$this->cotizacion_detalle=$cotizacion_detalle_control_session->cotizacion_detalle;
		$this->cotizacion_detalleClase=$cotizacion_detalle_control_session->cotizacion_detalleClase;
		$this->cotizacion_detalles=$cotizacion_detalle_control_session->cotizacion_detalles;
		$this->cotizacion_detallesEliminados=$cotizacion_detalle_control_session->cotizacion_detallesEliminados;
		$this->cotizacion_detalle=$cotizacion_detalle_control_session->cotizacion_detalle;
		$this->cotizacion_detallesReporte=$cotizacion_detalle_control_session->cotizacion_detallesReporte;
		$this->cotizacion_detallesSeleccionados=$cotizacion_detalle_control_session->cotizacion_detallesSeleccionados;
		$this->arrOrderBy=$cotizacion_detalle_control_session->arrOrderBy;
		$this->arrOrderByRel=$cotizacion_detalle_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$cotizacion_detalle_control_session->arrHistoryWebs;
		$this->arrSessionBases=$cotizacion_detalle_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcotizacion_detalle=$cotizacion_detalle_control_session->strTypeOnLoadcotizacion_detalle;
		$this->strTipoPaginaAuxiliarcotizacion_detalle=$cotizacion_detalle_control_session->strTipoPaginaAuxiliarcotizacion_detalle;
		$this->strTipoUsuarioAuxiliarcotizacion_detalle=$cotizacion_detalle_control_session->strTipoUsuarioAuxiliarcotizacion_detalle;	
		
		$this->bitEsPopup=$cotizacion_detalle_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$cotizacion_detalle_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$cotizacion_detalle_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$cotizacion_detalle_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$cotizacion_detalle_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$cotizacion_detalle_control_session->strSufijo;
		$this->bitEsRelaciones=$cotizacion_detalle_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$cotizacion_detalle_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$cotizacion_detalle_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$cotizacion_detalle_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$cotizacion_detalle_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$cotizacion_detalle_control_session->strTituloTabla;
		$this->strTituloPathPagina=$cotizacion_detalle_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$cotizacion_detalle_control_session->strTituloPathElementoActual;
		
		if($this->cotizacion_detalleLogic==null) {			
			$this->cotizacion_detalleLogic=new cotizacion_detalle_logic();
		}
		
		
		if($this->cotizacion_detalleClase==null) {
			$this->cotizacion_detalleClase=new cotizacion_detalle();	
		}
		
		$this->cotizacion_detalleLogic->setcotizacion_detalle($this->cotizacion_detalleClase);
		
		
		if($this->cotizacion_detalles==null) {
			$this->cotizacion_detalles=array();	
		}
		
		$this->cotizacion_detalleLogic->setcotizacion_detalles($this->cotizacion_detalles);
		
		
		$this->strTipoView=$cotizacion_detalle_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$cotizacion_detalle_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$cotizacion_detalle_control_session->datosCliente;
		$this->strAccionBusqueda=$cotizacion_detalle_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$cotizacion_detalle_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$cotizacion_detalle_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$cotizacion_detalle_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$cotizacion_detalle_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$cotizacion_detalle_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$cotizacion_detalle_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$cotizacion_detalle_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$cotizacion_detalle_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$cotizacion_detalle_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$cotizacion_detalle_control_session->strTipoPaginacion;
		$this->strTipoAccion=$cotizacion_detalle_control_session->strTipoAccion;
		$this->tiposReportes=$cotizacion_detalle_control_session->tiposReportes;
		$this->tiposReporte=$cotizacion_detalle_control_session->tiposReporte;
		$this->tiposAcciones=$cotizacion_detalle_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$cotizacion_detalle_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$cotizacion_detalle_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$cotizacion_detalle_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$cotizacion_detalle_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$cotizacion_detalle_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$cotizacion_detalle_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$cotizacion_detalle_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$cotizacion_detalle_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$cotizacion_detalle_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$cotizacion_detalle_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$cotizacion_detalle_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$cotizacion_detalle_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$cotizacion_detalle_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$cotizacion_detalle_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$cotizacion_detalle_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$cotizacion_detalle_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$cotizacion_detalle_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$cotizacion_detalle_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$cotizacion_detalle_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$cotizacion_detalle_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$cotizacion_detalle_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$cotizacion_detalle_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$cotizacion_detalle_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$cotizacion_detalle_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$cotizacion_detalle_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$cotizacion_detalle_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$cotizacion_detalle_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$cotizacion_detalle_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$cotizacion_detalle_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$cotizacion_detalle_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$cotizacion_detalle_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$cotizacion_detalle_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$cotizacion_detalle_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$cotizacion_detalle_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$cotizacion_detalle_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$cotizacion_detalle_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$cotizacion_detalle_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$cotizacion_detalle_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$cotizacion_detalle_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$cotizacion_detalle_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$cotizacion_detalle_control_session->resumenUsuarioActual;	
		$this->moduloActual=$cotizacion_detalle_control_session->moduloActual;	
		$this->opcionActual=$cotizacion_detalle_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$cotizacion_detalle_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$cotizacion_detalle_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$cotizacion_detalle_session=unserialize($this->Session->read(cotizacion_detalle_util::$STR_SESSION_NAME));
				
		if($cotizacion_detalle_session==null) {
			$cotizacion_detalle_session=new cotizacion_detalle_session();
		}
		
		$this->strStyleDivArbol=$cotizacion_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$cotizacion_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$cotizacion_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$cotizacion_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$cotizacion_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$cotizacion_detalle_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$cotizacion_detalle_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$cotizacion_detalle_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$cotizacion_detalle_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$cotizacion_detalle_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$cotizacion_detalle_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_cotizacion=$cotizacion_detalle_control_session->strMensajeid_cotizacion;
		$this->strMensajeid_bodega=$cotizacion_detalle_control_session->strMensajeid_bodega;
		$this->strMensajeid_producto=$cotizacion_detalle_control_session->strMensajeid_producto;
		$this->strMensajeid_unidad=$cotizacion_detalle_control_session->strMensajeid_unidad;
		$this->strMensajecantidad=$cotizacion_detalle_control_session->strMensajecantidad;
		$this->strMensajeprecio=$cotizacion_detalle_control_session->strMensajeprecio;
		$this->strMensajedescuento_porciento=$cotizacion_detalle_control_session->strMensajedescuento_porciento;
		$this->strMensajedescuento_monto=$cotizacion_detalle_control_session->strMensajedescuento_monto;
		$this->strMensajesub_total=$cotizacion_detalle_control_session->strMensajesub_total;
		$this->strMensajeiva_porciento=$cotizacion_detalle_control_session->strMensajeiva_porciento;
		$this->strMensajeiva_monto=$cotizacion_detalle_control_session->strMensajeiva_monto;
		$this->strMensajetotal=$cotizacion_detalle_control_session->strMensajetotal;
		$this->strMensajeobservacion=$cotizacion_detalle_control_session->strMensajeobservacion;
		$this->strMensajeimpuesto2_porciento=$cotizacion_detalle_control_session->strMensajeimpuesto2_porciento;
		$this->strMensajeimpuesto2_monto=$cotizacion_detalle_control_session->strMensajeimpuesto2_monto;
		$this->strMensajeid_otro_suplidor=$cotizacion_detalle_control_session->strMensajeid_otro_suplidor;
			
		
		$this->cotizacionsFK=$cotizacion_detalle_control_session->cotizacionsFK;
		$this->idcotizacionDefaultFK=$cotizacion_detalle_control_session->idcotizacionDefaultFK;
		$this->bodegasFK=$cotizacion_detalle_control_session->bodegasFK;
		$this->idbodegaDefaultFK=$cotizacion_detalle_control_session->idbodegaDefaultFK;
		$this->productosFK=$cotizacion_detalle_control_session->productosFK;
		$this->idproductoDefaultFK=$cotizacion_detalle_control_session->idproductoDefaultFK;
		$this->unidadsFK=$cotizacion_detalle_control_session->unidadsFK;
		$this->idunidadDefaultFK=$cotizacion_detalle_control_session->idunidadDefaultFK;
		$this->otro_suplidorsFK=$cotizacion_detalle_control_session->otro_suplidorsFK;
		$this->idotro_suplidorDefaultFK=$cotizacion_detalle_control_session->idotro_suplidorDefaultFK;
		
		
		$this->strVisibleFK_Idbodega=$cotizacion_detalle_control_session->strVisibleFK_Idbodega;
		$this->strVisibleFK_Idcotizacion=$cotizacion_detalle_control_session->strVisibleFK_Idcotizacion;
		$this->strVisibleFK_Idotro_suplidor=$cotizacion_detalle_control_session->strVisibleFK_Idotro_suplidor;
		$this->strVisibleFK_Idproducto=$cotizacion_detalle_control_session->strVisibleFK_Idproducto;
		$this->strVisibleFK_Idunidad=$cotizacion_detalle_control_session->strVisibleFK_Idunidad;
		
		
		
		
		$this->id_bodegaFK_Idbodega=$cotizacion_detalle_control_session->id_bodegaFK_Idbodega;
		$this->id_cotizacionFK_Idcotizacion=$cotizacion_detalle_control_session->id_cotizacionFK_Idcotizacion;
		$this->id_otro_suplidorFK_Idotro_suplidor=$cotizacion_detalle_control_session->id_otro_suplidorFK_Idotro_suplidor;
		$this->id_productoFK_Idproducto=$cotizacion_detalle_control_session->id_productoFK_Idproducto;
		$this->id_unidadFK_Idunidad=$cotizacion_detalle_control_session->id_unidadFK_Idunidad;

		
		
		
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
	
	public function getcotizacion_detalleControllerAdditional() {
		return $this->cotizacion_detalleControllerAdditional;
	}

	public function setcotizacion_detalleControllerAdditional($cotizacion_detalleControllerAdditional) {
		$this->cotizacion_detalleControllerAdditional = $cotizacion_detalleControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcotizacion_detalleActual() : cotizacion_detalle {
		return $this->cotizacion_detalleActual;
	}

	public function setcotizacion_detalleActual(cotizacion_detalle $cotizacion_detalleActual) {
		$this->cotizacion_detalleActual = $cotizacion_detalleActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcotizacion_detalle() : int {
		return $this->idcotizacion_detalle;
	}

	public function setidcotizacion_detalle(int $idcotizacion_detalle) {
		$this->idcotizacion_detalle = $idcotizacion_detalle;
	}
	
	public function getcotizacion_detalle() : cotizacion_detalle {
		return $this->cotizacion_detalle;
	}

	public function setcotizacion_detalle(cotizacion_detalle $cotizacion_detalle) {
		$this->cotizacion_detalle = $cotizacion_detalle;
	}
		
	public function getcotizacion_detalleLogic() : cotizacion_detalle_logic {		
		return $this->cotizacion_detalleLogic;
	}

	public function setcotizacion_detalleLogic(cotizacion_detalle_logic $cotizacion_detalleLogic) {
		$this->cotizacion_detalleLogic = $cotizacion_detalleLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcotizacion_detallesModel() {		
		try {						
			/*cotizacion_detallesModel.setWrappedData(cotizacion_detalleLogic->getcotizacion_detalles());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->cotizacion_detallesModel;
	}
	
	public function setcotizacion_detallesModel($cotizacion_detallesModel) {
		$this->cotizacion_detallesModel = $cotizacion_detallesModel;
	}
	
	public function getcotizacion_detalles() : array {		
		return $this->cotizacion_detalles;
	}
	
	public function setcotizacion_detalles(array $cotizacion_detalles) {
		$this->cotizacion_detalles= $cotizacion_detalles;
	}
	
	public function getcotizacion_detallesEliminados() : array {		
		return $this->cotizacion_detallesEliminados;
	}
	
	public function setcotizacion_detallesEliminados(array $cotizacion_detallesEliminados) {
		$this->cotizacion_detallesEliminados= $cotizacion_detallesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcotizacion_detalleActualFromListDataModel() {
		try {
			/*$cotizacion_detalleClase= $this->cotizacion_detallesModel->getRowData();*/
			
			/*return $cotizacion_detalle;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
