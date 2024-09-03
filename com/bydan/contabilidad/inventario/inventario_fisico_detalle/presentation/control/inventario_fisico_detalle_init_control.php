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

namespace com\bydan\contabilidad\inventario\inventario_fisico_detalle\presentation\control;

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

use com\bydan\contabilidad\inventario\inventario_fisico_detalle\business\entity\inventario_fisico_detalle;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/inventario_fisico_detalle/util/inventario_fisico_detalle_carga.php');
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_carga;

use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_util;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\util\inventario_fisico_detalle_param_return;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\business\logic\inventario_fisico_detalle_logic;
use com\bydan\contabilidad\inventario\inventario_fisico_detalle\presentation\session\inventario_fisico_detalle_session;


//FK


use com\bydan\contabilidad\inventario\inventario_fisico\business\entity\inventario_fisico;
use com\bydan\contabilidad\inventario\inventario_fisico\business\logic\inventario_fisico_logic;
use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_carga;
use com\bydan\contabilidad\inventario\inventario_fisico\util\inventario_fisico_util;

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
inventario_fisico_detalle_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
inventario_fisico_detalle_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
inventario_fisico_detalle_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
inventario_fisico_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*inventario_fisico_detalle_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class inventario_fisico_detalle_init_control extends ControllerBase {	
	
	public $inventario_fisico_detalleClase=null;	
	public $inventario_fisico_detallesModel=null;	
	public $inventario_fisico_detallesListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idinventario_fisico_detalle=0;	
	public ?int $idinventario_fisico_detalleActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $inventario_fisico_detalleLogic=null;
	
	public $inventario_fisico_detalleActual=null;	
	
	public $inventario_fisico_detalle=null;
	public $inventario_fisico_detalles=null;
	public $inventario_fisico_detallesEliminados=array();
	public $inventario_fisico_detallesAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $inventario_fisico_detallesLocal=array();
	public ?array $inventario_fisico_detallesReporte=null;
	public ?array $inventario_fisico_detallesSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadinventario_fisico_detalle='onload';
	public string $strTipoPaginaAuxiliarinventario_fisico_detalle='none';
	public string $strTipoUsuarioAuxiliarinventario_fisico_detalle='none';
		
	public $inventario_fisico_detalleReturnGeneral=null;
	public $inventario_fisico_detalleParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $inventario_fisico_detalleModel=null;
	public $inventario_fisico_detalleControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_inventario_fisico='';
	public string $strMensajeid_producto='';
	public string $strMensajeid_bodega='';
	public string $strMensajeunidades_contadas='';
	public string $strMensajecampo1='';
	public string $strMensajecampo2='';
	public string $strMensajecampo3='';
	
	
	public string $strVisibleFK_Idbodega='display:table-row';
	public string $strVisibleFK_Idinventario_fisico='display:table-row';
	public string $strVisibleFK_Idproducto='display:table-row';

	
	public array $inventario_fisicosFK=array();

	public function getinventario_fisicosFK():array {
		return $this->inventario_fisicosFK;
	}

	public function setinventario_fisicosFK(array $inventario_fisicosFK) {
		$this->inventario_fisicosFK = $inventario_fisicosFK;
	}

	public int $idinventario_fisicoDefaultFK=-1;

	public function getIdinventario_fisicoDefaultFK():int {
		return $this->idinventario_fisicoDefaultFK;
	}

	public function setIdinventario_fisicoDefaultFK(int $idinventario_fisicoDefaultFK) {
		$this->idinventario_fisicoDefaultFK = $idinventario_fisicoDefaultFK;
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

	public  $id_inventario_fisicoFK_Idinventario_fisico=null;

	public  $id_productoFK_Idproducto=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->inventario_fisico_detalleLogic==null) {
				$this->inventario_fisico_detalleLogic=new inventario_fisico_detalle_logic();
			}
			
		} else {
			if($this->inventario_fisico_detalleLogic==null) {
				$this->inventario_fisico_detalleLogic=new inventario_fisico_detalle_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->inventario_fisico_detalleClase==null) {
				$this->inventario_fisico_detalleClase=new inventario_fisico_detalle();
			}
			
			$this->inventario_fisico_detalleClase->setId(0);	
				
				
			$this->inventario_fisico_detalleClase->setid_inventario_fisico(-1);	
			$this->inventario_fisico_detalleClase->setid_producto(-1);	
			$this->inventario_fisico_detalleClase->setid_bodega(-1);	
			$this->inventario_fisico_detalleClase->setunidades_contadas(0.0);	
			$this->inventario_fisico_detalleClase->setcampo1('');	
			$this->inventario_fisico_detalleClase->setcampo2(0.0);	
			$this->inventario_fisico_detalleClase->setcampo3('');	
			
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
		$this->prepararEjecutarMantenimientoBase('inventario_fisico_detalle');
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
		$this->cargarParametrosReporteBase('inventario_fisico_detalle');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('inventario_fisico_detalle');
	}
	
	public function actualizarControllerConReturnGeneral(inventario_fisico_detalle_param_return $inventario_fisico_detalleReturnGeneral) {
		if($inventario_fisico_detalleReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesinventario_fisico_detallesAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$inventario_fisico_detalleReturnGeneral->getsMensajeProceso();
		}
		
		if($inventario_fisico_detalleReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$inventario_fisico_detalleReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($inventario_fisico_detalleReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$inventario_fisico_detalleReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$inventario_fisico_detalleReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($inventario_fisico_detalleReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($inventario_fisico_detalleReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$inventario_fisico_detalleReturnGeneral->getsFuncionJs();
		}
		
		if($inventario_fisico_detalleReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(inventario_fisico_detalle_session $inventario_fisico_detalle_session){
		$this->strStyleDivArbol=$inventario_fisico_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$inventario_fisico_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$inventario_fisico_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$inventario_fisico_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$inventario_fisico_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$inventario_fisico_detalle_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$inventario_fisico_detalle_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(inventario_fisico_detalle_session $inventario_fisico_detalle_session){
		$inventario_fisico_detalle_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$inventario_fisico_detalle_session->strStyleDivHeader='display:none';			
		$inventario_fisico_detalle_session->strStyleDivContent='width:93%;height:100%';	
		$inventario_fisico_detalle_session->strStyleDivOpcionesBanner='display:none';	
		$inventario_fisico_detalle_session->strStyleDivExpandirColapsar='display:none';	
		$inventario_fisico_detalle_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(inventario_fisico_detalle_control $inventario_fisico_detalle_control_session){
		$this->idNuevo=$inventario_fisico_detalle_control_session->idNuevo;
		$this->inventario_fisico_detalleActual=$inventario_fisico_detalle_control_session->inventario_fisico_detalleActual;
		$this->inventario_fisico_detalle=$inventario_fisico_detalle_control_session->inventario_fisico_detalle;
		$this->inventario_fisico_detalleClase=$inventario_fisico_detalle_control_session->inventario_fisico_detalleClase;
		$this->inventario_fisico_detalles=$inventario_fisico_detalle_control_session->inventario_fisico_detalles;
		$this->inventario_fisico_detallesEliminados=$inventario_fisico_detalle_control_session->inventario_fisico_detallesEliminados;
		$this->inventario_fisico_detalle=$inventario_fisico_detalle_control_session->inventario_fisico_detalle;
		$this->inventario_fisico_detallesReporte=$inventario_fisico_detalle_control_session->inventario_fisico_detallesReporte;
		$this->inventario_fisico_detallesSeleccionados=$inventario_fisico_detalle_control_session->inventario_fisico_detallesSeleccionados;
		$this->arrOrderBy=$inventario_fisico_detalle_control_session->arrOrderBy;
		$this->arrOrderByRel=$inventario_fisico_detalle_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$inventario_fisico_detalle_control_session->arrHistoryWebs;
		$this->arrSessionBases=$inventario_fisico_detalle_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadinventario_fisico_detalle=$inventario_fisico_detalle_control_session->strTypeOnLoadinventario_fisico_detalle;
		$this->strTipoPaginaAuxiliarinventario_fisico_detalle=$inventario_fisico_detalle_control_session->strTipoPaginaAuxiliarinventario_fisico_detalle;
		$this->strTipoUsuarioAuxiliarinventario_fisico_detalle=$inventario_fisico_detalle_control_session->strTipoUsuarioAuxiliarinventario_fisico_detalle;	
		
		$this->bitEsPopup=$inventario_fisico_detalle_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$inventario_fisico_detalle_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$inventario_fisico_detalle_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$inventario_fisico_detalle_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$inventario_fisico_detalle_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$inventario_fisico_detalle_control_session->strSufijo;
		$this->bitEsRelaciones=$inventario_fisico_detalle_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$inventario_fisico_detalle_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$inventario_fisico_detalle_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$inventario_fisico_detalle_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$inventario_fisico_detalle_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$inventario_fisico_detalle_control_session->strTituloTabla;
		$this->strTituloPathPagina=$inventario_fisico_detalle_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$inventario_fisico_detalle_control_session->strTituloPathElementoActual;
		
		if($this->inventario_fisico_detalleLogic==null) {			
			$this->inventario_fisico_detalleLogic=new inventario_fisico_detalle_logic();
		}
		
		
		if($this->inventario_fisico_detalleClase==null) {
			$this->inventario_fisico_detalleClase=new inventario_fisico_detalle();	
		}
		
		$this->inventario_fisico_detalleLogic->setinventario_fisico_detalle($this->inventario_fisico_detalleClase);
		
		
		if($this->inventario_fisico_detalles==null) {
			$this->inventario_fisico_detalles=array();	
		}
		
		$this->inventario_fisico_detalleLogic->setinventario_fisico_detalles($this->inventario_fisico_detalles);
		
		
		$this->strTipoView=$inventario_fisico_detalle_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$inventario_fisico_detalle_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$inventario_fisico_detalle_control_session->datosCliente;
		$this->strAccionBusqueda=$inventario_fisico_detalle_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$inventario_fisico_detalle_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$inventario_fisico_detalle_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$inventario_fisico_detalle_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$inventario_fisico_detalle_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$inventario_fisico_detalle_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$inventario_fisico_detalle_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$inventario_fisico_detalle_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$inventario_fisico_detalle_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$inventario_fisico_detalle_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$inventario_fisico_detalle_control_session->strTipoPaginacion;
		$this->strTipoAccion=$inventario_fisico_detalle_control_session->strTipoAccion;
		$this->tiposReportes=$inventario_fisico_detalle_control_session->tiposReportes;
		$this->tiposReporte=$inventario_fisico_detalle_control_session->tiposReporte;
		$this->tiposAcciones=$inventario_fisico_detalle_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$inventario_fisico_detalle_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$inventario_fisico_detalle_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$inventario_fisico_detalle_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$inventario_fisico_detalle_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$inventario_fisico_detalle_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$inventario_fisico_detalle_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$inventario_fisico_detalle_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$inventario_fisico_detalle_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$inventario_fisico_detalle_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$inventario_fisico_detalle_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$inventario_fisico_detalle_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$inventario_fisico_detalle_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$inventario_fisico_detalle_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$inventario_fisico_detalle_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$inventario_fisico_detalle_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$inventario_fisico_detalle_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$inventario_fisico_detalle_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$inventario_fisico_detalle_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$inventario_fisico_detalle_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$inventario_fisico_detalle_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$inventario_fisico_detalle_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$inventario_fisico_detalle_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$inventario_fisico_detalle_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$inventario_fisico_detalle_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$inventario_fisico_detalle_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$inventario_fisico_detalle_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$inventario_fisico_detalle_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$inventario_fisico_detalle_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$inventario_fisico_detalle_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$inventario_fisico_detalle_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$inventario_fisico_detalle_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$inventario_fisico_detalle_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$inventario_fisico_detalle_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$inventario_fisico_detalle_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$inventario_fisico_detalle_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$inventario_fisico_detalle_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$inventario_fisico_detalle_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$inventario_fisico_detalle_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$inventario_fisico_detalle_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$inventario_fisico_detalle_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$inventario_fisico_detalle_control_session->resumenUsuarioActual;	
		$this->moduloActual=$inventario_fisico_detalle_control_session->moduloActual;	
		$this->opcionActual=$inventario_fisico_detalle_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$inventario_fisico_detalle_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$inventario_fisico_detalle_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$inventario_fisico_detalle_session=unserialize($this->Session->read(inventario_fisico_detalle_util::$STR_SESSION_NAME));
				
		if($inventario_fisico_detalle_session==null) {
			$inventario_fisico_detalle_session=new inventario_fisico_detalle_session();
		}
		
		$this->strStyleDivArbol=$inventario_fisico_detalle_session->strStyleDivArbol;	
		$this->strStyleDivContent=$inventario_fisico_detalle_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$inventario_fisico_detalle_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$inventario_fisico_detalle_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$inventario_fisico_detalle_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$inventario_fisico_detalle_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$inventario_fisico_detalle_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$inventario_fisico_detalle_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$inventario_fisico_detalle_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$inventario_fisico_detalle_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$inventario_fisico_detalle_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_inventario_fisico=$inventario_fisico_detalle_control_session->strMensajeid_inventario_fisico;
		$this->strMensajeid_producto=$inventario_fisico_detalle_control_session->strMensajeid_producto;
		$this->strMensajeid_bodega=$inventario_fisico_detalle_control_session->strMensajeid_bodega;
		$this->strMensajeunidades_contadas=$inventario_fisico_detalle_control_session->strMensajeunidades_contadas;
		$this->strMensajecampo1=$inventario_fisico_detalle_control_session->strMensajecampo1;
		$this->strMensajecampo2=$inventario_fisico_detalle_control_session->strMensajecampo2;
		$this->strMensajecampo3=$inventario_fisico_detalle_control_session->strMensajecampo3;
			
		
		$this->inventario_fisicosFK=$inventario_fisico_detalle_control_session->inventario_fisicosFK;
		$this->idinventario_fisicoDefaultFK=$inventario_fisico_detalle_control_session->idinventario_fisicoDefaultFK;
		$this->productosFK=$inventario_fisico_detalle_control_session->productosFK;
		$this->idproductoDefaultFK=$inventario_fisico_detalle_control_session->idproductoDefaultFK;
		$this->bodegasFK=$inventario_fisico_detalle_control_session->bodegasFK;
		$this->idbodegaDefaultFK=$inventario_fisico_detalle_control_session->idbodegaDefaultFK;
		
		
		$this->strVisibleFK_Idbodega=$inventario_fisico_detalle_control_session->strVisibleFK_Idbodega;
		$this->strVisibleFK_Idinventario_fisico=$inventario_fisico_detalle_control_session->strVisibleFK_Idinventario_fisico;
		$this->strVisibleFK_Idproducto=$inventario_fisico_detalle_control_session->strVisibleFK_Idproducto;
		
		
		
		
		$this->id_bodegaFK_Idbodega=$inventario_fisico_detalle_control_session->id_bodegaFK_Idbodega;
		$this->id_inventario_fisicoFK_Idinventario_fisico=$inventario_fisico_detalle_control_session->id_inventario_fisicoFK_Idinventario_fisico;
		$this->id_productoFK_Idproducto=$inventario_fisico_detalle_control_session->id_productoFK_Idproducto;

		
		
		
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
	
	public function getinventario_fisico_detalleControllerAdditional() {
		return $this->inventario_fisico_detalleControllerAdditional;
	}

	public function setinventario_fisico_detalleControllerAdditional($inventario_fisico_detalleControllerAdditional) {
		$this->inventario_fisico_detalleControllerAdditional = $inventario_fisico_detalleControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getinventario_fisico_detalleActual() : inventario_fisico_detalle {
		return $this->inventario_fisico_detalleActual;
	}

	public function setinventario_fisico_detalleActual(inventario_fisico_detalle $inventario_fisico_detalleActual) {
		$this->inventario_fisico_detalleActual = $inventario_fisico_detalleActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidinventario_fisico_detalle() : int {
		return $this->idinventario_fisico_detalle;
	}

	public function setidinventario_fisico_detalle(int $idinventario_fisico_detalle) {
		$this->idinventario_fisico_detalle = $idinventario_fisico_detalle;
	}
	
	public function getinventario_fisico_detalle() : inventario_fisico_detalle {
		return $this->inventario_fisico_detalle;
	}

	public function setinventario_fisico_detalle(inventario_fisico_detalle $inventario_fisico_detalle) {
		$this->inventario_fisico_detalle = $inventario_fisico_detalle;
	}
		
	public function getinventario_fisico_detalleLogic() : inventario_fisico_detalle_logic {		
		return $this->inventario_fisico_detalleLogic;
	}

	public function setinventario_fisico_detalleLogic(inventario_fisico_detalle_logic $inventario_fisico_detalleLogic) {
		$this->inventario_fisico_detalleLogic = $inventario_fisico_detalleLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getinventario_fisico_detallesModel() {		
		try {						
			/*inventario_fisico_detallesModel.setWrappedData(inventario_fisico_detalleLogic->getinventario_fisico_detalles());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->inventario_fisico_detallesModel;
	}
	
	public function setinventario_fisico_detallesModel($inventario_fisico_detallesModel) {
		$this->inventario_fisico_detallesModel = $inventario_fisico_detallesModel;
	}
	
	public function getinventario_fisico_detalles() : array {		
		return $this->inventario_fisico_detalles;
	}
	
	public function setinventario_fisico_detalles(array $inventario_fisico_detalles) {
		$this->inventario_fisico_detalles= $inventario_fisico_detalles;
	}
	
	public function getinventario_fisico_detallesEliminados() : array {		
		return $this->inventario_fisico_detallesEliminados;
	}
	
	public function setinventario_fisico_detallesEliminados(array $inventario_fisico_detallesEliminados) {
		$this->inventario_fisico_detallesEliminados= $inventario_fisico_detallesEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getinventario_fisico_detalleActualFromListDataModel() {
		try {
			/*$inventario_fisico_detalleClase= $this->inventario_fisico_detallesModel->getRowData();*/
			
			/*return $inventario_fisico_detalle;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
