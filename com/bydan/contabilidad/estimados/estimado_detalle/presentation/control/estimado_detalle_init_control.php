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

namespace com\bydan\contabilidad\estimados\estimado_detalle\presentation\control;

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

use com\bydan\contabilidad\estimados\estimado_detalle\business\entity\estimado_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/estimado_detalle/util/estimado_detalle_carga.php');
use com\bydan\contabilidad\estimados\estimado_detalle\util\estimado_detalle_carga;

use com\bydan\contabilidad\estimados\estimado_detalle\util\estimado_detalle_util;
use com\bydan\contabilidad\estimados\estimado_detalle\util\estimado_detalle_param_return;
use com\bydan\contabilidad\estimados\estimado_detalle\business\logic\estimado_detalle_logic;
use com\bydan\contabilidad\estimados\estimado_detalle\presentation\session\estimado_detalle_session;


//FK


use com\bydan\contabilidad\estimados\estimado\business\entity\estimado;
use com\bydan\contabilidad\estimados\estimado\business\logic\estimado_logic;
use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;

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
estimado_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
estimado_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
estimado_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
estimado_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*estimado_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class estimado_detalle_init_control extends ControllerBase {	
	
	public $estimado_detalleClase=null;	
	public $estimado_detallesModel=null;	
	public $estimado_detallesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idestimado_detalle=0;	
	public ?int $idestimado_detalleActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $estimado_detalleLogic=null;
	
	public $estimado_detalleActual=null;	
	
	public $estimado_detalle=null;
	public $estimado_detalles=null;
	public $estimado_detallesEliminados=array();
	public $estimado_detallesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $estimado_detallesLocal=array();
	public ?array $estimado_detallesReporte=null;
	public ?array $estimado_detallesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadestimado_detalle='onload';
	public string $strTipoPaginaAuxiliarestimado_detalle='none';
	public string $strTipoUsuarioAuxiliarestimado_detalle='none';
		
	public $estimado_detalleReturnGeneral=null;
	public $estimado_detalleParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $estimado_detalleModel=null;
	public $estimado_detalleControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_estimado='';
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
	public string $strVisibleFK_Idestimado='display:table-row';
	public string $strVisibleFK_Idproducto='display:table-row';
	public string $strVisibleFK_Idunidad='display:table-row';

	
	public array $estimadosFK=array();

	public function getestimadosFK():array {
		return $this->estimadosFK;
	}

	public function setestimadosFK(array $estimadosFK) {
		$this->estimadosFK = $estimadosFK;
	}

	public int $idestimadoDefaultFK=-1;

	public function getIdestimadoDefaultFK():int {
		return $this->idestimadoDefaultFK;
	}

	public function setIdestimadoDefaultFK(int $idestimadoDefaultFK) {
		$this->idestimadoDefaultFK = $idestimadoDefaultFK;
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

	public  $id_estimadoFK_Idestimado=null;

	public  $id_productoFK_Idproducto=null;

	public  $id_unidadFK_Idunidad=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->estimado_detalleLogic==null) {
				$this->estimado_detalleLogic=new estimado_detalle_logic();
			}
			
		} else {
			if($this->estimado_detalleLogic==null) {
				$this->estimado_detalleLogic=new estimado_detalle_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->estimado_detalleClase==null) {
				$this->estimado_detalleClase=new estimado_detalle();
			}
			
			$this->estimado_detalleClase->setId(0);	
				
				
			$this->estimado_detalleClase->setid_estimado(-1);	
			$this->estimado_detalleClase->setid_bodega(-1);	
			$this->estimado_detalleClase->setid_producto(-1);	
			$this->estimado_detalleClase->setid_unidad(-1);	
			$this->estimado_detalleClase->setcantidad(0.0);	
			$this->estimado_detalleClase->setprecio(0.0);	
			$this->estimado_detalleClase->setdescuento_porciento(0.0);	
			$this->estimado_detalleClase->setdescuento_monto(0.0);	
			$this->estimado_detalleClase->setsub_total(0.0);	
			$this->estimado_detalleClase->setiva_porciento(0.0);	
			$this->estimado_detalleClase->setiva_monto(0.0);	
			$this->estimado_detalleClase->settotal(0.0);	
			$this->estimado_detalleClase->setrecibido(0.0);	
			$this->estimado_detalleClase->setobservacion('');	
			$this->estimado_detalleClase->setimpuesto2_porciento(0.0);	
			$this->estimado_detalleClase->setimpuesto2_monto(0.0);	
			$this->estimado_detalleClase->setcotizacion(0.0);	
			$this->estimado_detalleClase->setmoneda(0);	
			
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
		$this->prepararEjecutarMantenimientoBase('estimado_detalle');
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
		$this->cargarParametrosReporteBase('estimado_detalle');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('estimado_detalle');
	}
	
	public function actualizarControllerConReturnGeneral(estimado_detalle_param_return $estimado_detalleReturnGeneral) {
		if($estimado_detalleReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesestimado_detallesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$estimado_detalleReturnGeneral->getsMensajeProceso();
		}
		
		if($estimado_detalleReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$estimado_detalleReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($estimado_detalleReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$estimado_detalleReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$estimado_detalleReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($estimado_detalleReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($estimado_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$estimado_detalleReturnGeneral->getsFuncionJs();
		}
		
		if($estimado_detalleReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(estimado_detalle_session $estimado_detalle_session){
		$this->strStyleDivArbol=$estimado_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$estimado_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$estimado_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$estimado_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$estimado_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$estimado_detalle_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$estimado_detalle_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(estimado_detalle_session $estimado_detalle_session){
		$estimado_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$estimado_detalle_session->strStyleDivHeader='display:none';			
		$estimado_detalle_session->strStyleDivContent='width:93%;height:100%';	
		$estimado_detalle_session->strStyleDivOpcionesBanner='display:none';	
		$estimado_detalle_session->strStyleDivExpandirColapsar='display:none';	
		$estimado_detalle_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(estimado_detalle_control $estimado_detalle_control_session){
		$this->idNuevo=$estimado_detalle_control_session->idNuevo;
		$this->estimado_detalleActual=$estimado_detalle_control_session->estimado_detalleActual;
		$this->estimado_detalle=$estimado_detalle_control_session->estimado_detalle;
		$this->estimado_detalleClase=$estimado_detalle_control_session->estimado_detalleClase;
		$this->estimado_detalles=$estimado_detalle_control_session->estimado_detalles;
		$this->estimado_detallesEliminados=$estimado_detalle_control_session->estimado_detallesEliminados;
		$this->estimado_detalle=$estimado_detalle_control_session->estimado_detalle;
		$this->estimado_detallesReporte=$estimado_detalle_control_session->estimado_detallesReporte;
		$this->estimado_detallesSeleccionados=$estimado_detalle_control_session->estimado_detallesSeleccionados;
		$this->arrOrderBy=$estimado_detalle_control_session->arrOrderBy;
		$this->arrOrderByRel=$estimado_detalle_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$estimado_detalle_control_session->arrHistoryWebs;
		$this->arrSessionBases=$estimado_detalle_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadestimado_detalle=$estimado_detalle_control_session->strTypeOnLoadestimado_detalle;
		$this->strTipoPaginaAuxiliarestimado_detalle=$estimado_detalle_control_session->strTipoPaginaAuxiliarestimado_detalle;
		$this->strTipoUsuarioAuxiliarestimado_detalle=$estimado_detalle_control_session->strTipoUsuarioAuxiliarestimado_detalle;	
		
		$this->bitEsPopup=$estimado_detalle_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$estimado_detalle_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$estimado_detalle_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$estimado_detalle_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$estimado_detalle_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$estimado_detalle_control_session->strSufijo;
		$this->bitEsRelaciones=$estimado_detalle_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$estimado_detalle_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$estimado_detalle_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$estimado_detalle_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$estimado_detalle_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$estimado_detalle_control_session->strTituloTabla;
		$this->strTituloPathPagina=$estimado_detalle_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$estimado_detalle_control_session->strTituloPathElementoActual;
		
		if($this->estimado_detalleLogic==null) {			
			$this->estimado_detalleLogic=new estimado_detalle_logic();
		}
		
		
		if($this->estimado_detalleClase==null) {
			$this->estimado_detalleClase=new estimado_detalle();	
		}
		
		$this->estimado_detalleLogic->setestimado_detalle($this->estimado_detalleClase);
		
		
		if($this->estimado_detalles==null) {
			$this->estimado_detalles=array();	
		}
		
		$this->estimado_detalleLogic->setestimado_detalles($this->estimado_detalles);
		
		
		$this->strTipoView=$estimado_detalle_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$estimado_detalle_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$estimado_detalle_control_session->datosCliente;
		$this->strAccionBusqueda=$estimado_detalle_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$estimado_detalle_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$estimado_detalle_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$estimado_detalle_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$estimado_detalle_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$estimado_detalle_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$estimado_detalle_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$estimado_detalle_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$estimado_detalle_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$estimado_detalle_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$estimado_detalle_control_session->strTipoPaginacion;
		$this->strTipoAccion=$estimado_detalle_control_session->strTipoAccion;
		$this->tiposReportes=$estimado_detalle_control_session->tiposReportes;
		$this->tiposReporte=$estimado_detalle_control_session->tiposReporte;
		$this->tiposAcciones=$estimado_detalle_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$estimado_detalle_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$estimado_detalle_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$estimado_detalle_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$estimado_detalle_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$estimado_detalle_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$estimado_detalle_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$estimado_detalle_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$estimado_detalle_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$estimado_detalle_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$estimado_detalle_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$estimado_detalle_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$estimado_detalle_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$estimado_detalle_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$estimado_detalle_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$estimado_detalle_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$estimado_detalle_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$estimado_detalle_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$estimado_detalle_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$estimado_detalle_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$estimado_detalle_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$estimado_detalle_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$estimado_detalle_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$estimado_detalle_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$estimado_detalle_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$estimado_detalle_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$estimado_detalle_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$estimado_detalle_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$estimado_detalle_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$estimado_detalle_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$estimado_detalle_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$estimado_detalle_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$estimado_detalle_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$estimado_detalle_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$estimado_detalle_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$estimado_detalle_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$estimado_detalle_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$estimado_detalle_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$estimado_detalle_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$estimado_detalle_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$estimado_detalle_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$estimado_detalle_control_session->resumenUsuarioActual;	
		$this->moduloActual=$estimado_detalle_control_session->moduloActual;	
		$this->opcionActual=$estimado_detalle_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$estimado_detalle_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$estimado_detalle_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$estimado_detalle_session=unserialize($this->Session->read(estimado_detalle_util::$STR_SESSION_NAME));
				
		if($estimado_detalle_session==null) {
			$estimado_detalle_session=new estimado_detalle_session();
		}
		
		$this->strStyleDivArbol=$estimado_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$estimado_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$estimado_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$estimado_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$estimado_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$estimado_detalle_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$estimado_detalle_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$estimado_detalle_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$estimado_detalle_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$estimado_detalle_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$estimado_detalle_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_estimado=$estimado_detalle_control_session->strMensajeid_estimado;
		$this->strMensajeid_bodega=$estimado_detalle_control_session->strMensajeid_bodega;
		$this->strMensajeid_producto=$estimado_detalle_control_session->strMensajeid_producto;
		$this->strMensajeid_unidad=$estimado_detalle_control_session->strMensajeid_unidad;
		$this->strMensajecantidad=$estimado_detalle_control_session->strMensajecantidad;
		$this->strMensajeprecio=$estimado_detalle_control_session->strMensajeprecio;
		$this->strMensajedescuento_porciento=$estimado_detalle_control_session->strMensajedescuento_porciento;
		$this->strMensajedescuento_monto=$estimado_detalle_control_session->strMensajedescuento_monto;
		$this->strMensajesub_total=$estimado_detalle_control_session->strMensajesub_total;
		$this->strMensajeiva_porciento=$estimado_detalle_control_session->strMensajeiva_porciento;
		$this->strMensajeiva_monto=$estimado_detalle_control_session->strMensajeiva_monto;
		$this->strMensajetotal=$estimado_detalle_control_session->strMensajetotal;
		$this->strMensajerecibido=$estimado_detalle_control_session->strMensajerecibido;
		$this->strMensajeobservacion=$estimado_detalle_control_session->strMensajeobservacion;
		$this->strMensajeimpuesto2_porciento=$estimado_detalle_control_session->strMensajeimpuesto2_porciento;
		$this->strMensajeimpuesto2_monto=$estimado_detalle_control_session->strMensajeimpuesto2_monto;
		$this->strMensajecotizacion=$estimado_detalle_control_session->strMensajecotizacion;
		$this->strMensajemoneda=$estimado_detalle_control_session->strMensajemoneda;
			
		
		$this->estimadosFK=$estimado_detalle_control_session->estimadosFK;
		$this->idestimadoDefaultFK=$estimado_detalle_control_session->idestimadoDefaultFK;
		$this->bodegasFK=$estimado_detalle_control_session->bodegasFK;
		$this->idbodegaDefaultFK=$estimado_detalle_control_session->idbodegaDefaultFK;
		$this->productosFK=$estimado_detalle_control_session->productosFK;
		$this->idproductoDefaultFK=$estimado_detalle_control_session->idproductoDefaultFK;
		$this->unidadsFK=$estimado_detalle_control_session->unidadsFK;
		$this->idunidadDefaultFK=$estimado_detalle_control_session->idunidadDefaultFK;
		
		
		$this->strVisibleFK_Idbodega=$estimado_detalle_control_session->strVisibleFK_Idbodega;
		$this->strVisibleFK_Idestimado=$estimado_detalle_control_session->strVisibleFK_Idestimado;
		$this->strVisibleFK_Idproducto=$estimado_detalle_control_session->strVisibleFK_Idproducto;
		$this->strVisibleFK_Idunidad=$estimado_detalle_control_session->strVisibleFK_Idunidad;
		
		
		
		
		$this->id_bodegaFK_Idbodega=$estimado_detalle_control_session->id_bodegaFK_Idbodega;
		$this->id_estimadoFK_Idestimado=$estimado_detalle_control_session->id_estimadoFK_Idestimado;
		$this->id_productoFK_Idproducto=$estimado_detalle_control_session->id_productoFK_Idproducto;
		$this->id_unidadFK_Idunidad=$estimado_detalle_control_session->id_unidadFK_Idunidad;

		
		
		
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
	
	public function getestimado_detalleControllerAdditional() {
		return $this->estimado_detalleControllerAdditional;
	}

	public function setestimado_detalleControllerAdditional($estimado_detalleControllerAdditional) {
		$this->estimado_detalleControllerAdditional = $estimado_detalleControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getestimado_detalleActual() : estimado_detalle {
		return $this->estimado_detalleActual;
	}

	public function setestimado_detalleActual(estimado_detalle $estimado_detalleActual) {
		$this->estimado_detalleActual = $estimado_detalleActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidestimado_detalle() : int {
		return $this->idestimado_detalle;
	}

	public function setidestimado_detalle(int $idestimado_detalle) {
		$this->idestimado_detalle = $idestimado_detalle;
	}
	
	public function getestimado_detalle() : estimado_detalle {
		return $this->estimado_detalle;
	}

	public function setestimado_detalle(estimado_detalle $estimado_detalle) {
		$this->estimado_detalle = $estimado_detalle;
	}
		
	public function getestimado_detalleLogic() : estimado_detalle_logic {		
		return $this->estimado_detalleLogic;
	}

	public function setestimado_detalleLogic(estimado_detalle_logic $estimado_detalleLogic) {
		$this->estimado_detalleLogic = $estimado_detalleLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getestimado_detallesModel() {		
		try {						
			/*estimado_detallesModel.setWrappedData(estimado_detalleLogic->getestimado_detalles());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->estimado_detallesModel;
	}
	
	public function setestimado_detallesModel($estimado_detallesModel) {
		$this->estimado_detallesModel = $estimado_detallesModel;
	}
	
	public function getestimado_detalles() : array {		
		return $this->estimado_detalles;
	}
	
	public function setestimado_detalles(array $estimado_detalles) {
		$this->estimado_detalles= $estimado_detalles;
	}
	
	public function getestimado_detallesEliminados() : array {		
		return $this->estimado_detallesEliminados;
	}
	
	public function setestimado_detallesEliminados(array $estimado_detallesEliminados) {
		$this->estimado_detallesEliminados= $estimado_detallesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getestimado_detalleActualFromListDataModel() {
		try {
			/*$estimado_detalleClase= $this->estimado_detallesModel->getRowData();*/
			
			/*return $estimado_detalle;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
