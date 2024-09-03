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

namespace com\bydan\contabilidad\estimados\consignacion_detalle\presentation\control;

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

use com\bydan\contabilidad\estimados\consignacion_detalle\business\entity\consignacion_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/estimados/consignacion_detalle/util/consignacion_detalle_carga.php');
use com\bydan\contabilidad\estimados\consignacion_detalle\util\consignacion_detalle_carga;

use com\bydan\contabilidad\estimados\consignacion_detalle\util\consignacion_detalle_util;
use com\bydan\contabilidad\estimados\consignacion_detalle\util\consignacion_detalle_param_return;
use com\bydan\contabilidad\estimados\consignacion_detalle\business\logic\consignacion_detalle_logic;
use com\bydan\contabilidad\estimados\consignacion_detalle\presentation\session\consignacion_detalle_session;


//FK


use com\bydan\contabilidad\estimados\consignacion\business\entity\consignacion;
use com\bydan\contabilidad\estimados\consignacion\business\logic\consignacion_logic;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;

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
consignacion_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
consignacion_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
consignacion_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
consignacion_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*consignacion_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class consignacion_detalle_init_control extends ControllerBase {	
	
	public $consignacion_detalleClase=null;	
	public $consignacion_detallesModel=null;	
	public $consignacion_detallesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idconsignacion_detalle=0;	
	public ?int $idconsignacion_detalleActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $consignacion_detalleLogic=null;
	
	public $consignacion_detalleActual=null;	
	
	public $consignacion_detalle=null;
	public $consignacion_detalles=null;
	public $consignacion_detallesEliminados=array();
	public $consignacion_detallesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $consignacion_detallesLocal=array();
	public ?array $consignacion_detallesReporte=null;
	public ?array $consignacion_detallesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadconsignacion_detalle='onload';
	public string $strTipoPaginaAuxiliarconsignacion_detalle='none';
	public string $strTipoUsuarioAuxiliarconsignacion_detalle='none';
		
	public $consignacion_detalleReturnGeneral=null;
	public $consignacion_detalleParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $consignacion_detalleModel=null;
	public $consignacion_detalleControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_consignacion='';
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
	public string $strVisibleFK_Idconsignacion='display:table-row';
	public string $strVisibleFK_Idproducto='display:table-row';
	public string $strVisibleFK_Idunidad='display:table-row';

	
	public array $consignacionsFK=array();

	public function getconsignacionsFK():array {
		return $this->consignacionsFK;
	}

	public function setconsignacionsFK(array $consignacionsFK) {
		$this->consignacionsFK = $consignacionsFK;
	}

	public int $idconsignacionDefaultFK=-1;

	public function getIdconsignacionDefaultFK():int {
		return $this->idconsignacionDefaultFK;
	}

	public function setIdconsignacionDefaultFK(int $idconsignacionDefaultFK) {
		$this->idconsignacionDefaultFK = $idconsignacionDefaultFK;
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

	public  $id_consignacionFK_Idconsignacion=null;

	public  $id_productoFK_Idproducto=null;

	public  $id_unidadFK_Idunidad=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->consignacion_detalleLogic==null) {
				$this->consignacion_detalleLogic=new consignacion_detalle_logic();
			}
			
		} else {
			if($this->consignacion_detalleLogic==null) {
				$this->consignacion_detalleLogic=new consignacion_detalle_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->consignacion_detalleClase==null) {
				$this->consignacion_detalleClase=new consignacion_detalle();
			}
			
			$this->consignacion_detalleClase->setId(0);	
				
				
			$this->consignacion_detalleClase->setid_consignacion(-1);	
			$this->consignacion_detalleClase->setid_bodega(-1);	
			$this->consignacion_detalleClase->setid_producto(-1);	
			$this->consignacion_detalleClase->setid_unidad(-1);	
			$this->consignacion_detalleClase->setcantidad(0.0);	
			$this->consignacion_detalleClase->setprecio(0.0);	
			$this->consignacion_detalleClase->setdescuento_porciento(0.0);	
			$this->consignacion_detalleClase->setdescuento_monto(0.0);	
			$this->consignacion_detalleClase->setsub_total(0.0);	
			$this->consignacion_detalleClase->setiva_porciento(0.0);	
			$this->consignacion_detalleClase->setiva_monto(0.0);	
			$this->consignacion_detalleClase->settotal(0.0);	
			$this->consignacion_detalleClase->setrecibido(0.0);	
			$this->consignacion_detalleClase->setobservacion('');	
			$this->consignacion_detalleClase->setimpuesto2_porciento(0.0);	
			$this->consignacion_detalleClase->setimpuesto2_monto(0.0);	
			$this->consignacion_detalleClase->setcotizacion(0.0);	
			$this->consignacion_detalleClase->setmoneda(0);	
			
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
		$this->prepararEjecutarMantenimientoBase('consignacion_detalle');
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
		$this->cargarParametrosReporteBase('consignacion_detalle');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('consignacion_detalle');
	}
	
	public function actualizarControllerConReturnGeneral(consignacion_detalle_param_return $consignacion_detalleReturnGeneral) {
		if($consignacion_detalleReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesconsignacion_detallesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$consignacion_detalleReturnGeneral->getsMensajeProceso();
		}
		
		if($consignacion_detalleReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$consignacion_detalleReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($consignacion_detalleReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$consignacion_detalleReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$consignacion_detalleReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($consignacion_detalleReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($consignacion_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$consignacion_detalleReturnGeneral->getsFuncionJs();
		}
		
		if($consignacion_detalleReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(consignacion_detalle_session $consignacion_detalle_session){
		$this->strStyleDivArbol=$consignacion_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$consignacion_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$consignacion_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$consignacion_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$consignacion_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$consignacion_detalle_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$consignacion_detalle_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(consignacion_detalle_session $consignacion_detalle_session){
		$consignacion_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$consignacion_detalle_session->strStyleDivHeader='display:none';			
		$consignacion_detalle_session->strStyleDivContent='width:93%;height:100%';	
		$consignacion_detalle_session->strStyleDivOpcionesBanner='display:none';	
		$consignacion_detalle_session->strStyleDivExpandirColapsar='display:none';	
		$consignacion_detalle_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(consignacion_detalle_control $consignacion_detalle_control_session){
		$this->idNuevo=$consignacion_detalle_control_session->idNuevo;
		$this->consignacion_detalleActual=$consignacion_detalle_control_session->consignacion_detalleActual;
		$this->consignacion_detalle=$consignacion_detalle_control_session->consignacion_detalle;
		$this->consignacion_detalleClase=$consignacion_detalle_control_session->consignacion_detalleClase;
		$this->consignacion_detalles=$consignacion_detalle_control_session->consignacion_detalles;
		$this->consignacion_detallesEliminados=$consignacion_detalle_control_session->consignacion_detallesEliminados;
		$this->consignacion_detalle=$consignacion_detalle_control_session->consignacion_detalle;
		$this->consignacion_detallesReporte=$consignacion_detalle_control_session->consignacion_detallesReporte;
		$this->consignacion_detallesSeleccionados=$consignacion_detalle_control_session->consignacion_detallesSeleccionados;
		$this->arrOrderBy=$consignacion_detalle_control_session->arrOrderBy;
		$this->arrOrderByRel=$consignacion_detalle_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$consignacion_detalle_control_session->arrHistoryWebs;
		$this->arrSessionBases=$consignacion_detalle_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadconsignacion_detalle=$consignacion_detalle_control_session->strTypeOnLoadconsignacion_detalle;
		$this->strTipoPaginaAuxiliarconsignacion_detalle=$consignacion_detalle_control_session->strTipoPaginaAuxiliarconsignacion_detalle;
		$this->strTipoUsuarioAuxiliarconsignacion_detalle=$consignacion_detalle_control_session->strTipoUsuarioAuxiliarconsignacion_detalle;	
		
		$this->bitEsPopup=$consignacion_detalle_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$consignacion_detalle_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$consignacion_detalle_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$consignacion_detalle_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$consignacion_detalle_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$consignacion_detalle_control_session->strSufijo;
		$this->bitEsRelaciones=$consignacion_detalle_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$consignacion_detalle_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$consignacion_detalle_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$consignacion_detalle_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$consignacion_detalle_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$consignacion_detalle_control_session->strTituloTabla;
		$this->strTituloPathPagina=$consignacion_detalle_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$consignacion_detalle_control_session->strTituloPathElementoActual;
		
		if($this->consignacion_detalleLogic==null) {			
			$this->consignacion_detalleLogic=new consignacion_detalle_logic();
		}
		
		
		if($this->consignacion_detalleClase==null) {
			$this->consignacion_detalleClase=new consignacion_detalle();	
		}
		
		$this->consignacion_detalleLogic->setconsignacion_detalle($this->consignacion_detalleClase);
		
		
		if($this->consignacion_detalles==null) {
			$this->consignacion_detalles=array();	
		}
		
		$this->consignacion_detalleLogic->setconsignacion_detalles($this->consignacion_detalles);
		
		
		$this->strTipoView=$consignacion_detalle_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$consignacion_detalle_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$consignacion_detalle_control_session->datosCliente;
		$this->strAccionBusqueda=$consignacion_detalle_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$consignacion_detalle_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$consignacion_detalle_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$consignacion_detalle_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$consignacion_detalle_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$consignacion_detalle_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$consignacion_detalle_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$consignacion_detalle_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$consignacion_detalle_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$consignacion_detalle_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$consignacion_detalle_control_session->strTipoPaginacion;
		$this->strTipoAccion=$consignacion_detalle_control_session->strTipoAccion;
		$this->tiposReportes=$consignacion_detalle_control_session->tiposReportes;
		$this->tiposReporte=$consignacion_detalle_control_session->tiposReporte;
		$this->tiposAcciones=$consignacion_detalle_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$consignacion_detalle_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$consignacion_detalle_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$consignacion_detalle_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$consignacion_detalle_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$consignacion_detalle_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$consignacion_detalle_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$consignacion_detalle_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$consignacion_detalle_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$consignacion_detalle_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$consignacion_detalle_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$consignacion_detalle_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$consignacion_detalle_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$consignacion_detalle_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$consignacion_detalle_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$consignacion_detalle_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$consignacion_detalle_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$consignacion_detalle_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$consignacion_detalle_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$consignacion_detalle_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$consignacion_detalle_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$consignacion_detalle_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$consignacion_detalle_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$consignacion_detalle_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$consignacion_detalle_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$consignacion_detalle_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$consignacion_detalle_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$consignacion_detalle_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$consignacion_detalle_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$consignacion_detalle_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$consignacion_detalle_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$consignacion_detalle_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$consignacion_detalle_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$consignacion_detalle_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$consignacion_detalle_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$consignacion_detalle_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$consignacion_detalle_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$consignacion_detalle_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$consignacion_detalle_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$consignacion_detalle_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$consignacion_detalle_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$consignacion_detalle_control_session->resumenUsuarioActual;	
		$this->moduloActual=$consignacion_detalle_control_session->moduloActual;	
		$this->opcionActual=$consignacion_detalle_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$consignacion_detalle_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$consignacion_detalle_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$consignacion_detalle_session=unserialize($this->Session->read(consignacion_detalle_util::$STR_SESSION_NAME));
				
		if($consignacion_detalle_session==null) {
			$consignacion_detalle_session=new consignacion_detalle_session();
		}
		
		$this->strStyleDivArbol=$consignacion_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$consignacion_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$consignacion_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$consignacion_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$consignacion_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$consignacion_detalle_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$consignacion_detalle_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$consignacion_detalle_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$consignacion_detalle_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$consignacion_detalle_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$consignacion_detalle_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_consignacion=$consignacion_detalle_control_session->strMensajeid_consignacion;
		$this->strMensajeid_bodega=$consignacion_detalle_control_session->strMensajeid_bodega;
		$this->strMensajeid_producto=$consignacion_detalle_control_session->strMensajeid_producto;
		$this->strMensajeid_unidad=$consignacion_detalle_control_session->strMensajeid_unidad;
		$this->strMensajecantidad=$consignacion_detalle_control_session->strMensajecantidad;
		$this->strMensajeprecio=$consignacion_detalle_control_session->strMensajeprecio;
		$this->strMensajedescuento_porciento=$consignacion_detalle_control_session->strMensajedescuento_porciento;
		$this->strMensajedescuento_monto=$consignacion_detalle_control_session->strMensajedescuento_monto;
		$this->strMensajesub_total=$consignacion_detalle_control_session->strMensajesub_total;
		$this->strMensajeiva_porciento=$consignacion_detalle_control_session->strMensajeiva_porciento;
		$this->strMensajeiva_monto=$consignacion_detalle_control_session->strMensajeiva_monto;
		$this->strMensajetotal=$consignacion_detalle_control_session->strMensajetotal;
		$this->strMensajerecibido=$consignacion_detalle_control_session->strMensajerecibido;
		$this->strMensajeobservacion=$consignacion_detalle_control_session->strMensajeobservacion;
		$this->strMensajeimpuesto2_porciento=$consignacion_detalle_control_session->strMensajeimpuesto2_porciento;
		$this->strMensajeimpuesto2_monto=$consignacion_detalle_control_session->strMensajeimpuesto2_monto;
		$this->strMensajecotizacion=$consignacion_detalle_control_session->strMensajecotizacion;
		$this->strMensajemoneda=$consignacion_detalle_control_session->strMensajemoneda;
			
		
		$this->consignacionsFK=$consignacion_detalle_control_session->consignacionsFK;
		$this->idconsignacionDefaultFK=$consignacion_detalle_control_session->idconsignacionDefaultFK;
		$this->bodegasFK=$consignacion_detalle_control_session->bodegasFK;
		$this->idbodegaDefaultFK=$consignacion_detalle_control_session->idbodegaDefaultFK;
		$this->productosFK=$consignacion_detalle_control_session->productosFK;
		$this->idproductoDefaultFK=$consignacion_detalle_control_session->idproductoDefaultFK;
		$this->unidadsFK=$consignacion_detalle_control_session->unidadsFK;
		$this->idunidadDefaultFK=$consignacion_detalle_control_session->idunidadDefaultFK;
		
		
		$this->strVisibleFK_Idbodega=$consignacion_detalle_control_session->strVisibleFK_Idbodega;
		$this->strVisibleFK_Idconsignacion=$consignacion_detalle_control_session->strVisibleFK_Idconsignacion;
		$this->strVisibleFK_Idproducto=$consignacion_detalle_control_session->strVisibleFK_Idproducto;
		$this->strVisibleFK_Idunidad=$consignacion_detalle_control_session->strVisibleFK_Idunidad;
		
		
		
		
		$this->id_bodegaFK_Idbodega=$consignacion_detalle_control_session->id_bodegaFK_Idbodega;
		$this->id_consignacionFK_Idconsignacion=$consignacion_detalle_control_session->id_consignacionFK_Idconsignacion;
		$this->id_productoFK_Idproducto=$consignacion_detalle_control_session->id_productoFK_Idproducto;
		$this->id_unidadFK_Idunidad=$consignacion_detalle_control_session->id_unidadFK_Idunidad;

		
		
		
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
	
	public function getconsignacion_detalleControllerAdditional() {
		return $this->consignacion_detalleControllerAdditional;
	}

	public function setconsignacion_detalleControllerAdditional($consignacion_detalleControllerAdditional) {
		$this->consignacion_detalleControllerAdditional = $consignacion_detalleControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getconsignacion_detalleActual() : consignacion_detalle {
		return $this->consignacion_detalleActual;
	}

	public function setconsignacion_detalleActual(consignacion_detalle $consignacion_detalleActual) {
		$this->consignacion_detalleActual = $consignacion_detalleActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidconsignacion_detalle() : int {
		return $this->idconsignacion_detalle;
	}

	public function setidconsignacion_detalle(int $idconsignacion_detalle) {
		$this->idconsignacion_detalle = $idconsignacion_detalle;
	}
	
	public function getconsignacion_detalle() : consignacion_detalle {
		return $this->consignacion_detalle;
	}

	public function setconsignacion_detalle(consignacion_detalle $consignacion_detalle) {
		$this->consignacion_detalle = $consignacion_detalle;
	}
		
	public function getconsignacion_detalleLogic() : consignacion_detalle_logic {		
		return $this->consignacion_detalleLogic;
	}

	public function setconsignacion_detalleLogic(consignacion_detalle_logic $consignacion_detalleLogic) {
		$this->consignacion_detalleLogic = $consignacion_detalleLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getconsignacion_detallesModel() {		
		try {						
			/*consignacion_detallesModel.setWrappedData(consignacion_detalleLogic->getconsignacion_detalles());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->consignacion_detallesModel;
	}
	
	public function setconsignacion_detallesModel($consignacion_detallesModel) {
		$this->consignacion_detallesModel = $consignacion_detallesModel;
	}
	
	public function getconsignacion_detalles() : array {		
		return $this->consignacion_detalles;
	}
	
	public function setconsignacion_detalles(array $consignacion_detalles) {
		$this->consignacion_detalles= $consignacion_detalles;
	}
	
	public function getconsignacion_detallesEliminados() : array {		
		return $this->consignacion_detallesEliminados;
	}
	
	public function setconsignacion_detallesEliminados(array $consignacion_detallesEliminados) {
		$this->consignacion_detallesEliminados= $consignacion_detallesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getconsignacion_detalleActualFromListDataModel() {
		try {
			/*$consignacion_detalleClase= $this->consignacion_detallesModel->getRowData();*/
			
			/*return $consignacion_detalle;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
