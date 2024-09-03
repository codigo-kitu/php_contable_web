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

namespace com\bydan\contabilidad\inventario\sub_categoria_producto\presentation\control;

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

use com\bydan\contabilidad\inventario\sub_categoria_producto\business\entity\sub_categoria_producto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/sub_categoria_producto/util/sub_categoria_producto_carga.php');
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_carga;

use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_util;
use com\bydan\contabilidad\inventario\sub_categoria_producto\util\sub_categoria_producto_param_return;
use com\bydan\contabilidad\inventario\sub_categoria_producto\business\logic\sub_categoria_producto_logic;
use com\bydan\contabilidad\inventario\sub_categoria_producto\presentation\session\sub_categoria_producto_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\inventario\categoria_producto\business\entity\categoria_producto;
use com\bydan\contabilidad\inventario\categoria_producto\business\logic\categoria_producto_logic;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_carga;
use com\bydan\contabilidad\inventario\categoria_producto\util\categoria_producto_util;

//REL


use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\producto\presentation\session\producto_session;

use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;
use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;


/*CARGA ARCHIVOS FRAMEWORK*/
sub_categoria_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
sub_categoria_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
sub_categoria_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
sub_categoria_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*sub_categoria_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class sub_categoria_producto_init_control extends ControllerBase {	
	
	public $sub_categoria_productoClase=null;	
	public $sub_categoria_productosModel=null;	
	public $sub_categoria_productosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idsub_categoria_producto=0;	
	public ?int $idsub_categoria_productoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $sub_categoria_productoLogic=null;
	
	public $sub_categoria_productoActual=null;	
	
	public $sub_categoria_producto=null;
	public $sub_categoria_productos=null;
	public $sub_categoria_productosEliminados=array();
	public $sub_categoria_productosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $sub_categoria_productosLocal=array();
	public ?array $sub_categoria_productosReporte=null;
	public ?array $sub_categoria_productosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadsub_categoria_producto='onload';
	public string $strTipoPaginaAuxiliarsub_categoria_producto='none';
	public string $strTipoUsuarioAuxiliarsub_categoria_producto='none';
		
	public $sub_categoria_productoReturnGeneral=null;
	public $sub_categoria_productoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $sub_categoria_productoModel=null;
	public $sub_categoria_productoControllerAdditional=null;
	
	
	

	public $productoLogic=null;

	public function  getproductoLogic() {
		return $this->productoLogic;
	}

	public function setproductoLogic($productoLogic) {
		$this->productoLogic =$productoLogic;
	}


	public $listaproductoLogic=null;

	public function  getlista_productoLogic() {
		return $this->listaproductoLogic;
	}

	public function setlista_productoLogic($listaproductoLogic) {
		$this->listaproductoLogic =$listaproductoLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_categoria_producto='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajepredeterminado='';
	public string $strMensajeimagen='';
	public string $strMensajenumero_productos='';
	
	
	public string $strVisibleFK_Idcategoria_producto='display:table-row';
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

	public array $categoria_productosFK=array();

	public function getcategoria_productosFK():array {
		return $this->categoria_productosFK;
	}

	public function setcategoria_productosFK(array $categoria_productosFK) {
		$this->categoria_productosFK = $categoria_productosFK;
	}

	public int $idcategoria_productoDefaultFK=-1;

	public function getIdcategoria_productoDefaultFK():int {
		return $this->idcategoria_productoDefaultFK;
	}

	public function setIdcategoria_productoDefaultFK(int $idcategoria_productoDefaultFK) {
		$this->idcategoria_productoDefaultFK = $idcategoria_productoDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisosproducto='none';
	public $strTienePermisoslista_producto='none';
	
	
	public  $id_categoria_productoFK_Idcategoria_producto=null;

	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->sub_categoria_productoLogic==null) {
				$this->sub_categoria_productoLogic=new sub_categoria_producto_logic();
			}
			
		} else {
			if($this->sub_categoria_productoLogic==null) {
				$this->sub_categoria_productoLogic=new sub_categoria_producto_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->sub_categoria_productoClase==null) {
				$this->sub_categoria_productoClase=new sub_categoria_producto();
			}
			
			$this->sub_categoria_productoClase->setId(0);	
				
				
			$this->sub_categoria_productoClase->setid_empresa(-1);	
			$this->sub_categoria_productoClase->setid_categoria_producto(-1);	
			$this->sub_categoria_productoClase->setcodigo('');	
			$this->sub_categoria_productoClase->setnombre('');	
			$this->sub_categoria_productoClase->setpredeterminado(false);	
			$this->sub_categoria_productoClase->setimagen('');	
			$this->sub_categoria_productoClase->setnumero_productos(0);	
			
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
		$this->prepararEjecutarMantenimientoBase('sub_categoria_producto');
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
		$this->cargarParametrosReporteBase('sub_categoria_producto');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('sub_categoria_producto');
	}
	
	public function actualizarControllerConReturnGeneral(sub_categoria_producto_param_return $sub_categoria_productoReturnGeneral) {
		if($sub_categoria_productoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajessub_categoria_productosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$sub_categoria_productoReturnGeneral->getsMensajeProceso();
		}
		
		if($sub_categoria_productoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$sub_categoria_productoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($sub_categoria_productoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$sub_categoria_productoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$sub_categoria_productoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($sub_categoria_productoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($sub_categoria_productoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$sub_categoria_productoReturnGeneral->getsFuncionJs();
		}
		
		if($sub_categoria_productoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(sub_categoria_producto_session $sub_categoria_producto_session){
		$this->strStyleDivArbol=$sub_categoria_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$sub_categoria_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$sub_categoria_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$sub_categoria_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$sub_categoria_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$sub_categoria_producto_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$sub_categoria_producto_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(sub_categoria_producto_session $sub_categoria_producto_session){
		$sub_categoria_producto_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$sub_categoria_producto_session->strStyleDivHeader='display:none';			
		$sub_categoria_producto_session->strStyleDivContent='width:93%;height:100%';	
		$sub_categoria_producto_session->strStyleDivOpcionesBanner='display:none';	
		$sub_categoria_producto_session->strStyleDivExpandirColapsar='display:none';	
		$sub_categoria_producto_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(sub_categoria_producto_control $sub_categoria_producto_control_session){
		$this->idNuevo=$sub_categoria_producto_control_session->idNuevo;
		$this->sub_categoria_productoActual=$sub_categoria_producto_control_session->sub_categoria_productoActual;
		$this->sub_categoria_producto=$sub_categoria_producto_control_session->sub_categoria_producto;
		$this->sub_categoria_productoClase=$sub_categoria_producto_control_session->sub_categoria_productoClase;
		$this->sub_categoria_productos=$sub_categoria_producto_control_session->sub_categoria_productos;
		$this->sub_categoria_productosEliminados=$sub_categoria_producto_control_session->sub_categoria_productosEliminados;
		$this->sub_categoria_producto=$sub_categoria_producto_control_session->sub_categoria_producto;
		$this->sub_categoria_productosReporte=$sub_categoria_producto_control_session->sub_categoria_productosReporte;
		$this->sub_categoria_productosSeleccionados=$sub_categoria_producto_control_session->sub_categoria_productosSeleccionados;
		$this->arrOrderBy=$sub_categoria_producto_control_session->arrOrderBy;
		$this->arrOrderByRel=$sub_categoria_producto_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$sub_categoria_producto_control_session->arrHistoryWebs;
		$this->arrSessionBases=$sub_categoria_producto_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadsub_categoria_producto=$sub_categoria_producto_control_session->strTypeOnLoadsub_categoria_producto;
		$this->strTipoPaginaAuxiliarsub_categoria_producto=$sub_categoria_producto_control_session->strTipoPaginaAuxiliarsub_categoria_producto;
		$this->strTipoUsuarioAuxiliarsub_categoria_producto=$sub_categoria_producto_control_session->strTipoUsuarioAuxiliarsub_categoria_producto;	
		
		$this->bitEsPopup=$sub_categoria_producto_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$sub_categoria_producto_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$sub_categoria_producto_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$sub_categoria_producto_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$sub_categoria_producto_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$sub_categoria_producto_control_session->strSufijo;
		$this->bitEsRelaciones=$sub_categoria_producto_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$sub_categoria_producto_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$sub_categoria_producto_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$sub_categoria_producto_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$sub_categoria_producto_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$sub_categoria_producto_control_session->strTituloTabla;
		$this->strTituloPathPagina=$sub_categoria_producto_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$sub_categoria_producto_control_session->strTituloPathElementoActual;
		
		if($this->sub_categoria_productoLogic==null) {			
			$this->sub_categoria_productoLogic=new sub_categoria_producto_logic();
		}
		
		
		if($this->sub_categoria_productoClase==null) {
			$this->sub_categoria_productoClase=new sub_categoria_producto();	
		}
		
		$this->sub_categoria_productoLogic->setsub_categoria_producto($this->sub_categoria_productoClase);
		
		
		if($this->sub_categoria_productos==null) {
			$this->sub_categoria_productos=array();	
		}
		
		$this->sub_categoria_productoLogic->setsub_categoria_productos($this->sub_categoria_productos);
		
		
		$this->strTipoView=$sub_categoria_producto_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$sub_categoria_producto_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$sub_categoria_producto_control_session->datosCliente;
		$this->strAccionBusqueda=$sub_categoria_producto_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$sub_categoria_producto_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$sub_categoria_producto_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$sub_categoria_producto_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$sub_categoria_producto_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$sub_categoria_producto_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$sub_categoria_producto_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$sub_categoria_producto_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$sub_categoria_producto_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$sub_categoria_producto_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$sub_categoria_producto_control_session->strTipoPaginacion;
		$this->strTipoAccion=$sub_categoria_producto_control_session->strTipoAccion;
		$this->tiposReportes=$sub_categoria_producto_control_session->tiposReportes;
		$this->tiposReporte=$sub_categoria_producto_control_session->tiposReporte;
		$this->tiposAcciones=$sub_categoria_producto_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$sub_categoria_producto_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$sub_categoria_producto_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$sub_categoria_producto_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$sub_categoria_producto_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$sub_categoria_producto_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$sub_categoria_producto_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$sub_categoria_producto_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$sub_categoria_producto_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$sub_categoria_producto_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$sub_categoria_producto_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$sub_categoria_producto_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$sub_categoria_producto_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$sub_categoria_producto_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$sub_categoria_producto_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$sub_categoria_producto_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$sub_categoria_producto_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$sub_categoria_producto_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$sub_categoria_producto_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$sub_categoria_producto_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$sub_categoria_producto_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$sub_categoria_producto_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$sub_categoria_producto_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$sub_categoria_producto_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$sub_categoria_producto_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$sub_categoria_producto_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$sub_categoria_producto_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$sub_categoria_producto_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$sub_categoria_producto_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$sub_categoria_producto_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$sub_categoria_producto_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$sub_categoria_producto_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$sub_categoria_producto_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$sub_categoria_producto_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$sub_categoria_producto_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$sub_categoria_producto_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$sub_categoria_producto_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$sub_categoria_producto_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$sub_categoria_producto_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$sub_categoria_producto_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$sub_categoria_producto_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$sub_categoria_producto_control_session->resumenUsuarioActual;	
		$this->moduloActual=$sub_categoria_producto_control_session->moduloActual;	
		$this->opcionActual=$sub_categoria_producto_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$sub_categoria_producto_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$sub_categoria_producto_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$sub_categoria_producto_session=unserialize($this->Session->read(sub_categoria_producto_util::$STR_SESSION_NAME));
				
		if($sub_categoria_producto_session==null) {
			$sub_categoria_producto_session=new sub_categoria_producto_session();
		}
		
		$this->strStyleDivArbol=$sub_categoria_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$sub_categoria_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$sub_categoria_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$sub_categoria_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$sub_categoria_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$sub_categoria_producto_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$sub_categoria_producto_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$sub_categoria_producto_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$sub_categoria_producto_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$sub_categoria_producto_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$sub_categoria_producto_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$sub_categoria_producto_control_session->strMensajeid_empresa;
		$this->strMensajeid_categoria_producto=$sub_categoria_producto_control_session->strMensajeid_categoria_producto;
		$this->strMensajecodigo=$sub_categoria_producto_control_session->strMensajecodigo;
		$this->strMensajenombre=$sub_categoria_producto_control_session->strMensajenombre;
		$this->strMensajepredeterminado=$sub_categoria_producto_control_session->strMensajepredeterminado;
		$this->strMensajeimagen=$sub_categoria_producto_control_session->strMensajeimagen;
		$this->strMensajenumero_productos=$sub_categoria_producto_control_session->strMensajenumero_productos;
			
		
		$this->empresasFK=$sub_categoria_producto_control_session->empresasFK;
		$this->idempresaDefaultFK=$sub_categoria_producto_control_session->idempresaDefaultFK;
		$this->categoria_productosFK=$sub_categoria_producto_control_session->categoria_productosFK;
		$this->idcategoria_productoDefaultFK=$sub_categoria_producto_control_session->idcategoria_productoDefaultFK;
		
		
		$this->strVisibleFK_Idcategoria_producto=$sub_categoria_producto_control_session->strVisibleFK_Idcategoria_producto;
		$this->strVisibleFK_Idempresa=$sub_categoria_producto_control_session->strVisibleFK_Idempresa;
		
		
		$this->strTienePermisosproducto=$sub_categoria_producto_control_session->strTienePermisosproducto;
		$this->strTienePermisoslista_producto=$sub_categoria_producto_control_session->strTienePermisoslista_producto;
		
		
		$this->id_categoria_productoFK_Idcategoria_producto=$sub_categoria_producto_control_session->id_categoria_productoFK_Idcategoria_producto;
		$this->id_empresaFK_Idempresa=$sub_categoria_producto_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getsub_categoria_productoControllerAdditional() {
		return $this->sub_categoria_productoControllerAdditional;
	}

	public function setsub_categoria_productoControllerAdditional($sub_categoria_productoControllerAdditional) {
		$this->sub_categoria_productoControllerAdditional = $sub_categoria_productoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getsub_categoria_productoActual() : sub_categoria_producto {
		return $this->sub_categoria_productoActual;
	}

	public function setsub_categoria_productoActual(sub_categoria_producto $sub_categoria_productoActual) {
		$this->sub_categoria_productoActual = $sub_categoria_productoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidsub_categoria_producto() : int {
		return $this->idsub_categoria_producto;
	}

	public function setidsub_categoria_producto(int $idsub_categoria_producto) {
		$this->idsub_categoria_producto = $idsub_categoria_producto;
	}
	
	public function getsub_categoria_producto() : sub_categoria_producto {
		return $this->sub_categoria_producto;
	}

	public function setsub_categoria_producto(sub_categoria_producto $sub_categoria_producto) {
		$this->sub_categoria_producto = $sub_categoria_producto;
	}
		
	public function getsub_categoria_productoLogic() : sub_categoria_producto_logic {		
		return $this->sub_categoria_productoLogic;
	}

	public function setsub_categoria_productoLogic(sub_categoria_producto_logic $sub_categoria_productoLogic) {
		$this->sub_categoria_productoLogic = $sub_categoria_productoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getsub_categoria_productosModel() {		
		try {						
			/*sub_categoria_productosModel.setWrappedData(sub_categoria_productoLogic->getsub_categoria_productos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->sub_categoria_productosModel;
	}
	
	public function setsub_categoria_productosModel($sub_categoria_productosModel) {
		$this->sub_categoria_productosModel = $sub_categoria_productosModel;
	}
	
	public function getsub_categoria_productos() : array {		
		return $this->sub_categoria_productos;
	}
	
	public function setsub_categoria_productos(array $sub_categoria_productos) {
		$this->sub_categoria_productos= $sub_categoria_productos;
	}
	
	public function getsub_categoria_productosEliminados() : array {		
		return $this->sub_categoria_productosEliminados;
	}
	
	public function setsub_categoria_productosEliminados(array $sub_categoria_productosEliminados) {
		$this->sub_categoria_productosEliminados= $sub_categoria_productosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getsub_categoria_productoActualFromListDataModel() {
		try {
			/*$sub_categoria_productoClase= $this->sub_categoria_productosModel->getRowData();*/
			
			/*return $sub_categoria_producto;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
