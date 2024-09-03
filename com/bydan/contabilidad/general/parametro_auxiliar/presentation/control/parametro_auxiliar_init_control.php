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

namespace com\bydan\contabilidad\general\parametro_auxiliar\presentation\control;

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

use com\bydan\contabilidad\general\parametro_auxiliar\business\entity\parametro_auxiliar;

include_once(Constantes::$PATH_REL.'com/bydan/contabilidad/general/parametro_auxiliar/util/parametro_auxiliar_carga.php');
use com\bydan\contabilidad\general\parametro_auxiliar\util\parametro_auxiliar_carga;

use com\bydan\contabilidad\general\parametro_auxiliar\util\parametro_auxiliar_util;
use com\bydan\contabilidad\general\parametro_auxiliar\util\parametro_auxiliar_param_return;
use com\bydan\contabilidad\general\parametro_auxiliar\business\logic\parametro_auxiliar_logic;
use com\bydan\contabilidad\general\parametro_auxiliar\presentation\session\parametro_auxiliar_session;


//FK


use com\bydan\contabilidad\general\empresa\business\entity\empresa;
use com\bydan\contabilidad\general\empresa\business\logic\empresa_logic;
use com\bydan\contabilidad\general\empresa\util\empresa_carga;
use com\bydan\contabilidad\general\empresa\util\empresa_util;

use com\bydan\contabilidad\general\tipo_costeo_kardex\business\entity\tipo_costeo_kardex;
use com\bydan\contabilidad\general\tipo_costeo_kardex\business\logic\tipo_costeo_kardex_logic;
use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_carga;
use com\bydan\contabilidad\general\tipo_costeo_kardex\util\tipo_costeo_kardex_util;

//REL



/*CARGA ARCHIVOS FRAMEWORK*/
parametro_auxiliar_carga::cargarArchivosFrameworkBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS PAQUETES DE CLASE ACTUAL*/
parametro_auxiliar_carga::cargarArchivosPaquetesBase(PaqueteTipo::$CONTROLLER);
	
/*CARGA ARCHIVOS FK (CARGAR COMBOS)*/
parametro_auxiliar_carga::cargarArchivosPaquetesForeignKeys(PaqueteTipo::$LOGIC);
	
/*CARGA ARCHIVOS RELACIONES
SOLO ENTITIES -> SE DEBE CARGAR DEACUERDO SE UTILIZE*/	
parametro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$ENTITIES.PaqueteTipo::$DATA_ACCESS);
	
/*parametro_auxiliar_carga::cargarArchivosPaquetesRelaciones(PaqueteTipo::$LOGIC);	*/
	


class parametro_auxiliar_init_control extends ControllerBase {	
	
	public $parametro_auxiliarClase=null;	
	public $parametro_auxiliarsModel=null;	
	public $parametro_auxiliarsListDataModel=null;
	
	public ?int $idActual=0;	
	public ?int $idNuevo=0;
	public ?int $idparametro_auxiliar=0;	
	public ?int $idparametro_auxiliarActual=0;
		
	
	public $sistemaLogicAdditional=null;
	
	public $resumenUsuarioLogicAdditional=null;
	
	public $parametro_auxiliarLogic=null;
	
	public $parametro_auxiliarActual=null;	
	
	public $parametro_auxiliar=null;
	public $parametro_auxiliars=null;
	public $parametro_auxiliarsEliminados=array();
	public $parametro_auxiliarsAuxiliar=array();
	
	//PARA JS TEMPLATING
	public array $parametro_auxiliarsLocal=array();
	public ?array $parametro_auxiliarsReporte=null;
	public ?array $parametro_auxiliarsSeleccionados=null;
	public ?ConexionController $conexion_control=null;
	
	
	//NOMBRES COINCIDEN CON JS-CONSTANTES
	public string $strTypeOnLoadparametro_auxiliar='onload';
	public string $strTipoPaginaAuxiliarparametro_auxiliar='none';
	public string $strTipoUsuarioAuxiliarparametro_auxiliar='none';
		
	public $parametro_auxiliarReturnGeneral=null;
	public $parametro_auxiliarParameterGeneral=null;	
	public $sistemaReturnGeneral=null;
	
