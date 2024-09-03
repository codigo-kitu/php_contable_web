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

namespace com\bydan\contabilidad\facturacion\impuesto\presentation\control;

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

use com\bydan\contabilidad\facturacion\impuesto\business\entity\impuesto;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/impuesto/util/impuesto_carga.php');
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_carga;

use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_util;
use com\bydan\contabilidad\facturacion\impuesto\util\impuesto_param_return;
use com\bydan\contabilidad\facturacion\impuesto\business\logic\impuesto_logic;
use com\bydan\contabilidad\facturacion\impuesto\presentation\session\impuesto_session;


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
impuesto_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
impuesto_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
impuesto_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*impuesto_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class impuesto_init_control extends ControllerBase {	
	
	public $impuestoClase=null;	
	public $impuestosModel=null;	
	public $impuestosListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idimpuesto=0;	
	public ?int $idimpuestoActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $impuestoLogic=null;
	
	public $impuestoActual=null;	
	
	public $impuesto=null;
	public $impuestos=null;
	public $impuestosEliminados=array();
	public $impuestosAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $impuestosLocal=array();
	public ?array $impuestosReporte=null;
	public ?array $impuestosSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadimpuesto='onload';
	public string $strTipoPaginaAuxiliarimpuesto='none';
	public string $strTipoUsuarioAuxiliarimpuesto='none';
		
	public $impuestoReturnGeneral=null;
	public $impuestoParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $impuestoModel=null;
	public $impuestoControllerAdditional=null;
	
	
	

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
			if($this->impuestoLogic==null) {
				$this->impuestoLogic=new impuesto_logic();
			}
			
		} else {
			if($this->impuestoLogic==null) {
				$this->impuestoLogic=new impuesto_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->impuestoClase==null) {
				$this->impuestoClase=new impuesto();
			}
			
			$this->impuestoClase->setId(0);	
				
				
			$this->impuestoClase->setid_empresa(-1);	
			$this->impuestoClase->setcodigo('');	
			$this->impuestoClase->setdescripcion('');	
			$this->impuestoClase->setvalor(0.0);	
			$this->impuestoClase->setpredeterminado(false);	
			$this->impuestoClase->setid_cuenta_ventas(null);	
			$this->impuestoClase->setid_cuenta_compras(null);	
			$this->impuestoClase->setcuenta_contable_ventas('');	
			$this->impuestoClase->setcuenta_contable_compras('');	
			
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
		$this->prepararEjecutarMantenimientoBase('impuesto');
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
		$this->cargarParametrosReporteBase('impuesto');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('impuesto');
	}
	
	public function actualizarControllerConReturnGeneral(impuesto_param_return $impuestoReturnGeneral) {
		if($impuestoReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesimpuestosAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$impuestoReturnGeneral->getsMensajeProceso();
		}
		
		if($impuestoReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$impuestoReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($impuestoReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$impuestoReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$impuestoReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($impuestoReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($impuestoReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$impuestoReturnGeneral->getsFuncionJs();
		}
		
		if($impuestoReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(impuesto_session $impuesto_session){
		$this->strStyleDivArbol=$impuesto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$impuesto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$impuesto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$impuesto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$impuesto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$impuesto_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$impuesto_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(impuesto_session $impuesto_session){
		$impuesto_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$impuesto_session->strStyleDivHeader='display:none';			
		$impuesto_session->strStyleDivContent='width:93%;height:100%';	
		$impuesto_session->strStyleDivOpcionesBanner='display:none';	
		$impuesto_session->strStyleDivExpandirColapsar='display:none';	
		$impuesto_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(impuesto_control $impuesto_control_session){
		$this->idNuevo=$impuesto_control_session->idNuevo;
		$this->impuestoActual=$impuesto_control_session->impuestoActual;
		$this->impuesto=$impuesto_control_session->impuesto;
		$this->impuestoClase=$impuesto_control_session->impuestoClase;
		$this->impuestos=$impuesto_control_session->impuestos;
		$this->impuestosEliminados=$impuesto_control_session->impuestosEliminados;
		$this->impuesto=$impuesto_control_session->impuesto;
		$this->impuestosReporte=$impuesto_control_session->impuestosReporte;
		$this->impuestosSeleccionados=$impuesto_control_session->impuestosSeleccionados;
		$this->arrOrderBy=$impuesto_control_session->arrOrderBy;
		$this->arrOrderByRel=$impuesto_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$impuesto_control_session->arrHistoryWebs;
		$this->arrSessionBases=$impuesto_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadimpuesto=$impuesto_control_session->strTypeOnLoadimpuesto;
		$this->strTipoPaginaAuxiliarimpuesto=$impuesto_control_session->strTipoPaginaAuxiliarimpuesto;
		$this->strTipoUsuarioAuxiliarimpuesto=$impuesto_control_session->strTipoUsuarioAuxiliarimpuesto;	
		
		$this->bitEsPopup=$impuesto_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$impuesto_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$impuesto_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$impuesto_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$impuesto_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$impuesto_control_session->strSufijo;
		$this->bitEsRelaciones=$impuesto_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$impuesto_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$impuesto_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$impuesto_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$impuesto_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$impuesto_control_session->strTituloTabla;
		$this->strTituloPathPagina=$impuesto_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$impuesto_control_session->strTituloPathElementoActual;
		
		if($this->impuestoLogic==null) {			
			$this->impuestoLogic=new impuesto_logic();
		}
		
		
		if($this->impuestoClase==null) {
			$this->impuestoClase=new impuesto();	
		}
		
		$this->impuestoLogic->setimpuesto($this->impuestoClase);
		
		
		if($this->impuestos==null) {
			$this->impuestos=array();	
		}
		
		$this->impuestoLogic->setimpuestos($this->impuestos);
		
		
		$this->strTipoView=$impuesto_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$impuesto_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$impuesto_control_session->datosCliente;
		$this->strAccionBusqueda=$impuesto_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$impuesto_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$impuesto_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$impuesto_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$impuesto_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$impuesto_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$impuesto_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$impuesto_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$impuesto_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$impuesto_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$impuesto_control_session->strTipoPaginacion;
		$this->strTipoAccion=$impuesto_control_session->strTipoAccion;
		$this->tiposReportes=$impuesto_control_session->tiposReportes;
		$this->tiposReporte=$impuesto_control_session->tiposReporte;
		$this->tiposAcciones=$impuesto_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$impuesto_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$impuesto_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$impuesto_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$impuesto_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$impuesto_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$impuesto_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$impuesto_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$impuesto_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$impuesto_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$impuesto_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$impuesto_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$impuesto_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$impuesto_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$impuesto_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$impuesto_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$impuesto_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$impuesto_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$impuesto_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$impuesto_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$impuesto_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$impuesto_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$impuesto_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$impuesto_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$impuesto_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$impuesto_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$impuesto_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$impuesto_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$impuesto_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$impuesto_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$impuesto_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$impuesto_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$impuesto_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$impuesto_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$impuesto_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$impuesto_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$impuesto_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$impuesto_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$impuesto_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$impuesto_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$impuesto_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$impuesto_control_session->resumenUsuarioActual;	
		$this->moduloActual=$impuesto_control_session->moduloActual;	
		$this->opcionActual=$impuesto_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$impuesto_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$impuesto_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$impuesto_session=unserialize($this->Session->read(impuesto_util::$STR_SESSION_NAME));
				
		if($impuesto_session==null) {
			$impuesto_session=new impuesto_session();
		}
		
		$this->strStyleDivArbol=$impuesto_session->strStyleDivArbol;	
		$this->strStyleDivContent=$impuesto_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$impuesto_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$impuesto_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$impuesto_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$impuesto_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$impuesto_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$impuesto_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$impuesto_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$impuesto_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$impuesto_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$impuesto_control_session->strMensajeid_empresa;
		$this->strMensajecodigo=$impuesto_control_session->strMensajecodigo;
		$this->strMensajedescripcion=$impuesto_control_session->strMensajedescripcion;
		$this->strMensajevalor=$impuesto_control_session->strMensajevalor;
		$this->strMensajepredeterminado=$impuesto_control_session->strMensajepredeterminado;
		$this->strMensajeid_cuenta_ventas=$impuesto_control_session->strMensajeid_cuenta_ventas;
		$this->strMensajeid_cuenta_compras=$impuesto_control_session->strMensajeid_cuenta_compras;
		$this->strMensajecuenta_contable_ventas=$impuesto_control_session->strMensajecuenta_contable_ventas;
		$this->strMensajecuenta_contable_compras=$impuesto_control_session->strMensajecuenta_contable_compras;
			
		
		$this->empresasFK=$impuesto_control_session->empresasFK;
		$this->idempresaDefaultFK=$impuesto_control_session->idempresaDefaultFK;
		$this->cuenta_ventassFK=$impuesto_control_session->cuenta_ventassFK;
		$this->idcuenta_ventasDefaultFK=$impuesto_control_session->idcuenta_ventasDefaultFK;
		$this->cuenta_comprassFK=$impuesto_control_session->cuenta_comprassFK;
		$this->idcuenta_comprasDefaultFK=$impuesto_control_session->idcuenta_comprasDefaultFK;
		
		
		$this->strVisibleFK_Idcuenta_compras=$impuesto_control_session->strVisibleFK_Idcuenta_compras;
		$this->strVisibleFK_Idcuenta_ventas=$impuesto_control_session->strVisibleFK_Idcuenta_ventas;
		$this->strVisibleFK_Idempresa=$impuesto_control_session->strVisibleFK_Idempresa;
		
		
		$this->strTienePermisoslista_producto=$impuesto_control_session->strTienePermisoslista_producto;
		$this->strTienePermisosproducto=$impuesto_control_session->strTienePermisosproducto;
		$this->strTienePermisoscliente=$impuesto_control_session->strTienePermisoscliente;
		$this->strTienePermisosproveedor=$impuesto_control_session->strTienePermisosproveedor;
		
		
		$this->id_cuenta_comprasFK_Idcuenta_compras=$impuesto_control_session->id_cuenta_comprasFK_Idcuenta_compras;
		$this->id_cuenta_ventasFK_Idcuenta_ventas=$impuesto_control_session->id_cuenta_ventasFK_Idcuenta_ventas;
		$this->id_empresaFK_Idempresa=$impuesto_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getimpuestoControllerAdditional() {
		return $this->impuestoControllerAdditional;
	}

	public function setimpuestoControllerAdditional($impuestoControllerAdditional) {
		$this->impuestoControllerAdditional = $impuestoControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getimpuestoActual() : impuesto {
		return $this->impuestoActual;
	}

	public function setimpuestoActual(impuesto $impuestoActual) {
		$this->impuestoActual = $impuestoActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidimpuesto() : int {
		return $this->idimpuesto;
	}

	public function setidimpuesto(int $idimpuesto) {
		$this->idimpuesto = $idimpuesto;
	}
	
	public function getimpuesto() : impuesto {
		return $this->impuesto;
	}

	public function setimpuesto(impuesto $impuesto) {
		$this->impuesto = $impuesto;
	}
		
	public function getimpuestoLogic() : impuesto_logic {		
		return $this->impuestoLogic;
	}

	public function setimpuestoLogic(impuesto_logic $impuestoLogic) {
		$this->impuestoLogic = $impuestoLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getimpuestosModel() {		
		try {						
			/*impuestosModel.setWrappedData(impuestoLogic->getimpuestos());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->impuestosModel;
	}
	
	public function setimpuestosModel($impuestosModel) {
		$this->impuestosModel = $impuestosModel;
	}
	
	public function getimpuestos() : array {		
		return $this->impuestos;
	}
	
	public function setimpuestos(array $impuestos) {
		$this->impuestos= $impuestos;
	}
	
	public function getimpuestosEliminados() : array {		
		return $this->impuestosEliminados;
	}
	
	public function setimpuestosEliminados(array $impuestosEliminados) {
		$this->impuestosEliminados= $impuestosEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getimpuestoActualFromListDataModel() {
		try {
			/*$impuestoClase= $this->impuestosModel->getRowData();*/
			
			/*return $impuesto;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
