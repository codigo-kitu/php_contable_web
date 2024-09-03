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

namespace com\bydan\contabilidad\inventario\costo_producto\presentation\control;

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

use com\bydan\contabilidad\inventario\costo_producto\business\entity\costo_producto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/inventario/costo_producto/util/costo_producto_carga.php');
use com\bydan\contabilidad\inventario\costo_producto\util\costo_producto_carga;

use com\bydan\contabilidad\inventario\costo_producto\util\costo_producto_util;
use com\bydan\contabilidad\inventario\costo_producto\util\costo_producto_param_return;
use com\bydan\contabilidad\inventario\costo_producto\business\logic\costo_producto_logic;
use com\bydan\contabilidad\inventario\costo_producto\presentation\session\costo_producto_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\sucursal\business\entity\sucursal;
use com\bydan\contabilidad\general\sucursal\business\logic\sucursal_logic;
use com\bydan\contabilidad\general\sucursal\util\sucursal_carga;
use com\bydan\contabilidad\general\sucursal\util\sucursal_util;

use com\bydan\contabilidad\contabilidad\ejercicio\business\entity\ejercicio;
use com\bydan\contabilidad\contabilidad\ejercicio\business\logic\ejercicio_logic;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_carga;
use com\bydan\contabilidad\contabilidad\ejercicio\util\ejercicio_util;

use com\bydan\contabilidad\contabilidad\periodo\business\entity\periodo;
use com\bydan\contabilidad\contabilidad\periodo\business\logic\periodo_logic;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_carga;
use com\bydan\contabilidad\contabilidad\periodo\util\periodo_util;

use com\bydan\contabilidad\seguridad\usuario\util\usuario_carga;
use com\bydan\contabilidad\seguridad\usuario\util\usuario_util;

use com\bydan\contabilidad\inventario\producto\business\entity\producto;
use com\bydan\contabilidad\inventario\producto\business\logic\producto_logic;
use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;

