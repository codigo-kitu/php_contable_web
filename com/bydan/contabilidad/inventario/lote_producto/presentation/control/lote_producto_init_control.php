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

namespace com\bydan\contabilidad\inventario\lote_producto\presentation\control;

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

use com\bydan\contabilidad\inventario\lote_producto\business\entity\lote_producto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/lote_producto/util/lote_producto_carga.php');
use com\bydan\contabilidad\inventario\lote_producto\util\lote_producto_carga;

use com\bydan\contabilidad\inventario\lote_producto\util\lote_producto_util;
use com\bydan\contabilidad\inventario\lote_producto\util\lote_producto_param_return;
use com\bydan\contabilidad\inventario\lote_producto\business\logic\lote_producto_logic;
use com\bydan\contabilidad\inventario\lote_producto\presentation\session\lote_producto_session;


//FK


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

//REL


use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_carga;
use com\bydan\contabilidad\inventario\kardex_detalle\util\kardex_detalle_util;
use com\bydan\contabilidad\inventario\kardex_detalle\presentation\session\kardex_detalle_session;


/*CARGA ARCHIVOS FRAMEWORK*/
lote_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
lote_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
lote_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
lote_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*lote_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class lote_producto_init_control extends ControllerBase {	
	
	public $lote_productoClase=null;	
	public $lote_productosModel=null;	
	public $lote_productosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idlote_producto=0;	
	public ?int $idlote_productoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $lote_productoLogic=null;
	
	public $lote_productoActual=null;	
	
	public $lote_producto=null;
	public $lote_productos=null;
	public $lote_productosEliminados=array();
	public $lote_productosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $lote_productosLocal=array();
	public ?array $lote_productosReporte=null;
	public ?array $lote_productosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadlote_producto='onload';
	public string $strTipoPaginaAuxiliarlote_producto='none';
	public string $strTipoUsuarioAuxiliarlote_producto='none';
		
	public $lote_productoReturnGeneral=null;
	public $lote_productoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $lote_productoModel=null;
	public $lote_productoControllerAdditional=null;
	
	
	

	public $kardexdetalleLogic=null;

	public function  getkardex_detalleLogic() {
		return $this->kardexdetalleLogic;
	}

	public function setkardex_detalleLogic($kardexdetalleLogic) {
		$this->kardexdetalleLogic =$kardexdetalleLogic;
	}
 	
	
	public string $strMensajeid_producto='';
	public string $strMensajenro_lote='';
	public string $strMensajedescripcion='';
	public string $strMensajeid_bodega='';
	public string $strMensajefecha_ingreso='';
	public string $strMensajefecha_expiracion='';
	public string $strMensajeubicacion='';
	public string $strMensajecantidad='';
	public string $strMensajecomentario='';
	public string $strMensajenro_documento='';
	public string $strMensajedisponible='';
	public string $strMensajeagotado_en='';
	public string $strMensajenro_item='';
	public string $strMensajeid_proveedor='';
	
	
	public string $strVisibleFK_Idbodega='display:table-row';
	public string $strVisibleFK_Idproducto='display:table-row';
	public string $strVisibleFK_Idproveedor='display:table-row';

	
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

	public array $proveedorsFK=array();

	public function getproveedorsFK():array {
		return $this->proveedorsFK;
	}

	public function setproveedorsFK(array $proveedorsFK) {
		$this->proveedorsFK = $proveedorsFK;
	}

	public int $idproveedorDefaultFK=-1;

	public function getIdproveedorDefaultFK():int {
		return $this->idproveedorDefaultFK;
	}

	public function setIdproveedorDefaultFK(int $idproveedorDefaultFK) {
		$this->idproveedorDefaultFK = $idproveedorDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisoskardex_detalle='none';
	
	
	public  $id_bodegaFK_Idbodega=null;

	public  $id_productoFK_Idproducto=null;

	public  $id_proveedorFK_Idproveedor=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->lote_productoLogic==null) {
				$this->lote_productoLogic=new lote_producto_logic();
			}
			
		} else {
			if($this->lote_productoLogic==null) {
				$this->lote_productoLogic=new lote_producto_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->lote_productoClase==null) {
				$this->lote_productoClase=new lote_producto();
			}
			
			$this->lote_productoClase->setId(0);	
				
				
			$this->lote_productoClase->setid_producto(-1);	
			$this->lote_productoClase->setnro_lote('');	
			$this->lote_productoClase->setdescripcion('');	
			$this->lote_productoClase->setid_bodega(-1);	
			$this->lote_productoClase->setfecha_ingreso(date('Y-m-d'));	
			$this->lote_productoClase->setfecha_expiracion(date('Y-m-d'));	
			$this->lote_productoClase->setubicacion('');	
			$this->lote_productoClase->setcantidad(0.0);	
			$this->lote_productoClase->setcomentario('');	
			$this->lote_productoClase->setnro_documento(0);	
			$this->lote_productoClase->setdisponible(0.0);	
			$this->lote_productoClase->setagotado_en(date('Y-m-d'));	
			$this->lote_productoClase->setnro_item(0);	
			$this->lote_productoClase->setid_proveedor(-1);	
			
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
		$this->prepararEjecutarMantenimientoBase('lote_producto');
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
		$this->cargarParametrosReporteBase('lote_producto');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('lote_producto');
	}
	
	public function actualizarControllerConReturnGeneral(lote_producto_param_return $lote_productoReturnGeneral) {
		if($lote_productoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajeslote_productosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$lote_productoReturnGeneral->getsMensajeProceso();
		}
		
		if($lote_productoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$lote_productoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($lote_productoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$lote_productoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$lote_productoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($lote_productoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($lote_productoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$lote_productoReturnGeneral->getsFuncionJs();
		}
		
		if($lote_productoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(lote_producto_session $lote_producto_session){
		$this->strStyleDivArbol=$lote_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$lote_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$lote_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$lote_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$lote_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$lote_producto_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$lote_producto_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(lote_producto_session $lote_producto_session){
		$lote_producto_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$lote_producto_session->strStyleDivHeader='display:none';			
		$lote_producto_session->strStyleDivContent='width:93%;height:100%';	
		$lote_producto_session->strStyleDivOpcionesBanner='display:none';	
		$lote_producto_session->strStyleDivExpandirColapsar='display:none';	
		$lote_producto_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(lote_producto_control $lote_producto_control_session){
		$this->idNuevo=$lote_producto_control_session->idNuevo;
		$this->lote_productoActual=$lote_producto_control_session->lote_productoActual;
		$this->lote_producto=$lote_producto_control_session->lote_producto;
		$this->lote_productoClase=$lote_producto_control_session->lote_productoClase;
		$this->lote_productos=$lote_producto_control_session->lote_productos;
		$this->lote_productosEliminados=$lote_producto_control_session->lote_productosEliminados;
		$this->lote_producto=$lote_producto_control_session->lote_producto;
		$this->lote_productosReporte=$lote_producto_control_session->lote_productosReporte;
		$this->lote_productosSeleccionados=$lote_producto_control_session->lote_productosSeleccionados;
		$this->arrOrderBy=$lote_producto_control_session->arrOrderBy;
		$this->arrOrderByRel=$lote_producto_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$lote_producto_control_session->arrHistoryWebs;
		$this->arrSessionBases=$lote_producto_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadlote_producto=$lote_producto_control_session->strTypeOnLoadlote_producto;
		$this->strTipoPaginaAuxiliarlote_producto=$lote_producto_control_session->strTipoPaginaAuxiliarlote_producto;
		$this->strTipoUsuarioAuxiliarlote_producto=$lote_producto_control_session->strTipoUsuarioAuxiliarlote_producto;	
		
		$this->bitEsPopup=$lote_producto_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$lote_producto_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$lote_producto_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$lote_producto_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$lote_producto_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$lote_producto_control_session->strSufijo;
		$this->bitEsRelaciones=$lote_producto_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$lote_producto_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$lote_producto_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$lote_producto_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$lote_producto_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$lote_producto_control_session->strTituloTabla;
		$this->strTituloPathPagina=$lote_producto_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$lote_producto_control_session->strTituloPathElementoActual;
		
		if($this->lote_productoLogic==null) {			
			$this->lote_productoLogic=new lote_producto_logic();
		}
		
		
		if($this->lote_productoClase==null) {
			$this->lote_productoClase=new lote_producto();	
		}
		
		$this->lote_productoLogic->setlote_producto($this->lote_productoClase);
		
		
		if($this->lote_productos==null) {
			$this->lote_productos=array();	
		}
		
		$this->lote_productoLogic->setlote_productos($this->lote_productos);
		
		
		$this->strTipoView=$lote_producto_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$lote_producto_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$lote_producto_control_session->datosCliente;
		$this->strAccionBusqueda=$lote_producto_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$lote_producto_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$lote_producto_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$lote_producto_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$lote_producto_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$lote_producto_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$lote_producto_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$lote_producto_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$lote_producto_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$lote_producto_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$lote_producto_control_session->strTipoPaginacion;
		$this->strTipoAccion=$lote_producto_control_session->strTipoAccion;
		$this->tiposReportes=$lote_producto_control_session->tiposReportes;
		$this->tiposReporte=$lote_producto_control_session->tiposReporte;
		$this->tiposAcciones=$lote_producto_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$lote_producto_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$lote_producto_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$lote_producto_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$lote_producto_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$lote_producto_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$lote_producto_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$lote_producto_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$lote_producto_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$lote_producto_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$lote_producto_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$lote_producto_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$lote_producto_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$lote_producto_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$lote_producto_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$lote_producto_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$lote_producto_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$lote_producto_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$lote_producto_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$lote_producto_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$lote_producto_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$lote_producto_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$lote_producto_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$lote_producto_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$lote_producto_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$lote_producto_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$lote_producto_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$lote_producto_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$lote_producto_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$lote_producto_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$lote_producto_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$lote_producto_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$lote_producto_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$lote_producto_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$lote_producto_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$lote_producto_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$lote_producto_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$lote_producto_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$lote_producto_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$lote_producto_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$lote_producto_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$lote_producto_control_session->resumenUsuarioActual;	
		$this->moduloActual=$lote_producto_control_session->moduloActual;	
		$this->opcionActual=$lote_producto_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$lote_producto_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$lote_producto_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$lote_producto_session=unserialize($this->Session->read(lote_producto_util::$STR_SESSION_NAME));
				
		if($lote_producto_session==null) {
			$lote_producto_session=new lote_producto_session();
		}
		
		$this->strStyleDivArbol=$lote_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$lote_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$lote_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$lote_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$lote_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$lote_producto_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$lote_producto_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$lote_producto_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$lote_producto_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$lote_producto_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$lote_producto_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_producto=$lote_producto_control_session->strMensajeid_producto;
		$this->strMensajenro_lote=$lote_producto_control_session->strMensajenro_lote;
		$this->strMensajedescripcion=$lote_producto_control_session->strMensajedescripcion;
		$this->strMensajeid_bodega=$lote_producto_control_session->strMensajeid_bodega;
		$this->strMensajefecha_ingreso=$lote_producto_control_session->strMensajefecha_ingreso;
		$this->strMensajefecha_expiracion=$lote_producto_control_session->strMensajefecha_expiracion;
		$this->strMensajeubicacion=$lote_producto_control_session->strMensajeubicacion;
		$this->strMensajecantidad=$lote_producto_control_session->strMensajecantidad;
		$this->strMensajecomentario=$lote_producto_control_session->strMensajecomentario;
		$this->strMensajenro_documento=$lote_producto_control_session->strMensajenro_documento;
		$this->strMensajedisponible=$lote_producto_control_session->strMensajedisponible;
		$this->strMensajeagotado_en=$lote_producto_control_session->strMensajeagotado_en;
		$this->strMensajenro_item=$lote_producto_control_session->strMensajenro_item;
		$this->strMensajeid_proveedor=$lote_producto_control_session->strMensajeid_proveedor;
			
		
		$this->productosFK=$lote_producto_control_session->productosFK;
		$this->idproductoDefaultFK=$lote_producto_control_session->idproductoDefaultFK;
		$this->bodegasFK=$lote_producto_control_session->bodegasFK;
		$this->idbodegaDefaultFK=$lote_producto_control_session->idbodegaDefaultFK;
		$this->proveedorsFK=$lote_producto_control_session->proveedorsFK;
		$this->idproveedorDefaultFK=$lote_producto_control_session->idproveedorDefaultFK;
		
		
		$this->strVisibleFK_Idbodega=$lote_producto_control_session->strVisibleFK_Idbodega;
		$this->strVisibleFK_Idproducto=$lote_producto_control_session->strVisibleFK_Idproducto;
		$this->strVisibleFK_Idproveedor=$lote_producto_control_session->strVisibleFK_Idproveedor;
		
		
		$this->strTienePermisoskardex_detalle=$lote_producto_control_session->strTienePermisoskardex_detalle;
		
		
		$this->id_bodegaFK_Idbodega=$lote_producto_control_session->id_bodegaFK_Idbodega;
		$this->id_productoFK_Idproducto=$lote_producto_control_session->id_productoFK_Idproducto;
		$this->id_proveedorFK_Idproveedor=$lote_producto_control_session->id_proveedorFK_Idproveedor;

		
		
		
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
	
	public function getlote_productoControllerAdditional() {
		return $this->lote_productoControllerAdditional;
	}

	public function setlote_productoControllerAdditional($lote_productoControllerAdditional) {
		$this->lote_productoControllerAdditional = $lote_productoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getlote_productoActual() : lote_producto {
		return $this->lote_productoActual;
	}

	public function setlote_productoActual(lote_producto $lote_productoActual) {
		$this->lote_productoActual = $lote_productoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidlote_producto() : int {
		return $this->idlote_producto;
	}

	public function setidlote_producto(int $idlote_producto) {
		$this->idlote_producto = $idlote_producto;
	}
	
	public function getlote_producto() : lote_producto {
		return $this->lote_producto;
	}

	public function setlote_producto(lote_producto $lote_producto) {
		$this->lote_producto = $lote_producto;
	}
		
	public function getlote_productoLogic() : lote_producto_logic {		
		return $this->lote_productoLogic;
	}

	public function setlote_productoLogic(lote_producto_logic $lote_productoLogic) {
		$this->lote_productoLogic = $lote_productoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getlote_productosModel() {		
		try {						
			/*lote_productosModel.setWrappedData(lote_productoLogic->getlote_productos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->lote_productosModel;
	}
	
	public function setlote_productosModel($lote_productosModel) {
		$this->lote_productosModel = $lote_productosModel;
	}
	
	public function getlote_productos() : array {		
		return $this->lote_productos;
	}
	
	public function setlote_productos(array $lote_productos) {
		$this->lote_productos= $lote_productos;
	}
	
	public function getlote_productosEliminados() : array {		
		return $this->lote_productosEliminados;
	}
	
	public function setlote_productosEliminados(array $lote_productosEliminados) {
		$this->lote_productosEliminados= $lote_productosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getlote_productoActualFromListDataModel() {
		try {
			/*$lote_productoClase= $this->lote_productosModel->getRowData();*/
			
			/*return $lote_producto;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
