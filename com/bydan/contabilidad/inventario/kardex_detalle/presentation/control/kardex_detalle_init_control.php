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

namespace com\bydan\contabilidad\inventario\kardex_detalle\presentation\control;

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

use com\bydan\contabilidad\inventario\kardex_detalle\business\entity\kardex_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/kardex_detalle/util/kardex_detalle_carga.php');
use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_carga;

use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_util;
use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_param_return;
use com\bydan\contabilidad\inventario\kardex_detalle\business\logic\kardex_detalle_logic;
use com\bydan\contabilidad\inventario\kardex_detalle\business\logic\kardex_detalle_logic_add;
use com\bydan\contabilidad\inventario\kardex_detalle\presentation\session\kardex_detalle_session;


//FK


use com\bydan\contabilidad\inventario\kardex\business\entity\kardex;
use com\bydan\contabilidad\inventario\kardex\business\logic\kardex_logic;
use com\bydan\contabilidad\inventario\kardex\util\kardex_carga;
use com\bydan\contabilidad\inventario\kardex\util\kardex_util;

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

use com\bydan\contabilidad\inventario\lote_producto\business\entity\lote_producto;
use com\bydan\contabilidad\inventario\lote_producto\business\logic\lote_producto_logic;
use com\bydan\contabilidad\inventario\lote_producto\util\lote_producto_carga;
use com\bydan\contabilidad\inventario\lote_producto\util\lote_producto_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
kardex_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
kardex_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
kardex_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
kardex_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*kardex_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class kardex_detalle_init_control extends ControllerBase {	
	
	public $kardex_detalleClase=null;	
	public $kardex_detallesModel=null;	
	public $kardex_detallesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idkardex_detalle=0;	
	public ?int $idkardex_detalleActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $kardex_detalleLogic=null;
	
	public $kardex_detalleActual=null;	
	
	public $kardex_detalle=null;
	public $kardex_detalles=null;
	public $kardex_detallesEliminados=array();
	public $kardex_detallesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $kardex_detallesLocal=array();
	public ?array $kardex_detallesReporte=null;
	public ?array $kardex_detallesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadkardex_detalle='onload';
	public string $strTipoPaginaAuxiliarkardex_detalle='none';
	public string $strTipoUsuarioAuxiliarkardex_detalle='none';
		
	public $kardex_detalleReturnGeneral=null;
	public $kardex_detalleParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $kardex_detalleModel=null;
	public $kardex_detalleControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_kardex='';
	public string $strMensajenumero_item='';
	public string $strMensajeid_bodega='';
	public string $strMensajeid_producto='';
	public string $strMensajeid_unidad='';
	public string $strMensajecantidad='';
	public string $strMensajecosto='';
	public string $strMensajetotal='';
	public string $strMensajeid_lote_producto='';
	public string $strMensajedescripcion='';
	public string $strMensajecantidad_disponible='';
	public string $strMensajecantidad_disponible_total='';
	public string $strMensajecosto_anterior='';
	
	
	public string $strVisibleFK_Idbodega='display:table-row';
	public string $strVisibleFK_Idkardex='display:table-row';
	public string $strVisibleFK_Idlote='display:table-row';
	public string $strVisibleFK_Idproducto='display:table-row';
	public string $strVisibleFK_Idunidad='display:table-row';

	
	public array $kardexsFK=array();

	public function getkardexsFK():array {
		return $this->kardexsFK;
	}

	public function setkardexsFK(array $kardexsFK) {
		$this->kardexsFK = $kardexsFK;
	}

	public int $idkardexDefaultFK=-1;

	public function getIdkardexDefaultFK():int {
		return $this->idkardexDefaultFK;
	}

	public function setIdkardexDefaultFK(int $idkardexDefaultFK) {
		$this->idkardexDefaultFK = $idkardexDefaultFK;
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

	public array $lote_productosFK=array();

	public function getlote_productosFK():array {
		return $this->lote_productosFK;
	}

	public function setlote_productosFK(array $lote_productosFK) {
		$this->lote_productosFK = $lote_productosFK;
	}

	public int $idlote_productoDefaultFK=-1;

	public function getIdlote_productoDefaultFK():int {
		return $this->idlote_productoDefaultFK;
	}

	public function setIdlote_productoDefaultFK(int $idlote_productoDefaultFK) {
		$this->idlote_productoDefaultFK = $idlote_productoDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_bodegaFK_Idbodega=null;

	public  $id_kardexFK_Idkardex=null;

	public  $id_lote_productoFK_Idlote=null;

	public  $id_productoFK_Idproducto=null;

	public  $id_unidadFK_Idunidad=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->kardex_detalleLogic==null) {
				$this->kardex_detalleLogic=new kardex_detalle_logic();
			}
			
		} else {
			if($this->kardex_detalleLogic==null) {
				$this->kardex_detalleLogic=new kardex_detalle_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->kardex_detalleClase==null) {
				$this->kardex_detalleClase=new kardex_detalle();
			}
			
			$this->kardex_detalleClase->setId(0);	
				
				
			$this->kardex_detalleClase->setid_kardex(null);	
			$this->kardex_detalleClase->setnumero_item(0);	
			$this->kardex_detalleClase->setid_bodega(-1);	
			$this->kardex_detalleClase->setid_producto(-1);	
			$this->kardex_detalleClase->setid_unidad(-1);	
			$this->kardex_detalleClase->setcantidad(0.0);	
			$this->kardex_detalleClase->setcosto(0.0);	
			$this->kardex_detalleClase->settotal(0.0);	
			$this->kardex_detalleClase->setid_lote_producto(null);	
			$this->kardex_detalleClase->setdescripcion('');	
			$this->kardex_detalleClase->setcantidad_disponible(0.0);	
			$this->kardex_detalleClase->setcantidad_disponible_total(0.0);	
			$this->kardex_detalleClase->setcosto_anterior(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('kardex_detalle');
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
		$this->cargarParametrosReporteBase('kardex_detalle');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('kardex_detalle');
	}
	
	public function actualizarControllerConReturnGeneral(kardex_detalle_param_return $kardex_detalleReturnGeneral) {
		if($kardex_detalleReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajeskardex_detallesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$kardex_detalleReturnGeneral->getsMensajeProceso();
		}
		
		if($kardex_detalleReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$kardex_detalleReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($kardex_detalleReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$kardex_detalleReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$kardex_detalleReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($kardex_detalleReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($kardex_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$kardex_detalleReturnGeneral->getsFuncionJs();
		}
		
		if($kardex_detalleReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(kardex_detalle_session $kardex_detalle_session){
		$this->strStyleDivArbol=$kardex_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$kardex_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$kardex_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$kardex_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$kardex_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$kardex_detalle_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$kardex_detalle_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(kardex_detalle_session $kardex_detalle_session){
		$kardex_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$kardex_detalle_session->strStyleDivHeader='display:none';			
		$kardex_detalle_session->strStyleDivContent='width:93%;height:100%';	
		$kardex_detalle_session->strStyleDivOpcionesBanner='display:none';	
		$kardex_detalle_session->strStyleDivExpandirColapsar='display:none';	
		$kardex_detalle_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(kardex_detalle_control $kardex_detalle_control_session){
		$this->idNuevo=$kardex_detalle_control_session->idNuevo;
		$this->kardex_detalleActual=$kardex_detalle_control_session->kardex_detalleActual;
		$this->kardex_detalle=$kardex_detalle_control_session->kardex_detalle;
		$this->kardex_detalleClase=$kardex_detalle_control_session->kardex_detalleClase;
		$this->kardex_detalles=$kardex_detalle_control_session->kardex_detalles;
		$this->kardex_detallesEliminados=$kardex_detalle_control_session->kardex_detallesEliminados;
		$this->kardex_detalle=$kardex_detalle_control_session->kardex_detalle;
		$this->kardex_detallesReporte=$kardex_detalle_control_session->kardex_detallesReporte;
		$this->kardex_detallesSeleccionados=$kardex_detalle_control_session->kardex_detallesSeleccionados;
		$this->arrOrderBy=$kardex_detalle_control_session->arrOrderBy;
		$this->arrOrderByRel=$kardex_detalle_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$kardex_detalle_control_session->arrHistoryWebs;
		$this->arrSessionBases=$kardex_detalle_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadkardex_detalle=$kardex_detalle_control_session->strTypeOnLoadkardex_detalle;
		$this->strTipoPaginaAuxiliarkardex_detalle=$kardex_detalle_control_session->strTipoPaginaAuxiliarkardex_detalle;
		$this->strTipoUsuarioAuxiliarkardex_detalle=$kardex_detalle_control_session->strTipoUsuarioAuxiliarkardex_detalle;	
		
		$this->bitEsPopup=$kardex_detalle_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$kardex_detalle_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$kardex_detalle_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$kardex_detalle_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$kardex_detalle_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$kardex_detalle_control_session->strSufijo;
		$this->bitEsRelaciones=$kardex_detalle_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$kardex_detalle_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$kardex_detalle_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$kardex_detalle_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$kardex_detalle_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$kardex_detalle_control_session->strTituloTabla;
		$this->strTituloPathPagina=$kardex_detalle_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$kardex_detalle_control_session->strTituloPathElementoActual;
		
		if($this->kardex_detalleLogic==null) {			
			$this->kardex_detalleLogic=new kardex_detalle_logic();
		}
		
		
		if($this->kardex_detalleClase==null) {
			$this->kardex_detalleClase=new kardex_detalle();	
		}
		
		$this->kardex_detalleLogic->setkardex_detalle($this->kardex_detalleClase);
		
		
		if($this->kardex_detalles==null) {
			$this->kardex_detalles=array();	
		}
		
		$this->kardex_detalleLogic->setkardex_detalles($this->kardex_detalles);
		
		
		$this->strTipoView=$kardex_detalle_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$kardex_detalle_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$kardex_detalle_control_session->datosCliente;
		$this->strAccionBusqueda=$kardex_detalle_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$kardex_detalle_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$kardex_detalle_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$kardex_detalle_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$kardex_detalle_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$kardex_detalle_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$kardex_detalle_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$kardex_detalle_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$kardex_detalle_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$kardex_detalle_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$kardex_detalle_control_session->strTipoPaginacion;
		$this->strTipoAccion=$kardex_detalle_control_session->strTipoAccion;
		$this->tiposReportes=$kardex_detalle_control_session->tiposReportes;
		$this->tiposReporte=$kardex_detalle_control_session->tiposReporte;
		$this->tiposAcciones=$kardex_detalle_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$kardex_detalle_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$kardex_detalle_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$kardex_detalle_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$kardex_detalle_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$kardex_detalle_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$kardex_detalle_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$kardex_detalle_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$kardex_detalle_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$kardex_detalle_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$kardex_detalle_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$kardex_detalle_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$kardex_detalle_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$kardex_detalle_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$kardex_detalle_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$kardex_detalle_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$kardex_detalle_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$kardex_detalle_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$kardex_detalle_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$kardex_detalle_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$kardex_detalle_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$kardex_detalle_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$kardex_detalle_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$kardex_detalle_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$kardex_detalle_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$kardex_detalle_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$kardex_detalle_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$kardex_detalle_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$kardex_detalle_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$kardex_detalle_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$kardex_detalle_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$kardex_detalle_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$kardex_detalle_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$kardex_detalle_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$kardex_detalle_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$kardex_detalle_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$kardex_detalle_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$kardex_detalle_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$kardex_detalle_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$kardex_detalle_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$kardex_detalle_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$kardex_detalle_control_session->resumenUsuarioActual;	
		$this->moduloActual=$kardex_detalle_control_session->moduloActual;	
		$this->opcionActual=$kardex_detalle_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$kardex_detalle_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$kardex_detalle_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$kardex_detalle_session=unserialize($this->Session->read(kardex_detalle_util::$STR_SESSION_NAME));
				
		if($kardex_detalle_session==null) {
			$kardex_detalle_session=new kardex_detalle_session();
		}
		
		$this->strStyleDivArbol=$kardex_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$kardex_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$kardex_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$kardex_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$kardex_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$kardex_detalle_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$kardex_detalle_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$kardex_detalle_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$kardex_detalle_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$kardex_detalle_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$kardex_detalle_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_kardex=$kardex_detalle_control_session->strMensajeid_kardex;
		$this->strMensajenumero_item=$kardex_detalle_control_session->strMensajenumero_item;
		$this->strMensajeid_bodega=$kardex_detalle_control_session->strMensajeid_bodega;
		$this->strMensajeid_producto=$kardex_detalle_control_session->strMensajeid_producto;
		$this->strMensajeid_unidad=$kardex_detalle_control_session->strMensajeid_unidad;
		$this->strMensajecantidad=$kardex_detalle_control_session->strMensajecantidad;
		$this->strMensajecosto=$kardex_detalle_control_session->strMensajecosto;
		$this->strMensajetotal=$kardex_detalle_control_session->strMensajetotal;
		$this->strMensajeid_lote_producto=$kardex_detalle_control_session->strMensajeid_lote_producto;
		$this->strMensajedescripcion=$kardex_detalle_control_session->strMensajedescripcion;
		$this->strMensajecantidad_disponible=$kardex_detalle_control_session->strMensajecantidad_disponible;
		$this->strMensajecantidad_disponible_total=$kardex_detalle_control_session->strMensajecantidad_disponible_total;
		$this->strMensajecosto_anterior=$kardex_detalle_control_session->strMensajecosto_anterior;
			
		
		$this->kardexsFK=$kardex_detalle_control_session->kardexsFK;
		$this->idkardexDefaultFK=$kardex_detalle_control_session->idkardexDefaultFK;
		$this->bodegasFK=$kardex_detalle_control_session->bodegasFK;
		$this->idbodegaDefaultFK=$kardex_detalle_control_session->idbodegaDefaultFK;
		$this->productosFK=$kardex_detalle_control_session->productosFK;
		$this->idproductoDefaultFK=$kardex_detalle_control_session->idproductoDefaultFK;
		$this->unidadsFK=$kardex_detalle_control_session->unidadsFK;
		$this->idunidadDefaultFK=$kardex_detalle_control_session->idunidadDefaultFK;
		$this->lote_productosFK=$kardex_detalle_control_session->lote_productosFK;
		$this->idlote_productoDefaultFK=$kardex_detalle_control_session->idlote_productoDefaultFK;
		
		
		$this->strVisibleFK_Idbodega=$kardex_detalle_control_session->strVisibleFK_Idbodega;
		$this->strVisibleFK_Idkardex=$kardex_detalle_control_session->strVisibleFK_Idkardex;
		$this->strVisibleFK_Idlote=$kardex_detalle_control_session->strVisibleFK_Idlote;
		$this->strVisibleFK_Idproducto=$kardex_detalle_control_session->strVisibleFK_Idproducto;
		$this->strVisibleFK_Idunidad=$kardex_detalle_control_session->strVisibleFK_Idunidad;
		
		
		
		
		$this->id_bodegaFK_Idbodega=$kardex_detalle_control_session->id_bodegaFK_Idbodega;
		$this->id_kardexFK_Idkardex=$kardex_detalle_control_session->id_kardexFK_Idkardex;
		$this->id_lote_productoFK_Idlote=$kardex_detalle_control_session->id_lote_productoFK_Idlote;
		$this->id_productoFK_Idproducto=$kardex_detalle_control_session->id_productoFK_Idproducto;
		$this->id_unidadFK_Idunidad=$kardex_detalle_control_session->id_unidadFK_Idunidad;

		
		
		
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
	
	public function getkardex_detalleControllerAdditional() {
		return $this->kardex_detalleControllerAdditional;
	}

	public function setkardex_detalleControllerAdditional($kardex_detalleControllerAdditional) {
		$this->kardex_detalleControllerAdditional = $kardex_detalleControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getkardex_detalleActual() : kardex_detalle {
		return $this->kardex_detalleActual;
	}

	public function setkardex_detalleActual(kardex_detalle $kardex_detalleActual) {
		$this->kardex_detalleActual = $kardex_detalleActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidkardex_detalle() : int {
		return $this->idkardex_detalle;
	}

	public function setidkardex_detalle(int $idkardex_detalle) {
		$this->idkardex_detalle = $idkardex_detalle;
	}
	
	public function getkardex_detalle() : kardex_detalle {
		return $this->kardex_detalle;
	}

	public function setkardex_detalle(kardex_detalle $kardex_detalle) {
		$this->kardex_detalle = $kardex_detalle;
	}
		
	public function getkardex_detalleLogic() : kardex_detalle_logic {		
		return $this->kardex_detalleLogic;
	}

	public function setkardex_detalleLogic(kardex_detalle_logic $kardex_detalleLogic) {
		$this->kardex_detalleLogic = $kardex_detalleLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getkardex_detallesModel() {		
		try {						
			/*kardex_detallesModel.setWrappedData(kardex_detalleLogic->getkardex_detalles());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->kardex_detallesModel;
	}
	
	public function setkardex_detallesModel($kardex_detallesModel) {
		$this->kardex_detallesModel = $kardex_detallesModel;
	}
	
	public function getkardex_detalles() : array {		
		return $this->kardex_detalles;
	}
	
	public function setkardex_detalles(array $kardex_detalles) {
		$this->kardex_detalles= $kardex_detalles;
	}
	
	public function getkardex_detallesEliminados() : array {		
		return $this->kardex_detallesEliminados;
	}
	
	public function setkardex_detallesEliminados(array $kardex_detallesEliminados) {
		$this->kardex_detallesEliminados= $kardex_detallesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getkardex_detalleActualFromListDataModel() {
		try {
			/*$kardex_detalleClase= $this->kardex_detallesModel->getRowData();*/
			
			/*return $kardex_detalle;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
