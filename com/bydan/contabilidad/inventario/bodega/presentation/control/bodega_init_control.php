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

namespace com\bydan\contabilidad\inventario\bodega\presentation\control;

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

use com\bydan\contabilidad\inventario\bodega\business\entity\bodega;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/bodega/util/bodega_carga.php');
use com\bydan\contabilidad\inventario\bodega\util\bodega_carga;

use com\bydan\contabilidad\inventario\bodega\util\bodega_util;
use com\bydan\contabilidad\inventario\bodega\util\bodega_param_return;
use com\bydan\contabilidad\inventario\bodega\business\logic\bodega_logic;
use com\bydan\contabilidad\inventario\bodega\presentation\session\bodega_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

//REL


use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\producto\presentation\session\producto_session;

use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_carga;
use com\bydan\contabilidad\inventario\producto_bodega\util\producto_bodega_util;
use com\bydan\contabilidad\inventario\producto_bodega\presentation\session\producto_bodega_session;


/*CARGA ARCHIVOS FRAMEWORK*/
bodega_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
bodega_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
bodega_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
bodega_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*bodega_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class bodega_init_control extends ControllerBase {	
	
	public $bodegaClase=null;	
	public $bodegasModel=null;	
	public $bodegasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idbodega=0;	
	public ?int $idbodegaActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $bodegaLogic=null;
	
	public $bodegaActual=null;	
	
	public $bodega=null;
	public $bodegas=null;
	public $bodegasEliminados=array();
	public $bodegasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $bodegasLocal=array();
	public ?array $bodegasReporte=null;
	public ?array $bodegasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadbodega='onload';
	public string $strTipoPaginaAuxiliarbodega='none';
	public string $strTipoUsuarioAuxiliarbodega='none';
		
	public $bodegaReturnGeneral=null;
	public $bodegaParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $bodegaModel=null;
	public $bodegaControllerAdditional=null;
	
	
	

	public $productoLogic=null;

	public function  getproductoLogic() {
		return $this->productoLogic;
	}

	public function setproductoLogic($productoLogic) {
		$this->productoLogic =$productoLogic;
	}


	public $productobodegaLogic=null;

	public function  getproducto_bodegaLogic() {
		return $this->productobodegaLogic;
	}

	public function setproducto_bodegaLogic($productobodegaLogic) {
		$this->productobodegaLogic =$productobodegaLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajedireccion='';
	public string $strMensajetelefono='';
	public string $strMensajenumero_productos='';
	public string $strMensajedefecto='';
	public string $strMensajeactivo='';
	public string $strMensajedireccion2='';
	
	
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idsucursal='display:table-row';

	
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

	public array $sucursalsFK=array();

	public function getsucursalsFK():array {
		return $this->sucursalsFK;
	}

	public function setsucursalsFK(array $sucursalsFK) {
		$this->sucursalsFK = $sucursalsFK;
	}

	public int $idsucursalDefaultFK=-1;

	public function getIdsucursalDefaultFK():int {
		return $this->idsucursalDefaultFK;
	}

	public function setIdsucursalDefaultFK(int $idsucursalDefaultFK) {
		$this->idsucursalDefaultFK = $idsucursalDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosproducto='none';
	public $strTienePermisosproducto_bodega='none';
	
	
	public  $id_empresaFK_Idempresa=null;

	public  $id_sucursalFK_Idsucursal=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->bodegaLogic==null) {
				$this->bodegaLogic=new bodega_logic();
			}
			
		} else {
			if($this->bodegaLogic==null) {
				$this->bodegaLogic=new bodega_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->bodegaClase==null) {
				$this->bodegaClase=new bodega();
			}
			
			$this->bodegaClase->setId(0);	
				
				
			$this->bodegaClase->setid_empresa(-1);	
			$this->bodegaClase->setid_sucursal(-1);	
			$this->bodegaClase->setcodigo('');	
			$this->bodegaClase->setnombre('');	
			$this->bodegaClase->setdireccion('');	
			$this->bodegaClase->settelefono('');	
			$this->bodegaClase->setnumero_productos(0);	
			$this->bodegaClase->setdefecto(false);	
			$this->bodegaClase->setactivo(false);	
			$this->bodegaClase->setdireccion2('');	
			
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
		$this->prepararEjecutarMantenimientoBase('bodega');
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
		$this->cargarParametrosReporteBase('bodega');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('bodega');
	}
	
	public function actualizarControllerConReturnGeneral(bodega_param_return $bodegaReturnGeneral) {
		if($bodegaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesbodegasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$bodegaReturnGeneral->getsMensajeProceso();
		}
		
		if($bodegaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$bodegaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($bodegaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$bodegaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$bodegaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($bodegaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($bodegaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$bodegaReturnGeneral->getsFuncionJs();
		}
		
		if($bodegaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(bodega_session $bodega_session){
		$this->strStyleDivArbol=$bodega_session->strStyleDivArbol;	
		$this->strStyleDivContent=$bodega_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$bodega_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$bodega_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$bodega_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$bodega_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$bodega_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(bodega_session $bodega_session){
		$bodega_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$bodega_session->strStyleDivHeader='display:none';			
		$bodega_session->strStyleDivContent='width:93%;height:100%';	
		$bodega_session->strStyleDivOpcionesBanner='display:none';	
		$bodega_session->strStyleDivExpandirColapsar='display:none';	
		$bodega_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(bodega_control $bodega_control_session){
		$this->idNuevo=$bodega_control_session->idNuevo;
		$this->bodegaActual=$bodega_control_session->bodegaActual;
		$this->bodega=$bodega_control_session->bodega;
		$this->bodegaClase=$bodega_control_session->bodegaClase;
		$this->bodegas=$bodega_control_session->bodegas;
		$this->bodegasEliminados=$bodega_control_session->bodegasEliminados;
		$this->bodega=$bodega_control_session->bodega;
		$this->bodegasReporte=$bodega_control_session->bodegasReporte;
		$this->bodegasSeleccionados=$bodega_control_session->bodegasSeleccionados;
		$this->arrOrderBy=$bodega_control_session->arrOrderBy;
		$this->arrOrderByRel=$bodega_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$bodega_control_session->arrHistoryWebs;
		$this->arrSessionBases=$bodega_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadbodega=$bodega_control_session->strTypeOnLoadbodega;
		$this->strTipoPaginaAuxiliarbodega=$bodega_control_session->strTipoPaginaAuxiliarbodega;
		$this->strTipoUsuarioAuxiliarbodega=$bodega_control_session->strTipoUsuarioAuxiliarbodega;	
		
		$this->bitEsPopup=$bodega_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$bodega_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$bodega_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$bodega_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$bodega_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$bodega_control_session->strSufijo;
		$this->bitEsRelaciones=$bodega_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$bodega_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$bodega_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$bodega_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$bodega_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$bodega_control_session->strTituloTabla;
		$this->strTituloPathPagina=$bodega_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$bodega_control_session->strTituloPathElementoActual;
		
		if($this->bodegaLogic==null) {			
			$this->bodegaLogic=new bodega_logic();
		}
		
		
		if($this->bodegaClase==null) {
			$this->bodegaClase=new bodega();	
		}
		
		$this->bodegaLogic->setbodega($this->bodegaClase);
		
		
		if($this->bodegas==null) {
			$this->bodegas=array();	
		}
		
		$this->bodegaLogic->setbodegas($this->bodegas);
		
		
		$this->strTipoView=$bodega_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$bodega_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$bodega_control_session->datosCliente;
		$this->strAccionBusqueda=$bodega_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$bodega_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$bodega_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$bodega_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$bodega_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$bodega_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$bodega_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$bodega_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$bodega_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$bodega_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$bodega_control_session->strTipoPaginacion;
		$this->strTipoAccion=$bodega_control_session->strTipoAccion;
		$this->tiposReportes=$bodega_control_session->tiposReportes;
		$this->tiposReporte=$bodega_control_session->tiposReporte;
		$this->tiposAcciones=$bodega_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$bodega_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$bodega_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$bodega_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$bodega_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$bodega_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$bodega_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$bodega_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$bodega_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$bodega_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$bodega_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$bodega_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$bodega_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$bodega_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$bodega_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$bodega_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$bodega_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$bodega_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$bodega_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$bodega_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$bodega_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$bodega_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$bodega_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$bodega_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$bodega_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$bodega_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$bodega_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$bodega_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$bodega_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$bodega_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$bodega_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$bodega_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$bodega_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$bodega_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$bodega_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$bodega_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$bodega_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$bodega_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$bodega_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$bodega_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$bodega_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$bodega_control_session->resumenUsuarioActual;	
		$this->moduloActual=$bodega_control_session->moduloActual;	
		$this->opcionActual=$bodega_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$bodega_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$bodega_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$bodega_session=unserialize($this->Session->read(bodega_util::$STR_SESSION_NAME));
				
		if($bodega_session==null) {
			$bodega_session=new bodega_session();
		}
		
		$this->strStyleDivArbol=$bodega_session->strStyleDivArbol;	
		$this->strStyleDivContent=$bodega_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$bodega_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$bodega_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$bodega_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$bodega_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$bodega_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$bodega_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$bodega_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$bodega_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$bodega_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$bodega_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$bodega_control_session->strMensajeid_sucursal;
		$this->strMensajecodigo=$bodega_control_session->strMensajecodigo;
		$this->strMensajenombre=$bodega_control_session->strMensajenombre;
		$this->strMensajedireccion=$bodega_control_session->strMensajedireccion;
		$this->strMensajetelefono=$bodega_control_session->strMensajetelefono;
		$this->strMensajenumero_productos=$bodega_control_session->strMensajenumero_productos;
		$this->strMensajedefecto=$bodega_control_session->strMensajedefecto;
		$this->strMensajeactivo=$bodega_control_session->strMensajeactivo;
		$this->strMensajedireccion2=$bodega_control_session->strMensajedireccion2;
			
		
		$this->empresasFK=$bodega_control_session->empresasFK;
		$this->idempresaDefaultFK=$bodega_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$bodega_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$bodega_control_session->idsucursalDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$bodega_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idsucursal=$bodega_control_session->strVisibleFK_Idsucursal;
		
		
		$this->strTienePermisosproducto=$bodega_control_session->strTienePermisosproducto;
		$this->strTienePermisosproducto_bodega=$bodega_control_session->strTienePermisosproducto_bodega;
		
		
		$this->id_empresaFK_Idempresa=$bodega_control_session->id_empresaFK_Idempresa;
		$this->id_sucursalFK_Idsucursal=$bodega_control_session->id_sucursalFK_Idsucursal;

		
		
		
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
	
	public function getbodegaControllerAdditional() {
		return $this->bodegaControllerAdditional;
	}

	public function setbodegaControllerAdditional($bodegaControllerAdditional) {
		$this->bodegaControllerAdditional = $bodegaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getbodegaActual() : bodega {
		return $this->bodegaActual;
	}

	public function setbodegaActual(bodega $bodegaActual) {
		$this->bodegaActual = $bodegaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidbodega() : int {
		return $this->idbodega;
	}

	public function setidbodega(int $idbodega) {
		$this->idbodega = $idbodega;
	}
	
	public function getbodega() : bodega {
		return $this->bodega;
	}

	public function setbodega(bodega $bodega) {
		$this->bodega = $bodega;
	}
		
	public function getbodegaLogic() : bodega_logic {		
		return $this->bodegaLogic;
	}

	public function setbodegaLogic(bodega_logic $bodegaLogic) {
		$this->bodegaLogic = $bodegaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getbodegasModel() {		
		try {						
			/*bodegasModel.setWrappedData(bodegaLogic->getbodegas());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->bodegasModel;
	}
	
	public function setbodegasModel($bodegasModel) {
		$this->bodegasModel = $bodegasModel;
	}
	
	public function getbodegas() : array {		
		return $this->bodegas;
	}
	
	public function setbodegas(array $bodegas) {
		$this->bodegas= $bodegas;
	}
	
	public function getbodegasEliminados() : array {		
		return $this->bodegasEliminados;
	}
	
	public function setbodegasEliminados(array $bodegasEliminados) {
		$this->bodegasEliminados= $bodegasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getbodegaActualFromListDataModel() {
		try {
			/*$bodegaClase= $this->bodegasModel->getRowData();*/
			
			/*return $bodega;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
