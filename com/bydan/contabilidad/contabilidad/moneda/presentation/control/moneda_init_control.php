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

namespace com\bydan\contabilidad\contabilidad\moneda\presentation\control;

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

use com\bydan\contabilidad\contabilidad\moneda\business\entity\moneda;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/contabilidad/moneda/util/moneda_carga.php');
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_carga;

use com\bydan\contabilidad\contabilidad\moneda\util\moneda_util;
use com\bydan\contabilidad\contabilidad\moneda\util\moneda_param_return;
use com\bydan\contabilidad\contabilidad\moneda\business\logic\moneda_logic;
use com\bydan\contabilidad\contabilidad\moneda\presentation\session\moneda_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL


use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_carga;
use com\bydan\contabilidad\facturacion\devolucion_factura\util\devolucion_factura_util;
use com\bydan\contabilidad\facturacion\devolucion_factura\presentation\session\devolucion_factura_session;

use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_carga;
use com\bydan\contabilidad\facturacion\factura_lote\util\factura_lote_util;
use com\bydan\contabilidad\facturacion\factura_lote\presentation\session\factura_lote_session;

use com\bydan\contabilidad\estimados\estimado\util\estimado_carga;
use com\bydan\contabilidad\estimados\estimado\util\estimado_util;
use com\bydan\contabilidad\estimados\estimado\presentation\session\estimado_session;

use com\bydan\contabilidad\inventario\devolucion\util\devolucion_carga;
use com\bydan\contabilidad\inventario\devolucion\util\devolucion_util;
use com\bydan\contabilidad\inventario\devolucion\presentation\session\devolucion_session;

use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_carga;
use com\bydan\contabilidad\inventario\orden_compra\util\orden_compra_util;
use com\bydan\contabilidad\inventario\orden_compra\presentation\session\orden_compra_session;

use com\bydan\contabilidad\facturacion\factura\util\factura_carga;
use com\bydan\contabilidad\facturacion\factura\util\factura_util;
use com\bydan\contabilidad\facturacion\factura\presentation\session\factura_session;

use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_carga;
use com\bydan\contabilidad\inventario\cotizacion\util\cotizacion_util;
use com\bydan\contabilidad\inventario\cotizacion\presentation\session\cotizacion_session;

use com\bydan\contabilidad\general\parametro_general\util\parametro_general_carga;
use com\bydan\contabilidad\general\parametro_general\util\parametro_general_util;
use com\bydan\contabilidad\general\parametro_general\presentation\session\parametro_general_session;

use com\bydan\contabilidad\estimados\consignacion\util\consignacion_carga;
use com\bydan\contabilidad\estimados\consignacion\util\consignacion_util;
use com\bydan\contabilidad\estimados\consignacion\presentation\session\consignacion_session;


