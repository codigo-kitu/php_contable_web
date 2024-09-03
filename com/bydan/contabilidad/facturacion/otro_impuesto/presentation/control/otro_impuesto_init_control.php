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

namespace com\bydan\contabilidad\facturacion\otro_impuesto\presentation\control;

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

use com\bydan\contabilidad\facturacion\otro_impuesto\business\entity\otro_impuesto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/otro_impuesto/util/otro_impuesto_carga.php');
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_carga;

use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_util;
use com\bydan\contabilidad\facturacion\otro_impuesto\util\otro_impuesto_param_return;
use com\bydan\contabilidad\facturacion\otro_impuesto\business\logic\otro_impuesto_logic;
use com\bydan\contabilidad\facturacion\otro_impuesto\presentation\session\otro_impuesto_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\contabilidad\cuenta\business\entity\cuenta;
use com\bydan\contabilidad\contabilidad\cuenta\business\logic\cuenta_logic;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_carga;
use com\bydan\contabilidad\contabilidad\cuenta\util\cuenta_util;

//REL


use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_carga;
use com\bydan\contabilidad\inventario\lista_producto\util\lista_producto_util;
use com\bydan\contabilidad\inventario\lista_producto\presentation\session\lista_producto_session;

use com\bydan\contabilidad\inventario\producto\util\producto_carga;
use com\bydan\contabilidad\inventario\producto\util\producto_util;
use com\bydan\contabilidad\inventario\producto\presentation\session\producto_session;

use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_carga;
use com\bydan\contabilidad\cuentascobrar\cliente\util\cliente_util;
use com\bydan\contabilidad\cuentascobrar\cliente\presentation\session\cliente_session;

use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_carga;
use com\bydan\contabilidad\cuentaspagar\proveedor\util\proveedor_util;
use com\bydan\contabilidad\cuentaspagar\proveedor\presentation\session\proveedor_session;


