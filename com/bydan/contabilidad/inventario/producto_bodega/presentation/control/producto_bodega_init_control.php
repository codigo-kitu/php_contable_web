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

namespace com\bydan\contabilidad\inventario\producto_bodega\presentation\control;

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

use com\bydan\contabilidad\inventario\producto_bodega\business\entity\producto_bodega;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/producto_bodega/util/producto_bodega_carga.php');
use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_carga;

use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_util;
use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_param_return;
use com\bydan\contabilidad\inventario\producto_bodega\business\logic\producto_bodega_logic;
use com\bydan\contabilidad\inventario\producto_bodega\presentation\session\producto_bodega_session;


//FK


use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
producto_bodega_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
producto_bodega_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
producto_bodega_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
producto_bodega_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*producto_bodega_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class producto_bodega_init_control extends ControllerBase {	
	
	public $producto_bodegaClase=null;	
	public $producto_bodegasModel=null;	
	public $producto_bodegasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idproducto_bodega=0;	
	public ?int $idproducto_bodegaActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $producto_bodegaLogic=null;
	
	public $producto_bodegaActual=null;	
	
	public $producto_bodega=null;
	public $producto_bodegas=null;
	public $producto_bodegasEliminados=array();
	public $producto_bodegasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $producto_bodegasLocal=array();
	public ?array $producto_bodegasReporte=null;
	public ?array $producto_bodegasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadproducto_bodega='onload';
	public string $strTipoPaginaAuxiliarproducto_bodega='none';
	public string $strTipoUsuarioAuxiliarproducto_bodega='none';
		
	public $producto_bodegaReturnGeneral=null;
	public $producto_bodegaParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $producto_bodegaModel=null;
	public $producto_bodegaControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_bodega='';
	public string $strMensajeid_producto='';
	public string $strMensajecantidad='';
	public string $strMensajecosto='';
	public string $strMensajeubicacion='';
	
	
	public string $strVisibleFK_Idbodega='display:table-row';
	public string $strVisibleFK_Idproducto='display:table-row';

	
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

	
	
	
	
	
	
	
	
	public  $id_bodegaFK_Idbodega=null;

	public  $id_productoFK_Idproducto=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->producto_bodegaLogic==null) {
				$this->producto_bodegaLogic=new producto_bodega_logic();
			}
			
		} else {
			if($this->producto_bodegaLogic==null) {
				$this->producto_bodegaLogic=new producto_bodega_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->producto_bodegaClase==null) {
				$this->producto_bodegaClase=new producto_bodega();
			}
			
			$this->producto_bodegaClase->setId(0);	
				
				
			$this->producto_bodegaClase->setid_bodega(-1);	
			$this->producto_bodegaClase->setid_producto(-1);	
			$this->producto_bodegaClase->setcantidad(0.0);	
			$this->producto_bodegaClase->setcosto(0.0);	
			$this->producto_bodegaClase->setubicacion('');	
			
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
		$this->prepararEjecutarMantenimientoBase('producto_bodega');
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
		$this->cargarParametrosReporteBase('producto_bodega');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('producto_bodega');
	}
	
	public function actualizarControllerConReturnGeneral(producto_bodega_param_return $producto_bodegaReturnGeneral) {
		if($producto_bodegaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesproducto_bodegasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$producto_bodegaReturnGeneral->getsMensajeProceso();
		}
		
		if($producto_bodegaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$producto_bodegaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($producto_bodegaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$producto_bodegaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$producto_bodegaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($producto_bodegaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($producto_bodegaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$producto_bodegaReturnGeneral->getsFuncionJs();
		}
		
		if($producto_bodegaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(producto_bodega_session $producto_bodega_session){
		$this->strStyleDivArbol=$producto_bodega_session->strStyleDivArbol;	
		$this->strStyleDivContent=$producto_bodega_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$producto_bodega_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$producto_bodega_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$producto_bodega_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$producto_bodega_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$producto_bodega_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(producto_bodega_session $producto_bodega_session){
		$producto_bodega_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$producto_bodega_session->strStyleDivHeader='display:none';			
		$producto_bodega_session->strStyleDivContent='width:93%;height:100%';	
		$producto_bodega_session->strStyleDivOpcionesBanner='display:none';	
		$producto_bodega_session->strStyleDivExpandirColapsar='display:none';	
		$producto_bodega_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(producto_bodega_control $producto_bodega_control_session){
		$this->idNuevo=$producto_bodega_control_session->idNuevo;
		$this->producto_bodegaActual=$producto_bodega_control_session->producto_bodegaActual;
		$this->producto_bodega=$producto_bodega_control_session->producto_bodega;
		$this->producto_bodegaClase=$producto_bodega_control_session->producto_bodegaClase;
		$this->producto_bodegas=$producto_bodega_control_session->producto_bodegas;
		$this->producto_bodegasEliminados=$producto_bodega_control_session->producto_bodegasEliminados;
		$this->producto_bodega=$producto_bodega_control_session->producto_bodega;
		$this->producto_bodegasReporte=$producto_bodega_control_session->producto_bodegasReporte;
		$this->producto_bodegasSeleccionados=$producto_bodega_control_session->producto_bodegasSeleccionados;
		$this->arrOrderBy=$producto_bodega_control_session->arrOrderBy;
		$this->arrOrderByRel=$producto_bodega_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$producto_bodega_control_session->arrHistoryWebs;
		$this->arrSessionBases=$producto_bodega_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadproducto_bodega=$producto_bodega_control_session->strTypeOnLoadproducto_bodega;
		$this->strTipoPaginaAuxiliarproducto_bodega=$producto_bodega_control_session->strTipoPaginaAuxiliarproducto_bodega;
		$this->strTipoUsuarioAuxiliarproducto_bodega=$producto_bodega_control_session->strTipoUsuarioAuxiliarproducto_bodega;	
		
		$this->bitEsPopup=$producto_bodega_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$producto_bodega_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$producto_bodega_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$producto_bodega_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$producto_bodega_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$producto_bodega_control_session->strSufijo;
		$this->bitEsRelaciones=$producto_bodega_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$producto_bodega_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$producto_bodega_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$producto_bodega_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$producto_bodega_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$producto_bodega_control_session->strTituloTabla;
		$this->strTituloPathPagina=$producto_bodega_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$producto_bodega_control_session->strTituloPathElementoActual;
		
		if($this->producto_bodegaLogic==null) {			
			$this->producto_bodegaLogic=new producto_bodega_logic();
		}
		
		
		if($this->producto_bodegaClase==null) {
			$this->producto_bodegaClase=new producto_bodega();	
		}
		
		$this->producto_bodegaLogic->setproducto_bodega($this->producto_bodegaClase);
		
		
		if($this->producto_bodegas==null) {
			$this->producto_bodegas=array();	
		}
		
		$this->producto_bodegaLogic->setproducto_bodegas($this->producto_bodegas);
		
		
		$this->strTipoView=$producto_bodega_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$producto_bodega_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$producto_bodega_control_session->datosCliente;
		$this->strAccionBusqueda=$producto_bodega_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$producto_bodega_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$producto_bodega_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$producto_bodega_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$producto_bodega_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$producto_bodega_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$producto_bodega_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$producto_bodega_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$producto_bodega_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$producto_bodega_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$producto_bodega_control_session->strTipoPaginacion;
		$this->strTipoAccion=$producto_bodega_control_session->strTipoAccion;
		$this->tiposReportes=$producto_bodega_control_session->tiposReportes;
		$this->tiposReporte=$producto_bodega_control_session->tiposReporte;
		$this->tiposAcciones=$producto_bodega_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$producto_bodega_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$producto_bodega_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$producto_bodega_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$producto_bodega_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$producto_bodega_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$producto_bodega_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$producto_bodega_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$producto_bodega_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$producto_bodega_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$producto_bodega_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$producto_bodega_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$producto_bodega_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$producto_bodega_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$producto_bodega_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$producto_bodega_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$producto_bodega_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$producto_bodega_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$producto_bodega_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$producto_bodega_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$producto_bodega_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$producto_bodega_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$producto_bodega_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$producto_bodega_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$producto_bodega_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$producto_bodega_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$producto_bodega_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$producto_bodega_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$producto_bodega_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$producto_bodega_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$producto_bodega_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$producto_bodega_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$producto_bodega_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$producto_bodega_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$producto_bodega_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$producto_bodega_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$producto_bodega_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$producto_bodega_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$producto_bodega_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$producto_bodega_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$producto_bodega_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$producto_bodega_control_session->resumenUsuarioActual;	
		$this->moduloActual=$producto_bodega_control_session->moduloActual;	
		$this->opcionActual=$producto_bodega_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$producto_bodega_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$producto_bodega_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$producto_bodega_session=unserialize($this->Session->read(producto_bodega_util::$STR_SESSION_NAME));
				
		if($producto_bodega_session==null) {
			$producto_bodega_session=new producto_bodega_session();
		}
		
		$this->strStyleDivArbol=$producto_bodega_session->strStyleDivArbol;	
		$this->strStyleDivContent=$producto_bodega_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$producto_bodega_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$producto_bodega_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$producto_bodega_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$producto_bodega_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$producto_bodega_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$producto_bodega_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$producto_bodega_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$producto_bodega_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$producto_bodega_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_bodega=$producto_bodega_control_session->strMensajeid_bodega;
		$this->strMensajeid_producto=$producto_bodega_control_session->strMensajeid_producto;
		$this->strMensajecantidad=$producto_bodega_control_session->strMensajecantidad;
		$this->strMensajecosto=$producto_bodega_control_session->strMensajecosto;
		$this->strMensajeubicacion=$producto_bodega_control_session->strMensajeubicacion;
			
		
		$this->bodegasFK=$producto_bodega_control_session->bodegasFK;
		$this->idbodegaDefaultFK=$producto_bodega_control_session->idbodegaDefaultFK;
		$this->productosFK=$producto_bodega_control_session->productosFK;
		$this->idproductoDefaultFK=$producto_bodega_control_session->idproductoDefaultFK;
		
		
		$this->strVisibleFK_Idbodega=$producto_bodega_control_session->strVisibleFK_Idbodega;
		$this->strVisibleFK_Idproducto=$producto_bodega_control_session->strVisibleFK_Idproducto;
		
		
		
		
		$this->id_bodegaFK_Idbodega=$producto_bodega_control_session->id_bodegaFK_Idbodega;
		$this->id_productoFK_Idproducto=$producto_bodega_control_session->id_productoFK_Idproducto;

		
		
		
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
	
	public function getproducto_bodegaControllerAdditional() {
		return $this->producto_bodegaControllerAdditional;
	}

	public function setproducto_bodegaControllerAdditional($producto_bodegaControllerAdditional) {
		$this->producto_bodegaControllerAdditional = $producto_bodegaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getproducto_bodegaActual() : producto_bodega {
		return $this->producto_bodegaActual;
	}

	public function setproducto_bodegaActual(producto_bodega $producto_bodegaActual) {
		$this->producto_bodegaActual = $producto_bodegaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidproducto_bodega() : int {
		return $this->idproducto_bodega;
	}

	public function setidproducto_bodega(int $idproducto_bodega) {
		$this->idproducto_bodega = $idproducto_bodega;
	}
	
	public function getproducto_bodega() : producto_bodega {
		return $this->producto_bodega;
	}

	public function setproducto_bodega(producto_bodega $producto_bodega) {
		$this->producto_bodega = $producto_bodega;
	}
		
	public function getproducto_bodegaLogic() : producto_bodega_logic {		
		return $this->producto_bodegaLogic;
	}

	public function setproducto_bodegaLogic(producto_bodega_logic $producto_bodegaLogic) {
		$this->producto_bodegaLogic = $producto_bodegaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getproducto_bodegasModel() {		
		try {						
			/*producto_bodegasModel.setWrappedData(producto_bodegaLogic->getproducto_bodegas());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->producto_bodegasModel;
	}
	
	public function setproducto_bodegasModel($producto_bodegasModel) {
		$this->producto_bodegasModel = $producto_bodegasModel;
	}
	
	public function getproducto_bodegas() : array {		
		return $this->producto_bodegas;
	}
	
	public function setproducto_bodegas(array $producto_bodegas) {
		$this->producto_bodegas= $producto_bodegas;
	}
	
	public function getproducto_bodegasEliminados() : array {		
		return $this->producto_bodegasEliminados;
	}
	
	public function setproducto_bodegasEliminados(array $producto_bodegasEliminados) {
		$this->producto_bodegasEliminados= $producto_bodegasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getproducto_bodegaActualFromListDataModel() {
		try {
			/*$producto_bodegaClase= $this->producto_bodegasModel->getRowData();*/
			
			/*return $producto_bodega;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
