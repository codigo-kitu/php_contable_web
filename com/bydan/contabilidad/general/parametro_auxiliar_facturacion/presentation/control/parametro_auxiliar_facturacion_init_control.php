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

namespace com\bydan\contabilidad\general\parametro_auxiliar_facturacion\presentation\control;

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

use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\business\entity\parametro_auxiliar_facturacion;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/parametro_auxiliar_facturacion/util/parametro_auxiliar_facturacion_carga.php');
use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\util\parametro_auxiliar_facturacion_carga;

use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\util\parametro_auxiliar_facturacion_util;
use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\util\parametro_auxiliar_facturacion_param_return;
use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\business\logic\parametro_auxiliar_facturacion_logic;
use com\bydan\contabilidad\general\parametro_auxiliar_facturacion\presentation\session\parametro_auxiliar_facturacion_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_auxiliar_facturacion_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_auxiliar_facturacion_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_auxiliar_facturacion_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_auxiliar_facturacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_auxiliar_facturacion_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class parametro_auxiliar_facturacion_init_control extends ControllerBase {	
	
	public $parametro_auxiliar_facturacionClase=null;	
	public $parametro_auxiliar_facturacionsModel=null;	
	public $parametro_auxiliar_facturacionsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idparametro_auxiliar_facturacion=0;	
	public ?int $idparametro_auxiliar_facturacionActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $parametro_auxiliar_facturacionLogic=null;
	
	public $parametro_auxiliar_facturacionActual=null;	
	
	public $parametro_auxiliar_facturacion=null;
	public $parametro_auxiliar_facturacions=null;
	public $parametro_auxiliar_facturacionsEliminados=array();
	public $parametro_auxiliar_facturacionsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $parametro_auxiliar_facturacionsLocal=array();
	public ?array $parametro_auxiliar_facturacionsReporte=null;
	public ?array $parametro_auxiliar_facturacionsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadparametro_auxiliar_facturacion='onload';
	public string $strTipoPaginaAuxiliarparametro_auxiliar_facturacion='none';
	public string $strTipoUsuarioAuxiliarparametro_auxiliar_facturacion='none';
		
	public $parametro_auxiliar_facturacionReturnGeneral=null;
	public $parametro_auxiliar_facturacionParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $parametro_auxiliar_facturacionModel=null;
	public $parametro_auxiliar_facturacionControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajenombre_tipo_factura='';
	public string $strMensajesiguiente_numero_correlativo='';
	public string $strMensajeincremento='';
	public string $strMensajecon_creacion_rapida_producto='';
	public string $strMensajecon_busqueda_producto_fabricante='';
	public string $strMensajecon_solo_costo_producto='';
	public string $strMensajecon_recibo='';
	public string $strMensajenombre_tipo_factura_recibo='';
	public string $strMensajesiguiente_numero_correlativo_recibo='';
	public string $strMensajeincremento_recibo='';
	public string $strMensajecon_impuesto_final_boleta='';
	public string $strMensajecon_ticket='';
	public string $strMensajenombre_tipo_factura_ticket='';
	public string $strMensajesiguiente_numero_correlativo_ticket='';
	public string $strMensajeincremento_ticket='';
	public string $strMensajecon_impuesto_final_ticket='';
	
	
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

	
	
	
	
	
	
	
	
	public  $id_empresaFK_Idempresa=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->parametro_auxiliar_facturacionLogic==null) {
				$this->parametro_auxiliar_facturacionLogic=new parametro_auxiliar_facturacion_logic();
			}
			
		} else {
			if($this->parametro_auxiliar_facturacionLogic==null) {
				$this->parametro_auxiliar_facturacionLogic=new parametro_auxiliar_facturacion_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->parametro_auxiliar_facturacionClase==null) {
				$this->parametro_auxiliar_facturacionClase=new parametro_auxiliar_facturacion();
			}
			
			$this->parametro_auxiliar_facturacionClase->setId(0);	
				
				
			$this->parametro_auxiliar_facturacionClase->setid_empresa(-1);	
			$this->parametro_auxiliar_facturacionClase->setnombre_tipo_factura('');	
			$this->parametro_auxiliar_facturacionClase->setsiguiente_numero_correlativo(0);	
			$this->parametro_auxiliar_facturacionClase->setincremento(0);	
			$this->parametro_auxiliar_facturacionClase->setcon_creacion_rapida_producto(false);	
			$this->parametro_auxiliar_facturacionClase->setcon_busqueda_producto_fabricante(false);	
			$this->parametro_auxiliar_facturacionClase->setcon_solo_costo_producto(false);	
			$this->parametro_auxiliar_facturacionClase->setcon_recibo(false);	
			$this->parametro_auxiliar_facturacionClase->setnombre_tipo_factura_recibo('');	
			$this->parametro_auxiliar_facturacionClase->setsiguiente_numero_correlativo_recibo(0);	
			$this->parametro_auxiliar_facturacionClase->setincremento_recibo(0);	
			$this->parametro_auxiliar_facturacionClase->setcon_impuesto_final_boleta(false);	
			$this->parametro_auxiliar_facturacionClase->setcon_ticket(false);	
			$this->parametro_auxiliar_facturacionClase->setnombre_tipo_factura_ticket('');	
			$this->parametro_auxiliar_facturacionClase->setsiguiente_numero_correlativo_ticket(0);	
			$this->parametro_auxiliar_facturacionClase->setincremento_ticket(0);	
			$this->parametro_auxiliar_facturacionClase->setcon_impuesto_final_ticket(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('parametro_auxiliar_facturacion');
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
		$this->cargarParametrosReporteBase('parametro_auxiliar_facturacion');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('parametro_auxiliar_facturacion');
	}
	
	public function actualizarControllerConReturnGeneral(parametro_auxiliar_facturacion_param_return $parametro_auxiliar_facturacionReturnGeneral) {
		if($parametro_auxiliar_facturacionReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesparametro_auxiliar_facturacionsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$parametro_auxiliar_facturacionReturnGeneral->getsMensajeProceso();
		}
		
		if($parametro_auxiliar_facturacionReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$parametro_auxiliar_facturacionReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($parametro_auxiliar_facturacionReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$parametro_auxiliar_facturacionReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$parametro_auxiliar_facturacionReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($parametro_auxiliar_facturacionReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($parametro_auxiliar_facturacionReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$parametro_auxiliar_facturacionReturnGeneral->getsFuncionJs();
		}
		
		if($parametro_auxiliar_facturacionReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(parametro_auxiliar_facturacion_session $parametro_auxiliar_facturacion_session){
		$this->strStyleDivArbol=$parametro_auxiliar_facturacion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_auxiliar_facturacion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_auxiliar_facturacion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_auxiliar_facturacion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_auxiliar_facturacion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_auxiliar_facturacion_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$parametro_auxiliar_facturacion_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(parametro_auxiliar_facturacion_session $parametro_auxiliar_facturacion_session){
		$parametro_auxiliar_facturacion_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$parametro_auxiliar_facturacion_session->strStyleDivHeader='display:none';			
		$parametro_auxiliar_facturacion_session->strStyleDivContent='width:93%;height:100%';	
		$parametro_auxiliar_facturacion_session->strStyleDivOpcionesBanner='display:none';	
		$parametro_auxiliar_facturacion_session->strStyleDivExpandirColapsar='display:none';	
		$parametro_auxiliar_facturacion_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(parametro_auxiliar_facturacion_control $parametro_auxiliar_facturacion_control_session){
		$this->idNuevo=$parametro_auxiliar_facturacion_control_session->idNuevo;
		$this->parametro_auxiliar_facturacionActual=$parametro_auxiliar_facturacion_control_session->parametro_auxiliar_facturacionActual;
		$this->parametro_auxiliar_facturacion=$parametro_auxiliar_facturacion_control_session->parametro_auxiliar_facturacion;
		$this->parametro_auxiliar_facturacionClase=$parametro_auxiliar_facturacion_control_session->parametro_auxiliar_facturacionClase;
		$this->parametro_auxiliar_facturacions=$parametro_auxiliar_facturacion_control_session->parametro_auxiliar_facturacions;
		$this->parametro_auxiliar_facturacionsEliminados=$parametro_auxiliar_facturacion_control_session->parametro_auxiliar_facturacionsEliminados;
		$this->parametro_auxiliar_facturacion=$parametro_auxiliar_facturacion_control_session->parametro_auxiliar_facturacion;
		$this->parametro_auxiliar_facturacionsReporte=$parametro_auxiliar_facturacion_control_session->parametro_auxiliar_facturacionsReporte;
		$this->parametro_auxiliar_facturacionsSeleccionados=$parametro_auxiliar_facturacion_control_session->parametro_auxiliar_facturacionsSeleccionados;
		$this->arrOrderBy=$parametro_auxiliar_facturacion_control_session->arrOrderBy;
		$this->arrOrderByRel=$parametro_auxiliar_facturacion_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$parametro_auxiliar_facturacion_control_session->arrHistoryWebs;
		$this->arrSessionBases=$parametro_auxiliar_facturacion_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadparametro_auxiliar_facturacion=$parametro_auxiliar_facturacion_control_session->strTypeOnLoadparametro_auxiliar_facturacion;
		$this->strTipoPaginaAuxiliarparametro_auxiliar_facturacion=$parametro_auxiliar_facturacion_control_session->strTipoPaginaAuxiliarparametro_auxiliar_facturacion;
		$this->strTipoUsuarioAuxiliarparametro_auxiliar_facturacion=$parametro_auxiliar_facturacion_control_session->strTipoUsuarioAuxiliarparametro_auxiliar_facturacion;	
		
		$this->bitEsPopup=$parametro_auxiliar_facturacion_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$parametro_auxiliar_facturacion_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$parametro_auxiliar_facturacion_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$parametro_auxiliar_facturacion_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$parametro_auxiliar_facturacion_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$parametro_auxiliar_facturacion_control_session->strSufijo;
		$this->bitEsRelaciones=$parametro_auxiliar_facturacion_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$parametro_auxiliar_facturacion_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$parametro_auxiliar_facturacion_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$parametro_auxiliar_facturacion_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$parametro_auxiliar_facturacion_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$parametro_auxiliar_facturacion_control_session->strTituloTabla;
		$this->strTituloPathPagina=$parametro_auxiliar_facturacion_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$parametro_auxiliar_facturacion_control_session->strTituloPathElementoActual;
		
		if($this->parametro_auxiliar_facturacionLogic==null) {			
			$this->parametro_auxiliar_facturacionLogic=new parametro_auxiliar_facturacion_logic();
		}
		
		
		if($this->parametro_auxiliar_facturacionClase==null) {
			$this->parametro_auxiliar_facturacionClase=new parametro_auxiliar_facturacion();	
		}
		
		$this->parametro_auxiliar_facturacionLogic->setparametro_auxiliar_facturacion($this->parametro_auxiliar_facturacionClase);
		
		
		if($this->parametro_auxiliar_facturacions==null) {
			$this->parametro_auxiliar_facturacions=array();	
		}
		
		$this->parametro_auxiliar_facturacionLogic->setparametro_auxiliar_facturacions($this->parametro_auxiliar_facturacions);
		
		
		$this->strTipoView=$parametro_auxiliar_facturacion_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$parametro_auxiliar_facturacion_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$parametro_auxiliar_facturacion_control_session->datosCliente;
		$this->strAccionBusqueda=$parametro_auxiliar_facturacion_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$parametro_auxiliar_facturacion_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$parametro_auxiliar_facturacion_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$parametro_auxiliar_facturacion_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$parametro_auxiliar_facturacion_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$parametro_auxiliar_facturacion_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$parametro_auxiliar_facturacion_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$parametro_auxiliar_facturacion_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$parametro_auxiliar_facturacion_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$parametro_auxiliar_facturacion_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$parametro_auxiliar_facturacion_control_session->strTipoPaginacion;
		$this->strTipoAccion=$parametro_auxiliar_facturacion_control_session->strTipoAccion;
		$this->tiposReportes=$parametro_auxiliar_facturacion_control_session->tiposReportes;
		$this->tiposReporte=$parametro_auxiliar_facturacion_control_session->tiposReporte;
		$this->tiposAcciones=$parametro_auxiliar_facturacion_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$parametro_auxiliar_facturacion_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$parametro_auxiliar_facturacion_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$parametro_auxiliar_facturacion_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$parametro_auxiliar_facturacion_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$parametro_auxiliar_facturacion_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$parametro_auxiliar_facturacion_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$parametro_auxiliar_facturacion_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$parametro_auxiliar_facturacion_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$parametro_auxiliar_facturacion_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$parametro_auxiliar_facturacion_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$parametro_auxiliar_facturacion_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$parametro_auxiliar_facturacion_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$parametro_auxiliar_facturacion_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$parametro_auxiliar_facturacion_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$parametro_auxiliar_facturacion_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$parametro_auxiliar_facturacion_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$parametro_auxiliar_facturacion_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$parametro_auxiliar_facturacion_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$parametro_auxiliar_facturacion_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$parametro_auxiliar_facturacion_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$parametro_auxiliar_facturacion_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$parametro_auxiliar_facturacion_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$parametro_auxiliar_facturacion_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$parametro_auxiliar_facturacion_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$parametro_auxiliar_facturacion_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$parametro_auxiliar_facturacion_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$parametro_auxiliar_facturacion_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$parametro_auxiliar_facturacion_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$parametro_auxiliar_facturacion_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$parametro_auxiliar_facturacion_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$parametro_auxiliar_facturacion_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$parametro_auxiliar_facturacion_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$parametro_auxiliar_facturacion_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$parametro_auxiliar_facturacion_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$parametro_auxiliar_facturacion_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$parametro_auxiliar_facturacion_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$parametro_auxiliar_facturacion_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$parametro_auxiliar_facturacion_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$parametro_auxiliar_facturacion_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$parametro_auxiliar_facturacion_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$parametro_auxiliar_facturacion_control_session->resumenUsuarioActual;	
		$this->moduloActual=$parametro_auxiliar_facturacion_control_session->moduloActual;	
		$this->opcionActual=$parametro_auxiliar_facturacion_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$parametro_auxiliar_facturacion_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$parametro_auxiliar_facturacion_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$parametro_auxiliar_facturacion_session=unserialize($this->Session->read(parametro_auxiliar_facturacion_util::$STR_SESSION_NAME));
				
		if($parametro_auxiliar_facturacion_session==null) {
			$parametro_auxiliar_facturacion_session=new parametro_auxiliar_facturacion_session();
		}
		
		$this->strStyleDivArbol=$parametro_auxiliar_facturacion_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_auxiliar_facturacion_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_auxiliar_facturacion_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_auxiliar_facturacion_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_auxiliar_facturacion_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_auxiliar_facturacion_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$parametro_auxiliar_facturacion_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$parametro_auxiliar_facturacion_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$parametro_auxiliar_facturacion_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$parametro_auxiliar_facturacion_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$parametro_auxiliar_facturacion_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$parametro_auxiliar_facturacion_control_session->strMensajeid_empresa;
		$this->strMensajenombre_tipo_factura=$parametro_auxiliar_facturacion_control_session->strMensajenombre_tipo_factura;
		$this->strMensajesiguiente_numero_correlativo=$parametro_auxiliar_facturacion_control_session->strMensajesiguiente_numero_correlativo;
		$this->strMensajeincremento=$parametro_auxiliar_facturacion_control_session->strMensajeincremento;
		$this->strMensajecon_creacion_rapida_producto=$parametro_auxiliar_facturacion_control_session->strMensajecon_creacion_rapida_producto;
		$this->strMensajecon_busqueda_producto_fabricante=$parametro_auxiliar_facturacion_control_session->strMensajecon_busqueda_producto_fabricante;
		$this->strMensajecon_solo_costo_producto=$parametro_auxiliar_facturacion_control_session->strMensajecon_solo_costo_producto;
		$this->strMensajecon_recibo=$parametro_auxiliar_facturacion_control_session->strMensajecon_recibo;
		$this->strMensajenombre_tipo_factura_recibo=$parametro_auxiliar_facturacion_control_session->strMensajenombre_tipo_factura_recibo;
		$this->strMensajesiguiente_numero_correlativo_recibo=$parametro_auxiliar_facturacion_control_session->strMensajesiguiente_numero_correlativo_recibo;
		$this->strMensajeincremento_recibo=$parametro_auxiliar_facturacion_control_session->strMensajeincremento_recibo;
		$this->strMensajecon_impuesto_final_boleta=$parametro_auxiliar_facturacion_control_session->strMensajecon_impuesto_final_boleta;
		$this->strMensajecon_ticket=$parametro_auxiliar_facturacion_control_session->strMensajecon_ticket;
		$this->strMensajenombre_tipo_factura_ticket=$parametro_auxiliar_facturacion_control_session->strMensajenombre_tipo_factura_ticket;
		$this->strMensajesiguiente_numero_correlativo_ticket=$parametro_auxiliar_facturacion_control_session->strMensajesiguiente_numero_correlativo_ticket;
		$this->strMensajeincremento_ticket=$parametro_auxiliar_facturacion_control_session->strMensajeincremento_ticket;
		$this->strMensajecon_impuesto_final_ticket=$parametro_auxiliar_facturacion_control_session->strMensajecon_impuesto_final_ticket;
			
		
		$this->empresasFK=$parametro_auxiliar_facturacion_control_session->empresasFK;
		$this->idempresaDefaultFK=$parametro_auxiliar_facturacion_control_session->idempresaDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$parametro_auxiliar_facturacion_control_session->strVisibleFK_Idempresa;
		
		
		
		
		$this->id_empresaFK_Idempresa=$parametro_auxiliar_facturacion_control_session->id_empresaFK_Idempresa;

		
		
		
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
	
	public function getparametro_auxiliar_facturacionControllerAdditional() {
		return $this->parametro_auxiliar_facturacionControllerAdditional;
	}

	public function setparametro_auxiliar_facturacionControllerAdditional($parametro_auxiliar_facturacionControllerAdditional) {
		$this->parametro_auxiliar_facturacionControllerAdditional = $parametro_auxiliar_facturacionControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getparametro_auxiliar_facturacionActual() : parametro_auxiliar_facturacion {
		return $this->parametro_auxiliar_facturacionActual;
	}

	public function setparametro_auxiliar_facturacionActual(parametro_auxiliar_facturacion $parametro_auxiliar_facturacionActual) {
		$this->parametro_auxiliar_facturacionActual = $parametro_auxiliar_facturacionActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidparametro_auxiliar_facturacion() : int {
		return $this->idparametro_auxiliar_facturacion;
	}

	public function setidparametro_auxiliar_facturacion(int $idparametro_auxiliar_facturacion) {
		$this->idparametro_auxiliar_facturacion = $idparametro_auxiliar_facturacion;
	}
	
	public function getparametro_auxiliar_facturacion() : parametro_auxiliar_facturacion {
		return $this->parametro_auxiliar_facturacion;
	}

	public function setparametro_auxiliar_facturacion(parametro_auxiliar_facturacion $parametro_auxiliar_facturacion) {
		$this->parametro_auxiliar_facturacion = $parametro_auxiliar_facturacion;
	}
		
	public function getparametro_auxiliar_facturacionLogic() : parametro_auxiliar_facturacion_logic {		
		return $this->parametro_auxiliar_facturacionLogic;
	}

	public function setparametro_auxiliar_facturacionLogic(parametro_auxiliar_facturacion_logic $parametro_auxiliar_facturacionLogic) {
		$this->parametro_auxiliar_facturacionLogic = $parametro_auxiliar_facturacionLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getparametro_auxiliar_facturacionsModel() {		
		try {						
			/*parametro_auxiliar_facturacionsModel.setWrappedData(parametro_auxiliar_facturacionLogic->getparametro_auxiliar_facturacions());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->parametro_auxiliar_facturacionsModel;
	}
	
	public function setparametro_auxiliar_facturacionsModel($parametro_auxiliar_facturacionsModel) {
		$this->parametro_auxiliar_facturacionsModel = $parametro_auxiliar_facturacionsModel;
	}
	
	public function getparametro_auxiliar_facturacions() : array {		
		return $this->parametro_auxiliar_facturacions;
	}
	
	public function setparametro_auxiliar_facturacions(array $parametro_auxiliar_facturacions) {
		$this->parametro_auxiliar_facturacions= $parametro_auxiliar_facturacions;
	}
	
	public function getparametro_auxiliar_facturacionsEliminados() : array {		
		return $this->parametro_auxiliar_facturacionsEliminados;
	}
	
	public function setparametro_auxiliar_facturacionsEliminados(array $parametro_auxiliar_facturacionsEliminados) {
		$this->parametro_auxiliar_facturacionsEliminados= $parametro_auxiliar_facturacionsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getparametro_auxiliar_facturacionActualFromListDataModel() {
		try {
			/*$parametro_auxiliar_facturacionClase= $this->parametro_auxiliar_facturacionsModel->getRowData();*/
			
			/*return $parametro_auxiliar_facturacion;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