/*CARGA ARCHIVOS FRAMEWORK*/
otro_impuesto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
otro_impuesto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
otro_impuesto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*otro_impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class otro_impuesto_init_control extends ControllerBase {	
	
	public $otro_impuestoClase=null;	
	public $otro_impuestosModel=null;	
	public $otro_impuestosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idotro_impuesto=0;	
	public ?int $idotro_impuestoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $otro_impuestoLogic=null;
	
	public $otro_impuestoActual=null;	
	
	public $otro_impuesto=null;
	public $otro_impuestos=null;
	public $otro_impuestosEliminados=array();
	public $otro_impuestosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $otro_impuestosLocal=array();
	public ?array $otro_impuestosReporte=null;
	public ?array $otro_impuestosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadotro_impuesto='onload';
	public string $strTipoPaginaAuxiliarotro_impuesto='none';
	public string $strTipoUsuarioAuxiliarotro_impuesto='none';
		
	public $otro_impuestoReturnGeneral=null;
	public $otro_impuestoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $otro_impuestoModel=null;
	public $otro_impuestoControllerAdditional=null;
	
	
	

	public $listaproductoLogic=null;

	public function  getlista_productoLogic() {
		return $this->listaproductoLogic;
	}

	public function setlista_productoLogic($listaproductoLogic) {
		$this->listaproductoLogic =$listaproductoLogic;
	}


	public $productoLogic=null;

	public function  getproductoLogic() {
		return $this->productoLogic;
	}

	public function setproductoLogic($productoLogic) {
		$this->productoLogic =$productoLogic;
	}


	public $clienteLogic=null;

	public function  getclienteLogic() {
		return $this->clienteLogic;
	}

	public function setclienteLogic($clienteLogic) {
		$this->clienteLogic =$clienteLogic;
	}


	public $proveedorLogic=null;

	public function  getproveedorLogic() {
		return $this->proveedorLogic;
	}

	public function setproveedorLogic($proveedorLogic) {
		$this->proveedorLogic =$proveedorLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajecodigo='';
	public string $strMensajedescripcion='';
	public string $strMensajevalor='';
	public string $strMensajepredeterminado='';
	public string $strMensajeid_cuenta_ventas='';
	public string $strMensajeid_cuenta_compras='';
	public string $strMensajecuenta_contable_ventas='';
	public string $strMensajecuenta_contable_compras='';
	
	
	public string $strVisibleFK_Idcuenta_compras='display:table-row';
	public string $strVisibleFK_Idcuenta_ventas='display:table-row';
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

	public array $cuenta_ventassFK=array();

	public function getcuenta_ventassFK():array {
		return $this->cuenta_ventassFK;
	}

	public function setcuenta_ventassFK(array $cuenta_ventassFK) {
		$this->cuenta_ventassFK = $cuenta_ventassFK;
	}

	public int $idcuenta_ventasDefaultFK=-1;

	public function getIdcuenta_ventasDefaultFK():int {
		return $this->idcuenta_ventasDefaultFK;
	}

	public function setIdcuenta_ventasDefaultFK(int $idcuenta_ventasDefaultFK) {
		$this->idcuenta_ventasDefaultFK = $idcuenta_ventasDefaultFK;
	}

	public array $cuenta_comprassFK=array();

	public function getcuenta_comprassFK():array {
		return $this->cuenta_comprassFK;
	}

	public function setcuenta_comprassFK(array $cuenta_comprassFK) {
		$this->cuenta_comprassFK = $cuenta_comprassFK;
	}

	public int $idcuenta_comprasDefaultFK=-1;

	public function getIdcuenta_comprasDefaultFK():int {
		return $this->idcuenta_comprasDefaultFK;
	}

	public function setIdcuenta_comprasDefaultFK(int $idcuenta_comprasDefaultFK) {
		$this->idcuenta_comprasDefaultFK = $idcuenta_comprasDefaultFK;
	}

	
	
	
	
	
	
	public $strTienePermisoslista_producto='none';
	public $strTienePermisosproducto='none';
	public $strTienePermisoscliente='none';
	public $strTienePermisosproveedor='none';
	
	
	public  $id_cuenta_comprasFK_Idcuenta_compras=null;

	public  $id_cuenta_ventasFK_Idcuenta_ventas=null;

	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->otro_impuestoLogic==null) {
				$this->otro_impuestoLogic=new otro_impuesto_logic();
			}
			
		} else {
			if($this->otro_impuestoLogic==null) {
				$this->otro_impuestoLogic=new otro_impuesto_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->otro_impuestoClase==null) {
				$this->otro_impuestoClase=new otro_impuesto();
			}
			
			$this->otro_impuestoClase->setId(0);	
				
				
			$this->otro_impuestoClase->setid_empresa(-1);	
			$this->otro_impuestoClase->setcodigo('');	
			$this->otro_impuestoClase->setdescripcion('');	
			$this->otro_impuestoClase->setvalor(0.0);	
			$this->otro_impuestoClase->setpredeterminado(false);	
			$this->otro_impuestoClase->setid_cuenta_ventas(null);	
			$this->otro_impuestoClase->setid_cuenta_compras(null);	
			$this->otro_impuestoClase->setcuenta_contable_ventas('');	
			$this->otro_impuestoClase->setcuenta_contable_compras('');	
			
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
		$this->prepararEjecutarMantenimientoBase('otro_impuesto');
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
		$this->cargarParametrosReporteBase('otro_impuesto');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('otro_impuesto');
	}
	
	public function actualizarControllerConReturnGeneral(otro_impuesto_param_return $otro_impuestoReturnGeneral) {
		if($otro_impuestoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesotro_impuestosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$otro_impuestoReturnGeneral->getsMensajeProceso();
		}
		
		if($otro_impuestoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$otro_impuestoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($otro_impuestoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$otro_impuestoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$otro_impuestoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($otro_impuestoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($otro_impuestoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$otro_impuestoReturnGeneral->getsFuncionJs();
		}
		
		if($otro_impuestoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(otro_impuesto_session $otro_impuesto_session){
		$this->strStyleDivArbol=$otro_impuesto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$otro_impuesto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$otro_impuesto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$otro_impuesto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$otro_impuesto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$otro_impuesto_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$otro_impuesto_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(otro_impuesto_session $otro_impuesto_session){
		$otro_impuesto_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$otro_impuesto_session->strStyleDivHeader='display:none';			
		$otro_impuesto_session->strStyleDivContent='width:93%;height:100%';	
		$otro_impuesto_session->strStyleDivOpcionesBanner='display:none';	
		$otro_impuesto_session->strStyleDivExpandirColapsar='display:none';	
		$otro_impuesto_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(otro_impuesto_control $otro_impuesto_control_session){
		$this->idNuevo=$otro_impuesto_control_session->idNuevo;
		$this->otro_impuestoActual=$otro_impuesto_control_session->otro_impuestoActual;
		$this->otro_impuesto=$otro_impuesto_control_session->otro_impuesto;
		$this->otro_impuestoClase=$otro_impuesto_control_session->otro_impuestoClase;
		$this->otro_impuestos=$otro_impuesto_control_session->otro_impuestos;
		$this->otro_impuestosEliminados=$otro_impuesto_control_session->otro_impuestosEliminados;
		$this->otro_impuesto=$otro_impuesto_control_session->otro_impuesto;
		$this->otro_impuestosReporte=$otro_impuesto_control_session->otro_impuestosReporte;
		$this->otro_impuestosSeleccionados=$otro_impuesto_control_session->otro_impuestosSeleccionados;
		$this->arrOrderBy=$otro_impuesto_control_session->arrOrderBy;
		$this->arrOrderByRel=$otro_impuesto_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$otro_impuesto_control_session->arrHistoryWebs;
		$this->arrSessionBases=$otro_impuesto_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadotro_impuesto=$otro_impuesto_control_session->strTypeOnLoadotro_impuesto;
		$this->strTipoPaginaAuxiliarotro_impuesto=$otro_impuesto_control_session->strTipoPaginaAuxiliarotro_impuesto;
		$this->strTipoUsuarioAuxiliarotro_impuesto=$otro_impuesto_control_session->strTipoUsuarioAuxiliarotro_impuesto;	
		
		$this->bitEsPopup=$otro_impuesto_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$otro_impuesto_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$otro_impuesto_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$otro_impuesto_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$otro_impuesto_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$otro_impuesto_control_session->strSufijo;
		$this->bitEsRelaciones=$otro_impuesto_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$otro_impuesto_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$otro_impuesto_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$otro_impuesto_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$otro_impuesto_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$otro_impuesto_control_session->strTituloTabla;
		$this->strTituloPathPagina=$otro_impuesto_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$otro_impuesto_control_session->strTituloPathElementoActual;
		
		if($this->otro_impuestoLogic==null) {			
			$this->otro_impuestoLogic=new otro_impuesto_logic();
		}
		
		
		if($this->otro_impuestoClase==null) {
			$this->otro_impuestoClase=new otro_impuesto();	
		}
		
		$this->otro_impuestoLogic->setotro_impuesto($this->otro_impuestoClase);
		
		
		if($this->otro_impuestos==null) {
			$this->otro_impuestos=array();	
		}
		
		$this->otro_impuestoLogic->setotro_impuestos($this->otro_impuestos);
		
		
		$this->strTipoView=$otro_impuesto_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$otro_impuesto_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$otro_impuesto_control_session->datosCliente;
		$this->strAccionBusqueda=$otro_impuesto_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$otro_impuesto_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$otro_impuesto_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$otro_impuesto_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$otro_impuesto_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$otro_impuesto_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$otro_impuesto_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$otro_impuesto_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$otro_impuesto_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$otro_impuesto_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$otro_impuesto_control_session->strTipoPaginacion;
		$this->strTipoAccion=$otro_impuesto_control_session->strTipoAccion;
		$this->tiposReportes=$otro_impuesto_control_session->tiposReportes;
		$this->tiposReporte=$otro_impuesto_control_session->tiposReporte;
		$this->tiposAcciones=$otro_impuesto_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$otro_impuesto_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$otro_impuesto_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$otro_impuesto_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$otro_impuesto_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$otro_impuesto_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$otro_impuesto_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$otro_impuesto_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$otro_impuesto_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$otro_impuesto_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$otro_impuesto_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$otro_impuesto_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$otro_impuesto_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$otro_impuesto_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$otro_impuesto_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$otro_impuesto_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$otro_impuesto_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$otro_impuesto_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$otro_impuesto_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$otro_impuesto_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$otro_impuesto_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$otro_impuesto_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$otro_impuesto_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$otro_impuesto_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$otro_impuesto_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$otro_impuesto_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$otro_impuesto_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$otro_impuesto_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$otro_impuesto_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$otro_impuesto_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$otro_impuesto_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$otro_impuesto_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$otro_impuesto_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$otro_impuesto_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$otro_impuesto_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$otro_impuesto_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$otro_impuesto_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$otro_impuesto_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$otro_impuesto_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$otro_impuesto_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$otro_impuesto_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$otro_impuesto_control_session->resumenUsuarioActual;	
		$this->moduloActual=$otro_impuesto_control_session->moduloActual;	
		$this->opcionActual=$otro_impuesto_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$otro_impuesto_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$otro_impuesto_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$otro_impuesto_session=unserialize($this->Session->read(otro_impuesto_util::$STR_SESSION_NAME));
				
		if($otro_impuesto_session==null) {
			$otro_impuesto_session=new otro_impuesto_session();
		}
		
		$this->strStyleDivArbol=$otro_impuesto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$otro_impuesto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$otro_impuesto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$otro_impuesto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$otro_impuesto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$otro_impuesto_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$otro_impuesto_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$otro_impuesto_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$otro_impuesto_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$otro_impuesto_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$otro_impuesto_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$otro_impuesto_control_session->strMensajeid_empresa;
		$this->strMensajecodigo=$otro_impuesto_control_session->strMensajecodigo;
		$this->strMensajedescripcion=$otro_impuesto_control_session->strMensajedescripcion;
		$this->strMensajevalor=$otro_impuesto_control_session->strMensajevalor;
		$this->strMensajepredeterminado=$otro_impuesto_control_session->strMensajepredeterminado;
		$this->strMensajeid_cuenta_ventas=$otro_impuesto_control_session->strMensajeid_cuenta_ventas;
		$this->strMensajeid_cuenta_compras=$otro_impuesto_control_session->strMensajeid_cuenta_compras;
		$this->strMensajecuenta_contable_ventas=$otro_impuesto_control_session->strMensajecuenta_contable_ventas;
		$this->strMensajecuenta_contable_compras=$otro_impuesto_control_session->strMensajecuenta_contable_compras;
			
		
		$this->empresasFK=$otro_impuesto_control_session->empresasFK;
		$this->idempresaDefaultFK=$otro_impuesto_control_session->idempresaDefaultFK;
		$this->cuenta_ventassFK=$otro_impuesto_control_session->cuenta_ventassFK;
		$this->idcuenta_ventasDefaultFK=$otro_impuesto_control_session->idcuenta_ventasDefaultFK;
		$this->cuenta_comprassFK=$otro_impuesto_control_session->cuenta_comprassFK;
		$this->idcuenta_comprasDefaultFK=$otro_impuesto_control_session->idcuenta_comprasDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta_compras=$otro_impuesto_control_session->strVisibleFK_Idcuenta_compras;
		$this->strVisibleFK_Idcuenta_ventas=$otro_impuesto_control_session->strVisibleFK_Idcuenta_ventas;
		$this->strVisibleFK_Idempresa=$otro_impuesto_control_session->strVisibleFK_Idempresa;
		
		
		$this->strTienePermisoslista_producto=$otro_impuesto_control_session->strTienePermisoslista_producto;
		$this->strTienePermisosproducto=$otro_impuesto_control_session->strTienePermisosproducto;
		$this->strTienePermisoscliente=$otro_impuesto_control_session->strTienePermisoscliente;
		$this->strTienePermisosproveedor=$otro_impuesto_control_session->strTienePermisosproveedor;
		
		
		$this->id_cuenta_comprasFK_Idcuenta_compras=$otro_impuesto_control_session->id_cuenta_comprasFK_Idcuenta_compras;
		$this->id_cuenta_ventasFK_Idcuenta_ventas=$otro_impuesto_control_session->id_cuenta_ventasFK_Idcuenta_ventas;
		$this->id_empresaFK_Idempresa=$otro_impuesto_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getotro_impuestoControllerAdditional() {
		return $this->otro_impuestoControllerAdditional;
	}

	public function setotro_impuestoControllerAdditional($otro_impuestoControllerAdditional) {
		$this->otro_impuestoControllerAdditional = $otro_impuestoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getotro_impuestoActual() : otro_impuesto {
		return $this->otro_impuestoActual;
	}

	public function setotro_impuestoActual(otro_impuesto $otro_impuestoActual) {
		$this->otro_impuestoActual = $otro_impuestoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidotro_impuesto() : int {
		return $this->idotro_impuesto;
	}

	public function setidotro_impuesto(int $idotro_impuesto) {
		$this->idotro_impuesto = $idotro_impuesto;
	}
	
	public function getotro_impuesto() : otro_impuesto {
		return $this->otro_impuesto;
	}

	public function setotro_impuesto(otro_impuesto $otro_impuesto) {
		$this->otro_impuesto = $otro_impuesto;
	}
		
	public function getotro_impuestoLogic() : otro_impuesto_logic {		
		return $this->otro_impuestoLogic;
	}

	public function setotro_impuestoLogic(otro_impuesto_logic $otro_impuestoLogic) {
		$this->otro_impuestoLogic = $otro_impuestoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getotro_impuestosModel() {		
		try {						
			/*otro_impuestosModel.setWrappedData(otro_impuestoLogic->getotro_impuestos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->otro_impuestosModel;
	}
	
	public function setotro_impuestosModel($otro_impuestosModel) {
		$this->otro_impuestosModel = $otro_impuestosModel;
	}
	
	public function getotro_impuestos() : array {		
		return $this->otro_impuestos;
	}
	
	public function setotro_impuestos(array $otro_impuestos) {
		$this->otro_impuestos= $otro_impuestos;
	}
	
	public function getotro_impuestosEliminados() : array {		
		return $this->otro_impuestosEliminados;
	}
	
	public function setotro_impuestosEliminados(array $otro_impuestosEliminados) {
		$this->otro_impuestosEliminados= $otro_impuestosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getotro_impuestoActualFromListDataModel() {
		try {
			/*$otro_impuestoClase= $this->otro_impuestosModel->getRowData();*/
			
			/*return $otro_impuesto;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
