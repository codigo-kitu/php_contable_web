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

namespace com\bydan\contabilidad\inventario\precio_producto\presentation\control;

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

use com\bydan\contabilidad\inventario\precio_producto\business\entity\precio_producto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/precio_producto/util/precio_producto_carga.php');
use com\bydan\contabilidad\inventario\precio_producto\util\precio_producto_carga;

use com\bydan\contabilidad\inventario\precio_producto\util\precio_producto_util;
use com\bydan\contabilidad\inventario\precio_producto\util\precio_producto_param_return;
use com\bydan\contabilidad\inventario\precio_producto\business\logic\precio_producto_logic;
use com\bydan\contabilidad\inventario\precio_producto\presentation\session\precio_producto_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\tipo_precio\business\entity\tipo_precio;
use com\bydan\contabilidad\inventario\tipo_precio\business\logic\tipo_precio_logic;
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_carga;
use com\bydan\contabilidad\inventario\tipo_precio\util\tipo_precio_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
precio_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
precio_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
precio_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
precio_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*precio_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class precio_producto_init_control extends ControllerBase {	
	
	public $precio_productoClase=null;	
	public $precio_productosModel=null;	
	public $precio_productosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idprecio_producto=0;	
	public ?int $idprecio_productoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $precio_productoLogic=null;
	
	public $precio_productoActual=null;	
	
	public $precio_producto=null;
	public $precio_productos=null;
	public $precio_productosEliminados=array();
	public $precio_productosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $precio_productosLocal=array();
	public ?array $precio_productosReporte=null;
	public ?array $precio_productosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadprecio_producto='onload';
	public string $strTipoPaginaAuxiliarprecio_producto='none';
	public string $strTipoUsuarioAuxiliarprecio_producto='none';
		
	public $precio_productoReturnGeneral=null;
	public $precio_productoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $precio_productoModel=null;
	public $precio_productoControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_bodega='';
	public string $strMensajeid_producto='';
	public string $strMensajeid_tipo_precio='';
	public string $strMensajeprecio='';
	public string $strMensajedescuento_porciento='';
	
	
	public string $strVisibleFK_Idbodega='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idproducto='display:table-row';
	public string $strVisibleFK_Idtipo_precio='display:table-row';

	
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

	public array $tipo_preciosFK=array();

	public function gettipo_preciosFK():array {
		return $this->tipo_preciosFK;
	}

	public function settipo_preciosFK(array $tipo_preciosFK) {
		$this->tipo_preciosFK = $tipo_preciosFK;
	}

	public int $idtipo_precioDefaultFK=-1;

	public function getIdtipo_precioDefaultFK():int {
		return $this->idtipo_precioDefaultFK;
	}

	public function setIdtipo_precioDefaultFK(int $idtipo_precioDefaultFK) {
		$this->idtipo_precioDefaultFK = $idtipo_precioDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_bodegaFK_Idbodega=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_productoFK_Idproducto=null;

	public  $id_tipo_precioFK_Idtipo_precio=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->precio_productoLogic==null) {
				$this->precio_productoLogic=new precio_producto_logic();
			}
			
		} else {
			if($this->precio_productoLogic==null) {
				$this->precio_productoLogic=new precio_producto_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->precio_productoClase==null) {
				$this->precio_productoClase=new precio_producto();
			}
			
			$this->precio_productoClase->setId(0);	
				
				
			$this->precio_productoClase->setid_empresa(-1);	
			$this->precio_productoClase->setid_bodega(-1);	
			$this->precio_productoClase->setid_producto(-1);	
			$this->precio_productoClase->setid_tipo_precio(-1);	
			$this->precio_productoClase->setprecio(0.0);	
			$this->precio_productoClase->setdescuento_porciento(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('precio_producto');
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
		$this->cargarParametrosReporteBase('precio_producto');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('precio_producto');
	}
	
	public function actualizarControllerConReturnGeneral(precio_producto_param_return $precio_productoReturnGeneral) {
		if($precio_productoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesprecio_productosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$precio_productoReturnGeneral->getsMensajeProceso();
		}
		
		if($precio_productoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$precio_productoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($precio_productoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$precio_productoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$precio_productoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($precio_productoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($precio_productoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$precio_productoReturnGeneral->getsFuncionJs();
		}
		
		if($precio_productoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(precio_producto_session $precio_producto_session){
		$this->strStyleDivArbol=$precio_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$precio_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$precio_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$precio_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$precio_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$precio_producto_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$precio_producto_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(precio_producto_session $precio_producto_session){
		$precio_producto_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$precio_producto_session->strStyleDivHeader='display:none';			
		$precio_producto_session->strStyleDivContent='width:93%;height:100%';	
		$precio_producto_session->strStyleDivOpcionesBanner='display:none';	
		$precio_producto_session->strStyleDivExpandirColapsar='display:none';	
		$precio_producto_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(precio_producto_control $precio_producto_control_session){
		$this->idNuevo=$precio_producto_control_session->idNuevo;
		$this->precio_productoActual=$precio_producto_control_session->precio_productoActual;
		$this->precio_producto=$precio_producto_control_session->precio_producto;
		$this->precio_productoClase=$precio_producto_control_session->precio_productoClase;
		$this->precio_productos=$precio_producto_control_session->precio_productos;
		$this->precio_productosEliminados=$precio_producto_control_session->precio_productosEliminados;
		$this->precio_producto=$precio_producto_control_session->precio_producto;
		$this->precio_productosReporte=$precio_producto_control_session->precio_productosReporte;
		$this->precio_productosSeleccionados=$precio_producto_control_session->precio_productosSeleccionados;
		$this->arrOrderBy=$precio_producto_control_session->arrOrderBy;
		$this->arrOrderByRel=$precio_producto_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$precio_producto_control_session->arrHistoryWebs;
		$this->arrSessionBases=$precio_producto_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadprecio_producto=$precio_producto_control_session->strTypeOnLoadprecio_producto;
		$this->strTipoPaginaAuxiliarprecio_producto=$precio_producto_control_session->strTipoPaginaAuxiliarprecio_producto;
		$this->strTipoUsuarioAuxiliarprecio_producto=$precio_producto_control_session->strTipoUsuarioAuxiliarprecio_producto;	
		
		$this->bitEsPopup=$precio_producto_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$precio_producto_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$precio_producto_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$precio_producto_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$precio_producto_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$precio_producto_control_session->strSufijo;
		$this->bitEsRelaciones=$precio_producto_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$precio_producto_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$precio_producto_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$precio_producto_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$precio_producto_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$precio_producto_control_session->strTituloTabla;
		$this->strTituloPathPagina=$precio_producto_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$precio_producto_control_session->strTituloPathElementoActual;
		
		if($this->precio_productoLogic==null) {			
			$this->precio_productoLogic=new precio_producto_logic();
		}
		
		
		if($this->precio_productoClase==null) {
			$this->precio_productoClase=new precio_producto();	
		}
		
		$this->precio_productoLogic->setprecio_producto($this->precio_productoClase);
		
		
		if($this->precio_productos==null) {
			$this->precio_productos=array();	
		}
		
		$this->precio_productoLogic->setprecio_productos($this->precio_productos);
		
		
		$this->strTipoView=$precio_producto_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$precio_producto_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$precio_producto_control_session->datosCliente;
		$this->strAccionBusqueda=$precio_producto_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$precio_producto_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$precio_producto_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$precio_producto_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$precio_producto_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$precio_producto_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$precio_producto_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$precio_producto_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$precio_producto_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$precio_producto_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$precio_producto_control_session->strTipoPaginacion;
		$this->strTipoAccion=$precio_producto_control_session->strTipoAccion;
		$this->tiposReportes=$precio_producto_control_session->tiposReportes;
		$this->tiposReporte=$precio_producto_control_session->tiposReporte;
		$this->tiposAcciones=$precio_producto_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$precio_producto_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$precio_producto_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$precio_producto_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$precio_producto_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$precio_producto_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$precio_producto_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$precio_producto_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$precio_producto_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$precio_producto_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$precio_producto_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$precio_producto_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$precio_producto_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$precio_producto_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$precio_producto_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$precio_producto_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$precio_producto_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$precio_producto_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$precio_producto_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$precio_producto_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$precio_producto_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$precio_producto_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$precio_producto_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$precio_producto_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$precio_producto_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$precio_producto_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$precio_producto_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$precio_producto_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$precio_producto_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$precio_producto_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$precio_producto_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$precio_producto_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$precio_producto_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$precio_producto_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$precio_producto_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$precio_producto_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$precio_producto_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$precio_producto_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$precio_producto_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$precio_producto_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$precio_producto_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$precio_producto_control_session->resumenUsuarioActual;	
		$this->moduloActual=$precio_producto_control_session->moduloActual;	
		$this->opcionActual=$precio_producto_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$precio_producto_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$precio_producto_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$precio_producto_session=unserialize($this->Session->read(precio_producto_util::$STR_SESSION_NAME));
				
		if($precio_producto_session==null) {
			$precio_producto_session=new precio_producto_session();
		}
		
		$this->strStyleDivArbol=$precio_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$precio_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$precio_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$precio_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$precio_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$precio_producto_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$precio_producto_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$precio_producto_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$precio_producto_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$precio_producto_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$precio_producto_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$precio_producto_control_session->strMensajeid_empresa;
		$this->strMensajeid_bodega=$precio_producto_control_session->strMensajeid_bodega;
		$this->strMensajeid_producto=$precio_producto_control_session->strMensajeid_producto;
		$this->strMensajeid_tipo_precio=$precio_producto_control_session->strMensajeid_tipo_precio;
		$this->strMensajeprecio=$precio_producto_control_session->strMensajeprecio;
		$this->strMensajedescuento_porciento=$precio_producto_control_session->strMensajedescuento_porciento;
			
		
		$this->empresasFK=$precio_producto_control_session->empresasFK;
		$this->idempresaDefaultFK=$precio_producto_control_session->idempresaDefaultFK;
		$this->bodegasFK=$precio_producto_control_session->bodegasFK;
		$this->idbodegaDefaultFK=$precio_producto_control_session->idbodegaDefaultFK;
		$this->productosFK=$precio_producto_control_session->productosFK;
		$this->idproductoDefaultFK=$precio_producto_control_session->idproductoDefaultFK;
		$this->tipo_preciosFK=$precio_producto_control_session->tipo_preciosFK;
		$this->idtipo_precioDefaultFK=$precio_producto_control_session->idtipo_precioDefaultFK;
		
		
		$this->strVisibleFK_Idbodega=$precio_producto_control_session->strVisibleFK_Idbodega;
		$this->strVisibleFK_Idempresa=$precio_producto_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idproducto=$precio_producto_control_session->strVisibleFK_Idproducto;
		$this->strVisibleFK_Idtipo_precio=$precio_producto_control_session->strVisibleFK_Idtipo_precio;
		
		
		
		
		$this->id_bodegaFK_Idbodega=$precio_producto_control_session->id_bodegaFK_Idbodega;
		$this->id_empresaFK_Idempresa=$precio_producto_control_session->id_empresaFK_Idempresa;
		$this->id_productoFK_Idproducto=$precio_producto_control_session->id_productoFK_Idproducto;
		$this->id_tipo_precioFK_Idtipo_precio=$precio_producto_control_session->id_tipo_precioFK_Idtipo_precio;

		
		
		
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
	
	public function getprecio_productoControllerAdditional() {
		return $this->precio_productoControllerAdditional;
	}

	public function setprecio_productoControllerAdditional($precio_productoControllerAdditional) {
		$this->precio_productoControllerAdditional = $precio_productoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getprecio_productoActual() : precio_producto {
		return $this->precio_productoActual;
	}

	public function setprecio_productoActual(precio_producto $precio_productoActual) {
		$this->precio_productoActual = $precio_productoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidprecio_producto() : int {
		return $this->idprecio_producto;
	}

	public function setidprecio_producto(int $idprecio_producto) {
		$this->idprecio_producto = $idprecio_producto;
	}
	
	public function getprecio_producto() : precio_producto {
		return $this->precio_producto;
	}

	public function setprecio_producto(precio_producto $precio_producto) {
		$this->precio_producto = $precio_producto;
	}
		
	public function getprecio_productoLogic() : precio_producto_logic {		
		return $this->precio_productoLogic;
	}

	public function setprecio_productoLogic(precio_producto_logic $precio_productoLogic) {
		$this->precio_productoLogic = $precio_productoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getprecio_productosModel() {		
		try {						
			/*precio_productosModel.setWrappedData(precio_productoLogic->getprecio_productos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->precio_productosModel;
	}
	
	public function setprecio_productosModel($precio_productosModel) {
		$this->precio_productosModel = $precio_productosModel;
	}
	
	public function getprecio_productos() : array {		
		return $this->precio_productos;
	}
	
	public function setprecio_productos(array $precio_productos) {
		$this->precio_productos= $precio_productos;
	}
	
	public function getprecio_productosEliminados() : array {		
		return $this->precio_productosEliminados;
	}
	
	public function setprecio_productosEliminados(array $precio_productosEliminados) {
		$this->precio_productosEliminados= $precio_productosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getprecio_productoActualFromListDataModel() {
		try {
			/*$precio_productoClase= $this->precio_productosModel->getRowData();*/
			
			/*return $precio_producto;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