/*CARGA ARCHIVOS FRAMEWORK*/
moneda_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
moneda_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
moneda_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*moneda_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class moneda_init_control extends ControllerBase {	
	
	public $monedaClase=null;	
	public $monedasModel=null;	
	public $monedasListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idmoneda=0;	
	public ?int $idmonedaActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $monedaLogic=null;
	
	public $monedaActual=null;	
	
	public $moneda=null;
	public $monedas=null;
	public $monedasEliminados=array();
	public $monedasAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $monedasLocal=array();
	public ?array $monedasReporte=null;
	public ?array $monedasSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadmoneda='onload';
	public string $strTipoPaginaAuxiliarmoneda='none';
	public string $strTipoUsuarioAuxiliarmoneda='none';
		
	public $monedaReturnGeneral=null;
	public $monedaParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $monedaModel=null;
	public $monedaControllerAdditional=null;
	
	
	

	public $devolucionfacturaLogic=null;

	public function  getdevolucion_facturaLogic() {
		return $this->devolucionfacturaLogic;
	}

	public function setdevolucion_facturaLogic($devolucionfacturaLogic) {
		$this->devolucionfacturaLogic =$devolucionfacturaLogic;
	}


	public $facturaloteLogic=null;

	public function  getfactura_loteLogic() {
		return $this->facturaloteLogic;
	}

	public function setfactura_loteLogic($facturaloteLogic) {
		$this->facturaloteLogic =$facturaloteLogic;
	}


	public $estimadoLogic=null;

	public function  getestimadoLogic() {
		return $this->estimadoLogic;
	}

	public function setestimadoLogic($estimadoLogic) {
		$this->estimadoLogic =$estimadoLogic;
	}


	public $devolucionLogic=null;

	public function  getdevolucionLogic() {
		return $this->devolucionLogic;
	}

	public function setdevolucionLogic($devolucionLogic) {
		$this->devolucionLogic =$devolucionLogic;
	}


	public $ordencompraLogic=null;

	public function  getorden_compraLogic() {
		return $this->ordencompraLogic;
	}

	public function setorden_compraLogic($ordencompraLogic) {
		$this->ordencompraLogic =$ordencompraLogic;
	}


	public $facturaLogic=null;

	public function  getfacturaLogic() {
		return $this->facturaLogic;
	}

	public function setfacturaLogic($facturaLogic) {
		$this->facturaLogic =$facturaLogic;
	}


	public $cotizacionLogic=null;

	public function  getcotizacionLogic() {
		return $this->cotizacionLogic;
	}

	public function setcotizacionLogic($cotizacionLogic) {
		$this->cotizacionLogic =$cotizacionLogic;
	}


	public $parametrogeneralLogic=null;

	public function  getparametro_generalLogic() {
		return $this->parametrogeneralLogic;
	}

	public function setparametro_generalLogic($parametrogeneralLogic) {
		$this->parametrogeneralLogic =$parametrogeneralLogic;
	}


	public $consignacionLogic=null;

	public function  getconsignacionLogic() {
		return $this->consignacionLogic;
	}

	public function setconsignacionLogic($consignacionLogic) {
		$this->consignacionLogic =$consignacionLogic;
	}
 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajecodigo='';
	public string $strMensajenombre='';
	public string $strMensajesimbolo='';
	
	
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

	
	
	
	
	
	
	public $strTienePermisosdevolucion_factura='none';
	public $strTienePermisosfactura_lote='none';
	public $strTienePermisosestimado='none';
	public $strTienePermisosdevolucion='none';
	public $strTienePermisosorden_compra='none';
	public $strTienePermisosfactura='none';
	public $strTienePermisoscotizacion='none';
	public $strTienePermisosparametro_general='none';
	public $strTienePermisosconsignacion='none';
	
	
	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->monedaLogic==null) {
				$this->monedaLogic=new moneda_logic();
			}
			
		} else {
			if($this->monedaLogic==null) {
				$this->monedaLogic=new moneda_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->monedaClase==null) {
				$this->monedaClase=new moneda();
			}
			
			$this->monedaClase->setId(0);	
				
				
			$this->monedaClase->setid_empresa(-1);	
			$this->monedaClase->setcodigo('');	
			$this->monedaClase->setnombre('');	
			$this->monedaClase->setsimbolo('');	
			
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
		$this->prepararEjecutarMantenimientoBase('moneda');
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
		$this->cargarParametrosReporteBase('moneda');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('moneda');
	}
	
	public function actualizarControllerConReturnGeneral(moneda_param_return $monedaReturnGeneral) {
		if($monedaReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesmonedasAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$monedaReturnGeneral->getsMensajeProceso();
		}
		
		if($monedaReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$monedaReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($monedaReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$monedaReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$monedaReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($monedaReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($monedaReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$monedaReturnGeneral->getsFuncionJs();
		}
		
		if($monedaReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(moneda_session $moneda_session){
		$this->strStyleDivArbol=$moneda_session->strStyleDivArbol;	
		$this->strStyleDivContent=$moneda_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$moneda_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$moneda_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$moneda_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$moneda_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$moneda_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(moneda_session $moneda_session){
		$moneda_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$moneda_session->strStyleDivHeader='display:none';			
		$moneda_session->strStyleDivContent='width:93%;height:100%';	
		$moneda_session->strStyleDivOpcionesBanner='display:none';	
		$moneda_session->strStyleDivExpandirColapsar='display:none';	
		$moneda_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(moneda_control $moneda_control_session){
		$this->idNuevo=$moneda_control_session->idNuevo;
		$this->monedaActual=$moneda_control_session->monedaActual;
		$this->moneda=$moneda_control_session->moneda;
		$this->monedaClase=$moneda_control_session->monedaClase;
		$this->monedas=$moneda_control_session->monedas;
		$this->monedasEliminados=$moneda_control_session->monedasEliminados;
		$this->moneda=$moneda_control_session->moneda;
		$this->monedasReporte=$moneda_control_session->monedasReporte;
		$this->monedasSeleccionados=$moneda_control_session->monedasSeleccionados;
		$this->arrOrderBy=$moneda_control_session->arrOrderBy;
		$this->arrOrderByRel=$moneda_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$moneda_control_session->arrHistoryWebs;
		$this->arrSessionBases=$moneda_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadmoneda=$moneda_control_session->strTypeOnLoadmoneda;
		$this->strTipoPaginaAuxiliarmoneda=$moneda_control_session->strTipoPaginaAuxiliarmoneda;
		$this->strTipoUsuarioAuxiliarmoneda=$moneda_control_session->strTipoUsuarioAuxiliarmoneda;	
		
		$this->bitEsPopup=$moneda_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$moneda_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$moneda_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$moneda_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$moneda_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$moneda_control_session->strSufijo;
		$this->bitEsRelaciones=$moneda_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$moneda_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$moneda_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$moneda_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$moneda_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$moneda_control_session->strTituloTabla;
		$this->strTituloPathPagina=$moneda_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$moneda_control_session->strTituloPathElementoActual;
		
		if($this->monedaLogic==null) {			
			$this->monedaLogic=new moneda_logic();
		}
		
		
		if($this->monedaClase==null) {
			$this->monedaClase=new moneda();	
		}
		
		$this->monedaLogic->setmoneda($this->monedaClase);
		
		
		if($this->monedas==null) {
			$this->monedas=array();	
		}
		
		$this->monedaLogic->setmonedas($this->monedas);
		
		
		$this->strTipoView=$moneda_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$moneda_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$moneda_control_session->datosCliente;
		$this->strAccionBusqueda=$moneda_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$moneda_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$moneda_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$moneda_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$moneda_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$moneda_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$moneda_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$moneda_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$moneda_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$moneda_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$moneda_control_session->strTipoPaginacion;
		$this->strTipoAccion=$moneda_control_session->strTipoAccion;
		$this->tiposReportes=$moneda_control_session->tiposReportes;
		$this->tiposReporte=$moneda_control_session->tiposReporte;
		$this->tiposAcciones=$moneda_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$moneda_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$moneda_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$moneda_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$moneda_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$moneda_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$moneda_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$moneda_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$moneda_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$moneda_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$moneda_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$moneda_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$moneda_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$moneda_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$moneda_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$moneda_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$moneda_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$moneda_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$moneda_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$moneda_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$moneda_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$moneda_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$moneda_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$moneda_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$moneda_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$moneda_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$moneda_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$moneda_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$moneda_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$moneda_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$moneda_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$moneda_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$moneda_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$moneda_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$moneda_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$moneda_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$moneda_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$moneda_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$moneda_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$moneda_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$moneda_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$moneda_control_session->resumenUsuarioActual;	
		$this->moduloActual=$moneda_control_session->moduloActual;	
		$this->opcionActual=$moneda_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$moneda_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$moneda_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$moneda_session=unserialize($this->Session->read(moneda_util::$STR_SESSION_NAME));
				
		if($moneda_session==null) {
			$moneda_session=new moneda_session();
		}
		
		$this->strStyleDivArbol=$moneda_session->strStyleDivArbol;	
		$this->strStyleDivContent=$moneda_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$moneda_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$moneda_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$moneda_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$moneda_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$moneda_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$moneda_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$moneda_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$moneda_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$moneda_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$moneda_control_session->strMensajeid_empresa;
		$this->strMensajecodigo=$moneda_control_session->strMensajecodigo;
		$this->strMensajenombre=$moneda_control_session->strMensajenombre;
		$this->strMensajesimbolo=$moneda_control_session->strMensajesimbolo;
			
		
		$this->empresasFK=$moneda_control_session->empresasFK;
		$this->idempresaDefaultFK=$moneda_control_session->idempresaDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$moneda_control_session->strVisibleFK_Idempresa;
		
		
		$this->strTienePermisosdevolucion_factura=$moneda_control_session->strTienePermisosdevolucion_factura;
		$this->strTienePermisosfactura_lote=$moneda_control_session->strTienePermisosfactura_lote;
		$this->strTienePermisosestimado=$moneda_control_session->strTienePermisosestimado;
		$this->strTienePermisosdevolucion=$moneda_control_session->strTienePermisosdevolucion;
		$this->strTienePermisosorden_compra=$moneda_control_session->strTienePermisosorden_compra;
		$this->strTienePermisosfactura=$moneda_control_session->strTienePermisosfactura;
		$this->strTienePermisoscotizacion=$moneda_control_session->strTienePermisoscotizacion;
		$this->strTienePermisosparametro_general=$moneda_control_session->strTienePermisosparametro_general;
		$this->strTienePermisosconsignacion=$moneda_control_session->strTienePermisosconsignacion;
		
		
		$this->id_empresaFK_Idempresa=$moneda_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getmonedaControllerAdditional() {
		return $this->monedaControllerAdditional;
	}

	public function setmonedaControllerAdditional($monedaControllerAdditional) {
		$this->monedaControllerAdditional = $monedaControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getmonedaActual() : moneda {
		return $this->monedaActual;
	}

	public function setmonedaActual(moneda $monedaActual) {
		$this->monedaActual = $monedaActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidmoneda() : int {
		return $this->idmoneda;
	}

	public function setidmoneda(int $idmoneda) {
		$this->idmoneda = $idmoneda;
	}
	
	public function getmoneda() : moneda {
		return $this->moneda;
	}

	public function setmoneda(moneda $moneda) {
		$this->moneda = $moneda;
	}
		
	public function getmonedaLogic() : moneda_logic {		
		return $this->monedaLogic;
	}

	public function setmonedaLogic(moneda_logic $monedaLogic) {
		$this->monedaLogic = $monedaLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getmonedasModel() {		
		try {						
			/*monedasModel.setWrappedData(monedaLogic->getmonedas());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->monedasModel;
	}
	
	public function setmonedasModel($monedasModel) {
		$this->monedasModel = $monedasModel;
	}
	
	public function getmonedas() : array {		
		return $this->monedas;
	}
	
	public function setmonedas(array $monedas) {
		$this->monedas= $monedas;
	}
	
	public function getmonedasEliminados() : array {		
		return $this->monedasEliminados;
	}
	
	public function setmonedasEliminados(array $monedasEliminados) {
		$this->monedasEliminados= $monedasEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getmonedaActualFromListDataModel() {
		try {
			/*$monedaClase= $this->monedasModel->getRowData();*/
			
			/*return $moneda;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
