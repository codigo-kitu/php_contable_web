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

namespace com\bydan\contabilidad\inventario\categoria_producto\presentation\control;

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

use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/categoria_producto/util/categoria_producto_carga.php');
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_carga;

use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_util;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_param_return;
use com\bydan\contabilidad\inventario\categoria_producto\business\logic\categoria_producto_logic;
use com\bydan\contabilidad\inventario\categoria_producto\presentation\session\categoria_producto_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\producto\presentation\session\producto_session;

use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_carga;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_util;
use com\bydan\contabilidad\inventario\sub_categoria_producto\presentation\session\sub_categoria_producto_session;

use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;
use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;


/*CARGA ARCHIVOS FRAMEWORK*/
categoria_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
categoria_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
categoria_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
categoria_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*categoria_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class categoria_producto_init_control extends ControllerBase {	
	
	public $categoria_productoClase=null;	
	public $categoria_productosModel=null;	
	public $categoria_productosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcategoria_producto=0;	
	public ?int $idcategoria_productoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $categoria_productoLogic=null;
	
	public $categoria_productoActual=null;	
	
	public $categoria_producto=null;
	public $categoria_productos=null;
	public $categoria_productosEliminados=array();
	public $categoria_productosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $categoria_productosLocal=array();
	public ?array $categoria_productosReporte=null;
	public ?array $categoria_productosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcategoria_producto='onload';
	public string $strTipoPaginaAuxiliarcategoria_producto='none';
	public string $strTipoUsuarioAuxiliarcategoria_producto='none';
		
	public $categoria_productoReturnGeneral=null;
	public $categoria_productoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $categoria_productoModel=null;
	public $categoria_productoControllerAdditional=null;
	
	
	

	public $productoLogic=null;

	public function  getproductoLogic() {
		return $this->productoLogic;
	}

	public function setproductoLogic($productoLogic) {
		$this->productoLogic =$productoLogic;
	}


	public $subcategoriaproductoLogic=null;

	public function  getsub_categoria_productoLogic() {
		return $this->subcategoriaproductoLogic;
	}

	public function setsub_categoria_productoLogic($subcategoriaproductoLogic) {
		$this->subcategoriaproductoLogic =$subcategoriaproductoLogic;
	}


	public $listaproductoLogic=null;

	public function  getlista_productoLogic() {
		return $this->listaproductoLogic;
	}

	public function setlista_productoLogic($listaproductoLogic) {
		$this->listaproductoLogic =$listaproductoLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajepredeterminado='';
	public string $strMensajenumero_productos='';
	public string $strMensajeimagen='';
	
	
	public string $strVisibleFK_Idempresa='display:table-row';

	
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

	
	
	
	
	
	
	public $strTienePermisosproducto='none';
	public $strTienePermisossub_categoria_producto='none';
	public $strTienePermisoslista_producto='none';
	
	
	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->categoria_productoLogic==null) {
				$this->categoria_productoLogic=new categoria_producto_logic();
			}
			
		} else {
			if($this->categoria_productoLogic==null) {
				$this->categoria_productoLogic=new categoria_producto_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->categoria_productoClase==null) {
				$this->categoria_productoClase=new categoria_producto();
			}
			
			$this->categoria_productoClase->setId(0);	
				
				
			$this->categoria_productoClase->setid_empresa(-1);	
			$this->categoria_productoClase->setcodigo('');	
			$this->categoria_productoClase->setnombre('');	
			$this->categoria_productoClase->setpredeterminado(false);	
			$this->categoria_productoClase->setnumero_productos(0);	
			$this->categoria_productoClase->setimagen('');	
			
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
		$this->prepararEjecutarMantenimientoBase('categoria_producto');
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
		$this->cargarParametrosReporteBase('categoria_producto');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('categoria_producto');
	}
	
	public function actualizarControllerConReturnGeneral(categoria_producto_param_return $categoria_productoReturnGeneral) {
		if($categoria_productoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescategoria_productosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$categoria_productoReturnGeneral->getsMensajeProceso();
		}
		
		if($categoria_productoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$categoria_productoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($categoria_productoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$categoria_productoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$categoria_productoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($categoria_productoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($categoria_productoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$categoria_productoReturnGeneral->getsFuncionJs();
		}
		
		if($categoria_productoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(categoria_producto_session $categoria_producto_session){
		$this->strStyleDivArbol=$categoria_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$categoria_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$categoria_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$categoria_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$categoria_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$categoria_producto_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$categoria_producto_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(categoria_producto_session $categoria_producto_session){
		$categoria_producto_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$categoria_producto_session->strStyleDivHeader='display:none';			
		$categoria_producto_session->strStyleDivContent='width:93%;height:100%';	
		$categoria_producto_session->strStyleDivOpcionesBanner='display:none';	
		$categoria_producto_session->strStyleDivExpandirColapsar='display:none';	
		$categoria_producto_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(categoria_producto_control $categoria_producto_control_session){
		$this->idNuevo=$categoria_producto_control_session->idNuevo;
		$this->categoria_productoActual=$categoria_producto_control_session->categoria_productoActual;
		$this->categoria_producto=$categoria_producto_control_session->categoria_producto;
		$this->categoria_productoClase=$categoria_producto_control_session->categoria_productoClase;
		$this->categoria_productos=$categoria_producto_control_session->categoria_productos;
		$this->categoria_productosEliminados=$categoria_producto_control_session->categoria_productosEliminados;
		$this->categoria_producto=$categoria_producto_control_session->categoria_producto;
		$this->categoria_productosReporte=$categoria_producto_control_session->categoria_productosReporte;
		$this->categoria_productosSeleccionados=$categoria_producto_control_session->categoria_productosSeleccionados;
		$this->arrOrderBy=$categoria_producto_control_session->arrOrderBy;
		$this->arrOrderByRel=$categoria_producto_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$categoria_producto_control_session->arrHistoryWebs;
		$this->arrSessionBases=$categoria_producto_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcategoria_producto=$categoria_producto_control_session->strTypeOnLoadcategoria_producto;
		$this->strTipoPaginaAuxiliarcategoria_producto=$categoria_producto_control_session->strTipoPaginaAuxiliarcategoria_producto;
		$this->strTipoUsuarioAuxiliarcategoria_producto=$categoria_producto_control_session->strTipoUsuarioAuxiliarcategoria_producto;	
		
		$this->bitEsPopup=$categoria_producto_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$categoria_producto_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$categoria_producto_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$categoria_producto_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$categoria_producto_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$categoria_producto_control_session->strSufijo;
		$this->bitEsRelaciones=$categoria_producto_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$categoria_producto_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$categoria_producto_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$categoria_producto_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$categoria_producto_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$categoria_producto_control_session->strTituloTabla;
		$this->strTituloPathPagina=$categoria_producto_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$categoria_producto_control_session->strTituloPathElementoActual;
		
		if($this->categoria_productoLogic==null) {			
			$this->categoria_productoLogic=new categoria_producto_logic();
		}
		
		
		if($this->categoria_productoClase==null) {
			$this->categoria_productoClase=new categoria_producto();	
		}
		
		$this->categoria_productoLogic->setcategoria_producto($this->categoria_productoClase);
		
		
		if($this->categoria_productos==null) {
			$this->categoria_productos=array();	
		}
		
		$this->categoria_productoLogic->setcategoria_productos($this->categoria_productos);
		
		
		$this->strTipoView=$categoria_producto_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$categoria_producto_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$categoria_producto_control_session->datosCliente;
		$this->strAccionBusqueda=$categoria_producto_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$categoria_producto_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$categoria_producto_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$categoria_producto_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$categoria_producto_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$categoria_producto_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$categoria_producto_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$categoria_producto_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$categoria_producto_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$categoria_producto_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$categoria_producto_control_session->strTipoPaginacion;
		$this->strTipoAccion=$categoria_producto_control_session->strTipoAccion;
		$this->tiposReportes=$categoria_producto_control_session->tiposReportes;
		$this->tiposReporte=$categoria_producto_control_session->tiposReporte;
		$this->tiposAcciones=$categoria_producto_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$categoria_producto_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$categoria_producto_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$categoria_producto_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$categoria_producto_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$categoria_producto_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$categoria_producto_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$categoria_producto_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$categoria_producto_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$categoria_producto_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$categoria_producto_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$categoria_producto_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$categoria_producto_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$categoria_producto_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$categoria_producto_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$categoria_producto_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$categoria_producto_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$categoria_producto_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$categoria_producto_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$categoria_producto_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$categoria_producto_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$categoria_producto_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$categoria_producto_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$categoria_producto_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$categoria_producto_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$categoria_producto_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$categoria_producto_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$categoria_producto_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$categoria_producto_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$categoria_producto_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$categoria_producto_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$categoria_producto_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$categoria_producto_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$categoria_producto_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$categoria_producto_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$categoria_producto_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$categoria_producto_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$categoria_producto_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$categoria_producto_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$categoria_producto_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$categoria_producto_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$categoria_producto_control_session->resumenUsuarioActual;	
		$this->moduloActual=$categoria_producto_control_session->moduloActual;	
		$this->opcionActual=$categoria_producto_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$categoria_producto_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$categoria_producto_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$categoria_producto_session=unserialize($this->Session->read(categoria_producto_util::$STR_SESSION_NAME));
				
		if($categoria_producto_session==null) {
			$categoria_producto_session=new categoria_producto_session();
		}
		
		$this->strStyleDivArbol=$categoria_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$categoria_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$categoria_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$categoria_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$categoria_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$categoria_producto_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$categoria_producto_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$categoria_producto_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$categoria_producto_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$categoria_producto_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$categoria_producto_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$categoria_producto_control_session->strMensajeid_empresa;
		$this->strMensajecodigo=$categoria_producto_control_session->strMensajecodigo;
		$this->strMensajenombre=$categoria_producto_control_session->strMensajenombre;
		$this->strMensajepredeterminado=$categoria_producto_control_session->strMensajepredeterminado;
		$this->strMensajenumero_productos=$categoria_producto_control_session->strMensajenumero_productos;
		$this->strMensajeimagen=$categoria_producto_control_session->strMensajeimagen;
			
		
		$this->empresasFK=$categoria_producto_control_session->empresasFK;
		$this->idempresaDefaultFK=$categoria_producto_control_session->idempresaDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$categoria_producto_control_session->strVisibleFK_Idempresa;
		
		
		$this->strTienePermisosproducto=$categoria_producto_control_session->strTienePermisosproducto;
		$this->strTienePermisossub_categoria_producto=$categoria_producto_control_session->strTienePermisossub_categoria_producto;
		$this->strTienePermisoslista_producto=$categoria_producto_control_session->strTienePermisoslista_producto;
		
		
		$this->id_empresaFK_Idempresa=$categoria_producto_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getcategoria_productoControllerAdditional() {
		return $this->categoria_productoControllerAdditional;
	}

	public function setcategoria_productoControllerAdditional($categoria_productoControllerAdditional) {
		$this->categoria_productoControllerAdditional = $categoria_productoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcategoria_productoActual() : categoria_producto {
		return $this->categoria_productoActual;
	}

	public function setcategoria_productoActual(categoria_producto $categoria_productoActual) {
		$this->categoria_productoActual = $categoria_productoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcategoria_producto() : int {
		return $this->idcategoria_producto;
	}

	public function setidcategoria_producto(int $idcategoria_producto) {
		$this->idcategoria_producto = $idcategoria_producto;
	}
	
	public function getcategoria_producto() : categoria_producto {
		return $this->categoria_producto;
	}

	public function setcategoria_producto(categoria_producto $categoria_producto) {
		$this->categoria_producto = $categoria_producto;
	}
		
	public function getcategoria_productoLogic() : categoria_producto_logic {		
		return $this->categoria_productoLogic;
	}

	public function setcategoria_productoLogic(categoria_producto_logic $categoria_productoLogic) {
		$this->categoria_productoLogic = $categoria_productoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcategoria_productosModel() {		
		try {						
			/*categoria_productosModel.setWrappedData(categoria_productoLogic->getcategoria_productos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->categoria_productosModel;
	}
	
	public function setcategoria_productosModel($categoria_productosModel) {
		$this->categoria_productosModel = $categoria_productosModel;
	}
	
	public function getcategoria_productos() : array {		
		return $this->categoria_productos;
	}
	
	public function setcategoria_productos(array $categoria_productos) {
		$this->categoria_productos= $categoria_productos;
	}
	
	public function getcategoria_productosEliminados() : array {		
		return $this->categoria_productosEliminados;
	}
	
	public function setcategoria_productosEliminados(array $categoria_productosEliminados) {
		$this->categoria_productosEliminados= $categoria_productosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcategoria_productoActualFromListDataModel() {
		try {
			/*$categoria_productoClase= $this->categoria_productosModel->getRowData();*/
			
			/*return $categoria_producto;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
