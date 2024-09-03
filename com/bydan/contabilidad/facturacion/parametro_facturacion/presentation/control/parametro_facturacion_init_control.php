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

namespace com\bydan\contabilidad\facturacion\parametro_facturacion\presentation\control;

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

use com\bydan\contabilidad\facturacion\parametro_facturacion\business\entity\parametro_facturacion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/facturacion/parametro_facturacion/util/parametro_facturacion_carga.php');
use com\bydan\contabilidad\facturacion\parametro_facturacion\util\parametro_facturacion_carga;

use com\bydan\contabilidad\facturacion\parametro_facturacion\util\parametro_facturacion_util;
use com\bydan\contabilidad\facturacion\parametro_facturacion\util\parametro_facturacion_param_return;
use com\bydan\contabilidad\facturacion\parametro_facturacion\business\logic\parametro_facturacion_logic;
use com\bydan\contabilidad\facturacion\parametro_facturacion\presentation\session\parametro_facturacion_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\entity\termino_pago_cliente;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\business\logic\termino_pago_cliente_logic;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_carga;
use com\bydan\contabilidad\cuentascobrar\termino_pago_cliente\util\termino_pago_cliente_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_facturacion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_facturacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_facturacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_facturacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_facturacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class parametro_facturacion_init_control extends ControllerBase {	
	
	public $parametro_facturacionClase=null;	
	public $parametro_facturacionsModel=null;	
	public $parametro_facturacionsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idparametro_facturacion=0;	
	public ?int $idparametro_facturacionActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $parametro_facturacionLogic=null;
	
	public $parametro_facturacionActual=null;	
	
	public $parametro_facturacion=null;
	public $parametro_facturacions=null;
	public $parametro_facturacionsEliminados=array();
	public $parametro_facturacionsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $parametro_facturacionsLocal=array();
	public ?array $parametro_facturacionsReporte=null;
	public ?array $parametro_facturacionsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadparametro_facturacion='onload';
	public string $strTipoPaginaAuxiliarparametro_facturacion='none';
	public string $strTipoUsuarioAuxiliarparametro_facturacion='none';
		
	public $parametro_facturacionReturnGeneral=null;
	public $parametro_facturacionParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $parametro_facturacionModel=null;
	public $parametro_facturacionControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajenombre_factura='';
	public string $strMensajenumero_factura='';
	public string $strMensajeincremento_factura='';
	public string $strMensajesolo_costo_producto='';
	public string $strMensajenumero_factura_lote='';
	public string $strMensajeincremento_factura_lote='';
	public string $strMensajenumero_devolucion='';
	public string $strMensajeincremento_devolucion='';
	public string $strMensajeid_termino_pago_cliente='';
	public string $strMensajenombre_estimado='';
	public string $strMensajenumero_estimado='';
	public string $strMensajeincremento_estimado='';
	public string $strMensajesolo_costo_producto_estimado='';
	public string $strMensajenombre_consignacion='';
	public string $strMensajenumero_consignacion='';
	public string $strMensajeincremento_consignacion='';
	public string $strMensajesolo_costo_producto_consignacion='';
	public string $strMensajecon_recibo='';
	public string $strMensajenombre_recibo='';
	public string $strMensajenumero_recibo='';
	public string $strMensajeincremento_recibo='';
	public string $strMensajecon_impuesto_recibo='';
	
	
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idtermino_pago='display:table-row';

	
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

	public array $termino_pago_clientesFK=array();

	public function gettermino_pago_clientesFK():array {
		return $this->termino_pago_clientesFK;
	}

	public function settermino_pago_clientesFK(array $termino_pago_clientesFK) {
		$this->termino_pago_clientesFK = $termino_pago_clientesFK;
	}

	public int $idtermino_pago_clienteDefaultFK=-1;

	public function getIdtermino_pago_clienteDefaultFK():int {
		return $this->idtermino_pago_clienteDefaultFK;
	}

	public function setIdtermino_pago_clienteDefaultFK(int $idtermino_pago_clienteDefaultFK) {
		$this->idtermino_pago_clienteDefaultFK = $idtermino_pago_clienteDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_empresaFK_Idempresa=null;

	public  $id_termino_pago_clienteFK_Idtermino_pago=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->parametro_facturacionLogic==null) {
				$this->parametro_facturacionLogic=new parametro_facturacion_logic();
			}
			
		} else {
			if($this->parametro_facturacionLogic==null) {
				$this->parametro_facturacionLogic=new parametro_facturacion_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->parametro_facturacionClase==null) {
				$this->parametro_facturacionClase=new parametro_facturacion();
			}
			
			$this->parametro_facturacionClase->setId(0);	
				
				
			$this->parametro_facturacionClase->setid_empresa(-1);	
			$this->parametro_facturacionClase->setnombre_factura('');	
			$this->parametro_facturacionClase->setnumero_factura(0);	
			$this->parametro_facturacionClase->setincremento_factura(0);	
			$this->parametro_facturacionClase->setsolo_costo_producto(false);	
			$this->parametro_facturacionClase->setnumero_factura_lote(0);	
			$this->parametro_facturacionClase->setincremento_factura_lote(0);	
			$this->parametro_facturacionClase->setnumero_devolucion(0);	
			$this->parametro_facturacionClase->setincremento_devolucion(0);	
			$this->parametro_facturacionClase->setid_termino_pago_cliente(-1);	
			$this->parametro_facturacionClase->setnombre_estimado('');	
			$this->parametro_facturacionClase->setnumero_estimado(0);	
			$this->parametro_facturacionClase->setincremento_estimado(0);	
			$this->parametro_facturacionClase->setsolo_costo_producto_estimado(false);	
			$this->parametro_facturacionClase->setnombre_consignacion('');	
			$this->parametro_facturacionClase->setnumero_consignacion(0);	
			$this->parametro_facturacionClase->setincremento_consignacion(0);	
			$this->parametro_facturacionClase->setsolo_costo_producto_consignacion(false);	
			$this->parametro_facturacionClase->setcon_recibo(false);	
			$this->parametro_facturacionClase->setnombre_recibo('');	
			$this->parametro_facturacionClase->setnumero_recibo(0);	
			$this->parametro_facturacionClase->setincremento_recibo(0);	
			$this->parametro_facturacionClase->setcon_impuesto_recibo(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('parametro_facturacion');
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
		$this->cargarParametrosReporteBase('parametro_facturacion');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('parametro_facturacion');
	}
	
	public function actualizarControllerConReturnGeneral(parametro_facturacion_param_return $parametro_facturacionReturnGeneral) {
		if($parametro_facturacionReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesparametro_facturacionsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$parametro_facturacionReturnGeneral->getsMensajeProceso();
		}
		
		if($parametro_facturacionReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$parametro_facturacionReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($parametro_facturacionReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$parametro_facturacionReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$parametro_facturacionReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($parametro_facturacionReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($parametro_facturacionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$parametro_facturacionReturnGeneral->getsFuncionJs();
		}
		
		if($parametro_facturacionReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(parametro_facturacion_session $parametro_facturacion_session){
		$this->strStyleDivArbol=$parametro_facturacion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_facturacion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_facturacion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_facturacion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_facturacion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_facturacion_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$parametro_facturacion_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(parametro_facturacion_session $parametro_facturacion_session){
		$parametro_facturacion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$parametro_facturacion_session->strStyleDivHeader='display:none';			
		$parametro_facturacion_session->strStyleDivContent='width:93%;height:100%';	
		$parametro_facturacion_session->strStyleDivOpcionesBanner='display:none';	
		$parametro_facturacion_session->strStyleDivExpandirColapsar='display:none';	
		$parametro_facturacion_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(parametro_facturacion_control $parametro_facturacion_control_session){
		$this->idNuevo=$parametro_facturacion_control_session->idNuevo;
		$this->parametro_facturacionActual=$parametro_facturacion_control_session->parametro_facturacionActual;
		$this->parametro_facturacion=$parametro_facturacion_control_session->parametro_facturacion;
		$this->parametro_facturacionClase=$parametro_facturacion_control_session->parametro_facturacionClase;
		$this->parametro_facturacions=$parametro_facturacion_control_session->parametro_facturacions;
		$this->parametro_facturacionsEliminados=$parametro_facturacion_control_session->parametro_facturacionsEliminados;
		$this->parametro_facturacion=$parametro_facturacion_control_session->parametro_facturacion;
		$this->parametro_facturacionsReporte=$parametro_facturacion_control_session->parametro_facturacionsReporte;
		$this->parametro_facturacionsSeleccionados=$parametro_facturacion_control_session->parametro_facturacionsSeleccionados;
		$this->arrOrderBy=$parametro_facturacion_control_session->arrOrderBy;
		$this->arrOrderByRel=$parametro_facturacion_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$parametro_facturacion_control_session->arrHistoryWebs;
		$this->arrSessionBases=$parametro_facturacion_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadparametro_facturacion=$parametro_facturacion_control_session->strTypeOnLoadparametro_facturacion;
		$this->strTipoPaginaAuxiliarparametro_facturacion=$parametro_facturacion_control_session->strTipoPaginaAuxiliarparametro_facturacion;
		$this->strTipoUsuarioAuxiliarparametro_facturacion=$parametro_facturacion_control_session->strTipoUsuarioAuxiliarparametro_facturacion;	
		
		$this->bitEsPopup=$parametro_facturacion_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$parametro_facturacion_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$parametro_facturacion_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$parametro_facturacion_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$parametro_facturacion_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$parametro_facturacion_control_session->strSufijo;
		$this->bitEsRelaciones=$parametro_facturacion_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$parametro_facturacion_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$parametro_facturacion_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$parametro_facturacion_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$parametro_facturacion_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$parametro_facturacion_control_session->strTituloTabla;
		$this->strTituloPathPagina=$parametro_facturacion_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$parametro_facturacion_control_session->strTituloPathElementoActual;
		
		if($this->parametro_facturacionLogic==null) {			
			$this->parametro_facturacionLogic=new parametro_facturacion_logic();
		}
		
		
		if($this->parametro_facturacionClase==null) {
			$this->parametro_facturacionClase=new parametro_facturacion();	
		}
		
		$this->parametro_facturacionLogic->setparametro_facturacion($this->parametro_facturacionClase);
		
		
		if($this->parametro_facturacions==null) {
			$this->parametro_facturacions=array();	
		}
		
		$this->parametro_facturacionLogic->setparametro_facturacions($this->parametro_facturacions);
		
		
		$this->strTipoView=$parametro_facturacion_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$parametro_facturacion_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$parametro_facturacion_control_session->datosCliente;
		$this->strAccionBusqueda=$parametro_facturacion_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$parametro_facturacion_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$parametro_facturacion_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$parametro_facturacion_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$parametro_facturacion_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$parametro_facturacion_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$parametro_facturacion_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$parametro_facturacion_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$parametro_facturacion_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$parametro_facturacion_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$parametro_facturacion_control_session->strTipoPaginacion;
		$this->strTipoAccion=$parametro_facturacion_control_session->strTipoAccion;
		$this->tiposReportes=$parametro_facturacion_control_session->tiposReportes;
		$this->tiposReporte=$parametro_facturacion_control_session->tiposReporte;
		$this->tiposAcciones=$parametro_facturacion_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$parametro_facturacion_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$parametro_facturacion_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$parametro_facturacion_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$parametro_facturacion_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$parametro_facturacion_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$parametro_facturacion_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$parametro_facturacion_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$parametro_facturacion_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$parametro_facturacion_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$parametro_facturacion_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$parametro_facturacion_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$parametro_facturacion_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$parametro_facturacion_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$parametro_facturacion_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$parametro_facturacion_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$parametro_facturacion_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$parametro_facturacion_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$parametro_facturacion_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$parametro_facturacion_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$parametro_facturacion_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$parametro_facturacion_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$parametro_facturacion_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$parametro_facturacion_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$parametro_facturacion_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$parametro_facturacion_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$parametro_facturacion_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$parametro_facturacion_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$parametro_facturacion_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$parametro_facturacion_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$parametro_facturacion_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$parametro_facturacion_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$parametro_facturacion_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$parametro_facturacion_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$parametro_facturacion_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$parametro_facturacion_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$parametro_facturacion_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$parametro_facturacion_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$parametro_facturacion_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$parametro_facturacion_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$parametro_facturacion_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$parametro_facturacion_control_session->resumenUsuarioActual;	
		$this->moduloActual=$parametro_facturacion_control_session->moduloActual;	
		$this->opcionActual=$parametro_facturacion_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$parametro_facturacion_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$parametro_facturacion_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$parametro_facturacion_session=unserialize($this->Session->read(parametro_facturacion_util::$STR_SESSION_NAME));
				
		if($parametro_facturacion_session==null) {
			$parametro_facturacion_session=new parametro_facturacion_session();
		}
		
		$this->strStyleDivArbol=$parametro_facturacion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_facturacion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_facturacion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_facturacion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_facturacion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_facturacion_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$parametro_facturacion_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$parametro_facturacion_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$parametro_facturacion_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$parametro_facturacion_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$parametro_facturacion_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$parametro_facturacion_control_session->strMensajeid_empresa;
		$this->strMensajenombre_factura=$parametro_facturacion_control_session->strMensajenombre_factura;
		$this->strMensajenumero_factura=$parametro_facturacion_control_session->strMensajenumero_factura;
		$this->strMensajeincremento_factura=$parametro_facturacion_control_session->strMensajeincremento_factura;
		$this->strMensajesolo_costo_producto=$parametro_facturacion_control_session->strMensajesolo_costo_producto;
		$this->strMensajenumero_factura_lote=$parametro_facturacion_control_session->strMensajenumero_factura_lote;
		$this->strMensajeincremento_factura_lote=$parametro_facturacion_control_session->strMensajeincremento_factura_lote;
		$this->strMensajenumero_devolucion=$parametro_facturacion_control_session->strMensajenumero_devolucion;
		$this->strMensajeincremento_devolucion=$parametro_facturacion_control_session->strMensajeincremento_devolucion;
		$this->strMensajeid_termino_pago_cliente=$parametro_facturacion_control_session->strMensajeid_termino_pago_cliente;
		$this->strMensajenombre_estimado=$parametro_facturacion_control_session->strMensajenombre_estimado;
		$this->strMensajenumero_estimado=$parametro_facturacion_control_session->strMensajenumero_estimado;
		$this->strMensajeincremento_estimado=$parametro_facturacion_control_session->strMensajeincremento_estimado;
		$this->strMensajesolo_costo_producto_estimado=$parametro_facturacion_control_session->strMensajesolo_costo_producto_estimado;
		$this->strMensajenombre_consignacion=$parametro_facturacion_control_session->strMensajenombre_consignacion;
		$this->strMensajenumero_consignacion=$parametro_facturacion_control_session->strMensajenumero_consignacion;
		$this->strMensajeincremento_consignacion=$parametro_facturacion_control_session->strMensajeincremento_consignacion;
		$this->strMensajesolo_costo_producto_consignacion=$parametro_facturacion_control_session->strMensajesolo_costo_producto_consignacion;
		$this->strMensajecon_recibo=$parametro_facturacion_control_session->strMensajecon_recibo;
		$this->strMensajenombre_recibo=$parametro_facturacion_control_session->strMensajenombre_recibo;
		$this->strMensajenumero_recibo=$parametro_facturacion_control_session->strMensajenumero_recibo;
		$this->strMensajeincremento_recibo=$parametro_facturacion_control_session->strMensajeincremento_recibo;
		$this->strMensajecon_impuesto_recibo=$parametro_facturacion_control_session->strMensajecon_impuesto_recibo;
			
		
		$this->empresasFK=$parametro_facturacion_control_session->empresasFK;
		$this->idempresaDefaultFK=$parametro_facturacion_control_session->idempresaDefaultFK;
		$this->termino_pago_clientesFK=$parametro_facturacion_control_session->termino_pago_clientesFK;
		$this->idtermino_pago_clienteDefaultFK=$parametro_facturacion_control_session->idtermino_pago_clienteDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$parametro_facturacion_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idtermino_pago=$parametro_facturacion_control_session->strVisibleFK_Idtermino_pago;
		
		
		
		
		$this->id_empresaFK_Idempresa=$parametro_facturacion_control_session->id_empresaFK_Idempresa;
		$this->id_termino_pago_clienteFK_Idtermino_pago=$parametro_facturacion_control_session->id_termino_pago_clienteFK_Idtermino_pago;

		
		
		
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
	
	public function getparametro_facturacionControllerAdditional() {
		return $this->parametro_facturacionControllerAdditional;
	}

	public function setparametro_facturacionControllerAdditional($parametro_facturacionControllerAdditional) {
		$this->parametro_facturacionControllerAdditional = $parametro_facturacionControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getparametro_facturacionActual() : parametro_facturacion {
		return $this->parametro_facturacionActual;
	}

	public function setparametro_facturacionActual(parametro_facturacion $parametro_facturacionActual) {
		$this->parametro_facturacionActual = $parametro_facturacionActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidparametro_facturacion() : int {
		return $this->idparametro_facturacion;
	}

	public function setidparametro_facturacion(int $idparametro_facturacion) {
		$this->idparametro_facturacion = $idparametro_facturacion;
	}
	
	public function getparametro_facturacion() : parametro_facturacion {
		return $this->parametro_facturacion;
	}

	public function setparametro_facturacion(parametro_facturacion $parametro_facturacion) {
		$this->parametro_facturacion = $parametro_facturacion;
	}
		
	public function getparametro_facturacionLogic() : parametro_facturacion_logic {		
		return $this->parametro_facturacionLogic;
	}

	public function setparametro_facturacionLogic(parametro_facturacion_logic $parametro_facturacionLogic) {
		$this->parametro_facturacionLogic = $parametro_facturacionLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getparametro_facturacionsModel() {		
		try {						
			/*parametro_facturacionsModel.setWrappedData(parametro_facturacionLogic->getparametro_facturacions());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->parametro_facturacionsModel;
	}
	
	public function setparametro_facturacionsModel($parametro_facturacionsModel) {
		$this->parametro_facturacionsModel = $parametro_facturacionsModel;
	}
	
	public function getparametro_facturacions() : array {		
		return $this->parametro_facturacions;
	}
	
	public function setparametro_facturacions(array $parametro_facturacions) {
		$this->parametro_facturacions= $parametro_facturacions;
	}
	
	public function getparametro_facturacionsEliminados() : array {		
		return $this->parametro_facturacionsEliminados;
	}
	
	public function setparametro_facturacionsEliminados(array $parametro_facturacionsEliminados) {
		$this->parametro_facturacionsEliminados= $parametro_facturacionsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getparametro_facturacionActualFromListDataModel() {
		try {
			/*$parametro_facturacionClase= $this->parametro_facturacionsModel->getRowData();*/
			
			/*return $parametro_facturacion;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