use com\bydan\contabilidad\general\tabla\business\entity\tabla;
use com\bydan\contabilidad\general\tabla\business\logic\tabla_logic;
use com\bydan\contabilidad\general\tabla\util\tabla_carga;
use com\bydan\contabilidad\general\tabla\util\tabla_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
costo_producto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
costo_producto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
costo_producto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
costo_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*costo_producto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class costo_producto_init_control extends ControllerBase {	
	
	public $costo_productoClase=null;	
	public $costo_productosModel=null;	
	public $costo_productosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idcosto_producto=0;	
	public ?int $idcosto_productoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $costo_productoLogic=null;
	
	public $costo_productoActual=null;	
	
	public $costo_producto=null;
	public $costo_productos=null;
	public $costo_productosEliminados=array();
	public $costo_productosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $costo_productosLocal=array();
	public ?array $costo_productosReporte=null;
	public ?array $costo_productosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadcosto_producto='onload';
	public string $strTipoPaginaAuxiliarcosto_producto='none';
	public string $strTipoUsuarioAuxiliarcosto_producto='none';
		
	public $costo_productoReturnGeneral=null;
	public $costo_productoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $costo_productoModel=null;
	public $costo_productoControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajeid_sucursal='';
	public string $strMensajeid_ejercicio='';
	public string $strMensajeid_periodo='';
	public string $strMensajeid_usuario='';
	public string $strMensajeid_producto='';
	public string $strMensajeid_tabla='';
	public string $strMensajeidn_origen='';
	public string $strMensajeidn_detalle_origen='';
	public string $strMensajenro_documento='';
	public string $strMensajefecha='';
	public string $strMensajecantidad='';
	public string $strMensajecosto_unitario='';
	public string $strMensajecosto_total='';
	public string $strMensajecantidad_origen='';
	public string $strMensajecosto_unitario_origen='';
	public string $strMensajecosto_total_origen='';
	
	
	public string $strVisibleFK_Idejercicio='display:table-row';
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idperiodo='display:table-row';
	public string $strVisibleFK_Idproducto='display:table-row';
	public string $strVisibleFK_Idsucursal='display:table-row';
	public string $strVisibleFK_Idtabla='display:table-row';
	public string $strVisibleFK_Idusuario='display:table-row';

	
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

	public array $ejerciciosFK=array();

	public function getejerciciosFK():array {
		return $this->ejerciciosFK;
	}

	public function setejerciciosFK(array $ejerciciosFK) {
		$this->ejerciciosFK = $ejerciciosFK;
	}

	public int $idejercicioDefaultFK=-1;

	public function getIdejercicioDefaultFK():int {
		return $this->idejercicioDefaultFK;
	}

	public function setIdejercicioDefaultFK(int $idejercicioDefaultFK) {
		$this->idejercicioDefaultFK = $idejercicioDefaultFK;
	}

	public array $periodosFK=array();

	public function getperiodosFK():array {
		return $this->periodosFK;
	}

	public function setperiodosFK(array $periodosFK) {
		$this->periodosFK = $periodosFK;
	}

	public int $idperiodoDefaultFK=-1;

	public function getIdperiodoDefaultFK():int {
		return $this->idperiodoDefaultFK;
	}

	public function setIdperiodoDefaultFK(int $idperiodoDefaultFK) {
		$this->idperiodoDefaultFK = $idperiodoDefaultFK;
	}

	public array $usuariosFK=array();

	public function getusuariosFK():array {
		return $this->usuariosFK;
	}

	public function setusuariosFK(array $usuariosFK) {
		$this->usuariosFK = $usuariosFK;
	}

	public int $idusuarioDefaultFK=-1;

	public function getIdusuarioDefaultFK():int {
		return $this->idusuarioDefaultFK;
	}

	public function setIdusuarioDefaultFK(int $idusuarioDefaultFK) {
		$this->idusuarioDefaultFK = $idusuarioDefaultFK;
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

	public array $tablasFK=array();

	public function gettablasFK():array {
		return $this->tablasFK;
	}

	public function settablasFK(array $tablasFK) {
		$this->tablasFK = $tablasFK;
	}

	public int $idtablaDefaultFK=-1;

	public function getIdtablaDefaultFK():int {
		return $this->idtablaDefaultFK;
	}

	public function setIdtablaDefaultFK(int $idtablaDefaultFK) {
		$this->idtablaDefaultFK = $idtablaDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_ejercicioFK_Idejercicio=null;

	public  $id_empresaFK_Idempresa=null;

	public  $id_periodoFK_Idperiodo=null;

	public  $id_productoFK_Idproducto=null;

	public  $id_sucursalFK_Idsucursal=null;

	public  $id_tablaFK_Idtabla=null;

	public  $id_usuarioFK_Idusuario=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->costo_productoLogic==null) {
				$this->costo_productoLogic=new costo_producto_logic();
			}
			
		} else {
			if($this->costo_productoLogic==null) {
				$this->costo_productoLogic=new costo_producto_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->costo_productoClase==null) {
				$this->costo_productoClase=new costo_producto();
			}
			
			$this->costo_productoClase->setId(0);	
				
				
			$this->costo_productoClase->setid_empresa(-1);	
			$this->costo_productoClase->setid_sucursal(-1);	
			$this->costo_productoClase->setid_ejercicio(-1);	
			$this->costo_productoClase->setid_periodo(-1);	
			$this->costo_productoClase->setid_usuario(-1);	
			$this->costo_productoClase->setid_producto(-1);	
			$this->costo_productoClase->setid_tabla(-1);	
			$this->costo_productoClase->setidn_origen(0);	
			$this->costo_productoClase->setidn_detalle_origen(0);	
			$this->costo_productoClase->setnro_documento('');	
			$this->costo_productoClase->setfecha(date('Y-m-d'));	
			$this->costo_productoClase->setcantidad(0.0);	
			$this->costo_productoClase->setcosto_unitario(0.0);	
			$this->costo_productoClase->setcosto_total(0.0);	
			$this->costo_productoClase->setcantidad_origen(0.0);	
			$this->costo_productoClase->setcosto_unitario_origen(0.0);	
			$this->costo_productoClase->setcosto_total_origen(0.0);	
			
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
		$this->prepararEjecutarMantenimientoBase('costo_producto');
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
		$this->cargarParametrosReporteBase('costo_producto');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('costo_producto');
	}
	
	public function actualizarControllerConReturnGeneral(costo_producto_param_return $costo_productoReturnGeneral) {
		if($costo_productoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajescosto_productosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$costo_productoReturnGeneral->getsMensajeProceso();
		}
		
		if($costo_productoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$costo_productoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($costo_productoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$costo_productoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$costo_productoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($costo_productoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($costo_productoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$costo_productoReturnGeneral->getsFuncionJs();
		}
		
		if($costo_productoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(costo_producto_session $costo_producto_session){
		$this->strStyleDivArbol=$costo_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$costo_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$costo_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$costo_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$costo_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$costo_producto_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$costo_producto_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(costo_producto_session $costo_producto_session){
		$costo_producto_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$costo_producto_session->strStyleDivHeader='display:none';			
		$costo_producto_session->strStyleDivContent='width:93%;height:100%';	
		$costo_producto_session->strStyleDivOpcionesBanner='display:none';	
		$costo_producto_session->strStyleDivExpandirColapsar='display:none';	
		$costo_producto_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(costo_producto_control $costo_producto_control_session){
		$this->idNuevo=$costo_producto_control_session->idNuevo;
		$this->costo_productoActual=$costo_producto_control_session->costo_productoActual;
		$this->costo_producto=$costo_producto_control_session->costo_producto;
		$this->costo_productoClase=$costo_producto_control_session->costo_productoClase;
		$this->costo_productos=$costo_producto_control_session->costo_productos;
		$this->costo_productosEliminados=$costo_producto_control_session->costo_productosEliminados;
		$this->costo_producto=$costo_producto_control_session->costo_producto;
		$this->costo_productosReporte=$costo_producto_control_session->costo_productosReporte;
		$this->costo_productosSeleccionados=$costo_producto_control_session->costo_productosSeleccionados;
		$this->arrOrderBy=$costo_producto_control_session->arrOrderBy;
		$this->arrOrderByRel=$costo_producto_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$costo_producto_control_session->arrHistoryWebs;
		$this->arrSessionBases=$costo_producto_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadcosto_producto=$costo_producto_control_session->strTypeOnLoadcosto_producto;
		$this->strTipoPaginaAuxiliarcosto_producto=$costo_producto_control_session->strTipoPaginaAuxiliarcosto_producto;
		$this->strTipoUsuarioAuxiliarcosto_producto=$costo_producto_control_session->strTipoUsuarioAuxiliarcosto_producto;	
		
		$this->bitEsPopup=$costo_producto_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$costo_producto_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$costo_producto_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$costo_producto_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$costo_producto_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$costo_producto_control_session->strSufijo;
		$this->bitEsRelaciones=$costo_producto_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$costo_producto_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$costo_producto_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$costo_producto_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$costo_producto_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$costo_producto_control_session->strTituloTabla;
		$this->strTituloPathPagina=$costo_producto_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$costo_producto_control_session->strTituloPathElementoActual;
		
		if($this->costo_productoLogic==null) {			
			$this->costo_productoLogic=new costo_producto_logic();
		}
		
		
		if($this->costo_productoClase==null) {
			$this->costo_productoClase=new costo_producto();	
		}
		
		$this->costo_productoLogic->setcosto_producto($this->costo_productoClase);
		
		
		if($this->costo_productos==null) {
			$this->costo_productos=array();	
		}
		
		$this->costo_productoLogic->setcosto_productos($this->costo_productos);
		
		
		$this->strTipoView=$costo_producto_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$costo_producto_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$costo_producto_control_session->datosCliente;
		$this->strAccionBusqueda=$costo_producto_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$costo_producto_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$costo_producto_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$costo_producto_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$costo_producto_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$costo_producto_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$costo_producto_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$costo_producto_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$costo_producto_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$costo_producto_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$costo_producto_control_session->strTipoPaginacion;
		$this->strTipoAccion=$costo_producto_control_session->strTipoAccion;
		$this->tiposReportes=$costo_producto_control_session->tiposReportes;
		$this->tiposReporte=$costo_producto_control_session->tiposReporte;
		$this->tiposAcciones=$costo_producto_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$costo_producto_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$costo_producto_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$costo_producto_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$costo_producto_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$costo_producto_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$costo_producto_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$costo_producto_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$costo_producto_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$costo_producto_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$costo_producto_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$costo_producto_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$costo_producto_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$costo_producto_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$costo_producto_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$costo_producto_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$costo_producto_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$costo_producto_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$costo_producto_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$costo_producto_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$costo_producto_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$costo_producto_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$costo_producto_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$costo_producto_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$costo_producto_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$costo_producto_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$costo_producto_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$costo_producto_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$costo_producto_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$costo_producto_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$costo_producto_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$costo_producto_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$costo_producto_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$costo_producto_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$costo_producto_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$costo_producto_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$costo_producto_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$costo_producto_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$costo_producto_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$costo_producto_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$costo_producto_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$costo_producto_control_session->resumenUsuarioActual;	
		$this->moduloActual=$costo_producto_control_session->moduloActual;	
		$this->opcionActual=$costo_producto_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$costo_producto_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$costo_producto_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$costo_producto_session=unserialize($this->Session->read(costo_producto_util::$STR_SESSION_NAME));
				
		if($costo_producto_session==null) {
			$costo_producto_session=new costo_producto_session();
		}
		
		$this->strStyleDivArbol=$costo_producto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$costo_producto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$costo_producto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$costo_producto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$costo_producto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$costo_producto_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$costo_producto_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$costo_producto_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$costo_producto_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$costo_producto_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$costo_producto_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$costo_producto_control_session->strMensajeid_empresa;
		$this->strMensajeid_sucursal=$costo_producto_control_session->strMensajeid_sucursal;
		$this->strMensajeid_ejercicio=$costo_producto_control_session->strMensajeid_ejercicio;
		$this->strMensajeid_periodo=$costo_producto_control_session->strMensajeid_periodo;
		$this->strMensajeid_usuario=$costo_producto_control_session->strMensajeid_usuario;
		$this->strMensajeid_producto=$costo_producto_control_session->strMensajeid_producto;
		$this->strMensajeid_tabla=$costo_producto_control_session->strMensajeid_tabla;
		$this->strMensajeidn_origen=$costo_producto_control_session->strMensajeidn_origen;
		$this->strMensajeidn_detalle_origen=$costo_producto_control_session->strMensajeidn_detalle_origen;
		$this->strMensajenro_documento=$costo_producto_control_session->strMensajenro_documento;
		$this->strMensajefecha=$costo_producto_control_session->strMensajefecha;
		$this->strMensajecantidad=$costo_producto_control_session->strMensajecantidad;
		$this->strMensajecosto_unitario=$costo_producto_control_session->strMensajecosto_unitario;
		$this->strMensajecosto_total=$costo_producto_control_session->strMensajecosto_total;
		$this->strMensajecantidad_origen=$costo_producto_control_session->strMensajecantidad_origen;
		$this->strMensajecosto_unitario_origen=$costo_producto_control_session->strMensajecosto_unitario_origen;
		$this->strMensajecosto_total_origen=$costo_producto_control_session->strMensajecosto_total_origen;
			
		
		$this->empresasFK=$costo_producto_control_session->empresasFK;
		$this->idempresaDefaultFK=$costo_producto_control_session->idempresaDefaultFK;
		$this->sucursalsFK=$costo_producto_control_session->sucursalsFK;
		$this->idsucursalDefaultFK=$costo_producto_control_session->idsucursalDefaultFK;
		$this->ejerciciosFK=$costo_producto_control_session->ejerciciosFK;
		$this->idejercicioDefaultFK=$costo_producto_control_session->idejercicioDefaultFK;
		$this->periodosFK=$costo_producto_control_session->periodosFK;
		$this->idperiodoDefaultFK=$costo_producto_control_session->idperiodoDefaultFK;
		$this->usuariosFK=$costo_producto_control_session->usuariosFK;
		$this->idusuarioDefaultFK=$costo_producto_control_session->idusuarioDefaultFK;
		$this->productosFK=$costo_producto_control_session->productosFK;
		$this->idproductoDefaultFK=$costo_producto_control_session->idproductoDefaultFK;
		$this->tablasFK=$costo_producto_control_session->tablasFK;
		$this->idtablaDefaultFK=$costo_producto_control_session->idtablaDefaultFK;
		
		
		$this->strVisibleFK_Idejercicio=$costo_producto_control_session->strVisibleFK_Idejercicio;
		$this->strVisibleFK_Idempresa=$costo_producto_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idperiodo=$costo_producto_control_session->strVisibleFK_Idperiodo;
		$this->strVisibleFK_Idproducto=$costo_producto_control_session->strVisibleFK_Idproducto;
		$this->strVisibleFK_Idsucursal=$costo_producto_control_session->strVisibleFK_Idsucursal;
		$this->strVisibleFK_Idtabla=$costo_producto_control_session->strVisibleFK_Idtabla;
		$this->strVisibleFK_Idusuario=$costo_producto_control_session->strVisibleFK_Idusuario;
		
		
		
		
		$this->id_ejercicioFK_Idejercicio=$costo_producto_control_session->id_ejercicioFK_Idejercicio;
		$this->id_empresaFK_Idempresa=$costo_producto_control_session->id_empresaFK_Idempresa;
		$this->id_periodoFK_Idperiodo=$costo_producto_control_session->id_periodoFK_Idperiodo;
		$this->id_productoFK_Idproducto=$costo_producto_control_session->id_productoFK_Idproducto;
		$this->id_sucursalFK_Idsucursal=$costo_producto_control_session->id_sucursalFK_Idsucursal;
		$this->id_tablaFK_Idtabla=$costo_producto_control_session->id_tablaFK_Idtabla;
		$this->id_usuarioFK_Idusuario=$costo_producto_control_session->id_usuarioFK_Idusuario;

		
		
		
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
	
	public function getcosto_productoControllerAdditional() {
		return $this->costo_productoControllerAdditional;
	}

	public function setcosto_productoControllerAdditional($costo_productoControllerAdditional) {
		$this->costo_productoControllerAdditional = $costo_productoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getcosto_productoActual() : costo_producto {
		return $this->costo_productoActual;
	}

	public function setcosto_productoActual(costo_producto $costo_productoActual) {
		$this->costo_productoActual = $costo_productoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidcosto_producto() : int {
		return $this->idcosto_producto;
	}

	public function setidcosto_producto(int $idcosto_producto) {
		$this->idcosto_producto = $idcosto_producto;
	}
	
	public function getcosto_producto() : costo_producto {
		return $this->costo_producto;
	}

	public function setcosto_producto(costo_producto $costo_producto) {
		$this->costo_producto = $costo_producto;
	}
		
	public function getcosto_productoLogic() : costo_producto_logic {		
		return $this->costo_productoLogic;
	}

	public function setcosto_productoLogic(costo_producto_logic $costo_productoLogic) {
		$this->costo_productoLogic = $costo_productoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getcosto_productosModel() {		
		try {						
			/*costo_productosModel.setWrappedData(costo_productoLogic->getcosto_productos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->costo_productosModel;
	}
	
	public function setcosto_productosModel($costo_productosModel) {
		$this->costo_productosModel = $costo_productosModel;
	}
	
	public function getcosto_productos() : array {		
		return $this->costo_productos;
	}
	
	public function setcosto_productos(array $costo_productos) {
		$this->costo_productos= $costo_productos;
	}
	
	public function getcosto_productosEliminados() : array {		
		return $this->costo_productosEliminados;
	}
	
	public function setcosto_productosEliminados(array $costo_productosEliminados) {
		$this->costo_productosEliminados= $costo_productosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getcosto_productoActualFromListDataModel() {
		try {
			/*$costo_productoClase= $this->costo_productosModel->getRowData();*/
			
			/*return $costo_producto;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
