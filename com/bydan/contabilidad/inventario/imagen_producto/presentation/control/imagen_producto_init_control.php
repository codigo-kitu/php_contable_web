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

namespace com\bydan\contabilidad\inventario\imagen_producto\presentation\control;

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

use com\bydan\contabilidad\inventario\imagen_producto\business\entity\imagen_producto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/imagen_producto/util/imagen_producto_carga.php');
use com\bydan\contabilidad\inventario\imagen_producto\util\imagen_producto_carga;

use com\bydan\contabilidad\inventario\imagen_producto\util\imagen_producto_util;
use com\bydan\contabilidad\inventario\imagen_producto\util\imagen_producto_param_return;
use com\bydan\contabilidad\inventario\imagen_producto\business\logic\imagen_producto_logic;
use com\bydan\contabilidad\inventario\imagen_producto\presentation\session\imagen_producto_session;


//FK


use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
imagen_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
imagen_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
imagen_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
imagen_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*imagen_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class imagen_producto_init_control extends ControllerBase {	
	
	public $imagen_productoClase=null;	
	public $imagen_productosModel=null;	
	public $imagen_productosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idimagen_producto=0;	
	public ?int $idimagen_productoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $imagen_productoLogic=null;
	
	public $imagen_productoActual=null;	
	
	public $imagen_producto=null;
	public $imagen_productos=null;
	public $imagen_productosEliminados=array();
	public $imagen_productosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $imagen_productosLocal=array();
	public ?array $imagen_productosReporte=null;
	public ?array $imagen_productosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadimagen_producto='onload';
	public string $strTipoPaginaAuxiliarimagen_producto='none';
	public string $strTipoUsuarioAuxiliarimagen_producto='none';
		
	public $imagen_productoReturnGeneral=null;
	public $imagen_productoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $imagen_productoModel=null;
	public $imagen_productoControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_producto='';
	public string $strMensajeimagen='';
	
	
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

	
	
	
	
	
	
	
	
	public  $id_productoFK_Idproducto=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->imagen_productoLogic==null) {
				$this->imagen_productoLogic=new imagen_producto_logic();
			}
			
		} else {
			if($this->imagen_productoLogic==null) {
				$this->imagen_productoLogic=new imagen_producto_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->imagen_productoClase==null) {
				$this->imagen_productoClase=new imagen_producto();
			}
			
			$this->imagen_productoClase->setId(0);	
				
				
			$this->imagen_productoClase->setid_producto(-1);	
			$this->imagen_productoClase->setimagen('');	
			
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
		$this->prepararEjecutarMantenimientoBase('imagen_producto');
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
		$this->cargarParametrosReporteBase('imagen_producto');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('imagen_producto');
	}
	
	public function actualizarControllerConReturnGeneral(imagen_producto_param_return $imagen_productoReturnGeneral) {
		if($imagen_productoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesimagen_productosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$imagen_productoReturnGeneral->getsMensajeProceso();
		}
		
		if($imagen_productoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$imagen_productoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($imagen_productoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$imagen_productoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$imagen_productoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($imagen_productoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($imagen_productoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$imagen_productoReturnGeneral->getsFuncionJs();
		}
		
		if($imagen_productoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(imagen_producto_session $imagen_producto_session){
		$this->strStyleDivArbol=$imagen_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_producto_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$imagen_producto_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(imagen_producto_session $imagen_producto_session){
		$imagen_producto_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$imagen_producto_session->strStyleDivHeader='display:none';			
		$imagen_producto_session->strStyleDivContent='width:93%;height:100%';	
		$imagen_producto_session->strStyleDivOpcionesBanner='display:none';	
		$imagen_producto_session->strStyleDivExpandirColapsar='display:none';	
		$imagen_producto_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(imagen_producto_control $imagen_producto_control_session){
		$this->idNuevo=$imagen_producto_control_session->idNuevo;
		$this->imagen_productoActual=$imagen_producto_control_session->imagen_productoActual;
		$this->imagen_producto=$imagen_producto_control_session->imagen_producto;
		$this->imagen_productoClase=$imagen_producto_control_session->imagen_productoClase;
		$this->imagen_productos=$imagen_producto_control_session->imagen_productos;
		$this->imagen_productosEliminados=$imagen_producto_control_session->imagen_productosEliminados;
		$this->imagen_producto=$imagen_producto_control_session->imagen_producto;
		$this->imagen_productosReporte=$imagen_producto_control_session->imagen_productosReporte;
		$this->imagen_productosSeleccionados=$imagen_producto_control_session->imagen_productosSeleccionados;
		$this->arrOrderBy=$imagen_producto_control_session->arrOrderBy;
		$this->arrOrderByRel=$imagen_producto_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$imagen_producto_control_session->arrHistoryWebs;
		$this->arrSessionBases=$imagen_producto_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadimagen_producto=$imagen_producto_control_session->strTypeOnLoadimagen_producto;
		$this->strTipoPaginaAuxiliarimagen_producto=$imagen_producto_control_session->strTipoPaginaAuxiliarimagen_producto;
		$this->strTipoUsuarioAuxiliarimagen_producto=$imagen_producto_control_session->strTipoUsuarioAuxiliarimagen_producto;	
		
		$this->bitEsPopup=$imagen_producto_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$imagen_producto_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$imagen_producto_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$imagen_producto_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$imagen_producto_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$imagen_producto_control_session->strSufijo;
		$this->bitEsRelaciones=$imagen_producto_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$imagen_producto_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$imagen_producto_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$imagen_producto_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$imagen_producto_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$imagen_producto_control_session->strTituloTabla;
		$this->strTituloPathPagina=$imagen_producto_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$imagen_producto_control_session->strTituloPathElementoActual;
		
		if($this->imagen_productoLogic==null) {			
			$this->imagen_productoLogic=new imagen_producto_logic();
		}
		
		
		if($this->imagen_productoClase==null) {
			$this->imagen_productoClase=new imagen_producto();	
		}
		
		$this->imagen_productoLogic->setimagen_producto($this->imagen_productoClase);
		
		
		if($this->imagen_productos==null) {
			$this->imagen_productos=array();	
		}
		
		$this->imagen_productoLogic->setimagen_productos($this->imagen_productos);
		
		
		$this->strTipoView=$imagen_producto_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$imagen_producto_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$imagen_producto_control_session->datosCliente;
		$this->strAccionBusqueda=$imagen_producto_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$imagen_producto_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$imagen_producto_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$imagen_producto_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$imagen_producto_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$imagen_producto_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$imagen_producto_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$imagen_producto_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$imagen_producto_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$imagen_producto_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$imagen_producto_control_session->strTipoPaginacion;
		$this->strTipoAccion=$imagen_producto_control_session->strTipoAccion;
		$this->tiposReportes=$imagen_producto_control_session->tiposReportes;
		$this->tiposReporte=$imagen_producto_control_session->tiposReporte;
		$this->tiposAcciones=$imagen_producto_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$imagen_producto_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$imagen_producto_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$imagen_producto_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$imagen_producto_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$imagen_producto_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$imagen_producto_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$imagen_producto_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$imagen_producto_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$imagen_producto_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$imagen_producto_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$imagen_producto_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$imagen_producto_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$imagen_producto_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$imagen_producto_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$imagen_producto_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$imagen_producto_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$imagen_producto_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$imagen_producto_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$imagen_producto_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$imagen_producto_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$imagen_producto_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$imagen_producto_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$imagen_producto_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$imagen_producto_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$imagen_producto_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$imagen_producto_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$imagen_producto_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$imagen_producto_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$imagen_producto_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$imagen_producto_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$imagen_producto_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$imagen_producto_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$imagen_producto_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$imagen_producto_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$imagen_producto_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$imagen_producto_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$imagen_producto_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$imagen_producto_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$imagen_producto_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$imagen_producto_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$imagen_producto_control_session->resumenUsuarioActual;	
		$this->moduloActual=$imagen_producto_control_session->moduloActual;	
		$this->opcionActual=$imagen_producto_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$imagen_producto_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$imagen_producto_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$imagen_producto_session=unserialize($this->Session->read(imagen_producto_util::$STR_SESSION_NAME));
				
		if($imagen_producto_session==null) {
			$imagen_producto_session=new imagen_producto_session();
		}
		
		$this->strStyleDivArbol=$imagen_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$imagen_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$imagen_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$imagen_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$imagen_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$imagen_producto_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$imagen_producto_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$imagen_producto_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$imagen_producto_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$imagen_producto_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$imagen_producto_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_producto=$imagen_producto_control_session->strMensajeid_producto;
		$this->strMensajeimagen=$imagen_producto_control_session->strMensajeimagen;
			
		
		$this->productosFK=$imagen_producto_control_session->productosFK;
		$this->idproductoDefaultFK=$imagen_producto_control_session->idproductoDefaultFK;
		
		
		$this->strVisibleFK_Idproducto=$imagen_producto_control_session->strVisibleFK_Idproducto;
		
		
		
		
		$this->id_productoFK_Idproducto=$imagen_producto_control_session->id_productoFK_Idproducto;

		
		
		
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
	
	public function getimagen_productoControllerAdditional() {
		return $this->imagen_productoControllerAdditional;
	}

	public function setimagen_productoControllerAdditional($imagen_productoControllerAdditional) {
		$this->imagen_productoControllerAdditional = $imagen_productoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getimagen_productoActual() : imagen_producto {
		return $this->imagen_productoActual;
	}

	public function setimagen_productoActual(imagen_producto $imagen_productoActual) {
		$this->imagen_productoActual = $imagen_productoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidimagen_producto() : int {
		return $this->idimagen_producto;
	}

	public function setidimagen_producto(int $idimagen_producto) {
		$this->idimagen_producto = $idimagen_producto;
	}
	
	public function getimagen_producto() : imagen_producto {
		return $this->imagen_producto;
	}

	public function setimagen_producto(imagen_producto $imagen_producto) {
		$this->imagen_producto = $imagen_producto;
	}
		
	public function getimagen_productoLogic() : imagen_producto_logic {		
		return $this->imagen_productoLogic;
	}

	public function setimagen_productoLogic(imagen_producto_logic $imagen_productoLogic) {
		$this->imagen_productoLogic = $imagen_productoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getimagen_productosModel() {		
		try {						
			/*imagen_productosModel.setWrappedData(imagen_productoLogic->getimagen_productos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->imagen_productosModel;
	}
	
	public function setimagen_productosModel($imagen_productosModel) {
		$this->imagen_productosModel = $imagen_productosModel;
	}
	
	public function getimagen_productos() : array {		
		return $this->imagen_productos;
	}
	
	public function setimagen_productos(array $imagen_productos) {
		$this->imagen_productos= $imagen_productos;
	}
	
	public function getimagen_productosEliminados() : array {		
		return $this->imagen_productosEliminados;
	}
	
	public function setimagen_productosEliminados(array $imagen_productosEliminados) {
		$this->imagen_productosEliminados= $imagen_productosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getimagen_productoActualFromListDataModel() {
		try {
			/*$imagen_productoClase= $this->imagen_productosModel->getRowData();*/
			
			/*return $imagen_producto;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
