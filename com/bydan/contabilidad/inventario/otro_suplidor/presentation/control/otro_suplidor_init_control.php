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

namespace com\bydan\contabilidad\inventario\otro_suplidor\presentation\control;

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

use com\bydan\contabilidad\inventario\otro_suplidor\business\entity\otro_suplidor;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/otro_suplidor/util/otro_suplidor_carga.php');
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_carga;

use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_util;
use com\bydan\contabilidad\inventario\otro_suplidor\util\otro_suplidor_param_return;
use com\bydan\contabilidad\inventario\otro_suplidor\business\logic\otro_suplidor_logic;
use com\bydan\contabilidad\inventario\otro_suplidor\presentation\session\otro_suplidor_session;


//FK


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

//REL


use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_carga;
use com\bydan\contabilidad\inventario\cotizacion_detalle\util\cotizacion_detalle_util;
use com\bydan\contabilidad\inventario\cotizacion_detalle\presentation\session\cotizacion_detalle_session;

use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;
use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;


/*CARGA ARCHIVOS FRAMEWORK*/
otro_suplidor_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
otro_suplidor_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
otro_suplidor_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
otro_suplidor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*otro_suplidor_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class otro_suplidor_init_control extends ControllerBase {	
	
	public $otro_suplidorClase=null;	
	public $otro_suplidorsModel=null;	
	public $otro_suplidorsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idotro_suplidor=0;	
	public ?int $idotro_suplidorActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $otro_suplidorLogic=null;
	
	public $otro_suplidorActual=null;	
	
	public $otro_suplidor=null;
	public $otro_suplidors=null;
	public $otro_suplidorsEliminados=array();
	public $otro_suplidorsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $otro_suplidorsLocal=array();
	public ?array $otro_suplidorsReporte=null;
	public ?array $otro_suplidorsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadotro_suplidor='onload';
	public string $strTipoPaginaAuxiliarotro_suplidor='none';
	public string $strTipoUsuarioAuxiliarotro_suplidor='none';
		
	public $otro_suplidorReturnGeneral=null;
	public $otro_suplidorParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $otro_suplidorModel=null;
	public $otro_suplidorControllerAdditional=null;
	
	
	

	public $cotizaciondetalleLogic=null;

	public function  getcotizacion_detalleLogic() {
		return $this->cotizaciondetalleLogic;
	}

	public function setcotizacion_detalleLogic($cotizaciondetalleLogic) {
		$this->cotizaciondetalleLogic =$cotizaciondetalleLogic;
	}


	public $listaproductoLogic=null;

	public function  getlista_productoLogic() {
		return $this->listaproductoLogic;
	}

	public function setlista_productoLogic($listaproductoLogic) {
		$this->listaproductoLogic =$listaproductoLogic;
	}
 	
	
	public string $strMensajeid_producto='';
	public string $strMensajeid_proveedor='';
	
	
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

	
	
	
	
	
	
	public $strTienePermisoscotizacion_detalle='none';
	public $strTienePermisoslista_producto='none';
	
	
	public  $id_productoFK_Idproducto=null;

	public  $id_proveedorFK_Idproveedor=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->otro_suplidorLogic==null) {
				$this->otro_suplidorLogic=new otro_suplidor_logic();
			}
			
		} else {
			if($this->otro_suplidorLogic==null) {
				$this->otro_suplidorLogic=new otro_suplidor_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->otro_suplidorClase==null) {
				$this->otro_suplidorClase=new otro_suplidor();
			}
			
			$this->otro_suplidorClase->setId(0);	
				
				
			$this->otro_suplidorClase->setid_producto(-1);	
			$this->otro_suplidorClase->setid_proveedor(-1);	
			
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
		$this->prepararEjecutarMantenimientoBase('otro_suplidor');
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
		$this->cargarParametrosReporteBase('otro_suplidor');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('otro_suplidor');
	}
	
	public function actualizarControllerConReturnGeneral(otro_suplidor_param_return $otro_suplidorReturnGeneral) {
		if($otro_suplidorReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesotro_suplidorsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$otro_suplidorReturnGeneral->getsMensajeProceso();
		}
		
		if($otro_suplidorReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$otro_suplidorReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($otro_suplidorReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$otro_suplidorReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$otro_suplidorReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($otro_suplidorReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($otro_suplidorReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$otro_suplidorReturnGeneral->getsFuncionJs();
		}
		
		if($otro_suplidorReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(otro_suplidor_session $otro_suplidor_session){
		$this->strStyleDivArbol=$otro_suplidor_session->strStyleDivArbol;	
		$this->strStyleDivContent=$otro_suplidor_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$otro_suplidor_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$otro_suplidor_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$otro_suplidor_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$otro_suplidor_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$otro_suplidor_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(otro_suplidor_session $otro_suplidor_session){
		$otro_suplidor_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$otro_suplidor_session->strStyleDivHeader='display:none';			
		$otro_suplidor_session->strStyleDivContent='width:93%;height:100%';	
		$otro_suplidor_session->strStyleDivOpcionesBanner='display:none';	
		$otro_suplidor_session->strStyleDivExpandirColapsar='display:none';	
		$otro_suplidor_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(otro_suplidor_control $otro_suplidor_control_session){
		$this->idNuevo=$otro_suplidor_control_session->idNuevo;
		$this->otro_suplidorActual=$otro_suplidor_control_session->otro_suplidorActual;
		$this->otro_suplidor=$otro_suplidor_control_session->otro_suplidor;
		$this->otro_suplidorClase=$otro_suplidor_control_session->otro_suplidorClase;
		$this->otro_suplidors=$otro_suplidor_control_session->otro_suplidors;
		$this->otro_suplidorsEliminados=$otro_suplidor_control_session->otro_suplidorsEliminados;
		$this->otro_suplidor=$otro_suplidor_control_session->otro_suplidor;
		$this->otro_suplidorsReporte=$otro_suplidor_control_session->otro_suplidorsReporte;
		$this->otro_suplidorsSeleccionados=$otro_suplidor_control_session->otro_suplidorsSeleccionados;
		$this->arrOrderBy=$otro_suplidor_control_session->arrOrderBy;
		$this->arrOrderByRel=$otro_suplidor_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$otro_suplidor_control_session->arrHistoryWebs;
		$this->arrSessionBases=$otro_suplidor_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadotro_suplidor=$otro_suplidor_control_session->strTypeOnLoadotro_suplidor;
		$this->strTipoPaginaAuxiliarotro_suplidor=$otro_suplidor_control_session->strTipoPaginaAuxiliarotro_suplidor;
		$this->strTipoUsuarioAuxiliarotro_suplidor=$otro_suplidor_control_session->strTipoUsuarioAuxiliarotro_suplidor;	
		
		$this->bitEsPopup=$otro_suplidor_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$otro_suplidor_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$otro_suplidor_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$otro_suplidor_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$otro_suplidor_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$otro_suplidor_control_session->strSufijo;
		$this->bitEsRelaciones=$otro_suplidor_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$otro_suplidor_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$otro_suplidor_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$otro_suplidor_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$otro_suplidor_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$otro_suplidor_control_session->strTituloTabla;
		$this->strTituloPathPagina=$otro_suplidor_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$otro_suplidor_control_session->strTituloPathElementoActual;
		
		if($this->otro_suplidorLogic==null) {			
			$this->otro_suplidorLogic=new otro_suplidor_logic();
		}
		
		
		if($this->otro_suplidorClase==null) {
			$this->otro_suplidorClase=new otro_suplidor();	
		}
		
		$this->otro_suplidorLogic->setotro_suplidor($this->otro_suplidorClase);
		
		
		if($this->otro_suplidors==null) {
			$this->otro_suplidors=array();	
		}
		
		$this->otro_suplidorLogic->setotro_suplidors($this->otro_suplidors);
		
		
		$this->strTipoView=$otro_suplidor_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$otro_suplidor_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$otro_suplidor_control_session->datosCliente;
		$this->strAccionBusqueda=$otro_suplidor_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$otro_suplidor_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$otro_suplidor_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$otro_suplidor_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$otro_suplidor_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$otro_suplidor_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$otro_suplidor_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$otro_suplidor_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$otro_suplidor_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$otro_suplidor_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$otro_suplidor_control_session->strTipoPaginacion;
		$this->strTipoAccion=$otro_suplidor_control_session->strTipoAccion;
		$this->tiposReportes=$otro_suplidor_control_session->tiposReportes;
		$this->tiposReporte=$otro_suplidor_control_session->tiposReporte;
		$this->tiposAcciones=$otro_suplidor_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$otro_suplidor_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$otro_suplidor_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$otro_suplidor_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$otro_suplidor_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$otro_suplidor_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$otro_suplidor_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$otro_suplidor_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$otro_suplidor_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$otro_suplidor_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$otro_suplidor_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$otro_suplidor_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$otro_suplidor_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$otro_suplidor_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$otro_suplidor_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$otro_suplidor_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$otro_suplidor_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$otro_suplidor_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$otro_suplidor_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$otro_suplidor_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$otro_suplidor_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$otro_suplidor_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$otro_suplidor_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$otro_suplidor_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$otro_suplidor_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$otro_suplidor_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$otro_suplidor_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$otro_suplidor_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$otro_suplidor_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$otro_suplidor_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$otro_suplidor_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$otro_suplidor_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$otro_suplidor_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$otro_suplidor_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$otro_suplidor_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$otro_suplidor_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$otro_suplidor_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$otro_suplidor_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$otro_suplidor_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$otro_suplidor_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$otro_suplidor_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$otro_suplidor_control_session->resumenUsuarioActual;	
		$this->moduloActual=$otro_suplidor_control_session->moduloActual;	
		$this->opcionActual=$otro_suplidor_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$otro_suplidor_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$otro_suplidor_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$otro_suplidor_session=unserialize($this->Session->read(otro_suplidor_util::$STR_SESSION_NAME));
				
		if($otro_suplidor_session==null) {
			$otro_suplidor_session=new otro_suplidor_session();
		}
		
		$this->strStyleDivArbol=$otro_suplidor_session->strStyleDivArbol;	
		$this->strStyleDivContent=$otro_suplidor_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$otro_suplidor_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$otro_suplidor_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$otro_suplidor_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$otro_suplidor_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$otro_suplidor_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$otro_suplidor_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$otro_suplidor_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$otro_suplidor_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$otro_suplidor_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_producto=$otro_suplidor_control_session->strMensajeid_producto;
		$this->strMensajeid_proveedor=$otro_suplidor_control_session->strMensajeid_proveedor;
			
		
		$this->productosFK=$otro_suplidor_control_session->productosFK;
		$this->idproductoDefaultFK=$otro_suplidor_control_session->idproductoDefaultFK;
		$this->proveedorsFK=$otro_suplidor_control_session->proveedorsFK;
		$this->idproveedorDefaultFK=$otro_suplidor_control_session->idproveedorDefaultFK;
		
		
		$this->strVisibleFK_Idproducto=$otro_suplidor_control_session->strVisibleFK_Idproducto;
		$this->strVisibleFK_Idproveedor=$otro_suplidor_control_session->strVisibleFK_Idproveedor;
		
		
		$this->strTienePermisoscotizacion_detalle=$otro_suplidor_control_session->strTienePermisoscotizacion_detalle;
		$this->strTienePermisoslista_producto=$otro_suplidor_control_session->strTienePermisoslista_producto;
		
		
		$this->id_productoFK_Idproducto=$otro_suplidor_control_session->id_productoFK_Idproducto;
		$this->id_proveedorFK_Idproveedor=$otro_suplidor_control_session->id_proveedorFK_Idproveedor;

		
		
		
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
	
	public function getotro_suplidorControllerAdditional() {
		return $this->otro_suplidorControllerAdditional;
	}

	public function setotro_suplidorControllerAdditional($otro_suplidorControllerAdditional) {
		$this->otro_suplidorControllerAdditional = $otro_suplidorControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getotro_suplidorActual() : otro_suplidor {
		return $this->otro_suplidorActual;
	}

	public function setotro_suplidorActual(otro_suplidor $otro_suplidorActual) {
		$this->otro_suplidorActual = $otro_suplidorActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidotro_suplidor() : int {
		return $this->idotro_suplidor;
	}

	public function setidotro_suplidor(int $idotro_suplidor) {
		$this->idotro_suplidor = $idotro_suplidor;
	}
	
	public function getotro_suplidor() : otro_suplidor {
		return $this->otro_suplidor;
	}

	public function setotro_suplidor(otro_suplidor $otro_suplidor) {
		$this->otro_suplidor = $otro_suplidor;
	}
		
	public function getotro_suplidorLogic() : otro_suplidor_logic {		
		return $this->otro_suplidorLogic;
	}

	public function setotro_suplidorLogic(otro_suplidor_logic $otro_suplidorLogic) {
		$this->otro_suplidorLogic = $otro_suplidorLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getotro_suplidorsModel() {		
		try {						
			/*otro_suplidorsModel.setWrappedData(otro_suplidorLogic->getotro_suplidors());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->otro_suplidorsModel;
	}
	
	public function setotro_suplidorsModel($otro_suplidorsModel) {
		$this->otro_suplidorsModel = $otro_suplidorsModel;
	}
	
	public function getotro_suplidors() : array {		
		return $this->otro_suplidors;
	}
	
	public function setotro_suplidors(array $otro_suplidors) {
		$this->otro_suplidors= $otro_suplidors;
	}
	
	public function getotro_suplidorsEliminados() : array {		
		return $this->otro_suplidorsEliminados;
	}
	
	public function setotro_suplidorsEliminados(array $otro_suplidorsEliminados) {
		$this->otro_suplidorsEliminados= $otro_suplidorsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getotro_suplidorActualFromListDataModel() {
		try {
			/*$otro_suplidorClase= $this->otro_suplidorsModel->getRowData();*/
			
			/*return $otro_suplidor;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
