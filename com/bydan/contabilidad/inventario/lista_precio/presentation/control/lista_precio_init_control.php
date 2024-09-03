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

namespace com\bydan\contabilidad\inventario\lista_precio\presentation\control;

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

use com\bydan\contabilidad\inventario\lista_precio\business\entity\lista_precio;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/lista_precio/util/lista_precio_carga.php');
use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_carga;

use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_util;
use com\bydan\contabilidad\inventario\lista_precio\util\lista_precio_param_return;
use com\bydan\contabilidad\inventario\lista_precio\business\logic\lista_precio_logic;
use com\bydan\contabilidad\inventario\lista_precio\presentation\session\lista_precio_session;


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

use com\bydan\contabilidad\cuentaspagar\proveedor\business\entity\proveedor;
use com\bydan\contabilidad\cuentaspagar\proveedor\business\logic\proveedor_logic;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
lista_precio_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
lista_precio_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
lista_precio_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
lista_precio_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*lista_precio_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class lista_precio_init_control extends ControllerBase {	
	
	public $lista_precioClase=null;	
	public $lista_preciosModel=null;	
	public $lista_preciosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idlista_precio=0;	
	public ?int $idlista_precioActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $lista_precioLogic=null;
	
	public $lista_precioActual=null;	
	
	public $lista_precio=null;
	public $lista_precios=null;
	public $lista_preciosEliminados=array();
	public $lista_preciosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $lista_preciosLocal=array();
	public ?array $lista_preciosReporte=null;
	public ?array $lista_preciosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadlista_precio='onload';
	public string $strTipoPaginaAuxiliarlista_precio='none';
	public string $strTipoUsuarioAuxiliarlista_precio='none';
		
	public $lista_precioReturnGeneral=null;
	public $lista_precioParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $lista_precioModel=null;
	public $lista_precioControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_bodega='';
	public string $strMensajeid_producto='';
	public string $strMensajeid_proveedor='';
	public string $strMensajeprecio_compra='';
	public string $strMensajerango_inicial='';
	public string $strMensajerango_final='';
	public string $strMensajeprecio_dolar='';
	public string $strMensajeprecio_compra2='';
	public string $strMensajeprecio_dolar2='';
	public string $strMensajerango_inicial2='';
	public string $strMensajerango_final2='';
	
	
	public string $strVisibleFK_Idbodega='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idproducto='display:table-row';
	public string $strVisibleFK_Idproveedor='display:table-row';

	
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

	
	
	
	
	
	
	
	
	public  $id_bodegaFK_Idbodega=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_productoFK_Idproducto=null;

	public  $id_proveedorFK_Idproveedor=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->lista_precioLogic==null) {
				$this->lista_precioLogic=new lista_precio_logic();
			}
			
		} else {
			if($this->lista_precioLogic==null) {
				$this->lista_precioLogic=new lista_precio_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->lista_precioClase==null) {
				$this->lista_precioClase=new lista_precio();
			}
			
			$this->lista_precioClase->setId(0);	
				
				
			$this->lista_precioClase->setid_empresa(-1);	
			$this->lista_precioClase->setid_bodega(-1);	
			$this->lista_precioClase->setid_producto(-1);	
			$this->lista_precioClase->setid_proveedor(-1);	
			$this->lista_precioClase->setprecio_compra(0.0);	
			$this->lista_precioClase->setrango_inicial(0.0);	
			$this->lista_precioClase->setrango_final(0.0);	
			$this->lista_precioClase->setprecio_dolar('');	
			$this->lista_precioClase->setprecio_compra2(0.0);	
			$this->lista_precioClase->setprecio_dolar2('');	
			$this->lista_precioClase->setrango_inicial2(0.0);	
			$this->lista_precioClase->setrango_final2(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('lista_precio');
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
		$this->cargarParametrosReporteBase('lista_precio');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('lista_precio');
	}
	
	public function actualizarControllerConReturnGeneral(lista_precio_param_return $lista_precioReturnGeneral) {
		if($lista_precioReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajeslista_preciosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$lista_precioReturnGeneral->getsMensajeProceso();
		}
		
		if($lista_precioReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$lista_precioReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($lista_precioReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$lista_precioReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$lista_precioReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($lista_precioReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($lista_precioReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$lista_precioReturnGeneral->getsFuncionJs();
		}
		
		if($lista_precioReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(lista_precio_session $lista_precio_session){
		$this->strStyleDivArbol=$lista_precio_session->strStyleDivArbol;	
		$this->strStyleDivContent=$lista_precio_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$lista_precio_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$lista_precio_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$lista_precio_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$lista_precio_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$lista_precio_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(lista_precio_session $lista_precio_session){
		$lista_precio_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$lista_precio_session->strStyleDivHeader='display:none';			
		$lista_precio_session->strStyleDivContent='width:93%;height:100%';	
		$lista_precio_session->strStyleDivOpcionesBanner='display:none';	
		$lista_precio_session->strStyleDivExpandirColapsar='display:none';	
		$lista_precio_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(lista_precio_control $lista_precio_control_session){
		$this->idNuevo=$lista_precio_control_session->idNuevo;
		$this->lista_precioActual=$lista_precio_control_session->lista_precioActual;
		$this->lista_precio=$lista_precio_control_session->lista_precio;
		$this->lista_precioClase=$lista_precio_control_session->lista_precioClase;
		$this->lista_precios=$lista_precio_control_session->lista_precios;
		$this->lista_preciosEliminados=$lista_precio_control_session->lista_preciosEliminados;
		$this->lista_precio=$lista_precio_control_session->lista_precio;
		$this->lista_preciosReporte=$lista_precio_control_session->lista_preciosReporte;
		$this->lista_preciosSeleccionados=$lista_precio_control_session->lista_preciosSeleccionados;
		$this->arrOrderBy=$lista_precio_control_session->arrOrderBy;
		$this->arrOrderByRel=$lista_precio_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$lista_precio_control_session->arrHistoryWebs;
		$this->arrSessionBases=$lista_precio_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadlista_precio=$lista_precio_control_session->strTypeOnLoadlista_precio;
		$this->strTipoPaginaAuxiliarlista_precio=$lista_precio_control_session->strTipoPaginaAuxiliarlista_precio;
		$this->strTipoUsuarioAuxiliarlista_precio=$lista_precio_control_session->strTipoUsuarioAuxiliarlista_precio;	
		
		$this->bitEsPopup=$lista_precio_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$lista_precio_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$lista_precio_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$lista_precio_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$lista_precio_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$lista_precio_control_session->strSufijo;
		$this->bitEsRelaciones=$lista_precio_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$lista_precio_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$lista_precio_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$lista_precio_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$lista_precio_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$lista_precio_control_session->strTituloTabla;
		$this->strTituloPathPagina=$lista_precio_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$lista_precio_control_session->strTituloPathElementoActual;
		
		if($this->lista_precioLogic==null) {			
			$this->lista_precioLogic=new lista_precio_logic();
		}
		
		
		if($this->lista_precioClase==null) {
			$this->lista_precioClase=new lista_precio();	
		}
		
		$this->lista_precioLogic->setlista_precio($this->lista_precioClase);
		
		
		if($this->lista_precios==null) {
			$this->lista_precios=array();	
		}
		
		$this->lista_precioLogic->setlista_precios($this->lista_precios);
		
		
		$this->strTipoView=$lista_precio_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$lista_precio_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$lista_precio_control_session->datosCliente;
		$this->strAccionBusqueda=$lista_precio_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$lista_precio_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$lista_precio_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$lista_precio_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$lista_precio_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$lista_precio_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$lista_precio_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$lista_precio_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$lista_precio_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$lista_precio_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$lista_precio_control_session->strTipoPaginacion;
		$this->strTipoAccion=$lista_precio_control_session->strTipoAccion;
		$this->tiposReportes=$lista_precio_control_session->tiposReportes;
		$this->tiposReporte=$lista_precio_control_session->tiposReporte;
		$this->tiposAcciones=$lista_precio_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$lista_precio_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$lista_precio_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$lista_precio_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$lista_precio_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$lista_precio_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$lista_precio_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$lista_precio_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$lista_precio_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$lista_precio_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$lista_precio_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$lista_precio_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$lista_precio_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$lista_precio_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$lista_precio_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$lista_precio_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$lista_precio_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$lista_precio_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$lista_precio_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$lista_precio_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$lista_precio_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$lista_precio_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$lista_precio_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$lista_precio_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$lista_precio_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$lista_precio_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$lista_precio_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$lista_precio_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$lista_precio_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$lista_precio_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$lista_precio_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$lista_precio_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$lista_precio_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$lista_precio_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$lista_precio_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$lista_precio_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$lista_precio_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$lista_precio_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$lista_precio_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$lista_precio_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$lista_precio_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$lista_precio_control_session->resumenUsuarioActual;	
		$this->moduloActual=$lista_precio_control_session->moduloActual;	
		$this->opcionActual=$lista_precio_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$lista_precio_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$lista_precio_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$lista_precio_session=unserialize($this->Session->read(lista_precio_util::$STR_SESSION_NAME));
				
		if($lista_precio_session==null) {
			$lista_precio_session=new lista_precio_session();
		}
		
		$this->strStyleDivArbol=$lista_precio_session->strStyleDivArbol;	
		$this->strStyleDivContent=$lista_precio_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$lista_precio_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$lista_precio_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$lista_precio_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$lista_precio_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$lista_precio_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$lista_precio_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$lista_precio_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$lista_precio_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$lista_precio_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$lista_precio_control_session->strMensajeid_empresa;
		$this->strMensajeid_bodega=$lista_precio_control_session->strMensajeid_bodega;
		$this->strMensajeid_producto=$lista_precio_control_session->strMensajeid_producto;
		$this->strMensajeid_proveedor=$lista_precio_control_session->strMensajeid_proveedor;
		$this->strMensajeprecio_compra=$lista_precio_control_session->strMensajeprecio_compra;
		$this->strMensajerango_inicial=$lista_precio_control_session->strMensajerango_inicial;
		$this->strMensajerango_final=$lista_precio_control_session->strMensajerango_final;
		$this->strMensajeprecio_dolar=$lista_precio_control_session->strMensajeprecio_dolar;
		$this->strMensajeprecio_compra2=$lista_precio_control_session->strMensajeprecio_compra2;
		$this->strMensajeprecio_dolar2=$lista_precio_control_session->strMensajeprecio_dolar2;
		$this->strMensajerango_inicial2=$lista_precio_control_session->strMensajerango_inicial2;
		$this->strMensajerango_final2=$lista_precio_control_session->strMensajerango_final2;
			
		
		$this->empresasFK=$lista_precio_control_session->empresasFK;
		$this->idempresaDefaultFK=$lista_precio_control_session->idempresaDefaultFK;
		$this->bodegasFK=$lista_precio_control_session->bodegasFK;
		$this->idbodegaDefaultFK=$lista_precio_control_session->idbodegaDefaultFK;
		$this->productosFK=$lista_precio_control_session->productosFK;
		$this->idproductoDefaultFK=$lista_precio_control_session->idproductoDefaultFK;
		$this->proveedorsFK=$lista_precio_control_session->proveedorsFK;
		$this->idproveedorDefaultFK=$lista_precio_control_session->idproveedorDefaultFK;
		
		
		$this->strVisibleFK_Idbodega=$lista_precio_control_session->strVisibleFK_Idbodega;
		$this->strVisibleFK_Idempresa=$lista_precio_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idproducto=$lista_precio_control_session->strVisibleFK_Idproducto;
		$this->strVisibleFK_Idproveedor=$lista_precio_control_session->strVisibleFK_Idproveedor;
		
		
		
		
		$this->id_bodegaFK_Idbodega=$lista_precio_control_session->id_bodegaFK_Idbodega;
		$this->id_empresaFK_Idempresa=$lista_precio_control_session->id_empresaFK_Idempresa;
		$this->id_productoFK_Idproducto=$lista_precio_control_session->id_productoFK_Idproducto;
		$this->id_proveedorFK_Idproveedor=$lista_precio_control_session->id_proveedorFK_Idproveedor;

		
		
		
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
	
	public function getlista_precioControllerAdditional() {
		return $this->lista_precioControllerAdditional;
	}

	public function setlista_precioControllerAdditional($lista_precioControllerAdditional) {
		$this->lista_precioControllerAdditional = $lista_precioControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getlista_precioActual() : lista_precio {
		return $this->lista_precioActual;
	}

	public function setlista_precioActual(lista_precio $lista_precioActual) {
		$this->lista_precioActual = $lista_precioActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidlista_precio() : int {
		return $this->idlista_precio;
	}

	public function setidlista_precio(int $idlista_precio) {
		$this->idlista_precio = $idlista_precio;
	}
	
	public function getlista_precio() : lista_precio {
		return $this->lista_precio;
	}

	public function setlista_precio(lista_precio $lista_precio) {
		$this->lista_precio = $lista_precio;
	}
		
	public function getlista_precioLogic() : lista_precio_logic {		
		return $this->lista_precioLogic;
	}

	public function setlista_precioLogic(lista_precio_logic $lista_precioLogic) {
		$this->lista_precioLogic = $lista_precioLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getlista_preciosModel() {		
		try {						
			/*lista_preciosModel.setWrappedData(lista_precioLogic->getlista_precios());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->lista_preciosModel;
	}
	
	public function setlista_preciosModel($lista_preciosModel) {
		$this->lista_preciosModel = $lista_preciosModel;
	}
	
	public function getlista_precios() : array {		
		return $this->lista_precios;
	}
	
	public function setlista_precios(array $lista_precios) {
		$this->lista_precios= $lista_precios;
	}
	
	public function getlista_preciosEliminados() : array {		
		return $this->lista_preciosEliminados;
	}
	
	public function setlista_preciosEliminados(array $lista_preciosEliminados) {
		$this->lista_preciosEliminados= $lista_preciosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getlista_precioActualFromListDataModel() {
		try {
			/*$lista_precioClase= $this->lista_preciosModel->getRowData();*/
			
			/*return $lista_precio;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