	public $parametro_auxiliarModel=null;
	public $parametro_auxiliarControllerAdditional=null;
	
	
	 	
	
	public string $strMensajeid_empresa='';
	public string $strMensajenombre_asignado='';
	public string $strMensajesiguiente_numero_correlativo='';
	public string $strMensajeincremento='';
	public string $strMensajemostrar_solo_costo_producto='';
	public string $strMensajecon_codigo_secuencial_producto='';
	public string $strMensajecontador_producto='';
	public string $strMensajeid_tipo_costeo_kardex='';
	public string $strMensajecon_producto_inactivo='';
	public string $strMensajecon_busqueda_incremental='';
	public string $strMensajepermitir_revisar_asiento='';
	public string $strMensajenumero_decimales_unidades='';
	public string $strMensajemostrar_documento_anulado='';
	public string $strMensajesiguiente_numero_correlativo_cc='';
	public string $strMensajecon_eliminacion_fisica_asiento='';
	public string $strMensajesiguiente_numero_correlativo_asiento='';
	public string $strMensajecon_asiento_simple_factura='';
	public string $strMensajecon_codigo_secuencial_cliente='';
	public string $strMensajecontador_cliente='';
	public string $strMensajecon_cliente_inactivo='';
	public string $strMensajecon_codigo_secuencial_proveedor='';
	public string $strMensajecontador_proveedor='';
	public string $strMensajecon_proveedor_inactivo='';
	public string $strMensajeabreviatura_registro_tributario='';
	public string $strMensajecon_asiento_cheque='';
	
	
	public string $strVisibleFK_Idempresa='display:table-row';
	public string $strVisibleFK_Idtipo_costeo_kardex='display:table-row';

	
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

	public array $tipo_costeo_kardexsFK=array();

	public function gettipo_costeo_kardexsFK():array {
		return $this->tipo_costeo_kardexsFK;
	}

	public function settipo_costeo_kardexsFK(array $tipo_costeo_kardexsFK) {
		$this->tipo_costeo_kardexsFK = $tipo_costeo_kardexsFK;
	}

	public int $idtipo_costeo_kardexDefaultFK=-1;

	public function getIdtipo_costeo_kardexDefaultFK():int {
		return $this->idtipo_costeo_kardexDefaultFK;
	}

	public function setIdtipo_costeo_kardexDefaultFK(int $idtipo_costeo_kardexDefaultFK) {
		$this->idtipo_costeo_kardexDefaultFK = $idtipo_costeo_kardexDefaultFK;
	}

	
	
	
	
	
	
	
	
	public  $id_empresaFK_Idempresa=null;

	public  $id_tipo_costeo_kardexFK_Idtipo_costeo_kardex=null;


	
	
		
	function __construct () {		
		parent::__construct();		
	}	
	
	public function inicializarVariables(string $strType) {		
		if($strType=='NORMAL') {
			if($this->parametro_auxiliarLogic==null) {
				$this->parametro_auxiliarLogic=new parametro_auxiliar_logic();
			}
			
		} else {
			if($this->parametro_auxiliarLogic==null) {
				$this->parametro_auxiliarLogic=new parametro_auxiliar_logic();
			}
		}
	}
	
