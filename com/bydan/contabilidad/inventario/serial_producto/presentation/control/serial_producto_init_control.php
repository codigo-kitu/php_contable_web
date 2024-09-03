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

namespace com\bydan\contabilidad\inventario\serial_producto\presentation\control;

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

use com\bydan\contabilidad\inventario\serial_producto\business\entity\serial_producto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/serial_producto/util/serial_producto_carga.php');
use com\bydan\contabilidad\inventario\serial_producto\util\serial_producto_carga;

use com\bydan\contabilidad\inventario\serial_producto\util\serial_producto_util;
use com\bydan\contabilidad\inventario\serial_producto\util\serial_producto_param_return;
use com\bydan\contabilidad\inventario\serial_producto\business\logic\serial_producto_logic;
use com\bydan\contabilidad\inventario\serial_producto\presentation\session\serial_producto_session;


//FK


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;
use com\bydan\contabilidad\inventario\bodega\util\bodega_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
serial_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
serial_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
serial_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
serial_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*serial_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class serial_producto_init_control extends ControllerBase {	
	
	public $serial_productoClase=null;	
	public $serial_productosModel=null;	
	public $serial_productosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idserial_producto=0;	
	public ?int $idserial_productoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $serial_productoLogic=null;
	
	public $serial_productoActual=null;	
	
	public $serial_producto=null;
	public $serial_productos=null;
	public $serial_productosEliminados=array();
	public $serial_productosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $serial_productosLocal=array();
	public ?array $serial_productosReporte=null;
	public ?array $serial_productosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadserial_producto='onload';
	public string $strTipoPaginaAuxiliarserial_producto='none';
	public string $strTipoUsuarioAuxiliarserial_producto='none';
		
	public $serial_productoReturnGeneral=null;
	public $serial_productoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $serial_productoModel=null;
	public $serial_productoControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_producto='';
	public string $strMensajenro_serial='';
	public string $strMensajeingresado='';
	public string $strMensajeproveedor_mid='';
	public string $strMensajemodulo_ingreso='';
	public string $strMensajenro_documento_ingreso='';
	public string $strMensajesalida='';
	public string $strMensajecliente_mid='';
	public string $strMensajemodulo_salida='';
	public string $strMensajeid_bodega='';
	public string $strMensajenro_item='';
	public string $strMensajenro_documento_salida='';
	public string $strMensajenro_items='';
	
	
	public string $strVisibleFK_Idbodega='display:table-row';
	public string $strVisibleFK_Idproducto='display:table-row';

	
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

	
	
	
	
	
	
	
	
	public  $id_bodegaFK_Idbodega=null;

	public  $id_productoFK_Idproducto=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->serial_productoLogic==null) {
				$this->serial_productoLogic=new serial_producto_logic();
			}
			
		} else {
			if($this->serial_productoLogic==null) {
				$this->serial_productoLogic=new serial_producto_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->serial_productoClase==null) {
				$this->serial_productoClase=new serial_producto();
			}
			
			$this->serial_productoClase->setId(0);	
				
				
			$this->serial_productoClase->setid_producto(-1);	
			$this->serial_productoClase->setnro_serial('');	
			$this->serial_productoClase->setingresado(date('Y-m-d'));	
			$this->serial_productoClase->setproveedor_mid(0);	
			$this->serial_productoClase->setmodulo_ingreso('');	
			$this->serial_productoClase->setnro_documento_ingreso('');	
			$this->serial_productoClase->setsalida(date('Y-m-d'));	
			$this->serial_productoClase->setcliente_mid(0);	
			$this->serial_productoClase->setmodulo_salida('');	
			$this->serial_productoClase->setid_bodega(-1);	
			$this->serial_productoClase->setnro_item(0);	
			$this->serial_productoClase->setnro_documento_salida('');	
			$this->serial_productoClase->setnro_items(0);	
			
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
		$this->prepararEjecutarMantenimientoBase('serial_producto');
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
		$this->cargarParametrosReporteBase('serial_producto');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('serial_producto');
	}
	
	public function actualizarControllerConReturnGeneral(serial_producto_param_return $serial_productoReturnGeneral) {
		if($serial_productoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesserial_productosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$serial_productoReturnGeneral->getsMensajeProceso();
		}
		
		if($serial_productoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$serial_productoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($serial_productoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$serial_productoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$serial_productoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($serial_productoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($serial_productoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$serial_productoReturnGeneral->getsFuncionJs();
		}
		
		if($serial_productoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(serial_producto_session $serial_producto_session){
		$this->strStyleDivArbol=$serial_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$serial_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$serial_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$serial_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$serial_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$serial_producto_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$serial_producto_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(serial_producto_session $serial_producto_session){
		$serial_producto_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$serial_producto_session->strStyleDivHeader='display:none';			
		$serial_producto_session->strStyleDivContent='width:93%;height:100%';	
		$serial_producto_session->strStyleDivOpcionesBanner='display:none';	
		$serial_producto_session->strStyleDivExpandirColapsar='display:none';	
		$serial_producto_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(serial_producto_control $serial_producto_control_session){
		$this->idNuevo=$serial_producto_control_session->idNuevo;
		$this->serial_productoActual=$serial_producto_control_session->serial_productoActual;
		$this->serial_producto=$serial_producto_control_session->serial_producto;
		$this->serial_productoClase=$serial_producto_control_session->serial_productoClase;
		$this->serial_productos=$serial_producto_control_session->serial_productos;
		$this->serial_productosEliminados=$serial_producto_control_session->serial_productosEliminados;
		$this->serial_producto=$serial_producto_control_session->serial_producto;
		$this->serial_productosReporte=$serial_producto_control_session->serial_productosReporte;
		$this->serial_productosSeleccionados=$serial_producto_control_session->serial_productosSeleccionados;
		$this->arrOrderBy=$serial_producto_control_session->arrOrderBy;
		$this->arrOrderByRel=$serial_producto_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$serial_producto_control_session->arrHistoryWebs;
		$this->arrSessionBases=$serial_producto_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadserial_producto=$serial_producto_control_session->strTypeOnLoadserial_producto;
		$this->strTipoPaginaAuxiliarserial_producto=$serial_producto_control_session->strTipoPaginaAuxiliarserial_producto;
		$this->strTipoUsuarioAuxiliarserial_producto=$serial_producto_control_session->strTipoUsuarioAuxiliarserial_producto;	
		
		$this->bitEsPopup=$serial_producto_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$serial_producto_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$serial_producto_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$serial_producto_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$serial_producto_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$serial_producto_control_session->strSufijo;
		$this->bitEsRelaciones=$serial_producto_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$serial_producto_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$serial_producto_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$serial_producto_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$serial_producto_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$serial_producto_control_session->strTituloTabla;
		$this->strTituloPathPagina=$serial_producto_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$serial_producto_control_session->strTituloPathElementoActual;
		
		if($this->serial_productoLogic==null) {			
			$this->serial_productoLogic=new serial_producto_logic();
		}
		
		
		if($this->serial_productoClase==null) {
			$this->serial_productoClase=new serial_producto();	
		}
		
		$this->serial_productoLogic->setserial_producto($this->serial_productoClase);
		
		
		if($this->serial_productos==null) {
			$this->serial_productos=array();	
		}
		
		$this->serial_productoLogic->setserial_productos($this->serial_productos);
		
		
		$this->strTipoView=$serial_producto_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$serial_producto_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$serial_producto_control_session->datosCliente;
		$this->strAccionBusqueda=$serial_producto_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$serial_producto_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$serial_producto_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$serial_producto_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$serial_producto_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$serial_producto_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$serial_producto_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$serial_producto_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$serial_producto_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$serial_producto_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$serial_producto_control_session->strTipoPaginacion;
		$this->strTipoAccion=$serial_producto_control_session->strTipoAccion;
		$this->tiposReportes=$serial_producto_control_session->tiposReportes;
		$this->tiposReporte=$serial_producto_control_session->tiposReporte;
		$this->tiposAcciones=$serial_producto_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$serial_producto_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$serial_producto_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$serial_producto_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$serial_producto_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$serial_producto_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$serial_producto_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$serial_producto_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$serial_producto_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$serial_producto_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$serial_producto_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$serial_producto_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$serial_producto_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$serial_producto_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$serial_producto_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$serial_producto_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$serial_producto_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$serial_producto_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$serial_producto_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$serial_producto_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$serial_producto_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$serial_producto_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$serial_producto_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$serial_producto_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$serial_producto_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$serial_producto_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$serial_producto_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$serial_producto_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$serial_producto_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$serial_producto_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$serial_producto_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$serial_producto_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$serial_producto_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$serial_producto_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$serial_producto_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$serial_producto_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$serial_producto_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$serial_producto_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$serial_producto_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$serial_producto_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$serial_producto_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$serial_producto_control_session->resumenUsuarioActual;	
		$this->moduloActual=$serial_producto_control_session->moduloActual;	
		$this->opcionActual=$serial_producto_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$serial_producto_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$serial_producto_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$serial_producto_session=unserialize($this->Session->read(serial_producto_util::$STR_SESSION_NAME));
				
		if($serial_producto_session==null) {
			$serial_producto_session=new serial_producto_session();
		}
		
		$this->strStyleDivArbol=$serial_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$serial_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$serial_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$serial_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$serial_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$serial_producto_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$serial_producto_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$serial_producto_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$serial_producto_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$serial_producto_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$serial_producto_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_producto=$serial_producto_control_session->strMensajeid_producto;
		$this->strMensajenro_serial=$serial_producto_control_session->strMensajenro_serial;
		$this->strMensajeingresado=$serial_producto_control_session->strMensajeingresado;
		$this->strMensajeproveedor_mid=$serial_producto_control_session->strMensajeproveedor_mid;
		$this->strMensajemodulo_ingreso=$serial_producto_control_session->strMensajemodulo_ingreso;
		$this->strMensajenro_documento_ingreso=$serial_producto_control_session->strMensajenro_documento_ingreso;
		$this->strMensajesalida=$serial_producto_control_session->strMensajesalida;
		$this->strMensajecliente_mid=$serial_producto_control_session->strMensajecliente_mid;
		$this->strMensajemodulo_salida=$serial_producto_control_session->strMensajemodulo_salida;
		$this->strMensajeid_bodega=$serial_producto_control_session->strMensajeid_bodega;
		$this->strMensajenro_item=$serial_producto_control_session->strMensajenro_item;
		$this->strMensajenro_documento_salida=$serial_producto_control_session->strMensajenro_documento_salida;
		$this->strMensajenro_items=$serial_producto_control_session->strMensajenro_items;
			
		
		$this->productosFK=$serial_producto_control_session->productosFK;
		$this->idproductoDefaultFK=$serial_producto_control_session->idproductoDefaultFK;
		$this->bodegasFK=$serial_producto_control_session->bodegasFK;
		$this->idbodegaDefaultFK=$serial_producto_control_session->idbodegaDefaultFK;
		
		
		$this->strVisibleFK_Idbodega=$serial_producto_control_session->strVisibleFK_Idbodega;
		$this->strVisibleFK_Idproducto=$serial_producto_control_session->strVisibleFK_Idproducto;
		
		
		
		
		$this->id_bodegaFK_Idbodega=$serial_producto_control_session->id_bodegaFK_Idbodega;
		$this->id_productoFK_Idproducto=$serial_producto_control_session->id_productoFK_Idproducto;

		
		
		
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
	
	public function getserial_productoControllerAdditional() {
		return $this->serial_productoControllerAdditional;
	}

	public function setserial_productoControllerAdditional($serial_productoControllerAdditional) {
		$this->serial_productoControllerAdditional = $serial_productoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getserial_productoActual() : serial_producto {
		return $this->serial_productoActual;
	}

	public function setserial_productoActual(serial_producto $serial_productoActual) {
		$this->serial_productoActual = $serial_productoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidserial_producto() : int {
		return $this->idserial_producto;
	}

	public function setidserial_producto(int $idserial_producto) {
		$this->idserial_producto = $idserial_producto;
	}
	
	public function getserial_producto() : serial_producto {
		return $this->serial_producto;
	}

	public function setserial_producto(serial_producto $serial_producto) {
		$this->serial_producto = $serial_producto;
	}
		
	public function getserial_productoLogic() : serial_producto_logic {		
		return $this->serial_productoLogic;
	}

	public function setserial_productoLogic(serial_producto_logic $serial_productoLogic) {
		$this->serial_productoLogic = $serial_productoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getserial_productosModel() {		
		try {						
			/*serial_productosModel.setWrappedData(serial_productoLogic->getserial_productos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->serial_productosModel;
	}
	
	public function setserial_productosModel($serial_productosModel) {
		$this->serial_productosModel = $serial_productosModel;
	}
	
	public function getserial_productos() : array {		
		return $this->serial_productos;
	}
	
	public function setserial_productos(array $serial_productos) {
		$this->serial_productos= $serial_productos;
	}
	
	public function getserial_productosEliminados() : array {		
		return $this->serial_productosEliminados;
	}
	
	public function setserial_productosEliminados(array $serial_productosEliminados) {
		$this->serial_productosEliminados= $serial_productosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getserial_productoActualFromListDataModel() {
		try {
			/*$serial_productoClase= $this->serial_productosModel->getRowData();*/
			
			/*return $serial_producto;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