	public function inicializar() {
		try {
			if($this->parametro_auxiliarClase==null) {
				$this->parametro_auxiliarClase=new parametro_auxiliar();
			}
			
			$this->parametro_auxiliarClase->setId(0);	
				
				
			$this->parametro_auxiliarClase->setid_empresa(-1);	
			$this->parametro_auxiliarClase->setnombre_asignado('');	
			$this->parametro_auxiliarClase->setsiguiente_numero_correlativo(0);	
			$this->parametro_auxiliarClase->setincremento(0);	
			$this->parametro_auxiliarClase->setmostrar_solo_costo_producto(false);	
			$this->parametro_auxiliarClase->setcon_codigo_secuencial_producto(false);	
			$this->parametro_auxiliarClase->setcontador_producto(0);	
			$this->parametro_auxiliarClase->setid_tipo_costeo_kardex(-1);	
			$this->parametro_auxiliarClase->setcon_producto_inactivo(false);	
			$this->parametro_auxiliarClase->setcon_busqueda_incremental(false);	
			$this->parametro_auxiliarClase->setpermitir_revisar_asiento(false);	
			$this->parametro_auxiliarClase->setnumero_decimales_unidades(0);	
			$this->parametro_auxiliarClase->setmostrar_documento_anulado(false);	
			$this->parametro_auxiliarClase->setsiguiente_numero_correlativo_cc(0);	
			$this->parametro_auxiliarClase->setcon_eliminacion_fisica_asiento(false);	
			$this->parametro_auxiliarClase->setsiguiente_numero_correlativo_asiento(0);	
			$this->parametro_auxiliarClase->setcon_asiento_simple_factura(false);	
			$this->parametro_auxiliarClase->setcon_codigo_secuencial_cliente(false);	
			$this->parametro_auxiliarClase->setcontador_cliente(0);	
			$this->parametro_auxiliarClase->setcon_cliente_inactivo(false);	
			$this->parametro_auxiliarClase->setcon_codigo_secuencial_proveedor(false);	
			$this->parametro_auxiliarClase->setcontador_proveedor(0);	
			$this->parametro_auxiliarClase->setcon_proveedor_inactivo(false);	
			$this->parametro_auxiliarClase->setabreviatura_registro_tributario('');	
			$this->parametro_auxiliarClase->setcon_asiento_cheque(false);	
			
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
		$this->prepararEjecutarMantenimientoBase('parametro_auxiliar');
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
		$this->cargarParametrosReporteBase('parametro_auxiliar');
	}
	
	public function cargarParamsPostAccion() {		
		$this->cargarParamsPostAccionBase();
	}
	
	public function cargarParamsPaginar() {
		$this->cargarParamsPaginarBase('parametro_auxiliar');
	}
	
	public function actualizarControllerConReturnGeneral(parametro_auxiliar_param_return $parametro_auxiliarReturnGeneral) {
		if($parametro_auxiliarReturnGeneral->getConMostrarMensaje()) {
			/*$this->bitDivEsCargarMensajesparametro_auxiliarsAjaxWebPart=true;*/
			$this->strAuxiliarMensajeAlert=$parametro_auxiliarReturnGeneral->getsMensajeProceso();
		}
		
		if($parametro_auxiliarReturnGeneral->getConAbrirVentana()) {
			$this->paramDivSeccion->bitDivsEsCargarReporteAuxiliarAjaxWebPart=true;
			$this->htmlTablaReporteAuxiliars=$parametro_auxiliarReturnGeneral->getHtmlTablaReporteAuxiliar();
		}
		
		if($parametro_auxiliarReturnGeneral->getConAbrirVentanaAuxiliar()) {
			$this->bitEsAbrirVentanaAuxiliarUrl=true;
			$this->strAuxiliarUrlPagina=$parametro_auxiliarReturnGeneral->getsAuxiliarUrlPagina();
			$this->strAuxiliarTipo=$parametro_auxiliarReturnGeneral->getsAuxiliarTipo();			
		}
		
		if($parametro_auxiliarReturnGeneral->getConRetornoLista()) {
			$this->paramDivSeccion->bitDivEsCargarAjaxWebPart=true;
			$this->htmlTabla='';
			$this->returnHtml(true);
		}
		
		if($parametro_auxiliarReturnGeneral->getConFuncionJs()) {
		    $this->bitEsEjecutarFuncionJavaScript=true;
		    $this->strFuncionJs=$parametro_auxiliarReturnGeneral->getsFuncionJs();
		}
		
		if($parametro_auxiliarReturnGeneral->getConGuardarReturnSessionJs()) {
		    $this->bitEsGuardarReturnSessionJavaScript=true;
		}
	}
	
	public function actualizarDesdeSessionDivStyleVariables(parametro_auxiliar_session $parametro_auxiliar_session){
		$this->strStyleDivArbol=$parametro_auxiliar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_auxiliar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_auxiliar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_auxiliar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_auxiliar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_auxiliar_session->strPermiteRecargarInformacion;
		/*$this->strPermisoReporte=$parametro_auxiliar_session->strPermisoReporte;*/
	}
	
	public function actualizarInvitadoSessionDivStyleVariables(parametro_auxiliar_session $parametro_auxiliar_session){
		$parametro_auxiliar_session->strStyleDivArbol='display:none;width:0px;height:0px;visibility:hidden';	
		$parametro_auxiliar_session->strStyleDivHeader='display:none';			
		$parametro_auxiliar_session->strStyleDivContent='width:93%;height:100%';	
		$parametro_auxiliar_session->strStyleDivOpcionesBanner='display:none';	
		$parametro_auxiliar_session->strStyleDivExpandirColapsar='display:none';	
		$parametro_auxiliar_session->strPermisoReporte='none';	
		$this->strPermisoMostrarTodos='display:none';	
	}
	
	public function actualizarDesdeSession(parametro_auxiliar_control $parametro_auxiliar_control_session){
		$this->idNuevo=$parametro_auxiliar_control_session->idNuevo;
		$this->parametro_auxiliarActual=$parametro_auxiliar_control_session->parametro_auxiliarActual;
		$this->parametro_auxiliar=$parametro_auxiliar_control_session->parametro_auxiliar;
		$this->parametro_auxiliarClase=$parametro_auxiliar_control_session->parametro_auxiliarClase;
		$this->parametro_auxiliars=$parametro_auxiliar_control_session->parametro_auxiliars;
		$this->parametro_auxiliarsEliminados=$parametro_auxiliar_control_session->parametro_auxiliarsEliminados;
		$this->parametro_auxiliar=$parametro_auxiliar_control_session->parametro_auxiliar;
		$this->parametro_auxiliarsReporte=$parametro_auxiliar_control_session->parametro_auxiliarsReporte;
		$this->parametro_auxiliarsSeleccionados=$parametro_auxiliar_control_session->parametro_auxiliarsSeleccionados;
		$this->arrOrderBy=$parametro_auxiliar_control_session->arrOrderBy;
		$this->arrOrderByRel=$parametro_auxiliar_control_session->arrOrderByRel;
		$this->arrHistoryWebs=$parametro_auxiliar_control_session->arrHistoryWebs;
		$this->arrSessionBases=$parametro_auxiliar_control_session->arrSessionBases;		
		
		$this->strTypeOnLoadparametro_auxiliar=$parametro_auxiliar_control_session->strTypeOnLoadparametro_auxiliar;
		$this->strTipoPaginaAuxiliarparametro_auxiliar=$parametro_auxiliar_control_session->strTipoPaginaAuxiliarparametro_auxiliar;
		$this->strTipoUsuarioAuxiliarparametro_auxiliar=$parametro_auxiliar_control_session->strTipoUsuarioAuxiliarparametro_auxiliar;	
		
		$this->bitEsPopup=$parametro_auxiliar_control_session->bitEsPopup;	
		$this->bitEsSubPagina=$parametro_auxiliar_control_session->bitEsSubPagina;
		$this->bitEsBusqueda=$parametro_auxiliar_control_session->bitEsBusqueda;	
		
		/*//SE MANTENDRIA JS EN VARIAS LLAMADAS
		$this->strFuncionJs=$parametro_auxiliar_control_session->strFuncionJs;
		$this->strFuncionJsPadre=$parametro_auxiliar_control_session->strFuncionJsPadre;*/
		
		//Mejor Dinamico desde Url (Para Relacionado se pierde)
		//$this->strSufijo=$parametro_auxiliar_control_session->strSufijo;
		$this->bitEsRelaciones=$parametro_auxiliar_control_session->bitEsRelaciones;	
		$this->bitEsRelacionado=$parametro_auxiliar_control_session->bitEsRelacionado;
		$this->bigIdOpcion=$parametro_auxiliar_control_session->bigIdOpcion;
		$this->bitParaReporteOrderBy=$parametro_auxiliar_control_session->bitParaReporteOrderBy;	
		$this->bitReporteRelacionesGenerado=$parametro_auxiliar_control_session->bitReporteRelacionesGenerado;	
		
		$this->strTituloTabla=$parametro_auxiliar_control_session->strTituloTabla;
		$this->strTituloPathPagina=$parametro_auxiliar_control_session->strTituloPathPagina;
		$this->strTituloPathElementoActual=$parametro_auxiliar_control_session->strTituloPathElementoActual;
		
		if($this->parametro_auxiliarLogic==null) {			
			$this->parametro_auxiliarLogic=new parametro_auxiliar_logic();
		}
		
		
		if($this->parametro_auxiliarClase==null) {
			$this->parametro_auxiliarClase=new parametro_auxiliar();	
		}
		
		$this->parametro_auxiliarLogic->setparametro_auxiliar($this->parametro_auxiliarClase);
		
		
		if($this->parametro_auxiliars==null) {
			$this->parametro_auxiliars=array();	
		}
		
		$this->parametro_auxiliarLogic->setparametro_auxiliars($this->parametro_auxiliars);
		
		
		$this->strTipoView=$parametro_auxiliar_control_session->strTipoView;		
		$this->bigIdUsuarioSesion=$parametro_auxiliar_control_session->bigIdUsuarioSesion;		
		$this->datosCliente=$parametro_auxiliar_control_session->datosCliente;
		$this->strAccionBusqueda=$parametro_auxiliar_control_session->strAccionBusqueda;		
		$this->strNombreOpcionRetorno=$parametro_auxiliar_control_session->strNombreOpcionRetorno;		
		$this->intNumeroPaginacionPagina=$parametro_auxiliar_control_session->intNumeroPaginacionPagina;
		$this->intNumeroPaginacion=$parametro_auxiliar_control_session->intNumeroPaginacion;
		$this->bitConBusquedaRapida=$parametro_auxiliar_control_session->bitConBusquedaRapida;
		$this->strValorBusquedaRapida=$parametro_auxiliar_control_session->strValorBusquedaRapida;
		$this->strFuncionBusquedaRapida=$parametro_auxiliar_control_session->strFuncionBusquedaRapida;

		/*PARAMETROS REPORTE*/
		$this->strGenerarReporte=$parametro_auxiliar_control_session->strGenerarReporte;		
		$this->bitGenerarReporte=$parametro_auxiliar_control_session->bitGenerarReporte;				
		$this->strTipoReporte=$parametro_auxiliar_control_session->strTipoReporte;		
		$this->strTipoPaginacion=$parametro_auxiliar_control_session->strTipoPaginacion;
		$this->strTipoAccion=$parametro_auxiliar_control_session->strTipoAccion;
		$this->tiposReportes=$parametro_auxiliar_control_session->tiposReportes;
		$this->tiposReporte=$parametro_auxiliar_control_session->tiposReporte;
		$this->tiposAcciones=$parametro_auxiliar_control_session->tiposAcciones;
		$this->tiposAccionesFormulario=$parametro_auxiliar_control_session->tiposAccionesFormulario;
		$this->tiposPaginacion=$parametro_auxiliar_control_session->tiposPaginacion;
		$this->tiposColumnasSelect=$parametro_auxiliar_control_session->tiposColumnasSelect;
		$this->tiposRelaciones=$parametro_auxiliar_control_session->tiposRelaciones;		
		$this->tiposRelacionesFormulario=$parametro_auxiliar_control_session->tiposRelacionesFormulario;		
		$this->strTipoReporteDefault=$parametro_auxiliar_control_session->strTipoReporteDefault;		
		$this->bitConAltoMaximoTabla=$parametro_auxiliar_control_session->bitConAltoMaximoTabla;
		$this->bitGenerarTodos=$parametro_auxiliar_control_session->bitGenerarTodos;		
		/*$this->intNumeroRegistros=$parametro_auxiliar_control_session->intNumeroRegistros;*/
		
		$this->bitPostAccionNuevo=$parametro_auxiliar_control_session->bitPostAccionNuevo;
		$this->bitPostAccionSinCerrar=$parametro_auxiliar_control_session->bitPostAccionSinCerrar;
		$this->bitPostAccionSinMensaje=$parametro_auxiliar_control_session->bitPostAccionSinMensaje;
		
		$this->bitEsnuevo=$parametro_auxiliar_control_session->bitEsnuevo;
		
		$this->strPermisoTodo=$parametro_auxiliar_control_session->strPermisoTodo;
		$this->strPermisoNuevo=$parametro_auxiliar_control_session->strPermisoNuevo;
		$this->strPermisoActualizar=$parametro_auxiliar_control_session->strPermisoActualizar;
		$this->strPermisoActualizarOriginal=$parametro_auxiliar_control_session->strPermisoActualizarOriginal;
		$this->strPermisoEliminar=$parametro_auxiliar_control_session->strPermisoEliminar;
		$this->strPermisoGuardar=$parametro_auxiliar_control_session->strPermisoGuardar;
		$this->strPermisoConsulta=$parametro_auxiliar_control_session->strPermisoConsulta;
		$this->strPermisoBusqueda=$parametro_auxiliar_control_session->strPermisoBusqueda;
		$this->strPermisoReporte=$parametro_auxiliar_control_session->strPermisoReporte;
		$this->strPermisoMostrarTodos=$parametro_auxiliar_control_session->strPermisoMostrarTodos;
		$this->strPermisoPopup=$parametro_auxiliar_control_session->strPermisoPopup;
		$this->strPermisoRelaciones=$parametro_auxiliar_control_session->strPermisoRelaciones;
		
		$this->strVisibleCeldaNuevo=$parametro_auxiliar_control_session->strVisibleCeldaNuevo;
		$this->strVisibleCeldaActualizar=$parametro_auxiliar_control_session->strVisibleCeldaActualizar;
		$this->strVisibleCeldaEliminar=$parametro_auxiliar_control_session->strVisibleCeldaEliminar;
		$this->strVisibleCeldaCancelar=$parametro_auxiliar_control_session->strVisibleCeldaCancelar;		
		$this->strVisibleCeldaGuardar=$parametro_auxiliar_control_session->strVisibleCeldaGuardar;
		
		$this->strAuxiliarUrlPagina=$parametro_auxiliar_control_session->strAuxiliarUrlPagina;	
		$this->strAuxiliarTipo=$parametro_auxiliar_control_session->strAuxiliarTipo;	
		/*$this->strAuxiliarMensaje=$parametro_auxiliar_control_session->strAuxiliarMensaje;	*/
		$this->strAuxiliarMensaje='';
		$this->strAuxiliarMensajeAlert='';
		$this->strAuxiliarCssMensaje=$parametro_auxiliar_control_session->strAuxiliarCssMensaje;
	
		$this->strAuxiliarHtmlReturn1=$parametro_auxiliar_control_session->strAuxiliarHtmlReturn1;
		$this->strAuxiliarHtmlReturn2=$parametro_auxiliar_control_session->strAuxiliarHtmlReturn2;
		$this->strAuxiliarHtmlReturn3=$parametro_auxiliar_control_session->strAuxiliarHtmlReturn3;
		
		/*SESSION*/
		$this->usuarioActual=$parametro_auxiliar_control_session->usuarioActual;	
		$this->parametroGeneralUsuarioActual=$parametro_auxiliar_control_session->parametroGeneralUsuarioActual;	
		$this->parametroGeneralSgActual=$parametro_auxiliar_control_session->parametroGeneralSgActual;	
		$this->resumenUsuarioActual=$parametro_auxiliar_control_session->resumenUsuarioActual;	
		$this->moduloActual=$parametro_auxiliar_control_session->moduloActual;	
		$this->opcionActual=$parametro_auxiliar_control_session->opcionActual;	
		
		$this->sistemaReturnGeneral=$parametro_auxiliar_control_session->sistemaReturnGeneral;	
		$this->arrNombresClasesRelacionadas=$parametro_auxiliar_control_session->arrNombresClasesRelacionadas;	
		/*SESSION*/
		
		
		$parametro_auxiliar_session=unserialize($this->Session->read(parametro_auxiliar_util::$STR_SESSION_NAME));
				
		if($parametro_auxiliar_session==null) {
			$parametro_auxiliar_session=new parametro_auxiliar_session();
		}
		
		$this->strStyleDivArbol=$parametro_auxiliar_session->strStyleDivArbol;	
		$this->strStyleDivContent=$parametro_auxiliar_session->strStyleDivContent;
		$this->strStyleDivOpcionesBanner=$parametro_auxiliar_session->strStyleDivOpcionesBanner;
		$this->strStyleDivExpandirColapsar=$parametro_auxiliar_session->strStyleDivExpandirColapsar;	
		$this->strStyleDivHeader=$parametro_auxiliar_session->strStyleDivHeader;	
		$this->strPermiteRecargarInformacion=$parametro_auxiliar_session->strPermiteRecargarInformacion;
				
		
		/*CON ESTO NO FUNCIONA RECARGA*/
		/*
		$this->strRecargarFkTipos=$parametro_auxiliar_session->strRecargarFkTipos;
		$this->strRecargarFkTiposNinguno=$parametro_auxiliar_session->strRecargarFkTiposNinguno;
		$this->intRecargarFkIdPadre=$parametro_auxiliar_session->intRecargarFkIdPadre;
		$this->strRecargarFkColumna=$parametro_auxiliar_session->strRecargarFkColumna;
		$this->strRecargarFkQuery=$parametro_auxiliar_session->strRecargarFkQuery;
		*/
		
		$this->strMensajeid_empresa=$parametro_auxiliar_control_session->strMensajeid_empresa;
		$this->strMensajenombre_asignado=$parametro_auxiliar_control_session->strMensajenombre_asignado;
		$this->strMensajesiguiente_numero_correlativo=$parametro_auxiliar_control_session->strMensajesiguiente_numero_correlativo;
		$this->strMensajeincremento=$parametro_auxiliar_control_session->strMensajeincremento;
		$this->strMensajemostrar_solo_costo_producto=$parametro_auxiliar_control_session->strMensajemostrar_solo_costo_producto;
		$this->strMensajecon_codigo_secuencial_producto=$parametro_auxiliar_control_session->strMensajecon_codigo_secuencial_producto;
		$this->strMensajecontador_producto=$parametro_auxiliar_control_session->strMensajecontador_producto;
		$this->strMensajeid_tipo_costeo_kardex=$parametro_auxiliar_control_session->strMensajeid_tipo_costeo_kardex;
		$this->strMensajecon_producto_inactivo=$parametro_auxiliar_control_session->strMensajecon_producto_inactivo;
		$this->strMensajecon_busqueda_incremental=$parametro_auxiliar_control_session->strMensajecon_busqueda_incremental;
		$this->strMensajepermitir_revisar_asiento=$parametro_auxiliar_control_session->strMensajepermitir_revisar_asiento;
		$this->strMensajenumero_decimales_unidades=$parametro_auxiliar_control_session->strMensajenumero_decimales_unidades;
		$this->strMensajemostrar_documento_anulado=$parametro_auxiliar_control_session->strMensajemostrar_documento_anulado;
		$this->strMensajesiguiente_numero_correlativo_cc=$parametro_auxiliar_control_session->strMensajesiguiente_numero_correlativo_cc;
		$this->strMensajecon_eliminacion_fisica_asiento=$parametro_auxiliar_control_session->strMensajecon_eliminacion_fisica_asiento;
		$this->strMensajesiguiente_numero_correlativo_asiento=$parametro_auxiliar_control_session->strMensajesiguiente_numero_correlativo_asiento;
		$this->strMensajecon_asiento_simple_factura=$parametro_auxiliar_control_session->strMensajecon_asiento_simple_factura;
		$this->strMensajecon_codigo_secuencial_cliente=$parametro_auxiliar_control_session->strMensajecon_codigo_secuencial_cliente;
		$this->strMensajecontador_cliente=$parametro_auxiliar_control_session->strMensajecontador_cliente;
		$this->strMensajecon_cliente_inactivo=$parametro_auxiliar_control_session->strMensajecon_cliente_inactivo;
		$this->strMensajecon_codigo_secuencial_proveedor=$parametro_auxiliar_control_session->strMensajecon_codigo_secuencial_proveedor;
		$this->strMensajecontador_proveedor=$parametro_auxiliar_control_session->strMensajecontador_proveedor;
		$this->strMensajecon_proveedor_inactivo=$parametro_auxiliar_control_session->strMensajecon_proveedor_inactivo;
		$this->strMensajeabreviatura_registro_tributario=$parametro_auxiliar_control_session->strMensajeabreviatura_registro_tributario;
		$this->strMensajecon_asiento_cheque=$parametro_auxiliar_control_session->strMensajecon_asiento_cheque;
			
		
		$this->empresasFK=$parametro_auxiliar_control_session->empresasFK;
		$this->idempresaDefaultFK=$parametro_auxiliar_control_session->idempresaDefaultFK;
		$this->tipo_costeo_kardexsFK=$parametro_auxiliar_control_session->tipo_costeo_kardexsFK;
		$this->idtipo_costeo_kardexDefaultFK=$parametro_auxiliar_control_session->idtipo_costeo_kardexDefaultFK;
		
		
		$this->strVisibleFK_Idempresa=$parametro_auxiliar_control_session->strVisibleFK_Idempresa;
		$this->strVisibleFK_Idtipo_costeo_kardex=$parametro_auxiliar_control_session->strVisibleFK_Idtipo_costeo_kardex;
		
		
		
		
		$this->id_empresaFK_Idempresa=$parametro_auxiliar_control_session->id_empresaFK_Idempresa;
		$this->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex=$parametro_auxiliar_control_session->id_tipo_costeo_kardexFK_Idtipo_costeo_kardex;

		
		
		
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
	
	public function getparametro_auxiliarControllerAdditional() {
		return $this->parametro_auxiliarControllerAdditional;
	}

	public function setparametro_auxiliarControllerAdditional($parametro_auxiliarControllerAdditional) {
		$this->parametro_auxiliarControllerAdditional = $parametro_auxiliarControllerAdditional;
	}
	
	public function getstrTipoReporteDefault() : string {
		return $this->strTipoReporteDefault;
	}

	public function setstrTipoReporteDefault(string $strTipoReporteDefault) {
		$this->strTipoReporteDefault = $strTipoReporteDefault;
	}
	
	public function getparametro_auxiliarActual() : parametro_auxiliar {
		return $this->parametro_auxiliarActual;
	}

	public function setparametro_auxiliarActual(parametro_auxiliar $parametro_auxiliarActual) {
		$this->parametro_auxiliarActual = $parametro_auxiliarActual;
	}
	
	public function getidActual() : int {
		return $this->idActual;
	}

	public function setidActual(int $idActual) {
		$this->idActual = $idActual;
	}
	
	public function getidparametro_auxiliar() : int {
		return $this->idparametro_auxiliar;
	}

	public function setidparametro_auxiliar(int $idparametro_auxiliar) {
		$this->idparametro_auxiliar = $idparametro_auxiliar;
	}
	
	public function getparametro_auxiliar() : parametro_auxiliar {
		return $this->parametro_auxiliar;
	}

	public function setparametro_auxiliar(parametro_auxiliar $parametro_auxiliar) {
		$this->parametro_auxiliar = $parametro_auxiliar;
	}
		
	public function getparametro_auxiliarLogic() : parametro_auxiliar_logic {		
		return $this->parametro_auxiliarLogic;
	}

	public function setparametro_auxiliarLogic(parametro_auxiliar_logic $parametro_auxiliarLogic) {
		$this->parametro_auxiliarLogic = $parametro_auxiliarLogic;
	}

	public function getConexion_control() : ConexionController {
		return $this->conexion_control;
	}

	public function setConexion_control(ConexionController $conexion_control) {
		$this->conexion_control = $conexion_control;
	}
	
	public function getparametro_auxiliarsModel() {		
		try {						
			/*parametro_auxiliarsModel.setWrappedData(parametro_auxiliarLogic->getparametro_auxiliars());*/
		} catch (Exception $e) {
			throw $e;
		}
		
		return $this->parametro_auxiliarsModel;
	}
	
	public function setparametro_auxiliarsModel($parametro_auxiliarsModel) {
		$this->parametro_auxiliarsModel = $parametro_auxiliarsModel;
	}
	
	public function getparametro_auxiliars() : array {		
		return $this->parametro_auxiliars;
	}
	
	public function setparametro_auxiliars(array $parametro_auxiliars) {
		$this->parametro_auxiliars= $parametro_auxiliars;
	}
	
	public function getparametro_auxiliarsEliminados() : array {		
		return $this->parametro_auxiliarsEliminados;
	}
	
	public function setparametro_auxiliarsEliminados(array $parametro_auxiliarsEliminados) {
		$this->parametro_auxiliarsEliminados= $parametro_auxiliarsEliminados;
	}
	
	public function setUsuarioActual(usuario $usuarioActual) {
		$this->usuarioActual = $usuarioActual;
	}
	
	public function getparametro_auxiliarActualFromListDataModel() {
		try {
			/*$parametro_auxiliarClase= $this->parametro_auxiliarsModel->getRowData();*/
			
			/*return $parametro_auxiliar;*/
		} catch(Exception $e) {
			throw $e;
		}
	}
}

?>
